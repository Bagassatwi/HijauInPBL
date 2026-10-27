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
$unreadNotifications = array_values(array_filter($notifications, function ($notification) {
  $isRead = $notification['is_read'] ?? false;

  if (is_string($isRead)) {
    return !in_array(strtolower(trim($isRead)), ['true', '1', 'yes'], true);
  }

  return !$isRead;
}));
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

<header class="rounded-3xl relative flex flex-col lg:flex-row lg:items-center justify-between gap-4 p-8 pb-12 z-999">
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
    <div class="relative" id="notificationDropdownContainer">
      <button
        id="notificationDropdownBtn"
        type="button"
        class="relative cursor-pointer focus:outline-none">
        <svg class="h-8 w-8 text-[#11773D]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
        <?php if (!empty($unreadNotifications)): ?>
          <span class="bg-[#11773D] absolute -top-1 -right-1 flex h-6 w-6 items-center justify-center rounded-full text-sm font-bold text-white">
            <?= count($unreadNotifications) ?>
          </span>
        <?php endif; ?>
      </button>

      <div
        id="notificationMenu"
        class="hidden absolute right-0 mt-3 w-[390px] overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-[0_12px_40px_rgba(17,119,61,0.12)] z-50">
        <div class="flex items-center justify-between border-b border-gray-100 bg-[#F3FAF5] px-4 py-3">
          <div class="text-[15px] font-bold text-gray-800">
            Notifikasi <?php echo !empty($unreadNotifications) ? count($unreadNotifications) . ' baru' : 'baru'; ?>
          </div>
          <button
            id="readAllNotificationsBtn"
            type="button"
            class="flex h-8 w-8 items-center justify-center rounded-full text-[#11773D] transition hover:bg-white hover:shadow-sm disabled:cursor-not-allowed disabled:opacity-50"
            aria-label="Baca semua notifikasi"
            <?php if (empty($unreadNotifications)): ?>disabled<?php endif; ?>>
            <i class="fa-solid fa-check-double text-sm"></i>
          </button>
        </div>

        <div class="max-h-[420px] overflow-y-auto">
          <?php if (empty($notifications)): ?>
            <div class="px-4 py-6 text-center text-sm text-gray-500">no notifications.</div>
          <?php else: ?>
            <?php foreach (array_slice($notifications, 0, 6) as $notification): ?>
              <?php
              $notificationTitle = trim((string) ($notification['title'] ?? 'Notifikasi'));
              $notificationMessage = trim((string) ($notification['message'] ?? ''));
              $notificationTime = $notification['created_at'] ?? null;
              $formattedTime = $notificationTime ? date('d M Y', strtotime($notificationTime)) : 'Baru';
              $notificationIsRead = $notification['is_read'] ?? false;
              $notificationIsUnread = !(
                $notificationIsRead === true ||
                $notificationIsRead === 'true' ||
                $notificationIsRead === 1 ||
                $notificationIsRead === '1'
              );
              ?>
              <div class="flex gap-3 border-b border-gray-100 px-4 py-3 last:border-b-0 <?= $notificationIsUnread ? 'bg-[#F7FBF8]' : '' ?>">
                <div class="relative mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#EAF7F0] text-[#11773D]">
                  <i class="fa-solid fa-bell text-sm"></i>
                  <?php if ($notificationIsUnread): ?>
                    <span class="absolute -right-0.5 -top-0.5 h-2.5 w-2.5 rounded-full bg-[#11773D] ring-2 ring-white"></span>
                  <?php endif; ?>
                </div>

                <div class="min-w-0 flex-1">
                  <div class="flex items-center gap-2 text-[15px] <?= $notificationIsUnread ? 'font-bold text-gray-900' : 'font-semibold text-gray-600' ?>">
                    <span><?= htmlspecialchars($notificationTitle ?: 'Notifikasi') ?></span>
                    <?php if ($notificationIsUnread): ?>
                      <span class="h-2 w-2 rounded-full bg-[#11773D]"></span>
                    <?php endif; ?>
                  </div>
                  <?php if ($notificationMessage !== ''): ?>
                    <div class="mt-1 text-sm <?= $notificationIsUnread ? 'text-gray-700' : 'text-gray-500' ?>">
                      <?= htmlspecialchars($notificationMessage) ?>
                    </div>
                  <?php endif; ?>
                  <div class="mt-2 text-[11px] <?= $notificationIsUnread ? 'text-gray-500' : 'text-gray-400' ?>">
                    <?= htmlspecialchars($formattedTime) ?>
                  </div>
                </div>

                <button type="button" class="self-start text-gray-400 hover:text-gray-600">
                  <i class="fa-solid fa-ellipsis-vertical text-sm"></i>
                </button>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
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