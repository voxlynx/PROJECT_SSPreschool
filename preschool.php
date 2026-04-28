<?php
/**
 * PHP: Halaman SS Preschool
 * Menampilkan promosi dan informasi program prasekolah.
 * Variabel $current_page digunakan navbar untuk highlight menu aktif.
 */

$current_page = 'preschool';
$page_title   = 'SS Preschool – EDUCENTER';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Page Hero -->
<section class="page-hero" data-emoji="🏫">
  <div class="section-badge">🏫 Program Kami</div>
  <h1>SS <span class="highlight">Preschool</span></h1>
  <p>Membangun fondasi karakter dan kecerdasan anak usia dini melalui pendekatan holistik yang menyenangkan, aman, dan penuh kasih sayang.</p>
</section>

<!-- Keunggulan Program -->
<section class="programs" id="keunggulan">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">✨ Keunggulan</div>
      <h2 class="section-title">Mengapa Memilih <span class="highlight">SS Preschool?</span></h2>
    </div>
    <div class="programs-grid">
      <?php
        /**
         * PHP: Array berisi data fitur program.
         * Dengan PHP, data bisa dengan mudah di-loop dan dipanggil
         * tanpa mengulang kode HTML secara manual.
         */
        $features = [
          ['icon' => '🎨', 'title' => 'Play-Based Learning',
           'desc' => 'Belajar melalui bermain membuat anak lebih mudah menyerap pengetahuan dan mengembangkan kreativitas secara alami.'],
          ['icon' => '👩‍🏫', 'title' => 'Guru Bersertifikat',
           'desc' => 'Tenaga pengajar kami terlatih dan bersertifikat di bidang pendidikan anak usia dini (PAUD).'],
          ['icon' => '🏡', 'title' => 'Lingkungan Aman & Nyaman',
           'desc' => 'Fasilitas bersih, aman, dan dirancang khusus agar anak merasa nyaman dan betah belajar setiap hari.'],
          ['icon' => '📊', 'title' => 'Laporan Perkembangan',
           'desc' => 'Orang tua menerima laporan berkala mengenai tumbuh kembang dan kemajuan belajar anak secara transparan.'],
          ['icon' => '🌈', 'title' => 'Kurikulum Holistik',
           'desc' => 'Kurikulum mencakup aspek kognitif, emosional, sosial, fisik, dan spiritual untuk perkembangan menyeluruh.'],
          ['icon' => '🤝', 'title' => 'Komunitas Orang Tua',
           'desc' => 'Program parenting dan forum orang tua rutin untuk bersama mendukung tumbuh kembang si kecil.'],
        ];

        foreach ($features as $index => $f):
      ?>
      <div class="program-card" data-delay="<?php echo $index * 100; ?>">
        <div class="card-icon-wrap <?php echo ($index % 2 === 0) ? 'icon-blue' : 'icon-yellow'; ?>">
          <span class="card-icon"><?php echo $f['icon']; ?></span>
        </div>
        <h3><?php echo htmlspecialchars($f['title']); ?></h3>
        <p><?php echo htmlspecialchars($f['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Jadwal & Biaya -->
<section class="why-us">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">📅 Kelas & Jadwal</div>
      <h2 class="section-title">Pilihan Kelas <span class="highlight">Fleksibel</span></h2>
    </div>
    <div class="programs-grid">
      <?php
        $kelas = [
          ['nama' => 'Kelas Playgroup', 'usia' => '2–3 Tahun', 'hari' => 'Senin, Rabu, Jumat', 'waktu' => '08.00 – 10.00', 'icon' => '🧸'],
          ['nama' => 'Kelas TK A',      'usia' => '4–5 Tahun', 'hari' => 'Senin – Jumat',     'waktu' => '07.30 – 11.00', 'icon' => '🎒'],
          ['nama' => 'Kelas TK B',      'usia' => '5–6 Tahun', 'hari' => 'Senin – Jumat',     'waktu' => '07.30 – 11.30', 'icon' => '📚'],
        ];
        foreach ($kelas as $k):
      ?>
      <div class="program-card">
        <div class="card-icon-wrap icon-yellow">
          <span class="card-icon"><?php echo $k['icon']; ?></span>
        </div>
        <h3><?php echo htmlspecialchars($k['nama']); ?></h3>
        <ul class="card-features">
          <li>👶 Usia: <?php echo $k['usia']; ?></li>
          <li>📅 Hari: <?php echo $k['hari']; ?></li>
          <li>🕐 Pukul: <?php echo $k['waktu']; ?></li>
        </ul>
        <a href="#daftar" class="btn btn-primary" style="margin-top:8px; font-size:13px; padding:10px 18px;">Daftar Sekarang</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <div class="cta-box">
      <div class="cta-shapes"><span>🏫</span><span>⭐</span><span>🎨</span></div>
      <h2>Daftarkan Si Kecil Sekarang!</h2>
      <p>Tempat terbatas! Hubungi kami sekarang dan dapatkan informasi lengkap tentang pendaftaran SS Preschool.</p>
      <div class="cta-buttons">
        <a href="https://wa.me/6285171660808" class="btn btn-white">💬 Chat WhatsApp</a>
        <a href="index.php" class="btn btn-outline-white">← Kembali ke Home</a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
