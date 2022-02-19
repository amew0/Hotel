-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2021 at 06:16 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('Smith', 'php');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `bookingid` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `customerusername` varchar(20) NOT NULL,
  `checkintime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`bookingid`),
  KEY `fk_roomid` (`roomid`),
  KEY `fk_customerusername` (`customerusername`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`username`, `password`) VALUES
('Abdulrahman', '123456'),
('Mahmud', '312321'),
('Sara', '456789'),
('amine', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationId` int(255) NOT NULL AUTO_INCREMENT,
  `roomId` int(255) NOT NULL,
  `cUsername` varchar(255) NOT NULL,
  `checkinTime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`reservationId`),
  KEY `fk_cUsername` (`cUsername`),
  KEY `fk_roomId` (`roomId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `roomaddress` int(11) NOT NULL,
  `roomtype` varchar(20) NOT NULL,
  `roomstatus` varchar(20) NOT NULL,
  PRIMARY KEY (`roomaddress`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomaddress`, `roomtype`, `roomstatus`) VALUES
(1, 'King', 'Available'),
(3, 'Queen', 'Available'),
(2, 'Single', 'Available'),
(4, 'Twin', 'Available'),
(5, 'Double', 'Available'),
(6, 'King', 'Available');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
