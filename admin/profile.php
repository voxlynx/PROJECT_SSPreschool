<?php
/**
 * PROFILE.PHP
 * PHP: Halaman profil admin — bisa ubah nama dan password.
 * Password di-hash ulang dengan bcrypt sebelum disimpan.
 */

require_once 'config.php';
requireLogin();

$admin_page = 'profile';
$page_title = 'Profil & Password';

$db     = getDB();
$errors = [];
$ok_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // ── Update Nama ──────────────────────────────────────────────────────
    if ($action === 'update_nama') {
        $nama = trim($_POST['nama'] ?? '');
        if (empty($nama)) {
            $errors[] = 'Nama tidak boleh kosong.';
        } else {
            $db->prepare('UPDATE admins SET nama = ? WHERE id = ?')
               ->execute([$nama, $_SESSION['admin_id']]);
            $_SESSION['admin_nama'] = $nama;
            redirect('profile.php', 'success', 'Nama berhasil diperbarui.');
        }
    }

    // ── Ganti Password ───────────────────────────────────────────────────
    if ($action === 'change_password') {
        $pass_lama = $_POST['pass_lama'] ?? '';
        $pass_baru = $_POST['pass_baru'] ?? '';
        $pass_conf = $_POST['pass_conf'] ?? '';

        // Ambil hash saat ini
        $stmt = $db->prepare('SELECT password FROM admins WHERE id = ?');
        $stmt->execute([$_SESSION['admin_id']]);
        $hash = $stmt->fetchColumn();

        if (!password_verify($pass_lama, $hash)) {
            $errors[] = 'Password lama salah.';
        } elseif (strlen($pass_baru) < 8) {
            $errors[] = 'Password baru minimal 8 karakter.';
        } elseif ($pass_baru !== $pass_conf) {
            $errors[] = 'Konfirmasi password tidak cocok.';
        } else {
            $new_hash = password_hash($pass_baru, PASSWORD_BCRYPT, ['cost' => 12]);
            $db->prepare('UPDATE admins SET password = ? WHERE id = ?')
               ->execute([$new_hash, $_SESSION['admin_id']]);
            redirect('profile.php', 'success', 'Password berhasil diubah.');
        }
    }
}

// Ambil data admin terkini
$admin = $db->prepare('SELECT * FROM admins WHERE id = ?');
$admin->execute([$_SESSION['admin_id']]);
$admin = $admin->fetch();

include 'includes/admin_header.php';
?>

<div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; max-width:880px;">

  <!-- Update Nama -->
  <div class="admin-card">
    <div class="card-header"><h3>👤 Informasi Profil</h3></div>

    <?php if ($errors): ?>
      <div class="alert alert-danger">⚠️ <?php echo e($errors[0]); ?></div>
    <?php endif; ?>

    <form method="POST" action="profile.php" class="admin-form">
      <input type="hidden" name="action" value="update_nama">
      <div class="form-group">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-input"
               value="<?php echo e($admin['nama']); ?>" required>
      </div>
      <div class="form-group">
        <label class="form-label">Username</label>
        <input type="text" class="form-input" value="<?php echo e($admin['username']); ?>" disabled>
        <small class="form-hint">Username tidak dapat diubah.</small>
      </div>
      <div class="form-group">
        <label class="form-label">Terdaftar Sejak</label>
        <input type="text" class="form-input"
               value="<?php echo date('d M Y', strtotime($admin['created_at'])); ?>" disabled>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn-sm btn-primary-sm">💾 Simpan Nama</button>
      </div>
    </form>
  </div>

  <!-- Ganti Password -->
  <div class="admin-card">
    <div class="card-header"><h3>🔐 Ganti Password</h3></div>
    <form method="POST" action="profile.php" class="admin-form">
      <input type="hidden" name="action" value="change_password">
      <div class="form-group">
        <label class="form-label">Password Lama <span class="req">*</span></label>
        <input type="password" name="pass_lama" class="form-input"
               placeholder="Masukkan password saat ini" required>
      </div>
      <div class="form-group">
        <label class="form-label">Password Baru <span class="req">*</span></label>
        <input type="password" name="pass_baru" class="form-input"
               placeholder="Min. 8 karakter" required minlength="8">
      </div>
      <div class="form-group">
        <label class="form-label">Konfirmasi Password Baru <span class="req">*</span></label>
        <input type="password" name="pass_conf" class="form-input"
               placeholder="Ulangi password baru" required>
      </div>
      <div class="alert alert-info" style="font-size:13px; margin-bottom:16px;">
        💡 Gunakan kombinasi huruf besar, kecil, angka, dan simbol untuk password yang kuat.
      </div>
      <div class="form-actions">
        <button type="submit" class="btn-sm btn-primary-sm">🔐 Ganti Password</button>
      </div>
    </form>
  </div>

</div>

<?php include 'includes/admin_footer.php'; ?>
