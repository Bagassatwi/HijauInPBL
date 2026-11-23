<?php
// 1. Panggil Header & Navbar
include '../../includes/header.php';
include '../../includes/navbar.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

$communityId = $_GET['slug'] ?? $_GET['id'] ?? '';
$community = null;
$communityEvents = [];
$communityPosts = [];
$communityMembers = [];
$owner = null;

try {
  $stmt = $pdo->prepare("
    SELECT c.*, GREATEST(COALESCE(c.member_count, 0), COUNT(cm.id)) AS real_member_count
    FROM public.communities c
    LEFT JOIN public.community_members cm ON cm.community_id = c.id
    WHERE c.id = :id
    GROUP BY c.id
  ");
  $stmt->execute([':id' => $communityId]);
  $community = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

  if ($community) {
    $eventStmt = $pdo->prepare("
      SELECT ce.*, COUNT(cep.id) AS participant_count
      FROM public.community_events ce
      LEFT JOIN public.community_event_participants cep ON cep.event_id = ce.id
      WHERE ce.community_id = :id
      GROUP BY ce.id
      ORDER BY ce.event_date ASC NULLS LAST, ce.created_at DESC
      LIMIT 4
    ");
    $eventStmt->execute([':id' => $communityId]);
    $communityEvents = $eventStmt->fetchAll(PDO::FETCH_ASSOC);

    $postStmt = $pdo->prepare("
      SELECT cp.*, p.full_name, p.avatar_url
      FROM public.community_posts cp
      LEFT JOIN public.profiles p ON p.id = cp.user_id
      WHERE cp.community_id = :id
      ORDER BY cp.created_at DESC
      LIMIT 8
    ");
    $postStmt->execute([':id' => $communityId]);
    $communityPosts = $postStmt->fetchAll(PDO::FETCH_ASSOC);

    $memberStmt = $pdo->prepare("
      SELECT p.full_name, p.avatar_url
      FROM public.community_members cm
      LEFT JOIN public.profiles p ON p.id = cm.user_id
      WHERE cm.community_id = :id
      ORDER BY cm.joined_at DESC
      LIMIT 8
    ");
    $memberStmt->execute([':id' => $communityId]);
    $communityMembers = $memberStmt->fetchAll(PDO::FETCH_ASSOC);

    $ownerStmt = $pdo->prepare("SELECT p.full_name, p.avatar_url, p.city FROM public.profiles p WHERE p.id = :id");
    $ownerStmt->execute([':id' => $community['owner_id']]);
    $owner = $ownerStmt->fetch(PDO::FETCH_ASSOC) ?: null;
  }
} catch (Throwable $e) {
  $community = null;
}

if (!$community) {
  $community = [
    'id' => null,
    'name' => 'Komunitas Tidak Ditemukan',
    'description' => 'Komunitas yang Anda cari tidak tersedia.',
    'city' => 'Indonesia',
    'image' => '/assets/komunitas/thumb-green.png',
    'real_member_count' => 0,
    'created_at' => null,
    'caption' => 'Komunitas tidak tersedia.',
    'tags' => [],
  ];
}

$communityName = $community['name'];
$communityCity = $community['city'] ?: 'Indonesia';
$communityDescription = $community['description'] ?: ($community['caption'] ?: 'Komunitas ramah lingkungan.');
$communityImage = $community['image'] ?: '/assets/komunitas/thumb-green.png';
$memberCount = (int) ($community['real_member_count'] ?? $community['member_count'] ?? 0);
$createdDate = $community['created_at'] ? date('d F Y', strtotime($community['created_at'])) : 'Baru dibuat';
$communityTags = is_array($community['tags']) ? $community['tags'] : [];
if (!is_array($community['tags']) && is_string($community['tags'])) {
  $tagText = trim($community['tags'], '{}');
  $communityTags = $tagText === '' ? [] : array_values(array_filter(array_map('trim', explode(',', $tagText))));
}
$globalCommunityCount = 0;
$globalEcoActionCount = 0;
$globalCityCount = 0;
$globalEventCount = 0;
try {
  $globalCommunityCount = (int) $pdo->query("SELECT COUNT(*) FROM public.communities")->fetchColumn();
  $globalEcoActionCount = (int) $pdo->query("SELECT COUNT(*) FROM public.eco_actions")->fetchColumn();
  $globalCityCount = (int) $pdo->query("SELECT COUNT(DISTINCT city) FROM public.communities WHERE city IS NOT NULL AND city <> ''")->fetchColumn();
  $globalEventCount = (int) $pdo->query("SELECT COUNT(*) FROM public.community_events")->fetchColumn();
} catch (Throwable $e) {
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= htmlspecialchars($communityName) ?> - Detail Komunitas | HijauIn</title>
  <!-- Tailwind CSS CDN with Forms & Container Queries -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <!-- Google Fonts: Plus Jakarta Sans -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
    rel="stylesheet">
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#f0fdf4',
              100: '#dcfce7',
              200: '#bbf7d0',
              500: '#22c55e',
              600: '#16a34a',
              700: '#15803d',
              800: '#166534',
              900: '#14532d',
              dark: '#0e3d23',
              deep: '#092917'
            }
          }
        }
      }
    }
  </script>
  <style data-purpose="custom-typography">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: #1f2937;
      background-color: #fafbfc;
    }
  </style>
</head>
<!-- BEGIN: MainContent -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
  <!-- Breadcrumb -->
  <div class="mb-6">
    <a class="inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-800 transition-colors"
      href="../komunitas/">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
        <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></path>
      </svg>
      Kembali ke komunitas
    </a>
  </div>
  <!-- BEGIN: HeroCommunityHeader -->
  <section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-10" data-purpose="community-hero-overview">
    <!-- Left: Community Info Details -->
    <div class="lg:col-span-5 space-y-5">
      <!-- Community Avatar & Name -->
      <div class="flex items-start gap-4">
        <div
          class="w-16 h-16 rounded-2xl bg-brand-50 border border-brand-200 flex items-center justify-center shrink-0 shadow-inner">
          <i class="w-9 h-9 text-brand-700" data-lucide="sprout"></i>
        </div>
        <div>
          <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 flex items-center gap-2">
            <?= htmlspecialchars($communityName) ?>
            <span class="text-xl">🍃</span>
          </h1>
          <p class="text-sm font-medium text-slate-500 flex items-center gap-1.5 mt-1">
            <i class="w-4 h-4 text-brand-600" data-lucide="map-pin"></i>
            <?= htmlspecialchars($communityCity) ?>
          </p>
        </div>
      </div>
      <!-- Description Paragraph -->
      <p class="text-slate-600 text-sm leading-relaxed">
        <?= htmlspecialchars($communityDescription) ?>
      </p>
      <!-- Tags / Badges -->
      <div class="flex flex-wrap gap-2 pt-1">
        <?php if (!empty($communityTags)): ?>
          <?php foreach (array_slice($communityTags, 0, 4) as $tag): ?>
            <span
              class="px-3.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200"><?= htmlspecialchars(trim((string) $tag, '"')) ?></span>
          <?php endforeach; ?>
        <?php else: ?>
          <span
            class="px-3.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">Lingkungan</span>
        <?php endif; ?>
      </div>
      <!-- CTA Buttons -->
      <div class="flex flex-wrap items-center gap-3 pt-2">
        <a href="/register.php"
          class="inline-flex items-center gap-2 px-6 py-3 bg-brand-900 hover:bg-brand-800 text-white text-sm font-semibold rounded-xl shadow-sm transition">
          <span>Gabung Komunitas</span>
          <i class="w-4 h-4" data-lucide="user-plus"></i>
        </a>
        <button
          class="inline-flex items-center gap-2 px-5 py-3 border border-slate-300 hover:border-slate-400 bg-white text-slate-700 text-sm font-semibold rounded-xl shadow-sm transition">
          <span>Bagikan</span>
          <i class="w-4 h-4" data-lucide="share-2"></i>
        </button>
      </div>
    </div>
    <!-- Right: Hero Banner with Floating Member Pill -->
    <div class="lg:col-span-7 relative">
      <div
        class="relative w-full h-[320px] sm:h-[380px] rounded-3xl overflow-hidden shadow-lg border border-slate-100 bg-slate-100">
        <img alt="<?= htmlspecialchars($communityName) ?>" class="w-full h-full object-cover object-center"
          src="<?= htmlspecialchars($communityImage) ?>">
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
        <!-- Floating Active Members Card -->
        <div
          class="absolute bottom-5 right-5 bg-white/95 backdrop-blur-md rounded-2xl p-2.5 px-4 shadow-xl border border-white/60 flex items-center gap-3">
          <div class="flex -space-x-2.5 overflow-hidden">
            <img alt="Avatar Anggota" class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBk7fhvzEJut75vmuZxokTLJDODwteTZpegLKMSS3tjsiERWXm7gJLPlM1tuD-xDK_WJnZDO-zH9a7tsovcNHdGwZFD3VOGEVRxvFKyOFcAuxJP3oUXdcDtRzp7EURykokvT2o75EaUs8xY2PiR_CoSg6jYGd-MXpq-cZ8kLwBZMK9N3w85CddHMBm5rUwe79KZ0JP39k9jiNwkoahQ1b_U_e43kQCpwC-kw9VpVQV7UYqjCIYmrp2Y">
            <img alt="Avatar Anggota" class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCeuhV-cn1sAg3LUkIsw1Gd7REH50itjFikmDREDaPclYBDIQA1NH4SkTusnjwPex9GBB30MrSExjFaOEHKs1w9gtv83d_cdMyhNrUoTqoMou0ZHsjdtEsT9BoqJVnYrPzTACMqVgew0wRloSIYq0tmku4w4GMJsVUQlYOdrss0Bvuw3E5bPk1GIFamg-eSB8pb4TgN5ABrJQq0da1dTwApACZ66QZHuWtLmB0JAa3V0Y7KHovt5fy-">
            <img alt="Avatar Anggota" class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgcVvIFaalWh9iagaWjKuuB2v1VVtJm2SWAqmK4qCansuvwPDFXzRohE5hj0rBJST4uDX3EE8wp0-S90-D1vDuXjPsrj07OmmrYCGPRdmigd9IFTYkO5P_1QENPclkKiGW03cptb7JuVF09iOMdNRwv2C-DIfoumhGgQYMX2K1qAG8wsSBeK3pPY2rEqkZ80A85SFhjhFxq6XvS5MyPGmjgcFJFYyLEHDfEhdRBXo0uKMjFkdNgiOK">
            <img alt="Avatar Anggota" class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-cC9UCMAGy0DNfY8jbh3oB-_5zn1YTvoTdKa1WisfzgE9KcMlWyu9Dr2i4GgNDXgzkdhAKAyr5sT7x1EzdHPft8ketuvVgv15JbqfRC2MbnBNzLYqU34WtEQ-s3wsVU0MZ867vMgmaqVQkjqgJD0j-7Y-9_sSSCweWLZca6X-aE-ThWIsfohSiffWL_RRO2Gm7R8xg5MKj7smPWBNnErwdmiWvZBHyuZQf_sSraHVQMe5qkK4LjXt">
          </div>
          <div>
            <span
              class="block text-xs font-extrabold text-slate-900 leading-tight"><?= number_format($memberCount, 0, ',', '.') ?>+</span>
            <span class="block text-[11px] font-medium text-slate-500">Anggota Aktif</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END: HeroCommunityHeader -->
  <!-- BEGIN: MetricCounters -->
  <section class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 sm:p-6 mb-12"
    data-purpose="key-metrics-summary">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 divide-y sm:divide-y-0 sm:divide-x divide-slate-100">
      <!-- Metric 1 -->
      <div class="flex items-center gap-3.5 pt-3 sm:pt-0 sm:px-4">
        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
          <i class="w-5 h-5" data-lucide="users"></i>
        </div>
        <div>
          <div class="text-base sm:text-lg font-bold text-slate-900 leading-tight">
            <?= number_format($globalCommunityCount, 0, ',', '.') ?>+
          </div>
          <div class="text-xs text-slate-500 font-medium">Komunitas Aktif</div>
        </div>
      </div>
      <!-- Metric 2 -->
      <div class="flex items-center gap-3.5 pt-3 sm:pt-0 sm:px-4">
        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
          <i class="w-5 h-5" data-lucide="leaf"></i>
        </div>
        <div>
          <div class="text-base sm:text-lg font-bold text-slate-900 leading-tight">
            <?= number_format($globalEcoActionCount, 0, ',', '.') ?>+
          </div>
          <div class="text-xs text-slate-500 font-medium">Aksi Hijau Tercatat</div>
        </div>
      </div>
      <!-- Metric 3 -->
      <div class="flex items-center gap-3.5 pt-3 sm:pt-0 sm:px-4">
        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
          <i class="w-5 h-5" data-lucide="globe"></i>
        </div>
        <div>
          <div class="text-base sm:text-lg font-bold text-slate-900 leading-tight">
            <?= number_format($globalCityCount, 0, ',', '.') ?>+
          </div>
          <div class="text-xs text-slate-500 font-medium">Kota di Indonesia</div>
        </div>
      </div>
      <!-- Metric 4 -->
      <div class="flex items-center gap-3.5 pt-3 sm:pt-0 sm:px-4">
        <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
          <i class="w-5 h-5" data-lucide="calendar"></i>
        </div>
        <div>
          <div class="text-base sm:text-lg font-bold text-slate-900 leading-tight">
            <?= number_format($globalEventCount, 0, ',', '.') ?>+
          </div>
          <div class="text-xs text-slate-500 font-medium">Kegiatan Telah Dilakukan</div>
        </div>
      </div>
    </div>
  </section>
  <!-- END: MetricCounters -->
  <!-- BEGIN: TwoColumnContentLayout -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    <!-- LEFT COLUMN: Main Detail Information (8 Cols) -->
    <div class="lg:col-span-8 space-y-10">
      <!-- SECTION: About Community -->
      <section data-purpose="about-community-section">
        <div class="flex items-center gap-2 mb-3">
          <h2 class="text-lg font-bold text-slate-900">Tentang Komunitas</h2>
          <span class="text-base">🍃</span>
        </div>
        <p class="text-sm text-slate-600 leading-relaxed mb-6">
          <?= htmlspecialchars($communityDescription) ?>
        </p>
        <!-- Metadata 4-Box Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
          <!-- Item 1 -->
          <div class="p-3.5 rounded-xl border border-slate-200/80 bg-white">
            <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center mb-2">
              <i class="w-4 h-4" data-lucide="calendar"></i>
            </div>
            <div class="text-[11px] text-slate-400 font-medium">Didirikan</div>
            <div class="text-xs font-bold text-slate-800"><?= htmlspecialchars($createdDate) ?></div>
          </div>
          <!-- Item 2 -->
          <div class="p-3.5 rounded-xl border border-slate-200/80 bg-white">
            <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center mb-2">
              <i class="w-4 h-4" data-lucide="users"></i>
            </div>
            <div class="text-[11px] text-slate-400 font-medium">Tipe Komunitas</div>
            <div class="text-xs font-bold text-slate-800">Edukasi &amp; Aksi</div>
          </div>
          <!-- Item 3 -->
          <div class="p-3.5 rounded-xl border border-slate-200/80 bg-white">
            <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center mb-2">
              <i class="w-4 h-4" data-lucide="map-pin"></i>
            </div>
            <div class="text-[11px] text-slate-400 font-medium">Lokasi</div>
            <div class="text-xs font-bold text-slate-800 truncate"><?= htmlspecialchars($communityCity) ?></div>
          </div>
          <!-- Item 4 -->
          <div class="p-3.5 rounded-xl border border-slate-200/80 bg-white">
            <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center mb-2">
              <i class="w-4 h-4" data-lucide="globe"></i>
            </div>
            <div class="text-[11px] text-slate-400 font-medium">Bahasa</div>
            <div class="text-xs font-bold text-slate-800">Indonesia</div>
          </div>
        </div>
      </section>
      <!-- SECTION: Latest Activities -->
      <section data-purpose="latest-activities-list">
        <div class="flex items-center gap-2 mb-4">
          <h2 class="text-lg font-bold text-slate-900">Kegiatan Terbaru</h2>
          <span class="text-base">🍃</span>
        </div>
        <div class="space-y-3">
          <?php if (empty($communityEvents)): ?>
            <div
              class="p-5 rounded-2xl border border-dashed border-slate-200 bg-slate-50 text-sm text-slate-500 text-center">
              Belum ada kegiatan komunitas.</div>
          <?php else: ?>
            <?php foreach ($communityEvents as $event): ?>
              <?php
              $eventDate = $event['event_date'] ? new DateTime($event['event_date']) : null;
              $participantCount = (int) ($event['participant_count'] ?? 0);
              ?>
              <div
                class="group p-3 sm:p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-brand-500 hover:shadow-md transition flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                  <div
                    class="w-14 h-14 rounded-xl bg-brand-900 text-white flex flex-col items-center justify-center shrink-0">
                    <span
                      class="text-lg font-extrabold leading-none"><?= $eventDate ? htmlspecialchars($eventDate->format('d')) : '-' ?></span>
                    <span
                      class="text-[10px] font-semibold tracking-wider text-emerald-200 uppercase mt-0.5"><?= $eventDate ? htmlspecialchars(strtoupper($eventDate->format('M'))) : 'AKAN' ?></span>
                  </div>
                  <div>
                    <h3 class="text-sm font-bold text-slate-900 group-hover:text-brand-800 transition">
                      <?= htmlspecialchars($event['title']) ?>
                    </h3>
                    <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 mt-1">
                      <span class="flex items-center gap-1"><i class="w-3.5 h-3.5 text-brand-600"
                          data-lucide="map-pin"></i><?= htmlspecialchars($event['location'] ?: 'Lokasi akan diumumkan') ?></span>
                      <span class="flex items-center gap-1"><i class="w-3.5 h-3.5 text-slate-400"
                          data-lucide="clock"></i><?= $eventDate ? htmlspecialchars($eventDate->format('H.i')) . ' WIB' : 'Waktu akan diumumkan' ?></span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                  <span class="text-xs font-semibold text-slate-600"><?= $participantCount ?> peserta</span>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
          <div class="hidden">
            <!-- Activity Card 1 -->
            <div
              class="group p-3 sm:p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-brand-500 hover:shadow-md transition flex flex-col sm:flex-row sm:items-center justify-between gap-4">
              <div class="flex items-center gap-4">
                <!-- Date Badge -->
                <div
                  class="w-14 h-14 rounded-xl bg-brand-900 text-white flex flex-col items-center justify-center shrink-0">
                  <span class="text-lg font-extrabold leading-none">25</span>
                  <span class="text-[10px] font-semibold tracking-wider text-emerald-200 uppercase mt-0.5">MEI</span>
                </div>
                <!-- Title & Meta -->
                <div>
                  <h3 class="text-sm font-bold text-slate-900 group-hover:text-brand-800 transition">
                    Aksi Tanam 1000 Pohon di Bukit Hijau 🌲
                  </h3>
                  <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 mt-1">
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-brand-600" data-lucide="map-pin"></i>
                      Bogor, Jawa Barat
                    </span>
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-slate-400" data-lucide="clock"></i>
                      07:00 - 12:00 WIB
                    </span>
                  </div>
                </div>
              </div>
              <!-- Participants -->
              <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                <div class="flex -space-x-2">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHHmteH0pUXclfdQHrr3muzdbAb6qbo2XiOE3-CxDlwmKm4R4Gf5IPcD49AFsHzh6FrwGKJ1FJ_SzoXGtin70pfCA27Bx0Z6f1dHTVL0nhScFb_YYFpxvEQv1idnJubWw6dgmbqFHTvGv48AU645OyH8xqBy6ECkyyjWeswxBJ4cC6mjyy6r8IFNqeBgAF--PmE95vyVg5GSi7tbOxf6zTprNmXWHTbG5OGw1yi_zrPBUllk8jV0RZ">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjGdR7NIzlE3iXzQu-R0KU9a4HsA-y1f7OY97sGR4UTAgGrhba9kqK2gE2kZHIruoWZvzy_yZAszvEvyDP_6XhuMJodjvr74n8l9VzxZ9hvhAg8RcaCFxeLTpyyJmLPIlNwD6YN3oRNZ2RRMtoYP5fzecsLdFb8CVsWRSowvioh-DTzTl6U_e5rtDZ81jWOOVaAunBSATd4PwONAdKdqn_UhSStIfHCFo39OUfXs2tsaiO3kgHTqfR">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBB_YqADv0vQv7zrPluEnDUD_PKJTodWMof3Th5Lm5MQckEqlnrrnvPcdnaTYX3RHvfx_mn9yTn0P9TzYWs6kcPudldnFC8r8YlgIk7T_a44sDlgQUhLTG24mJOKB1NN20BXN3HyUHqgMmIsp4v6RebkKzJOMdv-1xzycYP5WDdEFoSYNcaMVJW9OM_Bd_uOcTlBG_ltU1j9117bn0__mxK7c3lkuTUXiWxBpKlv_ZsXVdzW6ASSMle">
                </div>
                <span class="text-xs font-semibold text-slate-600">+128 peserta</span>
              </div>
            </div>
            <!-- Activity Card 2 -->
            <div
              class="group p-3 sm:p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-brand-500 hover:shadow-md transition flex flex-col sm:flex-row sm:items-center justify-between gap-4">
              <div class="flex items-center gap-4">
                <div
                  class="w-14 h-14 rounded-xl bg-brand-900 text-white flex flex-col items-center justify-center shrink-0">
                  <span class="text-lg font-extrabold leading-none">01</span>
                  <span class="text-[10px] font-semibold tracking-wider text-emerald-200 uppercase mt-0.5">JUN</span>
                </div>
                <div>
                  <h3 class="text-sm font-bold text-slate-900 group-hover:text-brand-800 transition">
                    Beach Clean Up Pantai Kuta 🌊
                  </h3>
                  <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 mt-1">
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-brand-600" data-lucide="map-pin"></i>
                      Bali, Bali
                    </span>
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-slate-400" data-lucide="clock"></i>
                      06:30 - 10:30 WITA
                    </span>
                  </div>
                </div>
              </div>
              <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                <div class="flex -space-x-2">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDjQ21vVKV-rIfdOnF-jFkxugVrGCh4VOsKAvlAMiihZDX8l3J25Pjc04Na8jsfSBYF0xnPqGlwLsXnH-eTQP_VDdSQqL1D2m0VN1WQcELk7dTfiMVxzQvd0UFHqdATexbwOkv7NFelLMYBhGzdKu1ohL6MHkXFzSwA-mJFJ0nZ2FGp7JDUrrOlczKK0Db8hw_orMZ9UjcrSjgePIdiFUulw89nLopR7VFiaxn0A9nvt5OVcUbkHBIF">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0xktmfKA1gBEgbye-2zlD_YJCghoADWdPJeKt6k5pFDPtHJOhXdQYkl5zYML7GzHICHEnZn8Fwr7MHODp3NbRI1GMBsEtx0sYoZf0XcG4JrwnyDbhHm57oamE4RLzIvyFAPBNWNRwrdcPUoNO3vWo4pr5Xve77NEmGGNRCfkmD6PvICxCqp9lGRHhHFmVxDQ_lf46gcXMhny2zagnEq6rtCzs_mFl9KC3jKe_85y-BXP_rruu_adU">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6UJarwhh2wuncBBdgQ_lsZLPO9RwbIr1QAHW40fvNEFMAFVdtMCXinpS7lCYGEoUXO30xGqepAFvRBq5faUiY8tzkSIC3yxrbNvJ40Qqjb1MUur7ThU3AjgJ6VwQCxQ3sh7VR5HUXFexIHXmP60F8fbS9UeAvXfkS7_P3u2HDc6abeLxxzTw1IFTbkLPV0Q6X0Ng1nzlcyiMimeNnn1kjJIg8U1ctuyrKXY5ZXHCvO6_YgumOy5C5">
                </div>
                <span class="text-xs font-semibold text-slate-600">+86 peserta</span>
              </div>
            </div>
            <!-- Activity Card 3 -->
            <div
              class="group p-3 sm:p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-brand-500 hover:shadow-md transition flex flex-col sm:flex-row sm:items-center justify-between gap-4">
              <div class="flex items-center gap-4">
                <div
                  class="w-14 h-14 rounded-xl bg-brand-900 text-white flex flex-col items-center justify-center shrink-0">
                  <span class="text-lg font-extrabold leading-none">08</span>
                  <span class="text-[10px] font-semibold tracking-wider text-emerald-200 uppercase mt-0.5">JUN</span>
                </div>
                <div>
                  <h3 class="text-sm font-bold text-slate-900 group-hover:text-brand-800 transition">
                    Workshop Eco Living Zero Waste ♻️
                  </h3>
                  <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 mt-1">
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-brand-600" data-lucide="map-pin"></i>
                      Bandung, Jawa Barat
                    </span>
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-slate-400" data-lucide="clock"></i>
                      09:00 - 13:00 WIB
                    </span>
                  </div>
                </div>
              </div>
              <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                <div class="flex -space-x-2">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_sAP2seMpwzMj67bKe0E5ZbCWvkia05jyysov_7LG7KqRP-8DSjsxI7k5m38hoMkvoCitJDYZM8du6pLu8pMlPhD18v7fs_d22rFIq9gQnfSzIILeEI1K9w0a9DHDgzjvWXq_jmgmmaSWHPoTuqun3Xjcw4Lv8pSoOU762iDMCPk1Hd9Oxb6vCWklDoDvKsDsY3c9C3Fcr3XPENLIVCraStc8Fwi7Qo3fcWZdHzjqLt-glf_UM_tc">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5BNX4dzqm1oYmN_gOJYtQivYN6QAV-PqBLgMVHfEabR8y57GjFyRO07S-QzTO6UtQMwDUOzyHmpdzKq32f2SGHwKG71slWMzkulQo9PNl2lrjsOExWxK-l3N-yj5aNS68ujXQEGiZjOx8bm4LxtJUZSEUNZ_qAU9gchwD4mo0Y9v-51_Iyyw2FTsY_SMU5SgDFhOCJz26z4Zsb-3VZ-6qgD8VU3yJo1_dkKCigOaUiec1Y9XBpLSU">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtu1UVvzc34cnxAVPardIW7Fe4nBfKk7kNMafq7tSZb1Xf0zLnyTVNtOPbfuHIxw8aDi5uWjwjxR6J4nAbehHcJN6OkurXHAT_lQ9wzxKC-tO1G4Kch2up9l5vjajHKpl09EV5WdsRMGbGIMscoE9NgJ4-YMmNXGu-Fd-h5rJoNGR0WhU_W3e49KNscboCXOKsomvREYD7FxuJKcdMFeuMZFtOVxRY24hpWbMYQijd8Sg4ILtpYtpc">
                </div>
                <span class="text-xs font-semibold text-slate-600">+64 peserta</span>
              </div>
            </div>
            <!-- Activity Card 4 -->
            <div
              class="group p-3 sm:p-4 rounded-2xl bg-white border border-slate-200/80 hover:border-brand-500 hover:shadow-md transition flex flex-col sm:flex-row sm:items-center justify-between gap-4">
              <div class="flex items-center gap-4">
                <div
                  class="w-14 h-14 rounded-xl bg-brand-900 text-white flex flex-col items-center justify-center shrink-0">
                  <span class="text-lg font-extrabold leading-none">15</span>
                  <span class="text-[10px] font-semibold tracking-wider text-emerald-200 uppercase mt-0.5">JUN</span>
                </div>
                <div>
                  <h3 class="text-sm font-bold text-slate-900 group-hover:text-brand-800 transition">
                    Gowes Hijau Keliling Kota 🚲
                  </h3>
                  <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 mt-1">
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-brand-600" data-lucide="map-pin"></i>
                      Yogyakarta, DI Yogyakarta
                    </span>
                    <span class="flex items-center gap-1">
                      <i class="w-3.5 h-3.5 text-slate-400" data-lucide="clock"></i>
                      06:00 - 09:00 WIB
                    </span>
                  </div>
                </div>
              </div>
              <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                <div class="flex -space-x-2">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaIz6n4BV4Oh5QcTbz6ILdMe-8DZvdangGNj02EscK98Gdi7u91F1nJAzEOJdsG9I1il0xLIS_95oLkYy51oI-rwhLKvnSvF8uQ1UZzS3_qm_23WLYBT4emB_GhtAukTqrGUex1oxV0L9iLcvwWsKntIlb9Cy7WQU2mV49wEq_HNpmXHuYemourtAQD4nlWwpUJ2cJi__kZv1PqDlr7LhRg0UAgl5ri1SJuRhCxHFLBrbT_5HNNqeU">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBS4xRmxkCe6t6wKXelI40mz3WUuQoCvyHogS16JrqMvtTcQJDU4JshcaAqHDVjyO_KDZZy-e09RpLJX1FybFQA_BGpi4jeC-JQy2mi0Jc9GHGdEI3m3SpZYOc4BxPfstmf96YCdrMWv86sydvH_HJcIIJZ26D3-hMyfKKAQgjV_mcuvTEwTBbjWY5oFKaJ3363HzX-MQ7SJBS12ExFwIOmiT5qfBwWLbk_jPhyNdmAl8UJPv2NdyW">
                  <img alt="Peserta" class="w-7 h-7 rounded-full ring-2 ring-white object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkVvV-mn4rbNq9AyRwKVoPoaa0MquaXlxlB4XtV30uxXslQ8BAruFWnUu9byxOfy5f8fepHxjSUyADlJtxU4PFCvyyhozEmIHu0_zZEdFTZs2y0dCQX95hPDOBeu7fHqCUSYEWbxGxdqXahMIHZS6x9vXv-o44Ggqoj5H2B68mKAwsOkpH1uq0hC4ud5i-S7OyVL2rKLNgVv1mSy_UmwleinkbiB9GXe6knXo3oUkoPS8gEN3gbBBA">
                </div>
                <span class="text-xs font-semibold text-slate-600">+97 peserta</span>
              </div>
            </div>
          </div>
        </div>
        <!-- View All Activities Link -->
        <div class="text-center pt-4">
          <a class="inline-flex items-center gap-1.5 text-sm font-bold text-slate-700 hover:text-brand-700 transition"
            href="#">
            <span>Lihat Semua Kegiatan</span>
            <i class="w-4 h-4" data-lucide="arrow-right"></i>
          </a>
        </div>
      </section>
      <!-- SECTION: Event Gallery -->
      <section data-purpose="event-gallery-section">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-2">
            <h2 class="text-lg font-bold text-slate-900">Galeri Kegiatan</h2>
            <span class="text-base">🍃</span>
          </div>
          <a class="inline-flex items-center gap-1 text-xs font-bold text-slate-600 hover:text-brand-700 transition"
            href="#">
            Lihat Semua Galeri <i class="w-3.5 h-3.5" data-lucide="arrow-right"></i>
          </a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
          <div class="aspect-[4/3] rounded-xl overflow-hidden group shadow-sm bg-slate-100">
            <img alt="Galeri Tanam Pohon"
              class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBReybcbHntTaFO84C7n6Tz4AYm1WIgzgOw0JXJu5_zWXUTh4d66hxK2Qd3z2GnvXkLSJhtsLqv5RoPl3y-le5iRPr6R5Wd2tnqPN6OxtzioFXoM9WbEzBkj70crrTFFmftNqw4TBg4UPHeFUGjnOoXPAyLiUgBoxPeDMwuAqWUt7K7PraaApDoEH48rp9jJkrkABKocDCmsqVQSMa3UV5xnJ3XtpcVAAzchfr9puYm1_KDLmX45sTL">
          </div>
          <div class="aspect-[4/3] rounded-xl overflow-hidden group shadow-sm bg-slate-100">
            <img alt="Galeri Bersih Sampah"
              class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0Peukcnn2NfE3tjqNKgZZcJQnUevBGGtHmdkiVuhv7oEyfbiItPLGYr_AyKS26dwBWblELxjngHQZ6UT9Hbs7shupnzGRpyePFqdjRhK7mKK84sPOomBGnqErLkWhpflEe63vM6E2jf6afJqoopHxEHuITC2myUpbDvJi91B24BIHCidkkNq9hSHxUFwX-nUPJ2BBo_37SaRR0BL1pXFrY8Jl0OkBOjvvWqYlK_fgrqqisCzzR4zG">
          </div>
          <div class="aspect-[4/3] rounded-xl overflow-hidden group shadow-sm bg-slate-100">
            <img alt="Galeri Diskusi Mahasiswa"
              class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvQ43ls9fTt6CmUgCZvumTQrKgKPJUJvyGHnYBApKXchPchJ6rU3AkoycHxCSxJS-0_Eq5SBXmQ4jnKo8sdIiSdIknGJrm6KF19atHz3Ez2sNfdkxIKXHrkVu4d5RfYCHpMkp-gtnZ6m0NpNFa-8jFygGN5I_rzGokNn6iMHZWpice30ontecDkeibfmTbVlpdBAqwhGmLRhtTTyPnks8fFO4DAy14FQjQY2y4wrHA26VHescFJ0YT">
          </div>
          <div class="aspect-[4/3] rounded-xl overflow-hidden group shadow-sm bg-slate-100">
            <img alt="Galeri Sepeda Gowes Hijau"
              class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyasqqB3D3N1tXpc0ToNurUfF-GkF1rM7onl00JskIgYAQtv-RI9nmbdSAotEKp7T4d5kL_2m_cOGcl9sllJGuxngqlbXF3wZsOXfiySnRY2ycqRkvGL4qc-BKuGZ098MTlCzunVe7c4GZvNJ97meKFCASQng2n1JZhox4YV-1-ShLp46zGZf-fCdq0FdnFskXqFNK7-DRNHG_JOmZTxO38gpe0bgvuilEDm268tCoG4BWqPXY55IK">
          </div>
        </div>
      </section>
    </div>
    <!-- RIGHT COLUMN: Sidebar Cards (4 Cols) -->
    <aside class="lg:col-span-4 space-y-6" data-purpose="sidebar-information">
      <!-- CARD: Contact Information -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4">
        <h3 class="text-sm font-bold text-slate-900 pb-2 border-b border-slate-100">Informasi Kontak</h3>
        <ul class="space-y-3.5 text-xs font-medium text-slate-600">
          <li class="flex items-center gap-3">
            <i class="w-4 h-4 text-emerald-600 shrink-0" data-lucide="mail"></i>
            <span
              class="hover:text-emerald-700 cursor-pointer"><?= htmlspecialchars(strtolower(str_replace(' ', '', $communityName))) ?>@hijauin.id</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="w-4 h-4 text-emerald-600 shrink-0" data-lucide="phone"></i>
            <span>+62 812-3456-7890</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="w-4 h-4 text-emerald-600 shrink-0" data-lucide="instagram"></i>
            <span class="hover:text-emerald-700 cursor-pointer">@greencampus.id</span>
          </li>
        </ul>
      </div>
      <!-- CARD: Coordinator Profile -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4">
        <h3 class="text-sm font-bold text-slate-900 pb-2 border-b border-slate-100">Koordinator</h3>
        <div class="flex items-center gap-3.5">
          <img alt="<?= htmlspecialchars($owner['full_name'] ?? 'Koordinator Komunitas') ?>"
            class="w-12 h-12 rounded-full object-cover ring-2 ring-emerald-100 shadow-sm"
            src="<?= htmlspecialchars($owner['avatar_url'] ?? '/assets/avatar.png') ?>">
          <div>
            <h4 class="text-sm font-bold text-slate-900 leading-tight">
              <?= htmlspecialchars($owner['full_name'] ?? 'Koordinator Komunitas') ?>
            </h4>
            <p class="text-xs text-slate-400 mt-0.5">Koordinator Utama</p>
          </div>
        </div>
        <button
          class="w-full py-2.5 px-4 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 text-xs font-bold rounded-xl transition flex items-center justify-center gap-2">
          <i class="w-3.5 h-3.5 text-emerald-700" data-lucide="message-square"></i>
          <span>Kirim Pesan</span>
        </button>
      </div>
      <!-- CARD: Our Focus -->
      <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-sm space-y-4">
        <h3 class="text-sm font-bold text-slate-900 pb-2 border-b border-slate-100">Fokus Kami</h3>
        <ul class="space-y-3.5 text-xs font-semibold text-slate-700">
          <li class="flex items-center gap-3">
            <i class="w-4 h-4 text-emerald-600 shrink-0" data-lucide="leaf"></i>
            <span>Aksi Hijau</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="w-4 h-4 text-emerald-600 shrink-0" data-lucide="graduation-cap"></i>
            <span>Edukasi Lingkungan</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="w-4 h-4 text-emerald-600 shrink-0" data-lucide="trash-2"></i>
            <span>Pengelolaan Sampah</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="w-4 h-4 text-emerald-600 shrink-0" data-lucide="trees"></i>
            <span>Penghijauan Kampus</span>
          </li>
        </ul>
      </div>
    </aside>
    <!-- END: Sidebar Cards -->
  </div>
  <!-- END: TwoColumnContentLayout -->
  <!-- BEGIN: BottomJoinBanner -->
  <section class="mt-14" data-purpose="cta-bottom-banner">
    <div
      class="relative bg-emerald-50/70 border border-emerald-200/70 rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row items-center justify-between gap-6 overflow-hidden">
      <!-- Illustration and Content -->
      <div class="flex items-center gap-5 z-10">
        <div
          class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white border border-emerald-200/80 shadow-sm flex items-center justify-center shrink-0">
          <i class="w-10 h-10 text-emerald-600" data-lucide="sprout"></i>
        </div>
        <div>
          <h2 class="text-lg sm:text-xl font-extrabold text-slate-900">
            Gabung bersama <span class="text-emerald-700"><?= htmlspecialchars($communityName) ?></span>
          </h2>
          <p class="text-xs sm:text-sm text-slate-600 mt-1">
            Bersama kita wujudkan kampus hijau, bersih, dan berkelanjutan.
          </p>
        </div>
      </div>
      <!-- CTA Button -->
      <div class="z-10 w-full md:w-auto">
        <button
          class="w-full md:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-brand-900 hover:bg-brand-800 text-white text-sm font-semibold rounded-xl shadow-md transition">
          <span>Gabung Komunitas</span>
          <i class="w-4 h-4" data-lucide="user-plus"></i>
        </button>
      </div>
    </div>
  </section>
  <!-- END: BottomJoinBanner -->
</main>
<!-- END: MainFooter -->
<!-- BEGIN: Scripts -->
<script data-purpose="icon-initialization">
  // Initialize Lucide Icons
  document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
  });
</script>
<!-- END: Scripts -->

<?php
include '../../includes/footer.php';
?>
</body>

</html>
</main>