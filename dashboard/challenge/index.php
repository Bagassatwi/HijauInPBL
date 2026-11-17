<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

$userId = $_SESSION['user']['id'] ?? null;
if (!$userId) {
  header('Location: /login.php');
  exit;
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
    ch.tag,
    uc.progress,
    uc.target,
    uc.status,
    uc.joined_at,
    uc.completed_at
  FROM public.challenges ch
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
  $badgeName = trim((string) ($row['reward_badge'] ?? 'Eco Warrior'));
  $badgeKey = $normalizeBadgeKey($badgeName);
  $badgeImage = $badgeImageMap[$badgeKey] ?? $badgeImageMap['default'];
  $tagColor = $tagColorMap[$tag] ?? $tagColorMap['default'];
  $percent = min(100, (int) round(($progress / max(1, $target)) * 100));

  $allChallengeItem = [
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
  $activeChallenges = array_slice($allChallenges, 0, 5);
  foreach ($activeChallenges as $index => $item) {
    $activeChallenges[$index]['progress'] = min((int) $item['current'], (int) $item['total']) . ' / ' . $item['total'] . ' Hari';
    $activeChallenges[$index]['percent'] = str_replace('%', '', $item['percent']) . '%';
    $activeChallenges[$index]['point'] = (string) $item['point'];
    $activeChallenges[$index]['currentCount'] = $item['current'];
    $activeChallenges[$index]['totalDays'] = $item['total'];
    $activeChallenges[$index]['pointLabel'] = $item['point'] . ' Eco Point';
    $activeChallenges[$index]['badge'] = $item['badge'] ?? 'Eco Warrior';
    $activeChallenges[$index]['badgeImage'] = $item['badgeImage'] ?? '/assets/challange/ecowarrior.png';
  }
}

if (empty($completedChallenges) && !empty($allChallenges)) {
  $completedChallenges = array_filter($allChallenges, function ($item) {
    return (int) $item['current'] >= (int) $item['total'];
  });
}

$featuredChallenge = $activeChallenges[0] ?? $allChallenges[0] ?? null;

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