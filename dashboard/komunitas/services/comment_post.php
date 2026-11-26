<?php

header('Content-Type: application/json');
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once __DIR__ . '/community.php';

$userId = $_SESSION['user']['id'] ?? '';
if (empty($userId)) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'Silakan login terlebih dahulu.']);
  exit;
}

$result = addCommunityPostComment(
  $userId,
  (string) ($_POST['post_id'] ?? ''),
  (string) ($_POST['content'] ?? '')
);
http_response_code($result['success'] ? 200 : 403);
echo json_encode($result);
