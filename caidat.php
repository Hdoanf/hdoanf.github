<?php

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
                <p class="mb-0 ms-2"></p>
              </button>
              <ul class="dropdown-menu">

                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
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
              <a class="nav-link " href=" admin.php">
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
            <li class="nav-item nav-pills">
              <a class="nav-link active" href="caidat.php">
                <i class="bi bi-gear "></i> Cài đặt
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class=" col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <body>
          <div class="container mt-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h5>Cài đặt Dark Mode</h5>
              </div>
              <div class="card-body">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="simpleDarkModeSwitch"
                    <?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark' ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="simpleDarkModeSwitch">Bật Dark Mode</label>
                </div>
                <p class="text-muted mt-2">Chế độ tối giúp giảm mỏi mắt khi sử dụng vào ban đêm.</p>
              </div>
            </div>

            <!-- Hướng dẫn sử dụng phần mềm quản lý tài sản -->

            <div class="huongdan">
              <h2>🛠 HƯỚNG DẪN SỬ DỤNG MỘT SỐ CHỨC NĂNG CỦA PHẦN MỀM</h2>

              <h3>📦 1. Thêm tài sản mới</h3>
              <ol>
                <li>Vào menu <strong>"Tài sản"</strong> → chọn <strong>"Thêm mới"</strong></li>
                <li>Nhập đầy đủ thông tin tài sản</li>
                <li>Nhấn nút <strong>"Lưu"</strong> để hoàn tất</li>
              </ol>

              <h3>🗃 2. Xem danh sách tài sản</h3>
              <ol>
                <li>Vào mục <strong>"Tài sản"</strong> từ thanh menu</li>
                <li>Tìm kiếm theo mã, tên, hoặc lọc theo loại tài sản</li>
                <li>Nhấn vào biểu tượng <strong>🔍</strong> để xem chi tiết</li>
              </ol>

              <h3>🖋 3. Sửa thông tin tài sản</h3>
              <ol>
                <li>Nhấn nút <strong>"Sửa"</strong> (biểu tượng ✏) tại tài sản cần chỉnh</li>
                <li>Cập nhật thông tin và nhấn <strong>"Cập nhật"</strong></li>
              </ol>

              <h3>🗑 4. Xóa tài sản</h3>
              <ol>
                <li>Nhấn <strong>"Xóa"</strong> (biểu tượng 🗑) tại tài sản muốn xóa</li>
                <li>Xác nhận khi hệ thống yêu cầu</li>
              </ol>

              <h3>📂 5. Quản lý loại tài sản</h3>
              <ol>
                <li>Vào menu <strong>"Loại tài sản"</strong> để thêm, sửa, xóa loại</li>
                <li>Lưu ý: Chỉ xóa loại khi không còn tài sản nào đang sử dụng</li>
              </ol>

              <h3>🧑‍💼 6. Phân quyền người dùng</h3>
              <ol>
                <li>Chỉ admin có thể vào <strong>"Quản lý người dùng"</strong></li>
                <li>Chỉnh sửa quyền người dùng và nhấn <strong>"Lưu"</strong></li>
              </ol>

              <h3>🔍 7. Tra cứu tài sản bằng mã vạch</h3>
              <ol>
                <li>Vào mục <strong>"Tra cứu"</strong></li>
                <li>Dùng đầu đọc mã vạch quét tài sản</li>
                <li>Hệ thống hiển thị thông tin tương ứng</li>
              </ol>

              <h3>📊 8. Xem báo cáo tài sản</h3>
              <ol>
                <li>Vào mục <strong>"Báo cáo"</strong> và chọn tiêu chí lọc</li>
                <li>Nhấn <strong>"Xem báo cáo"</strong></li>
                <li>Có thể xuất ra file Excel hoặc PDF</li>
              </ol>
            </div>
          </div>

          <!-- Bootstrap JS + Popper -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
          <! echo '<div class="summary"> <br> </div>' ;-- Font Awesome -->
            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

            <script>
              // Dark Mode đơn giản
              const darkModeSwitch = document.getElementById('simpleDarkModeSwitch');
              const htmlElement = document.documentElement;

              // Xử lý sự kiện chuyển đổi
              darkModeSwitch.addEventListener('change', function() {
                if (this.checked) {
                  htmlElement.setAttribute('data-bs-theme', 'dark');
                  document.cookie = "theme=dark; path=/; max-age=31536000"; // Lưu 1 năm
                } else {
                  htmlElement.setAttribute('data-bs-theme', 'light');
                  document.cookie = "theme=light; path=/; max-age=31536000";
                }
              });
            </script>
        </body>
    </div>
  </div>


</body>

</html>
