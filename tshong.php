<?php

session_start();
if ($_SESSION['admin'] !== 'admin') {
  header("Location: dangnhap.php");
  exit();
}

// Kết nối database
$conn = new mysqli("localhost", "root", "", "barcode");
if ($conn->connect_error) die("Kết nối thất bại: " . $conn->connect_error);
$conn->set_charset('utf8mb4');

// Lấy dữ liệu thống kê
$sql = "SELECT 
            yi.year_import as year,
            p.name_product as product_name,
            COUNT(fi.barcode) as total_assets,
            SUM(CASE WHEN fi.product_status IN ('maintenance', 'inactive') THEN 1 ELSE 0 END) as broken_assets
        FROM full_information fi
        LEFT JOIN year_import yi ON fi.year_import = yi.id_year
        LEFT JOIN product p ON fi.product_name = p.id_product
        GROUP BY yi.year_import, p.name_product
        ORDER BY yi.year_import, total_assets DESC";

$result = $conn->query($sql);

// Tổ chức dữ liệu theo năm
$yearlyData = [];
while ($row = $result->fetch_assoc()) {
  $year = $row['year'];
  if (!isset($yearlyData[$year])) {
    $yearlyData[$year] = [
      'total' => 0,
      'broken' => 0,
      'products' => []
    ];
  }

  $yearlyData[$year]['total'] += $row['total_assets'];
  $yearlyData[$year]['broken'] += $row['broken_assets'];
  $yearlyData[$year]['products'][] = [
    'name' => $row['product_name'],
    'total' => $row['total_assets'],
    'broken' => $row['broken_assets']
  ];
}

// Kiểm tra nếu có yêu cầu xuất Excel
if (isset($_GET['export'])) {
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=bao_cao_taisan.xls");

  echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
          xmlns:x="urn:schemas-microsoft-com:office:excel"
          xmlns="http://www.w3.org/TR/REC-html40">
    <head>
        <meta charset="UTF-8">
        <style>
            table { border-collapse: collapse; width: 100%; }
            th, td { border: 1px solid black; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            .chart-container { margin-top: 30px; }
            .year-section { margin-bottom: 30px; page-break-inside: avoid; }
            h2 { color: #1a5276; }
        </style>
    </head>
    <body>';

  foreach ($yearlyData as $year => $data) {
    echo '<div class="year-section">
                <h2>Năm: ' . $year . '</h2>
                <p><strong>Tổng tài sản:</strong> ' . $data['total'] . '</p>
                <p><strong>Tài sản hỏng:</strong> ' . $data['broken'] . '</p>
                
                <table>
                    <tr>
                        <th>Tên tài sản</th>
                        <th>Số lượng</th>
                        <th>Số lượng hỏng</th>
                    </tr>';

    foreach ($data['products'] as $product) {
      echo '<tr>
                    <td>' . $product['name'] . '</td>
                    <td>' . $product['total'] . '</td>
                    <td>' . $product['broken'] . '</td>
                  </tr>';
    }

    echo '</table></div>';
  }

  echo '</body></html>';
  exit;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Báo cáo tài sản theo năm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <style>
    .modalcao {
      z-index: 1060 !important;

    }

    .modal-backdropcao {
      z-index: 1050 !important;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .year-section {
      margin-bottom: 40px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
    }

    h2 {
      color: #1a5276;
      border-bottom: 2px solid #3498db;
      padding-bottom: 5px;
    }

    .stats {
      display: flex;
      margin-bottom: 20px;
    }

    .stat-box {
      flex: 1;
      padding: 15px;
      margin: 0 10px;
      background: #f8f9fa;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .stat-box h3 {
      margin-top: 0;
      color: #2c3e50;
    }

    .chart-container {
      height: 400px;
      margin-bottom: 30px;
      position: relative;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #3498db;
      color: white;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    .export-btn {
      display: block;
      width: 200px;
      margin: 30px auto;
      padding: 12px;
      background: #2ecc71;
      color: white;
      text-align: center;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
    }

    .export-btn:hover {
      background: #27ae60;
    }
  </style>
</head>



<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="admin.php">
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
            <a class="nav-link active" href=""><i class="bi bi-house-door"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <div class="dropdown dropstart text-end">
              <button type="button" class="btn btn-primary dropdown-toggle d-flex align-items-center"
                data-bs-toggle="dropdown">
                <i class="bi bi-person-circle mb-0 ms-2 "></i>
                <p class="mb-0 ms-2"><?php $user = $_SESSION['user'];
                                      echo $user ?></p>
              </button>
              <ul class="dropdown-menu">

                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column ">
            <li class="nav-item ">
              <a class="nav-link " href="admin.php">
                <i class="bi bi-grid-1x2"></i> Tài sản
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="quanlynguoidung.php">
                Quản lý người dùng/Khoa
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="taisan.php">
                Mục tài sản đã có sẵn
              </a>
            </li>
            <li class="nav-item nav-pills ">
              <div>
                <button class="btn nav-link active" type="button" data-bs-toggle="collapse"
                  data-bs-target="#themtaisan" aria-expanded="false" aria-controls="themtaisan">
                  Báo cáo
                </button>
                <div class="collapse" id="themtaisan">
                  <ul class="nav">
                    <li class="nav-item ms-2 mt-1 nav-pills ">
                      <a class="nav-link active" href="tshong.php">
                        Báo cáo hỏng
                      </a>
                    </li>
                    <li class="nav-item ms-2 ">
                      <a class="nav-link " href="tsdichuyen.php">
                        Báo cáo di chuyển tài sản
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lichsu.php">
                Lịch sử
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kho.php">
                Kho
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hienthithongbao.php">
                Thông Báo
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="caidat.php">
                <i class="bi bi-gear"></i> Cài đặt
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- chỗ tìm kiếm -->
        <div class="card mt-3">
          <div class="card-body">
            <h2 class="card-title mb-4">Báo cáo hỏng</h2>
            <div class="row g-2 mb-4">
              <div class="col-md-2">
                <a href="baocao.php" class="btn btn-info w-100">Xuất báo cáo</a>
              </div>

            </div>
            <!-- bảng render từ database -->
            <div class="table-responsive " style="overflow-y:scroll;height:65vh;">
              <div>
                <h1>BÁO CÁO TÀI SẢN THEO NĂM</h1>

                <?php foreach ($yearlyData as $year => $data): ?>
                  <div class="year-section">
                    <h2>Năm: <?= $year ?></h2>

                    <div class="stats">
                      <div class="stat-box">
                        <h3>Tổng tài sản</h3>
                        <p><?= $data['total'] ?></p>
                      </div>
                      <div class="stat-box">
                        <h3>Tài sản hỏng</h3>
                        <p><?= $data['broken'] ?></p>
                      </div>
                    </div>

                    <div class="chart-container">
                      <canvas id="chart-<?= $year ?>"></canvas>
                    </div>

                    <h3>Chi tiết tài sản</h3>
                    <table>
                      <thead>
                        <tr>
                          <th>Tên tài sản</th>
                          <th>Số lượng</th>
                          <th>Số lượng hỏng</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data['products'] as $product): ?>
                          <tr>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['total'] ?></td>
                            <td><?= $product['broken'] ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>

                  <script>
                    // Đảm bảo DOM đã load trước khi tạo biểu đồ
                    document.addEventListener('DOMContentLoaded', function() {
                      // Tạo ID canvas an toàn
                      const safeYear = '<?= preg_replace('/[^a-zA-Z0-9]/', '', $year) ?>';
                      const canvasId = 'chart-' + safeYear;

                      // Lấy context canvas
                      const ctx = document.getElementById(canvasId);
                      if (!ctx) return;

                      // Chuẩn bị dữ liệu
                      const labels = [];
                      const totalData = [];
                      const brokenData = [];

                      <?php foreach ($data['products'] as $product): ?>
                        labels.push('<?= addslashes($product['name']) ?>');
                        totalData.push(<?= $product['total'] ?>);
                        brokenData.push(<?= $product['broken'] ?>);
                      <?php endforeach; ?>

                      // Tạo biểu đồ
                      new Chart(ctx, {
                        type: 'bar',
                        data: {
                          labels: labels,
                          datasets: [{
                              label: 'Tổng số lượng',
                              data: totalData,
                              backgroundColor: 'rgba(54, 162, 235, 0.7)',
                              borderColor: 'rgba(54, 162, 235, 1)',
                              borderWidth: 1
                            },
                            {
                              label: 'Số lượng hỏng',
                              data: brokenData,
                              backgroundColor: 'rgba(255, 99, 132, 0.7)',
                              borderColor: 'rgba(255, 99, 132, 1)',
                              borderWidth: 1
                            }
                          ]
                        },
                        options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          scales: {
                            y: {
                              beginAtZero: true,
                              title: {
                                display: true,
                                text: 'Số lượng'
                              },
                              ticks: {
                                stepSize: 1
                              }
                            },
                            x: {
                              title: {
                                display: true,
                                text: 'Tên tài sản'
                              },
                              ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 45
                              }
                            }
                          },
                          plugins: {
                            legend: {
                              position: 'top',
                            },
                            title: {
                              display: true,
                              text: 'Thống kê tài sản năm <?= $year ?>'
                            }
                          }
                        }
                      });
                    });
                  </script>
                <?php endforeach; ?>
              </div>

            </div>
          </div>
        </div>
    </div>

  </div>
</body>

</html>
