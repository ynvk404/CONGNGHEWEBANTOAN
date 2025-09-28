<?php
if (!defined('MENU_HOME')) define('MENU_HOME', 'Home');

if (!defined('MENU_CONTACT')) define('MENU_CONTACT', '
<div class="contact-section">
    <h2>Contact Us</h2>
    <form action="" method="post">
        <label for="username">Full Name:</label>
        <input type="text" id="username" name="username" required>

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="comment">Message / Comment:</label>
        <textarea id="comment" name="comment" required></textarea>

        <button type="submit">Send</button>
        <button type="reset">Reset</button>
    </form>
</div>
');

if (!defined('MENU_LOGIN')) define('MENU_LOGIN', '
<div class="login-section">
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
        <button type="reset">Reset</button>
    </form>
</div>
');
if (!defined('WELCOME_TEXT')) define('WELCOME_TEXT', 'Welcome to our website!');
?>
