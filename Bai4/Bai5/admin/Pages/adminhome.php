<?php
session_start();

$message = "";
$username = "";
$password = "";

// Kiểm tra session
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    $message = "Chưa đăng nhập";
} else {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Home Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 3em;
        }

        p {
            color: #34495e;
            font-size: 1.2em;
        }

        .content-admin-home {
            margin-left: 250px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Home Admin</h1>
    <p style="margin-bottom: 50px;">Chào mừng đến trang quản trị của bạn!</p>

    <div class="content-admin-home">
        <h2>ACCOUNT</h2>
        <?php
        if (!empty($message)) {
            echo "<p>" . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "</p>";
        } else {
            echo "<p><strong>Tài khoản:</strong> " . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>Mật khẩu:</strong> " . htmlspecialchars($password, ENT_QUOTES, 'UTF-8') . "</p>";
        }
        ?>
    </div>
</body>

</html>
