<?php
/**
 * Fungsi helper untuk merender Dropdown Menu PHP Native
 * 
 * @param string $label Teks atau HTML pada tombol trigger
 * @param array $items Daftar menu (label, href/onclick, variant, icon)
 * @param string $align Posisi alignment ('left' atau 'right')
 */
function render_dropdown($label, $items = [], $align = 'left') {
    $align_class = ($align === 'right') ? 'right-0' : 'left-0';
    ?>
    <!-- Dropdown Container -->
    <div class="relative inline-block text-left" x-data="{ open: false }">
        
        <!-- Trigger Button -->
        <button 
            type="button" 
            @click="open = !open" 
            @click.outside="open = false"
            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#076635]/50 transition"
        >
            <?= $label; ?>
            <svg class="h-4 w-4 text-gray-500 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>

        <!-- Dropdown Popup Content -->
        <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute <?= $align_class; ?> mt-2 w-48 origin-top-right rounded-lg bg-white p-1 text-gray-700 shadow-lg ring-1 ring-black/5 focus:outline-none z-50"
            style="display: none;"
        >
            <?php foreach ($items as $item): ?>
                <?php if (isset($item['separator']) && $item['separator']): ?>
                    <!-- Separator -->
                    <div class="-mx-1 my-1 h-px bg-gray-100"></div>
                <?php elseif (isset($item['label_header'])): ?>
                    <!-- Label Group -->
                    <div class="px-2 py-1 text-xs font-medium text-gray-400">
                        <?= $item['label_header']; ?>
                    </div>
                <?php else: ?>
                    <?php 
                        $is_destructive = isset($item['variant']) && $item['variant'] === 'destructive';
                        $item_class = $is_destructive 
                            ? "flex w-full items-center gap-2 rounded-md px-2 py-1.5 text-sm text-red-600 hover:bg-red-50 transition select-none" 
                            : "flex w-full items-center gap-2 rounded-md px-2 py-1.5 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition select-none";
                    ?>
                    <a href="<?= $item['href'] ?? '#'; ?>" class="<?= $item_class; ?>">
                        <?php if (!empty($item['icon'])): ?>
                            <i class="<?= $item['icon']; ?> size-4 shrink-0"></i>
                        <?php endif; ?>
                        <span><?= $item['text']; ?></span>
                        <?php if (!empty($item['shortcut'])): ?>
                            <span class="ml-auto text-xs tracking-widest text-gray-400"><?= $item['shortcut']; ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>
    <?php
}
?>