-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2020 at 12:52 AM
-- Server version: 5.7.29
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aajnodin_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mazaraat`
--

CREATE TABLE `tbl_mazaraat` (
  `id` bigint(20) NOT NULL,
  `country` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mazaraat`
--

INSERT INTO `tbl_mazaraat` (`id`, `country`, `city`) VALUES
(6, 'India', 'Mandvi Kutch'),
(5, 'India', 'Ujjain - mp'),
(7, 'Egypt', 'Cairo'),
(8, 'India', 'Ahmedabad'),
(9, 'India', 'Amreli'),
(10, 'India', 'Banswara'),
(12, 'India', 'Burhanpur'),
(13, 'India', 'Aurangabad'),
(14, 'India', 'Galiakot'),
(15, 'India', 'Godhra'),
(16, 'India', 'Hasanpheer saheb (denmaal)'),
(17, 'India', 'Baroda'),
(18, 'India', 'Jamnagar'),
(19, 'India', 'Khambat'),
(20, 'India', 'Morbi'),
(21, 'India', 'Mumbai'),
(22, 'India', 'Ahmednagar'),
(23, 'India', 'Dongaon'),
(24, 'India', 'Pisawada (gujrat)'),
(25, 'India', 'Kalawad'),
(26, 'India', 'Kamlapur'),
(27, 'India', 'Rampura'),
(28, 'India', 'Ranpur'),
(29, 'India', 'Selavi'),
(30, 'India', 'Sidhpur'),
(31, 'India', 'Surat'),
(32, 'India', 'Udaipur'),
(33, 'India', 'Umreth'),
(34, 'India', 'Wankaner'),
(35, 'Iraq', 'Karbala'),
(36, 'Iraq', 'Najaf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mazaraat`
--
ALTER TABLE `tbl_mazaraat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mazaraat`
--
ALTER TABLE `tbl_mazaraat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
