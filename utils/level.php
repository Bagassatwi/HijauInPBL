<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/utils/connection.php");

function normalizeLevelEntry(array $level): array {
  return [
    'level' => (int) ($level['level'] ?? 1),
    'minXp' => (int) ($level['min_xp'] ?? $level['minXp'] ?? 0),
    'title' => (string) ($level['title'] ?? 'Eco Beginner 🌱'),
  ];
}

function getLevelsFromDatabase(): array {
  global $pdo;

  if (!isset($pdo)) {
    return [];
  }

  try {
    $stmt = $pdo->query("SELECT level, min_xp, title FROM public.levels ORDER BY min_xp DESC");
    $levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($levels)) {
      return [];
    }

    $normalizedLevels = [];
    foreach ($levels as $level) {
      $normalizedLevels[] = normalizeLevelEntry($level);
    }

    usort($normalizedLevels, fn($a, $b) => (int) $a['minXp'] <=> (int) $b['minXp']);

    return $normalizedLevels;
  } catch (Throwable $th) {
    return [];
  }
}

function calculateLevel(int $xp): int {
  $levels = getLevelsFromDatabase();

  if (empty($levels)) {
    return (int) floor($xp / 100) + 1;
  }

  $level = $levels[0];
  foreach ($levels as $entry) {
    if ((int) $xp >= (int) $entry['minXp']) {
      $level = $entry;
    } else {
      break;
    }
  }

  return (int) ($level['level'] ?? 1);
}

function getCurrentLevel(int $xp, array $levels): array {
  $sortedLevels = $levels;
  usort($sortedLevels, fn($a, $b) => (int) $a['minXp'] <=> (int) $b['minXp']);

  if (empty($sortedLevels)) {
    return [
      'level' => max(1, (int) floor($xp / 100) + 1),
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

  return [
    'level' => (int) ($currentLevel['level'] ?? 1),
    'title' => (string) ($currentLevel['title'] ?? 'Eco Beginner 🌱'),
  ];
}

function getLevelProgress(int $xp, array $levels = []): array {
  $sortedLevels = $levels ?: getLevelsFromDatabase();
  usort($sortedLevels, fn($a, $b) => (int) $a['minXp'] <=> (int) $b['minXp']);

  if (empty($sortedLevels)) {
    $nextXp = max(100, ((int) floor($xp / 100) + 1) * 100);
    $progress = $xp <= 0 ? 0 : min(100, ($xp / $nextXp) * 100);

    return [
      'progress' => $progress,
      'currentXp' => $xp,
      'nextXp' => $nextXp,
    ];
  }

  $currentMinXp = 0;
  $nextXp = $sortedLevels[0]['minXp'] ?? 0;

  foreach ($sortedLevels as $index => $level) {
    if ((int) $xp >= (int) $level['minXp']) {
      $currentMinXp = (int) $level['minXp'];
      $nextXp = (int) ($sortedLevels[$index + 1]['minXp'] ?? $currentMinXp + 100);
      continue;
    }

    $nextXp = (int) $level['minXp'];
    break;
  }

  if ($nextXp <= $currentMinXp) {
    $nextXp = $currentMinXp + 100;
  }

  $progress = $currentMinXp >= $nextXp ? 100 : (($xp - $currentMinXp) / max(1, $nextXp - $currentMinXp)) * 100;

  return [
    'progress' => min(100, max(0, $progress)),
    'currentXp' => $xp,
    'nextXp' => $nextXp,
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
