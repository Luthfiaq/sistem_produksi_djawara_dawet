<?php
$base_url = '../';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Djawara Dawet</title>
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
            background: linear-gradient(180deg, #0c0c0cff 10%, #050505ff 100%);
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

        /* ====== Content ====== */
        .container {
            margin-left: 250px;
            padding: 40px;
        }

        h3 {
            color: #101011ff;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .profil-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 30px;
        }

        .profil-content img {
            width: 150px;
            display: block;
            margin: 0 auto 20px;
        }

        .profil-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 10px;
        }

        .profil-info div {
            width: 48%;
            margin-bottom: 10px;
        }

        .profil-info strong {
            color: #151516ff;
        }

        p.description {
            margin-top: 20px;
            line-height: 1.7;
            text-align: justify;
        }

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

            .profil-info div {
                width: 100%;
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

    <!-- Konten Profil -->
    <div class="container">
        <h3>Profil Djawara Dawet</h3>
        <div class="profil-content">
            <p><a href="#" style="color:#4e73df; text-decoration:none;">UMKM</a> minuman tradisional dawet. 
            Dawet sebagai minuman khas Indonesia telah dikenal luas oleh masyarakat karena rasanya yang segar, 
            bahan bakunya mudah diperoleh, serta memiliki nilai jual yang cukup terjangkau.</p>

            <div class="profil-info">
                <div><strong>Nama:</strong> Djawara dihati</div>
                <div><strong>Tahun Berdiri:</strong> 2016</div>
                <div><strong>Nama Pemilik:</strong> Abdul Wachid Jauhari</div>
                <div><strong>Jam Buka:</strong> 08:00 - 21:00</div>
                <div><strong>Phone:</strong> 081235235786</div>
                <div><strong>Alamat:</strong> Jl. Kartini No.7 Nganjuk</div>
            </div>

            <p class="description">
                Dengan semangat melestarikan cita rasa tradisional, Djawara Dawet berkomitmen untuk terus menghadirkan 
                minuman segar berkualitas yang mencerminkan kekayaan kuliner Indonesia. 
                Djawara Dawet dapat menjadi pilihan utama masyarakat dalam menikmati kesegaran khas nusantara.
            </p>
        </div>

        <footer>
            <p>&copy; 2025 Djawara Dawet. All Rights Reserved.</p>
        </footer>
    </div>

</body>
</html>
