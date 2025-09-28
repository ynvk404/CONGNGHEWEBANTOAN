<?php
if (!defined('MENU_HOME')) define('MENU_HOME', 'Trang chủ');
if (!defined('MENU_CONTACT')) define('MENU_CONTACT', '
<div class="contact-section">
    <h2>Liên hệ với chúng tôi</h2>
    <form action="" method="post">
        <label for="username">Họ và tên:</label>
        <input type="text" id="username" name="username" required>

        <label for="birthday">Ngày sinh:</label>
        <input type="date" id="birthday" name="birthday" required>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="comment">Ghi chú / Tin nhắn:</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Gửi</button>
        <button type="reset">Làm lại</button>
    </form>
</div>
');

if (!defined('MENU_LOGIN')) define('MENU_LOGIN', '
<div class="login-section">
    <h2>Đăng nhập</h2>
    <form action="" method="post">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Đăng nhập</button>
        <button type="reset">Làm lại</button>
    </form>
</div>
');
if (!defined('WELCOME_TEXT')) define('WELCOME_TEXT', 'Chào mừng đến với website của chúng tôi!');
?>
