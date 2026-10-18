<?php
include (__DIR__) . '\\components\\auth\\layouthead.php';
$error = $_SESSION['error'] ?? '';
$success = $_SESSION['success'] ?? '';
unset($_SESSION['error'], $_SESSION['success']);
?>

<div class="min-h-screen w-full relative overflow-hidden bg-gradient-to-br from-green-50 via-white to-green-50">
  <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-[#11773D]/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -top-24 -right-24 w-80 h-80 bg-[#11773D]/10 rounded-full blur-3xl pointer-events-none"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 py-8">
    <div class="flex items-center justify-between w-full">
      <div class="flex items-center gap-3">
        <img src="/assets/icon.png" alt="Eco Illustration" class="w-12 h-12 object-contain" />
        <div>
          <h1 class="text-[#11773D] text-2xl font-bold leading-none">HijauIn</h1>
          <p class="text-sm font-medium text-gray-500 mt-1">Satu Langkah Hijau Setiap Hari</p>
        </div>
      </div>
    </div>

    <div class="lg:flex-row flex flex-col items-center w-full gap-16 mt-8">

      <!-- Left Column -->
      <div class="lg:w-1/2 relative flex flex-col justify-between w-full">
        <div>
          <div class="bg-[#11773D]/10 text-[#11773D] inline-flex items-center gap-2 px-4 py-2 mb-6 text-sm font-bold rounded-full">
            <i class="fa-solid fa-leaf"></i> Aksi Kecil, Dampak Besar
          </div>

          <h2 class="mb-4 text-4xl lg:text-5xl font-bold leading-tight text-[#0B0F1F]">
            Mulai Perjalanan<br />
            <span class="text-[#11773D]">Hijau</span> mu Sekarang!
          </h2>

          <p class="text-base text-gray-600 font-medium leading-relaxed max-w-md">
            Buat akun untuk mulai mencatat aksi, mengikuti tantangan, dan memberi dampak positif bagi bumi.
          </p>
        </div>

        <div class="relative w-full h-[520px] lg:h-[680px]">
          <img src="/assets/register/main.jpeg" alt="Eco Illustration" class="w-full h-full object-contain mix-blend-multiply" />
        </div>
      </div>

      <!-- Right Column -->
      <div class="lg:w-1/2 relative flex flex-col items-center justify-center w-full">
        <div class="bg-white rounded-[40px] p-10 lg:p-12 shadow-2xl shadow-[#11773D]/10 border border-gray-100 w-full relative z-10 flex flex-col items-center">
          <div class="bg-[#11773D]/10 text-[#11773D] flex items-center justify-center w-20 h-20 mb-6 rounded-full">
            <i class="fa-solid fa-user-plus text-3xl"></i>
          </div>
          <h3 class="flex items-center gap-2 mb-2 text-3xl font-bold text-center text-[#0B0F1F]">
            Buat Akun Baru <i class="fa-solid fa-leaf text-[#11773D]"></i>
          </h3>
          <p class="mb-8 text-base font-medium text-center text-gray-500">
            Isi data diri kamu untuk mulai perjalanan hijau.
          </p>

          <?php if (!empty($error)): ?>
            <div class="w-full p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-2xl border border-red-200">
              <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($success)): ?>
            <div class="w-full p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-2xl border border-green-200">
              <?= htmlspecialchars($success) ?>
            </div>
          <?php endif; ?>

          <form action="register_process.php" method="POST" class="flex flex-col w-full gap-5">

            <div class="flex flex-col gap-2">
              <label for="name" class="text-base font-bold text-[#0B0F1F]">Nama Lengkap</label>
              <div class="relative">
                <i class="fa-solid fa-user left-4 top-1/2 absolute text-gray-400 -translate-y-1/2"></i>
                <input type="text" id="name" name="name" required placeholder="Masukkan nama lengkap kamu" class="rounded-2xl focus:border-[#11773D] w-full py-4 pl-12 pr-4 text-base font-semibold transition-colors bg-white border border-gray-200 outline-none" />
              </div>
            </div>

            <div class="flex flex-col gap-2">
              <label for="email" class="text-base font-bold text-[#0B0F1F]">Email</label>
              <div class="relative">
                <i class="fa-regular fa-envelope left-4 top-1/2 absolute text-gray-400 -translate-y-1/2"></i>
                <input type="email" id="email" name="email" required placeholder="Masukkan email aktif kamu" class="rounded-2xl focus:border-[#11773D] w-full py-4 pl-12 pr-4 text-base font-semibold transition-colors bg-white border border-gray-200 outline-none" />
              </div>
            </div>

            <div class="flex flex-col gap-2">
              <label for="password" class="text-base font-bold text-[#0B0F1F]">Kata Sandi</label>
              <div class="relative">
                <i class="fa-solid fa-lock left-4 top-1/2 absolute text-gray-400 -translate-y-1/2"></i>
                <input type="password" id="reg_password" name="password" required placeholder="Buat kata sandi (min. 8 karakter)" class="rounded-2xl focus:border-[#11773D] w-full py-4 pl-12 pr-12 text-base font-semibold transition-colors bg-white border border-gray-200 outline-none" />
                <button type="button" onclick="togglePasswordVisibility('reg_password', 'toggle_icon_pass')" class="right-4 top-1/2 hover:text-gray-600 absolute text-gray-400 transition-colors -translate-y-1/2">
                  <i id="toggle_icon_pass" class="fa-regular fa-eye-slash"></i>
                </button>
              </div>
            </div>

            <div class="flex flex-col gap-2">
              <label class="text-base font-bold text-[#0B0F1F]">Konfirmasi Kata Sandi</label>
              <div class="relative">
                <i class="fa-solid fa-lock left-4 top-1/2 absolute text-gray-400 -translate-y-1/2"></i>
                <input type="password" id="reg_confirm_password" name="confirm_password" required placeholder="Konfirmasi kata sandi kamu" class="rounded-2xl focus:border-[#11773D] w-full py-4 pl-12 pr-12 text-base font-semibold transition-colors bg-white border border-gray-200 outline-none" />
                <button type="button" onclick="togglePasswordVisibility('reg_confirm_password', 'toggle_icon_confirm')" class="right-4 top-1/2 hover:text-gray-600 absolute text-gray-400 transition-colors -translate-y-1/2">
                  <i id="toggle_icon_confirm" class="fa-regular fa-eye-slash"></i>
                </button>
              </div>
            </div>

            <div class="flex items-start gap-3 mt-2">
              <div class="flex items-center h-6">
                <input id="ToS" name="agree_tos" type="checkbox" required class="accent-[#11773D] focus:ring-[#11773D] w-5 h-5 border-gray-300 rounded cursor-pointer" />
              </div>
              <label for="ToS" class="text-base font-semibold text-gray-700">
                Saya setuju dengan <a href="#" class="text-[#11773D] hover:underline">Syarat & Ketentuan</a> dan <a href="#" class="text-[#11773D] hover:underline">Kebijakan Privasi</a> HijauIn
              </label>
            </div>

            <button type="submit" class="flex w-full items-center justify-center gap-3 rounded-2xl bg-[#11773D] py-4 mt-4 text-base font-bold text-white transition hover:bg-[#0b5f31]">
              Daftar Sekarang <i class="fa-solid fa-arrow-right"></i>
            </button>

            <div class="flex items-center gap-4 my-2">
              <div class="flex-1 h-px bg-gray-200"></div>
              <span class="text-base font-semibold text-gray-400">atau daftar dengan</span>
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
              Sudah punya akun? <a href="login.php" class="text-[#11773D] hover:underline font-bold">Masuk</a>
            </p>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include (__DIR__) . '/components/auth/layoutclose.php'; ?>