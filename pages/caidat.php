<?php
require_once __DIR__ . '/../config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cài đặt · Quản trị</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/dashboard-craft.css">
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
      <span style="font-size: 13px; color: var(--color-ink-2); font-weight: 500;">Cài đặt hệ thống</span>
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
          <a class="nav-link" href="hienthithongbao.php">
            <i class="bi bi-bell"></i>
            <span>Thông báo</span>
          </a>
        </li>
      </ul>

      <div class="nav-section-label">Hệ thống</div>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="caidat.php">
            <i class="bi bi-sliders"></i>
            <span>Cài đặt</span>
          </a>
        </li>
      </ul>
    </aside>

    <!-- Workspace -->
    <main class="app-workspace">
      <section class="content-panel" style="max-width: 600px;">
        <div class="panel-header">
          <div class="panel-title-group">
            <h1 class="panel-title">Tùy chỉnh hệ thống</h1>
          </div>
        </div>

        <div class="p-4">
          <div class="mb-4">
            <h6 class="fw-bold mb-1" style="font-size: 14px;">Chế độ giao diện (Dark Mode)</h6>
            <p class="text-muted" style="font-size: 13px;">Giao diện tuân thủ tiêu chuẩn tương phản WCAG 2.1.</p>
            <div class="form-check form-switch mt-2">
              <input class="form-check-input" type="checkbox" id="simpleDarkModeSwitch"
                <?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark' ? 'checked' : ''; ?>>
              <label class="form-check-label" for="simpleDarkModeSwitch" style="font-size: 13px;">Bật chế độ tối</label>
            </div>
          </div>

          <hr style="border-color: var(--color-line);">

          <div>
            <h6 class="fw-bold mb-1" style="font-size: 14px;">Thông tin máy chủ</h6>
            <div class="mt-2" style="font-size: 13px; color: var(--color-ink-2);">
              <div class="d-flex justify-content-between py-1 border-bottom">
                <span class="text-muted">Cơ sở dữ liệu</span>
                <span class="font-monospace">MariaDB 13.0 (Port 3306)</span>
              </div>
              <div class="d-flex justify-content-between py-1 border-bottom">
                <span class="text-muted">Môi trường thực thi</span>
                <span class="font-monospace">PHP 8.5 (Built-in Server)</span>
              </div>
              <div class="d-flex justify-content-between py-1">
                <span class="text-muted">Định dạng mã vạch</span>
                <span class="font-monospace">Code 128 (1D Barcode)</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const darkModeSwitch = document.getElementById('simpleDarkModeSwitch');
    darkModeSwitch.addEventListener('change', function() {
      if (this.checked) {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        document.cookie = "theme=dark; path=/; max-age=31536000";
      } else {
        document.documentElement.setAttribute('data-bs-theme', 'light');
        document.cookie = "theme=light; path=/; max-age=31536000";
      }
    });
  </script>
</body>
</html>
