<?php
/**
 * PHP: Halaman Bimba (Bimbingan Membaca)
 * Menampilkan promosi program bimbingan membaca untuk anak usia dini.
 */

$current_page = 'bimba';
$page_title   = 'Bimba – Bimbingan Membaca EDUCENTER';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="page-hero" data-emoji="🔤">
  <div class="section-badge">🔤 Program Bimba</div>
  <h1>Bimba: Bimbingan <span class="highlight">Membaca</span> Cepat & Menyenangkan</h1>
  <p>Metode inovatif yang terbukti membantu anak usia 3–7 tahun belajar membaca dengan cara yang menyenangkan, tanpa tekanan, dan penuh semangat!</p>
</section>

<!-- Keunggulan Bimba -->
<section class="programs" id="keunggulan">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">⭐ Keunggulan Program</div>
      <h2 class="section-title">Kenapa Memilih <span class="highlight">Bimba?</span></h2>
    </div>
    <div class="programs-grid">
      <?php
        $keunggulan = [
          ['icon'=>'⚡','title'=>'Cepat & Efektif',       'desc'=>'Dengan metode yang tepat, banyak anak sudah bisa membaca lancar hanya dalam 3–6 bulan.'],
          ['icon'=>'🎮','title'=>'Belajar Sambil Bermain', 'desc'=>'Media pembelajaran berbasis permainan dan gambar membuat anak tidak bosan dan selalu antusias.'],
          ['icon'=>'👶','title'=>'Cocok untuk Semua Anak', 'desc'=>'Program kami dirancang untuk berbagai tipe anak, termasuk yang lambat belajar atau memiliki kebutuhan khusus.'],
          ['icon'=>'📈','title'=>'Progress Terukur',       'desc'=>'Setiap tahap perkembangan dicatat dan dilaporkan secara berkala kepada orang tua.'],
          ['icon'=>'🏆','title'=>'Terbukti Berhasil',     'desc'=>'Ratusan anak alumni Bimba EDUCENTER kini membaca dengan lancar dan percaya diri.'],
          ['icon'=>'❤️','title'=>'Penuh Kasih Sayang',   'desc'=>'Pengajar kami sabar dan penuh empati, menjadikan setiap sesi belajar pengalaman yang hangat dan positif.'],
        ];
        foreach ($keunggulan as $i => $k):
      ?>
      <div class="program-card" data-delay="<?php echo $i*100; ?>">
        <div class="card-icon-wrap <?php echo ($i%2===0)?'icon-yellow':'icon-blue'; ?>">
          <span class="card-icon"><?php echo $k['icon']; ?></span>
        </div>
        <h3><?php echo htmlspecialchars($k['title']); ?></h3>
        <p><?php echo htmlspecialchars($k['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Tahapan Program -->
<section class="why-us">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">📋 Tahapan Belajar</div>
      <h2 class="section-title">Dari Huruf hingga <span class="highlight">Membaca Lancar</span></h2>
    </div>
    <div class="why-features" style="max-width:720px; margin:0 auto;">
      <?php
        $tahapan = [
          ['icon'=>'🔡','title'=>'Tahap 1 – Mengenal Huruf',      'desc'=>'Anak diperkenalkan pada alfabet A–Z dengan cara yang menyenangkan menggunakan gambar dan lagu.'],
          ['icon'=>'🔗','title'=>'Tahap 2 – Merangkai Suku Kata', 'desc'=>'Belajar menggabungkan konsonan dan vokal menjadi suku kata sederhana: ba, bi, bu, be, bo.'],
          ['icon'=>'📝','title'=>'Tahap 3 – Membaca Kata',        'desc'=>'Dari suku kata, anak mulai membentuk dan membaca kata-kata bermakna secara mandiri.'],
          ['icon'=>'📖','title'=>'Tahap 4 – Membaca Kalimat',     'desc'=>'Anak sudah bisa membaca kalimat pendek dan memahami isinya dengan baik dan lancar.'],
        ];
        foreach ($tahapan as $t):
      ?>
      <div class="why-item">
        <div class="why-icon"><?php echo $t['icon']; ?></div>
        <div>
          <h4><?php echo htmlspecialchars($t['title']); ?></h4>
          <p><?php echo htmlspecialchars($t['desc']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-section">
  <div class="container">
    <div class="cta-box">
      <div class="cta-shapes"><span>🔤</span><span>📖</span><span>⭐</span></div>
      <h2>Si Kecil Siap Jadi Pembaca Cilik?</h2>
      <p>Hubungi kami sekarang dan daftarkan anak Anda ke program Bimba terbaik yang menyenangkan dan terbukti berhasil!</p>
      <div class="cta-buttons">
        <a href="https://wa.me/6281234567890" class="btn btn-white">💬 Daftar via WhatsApp</a>
        <a href="index.php" class="btn btn-outline-white">← Kembali ke Home</a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
