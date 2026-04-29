<?php
/**
 * ADMIN HEADER / SIDEBAR
 * PHP: Komponen layout yang di-include di semua halaman admin.
 * Menampilkan sidebar navigasi, topbar, dan info sesi admin.
 * Variabel $admin_page diset di setiap halaman untuk highlight menu aktif.
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($page_title) ? e($page_title) . ' – Admin EDUCENTER' : 'Admin EDUCENTER'; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;700;800&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="assets/admin.css">
</head>
<body class="admin-body">

<!-- ── Sidebar ─────────────────────────────────────────────────────────── -->
<aside class="admin-sidebar" id="adminSidebar">

  <!-- Logo -->
  <div class="sidebar-logo">
    <span class="logo-icon">🎓</span>
    <div>
      <div class="logo-text" style="font-size:18px;">
        <span class="logo-edu">EDU</span><span class="logo-center">CENTER</span>
      </div>
      <div style="font-size:11px; color:rgba(255,255,255,0.5); font-weight:600; letter-spacing:.5px;">PANEL ADMIN</div>
    </div>
  </div>

  <!-- Info Admin -->
  <div class="sidebar-user">
    <div class="sidebar-avatar">👨‍💼</div>
    <div class="sidebar-user-info">
      <strong><?php echo e($_SESSION['admin_nama'] ?? 'Admin'); ?></strong>
      <span>Administrator</span>
    </div>
  </div>

  <!-- Session Timer -->
  <div class="session-timer" id="sessionTimer">
    <span class="timer-icon">⏱️</span>
    <span>Sesi: <strong id="timerDisplay"><?php echo sessionTimeLeft(); ?> mnt</strong></span>
  </div>

  <!-- Navigasi -->
  <nav class="sidebar-nav">
    <div class="nav-section-label">Menu Utama</div>

    <a href="dashboard.php"
       class="sidebar-link <?php echo ($admin_page ?? '') === 'dashboard' ? 'active' : ''; ?>">
      <span class="link-icon">📊</span> Dashboard
    </a>

    <div class="nav-section-label">Kelola Konten</div>

    <a href="loker.php"
       class="sidebar-link <?php echo ($admin_page ?? '') === 'loker' ? 'active' : ''; ?>">
      <span class="link-icon">💼</span> Info Loker
      <?php
        // PHP: Tampilkan badge jumlah loker aktif di sidebar
        try {
          $cnt = getDB()->query("SELECT COUNT(*) FROM loker WHERE status='open'")->fetchColumn();
          if ($cnt > 0) echo '<span class="link-badge">' . $cnt . '</span>';
        } catch(Exception $e) {}
      ?>
    </a>

    <div class="nav-section-label">Akun</div>

    <a href="profile.php"
       class="sidebar-link <?php echo ($admin_page ?? '') === 'profile' ? 'active' : ''; ?>">
      <span class="link-icon">👤</span> Profil & Password
    </a>

    <a href="logout.php" class="sidebar-link sidebar-logout">
      <span class="link-icon">🚪</span> Logout
    </a>
  </nav>

  <!-- Link ke Website -->
  <a href="../index.php" class="sidebar-web-link" target="_blank">
    🌐 Lihat Website →
  </a>

</aside>

<!-- Overlay mobile sidebar -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ── Main Wrapper ────────────────────────────────────────────────────── -->
<div class="admin-main">

  <!-- Topbar -->
  <header class="admin-topbar">
    <button class="topbar-toggle" id="sidebarToggle" aria-label="Toggle Sidebar">☰</button>
    <div class="topbar-title"><?php echo isset($page_title) ? e($page_title) : 'Dashboard'; ?></div>
    <div class="topbar-right">
      <span class="topbar-user">👋 <?php echo e($_SESSION['admin_nama'] ?? 'Admin'); ?></span>
      <a href="logout.php" class="topbar-logout">Logout 🚪</a>
    </div>
  </header>

  <!-- Flash Message -->
  <?php $flash = getFlash(); if ($flash): ?>
  <div class="flash-message flash-<?php echo e($flash['type']); ?>" id="flashMsg">
    <?php echo $flash['type'] === 'success' ? '✅' : '⚠️'; ?>
    <?php echo e($flash['msg']); ?>
    <button class="flash-close" onclick="this.parentElement.remove()">×</button>
  </div>
  <?php endif; ?>

  <!-- Content area dimulai dari sini -->
  <main class="admin-content">
