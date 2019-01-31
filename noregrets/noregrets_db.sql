-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 12:36 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noregrets_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` bigint(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL,
  `pass_id` bigint(20) NOT NULL,
  `pass_price` float NOT NULL COMMENT 'single pass amount',
  `no_of_pass` varchar(10) NOT NULL,
  `amount` float NOT NULL COMMENT 'total price of pass (qty*signlepassamount)',
  `payment_status` int(1) NOT NULL COMMENT '1-success,0-fail',
  `status` text NOT NULL,
  `txnid` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `fname`, `lname`, `email`, `mobile`, `date`, `pass_id`, `pass_price`, `no_of_pass`, `amount`, `payment_status`, `status`, `txnid`, `createdAt`) VALUES
(1, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 09:56:30'),
(2, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 09:57:25'),
(3, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 09:57:39'),
(4, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 09:57:53'),
(5, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:01:50'),
(6, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:02:24'),
(7, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:03:28'),
(8, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:04:14'),
(9, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:04:25'),
(10, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:04:55'),
(11, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:06:05'),
(12, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:06:21'),
(13, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:08:50'),
(14, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:09:09'),
(15, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:09:51'),
(16, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:10:01'),
(17, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:10:13'),
(18, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '9922031316', '21-12-2017', 1, 900, '2', 1800, 0, '1', '1234', '2017-12-21 10:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `createdAt`) VALUES
(1, 'Stag', '2017-12-19 17:15:25'),
(2, 'Couple', '2017-12-19 17:15:25'),
(3, 'Stag', '2017-12-19 17:15:48'),
(4, 'Couple', '2017-12-19 17:15:48'),
(5, 'VIP Stag', '2017-12-19 17:16:23'),
(6, 'VIP Couple', '2017-12-19 17:16:23'),
(7, 'VVIP', '2017-12-19 17:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` bigint(20) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `createdAt`) VALUES
(1, 'Unlimited Food', '2017-12-19 17:17:36'),
(2, 'Limited Drinks & Cocktails', '2017-12-19 17:17:36'),
(3, 'Unlimited Soft Drinks', '2017-12-19 17:18:52'),
(4, 'Unlimited Drinks & Cocktails', '2017-12-19 17:26:59'),
(5, 'Private Attendant', '2017-12-19 17:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `passes`
--

CREATE TABLE `passes` (
  `pass_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(15) NOT NULL,
  `package_id` text NOT NULL COMMENT 'array',
  `price` float NOT NULL,
  `early_bird` float NOT NULL,
  `passes` varchar(20) NOT NULL,
  `counter` varchar(20) NOT NULL,
  `availables` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passes`
--

INSERT INTO `passes` (`pass_id`, `category_id`, `category_name`, `package_id`, `price`, `early_bird`, `passes`, `counter`, `availables`, `createdAt`) VALUES
(1, 1, 'Stag', '[\"1\"]', 1000, 900, '150', '0', '150', '2017-12-19 17:33:47'),
(2, 2, 'Couple', '[\"1\"]', 1500, 1350, '200', '0', '200', '2017-12-19 17:34:02'),
(3, 3, 'Stag', '[\"1\",\"2\"]', 2000, 1800, '150', '0', '150', '2017-12-19 17:33:51'),
(4, 4, 'Couple', '[\"1\",\"2\"]', 2500, 2250, '200', '0', '200', '2017-12-19 17:34:05'),
(5, 5, 'VIP Stag', '[\"1\",\"3\",\"4\"]', 2500, 2250, '500', '0', '500', '2017-12-19 17:34:17'),
(6, 6, 'VIP Couple', '[\"1\",\"3\",\"4\"]', 3500, 3150, '750', '0', '750', '2017-12-19 17:34:37'),
(7, 7, 'VVIP', '[\"1\",\"3\",\"4\",\"5\"]', 4000, 3600, '50', '0', '50', '2017-12-19 17:34:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `passes`
--
ALTER TABLE `passes`
  ADD PRIMARY KEY (`pass_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `passes`
--
ALTER TABLE `passes`
  MODIFY `pass_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
