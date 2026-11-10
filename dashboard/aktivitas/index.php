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