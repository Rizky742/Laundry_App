-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 02:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukl_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `id_transaksi`, `id_paket`, `qty`, `keterangan`, `total_harga`, `total_bayar`) VALUES
(1, 21, 6, 5, '', 0, 5000),
(2, 22, 6, 5, '', 5000, 0),
(3, 23, 6, 4, '', 0, 0),
(4, 24, 6, 4, '', 80000, 90000),
(5, 25, 6, 2, '', 42000, 0),
(6, 26, 6, 10, '', 194000, 0),
(7, 27, 6, 10, '', 202000, 202000),
(8, 28, 6, 10, '', 112000, 0),
(9, 29, 6, 4, '', 80000, 0),
(10, 30, 6, 2, '', 40000, 0),
(11, 31, 6, 10, '', 22000, 0),
(12, 32, 6, 10, '', 10000, 10000),
(13, 33, 6, 10, '', 12000, 0),
(14, 34, 6, 10, '', 13200, 0),
(15, 35, 6, 10, '', 12000, 0),
(16, 36, 6, 10, '', 13200, 0),
(17, 39, 8, 5, '', 10450, 0),
(18, 40, 8, 4, '', 6000, 90000),
(19, 44, 6, 100000, '', 200000000, 0),
(20, 45, 6, 50000, '', 100000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tlp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(7, 'Tono', 'jl jalan', 'L', '45646'),
(8, 'asep', 'asep', 'L', '36436');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id`, `nama`, `alamat`, `tlp`) VALUES
(25, 'Cuci Express', 'jl Gundala', '3453434'),
(27, 'Cuci Mboo', 'mboo', '564564'),
(28, 'sdfs', 'sdfdsf', '56456');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(6, 25, 'selimut', 'Reguler', 2000),
(8, 27, 'selimut', 'lambat', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`) VALUES
(21, 25, 'LNDRY202201191054', 7, '2022-01-19 01:54:10', '2022-01-26 12:00:00', '2022-01-19 09:56:57', 0, 0, 0, 'baru', 'dibayar', 20),
(22, 25, 'LNDRY202201190955', 7, '2022-01-19 01:55:09', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 5000, 10, 0, 'baru', 'belum_dibayar', 20),
(23, 25, 'LNDRY202201195556', 7, '2022-01-19 01:56:55', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 20),
(24, 25, 'LNDRY202201195200', 7, '2022-01-19 02:00:52', '2022-01-26 12:00:00', '2022-01-19 09:03:14', 0, 0, 0, 'diambil', 'dibayar', 20),
(25, 25, 'LNDRY202201192102', 7, '2022-01-19 02:02:21', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 0, 10, 'baru', 'belum_dibayar', 20),
(26, 25, 'LNDRY202201195106', 7, '2022-01-19 02:06:51', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 50, 10, 'baru', 'belum_dibayar', 20),
(27, 25, 'LNDRY202201194308', 7, '2022-01-19 02:08:43', '2022-01-26 12:00:00', '2022-01-20 03:11:25', 2000, 50, 10, 'baru', 'dibayar', 20),
(28, 25, 'LNDRY202201195132', 7, '2022-01-19 04:32:51', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 50, 10, 'baru', 'belum_dibayar', 20),
(29, 25, 'LNDRY202201191734', 7, '2022-01-19 04:34:17', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 20),
(30, 25, 'LNDRY202201192135', 7, '2022-01-19 04:35:21', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 20),
(31, 25, 'LNDRY202201195348', 7, '2022-01-19 04:48:53', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 50, 10, 'baru', 'belum_dibayar', 20),
(32, 25, 'LNDRY202201195353', 7, '2022-01-19 04:53:53', '2022-01-26 12:00:00', '2022-01-21 01:09:42', 0, 50, 0, 'diambil', 'dibayar', 20),
(33, 25, 'LNDRY202201194354', 7, '2022-01-19 04:54:43', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 50, 0, 'baru', 'belum_dibayar', 20),
(34, 25, 'LNDRY202201191856', 7, '2022-01-19 04:56:18', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 50, 10, 'baru', 'belum_dibayar', 20),
(35, 25, 'LNDRY202201194258', 7, '2022-01-19 04:58:42', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 50, 0, 'baru', 'belum_dibayar', 20),
(36, 25, 'LNDRY202201191902', 7, '2022-01-19 05:02:19', '2022-01-26 12:00:00', '0000-00-00 00:00:00', 2000, 50, 10, 'baru', 'dibayar', 20),
(39, 25, 'LNDRY202201202113', 8, '2022-01-20 02:13:21', '2022-01-27 12:00:00', '0000-00-00 00:00:00', 5000, 10, 10, 'baru', 'belum_dibayar', 20),
(40, 25, 'LNDRY202201215908', 7, '2022-01-21 01:08:59', '2022-01-28 12:00:00', '2022-01-21 02:34:14', 2000, 0, 0, 'baru', 'dibayar', 20),
(44, 25, 'LNDRY202201212937', 8, '2022-01-21 02:37:29', '2022-01-28 12:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 20),
(45, 25, 'LNDRY202201214137', 7, '2022-01-21 02:37:41', '2022-01-28 12:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `id_outlet`, `role`) VALUES
(20, 'Rizky Ardiansyah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 25, 'admin'),
(22, 'kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', 27, 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi_2` (`id_transaksi`),
  ADD KEY `id_paket_2` (`id_paket`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet_2` (`id_outlet`),
  ADD KEY `id_member_2` (`id_member`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet_2` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`),
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`);

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_outlet` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
