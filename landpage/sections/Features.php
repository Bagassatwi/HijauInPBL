<?php
$features = [
    [
        "src" => "/assets/beranda/catataksi.png",
        "title" => "Catat Aksi Harian",
        "desc" => "Catat berbagai aksi hijau seperti hemat energi, pilah sampah, dan transportasi ramah lingkungan.",
    ],
    [
        "src" => "/assets/beranda/eco-score.png",
        "title" => "Eco Score",
        "desc" => "Dapatkan poin dari setiap aksi dan pantau skor eco score-mu secara real-time.",
    ],
    [
        "src" => "/assets/beranda/ai-rekomendasi.png",
        "title" => "AI Rekomendasi",
        "desc" => "Dapatkan rekomendasi aksi hijau yang personal dan sesuai dengan kebiasaanmu.",
    ],
    [
        "src" => "/assets/beranda/challange.png",
        "title" => "Challenge & Misi",
        "desc" => "Ikuti tantangan seru dan selesaikan misi untuk kumpulkan poin dan hadiah menarik.",
    ],
    [
        "src" => "/assets/beranda/komunitas.png",
        "title" => "Komunitas Aktif",
        "desc" => "Bergabung dengan komunitas peduli bumi dan berbagi pengalaman hijau bersama.",
    ],
    [
        "src" => "/assets/beranda/report.png",
        "title" => "Laporan Dampak",
        "desc" => "Lihat laporan dampak positif dari setiap aksi yang kamu lakukan.",
    ],
];
?>

<section class="px-4 py-9 text-center sm:px-8 lg:px-16">
    <!-- Heading -->
    <h2
        data-aos="fade-up"
        data-aos-duration="700"
        class="text-[clamp(1.75rem,3vw,2.5rem)] font-semibold leading-tight text-[#0B0F1F]"
    >
        Fitur Unggulan <span class="text-[#076635]">HijauIn</span>
    </h2>

    <!-- Subtitle -->
    <p
        data-aos="fade-up"
        data-aos-delay="150"
        data-aos-duration="700"
        class="mx-auto mt-4 max-w-2xl text-[clamp(1rem,1.5vw,1.125rem)] text-[#667085]"
    >
        Semua yang kamu butuhkan untuk hidup lebih hijau dalam satu platform
    </p>

    <!-- Cards -->
    <div class="mt-10 grid gap-6 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-6">
        <?php foreach ($features as $index => $feature): 
            $delay = $index * 150;
        ?>
            <div
                data-aos="fade-up"
                data-aos-delay="<?= $delay ?>"
                data-aos-duration="700"
                class="flex min-h-full flex-col items-center rounded-2xl border border-[#ECECEC] bg-white px-7 py-8 shadow-[0_6px_20px_rgba(0,0,0,0.05)] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl sm:py-10"
            >
                <!-- Icon -->
                <img
                    src="<?= $feature['src'] ?>"
                    alt="<?= $feature['title'] ?>"
                    width="260"
                    height="260"
                    class="-mt-4 h-auto w-full max-w-[220px] object-contain transition-transform duration-300 hover:scale-105 sm:max-w-[260px]"
                />

                <!-- Title -->
                <h3 class="mt-7 text-[20px] font-semibold text-[#0B0F1F]">
                    <?= $feature['title'] ?>
                </h3>

                <!-- Description -->
                <p class="mt-5 text-[15px] leading-8 text-[#667085]">
                    <?= $feature['desc'] ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>