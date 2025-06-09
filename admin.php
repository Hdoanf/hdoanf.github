<?php
session_start();
if ($_SESSION['admin'] !== 'admin') {
  header("Location: dangnhap.php");
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  echo "hình như chưa kết nối được ";
}
$conn->set_charset('utf8mb4');

session_start();
$toastthanhcong = isset($_SESSION['thanhcong']) ? $_SESSION['thanhcong'] : "";
$toastloi = isset($_SESSION['loi']) ? $_SESSION['loi'] : "";
echo "<script>console.log('$toastthanhcong')</script>";
unset($_SESSION['thanhcong'], $_SESSION['loi']); // xóa session

$search = "";
$loaits = "";
$tinh_trang = "";
$sql = "SELECT * FROM `full_information` WHERE 1=1";
if (isset($_GET['search']) || isset($_GET['loaitaisan']) || isset($_GET['tinhtrang'])) {
  $search = isset($_GET['search']) ? trim($_GET['search']) : '';
  $loaits = isset($_GET['loaitaisan']) ? trim($_GET['loaitaisan']) : '';
  $tinh_trang = isset($_GET['tinhtrang']) ? trim($_GET['tinhtrang']) : '';
  // lấy id của bảng product
  if (!empty($search)) {
    $tts = $conn->query("SELECT * FROM `product` WHERE `name_product` like '%$search%'");
    if ($tts->num_rows > 0) {
      $tts2 = $tts->fetch_assoc();
      $tentk = $tts2["id_product"]; //lấy id của bảng product ứng với tên là biển seach
      echo "<script>console.log('$tentk')</script>";
      $sql .= " AND `product_name` LIKE '%$tentk%'";  //select với tên sản phẩm bên bảng full là id của bảng product
    } else {
      $sql = "SELECT * FROM `full_information` WHERE 0";
    }
  }
  if (!empty($loaits)) {
    $sql .= " AND `product_category` = '$loaits'"; //nối
  }
  if (!empty($tinh_trang)) {
    $sql .= " AND `product_status` = '$tinh_trang'";
  }
}
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
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <style>
    .modalcao {
      z-index: 1060 !important;

    }

    .modal-backdropcao {
      z-index: 1050 !important;
    }
  </style>
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
                <p class="mb-0 ms-2"><?php $user = $_SESSION['admin'];
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
            <li class="nav-item nav-pills">
              <a class="nav-link active" href="#">
                <i class="bi bi-grid-1x2"></i> Tài sản
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="quanlynguoidung.php">
                Quản lý người dùng/Khoa
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
              <a class="nav-link" href="caidat.php">
                <i class="bi bi-gear"></i> Cài đặt
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- chỗ tìm kiếm -->
        <div class="card mt-3">
          <div class="card-body">
            <h2 class="card-title mb-4">Quản lý tài sản </h2>
            <form class="row g-3 mb-4" method="GET">
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-search"></i></span>
                  <input name="search" type="text" class="form-control " placeholder="Tìm kiếm..."
                    value="<?php echo htmlspecialchars($search) ?>">

                </div>
              </div>
              <div class="col-md-3">
                <select name="loaitaisan" class='form-select'>
                  <option value="">Phân Loại Tài Sản </option>
                  <?php
                  $loai = $conn->query("SELECT DISTINCT product_category FROM full_information");
                  if ($loai->num_rows > 0) {
                    while ($rowloai = $loai->fetch_assoc()) {
                      $kqloai = $conn->query(
                        "SELECT * FROM `category_product`
                                        WHERE `id_category`=" . $rowloai['product_category'] . ""
                      );
                      $rownameloai = $kqloai->fetch_assoc();
                      $select = ($rowloai['product_category'] == $loaits) ? "selected" : "";
                      // echo "<script>console.log('$select')</script>";
                      echo "<option value='" . $rowloai['product_category'] . "' $select >
                                            " . $rownameloai['name_category'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-3">
                <select name="tinhtrang" class="form-select">
                  <option value="">Tình trạng</option>
                  <?php
                  $tinhtrang = $conn->query("SELECT DISTINCT `product_status` FROM full_information");
                  if ($tinhtrang->num_rows > 0) {
                    while ($rowtinhtrang = $tinhtrang->fetch_assoc()) {
                      $select2 = ($rowtinhtrang['product_status'] == $tinh_trang) ? "selected" : "";
                      echo "<option value='" . $rowtinhtrang['product_status'] . "' $select2 >
                                            " . $rowtinhtrang['product_status'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
              </div>
            </form>
            <div class="row g-2 mb-4">
              <div class="col-md-2">
                <a href="admin.php" class="btn btn-danger w-100">Xóa</a>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary w-100" onclick="themtaisan()">Thêm</button>
              </div>
              <div class="col-md-2">
                <button class="btn btn-primary w-100" onclick="quetma()">Quét Mã Vạch</button>
              </div>
            </div>
            <!-- bảng render từ database -->
            <div class="table-responsive " style="overflow-y:scroll;height:65vh;">
              <table class="table table-hover text-center table-scroll table-striped">
                <thead class="table-light">
                  <tr>
                    <th>TT</th>
                    <th>NHÓM TÀI SẢN</th>
                    <th>PHÂN LOẠI TÀI SẢN </th>
                    <th>TÊN TÀI SẢN</th>
                    <th>NĂM NHẬP</th>
                    <th>TRẠNG THÁI</th>
                    <th>THÔNG TIN TÀI SẢN</th>
                    <th>Đơn vị </th>
                    <th>TÁC VỤ</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $tt = 1;
                  $status = '';
                  $group = '';
                  $category = '';
                  $name = '';

                  if ($kq->num_rows > 0) {
                    while ($row = $kq->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $tt . "</td>";

                      //nhóm tài sản
                      $kqgroup = $conn->query("SELECT * FROM group_product WHERE id_group = " . $row["product_group"] . "");
                      if ($kqgroup->num_rows > 0) {
                        $rowgroup = $kqgroup->fetch_assoc();
                        $group = $rowgroup["name_group"];
                      }
                      echo "<td>" . $group . "</td>";


                      //loại tài sản
                      $kqcategory = $conn->query("SELECT * FROM category_product WHERE id_category = " . $row["product_category"] . "");
                      if ($kqcategory->num_rows > 0) {
                        $rowcategory = $kqcategory->fetch_assoc();
                        $category = $rowcategory["name_category"];
                      }
                      echo "<td>" . $category . "</td>";
                      //tên tài sản
                      $ten = strtoupper($row["product_name"]);
                      $kqname = $conn->query("SELECT * FROM `product` WHERE `id_product`='$ten'");
                      if ($kqname->num_rows > 0) {
                        $rowname = $kqname->fetch_assoc();
                        $name = $rowname["name_product"];
                      }
                      echo "<td>" . $name . "</td>";
                      //năm
                      $nam = '';
                      $strnam = $conn->real_escape_string($row["year_import"]);
                      $sql = "SELECT * FROM `year_import` WHERE `id_year` LIKE '$strnam'";
                      $kqnam = $conn->query($sql);
                      if ($kqnam && $kqnam->num_rows > 0) {
                        $rownam = $kqnam->fetch_assoc();
                        $nam = $rownam['year_import'];
                      }

                      echo "<td>" . $nam . "</td>";
                      $status = ($row["product_status"] == 'active') ? 'badge bg-success' : 'badge bg-danger';
                      echo "<td><span class='$status'>" . $row["product_status"] . "</span></td>";
                      echo "<td>" . $row["product_information"] . "</td>";
                      echo "<td>" . $row["units"] . "</td>";

                      echo "<td> 
                        <button class='btn btn-outline-info btn-sm' onclick='xemchitiet(\"" . $row["barcode"] . "\")'>
                            <i class='bi bi-eye'></i>
                        </button>
                        <button class='btn btn-sm btn-outline-warning' onclick='suataisan(\"" . $row["barcode"] . "\")'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                        <button class='btn btn-outline-danger btn-sm' onclick='xoa(\"" . $row["barcode"] . "\")'>
                            <i class='bi bi-trash-fill'></i>
                        </button>
                      </td>";

                      $tt++;
                    }
                  } else {
                    echo "<tr><td colspan='9'>Không có dữ liệu</td></tr>";
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
  <!-- ing -->
  <!-- <footer class="footer mt-auto py-3 bg-light"> -->
  <!--   <div class="container text-center"> -->
  <!--     <span class="text-muted">Phần mềm quản lý tài sản siêu vip </span> -->
  <!--   </div> -->
  <!-- </footer> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- modal hien chitiet-->
  <div class="modal fade modalcao" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalbody">
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

  <!-- modalXoa -->
  <div class="modal fade  modalcao" id="modalXoa" tabindex="-1" aria-labelledby="modalXoaLabel" aria-hidden="true">
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
  <!--modal suataisan --->
  <div class="modal fade modalcao" id="modalSua" tabindex="-1" aria-labelledby="modalSua" aria-hidden="true">
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

  <!--modal themtaisanmoi --->
  <div class="modal fade  modalcao" id="modalThem" tabindex="-1" aria-labelledby="modalThem" aria-hidden="true">
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
  <!-- toast template -->
  <div class="position-fixed bottom-0 end-0 p-3  modalcao" style="z-index: 11">
    <div id="toast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="toastbd">
          <?php echo $toastthanhcong; ?>
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <!--modal quetma --->

  <div class="modal fade" id="modalscan" tabindex="-1" aria-labelledby="modalscan" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalbodyscan">
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

  <script src="main.js"></script>


</body>

</html>
