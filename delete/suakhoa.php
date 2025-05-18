<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo "hình như chưa kết nối được ";
  die();
}

$conn->set_charset('utf8mb4');

$getid = $_GET['id'];
$id = $conn->real_escape_string($getid);

$sql = "SELECT * FROM `units` WHERE `id_units` = '$id'";
$kq = $conn->query($sql);
$row = $kq->fetch_assoc();

$makhoa = $conn->real_escape_string($row["id_units"]);
$tenkhoa = $conn->real_escape_string($row["units"]);

if (isset($_POST['submit'])) {
  $ma = $_POST['makhoa'];
  $ten = $_POST['tenkhoa'];

  // Cập nhật
  $update = "UPDATE `units` SET `id_units`='$ma',`units`='$ten',`priority`='1' WHERE `id_units`='$id'";

  $qrupdate = $conn->query($update);
  session_start();
  if ($qrupdate) {
    $_SESSION['thanhcong'] = "Sửa thành công";
  } else {
    $_SESSION['loi'] = "Lỗi";
  }
  header("Location: ../quanlynguoidung.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sửa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-3">
    <form method="post" action="delete/suakhoa.php?id=<?php echo $id; ?>">

      <div class="mb-3 mt-3">
        <label class="form-label">Mã khoa : </label>
        <input type="text" class="form-control" placeholder="Thông tin" value="<?php echo $makhoa ?>" name="makhoa">
      </div>
      <div class="mb-3 mt-3">
        <label class="form-label">Tên khoa : </label>
        <input type="text" class="form-control" placeholder="Thông tin" value="<?php echo $tenkhoa ?>" name="tenkhoa">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
    </form>
  </div>
</body>

</html>
