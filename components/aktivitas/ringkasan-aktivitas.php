<div class="rounded-[24px] bg-white p-7 shadow-sm">
  <div class="mb-8 flex items-center justify-between">
    <h3 class="text-[22px] font-semibold text-[#101828]">Ringkasan Aktivitas</h3>
    <select class="rounded-xl border border-[#EAECF0] bg-white px-6 py-2 text-[15px] font-semibold text-[#344054] outline-none">
      <option>Hari Ini</option>
    </select>
  </div>

  <div class="mb-8 flex items-center justify-between">
    <div class="pr-8">
      <p class="text-[16px] font-semibold text-[#667085]">Total Poin</p>
      <div class="mt-4 flex items-center gap-2">
        <h2 class="text-[52px] font-bold leading-none text-[#11773D]"><?= $userXp ?></h2>
        <span class="text-[28px] text-[#11773D]">🍃</span>
      </div>
      <p class="mt-5 text-[16px] font-medium text-[#667085]">Dari <?= count($activities) ?> aksi</p>
    </div>

    <div class="h-[120px] w-px bg-[#EAECF0]"></div>

    <div class="flex flex-col items-center pl-8">
      <div class="relative h-[120px] w-[120px]">
        <svg class="-rotate-90" width="120" height="120" viewBox="0 0 120 120">
          <circle cx="60" cy="60" r="48" stroke="#E6EFE8" stroke-width="10" fill="none" />
          <circle cx="60" cy="60" r="48" stroke="#11773D" stroke-width="10" fill="none" stroke-dasharray="301.6" stroke-dashoffset="<?= $dashOffset ?>" stroke-linecap="round" />
        </svg>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
          <span class="text-[30px] font-bold text-[#11773D]"><?= $targetPercentage ?>%</span>
          <span class="text-[20px] text-[#11773D]">🍃</span>
        </div>
      </div>
      <p class="mt-4 text-center text-[16px] font-semibold text-[#667085]">dari target harian</p>
    </div>
  </div>

  <div class="rounded-2xl bg-[#F7FBF8] p-5">
    <div class="mb-4 flex items-center justify-between">
      <span class="text-[16px] font-semibold text-[#344054]">Target Harian</span>
      <span class="text-[16px] font-semibold text-[#344054]"><?= $dailyTarget ?> poin</span>
    </div>
    <div class="h-[10px] overflow-hidden rounded-full bg-[#DCE7DE]">
      <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $targetPercentage ?>%"></div>
    </div>
  </div>
</div>