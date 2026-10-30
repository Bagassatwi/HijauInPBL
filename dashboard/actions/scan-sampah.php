<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
  exit;
}

if (!isset($_FILES['image']) || empty($_FILES['image']['tmp_name'])) {
  echo json_encode(['status' => 'error', 'message' => 'Foto sampah belum dipilih']);
  exit;
}

$apiKey = getenv('GEMINI_API_KEY');
if (!$apiKey) {
  echo json_encode(['status' => 'error', 'message' => 'API Key Gemini belum dikonfigurasi']);
  exit;
}

$tmpName = $_FILES['image']['tmp_name'];
if (!is_file($tmpName)) {
  echo json_encode(['status' => 'error', 'message' => 'File foto tidak valid']);
  exit;
}

$mime = mime_content_type($tmpName) ?: 'image/jpeg';
$fileData = base64_encode(file_get_contents($tmpName));

$prompt = "Kamu adalah AI pengidentifikasi sampah untuk aplikasi HijauIn. Lihat gambar sampah ini, lalu:
1. Identifikasi jenis sampah yang paling mungkin terlihat.
2. Jelaskan apakah sampah ini termasuk organik, anorganik, plastik, kertas, logam, elektronik, atau jenis lain.
3. Berikan cara pengelolaan yang tepat, misalnya daur ulang, kompos, bank sampah, atau dibuang ke tempat sampah tertentu.
4. Berikan saran singkat agar pengguna lebih ramah lingkungan.
5. Jawab dengan bahasa Indonesia yang jelas, santun, dan mudah dipahami.
Format jawaban yang disarankan: paragraf singkat dengan 3-5 kalimat yang padat dan informatif.";

$payload = [
  'contents' => [[
    'parts' => [
      ['text' => $prompt],
      ['inline_data' => [
        'mime_type' => $mime,
        'data' => $fileData,
      ]],
    ]
  ]],
  'systemInstruction' => ['parts' => [['text' => 'Jawab hanya dalam bahasa Indonesia yang jelas, ringkas, dan tidak mengandung markdown.']]],
];

try {
  $apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/' . getenv("MODEL") . ':generateContent?key=' . $apiKey;
  $ch = curl_init($apiUrl);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_CAINFO => $_SERVER['DOCUMENT_ROOT'] . '/cacert-2026-09-25.pem',
  ]);

  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if ($httpCode >= 400 || !$response) {

    throw new Exception('Gemini API request failed');
  }

  $responseData = json_decode($response, true);
  $parts = $responseData['candidates'][0]['content']['parts'] ?? [];
  $resultText = '';

  foreach ($parts as $part) {
    if (isset($part['text'])) {
      $resultText .= $part['text'];
    }
  }

  if ($resultText === '') {
    $resultText = 'Maaf, AI belum bisa mengidentifikasi sampah pada gambar ini. Coba unggah foto yang lebih jelas.';
  }

  echo json_encode([
    'status' => 'success',
    'response' => trim($resultText),
  ]);
} catch (Throwable $e) {
  error_log('Scan sampah AI error: ' . $e->getMessage());
  echo json_encode([
    'status' => 'error',
    'message' => 'Terjadi kesalahan saat menganalisis foto sampah.'
  ]);
}
