const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('[id^="tab"]');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Ẩn tất cả
        contents.forEach(c => c.hidden = true);
        // Hiện tab được chọn
        const target = tab.getAttribute('data-tab');
        document.getElementById(target).hidden = false;
    });
});

// Mặc định mở tab 1
tabs[0].click();