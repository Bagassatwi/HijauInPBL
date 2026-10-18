<?php
include (__DIR__) . '/components/auth/layouthead.php';
session_start();
$error = $_SESSION['error'] ?? '';
$success = $_SESSION['success'] ?? '';
unset($_SESSION['error'], $_SESSION['success']);
?>

<div class="min-h-screen w-full relative overflow-hidden bg-gradient-to-br from-green-50 via-white to-green-50">
  <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-[#11773D]/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -top-24 -right-24 w-80 h-80 bg-[#11773D]/10 rounded-full blur-3xl pointer-events-none"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 py-12 lg:py-16">
    <div class="lg:flex-row flex flex-col items-center w-full gap-16">
      <!-- Left Column -->
      <div class="lg:w-1/2 flex flex-col justify-between w-full">
        <div>
          <a href="/" class="flex items-center gap-3 mb-10">
            <img src="/assets/icon.png" alt="Eco Illustration" class="w-12 h-12 object-contain" />
            <div>
              <h1 class="text-[#11773D] text-2xl font-bold leading-none">HijauIn</h1>
              <p class="text-sm font-medium text-gray-500 mt-1">Satu Langkah Hijau Setiap Hari</p>
            </div>
          </a>

          <div class="bg-[#11773D]/10 text-[#11773D] inline-flex items-center gap-2 px-4 py-2 mb-3 text-sm font-bold rounded-full">
            <i class="fa-solid fa-leaf w-4 h-4"></i> Aksi Kecil, Dampak Besar
          </div>

          <h2 class="mb-4 text-4xl lg:text-5xl font-bold leading-tight text-[#0B0F1F]">
            Yuk, lanjutkan<br />
            perjalanan <span class="text-[#11773D]">hijau</span> mu!
          </h2>
          <p class="text-base text-gray-600 font-medium leading-relaxed max-w-md">
            Masuk ke akunmu dan terus catat aksi, ikuti tantangan, dan lihat dampak positif yang telah kamu ciptakan.
          </p>
        </div>

        <div class="relative w-full h-[520px] lg:h-[680px]">
          <img src="/assets/login/main.jpeg" alt="Eco Illustration" class="w-full h-full object-contain mix-blend-multiply" />
        </div>
      </div>

      <!-- Right Column -->
      <div class="lg:w-1/2 relative flex flex-col items-center justify-center w-full">
        <div class="bg-white rounded-[40px] p-10 lg:p-14 shadow-2xl shadow-[#11773D]/10 border border-gray-100 w-full relative z-10">
          <h3 class="flex items-center gap-2 mb-2 text-3xl font-bold text-[#0B0F1F]">
            Selamat Datang Kembali! <i class="fa-solid fa-leaf text-[#11773D]"></i>
          </h3>
          <p class="mb-8 text-base font-medium text-gray-500">
            Masuk untuk melanjutkan perjalanan hijau mu.
          </p>

          <?php if (!empty($error)): ?>
            <div class="w-full p-4 mb-6 text-sm text-red-700 bg-red-100 rounded-2xl border border-red-200">
              <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($success)): ?>
            <div class="w-full p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-2xl border border-green-200">
              <?= htmlspecialchars($success) ?>
            </div>
          <?php endif; ?>

          <form action="login_process.php" method="POST" class="flex flex-col gap-6">
            <div class="flex flex-col gap-2">
              <label class="text-base font-bold text-[#0B0F1F]">Email</label>
              <div class="relative">
                <i class="fa-regular fa-envelope left-4 top-1/2 absolute text-gray-400 -translate-y-1/2"></i>
                <input type="email" name="email" required placeholder="Masukkan email terdaftar kamu" class="rounded-2xl focus:border-[#11773D] w-full py-4 pl-12 pr-4 text-base font-semibold transition-colors bg-white border border-gray-200 outline-none" />
              </div>
            </div>

            <div class="flex flex-col gap-2">
              <label class="text-base font-bold text-[#0B0F1F]">Kata Sandi</label>
              <div class="relative">
                <i class="fa-solid fa-lock left-4 top-1/2 absolute text-gray-400 -translate-y-1/2"></i>
                <input type="password" id="login_password" name="password" required placeholder="Masukkan kata sandi" class="rounded-2xl focus:border-[#11773D] w-full py-4 pl-12 pr-12 text-base font-semibold transition-colors bg-white border border-gray-200 outline-none" />
                <button type="button" onclick="togglePasswordVisibility('login_password', 'toggle_icon_login')" class="right-4 top-1/2 hover:text-gray-600 absolute text-gray-400 transition-colors -translate-y-1/2">
                  <i id="toggle_icon_login" class="fa-regular fa-eye-slash"></i>
                </button>
              </div>
            </div>

            <div class="flex justify-end">
              <a href="#" class="text-[#11773D] hover:underline text-base font-bold">Lupa kata sandi?</a>
            </div>

            <button type="submit" class="flex w-full items-center justify-center gap-3 rounded-2xl bg-[#11773D] py-4 text-base font-bold text-white transition hover:bg-[#0b5f31]">
              <i class="fa-regular fa-user"></i> Masuk
            </button>

            <div class="flex items-center gap-4 my-2">
              <div class="flex-1 h-px bg-gray-200"></div>
              <span class="text-base font-semibold text-gray-400">atau masuk dengan</span>
              <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <div class="flex gap-4">
              <button type="button" class="rounded-2xl hover:bg-gray-50 flex items-center justify-center flex-1 gap-3 py-4 text-base font-bold text-gray-700 transition-colors bg-white border border-gray-200">
                <i class="fa-brands fa-google text-red-500"></i> Google
              </button>
              <button type="button" class="rounded-2xl hover:bg-gray-50 flex items-center justify-center flex-1 gap-3 py-4 text-base font-bold text-gray-700 transition-colors bg-white border border-gray-200">
                <i class="fa-brands fa-apple"></i> Apple
              </button>
            </div>

            <p class="mt-4 text-base font-semibold text-center text-gray-600">
              Belum punya akun? <a href="register.php" class="text-[#11773D] hover:underline font-bold">Daftar sekarang</a>
            </p>
          </form>
        </div>

        <div class="flex items-start justify-between w-full px-2 mt-12">
          <div class="flex flex-col w-1/3 gap-2 pr-4">
            <div class="bg-[#11773D] rounded-xl flex items-center justify-center w-10 h-10 mb-1 text-white">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h4 class="text-base font-bold text-[#0B0F1F]">Aman & Terpercaya</h4>
            <p class="text-sm font-medium leading-tight text-gray-500">Data kamu aman bersama kami.</p>
          </div>
          <div class="flex flex-col w-1/3 gap-2 pr-4">
            <div class="bg-[#11773D]/10 rounded-xl text-[#11773D] flex items-center justify-center w-10 h-10 mb-1">
              <i class="fa-solid fa-leaf"></i>
            </div>
            <h4 class="text-base font-bold text-[#0B0F1F]">Aksi Nyata</h4>
            <p class="text-sm font-medium leading-tight text-gray-500">Setiap aksimu berdampak nyata.</p>
          </div>
          <div class="flex flex-col w-1/3 gap-2">
            <div class="rounded-xl flex items-center justify-center w-10 h-10 mb-1 text-gray-600 bg-gray-100">
              <i class="fa-solid fa-arrow-trend-up"></i>
            </div>
            <h4 class="text-base font-bold text-[#0B0F1F]">Pantau Perkembangan</h4>
            <p class="text-sm font-medium leading-tight text-gray-500">Lihat progres dan perkembanganmu.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include (__DIR__) . '/components/auth/layoutclose.php'; ?>