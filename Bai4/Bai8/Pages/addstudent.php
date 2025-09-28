<?php
// addStudent.php

$message = ""; 
$messageHtml = ""; // HTML để in ra

$file = __DIR__ . '/../student.txt'; // đường dẫn file student.txt

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = "";
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
    }

    $address = "";
    if (isset($_POST['address'])) {
        $address = trim($_POST['address']);
    }

    $age = "";
    if (isset($_POST['age'])) {
        $age = trim($_POST['age']);
    }

    $email = "";
    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
    }

    // Kiểm tra dữ liệu hợp lệ
    if ($name !== "" && $address !== "" && $age !== "" && $email !== "") {
        // Tạo dòng CSV
        $line = $name . "," . $address . "," . $age . "," . $email . PHP_EOL;

        // Ghi thêm vào file
        if (file_put_contents($file, $line, FILE_APPEND | LOCK_EX) !== false) {
            $message = "Thêm sinh viên thành công!";
        } else {
            $message = "Lỗi khi ghi vào file.";
        }
    } else {
        $message = "Vui lòng nhập đầy đủ thông tin.";
    }
}

// Xử lý HTML cho message
if ($message !== "") {
    $messageHtml = "<div class='message'>" . htmlspecialchars($message) . "</div>";
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
            background: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-weight: 600;
        }
        input[type="text"], input[type="number"], input[type="email"] {
            width: 60%;
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #1abc9c;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover {
            background-color: #16a085;
        }
        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: 600;
            color: #e74c3c;
        }
        .back {
            text-align: center;
            margin-top: 20px;
        }
        .back a {
            text-decoration: none;
            padding: 8px 15px;
            background-color: #333;
            color: white;
            border-radius: 6px;
        }
        .back a:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <form method="post">
        <label>Tên:
            <input type="text" name="name" required>
        </label>
        <label>Địa chỉ:
            <input type="text" name="address" required>
        </label>
        <label>Tuổi:
            <input type="number" name="age" required>
        </label>
        <label>Email:
            <input type="email" name="email" required>
        </label>
        <button type="submit">Thêm sinh viên</button>
    </form>

    <?php echo $messageHtml; ?>

    <div class="back">
        <a href="index.php?page=liststudent">Quay lại danh sách</a>
    </div>
</body>
</html>
