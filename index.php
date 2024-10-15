<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mssv = $_POST['mssv'];
    $ho_ten = $_POST['ho_ten'];

    if (!empty($mssv) && !empty($ho_ten)) {
        // Chuẩn bị và thực thi câu lệnh SQL để thêm sinh viên
        $sql = "INSERT INTO sinh_vien (mssv, ho_ten) VALUES ('$mssv', '$ho_ten')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm sinh viên thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
</head>
<body>
    <h2>Thêm sinh viên</h2>
    <form method="post" action="">
        MSSV: <input type="text" name="mssv" required><br><br>
        Họ tên: <input type="text" name="ho_ten" required><br><br>
        <input type="submit" value="Thêm sinh viên">
    </form>

    <h2>Danh sách sinh viên</h2>
    <table border="1">
        <tr>
            <th>MSSV</th>
            <th>Họ tên</th>
        </tr>
        <?php
        // Truy vấn và hiển thị danh sách sinh viên
        $sql = "SELECT mssv, ho_ten FROM sinh_vien";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["mssv"]. "</td><td>" . $row["ho_ten"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Không có sinh viên nào</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
