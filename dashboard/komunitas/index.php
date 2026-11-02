<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/community.php';

$userId = $_SESSION['user']['id'] ?? '';
$joinedCommunityIds = fetchJoinedCommunityIdsByUser($userId);
$joinedCommunityLookup = array_flip($joinedCommunityIds);
$communitySummary = fetchCommunitySummaryForUser($userId);

$weeklyChartData = fetchCommunityWeeklyActivity();
if (empty($weeklyChartData)) {
  $weeklyChartData = [
    ['day' => 'Sen', 'value' => 160],
    ['day' => 'Sel', 'value' => 270],
    ['day' => 'Rab', 'value' => 200],
    ['day' => 'Kam', 'value' => 200],
    ['day' => 'Jum', 'value' => 390],
    ['day' => 'Sab', 'value' => 320],
    ['day' => 'Min', 'value' => 200],
  ];
}

$popularCommunities = fetchPopularCommunities(5);
$posts = fetchCommunityPosts();
$myCommunitiesJoined = fetchJoinedCommunitiesByUser($userId);

$myCommunitiesCreated = [
  ['image' => '/assets/dashboard-komunitas/bike.png', 'title' => 'Go Green', 'desc' => 'Gaya hidup hijau, pilihan bijak untuk bumi yang lebih baik.', 'date' => 'Dibuat pada 10 Feb 2025', 'members' => '5.120', 'posts' => '97']
];

$categories = [
  ['image' => '/assets/dashboard-komunitas/leaf.png', 'title' => 'Lingkungan', 'count' => '1.245 komunitas'],
  ['image' => '/assets/dashboard-komunitas/sampah2.png', 'title' => 'Sampah & Daur Ulang', 'count' => '987 komunitas'],
  ['image' => '/assets/dashboard-komunitas/energi.png', 'title' => 'Energi & Iklim', 'count' => '876 komunitas'],
  ['image' => '/assets/dashboard-komunitas/edukasi.png', 'title' => 'Edukasi', 'count' => '654 komunitas'],
  ['image' => '/assets/dashboard-komunitas/gayahidup.png', 'title' => 'Gaya Hidup Hijau', 'count' => '1.032 komunitas']
];

$discoverCommunities = fetchDiscoverCommunities();
$contributors = fetchTopCommunityContributors(5);
if (!empty($contributors)) {
  foreach ($contributors as $index => $contributor) {
    $contributors[$index]['rank'] = $index + 1;
    $contributors[$index]['badge'] = $contributors[$index]['badge'] ?? 'Eco Contributor';
  }
}

$suggestions = [
  ['image' => '/assets/dashboard-komunitas/green.png', 'title' => 'Green Lifestyle ID', 'members' => '3.210 anggota'],
  ['image' => '/assets/dashboard-komunitas/aqua.png', 'title' => 'Clean Up Indonesia', 'members' => '2.890 anggota'],
  ['image' => '/assets/dashboard-komunitas/energy.png', 'title' => 'Energy Saving', 'members' => '2.250 anggota']
];
?>

<div class="flex flex-col w-full gap-6 mx-auto">
  <div class="lg:grid-cols-3 grid grid-cols-1 gap-6">
    <!-- Left Column (Span 2) -->
    <div class="lg:col-span-2 flex flex-col gap-6">
      <div class="rounded-3xl flex flex-col flex-1 p-6 bg-white shadow-sm">
        <!-- Navigation Tabs -->
        <div class="flex items-center gap-8 mb-6 overflow-x-auto border-b border-gray-100">
          <button type="button" class="tab-btn active text-base font-bold pb-4 whitespace-nowrap border-b-2 text-[#11773D] border-[#11773D]" data-tab="beranda">
            Beranda
          </button>
          <button type="button" class="tab-btn text-base font-bold pb-4 whitespace-nowrap border-b-2 text-gray-500 border-transparent hover:text-gray-800" data-tab="saya">
            Komunitas Saya
          </button>
          <button type="button" class="tab-btn text-base font-bold pb-4 whitespace-nowrap border-b-2 text-gray-500 border-transparent hover:text-gray-800" data-tab="temukan">
            Temukan Komunitas
          </button>
        </div>

        <!-- TAB CONTENT: BERANDA -->
        <div id="tab-beranda" class="tab-content flex flex-col gap-8">
          <div class="flex items-center gap-4">
            <div class="relative flex-1">
              <input type="text" placeholder="Cari komunitas atau topik..." class="rounded-xl focus:border-[#11773D] w-full py-3 pl-10 pr-4 text-base font-semibold border border-gray-200 outline-none" />
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
            </div>
            <button
              id="openCreateCommunityModalBtn"
              type="button"
              class="flex h-13 items-center gap-2 rounded-xl border border-[#11773D] bg-white px-6 text-[15px] font-semibold text-[#11773D]">
              ➕ Buat Komunitas
            </button>
          </div>

          <div>
            <div class="mb-6 flex items-center justify-between">
              <h3 class="text-[24px] font-semibold text-[#101828]">Komunitas Populer</h3>
              <button type="button" class="flex items-center gap-2 text-[18px] font-semibold text-[#11773D]">
                Lihat Semua ➔
              </button>
            </div>

            <?php if (empty($popularCommunities)): ?>
              <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">
                Belum ada komunitas yang tersedia.
              </div>
            <?php else: ?>
              <div class="flex items-center gap-5 overflow-x-auto pb-2">
                <?php foreach ($popularCommunities as $pop): ?>
                  <?php $isJoined = !empty($pop['id']) && isset($joinedCommunityLookup[(string) $pop['id']]); ?>
                  <div class="max-w-56 w-full wrap-break-word shrink-0 rounded-[20px] grid grid-rows-[1fr_0.75fr_auto_auto] border border-[#EAECF0] bg-white px-5 py-6 text-center shadow-[0_2px_10px_rgba(16,24,40,0.04)] transition hover:shadow-md">
                    <div class="mx-auto mb-5 flex h-24 w-24 items-center justify-center rounded-full bg-[#EEF4EC]">
                      <img src="<?= htmlspecialchars($pop['image']) ?>" alt="<?= htmlspecialchars($pop['title']) ?>" class="w-20.5 h-20.5 object-contain" />
                    </div>
                    <h4 class="text-[20px] font-semibold text-[#101828]"><?= htmlspecialchars($pop['title']) ?></h4>
                    <p class="mt-5 text-[15px] text-[#667085]"><?= htmlspecialchars($pop['members']) ?> anggota</p>
                    <button
                      type="button"
                      class="join-community-btn mt-7 flex h-11.5 w-full items-center justify-center rounded-xl border border-[#11773D] text-[18px] font-semibold text-[#11773D] transition hover:bg-[#11773D] hover:text-white disabled:cursor-not-allowed disabled:opacity-50"
                      data-community-id="<?= htmlspecialchars((string) ($pop['id'] ?? '')) ?>"
                      data-joined="<?= $isJoined ? '1' : '0' ?>"
                      <?= empty($pop['id'] ?? '') ? 'disabled' : '' ?>>
                      <?= $isJoined ? 'Lihat Komunitas' : 'Bergabung' ?>
                    </button>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>

          <div>
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-lg font-bold text-gray-800">Postingan Terbaru</h3>
              <p class="text-red-500 text-sm font-semibold">Fitur filter postingan sedang dalam tahap pengembangan (Coming Soon)</p>
            </div>
            <?php if (empty($posts)): ?>
              <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">
                Belum ada postingan di komunitas ini.
              </div>
            <?php else: ?>
              <div class="flex flex-col gap-6">
                <?php foreach ($posts as $post): ?>
                  <div class="flex items-start justify-between border-b border-[#EAECF0] py-7 last:border-b-0">
                    <div class="flex flex-1 gap-4">
                      <div class="relative h-13 w-13 shrink-0 overflow-hidden rounded-full">
                        <img src="<?= htmlspecialchars($post['avatar']) ?>" alt="<?= htmlspecialchars($post['name']) ?>" class="w-full h-full object-cover" />
                      </div>
                      <div class="flex-1">
                        <div class="flex items-center gap-3">
                          <h4 class="text-[20px] font-semibold text-[#101828]"><?= htmlspecialchars($post['name']) ?></h4>
                          <span class="rounded-full bg-[#E8F5E9] px-3 py-1 text-[13px] font-semibold text-[#11773D]">
                            <?= htmlspecialchars($post['badge']) ?>
                          </span>
                        </div>
                        <p class="mt-1 text-[15px] text-[#667085]">
                          di <span class="font-semibold text-[#475467]"><?= htmlspecialchars($post['community']) ?></span> • <?= htmlspecialchars($post['time']) ?>
                        </p>
                        <div class="mt-4 max-w-175 text-[17px] leading-8 text-[#344054]">
                          <?= $post['text'] ?>
                        </div>
                        <div class="mt-6 flex items-center gap-8">
                          <button type="button" class="flex items-center gap-2 text-[#667085]">
                            ❤️ <span class="text-[15px]"><?= htmlspecialchars($post['likes']) ?></span>
                          </button>
                          <button type="button" class="flex items-center gap-2 text-[#667085]">
                            💬 <span class="text-[15px]"><?= htmlspecialchars($post['comments']) ?></span>
                          </button>
                          <button type="button" class="text-[#667085]">🔗 Share</button>
                        </div>
                      </div>
                    </div>
                    <div class="ml-8 flex flex-col items-end">
                      <img src="<?= htmlspecialchars($post['image']) ?>" alt="" class="w-47.5 h-30 rounded-xl object-cover" />
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- TAB CONTENT: KOMUNITAS SAYA -->
        <div id="tab-saya" class="tab-content hidden flex-col gap-8">
          <div class="flex items-center justify-between gap-6">
            <div class="relative flex-1">
              <input placeholder="Cari komunitas saya..." class="h-13 w-full rounded-xl border border-[#D0D5DD] pl-10 pr-10 text-[15px] outline-none" />
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
            </div>
            <button
              id="openCreateCommunityModalBtnSecondary"
              type="button"
              class="flex h-13 items-center gap-2 rounded-xl border border-[#11773D] bg-white px-6 text-[15px] font-semibold text-[#11773D]">
              ➕ Buat Komunitas
            </button>
          </div>

          <div>
            <h2 class="text-[28px] font-semibold text-[#101828]">Komunitas Saya</h2>
            <p class="mt-1 text-[15px] text-[#667085]">Kelola dan pantau komunitas yang kamu ikuti atau buat.</p>
          </div>

          <div>
            <h3 class="mb-4 text-lg font-bold text-gray-800">Komunitas yang Saya Ikuti</h3>
            <?php if (empty($myCommunitiesJoined)): ?>
              <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">
                Anda belum mengikuti komunitas apapun.
              </div>
            <?php else: ?>
              <div class="flex flex-col gap-4">
                <?php foreach ($myCommunitiesJoined as $item): ?>
                  <div class="flex items-center justify-between border-b border-[#EAECF0] py-5">
                    <div class="flex flex-1 items-center gap-5">
                      <div class="flex h-18.5 w-18.5 items-center justify-center rounded-full bg-[#EEF4EC]">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="" class="w-17 h-17 object-contain" />
                      </div>
                      <div>
                        <h3 class="text-[24px] font-semibold text-[#101828]"><?= htmlspecialchars($item['title']) ?></h3>
                        <p class="mt-1 max-w-90 text-[15px] leading-7 text-[#667085]"><?= htmlspecialchars($item['desc']) ?></p>
                        <div class="mt-2 flex items-center gap-2 text-[14px] text-[#667085]">
                          📅 <?= htmlspecialchars($item['date']) ?>
                        </div>
                      </div>
                    </div>
                    <div class="mr-12 flex gap-14">
                      <div class="text-center">
                        <h4 class="text-[30px] font-semibold leading-none text-[#11773D]"><?= htmlspecialchars($item['members']) ?></h4>
                        <p class="mt-2 text-[15px] text-[#667085]">Anggota</p>
                      </div>
                      <div class="text-center">
                        <h4 class="text-[30px] font-semibold leading-none text-[#11773D]"><?= htmlspecialchars($item['posts']) ?></h4>
                        <p class="mt-2 text-[15px] text-[#667085]">Postingan</p>
                      </div>
                    </div>
                    <div class="flex items-center gap-6">
                      <a href="/dashboard/komunitas/detail?id=<?= urlencode((string) ($item['id'] ?? '')) ?>" class="flex h-11.5 items-center gap-2 rounded-xl border border-[#11773D] bg-white px-5 text-[15px] font-semibold text-[#11773D] transition hover:bg-[#11773D] hover:text-white">
                        ⚙️ Kelola
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- TAB CONTENT: TEMUKAN KOMUNITAS -->
        <div id="tab-temukan" class="tab-content hidden flex-col gap-8">
          <p class="text-red-500 text-sm font-semibold mb-2">Fitur filter kategori dan lokasi sedang dalam tahap pengembangan (Coming Soon)</p>
          <div class="md:flex-row flex flex-col items-center gap-4">
            <input type="text" placeholder="Cari komunitas..." disabled class="rounded-xl w-full py-3 pl-4 pr-4 text-base font-semibold border border-gray-200 bg-gray-50 text-gray-400 outline-none cursor-not-allowed" />
            <button type="button" disabled class="md:w-auto rounded-xl flex items-center justify-between w-full gap-2 px-4 py-3 text-base font-semibold text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed">
              Kategori ▼
            </button>
            <button type="button" disabled class="md:w-auto rounded-xl flex items-center justify-between w-full gap-2 px-4 py-3 text-base font-semibold text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed">
              Lokasi ▼
            </button>
          </div>

          <div>
            <h3 class="mb-5 text-[24px] font-semibold text-[#101828]">Kategori Populer</h3>
            <div class="flex items-center gap-4 overflow-x-auto pb-2">
              <?php foreach ($categories as $cat): ?>
                <div class="flex h-50.5 min-w-35 flex-col items-center justify-center rounded-[18px] border border-[#EAECF0] bg-white px-4 transition hover:shadow-sm">
                  <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#EEF4EC]">
                    <img src="<?= htmlspecialchars($cat['image']) ?>" alt="" class="w-10 h-10 object-contain" />
                  </div>
                  <h4 class="text-center text-[16px] font-semibold leading-6 text-[#101828]"><?= htmlspecialchars($cat['title']) ?></h4>
                  <p class="mt-2 text-center text-[15px] text-[#667085]"><?= htmlspecialchars($cat['count']) ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div>
            <h3 class="mb-4 text-lg font-bold text-gray-800">Semua Komunitas</h3>
            <?php if (empty($discoverCommunities)): ?>
              <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">
                Belum ada komunitas yang tersedia.
              </div>
            <?php else: ?>
              <div class="flex flex-col gap-4">
                <?php foreach ($discoverCommunities as $disc): ?>
                  <?php $isJoined = !empty($disc['id']) && isset($joinedCommunityLookup[(string) $disc['id']]); ?>
                  <div class="flex items-center justify-between rounded-[20px] border border-[#EAECF0] px-6 py-6">
                    <div class="flex flex-1 items-center gap-6">
                      <div class="flex h-20.5 w-20.5 items-center justify-center rounded-full bg-[#EEF4EC]">
                        <img src="<?= htmlspecialchars($disc['image']) ?>" alt="" class="w-18.5 h-18.5 object-contain" />
                      </div>
                      <div class="max-w-107.5">
                        <div class="flex items-center gap-2">
                          <h3 class="text-[20px] font-semibold text-[#101828]"><?= htmlspecialchars($disc['title']) ?></h3>
                          <span class="text-[#16B364]">✓</span>
                        </div>
                        <span class="mt-2 inline-flex rounded-full px-3 py-1 text-[13px] font-semibold <?= $disc['tagColor'] ?>">
                          <?= htmlspecialchars($disc['tag']) ?>
                        </span>
                        <p class="mt-3 text-[13px] leading-8 text-[#475467]"><?= htmlspecialchars($disc['desc']) ?></p>
                        <div class="mt-4 flex items-center gap-6 text-[14px] text-[#667085]">
                          <div>📍 <?= htmlspecialchars($disc['loc']) ?></div>
                          <span>•</span>
                          <div>📅 <?= htmlspecialchars($disc['date']) ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="mr-8 flex items-center gap-12">
                      <div class="text-center">
                        <span class="text-[25px] font-semibold text-[#101828]"><?= htmlspecialchars($disc['members']) ?></span>
                        <p class="mt-2 text-[15px] text-[#667085]">Anggota</p>
                      </div>
                      <div class="text-center">
                        <span class="text-[25px] font-semibold text-[#101828]"><?= htmlspecialchars($disc['posts']) ?></span>
                        <p class="mt-2 text-[15px] text-[#667085]">Postingan</p>
                      </div>
                      <button
                        type="button"
                        class="join-community-btn flex h-12 items-center rounded-xl border border-[#11773D] px-7 text-[15px] font-semibold text-[#11773D] transition hover:bg-[#11773D] hover:text-white disabled:cursor-not-allowed disabled:opacity-50"
                        data-community-id="<?= htmlspecialchars((string) ($disc['id'] ?? '')) ?>"
                        data-joined="<?= $isJoined ? '1' : '0' ?>"
                        <?= empty($disc['id'] ?? '') ? 'disabled' : '' ?>>
                        <?= $isJoined ? 'Lihat Komunitas' : 'Bergabung' ?>
                      </button>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column (Span 1) -->
    <div class="lg:col-span-1 flex flex-col gap-6">
      <div class="rounded-[28px] bg-white p-8 shadow-sm">
        <div class="mb-8 flex items-center justify-between">
          <h3 class="text-[24px] font-semibold text-[#101828]">Ringkasan Komunitas</h3>
        </div>
        <div class="grid grid-cols-2">
          <div class="pr-10">
            <p class="text-[16px] font-medium text-[#475467]">Komunitas Bergabung</p>
            <div class="mt-6 flex items-center gap-3">
              <span class="text-[42px] font-semibold leading-none text-[#11773D]">
                <?= number_format((int) ($communitySummary['joined_count'] ?? 0), 0, ',', '.') ?>
              </span>
            </div>
          </div>
          <div class="relative pl-10">
            <p class="text-[16px] font-medium text-[#475467]">Total Anggota</p>
            <div class="mt-6 flex items-center gap-3">
              <span class="text-[42px] font-semibold leading-none text-[#11773D]">
                <?= number_format((int) ($communitySummary['total_members'] ?? 0), 0, ',', '.') ?>
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Aktivitas Komunitas SVG Chart -->
      <div class="rounded-3xl border border-[#EAECF0] bg-white p-7 shadow-sm">
        <h3 class="text-[22px] font-semibold text-[#101828] mb-4">Aktivitas Komunitas</h3>
        <?php $weeklyTotal = array_sum(array_column($weeklyChartData, 'value')); ?>
        <div class="mb-1 flex items-center gap-2">
          <span class="text-[54px] font-semibold leading-none text-[#11773D]"><?= number_format((int) $weeklyTotal, 0, ',', '.') ?></span>
          <span class="text-[24px] text-[#11773D]">🍃</span>
        </div>
        <p class="mb-8 text-[18px] font-medium text-[#667085]">Aktivitas Minggu Ini</p>

        <div class="h-62.5 w-full">
          <svg class="w-full h-full overflow-visible" viewBox="0 0 320 200">
            <defs>
              <linearGradient id="greenBar" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#8BCB5E" />
                <stop offset="100%" stop-color="#11773D" />
              </linearGradient>
            </defs>
            <line x1="30" y1="0" x2="320" y2="0" stroke="#EAECF0" />
            <line x1="30" y1="40" x2="320" y2="40" stroke="#EAECF0" />
            <line x1="30" y1="80" x2="320" y2="80" stroke="#EAECF0" />
            <line x1="30" y1="120" x2="320" y2="120" stroke="#EAECF0" />
            <line x1="30" y1="160" x2="320" y2="160" stroke="#EAECF0" />

            <text x="0" y="5" fill="#667085" font-size="11">400</text>
            <text x="0" y="45" fill="#667085" font-size="11">300</text>
            <text x="0" y="85" fill="#667085" font-size="11">200</text>
            <text x="0" y="125" fill="#667085" font-size="11">100</text>
            <text x="15" y="165" fill="#667085" font-size="11">0</text>

            <?php
            $xStart = 45;
            $spacing = 38;
            foreach ($weeklyChartData as $i => $d):
              $barHeight = ($d['value'] / 400) * 160;
              $yPos = 160 - $barHeight;
              $xPos = $xStart + $i * $spacing;
            ?>
              <rect x="<?= $xPos ?>" y="<?= $yPos ?>" width="12" height="<?= $barHeight ?>" rx="4" fill="url(#greenBar)" />
              <text x="<?= $xPos - 2 ?>" y="180" fill="#667085" font-size="12" font-weight="500"><?= $d['day'] ?></text>
            <?php endforeach; ?>
          </svg>
        </div>
      </div>

      <!-- Top Kontributor -->
      <div class="rounded-3xl p-6 bg-white shadow-sm">
        <h3 class="text-[24px] font-semibold text-[#101828] mb-5">Top Kontributor</h3>
        <?php if (empty($contributors)): ?>
          <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-center text-gray-500">
            Belum ada kontributor untuk ditampilkan.
          </div>
        <?php else: ?>
          <div class="flex flex-col gap-5">
            <?php foreach ($contributors as $con): ?>
              <div class="flex items-center justify-between py-2">
                <div class="flex items-center gap-5">
                  <span class="font-bold text-[#16A34A]"><?= (int) ($con['rank'] ?? 0) ?></span>
                  <img src="<?= htmlspecialchars($con['avatar'] ?? '/assets/ava1.jpg') ?>" alt="" class="w-13 h-13 rounded-full object-cover" />
                  <div>
                    <h4 class="text-[18px] font-semibold text-[#101828]"><?= htmlspecialchars($con['name'] ?? 'Kontributor') ?></h4>
                    <p class="text-[14px] text-[#667085]"><?= htmlspecialchars($con['badge'] ?? 'Eco Contributor') ?></p>
                  </div>
                </div>
                <span class="text-[20px] font-semibold text-[#16A34A]"><?= htmlspecialchars((string) ($con['score'] ?? 0)) ?> 🍃</span>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div id="createCommunityModal" class="fixed inset-0 z-999 hidden items-center justify-center bg-black/40 p-6 backdrop-blur-sm">
  <div class="w-full max-w-2xl rounded-[28px] bg-white p-8 shadow-2xl">
    <div class="mb-6 flex items-center justify-between">
      <div>
        <h2 class="text-2xl font-bold text-gray-900">Buat Komunitas Baru</h2>
        <p class="mt-1 text-sm text-gray-500">Mulai komunitas hijau yang siap membawa dampak positif.</p>
      </div>
      <button id="closeCreateCommunityModalBtn" type="button" class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 text-xl text-gray-600 hover:bg-gray-100">×</button>
    </div>

    <form id="createCommunityForm" class="space-y-5">
      <div>
        <label class="mb-2 block text-sm font-semibold text-gray-700">Nama Komunitas</label>
        <input name="name" type="text" required class="h-12 w-full rounded-xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" placeholder="Contoh: Hijau Kota Baru" />
      </div>

      <div>
        <label class="mb-2 block text-sm font-semibold text-gray-700">Deskripsi</label>
        <textarea name="description" rows="3" class="w-full rounded-xl border border-gray-200 px-4 py-3 outline-none focus:border-[#11773D]" placeholder="Jelaskan visi komunitasmu"></textarea>
      </div>

      <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Kota</label>
          <input name="city" type="text" class="h-12 w-full rounded-xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" placeholder="Contoh: Malang" />
        </div>

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Gambar / URL</label>
          <input name="image" type="text" class="h-12 w-full rounded-xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" placeholder="https://... /assets/..." />
        </div>
      </div>

      <div>
        <label class="mb-2 block text-sm font-semibold text-gray-700">Tag (opsional)</label>
        <input name="tags" type="text" class="h-12 w-full rounded-xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" placeholder="Lingkungan, Daur Ulang, Kota" />
      </div>

      <div class="flex items-center justify-end gap-3 pt-2">
        <button id="cancelCreateCommunityBtn" type="button" class="rounded-xl border border-gray-200 px-5 py-3 font-semibold text-gray-600 hover:bg-gray-100">Batal</button>
        <button type="submit" class="rounded-xl bg-[#11773D] px-6 py-3 font-semibold text-white hover:bg-[#0E6634]">Simpan Komunitas</button>
      </div>
    </form>
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

    const createModal = document.getElementById("createCommunityModal");
    const openCreateBtn = document.getElementById("openCreateCommunityModalBtn");
    const openCreateBtnSecondary = document.getElementById("openCreateCommunityModalBtnSecondary");
    const closeCreateBtn = document.getElementById("closeCreateCommunityModalBtn");
    const cancelCreateBtn = document.getElementById("cancelCreateCommunityBtn");

    const openCreateModal = () => {
      if (createModal) {
        createModal.classList.remove("hidden")
        createModal.classList.add("flex")
      };
    };

    const closeCreateModal = () => {
      if (createModal) {
        createModal.classList.add("hidden");
        createModal.classList.remove("flex");
      }
    };

    if (openCreateBtn) openCreateBtn.addEventListener("click", openCreateModal);
    if (openCreateBtnSecondary) openCreateBtnSecondary.addEventListener("click", openCreateModal);
    if (closeCreateBtn) closeCreateBtn.addEventListener("click", closeCreateModal);
    if (cancelCreateBtn) cancelCreateBtn.addEventListener("click", closeCreateModal);

    createModal?.addEventListener("click", function(event) {
      if (event.target === createModal) closeCreateModal();
    });

    const createForm = document.getElementById("createCommunityForm");
    if (createForm) {
      createForm.addEventListener("submit", async function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const payload = new URLSearchParams();

        for (const [key, value] of formData.entries()) {
          payload.append(key, value);
        }

        const response = await fetch("/dashboard/actions/community/create_community.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            "X-Requested-With": "XMLHttpRequest"
          },
          body: payload.toString(),
          credentials: "same-origin"
        });

        const result = await response.json();

        if (result.success) {
          alert(result.message || "Komunitas berhasil dibuat.");
          window.location.reload();
          return;
        }

        alert(result.message || "Gagal membuat komunitas.");
      });
    }

    document.querySelectorAll(".join-community-btn").forEach(function(button) {
      button.addEventListener("click", async function() {
        const communityId = this.dataset.communityId;
        if (!communityId) {
          alert("Komunitas belum tersedia untuk bergabung.");
          return;
        }

        if (this.dataset.joined === "1") {
          window.location.href = "/dashboard/komunitas/detail?id=" + communityId;
          return;
        }

        const response = await fetch("/dashboard/actions/community/join_community.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            "X-Requested-With": "XMLHttpRequest"
          },
          body: new URLSearchParams({
            community_id: communityId
          }).toString(),
          credentials: "same-origin"
        });

        const result = await response.json();
        alert(result.message || "Proses bergabung selesai.");

        if (result.success) {
          window.location.reload();
        }
      });
    });
  });
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>