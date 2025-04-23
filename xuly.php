
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Lỗi kết nối: " . $conn->connect_error);
}

// Lấy mã vạch từ request
$barcode = $_POST['barcode'];

// Tìm trong database
$sql = "SELECT * FROM full_information WHERE barcode = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $barcode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $data = $result->fetch_assoc();
  echo json_encode($data);
} else {
  echo "Không tìm thấy sản phẩm!";
}

$stmt->close();
$conn->close();
?>
