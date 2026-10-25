<?php
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
        LEFT JOIN public.categories c ON e.category_id = c.id
        WHERE e.user_id = :user_id
        ORDER BY e.activity_date DESC
    ");
  $stmt->execute([':user_id' => $userId]);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return array_map(function ($row) {
    return [
      'id' => $row['id'],
      'user_id' => $row['user_id'],
      'category_id' => $row['category_id'],
      'title' => $row['title'],
      'description' => $row['description'],
      'point' => (int)$row['point'],
      'verification_type' => $row['verification_type'],
      'status' => $row['status'],
      'activity_date' => $row['activity_date'],
      'co2_saved' => (float)($row['co2_saved'] ?? 0),
      'water_saved' => (float)($row['water_saved'] ?? 0),
      'energy_saved' => (float)($row['energy_saved'] ?? 0),
      'category' => $row['cat_id'] ? [
        'id' => $row['cat_id'],
        'name' => $row['category_name'],
        'color' => $row['category_color'],
        'icon' => $row['category_icon'],
      ] : null,
      'category_name' => $row['category_name'] ?? 'Kebiasaan'
    ];
  }, $results);
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

function rewardUser(PDO $pdo, string $userId, int $points): bool {
  $stmt = $pdo->prepare("UPDATE public.users SET xp = COALESCE(xp, 0) + :points WHERE id = :user_id");
  $success = $stmt->execute([':points' => $points, ':user_id' => $userId]);

  if (isset($_SESSION['user']) && $_SESSION['user']['id'] === $userId) {
    $_SESSION['user']['xp'] = ((int)($_SESSION['user']['xp'] ?? 0)) + $points;
  }

  return $success;
}
