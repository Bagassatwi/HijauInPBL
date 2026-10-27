<?php
header('Content-Type: application/json');

include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

$payload = $_POST;

if (empty($payload['user_id']) || empty($payload['category_id']) || empty(trim((string) ($payload['title'] ?? '')))) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Data aktivitas tidak lengkap.'
    ]);
    exit;
}

$activityDate = $payload['activity_date'] ?? date('Y-m-d');
$activityTime = $payload['activity_time'] ?? date('H:i');
$activityDateTime = $activityDate . ' ' . $activityTime;

$sql = "
  INSERT INTO public.eco_actions (
    user_id, category_id, title, description, point,
    verification_type, status, activity_date, co2_saved, water_saved, energy_saved
  ) VALUES (
    :user_id, :category_id, :title, :description, :point,
    :verification_type, :status, :activity_date, :co2_saved, :water_saved, :energy_saved
  ) RETURNING *
";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':user_id'           => $payload['user_id'],
        ':category_id'       => $payload['category_id'],
        ':title'             => trim((string) $payload['title']),
        ':description'       => trim((string) ($payload['description'] ?? '')),
        ':point'             => (int)($payload['point'] ?? 0),
        ':verification_type' => $payload['verification_type'] ?? 'manual',
        ':status'            => $payload['status'] ?? 'verified',
        ':activity_date'     => $activityDateTime,
        ':co2_saved'         => (float)($payload['co2_saved'] ?? 0),
        ':water_saved'       => (float)($payload['water_saved'] ?? 0),
        ':energy_saved'      => (float)($payload['energy_saved'] ?? 0)
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
