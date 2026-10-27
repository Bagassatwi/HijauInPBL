<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
$payload = $_POST;
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
