<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once __DIR__ . '/services/activity.php';

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

$userXp = getUserXp($pdo, $userId);
$dailyTarget = 200;
$todayPoints = array_sum(array_map(fn($activity) => (int)($activity['point'] ?? 0), array_filter($activities, fn($activity) => !empty($activity['activity_date']) && date('Y-m-d', strtotime($activity['activity_date'])) === date('Y-m-d'))));
$targetPercentage = min(100, round(($todayPoints / $dailyTarget) * 100));
$dashOffset = 301.6 - (301.6 * $targetPercentage / 100);
$categoryStats = [];

foreach ($categories as $category) {
  $categoryName = $category['name'] ?? 'Umum';
  $categoryStats[$categoryName] = [
    'icon' => $category['icon'] ?: '/assets/tumbler.png',
    'count' => 0,
  ];
}

foreach ($activities as $act) {
  $catName = $act['category_name'] ?? 'Umum';
  if (!isset($categoryStats[$catName])) {
    $categoryStats[$catName] = [
      'icon' => '/assets/tumbler.png',
      'count' => 0,
    ];
  }

  $categoryStats[$catName]['count']++;
}

$totalCategoryActions = array_sum(array_column($categoryStats, 'count'));
$weeklyInsight = getWeeklyActivityInsight($pdo, $userId);
?>

<div class="flex flex-col gap-6 mx-auto">
  <div class="grid z-100 grid-cols-1 gap-6 lg:grid-cols-3">
    <div class="lg:col-span-2 flex flex-col gap-6">
      <?php require_once __DIR__ . '/component/aktivitas-catat-aksi.php'; ?>
      <?php require_once __DIR__ . '/component/aktivitas-riwayat-aktivitas.php'; ?>
    </div>

    <div class="lg:col-span-1 flex flex-col gap-6">
      <?php require_once __DIR__ . '/component/aktivitas-ringkasan-aktivitas.php'; ?>
      <?php require_once __DIR__ . '/component/aktivitas-insight-minggu-ini.php'; ?>
      <?php require_once __DIR__ . '/component/aktivitas-kategori-aktivitas.php'; ?>
    </div>
  </div>
</div>

<!-- Modal Create Activity -->
<?php require_once __DIR__ . '/component/aktivitas-create-modal.php'; ?>

<dialog id="activityDetailModal" class="m-auto w-xl max-w-xl rounded-[28px] border-0 bg-transparent p-0 backdrop:bg-black/40">
  <div class="w-full max-w-xl bg-white p-6 pt-0 shadow-2xl max-h-[75dvh] overflow-y-scroll rounded-[28px]">
    <div class="mb-5 flex items-start justify-between gap-4 pt-6 top-0 sticky bg-inherit">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#11773D]">Detail Aktivitas</p>
        <h3 id="activityDetailTitle" class="mt-2 text-2xl font-bold text-[#101828]">Membawa Tumbler</h3>
      </div>
      <button type="button" class="rounded-full border-2 text-xl border-gray-200 text-gray-500 hover:bg-gray-50" onclick="this.closest('dialog')?.close()">✕</button>
    </div>

    <div id="activityDetailProofWrapper" class="mb-5 hidden overflow-hidden rounded-2xl border border-gray-200 bg-gray-50">
      <img id="activityDetailProof" src="" alt="Bukti aktivitas" class="hidden h-64 w-full object-contain" />
      <div id="activityDetailProofPlaceholder" class="hidden h-64 w-full items-center justify-center bg-[#F7FBF8] text-center text-[#667085]">
        <div>
          <div class="mb-3 text-4xl">📷</div>
          <p class="font-semibold text-[#344054]">Tidak ada foto bukti</p>
          <p class="mt-1 text-sm">Aktivitas ini tidak dilengkapi dengan foto.</p>
        </div>
      </div>
    </div>

    <div class="mb-5 flex items-center justify-between rounded-2xl bg-[#F7FBF8] p-4">
      <div>
        <p class="text-sm text-[#667085]">Kategori</p>
        <p id="activityDetailCategory" class="mt-1 text-base font-semibold text-[#101828]">Kebiasaan</p>
      </div>
      <div class="text-right">
        <p class="text-sm text-[#667085]">Poin</p>
        <p id="activityDetailPoint" class="mt-1 text-xl font-bold text-[#11773D]">+20</p>
      </div>
    </div>

    <div class="space-y-4 text-[15px] text-[#344054]">
      <div class="flex items-center justify-between gap-4 rounded-2xl border border-gray-200 px-4 py-3">
        <span class="font-medium text-[#667085]">Tanggal</span>
        <span id="activityDetailDate" class="font-semibold">-</span>
      </div>
      <div class="flex items-center justify-between gap-4 rounded-2xl border border-gray-200 px-4 py-3">
        <span class="font-medium text-[#667085]">Waktu</span>
        <span id="activityDetailTime" class="font-semibold">-</span>
      </div>
      <div class="flex items-center justify-between gap-4 rounded-2xl border border-gray-200 px-4 py-3">
        <span class="font-medium text-[#667085]">Lokasi</span>
        <span id="activityDetailLocation" class="max-w-[60%] text-right font-semibold">-</span>
      </div>
      <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4">
        <p class="font-medium text-[#667085]">Deskripsi</p>
        <p id="activityDetailDescription" class="mt-2 leading-7 text-[#344054]">-</p>
      </div>
      <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4">
        <p class="font-medium text-[#667085]">Status Aktivitas</p>
        <p id="activityDetailMeta" class="mt-2 text-[#344054]">-</p>
      </div>
    </div>
  </div>
</dialog>

<dialog id="categoryFilterModal" class="m-auto max-w-lg rounded-[28px] border-0 bg-transparent p-0 backdrop:bg-black/40">
  <div class="w-full max-w-lg rounded-[28px] bg-white p-6 shadow-2xl">
    <div class="mb-5 flex items-center justify-between gap-4">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#11773D]">Kategori</p>
        <h3 class="mt-2 text-2xl font-bold text-[#101828]">Pilih Kategori</h3>
      </div>
      <button type="button" class="rounded-full border border-gray-200 p-2 text-gray-500 hover:bg-gray-50" onclick="this.closest('dialog')?.close()">✕</button>
    </div>

    <div class="space-y-3">
      <button type="button" class="category-filter-option flex w-full items-center justify-between rounded-2xl border border-gray-200 px-4 py-3 text-left hover:border-[#11773D] hover:bg-[#F2FAF4]" data-category="semua">
        <span class="flex items-center gap-3">
          <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#EEF8F0]">🌿</span>
          <span class="font-semibold text-[#101828]">Semua Kategori</span>
        </span>
        <span class="text-sm text-[#667085]">Tampilkan semua</span>
      </button>

      <?php foreach ($categories as $category): ?>
        <?php $categoryName = $category['name'] ?? 'Umum'; ?>
        <button type="button" class="category-filter-option flex w-full items-center justify-between rounded-2xl border border-gray-200 px-4 py-3 text-left hover:border-[#11773D] hover:bg-[#F2FAF4]" data-category="<?= htmlspecialchars($categoryName) ?>">
          <span class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#EEF8F0]">
              <img src="<?= htmlspecialchars($category['icon'] ?: '/assets/tumbler.png') ?>" alt="<?= htmlspecialchars($categoryName) ?>" class="h-6 w-6 object-contain" />
            </span>
            <span class="font-semibold text-[#101828]"><?= htmlspecialchars($categoryName) ?></span>
          </span>
          <span class="text-sm text-[#667085]">
            <?= (int)($categoryStats[$categoryName]['count'] ?? 0) ?> aksi
          </span>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</dialog>

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

    if (openBtn) {
      openBtn.addEventListener("click", () => {
        if (modal && typeof modal.showPopover === "function") {
          modal.showPopover();
        }
      });
    }

    if (closeBtn) closeBtn.addEventListener("click", () => {
      if (modal && typeof modal.hidePopover === "function") {
        modal.hidePopover();
      }
    });

    if (cancelBtn) cancelBtn.addEventListener("click", () => {
      if (modal && typeof modal.hidePopover === "function") {
        modal.hidePopover();
      }
    });

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

    const activityTabs = document.querySelectorAll(".tab-btn[data-tab]");
    const activityGroups = document.querySelectorAll(".activity-group");
    const activityFilterEmpty = document.getElementById("activityFilterEmpty");
    const categoryFilterButton = document.getElementById("categoryFilterBtn");
    const categoryFilterText = document.getElementById("selectedCategoryLabel");
    const dateFilterButton = document.getElementById("dateFilterBtn");
    const dateFilterText = document.getElementById("selectedDateLabel");
    const dateFilterInput = document.getElementById("dateFilterInput");
    const categoryFilterModal = document.getElementById("categoryFilterModal");
    const activityDetailModal = document.getElementById("activityDetailModal");

    let activeTab = "semua";
    let selectedCategory = "semua";
    let selectedDate = "";

    function matchesTabFilter(dateValue, filterType) {
      if (!dateValue || filterType === "semua") {
        return filterType === "semua";
      }

      const groupDate = new Date(dateValue + "T00:00:00");
      const today = new Date();
      today.setHours(0, 0, 0, 0);

      if (filterType === "hari") {
        return groupDate.getTime() === today.getTime();
      }

      if (filterType === "minggu") {
        const weekAgo = new Date(today);
        weekAgo.setDate(today.getDate() - 6);
        return groupDate >= weekAgo && groupDate <= today;
      }

      if (filterType === "bulan") {
        const monthStart = new Date(today.getFullYear(), today.getMonth(), 1);
        const monthEnd = new Date(today.getFullYear(), today.getMonth() + 1, 0);
        return groupDate >= monthStart && groupDate <= monthEnd;
      }

      return true;
    }

    function matchesCategoryFilter(categoryValue, filterValue) {
      if (!filterValue || filterValue === "semua") {
        return true;
      }

      return (categoryValue || "").toLowerCase() === filterValue.toLowerCase();
    }

    function matchesDateFilter(dateValue, filterValue) {
      if (!filterValue) {
        return true;
      }

      return dateValue === filterValue;
    }

    function formatDateLabel(value) {
      if (!value) {
        return "Semua Tanggal";
      }

      const parsed = new Date(value + "T00:00:00");
      if (Number.isNaN(parsed.getTime())) {
        return "Semua Tanggal";
      }

      return parsed.toLocaleDateString("id-ID", {
        day: "2-digit",
        month: "short",
        year: "numeric"
      });
    }

    function applyActivityFilters() {
      let visibleCount = 0;

      activityGroups.forEach(group => {
        let groupVisibleCount = 0;

        group.querySelectorAll(".activity-item").forEach(item => {
          const matches = matchesTabFilter(item.dataset.date, activeTab) &&
            matchesCategoryFilter(item.dataset.category, selectedCategory) &&
            matchesDateFilter(item.dataset.date, selectedDate);

          item.style.display = matches ? "" : "none";
          if (matches) groupVisibleCount++;
        });

        group.style.display = groupVisibleCount > 0 ? "" : "none";
        visibleCount += groupVisibleCount;
      });

      if (categoryFilterText) {
        categoryFilterText.textContent = selectedCategory === "semua" ? "Semua Kategori" : selectedCategory;
      }

      if (dateFilterText) {
        dateFilterText.textContent = formatDateLabel(selectedDate);
      }

      if (activityFilterEmpty) {
        activityFilterEmpty.classList.toggle("hidden", visibleCount > 0);
        activityFilterEmpty.classList.toggle("flex", visibleCount === 0);
      }
    }

    activityTabs.forEach(tab => {
      tab.addEventListener("click", function() {
        const selectedTab = this.dataset.tab;
        activeTab = selectedTab;

        activityTabs.forEach(btn => {
          btn.classList.remove("active", "border-[#11773D]", "text-[#11773D]");
          btn.classList.add("border-transparent", "text-gray-500");
        });

        this.classList.add("active", "border-[#11773D]", "text-[#11773D]");
        this.classList.remove("border-transparent", "text-gray-500");

        applyActivityFilters();
      });
    });

    if (categoryFilterButton) {
      categoryFilterButton.addEventListener("click", function() {
        if (categoryFilterModal && typeof categoryFilterModal.showModal === "function") {
          categoryFilterModal.showModal();
        }
      });
    }

    if (dateFilterButton && dateFilterInput) {
      dateFilterButton.addEventListener("click", function() {
        dateFilterInput.showPicker ? dateFilterInput.showPicker() : dateFilterInput.click();
      });

      dateFilterInput.addEventListener("change", function() {
        selectedDate = this.value;
        applyActivityFilters();
      });
    }

    document.querySelectorAll(".category-filter-option").forEach(button => {
      button.addEventListener("click", function() {
        selectedCategory = this.dataset.category || "semua";
        if (categoryFilterModal && typeof categoryFilterModal.close === "function") {
          categoryFilterModal.close();
        }
        applyActivityFilters();
      });
    });

    document.querySelectorAll(".activity-item").forEach(item => {
      item.addEventListener("click", function() {
        const activity = JSON.parse(this.dataset.activity || "{}");

        const detailTitle = document.getElementById("activityDetailTitle");
        const detailCategory = document.getElementById("activityDetailCategory");
        const detailDate = document.getElementById("activityDetailDate");
        const detailTime = document.getElementById("activityDetailTime");
        const detailPoint = document.getElementById("activityDetailPoint");
        const detailDescription = document.getElementById("activityDetailDescription");
        const detailLocation = document.getElementById("activityDetailLocation");
        const detailMeta = document.getElementById("activityDetailMeta");
        const detailProofWrapper = document.getElementById("activityDetailProofWrapper");
        const detailProof = document.getElementById("activityDetailProof");
        const detailProofPlaceholder = document.getElementById("activityDetailProofPlaceholder");

        detailTitle.textContent = activity.title || "Aktivitas";
        detailCategory.textContent = activity.category_name || activity.category?.name || "Umum";
        detailPoint.textContent = "+" + (activity.point || 0) + " poin";
        detailDescription.textContent = activity.description || "Tidak ada deskripsi tambahan untuk aktivitas ini.";
        detailLocation.textContent = activity.location || "Lokasi tidak dicatat";

        if (activity.activity_date) {
          const dateObj = new Date(activity.activity_date);
          detailDate.textContent = dateObj.toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "short",
            year: "numeric"
          });
          detailTime.textContent = dateObj.toLocaleTimeString("id-ID", {
            hour: "2-digit",
            minute: "2-digit"
          }) + " WIB";
        } else {
          detailDate.textContent = "-";
          detailTime.textContent = "-";
        }

        detailMeta.textContent = "Status: " + (activity.status || "verified") + " • Verifikasi: " + (activity.verification_type || "manual");

        if (activity.photo_url || activity.image_url) {
          detailProof.src = activity.photo_url || activity.image_url;
          detailProof.classList.remove("hidden");
          detailProofPlaceholder.classList.add("hidden");
          detailProofWrapper.classList.remove("hidden", "flex");
          detailProofWrapper.classList.add("block");
        } else {
          detailProof.removeAttribute("src");
          detailProof.classList.add("hidden");
          detailProofPlaceholder.classList.remove("hidden");
          detailProofWrapper.classList.remove("hidden", "block");
          detailProofWrapper.classList.add("flex");
        }

        if (activityDetailModal && typeof activityDetailModal.showModal === "function") {
          activityDetailModal.showModal();
        }
      });
    });

    if (form) {
      form.addEventListener("submit", async function(e) {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.textContent = "Menyimpan...";

        const pointValue = Number(document.getElementById("pointInput")?.value || 0);
        const proofFile = proofInput && proofInput.files ? proofInput.files[0] : null;

        if (proofFile && proofFile.size > 2 * 1024 * 1024) {
          alert("Ukuran foto bukti maksimal 2MB.");
          submitBtn.disabled = false;
          submitBtn.textContent = "Simpan Aktivitas";
          return;
        }

        const formData = new FormData(this);
        formData.set("point", String(pointValue));

        try {
          const res = await fetch("/dashboard/aktivitas/services/create_activity2.php", {
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

    applyActivityFilters();
  });
</script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>