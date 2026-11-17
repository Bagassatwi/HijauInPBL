<div class="rounded-3xl flex flex-col flex-1 p-6 bg-white shadow-sm">
  <div class="lg:flex-row lg:items-center flex flex-col items-start justify-between gap-4 mb-6">
    <h3 class="text-xl font-bold text-[#0B0F1F]">Riwayat Aktivitas</h3>
    <div class="lg:w-auto flex items-center w-full gap-3">
      <p class="text-red-500 text-sm font-semibold mb-2">Fitur filter kategori dan tanggal sedang dalam tahap pengembangan (Coming Soon)</p>
      <button type="button" class="cursor-not-allowed lg:flex-none rounded-xl flex items-center justify-between flex-1 gap-2 px-4 py-2 text-base font-semibold text-gray-700 bg-white border border-gray-200">
        🔍 Semua Kategori ▼
      </button>
      <button type="button" class="cursor-not-allowed lg:flex-none rounded-xl flex items-center justify-between flex-1 gap-2 px-4 py-2 text-base font-semibold text-gray-700 bg-white border border-gray-200">
        📅 Pilih Tanggal ▼
      </button>
    </div>
  </div>

  <div class="flex items-center gap-6 mb-6 overflow-x-auto border-b border-gray-100">
    <button class="tab-btn active pb-3 text-base font-bold border-b-2 text-[#11773D] border-[#11773D]" data-tab="semua">Semua</button>
    <button class="tab-btn pb-3 text-base font-bold border-b-2 text-gray-500 border-transparent" data-tab="hari">Hari Ini</button>
    <button class="tab-btn pb-3 text-base font-bold border-b-2 text-gray-500 border-transparent" data-tab="minggu">Minggu Ini</button>
    <button class="tab-btn pb-3 text-base font-bold border-b-2 text-gray-500 border-transparent" data-tab="bulan">Bulan Ini</button>
  </div>

  <div class="space-y-8">
    <?php if (empty($groupedActivities)): ?>
      <div class="flex flex-col items-center justify-center rounded-3xl border border-dashed border-gray-200 py-20">
        <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[#EEF8F0]">
          🍃
        </div>
        <h3 class="mt-6 text-xl font-bold">Belum Ada Aktivitas</h3>
        <p class="mt-3 max-w-md text-center text-[#667085] leading-7">
          Belum ada aktivitas yang tercatat. Yuk mulai aksi hijau pertamamu!
        </p>
      </div>
    <?php else: ?>
      <?php foreach ($groupedActivities as $dateStr => $list): ?>
        <?php $totalPoint = array_sum(array_column($list, 'point')); ?>
        <div class="activity-group">
          <div class="flex justify-between mb-4">
            <span class="font-bold text-gray-700"><?= htmlspecialchars($dateStr) ?></span>
            <span class="flex items-center gap-1 font-bold">
              Total: <?= $totalPoint ?> poin 🍃
            </span>
          </div>

          <div class="space-y-4">
            <?php foreach ($list as $act): ?>
              <?php
              $catName = $act['category_name'] ?? 'Kebiasaan';
              $badge = $badgeColorMap[$catName] ?? ['bg' => 'bg-[#EEF8F0]', 'text' => 'text-[#11773D]'];
              $imgSrc = $activityImageMap[$act['title']] ?? '/assets/tumbler.png';
              ?>
              <div class="rounded-2xl hover:shadow-md flex items-center justify-between border border-gray-100 p-4 transition-shadow">
                <div class="flex w-full items-center justify-between py-2">
                  <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full <?= $badge['bg'] ?>">
                      <img src="<?= htmlspecialchars($imgSrc) ?>" alt="" class="w-7 h-7 object-contain" />
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-3">
                      <div>
                        <h4 class="text-[18px] font-semibold text-[#344054]"><?= htmlspecialchars($act['title']) ?></h4>
                        <p class="mt-1 text-[15px] font-medium text-[#667085]">
                          <?= date('H:i', strtotime($act['activity_date'])) ?> WIB
                        </p>
                      </div>
                      <span class="rounded-full px-3 py-1 text-[13px] font-semibold <?= $badge['bg'] ?> <?= $badge['text'] ?>">
                        <?= htmlspecialchars($catName) ?>
                      </span>
                    </div>
                  </div>

                  <div class="flex items-center gap-8">
                    <div class="text-right">
                      <p class="text-[20px] font-semibold text-[#11773D]">+<?= (int)$act['point'] ?></p>
                      <p class="text-[14px] font-medium text-[#667085]">poin</p>
                    </div>
                    <span class="text-[#98A2B3]">➔</span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>