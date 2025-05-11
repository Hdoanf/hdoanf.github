<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  echo "hình như chưa kết nối được ";
  die();
}

$conn->set_charset('utf8mb4');
$sqlunits = "SELECT * FROM units
ORDER BY
    CASE
        WHEN units = 'Chưa phân' THEN 0
        ELSE 1
    END,
    units;
";
$kqunits = $conn->query($sqlunits);
$status = "SELECT * from status_product";
$kqstatus = $conn->query($status);

$getid = $_GET['id'];
$id = $conn->real_escape_string($getid);

$sql = "SELECT * FROM `full_information` WHERE `barcode`= '$id'";
$kq = $conn->query($sql);
$row = $kq->fetch_assoc();

$infor = $conn->real_escape_string($row["product_information"]);
$baohanh = $conn->real_escape_string($row["Warranty_Period"]);
$units = $conn->real_escape_string($row["units"]);
$note = $conn->real_escape_string($row["note"]);
$st = $conn->real_escape_string($row["product_status"]);


if (isset($_POST['submit'])) {

  $tinhtrang = $_POST['status'];
  $donvi = $_POST['units'];
  $ghichu = $_POST['note'];
  $thongtin = $_POST['infor'];
  // $tg = $_POST['baohanh'];
  $tg = $_POST['tgbaohanh'];

  echo "<script>console.log('$tinhtrang')</script>";
  echo "<script>console.log('$donvi')</script>";
  echo "<script>console.log('$tg')</script>";
  echo "<script>console.log('$ghichu')</script>";
  echo "<script>console.log('$thongtin')</script>";

  $update = "UPDATE `full_information` SET `product_information`='$thongtin',`Warranty_Period`='$tg',
                   `product_status`='$tinhtrang',
                   `units`='$donvi',
                   `note`='$ghichu'  WHERE `barcode`= '$id'";

  $qrupdate = $conn->query($update);
  session_start();
  if ($qrupdate) {
    $_SESSION['thanhcong'] = "Sua tài sản thành công";
  } else {
    $_SESSION['loi'] = "Lỗi khi thêm tài sản";
  }
  header("Location: admin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-3">
    <form method="post" action="sua.php?id=<?php echo $id; ?>">

      <div class="mb-3 mt-3">
        <label class="form-label">Thông tin tài sản :</label>
        <input type="text" class="form-control" placeholder="Thông tin" value='<?php echo $infor ?>' name="infor">
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">Trạng thái :</label>
        <select class="form-select" name="status">
          <?php foreach ($kqstatus as $sta) {
            $selected = ($sta["status_product"] == $st) ? "selected" : "";
            echo "<option value='{$sta["status_product"]}' $selected>{$sta["status_product"]}</option>";
          } ?>
        </select>
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">Đơn vị sử dụng</label>
        <select class="form-select" name="units">
          <?php foreach ($kqunits as $uts) {
            $selected = ($uts["id_units"] == $units) ? "selected" : "";
            echo "<option value='{$uts["id_units"]}' $selected>{$uts["units"]}</option>";
          } ?>
        </select>
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">Thời gian bảo hành</label>
        <input required type="date" class="form-control" value="<?php echo $baohanh ?>" name="tgbaohanh">
      </div>

      <div class="mb-4 mt-3">
        <label class="form-label">Ghi chú</label>
        <input type="text" class="form-control" placeholder="Thông tin" value='<?php echo $note ?>' name="note">
      </div>

      <button type="submit" class="btn btn-primary" name="submit" ">Sửa</button>
    </form>
  </div>
</body>

</html>
