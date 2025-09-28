<?php
require_once __DIR__ . '/../configs/database.php';

function connectDB() {
    $conn = mysqli_connect(DATABASE_SERVER, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    // Thiết lập charset UTF-8 để tránh lỗi tiếng Việt
    mysqli_set_charset($conn, "utf8");
    return $conn;
}
?>
