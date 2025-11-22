<?php
// Kết nối đến MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_noithat";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập charset UTF-8
$conn->set_charset("utf8");
?>