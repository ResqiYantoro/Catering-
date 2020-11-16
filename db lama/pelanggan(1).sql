-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2020 pada 06.45
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_almeera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`) VALUES
(2, 'sajan', 'sajan@gmail.com', 'd033e22ae348aeb5660f', '089671283869', 'tangerang '),
(4, 'reski', 'reski@gmail.com', 'd033e22ae348aeb5660f', '08989898', 'jakarta'),
(5, 'sajan', 'KAKA@gmail.com', 'd033e22ae348aeb5660f', '098709908', 'JAKARTA'),
(6, 'reski', 'sajan@g.com', 'd033e22ae348aeb5660f', '141214', 'dafwfqwfwf'),
(7, 'toro', 'toro@gmail.com', 'd033e22ae348aeb5660f', '098990898', 'jakarta'),
(8, 'maman', 'maman@gmail.com', 'f865b53623b121fd34ee', '08978798798', 'jakarrta'),
(9, 'siti', 'siti@gmail.com', 'd033e22ae348aeb5660f', '08986969', 'jakarta'),
(12, 'susa', 'susa@gmail.com', 'd033e22ae348aeb5660f', '808098098', 'jakarta'),
(13, 'jiji', 'jiji@gmail.com', 'd033e22ae348aeb5660f', '8787098780', 'jnalnaln'),
(14, 'kk', 'kk@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '987897', 'kjkjkj'),
(15, 'lili', 'lili@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '878789', 'jakajk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
