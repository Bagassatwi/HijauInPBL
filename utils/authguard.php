<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/connection.php';
if (trim($_COOKIE['remember_me']) == '' || !isset($_COOKIE['remember_me'])) {
  header('Location: /login.php');
  exit;
}
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];

  $sessionUserId = $user['id'] ?? null;
  if ($sessionUserId) {
    $profileStmt = $pdo->prepare("SELECT * FROM public.profiles WHERE id = :id LIMIT 1");
    $profileStmt->execute([':id' => $sessionUserId]);
    $latestProfile = $profileStmt->fetch(PDO::FETCH_ASSOC);

    if ($latestProfile) {
      $user = array_merge($user, $latestProfile);
      $_SESSION['user'] = $user;
    }
  }
} else {
  $stmt = $pdo->prepare('select pp.* from auth.refresh_tokens art join public.profiles pp on pp.id = art.user_id::uuid where art.token = :token');
  $stmt->execute(
    ['token' => hash('sha256', $_COOKIE['remember_me'])]
  );
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$user) {
    setcookie('remember_me', '', [
      'expires' => time() + (86400 * 30),
      'path' => '/',
      'secure' => true,
      'httponly' => true,
      'samesite' => 'Strict'
    ]);
    header('Location: login.php');
    exit;
  }
  $_SESSION['user'] = $user;
}
