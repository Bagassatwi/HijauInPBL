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

<!-- Hero Section with Decorative Graphic Atmosphere -->
<section class="w-full py-space-3xl relative overflow-hidden bg-gradient-to-b from-secondary-container/20 via-background to-background">
<!-- Ambient Green Glows -->
<div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-secondary-container/40 blur-3xl pointer-events-none"></div>
<div class="absolute top-1/2 -left-24 w-80 h-80 rounded-full bg-primary-fixed/20 blur-3xl pointer-events-none"></div>
<div class="max-w-[1280px] mx-auto px-gutter relative z-10">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
<!-- Hero Text Content -->
<div class="lg:col-span-7 flex flex-col gap-space-md">
<div class="inline-flex items-center gap-space-xs self-start px-space-md py-1 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[16px]">handshake</span>
<span>Kolaborasi Strategis &amp; ESG</span>
</div>
<h1 class="font-display-hero text-headline-xl lg:text-display-hero text-on-surface leading-tight tracking-tight">
            Bersama Mitra Wujudkan Masa Depan <span class="text-primary underline decoration-primary-container decoration-wavy decoration-2">Nol Karbon</span> &amp; Berkelanjutan
          </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
            Akselerasi target ESG korporasi, inisiatif institusi pendidikan, dan daya gerak komunitas hijau. Bersama ekosistem digital HijauIn, ciptakan dampak iklim terverifikasi dan terukur secara riil di Indonesia.
          </p>
<div class="flex flex-wrap items-center gap-space-md pt-space-xs">
<a class="inline-flex items-center gap-space-xs font-label-lg text-label-lg text-on-primary bg-primary px-space-xl py-space-sm rounded-full shadow-[0_12px_24px_-8px_rgba(0,108,73,0.35)] hover:bg-primary-container hover:text-on-primary-container transition-all transform hover:-translate-y-0.5" href="#formulir-kemitraan">
<span>Ajukan Kemitraan</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</a>
<a class="inline-flex items-center gap-space-xs font-label-lg text-label-lg text-primary bg-surface-container-lowest px-space-lg py-space-sm rounded-full shadow-sm hover:bg-surface-container transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">download</span>
<span>Unduh Proposal Kolaborasi (PDF)</span>
</a>
</div>
<!-- Micro Trust Proof -->
<div class="flex items-center gap-space-md pt-space-sm">
<div class="flex -space-x-2">
<span class="w-9 h-9 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed font-headline-sm text-label-md shadow-xs">BHL</span>
<span class="w-9 h-9 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed font-headline-sm text-label-md shadow-xs">UI</span>
<span class="w-9 h-9 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container font-headline-sm text-label-md shadow-xs">TH</span>
<span class="w-9 h-9 rounded-full bg-surface-container-high flex items-center justify-center text-primary font-headline-sm text-label-md shadow-xs">+180</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-label-md text-on-surface">Didukung 180+ Entitas</span>
<span class="font-body-sm text-label-md text-tertiary">Mencapai target keberlanjutan bersama</span>
</div>
</div>
</div>
<!-- Hero Visual Illustration / Dashboard Highlight -->
<div class="lg:col-span-5 relative">
<div class="w-full aspect-[4/3] rounded-2xl bg-surface-container-lowest p-space-md shadow-[0_20px_40px_-15px_rgba(16,185,129,0.15)] flex flex-col justify-between relative overflow-hidden">
<!-- Header Card Mock -->
<div class="flex items-center justify-between pb-space-sm border-b-0">
<div class="flex items-center gap-2">
<span class="w-3 h-3 rounded-full bg-error"></span>
<span class="w-3 h-3 rounded-full bg-amber-400"></span>
<span class="w-3 h-3 rounded-full bg-primary-container"></span>
<span class="ml-2 font-headline-sm text-label-md text-tertiary">ESG Impact Dashboard Live</span>
</div>
<span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[11px] font-label-md">Audit Real-Time</span>
</div>
<!-- Central Mini Visual / Metric Illustration -->
<div class="my-space-sm p-space-md rounded-xl bg-surface-container-low flex flex-col gap-space-xs">
<div class="flex items-center justify-between">
<span class="font-headline-sm text-body-sm text-on-surface">Reduksi Jejak Karbon Mitra</span>
<span class="font-headline-sm text-primary font-metric-num text-headline-sm">94.8% Terpenuhi</span>
</div>
<!-- Progress Bar -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden">
<div class="h-full bg-gradient-to-r from-secondary to-primary-container rounded-full" style="width: 82%;"></div>
</div>
<div class="flex items-center justify-between text-tertiary font-body-sm text-[12px] pt-1">
<span>Total Serapan Karbon: <strong>1.420 Ton CO₂e</strong></span>
<span>Target Q4: 1.500 Ton</span>
</div>
</div>
<!-- Floating Subcard Mini -->
<div class="grid grid-cols-2 gap-space-xs">
<div class="p-space-sm rounded-lg bg-surface flex items-center gap-2 shadow-xs">
<span class="material-symbols-outlined text-primary text-[24px]">forest</span>
<div>
<div class="font-metric-num text-label-lg text-on-surface">32.400+</div>
<div class="font-body-sm text-[11px] text-tertiary">Pohon Ditanam Mitra</div>
</div>
</div>
<div class="p-space-sm rounded-lg bg-surface flex items-center gap-2 shadow-xs">
<span class="material-symbols-outlined text-primary-container text-[24px]">groups</span>
<div>
<div class="font-metric-num text-label-lg text-on-surface">18.500+</div>
<div class="font-body-sm text-[11px] text-tertiary">Relawan Terlibat</div>
</div>
</div>
</div>
<!-- Leaf Accent badge -->
<div class="p-space-xs rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center gap-1 text-[11px] font-label-md">
<span class="material-symbols-outlined text-[14px]">eco</span>
<span>Terintegrasi standar ISO 14064 &amp; GRI</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Key Impact Stats Banner (Matching landing page wireframe style) -->
<section class="w-full -mt-6 mb-space-2xl relative z-20">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_12px_30px_-5px_rgba(16,185,129,0.08)]">
<div class="grid grid-cols-2 md:grid-cols-4 gap-space-md divide-y md:divide-y-0 md:divide-x-0">
<!-- Stat 1 -->
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container/60 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[26px]">apartment</span>
</div>
<div>
<div class="font-metric-num text-headline-md text-on-surface">180+</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Mitra Korporasi &amp; UMKM</div>
</div>
</div>
<!-- Stat 2 -->
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container/60 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[26px]">diversity_3</span>
</div>
<div>
<div class="font-metric-num text-headline-md text-on-surface">50+</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Komunitas Hijau Lokal</div>
</div>
</div>
<!-- Stat 3 -->
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container/60 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[26px]">task_alt</span>
</div>
<div>
<div class="font-metric-num text-headline-md text-on-surface">350+</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Program Aksi Selesai</div>
</div>
</div>
<!-- Stat 4 -->
<div class="flex items-center gap-space-sm p-space-xs">
<div class="w-12 h-12 rounded-full bg-secondary-container/60 flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[26px]">savings</span>
</div>
<div>
<div class="font-metric-num text-headline-md text-on-surface">Rp 2,4 M</div>
<div class="font-body-sm text-body-sm text-on-surface-variant">Dana Dampak Disalurkan</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Partnership Tracks / Model Kolaborasi -->
<section class="w-full py-space-2xl">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col gap-space-xl">
<div class="flex flex-col items-center text-center gap-space-xs max-w-2xl mx-auto">
<div class="inline-flex items-center gap-1 text-primary font-label-md text-label-md uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px]">hub</span>
<span>Pilihan Jalur Kemitraan</span>
</div>
<h2 class="font-headline-xl text-headline-lg md:text-headline-xl text-on-surface">
          Model Kolaborasi Fleksibel Sesuai Sasaran Anda
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Dari pemenuhan standar regulasi keberlanjutan hingga aksi grassroots bersama komunitas lokal.
        </p>
</div>
<!-- 4 Bento Cards Track -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
<!-- Track 1: Corporate ESG & CSR -->
<div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="w-14 h-14 rounded-2xl bg-secondary-container/70 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[32px]">co2</span>
</div>
<span class="px-space-sm py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-[11px]">B2B &amp; Korporasi</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface pt-space-xs">
              Corporate ESG &amp; CSR Partnership
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Tautkan tanggung jawab sosial perusahaan dengan program restorasi nyata: reforestasi mangrove, inisiatif circular waste kantor, serta keterlibatan karyawan via Employee Green Score.
            </p>
</div>
<div class="flex flex-col gap-space-xs pt-space-sm border-t-0">
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Laporan emisi terverifikasi untuk dokumen SR (Sustainability Report)</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Green Employee Engagement Challenges</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Publikasi liputan media dan sertifikat jejak positif</span>
</div>
</div>
</div>
<!-- Track 2: Komunitas & Organisasi Pemuda -->
<div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="w-14 h-14 rounded-2xl bg-secondary-container/70 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[32px]">campaign</span>
</div>
<span class="px-space-sm py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-[11px]">Grassroots &amp; Pemuda</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface pt-space-xs">
              Komunitas &amp; Organisasi Pemuda
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Perluas jangkauan aksi komunitasmu. Dapatkan akses ke ribuan pengguna aktif HijauIn untuk rekrutmen relawan, publikasi agenda aksi bersih pantai, hingga sharing kit kampanye.
            </p>
</div>
<div class="flex flex-col gap-space-xs pt-space-sm border-t-0">
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Co-hosting event di kalender nasional HijauIn</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Fasilitasi manajemen relawan terpadu &amp; absensi QR</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Dukungan logistik &amp; perlengkapan kebersihan mitra</span>
</div>
</div>
</div>
<!-- Track 3: Institusi Pendidikan & Kampus -->
<div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="w-14 h-14 rounded-2xl bg-secondary-container/70 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[32px]">school</span>
</div>
<span class="px-space-sm py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-[11px]">Akademik &amp; Sekolah</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface pt-space-xs">
              Institusi Pendidikan &amp; Kampus
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Dukung pilar Green Campus dan kurikulum merdeka. Hadirkan kuliah umum praktisi iklim, program magang bersertifikat, serta kolaborasi riset penyerapan karbon bersama mahasiswa.
            </p>
</div>
<div class="flex flex-col gap-space-xs pt-space-sm border-t-0">
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Modul kurikulum literasi keberlanjutan digital</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Program Magang Kampus Merdeka (MBKM) &amp; Riset Data</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Kompetisi inovasi solusi iklim antar-fakultas</span>
</div>
</div>
</div>
<!-- Track 4: Vendor & Brand Ramah Lingkungan -->
<div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<div class="w-14 h-14 rounded-2xl bg-secondary-container/70 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[32px]">storefront</span>
</div>
<span class="px-space-sm py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-[11px]">Ekonomi Sirkular</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface pt-space-xs">
              Vendor &amp; Brand Ramah Lingkungan
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Jangkau konsumen yang sadar lingkungan secara langsung. Integrasikan produk ramah lingkunganmu ke dalam ekosistem penukaran Eco-Score dan katalog hadiah bulanan HijauIn.
            </p>
</div>
<div class="flex flex-col gap-space-xs pt-space-sm border-t-0">
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Penempatan produk di Reward Mall Eco-Score</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Program voucher promo khusus pengguna berprestasi</span>
</div>
<div class="flex items-center gap-2 text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span>Kampanye co-branding circular packaging</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Partner Logos / Jaringan Mitra Aktif -->
<section class="w-full py-space-xl bg-surface-container-low/50">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col items-center gap-space-md">
<span class="font-label-md text-label-md uppercase tracking-wider text-tertiary">
        Dipercaya Oleh Institusi, BUMN, Universitas, &amp; Lembaga Swadaya
      </span>
<!-- Interactive Logo Cloud -->
<div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-space-md items-center">
<div class="bg-surface-container-lowest p-space-md rounded-xl flex items-center justify-center text-center shadow-xs hover:shadow-sm transition-all h-20">
<span class="font-headline-sm text-label-lg text-primary tracking-tight">KLHK RI</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-xl flex items-center justify-center text-center shadow-xs hover:shadow-sm transition-all h-20">
<span class="font-headline-sm text-label-lg text-secondary tracking-tight">Bank Hijau Lestari</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-xl flex items-center justify-center text-center shadow-xs hover:shadow-sm transition-all h-20">
<span class="font-headline-sm text-label-lg text-on-surface-variant tracking-tight">EcoPack ID</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-xl flex items-center justify-center text-center shadow-xs hover:shadow-sm transition-all h-20">
<span class="font-headline-sm text-label-lg text-primary tracking-tight">TrashHero Indo</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-xl flex items-center justify-center text-center shadow-xs hover:shadow-sm transition-all h-20">
<span class="font-headline-sm text-label-lg text-secondary tracking-tight">UI Berkelanjutan</span>
</div>
<div class="bg-surface-container-lowest p-space-md rounded-xl flex items-center justify-center text-center shadow-xs hover:shadow-sm transition-all h-20">
<span class="font-headline-sm text-label-lg text-on-surface-variant tracking-tight">Yayasan KEHATI</span>
</div>
</div>
</div>
</section>
<!-- Partnership Process Steps (Matching landing page style 1-2-3-4 flow) -->
<section class="w-full py-space-3xl">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col gap-space-2xl">
<div class="flex flex-col items-center text-center gap-space-xs max-w-xl mx-auto">
<div class="inline-flex items-center gap-1 text-primary font-label-md text-label-md uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px]">route</span>
<span>Alur Mudah Kolaborasi</span>
</div>
<h2 class="font-headline-xl text-headline-lg md:text-headline-xl text-on-surface">
          4 Langkah Memulai Kolaborasi Berdampak
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Dari diskusi inisiasi hingga pelaporan metrik terverifikasi, kami dampingi setiap tahapannya.
        </p>
</div>
<!-- Steps Flow Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-md relative">
<!-- Step 1 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col items-center text-center gap-space-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container font-headline-sm text-headline-sm flex items-center justify-center shadow-sm">
            1
          </div>
<div class="w-10 h-10 rounded-full bg-secondary-container/50 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">forum</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Diskusi Kebutuhan</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Konsultasikan target keberlanjutan atau sasaran ESG perusahaan bersama tim strategic advisory HijauIn.
          </p>
</div>
<!-- Step 2 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col items-center text-center gap-space-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container font-headline-sm text-headline-sm flex items-center justify-center shadow-sm">
            2
          </div>
<div class="w-10 h-10 rounded-full bg-secondary-container/50 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">architecture</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Perancangan Aksi</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Penyusunan kerangka kerja, jadwal kampanye, integrasi sistem, dan formulasi KPI penyerapan karbon riil.
          </p>
</div>
<!-- Step 3 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col items-center text-center gap-space-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container font-headline-sm text-headline-sm flex items-center justify-center shadow-sm">
            3
          </div>
<div class="w-10 h-10 rounded-full bg-secondary-container/50 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">volunteer_activism</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Eksekusi Lapangan</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Pelaksanaan kegiatan di lapangan bersama pelibatan jejaring relawan dan aktivasi platform digital HijauIn.
          </p>
</div>
<!-- Step 4 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col items-center text-center gap-space-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container font-headline-sm text-headline-sm flex items-center justify-center shadow-sm">
            4
          </div>
<div class="w-10 h-10 rounded-full bg-secondary-container/50 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">verified</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface">Laporan Transparansi</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Penerbitan laporan komprehensif, audit sertifikasi serapan CO₂e, dan materi publikasi dampak ke publik.
          </p>
</div>
</div>
</div>
</section>
<!-- Interactive Form Card & Contact Support Panel -->
<section class="w-full py-space-2xl bg-surface-container-low" id="formulir-kemitraan">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-surface-container-lowest rounded-2xl p-space-xl lg:p-space-2xl shadow-[0_20px_40px_-15px_rgba(0,108,73,0.08)]">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl">
<!-- Left Info Column -->
<div class="lg:col-span-5 flex flex-col justify-between gap-space-lg">
<div class="flex flex-col gap-space-sm">
<div class="inline-flex items-center gap-1 text-primary font-label-md text-label-md uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px]">contact_mail</span>
<span>Inisiasi Kerja Sama</span>
</div>
<h3 class="font-headline-xl text-headline-lg lg:text-headline-xl text-on-surface">
                Mari Diskusikan Ide Aksi Hijau Anda
              </h3>
<p class="font-body-md text-body-md text-on-surface-variant">
                Isi formulir singkat ini. Tim Partnership HijauIn akan menghubungi Anda dalam waktu 1x24 jam kerja untuk menyusun agenda telaah inisiatif bersama.
              </p>
</div>
<!-- Direct Contact Info Cards -->
<div class="flex flex-col gap-space-sm">
<div class="p-space-md rounded-xl bg-surface flex items-center gap-space-sm shadow-xs">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[20px]">mail</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-[12px] text-tertiary">Email Tim Kemitraan</span>
<a class="font-headline-sm text-body-sm text-primary hover:underline" href="mailto:mitra@hijauin.id">mitra@hijauin.id</a>
</div>
</div>
<div class="p-space-md rounded-xl bg-surface flex items-center gap-space-sm shadow-xs">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
<span class="material-symbols-outlined text-[20px]">chat</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-[12px] text-tertiary">WhatsApp Hotline Partnership</span>
<a class="font-headline-sm text-body-sm text-primary hover:underline" href="https://wa.me/6281234567890" target="_blank">+62 812-3456-7890</a>
</div>
</div>
<div class="p-space-md rounded-xl bg-secondary-container/40 flex items-start gap-space-sm">
<span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">verified_user</span>
<span class="font-body-sm text-[13px] text-on-secondary-container">
                  Seluruh data institusi dilindungi secara ketat di bawah Kebijakan Privasi HijauIn dan hanya dipergunakan untuk keperluan kolaborasi resmi.
                </span>
</div>
</div>
</div>
<!-- Right Interactive Form -->
<div class="lg:col-span-7">
<form class="flex flex-col gap-space-md bg-surface p-space-lg md:p-space-xl rounded-2xl shadow-xs" id="partnerForm" onsubmit="event.preventDefault(); showSuccessFeedback();">
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<!-- Field: Nama Perusahaan/Institusi -->
<div class="flex flex-col gap-1.5">
<label class="font-headline-sm text-body-sm text-on-surface" for="companyName">Nama Organisasi / Perusahaan *</label>
<input class="w-full px-space-md py-space-sm rounded-full bg-surface-container-lowest text-on-surface font-body-sm shadow-xs focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="companyName" placeholder="PT Inovasi Hijau Lestari" required="" type="text"/>
</div>
<!-- Field: Nama Kontak Representatif -->
<div class="flex flex-col gap-1.5">
<label class="font-headline-sm text-body-sm text-on-surface" for="picName">Nama Narahubung / PIC *</label>
<input class="w-full px-space-md py-space-sm rounded-full bg-surface-container-lowest text-on-surface font-body-sm shadow-xs focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="picName" placeholder="Sarah Wijaya" required="" type="text"/>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
<!-- Field: Email Perusahaan -->
<div class="flex flex-col gap-1.5">
<label class="font-headline-sm text-body-sm text-on-surface" for="workEmail">Email Bisnis / Resmi *</label>
<input class="w-full px-space-md py-space-sm rounded-full bg-surface-container-lowest text-on-surface font-body-sm shadow-xs focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="workEmail" placeholder="sarah@perusahaan.co.id" required="" type="email"/>
</div>
<!-- Field: Nomor Telepon / WA -->
<div class="flex flex-col gap-1.5">
<label class="font-headline-sm text-body-sm text-on-surface" for="phone">Nomor WhatsApp Aktif *</label>
<input class="w-full px-space-md py-space-sm rounded-full bg-surface-container-lowest text-on-surface font-body-sm shadow-xs focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="phone" placeholder="08123456789" required="" type="tel"/>
</div>
</div>
<!-- Field: Tipe Kolaborasi -->
<div class="flex flex-col gap-1.5">
<label class="font-headline-sm text-body-sm text-on-surface" for="partnerType">Jalur Kemitraan yang Diminati *</label>
<div class="relative">
<select class="w-full px-space-md py-space-sm rounded-full bg-surface-container-lowest text-on-surface font-body-sm shadow-xs focus:outline-none focus:ring-2 focus:ring-primary-container appearance-none transition-all cursor-pointer" id="partnerType" required="">
<option disabled="" selected="" value="">Pilih model kolaborasi...</option>
<option value="corporate-esg">Corporate ESG &amp; CSR (Penanaman, Offset Karbon, Audit)</option>
<option value="community-youth">Komunitas Lingkungan / Organisasi Pemuda (Event &amp; Relawan)</option>
<option value="education-campus">Institusi Pendidikan / Sekolah / Kampus Hijau</option>
<option value="eco-vendor">Vendor Produk Ramah Lingkungan (Eco-Reward)</option>
<option value="other">Bentuk Kolaborasi Lainnya</option>
</select>
<span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-tertiary">expand_more</span>
</div>
</div>
<!-- Field: Pesan Ringkas -->
<div class="flex flex-col gap-1.5">
<label class="font-headline-sm text-body-sm text-on-surface" for="message">Deskripsi Rencana / Target Aksi</label>
<textarea class="w-full px-space-md py-space-sm rounded-2xl bg-surface-container-lowest text-on-surface font-body-sm shadow-xs focus:outline-none focus:ring-2 focus:ring-primary-container transition-all resize-none" id="message" placeholder="Ceritakan tujuan kolaborasi, jumlah sasaran partisipan, atau perkiraan waktu pelaksanaan program..." rows="3"></textarea>
</div>
<!-- Submit Button -->
<button class="w-full py-space-sm px-space-lg rounded-full bg-primary text-on-primary font-label-lg text-label-lg shadow-[0_10px_20px_-5px_rgba(0,108,73,0.3)] hover:bg-primary-container hover:text-on-primary-container transition-all flex items-center justify-center gap-2 mt-space-xs" type="submit">
<span>Kirim Permohonan Kolaborasi</span>
<span class="material-symbols-outlined text-[20px]">send</span>
</button>
<div class="hidden p-space-sm rounded-xl bg-secondary-container text-on-secondary-container font-body-sm text-body-sm text-center" id="formFeedback">
                Terima kasih! Tim Partnership HijauIn telah menerima berkas pengajuan Anda dan akan segera menghubungi nomor terdaftar.
              </div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- Green Impact Bottom Call-to-Action (Wireframe matched) -->
<section class="w-full py-space-3xl">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-gradient-to-br from-secondary-container/40 via-surface-container-low to-secondary-container/20 rounded-2xl p-space-xl lg:p-space-2xl relative overflow-hidden shadow-sm flex flex-col md:flex-row items-center justify-between gap-space-xl">
<!-- Floating Eco Leaf Silhouette -->
<span class="material-symbols-outlined absolute -bottom-10 -right-10 text-[180px] text-primary/5 pointer-events-none">eco</span>
<!-- Image Badge Visual -->
<div class="flex items-center gap-space-md shrink-0">
<div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-surface-container-lowest p-2 shadow-md flex items-center justify-center relative">
<span class="material-symbols-outlined text-[54px] md:text-[68px] text-primary">handshake</span>
<span class="absolute bottom-1 right-1 w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center shadow-xs">
<span class="material-symbols-outlined text-[18px]">favorite</span>
</span>
</div>
</div>
<!-- Center CTA text -->
<div class="flex flex-col gap-space-xs text-center md:text-left">
<h3 class="font-headline-xl text-headline-lg lg:text-headline-xl text-on-surface">
            Siap Menciptakan Jejak Berkelanjutan?
          </h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xl">
            Jadilah bagian dari revolusi lingkungan di Indonesia. Bersama jutaan pengguna dan ratusan institusi mitra di ekosistem HijauIn.
          </p>
</div>
<!-- Action Buttons -->
<div class="flex flex-col sm:flex-row items-center gap-space-sm shrink-0">
<a class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-label-lg text-label-lg text-on-primary bg-primary px-space-xl py-space-sm rounded-full shadow-[0_10px_25px_-5px_rgba(16,185,129,0.35)] hover:bg-primary-container hover:text-on-primary-container transition-all" href="#formulir-kemitraan">
<span>Daftar Mitra Sekarang</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
<a class="w-full sm:w-auto inline-flex items-center justify-center font-label-lg text-label-lg text-primary bg-surface-container-lowest px-space-lg py-space-sm rounded-full shadow-sm hover:bg-surface-container transition-colors" href="#">
            Pusat Bantuan
          </a>
</div>
</div>
</div>
</section>
</div>
<script>
  function showSuccessFeedback() {
    const feedback = document.getElementById('formFeedback');
    const form = document.getElementById('partnerForm');
    if (feedback) {
      feedback.classList.remove('hidden');
      form.reset();
      setTimeout(() => {
        feedback.classList.add('hidden');
      }, 7000);
    }
  }
</script>

<?php 
include '../includes/footer.php'; 
?>
