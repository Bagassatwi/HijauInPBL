<?php
require_once __DIR__ . "/utils/connection.php";

function getLevelThreshold(int $level): int {
  $safeLevel = max(1, $level);
  return (int) (25 * ($safeLevel - 1) * ($safeLevel + 2));
}

function getGeneratedLevels(int $maxLevel = 7): array {
  $levels = [];

  for ($level = 1; $level <= $maxLevel; $level++) {
    $levels[] = [
      'level' => $level,
      'minXp' => getLevelThreshold($level),
      'title' => 'Eco Level ' . $level,
    ];
  }

  return $levels;
}

function normalizeLevelEntry(array $level): array {
  $levelNumber = (int) ($level['level'] ?? 1);

  return [
    'level' => max(1, $levelNumber),
    'minXp' => getLevelThreshold(max(1, $levelNumber)),
    'title' => (string) ($level['title'] ?? 'Eco Beginner 🌱'),
    'photo' => $level['photo']
  ];
}

function getLevelsFromDatabase(): array {
  global $pdo;

  if (!isset($pdo)) {
    return getGeneratedLevels();
  }

  try {
    $stmt = $pdo->query("SELECT level, min_xp, title, photo FROM public.levels ORDER BY min_xp DESC");
    $levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($levels)) {
      return getGeneratedLevels();
    }

    $normalizedLevels = [];
    foreach ($levels as $level) {
      $normalizedEntry = normalizeLevelEntry($level);
      $normalizedLevels[] = $normalizedEntry;
    }

    usort($normalizedLevels, fn($a, $b) => (int) $a['minXp'] <=> (int) $b['minXp']);

    return $normalizedLevels;
  } catch (Throwable $th) {
    return getGeneratedLevels();
  }
}

function calculateLevel(int $xp): int {
  $levels = getLevelsFromDatabase();
  $maxLevel = max(1, (int) ($levels[array_key_last($levels)]['level'] ?? 7));

  $currentLevel = 1;
  foreach ($levels as $entry) {
    if ((int) $xp >= (int) $entry['minXp']) {
      $currentLevel = (int) ($entry['level'] ?? 1);
      if ($currentLevel >= $maxLevel) {
        break;
      }
      continue;
    }

    break;
  }

  return $currentLevel;
}

function getCurrentLevel(int $xp, array $levels): array {
  $sortedLevels = $levels ?: getLevelsFromDatabase();
  usort($sortedLevels, fn($a, $b) => (int) $a['minXp'] <=> (int) $b['minXp']);

  if (empty($sortedLevels)) {
    return [
      'level' => 1,
      'title' => 'Eco Beginner 🌱',
    ];
  }

  $currentLevel = $sortedLevels[0];
  foreach ($sortedLevels as $level) {
    if ((int) $xp >= (int) $level['minXp']) {
      $currentLevel = $level;
      continue;
    }

    break;
  }

  $currentLevelNumber = (int) ($currentLevel['level'] ?? 1);
  $maxLevel = (int) ($sortedLevels[array_key_last($sortedLevels)]['level'] ?? 7);
  if ($currentLevelNumber > $maxLevel) {
    $currentLevelNumber = $maxLevel;
  }

  return [
    'level' => $currentLevelNumber,
    'title' => (string) ($currentLevel['title'] ?? 'Eco Beginner 🌱'),
    'photo' => (string) $currentLevel['photo']
  ];
}

function getLevelProgress(int $xp, array $levels = []): array {
  $sortedLevels = $levels ?: getLevelsFromDatabase();
  usort($sortedLevels, fn($a, $b) => (int) $a['minXp'] <=> (int) $b['minXp']);

  if (empty($sortedLevels)) {
    $sortedLevels = getGeneratedLevels();
  }

  $maxLevel = (int) ($sortedLevels[array_key_last($sortedLevels)]['level'] ?? 7);
  $maxThreshold = getLevelThreshold($maxLevel);
  $currentLevelInfo = getCurrentLevel($xp, $sortedLevels);
  $currentLevel = (int) ($currentLevelInfo['level'] ?? 1);

  if ($currentLevel >= $maxLevel && $xp >= $maxThreshold) {
    return [
      'progress' => 100,
      'currentXp' => $xp,
      'nextXp' => $maxThreshold,
      'isMaxLevel' => true,
      'progressLabel' => 'MAX',
    ];
  }

  $currentMinXp = 0;
  $nextXp = $maxThreshold;

  foreach ($sortedLevels as $index => $level) {
    if ((int) $xp >= (int) $level['minXp']) {
      $currentMinXp = (int) $level['minXp'];
      $nextLevel = $sortedLevels[$index + 1] ?? null;
      $nextXp = $nextLevel ? (int) $nextLevel['minXp'] : $maxThreshold;
      continue;
    }

    $nextXp = (int) $level['minXp'];
    break;
  }

  $progress = $currentMinXp >= $nextXp ? 100 : (($xp - $currentMinXp) / max(1, $nextXp - $currentMinXp)) * 100;

  return [
    'progress' => min(100, max(0, $progress)),
    'currentXp' => $xp,
    'nextXp' => $nextXp,
    'isMaxLevel' => false,
    'progressLabel' => (string) min(100, max(0, round($progress))) . '%',
  ];
}

if (!function_exists('getNotifications')) {
  function getNotifications(string $userId): array {
    if (empty($userId)) {
      return [];
    }

    global $pdo;

    try {
      $stmt = $pdo->prepare("SELECT id, user_id, title, message, is_read, created_at
        FROM public.notifications
        WHERE user_id = :user_id
        ORDER BY created_at DESC");
      $stmt->execute([':user_id' => $userId]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Throwable $th) {
      return [];
    }
  }
}

if (!function_exists('markAllNotificationsAsRead')) {
  function markAllNotificationsAsRead(string $userId): bool {
    if (empty($userId)) {
      return false;
    }

    global $pdo;

    try {
      $stmt = $pdo->prepare("UPDATE public.notifications
        SET is_read = true
        WHERE user_id = :user_id AND is_read = false");
      $stmt->execute([':user_id' => $userId]);

      return true;
    } catch (Throwable $th) {
      return false;
    }
  }
}
