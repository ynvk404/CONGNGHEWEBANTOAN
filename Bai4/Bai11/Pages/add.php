<?php
include 'db.php';

// Xử lý khi submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $malop = $_POST['malop'];
    $tenlop = $_POST['tenlop'];
    $khoahoc = $_POST['khoahoc'];
    $gvcn = $_POST['gvcn'];

    // Thêm dữ liệu vào bảng LOP
    $sql = "INSERT INTO LOP (MALOP, TENLOP, KHOAHOC, GVCN) 
            VALUES ('$malop', '$tenlop', $khoahoc, '$gvcn')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Thêm lớp thành công!</p>";
        echo "<a href='index.php?page=view'>Quay lại danh sách lớp</a>";
    } else {
        echo "<p style='color:red;'>Lỗi: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm lớp mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }

        input[type=text],
        input[type=number] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type=text]:focus,
        input[type=number]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        input[type=submit] {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #4CAF50;
            text-align: center;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Thêm lớp mới</h2>

    <form method="post" style="margin-left: 250px;">
        <label for="malop">Mã lớp:</label>
        <input type="text" name="malop" required>

        <label for="tenlop">Tên lớp:</label>
        <input type="text" name="tenlop" required>

        <label for="khoahoc">Khóa học:</label>
        <input type="number" name="khoahoc" required>

        <label for="gvcn">Giáo viên chủ nhiệm:</label>
        <input type="text" name="gvcn" required>

        <input type="submit" value="Thêm lớp">
    </form>

</body>

</html>