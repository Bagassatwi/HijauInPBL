<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

function getAllActivities(PDO $pdo, string $userId): array {
  $stmt = $pdo->prepare("
        SELECT 
            e.*,
            c.id AS cat_id,
            c.name AS category_name,
            c.color AS category_color,
            c.icon AS category_icon
        FROM public.eco_actions e
        JOIN public.categories c ON e.category_id = c.id
        WHERE e.user_id = :user_id
        ORDER BY e.activity_date DESC
    ");
  $stmt->execute([':user_id' => $userId]);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return array_map(fn($row) => [
    'id' => $row['id'],
    'user_id' => $row['user_id'],
    'category_id' => $row['category_id'],
    'title' => $row['title'],
    'description' => $row['description'],
    'point' => (int) $row['point'],
    'verification_type' => $row['verification_type'],
    'status' => $row['status'],
    'photo_url' => $row['photo_url'],
    'image_url' => $row['image_url'],
    'activity_date' => $row['activity_date'],
    'co2_saved' => (float) ($row['co2_saved'] ?? 0),
    'water_saved' => (float) ($row['water_saved'] ?? 0),
    'energy_saved' => (float) ($row['energy_saved'] ?? 0),
    'category' => $row['cat_id'] ? [
      'id' => $row['cat_id'],
      'name' => $row['category_name'],
      'color' => $row['category_color'],
      'icon' => $row['category_icon'],
    ] : NULL,
    'category_name' => $row['category_name'] ?? 'Kebiasaan'
  ], $results);
}

function getActivityById(PDO $pdo, string $id): ?array {
  $stmt = $pdo->prepare("SELECT * FROM public.eco_actions WHERE id = :id LIMIT 1");
  $stmt->execute([':id' => $id]);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  return $data ?: null;
}

function createActivity(PDO $pdo, array $payload): ?array {
  $sql = "
        INSERT INTO public.eco_actions (
            user_id, category_id, title, description, point, 
            verification_type, status, activity_date, co2_saved, water_saved, energy_saved
        ) VALUES (
            :user_id, :category_id, :title, :description, :point, 
            :verification_type, :status, :activity_date, :co2_saved, :water_saved, :energy_saved
        ) RETURNING *
    ";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':user_id'           => $payload['user_id'],
    ':category_id'       => $payload['category_id'],
    ':title'             => $payload['title'],
    ':description'       => $payload['description'] ?? '',
    ':point'             => (int)($payload['point'] ?? 0),
    ':verification_type' => $payload['verification_type'] ?? 'manual',
    ':status'            => $payload['status'] ?? 'verified',
    ':activity_date'     => $payload['activity_date'] ?? date('Y-m-d H:i:s'),
    ':co2_saved'         => (float)($payload['co2_saved'] ?? 0),
    ':water_saved'       => (float)($payload['water_saved'] ?? 0),
    ':energy_saved'      => (float)($payload['energy_saved'] ?? 0)
  ]);

  return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

function updateActivity(PDO $pdo, string $id, array $payload): bool {
  $fields = [];
  $params = [':id' => $id];

  foreach ($payload as $key => $value) {
    $fields[] = "{$key} = :{$key}";
    $params[":{$key}"] = $value;
  }

  if (empty($fields)) {
    return false;
  }

  $sql = "UPDATE public.eco_actions SET " . implode(', ', $fields) . " WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  return $stmt->execute($params);
}

function deleteActivity(PDO $pdo, string $id): bool {
  $stmt = $pdo->prepare("DELETE FROM public.eco_actions WHERE id = :id");
  return $stmt->execute([':id' => $id]);
}

function getCategories(PDO $pdo): array {
  $stmt = $pdo->query("SELECT * FROM public.categories ORDER BY created_at ASC");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserXp(PDO $pdo, string $userId): int {
  $stmt = $pdo->prepare("SELECT xp FROM public.profiles WHERE id = :user_id LIMIT 1");
  $stmt->execute([':user_id' => $userId]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return (int)($row['xp'] ?? 0);
}

function getWeeklyActivityInsight(PDO $pdo, string $userId): array {
  $stmt = $pdo->prepare("
    SELECT
      COALESCE(SUM(CASE WHEN activity_date >= NOW() - INTERVAL '6 days' THEN COALESCE(co2_saved, 0) ELSE 0 END), 0) AS co2_saved,
      COALESCE(SUM(CASE WHEN activity_date >= NOW() - INTERVAL '6 days' THEN COALESCE(water_saved, 0) ELSE 0 END), 0) AS water_saved,
      COALESCE(SUM(CASE WHEN activity_date >= NOW() - INTERVAL '6 days' THEN COALESCE(energy_saved, 0) ELSE 0 END), 0) AS energy_saved,
      COUNT(*) AS action_count,
      COALESCE(SUM(CASE WHEN LOWER(title) LIKE '%menanam pohon%' THEN 1 ELSE 0 END), 0) AS trees_planted
    FROM public.eco_actions
    WHERE user_id = :user_id
      AND activity_date >= NOW() - INTERVAL '6 days'
  ");

  $stmt->execute([':user_id' => $userId]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return [
    'co2_saved' => (float)($row['co2_saved'] ?? 0),
    'water_saved' => (float)($row['water_saved'] ?? 0),
    'energy_saved' => (float)($row['energy_saved'] ?? 0),
    'action_count' => (int)($row['action_count'] ?? 0),
    'trees_planted' => (int)($row['trees_planted'] ?? 0),
  ];
}

function rewardUser(PDO $pdo, string $userId, int $points): ?int {
  $stmt = $pdo->prepare("
    UPDATE public.profiles
    SET xp = COALESCE(xp, 0) + :points
    WHERE id = :user_id
    RETURNING xp
  ");
  $success = $stmt->execute([':points' => $points, ':user_id' => $userId]);

  if (!$success) {
    return null;
  }

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $newXp = (int)($row['xp'] ?? 0);

  $levelStmt = $pdo->prepare("
    UPDATE public.profiles p
    SET level = COALESCE((
      SELECT l.level
      FROM public.levels l
      WHERE l.min_xp <= p.xp
      ORDER BY l.min_xp DESC
      LIMIT 1
    ), 1)
    WHERE p.id = :user_id
    RETURNING level
  ");
  $levelStmt->execute([':user_id' => $userId]);
  $levelRow = $levelStmt->fetch(PDO::FETCH_ASSOC);
  $newLevel = (int)($levelRow['level'] ?? 1);

  if (isset($_SESSION['user']) && (string)($_SESSION['user']['id'] ?? '') === $userId) {
    $_SESSION['user']['xp'] = $newXp;
    $_SESSION['user']['level'] = $newLevel;
  }

  return $newXp;
}
