-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 07, 2024 at 06:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlytour`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiet`
--

CREATE TABLE `chitiet` (
  `MaTour` varchar(50) NOT NULL,
  `MaDDL` varchar(50) NOT NULL,
  `Ngay` decimal(3,1) NOT NULL,
  `Dem` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiet`
--

INSERT INTO `chitiet` (`MaTour`, `MaDDL`, `Ngay`, `Dem`) VALUES
('T1', 'DL1', 3.5, 3.0),
('T2', 'DL2', 2.0, 2.0),
('T3', 'DL3', 2.5, 2.0),
('T4', 'DL4', 5.0, 5.0),
('T5', 'DL5', 1.5, 1.0);

-- --------------------------------------------------------

--
-- Table structure for table `diemdl`
--

CREATE TABLE `diemdl` (
  `MaDDL` varchar(50) NOT NULL,
  `TenDDL` varchar(255) NOT NULL,
  `MaTTP` varchar(50) DEFAULT NULL,
  `Dactrung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diemdl`
--

INSERT INTO `diemdl` (`MaDDL`, `TenDDL`, `MaTTP`, `Dactrung`) VALUES
('DL1', 'Bãi Trước - Cần Giờ', 'TPHCM', 'Tắm biển'),
('DL2', 'Hồ Gươm', 'HN', 'Thăm quan'),
('DL3', 'Bãi Ông Địa', 'DN', 'Leo núi'),
('DL4', 'Vinpearl Land', 'NT', 'Mua sắm'),
('DL5', 'Cầu Rồng', 'DN', 'Thăm quan');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtp`
--

CREATE TABLE `tinhtp` (
  `MaTTP` varchar(50) NOT NULL,
  `TenTTP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tinhtp`
--

INSERT INTO `tinhtp` (`MaTTP`, `TenTTP`) VALUES
('DN', 'Đà Nẵng'),
('HN', 'Hà Nội'),
('HUE', 'Huế'),
('NT', 'Nha Trang'),
('TPHCM', 'Thành phố Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `MaTour` varchar(50) NOT NULL,
  `TenTour` varchar(255) NOT NULL,
  `NgayKhoiHanh` date NOT NULL,
  `SoNgay` int(11) NOT NULL,
  `SoDem` int(11) NOT NULL,
  `Gia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`MaTour`, `TenTour`, `NgayKhoiHanh`, `SoNgay`, `SoDem`, `Gia`) VALUES
('T1', 'Tour Hồ Chí Minh - Cần Giờ', '2024-01-07', 7, 6, 15000000.00),
('T2', 'Tour Hà Nội - Hồ Gươm', '2024-01-07', 5, 4, 12000000.00),
('T3', 'Tour Đà Nẵng - Bãi Ông Địa', '2024-01-07', 6, 5, 13000000.00),
('T4', 'Tour Nha Trang - Vinpearl Land', '2024-01-07', 8, 7, 18000000.00),
('T5', 'Tour Đà Nẵng - Cầu Rồng', '2024-01-07', 4, 3, 10000000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiet`
--
ALTER TABLE `chitiet`
  ADD PRIMARY KEY (`MaTour`,`MaDDL`),
  ADD KEY `MaDDL` (`MaDDL`);

--
-- Indexes for table `diemdl`
--
ALTER TABLE `diemdl`
  ADD PRIMARY KEY (`MaDDL`),
  ADD KEY `MaTTP` (`MaTTP`);

--
-- Indexes for table `tinhtp`
--
ALTER TABLE `tinhtp`
  ADD PRIMARY KEY (`MaTTP`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`MaTour`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiet`
--
ALTER TABLE `chitiet`
  ADD CONSTRAINT `chitiet_ibfk_1` FOREIGN KEY (`MaTour`) REFERENCES `tour` (`MaTour`),
  ADD CONSTRAINT `chitiet_ibfk_2` FOREIGN KEY (`MaDDL`) REFERENCES `diemdl` (`MaDDL`);

--
-- Constraints for table `diemdl`
--
ALTER TABLE `diemdl`
  ADD CONSTRAINT `diemdl_ibfk_1` FOREIGN KEY (`MaTTP`) REFERENCES `tinhtp` (`MaTTP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
