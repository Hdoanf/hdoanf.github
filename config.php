<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "barcode";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
