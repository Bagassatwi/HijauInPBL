<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
if (trim($_COOKIE['remember_me']) == '') {
  header('Location: login.php');
  exit;
}
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
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
