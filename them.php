<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');
$category_product = "SELECT * FROM category_product";
$group_product = "SELECT * FROM group_product";
$product = "SELECT * FROM product";
$status_product = "SELECT * FROM status_product";
$units = "SELECT * FROM units
ORDER BY
    CASE
        WHEN units = 'Chưa phân lớp' THEN 0
        ELSE 1
    END,
    units;
";
$year_import = "SELECT * FROM year_import";

$kqcate = $conn->query($category_product);
$kqgroup = $conn->query($group_product);
$kqproduct = $conn->query($product);
$kqstatus = $conn->query($status_product);
$kqunits = $conn->query($units);
$kqyear = $conn->query($year_import);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $loaits = $_POST['product_category'];
  $taisan = $_POST['product'];
  $nhomts = $_POST['product_group'];
  $trangthai = $_POST['product_status'];
  $donvi = $_POST['units'];
  $nam = $_POST['year_import'];
  $baohanh = $_POST['thoihan_baohanh'];
  $info = $_POST['thongtin'];

  //lay item lớn nhất trong nhóm có 4 cột đầu tiên giống nhau
  $sqlMaxItem = "SELECT MAX(item) AS max_item FROM full_information 
                   WHERE product_category = '$loaits' 
                   AND product_name = '$taisan' 
                   AND product_group = '$nhomts' 
                   AND year_import = '$nam'";

  $result = $conn->query($sqlMaxItem);
  $maxItem = 0;

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maxItem = intval($row["max_item"]);
  }
  // them000 vao truoc truc so
  $newItem = str_pad($maxItem + 1, 4, "0", STR_PAD_LEFT);

  $barcode = $nhomts . $loaits . $taisan . $nam . $newItem;
  echo "<script>console.log('$barcode')</script>";
  echo "<script>console.log('$newItem')</script>";
  echo "<script>console.log('$nam')</script>";
  echo "<script>console.log('$loaits')</script>";
  echo "<script>console.log('$taisan')</script>";
  echo "<script>console.log('$baohanh')</script>";
  echo "<script>console.log('$trangthai')</script>";
  echo "<script>console.log('$donvi')</script>";
  echo "<script>console.log('$nhomts')</script>";

  $sqlInsert = "INSERT INTO `full_information`
  (`product_group`, `product_category`, `product_name`, `year_import`, `item`,
  `barcode`,`product_information`,`Warranty_Period`, `product_status`, `units`, `note`)
  VALUES ('$nhomts','$loaits','$taisan','$nam','$newItem','$barcode','$info','$baohanh','$trangthai','$donvi','')";
  $kqInsert = $conn->query($sqlInsert);

  session_start();
  if ($kqInsert) {
    $_SESSION['thanhcong'] = "Thêm tài sản thành công";
  } else {
    $_SESSION['loi'] = "Lỗi khi thêm tài sản";
  }
  header("Location: admin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Tài Sản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-4">
    <h2 class="text-center">Thêm Tài Sản</h2>
    <form method="POST" action="them.php">
      <div class="row">
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header bg-primary text-white">Thông tin chung</div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Nhóm tài sản</label>
                <select class="form-select" name="product_group">
                  <?php foreach ($kqgroup as $gr) {
                    echo "<option value='{$gr["id_group"]}'>" . $gr["name_group"] . "</option>";
                  } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Danh mục tài sản</label>
                <select class="form-select" name="product">
                  <?php foreach ($kqproduct as $pro) {
                    echo "<option value='{$pro["id_product"]}'>" . $pro["name_product"] . "</option>";
                  } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Loại tài sản</label>
                <select class="form-select" name="product_category">
                  <?php foreach ($kqcate as $cate) {
                    echo "<option value='{$cate["id_category"]}'>" . $cate["name_category"] . "</option>";
                  } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Đơn vị sở hữu</label>
                <select class="form-select" name="units">
                  <?php foreach ($kqunits as $unt) {
                    echo "<option value='{$unt["id_units"]}'>" . $unt["units"] . "</option>";
                  } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header bg-success text-white">Thông tin bổ sung</div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Trạng thái sản phẩm</label>
                <select class="form-select" name="product_status">
                  <?php foreach ($kqstatus as $sta) {
                    echo "<option value='{$sta["status_product"]}'>" . $sta["status_product"] . "</option>";
                  } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Năm nhập</label>
                <select class="form-select" name="year_import">
                  <?php foreach ($kqyear as $year) {
                    echo "<option value='{$year["id_year"]}'>" . $year["year_import"] . "</option>";
                  } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Thời hạn bảo hành</label>
                <input required type="date" class="form-control" name="thoihan_baohanh">
              </div>
              <div class="mb-3">
                <label class="form-label">Thông tin tài sản</label>
                <textarea class="form-control" name="thongtin"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="reset" class="btn btn-danger">Hủy</button>
      </div>
    </form>
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
