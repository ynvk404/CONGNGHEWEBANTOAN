<?php
// =======================
// XỬ LÝ MẢNG 1 CHIỀU
// =======================

// Tìm min trong mảng
function minDay($mangSo)
{
    return min($mangSo);
}

// Tìm max trong mảng
function maxDay($mangSo)
{
    return max($mangSo);
}

// Tính trung bình cộng
function avgDay($mangSo)
{
    $tong = array_sum($mangSo);
    $soPhanTu = count($mangSo);

    if ($soPhanTu > 0) {
        return $tong / $soPhanTu;
    } else {
        return 0;
    }
}

// Sắp xếp tăng dần
function sortDay($mangSo)
{
    $copy = $mangSo;
    sort($copy); // sắp xếp tăng
    return $copy;
}

// Đảo ngược dãy
function daoNguocDay($mangSo)
{
    return array_reverse($mangSo);
}


// =======================
// XỬ LÝ MA TRẬN 2 CHIỀU
// =======================

// Tìm phần tử lớn nhất trong ma trận
function maxMatran($mang2Chieu)
{
    $maxVal = PHP_INT_MIN;
    foreach ($mang2Chieu as $row) {
        $maxVal = max($maxVal, max($row));
    }
    return $maxVal;
}

// Tìm phần tử nhỏ nhất trong ma trận
function minMatran($mang2Chieu)
{
    $minVal = PHP_INT_MAX;
    foreach ($mang2Chieu as $row) {
        $minVal = min($minVal, min($row));
    }
    return $minVal;
}

// Tính tổng trên đường chéo chính
function tongTrenCheoChinh($mang2Chieu)
{
    $tong = 0;
    $n = count($mang2Chieu);
    for ($i = 0; $i < $n; $i++) {
        $tong += $mang2Chieu[$i][$i];
    }
    return $tong;
}

// Tính tổng trên đường chéo phụ
function tongTrenCheoPhu($mang2Chieu)
{
    $tong = 0;
    $n = count($mang2Chieu);
    for ($i = 0; $i < $n; $i++) {
        $tong += $mang2Chieu[$i][$n - $i - 1];
    }
    return $tong;
}

// Cộng 2 ma trận cùng kích thước
function tinhMatranTong($matran1, $matran2)
{
    $rows = count($matran1);
    $cols = count($matran1[0]);
    $result = [];

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $result[$i][$j] = $matran1[$i][$j] + $matran2[$i][$j];
        }
    }
    return $result;
}

// Nhân 2 ma trận
function tinhMatranTich($matran1, $matran2)
{
    $rows1 = count($matran1);
    $cols1 = count($matran1[0]);
    $cols2 = count($matran2[0]);

    $result = [];
    for ($i = 0; $i < $rows1; $i++) {
        for ($j = 0; $j < $cols2; $j++) {
            $sum = 0;
            for ($k = 0; $k < $cols1; $k++) {
                $sum += $matran1[$i][$k] * $matran2[$k][$j];
            }
            $result[$i][$j] = $sum;
        }
    }
    return $result;
}

// Hàm tạo form nhập ma trận
function taoFormNhap($rows, $cols, $name)
{
    echo "<h3>Nhập $name ($rows x $cols)</h3>";
    echo "<table class='matrix-table'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            echo "<td><input type='number' name='{$name}[$i][$j]' required></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Hàm in ma trận ra HTML
function inMatran($matran)
{
    echo "<table class='result-matrix'>";
    foreach ($matran as $row) {
        echo "<tr>";
        foreach ($row as $val) {
            echo "<td>" . htmlspecialchars($val) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Trừ 2 ma trận
function tinhMatranHieu($A, $B)
{
    $rows = count($A);
    $cols = count($A[0]);
    $C = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $C[$i][$j] = $A[$i][$j] - $B[$i][$j];
        }
    }
    return $C;
}

// Chia 2 ma trận
function tinhMatranChia($A, $B)
{
    $rows = count($A);
    $cols = count($A[0]);
    $C = [];

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if (isset($B[$i][$j]) && $B[$i][$j] != 0) {
                $C[$i][$j] = $A[$i][$j] / $B[$i][$j];
            } else {
                $C[$i][$j] = "∞"; // hoặc 0, hoặc null
            }
        }
    }

    return $C;
}
