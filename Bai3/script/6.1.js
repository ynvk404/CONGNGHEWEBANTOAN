window.onload = function () {
    const chonTatCa = document.getElementById("chon-tat-ca");
    const oChonDong = document.querySelectorAll(".chon-dong");
    const dong = document.querySelectorAll("tbody tr");

    // Hàm cập nhật highlight
    function capNhatHighlight() {
        oChonDong.forEach(function (cb, i) {
            if (cb.checked) {
                dong[i].classList.add("highlight");
            } else {
                dong[i].classList.remove("highlight");
            }
        });

        // Cập nhật trạng thái "chọn tất cả"
        let tatCaDaChon = true; // giả sử ban đầu là tất cả đã chọn

        oChonDong.forEach(function (cb) {
            if (!cb.checked) {
                tatCaDaChon = false; // chỉ cần thấy 1 cái chưa chọn thì gán false
            }
        });

        // Gán lại cho checkbox "chọn tất cả"
        chonTatCa.checked = tatCaDaChon;
    }

    // Sự kiện cho ô "chọn tất cả"
    chonTatCa.addEventListener("change", function () {
        oChonDong.forEach(cb => cb.checked = chonTatCa.checked);
        capNhatHighlight();
    });

    // Sự kiện cho từng ô chọn dòng
    oChonDong.forEach(function (cb) {
        cb.addEventListener("change", capNhatHighlight);
    });

    // Sự kiện click vào dòng → toggle checkbox
    dong.forEach(function (row, i) {
        row.addEventListener("click", function (e) {
            // Chỉ toggle khi click vào ngoài checkbox
            if (e.target.tagName !== "INPUT") {
                oChonDong[i].checked = !oChonDong[i].checked;
                capNhatHighlight();
            }
        });
    });
};
