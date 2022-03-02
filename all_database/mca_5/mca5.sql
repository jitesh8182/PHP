-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2022 at 06:08 PM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `add_stud`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_stud` (IN `nm` VARCHAR(20), IN `gen` VARCHAR(10), IN `hob` VARCHAR(20), IN `eml` VARCHAR(25), IN `pass` VARCHAR(10), IN `ct` VARCHAR(8))  BEGIN
	INSERT into student(name,gender,hobby,email,password,city)VALUES(nm,gen,hob,eml,pass,ct);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

DROP TABLE IF EXISTS `cart_table`;
CREATE TABLE IF NOT EXISTS `cart_table` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cate_table`
--

DROP TABLE IF EXISTS `cate_table`;
CREATE TABLE IF NOT EXISTS `cate_table` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cate_table`
--

INSERT INTO `cate_table` (`cat_id`, `name`) VALUES
(1, 'electronic'),
(2, 'clothes'),
(3, 'devices');

-- --------------------------------------------------------

--
-- Table structure for table `contact_detail`
--

DROP TABLE IF EXISTS `contact_detail`;
CREATE TABLE IF NOT EXISTS `contact_detail` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_detail`
--

INSERT INTO `contact_detail` (`con_id`, `name`, `mobile`, `email`) VALUES
(2, 'ravi', '991366008', 'ha78@gm.com'),
(6, 'tarun', '9920390322', 'tar89@gm.com'),
(4, 'ramesh', '9902901234', 'rm89@gm.com');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `department` text NOT NULL,
  `designation` text NOT NULL,
  `salary` int(11) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `hobby` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `name`, `department`, `designation`, `salary`, `gender`, `dob`, `address`, `hobby`) VALUES
(1, 'jaydip', 'finance', 'manager', 100000, 'm', '1999-12-03', '58 paras soc', 'sports,music,reading');

-- --------------------------------------------------------

--
-- Table structure for table `fares_table`
--

DROP TABLE IF EXISTS `fares_table`;
CREATE TABLE IF NOT EXISTS `fares_table` (
  `far_id` int(11) NOT NULL AUTO_INCREMENT,
  `veh_type` text NOT NULL,
  `sin_rate` int(11) NOT NULL,
  `dbl_rate` int(11) NOT NULL,
  PRIMARY KEY (`far_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intr_exam`
--

DROP TABLE IF EXISTS `intr_exam`;
CREATE TABLE IF NOT EXISTS `intr_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `img` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intr_exam`
--

INSERT INTO `intr_exam` (`id`, `name`, `img`, `price`) VALUES
(1, 'mouse', 'img1', 100),
(2, 'keyboard', 'img2', 150),
(3, 'monitor', 'img3', 200);

-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

DROP TABLE IF EXISTS `item_table`;
CREATE TABLE IF NOT EXISTS `item_table` (
  `itm_id` int(11) NOT NULL AUTO_INCREMENT,
  `itm_name` varchar(20) NOT NULL,
  `itm_price` int(11) NOT NULL,
  `itm_qty` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `itm_img` varchar(60) NOT NULL,
  PRIMARY KEY (`itm_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_table`
--

INSERT INTO `item_table` (`itm_id`, `itm_name`, `itm_price`, `itm_qty`, `cart_id`, `cat_id`, `itm_img`) VALUES
(17, 'monitor', 10000, 3, NULL, 1, 'upload/1641185148_09eb4c8946d43c75951a.jpg'),
(20, 'suit', 2000, 4, NULL, 2, 'upload/1641185433_b2c146759f26e2deef87.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loan_master`
--

DROP TABLE IF EXISTS `loan_master`;
CREATE TABLE IF NOT EXISTS `loan_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) NOT NULL,
  `loan` varchar(10) NOT NULL,
  `default1` varchar(10) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_master`
--

INSERT INTO `loan_master` (`id`, `age`, `loan`, `default1`, `distance`) VALUES
(1, 25, '40000', 'N', 102000),
(2, 35, '60000', 'N', 82000),
(3, 45, '80000', 'N', 62000),
(4, 20, '20000', 'N', 122000),
(5, 35, '120000', 'N', 22000),
(6, 52, '18000', 'N', 124000),
(7, 23, '95000', 'Y', 47000),
(8, 40, '62000', 'Y', 80000),
(9, 60, '100000', 'Y', 42000),
(10, 48, '220000', 'Y', 78000),
(11, 33, '150000', 'Y', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `user_pass`) VALUES
(5, 'jay38@gm.com', 'jay890'),
(4, 'naresh99@gmail.com', 'naresh90'),
(9, 'kumar34@gm.com', 'kumar45'),
(10, 'krunal90@gm.com', 'kru456'),
(11, 'kalpesh90@gm.com', 'kalpesh123');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

DROP TABLE IF EXISTS `login_table`;
CREATE TABLE IF NOT EXISTS `login_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(30) NOT NULL,
  `usr_pass` varchar(10) NOT NULL,
  `usr_type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `usr_name`, `usr_pass`, `usr_type`) VALUES
(1, 'ramesh23@gmail.com', 'ramesh123', 'user'),
(2, 'admin99@gmail.com', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'mouse', 25),
(2, 'monitor', 30),
(3, 'computer', 26);

-- --------------------------------------------------------

--
-- Table structure for table `product_exam`
--

DROP TABLE IF EXISTS `product_exam`;
CREATE TABLE IF NOT EXISTS `product_exam` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `img` int(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

DROP TABLE IF EXISTS `stud`;
CREATE TABLE IF NOT EXISTS `stud` (
  `rollno` int(11) NOT NULL,
  `name` text NOT NULL,
  `city` text NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`rollno`, `name`, `city`) VALUES
(1, 'ABC', 'Surat'),
(3, 'GHI', 'Bharuch\r\n'),
(2, 'JKI', 'Surat'),
(5, 'BVC', 'Baroda'),
(4, 'XYZ', 'Baroda');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hobby` varchar(40) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `city` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `gender`, `hobby`, `email`, `password`, `city`) VALUES
(37, 'purvi', 'female', 'cricket,running,', 'pur89@gm.cl', '123', 'Surat'),
(3, 'jay', 'male', 'reading,driving,', 'jay21@gm.co', 'harsh123', 'pune'),
(5, 'nayan', 'male', 'reading,driving,', 'nayan34@gm.com', 'nayan67', 'surat'),
(34, 'sagar', 'male', 'cricket,running,driving,', 'sagar45@gmail.cm', 'sagar456', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `tra_id` int(11) NOT NULL AUTO_INCREMENT,
  `veh_no` int(11) NOT NULL,
  `veh_type` int(11) NOT NULL,
  `far_type` int(11) NOT NULL COMMENT 'single/double',
  `tra_amount` int(11) NOT NULL,
  `tra_date` int(11) NOT NULL,
  `tra_time` int(11) NOT NULL,
  PRIMARY KEY (`tra_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_table`
--
ALTER TABLE `item_table`
  ADD CONSTRAINT `item_table_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cate_table` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
