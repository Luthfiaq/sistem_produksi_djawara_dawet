<?php
// Jika menggunakan struktur folder MVC, gunakan base_url agar mudah navigasi
$base_url = '../';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri Produk - Djawara Dawet</title>
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
            background: linear-gradient(180deg, #151516ff 10%, #0d0d0eff 100%);
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
            color: #101011ff;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        /* ====== Gallery Cards ====== */
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            width: 300px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            background-color: white;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-body p {
            font-size: 15px;
            color: #555;
            margin: 0;
        }

        /* ====== Footer ====== */
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

            .card {
                width: 100%;
                max-width: 350px;
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

    <!-- Konten Galeri -->
    <div class="container mt-5">
        <h3>Galeri Produk</h3>
        <div class="gallery">
            <div class="card">
                <img src="<?= $base_url ?>asset/my-profile-img.jpg" alt="Djawara Dawet">
                <div class="card-body">
                </div>
            </div>

            <div class="card">
                <img src="<?= $base_url ?>asset/img/Proses.jpeg" alt="Proses Membuat Produk">
                <div class="card-body">
                </div>
            </div>

            <div class="card">
                <img src="<?= $base_url ?>asset/img/hero-bg.jpg" alt="Hasil Produk">
                <div class="card-body">
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; 2025 Djawara Dawet. All Rights Reserved.</p>
        </footer>
    </div>

</body>
</html>
