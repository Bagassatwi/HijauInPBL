<?php
require_once __DIR__ . '/../../utils/connection.php';

function hijauin_format_number($value, $suffix = '')
{
    $num = (float) $value;
    if (!is_numeric($value) || $num <= 0) {
        return '0' . $suffix;
    }

    $formatted = number_format($num, $num >= 100 ? 0 : 1, ',', '.');
    return $formatted . $suffix;
}

function hijauin_format_kg($value)
{
    $num = (float) $value;
    if (!is_numeric($value) || $num <= 0) {
        return '0 kg';
    }

    if ($num >= 1000) {
        return number_format($num, 0, ',', '.') . ' kg';
    }

    return number_format($num, 1, ',', '.') . ' kg';
}

function hijauin_get_home_data()
{
    $fallback = [
        'stats' => [
            [
                'value' => '125.430 kg',
                'line1' => 'Sampah Berhasil',
                'line2' => 'Dikelola',
                'icon' => '/assets/beranda/daun2.png',
            ],
            [
                'value' => '82.340 kg',
                'line1' => 'CO₂ Berhasil',
                'line2' => 'Dikurangi',
                'icon' => '/assets/beranda/awan.png',
            ],
            [
                'value' => '5.243',
                'line1' => 'Pohon Berhasil',
                'line2' => 'Ditanam',
                'icon' => '/assets/beranda/pohon.png',
            ],
            [
                'value' => '15.000+',
                'line1' => 'Pengguna Aktif',
                'line2' => '',
                'icon' => '/assets/beranda/person.png',
            ],
            [
                'value' => '320+',
                'line1' => 'Komunitas',
                'line2' => 'Bergabung',
                'icon' => '/assets/beranda/bank.png',
            ],
        ],
        'hero_users' => 15000,
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
        $summary = $GLOBALS['pdo']->query("
            SELECT
                COALESCE(SUM(COALESCE(energy_saved, 0) + COALESCE(water_saved, 0)), 0) AS waste_saved,
                COALESCE(SUM(COALESCE(co2_saved, 0)), 0) AS co2_saved,
                COALESCE((SELECT COUNT(*) FROM public.profiles), 0) AS total_users,
                COALESCE((SELECT COUNT(*) FROM public.communities), 0) AS total_communities,
                COALESCE((SELECT COUNT(*) FROM public.user_challenges WHERE status = 'completed'), 0) AS completed_challenges
            FROM public.eco_actions
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
        $stats = [
            [
                'value' => hijauin_format_kg((float) ($summary['waste_saved'] ?? 0)),
                'line1' => 'Sampah Berhasil',
                'line2' => 'Dikelola',
                'icon' => '/assets/beranda/daun2.png',
            ],
            [
                'value' => hijauin_format_kg((float) ($summary['co2_saved'] ?? 0)),
                'line1' => 'CO₂ Berhasil',
                'line2' => 'Dikurangi',
                'icon' => '/assets/beranda/awan.png',
            ],
            [
                'value' => hijauin_format_number((float) ($summary['completed_challenges'] ?? 0)),
                'line1' => 'Pohon Berhasil',
                'line2' => 'Ditanam',
                'icon' => '/assets/beranda/pohon.png',
            ],
            [
                'value' => hijauin_format_number((float) ($summary['total_users'] ?? 0), '+'),
                'line1' => 'Pengguna Aktif',
                'line2' => '',
                'icon' => '/assets/beranda/person.png',
            ],
            [
                'value' => hijauin_format_number((float) ($summary['total_communities'] ?? 0), '+'),
                'line1' => 'Komunitas',
                'line2' => 'Bergabung',
                'icon' => '/assets/beranda/bank.png',
            ],
        ];

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
