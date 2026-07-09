# hdoanf.github
các thư viện yêu cầu
! cài các thư viện bằng : composer https://getcomposer.org/

1 php barcode  
```
composer require picqer/php-barcode-generator
```
2 php word
```
composer require phpoffice/phpword
 ```

## Cấu trúc thư mục

- `config.php` — kết nối database dùng chung (chỉnh sửa nếu server/user/pass khác)
- `pages/` — các trang giao diện chính (đăng nhập, tài sản, kho, người dùng...)
- `actions/` — script xử lý backend không có giao diện chính (xuất báo cáo, thêm/xoá qua modal)
  - `actions/them/` — xử lý thêm loại/nhóm/danh mục tài sản
  - `actions/delete/` — xử lý xoá người dùng/tài sản
- `assets/` — CSS, JS dùng chung
- `sql/` — file dump database (`barcode.sql`)
- `vendor/` — thư viện composer, tự sinh bằng `composer install`, không commit lên git

Trang vào đầu tiên: `pages/dangnhap.php`.
