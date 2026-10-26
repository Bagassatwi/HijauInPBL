<?php
$stats = [
    [
        "value" => "125.430 kg",
        "line1" => "Sampah Berhasil",
        "line2" => "Dikelola",
        "icon" => "assets/beranda/daun2.png",
    ],
    [
        "value" => "82.340 kg",
        "line1" => "CO₂ Berhasil",
        "line2" => "Dikurangi",
        "icon" => "assets/beranda/awan.png",
    ],
    [
        "value" => "5.243",
        "line1" => "Pohon Berhasil",
        "line2" => "Ditanam",
        "icon" => "assets/beranda/pohon.png",
    ],
    [
        "value" => "15.000+",
        "line1" => "Pengguna Aktif",
        "line2" => "",
        "icon" => "assets/beranda/person.png",
    ],
    [
        "value" => "320+",
        "line1" => "Komunitas",
        "line2" => "Bergabung",
        "icon" => "assets/beranda/bank.png",
    ],
];
?>

<section
    data-aos="fade-up"
    class="relative z-10 -mt-8 px-4 py-8 sm:-mt-12 sm:px-8 lg:-mt-20 lg:px-16 lg:py-16"
>
    <!-- Perbaikan ada di grid-cols: memastikan di layar besar (lg ke atas) langsung 5 kolom sejajar -->
    <div class="grid grid-cols-1 gap-4 rounded-[25px] border border-[#ECECEC] bg-white p-5 shadow-lg sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 p-6">
        <?php foreach ($stats as $index => $item): 
            // Memperbaiki operator perkalian delay yang tadinya terpotong
            $delay = $index * 150;
        ?>
            <div
                data-aos="zoom-in"
                data-aos-delay="<?= $delay ?>"
                data-aos-duration="700"
                class="flex flex-col items-center justify-center gap-3 rounded-2xl p-3 text-center sm:flex-row sm:justify-start sm:text-left lg:p-4"
            >
                <!-- Icon -->
                <img
                    src="<?= $item['icon'] ?>"
                    alt="<?= $item['line1'] ?>"
                    width="150"
                    height="150"
                    class="h-16 w-16 shrink-0 object-contain lg:h-16 lg:w-16"
                />

                <!-- Text -->
                <div class="min-w-0">
                    <h3 class="text-[20px] font-bold leading-none text-[#076635] lg:text-[22px]">
                        <?= $item['value'] ?>
                    </h3>

                    <p class="mt-2 text-[12px] leading-5 text-[#667085] lg:text-[13px] lg:leading-[22px]">
                        <?= $item['line1'] ?>
                        <?php if (!empty($item['line2'])): ?>
                            <br />
                            <?= $item['line2'] ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>