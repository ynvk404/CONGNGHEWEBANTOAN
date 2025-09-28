<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="/BAITAPWEB/Bai4/Bai1va2/css/style.css">
</head>

<body>
    <div class="container">

        <!-- Menu -->
        <div class="menu">
            <a href="/BAITAPWEB/Bai1va2/template.php">Bài 7.1 + 7.2 : Tạo và sử dụng template</a>
            <a href="/BAITAPWEB/Bai3/index.php">Bài 7.3 : Lấy dữ liệu và gửi dữ liệu</a>
            <a href="/BAITAPWEB/Bai4/index.php">Bài 7.4 : GetForm</a>
            <a href="/BAITAPWEB/Bai5/index.php">Bài 7.5 : Phiên</a>
            <a href="/BAITAPWEB/Bai6/index.php">Bài 7.6 : Cookie</a>
            <a href="/BAITAPWEB/Bai7/index.php">Bài 7.7 :Function</a>
            <a href="/BAITAPWEB/Bai8/index.php">Bài 7.8: Đọc, ghi file</a>
            <a href="/BAITAPWEB/Bai9/index.php">Bài 7.9: Thao tác file và data flow</a>
            <a href="/BAITAPWEB/Bai10/index.php">Bài 7.10: Website đa ngôn ngữ</a>
            <a href="/BAITAPWEB/Bai11/index.php">Bài 7.11: Kết nối và truy vấn cơ sở dữ liệu cơ bản</a>
            <a href="/BAITAPWEB/Bai12/index.php">Bài 7.12: Truy vấn dữ liệu</a>
        </div>

        <!-- Nội dung -->
        <div class="content">
            <?php require "./Pages/left.php"; ?>
            <div class="center">
                <!-- Menu phụ -->
                <?php require "./Pages/center.php"; ?>
                <!-- Content -->

                <div class="content-register">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST["name"];
                        $address = $_POST["address"];
                        $occupation = $_POST["occupation"];
                        $note = $_POST["note"];

                        session_start();
                        $_SESSION["name"] = $name;
                        $_SESSION["address"] = $address;
                        $_SESSION["occupation"] = $occupation;
                        $_SESSION["note"] = $note;

                        header("Location: resultregister.php");
                        exit();
                    }
                    ?>
                    <h2>Đăng Ký</h2>
                    <form method="POST">
                        <label for="name">Tên:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="address">Địa chỉ:</label>
                        <input type="text" id="address" name="address" required>

                        <label for="occupation">Nghề Nghiệp:</label>
                        <input type="text" id="occupation" name="occupation" required>

                        <label for="note">Ghi chú:</label>
                        <textarea id="note" name="note" rows="4"></textarea>

                        <input type="submit" value="Đăng ký">
                        <input type="button" value="Xóa">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>