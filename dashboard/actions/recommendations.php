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

function getRecentEcoActions(PDO $pdo, string $userId): array {
  $stmt = $pdo->prepare("
    SELECT e.title, e.description, e.point, e.activity_date, e.co2_saved, e.water_saved, e.energy_saved,
           c.name AS category_name
    FROM public.eco_actions e
    LEFT JOIN public.categories c ON c.id = e.category_id
    WHERE e.user_id = :user_id
    ORDER BY e.activity_date DESC NULLS LAST, e.created_at DESC
    LIMIT 10
  ");

  $stmt->execute([':user_id' => $userId]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
}

function normalizeRecommendationArray(array $recommendations): array {
  $normalized = [];

  foreach ($recommendations as $item) {
    if (!is_array($item)) {
      continue;
    }

    $title = trim((string)($item['title'] ?? ''));
    $description = trim((string)($item['description'] ?? ''));
    $points = (int)($item['points'] ?? 20);

    if ($title === '' || $description === '') {
      continue;
    }

    $normalized[] = [
      'title' => substr($title, 0, 60),
      'description' => substr($description, 0, 160),
      'points' => max(10, min(40, $points))
    ];
  }

  return array_slice($normalized, 0, 3);
}

function getRecommendationFallback(): array {
  return [
    [
      'title' => 'Bawa tumbler setiap hari',
      'description' => 'Kurangi penggunaan botol plastik sekali pakai dan jaga kebiasaan minum yang lebih ramah lingkungan.',
      'points' => 20
    ],
    [
      'title' => 'Hemat listrik di rumah',
      'description' => 'Matikan perangkat yang tidak dipakai dan pilih peralatan yang lebih efisien untuk mengurangi konsumsi energi.',
      'points' => 25
    ],
    [
      'title' => 'Pilihan transportasi yang lebih hijau',
      'description' => 'Coba naik transportasi umum, bersepeda, atau jalan kaki untuk menurunkan emisi karbon harian.',
      'points' => 30
    ]
  ];
}

try {
  $recentActions = getRecentEcoActions($pdo, $userId);

  $fallback = getRecommendationFallback();
  if (empty($recentActions)) {
    echo json_encode(['status' => 'success', 'recommendations' => $fallback]);
    exit;
  }

  $apiKey = getenv('GEMINI_API_KEY');
  if (!$apiKey) {
    echo json_encode(['status' => 'success', 'recommendations' => $fallback]);
    exit;
  }

  $model = getenv('MODEL') ?: 'gemini-2.5-flash';
  $prompt = "Berikut 10 aktivitas paling terbaru pengguna di aplikasi HijauIn dalam format JSON:\n" . json_encode(array_map(function ($action) {
    return [
      'title' => $action['title'] ?? '',
      'description' => $action['description'] ?? '',
      'category' => $action['category_name'] ?? 'Umum',
      'point' => (int)($action['point'] ?? 0),
      'activity_date' => $action['activity_date'] ?? null,
      'co2_saved' => (float)($action['co2_saved'] ?? 0),
      'water_saved' => (float)($action['water_saved'] ?? 0),
      'energy_saved' => (float)($action['energy_saved'] ?? 0),
    ];
  }, $recentActions), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

  $prompt .= "\n\nBerdasarkan aktivitas di atas, buat 3 rekomendasi yang paling relevan, praktis, dan selaras dengan kebiasaan hijau pengguna saat ini.\nAturan: respons harus berupa JSON valid dengan format {\"recommendations\":[{\"title\":\"...\",\"description\":\"...\",\"points\":20}, ...]} dan HARUS tepat 3 item.\nPastikan title singkat, description jelas, dan points antara 10 sampai 40. Jangan sertakan teks lain di luar JSON.";

  $payload = [
    'contents' => [[
      'role' => 'user',
      'parts' => [['text' => $prompt]]
    ]],
    'systemInstruction' => ['parts' => [['text' => 'Kamu adalah asisten green coach. Hanya balas dengan JSON valid tanpa markdown.']]]
  ];

  $apiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/' . $model . ':generateContent?key=' . $apiKey;
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
  curl_close($ch);

  if ($httpCode >= 400 || !$response) {
    throw new Exception('Gemini recommendation error');
  }

  $responseData = json_decode($response, true);
  $rawText = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? '';
  $cleanText = preg_replace('/^```(?:json)?\s*/i', '', trim($rawText));
  $cleanText = preg_replace('/\s*```\s*$/', '', $cleanText);

  $decoded = json_decode($cleanText, true);
  $recommendations = normalizeRecommendationArray($decoded['recommendations'] ?? []);

  echo json_encode([
    'status' => 'success',
    'recommendations' => !empty($recommendations) ? $recommendations : $fallback,
  ]);
} catch (Throwable $e) {
  error_log('Generate recommendations error: ' . $e->getMessage());
  echo json_encode([
    'status' => 'success',
    'recommendations' => getRecommendationFallback(),
  ]);
}
