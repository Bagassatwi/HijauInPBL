<?php
$envFile = dirname(__DIR__) . '\.env';
$env = [];
if (file_exists($envFile)) {
  $env = parse_ini_file($envFile);
}

$host     = $env['DB_HOST']     ?? '127.0.0.1';
$port     = $env['DB_PORT']     ?? '3306';
$dbname   = $env['DB_DATABASE'] ?? 'my_semester_project';
$username = $env['DB_USERNAME'] ?? 'root';
$password = $env['DB_PASSWORD'] ?? '';

try {
  $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
  $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  $pdo = new PDO($dsn, $username, $password, $options);
} catch (\Throwable $th) {
  die("Database connection failed: " . $th->getMessage());
}
