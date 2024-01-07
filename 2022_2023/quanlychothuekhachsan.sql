-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 05, 2024 at 04:00 PM
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
-- Database: `quanlychothuekhachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` varchar(255) NOT NULL,
  `TENHD` varchar(255) DEFAULT NULL,
  `MAKH` varchar(255) DEFAULT NULL,
  `TONGTIEN` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `TENHD`, `MAKH`, `TONGTIEN`) VALUES
('HD001', 'Hóa đơn 1', 'KH001', 500.00),
('HD002', 'Hóa đơn 2', 'KH002', 700.50),
('HD003', 'Hóa đơn 3', 'KH003', 450.75),
('HD004', 'Hóa đơn 4', 'KH004', 600.25),
('HD005', 'Hóa đơn 5', 'KH005', 800.00);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(255) NOT NULL,
  `TENKH` varchar(255) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `CCCN` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `SDT`, `CCCN`) VALUES
('KH001', 'Nguyen Van A', '0123456789', 'CCCN001'),
('KH002', 'Tran Thi B', '0987654321', 'CCCN002'),
('KH003', 'Le Van C', '0345678901', 'CCCN003'),
('KH004', 'Pham Thi D', '0765432109', 'CCCN004'),
('KH005', 'Hoang Van E', '0234567890', 'CCCN005');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MAPHONG` varchar(255) NOT NULL,
  `TENPHONG` varchar(255) DEFAULT NULL,
  `TINHTRANG` varchar(20) DEFAULT NULL,
  `LOAIPHONG` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MAPHONG`, `TENPHONG`, `TINHTRANG`, `LOAIPHONG`) VALUES
('P001', 'Phòng 101', 'Chưa thuê', 'Phòng đơn'),
('P002', 'Phòng 102', 'Đã thuê', 'Phòng đôi'),
('P003', 'Phòng 103', 'Chưa thuê', 'Phòng đơn'),
('P004', 'Phòng 104', 'Chưa thuê', 'Phòng đơn'),
('P005', 'Phòng 105', 'Đã thuê', 'Phòng đôi');

-- --------------------------------------------------------

--
-- Table structure for table `thue`
--

CREATE TABLE `thue` (
  `MAHD` varchar(255) NOT NULL,
  `MAPHONG` varchar(255) NOT NULL,
  `NGAYTHUE` date DEFAULT NULL,
  `NGAYTRA` date DEFAULT NULL,
  `GIATHUE` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thue`
--

INSERT INTO `thue` (`MAHD`, `MAPHONG`, `NGAYTHUE`, `NGAYTRA`, `GIATHUE`) VALUES
('HD001', 'P001', '2024-01-01', '2024-01-05', 100.00),
('HD002', 'P002', '2024-02-10', '2024-02-15', 120.50),
('HD003', 'P003', '2024-03-20', '2024-03-25', 90.75),
('HD004', 'P004', '2024-04-05', '2024-04-10', 110.25),
('HD005', 'P005', '2024-05-15', '2024-05-20', 150.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MAPHONG`);

--
-- Indexes for table `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`MAHD`,`MAPHONG`),
  ADD KEY `MAPHONG` (`MAPHONG`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Constraints for table `thue`
--
ALTER TABLE `thue`
  ADD CONSTRAINT `thue_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `thue_ibfk_2` FOREIGN KEY (`MAPHONG`) REFERENCES `phong` (`MAPHONG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
