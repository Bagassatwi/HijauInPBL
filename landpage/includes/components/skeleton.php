<?php
/**
 * Fungsi helper untuk merender elemen Skeleton PHP Native
 * 
 * @param string $extra_class Kelas tambahan untuk mengatur ukuran (misal: w-full, h-10, rounded-full, dll)
 * @param array $attributes Atribut HTML tambahan (id, style, dll)
 */
function render_skeleton($extra_class = '', $attributes = []) {
    // Base classes dari komponen skeleton React
    $base_classes = "animate-pulse rounded-md bg-gray-200 dark:bg-gray-700";
    $combined_classes = trim("{$base_classes} {$extra_class}");

    // Menyusun atribut tambahan
    $attr_str = "";
    foreach ($attributes as $key => $value) {
        $attr_str .= " {$key}=\"{$value}\"";
    }

    echo "<div data-slot=\"skeleton\" class=\"{$combined_classes}\"{$attr_str}></div>";
}
?>