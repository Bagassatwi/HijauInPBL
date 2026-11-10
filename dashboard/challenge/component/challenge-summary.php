<div class="rounded-[24px] border border-[#EAECF0] bg-white p-7 shadow-sm">
  <h3 class="mb-10 text-[22px] font-semibold text-[#101828]">Ringkasan Challenge</h3>
  <div class="flex items-center">
    <div class="flex-1">
      <p class="mb-4 text-[16px] font-medium text-[#667085]">Total Poin</p>
      <div class="flex items-center gap-2">
        <span class="text-[54px] font-semibold leading-none text-[#11773D]"><?= number_format($completedChallengeTotalPoints, 0, ',', '.') ?></span>
        <img src="/assets/challange/point.png" alt="Leaf" class="w-[26px] h-[26px] object-contain" />
      </div>
    </div>

    <div class="mx-10 h-20 w-px bg-[#EAECF0]"></div>

    <div class="flex-1">
      <p class="mb-4 text-[16px] font-medium text-[#667085]">Challenge Selesai</p>
      <div class="flex items-center gap-3">
        <span class="text-[54px] font-semibold leading-none text-[#11773D]"><?= htmlspecialchars((string) $completedChallengeCount) ?></span>
        <img src="/assets/challange/t.png" alt="Trophy" class="w-[28px] h-[28px] object-contain" />
      </div>
    </div>
  </div>
</div>