-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2021 at 03:41 AM
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
-- Database: `mca5`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

DROP TABLE IF EXISTS `product_table`;
CREATE TABLE IF NOT EXISTS `product_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` text NOT NULL,
  `photo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `name`, `price`, `category`, `photo`) VALUES
(1, 'Sweater', 350, 'clothes', 'images/1.jpeg'),
(2, 'Hoodies', 200, 'clothes', 'images/2.jpeg'),
(3, 'shirts', 210, 'clothes', 'images/3.jpeg'),
(4, 'MakeUp Brush', 210, 'cosmestic', 'images/4.jpeg'),
(5, 'Hair Caps', 110, 'cosmestic', 'images/5.jpeg'),
(6, 'Facial Pack', 300, 'cosmestic', 'images/6.jpeg'),
(7, 'boots', 500, 'footwear', 'images/7.jpeg'),
(8, 'sneckers', 340, 'footwear', 'images/8.jpeg'),
(9, 'slippers', 110, 'footwear', 'images/9.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
