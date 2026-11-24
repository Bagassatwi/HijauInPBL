<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';

$searchTerm = trim((string) ($_GET['q'] ?? ''));
$currentPage = max(1, (int) ($_GET['page'] ?? 1));
$pageSize = 8;
$eventMonthNames = [1 => 'JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'];
$eventSearchSql = '';
$eventSearchParams = [];
$eventLoadError = false;
$events = [];
$totalEvents = 0;

if ($searchTerm !== '') {
    $eventSearchSql = "
        AND (
            ce.title ILIKE :search_title
            OR COALESCE(ce.description, '') ILIKE :search_description
            OR COALESCE(ce.location, '') ILIKE :search_location
            OR c.name ILIKE :search_community
            OR COALESCE(c.city, '') ILIKE :search_city
        )
    ";
    $searchPattern = '%' . $searchTerm . '%';
    $eventSearchParams = [
        ':search_title' => $searchPattern,
        ':search_description' => $searchPattern,
        ':search_location' => $searchPattern,
        ':search_community' => $searchPattern,
        ':search_city' => $searchPattern,
    ];
}

try {
    $countStmt = $pdo->prepare("
        SELECT COUNT(*)
        FROM public.community_events ce
        JOIN public.communities c ON c.id = ce.community_id
        WHERE ce.event_date >= NOW()
        $eventSearchSql
    ");
    $countStmt->execute($eventSearchParams);
    $totalEvents = (int) $countStmt->fetchColumn();
    $totalPages = max(1, (int) ceil($totalEvents / $pageSize));
    $currentPage = min($currentPage, $totalPages);

    $eventStmt = $pdo->prepare("
        SELECT ce.id, ce.title, ce.description, ce.location, ce.event_date, ce.image,
               c.name AS community_name, c.city AS community_city,
               (
                   SELECT COUNT(*)
                   FROM public.community_event_participants cep
                   WHERE cep.event_id = ce.id
               ) AS participant_count
        FROM public.community_events ce
        JOIN public.communities c ON c.id = ce.community_id
        WHERE ce.event_date >= NOW()
        $eventSearchSql
        ORDER BY ce.event_date ASC, ce.created_at DESC
        LIMIT :limit OFFSET :offset
    ");
    foreach ($eventSearchParams as $key => $value) {
        $eventStmt->bindValue($key, $value, PDO::PARAM_STR);
    }
    $eventStmt->bindValue(':limit', $pageSize, PDO::PARAM_INT);
    $eventStmt->bindValue(':offset', ($currentPage - 1) * $pageSize, PDO::PARAM_INT);
    $eventStmt->execute();
    $events = $eventStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $error) {
    error_log('Failed to load upcoming community events: ' . $error->getMessage());
    $eventLoadError = true;
}

$totalPages = max(1, (int) ceil($totalEvents / $pageSize));
$paginationUrl = static function (int $page) use ($searchTerm): string {
    $query = ['page' => $page];
    if ($searchTerm !== '') {
        $query['q'] = $searchTerm;
    }
    return '?' . http_build_query($query);
};
?>
<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kegiatan Komunitas Hijau | HijauIn</title>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols Outlined -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS v3 -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-fixed": "#002113",
                        "on-tertiary-container": "#f5fff6",
                        "outline-variant": "#bccac0",
                        "primary-fixed-dim": "#68dba9",
                        "on-secondary": "#ffffff",
                        "on-background": "#131b2e",
                        "surface-dim": "#d2d9f4",
                        "tertiary-fixed": "#6ffbbe",
                        "surface-bright": "#faf8ff",
                        "outline": "#6d7a72",
                        "on-error": "#ffffff",
                        "on-surface": "#131b2e",
                        "on-secondary-container": "#306d58",
                        "on-primary-container": "#f5fff7",
                        "on-primary": "#ffffff",
                        "inverse-surface": "#283044",
                        "surface-container": "#eaedff",
                        "secondary": "#2b6954",
                        "on-tertiary": "#ffffff",
                        "background": "#faf8ff",
                        "primary-fixed": "#85f8c4",
                        "primary": "#006948",
                        "tertiary-container": "#00855b",
                        "error": "#ba1a1a",
                        "on-surface-variant": "#3d4a42",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed": "#002114",
                        "tertiary": "#006947",
                        "surface-container-high": "#e2e7ff",
                        "secondary-fixed-dim": "#95d3ba",
                        "on-error-container": "#93000a",
                        "surface-tint": "#006c4a",
                        "primary-container": "#00855d",
                        "surface-variant": "#dae2fd",
                        "on-secondary-fixed-variant": "#0b513d",
                        "secondary-fixed": "#b0f0d6",
                        "surface": "#faf8ff",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed-variant": "#005236",
                        "surface-container-low": "#f2f3ff",
                        "on-secondary-fixed": "#002117",
                        "inverse-on-surface": "#eef0ff",
                        "surface-container-highest": "#dae2fd",
                        "secondary-container": "#adedd3",
                        "tertiary-fixed-dim": "#4edea3",
                        "on-primary-fixed-variant": "#005137",
                        "inverse-primary": "#68dba9"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "space-xs": "0.25rem",
                        "gutter-mobile": "1rem",
                        "space-lg": "1.5rem",
                        "margin-desktop": "3rem",
                        "margin-mobile": "1rem",
                        "space-xl": "2.5rem",
                        "space-md": "1rem",
                        "gutter": "1.5rem",
                        "space-sm": "0.5rem",
                        "margin": "2rem"
                    },
                    "fontFamily": {
                        "headline-sm": ["Inter"],
                        "headline-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "display-hero": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "display-hero-mobile": ["Inter"],
                        "label-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"]
                    },
                    "fontSize": {
                        "headline-sm": ["1.25rem", { "lineHeight": "1.75rem", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "headline-lg": ["2.25rem", { "lineHeight": "2.75rem", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["1.5rem", { "lineHeight": "2rem", "letterSpacing": "-0.015em", "fontWeight": "600" }],
                        "body-sm": ["0.875rem", { "lineHeight": "1.25rem", "letterSpacing": "0", "fontWeight": "400" }],
                        "label-md": ["0.75rem", { "lineHeight": "1rem", "letterSpacing": "0.02em", "fontWeight": "600" }],
                        "display-hero": ["3.5rem", { "lineHeight": "4rem", "letterSpacing": "-0.03em", "fontWeight": "800" }],
                        "body-lg": ["1.125rem", { "lineHeight": "1.75rem", "letterSpacing": "-0.01em", "fontWeight": "400" }],
                        "label-sm": ["0.6875rem", { "lineHeight": "0.875rem", "letterSpacing": "0.04em", "fontWeight": "700" }],
                        "display-hero-mobile": ["2.25rem", { "lineHeight": "2.75rem", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "label-lg": ["0.875rem", { "lineHeight": "1.25rem", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "body-md": ["1rem", { "lineHeight": "1.5rem", "letterSpacing": "0", "fontWeight": "400" }],
                        "headline-lg-mobile": ["1.75rem", { "lineHeight": "2.25rem", "letterSpacing": "-0.015em", "fontWeight": "700" }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
            line-height: 1;
        }

        .custom-shadow-card {
            box-shadow: 0 1px 3px 0 rgba(15, 23, 42, 0.04), 0 4px 16px -2px rgba(6, 78, 59, 0.05);
        }

        .custom-shadow-hover:hover {
            box-shadow: 0 10px 25px -4px rgba(6, 78, 59, 0.08), 0 4px 10px -2px rgba(15, 23, 42, 0.03);
        }
    </style>
    <meta content="web_standard" name="shell-type" />
</head>

<body
    class=" text-on-surface antialiased font-body-md selection:bg-secondary-container selection:text-on-secondary-fixed-variant">
    <!-- ==================== SHARED COMPONENT: TopNavBar ==================== -->
    <?php
    include '../../includes/header.php';
    include '../../includes/navbar.php';
    ?>
    <div class="flex flex-col w-full">
    <div class="w-full max-w-7xl mx-auto px-4 md:px-6 py-6 md:py-8 flex flex-col gap-5 md:gap-6">
        <!-- Top Navigation / Breadcrumb & Header Group -->
        <div>
            <a class="inline-flex items-center gap-2 text-sm font-semibold text-[#076635] hover:text-[#11773D] transition-colors"
                href="/landpage/komunitas/">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2.5"></path>
                </svg>
                Kembali ke Komunitas
            </a>
        </div>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-4 border-b border-[#E8ECEA]">
            <div class="space-y-1">
                <h1 class="text-[28px] md:text-[32px] font-extrabold tracking-tight text-[#0B0F1F]">
                    Kegiatan Hijau
                </h1>
                <p class="text-sm text-[#667085]">
                    Temukan gerakan peduli lingkungan di sekitarmu.
                </p>
            </div>

            <form method="get" class="w-full md:w-80 relative flex items-center">
                <span
                    class="material-symbols-outlined absolute left-3.5 text-[#667085] text-lg pointer-events-none">search</span>
                <input
                    class="w-full h-10 pl-10 pr-4 rounded-xl bg-[#F4F7F5] text-sm text-[#0B0F1F] placeholder:text-[#667085] focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#076635]/30 transition-all"
                    placeholder="Cari kegiatan..." type="search" name="q" value="<?= htmlspecialchars($searchTerm) ?>" aria-label="Cari kegiatan" />
            </form>
        </div>
            <!-- Filter & Search Bar Card (Synchronized with SCREEN_12 design) -->
            <!-- Active Filter Tags (Minimal & informative) -->
            <!-- 2 Rows x 4 Columns Clean Community Directory Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
                <?php if ($eventLoadError): ?>
                    <div class="sm:col-span-2 lg:col-span-4 rounded-2xl border border-red-200 bg-red-50 p-6 text-sm text-red-700">
                        Data kegiatan gagal dimuat. Silakan coba lagi nanti.
                    </div>
                <?php elseif (empty($events)): ?>
                    <div class="sm:col-span-2 lg:col-span-4 rounded-2xl border border-dashed border-gray-200 bg-white p-8 text-center text-sm text-gray-500">
                        <?= $searchTerm !== '' ? 'Kegiatan tidak ditemukan.' : 'Belum ada kegiatan mendatang.' ?>
                    </div>
                <?php else: ?>
                    <?php foreach ($events as $event): ?>
                        <?php
                        $eventDate = new DateTime($event['event_date']);
                        $eventDate->setTimezone(new DateTimeZone('Asia/Jakarta'));
                        ?>
                        <article class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                            <a href="/landpage/komunitas/event?slug=<?= rawurlencode((string) $event['id']) ?>" class="block">
                                <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="<?= htmlspecialchars($event['image'] ?: '/assets/komunitas/aksi.png') ?>"
                                        alt="<?= htmlspecialchars($event['title']) ?>" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>
                                    <span class="absolute top-3 left-3 max-w-[70%] truncate px-2.5 py-1 rounded-full bg-surface-container-lowest/90 text-primary text-label-sm font-bold shadow-sm">
                                        <?= htmlspecialchars($event['community_name']) ?>
                                    </span>
                                    <span class="absolute bottom-3 left-3 rounded-lg bg-primary px-2.5 py-1 text-sm font-bold text-on-primary">
                                        <?= $eventDate->format('d') ?> <?= $eventMonthNames[(int) $eventDate->format('n')] ?>
                                    </span>
                                </div>
                                <div class="p-4 space-y-2">
                                    <h2 class="text-body-md font-headline-sm font-bold text-on-surface line-clamp-2 group-hover:text-primary transition-colors">
                                        <?= htmlspecialchars($event['title']) ?>
                                    </h2>
                                    <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm">
                                        <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                        <span class="truncate"><?= htmlspecialchars($event['location'] ?: $event['community_city'] ?: 'Lokasi belum ditentukan') ?></span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm">
                                        <span class="material-symbols-outlined text-sm text-secondary">schedule</span>
                                        <span><?= htmlspecialchars($eventDate->format('H.i')) ?> WIB</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 pt-1 text-label-md text-on-surface-variant">
                                        <span class="material-symbols-outlined text-sm text-primary">group</span>
                                        <strong class="text-on-surface"><?= number_format((int) $event['participant_count'], 0, ',', '.') ?></strong> Peserta
                                    </div>
                                </div>
                            </a>
                            <div class="p-4 pt-0">
                                <a href="/landpage/komunitas/event?slug=<?= rawurlencode((string) $event['id']) ?>"
                                    class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                                    <span>Lihat Kegiatan</span>
                                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="hidden">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
                <!-- CARD 1: Green Campus Movement -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Thumbnail Header with Badge -->
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A clean vibrant photo of enthusiastic Indonesian university students planting native trees around a modern eco-friendly campus library under bright tropical sunshine, wearing emerald green vests with lush tropical foliage and clean architectural lines."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4vjO3o5glpVDZMwpIlArxxzTXIzN-jkkJcunMQ2G2Tx6xtSYxU7uUZDi315uautzwHaso-SVGhdKdZuEVw5dEw4VYlgFIcuHa5hK5Nh90SCcmq6Fo5QYPWYGPY-jmOZbrM5D6vWhRNdo1xl63vXtwDoIg-i_Jom-Tmeqr3Un135Cr4QHc4p2i7L2z4qtW1HraT9OHGt74q1ZnJyQty2_NLyL7uFuDdpZwFB2Sa-c" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <!-- Category Pill -->
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">school</span>
                                Edukasi
                            </span>
                        </div>
                        <!-- Body Content -->
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Green Campus UNAIR
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <!-- Location -->
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Surabaya, Jawa Timur</span>
                            </div>
                            <!-- Metrics Line -->
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">1.240</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">32</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Action Button -->
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <!-- CARD 2: Zero Waste ID -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A focused communal composting and bulk refill workshop in a modern minimalist community center in Bandung, showing wooden tables with neat glass jars, organic seeds, and participants learning sustainable living practices, bathed in soft morning light."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD94yez5P9dO8T62kFc3sj8sAR84V5g3Vw6KFerQxrE77L86cWboUgmURdgZfjBZygvst3D5RbG6xOW2imJ03FhRhwA-H_D2zHYbfwSyu8O7xuujnZtb9BUD1jc61QtQybfQbpiyU2SjuH-3iwZBZo9bzk93yk7BOtXc2jRvuomXfDZ7ZBeMZVkSZH6aAdcqttsnaOzoLNW-qTo0-ZOUsHLO3Tr-t6Wd1aCcxvTEkI" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">delete_sweep</span>
                                Daur Ulang
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Zero Waste Nusantara
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Bandung, Jawa Barat</span>
                            </div>
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">6.890</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">158</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <!-- CARD 3: Hidup Hijau Jakarta -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="An energetic urban gardening collective on a lush rooftop garden in central Jakarta with modern skyscrapers in soft focus background, young Indonesian adults tending raised vegetable planter beds with rich dark soil and thriving green mint."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBr5w-sqgg0wkm-l000uPdlgozaHdpTkauDuUi-J7XOnA8JZt9tqjCpLJMvuSSo6a3msUl2y4KjjJe8_b8PNtiICF-drD4bqr-htD01cp5r9fvkw4Kl6m5djsVHejYVqiPtlD-1iaZnpz7Woy1FZlj1Tcz5C_dx09eCCHoEUQMy7EiaDyi0Q_gFE1-zCl0bUv8HiZgjn0cbAU-xvdXg8XzJ6rDiOFlfs2o5oyR35eY" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">nature_people</span>
                                Lingkungan
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Hidup Hijau Jakarta
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Jakarta, DKI Jakarta</span>
                            </div>
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">12.450</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">320</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <!-- CARD 4: Go Green Jogja Cyclists -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A morning bike commute community gathered on an avenue lined with tropical banyan trees in Yogyakarta, smiling cyclists with helmets holding eco-canvases and metal water bottles in warm golden daylight."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHDURWvWFMwWnF4SHZ5UJ1K5EqnpEmACFNh1TwF1UjDVNTAkNB6Ce3lPdSxEfKv4U4yc0z56elwHqNGG2g2FVjptJbuHHyG0Uq9P7KQq9ETMR_KoH6bhl2kaQm61JJfYYjvg6t2Je-5xbvIZS3t7LiWlu_g3xTC5FpN8342A3HllmdHJMCSfujvQpYQbMAEJf06c7RBgRsCIg983GMqcNwTy6c_8VviB8Q4nW7bZU" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">directions_bike</span>
                                Gaya Hidup
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Bike for Earth Jogja
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Yogyakarta, DIY</span>
                            </div>
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">5.120</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">97</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <!-- CARD 5: Tanam Pohon Sentul -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A hillside reforestation drive in Sentul Bogor, volunteers in gardening boots planting native tree saplings across gentle misty slopes, soft green moss, rich volcanic earth, and morning overcast lighting."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCG34jfzKNdOxEUA2Kr3reSXY3tIZtsGNVwAkRot_wutsbFsve5Otgdjn6K9IIa2blBjlKMYMUzIx1VLSXSFo9ZtYh3x0mkpUL9-Foi4C_IxCqNooXnhBPx7jG-AT4bNklsl9ovLu-AQeoDbo44DmRgDTX249tBNnK84MPFsoiLNOGYUHrwSsz92D1DBohZnNZ5uvKNrSBV6wAoznXgsSBoljNpx__mWdhQQCBDBNA" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">forest</span>
                                Konservasi
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Sahabat Pohon Sentul
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Bogor, Jawa Barat</span>
                            </div>
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">4.560</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">102</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <!-- CARD 6: Ocean Warriors Bali -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A clean beach cleanup squad at sunrise on a Balinese coastline, local youth and international eco volunteers gathering ocean plastic in woven burlap sacks along shimmering wet sand and calm turquoise waves."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6ixyoJqs-G4iTTlBTGBII0LNGTBYfJ46fTu_MoYmC_tPFXxTn8p9cKGjzquTLfeu8yFUSLG9OhJ5kdXVL1NzLBDq7f-2k9mfHTti9iamWKKcHoozL_ymMvUdQb2-0p2xohvLsqqtR5Xr4S4X61IAiuBzpjYVoSupUPJv2YqkCyyflC-w4kDgCt8xuUzOKloYKwaFOiDzMksspTTeX4DYw4SfvYDHWgKImal7SfOs" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">tsunami</span>
                                Konservasi
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Ocean Warriors Bali
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Denpasar, Bali</span>
                            </div>
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">3.410</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">88</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <!-- CARD 7: Energy Saving Youth -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="Young technology enthusiasts in an eco-innovation workshop analyzing miniature solar panels and renewable wind turbine models with bright natural window light in an Indonesian smart green incubator."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDK4DI-82JFxwiSQSJMucqJGz3E385rcaiyLtgu7SPwHgUQ1d-TvKmb6vzkef8ihppGI8DHclzeEMBE3EnpdqUX86wDGlHI2trIclHmniI7uvQwBs2gy-ipk4ggIShZgDtgwYUQtQ2_jUjTpdrIqCTx_TNYUvPSTIzH8J4DsWkqvlZHJPW6Cc2J-mTISpbxhPr4vBFGS3CFCbWIkIZKDZOCliiaCYcRB-JF6GleNmE" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">bolt</span>
                                Energi Bersih
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Energi Masa Depan
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Semarang, Jawa Tengah</span>
                            </div>
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">2.250</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">45</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
                <!-- CARD 8: Kebun Kota Komunal -->
                <div
                    class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative w-full h-40 overflow-hidden bg-surface-container">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A sunny neighborhood communal permaculture garden in Surabaya, featuring a neat row of hydroponic lettuces and community members picking fresh leafy vegetables into bamboo baskets."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC615rQCc57J0LS7zXgt56w7Qkj7w1onFLm_jy-XqlXFaHZ6Ymmm3YnNQISI0vLUbA-Rq-viDSknhu0ds5XeQio98V4g1aeFuWf7yzxMj8Z20_rdnwaD8Gxg1e4IJJWhKQVSuSKu-cpFdC4MUHkej40trkGrXappcRRh-ktSckK_u4IUl_ijd4ZRRojhU8TBFL4JIoo5ti_n7nK9NLTZdlrgbhRkT2ZwIr78aNmxxU" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20">
                            </div>
                            <span
                                class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary text-label-sm font-label-sm font-bold flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">potted_plant</span>
                                Gaya Hidup
                            </span>
                        </div>
                        <div class="p-4 space-y-2">
                            <div class="flex items-center gap-1.5">
                                <h2
                                    class="text-body-md font-headline-sm font-bold text-on-surface truncate group-hover:text-primary transition-colors">
                                    Kebun Kota Komunal
                                </h2>
                                <span class="material-symbols-outlined text-primary text-base flex-shrink-0"
                                    style="font-variation-settings: 'FILL' 1;" title="Komunitas Terverifikasi">
                                    verified
                                </span>
                            </div>
                            <div class="flex items-center gap-1.5 text-on-surface-variant text-body-sm font-body-sm">
                                <span class="material-symbols-outlined text-sm text-secondary">location_on</span>
                                <span class="truncate">Surabaya, Jawa Timur</span>
                            </div>
                            <div
                                class="flex items-center gap-3 pt-2 text-label-md font-label-md text-on-surface-variant">
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">group</span>
                                    <strong class="text-on-surface">1.820</strong> Anggota
                                </span>
                                <span class="text-outline-variant">•</span>
                                <span class="flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm text-primary">event_available</span>
                                    <strong class="text-on-surface">64</strong> Aksi
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <button
                            class="w-full py-2 px-3 rounded-xl bg-surface-container text-primary font-label-lg text-label-lg font-semibold hover:bg-primary hover:text-on-primary transition-all duration-200 flex items-center justify-center gap-1.5">
                            <span>Gabung Kegiatan</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>
            </div>
            <?php if ($totalPages > 1): ?>
                <?php
                $pageStart = max(1, $currentPage - 2);
                $pageEnd = min($totalPages, $currentPage + 2);
                ?>
                <nav class="flex items-center justify-center gap-1.5 pt-4" aria-label="Pagination kegiatan">
                    <?php if ($currentPage > 1): ?>
                        <a href="<?= htmlspecialchars($paginationUrl($currentPage - 1)) ?>"
                            class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container flex items-center justify-center transition-colors shadow-sm"
                            aria-label="Halaman sebelumnya">
                            <span class="material-symbols-outlined text-lg">chevron_left</span>
                        </a>
                    <?php endif; ?>
                    <?php for ($pageNumber = $pageStart; $pageNumber <= $pageEnd; $pageNumber++): ?>
                        <a href="<?= htmlspecialchars($paginationUrl($pageNumber)) ?>"
                            class="w-10 h-10 rounded-xl <?= $pageNumber === $currentPage ? 'bg-primary text-on-primary' : 'bg-surface-container-lowest text-on-surface hover:bg-surface-container' ?> font-label-lg text-label-lg font-bold flex items-center justify-center shadow-sm"
                            <?= $pageNumber === $currentPage ? 'aria-current="page"' : '' ?>>
                            <?= $pageNumber ?>
                        </a>
                    <?php endfor; ?>
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="<?= htmlspecialchars($paginationUrl($currentPage + 1)) ?>"
                            class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container flex items-center justify-center transition-colors shadow-sm"
                            aria-label="Halaman berikutnya">
                            <span class="material-symbols-outlined text-lg">chevron_right</span>
                        </a>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
            <!-- Minimalist Pagination Controls -->
            <div class="hidden">
            <div class="flex items-center justify-center gap-1.5 pt-4">
                <button
                    class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container flex items-center justify-center transition-colors shadow-sm disabled:opacity-40"
                    disabled="">
                    <span class="material-symbols-outlined text-lg">chevron_left</span>
                </button>
                <button
                    class="w-10 h-10 rounded-xl bg-primary text-on-primary font-label-lg text-label-lg font-bold flex items-center justify-center shadow-sm">
                    1
                </button>
                <button
                    class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-lg text-label-lg font-medium flex items-center justify-center transition-colors shadow-sm">
                    2
                </button>
                <button
                    class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-lg text-label-lg font-medium flex items-center justify-center transition-colors shadow-sm">
                    3
                </button>
                <span class="px-2 text-outline-variant font-medium">...</span>
                <button
                    class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container font-label-lg text-label-lg font-medium flex items-center justify-center transition-colors shadow-sm">
                    12
                </button>
                <button
                    class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container flex items-center justify-center transition-colors shadow-sm">
                    <span class="material-symbols-outlined text-lg">chevron_right</span>
                </button>
            </div>
            </div>
            <!-- Compact Bottom CTA Banner (Matching SCREEN_12 Dark Forest Green Layout) -->
            <div
                class="relative w-full rounded-2xl bg-primary text-on-primary overflow-hidden p-space-lg md:p-space-xl shadow-md mt-space-md">
                <!-- Decorative Biophilic Light Accent -->
                <div
                    class="absolute -right-16 -top-16 w-64 h-64 bg-primary-fixed/10 rounded-full blur-3xl pointer-events-none">
                </div>
                <div
                    class="absolute -left-12 -bottom-12 w-48 h-48 bg-secondary-fixed/10 rounded-full blur-2xl pointer-events-none">
                </div>
                <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="space-y-1.5 max-w-xl">
                        <div class="flex items-center gap-2">
                            <span
                                class="w-7 h-7 rounded-lg bg-surface-container-lowest/15 flex items-center justify-center text-primary-fixed">
                                <span class="material-symbols-outlined text-base">group_add</span>
                            </span>
                            <h3 class="text-headline-md font-headline-md font-bold text-on-primary tracking-tight">
                                Punya Kegiatan Lingkungan Sendiri?
                            </h3>
                        </div>
                        <p class="text-body-sm font-body-sm text-on-primary-container leading-relaxed">
                            Daftarkan kegiatanmu sekarang secara gratis untuk menjangkau ribuan relawan aktif di
                            seluruh Indonesia, publikasikan aksi nyata, dan pantau dampak EcoScore bersama.
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <a class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-surface-container-lowest text-primary hover:bg-secondary-container hover:text-on-secondary-container font-label-lg text-label-lg font-bold transition-all shadow-sm active:scale-95 whitespace-nowrap"
                            href="#">
                            <span class="material-symbols-outlined text-xl">add_circle</span>
                            <span> Buat Kegiatan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <!-- ==================== SHARED COMPONENT: Footer ==================== -->
    <?php
    include '../../includes/footer.php';
    ?>

</body>

</html>