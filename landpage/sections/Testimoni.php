<?php
$activities = [
    [
        "img" => "/assets/beranda/bersihpantai.png",
        "badge" => "Bersih Bersama",
        "title" => "Bersih Pantai Anyer",
        "peserta" => "129 peserta",
        "date" => "12 Mei 2024",
    ],
    [
        "img" => "/assets/beranda/tanampohon.png",
        "badge" => "Tanam Hijau",
        "title" => "Tanam Pohon Mangrove",
        "peserta" => "85 peserta",
        "date" => "10 Mei 2024",
    ],
    [
        "img" => "/assets/beranda/workshop.png",
        "badge" => "Daur Ulang",
        "title" => "Workshop Daur Ulang",
        "peserta" => "96 peserta",
        "date" => "08 Mei 2024",
    ],
];

$testimonies = [
    [
        "avatar" => "/assets/ava2.jpg",
        "name" => "Sinta Putri",
        "text" => '"HijauIn membantuku lebih sadar dan konsisten menjaga lingkungan setiap hari."',
    ],
    [
        "avatar" => "/assets/ava1.jpg",
        "name" => "Budi Santoso",
        "text" => '"Challenge-nya seru dan komunitasnya positif banget!"',
    ],
    [
        "avatar" => "/assets/ava3.jpg",
        "name" => "Andi Pratama",
        "text" => '"Fitur Eco Score bikin aku lebih termotivasi melakukan aksi ramah lingkungan setiap hari."',
    ],
    [
        "avatar" => "/assets/ava4.jpg",
        "name" => "Rina Maharani",
        "text" => '"Komunitasnya aktif dan banyak kegiatan seru yang membuatku semakin peduli pada lingkungan."',
    ],
    [
        "avatar" => "/assets/ava6.jpg",
        "name" => "Dewi Lestari",
        "text" => '"AI Rekomendasi sangat membantu memberikan ide sederhana untuk hidup lebih berkelanjutan."',
    ],
    [
        "avatar" => "/assets/ava5.jpg",
        "name" => "Fajar Nugroho",
        "text" => '"Aplikasinya mudah digunakan dan challenge mingguan membuatku semakin semangat menjaga bumi."',
    ],
];

// Membagi testimoni menjadi grup berpasangan (2 per slide)
$slides = array_chunk($testimonies, 2);
?>

<section class="px-4 py-12 sm:px-8 lg:px-16 lg:py-25">
    <div data-aos="fade-up" class="rounded-[30px] bg-[#F8F9F9] p-4 shadow-[0_10px_35px_rgba(0,0,0,.06)] sm:p-8">
        <div class="flex flex-col gap-8 xl:flex-row">
            
            <!-- LEFT -->
            <div data-aos="fade-right" class="w-full xl:w-[24%]">
                <h2 class="text-[clamp(1.5rem,3vw,1.75rem)] font-semibold leading-tight text-[#0B0F1F]">
                    Komunitas <span class="text-[#076635]">Hijau,</span>
                    <br />
                    Perubahan Nyata
                </h2>

                <p class="mt-6 text-[16px] leading-8 text-[#667085]">
                    Bergabung dengan ribuan orang hebat yang sudah memulai langkah hijau untuk bumi yang lebih baik.
                </p>

                <button data-aos="zoom-in" data-aos-delay="200" class="group mt-8 flex h-15 items-center gap-3 rounded-xl border border-[#B7E0C1] px-6 text-[16px] font-semibold text-[#076635] transition-all duration-300 hover:-translate-y-1 hover:bg-green-50">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#EAF8EE] transition-transform duration-300 group-hover:scale-110">
                        <i class="fa-solid fa-users text-[20px]"></i>
                    </div>
                    Gabung Komunitas
                </button>
            </div>

            <!-- CENTER -->
            <div data-aos="fade-up" data-aos-delay="150" class="w-full xl:w-[48%]">
                <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h3 class="text-[22px] font-semibold">
                        Kegiatan Komunitas Terbaru
                    </h3>

                    <button class="group flex items-center gap-2 text-[16px] font-semibold text-[#076635]">
                        Lihat Semua
                        <i class="fa-solid fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"></i>
                    </button>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                    <?php foreach ($activities as $index => $item): 
                        $delay = $index * 150;
                    ?>
                        <div data-aos="fade-up" data-aos-delay="<?= $delay ?>" class="group">
                            <div class="relative overflow-hidden rounded-2xl">
                                <div class="relative h-[150px] w-full">
                                    <img 
                                        src="<?= $item['img'] ?>" 
                                        alt="<?= $item['title'] ?>" 
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    />
                                </div>
                                <span class="absolute bottom-3 left-3 rounded-full bg-[#E8F7EB] px-3 py-1 text-[11px] font-semibold text-[#076635]">
                                    <?= $item['badge'] ?>
                                </span>
                            </div>

                            <h4 class="mt-4 text-[16px] font-semibold text-[#0B0F1F]">
                                <?= $item['title'] ?>
                            </h4>

                            <div class="mt-2 flex items-center gap-2 text-[13px] text-[#22A75D]">
                                <i class="fa-solid fa-users"></i>
                                <?= $item['peserta'] ?>
                            </div>

                            <div class="mt-1 flex items-center gap-2 text-[13px] text-[#667085]">
                                <i class="fa-solid fa-calendar-alt"></i>
                                <?= $item['date'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- RIGHT -->
            <div data-aos="fade-left" data-aos-delay="300" class="w-full xl:ml-10 xl:w-[28%]">
                <h3 class="mb-6 text-[22px] font-semibold">Kata Mereka</h3>

                <!-- Embla Carousel Viewport -->
                <div class="overflow-hidden" id="embla-testimoni">
                    <div class="flex">
                        <?php foreach ($slides as $slideIndex => $group): ?>
                            <div class="min-w-full space-y-5">
                                <?php foreach ($group as $cardIndex => $item): 
                                    $cardDelay = $cardIndex * 150;
                                ?>
                                    <div data-aos="fade-left" data-aos-delay="<?= $cardDelay ?>" class="rounded-2xl bg-[#FCFCFC] p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                                        <div class="flex items-start gap-4">
                                            <img 
                                                src="<?= $item['avatar'] ?>" 
                                                alt="<?= $item['name'] ?>" 
                                                width="52" 
                                                height="52" 
                                                class="rounded-full object-cover"
                                            />

                                            <div class="flex-1">
                                                <div class="flex items-center justify-between gap-2">
                                                    <h4 class="text-[16px] font-semibold">
                                                        <?= $item['name'] ?>
                                                    </h4>

                                                    <div class="flex text-[12px] text-[#FFC107]">
                                                        <?php for($star=0; $star<5; $star++): ?>
                                                            <i class="fa-solid fa-star"></i>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>

                                                <p class="mt-2 text-[14px] leading-7 text-[#667085]">
                                                    <?= $item['text'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Carousel Dots Navigation -->
                <div data-aos="fade-up" data-aos-delay="450" class="mt-6 flex justify-center gap-2" id="embla-dots">
                    <?php foreach ($slides as $index => $_): ?>
                        <button 
                            type="button" 
                            data-index="<?= $index ?>" 
                            class="embla-dot h-2 rounded-full transition-all <?= $index === 0 ? 'w-5 bg-[#22A75D]' : 'w-2 bg-[#A5D6B0]' ?>"
                        ></button>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Script Embla Carousel untuk PHP Native -->
<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const emblaNode = document.getElementById("embla-testimoni");
        if (!emblaNode) return;

        const options = { loop: true, align: "start" };
        const emblaApi = EmblaCarousel(emblaNode, options);

        const dots = document.querySelectorAll(".embla-dot");

        const updateDots = () => {
            const selectedIndex = emblaApi.selectedScrollSnap();
            dots.forEach((dot, index) => {
                if (index === selectedIndex) {
                    dot.classList.remove("w-2", "bg-[#A5D6B0]");
                    dot.classList.add("w-5", "bg-[#22A75D]");
                } else {
                    dot.classList.remove("w-5", "bg-[#22A75D]");
                    dot.classList.add("w-2", "bg-[#A5D6B0]");
                }
            });
        };

        emblaApi.on("select", updateDots);

        dots.forEach((dot) => {
            dot.addEventListener("click", () => {
                const index = parseInt(dot.getAttribute("data-index"), 10);
                emblaApi.scrollTo(index);
            });
        });
    });
</script>