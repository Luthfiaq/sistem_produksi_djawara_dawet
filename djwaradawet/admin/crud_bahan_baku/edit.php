<?php 
include 'config.php'; 
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM bahan_baku WHERE id_bahan_baku='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">Edit Bahan Baku</h3>

    <form method="post" action="">
        <div class="mb-3">
            <label>Nama Bahan Baku</label>
            <input type="text" name="nama_bahan_baku" value="<?= $data['nama_bahan_baku'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Tersedia</label>
            <input type="text" name="jumlah_tersedia" value="<?= $data['jumlah_tersedia'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Dibutuhkan</label>
            <input type="text" name="jumlah_dibutuhkan" value="<?= $data['jumlah_dibutuhkan'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status_tersedia" class="form-control">
                <option value="tersedia" <?= $data['status_tersedia']=='tersedia'?'selected':'' ?>>Tersedia</option>
                <option value="habis" <?= $data['status_tersedia']=='habis'?'selected':'' ?>>Habis</option>
            </select>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama_bahan_baku'];
    $tersedia = $_POST['jumlah_tersedia'];
    $butuh = $_POST['jumlah_dibutuhkan'];
    $status = $_POST['status_tersedia'];

    $update = mysqli_query($conn, "UPDATE bahan_baku SET 
        nama_bahan_baku='$nama',
        jumlah_tersedia='$tersedia',
        jumlah_dibutuhkan='$butuh',
        status_tersedia='$status'
        WHERE id_bahan_baku='$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>

</body>
</html>
