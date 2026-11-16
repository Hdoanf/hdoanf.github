<?php
require_once __DIR__ . '/../config.php';
$search = "";
$sql = "SELECT * FROM `user_account`";
$kq = $conn->query($sql);

session_start();
$toastthanhcong = isset($_SESSION['thanhcong']) ? $_SESSION['thanhcong'] : "";
$toastloi = isset($_SESSION['loi']) ? $_SESSION['loi'] : "";
unset($_SESSION['thanhcong'], $_SESSION['loi']);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Người dùng · Quản trị</title>
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
      <span style="font-size: 13px; color: var(--color-ink-2); font-weight: 500;">Người dùng</span>
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
          <a class="nav-link active" href="quanlynguoidung.php">
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
      <section class="content-panel">
        <div class="panel-header">
          <div class="panel-title-group">
            <h1 class="panel-title">Tài khoản người dùng</h1>
            <span class="panel-counter"><?php echo ($kq ? $kq->num_rows : 0); ?> tài khoản</span>
          </div>

          <div class="toolbar-actions">
            <button class="btn-quiet btn-accent" onclick="themnguoidung()">
              <i class="bi bi-plus-lg"></i>
              <span>Thêm tài khoản</span>
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table-honest">
            <thead>
              <tr>
                <th style="width: 50px;" class="num">#</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Đơn vị / Phòng ban</th>
                <th>Vai trò</th>
                <th style="width: 90px; text-align: right;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tt = 1;
              if ($kq && $kq->num_rows > 0) {
                while ($row = $kq->fetch_assoc()) {
                  $is_admin = ($row['use_role'] === 'Admin');
                  $role_chip = $is_admin ? 'chip-status active' : 'chip-status';

                  echo "<tr>";
                  echo "<td class='num text-muted'>" . $tt . "</td>";
                  echo "<td><strong style='color: var(--color-ink);'>" . htmlspecialchars($row['username']) . "</strong></td>";
                  echo "<td><span class='text-muted font-monospace'>••••••••</span></td>";
                  echo "<td><span class='unit-tag'>" . htmlspecialchars($row['units']) . "</span></td>";
                  echo "<td><span class='$role_chip'>" . htmlspecialchars($row['use_role']) . "</span></td>";
                  echo "<td style='text-align: right;'>
                          <div class='row-actions justify-content-end'>
                            <button class='btn-icon-cell delete' title='Xóa' onclick='xoaUser(\"" . $row['id'] . "\")'>
                              <i class='bi bi-trash'></i>
                            </button>
                          </div>
                        </td>";
                  echo "</tr>";
                  $tt++;
                }
              } else {
                echo "<tr><td colspan='6' style='text-align: center; padding: 40px; color: var(--color-muted);'>Chưa có người dùng nào.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- modal them nguoidung -->
  <div class="modal fade modalcao" id="modalThemUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Thêm tài khoản người dùng</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="../actions/them/themnguoidung.php" method="POST">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label" style="font-size: 13px; font-weight: 500;">Tên tài khoản</label>
              <input type="text" name="username" class="input-compact w-100" required>
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-size: 13px; font-weight: 500;">Mật khẩu</label>
              <input type="password" name="password" class="input-compact w-100" required>
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-size: 13px; font-weight: 500;">Đơn vị</label>
              <select name="unit" class="select-compact w-100" required>
                <?php
                $u_res = $conn->query("SELECT * FROM units");
                if ($u_res) {
                  while ($u = $u_res->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($u['units']) . "'>" . htmlspecialchars($u['units']) . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" style="font-size: 13px; font-weight: 500;">Vai trò</label>
              <select name="role" class="select-compact w-100" required>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
              </select>
            </div>
          </div>
          <div class="modal-footer py-2 px-4" style="border-top: 1px solid var(--color-line);">
            <button type="button" class="btn-quiet" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn-quiet btn-accent">Lưu tài khoản</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function themnguoidung() {
      var modal = new bootstrap.Modal(document.getElementById('modalThemUser'));
      modal.show();
    }
    function xoaUser(id) {
      if (confirm('Bạn có chắc muốn xóa tài khoản này?')) {
        window.location.href = `../actions/delete/xoanguoidung.php?id=${id}`;
      }
    }
  </script>
</body>
</html>
