<?php
/**
 * PHP: Navbar ini di-include di semua halaman.
 * Variabel $current_page digunakan untuk memberi class 'active'
 * pada menu yang sedang aktif, sehingga navigasi lebih jelas.
 */
?>

<header class="site-header" id="siteHeader">
  <nav class="navbar container" role="navigation" aria-label="Menu Utama">

    <!-- Logo -->
    <a href="index.php" class="navbar-logo" aria-label="EDUCENTER Home">
      <span class="logo-icon">🎓</span>
      <span class="logo-text">
        <span class="logo-edu">EDU</span><span class="logo-center">CENTER</span>
      </span>
    </a>

    <!-- Desktop Menu -->
    <ul class="nav-links" id="navLinks" role="list">
      <li>
        <a href="index.php"
           class="nav-link <?php echo ($current_page === 'home') ? 'active' : ''; ?>"
           aria-current="<?php echo ($current_page === 'home') ? 'page' : 'false'; ?>">
          🏠 Home
        </a>
      </li>
      <li>
        <a href="preschool.php"
           class="nav-link <?php echo ($current_page === 'preschool') ? 'active' : ''; ?>"
           aria-current="<?php echo ($current_page === 'preschool') ? 'page' : 'false'; ?>">
          🏫 SS Preschool
        </a>
      </li>
      <li>
        <a href="private.php"
           class="nav-link <?php echo ($current_page === 'private') ? 'active' : ''; ?>"
           aria-current="<?php echo ($current_page === 'private') ? 'page' : 'false'; ?>">
          📖 Private Class
        </a>
      </li>
      <li>
        <a href="bimba.php"
           class="nav-link <?php echo ($current_page === 'bimba') ? 'active' : ''; ?>"
           aria-current="<?php echo ($current_page === 'bimba') ? 'page' : 'false'; ?>">
          🔤 Bimba
        </a>
      </li>
      <li>
        <a href="loker.php"
           class="nav-link nav-link-special <?php echo ($current_page === 'loker') ? 'active' : ''; ?>"
           aria-current="<?php echo ($current_page === 'loker') ? 'page' : 'false'; ?>">
          💼 Info Loker
        </a>
      </li>
    </ul>

    <!-- Hamburger Button (Mobile) -->
    <button class="hamburger" id="hamburgerBtn" aria-label="Toggle Menu" aria-expanded="false" aria-controls="navLinks">
      <span class="ham-line"></span>
      <span class="ham-line"></span>
      <span class="ham-line"></span>
    </button>

  </nav>
</header>

<!-- Overlay untuk mobile menu -->
<div class="nav-overlay" id="navOverlay"></div>
