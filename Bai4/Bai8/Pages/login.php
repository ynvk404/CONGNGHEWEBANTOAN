<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="form-login-container">
        <h2 class="form-title">Form Đăng nhập</h2>

        <form method="post" action="index.php?page=loginprocess">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
            <!-- Thêm checkbox Remember me -->
            <div class="checkbox-wrapper">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ghi nhớ đăng nhập</label>
            </div>

            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>

</html>