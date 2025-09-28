<?php
$result = '';
$array = [];
$showResult = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['numbers']) && is_array($_POST['numbers'])) {
        $array = $_POST['numbers'];

        // Xử lý dữ liệu
        foreach ($array as &$val) {
            $val = trim($val);
            if (!is_numeric($val)) {
                $val = 0;
            }
        }
        unset($val);

        if (count($array) > 0) {
            $sum = array_sum($array);
            $max = max($array);
            $min = min($array);
            $avg = $sum / count($array);

            $result = [
                'sum' => $sum,
                'max' => $max,
                'min' => $min,
                'avg' => $avg
            ];
            $showResult = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài toán mảng</title>
    <style>
        input[type="number"] {
            width: 50px;
            margin: 5px;
            padding: 5px;
            background-color: #ffffcc;
        }
        .result-box {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <h3>Thao tác trên mảng 1 chiều</h3>
    <h3>Bài toán: nhập vào chuỗi số, tính tổng, trung bình, min, max</h3>
    <form method="post">
        <?php
        // Hiển thị 10 ô nhập số
        for ($i = 0; $i < 15; $i++) {
            $val = '';
            if (isset($array[$i])) {
                $val = htmlspecialchars($array[$i]);
            }
            echo "<input type='number' name='numbers[]' value='$val'>";
        }
        ?>
        <br><br>
        <button type="reset">Reset</button>
        <button type="submit">Calculate</button>
    </form>

    <?php
    // In kết quả nếu có
    if ($showResult === true) {
        echo '<div class="result-box">';
        echo '<p>Tổng: <b>' . $result['sum'] . '</b></p>';
        echo '<p>Trung bình cộng: <b>' . $result['avg'] . '</b></p>';
        echo '<p>Giá trị lớn nhất: <b>' . $result['max'] . '</b></p>';
        echo '<p>Giá trị nhỏ nhất: <b>' . $result['min'] . '</b></p>';
        echo '</div>';
    }
    ?>
</body>
</html>
