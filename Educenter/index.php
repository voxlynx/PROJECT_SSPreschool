<?php
/**
 * EDUCENTER - Halaman Utama (Home)
 * PHP digunakan sebagai template engine untuk memisahkan komponen UI
 * seperti header, navbar, footer agar mudah di-reuse di setiap halaman.
 */

$current_page = 'home'; // Variabel untuk menandai menu aktif di navbar
$page_title   = 'EDUCENTER – Pusat Belajar Terbaik untuk Si Kecil';

include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- ===== HERO SECTION ===== -->
<section class="hero" id="hero">
  <div class="hero-bg-shapes">
    <span class="shape shape-circle c1"></span>
    <span class="shape shape-circle c2"></span>
    <span class="shape shape-star s1">★</span>
    <span class="shape shape-star s2">✦</span>
    <span class="shape shape-star s3">◆</span>
  </div>

  <div class="hero-content">
    <div class="hero-badge bounce-in">🎓 Selamat Datang di EDUCENTER</div>
    <h1 class="hero-title slide-up">
      Tempat Belajar<br>
      <span class="highlight">Menyenangkan</span><br>
      untuk Si Kecil
    </h1>
    <p class="hero-subtitle slide-up delay-1">
      Kami hadir untuk mendampingi tumbuh kembang anak melalui program
      preschool, private class, dan bimbingan membaca yang penuh semangat & kasih sayang.
    </p>
    <div class="hero-cta slide-up delay-2">
      <a href="preschool.php" class="btn btn-primary">🏫 Lihat Program Kami</a>
      <a href="#programs" class="btn btn-outline">Pelajari Lebih Lanjut</a>
    </div>
    <div class="hero-stats slide-up delay-3">
      <div class="stat-item">
        <span class="stat-number" data-target="200">0</span><span>+</span>
        <span class="stat-label">Siswa Aktif</span>
      </div>
      <div class="stat-divider"></div>
      <div class="stat-item">
        <span class="stat-number" data-target="5">0</span><span>+</span>
        <span class="stat-label">Tahun Pengalaman</span>
      </div>
      <div class="stat-divider"></div>
      <div class="stat-item">
        <span class="stat-number" data-target="15">0</span><span>+</span>
        <span class="stat-label">Tenaga Pengajar</span>
      </div>
    </div>
  </div>

  <div class="hero-illustration slide-right">
    <div class="illustration-card">
      <div class="illus-icon">📚</div>
      <p>Belajar Bersama</p>
    </div>
    <div class="illustration-main">
      <div class="mascot">
        <div class="mascot-head">🦁</div>
        <div class="mascot-body">
          <div class="star-burst">⭐</div>
        </div>
      </div>
    </div>
    <div class="illustration-card card-bottom">
      <div class="illus-icon">🎨</div>
      <p>Kreativitas Anak</p>
    </div>
  </div>
</section>

<!-- ===== PROGRAM SECTION ===== -->
<section class="programs" id="programs">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">📋 Program Unggulan</div>
      <h2 class="section-title">Pilihan Program <span class="highlight">Terbaik</span> Kami</h2>
      <p class="section-desc">Setiap program dirancang khusus sesuai usia dan kebutuhan perkembangan anak</p>
    </div>

    <div class="programs-grid">
      <!-- Card 1 -->
      <div class="program-card" data-aos="fade-up" data-delay="0">
        <div class="card-icon-wrap icon-blue">
          <span class="card-icon">🏫</span>
        </div>
        <h3>SS Preschool</h3>
        <p>Program prasekolah holistik yang membangun fondasi kuat untuk tumbuh kembang anak usia dini.</p>
        <ul class="card-features">
          <li>✅ Kurikulum berbasis play-based learning</li>
          <li>✅ Guru berpengalaman & bersertifikat</li>
          <li>✅ Rasio guru : murid ideal</li>
        </ul>
        <a href="preschool.php" class="card-link">Selengkapnya →</a>
      </div>

      <!-- Card 2 -->
      <div class="program-card featured" data-aos="fade-up" data-delay="150">
        <div class="featured-badge">⭐ Populer</div>
        <div class="card-icon-wrap icon-yellow">
          <span class="card-icon">📖</span>
        </div>
        <h3>Private Class</h3>
        <p>Kelas privat satu-satu dengan pengajar berpengalaman, fokus pada kebutuhan belajar individu anak.</p>
        <ul class="card-features">
          <li>✅ Jadwal fleksibel sesuai kebutuhan</li>
          <li>✅ Materi disesuaikan per siswa</li>
          <li>✅ Progress report berkala</li>
        </ul>
        <a href="private.php" class="card-link">Selengkapnya →</a>
      </div>

      <!-- Card 3 -->
      <div class="program-card" data-aos="fade-up" data-delay="300">
        <div class="card-icon-wrap icon-blue">
          <span class="card-icon">🔤</span>
        </div>
        <h3>Bimba</h3>
        <p>Program bimbingan membaca inovatif yang membuat anak jatuh cinta dengan dunia literasi sejak dini.</p>
        <ul class="card-features">
          <li>✅ Metode belajar membaca yang menyenangkan</li>
          <li>✅ Cocok untuk usia 3–7 tahun</li>
          <li>✅ Terbukti efektif & cepat</li>
        </ul>
        <a href="bimba.php" class="card-link">Selengkapnya →</a>
      </div>
    </div>
  </div>
</section>

<!-- ===== WHY US SECTION ===== -->
<section class="why-us">
  <div class="container">
    <div class="why-grid">
      <div class="why-image">
        <div class="why-image-inner">
          <div class="big-emoji">🌟</div>
          <div class="why-badge-float">
            <span>🏆</span> Terpercaya sejak 2019
          </div>
        </div>
      </div>
      <div class="why-content">
        <div class="section-badge">💡 Mengapa Kami?</div>
        <h2 class="section-title">Lebih dari Sekedar <span class="highlight">Les Biasa</span></h2>
        <p>EDUCENTER hadir dengan pendekatan holistik — kami tidak hanya mengajar, tapi membentuk karakter dan rasa ingin tahu anak yang akan bertahan seumur hidup.</p>
        <div class="why-features">
          <div class="why-item">
            <div class="why-icon">👩‍🏫</div>
            <div>
              <h4>Pengajar Profesional</h4>
              <p>Semua guru terlatih dan berpengalaman di bidang pendidikan anak usia dini.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-icon">🌈</div>
            <div>
              <h4>Metode Menyenangkan</h4>
              <p>Belajar sambil bermain membuat anak lebih mudah menyerap materi pelajaran.</p>
            </div>
          </div>
          <div class="why-item">
            <div class="why-icon">📊</div>
            <div>
              <h4>Pantau Perkembangan</h4>
              <p>Orang tua dapat memantau progress belajar anak secara berkala dan transparan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== TESTIMONIAL SECTION ===== -->
<section class="testimonials">
  <div class="container">
    <div class="section-header">
      <div class="section-badge">💬 Testimoni</div>
      <h2 class="section-title">Kata Orang Tua <span class="highlight">Murid Kami</span></h2>
    </div>
    <div class="testimonial-slider" id="testimonialSlider">
      <div class="testi-track" id="testiTrack">
        <div class="testi-card">
          <div class="testi-stars">⭐⭐⭐⭐⭐</div>
          <p>"Anak saya yang tadinya susah fokus, sekarang jadi lebih semangat belajar setelah ikut program di EDUCENTER. Terima kasih banyak!"</p>
          <div class="testi-author">
            <div class="testi-avatar">👩</div>
            <div>
              <strong>Ibu Rani</strong>
              <span>Orang tua murid SS Preschool</span>
            </div>
          </div>
        </div>
        <div class="testi-card">
          <div class="testi-stars">⭐⭐⭐⭐⭐</div>
          <p>"Private class di sini luar biasa! Gurunya sabar, materi disesuaikan dengan kebutuhan anak, nilai rapot anak saya meningkat drastis."</p>
          <div class="testi-author">
            <div class="testi-avatar">👨</div>
            <div>
              <strong>Pak Budi</strong>
              <span>Orang tua murid Private Class</span>
            </div>
          </div>
        </div>
        <div class="testi-card">
          <div class="testi-stars">⭐⭐⭐⭐⭐</div>
          <p>"Setelah ikut Bimba, anak saya yang berumur 5 tahun sudah bisa membaca sendiri. Metodenyabenar-benar efektif dan tidak membosankan!"</p>
          <div class="testi-author">
            <div class="testi-avatar">👩</div>
            <div>
              <strong>Ibu Dewi</strong>
              <span>Orang tua murid Bimba</span>
            </div>
          </div>
        </div>
      </div>
      <div class="testi-dots" id="testiDots">
        <span class="dot active" data-index="0"></span>
        <span class="dot" data-index="1"></span>
        <span class="dot" data-index="2"></span>
      </div>
    </div>
  </div>
</section>

<!-- ===== CTA SECTION ===== -->
<section class="cta-section">
  <div class="container">
    <div class="cta-box">
      <div class="cta-shapes">
        <span>🌟</span><span>📚</span><span>✏️</span>
      </div>
      <h2>Siap Daftar Sekarang?</h2>
      <p>Bergabunglah bersama ratusan keluarga yang sudah mempercayakan pendidikan anak mereka kepada EDUCENTER.</p>
      <div class="cta-buttons">
        <a href="preschool.php" class="btn btn-white">🏫 Lihat Program</a>
        <a href="loker.php" class="btn btn-outline-white">📋 Info Lowongan</a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
