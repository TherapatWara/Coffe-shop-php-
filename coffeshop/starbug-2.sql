-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230929.1cde51cf70
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 05:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starbug-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_Id` int(11) NOT NULL,
  `bill_result` int(11) NOT NULL,
  `bill_Date` date NOT NULL,
  `bill_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_Id`, `bill_result`, `bill_Date`, `bill_Time`) VALUES
(1, 30, '2023-10-10', '19:59:06'),
(2, 100, '2023-10-04', '06:20:59'),
(3, 150, '2023-10-05', '13:16:19'),
(4, 60, '2023-03-23', '22:39:27'),
(5, 70, '2023-04-07', '23:17:30'),
(6, 75, '2023-04-07', '23:17:30'),
(7, 70, '0000-00-00', '23:17:30'),
(8, 75, '2023-05-03', '23:17:30'),
(9, 70, '2023-05-04', '23:17:30'),
(10, 60, '2023-05-05', '20:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_Id` int(11) NOT NULL,
  `emp_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_Phone` int(10) NOT NULL,
  `emp_DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_Id`, `emp_Name`, `emp_Phone`, `emp_DOB`) VALUES
(1000, 'Sebastian', 965430021, '2000-06-06'),
(1001, 'Alexander', 866435621, '1999-02-05'),
(1002, 'Henry', 690983564, '2001-09-17'),
(1003, 'Jacob', 800122423, '2001-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `makings`
--

CREATE TABLE `makings` (
  `making_No` int(11) NOT NULL,
  `making_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_Id` int(11) NOT NULL,
  `bill_Id` int(11) NOT NULL,
  `menu_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `makings`
--

INSERT INTO `makings` (`making_No`, `making_detail`, `emp_Id`, `bill_Id`, `menu_No`) VALUES
(1, 'cool', 1000, 1, 1),
(2, 'cool', 1001, 2, 8),
(3, 'cool', 1001, 2, 8),
(4, 'cool', 1001, 3, 8),
(5, 'cool', 1001, 3, 8),
(6, 'cool', 1001, 3, 8),
(7, 'cool', 1002, 4, 1),
(8, 'cool', 1002, 4, 2),
(9, '', 1000, 5, 11),
(10, '', 1000, 5, 17),
(11, '', 1002, 6, 5),
(12, '', 1002, 6, 7),
(13, '', 1003, 7, 21),
(14, '', 1003, 7, 20),
(15, '', 1003, 8, 9),
(16, '', 1003, 8, 6),
(17, '', 1001, 9, 23),
(18, '', 1001, 9, 24),
(19, '', 1000, 10, 13),
(20, '', 1000, 10, 13),
(21, '', 1003, 7, 21);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_No` int(11) NOT NULL,
  `menu_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_No`, `menu_Name`, `price`) VALUES
(1, 'americano', 30),
(2, 'blackcoffee', 30),
(3, 'cappuccino', 40),
(4, 'coffeeborand', 35),
(5, 'espresso', 35),
(6, 'Frappuccino', 40),
(7, 'latte', 40),
(8, 'blackcoffee-Yuzu', 50),
(9, 'blackcoffee-Orange', 35),
(10, 'mocca', 40),
(11, 'berrytea', 30),
(12, 'coco', 30),
(13, 'greentea', 30),
(14, 'matcha', 40),
(15, 'peachtea', 30),
(16, 'thaitea', 35),
(17, 'lemon-tea', 30),
(18, 'limehoney', 55),
(19, 'apple-soda', 35),
(20, 'blue-hawaii', 35),
(21, 'roselle-juice', 35),
(22, 'lemon-soda', 55),
(23, 'mango-soda', 35),
(24, 'rasberry', 35),
(25, 'red-lemon', 40),
(26, 'strawberry-soda', 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_Id`);

--
-- Indexes for table `makings`
--
ALTER TABLE `makings`
  ADD PRIMARY KEY (`making_No`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `makings`
--
ALTER TABLE `makings`
  MODIFY `making_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
