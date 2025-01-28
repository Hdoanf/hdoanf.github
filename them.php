<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);
$search = "";
$loaits = "";
$tinh_trang = "";
if (isset($_GET['search']) && isset($_GET['loaitaisan']) && isset($_GET['tinhtrang'])) {
    $loaits = $_GET['loaitaisan'];
    $tinh_trang = $_GET['tinhtrang'];
    $search = $_GET['search'];
    $sql = "SELECT * FROM `full_information` WHERE `product_category` LIKE '%$loaits%' AND `product_status` LIKE '%$tinh_trang%' AND `product_name` LIKE '%$search%'";
} elseif (isset($_GET['loaitaisan']) && isset($_GET['tinhtrang'])) {
    $loaits = $_GET['loaitaisan'];
    $tinh_trang = $_GET['tinhtrang'];
    $sql = "SELECT * FROM `full_information` WHERE `product_category` 
    LIKE '%$loaits%' AND `product_status` 
    LIKE '%$tinh_trang%'";
} elseif (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM full_information WHERE  product_name LIKE %$search%";
} else {
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
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://i.pinimg.com/736x/70/54/63/70546384b90a3b386bf16531c859d868.jpg" width="30"
                    height="30" class="d-inline-block align-text-top me-2" alt="Logo">
                Quản lý tài sản của admin
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
                            <a class="nav-link active" href="admin.php">
                                <i class="bi bi-grid-1x2"></i> Tài sản
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bi bi-person-circle" href="quanlynguoidung.php">
                                Quản lý người dùng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                Chức năng 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bi bi-gear"></i> Cài đặt
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Thêm tài sản</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
                        rel="stylesheet">
                </head>
                <div class="bg-light">
                    <div class="container ">
                        <div class="d-flex justify-content-start align-items-center">
                            <a href="admin.php" class="btn btn-primary me-2">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                            <h1 class="text-center mb-2">Thêm tài sản</h1>
                        </div>

                        <form>
                            <div class="row g-3">
                                <!-- Thông tin chung -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header fw-bold">Thông tin chung</div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="productName" class="form-label">Tên tài sản</label>
                                                <input type="text" id="productName" class="form-control"
                                                    placeholder="nhập tên tài sản">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productCode" class="form-label">Mã tài sản</label>
                                                <div class="card-header fw-bold">Thông tin bổ sung</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="assetGroup" class="form-label">Nhóm tài sản</label>
                                                        <select id="assetGroup" class="form-select">
                                                            <option selected>Chọn nhóm tài sản</option>
                                                            <option value="1">Nhóm 1</option>
                                                            <option value="2">Nhóm 2</option>
                                                            <option value="3">Nhóm 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="supplier" class="form-label">Nhà cung cấp</label>
                                                        <select id="supplier" class="form-select">
                                                            <option selected>Chọn nhà cung cấp</option>
                                                            <option value="1">Công ty A</option>
                                                            <option value="2">Công ty B</option>
                                                            <option value="3">Công ty C</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Mô tả</label>
                                                        <textarea id="description" class="form-control" rows="3"
                                                            placeholder="Nhập mô tả tài sản"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ảnh tài sản -->
                                    <div class="row g-3 mt-3">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header fw-bold">Ảnh tài sản</div>
                                                <div class="card-body text-center">
                                                    <label for="productImage" class="form-label">Kéo thả hoặc <a
                                                            href="#">tải
                                                            hình ảnh</a></label>
                                                    <input type="file" id="productImage" class="form-control"
                                                        style="max-width: 500px; margin: 0 auto;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header fw-bold">Quét</div>
                                                <div class="card-body text-center">
                                                    <button type="submit" class="btn btn-primary me-2">Quét</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="row g-3 mt-4 text-center">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-2">Lưu</button>
                                        <button type="button" class="btn btn-danger">Hủy</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

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