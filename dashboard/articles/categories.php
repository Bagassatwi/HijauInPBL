<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/articles.php';

if (!($_SESSION['user']['is_super_admin'] ?? false)) {
  header('Location: /dashboard');
  exit;
}

$categoryMessage = '';
$categoryStatus = 'success';
$categoryAlertClass = 'border-emerald-200 bg-emerald-50 text-emerald-700';
$categories = fetchArticleCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $result = createArticleCategory($_POST);
  $categoryMessage = $result['message'];
  $categoryStatus = $result['success'] ? 'success' : 'error';
  $categoryAlertClass = $categoryStatus === 'success' ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-red-200 bg-red-50 text-red-700';

  if ($result['success']) {
    $categories = fetchArticleCategories();
  }
}
?>
<div class="mx-auto flex w-full max-w-5xl flex-col gap-6">
  <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
    <div>
      <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#11773D]">Super Admin</p>
      <h1 class="text-3xl font-bold text-[#101828]">Kategori Artikel</h1>
    </div>
    <a href="/dashboard/articles" class="inline-flex items-center rounded-2xl border border-[#11773D] bg-white px-4 py-2 text-sm font-semibold text-[#11773D] hover:bg-[#F1F8F3]">
      ← Kembali ke Artikel
    </a>
  </div>

  <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
    <div class="mb-6">
      <h2 class="text-2xl font-bold text-[#101828]">Tambah Kategori Baru</h2>
      <p class="text-sm text-[#667085]">Halaman terpisah khusus untuk membuat artikel_categories baru.</p>
    </div>

    <?php if ($categoryMessage !== ''): ?>
      <div class="mb-5 rounded-2xl border px-4 py-3 text-sm font-medium <?= htmlspecialchars($categoryAlertClass) ?>">
        <?= htmlspecialchars($categoryMessage) ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-5">
      <div>
        <label for="category-name" class="mb-2 block text-sm font-semibold text-[#344054]">Nama Kategori</label>
        <input id="category-name" name="name" type="text" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Contoh: Edukasi Lingkungan">
      </div>

      <div>
        <label for="category-icon" class="mb-2 block text-sm font-semibold text-[#344054]">Ikon Kategori</label>
        <input id="category-icon" name="icon" type="text" required class="w-full rounded-2xl border border-[#D0D5DD] bg-white px-4 py-3 text-base outline-none transition focus:border-[#11773D] focus:ring-2 focus:ring-[#DDEFE3]" placeholder="Contoh: 🌿 atau leaf">
      </div>

      <div class="flex items-center justify-end pt-2">
        <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-[#11773D] px-6 py-3 text-base font-semibold text-white shadow-sm transition hover:bg-[#0d632f]">
          Tambah Kategori
        </button>
      </div>
    </form>
  </section>

  <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
    <h3 class="mb-4 text-lg font-bold text-[#101828]">Daftar Kategori Artikel</h3>
    <?php if (empty($categories)): ?>
      <div class="rounded-2xl border border-dashed border-[#D0D5DD] bg-[#F9FAFB] p-4 text-sm text-[#667085]">
        Belum ada kategori artikel yang dibuat.
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
  </section>
</div>