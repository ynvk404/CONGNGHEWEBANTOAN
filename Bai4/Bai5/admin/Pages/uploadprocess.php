<?php
// Xử lý upload ngay trong index.php (theo query page=uploadprocess)
if (isset($_GET['page']) && $_GET['page'] === 'uploadprocess') {
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['files'])) {
        echo "<h3 style='margin-left: 450px;'>Kết quả upload:</h3><ul style='margin-left: 380px;'>";

        foreach ($_FILES['files']['name'] as $key => $name) {
            if (!empty($name)) {
                $tmpName = $_FILES['files']['tmp_name'][$key];
                $fileName = basename($name);
                $targetFile = $uploadDir . $fileName;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    echo "<li>$fileName - <a href='$targetFile' download>Tải xuống</a></li>";
                } else {
                    echo "<li>$fileName - Upload thất bại</li>";
                }
            }
        }

        echo "</ul>";
    }
}
?>