<?php
// Atur path dasar ke root project
$base_url = '../';
?>

<!-- ====== CSS Sidebar ====== -->
<style>
/* ======= SIDEBAR STYLE ======= */
.sidebar {
    background-color: #0b132b;
    min-height: 100vh;
    width: 240px;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 30px;
    transition: all 0.3s ease;
    font-family: "Poppins", sans-serif;
}

/* ======= LOGO DAN BRAND ======= */
.sidebar .profile {
    text-align: center;
    margin-bottom: 25px;
}

.sidebar .profile img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 3px solid #fff;
    object-fit: cover;
}

.sidebar .profile h3 {
    color: #fff;
    margin-top: 10px;
    font-size: 18px;
    font-weight: 600;
}

/* ======= MENU LINK ======= */
.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    display: flex;
    align-items: center;
    color: #d1d1d1;
    text-decoration: none;
    font-size: 15px;
    padding: 10px 20px;
    transition: all 0.3s;
}

.sidebar ul li a i {
    margin-right: 12px;
    font-size: 16px;
    width: 20px;
    text-align: center;
}

.sidebar ul li a:hover,
.sidebar ul li a.active {
    background-color: #1c2541;
    color: #00aaff;
    border-left: 4px solid #00aaff;
}

/* ======= RESPONSIVE ======= */
@media (max-width: 768px) {
    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
    }
}
</style>

<!-- ====== SIDEBAR CONTENT ====== -->
<div class="sidebar">
    <!-- Profile / Brand -->
    <div class="profile">
        <img src="<?= $base_url ?>assets/img/logo_djawara_dawet.png" alt="Logo Djawara Dawet">
        <h3>Djawara Dawet</h3>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f" style="color:white; margin:0 5px;"></i></a>
            <a href="#"><i class="fab fa-twitter" style="color:white; margin:0 5px;"></i></a>
            <a href="#"><i class="fab fa-instagram" style="color:white; margin:0 5px;"></i></a>
            <a href="#"><i class="fab fa-whatsapp" style="color:white; margin:0 5px;"></i></a>
        </div>
    </div>

    <!-- Navigation Menu -->
    <ul>
        <li><a href="<?= $base_url ?>index.php" class="active"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="<?= $base_url ?>profil.php"><i class="fas fa-user"></i> Profil</a></li>
        <li><a href="<?= $base_url ?>produk.php"><i class="fas fa-box-open"></i> Produk</a></li>
        <li><a href="<?= $base_url ?>galeri.php"><i class="fas fa-images"></i> Galeri</a></li>
        <li><a href="<?= $base_url ?>contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
    </ul>
</div>
