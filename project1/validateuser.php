<?php
session_start();

// Kết nối CSDL
$server = "localhost";
$user = "root";
$pass = "";
$database = "csdl";

$conn = new mysqli($server, $user, $pass, $database);

// Kiểm tra kết nối
if($conn)
{
    mysqli_query($conn, "SET NAMES 'utf8' ");
    echo 'Đã kết nối thành công';
}
else
{
    echo 'Kết nối thất bại';
}

// Lấy thông tin từ form
$username = $_POST['username'];
$password = $_POST['password'];

// Kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM infor WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Đăng nhập thành công, lưu trạng thái vào session
    $_SESSION["IsLogin"] = true;
    header("Location: welcome.php"); // Chuyển hướng đến trang chào mừng hoặc trang chính
} else {
    // Đăng nhập không thành công, redirect về trang login
    header("Location: login_error.php");
}

$conn->close();
?>
