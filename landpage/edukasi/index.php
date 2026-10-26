<?php 
// 1. Panggil Header & Navbar
include '../includes/header.php'; 
include '../includes/navbar.php'; 
?>

<?php
// Data array untuk topik populer
$topics = [
    ["icon" => "fa-recycle text-[#11773D] text-sm", "label" => "Sampah & Daur Ulang"],
    ["icon" => "fa-bolt text-yellow-500 text-sm", "label" => "Hemat Energi"],
    ["icon" => "fa-tint text-sky-500 text-sm", "label" => "Hemat Air"],
    ["icon" => "fa-leaf text-[#11773D] text-sm", "label" => "Gaya Hidup Hijau"],
    ["icon" => "fa-tree text-green-700 text-sm", "label" => "Konservasi Alam"],
];

// Data array untuk video edukasi pilihan
$videos = [
    ["img" => "/assets/edukasi/energi.png", "title" => "Energi Terbarukan untuk\nMasa Depan", "dur" => "06:45", "views" => "1.4K ditonton"],
    ["img" => "/assets/edukasi/3r.png", "title" => "3R: Reduce, Reuse,\nRecycle", "dur" => "05:30", "views" => "2.3K ditonton"],
    ["img" => "/assets/edukasi/caramenanampohon.png", "title" => "Cara Menanam Pohon\ndengan Benar", "dur" => "07:12", "views" => "1.9K ditonton"],
    ["img" => "/assets/edukasi/laut.png", "title" => "Lindungi Laut, Lindungi\nKehidupan", "dur" => "04:58", "views" => "1.8K ditonton"],
];

// Data array untuk kategori edukasi
$categories = [
    ["icon" => "/assets/edukasi/daur.png", "name" => "Sampah & Daur Ulang", "count" => "24 artikel"],
    ["icon" => "/assets/petir.png", "name" => "Hemat Energi", "count" => "18 artikel"],
    ["icon" => "/assets/air.png", "name" => "Hemat Air", "count" => "16 artikel"],
    ["icon" => "/assets/edukasi/tanaman.png", "name" => "Gaya Hidup Hijau", "count" => "32 artikel"],
    ["icon" => "/assets/beranda/pohon.png", "name" => "Konservasi Alam", "count" => "21 artikel"],
    ["icon" => "/assets/edukasi/love.png", "name" => "Kesehatan Lingkungan", "count" => "14 artikel"],
];

// Data array untuk infografis populer
$infographics = [
    ["img" => "/assets/edukasi/kak.png", "title" => "Jejak Karbon", "desc" => "Apa itu dan bagaimana\n menguranginya?", "views" => "1.2K dilihat", "bg" => "bg-[#f0fdf4]"],
    ["img" => "/assets/edukasi/air.png", "title" => "Hemat Air", "desc" => "Mulai dari hal kecil\n di rumah", "views" => "980 dilihat", "bg" => "bg-[#f0f9ff]"],
    ["img" => "/assets/edukasi/daur.png", "title" => "Daur Ulang", "desc" => "Proses sederhana,\n dampak luar biasa", "views" => "1.5K dilihat", "bg" => "bg-[#f7fee7]"],
    ["img" => "/assets/edukasi/pohon.png", "title" => "Manfaat Menanam Pohon", "desc" => "Untuk bumi yang\n lebih baik", "views" => "1.8K dilihat", "bg" => "bg-[#ecfdf5]"],
];

// Simulasi data artikel (biasanya diambil dari database)
$articles = [
    [
        "id" => 1,
        "slug" => "mengurangi-sampah-plastik-di-rumah",
        "image" => "/assets/edukasi/energi.png",
        "tag" => "Sampah & Daur Ulang",
        "title" => "Tips Mudah Mengurangi\nSampah Plastik di Rumah",
        "desc" => "Langkah sederhana untuk meminimalisir penggunaan plastik sekali pakai dalam kehidupan sehari-hari.",
        "readTime" => "5 menit",
        "date" => "24 Mei 2026",
        "content" => [["text" => "tips mudah mengurangi sampah plastik di rumah langkah sederhana"]]
    ],
    [
        "id" => 2,
        "slug" => "menghemat-listrik-rumah-tangga",
        "image" => "/assets/edukasi/3r.png",
        "tag" => "Hemat Energi",
        "title" => "Cara Efektif Menghemat\nListrik Rumah Tangga",
        "desc" => "Ketahui peralatan rumah tangga yang paling banyak memakan energi dan cara menyiasatinya.",
        "readTime" => "4 menit",
        "date" => "20 Mei 2026",
        "content" => [["text" => "cara efektif menghemat listrik rumah tangga"]]
    ],
    [
        "id" => 3,
        "slug" => "pentingnya-konservasi-air-bersih",
        "image" => "/assets/edukasi/caramenanampohon.png",
        "tag" => "Hemat Air",
        "title" => "Pentingnya Konservasi Air\nBersih Sejak Dini",
        "desc" => "Air bersih adalah sumber kehidupan. Mari jaga ketersediaannya untuk generasi masa depan.",
        "readTime" => "6 menit",
        "date" => "15 Mei 2026",
        "content" => [["text" => "pentingnya konservasi air bersih sejak dini"]]
    ],
    [
        "id" => 4,
        "slug" => "mengenal-gaya-hidup-zero-waste",
        "image" => "/assets/edukasi/laut.png",
        "tag" => "Gaya Hidup Hijau",
        "title" => "Mengenal Gaya Hidup\nZero Waste untuk Pemula",
        "desc" => "Panduan lengkap memulai hidup minim sampah tanpa merasa terbebani.",
        "readTime" => "7 menit",
        "date" => "10 Mei 2026",
        "content" => [["text" => "mengenal gaya hidup zero waste untuk pemula"]]
    ]
];

// Menangani pencarian artikel
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$filteredArticles = array_filter($articles, function($item) use ($search) {
    if ($search === '') return true;
    $keyword = strtolower($search);
    $title = strtolower($item['title']);
    $desc = strtolower($item['desc']);
    $tag = strtolower($item['tag']);
    return strpos($title, $keyword) !== false || strpos($desc, $keyword) !== false || strpos($tag, $keyword) !== false;
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi - HijauIn</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white flex flex-col items-center w-full">

    <div class="flex flex-col items-center w-full gap-12">
        <!-- Hero Section -->
        <section class="relative mx-auto mt-25 flex w-full items-center justify-between overflow-hidden px-16">
            <!-- Left Content -->
            <div class="z-10 mb-30 flex w-[55%] flex-col justify-center" data-aos="fade-right">
                <!-- Badge -->
                <div data-aos="fade-up" data-aos-delay="100" class="mb-6 inline-flex w-fit items-center gap-2 rounded-full bg-[#F2FAF3] px-3 py-1.5 text-base font-semibold text-[#11773D]">
                    <i class="fa-solid fa-leaf text-base"></i> Edukasi Hijau
                </div>

                <!-- Heading -->
                <h1 data-aos="fade-up" data-aos-delay="200" class="mb-6 text-[60px] font-bold leading-[1.08] tracking-tight text-[#0B0F1F]">
                    Belajar, Peduli,
                    <br />
                    Aksi <span class="text-[#11773D]">untuk Bumi</span>
                </h1>

                <!-- Description -->
                <p data-aos="fade-up" data-aos-delay="300" class="mb-8 max-w-[520px] text-lg leading-9 text-gray-500">
                    Temukan berbagai artikel, panduan, dan tips seputar lingkungan untuk menambah wawasan dan menginspirasi aksi positif setiap hari.
                </p>

                <!-- Search -->
                <div data-aos="fade-up" data-aos-delay="400" class="mb-8 flex h-12 max-w-[500px] items-center rounded-[14px] border border-[#D9EFD8] bg-white p-1 shadow-sm">
                    <form method="GET" action="" class="flex h-12 w-full items-center">
                        <input
                            type="text"
                            name="search"
                            value="<?php echo htmlspecialchars($search); ?>"
                            placeholder="Cari artikel, topik, atau panduan..."
                            class="flex-1 bg-transparent px-4 text-[14px] text-[#0B0F1F] placeholder:text-[#A7B0B5] focus:outline-none"
                        />
                        <button type="submit" class="flex h-12 w-[50px] -mr-1 items-center justify-center rounded-[10px] bg-[#11773D] text-white transition hover:bg-[#0E6534] cursor-pointer">
                            <i class="fa-solid fa-magnifying-glass text-[14px]"></i>
                        </button>
                    </form>
                </div>

                <!-- Popular -->
                <p data-aos="fade-up" data-aos-delay="500" class="mb-4 text-base font-semibold text-[#0B0F1F]">
                    Topik Populer
                </p>

                <!-- Topics -->
                <div class="flex flex-wrap gap-3">
                    <?php foreach ($topics as $index => $topic): ?>
                        <button data-aos="zoom-in" data-aos-delay="<?php echo 600 + ($index * 100); ?>" class="flex h-[55px] items-center gap-2 rounded-full border border-gray-100 bg-[#F4F7F4] px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:border-[#11773D] hover:bg-[#F2FAF3] hover:text-[#11773D] cursor-pointer">
                            <i class="fa-solid <?php echo $topic['icon']; ?>"></i>
                            <span><?php echo $topic['label']; ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right Content -->
            <div class="relative mb-20 flex w-[45%] items-center justify-end" data-aos="fade-left" data-aos-delay="300">
                <img src="/assets/edukasi/hero.png" alt="Education Hero" width="650" height="650" class="h-auto w-full object-contain" />
            </div>
        </section>

        <!-- Rekomendasi untuk Kamu -->
        <section class="mx-auto w-full px-16">
            <div class="mb-12 flex items-end justify-between" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-3xl font-bold text-[#0B0F1F]">
                    Rekomendasi untuk Kamu <i class="fa-solid fa-leaf text-[#11773D]"></i>
                </h2>
                <button class="flex items-center gap-2 text-lg font-bold text-[#11773D] transition hover:gap-3 hover:underline cursor-pointer">
                    Lihat Semua <i class="fa-solid fa-chevron-right text-base"></i>
                </button>
            </div>

            <?php if (!empty($filteredArticles)): ?>
                <div class="grid grid-cols-4 gap-6">
                    <?php foreach ($filteredArticles as $index => $item): ?>
                        <a href="edukasi-detail.php?slug=<?php echo $item['slug']; ?>" data-aos="fade-up" data-aos-delay="<?php echo $index * 150; ?>" data-aos-duration="800" class="group block cursor-pointer overflow-hidden rounded-[18px] border border-[#E8ECEA] bg-white transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                            <!-- Image -->
                            <div class="relative h-[320px] overflow-hidden">
                                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                                <div class="absolute left-4 top-4 rounded-full bg-[#CFEEC6] px-3 py-1 text-xs font-semibold text-[#3E8D2F]">
                                    <?php echo htmlspecialchars($item['tag']); ?>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex flex-1 flex-col p-5">
                                <h3 class="mb-2 whitespace-pre-line text-[22px] font-bold leading-tight text-[#0B0F1F]">
                                    <?php echo htmlspecialchars($item['title']); ?>
                                </h3>
                                <p class="mb-5 flex-1 text-sm leading-6 text-[#667085]">
                                    <?php echo htmlspecialchars($item['desc']); ?>
                                </p>
                                <div class="flex items-center justify-between border-t border-[#EEF2F1] pt-4 text-xs font-medium text-[#6B7280]">
                                    <span class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-clock text-[11px] text-[#7CB342]"></i> <?php echo htmlspecialchars($item['readTime']); ?>
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-calendar text-[11px] text-[#7CB342]"></i> <?php echo htmlspecialchars($item['date']); ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="flex flex-col items-center justify-center rounded-[24px] border border-dashed border-[#D9E5DD] bg-[#F8FBF9] py-20">
                    <h3 class="text-2xl font-bold text-[#0B0F1F]">Artikel tidak ditemukan</h3>
                    <p class="mt-2 max-w-md text-center text-[#667085]">
                        Tidak ada artikel yang sesuai dengan kata kunci <b>"<?php echo htmlspecialchars($search); ?>"</b>. Coba gunakan kata kunci lain.
                    </p>
                </div>
            <?php endif; ?>
        </section>

        <!-- Kategori Edukasi -->
        <section class="w-full bg-white">
            <div class="mx-auto px-16">
                <div class="mb-8 flex items-center justify-between" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="flex items-center gap-1 text-[30px] font-bold text-[#0B0F1F]">
                        Kategori Edukasi <i class="fa-solid fa-leaf text-lg text-[#11773D]"></i>
                    </h2>
                    <button class="flex items-center gap-1 text-sm font-semibold text-[#11773D] transition-all duration-300 hover:gap-2 cursor-pointer">
                        Lihat Semua Kategori <i class="fa-solid fa-chevron-right text-[11px]"></i>
                    </button>
                </div>

                <div class="grid grid-cols-6 gap-5">
                    <?php foreach ($categories as $idx => $cat): ?>
                        <div data-aos="zoom-in-up" data-aos-delay="<?php echo $idx * 100; ?>" data-aos-duration="700" class="group flex h-[190px] cursor-pointer flex-col items-center justify-center rounded-[18px] border border-[#EEF2F1] bg-[#F5F8F6] px-5 py-6 text-center transition-all duration-300 hover:-translate-y-2 hover:border-[#11773D]/20 hover:shadow-lg">
                            <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-[#F2F8F3] transition-all duration-300 group-hover:bg-[#E6F5E9]">
                                <img src="<?php echo htmlspecialchars($cat['icon']); ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>" width="48" height="48" class="object-contain transition-transform duration-300 group-hover:scale-110" />
                            </div>
                            <h3 class="mb-2 min-h-[40px] text-[15px] font-semibold leading-5 text-[#0B0F1F]">
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </h3>
                            <p class="text-[13px] font-medium text-[#11773D]">
                                <?php echo htmlspecialchars($cat['count']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Video Edukasi Pilihan -->
        <section class="mx-auto w-full px-16">
            <div class="mb-8 flex items-center justify-between" data-aos="fade-up" data-aos-duration="800">
                <h2 class="flex items-center gap-1 text-[30px] font-bold text-[#0B0F1F]">
                    Video Edukasi Pilihan <i class="fa-solid fa-leaf text-lg text-[#11773D]"></i>
                </h2>
                <button class="flex items-center gap-1 text-sm font-semibold text-[#11773D] transition-all duration-300 hover:gap-2 cursor-pointer">
                    Lihat Semua <i class="fa-solid fa-chevron-right text-[11px]"></i>
                </button>
            </div>

            <div class="grid grid-cols-4 gap-6">
                <?php foreach ($videos as $idx => $vid): ?>
                    <div data-aos="fade-up" data-aos-delay="<?php echo $idx * 150; ?>" data-aos-duration="800" class="group h-[340px] cursor-pointer overflow-hidden rounded-[18px] bg-[#F7F9F6] transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                        <div class="relative h-[195px] overflow-hidden rounded-[18px]">
                            <img src="<?php echo htmlspecialchars($vid['img']); ?>" alt="Video" class="w-full h-full rounded-[18px] object-cover transition-transform duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 flex items-center justify-center bg-black/15 transition-all duration-300 group-hover:bg-black/25">
                                <i class="fa-regular fa-circle-play text-[38px] text-white/90 drop-shadow-md transition-transform duration-300 group-hover:scale-110"></i>
                            </div>
                            <div class="absolute bottom-2 right-2 rounded-full bg-black/70 px-2.5 py-1 text-[11px] font-semibold text-white">
                                <?php echo htmlspecialchars($vid['dur']); ?>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="mb-3 whitespace-pre-line text-[18px] font-bold leading-[1.35] text-[#0B0F1F]">
                                <?php echo htmlspecialchars($vid['title']); ?>
                            </h3>
                            <div class="flex items-center gap-1.5 text-[12px] font-medium text-[#7A8A81]">
                                <i class="fa-solid fa-circle-check text-[11px] text-[#8BC34A]"></i> <?php echo htmlspecialchars($vid['views']); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Infografis Populer -->
        <section class="mx-auto w-full px-16">
            <div class="mb-8 flex items-center justify-between" data-aos="fade-up" data-aos-duration="800">
                <h2 class="flex items-center gap-1 text-[30px] font-bold text-[#0B0F1F]">
                    Infografis Populer <i class="fa-solid fa-leaf text-lg text-[#11773D]"></i>
                </h2>
                <button class="flex items-center gap-1 text-sm font-semibold text-[#11773D] transition-all duration-300 hover:gap-2 cursor-pointer">
                    Lihat Semua <i class="fa-solid fa-chevron-right text-[11px]"></i>
                </button>
            </div>

            <div class="grid grid-cols-4 gap-5">
                <?php foreach ($infographics as $idx => $info): ?>
                    <div data-aos="fade-up" data-aos-delay="<?php echo $idx * 150; ?>" data-aos-duration="800" class="<?php echo $info['bg']; ?> group relative h-[210px] cursor-pointer overflow-hidden rounded-[18px] border border-[#E9F0EA] p-5 transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                        <div class="relative z-10 w-[55%]">
                            <h3 class="mb-2 text-[18px] font-bold leading-tight text-[#0B0F1F]"><?php echo htmlspecialchars($info['title']); ?></h3>
                            <p class="mb-4 whitespace-pre-line text-[13px] leading-relaxed text-gray-600"><?php echo htmlspecialchars($info['desc']); ?></p>
                            <div class="flex items-center gap-1 text-[11px] font-medium text-[#7A8A81]">
                                <i class="fa-regular fa-eye text-[10px] text-[#8BC34A]"></i> <?php echo htmlspecialchars($info['views']); ?>
                            </div>
                        </div>
                        <div class="absolute bottom-5 right-0 transition-transform duration-300 group-hover:scale-105">
                            <img src="<?php echo htmlspecialchars($info['img']); ?>" alt="Infographic" width="150" height="150" class="object-contain" />
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Newsletter CTA -->
        <section class="mx-auto w-full px-16 mb-16">
            <div class="relative flex h-[230px] items-center overflow-hidden rounded-[22px] border border-[#E8EFE9] bg-gradient-to-r from-[#F7FBF8] via-white to-[#F4FAF6] px-10 shadow-sm" data-aos="zoom-in" data-aos-duration="900">
                <!-- Left -->
                <div class="w-[36%]" data-aos="fade-right" data-aos-delay="100" data-aos-duration="800">
                    <h2 class="mb-4 text-[24px] font-bold leading-[1.35] text-[#0B0F1F]">
                        Terus Belajar, Terus Beraksi<br />
                        untuk Bumi yang <span class="text-[#11773D]">Lebih Baik</span>
                    </h2>
                    <p class="text-[15px] leading-7 text-[#667085]">
                        Dapatkan artikel terbaru, tips menarik, dan informasi edukasi langsung ke email kamu.
                        <i class="fa-solid fa-leaf ml-1 text-[13px] text-[#11773D]"></i>
                    </p>
                </div>

                <!-- Center -->
                <div class="flex w-[34%] flex-col justify-center" data-aos="fade-up" data-aos-delay="250" data-aos-duration="800">
                    <div class="flex h-[52px] overflow-hidden rounded-xl border border-[#E4E7EC] bg-white shadow-sm">
                        <input type="email" placeholder="Masukkan email kamu" class="flex-1 px-5 text-[14px] outline-none" />
                        <button class="bg-[#11773D] px-6 text-[14px] font-semibold text-white transition-colors duration-300 hover:bg-[#0E6534] cursor-pointer">
                            Berlangganan
                        </button>
                    </div>
                    <p class="mt-3 flex items-center gap-2 text-[12px] text-[#667085]">
                        <i class="fa-solid fa-lock text-[#11773D]"></i> Kami tidak akan membagikan email kamu ke pihak lain.
                    </p>
                </div>

                <!-- Right -->
                <div class="mt-10 flex w-[30%] justify-end self-end" data-aos="fade-left" data-aos-delay="400" data-aos-duration="900">
                    <img src="/assets/edukasi/belajar.png" alt="Newsletter" width="260" height="240" class="object-contain" />
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

<?php
    include '../includes/footer.php';
?>