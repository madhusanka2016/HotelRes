-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 01:55 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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
(18, '2018-11-22', 'Chamal', '35', 'In', '2018-11-22 11:03:20');

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
(8, 'Prof.', 'Nalaka', 'Amare', 'rasangapradeep94@gmail.co', 'Sri Lankan', 'Sri Lanka', 77, 'Victorian Lobby', 'Fresh', 1, 'Half Board', '2019-02-04', '10:00:00.000000', 'Not Conform', ''),
(9, 'Mr.', 'Nalaka', 'Kukula', 'djwbv@gmail.com', 'Sri Lankan', 'Sri Lanka', 766894578, 'Citadel', 'Fresh', 1, 'Half Board', '2019-02-07', '10:00:00.000000', 'Not Conform', '');

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
(35, 'E1002', 'Chamal', '2018-11-22', 0, 'It assistant', '0723562070');

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
(7, 'Reception', '1234', 'reception', 1);

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
(5, '', '', '');

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
(7, 'Prof.', '', 'Arushaka', '', '', 0, '0000-00-00', '0000-00-00', 0.00, 0.00, 0.00, '', 0.00, 0);

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
(1, 'Superior Room', 'Single', 'Free', 0),
(2, 'Superior Room', 'Double', 'Free', 0),
(3, 'Superior Room', 'Triple', 'Free', NULL),
(8, 'Deluxe Room', 'Triple', 'Free', 0),
(9, 'Deluxe Room', 'Quad', 'Free', NULL),
(10, 'Guest House', 'Single', 'Free', NULL),
(11, 'Guest House', 'Double', 'Free', NULL),
(12, 'Guest House', 'Quad', 'Free', NULL),
(13, 'Single Room', 'Single', 'Free', NULL),
(14, 'Single Room', 'Double', 'Free', NULL),
(15, 'Guest House', 'Triple', 'Free', NULL);

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
(23, 'Mr.', 'Sumal', 'Rathnayake', 'sumal@gmail.com', 'Sri Lankan', 'Sri Lanka', '077-4492476', 'Superior Room', 'Single', '1', 'Breakfast', '2018-11-24', '2018-05-26', 'Not Conform', -182),
(24, 'Dr.', 'Ravindu', 'Koshila', 'abc@gmail.com', 'Sri Lankan', 'Bangladesh', '077-4492476', 'Guest House', 'Quad', '1', 'Room only', '2018-12-15', '2018-12-16', 'Not Conform', 1),
(25, 'Dr.', 'chamalj', 'nkvnern', 'test@gmail.com', 'Sri Lankan', 'Sri Lanka', '0704127845', 'Deluxe Room', 'Single', '1', 'Room only', '2019-01-24', '2019-01-31', 'Not Conform', 7),
(26, 'Mrs.', 'Amanda', 'Silva', 'amanda@gmail.com', 'Sri Lankan', 'Sri Lanka', '0774521788', 'Deluxe Room', 'Single', '1', 'Half Board', '2019-01-31', '2019-02-01', 'Not Conform', 1),
(27, 'Dr.', 'ravi', 'darchana', 'ravi@gail.com', 'Sri Lankan', 'Sri Lanka', '077-0461482', 'Superior Room', 'Single', '1', 'Room only', '2019-02-15', '2019-02-15', 'Not Conform', 0);

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
('test', 'pass');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `banquet`
--
ALTER TABLE `banquet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banquetbook`
--
ALTER TABLE `banquetbook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banquetpayment`
--
ALTER TABLE `banquetpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
