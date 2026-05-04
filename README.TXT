 CAFE SHOP - LARAVEL PROJECT

1. GIỚI THIỆU

Đây là hệ thống website bán hàng cafe được xây dựng bằng Laravel.
Hệ thống cho phép người dùng xem sản phẩm, thêm vào giỏ hàng và thanh toán.
Ngoài ra, hệ thống có trang quản trị (Admin) để quản lý sản phẩm, danh mục và người dùng.

2. CÔNG NGHỆ SỬ DỤNG

- Backend: Laravel 11 (PHP)
- Frontend: HTML, CSS, Blade
- Database: MySQL
- Server: XAMPP

3. CHỨC NĂNG CHÍNH

--- USER ---
- Xem trang chủ
- Xem danh mục sản phẩm
- Xem chi tiết sản phẩm
- Thêm sản phẩm vào giỏ hàng
- Cập nhật giỏ hàng
- Thanh toán
- Đăng ký / Đăng nhập

--- ADMIN ---
- Đăng nhập admin
- Dashboard (thống kê)
- Quản lý sản phẩm (CRUD)
- Quản lý danh mục
- Quản lý người dùng
- Quản lý đơn hàng


4. CÀI ĐẶT HỆ THỐNG

Bước 1: Clone project
git clone <link-project>

Bước 2: Cài đặt thư viện
composer install

Bước 3: Tạo file .env
copy .env.example thành .env

Bước 4: Cấu hình database trong .env
DB_DATABASE=cafe_store
DB_USERNAME=root
DB_PASSWORD=

Bước 5: Tạo key
php artisan key:generate

Bước 6: Migrate database
php artisan migrate

Bước 7: Chạy server
php artisan serve


5. TÀI KHOẢN MẶC ĐỊNH

ADMIN:
Email: admin@gmail.com
Password: 123456

USER:
Email: user@gmail.com
Password: 123456


6. ĐƯỜNG DẪN TRUY CẬP

Trang chủ:
http://127.0.0.1:8000/

Shop:
http://127.0.0.1:8000/shop

Giỏ hàng:
http://127.0.0.1:8000/cart

Admin:
http://127.0.0.1:8000/admin


7. CẤU TRÚC THƯ MỤC

app/
  Controllers/
  Models/

resources/
  views/

routes/
  web.php

public/
  css/
  img/


8. GHI CHÚ

- Dự án sử dụng Laravel MVC
- Có phân quyền user và admin
- Sử dụng middleware để bảo vệ route admin
- Giỏ hàng sử dụng session
