<div id="tab-semua" class="tab-content hidden flex-col gap-6">
  <div class="md:flex-row flex flex-col items-center gap-4">
    <?php
    $allChallengeTags = array_values(array_unique(array_filter(array_map(fn($item) => trim((string)($item['tag'] ?? '')), $allChallenges))));
    sort($allChallengeTags);
    ?>
    <select id="challengeCategoryFilter" class="md:w-auto rounded-xl w-full px-4 py-3 text-base font-semibold text-[#344054] bg-white border border-gray-200 outline-none focus:border-[#11773D]">
      <option value="semua">Semua Kategori</option>
      <?php foreach ($allChallengeTags as $challengeTag): ?>
        <option value="<?= htmlspecialchars(strtolower($challengeTag)) ?>"><?= htmlspecialchars($challengeTag) ?></option>
      <?php endforeach; ?>
    </select>

    <div class="relative flex-1 w-full">
      <input id="challengeSearchInput" type="search" placeholder="Cari challenge..." class="rounded-xl w-full py-3 pl-4 pr-4 text-base font-semibold border border-gray-200 bg-white text-[#344054] outline-none focus:border-[#11773D]" />
    </div>

    <select id="challengeSortFilter" class="md:w-auto rounded-xl w-full px-4 py-3 text-base font-semibold text-[#344054] bg-white border border-gray-200 outline-none focus:border-[#11773D]">
      <option value="terbaru">Terbaru</option>
      <option value="poin-tertinggi">Poin Tertinggi</option>
      <option value="nama">Nama A-Z</option>
    </select>
  </div>

  <p id="challengeResultCount" class="text-sm font-medium text-[#667085]"></p>

  <div id="challengeList" class="flex flex-col gap-4">
    <?php foreach ($allChallenges as $item): ?>
      <div class="challenge-card group flex items-center justify-between border-b border-[#EAECF0] py-4"
        data-title="<?= htmlspecialchars(strtolower($item['title'])) ?>"
        data-desc="<?= htmlspecialchars(strtolower($item['desc'])) ?>"
        data-tag="<?= htmlspecialchars(strtolower($item['tag'])) ?>"
        data-badge="<?= htmlspecialchars(strtolower($item['badge'])) ?>"
        data-point="<?= (int)$item['point'] ?>">
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
              <span class="text-[15px] w-[100px] text-[#667085]">XP</span>
            </div>
            <div class="flex items-center -ml-5 gap-2">
              <img src="<?= htmlspecialchars($item['badgeImage']) ?>" alt="" width="18" height="18" />
              <span class="text-[15px] w-[200px] font-medium text-[#475467]"><?= htmlspecialchars($item['badge']) ?></span>
            </div>
          </div>
        </div>

        <?php if (($item['status'] ?? '') === 'active'): ?>
          <span class="ml-8 rounded-full bg-[#EEF8F0] px-4 py-2 text-sm font-semibold text-[#11773D]">Aktif</span>
        <?php elseif (($item['status'] ?? '') === 'completed'): ?>
          <span class="ml-8 rounded-full bg-[#F2F4F7] px-4 py-2 text-sm font-semibold text-[#475467]">Selesai</span>
        <?php else: ?>
          <button type="button" class="join-challenge-btn ml-8 min-w-[110px] rounded-xl bg-[#11773D] px-4 py-3 text-sm font-semibold text-white hover:bg-[#0E6634]" data-challenge-id="<?= htmlspecialchars($item['challengeId']) ?>">
            Ikuti
          </button>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <div id="challengeEmptyState" class="hidden rounded-[20px] border border-dashed border-[#D7E8DC] bg-[#F8FBF8] px-6 py-8 text-center">
    <p class="text-[18px] font-semibold text-[#344054]">Challenge tidak ditemukan</p>
    <p class="mt-2 text-[15px] text-[#667085]">Coba kata kunci atau kategori lain.</p>
  </div>
</div>