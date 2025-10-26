<?php
// atur path dasar jika menggunakan struktur folder MVC
$base_url = '../'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Djawara Dawet</title>
    <link rel="stylesheet" href="<?= $base_url ?>css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            color: #fff;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 230px;
            background: linear-gradient(180deg, #2e3b55 0%, #1b2434 100%);
            padding-top: 30px;
            text-align: center;
        }

        .sidebar img {
            width: 90px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar h4 {
            color: #fff;
            font-weight: 700;
        }

        .sidebar a {
            display: block;
            color: #d1d1d1;
            text-decoration: none;
            padding: 12px;
            margin: 5px 15px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #0a0a0aff;
            color: #fff;
        }

        .sidebar .social-icons a {
            color: #fff;
            margin: 0 6px;
            font-size: 16px;
            transition: 0.3s;
        }

        .sidebar .social-icons a:hover {
            color: #0e0e0fff;
        }

        /* Main content */
        .content {
            margin-left: 230px;
            height: 100vh;
            background: url('<?= $base_url ?>img/djawara-bg.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 0 20px;
        }

        .content h1 {
            font-size: 60px;
            font-weight: 700;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
        }

        .content p {
            font-size: 22px;
            color: #f1f1f1;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.6);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <img src="<?= $base_url ?>img/logo_djawara.png" alt="Logo Djawara Dawet">
        <h4>Djawara Dawet</h4>
        <div class="social-icons mb-3">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>

        <a href="home.php" class="active"><i class="fa fa-home me-2"></i> Home</a>
        <a href="profil.php"><i class="fa fa-user me-2"></i> Profil</a>
        <a href="produk.php"><i class="fa fa-box me-2"></i> Produk</a>
        <a href="galeri.php"><i class="fa fa-image me-2"></i> Galeri</a>
        <a href="contact.php"><i class="fa fa-envelope me-2"></i> Contact</a>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <h1>Djawara Dawet</h1>
        <p>Rasa Klasik Segar Otentik</p>
    </div>
</body>
</html>

