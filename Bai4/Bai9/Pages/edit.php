<?php
$id = $_GET['id'] ?? 0;
$file_details = "student_details.txt";
$file_basic   = "student.txt";
$message      = "";
$student      = null;

// --- Đọc dữ liệu sinh viên từ file chi tiết ---
if (file_exists($file_details)) {
    $lines = file($file_details, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $data = explode(',', $line);
        if ($data[0] == $id) {
            $student = $data;
            break;
        }
    }
}

// --- Nếu không có sinh viên thì thoát ---
if (!$student) {
    echo "<p>Không tìm thấy sinh viên này.</p>";
    echo '<a href="index.php?page=list">Quay lại danh sách</a>';
    exit;
}

// --- Xử lý submit form ---
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $ten       = trim($_POST['ten']);
    $ngaysinh  = trim($_POST['ngaysinh']);
    $diachi    = trim($_POST['diachi']);
    $lop       = trim($_POST['lop']);
    $email     = trim($_POST['email']);
    $sdt       = trim($_POST['sdt']);
    $nganhhoc  = trim($_POST['nganhhoc']);
    $diemtb    = trim($_POST['diemtb']);
    $ghichu    = trim($_POST['ghichu']);

    // Upload avatar
    $avatar_dir = "avatar";
    if (!is_dir($avatar_dir)) {
        mkdir($avatar_dir, 0755, true);
    }

    $avatar_name = $student[1]; // giữ avatar cũ
    if (!empty($_FILES['avatar']['name']) && $_FILES['avatar']['error'] === 0) {
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $avatar_name = "avatar{$id}." . $ext;
        move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_dir . "/" . $avatar_name);
    }

    // Dữ liệu chi tiết mới
    $data_details = [
        $id, $avatar_name, $ten, $ngaysinh, $diachi,
        $lop, $email, $sdt, $nganhhoc, $diemtb, $ghichu
    ];

    // --- Cập nhật student_details.txt ---
    $new_lines = [];
    foreach (file($file_details, FILE_IGNORE_NEW_LINES) as $line) {
        $d = explode(',', $line);
        if ($d[0] == $id) {
            $new_lines[] = implode(',', $data_details);
        } else {
            $new_lines[] = $line;
        }
    }
    file_put_contents($file_details, implode(PHP_EOL, $new_lines) . PHP_EOL);

    // --- Cập nhật student.txt ---
    $data_basic = [$id, $ten, $ngaysinh, $diachi, $lop];
    $new_basic  = [];
    foreach (file($file_basic, FILE_IGNORE_NEW_LINES) as $line) {
        $d = explode(',', $line);
        if ($d[0] == $id) {
            $new_basic[] = implode(',', $data_basic);
        } else {
            $new_basic[] = $line;
        }
    }
    file_put_contents($file_basic, implode(PHP_EOL, $new_basic) . PHP_EOL);

    $message = "Cập nhật sinh viên thành công!";
    $student = $data_details; // reload dữ liệu
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 20px;
        }
        .edit-container {
            max-width: 650px;
            margin: 30px auto;
            padding: 25px 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }
        .edit-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .edit-container form label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #555;
        }
        .edit-container form input[type=text],
        .edit-container form input[type=date],
        .edit-container form input[type=file],
        .edit-container form input[type=number] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: 0.3s;
        }
        .edit-container form input[type=text]:focus,
        .edit-container form input[type=date]:focus,
        .edit-container form input[type=file]:focus,
        .edit-container form input[type=number]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .edit-container form input[type=submit] {
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
        .edit-container form input[type=submit]:hover {
            background-color: #45a049;
        }
        .edit-container .message {
            margin: 15px 0;
            padding: 12px 15px;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .edit-container img {
            display: block;
            margin: 10px auto;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4CAF50;
        }
        @media (max-width: 700px) {
            .edit-container {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
<div class="edit-container">
    <h2>Sửa thông tin sinh viên</h2>

    <?php
    if (!empty($message)) {
        echo '<div class="message">' . htmlspecialchars($message) . '</div>';
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label>Ảnh đại diện</label>
        <img src="avatar/<?= htmlspecialchars($student[1]) ?>" alt="<?= htmlspecialchars($student[2]) ?>">
        <input type="file" name="avatar">

        <label>Tên</label>
        <input type="text" name="ten" value="<?= htmlspecialchars($student[2]) ?>" required>

        <label>Ngày sinh</label>
        <input type="date" name="ngaysinh" value="<?= htmlspecialchars($student[3]) ?>" required>

        <label>Địa chỉ</label>
        <input type="text" name="diachi" value="<?= htmlspecialchars($student[4]) ?>" required>

        <label>Lớp</label>
        <input type="text" name="lop" value="<?= htmlspecialchars($student[5]) ?>" required>

        <label>Email</label>
        <input type="text" name="email" value="<?= htmlspecialchars($student[6]) ?>" required>

        <label>Số điện thoại</label>
        <input type="text" name="sdt" value="<?= htmlspecialchars($student[7]) ?>" required>

        <label>Ngành học</label>
        <input type="text" name="nganhhoc" value="<?= htmlspecialchars($student[8]) ?>" required>

        <label>Điểm trung bình</label>
        <input type="number" step="0.01" name="diemtb" value="<?= htmlspecialchars($student[9]) ?>" required>

        <label>Ghi chú</label>
        <input type="text" name="ghichu" value="<?= htmlspecialchars($student[10]) ?>">

        <input type="submit" value="Cập nhật sinh viên">
    </form>
</div>
</body>
</html>
