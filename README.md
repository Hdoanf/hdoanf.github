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
- `assets/` — CSS, JS
- `sql/` — file dump database (`barcode.sql`)
- `them/`, `delete/` — các trang xử lý thêm/xoá dữ liệu
- `vendor/` — thư viện composer, tự sinh bằng `composer install`, không commit lên git
