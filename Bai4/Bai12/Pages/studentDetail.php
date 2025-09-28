<?php
require_once(__DIR__ . '/../lib/connect.php');
$conn = connectDB();

if (isset($_GET['idStudent'])) {
    $id = intval($_GET['idStudent']);

    $query = "SELECT * FROM students WHERE ID = $id";
    $res = mysqli_query($conn, $query);

    if ($res && $row = mysqli_fetch_assoc($res)) {
        ?>
        <div class="student-detail">
            <h3>Thông tin chi tiết sinh viên</h3>

            <!-- Ảnh sinh viên đặt lên đầu -->
            <div class="student-avatar">
                <?php if (!empty($row['StudentImage'])): ?>
                    <img src="<?= htmlspecialchars($row['StudentImage']) ?>" 
                         alt="Ảnh <?= htmlspecialchars($row['StudentName']) ?>" 
                         class="student-img">
                <?php else: ?>
                    <div class="no-img">Chưa có ảnh</div>
                <?php endif; ?>
            </div>

            <!-- Thông tin sinh viên -->
            <div class="info-item"><b>ID:</b> <span><?= htmlspecialchars($row['ID']) ?></span></div>
            <div class="info-item"><b>Họ và tên:</b> <span><?= htmlspecialchars($row['StudentName']) ?></span></div>
            <div class="info-item"><b>Địa chỉ:</b> <span><?= htmlspecialchars($row['StudentAddress']) ?></span></div>
            <div class="info-item"><b>Giới tính:</b> <span><?= htmlspecialchars($row['StudentGender']) ?></span></div>
            <div class="info-item"><b>Email:</b> <span><?= htmlspecialchars($row['StudentEmail']) ?></span></div>

            <a href="javascript:history.back()" class="btn-back">⬅ Quay lại</a>
        </div>
        <?php
    } else {
        echo "<p>Không tìm thấy sinh viên.</p>";
    }
} else {
    echo "<p>Không có dữ liệu sinh viên.</p>";
}
mysqli_close($conn);
?>
