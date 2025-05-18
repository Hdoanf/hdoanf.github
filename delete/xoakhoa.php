
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo "hình như chưa kết nối được ";
}


$getid = $_GET['id'];
$id = $conn->real_escape_string($getid);
$sql = "DELETE FROM `units` WHERE `id_units` LIKE '$id' ";
$kq = $conn->query($sql);
session_start();
if ($kq) {
  $_SESSION['xoathanhcong'] = "Xoá thành công";
} else {
  $_SESSION['loi'] = "Xoá lỗi";
}
header("Location: quanlynguoidung.php");
exit();
