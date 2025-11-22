<?php
$page_title = "THÔNG TIN NHÀ SẢN XUẤT";

require ('../php/mysqli_connect.php');

// Truy vấn dữ liệu từ bảng hang_sua
$sql = "SELECT Ma_hang_sua, Ten_hang_sua, Dia_chi, Dien_thoai, Email FROM hang_sua";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Hãng Sữa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        h1 {
            text-align: center;
            color: #4a90e2;
            font-size: 32px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background: white;
        }
        
        thead {
            background: linear-gradient(135deg, #4a90e2, #357abd);
        }
        
        th {
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 15px;
            border: 1px solid #357abd;
            text-transform: uppercase;
        }
        
        td {
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            color: #333;
            font-size: 14px;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tbody tr:hover {
            background-color: #e3f2fd;
            transition: background-color 0.3s ease;
        }
        
        .ma-hang {
            text-align: center;
            font-weight: bold;
            color: #4a90e2;
        }
        
        .ten-hang {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .dia-chi {
            color: #555;
        }
        
        .dien-thoai {
            text-align: center;
            color: #e74c3c;
            font-weight: 500;
        }
        
        .email {
            color: #27ae60;
        }
        
        .email a {
            color: #27ae60;
            text-decoration: none;
        }
        
        .email a:hover {
            text-decoration: underline;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
            font-size: 13px;
        }
        
        .error-message {
            background: #ffe4e1;
            color: #dc143c;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
            border: 2px solid #dc143c;
        }
        
        .info-box {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #4a90e2;
        }
        
        .info-box strong {
            color: #4a90e2;
        }
                .home-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }
        .home-link {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .home-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            background: linear-gradient(135deg, #764ba2, #667eea);
        }
        .home-link:before {
            content: "🏠 ";
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="home-button">
        <a href="../index.php" class="home-link">Về Trang Chủ</a>
    </div>
    <div class="container">
        <h1>THÔNG TIN HÃNG SỮA</h1>
        
        <div class="info-box">
            <strong>Thông tin:</strong> Dữ liệu được lấy từ CSDL MySQL - Bảng <code>hang_sua</code>
        </div>
        
        <?php
        if ($result && $result->num_rows > 0) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Mã HS</th>';
            echo '<th>Tên hãng sữa</th>';
            echo '<th>Địa chỉ</th>';
            echo '<th>Điện thoại</th>';
            echo '<th>Email</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            // Xuất dữ liệu của từng dòng
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td class="ma-hang">' . htmlspecialchars($row["Ma_hang_sua"]) . '</td>';
                echo '<td class="ten-hang">' . htmlspecialchars($row["Ten_hang_sua"]) . '</td>';
                echo '<td class="dia-chi">' . htmlspecialchars($row["Dia_chi"]) . '</td>';
                echo '<td class="dien-thoai">' . htmlspecialchars($row["Dien_thoai"]) . '</td>';
                echo '<td class="email"><a href="mailto:' . htmlspecialchars($row["Email"]) . '">' . htmlspecialchars($row["Email"]) . '</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            
            echo '<div class="footer">';
            echo 'Tổng số: <strong>' . $result->num_rows . '</strong> hãng sữa';
            echo '</div>';
        } else {
            echo '<div class="no-data">Không có dữ liệu để hiển thị</div>';
        }
        
        // Đóng kết nối
        $conn->close();
        ?>
    </div>
</body>
</html>