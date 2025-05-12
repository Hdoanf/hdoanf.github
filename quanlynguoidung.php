<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8mb4');
$search = "";
$loaits = "";
$tinh_trang = "";
$sql = "SELECT * FROM `user_account`";
$kq = $conn->query($sql);

session_start();
$toastthanhcong = isset($_SESSION['thanhcong']) ? $_SESSION['thanhcong'] : "";
$toastloi = isset($_SESSION['loi']) ? $_SESSION['loi'] : "";
echo "<script>console.log('$toastthanhcong')</script>";
unset($_SESSION['thanhcong'], $_SESSION['loi']); // xóa session


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
            <div class="dropdown dropstart text-end">
              <button type="button" class="btn btn-primary dropdown-toggle d-flex align-items-center"
                data-bs-toggle="dropdown">
                <i class="bi bi-person-circle mb-0 ms-2 "></i>
                <p class="mb-0 ms-2"><?php $user = $_SESSION['user'];
                                      echo $user ?></p>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dangxuat.php">Đăng xuất</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                <i class="bi bi-grid-1x2"></i> Tài sản
              </a>
            </li>
            <li class="nav-item nav-pills ">
              <a class="nav-link active" href="quanlynguoidung.php">
                Quản lý người dùng
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="taisan.php">
                Mục tài sản đã có sẵn
              </a>
            </li>
            <li class="nav-item">
              <div>
                <button class="btn nav-link" type="button" data-bs-toggle="collapse"
                  data-bs-target="#themtaisan" aria-expanded="false" aria-controls="themtaisan">
                  Báo cáo
                </button>
                <div class="collapse" id="themtaisan">
                  <ul class="nav">
                    <li class="nav-item ms-2 ">
                      <a class="nav-link " href="tshong.php">
                        Báo cáo hỏng
                      </a>
                    </li>
                    <li class="nav-item ms-2 ">
                      <a class="nav-link " href="tsdichuyen.php">
                        Báo cáo di chuyển tài sản
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lichsu.php">
                Lịch sử
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="kho.php">
                Kho
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hienthithongbao.php">
                Thông Báo
              </a>
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
                      echo "<td> 
                        <button class='btn btn-sm btn-outline-warning' onclick='suataisan(\"" . $row["id"] . "\")'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                        <button class='btn btn-outline-danger btn-sm' onclick='xoa(\"" . $row["id"] . "\")'>
                            <i class='bi bi-trash-fill'></i>
                        </button>
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
  <div class="modal fade" id="modalSua" tabindex="-1" aria-labelledby="modalSua" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalbodysua">
          <!-- sau nay se duoc them vao bang js ben duoi -->
          <div class="text-center">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">dangload</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalXoa" tabindex="-1" aria-labelledby="modalXoaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalXoaLabel">Xác nhận xóa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4>Bạn có chắc chắn muốn xóa không?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
          <button type="button" class="btn btn-danger" id="btnXacNhanXoa">Đồng ý</button>
        </div>
      </div>
    </div>
  </div>

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="toastbd">
          <?php echo $toastthanhcong; ?>
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function suataisan(id) {
      var myModal = new bootstrap.Modal(document.getElementById('modalSua'));
      myModal.show();
      fetch(`delete/suanguoidung.php?id=${id}`)
        .then(response => response.text())
        .then(data => {
          document.getElementById("modalbodysua").innerHTML = data;
        })
        .catch(error => {
          console.log(error)
          document.getElementById("modalbodysua").innerHTML = '<p class="text-danger">Lỗi</p>';
        });
    }


    let tscanxoa = null;

    function xoa(id) {
      tscanxoa = id; // luu barcode vao bien nay 
      var myModal = new bootstrap.Modal(document.getElementById('modalXoa'));
      myModal.show();
    }


    document.getElementById("btnXacNhanXoa").addEventListener("click", function() {
      if (tscanxoa) {
        fetch(`delete/xoanguoidung.php?id=${tscanxoa}`)
          .then(response => response.text()) //lay du lieu xoa
          .then(data => {
            console.log(data);

            // toast xoa
            var toast = document.getElementById('toast');
            var toastBody = document.getElementById('toastbd');
            toastBody.innerHTML = "Xóa thành công";
            var toast = new bootstrap.Toast(toast);
            toast.show();

            // an modal
            var modal = bootstrap.Modal.getInstance(document.getElementById('modalXoa'));
            if (modal) modal.hide();

            setTimeout(() => {
              location.reload();
            }, 1500);
          })
          .catch(error => {
            console.error("Lỗi:", error);
          });
      }
    });

    // hien thi toast
    document.addEventListener('DOMContentLoaded', function() {
      var toast = document.getElementById('toast');
      if (toast.innerText.trim() !== "") {
        var toast = new bootstrap.Toast(toast);
        toast.show();
      }
    });
  </script>
</body>

</html>
