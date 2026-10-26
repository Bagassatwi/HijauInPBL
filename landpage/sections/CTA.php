<?php
$features = [
    [
        "src" => "/assets/beranda/ai-rekomendasi2.png",
        "title" => "AI Rekomendasi",
        "desc" => "Rekomendasi aksi<br />hijau yang personal<br />dari AI."
    ],
    [
        "src" => "/assets/beranda/eco-score2.png",
        "title" => "Eco Score",
        "desc" => "Pantau skor<br />keberlanjutan dan<br />perkembangan aksimu."
    ],
    [
        "src" => "/assets/beranda/catataksi2.png",
        "title" => "Catat Aksi Harian",
        "desc" => "Catat aksi ramah<br />lingkungan dengan<br />mudah setiap hari."
    ],
    [
        "src" => "/assets/beranda/person2.png",
        "title" => "Challenge & Misi",
        "desc" => "Ikuti tantangan seru<br />dan raih badge<br />menarik."
    ],
];
?>

<section data-aos="fade-up" class="px-4 py-9 sm:px-8 lg:px-16">
    <div class="relative overflow-hidden rounded-4xl bg-[#F1F6EA] p-6 sm:p-8 lg:p-16">
        
        <!-- ================= ORNAMENT ================= -->
        <img src="/assets/beranda/daunbesar.png" alt="" width="300" height="300" class="pointer-events-none absolute -right-20 -bottom-10 z-0 animate-float" />
        <img src="/assets/beranda/daunkecil.png" alt="" width="250" height="250" class="pointer-events-none absolute -bottom-15 left-[73.75%] z-0 opacity-90 animate-float" />
        <img src="/assets/beranda/daunkecil.png" alt="" width="100" height="100" class="pointer-events-none absolute left-[110px] top-5 rotate-12 opacity-80 animate-float" />
        <img src="/assets/beranda/daunkecil.png" alt="" width="28" height="28" class="pointer-events-none absolute right-6 top-8 opacity-70 animate-float" />

        <!-- ================= CONTENT ================= -->
        <div class="relative z-10 flex flex-col gap-8 xl:flex-row xl:items-center">
            
            <!-- LEFT -->
            <div class="w-full xl:w-[38%]">
                <i data-aos="fade-right" data-aos-duration="700" class="fa-solid fa-leaf mb-6 text-sm text-[#076635] block"></i>

                <h2 data-aos="fade-up" data-aos-delay="150" class="text-[clamp(1.75rem,3vw,2.5rem)] font-semibold leading-[1.18] text-[#0B0F1F]">
                    Punya Teman Pintar
                    <br />
                    Untuk Hidup <span class="text-[#076635]">Lebih Hijau</span>
                </h2>

                <p data-aos="fade-up" data-aos-delay="300" class="mt-8 text-[clamp(1rem,1.5vw,1.125rem)] leading-8 text-[#667085] sm:leading-9">
                    AI Green Coach siap membantumu memahami dampak
                    <br />
                    dari setiap aksi dan memberikan rekomendasi
                    <br />
                    personal agar hidupmu semakin berdampak.
                </p>

                <button data-aos="zoom-in" data-aos-delay="450" class="group relative mt-10 inline-flex h-12.5 items-center overflow-hidden rounded-full bg-[linear-gradient(90deg,#076635_0%,#0A6F39_48%,#086735_100%)] pl-8 pr-2.5 text-[17px] font-medium tracking-[0.01em] text-white shadow-[0_10px_22px_rgba(7,102,53,0.18)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_14px_28px_rgba(7,102,53,0.25)]">
                    <span class="absolute inset-x-0 top-0 h-px bg-white/25"></span>
                    <span class="relative z-10">Coba Sekarang</span>
                    <span class="relative z-10 ml-3 flex h-7.5 w-7.5 items-center justify-center rounded-full bg-white transition-transform duration-300 group-hover:translate-x-1">
                        <i class="fa-solid fa-arrow-right text-[13px] text-[#076635]"></i>
                    </span>
                </button>
            </div>

            <!-- RIGHT -->
            <div data-aos="fade-left" data-aos-duration="900" class="relative z-10 w-full overflow-hidden rounded-[28px] border border-white/40 bg-white/30 p-3 shadow-[0_10px_30px_rgba(0,0,0,0.04)] backdrop-blur-md xl:w-[60%]">
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <?php foreach ($features as $idx => $feature): 
                        $featureDelay = $idx * 150;
                    ?>
                        <div data-aos="fade-up" data-aos-delay="<?= $featureDelay ?>" class="group flex min-h-[280px] flex-col items-center justify-start rounded-2xl border border-[#EEF2EE] bg-white/80 px-5 py-8 text-center">
                            <img src="<?= $feature['src'] ?>" alt="<?= $feature['title'] ?>" width="180" height="180" class="transition-transform duration-300 group-hover:scale-105" />
                            
                            <h3 class="mt-4 text-[20px] font-semibold text-[#0B0F1F]">
                                <?= $feature['title'] ?>
                            </h3>

                            <p class="mt-4 text-[15px] leading-8 text-[#667085]">
                                <?= $feature['desc'] ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>