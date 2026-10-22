<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

$userId = $_SESSION['user']['id'] ?? '';

// Weekly chart data
$weeklyChartData = [
  ['day' => 'Sen', 'value' => 160],
  ['day' => 'Sel', 'value' => 270],
  ['day' => 'Rab', 'value' => 200],
  ['day' => 'Kam', 'value' => 200],
  ['day' => 'Jum', 'value' => 390],
  ['day' => 'Sab', 'value' => 320],
  ['day' => 'Min', 'value' => 200],
];

// Data mock definitions
$activeChallenges = [
  [
    'image' => '/assets/challange/water.png',
    'title' => 'Hemat Air Setiap Hari',
    'desc' => 'Hemat penggunaan air selama 14 hari.',
    'progress' => '8 / 14 Hari',
    'percent' => '57%',
    'point' => '200'
  ],
  [
    'image' => '/assets/challange/transportasi.png',
    'title' => 'Naik Transportasi Umum',
    'desc' => 'Gunakan transportasi umum selama 10 hari.',
    'progress' => '6 / 10 Hari',
    'percent' => '60%',
    'point' => '250'
  ],
  [
    'image' => '/assets/challange/sampah.png',
    'title' => 'Pilah Sampah di Rumah',
    'desc' => 'Pilah sampah organik dan anorganik selama 7 hari.',
    'progress' => '5 / 7 Hari',
    'percent' => '71%',
    'point' => '150'
  ],
  [
    'image' => '/assets/challange/tanam.png',
    'title' => 'Tanam dan Rawat Pohon',
    'desc' => 'Tanam atau rawat pohon selama 30 hari.',
    'progress' => '10 / 30 Hari',
    'percent' => '33%',
    'point' => '300'
  ],
  [
    'image' => '/assets/petir.png',
    'title' => 'Hemat Energi di Rumah',
    'desc' => 'Hemat penggunaan listrik selama 14 hari.',
    'progress' => '7 / 14 Hari',
    'percent' => '50%',
    'point' => '200'
  ]
];

$allChallenges = [
  [
    'image' => '/assets/challange/30hari.png',
    'title' => '30 Hari Tanpa Plastik',
    'tag' => 'Kebiasaan',
    'tagColor' => 'bg-[#E8F5E9] text-[#11773D]',
    'desc' => 'Kurangi penggunaan plastik sekali pakai selama 30 hari berturut-turut.',
    'current' => '12',
    'total' => '30',
    'percent' => '40%',
    'point' => '500',
    'badge' => 'Eco Warrior',
    'badgeImage' => '/assets/challange/ecowarrior.png'
  ],
  [
    'image' => '/assets/challange/water.png',
    'title' => 'Hemat Air Setiap Hari',
    'tag' => 'Penghematan',
    'tagColor' => 'bg-[#E3F2FD] text-[#2196F3]',
    'desc' => 'Hemat penggunaan air selama 14 hari.',
    'current' => '8',
    'total' => '14',
    'percent' => '57%',
    'point' => '200',
    'badge' => 'Water Saver',
    'badgeImage' => '/assets/challange/ecowarrior.png'
  ],
  [
    'image' => '/assets/challange/transportasi.png',
    'title' => 'Naik Transportasi Umum',
    'tag' => 'Transportasi',
    'tagColor' => 'bg-[#E8F5E9] text-[#11773D]',
    'desc' => 'Gunakan transportasi umum selama 10 hari.',
    'current' => '6',
    'total' => '10',
    'percent' => '60%',
    'point' => '250',
    'badge' => 'Eco Hero',
    'badgeImage' => '/assets/challange/ecowarrior.png'
  ],
  [
    'image' => '/assets/challange/sampah.png',
    'title' => 'Pilah Sampah di Rumah',
    'tag' => 'Lingkungan',
    'tagColor' => 'bg-[#E8F5E9] text-[#11773D]',
    'desc' => 'Pilah sampah organik dan anorganik selama 7 hari.',
    'current' => '5',
    'total' => '7',
    'percent' => '71%',
    'point' => '150',
    'badge' => 'Green Starter',
    'badgeImage' => '/assets/challange/ecowarrior.png'
  ],
  [
    'image' => '/assets/challange/tanam.png',
    'title' => 'Tanam dan Rawat Pohon',
    'tag' => 'Lingkungan',
    'tagColor' => 'bg-[#E8F5E9] text-[#11773D]',
    'desc' => 'Tanam atau rawat pohon selama 30 hari.',
    'current' => '10',
    'total' => '30',
    'percent' => '33%',
    'point' => '300',
    'badge' => 'Earth Lover',
    'badgeImage' => '/assets/challange/ecowarrior.png'
  ],
  [
    'image' => '/assets/petir.png',
    'title' => 'Hemat Energi di Rumah',
    'tag' => 'Penghematan',
    'tagColor' => 'bg-[#E3F2FD] text-[#2196F3]',
    'desc' => 'Hemat penggunaan listrik selama 14 hari.',
    'current' => '7',
    'total' => '14',
    'percent' => '50%',
    'point' => '200',
    'badge' => 'Energy Saver',
    'badgeImage' => '/assets/challange/ecowarrior.png'
  ]
];

$completedChallenges = [
  [
    'image' => '/assets/challange/sampah.png',
    'title' => 'Pilah Sampah di Rumah',
    'desc' => 'Pilah sampah organik dan anorganik selama 7 hari.',
    'date' => 'Selesai pada 12 Mei 2025',
    'point' => '150',
    'badge' => 'Green Starter',
    'badgeImage' => '/assets/challange/g.png'
  ],
  [
    'image' => '/assets/challange/water.png',
    'title' => 'Hemat Air Setiap Hari',
    'desc' => 'Hemat penggunaan air selama 14 hari.',
    'date' => 'Selesai pada 30 April 2025',
    'point' => '200',
    'badge' => 'Water Saver',
    'badgeImage' => '/assets/challange/water-saver.png'
  ],
  [
    'image' => '/assets/challange/transportasi.png',
    'title' => 'Naik Transportasi Umum',
    'desc' => 'Gunakan transportasi umum selama 10 hari.',
    'date' => 'Selesai pada 20 April 2025',
    'point' => '250',
    'badge' => 'Eco Hero',
    'badgeImage' => '/assets/challange/g.png'
  ],
  [
    'image' => '/assets/challange/tanam.png',
    'title' => 'Tanam dan Rawat Pohon',
    'desc' => 'Tanam atau rawat pohon selama 30 hari.',
    'date' => 'Selesai pada 10 April 2025',
    'point' => '300',
    'badge' => 'Earth Lover',
    'badgeImage' => '/assets/challange/earth.png'
  ],
  [
    'image' => '/assets/petir.png',
    'title' => 'Hemat Energi di Rumah',
    'desc' => 'Hemat penggunaan listrik selama 14 hari.',
    'date' => 'Selesai pada 5 April 2025',
    'point' => '200',
    'badge' => 'Energy Saver',
    'badgeImage' => '/assets/challange/listrik.png'
  ]
];
?>

<div class="flex flex-col w-full gap-6 mx-auto">
  <div class="lg:grid-cols-3 grid grid-cols-1 gap-6">
    <!-- Left Column (Span 2) -->
    <div class="lg:col-span-2 flex flex-col gap-6">
      <div class="rounded-3xl flex flex-col flex-1 p-6 bg-white shadow-sm">
        <!-- Navigation Tabs -->
        <div class="mb-8 flex items-center gap-10 border-b border-[#EAECF0]">
          <button type="button" class="tab-btn active pb-4 text-[16px] font-semibold border-b-2 border-[#11773D] text-[#11773D]" data-tab="aktif">
            Challenge Aktif
          </button>
          <button type="button" class="tab-btn pb-4 text-[16px] font-semibold border-b-2 border-transparent text-[#667085]" data-tab="semua">
            Semua Challenge
          </button>
          <button type="button" class="tab-btn pb-4 text-[16px] font-semibold border-b-2 border-transparent text-[#667085]" data-tab="selesai">
            Selesai
          </button>
        </div>

        <!-- TAB CONTENT: AKTIF -->
        <div id="tab-aktif" class="tab-content flex flex-col gap-8">
          <!-- Active Highlight -->
          <div class="rounded-[20px] border border-[#EAECF0] p-6 flex flex-col lg:flex-row items-center gap-6">
            <div class="shrink-0 flex items-center justify-center w-32 h-32 overflow-hidden rounded-full relative bg-[#EEF8EF]">
              <img src="/assets/dashboard/plastic.png" alt="" class="w-[120px] h-[120px] object-contain" />
            </div>
            <div class="flex-1 w-full">
              <span class="inline-flex rounded-full bg-[#EEF8EF] px-3 py-1 text-[12px] font-semibold text-[#11773D]">
                Tantangan Aktif
              </span>
              <h2 class="mt-3 text-[30px] font-bold text-[#101828]">30 Hari Tanpa Plastik</h2>
              <p class="mt-2 max-w-[420px] text-[15px] leading-7 text-[#667085]">
                Kurangi penggunaan plastik sekali pakai selama 30 hari berturut-turut.
              </p>
            </div>
            <div class="lg:w-1/3 flex flex-col w-full gap-3">
              <div class="flex items-end gap-2">
                <span class="text-[34px] font-bold text-[#11773D]">12</span>
                <span class="pb-1 text-[18px] text-[#98A2B3]">/ 30 Hari</span>
              </div>
              <div class="mt-4 h-[8px] w-full rounded-full bg-[#DDE3DE]">
                <div class="h-full rounded-full bg-[#11773D]" style="width: 40%;"></div>
              </div>
              <div class="mt-5 flex items-center gap-5">
                <div class="flex items-center gap-2">
                  <img src="/assets/challange/point.png" width="18" height="18" alt="" />
                  <span class="text-[14px] font-medium">500 Eco Point</span>
                </div>
                <div class="flex items-center gap-2">
                  <img src="/assets/challange/eco.png" width="18" height="18" alt="" />
                  <span class="text-[14px] font-medium">Eco Warrior</span>
                </div>
              </div>
              <div class="mt-5 inline-flex items-center w-[220px] gap-2 rounded-full bg-[#FFF7E8] px-3 py-2">
                <span class="text-[14px] font-semibold text-[#C76B00]">12 Hari Berturut-turut</span>
                <img src="/assets/challange/api.png" width="16" height="16" alt="" class="ml-2" />
              </div>
            </div>
          </div>

          <!-- Challenge Lainnya List -->
          <div>
            <div class="flex items-center justify-between mb-4">
              <h3 class="text-lg font-bold text-[#0B0F1F]">Challenge Lainnya</h3>
              <button type="button" class="text-[#11773D] flex items-center gap-1 text-base font-bold">
                Lihat Semua ➔
              </button>
            </div>
            <div class="flex flex-col gap-4">
              <?php foreach ($activeChallenges as $item): ?>
                <div class="group flex items-center justify-between border-b border-[#EAECF0] py-5 transition">
                  <div class="flex flex-1 items-center gap-5">
                    <div class="flex h-[72px] w-[72px] shrink-0 items-center justify-center rounded-full bg-[#EEF4EC]">
                      <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-[42px] h-[42px] object-contain" />
                    </div>
                    <div>
                      <h4 class="text-[22px] font-semibold text-[#101828]"><?= htmlspecialchars($item['title']) ?></h4>
                      <p class="mt-1 text-[15px] text-[#667085]"><?= htmlspecialchars($item['desc']) ?></p>
                    </div>
                  </div>
                  <div class="mr-10 w-[170px]">
                    <p class="mb-2 text-[15px] font-semibold text-[#11773D]"><?= htmlspecialchars($item['progress']) ?></p>
                    <div class="h-[7px] rounded-full bg-[#DDE3DE]">
                      <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $item['percent'] ?>;"></div>
                    </div>
                  </div>
                  <div class="mr-6 w-[70px] text-right">
                    <p class="text-[24px] font-bold text-[#11773D]"><?= htmlspecialchars($item['point']) ?></p>
                    <p class="text-[14px] text-[#667085]">Poin</p>
                  </div>
                  <span class="text-[#98A2B3]">➔</span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Cara Kerja Challenge -->
          <div class="border-[#EAECF0]">
            <h3 class="mb-8 text-[22px] font-semibold text-[#101828]">Cara Kerja Challenge</h3>
            <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-6">
              <div class="flex w-[170px] flex-col items-center text-center">
                <img src="/assets/challange/pilih.png" alt="Pilih" class="mb-5 w-[58px] h-[58px] object-contain" />
                <h4 class="text-[16px] font-semibold text-[#101828]">1. Pilih Challenge</h4>
                <p class="mt-2 text-[14px] leading-6 text-[#667085]">Pilih challenge yang kamu ingin ikuti.</p>
              </div>
              <span class="mt-6 hidden text-[#11773D] md:block text-xl">➔</span>

              <div class="flex w-[170px] flex-col items-center text-center">
                <img src="/assets/challange/aksi.png" alt="Aksi" class="mb-5 w-[78px] h-[78px] object-contain" />
                <h4 class="text-[16px] font-semibold text-[#101828]">2. Lakukan Aksi</h4>
                <p class="mt-2 text-[14px] leading-6 text-[#667085]">Lakukan aksi hijau sesuai target challenge.</p>
              </div>
              <span class="mt-6 hidden text-[#11773D] md:block text-xl">➔</span>

              <div class="flex w-[170px] flex-col items-center text-center">
                <img src="/assets/challange/dapatkanpoin.png" alt="Poin" class="mb-5 w-[76px] h-[76px] object-contain" />
                <h4 class="text-[16px] font-semibold text-[#101828]">3. Dapatkan Poin</h4>
                <p class="mt-2 text-[14px] leading-6 text-[#667085]">Setiap aksi yang tervalidasi memberi poin.</p>
              </div>
              <span class="mt-6 hidden text-[#11773D] md:block text-xl">➔</span>

              <div class="flex w-[170px] flex-col items-center text-center">
                <img src="/assets/challange/reward.png" alt="Reward" class="mb-5 w-[74px] h-[74px] object-contain" />
                <h4 class="text-[16px] font-semibold text-[#101828]">4. Raih Reward</h4>
                <p class="mt-2 text-[14px] leading-6 text-[#667085]">Selesaikan challenge dan raih reward spesial!</p>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB CONTENT: SEMUA -->
        <div id="tab-semua" class="tab-content hidden flex-col gap-6">
          <p class="text-red-500 text-sm font-semibold mb-2">Fitur filter kategori dan pencarian sedang dalam tahap pengembangan (Coming Soon)</p>

          <div class="md:flex-row flex flex-col items-center gap-4">
            <button type="button" disabled class="md:w-auto rounded-xl flex items-center justify-between w-full gap-2 px-4 py-3 text-base font-semibold text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed">
              🔍 Semua Kategori ▼
            </button>
            <div class="relative flex-1 w-full">
              <input type="text" placeholder="Cari challenge..." disabled class="rounded-xl w-full py-3 pl-4 pr-4 text-base font-semibold border border-gray-200 bg-gray-50 text-gray-400 outline-none cursor-not-allowed" />
            </div>
            <button type="button" disabled class="md:w-auto rounded-xl flex items-center justify-between w-full gap-2 px-4 py-3 text-base font-semibold text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed">
              Terbaru ▼
            </button>
          </div>

          <div class="flex flex-col gap-4">
            <?php foreach ($allChallenges as $item): ?>
              <div class="group flex items-center justify-between border-b border-[#EAECF0] py-4">
                <div class="flex flex-1 items-center gap-6">
                  <div class="flex h-[86px] w-[86px] items-center justify-center rounded-full bg-[#EEF4EC]">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-[70px] h-[70px] object-contain" />
                  </div>
                  <div>
                    <h3 class="text-[20px] font-semibold text-[#101828]"><?= htmlspecialchars($item['title']) ?></h3>
                    <span class="mt-2 inline-flex rounded-full px-3 py-1 text-[13px] font-semibold <?= $item['tagColor'] ?>">
                      <?= htmlspecialchars($item['tag']) ?>
                    </span>
                    <p class="mt-3 max-w-[330px] text-[15px] leading-8 text-[#667085]"><?= htmlspecialchars($item['desc']) ?></p>
                  </div>
                </div>

                <div class="w-[230px]">
                  <div class="mb-3">
                    <span class="text-[36px] font-semibold text-[#11773D]"><?= htmlspecialchars($item['current']) ?></span>
                    <span class="ml-2 text-[18px] font-medium text-[#667085]">/ <?= htmlspecialchars($item['total']) ?></span>
                  </div>
                  <div class="h-[6px] rounded-full bg-[#DDE3DE]">
                    <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $item['percent'] ?>;"></div>
                  </div>
                  <div class="mt-4 flex items-center gap-8">
                    <div class="flex items-center gap-2">
                      <img src="/assets/challange/point.png" alt="" width="18" height="18" />
                      <span class="text-[18px] font-semibold text-[#11773D]"><?= htmlspecialchars($item['point']) ?></span>
                      <span class="text-[15px] w-[100px] text-[#667085]">Eco Point</span>
                    </div>
                    <div class="flex items-center -ml-5 gap-2">
                      <img src="<?= htmlspecialchars($item['badgeImage']) ?>" alt="" width="18" height="18" />
                      <span class="text-[15px] w-[200px] font-medium text-[#475467]"><?= htmlspecialchars($item['badge']) ?></span>
                    </div>
                  </div>
                </div>

                <button class="ml-8 text-[#98A2B3]">➔</button>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Pagination -->
          <div class="flex items-center justify-center gap-2 mt-6">
            <button class="flex items-center justify-center w-10 h-10 text-gray-400 border border-gray-200 rounded-lg">◄</button>
            <button class="bg-[#11773D] flex items-center justify-center w-10 h-10 text-base font-bold text-white rounded-lg">1</button>
            <button class="flex items-center justify-center w-10 h-10 text-base font-bold text-gray-600 border border-gray-200 rounded-lg">2</button>
            <button class="flex items-center justify-center w-10 h-10 text-base font-bold text-gray-600 border border-gray-200 rounded-lg">3</button>
            <button class="flex items-center justify-center w-10 h-10 text-gray-600 border border-gray-200 rounded-lg">►</button>
          </div>
        </div>

        <!-- TAB CONTENT: SELESAI -->
        <div id="tab-selesai" class="tab-content hidden flex-col h-full gap-6">
          <div>
            <h3 class="mb-1 text-xl font-bold text-[#0B0F1F]">Challenge yang Telah Selesai</h3>
            <p class="mb-6 text-base text-gray-600">Terus konsisten! Setiap langkah kecil membawa perubahan besar.</p>
          </div>

          <div class="flex flex-col flex-1 gap-4">
            <?php foreach ($completedChallenges as $item): ?>
              <div class="group flex items-center justify-between rounded-[20px] border border-[#EAECF0] px-6 py-5 transition hover:shadow-sm">
                <div class="flex flex-1 items-center gap-6">
                  <div class="flex h-[82px] w-[82px] items-center justify-center rounded-full bg-[#EEF4EC]">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-[70px] h-[70px] object-contain" />
                  </div>
                  <div>
                    <h3 class="text-[20px] font-semibold text-[#101828]"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="mt-2 text-[15px] text-[#667085]"><?= htmlspecialchars($item['desc']) ?></p>
                    <div class="mt-3 flex items-center gap-2 text-[14px] text-[#667085]">
                      📅 <?= htmlspecialchars($item['date']) ?>
                    </div>
                  </div>
                </div>
                <div class="mr-8 flex flex-col items-end gap-4">
                  <p class="text-[26px] font-semibold text-[#11773D]">+<?= htmlspecialchars($item['point']) ?> Poin</p>
                  <div class="flex items-center gap-2 rounded-full bg-[#F8FAF8] px-4 py-2">
                    <img src="<?= htmlspecialchars($item['badgeImage']) ?>" alt="" class="w-[22px] h-[22px]" />
                    <span class="text-[15px] font-medium text-[#475467] whitespace-nowrap"><?= htmlspecialchars($item['badge']) ?></span>
                  </div>
                </div>
                <button class="text-[#98A2B3]">➔</button>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Pencapaian Totalmu -->
          <div class="relative mt-8 rounded-[28px] bg-[#F8FBF8] px-8 py-7 overflow-hidden">
            <img src="/assets/challange/point.png" alt="" class="absolute right-5 top-0 w-[35px] h-[35px]" />
            <h3 class="mb-6 text-[20px] font-semibold text-[#11773D]">Pencapaian Totalmu</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
              <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
                <img src="/assets/challange/point.png" alt="" class="w-[52px] h-[52px]" />
                <div>
                  <h4 class="text-[38px] font-semibold leading-none text-[#101828]">1.250</h4>
                  <p class="mt-3 text-[16px] leading-7 text-[#475467]">Total Poin<br />Diperoleh</p>
                </div>
              </div>

              <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
                <img src="/assets/challange/t.png" alt="" class="w-[52px] h-[52px]" />
                <div>
                  <h4 class="text-[38px] font-semibold leading-none text-[#101828]">8</h4>
                  <p class="mt-3 text-[16px] leading-7 text-[#475467]">Challenge<br />Selesai</p>
                </div>
              </div>

              <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
                <img src="/assets/challange/g.png" alt="" class="w-[52px] h-[52px]" />
                <div>
                  <h4 class="text-[38px] font-semibold leading-none text-[#101828]">4</h4>
                  <p class="mt-3 text-[16px] leading-7 text-[#475467]">Badge<br />Diperoleh</p>
                </div>
              </div>

              <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
                <div class="flex h-[52px] w-[52px] items-center justify-center text-3xl">📅</div>
                <div>
                  <h4 class="text-[38px] font-semibold leading-none text-[#101828]">28</h4>
                  <p class="mt-3 text-[16px] leading-7 text-[#475467]">Hari Aktif<br />Konsisten</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column (Span 1) -->
    <div class="lg:col-span-1 flex flex-col gap-6">
      <!-- Ringkasan Challenge -->
      <div class="rounded-[24px] border border-[#EAECF0] bg-white p-7 shadow-sm">
        <h3 class="mb-10 text-[22px] font-semibold text-[#101828]">Ringkasan Challenge</h3>
        <div class="flex items-center">
          <div class="flex-1">
            <p class="mb-4 text-[16px] font-medium text-[#667085]">Total Poin</p>
            <div class="flex items-center gap-2">
              <span class="text-[54px] font-semibold leading-none text-[#11773D]">1.250</span>
              <img src="/assets/challange/point.png" alt="Leaf" class="w-[26px] h-[26px] object-contain" />
            </div>
          </div>

          <div class="mx-10 h-20 w-px bg-[#EAECF0]"></div>

          <div class="flex-1">
            <p class="mb-4 text-[16px] font-medium text-[#667085]">Challenge Selesai</p>
            <div class="flex items-center gap-3">
              <span class="text-[54px] font-semibold leading-none text-[#11773D]">8</span>
              <img src="/assets/challange/t.png" alt="Trophy" class="w-[28px] h-[28px] object-contain" />
            </div>
          </div>
        </div>
      </div>

      <!-- Progress Mingguan -->
      <div class="rounded-[24px] border border-[#EAECF0] bg-white p-7 shadow-sm">
        <div class="mb-5 flex items-center justify-between">
          <h3 class="text-[22px] font-semibold text-[#101828]">Progress Mingguan</h3>
          <button class="text-[15px] font-semibold text-[#11773D] hover:underline">Lihat Detail</button>
        </div>

        <div class="mb-1 flex items-center gap-2">
          <span class="text-[54px] font-semibold leading-none text-[#11773D]">320</span>
          <img src="/assets/challange/point.png" alt="Leaf" class="w-[24px] h-[24px] object-contain" />
        </div>
        <p class="mb-8 text-[18px] font-medium text-[#667085]">Poin</p>

        <!-- SVG Bar Chart -->
        <div class="h-[250px] w-full">
          <svg class="w-full h-full overflow-visible" viewBox="0 0 320 200">
            <defs>
              <linearGradient id="greenBar" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#8BCB5E" />
                <stop offset="100%" stop-color="#11773D" />
              </linearGradient>
            </defs>

            <!-- Grid Lines -->
            <line x1="30" y1="0" x2="320" y2="0" stroke="#EAECF0" />
            <line x1="30" y1="40" x2="320" y2="40" stroke="#EAECF0" />
            <line x1="30" y1="80" x2="320" y2="80" stroke="#EAECF0" />
            <line x1="30" y1="120" x2="320" y2="120" stroke="#EAECF0" />
            <line x1="30" y1="160" x2="320" y2="160" stroke="#EAECF0" />

            <!-- Y-Axis Labels -->
            <text x="0" y="5" fill="#667085" font-size="11">400</text>
            <text x="0" y="45" fill="#667085" font-size="11">300</text>
            <text x="0" y="85" fill="#667085" font-size="11">200</text>
            <text x="0" y="125" fill="#667085" font-size="11">100</text>
            <text x="15" y="165" fill="#667085" font-size="11">0</text>

            <!-- Bars -->
            <?php
            $xStart = 45;
            $spacing = 38;
            foreach ($weeklyChartData as $i => $d):
              $barHeight = ($d['value'] / 400) * 160;
              $yPos = 160 - $barHeight;
              $xPos = $xStart + ($i * $spacing);
            ?>
              <rect x="<?= $xPos ?>" y="<?= $yPos ?>" width="12" height="<?= $barHeight ?>" rx="4" fill="url(#greenBar)" />
              <text x="<?= $xPos - 2 ?>" y="180" fill="#667085" font-size="12" font-weight="500"><?= $d['day'] ?></text>
            <?php endforeach; ?>
          </svg>
        </div>
      </div>

      <!-- Badge yang Didapat -->
      <div class="rounded-[24px] border border-[#EAECF0] bg-white p-7 shadow-sm">
        <div class="mb-10 flex items-center justify-between">
          <h3 class="text-[22px] font-semibold text-[#101828]">Badge yang Didapat</h3>
          <button class="text-[15px] font-semibold text-[#11773D] hover:underline">Lihat Semua</button>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="flex flex-col items-center">
            <img src="/assets/challange/ecowarrior.png" alt="Eco Warrior" class="mb-4 w-[78px] h-[78px] object-contain" />
            <p class="text-center text-[16px] font-medium text-[#344054]">Eco Warrior</p>
          </div>

          <div class="flex flex-col items-center">
            <img src="/assets/challange/water-saver.png" alt="Water Saver" class="mb-4 w-[78px] h-[78px] object-contain" />
            <p class="text-center text-[16px] font-medium text-[#344054]">Water Saver</p>
          </div>

          <div class="flex flex-col items-center">
            <img src="/assets/challange/green.png" alt="Green Starter" class="mb-4 w-[78px] h-[78px] object-contain" />
            <p class="text-center text-[16px] font-medium text-[#344054]">Green Starter</p>
          </div>

          <div class="flex flex-col items-center">
            <img src="/assets/challange/earth.png" alt="Earth Lover" class="mb-4 w-[78px] h-[78px] object-contain" />
            <p class="text-center text-[16px] font-medium text-[#344054]">Earth Lover</p>
          </div>
        </div>
      </div>

      <!-- Tips Hari Ini -->
      <div class="relative overflow-hidden rounded-[24px] border border-[#EAECF0] bg-white p-7 shadow-sm">
        <div class="flex items-center justify-between gap-4">
          <div class="max-w-[55%]">
            <div class="mb-4 flex items-center gap-3">
              <img src="/assets/challange/point.png" alt="Leaf" class="w-[28px] h-[28px] object-contain" />
              <h3 class="text-[22px] font-semibold text-[#101828]">Tips Hari Ini</h3>
            </div>
            <p class="text-[16px] leading-[32px] font-medium text-[#344054]">
              Matikan lampu saat tidak digunakan untuk menghemat energi dan kurangi emisi CO₂.
            </p>
          </div>

          <div class="flex items-center justify-center">
            <img src="/assets/challange/bumi.png" alt="Earth" class="w-[180px] h-[180px] object-contain" />
          </div>
        </div>
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
          b.classList.remove("border-[#11773D]", "text-[#11773D]", "active");
          b.classList.add("border-transparent", "text-[#667085]");
        });

        this.classList.remove("border-transparent", "text-[#667085]");
        this.classList.add("border-[#11773D]", "text-[#11773D]", "active");

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