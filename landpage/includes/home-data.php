<?php
require_once __DIR__ . '/../../utils/connection.php';
require_once __DIR__ . '/../../utils/landing_page.php';

function hijauin_format_number($value, $suffix = '') {
  $num = (float) $value;
  if (!is_numeric($value) || $num <= 0) {
    return '0' . $suffix;
  }

  $formatted = number_format((int) $num, 0, ',', '.');
  return $formatted . $suffix;
}

function hijauin_format_kg($value) {
  $num = (float) $value;
  if (!is_numeric($value) || $num <= 0) {
    return '0 kg';
  }

  $decimals = floor($num) === $num ? 0 : 1;
  return number_format($num, $decimals, ',', '.') . ' kg';
}

function hijauin_get_home_data() {
  $fallback = [
    'stats' => [
      [
        'value' => '—',
        'line1' => 'Aksi Pengelolaan Sampah',
        'line2' => 'Terverifikasi',
        'icon' => '/assets/beranda/daun2.png',
      ],
      [
        'value' => '—',
        'line1' => 'CO₂ Berhasil',
        'line2' => 'Dikurangi',
        'icon' => '/assets/beranda/awan.png',
      ],
      [
        'value' => '—',
        'line1' => 'Aksi Tanam/Pohon',
        'line2' => 'Terverifikasi',
        'icon' => '/assets/beranda/pohon.png',
      ],
      [
        'value' => '—',
        'line1' => 'Pengguna Aktif',
        'line2' => '',
        'icon' => '/assets/beranda/person.png',
      ],
      [
        'value' => '—',
        'line1' => 'Komunitas',
        'line2' => 'Bergabung',
        'icon' => '/assets/beranda/bank.png',
      ],
    ],
    'hero_users' => 0,
    'hero_avatars' => [
      '/assets/ava1.jpg',
      '/assets/ava2.jpg',
      '/assets/ava3.jpg',
      '/assets/ava4.jpg',
    ],
    'activities' => [
      [
        'img' => '/assets/beranda/bersihpantai.png',
        'badge' => 'Bersih Bersama',
        'title' => 'Bersih Pantai Anyer',
        'peserta' => '129 peserta',
        'date' => '12 Mei 2024',
      ],
      [
        'img' => '/assets/beranda/tanampohon.png',
        'badge' => 'Tanam Hijau',
        'title' => 'Tanam Pohon Mangrove',
        'peserta' => '85 peserta',
        'date' => '10 Mei 2024',
      ],
      [
        'img' => '/assets/beranda/workshop.png',
        'badge' => 'Daur Ulang',
        'title' => 'Workshop Daur Ulang',
        'peserta' => '96 peserta',
        'date' => '08 Mei 2024',
      ],
    ],
  ];

  if (!isset($GLOBALS['pdo'])) {
    return $fallback;
  }

  try {
    $storedStats = fetchLandingPageContent('home', 'stats', $fallback['stats']);
    $summary = $GLOBALS['pdo']->query("
            SELECT
                COALESCE((
                    SELECT SUM(COALESCE(ea.co2_saved, 0))
                    FROM public.eco_actions ea
                    WHERE ea.status = 'verified'
                ), 0) AS co2_saved,
                (
                    SELECT COUNT(*)
                    FROM public.eco_actions ea
                    LEFT JOIN public.categories cat ON cat.id = ea.category_id
                    WHERE ea.status = 'verified'
                      AND (
                        LOWER(COALESCE(ea.title, '')) LIKE '%sampah%'
                        OR LOWER(COALESCE(ea.title, '')) LIKE '%waste%'
                        OR LOWER(COALESCE(ea.title, '')) LIKE '%daur ulang%'
                        OR LOWER(COALESCE(cat.name, '')) LIKE '%sampah%'
                        OR LOWER(COALESCE(cat.name, '')) LIKE '%waste%'
                        OR LOWER(COALESCE(cat.name, '')) LIKE '%daur ulang%'
                      )
                ) AS waste_actions,
                (
                    SELECT COUNT(*)
                    FROM public.eco_actions ea
                    LEFT JOIN public.categories cat ON cat.id = ea.category_id
                    WHERE ea.status = 'verified'
                      AND (
                        LOWER(COALESCE(ea.title, '')) LIKE '%tanam%'
                        OR LOWER(COALESCE(ea.title, '')) LIKE '%pohon%'
                        OR LOWER(COALESCE(ea.title, '')) LIKE '%plant%'
                        OR LOWER(COALESCE(ea.title, '')) LIKE '%tree%'
                        OR LOWER(COALESCE(cat.name, '')) LIKE '%tanam%'
                        OR LOWER(COALESCE(cat.name, '')) LIKE '%pohon%'
                        OR LOWER(COALESCE(cat.name, '')) LIKE '%plant%'
                        OR LOWER(COALESCE(cat.name, '')) LIKE '%tree%'
                      )
                ) AS planting_actions,
                COALESCE((SELECT COUNT(*) FROM public.profiles), 0) AS total_users,
                COALESCE((SELECT COUNT(*) FROM public.communities), 0) AS total_communities
        ")->fetch(PDO::FETCH_ASSOC);

    $profileRows = $GLOBALS['pdo']->query(
      "SELECT avatar_url FROM public.profiles WHERE avatar_url IS NOT NULL ORDER BY created_at DESC LIMIT 4"
    )->fetchAll(PDO::FETCH_ASSOC);

    $communityPosts = $GLOBALS['pdo']->query(
      "SELECT cp.caption, cp.image AS activity_image, cp.like_count, cp.created_at, c.name AS community_name, c.image AS community_image
             FROM public.community_posts cp
             LEFT JOIN public.communities c ON c.id = cp.community_id
             ORDER BY cp.created_at DESC
             LIMIT 3"
    )->fetchAll(PDO::FETCH_ASSOC);

    $avatars = [];
    foreach ($profileRows as $row) {
      if (!empty($row['avatar_url'])) {
        $avatars[] = $row['avatar_url'];
      }
    }

    if (empty($avatars)) {
      $avatars = $fallback['hero_avatars'];
    }

    $activities = [];
    foreach ($communityPosts as $post) {
      $caption = trim((string) ($post['caption'] ?? ''));
      $image = !empty($post['activity_image']) ? $post['activity_image'] : (!empty($post['community_image']) ? $post['community_image'] : '/assets/beranda/bersihpantai.png');
      $participants = isset($post['like_count']) ? (int) $post['like_count'] : 0;
      $activities[] = [
        'img' => $image,
        'badge' => !empty($post['community_name']) ? $post['community_name'] : 'Komunitas Hijau',
        'title' => $caption !== '' ? $caption : 'Aksi Hijau Baru',
        'peserta' => $participants . ' peserta',
        'date' => !empty($post['created_at']) ? date('d M Y', strtotime($post['created_at'])) : 'Baru-baru ini',
      ];
    }

    if (empty($activities)) {
      $activities = $fallback['activities'];
    }

    $summary = $summary ?: [];
    $stats = array_replace_recursive($fallback['stats'], $storedStats);
    $stats[0]['value'] = number_format((int) ($summary['waste_actions'] ?? 0), 0, ',', '.');
    $stats[0]['line1'] = 'Aksi Pengelolaan Sampah';
    $stats[0]['line2'] = 'Terverifikasi';
    $stats[1]['value'] = hijauin_format_kg((float) ($summary['co2_saved'] ?? 0));
    $stats[2]['value'] = number_format((int) ($summary['planting_actions'] ?? 0), 0, ',', '.');
    $stats[2]['line1'] = 'Aksi Tanam/Pohon';
    $stats[2]['line2'] = 'Terverifikasi';
    $stats[3]['value'] = hijauin_format_number((float) ($summary['total_users'] ?? 0), '+');
    $stats[4]['value'] = hijauin_format_number((float) ($summary['total_communities'] ?? 0), '+');

    return [
      'stats' => $stats,
      'hero_users' => (int) ($summary['total_users'] ?? 0),
      'hero_avatars' => $avatars,
      'activities' => $activities,
    ];
  } catch (Throwable $e) {
    return $fallback;
  }
}
