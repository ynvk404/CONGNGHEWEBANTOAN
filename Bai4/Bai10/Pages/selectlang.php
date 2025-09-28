<div class="select-lang">
    <a href="index.php?lang=vietnam">Viet Nam</a>
    <a href="index.php?lang=english">English</a>
</div>
<?php
session_start();

//người dùng chọn ngôn ngữ qua URL
if (isset($_GET['lang']) && in_array($_GET['lang'], ['vietnam','english'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Xác định file ngôn ngữ cần load
$lang_file = $_SESSION['lang'] ?? 'vietnam';
include "Lang/{$lang_file}.php"; // ví dụ: Lang/vietnam.php hoặc Lang/english.php
?>

