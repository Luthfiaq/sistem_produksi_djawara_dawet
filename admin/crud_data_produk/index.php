<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3 class="text-center mb-4">Manajemen Data Produk</h3>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Data Produk</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Data</th>
                <th>ID Produk</th>
                <th>Tanggal Produksi</th>
                <th>Jumlah Produksi</th>
                <th>Nama Produk</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM data_produk ORDER BY id_data_produk DESC");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?= $row['id_data_produk'] ?></td>
                <td><?= $row['id_produk'] ?></td>
                <td><?= $row['tanggal_produksi'] ?></td>
                <td><?= $row['jumlah_produksi'] ?></td>
                <td><?= $row['nama_produk'] ?></td>
                <td><?= $row['keterangan'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_data_produk'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_data_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
