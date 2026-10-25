<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

$userId = $_SESSION['user']['id'] ?? null;
if (!$userId) {
  header('Location: /login.php');
  exit;
}

// Fetch user profile from database
$stmt = $pdo->prepare("SELECT * FROM public.profiles WHERE id = :id LIMIT 1");
$stmt->execute([':id' => $userId]);
$userProfile = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];

// User details
$fullName   = $userProfile['full_name'] ?? $_SESSION['user']['full_name'] ?? $_SESSION['user']['name'] ?? 'User';
$avatarUrl  = !empty($userProfile['avatar_url']) ? $userProfile['avatar_url'] : '/assets/avatar.png';
$email      = $_SESSION['user']['email'] ?? $userProfile['email'] ?? '-';
$phone      = $_SESSION['user']['phone'] ?? $userProfile['phone'] ?? '-';
$city       = !empty($userProfile['city']) ? $userProfile['city'] : 'Indonesia';
$bio        = !empty($userProfile['bio']) ? $userProfile['bio'] : 'Berusaha menjadi versi terbaik untuk bumi dengan langkah kecil setiap hari.';

$createdAt  = $_SESSION['user']['created_at'] ?? $userProfile['created_at'] ?? date('Y-m-d');
$joinedDate = date('d M Y', strtotime($createdAt));

$xp     = (int)($userProfile['xp'] ?? $_SESSION['user']['xp'] ?? 760);
$level  = (int)($userProfile['level'] ?? 12);
$streak = (int)($userProfile['streak'] ?? 0);

$nextLevelXp = 1000;
$xpProgressPercentage = min(100, round(($xp / $nextLevelXp) * 100));
$xpNeeded = max(0, $nextLevelXp - $xp);

// Recent activities fetch
$actStmt = $pdo->prepare("SELECT * FROM public.eco_actions WHERE user_id = :user_id ORDER BY activity_date DESC LIMIT 4");
$actStmt->execute([':user_id' => $userId]);
$recentActivities = $actStmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($recentActivities)) {
  $recentActivities = [];
}
?>

<div class="w-full flex flex-col gap-6 mt-4">
  <!-- Main Grid Layout -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left Column (Span 2) -->
    <div class="lg:col-span-2 flex flex-col gap-6">
      <!-- Main Profile Card -->
      <div class="relative overflow-hidden rounded-[28px] border border-[#E7EFE6] bg-[#F8FCF7] px-8 lg:px-14 py-10">
        <img src="/assets/profil/main.png" alt="" class="pointer-events-none absolute right-0 bottom-0 max-h-full object-contain object-bottom-right" />

        <div class="relative z-10 flex flex-col md:flex-row items-center gap-8 lg:gap-12">
          <!-- Avatar -->
          <div class="relative shrink-0">
            <div class="relative h-37.5 w-37.5 overflow-hidden rounded-full border-4 border-white bg-white">
              <img src="<?= htmlspecialchars($avatarUrl) ?>" alt="<?= htmlspecialchars($fullName) ?>" class="w-full h-full object-cover" />
            </div>
            <button type="button" class="absolute bottom-2 -right-2 flex h-13 w-13 items-center justify-center rounded-full bg-white shadow-md transition hover:bg-gray-50">
              ✏️
            </button>
          </div>

          <!-- Content -->
          <div class="flex flex-col text-center md:text-left">
            <div class="mb-3 flex flex-wrap items-center justify-center md:justify-start gap-4">
              <h1 class="text-[32px] lg:text-[38px] font-semibold text-[#101828]">
                <?= htmlspecialchars($fullName) ?>
              </h1>
              <span class="rounded-full bg-[#EAF7EC] px-3 py-1 text-[15px] font-semibold text-[#11773D]">
                Eco Guardian
              </span>
            </div>

            <div class="mb-5 flex flex-col gap-2">
              <div class="flex items-center justify-center md:justify-start gap-3 text-[17px] font-medium text-[#475467]">
                📅 Bergabung sejak <?= htmlspecialchars($joinedDate) ?>
              </div>
              <div class="flex items-center justify-center md:justify-start gap-3 text-[17px] font-medium text-[#475467]">
                📍 <?= htmlspecialchars($city) ?>
              </div>
            </div>

            <p class="mb-8 max-w-140 text-[17px] leading-8 text-[#475467]">
              <?= nl2br(htmlspecialchars($bio)) ?>
            </p>

            <button type="button" class="flex h-15 w-fit mx-auto md:mx-0 items-center gap-3 rounded-2xl border-2 border-[#11773D] px-8 text-[18px] font-semibold text-[#11773D] transition hover:bg-[#F4FBF5]">
              ✏️ Edit Profil
            </button>
          </div>
        </div>
      </div>

      <!-- Dynamic Content Section -->
      <div class="bg-white rounded-3xl p-6 lg:p-8 shadow-sm flex flex-col gap-8 border border-gray-100">
        <!-- Tabs -->
        <div class="flex items-center gap-8 border-b border-gray-100 overflow-x-auto">
          <button type="button" class="tab-btn active text-base font-bold pb-4 whitespace-nowrap border-b-2 text-[#11773D] border-[#11773D]" data-tab="ringkasan">
            Ringkasan
          </button>
          <button type="button" class="tab-btn text-base font-bold pb-4 whitespace-nowrap border-b-2 text-gray-500 border-transparent hover:text-gray-800" data-tab="pengaturan">
            Pengaturan
          </button>
        </div>

        <!-- TAB CONTENT: RINGKASAN -->
        <div id="tab-ringkasan" class="tab-content flex flex-col gap-8">
          <!-- Ringkasan Pencapaian -->
          <div>
            <h3 class="mb-5 text-[25px] font-semibold text-[#101828]">Ringkasan Pencapaian</h3>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
              <div class="rounded-[22px] border border-[#EAECF0] bg-white px-5 py-6 text-center">
                <div class="mb-4 flex items-center justify-center gap-2">
                  <img src="/assets/challange/point.png" alt="" class="w-8 h-8 object-contain" />
                  <h4 class="text-[28px] font-semibold text-[#101828]">1.250</h4>
                </div>
                <p class="text-[15px] font-medium text-[#475467]">Total Poin</p>
              </div>

              <div class="rounded-[22px] border border-[#EAECF0] bg-white px-5 py-6 text-center">
                <div class="mb-4 flex items-center justify-center gap-2">
                  <img src="/assets/challange/t.png" alt="" class="w-8 h-8 object-contain" />
                  <h4 class="text-[28px] font-semibold text-[#101828]">8</h4>
                </div>
                <p class="text-[15px] font-medium text-[#475467]">Challenge Selesai</p>
              </div>

              <div class="rounded-[22px] border border-[#EAECF0] bg-white px-5 py-6 text-center">
                <div class="mb-4 flex items-center justify-center gap-2">
                  <img src="/assets/challange/eco.png" alt="" class="w-8 h-8 object-contain" />
                  <h4 class="text-[28px] font-semibold text-[#101828]">8</h4>
                </div>
                <p class="text-[15px] font-medium text-[#475467]">Badge Dimiliki</p>
              </div>

              <div class="rounded-[22px] border border-[#EAECF0] bg-white px-5 py-6 text-center">
                <div class="mb-4 flex items-center justify-center gap-2">
                  <img src="/assets/profil/calendar.png" alt="" class="w-8 h-8 object-contain" />
                  <h4 class="text-[28px] font-semibold text-[#101828]"><?= $streak ?></h4>
                </div>
                <p class="text-[15px] font-medium text-[#475467]">Hari Aktif Konsisten</p>
              </div>
            </div>
          </div>

          <!-- Tentang Saya -->
          <div>
            <h3 class="mb-6 text-[25px] font-semibold text-[#101828]">Tentang Saya</h3>
            <div class="rounded-[22px] border border-[#EAECF0] bg-white divide-y divide-[#EAECF0]">
              <div class="flex items-center justify-between px-8 py-5">
                <div class="flex items-center gap-5">
                  <span class="text-xl">✉️</span>
                  <span class="w-42.5 text-[18px] font-medium text-[#475467]">Email</span>
                  <span class="text-[18px] font-medium text-[#475467]"><?= htmlspecialchars($email) ?></span>
                </div>
                <span class="text-[#475467]">➔</span>
              </div>

              <div class="flex items-center justify-between px-8 py-5">
                <div class="flex items-center gap-5">
                  <span class="text-xl">📞</span>
                  <span class="w-42.5 text-[18px] font-medium text-[#475467]">Nomor Telepon</span>
                  <span class="text-[18px] font-medium text-[#475467]"><?= htmlspecialchars($phone) ?></span>
                </div>
                <span class="text-[#475467]">➔</span>
              </div>

              <div class="flex items-center justify-between px-8 py-5">
                <div class="flex items-center gap-5">
                  <span class="text-xl">📍</span>
                  <span class="w-42.5 text-[18px] font-medium text-[#475467]">Lokasi</span>
                  <span class="text-[18px] font-medium text-[#475467]"><?= htmlspecialchars($city) ?></span>
                </div>
                <span class="text-[#475467]">➔</span>
              </div>
            </div>
          </div>

          <!-- Footer Banner -->
          <div class="relative overflow-hidden rounded-3xl bg-[#F5FAF5] px-10 py-8">
            <div class="relative z-10">
              <h3 class="mb-3 text-[25px] font-semibold text-[#11773D]">
                Teruslah beraksi untuk bumi! 🌱
              </h3>
              <p class="text-[16px] font-medium text-[#475467]">
                Setiap langkah kecilmu membawa perubahan besar.
              </p>
            </div>
            <img src="/assets/profil/bumi.png" alt="" class="absolute bottom-0 right-8 w-48 object-contain" />
          </div>
        </div>

        <!-- TAB CONTENT: PENGATURAN -->
        <div id="tab-pengaturan" class="tab-content hidden flex-col gap-6">
          <h3 class="font-bold text-lg text-gray-800">Pengaturan Akun</h3>
          <p class="text-base text-gray-500 font-medium">Opsi pengaturan akan ditampilkan di sini.</p>
        </div>
      </div>
    </div>

    <!-- Right Column (Span 1) -->
    <div class="lg:col-span-1 flex flex-col gap-6">
      <!-- Level & Progress -->
      <div class="rounded-[28px] border border-[#EAECF0] bg-white p-8">
        <h3 class="mb-8 text-[20px] font-semibold text-[#101828]">Level & Progress</h3>

        <div class="mb-8 flex items-center gap-8">
          <img src="/assets/profil/lv.png" alt="Level Badge" class="w-20 h-20 object-contain" />
          <div>
            <h2 class="text-[30px] font-semibold leading-none text-[#101828]">Level <?= $level ?></h2>
            <p class="mt-3 text-[20px] font-medium text-[#344054]">Eco Guardian</p>
          </div>
        </div>

        <div class="mb-4 h-2.5 overflow-hidden rounded-full bg-[#DDE3DE]">
          <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $xpProgressPercentage ?>%;"></div>
        </div>

        <div class="mb-8 flex justify-end">
          <span class="text-[18px] font-semibold text-[#344054]"><?= $xp ?> / <?= $nextLevelXp ?> XP</span>
        </div>

        <div class="flex items-end justify-between">
          <p class="text-[18px] font-medium text-[#344054]">
            <?= $xpNeeded ?> XP lagi untuk naik level!
          </p>
        </div>
      </div>

      <!-- Badge Saya -->
      <div class="rounded-[28px] border border-[#EAECF0] bg-white p-8">
        <div class="mb-8 flex items-center justify-between">
          <h3 class="text-[20px] font-semibold text-[#101828]">Badge Saya</h3>
          <button type="button" class="text-[18px] font-semibold text-[#11773D] hover:underline">Lihat Semua</button>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="flex flex-col items-center text-center">
            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#F6FAF5]">
              <img src="/assets/profil/eco-warrior.png" alt="Eco Warrior" class="w-16 h-16 object-contain" />
            </div>
            <p class="mt-3 text-[15px] font-medium text-[#475467]">Eco Warrior</p>
          </div>

          <div class="flex flex-col items-center text-center">
            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#F6FAF5]">
              <img src="/assets/profil/water.png" alt="Water Saver" class="w-16 h-16 object-contain" />
            </div>
            <p class="mt-3 text-[15px] font-medium text-[#475467]">Water Saver</p>
          </div>

          <div class="flex flex-col items-center text-center">
            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#F6FAF5]">
              <img src="/assets/profil/green-starter.png" alt="Green Starter" class="w-16 h-16 object-contain" />
            </div>
            <p class="mt-3 text-[15px] font-medium text-[#475467]">Green Starter</p>
          </div>

          <div class="flex flex-col items-center text-center">
            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#F6FAF5]">
              <img src="/assets/profil/energi.png" alt="Energy Saver" class="w-16 h-16 object-contain" />
            </div>
            <p class="mt-3 text-[15px] font-medium text-[#475467]">Energy Saver</p>
          </div>
        </div>
      </div>

      <!-- Aktivitas Terakhir -->
      <div class="rounded-[28px] border border-[#EAECF0] bg-white p-8">
        <div class="mb-8 flex items-center justify-between">
          <h3 class="text-[20px] font-semibold text-[#101828]">Aktivitas Terakhir</h3>
          <button type="button" class="text-[18px] font-semibold text-[#11773D] hover:underline">Lihat Semua</button>
        </div>

        <div class="flex flex-col gap-6">
          <?php if (count($recentActivities) == 0) {
          ?>
            <div class="flex items-center justify-between">
              None
            </div>
          <?php
          }
          ?>
          <?php foreach ($recentActivities as $act): ?>
            <?php
            $title = $act['title'] ?? 'Aktivitas';
            $action = $act['action'] ?? 'Mencatat aktivitas';
            $time = !empty($act['activity_date']) ? date('H:i, d M', strtotime($act['activity_date'])) : ($act['time'] ?? 'Baru saja');
            $pt = isset($act['point']) ? (int)$act['point'] : 0;
            $image = $act['image'] ?? '/assets/tumbler.png';
            ?>
            <div class="grid grid-cols-[auto_1fr_auto] gap-4 items-center">
              <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#EEF4EC] p-2">
                <img src="<?= htmlspecialchars($image) ?>" alt="" class="size-full object-contain" />
              </div>
              <div>
                <p class="text-[13px] font-medium text-[#667085]"><?= htmlspecialchars($action) ?></p>
                <h4 class="mt-0.5 text-[18px] font-semibold text-[#344054]"><?= htmlspecialchars($title) ?></h4>
                <p class="mt-0.5 text-[13px] font-medium text-[#667085]"><?= htmlspecialchars($time) ?></p>
              </div>
              <p class="text-2xl font-semibold items-center <?= $pt > 0 ? 'text-[#11773D]' : 'text-[#98A2B3]' ?>">
                <?= $pt > 0 ? '+' . $pt . ' Poin' : '-' ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>

        <button type="button" class="mt-8 flex w-full items-center justify-center gap-2 rounded-2xl border border-[#EAECF0] py-4 text-[18px] font-semibold text-[#11773D] transition hover:bg-[#F8FAF8]">
          Lihat Semua Aktivitas ➔
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const tabBtns = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tab-content");

    tabBtns.forEach(btn => {
      btn.addEventListener("click", function() {
        const targetTab = this.dataset.tab;

        tabBtns.forEach(b => {
          b.classList.remove("text-[#11773D]", "border-[#11773D]", "active");
          b.classList.add("text-gray-500", "border-transparent");
        });

        this.classList.remove("text-gray-500", "border-transparent");
        this.classList.add("text-[#11773D]", "border-[#11773D]", "active");

        tabContents.forEach(content => {
          if (content.id === `tab-${targetTab}`) {
            content.classList.remove("hidden");
            content.classList.add("flex");
          } else {
            content.classList.add("hidden");
            content.classList.remove("flex");
          }
        });
      });
    });
  });
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>