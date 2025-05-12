<?php
$conn = new mysqli("localhost", "root", "", "barcode");
$conn->set_charset('utf8mb4');

$barcode = $_GET['barcode'] ?? '';
$barcode = $conn->real_escape_string($barcode);

$sql = "SELECT * FROM full_information WHERE barcode = '$barcode'";
$kq = $conn->query($sql);

if ($kq && $kq->num_rows > 0):
  $row = $kq->fetch_assoc();

  $group = $category = $name = $nam = '';

  // nhóm tài sản
  $kqgroup = $conn->query("SELECT * FROM group_product WHERE id_group = " . $row["product_group"]);
  if ($kqgroup->num_rows > 0) {
    $group = $kqgroup->fetch_assoc()["name_group"];
  }

  // loại tài sản
  $kqcategory = $conn->query("SELECT * FROM category_product WHERE id_category = " . $row["product_category"]);
  if ($kqcategory->num_rows > 0) {
    $category = $kqcategory->fetch_assoc()["name_category"];
  }

  // tên tài sản
  $ten = strtoupper($row["product_name"]);
  $kqname = $conn->query("SELECT * FROM product WHERE id_product='$ten'");
  if ($kqname->num_rows > 0) {
    $name = $kqname->fetch_assoc()["name_product"];
  }

  // năm nhập
  $nam = '';
  $id_nam = $conn->real_escape_string($row["year_import"]);
  $kqnam = $conn->query("SELECT * FROM year_import WHERE id_year = '$id_nam'");
  if ($kqnam && $kqnam->num_rows > 0) {
    $nam = $kqnam->fetch_assoc()['year_import'];
  }

  $status = ($row["product_status"] == 'active') ? 'badge bg-success' : 'badge bg-danger';
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <<style>
    .modal {
    z-index: 1050; /* Đảm bảo cao hơn các phần tử khác */
    }

    .btn-outline-primary, .btn-outline-danger, .btn-outline-warning, .btn-outline-info {
    margin: 2px; /* Tạo khoảng cách giữa các nút */
    }

    /* Đảm bảo modal không bị che khuất */
    .modal-backdrop {
    z-index: 1040;
    }
    </style>

    <body>

      <div class="table-responsive">
        <table class="table table-hover text-center table-striped">
          <thead class="table-light">
            <tr>
              <th>TT</th>
              <th>NHÓM TÀI SẢN</th>
              <th>LOẠI TÀI SẢN</th>
              <th>TÊN TÀI SẢN</th>
              <th>NĂM NHẬP</th>
              <th>TRẠNG THÁI</th>
              <th>THÔNG TIN</th>
              <th>ĐƠN VỊ</th>
              <th>TÁC VỤ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><?= htmlspecialchars($group) ?></td>
              <td><?= htmlspecialchars($category) ?></td>
              <td><?= htmlspecialchars($name) ?></td>
              <td><?= htmlspecialchars($nam) ?></td>
              <td><span class="<?= $status ?>"><?= htmlspecialchars($row["product_status"]) ?></span></td>
              <td><?= htmlspecialchars($row["product_information"]) ?></td>
              <td><?= htmlspecialchars($row["units"]) ?></td>
              <td>
                <button class="btn btn-outline-info btn-sm" onclick="xemchitiet('<?= $row['barcode'] ?>')">
                  <i class="bi bi-eye"></i>
                </button>
                <button class="btn btn-outline-warning btn-sm" onclick="suataisan('<?= $row['barcode'] ?>')">
                  <i class="bi bi-pencil-square"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm" onclick="xoa('<?= $row['barcode'] ?>')">
                  <i class="bi bi-trash-fill"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm mt-2" onclick="thongbao('<?= $row['barcode'] ?>')">
                  <i class="bi bi-exclamation-triangle-fill"></i> Thông báo hỏng
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    <?php else: ?>
      <div class="alert alert-danger text-center">Không tìm thấy tài sản.</div>
    <?php endif; ?>
    <!-- Modal chung -->
    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modalbody">
            <div class="text-center">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal xác nhận xóa -->
    <div class="modal fade" id="modalXoa" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Xác nhận xóa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Bạn có chắc chắn muốn xóa tài sản này?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn-danger" id="btnXacNhanXoa">Xóa</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal thông báo hỏng -->
    <div class="modal fade" id="modalthongbao" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">BÁO CÁO TÀI SẢN HỎNG</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modalbodythongbao">
            <div class="text-center">
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
    <script>
      function xemchitiet(barcode) {
        $('#modal').modal('show');
        $('#modal .modal-title').text('CHI TIẾT TÀI SẢN');
        $('#modalbody').load('xemchitiet.php?barcode=' + barcode);
      }

      function suataisan(barcode) {
        $('#modal').modal('show');
        $('#modal .modal-title').text('CẬP NHẬT TÀI SẢN');
        $('#modalbody').load('suataisan.php?barcode=' + barcode);
      }

      function xoa(barcode) {
        $('#modalXoa').modal('show');
        $('#btnXacNhanXoa').off('click').on('click', function() {
          $.post('xoataisan.php', {
            barcode: barcode
          }, function() {
            location.reload();
          });
        });
      }

      function thongbao(barcode) {
        $('#modalthongbao').modal('show');
        $('#modalbodythongbao').load('taisanhong.php?barcode=' + barcode);
      }
    </script>
    </body>

  </html>
