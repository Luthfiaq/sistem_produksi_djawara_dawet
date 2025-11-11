<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM data_produk WHERE id_data_produk='$id'"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="text-center mb-4">Edit Data Produk</h3>

    <form method="post">
        <div class="mb-3">
            <label>ID Produk</label>
            <input type="text" name="id_produk" value="<?= $data['id_produk'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Produksi</label>
            <input type="date" name="tanggal_produksi" value="<?= $data['tanggal_produksi'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Produksi</label>
            <input type="number" name="jumlah_produksi" value="<?= $data['jumlah_produksi'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" value="<?= $data['keterangan'] ?>" class="form-control">
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $id_produk = $_POST['id_produk'];
    $tanggal = $_POST['tanggal_produksi'];
    $jumlah = $_POST['jumlah_produksi'];
    $nama = $_POST['nama_produk'];
    $ket = $_POST['keterangan'];

    $update = mysqli_query($conn, "UPDATE data_produk SET
                id_produk='$id_produk',
                tanggal_produksi='$tanggal',
                jumlah_produksi='$jumlah',
                nama_produk='$nama',
                keterangan='$ket'
                WHERE id_data_produk='$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>
</body>
</html>
