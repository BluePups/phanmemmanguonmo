<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nội Thất</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .menu {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .link-box {
            display: block;
            margin: 15px 0;
            padding: 15px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: 0.3s;
        }
        .link-box:hover {
            background: #764ba2;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="menu">
        <h1>✨ BÀI TẬP LỚN ✨</h1>
        <a href="admin_quan_ly_noi_that.php" class="link-box">
            ✨ Hiển thị trang aadmin thông tin nội thất
        </a>
        <a href="http://localhost/phpmyadmin" class="link-box">
            🗄️ Quản lý Database (phpMyAdmin)
        </a>
    </div>
</body>
</html>
