<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sản phẩm - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header h1 {
            font-size: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: rgba(255,255,255,0.8);
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Container */
        .container {
            max-width: 700px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
            padding: 20px 30px;
            font-size: 18px;
            font-weight: bold;
        }

        .card-body {
            padding: 40px;
        }

        .alert {
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border: 2px solid #ffeaa7;
            font-size: 15px;
        }

        .product-info {
            background: #fff5f5;
            padding: 25px;
            border-radius: 10px;
            margin: 25px 0;
            border-left: 5px solid #f44336;
        }

        .product-info h3 {
            color: #f44336;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .info-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #fee;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: bold;
            color: #555;
            min-width: 150px;
        }

        .info-value {
            flex: 1;
            color: #333;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px solid #f5f6fa;
        }

        .btn {
            padding: 14px 45px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete {
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(244, 67, 54, 0.4);
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244, 67, 54, 0.5);
        }

        .btn-cancel {
            background: #9e9e9e;
            color: white;
            box-shadow: 0 4px 15px rgba(158, 158, 158, 0.3);
        }

        .btn-cancel:hover {
            background: #757575;
            transform: translateY(-2px);
        }

        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .warning-text {
            text-align: center;
            font-size: 16px;
            color: #d32f2f;
            font-weight: bold;
            margin: 25px 0;
            padding: 15px;
            background: #ffebee;
            border-radius: 8px;
        }

        .warning-icon {
            font-size: 48px;
            text-align: center;
            margin: 20px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card-body {
                padding: 25px;
            }

            .btn {
                padding: 12px 30px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <h1>🗑️ Xóa Sản Phẩm Nội Thất</h1>
    <div class="breadcrumb">
        <a href="admin_quan_ly_noi_that.php">Dashboard</a>
        <span>/</span>
        <span>Xóa sản phẩm</span>
    </div>
</div>

<div class="container">
    <div class="card">
        <?php
        // Kết nối database
        $conn = new mysqli('localhost', 'root', '', 'ql_noithat');
        $conn->set_charset("utf8");

        if ($conn->connect_error) {
            die("<div class='card-body'><div class='alert alert-error'>❌ Lỗi kết nối: " . $conn->connect_error . "</div></div>");
        }

        // Lấy mã sản phẩm từ URL
        $ma_san_pham = $_GET['id'] ?? '';

        if (empty($ma_san_pham)) {
            echo "<div class='card-body'>";
            echo "<div class='alert alert-error'>❌ Không tìm thấy mã sản phẩm!</div>";
            echo "<div class='btn-container'><a href='admin_quan_ly_noi_that.php' class='btn btn-back'>← Quay lại Dashboard</a></div>";
            echo "</div></div></div></body></html>";
            exit;
        }

        // Lấy thông tin sản phẩm
        $sql = "SELECT sp.*, th.Ten_thuong_hieu, lsp.Ten_loai 
                FROM san_pham sp
                JOIN thuong_hieu th ON sp.Ma_thuong_hieu = th.Ma_thuong_hieu
                JOIN loai_san_pham lsp ON sp.Ma_loai = lsp.Ma_loai
                WHERE sp.Ma_san_pham = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ma_san_pham);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<div class='card-body'>";
            echo "<div class='alert alert-error'>❌ Không tìm thấy sản phẩm với mã: $ma_san_pham</div>";
            echo "<div class='btn-container'><a href='admin_quan_ly_noi_that.php' class='btn btn-back'>← Quay lại Dashboard</a></div>";
            echo "</div></div></div></body></html>";
            exit;
        }

        $product = $result->fetch_assoc();

        // Xử lý xóa khi nhấn nút xác nhận
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_delete'])) {
            $delete_sql = "DELETE FROM san_pham WHERE Ma_san_pham = ?";
            $stmt = $conn->prepare($delete_sql);
            $stmt->bind_param("s", $ma_san_pham);
            
            if ($stmt->execute()) {
                echo "<div class='card-header'>✅ Xóa thành công</div>";
                echo "<div class='card-body'>";
                echo "<div class='alert alert-success'>✅ Xóa sản phẩm '<strong>" . htmlspecialchars($product['Ten_san_pham']) . "</strong>' thành công!</div>";
                echo "<div class='btn-container'><a href='admin_quan_ly_noi_that.php' class='btn btn-back'>← Quay lại Dashboard</a></div>";
                echo "</div></div></div></body></html>";
                $stmt->close();
                $conn->close();
                exit;
            } else {
                echo "<div class='card-body'>";
                echo "<div class='alert alert-error'>⚠️ Lỗi khi xóa sản phẩm: " . $stmt->error . "</div>";
                echo "</div>";
            }
            $stmt->close();
        }
        ?>

        <div class="card-header">
            ⚠️ Xác nhận xóa sản phẩm
        </div>

        <div class="card-body">
            <div class="warning-icon">⚠️</div>
            
            <div class="alert alert-warning">
                ⚠️ BẠN ĐANG THỰC HIỆN XÓA SẢN PHẨM
            </div>

            <div class="product-info">
                <h3>📦 Thông tin sản phẩm sẽ bị xóa:</h3>
                <div class="info-row">
                    <span class="info-label">Mã sản phẩm:</span>
                    <span class="info-value"><?php echo htmlspecialchars($product['Ma_san_pham']); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Tên sản phẩm:</span>
                    <span class="info-value"><?php echo htmlspecialchars($product['Ten_san_pham']); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Thương hiệu:</span>
                    <span class="info-value"><?php echo htmlspecialchars($product['Ten_thuong_hieu']); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Loại sản phẩm:</span>
                    <span class="info-value"><?php echo htmlspecialchars($product['Ten_loai']); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Chất liệu:</span>
                    <span class="info-value"><?php echo htmlspecialchars($product['Chat_lieu']); ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Đơn giá:</span>
                    <span class="info-value"><?php echo number_format($product['Don_gia'], 0, ',', '.'); ?> VNĐ</span>
                </div>
            </div>

            <div class="warning-text">
                ⚠️ <strong>CẢNH BÁO:</strong> Hành động này không thể hoàn tác!<br>
                Tất cả dữ liệu liên quan đến sản phẩm này sẽ bị xóa vĩnh viễn.
            </div>

            <form method="POST" action="">
                <div class="btn-container">
                    <button type="submit" name="confirm_delete" class="btn btn-delete">🗑️ Xác nhận xóa</button>
                    <a href="admin_quan_ly_noi_that.php" class="btn btn-cancel">✕ Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$conn->close();
?>

</body>
</html>