<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h3 class="text-center mb-4">Manajemen Bahan Baku</h3>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Bahan Baku</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Bahan Baku</th>
                <th>Jumlah Tersedia</th>
                <th>Jumlah Dibutuhkan</th>
                <th>Status</th>
                <th>ID Produsen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM bahan_baku");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?= $row['id_bahan_baku'] ?></td>
                <td><?= $row['nama_bahan_baku'] ?></td>
                <td><?= $row['jumlah_tersedia'] ?></td>
                <td><?= $row['jumlah_dibutuhkan'] ?></td>
                <td><?= $row['status_tersedia'] ?></td>
                <td><?= $row['id_produsen'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_bahan_baku'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_bahan_baku'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
