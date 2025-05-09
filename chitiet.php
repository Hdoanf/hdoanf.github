<?php
// lay thu vien tao ma vach
require __DIR__ . '/vendor/autoload.php';
//
use Picqer\Barcode\BarcodeGeneratorHTML;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo "hình như chưa kết nối được ";
}
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}


$id = $_GET['id'];

// lay du lieu
$sql = "SELECT * FROM user_choices WHERE barcode = '$id' ORDER BY `user_choices`.`created_at` DESC ";
$result = $conn->query($sql);
$fullsql = "SELECT `note`,`old_unit`   FROM `full_information` WHERE `barcode`= '$id'";
$kq = $conn->query($fullsql);
$rowfull = $kq->fetch_assoc();
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $data = $row["barcode"];
  $taoma = new BarcodeGeneratorHTML();
  $mavach = $taoma->getBarcode($data, $taoma::TYPE_CODE_128);
} else {
  echo "Không tìm thấy tài sản.";
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Tài Sản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <table class="table table-bordered">
      <tr>
        <th>Nhóm Tài Sản </th>
        <?php
        $kqgroup = $conn->query("SELECT * FROM group_product WHERE id_group = " . $row["product_group"] . "");
        if ($kqgroup->num_rows > 0) {
          $rowgroup = $kqgroup->fetch_assoc();
          $group = $rowgroup["name_group"];
        }
        echo "<td>" . $group . "</td>";
        ?>
      </tr>
      <tr>
        <th>Loại Tài Sản</th>
        <?php $kqcategory = $conn->query("SELECT * FROM category_product WHERE id_category = " . $row["product_category"] . "");
        if ($kqcategory->num_rows > 0) {
          $rowcategory = $kqcategory->fetch_assoc();
          $category = $rowcategory["name_category"];
        }
        echo "<td>" . $category . "</td>"; ?>
      </tr>
      <tr>
        <th>Tình Trạng</th>
        <?php $ten = strtoupper($row["product_name"]);
        $kqname = $conn->query("SELECT * FROM `product` WHERE `id_product`='$ten'");
        if ($kqname->num_rows > 0) {
          $rowname = $kqname->fetch_assoc();
          $name = $rowname["name_product"];
        }
        echo "<td>" . $name . "</td>";
        ?>
      </tr>
      <tr>
        <th>Ngày Cập Nhập</th>
        <?php $nam = '';
        $strnam = $conn->real_escape_string($row["year_import"]);
        $kqnam = $conn->query("SELECT * FROM `year_import` WHERE `id_year`LIKE '$strnam' ");
        if ($kqnam->num_rows) {
          $rownam = $kqnam->fetch_assoc();
          $nam = $rownam['year_import'];
        }
        echo "<td>" . $nam . "</td>"; ?>
      </tr>
      <tr>
        <th>Mô tả</th>
        <td>
          <?php echo $row["product_information"];
          ?>
        </td>
      <tr>
        <th>Ngày Sửa Đổi </th>
        <td>
          <?php echo $row["created_at"];
          ?>
        </td>
      <tr>
      <tr>
        <th>Phòng cũ</th>
        <td>
          <?php
          //echo 
          $id_old_unit = $rowfull["old_unit"];
          $old_unit_sql = "SELECT * FROM `units` WHERE `id_units`= '$id_old_unit'";
          $result_unit = $conn->query($old_unit_sql);
          $old_unit = $result_unit->fetch_assoc();
          echo $old_unit['units'];
          ?>
        </td>
      </tr>
      <th>Trạng Thái</th>
      <?php
      $status = ($row["product_status"] == 'active') ? 'badge bg-success' : 'badge bg-danger';
      echo "<td><span class='$status'>" . $row["product_status"] . "</span></td>"; ?>
      </tr>

      <tr>
        <th>Mã Vạch</th>
        <td>
          <?php echo $mavach; ?>
        </td>
      </tr>
      <tr>
        <th>Ghi chú</th>
        <td>
          <?php
          echo $rowfull["note"];
          ?>
        </td>
      </tr>

    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
