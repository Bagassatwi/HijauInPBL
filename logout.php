<?php
session_start();
require_once __DIR__ . '/utils/connection.php';

if (isset($_SESSION['refresh_token'])) {
  try {
    $hashedToken = hash('sha256', $_SESSION['refresh_token']);

    $stmt = $pdo->prepare("DELETE FROM auth.refresh_tokens WHERE token = :token");
    $stmt->execute(['token' => $hashedToken]);
  } catch (PDOException $e) {
    error_log('Error deleting refresh token: ' . $e->getMessage());
  }
} elseif (isset($_SESSION['user']['id'])) {
  try {
    $stmt = $pdo->prepare("DELETE FROM auth.refresh_tokens WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $_SESSION['user']['id']]);
  } catch (PDOException $e) {
    error_log('Error purging user refresh tokens: ' . $e->getMessage());
  }
}

if (isset($_COOKIE['remember_me'])) {
  setcookie('remember_me', '', time() - 3600, '/', '', isset($_SERVER['HTTPS']), true);
}

$_SESSION = [];
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
  );
}
session_destroy();

header('Location: /login.php');
exit;
