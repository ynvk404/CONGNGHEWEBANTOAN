// Bắt sự kiện click trên cây thư mục
document.getElementById('tree').onclick = function(e) {
    // Chỉ xử lý khi click vào thẻ <li>
    if (e.target.tagName === 'LI') {
        let childList = e.target.querySelector('ul');
        if (childList) {
            if (childList.style.display === 'none') {
                childList.style.display = 'block'; // hiện thư mục con
            } else {
                childList.style.display = 'none';  // ẩn thư mục con
            }
        }
    }
};
