<?php
// 1. Panggil Header (Layout Atas: <head>, Navbar, Tailwind, FontAwesome)
include '../includes/header.php';
include '../includes/navbar.php';

// --- DATA ARRAY HALAMAN CARA KERJA ---
$steps = [
    [
        "num" => "01",
        "icon" => "/assets/beranda/catataksi3.png",
        "title" => "Catat Aksi",
        "desc" => "Catat aksi ramah lingkunganmu setiap hari dengan mudah.",
    ],
    [
        "num" => "02",
        "icon" => "/assets/beranda/ai-rekomendasi.png",
        "title" => "AI Menganalisis",
        "desc" => "AI menganalisis aksimu dan memberi insight personal yang cerdas.",
    ],
    [
        "num" => "03",
        "icon" => "/assets/cara-kerja/poin.png",
        "title" => "Dapatkan Poin",
        "desc" => "Setiap aksi positif akan memberikan Eco Score yang bisa kamu lihat.",
    ],
    [
        "num" => "04",
        "icon" => "/assets/beranda/ikutchallange.png",
        "title" => "Ikut Challenge",
        "desc" => "Ikuti tantangan seru dan selesaikan misi untuk meraih hadiah menarik.",
    ],
    [
        "num" => "05",
        "icon" => "/assets/cara-kerja/bumi.png",
        "title" => "Berdampak Nyata",
        "desc" => "Lihat laporan dampakmu dan kontribusimu untuk bumi yang lebih baik.",
    ],
];

$flows = [
    [
        "icon" => "/assets/beranda/person.png",
        "title" => "Pengguna",
        "desc" => "",
    ],
    [
        "icon" => "/assets/beranda/catataksi.png",
        "title" => "Catat Aksi",
        "desc" => "Data aksi harian dikirim ke sistem",
    ],
    [
        "icon" => "/assets/beranda/ai-rekomendasi.png",
        "title" => "AI Green Coach",
        "desc" => "AI memverifikasi dan memberi insight",
    ],
    [
        "icon" => "/assets/beranda/eco-score.png",
        "title" => "Eco Score",
        "desc" => "Poin dihitung dan ditambahkan",
    ],
    [
        "icon" => "/assets/beranda/pantaudampak.png",
        "title" => "Dashboard",
        "desc" => "Data ditampilkan secara real-time",
    ],
    [
        "icon" => "/assets/cara-kerja/laporan.png",
        "title" => "Laporan Dampak",
        "desc" => "Dampak positifmu tercatat dan terukur",
    ],
];

$journeys = [
    [
        "day" => "Senin",
        "icon" => "/assets/cara-kerja/sepeda.png",
        "title" => "Naik sepeda<br />ke kampus",
        "point" => "+30 poin",
        "desc" => "Mengurangi emisi<br />CO₂",
    ],
    [
        "day" => "Selasa",
        "icon" => "/assets/cara-kerja/botol.png",
        "title" => "Bawa tumbler<br />sendiri",
        "point" => "+20 poin",
        "desc" => "Mengurangi sampah<br />plastik",
    ],
    [
        "day" => "Rabu",
        "icon" => "/assets/air.png",
        "title" => "Hemat air saat<br />mandi",
        "point" => "+15 poin",
        "desc" => "Menghemat<br />penggunaan air",
    ],
    [
        "day" => "Kamis",
        "icon" => "/assets/cara-kerja/pot.png",
        "title" => "Menanam<br />tanaman",
        "point" => "+40 poin",
        "desc" => "Meningkatkan<br />kualitas udara",
    ],
    [
        "day" => "Jumat",
        "icon" => "/assets/cara-kerja/bus.png",
        "title" => "Naik transportasi<br />umum",
        "point" => "+25 poin",
        "desc" => "Mengurangi polusi<br />udara",
    ],
    [
        "day" => "Sabtu",
        "icon" => "/assets/cara-kerja/tas.png",
        "title" => "Pilah sampah<br />rumah",
        "point" => "+20 poin",
        "desc" => "Mendukung daur<br />ulang",
    ],
    [
        "day" => "Minggu",
        "icon" => "/assets/cara-kerja/trophy.png",
        "title" => "Selesaikan<br />challenge",
        "point" => "+50 poin",
        "desc" => "Dapat badge baru<br />dan reward",
    ],
];

$features = [
    [
        "icon" => '<i class="fa-solid fa-circle-check text-[#11773D] text-2xl"></i>',
        "title" => "Mudah Dilakukan",
        "desc" => "Langkah sederhana yang bisa kamu lakukan kapan saja dan di mana saja.",
        "is_html" => true
    ],
    [
        "icon" => "/assets/beranda/ai-rekomendasi.png",
        "title" => "Insight Personal",
        "desc" => "AI memberikan rekomendasi yang sesuai dengan kebiasaan dan gaya hidupmu.",
        "is_html" => false
    ],
    [
        "icon" => "/assets/beranda/ikutchallange.png",
        "title" => "Motivasi Konsisten",
        "desc" => "Challenge, poin, dan badge membuatmu lebih semangat untuk terus beraksi.",
        "is_html" => false
    ],
    [
        "icon" => "/assets/cara-kerja/bumi.png",
        "title" => "Dampak Nyata",
        "desc" => "Setiap aksi tercatat dan memberikan dampak positif nyata untuk bumi.",
        "is_html" => false
    ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HijauIn - Selamatkan Bumi!</title>
    
    <!-- 1. Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- 2. FontAwesome untuk Ikon (Termasuk ikon panah, dll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- 3. AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">
<div class="flex flex-col bg-white items-center w-full overflow-hidden">
    
    <!-- Header Section -->
    <section class="relative flex w-full px-16 pt-24 overflow-hidden text-left">
        <div class="w-1/2" data-aos="fade-right">
            <div class="text-[#11773D] inline-flex items-center gap-2 px-4 py-2 mb-8 text-base font-semibold bg-[#F2FAF3] rounded-full">
                <i class="fa-solid fa-circle-check"></i> Cara Kerja HijauIn
            </div>
            <h1 class="mb-8 text-6xl font-bold leading-tight text-gray-900">
                5 Langkah Mudah <br /> Menuju Bumi yang <br />
                <span class="text-[#11773D]">Lebih Hijau</span>
            </h1>
            <p class="mb-12 text-xl text-gray-600">
                HijauIn membantumu mencatat aksi ramah lingkungan, mendapatkan <br />
                insight dari AI, dan melihat dampak nyatanya. <br /> Semua dalam satu platform.
            </p>
            <button class="group mb-12 inline-flex h-[50px] items-center gap-4 rounded-2xl border border-[#9FD4AF] bg-white px-7 text-[18px] font-semibold text-[#076635] transition-all duration-300 hover:bg-[#F4FAF5]">
                <span>Lihat Fitur Lengkap</span>
                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-[#076635] text-white transition-transform duration-300 group-hover:translate-x-1">
                    <i class="fa-solid fa-arrow-right text-[12px]"></i>
                </span>
            </button>
        </div>
        <div class="h-[600px] relative w-1/2 mx-auto overflow-hidden" data-aos="fade-left" data-aos-delay="200">
            <img src="/assets/cara-kerja/her.png" alt="App Mockup" class="absolute inset-0 h-full w-full object-cover" />
        </div>
    </section>

    <!-- 5 Steps Diagram -->
    <section class="w-full px-16 py-24">
        <div class="mb-16 text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900">
                Bagaimana <span class="text-[#11773D]">HijauIn</span> Bekerja?
            </h2>
            <p class="mt-3 text-lg text-gray-500">
                <span class="font-semibold text-[#11773D]">HijauIn</span> bekerja dalam 5 langkah sederhana yang saling terhubung.
            </p>
        </div>

        <div class="relative flex justify-between">
            <div class="absolute top-[17px] left-0 right-0 border-t-2 border-dashed border-gray-300"></div>

            <?php foreach ($steps as $index => $step): 
                $delay = $index * 150;
            ?>
                <div class="relative z-10 flex w-56 flex-col items-center text-center" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="mb-10 flex h-9 w-9 items-center justify-center rounded-full bg-[#11773D] text-sm font-bold text-white shadow">
                        <?= $step['num'] ?>
                    </div>

                    <div class="mb-6 flex h-28 w-28 items-center justify-center rounded-full bg-[#F1F8F2] shadow-sm transition-transform duration-300 hover:scale-110">
                        <img src="<?= $step['icon'] ?>" alt="<?= $step['title'] ?>" width="68" height="68" class="object-contain" />
                    </div>

                    <h3 class="mb-3 text-xl font-bold text-gray-900">
                        <?= $step['title'] ?>
                    </h3>

                    <p class="max-w-[180px] text-base leading-8 text-gray-500">
                        <?= $step['desc'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- System Flow -->
    <section class="w-full px-16 py-24">
        <div class="text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold">
                Alur Sistem <span class="text-[#11773D]">HijauIn</span>
            </h2>
            <p class="mt-3 text-lg text-gray-500">
                Data dan informasi mengalir untuk memberikan pengalaman terbaik.
            </p>
        </div>

        <div class="mt-16 flex items-start justify-between">
            <?php foreach ($flows as $index => $item): 
                $delay = $index * 200;
            ?>
                <div class="flex items-start">
                    <div class="flex w-40 flex-col items-center text-center" data-aos="zoom-in" data-aos-delay="<?= $delay ?>">
                        <div class="flex h-24 w-24 items-center justify-center rounded-full bg-[#F2F8F2]">
                            <img src="<?= $item['icon'] ?>" alt="<?= $item['title'] ?>" width="56" height="56" class="object-contain" />
                        </div>

                        <h3 class="mt-5 text-xl font-bold text-gray-900">
                            <?= $item['title'] ?>
                        </h3>

                        <?php if (!empty($item['desc'])): ?>
                            <p class="mt-3 text-base leading-7 text-gray-500">
                                <?= $item['desc'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <?php if ($index < count($flows) - 1): 
                        $arrowDelay = $delay + 100;
                    ?>
                        <div class="mx-5 mt-10" data-aos="fade-left" data-aos-delay="<?= $arrowDelay ?>">
                            <i class="fa-solid fa-arrow-right text-lg text-[#11773D]"></i>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Perjalanan Aksi Pengguna -->
    <section class="w-full px-16 pt-24 overflow-hidden">
        <div class="text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold">Perjalanan Aksi Pengguna</h2>
            <p class="mt-4 text-xl text-gray-500">
                Contoh perjalanan aksi hijau dalam 1 minggu.
            </p>
        </div>

        <div class="relative mt-14">
            <div class="absolute bottom-[-22px] left-0 right-0 border-t-2 border-dashed border-gray-200"></div>

            <div class="flex justify-between gap-4">
                <?php foreach ($journeys as $index => $item): 
                    $delay = $index * 100;
                    $dotDelay = $delay + 150;
                ?>
                    <div class="flex w-full flex-col items-center" data-aos="fade-left" data-aos-delay="<?= $delay ?>">
                        <div class="relative w-full rounded-2xl border border-gray-100 bg-white px-4 pb-8 pt-10 shadow-sm transition-shadow hover:shadow-md">
                            <div class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 rounded-md bg-[#11773D] px-5 py-1 text-sm font-bold text-white">
                                <?= $item['day'] ?>
                            </div>

                            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#F3F8F2]">
                                <img src="<?= $item['icon'] ?>" alt="<?= $item['day'] ?>" width="52" height="52" />
                            </div>

                            <h3 class="mt-5 text-center text-lg font-bold leading-7 text-gray-900">
                                <?= $item['title'] ?>
                            </h3>

                            <p class="mt-4 text-center text-xl font-bold text-[#11773D]">
                                <?= $item['point'] ?>
                            </p>

                            <p class="mt-4 text-center text-sm leading-7 text-gray-500">
                                <?= $item['desc'] ?>
                            </p>
                        </div>

                        <div class="relative z-10 mt-8 h-3 w-3 rounded-full bg-[#11773D]" data-aos="zoom-in" data-aos-delay="<?= $dotDelay ?>"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Banner -->
        <div class="relative mt-16 mx-auto flex max-w-6xl items-center justify-between overflow-hidden rounded-[40px] bg-white px-10 py-8" data-aos="flip-up" data-aos-delay="300">
            <div class="absolute left-0 top-1/2 h-56 w-[1020px] -translate-y-1/2 rounded-full bg-[#EEF8EE]"></div>

            <div class="relative z-10 flex items-center gap-6">
                <img src="/assets/cara-kerja/daun.png" alt="" width="120" height="120" class="-ml-5" />

                <div>
                    <p class="text-lg -mt-8 text-gray-500">Total Mingguan</p>
                    <p class="text-4xl mt-5 font-bold text-[#11773D]">+200 poin</p>
                </div>

                <div class="mx-6 h-20 w-px bg-green-200"></div>

                <p class="max-w-md text-xl font-medium leading-9 text-gray-700">
                    Terus konsisten dan tingkatkan dampak positifmu untuk bumi setiap hari!
                </p>
            </div>

            <img src="/assets/cara-kerja/bumi2.png" alt="" width="200" height="200" class="relative z-10" />
        </div>
    </section>

    <!-- Mengapa Cara Ini Efektif -->
    <section class="w-full bg-white px-16 pt-24">
        <div class="mb-16 text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900">Mengapa Cara Ini Efektif?</h2>
        </div>

        <div class="grid grid-cols-4 gap-8">
            <?php foreach ($features as $index => $item): 
                $delay = $index * 100;
            ?>
                <div class="rounded-3xl border border-gray-200 bg-white px-6 py-5 shadow-[0_2px_10px_rgba(0,0,0,0.04)] transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#F2F8F2]">
                            <?php if ($item['is_html']): ?>
                                <?= $item['icon'] ?>
                            <?php else: ?>
                                <img src="<?= $item['icon'] ?>" alt="<?= $item['title'] ?>" width="28" height="28" class="object-contain" />
                            <?php endif; ?>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900">
                            <?= $item['title'] ?>
                        </h3>
                    </div>

                    <p class="mt-4 pl-16 text-base leading-8 text-gray-500">
                        <?= $item['desc'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

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
</body>
<?php
    include '../includes/footer.php';
?>
