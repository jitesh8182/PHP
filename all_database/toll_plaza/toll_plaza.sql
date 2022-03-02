-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2022 at 06:12 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toll_plaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `fares`
--

DROP TABLE IF EXISTS `fares`;
CREATE TABLE IF NOT EXISTS `fares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(20) NOT NULL,
  `single_rate` int(5) NOT NULL,
  `double_rate` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fares`
--

INSERT INTO `fares` (`id`, `vehicle_type`, `single_rate`, `double_rate`) VALUES
(1, 'Four Wheeler', 100, 200),
(2, 'Two Wheeler', 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `user_type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pwd`, `user_type`) VALUES
(1, 'fenil292', 'f123', 1),
(2, 'rahul452', 'r123', 0),
(3, 'yogesh', 'y123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_no` varchar(20) NOT NULL,
  `vehicle_type` varchar(20) NOT NULL,
  `fare` varchar(20) NOT NULL,
  `amount` int(5) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `vehicle_no`, `vehicle_type`, `fare`, `amount`, `date`) VALUES
(2, 'GJ05LR8563', 'Two Wheeler', 'Single', 50, '2021-12-28 12:01:44'),
(3, 'GJ05EM3105', 'Two Wheeler', 'Double', 100, '2022-01-05 10:39:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
