<?php
// listStudent.php

// Khởi tạo mảng lưu sinh viên
$students = [];

$file = __DIR__ . '/../student.txt'; 
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $index => $line) {
        // Chia dữ liệu theo dấu phẩy
        $data = explode(",", $line);

        // Nếu dòng đủ 4 trường: Tên, Địa chỉ, Tuổi, Email
        if (count($data) == 4) {
            // Thêm STT (thứ tự) ở vị trí đầu
            $students[] = array_merge([$index + 1], $data);
        }
    }
}

// Tạo nội dung bảng
$tableRows = "";
if (!empty($students)) {
    foreach ($students as $stu) {
        $tableRows .= "<tr>";
        $tableRows .= "<td>" . htmlspecialchars($stu[0]) . "</td>";
        $tableRows .= "<td>" . htmlspecialchars($stu[1]) . "</td>";
        $tableRows .= "<td>" . htmlspecialchars($stu[2]) . "</td>";
        $tableRows .= "<td>" . htmlspecialchars($stu[3]) . "</td>";
        $tableRows .= "<td>" . htmlspecialchars($stu[4]) . "</td>";
        $tableRows .= "</tr>";
    }
} else {
    $tableRows .= "<tr><td colspan='5'>Chưa có sinh viên nào.</td></tr>";
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 20px;
            border: 1px solid #bdc3c7;
            text-align: center;
        }

        th {
            background-color: #1abc9c;
            color: white;
        }

        tr:nth-child(even) td {
            background-color: #ecf0f1;
        }

        tr:hover td {
            background-color: #16a085;
            color: white;
            transition: all 0.3s;
        }

        a {
            display: inline-block;
            margin: 20px auto;
            text-decoration: none;
            padding: 8px 15px;
            background-color: #27ae60;
            color: white;
            border-radius: 6px;
            font-weight: 600;
        }

        a:hover {
            background-color: #16a085;
        }

        .menu-center a {
            background-color: #27ae60;
        }
    </style>
</head>

<body>
    <h1>Danh sách sinh viên</h1>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Địa Chỉ</th>
            <th>Tuổi</th>
            <th>Email</th>
        </tr>
        <?php echo $tableRows; ?>
    </table>
    <div style="text-align:center;">
        <a href="index.php">Quay về Home</a>
    </div>
</body>

</html>
