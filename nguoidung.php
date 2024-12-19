<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlytaisan";
$conn = new mysqli($servername, $username, $password, $dbname);

// Tìm kiếm
$search = "";
$loaitaisan = "";
if (isset($_GET['search']) && isset($_GET['loaitaisan'])) {
    $search = $_GET['search'];
    $loaitaisan = $_GET['loaitaisan'];
    $sql = "SELECT * FROM quan_ly_tai_san WHERE ten LIKE '%$search%' AND loai LIKE '%$loaitaisan%'";
} else if (isset($_GET['loaitaisan'])) {
    $loaitaisan = $_GET['loaitaisan'];
    $sql = "SELECT * FROM quan_ly_tai_san WHERE loai LIKE '%$loaitaisan%'";
} else if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM quan_ly_tai_san WHERE ten LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM quan_ly_tai_san";
}
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
                        <!-- <button type="submit">Tìm kiếm</button> -->
                        <form method="GET" action="">
                            <select name="loaitaisan" class="search-bar">
                                <option value="">Tất cả loại tài sản</option>
                                <?php
                                $loaitaisan = $conn->query("SELECT DISTINCT loai FROM quan_ly_tai_san");
                                if ($loaitaisan->num_rows > 0) {
                                    while ($rowLoai = $loaitaisan->fetch_assoc()) {
                                        echo "<option value='" . $rowLoai['loai'] . "'>"
                                            . $rowLoai['loai'] . "</option>";
                                    }
                                }
                                ?>
                            </select><br>
                            <button type="submit" class="searchbtn">Tìm kiếm</button>
                           
                        </form>
                         <br>
                        </form>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">MÃ</th>
                                    <th scope="col">TÊN TÀI SẢN</th>
                                    <th scope="col">TÌNH TRẠNG</th>
                                    <th scope="col">LOẠI TÀI SẢN</th>
                                    <th scope="col">TÁC VỤ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($kq->num_rows > 0) {
                                    while ($row = $kq->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["ma"] . "</td>";
                                        echo "<td>" . $row["ten"] . "</td>";
                                        echo "<td>" . $row["tinh_trang"] . "</td>";
                                        echo "<td>" . $row["loai"] . "</td>";
                                        echo "<td><a href='chitiet.php?id=" . $row["ma"] . "'><button>Xem Thêm</button></a></td>";
                                        echo "</tr>";
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