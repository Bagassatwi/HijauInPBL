<?php
session_start();
header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/services/aktivitas/activity.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
  exit;
}

$userId = $_SESSION['user']['id'] ?? null;
if (!$userId) {
  echo json_encode(['status' => 'error', 'message' => 'Belum login']);
  exit;
}

$categoryId   = $_POST['category_id'] ?? null;
$title        = trim($_POST['title'] ?? '');
$description  = trim($_POST['description'] ?? '');
$activityDate = $_POST['activity_date'] ?? date('Y-m-d');
$activityTime = $_POST['activity_time'] ?? date('H:i');
$point        = (int)($_POST['point'] ?? 0);

if (!$categoryId || empty($title) || empty($description)) {
  echo json_encode(['status' => 'error', 'message' => 'Semua field wajib diisi.']);
  exit;
}

$fullDateTime = date('Y-m-d H:i:s', strtotime("{$activityDate} {$activityTime}"));

try {
  $pdo->beginTransaction();

  $createdActivity = createActivity($pdo, [
    'user_id'           => $userId,
    'category_id'       => $categoryId,
    'title'             => $title,
    'description'       => $description,
    'point'             => $point,
    'verification_type' => 'manual',
    'status'            => 'verified',
    'activity_date'     => $fullDateTime,
    'co2_saved'         => 0,
    'water_saved'       => 0,
    'energy_saved'      => 0
  ]);

  if ($createdActivity) {
    rewardUser($pdo, $userId, $point);
    $pdo->commit();
    echo json_encode(['status' => 'success', 'data' => $createdActivity]);
  } else {
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => 'Gagal membuat aktivitas.']);
  }
} catch (Exception $e) {
  if ($pdo->inTransaction()) {
    $pdo->rollBack();
  }
  echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
