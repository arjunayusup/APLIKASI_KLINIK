Aplikasi Manajemen Klinik - Laravel 8
<br>
Aplikasi web untuk manajemen klinik dengan sistem multi-role (pendaftaran, perawat, dokter, apoteker) menggunakan Laravel 8 dengan autentikasi custom.
<br>
<br>
#FITUR UTAMA
<br>
- Sistem login custom tanpa menggunakan bawaan Laravel

- Manajemen data pasien (oleh staff pendaftaran)

- Pemeriksaan fisik oleh perawat (berat badan, tekanan darah)

- Diagnosa oleh dokter (keluhan, hasil diagnosa)

- Manajemen resep obat oleh apoteker

- Tampilan berbeda untuk setiap role pengguna
<br>
<br>
#PERSYARATAN SYSTEM
<br>

- PHP 7.4 atau lebih baru

- Composer

- MySQL 5.7+
<br>
<br>
#INSTALASI
<br>
Clone repository:
<br>

- git clone https://github.com/username/APLIKASI_KLINIK.git

- cd APLIKASI_KLINIK

- composer install

- cp .env.example .env

- php artisan key:generate
<br>
<br>
#SETTING DATABASE

DB_CONNECTION=mysql
<br>
DB_HOST=127.0.0.1
<br>
DB_PORT=3306
<br>
DB_DATABASE=nama_database_klinik
<br>
DB_USERNAME=username_db
<br>
DB_PASSWORD=password_db
<br>
<br>

#MENJALANKAN APLIKASI_KLINIK
<br>

- php artisan migrate

- php artisan db:seed --class=UsersTableSeeder

- php artisan serve
<br>
<br>
#BUKA BROWSER
<br>

- http://localhost:8000

<br>
<br>
#AKUN DEFAULT
<br>
Berikut akun default yang sudah disediakan oleh sistem:
<br>
<br>
Staff Pendaftaran
<br>

- Username: pendaftaran

- Password: password

Perawat

- Username: perawat

- Password: password

Dokter

- Username: dokter

- Password: password

Apoteker

- Username: apoteker

- Password: password

<br>
Terima Kasih...
