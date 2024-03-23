-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 05:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `harga_sewa`
--

CREATE TABLE `harga_sewa` (
  `id` int(11) NOT NULL,
  `reguler_indoor` int(25) NOT NULL,
  `matras_indoor` int(25) NOT NULL,
  `rumput_indoor` int(25) NOT NULL,
  `reguler_outdoor` int(25) NOT NULL,
  `matras_outdoor` int(25) NOT NULL,
  `rumput_outdoor` int(25) NOT NULL,
  `sepatu_tambahan` int(25) NOT NULL,
  `kostum_tambahan` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga_sewa`
--

INSERT INTO `harga_sewa` (`id`, `reguler_indoor`, `matras_indoor`, `rumput_indoor`, `reguler_outdoor`, `matras_outdoor`, `rumput_outdoor`, `sepatu_tambahan`, `kostum_tambahan`) VALUES
(1, 300000, 250000, 200000, 250000, 200000, 150000, 50000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `sewa_confirm`
--

CREATE TABLE `sewa_confirm` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jam` time NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `jumlah_pemain` int(11) NOT NULL,
  `lapangan` varchar(7) NOT NULL,
  `kostum` int(11) NOT NULL,
  `sepatu` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `harga_sewa`
--
ALTER TABLE `harga_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa_confirm`
--
ALTER TABLE `sewa_confirm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `harga_sewa`
--
ALTER TABLE `harga_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sewa_confirm`
--
ALTER TABLE `sewa_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
