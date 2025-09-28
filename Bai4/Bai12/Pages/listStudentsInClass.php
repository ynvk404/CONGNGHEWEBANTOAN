<?php
require_once(__DIR__ . '/../lib/connect.php');
$conn = connectDB();
?>

<div class="layout-container">
    <!-- Cột trái: include lại ListClass -->
    <div class="sidebar">
        <?php include __DIR__ . '/ListClass.php'; ?>
    </div>

    <!-- Cột phải: danh sách sinh viên -->
    <div class="main-content">
        <?php
        if (isset($_GET['idClasses'])) {
            $idClasses = intval($_GET['idClasses']);

            // Lấy tên lớp
            $queryClass = "SELECT ClassName FROM classes WHERE ID = $idClasses";
            $resultClass = mysqli_query($conn, $queryClass);
            $classRow   = mysqli_fetch_assoc($resultClass);
            $className  = $classRow['ClassName'];

            echo "<h3 class='student-title'>DANH SÁCH SINH VIÊN TRONG LỚP $className</h3>";

            $queryStudents = "SELECT * FROM students WHERE ClassID = $idClasses";
            $resultStudents = mysqli_query($conn, $queryStudents);

            if ($resultStudents && mysqli_num_rows($resultStudents) > 0) {
                echo "<table class='student-table'>";
                echo "<tr><th>Tên</th><th>Giới tính</th><th>Địa chỉ</th><th>Email</th><th>Thao tác</th></tr>";
                while ($row = mysqli_fetch_assoc($resultStudents)) {
                    $id = $row['ID'];
                    echo "<tr>";
                    echo "<td>{$row['StudentName']}</td>";
                    echo "<td>{$row['StudentGender']}</td>";
                    echo "<td>{$row['StudentAddress']}</td>";
                    echo "<td>{$row['StudentEmail']}</td>";
                    echo "<td><a class='btn-detail' href='index.php?page=studentDetail&idStudent=$id'>Detail</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-data'>Không có sinh viên trong lớp này.</p>";
            }
        } else {
            echo "<p class='no-data'>Chọn một lớp ở bên trái để xem danh sách sinh viên.</p>";
        }
        ?>
    </div>
</div>

<?php mysqli_close($conn); ?>
