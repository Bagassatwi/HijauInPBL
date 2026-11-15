<?php 
// Panggil header dan navbar (naik satu level ke folder includes)
include '../includes/header.php'; 
include '../includes/navbar.php'; 

// Data Kategori Basis Pengetahuan
$kategoriData = [
    [
        "title" => "Memulai di HijauIn",
        "icon" => "fa-rocket",
        "count" => "14 Dokumen",
        "desc" => "Panduan onboarding praktis, langkah aktivasi & verifikasi akun, hingga pengaturan preferensi dampak lingkungan awal.",
        "articles" => [
            "Cara Mendaftar & Verifikasi Email Akun Baru",
            "Menentukan 3 Pilar Fokus Aksi Ekologis",
            "Menghubungkan Profil Sosial & Lokasi Domisili"
        ]
    ],
    [
        "title" => "Pencatatan Aksi & AI Coach",
        "icon" => "fa-brain",
        "count" => "22 Dokumen",
        "desc" => "Tata cara upload bukti foto autentik, alur validasi kecerdasan buatan, dan kalkulasi jejak pengurangan karbon.",
        "articles" => [
            "Standar Ketajaman & Metadata Foto Aksi",
            "Memahami Nilai Kepercayaan AI Green Coach",
            "Metrik Konversi kg CO₂e per Jenis Aktivitas"
        ]
    ],
    [
        "title" => "Eco Points & Badges",
        "icon" => "fa-award",
        "count" => "18 Dokumen",
        "desc" => "Struktur kenaikan tier level partisipasi, sistem reward poin, dan katalog lencana kehormatan konservasi.",
        "articles" => [
            "Tabel Konversi Aksi Harian ke Eco Points",
            "Persyaratan Membuka Lencana 'Penjaga Mangrove'",
            "Masa Berlaku & Mekanisme Penukaran Rewards"
        ]
    ],
    [
        "title" => "Komunitas & Event",
        "icon" => "fa-users",
        "count" => "19 Dokumen",
        "desc" => "Panduan koordinator aksi, pembuatan acara lingkungan lokal, kuota relawan, dan absensi geofencing.",
        "articles" => [
            "Cara Mengajukan Pembentukan Chapter Komunitas",
            "Verifikasi Kehadiran Relawan Lewat Kode QR",
            "Manajemen Logistik dan Protokol K3 Aksi Lapangan"
        ]
    ],
    [
        "title" => "Bibit Pohon & CSR",
        "icon" => "fa-tree",
        "count" => "11 Dokumen",
        "desc" => "Sertifikasi penanaman pohon, koordinat geolokasi satelit, sertifikat CSR perusahaan, dan audit pertumbuhan.",
        "articles" => [
            "Membaca Tag Satelit & Pemantauan Drone",
            "Penerbitan Sertifikat Digital Karbon Offset",
            "Jadwal Perawatan oleh Kelompok Petani Lokal"
        ]
    ],
    [
        "title" => "Teknis & Keamanan Akun",
        "icon" => "fa-shield-halved",
        "count" => "16 Dokumen",
        "desc" => "Troubleshooting izin kamera, kendala sinkronisasi lokasi GPS di area pelosok, serta pengaturan Two-Factor (2FA).",
        "articles" => [
            "Solusi Gagal Akses Kamera di Browser Desktop",
            "Mengatasi Data Offline Belum Terunggah",
            "Pengaturan Pemulihan Akun & Kunci Sandi"
        ]
    ]
];

// Data Artikel Terpopuler
$popularArticles = [
    [
        "badge" => "Validasi AI",
        "badge_color" => "bg-emerald-100 text-emerald-800",
        "read_time" => "4 mnt baca",
        "title" => "Cara Menghindari Ditolaknya Verifikasi Aksi Foto",
        "desc" => "Tips pencahayaan, sudut pengambilan objek, dan hal-hal yang sering memicu peringatan...",
        "helpful" => "98% merasa terbantu (1.2k suara)"
    ],
    [
        "badge" => "Komunitas",
        "badge_color" => "bg-emerald-100 text-emerald-800",
        "read_time" => "7 mnt baca",
        "title" => "Panduan Menyelenggarakan Beach Clean-Up Lokal",
        "desc" => "SOP izin lokasi pesisir, penyediaan sarung tangan daur ulang, dan integrasi penimbangan sampah ke...",
        "helpful" => "96% merasa terbantu (890 suara)"
    ],
    [
        "badge" => "Eco Rewards",
        "badge_color" => "bg-emerald-100 text-emerald-800",
        "read_time" => "3 mnt baca",
        "title" => "Langkah Menukarkan Eco Points Jadi Bibit Mangrove",
        "desc" => "Katalog penukaran voucher penanaman pohon asli di pesisir utara Jawa dan aktivasi...",
        "helpful" => "99% merasa terbantu (2.4k suara)"
    ],
    [
        "badge" => "Pemecahan Masalah",
        "badge_color" => "bg-emerald-100 text-emerald-800",
        "read_time" => "5 mnt baca",
        "title" => "Memperbaiki Kesalahan Presisi Geolocation GPS",
        "desc" => "Pengaturan izin akurasi tinggi di browser Chrome, Safari, dan Firefox saat merekam aksi...",
        "helpful" => "94% merasa terbantu (640 suara)"
    ]
];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<main class="min-h-screen bg-gray-50 pb-20">
    
    <!-- ================= HERO SECTION ================= -->
    <div class="bg-white pt-16 pb-24 px-4 sm:px-6 lg:px-8 border-b border-gray-100 relative overflow-hidden">
        <div class="max-w-3xl mx-auto text-center relative z-10">
            <!-- Badge Atas -->
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 mb-6">
                <i class="fa-solid fa-headset"></i> PUSAT BANTUAN & PANDUAN PENGGUNA
            </span>
            
            <!-- Judul Utama (Diperbaiki ukuran font & line-height agar tidak turun/patah) -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6">
                Panduan Lengkap & Basis Pengetahuan HijauIn
            </h1>
            
            <!-- Deskripsi Hero -->
            <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
                Eksplorasi direktori panduan langkah demi langkah, dokumentasi fitur, dan solusi teknis untuk memaksimalkan aksi hijaumu.
            </p>
        </div>
        <!-- Efek gradien latar belakang -->
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-50/30 to-transparent pointer-events-none"></div>
    </div>

    <!-- ================= KATEGORI BASIS PENGETAHUAN ================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-20 relative z-20">
        <!-- Header Bagian Kategori (Flexbox disesuaikan agar rapi di semua layar) -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-10 gap-4">
<div>
                <span class="text-xs font-bold text-emerald-700 tracking-wider uppercase flex items-center gap-1.5 mb-2">
                    <i class="fa-solid fa-folder-open"></i> DIREKTORI TOPIK LENGKAP
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Kategori Basis Pengetahuan</h2>
            </div>
            <p class="text-sm text-gray-500 max-w-md">
                Temukan dokumentasi terperinci yang dikurasi oleh tim HijauIn untuk setiap alur partisipasi.
            </p>
        </div>

        <!-- Grid Kategori (Tetap sama seperti sebelumnya) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($kategoriData as $kat): ?>
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-8 flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <!-- Header Kartu -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl">
                                <i class="fa-solid <?= $kat['icon']; ?>"></i>
                            </div>
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                <?= $kat['count']; ?>
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 mb-2"><?= $kat['title']; ?></h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6">
                            <?= $kat['desc']; ?>
                        </p>

                        <!-- List Daftar Artikel Kecil -->
                        <div class="space-y-3 border-t border-gray-100 pt-4 mb-6">
                            <?php foreach ($kat['articles'] as $art): ?>
                                <div class="flex items-start gap-2.5 text-xs sm:text-sm text-gray-700 hover:text-emerald-700 cursor-pointer transition-colors">
                                    <i class="fa-regular fa-file-lines text-emerald-600 mt-0.5 shrink-0"></i>
                                    <span><?= $art; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Footer Kartu -->
                    <div class="border-t border-gray-100 pt-4">
                        <a href="#" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-emerald-700 hover:text-emerald-800">
                            Lihat Semua Artikel (<?= filter_var($kat['count'], FILTER_SANITIZE_NUMBER_INT); ?>) 
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ================= KATEGORI BASIS PENGETAHUAN ================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20 mb-20">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <span class="text-xs font-bold text-emerald-700 tracking-wider uppercase flex items-center gap-1.5 mb-1">
                    <i class="fa-solid fa-folder-open"></i> DIREKTORI TOPIK LENGKAP
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Kategori Basis Pengetahuan</h2>
            </div>
            <p class="text-sm text-gray-500 max-w-sm mt-2 sm:mt-0">
                Temukan dokumentasi terperinci yang dikurasi oleh tim HijauIn untuk setiap alur partisipasi.
            </p>
        </div>

        <!-- Grid Kategori -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($kategoriData as $kat): ?>
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-8 flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <!-- Header Kartu -->
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl">
                                <i class="fa-solid <?= $kat['icon']; ?>"></i>
                            </div>
                            <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                <?= $kat['count']; ?>
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 mb-2"><?= $kat['title']; ?></h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6">
                            <?= $kat['desc']; ?>
                        </p>

                        <!-- List Daftar Artikel Kecil -->
                        <div class="space-y-3 border-t border-gray-100 pt-4 mb-6">
                            <?php foreach ($kat['articles'] as $art): ?>
                                <div class="flex items-start gap-2.5 text-xs sm:text-sm text-gray-700 hover:text-emerald-700 cursor-pointer transition-colors">
                                    <i class="fa-regular fa-file-lines text-emerald-600 mt-0.5 shrink-0"></i>
                                    <span><?= $art; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Footer Kartu -->
                    <div class="border-t border-gray-100 pt-4">
                        <a href="#" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-emerald-700 hover:text-emerald-800">
                            Lihat Semua Artikel (<?= filter_var($kat['count'], FILTER_SANITIZE_NUMBER_INT); ?>) 
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ================= ARTIKEL PANDUAN TERPOPULER ================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <span class="text-xs font-bold text-emerald-700 tracking-wider uppercase flex items-center gap-1.5 mb-1">
                    <i class="fa-solid fa-arrow-trend-up"></i> BANYAK DIBACA MINGGU INI
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Artikel Panduan Terpopuler</h2>
            </div>
            <a href="#" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex items-center gap-1 mt-2 sm:mt-0">
                Lihat Indeks Tren Selengkapnya <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Grid Artikel Terpopuler -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($popularArticles as $pop): ?>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <!-- Top Badge & Waktu Baca -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-2.5 py-0.5 rounded-md text-xs font-semibold <?= $pop['badge_color']; ?>">
                                <?= $pop['badge']; ?>
                            </span>
                            <span class="text-xs text-gray-400 flex items-center gap-1">
                                <i class="fa-regular fa-clock"></i> <?= $pop['read_time']; ?>
                            </span>
                        </div>

                        <h3 class="font-bold text-gray-900 text-base mb-2 hover:text-emerald-700 cursor-pointer transition-colors">
                            <?= $pop['title']; ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-500 leading-relaxed mb-6">
                            <?= $pop['desc']; ?>
                        </p>
                    </div>

                    <!-- Feedback / Helpful Counter -->
                    <div class="border-t border-gray-100 pt-4 text-xs text-emerald-700 font-medium flex items-center gap-1.5">
                        <i class="fa-regular fa-thumbs-up"></i>
                        <span><?= $pop['helpful']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ================= BANNER DUKUNGAN LANGSUNG (CTA) ================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-emerald-800 rounded-3xl p-8 sm:p-12 text-white flex flex-col lg:flex-row items-center justify-between gap-8 relative overflow-hidden shadow-lg">
            
            <div class="max-w-2xl relative z-10">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-700 text-emerald-100 mb-4">
                    <i class="fa-solid fa-headset"></i> DUKUNGAN LANGSUNG
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight mb-4">
                    Belum Menemukan Jawaban yang Tepat?
                </h2>
                <p class="text-emerald-100 text-sm sm:text-base leading-relaxed">
                    Tim spesialis advokasi lingkungan dan pengembang HijauIn siap membantu kendala teknis maupun konsultasi komunitas aksi lapanganmu.
                </p>
            </div>

            <!-- Tombol Aksi Kanan -->
            <div class="flex flex-col sm:flex-row lg:flex-col gap-4 w-full lg:w-auto relative z-10 shrink-0">
                <!-- Tombol 1 -->
                <a href="#" class="bg-white text-gray-900 hover:bg-gray-100 px-6 py-4 rounded-2xl font-bold text-sm flex items-center justify-between gap-4 shadow-sm transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                            <i class="fa-solid fa-ticket"></i>
                        </div>
                        <span>Buat Tiket Bantuan</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-[11px] font-normal text-gray-400 hidden sm:inline">Balasan estimasi 1 x 24 jam kerja</span>
                        <i class="fa-solid fa-arrow-right text-xs text-gray-600"></i>
                    </div>
                </a>

                <!-- Tombol 2 -->
                <a href="faq.php" class="bg-emerald-700 text-white hover:bg-emerald-600 px-6 py-4 rounded-2xl font-bold text-sm flex items-center justify-between gap-4 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center">
                            <i class="fa-solid fa-circle-question"></i>
                        </div>
                        <span>Tanya Jawab Cepat (FAQ)</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-[11px] font-normal text-emerald-200 hidden sm:inline">Jawaban instan pertanyaan umum</span>
                        <i class="fa-solid fa-arrow-right text-xs text-white"></i>
                    </div>
                </a>
            </div>

        </div>
    </div>

</main>

<?php 
// Panggil footer (naik satu level ke folder includes)
include '../includes/footer.php'; 
?>