<?php
require_once __DIR__ . '/connection.php';

function fetchLandingPageContent(string $pageKey, string $sectionKey, array $fallback): array {
  global $pdo;

  try {
    $select = $pdo->prepare(
      'SELECT content FROM public.landing_page_content WHERE page_key = :page_key AND section_key = :section_key LIMIT 1'
    );
    $select->execute([
      ':page_key' => $pageKey,
      ':section_key' => $sectionKey,
    ]);

    $storedContent = $select->fetchColumn();
    if ($storedContent !== false) {
      $decodedContent = json_decode((string) $storedContent, true);
      return is_array($decodedContent) ? $decodedContent : $fallback;
    }

    $insert = $pdo->prepare(
      'INSERT INTO public.landing_page_content (page_key, section_key, content) VALUES (:page_key, :section_key, CAST(:content AS jsonb)) ON CONFLICT (page_key, section_key) DO NOTHING'
    );
    $insert->execute([
      ':page_key' => $pageKey,
      ':section_key' => $sectionKey,
      ':content' => json_encode($fallback, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR),
    ]);
  } catch (Throwable $error) {
    return $fallback;
  }

  return $fallback;
}

function uploadLandingAttachment(array $file): string {
  $projectUrl = getenv('PROJECT_URL');
  $serviceRoleKey = (string) getenv('SUPABASE_SERVICE_ROLE_KEY');
  if (empty($projectUrl) || empty($serviceRoleKey)) {
    throw new RuntimeException('Konfigurasi Supabase belum tersedia.');
  }
  if (!function_exists('curl_init')) {
    throw new RuntimeException('PHP cURL tidak tersedia untuk upload ke Supabase.');
  }

  $extension = strtolower(pathinfo((string) ($file['name'] ?? ''), PATHINFO_EXTENSION));
  $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
  if (!in_array($extension, $allowedExtensions, true)) {
    throw new RuntimeException('Format lampiran tidak didukung.');
  }

  $objectName = 'ticket_' . uniqid('', true) . '.' . $extension;
  $bucket = 'HijauInBucket';
  $baseUrl = rtrim((string) $projectUrl, '/');
  $uploadUrl = $baseUrl . '/storage/v1/object/' . $bucket . '/ticket/' . rawurlencode($objectName);
  $cfile = new CURLFile(
    (string) $file['tmp_name'],
    (string) ($file['type'] ?? 'application/octet-stream'),
    (string) $file['name']
  );



  $ch = curl_init($uploadUrl);
  curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => ['file' => $cfile],
    CURLOPT_HTTPHEADER => [
      'Authorization: Bearer ' . $serviceRoleKey,
      'apikey: ' . $serviceRoleKey,
    ],
    CURLOPT_CAINFO => $_SERVER['DOCUMENT_ROOT'] . '/cacert-2026-09-25.pem',
  ]);

  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $curlError = curl_error($ch);

  if ($response === false || $curlError !== '' || $httpCode >= 400) {
    throw new RuntimeException('Upload ke Supabase gagal: ' . ($curlError ?: $response ?: 'HTTP ' . $httpCode));
  }

  return $baseUrl . '/storage/v1/object/public/' . $bucket . '/ticket/' . rawurlencode($objectName);
}

function saveLandingFormSubmission(string $formKey, array $data, ?array $attachment = null): bool {
  global $pdo;
  $attachmentPath = null;

  try {
    if ($attachment !== null) {
      $attachmentPath = uploadLandingAttachment($attachment);
    }

    $insert = $pdo->prepare(
      'INSERT INTO public.landing_form_submissions (form_key, data, attachment_path, attachment_name) VALUES (:form_key, CAST(:data AS jsonb), :attachment_path, :attachment_name)'
    );
    $insert->execute([
      ':form_key' => $formKey,
      ':data' => json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR),
      ':attachment_path' => $attachmentPath,
      ':attachment_name' => $attachment['name'] ?? null,
    ]);

    return true;
  } catch (Throwable $error) {
    return false;
  }
}
