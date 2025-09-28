<?php
// Khởi tạo mặc định
$rowsA = 2;
$colsA = 2;
$rowsB = 2;
$colsB = 2;
$result = null;
$error = "";

// Nếu submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['rowsA'])) $rowsA = intval($_POST['rowsA']);
    if (isset($_POST['colsA'])) $colsA = intval($_POST['colsA']);
    if (isset($_POST['rowsB'])) $rowsB = intval($_POST['rowsB']);
    if (isset($_POST['colsB'])) $colsB = intval($_POST['colsB']);
}

// Hàm nhân ma trận
function multiplyMatrices($a, $b) {
    $rowsA = count($a);
    $colsA = count($a[0]);
    $rowsB = count($b);
    $colsB = count($b[0]);

    if ($colsA != $rowsB) {
        return null;
    } else {
        $result = [];
        for ($i = 0; $i < $rowsA; $i++) {
            for ($j = 0; $j < $colsB; $j++) {
                $sum = 0;
                for ($k = 0; $k < $colsA; $k++) {
                    $sum += $a[$i][$k] * $b[$k][$j];
                }
                $result[$i][$j] = $sum;
            }
        }
        return $result;
    }
}

// Xử lý submit form nhân ma trận
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['compute'])) {
        $matrixA = $matrixB = [];

        // Lấy dữ liệu ma trận A
        for ($i = 0; $i < $rowsA; $i++) {
            for ($j = 0; $j < $colsA; $j++) {
                $matrixA[$i][$j] = intval($_POST["a{$i}_{$j}"] ?? 0);
            }
        }

        // Lấy dữ liệu ma trận B
        for ($i = 0; $i < $rowsB; $i++) {
            for ($j = 0; $j < $colsB; $j++) {
                $matrixB[$i][$j] = intval($_POST["b{$i}_{$j}"] ?? 0);
            }
        }

        // Nhân ma trận
        $result = multiplyMatrices($matrixA, $matrixB);

        if ($result === null) {
            $error = "Không thể nhân: số cột A phải bằng số dòng B.";
        }
    }
}
?>

<div class="content-array">
    <h2>Nhân hai ma trận</h2>

    <!-- Form chọn kích thước -->
    <form method="post" class="matrix-size-form">
        <label>Kích thước Ma trận A:</label>
        <input type="number" name="rowsA" value="<?= htmlspecialchars($rowsA) ?>" min="1"> x 
        <input type="number" name="colsA" value="<?= htmlspecialchars($colsA) ?>" min="1"><br><br>

        <label>Kích thước Ma trận B:</label>
        <input type="number" name="rowsB" value="<?= htmlspecialchars($rowsB) ?>" min="1"> x 
        <input type="number" name="colsB" value="<?= htmlspecialchars($colsB) ?>" min="1"><br><br>

        <button type="submit" name="setsize">Tạo ô nhập</button>
    </form>

    <?php
    // Nếu bấm "Tạo ô nhập"
    if (isset($_POST['setsize'])) {
        echo '<form method="post" class="matrix-input-form">';
        echo '<input type="hidden" name="rowsA" value="' . htmlspecialchars($rowsA) . '">';
        echo '<input type="hidden" name="colsA" value="' . htmlspecialchars($colsA) . '">';
        echo '<input type="hidden" name="rowsB" value="' . htmlspecialchars($rowsB) . '">';
        echo '<input type="hidden" name="colsB" value="' . htmlspecialchars($colsB) . '">';

        // Ma trận A
        echo '<h3>Nhập Ma trận A</h3><table>';
        for ($i = 0; $i < $rowsA; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $colsA; $j++) {
                $val = intval($_POST["a{$i}_{$j}"] ?? 0);
                echo "<td><input type='number' name='a{$i}_{$j}' value='$val' required></td>";
            }
            echo '</tr>';
        }
        echo '</table>';

        // Ma trận B
        echo '<h3>Nhập Ma trận B</h3><table>';
        for ($i = 0; $i < $rowsB; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $colsB; $j++) {
                $val = intval($_POST["b{$i}_{$j}"] ?? 0);
                echo "<td><input type='number' name='b{$i}_{$j}' value='$val' required></td>";
            }
            echo '</tr>';
        }
        echo '</table>';

        echo '<button type="submit" name="compute">Tính kết quả</button>';
        echo '</form>';
    }

    // Thông báo lỗi
    if (!empty($error)) {
        echo "<p class='error-message'>$error</p>";
    }

    // Kết quả nhân ma trận
    if ($result && empty($error)) {
        echo "<h3>Kết quả (A × B)</h3>";
        echo "<table class='result-table'>";
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>$val</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</div>
