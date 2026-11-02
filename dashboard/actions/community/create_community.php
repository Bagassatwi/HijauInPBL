<?php
session_start();

header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/community.php';

$userId = $_SESSION['user']['id'] ?? '';

if (empty($userId)) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'Silakan login terlebih dahulu.']);
  exit;
}

$result = createCommunity($userId, $_POST);
http_response_code($result['success'] ? 200 : 400);
echo json_encode($result);
