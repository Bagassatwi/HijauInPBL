<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user']['id']) || empty($_SESSION['user']['id'])) {
  http_response_code(401);
  echo json_encode(['success' => false, 'message' => 'Unauthorized']);
  exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/level.php';

$userId = $_SESSION['user']['id'];

$success = markAllNotificationsAsRead((string) $userId);

if ($success) {
  echo json_encode(['success' => true, 'message' => 'Notifications marked as read']);
  exit;
}

http_response_code(500);
echo json_encode(['success' => false, 'message' => 'Failed to update notifications']);
