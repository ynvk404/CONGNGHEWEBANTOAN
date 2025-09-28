<?php
include(__DIR__ . "/../libs/math.php");

// Kích thước mặc định
$rows = 3;
$cols = 3;

$matran1 = [];
$matran2 = [];
$result = [
    'max1' => null,
    'min1' => null,
    'cheoChinh1' => null,
    'cheoPhu1' => null,
    'max2' => null,
    'min2' => null,
    'cheoChinh2' => null,
    'cheoPhu2' => null,
    'tong' => null,
    'hieu' => null,
    'chia' => null,
    'tich' => null
];
$showResult = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $matran1 = $_POST['matran1'] ?? [];
    $matran2 = $_POST['matran2'] ?? [];

    // Chuẩn hóa dữ liệu nhập vào
    foreach ($matran1 as &$row) {
        foreach ($row as &$val) {
            if (!is_numeric($val)) {
                $val = 0;
            }
        }
    }
    unset($val);

    foreach ($matran2 as &$row) {
        foreach ($row as &$val) {
            if (!is_numeric($val)) {
                $val = 0;
            }
        }
    }
    unset($val);

    // Tính toán trên ma trận 1
    $result['max1'] = maxMatran($matran1);
    $result['min1'] = minMatran($matran1);
    $result['cheoChinh1'] = tongTrenCheoChinh($matran1);
    $result['cheoPhu1'] = tongTrenCheoPhu($matran1);

    // Tính toán trên ma trận 2
    $result['max2'] = maxMatran($matran2);
    $result['min2'] = minMatran($matran2);
    $result['cheoChinh2'] = tongTrenCheoChinh($matran2);
    $result['cheoPhu2'] = tongTrenCheoPhu($matran2);

    // Tính toán giữa 2 ma trận
    $result['tong'] = tinhMatranTong($matran1, $matran2);
    $result['hieu'] = tinhMatranHieu($matran1, $matran2);
    $result['chia'] = tinhMatranChia($matran1, $matran2);
    $result['tich'] = tinhMatranTich($matran1, $matran2);

    $showResult = true;
}
?>

<div class="content-matrix">
    <h2>Sử dụng mảng để tính toán trên 2 ma trận 3 × 3</h2>

    <form method="post" class="form-matrix">
        <div class="matrix-box">
            <h3>Ma trận 1</h3>
            <?php taoFormNhap($rows, $cols, "matran1"); ?>
        </div>

        <div class="matrix-box">
            <h3>Ma trận 2</h3>
            <?php taoFormNhap($rows, $cols, "matran2"); ?>
        </div>

        <div class="form-actions">
            <button type="submit">Tính toán</button>
            <button type="reset">Reset</button>
        </div>
    </form>

    <?php
    if ($showResult === true) {
        // Ma trận 1
        echo "<h2>Kết quả xử lý trên Ma trận 1</h2>";
        echo "<ul>";
        echo "<li>Giá trị lớn nhất: <b>{$result['max1']}</b></li>";
        echo "<li>Giá trị nhỏ nhất: <b>{$result['min1']}</b></li>";
        echo "<li>Tổng trên đường chéo chính: <b>{$result['cheoChinh1']}</b></li>";
        echo "<li>Tổng trên đường chéo phụ: <b>{$result['cheoPhu1']}</b></li>";
        echo "</ul>";

        // Ma trận 2
        echo "<h2>Kết quả xử lý trên Ma trận 2</h2>";
        echo "<ul>";
        echo "<li>Giá trị lớn nhất: <b>{$result['max2']}</b></li>";
        echo "<li>Giá trị nhỏ nhất: <b>{$result['min2']}</b></li>";
        echo "<li>Tổng trên đường chéo chính: <b>{$result['cheoChinh2']}</b></li>";
        echo "<li>Tổng trên đường chéo phụ: <b>{$result['cheoPhu2']}</b></li>";
        echo "</ul>";

        // Giữa 2 ma trận
        echo "<h2>Tổng A + B</h2>";
        inMatran($result['tong']);

        echo "<h2>Hiệu A - B</h2>";
        inMatran($result['hieu']);

        echo "<h2>Thương A / B (chia từng phần tử)</h2>";
        inMatran($result['chia']);

        echo "<h2>Tích A × B</h2>";
        inMatran($result['tich']);
    }
    ?>
</div>
