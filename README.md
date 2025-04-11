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
