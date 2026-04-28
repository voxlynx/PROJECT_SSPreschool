<?php
/**
 * PHP: Halaman Private Class
 * Menampilkan promosi kelas privat satu-satu dengan pengajar berpengalaman.
 */

$current_page = 'private';
$page_title   = 'Private Class – EDUCENTER';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="page-hero" data-emoji="📖">
  <div class="section-badge">📖 Private Class</div>
  <h1>Belajar <span class="highlight">Privat</span> Lebih Efektif</h1>
  <p>Kelas satu-satu yang disesuaikan dengan gaya belajar, kecepatan, dan kebutuhan unik setiap anak. Hasil maksimal, perhatian penuh.</p>
</section>

<!-- Mata Pelajaran -->
<section class="programs" id="mapel">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">📚 Mata Pelajaran</div>
      <h2 class="section-title">Kami Siap Mengajar <span class="highlight">Berbagai Mapel</span></h2>
    </div>
    <div class="programs-grid">
      <?php
        $mapel = [
          ['icon'=>'🔢','title'=>'Matematika',   'desc'=>'Dari penjumlahan dasar hingga aljabar dan kalkulus, kami ajarkan dengan cara yang logis dan menyenangkan.'],
          ['icon'=>'🔤','title'=>'Bahasa Indonesia','desc'=>'Membaca, menulis, EYD, dan tata bahasa untuk semua jenjang pendidikan dari SD hingga SMA.'],
          ['icon'=>'🌐','title'=>'Bahasa Inggris', 'desc'=>'Conversation, grammar, reading comprehension, dan persiapan ujian TOEFL/IELTS.'],
          ['icon'=>'🔬','title'=>'IPA / Sains',   'desc'=>'Fisika, kimia, dan biologi diajarkan dengan eksperimen sederhana dan visualisasi yang mudah dipahami.'],
          ['icon'=>'💻','title'=>'Komputer & Coding','desc'=>'Pengenalan komputer, Microsoft Office, dan dasar-dasar pemrograman untuk anak-anak masa kini.'],
          ['icon'=>'🎵','title'=>'Seni & Musik',  'desc'=>'Menggambar, mewarnai, dan pengenalan alat musik sebagai sarana ekspresi kreatif anak.'],
        ];
        foreach ($mapel as $i => $m):
      ?>
      <div class="program-card" data-delay="<?php echo $i * 80; ?>">
        <div class="card-icon-wrap <?php echo ($i%2===0)?'icon-blue':'icon-yellow'; ?>">
          <span class="card-icon"><?php echo $m['icon']; ?></span>
        </div>
        <h3><?php echo htmlspecialchars($m['title']); ?></h3>
        <p><?php echo htmlspecialchars($m['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Cara Kerja -->
<section class="why-us">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">🔄 Cara Kerja</div>
      <h2 class="section-title">Bagaimana <span class="highlight">Proses Belajarnya?</span></h2>
    </div>
    <div class="why-features" style="max-width: 700px; margin: 0 auto;">
      <?php
        $steps = [
          ['icon'=>'📞','title'=>'1. Konsultasi Gratis',    'desc'=>'Hubungi kami untuk konsultasi kebutuhan belajar anak. Gratis tanpa syarat!'],
          ['icon'=>'🎯','title'=>'2. Asesmen Kemampuan',    'desc'=>'Guru kami melakukan penilaian awal untuk memahami level dan gaya belajar anak.'],
          ['icon'=>'📋','title'=>'3. Rancang Program',      'desc'=>'Kurikulum dan jadwal dirancang sesuai kebutuhan, ketersediaan waktu, dan target capaian.'],
          ['icon'=>'📈','title'=>'4. Belajar & Evaluasi',   'desc'=>'Proses belajar berjalan rutin dan dievaluasi berkala. Laporan perkembangan dikirim ke orang tua.'],
        ];
        foreach ($steps as $s):
      ?>
      <div class="why-item">
        <div class="why-icon"><?php echo $s['icon']; ?></div>
        <div>
          <h4><?php echo htmlspecialchars($s['title']); ?></h4>
          <p><?php echo htmlspecialchars($s['desc']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-section">
  <div class="container">
    <div class="cta-box">
      <div class="cta-shapes"><span>📖</span><span>✏️</span><span>🎯</span></div>
      <h2>Mulai Private Class Hari Ini!</h2>
      <p>Jadwal fleksibel, guru berpengalaman, dan materi disesuaikan. Hubungi kami sekarang untuk konsultasi gratis.</p>
      <div class="cta-buttons">
        <a href="https://wa.me/6285171660808" class="btn btn-white">💬 Daftar via WhatsApp</a>
        <a href="index.php" class="btn btn-outline-white">← Kembali ke Home</a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
