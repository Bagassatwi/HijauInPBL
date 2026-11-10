<!DOCTYPE html>
<?php 
// 1. Panggil header dan navbar
include '../includes/header.php'; 
include '../includes/navbar.php'; 
include '../includes/Subnavigationcommunity.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>HijauIn - Solusi Langkah Hijau Setiap Hari</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@500;600;700;800&amp;display=swap" rel="stylesheet"/>
    
    <!-- PENTING: CSS Google Material Symbols agar ikon muncul -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    
    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            main>:first-child { margin-top: 0 !important; }
            main>:last-child { margin-bottom: 0 !important; }
        }
        ::-webkit-scrollbar { display: none; }
    </style>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config={darkMode:"class",theme:{extend:{colors:{"surface-container":"#e6eeff","on-error-container":"#93000a","on-tertiary-fixed-variant":"#3b4a44","primary":"#006c49","secondary-container":"#adedd3","on-tertiary-container":"#2d3c37","secondary":"#2b6954","on-primary-fixed":"#002113","outline-variant":"#bbcabf","surface-bright":"#f8f9ff","on-secondary-fixed":"#002117","on-tertiary-fixed":"#101e1a","surface":"#f8f9ff","on-primary-fixed-variant":"#005236","error-container":"#ffdad6","inverse-primary":"#4edea3","on-surface":"#121c2a","primary-fixed-dim":"#4edea3","surface-tint":"#006c49","on-error":"#ffffff","tertiary-fixed-dim":"#bacac3","inverse-surface":"#27313f","primary-container":"#10b981","inverse-on-surface":"#eaf1ff","on-surface-variant":"#3c4a42","secondary-fixed-dim":"#95d3ba","on-secondary-container":"#306d58","on-tertiary":"#ffffff","surface-dim":"#d0dbed","on-background":"#121c2a","surface-container-low":"#eff4ff","primary-fixed":"#6ffbbe","surface-container-highest":"#d9e3f6","tertiary-fixed":"#d5e6df","tertiary":"#52625c","surface-container-high":"#dee9fc","background":"#f8f9ff","on-secondary":"#ffffff","tertiary-container":"#96a69f","surface-container-lowest":"#ffffff","error":"#ba1a1a","on-secondary-fixed-variant":"#0b513d","outline":"#6c7a71","on-primary-container":"#00422b","secondary-fixed":"#b0f0d6","surface-variant":"#d9e3f6","on-primary":"#ffffff"},borderRadius:{DEFAULT:"1rem",lg:"2rem",xl:"3rem",full:"9999px"},spacing:{gutter:"1.5rem","space-xl":"2rem","margin-mobile":"1.25rem","gutter-mobile":"1rem","space-sm":"0.5rem","space-3xl":"4.5rem","space-lg":"1.5rem","space-xs":"0.25rem","space-2xl":"3rem","space-md":"1rem",margin:"2.5rem"},fontFamily:{"label-lg":["Plus Jakarta Sans"],"headline-md":["Plus Jakarta Sans"],"display-hero-mobile":["Plus Jakarta Sans"],"metric-num":["Plus Jakarta Sans"],"body-sm":["Inter"],"body-md":["Inter"],"display-hero":["Plus Jakarta Sans"],"headline-xl":["Plus Jakarta Sans"],"headline-lg":["Plus Jakarta Sans"],"label-md":["Plus Jakarta Sans"],"headline-sm":["Plus Jakarta Sans"],"body-lg":["Inter"]},fontSize:{"label-lg":["14px",{lineHeight:"20px",letterSpacing:"0.01em",fontWeight:"700"}],"headline-md":["22px",{lineHeight:"30px",fontWeight:"700"}],"display-hero-mobile":["36px",{lineHeight:"44px",letterSpacing:"-0.02em",fontWeight:"800"}],"metric-num":["24px",{lineHeight:"28px",fontWeight:"800"}],"body-sm":["14px",{lineHeight:"20px",fontWeight:"400"}],"body-md":["16px",{lineHeight:"24px",fontWeight:"400"}],"display-hero":["56px",{lineHeight:"68px",letterSpacing:"-0.02em",fontWeight:"800"}],"headline-xl":["40px",{lineHeight:"48px",letterSpacing:"-0.015em",fontWeight:"700"}],"headline-lg":["30px",{lineHeight:"38px",letterSpacing:"-0.01em",fontWeight:"700"}],"label-md":["12px",{lineHeight:"16px",letterSpacing:"0.02em",fontWeight:"600"}],"headline-sm":["18px",{lineHeight:"26px",fontWeight:"600"}],"body-lg":["18px",{lineHeight:"28px",fontWeight:"400"}]}}}}</script>
    </head>
    <body class="bg-background font-body-md text-on-surface antialiased selection:bg-secondary-container selection:text-on-secondary-container"></body>
</section>

<!-- Hero Header & Filter Section -->
<section class="w-full pt-space-2xl pb-space-xl">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col gap-space-lg">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
<div class="flex flex-col gap-space-xs max-w-2xl">
<div class="inline-flex items-center gap-2 bg-secondary-container/60 text-primary font-label-md text-label-md px-space-md py-1 rounded-full w-fit">
<span class="material-symbols-outlined text-[16px]">public</span>
            Edukasi &amp; Jurnalisme Komunitas
          </div>
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">
            Inspirasi, Cerita Dampak, dan Tips <span class="text-primary-container">Gaya Hidup Hijau</span>
</h1>
<p class="font-body-md text-body-md text-on-surface-variant">
            Jelajahi wawasan sains iklim, tips hidup minim sampah, serta kabar inspiratif dari ribuan relawan di penjuru tanah air.
          </p>
</div>
<!-- Search Bar with Pill Contour -->
<div class="w-full md:w-80 shrink-0">
<div class="relative flex items-center bg-surface-container-lowest rounded-full shadow-sm px-space-md py-space-xs">
<span class="material-symbols-outlined text-outline text-[20px] mr-2">search</span>
<input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none" placeholder="Cari topik atau cerita..." type="text"/>
</div>
</div>
</div>
<!-- Category Filter Pills -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-2 pt-1 no-scrollbar">
<button class="bg-primary text-on-primary font-label-md text-label-md px-space-md py-2 rounded-full shadow-sm shrink-0 flex items-center gap-1.5 transition-transform hover:scale-105">
<span class="material-symbols-outlined text-[16px]">apps</span>
          Semua Artikel
        </button>
<button class="bg-surface-container-lowest hover:bg-secondary-container hover:text-on-secondary-container text-on-surface-variant font-label-md text-label-md px-space-md py-2 rounded-full shadow-sm shrink-0 transition-all">
          Cerita Aksi Lapangan
        </button>
<button class="bg-surface-container-lowest hover:bg-secondary-container hover:text-on-secondary-container text-on-surface-variant font-label-md text-label-md px-space-md py-2 rounded-full shadow-sm shrink-0 transition-all">
          Tips Hidup Minim Sampah
        </button>
<button class="bg-surface-container-lowest hover:bg-secondary-container hover:text-on-secondary-container text-on-surface-variant font-label-md text-label-md px-space-md py-2 rounded-full shadow-sm shrink-0 transition-all">
          Wawasan Iklim &amp; Sains
        </button>
<button class="bg-surface-container-lowest hover:bg-secondary-container hover:text-on-secondary-container text-on-surface-variant font-label-md text-label-md px-space-md py-2 rounded-full shadow-sm shrink-0 transition-all">
          Inovasi Daur Ulang
        </button>
<button class="bg-surface-container-lowest hover:bg-secondary-container hover:text-on-secondary-container text-on-surface-variant font-label-md text-label-md px-space-md py-2 rounded-full shadow-sm shrink-0 transition-all">
          Profil Tokoh Hijau
        </button>
</div>
</div>
</section>
<!-- Featured Spotlight Hero Card -->
<section class="w-full pb-space-2xl">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-surface-container-lowest rounded-lg shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 gap-0 group">
<!-- Visual Column -->
<div class="lg:col-span-7 relative min-h-[340px] lg:min-h-[460px] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A massive sunny community coastal beach cleanup in Ancol Jakarta with five hundred enthusiastic volunteers wearing emerald green shirts and gloves collecting plastic trash along the coast with bright sunlight, natural sand, blue sea background, modern documentary style editorial photography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVrOY1WxynkTU1m0NCc5qR4q4PiDQkdd9rk4_1YH6aBXlcQCj-bGhka1eQ4Dxr47E6KyBGaC9-NpzLarccVDbPwgCw8t8-R3_TJ-R_4YvYJttt8PN3z01zHqNf8jHyM1ZRxbHCb3DRjNXCMtAKH0ACUC17zIMU9LtwsIBFhwQGbpr6xnDyZbL30Q2qg8N7WrnWHurP5dzNw0rdKDT3qOWxDc-uMUYCjyPP0cu-3ivGrAxARbsqAGn8"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
<div class="absolute top-space-md left-space-md flex flex-wrap gap-2">
<span class="bg-primary text-on-primary font-label-md text-label-md px-space-md py-1 rounded-full shadow-md flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">star</span>
              Cerita Utama
            </span>
<span class="bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-md text-label-md px-space-md py-1 rounded-full shadow-sm">
              5 Menit Baca
            </span>
</div>
<div class="absolute bottom-space-md left-space-md right-space-md flex items-center justify-between text-white font-label-md text-label-md">
<span class="flex items-center gap-1 bg-black/40 backdrop-blur-sm px-3 py-1 rounded-full">
<span class="material-symbols-outlined text-[16px] text-secondary-fixed">pin_drop</span>
              Pantai Karnaval Ancol, Jakarta
            </span>
<span class="flex items-center gap-1 bg-black/40 backdrop-blur-sm px-3 py-1 rounded-full">
<span class="material-symbols-outlined text-[16px] text-secondary-container">recycling</span>
              3.200 Kg Plastik Tersaring
            </span>
</div>
</div>
<!-- Content Column -->
<div class="lg:col-span-5 p-space-xl flex flex-col justify-between bg-surface-container-lowest">
<div class="flex flex-col gap-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary-container text-[20px]">verified</span>
<span class="font-label-md text-label-md uppercase tracking-wider text-primary">Aksi Komunitas Terverifikasi</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-on-surface hover:text-primary transition-colors cursor-pointer leading-snug">
              Kisah dari Pesisir Ancol: Bagaimana 500 Relawan Menyelamatkan 3,2 Ton Sampah Plastik dalam 1 Hari
            </h2>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-4">
              Melalui kolaborasi komunitas dan teknologi pelacak dampak HijauIn, aksi kolektif berhasil mencegah limbah mikroplastik mencemari laut Jawa. Temukan bagaimana sistem penimbangan cerdas dan pemilahan digital mengoptimalkan laju daur ulang secara instan di lapangan.
            </p>
</div>
<div class="pt-space-lg flex flex-col gap-space-md">
<!-- Author & Badges Strip -->
<div class="flex items-center justify-between bg-surface-container-low rounded-DEFAULT p-space-sm">
<div class="flex items-center gap-space-sm min-w-0">
<img class="w-11 h-11 rounded-full object-cover shrink-0" data-alt="Close up warm outdoor portrait of young Indonesian female environmental activist Dina Putri smiling confident wearing green linen shirt with nature garden background warm morning sun" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDa4w1ry6LdXT21gJ-Je5CrivGgM3IxMD4fxm2WjM1RxuXPRcWpgs1YQln6Wm-EdeuEl987kCTGrogdSZS6_F1zoGewdkmVjg5gj3u7SgUoSpOIqzO1zUHED-8M2gfMX7OTm7vH8T987OiytB4-Y0dXzGduZVWqrw-5EIA0SaWv8bcdMe-r5uzMHSFYQJ8LsPmhmxWEQLAfuPriOdFsh_uCReQsdWwux_so3v1ylAPmedr6v9Ag1OCo"/>
<div class="flex flex-col min-w-0">
<span class="font-headline-sm text-label-lg text-on-surface truncate">Dina Putri</span>
<span class="font-body-sm text-label-md text-tertiary truncate">Pegiat Lingkungan • 18 Mei 2026</span>
</div>
</div>
<div class="shrink-0 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-space-sm py-1 rounded-full flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">volunteer_activism</span>
<span>+250 Poin</span>
</div>
</div>
<!-- Read Button CTA -->
<a class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-secondary text-on-primary font-label-lg text-label-lg py-space-sm px-space-lg rounded-full shadow-md transition-all group" href="#">
<span>Baca Cerita Selengkapnya</span>
<span class="material-symbols-outlined text-[18px] transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- Metric Strip: Ruang Literasi & Partisipasi -->
<section class="w-full pb-space-2xl">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-surface-container-lowest rounded-DEFAULT shadow-sm p-space-lg grid grid-cols-2 lg:grid-cols-4 gap-space-md">
<div class="flex items-center gap-space-md p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[24px]">auto_stories</span>
</div>
<div class="flex flex-col">
<span class="font-metric-num text-metric-num text-on-surface">148+</span>
<span class="font-body-sm text-body-sm text-tertiary">Artikel Panduan Edukasi</span>
</div>
</div>
<div class="flex items-center gap-space-md p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[24px]">co2</span>
</div>
<div class="flex flex-col">
<span class="font-metric-num text-metric-num text-on-surface">32.4k</span>
<span class="font-body-sm text-tertiary">Kg Emisi Diulas Solusinya</span>
</div>
</div>
<div class="flex items-center gap-space-md p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[24px]">groups</span>
</div>
<div class="flex flex-col">
<span class="font-metric-num text-metric-num text-on-surface">420+</span>
<span class="font-body-sm text-tertiary">Penulis Kontributor Komunitas</span>
</div>
</div>
<div class="flex items-center gap-space-md p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[24px]">award_star</span>
</div>
<div class="flex flex-col">
<span class="font-metric-num text-metric-num text-on-surface">98.5%</span>
<span class="font-body-sm text-tertiary">Tingkat Aksi Praktik Positif</span>
</div>
</div>
</div>
</div>
</section>
<!-- Grid of Recent Blog Posts (3-Column Wireframe Pattern) -->
<section class="w-full pb-space-3xl">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col gap-space-xl">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-sm">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Koleksi Artikel Terbaru</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Belajar dari praktik nyata dan terapkan langsung dalam kehidupan sehari-hari</p>
</div>
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md text-tertiary">Urutkan:</span>
<button class="bg-surface-container-lowest text-on-surface font-label-md text-label-md px-space-md py-1.5 rounded-full shadow-sm flex items-center gap-1">
<span>Terbaru</span>
<span class="material-symbols-outlined text-[16px]">expand_more</span>
</button>
</div>
</div>
<!-- 3-Column Responsive Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-xl">
<!-- Post 1 -->
<article class="bg-surface-container-lowest rounded-DEFAULT shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
<div class="relative h-52 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A clean modern indoor home composting bin with organic kitchen fruit peelings rich dark organic soil and small green sprout clean Scandinavian aesthetic warm daylight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCp0MM83p3wgpxu3g2fhIqoP0H1LzcBs5Sl_rorkULrH0BFZlV_oNGypKXbNKi3ERCzZXAn7yNiBwfdlTJz5quOOTPb-q1VkiWpbZyccKYfcqnEen8Nn_G-kCHoRqGFwW0dpSDJeJtMFKZMDznURuOM-sY4VZgeK7vhXSJuNQhGiGfoaqA8R6UJiqOrMPuM7TZS9kcisnkb0CPUbPHS-rkK9faCbBCs8G8vVfN8rKZN7e46kKzF745l"/>
<span class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full shadow-sm">
              Tips Praktis
            </span>
</div>
<div class="p-space-lg flex flex-col justify-between flex-1 gap-space-md">
<div class="flex flex-col gap-space-xs">
<span class="font-label-md text-label-md text-tertiary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 4 Menit Baca
              </span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                5 Cara Sederhana Memulai Kompos Rumahan Tanpa Bau
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                Memulai pengolahan sisa makanan tidak sesulit yang dibayangkan. Pelajari metode aerobik botol dan ember bertingkat yang bebas lalat dan praktis untuk rumah minimalis.
              </p>
</div>
<div class="pt-space-sm flex items-center justify-between">
<div class="flex items-center gap-space-xs min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center font-label-md text-label-md font-bold">
                  BS
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface truncate">Budi Santoso</span>
<span class="font-body-sm text-[11px] text-tertiary truncate">14 Mei 2026</span>
</div>
</div>
<a class="w-9 h-9 rounded-full bg-surface-container hover:bg-primary hover:text-on-primary flex items-center justify-center text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Post 2 -->
<article class="bg-surface-container-lowest rounded-DEFAULT shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
<div class="relative h-52 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A smartphone screen displaying a sleek green carbon footprint tracker app interface with graphs eco-score badge next to a reusable coffee tumbler on a bright minimalist wooden desk" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqdUCldJUyLxuJXSdW-3SepdJJ1wr3QfhfS654Lj71mVjI44tt-kYx4OlgqqBOCnqRw-myEQWewINyvxDDsd55796CTY1TkPkp1hABuQxrN2gjA8lRRVxQitf0uTcjgFhUpj8q9Mt7drQ1L9s_ggiUi4lQV_WTCr-Ut0Y9IAaaF2ZwlSR88BonUOyUP1EKa3D9j40sDK-S2fHTsKe_NkGw9Z0HEcMxxlwvsEdnHVLgrLbin-W-26RO"/>
<span class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full shadow-sm">
              Edukasi Hijau
            </span>
</div>
<div class="p-space-lg flex flex-col justify-between flex-1 gap-space-md">
<div class="flex flex-col gap-space-xs">
<span class="font-label-md text-label-md text-tertiary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 6 Menit Baca
              </span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                Panduan Menghitung Jejak Karbon Harianmu Menggunakan Fitur Eco-Score
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                Memahami metrik emisi dari mobilitas harian, konsumsi listrik, hingga pilihan makan siang untuk merumuskan aksi mitigasi pribadi yang paling berdampak.
              </p>
</div>
<div class="pt-space-sm flex items-center justify-between">
<div class="flex items-center gap-space-xs min-w-0">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-label-md text-label-md font-bold">
                  LH
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface truncate">Tim Litbang HijauIn</span>
<span class="font-body-sm text-[11px] text-tertiary truncate">10 Mei 2026</span>
</div>
</div>
<a class="w-9 h-9 rounded-full bg-surface-container hover:bg-primary hover:text-on-primary flex items-center justify-center text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Post 3 -->
<article class="bg-surface-container-lowest rounded-DEFAULT shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
<div class="relative h-52 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Dense lush green mangrove forest along an Indonesian tidal estuary with clear water reflection intertwined roots and blue sky aerial drone photography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyttOMMGXiOLFkaW-91fB6bhlSvd2DXNIrXlgjvPJ3p424-Z9YZHPedxceVlPAood5hzGXYcWkyjLQdHltGynF6UKxQ7pURf1Hxm4BbJ-uHgTScqvj05Nb0yAPCZaUd24617JwAHrafg3IWKWI2s9RzKPS8kr1m4tm0jlKK7lhdwrvYIW9hsDrfu_Xx695Rb6ef1mpb61KDxexJ0W9gwMi_FKRteHv6nmJwk3MKIrWjm4-1G5ea3D-"/>
<span class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full shadow-sm">
              Konservasi
            </span>
</div>
<div class="p-space-lg flex flex-col justify-between flex-1 gap-space-md">
<div class="flex flex-col gap-space-xs">
<span class="font-label-md text-label-md text-tertiary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 8 Menit Baca
              </span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                Mengenal Hutan Mangrove: Benteng Alami Pesisir Indonesia Melawan Abrasi
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                Ekosistem bakau bukan hanya pelindung garis pantai dari abrasi gelombang, tapi juga penyimpan karbon biru (blue carbon) hingga 5 kali lebih tinggi dibanding hutan darat.
              </p>
</div>
<div class="pt-space-sm flex items-center justify-between">
<div class="flex items-center gap-space-xs min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center font-label-md text-label-md font-bold">
                  SM
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface truncate">Sarah Melati</span>
<span class="font-body-sm text-[11px] text-tertiary truncate">04 Mei 2026</span>
</div>
</div>
<a class="w-9 h-9 rounded-full bg-surface-container hover:bg-primary hover:text-on-primary flex items-center justify-center text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Post 4 -->
<article class="bg-surface-container-lowest rounded-DEFAULT shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
<div class="relative h-52 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A stylish young professional carrying a canvas tote bag stainless steel water bottle and reusable glass lunch box in a sunlit modern eco-friendly co-working space" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFCCcZ8xbooUOApQ3yZ-zxuuqQlS_MlpwsDRLOgYIxkbLPuleIKLCJ-q5x-wOu2KTiPPEmfF7QAQHQClYcKSd6CFhiR0XJObIi86ibedpWpEre3K6jLWDOar7baam-2pY_22dXEz0JzHHzYzaTot-6vlRKtfzKFBD3ONPKHG9ZsTf3WMS0_9HD36akC1DvmmcWF21ewGYXup9rDK5Kv7xF6DxmEKmIPkTwh12M6Eej_dLmZRQZwLrr"/>
<span class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full shadow-sm">
              Gaya Hidup
            </span>
</div>
<div class="p-space-lg flex flex-col justify-between flex-1 gap-space-md">
<div class="flex flex-col gap-space-xs">
<span class="font-label-md text-label-md text-tertiary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 5 Menit Baca
              </span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                Transformasi Gaya Hidup Zero-Waste untuk Mahasiswa dan Pekerja Kantoran
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                Membawa bekal, menolak sedotan plastik, dan belanja curah. Panduan taktis memulai kebiasaan tanpa beban finansial maupun rasa canggung sosial.
              </p>
</div>
<div class="pt-space-sm flex items-center justify-between">
<div class="flex items-center gap-space-xs min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center font-label-md text-label-md font-bold">
                  AP
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface truncate">Andi Pratama</span>
<span class="font-body-sm text-[11px] text-tertiary truncate">29 Apr 2026</span>
</div>
</div>
<a class="w-9 h-9 rounded-full bg-surface-container hover:bg-primary hover:text-on-primary flex items-center justify-center text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Post 5 -->
<article class="bg-surface-container-lowest rounded-DEFAULT shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
<div class="relative h-52 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Indonesian youth volunteer group operating digital weighing scale sorting plastic bottles and cardboard boxes in a lively community waste bank center in Yogyakarta" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJz24SGm2S2CWfTSBHf5Bn23rlRi9Z1BlFoxpe9lC8cfDU8_SSiYafohb9e2dWuBiJF0e1GK5h0Jtb1anKW5TD_uEtfbzkqZMWrgs-aGUREbfdJA4na_913bxIce9yDFpylS3FZpdgXtOHkiPNjqXJ-RLx_uoqgFaApxuKe19Fhy7x1486QvZU46qUOYzCv6CGjduuoIbIP6-UY_M6fdPZPQWi9V9-IkhQqAfjcYadcuev3dB7QBsG"/>
<span class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full shadow-sm">
              Cerita Komunitas
            </span>
</div>
<div class="p-space-lg flex flex-col justify-between flex-1 gap-space-md">
<div class="flex flex-col gap-space-xs">
<span class="font-label-md text-label-md text-tertiary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 7 Menit Baca
              </span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                Wawancara Eksklusif: Komunitas Pemuda Penggerak Bank Sampah Digital di Yogyakarta
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                Bagaimana inovasi tabungan sampah berbasis QR code mampu mengubah 12 ton sampah non-organik per bulan menjadi beasiswa pendidikan bagi anak-anak desa.
              </p>
</div>
<div class="pt-space-sm flex items-center justify-between">
<div class="flex items-center gap-space-xs min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center font-label-md text-label-md font-bold">
                  SR
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface truncate">Siti Rahma</span>
<span class="font-body-sm text-[11px] text-tertiary truncate">25 Apr 2026</span>
</div>
</div>
<a class="w-9 h-9 rounded-full bg-surface-container hover:bg-primary hover:text-on-primary flex items-center justify-center text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Post 6 -->
<article class="bg-surface-container-lowest rounded-DEFAULT shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
<div class="relative h-52 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Conceptual artistic image of circular economy symbol surrounded by clean repurposed glass jars cloth bags and bamboo utensils minimal clean green studio lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhxqunXDnvO84XCN-Cm_aGueiVuJViquuguwJiZrNrDshg1wRtOCXTC-_Zjcnemp1d1lmuKui8_fWj1Z3voVhUC6sV-3YCr-RHj265Ir1Vv2HxqoxJEKaO_B6PaiIgnS1JBfK8d8bDiYPza72MS-Sl2QESVlwzPWVuFf4dx-hgcOlty9AyMxn8iyeln3mNKtyCdwDCeqQepDgaGtEW-uujOi7jM3E-DqKFFjG8Bk692qaoBLQdUWVP"/>
<span class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full shadow-sm">
              Wawasan
            </span>
</div>
<div class="p-space-lg flex flex-col justify-between flex-1 gap-space-md">
<div class="flex flex-col gap-space-xs">
<span class="font-label-md text-label-md text-tertiary flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 6 Menit Baca
              </span>
<h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors line-clamp-2">
                Mengapa Daur Ulang Saja Tidak Cukup: Prinsip Refuse dan Reduce yang Sering Terlupakan
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                Membongkar mitos daur ulang plastik tak terbatas serta alasan mengapa penghentian konsumsi plastik sekali pakai adalah jalan keluar paling fundamental bagi krisis sampah.
              </p>
</div>
<div class="pt-space-sm flex items-center justify-between">
<div class="flex items-center gap-space-xs min-w-0">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center font-label-md text-label-md font-bold">
                  KG
                </div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface truncate">Kevin Gunawan</span>
<span class="font-body-sm text-[11px] text-tertiary truncate">20 Apr 2026</span>
</div>
</div>
<a class="w-9 h-9 rounded-full bg-surface-container hover:bg-primary hover:text-on-primary flex items-center justify-center text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
</div>
<!-- Pagination / Load More Pill -->
<div class="flex items-center justify-center pt-space-md">
<button class="bg-surface-container-lowest hover:bg-secondary-container text-primary font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-sm flex items-center gap-2 transition-all">
<span>Muat Artikel Lainnya</span>
<span class="material-symbols-outlined text-[18px]">expand_more</span>
</button>
</div>
</div>
</section>
<!-- Author Community Submission Banner -->
<section class="w-full pb-space-2xl">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-surface-container-high rounded-lg p-space-xl flex flex-col md:flex-row items-center justify-between gap-space-lg shadow-sm">
<div class="flex items-center gap-space-lg">
<div class="w-16 h-16 rounded-full bg-secondary-container text-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[32px]">edit_note</span>
</div>
<div class="flex flex-col gap-1">
<div class="inline-flex items-center gap-1.5 text-primary font-label-md text-label-md">
<span class="material-symbols-outlined text-[16px]">stars</span>
              Kontributor Hijau
            </div>
<h3 class="font-headline-md text-headline-md text-on-surface">Punya Cerita atau Tips Inspiratif?</h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xl">
              Kirimkan tulisan, panduan praktis, atau dokumentasi aksi komunitasmu. Dapatkan Eco Score dan publikasikan ceritamu ke lebih dari 15.000 pembaca!
            </p>
</div>
</div>
<div class="shrink-0 flex items-center gap-space-sm w-full md:w-auto">
<a class="w-full md:w-auto text-center bg-primary hover:bg-secondary text-on-primary font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-md transition-all" href="#">
            Tulis Artikel Sekarang
          </a>
</div>
</div>
</div>
</section>
<!-- Newsletter & Community Digest CTA Box (Mint-Green Background) -->
<section class="w-full pb-space-3xl">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-secondary-container/50 rounded-lg p-space-xl lg:p-space-2xl shadow-sm flex flex-col lg:flex-row items-center justify-between gap-space-xl">
<div class="flex flex-col gap-space-sm max-w-xl text-center lg:text-left">
<div class="inline-flex items-center justify-center lg:justify-start gap-2 text-primary font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">mark_email_read</span>
<span>Warta Mingguan HijauIn</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
            Dapatkan Rangkuman Aksi Hijau Mingguan Langsung di Emailmu
          </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
            Setiap hari Jumat kami merangkum tips zero-waste teruji, peluang volunteer terbaru, serta kabar baik pemulihan lingkungan tanpa spam.
          </p>
<div class="flex items-center justify-center lg:justify-start gap-space-md text-tertiary font-body-sm text-label-md pt-1">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-primary">check_circle</span> 100% Gratis</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-primary">check_circle</span> Berhenti kapan saja</span>
</div>
</div>
<!-- Subscription Form Pill -->
<div class="w-full lg:w-auto flex-1 max-w-md">
<form class="flex flex-col sm:flex-row items-stretch bg-surface-container-lowest p-1.5 rounded-full shadow-md gap-2">
<div class="flex items-center pl-space-md flex-1">
<span class="material-symbols-outlined text-outline text-[20px] mr-2">mail</span>
<input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none py-2" placeholder="Masukkan alamat emailmu..." required="" type="email"/>
</div>
<button class="bg-primary hover:bg-secondary text-on-primary font-label-lg text-label-lg px-space-xl py-3 rounded-full transition-all shrink-0" type="submit">
              Berlangganan
            </button>
</form>
<p class="font-body-sm text-[12px] text-tertiary text-center lg:text-left mt-2 pl-space-sm">
            Privasi terlindungi. Kami menghargai kotak masuk Anda.
          </p>
</div>
</div>
</div>
</section>
</div></main>
<?php 
include '../includes/footer.php'; 
?>