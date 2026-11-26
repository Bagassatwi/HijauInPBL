<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Event &amp; Aksi Komunitas Hijau | HijauIn</title>
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
    class="bg-surface text-on-surface antialiased font-body-md selection:bg-secondary-container selection:text-on-secondary-fixed-variant">
    <!-- ==================== SHARED COMPONENT: TopNavBar ==================== -->
    <header
        class="docked full-width top-0 sticky z-50 bg-surface/90 dark:bg-inverse-surface/90 backdrop-blur-md border-b border-outline-variant/30 dark:border-outline/20 shadow-sm dark:shadow-none">
        <div
            class="max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop flex items-center justify-between h-20 w-full">
            <!-- Brand Logo -->
            <a class="text-headline-sm font-headline-sm font-bold text-primary dark:text-inverse-primary flex items-center gap-space-xs transition-all duration-200 active:scale-95"
                href="#">
                <span
                    class="w-10 h-10 rounded-xl bg-primary text-on-primary flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-2xl" data-icon="eco"
                        style="font-variation-settings: 'FILL' 1;">eco</span>
                </span>
                <div class="flex flex-col">
                    <span class="leading-none text-2xl font-black tracking-tight text-primary">HijauIn</span>
                    <span class="text-[10px] text-secondary font-medium tracking-wide">Satu Langkah Hijau Setiap
                        Hari</span>
                </div>
            </a>
            <!-- Desktop Navigation Links (Komunitas is active) -->
            <nav class="hidden md:flex items-center space-x-8">
                <a class="text-on-surface dark:text-inverse-on-surface hover:text-primary dark:hover:text-inverse-primary font-medium transition-colors text-label-lg font-label-lg"
                    href="#">Beranda</a>
                <a class="text-on-surface dark:text-inverse-on-surface hover:text-primary dark:hover:text-inverse-primary font-medium transition-colors text-label-lg font-label-lg"
                    href="#">Fitur</a>
                <a class="text-on-surface dark:text-inverse-on-surface hover:text-primary dark:hover:text-inverse-primary font-medium transition-colors text-label-lg font-label-lg"
                    href="#">Cara Kerja</a>
                <a class="text-on-surface dark:text-inverse-on-surface hover:text-primary dark:hover:text-inverse-primary font-medium transition-colors text-label-lg font-label-lg"
                    href="#">Edukasi</a>
                <a class="text-primary dark:text-inverse-primary font-bold border-b-2 border-primary dark:border-inverse-primary pb-1 text-label-lg font-label-lg"
                    href="#">Komunitas</a>
                <a class="text-on-surface dark:text-inverse-on-surface hover:text-primary dark:hover:text-inverse-primary font-medium transition-colors text-label-lg font-label-lg"
                    href="#">Tentang Kami</a>
            </nav>
            <!-- Action Group -->
            <div class="flex items-center gap-3">
                <button
                    class="p-2 text-on-surface hover:text-primary transition-colors rounded-full hover:bg-surface-container"
                    title="Pusat Bantuan">
                    <span class="material-symbols-outlined" data-icon="help">help</span>
                </button>
                <a class="hidden sm:inline-flex text-label-lg font-label-lg text-primary px-4 py-2 rounded-xl hover:bg-secondary-container/40 transition-all font-semibold"
                    href="#">
                    Masuk
                </a>
                <a class="inline-flex items-center justify-center text-label-lg font-label-lg bg-primary hover:bg-primary-container text-on-primary font-semibold px-5 py-2.5 rounded-xl transition-all shadow-sm active:scale-95"
                    href="#">
                    Daftar Gratis
                </a>
            </div>
        </div>
    </header>
    <main>
        <div class="flex flex-col w-full">
            <div
                class="w-full max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop py-space-lg md:py-space-xl flex flex-col gap-space-lg md:gap-space-xl">
                <!-- Top Navigation / Breadcrumb & Header Group -->
                <div
                    class="flex flex-col md:flex-row md:items-end justify-between gap-6 pt-4 pb-2 border-b border-outline-variant/30">
                    <div class="space-y-1">
                        <h1 class="text-headline-lg font-headline-lg text-on-surface font-extrabold tracking-tight">
                            Komunitas Hijau</h1>
                        <p class="text-body-sm font-body-sm text-on-surface-variant">Temukan gerakan peduli lingkungan
                            di sekitarmu.</p>
                    </div>
                    <div class="w-full md:w-80 relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3.5 text-outline text-lg pointer-events-none">search</span>
                        <input
                            class="w-full h-10 pl-10 pr-4 rounded-xl bg-surface-container-low text-body-sm font-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:shadow-[0_0_0_2px_rgba(0,105,72,0.3)] transition-all"
                            placeholder="Cari komunitas..." type="text" />
                    </div>
                </div>
                <!-- Filter & Search Bar Card (Synchronized with SCREEN_12 design) -->
                <!-- Active Filter Tags (Minimal & informative) -->
                <!-- 2 Rows x 4 Columns Clean Community Directory Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md"><!-- CARD 1 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">school</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Green Campus UNAIR</h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Surabaya, Jawa Timur</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">1.240 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                    <!-- CARD 2 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">delete_sweep</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Zero Waste Nusantara
                                </h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Bandung, Jawa Barat</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">6.890 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                    <!-- CARD 3 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">nature_people</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Hidup Hijau Jakarta</h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Jakarta, DKI Jakarta</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">12.450 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                    <!-- CARD 4 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">directions_bike</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Bike for Earth Jogja
                                </h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Yogyakarta, DIY</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">5.120 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                    <!-- CARD 5 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">forest</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Sahabat Pohon Sentul
                                </h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Bogor, Jawa Barat</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">4.560 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                    <!-- CARD 6 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">tsunami</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Ocean Warriors Bali</h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Denpasar, Bali</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">3.410 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                    <!-- CARD 7 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">bolt</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Energi Masa Depan</h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Semarang, Jawa Tengah</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">2.250 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                    <!-- CARD 8 -->
                    <div
                        class="bg-surface-container-lowest rounded-xl p-4 border border-outline-variant/30 hover:border-primary transition-all duration-200 flex flex-col justify-between gap-4">
                        <div class="flex items-start gap-3.5">
                            <div
                                class="w-11 h-11 rounded-lg bg-surface-container flex items-center justify-center flex-shrink-0 text-primary">
                                <span class="material-symbols-outlined text-2xl">potted_plant</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-body-md font-semibold text-on-surface truncate">Kebun Kota Komunal</h2>
                                <p class="text-body-sm text-on-surface-variant truncate">Surabaya, Jawa Timur</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between pt-2 border-t border-outline-variant/20 text-body-sm">
                            <span class="text-on-surface-variant">1.820 anggota</span>
                            <button
                                class="px-3 py-1 rounded-lg bg-surface-container text-primary font-medium hover:bg-primary hover:text-on-primary transition-colors text-label-sm font-label-sm">Gabung</button>
                        </div>
                    </div>
                </div>
                <!-- Minimalist Pagination Controls -->
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
                <!-- Compact Bottom CTA Banner (Matching SCREEN_12 Dark Forest Green Layout) -->
                <div
                    class="w-full rounded-xl bg-surface-container p-6 flex flex-col sm:flex-row items-center justify-between gap-4 mt-space-md">
                    <div>
                        <h3 class="text-headline-sm font-bold text-on-surface">Punya Komunitas Sendiri?</h3>
                        <p class="text-body-sm text-on-surface-variant">Daftarkan komunitasmu untuk menjangkau lebih
                            banyak relawan lingkungan.</p>
                    </div>
                    <a class="px-4 py-2 rounded-lg bg-primary text-on-primary font-semibold text-body-sm hover:bg-primary-container transition-colors whitespace-nowrap"
                        href="#">
                        + Buat Komunitas
                    </a>
                </div>
            </div>
        </div>
    </main>
    <!-- ==================== SHARED COMPONENT: Footer ==================== -->
    <footer
        class="docked full-width bg-primary dark:bg-on-surface border-t border-primary-container dark:border-outline-variant/20 text-on-primary dark:text-primary-fixed">
        <div class="w-full max-w-7xl mx-auto px-margin-mobile md:px-margin-desktop py-space-xl">
            <!-- Top Grid: Brand & Link Directories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                <!-- Brand Info (2 cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <div
                        class="text-headline-md font-headline-md font-bold text-on-primary dark:text-primary-fixed flex items-center gap-space-xs">
                        <span
                            class="w-9 h-9 rounded-xl bg-surface-container-lowest text-primary flex items-center justify-center">
                            <span class="material-symbols-outlined text-xl" data-icon="eco"
                                style="font-variation-settings: 'FILL' 1;">eco</span>
                        </span>
                        <span>HijauIn</span>
                    </div>
                    <p class="text-body-sm font-body-sm text-on-primary-container dark:text-outline-variant max-w-sm">
                        Platform digital gotong royong untuk membangun kebiasaan ramah lingkungan, mengukur EcoScore
                        aksi nyata, dan menyatukan komunitas bumi di Indonesia.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center text-on-primary hover:bg-secondary-container hover:text-primary transition-colors"
                            href="#" title="Instagram">
                            <span class="material-symbols-outlined text-lg" data-icon="share">share</span>
                        </a>
                        <a class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center text-on-primary hover:bg-secondary-container hover:text-primary transition-colors"
                            href="#" title="YouTube">
                            <span class="material-symbols-outlined text-lg" data-icon="play_circle">play_circle</span>
                        </a>
                        <a class="w-9 h-9 rounded-full bg-primary-container flex items-center justify-center text-on-primary hover:bg-secondary-container hover:text-primary transition-colors"
                            href="#" title="Email Komunitas">
                            <span class="material-symbols-outlined text-lg" data-icon="mail">mail</span>
                        </a>
                    </div>
                </div>
                <!-- Col 1: Jelajahi -->
                <div class="space-y-3">
                    <h4
                        class="text-label-lg font-label-lg font-semibold text-primary-fixed dark:text-inverse-primary uppercase tracking-wider">
                        Jelajahi</h4>
                    <ul class="space-y-2 text-body-sm font-body-sm">
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Beranda</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Fitur Aksi</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Cara Kerja</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Edukasi Ekologi</a></li>
                        <li><a class="text-primary-fixed dark:text-inverse-primary font-semibold" href="#">Komunitas</a>
                        </li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Tentang Kami</a></li>
                    </ul>
                </div>
                <!-- Col 2: Komunitas & Aksi -->
                <div class="space-y-3">
                    <h4
                        class="text-label-lg font-label-lg font-semibold text-primary-fixed dark:text-inverse-primary uppercase tracking-wider">
                        Komunitas</h4>
                    <ul class="space-y-2 text-body-sm font-body-sm">
                        <li><a class="text-primary-fixed dark:text-inverse-primary font-semibold" href="#">Event &amp;
                                Kalender Aksi</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Pendaftaran Volunteer</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Mitra Kolaborator</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Pedoman Komunitas</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Warta Hijau</a></li>
                    </ul>
                </div>
                <!-- Col 3: Bantuan & Legalitas -->
                <div class="space-y-3">
                    <h4
                        class="text-label-lg font-label-lg font-semibold text-primary-fixed dark:text-inverse-primary uppercase tracking-wider">
                        Bantuan &amp; Legal</h4>
                    <ul class="space-y-2 text-body-sm font-body-sm">
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">FAQ</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Pusat Bantuan</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Kebijakan Privasi</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Syarat &amp; Ketentuan</a></li>
                        <li><a class="text-on-primary-container dark:text-outline-variant hover:text-on-primary dark:hover:text-surface-bright transition-colors"
                                href="#">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
            <!-- Bottom Line Copyright -->
            <div
                class="pt-8 border-t border-primary-container/60 dark:border-outline-variant/10 flex flex-col sm:flex-row items-center justify-between text-body-sm font-body-sm text-on-primary-container dark:text-outline-variant gap-4">
                <div>
                    © 2024 HijauIn. Satu Langkah Hijau Setiap Hari. Seluruh hak cipta dilindungi undang-undang.
                </div>
                <div class="flex items-center gap-6">
                    <span class="flex items-center gap-1.5 text-xs text-primary-fixed">
                        <span class="w-2 h-2 rounded-full bg-primary-fixed animate-pulse"></span>
                        Server Ramah Lingkungan Hijau
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>