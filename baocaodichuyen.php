<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=baocao_taisan_dadichuyen.xls");
header("Pragma: no-cache");
header("Expires: 0");
// session_start();
// if (!isset($_SESSION['user']) || $_SESSION['quyenhan'] !== 'user') {
//   header("Location: dangnhap.php");
//   exit();
// }


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

// phan quyen
session_start();
$role = $_SESSION['quyenhan'] ?? '';
$unit = strtoupper($_SESSION['donvi'] ?? '');

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
            yi.year_import  as year_import
        FROM full_information fi
        LEFT JOIN product p ON fi.product_name = p.id_product
        LEFT JOIN category_product cp ON fi.product_category = cp.id_category
        LEFT JOIN group_product gp ON fi.product_group = gp.id_group
        LEFT JOIN year_import yi on fi.year_import=yi.id_year
WHERE (fi.old_unit IS NOT NULL AND fi.old_unit != '')";

// loc User
if ($role === 'user') {
  $unit = $conn->real_escape_string($unit);
  $sql .= " AND fi.units = '$unit'";
}

$result = $conn->query($sql);

//tao bang exel
echo "<table border='1'>";
echo "<tr>
        <th>STT</th>
        <th>NHÓM TÀI SẢN</th>
        <th>LOẠI TÀI SẢN</th>
        <th>TÊN TÀI SẢN</th>
        <th>BARCODE</th>
        <th>NĂM NHẬP</th>
        <th>ĐƠN VỊ HIỆN TẠI</th>
        <th>ĐƠN VỊ CŨ</th>
        <th>THÔNG TIN TÀI SẢN</th>
        <th>THỜI HẠN BẢO HÀNH</th>
        <th>TÌNH TRẠNG</th>
      </tr>";

$stt = 1;
while ($row = $result->fetch_assoc()) {
  echo "<tr>
            <td>{$stt}</td>
            <td>{$row['product_group']}</td>
            <td>{$row['product_category']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['barcode']}</td>
            <td>{$row['year_import']}</td>
            <td>{$row['units']}</td>
            <td>{$row['old_unit']}</td>
            <td>{$row['product_information']}</td>
            <td>{$row['Warranty_Period']}</td>
            <td>{$row['product_status']}</td>
          </tr>";
  $stt++;
}
echo "</table>";
$conn->close();
