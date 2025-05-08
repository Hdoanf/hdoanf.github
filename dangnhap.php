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
  $sql = "SELECT * FROM user_account WHERE `usn` = '$usn' AND `pass` = '$pass'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $phanquyen = $result->fetch_assoc();
    $phanquyen = $phanquyen["quyenhan"];
    if ($phanquyen == "User") {
      header("Location: nguoidung.php");
    } else {
      header("Location: admin.php");
    }
  } else {
    $usnEr = "Tên người dùng hoặc mật khẩu không đúng";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="form">
    <div id="logincard">
      <h1><span class="title">Đăng nhập</span></h1>
      <form class="fromlogin" action="" method="post">
        <label>Tên người dùng:</label><br>
        <input type="text" class="name" name="usn"><br>
        <span class="error"></span><br>
        <label>Mật khẩu:</label><br>
        <input type="password" class="pass" name="pass">
        <span class="error"></span><br>
        <div class="button">
          <input type="submit" value="Đăng nhập" name="submit">
        </div>
      </form>
      <!-- <p class="footer">Bạn chưa có tài khoản ? <a class="signup" href="dangky.php"> Đăng ký </a> -->
      </p>
    </div>
  </div>
</body>

</html>
