<?php
// Xử lý phép tính trước
$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = isset($_POST['a']) ? (int)$_POST['a'] : 0;
    $b = isset($_POST['b']) ? (int)$_POST['b'] : 0;
    $operator = $_POST['operator'] ?? '';

    switch ($operator) {
        case '+':
            $result = "$a + $b = " . ($a + $b);
            break;
        case '-':
            $result = "$a - $b = " . ($a - $b);
            break;
        case '*':
            $result = "$a * $b = " . ($a * $b);
            break;
        case '/':
            if ($b == 0) {
                $result = "Không thể chia cho 0";
            } else {
                $result = "$a / $b = " . ($a / $b);
            }
            break;
        default:
            $result = "Vui lòng chọn phép tính.";
    }
}
?>

<div class="content-calculate1">
    <form method="post" action="">
        <input type="number" name="a" required placeholder="Số A">
        <input type="number" name="b" required placeholder="Số B">
        <br><br>
        <label><input type="radio" name="operator" value="+"> +</label>
        <label><input type="radio" name="operator" value="-"> -</label>
        <label><input type="radio" name="operator" value="*"> *</label>
        <label><input type="radio" name="operator" value="/"> /</label>
        <br><br>
        <button type="submit" class="button">Calculate</button>
    </form>

    <strong>Kết quả: </strong><?php echo $result; ?>
</div>
