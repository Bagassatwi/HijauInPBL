<div class="rounded-[24px] border border-[#EAECF0] bg-white p-7 shadow-sm">
  <div class="mb-10 flex items-center justify-between">
    <h3 class="text-[22px] font-semibold text-[#101828]">Badge yang Didapat</h3>
    <button class="text-[15px] font-semibold text-[#11773D] hover:underline">Lihat Semua</button>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <?php foreach ($userBadges as $badge): ?>
      <div class="flex flex-col items-center">
        <img src="<?= htmlspecialchars($badge['image'] ?? '/assets/challange/ecowarrior.png') ?>" alt="<?= htmlspecialchars($badge['name'] ?? 'Badge') ?>" class="mb-4 w-[78px] h-[78px] object-contain" />
        <p class="text-center text-[16px] font-medium text-[#344054]"><?= htmlspecialchars($badge['name'] ?? 'Badge') ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</div>