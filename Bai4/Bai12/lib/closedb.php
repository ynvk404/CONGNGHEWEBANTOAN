<?php
function closeDB($conn) {
    if ($conn) {
        mysqli_close($conn);
    }
}
?>
