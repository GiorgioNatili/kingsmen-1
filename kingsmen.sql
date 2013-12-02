-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2013 at 07:05 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `news`
--

TRUNCATE TABLE `news`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `news_photo`
--

TRUNCATE TABLE `news_photo`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `project`
--

TRUNCATE TABLE `project`;
--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `type`, `location`, `created`, `modified`) VALUES
(1, 'DIOR ', 'interior', 'Vincom A, Ho Cho Minh', '2013-12-01 19:09:38', '0000-00-00 00:00:00'),
(2, 'LOTTE CINEMA', 'interior', 'Bien Hoa', '2013-12-01 19:27:03', '0000-00-00 00:00:00'),
(4, 'Nescafe', 'event', 'Dac Lak', '2013-12-01 19:36:13', '0000-00-00 00:00:00'),
(5, 'PERTAMINA', 'exhibition', 'ASCOPE Vietnam 2013', '2013-12-02 02:05:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_photo`
--

DROP TABLE IF EXISTS `project_photo`;
CREATE TABLE `project_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `full` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `medium` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `small` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `main` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=176 ;

--
-- Truncate table before insert `project_photo`
--

TRUNCATE TABLE `project_photo`;
--
-- Dumping data for table `project_photo`
--

INSERT INTO `project_photo` (`id`, `project_id`, `full`, `medium`, `small`, `main`, `created`, `modified`) VALUES
(159, 1, 'Dior2d1.jpg', 'Dior2d2.jpg', 'Dior2d3.jpg', 1, '2013-12-01 18:54:31', '0000-00-00 00:00:00'),
(160, 1, 'Dior6d1.jpg', 'Dior6d2.jpg', 'Dior6d3.jpg', 0, '2013-12-01 18:54:14', '0000-00-00 00:00:00'),
(161, 1, 'Diord1.jpg', 'Diord2.jpg', 'Diord3.jpg', 0, '2013-12-01 18:54:14', '0000-00-00 00:00:00'),
(162, 1, 'Dior3d1.jpg', 'Dior3d2.jpg', 'Dior3d3.jpg', 0, '2013-12-01 18:54:14', '0000-00-00 00:00:00'),
(163, 1, 'Dior5d1.jpg', 'Dior5d2.jpg', 'Dior5d3.jpg', 0, '2013-12-01 18:54:14', '0000-00-00 00:00:00'),
(164, 1, 'Dior4d1.jpg', 'Dior4d2.jpg', 'Dior4d3.jpg', 0, '2013-12-01 18:54:14', '0000-00-00 00:00:00'),
(165, 2, 'IMG_1521d1.jpg', 'IMG_1521d2.jpg', 'IMG_1521d3.jpg', 1, '2013-12-01 19:23:23', '0000-00-00 00:00:00'),
(166, 2, 'IMG_1501d1.jpg', 'IMG_1501d2.jpg', 'IMG_1501d3.jpg', 0, '2013-12-01 19:19:25', '0000-00-00 00:00:00'),
(167, 2, 'IMG_1503d1.jpg', 'IMG_1503d2.jpg', 'IMG_1503d3.jpg', 0, '2013-12-01 19:19:27', '0000-00-00 00:00:00'),
(168, 2, 'IMG_1526d1.jpg', 'IMG_1526d2.jpg', 'IMG_1526d3.jpg', 0, '2013-12-01 19:19:35', '0000-00-00 00:00:00'),
(169, 2, 'IMG_1515d1.jpg', 'IMG_1515d2.jpg', 'IMG_1515d3.jpg', 0, '2013-12-01 19:19:47', '0000-00-00 00:00:00'),
(170, 2, 'IMG_1519d1.jpg', 'IMG_1519d2.jpg', 'IMG_1519d3.jpg', 0, '2013-12-01 19:19:49', '0000-00-00 00:00:00'),
(171, 2, 'IMG_1516d1.jpg', 'IMG_1516d2.jpg', 'IMG_1516d3.jpg', 0, '2013-12-01 19:19:51', '0000-00-00 00:00:00'),
(172, 2, 'IMG_1539d1.jpg', 'IMG_1539d2.jpg', 'IMG_1539d3.jpg', 0, '2013-12-01 19:19:54', '0000-00-00 00:00:00'),
(173, 2, 'IMG_1545d1.jpg', 'IMG_1545d2.jpg', 'IMG_1545d3.jpg', 0, '2013-12-01 19:19:54', '0000-00-00 00:00:00'),
(174, 4, 'Nescafed1.jpg', 'Nescafed2.jpg', 'Nescafed3.jpg', 1, '2013-12-01 19:39:43', '0000-00-00 00:00:00'),
(175, 5, 'pertaminad1.jpg', 'pertaminad2.jpg', 'pertaminad3.jpg', 1, '2013-12-01 20:01:43', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
