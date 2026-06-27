# Dokumentasi Instalasi (Manajemen Pembukuan Usaha)

Mengingat bahwa Anda tidak memiliki `composer` yang terinstall di perangkat Anda saat ini, berikut adalah langkah-langkah untuk menyiapkan environment dan menjalankan aplikasi ini:

## 1. Persiapan Environment
1. **Install XAMPP / Laragon** yang mendukung **PHP 8.3**.
2. **Install Composer**: Unduh dari [getcomposer.org](https://getcomposer.org/download/) dan install.
3. **Install Node.js & NPM**: Unduh dari [nodejs.org](https://nodejs.org/) untuk keperluan frontend assets.

## 2. Inisialisasi Proyek (Setelah Composer Terinstall)
Buka terminal/PowerShell di direktori ini (`c:\Users\Windows 11\Downloads\menejemen pembukaan usaha`) dan jalankan:
```bash
composer create-project laravel/laravel .
```
*(Catatan: Anda mungkin perlu memindahkan file-file source code (app, database, routes, resources) yang telah saya buat ini, kemudian membuat project laravel baru, lalu meniban (overwrite) folder-folder tersebut dengan source code ini).*

## 3. Instalasi Dependensi
Jalankan perintah berikut:
```bash
composer require spatie/laravel-permission spatie/laravel-activitylog yajra/laravel-datatables realrashid/sweet-alert
npm install
npm run build
```

## 4. Konfigurasi Database
1. Buka file `.env` (copy dari `.env.example`).
2. Buat database di MySQL (misal: `db_pembukuan_umkm`).
3. Sesuaikan konfigurasi `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_pembukuan_umkm
DB_USERNAME=root
DB_PASSWORD=
```

## 5. Migrasi & Seeder Database
```bash
php artisan migrate:fresh --seed
```
*Ini akan membuat tabel dan mengisi akun default (Owner, Admin, Staff).*

## 6. Menjalankan Aplikasi
```bash
php artisan serve
```
Aplikasi akan berjalan di `http://127.0.0.1:8000`.
