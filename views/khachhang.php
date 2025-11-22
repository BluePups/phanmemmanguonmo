<?php
$page_title = "Thông Tin Khách Hàng";

require ('../php/mysqli_connect.php');

// Truy vấn dữ liệu từ bảng khach_hang
$sql = "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai FROM khach_hang ORDER BY Ma_khach_hang";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        thead {
            background-color: #34495e;
        }
        
        th {
            color: white;
            padding: 12px 10px;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            border: 1px solid #2c3e50;
        }
        
        td {
            padding: 10px;
            border: 1px solid #ddd;
            color: #333;
            font-size: 14px;
        }
        
        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }
        
        tbody tr:nth-child(even) {
            background-color: #ffefd5;
        }
        
        tbody tr:hover {
            background-color: #fff3cd;
            transition: background-color 0.3s ease;
        }
        
        .ma-kh {
            text-align: center;
            font-weight: bold;
            color: #e74c3c;
        }
        
        .ten-kh {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .gioi-tinh {
            text-align: center;
            font-weight: 600;
        }
        
        .gioi-tinh-nam {
            color: #3498db;
        }
        
        .gioi-tinh-nu {
            color: #e91e63;
        }
        
        .dia-chi {
            color: #555;
        }
        
        .so-dt {
            text-align: center;
            color: #27ae60;
            font-weight: 500;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 13px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
        
        .info-box {
            background: #e8f5e9;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #4caf50;
            font-size: 14px;
        }
        
        .info-box strong {
            color: #2e7d32;
        }
        
        .legend {
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            font-size: 13px;
        }
        
        .legend-title {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        
        .legend-item {
            margin: 5px 0;
            color: #666;
        }
        
        .legend-color {
            display: inline-block;
            width: 20px;
            height: 15px;
            margin-right: 8px;
            border: 1px solid #ddd;
            vertical-align: middle;
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
        <h1>THÔNG TIN KHÁCH HÀNG</h1>
        
        <div class="info-box">
            <strong>Dữ liệu:</strong> Thông tin được lấy từ CSDL <code>ql_noithat</code> - Bảng <code>khach_hang</code>
        </div>
        
        <?php
        if ($result && $result->num_rows > 0) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Mã KH</th>';
            echo '<th>Tên khách hàng</th>';
            echo '<th>Giới tính</th>';
            echo '<th>Địa chỉ</th>';
            echo '<th>Số điện thoại</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            // Xuất dữ liệu của từng dòng với định dạng
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td class="ma-kh">' . htmlspecialchars($row["Ma_khach_hang"]) . '</td>';
                echo '<td class="ten-kh">' . htmlspecialchars($row["Ten_khach_hang"]) . '</td>';
                
                // Định dạng giới tính với màu sắc
                $gioitinh = $row["Phai"];
                $gioitinh_class = ($gioitinh == 1) ? 'Nữ' : 'Nam';
                $gioitinh_text = ($gioitinh == 1) ? 'Nữ' : 'Nam';
                echo '<td class="gioi-tinh ' . $gioitinh_class . '">' . $gioitinh_text . '</td>';
                
                echo '<td class="dia-chi">' . htmlspecialchars($row["Dia_chi"]) . '</td>';
                echo '<td class="so-dt">' . htmlspecialchars($row["Dien_thoai"]) . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            
            echo '<div class="legend">';
            echo '<div class="legend-title">Chú thích định dạng:</div>';
            echo '<div class="legend-item"><span class="legend-color" style="background: #ffffff;"></span>Dòng lẻ: Nền trắng</div>';
            echo '<div class="legend-item"><span class="legend-color" style="background: #ffefd5;"></span>Dòng chẵn: Nền vàng nhạt</div>';
            echo '<div class="legend-item">• <strong>Giới tính 1</strong>: Nữ</div>';
            echo '<div class="legend-item">• <strong>Giới tính 0</strong>: Nam</div>';
            echo '</div>';
            
            echo '<div class="footer">';
            echo 'Tổng số: <strong>' . $result->num_rows . '</strong> khách hàng';
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