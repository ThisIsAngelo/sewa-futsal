-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 04:36 AM
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
-- Database: `persewaan_futsal`
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
(1, 'Chris', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Steve', '202cb962ac59075b964b07152d234b70', 0),
(3, 'Ayam', '202cb962ac59075b964b07152d234b70', 0),
(4, 'Angelo', 'bffa783a022fe2d98692014dda6d7a4c', 0),
(5, 'Pino', '202cb962ac59075b964b07152d234b70', 0),
(6, 'Fatah', '202cb962ac59075b964b07152d234b70', 0),
(7, '123', '202cb962ac59075b964b07152d234b70', 0),
(8, 'halo', '202cb962ac59075b964b07152d234b70', 0),
(9, 'asdaha', '33df1b9b8ca30f9f6b7febd0fd874f0f', 0),
(10, 'Rena', 'af7c5fe76c002dbbea7f2849716d516f', 0);

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
-- Dumping data for table `sewa_confirm`
--

INSERT INTO `sewa_confirm` (`id`, `nama_pemesan`, `no_telepon`, `tgl_pesan`, `jam`, `durasi_sewa`, `jumlah_pemain`, `lapangan`, `kostum`, `sepatu`, `total`, `bayar`) VALUES
(1, 'Chris', '0888888888', '2024-03-22', '16:00:00', 2, 10, 'indoor', 0, 0, 1500000, 1500000);

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
