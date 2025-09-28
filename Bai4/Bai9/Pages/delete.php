<?php
session_start(); 

// Lấy id từ URL
$id = $_GET['id'] ?? 0;

// Danh sách file cần xử lý
$files = ['student.txt', 'student_details.txt'];

$found = false;

foreach ($files as $file) {
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $newLines = [];

        foreach ($lines as $line) {
            $data = explode(',', $line);
            if ($data[0] != $id) {
                $newLines[] = $line;
            } else {
                $found = true; // Đánh dấu tìm thấy sinh viên
            }
        }

        // Ghi lại file
        file_put_contents($file, implode(PHP_EOL, $newLines) . PHP_EOL);
    }
}

// Thông báo kết quả
if ($found) {
    $_SESSION['message'] = "Xóa sinh viên thành công!";
    $_SESSION['msg_type'] = "success";
} else {
    $_SESSION['message'] = "Không tìm thấy sinh viên để xóa!";
    $_SESSION['msg_type'] = "error";
}

// Chuyển hướng về danh sách
header("Location: index.php?page=list");
exit;
?>
