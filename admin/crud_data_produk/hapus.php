<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM data_produk WHERE id_data_produk='$id'");
echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
?>
