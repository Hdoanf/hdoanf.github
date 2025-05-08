<?php
require_once 'vendor/autoload.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();

// Tiêu de
$section->addText("TRƯỜNG ĐẠI HỌC", ['bold' => true], ['alignment' => 'center']);
$section->addText("CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM", ['bold' => true], ['alignment' => 'center']);
$section->addText("Độc lập - Tự do - Hạnh phúc", ['bold' => true], ['alignment' => 'center']);
$section->addTextBreak(1);

// Ngày tháng
$section->addText("Hà Nội, ngày ........ tháng 03 năm 2025", [], ['alignment' => 'right']);
$section->addTextBreak(1);

// Tiêu đề báo cáo
$section->addText("BÁO CÁO TÀI SẢN", ['bold' => true, 'size' => 14], ['alignment' => 'center']);
$section->addTextBreak(1);

// Thêm các thông tin cá nhân
$section->addText("Họ và tên: .....................................................");
$section->addText("Chức vụ: .....................................................");
$section->addText("Bộ phận công tác: .....................................................");
$section->addText("Thời gian thực hiện: .....................................................");
$section->addTextBreak(1);

// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barcode";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset('utf8mb4');

$sql = "SELECT * FROM `full_information` WHERE `product_status` LIKE 'maintenance'";
$kq = $conn->query($sql);

// Tạo bảng
$styleTable = ['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80];
$phpWord->addTableStyle('AssetTable', $styleTable);
$table = $section->addTable('AssetTable');

// Tiêu đề cột
$table->addRow();
$table->addCell(1000)->addText("STT");
$table->addCell(2000)->addText("NGÀY");
$table->addCell(4000)->addText("TÊN TÀI SẢN");
$table->addCell(4000)->addText("ĐÁNH GIÁ CỦA PHỤ TRÁCH BỘ PHẬN");
$table->addCell(4000)->addText("Don vi chiu trach nghiem");
$table->addCell(4000)->addText("Ca nhan chiu trach nghiem");
// Thêm dữ liệu vào bảng
$stt = 1;
while ($row = $kq->fetch_assoc()) {
  $name = strtoupper($row["product_name"]);
  $units = "Kho";
  $date = date("Y/m/d");
  $status = $row["product_status"];
  $sat = "";
  if ($status == "maintenance") {
    $sat  = "Bao tri";
  }
  $table->addRow();
  $table->addCell(1000)->addText($stt++);
  $table->addCell(2000)->addText($date);
  $table->addCell(4000)->addText($name);
  $table->addCell(4000)->addText($sat);
  $table->addCell(4000)->addText($units);
  $table->addCell(4000)->addText("khong co");
}

// Xuống dòng trước khi thêm chữ ký
$section->addTextBreak(2);

// Thêm dòng chữ ký
$table = $section->addTable();
$table->addRow();
$table->addCell(5000)->addText("PHỤ TRÁCH BỘ PHẬN", ['bold' => true], ['alignment' => 'center']);
$table->addCell(5000)->addText("NGƯỜI BÁO CÁO", ['bold' => true], ['alignment' => 'center']);

// Xuất file Word
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="baocao.docx"');

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');
