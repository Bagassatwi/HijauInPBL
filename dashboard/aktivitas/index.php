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
    <div class="lg:col-span-2 flex flex-col gap-6">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/aktivitas/catat-aksi.php'; ?>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/aktivitas/riwayat-aktivitas.php'; ?>
    </div>

    <div class="lg:col-span-1 flex flex-col gap-6">
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/aktivitas/ringkasan-aktivitas.php'; ?>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/aktivitas/insight-minggu-ini.php'; ?>
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/components/aktivitas/kategori-aktivitas.php'; ?>
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
      <form id="activityForm"
        class="col-span-8 overflow-y-auto p-8 space-y-6">
        <input class="hidden" type="text" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>" id="">
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

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">
            Upload Bukti Aktivitas (Opsional)
          </label>

          <label id="proofUploadLabel" class="flex h-[180px] cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-[#D7E8DC] bg-[#F8FBF8] transition hover:border-[#11773D] hover:bg-[#F2FAF4]">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-4 h-12 w-12 text-[#11773D]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5V18a2 2 0 002 2h14a2 2 0 002-2v-1.5M16 8l-4-4m0 0L8 8m4-4v12" />
            </svg>

            <h4 class="font-semibold text-gray-800">Upload Foto</h4>

            <p class="mt-1 text-sm text-gray-500">
              Drag & Drop atau klik untuk memilih gambar
            </p>

            <span class="mt-3 rounded-full bg-green-100 px-4 py-2 text-sm font-medium text-[#11773D]">
              JPG, PNG • Maks 5MB
            </span>

            <input id="proofPhotoInput" name="proof_photo" type="file" accept="image/*" class="hidden" />
          </label>
          <p id="proofFileName" class="mt-2 hidden text-sm font-medium text-[#11773D]"></p>

          <div id="proofPreviewWrapper" class="mt-4 hidden">
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white p-3 shadow-sm">
              <img id="proofPreview" alt="Preview bukti aktivitas" class="h-48 w-full rounded-xl object-cover" />
            </div>
          </div>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("createModal");
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");
    const cancelBtn = document.getElementById("cancelModalBtn");
    const form = document.getElementById("activityForm");
    const submitBtn = document.getElementById("submitBtn");
    const proofInput = document.getElementById("proofPhotoInput");
    const proofFileName = document.getElementById("proofFileName");
    const proofUploadLabel = document.getElementById("proofUploadLabel");
    const proofPreviewWrapper = document.getElementById("proofPreviewWrapper");
    const proofPreview = document.getElementById("proofPreview");
    let currentProofUrl = null;

    const defaultTitles = {
      'Kebiasaan': 'Membawa Tumbler',
      'Penghematan': 'Hemat Air 20 Liter',
      'Transportasi': 'Naik Transportasi Umum',
      'Lingkungan': 'Menanam Pohon'
    };

    if (proofInput) {
      proofInput.addEventListener("change", function() {
        const file = this.files && this.files[0];

        if (file) {
          if (currentProofUrl) {
            URL.revokeObjectURL(currentProofUrl);
          }

          currentProofUrl = URL.createObjectURL(file);
          proofPreview.src = currentProofUrl;
          proofPreviewWrapper.classList.remove("hidden");
          proofFileName.textContent = file.name;
          proofFileName.classList.remove("hidden");
          proofUploadLabel.classList.add("border-[#11773D]", "bg-[#F2FAF4]");
        } else {
          if (currentProofUrl) {
            URL.revokeObjectURL(currentProofUrl);
            currentProofUrl = null;
          }

          proofPreview.removeAttribute("src");
          proofPreviewWrapper.classList.add("hidden");
          proofFileName.textContent = "";
          proofFileName.classList.add("hidden");
          proofUploadLabel.classList.remove("border-[#11773D]", "bg-[#F2FAF4]");
        }
      });
    }

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

        const pointValue = Number(document.getElementById("pointInput")?.value || 0);
        const proofFile = proofInput && proofInput.files ? proofInput.files[0] : null;

        if (proofFile && proofFile.size > 5 * 1024 * 1024) {
          alert("Ukuran foto bukti maksimal 5MB.");
          submitBtn.disabled = false;
          submitBtn.textContent = "Simpan Aktivitas";
          return;
        }

        const formData = new FormData(this);
        formData.set("point", String(pointValue));

        try {
          const res = await fetch("/dashboard/services/aktivitas/create_activity.php", {
            method: "POST",
            body: formData,
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