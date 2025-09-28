<div class="content-home">
    <h1>Cookie trong PHP</h1>

    <p><strong>Cookie</strong> là một đoạn dữ liệu được lưu trong máy Client do trình duyệt quản lý. Mỗi khi trình duyệt tải một trang web từ server, cookie sẽ được gửi ngược lại server.</p>

    <p>Không nên dùng cookie để lưu thông tin quan trọng vì không đảm bảo bảo mật.</p>

    <p>Cookie thường được dùng để ghi nhớ:</p>
    <ul>
        <li>Username, password</li>
        <li>Thời điểm login cuối</li>
        <li>Danh sách nhạc ưa thích</li>
    </ul>

    <h2>Tạo cookie</h2>
    <p>Cú pháp:</p>
    <pre>setcookie("TenCookie", "giá trị", [Thời điểm quá hạn tính theo giây]);</pre>
    <p>Ví dụ:</p>
    <pre>
setcookie("TenUser", "Phạm Minh", time() + 60*60*24*30);
setcookie("lan_cuoi", time(), time() + 60*60*24*30);
    </pre>
    <p>Nếu không chỉ định thời gian, cookie sẽ lưu trong bộ nhớ và sẽ mất khi user đóng trình duyệt.</p>
    <p>Nếu thời điểm quá hạn là một thời điểm trong quá khứ, trình duyệt sẽ xóa cookie.</p>

    <h2>Sử dụng cookie</h2>
    <p>Dùng biến <code>$_COOKIE["Ten"]</code> để truy xuất giá trị cookie.</p>
</div>