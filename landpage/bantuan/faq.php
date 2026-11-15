<?php 
// Panggil header dan navbar (naik satu level ke folder includes)
include '../includes/header.php'; 
include '../includes/navbar.php'; 

// Data FAQ (Bisa juga nanti diambil dari database MySQL)
$faqData = [
    [
        "category" => "Akun & Pendaftaran",
        "icon" => "fa-user-check",
        "desc" => "Panduan memulai, akses masuk, serta verifikasi profil",
        "questions" => [
            [
                "q" => "Apakah HijauIn gratis digunakan?",
                "a" => 'Pendaftaran di HijauIn sangat mudah dan hanya memakan waktu 1 menit! Klik tombol "Daftar Gratis" di pojok kanan atas, masukkan nama lengkap, email aktif, dan nomor WhatsApp. 
                        Anda juga dapat memilih opsi masuk instan menggunakan akun Google atau Apple ID. 
                        Setelah itu, verifikasi tautan yang dikirimkan ke email Anda untuk langsung mengaktifkan fitur pencatatan aksi lingkungan.'
            ],
            [
                "q" => "Bagaimana cara mendaftar akun baru HijauIn?",
                "a" => 'Kamu bisa mendaftar dengan mudah melalui beberapa langkah:
                <ol class="list-decimal list-inside space-y-1 mt-2 text-gray-600">
                    <li>Klik tombol "Daftar Gratis" di pojok kanan atas halaman.</li>
                    <li>Isi nama lengkap, alamat email aktif, serta buat kata sandi akunmu. Kamu juga bisa langsung mendaftar secara praktis menggunakan akun Google atau Apple.</li>
                    <li>Tekan "Daftar Sekarang" dan verifikasi emailmu untuk memulai mencatat aksi hijau!</li>
                </ol>'
                        
            ],
            [
                "q" => "Bagaimana jika lupa kata sandi atau email terdaftar?",
                "a" => 'Jika kamu lupa kata sandi atau email terdaftar, kamu bisa lakukan beberapa langkah berikut:
                <ol class="list-decimal list-inside space-y-1 mt-2 text-gray-600">
                    <li>Lupa Kata Sandi: Masuk ke halaman. Login, klik tautan "Lupa kata sandi?" di bawah formulir kata sandi, lalu masukan emain terdaftar.
                    Kami akan mengirimkan tautan untuk mengatur ulang sandi kamu.</li>
                    <li>Lupa Email: Kamu bisa mencoba masuk menggunakan nomor telepon yang terhubung, atau hubungi tim bantuan kami melalui menu Bantuan / Kontak.</li>
                </ol>'
                        
            ],
        ]
    ],
    [
        "category" => "Pencatatan Aksi Hijau & Eco Points",
        "icon" => "fa-leaf",
        "desc" => "Metode verifikasi, kalkulasi poin karbon, dan masa berlaku skor",
        "questions" => [
            [
                "q" => "Bagaimana cara memverifikasi foto aksi harian?",
                "a" => 'Saat menambahkan log aksi (seperti memilah sampah, membawa tumbler, atau hemat energi), kamu dapat memilih fitur "Scan Sampah / Analisis Aktivitas". 
                        Unggah foto bukti aksimu secara jelas. Sistem kecerdasan buatan (AI Green Coach) akan secara otomatis menganalisis dan memvalidasi kelayakan foto tersebut untuk memverifikasi perolehan Eco Points milikmu.'
            ],
            [
                "q" => "Berapa Eco Point yang didapat dari setiap aksi?",
                "a" => 'Perolehan Eco Point bervariasi tergantung tingkat kontribusi dan dampak lingkungan dari aksi yang kamu lakukan:<ol class="list-decimal list-inside space-y-1 mt-2 text-gray-600">
                    <li>Aksi Ringan Harian (contoh: Membawa Tumbler / Hemat Air): +15 s.d. +20 poin.</li>
                    <li>Aksi Sedang (contoh: Naik Transportasi Umum / Memilah Sampah): +25 s.d. +30 poin.</li>
                    <li>Aksi Signifikan (contoh: Menanam Pohon / Mengikuti Event Komunitas): +45 s.d. +50+ poin.</li>
                    <li>Detail perolehan poin tiap aksi dapat dilihat langsung pada menu Aktivitas & Challenge.</li>
                </ol>'
            ],
            [
                "q" => "Apakah Eco-Point bisa kadaluarsa?",
                "a" => 'Tidak. Eco Point yang berhasil kamu kumpulkan tidak memiliki batas waktu kadaluarsa (no expiration date). 
                        Poin akan terus terakumulasi di profilmu dan bisa digunakan kapan saja untuk naik level, membuka badge penghargaan, maupun ditukarkan dengan penawaran/aksi hijau lainnya.'
            ]
        ]
    ],
    [
        "category" => "Komunitas & Aksi Lapangan",
        "icon" => "fa-users",
        "desc" => "Keterlibatan kelompok regional, inisiasi chapter, dan partisipasi acara",
        "questions" => [
            [
                "q" => "Bagaimana cara bergabung dengan komunitas lokal?",
                "a" => '<ol class="list-decimal list-inside space-y-1 mt-2 text-gray-600">
                    <li>Buka tab Komunitas di navigasi utama atau dashboard kamu.</li>
                    <li>Cari komunitas berdasarkan lokasi kota atau kategori minat (seperti Zero Waste, Pencinta Pohon, Pembersih Pantai, dll.).</li>
                    <li>Klik profil komunitas yang kamu minati, lalu tekan tombol "Gabung Komunitas". Kamu bisa langsung berinteraksi dengan anggota lain dan melihat agenda kegiatan mereka.</li>
                </ol>'
            ],
            [
                "q" => "Bagaimana cara membuat komunitas sendiri di kota saya?",
                "a" => '<ol class="list-decimal list-inside space-y-1 mt-2 text-gray-600">
                    <li>Masuk ke halaman Komunitas, lalu klik tombol "+ Buat Komunitas" di bagian atas.</li>
                    <li>Lengkapi informasi komunitasmu, seperti Nama Komunitas, Deskripsi, Kategori, Lokasi Kota, serta Foto Sampul.</li>
                    <li>Klik "Publikasikan". Setelah diverifikasi oleh Administrator, komunitasmu siap untuk mengajak anggota baru dan mempublikasikan event aksi lingkungan!</li>
                </ol>'
            ],
            [
                "q" => "Bagaimana sistem registrasi event bersih pantai atau tanam pohon?",
                "a" => 'Buka halaman komunitas atau jelajahi menu Event Mendatang. Pilih event yang ingin kamu ikuti (seperti Beach Clean Up atau Aksi Tanam Pohon), lalu tekan tombol "Ikut Kegiatan". 
                        Kamu akan mendapatkan tiket digital / e-konfirmasi serta pengingat jadwal kegiatan langsung di akun HijauIn kamu.'
            ]
        ]
    ],
    [
        "category" => "Penukaran Hadiah & Dampak Lingkungan",
        "icon" => "fa-tree",
        "desc" => "Konversi poin ke penanaman pohon asli, sertifikasi, dan pemantauan satelit",
        "questions" => [
            [
                "q" => "Bagaimana cara menukar Eco Point dengan bibit pohon nyata?",
                "a" => 'Masuk ke tab Profil / Penukaran Hadiah, lalu pilih opsi "Tanam Pohon Nyata". 
                        Pilih jenis bibit atau lokasi penanaman yang tersedia, lalu tukarkan Eco Point yang kamu miliki. 
                        Setiap poin yang kamu tukarkan akan dialokasikan langsung kepada mitra komunitas lingkungan untuk ditanamkan bibit pohon riil atas namamu!'
            ],
            [
                "q" => "Di mana bibit pohon saya ditanam dan bagaimana memantaunya?",
                "a" => 'Bibit pohon kamu akan ditanam di area konservasi mitra di berbagai wilayah Indonesia (seperti area pegunungan, kawasan pesisir mangrove, atau lahan kritis). 
                        Kamu dapat memantau lokasinya secara transparan melalui fitur Impact Map & Laporan Dampak, yang melampirkan titik koordinat lokasi, status pertumbuhan pohon, serta sertifikat kontribusi hijau digital milikmu.'
            ]   
        ]
    ],
];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HijauIn - Pusat Bantuan & FAQ</title>

    <link rel="stylesheet" href="../assets/css/output.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<main class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="max-w-4xl mx-auto text-center mb-12">
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 mb-4">
            <i class="fa-solid fa-headset"></i> PUSAT INFORMASI & FAQ
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
            Pertanyaan yang Sering Diajukan (FAQ)
        </h1>
        <p class="text-gray-600 text-sm sm:text-base max-w-2xl mx-auto">
            Temukan jawaban cepat seputar cara kerja HijauIn, perhitungan Eco Point, partisipasi komunitas, hingga keamanan akun Anda.
        </p>
    </div>

    <!-- FAQ Container -->
    <div class="max-w-3xl mx-auto space-y-8">
        <?php foreach ($faqData as $catIndex => $category): ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
                <!-- Kategori Header -->
                <div class="flex items-start gap-4 mb-6 pb-4 border-b border-gray-100">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid <?= $category['icon']; ?> text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900"><?= $category['category']; ?></h2>
                        <p class="text-sm text-gray-500"><?= $category['desc']; ?></p>
                    </div>
                </div>

                <!-- List Accordion -->
                <div class="space-y-4">
                    <?php foreach ($category['questions'] as $qIndex => $item): 
                        $accordionId = "acc-" . $catIndex . "-" . $qIndex;
                    ?>
                        <div class="border border-gray-200 rounded-xl transition-all duration-200 hover:border-emerald-500">
                            <!-- Tombol Accordion -->
                            <button onclick="toggleAccordion('<?= $accordionId; ?>')" class="w-full flex items-center justify-between p-4 sm:p-5 text-left focus:outline-none">
                                <span class="font-semibold text-gray-800 text-sm sm:text-base flex items-center gap-3">
                                    <i class="fa-regular fa-circle-question text-emerald-600"></i>
                                    <?= $item['q']; ?>
                                </span>
                                <div id="icon-<?= $accordionId; ?>" class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center transition-transform duration-300 shrink-0">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </div>
                            </button>

                            <!-- Konten Jawaban -->
                            <div id="content-<?= $accordionId; ?>" class="hidden px-5 pb-5 text-gray-600 text-sm sm:text-base leading-relaxed border-t border-gray-100 pt-4">
                                <?= $item['a']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<!-- JavaScript untuk Animasi Toggle Accordion -->
<script>
function toggleAccordion(id) {
    const content = document.getElementById('content-' + id);
    const icon = document.getElementById('icon-' + id);
    
    // Cek apakah konten sedang terbuka atau tertutup
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
        icon.classList.remove('bg-gray-100', 'text-gray-600');
        icon.classList.add('bg-emerald-100', 'text-emerald-700');
    } else {
        content.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
        icon.classList.remove('bg-emerald-100', 'text-emerald-700');
        icon.classList.add('bg-gray-100', 'text-gray-600');
    }
}
</script>

<!-- Section Tidak Menemukan Jawaban (Bantuan CTA) -->
<div class="max-w-3xl mx-auto mt-12">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center">
        <!-- Icon Question Circle -->
        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 mx-auto flex items-center justify-center mb-5">
            <i class="fa-regular fa-comment-dots text-xl"></i>
        </div>

        <!-- Judul & Deskripsi -->
        <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-3">
            Tidak menemukan jawaban yang Anda cari?
        </h2>
        <p class="text-gray-500 text-sm sm:text-base max-w-xl mx-auto mb-8 leading-relaxed">
            Tim dukungan HijauIn siap mendampingi Anda 7 hari seminggu. Kami akan membantu pertanyaan teknis, kemitraan instansi, hingga aktivasi komunitas lokal.
        </p>

        <!-- Tombol Aksi -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 mb-6">
            <!-- Tombol Kirim Pesan (Hijau Pekat) -->
            <a href="hubungi-kami.php" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-emerald-800 text-white font-medium text-sm hover:bg-emerald-900 transition-colors duration-200">
                <i class="fa-regular fa-envelope"></i>
                Kirim Pesan ke Tim Dukungan
            </a>

            <!-- Tombol Kunjungi Pusat Bantuan (Hijau Muda) -->
            <a href="pusat-bantuan.php" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-emerald-100 text-emerald-800 font-medium text-sm hover:bg-emerald-200 transition-colors duration-200">
                <i class="fa-solid fa-book-open"></i>
                Kunjungi Pusat Bantuan
            </a>
        </div>

        <!-- Catatan Rata-rata Respon -->
        <p class="text-xs text-gray-400">
            Rata-rata respon bantuan: kurang dari 2 jam kerja (Senin - Minggu, 08:00 - 20:00 WIB)
        </p>
    </div>
</div>

<?php 
// Panggil footer (naik satu level ke folder includes)
include '../includes/footer.php'; 
?>