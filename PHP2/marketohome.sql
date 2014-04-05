-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2010 at 11:54 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marketohome`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` bigint(3) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MemberName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Province` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaritalStatus` char(1) COLLATE utf8_unicode_ci DEFAULT 'S',
  `Certificates` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsActivate` tinyint(3) unsigned DEFAULT '1',
  `UserType` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'Users',
  `Assign` tinyint(4) DEFAULT '0',
  `RegisterDate` date DEFAULT '0000-00-00',
  `LastLogin` date NOT NULL,
  UNIQUE KEY `UserID` (`UserID`),
  KEY `UserID_2` (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `MemberName`, `Address`, `Tel`, `Province`, `City`, `Gender`, `MaritalStatus`, `Certificates`, `IsActivate`, `UserType`, `Assign`, `RegisterDate`, `LastLogin`) VALUES
(1, 'hongvu@mail.com', '11111111', 'Lam Hong Vu', '2 Le Loi, Dist 1, HCM', '09065485', 'TTH', 'Hue', 'M', 'S', 'BS,MBS', 1, 'Users', 1, '2003-04-16', '2003-04-16'),
(4, 'huukhang@mail.com', '11111111', 'Pham Huu Khang', '17 Vo Van Tan Fist 3', '87788787', 'HCM', 'Ho Chi Minh', 'M', 'S', 'BA,BS,MBA', 1, 'Users', 1, '2003-04-15', '2003-04-15'),
(2, 'lan@mail.com', '11111111', 'Nguyen Thi Lan', '1 Le Van Sy', '56655665', 'HCM', 'Ho Chi Minh', 'F', 'M', 'BA,BS', 1, 'Users', 1, '2003-04-14', '2003-04-14'),
(3, 'hang@mail.com', '11111111', 'Tran Thu Hang', '12 Tran Hung Dao', '87878787', 'HAN', 'Ha Noi', 'F', 'M', 'BS,MBA', 1, 'Users', 1, '2003-04-13', '2003-04-13'),
(0, 'admin', 'admin', 'Administrator', '', '', 'ALL', 'ALL', 'M', 'S', NULL, 1, 'Admin', 0, '2003-04-01', '2003-04-01'),
(5, 'trang@hotmail.com', '34343434', 'Nguyen Thuy Trang', '23 Nguyen Van Troi Quan 3', '87878787', 'HCM', 'Tp Ho Chi Minh', 'F', 'S', 'BA,MBS', 0, 'Users', 0, '2003-04-12', '2003-04-12'),
(6, 'nhanvn@intranetvietnam.com', '98899898', '', '43 Duy Tan Q. 3', '060879797', 'DAN', 'Da Nang', 'M', 'S', 'MBA', 1, 'Users', 0, '2010-06-10', '2010-06-10');
