<?php
include "koneksi.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data gambar
$result = mysqli_query($conn, "SELECT gambar FROM produk WHERE id_produk=$id");
$old = mysqli_fetch_assoc($result);

if ($old) {
    $folder_admin = __DIR__ . "/gambar/";
    $folder_customer = __DIR__ . "/../../customer/assets/produk/";
    
    // Hapus gambar dari folder admin
    if ($old['gambar'] && file_exists($folder_admin . $old['gambar'])) {
        unlink($folder_admin . $old['gambar']);
    }
    
    // Hapus gambar dari folder customer
    if ($old['gambar'] && file_exists($folder_customer . $old['gambar'])) {
        unlink($folder_customer . $old['gambar']);
    }

    // Hapus data dari database
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk=$id");
    header("Location: index.php?status=deleted");
} else {
    header("Location: index.php?status=error");
}

exit;
?>