<?php
/**
 * PING.PHP
 * PHP: Endpoint AJAX untuk memperbarui waktu aktivitas sesi.
 * Dipanggil dari JavaScript setiap beberapa menit untuk mencegah
 * session timeout selama admin masih aktif di halaman.
 */

require_once 'config.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    http_response_code(401);
    echo json_encode(['status' => 'expired']);
    exit;
}

// Perbarui timestamp aktivitas
$_SESSION['last_activity'] = time();

echo json_encode([
    'status'     => 'ok',
    'time_left'  => sessionTimeLeft(), // Menit tersisa
    'server_time'=> date('H:i:s'),
]);
