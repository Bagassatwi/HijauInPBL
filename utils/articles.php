<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

function normalizeArticleSlug(string $value): string {
  $slug = strtolower(trim($value));
  $slug = preg_replace('/[^a-z0-9\s-]+/', '', $slug);
  $slug = preg_replace('/\s+/', '-', $slug);
  $slug = preg_replace('/-+/', '-', $slug);
  return trim($slug, '-');
}

function fetchArticleCategories(): array {
  global $pdo;

  try {
    $stmt = $pdo->query('SELECT id, name, icon, created_at FROM public.article_category ORDER BY created_at DESC');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $e) {
    return [];
  }
}

function createArticleCategory(array $data): array {
  global $pdo;

  $name = trim((string) ($data['name'] ?? ''));
  $icon = trim((string) ($data['icon'] ?? ''));

  if ($name === '') {
    return ['success' => false, 'message' => 'Nama kategori artikel wajib diisi.'];
  }

  if ($icon === '') {
    return ['success' => false, 'message' => 'Ikon kategori wajib diisi.'];
  }

  try {
    $stmt = $pdo->prepare('INSERT INTO public.article_category (name, icon) VALUES (:name, :icon)');
    $stmt->execute([
      ':name' => $name,
      ':icon' => $icon,
    ]);

    return ['success' => true, 'message' => 'Kategori artikel berhasil ditambahkan.'];
  } catch (Throwable $e) {
    if (str_contains($e->getMessage(), 'duplicate key') || str_contains($e->getMessage(), 'already exists')) {
      return ['success' => false, 'message' => 'Kategori artikel dengan nama yang sama sudah tersedia.'];
    }

    return ['success' => false, 'message' => 'Gagal menambahkan kategori artikel: ' . $e->getMessage()];
  }
}

function createArticle(array $data): array {
  global $pdo;

  $title = trim((string) ($data['title'] ?? ''));
  $category = trim((string) ($data['category'] ?? ''));
  $summary = trim((string) ($data['summary'] ?? ''));
  $content = trim((string) ($data['content'] ?? ''));
  $thumbnail = trim((string) ($data['thumbnail'] ?? ''));
  $readTime = max(1, (int) ($data['read_time'] ?? 0));
  $author = trim((string) ($data['author'] ?? ($_SESSION['user']['full_name'] ?? 'Admin')));

  if ($title === '') {
    return ['success' => false, 'message' => 'Judul artikel wajib diisi.'];
  }

  if ($category === '') {
    return ['success' => false, 'message' => 'Kategori artikel wajib dipilih.'];
  }

  if ($summary === '') {
    return ['success' => false, 'message' => 'Ringkasan artikel wajib diisi.'];
  }

  if ($content === '') {
    return ['success' => false, 'message' => 'Konten artikel wajib diisi.'];
  }

  $slug = normalizeArticleSlug($title);
  if ($slug === '') {
    return ['success' => false, 'message' => 'Judul artikel tidak valid.'];
  }

  try {
    $stmt = $pdo->prepare('INSERT INTO public.articles (title, slug, thumbnail, article_category_id, summary, content, author, read_time) VALUES (:title, :slug, :thumbnail, :article_category_id, :summary, :content, :author, :read_time)');
    $stmt->execute([
      ':title' => $title,
      ':slug' => $slug,
      ':thumbnail' => $thumbnail !== '' ? $thumbnail : null,
      ':summary' => $summary,
      ':content' => $content,
      ':author' => $author,
      ':read_time' => $readTime,
      ':article_category_id' => $category,
    ]);

    return ['success' => true, 'message' => 'Artikel berhasil ditambahkan.'];
  } catch (Throwable $e) {
    if (str_contains($e->getMessage(), 'duplicate key') || str_contains($e->getMessage(), 'already exists')) {
      return ['success' => false, 'message' => 'Slug artikel sudah digunakan. Silakan ubah judul artikelnya.'];
    }

    return ['success' => false, 'message' => 'Gagal menambahkan artikel: ' . $e->getMessage()];
  }
}
