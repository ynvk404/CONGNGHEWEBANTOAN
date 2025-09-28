<?php
// Khởi tạo biến thông báo
$message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file = "student_details.txt";

    // Lấy thông tin từ form
    $ten = trim($_POST['ten']);
    $ngaysinh = trim($_POST['ngaysinh']);
    $diachi = trim($_POST['diachi']);
    $lop = trim($_POST['lop']);
    $email = trim($_POST['email']);
    $sdt = trim($_POST['sdt']);
    $nganhhoc = trim($_POST['nganhhoc']);
    $diemtb = trim($_POST['diemtb']);
    $ghichu = trim($_POST['ghichu']);

    // Lấy STT tự tăng
    $stt = 1;
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        if (count($lines) > 0) {
            $last = explode(',', end($lines));
            $stt = intval($last[0]) + 1;
        }
    }

    // Xử lý upload avatar
    $avatar_name = "";
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $avatar_name = "avatar{$stt}." . $ext;
        move_uploaded_file($_FILES['avatar']['tmp_name'], "avatar/" . $avatar_name);
    }

    // Ghép dữ liệu
    $data = [
        $stt,
        $avatar_name,
        $ten,
        $ngaysinh,
        $diachi,
        $lop,
        $email,
        $sdt,
        $nganhhoc,
        $diemtb,
        $ghichu
    ];

    // Ghi vào file
    file_put_contents($file, implode(",", $data) . "\n", FILE_APPEND);

    $data_basic = [
        $stt,
        $ten,
        $ngaysinh,
        $diachi,
        $lop
    ];

    // Ghi vào file cơ bản (student.txt)
    file_put_contents("student.txt", implode(",", $data_basic) . PHP_EOL, FILE_APPEND);

    $message = "Thêm sinh viên thành công!";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 20px;
        }

        .add-container {
            max-width: 650px;
            margin: 30px auto;
            padding: 25px 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .add-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .add-container form label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #555;
        }

        .add-container form input[type=text],
        .add-container form input[type=date],
        .add-container form input[type=file],
        .add-container form input[type=number] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .add-container form input[type=text]:focus,
        .add-container form input[type=date]:focus,
        .add-container form input[type=file]:focus,
        .add-container form input[type=number]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .add-container form input[type=submit] {
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .add-container form input[type=submit]:hover {
            background-color: #45a049;
        }

        .add-container .message {
            margin: 15px 0;
            padding: 12px 15px;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 700px) {
            .add-container {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>

    <div class="add-container">
        <h2>Thêm sinh viên mới</h2>

        <?php if ($message): ?>
            <div class="message"><?= $message ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label>Ảnh đại diện</label>
            <input type="file" name="avatar" required>

            <label>Tên</label>
            <input type="text" name="ten" required>

            <label>Ngày sinh</label>
            <input type="date" name="ngaysinh" required>

            <label>Địa chỉ</label>
            <input type="text" name="diachi" required>

            <label>Lớp</label>
            <input type="text" name="lop" required>

            <label>Email</label>
            <input type="text" name="email" required>

            <label>Số điện thoại</label>
            <input type="text" name="sdt" required>

            <label>Ngành học</label>
            <input type="text" name="nganhhoc" required>

            <label>Điểm trung bình</label>
            <input type="number" step="0.01" name="diemtb" required>

            <label>Ghi chú</label>
            <input type="text" name="ghichu">

            <input type="submit" value="Thêm sinh viên">
        </form>
    </div>

</body>

</html>