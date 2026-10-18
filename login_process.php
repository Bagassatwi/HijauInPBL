<?php
session_start();
require_once __DIR__ . '/utils/connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: login.php');
  exit;
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
  $_SESSION['error'] = 'Email dan kata sandi wajib diisi.';
  header('Location: login.php');
  exit;
}

$stmt = $pdo->prepare("select * from auth.users where email = :email");
$stmt->execute(["email" => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// $user = $user->fetch();
echo print_r($user);
if (!password_verify($password, $user["encrypted_password"])) {
  $_SESSION['error'] = 'Kredensial tidak valid.';
  header('Location: login.php');
  exit;
}
$refreshToken = bin2hex(random_bytes(32));
$hashedToken = hash('sha256', $refreshToken);
$tokenStmt = $pdo->prepare("
        INSERT INTO auth.refresh_tokens (
            instance_id,
            token,
            user_id,
            revoked
        ) VALUES (
            '00000000-00000000-00000000-00000000',
            :token,
            :user_id,
            FALSE
        )
    ");

$tokenStmt->execute([
  'token'   => $hashedToken,
  'user_id' => $user['id']
]);
$stmtProfile = $pdo->prepare("select * from public.profiles where id = :id");
$stmtProfile->execute(["id" => $user['id']]);
$userProfile = $stmtProfile->fetch(PDO::FETCH_ASSOC);
session_regenerate_id(true);
$_SESSION['user']       = $userProfile;
$_SESSION['refresh_token'] = $refreshToken;
setcookie('remember_me', $refreshToken, [
  'expires' => time() + (86400 * 30),
  'path' => '/',
  'secure' => true,
  'httponly' => true,
  'samesite' => 'Strict'
]);
// 8. Redirect on Success
header('Location: index.php');
exit;
exit;
