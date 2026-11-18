<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

function syncChallengeProgress(PDO $pdo, string $userId): array {
  $synced = [];

  $stmt = $pdo->prepare("
    SELECT uc.id, uc.challenge_id, uc.progress, uc.target, uc.status,
           uc.reward_claimed, uc.joined_at, ch.duration, ch.reward_point,
           ch.reward_badge, rb.name AS reward_badge_name,
           ch.tag, ch.title, ch.description
    FROM public.user_challenges uc
    JOIN public.challenges ch ON ch.id = uc.challenge_id
    LEFT JOIN public.badges rb ON rb.id = ch.reward_badge
    WHERE uc.user_id = :user_id
      AND uc.status = 'active'
  ");
  $stmt->execute([':user_id' => $userId]);
  $active = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($active as $challenge) {
    $target = max(1, (int)($challenge['target'] ?? $challenge['duration'] ?? 30));
    $tag = strtolower(trim((string)($challenge['tag'] ?? '')));
    $title = strtolower(trim((string)($challenge['title'] ?? '')));

    $sql = "
      SELECT COUNT(DISTINCT activity_date::date) AS progress
      FROM public.eco_actions ea
      LEFT JOIN public.categories c ON c.id = ea.category_id
      WHERE ea.user_id = :user_id
        AND ea.status = 'verified'
        AND ea.activity_date >= :joined_at
        AND (
          (:tag = '' OR LOWER(COALESCE(c.name, '')) = :tag)
          OR (:title = '' OR LOWER(COALESCE(ea.title, '')) LIKE '%' || :title || '%')
          OR (:tag = '' OR LOWER(COALESCE(ea.description, '')) LIKE '%' || :tag || '%')
        )
    ";

    $progressStmt = $pdo->prepare($sql);
    $progressStmt->execute([
      ':user_id' => $userId,
      ':joined_at' => $challenge['joined_at'],
      ':tag' => $tag,
      ':title' => $title,
    ]);
    $progress = min($target, (int)$progressStmt->fetchColumn());

    $completed = $progress >= $target;

    $update = $pdo->prepare("
      UPDATE public.user_challenges
      SET progress = :progress,
          status = :status,
          completed_at = CASE WHEN :completed THEN COALESCE(completed_at, NOW()) ELSE NULL END
      WHERE id = :id
    ");
    $update->execute([
      ':progress' => $progress,
      ':status' => $completed ? 'completed' : 'active',
      ':completed' => $completed,
      ':id' => $challenge['id'],
    ]);

    if ($completed && !(bool)$challenge['reward_claimed']) {
      $rewardPoint = max(0, (int)$challenge['reward_point']);

      if ($rewardPoint > 0) {
        $xpStmt = $pdo->prepare("UPDATE public.profiles SET xp = COALESCE(xp, 0) + :points WHERE id = :user_id");
        $xpStmt->execute([':points' => $rewardPoint, ':user_id' => $userId]);
      }

      $badgeId = trim((string)$challenge['reward_badge']);
      if ($badgeId !== '') {
        $badgeExistsStmt = $pdo->prepare("SELECT 1 FROM public.badges WHERE id = :badge_id LIMIT 1");
        $badgeExistsStmt->execute([':badge_id' => $badgeId]);

        if ($badgeExistsStmt->fetchColumn()) {
          $existsStmt = $pdo->prepare("SELECT 1 FROM public.user_badges WHERE user_id = :user_id AND badge_id = :badge_id LIMIT 1");
          $existsStmt->execute([':user_id' => $userId, ':badge_id' => $badgeId]);
          if (!$existsStmt->fetchColumn()) {
            $insertBadge = $pdo->prepare("INSERT INTO public.user_badges (user_id, badge_id) VALUES (:user_id, :badge_id)");
            $insertBadge->execute([':user_id' => $userId, ':badge_id' => $badgeId]);
          }
        }
      }

      $claimStmt = $pdo->prepare("UPDATE public.user_challenges SET reward_claimed = true WHERE id = :id");
      $claimStmt->execute([':id' => $challenge['id']]);
    }

    $synced[] = [
      'challenge_id' => $challenge['challenge_id'],
      'progress' => $progress,
      'target' => $target,
      'completed' => $completed,
    ];
  }

  return $synced;
}
