# 📋 Surat Kelurahan — Laravel

Aplikasi web sederhana untuk mengelola data surat kelurahan beserta data penduduk, dibangun menggunakan **Laravel 13**.

## 📌 Fitur

- Menampilkan daftar surat dengan relasi ke data penduduk
- Data penduduk (NIK, Nama, Jenis Kelamin, Alamat)
- Data surat (Nomor Surat, Jenis Surat, Tanggal Ajuan)
- Database seeder untuk data contoh

## 🔧 Prasyarat

Pastikan sudah terinstall di sistem kamu:

- PHP >= 8.3
- Composer
- MySQL / MariaDB
- Node.js & NPM
- Git

## 🚀 Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/Renaldi710/pweb.git
cd pweb
```

### 2. Install Dependensi PHP

```bash
composer install
```

### 3. Install Dependensi Node.js

```bash
npm install
```

### 4. Salin File Environment

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Buka file `.env`, lalu sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pweb
DB_USERNAME=root
DB_PASSWORD=
```

> ⚠️ Pastikan database `pweb` sudah dibuat terlebih dahulu di MySQL/MariaDB.

### 7. Jalankan Migrasi & Seeder

```bash
php artisan migrate --seed
```

Perintah ini akan membuat tabel `penduduks` dan `surats`, serta mengisi data contoh dari seeder.

### 8. Build Asset Frontend

```bash
npm run build
```

### 9. Jalankan Server

```bash
php artisan serve
```

Aplikasi berjalan di: **http://localhost:8000**

## 🗂️ Struktur Penting

```
app/
├── Http/Controllers/
│   └── SuratController.php
├── Models/
│   ├── Penduduk.php
│   └── Surat.php
database/
├── migrations/
│   ├── ..._create_penduduks_table.php
│   └── ..._create_surats_table.php
├── seeders/
│   ├── DatabaseSeeder.php
│   ├── PendudukSeeder.php
│   └── SuratSeeder.php
resources/views/
│   ├── welcome.blade.php
│   └── surat.blade.php
routes/
│   └── web.php
```

## 🌐 Route yang Tersedia

| Method | URL      | Keterangan                  |
|--------|----------|-----------------------------|
| GET    | `/`      | Halaman welcome Laravel     |
| GET    | `/surat` | Halaman daftar surat        |

## 📝 Lisensi

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
