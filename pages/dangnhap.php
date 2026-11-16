<?php
require_once __DIR__ . '/../config.php';

$login_error = "";
if (isset($_POST["usn"]) && isset($_POST["pass"])) {
  $usn = $conn->real_escape_string($_POST["usn"]);
  $pass = $conn->real_escape_string($_POST["pass"]);
  $sql = "SELECT * FROM user_account WHERE `username` = '$usn' AND `user_password` = '$pass'";
  $result = $conn->query($sql);

  if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['user'] = $user['username'];
    $_SESSION['quyenhan'] = $user['use_role'];
    $_SESSION['donvi'] = $user['units'];

    if (strtolower($user['use_role']) === "user") {
      header("Location: nguoidung.php");
    } else {
      header("Location: admin.php");
    }
    exit();
  } else {
    $login_error = "Tài khoản hoặc mật khẩu không chính xác.";
  }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập · Hệ thống Quản lý Tài sản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/dashboard-craft.css">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: var(--color-page);
    }
    .login-box {
      width: 100%;
      max-width: 380px;
      background: var(--color-card);
      border: 1px solid var(--color-line);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-dropdown);
      padding: 32px 28px;
    }
  </style>
</head>

<body>
  <div class="login-box">
    <div class="text-center mb-4">
      <div class="d-inline-flex align-items-center justify-content-center mb-2" style="width: 44px; height: 44px; border-radius: 10px; background: var(--color-soft); border: 1px solid var(--color-line);">
        <i class="bi bi-upc-scan fs-4 text-dark"></i>
      </div>
      <h5 class="fw-bold mb-1" style="color: var(--color-ink); letter-spacing: -0.02em;">Asset Management</h5>
      <p class="text-muted small mb-0">Hệ thống quản lý tài sản & mã vạch</p>
    </div>

    <?php if (!empty($login_error)): ?>
      <div class="alert alert-danger py-2 px-3 small border-0 mb-3" style="border-radius: var(--radius-sm); font-size: 13px;">
        <i class="bi bi-exclamation-circle me-1"></i> <?php echo htmlspecialchars($login_error); ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label" style="font-size: 13px; font-weight: 500; color: var(--color-ink-2);">Tên đăng nhập</label>
        <input type="text" name="usn" class="input-compact w-100" placeholder="admin1 hoặc user1" required autofocus>
      </div>

      <div class="mb-3">
        <label class="form-label" style="font-size: 13px; font-weight: 500; color: var(--color-ink-2);">Mật khẩu</label>
        <input type="password" name="pass" class="input-compact w-100" placeholder="••••••••" required>
      </div>

      <button type="submit" class="btn-quiet btn-accent w-100 mt-2" style="height: 36px;">
        <span>Đăng nhập hệ thống</span>
        <i class="bi bi-arrow-right"></i>
      </button>
    </form>

    <div class="mt-4 pt-3 border-top text-center" style="border-color: var(--color-line) !important;">
      <span class="text-muted" style="font-size: 12px;">Tài khoản mặc định: <code>admin1</code> / <code>admin123</code></span>
    </div>
  </div>
</body>
</html>
