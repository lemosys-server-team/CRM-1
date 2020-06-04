-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2020 at 12:51 AM
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
-- Table structure for table `tbl_mazaraat_address`
--

CREATE TABLE `tbl_mazaraat_address` (
  `id` bigint(20) NOT NULL,
  `mazaraat_id` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `mobile_no` longtext NOT NULL,
  `telephone1` longtext NOT NULL,
  `telephone2` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mazaraat_address`
--

INSERT INTO `tbl_mazaraat_address` (`id`, `mazaraat_id`, `address`, `mobile_no`, `telephone1`, `telephone2`) VALUES
(5, 5, 'Mazaar-E-Najmi\r\n\r\nQamari Marg, Ujjain,\r\nPincode-456006, Madhya Pradesh', '91-734-2559786', '91-734-2558786', '91-734-2570786'),
(6, 6, ' Mazaar-E-Noorani\r\nVohra Hajira, Kutch Mandvi, 370465.', '02834-224152', '02834-223821', '02834-231786'),
(7, 7, ' Faiz E Hakimi\r\n48, El Mansuriyah street,Darrasa, PB #11633,Cairo', '+ 2-0122-585-0324', '+2 02-25901211', '+2 02-25891945'),
(8, 8, 'Mazar-e-Qutbi \r\nAmdupura Ahmedabad (Gujrat)', 'Na', '91-79-22203475', '91-79-22203194'),
(9, 9, 'MAZAAR: DAWOODI BOHRA JAAFRI MAZAR, JAISINGH PARA, NEAR PETROL, DHARI ROAD, AMRELI-365601', 'N/A', '91-2792-223349', '91-2792-223349'),
(10, 10, ' Mazar Banswara ', 'N/A', '91-2962-242472', ''),
(12, 12, 'Mazar-e-Hakimi\r\nBurhanpur,\r\nPincode-450331, Madhya Pradesh', 'N/A', '91-7325-245152', '91-7325-245352'),
(13, 13, 'Dargah Sharief, via Aurangabad,\r\nDongaon Take, Pincode-431121, Dist. Jalna, Maharashtra', 'N/A', '91-2483-242015', 'N/A'),
(14, 14, 'Syedi Fakhruddin Shaheed Dargah,\r\nGaliyakot(Taherabad)', 'N/A', '91-2966-230052', '91-2966-230053'),
(15, 15, 'Dawoodi Bohra Musafirkhana,\r\nGodhra,Pincode-389001, Gujarat', 'N/A', '91-2672-243537', 'N/A'),
(16, 16, 'P.O-Tal. Chanasma,\r\nDist. Mehsana, Delmal, Pincode-384230, (Gujarat)', 'N/A', '91-2734-281321', '91-2734-281352'),
(17, 17, 'Dawoodi Bohra Musafirkhana, Musanji Tajshahid Rd.,\r\nPanigate,Baroda, Pincode-390017, Gujrat', 'N/A', '91-265-2561649', '02834-223821'),
(18, 18, 'Saifee Tower, Nageshwar Rd.,\r\nJamnagar,Pincode-361001, Gujarat', 'N/A', '91-288-2674452', '91-288-2556919'),
(19, 19, 'Dawoodi bohra musafir khana,\r\nOpp. bus stand.station road,khambat-388 620', 'N/A', '91-02698-226915', '91-02698-223871'),
(20, 20, 'V.C.Fatak, Morbi,\r\nDist. Rajkot, Pincode-363641, Gujarat ', 'N/A', '91-2822-221152 ', '91-2822-231786'),
(21, 21, 'Raudat Tahera Street, Bhendi Bazaar,\r\nMumbai,Pincode-400003, Maharashtra', 'N/A', '91-22-23463752', '91-22-23471265'),
(22, 22, '511, Shukrawar Bazaar,\r\nBhingar(Camp), Pincode-414002, Maharashtra ', 'N/A', '91-241-2441006', 'N/A'),
(23, 23, 'Dargah Sharief, via Aurangabad,\r\nDongaon Take, Pincode-431121, Dist. Jalna, Maharashtra', 'N/A', '91-2483-242015', 'N/A'),
(24, 24, ' Tal. Dholka, Dist. Ahmedabad\r\n Pincode-382265, Gujarat', 'N/A', '91-2714-251052', 'N/A'),
(25, 25, 'Murila, Dist. Jamnagar,\r\nPincode-361160, Gujarat', 'N/A', '91-2894-263086', 'N/A'),
(26, 26, 'Dist. Dewas,\r\nPincode-455302, Madhya Pradesh', 'N/A', '91-7271-273738/ 282181', 'N/A'),
(27, 27, 'Rampura, Dist. Mandsaur,\r\nPincode-458118, Madhya pradesh', 'N/A', '91-7421-238244 ', '91-7421-238252'),
(28, 28, 'P.O.Box - No. 1,\r\nDist. Ahmedabad, Pincode-363610, Gujarat', 'N/A', '91-2711-238352', 'N/A'),
(29, 29, 'Dawoodi Bohra Musaphirkhana,\r\nTal. Chanasma, Dist. Patan', 'N/A', '91-2734-263360', 'N/A'),
(30, 30, 'Mazar-e-Kazikhansaheb,Vohra Musafirkhana,Near Vohra Madresah,Yusufpura,Sidhpur-384151. (Gujarat)', 'N/A', '02767-220176', 'N/A'),
(31, 31, 'Devdi Mubarak, Zampa Bazaar,\r\nSurat, Pincode-395003, Gujarat', 'N/A', '91-261-2442749', '91-261-2421971'),
(32, 32, 'Near Bohra Masjid, Moiyedpura,\r\nUdaipur,Pincode-313001, Rajasthan', 'N/A', '91-294-2525607', '91-294- 2425269'),
(33, 33, 'Dawoodi Bohra Dargah, Near Bus Stand, Umreth\r\nPincode-388220, Dist Anand, Gujarat', 'N/A', '91-2692-278872', '91-2692-278852'),
(34, 34, 'Palace Rd.,\r\nWakaner', 'N/A', '91-2828-221388', 'N/A'),
(35, 35, ' Faize Husain ', '-', '', ''),
(36, 36, ' -', '-', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mazaraat_address`
--
ALTER TABLE `tbl_mazaraat_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mazaraat_address`
--
ALTER TABLE `tbl_mazaraat_address`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
