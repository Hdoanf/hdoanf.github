<?php
require_once __DIR__ . '/../config.php';
session_start();
$toastthanhcong = isset($_SESSION['thanhcong']) ? $_SESSION['thanhcong'] : "";
$toastloi = isset($_SESSION['loi']) ? $_SESSION['loi'] : "";
unset($_SESSION['thanhcong'], $_SESSION['loi']); // xóa session

$search = "";
$loaits = "";
$tinh_trang = "";
$sql = "SELECT * FROM `full_information` WHERE `old_unit` IS NOT NULL AND `old_unit` != '' ";
if (isset($_GET['search']) || isset($_GET['loaitaisan']) || isset($_GET['tinhtrang'])) {
  $search = isset($_GET['search']) ? trim($_GET['search']) : '';
  $loaits = isset($_GET['loaitaisan']) ? trim($_GET['loaitaisan']) : '';
  $tinh_trang = isset($_GET['tinhtrang']) ? trim($_GET['tinhtrang']) : '';
  
  if (!empty($search)) {
    $search_esc = $conn->real_escape_string($search);
    $tts = $conn->query("SELECT * FROM `product` WHERE `name_product` LIKE '%$search_esc%'");
    if ($tts && $tts->num_rows > 0) {
      $tts2 = $tts->fetch_assoc();
      $tentk = $tts2["id_product"];
      $sql .= " AND `product_name` LIKE '%$tentk%'";
    } else {
      $sql = "SELECT * FROM `full_information` WHERE 0";
    }
  }
  if (!empty($loaits)) {
    $loaits_esc = $conn->real_escape_string($loaits);
    $sql .= " AND `product_category` = '$loaits_esc'";
  }
}
$kq = $conn->query($sql);
$rows_count = $kq ? $kq->num_rows : 0;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Báo cáo di chuyển · Quản trị</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/dashboard-craft.css">
  <style>
    .modalcao { z-index: 1060 !important; }
    .modal-backdropcao { z-index: 1050 !important; }
  </style>
</head>

<body>
  <!-- Quiet Header -->
  <header class="app-header">
    <div class="d-flex align-items-center gap-3">
      <a href="admin.php" class="brand-mark">
        <span class="brand-dot"></span>
        <span>Hệ thống Quản lý Tài sản</span>
      </a>
      <span class="text-muted" style="font-size: 13px;">/</span>
      <span style="font-size: 13px; color: var(--color-ink-2); font-weight: 500;">Báo cáo điều chuyển đơn vị</span>
    </div>

    <div class="d-flex align-items-center gap-3">
      <div class="header-status-pill">
        <span class="status-dot-live"></span>
        <span>Sẵn sàng</span>
      </div>
      <div class="dropdown">
        <button class="btn-quiet dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="bi bi-person text-secondary"></i>
          <span>Admin</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="border-radius: 8px; border-color: var(--color-line); font-size: 13px;">
          <li><a class="dropdown-item py-1" href="caidat.php"><i class="bi bi-gear me-2 text-secondary"></i>Cài đặt</a></li>
          <li><hr class="dropdown-divider my-1"></li>
          <li><a class="dropdown-item py-1 text-danger" href="dangnhap.php"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
        </ul>
      </div>
    </div>
  </header>

  <div class="d-flex">
    <!-- Calm Sidebar -->
    <aside class="app-sidebar">
      <div class="nav-section-label">Quản lý</div>
      <ul class="nav flex-column mb-3">
        <li class="nav-item">
          <a class="nav-link" href="admin.php">
            <i class="bi bi-grid-1x2"></i>
            <span>Tài sản</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="taisan.php">
            <i class="bi bi-tags"></i>
            <span>Mục có sẵn</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quanlynguoidung.php">
            <i class="bi bi-people"></i>
            <span>Người dùng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kho.php">
            <i class="bi bi-archive"></i>
            <span>Kho</span>
          </a>
        </li>
      </ul>

      <div class="nav-section-label">Giám sát</div>
      <ul class="nav flex-column mb-3">
        <li class="nav-item">
          <a class="nav-link" href="tshong.php">
            <i class="bi bi-exclamation-triangle"></i>
            <span>Báo cáo hỏng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="tsdichuyen.php">
            <i class="bi bi-arrow-left-right"></i>
            <span>Báo cáo di chuyển</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lichsu.php">
            <i class="bi bi-clock-history"></i>
            <span>Lịch sử</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hienthithongbao.php">
            <i class="bi bi-bell"></i>
            <span>Thông báo</span>
          </a>
        </li>
      </ul>

      <div class="nav-section-label">Hệ thống</div>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="caidat.php">
            <i class="bi bi-sliders"></i>
            <span>Cài đặt</span>
          </a>
        </li>
      </ul>
    </aside>

    <!-- Workspace -->
    <main class="app-workspace">
      <section class="content-panel">
        <div class="panel-header">
          <div class="panel-title-group">
            <h1 class="panel-title">Tài sản đã thực hiện điều chuyển</h1>
            <span class="panel-counter"><?php echo $rows_count; ?> tài sản</span>
          </div>
        </div>

        <form class="filter-strip" method="GET">
          <div class="d-flex align-items-center gap-2 flex-grow-1" style="max-width: 320px;">
            <input name="search" type="text" class="input-compact w-100" placeholder="Lọc theo tên..."
              value="<?php echo htmlspecialchars($search); ?>">
          </div>

          <select name="loaitaisan" class="select-compact">
            <option value="">Loại tài sản (Tất cả)</option>
            <?php
            $loai = $conn->query("SELECT DISTINCT product_category FROM full_information");
            if ($loai && $loai->num_rows > 0) {
              while ($rowloai = $loai->fetch_assoc()) {
                $kqloai = $conn->query("SELECT * FROM `category_product` WHERE `id_category`=" . $rowloai['product_category']);
                $rownameloai = $kqloai ? $kqloai->fetch_assoc() : null;
                $select = ($rowloai['product_category'] == $loaits) ? "selected" : "";
                if ($rownameloai) {
                  echo "<option value='" . $rowloai['product_category'] . "' $select>" . htmlspecialchars($rownameloai['name_category']) . "</option>";
                }
              }
            }
            ?>
          </select>

          <button type="submit" class="btn-quiet">
            <i class="bi bi-funnel"></i>
            <span>Áp dụng</span>
          </button>

          <?php if (!empty($search) || !empty($loaits)): ?>
            <a href="tsdichuyen.php" class="btn-quiet text-muted" title="Bỏ lọc">
              <i class="bi bi-x"></i>
              <span>Đặt lại</span>
            </a>
          <?php endif; ?>
        </form>

        <div class="table-responsive" style="max-height: calc(100vh - 260px);">
          <table class="table-honest">
            <thead>
              <tr>
                <th style="width: 48px;" class="num">#</th>
                <th>Tên tài sản</th>
                <th>Nhóm</th>
                <th>Loại</th>
                <th class="num">Năm</th>
                <th>Đơn vị cũ</th>
                <th>Đơn vị hiện tại</th>
                <th>Trạng thái</th>
                <th style="width: 80px; text-align: right;">Chi tiết</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tt = 1;
              if ($kq && $kq->num_rows > 0) {
                while ($row = $kq->fetch_assoc()) {
                  $group = '—';
                  $kqgroup = $conn->query("SELECT * FROM group_product WHERE id_group = " . intval($row["product_group"]));
                  if ($kqgroup && $kqgroup->num_rows > 0) {
                    $rowgroup = $kqgroup->fetch_assoc();
                    $group = $rowgroup["name_group"];
                  }

                  $category = '—';
                  $kqcategory = $conn->query("SELECT * FROM category_product WHERE id_category = " . intval($row["product_category"]));
                  if ($kqcategory && $kqcategory->num_rows > 0) {
                    $rowcategory = $kqcategory->fetch_assoc();
                    $category = $rowcategory["name_category"];
                  }

                  $name = '—';
                  $ten = strtoupper($conn->real_escape_string($row["product_name"]));
                  $kqname = $conn->query("SELECT * FROM `product` WHERE `id_product`='$ten'");
                  if ($kqname && $kqname->num_rows > 0) {
                    $rowname = $kqname->fetch_assoc();
                    $name = $rowname["name_product"];
                  }

                  $nam = '—';
                  $strnam = $conn->real_escape_string($row["year_import"]);
                  $kqnam = $conn->query("SELECT * FROM `year_import` WHERE `id_year` LIKE '$strnam'");
                  if ($kqnam && $kqnam->num_rows > 0) {
                    $rownam = $kqnam->fetch_assoc();
                    $nam = $rownam['year_import'];
                  }

                  $is_active = ($row["product_status"] == 'active');
                  $chip_cls = $is_active ? 'chip-status active' : 'chip-status problem';

                  echo "<tr>";
                  echo "<td class='num text-muted'>" . $tt . "</td>";
                  echo "<td><strong style='color: var(--color-ink);'>" . htmlspecialchars($name) . "</strong></td>";
                  echo "<td>" . htmlspecialchars($group) . "</td>";
                  echo "<td>" . htmlspecialchars($category) . "</td>";
                  echo "<td class='num'>" . htmlspecialchars($nam) . "</td>";
                  echo "<td><span class='unit-tag text-muted'>" . htmlspecialchars(isset($row["old_unit"]) ? $row["old_unit"] : '—') . "</span></td>";
                  echo "<td><span class='unit-tag' style='color: var(--color-accent); font-weight: bold;'>" . htmlspecialchars($row["units"]) . "</span></td>";
                  echo "<td><span class='$chip_cls'>" . htmlspecialchars($row["product_status"]) . "</span></td>";
                  echo "<td style='text-align: right;'>
                          <button class='btn-icon-cell' title='Xem chi tiết' onclick='xemchitiet(\"" . $row["barcode"] . "\")'>
                            <i class='bi bi-eye'></i>
                          </button>
                        </td>";
                  echo "</tr>";
                  $tt++;
                }
              } else {
                echo "<tr><td colspan='9' style='text-align: center; padding: 40px; color: var(--color-muted);'>Chưa có tài sản nào ghi nhận điều chuyển đơn vị.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Modal Chi Tiết -->
  <div class="modal fade modalcao" id="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Chi tiết tài sản</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="modalbody">
          <div class="text-center py-4">
            <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/main.js"></script>
</body>
</html>
