<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">Tambah Bahan Baku</h3>

    <form method="post" action="">
        <div class="mb-3">
            <label>Nama Bahan Baku</label>
            <input type="text" name="nama_bahan_baku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Tersedia</label>
            <input type="text" name="jumlah_tersedia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Dibutuhkan</label>
            <input type="text" name="jumlah_dibutuhkan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status_tersedia" class="form-control">
                <option value="tersedia">Tersedia</option>
                <option value="habis">Habis</option>
            </select>
        </div>
        <div class="mb-3">
            <label>ID Produsen</label>
            <input type="text" name="id_produsen" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_bahan_baku'];
    $tersedia = $_POST['jumlah_tersedia'];
    $butuh = $_POST['jumlah_dibutuhkan'];
    $status = $_POST['status_tersedia'];
    $idprod = $_POST['id_produsen'];

    $insert = mysqli_query($conn, "INSERT INTO bahan_baku (nama_bahan_baku, jumlah_tersedia, jumlah_dibutuhkan, status_tersedia, id_produsen)
                                   VALUES ('$nama', '$tersedia', '$butuh', '$status', '$idprod')");

    if ($insert) {
        echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>

</body>
</html>
