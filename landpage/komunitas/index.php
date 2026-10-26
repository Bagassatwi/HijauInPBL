<?php 
// 1. Panggil Header & Navbar
include '../includes/header.php'; 
include '../includes/navbar.php'; 
?>

<?php
// Contoh data komunitas (atau bisa diambil dari database/file data terpisah)
$communities = [
    [
        "id" => 1,
        "name" => "Green Campus",
        "city" => "Surabaya, Jawa Timur",
        "member_count" => "1.243",
        "description" => "Edukasi",
        "image" => "/assets/komunitas/thumb-green.png"
    ],
    [
        "id" => 2,
        "name" => "Ocean Warriors",
        "city" => "Bali, Bali",
        "member_count" => "982",
        "description" => "Konservasi Laut",
        "image" => "/assets/komunitas/ocean.png"
    ],
    [
        "id" => 3,
        "name" => "Zero Waste",
        "city" => "Bandung, Jawa Barat",
        "member_count" => "1.856",
        "description" => "Sampah & Daur Ulang",
        "image" => "/assets/komunitas/zerowaste.png"
    ],
    [
        "id" => 4,
        "name" => "Bike for Earth",
        "city" => "Yogyakarta, DI Yogyakarta",
        "member_count" => "764",
        "description" => "Transportasi Hijau",
        "image" => "/assets/komunitas/bike.png"
    ],
    [
        "id" => 5,
        "name" => "Tree Lovers",
        "city" => "Bogor, Jawa Barat",
        "member_count" => "1.112",
        "description" => "Konservasi Alam",
        "image" => "/assets/komunitas/tree.png"
    ]
];

$impacts = [
    [
        "icon" => "/assets/komunitas/person.png",
        "title" => "Bergerak Bersama",
        "desc" => "Bersama komunitas, dampak yang dihasilkan akan jauh lebih besar.",
    ],
    [
        "icon" => "/assets/komunitas/lamp.png",
        "title" => "Dapatkan Inspirasi",
        "desc" => "Temukan ide, tips, dan inspirasi aksi hijau dari berbagai komunitas.",
    ],
    [
        "icon" => "/assets/komunitas/piala.png",
        "title" => "Raih Penghargaan",
        "desc" => "Ikuti kegiatan komunitas dan dapatkan badge serta reward menarik.",
    ],
    [
        "icon" => "/assets/komunitas/chart.png",
        "title" => "Lihat Dampak Nyata",
        "desc" => "Pantau dampak aksi komunitasmu secara real-time di dashboard.",
    ],
    [
        "icon" => "/assets/komunitas/love.png",
        "title" => "Perluas Jaringan",
        "desc" => "Kenali teman baru yang punya visi yang sama untuk bumi yang lebih baik.",
    ],
];

$events = [
    [
        "img" => "/assets/komunitas/aksi.png",
        "date" => "25",
        "month" => "MEI",
        "title" => "Aksi Tanam 1.000 Pohon\n di Bukit Hijau",
        "loc" => "Bogor, Jawa Barat",
        "time" => "07.00 - 12.00 WIB",
        "p" => "+128",
        "avatars" => ["/assets/ava1.jpg", "/assets/ava2.jpg", "/assets/ava3.jpg", "/assets/ava4.jpg"]
    ],
    [
        "img" => "/assets/komunitas/beach.png",
        "date" => "01",
        "month" => "JUN",
        "title" => "Beach Clean Up\n Pantai Kuta",
        "loc" => "Bali, Bali",
        "time" => "06.30 - 10.30 WITA",
        "p" => "+86",
        "avatars" => ["/assets/ava2.jpg", "/assets/ava3.jpg", "/assets/ava5.jpg", "/assets/ava6.jpg"]
    ],
    [
        "img" => "/assets/komunitas/workshop.png",
        "date" => "08",
        "month" => "JUN",
        "title" => "Workshop Eco Living\n Zero Waste",
        "loc" => "Bandung, Jawa Barat",
        "time" => "09.00 - 13.00 WIB",
        "p" => "+64",
        "avatars" => ["/assets/ava1.jpg", "/assets/ava5.jpg", "/assets/ava6.jpg", "/assets/ava3.jpg"]
    ],
    [
        "img" => "/assets/komunitas/goes.png",
        "date" => "15",
        "month" => "JUN",
        "title" => "Gowes Hijau\n Keliling Kota",
        "loc" => "Yogyakarta, DI Yogyakarta",
        "time" => "06.00 - 09.00 WIB",
        "p" => "+97",
        "avatars" => ["/assets/ava6.jpg", "/assets/ava1.jpg", "/assets/ava2.jpg", "/assets/ava4.jpg"]
    ],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas - HijauIn</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white flex flex-col items-center w-full">

    <main class="bg-white flex flex-col items-center w-full gap-12 pb-24">
       <!-- Hero Section -->
        <section class="relative w-full h-[700px] flex items-center px-16 bg-white overflow-hidden">
            <!-- Background & Gradasi Manual -->
            <div class="absolute inset-0 z-0">
                <img src="/assets/komunitas/hero.png" alt="Community Hero" class="w-full h-full object-cover" />
                
                <!-- Menggunakan style linear-gradient langsung agar hasilnya konsisten -->
                <div class="absolute inset-0 z-10" style="background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(255,255,255,0.95) 45%, rgba(255,255,255,0) 75%);"></div>
            </div>

            <!-- Content -->
            <div class="relative z-20 -mt-10 w-full max-w-[560px]">
                <div data-aos="fade-down" data-aos-duration="700" class="mb-5 inline-flex items-center gap-2 rounded-full bg-[#F2FAF3] px-4 py-2 text-base font-semibold text-[#11773D]">
                    <i class="fa-solid fa-leaf text-base"></i> Komunitas HijauIn
                </div>

                <h1 data-aos="fade-right" data-aos-delay="150" data-aos-duration="900" class="mb-6 text-[60px] font-bold leading-[1.08] tracking-[-0.03em] text-[#0B0F1F]">
                    Bersama Kita Bisa<br />
                    <span class="text-[#11773D]">Mengubah Dunia</span>
                </h1>

                <p data-aos="fade-right" data-aos-delay="300" data-aos-duration="900" class="mb-8 max-w-[470px] text-[18px] leading-9 text-[#4B5563]">
                    Gabung dengan komunitas hijau di seluruh Indonesia, berbagi aksi, inspirasi, dan ciptakan dampak positif untuk bumi kita.
                </p>

                <div data-aos="fade-up" data-aos-delay="450" data-aos-duration="900" class="flex items-center gap-4">
                    <button class="flex h-14 items-center gap-2 rounded-xl bg-[#11773D] px-7 text-[16px] font-semibold text-white transition hover:bg-[#0E6534] cursor-pointer">
                        <i class="fa-solid fa-user-plus text-[15px]"></i> Gabung Komunitas
                    </button>
                    <button class="flex h-14 items-center gap-2 rounded-xl border border-[#D8E0DA] bg-white px-7 text-[16px] font-semibold text-[#243126] transition hover:bg-[#F8FAF8] cursor-pointer">
                        <i class="fa-solid fa-users text-[15px] text-[#11773D]"></i> Jelajahi Komunitas
                    </button>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section data-aos="fade-up" data-aos-duration="800" class="relative z-20 w-full -mt-10 px-16 mx-auto">
            <div class="flex overflow-hidden rounded-[22px] border border-[#EEF2F1] bg-white shadow-md">
                <?php 
                $stats = [
                    ["value" => "15.000+", "label" => "Komunitas Aktif", "icon" => "fa-users"],
                    ["value" => "125.430+", "label" => "Aksi Hijau Tercatat", "icon" => "fa-leaf"],
                    ["value" => "320+", "label" => "Kota di Indonesia", "icon" => "fa-globe-asia"],
                    ["value" => "5.243", "label" => "Kegiatan Telah Dilakukan", "icon" => "fa-seedling"],
                ];
                foreach ($stats as $idx => $stat): 
                ?>
                    <div data-aos="fade-up" data-aos-delay="<?php echo $idx * 150; ?>" data-aos-duration="800" class="flex flex-1 items-center justify-center gap-4 py-8">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#F3FAF4]">
                            <div class="text-[#11773D] text-[35px]"><i class="fa-solid <?php echo $stat['icon']; ?>"></i></div>
                        </div>
                        <div>
                            <h3 class="text-[28px] font-bold leading-none text-[#11773D]"><?php echo $stat['value']; ?></h3>
                            <p class="mt-2 text-[15px] font-medium text-[#4B5563]"><?php echo $stat['label']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Jelajahi Komunitas Hijau -->
        <section class="relative w-full px-16 mx-auto">
            <div class="mb-8 flex items-center justify-between">
                <h2 data-aos="fade-right" data-aos-duration="800" class="flex items-center gap-2 text-[30px] font-bold text-[#0B0F1F]">
                    Jelajahi Komunitas Hijau <i class="fa-solid fa-leaf text-[#11773D] text-lg"></i>
                </h2>
                <button data-aos="fade-left" data-aos-delay="150" data-aos-duration="800" class="flex items-center gap-1 text-sm font-semibold text-[#11773D] transition hover:gap-2 cursor-pointer">
                    Lihat Semua Komunitas <i class="fa-solid fa-chevron-right text-[11px]"></i>
                </button>
            </div>

            <div class="relative">
                <div class="grid grid-cols-5 gap-5">
                    <?php foreach ($communities as $idx => $com): 
                        $words = explode(' ', $com['name']);
                        $logoText = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                    ?>
                        <a href="komunitas-detail.php?slug=<?php echo $com['id']; ?>" data-aos="fade-up" data-aos-delay="<?php echo $idx * 150; ?>" data-aos-duration="800" class="group relative overflow-hidden rounded-[18px] border border-[#E8ECEA] bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg cursor-pointer">
                            <div class="relative h-[195px] overflow-hidden rounded-t-[18px]">
                                <img src="<?php echo htmlspecialchars($com['image']); ?>" alt="<?php echo htmlspecialchars($com['name']); ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" />
                            </div>

                            <div class="absolute left-5 top-[155px] z-30 flex h-16 w-16 items-center justify-center rounded-full bg-white shadow-lg ring-4 ring-white">
                                <div class="flex h-[46px] w-[46px] items-center justify-center rounded-full bg-[#EEF8F1]">
                                    <span class="text-[16px] font-black text-[#11773D]"><?php echo $logoText; ?></span>
                                </div>
                            </div>

                            <div class="flex flex-1 flex-col p-5 pt-11">
                                <h3 class="mb-2 text-[20px] font-bold leading-[1.3] text-[#0B0F1F]"><?php echo htmlspecialchars($com['name']); ?></h3>
                                <div class="mb-4 flex items-center gap-2 text-[13px] text-[#667085]">
                                    <i class="fa-solid fa-location-dot text-[#11773D]"></i> <?php echo htmlspecialchars($com['city']); ?>
                                </div>
                                <div class="mb-4 flex items-center gap-2 text-[13px] font-medium text-[#667085]">
                                    <i class="fa-solid fa-users text-[#11773D]"></i> <?php echo htmlspecialchars($com['member_count']); ?> anggota
                                </div>
                                <div class="inline-flex w-max rounded-full bg-[#EEF8F1] px-3 py-1 text-[12px] font-medium text-[#11773D]">
                                    <?php echo htmlspecialchars($com['description']); ?>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Kegiatan Mendatang -->
        <section class="w-full px-16 mx-auto">
            <div class="mb-8 flex items-center justify-between">
                <h2 data-aos="fade-right" data-aos-duration="800" class="flex items-center gap-2 text-[30px] font-bold text-[#0B0F1F]">
                    Kegiatan Mendatang <i class="fa-solid fa-leaf text-[#11773D] text-lg"></i>
                </h2>
                <button data-aos="fade-left" data-aos-delay="150" data-aos-duration="800" class="flex items-center gap-1 text-sm font-semibold text-[#11773D] transition hover:gap-2 cursor-pointer">
                    Lihat Semua Kegiatan <i class="fa-solid fa-chevron-right text-[11px]"></i>
                </button>
            </div>

            <div class="grid grid-cols-4 gap-5">
                <?php foreach ($events as $idx => $act): ?>
                    <div data-aos="fade-up" data-aos-delay="<?php echo $idx * 150; ?>" data-aos-duration="800" class="group overflow-hidden rounded-[18px] border border-[#E8ECEA] bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg cursor-pointer">
                        <div class="relative h-[205px] overflow-hidden">
                            <img src="<?php echo htmlspecialchars($act['img']); ?>" alt="Event" class="w-full h-full object-cover transition duration-500 group-hover:scale-105" />
                            <div class="absolute left-4 top-4 flex h-14 w-14 flex-col items-center justify-center rounded-xl bg-[#11773D] text-white shadow-md">
                                <span class="text-[24px] font-bold leading-none"><?php echo $act['date']; ?></span>
                                <span class="mt-1 text-[10px] font-semibold tracking-wide"><?php echo $act['month']; ?></span>
                            </div>
                        </div>

                        <div class="flex flex-col p-5">
                            <h3 class="mb-4 text-[18px] font-bold leading-[1.35] text-[#0B0F1F]">
                                <?php echo nl2br(htmlspecialchars($act['title'])); ?> <i class="fa-solid fa-leaf ml-1 text-[12px] text-[#11773D]"></i>
                            </h3>
                            <div class="mb-2 flex items-center gap-2 text-[13px] text-[#667085]">
                                <i class="fa-solid fa-location-dot text-[#11773D] text-[12px]"></i> <?php echo htmlspecialchars($act['loc']); ?>
                            </div>
                            <div class="mb-5 flex items-center gap-2 text-[13px] text-[#667085]">
                                <i class="fa-regular fa-clock text-[#11773D] text-[12px]"></i> <?php echo htmlspecialchars($act['time']); ?>
                            </div>
                            <div class="mb-5 flex items-center">
                                <div class="flex -space-x-2">
                                    <?php foreach ($act['avatars'] as $avatar): ?>
                                        <div class="relative h-8 w-8 overflow-hidden rounded-full border-2 border-white">
                                            <img src="<?php echo htmlspecialchars($avatar); ?>" alt="Participant" class="w-full h-full object-cover" />
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <span class="ml-3 text-[13px] font-medium text-[#667085]"><?php echo $act['p']; ?> peserta</span>
                            </div>
                            <div class="mb-4 h-px bg-[#EEF2F1]"></div>
                            <button class="flex items-center justify-center gap-2 text-[14px] font-semibold text-[#11773D] transition hover:text-[#0E6534] cursor-pointer">
                                <i class="fa-solid fa-user-plus text-[13px]"></i> Ikut Kegiatan
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Kenapa Gabung Komunitas -->
        <section class="w-full bg-white">
            <div class="mx-auto px-16">
                <div class="mb-14">
                    <h2 data-aos="fade-right" data-aos-duration="800" class="flex items-center gap-2 text-[30px] font-bold text-[#0B0F1F]">
                        Kenapa Gabung Komunitas HijauIn? <i class="fa-solid fa-leaf text-[#11773D] text-lg"></i>
                    </h2>
                </div>

                <div class="grid grid-cols-5">
                    <?php foreach ($impacts as $index => $item): ?>
                        <div data-aos="fade-up" data-aos-delay="<?php echo $index * 150; ?>" data-aos-duration="800" class="relative flex flex-col items-center px-5 text-center">
                            <?php if ($index !== 4): ?>
                                <div class="absolute left-[calc(50%+48px)] top-10 h-px w-[calc(100%-96px)] bg-[#E7ECE8]"></div>
                                <i class="fa-solid fa-leaf absolute left-[calc(100%-10px)] top-[30px] z-10 text-[10px] text-[#69B35A]"></i>
                            <?php endif; ?>

                            <div class="mb-6 flex h-[100px] w-[100px] items-center justify-center rounded-full bg-[#F2FAF4]">
                                <div class="flex h-[58px] w-[58px] items-center justify-center rounded-full">
                                    <img src="<?php echo htmlspecialchars($item['icon']); ?>" alt="Icon" width="55" height="55" class="object-contain" />
                                </div>
                            </div>

                            <h3 class="mb-3 text-[22px] font-bold leading-[1.3] text-[#0B0F1F]"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p class="text-[16px] leading-8 text-[#667085]"><?php echo htmlspecialchars($item['desc']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Bottom CTA Section -->
        <section class="w-full px-16 mx-auto my-12">
            <!-- Tambahkan bg-[#0D4E2E] di card utama agar background-nya hijau -->
            <div class="relative overflow-hidden rounded-[22px] bg-[#0D4E2E] shadow-lg">
                <!-- Flex Container dibagi menjadi 3 bagian -->
                <div class="flex items-center min-h-[420px]">
                    
                    <!-- 1. LEFT IMAGE (Gambar Relawan) -->
                    <div data-aos="fade-right" data-aos-duration="900" class="relative w-[34%] h-full min-h-[420px] overflow-hidden">
                        <img src="/assets/komunitas/yukjadi.png" alt="Join Community" class="w-full h-full object-cover" />
                        
                        <!-- Kurva lengkung di sebelah kanan gambar -->
                        <div class="absolute -right-16 top-0 h-full w-32 rounded-l-full bg-[#0D4E2E] z-10"></div>
                    </div>

                    <!-- 2. CENTER CONTENT (Teks Lengkap & Tombol) -->
                    <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="900" class="flex w-[36%] flex-col justify-center px-8 py-10 text-white z-20">
                        <h2 class="mb-4 text-[36px] font-medium leading-[1.3] text-white">
                            Yuk, jadi bagian dari<br />
                            <span class="text-[#94D497]">gerakan perubahan!</span>
                        </h2>

                        <p class="mb-8 text-[15px] leading-7 text-[#C6D5CC]">
                            Satu aksi kecil dari kita, bisa menjadi perubahan besar untuk masa depan bumi yang lebih baik.
                        </p>

                        <div data-aos="fade-up" data-aos-delay="350" data-aos-duration="800" class="flex items-center gap-3">
                            <button class="flex h-12 items-center gap-2 rounded-xl bg-[#1D8641] px-6 text-[14px] font-medium text-white transition hover:bg-[#2F8E48] cursor-pointer">
                                Gabung Sekarang <i class="fa-solid fa-user-plus text-[13px]"></i>
                            </button>

                            <button class="flex h-12 items-center gap-2 rounded-xl border border-[#7A9B86] bg-transparent px-6 text-[14px] font-medium text-white transition hover:bg-white/10 cursor-pointer">
                                Buat Komunitasmu <i class="fa-solid fa-users text-[13px]"></i>
                            </button>
                        </div>
                    </div>

                    <!-- 3. RIGHT PANEL (Statistik Aktivitas Komunitas) -->
                    <div data-aos="fade-left" data-aos-delay="250" data-aos-duration="900" class="flex w-[30%] items-center pr-8 z-20">
                        <div class="w-full rounded-2xl bg-[#1B5B39]/90 backdrop-blur-sm p-6 border border-white/10 shadow-inner">
                            <h3 class="mb-5 text-[17px] font-medium text-white">
                                Aktivitas Komunitas Hari Ini
                            </h3>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-3 text-[14px] text-[#D8E7DE]">
                                        <i class="fa-solid fa-leaf text-[#9FE870]"></i> Aksi Hijau
                                    </span>
                                    <span class="text-[26px] font-semibold text-white">245</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-3 text-[14px] text-[#D8E7DE]">
                                        <i class="fa-solid fa-cloud text-[#9FE870]"></i> CO₂ Berhasil Dikurangi
                                    </span>
                                    <span class="text-[26px] font-semibold text-white">2.340 <span class="text-sm font-normal">kg</span></span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-3 text-[14px] text-[#D8E7DE]">
                                        <i class="fa-solid fa-trash-can text-[#9FE870]"></i> Sampah Terkumpul
                                    </span>
                                    <span class="text-[26px] font-semibold text-white">1.250 <span class="text-sm font-normal">kg</span></span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="flex items-center gap-3 text-[14px] text-[#D8E7DE]">
                                        <i class="fa-solid fa-tree text-[#9FE870]"></i> Pohon Ditanam
                                    </span>
                                    <span class="text-[26px] font-semibold text-white">320</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>

<?php
    include '../includes/footer.php';
?>