<div align="center">

<img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel" width="80"/>

<img src="https://filamentphp.com/favicon/apple-touch-icon.png" alt="Filament" width="80"/>

# 📦 Inventory Management System

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-5-F59E0B?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

Inventory Management System built with **Laravel 12** and **Filament 5** featuring automatic stock management, dashboard analytics, inventory transactions, and modern admin panel.

</div>


---


# 📦 Inventory Management System

Inventory Management System adalah aplikasi manajemen inventaris barang yang dikembangkan menggunakan **Laravel 12** dan **Filament 5**. Aplikasi ini dirancang untuk membantu pengelolaan data barang, kategori, supplier, serta transaksi barang masuk dan keluar secara efisien melalui dashboard admin yang modern.

Sistem juga menyediakan pembaruan stok secara otomatis menggunakan **Laravel Observer**, dashboard statistik, grafik pergerakan stok, dan fitur ekspor data sehingga memudahkan proses monitoring inventaris.

---

## 🚀 Features

### 📊 Dashboard

- Total Barang
- Total Kategori
- Stok Menipis
- Grafik Barang Masuk & Barang Keluar

### 📦 Master Data

- CRUD Barang
- CRUD Kategori
- CRUD Supplier

### 🔄 Inventory Transaction

- Barang Masuk
- Barang Keluar
- Update stok otomatis
- Validasi stok agar tidak bernilai negatif

### 📈 Monitoring

- Dashboard Statistics
- Stock Movement Chart
- Low Stock Indicator

### 📑 Additional Features

- Relation Manager
- Export Excel
- Responsive Admin Panel
- Authentication (Filament Panel)

---

## 🛠 Tech Stack

- Laravel 12
- Filament 5
- PHP 8+
- MySQL
- Livewire
- Tailwind CSS
- Laravel Eloquent ORM

---

## 📂 Database Structure

- Barang
- Kategori
- Supplier
- Barang Masuk
- Barang Keluar

---

## ⚙️ Installation

Clone repository

```bash
git clone https://github.com/daffarsp/inventaris_filament.git
```

Masuk ke folder project

```bash
cd inventaris_filament
```

Install dependency

```bash
composer install
```

Copy environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Konfigurasi database pada file **.env**

Kemudian jalankan

```bash
php artisan migrate
```

Buat akun Filament

```bash
php artisan make:filament-user
```

Jalankan server

```bash
php artisan serve
```

Buka

```
http://127.0.0.1:8000/admin
```

---

## 📊 Dashboard Features

Dashboard menampilkan informasi secara real-time:

- 📦 Total Barang
- 🗂 Total Kategori
- ⚠ Barang dengan stok ≤ 10
- 📈 Grafik barang masuk dan keluar selama 6 bulan terakhir

---

## 📦 Inventory Modules

### Barang

- Tambah Barang
- Edit Barang
- Hapus Barang
- Kode Barang
- Harga Pokok
- Harga Jual
- Stok

### Kategori

- CRUD Kategori

### Supplier

- CRUD Supplier

### Barang Masuk

- Input transaksi barang masuk
- Pilih supplier
- Update stok otomatis

### Barang Keluar

- Input transaksi barang keluar
- Validasi stok
- Update stok otomatis

---

## ⚡ Automatic Stock Management

Sistem menggunakan **Laravel Observer** sehingga stok akan berubah secara otomatis ketika:

- Barang Masuk ditambahkan
- Barang Masuk diubah
- Barang Masuk dihapus
- Barang Keluar ditambahkan
- Barang Keluar diubah
- Barang Keluar dihapus

---

## 📤 Export

- Export data ke Excel

---

## 🎯 Learning Objectives

Project ini dibuat untuk mempelajari implementasi:

- Laravel 12
- Filament 5
- CRUD Management
- Dashboard Widget
- Chart Widget
- Laravel Observer
- Eloquent Relationship
- Relation Manager
- Authentication
- Export Excel

---

## 📸 Preview

<img width="1920" height="1080" alt="Screenshot 2026-08-06 162407" src="https://github.com/user-attachments/assets/0268f54f-9c5a-42f5-a5bc-a999b1737bb6" />


---

## 👨‍💻 Author

**Daffa Ramadhan Sugiono Putra**

GitHub:
https://github.com/daffarsp

Portfolio:
https://daffarsp.github.io/

---

⭐ Jika repository ini bermanfaat, jangan lupa memberikan **Star**.
