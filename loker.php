<?php
/**
 * PHP: Halaman Info Loker (Lowongan Kerja)
 * Menampilkan daftar lowongan pekerjaan yang tersedia di EDUCENTER.
 * Data lowongan dikelola melalui array PHP sehingga mudah diperbarui.
 */

$current_page = 'loker';
$page_title   = 'Info Loker – EDUCENTER';

include 'includes/header.php';
include 'includes/navbar.php';

/**
 * PHP: Data lowongan kerja disimpan dalam array asosiatif.
 * Dalam pengembangan lebih lanjut, data ini bisa diambil dari database MySQL.
 * Format: status 'open' = masih menerima, 'close' = sudah ditutup.
 */
$lowongan = [
  [
    'posisi'    => 'Guru Preschool / PAUD',
    'tipe'      => 'Full-Time',
    'lokasi'    => 'On-site',
    'gaji'      => 'Nego',
    'status'    => 'open',
    'deadline'  => '30 Mei 2025',
    'icon'      => '👩‍🏫',
    'deskripsi' => 'Kami mencari guru PAUD yang berdedikasi, kreatif, dan mencintai anak-anak untuk bergabung dalam tim pengajar SS Preschool kami.',
    'kualifikasi' => ['Minimal D3/S1 PAUD atau keguruan', 'Berpengalaman min. 1 tahun mengajar anak usia dini', 'Sabar, kreatif, dan berkomunikasi baik', 'Bersedia mengikuti pelatihan internal'],
  ],
  [
    'posisi'    => 'Tentor Private (Semua Mapel)',
    'tipe'      => 'Part-Time / Freelance',
    'lokasi'    => 'On-site / Online',
    'gaji'      => 'Per Sesi',
    'status'    => 'open',
    'deadline'  => '15 Juni 2025',
    'icon'      => '📖',
    'deskripsi' => 'Dibutuhkan tentor private untuk berbagai mata pelajaran SD, SMP, dan SMA. Jadwal fleksibel dan bisa online maupun tatap muka.',
    'kualifikasi' => ['Mahasiswa aktif atau lulusan S1 semua jurusan', 'Menguasai minimal satu bidang studi', 'Komunikatif dan sabar dalam mengajar', 'Memiliki kendaraan pribadi (untuk on-site)'],
  ],
  [
    'posisi'    => 'Pengajar Bimba (Bimbingan Membaca)',
    'tipe'      => 'Part-Time',
    'lokasi'    => 'On-site',
    'gaji'      => 'Kompetitif',
    'status'    => 'open',
    'deadline'  => '20 Mei 2025',
    'icon'      => '🔤',
    'deskripsi' => 'Dibutuhkan pengajar khusus bimbingan membaca untuk anak usia 3–7 tahun. Akan diberikan pelatihan metode Bimba secara lengkap.',
    'kualifikasi' => ['Minimal SMA/SMK sederajat', 'Menyukai anak-anak usia dini', 'Sabar dan kreatif', 'Diutamakan berpengalaman di bidang PAUD'],
  ],
  [
    'posisi'    => 'Admin & Keuangan',
    'tipe'      => 'Full-Time',
    'lokasi'    => 'On-site',
    'gaji'      => 'Nego',
    'status'    => 'open',
    'deadline'  => '1 Juni 2025',
    'icon'      => '💼',
    'deskripsi' => 'Kami membutuhkan staf administrasi dan keuangan yang teliti, ramah, dan mampu bekerja secara multitasking di lingkungan pendidikan.',
    'kualifikasi' => ['D3/S1 Akuntansi, Manajemen, atau Administrasi', 'Menguasai Microsoft Office (Word, Excel)', 'Teliti, rapi, dan bertanggung jawab', 'Pengalaman di lembaga pendidikan menjadi nilai plus'],
  ],
  [
    'posisi'    => 'Desainer Grafis & Media Sosial',
    'tipe'      => 'Part-Time / Remote',
    'lokasi'    => 'Remote',
    'gaji'      => 'Per Proyek',
    'status'    => 'close',
    'deadline'  => '30 April 2025',
    'icon'      => '🎨',
    'deskripsi' => 'Posisi ini sudah ditutup. Pantau terus halaman ini untuk info lowongan terbaru dari EDUCENTER.',
    'kualifikasi' => ['S1 Desain Komunikasi Visual atau sederajat', 'Menguasai Adobe Photoshop, Illustrator, atau Canva Pro', 'Portofolio desain yang menarik'],
  ],
];
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
        $open  = count(array_filter($lowongan, fn($l) => $l['status'] === 'open'));
        $close = count(array_filter($lowongan, fn($l) => $l['status'] === 'close'));
      ?>
      <div class="stat-item">
        <span class="stat-number" style="color: #1a7a1a;"><?php echo $open; ?></span>
        <span class="stat-label">Lowongan Aktif</span>
      </div>
      <div class="stat-divider"></div>
      <div class="stat-item">
        <span class="stat-number"><?php echo count($lowongan); ?></span>
        <span class="stat-label">Total Posisi</span>
      </div>
      <div class="stat-divider"></div>
      <div class="stat-item">
        <span class="stat-number"><?php echo $close; ?></span>
        <span class="stat-label">Sudah Ditutup</span>
      </div>
    </div>

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
