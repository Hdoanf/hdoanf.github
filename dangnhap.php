<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

$conn->set_charset('utf8mb4');

if (isset($_POST["usn"]) && isset($_POST["pass"])) {
  $usn = $_POST["usn"];
  $pass = $_POST["pass"];
  $sql = "SELECT * FROM user_account WHERE `username` = '$usn' AND `user_password` = '$pass'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Giữ nguyên mảng
    session_start();
    $_SESSION['user'] = $user['username'];
    $_SESSION['quyenhan'] = $user['use_role']; // admin hoặc user
    $_SESSION['donvi'] = $user['units'];      // ví dụ: CNT

    if ($user['use_role'] === "user") {
      header("Location: nguoidung.php");
    } else {
      header("Location: admin.php");
    }
    exit();
  } else {
    $login_error = "Tên đăng nhập hoặc mật khẩu không đúng";
  }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập hệ thống</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #3498db;
      --secondary-color: #2980b9;
      --light-color: #ecf0f1;
      --dark-color: #2c3e50;
    }

    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      height: 100vh;
      display: flex;
      align-items: center;
    }

    .login-container {
      max-width: 450px;
      width: 100%;
      margin: 0 auto;
      animation: fadeIn 0.5s ease-in-out;
    }

    .login-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .login-header {
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 25px;
      text-align: center;
    }

    .login-body {
      padding: 30px;
      background-color: white;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px 15px;
      border: 1px solid #ddd;
      transition: all 0.3s;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }

    .btn-login {
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      border: none;
      border-radius: 8px;
      padding: 12px;
      font-weight: 600;
      letter-spacing: 1px;
      transition: all 0.3s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .input-group-text {
      background-color: var(--light-color);
      border: none;
    }

    .logo {
      width: 80px;
      height: 80px;
      margin-bottom: 15px;
      border-radius: 50%;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .logo i {
      font-size: 40px;
      color: var(--primary-color);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .error-message {
      animation: shake 0.5s;
    }

    @keyframes shake {

      0%,
      100% {
        transform: translateX(0);
      }

      20%,
      60% {
        transform: translateX(-5px);
      }

      40%,
      80% {
        transform: translateX(5px);
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="login-container">
      <div class="login-card">
        <div class="login-header">
          <div class="logo">
          </div>
          <h2 class="mb-0">ĐĂNG NHẬP HỆ THỐNG</h2>
        </div>

        <div class="login-body">
          <?php if (isset($login_error)): ?>
            <div class="alert alert-danger error-message mb-4">
              <i class="fas fa-exclamation-circle me-2"></i><?php echo $login_error; ?>
            </div>
          <?php endif; ?>

          <form method="POST" action="">
            <div class="mb-4">
              <label for="usn" class="form-label fw-bold">Tên đăng nhập</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="usn" name="usn" placeholder="Nhập tên đăng nhập" required>
              </div>
            </div>

            <div class="mb-4">
              <label for="pass" class="form-label fw-bold">Mật khẩu</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Nhập mật khẩu" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>

            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-login btn-block text-white">
                <i class="fas fa-sign-in-alt me-2"></i>ĐĂNG NHẬP
              </button>
            </div>

            <!-- <div class="text-center"> -->
            <!--   <a href="#" class="text-decoration-none">Quên mật khẩu?</a> -->
            <!--   <!-- <span class="mx-2">|</span> -->
            <!--   <a href="dangky.php" class="text-decoration-none">Đăng ký tài khoản</a> -->
            <!-- </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Hiển thị/ẩn mật khẩu
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('pass');
      const icon = this.querySelector('i');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });

    // Focus vào ô username khi trang load
    document.getElementById('usn').focus();
  </script>
</body>

</html>
