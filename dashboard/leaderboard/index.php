<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

if (!isset($_SESSION['user']['id']) || empty($_SESSION['user']['id'])) {
  header('Location: /login.php');
  exit;
}

$userId = $_SESSION['user']['id'];

$leaderboardStmt = $pdo->prepare("
  SELECT
    p.id,
    p.full_name,
    COALESCE(p.avatar_url, '/assets/avatar.png') AS avatar_url,
    COALESCE(p.eco_score, 0) AS eco_score,
    COALESCE(p.xp, 0) AS xp,
    COALESCE(p.level, 1) AS level,
    ROW_NUMBER() OVER (
      ORDER BY p.eco_score DESC, p.xp DESC, p.full_name ASC
    ) AS rank
  FROM public.profiles p
  WHERE p.full_name IS NOT NULL
  ORDER BY p.eco_score DESC, p.xp DESC, p.full_name ASC
  LIMIT 10
");
$leaderboardStmt->execute();
$leaderboard = $leaderboardStmt->fetchAll(PDO::FETCH_ASSOC);

$currentUserStmt = $pdo->prepare("
  WITH ranked AS (
    SELECT
      p.id,
      ROW_NUMBER() OVER (
        ORDER BY p.eco_score DESC, p.xp DESC, p.full_name ASC
      ) AS rank
    FROM public.profiles p
    WHERE p.full_name IS NOT NULL
  )
  SELECT rank
  FROM ranked
  WHERE id = :user_id
");
$currentUserStmt->execute([':user_id' => $userId]);
$currentUserRank = (int) ($currentUserStmt->fetchColumn() ?: 0);

$currentUserSummary = null;
foreach ($leaderboard as $row) {
  if (($row['id'] ?? '') === $userId) {
    $currentUserSummary = $row;
    break;
  }
}

if (!$currentUserSummary) {
  $currentUserProfileStmt = $pdo->prepare("
    SELECT
      p.id,
      p.full_name,
      COALESCE(p.avatar_url, '/assets/avatar.png') AS avatar_url,
      COALESCE(p.eco_score, 0) AS eco_score,
      COALESCE(p.xp, 0) AS xp,
      COALESCE(p.level, 1) AS level
    FROM public.profiles p
    WHERE p.id = :user_id
    LIMIT 1
  ");
  $currentUserProfileStmt->execute([':user_id' => $userId]);
  $currentUserSummary = $currentUserProfileStmt->fetch(PDO::FETCH_ASSOC) ?: [
    'id' => $userId,
    'full_name' => $_SESSION['user']['full_name'] ?? 'User',
    'avatar_url' => '/assets/avatar.png',
    'eco_score' => 0,
    'xp' => 0,
    'level' => 1,
  ];
}

$topThree = array_slice($leaderboard, 0, 3);
$podiumMeta = [
  0 => ['label' => 'Juara 1', 'ring' => 'ring-4 ring-[#F2C94C]', 'badge' => '🏆'],
  1 => ['label' => 'Juara 2', 'ring' => 'ring-4 ring-[#C0C0C0]', 'badge' => '🥈'],
  2 => ['label' => 'Juara 3', 'ring' => 'ring-4 ring-[#CD7F32]', 'badge' => '🥉'],
];
?>

<div class="flex flex-col gap-6">
  <section class="rounded-[28px] bg-white p-6 shadow-[0_8px_30px_rgba(15,23,42,0.04)] sm:p-8">
    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <div>
        <p class="mb-2 text-sm font-semibold uppercase tracking-[0.18em] text-[#11773D]">Ranking komunitas</p>
        <h2 class="text-3xl font-bold text-[#0B0F1F]">Leaderboard HijauIn</h2>
      </div>

      <div class="rounded-2xl border border-[#D7F3DF] bg-[#F1F8F3] px-5 py-3 text-left">
        <p class="text-sm font-medium text-[#475467]">Peringkatmu</p>
        <p class="text-2xl font-black text-[#11773D]">#<?= $currentUserRank > 0 ? number_format($currentUserRank, 0, ',', '.') : '-' ?></p>
      </div>
    </div>

    <?php if (empty($leaderboard)): ?>
      <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-8 text-center text-gray-500">
        Belum ada data leaderboard untuk ditampilkan.
      </div>
    <?php else: ?>
      <div class="grid gap-4 md:grid-cols-3">
        <?php foreach ($leaderboard as $index => $entry): ?>
          <?php if ($index >= 3) continue; ?>
          <?php
          $meta = $podiumMeta[$index] ?? ['label' => 'Top', 'ring' => 'ring-4 ring-[#E5E7EB]', 'badge' => '✨'];
          $isFirst = $index === 0;
          ?>
          <div class="rounded-[26px] border border-gray-100 bg-gradient-to-br from-white to-[#F8FBF8] p-5 text-center shadow-sm <?= $isFirst ? 'md:-translate-y-2 md:scale-[1.02]' : '' ?>">
            <div class="mb-4 flex justify-center">
              <div class="flex h-16 w-16 items-center justify-center rounded-full bg-[#F5F7F5] text-3xl <?= $meta['ring'] ?>">
                <?= $meta['badge'] ?>
              </div>
            </div>
            <p class="text-sm font-semibold uppercase tracking-wide text-[#667085]"><?= htmlspecialchars($meta['label']) ?></p>
            <img src="<?= htmlspecialchars($entry['avatar_url'] ?? '/assets/avatar.png') ?>" alt="<?= htmlspecialchars($entry['full_name'] ?? 'User') ?>" class="mx-auto my-4 h-20 w-20 rounded-full object-cover border-4 border-white shadow-sm" />
            <h3 class="truncate text-lg font-bold text-[#0B0F1F]"><?= htmlspecialchars($entry['full_name'] ?? 'User') ?></h3>
            <p class="mt-2 text-sm font-medium text-[#475467]">Level <?= (int) ($entry['level'] ?? 1) ?></p>
            <div class="mt-4 rounded-2xl bg-[#F0F9F3] px-4 py-3">
              <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#11773D]">Eco Score</p>
              <p class="mt-1 text-2xl font-black text-[#11773D]">
                <?= number_format((int) ($entry['eco_score'] ?? 0), 0, ',', '.') ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <section class="rounded-[28px] bg-white p-6 shadow-[0_8px_30px_rgba(15,23,42,0.04)] sm:p-8">
    <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#11773D]">Peringkat teratas</p>
        <h3 class="text-2xl font-bold text-[#0B0F1F]">10 Pengguna Terbaik</h3>
      </div>
      <div class="rounded-full border border-[#E4E7EC] bg-[#F9FAFB] px-3 py-1.5 text-sm font-medium text-[#475467]">
        Total: <?= count($leaderboard) ?> peserta
      </div>
    </div>

    <div class="overflow-hidden rounded-2xl border border-gray-100">
      <div class="overflow-x-auto">
        <table class="min-w-full text-left">
          <thead class="bg-[#F7F9F7] text-sm font-semibold uppercase tracking-wide text-[#667085]">
            <tr>
              <th class="px-5 py-4">Peringkat</th>
              <th class="px-5 py-4">Pengguna</th>
              <th class="px-5 py-4">Level</th>
              <th class="px-5 py-4">XP</th>
              <th class="px-5 py-4 text-right">Eco Score</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($leaderboard as $entry): ?>
              <?php $isCurrentUser = (($entry['id'] ?? '') === ($userId ?? '')); ?>
              <tr class="border-t border-gray-100 <?= $isCurrentUser ? 'bg-[#F1F8F3]' : 'bg-white' ?>">
                <td class="px-5 py-4">
                  <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-[#EAF7F0] text-sm font-bold text-[#11773D]">
                    <?= (int) ($entry['rank'] ?? 0) ?>
                  </span>
                </td>
                <td class="px-5 py-4">
                  <div class="flex items-center gap-3">
                    <img src="<?= htmlspecialchars($entry['avatar_url'] ?? '/assets/avatar.png') ?>" alt="<?= htmlspecialchars($entry['full_name'] ?? 'User') ?>" class="h-11 w-11 rounded-full object-cover" />
                    <div>
                      <p class="text-base font-bold text-[#0B0F1F]">
                        <?= htmlspecialchars($entry['full_name'] ?? 'User') ?>
                        <?php if ($isCurrentUser): ?>
                          <span class="ml-2 rounded-full bg-[#11773D] px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-white">Kamu</span>
                        <?php endif; ?>
                      </p>
                      <p class="text-sm text-[#667085]">Eco contributor</p>
                    </div>
                  </div>
                </td>
                <td class="px-5 py-4 text-base font-semibold text-[#475467]">
                  <?= (int) ($entry['level'] ?? 1) ?>
                </td>
                <td class="px-5 py-4 text-base font-semibold text-[#475467]">
                  <?= number_format((int) ($entry['xp'] ?? 0), 0, ',', '.') ?>
                </td>
                <td class="px-5 py-4 text-right text-base font-black text-[#11773D]">
                  <?= number_format((int) ($entry['eco_score'] ?? 0), 0, ',', '.') ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php';
