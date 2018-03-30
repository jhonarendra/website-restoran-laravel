-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mar 2018 pada 09.03
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detil_pemesanan`
--

CREATE TABLE `tb_detil_pemesanan` (
  `id_detil_pemesanan` int(10) NOT NULL,
  `id_pemesanan` int(10) DEFAULT NULL,
  `id_hidangan` int(10) DEFAULT NULL,
  `jumlah_hidangan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hidangan`
--

CREATE TABLE `tb_hidangan` (
  `id_hidangan` int(10) NOT NULL,
  `nama_hidangan` varchar(255) DEFAULT NULL,
  `jenis_hidangan` enum('Makanan','Minuman') DEFAULT NULL,
  `harga_hidangan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `username_pegawai` varchar(255) DEFAULT NULL,
  `password_pegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `username_pelanggan` varchar(255) DEFAULT NULL,
  `password_pelanggan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username_pelanggan`, `password_pelanggan`) VALUES
(1, 'Jhonarendra', 'jhonarendra', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `id_pelanggan` int(10) DEFAULT NULL,
  `id_pegawai` int(10) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `tanggal_pemesanan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `id_restoran` int(10) DEFAULT NULL,
  `id_pelanggan` int(10) DEFAULT NULL,
  `id_pegawai` int(10) DEFAULT NULL,
  `tanggal_reservasi` datetime DEFAULT NULL,
  `status_reservasi` enum('Menunggu konfirmasi','Batal','Selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_restoran`
--

CREATE TABLE `tb_restoran` (
  `id_restoran` int(10) NOT NULL,
  `nama_restoran` varchar(255) DEFAULT NULL,
  `alamat_restoran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'Jhonarendra', 'jhonarendra@gmail.com', '$2y$10$cKxQO6DhJAFaDoY0U7xDm.ykYlMLIzTwIKjyE.i/h0axygXv5HicS', '2018-03-29 05:39:42', '2018-03-29 05:39:42', 'TZipBJMVFIvR4tp95SarObFD4kDrFnPUvHQhwl4jPH7XN2gMPmJhMPuBITXT'),
(2, 'Lorem Ipsum', 'loremipsum@mail.app', '$2y$10$WrN9YWbHIivYhQry3DN5qOsrKXYRd/bqo/7K3I7SZC2Uu1lLkqTUK', '2018-03-30 05:46:48', '2018-03-30 05:46:48', 'OkBLzr79umAyo1cU0rObTwHav6JZR9bcbGNe2VTFHuWWrFmV16VOSm0Pz67H');

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
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_hidangan` (`id_hidangan`);

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
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_restoran` (`id_restoran`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detil_pemesanan`
--
ALTER TABLE `tb_detil_pemesanan`
  MODIFY `id_detil_pemesanan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hidangan`
--
ALTER TABLE `tb_hidangan`
  MODIFY `id_hidangan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_restoran`
--
ALTER TABLE `tb_restoran`
  MODIFY `id_restoran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detil_pemesanan`
--
ALTER TABLE `tb_detil_pemesanan`
  ADD CONSTRAINT `tb_detil_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tb_pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `tb_detil_pemesanan_ibfk_2` FOREIGN KEY (`id_hidangan`) REFERENCES `tb_hidangan` (`id_hidangan`);

--
-- Ketidakleluasaan untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `tb_pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tb_pemesanan_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_ibfk_1` FOREIGN KEY (`id_restoran`) REFERENCES `tb_restoran` (`id_restoran`),
  ADD CONSTRAINT `tb_reservasi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tb_reservasi_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
