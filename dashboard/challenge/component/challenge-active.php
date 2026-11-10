<div id="tab-aktif" class="tab-content flex flex-col gap-8">
  <?php if (!empty($featuredChallenge)): ?>
    <div class="rounded-[20px] border border-[#EAECF0] p-6 flex flex-col lg:flex-row items-center gap-6">
      <div class="shrink-0 flex items-center justify-center w-32 h-32 overflow-hidden rounded-full relative bg-[#EEF8EF]">
        <img src="<?= htmlspecialchars($featuredChallenge['image'] ?? '/assets/dashboard/plastic.png') ?>" alt="<?= htmlspecialchars($featuredChallenge['title'] ?? 'Challenge') ?>" class="w-[120px] h-[120px] object-contain" />
      </div>
      <div class="flex-1 w-full">
        <span class="inline-flex rounded-full bg-[#EEF8EF] px-3 py-1 text-[12px] font-semibold text-[#11773D]">
          Tantangan Aktif
        </span>
        <h2 class="mt-3 text-[30px] font-bold text-[#101828]"><?= htmlspecialchars($featuredChallenge['title'] ?? 'Challenge aktif') ?></h2>
        <p class="mt-2 max-w-[420px] text-[15px] leading-7 text-[#667085]">
          <?= htmlspecialchars($featuredChallenge['desc'] ?? 'Challenge aktif saat ini.') ?>
        </p>
      </div>
      <div class="lg:w-1/3 flex flex-col w-full gap-3">
        <div class="flex items-end gap-2">
          <span class="text-[34px] font-bold text-[#11773D]"><?= htmlspecialchars($featuredChallenge['currentCount'] ?? $featuredChallenge['current'] ?? 0) ?></span>
          <span class="pb-1 text-[18px] text-[#98A2B3]">/ <?= htmlspecialchars($featuredChallenge['totalDays'] ?? $featuredChallenge['total'] ?? 1) ?> Hari</span>
        </div>
        <div class="mt-4 h-[8px] w-full rounded-full bg-[#DDE3DE]">
          <div class="h-full rounded-full bg-[#11773D]" style="width: <?= htmlspecialchars($featuredChallenge['percent'] ?? '0%') ?>;"></div>
        </div>
        <div class="mt-5 flex items-center gap-5">
          <div class="flex items-center gap-2">
            <img src="/assets/challange/point.png" width="18" height="18" alt="" />
            <span class="text-[14px] font-medium"><?= htmlspecialchars($featuredChallenge['pointLabel'] ?? (($featuredChallenge['point'] ?? 0) . ' Eco Point')) ?></span>
          </div>
          <div class="flex items-center gap-2">
            <img src="<?= htmlspecialchars($featuredChallenge['badgeImage'] ?? '/assets/challange/ecowarrior.png') ?>" width="18" height="18" alt="" />
            <span class="text-[14px] font-medium"><?= htmlspecialchars($featuredChallenge['badge'] ?? 'Eco Warrior') ?></span>
          </div>
        </div>
        <div class="mt-5 inline-flex items-center w-[220px] gap-2 rounded-full bg-[#FFF7E8] px-3 py-2">
          <span class="text-[14px] font-semibold text-[#C76B00]"><?= htmlspecialchars($featuredChallenge['currentCount'] ?? $featuredChallenge['current'] ?? 0) ?> Hari Berturut-turut</span>
          <img src="/assets/challange/api.png" width="16" height="16" alt="" class="ml-2" />
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div>
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-bold text-[#0B0F1F]">Challenge Lainnya</h3>
      <button type="button" class="text-[#11773D] flex items-center gap-1 text-base font-bold">
        Lihat Semua ➔
      </button>
    </div>
    <div class="flex flex-col gap-4">
      <?php foreach ($activeChallenges as $item): ?>
        <div class="group flex items-center justify-between border-b border-[#EAECF0] py-5 transition">
          <div class="flex flex-1 items-center gap-5">
            <div class="flex h-[72px] w-[72px] shrink-0 items-center justify-center rounded-full bg-[#EEF4EC]">
              <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-[42px] h-[42px] object-contain" />
            </div>
            <div>
              <h4 class="text-[22px] font-semibold text-[#101828]"><?= htmlspecialchars($item['title']) ?></h4>
              <p class="mt-1 text-[15px] text-[#667085]"><?= htmlspecialchars($item['desc']) ?></p>
            </div>
          </div>
          <div class="mr-10 w-[170px]">
            <p class="mb-2 text-[15px] font-semibold text-[#11773D]"><?= htmlspecialchars($item['progress']) ?></p>
            <div class="h-[7px] rounded-full bg-[#DDE3DE]">
              <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $item['percent'] ?>;"></div>
            </div>
          </div>
          <div class="mr-6 w-[70px] text-right">
            <p class="text-[24px] font-bold text-[#11773D]"><?= htmlspecialchars($item['point']) ?></p>
            <p class="text-[14px] text-[#667085]">Poin</p>
          </div>
          <span class="text-[#98A2B3]">➔</span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="border-[#EAECF0]">
    <h3 class="mb-8 text-[22px] font-semibold text-[#101828]">Cara Kerja Challenge</h3>
    <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-6">
      <div class="flex w-[170px] flex-col items-center text-center">
        <img src="/assets/challange/pilih.png" alt="Pilih" class="mb-5 w-[58px] h-[58px] object-contain" />
        <h4 class="text-[16px] font-semibold text-[#101828]">1. Pilih Challenge</h4>
        <p class="mt-2 text-[14px] leading-6 text-[#667085]">Pilih challenge yang kamu ingin ikuti.</p>
      </div>
      <span class="mt-6 hidden text-[#11773D] md:block text-xl">➔</span>

      <div class="flex w-[170px] flex-col items-center text-center">
        <img src="/assets/challange/aksi.png" alt="Aksi" class="mb-5 w-[78px] h-[78px] object-contain" />
        <h4 class="text-[16px] font-semibold text-[#101828]">2. Lakukan Aksi</h4>
        <p class="mt-2 text-[14px] leading-6 text-[#667085]">Lakukan aksi hijau sesuai target challenge.</p>
      </div>
      <span class="mt-6 hidden text-[#11773D] md:block text-xl">➔</span>

      <div class="flex w-[170px] flex-col items-center text-center">
        <img src="/assets/challange/dapatkanpoin.png" alt="Poin" class="mb-5 w-[76px] h-[76px] object-contain" />
        <h4 class="text-[16px] font-semibold text-[#101828]">3. Dapatkan Poin</h4>
        <p class="mt-2 text-[14px] leading-6 text-[#667085]">Setiap aksi yang tervalidasi memberi poin.</p>
      </div>
      <span class="mt-6 hidden text-[#11773D] md:block text-xl">➔</span>

      <div class="flex w-[170px] flex-col items-center text-center">
        <img src="/assets/challange/reward.png" alt="Reward" class="mb-5 w-[74px] h-[74px] object-contain" />
        <h4 class="text-[16px] font-semibold text-[#101828]">4. Raih Reward</h4>
        <p class="mt-2 text-[14px] leading-6 text-[#667085]">Selesaikan challenge dan raih reward spesial!</p>
      </div>
    </div>
  </div>
</div>