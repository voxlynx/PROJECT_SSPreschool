<?php
/**
 * LOKER_EDIT.PHP
 * PHP: Halaman edit lowongan yang sudah ada.
 * Mengambil data dari DB berdasarkan ID, lalu memproses perubahan.
 */

require_once 'config.php';
requireLogin();

$admin_page = 'loker';
$page_title = 'Edit Lowongan';

$db = getDB();
$id = (int)($_GET['id'] ?? 0);

// ── Ambil Data Existing ──────────────────────────────────────────────────────
$stmt = $db->prepare('SELECT * FROM loker WHERE id = ?');
$stmt->execute([$id]);
$loker = $stmt->fetch();

if (!$loker) {
    redirect('loker.php', 'danger', 'Data lowongan tidak ditemukan.');
}

// Decode kualifikasi JSON → teks per baris untuk textarea
$kual_array = json_decode($loker['kualifikasi'], true) ?? [];
$kual_text  = implode("\n", $kual_array);

$errors = [];
$old    = $loker; // Nilai default dari DB

// ── Proses Form Update ───────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old = $_POST;

    $posisi    = trim($_POST['posisi']    ?? '');
    $icon      = trim($_POST['icon']      ?? '💼');
    $tipe      = trim($_POST['tipe']      ?? '');
    $lokasi    = trim($_POST['lokasi']    ?? '');
    $gaji      = trim($_POST['gaji']      ?? 'Nego');
    $status    = $_POST['status']         ?? 'open';
    $deadline  = $_POST['deadline']       ?? '';
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $kualifikasi_raw = array_filter(array_map('trim', explode("\n", $_POST['kualifikasi'] ?? '')));

    if (empty($posisi))    $errors[] = 'Nama posisi wajib diisi.';
    if (empty($tipe))      $errors[] = 'Tipe pekerjaan wajib dipilih.';
    if (empty($lokasi))    $errors[] = 'Lokasi wajib dipilih.';
    if (empty($deadline))  $errors[] = 'Deadline wajib diisi.';
    if (empty($deskripsi)) $errors[] = 'Deskripsi wajib diisi.';
    if (empty($kualifikasi_raw)) $errors[] = 'Minimal satu kualifikasi wajib diisi.';

    if (empty($errors)) {
        try {
            $stmt = $db->prepare('
                UPDATE loker SET
                  icon=?, posisi=?, tipe=?, lokasi=?, gaji=?,
                  status=?, deadline=?, deskripsi=?, kualifikasi=?
                WHERE id=?
            ');
            $stmt->execute([
                $icon, $posisi, $tipe, $lokasi, $gaji, $status,
                $deadline, $deskripsi,
                json_encode(array_values($kualifikasi_raw), JSON_UNESCAPED_UNICODE),
                $id,
            ]);

            redirect('loker.php', 'success', "Lowongan \"$posisi\" berhasil diperbarui!");
        } catch (PDOException $e) {
            $errors[] = 'Gagal menyimpan perubahan. Silakan coba lagi.';
        }
    }

    // Jika ada error, tampilkan kualifikasi dari POST kembali
    $kual_text = $_POST['kualifikasi'] ?? $kual_text;
}

include 'includes/admin_header.php';
?>

<div class="admin-card" style="max-width:780px;">
  <div class="card-header">
    <h3>✏️ Edit Lowongan</h3>
    <a href="loker.php" class="btn-sm btn-ghost-sm">← Kembali</a>
  </div>

  <?php if ($errors): ?>
  <div class="alert alert-danger" style="margin-bottom:20px;">
    <strong>⚠️ Mohon perbaiki kesalahan berikut:</strong>
    <ul style="margin:8px 0 0 16px;">
      <?php foreach ($errors as $err): ?>
        <li><?php echo e($err); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php endif; ?>

  <form method="POST" action="loker_edit.php?id=<?php echo $id; ?>" class="admin-form">

    <div class="form-row">
      <div class="form-group" style="flex:0 0 100px;">
        <label class="form-label">Icon Emoji</label>
        <input type="text" name="icon" class="form-input"
               value="<?php echo e($old['icon'] ?? '💼'); ?>"
               maxlength="5" style="font-size:24px; text-align:center;">
      </div>
      <div class="form-group" style="flex:1;">
        <label class="form-label">Nama Posisi <span class="req">*</span></label>
        <input type="text" name="posisi" class="form-input"
               value="<?php echo e($old['posisi'] ?? ''); ?>" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Tipe Pekerjaan <span class="req">*</span></label>
        <select name="tipe" class="form-input" required>
          <?php foreach (['Full-Time','Part-Time','Part-Time / Freelance','Freelance','Magang / Internship'] as $opt): ?>
          <option value="<?php echo e($opt); ?>"
            <?php echo ($old['tipe'] ?? '') === $opt ? 'selected' : ''; ?>>
            <?php echo e($opt); ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi <span class="req">*</span></label>
        <select name="lokasi" class="form-input" required>
          <?php foreach (['On-site','Remote','Hybrid','On-site / Online'] as $opt): ?>
          <option value="<?php echo e($opt); ?>"
            <?php echo ($old['lokasi'] ?? '') === $opt ? 'selected' : ''; ?>>
            <?php echo e($opt); ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Gaji / Kompensasi</label>
        <input type="text" name="gaji" class="form-input"
               value="<?php echo e($old['gaji'] ?? 'Nego'); ?>">
      </div>
      <div class="form-group">
        <label class="form-label">Deadline <span class="req">*</span></label>
        <input type="date" name="deadline" class="form-input"
               value="<?php echo e($old['deadline'] ?? ''); ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Status Lowongan</label>
      <div class="radio-group">
        <label class="radio-label <?php echo ($old['status'] ?? 'open') === 'open' ? 'radio-active' : ''; ?>">
          <input type="radio" name="status" value="open"
            <?php echo ($old['status'] ?? 'open') === 'open' ? 'checked' : ''; ?>>
          ✅ Buka (Menerima Lamaran)
        </label>
        <label class="radio-label <?php echo ($old['status'] ?? '') === 'close' ? 'radio-active' : ''; ?>">
          <input type="radio" name="status" value="close"
            <?php echo ($old['status'] ?? '') === 'close' ? 'checked' : ''; ?>>
          ❌ Tutup
        </label>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Deskripsi Pekerjaan <span class="req">*</span></label>
      <textarea name="deskripsi" class="form-input form-textarea" rows="4" required><?php echo e($old['deskripsi'] ?? ''); ?></textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Kualifikasi <span class="req">*</span></label>
      <textarea name="kualifikasi" class="form-input form-textarea" rows="5"
                placeholder="Satu kualifikasi per baris"><?php echo e($kual_text); ?></textarea>
      <small class="form-hint">Satu kualifikasi per baris.</small>
    </div>

    <div class="form-actions">
      <a href="loker.php" class="btn-sm btn-ghost-sm">Batal</a>
      <button type="submit" class="btn-sm btn-primary-sm btn-lg-submit">
        💾 Simpan Perubahan
      </button>
    </div>

  </form>
</div>

<!-- Info Dibuat -->
<div class="admin-card" style="max-width:780px; margin-top:0;">
  <div style="display:flex; gap:24px; font-size:13px; color:var(--admin-text-light);">
    <span>📅 Dibuat: <?php echo date('d M Y, H:i', strtotime($loker['created_at'])); ?></span>
    <span>🔄 Diperbarui: <?php echo date('d M Y, H:i', strtotime($loker['updated_at'])); ?></span>
  </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
