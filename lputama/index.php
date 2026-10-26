<?php
// ==========================================
// DATA ARRAYS
// ==========================================

// Data statistik untuk baris atas hero
$stats = [
    [
        "icon" => "/assets/beranda/daun2.png",
        "value" => "125.430 kg",
        "label" => "Sampah Dikelola",
    ],
    [
        "icon" => "/assets/beranda/awan.png",
        "value" => "82.340 kg",
        "label" => "Emisi CO₂ Dicegah",
    ],
    [
        "icon" => "/assets/beranda/pohon.png",
        "value" => "5.243",
        "label" => "Pohon Ditanam",
    ],
    [
        "icon" => "/assets/beranda/person.png",
        "value" => "15.000+",
        "label" => "Pengguna Aktif",
    ],
    [
        "icon" => "/assets/beranda/bank.png",
        "value" => "320+",
        "label" => "Tantangan Selesai",
    ],
];

// Data 6 Kartu Fitur Unggulan
$topFeatures = [
    [
        "icon" => "/assets/beranda/catataksi.png",
        "bg_icon" => "bg-emerald-100",
        "title" => "Catat Aksi Harian",
        "desc" => "Catat berbagai aksi hijau seperti hemat energi, pilah sampah, dan transportasi ramah lingkungan."
    ],
    [
        "icon" => "/assets/beranda/eco-score.png",
        "bg_icon" => "bg-emerald-100",
        "title" => "Eco Score",
        "desc" => "Dapatkan poin dari setiap aksi dan pantau skor eco score-mu secara real-time."
    ],
    [
        "icon" => "/assets/beranda/ai-rekomendasi.png",
        "bg_icon" => "bg-amber-100",
        "title" => "AI Rekomendasi",
        "desc" => "Dapatkan rekomendasi aksi hijau yang personal dan sesuai dengan kebiasaanmu."
    ],
    [
        "icon" => "/assets/beranda/challange.png",
        "bg_icon" => "bg-emerald-100",
        "title" => "Challenge & Misi",
        "desc" => "Ikuti tantangan seru dan selesaikan misi untuk kumpulkan poin dan hadiah menarik."
    ],
    [
        "icon" => "/assets/beranda/komunitas.png",
        "bg_icon" => "bg-sky-100",
        "title" => "Komunitas Aktif",
        "desc" => "Bergabung dengan komunitas peduli bumi dan berbagi pengalaman hijau bersama."
    ],
    [
        "icon" => "/assets/beranda/report.png",
        "bg_icon" => "bg-emerald-100",
        "title" => "Laporan Dampak",
        "desc" => "Lihat laporan dampak positif dari setiap aksi yang kamu lakukan."
    ],
];

// Data 4 Kartu Ringkas Banner AI
$aiFeatures = [
    [
        "icon" => "/assets/beranda/ai-rekomendasi2.png",
        "title" => "AI Rekomendasi",
        "desc" => "Rekomendasi aksi hijau yang personal dari AI."
    ],
    [
        "icon" => "/assets/beranda/eco-score2.png",
        "title" => "Eco Score",
        "desc" => "Pantau skor keberlanjutan dan perkembangan aksimu."
    ],
    [
        "icon" => "/assets/beranda/catataksi2.png",
        "title" => "Catat Aksi Harian",
        "desc" => "Catat aksi ramah lingkungan dengan mudah setiap hari."
    ],
    [
        "icon" => "/assets/beranda/person2.png",
        "title" => "Challenge & Misi",
        "desc" => "Ikuti tantangan seru dan raih badge menarik."
    ],
];

// Data 5 Langkah Cara Kerja
$steps = [
    [
        "num" => "1",
        "icon" => "/assets/beranda/catataksi3.png",
        "title" => "Catat Aksi",
        "desc" => "Catat aksi ramah lingkungan yang kamu lakukan setiap hari."
    ],
    [
        "num" => "2",
        "icon" => "/assets/beranda/eco-score.png",
        "title" => "Dapatkan Poin",
        "desc" => "Setiap aksi memberimu poin dan meningkatkan Eco Score-mu."
    ],
    [
        "num" => "3",
        "icon" => "/assets/beranda/pantaudampak.png",
        "title" => "Pantau Dampak",
        "desc" => "Lihat statistik dan laporan dampak positif dari aksimu."
    ],
    [
        "num" => "4",
        "icon" => "/assets/beranda/ikutchallange.png",
        "title" => "Ikuti Challenge",
        "desc" => "Selesaikan tantangan seru dan dapatkan badge serta reward."
    ],
    [
        "num" => "5",
        "icon" => "/assets/beranda/berdampakdunia.png",
        "title" => "Berdampak Nyata",
        "desc" => "Bersama-sama menciptakan perubahan positif untuk bumi yang lebih baik."
    ],
];

// Data Kegiatan Komunitas
$communityEvents = [
    [
        "tag" => "Bersih Pantai",
        "image" => "/assets/beranda/bersihpantai.png",
        "title" => "Bersih Pantai Anyer",
        "participants" => "129 peserta",
        "date" => "12 Mei 2024"
    ],
    [
        "tag" => "Tanam Pohon",
        "image" => "/assets/beranda/tanampohon.png",
        "title" => "Tanam Pohon Mangrove",
        "participants" => "85 peserta",
        "date" => "10 Mei 2024"
    ],
    [
        "tag" => "Daur Ulang",
        "image" => "/assets/beranda/workshop.png",
        "title" => "Workshop Daur Ulang",
        "participants" => "96 peserta",
        "date" => "8 Mei 2024"
    ]
];

// Data Testimoni
$testimonials = [
    [
        "avatar" => "/assets/ava2.jpg",
        "name" => "Sinta Putri",
        "rating" => 5,
        "text" => "HijauIn membuatku lebih sadar dan konsisten menjaga lingkungan setiap hari."
    ],

    [
        "avatar" => "/assets/ava1.jpg",
        "name" => "Budi Santoso",
        "rating" => 5,
        "text" => "Challenge-nya seru dan komunitasnya positif banget!"
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HijauIn - Satu Langkah Hijau Setiap Hari</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-white text-gray-800 font-sans antialiased overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->
    <header class="w-full px-16 py-6 flex items-center justify-between border-b border-gray-100 bg-white sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <img src="/assets/beranda/logo.png" alt="HijauIn Logo" class="w-10 h-10 object-contain" />
            <div>
                <span class="text-2xl font-bold text-gray-900 tracking-tight">Hijau<span class="text-[#11773D]">In</span></span>
                <p class="text-[10px] text-gray-500 font-medium -mt-1">Satu Langkah Hijau Setiap Hari</p>
            </div>
        </div>

        <nav class="hidden md:flex items-center gap-8 text-sm font-semibold">
            <a href="index.php" class="text-[#11773D] border-b-2 border-[#11773D] pb-1">Beranda</a>
            <a href="fitur.php" class="text-gray-600 hover:text-[#11773D] transition">Fitur</a>
            <a href="cara-kerja.php" class="text-gray-600 hover:text-[#11773D] transition">Cara Kerja</a>
            <a href="edukasi.php" class="text-gray-600 hover:text-[#11773D] transition">Edukasi</a>
            <a href="komunitas.php" class="text-gray-600 hover:text-[#11773D] transition">Komunitas</a>
            <a href="tentang-kami.php" class="text-gray-600 hover:text-[#11773D] transition">Tentang Kami</a>
        </nav>

        <div class="flex items-center gap-4">
            <a href="masuk.php" class="px-6 py-2.5 rounded-full text-sm font-semibold text-[#11773D] border border-[#11773D] hover:bg-green-50 transition">
                Masuk
            </a>
            <a href="daftar.php" class="px-6 py-2.5 rounded-full text-sm font-semibold text-white bg-[#11773D] hover:bg-green-800 transition shadow-sm">
                Daftar Gratis
            </a>
        </div>
    </header>

    <!-- ================= HERO SECTION ================= -->
    <section class="relative w-full mx-auto px-16 pt-12 pb-20 flex flex-col lg:flex-row items-center justify-between">
        <div class="w-full lg:w-1/2 text-left z-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 text-xs font-semibold text-[#11773D] bg-[#F2FAF3] rounded-full border border-green-100">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                Platform Gaya Hidup Ramah Lingkungan
            </div>

            <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight text-gray-900 mb-6">
                Ubah Kebiasaan Kecil Menjadi <span class="text-[#11773D] underline decoration-green-300 decoration-wavy underline-offset-8">Dampak Besar</span> Untuk Bumi
            </h1>

            <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-xl">
                HijauIn membantumu mencatat aksi nyata harianmu setiap hari, meraih skor dampak, dan wujudkan Eco Score, demi membangun bumi yang lebih hijau.
            </p>

            <!-- CTA -->
            <div class="mt-8 lg:mt-10 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 lg:gap-5">
                
            <!-- Tombol Mulai Sekarang -->
                <a href="daftar.php" class="flex h-12 lg:h-14 w-full sm:w-auto items-center justify-center gap-3 rounded-2xl bg-[#11773D] px-6 lg:px-8 font-semibold text-white transition hover:bg-[#06572d]">
                    Mulai Sekarang
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>

            <!-- Tombol Lihat Demo -->
                <a href="demo.php" class="flex h-12 lg:h-14 w-full sm:w-auto items-center justify-center gap-3 rounded-2xl border border-[#A7D8B4] bg-white px-6 lg:px-8 font-semibold text-[#076635] transition hover:bg-green-50">
                    <div class="flex h-7 w-7 items-center justify-center rounded-full border border-[#11773D]">
                        <svg class="w-5 h-5 text-[#11773D] ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                    Lihat Demo
                </a>

            </div>
            
            <!-- Bagian Avatar & Pengguna Aktif -->
        <div class="flex items-center gap-4 mt-8">
            <div class="flex -space-x-3 overflow-hidden">
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white object-cover" src="/assets/beranda/user1.png" alt="" />
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white object-cover" src="/assets/beranda/user2.png" alt="" />
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white object-cover" src="/assets/beranda/user3.png" alt="" />
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white object-cover" src="/assets/beranda/user4.png" alt="" />
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium">Bergabung bersama</p>
                <p class="text-sm font-bold text-gray-900">15.000+ pengguna peduli bumi</p>
            </div>
        </div>
        </div>

        <div class="w-full lg:w-1/2 mt-12 lg:mt-0 relative flex justify-center">
            <img src="/assets/beranda/hero.png" alt="Ilustrasi Bumi HijauIn" style="width: 1492px; height: 1254; -webkit-mask-image: linear-gradient(to right, transparent, black 20%, black 30%, black);" class="w-full translate-y-1/12 scale-125" />
        </div>
    </section>

    <!-- ================= STATS BAR ================= -->
    <section class="w-full px-16 py-8">
        <div class="max-w-7xl mx-auto bg-[#F8FCF8] border border-green-100 rounded-3xl px-8 py-6 shadow-sm grid grid-cols-2 md:grid-cols-5 gap-6 items-center justify-between">
            <?php foreach ($stats as $stat): ?>
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white shadow-sm border border-green-50">
                        <img src="<?php echo $stat['icon']; ?>" alt="" class="w-6 h-6 object-contain" />
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-gray-900"><?php echo $stat['value']; ?></h4>
                        <p class="text-xs text-gray-500 font-medium"><?php echo $stat['label']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ================= FITUR UNGGULAN ================= -->
    <section class="w-full max-w-7xl mx-auto px-8 py-20 flex flex-col items-center gap-20">
        <div class="w-full text-center">
            <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                Fitur Unggulan <span class="text-[#11773D]">HijauIn</span>
            </h2>
            <p class="mt-3 text-lg text-gray-500 font-medium">
                Semua yang kamu butuhkan untuk hidup lebih hijau dalam satu platform
            </p>

            <!-- Grid 6 Kolom diubah menjadi kartu vertikal yang lebih luas dengan padding pas -->
            <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <?php foreach ($topFeatures as $item): ?>
                    <div class="bg-white border border-gray-100 rounded-3xl p-6 flex flex-col items-center text-center shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        
                        <!-- Gambar Ilustrasi Besar (Tanpa Kotak Background Kecil) -->
                        <div class="w-full h-36 flex items-center justify-center mb-6">
                            <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" class="max-h-full max-w-full object-contain" />
                        </div>

                        <!-- Judul Fitur -->
                        <h3 class="text-base font-bold text-gray-900 mb-3 leading-snug">
                            <?php echo $item['title']; ?>
                        </h3>

                        <!-- Deskripsi Fitur -->
                        <p class="text-xs text-gray-500 leading-relaxed font-normal">
                            <?php echo $item['desc']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Banner Fitur Pintar Terintegrasi -->
    <div class="w-full bg-[#EBF7EE] rounded-[32px] p-10 md:p-14 relative overflow-hidden flex flex-col lg:flex-row items-center justify-between gap-10">
    
    <!-- Bagian Teks Kiri -->
    <div class="w-full lg:w-5/12 text-left z-10">
        <span class="text-xs font-bold tracking-wider text-[#11773D] uppercase">
            FITUR PINTAR TERINTEGRASI
        </span>

        <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3 leading-tight">
            Punya Teman Pintar <br />
            Untuk Hidup <span class="text-[#11773D]">Lebih Hijau</span>
        </h3>

        <p class="text-sm text-gray-600 mt-4 leading-relaxed">
            AI Green Coach siap membantumu memahami dampak dari setiap aksi dan memberikan rekomendasi personal agar hidupmu semakin berdampak.
        </p>

        <a href="#" class="inline-flex items-center gap-3 mt-8 px-7 py-3.5 rounded-full bg-[#11773D] text-white font-semibold text-sm hover:bg-green-800 transition shadow-md">
            Coba Sekarang
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>

    <!-- Bagian 4 Kartu Kanan (Diubah agar gambarnya besar dan vertikal) -->
    <div class="w-full lg:w-7/12 grid grid-cols-2 sm:grid-cols-4 gap-4 z-10">
        <?php foreach ($aiFeatures as $card): ?>
            <div class="bg-white/90 backdrop-blur-sm border border-white/60 rounded-3xl p-5 flex flex-col items-center text-center shadow-sm hover:shadow-md transition">
                
                <!-- Area Gambar Ilustrasi Besar (Tanpa Kotak Background Kecil) -->
                <div class="w-full h-28 flex items-center justify-center mb-4">
                    <img src="<?php echo $card['icon']; ?>" alt="<?php echo $card['title']; ?>" class="max-h-full max-w-full object-contain" />
                </div>

                <!-- Judul Kartu -->
                <h4 class="text-sm font-bold text-gray-900 mb-2 leading-snug">
                    <?php echo $card['title']; ?>
                </h4>

                <!-- Deskripsi Kartu -->
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    <?php echo $card['desc']; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-[#D2ECD7] rounded-full blur-2xl opacity-60 pointer-events-none"></div>
    </div>

    </section>

    <!-- ================= CARA KERJA HIJAUIN ================= -->
    <section class="w-full max-w-7xl mx-auto px-8 py-16 text-center">
        <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">
            Cara Kerja <span class="text-[#11773D]">HijauIn</span>
        </h2>
        <p class="mt-3 text-base text-gray-500 font-medium">
            Mudah, menyenangkan, dan berdampak nyata bagi lingkungan
        </p>

        <div class="mt-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
            <?php foreach ($steps as $step): ?>
                <div class="flex flex-col items-center text-center">
                    <div class="relative w-20 h-20 rounded-2xl bg-[#EAF7EE] flex items-center justify-center mb-5">
                        <span class="absolute -top-2 -left-2 w-6 h-6 rounded-full bg-[#11773D] text-white text-xs font-bold flex items-center justify-center shadow-sm">
                            <?php echo $step['num']; ?>
                        </span>
                        <img src="<?php echo $step['icon']; ?>" alt="<?php echo $step['title']; ?>" class="w-10 h-10 object-contain" />
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        <?php echo $step['title']; ?>
                    </h3>
                    <p class="text-xs text-gray-500 leading-relaxed max-w-[190px]">
                        <?php echo $step['desc']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ================= KOMUNITAS HIJAU ================= -->
    <section class="w-full max-w-7xl mx-auto px-8 py-16">
    <!-- Container Utama Berlatar Putih/Abu Sangat Soft dengan Border Radius Besar dan Padding Luas -->
    <div class="w-full bg-[#FAFCFA] border border-gray-100 rounded-[32px] p-8 md:p-12 shadow-sm flex flex-col lg:flex-row gap-10 items-start justify-between relative">
        
        <!-- Kolom Kiri: Teks & Tombol Gabung -->
        <div class="w-full lg:w-3/12 text-left">
            <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">
                Komunitas <span class="text-[#11773D]">Hijau</span>, <br />
                Perubahan Nyata
            </h2>
            <p class="text-xs text-gray-500 mt-4 leading-relaxed">
                Bergabung dengan ribuan orang hebat yang sudah memulai langkah hijau untuk bumi yang lebih baik.
            </p>
            <a href="#" class="inline-flex items-center gap-2 mt-6 px-5 py-3 rounded-2xl bg-[#EAF7EE] text-[#11773D] font-bold text-xs hover:bg-[#d8f0de] transition shadow-sm">
                <svg class="w-4 h-4 text-[#11773D]" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                Gabung Komunitas
            </a>
        </div>

        <!-- Kolom Tengah: Kegiatan Komunitas Terbaru -->
        <div class="w-full lg:w-6/12">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-sm font-bold text-gray-900">Kegiatan Komunitas Terbaru</h3>
                <a href="#" class="text-xs font-bold text-[#11773D] hover:underline flex items-center gap-1">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <?php foreach ($communityEvents as $event): ?>
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition text-left">
                        <!-- Diubah dari h-32 menjadi h-48 agar gambar tampil lebih besar dan tidak gepeng -->
                        <div class="relative h-48 w-full bg-gray-200">
                            <img src="<?php echo $event['image']; ?>" alt="" class="w-full h-full object-cover" />
                            <!-- Tag Kategori dengan sudut melengkung lonjong (pill) -->
                            <span class="absolute bottom-3 left-3 px-3 py-1 rounded-full bg-white/95 text-[10px] font-bold text-[#11773D] shadow-sm backdrop-blur-sm">
                                <?php echo $event['tag']; ?>
                            </span>
                        </div>
                        <div class="p-3.5">
                            <h4 class="text-xs font-bold text-gray-900 leading-snug line-clamp-1">
                                <?php echo $event['title']; ?>
                            </h4>
                            <div class="mt-3 flex items-center justify-between text-[10px] text-gray-400 font-medium">
                                <span>🌿 <?php echo $event['participants']; ?></span>
                                <span>📅 <?php echo $event['date']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Kolom Kanan: Kata Mereka (Testimoni) & Pagination Dots -->
        <div class="w-full lg:w-3/12 flex flex-col justify-between">
            <div>
                <h3 class="text-sm font-bold text-gray-900 mb-6 text-left">Kata Mereka</h3>
                <div class="flex flex-col gap-4 text-left">
                    <?php foreach ($testimonials as $t): ?>
                        <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-sm">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="<?php echo $t['avatar']; ?>" class="w-8 h-8 rounded-full object-cover" alt="" />
                                <div>
                                    <h5 class="text-xs font-bold text-gray-900"><?php echo $t['name']; ?></h5>
                                    <div class="text-amber-400 text-[10px]">
                                        <?php echo str_repeat('★', $t['rating']); ?>
                                    </div>
                                </div>
                            </div>
                            <p class="text-[11px] text-gray-500 leading-relaxed">
                                "<?php echo $t['text']; ?>"
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Pagination Dots di bawah testimoni -->
            <div class="flex items-center justify-center gap-1.5 mt-6">
                <span class="w-4 h-1.5 rounded-full bg-[#11773D]"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
            </div>
        </div>

    </div>
    </section>

    <!-- ================= CTA BANNER BOTTOM ================= -->
<section class="w-full max-w-7xl mx-auto px-8 py-20">
    <div class="w-full bg-[#EBF7EE] rounded-[32px] p-10 md:p-14 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
        
        <!-- Gambar Ilustrasi di Sebelah Kiri (Diubah menjadi ukuran besar natural) -->
        <div class="relative w-64 md:w-80 shrink-0 flex items-center justify-center">
            <img src="/assets/beranda/yukmulai.png" alt="Ilustrasi Aksi Hijau" class="w-full h-auto object-contain" />
        </div>

        <!-- Bagian Teks di Tengah -->
        <div class="flex-1 text-left">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight">
                Yuk, mulai langkah kecil untuk <br />
                perubahan besar!
            </h2>
            <p class="text-sm text-gray-600 mt-3 max-w-xl leading-relaxed">
                Bersama HijauIn, mari ciptakan lingkungan yang lebih bersih, sehat, dan berkelanjutan.
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

    </div>
</section>

</body>
</html>