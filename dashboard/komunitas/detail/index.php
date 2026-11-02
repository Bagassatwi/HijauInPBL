<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/community.php';

$communityId = $_GET['id'] ?? $_GET['community_id'] ?? null;
$community = fetchCommunityById((string) ($communityId ?? ''));

if (!$community) {
  $community = [
    'id' => null,
    'name' => 'Komunitas Tidak Ditemukan',
    'description' => 'Komunitas yang Anda cari tidak tersedia atau belum dibuat.',
    'city' => 'Indonesia',
    'image' => '/assets/dashboard-komunitas/bumi.png',
    'member_count' => 0,
    'created_at' => date('Y-m-d H:i:s'),
    'caption' => 'Komunitas tidak tersedia.',
  ];
}

$creatorName = 'Anggota Komunitas';
$communityPosts = [];
$communityMembers = [];

try {
  $postsStmt = $pdo->prepare("
    SELECT cp.id, cp.caption, cp.image, cp.like_count, cp.comment_count, cp.created_at,
           p.full_name AS user_name, p.avatar_url AS user_avatar
    FROM public.community_posts cp
    LEFT JOIN public.profiles p ON p.id = cp.user_id
    WHERE cp.community_id = :community_id
    ORDER BY cp.created_at DESC
    LIMIT 5
  ");
  $postsStmt->execute([':community_id' => $community['id']]);
  $communityPosts = $postsStmt->fetchAll(PDO::FETCH_ASSOC);

  $membersStmt = $pdo->prepare("
    SELECT p.full_name, p.avatar_url, p.eco_score, cm.joined_at
    FROM public.community_members cm
    LEFT JOIN public.profiles p ON p.id = cm.user_id
    WHERE cm.community_id = :community_id
    ORDER BY cm.joined_at DESC
    LIMIT 8
  ");
  $membersStmt->execute([':community_id' => $community['id']]);
  $communityMembers = $membersStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
  $communityPosts = [];
  $communityMembers = [];
}

$memberCount = (int) ($community['member_count'] ?? count($communityMembers));
$websiteBanner = $community['image'] ?: '/assets/dashboard-komunitas/bumi.png';
$communityJoinedAt = $community['created_at'] ? date('d M Y', strtotime($community['created_at'])) : 'Baru dibuat';
$communityDescription = $community['description'] ?: ($community['caption'] ?: 'Komunitas ramah lingkungan.');
$userId = $_SESSION['user']['id'] ?? '';
$joinedCommunityIds = fetchJoinedCommunityIdsByUser($userId);
$isUserJoinedCommunity = !empty($community['id']) && in_array((string) $community['id'], $joinedCommunityIds, true);
$weeklyChartData = [
  ['day' => 'Sen', 'value' => 160],
  ['day' => 'Sel', 'value' => 270],
  ['day' => 'Rab', 'value' => 200],
  ['day' => 'Kam', 'value' => 200],
  ['day' => 'Jum', 'value' => 390],
  ['day' => 'Sab', 'value' => 320],
  ['day' => 'Min', 'value' => 200],
];

$upcomingEvents = [
  ['img' => '/assets/dashboard-komunitas/plant.png', 'title' => 'Aksi Tanam Pohon', 'date' => '25 Mei 2025', 'loc' => 'Bogor, Jawa Barat', 'participants' => '125 peserta'],
  ['img' => '/assets/dashboard-komunitas/clean.png', 'title' => 'Bersih Pantai Bersama', 'date' => '8 Juni 2025', 'loc' => 'Bali', 'participants' => '210 peserta'],
  ['img' => '/assets/dashboard-komunitas/energy.png', 'title' => 'Workshop Zero Waste', 'date' => '15 Juni 2025', 'loc' => 'Online (Zoom)', 'participants' => '150 peserta'],
];
?>

<div class="flex flex-col w-full gap-6 z-10">
  <!-- Navigation -->
  <a href="/dashboard/komunitas/index.php" class="hover:text-[#11773D] w-max flex items-center gap-3 text-base font-bold text-gray-800 transition-colors">
    ⬅ Kembali ke Komunitas
  </a>

  <!-- Community Header Card -->
  <div class="rounded-3xl overflow-hidden bg-white shadow-sm">
    <div class="h-75 relative w-full">
      <img src="<?= htmlspecialchars($websiteBanner) ?>" alt="Banner" class="w-full h-64 object-cover" />
    </div>

    <div class="relative px-8 pt-4 pb-8">
      <div class="lg:flex-row lg:items-end flex flex-col items-start justify-between gap-6">
        <div class="lg:flex-row lg:items-center lg:-mt-20 relative flex flex-col items-start gap-6 -mt-24">
          <div class="shrink-0 relative z-10 w-40 h-40 overflow-hidden bg-white border-4 border-white rounded-full shadow-sm">
            <img src="<?= htmlspecialchars($websiteBanner) ?>" alt="Avatar" class="object-cover w-full h-full" />
          </div>
          <div class="lg:mt-16 flex flex-col gap-2 mt-4">
            <h1 class="flex items-center gap-2 text-3xl font-extrabold text-gray-800">
              <?= htmlspecialchars($community['name'] ?? 'Komunitas') ?> <span class="text-[#11773D]">✓</span>
            </h1>
            <div class="flex items-center gap-6 text-base font-semibold text-gray-600">
              <span>👥 <?= number_format($memberCount, 0, ',', '.') ?> Anggota</span>
              <span>📅 Bergabung sejak <?= htmlspecialchars($communityJoinedAt) ?></span>
            </div>
            <p class="text-base font-medium text-gray-800"><?= htmlspecialchars($communityDescription) ?></p>
          </div>
        </div>

        <div class="lg:w-auto flex items-center w-full gap-3">
          <button
            type="button"
            class="join-community-btn bg-[#11773D] rounded-xl flex items-center justify-center flex-1 gap-2 px-6 py-3 text-base font-bold text-white disabled:cursor-not-allowed disabled:opacity-60"
            data-community-id="<?= htmlspecialchars((string) ($community['id'] ?? '')) ?>"
            data-joined="<?= $isUserJoinedCommunity ? '1' : '0' ?>"
            <?= empty($community['id'] ?? '') ? 'disabled' : '' ?>>
            <?= $isUserJoinedCommunity ? 'Lihat Komunitas' : '+ Gabung ✓' ?>
          </button>
          <button class="border border-[#11773D] text-[#11773D] rounded-xl flex items-center justify-center flex-1 gap-2 px-6 py-3 text-base font-bold">
            Undang Teman
          </button>
          <button class="rounded-xl border border-gray-200 p-3 text-gray-600">
            🔗
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Grid Layout -->
  <div class="lg:grid-cols-3 grid grid-cols-1 gap-6">
    <!-- Left Column -->
    <div class="lg:col-span-2 flex flex-col gap-6">
      <div class="rounded-3xl flex flex-col bg-white shadow-sm">
        <!-- Primary Tabs -->
        <div class="flex items-center gap-8 px-8 pt-6 overflow-x-auto border-b border-gray-100">
          <button class="text-[#11773D] border-[#11773D] whitespace-nowrap pb-4 text-base font-bold border-b-2">Postingan</button>
          <button class="whitespace-nowrap pb-4 text-base font-bold text-gray-500">Tentang</button>
          <button class="whitespace-nowrap pb-4 text-base font-bold text-gray-500">Event</button>
          <button class="whitespace-nowrap pb-4 text-base font-bold text-gray-500">Anggota</button>
          <button class="whitespace-nowrap pb-4 text-base font-bold text-gray-500">Leaderboard</button>
        </div>

        <div class="flex flex-col gap-8 p-8">
          <div class="rounded-2xl p-5 border border-gray-100">
            <div class="flex items-start gap-4 mb-4">
              <img src="<?= htmlspecialchars($_SESSION['user']['avatar_url'] ?? '/assets/ava1.jpg') ?>" alt="User" class="shrink-0 object-cover w-12 h-12 rounded-full" />
              <div class="rounded-xl bg-gray-50 flex-1 p-4 border border-gray-200">
                <p class="mb-2 text-base font-bold text-gray-800">Apa aksi hijaumu hari ini?</p>
                <textarea placeholder="Tulis sesuatu..." class="w-full h-12 text-base font-medium bg-transparent outline-none resize-none"></textarea>
              </div>
            </div>
            <div class="flex items-center justify-between pl-16">
              <div class="flex items-center gap-6">
                <button class="flex items-center gap-2 text-base font-bold text-gray-600">📷 Foto</button>
                <button class="flex items-center gap-2 text-base font-bold text-gray-600">📍 Lokasi</button>
                <button class="flex items-center gap-2 text-base font-bold text-gray-600">🍃 Aktivitas</button>
              </div>
              <button class="bg-[#11773D] text-white px-6 py-2.5 rounded-xl font-bold text-base">
                Posting
              </button>
            </div>
          </div>

          <div class="flex flex-col gap-8">
            <?php if (empty($communityPosts)): ?>
              <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">
                Belum ada postingan di komunitas ini.
              </div>
            <?php else: ?>
              <?php foreach ($communityPosts as $post): ?>
                <div class="flex flex-col gap-4 pb-8 border-b border-gray-100">
                  <div class="flex items-start justify-between">
                    <div class="flex items-center gap-3">
                      <img src="<?= htmlspecialchars($post['user_avatar'] ?: '/assets/ava1.jpg') ?>" alt="" class="object-cover w-12 h-12 rounded-full" />
                      <div>
                        <div class="flex items-center gap-2">
                          <h4 class="text-lg font-bold text-gray-800"><?= htmlspecialchars($post['user_name'] ?: 'Anggota') ?></h4>
                          <span class="bg-[#EEF8F0] text-[#11773D] text-base px-3 py-0.5 rounded-full font-bold">Eco Contributor</span>
                        </div>
                        <div class="text-base font-medium text-gray-500"><?= htmlspecialchars(date('d M Y', strtotime($post['created_at']))) ?></div>
                      </div>
                    </div>
                  </div>
                  <p class="text-base font-medium leading-relaxed text-gray-800"><?= nl2br(htmlspecialchars($post['caption'] ?? '')) ?></p>
                  <?php if (!empty($post['image'])): ?>
                    <img src="<?= htmlspecialchars($post['image']) ?>" alt="Post" class="h-40 w-full rounded-xl object-cover" />
                  <?php endif; ?>
                  <div class="flex gap-6 text-sm text-gray-500">
                    <span>❤️ <?= (int) ($post['like_count'] ?? 0) ?></span>
                    <span>💬 <?= (int) ($post['comment_count'] ?? 0) ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div class="lg:col-span-1 flex flex-col gap-6">
      <div class="rounded-3xl p-6 bg-white shadow-sm">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Ringkasan Komunitas</h3>
        <div class="grid grid-cols-2 gap-4 mb-6">
          <div>
            <div class="mb-2 text-base font-bold text-gray-500">Komunitas Bergabung</div>
            <div class="text-[#11773D] text-3xl font-black"><?= number_format((int) ($community['member_count'] ?? 0), 0, ',', '.') ?></div>
          </div>
          <div>
            <div class="mb-2 text-base font-bold text-gray-500">Total Anggota</div>
            <div class="text-3xl font-black text-gray-800"><?= number_format((int) count($communityMembers), 0, ',', '.') ?></div>
          </div>
        </div>
        <div class="mb-6">
          <div class="mb-2 text-base font-bold text-gray-800">Deskripsi</div>
          <p class="text-base font-medium leading-relaxed text-gray-600"><?= htmlspecialchars($communityDescription) ?></p>
        </div>
      </div>

      <div class="rounded-3xl p-6 bg-white shadow-sm">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Anggota Aktif</h3>
        <div class="flex flex-col gap-5">
          <?php if (empty($communityMembers)): ?>
            <div class="text-sm text-gray-500">Belum ada anggota yang tergabung.</div>
          <?php else: ?>
            <?php foreach ($communityMembers as $index => $member): ?>
              <div class="flex items-center gap-4">
                <img src="<?= htmlspecialchars($member['avatar_url'] ?: '/assets/ava1.jpg') ?>" alt="" class="h-12 w-12 rounded-full object-cover" />
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-bold text-gray-800"><?= htmlspecialchars($member['full_name'] ?: 'Anggota') ?></div>
                  <div class="text-xs text-gray-500">Eco Score: <?= (int) ($member['eco_score'] ?? 0) ?></div>
                </div>
                <span class="text-xs font-bold text-[#11773D]">#<?= $index + 1 ?></span>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="rounded-3xl p-6 bg-white shadow-sm">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Event Mendatang</h3>
        <div class="flex flex-col gap-5">
          <?php foreach ($upcomingEvents as $ev): ?>
            <div class="flex items-center gap-4">
              <img src="<?= htmlspecialchars($ev['img']) ?>" alt="" class="w-20 h-20 rounded-xl object-cover shrink-0" />
              <div>
                <div class="text-base font-bold text-gray-800"><?= htmlspecialchars($ev['title']) ?></div>
                <div class="text-sm text-gray-500 font-medium">📅 <?= htmlspecialchars($ev['date']) ?></div>
                <div class="text-sm text-gray-500 font-medium">📍 <?= htmlspecialchars($ev['loc']) ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.join-community-btn').forEach(function(button) {
    button.addEventListener('click', async function() {
      const communityId = this.dataset.communityId;
      if (!communityId) {
        alert('Komunitas belum tersedia untuk bergabung.');
        return;
      }

      if (this.dataset.joined === '1') {
        window.location.href = '/dashboard/komunitas/detail?id=' + communityId;
        return;
      }

      const response = await fetch('/dashboard/actions/community/join_community.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
          community_id: communityId
        }).toString(),
        credentials: 'same-origin'
      });

      const result = await response.json();
      alert(result.message || 'Proses bergabung selesai.');

      if (result.success) {
        window.location.reload();
      }
    });
  });
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>