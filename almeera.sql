-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 06:14 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almeera`
--

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `kode_transaksi`, `id_pelanggan`, `tanggal_pengiriman`, `tanggal_transaksi`, `jumlah_transaksi`, `jenis_pembayaran`, `jumlah_bayar`, `bukti_bayar`, `status_bayar`, `waktu_bayar`, `status_transaksi`) VALUES
(1, '03062020J13IUU5B', 2, '2020-06-04', '2020-06-03 00:00:00', 20000, 'Lunas', 20000, 'aing.jpg', 'Sudah Bayar', '2020-06-03 12:57:06', 'Diterima'),
(2, '06062020G5PXIFAW', 2, '2020-06-08', '2020-06-06 00:00:00', 20000, 'DP', 10000, 'admin.jpg', 'Sudah Bayar', '2020-06-06 16:34:56', 'Diterima'),
(3, '080620205LCYIFH4', 2, '2020-06-13', '2020-06-08 00:00:00', 95000, 'Lunas', 95000, 'admin.jpg', 'Sudah Bayar', '2020-06-08 16:22:05', 'Belum Diproses'),
(4, '10062020NAB23OKZ', 2, '2020-06-13', '2020-06-10 00:00:00', 30000, 'Lunas', 30000, 'WhatsApp_Image_2020-05-28_at_19.04.21.jpeg', 'Sudah Bayar', '2020-06-10 15:22:10', 'Belum Diproses'),
(5, '10062020NAB23OKZ', 2, '2020-06-13', '2020-06-10 00:00:00', 30000, 'Lunas', 30000, 'WhatsApp_Image_2020-05-28_at_19.04.21.jpeg', 'Sudah Bayar', '2020-06-10 15:29:38', 'Diproses'),
(6, '10062020HRGXOLDN', 4, '2020-06-25', '2020-06-10 00:00:00', 55000, 'DP', 35000, 'New_Project.jpg', 'Sudah Bayar', '2020-06-10 15:40:00', 'Belum Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`) VALUES
(1, 'paket-hemat', 'paket hemat', 1),
(2, 'paket-sedang', 'paket sedang', 2),
(3, 'paket-kenyang', 'paket kenyang ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `rekening_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `email`, `website`, `telepon`, `alamat`, `facebook`, `instagram`, `logo`, `icon`, `nama_rekening`, `rekening_pembayaran`) VALUES
(1, 'Almeera Catering', 'almeera_hikmah@gmail.com', 'www.almeerahikmah.com', '089618881339', 'jl.tukang kajang rt 08 rw 10 teluknaga ,tangerang', 'https://www.facebook.com/gimbalwedus93', 'https://www.instagram.com/reski_yantoro', 'logocatering5.png', 'logocatering4.png', 'Adminkece', '24141090909');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_menu` varchar(20) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `slug_menu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `path` varchar(100) NOT NULL DEFAULT 'assets/upload/image/thumbs/',
  `status_menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `kode_menu`, `nama_menu`, `slug_menu`, `keterangan`, `harga`, `gambar`, `path`, `status_menu`) VALUES
(1, 1, '17419', 'Ayam kriuk', 'ayam-kriuk-17419', '<p>isi box</p>\r\n\r\n<p>-ayam kriuk</p>\r\n\r\n<p>-jeruk</p>\r\n\r\n<p>-orek tempe</p>\r\n', 20000, 'paket_4_sehat_5_sempurna_1_jiosdesired_name.jpg', 'assets/upload/image/thumbs/', 'Publish'),
(2, 3, '19796', 'rendang ayam', 'rendang-ayam-19796', '<p>list menu</p>\r\n\r\n<p>-ayam</p>\r\n\r\n<p>-capcay</p>\r\n\r\n<p>-sambal kentang</p>\r\n\r\n<p>mie goreng</p>\r\n\r\n<p>-lalapan</p>\r\n', 30000, 'paket_sehat_jiosdesired_name.jpg', 'assets/upload/image/thumbs/', 'Publish'),
(3, 2, '18377', 'ayam bakar', 'ayam-bakar-18377', '<p>list menu</p>\r\n\r\n<p>-ayam bakar</p>\r\n\r\n<p>-tahu</p>\r\n\r\n<p>-tempe</p>\r\n\r\n<p>-lalapan dan sambal</p>\r\n', 25000, 'paket_ayam_bakar_jiosdesired_name.jpg', 'assets/upload/image/thumbs/', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`) VALUES
(2, 'sajan', 'sajan@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '089671283869', 'tangerang '),
(4, 'reski', 'reski@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '08989898', 'jakarta'),
(5, 'sajan', 'KAKA@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '098709908', 'JAKARTA'),
(6, 'reski', 'sajan@g.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '141214', 'dafwfqwfwf');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_menu`, `jumlah`, `total_harga`) VALUES
(1, '03062020J13IUU5B', 1, 1, 20000),
(2, '06062020G5PXIFAW', 1, 1, 20000),
(3, '080620205LCYIFH4', 1, 2, 40000),
(4, '080620205LCYIFH4', 2, 1, 30000),
(5, '080620205LCYIFH4', 3, 1, 25000),
(6, '10062020NAB23OKZ', 2, 1, 30000),
(7, '10062020HRGXOLDN', 2, 1, 30000),
(8, '10062020HRGXOLDN', 3, 1, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`) VALUES
(16, 'reskiyantoro', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', ''),
(18, 'sajan', 'admin1', 'd033e22ae348aeb5660fc2140aec35850c4da997', '8eb86e204a1cdb1d325be09f7e4a36fe'),
(20, 'adminkeren', 'admin12', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'admin1@gmail.com'),
(21, 'adminkeren', 'admin1222', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'admin12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD KEY `kode_transaksi` (`kode_transaksi`,`id_pelanggan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD CONSTRAINT `header_transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_transaksi`) REFERENCES `header_transaksi` (`kode_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
