<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/articles.php';

if (!($_SESSION['user']['is_super_admin'] ?? false)) {
  header('Location: /dashboard');
  exit;
}

$articleMessage = '';
$articleStatus = 'success';
$categoryMessage = '';
$categoryStatus = 'success';
$articleAlertClass = 'border-emerald-200 bg-emerald-50 text-emerald-700';
$categoryAlertClass = 'border-emerald-200 bg-emerald-50 text-emerald-700';
$categories = fetchArticleCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';

  if ($action === 'create_article') {
    $result = createArticle($_POST);
    $articleMessage = $result['message'];
    $articleStatus = $result['success'] ? 'success' : 'error';
    $articleAlertClass = $articleStatus === 'success' ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-red-200 bg-red-50 text-red-700';
  }

  if ($action === 'create_category') {
    $result = createArticleCategory($_POST);
    $categoryMessage = $result['message'];
    $categoryStatus = $result['success'] ? 'success' : 'error';
    $categoryAlertClass = $categoryStatus === 'success' ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-red-200 bg-red-50 text-red-700';

    if ($result['success']) {
      $categories = fetchArticleCategories();
    }
  }
}
?>
<div class="flex w-full flex-col gap-6">
  <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
    <div>
      <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#11773D]">Super Admin</p>
      <h1 class="text-3xl font-bold text-[#101828]">Kelola Artikel</h1>
    </div>
    <div class="flex items-center gap-3">
      <span class="inline-flex items-center rounded-full bg-[#E8F5E9] px-4 py-2 text-sm font-semibold text-[#11773D]">
        Manajemen Konten HijauIn
      </span>
      <a href="/dashboard/articles/categories" class="inline-flex items-center rounded-2xl border border-[#11773D] bg-white px-4 py-2 text-sm font-semibold text-[#11773D] hover:bg-[#F1F8F3]">
        Kelola Kategori
      </a>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
      <div class="mb-6 flex items-center justify-between gap-3">
        <div>
          <h2 class="text-2xl font-bold text-[#101828]">Tambah Artikel Baru</h2>
          <p class="text-sm text-[#667085]">Publikasikan edukasi, insight, atau kampanye hijau.</p>
        </div>
      </div>

      <?php if ($articleMessage !== ''): ?>
        <div class="mb-5 rounded-2xl border px-4 py-3 text-sm font-medium <?= htmlspecialchars($articleAlertClass) ?>">
          <?= htmlspecialchars($articleMessage) ?>
        </div>
      <?php endif; ?>

      <form method="POST" class="space-y-5">
        <input type="hidden" name="action" value="create_article">

        <div>
          <label for="article-title" class="mb-2 block text-sm font-semibold text-[#344054]">Judul Artikel</label>
          <input id="article-title" name="title" type="text" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Contoh: 5 Cara Mengurangi Sampah Rumah Tangga">
        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
          <div>
            <label for="article-author" class="mb-2 block text-sm font-semibold text-[#344054]">Penulis</label>
            <input id="article-author" name="author" type="text" value="<?= htmlspecialchars($_SESSION['user']['full_name'] ?? 'Admin') ?>" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Nama penulis">
          </div>

          <div>
            <label for="article-category" class="mb-2 block text-sm font-semibold text-[#344054]">Kategori</label>
            <select id="article-category" name="category" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]">
              <option value="">Pilih kategori</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars((string) ($category['id'] ?? '')) ?>"><?= htmlspecialchars((string) ($category['name'] ?? '')) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div>
            <label for="article-read-time" class="mb-2 block text-sm font-semibold text-[#344054]">Waktu Baca (menit)</label>
            <input id="article-read-time" name="read_time" type="number" min="1" value="5" class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]">
          </div>
        </div>

        <div>
          <label for="article-thumbnail" class="mb-2 block text-sm font-semibold text-[#344054]">URL Thumbnail</label>
          <input id="article-thumbnail" name="thumbnail" type="url" class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="https://example.com/thumbnail.jpg">
        </div>

        <div>
          <label for="article-summary" class="mb-2 block text-sm font-semibold text-[#344054]">Ringkasan</label>
          <textarea id="article-summary" name="summary" rows="3" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Tuliskan ringkasan menarik singkat tentang artikel ini..."></textarea>
        </div>

        <div>
          <label for="article-content" class="mb-2 block text-sm font-semibold text-[#344054]">Konten</label>
          <textarea id="article-content" name="content" rows="8" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Tulis isi artikel lengkapnya di sini..."></textarea>
        </div>

        <div class="flex items-center justify-end pt-2">
          <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-[#11773D] px-6 py-3 text-base font-semibold text-white shadow-sm transition hover:bg-[#0d632f]">
            Simpan Artikel
          </button>
        </div>
      </form>
    </section>

    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-[#101828]">Tambah Kategori Artikel</h2>
        <p class="text-sm text-[#667085]">Bagian khusus untuk super admin membuat kategori baru.</p>
      </div>

      <?php if ($categoryMessage !== ''): ?>
        <div class="mb-5 rounded-2xl border px-4 py-3 text-sm font-medium <?= htmlspecialchars($categoryAlertClass) ?>">
          <?= htmlspecialchars($categoryMessage) ?>
        </div>
      <?php endif; ?>

      <form method="POST" class="space-y-5">
        <input type="hidden" name="action" value="create_category">

        <div>
          <label for="category-name" class="mb-2 block text-sm font-semibold text-[#344054]">Nama Kategori</label>
          <input id="category-name" name="name" type="text" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Contoh: Edukasi Lingkungan">
        </div>

        <div>
          <label for="category-icon" class="mb-2 block text-sm font-semibold text-[#344054]">Ikon Kategori</label>
          <input id="category-icon" name="icon" type="text" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Contoh: 🌿 atau leaf">
        </div>

        <div class="flex items-center justify-end pt-2">
          <button type="submit" class="inline-flex items-center justify-center rounded-2xl border border-[#11773D] bg-white px-6 py-3 text-base font-semibold text-[#11773D] transition hover:bg-[#F1F8F3]">
            Tambah Kategori
          </button>
        </div>
      </form>

      <div class="mt-8 border-t border-[#EAECF0] pt-6">
        <h3 class="mb-4 text-lg font-bold text-[#101828]">Kategori Saat Ini</h3>
        <?php if (empty($categories)): ?>
          <div class="rounded-2xl border border-dashed border-[#D0D5DD] bg-[#F9FAFB] p-4 text-sm text-[#667085]">
            Belum ada kategori artikel. Tambahkan kategori baru di form di atas.
          </div>
        <?php else: ?>
          <div class="flex flex-wrap gap-2">
            <?php foreach ($categories as $category): ?>
              <span class="inline-flex items-center gap-2 rounded-full bg-[#E8F5E9] px-3 py-1.5 text-sm font-semibold text-[#11773D]">
                <span><?= htmlspecialchars((string) ($category['icon'] ?? '🌱')) ?></span>
                <span><?= htmlspecialchars((string) ($category['name'] ?? '')) ?></span>
              </span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </div>
</div>