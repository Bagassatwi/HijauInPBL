<?php
include $_SERVER["DOCUMENT_ROOT"] . '/utils/connection.php';
include_once '../layout/layoutopen.php';

$userId = $_SESSION['user']['id'] ?? '';

// Fetch chat history from database
$messages = [];
try {
  $stmt = $pdo->prepare("
        SELECT role, content 
        FROM public.messages 
        WHERE user_id = :user_id 
        ORDER BY created_at ASC
    ");
  $stmt->execute(['user_id' => $userId]);
  $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  error_log('Fetch messages error: ' . $e->getMessage());
}

if (empty($messages)) {
  $messages = [
    [
      'role'    => 'model',
      'content' => 'Apa yang ingin kamu ketahui hari ini tentang gaya hidup hijau?'
    ]
  ];
}

$firstName = explode(' ', trim($_SESSION['user']['full_name'] ?? 'Budi'))[0];
?>

<!-- Marked JS for markdown rendering -->
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

<div class="flex flex-col w-full gap-6">

  <!-- Hero Section -->
  <div class="relative overflow-hidden rounded-3xl border border-[#EAECF0] bg-gradient-to-r from-white via-[#FCFEFC] to-[#F2F9F3] px-8 py-7">
    <div class="absolute right-0 top-0 h-full w-[48%] hidden md:block">
      <img src="/assets/ai/main.png" alt="Eco AI" class="w-full h-full object-contain object-right" />
    </div>

    <div class="relative z-10 max-w-full md:max-w-[58%]">
      <h2 class="text-[28px] font-bold text-[#0B0F1F]">Hai <?= htmlspecialchars($firstName) ?>! 👋</h2>
      <p class="mt-3 max-w-105 text-[17px] leading-8 text-[#667085]">
        Aku Eco AI, siap membantumu<br />
        menjadi pribadi yang lebih peduli<br />
        pada bumi.
      </p>

      <!-- Input Bar -->
      <div class="relative mt-8">
        <input
          id="heroInput"
          type="text"
          placeholder="Tanyakan apa saja tentang gaya hidup hijau..."
          class="h-14 w-full rounded-2xl border border-[#EAECF0] bg-white pl-6 pr-16 text-[16px] text-[#344054] outline-none placeholder:text-[#98A2B3]" />
        <button
          id="heroSendBtn"
          type="button"
          class="absolute right-3 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-[#11773D] text-white hover:bg-[#0D6433]">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
          </svg>
        </button>
      </div>

      <!-- Suggestions -->
      <div class="mt-5 flex flex-wrap gap-3">
        <button type="button" class="suggestion-btn flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2 text-base font-semibold text-gray-700 hover:border-[#11773D] hover:bg-gray-50" data-text="Cara mengurangi sampah plastik">
          <img src="/assets/edukasi/daur.png" alt="" class="w-4 h-4" /> Cara mengurangi sampah plastik
        </button>
        <button type="button" class="suggestion-btn flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2 text-base font-semibold text-gray-700 hover:border-[#11773D] hover:bg-gray-50" data-text="Tips hemat energi di rumah">
          <img src="/assets/petir.png" alt="" class="w-4 h-4" /> Tips hemat energi di rumah
        </button>
        <button type="button" class="suggestion-btn flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2 text-base font-semibold text-gray-700 hover:border-[#11773D] hover:bg-gray-50" data-text="Manfaat naik sepeda">
          <img src="/assets/dashboard-komunitas/bike.png" alt="" class="w-4 h-4" /> Manfaat naik sepeda
        </button>
        <button type="button" class="suggestion-btn flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2 text-base font-semibold text-gray-700 hover:border-[#11773D] hover:bg-gray-50" data-text="Berikan rekomendasi gaya hidup hijau lainnya">
          <span class="text-xs text-[#11773D]">➔</span> Lainnya
        </button>
      </div>
    </div>
  </div>

  <!-- Feature Cards Grid -->
  <div>
    <div class="mb-8 flex items-center justify-between">
      <h3 class="text-[22px] font-semibold text-[#0B0F1F]">Fitur AI</h3>
      <button type="button" class="flex items-center gap-2 text-[17px] font-semibold text-[#11773D]">
        Lihat Semua ➔
      </button>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 xl:grid-cols-5">
      <div class="flex flex-col items-center rounded-[20px] border border-[#F2F4F7] bg-[#FCFCFC] px-6 py-8 text-center">
        <img src="/assets/ai/scan.png" alt="Scan" class="mb-6 h-[58px] w-[58px] object-contain" />
        <h4 class="text-[22px] font-semibold text-[#0B0F1F]">Scan Sampah</h4>
        <p class="mt-4 text-[16px] leading-8 text-[#667085]">Scan jenis sampah dan dapatkan cara pengelolaan yang tepat.</p>
      </div>

      <div class="flex flex-col items-center rounded-[20px] border border-[#F2F4F7] bg-[#FCFCFC] px-6 py-8 text-center">
        <img src="/assets/ai/analisis.png" alt="Analisis" class="mb-6 h-[58px] w-[58px] object-contain" />
        <h4 class="text-[22px] font-semibold text-[#0B0F1F]">Analisis Aktivitas</h4>
        <p class="mt-4 text-[16px] leading-8 text-[#667085]">Upload foto aktivitas hijau dan AI akan menganalisisnya.</p>
      </div>

      <div class="flex flex-col items-center rounded-[20px] border border-[#F2F4F7] bg-[#FCFCFC] px-6 py-8 text-center">
        <img src="/assets/ai/tanya.png" alt="Tanya" class="mb-6 h-[58px] w-[58px] object-contain" />
        <h4 class="text-[22px] font-semibold text-[#0B0F1F]">Tanya Green Coach</h4>
        <p class="mt-4 text-[16px] leading-8 text-[#667085]">Tanyakan seputar gaya hidup hijau dan dapatkan jawabannya.</p>
      </div>

      <div class="flex flex-col items-center rounded-[20px] border border-[#F2F4F7] bg-[#FCFCFC] px-6 py-8 text-center">
        <img src="/assets/ai/insight.png" alt="Insight" class="mb-6 h-[58px] w-[58px] object-contain" />
        <h4 class="text-[22px] font-semibold text-[#0B0F1F]">Insight Mingguan</h4>
        <p class="mt-4 text-[16px] leading-8 text-[#667085]">AI akan merangkum kebiasaanmu dan memberi insight bermanfaat.</p>
      </div>

      <div class="flex flex-col items-center rounded-[20px] border border-[#F2F4F7] bg-[#FCFCFC] px-6 py-8 text-center">
        <img src="/assets/ai/rekomendasi.png" alt="Rekomendasi" class="mb-6 h-[58px] w-[58px] object-contain" />
        <h4 class="text-[22px] font-semibold text-[#0B0F1F]">Rekomendasi</h4>
        <p class="mt-4 text-[16px] leading-8 text-[#667085]">Dapatkan rekomendasi aksi dan challenge yang cocok untukmu.</p>
      </div>
    </div>
  </div>

  <!-- Main Section (Chat & Sidebar) -->
  <div id="chatSection" class="mt-10 grid grid-cols-1 gap-6 lg:grid-cols-3">
    <!-- Chat Interface -->
    <div class="flex h-200 flex-col rounded-3xl border-2 border-gray-100 bg-white lg:col-span-2">
      <div class="flex items-center justify-between rounded-t-3xl border-b border-gray-100 bg-white px-6 py-4">
        <h3 class="text-lg font-bold text-gray-700">Chat dengan Eco AI</h3>
        <button type="button" class="flex items-center gap-2 text-base font-semibold text-gray-600 hover:text-[#11773D]">
          Riwayat Chat 🕒
        </button>
      </div>

      <!-- Messages Box -->
      <div id="messageContainer" class="flex-1 overflow-y-auto bg-[#FAFAFA] p-6 flex flex-col gap-6">
        <?php foreach ($messages as $msg): ?>
          <?php if ($msg['role'] === 'user'): ?>
            <div class="flex justify-end">
              <div class="max-w-[63%] rounded-[18px] bg-[#11773D] px-5 py-4 text-white">
                <p class="text-[17px] leading-8"><?= htmlspecialchars($msg['content']) ?></p>
              </div>
            </div>
          <?php else: ?>
            <div class="flex items-start gap-3">
              <img src="/assets/ai/robot.png" alt="Eco AI" class="mt-1 h-[38px] w-[38px] shrink-0 object-contain" />
              <div class="max-w-[72%] rounded-[20px] bg-gray-200 px-5 py-4 markdown-body text-[16px] leading-relaxed text-gray-800">
                <?= htmlspecialchars($msg['content']) ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <!-- Spinner -->
      <div id="typingIndicator" class="hidden px-6 py-2 flex items-center gap-3 text-gray-500 italic">
        <span class="animate-spin text-[#11773D]">⏳</span>
        <span>Eco AI sedang mengetik...</span>
      </div>

      <!-- Input Bar -->
      <div class="border-t border-[#EAECF0] p-5">
        <div class="flex h-14 overflow-hidden rounded-2xl border border-[#EAECF0] focus-within:border-[#11773D]">
          <input
            id="chatInput"
            type="text"
            placeholder="Ketik pesan kamu..."
            class="flex-1 px-5 text-[16px] outline-none placeholder:text-[#98A2B3]" />
          <button id="sendChatBtn" type="button" class="flex w-15 items-center justify-center bg-[#11773D] text-white hover:bg-[#0e6232]">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Widgets -->
    <div class="flex flex-col gap-6 lg:col-span-1">
      <!-- Scan Sampah Widget with Red Warning Above -->
      <div class="rounded-3xl border border-gray-100 bg-white p-6">
        <h3 class="mb-4 text-lg font-bold text-gray-800">Scan Sampah dengan AI</h3>
        <div class="group flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-gray-200 bg-[#F8F9F5] p-6 text-center">
          <div class="mb-6 flex h-24 w-24 items-center justify-center rounded-full bg-[#EEF8F0]">
            <img src="/assets/ai/scansampah.png" alt="Scan Camera" class="h-[62px] w-[62px] object-contain" />
          </div>
          <p class="mb-6 text-base font-medium leading-relaxed text-gray-600">
            Upload foto sampah untuk mengetahui jenisnya dan cara pengelolaan yang tepat.
          </p>
          <button id="openScanModalBtn" type="button" class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#11773D] py-3 text-base font-bold text-white hover:bg-[#0D6433]">
            📷 Mulai Scan
          </button>
        </div>
      </div>

      <!-- Recommendations List -->
      <div class="flex flex-1 flex-col rounded-3xl border border-gray-100 bg-white p-6">
        <div class="mb-6 flex items-center justify-between gap-3">
          <h3 class="text-[22px] font-semibold text-[#0B0F1F]">Rekomendasi Untukmu</h3>
          <button id="generateRecommendationBtn" type="button" class="rounded-xl border border-[#11773D] bg-[#11773D] px-3 py-2 text-[12px] font-semibold text-white hover:bg-[#0D6433]">
            Get a recommendation
          </button>
        </div>

        <div id="recommendationList" class="flex flex-col divide-y divide-[#F2F4F7]">
          <div id="recommendationEmptyState" class="py-6 text-sm text-[#667085]">
            Belum ada rekomendasi. Klik tombol untuk mendapatkan saran yang sesuai dengan aktivitasmu.
          </div>
        </div>

        <button id="refreshRecommendationBtn" type="button" class="mt-4 w-full rounded-xl border border-[#D0D5DD] bg-white px-3 py-2 text-sm font-semibold text-[#11773D] hover:bg-[#F7FAF7]">
          Get another one
        </button>
      </div>
    </div>
  </div>

  <!-- Footer Banner -->
  <div class="flex items-center justify-between rounded-3xl border border-[#EAECF0] bg-white px-8 py-7">
    <div class="flex w-[60%] items-center gap-6">
      <img src="/assets/ai/tahukahkamu.png" alt="Earth" class="h-[120px] w-[120px] object-contain shrink-0" />
      <div>
        <h3 class="mb-2 text-[22px] font-semibold text-[#0B0F1F]">Tahukah kamu?</h3>
        <p class="text-[16px] leading-7 text-[#475467]">
          Jika semua pengguna HijauIn melakukan 1 aksi kecil setiap hari, kita bisa mengurangi ribuan ton CO₂ setiap tahunnya! 💚
        </p>
      </div>
    </div>
    <div class="h-20 w-px bg-[#EAECF0]"></div>
    <div class="flex items-center gap-4">
      <img src="/assets/ai/da.png" alt="Leaf" class="h-10 w-10 object-contain" />
      <div>
        <h4 class="text-[18px] font-semibold text-[#11773D]">Bersama HijauIn,</h4>
        <p class="text-[15px] text-[#475467]">kita ciptakan bumi yang lebih baik.</p>
      </div>
    </div>
  </div>
</div>

<div id="scanModal" class="fixed inset-0 z-999 hidden items-center justify-center bg-black/40 p-4 ">
  <div class="w-full max-w-3xl rounded-3xl bg-white p-6 shadow-2xl max-h-[75dvh]">
    <div class="mb-5 flex items-center justify-between ">
      <h3 class="text-2xl font-bold text-[#0B0F1F]">Scan Sampah dengan AI</h3>
      <button id="closeScanModalBtn" type="button" class="rounded-full border border-gray-200 px-3 py-1 text-lg text-gray-500 hover:text-[#11773D]">
        ✕
      </button>
    </div>

    <div class="grid gap-5 md:grid-cols-2 h-auto">
      <div class="rounded-2xl border border-[#EAECF0] bg-[#F8F9F5] p-4">
        <div id="scanPreviewWrap" class="hidden overflow-hidden rounded-2xl border border-[#E6F4EB] bg-white">
          <img id="scanPreview" src="" alt="Preview sampah" class="h-80 w-full object-cover" />
        </div>
        <div id="scanEmptyState" class="flex h-80 items-center justify-center rounded-2xl border-2 border-dashed border-[#D0D5DD] text-center text-sm text-[#667085]">
          Belum ada foto. Pilih gambar sampah untuk mulai analisis.
        </div>
      </div>

      <div class="space-y-4 rounded-2xl border border-[#EAECF0] bg-white p-4">
        <div>
          <label for="scanImageInput" class="mb-2 block text-sm font-semibold text-[#344054]">Pilih foto sampah</label>
          <input id="scanImageInput" type="file" accept="image/*" class="block w-full rounded-xl border border-[#D0D5DD] bg-white px-3 py-2 text-sm text-[#344054] file:mr-3 file:rounded-md file:border-0 file:bg-[#11773D] file:px-3 file:py-2 file:text-white" />
        </div>

        <button id="scanAnalyzeBtn" type="button" class="w-full rounded-xl bg-[#11773D] px-4 py-3 text-base font-semibold text-white hover:bg-[#0D6433] disabled:cursor-not-allowed disabled:bg-gray-400">
          Analisis Sampah
        </button>

        <div id="scanResultBox" class="hidden rounded-2xl border border-[#E6F4EB] bg-[#F5FBF7] p-4 overflow-y-scroll max-h-[25dvh]">
          <h4 class="mb-2 text-base font-bold text-[#0B0F1F]">Hasil analisis AI</h4>
          <p id="scanResultText" class="text-sm leading-7 text-[#344054]">
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const chatInput = document.getElementById("chatInput");
    const sendChatBtn = document.getElementById("sendChatBtn");
    const heroInput = document.getElementById("heroInput");
    const heroSendBtn = document.getElementById("heroSendBtn");
    const messageContainer = document.getElementById("messageContainer");
    const typingIndicator = document.getElementById("typingIndicator");

    const recommendationList = document.getElementById("recommendationList");
    const recommendationEmptyState = document.getElementById("recommendationEmptyState");
    const generateRecommendationBtn = document.getElementById("generateRecommendationBtn");
    const refreshRecommendationBtn = document.getElementById("refreshRecommendationBtn");
    const STORAGE_KEY = "hijauin_recommendations";

    function renderRecommendations(items) {
      recommendationList.innerHTML = "";

      if (!items || items.length === 0) {
        recommendationList.innerHTML = `
          <div id="recommendationEmptyState" class="py-6 text-sm text-[#667085]">
            Belum ada rekomendasi. Klik tombol untuk mendapatkan saran yang sesuai dengan aktivitasmu.
          </div>
        `;
        return;
      }

      items.forEach(item => {
        const row = document.createElement("div");
        row.className = "flex items-center justify-between py-4";
        row.innerHTML = `
          <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#F8FAF8]">
              <img src="/assets/ai/rekomendasi.png" class="h-6 w-6 object-contain" alt="" />
            </div>
            <div>
              <h4 class="text-[16px] font-semibold text-[#0B0F1F]">${escapeHtml(item.title || "Rekomendasi")}</h4>
              <p class="text-[13px] text-[#667085]">${escapeHtml(item.description || "")}</p>
            </div>
          </div>
          <span class="text-[16px] font-bold text-[#11773D]">+${Number(item.points || 20)}</span>
        `;
        recommendationList.appendChild(row);
      });
    }

    function loadRecommendationsFromStorage() {
      try {
        const raw = localStorage.getItem(STORAGE_KEY);
        if (!raw) {
          renderRecommendations([]);
          return;
        }

        const parsed = JSON.parse(raw);
        renderRecommendations(Array.isArray(parsed) ? parsed : []);
      } catch (error) {
        console.error("Failed to parse recommendations from localStorage", error);
        renderRecommendations([]);
      }
    }

    async function fetchRecommendations() {
      try {
        generateRecommendationBtn.disabled = true;
        refreshRecommendationBtn.disabled = true;
        generateRecommendationBtn.textContent = "Mendapatkan...";
        refreshRecommendationBtn.textContent = "Mendapatkan...";

        const res = await fetch("/dashboard/actions/recommendations.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({})
        });

        const data = await res.json();
        const recommendations = data.recommendations || [];

        localStorage.setItem(STORAGE_KEY, JSON.stringify(recommendations));
        renderRecommendations(recommendations);
      } catch (error) {
        console.error(error);
        renderRecommendations([]);
      } finally {
        generateRecommendationBtn.disabled = false;
        refreshRecommendationBtn.disabled = false;
        generateRecommendationBtn.textContent = "Get a recommendation";
        refreshRecommendationBtn.textContent = "Get another one";
      }
    }

    generateRecommendationBtn.addEventListener("click", fetchRecommendations);
    refreshRecommendationBtn.addEventListener("click", fetchRecommendations);

    loadRecommendationsFromStorage();

    const scanModal = document.getElementById("scanModal");
    const openScanModalBtn = document.getElementById("openScanModalBtn");
    const closeScanModalBtn = document.getElementById("closeScanModalBtn");
    const scanImageInput = document.getElementById("scanImageInput");
    const scanAnalyzeBtn = document.getElementById("scanAnalyzeBtn");
    const scanPreview = document.getElementById("scanPreview");
    const scanPreviewWrap = document.getElementById("scanPreviewWrap");
    const scanEmptyState = document.getElementById("scanEmptyState");
    const scanResultBox = document.getElementById("scanResultBox");
    const scanResultText = document.getElementById("scanResultText");

    function openScanModal() {
      scanModal.classList.remove("hidden");
      scanModal.classList.add("flex");
    }

    function closeScanModal() {
      scanModal.classList.add("hidden");
      scanModal.classList.remove("flex");
    }

    openScanModalBtn.addEventListener("click", openScanModal);
    closeScanModalBtn.addEventListener("click", closeScanModal);
    scanModal.addEventListener("click", function(event) {
      if (event.target === scanModal) {
        closeScanModal();
      }
    });

    scanImageInput.addEventListener("change", function(event) {
      const file = event.target.files[0];
      scanResultBox.classList.add("hidden");

      if (!file) {
        scanPreviewWrap.classList.add("hidden");
        scanEmptyState.classList.remove("hidden");
        return;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
        scanPreview.src = e.target.result;
        scanPreviewWrap.classList.remove("hidden");
        scanEmptyState.classList.add("hidden");
      };
      reader.readAsDataURL(file);
    });

    scanAnalyzeBtn.addEventListener("click", async function() {
      const file = scanImageInput.files[0];
      if (!file) {
        alert("Pilih foto sampah terlebih dahulu");
        return;
      }

      scanAnalyzeBtn.disabled = true;
      scanAnalyzeBtn.textContent = "Menganalisis...";
      scanResultBox.classList.add("hidden");

      const formData = new FormData();
      formData.append("image", file);

      try {
        const response = await fetch("/dashboard/actions/scan-sampah.php", {
          method: "POST",
          body: formData
        });

        const data = await response.json();

        if (data.status !== "success") {
          throw new Error(data.message || "Gagal menganalisis foto");
        }

        scanResultText.textContent = data.response;
        scanResultBox.classList.remove("hidden");
      } catch (error) {
        scanResultText.textContent = error.message || "Terjadi kesalahan saat menganalisis foto.";
        scanResultBox.classList.remove("hidden");
      } finally {
        scanAnalyzeBtn.disabled = false;
        scanAnalyzeBtn.textContent = "Analisis Sampah";
      }
    });

    // Render initial markdown responses
    document.querySelectorAll('.markdown-body').forEach(el => {
      el.innerHTML = marked.parse(el.textContent.trim());
    });

    function scrollToBottom() {
      messageContainer.scrollTop = messageContainer.scrollHeight;
    }
    scrollToBottom();

    async function sendPrompt(promptText) {
      if (!promptText.trim()) return;

      // Append User Message UI
      const userDiv = document.createElement("div");
      userDiv.className = "flex justify-end";
      userDiv.innerHTML = `
            <div class="max-w-[63%] rounded-[18px] bg-[#11773D] px-5 py-4 text-white">
                <p class="text-[17px] leading-8">${escapeHtml(promptText)}</p>
            </div>
        `;
      messageContainer.appendChild(userDiv);
      scrollToBottom();

      // Show Spinner
      typingIndicator.classList.remove("hidden");

      try {
        const res = await fetch("/dashboard/actions/ai-action.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            prompt: promptText
          })
        });
        const data = await res.json();


        typingIndicator.classList.add("hidden");

        const aiText = data.status === "success" ? data.response : "Maaf, terjadi kesalahan saat menghubungi AI.";

        // Append AI Response UI
        const aiDiv = document.createElement("div");
        aiDiv.className = "flex items-start gap-3";
        aiDiv.innerHTML = `
                <img src="/assets/ai/robot.png" alt="Eco AI" class="mt-1 h-[38px] w-[38px] shrink-0 object-contain" />
                <div class="max-w-[72%] rounded-[20px] bg-gray-200 px-5 py-4 markdown-body text-[16px] leading-relaxed text-gray-800">
                    ${marked.parse(aiText)}
                </div>
            `;
        messageContainer.appendChild(aiDiv);
        scrollToBottom();

      } catch (err) {
        typingIndicator.classList.add("hidden");
        console.error(err);
      }
    }

    function escapeHtml(str) {
      return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    }

    sendChatBtn.addEventListener("click", () => {
      const txt = chatInput.value;
      chatInput.value = "";
      sendPrompt(txt);
    });

    chatInput.addEventListener("keydown", (e) => {
      if (e.key === "Enter") {
        const txt = chatInput.value;
        chatInput.value = "";
        sendPrompt(txt);
      }
    });

    heroSendBtn.addEventListener("click", () => {
      const txt = heroInput.value;
      heroInput.value = "";
      document.getElementById("chatSection").scrollIntoView({
        behavior: "smooth"
      });
      sendPrompt(txt);
    });

    document.querySelectorAll(".suggestion-btn").forEach(btn => {
      btn.addEventListener("click", function() {
        const txt = this.getAttribute("data-text");
        document.getElementById("chatSection").scrollIntoView({
          behavior: "smooth"
        });
        sendPrompt(txt);
      });
    });
  });
</script>

<?php include_once '../layout/layoutclose.php'; ?>