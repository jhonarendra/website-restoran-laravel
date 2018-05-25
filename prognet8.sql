-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mei 2018 pada 20.49
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prognet8`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_04_05_050314_create_tb_pelanggan_table', 1),
(2, '2018_04_05_050819_create_tb_pegawai_table', 1),
(3, '2018_04_05_050957_create_tb_restoran_table', 1),
(4, '2018_04_05_051520_create_tb_reservasi_table', 1),
(5, '2018_04_05_052444_create_tb_pemesanan_table', 1),
(6, '2018_04_05_060155_create_tb_hidangan_table', 1),
(7, '2018_04_05_060226_create_tb_detil_pemesanan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detil_pemesanan`
--

CREATE TABLE `tb_detil_pemesanan` (
  `id_detil_pemesanan` int(10) UNSIGNED NOT NULL,
  `id_pemesanan` int(10) UNSIGNED NOT NULL,
  `id_hidangan` int(10) UNSIGNED NOT NULL,
  `jumlah_hidangan` int(10) UNSIGNED NOT NULL,
  `total_harga_hidangan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_detil_pemesanan`
--

INSERT INTO `tb_detil_pemesanan` (`id_detil_pemesanan`, `id_pemesanan`, `id_hidangan`, `jumlah_hidangan`, `total_harga_hidangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 45000, '2018-05-20 07:49:09', '2018-05-20 07:49:09'),
(2, 1, 2, 1, 27500, '2018-05-20 07:49:09', '2018-05-20 07:49:09'),
(3, 1, 5, 1, 15000, '2018-05-20 07:49:09', '2018-05-20 07:49:09'),
(4, 1, 6, 1, 20000, '2018-05-20 07:49:09', '2018-05-20 07:49:09'),
(5, 2, 1, 3, 135000, '2018-05-20 07:53:15', '2018-05-20 07:53:15'),
(6, 2, 5, 2, 30000, '2018-05-20 07:53:15', '2018-05-20 07:53:15'),
(7, 2, 6, 1, 20000, '2018-05-20 07:53:15', '2018-05-20 07:53:15'),
(8, 3, 1, 2, 90000, '2018-05-23 06:24:39', '2018-05-23 06:24:39'),
(9, 3, 2, 1, 27500, '2018-05-23 06:24:39', '2018-05-23 06:24:39'),
(10, 3, 5, 3, 45000, '2018-05-23 06:24:39', '2018-05-23 06:24:39'),
(11, 4, 1, 1, 45000, '2018-05-23 20:58:37', '2018-05-23 20:58:37'),
(12, 4, 2, 2, 55000, '2018-05-23 20:58:37', '2018-05-23 20:58:37'),
(13, 4, 6, 3, 60000, '2018-05-23 20:58:37', '2018-05-23 20:58:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hidangan`
--

CREATE TABLE `tb_hidangan` (
  `id_hidangan` int(10) UNSIGNED NOT NULL,
  `nama_hidangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_hidangan` enum('Makanan','Minuman') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_hidangan` int(10) UNSIGNED NOT NULL,
  `foto_hidangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_hidangan`
--

INSERT INTO `tb_hidangan` (`id_hidangan`, `nama_hidangan`, `jenis_hidangan`, `harga_hidangan`, `foto_hidangan`, `created_at`, `updated_at`) VALUES
(1, 'Spageti', 'Makanan', 45000, 'spageti.jpg', '2018-05-20 07:49:08', '2018-05-20 07:49:08'),
(2, 'Salad', 'Makanan', 27500, 'salad.jpeg', '2018-05-20 07:49:08', '2018-05-20 07:49:08'),
(4, 'Pinneaple Juice', 'Minuman', 12500, 'pinepple.jpg', '2018-05-20 07:49:09', '2018-05-20 07:49:09'),
(5, 'Strawberry Juice', 'Minuman', 15000, 'heart.jpg', '2018-05-20 07:49:09', '2018-05-20 07:49:09'),
(6, 'Tropical Juice', 'Minuman', 20000, 'tropical.jpg', '2018-05-20 07:49:09', '2018-05-20 07:49:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_pegawai` enum('Admin','Super Admin') COLLATE utf8mb4_unicode_ci DEFAULT 'Admin',
  `foto_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `email_pegawai`, `username_pegawai`, `password_pegawai`, `jabatan_pegawai`, `foto_pegawai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tidak Dipilih', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Admin', 'close.png', NULL, '2018-05-20 07:49:08', '2018-05-20 07:49:08'),
(2, 'Jhonarendra', 'jhonarendra@gmail.com', 'jhonarendra', 'f80cdc281e09fb8f69607830dd9586c4', 'Admin', 'default.png', NULL, '2018-05-20 07:49:08', '2018-05-20 07:49:08'),
(3, 'Putu', 'putu@mail.app', 'putu', 'f80cdc281e09fb8f69607830dd9586c4', 'Admin', 'putu.png', NULL, '2018-05-23 21:22:02', '2018-05-23 21:22:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `username_pelanggan`, `password_pelanggan`, `foto_pelanggan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', 'loremipsum@mail.app', 'loremipsum', 'f80cdc281e09fb8f69607830dd9586c4', 'default.png', NULL, '2018-05-20 07:49:08', '2018-05-20 07:49:08'),
(2, 'Lorem Ipsum2', 'loremipsum2@mail.app', 'loremipsum2', 'f80cdc281e09fb8f69607830dd9586c4', 'default.png', NULL, '2018-05-20 07:49:08', '2018-05-20 07:49:08'),
(3, 'lalalala', 'lalalala@gmail.com', 'lalalala', 'f80cdc281e09fb8f69607830dd9586c4', 'lalalala.png', NULL, '2018-05-20 07:49:50', '2018-05-20 07:49:50'),
(4, 'Jhon99', 'jhon@mail.app', 'jhon', 'f80cdc281e09fb8f69607830dd9586c4', 'jhon.jpeg', NULL, '2018-05-23 00:52:27', '2018-05-23 22:07:35'),
(5, 'Boy', 'boy@asoka.co', 'boy', 'f80cdc281e09fb8f69607830dd9586c4', 'boy.png', NULL, '2018-05-23 06:21:54', '2018-05-23 06:21:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(10) UNSIGNED NOT NULL,
  `id_restoran` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `total_pemesanan` int(10) DEFAULT '0',
  `status_pemesanan` enum('Belum Dibayar','Lunas') COLLATE utf8mb4_unicode_ci DEFAULT 'Belum Dibayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_restoran`, `id_pelanggan`, `id_pegawai`, `total_pemesanan`, `status_pemesanan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 107500, 'Belum Dibayar', '2018-05-20 07:49:09', '2018-05-20 07:49:09'),
(2, 2, 3, 2, 185000, 'Lunas', '2018-05-20 07:53:15', '2018-05-20 08:07:35'),
(3, 1, 5, 2, 162500, 'Lunas', '2018-05-23 06:24:39', '2018-05-23 06:25:42'),
(4, 1, 4, 2, 160000, 'Lunas', '2018-05-23 20:58:37', '2018-05-23 21:08:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int(10) UNSIGNED NOT NULL,
  `id_restoran` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED DEFAULT '0',
  `no_meja_reservasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_reservasi` enum('Selesai','Batal','Sedang Berlangsung','Menunggu Konfirmasi','Dikonfirmasi') COLLATE utf8mb4_unicode_ci DEFAULT 'Menunggu Konfirmasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `id_restoran`, `id_pelanggan`, `id_pegawai`, `no_meja_reservasi`, `status_reservasi`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 1, 1, NULL, 'Menunggu Konfirmasi', '2018-05-20 07:49:09', '2018-05-20 07:49:09', 0),
(2, 2, 1, 1, NULL, 'Menunggu Konfirmasi', '2018-05-20 07:49:09', '2018-05-20 07:49:09', 0),
(3, 2, 1, 2, '202', 'Selesai', '2018-05-20 07:49:09', '2018-05-20 07:49:09', 0),
(4, 2, 3, 2, '222', 'Dikonfirmasi', '2018-05-20 07:50:29', '2018-05-20 08:39:05', 0),
(5, 1, 4, 2, '2A', 'Dikonfirmasi', '2018-05-23 01:09:50', '2018-05-23 01:41:09', 0),
(6, 1, 5, 2, '232', 'Dikonfirmasi', '2018-05-23 06:22:21', '2018-05-23 06:23:56', 1),
(7, 1, 5, 2, '3A', 'Dikonfirmasi', '2018-05-23 23:17:40', '2018-05-24 01:36:38', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_restoran`
--

CREATE TABLE `tb_restoran` (
  `id_restoran` int(10) UNSIGNED NOT NULL,
  `nama_restoran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_restoran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_restoran`
--

INSERT INTO `tb_restoran` (`id_restoran`, `nama_restoran`, `alamat_restoran`, `created_at`, `updated_at`) VALUES
(1, 'Restoran Bukit', 'Jalan Kampus Unud', '2018-05-20 07:49:08', '2018-05-20 07:49:08'),
(2, 'Restoran Sudirman', 'Jalan PB Sudirman', '2018-05-20 07:49:08', '2018-05-20 07:49:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detil_pemesanan`
--
ALTER TABLE `tb_detil_pemesanan`
  ADD PRIMARY KEY (`id_detil_pemesanan`),
  ADD KEY `tb_detil_pemesanan_id_pemesanan_foreign` (`id_pemesanan`),
  ADD KEY `tb_detil_pemesanan_id_hidangan_foreign` (`id_hidangan`);

--
-- Indexes for table `tb_hidangan`
--
ALTER TABLE `tb_hidangan`
  ADD PRIMARY KEY (`id_hidangan`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `tb_pemesanan_id_restoran_foreign` (`id_restoran`),
  ADD KEY `tb_pemesanan_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `tb_pemesanan_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `tb_reservasi_id_restoran_foreign` (`id_restoran`),
  ADD KEY `tb_reservasi_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `tb_reservasi_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_detil_pemesanan`
--
ALTER TABLE `tb_detil_pemesanan`
  MODIFY `id_detil_pemesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_hidangan`
--
ALTER TABLE `tb_hidangan`
  MODIFY `id_hidangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  MODIFY `id_restoran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detil_pemesanan`
--
ALTER TABLE `tb_detil_pemesanan`
  ADD CONSTRAINT `tb_detil_pemesanan_id_hidangan_foreign` FOREIGN KEY (`id_hidangan`) REFERENCES `tb_hidangan` (`id_hidangan`),
  ADD CONSTRAINT `tb_detil_pemesanan_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `tb_pemesanan` (`id_pemesanan`);

--
-- Ketidakleluasaan untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `tb_pemesanan_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `tb_pemesanan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tb_pemesanan_id_restoran_foreign` FOREIGN KEY (`id_restoran`) REFERENCES `tb_restoran` (`id_restoran`);

--
-- Ketidakleluasaan untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `tb_reservasi_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tb_reservasi_id_restoran_foreign` FOREIGN KEY (`id_restoran`) REFERENCES `tb_restoran` (`id_restoran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
