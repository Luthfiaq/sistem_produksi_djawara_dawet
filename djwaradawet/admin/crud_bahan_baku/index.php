<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Bahan Baku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Header tabel biru */
        .table-blue th {
            background-color: #0d6efd !important;
            color: white !important;
            text-align: center;
        }

        /* Rapiin teks & tombol */
        table td {
            vertical-align: middle;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-4">
    <h3 class="text-center mb-4">Manajemen Bahan Baku</h3>

    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Bahan Baku</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-blue">
                <tr>
                    <th>Nama Bahan Baku</th>
                    <th>Jumlah Tersedia</th>
                    <th>Jumlah Dibutuhkan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM bahan_baku");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $row['nama_bahan_baku'] ?></td>
                    <td><?= $row['jumlah_tersedia'] ?></td>
                    <td><?= $row['jumlah_dibutuhkan'] ?></td>
                    <td><?= $row['status_tersedia'] ?></td>

                    <td class="text-center">
                        <a href="edit.php?id=<?= $row['id_bahan_baku'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $row['id_bahan_baku'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
