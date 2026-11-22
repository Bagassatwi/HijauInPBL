<?php

header('Content-Type: application/json');

include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
include_once __DIR__ . '/activity.php';

function uploadActivityToSupabase(array $file): string {
    $projectUrl = getenv('PROJECT_URL');
    $serviceRoleKey = getenv('SUPABASE_SERVICE_ROLE_KEY');

    if (empty($projectUrl) || empty($serviceRoleKey)) {
        throw new RuntimeException('Konfigurasi Supabase belum tersedia.');
    }

    if (!function_exists('curl_init')) {
        throw new RuntimeException('PHP cURL tidak tersedia untuk upload ke Supabase.');
    }

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($extension, $allowedExtensions, true)) {
        $extension = 'jpg';
    }

    $objectName = uniqid('activity_', true) . '.' . $extension;
    $bucket = 'activity';
    $uploadUrl = rtrim($projectUrl, '/') . '/storage/v1/object/' . $bucket . '/' . rawurlencode($objectName);

    $cfile = new CURLFile($file['tmp_name'], $file['type'] ?: 'application/octet-stream', $file['name']);

    $ch = curl_init($uploadUrl);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => ['file' => $cfile],
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $serviceRoleKey,
            'apikey: ' . $serviceRoleKey,
        ],
        CURLOPT_CAINFO => $_SERVER['DOCUMENT_ROOT'] . '/cacert-2026-09-25.pem',
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || !empty($curlError) || $httpCode >= 400) {
        throw new RuntimeException('Upload ke Supabase gagal: ' . ($curlError ?: $response ?: 'HTTP ' . $httpCode));
    }

    return rtrim($projectUrl, '/') . '/storage/v1/object/public/' . $bucket . '/' . rawurlencode($objectName);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Method not allowed.'
    ]);
    exit;
}

$sessionUserId = $_SESSION['user']['id'] ?? null;
if (!$sessionUserId) {
    http_response_code(401);
    echo json_encode([
        'status' => 'error',
        'message' => 'Belum login.'
    ]);
    exit;
}

$payload = $_POST;


if (empty($payload['category_id']) || empty(trim((string) ($payload['title'] ?? '')))) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Data aktivitas tidak lengkap.'
    ]);
    exit;
}

$categoryStmt = $pdo->prepare('SELECT name, point FROM public.categories WHERE id = :id LIMIT 1');
$categoryStmt->execute([':id' => $payload['category_id']]);
$category = $categoryStmt->fetch(PDO::FETCH_ASSOC);
if (!$category) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Kategori aktivitas tidak ditemukan.'
    ]);
    exit;
}
$point = (int)($category['point'] ?? 0);
$impact = estimateActivityImpact(
    (string)($category['name'] ?? ''),
    trim((string)$payload['title'])
);

$photoUrl = null;

if (isset($_FILES['proof_photo']) && (int)$_FILES['proof_photo']['error'] !== UPLOAD_ERR_NO_FILE) {
    $uploadError = (int)$_FILES['proof_photo']['error'];

    if ($uploadError === UPLOAD_ERR_INI_SIZE || $uploadError === UPLOAD_ERR_FORM_SIZE) {
        http_response_code(413);
        echo json_encode([
            'status' => 'error',
            'message' => 'Ukuran foto melewati batas upload server (maksimal 2MB). Perkecil ukuran foto atau ubah upload_max_filesize/post_max_size di php.ini.'
        ]);
        exit;
    }

    if ($uploadError !== UPLOAD_ERR_OK) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Upload bukti aktivitas gagal. Silakan pilih foto kembali.'
        ]);
        exit;
    }
}

if (isset($_FILES['proof_photo']) && !empty($_FILES['proof_photo']['tmp_name'])) {
    $file = $_FILES['proof_photo'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Upload bukti aktivitas gagal.'
        ]);
        exit;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = $finfo ? finfo_file($finfo, $file['tmp_name']) : ($file['type'] ?? 'application/octet-stream');
    if ($finfo) {
        finfo_close($finfo);
    }

    if (!str_starts_with((string) $mimeType, 'image/')) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'File bukti harus berupa gambar.'
        ]);
        exit;
    }

    if ($file['size'] > 2 * 1024 * 1024) {

        http_response_code(413);
        echo json_encode([
            'status' => 'error',
            'message' => 'Ukuran file bukti maksimal 2MB.'
        ]);
        exit;
    }

    try {
        $photoUrl = uploadActivityToSupabase($file);
    } catch (Throwable $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
        exit;
    }
}

$activityDate = $payload['activity_date'] ?? date('Y-m-d');
$activityTime = $payload['activity_time'] ?? date('H:i');
$activityDateTime = $activityDate . ' ' . $activityTime;
$location = trim((string) ($payload['location'] ?? ''));

try {
    $pdo->beginTransaction();
    $createdActivity = createActivity($pdo, [
        'user_id' => (string)$sessionUserId,
        'category_id' => $payload['category_id'],
        'title' => trim((string)$payload['title']),
        'description' => trim((string)($payload['description'] ?? '')),
        'point' => $point,
        'verification_type' => $payload['verification_type'] ?? 'manual',
        'status' => $payload['status'] ?? 'verified',
        'activity_date' => $activityDateTime,
        'co2_saved' => $impact['co2_saved'],
        'water_saved' => $impact['water_saved'],
        'energy_saved' => $impact['energy_saved'],
        'location' => $location !== '' ? $location : null,
        'photo_url' => $photoUrl,
        'image_url' => $photoUrl,
    ]);

    if (!$createdActivity) {
        throw new RuntimeException('Aktivitas gagal disimpan.');
    }

    rewardUser($pdo, (string)$sessionUserId, $point);

    require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/challenge/services/challenge.php';
    $challengeUpdates = syncChallengeProgress($pdo, (string)$sessionUserId);
    $userProgress = refreshUserProgress($pdo, (string)$sessionUserId);
    // backfillActivityImpactEstimates($pdo, (string)$sessionUserId);
    $ecoScore = refreshUserEcoScore($pdo, (string)$sessionUserId);
    $pdo->commit();

    echo json_encode([
        'status' => 'success',
        'message' => 'Aktivitas berhasil ditambahkan.',
        'data' => $createdActivity,
        'challenge_updates' => $challengeUpdates,
        'xp' => $userProgress['xp'],
        'level' => $userProgress['level'],
        'eco_score' => $ecoScore,
        'impact' => $impact
    ]);
    exit;
} catch (Throwable $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal menambahkan aktivitas: ' . $e->getMessage()
    ]);
    exit;
}
