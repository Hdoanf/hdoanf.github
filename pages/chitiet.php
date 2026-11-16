<?php
// lay thu vien tao ma vach
require_once __DIR__ . '/../vendor/autoload.php';
//
use Picqer\Barcode\BarcodeGeneratorHTML;

require_once __DIR__ . '/../config.php';

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}


$id = $conn->real_escape_string($_GET['id']);

// lay du lieu tu user_choices hoac full_information
$sql = "SELECT * FROM user_choices WHERE barcode = '$id' ORDER BY `user_choices`.`created_at` DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
  $sql_full = "SELECT * FROM full_information WHERE barcode = '$id'";
  $res_full = $conn->query($sql_full);
  if ($res_full && $res_full->num_rows > 0) {
    $row = $res_full->fetch_assoc();
  } else {
    echo "<div class='alert alert-warning my-3'>Không tìm thấy tài sản với mã này.</div>";
    exit;
  }
}

$data = $row["barcode"];
$taoma = new BarcodeGeneratorHTML();
$mavach = $taoma->getBarcode($data, $taoma::TYPE_CODE_128);


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
        <th>Năm Nhập</th>
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
        <th>Phòng / Đơn vị</th>
        <td>
          <?php
          echo isset($row["units"]) ? htmlspecialchars($row["units"]) : '—';
          ?>
        </td>
      </tr>
      <tr>
        <th>Trạng Thái</th>
        <?php
        $status = ($row["product_status"] == 'active') ? 'badge bg-success' : 'badge bg-danger';
        echo "<td><span class='$status'>" . htmlspecialchars($row["product_status"]) . "</span></td>"; ?>
      </tr>

      <tr>
        <th>Mã Vạch</th>
        <td>
          <div class="p-2 bg-light border rounded text-center">
            <?php echo $mavach; ?>
            <div class="mt-2 font-monospace fw-bold text-secondary"><?php echo htmlspecialchars($data); ?></div>
          </div>
        </td>
      </tr>

    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
