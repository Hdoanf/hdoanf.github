<?php
require_once __DIR__ . '/../config.php';
session_start();
$toastthanhcong = isset($_SESSION['thanhcong']) ? $_SESSION['thanhcong'] : "";
$toastloi = isset($_SESSION['loi']) ? $_SESSION['loi'] : "";
unset($_SESSION['thanhcong'], $_SESSION['loi']);

$search = "";
$sql = "
  SELECT 
    fi.*, 
    tb.id AS tb_id,
    tb.mota AS mota, 
    tb.date AS thongbao_date,
    tb.Xac_nhan AS xacnhan
  FROM full_information fi
  INNER JOIN thongbao tb
    ON fi.barcode COLLATE utf8mb4_unicode_ci = tb.barcode COLLATE utf8mb4_unicode_ci
  WHERE 1=1
";
if (isset($_GET['search']) && !empty($_GET['search'])) {
  $search = trim($_GET['search']);
  $search_esc = $conn->real_escape_string($search);
  $sql .= " AND (fi.barcode LIKE '%$search_esc%' OR tb.mota LIKE '%$search_esc%')";
}
$sql .= " ORDER BY tb.date DESC";
$kq = $conn->query($sql);
$rows_count = $kq ? $kq->num_rows : 0;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông báo sự cố · Quản trị</title>
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
      <span style="font-size: 13px; color: var(--color-ink-2); font-weight: 500;">Thông báo từ người dùng</span>
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
          <a class="nav-link active" href="hienthithongbao.php">
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
            <h1 class="panel-title">Thông báo & Báo cáo sự cố từ các phòng ban</h1>
            <span class="panel-counter"><?php echo $rows_count; ?> thông báo</span>
          </div>
        </div>

        <form class="filter-strip" method="GET">
          <div class="d-flex align-items-center gap-2 flex-grow-1" style="max-width: 320px;">
            <input name="search" type="text" class="input-compact w-100" placeholder="Lọc theo mã hoặc nội dung..."
              value="<?php echo htmlspecialchars($search); ?>">
          </div>
          <button type="submit" class="btn-quiet">
            <i class="bi bi-funnel"></i>
            <span>Áp dụng</span>
          </button>
          <?php if (!empty($search)): ?>
            <a href="hienthithongbao.php" class="btn-quiet text-muted" title="Bỏ lọc">
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
                <th>Mã Barcode</th>
                <th>Thời gian</th>
                <th>Nội dung thông báo / Mô tả sự cố</th>
                <th>Đơn vị</th>
                <th>Xác nhận xử lý</th>
                <th style="width: 80px; text-align: right;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tt = 1;
              if ($kq && $kq->num_rows > 0) {
                while ($row = $kq->fetch_assoc()) {
                  $is_done = ($row["xacnhan"] === "Đã sử lý" || $row["xacnhan"] === "Đã xử lý");
                  $status_chip = $is_done ? 'chip-status active' : 'chip-status problem';

                  echo "<tr>";
                  echo "<td class='num text-muted'>" . $tt . "</td>";
                  echo "<td><span class='font-monospace fw-bold' style='color: var(--color-ink);'>" . htmlspecialchars($row["barcode"]) . "</span></td>";
                  echo "<td><span class='text-muted small font-monospace'>" . htmlspecialchars($row["thongbao_date"]) . "</span></td>";
                  echo "<td>" . htmlspecialchars($row["mota"]) . "</td>";
                  echo "<td><span class='unit-tag'>" . htmlspecialchars($row["units"]) . "</span></td>";
                  echo "<td><span class='$status_chip'>" . htmlspecialchars($row["xacnhan"]) . "</span></td>";
                  echo "<td style='text-align: right;'>
                          <div class='row-actions justify-content-end'>
                            <button class='btn-icon-cell' title='Xác nhận xử lý' onclick='xacnhan(\"" . $row["barcode"] . "\")'>
                              <i class='bi bi-check2-circle text-success'></i>
                            </button>
                            <button class='btn-icon-cell delete' title='Xóa' onclick='xoathongbao(\"" . $row["barcode"] . "\")'>
                              <i class='bi bi-trash'></i>
                            </button>
                          </div>
                        </td>";
                  echo "</tr>";
                  $tt++;
                }
              } else {
                echo "<tr><td colspan='7' style='text-align: center; padding: 40px; color: var(--color-muted);'>Không có thông báo sự cố nào cần xử lý.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/main.js"></script>
</body>
</html>
