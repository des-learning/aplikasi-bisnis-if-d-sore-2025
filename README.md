# MY APP

Cara menjalankan:

1. clone repository
2. pindah ke directory project

```sh
cd my-app
```

2. Pada directory project, install dependency Laravel menggunakan composer

```sh
composer install
```

3. Install dependency nodejs untuk compile asset web

```sh
npm install && npm run build
```

4. Copy file .env.example ke .env

```sh
copy .env.example .env
```

5. Edit file .env sesuaikan konfigurasi terutama di konfigurasi database, sesuaikan dengan
   konfigurasi database di komputer anda (DB\_\*)

6. Jalankan database migration

```sh
php artisan migrate
```

7. Generate application key untuk keperluan encryption

```sh
php artisan key:generate
```

7. Jalankan server Laravel

```sh
composer run dev
```

8. Akses halaman web sesuai dengan alamat URL yang ditampilkan oleh composer run dev, misalnya <http://localhost:8000>

## Menambahkan filament

1. pasang dependensi filament di project laravel (dilakukan sekali saja jika project belum ada)

   `composer require "filament/filament:^3.3" -W`

   catatan untuk PHP yang dari XAMPP perlu aktifkan extension intl dan zip:
   - edit `c:\xampp\php\php.ini` (atau dimana lokasi instalasi xampp berada)
   - cari `extension=intl`, jika ketemu, hilangkan tanda ; (titik koma) di depan
   - cari `extension=zip`, jika ketemu hilangkan tanda ; (titik koma) di depan

2. buat panel (dilakukan sekali saja ketika belum ada panel filament yang terbentuk)

   `php artisan filament:install --panels`

   isikan nama panel (default admin), nanti halaman depan panel filament akan mengikuti
   nama yang diisi disini, contoh jika diisi dengan nama admin maka panel filament dapat
   diakses di `http://localhost:8080/admin`

3. buat user (jika belum ada)

   `php artisan make:filament-user`

   nanti akan ditanyakan nama, email dan password. untuk login perlu diingat
   email dan password yang diisi.

   ketika mengetik password tampilan akan kosong, ini memang intended supaya
   lebih aman (tidak bisa diintip dari belakang)

4. buat resource (untuk model yang sudah ada sebelumnya)

   `php artisan make:filament-resource Barang`

   asumsinya model Barang sudah dibuat sebelumnya.
