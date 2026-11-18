<div id="tab-selesai" class="tab-content hidden flex-col h-full gap-6">
  <div>
    <h3 class="mb-1 text-xl font-bold text-[#0B0F1F]">Challenge yang Telah Selesai</h3>
    <p class="mb-6 text-base text-gray-600">Terus konsisten! Setiap langkah kecil membawa perubahan besar.</p>
  </div>

  <div class="flex flex-col flex-1 gap-4">
    <?php foreach ($completedChallenges as $item): ?>
      <div class="group flex items-center justify-between rounded-[20px] border border-[#EAECF0] px-6 py-5 transition hover:shadow-sm">
        <div class="flex flex-1 items-center gap-6">
          <div class="flex h-[82px] w-[82px] items-center justify-center rounded-full bg-[#EEF4EC]">
            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-[70px] h-[70px] object-contain" />
          </div>
          <div>
            <h3 class="text-[20px] font-semibold text-[#101828]"><?= htmlspecialchars($item['title']) ?></h3>
            <p class="mt-2 text-[15px] text-[#667085]"><?= htmlspecialchars($item['desc']) ?></p>
            <div class="mt-3 flex items-center gap-2 text-[14px] text-[#667085]">
              📅 <?= htmlspecialchars($item['date']) ?>
            </div>
          </div>
        </div>
        <div class="mr-8 flex flex-col items-end gap-4">
          <p class="text-[26px] font-semibold text-[#11773D]">+<?= htmlspecialchars($item['point']) ?> Poin</p>
          <div class="flex items-center gap-2 rounded-full bg-[#F8FAF8] px-4 py-2">
            <img src="<?= htmlspecialchars($item['badgeImage']) ?>" alt="" class="w-[22px] h-[22px]" />
            <span class="text-[15px] font-medium text-[#475467] whitespace-nowrap"><?= htmlspecialchars($item['badge']) ?></span>
          </div>
        </div>
        <button class="text-[#98A2B3]">➔</button>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="relative mt-8 rounded-[28px] bg-[#F8FBF8] px-8 py-7 overflow-hidden">
    <img src="/assets/challange/point.png" alt="" class="absolute right-5 top-0 w-[35px] h-[35px]" />
    <h3 class="mb-6 text-[20px] font-semibold text-[#11773D]">Pencapaian Totalmu</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
        <img src="/assets/challange/point.png" alt="" class="w-[52px] h-[52px]" />
        <div>
          <h4 class="text-[38px] font-semibold leading-none text-[#101828]"><?= number_format($completedChallengeTotalPoints, 0, ',', '.') ?></h4>
          <p class="mt-3 text-[16px] leading-7 text-[#475467]">Total Poin<br />Diperoleh</p>
        </div>
      </div>

      <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
        <img src="/assets/challange/t.png" alt="" class="w-[52px] h-[52px]" />
        <div>
          <h4 class="text-[38px] font-semibold leading-none text-[#101828]"><?= htmlspecialchars((string) $completedChallengeCount) ?></h4>
          <p class="mt-3 text-[16px] leading-7 text-[#475467]">Challenge<br />Selesai</p>
        </div>
      </div>

      <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
        <img src="/assets/challange/g.png" alt="" class="w-[52px] h-[52px]" />
        <div>
          <h4 class="text-[38px] font-semibold leading-none text-[#101828]"><?= htmlspecialchars((string) $userBadgeCount) ?></h4>
          <p class="mt-3 text-[16px] leading-7 text-[#475467]">Badge<br />Diperoleh</p>
        </div>
      </div>

      <div class="flex items-center gap-5 rounded-[20px] bg-white px-7 py-7">
        <div class="flex h-[52px] w-[52px] items-center justify-center text-3xl">📅</div>
        <div>
          <h4 class="text-[38px] font-semibold leading-none text-[#101828]"><?= htmlspecialchars((string) count($activeChallenges)) ?></h4>
          <p class="mt-3 text-[16px] leading-7 text-[#475467]">Challenge<br />Aktif</p>
        </div>
      </div>
    </div>
  </div>
</div>