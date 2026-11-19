<?php 
// 1. Panggil Header & Navbar
include '../../includes/header.php'; 
include '../../includes/navbar.php'; 
?>
<!DOCTYPE html><html lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Green Campus - Detail Komunitas | HijauIn</title>
<!-- Tailwind CSS CDN with Forms & Container Queries -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Google Fonts: Plus Jakarta Sans -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#f0fdf4',
              100: '#dcfce7',
              200: '#bbf7d0',
              500: '#22c55e',
              600: '#16a34a',
              700: '#15803d',
              800: '#166534',
              900: '#14532d',
              dark: '#0e3d23',
              deep: '#092917'
            }
          }
        }
      }
    }
  </script>
<style data-purpose="custom-typography">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: #1f2937;
      background-color: #fafbfc;
    }
  </style>
</head>
<!-- BEGIN: MainContent -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
<!-- Breadcrumb -->
<div class="mb-6">
<a class="inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-800 transition-colors" href="../komunitas/">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
<path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></path>
</svg>
        Kembali ke komunitas
      </a>
</div>
<!-- BEGIN: HeroCommunityHeader -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-10" data-purpose="community-hero-overview">
<!-- Left: Community Info Details -->
<div class="lg:col-span-5 space-y-5">
<!-- Community Avatar & Name -->
<div class="flex items-start gap-4">
<div class="w-16 h-16 rounded-2xl bg-brand-50 border border-brand-200 flex items-center justify-center shrink-0 shadow-inner">
<i class="w-9 h-9 text-brand-700" data-lucide="sprout"></i>
</div>
<div>
<h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 flex items-center gap-2">
              Green Campus
              <span class="text-xl">🍃</span>
</h1>
<p class="text-sm font-medium text-slate-500 flex items-center gap-1.5 mt-1">
<i class="w-4 h-4 text-brand-600" data-lucide="map-pin"></i>
              Surabaya, Jawa Timur
            </p>
</div>
</div>
<!-- Description Paragraph -->
<p class="text-slate-600 text-sm leading-relaxed">
          Komunitas mahasiswa yang bergerak dalam aksi lingkungan di kampus dan sekitarnya. Bersama kita ciptakan kampus hijau, bersih, dan berkelanjutan.
        </p>
<!-- Tags / Badges -->
<div class="flex flex-wrap gap-2 pt-1">
<span class="px-3.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">Edukasi</span>
<span class="px-3.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">Penghijauan</span>
<span class="px-3.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">Daur Ulang</span>
</div>
<!-- CTA Buttons -->
<div class="flex flex-wrap items-center gap-3 pt-2">
<button class="inline-flex items-center gap-2 px-6 py-3 bg-brand-900 hover:bg-brand-800 text-white text-sm font-semibold rounded-xl shadow-sm transition">
<span>Gabung Komunitas</span>
<i class="w-4 h-4" data-lucide="user-plus"></i>
</button>
<button class="inline-flex items-center gap-2 px-5 py-3 border border-slate-300 hover:border-slate-400 bg-white text-slate-700 text-sm font-semibold rounded-xl shadow-sm transition">
<span>Bagikan</span>
<i class="w-4 h-4" data-lucide="share-2"></i>
</button>
</div>
</div>
<!-- Right: Hero Banner with Floating Member Pill -->
<div class="lg:col-span-7 relative">
<div class="relative w-full h-[320px] sm:h-[380px] rounded-3xl overflow-hidden shadow-lg border border-slate-100 bg-slate-100">
<img alt="Relawan Green Campus menanam pohon bersama" class="w-full h-full object-cover object-center" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlvXAPxQS9u4bnLVU-u3epVdHSef-4mHy93QayCCauESnQyWMDJtHkXnFL2Y1-NUKkP6QrpBc29tTaQMz9tZcY45C8MNb7AyulqA5Pr7-G1PjVqhZggRdUbjE2MrO5YLFX0BP65hscWl-ACjhqLH7n8me3_yZkMD_GI9_VlTk66UWC3ATd0HgBwNGC9qGtBv-gd3rdY-jJjWvlb0-pr0nwjr4hi8gooQ9dcybD3SdixK6uFfFTs_Rt">
<div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
</main>
<!-- END: BreadcrumbBack -->

<?php
    include '../../includes/footer.php';
?>