<?php
require_once dirname(__DIR__, 3) . '/utils/landing_page.php';

$impacts = [
    [
        "icon" => "/assets/fitur/daun.png",
        "value" => "—",
        "label" => "Aksi Hijau Terverifikasi",
    ],
    [
        "icon" => "/assets/fitur/co2.png",
        "value" => "—",
        "label" => "CO₂ Berhasil Dikurangi",
    ],
    [
        "icon" => "/assets/fitur/air.png",
        "value" => "—",
        "label" => "Air Berhasil Dihemat",
    ],
    [
        "icon" => "/assets/fitur/petir.png",
        "value" => "—",
        "label" => "Energi Berhasil Dihemat",
    ],
    [
        "icon" => "/assets/fitur/pohon.png",
        "value" => "—",
        "label" => "Aksi Tanam/Pohon Tercatat",
    ],
    [
        "icon" => "/assets/fitur/person.png",
        "value" => "—",
        "label" => "Pengguna Terdaftar",
    ],
    [
        "icon" => "/assets/fitur/bank.png",
        "value" => "—",
        "label" => "Komunitas Terdaftar",
    ],
];

try {
    $actionStats = $pdo->query("
        SELECT
            COUNT(*) AS verified_actions,
            COALESCE(SUM(COALESCE(ea.co2_saved, 0)), 0) AS co2_saved,
            COALESCE(SUM(COALESCE(ea.water_saved, 0)), 0) AS water_saved,
            COALESCE(SUM(COALESCE(ea.energy_saved, 0)), 0) AS energy_saved,
            COUNT(*) FILTER (
                WHERE LOWER(COALESCE(ea.title, '')) LIKE '%tanam%'
                   OR LOWER(COALESCE(ea.title, '')) LIKE '%pohon%'
                   OR LOWER(COALESCE(c.name, '')) LIKE '%tanam%'
                   OR LOWER(COALESCE(c.name, '')) LIKE '%pohon%'
            ) AS planting_actions
        FROM public.eco_actions ea
        LEFT JOIN public.categories c ON c.id = ea.category_id
        WHERE ea.status = 'verified'
    ")->fetch(PDO::FETCH_ASSOC);

    $userCount = (int) $pdo->query("SELECT COUNT(*) FROM public.profiles")->fetchColumn();
    $communityCount = (int) $pdo->query("SELECT COUNT(*) FROM public.communities")->fetchColumn();

    $impacts[0]['value'] = number_format((int) $actionStats['verified_actions'], 0, ',', '.');
    $impacts[1]['value'] = number_format((float) $actionStats['co2_saved'], 0, ',', '.') . ' kg';
    $impacts[2]['value'] = number_format((float) $actionStats['water_saved'], 0, ',', '.') . ' L';
    $impacts[3]['value'] = number_format((float) $actionStats['energy_saved'], 0, ',', '.') . ' kWh';
    $impacts[4]['value'] = number_format((int) $actionStats['planting_actions'], 0, ',', '.');
    $impacts[5]['value'] = number_format($userCount, 0, ',', '.');
    $impacts[6]['value'] = number_format($communityCount, 0, ',', '.');
} catch (Throwable $error) {
    error_log('Failed to load feature impact stats: ' . $error->getMessage());
}
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