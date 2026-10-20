<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
  exit;
}

$userId = $_SESSION['user']['id'] ?? null;
if (!$userId) {
  echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
  exit;
}

$inputData = json_decode(file_get_contents('php://input'), true);
$userPrompt = trim($inputData['prompt'] ?? '');
if (empty($userPrompt)) {
  echo json_encode(['status' => 'error', 'message' => 'Prompt tidak boleh kosong']);
  exit;
}

$apiKey = getenv('GEMINI_API_KEY');
if (!$apiKey) {
  echo json_encode(['status' => 'error', 'message' => 'API Key Gemini tidak dikonfigurasi']);
  exit;
}

try {
  // Fetch last 20 messages for context
  $historyStmt = $pdo->prepare("
        SELECT role, content 
        FROM public.messages 
        WHERE user_id = :user_id 
        ORDER BY created_at ASC 
        LIMIT 20
    ");
  $historyStmt->execute(['user_id' => $userId]);
  $history = $historyStmt->fetchAll(PDO::FETCH_ASSOC);

  $contents = [];
  foreach ($history as $msg) {
    $contents[] = [
      'role'  => $msg['role'] === 'user' ? 'user' : 'model',
      'parts' => [['text' => $msg['content']]]
    ];
  }

  $contents[] = [
    'role'  => 'user',
    'parts' => [['text' => $userPrompt]]
  ];

  $payload = [
    'contents' => $contents,
    'systemInstruction' => [
      'parts' => [[
        'text' => "Kamu adalah Eco AI, asisten dan konsultan gaya hidup hijau (Green Coach) untuk aplikasi HijauIn.\n\nTujuan utamamu adalah membantu pengguna yang ingin menjaga bumi, mengurangi sampah, menghemat energi, dan menerapkan gaya hidup ramah lingkungan secara praktis dan berkelanjutan.\n\nPanduan Komunikasi:\n1. Bahasamu harus ramah, suportif, edukatif, dan selalu berbahasa Indonesia yang santun serta mudah dipahami.\n2. Berikan saran konkret dan mudah dilakukan sehari-hari di Indonesia (misalnya: memilah sampah rumah tangga, menggunakan komposting, membawa tumbler/tas belanja, hemat air/listrik, transportasi umum).\n3. Gunakan nada bicara yang memotivasi tanpa menggurui secara berlebihan.\n4. Jika relevan, sertakan saran aksi kecil atau poin apresiasi untuk semangat mereka."
      ]]
    ]
  ];

  // Call Gemini 2.5 Flash REST Endpoint
  $apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

  $ch = curl_init($apiUrl);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($payload),
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    CURLOPT_CAINFO         => $_SERVER["DOCUMENT_ROOT"] . '/cacert-2026-09-25.pem',
  ]);

  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if ($httpCode >= 400 || !$response) {
    $errorMsg = curl_error($ch);
    throw new Exception("Gemini API Error: HTTP " . $errorMsg);
  }

  $responseData = json_decode($response, true);
  $aiResponseText = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, tidak ada jawaban yang dihasilkan.';

  // Insert user message and AI response into database
  $insertStmt = $pdo->prepare("
        INSERT INTO public.messages (user_id, role, content, created_at) 
        VALUES (:user_id, :role, :content, NOW())
    ");

  $insertStmt->execute([
    'user_id' => $userId,
    'role'    => 'user',
    'content' => $userPrompt
  ]);

  $insertStmt->execute([
    'user_id' => $userId,
    'role'    => 'model',
    'content' => $aiResponseText
  ]);

  echo json_encode([
    'status'   => 'success',
    'response' => $aiResponseText
  ]);
} catch (Exception $e) {
  error_log('AI Chat Error: ' . $e->getMessage());
  echo json_encode([
    'status'  => 'error',
    'message' => 'Terjadi kesalahan sistem saat menghubungi AI.'
  ]);
}
