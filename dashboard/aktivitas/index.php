<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/services/aktivitas/activity.php';

$userId = $_SESSION['user']['id'] ?? '';

$activities = getAllActivities($pdo, $userId);
$categories = getCategories($pdo);

$activityImageMap = [
  'Membawa Tumbler'        => '/assets/tumbler.png',
  'Naik Transportasi Umum' => '/assets/bus.png',
  'Hemat Air 20 Liter'     => '/assets/air.png',
  'Matikan Lampu 1 Jam'    => '/assets/lampu.png',
  'Pilah Sampah'           => '/assets/sampah.png',
  'Menanam Pohon'          => '/assets/menanampohon.png',
];

$badgeColorMap = [
  'Kebiasaan'    => ['bg' => 'bg-[#EEF8F0]', 'text' => 'text-[#11773D]'],
  'Transportasi' => ['bg' => 'bg-[#EEF8F0]', 'text' => 'text-[#11773D]'],
  'Penghematan'  => ['bg' => 'bg-[#F1F9FC]', 'text' => 'text-[#286FBD]'],
  'Lingkungan'   => ['bg' => 'bg-[#EEF8F0]', 'text' => 'text-[#11773D]'],
];

$groupedActivities = [];
foreach ($activities as $act) {
  $dateKey = date('d F Y', strtotime($act['activity_date']));
  $groupedActivities[$dateKey][] = $act;
}

$userXp = (int)($_SESSION['user']['xp'] ?? 0);
$dailyTarget = 200;
$targetPercentage = min(100, round(($userXp / $dailyTarget) * 100));
$dashOffset = 301.6 - (301.6 * $targetPercentage / 100);
$categoryStats = [
  'Kebiasaan'    => ['icon' => '/assets/tumbler.png', 'count' => 0],
  'Transportasi' => ['icon' => '/assets/bus.png',     'count' => 0],
  'Penghematan'  => ['icon' => '/assets/air.png',     'count' => 0],
  'Lingkungan'   => ['icon' => '/assets/daun.png',    'count' => 0],
];

foreach ($activities as $act) {
  $catName = $act['category_name'] ?? 'Kebiasaan';
  if (isset($categoryStats[$catName])) {
    $categoryStats[$catName]['count']++;
  } else {
    $categoryStats[$catName] = [
      'icon'  => '/assets/tumbler.png',
      'count' => 1
    ];
  }
}

$totalCategoryActions = array_sum(array_column($categoryStats, 'count'));
?>

<div class="flex flex-col gap-6 mx-auto">
  <div class="grid z-100 grid-cols-1 gap-6 lg:grid-cols-3">
    <!-- Left Column -->
    <div class="lg:col-span-2 flex flex-col gap-6">
      <!-- Banner -->
      <div class="flex flex-col items-center justify-between gap-8 rounded-[24px] bg-gradient-to-r from-[#FFFFFF] via-[#F8FCF9] to-[#EEF8F0] px-8 py-7 shadow-sm lg:flex-row">
        <div class="w-full lg:w-[42%]">
          <h2 class="text-[32px] font-bold text-[#101828]">Catat Aksi Hijau</h2>
          <p class="mt-5 text-[18px] font-medium leading-9 text-[#667085]">
            Mulai catat aksi kecilmu hari ini dan<br />
            dapatkan poin serta dampak positif!
          </p>
          <button id="openModalBtn" type="button" class="mt-8 flex h-[56px] w-[190px] items-center justify-center gap-3 rounded-[14px] bg-[#11773D] text-[18px] font-semibold text-white hover:bg-[#0D6433]">
            ➕ Catat Aksi
          </button>
        </div>
        <div class="flex w-full justify-end lg:w-[58%]">
          <img src="/assets/aktivitas/catat.png" alt="Illustration" class="w-[420px] h-[280px] object-contain" />
        </div>
      </div>

      <!-- Activity Log -->
      <div class="rounded-3xl flex flex-col flex-1 p-6 bg-white shadow-sm">
        <div class="lg:flex-row lg:items-center flex flex-col items-start justify-between gap-4 mb-6">
          <h3 class="text-xl font-bold text-[#0B0F1F]">Riwayat Aktivitas</h3>
          <div class="lg:w-auto flex items-center w-full gap-3">
            <button type="button" onclick="showComingSoon()" class="lg:flex-none rounded-xl flex items-center justify-between flex-1 gap-2 px-4 py-2 text-base font-semibold text-gray-700 bg-white border border-gray-200">
              🔍 Semua Kategori ▼
            </button>
            <button type="button" onclick="showComingSoon()" class="lg:flex-none rounded-xl flex items-center justify-between flex-1 gap-2 px-4 py-2 text-base font-semibold text-gray-700 bg-white border border-gray-200">
              📅 Pilih Tanggal ▼
            </button>
          </div>
        </div>

        <!-- Tabs -->
        <div class="flex items-center gap-6 mb-6 overflow-x-auto border-b border-gray-100">
          <button class="tab-btn active pb-3 text-base font-bold border-b-2 text-[#11773D] border-[#11773D]" data-tab="semua">Semua</button>
          <button class="tab-btn pb-3 text-base font-bold border-b-2 text-gray-500 border-transparent" data-tab="hari">Hari Ini</button>
          <button class="tab-btn pb-3 text-base font-bold border-b-2 text-gray-500 border-transparent" data-tab="minggu">Minggu Ini</button>
          <button class="tab-btn pb-3 text-base font-bold border-b-2 text-gray-500 border-transparent" data-tab="bulan">Bulan Ini</button>
        </div>

        <!-- List -->
        <div class="space-y-8">
          <?php if (empty($groupedActivities)): ?>
            <div class="flex flex-col items-center justify-center rounded-3xl border border-dashed border-gray-200 py-20">
              <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#EEF8F0]">
                🍃
              </div>
              <h3 class="mt-6 text-xl font-bold">Belum Ada Aktivitas</h3>
              <p class="mt-3 max-w-md text-center text-[#667085] leading-7">
                Belum ada aktivitas yang tercatat. Yuk mulai aksi hijau pertamamu!
              </p>
            </div>
          <?php else: ?>
            <?php foreach ($groupedActivities as $dateStr => $list): ?>
              <?php $totalPoint = array_sum(array_column($list, 'point')); ?>
              <div class="activity-group">
                <div class="flex justify-between mb-4">
                  <span class="font-bold text-gray-700"><?= htmlspecialchars($dateStr) ?></span>
                  <span class="flex items-center gap-1 font-bold">
                    Total: <?= $totalPoint ?> poin 🍃
                  </span>
                </div>

                <div class="space-y-4">
                  <?php foreach ($list as $act): ?>
                    <?php
                    $catName = $act['category_name'] ?? 'Kebiasaan';
                    $badge = $badgeColorMap[$catName] ?? ['bg' => 'bg-[#EEF8F0]', 'text' => 'text-[#11773D]'];
                    $imgSrc = $activityImageMap[$act['title']] ?? '/assets/tumbler.png';
                    ?>
                    <div class="rounded-2xl hover:shadow-md flex items-center justify-between border border-gray-100 p-4 transition-shadow">
                      <div class="flex w-full items-center justify-between py-2">
                        <div class="flex items-center gap-4">
                          <div class="flex h-14 w-14 items-center justify-center rounded-full <?= $badge['bg'] ?>">
                            <img src="<?= htmlspecialchars($imgSrc) ?>" alt="" class="w-7 h-7 object-contain" />
                          </div>
                          <div class="flex flex-col md:flex-row md:items-center gap-3">
                            <div>
                              <h4 class="text-[18px] font-semibold text-[#344054]"><?= htmlspecialchars($act['title']) ?></h4>
                              <p class="mt-1 text-[15px] font-medium text-[#667085]">
                                <?= date('H:i', strtotime($act['activity_date'])) ?> WIB
                              </p>
                            </div>
                            <span class="rounded-full px-3 py-1 text-[13px] font-semibold <?= $badge['bg'] ?> <?= $badge['text'] ?>">
                              <?= htmlspecialchars($catName) ?>
                            </span>
                          </div>
                        </div>

                        <div class="flex items-center gap-8">
                          <div class="text-right">
                            <p class="text-[20px] font-semibold text-[#11773D]">+<?= (int)$act['point'] ?></p>
                            <p class="text-[14px] font-medium text-[#667085]">poin</p>
                          </div>
                          <span class="text-[#98A2B3]">➔</span>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div class="lg:col-span-1 flex flex-col gap-6">
      <!-- Ringkasan Aktivitas -->
      <div class="rounded-[24px] bg-white p-7 shadow-sm">
        <div class="mb-8 flex items-center justify-between">
          <h3 class="text-[22px] font-semibold text-[#101828]">Ringkasan Aktivitas</h3>
          <select class="rounded-xl border border-[#EAECF0] bg-white px-6 py-2 text-[15px] font-semibold text-[#344054] outline-none">
            <option>Hari Ini</option>
          </select>
        </div>

        <div class="mb-8 flex items-center justify-between">
          <div class="pr-8">
            <p class="text-[16px] font-semibold text-[#667085]">Total Poin</p>
            <div class="mt-4 flex items-center gap-2">
              <h2 class="text-[52px] font-bold leading-none text-[#11773D]"><?= $userXp ?></h2>
              <span class="text-[28px] text-[#11773D]">🍃</span>
            </div>
            <p class="mt-5 text-[16px] font-medium text-[#667085]">Dari <?= count($activities) ?> aksi</p>
          </div>

          <div class="h-[120px] w-px bg-[#EAECF0]"></div>

          <div class="flex flex-col items-center pl-8">
            <div class="relative h-[120px] w-[120px]">
              <svg class="-rotate-90" width="120" height="120" viewBox="0 0 120 120">
                <circle cx="60" cy="60" r="48" stroke="#E6EFE8" stroke-width="10" fill="none" />
                <circle cx="60" cy="60" r="48" stroke="#11773D" stroke-width="10" fill="none" stroke-dasharray="301.6" stroke-dashoffset="<?= $dashOffset ?>" stroke-linecap="round" />
              </svg>
              <div class="absolute inset-0 flex flex-col items-center justify-center">
                <span class="text-[30px] font-bold text-[#11773D]"><?= $targetPercentage ?>%</span>
                <span class="text-[20px] text-[#11773D]">🍃</span>
              </div>
            </div>
            <p class="mt-4 text-center text-[16px] font-semibold text-[#667085]">dari target harian</p>
          </div>
        </div>

        <div class="rounded-2xl bg-[#F7FBF8] p-5">
          <div class="mb-4 flex items-center justify-between">
            <span class="text-[16px] font-semibold text-[#344054]">Target Harian</span>
            <span class="text-[16px] font-semibold text-[#344054]"><?= $dailyTarget ?> poin</span>
          </div>
          <div class="h-[10px] overflow-hidden rounded-full bg-[#DCE7DE]">
            <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $targetPercentage ?>%"></div>
          </div>
        </div>
      </div>

      <!-- Insight Minggu Ini -->
      <div class="rounded-[24px] bg-white p-7 shadow-sm">
        <div class="mb-7 flex items-center justify-between">
          <h3 class="text-[22px] font-semibold text-[#101828]">Insight Minggu Ini</h3>
          <button class="text-[16px] font-semibold text-[#11773D]">Lihat Detail</button>
        </div>

        <div class="mb-8 flex items-center justify-between gap-6">
          <div class="flex-1">
            <p class="text-[18px] font-semibold leading-8 text-[#344054]">Kamu telah menghemat</p>
            <h2 class="mt-2 text-[42px] font-bold leading-none text-[#11773D]">2,3 kg CO₂</h2>
            <p class="mt-5 text-[15px] leading-8 text-[#667085]">
              Pertahankan konsistensimu<br />untuk bumi yang lebih baik.
            </p>
          </div>
          <img src="/assets/aktivitas/bumi.png" alt="Earth" class="w-[135px] h-[135px] object-contain" />
        </div>

        <div class="rounded-[20px] bg-[#F7FBF8] px-5 py-6">
          <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col items-center">
              <p class="text-[14px] font-medium text-[#667085]">CO₂ Dihindari</p>
              <p class="mt-1 text-[18px] font-bold text-[#11773D]">1,2 kg</p>
            </div>
            <div class="flex flex-col items-center">
              <p class="text-[14px] font-medium text-[#667085]">Air Dihemat</p>
              <p class="mt-1 text-[18px] font-bold text-[#11773D]">45 L</p>
            </div>
            <div class="flex flex-col items-center">
              <p class="text-[14px] font-medium text-[#667085]">Energi Dihemat</p>
              <p class="mt-1 text-[18px] font-bold text-[#11773D]">2 kWh</p>
            </div>
            <div class="flex flex-col items-center">
              <p class="text-[14px] font-medium text-[#667085]">Pohon Ditanam</p>
              <p class="mt-1 text-[18px] font-bold text-[#11773D]">1 Pohon</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Kategori Aktivitas -->
      <div class="rounded-[24px] bg-white p-7 shadow-sm">
        <div class="mb-8 flex items-center justify-between">
          <h3 class="text-[22px] font-semibold text-[#101828]">Kategori Aktivitas</h3>
          <button type="button" onclick="showComingSoon()" class="text-[17px] font-semibold text-[#11773D]">Lihat Semua</button>
        </div>

        <div class="space-y-7">
          <?php foreach ($categoryStats as $catName => $stat): ?>
            <?php
            $count = $stat['count'];
            $percentage = $totalCategoryActions > 0 ? round(($count / $totalCategoryActions) * 100) : 0;
            ?>
            <div class="flex items-center gap-5">
              <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#EEF8F0]">
                <img src="<?= htmlspecialchars($stat['icon']) ?>" alt="<?= htmlspecialchars($catName) ?>" class="w-7 h-7 object-contain" />
              </div>

              <div class="w-[160px]">
                <p class="text-[18px] font-semibold text-[#344054]"><?= htmlspecialchars($catName) ?></p>
              </div>

              <div class="flex-1">
                <div class="h-[12px] overflow-hidden rounded-full bg-[#E4ECE5]">
                  <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $percentage ?>%;"></div>
                </div>
              </div>

              <span class="w-[70px] text-right text-[18px] font-semibold text-[#667085]">
                <?= $count ?> aksi
              </span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Create Activity -->
<div id="createModal" class="hidden fixed inset-0 z-[999] flex items-center justify-center bg-black/40 backdrop-blur-sm p-6">
  <div class="w-full max-w-6xl h-[90vh] overflow-hidden rounded-[32px] bg-white shadow-2xl flex flex-col">
    <div class="flex items-center justify-between border-b border-gray-100 px-8 py-6">
      <div>
        <h2 class="text-2xl font-bold text-gray-900">Catat Aktivitas Baru</h2>
        <p class="mt-1 text-gray-500">Tambahkan aktivitas ramah lingkungan yang telah kamu lakukan.</p>
      </div>
      <button id="closeModalBtn" type="button" class="flex h-11 w-11 items-center justify-center rounded-xl border border-gray-200 hover:bg-gray-100">✕</button>
    </div>

    <div class="grid flex-1 grid-cols-12 overflow-hidden">
      <!-- Left Category Selector -->
      <div class="col-span-4 overflow-y-auto bg-[#F8FBF8] p-6 space-y-3">
        <h3 class="mb-5 text-lg font-bold">Pilih Kategori Aktivitas</h3>
        <?php foreach ($categories as $index => $cat): ?>
          <button type="button"
            class="category-option flex w-full items-center gap-4 rounded-2xl p-4 border border-gray-200 transition text-left <?= $index === 0 ? 'border-green-500 bg-green-50 border-2' : '' ?>"
            data-id="<?= htmlspecialchars($cat['id']) ?>"
            data-name="<?= htmlspecialchars($cat['name']) ?>"
            data-point="<?= (int)($cat['point'] ?? 20) ?>"
            data-desc="<?= htmlspecialchars($cat['description'] ?? '') ?>">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-600 text-white font-bold">
              🍃
            </div>
            <div>
              <h4 class="font-semibold text-gray-900"><?= htmlspecialchars($cat['name']) ?></h4>
              <p class="text-sm text-gray-500">+<?= (int)($cat['point'] ?? 20) ?> Eco Point</p>
            </div>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Right Form -->
      <form id="activityForm" class="col-span-8 overflow-y-auto p-8 space-y-6">
        <div>
          <h3 id="selectedCategoryTitle" class="text-2xl font-bold"><?= htmlspecialchars($categories[0]['name'] ?? 'Kategori') ?></h3>
          <p id="selectedCategoryDesc" class="mt-2 leading-7 text-gray-500"><?= htmlspecialchars($categories[0]['description'] ?? '') ?></p>
        </div>

        <input type="hidden" name="category_id" id="categoryIdInput" value="<?= htmlspecialchars($categories[0]['id'] ?? '') ?>" />
        <input type="hidden" name="point" id="pointInput" value="<?= (int)($categories[0]['point'] ?? 20) ?>" />

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Judul Aktivitas</label>
          <input type="text" name="title" id="titleInput" value="Membawa Tumbler" placeholder="Contoh: Membawa Tumbler" class="h-[56px] w-full rounded-2xl border border-gray-200 px-5 outline-none focus:border-[#11773D]" required />
        </div>

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Ceritakan Aktivitasmu</label>
          <textarea name="description" rows="4" placeholder="Contoh: Hari ini saya menanam 3 bibit mangga..." class="w-full rounded-2xl border border-gray-200 p-5 outline-none focus:border-[#11773D]" required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-5">
          <div>
            <label class="mb-2 block text-sm font-semibold text-gray-700">Tanggal Aktivitas</label>
            <input type="date" name="activity_date" value="<?= date('Y-m-d') ?>" class="h-[56px] w-full rounded-2xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" required />
          </div>
          <div>
            <label class="mb-2 block text-sm font-semibold text-gray-700">Waktu Aktivitas</label>
            <input type="time" name="activity_time" value="<?= date('H:i') ?>" class="h-[56px] w-full rounded-2xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" required />
          </div>
        </div>

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Lokasi (Opsional)</label>
          <input type="text" name="location" placeholder="Contoh: Kota Malang" class="h-[56px] w-full rounded-2xl border border-gray-200 px-5 outline-none focus:border-[#11773D]" />
        </div>

        <div class="rounded-3xl bg-[#F3FAF5] p-6">
          <div class="flex items-center justify-between">
            <div>
              <h4 class="text-lg font-bold text-[#11773D]">Estimasi Eco Point</h4>
              <p class="mt-1 text-sm text-gray-500">Poin akan diverifikasi berdasarkan aktivitas yang dipilih.</p>
            </div>
            <div class="text-right">
              <h2 id="pointDisplay" class="text-4xl font-extrabold text-[#11773D]">+<?= (int)($categories[0]['point'] ?? 20) ?></h2>
              <p class="font-medium text-gray-500">Eco Point</p>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-2">
          <button id="cancelModalBtn" type="button" class="h-[56px] rounded-2xl border border-gray-200 px-8 font-semibold text-gray-600 hover:bg-gray-100">Batal</button>
          <button type="submit" id="submitBtn" class="flex h-[56px] min-w-[210px] items-center justify-center rounded-2xl bg-[#11773D] px-8 font-semibold text-white hover:bg-[#0E6634]">
            Simpan Aktivitas
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function showComingSoon() {
    Swal.fire({
      icon: 'info',
      title: 'Segera Hadir 🚀',
      text: 'Fitur filter kategori dan tanggal sedang dalam pengembangan.',
      confirmButtonColor: '#11773D',
      confirmButtonText: 'Mengerti'
    });
  }

  document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("createModal");
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");
    const cancelBtn = document.getElementById("cancelModalBtn");
    const form = document.getElementById("activityForm");
    const submitBtn = document.getElementById("submitBtn");

    const defaultTitles = {
      'Kebiasaan': 'Membawa Tumbler',
      'Penghematan': 'Hemat Air 20 Liter',
      'Transportasi': 'Naik Transportasi Umum',
      'Lingkungan': 'Menanam Pohon'
    };

    if (openBtn) openBtn.addEventListener("click", () => modal.classList.remove("hidden"));
    if (closeBtn) closeBtn.addEventListener("click", () => modal.classList.add("hidden"));
    if (cancelBtn) cancelBtn.addEventListener("click", () => modal.classList.add("hidden"));

    document.querySelectorAll(".category-option").forEach(btn => {
      btn.addEventListener("click", function() {
        document.querySelectorAll(".category-option").forEach(b => b.classList.remove("border-green-500", "bg-green-50", "border-2"));
        this.classList.add("border-green-500", "bg-green-50", "border-2");

        const catId = this.dataset.id;
        const catName = this.dataset.name;
        const catPoint = this.dataset.point;
        const catDesc = this.dataset.desc;

        document.getElementById("selectedCategoryTitle").textContent = catName;
        document.getElementById("selectedCategoryDesc").textContent = catDesc;
        document.getElementById("categoryIdInput").value = catId;
        document.getElementById("pointInput").value = catPoint;
        document.getElementById("pointDisplay").textContent = "+" + catPoint;
        document.getElementById("titleInput").value = defaultTitles[catName] || "";
      });
    });

    if (form) {
      form.addEventListener("submit", async function(e) {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.textContent = "Menyimpan...";

        const formData = new FormData(this);

        try {
          const res = await fetch("/actions/create_activity.php", {
            method: "POST",
            body: formData
          });
          const data = await res.json();

          if (data.status === "success") {
            alert("Aktivitas berhasil ditambahkan");
            window.location.reload();
          } else {
            alert(data.message || "Gagal menyimpan aktivitas.");
          }
        } catch (err) {
          console.error(err);
          alert("Terjadi kesalahan sistem.");
        } finally {
          submitBtn.disabled = false;
          submitBtn.textContent = "Simpan Aktivitas";
        }
      });
    }
  });
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>