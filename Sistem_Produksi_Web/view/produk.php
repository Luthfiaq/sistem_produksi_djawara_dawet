<?php
// Atur path dasar jika file ini berada di dalam folder view
$base_url = '../';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk - Djawara Dawet</title>
    <link rel="icon" href="<?= $base_url ?>assets/logo.png" type="image/png">
    <style>
        /* ====== General Style ====== */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* ====== Sidebar ====== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100%;
            background: linear-gradient(180deg, #141416ff 10%, #080808ff 100%);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 30px;
        }

        .sidebar img {
            width: 90px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 25px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            width: 100%;
            padding: 12px 0;
            text-align: center;
            display: block;
            font-weight: 500;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* ====== Content Area ====== */
        .container {
            margin-left: 250px;
            padding: 40px;
        }

        h3 {
            color: #0c111dff;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* ====== Table Style ====== */
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #101113ff;
            color: white;
        }

        thead th {
            padding: 12px;
            text-align: center;
        }

        tbody td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* ====== Footer (opsional) ====== */
        footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 14px;
        }

        /* ====== Responsive ====== */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px 0;
            }

            .container {
                margin-left: 0;
                padding: 20px;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="<?= $base_url ?>assets/logo.png" alt="Logo Djawara Dawet">
        <h2>Djawara Dawet</h2>
        <a href="<?= $base_url ?>index.php">Home</a>
        <a href="<?= $base_url ?>view/profil.php">Profil</a>
        <a href="<?= $base_url ?>view/produk.php">Produk</a>
        <a href="<?= $base_url ?>view/galeri.php">Galeri</a>
        <a href="<?= $base_url ?>view/contact.php">Contact</a>
    </div>

    <!-- Konten -->
    <div class="container mt-5">
        <h3>Daftar Produk</h3>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1010</td>
                    <td>Dawet Original</td>
                    <td>Rp8.000</td>
                    <td>Tersedia</td>
                </tr>
                <tr>
                    <td>1020</td>
                    <td>Dawet Nangka</td>
                    <td>Rp10.000</td>
                    <td>Tersedia</td>
                </tr>
                <tr>
                    <td>1030</td>
                    <td>Dawet Tape</td>
                    <td>Rp10.000</td>
                    <td>Tersedia</td>
                </tr>
                <tr>
                    <td>1040</td>
                    <td>Dawet Durian</td>
                    <td>Rp15.000</td>
                    <td>Tersedia</td>
                </tr>
            </tbody>
        </table>

        <footer>
            <p>&copy; 2025 Djawara Dawet. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
