/**
 * ADMIN.JS – EDUCENTER Panel Admin
 * JS: Mengelola semua interaksi di halaman admin:
 * - Toggle sidebar pada layar mobile (hamburger)
 * - Modal konfirmasi hapus data
 * - Countdown timer sisa waktu sesi
 * - Auto-refresh peringatan session hampir habis
 * - Highlight radio button saat dipilih
 * - Flash message auto-hide
 */

document.addEventListener('DOMContentLoaded', () => {

  /* ============================================
     1. SIDEBAR TOGGLE (Mobile)
     ============================================ */
  const sidebarToggle  = document.getElementById('sidebarToggle');
  const adminSidebar   = document.getElementById('adminSidebar');
  const sidebarOverlay = document.getElementById('sidebarOverlay');

  const openSidebar = () => {
    adminSidebar?.classList.add('open');
    sidebarOverlay?.classList.add('visible');
    document.body.style.overflow = 'hidden';
  };

  const closeSidebar = () => {
    adminSidebar?.classList.remove('open');
    sidebarOverlay?.classList.remove('visible');
    document.body.style.overflow = '';
  };

  sidebarToggle?.addEventListener('click', () => {
    adminSidebar?.classList.contains('open') ? closeSidebar() : openSidebar();
  });

  sidebarOverlay?.addEventListener('click', closeSidebar);

  // Tutup sidebar saat link diklik di mobile
  adminSidebar?.querySelectorAll('.sidebar-link').forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth <= 768) closeSidebar();
    });
  });

  /* ============================================
     2. MODAL KONFIRMASI HAPUS
     ============================================ */
  const deleteModal      = document.getElementById('deleteModal');
  const deleteTargetName = document.getElementById('deleteTargetName');
  const deleteTargetId   = document.getElementById('deleteTargetId');
  const cancelDelete     = document.getElementById('cancelDelete');

  // Buka modal saat tombol hapus diklik
  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', () => {
      const id     = btn.getAttribute('data-id');
      const posisi = btn.getAttribute('data-posisi');

      if (deleteTargetName) deleteTargetName.textContent = posisi;
      if (deleteTargetId)   deleteTargetId.value         = id;

      deleteModal?.classList.add('open');
    });
  });

  // Tutup modal
  const closeModal = () => deleteModal?.classList.remove('open');

  cancelDelete?.addEventListener('click', closeModal);

  // Klik di luar modal untuk menutup
  deleteModal?.addEventListener('click', (e) => {
    if (e.target === deleteModal) closeModal();
  });

  // Escape untuk menutup modal
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  /* ============================================
     3. SESSION COUNTDOWN TIMER
     ============================================ */
  const timerDisplay     = document.getElementById('timerDisplay');
  const sessionRemaining = document.getElementById('sessionRemaining');

  // Ambil nilai awal dari atribut PHP-rendered
  let minutesLeft = timerDisplay
    ? parseInt(timerDisplay.textContent, 10)
    : 30;

  let warned = false; // Flag untuk peringatan sekali saja

  const updateTimer = () => {
    minutesLeft = Math.max(0, minutesLeft - (1/60)); // Kurangi per detik
    const mins  = Math.floor(minutesLeft);
    const secs  = Math.floor((minutesLeft - mins) * 60);
    const display = `${mins}m ${String(secs).padStart(2,'0')}s`;

    if (timerDisplay)     timerDisplay.textContent     = display;
    if (sessionRemaining) sessionRemaining.textContent = display;

    // Warna berubah merah saat < 5 menit
    if (minutesLeft < 5) {
      if (timerDisplay) timerDisplay.style.color = '#ef4444';

      // Tampilkan peringatan popup sekali saja
      if (!warned && minutesLeft <= 5) {
        warned = true;
        showSessionWarning(mins);
      }
    }

    // Session habis: redirect ke login
    if (minutesLeft <= 0) {
      clearInterval(timerInterval);
      alert('⏰ Sesi Anda telah berakhir. Anda akan diarahkan ke halaman login.');
      window.location.href = 'login.php?reason=session';
    }
  };

  // Jalankan countdown setiap detik
  const timerInterval = setInterval(updateTimer, 1000);

  // Perbarui aktivitas ke server setiap 5 menit (AJAX ping)
  setInterval(() => {
    // Reset countdown lokal
    minutesLeft = 30;
    fetch('ping.php', { method: 'POST' }).catch(() => {});
  }, 5 * 60 * 1000);

  /* ============================================
     4. PERINGATAN SESSION HAMPIR HABIS
     ============================================ */
  const showSessionWarning = (minsLeft) => {
    const banner = document.createElement('div');
    banner.id = 'sessionWarning';
    Object.assign(banner.style, {
      position: 'fixed',
      bottom:   '24px',
      right:    '24px',
      background: '#fef3c7',
      border:   '1.5px solid #fde68a',
      borderRadius: '12px',
      padding:  '16px 20px',
      zIndex:   '9999',
      maxWidth: '320px',
      boxShadow: '0 8px 24px rgba(0,0,0,0.12)',
      fontFamily: "'Nunito', sans-serif",
      fontSize: '14px',
      color:    '#92400e',
      fontWeight: '600',
      animation: 'slideUpBanner 0.4s ease forwards',
    });

    banner.innerHTML = `
      <strong>⏰ Sesi hampir berakhir!</strong><br>
      Sesi Anda akan habis dalam <strong>${minsLeft} menit</strong>.
      <br><button onclick="fetch('ping.php',{method:'POST'}).then(()=>{
        document.getElementById('sessionWarning')?.remove();
        window.minutesLeft = 30;
      })" style="margin-top:10px; padding:6px 14px; background:#406aaf; color:#fff; border:none; border-radius:50px; cursor:pointer; font-weight:700; font-family:inherit;">
        Perpanjang Sesi
      </button>
    `;

    // Tambah keyframe animasi
    if (!document.getElementById('bannerStyle')) {
      const s = document.createElement('style');
      s.id = 'bannerStyle';
      s.textContent = '@keyframes slideUpBanner { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }';
      document.head.appendChild(s);
    }

    document.body.appendChild(banner);

    // Auto-hilang setelah 10 detik
    setTimeout(() => banner.remove(), 10000);
  };

  /* ============================================
     5. RADIO BUTTON VISUAL HIGHLIGHT
     ============================================ */
  document.querySelectorAll('.radio-label input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', () => {
      // Hapus class active dari semua label dalam grup yang sama
      const name = radio.getAttribute('name');
      document.querySelectorAll(`input[name="${name}"]`).forEach(r => {
        r.closest('.radio-label')?.classList.remove('radio-active');
      });
      // Tambahkan ke yang dipilih
      radio.closest('.radio-label')?.classList.add('radio-active');
    });
  });

  /* ============================================
     6. FLASH MESSAGE AUTO-HIDE
     ============================================ */
  const flashMsg = document.getElementById('flashMsg');
  if (flashMsg) {
    setTimeout(() => {
      flashMsg.style.transition = 'opacity 0.5s ease';
      flashMsg.style.opacity    = '0';
      setTimeout(() => flashMsg.remove(), 500);
    }, 4000); // Hilang setelah 4 detik
  }

  /* ============================================
     7. TOGGLE PASSWORD (Login Page)
     ============================================ */
  const togglePass = document.getElementById('togglePass');
  const passInput  = document.getElementById('password');

  togglePass?.addEventListener('click', () => {
    const show    = passInput.type === 'password';
    passInput.type           = show ? 'text' : 'password';
    togglePass.textContent   = show ? '🙈' : '👁️';
  });

}); // end DOMContentLoaded
