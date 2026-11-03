<div class="rounded-[24px] bg-white p-7 shadow-sm">
  <div class="mb-8 flex items-center justify-between">
    <h3 class="text-[22px] font-semibold text-[#101828]">Kategori Aktivitas</h3>
    <p class="text-red-500 text-sm font-semibold mb-2">Fitur filter kategori dan tanggal sedang dalam tahap pengembangan (Coming Soon)</p>
    <button type="button" class="text-[17px] cursor-not-allowed font-semibold text-[#11773D]">Lihat Semua</button>
  </div>

  <div class="space-y-7">
    <?php foreach ($categoryStats as $catName => $stat): ?>
      <?php
      $count = $stat['count'];
      $percentage = $totalCategoryActions > 0 ? round(($count / $totalCategoryActions) * 100) : 0;
      ?>
      <div class="flex items-center gap-5">
        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-[#EEF8F0]">
          <img src="<?= htmlspecialchars($stat['icon']) ?>" alt="<?= htmlspecialchars($catName) ?>" class="w-7 h-7 object-contain" />
        </div>

        <div class="w-[160px]">
          <p class="text-[18px] font-semibold text-[#344054]"><?= htmlspecialchars($catName) ?></p>
        </div>

        <div class="flex-1">
          <div class="h-[12px] overflow-hidden rounded-full bg-[#E4ECE5]">
            <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $percentage ?>%;"></div>
          </div>
        </div>

        <span class="w-[70px] text-right text-[18px] font-semibold text-[#667085]">
          <?= $count ?> aksi
        </span>
      </div>
    <?php endforeach; ?>
  </div>
</div>