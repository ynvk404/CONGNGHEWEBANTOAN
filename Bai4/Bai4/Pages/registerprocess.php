<?php
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    $programmingLanguages = "";
    if (isset($_POST["programming_language"])) {
        $programmingLanguages = implode(", ", $_POST["programming_language"]);
    }

    $skill = $_POST["skill"];

    $marriageStatus = "Single";
    if (isset($_POST["marriage_status"])) {
        $marriageStatus = "Married";
    }

    $note = $_POST["note"];

    echo '<div class="registration-result">';
    echo "<p>Thông Tin Đăng Ký</p>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Password:</strong> $password</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Enable Programming Language:</strong> $programmingLanguages</p>";
    echo "<p><strong>Skill:</strong> $skill</p>";
    echo "<p><strong>Marriage Status:</strong> $marriageStatus</p>";
    echo "<p><strong>Note:</strong> $note</p>";
    echo '</div>';
} else {
    echo "Không có dữ liệu đăng ký.";
}
?>
