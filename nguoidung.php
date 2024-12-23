<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

// Tìm kiếm
$search = "";
$danhmuctaisan = "";
$nhomtaisan = "";
$tentaisan = "";
$nam="";
$trangthai="";




// if (isset($_GET['search']) && isset($_GET['loaitaisan'])) {
//     $search = $_GET['search'];
//     $loaitaisan = $_GET['loaitaisan'];
//     $sql = "SELECT * FROM quan_ly_tai_san WHERE ten LIKE '%$search%' AND loai LIKE '%$loaitaisan%'";
// } else if (isset($_GET['loaitaisan'])) {
//     $loaitaisan = $_GET['loaitaisan'];
//     $sql = "SELECT * FROM quan_ly_tai_san WHERE loai LIKE '%$loaitaisan%'";
// } else if (isset($_GET['search'])) {
//     $search = $_GET['search'];
//     $sql = "SELECT * FROM quan_ly_tai_san WHERE ten LIKE '%$search%'";
// } else {
//     $sql = "SELECT * FROM quan_ly_tai_san";
// }


$sql = "SELECT * FROM full_information";
$kq = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phần Mềm Quản Lý Tài Sản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 sidebar">
                <h2>CHỨC NĂNG CỦA USER</h2>

            </nav>
            <main class="col-md-9 col-lg-10">
                <div class="content">
                    <h1>DANH SÁCH TÀI SẢN</h1>
                    <form method="GET" action="">
                        <input name="search" type="text" class="search-bar" placeholder="Tìm kiếm..."
                            value="<?php echo htmlspecialchars($search); ?>">
                            <select name="loaitaisan" class="search-bar">
                                <option value="">Tất cả nhóm tài sản</option>
                                <?php
                                $kqnhomtaisan = $conn->query("SELECT DISTINCT product_group FROM full_information");
                                if ($kqnhomtaisan->num_rows > 0) {
                                    while ($rownhom = $kqnhomtaisan->fetch_assoc()) {
                                        $gr=$conn->query("SELECT `name_group` FROM `group_product` WHERE `id_group`='$rownhom[product_group]'");
                                        $nhomten = $gr->fetch_assoc();
                                        $tennhom = ($rownhom['product_group'] == $nhomtaisan )? "selected" : "";
                                        echo "<option value='" . $rownhom['product_group'] . "' $tennhom >"
                                         . $nhomten['name_group'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <select name="phanloaitaisan" class="search-bar">
                                <option value="">Tất cả phân loại tài sản</option>
                                <?php
                                $kqphanloai = $conn->query("SELECT DISTINCT product_category FROM full_information");
                                if ($kqphanloai->num_rows > 0) {
                                    while ($rowphanloai = $kqphanloai->fetch_assoc()) {
                                        $pl=$conn->query("SELECT  `name_category` FROM `category_product` WHERE `id_category`= $rowphanloai[product_category]");
                                        $tenloai = $pl->fetch_assoc();
                                        $tenphanloai = ($rowphanloai['product_category'] == $danhmuctaisan)? "selected" : "";
                                        echo "<option value='" . $rowphanloai['product_group'] . "' $tenphanloai >
                                        ". $tenloai['name_category']."</option>";
                
                                    }
                                }
                                ?>
                                
                            </select>
                            <select name="trangthai" class="search-bar">
                                <option value="">Trạng thái</option>
                                <?php
                                $kqnhomtaisan = $conn->query("SELECT DISTINCT product_group FROM full_information");
                                if ($kqnhomtaisan->num_rows > 0) {
                                    while ($rownhom = $kqnhomtaisan->fetch_assoc()) {
                                        $gr=$conn->query("SELECT `name_group` FROM `group_product` WHERE `id_group`='$rownhom[product_group]'");
                                        $nhomten = $gr->fetch_assoc();
                                        $tennhom = ($rownhom['product_group'] == $nhomtaisan )? "selected" : "";
                                        echo "<option value='" . $rownhom['product_group'] . "' $tennhom >"
                                         . $nhomten['name_group'] . "</option>";
                                    }
                                }
                                ?>

                            </select>
                            <select name="nam" class="search-bar">
                                <option value="">Năm</option>
                                <?php
                                $kqnhomtaisan = $conn->query("SELECT DISTINCT product_group FROM full_information");
                                if ($kqnhomtaisan->num_rows > 0) {
                                    while ($rownhom = $kqnhomtaisan->fetch_assoc()) {
                                        $gr=$conn->query("SELECT `name_group` FROM `group_product` WHERE `id_group`='$rownhom[product_group]'");
                                        $nhomten = $gr->fetch_assoc();
                                        $tennhom = ($rownhom['product_group'] == $nhomtaisan )? "selected" : "";
                                        echo "<option value='" . $rownhom['product_group'] . "' $tennhom >"
                                         . $nhomten['name_group'] . "</option>";
                                    }
                                }
                                ?>
                                
                            </select>
                            <br>
                            <button type="submit" class="searchbtn">Tìm kiếm</button>
                        </form> <br>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">TT</th>
                                    <th scope="col">NHÓM TÀI SẢN</th>
                                    <th scope="col">LOẠI TÀI SẢN</th>
                                    <th scope="col">TÊN TÀI SẢN</th>
                                    <th scope="col">NĂM NHẬP</th>
                                    <th scope="col">TRẠNG THÁI</th>
                                    <th scope="col">THÔNG TIN TÀI SẢN</th>
                                    <th scope="col">TÁC VỤ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tt = 1;
                                if ($kq->num_rows > 0) {
                                    while ($row = $kq->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" .$tt. "</td>";
                                        echo "<td>" . $row["product_group"] . "</td>";
                                        echo "<td>" . $row["product_category"] . "</td>";
                                        echo "<td>" . $row["product_name"] . "</td>";
                                        echo "<td>" . $row["year_import"] . "</td>";
                                        echo "<td>" . $row["product_status"] . "</td>";
                                        echo "<td>" . $row["product_information"] . "</td>";
                                        echo "<td><a href='chitiet.php?id=" . $row["barcode"] . "'><button>Xem Thêm</button></a></td>";
                                        echo "</tr>";
                                        $tt++;
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
            </main>
        </div>
    </div>

</html>