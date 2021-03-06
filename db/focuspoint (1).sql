-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 03:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `focuspoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `parent_assessment_id` int(11) NOT NULL DEFAULT 0,
  `subtype_id` int(11) NOT NULL DEFAULT 0,
  `type_id` enum('Behavioral','Child') NOT NULL DEFAULT 'Behavioral',
  `consumer_id` int(11) NOT NULL,
  `assessment_type` int(11) NOT NULL DEFAULT 0,
  `assessment_no` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `communication` varchar(100) NOT NULL,
  `services` text DEFAULT NULL,
  `record_no` varchar(100) NOT NULL,
  `assessment_date` datetime DEFAULT NULL,
  `assignee` int(11) NOT NULL DEFAULT 0,
  `spent_time` varchar(50) DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `parent_assessment_id`, `subtype_id`, `type_id`, `consumer_id`, `assessment_type`, `assessment_no`, `location`, `communication`, `services`, `record_no`, `assessment_date`, `assignee`, `spent_time`, `due_date`, `created_date`, `updated_date`, `status`) VALUES
(15, 0, 0, 'Behavioral', 19, 1, 'ASMT-0000015', 'home', 'in-person', 'a:2:{i:0;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"18\";}i:1;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"22\";}}', 'RCNO_363926474', '2021-06-12 00:00:00', 0, '', NULL, '2021-07-08 18:30:00', '2021-06-28 18:30:00', 0),
(14, 0, 0, 'Behavioral', 19, 2, 'ASMT-0000014', 'home', 'in-person', 'a:2:{i:0;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"18\";}i:1;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"20\";}}', 'RCNO_363926474', '2021-06-12 00:00:00', 0, '0h 0m', NULL, '2021-07-14 07:00:00', NULL, 0),
(22, 0, 0, 'Behavioral', 19, 1, 'ASMT-0000016', 'community', 'collateral', 'a:0:{}', 'RCNO_446839930', '2021-07-17 00:00:00', 0, '', NULL, '2021-07-08 18:30:00', NULL, 0),
(23, 0, 0, 'Behavioral', 27, 1, 'ASMT-0000023', 'home', 'phone', 'a:2:{i:0;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"16\";}i:1;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"19\";}}', 'RCNO_577369202', '2021-07-17 00:00:00', 0, '', '2021-07-26 18:30:00', '2021-07-11 18:30:00', NULL, 0),
(25, 0, 0, 'Behavioral', 29, 2, 'ASMT-0000024', 'community', 'collateral', 'a:1:{i:0;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"15\";}}', 'RCNO_464314036', '2021-07-24 00:00:00', 0, '', NULL, '2021-07-13 18:30:00', NULL, 0),
(26, 0, 0, 'Behavioral', 32, 1, 'ASMT-0000026', 'community', 'collateral', 'a:1:{i:0;O:8:\"stdClass\":1:{s:7:\"service\";s:0:\"\";}}', 'RCNO_722134102', '2021-12-29 00:00:00', 0, '', NULL, '2021-07-15 18:30:00', NULL, 0),
(27, 26, 1, 'Behavioral', 32, 1, 'ASMT-0000027', 'community', 'collateral', 'a:1:{i:0;O:8:\"stdClass\":1:{s:7:\"service\";s:0:\"\";}}', 'RCNO_935084048', '2021-07-29 00:00:00', 0, '', NULL, '2021-07-15 18:30:00', NULL, 0),
(28, 26, 2, 'Behavioral', 32, 1, 'ASMT-0000028', 'community', 'collateral', 'a:2:{i:0;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"13\";}i:1;O:8:\"stdClass\":1:{s:7:\"service\";s:2:\"16\";}}', 'RCNO_780232465', '2021-07-30 00:00:00', 0, '', NULL, '2021-07-15 18:30:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_assessors`
--

CREATE TABLE `assessment_assessors` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `problem` varchar(100) DEFAULT NULL,
  `context` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_assessors`
--

INSERT INTO `assessment_assessors` (`id`, `assessment_id`, `problem`, `context`, `created_date`, `updated_date`) VALUES
(29, 25, 'Caregiver characteristics', '', '2021-07-13 18:30:00', NULL),
(26, 22, 'Caregiver characteristics', '', '2021-07-08 18:30:00', '2021-07-08 18:30:00'),
(27, 23, 'Caregiver characteristics', '', '2021-07-11 18:30:00', NULL),
(20, 15, 'Caregiver characteristics', 'c', '2021-06-30 18:30:00', '2021-07-08 18:30:00'),
(21, 15, 'Readiness for Change', 'r', '2021-06-30 18:30:00', '2021-07-08 18:30:00'),
(18, 14, 'Executive Functions', 'w', '2021-06-28 18:30:00', '2021-07-14 07:00:00'),
(30, 26, 'Caregiver characteristics', '', '2021-07-15 18:30:00', NULL),
(31, 27, 'Caregiver characteristics', '', '2021-07-15 18:30:00', NULL),
(32, 28, 'Caregiver characteristics', '', '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_assessor_desc`
--

CREATE TABLE `assessment_assessor_desc` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_assessor_desc`
--

INSERT INTO `assessment_assessor_desc` (`id`, `assessment_id`, `description`, `created_date`, `updated_date`) VALUES
(1, 19, NULL, '2021-07-08 18:30:00', NULL),
(2, 20, NULL, '2021-07-08 18:30:00', NULL),
(3, 21, NULL, '2021-07-08 18:30:00', NULL),
(4, 22, NULL, '2021-07-09 05:46:15', '2021-07-08 18:30:00'),
(5, 23, NULL, '2021-07-11 18:30:00', NULL),
(7, 25, NULL, '2021-07-13 18:30:00', NULL),
(8, 26, NULL, '2021-07-15 18:30:00', NULL),
(9, 27, NULL, '2021-07-15 18:30:00', NULL),
(10, 28, NULL, '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_assessor_notes`
--

CREATE TABLE `assessment_assessor_notes` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `context` varchar(100) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_behaviors`
--

CREATE TABLE `assessment_behaviors` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `context` varchar(100) DEFAULT NULL,
  `concern` varchar(100) DEFAULT NULL,
  `intervention` varchar(100) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_behaviors`
--

INSERT INTO `assessment_behaviors` (`id`, `assessment_id`, `author`, `context`, `concern`, `intervention`, `created_date`, `updated_date`) VALUES
(8, 15, 'sibling', 'Impact on family', 'i', 'inh', '2021-06-30 18:30:00', '2021-07-08 18:30:00'),
(9, 15, 'youth', 'Describe specifics of behavior', 'd', 'dddd', '2021-06-30 18:30:00', '2021-07-08 18:30:00'),
(6, 14, 'caregiver', 'Identify triggers', 'w', 'erer', '2021-06-28 18:30:00', '2021-07-14 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_behavior_desc`
--

CREATE TABLE `assessment_behavior_desc` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_behavior_desc`
--

INSERT INTO `assessment_behavior_desc` (`id`, `assessment_id`, `description`, `created_date`, `updated_date`) VALUES
(1, 19, NULL, '2021-07-08 18:30:00', NULL),
(2, 20, NULL, '2021-07-08 18:30:00', NULL),
(3, 21, NULL, '2021-07-08 18:30:00', NULL),
(4, 22, NULL, '2021-07-09 05:46:15', '2021-07-08 18:30:00'),
(5, 23, NULL, '2021-07-11 18:30:00', NULL),
(7, 25, NULL, '2021-07-13 18:30:00', NULL),
(8, 26, NULL, '2021-07-15 18:30:00', NULL),
(9, 27, NULL, '2021-07-15 18:30:00', NULL),
(10, 28, NULL, '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_documents`
--

CREATE TABLE `assessment_documents` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_documents`
--

INSERT INTO `assessment_documents` (`id`, `assessment_id`, `document`) VALUES
(8, 16, '60dd902111465_1625133089.jpg'),
(7, 16, '60dd902109764_1625133089.jpg'),
(6, 14, '60dabd569369e_1624948054.jpg'),
(5, 14, '60dabd5682142_1624948054.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_functions`
--

CREATE TABLE `assessment_functions` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `medical` varchar(20) DEFAULT NULL,
  `mental` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `leagal` varchar(100) DEFAULT NULL,
  `social` varchar(100) DEFAULT NULL,
  `selfharm` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_functions`
--

INSERT INTO `assessment_functions` (`id`, `assessment_id`, `medical`, `mental`, `education`, `leagal`, `social`, `selfharm`, `others`, `type`, `created_date`, `updated_date`) VALUES
(24, 23, '', '', '', '', '', '', '', 0, '2021-07-11 18:30:00', NULL),
(23, 22, '', '', '', '', '', '', '', 1, '2021-07-08 18:30:00', NULL),
(22, 22, '', '', '', '', '', '', '', 0, '2021-07-08 18:30:00', NULL),
(19, 15, 'd1', '1', '2', '3', '4', '5', '66', 1, '2021-07-08 18:30:00', '2021-06-28 18:30:00'),
(18, 15, 'd2', '72', '82', '92', '02', '12', '22', 1, '2021-07-08 18:30:00', '2021-06-28 18:30:00'),
(17, 14, 'd', '', '', '', '', '', '', 1, '2021-07-14 07:00:00', NULL),
(16, 14, 'a', '', '', '', '', '', '', 0, '2021-07-14 07:00:00', NULL),
(25, 23, '', '', '', '', '', '', '', 1, '2021-07-11 18:30:00', NULL),
(29, 25, '', '', '', '', '', '', '', 1, '2021-07-13 18:30:00', NULL),
(28, 25, '', '', '', '', '', '', '', 0, '2021-07-13 18:30:00', NULL),
(30, 26, '', '', '', '', '', '', '', 0, '2021-07-15 18:30:00', NULL),
(31, 26, '', '', '', '', '', '', '', 1, '2021-07-15 18:30:00', NULL),
(32, 27, '', '', '', '', '', '', '', 0, '2021-07-15 18:30:00', NULL),
(33, 27, '', '', '', '', '', '', '', 1, '2021-07-15 18:30:00', NULL),
(34, 28, '', '', '', '', '', '', '', 0, '2021-07-15 18:30:00', NULL),
(35, 28, '', '', '', '', '', '', '', 1, '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_persons`
--

CREATE TABLE `assessment_persons` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `salutation` varchar(20) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_persons`
--

INSERT INTO `assessment_persons` (`id`, `assessment_id`, `salutation`, `fname`, `lname`, `relation`, `mobile`, `created_date`, `updated_date`) VALUES
(16, 15, 'Miss', 't', 's', 15, '4343434', '2021-06-30 18:30:00', '2021-07-08 18:30:00'),
(17, 15, 'Dr', 'd', 'ddd', 19, '545555', '2021-06-30 18:30:00', '2021-07-08 18:30:00'),
(13, 14, 'Ms', 's', 'dd', 16, '131333', '2021-06-28 18:30:00', '2021-07-14 07:00:00'),
(20, 28, 'Mrs', 'ss', 'ss', 18, '2343243', '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_person_desc`
--

CREATE TABLE `assessment_person_desc` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_person_desc`
--

INSERT INTO `assessment_person_desc` (`id`, `assessment_id`, `description`, `created_date`, `updated_date`) VALUES
(1, 19, NULL, '2021-07-08 18:30:00', NULL),
(2, 20, NULL, '2021-07-08 18:30:00', NULL),
(3, 21, NULL, '2021-07-08 18:30:00', NULL),
(4, 22, 'sss', '2021-07-09 05:46:15', '2021-07-08 18:30:00'),
(5, 23, NULL, '2021-07-11 18:30:00', NULL),
(7, 25, NULL, '2021-07-13 18:30:00', NULL),
(8, 26, NULL, '2021-07-15 18:30:00', NULL),
(9, 27, NULL, '2021-07-15 18:30:00', NULL),
(10, 28, 'ss', '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_problems`
--

CREATE TABLE `assessment_problems` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `author` varchar(20) DEFAULT NULL,
  `strength` varchar(50) DEFAULT NULL,
  `score` varchar(20) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_problems`
--

INSERT INTO `assessment_problems` (`id`, `assessment_id`, `author`, `strength`, `score`, `created_date`, `updated_date`) VALUES
(16, 15, 'youth', 'y', '3', '2021-06-30 18:30:00', '2021-07-08 18:30:00'),
(15, 15, 'caregiver', 's', '3', '2021-06-28 18:30:00', '2021-07-08 18:30:00'),
(14, 14, 'caregiver', 's', '3', '2021-06-28 18:30:00', '2021-07-14 07:00:00'),
(20, 28, 'caregiver', 'ss', '12', '2021-07-15 18:30:00', NULL),
(21, 28, 'youth', 'sss', '3', '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_spend_times`
--

CREATE TABLE `assessment_spend_times` (
  `id` int(11) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  `assignee_id` int(11) NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_spend_times`
--

INSERT INTO `assessment_spend_times` (`id`, `assessment_id`, `assignee_id`, `start_date_time`, `end_date_time`, `comment`, `created_date`, `updated_date`) VALUES
(1, 15, 3, '2021-07-09 13:10:00', '2021-07-09 16:10:00', 'fdf', '2021-07-09 07:42:54', NULL),
(2, 15, 3, '2021-07-29 13:10:00', '2021-07-29 16:10:00', 'dfdf', '2021-07-09 07:44:19', '2021-07-09 07:47:23'),
(3, 15, 0, '2017-06-21 15:59:00', '2021-07-11 14:59:00', 'ssdsds', '2021-07-12 09:30:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_types`
--

CREATE TABLE `assessment_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_types`
--

INSERT INTO `assessment_types` (`id`, `title`) VALUES
(1, 'Initial Intake & Assessment'),
(2, 'CANS Assessment');

-- --------------------------------------------------------

--
-- Table structure for table `authorizations`
--

CREATE TABLE `authorizations` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `auth_no` varchar(100) NOT NULL,
  `intan` varchar(50) DEFAULT NULL,
  `insan` varchar(50) DEFAULT NULL,
  `services` int(11) NOT NULL DEFAULT 0,
  `unit_per_week` varchar(50) DEFAULT NULL,
  `unit_per_day` varchar(50) DEFAULT NULL,
  `total_approved_units` varchar(50) DEFAULT NULL,
  `total_approved_hours` varchar(50) DEFAULT NULL,
  `bill_without_unit` int(11) NOT NULL,
  `record_no` varchar(100) NOT NULL,
  `approve_date` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `assignee` int(11) NOT NULL,
  `spend_time` varchar(100) NOT NULL,
  `discharge_date` timestamp NULL DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorizations`
--

INSERT INTO `authorizations` (`id`, `consumer_id`, `auth_no`, `intan`, `insan`, `services`, `unit_per_week`, `unit_per_day`, `total_approved_units`, `total_approved_hours`, `bill_without_unit`, `record_no`, `approve_date`, `expiry_date`, `status`, `assignee`, `spend_time`, `discharge_date`, `created_date`, `updated_date`) VALUES
(1, 11, 'AUTH-000001', '1222222', '122', 0, '1', '2', '0.38', '4', 0, '1212', '2021-07-14 18:30:00', '2021-07-13 18:30:00', 2, 3, '9h 0m 0s ', '2021-07-28 18:30:00', '2021-07-15 18:30:00', NULL),
(2, 11, 'AUTH-000002', '2222222222', '122', 18, '1', '2', '0.38', '4', 0, '1212', '2021-07-05 18:30:00', '2021-07-13 18:30:00', 1, 3, '22', '2021-07-28 18:30:00', '2021-07-05 18:30:00', NULL),
(5, 19, 'AUTH-000003', 'INTAN-000001', '122', 19, '', '', '', '', 1, 'RCNO_970451356', '2021-07-12 18:30:00', '2021-07-19 18:30:00', 1, 4, '', '2021-07-12 18:30:00', '2021-07-08 18:30:00', NULL),
(6, 19, 'AUTH-000006', 'INTAN-000001', '122', 18, '1', '2', '3', 's', 0, 'RCNO_870653136', '2021-07-12 18:30:00', '2021-07-12 18:30:00', 2, 39, '', '2021-07-20 18:30:00', '2021-07-08 18:30:00', NULL),
(7, 19, 'AUTH-000007', 'INTAN-000001', '', 0, '', '', '', '', 1, 'RCNO_288610320', NULL, NULL, 0, 0, '', NULL, '2021-07-08 18:30:00', NULL),
(8, 12, 'AUTH-000008', 'INTAN-000001', '122', 16, '1', '2', '12', '3', 0, 'RCNO_925969667', '2021-07-12 18:30:00', '2021-07-13 18:30:00', 0, 0, '', '2021-07-09 18:30:00', '2021-07-11 18:30:00', NULL),
(9, 19, 'AUTH-000009', 'INTAN-000001', '', 18, '', '', '', '', 1, 'RCNO_989632898', NULL, NULL, 0, 0, '', NULL, '2021-07-12 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authorization_spend_times`
--

CREATE TABLE `authorization_spend_times` (
  `id` int(11) NOT NULL,
  `authorization_id` int(11) NOT NULL,
  `assignee_id` int(11) NOT NULL,
  `start_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorization_spend_times`
--

INSERT INTO `authorization_spend_times` (`id`, `authorization_id`, `assignee_id`, `start_date_time`, `end_date_time`, `comment`, `created_date`, `updated_date`) VALUES
(1, 1, 3, '2021-07-06 13:50:00', '2021-07-06 14:50:00', 'test', '2021-07-05 18:30:00', NULL),
(2, 1, 3, '2021-07-29 13:10:00', '2021-07-29 16:10:00', 'dfdf', '2021-07-06 23:49:33', '2021-07-09 07:46:58'),
(3, 1, 3, '2021-07-08 06:22:00', '2021-07-08 08:22:00', 'dssdsds', '2021-07-06 23:52:21', '2021-07-14 03:18:24'),
(4, 1, 3, '2021-07-07 06:23:00', '2021-07-07 05:28:00', NULL, '2021-07-06 23:54:57', NULL),
(5, 2, 41, '2021-07-07 09:39:00', '2021-07-30 09:39:00', 'aaa', '2021-07-07 04:09:28', NULL),
(6, 1, 3, '2021-07-09 10:02:00', '2021-07-09 12:07:00', 'ttt1', '2021-07-09 04:32:25', '2021-07-09 07:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `axis_levels`
--

CREATE TABLE `axis_levels` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `axis_levels`
--

INSERT INTO `axis_levels` (`id`, `title`) VALUES
(1, 'DSM-5 (1)'),
(2, 'DSM-5 (2)'),
(3, 'DSM-5 (3)'),
(4, 'Axis 4'),
(5, 'Axis V/GAF');

-- --------------------------------------------------------

--
-- Table structure for table `certfication_types`
--

CREATE TABLE `certfication_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certfication_types`
--

INSERT INTO `certfication_types` (`id`, `title`) VALUES
(1, 'Aid Skill Checklist'),
(2, 'Application / Resume'),
(4, 'Auto Insurance'),
(5, 'Basic Assurance/Share Values'),
(6, 'Blood Borne Pathogens'),
(7, 'Clients Rights'),
(8, 'Clinical Supervision Contract'),
(9, 'Clinician Licensure'),
(10, 'CNA License Verification'),
(11, 'Cognitive Behavioral Therapy'),
(12, 'Cognitive Behavioral Therapy - Supervisory Level'),
(13, 'Common Diagnosis'),
(14, 'Community Support'),
(15, 'Community Support Team'),
(16, 'Community Support Team Service Definition'),
(17, 'Community Support Team Training'),
(18, 'Confidentiality'),
(19, 'CPR'),
(20, 'CPSS State Certification'),
(21, 'Criminal Background Check'),
(22, 'Crisis Intervention Policy and Procedure'),
(23, 'Crisis Planning and Prevention'),
(24, 'Crisis Response'),
(25, 'Cultural Competency'),
(26, 'Day Treatment'),
(27, 'Day Treatment Service Definition'),
(28, 'Day Treatment Training'),
(29, 'Declaration Car Insusance'),
(30, 'Developing Well Written Goals'),
(31, 'Documentation'),
(32, 'Driver\'s License'),
(33, 'Emergencies, Health and Safety'),
(34, 'Employee Photo'),
(35, 'Essential Learning'),
(36, 'Essential Lifestyle Planning'),
(37, 'Ethic Incident Report Training'),
(38, 'Family Therapy'),
(39, 'First Aid'),
(40, 'Fundamental of Crisis Plan'),
(41, 'Mobile Crisis'),
(42, 'Handbook Acknowledgement'),
(43, 'Medication'),
(44, 'Healthcare Registry'),
(45, 'Medication Management'),
(46, 'HIPAA'),
(47, 'MD Licensure'),
(48, 'HIV certification workshop'),
(49, 'Leadership/Supervisory Trainings'),
(50, 'Incident and Death Response System'),
(51, 'Job Description'),
(52, 'Individualized Training Plan'),
(53, 'Introduction to Mental Health'),
(54, 'Infection Control in Human Services'),
(55, 'Intensive In-Home Training'),
(56, 'Influenza Vaccine'),
(57, 'Intensive In-Home Service Definition'),
(58, 'Inspector General'),
(59, 'Intensive In-Home'),
(60, 'Motivational Interviewing'),
(61, 'PCP Planning'),
(62, 'MVA Record'),
(63, 'Performance Evaluation'),
(64, 'NC Topps'),
(65, 'Person Centered Thinking'),
(66, 'NCI'),
(67, 'Personal Conduct'),
(68, 'Orientation'),
(69, 'Prevention of Aggressive Behavior Training'),
(70, 'OSHA'),
(71, 'Priviledging/Credentialing'),
(72, 'PCP Instructional Elements'),
(73, 'Professional Development Training'),
(74, 'Professional Liability Insurance'),
(75, 'Provider Orientation Manual'),
(76, 'PSS Certification'),
(77, 'RN License Verification'),
(78, 'Psychosocial Rehabilition Service Definition'),
(79, 'RN PSC Certificate'),
(80, 'Psychosocial Rehabilition Training'),
(81, 'Seizure Management'),
(82, 'QP supervison training'),
(83, 'Seizure management training'),
(84, 'Quality Management Improvement Training'),
(85, 'Sex Offender Registry'),
(86, 'Quality Management/Quality Improvement Plan'),
(87, 'Substance Abuse'),
(88, 'References'),
(89, 'Substance Abuse Training'),
(90, 'Residential Level I Training'),
(91, 'Suicide and Homicide Prevention'),
(92, 'Residential Level II Training'),
(93, 'Supervisor Plan'),
(94, 'Residential Level III Training'),
(95, 'Systems of Care'),
(96, 'Residential Service Definition'),
(97, 'Systems of Care: Child and Family Team'),
(98, 'Target Case Management Service Definition'),
(99, 'Target Case Management Training'),
(100, 'Target Pop'),
(101, 'TB'),
(102, 'Therapeutic Options Of Virginia'),
(103, 'Transcripts / Degrees'),
(104, 'Trauma Focused Therapy'),
(105, 'Vehicle Registration'),
(106, 'Welcome Letter'),
(107, 'Work Place Violence');

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

CREATE TABLE `consumers` (
  `id` int(11) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `identified_as` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `record_no` varchar(20) NOT NULL,
  `assignee` int(11) NOT NULL,
  `service_date` timestamp NULL DEFAULT NULL,
  `admission_date` timestamp NULL DEFAULT NULL,
  `discharge_date` timestamp NULL DEFAULT NULL,
  `teams` text NOT NULL,
  `language` int(11) NOT NULL,
  `race` int(11) NOT NULL,
  `marital_status` int(11) NOT NULL,
  `ethnicity` int(11) NOT NULL,
  `case_name` varchar(100) NOT NULL,
  `lead_person` int(11) NOT NULL,
  `nurse` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `in_crisis` int(11) NOT NULL,
  `npi` varchar(100) NOT NULL,
  `smoker_status` int(11) NOT NULL,
  `fall_risk` int(11) NOT NULL,
  `allergy` int(11) DEFAULT 0,
  `hearing_impaired` int(11) NOT NULL,
  `seeing_impaired` int(11) NOT NULL,
  `preferred_hospital` int(11) NOT NULL,
  `referral_source` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumers`
--

INSERT INTO `consumers` (`id`, `salutation`, `fname`, `lname`, `gender`, `identified_as`, `dob`, `email`, `status`, `record_no`, `assignee`, `service_date`, `admission_date`, `discharge_date`, `teams`, `language`, `race`, `marital_status`, `ethnicity`, `case_name`, `lead_person`, `nurse`, `doctor`, `in_crisis`, `npi`, `smoker_status`, `fall_risk`, `allergy`, `hearing_impaired`, `seeing_impaired`, `preferred_hospital`, `referral_source`, `created_date`) VALUES
(19, 'Mr', 'Sarvesh', 'Patel', 'Male', '1', '2021-06-11', 'sdpatel.2110@gmail.com', 2, '1212', 0, '2021-05-31 18:30:00', '2021-06-01 18:30:00', '2021-06-02 18:30:00', '', 1, 1, 1, 1, 'case 1', 27, NULL, NULL, 33, '13232331', 1, 0, 0, 0, 0, 1, 'sdsd', '2021-06-08 18:30:00'),
(11, 'Mr', 'james', 'folkne', '1', '1', '2021-02-09', 'test4@gmail.com', 2, '', 1, '2021-06-14 18:30:00', '2021-06-17 18:30:00', '2021-06-27 18:30:00', '', 1, 1, 1, 1, 'case 1', 3, NULL, NULL, 33, '1323233', 1, 0, 0, 0, 0, 1, 'sfsf', '2021-06-02 18:30:00'),
(12, 'Mr', 'tim', 'paine', '0', '1', '2021-06-06', 'r@s.com', 54, '111111', 0, '2021-05-31 18:30:00', '2021-06-02 18:30:00', '2021-06-10 18:30:00', '', 1, 1, 1, 1, 'case 1', 3, NULL, NULL, 33, '1323233', 1, 0, 0, 1, 0, 1, 'dess', '2021-06-02 18:30:00'),
(29, 'Mr', 'dc', 'patel', 'Male', '1', '07/08/2018', 'dc@patel.com', 0, 'RCNO_124113455', 0, '2021-07-05 18:30:00', '2021-07-05 18:30:00', '2021-07-20 18:30:00', '', 1, 1, 1, 1, 'case 12234', 39, NULL, NULL, 33, '1323233', 1, 0, 0, 1, 1, 2, 'dsds', '2021-07-13 18:30:00'),
(30, 'Mr', 'sp', 'patel', 'Male', '1', '07/15/2014', 'sp@patel.com', 0, 'RCNO_656090511', 0, '2021-07-04 18:30:00', '2021-07-10 18:30:00', '2021-07-29 18:30:00', '', 1, 1, 1, 1, 'csvdfd', 41, NULL, NULL, 33, '1323233', 1, 0, 0, 0, 1, 1, 'sdsd', '2021-07-13 18:30:00'),
(27, 'Mr', 'bb', 'bb', 'Male', '1', '06-02-2021', 'bb@bb.com', 54, 'RCNO_813269694', 1, '2021-06-09 18:30:00', '2021-06-29 18:30:00', '2021-06-27 18:30:00', '', 1, 1, 1, 1, 'case 2', 39, NULL, NULL, 33, '1323233', 1, 1, 0, 1, 0, 1, 'www', '2021-06-22 18:30:00'),
(31, 'Mr', 'cs1', 'p', 'Male', '1', '03/15/2021', 'cs1@p.com', 0, 'RCNO_648251221', 0, '2021-07-05 18:30:00', '2021-07-28 18:30:00', '2021-07-30 18:30:00', 'a:3:{i:0;O:8:\"stdClass\":1:{s:4:\"team\";s:1:\"3\";}i:1;O:8:\"stdClass\":1:{s:4:\"team\";s:2:\"35\";}i:2;O:8:\"stdClass\":1:{s:4:\"team\";s:2:\"37\";}}', 1, 3, 1, 1, 'Test1', 41, NULL, NULL, 12321, '2323', 1, 0, 0, 0, 0, 1, 'sdsd', '2021-07-14 18:30:00'),
(32, 'Mrs', 'hrd', 'patel', 'Male', '1', '04/19/2021', 'hrd@patel.com', 0, 'RCNO_526264147', 0, '2021-07-05 18:30:00', '2021-07-28 18:30:00', '2021-08-27 18:30:00', 'a:0:{}', 1, 1, 1, 3, 'Test2', 3, 'nurse 1', 'doctor 1', 123213234, '23234332', 1, 0, 0, 1, 1, 2, 'sdds', '2021-07-15 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_account_notations`
--

CREATE TABLE `consumer_account_notations` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `notation` varchar(100) NOT NULL,
  `notation_by` int(11) NOT NULL,
  `notation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_account_notations`
--

INSERT INTO `consumer_account_notations` (`id`, `consumer_id`, `type_id`, `notation`, `notation_by`, `notation_date`, `created_date`, `updated_date`) VALUES
(1, 19, 2, 'a', 1, '2021-06-28 18:30:00', '2021-06-07 18:30:00', '2021-06-08 18:30:00'),
(2, 27, 29, 'dsd', 1, '2021-06-29 18:30:00', '2021-06-22 18:30:00', '2021-06-22 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_addresses`
--

CREATE TABLE `consumer_addresses` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `state` int(11) DEFAULT 0,
  `zipcode` varchar(10) NOT NULL,
  `country` int(11) DEFAULT 0,
  `types` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `a_address1` text NOT NULL,
  `a_address2` text DEFAULT NULL,
  `a_city` varchar(20) NOT NULL,
  `a_state` int(11) DEFAULT 0,
  `a_zipcode` varchar(10) NOT NULL,
  `a_country` int(11) DEFAULT 0,
  `a_types` text DEFAULT NULL,
  `a_notes` text DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_addresses`
--

INSERT INTO `consumer_addresses` (`id`, `consumer_id`, `address1`, `address2`, `city`, `state`, `zipcode`, `country`, `types`, `notes`, `a_address1`, `a_address2`, `a_city`, `a_state`, `a_zipcode`, `a_country`, `a_types`, `a_notes`, `created_date`, `updated_date`) VALUES
(1, 12, 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 17, '382330', 14, 'a:2:{i:0;s:17:\"temporary address\";i:1;s:5:\"other\";}', 'qqq', 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 17, '382330', 14, 'a:2:{i:0;s:17:\"temporary address\";i:1;s:5:\"other\";}', 'qqq', NULL, NULL),
(15, 29, 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 0, '382330', 0, 'N;', '', '', '', '', 0, '', 0, 'N;', '', '2021-07-13 18:30:00', NULL),
(16, 30, 'Ahmedabad', 'Ahmedabad', 'Ahmedabad', 0, '382330', 0, 'N;', '', '', '', '', 0, '', 0, 'N;', '', '2021-07-13 18:30:00', NULL),
(13, 27, '', '', '', 0, '', 0, 'N;', '', '', '', '', 0, '', 0, 'N;', '', '2021-06-22 18:30:00', NULL),
(10, 22, '290,JIVANDAS NO GHARO,VAHELAL', '290,JIVANDAS NO GHARO,VAHELAL', 'VAHELAL', NULL, '38243', NULL, 'N;', '', '', '', '', NULL, '', NULL, 'N;', '', '2021-06-06 18:30:00', NULL),
(11, 23, '', '', '', NULL, '', NULL, 'N;', '', '', '', '', NULL, '', NULL, 'N;', '', '2021-06-06 18:30:00', NULL),
(9, 21, '290,JIVANDAS NO GHARO,VAHELAL', '290,JIVANDAS NO GHARO,VAHELAL', 'VAHELAL', NULL, '38243', NULL, 'N;', '', '', '', '', NULL, '', NULL, 'N;', '', '2021-06-06 18:30:00', NULL),
(7, 19, '290,JIVANDAS NO GHARO,VAHELAL', '290,JIVANDAS NO GHARO,VAHELAL', 'VAHELAL', 1, '382330', 16, 'a:2:{i:0;s:4:\"mail\";i:1;s:5:\"other\";}', 'sss', '290,JIVANDAS NO GHARO,VAHELAL', '290,JIVANDAS NO GHARO,VAHELAL', 'VAHELAL', 1, '38243', 16, 'a:2:{i:0;s:4:\"mail\";i:1;s:5:\"other\";}', 'sss', '2021-06-08 18:30:00', NULL),
(17, 31, '', '', '', 0, '', 0, 'N;', '', '', '', '', 0, '', 0, 'N;', '', '2021-07-14 18:30:00', NULL),
(18, 32, '', '', '', 0, '', 0, 'N;', '', '', '', '', 0, '', 0, 'N;', '', '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumer_allergies`
--

CREATE TABLE `consumer_allergies` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reaction` int(11) NOT NULL,
  `severity` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_allergies`
--

INSERT INTO `consumer_allergies` (`id`, `consumer_id`, `name`, `reaction`, `severity`, `created_date`, `updated_date`) VALUES
(1, 19, 's11', 1, 1, '2021-06-03 18:30:00', '2021-06-08 18:30:00'),
(2, 19, 'ddd', 1, 1, '2021-06-03 18:30:00', '2021-06-08 18:30:00'),
(3, 19, 'ddddd', 2, 1, '2021-06-07 18:30:00', '2021-06-08 18:30:00'),
(4, 27, 'dd1', 18, 1, '2021-06-22 18:30:00', '2021-06-22 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_diagnosis`
--

CREATE TABLE `consumer_diagnosis` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `d_primary` int(11) NOT NULL,
  `axis_level` int(11) NOT NULL,
  `d_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text NOT NULL,
  `icd9` text NOT NULL,
  `icd10` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_diagnosis`
--

INSERT INTO `consumer_diagnosis` (`id`, `consumer_id`, `d_primary`, `axis_level`, `d_date`, `description`, `icd9`, `icd10`, `status`, `created_date`, `updated_date`) VALUES
(3, 27, 15, 2, '2021-06-18 18:30:00', 'dd', '1', '3', 1, '2021-06-22 18:30:00', '2021-06-22 18:30:00'),
(2, 19, 1, 2, '2021-06-22 18:30:00', 'sdd', '1', '1', 1, '2021-06-03 18:30:00', '2021-06-08 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_medications`
--

CREATE TABLE `consumer_medications` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `side_effects` varchar(100) NOT NULL,
  `pharmacy` varchar(100) NOT NULL,
  `reaction` int(11) NOT NULL,
  `severity` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_medications`
--

INSERT INTO `consumer_medications` (`id`, `consumer_id`, `name`, `side_effects`, `pharmacy`, `reaction`, `severity`, `created_date`, `updated_date`) VALUES
(3, 27, 'Ramesh', '3', '3', 18, 1, '2021-06-22 18:30:00', '2021-06-22 18:30:00'),
(2, 19, 'Rinkesh', 'M', 'l1', 1, 1, '2021-06-03 18:30:00', '2021-06-08 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_note_types`
--

CREATE TABLE `consumer_note_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_note_types`
--

INSERT INTO `consumer_note_types` (`id`, `title`) VALUES
(1, 'Consumer Note Type');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_payers`
--

CREATE TABLE `consumer_payers` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `payer_id` int(11) NOT NULL,
  `policy_no` varchar(50) NOT NULL,
  `medical_id` varchar(50) NOT NULL,
  `co_payment` varchar(10) NOT NULL,
  `makeasprimary` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_payers`
--

INSERT INTO `consumer_payers` (`id`, `consumer_id`, `payer_id`, `policy_no`, `medical_id`, `co_payment`, `makeasprimary`, `created_date`, `updated_date`) VALUES
(6, 27, 17, '12112', 'medicaid', '11', 0, '2021-06-22 18:30:00', '2021-06-22 18:30:00'),
(5, 19, 1, '12112', 'private insurance', '1122', 0, '2021-06-07 18:30:00', '2021-06-08 18:30:00'),
(9, 29, 17, '12112', 'medicaid', '1122', 1, '2021-07-13 18:30:00', NULL),
(10, 29, 18, 'w545', 'medicaid', '1', 1, '2021-07-13 18:30:00', NULL),
(11, 30, 16, '12112', 'medicare', '1', 1, '2021-07-13 18:30:00', NULL),
(12, 30, 13, '4344', 'medicaid', '12', 0, '2021-07-13 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumer_persons`
--

CREATE TABLE `consumer_persons` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `salutation` varchar(20) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_persons`
--

INSERT INTO `consumer_persons` (`id`, `consumer_id`, `salutation`, `fname`, `lname`, `relation`, `phone`, `mobile`, `email`, `address1`, `address2`, `city`, `state_id`, `country_id`, `created_date`, `updated_date`) VALUES
(7, 19, 'Mr', 'dd1', 'dd', 1, '1211122434', '1211122434', 'test4@gmail.com', 'aaaa', 'sss', 'ZAK', 17, 16, '2021-06-07 18:30:00', '2021-06-08 18:30:00'),
(6, 19, 'Mr', 'dd1', 'dd', 1, '1211122434', '1211122434', 'test4@gmail.com', 'aaaa', 'sss', 'ZAK', 17, 16, '2021-06-07 18:30:00', '2021-06-08 18:30:00'),
(8, 27, 'Mr', 'Sarvesh', 'dd', 18, '+917600249039', '01212112112', 'dhavalpatel9039@gmail.com', 'q', 'qq', 'ZAK', 4030, 101, '2021-06-22 18:30:00', '2021-06-22 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_phones`
--

CREATE TABLE `consumer_phones` (
  `id` int(11) NOT NULL,
  `consumer_id` int(11) NOT NULL,
  `phonetype` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_phones`
--

INSERT INTO `consumer_phones` (`id`, `consumer_id`, `phonetype`, `phone`, `created_date`, `update_date`) VALUES
(1, 9, 'Mobile', '+917600249039', '2021-06-02 18:30:00', NULL),
(2, 9, 'Home', '+917600249039', '2021-06-02 18:30:00', NULL),
(3, 9, 'Main', '1241242547', '2021-06-02 18:30:00', NULL),
(4, 11, 'Home', '1234567890', '2021-06-02 18:30:00', NULL),
(5, 11, 'Mobile', '1212112112', '2021-06-02 18:30:00', NULL),
(6, 12, 'Home', '5588855551', '2021-06-02 18:30:00', NULL),
(7, 12, 'Mobile', '1234567890', '2021-06-02 18:30:00', NULL),
(29, 19, 'Mobile', '9909705576', '2021-06-08 18:30:00', NULL),
(28, 19, 'Home', '+19909705576', '2021-06-08 18:30:00', NULL),
(34, 30, 'Mobile', '8780960298', '2021-07-13 18:30:00', NULL),
(23, 23, 'Mobile', '+19909705576', '2021-06-06 18:30:00', NULL),
(22, 22, 'Mobile', '+19909705576', '2021-06-06 18:30:00', NULL),
(21, 21, 'Work', '+19909705576', '2021-06-06 18:30:00', NULL),
(33, 29, 'Mobile', '8780960298', '2021-07-13 18:30:00', NULL),
(31, 27, 'Home', '1241242547', '2021-06-22 18:30:00', NULL),
(35, 31, 'Work', '1211332332', '2021-07-14 18:30:00', NULL),
(37, 32, 'Home', '1211332332', '2021-07-15 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumer_status`
--

CREATE TABLE `consumer_status` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumer_status`
--

INSERT INTO `consumer_status` (`id`, `title`) VALUES
(1, 'Active - Approved'),
(2, 'Approved Awaiting Plan Signature'),
(3, 'Approved / Awaiting Auth'),
(4, 'Assessment - Completed'),
(5, 'Assessment - Scheduled'),
(6, 'Assessment - To Be Scheduled'),
(7, 'Authorization Voided'),
(8, 'Authorization Expired'),
(9, 'Authorized'),
(10, 'Awaiting Annual Assessment'),
(11, 'Awaiting ARP Dev'),
(12, 'Awaiting Authorization'),
(13, 'Awaiting IRP Dev'),
(14, 'Awaiting POC Development'),
(15, 'Awaiting Medical Records'),
(16, 'Billing Issue'),
(17, 'Consent Needed'),
(18, 'Deceased'),
(19, 'Declined Service'),
(20, 'Delete Client Record'),
(21, 'Discharge Notification Sent'),
(22, 'Discharged'),
(23, 'Hospitalized'),
(24, 'Engagement Letter Sent'),
(25, 'Inactive MA'),
(26, 'Incarcerated'),
(27, 'Initial CFT Scheduled'),
(28, 'In Process'),
(29, 'Intake - Completed'),
(30, 'Intake - Scheduled'),
(31, 'Intake - To Be Scheduled'),
(32, 'Interest Letter Sent'),
(33, 'Intake 2 Scheduled'),
(34, 'Intake 2 to be Scheduled'),
(35, 'MHP - Assigned'),
(36, 'Needs to be Assigned'),
(37, 'New Referral Received'),
(38, 'Newly Assigned DSC'),
(39, 'No Contact Notes'),
(40, 'No Mental Provider'),
(41, 'No MA'),
(42, 'Not Approved'),
(43, 'Not Active'),
(44, 'Not Eligible'),
(45, 'On Hold'),
(46, 'On Hold B'),
(47, 'On Hold Intake'),
(48, 'Pending'),
(49, 'Pending Discharge/Review'),
(50, 'Probono'),
(51, 'Reassigned DSC'),
(52, 'Resuming'),
(53, 'Submit Authorization'),
(54, 'Suspended'),
(55, 'To Be Discharged'),
(56, 'Transfer'),
(57, 'UnInsured'),
(58, 'Waiting List');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua And Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas The'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo The Democratic Republic Of The'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Cote D\'Ivoire (Ivory Coast)'),
(55, 'Croatia (Hrvatska)'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'East Timor'),
(64, 'Ecuador'),
(65, 'Egypt'),
(66, 'El Salvador'),
(67, 'Equatorial Guinea'),
(68, 'Eritrea'),
(69, 'Estonia'),
(70, 'Ethiopia'),
(71, 'Falkland Islands'),
(72, 'Faroe Islands'),
(73, 'Fiji Islands'),
(74, 'Finland'),
(75, 'France'),
(76, 'French Guiana'),
(77, 'French Polynesia'),
(78, 'French Southern Territories'),
(79, 'Gabon'),
(80, 'Gambia The'),
(81, 'Georgia'),
(82, 'Germany'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Greece'),
(86, 'Greenland'),
(87, 'Grenada'),
(88, 'Guadeloupe'),
(89, 'Guam'),
(90, 'Guatemala'),
(91, 'Guernsey and Alderney'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard Island and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong S.A.R.'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jersey'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea North'),
(116, 'Korea South'),
(117, 'Kuwait'),
(118, 'Kyrgyzstan'),
(119, 'Laos'),
(120, 'Latvia'),
(121, 'Lebanon'),
(122, 'Lesotho'),
(123, 'Liberia'),
(124, 'Libya'),
(125, 'Liechtenstein'),
(126, 'Lithuania'),
(127, 'Luxembourg'),
(128, 'Macau S.A.R.'),
(129, 'Macedonia'),
(130, 'Madagascar'),
(131, 'Malawi'),
(132, 'Malaysia'),
(133, 'Maldives'),
(134, 'Mali'),
(135, 'Malta'),
(136, 'Man (Isle of)'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia'),
(144, 'Moldova'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Bonaire, Sint Eustatius and Saba'),
(156, 'Netherlands The'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory Occupied'),
(170, 'Panama'),
(171, 'Papua new Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn Island'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russia'),
(183, 'Rwanda'),
(184, 'Saint Helena'),
(185, 'Saint Kitts And Nevis'),
(186, 'Saint Lucia'),
(187, 'Saint Pierre and Miquelon'),
(188, 'Saint Vincent And The Grenadines'),
(189, 'Saint-Barthelemy'),
(190, 'Saint-Martin (French part)'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia'),
(206, 'South Sudan'),
(207, 'Spain'),
(208, 'Sri Lanka'),
(209, 'Sudan'),
(210, 'Suriname'),
(211, 'Svalbard And Jan Mayen Islands'),
(212, 'Swaziland'),
(213, 'Sweden'),
(214, 'Switzerland'),
(215, 'Syria'),
(216, 'Taiwan'),
(217, 'Tajikistan'),
(218, 'Tanzania'),
(219, 'Thailand'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad And Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks And Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Vatican City State (Holy See)'),
(239, 'Venezuela'),
(240, 'Vietnam'),
(241, 'Virgin Islands (British)'),
(242, 'Virgin Islands (US)'),
(243, 'Wallis And Futuna Islands'),
(244, 'Western Sahara'),
(245, 'Yemen'),
(246, 'Zambia'),
(247, 'Zimbabwe'),
(248, 'Kosovo'),
(249, 'Cura??ao'),
(250, 'Sint Maarten (Dutch part)');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_codes`
--

CREATE TABLE `diagnosis_codes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_certifications`
--

CREATE TABLE `employee_certifications` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `certification_type_id` int(11) NOT NULL,
  `receive_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `certificate_file` varchar(100) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_certifications`
--

INSERT INTO `employee_certifications` (`id`, `employee_id`, `certification_type_id`, `receive_date`, `expiry_date`, `certificate_file`, `created_date`, `updated_date`) VALUES
(1, 13, 1, '2021-05-12', '2021-05-12', NULL, '2021-05-18 18:30:00', NULL),
(2, 13, 2, '2021-05-12', '2021-05-12', NULL, NULL, NULL),
(3, 20, 1, '2021-10-21', '2021-10-21', NULL, NULL, NULL),
(5, 3, 1, '2021-05-11', '2021-05-28', NULL, NULL, '2021-07-15 18:30:00'),
(8, 3, 1, '2021-05-12', '2021-05-31', NULL, '2021-05-20 18:30:00', '2021-07-15 18:30:00'),
(7, 3, 2, '2021-05-29', '2021-05-31', NULL, '2021-05-20 18:30:00', '2021-07-15 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_emergency_contact`
--

CREATE TABLE `employee_emergency_contact` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salutation` varchar(20) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_emergency_contact`
--

INSERT INTO `employee_emergency_contact` (`id`, `employee_id`, `salutation`, `fname`, `lname`, `relation`, `phone`, `mobile`, `email`, `created_date`, `updated_date`) VALUES
(3, 13, NULL, 'sam', 'p', 3, '14444', '2322', 'sav@p.com', NULL, NULL),
(4, 18, NULL, '', '', NULL, '', '', '', NULL, NULL),
(5, 19, NULL, '', '', NULL, '', '', '', NULL, NULL),
(6, 20, NULL, '', '', NULL, '', '', '', NULL, NULL),
(9, 3, NULL, 's1', 'p1', 1, '123456789', '244343434', 'sss@pp.com', NULL, '2021-07-15 18:30:00'),
(10, 3, NULL, 'p', 's', 2, '2434343434', '4446466', 'p@s.com', NULL, '2021-07-15 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_licence`
--

CREATE TABLE `employee_licence` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `licence_number` varchar(20) NOT NULL,
  `expiry_date` date NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_wages_hours`
--

CREATE TABLE `employee_wages_hours` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `payer_id` int(11) NOT NULL,
  `pay_rate` float NOT NULL,
  `pay_type` int(11) NOT NULL,
  `service_code` int(11) NOT NULL,
  `hour_per_week` varchar(10) NOT NULL,
  `contact_per_week` varchar(10) NOT NULL,
  `external_vendor_id` int(11) NOT NULL,
  `allow_late_note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ethnicities`
--

CREATE TABLE `ethnicities` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ethnicities`
--

INSERT INTO `ethnicities` (`id`, `title`) VALUES
(1, 'Hispanic or Latino'),
(3, 'Not Hispanic or Latino');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`) VALUES
(1, 'Danville'),
(3, 'Martinsville'),
(4, 'Richmond');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`) VALUES
(1, 'Loc');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`id`, `title`) VALUES
(1, 'Divorced'),
(2, 'Married'),
(3, 'Separated'),
(4, 'Single'),
(5, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notation_types`
--

CREATE TABLE `notation_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notation_types`
--

INSERT INTO `notation_types` (`id`, `title`) VALUES
(15, 'Compliancy'),
(12, 'Billing'),
(13, 'Communication'),
(16, 'Co-Pay Payment'),
(17, 'Discharge'),
(18, 'Eligibility'),
(19, 'General'),
(20, 'Intake'),
(21, 'Medical Records'),
(22, 'No Contact'),
(23, 'Nurse / Psychiatric'),
(24, 'Outreach'),
(25, 'Q & A'),
(26, 'Referral'),
(27, 'Scheduling'),
(28, 'Special'),
(29, 'Telephone'),
(30, 'Update');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payers`
--

CREATE TABLE `payers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payers`
--

INSERT INTO `payers` (`id`, `title`) VALUES
(1, 'Aetna'),
(2, 'Aetna Better Health'),
(3, 'AmeriGroup'),
(4, 'Anthem Blue Cross Blue Shield'),
(5, 'Anthem Healthkeepers'),
(6, 'Beacon Health Options'),
(7, 'Beacon Health Strategies'),
(8, 'Bright Health Plan'),
(9, 'Cenpatico'),
(10, 'Cigna BH'),
(11, 'Cigna NonBH'),
(12, 'Coventry'),
(13, 'COVID19 HRSA Uninsured'),
(14, 'Family Health Network'),
(15, 'Harmony Health Plan'),
(16, 'Healthnet Federal Services'),
(17, 'Humana Health Plan'),
(18, 'Magellan'),
(19, 'Magellan Complete'),
(20, 'MEDCost'),
(21, 'Meridian Health Plan'),
(22, 'Optima'),
(23, 'Private - Self Pay'),
(24, 'United Health Optum'),
(25, 'VA CCC Plus Cordinated'),
(26, 'VA Medicaid'),
(27, 'VA Premier Complete'),
(28, 'VA Premier Elite'),
(29, 'VA Premier Elite Plus'),
(30, 'VA Premier Medallion'),
(31, 'Wellcare');

-- --------------------------------------------------------

--
-- Table structure for table `pay_types`
--

CREATE TABLE `pay_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_types`
--

INSERT INTO `pay_types` (`id`, `title`) VALUES
(1, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `policy_types`
--

CREATE TABLE `policy_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `primaries`
--

CREATE TABLE `primaries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primaries`
--

INSERT INTO `primaries` (`id`, `title`) VALUES
(1, 'Clinical Intake - 90791'),
(2, 'Community Coaching - 97532'),
(3, 'Community Engagement - T2021 Tier 1'),
(4, 'Community Engagement - T2021 Tier 2'),
(5, 'Community Engagement - T2021 Tier 3'),
(6, 'Community Engagement - T2021 Tier 4'),
(7, 'Community Support'),
(8, 'Crisis Intervention - H0036'),
(9, 'Crisis Stabalization - H2019'),
(10, 'Day Support Services - 97537'),
(11, 'Day Support Services High Intensity - 97537:U1'),
(12, 'Family Therapy with patient - 90847'),
(13, 'Group Day Support - 91750 Tier 1'),
(14, 'Group Day Support - 91750 Tier 2'),
(15, 'Group Day Support - 91750 Tier 3'),
(16, 'Group Day Support - 91750 Tier 4'),
(17, 'Group Therapy - 90853'),
(18, 'Intensive In-Home - H2012'),
(19, 'Intensive Outpatient (IOP) 2 hr min - H0015'),
(20, 'Mental Health Assessment - H0031'),
(21, 'Mental Health Assessment - H0032'),
(22, 'Mental Health Case Management - H0023'),
(23, 'Mental Health Support - H0046'),
(24, 'Psychiatric Diagnostic Evaluation with Med - 90792'),
(25, 'Psychosocial Rehabilitation - H2017'),
(26, 'Therapy');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `title`) VALUES
(1, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `title`) VALUES
(1, 'QMHP-A'),
(2, 'QMHP-C'),
(3, 'QMHP-T'),
(4, 'LPC'),
(5, 'LPC-R'),
(6, 'LMHP-S'),
(7, 'LMHP'),
(8, 'LCAS'),
(9, 'LCAS-R');

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`id`, `title`) VALUES
(1, 'American Indian or Alaska Native'),
(3, 'Asian'),
(4, 'Black or African American'),
(5, 'Declined to specify'),
(6, 'Latin American or Hispanic'),
(7, 'Native Hawaiian or Other Pacific Islander'),
(8, 'Other'),
(9, 'UnDefined'),
(10, 'White or Caucasian');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `title`) VALUES
(1, 'Abdominal - Bloating/Gas'),
(3, 'Abdominal - Diarrhea'),
(4, 'Abdominal - Nausea'),
(5, 'Abdominal - Pain\\Cramping'),
(6, 'Abdominal - Vomiting'),
(7, 'Local - Conjunctivtitis'),
(8, 'Local - Cough'),
(9, 'Local - Runny Nose'),
(10, 'Skin - Facial Swelling'),
(11, 'Skin - Hives'),
(12, 'Skin - Itchiness'),
(13, 'Skin - Patchy-Swelling'),
(14, 'Skin - Rash'),
(15, 'Systemic - Bradycardia'),
(16, 'Systemic - Chest Pain'),
(17, 'Systemic - Difficulty Speaking'),
(18, 'Systemic - Difficulty Swallowing'),
(19, 'Systemic - Dizziness / Lightheadedness'),
(20, 'Systemic - Loss of Consciousness'),
(21, 'Systemic - Irregular Heartbeat'),
(22, 'Systemic - Respiratory Distress'),
(23, 'Systemic - Shortness of Breath'),
(24, 'Systemic - Tachycardia'),
(25, 'Systemic - Tongue Swelling'),
(26, 'Systemic - Wheezing');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `title`) VALUES
(1, 'Parent / Guardian'),
(2, 'Aunt'),
(3, 'Brother'),
(4, 'Brother-In-Law'),
(5, 'Cousin'),
(6, 'Daughter'),
(7, 'Father'),
(8, 'Father-In-Law'),
(9, 'Friend'),
(10, 'Grand Parent'),
(11, 'Mother-In-Law'),
(12, 'Spouse'),
(13, 'Sister'),
(14, 'Sister-In-Law'),
(15, 'Step Mother'),
(16, 'Step Father'),
(17, 'Step Sister'),
(18, 'Step Brother'),
(19, 'Uncle'),
(20, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0:disable, 1:enable'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `permissions`, `status`) VALUES
(1, 'Administrator', NULL, 1),
(2, 'Assistant Program Mgr', NULL, 1),
(3, 'Auditor', NULL, 1),
(4, 'Billing Administrator', NULL, 1),
(5, 'Clinical Lead', NULL, 1),
(6, 'Medical Director', NULL, 1),
(7, 'Medical Records', NULL, 1),
(8, 'Office', NULL, 1),
(9, 'Program Manager', NULL, 1),
(10, 'QA / QI', NULL, 1),
(11, 'QMHP', NULL, 1),
(12, 'QMHP-A', NULL, 1),
(13, 'QPP', NULL, 1),
(14, 'QPPMH', NULL, 1),
(15, 'Therapist', 'a:0:{}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `title`) VALUES
(1, 'bandages'),
(2, 'blood glucose monitoring supplies'),
(3, 'bluk compounding chemicals'),
(4, 'compounding powder'),
(5, 'infant formulas'),
(6, 'intra muscular'),
(7, 'intravenous dispersion'),
(8, 'intravenous emulsion'),
(9, 'intravenous powder for injection'),
(10, 'intravenous solution'),
(11, 'intravenous supension'),
(12, 'medical supplies'),
(13, 'needles syringes and injection supplies'),
(14, 'nutritional supplements'),
(15, 'oral capsule'),
(16, 'oral capsule extended release'),
(17, 'oral concentrate'),
(18, 'oral delayed release capsule'),
(19, 'oral emulsion'),
(20, 'oral liquid'),
(21, 'oral powder for reconstitution'),
(22, 'oral supension'),
(23, 'oral tablet'),
(24, 'oral tablet chewable'),
(25, 'oral tablet extended release'),
(26, 'respiratory therapy supplies'),
(27, 'subcutaneous'),
(28, 'sublingual'),
(29, 'topical cream'),
(30, 'topical gel'),
(31, 'topical stick'),
(32, 'transdermal'),
(33, 'wound care supplies');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`) VALUES
(1, '90785 : Interactive Complexity Add-On'),
(3, '90801 : zOLD Clinical Intake'),
(4, '90808 : zOLD Individual Therapy- 75-80min'),
(5, '90834 : Psychotherapy,38-52 minutes'),
(6, '90838 : Psychotherapy,53+ minutes AddOn'),
(7, '90846 : Family Therapy- 0-60min'),
(8, '97150:U1 : Group Day Support Tier 1'),
(9, '97150:U4 : Group Day Support Tier 4'),
(10, '97537:U1 : Day Support Services High Intensity'),
(11, '99203 : EM New Patient Phys Time 30min'),
(12, '99212 : EM Established Patient Phys Time 10min'),
(13, '99215 : EM Established Patient Phys Time 40min'),
(14, 'H0031 : Mental Health Assessment'),
(15, 'H0046 : Mental Health Support'),
(16, 'H2017 : Psychosocial Rehabilitation'),
(17, 'T2021:U1 : Community Engagement - T2021 Tier 1'),
(18, 'T2021:U4 : Community Engagement - T2021 Tier 4'),
(19, '90791 : Clinical Intake (2013)'),
(20, '90804 : zOLD Individual Therapy- 20-30min'),
(21, '90832 : Psychotherapy,16-37 minutes	'),
(22, '90836 : Psychotherapy,38-52 minutes AddOn	'),
(23, '90839 : Psychotherapy for Crisis, 30-74 minutes'),
(24, '90847 : Family Therapy with patient'),
(25, '97150:U2 : Group Day Support Tier 2'),
(26, '97532 : Community Coaching'),
(27, '99201 : EM New Patient Phys Time 10min'),
(28, '99204 : EM New Patient Phys Time 45min'),
(29, '99213 : EM EstablishedPatient Phys Time 15min'),
(30, 'H0015 : Intensive Outpatient (IOP) 2 hr min'),
(31, 'H0032 : Mental Health Assessment'),
(32, 'H2012 : Intensive In-Home'),
(33, 'H2019 : Crisis Stabalization'),
(34, 'T2021:U2 : Community Engagement - T2021 Tier 2'),
(35, '90792 : Psychiatric Diagnostic Evaluation with Med Services'),
(36, '90806 : zOLD Individual Therapy- 60min'),
(37, '90833 : Psychotherapy,16-37 minutes AddOn'),
(38, '90837 : Psychotherapy 53+ minutes'),
(39, '90840 : Psychotherapy,Crisis 30-74 minutes AddOn'),
(40, '90853 : Group Therapy'),
(41, '97150:U3 : Group Day Support Tier 3'),
(42, '97537 : Day Support Services'),
(43, '99202 : EM New Patient Phys Time 20min'),
(44, '99211 : EM Established Patient Phys Time 5min'),
(45, '99214 : EM Established Patient Phys Time 25min'),
(46, 'H0023 : Mental Health Case Management'),
(47, 'H0036 : Crisis Intervention'),
(48, 'H2015 : Community Support'),
(49, 'T1023 : Diagnostic Assessment'),
(50, 'T2021:U3 : Community Engagement - T2021 Tier 3');

-- --------------------------------------------------------

--
-- Table structure for table `smoker_status`
--

CREATE TABLE `smoker_status` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smoker_status`
--

INSERT INTO `smoker_status` (`id`, `title`) VALUES
(1, 'Current every day smoker (1)'),
(2, 'Current some day smoker (2)'),
(3, 'Former smoker (3)'),
(4, 'Never smoker (4)'),
(5, 'Smoker, current status unknown (5)'),
(6, 'Unknown If Ever Smoked (9)');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Southern Nations, Nationalities, and Peoples\' Region', 70),
(2, 'Somali Region', 70),
(3, 'Amhara Region', 70),
(4, 'Tigray Region', 70),
(5, 'Oromia Region', 70),
(6, 'Afar Region', 70),
(7, 'Harari Region', 70),
(8, 'Dire Dawa', 70),
(9, 'Benishangul-Gumuz Region', 70),
(10, 'Gambela Region', 70),
(11, 'Addis Ababa', 70),
(12, 'Petnjica Municipality', 147),
(13, 'Bar Municipality', 147),
(14, 'Danilovgrad Municipality', 147),
(15, 'Ro??aje Municipality', 147),
(16, 'Plu??ine Municipality', 147),
(17, 'Nik??i?? Municipality', 147),
(18, '??avnik Municipality', 147),
(19, 'Plav Municipality', 147),
(20, 'Pljevlja Municipality', 147),
(21, 'Berane Municipality', 147),
(22, 'Mojkovac Municipality', 147),
(23, 'Andrijevica Municipality', 147),
(24, 'Gusinje Municipality', 147),
(25, 'Bijelo Polje Municipality', 147),
(26, 'Kotor Municipality', 147),
(27, 'Podgorica Municipality', 147),
(28, 'Old Royal Capital Cetinje', 147),
(29, 'Tivat Municipality', 147),
(30, 'Budva Municipality', 147),
(31, 'Kola??in Municipality', 147),
(32, '??abljak Municipality', 147),
(33, 'Ulcinj Municipality', 147),
(34, 'Kunene Region', 152),
(35, 'Kavango West Region', 152),
(36, 'Kavango East Region', 152),
(37, 'Oshana Region', 152),
(38, 'Hardap Region', 152),
(39, 'Omusati Region', 152),
(40, 'Ohangwena Region', 152),
(41, 'Omaheke Region', 152),
(42, 'Oshikoto Region', 152),
(43, 'Erongo Region', 152),
(44, 'Khomas Region', 152),
(45, 'Karas Region', 152),
(46, 'Otjozondjupa Region', 152),
(47, 'Zambezi Region', 152),
(48, 'Ashanti Region', 83),
(49, 'Western Region', 83),
(50, 'Eastern Region', 83),
(51, 'Northern Region', 83),
(52, 'Central Region', 83),
(53, 'Brong-Ahafo Region', 83),
(54, 'Greater Accra Region', 83),
(55, 'Upper East Region', 83),
(56, 'Volta Region', 83),
(57, 'Upper West Region', 83),
(58, 'San Marino', 192),
(59, 'Acquaviva', 192),
(60, 'Chiesanuova', 192),
(61, 'Borgo Maggiore', 192),
(62, 'Faetano', 192),
(63, 'Montegiardino', 192),
(64, 'Domagnano', 192),
(65, 'Serravalle', 192),
(66, 'Fiorentino', 192),
(67, 'Tillab??ri Region', 160),
(68, 'Dosso Region', 160),
(69, 'Zinder Region', 160),
(70, 'Maradi Region', 160),
(71, 'Agadez Region', 160),
(72, 'Diffa Region', 160),
(73, 'Tahoua Region', 160),
(74, 'Mqabba', 135),
(75, 'San ??wann', 135),
(76, '??urrieq', 135),
(77, 'Luqa', 135),
(78, 'Marsaxlokk', 135),
(79, 'Qala', 135),
(80, '??ebbu?? Malta', 135),
(81, 'Xg??ajra', 135),
(82, 'Kirkop', 135),
(83, 'Rabat', 135),
(84, 'Floriana', 135),
(85, '??ebbu?? Gozo', 135),
(86, 'Swieqi', 135),
(87, 'Saint Lawrence', 135),
(88, 'Bir??ebbu??a', 135),
(89, 'Mdina', 135),
(90, 'Santa Venera', 135),
(91, 'Ker??em', 135),
(92, 'G??arb', 135),
(93, 'Iklin', 135),
(94, 'Santa Lu??ija', 135),
(95, 'Valletta', 135),
(96, 'Msida', 135),
(97, 'Birkirkara', 135),
(98, 'Si????iewi', 135),
(99, 'Kalkara', 135),
(100, 'St. Julian\'s', 135),
(101, 'Victoria', 135),
(102, 'Mellie??a', 135),
(103, 'Tarxien', 135),
(104, 'Sliema', 135),
(105, '??amrun', 135),
(106, 'G??asri', 135),
(107, 'Birgu', 135),
(108, 'Balzan', 135),
(109, 'M??arr', 135),
(110, 'Attard', 135),
(111, 'Qrendi', 135),
(112, 'Naxxar', 135),
(113, 'G??ira', 135),
(114, 'Xag??ra', 135),
(115, 'Paola', 135),
(116, 'Sannat', 135),
(117, 'Dingli', 135),
(118, 'Gudja', 135),
(119, 'Qormi', 135),
(120, 'G??arg??ur', 135),
(121, 'Xewkija', 135),
(122, 'Ta\' Xbiex', 135),
(123, '??abbar', 135),
(124, 'G??axaq', 135),
(125, 'Pembroke', 135),
(126, 'Lija', 135),
(127, 'Piet??', 135),
(128, 'Marsa', 135),
(129, 'Fgura', 135),
(130, 'G??ajnsielem', 135),
(131, 'Mtarfa', 135),
(132, 'Munxar', 135),
(133, 'Nadur', 135),
(134, 'Fontana', 135),
(135, '??ejtun', 135),
(136, 'Senglea', 135),
(137, 'Marsaskala', 135),
(138, 'Cospicua', 135),
(139, 'St. Paul\'s Bay', 135),
(140, 'Mosta', 135),
(141, 'Mangystau Region', 112),
(142, 'Kyzylorda Region', 112),
(143, 'Almaty Region', 112),
(144, 'North Kazakhstan Region', 112),
(145, 'Akmola Region', 112),
(146, 'Pavlodar Region', 112),
(147, 'Jambyl Region', 112),
(148, 'West Kazakhstan Province', 112),
(149, 'Turkestan Region', 112),
(150, 'Karaganda Region', 112),
(151, 'Aktobe Region', 112),
(152, 'Almaty', 112),
(153, 'Atyrau Region', 112),
(154, 'East Kazakhstan Region', 112),
(155, 'Baikonur', 112),
(156, 'Nur-Sultan', 112),
(157, 'Kostanay Region', 112),
(158, 'Kakamega County', 113),
(159, 'Kisii County', 113),
(160, 'Central Province', 113),
(161, 'Busia County', 113),
(162, 'North Eastern Province', 113),
(163, 'Embu County', 113),
(164, 'Laikipia County', 113),
(165, 'Nandi District', 113),
(166, 'Lamu County', 113),
(167, 'Kirinyaga County', 113),
(168, 'Bungoma County', 113),
(169, 'Uasin Gishu District', 113),
(170, 'Isiolo County', 113),
(171, 'Kisumu County', 113),
(172, 'Coast Province', 113),
(173, 'Kwale County', 113),
(174, 'Kilifi County', 113),
(175, 'Narok County', 113),
(176, 'Taita???Taveta County', 113),
(177, 'Western Province', 113),
(178, 'Muranga County', 113),
(179, 'Rift Valley Province', 113),
(180, 'Nyeri County', 113),
(181, 'Baringo County', 113),
(182, 'Wajir County', 113),
(183, 'Trans-Nzoia District', 113),
(184, 'Machakos County', 113),
(185, 'Tharaka Nithi County', 113),
(186, 'Siaya County', 113),
(187, 'Mandera County', 113),
(188, 'Makueni County', 113),
(189, 'Eastern Province', 113),
(190, 'Migori County', 113),
(191, 'Nairobi', 113),
(192, 'Nyandarua County', 113),
(193, 'Kericho County', 113),
(194, 'Marsabit County', 113),
(195, 'Homa Bay County', 113),
(196, 'Garissa County', 113),
(197, 'Kajiado County', 113),
(198, 'Meru County', 113),
(199, 'Kiambu County', 113),
(200, 'Mombasa County', 113),
(201, 'Elgeyo-Marakwet County', 113),
(202, 'Vihiga District', 113),
(203, 'Nakuru District', 113),
(204, 'Nyanza Province', 113),
(205, 'Tana River County', 113),
(206, 'Turkana County', 113),
(207, 'Samburu County', 113),
(208, 'West Pokot County', 113),
(209, 'Nyamira District', 113),
(210, 'Bomet County', 113),
(211, 'Kitui County', 113),
(212, 'Bi?? Province', 7),
(213, 'Huambo Province', 7),
(214, 'Zaire Province', 7),
(215, 'Cunene Province', 7),
(216, 'Cuanza Sul', 7),
(217, 'Cuanza Norte Province', 7),
(218, 'Benguela Province', 7),
(219, 'Moxico Province', 7),
(220, 'Lunda Sul Province', 7),
(221, 'Bengo Province', 7),
(222, 'Luanda Province', 7),
(223, 'Lunda Norte Province', 7),
(224, 'U??ge Province', 7),
(225, 'Hu??la Province', 7),
(226, 'Cuando Cubango Province', 7),
(227, 'Malanje Province', 7),
(228, 'Cabinda Province', 7),
(229, 'Gasa District', 26),
(230, 'Tsirang District', 26),
(231, 'Wangdue Phodrang District', 26),
(232, 'Haa District', 26),
(233, 'Zhemgang District', 26),
(234, 'Lhuntse District', 26),
(235, 'Punakha District', 26),
(236, 'Trashigang District', 26),
(237, 'Paro District', 26),
(238, 'Dagana District', 26),
(239, 'Chukha District', 26),
(240, 'Bumthang District', 26),
(241, 'Thimphu District', 26),
(242, 'Mongar District', 26),
(243, 'Samdrup Jongkhar District', 26),
(244, 'Pemagatshel District', 26),
(245, 'Trongsa District', 26),
(246, 'Samtse District', 26),
(247, 'Sarpang District', 26),
(248, 'Tombouctou Region', 134),
(249, 'S??gou Region', 134),
(250, 'Koulikoro Region', 134),
(251, 'M??naka Region', 134),
(252, 'Kayes Region', 134),
(253, 'Bamako', 134),
(254, 'Sikasso Region', 134),
(255, 'Mopti Region', 134),
(256, 'Taoud??nit Region', 134),
(257, 'Kidal Region', 134),
(258, 'Gao Region', 134),
(259, 'Southern Province', 183),
(260, 'Western Province', 183),
(261, 'Eastern Province', 183),
(262, 'Kigali district', 183),
(263, 'Northern Province', 183),
(264, 'Belize District', 23),
(265, 'Stann Creek District', 23),
(266, 'Corozal District', 23),
(267, 'Toledo District', 23),
(268, 'Orange Walk District', 23),
(269, 'Cayo District', 23),
(270, 'Pr??ncipe Province', 193),
(271, 'S??o Tom?? Province', 193),
(272, 'Havana Province', 56),
(273, 'Santiago de Cuba Province', 56),
(274, 'Sancti Sp??ritus Province', 56),
(275, 'Granma Province', 56),
(276, 'Mayabeque Province', 56),
(277, 'Pinar del R??o Province', 56),
(278, 'Isla de la Juventud', 56),
(279, 'Holgu??n Province', 56),
(280, 'Villa Clara Province', 56),
(281, 'Las Tunas Province', 56),
(282, 'Ciego de ??vila Province', 56),
(283, 'Artemisa Province', 56),
(284, 'Matanzas Province', 56),
(285, 'Guant??namo Province', 56),
(286, 'Camag??ey Province', 56),
(287, 'Cienfuegos Province', 56),
(288, 'Jigawa State', 161),
(289, 'Enugu State', 161),
(290, 'Kebbi State', 161),
(291, 'Benue State', 161),
(292, 'Sokoto State', 161),
(293, 'Federal Capital Territory', 161),
(294, 'Kaduna State', 161),
(295, 'Kwara State', 161),
(296, 'Oyo State', 161),
(297, 'Yobe State', 161),
(298, 'Kogi State', 161),
(299, 'Zamfara State', 161),
(300, 'Kano State', 161),
(301, 'Nasarawa State', 161),
(302, 'Plateau State', 161),
(303, 'Abia State', 161),
(304, 'Akwa Ibom State', 161),
(305, 'Bayelsa State', 161),
(306, 'Lagos', 161),
(307, 'Borno State', 161),
(308, 'Imo State', 161),
(309, 'Ekiti State', 161),
(310, 'Gombe State', 161),
(311, 'Ebonyi State', 161),
(312, 'Bauchi State', 161),
(313, 'Katsina State', 161),
(314, 'Cross River State', 161),
(315, 'Anambra State', 161),
(316, 'Delta State', 161),
(317, 'Niger State', 161),
(318, 'Edo State', 161),
(319, 'Taraba State', 161),
(320, 'Adamawa State', 161),
(321, 'Ondo State', 161),
(322, 'Osun State', 161),
(323, 'Ogun State', 161),
(324, 'Rukungiri District', 229),
(325, 'Kyankwanzi District', 229),
(326, 'Kabarole District', 229),
(327, 'Mpigi District', 229),
(328, 'Apac District', 229),
(329, 'Abim District', 229),
(330, 'Yumbe District', 229),
(331, 'Rukiga District', 229),
(332, 'Northern Region', 229),
(333, 'Serere District', 229),
(334, 'Kamuli District', 229),
(335, 'Amuru District', 229),
(336, 'Kaberamaido District', 229),
(337, 'Namutumba District', 229),
(338, 'Kibuku District', 229),
(339, 'Ibanda District', 229),
(340, 'Iganga District', 229),
(341, 'Dokolo District', 229),
(342, 'Lira District', 229),
(343, 'Bukedea District', 229),
(344, 'Alebtong District', 229),
(345, 'Koboko District', 229),
(346, 'Kiryandongo District', 229),
(347, 'Kiboga District', 229),
(348, 'Kitgum District', 229),
(349, 'Bududa District', 229),
(350, 'Mbale District', 229),
(351, 'Namayingo District', 229),
(352, 'Amuria District', 229),
(353, 'Amudat District', 229),
(354, 'Masindi District', 229),
(355, 'Kiruhura District', 229),
(356, 'Masaka District', 229),
(357, 'Pakwach District', 229),
(358, 'Rubanda District', 229),
(359, 'Tororo District', 229),
(360, 'Kamwenge District', 229),
(361, 'Adjumani District', 229),
(362, 'Wakiso District', 229),
(363, 'Moyo District', 229),
(364, 'Mityana District', 229),
(365, 'Butaleja District', 229),
(366, 'Gomba District', 229),
(367, 'Jinja District', 229),
(368, 'Kayunga District', 229),
(369, 'Kween District', 229),
(370, 'Western Region', 229),
(371, 'Mubende District', 229),
(372, 'Eastern Region', 229),
(373, 'Kanungu District', 229),
(374, 'Omoro District', 229),
(375, 'Bukomansimbi District', 229),
(376, 'Lyantonde District', 229),
(377, 'Buikwe District', 229),
(378, 'Nwoya District', 229),
(379, 'Zombo District', 229),
(380, 'Buyende District', 229),
(381, 'Bunyangabu District', 229),
(382, 'Kampala District', 229),
(383, 'Isingiro District', 229),
(384, 'Butambala District', 229),
(385, 'Bukwo District', 229),
(386, 'Bushenyi District', 229),
(387, 'Bugiri District', 229),
(388, 'Butebo District', 229),
(389, 'Buliisa District', 229),
(390, 'Otuke District', 229),
(391, 'Buhweju District', 229),
(392, 'Agago District', 229),
(393, 'Nakapiripirit District', 229),
(394, 'Kalungu District', 229),
(395, 'Moroto District', 229),
(396, 'Central Region', 229),
(397, 'Oyam District', 229),
(398, 'Kaliro District', 229),
(399, 'Kakumiro District', 229),
(400, 'Namisindwa District', 229),
(401, 'Kole District', 229),
(402, 'Kyenjojo District', 229),
(403, 'Kagadi District', 229),
(404, 'Ntungamo District', 229),
(405, 'Kalangala District', 229),
(406, 'Nakasongola District', 229),
(407, 'Sheema District', 229),
(408, 'Pader District', 229),
(409, 'Kisoro District', 229),
(410, 'Mukono District', 229),
(411, 'Lamwo District', 229),
(412, 'Pallisa District', 229),
(413, 'Gulu District', 229),
(414, 'Buvuma District', 229),
(415, 'Mbarara District', 229),
(416, 'Amolatar District', 229),
(417, 'Lwengo District', 229),
(418, 'Mayuge District', 229),
(419, 'Bundibugyo District', 229),
(420, 'Katakwi District', 229),
(421, 'Maracha District', 229),
(422, 'Ntoroko District', 229),
(423, 'Nakaseke District', 229),
(424, 'Ngora District', 229),
(425, 'Kumi District', 229),
(426, 'Kabale District', 229),
(427, 'Sembabule District', 229),
(428, 'Bulambuli District', 229),
(429, 'Sironko District', 229),
(430, 'Napak District', 229),
(431, 'Busia District', 229),
(432, 'Kapchorwa District', 229),
(433, 'Luwero District', 229),
(434, 'Kaabong District', 229),
(435, 'Mitooma District', 229),
(436, 'Kibaale District', 229),
(437, 'Kyegegwa District', 229),
(438, 'Manafwa District', 229),
(439, 'Rakai District', 229),
(440, 'Kasese District', 229),
(441, 'Budaka District', 229),
(442, 'Rubirizi District', 229),
(443, 'Kotido District', 229),
(444, 'Soroti District', 229),
(445, 'Luuka District', 229),
(446, 'Nebbi District', 229),
(447, 'Arua District', 229),
(448, 'Kyotera District', 229),
(449, 'Schellenberg', 125),
(450, 'Schaan', 125),
(451, 'Eschen', 125),
(452, 'Vaduz', 125),
(453, 'Ruggell', 125),
(454, 'Planken', 125),
(455, 'Mauren', 125),
(456, 'Triesenberg', 125),
(457, 'Gamprin', 125),
(458, 'Balzers', 125),
(459, 'Triesen', 125),
(460, 'Br??ko District', 28),
(461, 'Tuzla Canton', 28),
(462, 'Central Bosnia Canton', 28),
(463, 'Herzegovina-Neretva Canton', 28),
(464, 'Posavina Canton', 28),
(465, 'Una-Sana Canton', 28),
(466, 'Sarajevo Canton', 28),
(467, 'Federation of Bosnia and Herzegovina', 28),
(468, 'Zenica-Doboj Canton', 28),
(469, 'West Herzegovina Canton', 28),
(470, 'Republika Srpska', 28),
(471, 'Canton 10', 28),
(472, 'Bosnian Podrinje Canton', 28),
(473, 'Dakar', 195),
(474, 'Kolda', 195),
(475, 'Kaffrine', 195),
(476, 'Matam', 195),
(477, 'Saint-Louis', 195),
(478, 'Ziguinchor', 195),
(479, 'Fatick', 195),
(480, 'Diourbel Region', 195),
(481, 'K??dougou', 195),
(482, 'S??dhiou', 195),
(483, 'Kaolack', 195),
(484, 'Thi??s Region', 195),
(485, 'Louga', 195),
(486, 'Tambacounda Region', 195),
(487, 'Encamp', 6),
(488, 'Andorra la Vella', 6),
(489, 'Canillo', 6),
(490, 'Sant Juli?? de L??ria', 6),
(491, 'Ordino', 6),
(492, 'Escaldes-Engordany', 6),
(493, 'La Massana', 6),
(494, 'Mont Buxton', 197),
(495, 'La Digue', 197),
(496, 'Saint Louis', 197),
(497, 'Baie Lazare', 197),
(498, 'Mont Fleuri', 197),
(499, 'Les Mamelles', 197),
(500, 'Grand\'Anse Mah??', 197),
(501, 'Roche Caiman', 197),
(502, 'Anse Royale', 197),
(503, 'Glacis', 197),
(504, 'Grand\'Anse Praslin', 197),
(505, 'Bel Ombre', 197),
(506, 'Anse-aux-Pins', 197),
(507, 'Port Glaud', 197),
(508, 'Au Cap', 197),
(509, 'Takamaka', 197),
(510, 'Pointe La Rue', 197),
(511, 'Plaisance', 197),
(512, 'Beau Vallon', 197),
(513, 'Anse Boileau', 197),
(514, 'Baie Sainte Anne', 197),
(515, 'Bel Air', 197),
(516, 'La Rivi??re Anglaise', 197),
(517, 'Cascade', 197),
(518, 'Shaki', 16),
(519, 'Tartar District', 16),
(520, 'Shirvan', 16),
(521, 'Qazakh District', 16),
(522, 'Sadarak District', 16),
(523, 'Yevlakh District', 16),
(524, 'Khojali District', 16),
(525, 'Kalbajar District', 16),
(526, 'Qakh District', 16),
(527, 'Fizuli District', 16),
(528, 'Astara District', 16),
(529, 'Shamakhi District', 16),
(530, 'Neftchala District', 16),
(531, 'Goychay', 16),
(532, 'Bilasuvar District', 16),
(533, 'Tovuz District', 16),
(534, 'Ordubad District', 16),
(535, 'Sharur District', 16),
(536, 'Samukh District', 16),
(537, 'Khizi District', 16),
(538, 'Yevlakh', 16),
(539, 'Ujar District', 16),
(540, 'Absheron District', 16),
(541, 'Lachin District', 16),
(542, 'Qabala District', 16),
(543, 'Agstafa District', 16),
(544, 'Imishli District', 16),
(545, 'Salyan District', 16),
(546, 'Lerik District', 16),
(547, 'Agsu District', 16),
(548, 'Qubadli District', 16),
(549, 'Kurdamir District', 16),
(550, 'Yardymli District', 16),
(551, 'Goranboy District', 16),
(552, 'Baku', 16),
(553, 'Agdash District', 16),
(554, 'Beylagan District', 16),
(555, 'Masally District', 16),
(556, 'Oghuz District', 16),
(557, 'Saatly District', 16),
(558, 'Lankaran District', 16),
(559, 'Agdam District', 16),
(560, 'Balakan District', 16),
(561, 'Dashkasan District', 16),
(562, 'Nakhchivan Autonomous Republic', 16),
(563, 'Quba District', 16),
(564, 'Ismailli District', 16),
(565, 'Sabirabad District', 16),
(566, 'Zaqatala District', 16),
(567, 'Kangarli District', 16),
(568, 'Martuni', 16),
(569, 'Barda District', 16),
(570, 'Jabrayil District', 16),
(571, 'Hajigabul District', 16),
(572, 'Julfa District', 16),
(573, 'Gobustan District', 16),
(574, 'Goygol District', 16),
(575, 'Babek District', 16),
(576, 'Zardab District', 16),
(577, 'Aghjabadi District', 16),
(578, 'Jalilabad District', 16),
(579, 'Shahbuz District', 16),
(580, 'Mingachevir', 16),
(581, 'Zangilan District', 16),
(582, 'Sumqayit', 16),
(583, 'Shamkir District', 16),
(584, 'Siazan District', 16),
(585, 'Ganja', 16),
(586, 'Shaki District', 16),
(587, 'Lankaran', 16),
(588, 'Qusar District', 16),
(589, 'G??d??b??y', 16),
(590, 'Khachmaz District', 16),
(591, 'Shabran District', 16),
(592, 'Shusha District', 16),
(593, 'Skrapar District', 3),
(594, 'Kavaj?? District', 3),
(595, 'Lezh?? District', 3),
(596, 'Librazhd District', 3),
(597, 'Kor???? District', 3),
(598, 'Elbasan County', 3),
(599, 'Lushnj?? District', 3),
(600, 'Has District', 3),
(601, 'Kuk??s County', 3),
(602, 'Mal??si e Madhe District', 3),
(603, 'Berat County', 3),
(604, 'Gjirokast??r County', 3),
(605, 'Dib??r District', 3),
(606, 'Pogradec District', 3),
(607, 'Bulqiz?? District', 3),
(608, 'Devoll District', 3),
(609, 'Lezh?? County', 3),
(610, 'Dib??r County', 3),
(611, 'Shkod??r County', 3),
(612, 'Ku??ov?? District', 3),
(613, 'Vlor?? District', 3),
(614, 'Kruj?? District', 3),
(615, 'Tirana County', 3),
(616, 'Tepelen?? District', 3),
(617, 'Gramsh District', 3),
(618, 'Delvin?? District', 3),
(619, 'Peqin District', 3),
(620, 'Puk?? District', 3),
(621, 'Gjirokast??r District', 3),
(622, 'Kurbin District', 3),
(623, 'Kuk??s District', 3),
(624, 'Sarand?? District', 3),
(625, 'P??rmet District', 3),
(626, 'Shkod??r District', 3),
(627, 'Fier District', 3),
(628, 'Kolonj?? District', 3),
(629, 'Berat District', 3),
(630, 'Kor???? County', 3),
(631, 'Fier County', 3),
(632, 'Durr??s County', 3),
(633, 'Tirana District', 3),
(634, 'Vlor?? County', 3),
(635, 'Mat District', 3),
(636, 'Tropoj?? District', 3),
(637, 'Mallakast??r District', 3),
(638, 'Mirdit?? District', 3),
(639, 'Durr??s District', 3),
(640, 'Sveti Nikole Municipality', 129),
(641, 'Kratovo Municipality', 129),
(642, 'Zajas Municipality', 129),
(643, 'Staro Nagori??ane Municipality', 129),
(644, '??e??inovo-Oble??evo Municipality', 129),
(645, 'Debarca Municipality', 129),
(646, 'Probi??tip Municipality', 129),
(647, 'Krivoga??tani Municipality', 129),
(648, 'Gevgelija Municipality', 129),
(649, 'Bogdanci Municipality', 129),
(650, 'Vrane??tica Municipality', 129),
(651, 'Veles Municipality', 129),
(652, 'Bosilovo Municipality', 129),
(653, 'Mogila Municipality', 129),
(654, 'Tearce Municipality', 129),
(655, 'Demir Kapija Municipality', 129),
(656, 'Ara??inovo Municipality', 129),
(657, 'Drugovo Municipality', 129),
(658, 'Vasilevo Municipality', 129),
(659, 'Lipkovo Municipality', 129),
(660, 'Brvenica Municipality', 129),
(661, '??tip Municipality', 129),
(662, 'Vev??ani Municipality', 129),
(663, 'Tetovo Municipality', 129),
(664, 'Negotino Municipality', 129),
(665, 'Kon??e Municipality', 129),
(666, 'Prilep Municipality', 129),
(667, 'Saraj Municipality', 129),
(668, '??elino Municipality', 129),
(669, 'Mavrovo and Rostu??a Municipality', 129),
(670, 'Plasnica Municipality', 129),
(671, 'Valandovo Municipality', 129),
(672, 'Vinica Municipality', 129),
(673, 'Zrnovci Municipality', 129),
(674, 'Karbinci', 129),
(675, 'Dolneni Municipality', 129),
(676, '??a??ka Municipality', 129),
(677, 'Kriva Palanka Municipality', 129),
(678, 'Jegunovce Municipality', 129),
(679, 'Bitola Municipality', 129),
(680, '??uto Orizari Municipality', 129),
(681, 'Karpo?? Municipality', 129),
(682, 'Oslomej Municipality', 129),
(683, 'Kumanovo Municipality', 129),
(684, 'Greater Skopje', 129),
(685, 'Peh??evo Municipality', 129),
(686, 'Kisela Voda Municipality', 129),
(687, 'Demir Hisar Municipality', 129),
(688, 'Ki??evo Municipality', 129),
(689, 'Vrap??i??te Municipality', 129),
(690, 'Ilinden Municipality', 129),
(691, 'Rosoman Municipality', 129),
(692, 'Makedonski Brod Municipality', 129),
(693, 'Gostivar Municipality', 129),
(694, 'Butel Municipality', 129),
(695, 'Del??evo Municipality', 129),
(696, 'Novaci Municipality', 129),
(697, 'Dojran Municipality', 129),
(698, 'Petrovec Municipality', 129),
(699, 'Ohrid Municipality', 129),
(700, 'Struga Municipality', 129),
(701, 'Makedonska Kamenica Municipality', 129),
(702, 'Centar Municipality', 129),
(703, 'Aerodrom Municipality', 129),
(704, '??air Municipality', 129),
(705, 'Lozovo Municipality', 129),
(706, 'Zelenikovo Municipality', 129),
(707, 'Gazi Baba Municipality', 129),
(708, 'Gradsko Municipality', 129),
(709, 'Radovi?? Municipality', 129),
(710, 'Strumica Municipality', 129),
(711, 'Studeni??ani Municipality', 129),
(712, 'Resen Municipality', 129),
(713, 'Kavadarci Municipality', 129),
(714, 'Kru??evo Municipality', 129),
(715, '??u??er-Sandevo Municipality', 129),
(716, 'Berovo Municipality', 129),
(717, 'Rankovce Municipality', 129),
(718, 'Novo Selo Municipality', 129),
(719, 'Sopi??te Municipality', 129),
(720, 'Centar ??upa Municipality', 129),
(721, 'Bogovinje Municipality', 129),
(722, 'Gjor??e Petrov Municipality', 129),
(723, 'Ko??ani Municipality', 129),
(724, 'Po??ega-Slavonia County', 55),
(725, 'Split-Dalmatia County', 55),
(726, 'Me??imurje County', 55),
(727, 'Zadar County', 55),
(728, 'Dubrovnik-Neretva County', 55),
(729, 'Krapina-Zagorje County', 55),
(730, '??ibenik-Knin County', 55),
(731, 'Lika-Senj County', 55),
(732, 'Virovitica-Podravina County', 55),
(733, 'Sisak-Moslavina County', 55),
(734, 'Bjelovar-Bilogora County', 55),
(735, 'Primorje-Gorski Kotar County', 55),
(736, 'Zagreb County', 55),
(737, 'Brod-Posavina County', 55),
(738, 'Zagreb', 55),
(739, 'Vara??din County', 55),
(740, 'Osijek-Baranja County', 55),
(741, 'Vukovar-Syrmia County', 55),
(742, 'Koprivnica-Kri??evci County', 55),
(743, 'Istria County', 55),
(744, 'Kyrenia District', 57),
(745, 'Nicosia District', 57),
(746, 'Paphos District', 57),
(747, 'Larnaca District', 57),
(748, 'Limassol District', 57),
(749, 'Famagusta District', 57),
(750, 'Rangpur Division', 19),
(751, 'Cox\'s Bazar District', 19),
(752, 'Bandarban District', 19),
(753, 'Rajshahi Division', 19),
(754, 'Pabna District', 19),
(755, 'Sherpur District', 19),
(756, 'Bhola District', 19),
(757, 'Jessore District', 19),
(758, 'Mymensingh Division', 19),
(759, 'Rangpur District', 19),
(760, 'Dhaka Division', 19),
(761, 'Chapai Nawabganj District', 19),
(762, 'Faridpur District', 19),
(763, 'Comilla District', 19),
(764, 'Netrokona District', 19),
(765, 'Sylhet Division', 19),
(766, 'Mymensingh District', 19),
(767, 'Sylhet District', 19),
(768, 'Chandpur District', 19),
(769, 'Narail District', 19),
(770, 'Narayanganj District', 19),
(771, 'Dhaka District', 19),
(772, 'Nilphamari District', 19),
(773, 'Rajbari District', 19),
(774, 'Kushtia District', 19),
(775, 'Khulna Division', 19),
(776, 'Meherpur District', 19),
(777, 'Patuakhali District', 19),
(778, 'Jhalokati District', 19),
(779, 'Kishoreganj District', 19),
(780, 'Lalmonirhat District', 19),
(781, 'Sirajganj District', 19),
(782, 'Tangail District', 19),
(783, 'Dinajpur District', 19),
(784, 'Barguna District', 19),
(785, 'Chittagong District', 19),
(786, 'Khagrachari District', 19),
(787, 'Natore District', 19),
(788, 'Chuadanga District', 19),
(789, 'Jhenaidah District', 19),
(790, 'Munshiganj District', 19),
(791, 'Pirojpur District', 19),
(792, 'Gopalganj District', 19),
(793, 'Kurigram District', 19),
(794, 'Moulvibazar District', 19),
(795, 'Gaibandha District', 19),
(796, 'Bagerhat District', 19),
(797, 'Bogra District', 19),
(798, 'Gazipur District', 19),
(799, 'Satkhira District', 19),
(800, 'Panchagarh District', 19),
(801, 'Shariatpur District', 19),
(802, 'Bahadia', 19),
(803, 'Chittagong Division', 19),
(804, 'Thakurgaon District', 19),
(805, 'Habiganj District', 19),
(806, 'Joypurhat District', 19),
(807, 'Barisal Division', 19),
(808, 'Jamalpur District', 19),
(809, 'Rangamati Hill District', 19),
(810, 'Brahmanbaria District', 19),
(811, 'Khulna District', 19),
(812, 'Sunamganj District', 19),
(813, 'Rajshahi District', 19),
(814, 'Naogaon District', 19),
(815, 'Noakhali District', 19),
(816, 'Feni District', 19),
(817, 'Madaripur District', 19),
(818, 'Barisal District', 19),
(819, 'Lakshmipur District', 19),
(820, 'Okayama Prefecture', 109),
(821, 'Chiba Prefecture', 109),
(822, '??ita Prefecture', 109),
(823, 'Tokyo', 109),
(824, 'Nara Prefecture', 109),
(825, 'Shizuoka Prefecture', 109),
(826, 'Shimane Prefecture', 109),
(827, 'Aichi Prefecture', 109),
(828, 'Hiroshima Prefecture', 109),
(829, 'Akita Prefecture', 109),
(830, 'Ishikawa Prefecture', 109),
(831, 'Hy??go Prefecture', 109),
(832, 'Hokkaid?? Prefecture', 109),
(833, 'Mie Prefecture', 109),
(834, 'Ky??to Prefecture', 109),
(835, 'Yamaguchi Prefecture', 109),
(836, 'Tokushima Prefecture', 109),
(837, 'Yamagata Prefecture', 109),
(838, 'Toyama Prefecture', 109),
(839, 'Aomori Prefecture', 109),
(840, 'Kagoshima Prefecture', 109),
(841, 'Niigata Prefecture', 109),
(842, 'Kanagawa Prefecture', 109),
(843, 'Nagano Prefecture', 109),
(844, 'Wakayama Prefecture', 109),
(845, 'Shiga Prefecture', 109),
(846, 'Kumamoto Prefecture', 109),
(847, 'Fukushima Prefecture', 109),
(848, 'Fukui Prefecture', 109),
(849, 'Nagasaki Prefecture', 109),
(850, 'Tottori Prefecture', 109),
(851, 'Ibaraki Prefecture', 109),
(852, 'Yamanashi Prefecture', 109),
(853, 'Okinawa Prefecture', 109),
(854, 'Tochigi Prefecture', 109),
(855, 'Miyazaki Prefecture', 109),
(856, 'Iwate Prefecture', 109),
(857, 'Miyagi Prefecture', 109),
(858, 'Gifu Prefecture', 109),
(859, '??saka Prefecture', 109),
(860, 'Saitama Prefecture', 109),
(861, 'Fukuoka Prefecture', 109),
(862, 'Gunma Prefecture', 109),
(863, 'Saga Prefecture', 109),
(864, 'Kagawa Prefecture', 109),
(865, 'Ehime Prefecture', 109),
(866, 'Ontario', 39),
(867, 'Manitoba', 39),
(868, 'New Brunswick', 39),
(869, 'Yukon', 39),
(870, 'Saskatchewan', 39),
(871, 'Prince Edward Island', 39),
(872, 'Alberta', 39),
(873, 'Quebec', 39),
(874, 'Nova Scotia', 39),
(875, 'British Columbia', 39),
(876, 'Nunavut', 39),
(877, 'Newfoundland and Labrador', 39),
(878, 'Northwest Territories', 39),
(879, 'White Nile', 209),
(880, 'Red Sea', 209),
(881, 'Khartoum', 209),
(882, 'Sennar', 209),
(883, 'South Kordofan', 209),
(884, 'Kassala', 209),
(885, 'Al Jazirah', 209),
(886, 'Al Qadarif', 209),
(887, 'Blue Nile', 209),
(888, 'West Darfur', 209),
(889, 'West Kordofan', 209),
(890, 'North Darfur', 209),
(891, 'River Nile', 209),
(892, 'East Darfur', 209),
(893, 'North Kordofan', 209),
(894, 'South Darfur', 209),
(895, 'Northern', 209),
(896, 'Central Darfur', 209),
(897, 'Khelvachauri Municipality', 81),
(898, 'Senaki Municipality', 81),
(899, 'Tbilisi', 81),
(900, 'Adjara', 81),
(901, 'Autonomous Republic of Abkhazia', 81),
(902, 'Mtskheta-Mtianeti', 81),
(903, 'Shida Kartli', 81),
(904, 'Kvemo Kartli', 81),
(905, 'Imereti', 81),
(906, 'Samtskhe-Javakheti', 81),
(907, 'Guria', 81),
(908, 'Samegrelo-Zemo Svaneti', 81),
(909, 'Racha-Lechkhumi and Kvemo Svaneti', 81),
(910, 'Kakheti', 81),
(911, 'Northern Province', 198),
(912, 'Southern Province', 198),
(913, 'Western Area', 198),
(914, 'Eastern Province', 198),
(915, 'Hiran', 203),
(916, 'Mudug', 203),
(917, 'Bakool', 203),
(918, 'Galguduud', 203),
(919, 'Sanaag Region', 203),
(920, 'Nugal', 203),
(921, 'Lower Shebelle', 203),
(922, 'Middle Juba', 203),
(923, 'Middle Shebelle', 203),
(924, 'Lower Juba', 203),
(925, 'Awdal Region', 203),
(926, 'Bay', 203),
(927, 'Banaadir', 203),
(928, 'Gedo', 203),
(929, 'Togdheer Region', 203),
(930, 'Bari', 203),
(931, 'Northern Cape', 204),
(932, 'Free State', 204),
(933, 'Limpopo', 204),
(934, 'North West', 204),
(935, 'KwaZulu-Natal', 204),
(936, 'Gauteng', 204),
(937, 'Mpumalanga', 204),
(938, 'Eastern Cape', 204),
(939, 'Western Cape', 204),
(940, 'Chontales Department', 159),
(941, 'Managua Department', 159),
(942, 'Rivas Department', 159),
(943, 'Granada Department', 159),
(944, 'Le??n Department', 159),
(945, 'Estel?? Department', 159),
(946, 'Boaco Department', 159),
(947, 'Matagalpa Department', 159),
(948, 'Madriz Department', 159),
(949, 'R??o San Juan Department', 159),
(950, 'Carazo Department', 159),
(951, 'North Caribbean Coast Autonomous Region', 159),
(952, 'South Caribbean Coast Autonomous Region', 159),
(953, 'Masaya Department', 159),
(954, 'Chinandega Department', 159),
(955, 'Jinotega Department', 159),
(956, 'Karak Governorate', 111),
(957, 'Tafilah Governorate', 111),
(958, 'Madaba Governorate', 111),
(959, 'Aqaba Governorate', 111),
(960, 'Irbid Governorate', 111),
(961, 'Balqa Governorate', 111),
(962, 'Mafraq Governorate', 111),
(963, 'Ajloun Governorate', 111),
(964, 'Ma\'an Governorate', 111),
(965, 'Amman Governorate', 111),
(966, 'Jerash Governorate', 111),
(967, 'Zarqa Governorate', 111),
(968, 'Manzini District', 212),
(969, 'Hhohho District', 212),
(970, 'Lubombo District', 212),
(971, 'Shiselweni District', 212),
(972, 'Al Jahra Governorate', 117),
(973, 'Hawalli Governorate', 117),
(974, 'Mubarak Al-Kabeer Governorate', 117),
(975, 'Al Farwaniyah Governorate', 117),
(976, 'Capital Governorate', 117),
(977, 'Al Ahmadi Governorate', 117),
(978, 'Luang Prabang Province', 119),
(979, 'Vientiane Prefecture', 119),
(980, 'Vientiane Province', 119),
(981, 'Salavan Province', 119),
(982, 'Attapeu Province', 119),
(983, 'Xaisomboun Province', 119),
(984, 'Sekong Province', 119),
(985, 'Bolikhamsai Province', 119),
(986, 'Khammouane Province', 119),
(987, 'Phongsaly Province', 119),
(988, 'Oudomxay Province', 119),
(989, 'Houaphanh Province', 119),
(990, 'Savannakhet Province', 119),
(991, 'Bokeo Province', 119),
(992, 'Luang Namtha Province', 119),
(993, 'Sainyabuli Province', 119),
(994, 'Xaisomboun', 119),
(995, 'Xiangkhouang Province', 119),
(996, 'Champasak Province', 119),
(997, 'Talas Region', 118),
(998, 'Batken Region', 118),
(999, 'Naryn Region', 118),
(1000, 'Jalal-Abad Region', 118),
(1001, 'Bishkek', 118),
(1002, 'Issyk-Kul Region', 118),
(1003, 'Osh', 118),
(1004, 'Chuy Region', 118),
(1005, 'Osh Region', 118),
(1006, 'Tr??ndelag', 165),
(1007, 'Oslo', 165),
(1008, 'Vestfold', 165),
(1009, 'Oppland', 165),
(1010, 'S??r-Tr??ndelag', 165),
(1011, 'Buskerud', 165),
(1012, 'Nord-Tr??ndelag', 165),
(1013, 'Svalbard', 165),
(1014, 'Vest-Agder', 165),
(1015, 'Troms', 165),
(1016, 'Finnmark', 165),
(1017, 'Akershus', 165),
(1018, 'Sogn og Fjordane', 165),
(1019, 'Hedmark', 165),
(1020, 'M??re og Romsdal', 165),
(1021, 'Rogaland', 165),
(1022, '??stfold', 165),
(1023, 'Hordaland', 165),
(1024, 'Telemark', 165),
(1025, 'Nordland', 165),
(1026, 'Jan Mayen', 165),
(1027, 'H??dmez??v??s??rhely', 99),
(1028, '??rd', 99),
(1029, 'Szeged', 99),
(1030, 'Nagykanizsa', 99),
(1031, 'Csongr??d County', 99),
(1032, 'Debrecen', 99),
(1033, 'Sz??kesfeh??rv??r', 99),
(1034, 'Ny??regyh??za', 99),
(1035, 'Somogy County', 99),
(1036, 'B??k??scsaba', 99),
(1037, 'Eger', 99),
(1038, 'Tolna County', 99),
(1039, 'Vas County', 99),
(1040, 'Heves County', 99),
(1041, 'Gy??r', 99),
(1042, 'Gy??r-Moson-Sopron County', 99),
(1043, 'J??sz-Nagykun-Szolnok County', 99),
(1044, 'Fej??r County', 99),
(1045, 'Szabolcs-Szatm??r-Bereg County', 99),
(1046, 'Zala County', 99),
(1047, 'Szolnok', 99),
(1048, 'B??cs-Kiskun County', 99),
(1049, 'Duna??jv??ros', 99),
(1050, 'Zalaegerszeg', 99),
(1051, 'N??gr??d County', 99),
(1052, 'Szombathely', 99),
(1053, 'P??cs', 99),
(1054, 'Veszpr??m County', 99),
(1055, 'Baranya County', 99),
(1056, 'Kecskem??t', 99),
(1057, 'Sopron', 99),
(1058, 'Borsod-Aba??j-Zempl??n County', 99),
(1059, 'Pest County', 99),
(1060, 'B??k??s County', 99),
(1061, 'Szeksz??rd', 99),
(1062, 'Veszpr??m', 99),
(1063, 'Hajd??-Bihar County', 99),
(1064, 'Budapest', 99),
(1065, 'Miskolc', 99),
(1066, 'Tatab??nya', 99),
(1067, 'Kaposv??r', 99),
(1068, 'Salg??tarj??n', 99),
(1069, 'County Tipperary', 105),
(1070, 'County Sligo', 105),
(1071, 'County Donegal', 105),
(1072, 'County Dublin', 105),
(1073, 'Leinster', 105),
(1074, 'County Cork', 105),
(1075, 'County Monaghan', 105),
(1076, 'County Longford', 105),
(1077, 'County Kerry', 105),
(1078, 'County Offaly', 105),
(1079, 'County Galway', 105),
(1080, 'Munster', 105),
(1081, 'County Roscommon', 105),
(1082, 'County Kildare', 105),
(1083, 'County Louth', 105),
(1084, 'County Mayo', 105),
(1085, 'County Wicklow', 105),
(1086, 'Ulster', 105),
(1087, 'Connacht', 105),
(1088, 'County Cavan', 105),
(1089, 'County Waterford', 105),
(1090, 'County Kilkenny', 105),
(1091, 'County Clare', 105),
(1092, 'County Meath', 105),
(1093, 'County Wexford', 105),
(1094, 'County Limerick', 105),
(1095, 'County Carlow', 105),
(1096, 'County Laois', 105),
(1097, 'County Westmeath', 105),
(1098, 'Djelfa', 4),
(1099, 'El Oued', 4),
(1100, 'El Tarf', 4),
(1101, 'Oran', 4),
(1102, 'Naama', 4),
(1103, 'Annaba', 4),
(1104, 'Bou??ra', 4),
(1105, 'Chlef', 4),
(1106, 'Tiaret', 4),
(1107, 'Tlemcen', 4),
(1108, 'B??char', 4),
(1109, 'M??d??a', 4),
(1110, 'Skikda', 4),
(1111, 'Blida', 4),
(1112, 'Illizi', 4),
(1113, 'Jijel', 4),
(1114, 'Biskra', 4),
(1115, 'Tipasa', 4),
(1116, 'Bordj Bou Arr??ridj', 4),
(1117, 'T??bessa', 4),
(1118, 'Adrar', 4),
(1119, 'A??n Defla', 4),
(1120, 'Tindouf', 4),
(1121, 'Constantine', 4),
(1122, 'A??n T??mouchent', 4),
(1123, 'Sa??da', 4),
(1124, 'Mascara', 4),
(1125, 'Boumerd??s', 4),
(1126, 'Khenchela', 4),
(1127, 'Gharda??a', 4),
(1128, 'B??ja??a', 4),
(1129, 'El Bayadh', 4),
(1130, 'Relizane', 4),
(1131, 'Tizi Ouzou', 4),
(1132, 'Mila', 4),
(1133, 'Tissemsilt', 4),
(1134, 'M\'Sila', 4),
(1135, 'Tamanghasset', 4),
(1136, 'Oum El Bouaghi', 4),
(1137, 'Guelma', 4),
(1138, 'Laghouat', 4),
(1139, 'Ouargla', 4),
(1140, 'Mostaganem', 4),
(1141, 'S??tif', 4),
(1142, 'Batna', 4),
(1143, 'Souk Ahras', 4),
(1144, 'Algiers', 4),
(1146, 'Burgos Province', 207),
(1147, 'Salamanca Province', 207),
(1157, 'Palencia Province', 207),
(1158, 'Madrid', 207),
(1159, 'Melilla', 207),
(1160, 'Asturias', 207),
(1161, 'Zamora Province', 207),
(1167, 'Galicia', 207),
(1170, 'Cantabria', 207),
(1171, 'La Rioja', 207),
(1174, 'Balearic Islands', 207),
(1175, 'Valencia', 207),
(1176, 'Murcia', 207),
(1177, 'Aragon', 207),
(1183, 'Valladolid Province', 207),
(1184, 'Castile and Le??n', 207),
(1185, 'Canary Islands', 207),
(1189, '??vila', 207),
(1190, 'Extremadura', 207),
(1191, 'Basque Country', 207),
(1192, 'Segovia Province', 207),
(1193, 'Andalusia', 207),
(1200, 'L??on', 207),
(1203, 'Catalonia', 207),
(1204, 'Navarra', 207),
(1205, 'Castilla La Mancha', 207),
(1206, 'Ceuta', 207),
(1208, 'Soria Province', 207),
(1209, 'Guanacaste Province', 53),
(1210, 'Puntarenas Province', 53),
(1211, 'Provincia de Cartago', 53),
(1212, 'Heredia Province', 53),
(1213, 'Lim??n Province', 53),
(1214, 'San Jos?? Province', 53),
(1215, 'Alajuela Province', 53),
(1216, 'Brunei-Muara District', 33),
(1217, 'Belait District', 33),
(1218, 'Temburong District', 33),
(1219, 'Tutong District', 33),
(1220, 'Saint Philip', 20),
(1221, 'Saint Lucy', 20),
(1222, 'Saint Peter', 20),
(1223, 'Saint Joseph', 20),
(1224, 'Saint James', 20),
(1225, 'Saint Thomas', 20),
(1226, 'Saint George', 20),
(1227, 'Saint John', 20),
(1228, 'Christ Church', 20),
(1229, 'Saint Andrew', 20),
(1230, 'Saint Michael', 20),
(1231, 'Ta\'izz Governorate', 245),
(1232, 'Sana\'a', 245),
(1233, 'Ibb Governorate', 245),
(1234, 'Ma\'rib Governorate', 245),
(1235, 'Al Mahwit Governorate', 245),
(1236, 'Sana\'a Governorate', 245),
(1237, 'Abyan Governorate', 245),
(1238, 'Hadhramaut Governorate', 245),
(1239, 'Socotra Governorate', 245),
(1240, 'Al Bayda\' Governorate', 245),
(1241, 'Al Hudaydah Governorate', 245),
(1242, '\'Adan Governorate', 245),
(1243, 'Al Jawf Governorate', 245),
(1244, 'Hajjah Governorate', 245),
(1245, 'Lahij Governorate', 245),
(1246, 'Dhamar Governorate', 245),
(1247, 'Shabwah Governorate', 245),
(1248, 'Raymah Governorate', 245),
(1249, 'Saada Governorate', 245),
(1250, '\'Amran Governorate', 245),
(1251, 'Al Mahrah Governorate', 245),
(1252, 'Sangha-Mba??r??', 42),
(1253, 'Nana-Gr??bizi Economic Prefecture', 42),
(1254, 'Ouham Prefecture', 42),
(1255, 'Ombella-M\'Poko Prefecture', 42),
(1256, 'Lobaye Prefecture', 42),
(1257, 'Mamb??r??-Kad????', 42),
(1258, 'Haut-Mbomou Prefecture', 42),
(1259, 'Bamingui-Bangoran Prefecture', 42),
(1260, 'Nana-Mamb??r?? Prefecture', 42),
(1261, 'Vakaga Prefecture', 42),
(1262, 'Bangui', 42),
(1263, 'K??mo Prefecture', 42),
(1264, 'Basse-Kotto Prefecture', 42),
(1265, 'Ouaka Prefecture', 42),
(1266, 'Mbomou Prefecture', 42),
(1267, 'Ouham-Pend?? Prefecture', 42),
(1268, 'Haute-Kotto Prefecture', 42),
(1269, 'Romblon', 174),
(1270, 'Bukidnon', 174),
(1271, 'Rizal', 174),
(1272, 'Bohol', 174),
(1273, 'Quirino', 174),
(1274, 'Biliran', 174),
(1275, 'Quezon', 174),
(1276, 'Siquijor', 174),
(1277, 'Sarangani', 174),
(1278, 'Bulacan', 174),
(1279, 'Cagayan', 174),
(1280, 'South Cotabato', 174),
(1281, 'Sorsogon', 174),
(1282, 'Sultan Kudarat', 174),
(1283, 'Camarines Norte', 174),
(1284, 'Southern Leyte', 174),
(1285, 'Camiguin', 174),
(1286, 'Surigao del Norte', 174),
(1287, 'Camarines Sur', 174),
(1288, 'Sulu', 174),
(1289, 'Davao Oriental', 174),
(1290, 'Eastern Samar', 174),
(1291, 'Dinagat Islands', 174),
(1292, 'Capiz', 174),
(1293, 'Tawi-Tawi', 174),
(1294, 'Calabarzon', 174),
(1295, 'Tarlac', 174),
(1296, 'Surigao del Sur', 174),
(1297, 'Zambales', 174),
(1298, 'Ilocos Norte', 174),
(1299, 'Mimaropa', 174),
(1300, 'Ifugao', 174),
(1301, 'Catanduanes', 174),
(1302, 'Zamboanga del Norte', 174),
(1303, 'Guimaras', 174),
(1304, 'Bicol Region', 174),
(1305, 'Western Visayas', 174),
(1306, 'Cebu', 174),
(1307, 'Cavite', 174),
(1308, 'Central Visayas', 174),
(1309, 'Davao Occidental', 174),
(1310, 'Soccsksargen', 174),
(1311, 'Compostela Valley', 174),
(1312, 'Kalinga', 174),
(1313, 'Isabela', 174),
(1314, 'Caraga', 174),
(1315, 'Iloilo', 174),
(1316, 'Autonomous Region in Muslim Mindanao', 174),
(1317, 'La Union', 174),
(1318, 'Davao del Sur', 174),
(1319, 'Davao del Norte', 174),
(1320, 'Cotabato', 174),
(1321, 'Ilocos Sur', 174),
(1322, 'Eastern Visayas', 174),
(1323, 'Agusan del Norte', 174),
(1324, 'Abra', 174),
(1325, 'Zamboanga Peninsula', 174),
(1326, 'Agusan del Sur', 174),
(1327, 'Lanao del Norte', 174),
(1328, 'Laguna', 174),
(1329, 'Marinduque', 174),
(1330, 'Maguindanao', 174),
(1331, 'Aklan', 174),
(1332, 'Leyte', 174),
(1333, 'Lanao del Sur', 174),
(1334, 'Apayao', 174),
(1335, 'Cordillera Administrative Region', 174),
(1336, 'Antique', 174),
(1337, 'Albay', 174),
(1338, 'Masbate', 174),
(1339, 'Northern Mindanao', 174),
(1340, 'Davao Region', 174),
(1341, 'Aurora', 174),
(1342, 'Cagayan Valley', 174),
(1343, 'Misamis Occidental', 174),
(1344, 'Bataan', 174),
(1345, 'Central Luzon', 174),
(1346, 'Basilan', 174),
(1347, 'Metro Manila', 174),
(1348, 'Misamis Oriental', 174),
(1349, 'Northern Samar', 174),
(1350, 'Negros Oriental', 174),
(1351, 'Negros Occidental', 174),
(1352, 'Batanes', 174),
(1353, 'Mountain Province', 174),
(1354, 'Oriental Mindoro', 174),
(1355, 'Ilocos Region', 174),
(1356, 'Occidental Mindoro', 174),
(1357, 'Zamboanga del Sur', 174),
(1358, 'Nueva Vizcaya', 174),
(1359, 'Batangas', 174),
(1360, 'Nueva Ecija', 174),
(1361, 'Palawan', 174),
(1362, 'Zamboanga Sibugay', 174),
(1363, 'Benguet', 174),
(1364, 'Pangasinan', 174),
(1365, 'Pampanga', 174),
(1366, 'Northern District', 106),
(1367, 'Central District', 106),
(1368, 'Southern District', 106),
(1369, 'Haifa District', 106),
(1370, 'Jerusalem District', 106),
(1371, 'Tel Aviv District', 106),
(1372, 'Limburg', 22),
(1373, 'Flanders', 22),
(1374, 'Flemish Brabant', 22),
(1375, 'Hainaut', 22),
(1376, 'Brussels-Capital Region', 22),
(1377, 'East Flanders', 22),
(1378, 'Namur', 22),
(1379, 'Luxembourg', 22),
(1380, 'Wallonia', 22),
(1381, 'Antwerp', 22),
(1382, 'Walloon Brabant', 22),
(1383, 'West Flanders', 22),
(1384, 'Li??ge', 22),
(1385, 'Dari??n Province', 170),
(1386, 'Col??n Province', 170),
(1387, 'Cocl?? Province', 170),
(1388, 'Guna Yala', 170),
(1389, 'Herrera Province', 170),
(1390, 'Los Santos Province', 170),
(1391, 'Ng??be-Bugl?? Comarca', 170),
(1392, 'Veraguas Province', 170),
(1393, 'Bocas del Toro Province', 170),
(1394, 'Panam?? Oeste Province', 170),
(1395, 'Panam?? Province', 170),
(1396, 'Ember??-Wounaan Comarca', 170),
(1397, 'Chiriqu?? Province', 170),
(1398, 'Howland Island', 233),
(1399, 'Delaware', 233),
(1400, 'Alaska', 233),
(1401, 'Maryland', 233),
(1402, 'Baker Island', 233),
(1403, 'Kingman Reef', 233),
(1404, 'New Hampshire', 233),
(1405, 'Wake Island', 233),
(1406, 'Kansas', 233),
(1407, 'Texas', 233),
(1408, 'Nebraska', 233),
(1409, 'Vermont', 233),
(1410, 'Jarvis Island', 233),
(1411, 'Hawaii', 233),
(1412, 'Guam', 233),
(1413, 'United States Virgin Islands', 233),
(1414, 'Utah', 233),
(1415, 'Oregon', 233),
(1416, 'California', 233),
(1417, 'New Jersey', 233),
(1418, 'North Dakota', 233),
(1419, 'Kentucky', 233),
(1420, 'Minnesota', 233),
(1421, 'Oklahoma', 233),
(1422, 'Pennsylvania', 233),
(1423, 'New Mexico', 233),
(1424, 'American Samoa', 233),
(1425, 'Illinois', 233),
(1426, 'Michigan', 233),
(1427, 'Virginia', 233),
(1428, 'Johnston Atoll', 233),
(1429, 'West Virginia', 233),
(1430, 'Mississippi', 233),
(1431, 'Northern Mariana Islands', 233),
(1432, 'United States Minor Outlying Islands', 233),
(1433, 'Massachusetts', 233),
(1434, 'Arizona', 233),
(1435, 'Connecticut', 233),
(1436, 'Florida', 233),
(1437, 'District of Columbia', 233),
(1438, 'Midway Atoll', 233),
(1439, 'Navassa Island', 233),
(1440, 'Indiana', 233),
(1441, 'Wisconsin', 233),
(1442, 'Wyoming', 233),
(1443, 'South Carolina', 233),
(1444, 'Arkansas', 233),
(1445, 'South Dakota', 233),
(1446, 'Montana', 233),
(1447, 'North Carolina', 233),
(1448, 'Palmyra Atoll', 233),
(1449, 'Puerto Rico', 233),
(1450, 'Colorado', 233),
(1451, 'Missouri', 233),
(1452, 'New York', 233),
(1453, 'Maine', 233),
(1454, 'Tennessee', 233),
(1455, 'Georgia', 233),
(1456, 'Alabama', 233),
(1457, 'Louisiana', 233),
(1458, 'Nevada', 233),
(1459, 'Iowa', 233),
(1460, 'Idaho', 233),
(1461, 'Rhode Island', 233),
(1462, 'Washington', 233),
(1463, 'Shinyanga Region', 218),
(1464, 'Simiyu Region', 218),
(1465, 'Kagera Region', 218),
(1466, 'Dodoma Region', 218),
(1467, 'Kilimanjaro Region', 218),
(1468, 'Mara Region', 218),
(1469, 'Tabora Region', 218),
(1470, 'Morogoro Region', 218),
(1471, 'Zanzibar Central/South Region', 218),
(1472, 'South Pemba Region', 218),
(1473, 'Zanzibar North Region', 218),
(1474, 'Singida Region', 218),
(1475, 'Zanzibar Urban/West Region', 218),
(1476, 'Mtwara Region', 218),
(1477, 'Rukwa Region', 218),
(1478, 'Kigoma Region', 218),
(1479, 'Mwanza Region', 218),
(1480, 'Njombe Region', 218),
(1481, 'Geita Region', 218),
(1482, 'Katavi Region', 218),
(1483, 'Lindi Region', 218),
(1484, 'Manyara Region', 218),
(1485, 'Pwani Region', 218),
(1486, 'Ruvuma Region', 218),
(1487, 'Tanga Region', 218),
(1488, 'North Pemba Region', 218),
(1489, 'Iringa Region', 218),
(1490, 'Dar es Salaam Region', 218),
(1491, 'Arusha Region', 218),
(1492, 'Eastern Finland Province', 74),
(1493, 'Tavastia Proper', 74),
(1494, 'Central Ostrobothnia', 74),
(1495, 'Southern Savonia', 74),
(1496, 'Kainuu', 74),
(1497, 'South Karelia', 74),
(1498, 'Southern Ostrobothnia', 74),
(1499, 'Oulu Province', 74),
(1500, 'Lapland', 74),
(1501, 'Satakunta', 74),
(1502, 'P??ij??nne Tavastia', 74),
(1503, 'Northern Savonia', 74),
(1504, 'North Karelia', 74),
(1505, 'Northern Ostrobothnia', 74),
(1506, 'Pirkanmaa', 74),
(1507, 'Finland Proper', 74),
(1508, 'Ostrobothnia', 74),
(1509, '??land Islands', 74),
(1510, 'Uusimaa', 74),
(1511, 'Central Finland', 74),
(1512, 'Kymenlaakso', 74),
(1513, 'Canton of Diekirch', 127),
(1514, 'Luxembourg District', 127),
(1515, 'Canton of Echternach', 127),
(1516, 'Canton of Redange', 127),
(1517, 'Canton of Esch-sur-Alzette', 127),
(1518, 'Canton of Capellen', 127),
(1519, 'Canton of Remich', 127),
(1520, 'Grevenmacher District', 127),
(1521, 'Canton of Clervaux', 127),
(1522, 'Canton of Mersch', 127),
(1523, 'Canton of Vianden', 127),
(1524, 'Diekirch District', 127),
(1525, 'Canton of Grevenmacher', 127),
(1526, 'Canton of Wiltz', 127),
(1527, 'Canton of Luxembourg', 127),
(1528, 'Region Zealand', 59),
(1529, 'Region of Southern Denmark', 59),
(1530, 'Capital Region of Denmark', 59),
(1531, 'Central Denmark Region', 59),
(1532, 'North Denmark Region', 59),
(1533, 'G??vleborg County', 213),
(1534, 'Dalarna County', 213),
(1535, 'V??rmland County', 213),
(1536, '??sterg??tland County', 213),
(1537, 'Blekinge', 213),
(1538, 'Norrbotten County', 213),
(1539, '??rebro County', 213),
(1540, 'S??dermanland County', 213),
(1541, 'Sk??ne County', 213),
(1542, 'Kronoberg County', 213),
(1543, 'V??sterbotten County', 213),
(1544, 'Kalmar County', 213),
(1545, 'Uppsala County', 213),
(1546, 'Gotland County', 213),
(1547, 'V??stra G??taland County', 213),
(1548, 'Halland County', 213),
(1549, 'V??stmanland County', 213),
(1550, 'J??nk??ping County', 213),
(1551, 'Stockholm County', 213),
(1552, 'V??sternorrland County', 213),
(1553, 'Plung?? District Municipality', 126),
(1554, '??iauliai District Municipality', 126),
(1555, 'Jurbarkas District Municipality', 126),
(1556, 'Kaunas County', 126),
(1557, 'Ma??eikiai District Municipality', 126),
(1558, 'Panev????ys County', 126),
(1559, 'Elektr??nai municipality', 126),
(1560, '??ven??ionys District Municipality', 126),
(1561, 'Akmen?? District Municipality', 126),
(1562, 'Ignalina District Municipality', 126),
(1563, 'Neringa Municipality', 126),
(1564, 'Visaginas Municipality', 126),
(1565, 'Kaunas District Municipality', 126),
(1566, 'Bir??ai District Municipality', 126),
(1567, 'Jonava District Municipality', 126),
(1568, 'Radvili??kis District Municipality', 126),
(1569, 'Tel??iai County', 126),
(1570, 'Marijampol?? County', 126),
(1571, 'Kretinga District Municipality', 126),
(1572, 'Taurag?? District Municipality', 126),
(1573, 'Taurag?? County', 126),
(1574, 'Alytus County', 126),
(1575, 'Kazl?? R??da municipality', 126),
(1576, '??akiai District Municipality', 126),
(1577, '??al??ininkai District Municipality', 126),
(1578, 'Prienai District Municipality', 126),
(1579, 'Druskininkai municipality', 126),
(1580, 'Kaunas City Municipality', 126),
(1581, 'Joni??kis District Municipality', 126),
(1582, 'Mol??tai District Municipality', 126),
(1583, 'Kai??iadorys District Municipality', 126),
(1584, 'K??dainiai District Municipality', 126),
(1585, 'Kupi??kis District Municipality', 126),
(1586, '??iauliai County', 126),
(1587, 'Raseiniai District Municipality', 126),
(1588, 'Palanga City Municipality', 126),
(1589, 'Panev????ys City Municipality', 126),
(1590, 'Rietavas municipality', 126),
(1591, 'Kalvarija municipality', 126),
(1592, 'Vilnius District Municipality', 126),
(1593, 'Trakai District Municipality', 126),
(1594, '??irvintos District Municipality', 126),
(1595, 'Pakruojis District Municipality', 126),
(1596, 'Ukmerg?? District Municipality', 126),
(1597, 'Klaipeda City Municipality', 126),
(1598, 'Utena District Municipality', 126),
(1599, 'Alytus District Municipality', 126),
(1600, 'Klaip??da County', 126),
(1601, 'Vilnius County', 126),
(1602, 'Var??na District Municipality', 126),
(1603, 'Bir??tonas Municipality', 126),
(1604, 'Klaip??da District Municipality', 126),
(1605, 'Alytus City Municipality', 126),
(1606, 'Vilnius City Municipality', 126),
(1607, '??ilut?? District Municipality', 126),
(1608, 'Tel??iai District Municipality', 126),
(1609, '??iauliai City Municipality', 126),
(1610, 'Marijampol?? Municipality', 126),
(1611, 'Lazdijai District Municipality', 126),
(1612, 'Pag??giai municipality', 126),
(1613, '??ilal?? District Municipality', 126),
(1614, 'Panev????ys District Municipality', 126),
(1615, 'Roki??kis District Municipality', 126),
(1616, 'Pasvalys District Municipality', 126),
(1617, 'Skuodas District Municipality', 126),
(1618, 'Kelm?? District Municipality', 126),
(1619, 'Zarasai District Municipality', 126),
(1620, 'Vilkavi??kis District Municipality', 126),
(1621, 'Utena County', 126),
(1622, 'Opole Voivodeship', 176),
(1623, 'Silesian Voivodeship', 176),
(1624, 'Pomeranian Voivodeship', 176),
(1625, 'Kuyavian-Pomeranian Voivodeship', 176),
(1626, 'Podkarpackie Voivodeship', 176),
(1628, 'Warmian-Masurian Voivodeship', 176),
(1629, 'Lower Silesian Voivodeship', 176),
(1630, '??wi??tokrzyskie Voivodeship', 176),
(1631, 'Lubusz Voivodeship', 176),
(1632, 'Podlaskie Voivodeship', 176),
(1633, 'West Pomeranian Voivodeship', 176),
(1634, 'Greater Poland Voivodeship', 176),
(1635, 'Lesser Poland Voivodeship', 176),
(1636, '????d?? Voivodeship', 176),
(1637, 'Masovian Voivodeship', 176),
(1638, 'Lublin Voivodeship', 176),
(1639, 'Aargau', 214),
(1640, 'Canton of Fribourg', 214),
(1641, 'Basel-Landschaft', 214),
(1642, 'Uri', 214),
(1643, 'Ticino', 214),
(1644, 'Canton of St. Gallen', 214),
(1645, 'canton of Bern', 214),
(1646, 'Canton of Zug', 214),
(1647, 'Canton of Geneva', 214),
(1648, 'Canton of Valais', 214),
(1649, 'Appenzell Innerrhoden', 214),
(1650, 'Obwalden', 214),
(1651, 'Canton of Vaud', 214),
(1652, 'Nidwalden', 214),
(1653, 'Schwyz', 214),
(1654, 'Canton of Schaffhausen', 214),
(1655, 'Appenzell Ausserrhoden', 214),
(1656, 'canton of Z??rich', 214),
(1657, 'Thurgau', 214),
(1658, 'Canton of Jura', 214),
(1659, 'Canton of Neuch??tel', 214),
(1660, 'Graub??nden', 214),
(1661, 'Glarus', 214),
(1662, 'Canton of Solothurn', 214),
(1663, 'Canton of Lucerne', 214),
(1664, 'Tuscany', 107),
(1665, 'Province of Padua', 107),
(1666, 'Province of Parma', 107),
(1667, 'Libero consorzio comunale di Siracusa', 107),
(1668, 'Metropolitan City of Palermo', 107),
(1669, 'Campania', 107),
(1670, 'Marche', 107),
(1671, 'Metropolitan City of Reggio Calabria', 107),
(1672, 'Province of Ancona', 107),
(1673, 'Metropolitan City of Venice', 107),
(1674, 'Province of Latina', 107),
(1675, 'Province of Lecce', 107),
(1676, 'Province of Pavia', 107),
(1677, 'Province of Lecco', 107),
(1678, 'Lazio', 107),
(1679, 'Abruzzo', 107),
(1680, 'Metropolitan City of Florence', 107),
(1681, 'Province of Ascoli Piceno', 107),
(1682, 'Metropolitan City of Cagliari', 107),
(1683, 'Umbria', 107),
(1684, 'Metropolitan City of Bologna', 107),
(1685, 'Province of Pisa', 107),
(1686, 'Province of Barletta-Andria-Trani', 107),
(1687, 'Province of Pistoia', 107),
(1688, 'Apulia', 107),
(1689, 'Province of Belluno', 107),
(1690, 'Province of Pordenone', 107),
(1691, 'Province of Perugia', 107),
(1692, 'Province of Avellino', 107),
(1693, 'Pesaro and Urbino Province', 107),
(1694, 'Province of Pescara', 107),
(1695, 'Molise', 107),
(1696, 'Province of Piacenza', 107),
(1697, 'Province of Potenza', 107),
(1698, 'Metropolitan City of Milan', 107),
(1699, 'Metropolitan City of Genoa', 107),
(1700, 'Province of Prato', 107),
(1701, 'Benevento Province', 107),
(1702, 'Piedmont', 107),
(1703, 'Calabria', 107),
(1704, 'Province of Bergamo', 107),
(1705, 'Lombardy', 107),
(1706, 'Basilicata', 107),
(1707, 'Province of Ravenna', 107),
(1708, 'Province of Reggio Emilia', 107),
(1709, 'Sicily', 107),
(1710, 'Metropolitan City of Turin', 107),
(1711, 'Metropolitan City of Rome', 107),
(1712, 'Province of Rieti', 107),
(1713, 'Province of Rimini', 107),
(1714, 'Province of Brindisi', 107),
(1715, 'Sardinia', 107),
(1716, 'Aosta Valley', 107),
(1717, 'Province of Brescia', 107),
(1718, 'Libero consorzio comunale di Caltanissetta', 107),
(1719, 'Province of Rovigo', 107),
(1720, 'Province of Salerno', 107),
(1721, 'Province of Campobasso', 107),
(1722, 'Province of Sassari', 107),
(1723, 'Libero consorzio comunale di Enna', 107),
(1724, 'Metropolitan City of Naples', 107),
(1725, 'Trentino-South Tyrol', 107),
(1726, 'Province of Verbano-Cusio-Ossola', 107),
(1727, 'Libero consorzio comunale di Agrigento', 107),
(1728, 'Province of Catanzaro', 107),
(1729, 'Libero consorzio comunale di Ragusa', 107),
(1730, 'Province of Carbonia-Iglesias', 107),
(1731, 'Province of Caserta', 107),
(1732, 'Province of Savona', 107),
(1733, 'Libero consorzio comunale di Trapani', 107),
(1734, 'Province of Siena', 107),
(1735, 'Province of Viterbo', 107),
(1736, 'Province of Verona', 107),
(1737, 'Province of Vibo Valentia', 107),
(1738, 'Province of Vicenza', 107),
(1739, 'Province of Chieti', 107),
(1740, 'Province of Como', 107),
(1741, 'Province of Sondrio', 107),
(1742, 'Province of Cosenza', 107),
(1743, 'Province of Taranto', 107),
(1744, 'Province of Fermo', 107),
(1745, 'Province of Livorno', 107),
(1746, 'Province of Ferrara', 107),
(1747, 'Province of Lodi', 107),
(1748, 'Trentino', 107),
(1749, 'Province of Lucca', 107),
(1750, 'Province of Macerata', 107),
(1751, 'Province of Cremona', 107),
(1752, 'Province of Teramo', 107),
(1753, 'Veneto', 107),
(1754, 'Province of Crotone', 107),
(1755, 'Province of Terni', 107),
(1756, 'Friuli???Venezia Giulia', 107);
INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1757, 'Province of Modena', 107),
(1758, 'Province of Mantua', 107),
(1759, 'Province of Massa and Carrara', 107),
(1760, 'Province of Matera', 107),
(1761, 'Province of Medio Campidano', 107),
(1762, 'Province of Treviso', 107),
(1763, 'Province of Trieste', 107),
(1764, 'Province of Udine', 107),
(1765, 'Province of Varese', 107),
(1766, 'Metropolitan City of Catania', 107),
(1767, 'South Tyrol', 107),
(1768, 'Liguria', 107),
(1769, 'Province of Monza and Brianza', 107),
(1770, 'Metropolitan City of Messina', 107),
(1771, 'Province of Foggia', 107),
(1772, 'Metropolitan City of Bari', 107),
(1773, 'Emilia-Romagna', 107),
(1774, 'Province of Novara', 107),
(1775, 'Province of Cuneo', 107),
(1776, 'Province of Frosinone', 107),
(1777, 'Province of Gorizia', 107),
(1778, 'Province of Biella', 107),
(1779, 'Province of Forl??-Cesena', 107),
(1780, 'Province of Asti', 107),
(1781, 'Province of L\'Aquila', 107),
(1782, 'Province of Ogliastra', 107),
(1783, 'Province of Alessandria', 107),
(1784, 'Province of Olbia-Tempio', 107),
(1785, 'Province of Vercelli', 107),
(1786, 'Province of Oristano', 107),
(1787, 'Province of Grosseto', 107),
(1788, 'Province of Imperia', 107),
(1789, 'Province of Isernia', 107),
(1790, 'Province of Nuoro', 107),
(1791, 'Province of La Spezia', 107),
(1792, 'North Sumatra', 102),
(1793, 'Bengkulu', 102),
(1794, 'Central Kalimantan', 102),
(1795, 'South Sulawesi', 102),
(1796, 'Southeast Sulawesi', 102),
(1797, 'Sumatra', 102),
(1798, 'Papua', 102),
(1799, 'West Papua', 102),
(1800, 'Maluku', 102),
(1801, 'North Maluku', 102),
(1802, 'Central Java', 102),
(1803, 'Sulawesi', 102),
(1804, 'East Kalimantan', 102),
(1805, 'Jakarta', 102),
(1806, 'Kalimantan', 102),
(1807, 'Riau Islands', 102),
(1808, 'North Sulawesi', 102),
(1809, 'Riau', 102),
(1810, 'Banten', 102),
(1811, 'Lampung', 102),
(1812, 'Gorontalo', 102),
(1813, 'Central Sulawesi', 102),
(1814, 'West Nusa Tenggara', 102),
(1815, 'Jambi', 102),
(1816, 'South Sumatra', 102),
(1817, 'West Sulawesi', 102),
(1818, 'East Nusa Tenggara', 102),
(1819, 'South Kalimantan', 102),
(1820, 'Bangka Belitung Islands', 102),
(1821, 'Lesser Sunda Islands', 102),
(1822, 'Aceh', 102),
(1823, 'Maluku Islands', 102),
(1824, 'North Kalimantan', 102),
(1825, 'West Java', 102),
(1826, 'Bali', 102),
(1827, 'East Java', 102),
(1828, 'West Sumatra', 102),
(1829, 'Special Region of Yogyakarta', 102),
(1830, 'Phoenix Islands', 114),
(1831, 'Gilbert Islands', 114),
(1832, 'Line Islands', 114),
(1833, 'Primorsky Krai', 182),
(1834, 'Novgorod Oblast', 182),
(1835, 'Jewish Autonomous Oblast', 182),
(1836, 'Nenets Autonomous Okrug', 182),
(1837, 'Rostov Oblast', 182),
(1838, 'Khanty-Mansi Autonomous Okrug', 182),
(1839, 'Magadan Oblast', 182),
(1840, 'Krasnoyarsk Krai', 182),
(1841, 'Republic of Karelia', 182),
(1842, 'Republic of Buryatia', 182),
(1843, 'Murmansk Oblast', 182),
(1844, 'Kaluga Oblast', 182),
(1845, 'Chelyabinsk Oblast', 182),
(1846, 'Omsk Oblast', 182),
(1847, 'Yamalo-Nenets Autonomous Okrug', 182),
(1848, 'Sakha Republic', 182),
(1849, 'Arkhangelsk', 182),
(1850, 'Republic of Dagestan', 182),
(1851, 'Yaroslavl Oblast', 182),
(1852, 'Republic of Adygea', 182),
(1853, 'Republic of North Ossetia-Alania', 182),
(1854, 'Republic of Bashkortostan', 182),
(1855, 'Kursk Oblast', 182),
(1856, 'Ulyanovsk Oblast', 182),
(1857, 'Nizhny Novgorod Oblast', 182),
(1858, 'Amur Oblast', 182),
(1859, 'Chukotka Autonomous Okrug', 182),
(1860, 'Tver Oblast', 182),
(1861, 'Republic of Tatarstan', 182),
(1862, 'Samara Oblast', 182),
(1863, 'Pskov Oblast', 182),
(1864, 'Ivanovo Oblast', 182),
(1865, 'Kamchatka Krai', 182),
(1866, 'Astrakhan Oblast', 182),
(1867, 'Bryansk Oblast', 182),
(1868, 'Stavropol Krai', 182),
(1869, 'Karachay-Cherkess Republic', 182),
(1870, 'Mari El Republic', 182),
(1871, 'Perm Krai', 182),
(1872, 'Tomsk Oblast', 182),
(1873, 'Khabarovsk Krai', 182),
(1874, 'Vologda Oblast', 182),
(1875, 'Sakhalin', 182),
(1876, 'Altai Republic', 182),
(1877, 'Republic of Khakassia', 182),
(1878, 'Tambov Oblast', 182),
(1879, 'Saint Petersburg', 182),
(1880, 'Irkutsk', 182),
(1881, 'Vladimir Oblast', 182),
(1882, 'Moscow Oblast', 182),
(1883, 'Republic of Kalmykia', 182),
(1884, 'Republic of Ingushetia', 182),
(1885, 'Smolensk Oblast', 182),
(1886, 'Orenburg Oblast', 182),
(1887, 'Saratov Oblast', 182),
(1888, 'Novosibirsk', 182),
(1889, 'Lipetsk Oblast', 182),
(1890, 'Kirov Oblast', 182),
(1891, 'Krasnodar Krai', 182),
(1892, 'Kabardino-Balkar Republic', 182),
(1893, 'Chechen Republic', 182),
(1894, 'Sverdlovsk', 182),
(1895, 'Tula Oblast', 182),
(1896, 'Leningrad Oblast', 182),
(1897, 'Kemerovo Oblast', 182),
(1898, 'Republic of Mordovia', 182),
(1899, 'Komi Republic', 182),
(1900, 'Tuva Republic', 182),
(1901, 'Moscow', 182),
(1902, 'Kaliningrad', 182),
(1903, 'Belgorod Oblast', 182),
(1904, 'Zabaykalsky Krai', 182),
(1905, 'Ryazan Oblast', 182),
(1906, 'Voronezh Oblast', 182),
(1907, 'Tyumen Oblast', 182),
(1908, 'Oryol Oblast', 182),
(1909, 'Penza Oblast', 182),
(1910, 'Kostroma Oblast', 182),
(1911, 'Altai Krai', 182),
(1912, 'Sevastopol', 182),
(1913, 'Udmurt Republic', 182),
(1914, 'Chuvash Republic', 182),
(1915, 'Kurgan Oblast', 182),
(1916, 'Lomaiviti', 73),
(1917, 'Ba', 73),
(1918, 'Tailevu', 73),
(1919, 'Nadroga-Navosa', 73),
(1920, 'Rewa', 73),
(1921, 'Northern Division', 73),
(1922, 'Macuata', 73),
(1923, 'Western Division', 73),
(1924, 'Cakaudrove', 73),
(1925, 'Serua', 73),
(1926, 'Ra', 73),
(1927, 'Naitasiri', 73),
(1928, 'Namosi', 73),
(1929, 'Central Division', 73),
(1930, 'Bua', 73),
(1931, 'Rotuma', 73),
(1932, 'Eastern Division', 73),
(1933, 'Lau', 73),
(1934, 'Kadavu', 73),
(1935, 'Labuan', 132),
(1936, 'Sabah', 132),
(1937, 'Sarawak', 132),
(1938, 'Perlis', 132),
(1939, 'Penang', 132),
(1940, 'Pahang', 132),
(1941, 'Malacca', 132),
(1942, 'Terengganu', 132),
(1943, 'Perak', 132),
(1944, 'Selangor', 132),
(1945, 'Putrajaya', 132),
(1946, 'Kelantan', 132),
(1947, 'Kedah', 132),
(1948, 'Negeri Sembilan', 132),
(1949, 'Kuala Lumpur', 132),
(1950, 'Johor', 132),
(1951, 'Mashonaland East Province', 247),
(1952, 'Matabeleland South Province', 247),
(1953, 'Mashonaland West Province', 247),
(1954, 'Matabeleland North Province', 247),
(1955, 'Mashonaland Central Province', 247),
(1956, 'Bulawayo Province', 247),
(1957, 'Midlands Province', 247),
(1958, 'Harare Province', 247),
(1959, 'Manicaland', 247),
(1960, 'Masvingo Province', 247),
(1961, 'Bulgan Province', 146),
(1962, 'Darkhan-Uul Province', 146),
(1963, 'Dornod Province', 146),
(1964, 'Khovd Province', 146),
(1965, '??v??rkhangai Province', 146),
(1966, 'Orkhon Province', 146),
(1967, '??mn??govi Province', 146),
(1968, 'T??v Province', 146),
(1969, 'Bayan-??lgii Province', 146),
(1970, 'Dundgovi Province', 146),
(1971, 'Uvs Province', 146),
(1972, 'Govi-Altai Province', 146),
(1973, 'Arkhangai Province', 146),
(1974, 'Khentii Province', 146),
(1975, 'Kh??vsg??l Province', 146),
(1976, 'Bayankhongor Province', 146),
(1977, 'S??khbaatar Province', 146),
(1978, 'Govis??mber Province', 146),
(1979, 'Zavkhan Province', 146),
(1980, 'Selenge Province', 146),
(1981, 'Dornogovi Province', 146),
(1982, 'Northern Province', 246),
(1983, 'Western Province', 246),
(1984, 'Copperbelt Province', 246),
(1985, 'Northwestern Province', 246),
(1986, 'Central Province', 246),
(1987, 'Luapula Province', 246),
(1988, 'Lusaka Province', 246),
(1989, 'Muchinga Province', 246),
(1990, 'Southern Province', 246),
(1991, 'Eastern Province', 246),
(1992, 'Capital Governorate', 18),
(1993, 'Southern Governorate', 18),
(1994, 'Northern Governorate', 18),
(1995, 'Muharraq Governorate', 18),
(1996, 'Central Governorate', 18),
(1997, 'Rio de Janeiro', 31),
(1998, 'Minas Gerais', 31),
(1999, 'Amap??', 31),
(2000, 'Goi??s', 31),
(2001, 'Rio Grande do Sul', 31),
(2002, 'Bahia', 31),
(2003, 'Sergipe', 31),
(2004, 'Amazonas', 31),
(2005, 'Para??ba', 31),
(2006, 'Pernambuco', 31),
(2007, 'Alagoas', 31),
(2008, 'Piau??', 31),
(2009, 'Par??', 31),
(2010, 'Mato Grosso do Sul', 31),
(2011, 'Mato Grosso', 31),
(2012, 'Acre', 31),
(2013, 'Rond??nia', 31),
(2014, 'Santa Catarina', 31),
(2015, 'Maranh??o', 31),
(2016, 'Cear??', 31),
(2017, 'Federal District', 31),
(2018, 'Esp??rito Santo', 31),
(2019, 'Rio Grande do Norte', 31),
(2020, 'Tocantins', 31),
(2021, 'S??o Paulo', 31),
(2022, 'Paran??', 31),
(2023, 'Aragatsotn Region', 12),
(2024, 'Ararat Province', 12),
(2025, 'Vayots Dzor Region', 12),
(2026, 'Armavir Region', 12),
(2027, 'Syunik Province', 12),
(2028, 'Gegharkunik Province', 12),
(2029, 'Lori Region', 12),
(2030, 'Yerevan', 12),
(2031, 'Shirak Region', 12),
(2032, 'Tavush Region', 12),
(2033, 'Kotayk Region', 12),
(2034, 'Cojedes', 239),
(2035, 'Falc??n', 239),
(2036, 'Portuguesa', 239),
(2037, 'Miranda', 239),
(2038, 'Lara', 239),
(2039, 'Bol??var', 239),
(2040, 'Carabobo', 239),
(2041, 'Yaracuy', 239),
(2042, 'Zulia', 239),
(2043, 'Trujillo', 239),
(2044, 'Amazonas', 239),
(2045, 'Gu??rico', 239),
(2046, 'Federal Dependencies of Venezuela', 239),
(2047, 'Aragua', 239),
(2048, 'T??chira', 239),
(2049, 'Barinas', 239),
(2050, 'Anzo??tegui', 239),
(2051, 'Delta Amacuro', 239),
(2052, 'Nueva Esparta', 239),
(2053, 'M??rida', 239),
(2054, 'Monagas', 239),
(2055, 'Vargas', 239),
(2056, 'Sucre', 239),
(2057, 'Carinthia', 15),
(2058, 'Upper Austria', 15),
(2059, 'Styria', 15),
(2060, 'Vienna', 15),
(2061, 'Salzburg', 15),
(2062, 'Burgenland', 15),
(2063, 'Vorarlberg', 15),
(2064, 'Tyrol', 15),
(2065, 'Lower Austria', 15),
(2066, 'Mid-Western Region', 154),
(2067, 'Western Region', 154),
(2068, 'Far-Western Development Region', 154),
(2069, 'Eastern Development Region', 154),
(2070, 'Mechi Zone', 154),
(2071, 'Bheri Zone', 154),
(2072, 'Kosi Zone', 154),
(2073, 'Central Region', 154),
(2074, 'Lumbini Zone', 154),
(2075, 'Narayani Zone', 154),
(2076, 'Janakpur Zone', 154),
(2077, 'Rapti Zone', 154),
(2078, 'Seti Zone', 154),
(2079, 'Karnali Zone', 154),
(2080, 'Dhaulagiri Zone', 154),
(2081, 'Gandaki Zone', 154),
(2082, 'Bagmati Zone', 154),
(2083, 'Mahakali Zone', 154),
(2084, 'Sagarmatha Zone', 154),
(2085, 'Unity', 206),
(2086, 'Upper Nile', 206),
(2087, 'Warrap', 206),
(2088, 'Northern Bahr el Ghazal', 206),
(2089, 'Western Equatoria', 206),
(2090, 'Lakes', 206),
(2091, 'Western Bahr el Ghazal', 206),
(2092, 'Central Equatoria', 206),
(2093, 'Eastern Equatoria', 206),
(2094, 'Jonglei State', 206),
(2095, 'Karditsa Regional Unit', 85),
(2096, 'West Greece Region', 85),
(2097, 'Thessaloniki Regional Unit', 85),
(2098, 'Arcadia Prefecture', 85),
(2099, 'Imathia Regional Unit', 85),
(2100, 'Kastoria Regional Unit', 85),
(2101, 'Euboea', 85),
(2102, 'Grevena Prefecture', 85),
(2103, 'Preveza Prefecture', 85),
(2104, 'Lefkada Regional Unit', 85),
(2105, 'Argolis Regional Unit', 85),
(2106, 'Laconia', 85),
(2107, 'Pella Regional Unit', 85),
(2108, 'West Macedonia Region', 85),
(2109, 'Crete Region', 85),
(2110, 'Epirus Region', 85),
(2111, 'Kilkis Regional Unit', 85),
(2112, 'Kozani Prefecture', 85),
(2113, 'Ioannina Regional Unit', 85),
(2114, 'Phthiotis Prefecture', 85),
(2115, 'Chania Regional Unit', 85),
(2116, 'Achaea Regional Unit', 85),
(2117, 'East Macedonia and Thrace', 85),
(2118, 'South Aegean', 85),
(2119, 'Peloponnese Region', 85),
(2120, 'East Attica Regional Unit', 85),
(2121, 'Serres Prefecture', 85),
(2122, 'Attica Region', 85),
(2123, 'Aetolia-Acarnania Regional Unit', 85),
(2124, 'Corfu Prefecture', 85),
(2125, 'Central Macedonia', 85),
(2126, 'Boeotia Regional Unit', 85),
(2127, 'Kefalonia Prefecture', 85),
(2128, 'Central Greece Region', 85),
(2129, 'Corinthia Regional Unit', 85),
(2130, 'Drama Regional Unit', 85),
(2131, 'Ionian Islands Region', 85),
(2132, 'Larissa Prefecture', 85),
(2133, 'Kayin State', 151),
(2134, 'Mandalay Region', 151),
(2135, 'Yangon Region', 151),
(2136, 'Magway Region', 151),
(2137, 'Chin State', 151),
(2138, 'Rakhine State', 151),
(2139, 'Shan State', 151),
(2140, 'Tanintharyi Region', 151),
(2141, 'Bago', 151),
(2142, 'Ayeyarwady Region', 151),
(2143, 'Kachin State', 151),
(2144, 'Kayah State', 151),
(2145, 'Sagaing Region', 151),
(2146, 'Naypyidaw Union Territory', 151),
(2147, 'Mon State', 151),
(2148, 'Bart??n Province', 225),
(2149, 'K??tahya Province', 225),
(2150, 'Sakarya Province', 225),
(2151, 'Edirne Province', 225),
(2152, 'Van Province', 225),
(2153, 'Bing??l Province', 225),
(2154, 'Kilis Province', 225),
(2155, 'Ad??yaman Province', 225),
(2156, 'Mersin Province', 225),
(2157, 'Denizli Province', 225),
(2158, 'Malatya Province', 225),
(2159, 'Elaz???? Province', 225),
(2160, 'Erzincan Province', 225),
(2161, 'Amasya Province', 225),
(2162, 'Mu?? Province', 225),
(2163, 'Bursa Province', 225),
(2164, 'Eski??ehir Province', 225),
(2165, 'Erzurum Province', 225),
(2166, 'I??d??r Province', 225),
(2167, 'Tekirda?? Province', 225),
(2168, '??ank??r?? Province', 225),
(2169, 'Antalya Province', 225),
(2170, 'Istanbul Province', 225),
(2171, 'Konya Province', 225),
(2172, 'Bolu Province', 225),
(2173, '??orum Province', 225),
(2174, 'Ordu Province', 225),
(2175, 'Bal??kesir Province', 225),
(2176, 'K??rklareli Province', 225),
(2177, 'Bayburt Province', 225),
(2178, 'K??r??kkale Province', 225),
(2179, 'Afyonkarahisar Province', 225),
(2180, 'K??r??ehir Province', 225),
(2181, 'Sivas Province', 225),
(2182, 'Mu??la Province', 225),
(2183, '??anl??urfa Province', 225),
(2184, 'Karaman Province', 225),
(2185, 'Ardahan Province', 225),
(2186, 'Giresun Province', 225),
(2187, 'Ayd??n Province', 225),
(2188, 'Yozgat Province', 225),
(2189, 'Ni??de Province', 225),
(2190, 'Hakk??ri Province', 225),
(2191, 'Artvin Province', 225),
(2192, 'Tunceli Province', 225),
(2193, 'A??r?? Province', 225),
(2194, 'Batman Province', 225),
(2195, 'Kocaeli Province', 225),
(2196, 'Nev??ehir Province', 225),
(2197, 'Kastamonu Province', 225),
(2198, 'Manisa Province', 225),
(2199, 'Tokat Province', 225),
(2200, 'Kayseri Province', 225),
(2201, 'U??ak Province', 225),
(2202, 'D??zce Province', 225),
(2203, 'Gaziantep Province', 225),
(2204, 'G??m????hane Province', 225),
(2205, '??zmir Province', 225),
(2206, 'Trabzon Province', 225),
(2207, 'Siirt Province', 225),
(2208, 'Kars Province', 225),
(2209, 'Burdur Province', 225),
(2210, 'Aksaray Province', 225),
(2211, 'Hatay Province', 225),
(2212, 'Adana Province', 225),
(2213, 'Zonguldak Province', 225),
(2214, 'Osmaniye Province', 225),
(2215, 'Bitlis Province', 225),
(2216, '??anakkale Province', 225),
(2217, 'Ankara Province', 225),
(2218, 'Yalova Province', 225),
(2219, 'Rize Province', 225),
(2220, 'Samsun Province', 225),
(2221, 'Bilecik Province', 225),
(2222, 'Isparta Province', 225),
(2223, 'Karab??k Province', 225),
(2224, 'Mardin Province', 225),
(2225, '????rnak Province', 225),
(2226, 'Diyarbak??r Province', 225),
(2227, 'Kahramanmara?? Province', 225),
(2228, 'Lisbon District', 177),
(2229, 'Bragan??a District', 177),
(2230, 'Beja District', 177),
(2231, 'Madeira', 177),
(2232, 'Portalegre District', 177),
(2233, 'Azores', 177),
(2234, 'Vila Real District', 177),
(2235, 'Aveiro District', 177),
(2236, '??vora District', 177),
(2237, 'Viseu District', 177),
(2238, 'Santar??m District', 177),
(2239, 'Faro District', 177),
(2240, 'Leiria District', 177),
(2241, 'Castelo Branco District', 177),
(2242, 'Set??bal District', 177),
(2243, 'Porto District', 177),
(2244, 'Braga District', 177),
(2245, 'Viana do Castelo District', 177),
(2246, 'Coimbra District', 177),
(2247, 'Zhejiang', 45),
(2248, 'Fujian', 45),
(2249, 'Shanghai', 45),
(2250, 'Jiangsu', 45),
(2251, 'Anhui', 45),
(2252, 'Shandong', 45),
(2253, 'Jilin', 45),
(2254, 'Shanxi', 45),
(2255, 'Taiwan Province, People\'s Republic of China', 45),
(2256, 'Jiangxi', 45),
(2257, 'Beijing', 45),
(2258, 'Hunan', 45),
(2259, 'Henan', 45),
(2260, 'Yunnan', 45),
(2261, 'Guizhou', 45),
(2262, 'Ningxia Hui Autonomous Region', 45),
(2263, 'Xinjiang', 45),
(2264, 'Tibet Autonomous Region', 45),
(2265, 'Heilongjiang', 45),
(2266, 'Macau', 45),
(2267, 'Hong Kong', 45),
(2268, 'Liaoning', 45),
(2269, 'Inner Mongolia', 45),
(2270, 'Qinghai', 45),
(2271, 'Chongqing', 45),
(2272, 'Shaanxi', 45),
(2273, 'Hainan', 45),
(2274, 'Hubei', 45),
(2275, 'Gansu', 45),
(2276, 'Keelung', 45),
(2277, 'Sichuan', 45),
(2278, 'Guangxi Zhuang Autonomous Region', 45),
(2279, 'Guangdong', 45),
(2280, 'Hebei', 45),
(2281, 'South Governorate', 121),
(2282, 'Mount Lebanon Governorate', 121),
(2283, 'Baalbek-Hermel Governorate', 121),
(2284, 'North Governorate', 121),
(2285, 'Akkar Governorate', 121),
(2286, 'Beirut Governorate', 121),
(2287, 'Beqaa Governorate', 121),
(2288, 'Nabatieh Governorate', 121),
(2289, 'Isle of Wight', 232),
(2290, 'St Helens', 232),
(2291, 'London Borough of Brent', 232),
(2292, 'Walsall', 232),
(2293, 'Trafford', 232),
(2294, 'City of Southampton', 232),
(2295, 'Sheffield', 232),
(2296, 'West Sussex', 232),
(2297, 'City of Peterborough', 232),
(2298, 'Caerphilly County Borough', 232),
(2299, 'Vale of Glamorgan', 232),
(2300, 'Shetland Islands', 232),
(2301, 'Rhondda Cynon Taf', 232),
(2302, 'Poole', 232),
(2303, 'Central Bedfordshire', 232),
(2304, 'Down District Council', 232),
(2305, 'City of Portsmouth', 232),
(2306, 'London Borough of Haringey', 232),
(2307, 'London Borough of Bexley', 232),
(2308, 'Rotherham', 232),
(2309, 'Hartlepool', 232),
(2310, 'Telford and Wrekin', 232),
(2311, 'Belfast district', 232),
(2312, 'Cornwall', 232),
(2313, 'London Borough of Sutton', 232),
(2314, 'Omagh District Council', 232),
(2315, 'Banbridge', 232),
(2316, 'Causeway Coast and Glens', 232),
(2317, 'Newtownabbey Borough Council', 232),
(2318, 'City of Leicester', 232),
(2319, 'London Borough of Islington', 232),
(2320, 'Metropolitan Borough of Wigan', 232),
(2321, 'Oxfordshire', 232),
(2322, 'Magherafelt District Council', 232),
(2323, 'Southend-on-Sea', 232),
(2324, 'Armagh, Banbridge and Craigavon', 232),
(2325, 'Perth and Kinross', 232),
(2326, 'London Borough of Waltham Forest', 232),
(2327, 'Rochdale', 232),
(2328, 'Merthyr Tydfil County Borough', 232),
(2329, 'Blackburn with Darwen', 232),
(2330, 'Knowsley', 232),
(2331, 'Armagh City and District Council', 232),
(2332, 'Middlesbrough', 232),
(2333, 'East Renfrewshire', 232),
(2334, 'Cumbria', 232),
(2335, 'Scotland', 232),
(2336, 'England', 232),
(2337, 'Northern Ireland', 232),
(2338, 'Wales', 232),
(2339, 'Bath and North East Somerset', 232),
(2340, 'Liverpool', 232),
(2341, 'Sandwell', 232),
(2342, 'Bournemouth', 232),
(2343, 'Isles of Scilly', 232),
(2344, 'Falkirk', 232),
(2345, 'Dorset', 232),
(2346, 'Scottish Borders', 232),
(2347, 'London Borough of Havering', 232),
(2348, 'Moyle District Council', 232),
(2349, 'London Borough of Camden', 232),
(2350, 'Newry and Mourne District Council', 232),
(2351, 'Neath Port Talbot County Borough', 232),
(2352, 'Conwy County Borough', 232),
(2353, 'Outer Hebrides', 232),
(2354, 'West Lothian', 232),
(2355, 'Lincolnshire', 232),
(2356, 'London Borough of Barking and Dagenham', 232),
(2357, 'City of Westminster', 232),
(2358, 'London Borough of Lewisham', 232),
(2359, 'City of Nottingham', 232),
(2360, 'Moray', 232),
(2361, 'Ballymoney', 232),
(2362, 'South Lanarkshire', 232),
(2363, 'Ballymena Borough', 232),
(2364, 'Doncaster', 232),
(2365, 'Northumberland', 232),
(2366, 'Fermanagh and Omagh', 232),
(2367, 'Tameside', 232),
(2368, 'Royal Borough of Kensington and Chelsea', 232),
(2369, 'Hertfordshire', 232),
(2370, 'East Riding of Yorkshire', 232),
(2371, 'Kirklees', 232),
(2372, 'City of Sunderland', 232),
(2373, 'Gloucestershire', 232),
(2374, 'East Ayrshire', 232),
(2375, 'United Kingdom', 232),
(2376, 'London Borough of Hillingdon', 232),
(2377, 'South Ayrshire', 232),
(2378, 'Ascension Island', 232),
(2379, 'Gwynedd', 232),
(2380, 'London Borough of Hounslow', 232),
(2381, 'Medway', 232),
(2382, 'Limavady Borough Council', 232),
(2383, 'Highland', 232),
(2384, 'North East Lincolnshire', 232),
(2385, 'London Borough of Harrow', 232),
(2386, 'Somerset', 232),
(2387, 'Angus', 232),
(2388, 'Inverclyde', 232),
(2389, 'Darlington', 232),
(2390, 'London Borough of Tower Hamlets', 232),
(2391, 'Wiltshire', 232),
(2392, 'Argyll and Bute', 232),
(2393, 'Strabane District Council', 232),
(2394, 'Stockport', 232),
(2395, 'Brighton and Hove', 232),
(2396, 'London Borough of Lambeth', 232),
(2397, 'London Borough of Redbridge', 232),
(2398, 'Manchester', 232),
(2399, 'Mid Ulster', 232),
(2400, 'South Gloucestershire', 232),
(2401, 'Aberdeenshire', 232),
(2402, 'Monmouthshire', 232),
(2403, 'Derbyshire', 232),
(2404, 'Glasgow', 232),
(2405, 'Buckinghamshire', 232),
(2406, 'County Durham', 232),
(2407, 'Shropshire', 232),
(2408, 'Wirral', 232),
(2409, 'South Tyneside', 232),
(2410, 'Essex', 232),
(2411, 'London Borough of Hackney', 232),
(2412, 'Antrim and Newtownabbey', 232),
(2413, 'City of Bristol', 232),
(2414, 'East Sussex', 232),
(2415, 'Dumfries and Galloway', 232),
(2416, 'Milton Keynes', 232),
(2417, 'Derry City Council', 232),
(2418, 'London Borough of Newham', 232),
(2419, 'Wokingham', 232),
(2420, 'Warrington', 232),
(2421, 'Stockton-on-Tees', 232),
(2422, 'Swindon', 232),
(2423, 'Cambridgeshire', 232),
(2424, 'City of London', 232),
(2425, 'Birmingham', 232),
(2426, 'City of York', 232),
(2427, 'Slough', 232),
(2428, 'Edinburgh', 232),
(2429, 'Mid and East Antrim', 232),
(2430, 'North Somerset', 232),
(2431, 'Gateshead', 232),
(2432, 'London Borough of Southwark', 232),
(2433, 'City and County of Swansea', 232),
(2434, 'London Borough of Wandsworth', 232),
(2435, 'Hampshire', 232),
(2436, 'Wrexham County Borough', 232),
(2437, 'Flintshire', 232),
(2438, 'Coventry', 232),
(2439, 'Carrickfergus Borough Council', 232),
(2440, 'West Dunbartonshire', 232),
(2441, 'Powys', 232),
(2442, 'Cheshire West and Chester', 232),
(2443, 'Renfrewshire', 232),
(2444, 'Cheshire East', 232),
(2445, 'Cookstown District Council', 232),
(2446, 'Derry City and Strabane', 232),
(2447, 'Staffordshire', 232),
(2448, 'London Borough of Hammersmith and Fulham', 232),
(2449, 'Craigavon Borough Council', 232),
(2450, 'Clackmannanshire', 232),
(2451, 'Blackpool', 232),
(2452, 'Bridgend County Borough', 232),
(2453, 'North Lincolnshire', 232),
(2454, 'East Dunbartonshire', 232),
(2455, 'Reading', 232),
(2456, 'Nottinghamshire', 232),
(2457, 'Dudley', 232),
(2458, 'Newcastle upon Tyne', 232),
(2459, 'Bury', 232),
(2460, 'Lisburn and Castlereagh', 232),
(2461, 'Coleraine Borough Council', 232),
(2462, 'East Lothian', 232),
(2463, 'Aberdeen', 232),
(2464, 'Kent', 232),
(2465, 'Wakefield', 232),
(2466, 'Halton', 232),
(2467, 'Suffolk', 232),
(2468, 'Thurrock', 232),
(2469, 'Solihull', 232),
(2470, 'Bracknell Forest', 232),
(2471, 'West Berkshire', 232),
(2472, 'Rutland', 232),
(2473, 'Norfolk', 232),
(2474, 'Orkney Islands', 232),
(2475, 'City of Kingston upon Hull', 232),
(2476, 'London Borough of Enfield', 232),
(2477, 'Oldham', 232),
(2478, 'Torbay', 232),
(2479, 'Fife', 232),
(2480, 'Northamptonshire', 232),
(2481, 'Royal Borough of Kingston upon Thames', 232),
(2482, 'Windsor and Maidenhead', 232),
(2483, 'London Borough of Merton', 232),
(2484, 'Carmarthenshire', 232),
(2485, 'City of Derby', 232),
(2486, 'Pembrokeshire', 232),
(2487, 'North Lanarkshire', 232),
(2488, 'Stirling', 232),
(2489, 'City of Wolverhampton', 232),
(2490, 'London Borough of Bromley', 232),
(2491, 'Devon', 232),
(2492, 'Royal Borough of Greenwich', 232),
(2493, 'Salford', 232),
(2494, 'Lisburn City Council', 232),
(2495, 'Lancashire', 232),
(2496, 'Torfaen', 232),
(2497, 'Denbighshire', 232),
(2498, 'Ards', 232),
(2499, 'Barnsley', 232),
(2500, 'Herefordshire', 232),
(2501, 'London Borough of Richmond upon Thames', 232),
(2502, 'Saint Helena', 232),
(2503, 'Leeds', 232),
(2504, 'Bolton', 232),
(2505, 'Warwickshire', 232),
(2506, 'City of Stoke-on-Trent', 232),
(2507, 'Bedford', 232),
(2508, 'Dungannon and South Tyrone Borough Council', 232),
(2509, 'Ceredigion', 232),
(2510, 'Worcestershire', 232),
(2511, 'Dundee', 232),
(2512, 'London Borough of Croydon', 232),
(2513, 'North Down Borough Council', 232),
(2514, 'City of Plymouth', 232),
(2515, 'Larne Borough Council', 232),
(2516, 'Leicestershire', 232),
(2517, 'Calderdale', 232),
(2518, 'Sefton', 232),
(2519, 'Midlothian', 232),
(2520, 'London Borough of Barnet', 232),
(2521, 'North Tyneside', 232),
(2522, 'North Yorkshire', 232),
(2523, 'Ards and North Down', 232),
(2524, 'Newport', 232),
(2525, 'Castlereagh', 232),
(2526, 'Surrey', 232),
(2527, 'Redcar and Cleveland', 232),
(2528, 'City and County of Cardiff', 232),
(2529, 'Bradford', 232),
(2530, 'Blaenau Gwent County Borough', 232),
(2531, 'Fermanagh District Council', 232),
(2532, 'London Borough of Ealing', 232),
(2533, 'Antrim', 232),
(2534, 'Newry, Mourne and Down', 232),
(2535, 'North Ayrshire', 232),
(2536, 'Tashkent', 236),
(2537, 'Namangan Region', 236),
(2538, 'Fergana Region', 236),
(2539, 'Xorazm Region', 236),
(2540, 'Andijan Region', 236),
(2541, 'Bukhara Region', 236),
(2542, 'Navoiy Region', 236),
(2543, 'Qashqadaryo Region', 236),
(2544, 'Samarqand Region', 236),
(2545, 'Jizzakh Region', 236),
(2546, 'Surxondaryo Region', 236),
(2547, 'Sirdaryo Region', 236),
(2548, 'Karakalpakstan', 236),
(2549, 'Tashkent Region', 236),
(2550, 'Ariana Governorate', 224),
(2551, 'Bizerte Governorate', 224),
(2552, 'Jendouba Governorate', 224),
(2553, 'Monastir Governorate', 224),
(2554, 'Tunis Governorate', 224),
(2555, 'Manouba Governorate', 224),
(2556, 'Gafsa Governorate', 224),
(2557, 'Sfax Governorate', 224),
(2558, 'Gab??s Governorate', 224),
(2559, 'Tataouine Governorate', 224),
(2560, 'Medenine Governorate', 224),
(2561, 'Kef Governorate', 224),
(2562, 'Kebili Governorate', 224),
(2563, 'Siliana Governorate', 224),
(2564, 'Kairouan Governorate', 224),
(2565, 'Zaghouan Governorate', 224),
(2566, 'Ben Arous Governorate', 224),
(2567, 'Sidi Bouzid Governorate', 224),
(2568, 'Mahdia Governorate', 224),
(2569, 'Tozeur Governorate', 224),
(2570, 'Kasserine Governorate', 224),
(2571, 'Sousse Governorate', 224),
(2572, 'Kassrine', 224),
(2573, 'Ratak Chain', 137),
(2574, 'Ralik Chain', 137),
(2575, 'Centrale Region', 220),
(2576, 'Maritime', 220),
(2577, 'Plateaux Region', 220),
(2578, 'Savanes Region', 220),
(2579, 'Kara Region', 220),
(2580, 'Chuuk State', 143),
(2581, 'Pohnpei State', 143),
(2582, 'Yap State', 143),
(2583, 'Kosrae State', 143),
(2584, 'Vaavu Atoll', 133),
(2585, 'Shaviyani Atoll', 133),
(2586, 'Haa Alif Atoll', 133),
(2587, 'Alif Alif Atoll', 133),
(2588, 'North Province', 133),
(2589, 'North Central Province', 133),
(2590, 'Dhaalu Atoll', 133),
(2591, 'Thaa Atoll', 133),
(2592, 'Noonu Atoll', 133),
(2593, 'Upper South Province', 133),
(2594, 'Addu Atoll', 133),
(2595, 'Gnaviyani Atoll', 133),
(2596, 'Kaafu Atoll', 133),
(2597, 'Haa Dhaalu Atoll', 133),
(2598, 'Gaafu Alif Atoll', 133),
(2599, 'Faafu Atoll', 133),
(2600, 'Alif Dhaal Atoll', 133),
(2601, 'Laamu Atoll', 133),
(2602, 'Raa Atoll', 133),
(2603, 'Gaafu Dhaalu Atoll', 133),
(2604, 'Central Province', 133),
(2605, 'South Province', 133),
(2606, 'South Central Province', 133),
(2607, 'Lhaviyani Atoll', 133),
(2608, 'Meemu Atoll', 133),
(2609, 'Mal??', 133),
(2610, 'Utrecht', 156),
(2611, 'Gelderland', 156),
(2612, 'North Holland', 156),
(2613, 'Drenthe', 156),
(2614, 'South Holland', 156),
(2615, 'Limburg', 156),
(2616, 'Sint Eustatius', 156),
(2617, 'Groningen', 156),
(2618, 'Overijssel', 156),
(2619, 'Flevoland', 156),
(2620, 'Zeeland', 156),
(2621, 'Saba', 156),
(2622, 'Friesland', 156),
(2623, 'North Brabant', 156),
(2624, 'Bonaire', 156),
(2625, 'Savanes Region', 54),
(2626, 'Agn??by', 54),
(2627, 'Lagunes District', 54),
(2628, 'Sud-Bandama', 54),
(2629, 'Montagnes District', 54),
(2630, 'Moyen-Como??', 54),
(2631, 'Marahou?? Region', 54),
(2632, 'Lacs District', 54),
(2633, 'Fromager', 54),
(2634, 'Abidjan', 54),
(2635, 'Bas-Sassandra Region', 54),
(2636, 'Bafing Region', 54),
(2637, 'Vall??e du Bandama District', 54),
(2638, 'Haut-Sassandra', 54),
(2639, 'Lagunes region', 54),
(2640, 'Lacs Region', 54),
(2641, 'Zanzan Region', 54),
(2642, 'Dengu??l?? Region', 54),
(2643, 'Bas-Sassandra District', 54),
(2644, 'Dengu??l?? District', 54),
(2645, 'Dix-Huit Montagnes', 54),
(2646, 'Moyen-Cavally', 54),
(2647, 'Vall??e du Bandama Region', 54),
(2648, 'Sassandra-Marahou?? District', 54),
(2649, 'Worodougou', 54),
(2650, 'Woroba District', 54),
(2651, 'G??h-Djiboua District', 54),
(2652, 'Sud-Como??', 54),
(2653, 'Yamoussoukro', 54),
(2654, 'Como?? District', 54),
(2655, 'N\'zi-Como??', 54),
(2656, 'Far North', 38),
(2657, 'Northwest', 38),
(2658, 'Southwest', 38),
(2659, 'South', 38),
(2660, 'Centre', 38),
(2661, 'East', 38),
(2662, 'Littoral', 38),
(2663, 'Adamawa', 38),
(2664, 'West', 38),
(2665, 'North', 38),
(2666, 'Banjul', 80),
(2667, 'West Coast Division', 80),
(2668, 'Upper River Division', 80),
(2669, 'Central River Division', 80),
(2670, 'Lower River Division', 80),
(2671, 'North Bank Division', 80),
(2672, 'Beyla Prefecture', 92),
(2673, 'Mandiana Prefecture', 92),
(2674, 'Yomou Prefecture', 92),
(2675, 'Fria Prefecture', 92),
(2676, 'Bok?? Region', 92),
(2677, 'Lab?? Region', 92),
(2678, 'Nz??r??kor?? Prefecture', 92),
(2679, 'Dabola Prefecture', 92),
(2680, 'Lab?? Prefecture', 92),
(2681, 'Dubr??ka Prefecture', 92),
(2682, 'Faranah Prefecture', 92),
(2683, 'For??cariah Prefecture', 92),
(2684, 'Nz??r??kor?? Region', 92),
(2685, 'Gaoual Prefecture', 92),
(2686, 'Conakry', 92),
(2687, 'T??lim??l?? Prefecture', 92),
(2688, 'Dinguiraye Prefecture', 92),
(2689, 'Mamou Prefecture', 92),
(2690, 'L??louma Prefecture', 92),
(2691, 'Kissidougou Prefecture', 92),
(2692, 'Koubia Prefecture', 92),
(2693, 'Kindia Prefecture', 92),
(2694, 'Pita Prefecture', 92),
(2695, 'Kouroussa Prefecture', 92),
(2696, 'Tougu?? Prefecture', 92),
(2697, 'Kankan Region', 92),
(2698, 'Mamou Region', 92),
(2699, 'Boffa Prefecture', 92),
(2700, 'Mali Prefecture', 92),
(2701, 'Kindia Region', 92),
(2702, 'Macenta Prefecture', 92),
(2703, 'Koundara Prefecture', 92),
(2704, 'Kankan Prefecture', 92),
(2705, 'Coyah Prefecture', 92),
(2706, 'Dalaba Prefecture', 92),
(2707, 'Siguiri Prefecture', 92),
(2708, 'Lola Prefecture', 92),
(2709, 'Bok?? Prefecture', 92),
(2710, 'K??rouan?? Prefecture', 92),
(2711, 'Gu??ck??dou Prefecture', 92),
(2712, 'Tombali Region', 93),
(2713, 'Cacheu Region', 93),
(2714, 'Biombo Region', 93),
(2715, 'Quinara Region', 93),
(2716, 'Sul Province', 93),
(2717, 'Norte Province', 93),
(2718, 'Oio Region', 93),
(2719, 'Gab?? Region', 93),
(2720, 'Bafat??', 93),
(2721, 'Leste Province', 93),
(2722, 'Bolama Region', 93),
(2723, 'Woleu-Ntem Province', 79),
(2724, 'Ogoou??-Ivindo Province', 79),
(2725, 'Nyanga Province', 79),
(2726, 'Haut-Ogoou?? Province', 79),
(2727, 'Estuaire Province', 79),
(2728, 'Ogoou??-Maritime Province', 79),
(2729, 'Ogoou??-Lolo Province', 79),
(2730, 'Moyen-Ogoou?? Province', 79),
(2731, 'Ngouni?? Province', 79),
(2732, 'Tshuapa District', 51),
(2733, 'Tanganyika Province', 51),
(2734, 'Haut-Uele', 51),
(2735, 'Kasa??-Oriental', 51),
(2736, 'Orientale Province', 51),
(2737, 'Kasa??-Occidental', 51),
(2738, 'South Kivu', 51),
(2739, 'Nord-Ubangi District', 51),
(2740, 'Kwango District', 51),
(2741, 'Kinshasa', 51),
(2742, 'Katanga Province', 51),
(2743, 'Sankuru District', 51),
(2744, '??quateur', 51),
(2745, 'Maniema', 51),
(2746, 'Bas-Congo province', 51),
(2747, 'Lomami Province', 51),
(2748, 'Sud-Ubangi', 51),
(2749, 'North Kivu', 51),
(2750, 'Haut-Katanga Province', 51),
(2751, 'Ituri Interim Administration', 51),
(2752, 'Mongala District', 51),
(2753, 'Bas-Uele', 51),
(2754, 'Bandundu Province', 51),
(2755, 'Mai-Ndombe Province', 51),
(2756, 'Tshopo District', 51),
(2757, 'Kasa?? District', 51),
(2758, 'Haut-Lomami District', 51),
(2759, 'Kwilu District', 51),
(2760, 'Cuyuni-Mazaruni', 94),
(2761, 'Potaro-Siparuni', 94),
(2762, 'Mahaica-Berbice', 94),
(2763, 'Upper Demerara-Berbice', 94),
(2764, 'Barima-Waini', 94),
(2765, 'Pomeroon-Supenaam', 94),
(2766, 'East Berbice-Corentyne', 94),
(2767, 'Demerara-Mahaica', 94),
(2768, 'Essequibo Islands-West Demerara', 94),
(2769, 'Upper Takutu-Upper Essequibo', 94),
(2770, 'Presidente Hayes Department', 172),
(2771, 'Canindey??', 172),
(2772, 'Guair?? Department', 172),
(2773, 'Caaguaz??', 172),
(2774, 'Paraguar?? Department', 172),
(2775, 'Caazap??', 172),
(2776, 'San Pedro Department', 172),
(2777, 'Central Department', 172),
(2778, 'Itap??a', 172),
(2779, 'Concepci??n Department', 172),
(2780, 'Boquer??n Department', 172),
(2781, '??eembuc?? Department', 172),
(2782, 'Amambay Department', 172),
(2783, 'Cordillera Department', 172),
(2784, 'Alto Paran?? Department', 172),
(2785, 'Alto Paraguay Department', 172),
(2786, 'Misiones Department', 172),
(2787, 'Jaffna District', 208),
(2788, 'Kandy District', 208),
(2789, 'Kalutara District', 208),
(2790, 'Badulla District', 208),
(2791, 'Hambantota District', 208),
(2792, 'Galle District', 208),
(2793, 'Kilinochchi District', 208),
(2794, 'Nuwara Eliya District', 208),
(2795, 'Trincomalee District', 208),
(2796, 'Puttalam District', 208),
(2797, 'Kegalle District', 208),
(2798, 'Central Province', 208),
(2799, 'Ampara District', 208),
(2800, 'North Central Province', 208),
(2801, 'Southern Province', 208),
(2802, 'Western Province', 208),
(2803, 'Sabaragamuwa Province', 208),
(2804, 'Gampaha District', 208),
(2805, 'Mannar District', 208),
(2806, 'Matara District', 208),
(2807, 'Ratnapura district', 208),
(2808, 'Eastern Province', 208),
(2809, 'Vavuniya District', 208),
(2810, 'Matale District', 208),
(2811, 'Uva Province', 208),
(2812, 'Polonnaruwa District', 208),
(2813, 'Northern Province', 208),
(2814, 'Mullaitivu District', 208),
(2815, 'Colombo District', 208),
(2816, 'Anuradhapura District', 208),
(2817, 'North Western Province', 208),
(2818, 'Batticaloa District', 208),
(2819, 'Monaragala District', 208),
(2820, 'Moh??li', 49),
(2821, 'Anjouan', 49),
(2822, 'Grande Comore', 49),
(2823, 'Atacama Region', 44),
(2824, 'Santiago Metropolitan Region', 44),
(2825, 'Coquimbo Region', 44),
(2826, 'Araucan??a Region', 44),
(2827, 'B??o B??o Region', 44),
(2828, 'Ays??n Region', 44),
(2829, 'Arica y Parinacota Region', 44),
(2830, 'Valpara??so', 44),
(2831, '??uble Region', 44),
(2832, 'Antofagasta Region', 44),
(2833, 'Maule Region', 44),
(2834, 'Los R??os Region', 44),
(2835, 'Los Lagos Region', 44),
(2836, 'Magellan and the Chilean Antarctic Region', 44),
(2837, 'Tarapac?? Region', 44),
(2838, 'O\'Higgins', 44),
(2839, 'Commewijne District', 210),
(2840, 'Nickerie District', 210),
(2841, 'Para District', 210),
(2842, 'Coronie District', 210),
(2843, 'Paramaribo District', 210),
(2844, 'Wanica District', 210),
(2845, 'Marowijne District', 210),
(2846, 'Brokopondo District', 210),
(2847, 'Sipaliwini District', 210),
(2848, 'Saramacca District', 210),
(2849, 'Riyadh Region', 194),
(2850, 'Makkah Region', 194),
(2851, 'Al Madinah Region', 194),
(2852, 'Tabuk Region', 194),
(2853, '\'Asir Region', 194),
(2854, 'Northern Borders Region', 194),
(2855, 'Ha\'il Region', 194),
(2856, 'Eastern Province', 194),
(2857, 'Al Jawf Region', 194),
(2858, 'Jizan Region', 194),
(2859, 'Al Bahah Region', 194),
(2860, 'Najran Region', 194),
(2861, 'Al-Qassim Region', 194),
(2862, 'Plateaux Department', 50),
(2863, 'Pointe-Noire', 50),
(2864, 'Cuvette Department', 50),
(2865, 'Likouala Department', 50),
(2866, 'Bouenza Department', 50),
(2867, 'Kouilou Department', 50),
(2868, 'L??koumou Department', 50),
(2869, 'Cuvette-Ouest Department', 50),
(2870, 'Brazzaville', 50),
(2871, 'Sangha Department', 50),
(2872, 'Niari Department', 50),
(2873, 'Pool Department', 50),
(2874, 'Quind??o Department', 48),
(2875, 'Cundinamarca Department', 48),
(2876, 'Choc?? Department', 48),
(2877, 'Norte de Santander Department', 48),
(2878, 'Meta', 48),
(2879, 'Risaralda Department', 48),
(2880, 'Atl??ntico Department', 48),
(2881, 'Arauca Department', 48),
(2882, 'Guain??a Department', 48),
(2883, 'Tolima Department', 48),
(2884, 'Cauca Department', 48),
(2885, 'Vaup??s Department', 48),
(2886, 'Magdalena Department', 48),
(2887, 'Caldas Department', 48),
(2888, 'Guaviare Department', 48),
(2889, 'La Guajira Department', 48),
(2890, 'Antioquia Department', 48),
(2891, 'Caquet?? Department', 48),
(2892, 'Casanare Department', 48),
(2893, 'Bol??var Department', 48),
(2894, 'Vichada Department', 48),
(2895, 'Amazonas Department', 48),
(2896, 'Putumayo Department', 48),
(2897, 'Nari??o Department', 48),
(2898, 'C??rdoba Department', 48),
(2899, 'Cesar Department', 48),
(2900, 'Archipelago of Saint Andr??ws, Providence and Saint Catalina', 48),
(2901, 'Santander Department', 48),
(2902, 'Sucre Department', 48),
(2903, 'Boyac?? Department', 48),
(2904, 'Valle del Cauca Department', 48),
(2905, 'Gal??pagos Province', 64),
(2906, 'Sucumb??os Province', 64),
(2907, 'Pastaza Province', 64),
(2908, 'Tungurahua Province', 64),
(2909, 'Zamora-Chinchipe Province', 64),
(2910, 'Los R??os Province', 64),
(2911, 'Imbabura Province', 64),
(2912, 'Santa Elena Province', 64),
(2913, 'Manab?? Province', 64),
(2914, 'Guayas Province', 64),
(2915, 'Carchi Province', 64),
(2916, 'Napo Province', 64),
(2917, 'Ca??ar Province', 64),
(2918, 'Morona-Santiago Province', 64),
(2919, 'Santo Domingo de los Ts??chilas Province', 64),
(2920, 'Bol??var Province', 64),
(2921, 'Cotopaxi Province', 64),
(2922, 'Esmeraldas', 64),
(2923, 'Azuay Province', 64),
(2924, 'El Oro Province', 64),
(2925, 'Chimborazo Province', 64),
(2926, 'Orellana Province', 64),
(2927, 'Pichincha Province', 64),
(2928, 'Obock Region', 60),
(2929, 'Djibouti', 60),
(2930, 'Dikhil Region', 60),
(2931, 'Tadjourah Region', 60),
(2932, 'Arta Region', 60),
(2933, 'Ali Sabieh Region', 60),
(2934, 'Hama Governorate', 215),
(2935, 'Rif Dimashq Governorate', 215),
(2936, 'As-Suwayda Governorate', 215),
(2937, 'Deir ez-Zor Governorate', 215),
(2938, 'Latakia Governorate', 215),
(2939, 'Damascus Governorate', 215),
(2940, 'Idlib Governorate', 215),
(2941, 'Al-Hasakah Governorate', 215),
(2942, 'Homs Governorate', 215),
(2943, 'Quneitra Governorate', 215),
(2944, 'Al-Raqqah Governorate', 215),
(2945, 'Daraa Governorate', 215),
(2946, 'Aleppo Governorate', 215),
(2947, 'Tartus Governorate', 215),
(2948, 'Fianarantsoa Province', 130),
(2949, 'Toliara Province', 130),
(2950, 'Antsiranana Province', 130),
(2951, 'Antananarivo Province', 130),
(2952, 'Toamasina Province', 130),
(2953, 'Mahajanga Province', 130),
(2954, 'Mogilev Region', 21),
(2955, 'Gomel Region', 21),
(2956, 'Grodno Region', 21),
(2957, 'Minsk Region', 21),
(2958, 'Minsk', 21),
(2959, 'Brest Region', 21),
(2960, 'Vitebsk Region', 21),
(2961, 'Murqub', 124),
(2962, 'Nuqat al Khams', 124),
(2963, 'Zawiya District', 124),
(2964, 'Al Wahat District', 124),
(2965, 'Sabha District', 124),
(2966, 'Derna District', 124),
(2967, 'Murzuq District', 124),
(2968, 'Marj District', 124),
(2969, 'Ghat District', 124),
(2970, 'Jufra', 124),
(2971, 'Tripoli District', 124),
(2972, 'Kufra District', 124),
(2973, 'Wadi al Hayaa District', 124),
(2974, 'Jabal al Gharbi District', 124),
(2975, 'Wadi al Shatii District', 124),
(2976, 'Nalut District', 124),
(2977, 'Sirte District', 124),
(2978, 'Misrata District', 124),
(2979, 'Jafara', 124),
(2980, 'Jabal al Akhdar', 124),
(2981, 'Benghazi', 124),
(2982, 'Ribeira Brava Municipality', 40),
(2983, 'Tarrafal', 40),
(2984, 'Ribeira Grande de Santiago', 40),
(2985, 'Santa Catarina', 40),
(2986, 'S??o Domingos', 40),
(2987, 'Mosteiros', 40),
(2988, 'Praia', 40),
(2989, 'Porto Novo', 40),
(2990, 'S??o Miguel', 40),
(2991, 'Maio Municipality', 40),
(2992, 'Sotavento Islands', 40),
(2993, 'S??o Louren??o dos ??rg??os', 40),
(2994, 'Barlavento Islands', 40),
(2995, 'Santa Catarina do Fogo', 40),
(2996, 'Brava', 40),
(2997, 'Paul', 40),
(2998, 'Sal', 40),
(2999, 'Boa Vista', 40),
(3000, 'S??o Filipe', 40),
(3001, 'S??o Vicente', 40),
(3002, 'Ribeira Grande', 40),
(3003, 'Tarrafal de S??o Nicolau', 40),
(3004, 'Santa Cruz', 40),
(3005, 'Schleswig-Holstein', 82),
(3006, 'Baden-W??rttemberg', 82),
(3007, 'Mecklenburg-Vorpommern', 82),
(3008, 'Lower Saxony', 82),
(3009, 'Bavaria', 82),
(3010, 'Berlin', 82),
(3011, 'Saxony-Anhalt', 82),
(3013, 'Brandenburg', 82),
(3014, 'Bremen', 82),
(3015, 'Thuringia', 82),
(3016, 'Hamburg', 82),
(3017, 'North Rhine-Westphalia', 82),
(3018, 'Hesse', 82),
(3019, 'Rhineland-Palatinate', 82),
(3020, 'Saarland', 82),
(3021, 'Saxony', 82),
(3022, 'Mafeteng District', 122),
(3023, 'Mohale\'s Hoek District', 122),
(3024, 'Mokhotlong District', 122),
(3025, 'Qacha\'s Nek District', 122),
(3026, 'Leribe District', 122),
(3027, 'Quthing District', 122),
(3028, 'Maseru District', 122),
(3029, 'Butha-Buthe District', 122),
(3030, 'Berea District', 122),
(3031, 'Thaba-Tseka District', 122),
(3032, 'Montserrado County', 123),
(3033, 'River Cess County', 123),
(3034, 'Bong County', 123),
(3035, 'Sinoe County', 123),
(3036, 'Grand Cape Mount County', 123),
(3037, 'Lofa County', 123),
(3038, 'River Gee County', 123),
(3039, 'Grand Gedeh County', 123),
(3040, 'Grand Bassa County', 123),
(3041, 'Bomi County', 123),
(3042, 'Maryland County', 123),
(3043, 'Margibi County', 123),
(3044, 'Gbarpolu County', 123),
(3045, 'Grand Kru County', 123),
(3046, 'Nimba', 123),
(3047, 'Ad Dhahirah Governorate', 166),
(3048, 'Al Batinah North Governorate', 166),
(3049, 'Al Batinah South Governorate', 166),
(3050, 'Al Batinah Region', 166),
(3051, 'Ash Sharqiyah Region', 166),
(3052, 'Musandam Governorate', 166),
(3053, 'Ash Sharqiyah North Governorate', 166),
(3054, 'Ash Sharqiyah South Governorate', 166),
(3055, 'Muscat Governorate', 166),
(3056, 'Al Wusta Governorate', 166),
(3057, 'Dhofar Governorate', 166),
(3058, 'Ad Dakhiliyah Governorate', 166),
(3059, 'Al Buraimi Governorate', 166),
(3060, 'Ngamiland', 29),
(3061, 'Ghanzi District', 29),
(3062, 'Kgatleng District', 29),
(3063, 'Southern District', 29),
(3064, 'South-East District', 29),
(3065, 'North-West District', 29),
(3066, 'Kgalagadi District', 29),
(3067, 'Central District', 29),
(3068, 'North-East District', 29),
(3069, 'Kweneng District', 29),
(3070, 'Collines Department', 24),
(3071, 'Kouffo Department', 24),
(3072, 'Donga Department', 24),
(3073, 'Zou Department', 24),
(3074, 'Plateau Department', 24),
(3075, 'Mono Department', 24),
(3076, 'Atakora Department', 24),
(3077, 'Alibori Department', 24),
(3078, 'Borgou Department', 24),
(3079, 'Atlantique Department', 24),
(3080, 'Ou??m?? Department', 24),
(3081, 'Littoral Department', 24),
(3082, 'Machinga District', 131),
(3083, 'Zomba District', 131),
(3084, 'Mwanza District', 131),
(3085, 'Nsanje District', 131),
(3086, 'Salima District', 131),
(3087, 'Chitipa district', 131),
(3088, 'Ntcheu District', 131),
(3089, 'Rumphi District', 131),
(3090, 'Dowa District', 131),
(3091, 'Karonga District', 131),
(3092, 'Central Region', 131),
(3093, 'Likoma District', 131),
(3094, 'Kasungu District', 131),
(3095, 'Nkhata Bay District', 131),
(3096, 'Balaka District', 131),
(3097, 'Dedza District', 131),
(3098, 'Thyolo District', 131),
(3099, 'Mchinji District', 131),
(3100, 'Nkhotakota District', 131),
(3101, 'Lilongwe District', 131),
(3102, 'Blantyre District', 131),
(3103, 'Mulanje District', 131),
(3104, 'Mzimba District', 131),
(3105, 'Northern Region', 131),
(3106, 'Southern Region', 131),
(3107, 'Chikwawa District', 131),
(3108, 'Phalombe District', 131),
(3109, 'Chiradzulu District', 131),
(3110, 'Mangochi District', 131),
(3111, 'Ntchisi District', 131),
(3112, 'K??n??dougou Province', 35),
(3113, 'Namentenga Province', 35),
(3114, 'Sahel Region', 35),
(3115, 'Centre-Ouest Region', 35),
(3116, 'Nahouri Province', 35),
(3117, 'Passor?? Province', 35),
(3118, 'Zoundw??ogo Province', 35),
(3119, 'Sissili Province', 35),
(3120, 'Banwa Province', 35),
(3121, 'Bougouriba Province', 35),
(3122, 'Gnagna Province', 35),
(3123, 'Mouhoun', 35),
(3124, 'Yagha Province', 35),
(3125, 'Plateau-Central Region', 35),
(3126, 'Sanmatenga Province', 35),
(3127, 'Centre-Nord Region', 35),
(3128, 'Tapoa Province', 35),
(3129, 'Houet Province', 35),
(3130, 'Zondoma Province', 35),
(3131, 'Boulgou', 35),
(3132, 'Komondjari Province', 35),
(3133, 'Koulp??logo Province', 35),
(3134, 'Tuy Province', 35),
(3135, 'Ioba Province', 35),
(3136, 'Centre', 35),
(3137, 'Sourou Province', 35),
(3138, 'Boucle du Mouhoun Region', 35),
(3139, 'S??no Province', 35),
(3140, 'Sud-Ouest Region', 35),
(3141, 'Oubritenga Province', 35),
(3142, 'Nayala Province', 35),
(3143, 'Gourma Province', 35),
(3144, 'Oudalan Province', 35),
(3145, 'Ziro Province', 35),
(3146, 'Kossi Province', 35),
(3147, 'Kourw??ogo Province', 35),
(3148, 'Ganzourgou Province', 35),
(3149, 'Centre-Sud Region', 35),
(3150, 'Yatenga Province', 35),
(3151, 'Loroum Province', 35),
(3152, 'Baz??ga Province', 35),
(3153, 'Cascades Region', 35),
(3154, 'Sangui?? Province', 35),
(3155, 'Bam Province', 35),
(3156, 'Noumbiel Province', 35),
(3157, 'Kompienga Province', 35),
(3158, 'Est Region', 35),
(3159, 'L??raba Province', 35),
(3160, 'Bal?? Province', 35),
(3161, 'Kouritenga Province', 35),
(3162, 'Centre-Est Region', 35),
(3163, 'Poni Province', 35),
(3164, 'Nord Region, Burkina Faso', 35),
(3165, 'Hauts-Bassins Region', 35),
(3166, 'Soum Province', 35),
(3167, 'Como?? Province', 35),
(3168, 'Kadiogo Province', 35),
(3169, 'Islamabad Capital Territory', 167),
(3170, 'Gilgit-Baltistan', 167),
(3171, 'Khyber Pakhtunkhwa', 167),
(3172, 'Azad Kashmir', 167),
(3173, 'Federally Administered Tribal Areas', 167),
(3174, 'Balochistan', 167),
(3175, 'Sindh', 167),
(3176, 'Punjab', 167),
(3177, 'Al Rayyan Municipality', 179),
(3178, 'Al-Shahaniya', 179),
(3179, 'Al Wakrah', 179),
(3180, 'Madinat ash Shamal', 179),
(3181, 'Doha', 179),
(3182, 'Al Daayen', 179),
(3183, 'Al Khor', 179),
(3184, 'Umm Salal Municipality', 179),
(3185, 'Rumonge Province', 36),
(3186, 'Muyinga Province', 36),
(3187, 'Mwaro Province', 36),
(3188, 'Makamba Province', 36),
(3189, 'Rutana Province', 36),
(3190, 'Cibitoke Province', 36),
(3191, 'Ruyigi Province', 36),
(3192, 'Kayanza Province', 36),
(3193, 'Muramvya Province', 36),
(3194, 'Karuzi Province', 36),
(3195, 'Kirundo Province', 36),
(3196, 'Bubanza Province', 36),
(3197, 'Gitega Province', 36),
(3198, 'Bujumbura Mairie Province', 36),
(3199, 'Ngozi Province', 36),
(3200, 'Bujumbura Rural Province', 36),
(3201, 'Cankuzo Province', 36),
(3202, 'Bururi Province', 36),
(3203, 'Flores Department', 235),
(3204, 'San Jos?? Department', 235),
(3205, 'Artigas Department', 235),
(3206, 'Maldonado Department', 235),
(3207, 'Rivera Department', 235),
(3208, 'Colonia Department', 235),
(3209, 'Durazno Department', 235),
(3210, 'R??o Negro Department', 235),
(3211, 'Cerro Largo Department', 235),
(3212, 'Paysand?? Department', 235),
(3213, 'Canelones Department', 235),
(3214, 'Treinta y Tres Department', 235),
(3215, 'Lavalleja Department', 235),
(3216, 'Rocha Department', 235),
(3217, 'Florida Department', 235),
(3218, 'Montevideo Department', 235),
(3219, 'Soriano Department', 235),
(3220, 'Salto Department', 235),
(3221, 'Tacuaremb?? Department', 235),
(3222, 'Kafr el-Sheikh Governorate', 65),
(3223, 'Cairo Governorate', 65),
(3224, 'Damietta Governorate', 65),
(3225, 'Aswan Governorate', 65),
(3226, 'Sohag Governorate', 65),
(3227, 'North Sinai Governorate', 65),
(3228, 'Monufia Governorate', 65),
(3229, 'Port Said Governorate', 65),
(3230, 'Beni Suef Governorate', 65),
(3231, 'Matrouh Governorate', 65),
(3232, 'Qalyubia Governorate', 65),
(3233, 'Suez Governorate', 65),
(3234, 'Gharbia Governorate', 65),
(3235, 'Alexandria Governorate', 65),
(3236, 'Asyut Governorate', 65),
(3237, 'South Sinai Governorate', 65),
(3238, 'Faiyum Governorate', 65),
(3239, 'Giza Governorate', 65),
(3240, 'Red Sea Governorate', 65),
(3241, 'Beheira Governorate', 65),
(3242, 'Luxor Governorate', 65),
(3243, 'Minya Governorate', 65),
(3244, 'Ismailia Governorate', 65),
(3245, 'Dakahlia Governorate', 65),
(3246, 'New Valley Governorate', 65),
(3247, 'Qena Governorate', 65),
(3248, 'Agal??ga', 140),
(3249, 'Rodrigues', 140),
(3250, 'Pamplemousses District', 140),
(3251, 'Cargados Carajos', 140),
(3252, 'Vacoas-Phoenix', 140),
(3253, 'Moka District', 140),
(3254, 'Flacq District', 140),
(3255, 'Curepipe', 140),
(3256, 'Port Louis', 140),
(3257, 'Savanne District', 140),
(3258, 'Quatre Bornes', 140),
(3259, 'Rivi??re Noire District', 140),
(3260, 'Port Louis District', 140),
(3261, 'Rivi??re du Rempart District', 140),
(3262, 'Beau Bassin-Rose Hill', 140),
(3263, 'Plaines Wilhems District', 140),
(3264, 'Grand Port District', 140),
(3265, 'Guelmim Province', 149),
(3266, 'Aousserd Province', 149),
(3267, 'Al Hoce??ma Province', 149),
(3268, 'Larache Province', 149),
(3269, 'Ouarzazate Province', 149),
(3270, 'Boulemane Province', 149),
(3271, 'Oriental', 149),
(3272, 'B??ni-Mellal Province', 149),
(3273, 'Sidi Youssef Ben Ali', 149),
(3274, 'Chichaoua Province', 149),
(3275, 'Boujdour Province', 149),
(3276, 'Kh??misset Province', 149),
(3277, 'Tiznit Province', 149),
(3278, 'B??ni Mellal-Kh??nifra', 149),
(3279, 'Sidi Kacem Province', 149),
(3280, 'El Jadida Province', 149),
(3281, 'Nador Province', 149),
(3282, 'Settat Province', 149),
(3283, 'Zagora Province', 149),
(3284, 'Mediouna Province', 149),
(3285, 'Berkane Province', 149),
(3286, 'Tan-Tan Province', 149),
(3287, 'Nouaceur Province', 149),
(3288, 'Marrakesh-Safi', 149),
(3289, 'Sefrou Province', 149),
(3290, 'Dr??a-Tafilalet', 149),
(3291, 'El Hajeb Province', 149),
(3292, 'Es Semara Province', 149),
(3293, 'La??youne Province', 149),
(3294, 'Inezgane-A??t Melloul Prefecture', 149),
(3295, 'Souss-Massa', 149),
(3296, 'Taza Province', 149),
(3297, 'Assa-Zag Province', 149),
(3298, 'La??youne-Sakia El Hamra', 149),
(3299, 'Errachidia Province', 149),
(3300, 'Fahs Anjra Province', 149),
(3301, 'Figuig Province', 149),
(3302, 'Shtouka Ait Baha Province', 149),
(3303, 'Casablanca-Settat', 149),
(3304, 'Ben Slimane Province', 149),
(3305, 'Guelmim-Oued Noun', 149),
(3306, 'Dakhla-Oued Ed-Dahab', 149),
(3307, 'Jerada Province', 149),
(3308, 'K??nitra Province', 149),
(3309, 'Kelaat Sraghna Province', 149),
(3310, 'Chefchaouen Province', 149),
(3311, 'Safi Province', 149),
(3312, 'Tata Province', 149),
(3313, 'F??s-Mekn??s', 149),
(3314, 'Taroudant Province', 149),
(3315, 'Moulay Yacoub Province', 149),
(3316, 'Essaouira Province', 149),
(3317, 'Kh??nifra Province', 149),
(3318, 'T??touan Province', 149),
(3319, 'Oued Ed-Dahab Province', 149),
(3320, 'Al Haouz Province', 149),
(3321, 'Azilal Province', 149),
(3322, 'Taourirt Province', 149),
(3323, 'Taounate Province', 149),
(3324, 'Tanger-T??touan-Al Hoce??ma', 149),
(3325, 'Ifrane Province', 149),
(3326, 'Khouribga Province', 149),
(3327, 'Cabo Delgado Province', 150),
(3328, 'Zambezia Province', 150),
(3329, 'Gaza Province', 150),
(3330, 'Inhambane Province', 150),
(3331, 'Sofala Province', 150),
(3332, 'Maputo Province', 150),
(3333, 'Niassa Province', 150),
(3334, 'Tete Province', 150),
(3335, 'Maputo', 150),
(3336, 'Nampula Province', 150),
(3337, 'Manica Province', 150),
(3338, 'Hodh Ech Chargui Region', 139),
(3339, 'Brakna Region', 139),
(3340, 'Tiris Zemmour Region', 139),
(3341, 'Gorgol Region', 139),
(3342, 'Inchiri Region', 139),
(3343, 'Nouakchott-Nord Region', 139),
(3344, 'Adrar Region', 139),
(3345, 'Tagant Region', 139),
(3346, 'Dakhlet Nouadhibou', 139),
(3347, 'Nouakchott-Sud Region', 139),
(3348, 'Trarza Region', 139),
(3349, 'Assaba Region', 139),
(3350, 'Guidimaka Region', 139),
(3351, 'Hodh El Gharbi Region', 139),
(3352, 'Nouakchott-Ouest Region', 139),
(3353, 'Western Tobago', 223),
(3354, 'Couva-Tabaquite-Talparo Regional Corporation', 223),
(3355, 'Eastern Tobago', 223),
(3356, 'Rio Claro-Mayaro Regional Corporation', 223),
(3357, 'San Juan-Laventille Regional Corporation', 223),
(3358, 'Tunapuna-Piarco Regional Corporation', 223),
(3359, 'San Fernando', 223),
(3360, 'Point Fortin', 223),
(3361, 'Sangre Grande Regional Corporation', 223),
(3362, 'Arima', 223),
(3363, 'Port of Spain', 223),
(3364, 'Siparia Regional Corporation', 223),
(3365, 'Penal-Debe Regional Corporation', 223),
(3366, 'Chaguanas', 223),
(3367, 'Diego Martin Regional Corporation', 223),
(3368, 'Princes Town Regional Corporation', 223),
(3369, 'Mary Region', 226),
(3370, 'Lebap Region', 226),
(3371, 'Ashgabat', 226),
(3372, 'Balkan Region', 226),
(3373, 'Da??oguz Region', 226),
(3374, 'Ahal Region', 226),
(3375, 'Beni Department', 27),
(3376, 'Oruro Department', 27),
(3377, 'Santa Cruz Department', 27),
(3378, 'Tarija Department', 27),
(3379, 'Pando Department', 27),
(3380, 'La Paz Department', 27),
(3381, 'Cochabamba Department', 27),
(3382, 'Chuquisaca Department', 27),
(3383, 'Potos?? Department', 27),
(3384, 'Saint George Parish', 188),
(3385, 'Saint Patrick Parish', 188),
(3386, 'Saint Andrew Parish', 188),
(3387, 'Saint David Parish', 188),
(3388, 'Grenadines Parish', 188),
(3389, 'Charlotte Parish', 188),
(3390, 'Sharjah Emirate', 231),
(3391, 'Dubai', 231),
(3392, 'Umm al-Quwain', 231),
(3393, 'Fujairah', 231),
(3394, 'Ras al-Khaimah', 231),
(3395, 'Ajman Emirate', 231),
(3396, 'Abu Dhabi Emirate', 231),
(3397, 'districts of Republican Subordination', 217),
(3398, 'Khatlon Province', 217),
(3399, 'Gorno-Badakhshan Autonomous Province', 217),
(3400, 'Sughd Province', 217),
(3401, 'Tainan County', 216),
(3402, 'Yilan County', 216),
(3403, 'Penghu County', 216),
(3404, 'Changhua County', 216),
(3405, 'Pingtung County', 216),
(3406, 'Taichung', 216),
(3407, 'Nantou County', 216);
INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(3408, 'Chiayi County', 216),
(3409, 'Kaohsiung County', 216),
(3410, 'Taitung County', 216),
(3411, 'Hualien County', 216),
(3412, 'Kaohsiung', 216),
(3413, 'Miaoli County', 216),
(3414, 'Taichung County', 216),
(3415, 'Kinmen', 216),
(3416, 'Yunlin County', 216),
(3417, 'Hsinchu', 216),
(3418, 'Chiayi City', 216),
(3419, 'Taoyuan City', 216),
(3420, 'Lienchiang County', 216),
(3421, 'Tainan', 216),
(3422, 'Taipei', 216),
(3423, 'Hsinchu County', 216),
(3424, 'Northern Red Sea Region', 68),
(3425, 'Anseba Region', 68),
(3426, 'Maekel Region', 68),
(3427, 'Debub Region', 68),
(3428, 'Gash-Barka Region', 68),
(3429, 'Southern Red Sea Region', 68),
(3430, 'Southern Peninsula Region', 100),
(3431, 'Capital Region', 100),
(3432, 'Westfjords', 100),
(3433, 'Eastern Region', 100),
(3434, 'Southern Region', 100),
(3435, 'Northwestern Region', 100),
(3436, 'Western Region', 100),
(3437, 'Northeastern Region', 100),
(3438, 'R??o Muni', 67),
(3439, 'Ki??-Ntem Province', 67),
(3440, 'Wele-Nzas Province', 67),
(3441, 'Litoral Province', 67),
(3442, 'Insular Region', 67),
(3443, 'Bioko Sur Province', 67),
(3444, 'Annob??n Province', 67),
(3445, 'Centro Sur Province', 67),
(3446, 'Bioko Norte Province', 67),
(3447, 'Chihuahua', 142),
(3448, 'Oaxaca', 142),
(3449, 'Sinaloa', 142),
(3450, 'M??xico', 142),
(3451, 'Chiapas', 142),
(3452, 'Nuevo Le??n', 142),
(3453, 'Durango', 142),
(3454, 'Tabasco', 142),
(3455, 'Quer??taro', 142),
(3456, 'Aguascalientes', 142),
(3457, 'Baja California', 142),
(3458, 'Tlaxcala', 142),
(3459, 'Guerrero', 142),
(3460, 'Baja California Sur', 142),
(3461, 'San Luis Potos??', 142),
(3462, 'Zacatecas', 142),
(3463, 'Tamaulipas', 142),
(3464, 'Veracruz', 142),
(3465, 'Morelos', 142),
(3466, 'Yucat??n', 142),
(3467, 'Quintana Roo', 142),
(3468, 'Sonora', 142),
(3469, 'Guanajuato', 142),
(3470, 'Hidalgo', 142),
(3471, 'Coahuila', 142),
(3472, 'Colima', 142),
(3473, 'Mexico City', 142),
(3474, 'Michoac??n', 142),
(3475, 'Campeche', 142),
(3476, 'Puebla', 142),
(3477, 'Nayarit', 142),
(3478, 'Krabi', 219),
(3479, 'Ranong', 219),
(3480, 'Nong Bua Lam Phu', 219),
(3481, 'Samut Prakan', 219),
(3482, 'Surat Thani', 219),
(3483, 'Lamphun', 219),
(3484, 'Nong Khai', 219),
(3485, 'Khon Kaen', 219),
(3486, 'Chanthaburi', 219),
(3487, 'Saraburi', 219),
(3488, 'Phatthalung', 219),
(3489, 'Uttaradit', 219),
(3490, 'Sing Buri', 219),
(3491, 'Chiang Mai', 219),
(3492, 'Nakhon Sawan', 219),
(3493, 'Yala', 219),
(3494, 'Phra Nakhon Si Ayutthaya', 219),
(3495, 'Nonthaburi', 219),
(3496, 'Trat', 219),
(3497, 'Nakhon Ratchasima', 219),
(3498, 'Chiang Rai', 219),
(3499, 'Ratchaburi', 219),
(3500, 'Pathum Thani', 219),
(3501, 'Sakon Nakhon', 219),
(3502, 'Samut Songkhram', 219),
(3503, 'Nakhon Pathom', 219),
(3504, 'Samut Sakhon', 219),
(3505, 'Mae Hong Son', 219),
(3506, 'Phitsanulok', 219),
(3507, 'Pattaya', 219),
(3508, 'Prachuap Khiri Khan', 219),
(3509, 'Loei', 219),
(3510, 'Roi Et', 219),
(3511, 'Kanchanaburi', 219),
(3512, 'Ubon Ratchathani', 219),
(3513, 'Chon Buri', 219),
(3514, 'Phichit', 219),
(3515, 'Phetchabun', 219),
(3516, 'Kamphaeng Phet', 219),
(3517, 'Maha Sarakham', 219),
(3518, 'Rayong', 219),
(3519, 'Ang Thong', 219),
(3520, 'Nakhon Si Thammarat', 219),
(3521, 'Yasothon', 219),
(3522, 'Chai Nat', 219),
(3523, 'Amnat Charoen', 219),
(3524, 'Suphanburi', 219),
(3525, 'Tak', 219),
(3526, 'Chumphon', 219),
(3527, 'Udon Thani', 219),
(3528, 'Phrae', 219),
(3529, 'Sa Kaeo', 219),
(3530, 'Nan', 219),
(3531, 'Surin', 219),
(3532, 'Phetchaburi', 219),
(3533, 'Bueng Kan', 219),
(3534, 'Buri Ram', 219),
(3535, 'Nakhon Nayok', 219),
(3536, 'Phuket', 219),
(3537, 'Satun', 219),
(3538, 'Phayao', 219),
(3539, 'Songkhla', 219),
(3540, 'Pattani', 219),
(3541, 'Trang', 219),
(3542, 'Prachin Buri', 219),
(3543, 'Lopburi', 219),
(3544, 'Lampang', 219),
(3545, 'Sukhothai', 219),
(3546, 'Mukdahan', 219),
(3547, 'Si Sa Ket', 219),
(3548, 'Nakhon Phanom', 219),
(3549, 'Phang Nga', 219),
(3550, 'Kalasin', 219),
(3551, 'Uthai Thani', 219),
(3552, 'Chachoengsao', 219),
(3553, 'Narathiwat', 219),
(3554, 'Bangkok', 219),
(3555, 'Hiiu County', 69),
(3556, 'Viljandi County', 69),
(3557, 'Tartu County', 69),
(3558, 'Valga County', 69),
(3559, 'Rapla County', 69),
(3560, 'V??ru County', 69),
(3561, 'Saare County', 69),
(3562, 'P??rnu County', 69),
(3563, 'P??lva County', 69),
(3564, 'L????ne-Viru County', 69),
(3565, 'J??geva County', 69),
(3566, 'J??rva County', 69),
(3567, 'Harju County', 69),
(3568, 'L????ne County', 69),
(3569, 'Ida-Viru County', 69),
(3570, 'Moyen-Chari Region', 43),
(3571, 'Mayo-Kebbi Ouest Region', 43),
(3572, 'Sila Region', 43),
(3573, 'Hadjer-Lamis', 43),
(3574, 'Borkou', 43),
(3575, 'Ennedi-Est', 43),
(3576, 'Gu??ra Region', 43),
(3577, 'Lac Region', 43),
(3578, 'Ennedi Region', 43),
(3579, 'Tandjil?? Region', 43),
(3580, 'Mayo-Kebbi Est Region', 43),
(3581, 'Wadi Fira Region', 43),
(3582, 'Ouadda?? Region', 43),
(3583, 'Bahr el Gazel', 43),
(3584, 'Ennedi-Ouest', 43),
(3585, 'Logone Occidental Region', 43),
(3586, 'N\'Djamena', 43),
(3587, 'Tibesti Region', 43),
(3588, 'Kanem Region', 43),
(3589, 'Mandoul Region', 43),
(3590, 'Batha Region', 43),
(3591, 'Logone Oriental Region', 43),
(3592, 'Salamat Region', 43),
(3593, 'Berry Islands', 17),
(3594, 'Nichollstown and Berry Islands', 17),
(3595, 'Green Turtle Cay', 17),
(3596, 'Central Eleuthera', 17),
(3597, 'Governor\'s Harbour', 17),
(3598, 'High Rock', 17),
(3599, 'West Grand Bahama', 17),
(3600, 'Rum Cay District', 17),
(3601, 'Acklins', 17),
(3602, 'North Eleuthera', 17),
(3603, 'Central Abaco', 17),
(3604, 'Marsh Harbour', 17),
(3605, 'Black Point', 17),
(3606, 'Sandy Point', 17),
(3607, 'South Eleuthera', 17),
(3608, 'South Abaco', 17),
(3609, 'Inagua', 17),
(3610, 'Long Island', 17),
(3611, 'Cat Island', 17),
(3612, 'Exuma', 17),
(3613, 'Harbour Island', 17),
(3614, 'East Grand Bahama', 17),
(3615, 'Ragged Island', 17),
(3616, 'North Abaco', 17),
(3617, 'North Andros', 17),
(3618, 'Kemps Bay', 17),
(3619, 'Fresh Creek', 17),
(3620, 'San Salvador and Rum Cay', 17),
(3621, 'Crooked Island', 17),
(3622, 'South Andros', 17),
(3623, 'Rock Sound', 17),
(3624, 'Hope Town', 17),
(3625, 'Mangrove Cay', 17),
(3626, 'Freeport', 17),
(3627, 'San Salvador Island', 17),
(3628, 'Acklins and Crooked Islands', 17),
(3629, 'Bimini', 17),
(3630, 'Spanish Wells', 17),
(3631, 'Central Andros', 17),
(3632, 'Grand Cay', 17),
(3633, 'Mayaguana District', 17),
(3634, 'San Juan Province', 11),
(3635, 'Santiago del Estero Province', 11),
(3636, 'San Luis Province', 11),
(3637, 'Tucum??n Province', 11),
(3638, 'Corrientes', 11),
(3639, 'R??o Negro Province', 11),
(3640, 'Chaco Province', 11),
(3641, 'Santa Fe Province', 11),
(3642, 'C??rdoba Province', 11),
(3643, 'Salta Province', 11),
(3644, 'Misiones Province', 11),
(3645, 'Jujuy Province', 11),
(3646, 'Mendoza', 11),
(3647, 'Catamarca Province', 11),
(3648, 'Neuqu??n Province', 11),
(3649, 'Santa Cruz Province', 11),
(3650, 'Tierra del Fuego Province', 11),
(3651, 'Chubut Province', 11),
(3652, 'Formosa Province', 11),
(3653, 'La Rioja Province', 11),
(3654, 'Entre R??os Province', 11),
(3655, 'La Pampa', 11),
(3656, 'Buenos Aires Province', 11),
(3657, 'Quich?? Department', 90),
(3658, 'Jalapa Department', 90),
(3659, 'Izabal Department', 90),
(3660, 'Suchitep??quez Department', 90),
(3661, 'Solol?? Department', 90),
(3662, 'El Progreso Department', 90),
(3663, 'Totonicap??n Department', 90),
(3664, 'Retalhuleu Department', 90),
(3665, 'Santa Rosa Department', 90),
(3666, 'Chiquimula Department', 90),
(3667, 'San Marcos Department', 90),
(3668, 'Quetzaltenango Department', 90),
(3669, 'Pet??n Department', 90),
(3670, 'Huehuetenango Department', 90),
(3671, 'Alta Verapaz Department', 90),
(3672, 'Guatemala Department', 90),
(3673, 'Jutiapa Department', 90),
(3674, 'Baja Verapaz Department', 90),
(3675, 'Chimaltenango Department', 90),
(3676, 'Sacatep??quez Department', 90),
(3677, 'Escuintla Department', 90),
(3678, 'Madre de Dios', 173),
(3679, 'Huancavelica', 173),
(3680, '??ncash', 173),
(3681, 'Arequipa', 173),
(3682, 'Puno', 173),
(3683, 'La Libertad', 173),
(3684, 'Ucayali', 173),
(3685, 'Amazonas', 173),
(3686, 'Pasco', 173),
(3687, 'Huanuco', 173),
(3688, 'Cajamarca', 173),
(3689, 'Tumbes', 173),
(3691, 'Cusco', 173),
(3692, 'Ayacucho', 173),
(3693, 'Jun??n', 173),
(3694, 'San Mart??n', 173),
(3695, 'Lima', 173),
(3696, 'Tacna', 173),
(3697, 'Piura', 173),
(3698, 'Moquegua', 173),
(3699, 'Apur??mac', 173),
(3700, 'Ica', 173),
(3701, 'Callao', 173),
(3702, 'Lambayeque', 173),
(3703, 'Redonda', 10),
(3704, 'Saint Peter Parish', 10),
(3705, 'Saint Paul Parish', 10),
(3706, 'Saint John Parish', 10),
(3707, 'Saint Mary Parish', 10),
(3708, 'Barbuda', 10),
(3709, 'Saint George Parish', 10),
(3710, 'Saint Philip Parish', 10),
(3711, 'South Ba??ka District', 196),
(3712, 'Pirot District', 196),
(3713, 'South Banat District', 196),
(3714, 'North Ba??ka District', 196),
(3715, 'Jablanica District', 196),
(3716, 'Central Banat District', 196),
(3717, 'Bor District', 196),
(3718, 'Toplica District', 196),
(3719, 'Ma??va District', 196),
(3720, 'Rasina District', 196),
(3721, 'P??inja District', 196),
(3722, 'Ni??ava District', 196),
(3723, 'Prizren District', 248),
(3724, 'Kolubara District', 196),
(3725, 'Ra??ka District', 196),
(3726, 'West Ba??ka District', 196),
(3727, 'Moravica District', 196),
(3728, 'Belgrade', 196),
(3729, 'Zlatibor District', 196),
(3731, 'Zaje??ar District', 196),
(3732, 'Brani??evo District', 196),
(3733, 'Vojvodina', 196),
(3734, '??umadija District', 196),
(3736, 'North Banat District', 196),
(3737, 'Pomoravlje District', 196),
(3738, 'Pe?? District', 248),
(3740, 'Srem District', 196),
(3741, 'Podunavlje District', 196),
(3742, 'Westmoreland Parish', 108),
(3743, 'Saint Elizabeth Parish', 108),
(3744, 'Saint Ann Parish', 108),
(3745, 'Saint James Parish', 108),
(3746, 'Saint Catherine Parish', 108),
(3747, 'Saint Mary Parish', 108),
(3748, 'Kingston Parish', 108),
(3749, 'Hanover Parish', 108),
(3750, 'Saint Thomas Parish', 108),
(3751, 'Saint Andrew', 108),
(3752, 'Portland Parish', 108),
(3753, 'Clarendon Parish', 108),
(3754, 'Manchester Parish', 108),
(3755, 'Trelawny Parish', 108),
(3756, 'Dennery Quarter', 186),
(3757, 'Anse la Raye Quarter', 186),
(3758, 'Castries Quarter', 186),
(3759, 'Laborie Quarter', 186),
(3760, 'Choiseul Quarter', 186),
(3761, 'Canaries', 186),
(3762, 'Micoud Quarter', 186),
(3763, 'Vieux Fort Quarter', 186),
(3764, 'Soufri??re Quarter', 186),
(3765, 'Praslin Quarter', 186),
(3766, 'Gros Islet Quarter', 186),
(3767, 'Dauphin Quarter', 186),
(3768, 'H??ng Y??n', 240),
(3769, '?????ng Th??p', 240),
(3770, 'B?? R???a-V??ng T??u', 240),
(3771, 'Thanh H??a', 240),
(3772, 'Kon Tum', 240),
(3773, '??i???n Bi??n', 240),
(3774, 'V??nh Ph??c', 240),
(3775, 'Th??i B??nh', 240),
(3776, 'Qu???ng Nam', 240),
(3777, 'H???u Giang', 240),
(3778, 'C?? Mau', 240),
(3779, 'H?? Giang', 240),
(3780, 'Ngh??? An', 240),
(3781, 'Ti???n Giang', 240),
(3782, 'Cao B???ng', 240),
(3783, 'Haiphong', 240),
(3784, 'Y??n B??i', 240),
(3785, 'B??nh D????ng', 240),
(3786, 'Ninh B??nh', 240),
(3787, 'B??nh Thu???n', 240),
(3788, 'Ninh Thu???n', 240),
(3789, 'Nam ?????nh', 240),
(3790, 'V??nh Long', 240),
(3791, 'B???c Ninh', 240),
(3792, 'L???ng S??n', 240),
(3793, 'Kh??nh H??a', 240),
(3794, 'An Giang', 240),
(3795, 'Tuy??n Quang', 240),
(3796, 'B???n Tre', 240),
(3797, 'B??nh Ph?????c', 240),
(3798, 'Th???a Thi??n-Hu???', 240),
(3799, 'H??a B??nh', 240),
(3800, 'Ki??n Giang', 240),
(3801, 'Ph?? Th???', 240),
(3802, 'H?? Nam', 240),
(3803, 'Qu???ng Tr???', 240),
(3804, 'B???c Li??u', 240),
(3805, 'Tr?? Vinh', 240),
(3806, 'Da Nang', 240),
(3807, 'Th??i Nguy??n', 240),
(3808, 'Long An', 240),
(3809, 'Qu???ng B??nh', 240),
(3810, 'Hanoi', 240),
(3811, 'Ho Chi Minh City', 240),
(3812, 'S??n La', 240),
(3813, 'Gia Lai', 240),
(3814, 'Qu???ng Ninh', 240),
(3815, 'B???c Giang', 240),
(3816, 'H?? T??nh', 240),
(3817, 'L??o Cai', 240),
(3818, 'L??m ?????ng', 240),
(3819, 'S??c Tr??ng', 240),
(3820, 'H?? T??y', 240),
(3821, '?????ng Nai', 240),
(3822, 'B???c K???n', 240),
(3823, '?????k N??ng', 240),
(3824, 'Ph?? Y??n', 240),
(3825, 'Lai Ch??u', 240),
(3826, 'T??y Ninh', 240),
(3827, 'H???i D????ng', 240),
(3828, 'Qu???ng Ng??i', 240),
(3829, '?????k L???k', 240),
(3830, 'B??nh ?????nh', 240),
(3831, 'Saint Peter Basseterre Parish', 185),
(3832, 'Nevis', 185),
(3833, 'Christ Church Nichola Town Parish', 185),
(3834, 'Saint Paul Capisterre Parish', 185),
(3835, 'Saint James Windward Parish', 185),
(3836, 'Saint Anne Sandy Point Parish', 185),
(3837, 'Saint George Gingerland Parish', 185),
(3838, 'Saint Paul Charlestown Parish', 185),
(3839, 'Saint Thomas Lowland Parish', 185),
(3840, 'Saint John Figtree Parish', 185),
(3841, 'Saint Kitts', 185),
(3842, 'Saint Thomas Middle Island Parish', 185),
(3843, 'Trinity Palmetto Point Parish', 185),
(3844, 'Saint Mary Cayon Parish', 185),
(3845, 'Saint John Capisterre Parish', 185),
(3846, 'Daegu', 116),
(3847, 'Gyeonggi Province', 116),
(3848, 'Incheon', 116),
(3849, 'Seoul', 116),
(3850, 'Daejeon', 116),
(3851, 'North Jeolla Province', 116),
(3852, 'Ulsan', 116),
(3853, 'Jeju', 116),
(3854, 'North Chungcheong Province', 116),
(3855, 'North Gyeongsang Province', 116),
(3856, 'South Jeolla Province', 116),
(3857, 'South Gyeongsang Province', 116),
(3858, 'Gwangju', 116),
(3859, 'South Chungcheong Province', 116),
(3860, 'Busan', 116),
(3861, 'Sejong City', 116),
(3862, 'Gangwon Province', 116),
(3863, 'Saint Patrick Parish', 87),
(3864, 'Saint George Parish', 87),
(3865, 'Saint Andrew Parish', 87),
(3866, 'Saint Mark Parish', 87),
(3867, 'Carriacou and Petite Martinique', 87),
(3868, 'Saint John Parish', 87),
(3869, 'Saint David Parish', 87),
(3870, 'Ghazni', 1),
(3871, 'Badghis', 1),
(3872, 'Bamyan', 1),
(3873, 'Helmand', 1),
(3874, 'Zabul', 1),
(3875, 'Baghlan', 1),
(3876, 'Kunar', 1),
(3877, 'Paktika', 1),
(3878, 'Khost', 1),
(3879, 'Kapisa', 1),
(3880, 'Nuristan', 1),
(3881, 'Panjshir', 1),
(3882, 'Nangarhar', 1),
(3883, 'Samangan', 1),
(3884, 'Balkh', 1),
(3885, 'Sar-e Pol', 1),
(3886, 'Jowzjan', 1),
(3887, 'Herat', 1),
(3888, 'Gh??r', 1),
(3889, 'Faryab', 1),
(3890, 'Kandahar', 1),
(3891, 'Laghman', 1),
(3892, 'Daykundi', 1),
(3893, 'Takhar', 1),
(3894, 'Paktia', 1),
(3895, 'Parwan', 1),
(3896, 'Nimruz', 1),
(3897, 'Logar', 1),
(3898, 'Urozgan', 1),
(3899, 'Farah', 1),
(3900, 'Kunduz Province', 1),
(3901, 'Badakhshan', 1),
(3902, 'Kabul', 1),
(3903, 'Victoria', 14),
(3904, 'South Australia', 14),
(3905, 'Queensland', 14),
(3906, 'Western Australia', 14),
(3907, 'Australian Capital Territory', 14),
(3908, 'Tasmania', 14),
(3909, 'New South Wales', 14),
(3910, 'Northern Territory', 14),
(3911, 'Vava??u', 222),
(3912, 'Tongatapu', 222),
(3913, 'Ha??apai', 222),
(3914, 'Niuas', 222),
(3915, '??Eua', 222),
(3916, 'Markazi Province', 103),
(3917, 'Khuzestan Province', 103),
(3918, 'Ilam Province', 103),
(3919, 'Kermanshah Province', 103),
(3920, 'Gilan Province', 103),
(3921, 'Chaharmahal and Bakhtiari Province', 103),
(3922, 'Qom Province', 103),
(3923, 'Isfahan Province', 103),
(3924, 'West Azarbaijan Province', 103),
(3925, 'Zanjan Province', 103),
(3926, 'Kohgiluyeh and Boyer-Ahmad Province', 103),
(3927, 'Razavi Khorasan Province', 103),
(3928, 'Lorestan Province', 103),
(3929, 'Alborz Province', 103),
(3930, 'South Khorasan Province', 103),
(3931, 'Sistan and Baluchestan', 103),
(3932, 'Bushehr Province', 103),
(3933, 'Golestan Province', 103),
(3934, 'Ardabil Province', 103),
(3935, 'Kurdistan Province', 103),
(3936, 'Yazd Province', 103),
(3937, 'Hormozgan Province', 103),
(3938, 'Mazandaran Province', 103),
(3939, 'Fars Province', 103),
(3940, 'Semnan Province', 103),
(3941, 'Qazvin Province', 103),
(3942, 'North Khorasan Province', 103),
(3943, 'Kerman Province', 103),
(3944, 'East Azerbaijan Province', 103),
(3945, 'Tehran Province', 103),
(3946, 'Niutao Island Council', 228),
(3947, 'Nanumanga', 228),
(3948, 'Nui', 228),
(3949, 'Nanumea', 228),
(3950, 'Vaitupu', 228),
(3951, 'Funafuti', 228),
(3952, 'Nukufetau', 228),
(3953, 'Nukulaelae', 228),
(3954, 'Dhi Qar Governorate', 104),
(3955, 'Babylon Governorate', 104),
(3956, 'Al-Q??disiyyah Governorate', 104),
(3957, 'Karbala Governorate', 104),
(3958, 'Al Muthanna Governorate', 104),
(3959, 'Baghdad Governorate', 104),
(3960, 'Basra Governorate', 104),
(3961, 'Saladin Governorate', 104),
(3962, 'Najaf Governorate', 104),
(3963, 'Nineveh Governorate', 104),
(3964, 'Al Anbar Governorate', 104),
(3965, 'Diyala Governorate', 104),
(3966, 'Maysan Governorate', 104),
(3967, 'Dohuk Governorate', 104),
(3968, 'Erbil Governorate', 104),
(3969, 'Sulaymaniyah Governorate', 104),
(3970, 'Wasit Governorate', 104),
(3971, 'Kirkuk Governorate', 104),
(3972, 'Svay Rieng Province', 37),
(3973, 'Preah Vihear Province', 37),
(3974, 'Prey Veng Province', 37),
(3975, 'Tak??o Province', 37),
(3976, 'Battambang Province', 37),
(3977, 'Pursat Province', 37),
(3978, 'Kep Province', 37),
(3979, 'Kampong Chhnang Province', 37),
(3980, 'Pailin Province', 37),
(3981, 'Kampot Province', 37),
(3982, 'Koh Kong Province', 37),
(3983, 'Kandal Province', 37),
(3984, 'Banteay Meanchey Province', 37),
(3985, 'Mondulkiri Province', 37),
(3986, 'Krati?? Province', 37),
(3987, 'Oddar Meanchey Province', 37),
(3988, 'Kampong Speu Province', 37),
(3989, 'Sihanoukville Province', 37),
(3990, 'Ratanakiri Province', 37),
(3991, 'Kampong Cham Province', 37),
(3992, 'Siem Reap Province', 37),
(3993, 'Stung Treng Province', 37),
(3994, 'Phnom Penh', 37),
(3995, 'North Hamgyong Province', 115),
(3996, 'Ryanggang Province', 115),
(3997, 'South Pyongan Province', 115),
(3998, 'Chagang Province', 115),
(3999, 'Kangwon Province', 115),
(4000, 'South Hamgyong Province', 115),
(4001, 'Rason', 115),
(4002, 'North Pyongan Province', 115),
(4003, 'South Hwanghae Province', 115),
(4004, 'North Hwanghae Province', 115),
(4005, 'Pyongyang', 115),
(4006, 'Meghalaya', 101),
(4007, 'Haryana', 101),
(4008, 'Maharashtra', 101),
(4009, 'Goa', 101),
(4010, 'Manipur', 101),
(4011, 'Puducherry', 101),
(4012, 'Telangana', 101),
(4013, 'Odisha', 101),
(4014, 'Rajasthan', 101),
(4015, 'Punjab', 101),
(4016, 'Uttarakhand', 101),
(4017, 'Andhra Pradesh', 101),
(4018, 'Nagaland', 101),
(4019, 'Lakshadweep', 101),
(4020, 'Himachal Pradesh', 101),
(4021, 'Delhi', 101),
(4022, 'Uttar Pradesh', 101),
(4023, 'Andaman and Nicobar Islands', 101),
(4024, 'Arunachal Pradesh', 101),
(4025, 'Jharkhand', 101),
(4026, 'Karnataka', 101),
(4027, 'Assam', 101),
(4028, 'Kerala', 101),
(4029, 'Jammu and Kashmir', 101),
(4030, 'Gujarat', 101),
(4031, 'Chandigarh', 101),
(4032, 'Dadra and Nagar Haveli', 101),
(4033, 'Daman and Diu', 101),
(4034, 'Sikkim', 101),
(4035, 'Tamil Nadu', 101),
(4036, 'Mizoram', 101),
(4037, 'Bihar', 101),
(4038, 'Tripura', 101),
(4039, 'Madhya Pradesh', 101),
(4040, 'Chhattisgarh', 101),
(4041, 'Choluteca Department', 97),
(4042, 'Comayagua Department', 97),
(4043, 'El Para??so Department', 97),
(4044, 'Intibuc?? Department', 97),
(4045, 'Bay Islands Department', 97),
(4046, 'Cort??s Department', 97),
(4047, 'Atl??ntida Department', 97),
(4048, 'Gracias a Dios Department', 97),
(4049, 'Cop??n Department', 97),
(4050, 'Olancho Department', 97),
(4051, 'Col??n Department', 97),
(4052, 'Francisco Moraz??n Department', 97),
(4053, 'Santa B??rbara Department', 97),
(4054, 'Lempira Department', 97),
(4055, 'Valle Department', 97),
(4056, 'Ocotepeque Department', 97),
(4057, 'Yoro Department', 97),
(4058, 'La Paz Department', 97),
(4059, 'Northland Region', 158),
(4060, 'Manawatu-Wanganui Region', 158),
(4061, 'Waikato Region', 158),
(4062, 'Otago Region', 158),
(4063, 'Marlborough Region', 158),
(4064, 'West Coast Region', 158),
(4065, 'Wellington Region', 158),
(4066, 'Canterbury Region', 158),
(4067, 'Chatham Islands', 158),
(4068, 'Gisborne District', 158),
(4069, 'Taranaki Region', 158),
(4070, 'Nelson Region', 158),
(4071, 'Southland Region', 158),
(4072, 'Auckland Region', 158),
(4073, 'Tasman District', 158),
(4074, 'Bay of Plenty Region', 158),
(4075, 'Hawke\'s Bay Region', 158),
(4076, 'Saint John Parish', 61),
(4077, 'Saint Mark Parish', 61),
(4078, 'Saint David Parish', 61),
(4079, 'Saint George Parish', 61),
(4080, 'Saint Patrick Parish', 61),
(4081, 'Saint Peter Parish', 61),
(4082, 'Saint Andrew Parish', 61),
(4083, 'Saint Luke Parish', 61),
(4084, 'Saint Paul Parish', 61),
(4085, 'Saint Joseph Parish', 61),
(4086, 'El Seibo Province', 62),
(4087, 'La Romana Province', 62),
(4088, 'S??nchez Ram??rez Province', 62),
(4089, 'Hermanas Mirabal Province', 62),
(4090, 'Barahona Province', 62),
(4091, 'San Crist??bal Province', 62),
(4092, 'Puerto Plata Province', 62),
(4093, 'Santo Domingo Province', 62),
(4094, 'Mar??a Trinidad S??nchez Province', 62),
(4095, 'Distrito Nacional', 62),
(4096, 'Peravia Province', 62),
(4097, 'Independencia', 62),
(4098, 'San Juan Province', 62),
(4099, 'Monse??or Nouel Province', 62),
(4100, 'Santiago Rodr??guez Province', 62),
(4101, 'Pedernales Province', 62),
(4102, 'Espaillat Province', 62),
(4103, 'Saman?? Province', 62),
(4104, 'Valverde Province', 62),
(4105, 'Baoruco Province', 62),
(4106, 'Hato Mayor Province', 62),
(4107, 'Dajab??n Province', 62),
(4108, 'Santiago Province', 62),
(4109, 'La Altagracia Province', 62),
(4110, 'San Pedro de Macor??s', 62),
(4111, 'Monte Plata Province', 62),
(4112, 'San Jos?? de Ocoa Province', 62),
(4113, 'Duarte Province', 62),
(4114, 'Azua Province', 62),
(4115, 'Monte Cristi Province', 62),
(4116, 'La Vega Province', 62),
(4117, 'Nord', 95),
(4118, 'Nippes', 95),
(4119, 'Grand\'Anse', 95),
(4120, 'Ouest', 95),
(4121, 'Nord-Est', 95),
(4122, 'Sud', 95),
(4123, 'Artibonite', 95),
(4124, 'Sud-Est', 95),
(4125, 'Centre', 95),
(4126, 'Nord-Ouest', 95),
(4127, 'San Vicente Department', 66),
(4128, 'Santa Ana Department', 66),
(4129, 'Usulut??n Department', 66),
(4130, 'Moraz??n Department', 66),
(4131, 'Chalatenango Department', 66),
(4132, 'Caba??as Department', 66),
(4133, 'San Salvador Department', 66),
(4134, 'La Libertad Department', 66),
(4135, 'San Miguel Department', 66),
(4136, 'La Paz Department', 66),
(4137, 'Cuscatl??n Department', 66),
(4138, 'La Uni??n Department', 66),
(4139, 'Ahuachap??n Department', 66),
(4140, 'Sonsonate Department', 66),
(4141, 'Braslov??e Municipality', 201),
(4142, 'Lenart Municipality', 201),
(4143, 'Oplotnica', 201),
(4144, 'Velike La????e Municipality', 201),
(4145, 'Hajdina Municipality', 201),
(4146, 'Pod??etrtek Municipality', 201),
(4147, 'Cankova Municipality', 201),
(4148, 'Vitanje Municipality', 201),
(4149, 'Se??ana Municipality', 201),
(4150, 'Kidri??evo Municipality', 201),
(4151, '??ren??ovci Municipality', 201),
(4152, 'Idrija Municipality', 201),
(4153, 'Trnovska Vas Municipality', 201),
(4154, 'Vodice Municipality', 201),
(4155, 'Ravne na Koro??kem Municipality', 201),
(4156, 'Lovrenc na Pohorju Municipality', 201),
(4157, 'Maj??perk Municipality', 201),
(4158, 'Lo??ki Potok Municipality', 201),
(4159, 'Dom??ale Municipality', 201),
(4160, 'Re??ica ob Savinji Municipality', 201),
(4161, 'Podlehnik Municipality', 201),
(4162, 'Cerknica Municipality', 201),
(4163, 'Vransko Municipality', 201),
(4164, 'Sveta Ana Municipality', 201),
(4165, 'Brezovica Municipality', 201),
(4166, 'Benedikt Municipality', 201),
(4167, 'Diva??a Municipality', 201),
(4168, 'Morav??e Municipality', 201),
(4169, 'Slovenj Gradec City Municipality', 201),
(4170, '??kocjan Municipality', 201),
(4171, '??entjur Municipality', 201),
(4172, 'Pesnica Municipality', 201),
(4173, 'Dol pri Ljubljani Municipality', 201),
(4174, 'Lo??ka Dolina Municipality', 201),
(4175, 'Ho??e???Slivnica Municipality', 201),
(4176, 'Cerkvenjak Municipality', 201),
(4177, 'Naklo Municipality', 201),
(4178, 'Cerkno Municipality', 201),
(4179, 'Bistrica ob Sotli Municipality', 201),
(4180, 'Kamnik Municipality', 201),
(4181, 'Bovec Municipality', 201),
(4182, 'Zavr?? Municipality', 201),
(4183, 'Ajdov????ina Municipality', 201),
(4184, 'Pivka Municipality', 201),
(4185, '??tore Municipality', 201),
(4186, 'Kozje Municipality', 201),
(4187, 'Municipality of ??kofljica', 201),
(4188, 'Prebold Municipality', 201),
(4189, 'Dobrovnik Municipality', 201),
(4190, 'Mozirje Municipality', 201),
(4191, 'City Municipality of Celje', 201),
(4192, '??iri Municipality', 201),
(4193, 'Horjul Municipality', 201),
(4194, 'Tabor Municipality', 201),
(4195, 'Rade??e Municipality', 201),
(4196, 'Vipava Municipality', 201),
(4197, 'Kungota', 201),
(4198, 'Slovenske Konjice Municipality', 201),
(4199, 'Osilnica Municipality', 201),
(4200, 'Borovnica Municipality', 201),
(4201, 'Piran Municipality', 201),
(4202, 'Bled Municipality', 201),
(4203, 'Jezersko Municipality', 201),
(4204, 'Ra??e???Fram Municipality', 201),
(4205, 'Nova Gorica City Municipality', 201),
(4206, 'Razkri??je Municipality', 201),
(4207, 'Ribnica na Pohorju Municipality', 201),
(4208, 'Muta Municipality', 201),
(4209, 'Rogatec Municipality', 201),
(4210, 'Gori??nica Municipality', 201),
(4211, 'Kuzma Municipality', 201),
(4212, 'Mislinja Municipality', 201),
(4213, 'Duplek Municipality', 201),
(4214, 'Trebnje Municipality', 201),
(4215, 'Bre??ice Municipality', 201),
(4216, 'Dobrepolje Municipality', 201),
(4217, 'Grad Municipality', 201),
(4218, 'Moravske Toplice Municipality', 201),
(4219, 'Lu??e Municipality', 201),
(4220, 'Miren???Kostanjevica Municipality', 201),
(4221, 'Ormo?? Municipality', 201),
(4222, '??alovci Municipality', 201),
(4223, 'Miklav?? na Dravskem Polju Municipality', 201),
(4224, 'Makole Municipality', 201),
(4225, 'Lendava Municipality', 201),
(4226, 'Vuzenica Municipality', 201),
(4227, 'Kanal ob So??i Municipality', 201),
(4228, 'Ptuj City Municipality', 201),
(4229, 'Sveti Andra?? v Slovenskih Goricah Municipality', 201),
(4230, 'Selnica ob Dravi Municipality', 201),
(4231, 'Radovljica Municipality', 201),
(4232, '??rna na Koro??kem Municipality', 201),
(4233, 'Roga??ka Slatina Municipality', 201),
(4234, 'Podvelka Municipality', 201),
(4235, 'Ribnica Municipality', 201),
(4236, 'City Municipality of Novo Mesto', 201),
(4237, 'Mirna Pe?? Municipality', 201),
(4238, 'Kri??evci Municipality', 201),
(4239, 'Polj??ane Municipality', 201),
(4240, 'Brda Municipality', 201),
(4241, '??entjernej Municipality', 201),
(4242, 'Maribor City Municipality', 201),
(4243, 'Kobarid Municipality', 201),
(4244, 'Markovci Municipality', 201),
(4245, 'Vojnik Municipality', 201),
(4246, 'Trbovlje Municipality', 201),
(4247, 'Tolmin Municipality', 201),
(4248, '??o??tanj Municipality', 201),
(4249, '??etale Municipality', 201),
(4250, 'Tr??i?? Municipality', 201),
(4251, 'Turni????e Municipality', 201),
(4252, 'Dobrna Municipality', 201),
(4253, 'Ren??e???Vogrsko Municipality', 201),
(4254, 'Kostanjevica na Krki Municipality', 201),
(4255, 'Sveti Jurij ob ????avnici Municipality', 201),
(4256, '??elezniki Municipality', 201),
(4257, 'Ver??ej Municipality', 201),
(4258, '??alec Municipality', 201),
(4259, 'Star??e Municipality', 201),
(4260, 'Sveta Trojica v Slovenskih Goricah Municipality', 201),
(4261, 'Sol??ava Municipality', 201),
(4262, 'Vrhnika Municipality', 201),
(4263, 'Sredi????e ob Dravi', 201),
(4264, 'Roga??ovci Municipality', 201),
(4265, 'Me??ica Municipality', 201),
(4266, 'Jur??inci Municipality', 201),
(4267, 'Velika Polana Municipality', 201),
(4268, 'Sevnica Municipality', 201),
(4269, 'Zagorje ob Savi Municipality', 201),
(4270, 'Ljubljana City Municipality', 201),
(4271, 'Gornji Petrovci Municipality', 201),
(4272, 'Polzela Municipality', 201),
(4273, 'Sveti Toma?? Municipality', 201),
(4274, 'Prevalje Municipality', 201),
(4275, 'Radlje ob Dravi Municipality', 201),
(4276, '??irovnica Municipality', 201),
(4277, 'Sodra??ica Municipality', 201),
(4278, 'Bloke Municipality', 201),
(4279, '??martno pri Litiji Municipality', 201),
(4280, 'Ru??e Municipality', 201),
(4281, 'Dolenjske Toplice Municipality', 201),
(4282, 'Bohinj Municipality', 201),
(4283, 'Komenda Municipality', 201),
(4284, 'Gorje Municipality', 201),
(4285, '??marje pri Jel??ah Municipality', 201),
(4286, 'Ig Municipality', 201),
(4287, 'Kranj City Municipality', 201),
(4288, 'Puconci Municipality', 201),
(4289, '??marje??ke Toplice Municipality', 201),
(4290, 'Dornava Municipality', 201),
(4291, '??rnomelj Municipality', 201),
(4292, 'Radenci Municipality', 201),
(4293, 'Gorenja Vas???Poljane Municipality', 201),
(4294, 'Ljubno Municipality', 201),
(4295, 'Dobje Municipality', 201),
(4296, '??martno ob Paki Municipality', 201),
(4297, 'Mokronog???Trebelno Municipality', 201),
(4298, 'Mirna Municipality', 201),
(4299, '??en??ur Municipality', 201),
(4300, 'Videm Municipality', 201),
(4301, 'Beltinci Municipality', 201),
(4302, 'Lukovica Municipality', 201),
(4303, 'Preddvor Municipality', 201),
(4304, 'Destrnik Municipality', 201),
(4305, 'Ivan??na Gorica Municipality', 201),
(4306, 'Log???Dragomer Municipality', 201),
(4307, '??u??emberk Municipality', 201),
(4308, 'Dobrova???Polhov Gradec Municipality', 201),
(4309, 'Municipality of Cirkulane', 201),
(4310, 'Cerklje na Gorenjskem Municipality', 201),
(4311, '??entrupert Municipality', 201),
(4312, 'Ti??ina Municipality', 201),
(4313, 'Murska Sobota City Municipality', 201),
(4314, 'Municipality of Kr??ko', 201),
(4315, 'Komen Municipality', 201),
(4316, '??kofja Loka Municipality', 201),
(4317, '??empeter???Vrtojba Municipality', 201),
(4318, 'Municipality of Apa??e', 201),
(4319, 'Koper City Municipality', 201),
(4320, 'Odranci Municipality', 201),
(4321, 'Hrpelje???Kozina Municipality', 201),
(4322, 'Izola Municipality', 201),
(4323, 'Metlika Municipality', 201),
(4324, '??entilj Municipality', 201),
(4325, 'Kobilje Municipality', 201),
(4326, 'Ankaran Municipality', 201),
(4327, 'Hodo?? Municipality', 201),
(4328, 'Sveti Jurij v Slovenskih Goricah Municipality', 201),
(4329, 'Nazarje Municipality', 201),
(4330, 'Postojna Municipality', 201),
(4331, 'Kostel Municipality', 201),
(4332, 'Slovenska Bistrica Municipality', 201),
(4333, 'Stra??a Municipality', 201),
(4334, 'Trzin Municipality', 201),
(4335, 'Ko??evje Municipality', 201),
(4336, 'Grosuplje Municipality', 201),
(4337, 'Jesenice Municipality', 201),
(4338, 'La??ko Municipality', 201),
(4339, 'Gornji Grad Municipality', 201),
(4340, 'Kranjska Gora Municipality', 201),
(4341, 'Hrastnik Municipality', 201),
(4342, 'Zre??e Municipality', 201),
(4343, 'Gornja Radgona Municipality', 201),
(4344, 'Municipality of Ilirska Bistrica', 201),
(4345, 'Dravograd Municipality', 201),
(4346, 'Semi?? Municipality', 201),
(4347, 'Litija Municipality', 201),
(4348, 'Menge?? Municipality', 201),
(4349, 'Medvode Municipality', 201),
(4350, 'Logatec Municipality', 201),
(4351, 'Ljutomer Municipality', 201),
(4352, 'Bansk?? Bystrica Region', 200),
(4353, 'Ko??ice Region', 200),
(4354, 'Pre??ov Region', 200),
(4355, 'Trnava Region', 200),
(4356, 'Bratislava Region', 200),
(4357, 'Nitra Region', 200),
(4358, 'Tren????n Region', 200),
(4359, '??ilina Region', 200),
(4360, 'Cimi??lia District', 144),
(4361, 'Orhei District', 144),
(4362, 'Bender Municipality', 144),
(4363, 'Nisporeni District', 144),
(4364, 'S??ngerei District', 144),
(4365, 'C??u??eni District', 144),
(4366, 'C??l??ra??i District', 144),
(4367, 'Glodeni District', 144),
(4368, 'Anenii Noi District', 144),
(4369, 'Ialoveni District', 144),
(4370, 'Flore??ti District', 144),
(4371, 'Telene??ti District', 144),
(4372, 'Taraclia District', 144),
(4373, 'Chi??in??u Municipality', 144),
(4374, 'Soroca District', 144),
(4375, 'Briceni District', 144),
(4376, 'R????cani District', 144),
(4377, 'Str????eni District', 144),
(4378, '??tefan Vod?? District', 144),
(4379, 'Basarabeasca District', 144),
(4380, 'Cantemir District', 144),
(4381, 'F??le??ti District', 144),
(4382, 'H??nce??ti District', 144),
(4383, 'Dub??sari District', 144),
(4384, 'Dondu??eni District', 144),
(4385, 'Gagauzia', 144),
(4386, 'Ungheni District', 144),
(4387, 'Edine?? District', 144),
(4388, '??old??ne??ti District', 144),
(4389, 'Ocni??a District', 144),
(4390, 'Criuleni District', 144),
(4391, 'Cahul District', 144),
(4392, 'Drochia District', 144),
(4393, 'B??l??i Municipality', 144),
(4394, 'Rezina District', 144),
(4395, 'Transnistria autonomous territorial unit', 144),
(4396, 'Salacgr??va Municipality', 120),
(4397, 'Vecumnieki Municipality', 120),
(4398, 'Nauk????ni Municipality', 120),
(4399, 'Il??kste Municipality', 120),
(4400, 'Gulbene Municipality', 120),
(4401, 'L??v??ni Municipality', 120),
(4402, 'Salaspils Municipality', 120),
(4403, 'Ventspils Municipality', 120),
(4404, 'Rund??le Municipality', 120),
(4405, 'P??avi??as Municipality', 120),
(4406, 'V??rkava Municipality', 120),
(4407, 'Jaunpiebalga Municipality', 120),
(4408, 'S??ja Municipality', 120),
(4409, 'Tukums Municipality', 120),
(4410, 'Cibla Municipality', 120),
(4411, 'Burtnieki Municipality', 120),
(4412, '??egums Municipality', 120),
(4413, 'Krustpils Municipality', 120),
(4414, 'Cesvaine Municipality', 120),
(4415, 'Skr??veri Municipality', 120),
(4416, 'Ogre Municipality', 120),
(4417, 'Olaine Municipality', 120),
(4418, 'Limba??i Municipality', 120),
(4419, 'Lub??na Municipality', 120),
(4420, 'Kandava Municipality', 120),
(4421, 'Ventspils', 120),
(4422, 'Krimulda Municipality', 120),
(4423, 'Rug??ji Municipality', 120),
(4424, 'Jelgava Municipality', 120),
(4425, 'Valka Municipality', 120),
(4426, 'R??jiena Municipality', 120),
(4427, 'Bab??te Municipality', 120),
(4428, 'Dundaga Municipality', 120),
(4429, 'Priekule Municipality', 120),
(4430, 'Zilupe Municipality', 120),
(4431, 'Varak????ni Municipality', 120),
(4432, 'Nereta Municipality', 120),
(4433, 'Madona Municipality', 120),
(4434, 'Sala Municipality', 120),
(4435, '??ekava Municipality', 120),
(4436, 'N??ca Municipality', 120),
(4437, 'Dobele Municipality', 120),
(4438, 'J??kabpils Municipality', 120),
(4439, 'Saldus Municipality', 120),
(4440, 'Roja Municipality', 120),
(4441, 'Iecava Municipality', 120),
(4442, 'Ozolnieki Municipality', 120),
(4443, 'Saulkrasti Municipality', 120),
(4444, '??rg??i Municipality', 120),
(4445, 'Aglona Municipality', 120),
(4446, 'J??rmala', 120),
(4447, 'Skrunda Municipality', 120),
(4448, 'Engure Municipality', 120),
(4449, 'In??ukalns Municipality', 120),
(4450, 'M??rupe Municipality', 120),
(4451, 'M??rsrags Municipality', 120),
(4452, 'Koknese Municipality', 120),
(4453, 'K??rsava Municipality', 120),
(4454, 'Carnikava Municipality', 120),
(4455, 'R??zekne Municipality', 120),
(4456, 'Vies??te Municipality', 120),
(4457, 'Ape Municipality', 120),
(4458, 'Durbe Municipality', 120),
(4459, 'Talsi Municipality', 120),
(4460, 'Liep??ja', 120),
(4461, 'M??lpils Municipality', 120),
(4462, 'Smiltene Municipality', 120),
(4463, 'Daugavpils', 120),
(4464, 'J??kabpils', 120),
(4465, 'Bauska Municipality', 120),
(4466, 'Vecpiebalga Municipality', 120),
(4467, 'P??vilosta Municipality', 120),
(4468, 'Broc??ni Municipality', 120),
(4469, 'C??sis Municipality', 120),
(4470, 'Grobi??a Municipality', 120),
(4471, 'Bever??na Municipality', 120),
(4472, 'Aizkraukle Municipality', 120),
(4473, 'Valmiera', 120),
(4474, 'Kr??slava Municipality', 120),
(4475, 'Jaunjelgava Municipality', 120),
(4476, 'Sigulda Municipality', 120),
(4477, 'Vi??aka Municipality', 120),
(4478, 'Stopi??i Municipality', 120),
(4479, 'Rauna Municipality', 120),
(4480, 'T??rvete Municipality', 120),
(4481, 'Auce Municipality', 120),
(4482, 'Baldone Municipality', 120),
(4483, 'Prei??i Municipality', 120),
(4484, 'Aloja Municipality', 120),
(4485, 'Alsunga Municipality', 120),
(4486, 'Vi????ni Municipality', 120),
(4487, 'Al??ksne Municipality', 120),
(4488, 'L??gatne Municipality', 120),
(4489, 'Jaunpils Municipality', 120),
(4490, 'Kuld??ga Municipality', 120),
(4491, 'Riga', 120),
(4492, 'Daugavpils Municipality', 120),
(4493, 'Ropa??i Municipality', 120),
(4494, 'Stren??i Municipality', 120),
(4495, 'Koc??ni Municipality', 120),
(4496, 'Aizpute Municipality', 120),
(4497, 'Amata Municipality', 120),
(4498, 'Baltinava Municipality', 120),
(4499, 'Akn??ste Municipality', 120),
(4500, 'Jelgava', 120),
(4501, 'Ludza Municipality', 120),
(4502, 'Riebi??i Municipality', 120),
(4503, 'Rucava Municipality', 120),
(4504, 'Dagda Municipality', 120),
(4505, 'Balvi Municipality', 120),
(4506, 'Prieku??i Municipality', 120),
(4507, 'P??rgauja Municipality', 120),
(4508, 'Vai??ode Municipality', 120),
(4509, 'R??zekne', 120),
(4510, 'Garkalne Municipality', 120),
(4511, 'Ik????ile Municipality', 120),
(4512, 'Lielv??rde Municipality', 120),
(4513, 'Mazsalaca Municipality', 120),
(4514, 'Viqueque Municipality', 63),
(4515, 'Liqui???? Municipality', 63),
(4516, 'Ermera District', 63),
(4517, 'Manatuto District', 63),
(4518, 'Ainaro Municipality', 63),
(4519, 'Manufahi Municipality', 63),
(4520, 'Aileu municipality', 63),
(4521, 'Baucau Municipality', 63),
(4522, 'Cova Lima Municipality', 63),
(4523, 'Laut??m Municipality', 63),
(4524, 'Dili municipality', 63),
(4525, 'Bobonaro Municipality', 63),
(4526, 'Peleliu', 168),
(4527, 'Ngardmau', 168),
(4528, 'Airai', 168),
(4529, 'Hatohobei', 168),
(4530, 'Melekeok', 168),
(4531, 'Ngatpang', 168),
(4532, 'Koror', 168),
(4533, 'Ngarchelong', 168),
(4534, 'Ngiwal', 168),
(4535, 'Sonsorol', 168),
(4536, 'Ngchesar', 168),
(4537, 'Ngaraard', 168),
(4538, 'Angaur', 168),
(4539, 'Kayangel', 168),
(4540, 'Aimeliik', 168),
(4541, 'Ngeremlengui', 168),
(4542, 'B??eclav District', 58),
(4543, '??esk?? Krumlov District', 58),
(4544, 'Plze??-City District', 58),
(4545, 'Brno-Country District', 58),
(4546, 'P????bram District', 58),
(4547, 'Pardubice District', 58),
(4548, 'Nov?? Ji????n District', 58),
(4549, 'Prague 12', 58),
(4550, 'N??chod District', 58),
(4551, 'Prost??jov District', 58),
(4552, 'Zl??n Region', 58),
(4553, 'Chomutov District', 58),
(4554, 'Central Bohemian Region', 58),
(4555, 'Prague 13', 58),
(4556, '??esk?? Bud??jovice District', 58),
(4557, 'Prague 5', 58),
(4558, 'Rakovn??k District', 58),
(4559, 'Fr??dek-M??stek District', 58),
(4560, 'P??sek District', 58),
(4561, 'Hodon??n District', 58),
(4562, 'Prague 1', 58),
(4563, 'Zl??n District', 58),
(4564, 'Plze??-North District', 58),
(4565, 'T??bor District', 58),
(4566, 'Prague 9', 58),
(4567, 'Prague 16', 58),
(4568, 'Brno-City District', 58),
(4569, 'Prague 6', 58),
(4570, 'Prague 11', 58),
(4571, 'Svitavy District', 58),
(4572, 'Vset??n District', 58),
(4573, 'Cheb District', 58),
(4574, 'Olomouc District', 58),
(4575, 'Vyso??ina Region', 58),
(4576, '??st?? nad Labem Region', 58),
(4577, 'Horn?? Po??ernice', 58),
(4578, 'Prachatice District', 58),
(4579, 'Trutnov District', 58),
(4580, 'Hradec Kr??lov?? District', 58),
(4581, 'Karlovy Vary Region', 58),
(4582, 'Nymburk District', 58),
(4583, 'Rokycany District', 58),
(4584, 'Ostrava-City District', 58),
(4585, 'Prague 14', 58),
(4586, 'Karvin?? District', 58),
(4587, 'Prague 4', 58),
(4588, 'Pardubice Region', 58),
(4589, 'Olomouc Region', 58),
(4590, 'Liberec District', 58),
(4591, 'Klatovy District', 58),
(4592, 'Uhersk?? Hradi??t?? District', 58),
(4593, 'Krom???????? District', 58),
(4594, 'Prague 8', 58),
(4595, 'Sokolov District', 58),
(4596, 'Semily District', 58),
(4597, 'T??eb???? District', 58),
(4598, 'Prague', 58),
(4599, '??st?? nad Labem District', 58),
(4600, 'Moravian-Silesian Region', 58),
(4601, 'Liberec Region', 58),
(4602, 'South Moravian Region', 58),
(4603, 'Prague 10', 58),
(4604, 'Karlovy Vary District', 58),
(4605, 'Litom????ice District', 58),
(4606, 'Prague-East District', 58),
(4607, 'Plze?? Region', 58),
(4608, 'Plze??-South District', 58),
(4609, 'D??????n District', 58),
(4610, 'Prague 7', 58),
(4611, 'Havl????k??v Brod District', 58),
(4612, 'Jablonec nad Nisou District', 58),
(4613, 'Jihlava District', 58),
(4614, 'Hradec Kr??lov?? Region', 58),
(4615, 'Blansko District', 58),
(4616, 'Prague 2', 58),
(4617, 'Louny District', 58),
(4618, 'Kol??n District', 58),
(4619, 'Prague-West District', 58),
(4620, 'Beroun District', 58),
(4621, 'Teplice District', 58),
(4622, 'Vy??kov District', 58),
(4623, 'Opava District', 58),
(4624, 'Jind??ich??v Hradec District', 58),
(4625, 'Jesen??k District', 58),
(4626, 'P??erov District', 58),
(4627, 'Bene??ov District', 58),
(4628, 'Strakonice District', 58),
(4629, 'Most District', 58),
(4630, 'Znojmo District', 58),
(4631, 'Kladno District', 58),
(4632, 'Prague 21', 58),
(4633, '??esk?? L??pa District', 58),
(4634, 'Chrudim District', 58),
(4635, 'Prague 3', 58),
(4636, 'Rychnov nad Kn????nou District', 58),
(4637, 'Prague 15', 58),
(4638, 'M??ln??k District', 58),
(4639, 'South Bohemian Region', 58),
(4640, 'Ji????n District', 58),
(4641, 'Doma??lice District', 58),
(4642, '??umperk District', 58),
(4643, 'Mlad?? Boleslav District', 58),
(4644, 'Brunt??l District', 58),
(4645, 'Pelh??imov District', 58),
(4646, 'Tachov District', 58),
(4647, '??st?? nad Orlic?? District', 58),
(4648, '??????r nad S??zavou District', 58),
(4649, 'North East Community Development Council', 199),
(4650, 'South East Community Development Council', 199),
(4651, 'Central Singapore Community Development Council', 199),
(4652, 'South West Community Development Council', 199),
(4653, 'North West Community Development Council', 199),
(4654, 'Ewa District', 153),
(4655, 'Uaboe District', 153),
(4656, 'Aiwo District', 153),
(4657, 'Meneng District', 153),
(4658, 'Anabar District', 153),
(4659, 'Nibok District', 153),
(4660, 'Baiti District', 153),
(4661, 'Ijuw District', 153),
(4662, 'Buada District', 153),
(4663, 'Anibare District', 153),
(4664, 'Yaren District', 153),
(4665, 'Boe District', 153),
(4666, 'Denigomodu District', 153),
(4667, 'Anetan District', 153),
(4668, 'Zhytomyr Oblast', 230),
(4669, 'Vinnytsia Oblast', 230),
(4670, 'Zakarpattia Oblast', 230),
(4671, 'Kyiv Oblast', 230),
(4672, 'Lviv Oblast', 230),
(4673, 'Luhansk Oblast', 230),
(4674, 'Ternopil Oblast', 230),
(4675, 'Dnipropetrovsk Oblast', 230),
(4676, 'Kiev', 230),
(4677, 'Kirovohrad Oblast', 230),
(4678, 'Chernivtsi Oblast', 230),
(4679, 'Mykolaiv Oblast', 230),
(4680, 'Cherkasy Oblast', 230),
(4681, 'Khmelnytsky Oblast', 230),
(4682, 'Ivano-Frankivsk Oblast', 230),
(4683, 'Rivne Oblast', 230),
(4684, 'Kherson Oblast', 230),
(4685, 'Sumy Oblast', 230),
(4686, 'Kharkiv Oblast', 230),
(4687, 'Zaporizhzhya Oblast', 230),
(4688, 'Odessa Oblast', 230),
(4689, 'Autonomous Republic of Crimea', 230),
(4690, 'Volyn Oblast', 230),
(4691, 'Donetsk Oblast', 230),
(4692, 'Chernihiv Oblast', 230),
(4693, 'Gabrovo Province', 34),
(4694, 'Smolyan Province', 34),
(4695, 'Pernik Province', 34),
(4696, 'Montana Province', 34),
(4697, 'Vidin Province', 34),
(4698, 'Razgrad Province', 34),
(4699, 'Blagoevgrad Province', 34),
(4700, 'Sliven Province', 34),
(4701, 'Plovdiv Province', 34),
(4702, 'Kardzhali Province', 34),
(4703, 'Kyustendil Province', 34),
(4704, 'Haskovo Province', 34),
(4705, 'Sofia City Province', 34),
(4706, 'Pleven Province', 34),
(4707, 'Stara Zagora Province', 34),
(4708, 'Silistra Province', 34),
(4709, 'Veliko Tarnovo Province', 34),
(4710, 'Lovech Province', 34),
(4711, 'Vratsa Province', 34),
(4712, 'Pazardzhik Province', 34),
(4713, 'Ruse Province', 34),
(4714, 'Targovishte Province', 34),
(4715, 'Burgas Province', 34),
(4716, 'Yambol Province', 34),
(4717, 'Varna Province', 34),
(4718, 'Dobrich Province', 34),
(4719, 'Sofia Province', 34),
(4720, 'Suceava County', 181),
(4721, 'Hunedoara County', 181),
(4722, 'Arges', 181),
(4723, 'Bihor County', 181),
(4724, 'Alba', 181),
(4725, 'Ilfov County', 181),
(4726, 'Giurgiu County', 181),
(4727, 'Tulcea County', 181),
(4728, 'Teleorman County', 181),
(4729, 'Prahova County', 181),
(4730, 'Bucharest', 181),
(4731, 'Neam?? County', 181),
(4732, 'C??l??ra??i County', 181),
(4733, 'Bistri??a-N??s??ud County', 181),
(4734, 'Cluj County', 181),
(4735, 'Ia??i County', 181),
(4736, 'Braila', 181),
(4737, 'Constan??a County', 181),
(4738, 'Olt County', 181),
(4739, 'Arad County', 181),
(4740, 'Boto??ani County', 181),
(4741, 'S??laj County', 181),
(4742, 'Dolj County', 181),
(4743, 'Ialomi??a County', 181),
(4744, 'Bac??u County', 181),
(4745, 'D??mbovi??a County', 181),
(4746, 'Satu Mare County', 181),
(4747, 'Gala??i County', 181),
(4748, 'Timi?? County', 181),
(4749, 'Harghita County', 181),
(4750, 'Gorj County', 181),
(4751, 'Mehedin??i County', 181),
(4752, 'Vaslui County', 181),
(4753, 'Cara??-Severin County', 181),
(4754, 'Covasna County', 181),
(4755, 'Sibiu County', 181),
(4756, 'Buz??u County', 181),
(4757, 'V??lcea County', 181),
(4758, 'Vrancea County', 181),
(4759, 'Bra??ov County', 181),
(4760, 'Maramure?? County', 181),
(4761, 'Aiga-i-le-Tai', 191),
(4762, 'Satupa\'itea', 191),
(4763, 'A\'ana', 191),
(4764, 'Fa\'asaleleaga', 191),
(4765, 'Atua', 191),
(4766, 'Vaisigano', 191),
(4767, 'Palauli', 191),
(4768, 'Va\'a-o-Fonoti', 191),
(4769, 'Gaga\'emauga', 191),
(4770, 'Tuamasaga', 191),
(4771, 'Gaga\'ifomauga', 191),
(4772, 'Torba', 237),
(4773, 'Penama', 237),
(4774, 'Shefa', 237),
(4775, 'Malampa', 237),
(4776, 'Sanma', 237),
(4777, 'Tafea', 237),
(4778, 'Honiara', 202),
(4779, 'Temotu Province', 202),
(4780, 'Isabel Province', 202),
(4781, 'Choiseul Province', 202),
(4782, 'Makira-Ulawa Province', 202),
(4783, 'Malaita Province', 202),
(4784, 'Central Province', 202),
(4785, 'Guadalcanal Province', 202),
(4786, 'Western Province', 202),
(4787, 'Rennell and Bellona Province', 202),
(4788, 'Burgundy', 75),
(4789, 'Auvergne', 75),
(4790, 'Picardy', 75),
(4791, 'Champagne-Ardenne', 75),
(4792, 'Limousin', 75),
(4793, 'Nord-Pas-de-Calais', 75),
(4794, 'Saint Barth??lemy', 75),
(4795, 'Nouvelle-Aquitaine', 75),
(4796, '??le-de-France', 75),
(4797, 'Mayotte', 75),
(4798, 'Auvergne-Rh??ne-Alpes', 75),
(4799, 'Occitania', 75),
(4800, 'Alo', 75),
(4801, 'Lorraine', 75),
(4802, 'Pays de la Loire', 75),
(4803, 'Languedoc-Roussillon', 75),
(4804, 'Normandy', 75),
(4805, 'Franche-Comt??', 75),
(4806, 'Corsica', 75),
(4807, 'Brittany', 75),
(4808, 'Aquitaine', 75),
(4809, 'Saint Martin', 75),
(4810, 'Wallis and Futuna', 75),
(4811, 'Alsace', 75),
(4812, 'Provence-Alpes-C??te d\'Azur', 75),
(4813, 'Rh??ne-Alpes', 75),
(4814, 'Lower Normandy', 75),
(4815, 'Poitou-Charentes', 75),
(4816, 'Paris', 75),
(4817, 'Uvea', 75),
(4818, 'Centre-Val de Loire', 75),
(4819, 'Sigave', 75),
(4820, 'Grand Est', 75),
(4821, 'Saint Pierre and Miquelon', 75),
(4822, 'French Guiana', 75),
(4823, 'R??union', 75),
(4824, 'French Polynesia', 75),
(4825, 'Bourgogne-Franche-Comt??', 75),
(4826, 'Upper Normandy', 75),
(4827, 'Martinique', 75),
(4828, 'Hauts-de-France', 75),
(4829, 'Guadeloupe', 75),
(4830, 'West New Britain Province', 171),
(4831, 'Bougainville', 171),
(4832, 'Jiwaka Province', 171),
(4833, 'Hela', 171),
(4834, 'East New Britain', 171),
(4835, 'Morobe Province', 171),
(4836, 'Sandaun Province', 171),
(4837, 'Port Moresby', 171),
(4838, 'Oro Province', 171),
(4839, 'Gulf', 171),
(4840, 'Western Highlands Province', 171),
(4841, 'New Ireland Province', 171),
(4842, 'Manus Province', 171),
(4843, 'Madang Province', 171),
(4844, 'Southern Highlands Province', 171),
(4845, 'Eastern Highlands Province', 171),
(4846, 'Chimbu Province', 171),
(4847, 'Central Province', 171),
(4848, 'Enga Province', 171),
(4849, 'Milne Bay Province', 171),
(4850, 'Western Province', 171),
(4851, 'Ohio', 233),
(4852, 'Ladakh', 101),
(4853, 'West Bengal', 101),
(4854, 'Sinop Province', 225),
(4855, 'Capital District', 239),
(4856, 'Apure', 239),
(4857, 'Jalisco', 142),
(4858, 'Roraima', 31),
(4859, 'Guarda District', 177),
(4860, 'Devonshire Parish', 25),
(4861, 'Hamilton Parish', 25),
(4862, 'Hamilton Municipality', 25),
(4863, 'Paget Parish', 25),
(4864, 'Pembroke Parish', 25),
(4865, 'Saint George\'s Municipality', 25),
(4866, 'Saint George\'s Parish', 25),
(4867, 'Sandys Parish', 25),
(4868, 'Smith\'s Parish,', 25),
(4869, 'Southampton Parish', 25),
(4870, 'Warwick Parish', 25),
(4871, 'Huila Department', 48),
(4874, 'Uro??evac District (Ferizaj)', 248),
(4876, '??akovica District (Gjakove)', 248),
(4877, 'Gjilan District', 248),
(4878, 'Kosovska Mitrovica District', 248),
(4879, 'Pristina (Pri??tine)', 248),
(4880, 'Autonomous City Of Buenos Aires', 11),
(4881, 'New Providence', 17),
(4882, 'Shumen', 34),
(4883, 'Yuen Long District', 98),
(4884, 'Tsuen Wan District', 98),
(4885, 'Tai Po District', 98),
(4887, 'Sai Kung District', 98),
(4888, 'Islands District', 98),
(4889, 'Central and Western District', 98),
(4890, 'Wan Chai', 98),
(4891, 'Eastern', 98),
(4892, 'Southern', 98),
(4893, 'Yau Tsim Mong', 98),
(4894, 'Sham Shui Po', 98),
(4895, 'Kowloon City', 98),
(4896, 'Wong Tai Sin', 98),
(4897, 'Kwun Tong', 98),
(4898, 'Kwai Tsing', 98),
(4899, 'Tuen Mun', 98),
(4900, 'North', 98),
(4901, 'Sha Tin', 98),
(4902, 'Sidi Bel Abb??s', 4),
(4905, 'El M\'ghair', 4),
(4906, 'El Menia', 4),
(4907, 'Ouled Djellal', 4),
(4908, 'Bordj Baji Mokhtar', 4),
(4909, 'B??ni Abb??s', 4),
(4910, 'Timimoun', 4),
(4911, 'Touggourt', 4),
(4912, 'Djanet', 4),
(4913, 'In Salah', 4),
(4914, 'In Guezzam', 4),
(4915, 'Mure?? County', 181);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salutation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bod` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor` int(11) DEFAULT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hire_date` timestamp NULL DEFAULT NULL,
  `termination_date` timestamp NULL DEFAULT NULL,
  `qualification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxonomy` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_check` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_tb_shot` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dl` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dl_expiration` timestamp NULL DEFAULT NULL,
  `dl_state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL COMMENT '0:admin, other depend on role',
  `services` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0:Inactive, 1:Active,3:Suspend',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `salutation`, `fname`, `lname`, `gender`, `bod`, `email`, `phone`, `mobile`, `supervisor`, `login`, `email_verified_at`, `password`, `remember_token`, `address`, `address_1`, `city`, `state`, `zipcode`, `country`, `ssn`, `hire_date`, `termination_date`, `qualification`, `npi`, `taxonomy`, `back_check`, `last_tb_shot`, `dl`, `dl_expiration`, `dl_state`, `time`, `role_id`, `services`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mrs', 'admin', 'admin', NULL, NULL, 'admin@admin.com', '1234567890', '12345678901', 4, NULL, NULL, '$2y$10$Uu7pzbUZcjNgaB222lmCBOtjqg3MK7w97B.gpgzuUkB3zO/ZTzGfG', 'zWns3w8qg8oq6XXuwt7FD9Sp9FgRh2z2UzCNFC14PDPmXWyVacjEtfsDkcQo', NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '331', 0, NULL, 1, '2021-06-09 18:30:00', '2021-05-06 01:02:10'),
(3, 'Mr', 'Sam', 'Patel', 'Male', '1985-10-24', 'sd@p.com', '1234567890', '1234567891', 4, 'sd@p.com', NULL, '$2y$10$gEOgy0N5sPY4r9MSMoXp6ev2u0UulX4sZIHNkMAd.bobfIEXsvBJO', NULL, 'India', 'Street', 'Ahmedabad', '4030', '123456', '101', '12121', '1985-10-09 18:30:00', '2021-09-22 18:30:00', 'a:0:{}', '111', '23', '33', '33', '2323', '2021-05-13 18:30:00', 'as', '12', 15, 'a:1:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}}', 1, '2021-06-09 18:30:00', '2021-07-15 18:30:00'),
(4, 'Mrs', 'dd1', 'dd', 'Male', NULL, 'test@1.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$kIjoQgOQRvYtvSQH.6ojV.Wq1IUB.KcvalpphSnHZN6AYheaA4Kq2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-06-09 18:30:00', NULL),
(5, 'Mr', 'dd1', 'dd', 'Male', NULL, 'test@2.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$JdqascYA3HIK1iatr6JCtOmioekvd5Z9atuN41QolcXZbaCFw7q2y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-06-09 18:30:00', NULL),
(6, 'Mr', 'ss', 'ss', 'Male', NULL, 'test@3.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$okIrCyFw338RB6PO7ODZ/.YZVPKeD6tyw8nnWkGujHpH6CIL6M7pG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-06-09 18:30:00', NULL),
(7, 'Mr', 's1', 'p1', 'Male', NULL, 'test@4.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$ZG92vtrFvdBSjroMh4qKjOlD9kz095B1xX4Ik2cuCfm9sCgAT2CxG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, '2021-06-09 18:30:00', NULL),
(13, 'Mr', 'savvy', 'p', 'Male', '232', 'savvy@p.com', '122', '22222', NULL, 'savvy@p.com', NULL, '$2y$10$eXWWDwP9EjvHSea.reiZZuxMrfm8CAO1vArXrLMmnIarCCM0lefG6', NULL, 'Vahelal', 'jeevanhouse', 'Ahmedabad', '4030', '123456', '101', 'ddfdfdffd', NULL, NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '4546565', '445', '45', NULL, '454545', NULL, 'Gujarat', NULL, 15, NULL, 1, '2021-06-09 18:30:00', NULL),
(31, 'Mr', 'test', 'test 1', 'Male', '2021-06-01', 'test12@test1.com', '+19909705576', '+19909705576', 3, 'test@test1.com', NULL, '$2y$10$ihbiwihkAgKFFXGZfl.Tfu/CKWQHo1jM8bx8wMgHO7zr7jTFtCp/i', NULL, '290,JIVANDAS NO GHARO,VAHELAL', 'adr', 'VAHELAL', '15', '382330', '16', '12', '2021-06-09 18:30:00', '2021-06-16 18:30:00', 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '21', '2211', '212', '212', '2222', '2021-06-24 18:30:00', '2021-06-27', '12', 13, 'a:1:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}}', 1, '2021-06-09 18:30:00', NULL),
(27, 'Mr', 'james', 'bond', 'Male', '2021-06-27', 'james@bond.com', '+917600249039', '+19909705576', 3, 'james@bond.coc', NULL, '$2y$10$OALqxc7q.S.riIEZ6vukV.q/5U7qxlICBiyCuPovaW9pzC1gyaiK.', NULL, '', '', '', NULL, '', NULL, '', NULL, NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '', '', '', '', '', NULL, '', '12', 13, 'a:1:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}}', 1, '2021-06-09 18:30:00', NULL),
(35, 'Mr', 'abc', 'def', 'Male', '2021-06-30', 'abc@def.com', '+19909705576', '+19909705576', 6, 'abc@def.com', NULL, '$2y$10$KR49pGF1NuAMiDOXQ8M/9uwySmE/UAI1hsnAuSbEKv5SsJpitU3VG', NULL, '290,JIVANDAS NO GHARO,VAHELAL', 'ssd', 'VAHELAL', '1', '38243', '14', '12', '2021-06-29 18:30:00', '2021-06-24 18:30:00', 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '21', '2211', '212', '212', '2222', '2021-06-02 18:30:00', 'Gujarat', '12', 13, 'a:1:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}}', 1, '2021-06-09 18:30:00', NULL),
(34, 'Mr', 'test', 'test 1', 'Male', '2021-06-01', 'test1211@test11.com', '+19909705576', '+19909705576', 3, 'test1211@test11.com', NULL, '$2y$10$VwgPmSrhok2Dr9DOG6JngeT6NE8R61HcyRJs.JBDmqgMnbTdz058O', NULL, '290,JIVANDAS NO GHARO,VAHELAL', 'adr', 'VAHELAL', '15', '382330', '16', '12', '2021-06-09 18:30:00', '2021-06-16 18:30:00', 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '21', '2211', '212', '212', '2222', '2021-06-24 18:30:00', '06-27-2021', '12', 13, 'a:1:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}}', 1, '2021-06-09 18:30:00', NULL),
(36, 'Mr', 'bb', 'bb', 'Male', NULL, 'bb@bb.com', '+19909705576', '', 3, 'bb@bb.com', NULL, '$2y$10$T7yZVh8cR6ly/YEeqvUBlOTuq.XKoIe./ECa8.3wJyZPV58HSp.ai', NULL, '290,JIVANDAS NO GHARO,VAHELAL', '', 'VAHELAL', NULL, '38243', NULL, '', '2021-06-28 18:30:00', NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '', '', '', '', '', NULL, '', '12', 8, 'a:49:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}i:1;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"3\";}i:2;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"4\";}i:3;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"5\";}i:4;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"6\";}i:5;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"7\";}i:6;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"8\";}i:7;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"9\";}i:8;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"10\";}i:9;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"11\";}i:10;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"12\";}i:11;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"13\";}i:12;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"14\";}i:13;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"15\";}i:14;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"16\";}i:15;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"17\";}i:16;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"18\";}i:17;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"19\";}i:18;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"20\";}i:19;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"21\";}i:20;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"22\";}i:21;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"23\";}i:22;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"24\";}i:23;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"25\";}i:24;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"26\";}i:25;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"27\";}i:26;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"28\";}i:27;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"29\";}i:28;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"30\";}i:29;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"31\";}i:30;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"32\";}i:31;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"33\";}i:32;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"34\";}i:33;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"35\";}i:34;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"36\";}i:35;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"37\";}i:36;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"38\";}i:37;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"39\";}i:38;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"40\";}i:39;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"41\";}i:40;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"42\";}i:41;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"43\";}i:42;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"44\";}i:43;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"45\";}i:44;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"46\";}i:45;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"47\";}i:46;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"48\";}i:47;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"49\";}i:48;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"50\";}}', 1, '2021-06-16 18:30:00', NULL),
(37, 'Mr', 'cc', 'cc', 'Male', NULL, 'cc@cc.com', '', '', 3, 'cc@cc.com', NULL, '$2y$10$6HYeXnEXZyzaRwNNKYjmNuCHL.c43dXKED/Dtwq5SUXsseA604Cba', NULL, '', '', '', NULL, '1212', NULL, '', '2021-06-23 18:30:00', NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '', '', '', '', '', NULL, '', '12', 3, 'a:49:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}i:1;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"3\";}i:2;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"4\";}i:3;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"5\";}i:4;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"6\";}i:5;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"7\";}i:6;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"8\";}i:7;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"9\";}i:8;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"10\";}i:9;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"11\";}i:10;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"12\";}i:11;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"13\";}i:12;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"14\";}i:13;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"15\";}i:14;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"16\";}i:15;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"17\";}i:16;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"18\";}i:17;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"19\";}i:18;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"20\";}i:19;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"21\";}i:20;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"22\";}i:21;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"23\";}i:22;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"24\";}i:23;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"25\";}i:24;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"26\";}i:25;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"27\";}i:26;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"28\";}i:27;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"29\";}i:28;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"30\";}i:29;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"31\";}i:30;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"32\";}i:31;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"33\";}i:32;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"34\";}i:33;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"35\";}i:34;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"36\";}i:35;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"37\";}i:36;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"38\";}i:37;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"39\";}i:38;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"40\";}i:39;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"41\";}i:40;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"42\";}i:41;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"43\";}i:42;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"44\";}i:43;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"45\";}i:44;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"46\";}i:45;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"47\";}i:46;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"48\";}i:47;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"49\";}i:48;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"50\";}}', 1, '2021-06-16 18:30:00', NULL),
(38, 'Mr', 'dd', 'dd', 'Male', NULL, 'dd@dd.com', '', '', 5, 'dd@dd.com', NULL, '$2y$10$Nxr9ibJsVmBz7jl.BnIZjOjF2.ejhVQfHKwWUkygbfSL.aapfy80e', NULL, '', '', '', NULL, '11111', NULL, '', '2021-06-29 18:30:00', NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '', '', '', '', '', NULL, '', '12', 8, 'a:3:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}i:1;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"3\";}i:2;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"19\";}}', 1, '2021-06-16 18:30:00', NULL),
(39, 'Mr', 'ee', 'ee', 'Male', NULL, 'ee@ee.com', '', '', 3, 'ee@ee.com', NULL, '$2y$10$gVPCUQuHwFLR0yGozNhAxeMzjb4F6tS5bwR1fLPVA9u0TqId/D5Re', NULL, '', '', '', NULL, '54545', NULL, '', '2021-06-09 18:30:00', NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '', '', '', '', '', NULL, '', '12', 14, 'a:6:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}i:1;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"18\";}i:2;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"20\";}i:3;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"34\";}i:4;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"35\";}i:5;O:8:\"stdClass\":1:{s:8:\"services\";s:2:\"36\";}}', 1, '2021-06-16 18:30:00', NULL),
(40, 'Mr', 'ff', 'ff', 'Male', NULL, 'ff@ff.com', '', '', 3, 'ff@ff.com', NULL, '$2y$10$vRt1JEfYsDGLPKWmJkwyvuaK0q0sNBauACFZ10YHDT0p1S4kJdt8S', NULL, '', '', '', NULL, '5454', NULL, '', '2021-06-10 18:30:00', NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '', '', '', '', '', NULL, '', '12', 13, 'a:4:{i:0;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"1\";}i:1;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"3\";}i:2;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"4\";}i:3;O:8:\"stdClass\":1:{s:8:\"services\";s:1:\"5\";}}', 1, '2021-06-16 18:30:00', '2021-06-16 18:30:00'),
(41, 'Mr', 'Sarvesh', 'Patel', 'Male', NULL, 'gg@gg.com', '+19909705576', 'admin@admin.com', 39, 'gg@gg.com', NULL, '$2y$10$OkkmLJKaHKkrJA773fQC1uxZo5eqfPWLg/qrYVeygdhtwzNV3Vl1C', NULL, '290,JIVANDAS NO GHARO,VAHELAL', '', 'VAHELAL', NULL, '38243', NULL, '', '2021-06-29 18:30:00', NULL, 'a:2:{i:0;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-A\";}i:1;O:8:\"stdClass\":1:{s:13:\"qualification\";s:6:\"QMHP-C\";}}', '', '', '', '', '', NULL, '', '12', 13, 'a:0:{}', 1, '2021-06-17 18:30:00', '2021-06-17 18:30:00'),
(42, 'Mr', 'aaaa', 'aa', 'Female', NULL, 'rinkesh.shethiya@gmail.com', '08780960298', '', 41, 'aaaa@aa.com', NULL, '$2y$10$N035ad5j.i92uVZLp7Bu2OaClqYyd/0J3e4u3E4coREaf51m5uUpe', NULL, 'D-101 Divyajeevan satsang flat\nnear haridarshan cross road,naroda', '', 'Ahmedabad', NULL, '382330', '101', '', '2021-07-13 18:30:00', NULL, 'a:0:{}', '', '', '', '', '', NULL, '', '12', 15, 'a:0:{}', 1, '2021-07-12 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `user_id`, `document`) VALUES
(3, 7, '60a4a3cbdf370_1621402571.jpg'),
(4, 3, '60a6097e7ec45_1621494142.jpg'),
(1, 7, '60a4a3cbde3d0_1621402571.jpg'),
(5, 3, '60a6097e87117_1621494142.jpg'),
(6, 3, '60a6097e878e7_1621494142.jpg'),
(7, 35, '60c085ec03926_1623229932.jpg'),
(8, 3, '60c09a3ee8dfb_1623235134.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_assessors`
--
ALTER TABLE `assessment_assessors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_assessor_desc`
--
ALTER TABLE `assessment_assessor_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_assessor_notes`
--
ALTER TABLE `assessment_assessor_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_behaviors`
--
ALTER TABLE `assessment_behaviors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_behavior_desc`
--
ALTER TABLE `assessment_behavior_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_documents`
--
ALTER TABLE `assessment_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_functions`
--
ALTER TABLE `assessment_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_persons`
--
ALTER TABLE `assessment_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_person_desc`
--
ALTER TABLE `assessment_person_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_problems`
--
ALTER TABLE `assessment_problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_spend_times`
--
ALTER TABLE `assessment_spend_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_types`
--
ALTER TABLE `assessment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorizations`
--
ALTER TABLE `authorizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorization_spend_times`
--
ALTER TABLE `authorization_spend_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `axis_levels`
--
ALTER TABLE `axis_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certfication_types`
--
ALTER TABLE `certfication_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_account_notations`
--
ALTER TABLE `consumer_account_notations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_addresses`
--
ALTER TABLE `consumer_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_allergies`
--
ALTER TABLE `consumer_allergies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_diagnosis`
--
ALTER TABLE `consumer_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_medications`
--
ALTER TABLE `consumer_medications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_note_types`
--
ALTER TABLE `consumer_note_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_payers`
--
ALTER TABLE `consumer_payers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_persons`
--
ALTER TABLE `consumer_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_phones`
--
ALTER TABLE `consumer_phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer_status`
--
ALTER TABLE `consumer_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis_codes`
--
ALTER TABLE `diagnosis_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_certifications`
--
ALTER TABLE `employee_certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_emergency_contact`
--
ALTER TABLE `employee_emergency_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_licence`
--
ALTER TABLE `employee_licence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_wages_hours`
--
ALTER TABLE `employee_wages_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ethnicities`
--
ALTER TABLE `ethnicities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notation_types`
--
ALTER TABLE `notation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(250));

--
-- Indexes for table `payers`
--
ALTER TABLE `payers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_types`
--
ALTER TABLE `pay_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_types`
--
ALTER TABLE `policy_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primaries`
--
ALTER TABLE `primaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smoker_status`
--
ALTER TABLE `smoker_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_region` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `assessment_assessors`
--
ALTER TABLE `assessment_assessors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `assessment_assessor_desc`
--
ALTER TABLE `assessment_assessor_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assessment_assessor_notes`
--
ALTER TABLE `assessment_assessor_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_behaviors`
--
ALTER TABLE `assessment_behaviors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assessment_behavior_desc`
--
ALTER TABLE `assessment_behavior_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assessment_documents`
--
ALTER TABLE `assessment_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assessment_functions`
--
ALTER TABLE `assessment_functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `assessment_persons`
--
ALTER TABLE `assessment_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `assessment_person_desc`
--
ALTER TABLE `assessment_person_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assessment_problems`
--
ALTER TABLE `assessment_problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `assessment_spend_times`
--
ALTER TABLE `assessment_spend_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assessment_types`
--
ALTER TABLE `assessment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authorizations`
--
ALTER TABLE `authorizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `authorization_spend_times`
--
ALTER TABLE `authorization_spend_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `axis_levels`
--
ALTER TABLE `axis_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certfication_types`
--
ALTER TABLE `certfication_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `consumers`
--
ALTER TABLE `consumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `consumer_account_notations`
--
ALTER TABLE `consumer_account_notations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `consumer_addresses`
--
ALTER TABLE `consumer_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `consumer_allergies`
--
ALTER TABLE `consumer_allergies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consumer_diagnosis`
--
ALTER TABLE `consumer_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consumer_medications`
--
ALTER TABLE `consumer_medications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consumer_note_types`
--
ALTER TABLE `consumer_note_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consumer_payers`
--
ALTER TABLE `consumer_payers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `consumer_persons`
--
ALTER TABLE `consumer_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consumer_phones`
--
ALTER TABLE `consumer_phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `consumer_status`
--
ALTER TABLE `consumer_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `diagnosis_codes`
--
ALTER TABLE `diagnosis_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_certifications`
--
ALTER TABLE `employee_certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_emergency_contact`
--
ALTER TABLE `employee_emergency_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_licence`
--
ALTER TABLE `employee_licence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_wages_hours`
--
ALTER TABLE `employee_wages_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ethnicities`
--
ALTER TABLE `ethnicities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notation_types`
--
ALTER TABLE `notation_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payers`
--
ALTER TABLE `payers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pay_types`
--
ALTER TABLE `pay_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policy_types`
--
ALTER TABLE `policy_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `primaries`
--
ALTER TABLE `primaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `smoker_status`
--
ALTER TABLE `smoker_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4916;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `country_region_final` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
