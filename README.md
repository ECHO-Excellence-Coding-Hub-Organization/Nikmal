# Laravel Project

Proyek ini adalah aplikasi yang dibangun dengan Laravel. Berikut adalah panduan untuk menginstal dan menjalankan aplikasi ini di mesin lokal Anda.

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut:

- **PHP** (versi 7.3 atau lebih tinggi)
- **Composer** (untuk mengelola dependensi PHP)
- **MySQL** atau database lain yang didukung Laravel
- **Laravel Installer** (opsional, jika ingin menggunakan perintah `laravel new`)

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi Laravel:

### 1. Clone Repositori

Mulailah dengan meng-clone repositori ini ke komputer lokal Anda:

```bash
git clone https://github.com/ECHO-Excellence-Coding-Hub-Organization/Nikmal.git
cd repository


composer install

cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=renta-car
DB_USERNAME=root
DB_PASSWORD=secret

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve


user admin
email admin@gmail.com
password admin

user super admin
email superadmin@gmail.com
password superadmin
