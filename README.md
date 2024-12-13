# Laravel 11 Dusk

## Technologies

-   PHP 8.4
-   Laravel 11
-   Laravel Dusk

## Project structure

-   Controller, di `app/Http/Controllers` untuk menangani Request dan Response
-   Service, di `app/Services` untuk menangani logic pada sebuah Request
-   Model, di `app/Models` untuk berkomunikasi dengan Database

### Features

## Authentication

-   `AuthController`, yang berfungsi untuk menangani request Login dan Register. Terdapat 4 method

    1. loginForm(), untuk menampilkan halaman login
    2. login(), untuk menangani proses login dengan melakukan validasi
    3. registerForm(), untuk menampilkan halaman register
    4. register(), untuk menangani proses register atau pembuatan data user

-   `UserService` untuk mengolah data yang dikirim oleh `AuthController`. Terdapat 2 method.

    1. getLatest(), untuk mengambil data user berdasarkan `created_at` yang terbaru
    2. store(), untuk menyimpan data user

-   `User`, untuk berkomunikasi dengan table `users` pada database.
-   `LoginRequest`, untuk melakukan validasi data **Login** yang dikirim oleh Client
-   `RegisterRequest`, untuk melakukan validasi data **Register** yang dikirim oleh Client

## CRUD Book

-   `BookController`, yang berfungsi untuk menangani request CRUD data buku. Terdapat 6 method.

    1. index(), menampilkan halaman utama yang berisikan daftar buku
    2. create(), menampilkan halaman buat buku
    3. store(), menangani proses simpan data buku ke database
    4. edit(), menampilkan halaman edit buku
    5. update(), menangani proses edit data buku ke database
    6. destroy(), menghapus data

-   `BookService`, yang berfungsi untuk mengolah data buku yang dikirim oleh `BookController`. Terdapat 5 method.

    1. getLatest(), mengambil data buku dengan urutan paling baru
    2. get(), mengambil data buku berdasarkan id
    3. store(), menyimpan data buku
    4. update(), menyimpan perubahan data buku
    5. destroy(), menghapus data buku

-   `Book`, untuk berkomunikasi dengan table `books` pada database. Terdapat 1 method.

    1. author(), relasi antar model `Book` dan `User` berdasarkan column `author_id`

## Testing

### Preperation

-   Install chrome driver

    ```
    php artisan dusk:chrome-driver
    ```

-   Buat database `testing.sqlite` dengan menggunakan perintah
    ```
    php artisan migrate --database=testing
    ```

### Run a test

-   Cara menjalankan run yaitu dengan perintah
    ```
    php artisan dusk
    ```
