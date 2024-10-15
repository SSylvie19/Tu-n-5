<?php
$servername = "localhost";
$username = "root";
$password = "";  // Mật khẩu của MySQL (nếu có)
$dbname = "quan_ly_sinh_vien";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
