<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aksi Tanam 1.000 Pohon di Bukit Hijau - HijauIn</title>
    <!-- Tailwind CSS CDN with plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Font Awesome CDN for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <!-- Tailwind Configuration for HijauIn Brand Colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        hijau: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                            950: '#022c22',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style data-purpose="base-styling">
        body {
            background-color: #f8fafc;
            color: #1e293b;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-800 antialiased">
    <?php
    // 1. Panggil Header & Navbar
    include '../../includes/header.php';
    include '../../includes/navbar.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/connection.php';
    ?>
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        <!-- BEGIN: BackButton -->
        <div>
            <a class="inline-flex items-center gap-2 text-sm font-semibold text-hijau-800 hover:text-hijau-900 transition-colors group"
                href="../komunitas/">
                <i class="fa-solid fa-arrow-left text-xs transition-transform group-hover:-translate-x-1"></i>
                <span>Kembali ke Kegiatan</span>
            </a>
        </div>
        <!-- END: BackButton -->
        <!-- BEGIN: MainHeroCard -->
        <section class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm" data-purpose="event-hero">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 flex flex-col justify-between h-full">
                    <div>
                        <!-- Icon Avatar Badge -->
                        <div
                            class="w-16 h-16 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-hijau-700 mb-6 shadow-inner">
                            <i class="fa-solid fa-seedling text-3xl text-hijau-600"></i>
                        </div>
                        <!-- Event Title & Leaf Indicator -->
                        <div class="flex items-center gap-2 mb-2">
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                                Aksi Tanam 1.000 Pohon di Bukit Hijau
                            </h1>
                            <i class="fa-solid fa-leaf text-hijau-600 text-2xl"></i>
                        </div>
                        <!-- Event Location -->
                        <div class="flex items-center gap-2 text-gray-500 text-sm font-medium mb-4">
                            <i class="fa-solid fa-location-dot text-hijau-600"></i>
                            <span>Sentul Eco Park, Bogor, Jawa Barat</span>
                        </div>
                        <!-- Description -->
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6">
                            Aksi restorasi lereng gundul Sentul bersama relawan untuk menanam 1.000 bibit pohon endemik
                            guna mencegah erosi dan menjaga kestabilan daerah tangkapan air Jabodetabek. Mari
                            berkontribusi nyata untuk masa depan bumi.
                        </p>
                        <!-- Category Badges / Tags -->
                        <div class="flex flex-wrap gap-2.5 mb-8">
                            <span
                                class="px-3.5 py-1 text-xs font-medium text-emerald-800 bg-emerald-50 border border-emerald-200/80 rounded-full">Konservasi</span>
                            <span
                                class="px-3.5 py-1 text-xs font-medium text-emerald-800 bg-emerald-50 border border-emerald-200/80 rounded-full">Reboisasi</span>
                            <span
                                class="px-3.5 py-1 text-xs font-medium text-emerald-800 bg-emerald-50 border border-emerald-200/80 rounded-full">Penanaman
                                Pohon</span>
                            <span
                                class="px-3.5 py-1 text-xs font-medium text-emerald-800 bg-emerald-50 border border-emerald-200/80 rounded-full">Gratis
                                Partisipasi</span>
                        </div>
                    </div>
                    <!-- Action Row: Buttons & Participant Avatars -->
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 pt-4 border-t border-gray-50">
                        <div class="flex flex-wrap items-center gap-3">
                            <button
                                class="px-6 py-2.5 bg-hijau-900 hover:bg-hijau-800 text-white font-medium text-sm rounded-xl inline-flex items-center gap-2 shadow-sm transition-all">
                                <span>Daftar Jadi Relawan</span>
                                <i class="fa-solid fa-user-plus text-xs"></i>
                            </button>
                            <button
                                class="px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 font-medium text-sm rounded-xl border border-gray-200 inline-flex items-center gap-2 transition-all">
                                <span>Bagikan</span>
                                <i class="fa-solid fa-share-nodes text-xs text-gray-500"></i>
                            </button>
                        </div>
                        <!-- Enrolled Relawan Counter with Avatars -->
                        <div class="flex items-center gap-3">
                            <div class="flex -space-x-2.5 overflow-hidden">
                                <img alt="Relawan 1"
                                    class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBeFyB-SS1eaXzTQc22546EKl5hJ3sHtwOSu7AQh5ywiYSoJc68zY-BTsrC7lxiuatJDaWrNNgzgqVIdmZ3UMDi4K9P-0l_TGq8jZrNKlo0wFECBMDTFdtdt-fcb1MlGQ9pioQOmRnoTpgtplZEiW4xzbjDoukVxNtqOIf5SzoSyx346lOyc5dnmnGCYJBV92OZV2xVwX_VLfOJCKeFZ1J4OzDIzRRBVJvc6p0Yuoo">
                                <img alt="Relawan 2"
                                    class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbwdybnIUqxGth67i6MH709xgACIoI7tuLqKNAiGAy7kZVmF-B1BkgscQf4czcSo2QNzwq2_BIlQdIrshsbKrA3-Q8GRxCL3Z37ST3UtQ8p8S-sMkQDYHsblpBJw7PoEK2CKEojX_11Fi5naS8RY5a0hmv2gojyPP3l1iMipvrrO8loEeG27FbjqMzDLEtJqMZKWTWnXcmkE8KDl0Bm4WJH-G9ml3Oo1Ny4XhawJk">
                                <img alt="Relawan 3"
                                    class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsNyTI0U05TuqbaQ29c9T-wz7Efnc7RLRHTyTrUU27PRhHX6JRlZKsm0N-LD5hpgriI5COlKanAy6VgJTcTs8ji1MjBPoSXUaZbKypxLiBzizgv6bpbiYGFyb19v70_qmJKYN5n4Lo1NAGoHj6nAfc_F-198Fz-bfzelEKwXhag5ithAj8k-yUvFs04pV4-E-MNvYj-JhKwYgMT6yNC_ELaUTOY96TO7NmSXabMqU">
                            </div>
                            <div>
                                <span class="block text-sm font-bold text-gray-900 leading-tight">380+</span>
                                <span class="block text-[11px] text-gray-500 leading-tight">Relawan Terdaftar</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right side image -->
                <div class="lg:col-span-5 h-full flex items-center justify-center">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAznOtZ4vyirtOjqWGj8RCVvoIcWsnl3i29I7VQB-kvVoduhvtSrU-pjS3Qfk9Lb80ZBX3cWiIcpELpbJ38cunFNH-elA7mVQ26rnuah9mAPPTK-PuHLGClXRgUKKOf4smfJkpOgIYYrzqP5PNAOm3-P_Kwph65iry_L_9zwk7lHuuf5wKlWMM-I9nCFOj8PYp0RodoT0Aq4FFjSXK73y-Z2tHGbUu-QJlA84ihPN8"
                        alt="Kegiatan Aksi Penanaman Pohon di Bukit Hijau Sentul"
                        class="w-full h-72 md:h-80 lg:h-full object-cover rounded-2xl shadow-sm border border-gray-100">
                </div>
            </div>
        </section>
        <!-- BEGIN: QuickStatsBar -->
        <section class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 md:p-6" data-purpose="quick-metrics">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:divide-x md:divide-gray-100">
                <!-- Stat Item 1 -->
                <div class="flex items-center gap-3.5 md:px-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-emerald-50 text-hijau-700 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-tree text-lg"></i>
                    </div>
                    <div>
                        <div class="text-base sm:text-lg font-bold text-gray-900 leading-tight">1.000+</div>
                        <div class="text-xs text-gray-500">Pohon Ditanam</div>
                    </div>
                </div>
                <!-- Stat Item 2 -->
                <div class="flex items-center gap-3.5 md:px-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-emerald-50 text-hijau-700 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-award text-lg"></i>
                    </div>
                    <div>
                        <div class="text-base sm:text-lg font-bold text-gray-900 leading-tight">120 EcoPoint</div>
                        <div class="text-xs text-gray-500">Aksi Terverifikasi</div>
                    </div>
                </div>
                <!-- Stat Item 3 -->
                <div class="flex items-center gap-3.5 md:px-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-emerald-50 text-hijau-700 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-earth-asia text-lg"></i>
                    </div>
                    <div>
                        <div class="text-base sm:text-lg font-bold text-gray-900 leading-tight">2,4 Ha</div>
                        <div class="text-xs text-gray-500">Area Restorasi</div>
                    </div>
                </div>
                <!-- Stat Item 4 -->
                <div class="flex items-center gap-3.5 md:px-4">
                    <div
                        class="w-10 h-10 rounded-xl bg-emerald-50 text-hijau-700 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-users-line text-lg"></i>
                    </div>
                    <div>
                        <div class="text-base sm:text-lg font-bold text-gray-900 leading-tight">450 Slot</div>
                        <div class="text-xs text-gray-500">Kapasitas Relawan</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: QuickStatsBar -->
        <!-- BEGIN: MainContentGrid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <!-- LEFT COLUMN (2/3 width on desktop) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Card: Tentang Kegiatan -->
                <section class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm"
                    data-purpose="about-event">
                    <div class="flex items-center gap-2 mb-4">
                        <h2 class="text-xl font-bold text-gray-900">Tentang Kegiatan</h2>
                        <i class="fa-solid fa-leaf text-hijau-600"></i>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Aksi Tanam 1.000 Pohon ini merupakan inisiatif kolaborasi antara Komunitas HijauIn, kelompok
                        pecinta alam, dan masyarakat lokal Sentul. Penanaman difokuskan pada area bukit kritis untuk
                        mencegah potensi longsor di musim hujan, memulihkan kanopi vegetasi alami, serta memperluas
                        habitat satwa burung lokal. Seluruh bibit disiapkan secara organik dan akan didampingi
                        pemantauannya selama 12 bulan ke depan.
                    </p>
                    <!-- 4 Meta Boxes Grid -->
                    <div
                        class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-gray-50/70 p-4 rounded-2xl border border-gray-100">
                        <!-- Item 1: Tanggal -->
                        <div>
                            <div class="flex items-center gap-1.5 text-xs text-hijau-800 font-semibold mb-1">
                                <i class="fa-regular fa-calendar"></i>
                                <span>Tanggal</span>
                            </div>
                            <div class="text-xs font-semibold text-gray-900">Minggu, 25 Juni 2026</div>
                        </div>
                        <!-- Item 2: Waktu -->
                        <div>
                            <div class="flex items-center gap-1.5 text-xs text-hijau-800 font-semibold mb-1">
                                <i class="fa-regular fa-clock"></i>
                                <span>Waktu</span>
                            </div>
                            <div class="text-xs font-semibold text-gray-900">07.00 - 12.00 WIB</div>
                        </div>
                        <!-- Item 3: Titik Kumpul -->
                        <div>
                            <div class="flex items-center gap-1.5 text-xs text-hijau-800 font-semibold mb-1">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>Titik Kumpul</span>
                            </div>
                            <div class="text-xs font-semibold text-gray-900">Basecamp Eco Park</div>
                        </div>
                        <!-- Item 4: Kuota Sisa -->
                        <div>
                            <div class="flex items-center gap-1.5 text-xs text-hijau-800 font-semibold mb-1">
                                <i class="fa-solid fa-ticket"></i>
                                <span>Sisa Kuota</span>
                            </div>
                            <div class="text-xs font-semibold text-emerald-700">70 Slot Tersisa</div>
                        </div>
                    </div>
                </section>
                <!-- Card: Rundown & Jadwal Aksi -->
                <section class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm"
                    data-purpose="event-schedule">
                    <div class="flex items-center gap-2 mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Rundown &amp; Jadwal Aksi</h2>
                        <i class="fa-solid fa-leaf text-hijau-600"></i>
                    </div>
                    <!-- Schedule Row List -->
                    <div class="space-y-4">
                        <!-- Schedule 1 -->
                        <div
                            class="flex items-center justify-between p-3.5 rounded-2xl hover:bg-gray-50 border border-gray-100 transition-colors">
                            <div class="flex items-center gap-3.5">
                                <div
                                    class="w-14 h-14 bg-emerald-900 text-white rounded-xl flex flex-col items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                    <span>07:00</span>
                                    <span class="text-[9px] font-normal text-emerald-200">WIB</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900 leading-snug">Kumpul &amp; Registrasi
                                        Ulang Relawan</h3>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 mt-0.5">
                                        <i class="fa-solid fa-location-dot text-[10px] text-gray-400"></i>
                                        <span>Basecamp Sentul Eco Park, Bogor</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-0.5">
                                        <i class="fa-regular fa-clock text-[10px]"></i>
                                        <span>07.00 – 07.30 WIB (30 Menit)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden sm:flex items-center gap-2 text-xs text-gray-500">
                                <span
                                    class="px-2.5 py-1 bg-gray-100 rounded-md font-medium text-gray-600">Check-in</span>
                            </div>
                        </div>
                        <!-- Schedule 2 -->
                        <div
                            class="flex items-center justify-between p-3.5 rounded-2xl hover:bg-gray-50 border border-gray-100 transition-colors">
                            <div class="flex items-center gap-3.5">
                                <div
                                    class="w-14 h-14 bg-emerald-900 text-white rounded-xl flex flex-col items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                    <span>07:30</span>
                                    <span class="text-[9px] font-normal text-emerald-200">WIB</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900 leading-snug">Briefing &amp; Edukasi
                                        Teknik Penanaman</h3>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 mt-0.5">
                                        <i class="fa-solid fa-location-dot text-[10px] text-gray-400"></i>
                                        <span>Pendopo Utama Eco Park</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-0.5">
                                        <i class="fa-regular fa-clock text-[10px]"></i>
                                        <span>07.30 – 08.00 WIB (30 Menit)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden sm:flex items-center gap-2 text-xs text-gray-500">
                                <span
                                    class="px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-md font-medium">Workshop</span>
                            </div>
                        </div>
                        <!-- Schedule 3 -->
                        <div
                            class="flex items-center justify-between p-3.5 rounded-2xl hover:bg-gray-50 border border-gray-100 transition-colors">
                            <div class="flex items-center gap-3.5">
                                <div
                                    class="w-14 h-14 bg-emerald-900 text-white rounded-xl flex flex-col items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                    <span>08:00</span>
                                    <span class="text-[9px] font-normal text-emerald-200">WIB</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900 leading-snug">Aksi Penanaman Lapangan
                                        Bersama</h3>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 mt-0.5">
                                        <i class="fa-solid fa-location-dot text-[10px] text-gray-400"></i>
                                        <span>Zona Lereng Bukit Hijau Sentul</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-0.5">
                                        <i class="fa-regular fa-clock text-[10px]"></i>
                                        <span>08.00 – 11.00 WIB (180 Menit)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden sm:flex items-center gap-2 text-xs text-gray-500">
                                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-md font-medium">Aksi
                                    Inti</span>
                            </div>
                        </div>
                        <!-- Schedule 4 -->
                        <div
                            class="flex items-center justify-between p-3.5 rounded-2xl hover:bg-gray-50 border border-gray-100 transition-colors">
                            <div class="flex items-center gap-3.5">
                                <div
                                    class="w-14 h-14 bg-emerald-900 text-white rounded-xl flex flex-col items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                    <span>11:00</span>
                                    <span class="text-[9px] font-normal text-emerald-200">WIB</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-gray-900 leading-snug">Istirahat, Makan Siang
                                        &amp; Sesi Refleksi</h3>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 mt-0.5">
                                        <i class="fa-solid fa-location-dot text-[10px] text-gray-400"></i>
                                        <span>Pendopo &amp; Pojok Ramah Lingkungan</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 text-xs text-gray-400 mt-0.5">
                                        <i class="fa-regular fa-clock text-[10px]"></i>
                                        <span>11.00 – 12.00 WIB (60 Menit)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden sm:flex items-center gap-2 text-xs text-gray-500">
                                <span
                                    class="px-2.5 py-1 bg-gray-100 rounded-md font-medium text-gray-600">Penutupan</span>
                            </div>
                        </div>
                    </div>
                    <!-- Bottom Schedule Link -->
                    <div class="mt-6 text-center">
                        <a class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-hijau-700 hover:text-hijau-900 transition-colors"
                            href="#">
                            <span>Lihat Rundown Lengkap</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </section>
            </div>
            <!-- END: Left Column -->
            <!-- RIGHT COLUMN (Sidebar 1/3 width) -->
            <aside class="space-y-6">
                <!-- Sidebar Card 1: Informasi Kontak -->
                <section class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm" data-purpose="contact-info">
                    <h2 class="text-base font-bold text-gray-900 mb-4">Informasi Kontak</h2>
                    <ul class="space-y-3.5 text-xs sm:text-sm">
                        <li class="flex items-center gap-3 text-gray-600">
                            <i class="fa-regular fa-envelope text-emerald-700 w-4 text-center"></i>
                            <a class="hover:text-emerald-700 truncate"
                                href="mailto:panitia@hijauin.id">panitia@hijauin.id</a>
                        </li>
                        <li class="flex items-center gap-3 text-gray-600">
                            <i class="fa-brands fa-whatsapp text-emerald-700 w-4 text-center"></i>
                            <a class="hover:text-emerald-700" href="tel:+6281234567890">+62 812-3456-7890</a>
                        </li>
                        <li class="flex items-center gap-3 text-gray-600">
                            <i class="fa-solid fa-map-location-dot text-emerald-700 w-4 text-center"></i>
                            <span class="truncate">Bukit Hijau Sentul, Bogor</span>
                        </li>
                    </ul>
                </section>
                <!-- Sidebar Card 2: Koordinator Lapangan -->
                <section class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm"
                    data-purpose="event-coordinator">
                    <h2 class="text-base font-bold text-gray-900 mb-4">Koordinator Kegiatan</h2>
                    <div class="flex items-center gap-3 mb-5">
                        <img alt="Rina Lestari" class="w-12 h-12 rounded-full object-cover ring-2 ring-emerald-100"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIj4UOQ3rTLmhj8BWoFOAAn-YQiUBbRwxGJI6rxr8F8cdBHFVfwxK9RG_JB8REI_UxthOn4F4-sKO3WHYDVaOfOgVfLpJ0mcrCnjoOIAeNCrZlb4StmlQRtzo-alOU0ewna7Z86PG5zedS0HsXRxWzi2Iajnz71M4PRS5tmB2w7AQoT5TQSYarprA4pQ2R5emnPW26y0-vPRTVixDFDLtSwTyHKOSENq36UphuVno" />
                        <div>
                            <div class="text-sm font-bold text-gray-900">Rina Lestari</div>
                            <div class="text-xs text-gray-500">Koordinator Lapangan</div>
                        </div>
                    </div>
                    <button
                        class="w-full py-2.5 px-4 text-xs font-semibold text-emerald-800 border border-emerald-300 rounded-xl hover:bg-emerald-50 transition-colors flex items-center justify-center gap-2">
                        <i class="fa-regular fa-comment-dots text-emerald-700"></i>
                        <span>Kirim Pesan</span>
                    </button>
                </section>
                <!-- Sidebar Card 3: Perlengkapan yang Perlu Dibawa -->
                <section class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm"
                    data-purpose="required-items">
                    <h2 class="text-base font-bold text-gray-900 mb-4">Perlengkapan Relawan</h2>
                    <ul class="space-y-3.5 text-xs sm:text-sm">
                        <li class="flex items-center gap-3 text-gray-700">
                            <span
                                class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xs shrink-0">
                                <i class="fa-solid fa-shirt"></i>
                            </span>
                            <span>Pakaian Lapangan &amp; Topi</span>
                        </li>
                        <li class="flex items-center gap-3 text-gray-700">
                            <span
                                class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xs shrink-0">
                                <i class="fa-solid fa-shoe-prints"></i>
                            </span>
                            <span>Sepatu Boots / Sneakers Kuat</span>
                        </li>
                        <li class="flex items-center gap-3 text-gray-700">
                            <span
                                class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xs shrink-0">
                                <i class="fa-solid fa-bottle-water"></i>
                            </span>
                            <span>Tumbler Air Minum Sendiri</span>
                        </li>
                        <li class="flex items-center gap-3 text-gray-700">
                            <span
                                class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center text-xs shrink-0">
                                <i class="fa-solid fa-mitten"></i>
                            </span>
                            <span>Sarung Tangan Kain (Opsional)</span>
                        </li>
                    </ul>
                </section>
            </aside>
            <!-- END: Right Column -->
        </div>
        <!-- END: MainContentGrid -->
        <!-- BEGIN: GallerySection -->
        <section class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm" data-purpose="event-gallery">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-2">
                    <h2 class="text-xl font-bold text-gray-900">Galeri Kegiatan</h2>
                    <i class="fa-solid fa-leaf text-hijau-600"></i>
                </div>
                <a class="text-xs sm:text-sm font-semibold text-hijau-700 hover:text-hijau-900 inline-flex items-center gap-1.5 transition-colors"
                    href="#">
                    <span>Lihat Semua Dokumentasi</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
            <!-- 4 Photo Grid Row -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Photo 1 -->
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-sm group">
                    <img alt="Penanaman bibit di lereng bukit"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA39pHIbxSgmA-exLKL_Zt2a0UQMYzPiDyGGNjPKKRcnoece56fZ_zJPij-TJoyHFqfZ3AaIBzF0Eg95um3xN4ZKNGBEwybTWdsEndnCGMnoN8g0aVP01MPstF89zoPqH6x27dx6dnqAzg2OI9kNPZJUII9NzfZhAgCIzTHKwJXhJc7AeZnnEAOzAt1eSF1ugNLPNm3M61PgfvodqIzsxuBz6ja8bq5amF6CDgppi8" />
                </div>
                <!-- Photo 2 -->
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-sm group">
                    <img alt="Relawan membawa bibit bersama-sama"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYxNwBenLFRWGpDI1ebKseyHZWWQhQd0n1QKirexzwEyY9kNAqH5kKs9WWwAw50HC-GyXavko7mjZazHZ0v1kyMr7gV9HSC67zFnHYprqCRcIz7P0ZVo63oerQ4as9h4RFehKqg5Xbe5oajFLfGbzBHZd8NIQxW7FSFfMlcWTdKQe4l4kBPYtrxUYxSK6j3dy23DWRxTOtlx4psvQxcVkDr3lKXe1ycDxdrO_ewPU" />
                </div>
                <!-- Photo 3 -->
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-sm group">
                    <img alt="Briefing konservasi dan edukasi tanah"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDig0UmBo5BBEq67EpAe0VJ2qA-qLJ1JZoSMoq7Dr6tKfxjFLroZnpVRaiJPowzcZQhNC96pgN0JC204L9vi2L0sNylYqWM199ecnjq5f7xpcCmdg0HVTHdz-Mm3Uku8Elr-SqhRmXFr5-_-QDlYcs7uOO-6HKs06yfjElh5bG9731hSVWNiGRmSv98Hu93as0qY5kmk6bX42Bp9ryak78WdmKhUgB_W7I5b5mVz00" />
                </div>
                <!-- Photo 4 -->
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-sm group">
                    <img alt="Foto kelompok relawan di area penanaman"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDabTt4NHA2qTNlRSTF2Xn6nO8nQUKe9bIDa8qerW8vy6Wy0FBGR-bxZ_0i_dzaRw8HMzfgVtCS70MhDXUSYtRLwOhhW8f4zXvHWfDe6o1iYNj8JfZI09V-Zta_eAotIauLyElMBcq1a52-IXIzn3mgA5tiTPKlsq4T_Xe4qDMEuSPKt1NcX8zEuEK56IxIXLrRFs-b2GOwUkGJQNcE1Z2qLkcdLR1Aqj6dJEXmMa0" />
                </div>
            </div>
        </section>
        <!-- END: GallerySection -->
        <!-- BEGIN: BottomCTA -->
        <section
            class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6"
            data-purpose="bottom-cta">
            <div class="flex items-center gap-4">
                <!-- Sprout Icon Graphic -->
                <div
                    class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-3xl shrink-0">
                    <i class="fa-solid fa-seedling"></i>
                </div>
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 leading-snug">
                        Ayo ikut berkontribusi dalam <span class="text-hijau-700">Aksi Tanam 1.000 Pohon!</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                        Bersama kita wujudkan bumi yang lebih hijau, bersih, dan berkelanjutan.
                    </p>
                </div>
            </div>
            <button
                class="w-full md:w-auto px-6 py-3 bg-hijau-900 hover:bg-hijau-800 text-white font-semibold text-sm rounded-xl inline-flex items-center justify-center gap-2 shrink-0 shadow-sm transition-all">
                <span>Daftar Jadi Relawan</span>
                <i class="fa-solid fa-users text-xs"></i>
            </button>
        </section>
        <!-- END: BottomCTA -->
    </main>
    <!-- BEGIN: MainFooter -->
    <?php
    include '../../includes/footer.php';
    ?>
</body>

</html>