<?php
// Contoh data sederhana untuk render kalender PHP Native
$bulan_ini = "Oktober 2026";
$hari_dalam_seminggu = ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"];

// Simulasi tanggal (bisa disesuaikan dengan logika tanggal PHP date('t'))
$total_hari = 31;
$mulai_hari_index = 3; // Contoh: Mulai hari Rabu
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender HijauIn</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <!-- Container Kalender -->
    <div class="group/calendar bg-white shadow-lg rounded-2xl p-4 w-fit border border-gray-100">
      
      <!-- Header Navigasi Bulan -->
      <div class="relative flex items-center justify-between px-2 mb-4">
        <button type="button" class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-gray-100 text-gray-700 transition">
          <!-- Chevron Left -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <h2 class="text-sm font-semibold text-gray-800 select-none">
          <?= $bulan_ini; ?>
        </h2>

        <button type="button" class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-gray-100 text-gray-700 transition">
          <!-- Chevron Right -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
      </div>

      <!-- Grid Hari dalam Seminggu -->
      <div class="grid grid-cols-7 gap-1 text-center mb-2">
        <?php foreach ($hari_dalam_seminggu as $hari): ?>
          <div class="text-[0.8rem] font-normal text-gray-400 select-none py-1">
            <?= $hari; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Grid Tanggal -->
      <div class="grid grid-cols-7 gap-1">
        <?php 
        // Padding untuk hari kosong di awal bulan
        for ($i = 0; $i < $mulai_hari_index; $i++): 
        ?>
          <div></div>
        <?php endfor; ?>

        <?php 
        // Loop tanggal 1 sampai 31
        for ($tanggal = 1; $tanggal <= $total_hari; $tanggal++): 
            // Contoh kondisi untuk tanggal hari ini (Today)
            $is_today = ($tanggal === 24); 
            // Contoh kondisi tanggal terpilih (Selected)
            $is_selected = ($tanggal === 15);
            
            $btn_classes = "relative flex aspect-square h-9 w-9 items-center justify-center rounded-lg text-sm font-normal transition select-none ";
            
            if ($is_selected) {
                $btn_classes .= "bg-[#076635] text-white font-semibold shadow-md";
            } elseif ($is_today) {
                $btn_classes .= "bg-gray-100 text-gray-900 border border-gray-300";
            } else {
                $btn_classes .= "hover:bg-gray-100 text-gray-700";
            }
        ?>
          <button type="button" class="<?= $btn_classes; ?>">
            <?= $tanggal; ?>
          </button>
        <?php endfor; ?>
      </div>

    </div>

</body>
</html>