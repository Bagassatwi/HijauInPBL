<?php 
// 1. Panggil Header & Navbar
include '../../includes/header.php'; 
include '../../includes/navbar.php'; 
?>

<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Kurangi Plastik Sekali Pakai dalam 7 Hari | HijauIn</title>

<!-- Tailwind CSS CDN with plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
    tailwind.config = {
      theme: {
        extend: {
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
              dark: '#063c28',
              darker: '#042c1e'
            }
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
          }
        }
      }
    }
  </script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<style data-purpose="typography">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
  </style>
<style data-purpose="custom-decorations">
    /* Subtle timeline vertical dashed connector */
    .timeline-line {
      position: absolute;
      left: 27px;
      top: 36px;
      bottom: 36px;
      width: 2px;
      background: repeating-linear-gradient(to bottom, #86efac 0, #86efac 6px, transparent 6px, transparent 12px);
    }
  </style>
</head>
<body class="bg-gray-50/40 text-slate-800 antialiased">
<!-- BEGIN: MainContent -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
<!-- Breadcrumb -->
<div class="mb-6">
<a class="inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-800 transition-colors" href="#">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
<path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></path>
</svg>
        Kembali ke Edukasi
      </a>
</div>
<!-- Article Header & Meta -->
<header class="mb-8 max-w-4xl">
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-[1.2] mb-4">
            Kurangi Plastik Sekali Pakai dalam 7 Hari <span class="inline-block">🍃</span>
    </h1>
    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 font-medium">
    <span class="px-3.5 py-1 bg-brand-100/70 text-brand-800 font-semibold rounded-full text-xs tracking-wide">Tips</span>
        <div class="flex items-center gap-1.5">
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
        <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    </svg>
    <span>12 Mei 2024</span>
    </div>
    <span class="w-1.5 h-1.5 bg-gray-300 rounded-full"></span>
    <div class="flex items-center gap-1.5">
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24">
        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    </svg>
    <span>5 menit baca</span>
    </div>
</div>
</header>
<!-- Hero Banner Image with Graphic Overlay -->
<section class="relative mb-12 rounded-3xl overflow-hidden shadow-lg aspect-[16/9] md:aspect-[21/8] bg-emerald-900">
<img alt="Reusable eco products canvas bag, bottle, glass meal box" class="w-full h-full object-cover object-center opacity-85" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBp5yawSAP8mC5NOLs7syn8FBmTEIADm39exqWKl28spMlYECYFD53Yhf4FP8pavYy61b4091VDXfnNVH9ij5XyKtTR0cS2dQOkV3UouScyyGD-tgAOHAoU1oCCQQ9hkZXcNIPnnJ0lSfu2S_5YsM0KvT73h6f_nOUByrLp4AyjCIQRgiH1y-qGUT3FwDCs30rt-WNNWFubpYlWObUIfv4jUQXoj51affMD0dcxdL3QEWbnpEDZE1X"/>
<div class="absolute inset-0 bg-gradient-to-r from-emerald-950/70 via-emerald-900/40 to-transparent flex items-center p-8 md:p-14">
<div class="max-w-md">
<h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight drop-shadow-sm">
            7 hari kecil, <br/>dampak besar <br/><span class="text-emerald-300">untuk bumi kita.</span>
</h2>
</div>
</div>
</section>
<!-- Main Two-Column Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
<!-- BEGIN: LeftColumn (Article Body) -->
<article class="lg:col-span-8">
<!-- Intro Paragraph -->
<p class="text-base md:text-lg text-slate-700 leading-relaxed mb-8 font-normal">
          Plastik sekali pakai membutuhkan ratusan tahun untuk terurai dan mencemari lingkungan kita. Yuk, ikuti tantangan 7 hari ini untuk mengurangi penggunaan plastik dan mulai hidup lebih hijau!
        </p>
<!-- 7-Day Timeline Container -->
<div class="relative pl-2 pb-6 space-y-6">
<div class="timeline-line"></div>
<!-- Hari 1 -->
<div class="relative flex items-start gap-4 group">
<div class="relative z-10 w-12 h-12 rounded-full bg-brand-50 border-2 border-brand-500 flex items-center justify-center flex-shrink-0 text-brand-700 shadow-sm transition-transform group-hover:scale-110">
<!-- Botol Minum Icon -->
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
<path d="M10 2h4"></path>
<path d="M10 5h4"></path>
<path d="M9 8h6v12a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2Z"></path>
</svg>
</div>
<div class="pt-1.5">
<h3 class="text-base font-bold text-slate-900">Hari 1 – Bawa Botol Minum Sendiri</h3>
<p class="text-sm text-slate-600 mt-1 leading-relaxed">Biasakan membawa botol minum isi ulang ke mana pun kamu pergi.</p>
</div>
</div>
<!-- Hari 2 -->
<div class="relative flex items-start gap-4 group">
<div class="relative z-10 w-12 h-12 rounded-full bg-brand-50 border-2 border-brand-500 flex items-center justify-center flex-shrink-0 text-brand-700 shadow-sm transition-transform group-hover:scale-110">
<!-- Tolak Sedotan Icon -->
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
<circle cx="12" cy="12" r="10"></circle>
<path d="m4.93 4.93 14.14 14.14"></path>
</svg>
</div>
<div class="pt-1.5">
<h3 class="text-base font-bold text-slate-900">Hari 2 – Tolak Sedotan Plastik</h3>
<p class="text-sm text-slate-600 mt-1 leading-relaxed">Gunakan sedotan stainless atau tanpa sedotan. Bumi akan berterima kasih!</p>
</div>
</div>
<!-- Hari 3 -->
<div class="relative flex items-start gap-4 group">
<div class="relative z-10 w-12 h-12 rounded-full bg-brand-50 border-2 border-brand-500 flex items-center justify-center flex-shrink-0 text-brand-700 shadow-sm transition-transform group-hover:scale-110">
<!-- Tas Belanja Icon -->
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
<path d="M3 6h18"></path>
<path d="M16 10a4 4 0 0 1-8 0"></path>
</svg>
</div>
<div class="pt-1.5">
<h3 class="text-base font-bold text-slate-900">Hari 3 – Bawa Tas Belanja Sendiri</h3>
<p class="text-sm text-slate-600 mt-1 leading-relaxed">Tas kain lebih kuat, bisa dipakai berulang kali, dan ramah lingkungan.</p>
</div>
</div>
<!-- Hari 4 -->
<div class="relative flex items-start gap-4 group">
<div class="relative z-10 w-12 h-12 rounded-full bg-brand-50 border-2 border-brand-500 flex items-center justify-center flex-shrink-0 text-brand-700 shadow-sm transition-transform group-hover:scale-110">
<!-- Daun/Produk Icon -->
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
<path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
<path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
</svg>
</div>
<div class="pt-1.5">
<h3 class="text-base font-bold text-slate-900">Hari 4 – Pilih Produk Tanpa Plastik</h3>
<p class="text-sm text-slate-600 mt-1 leading-relaxed">Pilih produk dengan kemasan ramah lingkungan atau isi ulang.</p>
</div>
</div>
<!-- Hari 5 -->
<div class="relative flex items-start gap-4 group">
<div class="relative z-10 w-12 h-12 rounded-full bg-brand-50 border-2 border-brand-500 flex items-center justify-center flex-shrink-0 text-brand-700 shadow-sm transition-transform group-hover:scale-110">
<!-- Wadah Makan Icon -->
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
<rect height="12" rx="2" width="18" x="3" y="8"></rect>
<path d="M7 4h10"></path>
<path d="M12 4v4"></path>
</svg>
</div>
<div class="pt-1.5">
<h3 class="text-base font-bold text-slate-900">Hari 5 – Gunakan Wadah Makan Sendiri</h3>
<p class="text-sm text-slate-600 mt-1 leading-relaxed">Bawa kotak makan sendiri untuk mengurangi styrofoam dan plastik.</p>
</div>
</div>
<!-- Hari 6 -->
<div class="relative flex items-start gap-4 group">
<div class="relative z-10 w-12 h-12 rounded-full bg-brand-50 border-2 border-brand-500 flex items-center justify-center flex-shrink-0 text-brand-700 shadow-sm transition-transform group-hover:scale-110">
<!-- Kantong Plastik Larangan Icon -->
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
<path d="M5 9c0-.8.6-1.5 1.4-1.6l2.1-.3c.8-.1 1.5-.9 1.5-1.7V4a2 2 0 0 1 4 0v1.4c0 .8.7 1.6 1.5 1.7l2.1.3c.8.1 1.4.8 1.4 1.6v10a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V9Z"></path>
<line x1="4" x2="20" y1="4" y2="20"></line>
</svg>
</div>
<div class="pt-1.5">
<h3 class="text-base font-bold text-slate-900">Hari 6 – Hindari Kantong Plastik</h3>
<p class="text-sm text-slate-600 mt-1 leading-relaxed">Biasakan menolak kantong plastik saat berbelanja.</p>
</div>
</div>
<!-- Hari 7 -->
<div class="relative flex items-start gap-4 group">
<div class="relative z-10 w-12 h-12 rounded-full bg-brand-50 border-2 border-brand-500 flex items-center justify-center flex-shrink-0 text-brand-700 shadow-sm transition-transform group-hover:scale-110">
<!-- Evaluasi/Share Icon -->
<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24">
<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
<circle cx="9" cy="7" r="4"></circle>
<path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
</svg>
</div>
<div class="pt-1.5">
<h3 class="text-base font-bold text-slate-900">Hari 7 – Evaluasi dan Bagikan</h3>
<p class="text-sm text-slate-600 mt-1 leading-relaxed">Lihat perubahan kecil yang kamu buat dan ajak orang lain untuk melakukan hal yang sama!</p>
</div>
</div>
</div>
<!-- Callout Banner with Motivational Quote -->
<div class="mt-8 relative overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-50 to-green-100/70 p-6 sm:p-7 border border-emerald-200/60 shadow-sm flex items-center justify-between">
<div class="relative z-10 flex items-start gap-4">
<div class="w-10 h-10 rounded-full bg-emerald-600/10 flex items-center justify-center flex-shrink-0 text-emerald-700">
<svg class="w-6 h-6" fill="currentColor" viewbox="0 0 24 24">
<path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A9.49 9.49 0 0 0 12 21c7 0 11-8 11-8a18.25 18.25 0 0 0-6-5m-5 11c-2.85 0-5.13-1.63-6.17-3.46C7.57 12 10.45 9.77 15.7 8.54c-.29 3.25-1.57 8.46-3.7 10.46"></path>
</svg>
</div>
<div>
<p class="text-sm sm:text-[15px] font-semibold text-emerald-950 leading-relaxed">
                Perubahan besar dimulai dari langkah-langkah kecil yang kita lakukan setiap hari.
              </p>
<p class="text-xs sm:text-sm text-emerald-800/80 mt-1">
                Yuk, terus konsisten untuk masa depan bumi yang lebih baik!
              </p>
</div>
</div>
<!-- Plant Deco on right side -->
<div class="hidden sm:block opacity-25 flex-shrink-0">
<svg class="w-24 h-24 text-emerald-700" fill="currentColor" viewbox="0 0 24 24">
<path d="M12 2L9.5 8.5L3 11L9.5 13.5L12 20L14.5 13.5L21 11L14.5 8.5L12 2Z"></path>
</svg>
</div>
</div>
</article>
<!-- END: LeftColumn -->
<!-- BEGIN: RightColumn (Sidebar) -->
<aside class="lg:col-span-4 space-y-8">
<!-- Author Profile Card -->
<div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
<h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Penulis</h4>
<div class="flex items-center gap-3.5">
<div class="w-12 h-12 rounded-full border-2 border-emerald-500 bg-brand-50 flex items-center justify-center text-brand-700 shadow-sm">
<svg class="w-6 h-6" fill="currentColor" viewbox="0 0 24 24">
<path d="M17 8C8 10 5.9 16.17 3.82 21.34L5.71 22l1-2.3A9.49 9.49 0 0 0 12 21c7 0 11-8 11-8a18.25 18.25 0 0 0-6-5m-5 11c-2.85 0-5.13-1.63-6.17-3.46C7.57 12 10.45 9.77 15.7 8.54c-.29 3.25-1.57 8.46-3.7 10.46"></path>
</svg>
</div>
<div>
<div class="flex items-center gap-1.5">
<h5 class="text-base font-bold text-slate-900">Tim HijauIn</h5>
<span class="w-4 h-4 bg-emerald-600 text-white rounded-full flex items-center justify-center text-[10px] font-bold">✓</span>
</div>
<p class="text-xs text-gray-500 mt-0.5 leading-snug">Bersama menebar inspirasi untuk hidup lebih hijau.</p>
</div>
</div>
</div>
<!-- Social Share Section -->
<div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
<h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Bagikan Artikel</h4>
<div class="flex items-center gap-3">
<!-- WhatsApp -->
<button aria-label="Share on WhatsApp" class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-colors flex items-center justify-center shadow-xs">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24">
<path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.19 8.19 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24"></path>
</svg>
</button>
<!-- Facebook -->
<button aria-label="Share on Facebook" class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-colors flex items-center justify-center shadow-xs">
<svg class="w-5 h-5 fill-current" viewbox="0 0 24 24">
<path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95"></path>
</svg>
</button>
<!-- Twitter/X -->
<button aria-label="Share on Twitter" class="w-10 h-10 rounded-full bg-sky-50 text-sky-500 hover:bg-sky-500 hover:text-white transition-colors flex items-center justify-center shadow-xs">
<svg class="w-4 h-4 fill-current" viewbox="0 0 24 24">
<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
</svg>
</button>
<!-- Copy Link -->
<button aria-label="Copy Article Link" class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-700 hover:text-white transition-colors flex items-center justify-center shadow-xs">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
<path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
</button>
</div>
</div>
<!-- Artikel Terkait List -->
<div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
<h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Artikel Terkait</h4>
<div class="space-y-4">
<!-- Item 1 -->
<a class="flex gap-3.5 group" href="#">
<img alt="Jenis sampah daur ulang" class="w-20 h-16 rounded-xl object-cover flex-shrink-0 group-hover:opacity-90 transition-opacity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIsB9DpddTXojsdGy0Lb4FkzPJi2DVKFaV9aGxUNVaj_sM5RUyRGu74pHq7mjC673sTfNPznyGJNz16q0YxWiuuBpwXlQrSHq1yZjmB4qBV3OhT3ymv-HZ87Q3x46CH9c6NhGoruxn4W0qcZ3EH35U39w53s0x9QvtoJ5_FGQER3Ab_XNF--pQbkRq3oWTnZkYbr81iZtgVjkQuKSXZonop_W_3_mWMs3gG0fITMjzuV8CcIA8wPkO"/>
<div>
<h5 class="text-sm font-bold text-slate-900 group-hover:text-brand-700 transition-colors leading-snug line-clamp-2">
                  Mengenal Jenis Sampah dan Cara Mengelolanya
                </h5>
<span class="inline-flex items-center gap-1 text-[11px] text-gray-400 mt-1 font-medium">
<svg class="w-3 h-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                  5 menit baca
                </span>
</div>
</a>
<!-- Item 2 -->
<a class="flex gap-3.5 group" href="#">
<img alt="Eco energy lamp" class="w-20 h-16 rounded-xl object-cover flex-shrink-0 group-hover:opacity-90 transition-opacity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3F-2jJtWW9DNF458GMEK6E702jhu7nz9l5YrMczd2NZacie4dgyGfIYS3EKa9GrdXjQkWCenrnKBTpPtFDWMyWsPOkV_hFGTOusx4oD0uRzAVyFWa6NxfTu6q4R1W3DjKuX0I1ojg03Vgk2Dyb_rxB3jR3UPRzibc28k7n_5l2JPvWKDuavSQIIjfc_CBQ5nAss0_3z-IDputofOYYKEOyG5Jmlw_FyqmF43f6PLuZ9Jy2w7BpBrE"/>
<div>
<h5 class="text-sm font-bold text-slate-900 group-hover:text-brand-700 transition-colors leading-snug line-clamp-2">
                  10 Cara Hemat Energi di Rumah
                </h5>
<span class="inline-flex items-center gap-1 text-[11px] text-gray-400 mt-1 font-medium">
<svg class="w-3 h-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                  4 menit baca
                </span>
</div>
</a>
<!-- Item 3 -->
<a class="flex gap-3.5 group" href="#">
<img alt="Penyu laut dan terumbu karang" class="w-20 h-16 rounded-xl object-cover flex-shrink-0 group-hover:opacity-90 transition-opacity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuASZ_K9bLduV6x3lIVrOebHRkozIJVB7lcvtHWKxLeJl3grcZfm1N8TyeKKurnGkewmX7wd0ZALGtk-41FfMuRG0GSqwsTMKsybFn3EnpA0n02_PGSl6vvveLDXwr8hflaYyYWQ19KZTiCmmE2s0KcGP77-ELOhVZEsEXK3A7pN82y3q2SUK_w1Le0EK4Fzhj1MBUX1kbwvy-gy4op1W8yDSV_bhIAXX3G0hmlnnCvIu4f7qsFkwQs9"/>
<div>
<h5 class="text-sm font-bold text-slate-900 group-hover:text-brand-700 transition-colors leading-snug line-clamp-2">
                  Pentingnya Menjaga Ekosistem Laut
                </h5>
<span class="inline-flex items-center gap-1 text-[11px] text-gray-400 mt-1 font-medium">
<svg class="w-3 h-3" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                  6 menit baca
                </span>
</div>
</a>
</div>
</div>
<!-- Community Call to Action Card -->
<div class="rounded-3xl bg-gradient-to-br from-emerald-100/80 via-emerald-50 to-white p-6 border border-emerald-200/50 shadow-sm relative overflow-hidden">
<h4 class="text-lg font-extrabold text-emerald-950 leading-snug">
            Yuk, jadi bagian dari perubahan!
          </h4>
<p class="text-xs sm:text-sm text-emerald-800/90 mt-2 mb-5 leading-relaxed">
            Setiap langkah kecil yang kamu ambil hari ini, membawa perubahan besar untuk masa depan bumi.
          </p>
<a class="inline-flex items-center justify-center gap-2 w-full py-3 px-4 bg-brand-800 hover:bg-brand-900 text-white font-bold text-sm rounded-xl transition-all shadow-md" href="#">
            Gabung Komunitas
            <svg class="w-4 h-4" fill="currentColor" viewbox="0 0 20 20">
<path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
</svg>
</a>
<!-- Graphic representation of sprout & globe -->
<div class="mt-4 flex justify-center opacity-90">
<svg class="w-24 h-24 text-emerald-600" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 24 24">
<circle cx="12" cy="12" fill="#e6f7ec" r="9" stroke="currentColor"></circle>
<path d="M12 17v-8m0 0l-3 3m3-3l3 3" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
</aside>
<!-- END: RightColumn -->
</div>
<!-- BEGIN: ArtikelLainnya -->
<section class="mt-16 pt-12 border-t border-gray-200">
<div class="flex items-center justify-between mb-8">
<h3 class="text-2xl font-bold text-slate-900 tracking-tight">Artikel Lainnya</h3>
<a class="text-sm font-bold text-brand-700 hover:text-brand-800 flex items-center gap-1 group" href="#">
          Lihat Semua 
          <span class="transition-transform group-hover:translate-x-0.5">→</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Card 1 -->
<article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-shadow group flex flex-col">
<div class="relative h-44 overflow-hidden">
<img alt="Menanam pohon" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCM0H4p9g-pQh15lXN9jTUIeOltIm_HRAVYOA3a9D2sstP_SfZrIYZDvdSyPVzsCvkg0dMtdCJALtW7wKPZyVqCvx_n5tQmGgpzSqun-yqQDY5Dkul4JEpyvsIJMNrllSaTWbHrthuYi7icFGsn2Rnc5NljJRs0aNe-ofgcoXKd1GJ89O7HwPcykOKS1ICB63a__SKC0PTuxWhuV5qXHUB50pQfckJ87RTcBT0uCA3v6PaJDNOnT2zQ"/>
<span class="absolute top-3 left-3 bg-brand-700/90 backdrop-blur-xs text-white text-[11px] font-bold px-3 py-1 rounded-full">
              Edukasi
            </span>
</div>
<div class="p-5 flex-1 flex flex-col justify-between">
<h4 class="text-base font-bold text-slate-900 group-hover:text-brand-700 transition-colors leading-snug mb-3">
              Manfaat Menanam Pohon untuk Lingkungan
            </h4>
<div class="flex items-center gap-1.5 text-xs text-gray-400 font-medium pt-2 border-t border-gray-50">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span>6 menit baca</span>
</div>
</div>
</article>
<!-- Card 2 -->
<article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-shadow group flex flex-col">
<div class="relative h-44 overflow-hidden">
<img alt="Pesisir pantai bersih" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtlhumuupS6Q4Unb2fM_e0h9tU3qwT1ebd84eNFj3xWoY805y3BcaDTbPkQu99vFw2g6fXGRDfM36vtQnjmFXCFl4TF1P0TJ4Kq5gFqx6siPZiY374Slqu2-qpUC4A_Kf_lMCyVn9nsurRhUNzq2iuUkoZ65o81Vp1QMIrYl98xXid3qaVN3i371W4sSPoWLy6g4kJg2WU-eJagFa8BUFcV3Bw_oFMVwadNLbZITx4OaGHr91lLntn"/>
<span class="absolute top-3 left-3 bg-brand-700/90 backdrop-blur-xs text-white text-[11px] font-bold px-3 py-1 rounded-full">
              Tips
            </span>
</div>
<div class="p-5 flex-1 flex flex-col justify-between">
<h4 class="text-base font-bold text-slate-900 group-hover:text-brand-700 transition-colors leading-snug mb-3">
              5 Tips Mengurangi Sampah di Pantai
            </h4>
<div class="flex items-center gap-1.5 text-xs text-gray-400 font-medium pt-2 border-t border-gray-50">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span>4 menit baca</span>
</div>
</div>
</article>
<!-- Card 3 -->
<article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-shadow group flex flex-col">
<div class="relative h-44 overflow-hidden">
<img alt="Daur ulang sampah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzgVHb6hzRrIj-LyPLCRzTRXB6ChHSyOxCTQ5Ht07ZvMqCu5WO5Uto6YQ-K7m_Yr4Z4GR6IQlprCM_GTvoPSl-vbKGi0UrgcI6kGexciiYfDK0nwe7D5GnKirWpH4PcW0p2ld2j6ZaYvXlmFGWSJoHr9BRmINZpfzSJQpNtmACFw4ZWX8QmScoSCOdF5CznJ_F62OQGxNtUTSiLlGXaRN2fulJ178qKa1lSdFwkKcNXE622b1diRX_"/>
<span class="absolute top-3 left-3 bg-brand-700/90 backdrop-blur-xs text-white text-[11px] font-bold px-3 py-1 rounded-full">
              Edukasi
            </span>
</div>
<div class="p-5 flex-1 flex flex-col justify-between">
<h4 class="text-base font-bold text-slate-900 group-hover:text-brand-700 transition-colors leading-snug mb-3">
              Daur Ulang: Langkah Kecil Dampak Besar
            </h4>
<div class="flex items-center gap-1.5 text-xs text-gray-400 font-medium pt-2 border-t border-gray-50">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span>5 menit baca</span>
</div>
</div>
</article>
</div>
</section>
<!-- END: ArtikelLainnya -->
</main>
<!-- END: MainContent -->
<!-- Footer -->
<?php
    include '../../includes/footer.php';
?>

<?php
echo ($_GET['detail']);



