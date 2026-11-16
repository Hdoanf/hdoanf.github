<?php

require_once __DIR__ . '/../config.php';

session_start();
$toastthanhcong = isset($_SESSION['thanhcong']) ? $_SESSION['thanhcong'] : "";
$toastloi = isset($_SESSION['loi']) ? $_SESSION['loi'] : "";
unset($_SESSION['thanhcong'], $_SESSION['loi']); // xóa session

// 1. Số liệu thống kê trung thực (Honest & Single Source of Truth)
$stat_total = 0;
$stat_active = 0;
$stat_broken = 0;
$stat_units = 0;

$res_total = $conn->query("SELECT COUNT(*) as c FROM full_information");
if ($res_total) { $stat_total = intval($res_total->fetch_assoc()['c']); }

$res_active = $conn->query("SELECT COUNT(*) as c FROM full_information WHERE product_status = 'active'");
if ($res_active) { $stat_active = intval($res_active->fetch_assoc()['c']); }

$res_broken = $conn->query("SELECT COUNT(*) as c FROM full_information WHERE product_status != 'active'");
if ($res_broken) { $stat_broken = intval($res_broken->fetch_assoc()['c']); }

$res_units = $conn->query("SELECT COUNT(DISTINCT units) as c FROM full_information WHERE units IS NOT NULL AND units != ''");
if ($res_units) { $stat_units = intval($res_units->fetch_assoc()['c']); }

// Tỉ lệ hoạt động (Goal beside number)
$active_rate = ($stat_total > 0) ? round(($stat_active / $stat_total) * 100, 1) : 0;

// 2. Bộ lọc
$search = "";
$loaits = "";
$tinh_trang = "";
$sql = "SELECT * FROM `full_information` WHERE 1=1";

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
  if (!empty($tinh_trang)) {
    $tinhtrang_esc = $conn->real_escape_string($tinh_trang);
    $sql .= " AND `product_status` = '$tinhtrang_esc'";
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
  <title>Tài sản · Quản trị</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/dashboard-craft.css">
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
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
      <span style="font-size: 13px; color: var(--color-ink-2); font-weight: 500;">Thiết bị & Barcode</span>
    </div>

    <div class="d-flex align-items-center gap-3">
      <div class="header-status-pill">
        <span class="status-dot-live"></span>
        <span>MariaDB 3306 · Sẵn sàng</span>
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
          <a class="nav-link active" href="admin.php">
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
          <a class="nav-link" href="tsdichuyen.php">
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

      <!-- KPI Strip: 4 numbers in ONE continuous card divided by hairlines -->
      <section class="kpi-strip">
        <!-- Tile 1: Total -->
        <div class="kpi-tile">
          <div class="kpi-header">
            <span class="kpi-label">Tổng tài sản</span>
            <span class="kpi-icon-box"><i class="bi bi-layers"></i></span>
          </div>
          <div class="kpi-value-row">
            <span class="kpi-value"><?php echo $stat_total; ?></span>
            <span class="kpi-baseline">đã cấp mã</span>
          </div>
          <div class="kpi-tick-track">
            <div class="kpi-tick-fill" style="width: 100%; background: var(--color-muted);"></div>
          </div>
        </div>

        <!-- Tile 2: Active rate -->
        <div class="kpi-tile">
          <div class="kpi-header">
            <span class="kpi-label">Sẵn sàng / Hoạt động</span>
            <span class="kpi-icon-box text-success"><i class="bi bi-check2"></i></span>
          </div>
          <div class="kpi-value-row">
            <span class="kpi-value"><?php echo $stat_active; ?></span>
            <span class="kpi-baseline good"><?php echo $active_rate; ?>%</span>
          </div>
          <div class="kpi-tick-track">
            <div class="kpi-tick-fill" style="width: <?php echo $active_rate; ?>%; background: var(--color-good);"></div>
          </div>
        </div>

        <!-- Tile 3: Problem / Broken -->
        <div class="kpi-tile">
          <div class="kpi-header">
            <span class="kpi-label">Hỏng / Cần xử lý</span>
            <span class="kpi-icon-box <?php echo ($stat_broken > 0) ? 'text-danger' : 'text-secondary'; ?>"><i class="bi bi-exclamation-octagon"></i></span>
          </div>
          <div class="kpi-value-row">
            <span class="kpi-value <?php echo ($stat_broken > 0) ? 'text-danger' : ''; ?>"><?php echo $stat_broken; ?></span>
            <span class="kpi-baseline <?php echo ($stat_broken > 0) ? 'warn' : ''; ?>"><?php echo ($stat_broken > 0) ? 'yêu cầu sửa' : 'ổn định'; ?></span>
          </div>
          <div class="kpi-tick-track">
            <div class="kpi-tick-fill" style="width: <?php echo ($stat_total > 0 ? ($stat_broken / $stat_total)*100 : 0); ?>%; background: var(--color-down);"></div>
          </div>
        </div>

        <!-- Tile 4: Scope / Units -->
        <div class="kpi-tile">
          <div class="kpi-header">
            <span class="kpi-label">Đơn vị phân bổ</span>
            <span class="kpi-icon-box"><i class="bi bi-building"></i></span>
          </div>
          <div class="kpi-value-row">
            <span class="kpi-value"><?php echo $stat_units; ?></span>
            <span class="kpi-baseline">phòng ban</span>
          </div>
          <div class="kpi-tick-track">
            <div class="kpi-tick-fill" style="width: 100%; background: var(--color-accent);"></div>
          </div>
        </div>
      </section>

      <!-- Main Panel: Data table & Quick action -->
      <section class="content-panel">
        <div class="panel-header">
          <div class="panel-title-group">
            <h1 class="panel-title">Danh mục tài sản</h1>
            <span class="panel-counter"><?php echo $rows_count; ?> bản ghi</span>
          </div>

          <div class="toolbar-actions">
            <button class="btn-quiet" onclick="quetma()" title="Quét Barcode qua camera">
              <i class="bi bi-qr-code-scan"></i>
              <span>Quét mã</span>
            </button>
            <button class="btn-quiet btn-accent" onclick="themtaisan()">
              <i class="bi bi-plus-lg"></i>
              <span>Thêm mới</span>
            </button>
          </div>
        </div>

        <!-- Filter Strip: inline, wordless, compact -->
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

          <select name="tinhtrang" class="select-compact">
            <option value="">Trạng thái (Tất cả)</option>
            <?php
            $tinhtrang = $conn->query("SELECT DISTINCT `product_status` FROM full_information");
            if ($tinhtrang && $tinhtrang->num_rows > 0) {
              while ($rowtinhtrang = $tinhtrang->fetch_assoc()) {
                $select2 = ($rowtinhtrang['product_status'] == $tinh_trang) ? "selected" : "";
                echo "<option value='" . $rowtinhtrang['product_status'] . "' $select2>" . htmlspecialchars($rowtinhtrang['product_status']) . "</option>";
              }
            }
            ?>
          </select>

          <button type="submit" class="btn-quiet">
            <i class="bi bi-funnel"></i>
            <span>Áp dụng</span>
          </button>

          <?php if (!empty($search) || !empty($loaits) || !empty($tinh_trang)): ?>
            <a href="admin.php" class="btn-quiet text-muted" title="Bỏ lọc">
              <i class="bi bi-x"></i>
              <span>Đặt lại</span>
            </a>
          <?php endif; ?>
        </form>

        <!-- Honest Table -->
        <div class="table-responsive" style="max-height: calc(100vh - 350px);">
          <table class="table-honest">
            <thead>
              <tr>
                <th style="width: 48px;" class="num">#</th>
                <th>Nhóm</th>
                <th>Loại</th>
                <th>Tên tài sản</th>
                <th class="num" style="width: 90px;">Năm</th>
                <th style="width: 130px;">Trạng thái</th>
                <th>Mô tả quy cách</th>
                <th style="width: 80px;">Đơn vị</th>
                <th style="width: 110px; text-align: right;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tt = 1;
              if ($kq && $kq->num_rows > 0) {
                while ($row = $kq->fetch_assoc()) {
                  // Nhóm tài sản
                  $group = '—';
                  $kqgroup = $conn->query("SELECT * FROM group_product WHERE id_group = " . intval($row["product_group"]));
                  if ($kqgroup && $kqgroup->num_rows > 0) {
                    $rowgroup = $kqgroup->fetch_assoc();
                    $group = $rowgroup["name_group"];
                  }

                  // Loại tài sản
                  $category = '—';
                  $kqcategory = $conn->query("SELECT * FROM category_product WHERE id_category = " . intval($row["product_category"]));
                  if ($kqcategory && $kqcategory->num_rows > 0) {
                    $rowcategory = $kqcategory->fetch_assoc();
                    $category = $rowcategory["name_category"];
                  }

                  // Tên tài sản
                  $name = '—';
                  $ten = strtoupper($conn->real_escape_string($row["product_name"]));
                  $kqname = $conn->query("SELECT * FROM `product` WHERE `id_product`='$ten'");
                  if ($kqname && $kqname->num_rows > 0) {
                    $rowname = $kqname->fetch_assoc();
                    $name = $rowname["name_product"];
                  }

                  // Năm
                  $nam = '—';
                  $strnam = $conn->real_escape_string($row["year_import"]);
                  $kqnam = $conn->query("SELECT * FROM `year_import` WHERE `id_year` LIKE '$strnam'");
                  if ($kqnam && $kqnam->num_rows > 0) {
                    $rownam = $kqnam->fetch_assoc();
                    $nam = $rownam['year_import'];
                  }

                  $is_active = ($row["product_status"] == 'active');
                  $chip_cls = $is_active ? 'chip-status active' : 'chip-status problem';
                  $status_label = $is_active ? 'active' : $row["product_status"];

                  echo "<tr>";
                  echo "<td class='num text-muted'>" . $tt . "</td>";
                  echo "<td>" . htmlspecialchars($group) . "</td>";
                  echo "<td>" . htmlspecialchars($category) . "</td>";
                  echo "<td><strong style='color: var(--color-ink); font-weight: 600;'>" . htmlspecialchars($name) . "</strong></td>";
                  echo "<td class='num'>" . htmlspecialchars($nam) . "</td>";
                  echo "<td><span class='$chip_cls'>" . htmlspecialchars($status_label) . "</span></td>";
                  echo "<td class='text-truncate' style='max-width: 280px;' title='" . htmlspecialchars($row["product_information"]) . "'>" . htmlspecialchars($row["product_information"]) . "</td>";
                  echo "<td><span class='unit-tag'>" . htmlspecialchars($row["units"]) . "</span></td>";
                  echo "<td style='text-align: right;'>
                          <div class='row-actions justify-content-end'>
                            <button class='btn-icon-cell' title='Xem chi tiết & mã vạch' onclick='xemchitiet(\"" . $row["barcode"] . "\")'>
                              <i classbi bi-eye'></i>
                            </button>
                            <button class='btn-icon-cell' title='Sửa' onclick='suataisan(\"" . $row["barcode"] . "\")'>
                              <i class='bi bi-pencil'></i>
                            </button>
                            <button class='btn-icon-cell delete' title='Xóa' onclick='xoa(\"" . $row["barcode"] . "\")'>
                              <i class='bi bi-trash'></i>
                            </button>
                          </div>
                        </td>";
                  echo "</tr>";
                  $tt++;
                }
              } else {
                echo "<tr><td colspan='9' style='text-align: center; padding: 40px 20px; color: var(--color-muted);'>Không có dữ liệu phù hợp</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>

    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Modals -->
  <div class="modal fade modalcao" id="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Chi tiết tài sản & Mã vạch</h6>
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

  <div class="modal fade modalcao" id="modalXoa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Xác nhận xóa</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <p class="mb-0" style="font-size: 13px; color: var(--color-ink-2);">Bạn có chắc chắn muốn xóa tài sản này khỏi cơ sở dữ liệu không?</p>
        </div>
        <div class="modal-footer py-2 px-4" style="border-top: 1px solid var(--color-line);">
          <button type="button" class="btn-quiet" data-bs-dismiss="modal">Hủy</button>
          <button type="button" class="btn-quiet text-danger" id="btnXacNhanXoa">Xác nhận xóa</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade modalcao" id="modalSua" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Sửa tài sản</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="modalbodysua">
          <div class="text-center py-4">
            <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade modalcao" id="modalThem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Thêm tài sản mới</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="modalbodythem">
          <div class="text-center py-4">
            <div class="spinner-border spinner-border-sm text-secondary" role="status"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="position-fixed bottom-0 end-0 p-3 modalcao" style="z-index: 1100">
    <div id="toast" class="toast align-items-center text-bg-dark border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius: 8px; font-size: 13px;">
      <div class="d-flex">
        <div class="toast-body" id="toastbd">
          <?php echo $toastthanhcong; ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalscan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Quét mã vạch trực tiếp</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="modalbodyscan">
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
