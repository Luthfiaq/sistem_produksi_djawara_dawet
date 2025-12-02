<?php
// Sesuaikan dengan konfigurasi Anda
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sistem_produksi";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
