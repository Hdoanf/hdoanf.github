<?php
// lay thu vien tao ma vach
require __DIR__ . '/vendor/autoload.php';
//
use Picqer\Barcode\BarcodeGeneratorHTML;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlytaisan";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


$id = $_GET['id'];

// lay du lieu
$sql = "SELECT * FROM quan_ly_tai_san WHERE ma = '$id' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = $row["ma"];
    $taoma = new BarcodeGeneratorHTML();
    $mavach = $taoma->getBarcode($data, $taoma::TYPE_CODE_128);
} else {
    echo "Không tìm thấy tài sản.";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tài Sản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Chi Tiết Tài Sản</h1>
        <table class="table table-bordered">
            <tr>
                <th>Mã Tài Sản</th>
                <td><?php echo $row["ma"]; ?></td>
            </tr>
            <tr>
                <th>Tên Tài Sản</th>
                <td><?php echo $row["ten"]; ?></td>
            </tr>
            <tr>
                <th>Tình Trạng</th>
                <td><?php echo $row["tinh_trang"]; ?></td>
            </tr>
            <tr>
                <th>Ngày Cập Nhập</th>
                <td><?php echo $row["ngay_cap_nhat"]; ?></td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <td><?php echo $row["mo_ta"];
                ?></td>
            <tr>
                <th>Mã Vạch</th>
                <td><?php echo $mavach; ?></td>
            </tr>
            </tr>
           
        </table>
        <a href="nguoidung.php" class="btn btn-primary">Quay lại</a>
    </div> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>