-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 03:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sederek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_menu`, `id_transaksi`, `jumlah`, `harga`) VALUES
(35, 58, 27120, 1, 10000),
(36, 63, 27120, 1, 8000),
(37, 81, 27120, 1, 7),
(38, 90, 27120, 1, 7),
(39, 91, 27120, 1, 7),
(40, 62, 27051, 1, 10000),
(41, 62, 27052, 1, 10000),
(42, 60, 27053, 1, 10000),
(43, 61, 27053, 1, 10000),
(44, 65, 27053, 1, 6000),
(45, 62, 27054, 1, 10000),
(46, 61, 27054, 1, 10000),
(47, 62, 27055, 1, 10000),
(48, 61, 27056, 1, 10000),
(49, 61, 27057, 1, 10000),
(50, 62, 27057, 1, 10000),
(51, 61, 27058, 1, 10000),
(52, 60, 27059, 1, 10000),
(53, 60, 27060, 1, 10000),
(54, 58, 27063, 1, 10000),
(55, 61, 27064, 1, 10000),
(56, 60, 27065, 1, 10000),
(57, 60, 27076, 2, 10000),
(58, 61, 27076, 1, 10000),
(59, 62, 27077, 1, 10000),
(60, 61, 27088, 1, 10000),
(61, 62, 27089, 1, 10000),
(62, 58, 27062, 1, 10000),
(63, 61, 27090, 1, 10000),
(64, 61, 27092, 1, 10000),
(65, 58, 27090, 1, 10000),
(66, 58, 28123, 2, 10000),
(67, 59, 28123, 1, 10000),
(68, 60, 28123, 1, 10000),
(69, 61, 28123, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passwords` varchar(40) NOT NULL,
  `my_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `jabatan`, `alamat`, `username`, `passwords`, `my_key`) VALUES
(3, 'bahtiar', 'admin', 'bantul', 'nanda', 'nanda', '0'),
(4, 'bambang', 'admin', 'Jl.Jalan', 'admin', '123', '0'),
(14, 'asukan', 'pegawai', '1 ', '1', '1 ', '12345'),
(19, 'bowo', 'pegawai', 'jateng ', 'bowo', '123', '0'),
(20, 'nanda', 'pegawai', 'ba ', 'nandakore', '123', '0'),
(21, 'nan', 'admin', 'a ', 'nan', '123', '0'),
(24, 'admin1', 'admin', 'admin ', 'admin1', '123 ', '0'),
(25, 'ipak', 'gak ada', 'gak ada', 'ipak', 'ipak', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Es Kopi Susu'),
(2, 'Manual Brew'),
(3, 'Hot'),
(4, 'Mocktail'),
(5, 'Non Kopi'),
(7, 'Teman Kopi'),
(9, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `id_ketegori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_ketegori`, `stok`, `harga`) VALUES
(58, 'Avocado', 1, 9992, 10000),
(59, 'Vanilla', 1, 9997, 10000),
(60, 'Savana', 1, 9992, 10000),
(61, 'Caramel Kopi', 1, 9988, 10000),
(62, 'Pandan Wangi', 1, 9992, 10000),
(63, 'Es Kopi Susu', 1, 9998, 8000),
(64, 'Palsu', 1, 9999, 6000),
(65, 'Lemon Black Coffe', 1, 9998, 6000),
(66, 'Mega Mendung', 1, 9999, 5000),
(67, 'V60 ', 2, 9999, 10000),
(68, 'Vietnam Drip', 2, 9999, 10000),
(69, 'Tubruk ', 2, 9999, 8000),
(70, 'Cofe Latte', 3, 9999, 12000),
(71, 'Coklat Latte', 3, 9999, 12000),
(72, 'Red Velvet Latte', 3, 9999, 12000),
(73, 'Espresso', 3, 9999, 7000),
(74, 'Americano', 3, 9999, 7000),
(75, 'Kopi Susu', 3, 9999, 5000),
(77, 'Manisan', 4, 9999, 10000),
(78, 'Perkecut', 4, 9999, 10000),
(79, 'Ocean Blue', 4, 9999, 10000),
(80, 'Sari Buah', 4, 9999, 10000),
(81, 'Coklat Manja', 5, 9998, 10000),
(82, 'Red Velvet', 5, 9999, 10000),
(83, 'Coklat', 5, 9999, 7000),
(84, 'Wedank Ndoro', 5, 9999, 6000),
(85, 'Susu Vanilla', 5, 9999, 5000),
(86, 'Es tea', 5, 9999, 5000),
(87, 'Lemon', 5, 9999, 5000),
(88, 'lemon tea', 5, 9999, 5000),
(89, 'Susu', 5, 9999, 5000),
(90, 'Mendoan', 7, 9997, 7),
(91, 'Mendoan', 7, 9997, 7),
(92, 'Kentang', 7, 9998, 7),
(93, 'Pisang Goreng', 7, 9999, 7),
(94, 'Nasi Goreng Djadoel ', 9, 9999, 10),
(95, 'Telur Balado + Nasi', 9, 9999, 10000),
(96, 'Nyemek Special', 9, 9999, 10000),
(97, 'Nyemek Biasa', 9, 9999, 7000),
(98, 'Mie Goreng', 9, 9999, 5000),
(99, 'Mie Kuah', 9, 9999, 5000),
(100, 'Tambah Telur', 9, 99999, 2000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `menuu`
-- (See below for the actual view)
--
CREATE TABLE `menuu` (
`id_menu` int(11)
,`nama_menu` varchar(50)
,`id_ketegori` int(11)
,`stok` int(11)
,`harga` int(11)
,`id_kategori` int(11)
,`nama_kategori` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_pelanggan` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_karyawan`, `nama_pelanggan`, `date`, `total_bayar`, `status`) VALUES
(27051, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27052, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27053, 4, 'Pelanggan', '2022-11-27', 26000, 'selesai'),
(27054, 4, 'Pelanggan', '2022-11-27', 20000, 'selesai'),
(27055, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27056, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27057, 4, 'Pelanggan', '2022-11-27', 20000, 'selesai'),
(27058, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27059, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27060, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27061, 4, 'Pelanggan', '2022-11-27', 0, 'selesai'),
(27062, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27063, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27064, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27065, 4, 'Pelanggan', '2022-11-27', 10000, 'selesai'),
(27076, 4, 'Pelanggan', '2022-11-27', 30000, 'selesai'),
(27077, 4, 'nanda', '2022-11-27', 10000, 'selesai'),
(27088, 4, 'nanda', '2022-11-27', 10000, 'selesai'),
(27089, 4, 'nanda', '2022-11-27', 10000, 'selesai'),
(27090, 4, 'koa', '2022-11-27', 0, 'belum'),
(27091, 4, 'nanda', '2022-11-27', 0, 'belum'),
(27092, 4, 'nanda', '2022-11-27', 0, 'belum'),
(27120, 3, 'Pelanggan', '2022-11-27', 18021, 'selesai'),
(28123, 4, 'adbib', '2022-11-28', 0, 'belum');

-- --------------------------------------------------------

--
-- Structure for view `menuu`
--
DROP TABLE IF EXISTS `menuu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menuu`  AS SELECT `menu`.`id_menu` AS `id_menu`, `menu`.`nama_menu` AS `nama_menu`, `menu`.`id_ketegori` AS `id_ketegori`, `menu`.`stok` AS `stok`, `menu`.`harga` AS `harga`, `kategori`.`id_kategori` AS `id_kategori`, `kategori`.`nama_kategori` AS `nama_kategori` FROM (`menu` join `kategori` on(`menu`.`id_ketegori` = `kategori`.`id_kategori`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_ketegori` (`id_ketegori`),
  ADD KEY `id_ketegori_2` (`id_ketegori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_ketegori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
