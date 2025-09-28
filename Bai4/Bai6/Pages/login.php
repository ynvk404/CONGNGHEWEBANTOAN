<?php
session_start();

// Nếu đã có session, redirect thẳng tới admin
if (isset($_SESSION["username"])) {
    header("Location: admin/index.php");
    exit();
}

// Lấy username và password từ cookie nếu có
$cookie_username = $_COOKIE["username"] ?? "";
$cookie_password = $_COOKIE["password"] ?? "";

$login_error = "";
$auto_login_msg = "";

// Nếu có cookie đầy đủ, thông báo tự động login
if ($cookie_username && $cookie_password) {
    $auto_login_msg = "Thông tin đăng nhập được lấy từ cookie. Bạn có thể nhấn đăng nhập để tiếp tục.";
}

// Xử lý form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (!empty($username) && !empty($password)) {
        if ($username === "admin" && $password === "admin") {
            // Lưu session
            $_SESSION["username"] = $username;

            // Lưu cookie 1 ngày
            setcookie("username", $username, time() + 24 * 60 * 60);
            setcookie("password", $password, time() + 24 * 60 * 60);

            // Chuyển hướng tới admin
            header("Location: admin/index.php");
            exit();
        } else {
            $login_error = "Tên đăng nhập hoặc mật khẩu không chính xác.";
        }
    } else {
        $login_error = "Vui lòng nhập đủ username và password.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <style>
        .error {
            color: red;
        }

        .auto-login-msg {
            color: red;
            margin-top: 10px;
        }

        .content-login-form {
            margin: 50px auto;
            width: 300px;
            font-family: Arial, sans-serif;
        }

        .content-login-form form div {
            margin-bottom: 15px;
        }

        .content-login-form label {
            display: inline-block;
            width: 80px;
        }

        .content-login-form input {
            padding: 5px;
            width: 180px;
        }

        .content-login-form button {
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="content-login-form">
        <form action="" method="post">
            <h3>Đăng Nhập</h3>

            <?php
            if (!empty($login_error)) {
                echo '<p class="error">' . htmlspecialchars($login_error, ENT_QUOTES, "UTF-8") . '</p>';
            }
            ?>

            <div>
                <label>Username:</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($cookie_username, ENT_QUOTES, "UTF-8"); ?>">
            </div>

            <div>
                <label>Password:</label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($cookie_password, ENT_QUOTES, "UTF-8"); ?>">
            </div>

            <div>
                <button type="submit">Đăng Nhập</button>
            </div>

            <?php
            if (!empty($auto_login_msg)) {
                echo '<p class="auto-login-msg">' . htmlspecialchars($auto_login_msg, ENT_QUOTES, "UTF-8") . '</p>';
            }
            ?>
        </form>
    </div>
</body>

</html>
