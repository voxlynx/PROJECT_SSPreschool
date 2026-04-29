<?php
/**
 * PHP: Halaman Info Loker (Lowongan Kerja)
 * Menampilkan daftar lowongan pekerjaan yang tersedia di EDUCENTER.
 * Data lowongan diambil dari database MySQL (tabel loker).
 */

$current_page = 'loker';
$page_title   = 'Info Loker – EDUCENTER';

include 'includes/header.php';
include 'includes/navbar.php';

// ── Koneksi Database ───────────────────────────────────────────────────────
$db_host = 'localhost';
$db_name = 'educenter_db';
$db_user = 'root';
$db_pass = '';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Ambil data loker dari database, urutkan berdasarkan created_at DESC
    $stmt = $pdo->query("SELECT * FROM loker ORDER BY created_at DESC");
    $lokerData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Format data untuk view
    $lowongan = [];
    foreach ($lokerData as $row) {
      $kualifikasi = json_decode($row['kualifikasi'], true);
      if (!is_array($kualifikasi)) {
        $kualifikasi = [];
      }
      $lowongan[] = [
        'posisi'     => $row['posisi'],
        'tipe'       => $row['tipe'],
        'lokasi'     => $row['lokasi'],
        'gaji'       => $row['gaji'],
        'status'     => $row['status'],
        'deadline'   => date('d M Y', strtotime($row['deadline'])),
        'icon'       => $row['icon'],
        'deskripsi'  => $row['deskripsi'],
        'kualifikasi' => $kualifikasi,
      ];
    }
} catch (PDOException $e) {
  // Jika database tidak tersedia, fallback ke data statis
  $lowongan = [];
  echo '<div style="color:#c00; text-align:center; margin-top:16px; font-weight:bold;">Koneksi database gagal: ' . htmlspecialchars($e->getMessage()) . '</div>';
}
?>

<!-- Page Hero -->
<section class="page-hero" data-emoji="💼">
  <div class="section-badge">💼 Karir & Lowongan</div>
  <h1>Info <span class="highlight">Lowongan Kerja</span></h1>
  <p>Bergabunglah bersama tim EDUCENTER dan jadilah bagian dari perubahan positif dalam dunia pendidikan anak Indonesia.</p>
</section>

<!-- Filter Bar -->
<section class="programs" style="padding-top: 48px;">
  <div class="container">

    <!-- Statistik Singkat -->
    <div class="hero-stats" style="margin: 0 auto 48px; justify-content: center;">
      <?php
        $open  = 0;
        $close = 0;
        foreach ($lowongan as $l) {
            if (isset($l['status']) && $l['status'] === 'open') $open++;
            if (isset($l['status']) && $l['status'] === 'close') $close++;
        }
        $total = count($lowongan);
      ?>
      <div class="stat-item">
          <span class="stat-number" style="color: #1a7a1a;" data-target="<?php echo (int)$open; ?>"><?php echo (int)$open; ?></span>
        <span class="stat-label">Lowongan Aktif</span>
      </div>
      <div class="stat-divider"></div>
      <div class="stat-item">
          <span class="stat-number" data-target="<?php echo (int)$total; ?>"><?php echo (int)$total; ?></span>
        <span class="stat-label">Total Posisi</span>
      </div>
      <div class="stat-divider"></div>
      <div class="stat-item">
          <span class="stat-number" data-target="<?php echo (int)$close; ?>"><?php echo (int)$close; ?></span>
        <span class="stat-label">Sudah Ditutup</span>
      </div>
    </div>
    <?php if ($total === 0): ?>
      <div style="color:#c00; text-align:center; margin-top:16px; font-weight:bold;">Data lowongan tidak ditemukan. Pastikan tabel <b>loker</b> di database <b>educenter_db</b> sudah terisi!</div>
    <?php endif; ?>

    <!-- Daftar Lowongan -->
    <div class="section-header">
      <div class="section-badge">📋 Daftar Lowongan</div>
      <h2 class="section-title">Posisi yang <span class="highlight">Tersedia</span></h2>
    </div>

    <div class="loker-grid">
      <?php foreach ($lowongan as $index => $job): ?>
      <div class="loker-card" data-delay="<?php echo $index * 100; ?>">

        <div class="loker-header">
          <span style="font-size: 36px;"><?php echo $job['icon']; ?></span>
          <span class="loker-badge <?php echo $job['status']; ?>">
            <?php echo $job['status'] === 'open' ? '✅ Dibuka' : '❌ Ditutup'; ?>
          </span>
        </div>

        <h3><?php echo htmlspecialchars($job['posisi']); ?></h3>

        <div class="loker-meta">
          <span class="loker-tag">📁 <?php echo htmlspecialchars($job['tipe']); ?></span>
          <span class="loker-tag">📍 <?php echo htmlspecialchars($job['lokasi']); ?></span>
          <span class="loker-tag">💰 <?php echo htmlspecialchars($job['gaji']); ?></span>
          <span class="loker-tag">📅 s/d <?php echo htmlspecialchars($job['deadline']); ?></span>
        </div>

        <p><?php echo htmlspecialchars($job['deskripsi']); ?></p>

        <!-- Kualifikasi -->
        <ul class="card-features" style="margin-bottom: 20px;">
          <?php foreach ($job['kualifikasi'] as $syarat): ?>
            <li>• <?php echo htmlspecialchars($syarat); ?></li>
          <?php endforeach; ?>
        </ul>

        <?php if ($job['status'] === 'open'): ?>
          <a href="https://wa.me/6281234567890?text=Halo%2C+saya+ingin+melamar+posisi+<?php echo urlencode($job['posisi']); ?>+di+EDUCENTER"
             class="btn btn-primary" style="font-size:13px; padding:10px 18px;" target="_blank">
            💬 Lamar Sekarang
          </a>
        <?php else: ?>
          <button class="btn" style="background:#eee; color:#999; cursor:not-allowed; font-size:13px; padding:10px 18px;" disabled>
            ❌ Lowongan Ditutup
          </button>
        <?php endif; ?>

      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- Tips Melamar -->
<section class="why-us" style="padding-top: 0;">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">💡 Tips Melamar</div>
      <h2 class="section-title">Cara <span class="highlight">Melamar Kerja</span> di EDUCENTER</h2>
    </div>
    <div class="why-features" style="max-width:680px; margin:0 auto;">
      <?php
        $tips = [
          ['icon'=>'📄','title'=>'Siapkan CV Terbaru',          'desc'=>'Buat CV yang jelas, lengkap, dan menampilkan pengalaman relevan di bidang pendidikan.'],
          ['icon'=>'💬','title'=>'Kirim via WhatsApp',          'desc'=>'Kirimkan CV dan posisi yang dilamar ke nomor WhatsApp kami. Kami akan merespons dalam 1x24 jam.'],
          ['icon'=>'🗓️','title'=>'Ikuti Proses Seleksi',       'desc'=>'Pelamar yang lolos administrasi akan dihubungi untuk wawancara dan microteaching (khusus guru).'],
          ['icon'=>'🎉','title'=>'Bergabunglah dengan Tim Kami','desc'=>'Jika lolos seleksi, Anda akan mendapatkan pelatihan onboarding sebelum mulai mengajar.'],
        ];
        foreach ($tips as $t):
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
      <div class="cta-shapes"><span>💼</span><span>🌟</span><span>👩‍🏫</span></div>
      <h2>Jadilah Bagian dari EDUCENTER!</h2>
      <p>Kirimkan lamaran Anda sekarang dan wujudkan passion Anda di dunia pendidikan bersama kami.</p>
      <div class="cta-buttons">
        <a href="https://wa.me/6281234567890" class="btn btn-white">💬 Kirim Lamaran</a>
        <a href="index.php" class="btn btn-outline-white">← Kembali ke Home</a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
