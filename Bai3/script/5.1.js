// Khi load trang
window.onload = function () {
    // Focus vào ô Họ Tên
    document.getElementById("fullName").focus();

    // Ẩn toàn bộ lỗi khi mới load
    document.querySelectorAll(".error").forEach(function (err) {
        err.classList.add("hidden");
    });

    // Tô nền xanh cho các ô bắt buộc
    let requiredInputs = document.querySelectorAll("#registrationForm input[required]");
    requiredInputs.forEach(function (input) {
        input.style.backgroundColor = "#d1fae5";
    });
};

// Nhấn Enter để nhảy sang ô tiếp theo
let formElements = document.querySelectorAll("#registrationForm input, #registrationForm textarea");
formElements.forEach(function (el, index) {
    el.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            if (index + 1 < formElements.length) {
                formElements[index + 1].focus();
            }
        }
    });
});

// Chuẩn hóa họ tên (viết hoa chữ cái đầu)
document.getElementById("fullName").addEventListener("blur", function () {
    let name = this.value.trim().replace(/\s+/g, " ");
    if (name) {
        let parts = name.split(" ");
        for (let i = 0; i < parts.length; i++) {
            parts[i] = parts[i][0].toUpperCase() + parts[i].slice(1).toLowerCase();
        }
        this.value = parts.join(" ");
    }
});

// Kiểm tra email khi rời khỏi ô nhập
document.getElementById("email").addEventListener("blur", function () {
    let emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    if (!emailPattern.test(this.value)) {
        showErrorById("err_email", "Email phải là Gmail hợp lệ");
    } else {
        clearErrorById("err_email");
    }
});

// Tự thêm dấu "/" khi nhập ngày sinh (ddMMyyyy)
document.getElementById("birthDate").addEventListener("input", function () {
    let val = this.value.replace(/[^0-9]/g, "");
    if (val.length > 2 && val.length <= 4) {
        val = val.slice(0, 2) + "/" + val.slice(2);
    } else if (val.length > 4) {
        val = val.slice(0, 2) + "/" + val.slice(2, 4) + "/" + val.slice(4, 8);
    }
    this.value = val;
});

// Kiểm tra mật khẩu nhập lại
document.getElementById("confirmPassword").addEventListener("blur", function () {
    let pass = document.getElementById("password").value;
    if (this.value !== pass) {
        showErrorById("err_confirmPassword", "Mật khẩu không trùng khớp");
    } else {
        clearErrorById("err_confirmPassword");
    }
});

// Hàm xử lý khi bấm "Chấp nhận"
function submitForm() {
    // Lấy giá trị các ô input
    let fullName = document.getElementById("fullName").value.trim();
    let address = document.getElementById("address").value.trim();
    let gender = document.querySelector('input[name="gender"]:checked');
    let birthDate = document.getElementById("birthDate").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    let note = document.getElementById("note").value.trim();

    let valid = true;

    // Kiểm tra các ô bắt buộc
    let requiredIds = [
        { id: "fullName", err: "err_fullName", msg: "Không được bỏ trống" },
        { id: "birthDate", err: "err_birthDate", msg: "Không được bỏ trống" },
        { id: "email", err: "err_email", msg: "Không được bỏ trống" },
        { id: "username", err: "err_username", msg: "Không được bỏ trống" },
        { id: "password", err: "err_password", msg: "Không được bỏ trống" },
        { id: "confirmPassword", err: "err_confirmPassword", msg: "Không được bỏ trống" }
    ];
    requiredIds.forEach(function (item) {
        let input = document.getElementById(item.id);
        if (!input || !input.value.trim()) {
            showErrorById(item.err, item.msg);
            valid = false;
        } else {
            clearErrorById(item.err);
        }
    });

    // Kiểm tra giới tính
    if (!gender) {
        showErrorById("err_gender", "Vui lòng chọn giới tính");
        valid = false;
    } else {
        clearErrorById("err_gender");
    }

    // Kiểm tra checkbox khóa học
    let checkboxes = document.querySelectorAll('input[name="course"]');
    let hasChecked = false;
    checkboxes.forEach(function (cb) {
        if (cb.checked) {
            hasChecked = true;
        }
    });
    if (!hasChecked) {
        showErrorById("err_course", "Vui lòng chọn ít nhất một khóa");
        valid = false;
    } else {
        clearErrorById("err_course");
    }

    // Email phải là Gmail
    let emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    if (!emailPattern.test(email)) {
        showErrorById("err_email", "Email phải là Gmail hợp lệ");
        valid = false;
    } else {
        clearErrorById("err_email");
    }

    // Số điện thoại: bắt đầu bằng 03 và có 10 số
    let phonePattern = /^03\d{8}$/;
    if (phone && !phonePattern.test(phone)) {
        showErrorById("err_phone", "Số điện thoại không hợp lệ");
        valid = false;
    } else {
        clearErrorById("err_phone");
    }

    // Username ≥3 ký tự, có chữ hoa + số
    let usernamePattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{3,}$/;
    if (!usernamePattern.test(username)) {
        showErrorById("err_username", "Tên dùng ≥3 ký tự, có chữ hoa & số");
        valid = false;
    } else {
        clearErrorById("err_username");
    }

    // Mật khẩu trùng khớp
    if (password !== confirmPassword) {
        showErrorById("err_confirmPassword", "Mật khẩu không trùng khớp");
        valid = false;
    } else {
        clearErrorById("err_confirmPassword");
    }
    
    //Ghi chú 
    if (note === "") {
        showErrorById("err_note", "Ghi chú không được bỏ trống");
        valid = false;
    } else {
        clearErrorById("err_note");
    }

    // Nếu có lỗi thì dừng lại
    if (!valid) return;

    // Nếu hợp lệ → hiển thị thông tin
    let message =
        "Họ Tên: " + fullName + "\n" +
        "Địa Chỉ: " + address + "\n" +
        "Giới Tính: " + gender.value + "\n" +
        "Ngày Sinh: " + birthDate + "\n" +
        "Email: " + email + "\n" +
        "SĐT: " + phone + "\n" +
        "Tên Dùng: " + username + "\n" +
        "Ghi Chú: " + note;

    alert("Dữ liệu đã gửi:\n\n" + message);

    // Reset form
    document.getElementById("registrationForm").reset();
    document.querySelectorAll(".error").forEach(function (err) {
        err.classList.add("hidden");
    });
    document.getElementById("fullName").focus();
}

// Hàm xử lý khi bấm "Bỏ qua"
function skipForm() {
    alert("Bạn đã bỏ qua việc đăng ký.");
}

// Hàm hiển thị lỗi theo id
function showErrorById(id, message) {
    let errDiv = document.getElementById(id);
    if (errDiv) {
        errDiv.textContent = message;
        errDiv.classList.remove("hidden");
    }
}

// Hàm xóa lỗi theo id
function clearErrorById(id) {
    let errDiv = document.getElementById(id);
    if (errDiv) {
        errDiv.classList.add("hidden");
    }
}
