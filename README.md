<p align="center">
<img src="https://raw.githubusercontent.com/jhonarendra/prognet8/master/public/images/logo.png" />
<img src="https://raw.githubusercontent.com/jhonarendra/prognet8/master/public/images/logo-text.png" />
</p>
<p align="center">Website restoran dengan framework Laravel 5.6</p>

## Installation

Laravel 5.6 menggunakan PHP versi 7.0. Jadi kalau belum update dulu. Lalu pastikan sudah menginstal composer.

1. Clone repository, bisa di download .zip atau dengan perintah git clone seperti ini

```
git clone https://github.com/jhonarendra/prognet8.git
```

2. Pada cmd, pindah ke folder prognet8 contohnya

```
cd c:/xampp/htdocs/prognet8
```

lalu instal composer

```
composer install
```

3. Edit pengaturan database di file `.env`, juga masukkan perintah ini untuk mengisi `APP_KEY`

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

<p align="center">Apabila memerlukan database sqldump, file bernama prognet8.sql</p>

## Contributing

1. Jika sudah di clone, pull dulu repository ini dengan perintah berikut, supaya dapat editan terbaru

```
git pull origin master
```

2. Edit projek sesuai keinginan
3. Kalau sudah diedit, push kembali seperti perintah berikut

```
git add .
```

```
git commit -m "pesan"
```

```
git push origin master
```
## Screenshot
![](https://raw.githubusercontent.com/jhonarendra/prognet8/master/screenshot/index.png)

## Online Demo
[DEMO](http://prognet8.tk/public)

## Kelompok 8

<p>1605551049 - Putu Jhonarendra</p>
<p>1605551113 - ILHAM YOGA PRABHASWARA</p>
<p>1605551054 - I MADE ADHIARTA WIKANTYASA</p>
<p>1605551023 - Anak Agung Bagus Arya Wiradarma</p>
<p>1605551097 - MARRIA TESALONIKA SIREGAR</p>
<p>1605552028 - Dwiki Surya Chen</p>
<p>1605552033 - Boy Jehezkiel Kamanang Mahar</p>
