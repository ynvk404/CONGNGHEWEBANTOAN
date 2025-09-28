<style>
    /* Reset cơ bản */
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eef2f7;
        display: flex;
        justify-content: center;
        padding: 50px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
        font-size: 26px;
    }

    form {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        margin-left: 200px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        width: 500px;
        display: flex;
        flex-direction: column;
    }

    label {
        margin-top: 15px;
        font-weight: 600;
        color: #555;
    }

    input[type=text],
    input[type=number],
    input[type=date],
    select {
        width: 100%;
        padding: 10px 12px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type=text]:focus,
    input[type=number]:focus,
    input[type=date]:focus,
    select:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px rgba(76,175,80,0.5);
        outline: none;
    }

    input[type=submit] {
        margin-top: 25px;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s;
    }

    input[type=submit]:hover {
        background-color: #45a049;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    a {
        display: block;
        margin-top: 15px;
        text-align: center;
        text-decoration: none;
        color: #4CAF50;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    p {
        text-align: center;
        font-weight: bold;
        margin-bottom: 15px;
    }
</style>

<?php
include 'db.php';

$type = $_GET['type'] ?? '';
if (!$type || ($type != 'lop' && $type != 'hs')) {
    echo "Loại bản ghi không hợp lệ";
    exit;
}


// ===================== CHỈNH SỬA LỚP =====================
if ($type == 'lop') {
    $malop = $_GET['malop'] ?? '';
    if (!$malop) { echo "Không có MALOP"; exit; }

    $sql = "SELECT * FROM LOP WHERE MALOP='$malop'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) { echo "Không tìm thấy lớp"; exit; }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tenlop = $_POST['tenlop'];
        $khoahoc = $_POST['khoahoc'];
        $gvcn = $_POST['gvcn'];

        $sql_update = "UPDATE LOP SET TENLOP='$tenlop', KHOAHOC=$khoahoc, GVCN='$gvcn' WHERE MALOP='$malop'";
        if ($conn->query($sql_update) === TRUE) {
            echo "<p style='color:green;'>Cập nhật lớp thành công!</p>";
            echo "<a href='index.php?page=view'>Quay lại danh sách lớp</a>";
            exit;
        } else {
            echo "<p style='color:red;'>Lỗi: ".$conn->error."</p>";
        }
    }

    // Form lớp
    ?>
    <h2>Chỉnh sửa lớp</h2>
    <form method="post">
        <label>Mã lớp:</label>
        <input type="text" value="<?php echo $row['MALOP']; ?>" disabled>
        <label for="tenlop">Tên lớp:</label>
        <input type="text" name="tenlop" value="<?php echo $row['TENLOP']; ?>" required>
        <label for="khoahoc">Khóa học:</label>
        <input type="number" name="khoahoc" value="<?php echo $row['KHOAHOC']; ?>" required>
        <label for="gvcn">Giáo viên chủ nhiệm:</label>
        <input type="text" name="gvcn" value="<?php echo $row['GVCN']; ?>" required>
        <input type="submit" value="Cập nhật lớp">
    </form>
    <?php
}

// ===================== CHỈNH SỬA HỌC SINH =====================
if ($type == 'hs') {
    $mahs = $_GET['mahs'] ?? '';
    if (!$mahs) { echo "Không có MAHS"; exit; }

    $sql = "SELECT * FROM HOSO WHERE MAHS='$mahs'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) { echo "Không tìm thấy học sinh"; exit; }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $lop = $_POST['lop'];
        $diemtoan = $_POST['diemtoan'];
        $diemly = $_POST['diemly'];
        $diemhoa = $_POST['diemhoa'];

        $sql_update = "UPDATE HOSO SET HOTEN='$hoten', NGAYSINH='$ngaysinh', DIACHI='$diachi', LOP='$lop',
                        DIEMTOAN=$diemtoan, DIEMLY=$diemly, DIEMHOA=$diemhoa
                        WHERE MAHS='$mahs'";

        if ($conn->query($sql_update) === TRUE) {
            echo "<p style='color:green;'>Cập nhật học sinh thành công!</p>";
            echo "<a href='index.php?page=view2'>Quay lại danh sách học sinh</a>";
            exit;
        } else {
            echo "<p style='color:red;'>Lỗi: ".$conn->error."</p>";
        }
    }

    // Form học sinh
    ?>
    <h2>Chỉnh sửa học sinh</h2>
    <form method="post">
        <label>Mã học sinh:</label>
        <input type="text" value="<?php echo $row['MAHS']; ?>" disabled>
        <label for="hoten">Họ và tên:</label>
        <input type="text" name="hoten" value="<?php echo $row['HOTEN']; ?>" required>
        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" name="ngaysinh" value="<?php echo $row['NGAYSINH']; ?>" required>
        <label for="diachi">Địa chỉ:</label>
        <input type="text" name="diachi" value="<?php echo $row['DIACHI']; ?>" required>
        <label for="lop">Lớp:</label>
        <select name="lop" required>
            <?php
            $lop_result = $conn->query("SELECT MALOP, TENLOP FROM LOP");
            while($lop_row = $lop_result->fetch_assoc()) {
                $selected = ($row['LOP'] == $lop_row['MALOP']) ? "selected" : "";
                echo "<option value='{$lop_row['MALOP']}' $selected>{$lop_row['MALOP']} - {$lop_row['TENLOP']}</option>";
            }
            ?>
        </select>
        <label for="diemtoan">Điểm Toán:</label>
        <input type="number" step="0.01" name="diemtoan" value="<?php echo $row['DIEMTOAN']; ?>" required>
        <label for="diemly">Điểm Lý:</label>
        <input type="number" step="0.01" name="diemly" value="<?php echo $row['DIEMLY']; ?>" required>
        <label for="diemhoa">Điểm Hóa:</label>
        <input type="number" step="0.01" name="diemhoa" value="<?php echo $row['DIEMHOA']; ?>" required>
        <input type="submit" value="Cập nhật học sinh">
    </form>
    <?php
}
?>
