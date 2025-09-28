<?php
// Xử lý dữ liệu associative array
$assocArray = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['keys']) && isset($_POST['values'])) {
        $keys = $_POST['keys'];
        $values = $_POST['values'];
        $assocArray = [];

        for ($i = 0; $i < count($keys); $i++) {
            $key = trim($keys[$i]);
            $val = $values[$i];
            if ($key !== '') {
                $assocArray[$key] = $val;
            }
        }
    }
}

// Luôn tạo form sẵn với 5 cặp key-value
$size = 5;
?>

<div class="content-assoc">
    <h2>Nhập Associative Array</h2>

    <form method="post" class="form-assoc-input">
        <?php
        for ($i = 0; $i < $size; $i++) {
            $keyVal = '';
            if (isset($_POST['keys'][$i])) {
                $keyVal = htmlspecialchars($_POST['keys'][$i]);
            }

            $valVal = '';
            if (isset($_POST['values'][$i])) {
                $valVal = htmlspecialchars($_POST['values'][$i]);
            }

            echo "<div class='assoc-row'>";
            echo "<input type='text' name='keys[$i]' placeholder='Key' value='$keyVal'>";
            echo "<input type='text' name='values[$i]' placeholder='Value' value='$valVal'>";
            echo "</div>";
        }
        ?>
        <button type="submit">Tính toán</button>
        <button type="reset">Reset</button>
    </form>

    <?php
    if (!empty($assocArray)) {
        echo "<h3 style='margin-top: 50px'>Associative Array nhập vào:</h3>";
        echo "<div class='assoc-display'>";
        foreach ($assocArray as $k => $v) {
            echo "<div class='assoc-item'><b>$k</b> : $v</div>";
        }
        echo "</div>";
    }
    ?>
</div>
