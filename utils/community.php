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
    'loc' => $community['city'] ?? 'Indonesia',
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
        c.owner_id,
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

  ensureCommunityFeatureSchema();
  try {
    $stmt = $pdo->prepare("
      INSERT INTO public.communities (name, description, city, image, member_count, caption, tags, owner_id)
      VALUES (:name, :description, :city, :image, 1, :caption, :tags, :owner_id)
      RETURNING *
    ");

    $stmt->execute([
      ':name' => $name,
      ':description' => $description !== '' ? $description : null,
      ':city' => $city,
      ':image' => $image,
      ':caption' => $description !== '' ? $description : $name,
      ':tags' => $tags !== [] ? $tags : null,
      ':owner_id' => $userId,
    ]);

    $community = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$community) {
      return ['success' => false, 'message' => 'Gagal membuat komunitas.'];
    }

    $memberStmt = $pdo->prepare("
      INSERT INTO public.community_members (community_id, user_id, role)
      VALUES (:community_id, :user_id, 'owner')
    ");
    $memberStmt->execute([
      ':community_id' => $community['id'],
      ':user_id' => $userId,
    ]);
    $pdo->prepare("UPDATE public.community_members SET role='owner' WHERE community_id=:community_id AND user_id=:user_id")
      ->execute([':community_id'=>$community['id'], ':user_id'=>$userId]);

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

function ensureCommunityFeatureSchema(): void {
  global $pdo;

  try {
    $pdo->exec("ALTER TABLE public.communities ADD COLUMN IF NOT EXISTS owner_id uuid");
    $pdo->exec("ALTER TABLE public.community_members ADD COLUMN IF NOT EXISTS role text DEFAULT 'member'");
    $pdo->exec("
      CREATE TABLE IF NOT EXISTS public.community_events (
        id uuid NOT NULL DEFAULT gen_random_uuid(),
        community_id uuid NOT NULL REFERENCES public.communities(id) ON DELETE CASCADE,
        title text NOT NULL,
        description text,
        location text,
        event_date timestamp with time zone,
        image text,
        created_by uuid,
        created_at timestamp with time zone DEFAULT now(),
        PRIMARY KEY (id)
      )
    ");
    $pdo->exec("
      CREATE TABLE IF NOT EXISTS public.community_event_participants (
        id uuid NOT NULL DEFAULT gen_random_uuid(),
        event_id uuid NOT NULL REFERENCES public.community_events(id) ON DELETE CASCADE,
        user_id uuid NOT NULL REFERENCES public.profiles(id) ON DELETE CASCADE,
        joined_at timestamp with time zone DEFAULT now(),
        PRIMARY KEY (id),
        UNIQUE (event_id, user_id)
      )
    ");
  } catch (Throwable $e) {
  }
}

function isCommunityOwner(string $userId, array $community): bool {
  return !empty($userId) && (string) ($community['owner_id'] ?? '') === (string) $userId;
}

function isCommunityMember(string $userId, string $communityId): bool {
  global $pdo;
  if (empty($userId) || empty($communityId)) return false;
  try {
    $stmt = $pdo->prepare("SELECT id FROM public.community_members WHERE user_id = :user_id AND community_id = :community_id LIMIT 1");
    $stmt->execute([':user_id' => $userId, ':community_id' => $communityId]);
    return (bool) $stmt->fetchColumn();
  } catch (Throwable $e) {
    return false;
  }
}

function updateCommunity(string $userId, string $communityId, array $payload): array {
  global $pdo;
  $community = fetchCommunityById($communityId);
  if (!$community) return ['success' => false, 'message' => 'Komunitas tidak ditemukan.'];
  if (!isCommunityOwner($userId, $community)) return ['success' => false, 'message' => 'Hanya pemilik komunitas yang dapat mengubah pengaturan.'];

  $name = trim((string) ($payload['name'] ?? ''));
  if ($name === '') return ['success' => false, 'message' => 'Nama komunitas wajib diisi.'];
  $description = trim((string) ($payload['description'] ?? ''));
  $city = trim((string) ($payload['city'] ?? '')) ?: 'Indonesia';
  $image = trim((string) ($payload['image'] ?? '')) ?: '/assets/dashboard-komunitas/bumi.png';
  $tags = array_values(array_filter(array_map('trim', preg_split('/[,;]/', (string) ($payload['tags'] ?? '')) ?: [])));

  try {
    $stmt = $pdo->prepare("UPDATE public.communities SET name=:name, description=:description, city=:city, image=:image, caption=:caption, tags=:tags WHERE id=:id");
    $stmt->execute([':name' => $name, ':description' => $description ?: null, ':city' => $city, ':image' => $image, ':caption' => $description ?: $name, ':tags' => $tags !== [] ? $tags : null, ':id' => $communityId]);
    return ['success' => true, 'message' => 'Pengaturan komunitas berhasil disimpan.'];
  } catch (Throwable $e) {
    return ['success' => false, 'message' => 'Gagal menyimpan pengaturan: ' . $e->getMessage()];
  }
}

function createCommunityPost(string $userId, string $communityId, array $payload): array {
  global $pdo;
  if (!isCommunityMember($userId, $communityId)) return ['success' => false, 'message' => 'Gabung ke komunitas sebelum membuat postingan.'];
  $caption = trim((string) ($payload['caption'] ?? ''));
  $image = trim((string) ($payload['image'] ?? ''));
  if ($caption === '' && $image === '') return ['success' => false, 'message' => 'Tuliskan postingan atau lampirkan gambar.'];
  try {
    ensureCommunityFeatureSchema();
    $stmt = $pdo->prepare("INSERT INTO public.community_posts (community_id, user_id, caption, image) VALUES (:community_id, :user_id, :caption, :image)");
    $stmt->execute([':community_id' => $communityId, ':user_id' => $userId, ':caption' => $caption ?: null, ':image' => $image ?: null]);
    return ['success' => true, 'message' => 'Postingan berhasil dipublikasikan.'];
  } catch (Throwable $e) {
    return ['success' => false, 'message' => 'Gagal memposting: ' . $e->getMessage()];
  }
}

function fetchCommunityMembersDetailed(string $communityId): array {
  global $pdo;
  try {
    $stmt = $pdo->prepare("SELECT p.id, p.full_name, p.avatar_url, p.eco_score, cm.joined_at, COALESCE(cm.role, 'member') AS role FROM public.community_members cm JOIN public.profiles p ON p.id=cm.user_id WHERE cm.community_id=:community_id ORDER BY CASE WHEN cm.role='owner' THEN 0 ELSE 1 END, p.eco_score DESC NULLS LAST, cm.joined_at ASC");
    $stmt->execute([':community_id' => $communityId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $e) {
    return [];
  }
}

function fetchCommunityEvents(string $communityId): array {
  global $pdo;
  ensureCommunityFeatureSchema();
  try {
    $stmt = $pdo->prepare("SELECT e.*, COUNT(ep.id) AS participant_count FROM public.community_events e LEFT JOIN public.community_event_participants ep ON ep.event_id=e.id WHERE e.community_id=:community_id GROUP BY e.id ORDER BY e.event_date ASC NULLS LAST, e.created_at DESC");
    $stmt->execute([':community_id' => $communityId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (Throwable $e) {
    return [];
  }
}

function createCommunityEvent(string $userId, string $communityId, array $payload): array {
  global $pdo;
  $community = fetchCommunityById($communityId);
  if (!$community || !isCommunityOwner($userId, $community)) return ['success' => false, 'message' => 'Hanya pemilik yang dapat membuat event.'];
  $title = trim((string) ($payload['title'] ?? ''));
  if ($title === '') return ['success' => false, 'message' => 'Nama event wajib diisi.'];
  try {
    ensureCommunityFeatureSchema();
    $eventDate = trim((string) ($payload['event_date'] ?? '')) ?: null;
    $stmt = $pdo->prepare("INSERT INTO public.community_events (community_id,title,description,location,event_date,image,created_by) VALUES (:community_id,:title,:description,:location,:event_date,:image,:created_by)");
    $stmt->execute([':community_id' => $communityId, ':title' => $title, ':description' => trim((string)($payload['description'] ?? '')) ?: null, ':location' => trim((string)($payload['location'] ?? '')) ?: null, ':event_date' => $eventDate, ':image' => trim((string)($payload['image'] ?? '')) ?: null, ':created_by' => $userId]);
    return ['success' => true, 'message' => 'Event berhasil dibuat.'];
  } catch (Throwable $e) {
    return ['success' => false, 'message' => 'Gagal membuat event: ' . $e->getMessage()];
  }
}

function joinCommunityEvent(string $userId, string $eventId): array {
  global $pdo;
  if (empty($userId) || empty($eventId)) return ['success' => false, 'message' => 'Data event tidak valid.'];
  try {
    ensureCommunityFeatureSchema();
    $stmt = $pdo->prepare("SELECT community_id FROM public.community_events WHERE id=:event_id");
    $stmt->execute([':event_id' => $eventId]);
    $communityId = $stmt->fetchColumn();
    if (!$communityId || !isCommunityMember($userId, (string)$communityId)) return ['success' => false, 'message' => 'Gabung ke komunitas sebelum mengikuti event.'];
    $insert = $pdo->prepare("INSERT INTO public.community_event_participants (event_id,user_id) VALUES (:event_id,:user_id) ON CONFLICT (event_id,user_id) DO NOTHING");
    $insert->execute([':event_id' => $eventId, ':user_id' => $userId]);
    return ['success' => true, 'message' => 'Anda terdaftar sebagai peserta event.'];
  } catch (Throwable $e) {
    return ['success' => false, 'message' => 'Gagal mendaftar event: ' . $e->getMessage()];
  }
}

function removeCommunityMember(string $ownerId, string $communityId, string $memberId): array {
  global $pdo;
  $community = fetchCommunityById($communityId);
  if (!$community || !isCommunityOwner($ownerId, $community)) return ['success' => false, 'message' => 'Hanya pemilik yang dapat mengelola anggota.'];
  if ($memberId === $ownerId) return ['success' => false, 'message' => 'Pemilik tidak dapat menghapus dirinya sendiri.'];
  try {
    $stmt = $pdo->prepare("DELETE FROM public.community_members WHERE community_id=:community_id AND user_id=:member_id");
    $stmt->execute([':community_id' => $communityId, ':member_id' => $memberId]);
    $pdo->prepare("UPDATE public.communities SET member_count=GREATEST(COALESCE(member_count,0)-1,0) WHERE id=:community_id")->execute([':community_id' => $communityId]);
    return ['success' => true, 'message' => 'Anggota berhasil dihapus dari komunitas.'];
  } catch (Throwable $e) {
    return ['success' => false, 'message' => 'Gagal menghapus anggota: ' . $e->getMessage()];
  }
}
