<?php
session_start();

// Nếu đã đăng nhập thì chuyển hướng
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header("Location: admin/index.php");
    exit();
}

$error_message = "";

// Xử lý khi form gửi POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === "admin" && $password === "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header("Location: admin/index.php");
        exit();
    } else {
        $error_message = "Tên tài khoản hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
</head>
<body>
    <div class="content-loginform" style="margin-left: 250px; margin-top: 50px;">
        <h2>Đăng Nhập</h2>

        <?php if (!empty($error_message)) : ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>

        <form method="post">
            <label for="username">Tên Đăng Nhập:</label>
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Mật Khẩu:</label>
            <input type="password" name="password" id="password" required><br><br>

            <input type="submit" name="login" value="Đăng Nhập">
            <input type="reset" class="buttonreset" value="Nhập lại" style="margin-top: 20px;">
        </form>
    </div>
</body>
</html>
