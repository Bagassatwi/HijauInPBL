<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/level.php';

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  header('Location: /login.php');
  exit;
}

$userProfiles = $_SESSION['user'];
$notifications = getNotifications($userProfiles['id'] ?? '');
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HijauIn</title>
  <link rel="icon" href="/icon.png">
  <link rel="apple-touch-icon" href="/icon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen grid grid-cols-[auto_1fr] grid-rows-[auto_1fr] bg-[#F8FAF8] text-[#1A202C] antialiased">

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/dashboard/sidebar.php'; ?>

  <main class="lg:p-8 flex-1 w-full p-6 pt-0 overflow-x-hidden">