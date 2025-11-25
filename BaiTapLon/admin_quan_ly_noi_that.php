<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Nội thất - Admin Console</title>
    <style>
        /* CSS Reset */
        * {
            margin:0; 
            padding:0;
            box-sizing:border-box; 
        }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:#f0f0f0; 
            color:#333; 
            line-height:1.6; 
            font-size:15px; 
        }
        .page-header { 
            background:#2c3e50; 
            padding:25px 0; 
            text-align:center; 
            border-bottom:5px solid #3498db; 
        }
        .site-title { 
            font-size:32px; 
            color:#ecf0f1; 
            font-weight:700; 
            margin-bottom:5px; 
            letter-spacing:1px; 
        }
        .site-slogan { 
            font-size:16px; 
            color:#bdc3c7; 
            font-style:italic; 
        }
        .main-nav { 
            background:#ecf0f1; 
            border-top:1px solid #ccc; 
            border-bottom:1px solid #ccc; 
            padding:0; 
            margin-bottom:25px; }
        .main-nav ul { 
            list-style:none; 
            display:flex; 
            justify-content:center; 
        }
        .main-nav ul li { 
            border-right:1px solid #ddd; 
        }
        .main-nav ul li:first-child { 
            border-left:1px solid #ddd; 
        }
        .main-nav ul li a { 
            display:block; 
            padding:12px 20px; 
            text-decoration:none; 
            color:#34495e; font-weight:600; 
            transition:all 0.2s ease; 
        }
        .main-nav ul li a:hover, .main-nav ul li a.active { 
            background:#3498db; 
            color:white; 
        }
        .container { 
            width:90%; 
            max-width:1300px; 
            margin:0 auto; 
            padding:0 10px; 
        }
        .content-block { 
            background:#fff; 
            padding:30px; 
            border:1px solid #ddd; 
            border-radius:8px; 
            box-shadow:0 4px 12px rgba(0,0,0,0.05); 
        }
        h1 { 
            font-size:26px; 
            border-bottom:2px solid #e0e0e0; 
            padding-bottom:12px; 
            margin-bottom:20px;
            color:#3498db; 
            text-align:center; 
        }
        h2 { 
            font-size:20px; 
            margin-top:25px; 
            margin-bottom:15px; 
            color:#555; 
            font-weight:600; 
        }
        table { 
            width:100%; 
            border-collapse:collapse; 
            margin-top:15px; font-size:14px; 
            table-layout:fixed; 
            border:1px solid #ccc; 
            border-radius:6px; overflow:hidden; 
        }
        th { background:#3498db; color:white; padding:14px 10px; text-align:center; border:none; font-weight:bold; text-transform:uppercase; }
        td { padding:12px 10px; border:1px solid #f0f0f0; text-align:center; vertical-align:middle; }
        tr:nth-child(even) { background:#f9f9f9; }
        tr:hover { background:#eaf2f8; }
        .ten-sp { text-align:left; font-weight:600; color:#2c3e50; }
        .don-gia { color:#e74c3c; font-weight:bold; white-space:nowrap; }
        .hinh-anh { width:60px; height:60px; object-fit:cover; border:2px solid #eee; border-radius:4px; box-shadow:0 0 5px rgba(0,0,0,0.1); }
        .add-new-button { text-align:right; margin-bottom:15px; }
        .btn-add { background:#2ecc71; color:white; padding:10px 18px; text-decoration:none; border-radius:5px; font-weight:bold; transition: background 0.3s; }
        .btn-add:hover { background:#27ae60; }
        .action-buttons { display:flex; gap:7px; justify-content:center; }
        .btn-action { padding:6px 12px; border:none; border-radius:4px; font-size:13px; font-weight:bold; cursor:pointer; text-decoration:none; color:white; transition:background 0.2s; }
        .btn-edit { background:#3498db; } .btn-edit:hover { background:#2980b9; }
        .btn-delete { background:#e74c3c; } .btn-delete:hover { background:#c0392b; }
        .pagination { padding:20px 0; text-align:center; }
        .pagination a, .pagination b { text-decoration:none; padding:10px 14px; margin:0 4px; background:#ddd; color:#333; border-radius:5px; display:inline-block; font-weight:600; transition:all 0.3s; }
        .pagination a:hover { background:#ccc; }
        .pagination b { background:#3498db; color:white; box-shadow:0 2px 4px rgba(0,0,0,0.1); }
        .page-info { text-align:center; padding:10px 0; color:#777; font-size:14px; }
        .page-footer { text-align:center; padding:20px; font-size:13px; color:#777; border-top:1px solid #ccc; margin-top:25px; }
        form input, form select { padding:8px; border:1px solid #ccc; border-radius:5px; }
        form button { padding:8px 15px; background:#3498db; color:white; border:none; border-radius:5px; cursor:pointer; }
        form a { padding:8px 15px; background:#777; color:white; border-radius:5px; text-decoration:none; }
    </style>
</head>
<body>
    <div class="page-header">
        <div class="container">
            <p class="site-title">Quản lý Nội thất Cửa hàng HD Sofa Admin</p>
            <p class="site-slogan">Phần mềm quản lý bán hàng</p>
        </div>
    </div>

    <div class="main-nav">
        <div class="container">
            <ul>
                <li><a href="index.php">Trang chủ </a></li>
                <li><a href="register.php">Đăng ký </a></li>
                <li><a href="view_users.php">Quản lý người dùng </a></li>
                <li><a href="password.php">Đổi mật khẩu </a></li>
                <li><a href="admin_quan_ly_noi_that.php" class="active">Quản lý Sản phẩm Nội thất</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="content-block">
            <h1>Quản lý Sản phẩm Nội thất</h1>
            
            <?php
            // Kết nối database
            $conn = mysqli_connect('localhost', 'root', '', 'ql_noithat');
            if (!$conn) { die("<p style='color:red;font-weight:bold;'>Lỗi kết nối CSDL: " . mysqli_connect_error() . "</p>"); }
            mysqli_set_charset($conn, 'UTF8');

            // Thống kê tổng sản phẩm
            $total_products = mysqli_num_rows(mysqli_query($conn, 'SELECT * FROM san_pham'));
            echo '<h2>Thông tin tổng quan</h2>';
            echo '<p>Hệ thống hiện đang quản lý <strong>' . number_format($total_products) . '</strong> sản phẩm nội thất.</p>';
            echo '<hr style="margin: 15px 0; border: 0; border-top: 1px dotted #e0e0e0;">';

            echo '<h2>Danh sách Sản phẩm</h2>';

            // --- FORM TÌM KIẾM ---
            ?>
            <form method="GET" style="margin-bottom: 20px; display:flex; gap:10px; align-items:center;">
                <input type="text" name="ten" placeholder="Tìm theo tên..." 
                       value="<?php echo isset($_GET['ten']) ? $_GET['ten'] : ''; ?>">
                <input type="number" name="gia" placeholder="Tìm theo giá (đơn giá ≤ ...)" 
                       value="<?php echo isset($_GET['gia']) ? $_GET['gia'] : ''; ?>">
                <select name="loai">
                    <option value="">-- Chọn loại --</option>
                    <?php  
                    $getLoai = mysqli_query($conn, "SELECT * FROM loai_san_pham");
                    while($r = mysqli_fetch_assoc($getLoai)) {
                        $selected = (isset($_GET['loai']) && $_GET['loai'] == $r['Ma_loai']) ? 'selected' : '';
                        echo "<option value='".$r['Ma_loai']."' $selected>".$r['Ten_loai']."</option>";
                    }
                    ?>
                </select>
                <button type="submit">Tìm kiếm</button>
                <a href="admin_quan_ly_noi_that.php">Reset</a>
            </form>
            
            <?php
            // --- Phân trang ---
            $rowsPerPage = 5;
            $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($currentPage - 1) * $rowsPerPage;

            // --- WHERE động ---
            $where = " WHERE 1=1 ";
            if (!empty($_GET['ten'])) { $ten = mysqli_real_escape_string($conn, $_GET['ten']); $where .= " AND sp.Ten_san_pham LIKE '%$ten%' "; }
            if (!empty($_GET['gia'])) { $gia = (int)$_GET['gia']; $where .= " AND sp.Don_gia <= $gia "; }
            if (!empty($_GET['loai'])) { $loai = mysqli_real_escape_string($conn, $_GET['loai']); $where .= " AND sp.Ma_loai = '$loai' "; }

            // Tổng sản phẩm sau khi lọc
            $countQuery = "SELECT * FROM san_pham sp $where";
            $numRows = mysqli_num_rows(mysqli_query($conn, $countQuery));
            $maxPage = ceil($numRows / $rowsPerPage);

            // Lấy dữ liệu phân trang
            $sql = "SELECT sp.*, th.Ten_thuong_hieu, lsp.Ten_loai 
                    FROM san_pham sp
                    LEFT JOIN thuong_hieu th ON sp.Ma_thuong_hieu = th.Ma_thuong_hieu
                    LEFT JOIN loai_san_pham lsp ON sp.Ma_loai = lsp.Ma_loai
                    $where
                    LIMIT $offset, $rowsPerPage";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
            ?>
            <div class="add-new-button">
                <a href="them_san_pham_noi_that.php" class="btn-add">➕ Thêm Sản phẩm mới</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Thương hiệu</th>
                        <th>Loại</th>
                        <th>Chất liệu</th>
                        <th>Đơn giá</th>
                        <th>Ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $stt = $offset + 1;
                while($rows = mysqli_fetch_assoc($result)) { 
                    $ten_thuong_hieu = $rows['Ten_thuong_hieu'] ?? $rows['Ma_thuong_hieu'];
                    $ten_loai = $rows['Ten_loai'] ?? $rows['Ma_loai'];
                ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $rows['Ma_san_pham']; ?></td>
                        <td class="ten-sp"><?php echo $rows['Ten_san_pham']; ?></td>
                        <td><?php echo $ten_thuong_hieu; ?></td>
                        <td><?php echo $ten_loai; ?></td>
                        <td><?php echo $rows['Chat_lieu']; ?></td>
                        <td class="don-gia"><?php echo number_format($rows['Don_gia'],0,',','.');?> đ</td>
                        <td>
                            <?php if(!empty($rows['Hinh_anh'])): ?>
                                <img src="images/<?php echo $rows['Hinh_anh'];?>" alt="<?php echo $rows['Ten_san_pham'];?>" class="hinh-anh">
                            <?php else: ?> (Không ảnh) <?php endif; ?>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="sua_san_pham_noi_that.php?id=<?php echo $rows['Ma_san_pham'];?>" class="btn-action btn-edit">Sửa</a>
                                <a href="xoa_san_pham_noi_that.php?id=<?php echo $rows['Ma_san_pham'];?>" class="btn-action btn-delete" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php $stt++; } ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
            <?php
            if($currentPage > 1) echo "<a href='?page=".($currentPage-1)."&ten=".(@$_GET['ten'])."&gia=".(@$_GET['gia'])."&loai=".(@$_GET['loai'])."'>&laquo; Trước</a>";
            for($i=1;$i<=$maxPage;$i++){
                if($i==$currentPage) echo "<b>$i</b> ";
                else echo "<a href='?page=$i&ten=".(@$_GET['ten'])."&gia=".(@$_GET['gia'])."&loai=".(@$_GET['loai'])."'>$i</a> ";
            }
            if($currentPage<$maxPage) echo "<a href='?page=".($currentPage+1)."&ten=".(@$_GET['ten'])."&gia=".(@$_GET['gia'])."&loai=".(@$_GET['loai'])."'>Sau &raquo;</a>";
            ?>
            </div>

            <div class="page-info">
                Đang hiển thị Trang <strong><?php echo $currentPage;?></strong> / <strong><?php echo $maxPage;?></strong>. Tổng cộng: <strong><?php echo number_format($numRows);?></strong> sản phẩm.
            </div>

            <?php } else {
                echo '<p style="padding: 30px; text-align: center; color: #999;">Chưa có sản phẩm nào trong hệ thống.</p>';
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <div class="page-footer">
        Copyright &copy; Phát triển mã nguồn mở | Nhóm 8
    </div>
</body>
</html>
