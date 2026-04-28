<?php
/**
 * LOKER.PHP (Admin)
 * PHP: Halaman daftar semua lowongan kerja dengan fitur:
 * - Filter berdasarkan status (all / open / close)
 * - Pencarian berdasarkan nama posisi
 * - Hapus data dengan konfirmasi
 * - Toggle status open/close langsung dari tabel
 */

require_once 'config.php';
requireLogin();

$admin_page = 'loker';
$page_title = 'Kelola Info Loker';

$db = getDB();

// ── Handle POST Actions ─────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id     = (int)($_POST['id'] ?? 0);

    if ($id <= 0) redirect('loker.php', 'danger', 'ID tidak valid.');

    switch ($action) {

        case 'delete':
            // Hapus data loker
            $stmt = $db->prepare('DELETE FROM loker WHERE id = ?');
            $stmt->execute([$id]);
            redirect('loker.php', 'success', 'Lowongan berhasil dihapus.');
            break;

        case 'toggle_status':
            // Ubah status open ↔ close
            $stmt   = $db->prepare('SELECT status FROM loker WHERE id = ?');
            $stmt->execute([$id]);
            $current = $stmt->fetchColumn();
            $new     = ($current === 'open') ? 'close' : 'open';

            $db->prepare('UPDATE loker SET status = ? WHERE id = ?')->execute([$new, $id]);
            $label = $new === 'open' ? 'diaktifkan' : 'ditutup';
            redirect('loker.php', 'success', "Lowongan berhasil $label.");
            break;
    }
}

// ── Query dengan Filter & Search ────────────────────────────────────────────
$filter  = $_GET['status'] ?? 'all';
$search  = trim($_GET['q'] ?? '');
$params  = [];
$where   = [];

if ($filter === 'open')  { $where[] = "status = 'open'";  }
if ($filter === 'close') { $where[] = "status = 'close'"; }

if ($search !== '') {
    $where[]  = "posisi LIKE ?";
    $params[] = "%$search%";
}

$sql   = 'SELECT * FROM loker';
if ($where) $sql .= ' WHERE ' . implode(' AND ', $where);
$sql  .= ' ORDER BY created_at DESC';

$stmt  = $db->prepare($sql);
$stmt->execute($params);
$lokers = $stmt->fetchAll();

include 'includes/admin_header.php';
?>

<!-- Toolbar -->
<div class="admin-card" style="margin-bottom:20px;">
  <div class="toolbar">

    <!-- Search -->
    <form method="GET" action="loker.php" class="toolbar-search">
      <input
        type="text"
        name="q"
        class="form-input"
        placeholder="🔍 Cari posisi..."
        value="<?php echo e($search); ?>"
        style="width:240px;"
      >
      <input type="hidden" name="status" value="<?php echo e($filter); ?>">
      <button type="submit" class="btn-sm btn-primary-sm">Cari</button>
      <?php if ($search): ?>
        <a href="loker.php?status=<?php echo e($filter); ?>" class="btn-sm btn-ghost-sm">✕ Reset</a>
      <?php endif; ?>
    </form>

    <!-- Filter Tabs -->
    <div class="filter-tabs">
      <a href="loker.php?q=<?php echo urlencode($search); ?>"
         class="filter-tab <?php echo $filter === 'all'   ? 'active' : ''; ?>">Semua</a>
      <a href="loker.php?status=open&q=<?php echo urlencode($search); ?>"
         class="filter-tab <?php echo $filter === 'open'  ? 'active' : ''; ?>">✅ Aktif</a>
      <a href="loker.php?status=close&q=<?php echo urlencode($search); ?>"
         class="filter-tab <?php echo $filter === 'close' ? 'active' : ''; ?>">❌ Tutup</a>
    </div>

    <!-- Tambah -->
    <a href="loker_add.php" class="btn-sm btn-primary-sm">➕ Tambah Loker</a>

  </div>
</div>

<!-- Tabel -->
<div class="admin-card">
  <div class="card-header">
    <h3>💼 Daftar Lowongan (<?php echo count($lokers); ?> data)</h3>
  </div>

  <?php if (empty($lokers)): ?>
    <div class="empty-state">
      <div style="font-size:48px; margin-bottom:12px;">🗂️</div>
      <p>Belum ada lowongan<?php echo $search ? " dengan kata kunci \"$search\"" : ''; ?>.</p>
      <a href="loker_add.php" class="btn-sm btn-primary-sm" style="margin-top:12px;">➕ Tambah Sekarang</a>
    </div>
  <?php else: ?>
  <div class="table-wrap">
    <table class="admin-table">
      <thead>
        <tr>
          <th width="40">#</th>
          <th>Posisi</th>
          <th>Tipe</th>
          <th>Lokasi</th>
          <th>Deadline</th>
          <th>Status</th>
          <th width="140">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lokers as $i => $row):
          $isExpired = strtotime($row['deadline']) < strtotime('today');
        ?>
        <tr class="<?php echo $isExpired && $row['status'] === 'open' ? 'row-warning' : ''; ?>">
          <td style="color:var(--text-light);"><?php echo $i + 1; ?></td>
          <td>
            <span style="margin-right:6px; font-size:18px;"><?php echo e($row['icon']); ?></span>
            <strong><?php echo e($row['posisi']); ?></strong>
            <?php if ($isExpired && $row['status'] === 'open'): ?>
              <span class="tag tag-warning" style="margin-left:6px;">⚠️ Expired</span>
            <?php endif; ?>
          </td>
          <td><span class="tag"><?php echo e($row['tipe']); ?></span></td>
          <td><?php echo e($row['lokasi']); ?></td>
          <td>
            <span class="<?php echo $isExpired ? 'text-danger' : ''; ?>">
              <?php echo date('d M Y', strtotime($row['deadline'])); ?>
            </span>
          </td>
          <td>
            <!-- Toggle Status -->
            <form method="POST" action="loker.php" style="display:inline;">
              <input type="hidden" name="action" value="toggle_status">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit"
                class="status-toggle <?php echo $row['status'] === 'open' ? 'badge-open' : 'badge-close'; ?>"
                title="Klik untuk ubah status">
                <?php echo $row['status'] === 'open' ? '✅ Aktif' : '❌ Tutup'; ?>
              </button>
            </form>
          </td>
          <td>
            <div class="action-btns">
              <a href="loker_edit.php?id=<?php echo $row['id']; ?>"
                 class="btn-icon" title="Edit">✏️</a>

              <!-- Hapus dengan konfirmasi modal -->
              <button type="button"
                class="btn-icon btn-delete"
                title="Hapus"
                data-id="<?php echo $row['id']; ?>"
                data-posisi="<?php echo e($row['posisi']); ?>">
                🗑️
              </button>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal-overlay" id="deleteModal">
  <div class="modal-box">
    <div class="modal-icon">🗑️</div>
    <h3>Hapus Lowongan?</h3>
    <p>Apakah Anda yakin ingin menghapus lowongan <strong id="deleteTargetName"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
    <form method="POST" action="loker.php" id="deleteForm">
      <input type="hidden" name="action" value="delete">
      <input type="hidden" name="id" id="deleteTargetId">
      <div class="modal-actions">
        <button type="button" class="btn-sm btn-ghost-sm" id="cancelDelete">Batal</button>
        <button type="submit" class="btn-sm btn-danger-sm">Ya, Hapus</button>
      </div>
    </form>
  </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
