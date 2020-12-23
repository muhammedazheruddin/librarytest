-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 04:13 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `books_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `user_mobile` text NOT NULL,
  `user_email` text NOT NULL,
  `roletype` text NOT NULL,
  `user_password` text NOT NULL,
  `user_img` text NOT NULL,
  `last_updated` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `first_name`, `last_name`, `user_mobile`, `user_email`, `roletype`, `user_password`, `user_img`, `last_updated`) VALUES
(1, 'N', 'GENS', '7337594910', 'ngenssoftware@gmail.com', 'SUPERADMIN', 'e10adc3949ba59abbe56e057f20f883e', 'admin.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` text NOT NULL,
  `category_id` text NOT NULL,
  `book_title` text NOT NULL,
  `book_description` text NOT NULL,
  `book_url` text NOT NULL,
  `book_image` text NOT NULL,
  `upload_date_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_id`, `category_id`, `book_title`, `book_description`, `book_url`, `book_image`, `upload_date_time`) VALUES
(1, '115349BNO6339', 'Adventure', 'The Kite Runn', '<p>KITE RUNN<br></p>', 'http://ngens.in', '1-The-Kite-Runner-Riverhead-Edition.jpg', '10-12-2020 11:53:49'),
(2, '115443BNO5178', 'Fiction', 'Think & Grow', '<p>Think &amp; Grow<br></p>', 'http://ngens.in', '41+eK8zBwQL._AC_SX184_.jpg', '10-12-2020 11:54:43'),
(3, '120010BNO6778', 'Adventure', 'Robin Sharma', '<p>RS<br></p>', 'http://ngens.in', '2824c724c5a8a3b3c871c69b3dfd138f.jpg', '10-12-2020 12:00:10'),
(4, '120216BNO7345', 'Fiction', 'Cage of Souls', '<p>Cage of Souls<br></p>', 'http://ngens.in', 'BC_1788547381.jpg', '10-12-2020 12:02:16'),
(5, '121532BNO7522', 'Adventure', 'OLD DRIFT', '<p>OLD DRIFT<br></p>', 'http://ngens.in', 'images.jpg', '10-12-2020 12:15:32'),
(6, '011324BNO4529', 'Spiritual', 'Paying Guest', '<p>TEST<br></p>', 'http://ngens.in', 'Paying_Guests.jpg', '10-12-2020 01:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` text NOT NULL,
  `category_name` text NOT NULL,
  `cat_comments` text NOT NULL,
  `upload_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `cat_id`, `category_name`, `cat_comments`, `upload_date`) VALUES
(1, 'CAT63356', 'Fiction', 'Fiction', '10-12-2020 11:45:39'),
(2, 'CAT12772', 'Adventure', 'Adventure', '10-12-2020 11:45:52'),
(3, 'CAT18977', 'Spiritual', 'Spiritual books category', '10-12-2020 01:12:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
