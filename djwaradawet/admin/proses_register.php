<?php
require "config.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password, email, level)
        VALUES ('$username', '$password', '$email', 'admin')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Register berhasil! Silakan login.'); window.location='login.php';</script>";
} else {
    echo "<script>alert('Gagal mendaftar!'); window.location='register.php';</script>";
}
?>
