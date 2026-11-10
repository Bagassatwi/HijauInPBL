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
    <body class="bg-background font-body-md text-on-surface antialiased selection:bg-secondary-container selection:text-on-secondary-container">

<!-- Hero Header Section -->
<section class="w-full relative overflow-hidden bg-gradient-to-b from-secondary-container/40 via-surface-container-low to-background py-space-2xl md:py-space-3xl">
    <div class="max-w-[1280px] mx-auto px-gutter relative z-10 flex flex-col items-center text-center">
        
        <!-- Tag Pill Badge -->
        <div class="inline-flex items-center gap-2 bg-surface-container-lowest text-primary px-space-md py-space-xs rounded-full shadow-sm mb-space-md">
            <span class="material-symbols-outlined text-primary text-[18px]" style="font-variation-settings: 'FILL' 1;">eco</span>
            <span class="font-label-md text-label-md text-primary tracking-wide uppercase">Komunitas &amp; Event Berkelanjutan</span>
        </div>

        <!-- Main Heading -->
        <h1 class="font-display-hero text-headline-xl md:text-display-hero text-on-surface max-w-4xl tracking-tight leading-tight">
            Ikuti Aksi Nyata Bersama <span class="text-primary-container inline-block">Komunitas HijauIn</span>
        </h1>
        
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mt-space-md">
            Temukan kegiatan ramah lingkungan terdekat: bersih pantai, tanam mangrove, lokakarya daur ulang kreatif, hingga webinar lingkungan bersama ribuan pegiat hijau.
        </p>

        <!-- Search & Multi-Filter Bar -->
        <div class="w-full max-w-4xl mt-space-xl bg-surface-container-lowest rounded-2xl md:rounded-full p-space-xs md:p-space-sm shadow-xl flex flex-col md:flex-row items-center gap-space-xs">
            
            <!-- Search Keyword -->
            <div class="w-full md:flex-1 flex items-center gap-2 px-space-md py-space-xs">
                <span class="material-symbols-outlined text-primary text-[22px]">search</span>
                <input class="w-full bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-outline outline-none" placeholder="Cari nama event atau topik..." type="text"/>
            </div>

            <!-- Filter Lokasi -->
            <div class="w-full md:w-48 flex items-center gap-2 px-space-md py-space-xs bg-surface-container-low md:bg-transparent rounded-full">
                <span class="material-symbols-outlined text-secondary text-[20px]">location_on</span>
                <select class="w-full bg-transparent font-body-sm text-body-sm text-on-surface outline-none cursor-pointer">
                    <option value="">Semua Lokasi</option>
                    <option value="jakarta">DKI Jakarta</option>
                    <option value="bekasi">Bekasi &amp; Pesisir</option>
                    <option value="bandung">Bandung Raya</option>
                    <option value="surabaya">Surabaya</option>
                    <option value="bogor">Bogor &amp; Depok</option>
                </select>
            </div>

            <!-- Filter Kategori -->
            <div class="w-full md:w-52 flex items-center gap-2 px-space-md py-space-xs bg-surface-container-low md:bg-transparent rounded-full">
                <span class="material-symbols-outlined text-secondary text-[20px]">category</span>
                <select class="w-full bg-transparent font-body-sm text-body-sm text-on-surface outline-none cursor-pointer">
                    <option value="">Semua Kategori</option>
                    <option value="pantai">Bersih Pantai</option>
                    <option value="tanam">Tanam Pohon</option>
                    <option value="daur-ulang">Workshop Daur Ulang</option>
                    <option value="mobilitas">Mobilitas Hijau</option>
                    <option value="zero-waste">Zero Waste</option>
                </select>
            </div>

            <!-- Search Action CTA -->
            <button class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-xl py-space-md rounded-full shadow-md transition-all shrink-0" type="button">
                <span>Temukan</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </button>

        </div>

        <!-- Quick category badges row -->
        <div class="flex flex-wrap items-center justify-center gap-space-xs mt-space-md text-body-sm">
            <span class="font-label-md text-label-md text-tertiary">Pilihan Populer:</span>
            <button class="px-space-md py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-colors" type="button">#BersihPantai</button>
            <button class="px-space-md py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-colors" type="button">#TanamMangrove</button>
            <button class="px-space-md py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-colors" type="button">#DaurUlangPlastik</button>
            <button class="px-space-md py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-md text-label-md hover:bg-primary hover:text-on-primary transition-colors" type="button">#ZeroWasteHome</button>
        </div>

    </div>
</section>

<!-- Metric Strip Banner (Matches wireframe metric cards) -->
<section class="w-full -mt-space-lg relative z-20">
    <div class="max-w-[1280px] mx-auto px-gutter">
        <div class="bg-surface-container-lowest rounded-2xl shadow-lg p-space-lg grid grid-cols-2 md:grid-cols-4 gap-space-md items-center">
            
            <!-- Metric 1 -->
            <div class="flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[24px]">event_available</span>
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-metric-num text-metric-num text-on-surface">120+</span>
                    <span class="font-label-md text-label-md text-outline truncate">Event Terlaksana</span>
                </div>
            </div>

            <!-- Metric 2 -->
            <div class="flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[24px]">groups</span>
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-metric-num text-metric-num text-on-surface">8.500+</span>
                    <span class="font-label-md text-label-md text-outline truncate">Peserta Terdaftar</span>
                </div>
            </div>

            <!-- Metric 3 -->
            <div class="flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[24px]">explore</span>
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-metric-num text-metric-num text-on-surface">45+</span>
                    <span class="font-label-md text-label-md text-outline truncate">Kota di Indonesia</span>
                </div>
            </div>

            <!-- Metric 4 -->
            <div class="flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[24px]">sentiment_satisfied</span>
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-metric-num text-metric-num text-on-surface">98%</span>
                    <span class="font-label-md text-label-md text-outline truncate">Tingkat Kepuasan</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Main Event Grid Section -->
<section class="w-full py-space-3xl">
    <div class="max-w-[1280px] mx-auto px-gutter flex flex-col gap-space-xl">
        
        <!-- Section Header with Toggle -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
            <div class="flex flex-col">
                <div class="flex items-center gap-2 mb-1">
                    <span class="material-symbols-outlined text-primary text-[20px]">calendar_today</span>
                    <span class="font-label-md text-label-md text-primary uppercase font-bold tracking-wider">Aksi Mendatang</span>
                </div>
                <h2 class="font-headline-xl text-headline-xl text-on-surface">Pilih Aksi Nyata Paling Cocok Buatmu</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-1">Daftar sekarang untuk amankan slot partisipasi serta klaim poin Eco Score HijauIn.</p>
            </div>
            
            <!-- Filter Pill Chips -->
            <div class="flex items-center gap-space-xs bg-surface-container-high p-1 rounded-full shrink-0">
                <button class="px-space-md py-1.5 rounded-full bg-surface-container-lowest text-primary font-label-md text-label-md shadow-sm" type="button">Mendatang</button>
                <button class="px-space-md py-1.5 rounded-full text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button">Paling Populer</button>
                <button class="px-space-md py-1.5 rounded-full text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button">Gratis</button>
            </div>
        </div>

        <!-- 6-Card Event Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg">
            
            <!-- CARD 1 -->
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative h-48 w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A lively coastal beach cleanup event in Ancol Jakarta..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDoiEzR75mO8vAr4jl2aF4xqtmedp_Tj93JbwyQ6P8kHI6rYmkMh0PGjslvWa7C7tW4Td92dbPyQJDEWywQXn095jwUdwFKOChCy5m6RObwDu4V8bytih5cQFAosZ7P2IzmgxcuS0NPvIvumK-NQ3J8fS9FUIFFMJWgFcnwlibKusfYcZuMo2JifxkQgFtwXI5QHUbjOqveAonkEGhaFJQ7_exWtogR56S9261L908xpCv324iHbgFD"/>
                    <div class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">waves</span>
                        <span>Bersih Pantai</span>
                    </div>
                    <div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-md text-label-md px-2.5 py-1 rounded-full">
                        +150 Eco Poin
                    </div>
                </div>
                <div class="p-space-lg flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-space-sm text-outline font-label-md text-label-md mb-2">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">calendar_month</span>
                                24 Mei 2026
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
                                06:30 WIB
                            </span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
                            Bersih Pantai Ancol &amp; Edukasi Mikroplastik
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                            Aksi serentak membersihkan pesisir utara Jakarta disertai pemilahan sampah organik dan audit plastik sekali pakai.
                        </p>
                        <div class="flex items-center gap-1.5 text-tertiary font-body-sm text-body-sm mt-3">
                            <span class="material-symbols-outlined text-[18px] text-secondary">location_on</span>
                            <span class="truncate">Pantai Karnaval Ancol, Jakarta Utara</span>
                        </div>
                    </div>
                    <div class="pt-space-md mt-space-md bg-surface-container-low/50 -mx-space-lg px-space-lg pb-0">
                        <div class="flex justify-between items-center text-label-md mb-1.5">
                            <span class="text-tertiary">Kapasitas Peserta</span>
                            <span class="font-bold text-primary">125 / 150 Peserta</span>
                        </div>
                        <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container h-full rounded-full" style="width: 83%;"></div>
                        </div>
                        <div class="py-space-md flex items-center justify-between gap-space-sm">
                            <div>
                                <span class="block text-outline text-[11px] uppercase tracking-wider">Tiket</span>
                                <span class="font-headline-sm text-headline-sm text-primary">Gratis</span>
                            </div>
                            <button class="inline-flex items-center gap-1.5 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-lg py-2.5 rounded-full transition-all shadow-sm" type="button">
                                <span>Daftar Event</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative h-48 w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Indonesian community volunteers planting young green mangrove seedlings..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWLvVyWYyNPgFHxbTZ43KnHFB1evjK3LZVzHJ71micRJFPOa_mtBG7Dq_dgvnCMYiFtn5wTH5thjgleD9G8JJwKPxVOjfXtox53uVS2gNtJhzTej8Sf8weRP2Dp9BuP0W1rHfKIjMfaoOe2EG2AxjjeKWc_YPr1_7nzStGXCTVv1yWH2fK-rHsd5vPTF82ZNQTkoEPbT4rZ_xTqIh22GX3-n8ran2sl_ZtKrXiJGE3RH_42JXP6OKh"/>
                    <div class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">forest</span>
                        <span>Tanam Pohon</span>
                    </div>
                    <div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-md text-label-md px-2.5 py-1 rounded-full">
                        +200 Eco Poin
                    </div>
                </div>
                <div class="p-space-lg flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-space-sm text-outline font-label-md text-label-md mb-2">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">calendar_month</span>
                                12 Jun 2026
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
                                07:30 WIB
                            </span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
                            Tanam Pohon Mangrove Pesisir
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                            Restorasi sabuk hijau pelindung abrasi air laut dengan target penanaman 1.000 bibit mangrove bersama nelayan lokal.
                        </p>
                        <div class="flex items-center gap-1.5 text-tertiary font-body-sm text-body-sm mt-3">
                            <span class="material-symbols-outlined text-[18px] text-secondary">location_on</span>
                            <span class="truncate">Muara Gembong, Bekasi</span>
                        </div>
                    </div>
                    <div class="pt-space-md mt-space-md bg-surface-container-low/50 -mx-space-lg px-space-lg pb-0">
                        <div class="flex justify-between items-center text-label-md mb-1.5">
                            <span class="text-tertiary">Kapasitas Peserta</span>
                            <span class="font-bold text-primary">80 / 100 Peserta</span>
                        </div>
                        <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container h-full rounded-full" style="width: 80%;"></div>
                        </div>
                        <div class="py-space-md flex items-center justify-between gap-space-sm">
                            <div>
                                <span class="block text-outline text-[11px] uppercase tracking-wider">Tiket</span>
                                <span class="font-headline-sm text-headline-sm text-primary">Gratis</span>
                            </div>
                            <button class="inline-flex items-center gap-1.5 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-lg py-2.5 rounded-full transition-all shadow-sm" type="button">
                                <span>Daftar Event</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative h-48 w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Creative recycling workshop inside a modern bright studio..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCURtYynIldXfRw7GVyLL1sbp2OZ6n_MwL0274jf5kWwnUR6Tg3mIAZtOxxjsl_CEQvGf7jAmnEzoN2ja5Vtt11Udp1NVhBet2p8NTJlCL0yH3WcN52Hfgzpzs518eF3lc2G8N9d9-SFSFyytoSbMjjckHnou8bjjTxTNbg4Skaj3b81iuZg9LVgyRb2iHx9aMuSlwdy3qUXQo5vGF9GDu8GHbnHAx3Uw5veZ2yOQJyzc0fDYJ6VgGG"/>
                    <div class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">recycling</span>
                        <span>Daur Ulang</span>
                    </div>
                    <div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-md text-label-md px-2.5 py-1 rounded-full">
                        +120 Eco Poin
                    </div>
                </div>
                <div class="p-space-lg flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-space-sm text-outline font-label-md text-label-md mb-2">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">calendar_month</span>
                                21 Mei 2026
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
                                09:00 WIB
                            </span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
                            Workshop Daur Ulang Plastik Rumah Tangga
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                            Pelajari cara melebur sampah sachet dan tutup botol plastik HDPE menjadi coaster estetis dan pot tanaman estetik.
                        </p>
                        <div class="flex items-center gap-1.5 text-tertiary font-body-sm text-body-sm mt-3">
                            <span class="material-symbols-outlined text-[18px] text-secondary">location_on</span>
                            <span class="truncate">Bandung Creative Hub, Bandung</span>
                        </div>
                    </div>
                    <div class="pt-space-md mt-space-md bg-surface-container-low/50 -mx-space-lg px-space-lg pb-0">
                        <div class="flex justify-between items-center text-label-md mb-1.5">
                            <span class="text-tertiary">Kapasitas Peserta</span>
                            <span class="font-bold text-error">45 / 50 Peserta (Sisa 5)</span>
                        </div>
                        <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container h-full rounded-full" style="width: 90%;"></div>
                        </div>
                        <div class="py-space-md flex items-center justify-between gap-space-sm">
                            <div>
                                <span class="block text-outline text-[11px] uppercase tracking-wider">Tiket</span>
                                <span class="font-headline-sm text-headline-sm text-primary">Gratis</span>
                            </div>
                            <button class="inline-flex items-center gap-1.5 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-lg py-2.5 rounded-full transition-all shadow-sm" type="button">
                                <span>Daftar Event</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative h-48 w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A large group of happy urban cyclists riding bicycles..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBKbznCYq75RHwHdkI584zzJm-ed3Ov-bh4j7Y55RU7_npx4WhhVnTiLwYtGCS2T-vXiKPeHBNqqvr2uVstspk3CsVkeVJg2Z6Qo3qh4P_WQvCU7PUZCEsVo-fWalS510kvtLZm4b7w7WIjcFPaeHDmjNNzE-Ko-A4TjUeaD7dIS4_z7fRL_PsCFYV83BiEKNo_KTQeokmCMxyo6cpQTchHqYy0FvCbfLPpfEBzJ5kfhSVJfjZlgxf"/>
                    <div class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">directions_bike</span>
                        <span>Mobilitas Hijau</span>
                    </div>
                    <div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-md text-label-md px-2.5 py-1 rounded-full">
                        +100 Eco Poin
                    </div>
                </div>
                <div class="p-space-lg flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-space-sm text-outline font-label-md text-label-md mb-2">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">calendar_month</span>
                                28 Mei 2026
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
                                06:00 WIB
                            </span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
                            Gowes Sehat Bebas Emisi &amp; CFD Gathering
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                            Rute bersepeda 15KM mengkampanyekan transportasi rendah karbon, lengkap dengan pembagian 300 bibit tanaman gratis.
                        </p>
                        <div class="flex items-center gap-1.5 text-tertiary font-body-sm text-body-sm mt-3">
                            <span class="material-symbols-outlined text-[18px] text-secondary">location_on</span>
                            <span class="truncate">Bundaran HI - Sudirman, Jakarta</span>
                        </div>
                    </div>
                    <div class="pt-space-md mt-space-md bg-surface-container-low/50 -mx-space-lg px-space-lg pb-0">
                        <div class="flex justify-between items-center text-label-md mb-1.5">
                            <span class="text-tertiary">Kapasitas Peserta</span>
                            <span class="font-bold text-primary">210 / 300 Peserta</span>
                        </div>
                        <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container h-full rounded-full" style="width: 70%;"></div>
                        </div>
                        <div class="py-space-md flex items-center justify-between gap-space-sm">
                            <div>
                                <span class="block text-outline text-[11px] uppercase tracking-wider">Tiket</span>
                                <span class="font-headline-sm text-headline-sm text-primary">Gratis</span>
                            </div>
                            <button class="inline-flex items-center gap-1.5 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-lg py-2.5 rounded-full transition-all shadow-sm" type="button">
                                <span>Daftar Event</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 5 -->
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative h-48 w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Community garden workshop in Surabaya demonstrating home composting methods..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuACfMoNJLhkwUpbGflnsoXSl7Mn2RvFqX4Legr-Mad6CmChLw7CzoaKtrt2pFdHwMOPUNbUoq3orL8ZjqZW-2sRgnyofcOnlExh9WwzjgyMvjJyFdep2opBvO8DBcPZqYXDbe6xnP6dB3u-_MXfj1ObbMPz5H_gH-PxBAh70KeQkTrln2_Ag_2mGqIqEvvvXI_XpOlFSFNdjs6y_wUOQNoHliOL_bNXY2LkeC3Ihi36WsOD9xViYeJ-"/>
                    <div class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">compost</span>
                        <span>Zero Waste</span>
                    </div>
                    <div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-md text-label-md px-2.5 py-1 rounded-full">
                        +140 Eco Poin
                    </div>
                </div>
                <div class="p-space-lg flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-space-sm text-outline font-label-md text-label-md mb-2">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">calendar_month</span>
                                05 Jun 2026
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
                                08:30 WIB
                            </span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
                            Workshop Kompos Sampah Organik Rumahan
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                            Praktek langsung teknik takakura dan komposter ember tumpuk untuk mengatasi bau dan mengurangi sisa dapur ke TPA.
                        </p>
                        <div class="flex items-center gap-1.5 text-tertiary font-body-sm text-body-sm mt-3">
                            <span class="material-symbols-outlined text-[18px] text-secondary">location_on</span>
                            <span class="truncate">Kebun Bibit Wonorejo, Surabaya</span>
                        </div>
                    </div>
                    <div class="pt-space-md mt-space-md bg-surface-container-low/50 -mx-space-lg px-space-lg pb-0">
                        <div class="flex justify-between items-center text-label-md mb-1.5">
                            <span class="text-tertiary">Kapasitas Peserta</span>
                            <span class="font-bold text-error">35 / 40 Peserta (Sisa 5)</span>
                        </div>
                        <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container h-full rounded-full" style="width: 87.5%;"></div>
                        </div>
                        <div class="py-space-md flex items-center justify-between gap-space-sm">
                            <div>
                                <span class="block text-outline text-[11px] uppercase tracking-wider">Tiket</span>
                                <span class="font-headline-sm text-headline-sm text-primary">Gratis</span>
                            </div>
                            <button class="inline-flex items-center gap-1.5 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-lg py-2.5 rounded-full transition-all shadow-sm" type="button">
                                <span>Daftar Event</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD 6 -->
            <div class="group bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="relative h-48 w-full overflow-hidden bg-surface-container">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Indonesian environmental community volunteers standing along the clean grassy riverbank..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8lTLAQshIXj3OtF7HhGCkRgdvHuiBKHBM7ZF99OLA3oGnYuu6Xr34TY_utT5E0H2Et_BudZegB49D29r-abb8L3TI0JApUdbTmQMfF9ef9jwg524y673BYmW3IgQmLWI1jbUzVWBw8UZWKOsz9vrZT6h5wiV8ogzI_cg-Sd-m1lupqapPLTmGd8kxYD_OdYgdkXUnZArJR3NkQuIQofeU2-IQB8TARRJk1g_R5fbG3ZARn7Cv7ydT"/>
                    <div class="absolute top-3 left-3 bg-secondary-container text-on-secondary-container font-label-md text-label-md px-3 py-1 rounded-full flex items-center gap-1 shadow-sm">
                        <span class="material-symbols-outlined text-[14px]">water_drop</span>
                        <span>Konservasi Air</span>
                    </div>
                    <div class="absolute top-3 right-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary font-label-md text-label-md px-2.5 py-1 rounded-full">
                        +180 Eco Poin
                    </div>
                </div>
                <div class="p-space-lg flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-space-sm text-outline font-label-md text-label-md mb-2">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">calendar_month</span>
                                19 Jun 2026
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
                                07:00 WIB
                            </span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
                            Aksi Bersih Sungai Ciliwung Peduli Air
                        </h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-2 line-clamp-2">
                            Menyusuri bantaran sungai, membersihkan jeratan sampah plastik, dan sosialisasi pentingnya air bersih bagi warga sekitar.
                        </p>
                        <div class="flex items-center gap-1.5 text-tertiary font-body-sm text-body-sm mt-3">
                            <span class="material-symbols-outlined text-[18px] text-secondary">location_on</span>
                            <span class="truncate">Bantaran Ciliwung, Bogor &amp; Depok</span>
                        </div>
                    </div>
                    <div class="pt-space-md mt-space-md bg-surface-container-low/50 -mx-space-lg px-space-lg pb-0">
                        <div class="flex justify-between items-center text-label-md mb-1.5">
                            <span class="text-tertiary">Kapasitas Peserta</span>
                            <span class="font-bold text-primary">95 / 100 Peserta</span>
                        </div>
                        <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                            <div class="bg-primary-container h-full rounded-full" style="width: 95%;"></div>
                        </div>
                        <div class="py-space-md flex items-center justify-between gap-space-sm">
                            <div>
                                <span class="block text-outline text-[11px] uppercase tracking-wider">Tiket</span>
                                <span class="font-headline-sm text-headline-sm text-primary">Gratis</span>
                            </div>
                            <button class="inline-flex items-center gap-1.5 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-lg py-2.5 rounded-full transition-all shadow-sm" type="button">
                                <span>Daftar Event</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- Tutup grid-cols -->

        <!-- Load more button -->
        <div class="flex justify-center mt-space-md">
            <button class="inline-flex items-center gap-2 bg-surface-container-lowest hover:bg-surface-container-high text-primary font-label-lg text-label-lg px-space-xl py-space-sm rounded-full shadow-sm transition-all" type="button">
                <span class="material-symbols-outlined text-[20px]">expand_circle_down</span>
                <span>Muat Lebih Banyak Kegiatan</span>
            </button>
        </div>

    </div>
</section>

<!-- Interactive Map & Calendar Section -->
<section class="w-full bg-surface-container-low py-space-3xl">
    <div class="max-w-[1280px] mx-auto px-gutter">
        <div class="bg-surface-container-lowest rounded-2xl shadow-md p-space-xl grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
            
            <!-- Text & Filters -->
            <div class="lg:col-span-5 flex flex-col gap-space-md">
                <div class="inline-flex items-center gap-2 bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full w-fit">
                    <span class="material-symbols-outlined text-[16px]">map</span>
                    <span class="font-label-md text-label-md">Peta Aksi HijauIn</span>
                </div>
                <h2 class="font-headline-xl text-headline-xl text-on-surface">
                    Temukan Titik Kumpul Relawan di Sekitarmu
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    Lihat sebaran aksi lingkungan langsung di peta interaktif. Hubungi koordinator lapangan dan bergabunglah dengan posko terdekat.
                </p>
                <div class="space-y-space-sm pt-space-xs">
                    <div class="flex items-center gap-space-md p-space-sm bg-surface-container-low rounded-xl">
                        <div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold">1</div>
                        <div class="flex flex-col">
                            <span class="font-headline-sm text-headline-sm text-on-surface">DKI Jakarta &amp; Pesisir</span>
                            <span class="font-body-sm text-body-sm text-tertiary">5 Lokasi aktif minggu ini</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-space-md p-space-sm bg-surface-container-low rounded-xl">
                        <div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold">2</div>
                        <div class="flex flex-col">
                            <span class="font-headline-sm text-headline-sm text-on-surface">Jawa Barat (Bandung &amp; Bogor)</span>
                            <span class="font-body-sm text-body-sm text-tertiary">4 Workshop &amp; Aksi Sungai</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-space-md p-space-sm bg-surface-container-low rounded-xl">
                        <div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold">3</div>
                        <div class="flex flex-col">
                            <span class="font-headline-sm text-headline-sm text-on-surface">Jawa Timur (Surabaya)</span>
                            <span class="font-body-sm text-body-sm text-tertiary">3 Kampanye Urban Composting</span>
                        </div>
                    </div>
                </div>
                <div class="pt-space-xs">
                    <a class="inline-flex items-center gap-2 text-primary font-label-lg text-label-lg hover:underline" href="#">
                        <span>Buka tampilan peta layar penuh</span>
                        <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                    </a>
                </div>
            </div>

            <!-- Map Container -->
            <div class="lg:col-span-7 flex flex-col gap-space-sm">
                <div class="relative w-full h-[400px] rounded-2xl overflow-hidden shadow-sm" data-location="Jakarta, Indonesia" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD9Am0YkBlbrjJFWNGN-fINpEYFqKicCF6k-B3Sl8L01G115Ij2h8eXikwg2x9my9UcX1TVafSZFRINJkRW8Zli5VTXPyP5_f-IDGcQIaxrqPa-fN-nhQVguZ68IaVI8MQ64JFw88zAx_NcBYw3oUH1kYeqWueGSSQoxuawsrSUhN-qGilrcpwwVd13cOi86dIJfQ_TX94vNoKtQmFLOMD9SNgYeRHSU5K8BAELBBZHehhDBIZHtdc4')">
                    <div class="absolute inset-0 bg-primary/10 pointer-events-none"></div>
                    <div class="absolute top-1/4 left-1/3 bg-surface-container-lowest text-on-surface px-3 py-1.5 rounded-full shadow-lg flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary animate-ping"></span>
                        <span class="font-label-md text-label-md text-primary font-bold">Ancol (125 Peserta)</span>
                    </div>
                    <div class="absolute bottom-1/3 left-1/2 bg-surface-container-lowest text-on-surface px-3 py-1.5 rounded-full shadow-lg flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary-container"></span>
                        <span class="font-label-md text-label-md text-on-surface font-bold">Sudirman CFD</span>
                    </div>
                    <div class="absolute top-1/2 right-1/4 bg-surface-container-lowest text-on-surface px-3 py-1.5 rounded-full shadow-lg flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary-container"></span>
                        <span class="font-label-md text-label-md text-on-surface font-bold">Muara Gembong</span>
                    </div>
                </div>
                <span class="font-body-sm text-body-sm text-outline text-right">Data lokasi diperbarui secara realtime dari koordinator lapangan.</span>
            </div>

        </div>
    </div>
</section>

<!-- Community Testimonials Section -->
<section class="w-full py-space-3xl">
    <div class="max-w-[1280px] mx-auto px-gutter">
        <div class="flex flex-col items-center text-center mb-space-2xl">
            <span class="font-label-md text-label-md text-primary font-bold uppercase tracking-wider">Cerita Dari Lapangan</span>
            <h2 class="font-headline-xl text-headline-xl text-on-surface mt-1">Kata Mereka Tentang Aksi HijauIn</h2>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-xl mt-1">Pengalaman berkesan para pejuang lingkungan yang telah berpartisipasi langsung dalam aksi kami.</p>
        </div>
        
        <!-- Grid 3 Kolom yang Rapi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
            
            <!-- Testimonial 1 -->
            <div class="bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm flex flex-col justify-between">
                <p class="font-body-md text-body-md text-on-surface-variant italic">
                    "HijauIn selalu seru! Event bersih pantai bikin kita sadar betapa rawannya ekosistem laut akibat sampah plastik rumah tangga."
                </p>
                <div class="flex items-center gap-space-md mt-space-lg pt-space-md bg-surface-container-low/40 rounded-xl p-space-sm">
                    <img class="w-12 h-12 rounded-full object-cover shrink-0" data-alt="Portrait of Gina Putri..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgn10LiJRBE6jbDt0FK5srjZfj81e1WcBUSM1QrxcIQ-R6u-AENUHK3wUDHkdaFLzs0O5AzuAjdWaKR6c_rThuiDLssyemY6KAhKqxKfy4eahOEZ736gSp6fMik33Y1DFHOsPNPlf9c8c3VYSli0weY340uuGb_IU7Y5U-H6BkLnbs5WOhDVx-SH1ZrOfTBTTckL8S73GRbseHYRiqTIoIfkqzAeUpPhJ2vkp7X2P6T_OBTvQ2X_36"/>
                    <div class="flex flex-col min-w-0">
                        <span class="font-headline-sm text-headline-sm text-on-surface truncate">Gina Putri</span>
                        <div class="flex items-center text-primary-container text-[16px]">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm flex flex-col justify-between">
                <p class="font-body-md text-body-md text-on-surface-variant italic">
                    "Workshop daur ulangnya aplikatif banget! Sekarang saya bisa bikin tatakan gelas estetik dari tutup botol plastik di rumah."
                </p>
                <div class="flex items-center gap-space-md mt-space-lg pt-space-md bg-surface-container-low/40 rounded-xl p-space-sm">
                    <img class="w-12 h-12 rounded-full object-cover shrink-0" data-alt="Portrait of Budi Santoso..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNBpiqWAQMRC3HpAUn0lrincr9rN4Iykl2bxzi8sWcfRZ7-5thd92nJZv3_YHtX4kDeS17pnwbaV_XlNl8v0Q2-s10suNX0fYBzBl4uH4Je7NS28MH8qIAZ1D81zWhfQ1-CkKlDVYHHghBzQl8sNepAZiFW27OhonFsJ0qZLA99KBw4psa2LQxXxkBus0Fbjv32vIj4Z5zsK8Ydgk9Yy0jnl4HkgeqCA8v3v6M9LO0-8OwoZ5uJWj3"/>
                    <div class="flex flex-col min-w-0">
                        <span class="font-headline-sm text-headline-sm text-on-surface truncate">Budi Santoso</span>
                        <div class="flex items-center text-primary-container text-[16px]">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm flex flex-col justify-between">
                <p class="font-body-md text-body-md text-on-surface-variant italic">
                    "Aksi tanam mangrove di Muara Gembong bukan cuma dapat teman baru, tapi rasanya bangga bisa kontribusi nyata buat benteng pesisir."
                </p>
                <div class="flex items-center gap-space-md mt-space-lg pt-space-md bg-surface-container-low/40 rounded-xl p-space-sm">
                    <img class="w-12 h-12 rounded-full object-cover shrink-0" data-alt="Portrait of Sarah Amanda..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWj8Yeu2QuKkucdStW-JIcSgCchgrMavr3NpA9XYPdeK10gZiRdoQCbxEuw8GSBIROL4xcIJHp_Ykj-MIgfSASIXaW16qswO9PKUjFO0_eEGf6Qq_p6tZsfdoWtjHWr9x-o4X3-CwtM6JJZ9KNhULKBSzB6h5UF53yguhlv99iLq1kOwvV__Csvz2na9EQhwsYpTc7AS9_2-E1K-sMk1KpM_uv1-t8r5qUOnk9BRb7tNNkAeXkturT"/>
                    <div class="flex flex-col min-w-0">
                        <span class="font-headline-sm text-headline-sm text-on-surface truncate">Sarah Amanda</span>
                        <div class="flex items-center text-primary-container text-[16px]">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Community CTA Banner -->
<section class="w-full pb-space-3xl">
    <div class="max-w-[1280px] mx-auto px-gutter">
        <div class="bg-gradient-to-r from-secondary-container/80 via-surface-container-low to-secondary-container/40 rounded-2xl p-space-xl md:p-space-2xl flex flex-col md:flex-row items-center justify-between gap-space-xl">
            <div class="flex items-center gap-space-lg">
                <div class="hidden sm:block shrink-0">
                    <div class="w-24 h-24 rounded-full overflow-hidden shadow-md">
                        <img class="w-full h-full object-cover" data-alt="Group of passionate youth environmental activists..." src="https://lh3.googleusercontent.com/aida-public/AB6AXuApUHZLyuFsRjsICRhx3TmW91_Ul1O2rhaWZwvIKIVkyv2fsfgjVVWGp4LwhhRy5x8RHh8CKaP8X_esA4SVwdrrG68fWNj5SGbZCSYht-EdInEqqESVWgTq36-ZZK8GC9beyAU8OvcFPCizLii8UQbmTkk8XBh0Ye7JgEH79wrwMY2UzUuuXncmAsycgfVOHXzXlA9-1y6cx2PAfnWnHulRoPPADmZm9FuQs9g8ejtltvBJBSLf57Yt"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-headline-xl text-headline-xl text-on-surface leading-tight">
                        Yuk, adakan event hijau di kotamu!
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-xl">
                        Punya komunitas atau inisiatif lingkungan? Gandeng HijauIn untuk publikasi, manajemen pendaftaran peserta, dan integrasi poin Eco Score.
                    </p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-space-sm w-full md:w-auto shrink-0">
                <button class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg px-space-xl py-space-md rounded-full shadow-lg transition-all" type="button">
                    <span>Ajukan Event Komunitas</span>
                    <span class="material-symbols-outlined text-[18px]">add_circle</span>
                </button>
                <button class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-surface-container-lowest hover:bg-surface-container-high text-primary font-label-lg text-label-lg px-space-xl py-space-md rounded-full transition-all shadow-sm" type="button">
                    <span class="material-symbols-outlined text-[18px]">description</span>
                    <span>Panduan Penyelenggara</span>
                </button>
            </div>
        </div>
    </div>
</section>

<?php 
include '../includes/footer.php'; 
?>