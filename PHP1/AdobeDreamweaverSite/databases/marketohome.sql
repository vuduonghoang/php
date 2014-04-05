-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2009 at 08:25 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `martketohome`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestselleritems`
--

CREATE TABLE IF NOT EXISTS `bestselleritems` (
  `ItemID` bigint(3) NOT NULL DEFAULT '0',
  `ItemName` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AuthID` tinyint(3) unsigned DEFAULT '0',
  `CateID` tinyint(3) unsigned DEFAULT '0',
  `ProID` tinyint(3) unsigned DEFAULT '1',
  `Pages` int(3) unsigned DEFAULT '0',
  `Price` int(3) unsigned DEFAULT '0',
  `PublishYear` char(7) COLLATE utf8_unicode_ci DEFAULT 'This Ye',
  `Edition` tinyint(3) unsigned DEFAULT '1',
  `LangID` char(3) COLLATE utf8_unicode_ci DEFAULT 'VIE',
  `CustTypeID` tinyint(3) unsigned DEFAULT '1',
  `Size` char(20) COLLATE utf8_unicode_ci DEFAULT '320x520',
  `Weight` float DEFAULT '2',
  `Status` tinyint(3) unsigned DEFAULT '1',
  `Relations` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `Filezip` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `ImagePath` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `Activate` tinyint(3) unsigned DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bestselleritems`
--

INSERT INTO `bestselleritems` (`ItemID`, `ItemName`, `Description`, `AuthID`, `CateID`, `ProID`, `Pages`, `Price`, `PublishYear`, `Edition`, `LangID`, `CustTypeID`, `Size`, `Weight`, `Status`, `Relations`, `Filezip`, `ImagePath`, `Activate`) VALUES
(2, 'Lap Trinh Chuyen Nghiep SQL Server 2000 Tap 1', 'Lap Trinh Chuyen Nghiep SQL Server 2000, Database Analysic and Design, SQL Language, Database Objects: Tables, Views, Stored Procedure, RUles, Funcitons. Triggers, Transactions, Accounting System Exam', 1, 3, 1, 620, 42000, '05/2001', 1, 'VIE', 1, '320x520', 520, 1, '1,4,5,6,7,8,11,12', '', '', 1),
(3, 'Lap Trinh Chuyen Nghiep SQL Server 2000 Tap 2', 'Lap Trinh Chuyen Nghiep SQL Server 2000, Database Analysic and Design, Administrator Module, Full Search Text, Query English, Visual Basic and SQL Server , Accounting System Exam', 1, 3, 1, 550, 40000, '01/2002', 1, 'VIE', 1, '320x520', 450, 1, '1,4,5,6,7,8,11,12', '', '', 1),
(5, 'Visual Basic.NET Tap 2', 'Visual Basic.NET, SQL Server 2000, ASP.NET, Web Services', 1, 1, 1, 650, 72000, '07/2002', 1, 'VIE', 1, '320x520', 450, 1, '2,3', '', '', 1),
(6, 'Visual C Sharp .NET Tap 1', 'C Sharp Co Ban', 1, 1, 1, 620, 65000, '05/2002', 1, 'VIE', 1, '320x520', 300, 1, '', '', '', 1),
(7, 'Visual C Sharp .NET Tap 2', 'C Sharp Co Ban', 1, 1, 1, 620, 45000, '05/2002', 1, 'VIE', 1, '320x520', 400, 1, '2,3', '', '', 1),
(10, 'Xay Dung va Trien Khai Ung Dung Thuong Mai Dien Tu bang ASP, SQL Server, Visual Basic, JavaScript.', 'Xay Dung va Trien Khai Ung Dung Thuong Mai Dien Tu bang ASP, SQL Server, Visual Basic, JavaScript, HTML, COM, DCOM, DLL, Mail, Upload, Administration Modules, ...', 1, 5, 1, 1200, 120000, '07/2003', 1, 'VIE', 1, '320x520', 250, 1, '2,3', '', '', 1),
(4, 'PHP and MySQL', 'PHP and MySQL, Oracle, PostgreSQL, MS Access, SQL Server', 1, 5, 1, 900, 90000, '04/2003', 1, 'VIE', 1, '21x25', 600, 1, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GroupId` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`CategoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `CategoryName`, `GroupId`) VALUES
(1, 'Programming Languages', 1),
(2, 'Software Solutions', 1),
(3, 'Databases', 1),
(4, 'Hardware', 1),
(5, 'Web Developement', 1),
(6, 'Web Design', 1),
(7, 'Operating Systems', 1),
(8, 'Microsoft Office', 1),
(9, 'Languages', 1),
(10, 'Poem', 1),
(11, 'Graphic', 1),
(12, 'Business for Everybody', 4);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `CountryCode` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `CountryName` char(50) COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryCode`, `CountryName`) VALUES
('VIE', 'Viet Nam'),
('CHN', 'China'),
('USS', 'United State'),
('UK', 'United Kingdom'),
('THA', 'Thai Land'),
('JAP', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerId` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Password` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `CustomerName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `Tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `FaxNo` varchar(10) COLLATE utf8_unicode_ci DEFAULT '',
  `Contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `CountryCode` char(3) COLLATE utf8_unicode_ci DEFAULT 'VIE',
  `ProvinceCode` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Activate` tinyint(4) DEFAULT '1',
  `City` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `RegisterDate` date DEFAULT '0000-00-00',
  `LastLogin` date DEFAULT '0000-00-00',
  PRIMARY KEY (`CustomerId`),
  KEY `CustID` (`CustomerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerId`, `Username`, `Password`, `CustomerName`, `Address`, `Tel`, `FaxNo`, `Contact`, `CountryCode`, `ProvinceCode`, `Activate`, `City`, `RegisterDate`, `LastLogin`) VALUES
(1, 'honglan@mail.com', '11111111', 'Nguyen Thi Hong Lan', '192 Tran Hung Dao, F1, Q.5', '98989898', '', 'Lan (Den)', 'VIE', 'QNA', 1, 'Tp Ho Chi Minh', '2003-03-14', '2003-05-14'),
(5, 'minhkhue@yahoo.com', '11111111', 'Nguyen Tran Minh Khue', '2 Thao Dien, Dist 2.,', '98989898', NULL, 'Khue', 'VIE', 'HCM', 1, 'Ho Chi Minh', '2003-03-14', '2003-05-14'),
(6, 'phuonguyen@hotmail.com', '22222222', 'Phuong Uyen Company', '12 Hong Ha, F. Lien Chieu, Da Nang', '06059686960', '060565656', 'Hong Ha Uyen', 'VIE', 'DAN', 1, 'Tp Da Nang', '2003-03-14', '2003-05-14'),
(2, 'maianh@fpt.com.vn', 'maianh', 'Nguyen Thi Mai Anh', '45 Le Van Sy, F12, Quan 3', '8787878', '3223232', 'Anh', 'VIE', 'CAN', 1, 'Tp Ho Chi Minh', '2003-04-14', '2003-05-14'),
(3, 'duykhanh@yahoo.com', 'duykhanh', 'Pham Huu Duy Khanh', '56 Vuon Lai, F 17, Tan Binh', '090978787', '8732322', 'Khanh', 'VIE', 'DON', 1, 'Tp Ho Chi Minh', '2003-04-14', '2003-05-14'),
(7, 'nvmquang@yahoo.com', 'nvmquang', 'Nguyen Viet Minh Quang', '6 Le Loi, Trung tam Cong nghe phan mem Hue', '054898798', '054687879', 'Quang', 'VIE', 'TTH', 0, 'TT-HUE', '2003-05-01', '2003-05-14'),
(12, 'ha@yahoo.com', '11111111', 'Pham Thi Thu Ha', '102 Le Duan, Dist 2, HCM', '09065485', '8211212', 'Ha Khue', 'VIE', 'ANG', 1, '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customertype`
--

CREATE TABLE IF NOT EXISTS `customertype` (
  `CustomerTypeId` tinyint(3) NOT NULL AUTO_INCREMENT,
  `CustomerTypeName` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CustomerTypeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customertype`
--

INSERT INTO `customertype` (`CustomerTypeId`, `CustomerTypeName`) VALUES
(1, 'Children'),
(2, 'Adult'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `GroupId` tinyint(3) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupId`, `GroupName`) VALUES
(1, 'Computer'),
(2, 'Electronics'),
(3, 'English'),
(4, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `ItemId` bigint(3) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AuthorId` tinyint(3) unsigned DEFAULT '0',
  `CategoryId` tinyint(3) unsigned DEFAULT '0',
  `ProductionId` tinyint(3) unsigned DEFAULT '1',
  `Pages` int(3) unsigned DEFAULT '0',
  `Price` int(3) unsigned DEFAULT '0',
  `PublishYear` char(7) COLLATE utf8_unicode_ci DEFAULT 'This Ye',
  `Edition` tinyint(3) unsigned DEFAULT '1',
  `LanguageId` char(3) COLLATE utf8_unicode_ci DEFAULT 'VIE',
  `CustomerTypeId` tinyint(3) unsigned DEFAULT '1',
  `Size` char(20) COLLATE utf8_unicode_ci DEFAULT '320x520',
  `Weight` float DEFAULT '2',
  `Status` tinyint(3) unsigned DEFAULT '1',
  `Relations` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `Filezip` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `ImagePath` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `Activate` tinyint(3) unsigned DEFAULT '1',
  `PostDate` date DEFAULT NULL,
  PRIMARY KEY (`ItemId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemId`, `ItemName`, `Description`, `AuthorId`, `CategoryId`, `ProductionId`, `Pages`, `Price`, `PublishYear`, `Edition`, `LanguageId`, `CustomerTypeId`, `Size`, `Weight`, `Status`, `Relations`, `Filezip`, `ImagePath`, `Activate`, `PostDate`) VALUES
(1, 'JSP/Servlet/JavaBeans', 'JSP/Servlet/JavaBeans va CSDL SQL Server 7.0, JavaScript', 1, 5, 1, 480, 38000, '07/2000', 1, 'VIE', 1, '320x520', 360, 1, '2,3,21', '', '', 1, '2003-05-19'),
(2, 'Lập trình chuyên nghiệp SQL Server 2000 Tap 1', 'Lập trình chuyên nghiệp SQL Server 2000, Database Analysic and Design, SQL Language, Database Objects: Tables, Views, Stored Procedure, RUles, Funcitons. Triggers, Transactions, Accounting System Exam', 1, 3, 1, 620, 42000, '05/2001', 1, 'VIE', 1, '320x520', 520, 1, '1,4,5,6,7,8,11,12', '', '', 1, '2003-05-19'),
(3, 'Lập trình chuyên nghiệp SQL Server 2000 Tap 2', 'Lập trình chuyên nghiệp SQL Server 2000, Database Analysic and Design, Administrator Module, Full Search Text, Query English, Visual Basic and SQL Server , Accounting System Exam', 1, 3, 1, 550, 40000, '01/2002', 1, 'VIE', 1, '320x520', 450, 1, '1,4,5,6,7,8,11,12', '', '', 1, '2003-05-16'),
(5, 'Lập trình Visual Basic.NET Tập 2', 'Visual Basic.NET, SQL Server 2000, ASP.NET, Web Services', 1, 1, 1, 650, 72000, '07/2002', 1, 'VIE', 1, '320x520', 450, 1, '2,3', '', '', 1, '2003-05-15'),
(6, 'Lập trình Visual C Sharp .NET Tập 1', 'C Sharp Cơ bản', 1, 1, 1, 620, 65000, '05/2002', 1, 'VIE', 1, '320x520', 300, 1, '', '', '', 1, '2003-05-16'),
(7, 'Lập trình chuyên nghiệp Visual C Sharp .NET Tập 2', 'C Sharp Cơ bản', 1, 1, 1, 620, 45000, '05/2002', 1, 'VIE', 1, '320x520', 400, 1, '2,3', '', '', 1, '2003-05-14'),
(10, 'Xây Dựng và Triển Khai Ứng Dụng Thương Mại Điện Tử bằng ASP, SQL Server, Visual Basic, JavaScript.', 'Xây Dựng và Triển Khai Ứng Dụng Thương Mại Điện Tử bằng ASP, SQL Server, Visual Basic, JavaScript, HTML, COM, DCOM, DLL, Mail, Upload, Administration Modules, ...', 1, 5, 1, 1200, 120000, '07/2003', 1, 'VIE', 1, '320x520', 250, 1, '2,3', '', '', 1, '2003-05-19'),
(4, 'Thiết kế Web bằng PHP and MySQL', 'PHP and MySQL, Oracle, PostgreSQL, MS Access, SQL Server', 1, 5, 1, 900, 90000, '04/2003', 1, 'VIE', 1, '21x25', 600, 1, '', '', '', 1, '2003-05-19'),
(13, 'Lập trình ứng dụng Microsoft Access 2002 Tập 1', 'Forms, Tables, Queries, Reports, Modules, Visual Basic for Application, ...', 1, 3, 1, 600, 45000, '04/2003', 1, 'VIE', 1, '320x520', 200, 1, '2,3', '', '', 1, '2003-05-19'),
(14, 'Lập trình ứng dụng Microsoft Access 2002 Tập 2', 'Access, Outlook, SQL Server, Excel, Word, Powerpoint, Windows API, DLL, ...', 1, 3, 1, 600, 50000, '04/2003', 1, 'VIE', 1, '320x520', 250, 1, '2,3', '', '', 1, '2003-05-19'),
(16, 'Giáo trình lý thuyết và bài tập Delphi', 'Delphi', 2, 1, 1, 800, 80000, '04/2003', 1, 'VIE', 1, '320x520', 420, 1, '', '', '', 1, '2003-05-19'),
(17, 'Đồ hoạ với Multimedia với PowerPoint 2000', 'Đồ hoạ với Multimedia với PowerPoint 2000', 3, 11, 1, 600, 100000, '01/2003', 1, 'VIE', 1, '320x520', 320, 1, '', '', '', 1, '2003-05-19'),
(18, 'Sử Dụng & Khai Thác Microsoft Visual FoxPro 6.0', 'Sử Dụng & Khai Thác Microsoft Visual FoxPro ', 4, 3, 1, 605, 60000, '02/2002', 1, 'VIE', 1, '320x520', 350, 1, '', '', '', 1, '2003-05-17'),
(19, 'Tự Học Lập Trình Chuyên Sâu Visual Basic .NET Trong 21 Ngày', 'Tự Học Lập Trình Chuyên Sâu Visual Basic', 2, 1, 1, 500, 35000, '01/2002', 1, 'VIE', 1, '320x520', 360, 1, '4,5,22', '', '', 1, '2003-05-17'),
(20, 'Từng bước Lập trình chuyên nghiệp Visual C++ .NET', 'Từng bước Lập trình chuyên nghiệp Visual C++ ', 2, 1, 1, 500, 56000, '02/2003', 1, 'VIE', 1, '320x520', 520, 1, '', '', '', 1, '2003-05-17'),
(21, 'Cấu Trúc Dữ Liệu Với Java', 'Cấu Trúc Dữ Liệu Với Java', 3, 1, 1, 300, 20000, '01/2003', 1, 'VIE', 1, '320x520', 125, 1, '', '', '', 1, '2003-05-19'),
(22, 'Từng bước Lập trình với Visual Basic .NET', 'Từng bước Lập trình với Visual Basic .NET', 2, 1, 1, 600, 50000, '12/2003', 1, 'VIE', 1, '320x520', 420, 1, '4,5,19', '', '', 1, '2003-05-16'),
(23, 'Vẽ Minh Hoạ Vói CorelDRAW 10 - Tập 3', 'Vẽ Minh Hoạ Vói CorelDRAW 10', 4, 11, 1, 700, 70000, '01/2002', 1, 'VIE', 1, '320x520', 410, 1, '', '', '', 1, '2003-05-15'),
(24, 'Lập trình ASP.NET 3.5', 'Lập trình ASP.NET 3.5', 3, 5, 4, 656, 43000, '02/2004', 1, 'ENG', 2, '21x25', 450, 1, '1,4', 'cbc.zip', '', 1, '2003-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `LangID` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `LangName` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`LangID`),
  KEY `LangCode` (`LangID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`LangID`, `LangName`) VALUES
('CHI', 'Chineses'),
('THA', 'Thailand'),
('CAM', 'Cambodian'),
('ENG', 'English'),
('FRE', 'French'),
('JAP', 'Japanese'),
('VIE', 'Vietnamese'),
('KOR', 'Korean');

-- --------------------------------------------------------

--
-- Table structure for table `moduleanduser`
--

CREATE TABLE IF NOT EXISTS `moduleanduser` (
  `ModuleID` int(3) NOT NULL DEFAULT '0',
  `UserID` int(10) DEFAULT NULL,
  `Permission` char(1) COLLATE utf8_unicode_ci DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moduleanduser`
--

INSERT INTO `moduleanduser` (`ModuleID`, `UserID`, `Permission`) VALUES
(1, 4, 'F'),
(2, 4, 'F'),
(3, 4, 'F'),
(4, 4, 'F'),
(5, 4, 'F'),
(6, 4, 'F'),
(7, 4, 'R'),
(7, 2, 'N'),
(6, 2, 'F'),
(5, 2, 'N'),
(4, 2, 'F'),
(3, 2, 'R'),
(2, 2, 'R'),
(1, 2, 'R'),
(1, 3, 'R'),
(2, 3, 'R'),
(3, 3, 'R'),
(4, 3, 'R'),
(5, 3, 'R'),
(6, 3, 'R'),
(7, 3, 'R'),
(8, 3, 'F'),
(1, 1, 'F'),
(2, 1, 'N'),
(3, 1, 'N'),
(4, 1, 'N'),
(5, 1, 'N'),
(6, 1, 'N'),
(7, 1, 'N'),
(8, 1, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `ModuleID` int(3) NOT NULL AUTO_INCREMENT,
  `ModuleName` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `Description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ModuleID`),
  KEY `ModuleID` (`ModuleID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`ModuleID`, `ModuleName`, `Description`) VALUES
(2, 'Users Management', 'Users Management'),
(3, 'Customers Management', 'Customers Management'),
(5, 'Sales Management', 'Sales Management'),
(1, 'Directories', 'Directories'),
(6, 'Reports', 'Reports'),
(7, 'Feedbacks', 'Feedbacks'),
(8, 'Testing', 'Testing'),
(4, 'Temporary Customers Management', 'Temporary Customers Management');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `OrderDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `ItemId` int(3) DEFAULT '0',
  `OrderId` int(3) DEFAULT '0',
  `No` tinyint(3) DEFAULT '0',
  `Qtty` int(3) DEFAULT '0',
  `Price` int(3) DEFAULT '0',
  `Discount` float DEFAULT '0',
  `Amount` float DEFAULT '0',
  PRIMARY KEY (`OrderDetailId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailId`, `ItemId`, `OrderId`, `No`, `Qtty`, `Price`, `Discount`, `Amount`) VALUES
(1, 13, 5, 3, 1, 45000, 0, 45000),
(2, 2, 2, 2, 1, 42000, 0.05, 39900),
(3, 16, 4, 1, 1, 80000, 0, 80000),
(4, 18, 2, 4, 1, 60000, 0, 60000),
(5, 2, 5, 3, 1, 42000, 0.05, 39900),
(6, 16, 6, 3, 1, 200000, 0, 200000),
(7, 21, 4, 1, 1, 20000, 0, 20000),
(8, 14, 6, 1, 2, 50000, 0, 50000),
(9, 7, 6, 2, 2, 20000, 0, 400000),
(10, 14, 6, 4, 1, 50000, 0, 50000),
(11, 14, 3, 1, 1, 50000, 0, 50000),
(12, 7, 1, 1, 1, 40000, 0, 40000),
(13, 22, 1, 2, 1, 50000, 0, 50000),
(14, 4, 10, 1, 1, 90000, 0, 90000),
(15, 13, 14, 3, 1, 45000, 0, 45000),
(27, 16, 18, 1, 1, 80000, 0, 80000),
(26, 18, 11, 4, 1, 60000, 0, 60000),
(24, 16, 9, 3, 1, 200000, 0, 200000),
(23, 21, 18, 1, 1, 20000, 0, 20000),
(22, 14, 17, 1, 2, 50000, 0, 50000),
(21, 7, 17, 2, 2, 20000, 0, 400000),
(20, 14, 12, 4, 1, 50000, 0, 50000),
(19, 14, 15, 1, 1, 50000, 0, 50000),
(18, 7, 13, 1, 1, 40000, 0, 40000),
(17, 22, 13, 2, 1, 50000, 0, 50000),
(16, 4, 16, 1, 1, 90000, 0, 90000),
(28, 2, 0, 1, 1, 42000, 0, 42000),
(29, 10, 0, 2, 1, 120000, 0, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetailshist`
--

CREATE TABLE IF NOT EXISTS `orderdetailshist` (
  `ItemID` int(3) unsigned DEFAULT '0',
  `OrderID` int(3) unsigned DEFAULT '0',
  `No` tinyint(3) unsigned DEFAULT '0',
  `Qtty` int(3) unsigned DEFAULT '0',
  `Price` int(3) unsigned DEFAULT '0',
  `Discount` int(3) unsigned DEFAULT '0',
  `Amount` bigint(3) unsigned DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetailshist`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OrderId` int(3) NOT NULL AUTO_INCREMENT,
  `OrderDate` date DEFAULT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `CustomerTypeId` char(1) COLLATE utf8_unicode_ci DEFAULT 'F',
  `Description` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'Sales Online',
  `TranportationId` tinyint(3) DEFAULT '0',
  `PaymentMethodId` tinyint(3) DEFAULT '0',
  `Amount` float DEFAULT '0',
  `ShipCost` float DEFAULT '0',
  `TotalAmount` float DEFAULT '0',
  `Approval` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`OrderId`),
  KEY `OrderID` (`OrderId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderId`, `OrderDate`, `CustomerId`, `CustomerTypeId`, `Description`, `TranportationId`, `PaymentMethodId`, `Amount`, `ShipCost`, `TotalAmount`, `Approval`) VALUES
(2, '2003-02-22', 1, 'F', 'Sales Online', 1, 2, 99900, 10000, 109000, 0),
(4, '2003-01-12', 5, 'F', 'Sales Online', 2, 3, 12000, 10000, 130000, 0),
(5, '2003-04-15', 5, 'F', 'Sales Online', 3, 1, 84900, 10000, 94900, 0),
(6, '2003-05-20', 1, 'F', 'Sales Online', 2, 3, 200000, 5000, 205000, 0),
(3, '2003-02-20', 2, 'F', 'Sales Online', 1, 2, 50000, 5000, 55000, 0),
(1, '2003-03-10', 3, 'F', 'Sales Online', 1, 2, 90000, 5000, 95000, 0),
(9, '2003-06-09', 6, 'F', 'Sales Online', 2, 1, 500000, 50000, 550000, 0),
(10, '2003-04-01', 7, 'F', 'Sales Online', 1, 1, 90000, 10000, 100000, 0),
(11, '2003-05-22', 1, 'T', 'Sales Online', 1, 2, 99900, 10000, 109000, 0),
(12, '2003-05-12', 5, 'T', 'Sales Online', 2, 3, 12000, 10000, 130000, 0),
(13, '2003-03-15', 5, 'T', 'Sales Online', 3, 1, 84900, 10000, 94900, 1),
(14, '2003-07-20', 1, 'T', 'Sales Online', 2, 3, 200000, 5000, 205000, 0),
(15, '2003-04-20', 2, 'T', 'Sales Online', 1, 2, 50000, 5000, 55000, 0),
(16, '2003-06-10', 3, 'T', 'Sales Online', 1, 2, 90000, 5000, 95000, 0),
(17, '2003-07-09', 6, 'T', 'Sales Online', 2, 1, 500000, 50000, 550000, 0),
(18, '2003-06-01', 7, 'T', 'Sales Online', 1, 1, 90000, 10000, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE IF NOT EXISTS `productions` (
  `ProID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `ProName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ProID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`ProID`, `ProName`) VALUES
(1, 'NXB Giao Duc'),
(2, 'NXB Lao Dong'),
(3, 'NXB DHQG TP Ho Chi Minh'),
(4, 'NXB Dong Nai'),
(5, 'NXB Da Nang');

-- --------------------------------------------------------

--
-- Table structure for table `promotiondetails`
--

CREATE TABLE IF NOT EXISTS `promotiondetails` (
  `DetailID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `PromotionID` int(3) unsigned DEFAULT '0',
  `ToItemID` int(3) unsigned DEFAULT '0',
  `Discount` float DEFAULT '0',
  PRIMARY KEY (`DetailID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `promotiondetails`
--

INSERT INTO `promotiondetails` (`DetailID`, `PromotionID`, `ToItemID`, `Discount`) VALUES
(1, 1, 1, 0.1),
(2, 1, 2, 0.05),
(3, 1, 3, 0.3);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `PromotionID` int(3) NOT NULL AUTO_INCREMENT,
  `PromotionName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `Activate` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`PromotionID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`PromotionID`, `PromotionName`, `FromDate`, `ToDate`, `Activate`) VALUES
(1, 'Lunar New Year', '2003-04-01', '2003-05-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `ProvinceCode` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ProvinceName` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`ProvinceCode`),
  KEY `ProvinceCode` (`ProvinceCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`ProvinceCode`, `ProvinceName`) VALUES
('HCM', 'Ho Chi Minh'),
('HAN', 'Ha Noi'),
('TTH', 'Thua Thien Hue'),
('DAN', 'Da Nang'),
('DON', 'Dong Nai'),
('CAN', 'Can Tho'),
('ANG', 'An Giang'),
('VTA', 'Ba Ria- Vung Tau'),
('LAD', 'Lam Dong'),
('PHU', 'Phu Yen'),
('QNG', 'Quang Ngai'),
('QNA', 'Quang Nam');

-- --------------------------------------------------------

--
-- Table structure for table `shipcost`
--

CREATE TABLE IF NOT EXISTS `shipcost` (
  `ProvinceCode` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `FromQtty` smallint(6) DEFAULT '0',
  `ToQtty` smallint(6) DEFAULT '0',
  `Cost` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipcost`
--

INSERT INTO `shipcost` (`ProvinceCode`, `FromQtty`, `ToQtty`, `Cost`) VALUES
('HCM', 1, 5, 5000),
('HAN', 1, 5, 20000),
('TTH', 1, 5, 15000),
('DAN', 1, 5, 13000),
('DON', 1, 5, 7000),
('HCM', 6, 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `ItemID` bigint(3) NOT NULL DEFAULT '0',
  `ItemName` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` char(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AuthorID` tinyint(3) unsigned DEFAULT '0',
  `CateID` tinyint(3) unsigned DEFAULT '0',
  `ProID` tinyint(3) unsigned DEFAULT '1',
  `Pages` tinyint(3) unsigned DEFAULT '0',
  `Price` tinyint(3) unsigned DEFAULT '0',
  `Year` char(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Edition` tinyint(3) unsigned DEFAULT '1',
  `LangID` char(3) COLLATE utf8_unicode_ci DEFAULT 'VIE',
  `CustTypeID` tinyint(3) unsigned DEFAULT '1',
  `Size` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` tinyint(3) unsigned DEFAULT '1',
  `SPicture` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BPicture` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Filezip` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Activate` tinyint(3) unsigned DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`ItemID`, `ItemName`, `Description`, `AuthorID`, `CateID`, `ProID`, `Pages`, `Price`, `Year`, `Edition`, `LangID`, `CustTypeID`, `Size`, `Status`, `SPicture`, `BPicture`, `Filezip`, `Activate`) VALUES
(1, 'JSP/Servlet/JavaBeans', 'JSP/Servlet/JavaBeans va CSDL SQL Server 7.0, JavaScript', 1, 1, 1, 255, 255, '07/2000', 1, 'VIE', 1, '320x520', 1, NULL, NULL, NULL, 1),
(2, 'Lap Trinh Chuyen Nghiep SQL Server 2000 Tap 1', 'Lap Trinh Chuyen Nghiep SQL Server 2000, Database Analysic and Design, SQL Language, Database Objects: Tables, Views, Stored Procedure, RUles, Funcitons. Triggers, Transactions, Accounting System Exam', 1, 1, 1, 255, 255, '05/2001', 1, 'VIE', 1, '320x520', 1, NULL, NULL, NULL, 1),
(3, 'Lap Trinh Chuyen Nghiep SQL Server 2000 Tap 2', 'Lap Trinh Chuyen Nghiep SQL Server 2000, Database Analysic and Design, Administrator Module, Full Search Text, Query English, Visual Basic and SQL Server , Accounting System Exam', 1, 1, 1, 255, 255, '01/2002', 1, 'VIE', 1, '320x520', 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tempcustomers`
--

CREATE TABLE IF NOT EXISTS `tempcustomers` (
  `CustID` int(3) unsigned NOT NULL DEFAULT '0',
  `Username` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Password` char(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `CustName` char(50) COLLATE utf8_unicode_ci DEFAULT '',
  `Address` char(100) COLLATE utf8_unicode_ci DEFAULT '',
  `Tel` char(20) COLLATE utf8_unicode_ci DEFAULT '',
  `FaxNo` char(10) COLLATE utf8_unicode_ci DEFAULT '',
  `Contact` char(50) COLLATE utf8_unicode_ci DEFAULT '',
  `CountryCode` char(3) COLLATE utf8_unicode_ci DEFAULT 'VIE',
  `ProvinceCode` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Activate` tinyint(4) DEFAULT '1',
  `City` char(50) COLLATE utf8_unicode_ci DEFAULT '',
  `RegisterDate` date DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tempcustomers`
--

INSERT INTO `tempcustomers` (`CustID`, `Username`, `Password`, `CustName`, `Address`, `Tel`, `FaxNo`, `Contact`, `CountryCode`, `ProvinceCode`, `Activate`, `City`, `RegisterDate`) VALUES
(1, 'huonglan@mail.com', '11111111', 'Nguyen Thi Huong Lan', '192 Tran Hung Dao, F1, Q.5', '98989898', '', 'Lan (Den)', 'VIE', 'DON', 1, 'Dong Nai', '2003-05-14'),
(5, 'taihoa@yahoo.com', '11111111', 'Tran Thai Hoa', '2 Thao Dien, Dist 2.,', '98989898', NULL, 'Khue', 'VIE', 'CAN', 1, 'Can Tho', '2003-05-14'),
(6, 'vienchin@hotmail.com', '22222222', 'Vien Chinh Co., Ltd', '12 Hong Ha, F. Lien Chieu, Da Nang', '06059686960', '060565656', 'Hong Ha Uyen', 'VIE', 'HAN', 1, 'Ha Noi', '2003-05-14'),
(2, 'tranthithuhoa@fpt.com.vn', '34343434', 'Thu Hoa', '45 Le Van Sy, F12, Quan 3', '8787878', '3223232', 'Anh', 'VIE', 'DAN', 1, 'Dan Nang', '2003-05-14'),
(3, 'baoviet@yahoo.com', '2323232', 'Bao Viet Inc.', '56 Vuon Lai, F 17, Tan Binh', '090978787', '8732322', 'Khanh', 'VIE', 'VTA', 1, 'Tp Vung Tau', '2003-05-14'),
(7, 'vandieu@yahoo.com', '2323232', 'Tran Van Dieu', '6 Le Loi, Trung tam Cong nghe phan mem Hue', '054898798', '054687879', 'Quang', 'VIE', 'ANG', 1, 'Ang Giang', '2003-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `topitems`
--

CREATE TABLE IF NOT EXISTS `topitems` (
  `ItemID` bigint(3) NOT NULL DEFAULT '0',
  `ItemName` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AuthID` tinyint(3) unsigned DEFAULT '0',
  `CateID` tinyint(3) unsigned DEFAULT '0',
  `ProID` tinyint(3) unsigned DEFAULT '1',
  `Pages` int(3) unsigned DEFAULT '0',
  `Price` int(3) unsigned DEFAULT '0',
  `PublishYear` char(7) COLLATE utf8_unicode_ci DEFAULT 'This Ye',
  `Edition` tinyint(3) unsigned DEFAULT '1',
  `LangID` char(3) COLLATE utf8_unicode_ci DEFAULT 'VIE',
  `CustTypeID` tinyint(3) unsigned DEFAULT '1',
  `Size` char(20) COLLATE utf8_unicode_ci DEFAULT '320x520',
  `Weight` float DEFAULT '2',
  `Status` tinyint(3) unsigned DEFAULT '1',
  `Relations` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `Filezip` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `ImagePath` char(50) COLLATE utf8_unicode_ci DEFAULT '''',
  `Activate` tinyint(3) unsigned DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topitems`
--

INSERT INTO `topitems` (`ItemID`, `ItemName`, `Description`, `AuthID`, `CateID`, `ProID`, `Pages`, `Price`, `PublishYear`, `Edition`, `LangID`, `CustTypeID`, `Size`, `Weight`, `Status`, `Relations`, `Filezip`, `ImagePath`, `Activate`) VALUES
(1, 'JSP/Servlet/JavaBeans', 'JSP/Servlet/JavaBeans va CSDL SQL Server 7.0, JavaScript', 1, 5, 1, 480, 38000, '07/2000', 1, 'VIE', 1, '320x520', 360, 1, '2,3,21', '', '', 1),
(2, 'Lap Trinh Chuyen Nghiep SQL Server 2000 Tap 1', 'Lap Trinh Chuyen Nghiep SQL Server 2000, Database Analysic and Design, SQL Language, Database Objects: Tables, Views, Stored Procedure, RUles, Funcitons. Triggers, Transactions, Accounting System Exam', 1, 3, 1, 620, 42000, '05/2001', 1, 'VIE', 1, '320x520', 520, 1, '1,4,5,6,7,8,11,12', '', '', 1),
(3, 'Lap Trinh Chuyen Nghiep SQL Server 2000 Tap 2', 'Lap Trinh Chuyen Nghiep SQL Server 2000, Database Analysic and Design, Administrator Module, Full Search Text, Query English, Visual Basic and SQL Server , Accounting System Exam', 1, 3, 1, 550, 40000, '01/2002', 1, 'VIE', 1, '320x520', 450, 1, '1,4,5,6,7,8,11,12', '', '', 1),
(5, 'Visual Basic.NET Tap 2', 'Visual Basic.NET, SQL Server 2000, ASP.NET, Web Services', 1, 1, 1, 650, 72000, '07/2002', 1, 'VIE', 1, '320x520', 450, 1, '2,3', '', '', 1),
(6, 'Visual C Sharp .NET Tap 1', 'C Sharp Co Ban', 1, 1, 1, 620, 65000, '05/2002', 1, 'VIE', 1, '320x520', 300, 1, '', '', '', 1),
(7, 'Visual C Sharp .NET Tap 2', 'C Sharp Co Ban', 1, 1, 1, 620, 45000, '05/2002', 1, 'VIE', 1, '320x520', 400, 1, '2,3', '', '', 1),
(10, 'Xay Dung va Trien Khai Ung Dung Thuong Mai Dien Tu bang ASP, SQL Server, Visual Basic, JavaScript.', 'Xay Dung va Trien Khai Ung Dung Thuong Mai Dien Tu bang ASP, SQL Server, Visual Basic, JavaScript, HTML, COM, DCOM, DLL, Mail, Upload, Administration Modules, ...', 1, 5, 1, 1200, 120000, '07/2003', 1, 'VIE', 1, '320x520', 250, 1, '2,3', '', '', 1),
(4, 'PHP and MySQL', 'PHP and MySQL, Oracle, PostgreSQL, MS Access, SQL Server', 1, 5, 1, 900, 90000, '04/2003', 1, 'VIE', 1, '21x25', 600, 1, '', '', '', 1),
(13, 'Lap Trinh Ung Dung Microsoft Access 2002 Tap 1', 'Forms, Tables, Queries, Reports, Modules, Visual Basic for Application, ...', 1, 3, 1, 600, 45000, '04/2003', 1, 'VIE', 1, '320x520', 200, 1, '2,3', '', '', 1),
(14, 'Lap Trinh Ung Dung Microsoft Access 2002 Tap 2', 'Access, Outlook, SQL Server, Excel, Word, Powerpoint, Windows API, DLL, ...', 1, 3, 1, 600, 50000, '04/2003', 1, 'VIE', 1, '320x520', 250, 1, '2,3', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` bigint(3) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FullName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Province` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `City` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaritalStatus` char(1) COLLATE utf8_unicode_ci DEFAULT 'S',
  `Certificates` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Activate` tinyint(3) unsigned DEFAULT '1',
  `UserType` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'Users',
  `Assign` tinyint(4) DEFAULT '0',
  `JoinDate` date DEFAULT '0000-00-00',
  UNIQUE KEY `UserID` (`UserID`),
  KEY `UserID_2` (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `FullName`, `Address`, `Tel`, `Province`, `City`, `Gender`, `MaritalStatus`, `Certificates`, `Activate`, `UserType`, `Assign`, `JoinDate`) VALUES
(1, 'hongvu@mail.com', '11111111', 'Lam Hong Vu', '2 Le Loi, Dist 1, HCM', '09065485', 'TTH', 'Hue', 'M', 'S', 'BS,MBS', 1, 'Users', 1, '2003-04-16'),
(4, 'huukhang@mail.com', '11111111', 'Pham Huu Khang', '17 Vo Van Tan Fist 3', '87788787', 'HCM', 'Ho Chi Minh', 'M', 'S', 'BA,BS,MBA', 1, 'Users', 1, '2003-04-15'),
(2, 'lan@mail.com', '11111111', 'Nguyen Thi Lan', '1 Le Van Sy', '56655665', 'HCM', 'Ho Chi Minh', 'F', 'M', 'BA,BS', 1, 'Users', 1, '2003-04-14'),
(3, 'hang@mail.com', '11111111', 'Tran Thu Hang', '12 Tran Hung Dao', '87878787', 'HAN', 'Ha Noi', 'F', 'M', 'BS,MBA', 1, 'Users', 1, '2003-04-13'),
(0, 'admin', 'admin', 'Administrator', '', '', 'ALL', 'ALL', 'M', 'S', NULL, 1, 'Admin', 0, '2003-04-01'),
(5, 'trang@hotmail.com', '34343434', 'Nguyen Thuy Trang', '23 Nguyen Van Troi Quan 3', '87878787', 'HCM', 'Tp Ho Chi Minh', 'F', 'S', 'BA,MBS', 0, 'Users', 0, '2003-04-12'),
(6, 'nhanvn@intranetvietnam.com', '98899898', 'Nguyen Thanh Nhan', '43 Duy Tan Q. 3', '060879797', 'DAN', 'Da Nang', 'M', 'S', 'MBA', 0, 'Users', 0, '2003-04-11');
