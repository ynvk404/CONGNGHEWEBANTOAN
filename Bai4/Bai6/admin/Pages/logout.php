<?php
session_start();

// Xóa session
$_SESSION = [];
session_destroy();

// Xóa cookie username
setcookie("username", "", time() - 3600);
setcookie("password", "", time() - 3600);
// Redirect về login
header("Location: ../index.php?page=login");
exit();
?>
