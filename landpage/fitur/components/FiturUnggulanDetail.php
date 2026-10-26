<?php
// Data detail fitur (menggantikan detailsData di TypeScript)
$detailsData = [
    [
        "id" => "ai-green-coach",
        "title" => "AI Green Coach",
        "icon" => "fa-robot", // Kelas ikon FontAwesome
        "description" => "Punya teman pintar yang selalu membantumu menjadi lebih baik.",
        "imageSrc" => "/assets/fitur/green.png",
        "bullets" => [
            "Rekomendasi personal berdasarkan kebiasaanmu",
            "Insight dampak lingkungan secara real-time",
            "Tips harian untuk aksi yang lebih berdampak",
        ],
    ],
    [
        "id" => "eco-score",
        "title" => "Eco Score & Level",
        "icon" => "fa-chart-line",
        "description" => "Setiap aksi kecilmu akan menghasilkan poin dan menaikkan level kepedulianmu.",
        "imageSrc" => "/assets/fitur/score.png",
        "bullets" => [
            "Poin dari setiap aksi yang kamu lakukan",
            "Level dan badge sebagai bentuk pencapaian",
            "Track progress harian, mingguan, dan bulanan",
        ],
    ],
    [
        "id" => "challenge",
        "title" => "Challenge & Misi Seru",
        "icon" => "fa-trophy",
        "description" => "Buat perubahan jadi lebih menyenangkan dengan tantangan dan misi.",
        "imageSrc" => "/assets/fitur/challangeaktif.png",
        "bullets" => [
            "Challenge harian, mingguan, dan bulanan",
            "Reward menarik untuk setiap pencapaian",
            "Bersama komunitas untuk dampak lebih besar",
        ],
    ],
    [
        "id" => "laporan",
        "title" => "Laporan Dampak Nyata",
        "icon" => "fa-clipboard-list",
        "description" => "Lihat seberapa besar dampak positif dari aksi hijau yang kamu lakukan.",
        "imageSrc" => "/assets/fitur/laporan.png",
        "bullets" => [
            "Data real-time dan akurat",
            "Visualisasi dampak yang mudah dipahami",
            "Bagikan dampakmu ke media sosial",
        ],
    ],
];
?>

<!-- Pastikan FontAwesome sudah dimuat di <head> layout utama Anda, contoh:
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->

<section class="w-full px-4 sm:px-8 md:px-16 mt-12 bg-gray-50">
    <h2
        data-aos="fade-up"
        data-aos-duration="800"
        class="mb-12 text-center text-3xl font-bold md:mb-16 md:text-4xl"
    >
        Fitur Unggulan Secara Detail
    </h2>

    <div class="flex flex-col gap-8">
        <?php foreach ($detailsData as $index => $item): ?>
            <?php 
                // Menentukan arah animasi berdasarkan indeks (ganjil / genap)
                $isEven = ($index % 2 === 0);
                $imgAnimation = $isEven ? "fade-right" : "fade-left";
                $textAnimation = $isEven ? "fade-left" : "fade-right";
                
                // Mengatur arah layout (row-reverse untuk indeks genap/urutan ke-2, ke-4, dst jika dihitung dari 0)
                // Di Tailwind: lg:flex-row untuk ganjil, lg:flex-row-reverse untuk genap
                $flexDirection = $isEven ? "lg:flex-row" : "lg:flex-row-reverse";
            ?>

            <div class="bg-white overflow-hidden flex flex-col <?php echo $flexDirection; ?>">
                
                <!-- Image Container -->
                <div
                    data-aos="<?php echo $imgAnimation; ?>"
                    data-aos-duration="900"
                    class="relative min-h-[240px] w-full lg:min-h-[400px] lg:w-1/2 md:min-h-[320px]"
                >
                    <img
                        src="<?php echo htmlspecialchars($item['imageSrc']); ?>"
                        alt="<?php echo htmlspecialchars($item['title']); ?>"
                        class="absolute inset-0 h-full w-full rounded-2xl object-cover transition-transform duration-500 hover:scale-105"
                    />
                </div>

                <!-- Text Content Container -->
                <div
                    data-aos="<?php echo $textAnimation; ?>"
                    data-aos-duration="900"
                    class="flex w-full flex-col justify-center px-6 py-8 lg:w-1/2 lg:px-12"
                >
                    <!-- Header -->
                    <div
                        data-aos="fade-up"
                        data-aos-delay="150"
                        class="mb-8 flex items-center gap-5"
                    >
                        <div
                            data-aos="zoom-in"
                            data-aos-delay="250"
                            class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-[#EAF7EF] text-3xl text-[#077C3A]"
                        >
                            <i class="fa-solid <?php echo htmlspecialchars($item['icon']); ?>"></i>
                        </div>

                        <h3
                            data-aos="fade-up"
                            data-aos-delay="300"
                            class="text-[32px] sm:text-[38px] font-bold leading-tight text-[#111827]"
                        >
                            <?php echo htmlspecialchars($item['title']); ?>
                        </h3>
                    </div>

                    <!-- Description -->
                    <p
                        data-aos="fade-up"
                        data-aos-delay="400"
                        class="max-w-[560px] text-[18px] leading-8 text-[#6B7280]"
                    >
                        <?php echo htmlspecialchars($item['description']); ?>
                    </p>

                    <!-- Bullet List -->
                    <ul class="mt-8 space-y-5">
                        <?php foreach ($item['bullets'] as $bulletIndex => $bullet): ?>
                            <?php 
                                // Kalkulasi delay untuk setiap bullet point
                                $bulletDelay = 500 + ($bulletIndex * 120);
                            ?>
                            <li
                                data-aos="fade-up"
                                data-aos-delay="<?php echo $bulletDelay; ?>"
                                class="flex items-start gap-4"
                            >
                                <span class="mt-[11px] h-2.5 w-2.5 shrink-0 rounded-full bg-[#077C3A]"></span>

                                <span class="text-[17px] leading-8 text-[#6B7280]">
                                    <?php echo htmlspecialchars($bullet); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>