<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/services/challenge/challenge.php';

$userId = $_SESSION['user']['id'] ?? null;
if (!$userId) {
  header('Location: /login.php');
  exit;
}

try {
  $pdo->beginTransaction();
  syncChallengeProgress($pdo, (string)$userId);
  $pdo->commit();
} catch (Throwable $e) {
  if ($pdo->inTransaction()) {
    $pdo->rollBack();
  }
}

$tagColorMap = [
  'Kebiasaan' => 'bg-[#E8F5E9] text-[#11773D]',
  'Penghematan' => 'bg-[#E3F2FD] text-[#2196F3]',
  'Transportasi' => 'bg-[#E8F5E9] text-[#11773D]',
  'Lingkungan' => 'bg-[#E8F5E9] text-[#11773D]',
  'default' => 'bg-[#E8F5E9] text-[#11773D]',
];

$badgeImageMap = [
  'eco warrior' => '/assets/challange/ecowarrior.png',
  'water saver' => '/assets/challange/water-saver.png',
  'green starter' => '/assets/challange/green.png',
  'earth lover' => '/assets/challange/earth.png',
  'eco hero' => '/assets/challange/ecowarrior.png',
  'energy saver' => '/assets/challange/listrik.png',
  'plastic free' => '/assets/challange/30hari.png',
  'default' => '/assets/challange/ecowarrior.png',
];

$monthMap = [
  'January' => 'Januari',
  'February' => 'Februari',
  'March' => 'Maret',
  'April' => 'April',
  'May' => 'Mei',
  'June' => 'Juni',
  'July' => 'Juli',
  'August' => 'Agustus',
  'September' => 'September',
  'October' => 'Oktober',
  'November' => 'November',
  'December' => 'Desember',
];

$formatIndoDate = function (?string $dateString): string {
  if (empty($dateString)) {
    return 'Belum ada tanggal';
  }
  global $monthMap;

  $date = new DateTimeImmutable($dateString);
  $formatted = $date->format('d F Y');
  return strtr($formatted, $monthMap);
};

$normalizeBadgeKey = function (string $value): string {
  $normalized = strtolower(trim($value));
  $normalized = preg_replace('/[-_]+/', ' ', $normalized);
  $normalized = preg_replace('/\s+/', ' ', $normalized);
  return trim($normalized);
};

$challengeRowsStmt = $pdo->prepare("
  SELECT
    ch.id AS challenge_id,
    ch.title,
    ch.description,
    ch.image,
    ch.duration,
    ch.reward_point,
    ch.reward_badge,
    rb.name AS reward_badge_name,
    rb.image AS reward_badge_image,
    ch.tag,
    uc.progress,
    uc.target,
    uc.status,
    uc.joined_at,
    uc.completed_at
  FROM public.challenges ch
  LEFT JOIN public.badges rb ON rb.id = ch.reward_badge
  LEFT JOIN public.user_challenges uc
    ON uc.challenge_id = ch.id
   AND uc.user_id = :user_id
  ORDER BY ch.created_at DESC, uc.joined_at DESC
");
$challengeRowsStmt->execute([':user_id' => $userId]);
$challengeRows = $challengeRowsStmt->fetchAll(PDO::FETCH_ASSOC);

$activeChallenges = [];
$allChallenges = [];
$completedChallenges = [];

foreach ($challengeRows as $row) {
  $title = trim((string) ($row['title'] ?? 'Challenge'));
  $description = trim((string) ($row['description'] ?? 'Ikuti challenge ini untuk meningkatkan dampak positifmu.'));
  $image = !empty($row['image']) ? $row['image'] : '/assets/challange/30hari.png';
  $rewardPoint = (int) ($row['reward_point'] ?? 0);
  $duration = max(1, (int) ($row['duration'] ?? 30));
  $progress = (int) ($row['progress'] ?? 0);
  $target = max(1, (int) ($row['target'] ?? $duration));
  $status = strtolower((string) ($row['status'] ?? ''));
  $tag = trim((string) ($row['tag'] ?? 'Kebiasaan'));
  $badgeName = trim((string) ($row['reward_badge_name'] ?? 'Eco Warrior'));
  $badgeKey = $normalizeBadgeKey($badgeName);
  $badgeImage = !empty($row['reward_badge_image'])
    ? (string) $row['reward_badge_image']
    : ($badgeImageMap[$badgeKey] ?? $badgeImageMap['default']);
  $tagColor = $tagColorMap[$tag] ?? $tagColorMap['default'];
  $percent = min(100, (int) round(($progress / max(1, $target)) * 100));

  $allChallengeItem = [
    'challengeId' => (string) ($row['challenge_id'] ?? ''),
    'joined' => $status !== '',
    'status' => $status,
    'image' => $image,
    'title' => $title,
    'tag' => $tag,
    'tagColor' => $tagColor,
    'desc' => $description,
    'current' => (string) min($progress, $target),
    'total' => (string) $target,
    'percent' => $percent . '%',
    'point' => (string) $rewardPoint,
    'badge' => $badgeName ?: 'Eco Warrior',
    'badgeImage' => $badgeImage,
  ];

  $allChallenges[] = $allChallengeItem;

  if ($status === 'active') {
    $activeChallenges[] = [
      'challengeId' => (string) ($row['challenge_id'] ?? ''),
      'image' => $image,
      'title' => $title,
      'desc' => $description,
      'progress' => min($progress, $target) . ' / ' . $target . ' Hari',
      'percent' => $percent . '%',
      'point' => (string) $rewardPoint,
      'currentCount' => (string) min($progress, $target),
      'totalDays' => (string) $target,
      'pointLabel' => $rewardPoint . ' Eco Point',
      'badge' => $badgeName ?: 'Eco Warrior',
      'badgeImage' => $badgeImage,
    ];
  }

  if ($status === 'completed') {
    $completedChallenges[] = [
      'image' => $image,
      'title' => $title,
      'desc' => $description,
      'date' => 'Selesai pada ' . $formatIndoDate((string) ($row['completed_at'] ?? '')),
      'point' => (string) $rewardPoint,
      'badge' => $badgeName ?: 'Eco Warrior',
      'badgeImage' => $badgeImage,
    ];
  }
}

if (empty($activeChallenges) && !empty($allChallenges)) {
  $activeChallenges = [];
}

if (empty($completedChallenges) && !empty($allChallenges)) {
  $completedChallenges = [];
}

$featuredChallenge = $activeChallenges[0] ?? null;

$weeklyChartStmt = $pdo->prepare("
  WITH last7 AS (
    SELECT generate_series(CURRENT_DATE - INTERVAL '6 days', CURRENT_DATE, INTERVAL '1 day')::date AS activity_day
  )
  SELECT
    last7.activity_day AS day,
    COALESCE(SUM(e.point), 0) AS value
  FROM last7
  LEFT JOIN public.eco_actions e
    ON e.user_id = :user_id AND e.activity_date::date = last7.activity_day
  GROUP BY last7.activity_day
  ORDER BY last7.activity_day ASC
");
$weeklyChartStmt->execute([':user_id' => $userId]);
$weeklyRows = $weeklyChartStmt->fetchAll(PDO::FETCH_ASSOC);

$weeklyChartData = [];
$dayMap = [
  'Mon' => 'Sen',
  'Tue' => 'Sel',
  'Wed' => 'Rab',
  'Thu' => 'Kam',
  'Fri' => 'Jum',
  'Sat' => 'Sab',
  'Sun' => 'Min',
];

foreach ($weeklyRows as $row) {
  $dayText = $row['day'] ?? null;
  $weeklyChartData[] = [
    'day' => $dayMap[date('D', strtotime((string) $dayText))] ?? 'Sen',
    'value' => (int) ($row['value'] ?? 0),
  ];
}

if (count($weeklyChartData) < 7) {
  $cursor = new DateTimeImmutable('-6 days');
  $filledData = [];
  foreach ($weeklyChartData as $item) {
    $filledData[] = $item;
    $cursor = $cursor->modify('+1 day');
  }

  while (count($filledData) < 7) {
    $filledData[] = [
      'day' => $dayMap[$cursor->format('D')] ?? $cursor->format('D'),
      'value' => 0,
    ];
    $cursor = $cursor->modify('+1 day');
  }
  $weeklyChartData = $filledData;
}

$userBadgeStmt = $pdo->prepare("
  SELECT b.name, b.image
  FROM public.user_badges ub
  JOIN public.badges b ON b.id = ub.badge_id
  WHERE ub.user_id = :user_id
  ORDER BY ub.earned_at DESC
  LIMIT 4
");
$userBadgeStmt->execute([':user_id' => $userId]);
$userBadges = $userBadgeStmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($userBadges)) {
  $userBadges = [
    ['name' => 'Eco Warrior', 'image' => '/assets/challange/ecowarrior.png'],
    ['name' => 'Water Saver', 'image' => '/assets/challange/water-saver.png'],
    ['name' => 'Green Starter', 'image' => '/assets/challange/green.png'],
    ['name' => 'Earth Lover', 'image' => '/assets/challange/earth.png'],
  ];
}

$weeklyTotalPoints = array_sum(array_column($weeklyChartData, 'value'));
$completedChallengeTotalPoints = array_sum(array_map(function ($item) {
  return (int) ($item['point'] ?? 0);
}, $completedChallenges));
$completedChallengeCount = count($completedChallenges);
$userBadgeCount = count($userBadges);
?>

<div class="flex flex-col w-full gap-6 mx-auto">
  <div class="lg:grid-cols-3 grid grid-cols-1 gap-6">
    <div class="lg:col-span-2 flex flex-col gap-6">
      <div class="rounded-3xl flex flex-col flex-1 p-6 bg-white shadow-sm">
        <?php include __DIR__ . '/component/tab-nav.php'; ?>
        <?php include __DIR__ . '/component/challenge-active.php'; ?>
        <?php include __DIR__ . '/component/challenge-all.php'; ?>
        <?php include __DIR__ . '/component/challenge-completed.php'; ?>
      </div>
    </div>

    <div class="lg:col-span-1 flex flex-col gap-6">
      <?php include __DIR__ . '/component/challenge-summary.php'; ?>
      <?php include __DIR__ . '/component/challenge-weekly-progress.php'; ?>
      <?php include __DIR__ . '/component/challenge-badges.php'; ?>
      <?php include __DIR__ . '/component/challenge-tips.php'; ?>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".join-challenge-btn").forEach(button => {
      button.addEventListener("click", async function() {
        const originalText = this.textContent;
        this.disabled = true;
        this.textContent = "Menyimpan...";

        const formData = new FormData();
        formData.set("challenge_id", this.dataset.challengeId || "");

        try {
          const response = await fetch("/dashboard/actions/challenge/join_challenge.php", {
            method: "POST",
            body: formData,
          });
          const data = await response.json();

          if (data.status === "success") {
            window.location.reload();
          } else {
            alert(data.message || "Gagal mengikuti challenge.");
          }
        } catch (error) {
          alert("Terjadi kesalahan sistem.");
        } finally {
          this.disabled = false;
          this.textContent = originalText;
        }
      });
    });

    const challengeSearchInput = document.getElementById("challengeSearchInput");
    const challengeCategoryFilter = document.getElementById("challengeCategoryFilter");
    const challengeSortFilter = document.getElementById("challengeSortFilter");
    const challengeList = document.getElementById("challengeList");
    const challengeResultCount = document.getElementById("challengeResultCount");
    const challengeEmptyState = document.getElementById("challengeEmptyState");

    function applyChallengeFilters() {
      if (!challengeSearchInput || !challengeCategoryFilter || !challengeSortFilter || !challengeList) return;

      const query = challengeSearchInput.value.trim().toLowerCase();
      const category = challengeCategoryFilter.value;
      const sortType = challengeSortFilter.value;
      const cards = Array.from(challengeList.querySelectorAll(".challenge-card"));

      cards.forEach(card => {
        const searchableText = [
          card.dataset.title || "",
          card.dataset.desc || "",
          card.dataset.tag || "",
          card.dataset.badge || "",
        ].join(" ");
        const matchesSearch = !query || searchableText.includes(query);
        const matchesCategory = category === "semua" || (card.dataset.tag || "") === category;
        card.classList.toggle("hidden", !(matchesSearch && matchesCategory));
      });

      const visibleCards = cards.filter(card => !card.classList.contains("hidden"));

      visibleCards.sort((a, b) => {
        if (sortType === "poin-tertinggi") {
          return Number(b.dataset.point || 0) - Number(a.dataset.point || 0);
        }
        if (sortType === "nama") {
          return (a.dataset.title || "").localeCompare(b.dataset.title || "", "id");
        }
        return 0;
      });

      visibleCards.forEach(card => challengeList.appendChild(card));

      if (challengeResultCount) {
        challengeResultCount.textContent = visibleCards.length === 1 ?
          "1 challenge ditemukan" :
          `${visibleCards.length} challenge ditemukan`;
      }
      if (challengeEmptyState) {
        challengeEmptyState.classList.toggle("hidden", visibleCards.length !== 0);
      }
    }

    challengeSearchInput?.addEventListener("input", applyChallengeFilters);
    challengeCategoryFilter?.addEventListener("change", applyChallengeFilters);
    challengeSortFilter?.addEventListener("change", applyChallengeFilters);
    applyChallengeFilters();

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