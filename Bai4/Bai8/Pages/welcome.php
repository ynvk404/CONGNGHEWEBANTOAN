<?php
session_start();

// Kiểm tra nếu chưa login thì chuyển về trang login
if (!isset($_SESSION['username']) || $_SESSION['status'] !== 'login') {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6dd5ed, #2193b0);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .welcome-container {
            background: rgba(0,0,0,0.2);
            padding: 40px 60px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        .welcome-container h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .welcome-container p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn-logout {
            display: inline-block;
            padding: 12px 20px;
            background: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
        }

        .btn-logout:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Chào mừng, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Bạn đã đăng nhập thành công vào hệ thống.</p>
        <a href="logout.php" class="btn-logout">Đăng xuất</a>
    </div>
</body>
</html>
