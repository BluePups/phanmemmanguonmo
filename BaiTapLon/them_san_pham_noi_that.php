<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm nội thất</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 26px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-container {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #667eea;
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
            border-color: #667eea;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group select {
            cursor: pointer;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 35px;
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
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .btn-reset {
            background: linear-gradient(135deg, #ff9800 0%, #f57c00 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 152, 0, 0.3);
        }

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 152, 0, 0.4);
        }

        .alert {
            padding: 15px 20px;
            margin: 20px 40px;
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

        .result-card {
            margin: 20px 40px;
            padding: 30px;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8ebff 100%);
            border-radius: 12px;
            border: 2px solid #667eea;
        }

        .result-card h3 {
            color: #667eea;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 3px solid #764ba2;
            padding-bottom: 12px;
            font-size: 20px;
        }

        .result-row {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .result-row:last-child {
            border-bottom: none;
        }

        .result-label {
            font-weight: bold;
            color: #764ba2;
            min-width: 180px;
        }

        .result-value {
            flex: 1;
            color: #333;
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
            .form-container {
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

<div class="container">
    <div class="header">
        🛋️ Thêm Mới Sản Phẩm Nội Thất
    </div>

    <?php
    // Kết nối database
    $conn = new mysqli('localhost', 'root', '', 'ql_noithat');
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("<div class='alert alert-error'>❌ Lỗi kết nối: " . $conn->connect_error . "</div>");
    }

    $success = false;
    $error_msg = "";
    $inserted_data = null;

    // Xử lý khi submit form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $ma_san_pham = trim($_POST['ma_san_pham'] ?? '');
        $ten_san_pham = trim($_POST['ten_san_pham'] ?? '');
        $ma_thuong_hieu = trim($_POST['ma_thuong_hieu'] ?? '');
        $ma_loai = trim($_POST['ma_loai'] ?? '');
        $chat_lieu = trim($_POST['chat_lieu'] ?? '');
        $don_gia = trim($_POST['don_gia'] ?? '');
        $mo_ta = trim($_POST['mo_ta'] ?? '');
        $hinh_anh = trim($_POST['hinh_anh'] ?? '');

        // Validate dữ liệu
        if (empty($ma_san_pham) || empty($ten_san_pham) || empty($ma_thuong_hieu) || 
            empty($ma_loai) || empty($chat_lieu) || empty($don_gia)) {
            $error_msg = "⚠️ Kiểm tra lại thông tin nhập vào. Các trường có dấu (*) là bắt buộc!";
        } 
        else if (!is_numeric($don_gia) || $don_gia <= 0) {
            $error_msg = "⚠️ Đơn giá phải là số dương!";
        }
        else {
            // Kiểm tra mã sản phẩm đã tồn tại chưa
            $check_sql = "SELECT Ma_san_pham FROM san_pham WHERE Ma_san_pham = ?";
            $stmt = $conn->prepare($check_sql);
            $stmt->bind_param("s", $ma_san_pham);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $error_msg = "⚠️ Mã sản phẩm '$ma_san_pham' đã tồn tại. Vui lòng nhập mã khác!";
            } else {
                // Thêm mới vào database
                $insert_sql = "INSERT INTO san_pham (Ma_san_pham, Ten_san_pham, Ma_thuong_hieu, Ma_loai, Chat_lieu, Don_gia, Mo_ta, Hinh_anh) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                
                $stmt = $conn->prepare($insert_sql);
                $stmt->bind_param("sssssdss", $ma_san_pham, $ten_san_pham, $ma_thuong_hieu, $ma_loai, 
                                  $chat_lieu, $don_gia, $mo_ta, $hinh_anh);
                
                if ($stmt->execute()) {
                    $success = true;
                    
                    // Lấy thông tin vừa thêm để hiển thị
                    $select_sql = "
                        SELECT sp.*, th.Ten_thuong_hieu, lsp.Ten_loai 
                        FROM san_pham sp
                        JOIN thuong_hieu th ON sp.Ma_thuong_hieu = th.Ma_thuong_hieu
                        JOIN loai_san_pham lsp ON sp.Ma_loai = lsp.Ma_loai
                        WHERE sp.Ma_san_pham = ?
                    ";
                    $stmt = $conn->prepare($select_sql);
                    $stmt->bind_param("s", $ma_san_pham);
                    $stmt->execute();
                    $inserted_data = $stmt->get_result()->fetch_assoc();
                } else {
                    $error_msg = "⚠️ Lỗi khi thêm dữ liệu: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }

    // Hiển thị thông báo
    if ($success) {
        echo "<div class='alert alert-success'>✅ Thêm mới sản phẩm nội thất thành công!</div>";
        
        // Hiển thị thông tin sản phẩm vừa thêm
        if ($inserted_data) {
            echo "<div class='result-card'>";
            echo "<h3>📦 THÔNG TIN SẢN PHẨM VỪA THÊM</h3>";
            echo "<div class='result-row'><span class='result-label'>Mã sản phẩm:</span><span class='result-value'>" . htmlspecialchars($inserted_data['Ma_san_pham']) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Tên sản phẩm:</span><span class='result-value'>" . htmlspecialchars($inserted_data['Ten_san_pham']) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Thương hiệu:</span><span class='result-value'>" . htmlspecialchars($inserted_data['Ten_thuong_hieu']) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Loại sản phẩm:</span><span class='result-value'>" . htmlspecialchars($inserted_data['Ten_loai']) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Chất liệu:</span><span class='result-value'>" . htmlspecialchars($inserted_data['Chat_lieu']) . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Đơn giá:</span><span class='result-value'>" . number_format($inserted_data['Don_gia'], 0, ',', '.') . " VNĐ</span></div>";
            echo "<div class='result-row'><span class='result-label'>Mô tả:</span><span class='result-value'>" . htmlspecialchars($inserted_data['Mo_ta'] ?? '') . "</span></div>";
            echo "<div class='result-row'><span class='result-label'>Hình ảnh:</span><span class='result-value'>" . htmlspecialchars($inserted_data['Hinh_anh'] ?? '') . "</span></div>";
            echo "</div>";
        }
    } else if (!empty($error_msg)) {
        echo "<div class='alert alert-error'>$error_msg</div>";
    }
    ?>

    <div class="form-container">
        <form name="formThemMoi" method="POST" action="">
            
            <div class="form-group">
                <label for="ma_san_pham">Mã sản phẩm<span class="required">*</span></label>
                <input type="text" id="ma_san_pham" name="ma_san_pham" 
                       value="<?php echo htmlspecialchars($_POST['ma_san_pham'] ?? ''); ?>"
                       placeholder="Nhập mã sản phẩm (VD: SP006)" required>
            </div>

            <div class="form-group">
                <label for="ten_san_pham">Tên sản phẩm<span class="required">*</span></label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" 
                       value="<?php echo htmlspecialchars($_POST['ten_san_pham'] ?? ''); ?>"
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
                            $selected = (isset($_POST['ma_thuong_hieu']) && $_POST['ma_thuong_hieu'] == $row['Ma_thuong_hieu']) ? 'selected' : '';
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
                            $selected = (isset($_POST['ma_loai']) && $_POST['ma_loai'] == $row['Ma_loai']) ? 'selected' : '';
                            echo "<option value='{$row['Ma_loai']}' $selected>{$row['Ten_loai']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="chat_lieu">Chất liệu<span class="required">*</span></label>
                <input type="text" id="chat_lieu" name="chat_lieu" 
                       value="<?php echo htmlspecialchars($_POST['chat_lieu'] ?? ''); ?>"
                       placeholder="VD: Gỗ sồi, Gỗ MDF, Kim loại..." required>
            </div>

            <div class="form-group">
                <label for="don_gia">Đơn giá (VNĐ)<span class="required">*</span></label>
                <input type="number" id="don_gia" name="don_gia" 
                       value="<?php echo htmlspecialchars($_POST['don_gia'] ?? ''); ?>"
                       placeholder="VD: 2500000" min="1" step="1000" required>
            </div>

            <div class="form-group">
                <label for="mo_ta">Mô tả</label>
                <textarea id="mo_ta" name="mo_ta" 
                          placeholder="Nhập mô tả chi tiết về sản phẩm..."><?php echo htmlspecialchars($_POST['mo_ta'] ?? ''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="hinh_anh">Hình ảnh</label>
                <input type="text" id="hinh_anh" name="hinh_anh" 
                       value="<?php echo htmlspecialchars($_POST['hinh_anh'] ?? ''); ?>"
                       placeholder="VD: ban_go_soi.jpg">
                <div class="note">💡 Nhập tên file hình trong thư mục images/</div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-submit">✓ Thêm mới</button>
                <button type="reset" class="btn btn-reset">↻ Làm mới</button>
            </div>

        </form>
    </div>
</div>

<?php
$conn->close();
?>

</body>
</html>