-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema hotel
--

CREATE DATABASE IF NOT EXISTS hotel;
USE hotel;

--
-- Definition of table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `date` varchar(45) NOT NULL,
  `employee` varchar(45) NOT NULL,
  `emp_id` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` (`id`,`date`,`employee`,`emp_id`,`status`,`time`) VALUES 
 (8,'2018-11-18','John','1','In','2018-11-18 03:31:13'),
 (9,'2018-11-18','Jane','4','In','2018-11-18 03:31:23'),
 (10,'2018-11-18','John','5','In','2018-11-18 03:31:37'),
 (11,'2018-11-18','John','1','Out','2018-11-18 03:31:47'),
 (12,'2018-11-18','Jane','4','Out','2018-11-18 03:32:01');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;


--
-- Definition of table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fullname` varchar(100) default NULL,
  `phoneno` int(10) default NULL,
  `email` text,
  `cdate` date default NULL,
  `approval` varchar(12) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contact`
--

/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;


--
-- Definition of table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `emp_no` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `join_date` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL default '1',
  `designation` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`id`,`emp_no`,`name`,`join_date`,`status`,`designation`,`contact`) VALUES 
 (1,'E1001','John','Accountant',1,'','011484613'),
 (4,'E1002','Jane','',1,'','077464987'),
 (5,'E1003','John','2018-11-14',1,'Asst. Accountant','077464987');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


--
-- Definition of table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `usname` varchar(30) default NULL,
  `pass` varchar(30) default NULL,
  `role` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`,`usname`,`pass`,`role`,`active`) VALUES 
 (1,'Admin','1234','admin',1),
 (5,'John','123','reception',1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;


--
-- Definition of table `newsletterlog`
--

DROP TABLE IF EXISTS `newsletterlog`;
CREATE TABLE `newsletterlog` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(52) default NULL,
  `subject` varchar(100) default NULL,
  `news` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletterlog`
--

/*!40000 ALTER TABLE `newsletterlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletterlog` ENABLE KEYS */;


--
-- Definition of table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(5) default NULL,
  `fname` varchar(30) default NULL,
  `lname` varchar(30) default NULL,
  `troom` varchar(30) default NULL,
  `tbed` varchar(30) default NULL,
  `nroom` int(11) default NULL,
  `cin` date default NULL,
  `cout` date default NULL,
  `ttot` double(8,2) default NULL,
  `fintot` double(8,2) default NULL,
  `mepr` double(8,2) default NULL,
  `meal` varchar(30) default NULL,
  `btot` double(8,2) default NULL,
  `noofdays` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `payment`
--

/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`id`,`title`,`fname`,`lname`,`troom`,`tbed`,`nroom`,`cin`,`cout`,`ttot`,`fintot`,`mepr`,`meal`,`btot`,`noofdays`) VALUES 
 (3,'Miss.','hasanka','w','Superior Room','Single',1,'2018-11-09','2018-11-30',6720.00,6787.20,0.00,'Room only',67.20,21),
 (4,'Mrs.','suranga','u','Deluxe Room','Double',1,'2018-11-08','2018-11-30',4840.00,5130.40,193.60,'Breakfast',96.80,22),
 (5,'Miss.','amali','u','Deluxe Room','Single',1,'2018-11-17','2018-11-19',440.00,453.20,8.80,'Breakfast',4.40,2);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;


--
-- Definition of table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` varchar(15) default NULL,
  `bedding` varchar(10) default NULL,
  `place` varchar(10) default NULL,
  `cusid` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` (`id`,`type`,`bedding`,`place`,`cusid`) VALUES 
 (1,'Superior Room','Single','Free',0),
 (2,'Superior Room','Double','Free',0),
 (3,'Superior Room','Triple','Free',NULL),
 (4,'Single Room','Quad','Free',NULL),
 (5,'Superior Room','Quad','Free',NULL),
 (6,'Deluxe Room','Single','Free',0),
 (7,'Deluxe Room','Double','NotFree',4),
 (8,'Deluxe Room','Triple','Free',0),
 (9,'Deluxe Room','Quad','Free',NULL),
 (10,'Guest House','Single','Free',NULL),
 (11,'Guest House','Double','Free',NULL),
 (12,'Guest House','Quad','Free',NULL),
 (13,'Single Room','Single','Free',NULL),
 (14,'Single Room','Double','Free',NULL),
 (15,'Single Room','Triple','Free',NULL);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;


--
-- Definition of table `roombook`
--

DROP TABLE IF EXISTS `roombook`;
CREATE TABLE `roombook` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `Title` varchar(5) default NULL,
  `FName` text,
  `LName` text,
  `Email` varchar(50) default NULL,
  `National` varchar(30) default NULL,
  `Country` varchar(30) default NULL,
  `Phone` text,
  `TRoom` varchar(20) default NULL,
  `Bed` varchar(10) default NULL,
  `NRoom` varchar(2) default NULL,
  `Meal` varchar(15) default NULL,
  `cin` date default NULL,
  `cout` date default NULL,
  `stat` varchar(15) default NULL,
  `nodays` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roombook`
--

/*!40000 ALTER TABLE `roombook` DISABLE KEYS */;
INSERT INTO `roombook` (`id`,`Title`,`FName`,`LName`,`Email`,`National`,`Country`,`Phone`,`TRoom`,`Bed`,`NRoom`,`Meal`,`cin`,`cout`,`stat`,`nodays`) VALUES 
 (16,'Miss.','hasanka','u','arvienravan@gmail.com','Sri Lankan','Bahrain','58686','Superior Room','Double','1','Room only','2018-11-07','2018-11-22','Not Conform',15),
 (17,'Miss.','hasanka','u','hghh@gmail.com','Sri Lankan','Bahrain','58686','Deluxe Room','Double','1','Breakfast','2018-11-15','2018-11-30','Not Conform',15);
/*!40000 ALTER TABLE `roombook` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
