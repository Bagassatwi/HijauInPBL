<?php
header('Content-Type: application/json');

include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

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

$payload = $_POST;

if (empty($payload['user_id']) || empty($payload['category_id']) || empty(trim((string) ($payload['title'] ?? '')))) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Data aktivitas tidak lengkap.'
    ]);
    exit;
}

$point = (int)($payload['point'] ?? 0);
if ($point <= 0 && !empty($payload['category_id'])) {
    $categoryStmt = $pdo->prepare('SELECT point FROM public.categories WHERE id = :id LIMIT 1');
    $categoryStmt->execute([':id' => $payload['category_id']]);
    $category = $categoryStmt->fetch();
    if ($category && isset($category['point'])) {
        $point = (int)$category['point'];
    }
}

$photoUrl = null;
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

    if ($file['size'] > 5 * 1024 * 1024) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Ukuran file bukti maksimal 5MB.'
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

$sql = "
  INSERT INTO public.eco_actions (
    user_id, category_id, title, description, point,
    verification_type, status, activity_date, co2_saved, water_saved, energy_saved,
    location, photo_url, image_url
  ) VALUES (
    :user_id, :category_id, :title, :description, :point,
    :verification_type, :status, :activity_date, :co2_saved, :water_saved, :energy_saved,
    :location, :photo_url, :image_url
  ) RETURNING *
";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':user_id'           => $payload['user_id'],
        ':category_id'       => $payload['category_id'],
        ':title'             => trim((string) $payload['title']),
        ':description'       => trim((string) ($payload['description'] ?? '')),
        ':point'             => $point,
        ':verification_type' => $payload['verification_type'] ?? 'manual',
        ':status'            => $payload['status'] ?? 'verified',
        ':activity_date'     => $activityDateTime,
        ':co2_saved'         => (float)($payload['co2_saved'] ?? 0),
        ':water_saved'       => (float)($payload['water_saved'] ?? 0),
        ':energy_saved'      => (float)($payload['energy_saved'] ?? 0),
        ':location'          => $location !== '' ? $location : null,
        ':photo_url'         => $photoUrl,
        ':image_url'         => $photoUrl,
    ]);

    $createdActivity = $stmt->fetch();

    echo json_encode([
        'status' => 'success',
        'message' => 'Aktivitas berhasil ditambahkan.',
        'data' => $createdActivity
    ]);
    exit;
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal menambahkan aktivitas: ' . $e->getMessage()
    ]);
    exit;
}
