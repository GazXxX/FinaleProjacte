-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 08:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `harga_pembelian` double NOT NULL,
  `qty_pembelian` int(11) NOT NULL,
  `nota_pembelian` varchar(20) NOT NULL,
  `status_pembelian` enum('Lunas','Hutang') NOT NULL DEFAULT 'Hutang'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `supplier_id`, `produk_id`, `tanggal_pembelian`, `harga_pembelian`, `qty_pembelian`, `nota_pembelian`, `status_pembelian`) VALUES
(2, 2, 2, '2018-05-05', 123, 1, 'zf1', 'Lunas'),
(4, 3, 12, '2018-05-06', 200000, 22, 'NOTA1112', 'Hutang'),
(6, 4, 2, '2018-06-30', 8000000, 8, 'NOTA001', 'Lunas'),
(8, 3, 12, '2018-06-06', 666000, 666, 'NOTA666', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `harga_penjualan` double NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `produk_id`, `tanggal_penjualan`, `harga_penjualan`, `keterangan`) VALUES
(1, 28, '2018-06-26', 4000000, 'Sedang dikirim'),
(3, 4, '2018-06-25', 2300000, 'Gaming Laptop'),
(4, 16, '2018-06-28', 10000000, 'Lenovo Gaming Legion');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(7) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `qty_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `qty_produk`) VALUES
(2, 'LP00001', 'ASUS Lenovo', 123),
(4, 'GN0100', 'Gaming Nonepsal', 9),
(8, '001asd', 'Hanmeo', 3),
(10, 'LO0001', 'Lombre', 12),
(11, 'HC000', 'HimpamCoder', 12),
(12, 'STN666', 'Satan Snack', 666),
(13, 'JK0001', 'Jakakaka', 22),
(14, 'KM9281', 'Kemeja', 344),
(15, 'LK086', 'Lkfsgnuyfhi', 9),
(16, 'LG1001', 'Lenovo Legion', 50),
(18, '1234', 'hahahah', 999),
(19, '1231410', 'jalsdjlasjdl', 888),
(21, '189237d', 'ladadadada1', 33),
(22, 'JKJKJ12', 'mamamama', 1),
(27, '32443eq', 'ew', 1),
(28, 'DF00019', 'Dufan tasy', 22),
(29, 'JL0018', 'Jelangkung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(25) NOT NULL,
  `kontak_supplier` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kontak_supplier`, `alamat`) VALUES
(2, 'CV Immortality', '0274756232', 'Imogiri, Bantul'),
(3, 'PT GigaMega', '08924712346', 'Godean, Sleman'),
(4, 'ASN Computer', '027541231', 'Babarasri, Sleman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `pass` varchar(40) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `pass`, `name`) VALUES
('admin', 'd28f54c8652e1330956f74ac5b607b58', 'Administrator'),
('vader', '81dc9bdb52d04dc20036dbd8313ed055', 'Lord Vader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `pembelian_ibfk_2` (`produk_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
