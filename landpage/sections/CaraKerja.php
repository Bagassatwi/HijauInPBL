<?php
$steps = [
    [
        "num" => "1",
        "src" => "/assets/beranda/catataksi3.png",
        "width" => 100,
        "height" => 100,
        "mt" => 2,
        "title" => "Catat Aksi",
        "desc" => "Catat aksi ramah lingkungan<br />yang kamu lakukan setiap hari."
    ],
    [
        "num" => "2",
        "src" => "/assets/beranda/dapatkanpoin.png",
        "width" => 200,
        "height" => 200,
        "mt" => 20,
        "title" => "Dapatkan Poin",
        "desc" => "Setiap aksi memberimu<br />poin dan meningkatkan<br />Eco Score-mu."
    ],
    [
        "num" => "3",
        "src" => "/assets/beranda/pantaudampak.png",
        "width" => 95,
        "height" => 95,
        "mt" => 0,
        "title" => "Pantau Dampak",
        "desc" => "Lihat statistik dan laporan<br />dampak positif dari<br />aksimu."
    ],
    [
        "num" => "4",
        "src" => "/assets/beranda/ikutchallange.png",
        "width" => 88,
        "height" => 88,
        "mt" => 4,
        "title" => "Ikuti Challenge",
        "desc" => "Selesaikan tantangan<br />seru dan dapatkan badge<br />serta reward."
    ],
    [
        "num" => "5",
        "src" => "/assets/beranda/berdampakdunia.png",
        "width" => 90,
        "height" => 90,
        "mt" => 1,
        "title" => "Berdampak Nyata",
        "desc" => "Bersama-sama menciptakan<br />perubahan positif untuk<br />bumi yang lebih baik."
    ],
];
?>

<section class="px-4 py-9 text-center sm:px-8 lg:px-16">
    <!-- Heading -->
    <h2 data-aos="fade-up" data-aos-duration="700" class="text-[clamp(1.75rem,3vw,2.5rem)] font-semibold text-[#0B0F1F]">
        Cara Kerja <span class="text-[#076635]">HijauIn</span>
    </h2>

    <!-- Steps -->
    <div class="mt-12 flex flex-col items-center gap-8 lg:mt-20 lg:flex-row lg:justify-between lg:gap-0">
        <?php foreach ($steps as $index => $step): 
            $delay = $index * 180;
        ?>
            <div class="flex flex-col items-center lg:flex-row">
                <!-- Item -->
                <div 
                    data-aos="fade-up" 
                    data-aos-delay="<?= $delay ?>" 
                    data-aos-duration="700" 
                    class="group relative flex w-full max-w-[220px] flex-col items-center"
                >
                    <!-- Number -->
                    <div class="absolute left-3 top-0 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-[#076635] text-sm font-bold text-white shadow-md">
                        <?= $step['num'] ?>
                    </div>

                    <!-- Icon -->
                    <div class="relative flex h-[120px] w-[120px] items-center justify-center">
                        <div class="absolute inset-0 rounded-full bg-[radial-gradient(circle,#F8FCF6_0%,#EEF8EC_55%,#E3F2DF_100%)] shadow-[0_8px_30px_rgba(109,170,94,0.12)]"></div>
                        <div class="absolute left-1/2 top-1/2 h-[88px] w-[88px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-white/35 blur-md"></div>
                        
                        <img 
                            src="<?= $step['src'] ?>" 
                            alt="<?= $step['title'] ?>" 
                            width="280" 
                            height="280" 
                            class="relative z-10 object-contain transition-transform duration-300 group-hover:scale-105" 
                            style="width: <?= $step['width'] ?>px; height: <?= $step['height'] ?>px; margin-top: <?= $step['mt'] ?>px;"
                        />
                    </div>

                    <!-- Title -->
                    <h3 class="mt-6 text-[20px] font-semibold text-[#0B0F1F]">
                        <?= $step['title'] ?>
                    </h3>

                    <!-- Description -->
                    <p class="mt-3 text-[14px] leading-5 text-[#667085]">
                        <?= $step['desc'] ?>
                    </p>
                </div>

                <!-- Connector -->
                <?php if ($index !== count($steps) - 1): 
                    $connectorDelay = $delay + 100;
                ?>
                    <div 
                        data-aos="fade-right" 
                        data-aos-delay="<?= $connectorDelay ?>" 
                        data-aos-duration="600" 
                        class="hidden lg:mx-6 lg:mt-[42px] lg:flex lg:items-center"
                    >
                        <div class="w-14 border-t-2 border-dashed border-[#22A75D]"></div>
                        <i class="fa-solid fa-arrow-right ml-2 text-[#22A75D]"></i>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>