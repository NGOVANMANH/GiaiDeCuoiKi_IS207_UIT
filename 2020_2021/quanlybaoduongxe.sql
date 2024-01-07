-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 06, 2024 at 02:12 PM
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
-- Database: `quanlybaoduongxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `baoduong`
--

CREATE TABLE `baoduong` (
  `MABD` varchar(10) NOT NULL,
  `NGAYNHAN` date DEFAULT NULL,
  `NGAYTRA` date DEFAULT NULL,
  `SOKM` int(11) DEFAULT NULL,
  `NOIDUNG` varchar(255) DEFAULT NULL,
  `SOXE` varchar(10) DEFAULT NULL,
  `THANHTIEN` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baoduong`
--

INSERT INTO `baoduong` (`MABD`, `NGAYNHAN`, `NGAYTRA`, `SOKM`, `NOIDUNG`, `SOXE`, `THANHTIEN`) VALUES
('BD001', '2023-01-01', '2023-01-05', 10000, 'Thay nhớt và lọc dầu', 'X001', 150.00),
('BD002', '2023-02-01', '2023-02-05', 12000, 'Kiểm tra hệ thống phanh', 'X002', 200.00),
('BD003', '2023-03-01', '2023-03-05', 8000, 'Bảo dưỡng định kỳ', 'X003', 180.00),
('BD004', '2023-04-01', '2023-04-05', 15000, 'Thay nước làm mát', 'X004', 220.00),
('BD005', '2023-05-01', '2023-05-05', 11000, 'Kiểm tra hệ thống điều hòa', 'X005', 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `congviec`
--

CREATE TABLE `congviec` (
  `MACV` varchar(10) NOT NULL,
  `TENCV` varchar(50) DEFAULT NULL,
  `DONGIA` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `congviec`
--

INSERT INTO `congviec` (`MACV`, `TENCV`, `DONGIA`) VALUES
('CV001', 'Thay nhớt và lọc dầu', 50.00),
('CV002', 'Kiểm tra hệ thống phanh', 80.00),
('CV003', 'Bảo dưỡng định kỳ', 70.00),
('CV004', 'Thay nước làm mát', 90.00),
('CV005', 'Kiểm tra hệ thống điều hòa', 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `ct_bd`
--

CREATE TABLE `ct_bd` (
  `MABD` varchar(10) NOT NULL,
  `MACV` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ct_bd`
--

INSERT INTO `ct_bd` (`MABD`, `MACV`) VALUES
('BD001', 'CV001'),
('BD002', 'CV002'),
('BD003', 'CV003'),
('BD004', 'CV004'),
('BD005', 'CV005');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(10) NOT NULL,
  `HOTENKH` varchar(50) DEFAULT NULL,
  `DIACHI` varchar(100) DEFAULT NULL,
  `DIENTHOAI` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `HOTENKH`, `DIACHI`, `DIENTHOAI`) VALUES
('KH001', 'Nguyen Van A', '123 ABC Street', '0123456789'),
('KH002', 'Tran Thi B', '456 XYZ Street', '0987654321'),
('KH003', 'Le Van C', '789 DEF Street', '0111222333'),
('KH004', 'Pham Thi D', '987 GHI Street', '0444555666'),
('KH005', 'Hoang Van E', '654 JKL Street', '0777888999');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `SOXE` varchar(10) NOT NULL,
  `HANGXE` varchar(50) DEFAULT NULL,
  `NAMSX` int(11) DEFAULT NULL,
  `MAKH` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`SOXE`, `HANGXE`, `NAMSX`, `MAKH`) VALUES
('X001', 'Toyota', 2019, 'KH001'),
('X002', 'Honda', 2020, 'KH002'),
('X003', 'Ford', 2018, 'KH003'),
('X004', 'Chevrolet', 2021, 'KH004'),
('X005', 'Nissan', 2017, 'KH005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baoduong`
--
ALTER TABLE `baoduong`
  ADD PRIMARY KEY (`MABD`),
  ADD KEY `SOXE` (`SOXE`);

--
-- Indexes for table `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`MACV`);

--
-- Indexes for table `ct_bd`
--
ALTER TABLE `ct_bd`
  ADD PRIMARY KEY (`MABD`,`MACV`),
  ADD KEY `MACV` (`MACV`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`SOXE`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baoduong`
--
ALTER TABLE `baoduong`
  ADD CONSTRAINT `baoduong_ibfk_1` FOREIGN KEY (`SOXE`) REFERENCES `xe` (`SOXE`);

--
-- Constraints for table `ct_bd`
--
ALTER TABLE `ct_bd`
  ADD CONSTRAINT `ct_bd_ibfk_1` FOREIGN KEY (`MABD`) REFERENCES `baoduong` (`MABD`),
  ADD CONSTRAINT `ct_bd_ibfk_2` FOREIGN KEY (`MACV`) REFERENCES `congviec` (`MACV`);

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
