# Laravel Project

![Laravel](https://laravel.com/img/logotype.min.svg)

## 📌 Requirements
- PHP >= 8.2
- Composer
- MySQL
- Web Server (XAMPP/Laragon/etc)
- Node.js & NPM (untuk asset build)
- Laravel 11

## 🚀 Installation Guide

### 1️⃣ Clone Repository
```sh
git clone https://github.com/username/repository.git
cd repository
```

### 2️⃣ Install Dependencies
```sh
composer install
npm install && npm run dev
```

### 3️⃣ Copy & Configure Environment
```sh
cp .env.example .env
```
Edit `.env` untuk menyesuaikan database dan konfigurasi lainnya.

### 4️⃣ Generate Application Key
```sh
php artisan key:generate
```

### 5️⃣ Set Up Database
```sh
php artisan migrate --seed
```
Jika ingin menjalankan seeder, tambahkan `--seed`.

### 6️⃣ Run Application
```sh
php artisan serve
```
Akses aplikasi di `http://127.0.0.1:8000`

## 🛠 Additional Commands

### Running Queue (jika menggunakan jobs)
```sh
php artisan queue:work
```

### Clearing Cache
```sh
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 🎯 Contribution
Pull request dipersilakan! Untuk perubahan besar, harap buka issue terlebih dahulu untuk mendiskusikan apa yang ingin Anda ubah.

## 📝 License
Project ini menggunakan lisensi [MIT](LICENSE).

