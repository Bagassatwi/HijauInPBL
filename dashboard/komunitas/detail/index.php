<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once dirname(__DIR__) . '/services/community.php';

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

$isCommunityOwner = isCommunityOwner($userId, $community);
$isCommunityMember = isCommunityMember($userId, (string) ($community['id'] ?? ''));
$communityMembersDetailed = fetchCommunityMembersDetailed((string) ($community['id'] ?? ''));
$communityEvents = fetchCommunityEvents((string) ($community['id'] ?? ''));
$communityLeaderboard = array_values(array_filter($communityMembersDetailed, fn($member) => !empty($member['eco_score']) || !empty($member['full_name'])));
usort($communityLeaderboard, fn($a, $b) => (int)($b['eco_score'] ?? 0) <=> (int)($a['eco_score'] ?? 0));

ensureCommunityFeatureSchema();
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
          <button id="inviteCommunityBtn" type="button" class="border border-[#11773D] text-[#11773D] rounded-xl flex items-center justify-center flex-1 gap-2 px-6 py-3 text-base font-bold">Undang Teman</button>
          <button id="shareCommunityBtn" type="button" class="rounded-xl border border-gray-200 p-3 text-gray-600" title="Salin tautan komunitas">🔗</button>
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
          <button type="button" data-detail-tab="posting" class="active-tab detail-tab text-[#11773D] border-[#11773D] whitespace-nowrap pb-4 text-base font-bold border-b-2">Postingan</button>
          <button type="button" data-detail-tab="about" class="detail-tab whitespace-nowrap pb-4 text-base font-bold text-gray-500 border-b-2 border-transparent">Tentang</button>
          <button type="button" data-detail-tab="events" class="detail-tab whitespace-nowrap pb-4 text-base font-bold text-gray-500 border-b-2 border-transparent">Event</button>
          <button type="button" data-detail-tab="members" class="detail-tab whitespace-nowrap pb-4 text-base font-bold text-gray-500 border-b-2 border-transparent">Anggota</button>
          <button type="button" data-detail-tab="leaderboard" class="detail-tab whitespace-nowrap pb-4 text-base font-bold text-gray-500 border-b-2 border-transparent">Leaderboard</button>
          <?php if ($isCommunityOwner): ?>
            <button type="button" data-detail-tab="settings" class="detail-tab whitespace-nowrap pb-4 text-base font-bold text-gray-500 border-b-2 border-transparent">⚙️ Pengaturan</button>
          <?php endif; ?>
        </div>

        <div class="flex flex-col gap-8 p-8" id="community-detail-tabs">
          <!-- Postingan Tab -->
          <div data-detail-tab-content="posting" class="detail-tab-content">
            <div class="rounded-2xl p-5 border border-gray-100">
              <?php if ($isCommunityMember): ?>
                <form id="communityPostForm" class="flex flex-col gap-3">
                  <input type="hidden" name="community_id" value="<?= htmlspecialchars((string)$community['id']) ?>" />
                  <textarea name="caption" required placeholder="Apa aksi hijaumu hari ini?" class="w-full h-24 rounded-xl border border-gray-200 p-4 text-base outline-none focus:border-[#11773D]"></textarea>
                  <input name="image" type="text" placeholder="URL gambar (opsional)" class="h-11 rounded-xl border border-gray-200 px-4 text-sm outline-none focus:border-[#11773D]" />
                  <button type="submit" class="self-end bg-[#11773D] text-white px-6 py-2.5 rounded-xl font-bold text-base">Posting</button>
                </form>
              <?php else: ?>
                <div class="text-sm font-semibold text-gray-500">Gabung ke komunitas untuk membuat postingan.</div>
              <?php endif; ?>
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

          <!-- Tentang Tab -->
          <div data-detail-tab-content="about" class="detail-tab-content hidden">
            <div class="rounded-2xl p-5 border border-gray-100">
              <h4 class="mb-4 text-lg font-bold text-gray-800">Tentang Komunitas Ini</h4>
              <p class="text-base font-medium leading-relaxed text-gray-800"><?= nl2br(htmlspecialchars($community['description'] ?? '')) ?></p>
            </div>
          </div>

          <!-- Event Tab -->
          <div data-detail-tab-content="events" class="detail-tab-content hidden">
            <?php if ($isCommunityOwner): ?>
              <form id="communityEventForm" class="mb-5 grid grid-cols-1 md:grid-cols-2 gap-3 rounded-2xl border border-gray-100 p-5">
                <input type="hidden" name="community_id" value="<?= htmlspecialchars((string)$community['id']) ?>" />
                <input name="title" required placeholder="Nama event" class="h-11 rounded-xl border border-gray-200 px-4" />
                <input name="location" placeholder="Lokasi" class="h-11 rounded-xl border border-gray-200 px-4" />
                <input name="event_date" type="datetime-local" class="h-11 rounded-xl border border-gray-200 px-4" />
                <input name="image" placeholder="URL gambar (opsional)" class="h-11 rounded-xl border border-gray-200 px-4" />
                <textarea name="description" placeholder="Deskripsi event" class="md:col-span-2 rounded-xl border border-gray-200 p-4"></textarea>
                <button type="submit" class="md:col-span-2 justify-self-end rounded-xl bg-[#11773D] px-5 py-2.5 font-bold text-white">Buat Event</button>
              </form>
            <?php endif; ?>
            <div class="flex flex-col gap-4">
              <?php if (empty($communityEvents)): ?>
                <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">Belum ada event yang dijadwalkan.</div>
              <?php else: ?>
                <?php foreach ($communityEvents as $event): ?>
                  <div class="rounded-2xl p-4 border border-gray-100">
                    <div class="flex items-center gap-4">
                      <img src="<?= htmlspecialchars($event['image'] ?: '/assets/dashboard-komunitas/plant.png') ?>" alt="" class="w-16 h-16 rounded-xl object-cover" />
                      <div class="flex-1">
                        <p class="text-lg font-bold text-gray-800"><?= htmlspecialchars($event['title']) ?></p>
                        <p class="text-sm text-gray-500">📅 <?= $event['event_date'] ? htmlspecialchars(date('d M Y H:i', strtotime($event['event_date']))) : 'Tanggal belum ditentukan' ?></p>
                        <p class="text-sm text-gray-500">📍 <?= htmlspecialchars($event['location'] ?: 'Lokasi belum ditentukan') ?></p>
                        <p class="text-xs text-gray-500 mt-1"><?= (int)$event['participant_count'] ?> peserta</p>
                      </div>
                      <?php if ($isCommunityMember): ?>
                        <button type="button" class="join-event-btn rounded-xl border border-[#11773D] px-4 py-2 text-sm font-bold text-[#11773D]" data-event-id="<?= htmlspecialchars($event['id']) ?>">Ikut Event</button>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>

          <!-- Anggota Tab -->
          <div data-detail-tab-content="members" class="detail-tab-content hidden">
            <div class="flex flex-col gap-4">
              <?php if (empty($communityMembersDetailed)): ?>
                <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">Belum ada anggota yang tergabung.</div>
              <?php else: ?>
                <?php foreach ($communityMembersDetailed as $index => $member): ?>
                  <div class="flex items-center gap-4 p-4 rounded-2xl border border-gray-100">
                    <img src="<?= htmlspecialchars($member['avatar_url'] ?: '/assets/ava1.jpg') ?>" alt="" class="h-12 w-12 rounded-full object-cover" />
                    <div class="flex-1 min-w-0">
                      <div class="text-sm font-bold text-gray-800"><?= htmlspecialchars($member['full_name'] ?: 'Anggota') ?></div>
                      <div class="text-xs text-gray-500">Eco Score: <?= (int)($member['eco_score'] ?? 0) ?> • <?= $member['role'] === 'owner' ? 'Pemilik' : 'Anggota' ?></div>
                    </div>
                    <?php if ($isCommunityOwner && $member['role'] !== 'owner'): ?>
                      <button type="button" class="remove-member-btn rounded-xl border border-red-200 px-3 py-2 text-xs font-bold text-red-600" data-member-id="<?= htmlspecialchars($member['id']) ?>">Hapus</button>
                    <?php else: ?>
                      <span class="text-xs font-bold text-[#11773D]">#<?= $index + 1 ?></span>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>

          <!-- Leaderboard Tab -->
          <div data-detail-tab-content="leaderboard" class="detail-tab-content hidden">
            <div class="flex flex-col gap-4">
              <?php if (empty($communityLeaderboard)): ?>
                <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">
                  Belum ada data leaderboard.
                </div>
              <?php else: ?>
                <?php foreach ($communityLeaderboard as $index => $member): ?>
                  <div class="flex items-center gap-4 p-4 rounded-2xl border border-gray-100">
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

          <!-- Pengaturan Tab (Owner Only) -->
          <?php if ($isCommunityOwner): ?>
            <div data-detail-tab-content="settings" class="detail-tab-content hidden">
              <form id="communitySettingsForm" class="rounded-2xl p-5 border border-gray-100 flex flex-col gap-4">
                <input type="hidden" name="community_id" value="<?= htmlspecialchars((string)$community['id']) ?>" />
                <div><label class="mb-2 block text-sm font-semibold">Nama Komunitas</label><input name="name" required value="<?= htmlspecialchars($community['name'] ?? '') ?>" class="h-12 w-full rounded-xl border border-gray-200 px-4" /></div>
                <div><label class="mb-2 block text-sm font-semibold">Deskripsi</label><textarea name="description" rows="4" class="w-full rounded-xl border border-gray-200 p-4"><?= htmlspecialchars($community['description'] ?? '') ?></textarea></div>
                <div class="grid md:grid-cols-2 gap-4">
                  <div><label class="mb-2 block text-sm font-semibold">Kota</label><input name="city" value="<?= htmlspecialchars($community['city'] ?? 'Indonesia') ?>" class="h-12 w-full rounded-xl border border-gray-200 px-4" /></div>
                  <div><label class="mb-2 block text-sm font-semibold">URL Gambar</label><input name="image" value="<?= htmlspecialchars($community['image'] ?? '') ?>" class="h-12 w-full rounded-xl border border-gray-200 px-4" /></div>
                </div>
                <div><label class="mb-2 block text-sm font-semibold">Tag</label><input name="tags" value="<?= htmlspecialchars(implode(', ', is_array($community['tags'] ?? null) ? $community['tags'] : [])) ?>" class="h-12 w-full rounded-xl border border-gray-200 px-4" /></div>
                <button type="submit" class="self-end rounded-xl bg-[#11773D] px-6 py-3 font-bold text-white">Simpan Pengaturan</button>
              </form>
            </div>
          <?php endif; ?>
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

  // Detail Tabs Navigation
  document.querySelectorAll('.detail-tab').forEach(function(tab) {
    tab.addEventListener('click', function() {
      console.log('nigget');

      const activeTab = document.querySelector('.active-tab');
      if (activeTab) {
        activeTab.classList.remove('text-[#11773D]', 'border-[#11773D]', 'active-tab');
        activeTab.classList.add('text-gray-500', 'border-transparent');
      }

      this.classList.remove('text-gray-500', 'border-transparent');
      this.classList.add('text-[#11773D]', 'border-[#11773D]', 'active-tab');

      const targetContent = this.dataset.detailTab;
      document.querySelectorAll('.detail-tab-content').forEach(function(content) {
        content.classList.add('hidden');
      });
      document.querySelector(`[data-detail-tab-content="${targetContent}"]`).classList.remove('hidden');
    });
  });

  // Community Post Form Submission
  document.getElementById('communityPostForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const response = await fetch('/dashboard/actions/community/create_post.php', {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    });

    const result = await response.json();
    alert(result.message || 'Postingan berhasil dibuat.');

    if (result.success) {
      window.location.reload();
    }
  });

  // Remove Member Button
  document.querySelectorAll('.remove-member-btn').forEach(function(button) {
    button.addEventListener('click', async function() {
      const memberId = this.dataset.memberId;
      const communityId = '<?= $communityId ?>';

      if (!memberId || !communityId) {
        alert('Terjadi kesalahan. Silakan coba lagi.');
        return;
      }

      if (!confirm('Anda yakin ingin menghapus anggota ini dari komunitas?')) {
        return;
      }

      const response = await fetch('/dashboard/actions/community/remove_member.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
          member_id: memberId,
          community_id: communityId
        }).toString(),
        credentials: 'same-origin'
      });

      const result = await response.json();
      alert(result.message || 'Proses penghapusan selesai.');

      if (result.success) {
        window.location.reload();
      }
    });
  });

  // Community Event Form Submission
  document.getElementById('communityEventForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const response = await fetch('/dashboard/actions/community/create_event.php', {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    });

    const result = await response.json();
    alert(result.message || 'Event berhasil dibuat.');

    if (result.success) {
      window.location.reload();
    }
  });

  // Community Settings Form Submission
  document.getElementById('communitySettingsForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const response = await fetch('/dashboard/actions/community/update_community.php', {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    });

    const result = await response.json();
    alert(result.message || 'Pengaturan komunitas berhasil diperbarui.');

    if (result.success) {
      window.location.reload();
    }
  });

  document.querySelectorAll('.join-event-btn').forEach(function(button) {
    button.addEventListener('click', async function() {
      const response = await fetch('/dashboard/actions/community/join_event.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: new URLSearchParams({
          event_id: this.dataset.eventId
        }).toString(),
        credentials: 'same-origin'
      });
      const result = await response.json();
      alert(result.message || 'Pendaftaran event selesai.');
      if (result.success) window.location.reload();
    });
  });

  async function copyCommunityLink() {
    const link = window.location.href;
    try {
      await navigator.clipboard.writeText(link);
      alert('Tautan komunitas berhasil disalin.');
    } catch (e) {
      prompt('Salin tautan komunitas:', link);
    }
  }
  document.getElementById('inviteCommunityBtn')?.addEventListener('click', copyCommunityLink);
  document.getElementById('shareCommunityBtn')?.addEventListener('click', copyCommunityLink);
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>