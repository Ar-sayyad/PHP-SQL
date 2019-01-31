-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 08:34 AM
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
-- Database: `testapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(1) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `profile_img` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `password`, `contact`, `address`, `profile_img`, `createdAt`) VALUES
(1, 'Aasif', 'Sayyad', 'ashifsayyad3@gmail.com', '123456', '9225732186', 'pune', '', '2017-08-17 07:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` bigint(20) NOT NULL,
  `application_name` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `added_by_name` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1-active,0-deactive',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `application_name`, `user_id`, `company_id`, `description`, `added_by_name`, `status`, `createdAt`) VALUES
(1, 'SmartIT', 1, 1, '', '', 0, '2017-08-18 06:24:48'),
(2, 'RemedyITSM', 1, 1, '', '', 0, '2017-08-18 06:22:47'),
(3, 'MyIT', 1, 1, '', '', 0, '2017-08-18 06:22:50'),
(13, 'SmartIT', 0, 2, '', '', 0, '2017-08-23 06:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `browser`
--

CREATE TABLE `browser` (
  `browser_id` bigint(20) NOT NULL,
  `browser_name` varchar(255) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `added_by_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1-active,0-deactive',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `browser`
--

INSERT INTO `browser` (`browser_id`, `browser_name`, `company_id`, `user_id`, `added_by_name`, `status`, `createdAt`) VALUES
(1, 'Chrome', 1, 1, '', 0, '2017-08-18 06:59:37'),
(2, 'Chrome', 2, 0, '', 0, '2017-08-23 05:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `contact_landline` varchar(20) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `is_Url_add` int(1) NOT NULL COMMENT '1-added,0-not added',
  `status` int(1) NOT NULL COMMENT '1-active,0-deactive',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `user_id`, `email`, `password`, `domain`, `contact_landline`, `contact`, `address`, `is_Url_add`, `status`, `createdAt`) VALUES
(1, 'My Company', 0, 'demo123@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9225732186', 'Vishrantwadi, Pune', 0, 1, '2017-08-22 06:07:54'),
(2, 'New Company', 0, 'new@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9925789545', 'pune', 0, 1, '2017-08-23 07:08:00'),
(5, 'Ms Company', 0, 'msc@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9874589658', 'pune', 0, 1, '2017-08-23 07:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `company_environment`
--

CREATE TABLE `company_environment` (
  `company_env_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_environment`
--

INSERT INTO `company_environment` (`company_env_id`, `company_id`, `application_id`, `user_id`, `status`, `createdAt`) VALUES
(1, 1, 1, 0, 0, '2017-08-18 12:36:53'),
(2, 1, 2, 0, 0, '2017-08-18 12:54:43'),
(3, 1, 3, 0, 0, '2017-08-21 04:56:41'),
(4, 2, 13, 0, 0, '2017-08-23 06:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `company_environ_url`
--

CREATE TABLE `company_environ_url` (
  `company_environ_url_id` bigint(20) NOT NULL,
  `company_env_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `environment_type` varchar(255) NOT NULL,
  `env_url` text NOT NULL,
  `environment_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_environ_url`
--

INSERT INTO `company_environ_url` (`company_environ_url_id`, `company_env_id`, `company_id`, `environment_type`, `env_url`, `environment_id`, `application_id`, `user_id`, `status`, `createdAt`) VALUES
(6, 1, 1, 'Production ', 'https://servicemaster-dev-smartit.onbmc.com', 1, 1, 0, 0, '2017-08-18 12:38:15'),
(7, 1, 1, 'Development', 'https://servicemaster-dev-smartit.onbmc.com', 2, 1, 0, 0, '2017-08-18 12:38:19'),
(8, 1, 1, 'Testing', 'https://servicemaster-dev-smartit.onbmc.com', 3, 1, 0, 0, '2017-08-19 05:21:28'),
(9, 2, 1, 'Production ', 'https://servicemaster-dev-smartit.onbmc.com', 1, 2, 0, 0, '2017-08-19 05:20:50'),
(10, 2, 1, 'Development', '', 2, 2, 0, 0, '2017-08-19 06:41:24'),
(11, 2, 1, 'Testing', '', 3, 2, 0, 0, '2017-08-21 04:57:24'),
(12, 3, 1, 'Production ', '', 1, 3, 0, 0, '2017-08-21 04:56:41'),
(13, 3, 1, 'Development', '', 2, 3, 0, 0, '2017-08-21 04:56:41'),
(14, 3, 1, 'Testing', 'https://servicemaster-dev-smartit.onbmc.com', 3, 3, 0, 0, '2017-08-21 04:56:42'),
(15, 4, 2, 'Production', 'https://servicemaster-dev-smartit.onbmc.com', 4, 13, 0, 0, '2017-08-23 06:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `email_log`
--

CREATE TABLE `email_log` (
  `email_log_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `execution_time` varchar(255) NOT NULL,
  `runname` varchar(255) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-pending,1-send',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_log`
--

INSERT INTO `email_log` (`email_log_id`, `email`, `execution_time`, `runname`, `company_id`, `user_id`, `status`, `createdAt`) VALUES
(1, 'demo123@gmail.com', '2017-08-22 14:48:36', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 12:48:36'),
(2, 'demo123@gmail.com', '2017-08-22 14:50:29', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 12:50:29'),
(3, 'demo123@gmail.com', '2017-08-22 15:01:21', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 13:01:21'),
(4, 'demo123@gmail.com', '2017-08-22 15:03:05', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 13:03:05'),
(5, 'demo123@gmail.com', '2017-08-22 15:04:09', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 13:04:09'),
(6, 'demo123@gmail.com', '2017-08-22 15:06:38', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 13:06:38'),
(7, 'demo123@gmail.com', '2017-08-22 15:10:23', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 13:10:23'),
(8, 'demo123@gmail.com', '2017-08-22 15:15:04', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 13:15:04'),
(9, 'demo123@gmail.com', '2017-08-22 15:43:42', 'My Company2017_08_22', 1, 1, 0, '2017-08-22 13:43:42'),
(10, 'new@gmail.com', '2017-08-23 09:23:50', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:23:50'),
(11, 'new@gmail.com', '2017-08-23 09:25:49', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:25:49'),
(12, 'new@gmail.com', '2017-08-23 09:28:25', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:28:25'),
(13, 'new@gmail.com', '2017-08-23 09:30:01', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:30:01'),
(14, 'new@gmail.com', '2017-08-23 09:36:14', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:36:14'),
(15, 'new@gmail.com', '2017-08-23 09:38:14', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:38:14'),
(16, 'new@gmail.com', '2017-08-23 09:38:36', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:38:36'),
(17, 'new@gmail.com', '2017-08-23 09:39:13', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:39:13'),
(18, 'new@gmail.com', '2017-08-23 09:39:42', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:39:42'),
(19, 'new@gmail.com', '2017-08-23 09:52:25', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 07:52:25'),
(20, 'new@gmail.com', '2017-08-23 11:15:43', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 09:15:43'),
(21, 'new@gmail.com', '2017-08-23 11:17:49', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 09:17:49'),
(22, 'new@gmail.com', '2017-08-23 11:19:42', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 09:19:42'),
(23, 'new@gmail.com', '2017-08-23 11:22:05', 'New Company2017_08_23', 2, 2, 0, '2017-08-23 09:22:05'),
(24, 'new@gmail.com', '2017-08-22 11:23:51', 'New Company2017_08_22', 2, 2, 0, '2017-08-23 10:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `email_setting`
--

CREATE TABLE `email_setting` (
  `email_setting_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `host_name` varchar(255) NOT NULL,
  `port` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `secuirity_protocol` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_setting`
--

INSERT INTO `email_setting` (`email_setting_id`, `email`, `host_name`, `port`, `username`, `password`, `secuirity_protocol`, `code`, `user_id`, `company_id`, `status`, `createdAt`) VALUES
(1, 'demo123@gmail.com', 'smtp.gmail.com', '465', 'aasif1@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'POP3', '654321', 0, 1, 0, '2017-08-21 07:29:03'),
(2, 'new@gmail.com', 'smtp.gmail.com', '465', 'new@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 2, 0, '2017-08-23 07:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `environment`
--

CREATE TABLE `environment` (
  `environment_id` bigint(20) NOT NULL,
  `environment_name` varchar(255) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `added_by` bigint(20) NOT NULL,
  `added_by_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `environment`
--

INSERT INTO `environment` (`environment_id`, `environment_name`, `company_id`, `user_id`, `added_by`, `added_by_name`, `status`, `createdAt`) VALUES
(1, 'Production ', 1, 0, 0, 'admin', 0, '2017-08-18 06:03:31'),
(2, 'Development', 1, 0, 0, 'admin', 0, '2017-08-18 06:03:35'),
(3, 'Testing', 1, 0, 0, 'company', 0, '2017-08-19 05:28:38'),
(4, 'Production', 2, 0, 0, 'company', 0, '2017-08-23 05:55:40');

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
(1, 'system_name', 'Partner IT'),
(2, 'system_title', 'Partner IT'),
(3, 'address', 'Pune'),
(4, 'phone', '9922031316'),
(5, 'paypal_email', 'payment@partnerit.com'),
(6, 'currency', 'INR'),
(7, 'system_email', 'ashifsayyad3@gmail.com'),
(8, 'buyer', ''),
(9, 'purchase_code', ''),
(11, 'language', 'Marathi'),
(12, 'text_align', 'left-to-right'),
(13, 'system_currency_id', '1'),
(14, 'clickatell_user', '[YOUR CLICKATELL USERNAME]'),
(15, 'clickatell_password', '[YOUR CLICKATELL PASSWORD]'),
(16, 'clickatell_api_id', '[YOUR CLICKATELL API ID]');

-- --------------------------------------------------------

--
-- Table structure for table `tce_testcases_results`
--

CREATE TABLE `tce_testcases_results` (
  `ID` int(50) UNSIGNED NOT NULL,
  `RUNNAME` varchar(200) NOT NULL,
  `TESTCASENAME` varchar(200) NOT NULL,
  `EXECUTIONDATE` varchar(200) NOT NULL,
  `RESULT` varchar(200) NOT NULL,
  `ELAPSETIME` varchar(200) NOT NULL,
  `EXECUTEDBY` varchar(200) NOT NULL,
  `COMPANY` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `REASON` varchar(200) DEFAULT NULL,
  `AddedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE `testcases` (
  `testcase_id` bigint(20) NOT NULL,
  `testcase_name` varchar(255) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status_type` int(1) NOT NULL COMMENT '0-private,1-public',
  `user_type` int(1) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_Availbale` int(1) DEFAULT NULL COMMENT '1-yes,0-no',
  `status` int(1) NOT NULL COMMENT '1-active,0-deactive',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`testcase_id`, `testcase_name`, `application_id`, `company_id`, `user_id`, `status_type`, `user_type`, `class_name`, `description`, `is_Availbale`, `status`, `createdAt`) VALUES
(1, 'TC_SmartIT_LoginAndLogout', 1, 1, 0, 1, 3, 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 'something something', 1, 0, '2017-08-18 07:14:35'),
(2, 'TC_SmartIT_LoginAndLogout', 13, 2, 0, 1, 1, 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 1, 0, '2017-08-23 06:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `testcase_result`
--

CREATE TABLE `testcase_result` (
  `testcase_result_id` bigint(20) NOT NULL,
  `runname` varchar(255) NOT NULL,
  `testcase_id` bigint(20) NOT NULL,
  `testcase_name` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'executed_by',
  `application_id` bigint(20) NOT NULL,
  `compnay_id` bigint(20) NOT NULL,
  `browser_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `execution_date` varchar(255) NOT NULL,
  `elapse_time` varchar(255) NOT NULL,
  `result` int(1) NOT NULL COMMENT '1-passed,0-failed',
  `reason` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `user_type` int(1) NOT NULL COMMENT 'Adm.-1,Company-2,Tester-3',
  `company_id` bigint(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` text NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `profile_img` text NOT NULL,
  `description` text NOT NULL,
  `added_by` bigint(20) NOT NULL COMMENT 'created_by',
  `added_by_name` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL COMMENT 'active-1,deactive-0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `company_id`, `fname`, `lname`, `email`, `password`, `designation`, `user_name`, `contact`, `address`, `profile_img`, `description`, `added_by`, `added_by_name`, `createdAt`, `status`) VALUES
(1, 3, 1, 'Aasif', 'Sayyad', 'aasif@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9922031316', 'pune', '', '', 1, 'admin', '2017-08-21 08:53:42', 0),
(4, 1, 1, 'Rohit ', 'Patil', 'rohit123@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '9874561230', 'pune', '', '', 1, 'admin', '2017-08-18 07:01:24', 0),
(5, 1, 1, 'Rohit', 'Sharma', 'sharma@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9856859855', 'pune', '', '', 1, 'admin', '2017-08-18 07:01:28', 0),
(6, 1, 1, 'Samir', 'Tripathy', 'samir@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9225733218', 'pune', '', '', 0, 'company', '2017-08-18 17:10:39', 0),
(7, 3, 2, 'Rohit', 'Patil', 'rohit@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9874568596', 'pune', '', '', 0, 'company', '2017-08-23 05:54:42', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_i` (`user_id`);

--
-- Indexes for table `browser`
--
ALTER TABLE `browser`
  ADD PRIMARY KEY (`browser_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company_environment`
--
ALTER TABLE `company_environment`
  ADD PRIMARY KEY (`company_env_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company_environ_url`
--
ALTER TABLE `company_environ_url`
  ADD PRIMARY KEY (`company_environ_url_id`),
  ADD KEY `company_env_id` (`company_env_id`),
  ADD KEY `environment_id` (`environment_id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `email_log`
--
ALTER TABLE `email_log`
  ADD PRIMARY KEY (`email_log_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `email_setting`
--
ALTER TABLE `email_setting`
  ADD PRIMARY KEY (`email_setting_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `environment`
--
ALTER TABLE `environment`
  ADD PRIMARY KEY (`environment_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`added_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `tce_testcases_results`
--
ALTER TABLE `tce_testcases_results`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
  ADD PRIMARY KEY (`testcase_id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `testcase_result`
--
ALTER TABLE `testcase_result`
  ADD PRIMARY KEY (`testcase_result_id`),
  ADD KEY `testcase_id` (`testcase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`compnay_id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `browser_id` (`browser_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_id` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `browser`
--
ALTER TABLE `browser`
  MODIFY `browser_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `company_environment`
--
ALTER TABLE `company_environment`
  MODIFY `company_env_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company_environ_url`
--
ALTER TABLE `company_environ_url`
  MODIFY `company_environ_url_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `email_log`
--
ALTER TABLE `email_log`
  MODIFY `email_log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `email_setting`
--
ALTER TABLE `email_setting`
  MODIFY `email_setting_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `environment`
--
ALTER TABLE `environment`
  MODIFY `environment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tce_testcases_results`
--
ALTER TABLE `tce_testcases_results`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;
--
-- AUTO_INCREMENT for table `testcases`
--
ALTER TABLE `testcases`
  MODIFY `testcase_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testcase_result`
--
ALTER TABLE `testcase_result`
  MODIFY `testcase_result_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
