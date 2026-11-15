<?php 
// Panggil header dan navbar (naik satu level ke folder includes)
include '../includes/header.php'; 
include '../includes/navbar.php'; 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<main class="min-h-screen bg-gray-50/50 pb-20">

    <!-- ================= BAGIAN 1: HERO SECTION ================= -->
    <div class="bg-white pt-12 pb-16 px-4 sm:px-6 lg:px-8 border-b border-gray-100 text-center relative overflow-hidden">
        <div class="max-w-3xl mx-auto relative z-10">
            <!-- Badge Top -->
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 mb-6">
                <i class="fa-solid fa-headset"></i> LAYANAN DUKUNGAN & KOLABORASI
            </span>

            <!-- Judul Utama -->
            <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight mb-4">
                Kami Siap Mendengar & Membantu
            </h1>

            <!-- Sub-judul -->
            <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed mb-6">
                Punya pertanyaan teknis, kendala pencatatan aksi, atau ingin berkolaborasi menyelenggarakan kampanye lingkungan? Hubungi tim kami kapan saja.
            </p>

            <!-- Status Tiket Aktif -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-50 border border-gray-200 text-xs font-medium text-gray-700">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Sistem Tiket Aktif • Waktu tanggap rata-rata: <strong class="text-emerald-700">12 Menit</strong></span>
            </div>
        </div>
    </div>

    <!-- ================= BAGIAN 2: 4 KARTU KONTAK UTAMA ================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 mb-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card 1: WhatsApp -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-7 flex flex-col justify-between relative group hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl">
                        <i class="fa-comment-dots fa-regular"></i>
                    </div>
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs text-gray-400 group-hover:text-emerald-600 transition-colors"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">WhatsApp Cepat</h3>
                    <p class="text-xs sm:text-sm text-gray-500 mb-6 leading-relaxed">
                        Konsultasi cepat dengan staf kami untuk pertanyaan instan.
                    </p>
                </div>
                <div>
                    <a href="https://wa.me/6281234567890" target="_blank" class="block font-bold text-emerald-700 hover:underline text-sm mb-1">
                        +62 812-3456-7890
                    </a>
                    <span class="text-[11px] text-gray-400 flex items-center gap-1">
                        <i class="fa-regular fa-clock"></i> Respon &lt; 15 mnt saat jam kerja
                    </span>
                </div>
            </div>

            <!-- Card 2: Email Resmi -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-7 flex flex-col justify-between relative group hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-700 flex items-center justify-center text-xl">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <i class="fa-regular fa-paper-plane text-xs text-gray-400"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Email Resmi</h3>
                    <p class="text-xs sm:text-sm text-gray-500 mb-6 leading-relaxed">
                        Untuk proposal kerja sama, verifikasi media, & korespondensi formal.
                    </p>
                </div>
                <div class="space-y-1 text-sm font-semibold">
                    <a href="mailto:hello@hijauin.id" class="block text-emerald-700 hover:underline">hello@hijauin.id</a>
                    <a href="mailto:partnership@hijauin.id" class="block text-emerald-700 hover:underline">partnership@hijauin.id</a>
                </div>
            </div>

            <!-- Card 3: Jam Operasional -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-7 flex flex-col justify-between">
                <div class="flex items-start justify-between mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-700 flex items-center justify-center text-xl">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <i class="fa-regular fa-calendar-check text-xs text-gray-400"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Jam Operasional</h3>
                    <p class="text-xs sm:text-sm text-gray-500 mb-6 leading-relaxed">
                        Jadwal operasional tim customer success & verifikator lapangan.
                    </p>
                </div>
                <div class="space-y-2 text-xs">
                    <div class="flex justify-between items-center text-gray-600">
                        <span>Senin - Jumat</span>
                        <strong class="text-gray-900">08.00 - 18.00 WIB</strong>
                    </div>
                    <div class="flex justify-between items-center text-gray-600">
                        <span>Sabtu</span>
                        <strong class="text-gray-900">09.00 - 15.00 WIB</strong>
                    </div>
                </div>
            </div>

            <!-- Card 4: Sekretariat & Hub -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-7 flex flex-col justify-between">
                <div class="flex items-start justify-between mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-700 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <i class="fa-regular fa-compass text-xs text-gray-400"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Sekretariat & Hub</h3>
                    <p class="text-xs sm:text-sm text-gray-500 mb-6 leading-relaxed">
                        Pusat riset botani & koordinasi aksi relawan HijauIn Jawa Timur.
                    </p>
                </div>
                <p class="text-xs text-gray-700 leading-relaxed font-medium">
                    Jl. Soekarno Hatta No.9, Mojolangu, Lowokwaru, Jawa Timur 65141
                </p>
            </div>

        </div>
    </div>

    <!-- ================= BAGIAN 3: DUA KOLOM (KIRI INFO & KANAN FORMULIR) ================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- KOLOM KIRI: INFO & KUNJUNGAN SEKRETARIAT (4/12) -->
            <div class="lg:col-span-5 space-y-6">
                <!-- Box Intro Dialog -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-8 space-y-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center">
                        <i class="fa-solid fa-seedling"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-gray-900">Aksi Kolektif Berawal dari Dialog Terbuka</h3>
                    <p class="text-xs sm:text-sm text-gray-500 leading-relaxed">
                        Setiap pesan Anda diperlakukan sebagai kontribusi berharga. Tim moderasi dan relawan kami berkomitmen menjaga kelancaran verifikasi pohon, bank sampah digital, dan program edukasi sekolah.
                    </p>
                    <div class="pt-2 border-t border-gray-100 flex items-center justify-between text-xs">
                        <span class="text-gray-500">Tingkat Kepuasan Pengguna</span>
                        <strong class="text-emerald-700 font-bold">98.4% Terlayani Cepat</strong>
                    </div>
                </div>

                <!-- Box Foto Ruang Kolaborasi -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-3 relative overflow-hidden group">
                    <div class="rounded-2xl overflow-hidden h-48 bg-gray-100 relative">
                        <img src="../assets/images/hub-jember.jpg" alt="Ruang Kolaborasi HijauIn Hub Jember" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80'">
                        <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-md text-white text-[11px] px-3 py-1 rounded-full flex items-center gap-1.5">
                            <i class="fa-solid fa-camera"></i> Ruang Kolaborasi HijauIn Hub Malang
                        </div>
                    </div>
                </div>

                <!-- Box Kunjungan Sekretariat & Peta -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-8 space-y-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-gray-900 text-base">Kunjungan Sekretariat</h4>
                            <p class="text-xs text-gray-500">Terbuka untuk kunjungan komunitas & studi banding</p>
                        </div>
                        <i class="fa-solid fa-map-location-dot text-emerald-600 text-xl"></i>
                    </div>

                    <!-- Mini Map Card -->
                    <div class="border border-gray-200 rounded-2xl p-4 bg-gray-50 flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold text-gray-900 block">Kampus POLINEMA Area</span>
                            <span class="text-[11px] text-gray-500"> Jl. Soekarno Hatta No.9, Mojolangu, Lowokwaru, Jawa Timur 65141</span>
                        </div>
                        <a href="https://maps.google.com" target="_blank" class="px-3 py-1.5 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold hover:bg-emerald-200 transition-colors flex items-center gap-1">
                            Buka Maps <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                        </a>
                    </div>

                    <ul class="space-y-2 text-xs text-gray-600">
                        <li class="flex items-center gap-2">
                            <i class="fa-regular fa-circle-check text-emerald-600"></i> Tersedia stasiun pengisian tumbler gratis
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-regular fa-circle-check text-emerald-600"></i> Drop-box sampah elektronik & pilah plastik binaan
                        </li>
                    </ul>
                </div>
            </div>

            <!-- KOLOM KANAN: FORMULIR BUAT TIKET BANTUAN BARU (7/12) -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-10 space-y-6">
                    <div>
                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider block mb-1">FORMULIR RESMI</span>
                        <h2 class="text-2xl font-extrabold text-gray-900">Buat Tiket Bantuan Baru</h2>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">Silakan isi rincian di bawah ini. Tiket Anda akan langsung didisposisikan ke divisi terkait.</p>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
                        <!-- Baris 1: Nama & Email -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Lengkap *</label>
                                <div class="relative">
                                    <input type="text" name="nama" required placeholder="Contoh: Budi Pratama" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm focus:outline-none focus:border-emerald-600 pr-10">
                                    <i class="fa-regular fa-user absolute right-3.5 top-3 text-gray-400 text-xs"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1.5">Alamat Email Aktif *</label>
                                <div class="relative">
                                    <input type="email" name="email" required placeholder="budi@contoh.id" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm focus:outline-none focus:border-emerald-600 pr-10">
                                    <i class="fa-regular fa-envelope absolute right-3.5 top-3 text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 2: Nomor WA & Kategori -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1.5">Nomor WhatsApp / Telepon *</label>
                                <div class="relative">
                                    <input type="tel" name="whatsapp" required placeholder="0812-xxxx-xxxx" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm focus:outline-none focus:border-emerald-600 pr-10">
                                    <i class="fa-solid fa-phone absolute right-3.5 top-3 text-gray-400 text-xs"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1.5">Kategori Kepentingan *</label>
                                <select name="kategori" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm focus:outline-none focus:border-emerald-600 text-gray-600 appearance-none bg-no-repeat bg-right pr-8">
                                    <option value="" disabled selected>Pilih kategori kebutuhan...</option>
                                    <option value="bantuan-teknis">Bantuan Teknis & Aplikasi</option>
                                    <option value="eco-point">Pencatatan Aksi & Eco Point</option>
                                    <option value="kolaborasi">Kolaborasi & Kemitraan Komunitas</option>
                                    <option value="csr">Corporate CSR & Sponsorship</option>
                                </select>
                            </div>
                        </div>

                        <!-- Subjek Pesan -->
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5">Subjek Pesan *</label>
                            <input type="text" name="subjek" required placeholder="Ringkasan singkat kendala atau usulan kolaborasi Anda" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-xs sm:text-sm focus:outline-none focus:border-emerald-600">
                        </div>

                        <!-- Deskripsi Pesan -->
                        <div>
                            <div class="flex justify-between items-center mb-1.5">
                                <label class="block text-xs font-bold text-gray-700">Deskripsi Pesan / Kendala *</label>
                                <span class="text-[11px] text-gray-400">Minimal 20 karakter</span>
                            </div>
                            <textarea name="deskripsi" rows="4" required placeholder="Tuliskan kronologi kendala atau deskripsi usulan kemitraan Anda secara rinci, sertakan ID akun atau tanggal kejadian jika relevan..." class="w-full px-4 py-3 rounded-xl border border-gray-200 text-xs sm:text-sm focus:outline-none focus:border-emerald-600"></textarea>
                            <p class="text-[11px] text-gray-400 mt-1">
                                <i class="fa-regular fa-circle-question"></i> Petunjuk: Jika terkait Eco Point, sebutkan nama lokasi tanam atau nama bank sampah mitra.
                            </p>
                        </div>

                        <!-- Upload Lampiran -->
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5">Upload Lampiran Bukti <span class="font-normal text-gray-400">(Opsional - PDF, PNG, JPG maks 5MB)</span></label>
                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 text-center hover:border-emerald-500 transition-colors cursor-pointer bg-gray-50/50">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 mx-auto flex items-center justify-center mb-2">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </div>
                                <span class="text-xs font-bold text-gray-800 block">Klik untuk memilih file atau seret ke sini</span>
                                <span class="text-[11px] text-gray-400 block mt-0.5">Screenshot error aplikasi, sertifikat aksi, atau dokumen proposal kemitraan</span>
                                <input type="file" name="lampiran" class="hidden">
                            </div>
                        </div>

                        <!-- Checkbox Persetujuan -->
                        <div class="flex items-start gap-2.5 pt-2">
                            <input type="checkbox" id="persetujuan" required class="mt-1 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                            <label for="persetujuan" class="text-xs text-gray-600 leading-relaxed">
                                Saya menyetujui bahwa data yang dikirimkan akan diproses oleh tim HijauIn sesuai dengan <a href="kebijakan-privasi.php" class="text-emerald-700 font-semibold underline">Kebijakan Privasi</a> dan <a href="#" class="text-emerald-700 font-semibold underline">Pedoman Komunitas</a> kami.
                            </label>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="w-full py-3.5 rounded-xl bg-emerald-800 text-white font-bold text-sm hover:bg-emerald-900 transition-colors shadow-sm flex items-center justify-center gap-2">
                            <span>Kirim Tiket Bantuan</span>
                            <i class="fa-solid fa-paper-plane text-xs"></i>
                        </button>

                        <p class="text-[11px] text-gray-400 text-center flex items-center justify-center gap-1">
                            <i class="fa-solid fa-lock text-[10px]"></i> Transmisi data Anda dienkripsi aman 256-bit SSL.
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- ================= BAGIAN 4: FAQ RINGKAS DI BAWAH ================= -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-gray-200/60 pt-16">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider block mb-1">SOLUSI CEPAT MANDIRI</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-2">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-xs sm:text-sm text-gray-500">Mungkin jawaban untuk kendala Anda sudah tersedia di bawah ini sebelum membuat tiket pengaduan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- FAQ 1 -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 flex flex-col justify-between">
                <div>
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold mb-4">01</span>
                    <h3 class="font-bold text-gray-900 text-base mb-2">Berapa lama verifikasi Eco Point setelah menanam?</h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-6">
                        Verifikasi bukti tanam bibit pohon memerlukan waktu $1\times24$ jam kerja melalui pencocokan koordinat geotag foto oleh relawan kurator HijauIn setempat.
                    </p>
                </div>
                <a href="faq.php" class="text-xs font-bold text-emerald-700 hover:underline inline-flex items-center gap-1">
                    Baca Panduan Geotag <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 flex flex-col justify-between">
                <div>
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold mb-4">02</span>
                    <h3 class="font-bold text-gray-900 text-base mb-2">Bagaimana cara mendaftarkan komunitas untuk kolaborasi aksi?</h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-6">
                        Pilih kategori 'Kolaborasi & Kemitraan Komunitas' pada formulir tiket di atas, dan cantumkan profil organisasi atau proposal agenda kegiatan hijau Anda.
                    </p>
                </div>
                <a href="#" class="text-xs font-bold text-emerald-700 hover:underline inline-flex items-center gap-1">
                    Unduh Format Proposal <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 flex flex-col justify-between">
                <div>
                    <span class="inline-block px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold mb-4">03</span>
                    <h3 class="font-bold text-gray-900 text-base mb-2">Lupa kata sandi atau kendala masuk akun HijauIn?</h3>
                    <p class="text-xs text-gray-500 leading-relaxed mb-6">
                        Gunakan tautan 'Lupa Sandi' di halaman Masuk, masukkan nomor WhatsApp atau email terdaftar untuk menerima kode OTP pemulihan instan 6 digit.
                    </p>
                </div>
                <a href="faq.php" class="text-xs font-bold text-emerald-700 hover:underline inline-flex items-center gap-1">
                    Pusat Pemulihan Akun <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-gray-500">
            Masih butuh penjelasan lebih detail? Kunjungi direktori lengkap kami di <a href="pusat-bantuan.php" class="text-emerald-700 font-bold hover:underline">Pusat Pengetahuan HijauIn <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i></a>
        </p>
    </div>

</main>

<?php 
// Panggil footer (naik satu level ke folder includes)
include '../includes/footer.php'; 
?>