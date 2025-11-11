<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM bahan_baku WHERE id_bahan_baku='$id'");
echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
?>
