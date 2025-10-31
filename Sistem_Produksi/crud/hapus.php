<?php
include "koneksi.php";
$id = $_GET['id'];

$old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT gambar FROM produk WHERE id_produk=$id"));
$folder = _DIR_ . "/gambar/";
if ($old['gambar'] && file_exists($folder . $old['gambar'])) {
    unlink($folder . $old['gambar']);
}

mysqli_query($conn, "DELETE FROM produk WHERE id_produk=$id");
header("Location: index.php");
exit;
?>
