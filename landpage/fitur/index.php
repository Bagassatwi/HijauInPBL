<?php 
// 1. Panggil Header & Navbar
include '../includes/header.php'; 
include '../includes/navbar.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur HijauIn - Semua Fitur Dalam Satu Platform</title>
    
    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library (Opsional, sesuaikan jika Anda pakai AOS di PHP) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white">

    <div class="w-full bg-white flex flex-col">

        <!-- ===== HERO / HEADER ===== -->
        <?php include 'components/Hero.php'; ?>

        <!-- ===== GRID FEATURES ===== -->
        <?php include 'components/FiturUnggulan.php'; ?>

        <!-- ===== DETAILED FEATURES ===== -->
        <?php include 'components/FiturUnggulanDetail.php'; ?>

        <!-- ===== DAMPAK BULANAN ===== -->
        <?php include 'components/Impact.php'; ?>

        <!-- CTA Bottom Section -->
        <section class="w-fit bg-white px-16 py-24">
            <div class="mx-auto flex items-center justify-between overflow-hidden rounded-[32px] border border-green-100 px-8 py-6" style="background: linear-gradient(90deg, #F8FCF8 0%, #FFFFFF 45%, #F8FCF8 100%);" data-aos="zoom-in" data-aos-duration="1000">
                
                <div class="relative w-[360px] shrink-0" data-aos="fade-right" data-aos-delay="200">
                    <img src="/assets/cara-kerja/siapmulai.png" alt="" width="360" height="260" class="h-[240px] w-auto object-contain" />
                </div>

                <div class="mx-8 flex-1" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="max-w-lg text-[38px] font-bold leading-tight text-gray-900">
                        Siap memulai perjalanan <span class="text-[#11773D]">hijau</span>mu hari ini?
                    </h2>
                    <p class="mt-4 max-w-lg text-xl leading-9 text-gray-600">
                        Bersama HijauIn, setiap langkah kecilmu membawa perubahan besar untuk bumi.
                    </p>
            </div>

                <!-- Bagian Tombol Aksi di Sebelah Kanan -->
            <div class="flex flex-col gap-3 shrink-0">
                <!-- Tombol 1: Daftar Gratis Sekarang -->
                <a href="daftar.php" class="px-7 py-3.5 rounded-2xl bg-[#11773D] text-white font-semibold text-sm hover:bg-green-800 transition shadow-md flex items-center justify-between gap-6">
                    <span>Daftar Gratis Sekarang</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-[#11773D] text-xs font-bold shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                </a>

                <!-- Tombol 2: Lihat Cara Kerja -->
            <a href="cara-kerja.php" class="px-7 py-3.5 rounded-2xl bg-white text-[#11773D] border border-green-200 font-semibold text-sm hover:border-[#11773D] transition flex items-center justify-center gap-3 shadow-sm">
                <span class="flex h-8 w-8 items-center justify-center rounded-full border border-[#11773D] text-xs text-[#11773D]">
                    <svg class="w-5 h-5 ml-0.5 fill-current" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    </span>
                <span>Lihat Cara Kerja</span>
            </a>
            </div>
        </section>

    </div>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

<?php
    include '../includes/footer.php';
?>
