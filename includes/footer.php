<?php
/**
 * PHP: Footer ini di-include di semua halaman sebagai penutup HTML.
 * Berisi informasi kontak, link navigasi, dan tahun copyright
 * yang diambil otomatis dari PHP date().
 */
?>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <!-- Kolom Brand -->
      <div class="footer-col footer-brand">
        <div class="footer-logo">
          <span class="logo-icon">🎓</span>
          <span class="logo-text">
            <span class="logo-edu">EDU</span><span class="logo-center">CENTER</span>
          </span>
        </div>
        <p>Pusat belajar terpercaya untuk anak usia dini. Kami hadir dengan hati untuk masa depan si kecil yang lebih cerah.</p>
        <div class="footer-socials">
          <a href="#" class="social-btn" aria-label="Instagram">📸</a>
          <a href="#" class="social-btn" aria-label="WhatsApp">💬</a>
          <a href="#" class="social-btn" aria-label="Facebook">📘</a>
        </div>
      </div>

      <!-- Kolom Program -->
      <div class="footer-col">
        <h4>Program Kami</h4>
        <ul class="footer-links">
          <li><a href="preschool.php">🏫 SS Preschool</a></li>
          <li><a href="private.php">📖 Private Class</a></li>
          <li><a href="bimba.php">🔤 Bimba</a></li>
          <li><a href="loker.php">💼 Info Loker</a></li>
        </ul>
      </div>

      <!-- Kolom Kontak -->
      <div class="footer-col">
        <h4>Hubungi Kami</h4>
        <ul class="footer-contact">
          <li><span>📍</span>  JL.	AL	MUBAROK	III	NO.68,	Desa/Kelurahan	Joglo,	Kec.	Kembangan,
Kota	Adm.	Jakarta	Barat,	Provinsi	DKI	Jakarta</li>
          <li><span>📞</span> (+62)  851-7166-0808</li>
          <li><span>✉️</span> rithie.sspreschool@gmail.com</li>
          <li><span>🕐</span> Senin–Sabtu, 08.00–17.00</li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <p>© <?php echo date('Y'); ?> <strong>EDUCENTER</strong>. Semua hak dilindungi. Dibuat dengan ❤️ untuk generasi emas Indonesia.</p>
    </div>
  </div>
</footer>

<!-- JS Utama -->
<script src="assets/js/main.js"></script>
</body>
</html>
