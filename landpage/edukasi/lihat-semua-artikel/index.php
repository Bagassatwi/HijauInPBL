<?php
require_once dirname(__DIR__, 3) . '/utils/articles.php';

$search = trim((string) ($_GET['search'] ?? ''));
$articles = fetchArticles();
$filteredArticles = array_values(array_filter($articles, static function (array $article) use ($search): bool {
    if ($search === '') {
        return true;
    }

    $searchableText = implode(' ', [
        (string) ($article['title'] ?? ''),
        (string) ($article['summary'] ?? ''),
        (string) ($article['category_name'] ?? ''),
    ]);

    return stripos($searchableText, $search) !== false;
}));
$pageSize = 8;
$totalPages = max(1, (int) ceil(count($filteredArticles) / $pageSize));
$currentPage = min($totalPages, max(1, (int) ($_GET['page'] ?? 1)));
$pageArticles = array_slice($filteredArticles, ($currentPage - 1) * $pageSize, $pageSize);

$pageUrl = static function (int $page) use ($search): string {
    $query = http_build_query(['search' => $search, 'page' => $page]);
    return '?' . $query;
};
?>
<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Edukasi & Artikel Hijau | HijauIn</title>
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
            <div
                class="flex flex-col md:flex-row md:items-end justify-between gap-6 pt-4 pb-2 border-b border-outline-variant/30">
                <div class="space-y-1">
                    <h1 class="text-headline-lg font-headline-lg text-on-surface font-extrabold tracking-tight">
                        Edukasi & Artikel Hijau</h1>
                    <p class="text-body-sm font-body-sm text-on-surface-variant">Temukan artikel dan edukasi tentang
                        keberlanjutan
                        di sekitarmu.</p>
                </div>
                <div class="w-full md:w-80 relative flex items-center">
                    <span
                        class="material-symbols-outlined absolute left-3.5 text-outline text-lg pointer-events-none">search</span>
                    <form method="get" class="w-full">
                    <input
                        class="w-full h-10 pl-10 pr-4 rounded-xl bg-surface-container-low text-body-sm font-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_rgba(0,105,72,0.3)] transition-all"
                        name="search" value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>"
                        placeholder="Cari artikel..." type="search" />
                    </form>
                </div>
            </div>
            <!-- Filter & Search Bar Card (Synchronized with SCREEN_12 design) -->
            <!-- Active Filter Tags (Minimal & informative) -->
            <!-- 4. Article Catalog Grid (4 cols x 2 rows = 8 cards) -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
                <?php if ($pageArticles === []): ?>
                    <p class="col-span-full rounded-2xl bg-surface-container-low p-8 text-center text-on-surface-variant">
                        <?= $search !== '' ? 'Tidak ada artikel yang cocok dengan pencarian Anda.' : 'Belum ada artikel yang tersedia.' ?>
                    </p>
                <?php else: ?>
                    <?php foreach ($pageArticles as $article): ?>
                        <?php
                        $thumbnail = trim((string) ($article['thumbnail'] ?? ''));
                        $createdAt = strtotime((string) ($article['created_at'] ?? ''));
                        ?>
                        <article class="flex flex-col bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group">
                            <a class="flex flex-col flex-1 focus-visible:outline focus-visible:outline-2 focus-visible:outline-primary"
                                href="/landpage/edukasi/detail?detail=<?= rawurlencode((string) $article['slug']) ?>"
                                aria-label="Baca <?= htmlspecialchars((string) $article['title'], ENT_QUOTES, 'UTF-8') ?>">
                            <div class="relative w-full h-48 overflow-hidden bg-surface-container">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    src="<?= htmlspecialchars($thumbnail !== '' ? $thumbnail : '/assets/daun.png', ENT_QUOTES, 'UTF-8') ?>"
                                    alt="<?= htmlspecialchars((string) $article['title'], ENT_QUOTES, 'UTF-8') ?>" />
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-fixed-variant text-label-sm font-label-sm font-bold shadow-sm">
                                    <?= htmlspecialchars((string) ($article['category_name'] ?? 'Edukasi'), ENT_QUOTES, 'UTF-8') ?>
                                </span>
                            </div>
                            <div class="p-space-md flex flex-col flex-1 justify-between gap-space-sm">
                                <div class="space-y-2">
                                    <div class="flex items-center gap-1.5 text-label-sm font-label-sm text-outline">
                                        <span class="material-symbols-outlined text-[14px]">calendar_today</span>
                                        <span><?= $createdAt !== false ? htmlspecialchars(date('d M Y', $createdAt), ENT_QUOTES, 'UTF-8') : 'Tanggal tidak tersedia' ?></span>
                                        <span>&bull;</span>
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        <span><?= max(1, (int) ($article['read_time'] ?? 1)) ?> mnt baca</span>
                                    </div>
                                    <h2 class="text-headline-sm font-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                        <?= htmlspecialchars((string) $article['title'], ENT_QUOTES, 'UTF-8') ?>
                                    </h2>
                                    <p class="text-body-sm font-body-sm text-on-surface-variant line-clamp-2 leading-relaxed">
                                        <?= htmlspecialchars((string) $article['summary'], ENT_QUOTES, 'UTF-8') ?>
                                    </p>
                                </div>
                                <div class="pt-3 flex items-center justify-between mt-auto">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-secondary-container flex items-center justify-center text-primary text-[12px] font-bold">H</div>
                                        <span class="text-label-sm font-label-sm text-on-surface-variant"><?= htmlspecialchars((string) ($article['author'] ?? 'Tim HijauIn'), ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                    <span class="text-primary text-label-sm font-label-sm font-semibold flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                                        <span>Baca</span>
                                        <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
            <?php if ($totalPages > 1): ?>
                <nav aria-label="Pagination" class="flex flex-wrap items-center justify-center gap-2 py-4">
                    <?php if ($currentPage > 1): ?>
                        <a class="w-10 h-10 rounded-xl bg-surface-container hover:bg-secondary-container/50 text-on-surface flex items-center justify-center transition-colors"
                            href="<?= htmlspecialchars($pageUrl($currentPage - 1), ENT_QUOTES, 'UTF-8') ?>" aria-label="Halaman Sebelumnya">
                            <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                        </a>
                    <?php endif; ?>
                    <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                        <a class="w-10 h-10 rounded-xl <?= $page === $currentPage ? 'bg-primary text-on-primary shadow-sm' : 'bg-surface-container hover:bg-secondary-container/50 text-on-surface' ?> font-semibold text-label-md font-label-md flex items-center justify-center transition-colors"
                            href="<?= htmlspecialchars($pageUrl($page), ENT_QUOTES, 'UTF-8') ?>" <?= $page === $currentPage ? 'aria-current="page"' : '' ?>>
                            <?= $page ?>
                        </a>
                    <?php endfor; ?>
                    <?php if ($currentPage < $totalPages): ?>
                        <a class="w-10 h-10 rounded-xl bg-surface-container hover:bg-secondary-container/50 text-on-surface flex items-center justify-center transition-colors"
                            href="<?= htmlspecialchars($pageUrl($currentPage + 1), ENT_QUOTES, 'UTF-8') ?>" aria-label="Halaman Berikutnya">
                            <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                        </a>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>
            <!-- 6. Bottom Collaboration Call-to-Action Banner -->
            <section
                class="relative overflow-hidden rounded-3xl bg-primary text-on-primary p-space-lg md:p-space-xl shadow-md">
                <!-- Decorative Biophilic Shapes Inside Container -->
                <div
                    class="absolute -right-12 -bottom-16 w-64 h-64 rounded-full bg-primary-container/40 pointer-events-none blur-2xl">
                </div>
                <div
                    class="absolute right-24 -top-12 w-48 h-48 rounded-full bg-secondary-fixed/10 pointer-events-none blur-xl">
                </div>
                <div
                    class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-space-lg">
                    <div class="space-y-3 max-w-2xl">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-container text-on-primary-container text-label-sm font-label-sm">
                            <span class="material-symbols-outlined text-[16px] text-primary-fixed"
                                style="font-variation-settings: 'FILL' 1;">handshake</span>
                            <span>Kolaborasi Warga &amp; Komunitas</span>
                        </div>
                        <h2
                            class="text-headline-md md:text-headline-lg font-headline-md md:font-headline-lg font-bold text-on-primary tracking-tight">
                            Punya Tulisan atau Pengalaman Aksi Lingkungan?
                        </h2>
                        <p class="text-body-md font-body-md text-on-primary-container/90 leading-relaxed">
                            Bagikan tulisan, riset komunitas, atau cerita inspiratif gerakan bumimu kepada puluhan ribu
                            pembaca HijauIn di seluruh Indonesia.
                        </p>
                    </div>
                    <div class="shrink-0 flex items-center gap-3">
                        <button
                            class="h-12 px-6 rounded-xl bg-surface-container-lowest hover:bg-secondary-container text-primary font-bold text-label-lg font-label-lg flex items-center gap-2 shadow-sm transition-all active:scale-95">
                            <span class="material-symbols-outlined text-[20px]">add_circle</span>
                            <span> Kirim Artikel</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </main>
    <!-- ==================== SHARED COMPONENT: Footer ==================== -->
    <?php
    include '../../includes/footer.php';
    ?>

</body>

</html>