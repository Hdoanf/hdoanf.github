
<?php
require_once __DIR__ . '/config.php';
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
