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

<!-- Hero Section -->
<section class="w-full relative overflow-hidden bg-gradient-to-b from-surface-container-low via-surface to-surface-container-lowest pt-space-2xl pb-space-3xl">
<div class="max-w-[1280px] mx-auto px-gutter grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center relative z-10">
<!-- Text Side -->
<div class="lg:col-span-7 flex flex-col items-start gap-space-md">
<div class="inline-flex items-center gap-2 px-space-md py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md shadow-sm">
<span class="material-symbols-outlined text-[16px] text-primary" style="font-variation-settings: 'FILL' 1;">energy_savings_leaf</span>
<span>Panggilan Aksi Relawan Bumi</span>
</div>
<h1 class="font-display-hero text-headline-xl lg:text-display-hero text-on-surface tracking-tight leading-tight">
          Jadilah Bagian dari <span class="text-primary-container underline decoration-secondary-container decoration-wavy underline-offset-4">Perubahan Nyata</span> Sebagai Relawan HijauIn
        </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
          Luangkan waktu, energi, dan keahlianmu untuk memulihkan ekosistem. Dapatkan pengalaman kepemimpinan lapangan, jejaring aktivis muda, ribuan poin <strong class="text-primary font-semibold">Eco Score</strong>, serta sertifikat resmi berdampak global.
        </p>
<!-- CTA Buttons -->
<div class="flex flex-wrap items-center gap-space-md pt-space-xs">
<a class="inline-flex items-center gap-2 font-label-lg text-label-lg text-on-primary bg-primary px-space-xl py-3.5 rounded-full shadow-lg shadow-primary/20 hover:bg-on-primary-fixed-variant transition-all transform hover:-translate-y-0.5" href="#lowongan-aktif">
<span>Gabung Jadi Relawan</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
<a class="inline-flex items-center gap-2 font-label-lg text-label-lg text-primary bg-surface-container-lowest px-space-lg py-3.5 rounded-full shadow-sm hover:bg-secondary-container/40 transition-colors" href="#cara-kerja-relawan">
<span class="material-symbols-outlined text-[20px] text-primary">play_circle</span>
<span>Pelajari Alur Seleksi</span>
</a>
</div>
<!-- Social Proof Micro Badge -->
<div class="flex items-center gap-space-md pt-space-sm">
<div class="flex -space-x-3 overflow-hidden">
<img class="inline-block h-10 w-10 rounded-full ring-2 ring-surface-container-lowest object-cover" data-alt="Close up portrait of enthusiastic smiling Indonesian female eco-volunteer wearing green HijauIn hat in soft morning daylight." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBeVQe0WPp0b0qZ88UZdMI8rNFPob41SXYvbrKLpCedEkcsRPkNW4R-3rWvkNtnAD-FFrWEIXpTAD1AI6qd_xlctemKOJUi4tL-90Sb6MnRsp8ht9C5397f87C-Kezulk8ZY3OCE4Y-67V32UFa0MYFKwsJKCCAC9lwPqzVLtV1CQbo718iaRktmLqSQwaAWbX5PHEUx35P1uBuXe3nfrHWXg-mNE3hzns20_KObnQ3QiGCmTmet4jP"/>
<img class="inline-block h-10 w-10 rounded-full ring-2 ring-surface-container-lowest object-cover" data-alt="Portrait of young Southeast Asian male volunteer smiling outdoors with lush tropical trees background, wearing HijauIn volunteer jersey." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTwDIpRsDv4oY7o75vmi_rN4ptIO8dOYAXyJI5JvK-f2YQH-ohwZLB0OUr6fUbsvpNrcQJ0cIrYAM0c8PwIZAXE0jNFTkPX5bIyLI9GenMudPeRgWNUua0Em2wtiszczgpOgiitExdqKiNk6z7rXfvAzorBZ8Whz4yTEp3m-c8emkDM5RGznzS1jGNY_OuF-lZshQpRtmCbXNHDxLndRdCpKvheLTOvYRo7QrVz7RcUki62OcdiVdw"/>
<img class="inline-block h-10 w-10 rounded-full ring-2 ring-surface-container-lowest object-cover" data-alt="Warm portrait of young Indonesian female student volunteer smiling outdoors holding eco-friendly planting tote bag." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1JsIYegkO7SR090eAV9CknJfgznS_u414yP9RpZHa4_8lS78rel00QzMQmOabzj2XlCLIfpzxt6Snr1c7-AlOKrQHuX86EhZhUan0JGJ9AFwMMS3Sts5YTPAettTJ_32DfX-NICRD_V0cHuV7rpjWQIjDRn4pJ070GK0PJCjUX8Vch2aLDfDmGNjHFUdSRxLF7tHenG18tWP1jWakN9OdRfuz7Yj0a2bunnw-CyTR_P4TEPQY2to_"/>
<div class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-primary-container text-on-primary font-label-md text-label-md ring-2 ring-surface-container-lowest">
              +4k
            </div>
</div>
<div class="flex flex-col">
<div class="flex items-center text-amber-500">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="ml-1 text-on-surface font-label-md text-label-md">4.9 / 5.0</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Tergabung bersama <strong class="text-on-surface font-semibold">4.820+ Relawan</strong> aktif di 34 provinsi
            </p>
</div>
</div>
</div>
<!-- Hero Visual Art Side -->
<div class="lg:col-span-5 relative flex justify-center items-center">
<!-- Ambient Backing Shapes -->
<div class="absolute -top-10 -right-10 w-72 h-72 bg-secondary-container/50 rounded-full filter blur-3xl opacity-70 pointer-events-none"></div>
<div class="absolute -bottom-10 -left-10 w-64 h-64 bg-primary-container/20 rounded-full filter blur-2xl opacity-60 pointer-events-none"></div>
<!-- Visual Hero Composition -->
<div class="relative w-full max-w-[460px] rounded-lg overflow-hidden bg-surface-container-lowest shadow-2xl p-space-sm flex flex-col gap-space-sm">
<div class="relative w-full h-[320px] rounded-DEFAULT overflow-hidden">
<img class="w-full h-full object-cover" data-alt="Vibrant group of young Indonesian volunteers planting mangrove trees along the coast at golden hour, teamwork, joyful expressions, wearing green volunteer vests and gloves." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXo_u_vhKrWMz8hkRXBpAtSYyHGmOHNLB_VYAl013vyzKSwCEUTPHVIWizalIuackwG6aNw_voNDExwQvqKf5K3wYtQjvhCHDoWfPcIM5jcBqtTf0L2F7Zt3dopxRd36HXK6kzx27YxCicEtAjJVJcadqQPp72wA_pyOfMANJJgUvwafY8EiSpUch5y0u9haJSoQH_sNrqXG1j_L4-cbrSK4rGgcTRUJtewlRQx5f10WrTXIthlaGq"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-space-md">
<div class="flex items-center gap-space-sm text-white">
<span class="p-2 rounded-full bg-primary-container text-on-primary">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">nature_people</span>
</span>
<div>
<h4 class="font-headline-sm text-headline-sm text-white leading-tight">Misi Restorasi Pesisir</h4>
<p class="font-body-sm text-body-sm text-secondary-container">Jakarta Utara • 1.250 Bibit Tertanam</p>
</div>
</div>
</div>
</div>
<!-- Quick Stats Pills Inside Card -->
<div class="grid grid-cols-2 gap-space-xs p-space-xs">
<div class="bg-surface-container-low rounded-DEFAULT p-space-sm flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
<span class="material-symbols-outlined text-[22px]">workspace_premium</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-metric-num text-primary">100%</span>
<span class="font-body-sm text-label-md text-on-surface-variant">Sertifikat Digital</span>
</div>
</div>
<div class="bg-surface-container-low rounded-DEFAULT p-space-sm flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
<span class="material-symbols-outlined text-[22px]">military_tech</span>
</div>
<div class="flex flex-col">
<span class="font-headline-sm text-metric-num text-primary">+500</span>
<span class="font-body-sm text-label-md text-on-surface-variant">Eco Score Rata-rata</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Metric Strip -->
<section class="w-full -mt-8 relative z-20">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-surface-container-lowest rounded-lg shadow-xl shadow-primary/5 p-space-md grid grid-cols-2 md:grid-cols-4 gap-space-md items-center">
<div class="flex items-center gap-space-sm px-space-sm">
<div class="w-12 h-12 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">group</span>
</div>
<div class="flex flex-col">
<span class="font-headline-md text-headline-md text-on-surface">4.820+</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Relawan Terverifikasi</span>
</div>
</div>
<div class="flex items-center gap-space-sm px-space-sm">
<div class="w-12 h-12 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">task_alt</span>
</div>
<div class="flex flex-col">
<span class="font-headline-md text-headline-md text-on-surface">184 Misi</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Terselesaikan Sukses</span>
</div>
</div>
<div class="flex items-center gap-space-sm px-space-sm">
<div class="w-12 h-12 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">delete_sweep</span>
</div>
<div class="flex flex-col">
<span class="font-headline-md text-headline-md text-on-surface">94.500 Kg</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Sampah Terkelola</span>
</div>
</div>
<div class="flex items-center gap-space-sm px-space-sm">
<div class="w-12 h-12 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[24px]">park</span>
</div>
<div class="flex flex-col">
<span class="font-headline-md text-headline-md text-on-surface">32.400+</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Pohon Tertanam</span>
</div>
</div>
</div>
</div>
</section>
<!-- Section: Benefits of Volunteering (4 Feature Cards) -->
<section class="w-full pt-space-3xl pb-space-2xl bg-surface">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col items-center">
<div class="text-center max-w-2xl mb-space-2xl flex flex-col items-center gap-space-xs">
<span class="px-space-md py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md">
          Keuntungan Eksklusif
        </span>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-bold tracking-tight">
          Apa yang Kamu Dapatkan dari <span class="text-primary-container">HijauIn</span>?
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Menjadi relawan bukan sekadar menyumbangkan tenaga, melainkan membangun rekam jejak aksi keberlanjutan yang diakui secara profesional.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg w-full">
<!-- Benefit Card 1 -->
<div class="bg-surface-container-lowest rounded-lg p-space-xl flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
<div class="w-16 h-16 rounded-full bg-secondary-container/60 text-primary flex items-center justify-center mb-space-md">
<span class="material-symbols-outlined text-[32px]">hub</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Jejaring Luas</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Terhubung langsung dengan ratusan aktivis lingkungan, mentor keberlanjutan, NGO internasional, dan profesional ESG di Indonesia.
          </p>
</div>
<!-- Benefit Card 2 -->
<div class="bg-surface-container-lowest rounded-lg p-space-xl flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
<div class="w-16 h-16 rounded-full bg-secondary-container/60 text-primary flex items-center justify-center mb-space-md">
<span class="material-symbols-outlined text-[32px]">verified</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Sertifikat Resmi</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Sertifikat digital terverifikasi ber-barcode yang dapat disinkronkan ke profil LinkedIn dan portofolio beasiswa atau kariermu.
          </p>
</div>
<!-- Benefit Card 3 -->
<div class="bg-surface-container-lowest rounded-lg p-space-xl flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
<div class="w-16 h-16 rounded-full bg-secondary-container/60 text-primary flex items-center justify-center mb-space-md">
<span class="material-symbols-outlined text-[32px]">redeem</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Merchandise Eksklusif</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Paket starter kit ramah lingkungan: rompi relawan, tumbler bambu, tote bag daur ulang, dan pin pinjaman kehormatan HijauIn.
          </p>
</div>
<!-- Benefit Card 4 -->
<div class="bg-surface-container-lowest rounded-lg p-space-xl flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
<div class="w-16 h-16 rounded-full bg-secondary-container/60 text-primary flex items-center justify-center mb-space-md">
<span class="material-symbols-outlined text-[32px]">loyalty</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Bonus Eco Score</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Kumpulkan poin Eco Score hingga 1.000+ per misi untuk ditukarkan dengan voucer belanja organik, tiket seminar, dan reward mitra.
          </p>
</div>
</div>
</div>
</section>
<!-- Section: How to Become a Volunteer (5-Step Process matching reference wireframe) -->
<section class="w-full py-space-3xl bg-surface-container-low" id="cara-kerja-relawan">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col items-center">
<div class="text-center max-w-2xl mb-space-2xl flex flex-col items-center gap-space-xs">
<h2 class="font-headline-xl text-headline-xl text-on-surface font-bold tracking-tight">
          Cara Kerja Relawan <span class="text-primary-container">HijauIn</span>
</h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Alur pendaftaran transparan, cepat, dan terstruktur untuk memastikan kamu siap berkontribusi dengan aman dan maksimal.
        </p>
</div>
<!-- 5 Steps Flow -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-space-md w-full relative">
<!-- Step 1 -->
<div class="flex flex-col items-center text-center bg-surface-container-lowest rounded-lg p-space-lg shadow-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary font-headline-sm text-body-sm flex items-center justify-center mb-space-md shadow-md">
            1
          </div>
<div class="w-14 h-14 rounded-full bg-secondary-container/50 text-primary flex items-center justify-center mb-space-sm">
<span class="material-symbols-outlined text-[26px]">manage_search</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Pilih Program</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Pilih misi lingkungan yang selaras dengan minat, keahlian, dan lokasimu.
          </p>
</div>
<!-- Step 2 -->
<div class="flex flex-col items-center text-center bg-surface-container-lowest rounded-lg p-space-lg shadow-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary font-headline-sm text-body-sm flex items-center justify-center mb-space-md shadow-md">
            2
          </div>
<div class="w-14 h-14 rounded-full bg-secondary-container/50 text-primary flex items-center justify-center mb-space-sm">
<span class="material-symbols-outlined text-[26px]">how_to_reg</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Daftar &amp; Seleksi</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Isi formulir singkat ketersediaan jadwal serta motivasi kontribusimu.
          </p>
</div>
<!-- Step 3 -->
<div class="flex flex-col items-center text-center bg-surface-container-lowest rounded-lg p-space-lg shadow-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary font-headline-sm text-body-sm flex items-center justify-center mb-space-md shadow-md">
            3
          </div>
<div class="w-14 h-14 rounded-full bg-secondary-container/50 text-primary flex items-center justify-center mb-space-sm">
<span class="material-symbols-outlined text-[26px]">school</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Pelatihan Tim</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Ikuti sesi briefing dan SOP keselamatan kerja bersama koordinator.
          </p>
</div>
<!-- Step 4 -->
<div class="flex flex-col items-center text-center bg-surface-container-lowest rounded-lg p-space-lg shadow-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary font-headline-sm text-body-sm flex items-center justify-center mb-space-md shadow-md">
            4
          </div>
<div class="w-14 h-14 rounded-full bg-secondary-container/50 text-primary flex items-center justify-center mb-space-sm">
<span class="material-symbols-outlined text-[26px]">diversity_1</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Aksi Lapangan</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Terjun bersama relawan lainnya dalam aksi nyata menyelamatkan lingkungan.
          </p>
</div>
<!-- Step 5 -->
<div class="flex flex-col items-center text-center bg-surface-container-lowest rounded-lg p-space-lg shadow-sm relative group hover:-translate-y-1 transition-transform">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary font-headline-sm text-body-sm flex items-center justify-center mb-space-md shadow-md">
            5
          </div>
<div class="w-14 h-14 rounded-full bg-secondary-container/50 text-primary flex items-center justify-center mb-space-sm">
<span class="material-symbols-outlined text-[26px]">card_membership</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface mb-1">Sertifikat &amp; Poin</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Terima e-sertifikat resmi dan poin Eco Score masuk ke akunmu langsung.
          </p>
</div>
</div>
</div>
</section>
<!-- Section: Active Volunteer Openings (Detailed Card Grid) -->
<section class="w-full py-space-3xl bg-surface" id="lowongan-aktif">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col gap-space-2xl">
<!-- Section Header with Category Filter -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
<div>
<span class="px-space-md py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md">
            Peluang Berdampak
          </span>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-bold tracking-tight mt-space-xs">
            Lowongan Relawan Terbuka
          </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
            Pilih peran terbaik sesuai waktu dan panggilan hatimu. Pendaftaran ditutup saat kuota terpenuhi.
          </p>
</div>
<!-- Filters (Quick Tags) -->
<div class="flex items-center gap-space-xs flex-wrap">
<button class="px-space-md py-1.5 rounded-full bg-primary text-on-primary font-label-md text-label-md shadow-sm">Semua Peran</button>
<button class="px-space-md py-1.5 rounded-full bg-surface-container text-on-surface-variant font-label-md text-label-md hover:bg-secondary-container/50">Lapangan</button>
<button class="px-space-md py-1.5 rounded-full bg-surface-container text-on-surface-variant font-label-md text-label-md hover:bg-secondary-container/50">Edukasi</button>
<button class="px-space-md py-1.5 rounded-full bg-surface-container text-on-surface-variant font-label-md text-label-md hover:bg-secondary-container/50">Remote / Digital</button>
</div>
</div>
<!-- 4 Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-xl">
<!-- Card 1 -->
<div class="bg-surface-container-lowest rounded-lg p-space-lg shadow-sm hover:shadow-xl transition-all flex flex-col justify-between group">
<div class="flex flex-col gap-space-md">
<!-- Image & Badges -->
<div class="relative w-full h-48 rounded-DEFAULT overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Active environmental volunteers picking up plastic waste along ocean shore in Jakarta, bright clear sunny morning with trash bags and bamboo tongs." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCM0ZAmu-30fBe0hkst7OyHP8MAxVsGxvPwf_GRXrIwLKFu65s06Zh-3CesnvCiYXZJIYs0zjE-hxE6OMrR2uCK8RdsIM9Ff9mt40Wojh7cP01h5Talc8SSd98alj9H8NrSwF4iGfo8SUVJO7e8S_UOJhm7R98Rne6ApjD1JB0dOjQftKUVQnEDdrJSPZ5vXV72ZSJBV3Q9OKZai6xc4IBrFtJSBn3oQpfnVGqPTW86LhUYURiMRJHF"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-3 py-1 rounded-full bg-primary text-on-primary font-label-md text-label-md">Aksi Lapangan</span>
<span class="px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">star</span>
                  +600 Eco Score
                </span>
</div>
</div>
<!-- Title & Meta -->
<div>
<h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
                Koordinator Lapangan Bersih Pantai &amp; Pesisir
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Bertanggung jawab memandu tim relawan memilah mikroplastik, mendata volume sampah di aplikasi, dan memastikan keamanan di pesisir Ancol.
              </p>
</div>
<!-- Quick Specs Info -->
<div class="grid grid-cols-3 gap-2 bg-surface-container-low p-space-sm rounded-DEFAULT text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">location_on</span>
<span class="font-label-md text-label-md text-on-surface mt-1">DKI Jakarta</span>
<span class="text-[11px] text-on-surface-variant">Kepulauan Seribu</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">group</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Sisa 3 Kuota</span>
<span class="text-[11px] text-on-surface-variant">dari 10 Orang</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
<span class="font-label-md text-label-md text-on-surface mt-1">2 Pekan</span>
<span class="text-[11px] text-on-surface-variant">Sabtu &amp; Minggu</span>
</div>
</div>
<!-- Skills Pills -->
<div class="flex flex-wrap gap-1.5">
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Leadership</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Katalog Sampah</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">First-Aid Ringan</span>
</div>
</div>
<div class="pt-space-lg flex items-center justify-between">
<span class="font-label-md text-label-md text-tertiary">Batas: 28 Oktober 2025</span>
<button class="inline-flex items-center gap-1.5 px-space-lg py-2.5 rounded-full bg-primary-container text-on-primary font-label-lg text-label-lg hover:bg-primary transition-colors shadow-sm">
<span>Lamar Relawan</span>
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest rounded-lg p-space-lg shadow-sm hover:shadow-xl transition-all flex flex-col justify-between group">
<div class="flex flex-col gap-space-md">
<!-- Image & Badges -->
<div class="relative w-full h-48 rounded-DEFAULT overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Indonesian female youth volunteer joyfully teaching primary school children about sorting trash with illustrated colorful flashcards in classroom." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmAtWu7eIhQ4M0RaC8YemLwXoBfCZm8Qn46e22CiTE_nKN8-__wpyYD2nI1xUYpLmd-TUe9JfHKra8kwQ5Rriy9VHI49DOP1NDuL0gslsEnifmumb6i_v1SURIMW8og9D8jiwmLJ84NSejiG8qSTCLI0UWHQnImDqjJK49nFhb1JtHWASCMD2R48aAkJIKXW-BS95S2Y3_-DaNKm3M9ghROClhIggoqYiu4LpnnSAGDOfKQyC3jVZ7"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-3 py-1 rounded-full bg-secondary text-on-secondary font-label-md text-label-md">Edukasi Anak</span>
<span class="px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">star</span>
                  +500 Eco Score
                </span>
</div>
</div>
<!-- Title & Meta -->
<div>
<h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
                Fasilitator &amp; Edukator Cilik Lingkungan
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Mengajarkan kebiasaan 3R (Reuse, Reduce, Recycle) ke murid SD di Bandung melalui dongeng interaktif, kuis seru, dan lokakarya daur ulang sederhana.
              </p>
</div>
<!-- Quick Specs Info -->
<div class="grid grid-cols-3 gap-2 bg-surface-container-low p-space-sm rounded-DEFAULT text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">location_on</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Bandung</span>
<span class="text-[11px] text-on-surface-variant">Hybrid &amp; Sekolah</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">group</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Sisa 5 Kuota</span>
<span class="text-[11px] text-on-surface-variant">dari 15 Orang</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
<span class="font-label-md text-label-md text-on-surface mt-1">1 Bulan</span>
<span class="text-[11px] text-on-surface-variant">3 Hari / Pekan</span>
</div>
</div>
<!-- Skills Pills -->
<div class="flex flex-wrap gap-1.5">
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Public Speaking</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Storytelling</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Kreativitas</span>
</div>
</div>
<div class="pt-space-lg flex items-center justify-between">
<span class="font-label-md text-label-md text-tertiary">Batas: 30 Oktober 2025</span>
<button class="inline-flex items-center gap-1.5 px-space-lg py-2.5 rounded-full bg-primary-container text-on-primary font-label-lg text-label-lg hover:bg-primary transition-colors shadow-sm">
<span>Lamar Relawan</span>
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest rounded-lg p-space-lg shadow-sm hover:shadow-xl transition-all flex flex-col justify-between group">
<div class="flex flex-col gap-space-md">
<!-- Image & Badges -->
<div class="relative w-full h-48 rounded-DEFAULT overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Volunteer hands inspecting rich organic dark compost soil in a green urban farming greenhouse in Yogyakarta with herbs and seedlings." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiQgbakLElbz_I5i7f-PwzzbIm0NBx_vt2Bmy9AiYLHRozpNj5RNsnp9bzEh1l9rs21Z6C49bkZkI86v88tmINALWozWs1nL2NR-AT4aHEytiLUyIBTPmmFn17xxVtuLtaB6PHHreBJfcy9kJHkUIphbdnMu1d4RLtkW0Sj1lllhT6_5WJ8kKuxGzN5GVQQUnvDNzW7sGRrZIUurhLTQCqPs0RAGM0CNvu_47zIot8lRZ7F96RxCFo"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-3 py-1 rounded-full bg-primary text-on-primary font-label-md text-label-md">Komposting &amp; Agrikultur</span>
<span class="px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">star</span>
                  +550 Eco Score
                </span>
</div>
</div>
<!-- Title & Meta -->
<div>
<h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
                Spesialis Pengolahan Kompos &amp; Bank Sampah
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Membantu warga kampung binaan di Sleman mengolah limbah sisa makanan organik menjadi pupuk cair (POC) dan vermikompos berkualitas tinggi.
              </p>
</div>
<!-- Quick Specs Info -->
<div class="grid grid-cols-3 gap-2 bg-surface-container-low p-space-sm rounded-DEFAULT text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">location_on</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Yogyakarta</span>
<span class="text-[11px] text-on-surface-variant">Sleman Timur</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">group</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Sisa 2 Kuota</span>
<span class="text-[11px] text-on-surface-variant">dari 8 Orang</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
<span class="font-label-md text-label-md text-on-surface mt-1">3 Pekan</span>
<span class="text-[11px] text-on-surface-variant">Akhir Pekan</span>
</div>
</div>
<!-- Skills Pills -->
<div class="flex flex-wrap gap-1.5">
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Urban Farming</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Pengomposan</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Pendampingan Warga</span>
</div>
</div>
<div class="pt-space-lg flex items-center justify-between">
<span class="font-label-md text-label-md text-tertiary">Batas: 5 November 2025</span>
<button class="inline-flex items-center gap-1.5 px-space-lg py-2.5 rounded-full bg-primary-container text-on-primary font-label-lg text-label-lg hover:bg-primary transition-colors shadow-sm">
<span>Lamar Relawan</span>
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-lowest rounded-lg p-space-lg shadow-sm hover:shadow-xl transition-all flex flex-col justify-between group">
<div class="flex flex-col gap-space-md">
<!-- Image & Badges -->
<div class="relative w-full h-48 rounded-DEFAULT overflow-hidden">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Young content creator filming documentary footage with a mirrorless camera and microphone outdoors in nature park, documentary filmmaking." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCs7xjFVwZvLKkSu74AiYWxxUIST5alnoeGM8C97qoS1Fv9K8M-9mJhsGNpMNScceE5jS-cBgbYyTpSGBiPtMCkQGoC2YlS_7gskGmjtHQfcj9HMePE7vEw5cxpMPprOImCwUs9Rm7VpqMFZ-Im1I0VAEmm0cU7GyC2Y7DASCOmTK4C3qFjQr0jn84ZFm_F6q3KZWw6_s2SY7XNJMaU6zR0YbSc-mKgXJBvcuoV2uZULZrNX7dALnx8"/>
<div class="absolute top-3 left-3 flex gap-2">
<span class="px-3 py-1 rounded-full bg-tertiary text-on-tertiary font-label-md text-label-md">Remote &amp; Media</span>
<span class="px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm text-primary font-label-md text-label-md flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">star</span>
                  +450 Eco Score
                </span>
</div>
</div>
<!-- Title & Meta -->
<div>
<h3 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
                Content Creator &amp; Storyteller Aksi Hijau
              </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                Membuat video reels, TikTok edukatif, dan dokumentasi foto aksi lapangan HijauIn untuk menginspirasi generasi muda bergerak.
              </p>
</div>
<!-- Quick Specs Info -->
<div class="grid grid-cols-3 gap-2 bg-surface-container-low p-space-sm rounded-DEFAULT text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">location_on</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Fleksibel / Remote</span>
<span class="text-[11px] text-on-surface-variant">Surabaya / Online</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">group</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Sisa 1 Kuota</span>
<span class="text-[11px] text-on-surface-variant">dari 5 Orang</span>
</div>
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
<span class="font-label-md text-label-md text-on-surface mt-1">Fleksibel</span>
<span class="text-[11px] text-on-surface-variant">4 Jam / Pekan</span>
</div>
</div>
<!-- Skills Pills -->
<div class="flex flex-wrap gap-1.5">
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">CapCut / Premiere</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Copywriting</span>
<span class="text-[12px] bg-secondary-container/50 text-on-secondary-container px-2.5 py-0.5 rounded-full">Fotografi HP</span>
</div>
</div>
<div class="pt-space-lg flex items-center justify-between">
<span class="font-label-md text-label-md text-tertiary">Batas: 10 November 2025</span>
<button class="inline-flex items-center gap-1.5 px-space-lg py-2.5 rounded-full bg-primary-container text-on-primary font-label-lg text-label-lg hover:bg-primary transition-colors shadow-sm">
<span>Lamar Relawan</span>
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</section>
<!-- Section: Volunteer Spotlight & Real Stories (Testimonials) -->
<section class="w-full py-space-3xl bg-surface-container-low">
<div class="max-w-[1280px] mx-auto px-gutter flex flex-col items-center">
<div class="text-center max-w-2xl mb-space-2xl flex flex-col items-center gap-space-xs">
<span class="px-space-md py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md">
          Cerita Sahabat Bumi
        </span>
<h2 class="font-headline-xl text-headline-xl text-on-surface font-bold tracking-tight">
          Apa Kata Mereka yang Sudah Terjun?
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Dengarkan kisah langsung dari mahasiswa, profesional, dan penggiat alam yang memulai langkahnya lewat program volunteer HijauIn.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg w-full">
<!-- Story Card 1 -->
<div class="bg-surface-container-lowest rounded-lg p-space-xl shadow-sm flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center gap-1 text-amber-500">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">
              "Awalnya cuma iseng daftar buat isi akhir pekan. Ternyata atmosfer kegiatannya sangat rapi, SOP safety ketat, dan teman-temannya saling menyemangati. Eco Score yang didapat juga langsung terpakai!"
            </p>
</div>
<div class="flex items-center gap-space-sm pt-space-xs">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Warm smiling headshot of young Indonesian female university student in clean casual attire." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBc_YigaoCHUY0rFTLxW3Gd04L7CY86DXnJLq7c1GA3UNi6ZvV1tBhNWlD81AdGXRlLEYFu-LXDHeI2HhI8BBVmymeZrUFsMiDEiVR1L85XOCSAmy8ohKnOQUbdU-zqH4798bWeDNioYJKT1_0Z0CnWLd1f6CGzLObbqgROXQec85BtE6Yx0WaOoGkYHFrlsCD1_oxICJTZtpEfPk9PMZvmxSJL_93JZh4RHj0suVIz8aiVa_qq-WUb"/>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">Annisa Pramesti</span>
<span class="font-body-sm text-body-sm text-tertiary">Relawan Restorasi Mangrove 2024</span>
</div>
</div>
</div>
<!-- Story Card 2 -->
<div class="bg-surface-container-lowest rounded-lg p-space-xl shadow-sm flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center gap-1 text-amber-500">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">
              "Sertifikat resmi dari HijauIn sangat membantu waktu aku melamar beasiswa magang ESG. Pihak penyeleksi menghargai keterlibatan nyata dalam pengelolaan sampah terintegrasi."
            </p>
</div>
<div class="flex items-center gap-space-sm pt-space-xs">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Portrait of Indonesian young male professional wearing casual polo shirt smiling outdoors with lush greenery." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCj7sGAKRnjiORclraRCljb5Nk8ApeNzakuDufQb-ZriOHobbUf51x1Vgu-84kHZOcrW-MxXjMvjn-Hn15hclMd7Dz8HR0-m-Fta6nUb0j19jUJbmvmWpIHc7nOmBHclXHUTSw14Sxxzkcy4a5bqZKWGZRtpcpF_A0uUzyLW8klq8Q4X6gp19faux3kx3ZFxqrC9XJEZClFvoN9vO1RHTr21zftBe8F0knFqNlyF8VVF_pGQZqNteab"/>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">Reza Mahardika</span>
<span class="font-body-sm text-body-sm text-tertiary">Fasilitator Bank Sampah Sleman</span>
</div>
</div>
</div>
<!-- Story Card 3 -->
<div class="bg-surface-container-lowest rounded-lg p-space-xl shadow-sm flex flex-col justify-between gap-space-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center gap-1 text-amber-500">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic">
              "Bikin konten video lingkungan bersama tim HijauIn bikin aku paham bahwa advokasi bumi bisa dikemas secara fun, tidak kaku, dan mudah dimengerti anak muda di TikTok."
            </p>
</div>
<div class="flex items-center gap-space-sm pt-space-xs">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Creative young Southeast Asian creator holding camera outdoor sunny morning smiling friendly." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDR_8yff90DhY7lkUog6uwOtVcvsxm6VbW3MYqw9DZ1eG-13oxvRZZh_II2lO-vae4MWBAXhabySqx9bwEa3u54YYa_LIuA8iIEMnG9WqyMiYGhRKw4tuy9OBC1MG5sX0zQ7krTAE1rbxRTJsfkJVa-8HZyr8krtZ33Xs6pJ5jJYRC6Dh4nkwuw3MM6GJgIDrLiC7Z-qpPuZ6UWu2ae6zRknox4H_eRqFmbHb2FtlqgbX9KUgazaoJf"/>
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-on-surface">Nadira Zahra</span>
<span class="font-body-sm text-body-sm text-tertiary">Dokumenter &amp; Kreator Hijau</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Section: Volunteer FAQ Accordion (Interactive Vanilla JS) -->
<section class="w-full py-space-3xl bg-surface">
<div class="max-w-[860px] mx-auto px-gutter flex flex-col items-center">
<div class="text-center mb-space-xl flex flex-col items-center gap-space-xs">
<h2 class="font-headline-lg text-headline-lg text-on-surface font-bold tracking-tight">
          Pertanyaan Seputar Relawan
        </h2>
<p class="font-body-md text-body-md text-on-surface-variant">
          Punya keraguan sebelum mendaftar? Simak jawaban atas pertanyaan umum di bawah ini.
        </p>
</div>
<div class="w-full flex flex-col gap-space-sm" id="faq-accordion">
<div class="bg-surface-container-low rounded-DEFAULT overflow-hidden transition-all faq-item">
<button class="w-full p-space-md text-left flex items-center justify-between font-headline-sm text-headline-sm text-on-surface faq-btn">
<span>Apakah ada biaya untuk bergabung sebagai relawan?</span>
<span class="material-symbols-outlined transition-transform duration-200 faq-icon">expand_more</span>
</button>
<div class="px-space-md pb-space-md font-body-sm text-body-sm text-on-surface-variant hidden faq-content">
            Sama sekali tidak ada biaya. Program relawan HijauIn 100% gratis. Peserta bahkan mendapatkan starter kit merchandise, konsumsi saat aksi lapangan, asuransi kegiatan, dan sertifikat resmi.
          </div>
</div>
<div class="bg-surface-container-low rounded-DEFAULT overflow-hidden transition-all faq-item">
<button class="w-full p-space-md text-left flex items-center justify-between font-headline-sm text-headline-sm text-on-surface faq-btn">
<span>Apakah saya bisa menjadi relawan jika jadwal saya padat?</span>
<span class="material-symbols-outlined transition-transform duration-200 faq-icon">expand_more</span>
</button>
<div class="px-space-md pb-space-md font-body-sm text-body-sm text-on-surface-variant hidden faq-content">
            Tentu saja! Kami memiliki program akhir pekan (hanya hari Sabtu/Minggu) serta program remote/digital yang fleksibel dari rumah seperti content creation dan kampanye online.
          </div>
</div>
<div class="bg-surface-container-low rounded-DEFAULT overflow-hidden transition-all faq-item">
<button class="w-full p-space-md text-left flex items-center justify-between font-headline-sm text-headline-sm text-on-surface faq-btn">
<span>Bagaimana sertifikat relawan diterbitkan?</span>
<span class="material-symbols-outlined transition-transform duration-200 faq-icon">expand_more</span>
</button>
<div class="px-space-md pb-space-md font-body-sm text-body-sm text-on-surface-variant hidden faq-content">
            Setelah menyelesaikan misi dan divalidasi oleh koordinator, sertifikat digital langsung otomatis diterbitkan di dasbor profil HijauIn lengkap dengan QR Code verifikasi unik.
          </div>
</div>
<div class="bg-surface-container-low rounded-DEFAULT overflow-hidden transition-all faq-item">
<button class="w-full p-space-md text-left flex items-center justify-between font-headline-sm text-headline-sm text-on-surface faq-btn">
<span>Apakah ada batasan usia untuk mendaftar?</span>
<span class="material-symbols-outlined transition-transform duration-200 faq-icon">expand_more</span>
</button>
<div class="px-space-md pb-space-md font-body-sm text-body-sm text-on-surface-variant hidden faq-content">
            Sebagian besar program ditujukan untuk rentang usia 17 hingga 35 tahun. Untuk peserta di bawah 17 tahun, dibutuhkan surat izin orang tua/wali sebelum bergabung di lapangan.
          </div>
</div>
</div>
</div>
</section>
<!-- Bottom CTA Card (Direct replica matching the reference banner style) -->
<section class="w-full py-space-3xl bg-surface-container-low">
<div class="max-w-[1280px] mx-auto px-gutter">
<div class="bg-surface-container-lowest rounded-xl shadow-xl shadow-primary/5 p-space-xl md:p-space-2xl grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center relative overflow-hidden">
<!-- Circle Photo Cluster on Left -->
<div class="lg:col-span-4 flex justify-center items-center relative">
<div class="relative w-48 h-48 md:w-56 md:h-56 rounded-full overflow-hidden shadow-lg ring-8 ring-secondary-container/40">
<img class="w-full h-full object-cover" data-alt="Inspiring circular portrait of diverse Indonesian youth volunteers holding hands around miniature globe, smiling happily, unity in green environmental action." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsnh8XPB1AfE7yYbT_C7cxta_d38DCRBG3aNpwMPxjBdimGmAQDqLPGEmEM28nLe8phZ6ywAvlbyERhCePl-zUsXtVylj4BkFXZPfW7n0Zl-U2DpxSgPvWaREEML6LTYQo2iBHmxfm19Rr7-1xEqmK5NnSwLWWhTiSxOpp9vJpxYI3yDqCq7IL082zL_7SGtpSjbG0DVfvAVi4MP_whG1SKbYnpjKBsecynd5fbkXmWeluMvGKjeKi"/>
<div class="absolute bottom-2 left-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-primary text-on-primary font-label-md text-label-md text-nowrap shadow-md">
              Aksi Nyata
            </div>
</div>
</div>
<!-- Copy & Action on Right -->
<div class="lg:col-span-8 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-space-lg">
<div class="flex flex-col gap-space-xs max-w-lg">
<h3 class="font-headline-xl text-headline-xl text-on-surface font-bold tracking-tight leading-snug">
              Siap Berkontribusi Nyata untuk Masa Depan Bumi?
            </h3>
<p class="font-body-md text-body-md text-on-surface-variant">
              Bersama HijauIn, ciptakan lingkungan Indonesia yang lebih bersih, sehat, dan berkelanjutan. Langkah kecilmu berarti besar bagi generasi esok.
            </p>
</div>
<div class="flex flex-col sm:flex-row lg:flex-col gap-space-sm w-full lg:w-auto shrink-0">
<a class="inline-flex items-center justify-center gap-2 font-label-lg text-label-lg text-on-primary bg-primary px-space-xl py-3.5 rounded-full shadow-lg shadow-primary/20 hover:bg-on-primary-fixed-variant transition-all text-center" href="#lowongan-aktif">
<span>Daftar Relawan Sekarang</span>
<span class="material-symbols-outlined text-[18px]">check_circle</span>
</a>
<a class="inline-flex items-center justify-center gap-2 font-label-lg text-label-lg text-primary bg-surface-container-low px-space-lg py-3 rounded-full hover:bg-secondary-container/60 transition-colors text-center" data-path="faq" href="#">
<span class="material-symbols-outlined text-[18px]">help</span>
<span>Pusat Bantuan Relawan</span>
</a>
</div>
</div>
</div>
</div>
</section>
<!-- Interactive Accordion Script -->
<script>
    document.querySelectorAll('.faq-btn').forEach(button => {
      button.addEventListener('click', () => {
        const item = button.closest('.faq-item');
        const content = item.querySelector('.faq-content');
        const icon = item.querySelector('.faq-icon');
        const isOpen = !content.classList.contains('hidden');

        // Close all items
        document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
        document.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotate-180'));

        if (!isOpen) {
          content.classList.remove('hidden');
          icon.classList.add('rotate-180');
        }
      });
    });
  </script>
</div>

<?php 
include '../includes/footer.php'; 
?>
