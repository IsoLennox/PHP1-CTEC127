-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 06:05 PM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ilennox_ctec127`
--

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE IF NOT EXISTS `headers` (
  `id` int(11) NOT NULL,
  `filepath` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_content`
--

CREATE TABLE IF NOT EXISTS `home_page_content` (
  `id` int(11) NOT NULL,
  `content` varchar(900) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page_content`
--

INSERT INTO `home_page_content` (`id`, `content`) VALUES
(1, 'Hi'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem odit.'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem odit.'),
(4, 'uploads/04_03_1-Stock-Market-Prices_web.jpg'),
(5, 'uploads/Capture.PNG'),
(6, '6');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `datetime` varchar(60) NOT NULL,
  `content` varchar(900) NOT NULL,
  `title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(11) NOT NULL,
  `shipped` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `address`, `city`, `state`, `zip`, `shipped`) VALUES
(1, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1),
(2, 'Janet', 'Jackson', 'kkfsjsfh', 'ldhf', 'wa', '98771', 1),
(3, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1),
(4, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1),
(5, 'ad', 'sdg', 'sgsdg', 'sgdsd', 'wa', '98661', 1),
(6, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1),
(7, 'Isobel', 'Lennox', '6423 cankse ln', 'vancouver', 'wa', '98664', 1),
(8, 'sdfsdf', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1),
(9, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1),
(10, 'dfhdh', 'dfhdfh', 'dfhdfh', 'dfhd', 'wa', '34534', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `order_id` int(7) NOT NULL,
  `product_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`) VALUES
(1, 2),
(2, 3),
(2, 2),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(6, 2),
(7, 2),
(8, 2),
(8, 3),
(9, 3),
(9, 2),
(9, 3),
(10, 3),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `filepath` varchar(60) NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `avatar` varchar(60) NOT NULL,
  `datetime` varchar(60) NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribed`
--

CREATE TABLE IF NOT EXISTS `subscribed` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribed`
--

INSERT INTO `subscribed` (`id`, `email`, `name`) VALUES
(1, 'isolennox@gmail.com', 'Isobel'),
(2, 'ilennox@clark.edu', 'Romulan'),
(3, 'techhub@clark.edu', 'Romulan'),
(4, 'belgort@clark.edu', 'Frank'),
(5, 'iudf@kjhsg.', 'isobel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_content`
--
ALTER TABLE `home_page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `home_page_content`
--
ALTER TABLE `home_page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribed`
--
ALTER TABLE `subscribed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
