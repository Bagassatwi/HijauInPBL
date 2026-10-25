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
    return [];
  }
}
