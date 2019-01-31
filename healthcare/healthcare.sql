-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 03:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Mr. Admin', 'admin@healthcare.com', '1e8f514d4ca2a3173b12d5a4f6ba938762be9a19');

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `age_id` int(11) NOT NULL,
  `age_category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`age_id`, `age_category_id`, `name`, `createdAt`) VALUES
(1, 1, '1', '2016-12-16 18:15:57'),
(2, 1, '2', '2016-12-16 18:15:57'),
(3, 1, '3', '2016-12-16 18:25:37'),
(4, 1, '4', '2016-12-16 18:28:49'),
(5, 1, '5', '2016-12-16 18:31:19'),
(6, 1, '6', '2016-12-16 18:31:56'),
(7, 1, '7', '2016-12-16 18:32:01'),
(8, 1, '8', '2016-12-16 18:32:07'),
(9, 1, '9', '2016-12-16 18:32:13'),
(10, 1, '10', '2016-12-16 18:32:18'),
(11, 2, '11', '2016-12-16 18:32:33'),
(12, 2, '12', '2016-12-16 18:32:39'),
(13, 2, '13', '2016-12-16 18:32:44'),
(14, 2, '14', '2016-12-16 18:33:33'),
(15, 2, '15', '2016-12-16 18:33:46'),
(16, 2, '16', '2016-12-16 18:36:44'),
(17, 2, '17', '2016-12-16 18:39:03'),
(18, 2, '18', '2016-12-16 18:40:15'),
(19, 2, '19', '2016-12-16 18:40:19'),
(20, 2, '20', '2016-12-16 18:40:40'),
(21, 3, '21', '2016-12-16 18:41:25'),
(22, 3, '22', '2016-12-16 18:42:03'),
(23, 3, '23', '2016-12-16 18:42:37'),
(24, 3, '24', '2016-12-16 18:43:04'),
(25, 3, '25', '2016-12-16 18:43:09'),
(26, 3, '26', '2016-12-16 18:43:37'),
(27, 3, '27', '2016-12-16 18:43:58'),
(28, 3, '28', '2016-12-16 18:44:00'),
(29, 3, '29', '2016-12-16 18:44:01'),
(30, 3, '30', '2016-12-16 18:44:02'),
(31, 4, '31', '2016-12-16 18:44:26'),
(32, 4, '32', '2016-12-16 18:44:52'),
(33, 4, '33', '2016-12-16 18:44:59'),
(34, 4, '34', '2016-12-16 18:45:11'),
(35, 4, '35', '2016-12-16 18:45:30'),
(36, 4, '36', '2016-12-16 18:45:31'),
(37, 4, '37', '2016-12-16 18:45:32'),
(38, 4, '38', '2016-12-16 18:45:33'),
(39, 4, '39', '2016-12-16 18:45:34'),
(40, 4, '40', '2016-12-16 18:45:35'),
(41, 5, '41', '2016-12-16 18:45:50'),
(42, 5, '42', '2016-12-16 18:45:51'),
(43, 5, '43', '2016-12-16 18:45:52'),
(44, 5, '44', '2016-12-16 18:45:53'),
(45, 5, '45', '2016-12-16 18:45:54'),
(46, 5, '46', '2016-12-16 18:45:55'),
(47, 5, '47', '2016-12-16 18:45:56'),
(48, 5, '48', '2016-12-16 18:45:57'),
(49, 5, '49', '2016-12-16 18:45:58'),
(50, 5, '50', '2016-12-16 18:46:00'),
(51, 6, '51', '2016-12-16 18:46:09'),
(52, 6, '52', '2016-12-16 18:46:10'),
(53, 6, '53', '2016-12-16 18:46:11'),
(54, 6, '54', '2016-12-16 18:46:12'),
(55, 6, '55', '2016-12-16 18:46:13'),
(56, 6, '56', '2016-12-16 18:46:13'),
(57, 6, '57', '2016-12-16 18:46:14'),
(58, 6, '58', '2016-12-16 18:46:15'),
(59, 6, '59', '2016-12-16 18:46:16'),
(60, 6, '60', '2016-12-16 18:46:17'),
(61, 7, '61', '2016-12-16 18:46:23'),
(62, 7, '62', '2016-12-16 18:46:24'),
(63, 7, '63', '2016-12-16 18:46:25'),
(64, 7, '64', '2016-12-16 18:46:25'),
(65, 7, '65', '2016-12-16 18:46:26'),
(66, 7, '66', '2016-12-16 18:46:27'),
(67, 7, '67', '2016-12-16 18:46:28'),
(68, 7, '68', '2016-12-16 18:46:29'),
(69, 7, '69', '2016-12-16 18:46:30'),
(70, 7, '70', '2016-12-16 18:46:32'),
(71, 8, '71', '2016-12-16 18:46:37'),
(72, 8, '72', '2016-12-16 18:46:38'),
(73, 8, '73', '2016-12-16 18:46:39'),
(74, 8, '74', '2016-12-16 18:46:40'),
(75, 8, '75', '2016-12-16 18:46:41'),
(76, 8, '76', '2016-12-16 18:46:42'),
(77, 8, '77', '2016-12-16 18:46:43'),
(78, 8, '78', '2016-12-16 18:46:44'),
(79, 8, '79', '2016-12-16 18:46:45'),
(80, 8, '80', '2016-12-16 18:46:46'),
(81, 9, '81', '2016-12-16 18:46:54'),
(82, 9, '82', '2016-12-16 18:46:56'),
(83, 9, '83', '2016-12-16 18:46:57'),
(84, 9, '84', '2016-12-16 18:46:58'),
(85, 9, '85', '2016-12-16 18:46:59'),
(86, 9, '86', '2016-12-16 18:47:00'),
(87, 9, '87', '2016-12-16 18:47:01'),
(88, 9, '88', '2016-12-16 18:47:01'),
(89, 9, '89', '2016-12-16 18:47:02'),
(90, 9, '90', '2016-12-16 18:47:03'),
(91, 10, '91', '2016-12-16 18:47:08'),
(92, 10, '92', '2016-12-16 18:47:09'),
(93, 10, '93', '2016-12-16 18:47:10'),
(94, 10, '94', '2016-12-16 18:47:11'),
(95, 10, '95', '2016-12-16 18:47:12'),
(96, 10, '96', '2016-12-16 18:47:13'),
(97, 10, '97', '2016-12-16 18:47:13'),
(98, 10, '98', '2016-12-16 18:47:14'),
(99, 10, '99', '2016-12-16 18:47:15'),
(100, 10, '100', '2016-12-16 18:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `age_category`
--

CREATE TABLE `age_category` (
  `age_category_id` int(11) NOT NULL,
  `age_group` text NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age_category`
--

INSERT INTO `age_category` (`age_category_id`, `age_group`, `created_At`) VALUES
(1, '0-10', '2016-12-16 17:49:28'),
(2, '11-20', '2016-12-16 17:49:28'),
(3, '21-30', '2016-12-16 17:59:51'),
(4, '31-40', '2016-12-16 17:59:51'),
(5, '41-50', '2016-12-16 18:00:15'),
(6, '51-60', '2016-12-16 18:00:15'),
(7, '61-70', '2016-12-16 18:00:35'),
(8, '71-80', '2016-12-16 18:00:35'),
(9, '81-90', '2016-12-16 18:00:52'),
(10, '91-100', '2016-12-16 18:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `state_id`, `name`, `createdAt`) VALUES
(1, 1, 'Pune', '2016-10-22 18:07:05'),
(2, 1, 'Mumbai City', '2016-12-20 06:48:22'),
(3, 1, 'Ahmednagar', '2016-10-29 06:39:01'),
(4, 1, 'Kolhapur', '2016-12-20 06:35:05'),
(5, 1, 'Raigad', '2016-12-20 06:35:30'),
(6, 1, 'Jalgaon', '2016-12-20 06:38:11'),
(7, 1, 'Akola', '2016-12-20 06:38:57'),
(8, 1, 'Jalna', '2016-12-20 06:39:14'),
(9, 1, 'Amravati', '2016-12-20 06:39:54'),
(10, 1, 'Ratnagiri', '2016-12-20 06:40:38'),
(11, 1, 'Aurangabad', '2016-12-20 06:41:09'),
(12, 1, 'Latur', '2016-12-20 06:41:54'),
(13, 1, 'Sangli - Miraj', '2016-12-20 06:50:20'),
(14, 1, 'Satara', '2016-12-20 06:43:16'),
(15, 1, 'Bhandara', '2016-12-20 06:43:34'),
(16, 1, 'Mumbai Sub-urban', '2016-12-20 06:44:00'),
(17, 1, 'Sindhudurg', '2016-12-20 06:44:23'),
(18, 1, 'Buldhana', '2016-12-20 06:44:36'),
(19, 1, 'Nagpur', '2016-12-20 06:44:48'),
(20, 1, 'Solapur', '2016-12-20 06:44:59'),
(21, 1, 'Chandrapur', '2016-12-20 06:45:09'),
(22, 1, 'Nanded', '2016-12-20 06:45:22'),
(23, 1, 'Thane', '2016-12-20 06:45:30'),
(24, 1, 'Dhule', '2016-12-20 06:45:42'),
(25, 1, 'Nandurbar', '2016-12-20 06:46:08'),
(26, 1, 'Wardha', '2016-12-20 06:46:20'),
(27, 1, 'Gadchiroli', '2016-12-20 06:46:32'),
(28, 1, 'Nashik', '2016-12-20 06:46:47'),
(29, 1, 'Washim', '2016-12-20 06:46:58'),
(30, 1, 'Gondia', '2016-12-20 06:47:08'),
(31, 1, 'Osmanabad', '2016-12-20 06:47:19'),
(32, 1, 'Yavatmal', '2016-12-20 06:47:29'),
(33, 1, 'Hingoli', '2016-12-20 06:47:42'),
(34, 1, 'Parbhani', '2016-12-20 06:47:52'),
(36, 23, 'Bengaluru', '2016-12-21 13:34:04'),
(37, 23, 'Mysore', '2016-12-21 13:35:27'),
(38, 23, 'Mangalore', '2016-12-21 13:36:47'),
(39, 23, 'Belgaum', '2016-12-21 13:37:04'),
(40, 23, 'Bijapur', '2016-12-21 13:37:32'),
(41, 23, 'Gulbarga', '2016-12-21 13:38:21'),
(42, 24, 'Kochi', '2016-12-21 13:40:07'),
(43, 24, 'Kollam', '2016-12-21 13:40:55'),
(44, 18, 'Ahmedabad', '2016-12-21 13:44:05'),
(45, 18, 'Gandhinagar', '2016-12-21 13:44:30'),
(47, 18, 'Junagadh', '2016-12-21 13:45:34'),
(48, 18, 'Surat', '2016-12-21 13:46:02'),
(49, 18, 'Vadodara', '2016-12-21 13:46:44'),
(50, 2, 'Jaipur', '2016-12-21 13:48:20'),
(51, 2, 'Udaipur', '2016-12-21 13:49:04'),
(52, 2, 'Jodhpur', '2016-12-21 13:49:53'),
(53, 2, 'Bikaner', '2016-12-21 13:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1ac4a8e628bf0532338a20a8edd1ea130b1e215e', '106.193.235.233', 1486460978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438363436303937383b),
('22d56aed374d0239995584f3550b5ead6b0a1cd5', '::1', 1515911638, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531353931313633383b61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a393a224d722e2041646d696e223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('2c3061571df899bd8578fabdf47856be1d10f1d5', '106.193.235.233', 1486460740, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438363436303531383b61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a393a224d722e2041646d696e223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('794fe981062f79bac6d025de22b31e860227a41f', '106.193.235.233', 1486460978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438363436303937383b),
('7a4da34ee5a664d3458bcdbac3b5287b27027856', '116.75.160.87', 1486454630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438363435343539383b61646d696e5f6c6f67696e7c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a393a224d722e2041646d696e223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('a6a3e0b27259c5960fa61d570e01f3c972cb7516', '116.75.160.87', 1486461214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438363436313231343b),
('d00c3089b421058d4b8cb395b2a3b699c953c4f3', '116.75.160.87', 1486461217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438363436313231343b);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` longtext COLLATE utf8_unicode_ci NOT NULL,
  `currency_name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `name`, `timestamp`) VALUES
(2, 'Room/Bed Charges', '2016-03-19 05:55:32'),
(4, 'Medical Supervision', '2016-03-19 05:57:14'),
(5, 'Nursing Charges', '2016-03-19 05:57:23'),
(6, 'Oxcygen Charges', '2016-03-19 05:57:36'),
(7, 'Intracath Procedures', '2016-03-19 05:59:32'),
(10, 'Dr.Consuntation Charges', '2016-05-30 05:14:26'),
(11, 'Nebulization', '2016-03-19 06:00:12'),
(12, 'Emergency Charges', '2016-03-19 06:00:22'),
(13, 'Other Procedures', '2016-03-19 06:00:31'),
(14, 'ward Boy Charges', '2016-04-05 17:23:57'),
(15, 'Medicine Charges', '2016-04-05 17:24:26'),
(16, 'Alpha bed / Water Bed', '2016-05-30 04:55:01'),
(17, 'Biopsy', '2016-05-30 04:56:01'),
(18, 'Lever Biopsy', '2016-05-30 04:57:10'),
(19, 'renal Biopsy', '2016-05-30 04:57:34'),
(20, 'Skin Biopsy', '2016-05-30 04:57:47'),
(21, 'lymphoid Biopsy', '2016-05-30 04:58:07'),
(22, 'Bone Marrow Biopsy', '2016-05-30 04:58:29'),
(23, 'Blood Transfusion ', '2016-05-30 04:58:55'),
(24, 'Bladder Wash', '2016-05-30 04:59:11'),
(25, 'Bowel Wash', '2016-05-30 04:59:21'),
(26, 'BSL', '2016-05-30 04:59:29'),
(27, 'Catheterization', '2016-05-30 04:59:49'),
(28, 'Central venous Line', '2016-05-30 05:00:07'),
(29, 'Defibrill D.C.Shock', '2016-05-30 05:00:34'),
(30, 'dressing', '2016-05-30 05:00:45'),
(31, 'Dressing Small/Medium/Large', '2016-05-30 05:01:13'),
(32, 'E.C.G', '2016-05-30 05:01:26'),
(33, 'I.C.Drain', '2016-05-30 05:01:45'),
(34, 'Intubation', '2016-05-30 05:01:58'),
(35, 'Infusion Pump', '2016-05-30 05:02:14'),
(36, 'Lumbar Puncture', '2016-05-30 05:02:38'),
(37, 'Monitor Charges', '2016-05-30 05:08:04'),
(38, 'Assistant Doctor Charges', '2016-05-30 05:09:28'),
(39, 'Ryles Tube', '2016-05-30 05:09:41'),
(40, 'Pacing', '2016-05-30 05:10:10'),
(41, 'Tapping Pleural/Ascitic/Percutaneous', '2016-05-30 05:11:15'),
(42, 'Thrombolytic Theropy', '2016-05-30 05:11:42'),
(43, 'Tracheostomy', '2016-05-30 05:12:25'),
(44, 'Ventilator', '2016-05-30 05:12:42'),
(45, 'Suction', '2016-05-30 05:12:51'),
(46, 'CPR', '2016-05-31 06:07:43'),
(47, 'Physioterapy', '2016-05-30 05:13:33'),
(48, 'Dietecian Charges', '2016-05-30 05:15:12'),
(49, 'X-Ray Charges', '2016-05-30 05:17:59'),
(50, 'Ambulance Charges', '2016-05-30 05:18:17'),
(51, 'E.E.G', '2016-05-30 05:18:40'),
(52, 'Stress test Charges', '2016-05-31 06:09:44'),
(53, 'Visitor Dr. Charges', '2016-05-30 05:20:11'),
(54, 'Ambu Bag Charges', '2016-05-30 05:20:47'),
(55, 'Folyce catheter', '2016-05-30 10:27:49'),
(56, 'BMW', '2016-05-30 10:28:49'),
(57, 'Ambulance call', '2016-05-31 06:08:37'),
(58, 'Genral Ward Charges', '2016-06-01 09:25:04'),
(59, 'ot charges', '2016-06-21 06:27:33'),
(60, 'anasthetic dr. charges', '2016-06-21 06:28:51'),
(61, 'surgion charges', '2016-06-21 06:29:08'),
(62, 'kitone test', '2016-07-15 02:19:00'),
(63, 'CPR', '2016-07-28 07:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `description`) VALUES
(1, 'Dental', 'dfsdf'),
(5, 'Genral ward', ''),
(6, 'ICU', ''),
(7, 'Gynac Ward', ''),
(8, 'optholm', ''),
(9, 'ortho', '');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_report`
--

CREATE TABLE `diagnosis_report` (
  `diagnosis_report_id` int(11) NOT NULL,
  `report_type` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'xray,blood test',
  `document_type` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'text,photo',
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `laboratorist_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diagnosis_report`
--

INSERT INTO `diagnosis_report` (`diagnosis_report_id`, `report_type`, `document_type`, `file_name`, `prescription_id`, `description`, `timestamp`, `laboratorist_id`) VALUES
(1, 'xray', 'doc', '', 1, 'sduityogfhg<br>johggufu', 1457872500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `name`, `createdAt`) VALUES
(1, 'fiver', '2016-11-13 16:51:56'),
(2, 'headache', '2016-10-29 05:33:12'),
(4, 'Diabetes', '2016-11-13 09:07:51'),
(5, 'Malaria', '2016-11-14 09:55:45'),
(6, 'Typhoid', '2016-11-14 09:56:05'),
(7, 'Hepatitis', '2016-11-14 09:56:58'),
(8, 'Jaundice', '2016-11-14 09:57:26'),
(9, 'Leptospirosis', '2016-11-14 09:57:51'),
(10, 'Diarrhoeal', '2016-11-14 09:58:09'),
(11, 'Amoebiasis', '2016-11-14 09:58:31'),
(12, 'Cholera', '2016-11-14 09:58:49'),
(13, 'Brucellosis', '2016-11-14 09:59:46'),
(14, 'Hookworm Infection', '2016-11-14 10:00:02'),
(15, 'Influenza', '2016-11-14 10:00:19'),
(16, 'Filariasis', '2016-11-14 10:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` bigint(20) NOT NULL,
  `type_id` int(11) NOT NULL,
  `speciality_id` bigint(20) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `licence_no` varchar(255) NOT NULL,
  `hospital_name` text NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `type_id`, `speciality_id`, `name`, `phone`, `email`, `password`, `licence_no`, `hospital_name`, `city_id`, `address`, `createdAt`) VALUES
(1, 1, 1, 'Aasif Sayyad', '9922031316', 'aasifsayyad@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', 'my hospital', 1, '     Hadapsar pune -411028                                                                ', '2016-11-13 18:28:27'),
(29, 1, 4, 'Dhanashri', '9730304678', 'dgj@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 1, '', '2016-11-15 15:37:00'),
(16, 1, 1, 'aasif', '9922031316', 'aasif@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '245789552', 'AIMS', 1, 'Pune', '2016-10-28 10:24:51'),
(27, 2, 1, 'Rahul', '7798881745', 'rahul.winmet@gmail.com', 'ad87626ace50877754981c3b3a9fa9e36140ff31', '12345', '', 1, 'pune', '2016-11-12 05:29:20'),
(24, 2, 1, 'Sumit', '9766747805', 'sumit@gmail.com', '20e51a92c5baf2b079a366e3420368cf0ce71f42', '', '', 1, 'mhvfyjfyu', '2016-11-13 16:48:30'),
(34, 1, 2, 'sanjay', '9856231478', 's@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '12588636', '', 1, 'delhi', '2016-11-30 11:39:34'),
(18, 1, 4, 'rahul', '9856895555', 'rahul@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '98526555', 'Hospital', 2, '                                    pune                                ', '2016-10-31 17:05:17'),
(19, 2, 4, 'Sumit Ubale', '9766747805', 'ubalesumit@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '546789', 'Sevahospital', 1, 'Bhaji Bazar, Shirur', '2016-10-29 11:18:43'),
(20, 1, 1, 'sachin', '9854755655', 'sachin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456789999', 'hosp', 2, '                                                                        pune                                                                ', '2016-10-31 17:04:58'),
(21, 1, 1, 'mahendra', '9874562255', 'm@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '8568555', 'hope', 1, 'pune', '2016-10-31 15:44:36'),
(32, 1, 4, 'Dhanashri', '9730304678', 'dhanu@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 1, '', '2016-11-27 17:34:01'),
(33, 1, 3, 'ajay', '9875451236', 'a@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2535851', '', 1, 'delhi', '2016-11-29 05:45:32'),
(28, 1, 4, 'Dhanashri Joshi', '9730304678', 'dhanashri@gmail.com', '5a614cbcd4ce36b2fef76b16194e0d7f51925adb', '464643446844vs74vd', 'Medi point', 1, '', '2016-11-13 08:58:16'),
(30, 1, 2, 'Abcd', '9730304678', 'abc@abc.in', '81fe8bfe87576c3ecb22426f8e57847382917acf', '686686856455665988', '', 1, 'bxjdjd', '2016-11-17 15:32:43'),
(31, 1, 3, 'abcd', '9730304678', 'abc@abcd.in', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 1, '', '2016-11-17 16:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `email_template_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_element`
--

CREATE TABLE `form_element` (
  `form_element_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `html` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `medicine_category_id` int(11) NOT NULL,
  `pharmacist_id` int(11) NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `expiration_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `batch_no` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` float NOT NULL,
  `manufacturing_company` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `medicine_category_id`, `pharmacist_id`, `price`, `expiration_date`, `batch_no`, `quantity`, `manufacturing_company`, `description`, `status`) VALUES
(1, 'zintac', 1, 2, '20', '08/2016', '', 75, '', '', 'available'),
(2, 'Abarelix (Plenaxis)- FDA', 2, 7, '35', '04/2016', '12', 44, 'dorex', '', 'available'),
(3, 'cipla', 1, 7, '10', '03/2016', '', 94, 'Cipla', '', 'available'),
(4, 'Baclofen Tablets (Baclofen)- FDA', 1, 7, '50', '07/2016', '', 10, '', '', 'available'),
(5, 'Cafcit (Caffeine Citrate)', 1, 8, '100', '05/2016', '', 4, '', '', 'available'),
(6, 'Zadaxin (Thymalfasin)', 1, 8, '100', '05/2016', '', 33, '', '', 'available'),
(7, 'Zanaflex (Tizanidine)', 1, 8, '20', '03/2016', '', 0, '', '', 'available'),
(8, 'Infen-P', 1, 8, '10', '04/2016', '', 95, 'Cipla', '', 'available'),
(9, 'Pan 40', 1, 8, '120', '07/18', '6130336', 15, 'Alkame', '', 'available'),
(11, 'PAN 40', 1, 7, '120', '07/2018', '6130336', 15, 'ALKEM', '', 'available'),
(12, 'A TO Z', 1, 8, '62', '12/2017', '6130074', 10, 'ALK', '', 'available'),
(13, 'TAXIM-O 200', 1, 7, '120.73', '12/2017', '6180292', 10, 'ALK', '', 'available'),
(14, 'zerodol sp', 1, 7, '12', '06/2016', '123', 100, 'cipla', 'hnbkjhj', 'available'),
(15, 'cipla', 0, 0, '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `medicine_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`medicine_category_id`, `name`, `description`) VALUES
(1, 'Tablets', ''),
(2, 'Injection', ''),
(3, 'Syrup', ''),
(4, 'Capsule', ''),
(5, 'Suppository', ''),
(6, 'Cream', ''),
(7, 'Solution', ''),
(8, 'Surgical', ''),
(9, 'Liquid', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 unread 1 read'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reciever` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newprescription`
--

CREATE TABLE `newprescription` (
  `newpres_id` bigint(20) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `pharmacist_id` bigint(20) NOT NULL,
  `medicine_entries` longtext NOT NULL,
  `img_url` longtext NOT NULL,
  `status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newprescription`
--

INSERT INTO `newprescription` (`newpres_id`, `timestamp`, `patient_id`, `doctor_id`, `pharmacist_id`, `medicine_entries`, `img_url`, `status`, `createdAt`) VALUES
(2, '02/11/2016', 197, 16, 0, '[{\"medicine\":\"Zanaflex (Tizanidine)\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"},{\"medicine\":\"Abarelix (Plenaxis)- FDA\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"}]', '', 0, '2016-11-02 09:50:51'),
(3, '08/11/2016', 197, 1, 0, '[{\"medicine\":\"cipla\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"},{\"medicine\":\"zintac\",\"morning\":\"2\",\"afternoon\":\"2\",\"evening\":\"2\",\"doses\":\"2\"}]', '', 0, '2016-12-27 11:19:06'),
(4, '17/11/2016', 212, 31, 0, '[{\"medicine\":\"zintac\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"},{\"medicine\":\"Zadaxin (Thymalfasin)\",\"morning\":\"1\",\"afternoon\":\"2\",\"evening\":\"2\",\"doses\":\"\"}]', '', 0, '2016-11-17 16:06:26'),
(5, '19/11/2016', 197, 1, 0, '[{\"medicine\":\"zintac\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"}]', '', 0, '2016-11-19 13:28:44'),
(6, '19/11/2016', 213, 0, 9, '[{\"medicine\":\"zintac\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"}]', '', 0, '2016-11-19 14:25:43'),
(7, '20/11/2016', 215, 24, 0, '[{\"medicine\":\"tamiflue\",\"morning\":\"1\",\"afternoon\":\"\",\"evening\":\"1\",\"doses\":\"2\"}]', '', 0, '2016-11-19 20:03:23'),
(8, '20/11/2016', 215, 24, 0, '[{\"medicine\":\"Pan 40\",\"morning\":\"1\",\"afternoon\":\"2\",\"evening\":\"1\",\"doses\":\"2\"}]', '', 0, '2016-11-20 11:05:18'),
(9, '20/11/2016', 216, 24, 0, '[{\"medicine\":\"Infen-P\",\"morning\":\"2\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"5\"}]', '', 0, '2016-11-20 11:09:34'),
(10, '21/11/2016', 216, 24, 0, '[{\"medicine\":\"Zadaxin (Thymalfasin)\",\"morning\":\"1\",\"afternoon\":\"\",\"evening\":\"8\",\"doses\":\"4\"},{\"medicine\":\"zerodol sp\",\"morning\":\"2\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"2\"},{\"medicine\":\"Abarelix (Plenaxis)- FDA\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"2\"}]', '', 0, '2016-11-21 10:46:36'),
(11, '', 222, 32, 0, '[{\"medicine\":\"S\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"}]', '', 0, '2016-11-29 19:19:02'),
(12, '', 223, 32, 0, '[{\"medicine\":\"Sinarest, Crocin\",\"morning\":\"1,1\",\"afternoon\":\"1,1\",\"evening\":\"1,1\",\"doses\":\"9,12\"}]', '', 0, '2016-11-29 19:20:49'),
(13, '', 224, 32, 0, '[{\"medicine\":\"C\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"9\"}]', '', 0, '2016-11-29 19:28:01'),
(14, '21/11/2016', 225, 32, 0, '[{\"medicine\":\"C\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"9\"}]', '', 0, '2016-11-29 19:30:11'),
(15, '21/11/2016', 226, 32, 0, '[{\"medicine\":\"Sinarest\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"9\"},{\"medicine\":\"Crocin\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"9\"}]', '', 0, '2016-11-29 19:31:18'),
(16, '30/11/2016', 227, 34, 0, '[{\"medicine\":\"Zadaxin (Thymalfasin)\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"3\"},{\"medicine\":\"Abarelix (Plenaxis)- FDA\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"2\",\"doses\":\"\"}]', '', 0, '2016-11-30 12:00:39'),
(17, '', 228, 32, 0, '[{\"medicine\":\"dcold\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"3\"}]', '', 0, '2016-11-30 19:50:25'),
(18, '19/12/2016', 230, 0, 17, '[{\"medicine\":\"zintac\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"1\"}]', '', 0, '2016-12-20 07:41:16'),
(19, '20/12/2016', 230, 0, 17, '[{\"medicine\":\"Baclofen Tablets (Baclofen)- FDA\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"\",\"doses\":\"3\"}]', '', 0, '2016-12-20 11:20:51'),
(20, '20/12/2016', 231, 0, 17, '[{\"medicine\":\"Cafcit (Caffeine Citrate)\",\"morning\":\"2\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":\"4\"}]', '', 0, '2016-12-20 11:21:39'),
(21, '22/12/2016', 232, 32, 0, '[{\"medicine\":\"zintac\",\"morning\":\"1\",\"afternoon\":\"1\",\"evening\":\"1\",\"doses\":null}]', 'http://hdimagesnew.com/wp-content/uploads/2015/11/Vintage-Tree-Nature-Background-HD-Wallpaper.jpg', 0, '2017-01-08 11:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(11) NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `color` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp_create` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp_last_update` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `start_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `end_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `title`, `description`, `start_timestamp`, `end_timestamp`) VALUES
(1, 'uioiik', 'wertyouiyr7ytiugy', '1469059200', '1469232000');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `notice_id` int(11) NOT NULL,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operator_list`
--

CREATE TABLE `operator_list` (
  `operator_list_id` bigint(20) NOT NULL,
  `receptionist_id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator_list`
--

INSERT INTO `operator_list` (`operator_list_id`, `receptionist_id`, `doctor_id`, `createdAt`) VALUES
(1, 7, 1, '2016-12-19 07:45:31'),
(3, 7, 27, '2016-12-19 08:06:12'),
(4, 8, 24, '2016-12-20 10:27:04'),
(13, 7, 19, '2016-12-27 14:09:53'),
(14, 7, 20, '2016-12-27 14:09:53'),
(15, 7, 21, '2016-12-27 14:09:53'),
(17, 7, 28, '2016-12-27 14:09:53'),
(18, 7, 29, '2017-01-06 15:16:42'),
(19, 7, 32, '2017-01-06 15:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` bigint(20) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL COMMENT '1-male,2-female',
  `age` int(11) NOT NULL,
  `age_category_id` int(11) NOT NULL,
  `aadhar_card` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `disease_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `pharmacist_id` bigint(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `phone`, `gender`, `age`, `age_category_id`, `aadhar_card`, `disease_id`, `city_id`, `doctor_id`, `pharmacist_id`, `createdAt`) VALUES
(216, 'Kumar', '7689564323', 0, 36, 0, '2678899900', 5, 3, 24, 0, '2016-11-20 11:08:30'),
(197, 'atik', '9777712345', 0, 26, 0, '123455779', 1, 1, 1, 0, '2016-11-13 18:30:36'),
(199, 'rakesh', '9256895562', 0, 25, 0, '123456789', 5, 1, 0, 0, '2016-11-14 10:02:30'),
(215, 'gaurav', '9878675456', 0, 34, 0, '213456778', 7, 3, 24, 0, '2016-11-19 20:01:35'),
(203, 'atik', '9766747805', 0, 26, 0, '123456', 6, 1, 0, 0, '2016-11-14 10:02:45'),
(204, 'akay', '123456789', 0, 38, 0, '67893', 1, 1, 0, 0, '2016-11-12 05:34:46'),
(205, 'New Patinet', '9874566855', 0, 25, 0, '1233456789', 2, 1, 1, 0, '2016-11-13 18:28:04'),
(206, 'Rajesh', '8765893456', 0, 30, 0, '123487876894', 2, 2, 0, 0, '2016-11-14 07:56:46'),
(207, 'yogesh', '8796004747', 0, 27, 0, '1234567891222', 1, 1, 0, 0, '2016-11-14 09:21:50'),
(208, 'Prescription', '7654897656', 0, 32, 0, '123456788', 1, 1, 0, 0, '2016-11-15 11:14:50'),
(209, 'Pharmacist', '9834234567', 0, 35, 0, '53456788', 1, 2, 0, 0, '2016-11-15 11:35:05'),
(210, 'vishal', '7658096543', 0, 35, 0, '46799999', 2, 2, 0, 0, '2016-11-15 13:03:24'),
(211, 'WARNING', '3738388', 0, 21, 0, 'e7883893grj7899', 1, 1, 0, 0, '2016-11-17 14:40:24'),
(212, 'abcd', '9730304678', 0, 21, 0, 'ghuuuj6788gj996', 1, 1, 31, 0, '2016-11-17 16:03:59'),
(213, 'new', '9526222255', 0, 25, 0, '125466545', 4, 1, 0, 9, '2016-11-19 14:09:53'),
(214, 'dummy', '2545845564', 0, 25, 0, '1225', 8, 2, 0, 9, '2016-11-19 14:49:56'),
(222, 'Dhanashri', '9730304678', 0, 21, 0, 'nvksndv58448844', 1, 1, 32, 0, '2016-11-29 19:19:02'),
(221, 'Accenture', '8765456789', 0, 28, 0, '123456', 2, 1, 33, 0, '2016-11-29 05:47:03'),
(220, 'ABCD', '9830304678', 0, 21, 0, 'ghj6899090000', 2, 1, 32, 0, '2016-11-27 17:35:12'),
(223, 'Dhanashri', '9730304678', 0, 21, 0, 'nvksndv58448844', 1, 1, 32, 0, '2016-11-29 19:20:49'),
(224, 'Dhanashri', '9730304678', 0, 21, 0, 'nvksndv58448844', 1, 1, 32, 0, '2016-11-29 19:28:01'),
(225, 'Dhanashri', '9730304678', 0, 21, 0, 'nvksndv58448844', 1, 1, 32, 0, '2016-11-29 19:30:11'),
(226, 'Dhanashri', '9730304678', 0, 21, 0, 'nvksndv58448844', 1, 1, 32, 0, '2016-11-29 19:31:18'),
(227, 'PREMIUM', '9786564567', 0, 26, 0, '12356', 2, 1, 34, 0, '2016-11-30 11:51:49'),
(228, 'Dhanashri Joshi', '9730304678', 0, 22, 0, 'hjxjjd6899006TG', 1, 1, 32, 0, '2016-11-30 19:50:25'),
(229, 'fresh', '2546656555', 1, 25, 3, '1235555', 6, 1, 1, 0, '2016-12-20 06:31:58'),
(230, 'Yogesh', '8983819899', 1, 27, 3, '', 8, 4, 0, 17, '2016-12-20 07:39:14'),
(231, 'Shreedhar', '8983819899', 1, 27, 3, '', 2, 4, 0, 17, '2016-12-20 07:47:54'),
(232, 'Dhanashri', '9730304678', 2, 21, 3, 'nvksndv58448844', 1, 1, 32, 0, '2017-01-03 18:58:54'),
(233, 'Dhanashri Joshi', '9730304678', 0, 25, 0, 'dufuugg66', 1, 1, 32, 0, '2017-01-03 20:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` bigint(20) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `licence_no` varchar(255) NOT NULL,
  `med_store_name` text NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `type_id`, `name`, `phone`, `email`, `password`, `licence_no`, `med_store_name`, `city_id`, `address`, `createdAt`) VALUES
(2, 1, 'pharma', '9922031316', 'ph@chemist.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '547955000', 'medico', 2, '                                                                                                                                                Pune                                                                                                                                                                                                    ', '2016-11-13 18:35:02'),
(18, 2, 'Shubham Lavande', '8796443695', 'nileshpoman.696@gmail.com', 'adf82b187618caef30312432069d1f557b5ef940', '71225895412', 'Shree Medical', 1, 'pune', '2017-01-23 11:54:17'),
(9, 1, 'sayyad', '9922031566', 'sayyad@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '58956622', 'new+', 1, '                                    pune                                ', '2016-11-13 18:57:20'),
(17, 2, 'Balkrishna Khade', '8983819899', 'ABC@gmail.com', 'cfd43f34944a61429f07f2f249b3ad5db26bf920', '123ABC', 'Gouri Shankar Medicals', 1, 'Poud Road, Pune', '2016-12-20 06:32:18'),
(11, 1, 'ranjit', '9874566652', 'ranjit@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '45658555', 'store', 1, '                                    pune                                ', '2016-10-31 15:33:48'),
(13, 1, 'Dhanashri', '9730304678', 'dha@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 1, '', '2016-11-15 15:19:44'),
(14, 2, 'Dhanashri', '9730304678', 'dhanj@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 1, '', '2016-11-15 15:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `case_history` longtext COLLATE utf8_unicode_ci NOT NULL,
  `medication` longtext COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `timestamp`, `doctor_id`, `patient_id`, `case_history`, `medication`, `note`) VALUES
(1, '1457870700', 6, 1, 'hfdjgyfgiu', 'sfdjfgf', 'fjhgfhgilho');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `receptionist_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`receptionist_id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(7, 'xyz', 'xyz@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pune', '9220565898'),
(8, 'swapnil', 'sw@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pune', '9766748950');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'operation,birth,death',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `type`, `description`, `timestamp`, `doctor_id`, `patient_id`) VALUES
(1, 'operation', 'sdyfygfygf', '1457654400', 6, 1),
(2, 'operation', 'dfghjjh\r\nbfkhvuvc\r\nvhhfv', '1458691200', 6, 5),
(3, 'birth', 'ttt', '1468972800', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'HEALTHCARE'),
(2, 'system_title', 'HEALTHCARE'),
(3, 'address', 'Pune'),
(4, 'phone', '9922031316'),
(5, 'paypal_email', 'ashifsayyad3@gmail.com'),
(6, 'currency', 'INR'),
(7, 'system_email', 'ashifsayyad3@gmail.com'),
(8, 'buyer', ''),
(9, 'purchase_code', ''),
(11, 'language', 'english'),
(12, 'text_align', 'left-to-right'),
(13, 'system_currency_id', '1'),
(14, 'clickatell_user', '[YOUR CLICKATELL USERNAME]'),
(15, 'clickatell_password', '[YOUR CLICKATELL PASSWORD]'),
(16, 'clickatell_api_id', '[YOUR CLICKATELL API ID]');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `speciality_id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`speciality_id`, `name`, `createdAt`) VALUES
(1, 'Dentist', '2016-10-28 10:23:57'),
(2, 'Surgen', '2016-10-29 10:35:47'),
(3, 'neurosurgen', '2016-10-29 06:03:02'),
(4, 'MD', '2016-10-29 10:35:36'),
(5, 'Child Specialist', '2016-12-20 07:13:48'),
(6, ' Anesthesiologist', '2016-12-20 07:08:23'),
(7, ' Cardiologists', '2016-12-20 07:06:48'),
(8, 'Gynaecologist', '2016-12-20 07:08:35'),
(10, 'Oncologist', '2016-12-20 07:09:39'),
(11, ' Orthopaedist', '2016-12-20 07:10:06'),
(12, ' Pathologist', '2016-12-20 07:10:32'),
(13, 'Psychiatrist', '2016-12-20 07:10:56'),
(14, 'Radiologist', '2016-12-20 07:11:16'),
(15, 'Urologist', '2016-12-20 07:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `name`, `createdAt`) VALUES
(1, 'Maharashtra', '2016-10-22 18:51:15'),
(2, 'Rajasthan', '2016-12-20 07:15:22'),
(3, 'Delhi', '2016-11-08 03:35:54'),
(4, 'Assam', '2016-11-08 03:36:09'),
(5, 'Uttar Pradesh', '2016-11-08 03:36:43'),
(6, 'Tamil Nadu', '2016-11-08 03:37:10'),
(7, 'Orissa', '2016-11-08 03:37:22'),
(8, 'Madhya Pradesh', '2016-11-08 03:38:25'),
(9, 'Bihar', '2016-12-20 07:16:32'),
(10, 'Andaman and Nicobar Islands', '2016-12-20 07:16:52'),
(11, 'Andhra Pradesh', '2016-12-20 07:17:13'),
(12, 'Arunachal Pradesh', '2016-12-20 07:18:02'),
(13, 'Chandigarh', '2016-12-20 07:18:16'),
(14, 'Chhattisgarh', '2016-12-20 07:18:28'),
(15, 'Dadra and Nagar Haveli', '2016-12-20 07:18:40'),
(16, 'Daman and Diu', '2016-12-20 07:18:56'),
(17, 'Goa', '2016-12-20 07:19:12'),
(18, 'Gujarat', '2016-12-20 07:19:24'),
(19, 'Haryana', '2016-12-20 07:19:32'),
(20, 'Himachal Pradesh', '2016-12-20 07:19:41'),
(21, 'Jammu and Kashmir', '2016-12-20 07:20:11'),
(22, 'Jharkhand', '2016-12-20 07:20:24'),
(23, 'Karnataka', '2016-12-20 07:20:44'),
(24, 'Kerala', '2016-12-20 07:21:05'),
(25, 'Lakshadweep', '2016-12-20 07:21:17'),
(26, 'Manipur', '2016-12-20 07:21:38'),
(27, 'Meghalaya', '2016-12-20 07:21:45'),
(28, 'Mizoram', '2016-12-20 07:21:56'),
(29, 'Nagaland', '2016-12-20 07:22:05'),
(30, 'Odisha', '2016-12-20 07:22:13'),
(31, 'Puducherry', '2016-12-20 07:22:25'),
(32, 'Punjab', '2016-12-20 07:22:39'),
(33, 'Sikkim', '2016-12-20 07:22:55'),
(34, 'Telangana', '2016-12-20 07:23:08'),
(35, 'Tripura', '2016-12-20 07:23:18'),
(36, 'Uttarakhand', '2016-12-20 07:23:30'),
(37, 'West Bengal', '2016-12-20 07:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `test_report`
--

CREATE TABLE `test_report` (
  `test_report_id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `patient_id` bigint(20) NOT NULL,
  `test_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_report`
--

INSERT INTO `test_report` (`test_report_id`, `doctor_id`, `patient_id`, `test_name`, `date`, `description`, `file`, `createdAt`) VALUES
(8, 1, 197, '', '11/19/2016', '', 'uploads/test_attach_image/8Final April rain proposed FOOD  menu2016.docx', '2016-11-19 17:51:49'),
(9, 1, 197, '', '11/19/2016', '', 'uploads/test_attach_image/9Annual_Calender_2017_Engl.pdf', '2016-11-19 17:52:20'),
(10, 33, 221, '', '11/29/2016', '', 'uploads/test_attach_image/1011111.jpg', '2016-11-29 05:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`, `createdAt`) VALUES
(1, 'Government', '2016-10-22 17:53:07'),
(2, 'Private', '2016-10-22 17:53:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`age_id`),
  ADD KEY `age_category_id` (`age_category_id`);

--
-- Indexes for table `age_category`
--
ALTER TABLE `age_category`
  ADD PRIMARY KEY (`age_category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `diagnosis_report`
--
ALTER TABLE `diagnosis_report`
  ADD PRIMARY KEY (`diagnosis_report_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `speciality_id` (`speciality_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `form_element`
--
ALTER TABLE `form_element`
  ADD PRIMARY KEY (`form_element_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `pharmacist_id` (`pharmacist_id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`medicine_category_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `newprescription`
--
ALTER TABLE `newprescription`
  ADD PRIMARY KEY (`newpres_id`),
  ADD KEY `pharmacist_id` (`pharmacist_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `operator_list`
--
ALTER TABLE `operator_list`
  ADD PRIMARY KEY (`operator_list_id`),
  ADD KEY `receptionist_id` (`receptionist_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `disease_id` (`disease_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `pharmacist_id` (`pharmacist_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`receptionist_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`speciality_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `test_report`
--
ALTER TABLE `test_report`
  ADD PRIMARY KEY (`test_report_id`),
  ADD KEY `laboratorist_id` (`doctor_id`,`patient_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `age_category`
--
ALTER TABLE `age_category`
  MODIFY `age_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `diagnosis_report`
--
ALTER TABLE `diagnosis_report`
  MODIFY `diagnosis_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_element`
--
ALTER TABLE `form_element`
  MODIFY `form_element_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `medicine_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newprescription`
--
ALTER TABLE `newprescription`
  MODIFY `newpres_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator_list`
--
ALTER TABLE `operator_list`
  MODIFY `operator_list_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `receptionist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `speciality_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `test_report`
--
ALTER TABLE `test_report`
  MODIFY `test_report_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
