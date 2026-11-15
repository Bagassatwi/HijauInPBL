<?php 
// Panggil header dan navbar
include '../includes/header.php'; 
include '../includes/navbar.php'; 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<main class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        <!-- ================= BAGIAN 1: HEADER & HERO ================= -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-12 mb-10">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="max-w-3xl">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 mb-4">
                        <i class="fa-solid fa-shield-halved"></i> DOKUMEN RESMI & TRANSPARANSI DATA
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                        Kebijakan Privasi HijauIn
                    </h1>
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-6">
                        Komitmen penuh kami dalam melindungi identitas, data geolokasi, dan privasi setiap Pejuang Hijau di seluruh Indonesia saat beraksi memulihkan bumi pertiwi.
                    </p>

                    <!-- Meta Info Dokumen -->
                    <div class="flex flex-wrap items-center gap-y-3 gap-x-6 text-sm text-gray-500">
                        <div class="flex items-center gap-2">
                            <i class="fa-regular fa-calendar text-emerald-600"></i>
                            <span>Terakhir diperbarui: <strong>15 Januari 2025</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-file-shield text-emerald-600"></i>
                            <span>Nomor Regulasi: <strong>Versi 2.4</strong></span>
                        </div>
                        <div class="flex items-center gap-2 w-full sm:w-auto">
                            <i class="fa-solid fa-globe text-emerald-600"></i>
                            <span>Yurisdiksi: <strong>Republik Indonesia (UU PDP No. 27/2022)</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Tombol Unduh PDF -->
                <div class="shrink-0">
                    <a href="#" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-600 text-white font-medium text-sm hover:bg-emerald-700 shadow-sm transition-all duration-200">
                        <i class="fa-solid fa-download"></i>
                        Unduh Dokumen PDF
                    </a>
                </div>
            </div>
        </div>

        <!-- ================= BAGIAN 2: 3 KARTU PRINSIP UTAMA ================= -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Prinsip II (Pemanfaatan Berkelanjutan) -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-tree text-lg"></i>
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded-md text-xs font-semibold bg-indigo-50 text-indigo-700 mb-2">Prinsip II</span>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Pemanfaatan Berkelanjutan</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Data aksi dan koordinat geolokasi semata-mata dimanfaatkan untuk kalkulasi saintifik dampak ekologis: serapan karbon (CO₂), konservasi air, serta penanaman bibit pohon terverifikasi.
                </p>
            </div>

            <!-- Prinsip I (Zero Data Selling) -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-square-xmark text-lg"></i>
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded-md text-xs font-semibold bg-indigo-50 text-indigo-700 mb-2">Prinsip I</span>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Zero Data Selling</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Kami tidak pernah dan tidak akan pernah menjual atau memonetisasi data pribadi, kontak, atau riwayat penjelajahan Anda kepada pihak ketiga maupun jaringan periklanan manapun.
                </p>
            </div>

            <!-- Prinsip III (Kendali Penuh di Tangan Anda) -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-user-lock text-lg"></i>
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded-md text-xs font-semibold bg-indigo-50 text-indigo-700 mb-2">Prinsip III</span>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Kendali Penuh di Tangan Anda</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Kedaulatan data adalah milik Anda. Anda berhak mengunduh seluruh arsip portofolio hijau Anda atau mengajukan penghapusan akun permanen <span class="italic">(Right to be Forgotten)</span> setiap saat.
                </p>
            </div>
        </div>

        <!-- ================= BAGIAN 3: KONTEN UTAMA DUA KOLOM ================= -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Kolom Kiri: Daftar Isi (Sticky Navigation) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sticky top-24 space-y-6">
                    <div>
                        <h4 class="font-bold text-gray-900 flex items-center gap-2 mb-4">
                            <i class="fa-solid fa-bars-staggered text-emerald-600"></i> Daftar Isi Kebijakan
                        </h4>
                        <nav class="space-y-2 text-sm">
                            <a href="#pasal-1" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>1. Informasi yang Dikumpulkan</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                            <a href="#pasal-2" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>2. Cara Menggunakan Informasi</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                            <a href="#pasal-3" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>3. Pembagian Data & Komunitas</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                            <a href="#pasal-4" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>4. Keamanan & Enkripsi Data</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                            <a href="#pasal-5" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>5. Hak Pengguna (PDP)</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                            <a href="#pasal-6" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>6. Cookie & Pelacakan</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                            <a href="#pasal-7" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>7. Kebijakan Usia & Remaja</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                            <a href="#pasal-8" class="block py-1.5 px-3 rounded-lg text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                                <span>8. Kontak Petugas DPO</span>
                                <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                            </a>
                        </nav>
                    </div>

                    <!-- Kotak Bantuan Hukum -->
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <div class="flex items-center gap-2 text-emerald-700 font-semibold text-sm mb-1">
                            <i class="fa-regular fa-envelope"></i> Butuh Bantuan Hukum?
                        </div>
                        <p class="text-xs text-gray-500 mb-3">Tim Kepatuhan Regulasi siap menanggapi pertanyaan Anda dalam 1 x 24 jam.</p>
                        <a href="mailto:privacy@hijauin.id" class="text-xs font-bold text-emerald-700 hover:underline flex items-center gap-1">
                            privacy@hijauin.id <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>

                    <!-- Kotak Audit Privasi -->
                    <div class="bg-emerald-50/60 rounded-xl p-4 border border-emerald-100">
                        <div class="flex items-center gap-2 text-emerald-800 font-bold text-xs mb-1">
                            <i class="fa-solid fa-shield-check text-emerald-600"></i> Audit Privasi Berkala
                        </div>
                        <p class="text-[11px] text-gray-600 leading-relaxed">
                            Kepatuhan terstandarisasi ISO 27001 & UU Perlindungan Data Pribadi Indonesia No. 27/2022.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Pasal-Pasal Kebijakan -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-12 space-y-12">
                    
                    <!-- Intro Teks -->
                    <p class="text-gray-700 leading-relaxed text-base">
                        Selamat datang di HijauIn ("Kami", "Platform", atau "Layanan"). Kami menyadari bahwa kepercayaan Anda adalah modal utama gerakan pelestarian lingkungan ini. Dokumen Kebijakan Privasi ini menjelaskan secara transparan, mudah dipahami, dan akuntabel mengenai bagaimana data pribadi Anda dihimpun, diproses, disimpan, dan dilindungi saat Anda mengakses aplikasi seluler, situs web resmi, serta fitur partisipasi aksi kolektif kami.
                    </p>

                    <hr class="border-gray-100">

                    <!-- Pasal 1 -->
                    <section id="pasal-1" class="scroll-mt-28 space-y-6">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">01</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">1. Informasi yang Kami Kumpulkan</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            Kami hanya mengumpulkan data yang secara langsung esensial untuk memvalidasi dampak iklim dan memfasilitasi keterlibatan Anda dalam jejaring aksi lingkungan:
                        </p>

                        <!-- Sub Card A -->
                        <div class="bg-gray-50/80 rounded-2xl p-5 border border-gray-100 space-y-2">
                            <div class="flex items-center gap-2 text-gray-900 font-bold text-sm">
                                <i class="fa-regular fa-id-card text-emerald-700"></i> A. Data Identitas Akun
                            </div>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Nama lengkap atau nama samaran yang Anda tentukan, alamat surel aktif, nomor telepon (untuk autentikasi dua faktor), dan foto profil avatar publik yang Anda unggah secara sukarela.
                            </p>
                        </div>

                        <!-- Sub Card B -->
                        <div class="bg-gray-50/80 rounded-2xl p-5 border border-gray-100 space-y-2">
                            <div class="flex items-center gap-2 text-gray-900 font-bold text-sm">
                                <i class="fa-solid fa-camera-retro text-emerald-700"></i> B. Foto Bukti Kegiatan Ramah Lingkungan
                            </div>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Dokumentasi visual dari kegiatan seperti penanaman pohon, pemilahan sampah organik/anorganik, pemanfaatan transportasi umum, atau penggunaan kantong belanja daur ulang. Gambar ini mencakup metadata teknis (waktu dan tanggal pengambilan).
                            </p>
                        </div>

                        <!-- Sub Card C -->
                        <div class="bg-gray-50/80 rounded-2xl p-5 border border-gray-100 space-y-2">
                            <div class="flex items-center gap-2 text-gray-900 font-bold text-sm">
                                <i class="fa-solid fa-location-dot text-emerald-700"></i> C. Data Geolokasi GPS (Hanya Saat Check-in Aksi)
                            </div>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Koordinat lintang dan bujur hanya diakses jika Anda memberikan izin aktif saat mengeklik tombol "Check-in Aksi" atau "Tanam Pohon di Sini". <strong class="text-gray-900 font-semibold">Kami tidak memantau posisi Anda di latar belakang (background tracking)</strong> saat aplikasi sedang tidak digunakan.
                            </p>
                        </div>
                    </section>

                    <hr class="border-gray-100">

                    <!-- Pasal 2 -->
                    <section id="pasal-2" class="scroll-mt-28 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">02</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">2. Cara Kami Menggunakan Informasi Anda</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            Setiap data yang masuk ke basis data HijauIn diproses dengan tujuan yang transparan dan dapat dipertanggungjawabkan:
                        </p>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-600 mt-1 shrink-0"></i>
                                <span><strong>Verifikasi Aksi via AI & Kurasi Komunitas:</strong> Model visi komputer kami menganalisis foto bukti untuk memverifikasi keabsahan bibit tanaman atau volume daur ulang guna mencegah manipulasi laporan aksi.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-600 mt-1 shrink-0"></i>
                                <span><strong>Agregasi Data Reduksi Emisi Karbon:</strong> Mengkalkulasi total gram emisi $CO_2$ yang berhasil dicegah, liter air bersih yang dilindungi, dan menyajikan dasbor pencapaian pribadi serta daerah.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-600 mt-1 shrink-0"></i>
                                <span><strong>Distribusi Eco Point & Hadiah Ekologis:</strong> Mengalokasikan poin reward aksi yang dapat ditukarkan dengan benih pohon lokal atau voucher mitra ramah lingkungan berlisensi.</span>
                            </li>
                        </ul>
                    </section>

                    <hr class="border-gray-100">

                    <!-- Pasal 3 -->
                    <section id="pasal-3" class="scroll-mt-28 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">03</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">3. Pembagian Data dengan Pihak Ketiga & Komunitas</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            Kami menjunjung tinggi prinsip proteksi data. Informasi Anda hanya dibagikan dalam kondisi terbatas berikut:
                        </p>
                        <div class="bg-emerald-50/50 rounded-2xl p-5 border border-emerald-100 space-y-2">
                            <div class="flex items-center gap-2 text-emerald-900 font-bold text-sm">
                                <i class="fa-solid fa-users text-emerald-700"></i> Visibilitas Publik Komunitas Hijau
                            </div>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Saat Anda mempublikasikan pencapaian ke linimasa komunitas, pengguna lain hanya dapat melihat Nama Tampilan, Foto Profil Publik, dan Angka Capaian Dampak (contoh: "Budi menanam 3 mangrove"). Lokasi akurat rumah atau surel Anda tidak pernah diungkapkan secara publik.
                            </p>
                        </div>
                        <p class="text-xs text-gray-500 italic">
                            *Pengecualian: Kami hanya akan membagikan data apabila diwajibkan oleh perintah pengadilan sah atau penegak hukum Republik Indonesia berdasarkan undang-undang yang berlaku.
                        </p>
                    </section>

                    <hr class="border-gray-100">

                    <!-- Pasal 4 -->
                    <section id="pasal-4" class="scroll-mt-28 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">04</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">4. Keamanan & Enkripsi Data</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            Keamanan infrastruktur kami dibangun mengikuti standar arsitektur sistem iklim global:
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-gray-50/80 rounded-2xl p-5 border border-gray-100 space-y-2">
                                <div class="flex items-center gap-2 font-bold text-gray-900 text-sm">
                                    <i class="fa-solid fa-lock text-emerald-700"></i> Enkripsi TLS 1.3 / AES-256
                                </div>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    Seluruh lalu lintas transmisi antara peramban Anda dan peladen terenkripsi penuh melalui protokol SSL/TLS militer grade 256-bit.
                                </p>
                            </div>
                            <div class="bg-gray-50/80 rounded-2xl p-5 border border-gray-100 space-y-2">
                                <div class="flex items-center gap-2 font-bold text-gray-900 text-sm">
                                    <i class="fa-solid fa-cloud text-emerald-700"></i> Pusat Data Bersertifikasi Ramah Lingkungan
                                </div>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    Peladen berbasis cloud kami bertempat di kawasan Jakarta dan dioperasikan oleh penyedia infrastruktur dengan 100% kompensasi energi terbarukan.
                                </p>
                            </div>
                        </div>
                    </section>

                    <hr class="border-gray-100">

                    <!-- Pasal 5 -->
                    <section id="pasal-5" class="scroll-mt-28 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">05</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">5. Hak Pengguna (Kepatuhan UU PDP)</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            Sesuai amanat Undang-Undang Perlindungan Data Pribadi (UU PDP No. 27/2022), Anda memiliki serangkaian hak mutlak:
                        </p>
                        <div class="space-y-3">
                            <div class="p-4 rounded-xl bg-gray-50/80 border border-gray-100">
                                <h4 class="font-bold text-sm text-gray-900 mb-1 flex items-center gap-2">
                                    <i class="fa-regular fa-file-lines text-emerald-700"></i> Hak Akses & Portabilitas:
                                </h4>
                                <p class="text-xs text-gray-600">Anda dapat mengunduh seluruh salinan riwayat aksi, catatan karbon, dan data profil dalam format JSON atau PDF melalui menu Pengaturan Akun.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-gray-50/80 border border-gray-100">
                                <h4 class="font-bold text-sm text-gray-900 mb-1 flex items-center gap-2">
                                    <i class="fa-regular fa-pen-to-square text-emerald-700"></i> Hak Koreksi & Pembaruan:
                                </h4>
                                <p class="text-xs text-gray-600">Anda bebas memperbarui, meralat data biografi, atau mengganti kontak setiap waktu tanpa hambatan administratif.</p>
                            </div>
                            <div class="p-4 rounded-xl bg-gray-50/80 border border-gray-100">
                                <h4 class="font-bold text-sm text-gray-900 mb-1 flex items-center gap-2">
                                    <i class="fa-regular fa-square-check text-emerald-700"></i> Hak Penghapusan (Right to be Forgotten):
                                </h4>
                                <p class="text-xs text-gray-600">Anda dapat meminta penghapusan permanen seluruh rekam jejak pribadi Anda dari database kami dalam kurun waktu selambat-lambatnya 72 jam kerja.</p>
                            </div>
                        </div>
                    </section>

                    <hr class="border-gray-100">

                    <!-- Pasal 6 -->
                    <section id="pasal-6" class="scroll-mt-28 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">06</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">6. Cookie dan Teknologi Pelacakan</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            Kami menggunakan cookie sesi esensial untuk menjaga status login Anda tetap aman dan mempertahankan preferensi bahasa. Kami tidak menggunakan cookie pelacak pihak ketiga (third-party behavioral advertising cookies) yang menguntit peramban Anda di situs web eksternal.
                        </p>
                    </section>

                    <hr class="border-gray-100">

                    <!-- Pasal 7 -->
                    <section id="pasal-7" class="scroll-mt-28 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">07</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">7. Kebijakan Usia & Perlindungan Remaja</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            HijauIn menyambut partisipasi pelajar dan generasi muda dalam gerakan iklim. Pengguna di bawah usia 13 tahun diharuskan mendapatkan persetujuan dan pendampingan orang tua atau wali resmi sebelum mendaftarkan akun dan mengunggah dokumentasi aksi publik.
                        </p>
                    </section>

                    <hr class="border-gray-100">

                    <!-- Pasal 8 -->
                    <section id="pasal-8" class="scroll-mt-32 space-y-6">
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">08</span>
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">8. Kontak Petugas Perlindungan Data (DPO)</h2>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                            Apabila Anda memiliki pertanyaan spesifik, kekhawatiran terkait privasi, atau ingin menggunakan hak-hak hukum Anda atas data pribadi, silakan hubungi tim independen kami:
                        </p>

                        <!-- Box Kontak DPO -->
                        <div class="bg-gray-50/80 rounded-2xl p-6 border border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                            <div>
                                <h4 class="font-bold text-gray-900 text-base mb-1">Kantor Privasi & Kepatuhan HijauIn</h4>
                                <p class="text-xs text-gray-500 mb-2">Gedung Pusat Inovasi Lestari, Lt. 4, Jakarta Selatan, 12940</p>
                                <p class="text-xs text-emerald-700 font-semibold">Surel Resmi: privacy@hijauin.id</p>
                            </div>
                            <div class="shrink-0">
                                <a href="mailto:privacy@hijauin.id" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-800 text-white font-medium text-xs hover:bg-emerald-900 transition-colors">
                                    <i class="fa-regular fa-envelope"></i> Kirim Surel ke DPO
                                </a>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
    </div>
</main>

<?php 
// Panggil footer 
include '../includes/footer.php'; 
?>