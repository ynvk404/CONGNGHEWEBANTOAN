<?php
include 'db.php';

$type = $_GET['type'] ?? '';
if (!$type || ($type != 'lop' && $type != 'hs')) {
    echo "<p>Loại bản ghi không hợp lệ</p>";
    exit;
}

// Xác định key
$key = ($type == 'lop') ? ($_GET['malop'] ?? '') : ($_GET['hs'] ?? $_GET['mahs'] ?? '');
if (!$key) {
    echo "<p>Không có bản ghi để xóa</p>";
    exit;
}

// Xử lý khi confirm
if (isset($_POST['confirm'])) {
    if ($type == 'lop') {
        $sql = "DELETE FROM LOP WHERE MALOP='$key'";
        $redirect = 'index.php?page=view';
    } else {
        $sql = "DELETE FROM HOSO WHERE MAHS='$key'";
        $redirect = 'index.php?page=view2';
    }

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:#2e7d32; font-weight:bold; font-size:18px; text-align:center; margin-bottom:20px;'>Xóa bản ghi thành công!</p>";
        echo "<a href='$redirect' style='display:inline-block; padding:10px 20px; background-color:#4CAF50; color:white; text-decoration:none; border-radius:6px; font-weight:bold; text-align:center;'>Quay lại danh sách</a>";
    } else {
        echo "<p style='color:#d32f2f; font-weight:bold; font-size:18px; text-align:center; margin-bottom:20px;'>Lỗi: ".$conn->error."</p>";
        echo "<a href='$redirect' style='display:inline-block; padding:10px 20px; background-color:#4CAF50; color:white; text-decoration:none; border-radius:6px; font-weight:bold; text-align:center;'>Quay lại danh sách</a>";
    }
    exit;
}

// Form xác nhận
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Xóa bản ghi</title>
<style>
    /* Reset cơ bản */
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eef2f7;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .confirm-box {
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        width: 400px;
        text-align: center;
    }

    p {
        font-size: 18px;
        margin-bottom: 25px;
        color: #333;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        margin: 0 10px;
        transition: all 0.3s;
    }

    .btn-confirm {
        background-color: #f44336;
        color: white;
    }

    .btn-confirm:hover {
        background-color: #d32f2f;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .btn-cancel {
        background-color: #ccc;
        color: #333;
    }

    .btn-cancel:hover {
        background-color: #999;
        transform: translateY(-2px);
    }

    .success { 
        color: green; 
        font-weight: bold; 
        text-align: center; 
        margin-bottom: 20px;
    }

    .error { 
        color: red; 
        font-weight: bold; 
        text-align: center; 
        margin-bottom: 20px;
    }

    a { 
        display: inline-block; 
        margin-top: 15px; 
        color: #4CAF50; 
        font-weight: bold; 
        text-decoration: none; 
    }

    a:hover { 
        text-decoration: underline; 
    }
</style>

</head>
<body>

<div class="confirm-box" style="margin-left: 370px">
    <p>Bạn có chắc muốn xóa <?php echo ($type=='lop') ? 'lớp' : 'học sinh'; ?> này không?</p>
    <form method="post">
        <button type="submit" name="confirm" class="btn btn-confirm">Xóa</button>
        <a href="<?php echo ($type=='lop') ? 'index.php?page=view' : 'index.php?page=view2'; ?>" class="btn btn-cancel">Hủy</a>
    </form>
</div>

</body>
</html>
