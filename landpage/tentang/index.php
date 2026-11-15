<?php 
// 1. Panggil Header & Navbar
include '../includes/header.php'; 
include '../includes/navbar.php'; 
?>

<?php
// Data Values (Hero Bottom Cards)
$values = [
    [
        "icon" => "/assets/tentang-kami/target.png",
        "title" => "Aksi Kecil Dampak Besar",
        "desc" => "Setiap aksi sederhana yang kamu lakukan, berkontribusi untuk perubahan besar bagi bumi.",
    ],
    [
        "icon" => "/assets/tentang-kami/person.png",
        "title" => "Bersama Komunitas",
        "desc" => "Bergerak bersama komunitas peduli lingkungan untuk menginspirasi dan saling mendukung.",
    ],
    [
        "icon" => "/assets/tentang-kami/chart.png",
        "title" => "Data & Teknologi untuk Perubahan",
        "desc" => "Menggunakan teknologi dan data untuk melacak, memahami, dan memaksimalkan dampak positif kita bersama.",
    ],
];

// Data Misi, Visi & Nilai Kami
$missions = [
    [
        "icon" => "/assets/tentang-kami/target.png",
        "title" => "Misi",
        "desc" => "Memberdayakan setiap individu\nmelalui teknologi dan komunitas\nuntuk melakukan aksi positif bagi\nlingkungan setiap hari.",
    ],
    [
        "icon" => "/assets/tentang-kami/eye.png",
        "title" => "Visi",
        "desc" => "Menjadi platform terdepan di Indonesia\nyang mendorong gaya hidup berkelanjutan\nmelalui teknologi, edukasi, dan\nkolaborasi komunitas.",
    ],
    [
        "icon" => "/assets/tentang-kami/lovr.png",
        "title" => "Nilai Kami",
        "values" => [
            "Peduli Lingkungan",
            "Inovatif & Adaptif",
            "Kolaboratif",
            "Transparan & Terpercaya",
        ],
    ],
];

// Data Perjalanan / Timeline
$journey = [
    [
        "icon" => "/assets/tentang-kami/tanaman.png",
        "year" => "2022",
        "desc" => "Berawal dari ide kecil\nuntuk mendorong\nkebiasaan hijau di\nsekitar kita.",
    ],
    [
        "icon" => "/assets/tentang-kami/person2.png",
        "year" => "2023",
        "desc" => "HijauIn mulai\ndikembangkan dan\nmembangun komunitas\npertama.",
    ],
    [
        "icon" => "/assets/tentang-kami/roket.png",
        "year" => "2024",
        "desc" => "Platform resmi diluncurkan\ndan ribuan pengguna\nmulai bergabung.",
    ],
    [
        "icon" => "/assets/tentang-kami/bumi.png",
        "year" => "2025",
        "desc" => "Ekspansi ke berbagai\nkota di Indonesia dan\nbekerja sama dengan\nberbagai organisasi.",
    ],
    [
        "icon" => "/assets/tentang-kami/pohon.png",
        "year" => "Masa Depan",
        "desc" => "Terus berinovasi untuk\nmenciptakan dampak\npositif yang lebih besar\nbagi bumi.",
    ],
];

// Data Statistik Dampak
$stats = [
    [
        "icon" => "/assets/tentang-kami/daun.png",
        "value" => "125.430+",
        "label" => "Aksi Hijau Tercatat",
    ],
    [
        "icon" => "/assets/tentang-kami/person2.png",
        "value" => "15.000+",
        "label" => "Komunitas Aktif",
    ],
    [
        "icon" => "/assets/tentang-kami/bumi.png",
        "value" => "320+",
        "label" => "Kota di Indonesia",
    ],
    [
        "icon" => "/assets/tentang-kami/co2.png",
        "value" => "82.340+ kg",
        "label" => "CO₂ Berhasil Dikurangi",
    ],
    [
        "icon" => "/assets/tentang-kami/pohon.png",
        "value" => "5.243",
        "label" => "Pohon Ditanam",
    ],
];

// Data Fitur / Mengapa HijauIn
$features = [
    [
        "icon" => "/assets/tentang-kami/hp2.png",
        "title" => "Mudah Digunakan",
        "desc" => "Antarmuka yang sederhana membuat siapa saja\nbisa mulai hidup hijau dengan mudah.",
    ],
    [
        "icon" => "/assets/tentang-kami/bumi2.png",
        "title" => "Dampak Nyata",
        "desc" => "Setiap aksimu tercatat dan memberikan dampak\npositif nyata untuk bumi.",
    ],
    [
        "icon" => "/assets/tentang-kami/person3.png",
        "title" => "Komunitas Positif",
        "desc" => "Bergabung dengan ribuan orang yang memiliki\nvisi yang sama untuk bumi yang lebih baik.",
    ],
    [
        "icon" => "/assets/tentang-kami/keamanan.png",
        "title" => "Aman & Terpercaya",
        "desc" => "Data kamu aman bersama kami dan hanya digunakan\nuntuk tujuan kebaikan.",
    ],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - HijauIn</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white flex flex-col items-center w-full">

    <main class="bg-white flex flex-col items-center w-full">
        <!-- Hero Section -->
        <section class="relative mx-auto flex w-full flex-col items-center justify-center overflow-hidden bg-white px-16 pt-24 pb-16">
            <div class="mb-16 flex w-full items-center justify-between">
                <!-- Left Text Content -->
                <div class="z-10 w-1/2 pr-12">
                    <!-- Badge -->
                    <div
                        data-aos="fade-down"
                        data-aos-duration="700"
                        class="mb-5 inline-flex items-center gap-2 rounded-full bg-[#F2FAF3] px-4 py-2 text-base font-semibold text-[#11773D]"
                    >
                        <i class="fa-solid fa-leaf text-base"></i>
                        Tentang HijauIn
                    </div>

                    <!-- Heading -->
                    <h1
                        data-aos="fade-right"
                        data-aos-delay="150"
                        data-aos-duration="900"
                        class="mb-6 text-[60px] font-bold leading-[1.12] tracking-[-0.03em] text-[#0B0F1F]"
                    >
                        Teknologi untuk
                        <br />
                        Hidup yang <span class="text-[#11773D]">Lebih Hijau</span>
                    </h1>

                    <!-- Description -->
                    <p
                        data-aos="fade-right"
                        data-aos-delay="300"
                        data-aos-duration="900"
                        class="mb-8 max-w-[520px] text-[18px] leading-9 text-[#667085]"
                    >
                        HijauIn adalah platform digital yang menghubungkan teknologi, kebiasaan positif, dan komunitas untuk menciptakan dampak nyata bagi bumi dan generasi mendatang.
                    </p>

                    <!-- Button -->
                    <button
                        data-aos="fade-up"
                        data-aos-delay="450"
                        data-aos-duration="800"
                        class="flex h-[54px] items-center gap-2 rounded-xl border border-[#11773D] bg-white px-7 text-[16px] font-semibold text-[#11773D] transition hover:bg-[#F4FAF5] cursor-pointer"
                    >
                        Misi Kami
                        <i class="fa-solid fa-arrow-right text-[13px]"></i>
                    </button>
                </div>

                <!-- Right Image Content -->
                <div
                    data-aos="fade-left"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                    class="relative z-10 h-[500px] w-1/2"
                >
                    <!-- Decorative Background Blob -->
                    <div class="absolute top-1/2 left-1/2 -z-10 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#EAF7EF] blur-3xl"></div>

                    <img
                        src="/assets/tentang-kami/hero.png"
                        alt="Sustainable City"
                        class="w-full h-full object-contain"
                    />

                    <i class="fa-solid fa-leaf absolute top-10 left-0 -rotate-12 transform text-5xl text-[#11773D] opacity-40"></i>
                    <i class="fa-solid fa-leaf absolute right-10 bottom-20 rotate-45 transform text-6xl text-[#11773D] opacity-30"></i>
                </div>
            </div>

            <!-- Value Cards -->
        <div
            data-aos="fade-up"
            data-aos-duration="800"
            class="z-20 w-full overflow-hidden rounded-[22px] border border-[#EEF2F1] bg-white shadow-md"
        >
            <div class="grid grid-cols-3">
                <?php foreach ($values as $index => $item): ?>
                    <?php 
                        $delay = $index * 150;
                        $borderClass = ($index !== count($values) - 1) ? "border-r border-[#EEF2F1]" : "";
                    ?>
                    <div
                        data-aos="fade-up"
                        data-aos-delay="<?php echo $delay; ?>"
                        data-aos-duration="800"
                        class="flex gap-5 p-8 <?php echo $borderClass; ?>"
                    >
                        <!-- Icon -->
                        <div class="flex h-[72px] w-[72px] shrink-0 items-center justify-center rounded-full bg-[#F2FAF4]">
                            <img
                                src="<?php echo htmlspecialchars($item['icon']); ?>"
                                alt="<?php echo htmlspecialchars($item['title']); ?>"
                                width="40"
                                height="40"
                                class="object-contain"
                            />
                        </div>

                        <!-- Text -->
                        <div>
                            <h3 class="mb-2 text-[20px] font-bold leading-snug text-[#0B0F1F]">
                                <?php echo htmlspecialchars($item['title']); ?>
                            </h3>

                            <p class="text-[15px] leading-relaxed text-[#667085]">
                                <?php echo htmlspecialchars($item['desc']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Misi, Visi & Nilai Kami -->
        <section class="relative mx-auto w-full overflow-hidden rounded-[22px] bg-white px-16 py-12">
            <!-- Decoration -->
            <div class="absolute -bottom-0 -left-12 h-28 w-28 rounded-full bg-[#EEF8F1] opacity-70 blur-2xl"></div>
            <div class="absolute -right-10 top-0 h-28 w-28 rounded-full bg-[#EEF8F1] opacity-70 blur-2xl"></div>

            <!-- Header -->
            <div
                data-aos="fade-right"
                data-aos-duration="800"
                class="mb-8 flex items-center gap-2"
            >
                <h2 class="text-[30px] font-bold text-[#0B0F1F]">
                    Misi, Visi & Nilai Kami
                </h2>
                <i class="fa-solid fa-leaf text-lg text-[#11773D]"></i>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-3 gap-6 items-stretch">
                <?php foreach ($missions as $index => $item): ?>
                    <?php $delay = $index * 150; ?>
                    <div
                        data-aos="fade-up"
                        data-aos-delay="<?php echo $delay; ?>"
                        data-aos-duration="800"
                        class="rounded-[22px] border border-[#E8ECEA] bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between"
                    >
                        <div>
                            <!-- Header (Icon & Title) -->
                            <div class="mb-6 flex items-center gap-4">
                                <div class="flex h-[62px] w-[62px] shrink-0 items-center justify-center rounded-full bg-[#F2FAF4]">
                                    <img
                                        src="<?php echo htmlspecialchars($item['icon']); ?>"
                                        alt="<?php echo htmlspecialchars($item['title']); ?>"
                                        width="38"
                                        height="38"
                                        class="object-contain"
                                    />
                                </div>

                                <h3 class="text-[28px] font-bold text-[#0B0F1F]">
                                    <?php echo htmlspecialchars($item['title']); ?>
                                </h3>
                            </div>

                            <!-- Misi & Visi Desc -->
                            <?php if (isset($item['desc'])): ?>
                                <p class="text-[15px] leading-relaxed text-[#667085]">
                                    <?php echo htmlspecialchars($item['desc']); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Nilai Kami List -->
                            <?php if (isset($item['values'])): ?>
                                <ul class="space-y-3.5">
                                    <?php foreach ($item['values'] as $value): ?>
                                        <li class="flex items-center gap-3 text-[15px] font-medium text-[#667085]">
                                            <i class="fa-solid fa-circle-check text-[15px] text-[#6BC047]"></i>
                                            <span><?php echo htmlspecialchars($value); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Perjalanan HijauIn -->
    <section class="mx-auto w-full bg-white px-16 py-24">
        <!-- Header -->
        <div
            data-aos="fade-right"
            data-aos-duration="800"
            class="mb-14 flex items-center gap-2"
        >
            <h2 class="text-[30px] font-bold text-[#0B0F1F]">
                Perjalanan <span class="text-[#11773D]">HijauIn</span>
            </h2>
            <i class="fa-solid fa-leaf text-lg text-[#11773D]"></i>
        </div>

        <!-- Timeline -->
        <div class="relative">
            <!-- Green line -->
            <div class="absolute left-[70px] right-[90px] top-[34px] h-[2px] bg-[#11773D]"></div>

            <!-- Dashed end -->
            <div class="absolute right-6 top-[34px] h-[2px] w-16 border-t-2 border-dashed border-[#11773D]"></div>

            <!-- Arrow -->
            <i class="fa-solid fa-arrow-right absolute right-0 top-[28px] text-[14px] text-[#11773D]"></i>

            <div class="grid grid-cols-5">
                <?php foreach ($journey as $index => $item): ?>
                    <?php $delay = $index * 180; ?>
                    <div
                        data-aos="fade-up"
                        data-aos-delay="<?php echo $delay; ?>"
                        data-aos-duration="800"
                        class="flex flex-col items-center text-center px-2"
                    >
                        <!-- Circle -->
                        <div class="relative z-10 mb-5 flex h-[94px] w-[94px] items-center justify-center rounded-full border border-[#EEF2F1] bg-white shadow-md">
                            <img
                                src="<?php echo htmlspecialchars($item['icon']); ?>"
                                alt="<?php echo htmlspecialchars($item['year']); ?>"
                                width="60"
                                height="60"
                                class="object-contain"
                            />
                        </div>

                        <!-- Year -->
                        <h3 class="mb-4 text-[28px] font-bold text-[#11773D]">
                            <?php echo htmlspecialchars($item['year']); ?>
                        </h3>

                        <!-- Description -->
                        <p class="text-[15px] leading-relaxed text-[#667085] max-w-[210px]">
                            <?php echo htmlspecialchars($item['desc']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

        <!-- Dampak yang Telah Kami Ciptakan -->
        <section class="mx-auto w-full px-16 py-20">
            <!-- Header -->
            <div
                data-aos="fade-right"
                data-aos-duration="800"
                class="mb-8 flex items-center gap-2"
            >
                <h2 class="text-[30px] font-bold text-[#0B0F1F]">
                    Dampak yang Telah Kami Ciptakan
                </h2>
                <i class="fa-solid fa-leaf text-lg text-[#11773D]"></i>
            </div>

            <!-- Card -->
            <div
                data-aos="fade-up"
                data-aos-duration="800"
                class="overflow-hidden rounded-[20px] border border-[#E8ECEA] bg-white shadow-sm"
            >
                <div class="grid grid-cols-5">
                    <?php foreach ($stats as $index => $item): ?>
                        <?php 
                            $delay = $index * 150;
                            $borderClass = ($index !== count($stats) - 1) ? "border-r border-[#EEF2F1]" : "";
                        ?>
                        <div
                            data-aos="fade-up"
                            data-aos-delay="<?php echo $delay; ?>"
                            data-aos-duration="800"
                            class="flex items-center gap-4 px-6 py-7 <?php echo $borderClass; ?>"
                        >
                            <!-- Icon -->
                            <img
                                src="<?php echo htmlspecialchars($item['icon']); ?>"
                                alt="<?php echo htmlspecialchars($item['label']); ?>"
                                width="75"
                                height="75"
                                class="shrink-0 object-contain"
                            />

                            <!-- Text -->
                            <div>
                                <h3 class="text-[25px] font-bold leading-none text-[#11773D]">
                                    <?php echo htmlspecialchars($item['value']); ?>
                                </h3>

                                <p class="mt-2 whitespace-nowrap text-[13px] font-medium text-[#667085]">
                                    <?php echo htmlspecialchars($item['label']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Mengapa HijauIn Section -->
        <section class="mx-auto flex w-full items-center justify-between gap-12 bg-white px-16 py-12">
            <!-- Left Image (Mockup HP) -->
            <div
                data-aos="fade-right"
                data-aos-duration="1000"
                class="relative h-[550px] w-1/2 shrink-0"
            >
                <img
                    src="/assets/tentang-kami/hp.png"
                    alt="App Preview"
                    class="w-full h-full object-contain"
                />
            </div>

            <!-- Right Content (List Fitur) -->
            <div class="w-1/2 flex flex-col">
                <!-- Header -->
                <div
                    data-aos="fade-left"
                    data-aos-duration="800"
                    class="mb-6 flex items-center gap-2"
                >
                    <h2 class="text-[35px] font-semibold text-[#0B0F1F]">
                        Mengapa <span class="text-[#11773D]">HijauIn?</span>
                    </h2>
                    <i class="fa-solid fa-leaf text-lg text-[#11773D]"></i>
                </div>

                <!-- List Cards -->
                <div class="space-y-4">
                    <?php foreach ($features as $index => $item): ?>
                        <?php $delay = $index * 150; ?>
                        <div
                            data-aos="fade-left"
                            data-aos-delay="<?php echo $delay; ?>"
                            data-aos-duration="800"
                            class="flex items-center rounded-[18px] border border-[#E8ECEA] bg-white px-6 py-4 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md"
                        >
                            <!-- Icon -->
                            <div class="mr-5 flex h-[54px] w-[54px] shrink-0 items-center justify-center rounded-full bg-[#F2FAF4]">
                                <img
                                    src="<?php echo htmlspecialchars($item['icon']); ?>"
                                    alt="<?php echo htmlspecialchars($item['title']); ?>"
                                    width="38"
                                    height="38"
                                    class="object-contain"
                                />
                            </div>

                            <!-- Text -->
                            <div class="flex-1">
                                <h3 class="mb-1 text-[18px] font-bold text-[#0B0F1F]">
                                    <?php echo htmlspecialchars($item['title']); ?>
                                </h3>

                                <p class="text-[14px] leading-relaxed text-[#667085]">
                                    <?php echo htmlspecialchars($item['desc']); ?>
                                </p>
                            </div>

                            <!-- Check Icon -->
                            <div class="ml-5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full border-2 border-[#11773D]">
                                <i class="fa-solid fa-check text-[12px] text-[#11773D]"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Bottom CTA -->
        <section class="mx-auto w-full px-16 pt-12 pb-24">
            <div class="relative flex h-[220px] overflow-hidden rounded-[22px] border border-[#E8ECEA] bg-[#F5FBF6] px-10 shadow-sm">
                <!-- Left Illustration -->
                <div
                    data-aos="fade-right"
                    data-aos-duration="1000"
                    class="absolute bottom-0 left-8 z-10 h-[350px] w-[280px]"
                >
                    <img
                        src="/assets/tentang-kami/cta.png"
                        alt="CTA"
                        class="w-full h-full object-contain object-bottom"
                    />
                </div>

                <!-- Content -->
                <div
                    data-aos="fade-up"
                    data-aos-delay="200"
                    data-aos-duration="900"
                    class="ml-[300px] flex w-[42%] flex-col justify-center"
                >
                    <h2 class="mb-4 text-[24px] font-bold leading-[1.35] text-[#0B0F1F]">
                        Yuk, wujudkan masa depan
                        <br />
                        yang lebih hijau bersama <span class="text-[#11773D]">HijauIn!</span>
                    </h2>

                    <p class="text-[16px] leading-8 text-[#667085]">
                        Satu langkah kecil dari kita, bisa menjadi perubahan besar
                        <br />
                        untuk bumi yang kita cintai.
                    </p>
                </div>

                <!-- Buttons -->
                <div
                    data-aos="fade-left"
                    data-aos-delay="350"
                    data-aos-duration="900"
                    class="flex w-[20%] flex-col justify-center gap-4"
                >
                    <button class="group flex h-[48px] items-center justify-center gap-3 rounded-xl bg-[#11773D] px-6 text-[16px] font-semibold text-white transition hover:bg-[#0E6534] cursor-pointer">
                        Daftar Gratis Sekarang
                        <span class="flex h-7 w-7 items-center justify-center rounded-full bg-white/15">
                            <i class="fa-solid fa-arrow-right text-[12px]"></i>
                        </span>
                    </button>

                    <button class="group flex h-[48px] items-center justify-center gap-3 rounded-xl border border-[#11773D] bg-white px-6 text-[16px] font-semibold text-[#11773D] transition hover:bg-[#F2FAF4] cursor-pointer">
                        Lihat Cara Kerja
                        <span class="flex h-7 w-7 items-center justify-center rounded-full bg-[#11773D] text-white">
                            <i class="fa-solid fa-arrow-right text-[12px]"></i>
                        </span>
                    </button>
                </div>

                <!-- Right Leaves -->
                <img
                    data-aos="fade-left"
                    data-aos-delay="500"
                    data-aos-duration="900"
                    src="/assets/tentang-kami/duan.png"
                    alt="Leaves"
                    width="120"
                    height="180"
                    class="absolute bottom-0 top-10 right-0 object-contain"
                />
            </div>
        </section>
    </main>

    <!-- AOS Script Initialization -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

<?php
    include '../includes/footer.php';
?>
