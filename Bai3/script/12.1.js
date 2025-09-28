// Hàm sắp xếp bảng theo cột
function sortTable(columnIndex) {
    let table = document.getElementById("productTable");
    let tbody = table.tBodies[0];
    let rows = Array.from(tbody.rows);

    // Sắp xếp các dòng theo nội dung cột
    rows.sort(function (rowA, rowB) {
        let cellA = rowA.cells[columnIndex].textContent.trim();
        let cellB = rowB.cells[columnIndex].textContent.trim();
        return cellA.localeCompare(cellB, "vi");
    });

    // Gắn lại vào tbody theo thứ tự mới
    rows.forEach(function (row) {
        tbody.appendChild(row);
    });
}

// Hàm tìm kiếm
function searchTable() {
    let keyword = document.getElementById("searchInput").value.toLowerCase();
    let rows = document.querySelectorAll("#productTable tbody tr");

    rows.forEach(function (row) {
        let cells = row.getElementsByTagName("td");
        let found = false; // cờ kiểm tra có khớp không

        // Duyệt từng ô trong dòng
        for (let i = 0; i < cells.length; i++) {
            let cell = cells[i];
            let text = cell.textContent; // lấy nội dung gốc
            let lowerText = text.toLowerCase();

            if (keyword === "") {
                // Nếu không nhập gì thì khôi phục text gốc và hiện
                cell.innerHTML = text;
                row.style.display = "";
                found = true;
            } else {
                if (lowerText.indexOf(keyword) !== -1) {
                    // Nếu có chứa từ khóa
                    let start = lowerText.indexOf(keyword);
                    let end = start + keyword.length;

                    // Chèn span để tô vàng
                    cell.innerHTML =
                        text.substring(0, start) +
                        '<span style="background-color: yellow;">' +
                        text.substring(start, end) +
                        "</span>" +
                        text.substring(end);

                    found = true;
                } else {
                    // Không khớp 
                    cell.innerHTML = text;
                }
            }
        }

        // Nếu không có từ khóa và không khớp thì ẩn dòng
        if (keyword === "") {
            row.style.display = "";
        } else {
            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    });
}
document.getElementById("searchInput").addEventListener("keyup", searchTable)