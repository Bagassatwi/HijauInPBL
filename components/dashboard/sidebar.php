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
    'path' => '/admin',
    'icon' => '<svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>'
  ],
  [
    'name' => 'Aktivitas',
    'path' => '/admin/aktivitas',
    'icon' => '<svg class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17 8C8 10 59 16.17 3.82 22 2c0 0 1.34-3.52 2.66-5.83C4.4 12.08 7.37 7.02 12 5c5.33-2.33 10-1 10-1s-1.33 2.33-5 4z"/></svg>'
  ],
  [
    'name' => 'AI Assistant',
    'path' => '/admin/ai-assistant',
    'icon' => '<svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>'
  ],
  [
    'name' => 'Challenge',
    'path' => '/admin/challenge',
    'icon' => '<svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>'
  ],
  [
    'name' => 'Komunitas',
    'path' => '/admin/komunitas',
    'icon' => '<svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>'
  ],
  [
    'name' => 'Profil',
    'path' => '/admin/profil',
    'icon' => '<svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
  ]
];
?>

<aside class="w-70 lg:flex z-10 flex-col hidden h-screen overflow-y-auto bg-white border-r border-gray-100 row-span-2 sticky top-0">
  <div class="flex mt-4 items-center gap-4 px-6 py-5">
    <img
      src="/assets/dashboard/logo.png"
      alt="HijauIn Logo"
      class="h-[52px] w-[52px] object-contain shrink-0" />
    <div>
      <h1 class="text-[24px] font-bold leading-none tracking-tight">
        <span class="text-[#0B0F1F]">Hijau</span><span class="text-[#11773D]">In</span>
      </h1>
      <p class="mt-2 text-[10px] font-semibold text-[#667085]">
        Satu Langkah Hijau Setiap Hari
      </p>
    </div>
  </div>

  <nav class="flex flex-1 flex-col gap-3 px-5 py-3">
    <?php foreach ($navItems as $item): ?>
      <?php
      $isActive = ($pathname === $item['path']);
      if ($pathname === '/admin' && $item['path'] === '/admin') {
        $isActive = true;
      }
      if (strpos($pathname, 'komunitas') !== false && $item['path'] === '/admin/komunitas') {
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