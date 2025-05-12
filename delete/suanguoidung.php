<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo "hình như chưa kết nối được ";
  die();
}

$conn->set_charset('utf8mb4');

$sqlunits = "SELECT * FROM units
ORDER BY
    CASE
        WHEN units = 'Chưa phân lớp' THEN 0
        ELSE 1
    END,
    units;
";

$kqunits = $conn->query($sqlunits);
$getid = $_GET['id'];
$id = $conn->real_escape_string($getid);

$sql = "SELECT * FROM `user_account` WHERE `id` = '$id'";
$kq = $conn->query($sql);
$row = $kq->fetch_assoc();

$usn = $conn->real_escape_string($row["username"]);
$units = $conn->real_escape_string($row["units"]);
$role = $conn->real_escape_string($row["use_role"]);
$pass = $conn->real_escape_string($row["user_password"]);

if (isset($_POST['submit'])) {
  $username = $_POST['usn'];
  $donvi = $_POST['units'];
  $quyen = $_POST['use_role'];
  $mk = $_POST['pass']; // sửa đúng tên biến input

  // Cập nhật
  $update = "UPDATE `user_account` SET 
    `username`='$username',
    `user_password`='$mk',
    `units`='$donvi',
    `use_role`='$quyen'
    WHERE `id` = '$id'";

  $qrupdate = $conn->query($update);
  session_start();
  if ($qrupdate) {
    $_SESSION['thanhcong'] = "Sửa thành công";
  } else {
    $_SESSION['loi'] = "Lỗi";
  }
  header("Location: ../quanlynguoidung.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sửa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-3">
    <form method="post" action="delete/suanguoidung.php?id=<?php echo $id; ?>">

      <div class="mb-3 mt-3">
        <label class="form-label">Username:</label>
        <input type="text" class="form-control" placeholder="Thông tin" value="<?php echo $usn ?>" name="usn">
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">Đơn vị sử dụng</label>
        <select class="form-select" name="units">
          <?php foreach ($kqunits as $uts) {
            $selected = ($uts["id_units"] == $units) ? "selected" : "";
            echo "<option value='{$uts["id_units"]}' $selected>{$uts["units"]}</option>";
          } ?>
        </select>
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">Password</label>
        <input type="text" class="form-control" placeholder="Thông tin" value="<?php echo $pass ?>" name="pass">
      </div>

      <div class="mb-3 mt-3">
        <label class="form-label">Phân quyền :</label>
        <select class="form-select" name="use_role">
          <option value="admin" <?php echo ($role == 'admin') ? 'selected' : ''; ?>>admin</option>
          <option value="user" <?php echo ($role == 'user') ? 'selected' : ''; ?>>user</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
    </form>
  </div>
</body>

</html>
