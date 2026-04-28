<?php
/**
 * LOKER_ADD.PHP
 * PHP: Halaman tambah lowongan baru.
 * Memproses form input, validasi server-side, lalu simpan ke database.
 */

require_once 'config.php';
requireLogin();

$admin_page = 'loker';
$page_title = 'Tambah Lowongan';

$errors = [];
$old    = []; // Untuk re-populate form jika ada error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old = $_POST;

    // ── Validasi Input ───────────────────────────────────────────────────
    $posisi      = trim($_POST['posisi'] ?? '');
    $icon        = trim($_POST['icon'] ?? '💼');
    $tipe        = trim($_POST['tipe'] ?? '');
    $lokasi      = trim($_POST['lokasi'] ?? '');
    $gaji        = trim($_POST['gaji'] ?? 'Nego');
    $status      = $_POST['status'] ?? 'open';
    $deadline    = $_POST['deadline'] ?? '';
    $deskripsi   = trim($_POST['deskripsi'] ?? '');
    $kualifikasi_raw = array_filter(array_map('trim', explode("\n", $_POST['kualifikasi'] ?? '')));

    if (empty($posisi))    $errors[] = 'Nama posisi wajib diisi.';
    if (empty($tipe))      $errors[] = 'Tipe pekerjaan wajib dipilih.';
    if (empty($lokasi))    $errors[] = 'Lokasi wajib dipilih.';
    if (empty($deadline))  $errors[] = 'Deadline wajib diisi.';
    if (empty($deskripsi)) $errors[] = 'Deskripsi wajib diisi.';
    if (empty($kualifikasi_raw)) $errors[] = 'Minimal satu kualifikasi wajib diisi.';
    if (!in_array($status, ['open', 'close'])) $errors[] = 'Status tidak valid.';

    if (empty($errors)) {
        try {
            $db   = getDB();
            $stmt = $db->prepare('
                INSERT INTO loker (icon, posisi, tipe, lokasi, gaji, status, deadline, deskripsi, kualifikasi)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $stmt->execute([
                $icon,
                $posisi,
                $tipe,
                $lokasi,
                $gaji,
                $status,
                $deadline,
                $deskripsi,
                json_encode(array_values($kualifikasi_raw), JSON_UNESCAPED_UNICODE),
            ]);

            redirect('loker.php', 'success', "Lowongan \"$posisi\" berhasil ditambahkan!");
        } catch (PDOException $e) {
            $errors[] = 'Gagal menyimpan data. Silakan coba lagi.';
        }
    }
}

include 'includes/admin_header.php';
?>

<div class="admin-card" style="max-width:780px;">
  <div class="card-header">
    <h3>➕ Tambah Lowongan Baru</h3>
    <a href="loker.php" class="btn-sm btn-ghost-sm">← Kembali</a>
  </div>

  <!-- Tampilkan error -->
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

  <form method="POST" action="loker_add.php" class="admin-form">

    <!-- Icon & Posisi -->
    <div class="form-row">
      <div class="form-group" style="flex:0 0 100px;">
        <label class="form-label">Icon Emoji</label>
        <input type="text" name="icon" class="form-input text-center"
               value="<?php echo e($old['icon'] ?? '💼'); ?>"
               placeholder="💼" maxlength="5" style="font-size:24px; text-align:center;">
        <small class="form-hint">Copy-paste emoji</small>
      </div>
      <div class="form-group" style="flex:1;">
        <label class="form-label">Nama Posisi <span class="req">*</span></label>
        <input type="text" name="posisi" class="form-input"
               value="<?php echo e($old['posisi'] ?? ''); ?>"
               placeholder="cth: Guru Preschool / PAUD" required>
      </div>
    </div>

    <!-- Tipe & Lokasi -->
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Tipe Pekerjaan <span class="req">*</span></label>
        <select name="tipe" class="form-input" required>
          <option value="">-- Pilih Tipe --</option>
          <?php
            $tipe_opts = ['Full-Time','Part-Time','Part-Time / Freelance','Freelance','Magang / Internship'];
            foreach ($tipe_opts as $opt):
          ?>
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
          <option value="">-- Pilih Lokasi --</option>
          <?php
            $lokasi_opts = ['On-site','Remote','Hybrid','On-site / Online'];
            foreach ($lokasi_opts as $opt):
          ?>
          <option value="<?php echo e($opt); ?>"
            <?php echo ($old['lokasi'] ?? '') === $opt ? 'selected' : ''; ?>>
            <?php echo e($opt); ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <!-- Gaji & Deadline -->
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Gaji / Kompensasi</label>
        <input type="text" name="gaji" class="form-input"
               value="<?php echo e($old['gaji'] ?? 'Nego'); ?>"
               placeholder="cth: Nego / Per Sesi / Rp 3-5 jt">
      </div>
      <div class="form-group">
        <label class="form-label">Deadline <span class="req">*</span></label>
        <input type="date" name="deadline" class="form-input"
               value="<?php echo e($old['deadline'] ?? ''); ?>"
               min="<?php echo date('Y-m-d'); ?>" required>
      </div>
    </div>

    <!-- Status -->
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

    <!-- Deskripsi -->
    <div class="form-group">
      <label class="form-label">Deskripsi Pekerjaan <span class="req">*</span></label>
      <textarea name="deskripsi" class="form-input form-textarea" rows="4"
                placeholder="Jelaskan gambaran umum pekerjaan ini..."
                required><?php echo e($old['deskripsi'] ?? ''); ?></textarea>
    </div>

    <!-- Kualifikasi -->
    <div class="form-group">
      <label class="form-label">Kualifikasi <span class="req">*</span></label>
      <textarea name="kualifikasi" class="form-input form-textarea" rows="5"
                placeholder="Tulis satu kualifikasi per baris:&#10;Minimal S1 PAUD&#10;Berpengalaman min. 1 tahun&#10;Sabar dan kreatif"><?php echo e($old['kualifikasi'] ?? ''); ?></textarea>
      <small class="form-hint">Tulis satu kualifikasi per baris. Setiap baris akan menjadi poin tersendiri.</small>
    </div>

    <!-- Submit -->
    <div class="form-actions">
      <a href="loker.php" class="btn-sm btn-ghost-sm">Batal</a>
      <button type="submit" class="btn-sm btn-primary-sm btn-lg-submit">
        💾 Simpan Lowongan
      </button>
    </div>

  </form>
</div>

<?php include 'includes/admin_footer.php'; ?>
