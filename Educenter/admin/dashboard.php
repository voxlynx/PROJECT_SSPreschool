<?php
/**
 * DASHBOARD.PHP
 * PHP: Halaman utama panel admin.
 * Menampilkan ringkasan statistik dan aktivitas terbaru.
 */

require_once 'config.php';
requireLogin(); // Wajib login — redirect ke login.php jika tidak

$admin_page = 'dashboard';
$page_title = 'Dashboard';

// ── Ambil Statistik ────────────────────────────────────────────────────────
try {
    $db = getDB();

    $total_loker  = $db->query("SELECT COUNT(*) FROM loker")->fetchColumn();
    $loker_open   = $db->query("SELECT COUNT(*) FROM loker WHERE status = 'open'")->fetchColumn();
    $loker_close  = $db->query("SELECT COUNT(*) FROM loker WHERE status = 'close'")->fetchColumn();

    // Loker terbaru (5 terakhir)
    $recent = $db->query("SELECT * FROM loker ORDER BY created_at DESC LIMIT 5")->fetchAll();

    // Loker yang deadline-nya dalam 7 hari ke depan
    $soon_expire = $db->query(
        "SELECT * FROM loker WHERE status = 'open' AND deadline BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY) ORDER BY deadline ASC"
    )->fetchAll();

} catch (PDOException $e) {
    $total_loker = $loker_open = $loker_close = 0;
    $recent = $soon_expire = [];
}

include 'includes/admin_header.php';
?>

<!-- Stats Cards -->
<div class="stats-grid">
  <div class="stat-card stat-blue">
    <div class="stat-card-icon">💼</div>
    <div class="stat-card-info">
      <div class="stat-card-num"><?php echo $total_loker; ?></div>
      <div class="stat-card-label">Total Lowongan</div>
    </div>
  </div>
  <div class="stat-card stat-green">
    <div class="stat-card-icon">✅</div>
    <div class="stat-card-info">
      <div class="stat-card-num"><?php echo $loker_open; ?></div>
      <div class="stat-card-label">Lowongan Aktif</div>
    </div>
  </div>
  <div class="stat-card stat-red">
    <div class="stat-card-icon">❌</div>
    <div class="stat-card-info">
      <div class="stat-card-num"><?php echo $loker_close; ?></div>
      <div class="stat-card-label">Lowongan Ditutup</div>
    </div>
  </div>
  <div class="stat-card stat-yellow">
    <div class="stat-card-icon">⏰</div>
    <div class="stat-card-info">
      <div class="stat-card-num"><?php echo count($soon_expire); ?></div>
      <div class="stat-card-label">Hampir Deadline</div>
    </div>
  </div>
</div>

<div class="dashboard-grid">

  <!-- Tabel Loker Terbaru -->
  <div class="admin-card">
    <div class="card-header">
      <h3>📋 Lowongan Terbaru</h3>
      <a href="loker.php" class="btn-sm btn-primary-sm">Lihat Semua</a>
    </div>
    <?php if (empty($recent)): ?>
      <div class="empty-state">Belum ada data lowongan.</div>
    <?php else: ?>
    <div class="table-wrap">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Posisi</th>
            <th>Tipe</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recent as $row): ?>
          <tr>
            <td>
              <span style="margin-right:6px;"><?php echo e($row['icon']); ?></span>
              <strong><?php echo e($row['posisi']); ?></strong>
            </td>
            <td><span class="tag"><?php echo e($row['tipe']); ?></span></td>
            <td><?php echo date('d M Y', strtotime($row['deadline'])); ?></td>
            <td>
              <span class="status-badge <?php echo $row['status'] === 'open' ? 'badge-open' : 'badge-close'; ?>">
                <?php echo $row['status'] === 'open' ? '✅ Aktif' : '❌ Tutup'; ?>
              </span>
            </td>
            <td>
              <a href="loker_edit.php?id=<?php echo $row['id']; ?>" class="btn-icon" title="Edit">✏️</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php endif; ?>
  </div>

  <!-- Hampir Deadline -->
  <div class="admin-card">
    <div class="card-header">
      <h3>⏰ Hampir Deadline (7 Hari)</h3>
    </div>
    <?php if (empty($soon_expire)): ?>
      <div class="empty-state">✅ Tidak ada lowongan yang hampir deadline.</div>
    <?php else: ?>
      <?php foreach ($soon_expire as $row): ?>
      <div class="deadline-item">
        <div class="deadline-icon"><?php echo e($row['icon']); ?></div>
        <div class="deadline-info">
          <strong><?php echo e($row['posisi']); ?></strong>
          <span>Deadline: <?php echo date('d M Y', strtotime($row['deadline'])); ?></span>
        </div>
        <a href="loker_edit.php?id=<?php echo $row['id']; ?>" class="btn-icon" title="Edit">✏️</a>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <!-- Quick Actions -->
    <div class="card-header" style="margin-top:24px; padding-top:24px; border-top:1px solid #eef2f8;">
      <h3>⚡ Aksi Cepat</h3>
    </div>
    <div class="quick-actions">
      <a href="loker_add.php" class="quick-btn">
        <span>➕</span> Tambah Loker
      </a>
      <a href="loker.php" class="quick-btn">
        <span>📋</span> Kelola Loker
      </a>
      <a href="profile.php" class="quick-btn">
        <span>🔐</span> Ganti Password
      </a>
      <a href="../index.php" class="quick-btn" target="_blank">
        <span>🌐</span> Lihat Website
      </a>
    </div>
  </div>

</div><!-- end .dashboard-grid -->

<!-- Info Login -->
<div class="admin-card" style="margin-top:0;">
  <div class="card-header">
    <h3>🔐 Info Sesi</h3>
  </div>
  <div class="session-info-grid">
    <div class="session-info-item">
      <span class="si-label">Login sebagai</span>
      <span class="si-value"><?php echo e($_SESSION['admin_nama']); ?></span>
    </div>
    <div class="session-info-item">
      <span class="si-label">Waktu login</span>
      <span class="si-value"><?php echo date('d M Y, H:i', $_SESSION['login_time'] ?? time()); ?> WIB</span>
    </div>
    <div class="session-info-item">
      <span class="si-label">Sisa sesi</span>
      <span class="si-value" id="sessionRemaining"><?php echo sessionTimeLeft(); ?> menit</span>
    </div>
    <div class="session-info-item">
      <span class="si-label">Timeout otomatis</span>
      <span class="si-value">30 menit tidak aktif</span>
    </div>
  </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
