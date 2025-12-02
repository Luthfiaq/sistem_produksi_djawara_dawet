<?php
session_start();
require "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$data = mysqli_fetch_assoc($cek);

if ($data && password_verify($password, $data['password'])) {

    $_SESSION['admin_login'] = true;
    $_SESSION['username'] = $data['username'];

    echo "<script>alert('Login berhasil!'); window.location='index.html';</script>";

} else {
    echo "<script>alert('Username atau password salah!'); window.location='login.php';</script>";
}
?>
