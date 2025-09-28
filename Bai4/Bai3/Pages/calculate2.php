<?php
// calculate2.php
$result = '';
$name = $className = $m1 = $m2 = $m3 = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $className = $_POST['className'];
    $m1 = (float) $_POST['m1'];
    $m2 = (float) $_POST['m2'];
    $m3 = (float) $_POST['m3'];
    $total = $m1 + $m2 + $m3;

    $result = "
        <div class='result-box'>
            <h3>Kết quả:</h3>
            <p><strong>Họ và tên:</strong> $name</p>
            <p><strong>Lớp:</strong> $className</p>
            <p><strong>Điểm M1:</strong> $m1</p>
            <p><strong>Điểm M2:</strong> $m2</p>
            <p><strong>Điểm M3:</strong> $m3</p>
            <p><strong>Tổng điểm:</strong> $total</p>
        </div>
    ";
}
?>
 <h2 style="margin-left: 500px;">Calculate 2</h2>
<form method="post" action="" style="margin-left: 300px;">
    <table class="calc-table">
        <tr>
            <td><label>Họ và tên:</label></td>
            <td><input type="text" name="name" required value="<?php echo htmlspecialchars($name); ?>"></td>
        </tr>
        <tr>
            <td><label>Lớp:</label></td>
            <td><input type="text" name="className" required value="<?php echo htmlspecialchars($className); ?>"></td>
        </tr>
        <tr>
            <td><label>Điểm M1:</label></td>
            <td><input type="number" name="m1" step="0.1" required value="<?php echo htmlspecialchars($m1); ?>"></td>
        </tr>
        <tr>
            <td><label>Điểm M2:</label></td>
            <td><input type="number" name="m2" step="0.1" required value="<?php echo htmlspecialchars($m2); ?>"></td>
        </tr>
        <tr>
            <td><label>Điểm M3:</label></td>
            <td><input type="number" name="m3" step="0.1" required value="<?php echo htmlspecialchars($m3); ?>"></td>
        </tr>
    </table>
    <button type="submit" class="button">OK</button>
    <button type="reset" class="button">Cancel</button>
</form>

<?php echo $result; ?>
