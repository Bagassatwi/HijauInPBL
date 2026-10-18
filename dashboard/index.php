<?php
include "./layout/layoutopen.php";

$chartData = [
  ["day" => "Sen", "eco" => 60,  "co2" => 140],
  ["day" => "Sel", "eco" => 130, "co2" => 260],
  ["day" => "Rab", "eco" => 110, "co2" => 280],
  ["day" => "Kam", "eco" => 190, "co2" => 360],
  ["day" => "Jum", "eco" => 80,  "co2" => 280],
  ["day" => "Sab", "eco" => 190, "co2" => 360],
  ["day" => "Min", "eco" => 300, "co2" => 490],
];

$missions = [
  ["title" => "Bawa tumbler", "point" => "+20", "done" => true],
  ["title" => "Matikan lampu 1 jam", "point" => "+20", "done" => true],
  ["title" => "Naik transportasi umum", "point" => "+30", "done" => true],
  ["title" => "Hemat air 20 liter", "point" => "+20", "done" => false],
  ["title" => "Tanam tanaman", "point" => "+50", "done" => false],
];
?>

<div class="flex flex-col gap-6 mx-auto w-full">
  <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-[4fr_2fr_4fr_2fr]">

    <!-- Eco Score -->
    <div class="rounded-3xl bg-white p-6 shadow-sm">
      <div class="flex h-full">
        <!-- left -->
        <div class="flex flex-1 flex-col justify-between pr-6">
          <div class="flex items-center gap-2">
            <h3 class="text-[22px] font-semibold text-[#101828]">Eco Score</h3>
            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#EEF8F0]">
              <svg class="w-4.5 h-4.5 text-[#11773D]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17 8C8 10 59 16.17 3.82 22 2c0 0 1.34-3.52 2.66-5.83C4.4 12.08 7.37 7.02 12 5c5.33-2.33 10-1 10-1s-1.33 2.33-5 4z" />
              </svg>
            </div>
          </div>

          <div class="mt-6">
            <h2 class="text-[64px] font-semibold leading-none text-[#11773D]">2.450</h2>
            <p class="mt-3 text-[18px] font-medium text-[#667085]">Eco Point</p>
            <div class="mt-8 flex items-center gap-2 text-[18px] font-semibold text-[#11773D]">
              <span>▲</span>
              <span>120 dari kemarin</span>
            </div>
          </div>
        </div>
        <!-- divider -->
        <div class="mx-2 w-px bg-[#EAECF0]"></div>
        <!-- right -->
        <div class="flex w-45 flex-col items-center justify-between pl-6">
          <div class="text-center">
            <p class="text-[18px] font-semibold text-[#667085]">Level</p>
            <p class="mt-1 text-[20px] font-bold text-[#11773D]">Eco Guardian</p>
          </div>

          <div class="relative mt-4">
            <img src="/assets/dashboard/ecoguardian.png" alt="Eco Guardian" class="w-22.5 h-30 object-contain" />
            <div class="absolute -bottom-2 left-1/2 flex h-7 w-7 -translate-x-1/2 items-center justify-center rounded-full bg-[#11773D] text-[12px] font-bold text-white">
              12
            </div>
          </div>

          <div class="mt-5 w-full">
            <div class="h-2.5 overflow-hidden rounded-full bg-[#DCE7DE]">
              <div class="h-full rounded-full bg-[#11773D]" style="width: 76%;"></div>
            </div>
            <p class="mt-3 text-center text-[18px] font-semibold text-[#475467]">760 / 1000 XP</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Aksi Hari Ini -->
    <div class="rounded-3xl bg-white p-6 shadow-sm">
      <div class="mb-8 flex items-center gap-3">
        <svg class="h-7 w-7 text-[#11773D]" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <h3 class="text-[22px] font-semibold text-[#101828]">Aksi Hari Ini</h3>
      </div>

      <div>
        <div class="flex items-end gap-2">
          <span class="text-[58px] font-bold leading-none text-[#11773D]">3</span>
          <span class="text-[58px] font-bold leading-none text-[#11773D]">/ 5</span>
        </div>
        <p class="mt-3 text-[20px] font-semibold text-[#475467]">Selesai</p>

        <div class="mt-8 h-2.5 w-full overflow-hidden rounded-full bg-[#DFE7E2]">
          <div class="h-full rounded-full bg-[#11773D]" style="width: 60%;"></div>
        </div>

        <p class="mt-7 text-[15px] font-medium text-[#667085]">Teruskan! Kamu bisa lebih hebat lagi! 💚</p>
      </div>
    </div>

    <!-- Dampak Hari Ini -->
    <div class="rounded-3xl bg-white p-6 shadow-sm">
      <h3 class="mb-8 flex items-center gap-2 text-[22px] font-semibold text-[#101828]">
        <svg class="w-6 h-6 text-[#11773D]" fill="currentColor" viewBox="0 0 24 24">
          <path d="M17 8C8 10 59 16.17 3.82 22 2c0 0 1.34-3.52 2.66-5.83C4.4 12.08 7.37 7.02 12 5c5.33-2.33 10-1 10-1s-1.33 2.33-5 4z" />
        </svg>
        Dampak Hari Ini
      </h3>

      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 *:grid *:grid-rows-[1fr_1fr_auto] *:*:m-auto text-center">
        <div class="">
          <img src="/assets/co2.png" alt="CO2" class="mb-4 h-15 w-15 object-contain " />
          <p class="text-[14px] font-medium text-[#667085]">CO₂ Dihindari</p>
          <p class="mt-3 text-[20px] font-bold text-[#11773D]">1,2 kg</p>
        </div>

        <div class="">
          <img src="/assets/air.png" alt="Air" class="h-9.5 w-9.5 object-contain text-center" />
          <p class="text-[14px] font-medium text-[#667085]">Air Dihemat</p>
          <p class="mt-3 text-[20px] font-bold text-[#11773D]">45 L</p>
        </div>

        <div class="">
          <img src="/assets/dashboard/petir.png" alt="Energi" class="mb-4 h-9.5 w-9.5 object-contain" />
          <p class="text-[14px] font-medium text-[#667085]">Energi Dihemat</p>
          <p class="mt-3 text-[20px] font-bold text-[#11773D]">2 kWh</p>
        </div>

        <div class="">
          <img src="/assets/pohon.png" alt="Pohon" class="mb-4 h-15 w-15 object-contain" />
          <p class="text-[14px] font-medium text-[#667085]">Pohon Ditanam</p>
          <p class="mt-3 text-[20px] font-bold text-[#11773D]">1 Pohon</p>
        </div>
      </div>
    </div>

    <!-- Streak -->
    <div class="grid grid-cols-2 rounded-3xl border border-[#EAECF0] bg-white p-6 shadow-sm">
      <div class="flex flex-col justify-between">
        <h3 class="flex items-center gap-2 text-[22px] font-semibold text-[#101828]">
          <svg class="w-6 h-6 text-[#FF8A00]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 23c6.075 0 11-4.925 11-11 0-4.12-2.264-7.71-5.618-9.61-.417-.237-.946.035-.97.513-.15 2.94-1.895 5.485-4.412 6.643C10.66 4.975 8.12 2.37 8.082 2.33c-.34-.352-.924-.23-1.106.233C5.698 5.764 5 8.783 5 12c0 6.075 4.925 11 11 11z" />
          </svg>
          Streak
        </h3>
        <span>
          <h2 class="text-5xl font-semibold leading-none text-[#11773D]">12</h2>
          <p class="mt-2 text-2xl font-semibold text-[#475467]">Hari</p>
        </span>
        <p class="font-medium leading-relaxed text-[#667085]">Pertahankan streak-mu!</p>
      </div>
      <div class="flex items-end">
        <img src="/assets/dashboard/streak.png" alt="Streak" class="w-25 h-50 object-contain" />
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
    <div class="h-117.5 rounded-3xl bg-white p-8 shadow-sm lg:col-span-5">
      <div class="mb-6 flex items-center justify-between">
        <h3 class="text-[22px] font-semibold text-[#101828]">Progress Mingguan</h3>
        <select class="rounded-xl border border-[#EAECF0] px-4 py-2 text-[16px] font-semibold text-[#344054] outline-none">
          <option>Minggu Ini</option>
        </select>
      </div>

      <div class="mb-6 flex gap-8">
        <div class="flex items-center gap-2">
          <span class="h-3 w-8 rounded-full bg-[#11773D]"></span>
          <span class="text-[15px] font-medium text-[#667085]">Eco Point</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="h-3 w-8 rounded-full bg-[#7AC943]"></span>
          <span class="text-[15px] font-medium text-[#667085]">CO₂ Dihindari (kg)</span>
        </div>
      </div>

      <div class="h-70 w-full relative">
        <canvas id="weeklyCanvas" class="w-full h-full"></canvas>
      </div>
    </div>

    <div class="rounded-3xl h-117.5 bg-white p-6 shadow-sm lg:col-span-4">
      <div class="mb-5 flex items-center justify-between">
        <h3 class="text-[22px] font-semibold text-[#101828]">Misi Hari Ini</h3>
        <button class="text-[16px] font-semibold text-[#11773D]">Lihat Semua</button>
      </div>

      <div class="overflow-hidden rounded-2xl border border-[#EAECF0]">
        <?php foreach ($missions as $item): ?>
          <div class="flex items-center justify-between border-b border-[#EAECF0] px-5 py-3.5 last:border-b-0">
            <div class="flex items-center gap-4">
              <?php if ($item['done']): ?>
                <div class="flex h-6 w-6 items-center justify-center rounded-md bg-[#11773D]">
                  <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                  </svg>
                </div>
              <?php else: ?>
                <div class="h-6 w-6 rounded-full border-2 border-[#D0D5DD]"></div>
              <?php endif; ?>
              <span class="text-[16px] font-medium text-[#344054]"><?= htmlspecialchars($item['title']) ?></span>
            </div>
            <span class="text-[16px] font-bold text-[#11773D]"><?= htmlspecialchars($item['point']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <button class="mt-6 flex w-full items-center justify-center gap-2 text-[18px] font-semibold text-[#11773D]">
        Lihat Semua Misi
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>

    <div class="flex h-117.5 flex-col rounded-3xl bg-white p-7 shadow-sm lg:col-span-3">
      <div class="mb-6 flex items-center justify-between">
        <h3 class="text-[22px] font-semibold text-[#101828]">AI Green Coach</h3>
        <span class="rounded-full bg-[#EEF8F0] px-3 py-1 text-[14px] font-semibold text-[#11773D]">Baru</span>
      </div>

      <div class="flex flex-1 flex-col justify-between">
        <div class="flex gap-4">
          <img src="/assets/dashboard/ai.png" alt="AI Robot" class="w-20 h-20 object-contain shrink-0" />
          <div class="relative rounded-[20px] bg-[#F8FAFC] p-4 text-[13px] leading-relaxed text-[#667085]">
            <h4 class="mb-1 text-[16px] font-bold text-[#101828]">Halo Budi! 👋</h4>
            <p>Kemarin kamu berhasil menghemat 1,2 kg CO₂. Jika hari ini naik transportasi umum lagi, kita bisa menghemat lebih banyak!</p>
          </div>
        </div>

        <button class="mt-4 flex h-12.5 w-full items-center justify-center gap-2 rounded-[14px] bg-[#11773D] text-[18px] font-semibold text-white hover:bg-[#0D6433]">
          Tanya Sekarang
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <div class="rounded-3xl bg-white p-6 shadow-sm">
      <div class="mb-6 flex items-center justify-between">
        <h3 class="text-[22px] font-semibold text-[#0B0F1F]">Challenge Aktif</h3>
        <button class="flex items-center gap-1 text-base font-bold text-[#11773D]">Lihat Semua</button>
      </div>
      <div class="flex items-center gap-6">
        <div class="flex h-32 w-32 shrink-0 items-center justify-center rounded-full bg-[#F1F8F3]">
          <img src="/assets/dashboard/plastic.png" alt="Bottle" class="h-24 w-24 object-cover" />
        </div>
        <div class="flex-1">
          <h4 class="mb-1 text-xl font-bold">30 Hari Tanpa Plastik</h4>
          <div class="mb-3 text-base font-semibold text-gray-500">
            Hari <span class="font-bold text-[#11773D]">12</span> / 30
          </div>
          <div class="mb-4 h-2 w-full rounded-full bg-gray-200">
            <div class="h-2 w-[40%] rounded-full bg-[#11773D]"></div>
          </div>
          <div class="flex flex-col gap-1 text-sm font-bold text-gray-600 sm:flex-row sm:gap-4">
            <span>✓ 500 Eco Point</span>
            <span>🏆 Eco Badge</span>
          </div>
        </div>
      </div>
    </div>

    <div class="rounded-3xl bg-white p-7 shadow-sm">
      <div class="mb-6 flex items-center justify-between">
        <h3 class="text-[22px] font-semibold text-[#101828]">Achievement Terbaru</h3>
        <button class="text-[16px] font-semibold text-[#11773D]">Lihat Semua →</button>
      </div>

      <div class="grid grid-cols-4 gap-2 text-center">
        <div>
          <img src="/assets/dashboard/ecowarrior.png" alt="Eco Warrior" class="mx-auto h-16 w-16 object-contain" />
          <h4 class="mt-2 text-xs font-semibold text-[#344054]">Eco Warrior</h4>
          <p class="mt-1 text-xs font-medium text-[#11773D]">Diperoleh</p>
        </div>
        <div>
          <img src="/assets/dashboard/plastic-free.png" alt="Plastic Free" class="mx-auto h-16 w-16 object-contain" />
          <h4 class="mt-2 text-xs font-semibold text-[#344054]">Plastic Free</h4>
          <p class="mt-1 text-xs font-medium text-[#11773D]">Diperoleh</p>
        </div>
        <div>
          <img src="/assets/dashboard/water-saver.png" alt="Water Saver" class="mx-auto h-16 w-16 object-contain" />
          <h4 class="mt-2 text-xs font-semibold text-[#344054]">Water Saver</h4>
          <p class="mt-1 text-xs font-medium text-[#667085]">80%</p>
        </div>
        <div class="opacity-50">
          <img src="/assets/dashboard/earth.png" alt="Earth Lover" class="mx-auto h-16 w-16 object-contain grayscale" />
          <h4 class="mt-2 text-xs font-semibold text-[#344054]">Earth Lover</h4>
          <p class="mt-1 text-xs font-semibold text-[#667085]">40%</p>
        </div>
      </div>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow-sm">
      <div class="mb-6 flex items-center justify-between">
        <h3 class="text-[22px] font-bold text-[#0B0F1F]">Aktivitas Terbaru</h3>
        <button class="text-base font-bold text-[#11773D]">Lihat Semua</button>
      </div>
      <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="rounded-xl bg-[#EEF8F0] p-2.5">
              <img src="/assets/tumbler.png" alt="Tumbler" class="h-6 w-6 object-contain" />
            </div>
            <div>
              <div class="text-sm font-bold text-[#0B0F1F]">Membawa tumbler</div>
              <div class="text-xs text-gray-500">Hari ini • 08.30</div>
            </div>
          </div>
          <span class="text-sm font-bold text-[#11773D]">+20 poin</span>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="rounded-xl bg-[#F2F4F7] p-2.5">
              <img src="/assets/bus.png" alt="Bus" class="h-6 w-6 object-contain" />
            </div>
            <div>
              <div class="text-sm font-bold text-[#0B0F1F]">Naik transportasi umum</div>
              <div class="text-xs text-gray-500">Hari ini • 07.45</div>
            </div>
          </div>
          <span class="text-sm font-bold text-[#11773D]">+30 poin</span>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="rounded-xl bg-[#EAF6FF] p-2.5">
              <img src="/assets/air.png" alt="Air" class="h-6 w-6 object-contain" />
            </div>
            <div>
              <div class="text-sm font-bold text-[#0B0F1F]">Hemat air 20 liter</div>
              <div class="text-xs text-gray-500">Kemarin • 18.20</div>
            </div>
          </div>
          <span class="text-sm font-bold text-[#11773D]">+20 poin</span>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const rawData = <?= json_encode($chartData); ?>;
    const canvas = document.getElementById('weeklyCanvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const dpr = window.devicePixelRatio || 1;

    function renderChart() {
      const rect = canvas.getBoundingClientRect();
      canvas.width = rect.width * dpr;
      canvas.height = rect.height * dpr;
      ctx.scale(dpr, dpr);

      const width = rect.width;
      const height = rect.height;
      const padding = {
        top: 20,
        right: 10,
        bottom: 30,
        left: 35
      };
      const chartWidth = width - padding.left - padding.right;
      const chartHeight = height - padding.top - padding.bottom;
      const maxY = 500;

      ctx.clearRect(0, 0, width, height);

      // Draw horizontal grid lines
      ctx.strokeStyle = '#F2F4F7';
      ctx.fillStyle = '#667085';
      ctx.font = '12px sans-serif';
      ctx.lineWidth = 1;

      const steps = 5;
      for (let i = 0; i <= steps; i++) {
        const val = (maxY / steps) * i;
        const y = height - padding.bottom - (val / maxY) * chartHeight;
        ctx.beginPath();
        ctx.moveTo(padding.left, y);
        ctx.lineTo(width - padding.right, y);
        ctx.stroke();
        ctx.fillText(val, 0, y + 4);
      }

      // Draw Series Line + Area
      function drawSeries(key, strokeColor, fillColor) {
        ctx.beginPath();
        rawData.forEach((d, i) => {
          const x = padding.left + (i / (rawData.length - 1)) * chartWidth;
          const y = height - padding.bottom - (d[key] / maxY) * chartHeight;
          if (i === 0) ctx.moveTo(x, y);
          else ctx.lineTo(x, y);
        });

        // Stroke line
        ctx.strokeStyle = strokeColor;
        ctx.lineWidth = 3;
        ctx.stroke();

        // Fill area
        const lastX = padding.left + chartWidth;
        const firstX = padding.left;
        const bottomY = height - padding.bottom;

        ctx.lineTo(lastX, bottomY);
        ctx.lineTo(firstX, bottomY);
        ctx.closePath();
        ctx.fillStyle = fillColor;
        ctx.fill();
      }

      // Draw X-axis Labels
      rawData.forEach((d, i) => {
        const x = padding.left + (i / (rawData.length - 1)) * chartWidth;
        ctx.fillStyle = '#667085';
        ctx.fillText(d.day, x - 8, height - 8);
      });

      drawSeries('co2', '#7AC943', 'rgba(122, 201, 67, 0.15)');
      drawSeries('eco', '#11773D', 'rgba(17, 119, 61, 0.15)');
    }

    renderChart();
    window.addEventListener('resize', renderChart);
  });
</script>

<?php
include "/layout/layoutclose.php";
