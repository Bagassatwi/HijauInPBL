<div class="rounded-[24px] border border-[#EAECF0] bg-white p-7 shadow-sm">
  <div class="mb-5 flex items-center justify-between">
    <h3 class="text-[22px] font-semibold text-[#101828]">Progress Mingguan</h3>
    <button class="text-[15px] font-semibold text-[#11773D] hover:underline">Lihat Detail</button>
  </div>

  <div class="mb-1 flex items-center gap-2">
    <span class="text-[54px] font-semibold leading-none text-[#11773D]"><?= number_format($weeklyTotalPoints, 0, ',', '.') ?></span>
    <img src="/assets/challange/point.png" alt="Leaf" class="w-[24px] h-[24px] object-contain" />
  </div>
  <p class="mb-8 text-[18px] font-medium text-[#667085]">Poin</p>

  <div class="h-[250px] w-full">
    <svg class="w-full h-full overflow-visible" viewBox="0 0 320 200">
      <defs>
        <linearGradient id="greenBar" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="#8BCB5E" />
          <stop offset="100%" stop-color="#11773D" />
        </linearGradient>
      </defs>

      <line x1="30" y1="0" x2="320" y2="0" stroke="#EAECF0" />
      <line x1="30" y1="40" x2="320" y2="40" stroke="#EAECF0" />
      <line x1="30" y1="80" x2="320" y2="80" stroke="#EAECF0" />
      <line x1="30" y1="120" x2="320" y2="120" stroke="#EAECF0" />
      <line x1="30" y1="160" x2="320" y2="160" stroke="#EAECF0" />

      <text x="0" y="5" fill="#667085" font-size="11">400</text>
      <text x="0" y="45" fill="#667085" font-size="11">300</text>
      <text x="0" y="85" fill="#667085" font-size="11">200</text>
      <text x="0" y="125" fill="#667085" font-size="11">100</text>
      <text x="15" y="165" fill="#667085" font-size="11">0</text>

      <?php
      $xStart = 45;
      $spacing = 38;
      foreach ($weeklyChartData as $i => $d):
        $barHeight = ($d['value'] / 400) * 160;
        $yPos = 160 - $barHeight;
        $xPos = $xStart + ($i * $spacing);
      ?>
        <rect x="<?= $xPos ?>" y="<?= $yPos ?>" width="12" height="<?= $barHeight ?>" rx="4" fill="url(#greenBar)" />
        <text x="<?= $xPos - 2 ?>" y="180" fill="#667085" font-size="12" font-weight="500"><?= $d['day'] ?></text>
      <?php endforeach; ?>
    </svg>
  </div>
</div>