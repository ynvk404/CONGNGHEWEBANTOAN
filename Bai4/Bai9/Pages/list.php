<div class="table-container">
    <table>
        <tr>
            <th>STT</th>
            <th>TÊN</th>
            <th>NGÀY SINH</th>
            <th>ĐỊA CHỈ</th>
            <th>LỚP</th>
            <th>THAO TÁC</th>
        </tr>
        <?php
        $students = [];

        // Đọc dữ liệu từ file nếu tồn tại
        if (file_exists('student.txt')) {
            $lines = file('student.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $students[] = explode(',', $line);
            }
        }

        // Hiển thị danh sách sinh viên (nếu có)
        foreach ($students as $s) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($s[0]) . '</td>';
            echo '<td>' . htmlspecialchars($s[1]) . '</td>';
            echo '<td>' . htmlspecialchars($s[2]) . '</td>';
            echo '<td>' . htmlspecialchars($s[3]) . '</td>';
            echo '<td>' . htmlspecialchars($s[4]) . '</td>';
            echo '<td>
                    <a href="index.php?page=detail&id=' . urlencode($s[0]) . '" class="view">Xem</a>
                    <a href="index.php?page=edit&id=' . urlencode($s[0]) . '" class="edit">Sửa</a>
                    <a href="index.php?page=delete&id=' . urlencode($s[0]) . '" class="delete" onclick="return confirm(\'Bạn có chắc muốn xóa?\')">Xóa</a>
                  </td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
