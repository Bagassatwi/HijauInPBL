<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutopen.php';

if (!($_SESSION['user']['is_super_admin'] ?? false)) {
  header('Location: /dashboard');
  exit;
}

$formOptions = [
  'support_ticket' => 'Tiket bantuan',
  'partnership_request' => 'Permohonan kemitraan',
  'education_newsletter' => 'Newsletter edukasi',
  'community_newsletter' => 'Newsletter komunitas',
];
$selectedForm = (string) ($_GET['form'] ?? '');
$selectedStatus = (string) ($_GET['status'] ?? '');
$conditions = [];
$params = [];

if (isset($formOptions[$selectedForm])) {
  $conditions[] = 'form_key = :form_key';
  $params[':form_key'] = $selectedForm;
} else {
  $selectedForm = '';
}
if ($selectedStatus !== '' && preg_match('/^[a-z_]{1,30}$/', $selectedStatus)) {
  $conditions[] = 'status = :status';
  $params[':status'] = $selectedStatus;
} else {
  $selectedStatus = '';
}

$sql = 'SELECT id, form_key, data, attachment_path, attachment_name, status, created_at FROM public.landing_form_submissions';
if ($conditions !== []) {
  $sql .= ' WHERE ' . implode(' AND ', $conditions);
}
$sql .= ' ORDER BY created_at DESC LIMIT 100';
$submissions = [];
$loadError = false;

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute($params);
  $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $error) {
  $loadError = true;
}

$escape = static fn($value): string => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
$projectUrl = rtrim((string) getenv('PROJECT_URL'), '/');
$storagePrefix = $projectUrl . '/storage/v1/object/public/HijauInBucket/ticker/';
?>
<div class="mx-auto flex w-full max-w-6xl flex-col gap-6">
  <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#11773D]">Super Admin</p>
      <h1 class="text-3xl font-bold text-[#101828]">Form Submissions</h1>
      <p class="mt-1 text-sm text-[#667085]">Submission landing page terbaru, maksimal 100 data.</p>
    </div>
  </div>

  <form method="GET" class="flex flex-col gap-3 rounded-2xl bg-white p-4 shadow-sm ring-1 ring-gray-100 sm:flex-row">
    <label class="flex-1 text-sm font-medium text-[#344054]">
      Tipe form
      <select name="form" class="mt-1 block w-full rounded-xl border border-[#D0D5DD] bg-white px-3 py-2.5">
        <option value="">Semua tipe</option>
        <?php foreach ($formOptions as $key => $label): ?>
          <option value="<?= $escape($key) ?>" <?= $selectedForm === $key ? 'selected' : '' ?>><?= $escape($label) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <label class="flex-1 text-sm font-medium text-[#344054]">
      Status
      <select name="status" class="mt-1 block w-full rounded-xl border border-[#D0D5DD] bg-white px-3 py-2.5">
        <option value="">Semua status</option>
        <?php foreach (['new', 'reviewing', 'resolved', 'closed'] as $status): ?>
          <option value="<?= $escape($status) ?>" <?= $selectedStatus === $status ? 'selected' : '' ?>><?= $escape(ucfirst($status)) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <div class="flex items-end gap-2">
      <button type="submit" class="rounded-xl bg-[#11773D] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#0d632f]">Filter</button>
      <a href="/dashboard/submissions" class="rounded-xl border border-[#D0D5DD] px-5 py-2.5 text-sm font-semibold text-[#344054] hover:bg-gray-50">Reset</a>
    </div>
  </form>

  <?php if ($loadError): ?>
    <div role="alert" class="rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">Submission tidak dapat dimuat. Pastikan tabel landing_form_submissions tersedia.</div>
  <?php elseif ($submissions === []): ?>
    <div class="rounded-2xl border border-dashed border-[#D0D5DD] bg-white p-8 text-center text-sm text-[#667085]">Belum ada submission untuk filter ini.</div>
  <?php else: ?>
    <div class="flex flex-col gap-4">
      <?php foreach ($submissions as $submission): ?>
        <?php
        $data = json_decode((string) $submission['data'], true);
        $data = is_array($data) ? $data : [];
        $formLabel = $formOptions[$submission['form_key']] ?? $submission['form_key'];
        $status = (string) ($submission['status'] ?? 'new');
        $attachmentPath = (string) ($submission['attachment_path'] ?? '');
        $attachmentUrl = '';
        if ($attachmentPath !== '' && $projectUrl !== '') {
          if (str_starts_with($attachmentPath, $storagePrefix)) {
            $attachmentUrl = $attachmentPath;
          } elseif (str_starts_with($attachmentPath, 'ticker/')) {
            $attachmentUrl = $storagePrefix . implode('/', array_map('rawurlencode', explode('/', substr($attachmentPath, 7))));
          }
        }
        ?>
        <article class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-gray-100">
          <div class="flex flex-col gap-3 border-b border-gray-100 pb-4 sm:flex-row sm:items-start sm:justify-between">
            <div>
              <div class="flex flex-wrap items-center gap-2">
                <h2 class="text-lg font-bold text-[#101828]"><?= $escape($formLabel) ?></h2>
                <span class="rounded-full bg-[#F1F8F3] px-2.5 py-1 text-xs font-semibold text-[#11773D]">#<?= $escape(substr((string) $submission['id'], 0, 8)) ?></span>
              </div>
              <p class="mt-1 text-sm text-[#667085]"><?= $escape(date('d M Y, H:i', strtotime((string) $submission['created_at']))) ?></p>
            </div>
            <span class="w-fit rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700"><?= $escape(ucfirst($status)) ?></span>
          </div>

          <dl class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($data as $key => $value): ?>
              <?php
              $displayValue = is_scalar($value) || $value === null
                ? (string) ($value ?? '')
                : json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
              ?>
              <div class="min-w-0 rounded-xl bg-[#F9FAFB] p-3">
                <dt class="text-xs font-semibold uppercase text-[#667085]"><?= $escape(str_replace('_', ' ', (string) $key)) ?></dt>
                <dd class="mt-1 wrap-break-word whitespace-pre-wrap text-sm text-[#344054]"><?= $escape($displayValue) ?></dd>
              </div>
            <?php endforeach; ?>
          </dl>

          <?php if ($attachmentUrl !== ''): ?>
            <a href="<?= $escape($attachmentUrl) ?>" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#11773D] hover:underline">
              Lampiran: <?= $escape($submission['attachment_name'] ?: 'Buka file') ?>
            </a>
          <?php endif; ?>
        </article>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/layout/layoutclose.php'; ?>