<?php
require_once(__DIR__ . '/../lib/connect.php');
$conn = connectDB();

$query = "SELECT * FROM classes";
?>

<div class="container-flex">
    <!-- Bỏ sidebar, chỉ còn phần nội dung -->
    <div class="student-content">
        <h3>Danh sách lớp(3 cách)</h3>

        <!-- Cách 1 -->
        <div class="class-block">
            <h4>Danh sách các lớp (cách 1 - fetch_row)</h4>
            <ul class="class-list">
                <?php
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_row($result)) {
                        $id = $row[0];
                        $tenLop = $row[1];
                        echo "<li><a href='index.php?page=listStudentsInClass&idClasses=$id'>$tenLop</a></li>";
                    }
                }
                ?>
            </ul>
        </div>

        <!-- Cách 2 -->
        <div class="class-block">
            <h4>Danh sách các lớp (cách 2 - fetch_array)</h4>
            <ul class="class-list">
                <?php
                $result2 = mysqli_query($conn, $query);
                if ($result2 && mysqli_num_rows($result2) > 0) {
                    while ($row = mysqli_fetch_array($result2)) {
                        $id = $row['ID'];
                        $tenLop = $row['ClassName'];
                        echo "<li><a href='index.php?page=listStudentsInClass&idClasses=$id'>$tenLop</a></li>";
                    }
                }
                ?>
            </ul>
        </div>

        <!-- Cách 3 -->
        <div class="class-block">
            <h4>Danh sách các lớp (cách 3 - fetch_assoc)</h4>
            <ul class="class-list">
                <?php
                $result3 = mysqli_query($conn, $query);
                if ($result3 && mysqli_num_rows($result3) > 0) {
                    while ($row = mysqli_fetch_assoc($result3)) {
                        $id = $row['ID'];
                        $tenLop = $row['ClassName'];
                        echo "<li><a href='index.php?page=listStudentsInClass&idClasses=$id'>$tenLop</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
