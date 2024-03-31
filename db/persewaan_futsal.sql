-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 07:17 AM
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
(31, 'Admin', '$2y$10$sHuA6it7h8NpiRNrFAjpKOnb1BRtCQRHt9SiwNWitjrj7X2Z.K06.', 1),
(32, 'Steve', '$2y$10$8wr.hJWVwXAyWuQK3pxH3OYGDxx/R053HdjP5Br.H.2LGnDGA3Lcm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jam` time NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `jumlah_pemain` int(11) NOT NULL,
  `lapangan` varchar(7) NOT NULL,
  `jenis_lapangan` varchar(10) NOT NULL,
  `kostum` int(11) NOT NULL,
  `sepatu` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sewa_confirm`
--

CREATE TABLE `sewa_confirm` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jam` time NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `jumlah_pemain` int(11) NOT NULL,
  `lapangan` varchar(7) NOT NULL,
  `jenis_lapangan` varchar(10) NOT NULL,
  `kostum` int(11) NOT NULL,
  `sepatu` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sewa_user`
--

CREATE TABLE `sewa_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `jam` time NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `jumlah_pemain` int(11) NOT NULL,
  `lapangan` varchar(7) NOT NULL,
  `jenis_lapangan` varchar(10) NOT NULL,
  `kostum` int(11) NOT NULL,
  `sepatu` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_lapangan_indoor`
--

CREATE TABLE `status_lapangan_indoor` (
  `id` int(11) NOT NULL,
  `jenis_lapangan` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_lapangan_indoor`
--

INSERT INTO `status_lapangan_indoor` (`id`, `jenis_lapangan`, `status`) VALUES
(1, 'Reguler', 0),
(2, 'Matras', 1),
(3, 'Rumput', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_lapangan_outdoor`
--

CREATE TABLE `status_lapangan_outdoor` (
  `id` int(11) NOT NULL,
  `jenis_lapangan` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_lapangan_outdoor`
--

INSERT INTO `status_lapangan_outdoor` (`id`, `jenis_lapangan`, `status`) VALUES
(1, 'Reguler', 1),
(2, 'Matras', 1),
(3, 'Rumput', 0);

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
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sewa_confirm`
--
ALTER TABLE `sewa_confirm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sewa_user`
--
ALTER TABLE `sewa_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `status_lapangan_indoor`
--
ALTER TABLE `status_lapangan_indoor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_lapangan_outdoor`
--
ALTER TABLE `status_lapangan_outdoor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sewa_confirm`
--
ALTER TABLE `sewa_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `sewa_user`
--
ALTER TABLE `sewa_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `status_lapangan_indoor`
--
ALTER TABLE `status_lapangan_indoor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_lapangan_outdoor`
--
ALTER TABLE `status_lapangan_outdoor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Constraints for table `sewa_confirm`
--
ALTER TABLE `sewa_confirm`
  ADD CONSTRAINT `sewa_confirm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Constraints for table `sewa_user`
--
ALTER TABLE `sewa_user`
  ADD CONSTRAINT `sewa_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
