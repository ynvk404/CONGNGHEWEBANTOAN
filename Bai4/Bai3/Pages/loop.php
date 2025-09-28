<div class="triangle-container">
    <h2>Vẽ sử dụng vòng lặp for</h2>
    <?php
    $numRows = 5;
    for ($i = 1; $i <= $numRows; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo '* ';
        }
        echo '<br>';
    }
    ?>

    <h2>Vẽ sử dụng vòng lặp while</h2>
    <?php
    $numRows = 7;
    $i = 1;
    while ($i <= $numRows) {
        $j = 1;
        while ($j <= $i) {
            echo '* ';
            $j++;
        }
        echo '<br>';
        $i++;
    }
    ?>
    
    <h2>Vẽ sử dụng vòng lặp do-while</h2>
    <?php
    $numRows = 6;
    $i = 1;
    do {
        $j = 1;
        do {
            echo '* ';
            $j++;
        } while ($j <= $i);
        echo '<br>';
        $i++;
    } while ($i <= $numRows);
    ?>

</div>