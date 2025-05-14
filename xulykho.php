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

$status = "SELECT * from status_product";
$kqstatus = $conn->query($status);

$getid = $_GET['id'];
$id = $conn->real_escape_string($getid);

$sql = "SELECT * FROM `full_information` WHERE `barcode`= '$id'";
$kq = $conn->query($sql);
$row = $kq->fetch_assoc();

$st = $conn->real_escape_string($row["product_status"]);


if (isset($_POST['submit'])) {

  $tinhtrang = $_POST['status'];

  $update = "UPDATE `full_information` SET `product_status`='$tinhtrang' WHERE  `barcode`='$id' ";

  $qrupdate = $conn->query($update);
  session_start();
  if ($qrupdate) {
    $_SESSION['thanhcong'] = "Thành công";
  } else {
    $_SESSION['loi'] = "Lỗi";
  }
  header("Location: kho.php");
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
    <form method="post" action="xulykho.php?id=<?php echo $id; ?>">

      <div class="mb-3 mt-3">
        <label class="form-label">Trạng thái đã qua sử lý:</label>
        <select class="form-select" name="status">
          <?php foreach ($kqstatus as $sta) {
            $selected = ($sta["status_product"] == $st) ? "selected" : "";
            echo "<option value='{$sta["status_product"]}' $selected>{$sta["status_product"]}</option>";
          } ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit" ">Sửa</button>
    </form>
    </div>
      
</body>

</html>
