<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/utils/connection.php");

function calculateLevel(int $xp): int {
  return (int) floor($xp / 100) + 1;
}
function getCurrentLevel(int $xp, array $levels): array {
  $level = (int) floor($xp / 100) + 1;
  $title = array_find(array_reverse($levels), fn($val) => (int) $xp >= $val['minXp']);
  return [
    'level' => $level,
    'title' => $title["title"]
  ];
}

function getLevelProgress(int $xp): array {
  $nextXp = ((int) floor($xp / 100) + 1) * 100;
  $progress = ($xp / $nextXp) * 100;

  return [
    'progress'  => $progress,
    'currentXp' => $xp,
    'nextXp'    => $nextXp
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
