<?php
session_start();
session_unset();
session_destroy();

// Redirect to customer page
header("Location: ../customer/index.html");
exit;
?>
