<?php
// Path dasar (ubah sesuai struktur project kamu)
$base_url = '../';

// Contoh data produk (nanti bisa diganti dari database)
$produk = [
    ["id" => 2, "nama" => "dawet_nangka", "harga" => 10000.00, "gambar" => "dawet_nangka.jpg"],
    ["id" => 3, "nama" => "dawet_tape", "harga" => 10000.00, "gambar" => "dawet_tape.jpg"],
    ["id" => 4, "nama" => "dawet_durian", "harga" => 12000.00, "gambar" => "dawet_durian.jpg"],
    ["id" => 1041, "nama" => "dawet_original", "harga" => 8000.00, "gambar" => "dawet_original.jpg"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu Produk - Djawara Dawet</title>
    <link rel="stylesheet" href="<?= $base_url ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            display: flex;
            background-color: #f8f9fa;
        }
        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: #0c1c2b;
            color: white;
            position: fixed;
            padding: 20px;
        }
        .sidebar img {
            width: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #00bcd4;
        }
        /* Konten */
        .content {
            margin-left: 280px;
            padding: 30px;
            width: 100%;
        }
        table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }
        th, td {
            vertical-align: middle;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar text-center">
        <img src="<?= $base_url ?>img/logo.png" alt="Logo Djawara Dawet">
        <h4 class="mt-2">Djawara Dawet</h4>
        <div class="d-flex justify-content-center gap-2 mt-3">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
        <hr style="background:white;">
        <a href="<?= $base_url ?>index.php"><i class="fa fa-home me-2"></i> Home</a>
        <a href="#"><i class="fa fa-user me-2"></i> Profil</a>
        <a href="#"><i class="fa fa-box me-2"></i> Produk</a>
        <a href="#"><i class="fa fa-image me-2"></i> Galeri</a>
        <a href="#"><i class="fa fa-envelope me-2"></i> Contact</a>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <h2><strong>Menu Produk</strong></h2>
        <hr>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>ID Produk</th>
                    <th>Nama produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($produk as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= number_format($row['harga'], 2) ?></td>
                    <td><img src="<?= $base_url ?>img/produk/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>"></td>
                    <td>
                        <a href="#" class="text-primary">Edit</a> |
                        <a href="#" class="text-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
