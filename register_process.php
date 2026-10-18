<?php
session_start();
require_once __DIR__ . '/utils/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: register.php');
  exit;
}

$name = trim($_POST['name'] ?? '');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';
$agreeTaS = isset($_POST['agree_tos']);

if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
  $_SESSION['error'] = 'Semua kolom wajib diisi.';
  header('Location: register.php');
  exit;
}

if (strlen($password) < 8) {
  $_SESSION['error'] = 'Kata sandi minimal 8 karakter.';
  header('Location: register.php');
  exit;
}

if ($password !== $confirmPassword) {
  $_SESSION['error'] = 'Konfirmasi kata sandi tidak cocok.';
  header('Location: register.php');
  exit;
}

if (!$agreeTaS) {
  $_SESSION['error'] = 'Anda harus menyetujui Syarat & Ketentuan dan Kebijakan Privasi.';
  header('Location: register.php');
  exit;
}


try {
  $checkStmt = $pdo->prepare("SELECT id FROM auth.users WHERE email = :email LIMIT 1");
  $checkStmt->execute(['email' => $email]);
  if ($checkStmt->fetch()) {
    $_SESSION['error'] = 'Email sudah terdaftar.';
    header('Location: register.php');
    exit;
  }

  $bytes = random_bytes(16);
  $bytes[6] = chr(ord($bytes[6]) & 0x0f | 0x40);
  $bytes[8] = chr(ord($bytes[8]) & 0x3f | 0x80);
  $userId = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($bytes), 4));

  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  $rawUserMetaData = json_encode([
    'full_name' => $name,
    'name'      => $name
  ]);

  $pdo->beginTransaction();

  $authStmt = $pdo->prepare("
        INSERT INTO auth.users (
            instance_id,
            id,
            aud,
            role,
            email,
            encrypted_password,
            email_confirmed_at,
            raw_app_meta_data,
            raw_user_meta_data,
        ) VALUES (
            '00000000-00000000-00000000-00000000',
            :id,
            'authenticated',
            'authenticated',
            :email,
            :password,
            NOW(),
            '{\"provider\":\"email\",\"providers\":[\"email\"]}',
            :user_metadata,
        )
    ");

  $authStmt->execute([
    'id'            => $userId,
    'email'         => $email,
    'password'      => $hashedPassword,
    'user_metadata' => $rawUserMetaData
  ]);

  $profileStmt = $pdo->prepare("
        INSERT INTO public.profiles (
            id,
            full_name,
        ) VALUES (
            :id,
            :full_name,
        )
    ");

  $profileStmt->execute([
    'id'        => $userId,
    'full_name' => $name
  ]);

  $pdo->commit();

  $_SESSION['success'] = 'Pendaftaran berhasil! Silakan masuk.';
  header('Location: login.php');
  exit;
} catch (PDOException $e) {
  if ($pdo->inTransaction()) {
    $pdo->rollBack();
  }
  error_log('Database Registration Error: ' . $e->getMessage());
  $_SESSION['error'] = 'Terjadi kesalahan pada sistem.';
  header('Location: register.php');
  exit;
}
