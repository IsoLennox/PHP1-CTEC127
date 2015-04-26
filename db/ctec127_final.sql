-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2015 at 09:46 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctec127_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_page_content`
--

CREATE TABLE IF NOT EXISTS `home_page_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(900) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `home_page_content`
--

INSERT INTO `home_page_content` (`id`, `content`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem odit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem odit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem odit.'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem odit.'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis dolorem, maiores culpa accusantium sit qui aperiam quam veniam in ex commodi nostrum omnis, suscipit inventore. Recusandae quae soluta autem odit.'),
(4, 'uploads/04_03_1-Stock-Market-Prices_web.jpg'),
(5, 'uploads/Capture.PNG'),
(6, 'uploads/cityheader.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(60) NOT NULL,
  `content` varchar(900) NOT NULL,
  `title` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `datetime`, `content`, `title`) VALUES
(5, 'February 26, 2015 a	 4:07pm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro et laboriosam animi repellat corporis, fugiat perspiciatis laudantium consequuntur totam accusantium ea voluptatem, mollitia minima aliquam. Nulla temporibus facilis autem iste. ', 'Net Neutrality'),
(8, 'February 26, 2015  7:13pm', 'no more a!', 'Fixed timestamp'),
(9, 'February 26, 2015  7:54pm', 'News Page is up and running!', 'Big News');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(11) NOT NULL,
  `shipped` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `address`, `city`, `state`, `zip`, `shipped`) VALUES
(1, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1),
(2, 'Janet', 'Jackson', 'kkfsjsfh', 'ldhf', 'wa', '98771', 0),
(3, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 0),
(4, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 0),
(5, 'ad', 'sdg', 'sgsdg', 'sgdsd', 'wa', '98661', 0),
(6, 'Isobel', 'Lennox', '5465 Drury Lane', 'vancouver', 'wa', '98664', 1);

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
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `filepath` varchar(60) NOT NULL,
  `price` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `filepath`, `price`) VALUES
(2, 'Romulan Poster', 'Defeat the Federation with inspiration from this Romulan poster!!', 'uploads/romulaa1n.png', '$35.00'),
(3, 'Infected USB', 'Terrorize your acquaintances with this infected USB flash drive! ', 'uploads/0-usb_stick.jpg', '$45.00');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `avatar` varchar(60) NOT NULL,
  `datetime` varchar(60) NOT NULL,
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `name`, `avatar`, `datetime`, `content`) VALUES
(2, 'Zora', 'uploads/20140304232012.jpg', 'February 26, 2015 a	 6:58pm', 'Bubble Guppies!'),
(3, 'Romulan', 'uploads/romulaan.png', 'February 27, 2015 a	 6:32pm', 'Peace and Long Life, Nimoy <3');

-- --------------------------------------------------------

--
-- Table structure for table `subscribed`
--

CREATE TABLE IF NOT EXISTS `subscribed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subscribed`
--

INSERT INTO `subscribed` (`id`, `email`, `name`) VALUES
(1, 'isolennox@gmail.com', 'Isobel'),
(2, 'ilennox@clark.edu', 'Romulan'),
(3, 'techhub@clark.edu', 'Romulan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
