<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/level.php';
$levels = [
  ['level' => 1, 'minXp' => 0,    'title' => 'Eco Beginner 🌱'],
  ['level' => 2, 'minXp' => 100,  'title' => 'Eco Explorer 🍃'],
  ['level' => 3, 'minXp' => 250,  'title' => 'Eco Guardian 🌿'],
  ['level' => 4, 'minXp' => 450,  'title' => 'Nature Protector 🌳'],
  ['level' => 5, 'minXp' => 700,  'title' => 'Earth Hero 🌍'],
  ['level' => 6, 'minXp' => 1000, 'title' => 'Green Champion 🏆'],
  ['level' => 7, 'minXp' => 1350, 'title' => 'Planet Savior ⭐'],
];
$userProfile = $_SESSION['user'] ?? [
  'id'        => '',
  'full_name' => 'Tamu',
  'xp'        => 0
];

$pathname = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// print_r($userProfile['level']);
$levelInfo = getCurrentLevel((int) ($userProfile['xp'] ?? 0), $levels);
$progress  = getLevelProgress((int) ($userProfile['xp'] ?? 0));

$navItems = [
  [
    'name' => 'Dashboard',
    'path' => '/dashboard',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="1em" height="1em">
  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
  <polyline points="9 22 9 12 15 12 15 22"/>
</svg>'
  ],
  [
    'name' => 'Aktivitas',
    'path' => '/dashboard/aktivitas',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 w-6 h-6" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
      <path d="M161.35 242a16 16 0 0 1 22.62-.68c73.63 69.36 147.51 111.56 234.45 133.07 11.73-32 12.77-67.22 2.64-101.58-13.44-45.59-44.74-85.31-90.49-114.86-40.84-26.38-81.66-33.25-121.15-39.89-49.82-8.38-96.88-16.3-141.79-63.85-5-5.26-11.81-7.37-18.32-5.66-7.44 2-12.43 7.88-14.82 17.6-5.6 22.75-2 86.51 13.75 153.82 25.29 108.14 65.65 162.86 95.06 189.73 38 34.69 87.62 53.9 136.93 53.9a186 186 0 0 0 27.77-2.04c41.71-6.32 76.43-27.27 96-57.75-89.49-23.28-165.94-67.55-242-139.16a16 16 0 0 1-.65-22.65m306.08 142.19c-16.83-2.59-33.13-5.84-49-9.77a157.7 157.7 0 0 1-12.13 25.68c-.73 1.25-1.5 2.49-2.29 3.71a584 584 0 0 0 58.56 12 16 16 0 1 0 4.87-31.62z"/>
        </svg>'
  ],
  [
    'name' => 'AI Assistant',
    'path' => '/dashboard/ai-assistant',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="1em" height="1em">
  <rect x="4" y="4" width="16" height="16" rx="2" ry="2"/>
  <rect x="9" y="9" width="6" height="6"/>
  <line x1="9" y1="1" x2="9" y2="4"/>
  <line x1="15" y1="1" x2="15" y2="4"/>
  <line x1="9" y1="20" x2="9" y2="23"/>
  <line x1="15" y1="20" x2="15" y2="23"/>
  <line x1="20" y1="9" x2="23" y2="9"/>
  <line x1="20" y1="14" x2="23" y2="14"/>
  <line x1="1" y1="9" x2="4" y2="9"/>
  <line x1="1" y1="14" x2="4" y2="14"/>
</svg>'
  ],
  [
    'name' => 'Challenge',
    'path' => '/dashboard/challenge',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="1em" height="1em">
  <circle cx="12" cy="8" r="7"/>
  <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>
</svg>'
  ],
  [
    'name' => 'Komunitas',
    'path' => '/dashboard/komunitas',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="1em" height="1em">
  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
  <circle cx="9" cy="7" r="4"/>
  <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
  <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
</svg>'
  ],
  [
    'name' => 'Profil',
    'path' => '/dashboard/profil',
    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="1em" height="1em">
  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
  <circle cx="12" cy="7" r="4"/>
</svg>'
  ]
];
?>

<aside class="max-w-70 lg:flex sticky top-0 z-10 flex-col hidden h-screen row-span-2 overflow-y-auto bg-white border-r border-gray-100">
  <div class="flex items-center gap-4 px-6 py-5 mt-4">
    <img
      src="/assets/dashboard/logo.png"
      alt="HijauIn Logo"
      class="h-13 w-13 object-contain shrink-0" />
    <div>
      <h1 class="text-[24px] font-bold leading-none tracking-tight">
        <span class="text-[#0B0F1F]">Hijau</span><span class="text-[#11773D]">In</span>
      </h1>
      <p class="mt-2 text-[10px] font-semibold text-[#667085]">
        Satu Langkah Hijau Setiap Hari
      </p>
    </div>
  </div>

  <nav class="flex flex-col flex-1 gap-3 px-5 py-3">
    <?php foreach ($navItems as $item): ?>
      <?php
      $isActive = ($pathname === $item['path']);
      if ($pathname === '/dashboard' && $item['path'] === '/dashboard') {
        $isActive = true;
      }
      if (strpos($pathname, 'komunitas') !== false && $item['path'] === '/dashboard/komunitas') {
        $isActive = true;
      }
      ?>
      <a
        href="<?= htmlspecialchars($item['path']) ?>"
        class="flex h-[60px] items-center gap-4 rounded-2xl px-5 transition-all duration-200 <?= $isActive ? 'bg-[#F1F8F3] text-[#11773D]' : 'text-[#344054] hover:bg-[#F8FAF8]' ?>">
        <div class="<?= $isActive ? 'text-[#11773D]' : 'text-[#2BA24C]' ?>">
          <?= $item['icon'] ?>
        </div>
        <span class="text-[18px] font-semibold"><?= htmlspecialchars($item['name']) ?></span>
      </a>
    <?php endforeach; ?>
  </nav>

  <!-- Promo Box -->
  <div class="bg-gradient-to-b from-[#F1F8F3] to-white rounded-2xl relative p-4 mx-4 overflow-hidden text-center border border-gray-100">
    <h3 class="text-[#0B0F1F] relative z-10 mb-2 text-base font-bold">
      Ayo terus jaga bumi! 🌍
    </h3>
    <p class="relative z-10 mb-4 text-base text-gray-600">
      Setiap aksi kecil berdampak besar untuk masa depan kita.
    </p>
    <img
      src="/assets/dashboard/bum.png"
      alt="Earth"
      class="opacity-90 relative z-10 object-cover w-full h-32" />
  </div>

  <!-- User Profile Mini -->
  <div class="p-4 border-t border-gray-100">
    <div class="flex items-center justify-between mb-3">
      <div class="flex items-center gap-3">
        <img
          src="<?= htmlspecialchars($userProfile['avatar_url'] ?? '/assets/avatar.png') ?>"
          alt="<?= htmlspecialchars($userProfile['full_name'] ?? 'User') ?>"
          class="shrink-0 object-cover w-12 h-12 rounded-full" />
        <div>
          <h4 class="text-base font-bold"><?= htmlspecialchars($userProfile['full_name'] ?? '') ?></h4>
          <span class="text-secondary flex items-center gap-1 text-base">
            <svg class="w-4 h-4 text-[#11773D]" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17 8C8 10 59 16.17 3.82 22 2c0 0 1.34-3.52 2.66-5.83C4.4 12.08 7.37 7.02 12 5c5.33-2.33 10-1 10-1s-1.33 2.33-5 4z" />
            </svg>
            <?= htmlspecialchars($levelInfo['title']) ?>
          </span>
        </div>
      </div>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-1">
      <div
        class="bg-[#11773D] h-2.5 rounded-full transition-all duration-500"
        style="width: <?= (float)$progress['progress'] ?>%"></div>
    </div>
    <div class="flex justify-between text-base font-semibold text-gray-500">
      <span>Level <?= $userProfile['level'] ?></span>
      <span>
        <?= (int)$progress['currentXp'] ?> / <?= (int)$progress['nextXp'] ?> XP
      </span>
    </div>
  </div>
</aside>