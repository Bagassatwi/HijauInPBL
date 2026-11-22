<?php
require_once __DIR__ . '/connection.php';

function fetchLandingPageContent(string $pageKey, string $sectionKey, array $fallback): array
{
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

function saveLandingFormSubmission(string $formKey, array $data, ?array $attachment = null): bool
{
  global $pdo;

  try {
    $insert = $pdo->prepare(
      'INSERT INTO public.landing_form_submissions (form_key, data, attachment, attachment_name, attachment_mime) VALUES (:form_key, CAST(:data AS jsonb), :attachment, :attachment_name, :attachment_mime)'
    );
    $insert->bindValue(':form_key', $formKey);
    $insert->bindValue(':data', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR));
    $insert->bindValue(':attachment', $attachment['content'] ?? null, $attachment === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
    $insert->bindValue(':attachment_name', $attachment['name'] ?? null);
    $insert->bindValue(':attachment_mime', $attachment['mime'] ?? null);
    $insert->execute();

    return true;
  } catch (Throwable $error) {
    return false;
  }
}