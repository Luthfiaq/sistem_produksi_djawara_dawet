<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="text-center mb-4">Tambah Data Produk</h3>

    <form method="post">
        <div class="mb-3">
            <label>ID Produk</label>
            <input type="text" name="id_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Produksi</label>
            <input type="date" name="tanggal_produksi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Produksi</label>
            <input type="number" name="jumlah_produksi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $id_produk = $_POST['id_produk'];
    $tanggal = $_POST['tanggal_produksi'];
    $jumlah = $_POST['jumlah_produksi'];
    $nama = $_POST['nama_produk'];
    $ket = $_POST['keterangan'];

    $insert = mysqli_query($conn, "INSERT INTO data_produk (id_produk, tanggal_produksi, jumlah_produksi, nama_produk, keterangan)
                                   VALUES ('$id_produk', '$tanggal', '$jumlah', '$nama', '$ket')");

    if ($insert) {
        echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>
</body>
</html>
