<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

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
  ['img' => 'https://picsum.photos/id/16/80/80', 'title' => 'Aksi Tanam Pohon', 'date' => '25 Mei 2025', 'loc' => 'Bogor, Jawa Barat', 'participants' => '125 peserta'],
  ['img' => 'https://picsum.photos/id/17/80/80', 'title' => 'Bersih Pantai Bersama', 'date' => '8 Juni 2025', 'loc' => 'Bali', 'participants' => '210 peserta'],
  ['img' => 'https://picsum.photos/id/18/80/80', 'title' => 'Workshop Zero Waste', 'date' => '15 Juni 2025', 'loc' => 'Online (Zoom)', 'participants' => '150 peserta'],
];

$activeMembers = [
  ['rank' => 1, 'avatar' => 'https://picsum.photos/id/1005/50/50', 'name' => 'Dwi Kurniawan', 'badge' => 'Eco Guardian', 'score' => '2.450'],
  ['rank' => 2, 'avatar' => 'https://picsum.photos/id/64/50/50', 'name' => 'Sinta Ayu', 'badge' => 'Eco Warrior', 'score' => '1.980'],
  ['rank' => 3, 'avatar' => 'https://picsum.photos/id/65/50/50', 'name' => 'Raka Pratama', 'badge' => 'Eco Hero', 'score' => '1.650'],
  ['rank' => 4, 'avatar' => 'https://picsum.photos/id/66/50/50', 'name' => 'Nadia Putri', 'badge' => 'Eco Warrior', 'score' => '1.420'],
  ['rank' => 5, 'avatar' => 'https://picsum.photos/id/67/50/50', 'name' => 'Bagas Aditya', 'badge' => 'Eco Lover', 'score' => '1.250'],
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
      <img src="https://picsum.photos/id/28/1200/400" alt="Banner" class="w-full h-64 object-cover" />
    </div>

    <div class="relative px-8 pt-4 pb-8">
      <div class="lg:flex-row lg:items-end flex flex-col items-start justify-between gap-6">
        <div class="lg:flex-row lg:items-center lg:-mt-20 relative flex flex-col items-start gap-6 -mt-24">
          <div class="shrink-0 relative z-10 w-40 h-40 overflow-hidden bg-white border-4 border-white rounded-full shadow-sm">
            <img src="https://picsum.photos/id/111/200/200" alt="Avatar" class="object-cover w-full h-full" />
          </div>
          <div class="lg:mt-16 flex flex-col gap-2 mt-4">
            <h1 class="flex items-center gap-2 text-3xl font-extrabold text-gray-800">
              Hijau Bersama <span class="text-[#11773D]">✓</span>
            </h1>
            <div class="flex items-center gap-6 text-base font-semibold text-gray-600">
              <span>👥 12.450 Anggota</span>
              <span>📅 Bergabung sejak 12 Mar 2025</span>
            </div>
            <p class="text-base font-medium text-gray-800">Bersama menanam harapan, bersama menjaga bumi.</p>
          </div>
        </div>

        <div class="lg:w-auto flex items-center w-full gap-3">
          <button class="bg-[#11773D] rounded-xl flex items-center justify-center flex-1 gap-2 px-6 py-3 text-base font-bold text-white">
            + Gabung ✓
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
          <!-- Create Post Input -->
          <div class="rounded-2xl p-5 border border-gray-100">
            <div class="flex items-start gap-4 mb-4">
              <img src="https://picsum.photos/id/1005/50/50" alt="User" class="shrink-0 object-cover w-12 h-12 rounded-full" />
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

          <!-- Feed -->
          <div class="flex flex-col gap-8">
            <!-- Post 1 -->
            <div class="flex flex-col gap-4 pb-8 border-b border-gray-100">
              <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                  <img src="https://picsum.photos/id/64/50/50" alt="" class="object-cover w-12 h-12 rounded-full" />
                  <div>
                    <div class="flex items-center gap-2">
                      <h4 class="text-lg font-bold text-gray-800">Sinta Ayu</h4>
                      <span class="bg-[#EEF8F0] text-[#11773D] text-base px-3 py-0.5 rounded-full font-bold">Eco Warrior</span>
                    </div>
                    <div class="text-base font-medium text-gray-500">2 jam yang lalu</div>
                  </div>
                </div>
              </div>
              <p class="text-base font-medium leading-relaxed text-gray-800">
                Hari ini kami mengadakan aksi bersih-bersih pantai di Bali bersama teman-teman komunitas! Sampah yang terkumpul sebanyak 45 kg. Yuk, terus jaga kebersihan lingkungan kita! 🌊💚
              </p>
              <div class="grid h-40 grid-cols-4 gap-2">
                <img src="https://picsum.photos/id/29/400/300" alt="" class="object-cover w-full h-full rounded-l-xl" />
                <img src="https://picsum.photos/id/30/400/300" alt="" class="object-cover w-full h-full" />
                <img src="https://picsum.photos/id/31/400/300" alt="" class="object-cover w-full h-full" />
                <div class="relative w-full h-full">
                  <img src="https://picsum.photos/id/32/400/300" alt="" class="object-cover w-full h-full rounded-r-xl" />
                  <div class="bg-black/50 absolute inset-0 flex items-center justify-center rounded-r-xl">
                    <span class="text-3xl font-black text-white">+3</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Post 2 -->
            <div class="flex flex-col gap-4 pb-8 border-b border-gray-100">
              <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                  <img src="https://picsum.photos/id/65/50/50" alt="" class="object-cover w-12 h-12 rounded-full" />
                  <div>
                    <div class="flex items-center gap-2">
                      <h4 class="text-lg font-bold text-gray-800">Raka Pratama</h4>
                      <span class="bg-[#EEF8F0] text-[#11773D] text-base px-3 py-0.5 rounded-full font-bold">Eco Hero</span>
                    </div>
                    <div class="text-base font-medium text-gray-500">5 jam yang lalu</div>
                  </div>
                </div>
              </div>
              <p class="text-base font-medium leading-relaxed text-gray-800">
                Baru saja menanam 10 bibit mangrove di pesisir! 🌱<br />Semoga bisa tumbuh besar dan melindungi pantai kita dari abrasi.
              </p>
            </div>
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
            <div class="text-[#11773D] text-3xl font-black">5</div>
          </div>
          <div>
            <div class="mb-2 text-base font-bold text-gray-500">Total Anggota</div>
            <div class="text-3xl font-black text-gray-800">12.450</div>
          </div>
        </div>
        <div class="mb-6">
          <div class="mb-2 text-base font-bold text-gray-800">Deskripsi</div>
          <p class="text-base font-medium leading-relaxed text-gray-600">
            Komunitas untuk berbagi tips dan aksi nyata menuju hidup yang lebih ramah lingkungan. Mari bersama wujudkan bumi yang lebih hijau! 🌱
          </p>
        </div>
      </div>

      <!-- Event Mendatang -->
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

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>