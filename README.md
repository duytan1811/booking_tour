<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Cài đặt môi trường

- Cài đăt [Laragon v6]()
- Cài đặt [Composer](https://getcomposer.org/Composer-Setup.exe)
- Cài đặt [NodeJS](https://nodejs.org/dist/v20.19.0/node-v20.19.0-x64.msi)


## Chạy dự án
Tạo database
- Mở laragon hoặc xampp hoặc wampp <br>
Tạo database với tên **booking_tour**

Mở thư mục chứa dự án và mở terminal

- Bước 1: **npm i --force**
- Bước 2: **npm run dev**
- Bước 3: **composer install**
- Bước 4: **copy .env.example .env**
Mở file .env vừa được sao chép <br>
Tìm đếm **DB_DATABASE** sửa thành **DB_DATABASE=booking_tour**
- Bước 5: **php artisan key:generate**
- Bước 6: **php artisan migrate --seed**
- Bước 7: **php artisan ser**
- Bước 8: Mở trình duyệt nhập địa chỉ **https://localhost:8000**

