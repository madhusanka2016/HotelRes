-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 06:06 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(45) NOT NULL,
  `employee` varchar(45) NOT NULL,
  `emp_id` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `employee`, `emp_id`, `status`, `time`) VALUES
(8, '2018-11-18', 'John', '1', 'In', '2018-11-18 03:31:13'),
(9, '2018-11-18', 'Jane', '4', 'In', '2018-11-18 03:31:23'),
(10, '2018-11-18', 'John', '5', 'In', '2018-11-18 03:31:37'),
(11, '2018-11-18', 'John', '1', 'Out', '2018-11-18 03:31:47'),
(12, '2018-11-18', 'Jane', '4', 'Out', '2018-11-18 03:32:01'),
(13, '2018-11-19', 'John', '1', 'In', '2018-11-19 20:44:11'),
(14, '2018-11-20', 'Jane', '4', 'In', '2018-11-20 08:08:44'),
(15, '2018-11-22', 'Jane', '4', 'Out', '2018-11-22 08:26:23'),
(16, '2018-11-22', 'Rasanga', '29', 'In', '2018-11-22 08:59:39'),
(17, '2018-11-22', 'John', '1', 'In', '2018-11-22 09:00:24'),
(18, '2018-11-22', 'Chamal', '35', 'In', '2018-11-22 11:03:20'),
(19, '2019-03-18', 'John', '1', 'In', '2019-03-18 17:39:32'),
(20, '2019-03-18', 'John', '1', 'Out', '2019-03-18 17:39:36'),
(21, '2019-04-01', '', '9', 'In', '2019-04-01 10:52:59'),
(22, '2019-04-01', 'John', '1', 'In', '2019-04-01 10:53:05'),
(23, '2019-04-01', 'Chamal', '35', 'In', '2019-04-01 11:01:28'),
(24, '2019-04-01', 'John', '1', 'Out', '2019-04-01 11:01:33'),
(25, '2019-04-01', 'Chamal', '35', 'Out', '2019-04-01 13:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `banquet`
--

CREATE TABLE `banquet` (
  `id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `seats` int(10) NOT NULL,
  `place` varchar(10) NOT NULL,
  `cusid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banquet`
--

INSERT INTO `banquet` (`id`, `type`, `seats`, `place`, `cusid`) VALUES
(1, 'Magenta', 250, 'Free', 0),
(2, 'Merigold', 250, 'Free', 0),
(3, 'Citadel', 350, 'Free', 0),
(4, 'Victorian Lobby', 200, 'Free', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banquetbook`
--

CREATE TABLE `banquetbook` (
  `id` int(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `National` varchar(15) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Phone` int(10) NOT NULL,
  `THall` varchar(15) NOT NULL,
  `Farrange` varchar(10) NOT NULL,
  `NRoom` int(5) NOT NULL,
  `Light` varchar(10) NOT NULL,
  `cinDate` date NOT NULL,
  `cinTime` time(6) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `nodays` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banquetbook`
--

INSERT INTO `banquetbook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `THall`, `Farrange`, `NRoom`, `Light`, `cinDate`, `cinTime`, `stat`, `nodays`) VALUES
(1, 'Dr.', 'rasa', 'Koshila', 'chamaljanakantha@gmail.co', 'Sri Lankan', 'Belarus', 704127845, 'Merigold', 'Fresh', 1, 'Stage only', '2019-01-09', '00:55:00.000000', 'Conform', ''),
(4, 'Mr.', 'Imasha', 'Arushaka', '123@gmail.com', 'Sri Lankan', 'Sri Lanka', 77, 'Magenta', 'Artificial', 1, 'Color Chan', '2019-01-30', '10:00:00.000000', 'Conform', ''),
(7, 'Prof.', 'calculas', 'Arushaka', 'thilinar@gmail.com', 'Sri Lankan', 'Sri Lanka', 716531833, 'Citadel', 'Fresh', 1, 'Full Board', '2019-02-07', '11:00:00.000000', 'Conform', ''),
(8, 'Prof.', 'Nalaka', 'Amare', 'rasangapradeep94@gmail.co', 'Sri Lankan', 'Sri Lanka', 77, 'Victorian Lobby', 'Fresh', 1, 'Half Board', '2019-02-04', '10:00:00.000000', 'Conform', ''),
(9, 'Mr.', 'Nalaka', 'Kukula', 'djwbv@gmail.com', 'Sri Lankan', 'Sri Lanka', 766894578, 'Citadel', 'Fresh', 1, 'Half Board', '2019-02-07', '10:00:00.000000', 'Conform', ''),
(10, 'Mrs.', 'New', 'sdffs', 'smaaa@gmail.com', 'Sri Lankan', 'Algeria', 0, 'Merigold', 'Artificial', 1, 'Half Board', '2019-03-18', '12:12:12.000000', 'Conform', ''),
(11, 'Miss.', 'New', 'sdffs', 'cashier@cashier.com', 'Sri Lankan', 'Azerbaijan', 0, 'Citadel', 'Artificial', 1, 'Stage only', '2019-03-14', '12:12:12.000000', 'Conform', ''),
(12, 'Mr.', 'New', 'New', 'admin@admin.com', 'Sri Lankan', 'Albania', 0, 'Merigold', 'Artificial', 1, 'Color Chan', '2019-03-13', '12:12:12.000000', 'Conform', '');

-- --------------------------------------------------------

--
-- Table structure for table `banquetpayment`
--

CREATE TABLE `banquetpayment` (
  `id` int(11) NOT NULL,
  `title` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `hall` int(5) NOT NULL,
  `farrange` varchar(10) NOT NULL,
  `light` varchar(10) NOT NULL,
  `cindate` date NOT NULL,
  `cintime` datetime(6) NOT NULL,
  `ttot` double(8,2) NOT NULL,
  `fintot` double(8,2) NOT NULL,
  `mepr` double(8,2) NOT NULL,
  `btot` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cafebook`
--

CREATE TABLE `cafebook` (
  `id` int(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `National` varchar(15) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `cinDate` date NOT NULL,
  `cinTime` time(6) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `payment` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafebook`
--

INSERT INTO `cafebook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `Type`, `cinDate`, `cinTime`, `stat`, `payment`) VALUES
(1, 'Miss.', 'fdgdfgfdg', 'dgdfg', 'cashier@cashier.com', 'Sri Lankan', 'Australia', 55555, '12', '2019-03-01', '12:12:12.000000', 'Conform', 13000),
(2, 'Miss.', 'fdgdfgfdg', 'dgdfg', 'cashier@cashier.com', 'Sri Lankan', 'Australia', 0, '5', '2019-03-07', '12:12:12.000000', 'Reject', 10000),
(3, 'Miss.', 'fdgdfgfdg', 'dgdfg', 'cashier@cashier.com', 'Sri Lankan', 'Australia', 0, '3', '2019-03-07', '12:12:12.000000', 'Conform', 5000),
(4, 'Dr.', 'gfhfh', 'fh', 'marking1@gmail.com', 'Sri Lankan', 'Albania', 0, '3', '2019-03-14', '13:01:00.000000', 'Not Conform', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phoneno` int(10) DEFAULT NULL,
  `email` text,
  `cdate` date DEFAULT NULL,
  `approval` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `phoneno`, `email`, `cdate`, `approval`) VALUES
(4, 'Imasha Arushkara', 716531833, '123@gmail.com', '2018-11-20', 'Not Allowed');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_no` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `join_date` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `designation` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_no`, `name`, `join_date`, `status`, `designation`, `contact`) VALUES
(1, 'E1001', 'John', 'Accountant', 1, '', '011484613'),
(9, '', '', '2018-11-21', 0, '', ''),
(35, 'E1002', 'Chamal', '2018-11-22', 1, 'It assistant', '0723562070'),
(36, '', '', '2019-03-23', 1, 'admin', ''),
(37, '11', 'tretetr', '2019-04-01', 1, 'admin', '0000fg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `usname` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usname`, `pass`, `role`, `active`) VALUES
(1, 'Admin', '1234', 'admin', 1),
(6, 'Manager', '1234', 'manager', 1),
(7, 'Reception', '1234', 'reception', 1),
(8, 'ssds', '1234', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletterlog`
--

CREATE TABLE `newsletterlog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(52) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `news` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletterlog`
--

INSERT INTO `newsletterlog` (`id`, `title`, `subject`, `news`) VALUES
(1, '', '', ''),
(2, '', '', ''),
(3, 'vfdvdfd', 'vfvfbr', 'vfbebtrbrcdc'),
(4, 'vfdvdfd', 'vfvfbr', 'vfbebtrbrcdc'),
(5, '', '', ''),
(6, 'AXzx', 'axasdad', 'axzcda');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `troom` varchar(30) DEFAULT NULL,
  `tbed` varchar(30) DEFAULT NULL,
  `nroom` int(11) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `ttot` double(8,2) DEFAULT NULL,
  `fintot` double(8,2) DEFAULT NULL,
  `mepr` double(8,2) DEFAULT NULL,
  `meal` varchar(30) DEFAULT NULL,
  `btot` double(8,2) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`, `fintot`, `mepr`, `meal`, `btot`, `noofdays`) VALUES
(1, 'Dr.', '', 'Koshila', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(4, 'Mrs.', 'suranga', 'u', 'Deluxe Room', 'Double', 1, '2018-11-08', '2018-11-30', 4840.00, 5130.40, 193.60, 'Breakfast', 96.80, 22),
(5, 'Miss.', 'amali', 'u', 'Deluxe Room', 'Single', 1, '2018-11-17', '2018-11-19', 440.00, 453.20, 8.80, 'Breakfast', 4.40, 2),
(6, 'Mr.', '', 'udugama', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(7, 'Prof.', '', 'Arushaka', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(8, 'Prof.', '', 'Amare', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(9, 'Mr.', '', 'Kukula', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(10, 'Mrs.', '', 'sdffs', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(11, 'Miss.', '', 'sdffs', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(12, 'Mr.', '', 'New', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0),
(23, 'Mr.', 'Sumal', 'Rathnayake', 'Superior Room', 'Single', 1, '2018-11-24', '2018-05-26', -58240.00, -59987.20, -1164.80, 'Breakfast', -582.40, -182),
(24, 'Dr.', 'Ravindu', 'Koshila', 'Guest House', 'Quad', 1, '2018-12-15', '2018-12-16', 180.00, 187.20, 0.00, 'Room only', 7.20, 1),
(25, 'Dr.', 'chamalj', 'nkvnern', 'Deluxe Room', 'Single', 1, '2019-01-24', '2019-01-31', 1540.00, 1555.40, 0.00, 'Room only', 15.40, 7),
(26, 'Mrs.', 'Amanda', 'Silva', 'Deluxe Room', 'Single', 1, '2019-01-31', '2019-02-01', 220.00, 228.80, 6.60, 'Half Board', 2.20, 1),
(27, 'Dr.', 'ravi', 'darchana', 'Superior Room', 'Single', 1, '2019-02-15', '2019-02-15', 0.00, 0.00, 0.00, 'Room only', 0.00, 0),
(28, 'Miss.', 'fdgdfgdf', 'sdffs', 'Deluxe Room', 'Double', 1, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, 'Room only', 0.00, 0),
(29, 'Dr.', 'New', 'New', 'Deluxe Room', 'Double', 1, '2019-03-06', '2019-03-05', -220.00, -224.40, 0.00, 'Room only', -4.40, -1),
(30, 'Dr.', 'hjytjy', 'tuiyuiyui', 'Superior Room', 'Triple', 1, '2019-03-06', '2019-03-19', 4160.00, 4784.00, 499.20, 'Full Board', 124.80, 13),
(31, 'Dr.', 'hjytjy', 'tuiyuiyui', 'Deluxe Room', 'Double', 1, '2019-03-27', '2019-03-21', -1320.00, -1399.20, -52.80, 'Breakfast', -26.40, -6),
(32, 'Dr.', 'hjytjy', 'tuiyuiyui', 'Superior Room', 'Single', 1, '2019-03-08', '2019-03-13', 1600.00, 1616.00, 0.00, 'Room only', 16.00, 5),
(33, 'Dr.', 'hjytjy', 'tuiyuiyui', 'Superior Room', 'Double', 1, '2019-03-06', '2019-03-21', 4800.00, 4896.00, 0.00, 'Room only', 96.00, 15),
(34, 'Dr.', 'hjytjy', 'tuiyuiyui', 'Deluxe Room', 'Double', 1, '2019-03-05', '2019-03-13', 1760.00, 1865.60, 70.40, 'Breakfast', 35.20, 8),
(35, 'Miss.', 'dsadsad', 'sdfsdf', 'Superior Room', 'Double', 1, '2019-03-13', '2019-03-29', 5120.00, 5222.40, 0.00, 'Room only', 102.40, 16),
(36, 'Miss.', 'sdadad', 'sdffs', 'Deluxe Room', 'Double', 1, '2019-03-21', '2019-03-19', -440.00, -448.80, 0.00, 'Room only', -8.80, -2),
(37, 'Miss.', 'sdadad', 'sdffs', 'Deluxe Room', 'Single', 1, '2019-03-12', '2019-03-19', 1540.00, 1555.40, 0.00, 'Room only', 15.40, 7),
(38, 'Miss.', 'New', 'sdffs', 'Deluxe Room', 'Double', 1, '2019-03-07', '2019-03-28', 4620.00, 4897.20, 184.80, 'Breakfast', 92.40, 21),
(39, 'Miss.', 'New', 'sdffs', 'Deluxe Room', 'Double', 1, '2019-03-20', '2019-03-28', 1760.00, 1795.20, 0.00, 'Room only', 35.20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `poolbook`
--

CREATE TABLE `poolbook` (
  `id` int(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `National` varchar(15) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `cinDate` date NOT NULL,
  `cinTime` time(6) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `payment` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poolbook`
--

INSERT INTO `poolbook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `Type`, `cinDate`, `cinTime`, `stat`, `payment`) VALUES
(1, 'Dr.', 'rtgr', 'grt', 'smaaa@gmail.com', 'Sri Lankan', 'Bahamas', 0, '2', '2019-03-07', '12:12:12.000000', 'Conform', 500);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `bedding` varchar(10) DEFAULT NULL,
  `place` varchar(10) DEFAULT NULL,
  `cusid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`, `place`, `cusid`) VALUES
(1, 'Superior Room', 'Single', 'NotFree', 32),
(2, 'Superior Room', 'Double', 'NotFree', 33),
(3, 'Superior Room', 'Triple', 'Free', 0),
(8, 'Deluxe Room', 'Triple', 'Free', 0),
(9, 'Deluxe Room', 'Quad', 'Free', NULL),
(10, 'Guest House', 'Single', 'Free', NULL),
(11, 'Guest House', 'Double', 'Free', NULL),
(12, 'Guest House', 'Quad', 'Free', 24),
(13, 'Single Room', 'Single', 'Free', NULL),
(14, 'Single Room', 'Double', 'Free', NULL),
(15, 'Guest House', 'Triple', 'Free', NULL),
(16, 'Deluxe Room', 'Single', 'NotFree', 37),
(17, 'Deluxe Room', 'Double', 'NotFree', 34),
(18, 'Guest House', 'Quad', 'NotFree', 24),
(19, 'Deluxe Room', 'Quad', 'Free', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `FName` text,
  `LName` text,
  `Email` varchar(50) DEFAULT NULL,
  `National` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Phone` text,
  `TRoom` varchar(20) DEFAULT NULL,
  `Bed` varchar(10) DEFAULT NULL,
  `NRoom` varchar(2) DEFAULT NULL,
  `Meal` varchar(15) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `stat` varchar(15) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`, `stat`, `nodays`) VALUES
(24, '', 'Ravindu', 'Koshila', 'abc@gmail.com', 'Sri Lankan', 'Bahamas', '077-4492476', 'Guest House', 'Quad', '1', 'Room only', '2018-12-15', '2018-12-16', 'Conform', 1),
(26, 'Dr.', 'Amanda', 'Silva', 'amanda@gmail.com', 'Sri Lankan', '', '0774521788', 'Deluxe Room', 'Single', '1', 'Half Board', '2019-01-31', '2019-02-01', 'Conform', 1),
(27, 'Dr.', 'ravi', 'darchana', 'ravi@gail.com', 'Sri Lankan', 'Sri Lanka', '077-0461482', 'Superior Room', 'Single', '1', 'Room only', '2019-02-15', '2019-02-15', 'Conform', 0),
(28, 'Miss.', 'fdgdfgdf', 'sdffs', 'sm@gmail.com', 'Sri Lankan', 'Bahamas', 'sdfs', 'Deluxe Room', 'Double', '1', 'Room only', '0000-00-00', '0000-00-00', 'Conform', NULL),
(29, 'Dr.', 'New', 'New', 'smaaa@gmail.com', 'Non Sri Lankan ', 'Argentina', 'sdfs', 'Deluxe Room', 'Double', '1', 'Room only', '2019-03-06', '2019-03-05', 'Conform', -1),
(31, 'Dr.', 'hjytjy', 'tuiyuiyui', 'admihhn@admin.com', 'Sri Lankan', 'Barbados', 'ytryry', 'Deluxe Room', 'Double', '1', 'Breakfast', '2019-03-27', '2019-03-21', 'Conform', -6),
(32, 'Dr.', 'hjytjy', 'tuiyuiyui', 'admihhn@admin.com', 'Sri Lankan', 'Bangladesh', 'ytryry', 'Superior Room', 'Single', '1', 'Room only', '2019-03-08', '2019-03-13', 'Conform', 5),
(33, 'Dr.', 'hjytjy', 'tuiyuiyui', 'admihhn@admin.com', 'Sri Lankan', 'Bangladesh', 'ytryry', 'Superior Room', 'Double', '1', 'Room only', '2019-03-06', '2019-03-21', 'Conform', 15),
(34, 'Dr.', 'hjytjy', 'tuiyuiyui', 'admihhn@admin.com', 'Sri Lankan', 'Bangladesh', 'ytryry', 'Deluxe Room', 'Double', '1', 'Breakfast', '2019-03-05', '2019-03-13', 'Reject', 8),
(35, 'Miss.', 'dsadsad', 'sdfsdf', 'marking1@gmail.com', 'Sri Lankan', 'Albania', 'dsad', 'Superior Room', 'Double', '1', 'Room only', '2019-03-13', '2019-03-29', 'Conform', 16),
(36, 'Miss.', 'sdadad', 'sdffs', 'sm@gmail.com', 'Sri Lankan', 'Barbados', 'wfdsfs', 'Deluxe Room', 'Double', '1', 'Room only', '2019-03-21', '2019-03-19', 'Conform', -2),
(37, 'Miss.', 'sdadad', 'sdffs', 'sm@gmail.com', 'Sri Lankan', 'Barbados', 'wfdsfs', 'Deluxe Room', 'Single', '1', 'Room only', '2019-03-12', '2019-03-19', 'Conform', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tempuser`
--

CREATE TABLE `tempuser` (
  `tu_id` int(11) NOT NULL,
  `tu_name` varchar(100) DEFAULT NULL,
  `tu_pw` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('test', 'pass'),
('test', 'pass'),
('test', 'pass'),
('root', '1234'),
('root', '1234'),
('New', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banquet`
--
ALTER TABLE `banquet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banquetbook`
--
ALTER TABLE `banquetbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banquetpayment`
--
ALTER TABLE `banquetpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafebook`
--
ALTER TABLE `cafebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poolbook`
--
ALTER TABLE `poolbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempuser`
--
ALTER TABLE `tempuser`
  ADD PRIMARY KEY (`tu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `banquet`
--
ALTER TABLE `banquet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banquetbook`
--
ALTER TABLE `banquetbook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banquetpayment`
--
ALTER TABLE `banquetpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cafebook`
--
ALTER TABLE `cafebook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `poolbook`
--
ALTER TABLE `poolbook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tempuser`
--
ALTER TABLE `tempuser`
  MODIFY `tu_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
