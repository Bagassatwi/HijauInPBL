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
$levelInfo = getCurrentLevel((int)($userProfile['xp'] ?? 0), $levels);

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
        class="hidden absolute right-0 mt-3 w-52 rounded-2xl border border-gray-100 bg-white p-2 shadow-lg z-50">
        <a
          href="/logout.php"
          class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-semibold text-red-600 transition-all duration-200 hover:bg-red-50">
          <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-red-100">
            <svg class="h-4 w-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
          </div>
          <span>Logout</span>
        </a>
      </div>
    </div>
  </div>
</header>