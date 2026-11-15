<?php
// Data dampak nyata (menggantikan array impacts di TypeScript)
$impacts = [
    [
        "icon" => "/assets/fitur/daun.png",
        "value" => "125.430+ kg",
        "label" => "Sampah Dikelola",
    ],
    [
        "icon" => "/assets/fitur/co2.png",
        "value" => "82.340+ kg",
        "label" => "CO₂ Berhasil Dikurangi",
    ],
    [
        "icon" => "/assets/fitur/air.png",
        "value" => "1.250.000+ L",
        "label" => "Air Berhasil Dihemat",
    ],
    [
        "icon" => "/assets/fitur/petir.png",
        "value" => "215.430+ kWh",
        "label" => "Energi Berhasil Dihemat",
    ],
    [
        "icon" => "/assets/fitur/pohon.png",
        "value" => "5.243",
        "label" => "Pohon Ditanam",
    ],
    [
        "icon" => "/assets/fitur/person.png",
        "value" => "15.000+",
        "label" => "Pengguna Aktif",
    ],
    [
        "icon" => "/assets/fitur/bank.png",
        "value" => "320+",
        "label" => "Komunitas Bergabung",
    ],
];
?>

<section class="w-full px-4 py-14 sm:px-8 md:px-12">
    <div class="mx-auto">

        <!-- Heading -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 md:text-4xl">
                Dampak Nyata Bersama <span class="text-[#11773D]">HijauIn</span>
            </h2>

            <p class="mt-3 text-base text-gray-500 md:text-lg">
                Setiap aksi kecil yang kamu lakukan, memberikan perubahan besar untuk bumi.
            </p>
        </div>

        <!-- Impact Grid -->
        <div class="mt-12 grid grid-cols-2 lg:grid-cols-7 gap-y-8 lg:gap-y-0">
            <?php foreach ($impacts as $index => $item): ?>
                <?php 
                    // Menambahkan border kanan pada layar besar (lg) kecuali untuk item terakhir
                    $isNotLast = ($index !== count($impacts) - 1);
                    $borderClass = $isNotLast ? "lg:border-r lg:border-gray-200" : "";
                ?>
                <div
                    class="flex flex-col items-center text-center px-4 py-2 <?php echo $borderClass; ?>"
                >
                    <!-- Icon -->
                    <div class="mb-3 flex h-12 w-12 items-center justify-center">
                        <img
                            src="<?php echo htmlspecialchars($item['icon']); ?>"
                            alt="<?php echo htmlspecialchars($item['label']); ?>"
                            width="180"
                            height="180"
                            class="object-contain mb-10"
                        />
                    </div>

                    <!-- Number -->
                    <p class="text-[28px] font-bold leading-none text-[#11773D]">
                        <?php echo htmlspecialchars($item['value']); ?>
                    </p>

                    <!-- Label -->
                    <p class="mt-2 text-[15px] font-medium leading-snug text-gray-500">
                        <?php echo htmlspecialchars($item['label']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>