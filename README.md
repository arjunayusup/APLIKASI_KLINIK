Aplikasi Manajemen Klinik - Laravel 8
Aplikasi web untuk manajemen klinik dengan sistem multi-role (pendaftaran, perawat, dokter, apoteker) menggunakan Laravel 8 dengan autentikasi custom.

#FITUR UTAMA
Sistem login custom tanpa menggunakan bawaan Laravel

Manajemen data pasien (oleh staff pendaftaran)

Pemeriksaan fisik oleh perawat (berat badan, tekanan darah)

Diagnosa oleh dokter (keluhan, hasil diagnosa)

Manajemen resep obat oleh apoteker

Tampilan berbeda untuk setiap role pengguna

#PERSYARATAN SYSTEM
PHP 7.4 atau lebih baru
Composer
MySQL 5.7+

#INSTALASI
Clone repository:
git clone https://github.com/username/APLIKASI_KLINIK.git
cd APLIKASI_KLINIK
composer install
cp .env.example .env
php artisan key:generate

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_klinik
DB_USERNAME=username_db
DB_PASSWORD=password_db

#MENJALANKAN APLIKASI_KLINIK
php artisan migrate
php artisan db:seed --class=UsersTableSeeder
php artisan serve

#BUKA BROWSER
http://localhost:8000

#AKUN DEFAULT
Berikut akun default yang sudah disediakan oleh sistem:

Staff Pendaftaran
Username: pendaftaran
Password: password

Perawat
Username: perawat
Password: password

Dokter
Username: dokter
Password: password

Apoteker
Username: apoteker
Password: password


Terima Kasih...
