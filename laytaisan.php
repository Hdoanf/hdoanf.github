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
