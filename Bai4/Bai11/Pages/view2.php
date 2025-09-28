<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách học sinh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-button {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Danh sách học sinh</h2>

<?php
$sql = "SELECT * FROM HOSO";
$result = $conn->query($sql);

echo "<table>
<tr>
<th>MAHS</th><th>HOTEN</th><th>NGAYSINH</th><th>DIACHI</th>
<th>LOP</th><th>DIEMTOAN</th><th>DIEMLY</th><th>DIEMHOA</th><th>Action</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['MAHS']}</td>
        <td>{$row['HOTEN']}</td>
        <td>{$row['NGAYSINH']}</td>
        <td>{$row['DIACHI']}</td>
        <td>{$row['LOP']}</td>
        <td>{$row['DIEMTOAN']}</td>
        <td>{$row['DIEMLY']}</td>
        <td>{$row['DIEMHOA']}</td>
        <td>
            <a href='index.php?page=edit&type=hs&mahs={$row['MAHS']}'>Edit</a> | 
            <a href='index.php?page=delete&type=hs&mahs={$row['MAHS']}'>Delete</a>
        </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='9'>Không có dữ liệu</td></tr>";
}
echo "</table>";

echo "<a class='add-button' href='index.php?page=add-2'>Thêm học sinh mới</a>";
?>

</body>
</html>
