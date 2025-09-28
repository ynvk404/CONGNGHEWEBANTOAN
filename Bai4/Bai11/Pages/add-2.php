<?php
include 'db.php';

// Xử lý khi submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mahs = $_POST['mahs'];
    $hoten = $_POST['hoten'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $lop = $_POST['lop'];
    $diemtoan = $_POST['diemtoan'];
    $diemly = $_POST['diemly'];
    $diemhoa = $_POST['diemhoa'];

    // Thêm dữ liệu vào bảng HOSO
    $sql = "INSERT INTO HOSO (MAHS, HOTEN, NGAYSINH, DIACHI, LOP, DIEMTOAN, DIEMLY, DIEMHOA) 
            VALUES ('$mahs', '$hoten', '$ngaysinh', '$diachi', '$lop', $diemtoan, $diemly, $diemhoa)";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Thêm học sinh thành công!</p>";
        echo "<a href='index.php?page=view2'>Quay lại danh sách học sinh</a>";
    } else {
        echo "<p style='color:red;'>Lỗi: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm học sinh mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
            width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type=text],
        input[type=number],
        input[type=date] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type=text]:focus,
        input[type=number]:focus,
        input[type=date]:focus {
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

    <h2>Thêm học sinh mới</h2>

    <form method="post" style="margin-left: 200px;">
        <label for="mahs">Mã học sinh:</label>
        <input type="text" name="mahs" required>

        <label for="hoten">Họ và tên:</label>
        <input type="text" name="hoten" required>

        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" name="ngaysinh" required>

        <label for="diachi">Địa chỉ:</label>
        <input type="text" name="diachi" required>

        <label for="lop">Lớp:</label>
        <select name="lop" required>
            <?php
            $lop_result = $conn->query("SELECT MALOP, TENLOP FROM LOP");
            while ($lop_row = $lop_result->fetch_assoc()) {
                echo "<option value='{$lop_row['MALOP']}'>{$lop_row['MALOP']} - {$lop_row['TENLOP']}</option>";
            }
            ?>
        </select>


        <label for="diemtoan">Điểm Toán:</label>
        <input type="number" step="0.01" name="diemtoan" required>

        <label for="diemly">Điểm Lý:</label>
        <input type="number" step="0.01" name="diemly" required>

        <label for="diemhoa">Điểm Hóa:</label>
        <input type="number" step="0.01" name="diemhoa" required>

        <input type="submit" value="Thêm học sinh">
    </form>

</body>

</html>