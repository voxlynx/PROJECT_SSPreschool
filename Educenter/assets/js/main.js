/**
 * JS UTAMA - EDUCENTER
 * File ini mengelola semua interaksi dan perilaku dinamis pada website:
 * - Custom cursor mengikuti gerakan mouse
 * - Navbar scroll effect (sticky + shadow)
 * - Hamburger menu toggle untuk mobile
 * - Testimonial slider otomatis dengan dot navigation
 * - Counter animasi untuk statistik hero
 * - Scroll-reveal animasi saat elemen masuk viewport
 * - Efek ripple saat tombol diklik
 * - Floating shapes interaktif
 */

document.addEventListener('DOMContentLoaded', () => {

  /* ============================================
     1. CUSTOM CURSOR
     ============================================ */
  const cursor = document.getElementById('customCursor');

  if (cursor && window.innerWidth > 768) {
    document.addEventListener('mousemove', (e) => {
      // Menggerakkan cursor mengikuti posisi mouse
      cursor.style.left = e.clientX + 'px';
      cursor.style.top  = e.clientY  + 'px';
    });

    // Efek klik: cursor membesar sementara
    document.addEventListener('mousedown', () => {
      cursor.style.transform = 'translate(-50%, -50%) scale(2)';
      cursor.style.opacity   = '0.5';
    });

    document.addEventListener('mouseup', () => {
      cursor.style.transform = 'translate(-50%, -50%) scale(1)';
      cursor.style.opacity   = '1';
    });

    // Hover pada elemen interaktif: kursor berubah gaya
    document.querySelectorAll('a, button, .program-card, .loker-card').forEach(el => {
      el.addEventListener('mouseenter', () => {
        cursor.style.transform  = 'translate(-50%, -50%) scale(1.8)';
        cursor.style.color      = '#406aaf';
      });
      el.addEventListener('mouseleave', () => {
        cursor.style.transform  = 'translate(-50%, -50%) scale(1)';
        cursor.style.color      = '';
      });
    });
  }

  /* ============================================
     2. NAVBAR: SCROLL EFFECT
     ============================================ */
  const header = document.getElementById('siteHeader');

  if (header) {
    const onScroll = () => {
      // Menambah class 'scrolled' ketika halaman di-scroll > 60px
      if (window.scrollY > 60) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ============================================
     3. HAMBURGER MENU TOGGLE (Mobile)
     ============================================ */
  const hamburger  = document.getElementById('hamburgerBtn');
  const navLinks   = document.getElementById('navLinks');
  const navOverlay = document.getElementById('navOverlay');

  const openMenu = () => {
    navLinks.classList.add('open');
    navOverlay.classList.add('visible');
    hamburger.classList.add('open');
    hamburger.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden'; // Mencegah scroll saat menu terbuka
  };

  const closeMenu = () => {
    navLinks.classList.remove('open');
    navOverlay.classList.remove('visible');
    hamburger.classList.remove('open');
    hamburger.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  };

  if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
      const isOpen = navLinks.classList.contains('open');
      isOpen ? closeMenu() : openMenu();
    });

    // Tutup menu saat overlay diklik
    navOverlay.addEventListener('click', closeMenu);

    // Tutup menu saat link diklik
    navLinks.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', closeMenu);
    });

    // Tutup menu saat Escape ditekan
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeMenu();
    });
  }

  /* ============================================
     4. TESTIMONIAL SLIDER
     ============================================ */
  const track  = document.getElementById('testiTrack');
  const dots   = document.querySelectorAll('.dot');
  let current  = 0;
  let autoSlide;

  const goToSlide = (index) => {
    if (!track) return;
    current = index;
    // Geser track sesuai indeks
    track.style.transform = `translateX(-${current * 100}%)`;
    // Update dot aktif
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
  };

  const nextSlide = () => {
    const total = dots.length;
    goToSlide((current + 1) % total);
  };

  // Autoplay slider setiap 4 detik
  if (track && dots.length) {
    autoSlide = setInterval(nextSlide, 4000);

    // Klik dot manual
    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        clearInterval(autoSlide);
        goToSlide(i);
        autoSlide = setInterval(nextSlide, 4000); // Reset timer
      });
    });

    // Swipe gesture untuk mobile
    let touchStartX = 0;
    track.addEventListener('touchstart', (e) => {
      touchStartX = e.touches[0].clientX;
    }, { passive: true });

    track.addEventListener('touchend', (e) => {
      const diff = touchStartX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) {
        clearInterval(autoSlide);
        diff > 0 ? nextSlide() : goToSlide((current - 1 + dots.length) % dots.length);
        autoSlide = setInterval(nextSlide, 4000);
      }
    });
  }

  /* ============================================
     5. COUNTER ANIMASI (Statistik Hero)
     ============================================ */
  const counters = document.querySelectorAll('.stat-number');

  const animateCounter = (el) => {
    const target   = parseInt(el.getAttribute('data-target'), 10);
    const duration = 1800; // ms
    const step     = target / (duration / 16); // ~60fps
    let current    = 0;

    const update = () => {
      current += step;
      if (current < target) {
        el.textContent = Math.floor(current);
        requestAnimationFrame(update);
      } else {
        el.textContent = target; // Pastikan nilai akhir tepat
      }
    };

    update();
  };

  // Gunakan IntersectionObserver agar counter mulai saat terlihat
  if ('IntersectionObserver' in window && counters.length) {
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target); // Jalankan sekali saja
        }
      });
    }, { threshold: 0.5 });

    counters.forEach(c => counterObserver.observe(c));
  }

  /* ============================================
     6. SCROLL-REVEAL ANIMASI
     ============================================ */
  // Tambahkan class .reveal ke elemen yang ingin dianimasikan
  const revealElements = document.querySelectorAll(
    '.program-card, .why-item, .loker-card, .section-header, .testi-card'
  );

  revealElements.forEach(el => el.classList.add('reveal'));

  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          // Delay bertahap untuk efek stagger
          const delay = entry.target.getAttribute('data-delay') || (i * 100);
          setTimeout(() => {
            entry.target.classList.add('visible');
          }, parseInt(delay));
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    revealElements.forEach(el => revealObserver.observe(el));
  } else {
    // Fallback: langsung tampilkan semua
    revealElements.forEach(el => el.classList.add('visible'));
  }

  /* ============================================
     7. RIPPLE EFFECT pada Tombol
     ============================================ */
  document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('click', function (e) {
      const ripple = document.createElement('span');
      const rect   = btn.getBoundingClientRect();

      const size = Math.max(rect.width, rect.height);
      const x    = e.clientX - rect.left - size / 2;
      const y    = e.clientY - rect.top  - size / 2;

      Object.assign(ripple.style, {
        position:     'absolute',
        width:        size + 'px',
        height:       size + 'px',
        left:         x + 'px',
        top:          y + 'px',
        background:   'rgba(255,255,255,0.35)',
        borderRadius: '50%',
        transform:    'scale(0)',
        animation:    'ripple 0.55s linear',
        pointerEvents:'none'
      });

      // Pastikan tombol punya position: relative
      btn.style.position = 'relative';
      btn.style.overflow = 'hidden';

      btn.appendChild(ripple);
      ripple.addEventListener('animationend', () => ripple.remove());
    });
  });

  // Tambahkan keyframe ripple via JS (sekali saja)
  if (!document.getElementById('rippleStyle')) {
    const style = document.createElement('style');
    style.id = 'rippleStyle';
    style.textContent = `
      @keyframes ripple {
        to { transform: scale(3); opacity: 0; }
      }
    `;
    document.head.appendChild(style);
  }

  /* ============================================
     8. SMOOTH ANCHOR SCROLL
     ============================================ */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 80; // Tinggi navbar
        const top    = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ============================================
     9. ACTIVE NAV HIGHLIGHT saat Scroll
     ============================================ */
  const sections  = document.querySelectorAll('section[id]');
  const navAnchors = document.querySelectorAll('.nav-link[href*="#"]');

  if (sections.length && navAnchors.length) {
    window.addEventListener('scroll', () => {
      let current = '';
      sections.forEach(section => {
        if (window.scrollY >= section.offsetTop - 100) {
          current = section.getAttribute('id');
        }
      });

      navAnchors.forEach(a => {
        a.classList.remove('active');
        if (a.getAttribute('href').includes(current)) {
          a.classList.add('active');
        }
      });
    }, { passive: true });
  }

}); // end DOMContentLoaded
