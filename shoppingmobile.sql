-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 06:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingmobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyphone`
--

CREATE TABLE `buyphone` (
  `phoneid` int(20) NOT NULL,
  `customerid` int(20) NOT NULL,
  `merchentid` int(20) NOT NULL,
  `merchentphoneid` int(20) NOT NULL,
  `bookingdate` varchar(200) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyphone`
--

INSERT INTO `buyphone` (`phoneid`, `customerid`, `merchentid`, `merchentphoneid`, `bookingdate`, `status`) VALUES
(31, 26, 1, 8, '2020-07-13', 1),
(32, 26, 1, 9, '2020-07-13', 1),
(33, 26, 1, 11, '2020-07-13', 1),
(34, 26, 1, 7, '2020-07-13', 1),
(36, 26, 1, 11, '2020-07-13', 1),
(37, 26, 1, 10, '2020-07-13 11:24:18am', 1),
(38, 26, 1, 14, '2020-07-13 02:49:49pm', 1),
(39, 26, 1, 10, '2020-07-13 05:12:29pm', 1),
(40, 26, 7, 15, '2020-07-13 05:44:07pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `comment`) VALUES
(4, 'deepak rajak', 'deepak@gmail.com', 'this is best website'),
(5, 'akash rajak', 'akash@gmail.com', 'best'),
(6, 'akash rajak', 'akash@gmail.com', 'best'),
(7, 'akash rajak', 'akash@gmail.com', 'best'),
(8, '', '', ''),
(9, '', '', ''),
(10, 'deepak@gmail.com', 'deepak@gmail.com', ''),
(11, 'deepak@gmail.com', 'deepak@gmail.com', ''),
(12, 'deepak@gmail.com', 'deepak@gmail.com', ''),
(13, 'akash@gmail.com', 'akash@gmail.com', ''),
(14, 'akash@gmail.com', 'akash@gmail.com', ''),
(15, 'suraj@gmail.com', 'suraj@gmail.com', ''),
(16, '', '', ''),
(17, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customerregister`
--

CREATE TABLE `customerregister` (
  `customer_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerregister`
--

INSERT INTO `customerregister` (`customer_id`, `first_name`, `last_name`, `email`, `phone_number`, `state`, `pin_code`, `address`, `password`) VALUES
(26, 'deepak', 'rajak', 'deepak2@gmail.com', '7739783100', 'Assam', '825318', 'ghurmunda', '12345'),
(27, 'akash', 'kumar', 'akash@gmail.com', '1234567890', 'Arunachal Pradesh', '543254', 'stgytrtryhtrhytr6', '12345'),
(29, 'Dolly', 'Kumari', 'dolly@gmail.com', '6207238787', 'Bihar', '837498', 'chandarpura bokaro gomho jharkhand', '12345'),
(30, 'sandeep', 'kumar', 'sandeep@gmail.com', '9345793457', 'Himachal Pradesh', '323435', 'ghurmunda parsabad jainagar koderma', '12345'),
(31, 'suraj', 'kumar', 'suraj@gmail.com', '6347832643', 'Chhattisgarh', '324234', 'ghurmunda', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `merchentregister`
--

CREATE TABLE `merchentregister` (
  `merchent_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchentregister`
--

INSERT INTO `merchentregister` (`merchent_id`, `name`, `email`, `number`, `state`, `pincode`, `address`, `password`) VALUES
(1, 'deepak rajak', 'deepak@gmail.com', '7739783100', 'Bihar', 345345, 'ghurmunda', '12345'),
(6, 'chotu', 'chotu@gmail.com', '1234567890', 'Chhattisgarh', 342342, 'ghurmunda parsabad', '12345'),
(7, 'akash', 'akash@gmail.com', '9934149170', 'Jharkhand', 825318, 'ghurmunda', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `merchent_phone_details`
--

CREATE TABLE `merchent_phone_details` (
  `mobile_id` int(10) NOT NULL,
  `merchent_id` int(10) NOT NULL,
  `mobile_name` varchar(100) NOT NULL,
  `mobile_max_prize` varchar(10) NOT NULL,
  `about_mobile` varchar(200) NOT NULL,
  `mobile_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchent_phone_details`
--

INSERT INTO `merchent_phone_details` (`mobile_id`, `merchent_id`, `mobile_name`, `mobile_max_prize`, `about_mobile`, `mobile_image`) VALUES
(7, 1, 'mi', '5000', 'this is best phone', 'merchentphone/5f021302198ea1.jpg'),
(8, 1, 'mi', '5000', 'this is best phone', 'merchentphone/5f02131032a801.jpg'),
(9, 1, 'vivo', '4423', 'this is best phone', 'merchentphone/5f0215e4cb3351.jpg'),
(10, 1, 'one plus', '20000', 'aosm phone ever', 'merchentphone/5f029537b45241.jpg'),
(11, 1, 'oppo', '7000', 'nice phone', 'merchentphone/5f02986381ee31.jpg'),
(12, 1, 'apple', '8000', 'best phone', 'merchentphone/5f0298823cc781.jpg'),
(13, 6, 'apple', '40000', 'this is best phone', 'merchentphone/5f05645232bb71.jpg'),
(14, 1, 'marwari', '80000', 'best', 'merchentphone/5f0c582fd7efb5f02115890dc0a.jpg'),
(15, 7, 'redmi', '10000', 'best phone', 'merchentphone/5f0c7f89188a35f02115890dc0a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyphone`
--
ALTER TABLE `buyphone`
  ADD PRIMARY KEY (`phoneid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerregister`
--
ALTER TABLE `customerregister`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `merchentregister`
--
ALTER TABLE `merchentregister`
  ADD PRIMARY KEY (`merchent_id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `merchent_phone_details`
--
ALTER TABLE `merchent_phone_details`
  ADD PRIMARY KEY (`mobile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyphone`
--
ALTER TABLE `buyphone`
  MODIFY `phoneid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customerregister`
--
ALTER TABLE `customerregister`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `merchentregister`
--
ALTER TABLE `merchentregister`
  MODIFY `merchent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merchent_phone_details`
--
ALTER TABLE `merchent_phone_details`
  MODIFY `mobile_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
