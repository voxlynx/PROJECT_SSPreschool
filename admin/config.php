<?php
/**
 * CONFIG.PHP
 * PHP: File konfigurasi utama untuk sistem admin EDUCENTER.
 * Berisi pengaturan database, session, dan konstanta aplikasi.
 * Di-include oleh semua file admin agar konfigurasi terpusat.
 */

// ── Session Configuration ──────────────────────────────────────────────────
// Batas waktu session: 30 menit tidak aktif → harus login ulang
define('SESSION_LIFETIME', 1800); // detik (30 menit)
define('SESSION_NAME', 'educenter_admin');

// ── Database Configuration ─────────────────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_NAME', 'educenter_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// ── App Configuration ──────────────────────────────────────────────────────
define('APP_NAME', 'EDUCENTER Admin');
define('BASE_URL', '/educenter'); // Sesuaikan dengan lokasi root project

// ── Start Session ──────────────────────────────────────────────────────────
ini_set('session.gc_maxlifetime', SESSION_LIFETIME);
session_name(SESSION_NAME);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── Database Connection (PDO) ──────────────────────────────────────────────
function getDB(): PDO {
    static $pdo = null;

    if ($pdo === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            // Tampilkan pesan error yang ramah (jangan expose detail di production)
            die(json_encode(['error' => 'Koneksi database gagal. Periksa konfigurasi DB.']));
        }
    }

    return $pdo;
}

// ── Auth Helper Functions ──────────────────────────────────────────────────

/**
 * Cek apakah admin sudah login dan session masih valid.
 * Jika tidak, redirect ke halaman login.
 */
function requireLogin(): void {
    if (!isLoggedIn()) {
        header('Location: login.php?reason=session');
        exit;
    }

    // Perbarui timestamp aktivitas terakhir
    $_SESSION['last_activity'] = time();
}

/**
 * Cek status login dan validitas session timeout.
 */
function isLoggedIn(): bool {
    if (empty($_SESSION['admin_id'])) {
        return false;
    }

    // Cek apakah session sudah melewati batas waktu
    if (isset($_SESSION['last_activity'])) {
        $idle = time() - $_SESSION['last_activity'];
        if ($idle > SESSION_LIFETIME) {
            session_destroy(); // Hapus session yang expired
            return false;
        }
    }

    return true;
}

/**
 * Mengembalikan sisa waktu session dalam menit.
 */
function sessionTimeLeft(): int {
    if (!isset($_SESSION['last_activity'])) return 0;
    $remaining = SESSION_LIFETIME - (time() - $_SESSION['last_activity']);
    return max(0, (int) ceil($remaining / 60));
}

/**
 * Sanitasi output HTML untuk mencegah XSS.
 */
function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect dengan pesan flash (disimpan di session).
 */
function redirect(string $url, string $type = '', string $msg = ''): void {
    if ($type && $msg) {
        $_SESSION['flash'] = ['type' => $type, 'msg' => $msg];
    }
    header('Location: ' . $url);
    exit;
}

/**
 * Ambil dan hapus pesan flash dari session (one-time display).
 */
function getFlash(): ?array {
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}
