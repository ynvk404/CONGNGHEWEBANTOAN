<div class="draw-table-container">
    <h2>Form vẽ bảng</h2>
    <form method="post" action="index.php?page=drawTable">
        <div class="input">
            <label for="numRows">Số dòng:</label>
            <input type="number" name="numRows" id="numRows" min="1" required><br>
        </div>
        <div class="input">
            <label for="numCols">Số cột:</label>
            <input type="number" name="numCols" id="numCols" min="1" required><br>
        </div>
        <input type="submit" name="submit" value="Nhập lại">
        <input type="submit" name="draw" value="Vẽ">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["draw"])) {
            $numRows = $_POST["numRows"];
            $numCols = $_POST["numCols"];

            if ($numRows > 0 && $numCols > 0) {
                echo '<h2>Bảng:</h2>';
                echo '<div class="table-wrapper">';
                echo '<table>';
                for ($i = 0; $i < $numRows; $i++) {
                    echo '<tr>';
                    for ($j = 0; $j < $numCols; $j++) {
                        echo '<td></td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            } else {
                echo '<p>Vui lòng nhập số dòng và số cột khác 0.</p>';
            }
        }
    }
    ?>
</div>
