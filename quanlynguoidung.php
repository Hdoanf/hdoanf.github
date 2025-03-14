<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
$search = "";
$loaits = "";
$tinh_trang = "";
$sql = "SELECT * FROM `user_account`";
$kq = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý tài sản </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="https://i.pinimg.com/736x/70/54/63/70546384b90a3b386bf16531c859d868.jpg" width="30"
          height="30" class="d-inline-block align-text-top me-2" alt="Logo">
        Quản lý tài sản của admin
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#"><i class="bi bi-house-door"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-person-circle"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column nav-pills">
            <li class="nav-item">
              <a class="nav-link " href="admin.php">
                <i class="bi bi-grid-1x2"></i> Tài sản
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="">
                Quản lý người dùng
              </a>
            </li>
            <li class="nav-item">
              <div>
                <button class="btn nav-link" type="button" data-bs-toggle="collapse"
                  data-bs-target="#themtaisan" aria-expanded="false" aria-controls="themtaisan">
                  Thêm tài sản
                </button>
                <div class="collapse" id="themtaisan">
                  <ul class="nav">
                    <li class="nav-item ms-2 ">
                      <a class="nav-link " href="#">
                        Thêm mục tài sản mới
                      </a>
                    </li>
                    <li class="nav-item ms-2 ">
                      <a class="nav-link " href="#">
                        Thêm tài sản dã có sẵn
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <i class="bi bi-gear"></i> Cài đặt
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card mt-4">
          <div class="card-body">
            <div class="d-flex justify-content-start align-items-center">
              <h1 class="text-center mb-2">Quản lý người dùng</h1>
            </div>
            <!-- bảng render từ database -->
            <div class="table-responsive">
              <table class="table table-hover text-center">
                <thead class="table-light">
                  <tr>
                    <th>TT</th>
                    <th>TÊN NGƯỜI DÙNG</th>
                    <th>TÊN DĂNG NHẬP</th>
                    <th>MẬT KHẨU</th>
                    <th>CHỨC VỤ</th>
                    <th>ĐƠN VỊ QUẢN LÝ </th>
                    <th>TÁC VỤ</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $tt = 1;

                  if ($kq->num_rows > 0) {
                    while ($row = $kq->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $tt . "</td>";
                      echo "<td>" . $row["id"] . "</td>";
                      echo "<td>" . $row["username"] . "</td>";
                      echo "<td>" . $row["user_password"] . "</td>";
                      echo "<td>" . $row["use_role"] . "</td>";
                      echo "<td>" . $row["units"] . "</td>";
                      echo "
                      <td><a class='btn btn-sm btn-outline-warning' href='suanguoidung.php?id=" . $row["id"] . "'>
                        <i class='bi bi-pencil-square'></i></a>
                        <a class='btn btn-sm btn-outline-danger' href='xoanguoidung.php?id=" . $row["id"] . "'>
                        <i class='bi bi-trash-fill'></i></a>
                      </td>";
                      $tt++;
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Phần mềm quản lý tài sản</span>
        </div>
    </footer> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
