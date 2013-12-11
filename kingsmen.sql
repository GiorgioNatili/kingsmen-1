-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2013 at 09:04 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kingsmen`
--
CREATE DATABASE IF NOT EXISTS `kingsmen` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `kingsmen`;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Truncate table before insert `news`
--

TRUNCATE TABLE `news`;
--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `detail`, `created`, `modified`) VALUES
(17, 'KINGSMEN PARTY', 'Company party, which would be a marvelous chance to bring Kingsmen’s members closer with a great deal of ebullient and colorful activities, will be held on 6th May, 2013 at Sofitel Saigon Plaza, Ho Chi Minh city. After a hard-working year, let’s celebrate a authentically festive day for our own with utmost creativity and imagination. These activities include make-up show  through glorious comedy performances from three teams, which will be assessed by our respectful management board; Red costume competition for individuals in which awards will be given for those having sexiest  Kingsmen’s red items on their costumes; and beside that, the most attractive one could be mentioned will be lucky draw with surprising and superb prizes. Furthermore, company party would also be a precious occasion for our big family to recall beautiful memories in daily work and life, as well as our memorable bonding trip to Phu Quoc island in May, and last but not least, to give best greetings and wishes to each other on upcoming festive season.\n', '2013-12-10 06:16:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news_photo`
--

DROP TABLE IF EXISTS `news_photo`;
CREATE TABLE `news_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `full` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `news_photo`
--

TRUNCATE TABLE `news_photo`;
--
-- Dumping data for table `news_photo`
--

INSERT INTO `news_photo` (`id`, `news_id`, `full`, `thumb`) VALUES
(1, 7, '6717750.06695600 1386573931_full.jpg', '6717750.06695600 1386573931_thumb.jpg'),
(2, 7, '7973930.98049400 1386574013_full.jpg', '7973930.98049400 1386574013_thumb.jpg'),
(7, 17, '7040.68739400 1386656210_full.jpg', '7040.68739400 1386656210_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Truncate table before insert `project`
--

TRUNCATE TABLE `project`;
--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `type`, `location`, `created`, `modified`) VALUES
(23, 'Dior', 'interior', 'Vincom A, Ho Chi Minh', '2013-12-10 07:15:47', '0000-00-00 00:00:00'),
(24, 'Samsung', 'interior', 'Vincom A', '2013-12-10 07:37:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_photo`
--

DROP TABLE IF EXISTS `project_photo`;
CREATE TABLE `project_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `full` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `small` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `main` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=339 ;

--
-- Truncate table before insert `project_photo`
--

TRUNCATE TABLE `project_photo`;
--
-- Dumping data for table `project_photo`
--

INSERT INTO `project_photo` (`id`, `project_id`, `full`, `thumb`, `small`, `main`, `created`, `modified`) VALUES
(329, 23, 'Dior6_full.jpg', 'Dior6_thumb.jpg', 'Dior6_small.jpg', 0, '2013-12-10 07:16:13', '0000-00-00 00:00:00'),
(330, 23, 'Dior2_full.jpg', 'Dior2_thumb.jpg', 'Dior2_small.jpg', 0, '2013-12-10 07:16:15', '0000-00-00 00:00:00'),
(331, 23, 'Dior4_full.jpg', 'Dior4_thumb.jpg', 'Dior4_small.jpg', 1, '2013-12-10 07:16:34', '0000-00-00 00:00:00'),
(332, 23, 'Dior3_full.jpg', 'Dior3_thumb.jpg', 'Dior3_small.jpg', 0, '2013-12-10 07:16:15', '0000-00-00 00:00:00'),
(333, 23, 'Dior_full.jpg', 'Dior_thumb.jpg', 'Dior_small.jpg', 0, '2013-12-10 07:16:15', '0000-00-00 00:00:00'),
(334, 23, 'Dior5_full.jpg', 'Dior5_thumb.jpg', 'Dior5_small.jpg', 0, '2013-12-10 07:16:15', '0000-00-00 00:00:00'),
(336, 24, 'Samsung3_full.jpg', 'Samsung3_thumb.jpg', 'Samsung3_small.jpg', 0, '2013-12-10 07:38:09', '0000-00-00 00:00:00'),
(337, 24, 'Samsung_full.jpg', 'Samsung_thumb.jpg', 'Samsung_small.jpg', 1, '2013-12-10 07:38:16', '0000-00-00 00:00:00'),
(338, 24, 'Samsung2_full.jpg', 'Samsung2_thumb.jpg', 'Samsung2_small.jpg', 0, '2013-12-10 08:00:06', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
