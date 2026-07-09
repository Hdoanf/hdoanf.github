<?php
require_once __DIR__ . '/../config.php';

$getid = $_GET['id'];
$id = $conn->real_escape_string($getid);
$sql = "DELETE FROM `user_account` WHERE `id` LIKE '$id' ";
$kq = $conn->query($sql);
session_start();
if ($kq) {
  $_SESSION['xoathanhcong'] = "Xoá thành công";
} else {
  $_SESSION['loi'] = "Xoá lỗi";
}
header("Location: admin.php");
exit();
