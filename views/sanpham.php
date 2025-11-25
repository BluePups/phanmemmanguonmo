<?php
$page_title = "Thông Tin Sản Phẩm";
$current_page = 'sanpham';

require ('../php/mysqli_connect.php');

// Truy vấn dữ liệu từ bảng sua và hang_sua (JOIN để lấy tên hãng sữa)
$sql = "SELECT s.Ma_san_pham, s.Ten_san_pham, t.Ten_thuong_hieu, l.Ten_loai, s.Chat_lieu, s.Don_gia, s.Mo_ta, s.Hinh_anh 
        FROM san_pham s
        LEFT JOIN thuong_hieu t ON s.Ma_thuong_hieu = t.Ma_thuong_hieu
        LEFT JOIN loai_san_pham l ON s.Ma_loai = l.Ma_loai
        ORDER BY s.Ma_san_pham";
$result = $conn->query($sql);

include '../includes/html/header.html';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Các Sản Phẩm</title>
    <link rel="stylesheet" href="../includes/css/sanpham.css" type="text/css" media="screen" />
</head>
<body>
    <div class="container">
        <div class="product-list">
            <?php
            if ($result && $result->num_rows > 0) {
                // Xuất dữ liệu của từng sản phẩm
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product-item">';
                    
                    // Cột hình ảnh
                    echo '<div class="product-image">';
                    if (!empty($row["Hinh_anh"]) && file_exists("../images/sanpham/" . $row["Hinh_anh"])) {
                        echo '<img src="../images/sanpham/' . htmlspecialchars($row["Hinh_anh"]) . '" alt="' . htmlspecialchars($row["Ten_san_pham"]) . '">';
                    } else {
                        echo '<div class="product-image-placeholder">Không có hình</div>';
                    }
                    echo '</div>';
                    
                    // Cột nội dung
                    echo '<div class="product-info">';
                    echo '<div class="product-name">' . htmlspecialchars($row["Ten_san_pham"]) . '</div>';
                    
                    // Nhà sản xuất
                    if (!empty($row["Ten_thuong_hieu"])) {
                        echo '<div class="product-detail">';
                        echo '<strong>Nhà sản xuất:</strong> ' . htmlspecialchars($row["Ten_thuong_hieu"]);
                        echo '</div>';
                    }
                    
                    // Trọng lượng
                    if (!empty($row["Ten_loai"])) {
                        echo '<div class="product-detail">';
                        echo '<strong>Phân loại:</strong> ' . htmlspecialchars($row["Ten_loai"]);
                        echo '</div>';
                    }
                    
                    // Trọng lượng
                    if (!empty($row["Chat_lieu"])) {
                        echo '<div class="product-detail">';
                        echo '<strong>Chất liệu:</strong> ' . htmlspecialchars($row["Chat_lieu"]);
                        echo '</div>';
                    }
                    
                    // Đơn giá
                    if (!empty($row["Don_gia"])) {
                        echo '<div class="product-detail">';
                        echo '<strong>Đơn giá:</strong> <span class="product-price">' . number_format($row["Don_gia"], 0, ',', '.') . ' VNĐ</span>';
                        echo '</div>';
                    }

                    // Trọng lượng
                    if (!empty($row["Mo_ta"])) {
                        echo '<div class="product-detail">';
                        echo '<strong>Mô tả:</strong> ' . htmlspecialchars($row["Mo_ta"]);
                        echo '</div>';
                    }
                    
                    echo '</div>'; // Đóng product-info
                    echo '</div>'; // Đóng product-item
                }
            } else {
                echo '<div class="no-data">Không có sản phẩm nào để hiển thị</div>';
            }
            
            // Đóng kết nối
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

<?php include '../includes/html/footer.html'; ?>