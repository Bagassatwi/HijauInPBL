<div id="createModal" class="hidden fixed inset-0 z-[999] flex items-center justify-center bg-black/40 backdrop-blur-sm p-6">
  <div class="w-full max-w-6xl h-[90vh] overflow-hidden rounded-[32px] bg-white shadow-2xl flex flex-col">
    <div class="flex items-center justify-between border-b border-gray-100 px-8 py-6">
      <div>
        <h2 class="text-2xl font-bold text-gray-900">Catat Aktivitas Baru</h2>
        <p class="mt-1 text-gray-500">Tambahkan aktivitas ramah lingkungan yang telah kamu lakukan.</p>
      </div>
      <button id="closeModalBtn" type="button" class="flex h-11 w-11 items-center justify-center rounded-xl border border-gray-200 hover:bg-gray-100">✕</button>
    </div>

    <div class="grid flex-1 grid-cols-12 overflow-hidden">
      <!-- Left Category Selector -->
      <div class="col-span-4 overflow-y-auto bg-[#F8FBF8] p-6 space-y-3">
        <h3 class="mb-5 text-lg font-bold">Pilih Kategori Aktivitas</h3>
        <?php foreach ($categories as $index => $cat): ?>
          <button type="button"
            class="category-option flex w-full items-center gap-4 rounded-2xl p-4 border border-gray-200 transition text-left <?= $index === 0 ? 'border-green-500 bg-green-50 border-2' : '' ?>"
            data-id="<?= htmlspecialchars($cat['id']) ?>"
            data-name="<?= htmlspecialchars($cat['name']) ?>"
            data-point="<?= (int)($cat['point'] ?? 20) ?>"
            data-desc="<?= htmlspecialchars($cat['description'] ?? '') ?>">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-600 text-white font-bold">
              🍃
            </div>
            <div>
              <h4 class="font-semibold text-gray-900"><?= htmlspecialchars($cat['name']) ?></h4>
              <p class="text-sm text-gray-500">+<?= (int)($cat['point'] ?? 20) ?> Eco Point</p>
            </div>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Right Form -->
      <form id="activityForm"
        class="col-span-8 overflow-y-auto p-8 space-y-6">
        <input class="hidden" type="text" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>" id="">
        <div>
          <h3 id="selectedCategoryTitle" class="text-2xl font-bold"><?= htmlspecialchars($categories[0]['name'] ?? 'Kategori') ?></h3>
          <p id="selectedCategoryDesc" class="mt-2 leading-7 text-gray-500"><?= htmlspecialchars($categories[0]['description'] ?? '') ?></p>
        </div>

        <input type="hidden" name="category_id" id="categoryIdInput" value="<?= htmlspecialchars($categories[0]['id'] ?? '') ?>" />
        <input type="hidden" name="point" id="pointInput" value="<?= (int)($categories[0]['point'] ?? 20) ?>" />

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Judul Aktivitas</label>
          <input type="text" name="title" id="titleInput" value="Membawa Tumbler" placeholder="Contoh: Membawa Tumbler" class="h-[56px] w-full rounded-2xl border border-gray-200 px-5 outline-none focus:border-[#11773D]" required />
        </div>

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Ceritakan Aktivitasmu</label>
          <textarea name="description" rows="4" placeholder="Contoh: Hari ini saya menanam 3 bibit mangga..." class="w-full rounded-2xl border border-gray-200 p-5 outline-none focus:border-[#11773D]" required></textarea>
        </div>

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">
            Upload Bukti Aktivitas (Opsional)
          </label>

          <label id="proofUploadLabel" class="flex h-[180px] cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-[#D7E8DC] bg-[#F8FBF8] transition hover:border-[#11773D] hover:bg-[#F2FAF4]">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-4 h-12 w-12 text-[#11773D]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5V18a2 2 0 002 2h14a2 2 0 002-2v-1.5M16 8l-4-4m0 0L8 8m4-4v12" />
            </svg>

            <h4 class="font-semibold text-gray-800">Upload Foto</h4>

            <p class="mt-1 text-sm text-gray-500">
              Drag & Drop atau klik untuk memilih gambar
            </p>

            <span class="mt-3 rounded-full bg-green-100 px-4 py-2 text-sm font-medium text-[#11773D]">
              JPG, PNG • Maks 5MB
            </span>

            <input id="proofPhotoInput" name="proof_photo" type="file" accept="image/*" class="hidden" />
          </label>
          <p id="proofFileName" class="mt-2 hidden text-sm font-medium text-[#11773D]"></p>

          <div id="proofPreviewWrapper" class="mt-4 hidden">
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white p-3 shadow-sm">
              <img id="proofPreview" alt="Preview bukti aktivitas" class="h-48 w-full rounded-xl object-cover" />
            </div>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-5">
          <div>
            <label class="mb-2 block text-sm font-semibold text-gray-700">Tanggal Aktivitas</label>
            <input type="date" name="activity_date" value="<?= date('Y-m-d') ?>" class="h-[56px] w-full rounded-2xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" required />
          </div>
          <div>
            <label class="mb-2 block text-sm font-semibold text-gray-700">Waktu Aktivitas</label>
            <input type="time" name="activity_time" value="<?= date('H:i') ?>" class="h-[56px] w-full rounded-2xl border border-gray-200 px-4 outline-none focus:border-[#11773D]" required />
          </div>
        </div>

        <div>
          <label class="mb-2 block text-sm font-semibold text-gray-700">Lokasi (Opsional)</label>
          <input type="text" name="location" placeholder="Contoh: Kota Malang" class="h-[56px] w-full rounded-2xl border border-gray-200 px-5 outline-none focus:border-[#11773D]" />
        </div>

        <div class="rounded-3xl bg-[#F3FAF5] p-6">
          <div class="flex items-center justify-between">
            <div>
              <h4 class="text-lg font-bold text-[#11773D]">Estimasi Eco Point</h4>
              <p class="mt-1 text-sm text-gray-500">Poin akan diverifikasi berdasarkan aktivitas yang dipilih.</p>
            </div>
            <div class="text-right">
              <h2 id="pointDisplay" class="text-4xl font-extrabold text-[#11773D]">+<?= (int)($categories[0]['point'] ?? 20) ?></h2>
              <p class="font-medium text-gray-500">Eco Point</p>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-2">
          <button id="cancelModalBtn" type="button" class="h-[56px] rounded-2xl border border-gray-200 px-8 font-semibold text-gray-600 hover:bg-gray-100">Batal</button>
          <button type="submit" id="submitBtn" class="flex h-[56px] min-w-[210px] items-center justify-center rounded-2xl bg-[#11773D] px-8 font-semibold text-white hover:bg-[#0E6634]">
            Simpan Aktivitas
          </button>
        </div>
      </form>
    </div>
  </div>
</div>