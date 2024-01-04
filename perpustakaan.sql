-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 02:02 PM
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
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Code` char(5) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Code`, `Title`, `Author`, `Publisher`, `Stock`) VALUES
('B001', 'Tips Maxwin Bersama Zeus', 'Papa Zeus', 'Gacor99', 99),
('B002', 'Mengatasi Rungkad Tanpa Pinjol', 'Papa Kratos', 'Gacor99', 88),
('B003', 'Belajar Web Penetration Tester', 'Hacker Gacor', 'Mamank 4 Sec', 50),
('B004', 'XSS Inject Manual', 'Mamank Backdoor', 'Anjay 4 Sec', 50),
('B005', 'SQL Injection', 'Kang Gacor', 'Gacor Kang', 30),
('B006', 'Trik Menang Judi Bola', 'Kang Judi', 'Kantor Bola 88', 99),
('B007', 'Makanan Extra Ordinary', 'Pood Ploger', 'Makan Cuy ', 30),
('B008', 'Jejak si Bungul', 'Bungul', 'Petualang Gacor', 10),
('B009', 'ABCDEFG', 'ABCD', 'Lorem Ipsum', 30);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(5) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `member_username` varchar(12) NOT NULL,
  `member_password` text NOT NULL,
  `member_gender` varchar(20) NOT NULL,
  `member_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_username`, `member_password`, `member_gender`, `member_photo`) VALUES
(2001, 'Agus Nurjaman', 'agus01', '12345', 'Male', 'Ada'),
(2002, 'Ujang', 'ujangarut', '12345', 'Male', 'Ada'),
(2003, 'Ucup Bansal', 'ucupbansal', '123456', 'Male', 'Ada'),
(2004, 'Wisnu', 'wisnubansal', '1234', 'Male', 'Yes'),
(2005, 'Chandra Wijayanto', 'wisnugacor', '123123123', 'Female', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `return_id` int(5) NOT NULL,
  `member_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `member_id`) VALUES
(5001, 3001);

-- --------------------------------------------------------

--
-- Table structure for table `returns_detail`
--

CREATE TABLE `returns_detail` (
  `return_detail_id` int(5) NOT NULL,
  `return_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `return_date` date NOT NULL,
  `penalty` int(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns_detail`
--

INSERT INTO `returns_detail` (`return_detail_id`, `return_id`, `book_id`, `return_date`, `penalty`, `description`) VALUES
(5501, 5001, 1001, '2023-12-10', 10000, 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(5) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_username` varchar(12) NOT NULL,
  `staff_password` text NOT NULL,
  `staff_gender` varchar(20) NOT NULL,
  `level` text NOT NULL,
  `staff_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_username`, `staff_password`, `staff_gender`, `level`, `staff_photo`) VALUES
('ST01', 'Agus Suryanto', 'agus01', '12345', 'Male', 'staff', 'Yes'),
('ST02', 'Ujang', 'ujangarut', '12345', 'Male', 'staff', 'Yes'),
('ST03', 'Neneng', 'neneng0305', '12345', 'Female', 'staff', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `taker`
--

CREATE TABLE `taker` (
  `taker_id` int(5) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taker`
--

INSERT INTO `taker` (`taker_id`, `member_id`, `staff_id`, `date`, `time`) VALUES
(4001, '2001', 'ST01', '2023-11-24', '20:18:04'),
(4002, '2002', 'ST01', '2023-11-16', '20:15:48'),
(4003, '2006', 'ST03', '2023-11-17', '20:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `taker_detail`
--

CREATE TABLE `taker_detail` (
  `taker_detail_id` int(5) NOT NULL,
  `taker_id` varchar(5) NOT NULL,
  `book_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taker_detail`
--

INSERT INTO `taker_detail` (`taker_detail_id`, `taker_id`, `book_id`) VALUES
(4, '4001', 'B003'),
(13, '4002', 'B001'),
(14, '4002', 'B002'),
(15, '4002', 'B003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `returns_detail`
--
ALTER TABLE `returns_detail`
  ADD PRIMARY KEY (`return_detail_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `taker`
--
ALTER TABLE `taker`
  ADD PRIMARY KEY (`taker_id`);

--
-- Indexes for table `taker_detail`
--
ALTER TABLE `taker_detail`
  ADD PRIMARY KEY (`taker_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `return_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;

--
-- AUTO_INCREMENT for table `returns_detail`
--
ALTER TABLE `returns_detail`
  MODIFY `return_detail_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5502;

--
-- AUTO_INCREMENT for table `taker`
--
ALTER TABLE `taker`
  MODIFY `taker_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4011;

--
-- AUTO_INCREMENT for table `taker_detail`
--
ALTER TABLE `taker_detail`
  MODIFY `taker_detail_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
