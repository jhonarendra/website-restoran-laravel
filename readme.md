<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
# Website Restoran

Website restoran dengan framework Laravel 5.6

## Installation

Laravel 5.6 menggunakan PHP versi 7.0. Jadi kalau belum update dulu. Lalu pastikan sudah menginstal composer.

1. Clone repository, bisa di download .zip atau dengan perintah git clone seperti ini

```
git clone https://github.com/jhonarendra/prognet8.git
```

2. Pada cmd, pindah ke folder prognet8 contohnya

```
cd c:/xampp/htdocs/prognet8`
```

lalu instal composer

```
composer install
```

3. Ubah nama `.env.example` menjadi `.env` misalkan dengan perintah

```
ren .env.example .env
```

Lalu edit pengaturan databasenya.
Juga masukkan perintah ini untuk mengisi `APP_KEY`

```
php artisan key:generate
```

4. Migrasi tabelnya ke database dengan perintah

```
php artisan migrate
```

Lalu masukkan perintah berikut untuk insert beberapa data ke database

```
php artisan db:seed
```

5. Siap dijalankan...


## Kelompok 8

1605551049	Putu Jhonarendra
1605551113	ILHAM YOGA PRABHASWARA
1605551054	I MADE ADHIARTA WIKANTYASA
1605551023	Anak Agung Bagus Arya Wiradarma
1605551097	MARRIA TESALONIKA SIREGAR
1605552028	Dwiki Surya Chen
1605552033	Boy Jehezkiel Kamanang Mahar

