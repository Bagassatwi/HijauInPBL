<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/utils/level.php';

$userProfile = $_SESSION['user'] ?? [
  'id'        => '',
  'full_name' => 'Tamu',
  'xp'        => 0
];
$levels = [
  ['level' => 1, 'minXp' => 0,    'title' => 'Eco Beginner 🌱'],
  ['level' => 2, 'minXp' => 100,  'title' => 'Eco Explorer 🍃'],
  ['level' => 3, 'minXp' => 250,  'title' => 'Eco Guardian 🌿'],
  ['level' => 4, 'minXp' => 450,  'title' => 'Nature Protector 🌳'],
  ['level' => 5, 'minXp' => 700,  'title' => 'Earth Hero 🌍'],
  ['level' => 6, 'minXp' => 1000, 'title' => 'Green Champion 🏆'],
  ['level' => 7, 'minXp' => 1350, 'title' => 'Planet Savior ⭐'],
];

$notifications ??= [];
$pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$fullName = $userProfile['full_name'] ?? 'Tamu';
$firstName = explode(' ', trim($fullName))[0];
$userXp = (int)($userProfile['xp'] ?? 0);
$levelInfo = getCurrentLevel($userXp, $levels);
$progressInfo = getLevelProgress($userXp);
$progressPercent = min(100, max(0, (int) round(($userXp / max(1, $progressInfo['nextXp'])) * 100)));

$headerConfig = [
  '/admin' => [
    'title'       => "Halo, {$firstName}! 👋",
    'subtitle'    => 'Selamat datang kembali!',
    'description' => 'Teruslah beraksi, karena setiap langkah kecil <br /> berdampak besar bagi bumi kita. 🌱',
    'src'         => '/assets/dashboard/main.png',
  ],
  '/admin/aktivitas' => [
    'title'       => 'Aktivitas 🌱',
    'subtitle'    => null,
    'description' => 'Catat dan lihat semua aksi hijau yang kamu lakukan.',
    'src'         => '/assets/aktivitas/m.png',
  ],
  '/admin/ai-assistant' => [
    'title'       => 'AI Assistant ✨',
    'subtitle'    => null,
    'description' => 'Asisten cerdasmu untuk hidup lebih hijau setiap hari.',
    'src'         => null,
  ],
  '/admin/challenge' => [
    'title'       => 'Challenge 🌱',
    'subtitle'    => null,
    'description' => 'Ikuti challenge seru dan raih poin serta badge spesial!',
    'src'         => '/assets/challange/main.png',
  ],
  '/admin/komunitas' => [
    'title'       => 'Komunitas 🌱',
    'subtitle'    => null,
    'description' => 'Bersama komunitas, wujudkan bumi yang lebih hijau!',
    'src'         => '/assets/dashboard-komunitas/main.png',
  ],
  '/admin/profil' => [
    'title'       => 'Profil Saya 🌿',
    'subtitle'    => null,
    'description' => 'Kelola informasi profil dan pengaturan akun Anda.',
    'src'         => null,
  ],
];

$currentConfig = $headerConfig[$pathname] ?? $headerConfig['/admin'];
?>

<header class="rounded-3xl relative flex flex-col lg:flex-row lg:items-center justify-between gap-4 z-0 p-8 pb-12">
  <div class="lg:w-1/2 z-10 w-full">
    <h1 class="mb-2 text-3xl font-bold"><?= htmlspecialchars($currentConfig['title']) ?></h1>

    <?php if (!empty($currentConfig['subtitle'])): ?>
      <h2 class="mb-2 text-xl font-bold"><?= htmlspecialchars($currentConfig['subtitle']) ?></h2>
    <?php endif; ?>

    <p class="text-base text-gray-600">
      <?= nl2br(str_replace('<br />', "\n", $currentConfig['description'])) ?>
    </p>

    <?php if (!empty($currentConfig['src'])): ?>
      <div class="lg:w-1/2 absolute top-2 right-60 -z-10 hidden lg:flex justify-end w-full h-full">
        <img
          src="<?= htmlspecialchars($currentConfig['src']) ?>"
          alt="Nature landscape"
          class="object-cover w-full h-full" />
      </div>
    <?php endif; ?>
  </div>

  <div class="absolute top-8 right-8 z-10 hidden items-center gap-6 lg:flex">
    <!-- Notification -->
    <div class="relative cursor-pointer">
      <svg class="w-8 h-8 text-[#11773D]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
      </svg>
      <span class="bg-[#11773D] absolute -top-1 -right-1 flex h-6 w-6 items-center justify-center rounded-full text-sm font-bold text-white">
        <?= count($notifications) ?>
      </span>
    </div>

    <!-- Profile Dropdown -->
    <div class="relative" id="profileDropdownContainer">
      <button
        id="profileDropdownBtn"
        type="button"
        class="flex cursor-pointer items-center gap-3 focus:outline-none">
        <img
          src="<?= htmlspecialchars($userProfile['avatar_url'] ?? '/assets/avatar.png') ?>"
          alt="Profile"
          class="h-10 w-10 rounded-full object-cover" />

        <div class="text-right">
          <div class="text-center text-[18px] font-bold">
            <?= htmlspecialchars($fullName) ?>
          </div>
          <div class="text-[#667085] ml-5 text-center text-[13px]">
            <?= htmlspecialchars($levelInfo['title']) ?>
          </div>
        </div>

        <svg id="chevronIcon" class="ml-2 h-4 w-4 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div
        id="profileMenu"
        class="hidden absolute right-0 mt-3 w-72 rounded-2xl border border-gray-100 bg-white p-2 shadow-[0_12px_40px_rgba(17,119,61,0.12)] z-50">
        <div class="mb-3 rounded-2xl bg-[#F3FAF5] p-3 shadow-inner shadow-[#E0F2E7]">
          <div class="mb-2 flex items-center justify-between gap-2">
            <span class="inline-flex items-center rounded-full bg-[#11773D] px-2.5 py-1 text-[11px] font-bold tracking-wide text-white">
              LEVEL <?= htmlspecialchars((string) ($levelInfo['level'] ?? 1)) ?>
            </span>
            <span class="text-[12px] font-semibold text-[#11773D]">
              <?= htmlspecialchars((string) $progressPercent) ?>%
            </span>
          </div>

          <div class="mb-2 h-2.5 w-full overflow-hidden rounded-full bg-[#DDEFE3]">
            <div class="h-full rounded-full bg-gradient-to-r from-[#11773D] to-[#45A66A]" style="width: <?= htmlspecialchars((string) $progressPercent) ?>%"></div>
          </div>

          <div class="text-[12px] font-medium text-gray-700">
            <?= number_format($userXp, 0, ',', '.') ?> / <?= number_format($progressInfo['nextXp'], 0, ',', '.') ?> XP
          </div>
        </div>

        <div class="space-y-1">
          <a href="/dashboard/profil" class="group flex items-center gap-3 rounded-xl px-3 py-3 transition-all duration-200 hover:bg-green-50">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EAF7F0] text-[#11773D]">
              <i class="fa-solid fa-user text-sm"></i>
            </div>
            <div class="flex-1 text-left">
              <div class="text-[15px] font-semibold text-gray-800">Lihat Profil</div>
              <div class="text-[11px] text-gray-500">Informasi akun & bio aktif</div>
            </div>
            <i class="fa-solid fa-chevron-right text-xs text-gray-400 group-hover:text-[#11773D]"></i>
          </a>

          <a href="/dashboard/profil" class="group flex items-center gap-3 rounded-xl px-3 py-3 transition-all duration-200 hover:bg-green-50">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EAF7F0] text-[#11773D]">
              <i class="fa-solid fa-award text-sm"></i>
            </div>
            <div class="flex-1 text-left">
              <div class="text-[15px] font-semibold text-gray-800">Riwayat Poin &amp; Aksi</div>
              <div class="text-[11px] text-gray-500">Koleksi lencana &amp; dampak hijau</div>
            </div>
            <i class="fa-solid fa-chevron-right text-xs text-gray-400 group-hover:text-[#11773D]"></i>
          </a>

          <a href="/dashboard/profil" class="group flex items-center gap-3 rounded-xl px-3 py-3 transition-all duration-200 hover:bg-green-50">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EAF7F0] text-[#11773D]">
              <i class="fa-solid fa-gear text-sm"></i>
            </div>
            <div class="flex-1 text-left">
              <div class="text-[15px] font-semibold text-gray-800">Pengaturan Akun</div>
              <div class="text-[11px] text-gray-500">Preferensi, keamanan, &amp; notifikasi</div>
            </div>
            <i class="fa-solid fa-chevron-right text-xs text-gray-400 group-hover:text-[#11773D]"></i>
          </a>

          <div class="my-1 border-t border-gray-100"></div>

          <a
            href="/logout.php"
            class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-[15px] font-semibold text-red-600 transition-all duration-200 hover:bg-red-50">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-100">
              <i class="fa-solid fa-right-from-bracket text-sm"></i>
            </div>
            <div class="flex-1 text-left">
              <div>Logout</div>
              <div class="text-[11px] text-red-400">Keluar dari sesi ini</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</header>