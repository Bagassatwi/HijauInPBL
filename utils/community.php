<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

function formatCommunityRow(array $community): array {
  return [
    'id' => $community['id'] ?? null,
    'image' => $community['image'] ?: '/assets/dashboard-komunitas/bumi.png',
    'title' => $community['name'] ?: 'Komunitas',
    'members' => number_format((int) ($community['member_count'] ?? $community['joined_members'] ?? 0), 0, ',', '.'),
    'desc' => $community['description'] ?: ($community['caption'] ?: 'Komunitas ramah lingkungan.'),
    'city' => $community['city'] ?? 'Indonesia',
    'tag' => !empty($community['tags']) && is_array($community['tags']) ? $community['tags'][0] : 'Lingkungan',
    'tagColor' => 'bg-[#E8F5E9] text-[#11773D]',
    'date' => $community['created_at'] ? date('d M Y', strtotime($community['created_at'])) : 'Baru dibuat',
    'created_at' => $community['created_at'] ?? null,
    'caption' => $community['caption'] ?? '',
    'member_count' => (int) ($community['member_count'] ?? $community['joined_members'] ?? 0),
    'posts' => 0,
  ];
}

function fetchPopularCommunities(int $limit = 5): array {
  global $pdo;

  try {
    $sql = "
      SELECT
        c.id,
        c.name,
        c.description,
        c.city,
        c.image,
        c.caption,
        c.tags,
        c.created_at,
        GREATEST(COALESCE(c.member_count, 0), COUNT(cm.id)) AS member_count
      FROM public.communities c
      LEFT JOIN public.community_members cm ON cm.community_id = c.id
      GROUP BY c.id, c.name, c.description, c.city, c.image, c.caption, c.tags, c.created_at, c.member_count
      ORDER BY member_count DESC, c.created_at DESC
      LIMIT :limit
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return array_map('formatCommunityRow', $rows);
  } catch (Throwable $e) {
    return [];
  }
}

function fetchDiscoverCommunities(): array {
  global $pdo;

  try {
    $stmt = $pdo->query("
      SELECT
        c.id,
        c.name,
        c.description,
        c.city,
        c.image,
        c.caption,
        c.tags,
        c.created_at,
        COALESCE(c.member_count, 0) AS member_count
      FROM public.communities c
      ORDER BY c.created_at DESC
    ");

    return array_map('formatCommunityRow', $stmt->fetchAll(PDO::FETCH_ASSOC));
  } catch (Throwable $e) {
    return [];
  }
}

function fetchJoinedCommunitiesByUser(string $userId): array {
  global $pdo;

  if (empty($userId)) {
    return [];
  }

  try {
    $stmt = $pdo->prepare("
      SELECT
        c.id,
        c.name,
        c.description,
        c.city,
        c.image,
        c.caption,
        c.tags,
        c.created_at,
        COALESCE(c.member_count, 0) AS member_count,
        cm.joined_at
      FROM public.community_members cm
      JOIN public.communities c ON c.id = cm.community_id
      WHERE cm.user_id = :user_id
      ORDER BY cm.joined_at DESC
    ");

    $stmt->execute([':user_id' => $userId]);
    return array_map('formatCommunityRow', $stmt->fetchAll(PDO::FETCH_ASSOC));
  } catch (Throwable $e) {
    return [];
  }
}

function fetchCommunityPosts(): array {
  global $pdo;

  try {
    $stmt = $pdo->query("
      SELECT
        cp.id,
        cp.community_id,
        cp.caption,
        cp.image,
        cp.like_count,
        cp.comment_count,
        cp.created_at,
        c.name AS community_name,
        p.full_name AS user_name,
        p.avatar_url AS user_avatar
      FROM public.community_posts cp
      LEFT JOIN public.communities c ON c.id = cp.community_id
      LEFT JOIN public.profiles p ON p.id = cp.user_id
      ORDER BY cp.created_at DESC
      LIMIT 5
    ");

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_map(function (array $row): array {
      return [
        'avatar' => $row['user_avatar'] ?: '/assets/ava1.jpg',
        'image' => $row['image'] ?: '/assets/dashboard-komunitas/post1.png',
        'name' => $row['user_name'] ?: 'Anggota Komunitas',
        'badge' => 'Eco Contributor',
        'community' => $row['community_name'] ?: 'Komunitas',
        'time' => $row['created_at'] ? date('d M Y', strtotime($row['created_at'])) : 'Baru',
        'likes' => (string) ($row['like_count'] ?? 0),
        'comments' => (string) ($row['comment_count'] ?? 0),
        'text' => $row['caption'] ?: 'Aksi hijau baru dari komunitas ini.'
      ];
    }, $rows);
  } catch (Throwable $e) {
    return [];
  }
}

function fetchJoinedCommunityIdsByUser(string $userId): array {
  global $pdo;

  if (empty($userId)) {
    return [];
  }

  try {
    $stmt = $pdo->prepare("
      SELECT community_id
      FROM public.community_members
      WHERE user_id = :user_id
    ");
    $stmt->execute([':user_id' => $userId]);

    return array_map(function ($row) {
      return (string) ($row['community_id'] ?? '');
    }, $stmt->fetchAll(PDO::FETCH_ASSOC));
  } catch (Throwable $e) {
    return [];
  }
}

function fetchCommunitySummaryForUser(string $userId): array {
  global $pdo;

  $summary = [
    'joined_count' => 0,
    'total_members' => 0,
  ];

  try {
    if (!empty($userId)) {
      $joinedStmt = $pdo->prepare("
        SELECT COUNT(*)
        FROM public.community_members
        WHERE user_id = :user_id
      ");
      $joinedStmt->execute([':user_id' => $userId]);
      $summary['joined_count'] = (int) $joinedStmt->fetchColumn();
    }

    $membersStmt = $pdo->query("
      SELECT COALESCE(COUNT(*), 0)
      FROM public.community_members
    ");
    $summary['total_members'] = (int) $membersStmt->fetchColumn();
  } catch (Throwable $e) {
    return $summary;
  }

  return $summary;
}

function fetchCommunityWeeklyActivity(): array {
  global $pdo;

  $dayMap = ['Mon' => 'Sen', 'Tue' => 'Sel', 'Wed' => 'Rab', 'Thu' => 'Kam', 'Fri' => 'Jum', 'Sat' => 'Sab', 'Sun' => 'Min'];
  $result = [];

  try {
    $stmt = $pdo->query("
      SELECT TO_CHAR(created_at, 'Dy') AS day_name, COUNT(*) AS total
      FROM public.community_posts
      WHERE created_at >= NOW() - INTERVAL '7 days'
      GROUP BY TO_CHAR(created_at, 'Dy')
    ");

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dataByDay = [];

    foreach ($rows as $row) {
      $label = (string) ($row['day_name'] ?? '');
      $dataByDay[$label] = (int) ($row['total'] ?? 0);
    }

    $orderedDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    foreach ($orderedDays as $day) {
      $result[] = [
        'day' => $dayMap[$day] ?? $day,
        'value' => $dataByDay[$day] ?? 0,
      ];
    }
  } catch (Throwable $e) {
    foreach (['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $day) {
      $result[] = ['day' => $day, 'value' => 0];
    }
  }

  return $result;
}

function fetchTopCommunityContributors(int $limit = 5): array {
  global $pdo;

  try {
    $stmt = $pdo->query("
      SELECT
        p.full_name,
        p.avatar_url,
        p.eco_score,
        COUNT(cm.id) AS joined_communities
      FROM public.profiles p
      LEFT JOIN public.community_members cm ON cm.user_id = p.id
      GROUP BY p.id, p.full_name, p.avatar_url, p.eco_score
      ORDER BY p.eco_score DESC, joined_communities DESC, p.full_name ASC
      LIMIT $limit
    ");

    return array_map(function (array $row): array {
      return [
        'rank' => 0,
        'avatar' => $row['avatar_url'] ?: '/assets/ava1.jpg',
        'name' => $row['full_name'] ?: 'Kontributor',
        'badge' => 'Eco Contributor',
        'score' => (string) ($row['eco_score'] ?? 0),
      ];
    }, $stmt->fetchAll(PDO::FETCH_ASSOC));
  } catch (Throwable $e) {
    return [];
  }
}

function fetchCommunityById(string $communityId): ?array {
  global $pdo;

  if (empty($communityId)) {
    return null;
  }

  try {
    $stmt = $pdo->prepare("
      SELECT
        c.id,
        c.name,
        c.description,
        c.city,
        c.image,
        c.caption,
        c.tags,
        c.created_at,
        COALESCE(c.member_count, 0) AS member_count
      FROM public.communities c
      WHERE c.id = :community_id
    ");

    $stmt->execute([':community_id' => $communityId]);
    $community = $stmt->fetch(PDO::FETCH_ASSOC);

    return $community ?: null;
  } catch (Throwable $e) {
    return null;
  }
}

function createCommunity(string $userId, array $payload): array {
  global $pdo;

  if (empty($userId)) {
    return ['success' => false, 'message' => 'User tidak valid.'];
  }

  $name = trim((string) ($payload['name'] ?? ''));
  if ($name === '') {
    return ['success' => false, 'message' => 'Nama komunitas wajib diisi.'];
  }

  $description = trim((string) ($payload['description'] ?? ''));
  $city = trim((string) ($payload['city'] ?? '')) ?: 'Indonesia';
  $image = trim((string) ($payload['image'] ?? '')) ?: '/assets/dashboard-komunitas/bumi.png';
  $tagsRaw = trim((string) ($payload['tags'] ?? ''));
  $tags = array_values(array_filter(array_map('trim', preg_split('/[,;]/', $tagsRaw) ?: []), fn($tag) => $tag !== ''));

  try {
    $stmt = $pdo->prepare("
      INSERT INTO public.communities (name, description, city, image, member_count, caption, tags)
      VALUES (:name, :description, :city, :image, 1, :caption, :tags)
      RETURNING *
    ");

    $stmt->execute([
      ':name' => $name,
      ':description' => $description !== '' ? $description : null,
      ':city' => $city,
      ':image' => $image,
      ':caption' => $description !== '' ? $description : $name,
      ':tags' => $tags !== [] ? $tags : null,
    ]);

    $community = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$community) {
      return ['success' => false, 'message' => 'Gagal membuat komunitas.'];
    }

    $memberStmt = $pdo->prepare("
      INSERT INTO public.community_members (community_id, user_id)
      VALUES (:community_id, :user_id)
    ");
    $memberStmt->execute([
      ':community_id' => $community['id'],
      ':user_id' => $userId,
    ]);

    return ['success' => true, 'message' => 'Komunitas berhasil dibuat.', 'community' => $community];
  } catch (Throwable $e) {
    return ['success' => false, 'message' => 'Gagal membuat komunitas: ' . $e->getMessage()];
  }
}

function joinCommunity(string $userId, string $communityId): array {
  global $pdo;

  if (empty($userId) || empty($communityId)) {
    return ['success' => false, 'message' => 'Data komunitas tidak valid.'];
  }

  try {
    $check = $pdo->prepare("
      SELECT id FROM public.community_members
      WHERE user_id = :user_id AND community_id = :community_id
      LIMIT 1
    ");
    $check->execute([':user_id' => $userId, ':community_id' => $communityId]);

    if ($check->fetch()) {
      return ['success' => true, 'message' => 'Anda sudah tergabung di komunitas ini.'];
    }

    $insert = $pdo->prepare("
      INSERT INTO public.community_members (community_id, user_id)
      VALUES (:community_id, :user_id)
    ");
    $insert->execute([
      ':community_id' => $communityId,
      ':user_id' => $userId,
    ]);

    $update = $pdo->prepare("
      UPDATE public.communities
      SET member_count = COALESCE(member_count, 0) + 1
      WHERE id = :community_id
    ");
    $update->execute([':community_id' => $communityId]);

    return ['success' => true, 'message' => 'Berhasil bergabung ke komunitas.'];
  } catch (Throwable $e) {
    return ['success' => false, 'message' => 'Gagal bergabung ke komunitas: ' . $e->getMessage()];
  }
}
