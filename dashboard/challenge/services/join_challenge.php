<?php

header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
  exit;
}

$userId = $_SESSION['user']['id'] ?? null;
$challengeId = trim($_POST['challenge_id'] ?? '');

if (!$userId) {
  http_response_code(401);
  echo json_encode(['status' => 'error', 'message' => 'Silakan login terlebih dahulu']);
  exit;
}

if ($challengeId === '') {
  http_response_code(400);
  echo json_encode(['status' => 'error', 'message' => 'Challenge tidak valid']);
  exit;
}

try {
  $pdo->beginTransaction();

  $challengeStmt = $pdo->prepare('SELECT id, duration FROM public.challenges WHERE id = :id LIMIT 1 FOR UPDATE');
  $challengeStmt->execute([':id' => $challengeId]);
  $challenge = $challengeStmt->fetch(PDO::FETCH_ASSOC);

  if (!$challenge) {
    $pdo->rollBack();
    http_response_code(404);
    echo json_encode(['status' => 'error', 'message' => 'Challenge tidak ditemukan']);
    exit;
  }

  $existingStmt = $pdo->prepare('SELECT id, status FROM public.user_challenges WHERE user_id = :user_id AND challenge_id = :challenge_id LIMIT 1 FOR UPDATE');
  $existingStmt->execute([':user_id' => $userId, ':challenge_id' => $challengeId]);
  $existing = $existingStmt->fetch(PDO::FETCH_ASSOC);

  if ($existing) {
    $pdo->rollBack();
    echo json_encode([
      'status' => 'success',
      'message' => 'Kamu sudah mengikuti challenge ini',
      'membership_status' => strtolower((string)$existing['status']),
    ]);
    exit;
  }

  $target = max(1, (int)($challenge['duration'] ?? 30));
  $joinStmt = $pdo->prepare("
    INSERT INTO public.user_challenges (user_id, challenge_id, progress, target, status, reward_claimed, joined_at)
    VALUES (:user_id, :challenge_id, 0, :target, 'active', false, NOW())
  ");
  $joinStmt->execute([
    ':user_id' => $userId,
    ':challenge_id' => $challengeId,
    ':target' => $target,
  ]);

  $pdo->commit();
  echo json_encode([
    'status' => 'success',
    'message' => 'Berhasil mengikuti challenge',
    'membership_status' => 'active',
  ]);
} catch (Throwable $e) {
  if ($pdo->inTransaction()) {
    $pdo->rollBack();
  }
  http_response_code(500);
  echo json_encode(['status' => 'error', 'message' => 'Gagal mengikuti challenge: ' . $e->getMessage()]);
}
