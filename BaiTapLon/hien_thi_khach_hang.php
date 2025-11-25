<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(135deg, #f6b26b 0%, #f093fb 100%);
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        h2 {
            background: linear-gradient(135deg, #f6b26b 0%, #f093fb 100%);
            color: white;
            padding: 25px;
            text-align: center;
            font-size: 28px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .table-wrapper {
            overflow-x: auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #f6b26b;
        }

        th {
            background: #f6b26b;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            white-space: nowrap;
            border: 1px solid #e89f54;
        }

        td {
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            text-align: center;
            vertical-align: middle;
        }

        /* Màu xen kẽ cho các dòng */
        tr:nth-child(odd) {
            background: #fff;
        }

        tr:nth-child(even) {
            background: #fff2cc;
        }

        tr:hover {
            background: #ffd966;
            transition: all 0.3s ease;
        }

        .stt {
            font-weight: bold;
            color: #999;
        }

        .ma-kh {
            font-weight: bold;
            color: #f6b26b;
            font-size: 14px;
        }

        .ten-kh {
            font-weight: 600;
            color: #333;
            text-align: left;
        }

        .gioi-tinh {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-block;
            font-weight: 500;
        }

        .gioi-tinh.nam {
            background: #e3f2fd;
            color: #1976d2;
        }

        .gioi-tinh.nu {
            background: #fce4ec;
            color: #c2185b;
        }

        .dia-chi {
            text-align: left;
        }

        .dien-thoai {
            color: #4caf50;
            font-weight: 500;
        }

        .email {
            color: #2196f3;
            font-size: 13px;
        }

        .no-data {
            text-align: center;
            padding: 50px;
            color: #999;
            font-size: 18px;
        }

        /* Phân trang theo style của cô */
        .pagination {
            text-align: center;
            padding: 20px;
            margin: 20px;
        }

        .pagination a {
            text-decoration: none;
            padding: 8px 15px;
            margin: 0 5px;
            background: #f6b26b;
            color: white;
            border-radius: 5px;
            transition: all 0.3s;
            display: inline-block;
        }

        .pagination a:hover {
            background: #f093fb;
            transform: scale(1.05);
        }

        .pagination b {
            padding: 8px 15px;
            margin: 0 5px;
            background: #f093fb;
            color: white;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }

        .page-info {
            text-align: center;
            padding: 10px;
            color: #666;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .table-wrapper {
                padding: 10px;
            }

            th, td {
                padding: 8px;
                font-size: 12px;
            }

            .pagination a, .pagination b {
                padding: 6px 10px;
                margin: 0 3px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>👥 THÔNG TIN KHÁCH HÀNG</h2>
        
        <?php
        // Kết nối database
        include 'connect.php';
        
        // Số mẫu tin trên mỗi trang
        $rowsPerPage = 5;
        
        // Lấy số trang hiện tại
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        
        // Vị trí của mẫu tin đầu tiên trên mỗi trang
        $offset = ($_GET['page'] - 1) * $rowsPerPage;
        
        // Lấy dữ liệu với LIMIT
        $sql = "SELECT * FROM khach_hang LIMIT " . $offset . ", " . $rowsPerPage;
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
            die("<p class='no-data'>❌ Lỗi truy vấn: " . mysqli_error($conn) . "</p>");
        }
        
        if (mysqli_num_rows($result) > 0) {
        ?>
        
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th width="50">STT</th>
                        <th width="80">Mã KH</th>
                        <th width="200">Tên khách hàng</th>
                        <th width="100">Giới tính</th>
                        <th width="250">Địa chỉ</th>
                        <th width="120">Số điện thoại</th>
                        <th width="200">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stt = $offset + 1;
                    while($row = mysqli_fetch_assoc($result)) {
                        $gioitinh = $row['Phai'] == "0" ? "Nam" : "Nữ";
                        $gioitinhClass = $row['Phai'] == "0" ? "nam" : "nu";
                    ?>
                    <tr>
                        <td class="stt"><?php echo $stt; ?></td>
                        <td class="ma-kh"><?php echo $row['Ma_khach_hang']; ?></td>
                        <td class="ten-kh"><?php echo $row['Ten_khach_hang']; ?></td>
                        <td>
                            <span class="gioi-tinh <?php echo $gioitinhClass; ?>">
                                <?php echo $gioitinh; ?>
                            </span>
                        </td>
                        <td class="dia-chi"><?php echo $row['Dia_chi']; ?></td>
                        <td class="dien-thoai">📞 <?php echo $row['Dien_thoai']; ?></td>
                        <td class="email">✉️ <?php echo $row['Email']; ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="sua_thong_tin_khach_hang.php?id=<?php echo $rows['Ma_khach_hang']; ?>" class="btn-action btn-edit">✏️ </a>
                                <a href="xoa_thong_tin_khach_hang.php?id=<?php echo $rows['Ma_khach_hang']; ?>" class="btn-action btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')">🗑️ </a>
                            </div>
                        </td>
                    </tr>

                    <?php 
                    $stt++; 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
        
        <?php
        }
        
        // Lấy tổng số mẫu tin
        $re = mysqli_query($conn, 'SELECT * FROM khach_hang');
        $numRows = mysqli_num_rows($re);
        
        // Tổng số trang
        $maxPage = floor($numRows / $rowsPerPage) + 1;
        
        // Hiển thị phân trang
        echo '<div class="pagination">';
        
        // Nút Back
        if ($_GET['page'] > 1) {
            echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "'>Back</a> ";
        }
        
        // Tạo link tương ứng tới các trang
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $_GET['page']) {
                echo '<b>Trang ' . $i . '</b> '; // Trang hiện tại được bôi đậm
            } else {
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $i . "'>Trang " . $i . "</a> ";
            }
        }
        
        // Nút Next
        if ($_GET['page'] < $maxPage) {
            echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "'>Next</a>";
        }
        
        echo '</div>';
        
        // Hiển thị thông tin trang
        echo '<div class="page-info">';
        echo 'Tổng số trang: <strong>' . $maxPage . '</strong> | ';
        echo 'Tổng số khách hàng: <strong>' . $numRows . '</strong>';
        echo '</div>';
        
        if (mysqli_num_rows($result) == 0) {
            echo '<div class="no-data">❌ Không có dữ liệu khách hàng!</div>';
        }
        
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>