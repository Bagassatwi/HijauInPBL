<?php
// Mendapatkan path URL saat ini untuk mendeteksi menu aktif
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$active_path = ($current_path == "" || $current_path == "index.php") ? "" : explode('/', $current_path)[0];

$navItems = [
    ["href" => "", "name" => "Beranda"],
    ["href" => "fitur", "name" => "Fitur"],
    ["href" => "cara-kerja", "name" => "Cara Kerja"],
    ["href" => "edukasi", "name" => "Edukasi"],
    ["href" => "komunitas", "name" => "Komunitas"],
    ["href" => "tentang", "name" => "Tentang Kami"],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar HijauIn</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- Navbar PHP -->
    <nav class="sticky top-0 z-50 border-b border-gray-100 bg-white">
      <div class="mx-auto flex items-center justify-between px-16 py-6">
        
        <!-- Logo Desktop (Gunakan path absolut /assets/...) -->
        <a href="/index.php" class="hidden lg:flex items-center gap-2">
          <img
            src="/assets/icon.png"
            alt="HijauIn"
            width="60"
            height="60"
            class="priority"
          />
          <div class="leading-none">
            <h1 class="text-[36px] font-semibold">
              <span class="text-[#0B0F1F]">Hijau</span>
              <span class="text-[#1F8148]">In</span>
            </h1>
            <p class="mt-1 text-[14px] font-medium text-gray-500">
              Satu Langkah Hijau Setiap Hari
            </p>
          </div>
        </a>

        <!-- Logo Mobile -->
        <a href="/index.php" class="flex items-center gap-2 -ml-10 lg:hidden">
          <img
            src="/assets/icon.png"
            alt="HijauIn"
            width="42"
            height="42"
          />
          <h1 class="text-[28px] font-semibold leading-none">
            <span class="text-[#0B0F1F]">Hijau</span>
            <span class="text-[#1F8148]">In</span>
          </h1>
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex items-center gap-10">
          <?php foreach ($navItems as $item): ?>
            <?php 
              $isActive = ($active_path === $item['href']);
              $linkTarget = $item['href'] === "" ? "/index.php" : "/" . $item['href'] . ".php";
            ?>
            <a
              href="<?= $linkTarget; ?>"
              class="relative pb-2 text-[17px] font-semibold transition-colors <?= $isActive ? 'text-[#076635]' : 'text-[#0B0F1F] hover:text-[#076635]'; ?>"
            >
              <?= $item['name']; ?>

              <?php if ($isActive): ?>
                <span class="absolute bottom-0 left-0 h-[3px] w-full rounded-full bg-[#076635]"></span>
              <?php endif; ?>
            </a>
          <?php endforeach; ?>
        </div>

        <!-- Desktop Buttons -->
        <div class="hidden lg:flex items-center gap-4">
          <a
            href="/login.php"
            class="rounded-xl border border-green-600 bg-white px-7 py-3 font-semibold text-[#076635] transition hover:bg-green-50"
          >
            Masuk
          </a>

          <a
            href="/register.php"
            class="rounded-xl bg-[#076635] px-7 py-3 font-semibold text-white shadow-md transition hover:bg-green-700"
          >
            Daftar Gratis
          </a>
        </div>

        <!-- Mobile Hamburger Button -->
        <button
          id="menu-btn"
          onclick="toggleMenu()"
          class="flex h-11 w-11 items-center -mr-13 justify-center rounded-xl border border-gray-200 lg:hidden focus:outline-none"
        >
          <svg
            id="menu-icon"
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 text-[#076635]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="hidden border-t border-gray-100 bg-white shadow-lg lg:hidden">
        <div class="flex flex-col px-6 py-6">
          <?php foreach ($navItems as $item): ?>
            <?php 
              $isActive = ($active_path === $item['href']);
              $linkTarget = $item['href'] === "" ? "/index.php" : "/" . $item['href'] . ".php";
            ?>
            <a
              href="<?= $linkTarget; ?>"
              class="rounded-xl px-4 py-3 text-[16px] font-semibold transition <?= $isActive ? 'bg-green-50 text-[#076635]' : 'text-[#0B0F1F] hover:bg-gray-100'; ?>"
            >
              <?= $item['name']; ?>
            </a>
          <?php endforeach; ?>

          <div class="mt-6 flex flex-col gap-3">
            <a
              href="/login.php"
              class="rounded-xl border border-green-600 px-4 py-3 text-center font-semibold text-[#076635]"
            >
              Masuk
            </a>

            <a
              href="/register.php"
              class="rounded-xl bg-[#076635] px-4 py-3 text-center font-semibold text-white"
            >
              Daftar Gratis
            </a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Script untuk Toggle Menu Mobile -->
    <script>
      function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');
        
        menu.classList.toggle('hidden');
        
        if (menu.classList.contains('hidden')) {
          icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />';
        } else {
          icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />';
        }
      }
    </script>
</body>
</html>