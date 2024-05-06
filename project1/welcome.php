<?php
session_start();

// Kiểm tra trạng thái đăng nhập
if ($_SESSION["IsLogin"] != true) {
    header("Location: login.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }
        p {
            margin-bottom: 20px;
            color: #333;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
        body {
        background-image: url('bgr.jpg');
        background-size: cover; /* Đảm bảo hình nền được hiển thị đầy đủ trên mọi kích thước màn hình */
        background-position: center; /* Đặt vị trí xuất hiện của hình nền */
        background-repeat: no-repeat; /* Ngăn lặp lại hình nền */
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h2>Welcome!</h2>
        <p>You are logged in.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
