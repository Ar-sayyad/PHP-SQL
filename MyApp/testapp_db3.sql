-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 12:08 PM
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
-- Database: `testapp_db3`
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
  `host_name` varchar(255) NOT NULL,
  `setting_email` varchar(255) NOT NULL,
  `setting_password` varchar(255) NOT NULL,
  `port` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `secuirity_protocol` varchar(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `profile_img` text NOT NULL,
  `path` text NOT NULL,
  `testdata_path` text NOT NULL,
  `batchfile_path` text NOT NULL,
  `pass_status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `password`, `contact`, `address`, `host_name`, `setting_email`, `setting_password`, `port`, `username`, `secuirity_protocol`, `code`, `profile_img`, `path`, `testdata_path`, `batchfile_path`, `pass_status`, `createdAt`) VALUES
(1, 'Samir', 'Tripathy', 'partnerit@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '9890344229', 'pune', 'smtp.gmail.com', 'teamautoit+application@gmail.com ', 'e006d9af9d73a2552c5528815e988b36713c1359', '465', '', 'SMTP', '!1drowss@P', '', 'C:/SeleniumAutomation_V1/Companies', 'C:/TestIT/wamp/www/TestApps', 'C:\\SeleniumAutomation_V1', 0, '2017-09-25 11:19:51');

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
(13, 'SmartIT', 0, 2, '', '', 0, '2017-08-23 06:42:19'),
(14, 'SmartIT', 0, 6, '', '', 0, '2017-08-26 09:57:01'),
(15, 'RemedyITSM', 0, 6, '', '', 0, '2017-08-26 09:57:24'),
(16, 'MyIT', 0, 6, '', '', 0, '2017-08-26 09:57:38'),
(17, 'RemedyITSM', 0, 8, '', '', 0, '2017-08-26 14:29:06'),
(18, 'SmartIT', 0, 8, '', '', 0, '2017-08-26 14:29:16'),
(19, 'MyIT', 24, 8, '', 'administrator', 0, '2017-09-20 09:24:45'),
(20, 'SmartIT', 0, 9, '', '', 0, '2017-08-28 12:30:20'),
(21, 'RemedyIT', 0, 9, '', '', 0, '2017-08-28 12:31:06'),
(22, 'MyIT', 0, 9, '', '', 0, '2017-08-28 12:31:35'),
(24, 'SmartIT', 0, 10, '', '', 0, '2017-08-29 05:26:55'),
(25, 'RemedyITSM', 0, 10, '', '', 0, '2017-08-29 05:28:09'),
(26, 'MyIT', 0, 10, '', '', 0, '2017-08-29 05:28:16'),
(27, 'MyIT', 0, 12, '', '', 0, '2017-08-30 16:05:47'),
(28, 'MyIT', 0, 18, '', '', 0, '2017-09-01 16:34:45'),
(29, 'New', 0, 22, '', '', 0, '2017-09-11 08:21:49'),
(31, 'RemedyIT', 0, 24, '', '', 0, '2017-09-16 07:09:09'),
(39, 'Test', 0, 8, '', '', 0, '2017-09-23 13:45:57');

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
(2, 'Chrome', 2, 0, '', 0, '2017-08-23 05:56:11'),
(3, 'Chrome', 6, 0, '', 0, '2017-08-26 09:56:42'),
(4, 'Chrome', 8, 0, '', 0, '2017-08-26 14:28:39'),
(5, 'InternetExplorer', 8, 24, 'administrator', 0, '2017-09-20 09:47:17'),
(6, 'Chrome', 9, 0, '', 0, '2017-08-28 12:29:27'),
(8, 'Chrome', 10, 0, '', 0, '2017-08-29 05:26:37'),
(9, 'Firefox', 1, 16, 'administrator', 0, '2017-08-29 13:23:12'),
(10, 'Opera', 12, 0, '', 0, '2017-08-30 16:05:25'),
(12, 'Chrome', 15, 0, '', 0, '2017-08-31 15:43:11'),
(13, 'Firefox', 15, 0, '', 0, '2017-08-31 15:43:21'),
(14, 'Calbro', 15, 27, 'administrator', 0, '2017-09-01 09:55:59'),
(17, 'Chrome', 24, 0, '', 0, '2017-09-16 07:08:57');

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
  `pass_status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `user_id`, `email`, `password`, `domain`, `contact_landline`, `contact`, `address`, `is_Url_add`, `status`, `pass_status`, `createdAt`) VALUES
(8, 'Demo DO NOT DELETE', 0, 'rahul41085@gmail.com', 'e084ded30d5bda2fcb585f30cf99ec0d57a84b0d', '', '', '1231231231', 'Lohegaon', 0, 1, 1, '2017-09-18 12:17:30'),
(15, 'Calbro', 0, 'Admin@calbro.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '', '', 0, 0, 0, '2017-08-31 14:24:28'),
(16, 'Partner IT', 0, 'admin@partnerit.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '', '', 0, 0, 0, '2017-08-31 14:25:12'),
(17, 'Fortuner', 0, 'admin@fortuner.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '', '', 0, 0, 0, '2017-09-01 10:27:44'),
(18, 'NewOne', 0, 'admin@newone.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', '', '', '', '', 0, 0, 0, '2017-09-01 16:30:38'),
(24, 'MNCcompany', 0, 'mnc@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '', 'pune', 0, 0, 0, '2017-09-16 06:46:07'),
(25, 'Newdemo', 0, 'newdemo@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '', '', 0, 0, 0, '2017-09-16 09:41:17'),
(26, 'With Space Company ', 0, 'comp@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '', '', 0, 0, 0, '2017-09-16 12:08:07'),
(33, 'Company11', 0, 'Company11@gmail.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', '', '', '', '', 0, 0, 0, '2017-09-18 05:46:05'),
(34, 'Currency', 0, 'coaa@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '', 'pune', 0, 0, 0, '2017-09-25 06:41:01');

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
(4, 2, 13, 0, 0, '2017-08-23 06:44:47'),
(5, 6, 14, 0, 0, '2017-08-26 09:59:00'),
(6, 8, 18, 0, 0, '2017-08-26 14:33:41'),
(7, 8, 17, 0, 0, '2017-08-26 14:34:04'),
(9, 9, 20, 0, 0, '2017-08-28 12:33:48'),
(10, 9, 21, 0, 0, '2017-08-28 12:34:38'),
(11, 9, 22, 0, 0, '2017-08-28 12:34:51'),
(12, 10, 24, 0, 0, '2017-08-29 05:29:54'),
(13, 10, 25, 0, 0, '2017-08-29 05:30:05'),
(14, 10, 26, 0, 0, '2017-08-29 05:30:12'),
(17, 6, 15, 0, 0, '2017-08-30 13:00:32'),
(18, 6, 16, 0, 0, '2017-08-30 13:00:39'),
(19, 12, 27, 0, 0, '2017-08-30 16:12:06'),
(20, 14, 28, 0, 0, '2017-08-31 12:03:14'),
(21, 24, 31, 0, 0, '2017-09-16 07:09:54'),
(22, 8, 19, 0, 0, '2017-09-18 09:32:24');

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
(15, 4, 2, 'Production', 'https://servicemaster-dev-smartit.onbmc.com', 4, 13, 0, 0, '2017-08-23 06:44:47'),
(16, 5, 6, 'Production', 'https://servicemaster-dev-smartit.onbmc.com', 5, 14, 0, 0, '2017-08-26 09:59:00'),
(17, 5, 6, 'Development', '', 6, 14, 0, 0, '2017-08-26 09:59:00'),
(18, 5, 6, 'Testing', '', 7, 14, 0, 0, '2017-08-30 12:59:35'),
(19, 5, 6, 'Staging', '', 8, 14, 0, 0, '2017-08-26 11:13:22'),
(20, 6, 8, 'Development', 'http://localhost:8080/arsys/shared/login.jsp', 9, 18, 0, 0, '2017-08-31 14:02:10'),
(23, 7, 8, 'Development', 'http://localhost:8080/arsys/shared/login.jsp', 9, 17, 0, 0, '2017-08-30 05:19:50'),
(29, 9, 9, 'Production', 'https://servicemaster-dev-smartit.onbmc.com', 12, 20, 0, 0, '2017-08-28 12:33:48'),
(30, 9, 9, 'Development', '', 13, 20, 0, 0, '2017-08-28 12:33:48'),
(31, 9, 9, 'Testing', '', 14, 20, 0, 0, '2017-08-28 12:33:48'),
(32, 10, 9, 'Production', '', 12, 21, 0, 0, '2017-08-28 13:17:06'),
(33, 10, 9, 'Development', '', 13, 21, 0, 0, '2017-08-28 12:34:38'),
(34, 10, 9, 'Testing', '', 14, 21, 0, 0, '2017-08-28 13:17:06'),
(35, 11, 9, 'Production', '', 12, 22, 0, 0, '2017-08-28 12:34:51'),
(36, 11, 9, 'Development', '', 13, 22, 0, 0, '2017-08-28 13:16:56'),
(37, 11, 9, 'Testing', '', 14, 22, 0, 0, '2017-08-28 12:34:52'),
(41, 12, 10, 'Production', 'https://servicemaster-dev-smartit.onbmc.com', 16, 24, 0, 0, '2017-08-29 05:29:54'),
(42, 12, 10, 'Development', '', 17, 24, 0, 0, '2017-08-29 05:29:54'),
(43, 12, 10, 'Testing', '', 18, 24, 0, 0, '2017-08-29 05:29:54'),
(44, 13, 10, 'Production', '', 16, 25, 0, 0, '2017-08-29 05:30:05'),
(45, 13, 10, 'Development', '', 17, 25, 0, 0, '2017-08-29 05:30:05'),
(46, 13, 10, 'Testing', '', 18, 25, 0, 0, '2017-08-29 05:30:05'),
(47, 14, 10, 'Production', '', 16, 26, 0, 0, '2017-08-29 05:30:12'),
(48, 14, 10, 'Development', '', 17, 26, 0, 0, '2017-08-29 05:30:12'),
(49, 14, 10, 'Testing', '', 18, 26, 0, 0, '2017-08-29 05:30:12'),
(50, 1, 1, 'Testing_Aug', '', 19, 1, 0, 0, '2017-08-29 08:42:19'),
(51, 2, 1, 'Testing_Aug', 'http://localhost:8080/arsys/shared/login.jsp', 19, 2, 0, 0, '2017-08-29 08:45:51'),
(52, 3, 1, 'Testing_Aug', '', 19, 3, 0, 0, '2017-08-29 08:42:19'),
(53, 1, 1, 'TestNG', '', 20, 1, 16, 0, '2017-08-29 13:22:48'),
(54, 2, 1, 'TestNG', '', 20, 2, 16, 0, '2017-08-29 13:22:48'),
(55, 3, 1, 'TestNG', '', 20, 3, 16, 0, '2017-08-29 13:22:48'),
(85, 17, 6, 'Production', '', 5, 15, 0, 0, '2017-08-30 13:00:32'),
(86, 17, 6, 'Development', '', 6, 15, 0, 0, '2017-08-30 13:00:32'),
(87, 17, 6, 'Testing', '', 7, 15, 0, 0, '2017-08-30 13:00:32'),
(88, 17, 6, 'Staging', '', 8, 15, 0, 0, '2017-08-30 13:00:32'),
(89, 18, 6, 'Production', '', 5, 16, 0, 0, '2017-08-30 13:00:39'),
(90, 18, 6, 'Development', '', 6, 16, 0, 0, '2017-08-30 13:00:39'),
(91, 18, 6, 'Testing', '', 7, 16, 0, 0, '2017-08-30 13:00:39'),
(92, 18, 6, 'Staging', '', 8, 16, 0, 0, '2017-08-30 13:00:39'),
(93, 19, 12, 'Development', 'http://localhost:8080/arsys/shared/login.jsp', 20, 27, 0, 0, '2017-08-30 16:12:06'),
(94, 20, 14, 'Chrome', 'company', 21, 28, 0, 0, '2017-08-31 12:03:14'),
(99, 21, 24, 'Production', 'https://servicemaster-dev-smartit.onbmc.com', 27, 31, 0, 0, '2017-09-16 07:09:54'),
(100, 21, 24, 'Development', '', 28, 31, 0, 0, '2017-09-16 07:10:05'),
(105, 22, 8, 'Development', 'www.google.com', 9, 19, 0, 0, '2017-09-18 09:32:24'),
(108, 6, 8, 'Production', '', 29, 18, 0, 0, '2017-09-21 16:41:41'),
(109, 7, 8, 'Production', 'http://localhost:8080/arsys/shared/login.jsp', 29, 17, 0, 0, '2017-09-21 16:42:05'),
(110, 22, 8, 'Production', 'www.yahoo.co.in', 29, 19, 0, 0, '2017-09-22 06:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_log`
--

CREATE TABLE `email_log` (
  `email_log_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `runname` varchar(255) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `browser_id` bigint(20) NOT NULL,
  `environment_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `execution_time` varchar(255) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-pending,1-send',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_log`
--

INSERT INTO `email_log` (`email_log_id`, `email`, `runname`, `company_id`, `browser_id`, `environment_id`, `user_id`, `execution_time`, `status`, `createdAt`) VALUES
(264, 'rahul41085@gmail.com', 'Test1', 8, 4, 9, 8, '2017-09-23 18:51:47', 0, '2017-09-23 13:21:47'),
(265, 'rahul41085@gmail.com', 'Test2', 8, 4, 0, 8, '2017-09-23 19:03:24', 0, '2017-09-23 13:33:24'),
(277, 'aasif.techrnl@gmail.com', 'aasifsayyadtest', 8, 4, 0, 24, '2017-09-25 12:44:36', 0, '2017-09-25 07:14:36');

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
(2, 'new@gmail.com', 'smtp.gmail.com', '465', 'new@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 2, 0, '2017-08-23 07:21:40'),
(3, 'ashifsayyad3@gmail.com', 'smtp.gmail.com', '465', 'ashifsayyad@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 6, 0, '2017-08-30 13:01:58'),
(4, 'autoit@gmail.com', 'smtp.gmail.com', '465', 'autoit@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 7, 0, '2017-08-26 13:05:30'),
(5, 'rahul41085@gmail.com', 'ssl://smtp.googlemail.com', '465', 'teamautoit+company@gmail.com', 'e006d9af9d73a2552c5528815e988b36713c1359', 'SMTP', '!1drowss@P', 0, 8, 0, '2017-09-18 12:08:54'),
(6, 'capgemini@gmail.com', 'smtp.gmail.com', '465', 'capgemini@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'POP3', '654321', 0, 9, 0, '2017-08-28 13:16:12'),
(7, 'infosys@gmail.com', 'smtp.gmail.com', '465', 'infosys@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 10, 0, '2017-08-29 05:21:40'),
(8, 'test@gmail.com', 'smtp.gmail.com', '465', 'test@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 11, 0, '2017-08-30 14:39:06'),
(9, 'demo@test.com', 'smtp.gmail.com', '465', 'demo@test.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', 'SMTP', '1', 0, 12, 0, '2017-08-30 16:02:13'),
(10, 'fdgdf@gmail.com', 'smtp.gmail.com', '465', 'fdgdf@gmail.com', 'e983437f29f64b4c158d77b8f902192a9da17c9a', 'SMTP', '11', 0, 13, 0, '2017-08-31 06:58:11'),
(11, 'testing@gmail.com', 'smtp.gmail.com', '465', 'testing@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 14, 0, '2017-08-31 11:27:48'),
(12, 'Admin@calbro.com', 'smtp.gmail.com', '465', 'Admin@calbro.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 15, 0, '2017-08-31 14:24:28'),
(13, 'admin@partnerit.com', 'smtp.gmail.com', '465', 'admin@partnerit.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 16, 0, '2017-08-31 14:25:12'),
(14, 'admin@fortuner.com', 'smtp.gmail.com', '465', 'admin@fortuner.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', 'SMTP', '654321', 0, 17, 0, '2017-09-01 10:27:44'),
(15, 'admin@newone.com', 'smtp.gmail.com', '465', 'admin@newone.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', 'SMTP', '1', 0, 18, 0, '2017-09-01 16:30:38'),
(16, 'admin@testme.com', 'smtp.gmail.com', '465', 'admin@testme.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', 'SMTP', '1', 0, 19, 0, '2017-09-09 15:20:24'),
(21, 'mnc@gmail.com', 'ssl://smtp.googlemail.com', '465', 'teamautoit+company@gmail.com', 'e006d9af9d73a2552c5528815e988b36713c1359', 'SMTP', '!1drowss@P', 0, 24, 0, '2017-09-16 07:23:17'),
(22, 'newdemo@gmail.com', 'ssl://smtp.googlemail.com', '465', 'newdemo@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', 'smtp', '321', 0, 25, 0, '2017-09-16 09:41:17'),
(23, 'comp@gmail.com', 'ssl://smtp.googlemail.com', '465', 'comp@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', 'smtp', '321', 0, 26, 0, '2017-09-16 12:06:46'),
(26, 'Company11@gmail.com', 'ssl://smtp.googlemail.com', '465', 'Company11@gmail.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', 'smtp', '1', 0, 33, 0, '2017-09-18 05:46:05'),
(27, 'coaa@gmail.com', 'ssl://smtp.googlemail.com', '465', 'coaa@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', 'smtp', '321', 0, 34, 0, '2017-09-25 06:41:01');

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
(4, 'Production', 2, 0, 0, 'company', 0, '2017-08-23 05:55:40'),
(5, 'Production', 6, 0, 0, 'company', 0, '2017-08-26 09:50:15'),
(6, 'Development', 6, 0, 0, 'company', 0, '2017-08-26 09:50:27'),
(7, 'Testing', 6, 0, 0, 'company', 0, '2017-08-26 09:50:37'),
(8, 'Staging', 6, 0, 0, 'company', 0, '2017-08-26 11:13:22'),
(9, 'Development', 8, 24, 0, 'company', 0, '2017-09-21 05:57:16'),
(12, 'Production', 9, 0, 0, 'company', 0, '2017-08-28 12:28:26'),
(13, 'Development', 9, 0, 0, 'company', 0, '2017-08-28 12:28:39'),
(14, 'Testing', 9, 0, 0, 'company', 0, '2017-08-28 12:29:09'),
(16, 'Production', 10, 0, 0, 'company', 0, '2017-08-29 05:26:07'),
(17, 'Development', 10, 0, 0, 'company', 0, '2017-08-29 05:26:16'),
(18, 'Testing', 10, 0, 0, 'company', 0, '2017-08-29 05:26:24'),
(19, 'Testing_Aug', 1, 0, 0, 'company', 0, '2017-08-29 08:42:19'),
(20, 'Development', 12, 0, 0, 'company', 0, '2017-08-30 16:05:07'),
(24, 'Calbro', 15, 27, 0, 'administrator', 0, '2017-09-01 09:55:43'),
(27, 'Production', 24, 0, 0, 'company', 0, '2017-09-16 07:08:48'),
(28, 'Development', 24, 0, 0, 'company', 0, '2017-09-16 07:10:05'),
(29, 'Production', 8, 0, 0, 'company', 0, '2017-09-21 16:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `logical_group`
--

CREATE TABLE `logical_group` (
  `logical_group_id` bigint(20) NOT NULL,
  `logical_group_name` varchar(255) NOT NULL,
  `environment_id` bigint(20) NOT NULL,
  `testcase_id` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_by_name` varchar(60) NOT NULL,
  `created_by` varchar(15) NOT NULL,
  `created_email` varchar(60) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logical_group`
--

INSERT INTO `logical_group` (`logical_group_id`, `logical_group_name`, `environment_id`, `testcase_id`, `user_id`, `created_by_name`, `created_by`, `created_email`, `company_id`, `createdAt`) VALUES
(63, 'Incident Related', 9, '[\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\"]', 0, 'Demo DO NOT DELETE', 'company', 'rahul41085@gmail.com', 8, '2017-09-23 13:16:04'),
(65, 'Problem Related', 9, '[\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\"]', 0, 'Demo DO NOT DELETE', 'company', 'rahul41085@gmail.com', 8, '2017-09-23 13:18:51'),
(66, 'Change Request Related', 9, '[\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\"]', 0, 'Demo DO NOT DELETE', 'company', 'rahul41085@gmail.com', 8, '2017-09-23 13:19:59'),
(67, 'Work Order Related', 9, '[37,38,39,40,41,42,43,44,46,47]', 0, 'Demo DO NOT DELETE', 'company', 'rahul41085@gmail.com', 8, '2017-09-23 13:20:35'),
(68, 'Field Validation', 9, '[\"21\",\"37\",\"48\",\"68\"]', 0, 'Demo DO NOT DELETE', 'company', 'rahul41085@gmail.com', 8, '2017-09-23 13:31:06'),
(69, 'Sample 1', 9, '[\"10\",\"11\",\"99\"]', 0, 'Demo DO NOT DELETE', 'company', 'rahul41085@gmail.com', 8, '2017-09-23 13:32:41');

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
  `runner_id` bigint(20) NOT NULL DEFAULT '0',
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

--
-- Dumping data for table `tce_testcases_results`
--

INSERT INTO `tce_testcases_results` (`ID`, `runner_id`, `RUNNAME`, `TESTCASENAME`, `EXECUTIONDATE`, `RESULT`, `ELAPSETIME`, `EXECUTEDBY`, `COMPANY`, `EMAIL`, `REASON`, `AddedDate`) VALUES
(1503, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '23-09-2017 17:54:58', 'Passed', '13', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 17:55:16'),
(1504, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '23-09-2017 18:39:45', 'Passed', '13', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 18:40:03'),
(1505, 264, 'Test1', 'TC_RemedyITSM_CreateNewIncidentWithoutCI', '23-09-2017 18:51:48', 'Passed', '46', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 18:52:40'),
(1506, 264, 'Test1', 'TC_RemedyITSM_SearchAndModifyIncident', '23-09-2017 18:52:40', 'Passed', '59', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 18:53:42'),
(1507, 264, 'Test1', 'TC_RemedyITSM_LoginAndLogoutTest', '23-09-2017 18:53:42', 'Passed', '13', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 18:53:58'),
(1508, 265, 'Test2', 'TC_RemedyITSM_IncidentFieldValidation', '23-09-2017 19:03:25', 'Passed', '23', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:03:54'),
(1509, 265, 'Test2', 'TC_RemedyITSM_WorkOrderFieldValidation', '23-09-2017 19:03:54', 'Failed', '53', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:04:51'),
(1510, 265, 'Test2', 'TC_RemedyITSM_ProblemFieldValidation', '23-09-2017 19:04:52', 'Failed', '40', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:05:37'),
(1511, 265, 'Test2', 'TC_RemedyITSM_CreateChangeRequestFieldValidation', '23-09-2017 19:05:38', 'Passed', '98', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:07:20'),
(1512, 265, 'Test2', 'TC_RemedyITSM_CreateNewIncidentWithoutCI', '23-09-2017 19:07:20', 'Passed', '47', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:08:11'),
(1513, 265, 'Test2', 'TC_RemedyITSM_SearchAndModifyIncident', '23-09-2017 19:08:11', 'Passed', '59', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:09:13'),
(1514, 265, 'Test2', 'TC_RemedyITSM_LoginAndLogoutTest', '23-09-2017 19:09:13', 'Passed', '12', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:09:28'),
(1515, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '23-09-2017 19:12:12', 'Passed', '12', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-23 19:12:30'),
(1516, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 20:42:40', 'Passed', '15', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 20:43:01'),
(1517, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 20:44:23', 'Passed', '12', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 20:44:40'),
(1518, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 21:43:33', 'Passed', '13', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 21:43:51'),
(1519, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 21:44:56', 'Passed', '12', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 21:45:14'),
(1520, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 21:47:54', 'Passed', '12', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 21:48:12'),
(1521, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 21:50:57', 'Passed', '13', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 21:51:15'),
(1522, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 21:53:53', 'Passed', '12', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 21:54:11'),
(1523, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 21:56:12', 'Passed', '13', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 21:56:31'),
(1524, 201, 'Eclipse Execution', 'TC_RemedyITSM_LoginAndLogoutTest', '24-09-2017 21:58:09', 'Passed', '12', 'Demo DO NOT DELETE', 'Demo DO NOT DELETE', 'rahul41085@gmail.com', NULL, '2017-09-24 21:58:27'),
(1526, 277, 'aasifsayyadtest', 'TC_RemedyITSM_CreateNewIncidentWithoutCI', '25-09-2017 12:44:37', 'Passed', '49', 'Aasif Sayyad', 'Demo DO NOT DELETE', 'aasif.techrnl@gmail.com', NULL, '2017-09-25 12:45:31'),
(1527, 277, 'aasifsayyadtest', 'TC_RemedyITSM_SearchAndModifyIncident', '25-09-2017 12:45:31', 'Passed', '63', 'Aasif Sayyad', 'Demo DO NOT DELETE', 'aasif.techrnl@gmail.com', NULL, '2017-09-25 12:46:38'),
(1528, 277, 'aasifsayyadtest', 'TC_RemedyITSM_LoginAndLogoutTest', '25-09-2017 12:46:38', 'Passed', '13', 'Aasif Sayyad', 'Demo DO NOT DELETE', 'aasif.techrnl@gmail.com', NULL, '2017-09-25 12:46:54');

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
  `is_Availbale` int(1) NOT NULL DEFAULT '0' COMMENT '1-yes,0-no',
  `status` int(1) NOT NULL COMMENT '1-active,0-deactive',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`testcase_id`, `testcase_name`, `application_id`, `company_id`, `user_id`, `status_type`, `user_type`, `class_name`, `description`, `is_Availbale`, `status`, `createdAt`) VALUES
(1, 'TC_SmartIT_LoginAndLogout', 1, 1, 0, 1, 1, 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 'something something', 1, 0, '2017-08-26 07:11:13'),
(2, 'TC_SmartIT_LoginAndLogout', 13, 2, 0, 1, 1, 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 1, 0, '2017-08-23 06:44:15'),
(3, 'TC_SmartIT_LoginAndLogout', 14, 6, 0, 1, 1, 'com.ServiceMaster.SmartIT.LoginAndLogoutTest	', 'Test Case Desciption', 1, 0, '2017-08-26 09:58:26'),
(6, 'TC_SmartIT_LoginAndLogout', 20, 9, 0, 1, 1, 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 'SOME DATA', 1, 0, '2017-08-28 12:32:52'),
(7, 'New_Test_Case', 21, 9, 11, 1, 1, 'Class_of_New_Test_case', 'desciption of test case', 1, 0, '2017-08-28 12:45:38'),
(9, 'TC_SmartIT_LoginAndLogout', 24, 10, 0, 1, 1, 'com.ServiceMaster.MyIT.LoginAndLogoutTest', 'some dtata', 1, 0, '2017-08-29 05:29:12'),
(10, 'TC_RemedyITSM_CreateNewIncidentWithoutCI', 17, 8, 9, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithoutCI', '19.	Create an incident without any related CI(CI+).', 0, 0, '2017-09-16 12:25:36'),
(11, 'TC_RemedyITSM_SearchAndModifyIncident', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.SearchAndModifyIncident', '21.	Search and Modify an Incident', 0, 0, '2017-08-31 02:17:19'),
(12, 'TC_RemedyITSM_CreateNewIncidentWithTypeUserServiceRestoration', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithTypeUserServiceRestoration', '22.	Create incident with different Incident Type i.User service restoration.', 0, 0, '2017-08-31 02:17:19'),
(13, 'TC_RemedyITSM_CreateNewIncidentWithTypeUserServiceRequest', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithTypeUserServiceRequest', '23.	Create incident with different Incident Type ii.user service requests', 0, 0, '2017-08-31 02:17:19'),
(14, 'TC_RemedyITSM_CreateNewIncidentWithTypeInfrastructureRestoration', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithTypeInfrastructureRestoration', '24.	Create incident with different Incident Type iii.Infrastructure restoration.', 0, 0, '2017-08-31 02:17:19'),
(15, 'TC_RemedyITSM_CreateNewIncidentWithTypeInfrastructureEvents', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithTypeInfrastructureEvents', '25.	Create incident with different Incident Typre iv.Infrastructure events.', 0, 0, '2017-08-31 02:17:19'),
(16, 'TC_RemedyITSM_CreateNewIncidentWithProrityLow', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithProrityLow', '26.	An incident with priority Low.', 0, 0, '2017-08-31 02:17:19'),
(17, 'TC_RemedyITSM_CreateNewIncidentWithProrityHigh', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithProrityHigh', '27.	An incident with priority High.', 0, 0, '2017-08-31 02:17:19'),
(18, 'TC_RemedyITSM_CreateNewIncidentWithProrityMedium', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithProrityMedium', '28.	An incident with priority Medium.', 0, 0, '2017-08-31 02:17:19'),
(19, 'TC_RemedyITSM_CreateNewIncidentWithProrityCritical', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithProrityCritical', '29.	An incident with priority critical', 0, 0, '2017-08-31 02:17:19'),
(20, 'TC_RemedyITSM_CreateNewIncidentWithIncidentTemplate', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithIncidentTemplate', '20.	Create an incident using incident template (Template+)', 0, 0, '2017-08-31 02:17:19'),
(21, 'TC_RemedyITSM_IncidentFieldValidation', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.IncidentFieldValidation', '18.	Create an Incident to do required field validation', 0, 0, '2017-08-31 02:17:19'),
(22, 'TC_RemedyITSM_CreateNewIncidentWithOperationalCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithOperationalCategorization', '49.	Create incident with Operational Categorization', 0, 0, '2017-08-31 02:17:19'),
(23, 'TC_RemedyITSM_CreateNewIncidentWithProductCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithProductCategorization', '50.	Create incident with Product Categorization', 0, 0, '2017-08-31 02:17:19'),
(24, 'TC_RemedyITSM_CreateNewIncidentWithOperationalAndProductCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithOperationalAndProductCategorization', '51.	Create incident with both Operational and Product Categorization', 0, 0, '2017-08-31 02:17:19'),
(25, 'TC_RemedyITSM_CreateNewIncidentWithPublicWorkInfo', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithPublicWorkInfo', '52.	Create Incident with WorkInfo public', 0, 0, '2017-08-31 02:17:19'),
(26, 'TC_RemedyITSM_CreateNewIncidentWithInternalWorkInfo', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithInternalWorkInfo', '53.	Create Incident with WorkInfo internal', 0, 0, '2017-08-31 02:17:19'),
(27, 'TC_RemedyITSM_CreateNewTaskAndRelateToIncident', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewTaskAndRelateToIncident', '48.	Using Ad hoc task request create a Task and related to incident', 0, 0, '2017-08-31 02:17:19'),
(28, 'TC_RemedyITSM_CreateNewIncidentWithRelateTaskTemplate', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentWithRelateTaskTemplate', '46.	Relate a Task Template to an Incident', 0, 0, '2017-08-31 02:17:19'),
(29, 'TC_RemedyITSM_CreateNewIncidentWithRelateTaskGroupTemplate', 2, 1, 16, 1, 1, ' com.Demo.RemedyITSM.CreateNewIncidentWithRelateTaskGroupTemplate', 'Desc', 1, 0, '2017-08-29 09:30:47'),
(30, 'TC_RemedyITSM_CreateNewIncidentRelateWithCI', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentRelateWithCI', '30.	Create an incident and relate it with CI on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(31, 'TC_RemedyITSM_CreateNewIncidentRelateChangeRequest', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentRelateChangeRequest', '31.	Create an incident and relate it with a change request on relationship tab', 0, 0, '2017-08-31 02:17:19'),
(32, 'TC_RemedyITSM_CreateNewIncidentRelateIncidentRequest', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentRelateIncidentRequest', '32.	Create an incident and relate it with an incident request on relationship tab', 0, 0, '2017-08-31 02:17:19'),
(33, 'TC_RemedyITSM_CreateNewIncidentRelateProblemRequest', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentRelateProblemRequest', '33.	Create an incident and relate it with a Problem requests on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(34, 'TC_RemedyITSM_CreateNewIncidentRelateWorkOrder', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentRelateWorkOrder', '35.	Create an incident and relate it with a Work order on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(35, 'TC_RemedyITSM_CreateNewIncidentRelateKnownError', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewIncidentRelateKnownError', '38.	Create an incident and relate it with a Known Error requests on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(36, 'TC_RemedyITSM_ReopenResolvedIncident', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.ReopenResolvedIncident', '45.	Reopen a resolved incident', 0, 0, '2017-08-31 02:17:19'),
(37, 'TC_RemedyITSM_WorkOrderFieldValidation', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.WorkOrderFieldValidation', '68.	Create a work order to do required field validation', 0, 0, '2017-08-31 02:17:19'),
(38, 'TC_RemedyITSM_CreateWorkOrderWithWorkInfo', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderWithWorkInfo', '68.	Create a work order and add work info', 0, 0, '2017-08-31 02:17:19'),
(39, 'TC_RemedyITSM_CreateWorkOrderWithProductCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderWithProductCategorization', '69.	Create a work order with different product categorization', 0, 0, '2017-08-31 02:17:19'),
(40, 'TC_RemedyITSM_CreateWorkOrderWithOperationalCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderWithOperationalCategorization', '70.	Create a work order with different operation categorization', 0, 0, '2017-08-31 02:17:19'),
(41, 'TC_RemedyITSM_CreateWorkOrderRelateWithAdhocTask', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderRelateWithAdhocTask', '71.	Create a work order and relate an Ad hoc Task.', 0, 0, '2017-08-31 02:17:19'),
(42, 'TC_RemedyITSM_CreateWorkOrderRelateWithTaskTemplate', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderRelateWithTaskTemplate', '72.	Create a work order and relate Task Template.', 0, 0, '2017-08-31 02:17:19'),
(43, 'TC_RemedyITSM_CreateWorkOrderRelateWithTaskGroupTemplate', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderRelateWithTaskGroupTemplate', '73.	Create a work order and relate Task Group Template.', 0, 0, '2017-08-31 02:17:19'),
(44, 'TC_RemedyITSM_CreateWorkOrderRelateWithCIFromRelationShip', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderRelateWithCIFromRelationShip', '74.	Create a work order and relate a Configuration Item on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(45, 'TC_RemedyITSM_CreateWorkOrderRelateWithIncidentFromRelationShip', 2, 1, 16, 1, 1, ' com.Demo.RemedyITSM.CreateWorkOrderRelateWithIncidentFromRelationShip', 'Desc', 1, 0, '2017-08-29 09:54:08'),
(46, 'TC_RemedyITSM_CreateWorkOrderRelateWithChangeRequestFromRelationShip', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderRelateWithChangeRequestFromRelationShip', '76.	Create a work order and relate a change request on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(47, 'TC_RemedyITSM_CreateWorkOrderRelateWithWorkOrderFromRelationShip', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateWorkOrderRelateWithWorkOrderFromRelationShip', '77.	Create a work order and relate another work order request on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(48, 'TC_RemedyITSM_ProblemFieldValidation', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.ProblemFieldValidation', '84.	Create a Problem request to do required field validation.', 0, 0, '2017-08-31 02:17:19'),
(49, 'TC_RemedyITSM_CreateNewProblemFromIncidentPage', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewProblemFromIncidentPage', '85.	Create a Problem Request from Incident module', 0, 0, '2017-08-31 02:17:19'),
(50, 'TC_RemedyITSM_CreateNewProblemRequestUsingProblemForm', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateNewProblemRequestUsingProblemForm', '86.	Create a Problem Request using Problem Form.', 0, 0, '2017-08-31 02:17:19'),
(51, 'TC_RemedyITSM_SearchAndModifyProblem', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.SearchAndModifyProblem', '87.	Search and Modify a Problem', 0, 0, '2017-08-31 02:17:19'),
(52, 'TC_RemedyITSM_CreateProblemWithOperationalCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemWithOperationalCategorization', '93.	Create a Problem Request with Operational Categorization', 0, 0, '2017-08-31 02:17:19'),
(53, 'TC_RemedyITSM_CreateProblemWithProductCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemWithProductCategorization', '94.	Create a Problem Request with Product Categorization', 0, 0, '2017-08-31 02:17:19'),
(54, 'TC_RemedyITSM_CreateProblemWithOperationalAndProductCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemWithOperationalAndProductCategorization', '95.	Create a Problem Request with both Product and Operational Categorization', 0, 0, '2017-08-31 02:17:19'),
(55, 'TC_RemedyITSM_SearchProblemChangeOperationalAndProductCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.SearchProblemChangeOperationalAndProductCategorization', '96.	Search a Problem request and change both Product and Operational Categorization', 0, 0, '2017-08-31 02:17:19'),
(56, 'TC_RemedyITSM_CreateProblemWithInvestigationDriverHighImpactIncident', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemWithInvestigationDriverHighImpactIncident', '97.	Create Problem Request with Investigation Driver as “high impact incident”', 0, 0, '2017-08-31 02:17:19'),
(57, 'TC_RemedyITSM_CreateProblemWithInvestigationDriverRecurringIncidents', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemWithInvestigationDriverRecurringIncidents', '98.	Create Problem Request with Investigation Driver as “Recurring Incident”', 0, 0, '2017-08-31 02:17:19'),
(58, 'TC_RemedyITSM_CreateProblemWithInvestigationDriverNonRoutineIncident', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemWithInvestigationDriverNonRoutineIncident', 'Create Problem Request with Investigation Driver as “Non-Routine Incident”', 0, 0, '2017-08-31 06:38:59'),
(59, 'TC_RemedyITSM_CreateProblemWithInvestigationDriverOther', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemWithInvestigationDriverOther', '99.	Create Problem Request with Investigation Driver as “Other”', 0, 0, '2017-08-31 02:17:19'),
(60, 'TC_RemedyITSM_CreateProblemAndRelateWithCIFromRelationships', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemAndRelateWithCIFromRelationships', '100.	Create a Problem and relate it with CI on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(61, 'TC_RemedyITSM_CreateProblemAndRelateWithChangeRequestFromRelationships', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemAndRelateWithChangeRequestFromRelationships', '101.	Create a Problem and relate it with a change request on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(62, 'TC_RemedyITSM_CreateProblemAndRelateWithIncidentFromRelationships', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemAndRelateWithIncidentFromRelationships', '102.	Create a Problem and relate it with an incident request on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(63, 'TC_RemedyITSM_CreateProblemAndRelateWithProblemRequestFromRelationships', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateProblemAndRelateWithProblemRequestFromRelationships', '103.	Create a Problem and relate it with another Problem requests on relationship tab.', 0, 0, '2017-08-31 02:17:19'),
(64, 'TC_RemedyITSM_CreateChangeRequestWithOperationalCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithOperationalCategorization', '106.	Creating change request with different Operational categorization.', 0, 0, '2017-08-31 02:17:19'),
(65, 'TC_RemedyITSM_CreateChangeRequestWithProductCategorization', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithProductCategorization', '107.	Creating change request with different Product categorization.', 0, 0, '2017-08-31 02:17:19'),
(66, 'TC_RemedyITSM_CreateChangeRequestWithSelectOperationalLink', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithSelectOperationalLink', '106.	Creating change request with different Operational categorization. Select the \"Select Operational\" from quick link. ', 0, 0, '2017-08-31 02:17:19'),
(67, 'TC_RemedyITSM_CreateChangeRequestWithSelectProductLink', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithSelectProductLink', '106.	Creating change request with different Operational categorization. Select the \"Select Operational\" from quick link.', 0, 0, '2017-08-31 02:17:19'),
(68, 'TC_RemedyITSM_CreateChangeRequestFieldValidation', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestFieldValidation', '110.	Create a change to do required field validation', 0, 0, '2017-08-31 02:17:19'),
(69, 'TC_RemedyITSM_CreateChangeRequestRelateWithChangeRequest', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestRelateWithChangeRequest', '111.	Create a Change request and relate it with another change request.', 0, 0, '2017-08-31 02:17:19'),
(70, 'TC_RemedyITSM_CreateChangeRequestRelateWithConfigurationItem', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestRelateWithConfigurationItem', '113.	Create a Change request and relate it with Configuration Item', 0, 0, '2017-08-31 02:17:19'),
(71, 'TC_RemedyITSM_CreateChangeRequestRelateWithIncident', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestRelateWithIncident', '114.	Create a Change request and relate it with Incident', 0, 0, '2017-08-31 02:17:19'),
(72, 'TC_RemedyITSM_CreateChangeRequestRelateWithKnownError', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestRelateWithKnownError', '115.	Create a Change request and relate it with Known Error', 0, 0, '2017-08-31 02:17:19'),
(73, 'TC_RemedyITSM_CreateChangeRequestRelateWithProblemInvestigation', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestRelateWithProblemInvestigation', '116.	Create a Change request and relate it with Problem Investigation', 0, 0, '2017-08-31 02:17:19'),
(74, 'TC_RemedyITSM_CreateChangeRequestRelateWithRelease', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestRelateWithRelease', '117. Create a Change request and relate it with Release', 0, 0, '2017-08-31 02:17:19'),
(75, 'TC_RemedyITSM_CreateChangeRequestRelateWithWorkOrder', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestRelateWithWorkOrder', '119.	Create a Change request and relate it with  work order', 0, 0, '2017-08-31 02:17:19'),
(76, 'TC_RemedyITSM_CreateChangeRequestWithLifecycleOfNoImpact', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithLifecycleOfNoImpact', '123.	Test the lifecycle of a No Impact Change Request', 0, 0, '2017-08-31 02:17:19'),
(77, 'TC_RemedyITSM_CreateChangeRequestWithLifecycleOfStandard', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithLifecycleOfStandard', '124.	Test the lifecycle of a No Standard Change Request', 0, 0, '2017-08-31 02:17:19'),
(78, 'TC_RemedyITSM_CreateChangeRequestWithLifecycleOfNormal', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithLifecycleOfNormal', '125.	Test the lifecycle of a No Normal Change Request', 0, 0, '2017-08-31 02:17:19'),
(79, 'TC_RemedyITSM_CreateChangeRequestWithLifecycleOfEmergency', 17, 8, 19, 1, 1, 'com.Demo.RemedyITSM.CreateChangeRequestWithLifecycleOfEmergency', '126.	Test the lifecycle of a No Emergency Change Request', 0, 0, '2017-08-31 02:17:19'),
(82, 'SeleniumTest', 27, 12, 0, 1, 1, 'Classname', 'Description for Test1', 1, 0, '2017-08-30 16:11:34'),
(84, 'Test1', 28, 18, 0, 1, 1, 'Test1', 'Test1', 1, 0, '2017-09-01 16:35:37'),
(86, 'Dummy', 29, 22, 0, 1, 1, 'Class_of_New_Test_case', 'dfadf', 1, 0, '2017-09-11 08:22:26'),
(87, 'TC_SmartIT_LoginAndLogout', 31, 24, 0, 1, 1, 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 'com.ServiceMaster.SmartIT.LoginAndLogoutTest', 1, 0, '2017-09-16 07:09:29'),
(99, 'TC_RemedyITSM_LoginAndLogoutTest', 17, 8, 0, 1, 1, 'com.Demo.RemedyITSM.LoginAndLogoutTest', 'Login to Application and logout', 0, 0, '2017-09-23 06:23:04');

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
  `ref_user_id` bigint(20) NOT NULL,
  `added_by_name` varchar(255) NOT NULL,
  `pass_status` int(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL COMMENT 'active-1,deactive-0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `company_id`, `fname`, `lname`, `email`, `password`, `designation`, `user_name`, `contact`, `address`, `profile_img`, `description`, `added_by`, `ref_user_id`, `added_by_name`, `pass_status`, `createdAt`, `status`) VALUES
(1, 3, 1, 'Aasif', 'Sayyad', 'aasif@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9922031316', 'pune', '', '', 1, 0, 'admin', 0, '2017-08-21 08:53:42', 0),
(4, 1, 1, 'Rohit ', 'Patil', 'rohit123@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '9874561230', 'pune', '', '', 1, 0, 'admin', 0, '2017-08-18 07:01:24', 0),
(5, 1, 1, 'Rohit', 'Sharma', 'sharma@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9856859855', 'pune', '', '', 1, 0, 'admin', 0, '2017-08-18 07:01:28', 0),
(6, 1, 1, 'Samir', 'Tripathy', 'samir@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9225733218', 'pune', '', '', 0, 0, 'company', 0, '2017-08-18 17:10:39', 0),
(7, 3, 2, 'Rohit', 'Patil', 'rohit@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9874568596', 'pune', '', '', 0, 0, 'company', 0, '2017-08-23 05:54:42', 0),
(8, 1, 6, 'Aasif', 'Sayyad', 'aasif321@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '9874562158', 'pune', '', '', 0, 0, 'company', 0, '2017-08-26 09:44:54', 0),
(9, 1, 8, 'Administrator', 'User', 'admin@demo.com', 'e084ded30d5bda2fcb585f30cf99ec0d57a84b0d', '', '', '1231231231', '', '', '', 0, 24, 'administrator', 0, '2017-09-22 10:40:31', 0),
(10, 3, 8, 'Tester', 'User', 'tester@demo.com', 'e084ded30d5bda2fcb585f30cf99ec0d57a84b0d', '', '', '1231231231', 'pune', '', '', 0, 0, 'company', 0, '2017-09-20 07:09:07', 0),
(11, 1, 9, 'Sachin', 'Tendulkar', 'sachinten@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9874587454', 'mumbai', '', '', 0, 0, 'company', 0, '2017-08-28 12:26:58', 0),
(12, 3, 9, 'Rahul', 'Dravid', 'rahuldr@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '8578945895', 'delhi', '', '', 0, 0, 'company', 0, '2017-08-28 12:27:48', 0),
(13, 1, 9, 'Rohit', 'Sharma', 'sharmarh@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9856254784', 'mumbai', '', '', 0, 11, 'administrator', 0, '2017-08-28 12:43:44', 0),
(14, 1, 10, 'Viren', 'Mehta', 'viren@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9562236589', 'pune', '', '', 0, 0, 'company', 0, '2017-08-29 05:25:01', 0),
(15, 3, 10, 'Sachin', 'Joshi', 'sachinj@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9855574788', 'pune', '', '', 0, 0, 'company', 0, '2017-08-29 05:25:44', 0),
(16, 1, 1, 'Savita', 'Kashid', 'savita@gmail.com', '147f930c19ad96edf4ac9749db10da81bfcfc0b8', '', '', '9665824527', '', '', '', 0, 0, 'company', 0, '2017-08-29 08:44:10', 0),
(18, 3, 1, 'Varsha', 'Nalawade', 'varsha@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '8696746987', '', '', '', 0, 16, 'administrator', 1, '2017-09-12 12:02:50', 0),
(19, 1, 8, 'Savita', 'Nalawade', 'nalawade.savita21@gmail.com', 'e084ded30d5bda2fcb585f30cf99ec0d57a84b0d', '', '', '9665824527', 'Manjari', '', '', 0, 0, 'company', 0, '2017-09-19 12:38:38', 0),
(20, 1, 8, 'Rahul', 'Patil', 'rahul4108@gmail.com', 'e084ded30d5bda2fcb585f30cf99ec0d57a84b0d', '', '', '9960319955', 'Lohagaon', '', '', 0, 20, 'administrator', 0, '2017-09-01 14:54:43', 0),
(22, 1, 12, 'Demo', 'Admin', 'admin@test.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', '', '', '1231231234', '', '', '', 0, 0, 'company', 0, '2017-08-30 16:04:36', 0),
(24, 1, 8, 'Aasif', 'Sayyad', 'aasif.techrnl@gmail.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '9852201000', 'pune', '', '', 0, 0, 'company', 1, '2017-09-20 08:46:29', 0),
(25, 1, 14, 'Admin', 'User', 'admin@testingcompany.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '', '', '', '', 0, 0, 'company', 0, '2017-08-31 11:50:07', 0),
(26, 3, 14, 'Tester', 'User', 'tester@testingcompany.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '', '', '', '', 0, 0, 'company', 0, '2017-08-31 11:51:36', 0),
(27, 1, 15, 'Jim', 'Bruce', 'user@calbro.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '', '', '', '', 0, 0, 'company', 0, '2017-08-31 15:58:07', 0),
(29, 3, 17, 'User', 'Fortuner', 'user@fortuner.com', '518e6c76caf51eb410caab3c21def1b4b3c07401', '', '', '', '', '', '', 0, 0, 'company', 0, '2017-09-01 10:49:02', 0),
(32, 1, 24, 'Rahul', 'Dravid', 'aasif.techrnl2@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '', 'pune', '', '', 0, 0, 'company', 1, '2017-09-20 08:46:16', 0),
(33, 3, 24, 'Sandip', 'Yadav', 'sandip@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '', 'pune', '', '', 0, 32, 'administrator', 0, '2017-09-16 09:08:08', 0),
(34, 1, 24, 'New', 'User', 'newuser2@gmail.com', '05363a5ee688775720b55ad84b46e2158407dcda', '', '', '', '', '', '', 0, 0, 'company', 0, '2017-09-16 12:49:19', 0),
(37, 3, 8, 'Nalawade', 'S', 'nalawade@gmail.com', '68fd46ec073851809cd5e0c3f80cd4f71afa7390', '', '', '', '', '', '', 0, 24, 'company', 0, '2017-09-20 10:30:21', 0);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `browser_id` (`browser_id`),
  ADD KEY `environment_id` (`environment_id`);

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
-- Indexes for table `logical_group`
--
ALTER TABLE `logical_group`
  ADD PRIMARY KEY (`logical_group_id`),
  ADD KEY `environment_id` (`environment_id`,`user_id`,`company_id`);

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
  MODIFY `application_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `browser`
--
ALTER TABLE `browser`
  MODIFY `browser_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `company_environment`
--
ALTER TABLE `company_environment`
  MODIFY `company_env_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `company_environ_url`
--
ALTER TABLE `company_environ_url`
  MODIFY `company_environ_url_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `email_log`
--
ALTER TABLE `email_log`
  MODIFY `email_log_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;
--
-- AUTO_INCREMENT for table `email_setting`
--
ALTER TABLE `email_setting`
  MODIFY `email_setting_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `environment`
--
ALTER TABLE `environment`
  MODIFY `environment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `logical_group`
--
ALTER TABLE `logical_group`
  MODIFY `logical_group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tce_testcases_results`
--
ALTER TABLE `tce_testcases_results`
  MODIFY `ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1529;
--
-- AUTO_INCREMENT for table `testcases`
--
ALTER TABLE `testcases`
  MODIFY `testcase_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `testcase_result`
--
ALTER TABLE `testcase_result`
  MODIFY `testcase_result_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
