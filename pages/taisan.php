<?php
require_once __DIR__ . '/../config.php';
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
  <title>Mục tài sản · Quản trị</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/dashboard-craft.css">
  <style>
    .modalcao { z-index: 1060 !important; }
    .modal-backdropcao { z-index: 1050 !important; }
    .category-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 12px;
    }
    .category-card {
      background: var(--color-card);
      border: 1px solid var(--color-line);
      border-radius: var(--radius-md);
      padding: 14px 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: border-color 0.12s ease;
    }
    .category-card:hover {
      border-color: var(--color-line-strong);
    }
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
      <span style="font-size: 13px; color: var(--color-ink-2); font-weight: 500;">Mục tài sản có sẵn</span>
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
          <a class="nav-link active" href="taisan.php">
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
      <section class="content-panel mb-4">
        <div class="panel-header">
          <div class="panel-title-group">
            <h1 class="panel-title">Loại tài sản (Categories)</h1>
            <?php
            $kqcate = $conn->query("SELECT * FROM category_product");
            $c_count = $kqcate ? $kqcate->num_rows : 0;
            ?>
            <span class="panel-counter"><?php echo $c_count; ?> loại</span>
          </div>
          <div class="toolbar-actions">
            <button class="btn-quiet btn-accent" data-bs-toggle="modal" data-bs-target="#modalAddCategory">
              <i class="bi bi-plus-lg"></i>
              <span>Thêm loại</span>
            </button>
          </div>
        </div>

        <div class="p-3">
          <div class="category-grid">
            <?php
            if ($kqcate && $kqcate->num_rows > 0) {
              while ($rowcate = $kqcate->fetch_assoc()) {
                echo "<div class='category-card'>";
                echo "  <div>";
                echo "    <div style='font-size: 13px; font-weight: 600; color: var(--color-ink);'>" . htmlspecialchars($rowcate["name_category"]) . "</div>";
                echo "    <div style='font-size: 11px; color: var(--color-muted); font-family: monospace;'>ID: #" . htmlspecialchars($rowcate["id_category"]) . "</div>";
                echo "  </div>";
                echo "  <button class='btn-icon-cell delete' title='Xóa' onclick='xoaCategory(\"" . $rowcate["id_category"] . "\")'><i class='bi bi-trash'></i></button>";
                echo "</div>";
              }
            } else {
              echo "<p class='text-muted p-3'>Chưa có loại tài sản nào.</p>";
            }
            ?>
          </div>
        </div>
      </section>

      <!-- Groups -->
      <section class="content-panel">
        <div class="panel-header">
          <div class="panel-title-group">
            <h2 class="panel-title">Nhóm tài sản (Groups)</h2>
            <?php
            $kqgroup = $conn->query("SELECT * FROM group_product");
            $g_count = $kqgroup ? $kqgroup->num_rows : 0;
            ?>
            <span class="panel-counter"><?php echo $g_count; ?> nhóm</span>
          </div>
          <div class="toolbar-actions">
            <button class="btn-quiet btn-accent" data-bs-toggle="modal" data-bs-target="#modalAddGroup">
              <i class="bi bi-plus-lg"></i>
              <span>Thêm nhóm</span>
            </button>
          </div>
        </div>

        <div class="p-3">
          <div class="category-grid">
            <?php
            if ($kqgroup && $kqgroup->num_rows > 0) {
              while ($rowg = $kqgroup->fetch_assoc()) {
                echo "<div class='category-card'>";
                echo "  <div>";
                echo "    <div style='font-size: 13px; font-weight: 600; color: var(--color-ink);'>" . htmlspecialchars($rowg["name_group"]) . "</div>";
                echo "    <div style='font-size: 11px; color: var(--color-muted); font-family: monospace;'>ID: #" . htmlspecialchars($rowg["id_group"]) . "</div>";
                echo "  </div>";
                echo "  <button class='btn-icon-cell delete' title='Xóa' onclick='xoaGroup(\"" . $rowg["id_group"] . "\")'><i class='bi bi-trash'></i></button>";
                echo "</div>";
              }
            }
            ?>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Modal Thêm Loại -->
  <div class="modal fade modalcao" id="modalAddCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Thêm loại tài sản mới</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="../actions/them/themloai.php" method="POST">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label" style="font-size: 13px; font-weight: 500;">Tên loại tài sản</label>
              <input type="text" name="name_category" class="input-compact w-100" placeholder="Ví dụ: Máy tính bảng, Bàn làm việc..." required>
            </div>
          </div>
          <div class="modal-footer py-2 px-4" style="border-top: 1px solid var(--color-line);">
            <button type="button" class="btn-quiet" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn-quiet btn-accent">Lưu loại</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Thêm Nhóm -->
  <div class="modal fade modalcao" id="modalAddGroup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--color-line); box-shadow: var(--shadow-dropdown);">
        <div class="modal-header py-3 px-4" style="border-bottom: 1px solid var(--color-line);">
          <h6 class="modal-title fw-bold" style="font-size: 14px;">Thêm nhóm tài sản mới</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="../actions/them/themnhom.php" method="POST">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label" style="font-size: 13px; font-weight: 500;">Tên nhóm tài sản</label>
              <input type="text" name="name_group" class="input-compact w-100" placeholder="Ví dụ: Điện tử, Thiết bị văn phòng..." required>
            </div>
          </div>
          <div class="modal-footer py-2 px-4" style="border-top: 1px solid var(--color-line);">
            <button type="button" class="btn-quiet" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn-quiet btn-accent">Lưu nhóm</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function xoaCategory(id) {
      if (confirm('Bạn có chắc muốn xóa loại này?')) {
        window.location.href = `../actions/delete/xoaloai.php?id=${id}`;
      }
    }
    function xoaGroup(id) {
      if (confirm('Bạn có chắc muốn xóa nhóm này?')) {
        window.location.href = `../actions/delete/xoanhom.php?id=${id}`;
      }
    }
  </script>
</body>
</html>
