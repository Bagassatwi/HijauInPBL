<div id="tab-semua" class="tab-content hidden flex-col gap-6">
  <p class="text-red-500 text-sm font-semibold mb-2">Fitur filter kategori dan pencarian sedang dalam tahap pengembangan (Coming Soon)</p>

  <div class="md:flex-row flex flex-col items-center gap-4">
    <button type="button" disabled class="md:w-auto rounded-xl flex items-center justify-between w-full gap-2 px-4 py-3 text-base font-semibold text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed">
      🔍 Semua Kategori ▼
    </button>
    <div class="relative flex-1 w-full">
      <input type="text" placeholder="Cari challenge..." disabled class="rounded-xl w-full py-3 pl-4 pr-4 text-base font-semibold border border-gray-200 bg-gray-50 text-gray-400 outline-none cursor-not-allowed" />
    </div>
    <button type="button" disabled class="md:w-auto rounded-xl flex items-center justify-between w-full gap-2 px-4 py-3 text-base font-semibold text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed">
      Terbaru ▼
    </button>
  </div>

  <div class="flex flex-col gap-4">
    <?php foreach ($allChallenges as $item): ?>
      <div class="group flex items-center justify-between border-b border-[#EAECF0] py-4">
        <div class="flex flex-1 items-center gap-6">
          <div class="flex h-[86px] w-[86px] items-center justify-center rounded-full bg-[#EEF4EC]">
            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-[70px] h-[70px] object-contain" />
          </div>
          <div>
            <h3 class="text-[20px] font-semibold text-[#101828]"><?= htmlspecialchars($item['title']) ?></h3>
            <span class="mt-2 inline-flex rounded-full px-3 py-1 text-[13px] font-semibold <?= $item['tagColor'] ?>">
              <?= htmlspecialchars($item['tag']) ?>
            </span>
            <p class="mt-3 max-w-[330px] text-[15px] leading-8 text-[#667085]"><?= htmlspecialchars($item['desc']) ?></p>
          </div>
        </div>

        <div class="w-[230px]">
          <div class="mb-3">
            <span class="text-[36px] font-semibold text-[#11773D]"><?= htmlspecialchars($item['current']) ?></span>
            <span class="ml-2 text-[18px] font-medium text-[#667085]">/ <?= htmlspecialchars($item['total']) ?></span>
          </div>
          <div class="h-[6px] rounded-full bg-[#DDE3DE]">
            <div class="h-full rounded-full bg-[#11773D]" style="width: <?= $item['percent'] ?>;"></div>
          </div>
          <div class="mt-4 flex items-center gap-8">
            <div class="flex items-center gap-2">
              <img src="/assets/challange/point.png" alt="" width="18" height="18" />
              <span class="text-[18px] font-semibold text-[#11773D]"><?= htmlspecialchars($item['point']) ?></span>
              <span class="text-[15px] w-[100px] text-[#667085]">Eco Point</span>
            </div>
            <div class="flex items-center -ml-5 gap-2">
              <img src="<?= htmlspecialchars($item['badgeImage']) ?>" alt="" width="18" height="18" />
              <span class="text-[15px] w-[200px] font-medium text-[#475467]"><?= htmlspecialchars($item['badge']) ?></span>
            </div>
          </div>
        </div>

        <button class="ml-8 text-[#98A2B3]">➔</button>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="flex items-center justify-center gap-2 mt-6">
    <button class="flex items-center justify-center w-10 h-10 text-gray-400 border border-gray-200 rounded-lg">◄</button>
    <button class="bg-[#11773D] flex items-center justify-center w-10 h-10 text-base font-bold text-white rounded-lg">1</button>
    <button class="flex items-center justify-center w-10 h-10 text-base font-bold text-gray-600 border border-gray-200 rounded-lg">2</button>
    <button class="flex items-center justify-center w-10 h-10 text-base font-bold text-gray-600 border border-gray-200 rounded-lg">3</button>
    <button class="flex items-center justify-center w-10 h-10 text-gray-600 border border-gray-200 rounded-lg">►</button>
  </div>
</div>