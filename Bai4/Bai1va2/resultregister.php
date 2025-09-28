<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Resultregister</title>
    <link rel="stylesheet" href="/BAITAPWEB/Bai4/Bai1va2/css/style.css">
</head>
<style>
    /* Khối kết quả đăng ký */
    .content-result-register {
        max-width: 720px;
        margin: 24px auto;
        padding: 24px 28px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        /* xám nhạt */
        border-radius: 14px;
        box-shadow: 0 6px 18px rgba(17, 24, 39, 0.06);
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
        color: #111827;
        /* xám đậm */
        line-height: 1.6;
    }

    /* Tiêu đề chính */
    .content-result-register h1 {
        margin: 0 0 12px;
        font-size: 1.6rem;
        font-weight: 700;
        letter-spacing: 0.2px;
        color: #0f766e;
        /* xanh teal đậm */
    }

    /* Gạch chân nhã cho h1 (tạo nhấn) */
    .content-result-register h1::after {
        content: "";
        display: block;
        width: 64px;
        height: 3px;
        margin-top: 8px;
        border-radius: 2px;
        background: linear-gradient(90deg, #14b8a6, #0ea5e9);
    }

    /* Tiêu đề phụ */
    .content-result-register h2 {
        margin: 20px 0 10px;
        font-size: 1.125rem;
        font-weight: 600;
        color: #0f172a;
        /* slate-900 */
    }

    /* Dòng thông tin */
    .content-result-register p {
        margin: 8px 0;
        font-size: 0.995rem;
        background: #f8fafc;
        /* nền rất nhạt để tách dòng */
        border: 1px dashed #e5e7eb;
        border-radius: 10px;
        padding: 10px 12px;
    }

    /* Nhãn đậm ở đầu mỗi dòng */
    .content-result-register p strong {
        display: inline-block;
        min-width: 110px;
        /* canh cột nhãn */
        color: #0f766e;
        font-weight: 700;
    }

    /* Trạng thái “không có thông tin” */
    .content-result-register p:only-child {
        background: #fff7ed;
        /* cam rất nhạt */
        border: 1px solid #fed7aa;
        color: #7c2d12;
    }
</style>

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
        </div>

        <!-- Nội dung -->
        <div class="content">
            <?php require "./Pages/left.php"; ?>
            <div class="center">
                <!-- Menu phụ -->
                <?php require "./Pages/center.php"; ?>

                <!-- Content -->
                <div class="content-result-register">
                    <h1>Kết quả đăng ký</h1>
                    <?php
                    session_start();
                    if (isset($_SESSION["name"]) && isset($_SESSION["address"]) && isset($_SESSION["occupation"]) && isset($_SESSION["note"])) {
                        $name = $_SESSION["name"];
                        $address = $_SESSION["address"];
                        $occupation = $_SESSION["occupation"];
                        $note = $_SESSION["note"];

                        echo "<h2>Thông tin đăng ký</h2>";
                        echo "<p><strong>Tên:</strong> $name</p>";
                        echo "<p><strong>Địa chỉ:</strong> $address</p>";
                        echo "<p><strong>Nghề nghiệp:</strong> $occupation</p>";
                        echo "<p><strong>Ghi chú:</strong> $note</p>";

                        unset($_SESSION["name"]);
                        unset($_SESSION["address"]);
                        unset($_SESSION["occupation"]);
                        unset($_SESSION["note"]);
                    } else {
                        echo "<p>Không có thông tin đăng ký</p>";
                    }
                    ?>

                </div>
            </div>
        </div>

    </div>
</body>

</html>