-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2023 pada 10.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id` int(100) NOT NULL,
  `kodeid` int(12) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `idtransaksi` varchar(50) NOT NULL,
  `kodebarang` int(100) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `stok` int(12) NOT NULL,
  `jumlahmasuk` int(12) NOT NULL,
  `jumlahkeluar` int(12) NOT NULL,
  `satuan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`id`, `kodeid`, `tanggal`, `keterangan`, `idtransaksi`, `kodebarang`, `namabarang`, `stok`, `jumlahmasuk`, `jumlahkeluar`, `satuan`) VALUES
(285, 1500000005, '2023-10-30', 'PT Mandiri Sejahtera', 'OUT00002', 12345678, 'monitor', 40, 0, 15, 'pcs'),
(286, 1500000006, '2023-10-30', 'PT Mandiri Sejahtera', 'OUT00002', 1234, 'keyboard1', 15, 0, 10, 'pcs'),
(287, 1500000009, '2023-10-31', 'CV Sejahtera', 'OUT00003', 789454168, 'Laptop Asus ROG', 12, 0, 2, 'unit'),
(288, 1500000010, '2023-10-31', 'CV Sejahtera', 'OUT00003', 524136545, 'Laptop Acer', 5, 0, 3, 'pcs'),
(289, 1500000011, '2023-10-31', 'CV Sejahtera', 'OUT00003', 12345678, 'monitor', 25, 0, 2, 'pcs'),
(290, 1500000012, '2023-11-02', 'Eka Putra Sitepu', 'OUT00004', 12345678, 'monitor', 23, 0, 3, 'pcs'),
(291, 1500000016, '2023-10-30', 'PT Mandiri Sejahtera', 'OUT00002', 12345678, 'monitor', 37, 0, 5, 'pcs'),
(292, 1500000018, '2023-11-02', 'Eka Putra Sitepu', 'OUT00004', 1234, 'keyboard1', 10, 0, 2, 'pcs'),
(293, 1500000019, '2023-11-08', 'PT Mandiri Sejahtera', 'OUT00005', 12345678, 'monitor', 38, 0, 12, 'pcs'),
(294, 1500000020, '2023-11-06', 'CV Sejahtera', 'OUT00006', 12345678, 'monitor', 26, 0, 2, 'pcs'),
(295, 1500000021, '2023-11-04', 'Ahmad putera', 'OUT00007', 12345678, 'monitor', 24, 0, 5, 'pcs');

--
-- Trigger `barangkeluar`
--
DELIMITER $$
CREATE TRIGGER `barangkeluar` BEFORE INSERT ON `barangkeluar` FOR EACH ROW BEGIN
	UPDATE databarang SET jumlah=jumlah-NEW.jumlahkeluar
    WHERE kodebarang = NEW.kodebarang; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangkeluardelete` AFTER DELETE ON `barangkeluar` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah + old.jumlahkeluar where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangkeluarupdate` AFTER UPDATE ON `barangkeluar` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah + old.jumlahkeluar where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangkeluarupdate2` BEFORE UPDATE ON `barangkeluar` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah - new.jumlahkeluar where databarang.kodebarang = new.kodebarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` int(100) NOT NULL,
  `kodeid` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `idtransaksi` int(50) NOT NULL,
  `kodebarang` int(35) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `stok` int(12) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `jumlahmasuk` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`id`, `kodeid`, `tanggal`, `keterangan`, `idtransaksi`, `kodebarang`, `namabarang`, `stok`, `satuan`, `jumlahmasuk`) VALUES
(49, 1500000001, '2023-10-30', 'PT suka suka kamu', 1700001, 1234, 'keyboard1', 0, 'pcs', 20),
(51, 1500000004, '2023-10-30', 'PT suka suka kamu', 1700001, 12345678, 'monitor', 0, 'pcs', 40),
(52, 1500000007, '2023-10-31', 'CV gilang', 1700002, 789454168, 'Laptop Asus ROG', 0, 'unit', 12),
(53, 1500000008, '2023-10-31', 'CV gilang', 1700002, 524136545, 'Laptop Acer', 0, 'pcs', 5),
(56, 1500000013, '2023-10-31', 'PT maju jaya', 1700003, 12345678, 'monitor', 20, 'pcs', 3),
(58, 1500000014, '2023-10-30', 'PT suka suka kamu', 1700001, 12345678, 'monitor', 23, 'pcs', 10),
(60, 1500000017, '2023-11-01', 'CV gilang', 1700004, 12345678, 'monitor', 32, 'pcs', 10);

--
-- Trigger `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `barangmasuk` BEFORE INSERT ON `barangmasuk` FOR EACH ROW BEGIN
	UPDATE databarang SET jumlah = jumlah+NEW.jumlahmasuk
    WHERE kodebarang = NEW.kodebarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangmasukdelete` AFTER DELETE ON `barangmasuk` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah - old.jumlahmasuk where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangmasukupdate` AFTER UPDATE ON `barangmasuk` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah - old.jumlahmasuk where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangmasukupdate2` BEFORE UPDATE ON `barangmasuk` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah + new.jumlahmasuk where databarang.kodebarang = new.kodebarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `databarang`
--

CREATE TABLE `databarang` (
  `id` int(20) NOT NULL,
  `kodebarang` int(20) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `databarang`
--

INSERT INTO `databarang` (`id`, `kodebarang`, `namabarang`, `satuan`, `jumlah`) VALUES
(68, 12345678, 'monitor', 'pcs', 19),
(69, 1234, 'keyboard1', 'pcs', 8),
(70, 524136545, 'Laptop Acer', 'pcs', 2),
(71, 789454168, 'Laptop Asus ROG', 'unit', 10),
(73, 23151484, 'Laptop Lenovo', 'Unit', 0),
(74, 12516535, 'keyboard Msi', 'Unit', 0),
(76, 784123589, 'Samsung Galaxy A51', 'Unit', 0),
(77, 2147483647, 'Xiomi Redmi x3', 'Unit', 0),
(78, 996662555, 'Samsung Galaxy A73', 'Unit', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datacustomer`
--

CREATE TABLE `datacustomer` (
  `id` int(11) NOT NULL,
  `namacustomer` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datacustomer`
--

INSERT INTO `datacustomer` (`id`, `namacustomer`, `alamat`, `telepon`) VALUES
(11, 'Eka Putra Sitepu', 'perum', '02132154984'),
(12, 'CV Sejahtera', 'Sidoarjo', '0213254165'),
(13, 'PT Mandiri Sejahtera', 'Tangerang', '412414124'),
(17, 'Ahmad putera', 'Tangerang', '643643346');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakeluar`
--

CREATE TABLE `datakeluar` (
  `id` int(12) NOT NULL,
  `tanggal` date NOT NULL,
  `idtransaksi` varchar(100) NOT NULL,
  `namacustomer` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datakeluar`
--

INSERT INTO `datakeluar` (`id`, `tanggal`, `idtransaksi`, `namacustomer`, `alamat`, `telepon`) VALUES
(18, '2023-10-30', 'OUT00002', 'PT Mandiri Sejahtera', 'Tangerang', 412414124),
(19, '2023-10-31', 'OUT00003', 'CV Sejahtera', 'Sidoarjo', 213254165),
(20, '2023-11-02', 'OUT00004', 'Eka Putra Sitepu', 'perum', 2132154984),
(21, '2023-11-08', 'OUT00005', 'PT Mandiri Sejahtera', 'Tangerang', 412414124),
(22, '2023-11-06', 'OUT00006', 'CV Sejahtera', 'Sidoarjo', 213254165),
(23, '2023-11-04', 'OUT00007', 'Ahmad putera', 'Tangerang', 643643346);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datamasuk`
--

CREATE TABLE `datamasuk` (
  `id` int(12) NOT NULL,
  `idtransaksi` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `namasupplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datamasuk`
--

INSERT INTO `datamasuk` (`id`, `idtransaksi`, `tanggal`, `namasupplier`, `alamat`, `telepon`) VALUES
(24, 1700001, '2023-10-30', 'PT suka suka kamu', 'Tangerang', 2112345678),
(26, 1700002, '2023-10-31', 'CV gilang', 'bandung', 2147483647),
(28, 1700003, '2023-10-31', 'PT maju jaya', 'jakarta', 2147483647),
(29, 1700004, '2023-11-01', 'CV gilang', 'bandung', 2147483647),
(30, 1700005, '2023-11-02', 'PT suka suka kamu', 'dsada', 1231);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasupplier`
--

CREATE TABLE `datasupplier` (
  `id` int(100) NOT NULL,
  `namasupplier` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datasupplier`
--

INSERT INTO `datasupplier` (`id`, `namasupplier`, `alamat`, `telepon`) VALUES
(6, 'PT suka suka kamu', 'Tangerang', '02112345678'),
(8, 'PT Jalan Jalan sendirian', 'tangerang kota', '02132156848'),
(9, 'PT maju jaya', 'jakarta', '32525326263'),
(10, 'CV gilang', 'bandung', '5416345864'),
(11, 'CV sejati', 'Malang1', '524165348'),
(12, 'PT suka maju', 'Tangerang', '4165341856'),
(13, 'PT suka suka kamu', 'dsada', '1231');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(12) NOT NULL,
  `kodeid` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `idtransaksi` varchar(100) NOT NULL,
  `kodebarang` int(100) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `stok` int(12) NOT NULL,
  `jumlahmasuk` int(12) NOT NULL,
  `jumlahkeluar` int(12) NOT NULL,
  `satuan` varchar(12) NOT NULL,
  `awal` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kodeid`, `tanggal`, `keterangan`, `idtransaksi`, `kodebarang`, `namabarang`, `stok`, `jumlahmasuk`, `jumlahkeluar`, `satuan`, `awal`) VALUES
(2147483717, 1500000001, '2023-10-30', 'PT suka suka kamu', '1700001', 1234, 'keyboard1', 0, 20, 0, 'pcs', '0'),
(2147483721, 1500000004, '2023-10-30', 'PT suka suka kamu', '1700001', 12345678, 'monitor', 0, 40, 0, 'pcs', '0'),
(2147483722, 1500000005, '2023-10-30', 'PT Mandiri Sejahtera', 'OUT00002', 12345678, 'monitor', 40, 0, 15, 'pcs', '0'),
(2147483723, 1500000006, '2023-10-30', 'PT Mandiri Sejahtera', 'OUT00002', 1234, 'keyboard1', 15, 0, 10, 'pcs', ''),
(2147483724, 1500000007, '2023-10-31', 'CV gilang', '1700002', 789454168, 'Laptop Asus ROG', 0, 12, 0, 'unit', ''),
(2147483725, 1500000008, '2023-10-31', 'CV gilang', '1700002', 524136545, 'Laptop Acer', 0, 5, 0, 'pcs', ''),
(2147483726, 1500000009, '2023-10-31', 'CV Sejahtera', 'OUT00003', 789454168, 'Laptop Asus ROG', 12, 0, 2, 'unit', ''),
(2147483727, 1500000010, '2023-10-31', 'CV Sejahtera', 'OUT00003', 524136545, 'Laptop Acer', 5, 0, 3, 'pcs', ''),
(2147483728, 1500000011, '2023-10-31', 'CV Sejahtera', 'OUT00003', 12345678, 'monitor', 25, 0, 2, 'pcs', ''),
(2147483731, 1500000012, '2023-11-02', 'Eka Putra Sitepu', 'OUT00004', 12345678, 'monitor', 23, 0, 3, 'pcs', ''),
(2147483732, 1500000013, '2023-10-31', 'PT maju jaya', '1700003', 12345678, 'monitor', 20, 3, 0, 'pcs', ''),
(2147483734, 1500000014, '2023-10-30', 'PT suka suka kamu', '1700001', 12345678, 'monitor', 23, 10, 0, 'pcs', ''),
(2147483736, 1500000016, '2023-10-30', 'PT Mandiri Sejahtera', 'OUT00002', 12345678, 'monitor', 37, 0, 5, 'pcs', ''),
(2147483737, 1500000017, '2023-11-01', 'CV gilang', '1700004', 12345678, 'monitor', 32, 10, 0, 'pcs', ''),
(2147483738, 1500000018, '2023-11-02', 'Eka Putra Sitepu', 'OUT00004', 1234, 'keyboard1', 10, 0, 2, 'pcs', ''),
(2147483739, 1500000019, '2023-11-08', 'PT Mandiri Sejahtera', 'OUT00005', 12345678, 'monitor', 38, 0, 12, 'pcs', ''),
(2147483740, 1500000020, '2023-11-06', 'CV Sejahtera', 'OUT00006', 12345678, 'monitor', 26, 0, 2, 'pcs', ''),
(2147483741, 1500000021, '2023-11-04', 'Ahmad putera', 'OUT00007', 12345678, 'monitor', 24, 0, 5, 'pcs', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(2) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `avatar`, `created_at`, `last_login`) VALUES
(1, '', 'yosuak7@gmail.com', 'Admin', '$2y$10$r6ywVQmzGZQKW5pIabgoC.vyyABceBlTb.wa72MkAKl0vpPeUiaJ.', 1, NULL, '2022-05-20 16:27:14', '0000-00-00 00:00:00'),
(6152, '', 'eka1@gmail.com', 'eka12', '$2y$10$igkG68nfjHVy.MbL1kR3CecGXDOhvC5wg7NTOGbCpODfoVi1ILwf.', 1, NULL, '2022-11-21 04:16:03', NULL),
(6156, '', 'yosuak@gmail.com', 'yosua', '$2y$10$rw3j1Rv2uo0MXC5I6sKzVunysh7Qe5pKIBZzcVa8KJal.lrDU6xpS', 0, NULL, '2023-02-02 10:52:02', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indeks untuk tabel `databarang`
--
ALTER TABLE `databarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datacustomer`
--
ALTER TABLE `datacustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datakeluar`
--
ALTER TABLE `datakeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datamasuk`
--
ALTER TABLE `datamasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indeks untuk tabel `datasupplier`
--
ALTER TABLE `datasupplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `databarang`
--
ALTER TABLE `databarang`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `datacustomer`
--
ALTER TABLE `datacustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `datakeluar`
--
ALTER TABLE `datakeluar`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `datamasuk`
--
ALTER TABLE `datamasuk`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `datasupplier`
--
ALTER TABLE `datasupplier`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483742;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6160;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
