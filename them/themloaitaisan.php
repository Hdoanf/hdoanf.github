<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$id = '';
$name = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = isset($_POST['id']) ? trim($_POST['id']) : '';
  $name = isset($_POST['ten']) ? trim($_POST['ten']) : '';
  session_start();
  if (!empty($id) && !empty($name)) {
    $stmt = $conn->prepare("INSERT INTO `category_product`(`id_category`, `name_category`) VALUES (?, ?)");
    $stmt->bind_param("ss", $id, $name);
    $kq = $stmt->execute();

    if ($kq) {
      $_SESSION['thanhcong'] = "Thêm thành công";
    } else {
      $_SESSION['loi'] = "Thất bại";
    }
    $stmt->close();
  } else {
    echo "<script>alert('Thieu');</script>";
  }
  header('Location:http://localhost/hdoanf.github/taisan.php');
  exit();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Loại Tài Sản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
    }

    .container {
      max-width: 600px;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border-radius: 5px;
    }

    .btn-save {
      background-color: #007bff;
      color: white;
    }

    .btn-cancel {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>

<body>

  <div class="container mt-4">
    <h3 class="text-center">Thêm Loại Tài Sản</h3>
    <div class="card p-3 mt-3">
      <div class="card-body">
        <form id="assetTypeForm" action="them/themloaitaisan.php" method="POST">
          <div class="mb-3">
            <label for="assetId" class="form-label">ID</label>
            <input type="text" name="id" class="form-control" id="assetId" placeholder="Nhập ID" required>
          </div>

          <div class="mb-3">
            <label for="assetName" class="form-label">Tên Loại Tài Sản</label>
            <input type="text" name="ten" class="form-control" id="assetName" placeholder="Nhập tên loại mục tài sản" required>
          </div>

          <button type="submit" class="btn btn-save">Thêm</button>
          <button type="reset" class="btn btn-cancel">Hủy</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
