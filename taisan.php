<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8mb4');
session_start();
$toastthanhcong = isset($_SESSION['thanhcong']) ? $_SESSION['thanhcong'] : "";
$toastloi = isset($_SESSION['loi']) ? $_SESSION['loi'] : "";
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
        <img src="https://i.pinimg.com/736x/70/54/63/70546384b90a3b386bf16531c859d868.jpg" width="30" height="30"
          class="d-inline-block align-text-top me-2" alt="Logo">
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
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">
                <i class="bi bi-grid-1x2"></i> Tài sản
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="quanlynguoidung.php">
                Quản lý người dùng
              </a>
            </li>
            <li class="nav-item nav-pills">
              <a class="nav-link active" href="taisan.php">
                Mục tài sản đã có sẵn
              </a>
            </li>
            <li class="nav-item">
              <div>
                <button class="btn nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#themtaisan"
                  aria-expanded="false" aria-controls="themtaisan">
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
            <li class="nav-item">
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
            <h2 class="card-title mb-4">Các loại tài sản hiện có </h2>
            <div class="d-flex flex-wrap gap-3">
              <?php
              $cate = "select * from `category_product`";
              $kqcate = $conn->query($cate);
              if ($kqcate->num_rows > 0) {
                while ($rowcate = $kqcate->fetch_assoc()) {
                  echo "<div class='card' style='width: 12rem;'>";
                  echo "<div class='card-body'>";
                  echo "<ul class='list-group list-group-flush' >";
                  echo  "<li class='list-group-item'>ID: " . htmlspecialchars($rowcate["id_category"]) . "</li>";
                  echo  "<li class='list-group-item'>Name: " . htmlspecialchars($rowcate["name_category"]) . "</li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "<button class='btn btn-outline-danger btn-sm col-md-4 ms-2 mb-2' onclick='xoa(\"" . $rowcate["barcode"] . "\")'>
                      <i class='bi bi-trash-fill'></i>
                        </button>";
                  echo "</div>";
                }
              } else {
                echo "<p>Không có loại tài sản nào!</p>";
              }
              ?>

            </div>
          </div>
          <div>
            <button class=" m-3 btn btn-primary" onclick="themtaisanmoi(1)">
              Thêm
            </button>
          </div>
        </div>

        <div class="card mt-4">
          <div class="card-body">
            <h2 class="card-title mb-4">Nhóm tài sản hiên có</h2>
            <div class="d-flex flex-wrap gap-3">
              <?php
              $group = "select * from `group_product` ";
              $kqgroup = $conn->query($group);
              if ($kqgroup->num_rows > 0) {
                while ($rowgroup = $kqgroup->fetch_assoc()) {
                  echo "<div class='card' style='width: 12rem;'>";
                  echo "<div class='card-body'>";
                  echo "<ul class='list-group list-group-flush'>";
                  echo "<li class='list-group-item'>ID: " . htmlspecialchars($rowgroup["id_group"]) . "</li>";
                  echo "<li class='list-group-item'>Name: " . htmlspecialchars($rowgroup["name_group"]) . "</li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "<button class='btn btn-outline-danger btn-sm col-md-4 ms-2 mb-2' onclick='xoa(\"" . $rowcate["id_group"] . "\")'>
                      <i class='bi bi-trash-fill'></i>
                        </button>";
                  echo "</div>";
                }
              } else {
                echo "<p>Không có loại tài sản nào!</p>";
              }
              ?>

            </div>
          </div>
          <div>
            <button class=" m-3 btn btn-primary" onclick="themtaisanmoi(2)">
              Thêm
            </button>
          </div>
        </div>

        <div class=" card mt-4">
          <div class="card-body">
            <h2 class="card-title mb-4">Các danh mục tài sản hiện có </h2>
            <div class="d-flex flex-wrap gap-3">
              <?php
              $product = "select * from `product` ";
              $kqproduct = $conn->query($product);
              if ($kqproduct->num_rows > 0) {
                while ($rowproduct = $kqproduct->fetch_assoc()) {
                  echo "<div class='card' style='width: 12rem;'>";
                  echo "<div class='card-body'>";
                  echo "<ul class='list-group list-group-flush'>";
                  echo  "<li class='list-group-item'>ID: " . htmlspecialchars($rowproduct["id_product"]) . "</li>";
                  echo  "<li class='list-group-item'>Name: " . htmlspecialchars($rowproduct["name_product"]) . "</li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "<button class='btn btn-outline-danger btn-sm col-md-4 ms-2 mb-2' onclick='xoa(\"" . $rowcate["barcode"] . "\")'>
                      <i class='bi bi-trash-fill'></i>
                        </button>";
                  echo "</div>";
                }
              } else {
                echo "<p>Không có loại tài sản nào!</p>";
              }
              ?>
            </div>
          </div>
          <div>
            <button class=" m-3 btn btn-primary" onclick=" themtaisanmoi(3) ">
              Thêm
            </button>
          </div>
        </div>

        <main>
</body>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="modal fade" id="modalthem" tabindex="-1" aria-labelledby="modalthem" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalbodythem">
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
<!-- toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="toast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toastbd">
        <?php echo $toastthanhcong; ?>
      </div>
      <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<!-- modalXoa -->
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


<script>
  //goi modal them cac loai tai san
  function themtaisanmoi(id) {
    var myModal = new bootstrap.Modal(document.getElementById('modalthem'));
    myModal.show();
    var link
    switch (id) {
      case 1:
        link = ("them/themloaitaisan.php");
        break;
      case 2:
        link = ("them/themnhomtaisan.php");
        break;
      case 3:
        link = ("them/themdanhmuctaisan.php");
        break;
      default:
        console.log("khoong thay");
        return;
    }
    fetch(link)
      .then(response => response.text())
      .then(data => {
        document.getElementById("modalbodythem").innerHTML = data;
      })
      .catch(error => {
        console.log(error)
        document.getElementById("modalbodythem").innerHTML = '<p class="text-danger">Lỗi</p>';
      });
  }
  // hien thi  toast 
  document.addEventListener('DOMContentLoaded', function() {
    var toast = document.getElementById('toast');
    if (toast.innerText.trim() !== "") {
      var toast = new bootstrap.Toast(toast);
      toast.show();
    }
  });


  let tscanxoa = null;

  function xoa(id) {
    tscanxoa = id; // luu barcode vao bien nay 
    var myModal = new bootstrap.Modal(document.getElementById('modalXoa'));
    myModal.show();
  }


  document.getElementById("btnXacNhanXoa").addEventListener("click", function() {
    if (tscanxoa) {
      fetch(`delete/xoa_all.php?id=${tscanxoa}`)
        .then(AuthenticatorAssertionResponse => response.text()) //lay du lieu xoa
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
</script>

</html>
