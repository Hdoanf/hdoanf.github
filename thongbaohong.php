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

$barcode = $_GET['id'] ?? ($_POST['barcode'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $mota = $_POST['mota'] ?? '';

  if ($barcode && $mota) {
    $barcode = $conn->real_escape_string($barcode);
    $mota = $conn->real_escape_string($mota);
    $sql = "INSERT INTO thongbao (barcode, mota, date) VALUES ('$barcode', '$mota', NOW())";
    session_start();
    if ($conn->query($sql)) {
      $_SESSION['thanhcong'] = "Thành công";
    } else {
      $_SESSION['loi'] = "Lỗi";
    }
    header("Location: nguoidung.php");
    exit();
  } else {
    echo "<p class='text-danger'>Thiếu dữ liệu</p>";
  }
}
?>



<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Thông báo hỏng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-2">
    <h5 class="text-center">Thông báo hỏng tài sản</h5>
    <form method="POST" action="thongbaohong.php">
      <input type="hidden" name="barcode" value="<?php echo htmlspecialchars($barcode); ?>">

      <div class="mb-3">
        <label class="form-label">Thông tin hỏng hóc</label>
        <textarea class="form-control" name="mota" rows="4" required></textarea>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Gửi thông báo</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </form>
  </div>
</body>

</html>
