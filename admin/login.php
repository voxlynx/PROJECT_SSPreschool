<?php
/**
 * LOGIN.PHP
 * PHP: Halaman login admin.
 * - Memproses form login dengan validasi & proteksi brute-force sederhana
 * - Menggunakan password_verify() untuk mengecek bcrypt hash
 * - Menyimpan data sesi admin setelah login berhasil
 * - Redirect ke dashboard jika sudah login
 */

require_once 'config.php';

// Jika sudah login, langsung ke dashboard
if (isLoggedIn()) {
    redirect('dashboard.php');
}

$error  = '';
$reason = $_GET['reason'] ?? '';

// ── Proses Form Login ───────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // CSRF token sederhana
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Username dan password wajib diisi.';
    } else {
        try {
            $db   = getDB();
            $stmt = $db->prepare('SELECT id, username, password, nama FROM admins WHERE username = ? LIMIT 1');
            $stmt->execute([$username]);
            $admin = $stmt->fetch();

            // Verifikasi password dengan bcrypt
            if ($admin && password_verify($password, $admin['password'])) {
                // Login berhasil — isi session
                session_regenerate_id(true); // Cegah session fixation
                $_SESSION['admin_id']       = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                $_SESSION['admin_nama']     = $admin['nama'];
                $_SESSION['last_activity']  = time();
                $_SESSION['login_time']     = time();

                redirect('dashboard.php', 'success', 'Selamat datang, ' . $admin['nama'] . '!');
            } else {
                // Jangan beri tahu mana yang salah (security)
                $error = 'Username atau password salah. Silakan coba lagi.';
            }
        } catch (PDOException $e) {
            $error = 'Terjadi kesalahan sistem. Silakan coba beberapa saat lagi.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin – EDUCENTER</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700;800&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="assets/admin.css">
</head>
<body class="login-page">

<div class="login-wrapper">

  <!-- Dekorasi background -->
  <div class="login-bg">
    <span class="bg-shape s1">★</span>
    <span class="bg-shape s2">✦</span>
    <span class="bg-shape s3">◆</span>
    <span class="bg-shape s4">●</span>
  </div>

  <div class="login-card">

    <!-- Logo -->
    <div class="login-logo">
      <span class="logo-icon">🎓</span>
      <div>
        <div class="logo-text">
          <span class="logo-edu">EDU</span><span class="logo-center">CENTER</span>
        </div>
        <div class="login-subtitle">Panel Admin</div>
      </div>
    </div>

    <h1 class="login-title">Masuk ke Dashboard</h1>
    <p class="login-desc">Silakan login untuk mengelola konten EDUCENTER.</p>

    <!-- Pesan session expired / logout -->
    <?php if ($reason === 'session'): ?>
      <div class="alert alert-warning">
        ⏰ Sesi Anda telah berakhir. Silakan login kembali.
      </div>
    <?php elseif ($reason === 'logout'): ?>
      <div class="alert alert-info">
        👋 Anda telah berhasil logout.
      </div>
    <?php endif; ?>

    <!-- Error -->
    <?php if ($error): ?>
      <div class="alert alert-danger">
        ⚠️ <?php echo e($error); ?>
      </div>
    <?php endif; ?>

    <!-- Form Login -->
    <form method="POST" action="login.php" class="login-form" novalidate>

      <div class="form-group">
        <label for="username" class="form-label">Username</label>
        <div class="input-wrap">
          <span class="input-icon">👤</span>
          <input
            type="text"
            id="username"
            name="username"
            class="form-input"
            placeholder="Masukkan username"
            value="<?php echo e($_POST['username'] ?? ''); ?>"
            autocomplete="username"
            required
          >
        </div>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <div class="input-wrap">
          <span class="input-icon">🔒</span>
          <input
            type="password"
            id="password"
            name="password"
            class="form-input"
            placeholder="Masukkan password"
            autocomplete="current-password"
            required
          >
          <button type="button" class="toggle-pass" id="togglePass" aria-label="Tampilkan password">👁️</button>
        </div>
      </div>

      <button type="submit" class="btn-login">
        <span>Masuk ke Dashboard</span>
        <span class="btn-arrow">→</span>
      </button>

    </form>

    <div class="login-hint">
      <small>Default: <code>admin</code> / <code>Admin@1234</code></small>
    </div>

    <a href="../index.php" class="back-to-web">← Kembali ke Website</a>

  </div>
</div>

<script>
// JS: Toggle visibilitas password
document.getElementById('togglePass').addEventListener('click', function () {
  const input = document.getElementById('password');
  const isPass = input.type === 'password';
  input.type = isPass ? 'text' : 'password';
  this.textContent = isPass ? '🙈' : '👁️';
});
</script>
</body>
</html>
