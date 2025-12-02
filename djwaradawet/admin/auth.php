<?php
session_start();
// Simple admin auth helper
// Include this at the top of every admin page to protect it

if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {
    // Not logged in -> redirect to login page
    header('Location: login.php');
    exit;
}

// Optionally expose current user info
$current_admin = isset($_SESSION['username']) ? $_SESSION['username'] : null;

?>
