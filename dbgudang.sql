-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2023 pada 09.54
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
  `idtransaksi` varchar(50) NOT NULL,
  `kodebarang` int(100) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `stok` int(12) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `satuan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`id`, `idtransaksi`, `kodebarang`, `namabarang`, `stok`, `jumlah`, `satuan`) VALUES
(184, 'OUT00001', 12345678, 'monitor', 16, 10, 'pcs');

--
-- Trigger `barangkeluar`
--
DELIMITER $$
CREATE TRIGGER `barangkeluar` BEFORE INSERT ON `barangkeluar` FOR EACH ROW BEGIN
	UPDATE databarang SET jumlah=jumlah-NEW.jumlah
    WHERE kodebarang = NEW.kodebarang; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangkeluardelete` AFTER DELETE ON `barangkeluar` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah + old.jumlah where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangkeluarupdate` AFTER UPDATE ON `barangkeluar` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah + old.jumlah where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangkeluarupdate2` BEFORE UPDATE ON `barangkeluar` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah - new.jumlah where databarang.kodebarang = new.kodebarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` int(100) NOT NULL,
  `idtransaksi` int(50) NOT NULL,
  `kodebarang` int(35) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `jumlah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`id`, `idtransaksi`, `kodebarang`, `namabarang`, `satuan`, `jumlah`) VALUES
(133, 1700003, 1234, 'keyboard', 'pcs', 3),
(134, 1700003, 1234, 'keyboard', 'pcs', 2),
(135, 1700003, 12345678, 'monitor', 'pcs', 2),
(184, 1700002, 12345678, 'monitor', 'pcs', 12),
(187, 1700002, 789454168, 'Laptop Asus ROG', 'unit', 2),
(188, 1700002, 789454168, 'Laptop Asus ROG', 'unit', 2),
(189, 1700013, 2147483647, 'Laptop Samsung', 'Unit', 1),
(190, 1700002, 1234, 'keyboard', 'pcs', 12),
(191, 1700003, 524136545, 'Laptop Acer', 'pcs', 1),
(192, 1700003, 524136545, 'Laptop Acer', 'pcs', 1),
(194, 1700002, 12345678, 'monitor', 'pcs', 1),
(195, 1700002, 12345678, 'monitor', 'pcs', 1),
(196, 1700002, 12345678, 'monitor', 'pcs', 2);

--
-- Trigger `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `barangmasuk` BEFORE INSERT ON `barangmasuk` FOR EACH ROW BEGIN
	UPDATE databarang SET jumlah = jumlah+NEW.jumlah
    WHERE kodebarang = NEW.kodebarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangmasukdelete` AFTER DELETE ON `barangmasuk` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah - old.jumlah where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangmasukupdate` AFTER UPDATE ON `barangmasuk` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah - old.jumlah where databarang.kodebarang = old.kodebarang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barangmasukupdate2` BEFORE UPDATE ON `barangmasuk` FOR EACH ROW UPDATE databarang set databarang.jumlah = databarang.jumlah + new.jumlah where databarang.kodebarang = new.kodebarang
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
(68, 12345678, 'monitor', 'pcs', 8),
(69, 1234, 'keyboard1', 'pcs', 17),
(70, 524136545, 'Laptop Acer', 'pcs', 2),
(71, 789454168, 'Laptop Asus ROG', 'unit', 4),
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
(12, 'CV Sejahtera', 'Sidoarjo', '0213254165');

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
(5, '2023-08-16', 'OUT00001', 'CV Sejahtera', 'Sidoarjo', 213254165);

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
(3, 1700002, '2023-08-09', 'PT Jalan Jalan sendirian', 'tangerang kota', 2132156848),
(4, 1700003, '2023-08-09', 'PT suka suka kamu', 'Tangerang', 2112345678),
(5, 1700004, '2023-08-12', 'PT suka suka kamu', 'Tangerang', 2112345678),
(6, 1700005, '2023-08-14', 'PT maju jaya', 'jakarta', 2147483647),
(8, 1700007, '2023-08-14', 'CV gilang', 'bandung', 2147483647),
(9, 1700008, '2023-08-14', 'CV sejati', 'Malang', 524165348),
(10, 1700009, '2023-08-14', 'PT maju jaya', 'jakarta', 2147483647),
(11, 1700010, '2023-08-14', 'CV sejati', 'Malang', 524165348),
(12, 1700011, '2023-08-14', 'PT suka suka kamu', 'Tangerang', 2112345678),
(13, 1700012, '2023-08-14', 'CV gilang', 'bandung', 2147483647),
(14, 1700013, '2023-08-14', 'PT Jalan Jalan sendirian', 'tangerang kota', 2132156848);

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
(11, 'CV sejati', 'Malang1', '524165348');

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
  `last_login` timestamp NULL DEFAULT NULL
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT untuk tabel `databarang`
--
ALTER TABLE `databarang`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `datacustomer`
--
ALTER TABLE `datacustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `datakeluar`
--
ALTER TABLE `datakeluar`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `datamasuk`
--
ALTER TABLE `datamasuk`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `datasupplier`
--
ALTER TABLE `datasupplier`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
