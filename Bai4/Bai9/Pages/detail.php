<?php
// Lấy id từ URL
$id = $_GET['id'] ?? 0;

// Đọc file student_details.txt
$student = null;
if (file_exists('student_details.txt')) {
    foreach (file('student_details.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $data = explode(',', $line);
        if ($data[0] == $id) {
            $student = $data;
            break;
        }
    }
}

// Nếu không có sinh viên -> thoát luôn
if (!$student) {
    echo "<p>Không tìm thấy sinh viên này.</p>";
    echo '<a href="index.php?page=list" class="back-button">Quay lại danh sách</a>';
    exit;
}
?>

<div class="detail-container">
    <h2>Chi tiết sinh viên</h2>

    <!-- Avatar -->
    <div style="text-align:center; margin-bottom:15px;">
        <img src="avatar/<?= htmlspecialchars($student[1]) ?>" 
             alt="Avatar"
             style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:2px solid #4CAF50;">
    </div>

    <!-- Thông tin -->
    <table>
        <tr>
            <th>STT</th>
            <td><?= htmlspecialchars($student[0]) ?></td>
        </tr>
        <tr>
            <th>TÊN</th>
            <td><?= htmlspecialchars($student[2]) ?></td>
        </tr>
        <tr>
            <th>NGÀY SINH</th>
            <td><?= htmlspecialchars($student[3]) ?></td>
        </tr>
        <tr>
            <th>ĐỊA CHỈ</th>
            <td><?= htmlspecialchars($student[4]) ?></td>
        </tr>
        <tr>
            <th>LỚP</th>
            <td><?= htmlspecialchars($student[5]) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($student[6]) ?></td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><?= htmlspecialchars($student[7]) ?></td>
        </tr>
        <tr>
            <th>Ngành học</th>
            <td><?= htmlspecialchars($student[8]) ?></td>
        </tr>
        <tr>
            <th>Điểm trung bình</th>
            <td><?= htmlspecialchars($student[9]) ?></td>
        </tr>
        <tr>
            <th>Ghi chú</th>
            <td><?= htmlspecialchars($student[10]) ?></td>
        </tr>
    </table>

    <a href="index.php?page=list" class="back-button">Quay lại danh sách</a>
</div>
