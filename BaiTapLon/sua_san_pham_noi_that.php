<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
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
            justify-content: center;  
            flex: 1;
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
            max-width: 900px;
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
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            color: white;
            padding: 20px 30px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            
        }

        .card-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #2196F3;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2196F3;
            box-shadow: 0 0 10px rgba(33, 150, 243, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group input[readonly] {
            background: #f5f5f5;
            cursor: not-allowed;
            color: #999;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 35px;
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

        .btn-submit {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(33, 150, 243, 0.4);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(33, 150, 243, 0.5);
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

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 2px solid #bee5eb;
        }

        .required {
            color: #e74c3c;
            margin-left: 3px;
        }

        .note {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            font-style: italic;
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
    <h1 >✏️ Sửa Sản Phẩm Nội Thất</h1>
    <div class="breadcrumb">
        <a href="admin_quan_ly_noi_that.php">Trang chủ</a>
        <span>/</span>
        <span>Sửa sản phẩm</span>
    </div>
</div>

<div class="container">
    <div class="card">
        <?php
        // Kết nối database
        $conn = new mysqli('localhost', 'root', '', 'ql_noithat');
        $conn->set_charset("utf8");

        if ($conn->connect_error) {
            die("<div class='alert alert-error'>❌ Lỗi kết nối: " . $conn->connect_error . "</div>");
        }

        $success = false;
        $error_msg = "";
        $product = null;

        // Lấy mã sản phẩm từ URL
        $ma_san_pham = $_GET['id'] ?? '';

        if (empty($ma_san_pham)) {
            echo "<div class='card-body'>";
            echo "<div class='alert alert-error'>❌ Không tìm thấy mã sản phẩm!</div>";
            echo "<div style='text-align:center;'><a href='admin_quan_ly_noi_that.php' class='btn btn-cancel'>← Quay lại Dashboard</a></div>";
            echo "</div></div></div></body></html>";
            exit;
        }

        // Lấy thông tin sản phẩm hiện tại
        $sql = "SELECT * FROM san_pham WHERE Ma_san_pham = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ma_san_pham);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<div class='card-body'>";
            echo "<div class='alert alert-error'>❌ Không tìm thấy sản phẩm với mã: $ma_san_pham</div>";
            echo "<div style='text-align:center;'><a href='admin_quan_ly_noi_that.php' class='btn btn-cancel'>← Quay lại Dashboard</a></div>";
            echo "</div></div></div></body></html>";
            exit;
        }

        $product = $result->fetch_assoc();

        // Xử lý khi submit form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham = trim($_POST['ten_san_pham'] ?? '');
            $ma_thuong_hieu = trim($_POST['ma_thuong_hieu'] ?? '');
            $ma_loai = trim($_POST['ma_loai'] ?? '');
            $chat_lieu = trim($_POST['chat_lieu'] ?? '');
            $don_gia = trim($_POST['don_gia'] ?? '');
            $mo_ta = trim($_POST['mo_ta'] ?? '');
            $hinh_anh = trim($_POST['hinh_anh'] ?? '');

            if (empty($ten_san_pham) || empty($ma_thuong_hieu) || 
                empty($ma_loai) || empty($chat_lieu) || empty($don_gia)) {
                $error_msg = "⚠️ Vui lòng điền đầy đủ các trường bắt buộc!";
            } 
            else if (!is_numeric($don_gia) || $don_gia <= 0) {
                $error_msg = "⚠️ Đơn giá phải là số dương!";
            }
            else {
                $update_sql = "UPDATE san_pham 
                               SET Ten_san_pham = ?, Ma_thuong_hieu = ?, Ma_loai = ?, 
                                   Chat_lieu = ?, Don_gia = ?, Mo_ta = ?, Hinh_anh = ?
                               WHERE Ma_san_pham = ?";
                
                $stmt = $conn->prepare($update_sql);
                $stmt->bind_param("ssssdsss", $ten_san_pham, $ma_thuong_hieu, $ma_loai, 
                                  $chat_lieu, $don_gia, $mo_ta, $hinh_anh, $ma_san_pham);
                
                if ($stmt->execute()) {
                    $success = true;
                    $product['Ten_san_pham'] = $ten_san_pham;
                    $product['Ma_thuong_hieu'] = $ma_thuong_hieu;
                    $product['Ma_loai'] = $ma_loai;
                    $product['Chat_lieu'] = $chat_lieu;
                    $product['Don_gia'] = $don_gia;
                    $product['Mo_ta'] = $mo_ta;
                    $product['Hinh_anh'] = $hinh_anh;
                } else {
                    $error_msg = "⚠️ Lỗi khi cập nhật: " . $stmt->error;
                }
                $stmt->close();
            }
        }
        ?>

        <div class="card-header">
            📝 Thông tin sản phẩm
        </div>

        <div class="card-body">
            <?php
            if ($success) {
                echo "<div class='alert alert-success'>✅ Cập nhật sản phẩm thành công!</div>";
            } else if (!empty($error_msg)) {
                echo "<div class='alert alert-error'>$error_msg</div>";
            }
            ?>

            <div class="alert alert-info">
                📦 Đang sửa: <strong><?php echo htmlspecialchars($product['Ten_san_pham']); ?></strong>
            </div>

            <form method="POST" action="">
                
                <div class="form-group">
                    <label for="ma_san_pham">Mã sản phẩm</label>
                    <input type="text" id="ma_san_pham" name="ma_san_pham" 
                           value="<?php echo htmlspecialchars($product['Ma_san_pham']); ?>"
                           readonly>
                    <div class="note">⚠️ Mã sản phẩm không thể thay đổi</div>
                </div>

                <div class="form-group">
                    <label for="ten_san_pham">Tên sản phẩm<span class="required">*</span></label>
                    <input type="text" id="ten_san_pham" name="ten_san_pham" 
                           value="<?php echo htmlspecialchars($product['Ten_san_pham']); ?>"
                           placeholder="Nhập tên sản phẩm" required>
                </div>

                <div class="form-group">
                    <label for="ma_thuong_hieu">Thương hiệu<span class="required">*</span></label>
                    <select id="ma_thuong_hieu" name="ma_thuong_hieu" required>
                        <option value="">-- Chọn thương hiệu --</option>
                        <?php
                        $result = $conn->query("SELECT Ma_thuong_hieu, Ten_thuong_hieu FROM thuong_hieu ORDER BY Ten_thuong_hieu");
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($product['Ma_thuong_hieu'] == $row['Ma_thuong_hieu']) ? 'selected' : '';
                                echo "<option value='{$row['Ma_thuong_hieu']}' $selected>{$row['Ten_thuong_hieu']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ma_loai">Loại sản phẩm<span class="required">*</span></label>
                    <select id="ma_loai" name="ma_loai" required>
                        <option value="">-- Chọn loại sản phẩm --</option>
                        <?php
                        $result = $conn->query("SELECT Ma_loai, Ten_loai FROM loai_san_pham ORDER BY Ten_loai");
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($product['Ma_loai'] == $row['Ma_loai']) ? 'selected' : '';
                                echo "<option value='{$row['Ma_loai']}' $selected>{$row['Ten_loai']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="chat_lieu">Chất liệu<span class="required">*</span></label>
                    <input type="text" id="chat_lieu" name="chat_lieu" 
                           value="<?php echo htmlspecialchars($product['Chat_lieu']); ?>"
                           placeholder="VD: Gỗ sồi, Gỗ MDF..." required>
                </div>

                <div class="form-group">
                    <label for="don_gia">Đơn giá (VNĐ)<span class="required">*</span></label>
                    <input type="number" id="don_gia" name="don_gia" 
                           value="<?php echo htmlspecialchars($product['Don_gia']); ?>"
                           placeholder="VD: 2500000" min="0" step="1000" required>
                </div>

                <div class="form-group">
                    <label for="mo_ta">Mô tả</label>
                    <textarea id="mo_ta" name="mo_ta" 
                              placeholder="Nhập mô tả chi tiết..."><?php echo htmlspecialchars($product['Mo_ta']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="hinh_anh">Hình ảnh</label>
                    <input type="text" id="hinh_anh" name="hinh_anh" 
                           value="<?php echo htmlspecialchars($product['Hinh_anh']); ?>"
                           placeholder="VD: ban_go_soi.jpg">
                    <div class="note">💡 Nhập tên file hình trong thư mục images/</div>
                </div>

                <div class="btn-container">
                    <button type="submit" class="btn btn-submit">✓ Cập nhật</button>
                    <a href="admin_quan_ly_noi_that.php" class="btn btn-cancel">✕ Hủy</a>
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