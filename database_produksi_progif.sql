-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 11:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_produksi_progif`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `databaseitem`
--

CREATE TABLE `databaseitem` (
  `no_item` int(4) NOT NULL,
  `nama_barang` varchar(40) DEFAULT NULL,
  `bahan` varchar(40) DEFAULT NULL,
  `stock_bahan` int(16) DEFAULT NULL,
  `keperluan_per_item` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `databaseitem`
--

INSERT INTO `databaseitem` (`no_item`, `nama_barang`, `bahan`, `stock_bahan`, `keperluan_per_item`) VALUES
(1, 'Ring Abu', 'HD', -13000, 15),
(2, 'Corong', 'HI PS', 6000, 10),
(3, 'Stick Pen Besar', 'PP', 2000, 10),
(4, 'Tutup Diamond', 'Block', -16000, 20),
(5, 'Tempat Makan', 'PP', 4000, 25),
(6, 'Tutup Baru Progia', 'HD', 2000, 10),
(7, 'Tutup Plastik Aqua', 'Block', 6000, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databaseitem`
--
ALTER TABLE `databaseitem`
  ADD PRIMARY KEY (`no_item`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databaseitem`
--
ALTER TABLE `databaseitem`
  MODIFY `no_item` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
