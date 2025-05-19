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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $tenkhoa = $_POST['tenkhoa'];
  $makhoa = $_POST['makhoa'];
  $sqlInsert = "INSERT INTO `units`(`id_units`, `units`, `priority`)
  VALUES ('$makhoa','$tenkhoa',0)";
  $kqInsert = $conn->query($sqlInsert);

  session_start();
  if ($kqInsert) {
    $_SESSION['thanhcong'] = "Thêm thành công";
  } else {
    $_SESSION['loi'] = "Lỗi";
  }
  header("Location: ../quanlynguoidung.php");
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
  <div class="container">
    <h2 class="text-center">Thêm Khoa</h2>
    <form method="POST" action="them/themkhoa.php">
      <div class="row">
        <div class="">
          <div class="card h-100">
            <div class="card-header bg-primary text-white">Thông tin</div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Mã Khoa</label>
                <textarea class="form-control" name="makhoa"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Tên Khoa</label>
                <textarea class="form-control" name="tenkhoa"></textarea>
              </div>
            </div>
            <div class="text-center mb-3">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <button type="reset" class="btn btn-danger">Hủy</button>
            </div>

            </div.
              </form>
          </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
