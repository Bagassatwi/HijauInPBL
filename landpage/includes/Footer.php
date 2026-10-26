<!-- Bagian Footer PHP -->
    <footer class="relative overflow-hidden bg-[#00462E] text-white mt-auto">
      <div class="px-16 pt-8 pb-6">
        <div class="flex items-start justify-between">
          
          <!-- Left -->
          <div class="w-[27%]">
            <div class="flex items-center gap-3">
              <img
                src="/assets/icon.png"
                alt="HijauIn"
                width="60"
                height="60"
              />

              <div>
                <h2 class="text-[30px] font-bold leading-none">
                  Hijau<span class="text-[#67A02E]">In</span>
                </h2>

                <p class="mt-1 text-[10px] text-[#CBE8D4]">
                  Satu Langkah Hijau Setiap Hari
                </p>
              </div>
            </div>

            <p class="mt-5 max-w-[260px] text-[13px] leading-7 text-[#D8EEE0]">
              Platform digital untuk membangun kebiasaan ramah lingkungan,
              memantau dampak, dan berkontribusi nyata untuk bumi.
            </p>

            <div class="mt-6 flex items-center gap-5 text-[15px] text-white/90">
              <i class="fa-brands fa-instagram cursor-pointer transition hover:text-white"></i>
              <i class="fa-brands fa-tiktok cursor-pointer transition hover:text-white"></i>
              <i class="fa-brands fa-youtube cursor-pointer transition hover:text-white"></i>
              <i class="fa-brands fa-facebook cursor-pointer transition hover:text-white"></i>
            </div>
          </div>

          <!-- Jelajahi -->
          <div>
            <h3 class="mb-4 text-[15px] font-semibold">Jelajahi</h3>

            <ul class="space-y-2 text-[13px] leading-6 text-[#D8EEE0]">
              <li><a href="/index.php" class="hover:underline">Beranda</a></li>
              <li><a href="#" class="hover:underline">Fitur</a></li>
              <li><a href="/landpage/cara-kerja/index.php" class="hover:underline">Cara Kerja</a></li>
              <li><a href="#" class="hover:underline">Edukasi</a></li>
              <li><a href="#" class="hover:underline">Komunitas</a></li>
              <li><a href="#" class="hover:underline">Tentang Kami</a></li>
            </ul>
          </div>

          <!-- Bantuan -->
          <div>
            <h3 class="mb-4 text-[15px] font-semibold">Bantuan</h3>

            <ul class="space-y-2 text-[13px] leading-6 text-[#D8EEE0]">
              <li><a href="#" class="hover:underline">FAQ</a></li>
              <li><a href="#" class="hover:underline">Pusat Bantuan</a></li>
              <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
              <li><a href="#" class="hover:underline">Syarat & Ketentuan</a></li>
              <li><a href="#" class="hover:underline">Hubungi Kami</a></li>
            </ul>
          </div>

          <!-- Komunitas -->
          <div>
            <h3 class="mb-4 text-[15px] font-semibold">Komunitas</h3>

            <ul class="space-y-2 text-[13px] leading-6 text-[#D8EEE0]">
              <li><a href="#" class="hover:underline">Event</a></li>
              <li><a href="#" class="hover:underline">Volunteer</a></li>
              <li><a href="#" class="hover:underline">Partner</a></li>
              <li><a href="#" class="hover:underline">Blog</a></li>
            </ul>
          </div>

          <!-- Kontak -->
          <div class="w-[210px]">
            <h3 class="mb-4 text-[15px] font-semibold">Kontak</h3>

            <div class="space-y-3 text-[13px] text-[#D8EEE0]">
              <div class="flex items-start gap-3">
                <i class="fa-solid fa-envelope mt-1 text-[11px]"></i>
                <span>hello@hijauin.com</span>
              </div>

              <div class="flex items-start gap-3">
                <i class="fa-solid fa-phone-alt mt-1 text-[11px]"></i>
                <span>0812-3456-7890</span>
              </div>

              <div class="flex items-start gap-3">
                <i class="fa-solid fa-map-marker-alt mt-1 text-[11px]"></i>
                <span>
                  Jl. Hijau No. 123,
                  <br />
                  Jakarta, Indonesia
                </span>
              </div>
            </div>
          </div>

        </div>

        <!-- Bottom -->
        <div class="mt-6 pt-4 border-t border-white/10">
          <p class="flex items-center justify-center gap-2 text-[12px] text-[#D8EEE0]">
            © <?= date('Y'); ?> HijauIn. All rights reserved.
            <span class="text-[#9BE36B]">🍃</span>
          </p>
        </div>
      </div>

      <!-- Ornament kanan -->
      <img
        src="/assets/beranda/d.png"
        alt=""
        width="350"
        height="350"
        class="pointer-events-none absolute -bottom-10 -right-15 select-none opacity-30"
      />
    </footer>

    <!-- JS Libraries: AOS Inisialisasi -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
        });
    </script>
</body>
</html>