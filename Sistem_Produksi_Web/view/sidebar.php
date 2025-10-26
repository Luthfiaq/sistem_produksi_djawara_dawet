<?php
// Atur path dasar ke root project, misalnya "../" kalau file ini di folder view
$base_url = '../';
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $base_url ?>index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Website</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Menu Home -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>index.php">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Menu Profil -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>profil.php">
            <i class="fas fa-user"></i>
            <span>Profil</span></a>
    </li>

    <!-- Menu Produk -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>produk.php">
            <i class="fas fa-box-open"></i>
            <span>Produk</span></a>
    </li>

    <!-- Menu Galeri -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>galeri.php">
            <i class="fas fa-images"></i>
            <span>Galeri</span></a>
    </li>

    <!-- Menu Contact -->
    <li class="nav-item">
        <a class="nav-link" href="<?= $base_url ?>contact.php">
            <i class="fas fa-envelope"></i>
            <span>Contact</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->
