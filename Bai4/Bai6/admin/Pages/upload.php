<?php
$cookie_name = "favorite_links";

// Lấy danh sách từ cookie (JSON)
if (isset($_COOKIE[$cookie_name])) {
    $links = json_decode($_COOKIE[$cookie_name], true);
    if (!is_array($links)) {
        $links = [];
    }
} else {
    $links = [];
}

// Xử lý thêm link mới
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['clear_links'])) {
        $links = []; // xóa mảng link
        setcookie($cookie_name, "", time() - 3600); // xóa cookie
        header("Location: index.php?page=upload");
        exit();
    }
    if (!empty($_POST['new_link'])) {
        $new_link = trim($_POST['new_link']);
        if ($new_link != "") {
            if (!in_array($new_link, $links)) {
                $links[] = $new_link;

                // Lưu cookie 30 ngày
                setcookie($cookie_name, json_encode($links), time() + 30 * 24 * 60 * 60);
            }
        }
    }
    // Reload trang để cookie mới được nhận
    header("Location: index.php?page=upload");
    exit();

    exit();
}
?>

<div class="content-upload-new-link">
    <h2>Danh sách web link ưa thích</h2>
    <ul>
        <?php
        if (!empty($links)) {
            foreach ($links as $link) {
                echo "<li><a href='" . htmlspecialchars($link) . "' target='_blank'>" . htmlspecialchars($link) . "</a></li>";
            }
        } else {
            echo "<li>Chưa có link nào.</li>";
        }
        ?>
    </ul>
    <h3>Thêm link mới</h3>
    <form method="post">
        <input type="text" name="new_link" placeholder="Nhập URL mới" required>
        <button type="submit">Add Link</button>
    </form>
    <form method="post" style="margin-top:10px;">
        <button type="submit" name="clear_links" style="background-color:red;color:white;">Clear All Links</button>
    </form>
</div>