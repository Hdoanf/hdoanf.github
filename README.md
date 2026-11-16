# Hệ thống Quản lý Tài sản & Mã vạch (Asset Management)

Hệ thống quản lý, phân bổ tài sản, thiết bị cho các phòng ban, tích hợp in và quét mã vạch Barcode (Code 128), theo dõi lịch sử biến động và báo cáo sự cố hư hỏng.

---

## 1. Yêu cầu hệ thống

- **PHP**: Phiên bản 8.0 trở lên (bật các extension `mysqli`, `pdo_mysql`, `gd`, `zip`).
- **Composer**: [getcomposer.org](https://getcomposer.org/) để cài đặt dependencies.
- **Cơ sở dữ liệu**: MariaDB hoặc MySQL (cổng mặc định `3306`).
- Trình duyệt hiện đại hỗ trợ HTML5 (để quét barcode camera nếu cần).

---

## 2. Hướng dẫn cài đặt & Khởi chạy dự án

### Bước 1: Cài đặt thư viện dependencies

Di chuyển vào thư mục dự án và chạy Composer:

```bash
composer install
```

*(Các thư viện chính gồm: `picqer/php-barcode-generator`, `phpoffice/phpword`, `phpoffice/phpspreadsheet`).*

### Bước 2: Thiết lập Cơ sở dữ liệu

1. Khởi động MySQL/MariaDB server trên máy của bạn.
2. Tạo cơ sở dữ liệu có tên `barcode`:
   ```sql
   CREATE DATABASE barcode CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. Import file dữ liệu mẫu từ thư mục `sql/`:
   ```bash
   mysql -u root -p barcode < sql/barcode.sql
   ```
4. Kiểm tra cấu hình kết nối trong file **`config.php`**:
   ```php
   $servername = "127.0.0.1";
   $username = "root";
   $password = ""; // Điền mật khẩu MySQL nếu có
   $dbname = "barcode";
   $port = 3306;
   ```

### Bước 3: Khởi động Web Server

Bạn có thể sử dụng PHP built-in server tích hợp sẵn:

```bash
php -d extension=mysqli -S 127.0.0.1:8000
```

*(Hoặc cấu hình qua XAMPP, Laragon, WampServer bằng cách trỏ Document Root về thư mục dự án).*

---

## 3. Truy cập & Tài khoản đăng nhập

- **Địa chỉ truy cập**: [http://127.0.0.1:8000/pages/dangnhap.php](http://127.0.0.1:8000/pages/dangnhap.php)
- **Tài khoản mẫu có sẵn trong database**:
  - **Quản trị viên (Admin)**:
    - Tài khoản: `admin1` | Mật khẩu: `admin123`
    - Tài khoản: `admin2` | Mật khẩu: `securepass`
  - **Người dùng (User)**:
    - Tài khoản: `user1` | Mật khẩu: `user123`
    - Tài khoản: `user2` | Mật khẩu: `pass456`

---

## 4. Cấu trúc thư mục

```text
├── actions/             # Các API backend xử lý thêm, xóa, cập nhật, xuất báo cáo
│   ├── them/            # Thêm người dùng, loại, nhóm tài sản
│   └── delete/          # Xóa người dùng, tài sản, thông báo
├── assets/              # Tài nguyên tĩnh
│   ├── dashboard-craft.css # Hệ thống giao diện hiện đại
│   └── main.js          # Logic AJAX, quét barcode, gọi modal
├── pages/               # Giao diện chức năng
│   ├── dangnhap.php     # Màn hình đăng nhập hệ thống
│   ├── admin.php        # Dashboard tổng quan tài sản (KPI & Danh sách)
│   ├── quanlynguoidung.php # Quản lý người dùng & phân quyền
│   ├── taisan.php       # Danh mục loại & nhóm tài sản
│   ├── kho.php          # Kho lưu trữ, thu hồi tài sản
│   ├── tshong.php       # Báo cáo sự cố, tài sản hỏng
│   ├── tsdichuyen.php   # Báo cáo điều chuyển đơn vị
│   ├── lichsu.php       # Nhật ký biến động tài sản
│   ├── hienthithongbao.php # Trung tâm tiếp nhận phản ánh từ đơn vị
│   └── caidat.php       # Cài đặt hệ thống & giao diện tối (Dark mode)
├── sql/
│   └── barcode.sql      # File dump cấu trúc và dữ liệu mẫu
├── config.php           # Cấu hình kết nối cơ sở dữ liệu dùng chung
├── composer.json        # Định nghĩa các thư viện phụ thuộc
└── README.md            # Tài liệu hướng dẫn
```
