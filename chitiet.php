<?php
// lay thu vien tao ma vach
require __DIR__ . '/vendor/autoload.php';
//
use Picqer\Barcode\BarcodeGeneratorHTML;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


$id = $_GET['id'];

// lay du lieu
$sql = "SELECT * FROM full_information WHERE barcode = '$id' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = $row["barcode"];
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
                <th>Nhóm Tài Sản </th>
                <?php
                $kqgroup = $conn->query("SELECT * FROM group_product WHERE id_group = " . $row["product_group"] . "");
                if ($kqgroup->num_rows > 0) {
                    $rowgroup = $kqgroup->fetch_assoc();
                    $group = $rowgroup["name_group"];
                }
                echo "<td>" . $group . "</td>";
                ?>
            </tr>
            <tr>
                <th>Loại Tài Sản</th>
                <?php $kqcategory = $conn->query("SELECT * FROM category_product WHERE id_category = " . $row["product_category"] . "");
                if ($kqcategory->num_rows > 0) {
                    $rowcategory = $kqcategory->fetch_assoc();
                    $category = $rowcategory["name_category"];
                }
                echo "<td>" . $category . "</td>"; ?>
            </tr>
            <tr>
                <th>Tình Trạng</th>
                <?php $ten = strtoupper($row["product_name"]);
                $kqname = $conn->query("SELECT * FROM `product` WHERE `id_product`='$ten'");
                if ($kqname->num_rows > 0) {
                    $rowname = $kqname->fetch_assoc();
                    $name = $rowname["name_product"];
                }
                echo "<td>" . $name . "</td>";
                ?>
            </tr>
            <tr>
                <th>Ngày Cập Nhập</th>
                <?php $nam = '';
                $kqnam = $conn->query("SELECT * FROM `year_import` WHERE `id_year`=" . $row["year_import"] . "");
                if ($kqnam->num_rows) {
                    $rownam = $kqnam->fetch_assoc();
                    $nam = $rownam['year_import'];
                }
                echo "<td>" . $nam . "</td>"; ?>
            </tr>

            <tr>
                <th>Mô tả</th>
                <td> <?php echo $row["product_information"];
                ?></td>

            <tr>
                <th>Trạng Thái</th>
                <?php
                $status = ($row["product_status"] == 'active') ? 'badge bg-success' : 'badge bg-danger';
                echo "<td><span class='$status'>" . $row["product_status"] . "</span></td>"; ?>
            </tr>
            <tr>
                <th>Mã Vạch</th>
                <td><?php echo $mavach; ?></td>
            </tr>

        </table>
        <a href="nguoidung.php" class="btn btn-primary">Quay lại</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>