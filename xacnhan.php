
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo "hình như chưa kết nối được ";
}

$conn->set_charset('utf8mb4');
$getid = $_GET['id'];
$id = $conn->real_escape_string($getid);
$sql = "UPDATE `full_information` SET `product_status`='maintenance' WHERE `barcode` LIKE '$id' ";
$kq = $conn->query($sql);
$sqlthongbao = "UPDATE `thongbao` SET `Xac_nhan`='Đã sử lý' WHERE `barcode` LIKE '$id'";
$sqlthongbao = $conn->query($sqlthongbao);
session_start();
if ($kq) {
  $_SESSION['xoathanhcong'] = "Thành công";
} else {
  $_SESSION['loi'] = "Lỗi";
}
header("Location: admin.php");
exit();
