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
<main class="min-h-screen bg-gray-50 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        
        <!-- ================= BAGIAN 1: HERO SECTION ================= -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-12 mb-10">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div class="max-w-3xl">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 mb-4">
                        <i class="fa-solid fa-file-shield"></i> PERJANJIAN PENGGUNA & PEDOMAN
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                        Syarat & Ketentuan Penggunaan HijauIn
                    </h1>
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-6">
                        Pedoman bersama dan aturan penggunaan platform untuk menjaga integritas, kejujuran aksi lingkungan, dan keselamatan komunitas relawan di seluruh penjuru Indonesia.
                    </p>

                    <!-- Meta Info Dokumen -->
                    <div class="flex flex-wrap items-center gap-y-3 gap-x-6 text-sm text-gray-500">
                        <div class="flex items-center gap-2">
                            <i class="fa-regular fa-calendar text-emerald-600"></i>
                            <span>Berlaku Efektif sejak: <strong>1 Januari 2025</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-code-branch text-emerald-600"></i>
                            <span>Versi: <strong>3.1 (Pemutakhiran Karbon & Bibit)</strong></span>
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

        <!-- ================= BAGIAN 2: 3 KARTU POIN UTAMA ================= -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4 text-lg">
                        <i class="fa-solid fa-camera-retro"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kejujuran Bukti Aksi</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-6">
                        Kewajiban mengunggah dokumentasi aksi asli tanpa manipulasi AI palsu, geotag buatan, atau duplikasi foto pihak lain. Setiap klaim dampak diverifikasi demi transparansi lingkungan.
                    </p>
                </div>
                <a href="#pasal-3" class="text-xs font-bold text-emerald-700 hover:underline inline-flex items-center gap-1">
                    Rujukan: Pasal 3 <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4 text-lg">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Etika Komunitas Bersahabat</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-6">
                        Larangan mutlak terhadap ujaran kebencian, diskriminasi SARA, kampanye politik terselubung, spam komersial, serta tindakan langsung yang mencederai ekosistem alam hayati.
                    </p>
                </div>
                <a href="#pasal-4" class="text-xs font-bold text-emerald-700 hover:underline inline-flex items-center gap-1">
                    Rujukan: Pasal 4 <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4 text-lg">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Kepatuhan Eco Points</h3>
                    <p class="text-sm text-gray-600 leading-relaxed mb-6">
                        Mekanisme validasi ketat sebelum pertukaran bibit pohon fisik, merchandise daur ulang, atau sertifikat relawan resmi. Poin tidak memiliki nilai moneter tunai langsung.
                    </p>
                </div>
                <a href="#pasal-5" class="text-xs font-bold text-emerald-700 hover:underline inline-flex items-center gap-1">
                    Rujukan: Pasal 5 <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

        <!-- ================= BAGIAN 3: KONTEN UTAMA DUA KOLOM ================= -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Kolom Kiri: Daftar Isi (Sticky) (4/12) -->
            <div class="lg:col-span-4 space-y-6 sticky top-24">
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                        <h4 class="font-bold text-gray-900 flex items-center gap-2">
                            <i class="fa-solid fa-list-ul text-emerald-600"></i> Daftar Isi Pasal
                        </h4>
                        <span class="text-xs font-medium px-2.5 py-0.5 rounded-full bg-gray-100 text-gray-600">9 Bagian</span>
                    </div>

                    <nav class="space-y-1 text-sm">
                        <a href="#pasal-1" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 1: Ketentuan Umum & Definisi</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-2" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 2: Kredensial & Akun</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-3" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 3: Validasi Aksi Hijau</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-4" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 4: Ketertiban & Komunitas</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-5" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 5: Eco Points & Reward</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-6" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 6: Hak Kekayaan Intelektual</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-7" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 7: Batasan Tanggung Jawab</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-8" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 8: Penangguhan Akun</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                        <a href="#pasal-9" class="block py-2 px-3 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors flex items-center justify-between">
                            <span>Pasal 9: Hukum & Sengketa</span>
                            <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        </a>
                    </nav>
                </div>

                <!-- Box Legal Hijau Terbuka -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 space-y-2">
                    <h5 class="font-bold text-gray-900 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-emerald-600"></i> Legal Hijau Terbuka
                    </h5>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Dokumen ini diatur di bawah hukum NKRI dan selaras dengan standar transparansi data pelaporan iklim karbon publik.
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Pasal-Pasal Lengkap (8/12) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- PASAL 1 -->
                <div id="pasal-1" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 01</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 1: Ketentuan Umum & Definisi</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Selamat datang di platform HijauIn ("Platform", "Kami", atau "Layanan"). Dengan mengunduh aplikasi, mengakses situs web, mendaftarkan akun, atau ikut serta dalam aksi relawan lingkungan kami, Anda ("Pengguna" atau "Pejuang Hijau") menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan dalam perjanjian ini secara mengikat.
                    </p>

                    <!-- Box Istilah Kunci -->
                    <div class="bg-indigo-50/50 rounded-2xl p-6 border border-indigo-100/60 space-y-3">
                        <h4 class="font-bold text-gray-900 text-sm">1.1 Istilah Kunci:</h4>
                        <ul class="space-y-2 text-xs sm:text-sm text-gray-700">
                            <li><strong>"HijauIn"</strong> merujuk pada entitas ekosistem teknologi iklim yang mengelola platform pelacak aksi restorasi alam.</li>
                            <li><strong>"Pejuang Hijau"</strong> adalah setiap individu atau perwakilan organisasi yang terdaftar secara sah di platform HijauIn.</li>
                            <li><strong>"Eco Points"</strong> adalah satuan kredit reputasi aktivitas lingkungan digital yang diberikan atas verifikasi aksi nyata.</li>
                            <li><strong>"Aksi Hijau"</strong> mencakup kegiatan pemilahan sampah, penanaman pohon, restorasi terumbu, pengurangan emisi harian, dan kegiatan edukasi konservasi.</li>
                        </ul>
                    </div>

                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Jika Anda tidak menyetujui salah satu pasal dalam dokumen ini, Anda diwajibkan untuk segera menghentikan penggunaan platform HijauIn serta menghapus akun Anda melalui menu pengaturan profil.
                    </p>
                </div>

                <!-- PASAL 2 -->
                <div id="pasal-2" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 02</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 2: Pendaftaran Akun, Keamanan & Kredensial</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Untuk berpartisipasi dalam penugasan aksi dan mengumpulkan Eco Points, Pengguna wajib melakukan registrasi dengan data identitas yang akurat, mutakhir, dan dapat dipertanggungjawabkan.
                    </p>

                    <div class="space-y-3 text-xs sm:text-sm text-gray-700">
                        <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <strong>Kelayakan Usia:</strong> Platform ditujukan untuk individu berusia minimal 13 tahun. Pengguna di bawah 17 tahun wajib mendapatkan izin orang tua atau wali untuk mengikuti kegiatan lapangan luar ruang.
                        </div>
                        <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <strong>Satu Akun per Individu:</strong> Dilarang membuat multiple-account palsu (bot farming) untuk memanipulasi metrik donasi bibit pohon atau peringkat komunitas.
                        </div>
                        <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <strong>Keamanan Kredensial:</strong> Anda bertanggung jawab penuh atas kerahasiaan kata sandi, token autentikasi pihak ketiga (Google/Apple Auth), dan aktivitas apa pun yang terjadi di bawah akun Anda.
                        </div>
                    </div>

                    <!-- Peringatan Keamanan -->
                    <div class="p-4 rounded-2xl bg-rose-50 border border-rose-100 flex items-start gap-3 text-rose-900">
                        <i class="fa-solid fa-triangle-exclamation text-rose-600 mt-0.5"></i>
                        <p class="text-xs">
                            Segera laporkan kepada tim keamanan kami di <strong>security@hijauin.id</strong> apabila Anda mendeteksi akses tanpa izin atau insiden peretasan kredensial akun Anda.
                        </p>
                    </div>
                </div>

                <!-- PASAL 3 -->
                <div id="pasal-3" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 03</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 3: Pedoman Pelaksanaan & Validasi Aksi Hijau</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Integritas dampak ekologis adalah pondasi utama HijauIn. Setiap klaim dampak (seperti kilogram sampah terpilah atau bibit mangrove yang ditanam) diproses melalui sistem verifikasi bukti berbasis gambar dan metadata lokasi (EXIF/GPS).
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Kotak Kriteria Bukti Sah -->
                        <div class="bg-indigo-50/50 rounded-2xl p-5 border border-indigo-100/60 space-y-2">
                            <h4 class="font-bold text-emerald-800 text-xs sm:text-sm flex items-center gap-2">
                                <i class="fa-regular fa-circle-check"></i> Kriteria Bukti Sah
                            </h4>
                            <ul class="space-y-1.5 text-xs text-gray-600">
                                <li>• Foto diambil langsung secara real-time via kamera aplikasi atau dokumentasi asli dengan data EXIF valid.</li>
                                <li>• Geotag koordinat GPS sesuai dengan zona aksi terdaftar.</li>
                                <li>• Memperlihatkan tanda pembanding (misal timbangan resmi atau kantong berlogo HijauIn).</li>
                            </ul>
                        </div>

                        <!-- Kotak Tindakan Terlarang -->
                        <div class="bg-rose-50/50 rounded-2xl p-5 border border-rose-100/60 space-y-2">
                            <h4 class="font-bold text-rose-800 text-xs sm:text-sm flex items-center gap-2">
                                <i class="fa-regular fa-circle-xmark"></i> Tindakan Terlarang
                            </h4>
                            <ul class="space-y-1.5 text-xs text-gray-600">
                                <li>• Menggunakan gambar hasil generate kecerdasan buatan (AI synthetic media).</li>
                                <li>• Mengunggah ulang foto milik relawan lain (plagiarisme dokumentasi).</li>
                                <li>• Memalsukan koordinat (GPS spoofing) saat mencatat aksi.</li>
                            </ul>
                        </div>
                    </div>

                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        <strong>Sanksi Pelanggaran Validasi:</strong> Segala bentuk kecurangan dokumentasi akan mengakibatkan pembatalan seluruh akumulasi poin terkait aksi tersebut, penalti pengurangan reputasi, dan penangguhan hak penukaran reward selama 90 hari kalender.
                    </p>
                </div>

                <!-- PASAL 4 -->
                <div id="pasal-4" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 04</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 4: Tata Tertib Komunitas & Interaksi Lapangan</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Komunitas HijauIn bertumpu pada solidaritas, penghargaan keberagaman, dan keselamatan. Baik dalam ruang diskusi forum digital maupun perkumpulan aksi lapangan (misalnya susur sungai, bersih pantai, atau penanaman hutan kota):
                    </p>

                    <div class="space-y-3 text-xs sm:text-sm text-gray-700">
                        <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <strong>Keselamatan Fisik Diri & Tim:</strong> Pengguna wajib mematuhi standar keselamatan dasar (K3 lingkungan), memakai alat pelindung diri yang memadai (sarung tangan, pelampung pada medan perairan), dan menilai kondisi cuaca sebelum bergerak.
                        </div>
                        <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <strong>Prinsip Leave No Trace:</strong> Dilarang keras merusak flora fauna lokal, membuang limbah baru di lokasi konservasi, atau mengganggu cagar budaya setempat selama pelaksanaan aksi relawan.
                        </div>
                        <div class="p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <strong>Larangan Perilaku Berbahaya:</strong> Segala bentuk pelecehan seksual, intimidasi verbal, diskriminasi etnis/agama, atau transaksi zat terlarang saat agenda temu komunitas akan ditindaklanjuti secara pidana bersama aparat penegak hukum.
                        </div>
                    </div>
                </div>

                <!-- PASAL 5 -->
                <div id="pasal-5" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 05</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 5: Sistem Eco Points, Reward & Konversi Bibit</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Eco Points adalah bentuk apresiasi simbolis non-moneter yang merepresentasikan kontribusi hijau Pengguna:
                    </p>

                    <div class="bg-indigo-50/50 rounded-2xl p-6 border border-indigo-100/60 space-y-3">
                        <h4 class="font-bold text-gray-900 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-leaf text-emerald-600"></i> Sifat dan Ketentuan Eco Points
                        </h4>
                        <ol class="list-decimal list-inside space-y-2 text-xs sm:text-sm text-gray-700">
                            <li><strong>Bukan Alat Pembayaran Sah:</strong> Eco points bukan uang elektronik, sekuritas, aset kripto, atau saldo yang dapat ditarik tunai secara langsung ke rekening bank pengguna.</li>
                            <li><strong>Konversi Penanaman Pohon Fisik:</strong> Poin yang didedikasikan untuk penanaman pohon akan disalurkan melalui mitra pembibitan bersertifikasi HijauIn (Kelompok Tani Hutan mitra). Sertifikat digital pohon akan disertai kode pelacakan geospasial resmi.</li>
                            <li><strong>Kedaluwarsa Poin:</strong> Poin yang tidak digunakan dalam periode 24 bulan sejak tanggal perolehan dapat disalurkan secara otomatis oleh sistem ke dana konservasi publik atas nama pengguna.</li>
                        </ol>
                    </div>
                </div>

                <!-- PASAL 6 -->
                <div id="pasal-6" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 06</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 6: Hak Kekayaan Intelektual</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Seluruh hak cipta, merek dagang, desain antarmuka, kode sumber, logo HijauIn, dan materi edukasi resmi adalah hak eksklusif yang dilindungi undang-undang milik HijauIn.
                    </p>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        <strong>Konten Karya Pengguna:</strong> Dengan mengunggah foto, video narasi, artikel blog komunitas, atau laporan lapangan ke platform, Pengguna tetap mempertahankan hak kepemilikan cipta atas karyanya. Namun, Pengguna memberikan lisensi non-eksklusif, bebas royalti, berlaku global kepada HijauIn untuk menampilkan, mendokumentasikan, dan mempublikasikan karya tersebut demi keperluan pelaporan dampak iklim dan kampanye kesadaran lingkungan publik.
                    </p>
                </div>

                <!-- PASAL 7 -->
                <div id="pasal-7" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 07</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 7: Batasan Tanggung Jawab</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Platform HijauIn disediakan atas dasar "sebagaimana adanya" (as-is). Kami tidak menjamin kelangsungan akses bebas gangguan teknis jaringan telekomunikasi seluler pihak ketiga. HijauIn tidak bertanggung jawab atas cedera fisik mandiri atau kerugian material pribadi yang terjadi akibat kelalaian relawan saat melaksanakan aksi lapangan secara mandiri di luar koordinasi resmi acara komunitas.
                    </p>
                </div>

                <!-- PASAL 8 -->
                <div id="pasal-8" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 08</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 8: Penangguhan & Pemutusan Akun</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        HijauIn berhak secara sepihak membekukan, menangguhkan sementara, atau menghapus permanen akun pengguna yang terbukti melakukan pelanggaran berat terhadap Syarat & Ketentuan ini, pemalsuan dokumen aksi, atau tindakan yang membahayakan keamanan data komunitas.
                    </p>
                </div>

                <!-- PASAL 9 -->
                <div id="pasal-9" class="scroll-mt-28 bg-white rounded-3xl border border-gray-100 shadow-sm p-8 sm:p-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-bold text-xs">BAGIAN 09</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pasal 9: Hukum yang Mengatur & Penyelesaian Sengketa</h2>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Syarat dan Ketentuan ini diatur dan ditafsirkan sesuai dengan hukum yang berlaku di <strong>Negara Kesatuan Republik Indonesia</strong>.
                    </p>
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                        Segala perselisihan yang timbul sehubungan dengan penafsiran atau pelaksanaan ketentuan ini akan diselesaikan secara musyawarah mufakat terlebih dahulu dalam jangka waktu 30 (tiga puluh) hari kerja. Apabila mufakat tidak tercapai, sengketa akan diselesaikan melalui yurisdiksi Pengadilan Negeri Jakarta Pusat.
                    </p>
                </div>

                <!-- ================= KONSULTASI KEPATUHAN BOX ================= -->
                <div class="bg-indigo-50/50 rounded-3xl border border-indigo-100/60 p-8 sm:p-10 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div>
                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider block mb-1">
                            <i class="fa-regular fa-envelope"></i> KONSULTASI KEPATUHAN
                        </span>
                        <h3 class="text-lg font-extrabold text-gray-900 mb-2">Ada pertanyaan mengenai ketentuan ini?</h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-md">
                            Tim kepatuhan dan penasihat hukum komunitas kami siap mendampingi Anda untuk memastikan pemahaman hak serta tanggung jawab relawan.
                        </p>
                    </div>
                    <div class="shrink-0">
                        <a href="mailto:legal@hijauin.id" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-800 text-white font-medium text-sm hover:bg-emerald-900 shadow-sm transition-colors">
                            <i class="fa-solid fa-paper-plane"></i> Hubungi legal@hijauin.id
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

<?php 
// Panggil footer (naik satu level ke folder includes)
include '../includes/footer.php'; 
?>