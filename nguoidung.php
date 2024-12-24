<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM `full_information` WHERE `product_name` LIKE '%$search%'";
}else{
    $sql = "SELECT * FROM full_information";
}
$kq = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài sản </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://i.pinimg.com/736x/70/54/63/70546384b90a3b386bf16531c859d868.jpg" width="30"
                    height="30" class="d-inline-block align-text-top me-2" alt="Logo">
                Quản lý tài sản
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="bi bi-house-door"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person-circle"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-grid-1x2"></i> Tổng quát
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Chức năng 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Chức năng 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i> Cài đặt
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- chỗ tìm kiếm -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Quản lý tài sản </h2>
                        <form class="row g-3 mb-4" method="GET">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    <input name ="search" type="text" class="form-control " placeholder="Tìm kiếm..."
                                    value="<?php echo htmlspecialchars($search)  ?>">
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>Asset Type</option>
                                    <option>Hardware</option>
                                    <option>Software</option>
                                    <option>Network</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Maintenance</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Search</button>
                            </div>
                        </form>
                        <!-- bảng render từ database -->
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead class="table-light">
                                    <tr>
                                    <th>TT</th>
                                    <th>NHÓM TÀI SẢN</th>
                                    <th>LOẠI TÀI SẢN</th>
                                    <th>TÊN TÀI SẢN</th>
                                    <th>NĂM NHẬP</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>THÔNG TIN TÀI SẢN</th>
                                    <th>TÁC VỤ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                $tt=1;
                                $status='';
                                $group='';
                                $category='';
                                $name='';

                                if ($kq->num_rows > 0) {
                                    while ($row = $kq->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $tt . "</td>";
                                        
                                        //nhóm tài sản
                                        $kqgroup = $conn->query("SELECT * FROM group_product WHERE id_group = " . $row["product_group"]. "");
                                        if ($kqgroup->num_rows > 0) {
                                            $rowgroup = $kqgroup->fetch_assoc();
                                            $group = $rowgroup["name_group"];
                                        }
                                        echo "<td>" . $group. "</td>";

                                        //loại tài sản
                                        $kqcategory = $conn->query("SELECT * FROM category_product WHERE id_category = " . $row["product_category"]. "");
                                        if ($kqcategory->num_rows > 0) {
                                            $rowcategory = $kqcategory->fetch_assoc();
                                            $category = $rowcategory["name_category"];
                                        }
                                        echo "<td>" . $category. "</td>";

                                         //tên tài sản 
                                         $ten=strtoupper($row["product_name"]);
                                         $kqname = $conn->query("SELECT * FROM `product` WHERE `id_product`='$ten'");
                                         if ($kqname->num_rows > 0) {
                                             $rowname = $kqname->fetch_assoc();
                                             $name = $rowname["name_product"];
                                         }
                                        echo "<td>" .$name. "</td>";
                                        //năm
                                         $nam='';
                                         $kqnam=$conn->query("SELECT * FROM `year_import` WHERE `id_year`=". $row["year_import"] ."");
                                         if($kqnam->num_rows){
                                            $rownam=$kqnam->fetch_assoc();
                                            $nam=$rownam['year_import'];
                                         }
                                        echo "<td>" .$nam. "</td>";
                                        $status=($row["product_status"] == 'active') ? 'badge bg-success': 'badge bg-danger';
                                        echo "<td><span class='$status'>" .$row["product_status"]. "</span></td>";
                                        echo "<td>" . $row["product_information"] . "</td>";
                                        echo "<td><a href='chitiet.php?id=" . $row["barcode"] . "'><button  class='btn btn-sm btn-outline-primary' >Xem Thêm</button></a></td>";
                                        echo "</tr>";
                                        $tt++;
                                    }
                                }else {
                                    echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Phần mềm quản lý tài sản</span>
        </div>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>