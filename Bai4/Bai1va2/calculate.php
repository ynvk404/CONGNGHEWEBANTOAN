<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Calculate</title>
    <link rel="stylesheet" href="/BAITAPWEB/Bai4/Bai1va2/css/style.css">
</head>

<body>
    <div class="container">

        <!-- Menu -->
        <div class="menu">
            <a href="/BAITAPWEB/Bai4/Bai1va2/template.php">Bài 7.1 + 7.2 : Tạo và sử dụng template</a>
            <a href="/BAITAPWEB/Bai4/Bai3/index.php">Bài 7.3 : Lấy dữ liệu và gửi dữ liệu</a>
            <a href="/BAITAPWEB/Bai4/Bai4/index.php">Bài 7.4 : GetForm</a>
            <a href="/BAITAPWEB/Bai4/Bai5/index.php">Bài 7.5 : Phiên</a>
            <a href="/BAITAPWEB/Bai4/Bai6/index.php">Bài 7.6 : Cookie</a>
            <a href="/BAITAPWEB/Bai4/Bai7/index.php">Bài 7.7 :Function</a>
            <a href="/BAITAPWEB/Bai4/Bai8/index.php">Bài 7.8: Đọc, ghi file</a>
            <a href="/BAITAPWEB/Bai4/Bai9/index.php">Bài 7.9: Thao tác file và data flow</a>
            <a href="/BAITAPWEB/Bai4/Bai10/index.php">Bài 7.10: Website đa ngôn ngữ</a>
            <a href="/BAITAPWEB/Bai4/Bai11/index.php">Bài 7.11: Kết nối và truy vấn cơ sở dữ liệu cơ bản</a>
            <a href="/BAITAPWEB/Bai4/Bai12/index.php">Bài 7.12: Truy vấn dữ liệu</a>
        </div>

        <!-- Nội dung -->
        <div class="content">
            <?php require "./Pages/left.php"; ?>
            <div class="center">
                <!-- Menu phụ -->
                <?php require "./Pages/center.php"; ?>

                <!-- Content -->
                <div class="content-calculate">
                    <h2>Kết quả:</h2>
                    <?php
                    function tinhGiaiThua($n)
                    {
                        if ($n <= 1) {
                            return 1;
                        } else {
                            return $n * tinhGiaiThua($n - 1);
                        }
                    }

                    $giaiThua10 = tinhGiaiThua(10);
                    echo "<p>Giai thừa của 10 là: $giaiThua10</p>";

                    $banKinh = 10;

                    $dienTichHinhTron = pi() * pow($banKinh, 2);

                    $theTichKhoiCau = (4 / 3) * pi() * pow($banKinh, 3);
                    ?>

                    <p>Bán kính của hình tròn: <?php echo $banKinh; ?></p>
                    <p>Diện tích hình tròn: <?php echo $dienTichHinhTron; ?></p>
                    <p>Thể tích khối cầu: <?php echo $theTichKhoiCau; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>