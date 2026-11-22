<?php
require_once __DIR__ . '/connection.php';

function fetchArticles(): array {
  global $pdo;

  try {
    $stmt = $pdo->query(
      'SELECT id, title, slug, thumbnail, category AS category_name, summary, content, author, read_time, created_at FROM public.articles ORDER BY created_at DESC'
    );

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $error) {
    return [];
  }
}
