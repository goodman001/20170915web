-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2017 at 11:25 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `famaxdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `admin_id` int(20) NOT NULL,
  `uname` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pword` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`admin_id`, `uname`, `pword`) VALUES
(1001, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE IF NOT EXISTS `CATEGORY` (
  `category_id` int(20) NOT NULL,
  `category_name` char(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`category_id`, `category_name`) VALUES
(80001, 'Basket'),
(80002, 'Coffee Mug'),
(80003, 'Decoration'),
(80004, 'Map'),
(80005, 'Pen'),
(80006, 'Plush Toy'),
(80007, 'Wall Hanging');

-- --------------------------------------------------------

--
-- Table structure for table `CLIENT`
--

CREATE TABLE IF NOT EXISTS `CLIENT` (
  `client_id` int(20) NOT NULL,
  `client_gname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `client_fname` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `client_street` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_suburb` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_state` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_pc` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_email` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_mobile` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_mailinglist` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE IF NOT EXISTS `PRODUCT` (
  `product_id` int(20) NOT NULL,
  `product_name` char(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_purchase_price` decimal(10,2) DEFAULT NULL,
  `product_sale_price` decimal(10,2) DEFAULT NULL,
  `product_country_of_origin` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`product_id`, `product_name`, `product_purchase_price`, `product_sale_price`, `product_country_of_origin`) VALUES
(1505480327, 'aaa', 12.00, 2.00, 'd'),
(1505480777, 'affff', 1.20, 1.20, 'd'),
(1505480817, 'affffdfefef', 1.20, 1.20, 'd'),
(1505483774, 'adfeffefe', 12.00, 2.00, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_CATEGORY`
--

CREATE TABLE IF NOT EXISTS `PRODUCT_CATEGORY` (
  `product_id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `fk_category` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PRODUCT_CATEGORY`
--

INSERT INTO `PRODUCT_CATEGORY` (`product_id`, `category_id`) VALUES
(1505483774, 80001),
(1505480327, 80002),
(1505483774, 80005),
(1505480327, 80006),
(1505480327, 80007);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_IMAGE`
--

CREATE TABLE IF NOT EXISTS `PRODUCT_IMAGE` (
  `image_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `image_name` char(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `fk_product_IMAGE` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PROJECT`
--

CREATE TABLE IF NOT EXISTS `PROJECT` (
  `project_id` int(20) NOT NULL,
  `project_desc` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_country` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_city` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `PRODUCT_CATEGORY`
--
ALTER TABLE `PRODUCT_CATEGORY`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `CATEGORY` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `PRODUCT` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PRODUCT_IMAGE`
--
ALTER TABLE `PRODUCT_IMAGE`
  ADD CONSTRAINT `fk_product_IMAGE` FOREIGN KEY (`product_id`) REFERENCES `PRODUCT` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
