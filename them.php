<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

// Các truy vấn SQL
$category_product = "SELECT * FROM category_product";
$group_product = "SELECT * FROM group_product";
$product = "SELECT * FROM product";
$status_product = "SELECT * FROM status_product";
$units = "SELECT * FROM units ORDER BY CASE WHEN units = 'Chưa phân lớp' THEN 0 ELSE 1 END, units";
$year_import = "SELECT * FROM year_import";

// Thực thi truy vấn
$kqcate = $conn->query($category_product);
$kqgroup = $conn->query($group_product);
$kqproduct = $conn->query($product);
$kqstatus = $conn->query($status_product);
$kqunits = $conn->query($units);
$kqyear = $conn->query($year_import);

// Xử lý khi submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Kiểm tra nếu là AJAX request
  $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

  $loaits = $conn->real_escape_string($_POST['product_category']);
  $taisan = $conn->real_escape_string($_POST['product']);
  $nhomts = $conn->real_escape_string($_POST['product_group']);
  $trangthai = $conn->real_escape_string($_POST['product_status']);
  $donvi = $conn->real_escape_string($_POST['units']);
  $nam = $conn->real_escape_string($_POST['year_import']);
  $baohanh = $conn->real_escape_string($_POST['thoihan_baohanh']);
  $info = $conn->real_escape_string($_POST['thongtin']);

  // Tìm item lớn nhất
  $sqlMaxItem = "SELECT MAX(item) AS max_item FROM full_information 
                 WHERE product_category = '$loaits' 
                 AND product_name = '$taisan' 
                 AND product_group = '$nhomts' 
                 AND year_import = '$nam'";

  $result = $conn->query($sqlMaxItem);
  $maxItem = 0;

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maxItem = intval($row["max_item"]);
  }

  $newItem = str_pad($maxItem + 1, 4, "0", STR_PAD_LEFT);
  $barcode = $nhomts . $loaits . $taisan . $nam . $newItem;

  // Thêm vào CSDL
  $sqlInsert = "INSERT INTO `full_information`
                (`product_group`, `product_category`, `product_name`, `year_import`, `item`,
                `barcode`,`product_information`,`Warranty_Period`, `product_status`, `units`, `note`)
                VALUES ('$nhomts','$loaits','$taisan','$nam','$newItem',
                '$barcode','$info','$baohanh','$trangthai','$donvi','')";

  $kqInsert = $conn->query($sqlInsert);

  if ($isAjax) {
    // Trả về JSON nếu là AJAX request
    header('Content-Type: application/json');
    if ($kqInsert) {
      echo json_encode(['success' => true, 'message' => 'Thêm tài sản thành công']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Lỗi khi thêm tài sản: ' . $conn->error]);
    }
    exit();
  }
}

// Phần hiển thị form giữ nguyên như trước
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Tài Sản</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-4">
    <h2 class="text-center">Thêm Tài Sản</h2>
    <form method="POST" action="them.php">
      <div class="row">
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header bg-primary text-white">Thông tin chung</div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Nhóm tài sản</label>
                <select class="form-select" name="product_group" id="product_group" required>
                  <option value="">-- Chọn nhóm tài sản --</option>
                  <?php foreach ($kqgroup as $gr): ?>
                    <option value="<?= $gr['id_group'] ?>"><?= $gr['name_group'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Phân loại tài sản</label>
                <select class="form-select" name="product_category" id="product_category" required disabled>
                  <option value="">-- Chọn phân loại tài sản --</option>
                  <?php foreach ($kqcate as $cate): ?>
                    <option value="<?= $cate['id_category'] ?>"
                      data-group="<?= $cate['group_id'] ?? '0' ?>">
                      <?= $cate['name_category'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Tên tài sản</label>
                <select class="form-select" name="product" id="product" required disabled>
                  <option value="">-- Chọn tài sản --</option>
                  <?php foreach ($kqproduct as $pro): ?>
                    <option value="<?= $pro['id_product'] ?>"
                      data-category="<?= $pro['category_id'] ?? '0' ?>">
                      <?= $pro['name_product'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Đơn vị sở hữu</label>
                <select class="form-select" name="units">
                  <?php foreach ($kqunits as $unt): ?>
                    <option value="<?= $unt['id_units'] ?>"><?= $unt['units'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-header bg-success text-white">Thông tin bổ sung</div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label">Trạng thái sản phẩm</label>
                <select class="form-select" name="product_status">
                  <?php foreach ($kqstatus as $sta): ?>
                    <option value="<?= $sta['status_product'] ?>"><?= $sta['status_product'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Năm nhập</label>
                <select class="form-select" name="year_import">
                  <?php foreach ($kqyear as $year): ?>
                    <option value="<?= $year['id_year'] ?>"><?= $year['year_import'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Thời hạn bảo hành</label>
                <input required type="date" class="form-control" name="thoihan_baohanh">
              </div>
              <div class="mb-3">
                <label class="form-label">Thông tin sản phẩm</label>
                <textarea class="form-control" name="thongtin"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="reset" class="btn btn-danger">Hủy</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const groupSelect = document.getElementById('product_group');
      const categorySelect = document.getElementById('product_category');
      const productSelect = document.getElementById('product');

      // Lưu các option thực tế (bỏ qua option mặc định đầu tiên)
      const allCategories = Array.from(categorySelect.querySelectorAll('option:not([value=""])'));
      const allProducts = Array.from(productSelect.querySelectorAll('option:not([value=""])'));

      // Xử lý khi chọn nhóm tài sản
      groupSelect.addEventListener('change', function() {
        const selectedGroup = this.value;

        // Reset các select phía sau
        categorySelect.innerHTML = '<option value="">-- Chọn pHân loại tài sản --</option>'; // Chỉ thêm 1 lần
        productSelect.innerHTML = '<option value="">-- Chọn tài sản --</option>';
        productSelect.disabled = true;

        if (selectedGroup) {
          // Lọc danh mục theo nhóm được chọn
          allCategories.forEach(option => {
            if (option.dataset.group === selectedGroup) {
              categorySelect.appendChild(option.cloneNode(true));
            }
          });

          categorySelect.disabled = false;
        } else {
          categorySelect.disabled = true;
        }
      });

      // Xử lý khi chọn loại tài sản
      categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value;

        // Reset select sản phẩm
        productSelect.innerHTML = '<option value="">-- Chọn tài sản --</option>';

        if (selectedCategory) {
          // Lọc sản phẩm theo danh mục được chọn
          allProducts.forEach(option => {
            if (option.dataset.category === selectedCategory) {
              productSelect.appendChild(option.cloneNode(true));
            }
          });

          productSelect.disabled = false;
        } else {
          productSelect.disabled = true;
        }
      });
    });
  </script>
</body>

</html>
