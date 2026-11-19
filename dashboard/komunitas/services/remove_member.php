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
$result = removeCommunityMember($userId, $_POST['community_id'] ?? '', $_POST['member_id'] ?? '');
http_response_code($result['success'] ? 200 : 403);
echo json_encode($result);
