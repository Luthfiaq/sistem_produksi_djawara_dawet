<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config.php';

$out = ['success' => false];

// Totals
$totals = [];
$q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk");
$totals['total_produk'] = ($q && $r = mysqli_fetch_assoc($q)) ? (int)$r['total'] : 0;
$q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM bahan_baku");
$totals['total_bahan_baku'] = ($q && $r = mysqli_fetch_assoc($q)) ? (int)$r['total'] : 0;
$q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM outlet");
$totals['total_outlet'] = ($q && $r = mysqli_fetch_assoc($q)) ? (int)$r['total'] : 0;
$q = mysqli_query($conn, "SELECT IFNULL(SUM(jumlah_produksi),0) AS sum_produksi FROM data_produk");
$totals['total_jumlah_produksi'] = ($q && $r = mysqli_fetch_assoc($q)) ? (int)$r['sum_produksi'] : 0;

// Timeseries: last 14 days production
$labels = [];
$data_points = [];
$days = 14;
$dates = [];
for ($i = $days - 1; $i >= 0; $i--) {
    $d = date('Y-m-d', strtotime("-{$i} days"));
    $dates[$d] = 0;
}

$sql = "SELECT tanggal_produksi, SUM(jumlah_produksi) AS total FROM data_produk WHERE tanggal_produksi >= DATE_SUB(CURDATE(), INTERVAL " . ($days - 1) . " DAY) GROUP BY tanggal_produksi";
$res = mysqli_query($conn, $sql);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        $date = $row['tanggal_produksi'];
        if (isset($dates[$date])) {
            $dates[$date] = (int)$row['total'];
        }
    }
}

foreach ($dates as $d => $v) {
    $labels[] = $d;
    $data_points[] = $v;
}

// Recent logs
$logs = [];
$res = mysqli_query($conn, "SELECT id_log, id_bahan_baku, nama_bahan_baku_lama, nama_bahan_baku_baru, jumlah_tersedia_lama, jumlah_tersedia_baru, operasi, waktu FROM log_bahan_baku ORDER BY waktu DESC LIMIT 200");
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        $logs[] = $row;
    }
}

$out['success'] = true;
$out['totals'] = $totals;
$out['timeseries'] = ['labels' => $labels, 'data' => $data_points];
$out['recent_logs'] = $logs;

// Low stock items (where jumlah_tersedia <= jumlah_dibutuhkan OR status != 'tersedia')
$low = [];
$res = mysqli_query($conn, "SELECT id_bahan_baku, nama_bahan_baku, jumlah_tersedia, jumlah_dibutuhkan, status_tersedia FROM bahan_baku ORDER BY jumlah_tersedia ASC LIMIT 50");
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $low[] = $r;
    }
}
$out['low_stock'] = $low;

// Produk list (sample)
$produk = [];
$res = mysqli_query($conn, "SELECT id_produk, nama_produk, harga, status_produk, id_bahan_baku, gambar FROM produk ORDER BY id_produk DESC LIMIT 200");
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) $produk[] = $r;
}
$out['produk'] = $produk;

// Top products by total produksi
$top = [];
$res = mysqli_query($conn, "SELECT nama_produk, SUM(jumlah_produksi) AS total FROM data_produk GROUP BY nama_produk ORDER BY total DESC LIMIT 10");
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) $top[] = $r;
}
$out['top_products'] = $top;

// Produsen list
$produsen = [];
$res = mysqli_query($conn, "SELECT id_produsen, nama_produsen, alamat FROM produsen ORDER BY id_produsen DESC LIMIT 200");
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) $produsen[] = $r;
}
$out['produsen'] = $produsen;

// Users (limited)
$users = [];
$res = mysqli_query($conn, "SELECT id, username, email, level FROM users ORDER BY id DESC LIMIT 200");
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) $users[] = $r;
}
$out['users'] = $users;

echo json_encode($out);

?>
