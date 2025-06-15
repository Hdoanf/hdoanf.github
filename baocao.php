<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=baocao_taisan_hong_theo_nam.xls");
header("Pragma: no-cache");
header("Expires: 0");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

// Phân quyền
session_start();
$role = $_SESSION['quyenhan'] ?? '';
$unit = strtoupper($_SESSION['donvi'] ?? '');

// Sửa câu truy vấn: Lấy năm thực tế từ bảng year_import
$sql = "SELECT 
            fi.barcode,
            p.name_product AS product_name,
            cp.name_category AS product_category,
            fi.units,
            fi.product_status,
            fi.product_information,
            fi.Warranty_Period,
            fi.old_unit,
            gp.name_group AS product_group,
            yi.year_import as year_value  -- Đổi tên cột thành year_value
        FROM full_information fi
        LEFT JOIN product p ON fi.product_name = p.id_product
        LEFT JOIN category_product cp ON fi.product_category = cp.id_category
        LEFT JOIN group_product gp ON fi.product_group = gp.id_group
        LEFT JOIN year_import yi ON fi.year_import = yi.id_year
        WHERE (fi.product_status = 'maintenance' OR fi.product_status = 'inactive')";

// Lọc User
if ($role === 'user') {
  $unit = $conn->real_escape_string($unit);
  $sql .= " AND fi.units = '$unit'";
}

$result = $conn->query($sql);

// Tổ chức dữ liệu theo năm
$dataByYear = [];
while ($row = $result->fetch_assoc()) {
  // Sử dụng year_value thay vì year_import
  $year = $row['year_value'];

  // Nhóm các năm không xác định
  if (empty($year)) {
    $year = "Không xác định";
  }

  if (!isset($dataByYear[$year])) {
    $dataByYear[$year] = [];
  }
  $dataByYear[$year][] = $row;
}

// Tạo bảng Excel chia theo năm
echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta charset="UTF-8">
<style>
    table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
    th, td { border: 1px solid black; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; font-weight: bold; }
    .year-header { background-color: #3498db; color: white; padding: 10px; font-size: 16pt; margin-top: 20px; }
    .summary { margin-bottom: 10px; font-weight: bold; }
</style>
</head>
<body>';

// Sắp xếp các năm theo thứ tự
ksort($dataByYear);

foreach ($dataByYear as $year => $assets) {
  $brokenCount = 0;
  $maintenanceCount = 0;

  // Đếm số lượng theo trạng thái
  foreach ($assets as $asset) {
    if ($asset['product_status'] == 'inactive') {
      $brokenCount++;
    } elseif ($asset['product_status'] == 'maintenance') {
      $maintenanceCount++;
    }
  }

  // Tiêu đề năm
  echo '<div class="summary">-Năm: ' . $year . '</div>';
  echo '<div class="summary">-Tổng tài sản hỏng: ' . count($assets) . '</div>';
  echo '<div class="summary">- Cần bảo trì: ' . $maintenanceCount . '</div>';
  echo '<div class="summary">- Cần thanh lý: ' . $brokenCount . '</div>';
  echo '<div class="summary"> <br> </div>';
  // Bảng chi tiết
  echo '<table border="1">';
  echo '<th> ' . $year . ' </th>';
  echo '<tr>
            <th>STT</th>
            <th>NHÓM TÀI SẢN</th>
            <th>PHÂN LOẠI TÀI SẢN</th>
            <th>TÊN TÀI SẢN</th>
            <th>BARCODE</th>
            <th>ĐƠN VỊ</th>
            <th>THÔNG TIN TÀI SẢN</th>
            <th>THỜI HẠN BẢO HÀNH</th>
            <th>TÌNH TRẠNG</th>
            <th>YÊU CẦU XỬ LÝ</th>
          </tr>';

  $stt = 1;
  foreach ($assets as $row) {
    $yeu_cau = ($row['product_status'] == 'maintenance') ? 'BẢO TRÌ' : 'THANH LÝ';
    $statusColor = ($row['product_status'] == 'maintenance') ? 'background-color: #FFF3CD;' : 'background-color: #F8D7DA;';

    echo "<tr>
                <td>{$stt}</td>
                <td>{$row['product_group']}</td>
                <td>{$row['product_category']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['barcode']}</td>
                <td>{$row['units']}</td>
                <td>{$row['product_information']}</td>
                <td>{$row['Warranty_Period']}</td>
                <td style='{$statusColor}'>{$row['product_status']}</td>
                <td>{$yeu_cau}</td>
              </tr>";
    $stt++;
  }

  echo '</table>';
  echo '<div class="summary"> <br> </div>';
  echo '<div style="page-break-after: always;"></div>'; // Ngắt trang khi in
}

echo '</body></html>';
$conn->close();
