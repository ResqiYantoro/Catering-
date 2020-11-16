-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2020 pada 08.18
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
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(7) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(50) DEFAULT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `kode_transaksi`, `id_pelanggan`, `tanggal_pengiriman`, `tanggal_transaksi`, `jumlah_transaksi`, `jenis_pembayaran`, `jumlah_bayar`, `bukti_bayar`, `status_bayar`, `waktu_bayar`, `status_transaksi`) VALUES
(7, 'TRS0001', 8, '2020-07-11', '2020-07-09 00:00:00', 25000, 'DP', 12500, 'admin.jpg', 'Sudah Bayar', '2020-07-09 02:42:18', 'Diterima'),
(8, 'TRS0002', 8, '2020-07-11', '2020-07-09 00:00:00', 30000, 'Lunas', 30000, 'almeera_catering.jpg', 'Sudah Bayar', '2020-07-09 03:02:02', 'Belum Diproses'),
(9, 'TRS0003', 9, '2020-07-18', '2020-07-14 00:00:00', 50000, 'Lunas', 50000, '1.jpg', 'Sudah Bayar', '2020-07-14 14:45:02', 'Diterima'),
(10, 'TRS0004', 15, '2020-07-18', '2020-07-15 00:00:00', 20000, 'Lunas', 20000, '1.jpg', 'Sudah Bayar', '2020-07-15 06:13:25', 'Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`) VALUES
(1, 'paket-hemat', 'paket hemat', 1),
(2, 'paket-sedang', 'paket sedang', 2),
(3, 'paket-kenyang', 'paket kenyang ', 3),
(5, 'promo', 'promo', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `nama_rekening` varchar(20) NOT NULL,
  `rekening_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `email`, `website`, `telepon`, `alamat`, `facebook`, `instagram`, `logo`, `icon`, `nama_rekening`, `rekening_pembayaran`) VALUES
(1, 'Almeera Catering', 'almeera_hikmah@gmail.com', 'www.almeerahikmah.com', '089618881339', 'jl.tukang kajang rt 08 rw 10 t', 'https://www.facebook.com/', 'https://www.instagram.com', 'logocatering5.png', 'logocatering4.png', 'Adminkece', '24141090909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `slug_menu` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `path` varchar(50) NOT NULL DEFAULT 'assets/upload/image/thumbs/',
  `status_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `kode_menu`, `nama_menu`, `slug_menu`, `keterangan`, `harga`, `gambar`, `path`, `status_menu`) VALUES
(4, 2, 'M0001', 'nasi ayam bakar', 'nasi-ayam-bakar-m000', '<p>list menu</p>\r\n\r\n<p>-tahu/tempe</p>\r\n\r\n<p>-lalapan</p>\r\n\r\n<p>-ayam bakar</p>\r\n\r\n<p>-sambal</p>\r\n', 25000, 'paket_ayam_bakar_jiosdesired_name.jpg', 'assets/upload/image/thumbs/', 'Publish'),
(5, 3, 'M0002', 'ayam kriuk', 'ayam-kriuk-m0002', '<p>jvjhvjvjhvh</p>\r\n', 30000, '2019-12-25_jiosdesired_name.jpg', 'assets/upload/image/thumbs/', 'Publish'),
(6, 1, 'M0003', 'ayam geprek', 'ayam-geprek-m0003', '<p>list menu</p>\r\n\r\n<p>-nasi</p>\r\n\r\n<p>-ayam geprek</p>\r\n', 20000, 'paket_ayam_hemat_jiosdesired_name.jpg', 'assets/upload/image/thumbs/', 'Publish'),
(7, 5, '11903', 'Fried chiken', 'fried-chiken-11903', '<p>list menu</p>\r\n\r\n<p>-ayam</p>\r\n\r\n<p>-nasi</p>\r\n\r\n<p>-saus</p>\r\n', 15000, 'ciken_jiosdesired_name.jpg', 'assets/upload/image/thumbs/', 'Publish');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(7) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_menu`, `jumlah`, `total_harga`) VALUES
(12, 'TRS0004', 7, 1, 15000),
(13, 'TRS0004', 6, 1, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`) VALUES
(16, 'reskiyantoro', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', ''),
(18, 'sajan', 'admin1', 'd033e22ae348aeb5660fc2140aec35850c4da997', '8eb86e204a1cdb1d325b'),
(20, 'adminkeren', 'admin12', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'admin1@gmail.com'),
(21, 'adminkeren', 'admin1222', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'admin12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD KEY `header_transaksi_ibfk_1` (`id_pelanggan`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD CONSTRAINT `header_transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
