-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 12:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acepatrol`
--
CREATE DATABASE IF NOT EXISTS `acepatrol` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `acepatrol`;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9121267598, 'carl@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-25 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `AptNumber` int(10) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, 7, 729411824, '2022-05-12', '19:03:00', 'Test msg', '2022-05-12 18:30:00', 'Your appointment has been book.', 'Selected', '2022-05-13 06:11:41'),
(2, 11, 985654240, '2022-05-29', '13:10:00', 'NA', '2022-05-29 07:34:47', 'Your appointment is confirmed', 'Selected', '2022-05-29 07:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(4, 7, 4, 138889283, '2022-05-13 11:42:21'),
(5, 7, 9, 138889283, '2022-05-13 11:42:21'),
(6, 7, 16, 138889283, '2022-05-13 11:42:21'),
(7, 8, 3, 555850701, '2022-05-13 11:42:51'),
(8, 8, 6, 555850701, '2022-05-13 11:42:51'),
(9, 8, 9, 555850701, '2022-05-13 11:42:51'),
(10, 8, 11, 555850701, '2022-05-13 11:42:51'),
(13, 10, 1, 330026346, '2022-05-28 08:51:42'),
(14, 10, 2, 330026346, '2022-05-28 08:51:42'),
(15, 11, 2, 379060040, '2022-05-29 07:36:17'),
(16, 11, 5, 379060040, '2022-05-29 07:36:18'),
(17, 11, 6, 379060040, '2022-05-29 07:36:18'),
(18, 11, 12, 379060040, '2022-05-29 07:36:18'),
(19, 11, 3, 460087279, '2022-06-01 01:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '  \"A Pet Store with Everything you need.\nA Total Pet Experience All animals, All passion , \nAll pets. All you need is Love & Treats.Lots of Treats.  All you need under one roof. All your Pet Requirements. Anything & Everything for all your lovely pets.\".', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Lias Road Marilao Bulacan', 'acepetshop@gmail.com', 9121267598, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `ServiceDescription` mediumtext DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Database: `bpmsdb`
--
CREATE DATABASE IF NOT EXISTS `bpmsdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bpmsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(10) NOT NULL,
  `brand_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'ss', 2, 2),
(2, 'sad1', 2, 2),
(3, 'nike', 2, 1),
(4, 'ssss', 2, 1),
(5, 'adidas', 1, 1),
(6, 'rejjoice', 1, 1),
(7, '', 0, 1),
(8, 'testing1', 2, 1),
(9, '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL,
  `categories_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'sad', 1, 2),
(2, '123', 2, 2),
(3, 'sssss', 1, 2),
(4, 'sad', 1, 2),
(5, 'sadsss', 1, 2),
(6, 'dogfood', 1, 2),
(7, 'shampoo', 1, 2),
(8, 'sad', 2, 2),
(9, 'sabon ', 1, 2),
(10, 'aso', 2, 2),
(11, 'a', 1, 1),
(12, 'b', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `rate` varchar(250) NOT NULL,
  `active` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_code`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, 'testing', '', '../assets/images/stock/77119826632a9f470d7ba.jpg', 3, 5, '12', '222222', 2, 2),
(2, '', '', '../assets/images/stock/308716220632aaa610e575.jpeg', 0, 0, '', '', 0, 1),
(3, 'sdad', '', '../assets/images/stock/113079219632aab6df3287.jpg', 3, 0, 'asd', 'ssda', 2, 1),
(4, 'testing', '', '../assets/images/stock/13559449436332677ac3a99.jpg', 3, 3, '213', '222222', 2, 2),
(5, 'testing2', '', '../assets/images/stock/227538838633268770f504.jpg', 5, 5, '12', '222222', 2, 2),
(6, 'testing3', '', '../assets/images/stock/1162039988633268f5ee2a0.jpg', 5, 5, '12', '12', 2, 2),
(7, 'testing3', '', '../assets/images/stock/779266672633268fa0fc40.jpg', 5, 5, '12', '12', 2, 2),
(8, 'testing4', '', '../assets/images/stock/11325604163326b254b9b9.jpg', 5, 6, '12', '12', 2, 2),
(9, 'testing5', '', '../assets/images/stock/31461232163326b4cb758f.jpg', 3, 5, '12', '12', 2, 2),
(10, 'testing 6', '', '../assets/images/stock/9732771563327c26cb518.png', 6, 7, '12', '12', 1, 1),
(11, '', '', '../assets/images/stock/183803420363327d28791c3.png', 0, 0, '', '', 0, 1),
(12, 'testing1', '', '../assets/images/stock/263680816633a6f97b6c91.png', 5, 11, '12', '12', 1, 1),
(13, 'sad', '', '../assets/images/stock/792761255633a7f7d7fcbb.png', 5, 11, '1000', '120', 1, 1),
(14, 'dogfood', '', '../assets/images/stock/523537969633a811125503.png', 6, 11, '1000', '120', 1, 1),
(15, 'dogfood', '', '../assets/images/stock/1983131680633a8113e702c.png', 6, 11, '1000', '120', 1, 1),
(16, 'aaa', '', '../assets/images/stock/360856926633be08d46699.png', 5, 11, '12', '120', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(1, 'Admin', 'admin', 9121267598, 'lunariacarl@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-25 06:21:50', ''),
(2, NULL, '1', NULL, NULL, '1', '2023-02-02 06:35:28', 'Cashier'),
(3, NULL, '1', NULL, NULL, '1', '2023-02-02 06:35:34', 'Cashier'),
(4, NULL, '2', NULL, NULL, '2', '2023-02-02 06:36:14', 'Admin'),
(5, 'gelo', '3', 0, 'lunariacarl@gmail.com', '3', '2023-02-02 06:46:59', 'Admin'),
(6, 'angelo', '4', 639121267598, 'lunariacarl@gmail.com', '4', '2023-02-02 07:15:44', 'Cashier'),
(7, 'lunaria', '5', 639121267598, 'lunariacarl@gmail.com', '5', '2023-02-03 05:53:06', 'Admin'),
(8, 'jasper', '12', 639121267598, 'lunariacarl@gmail.com', '12', '2023-02-03 05:53:52', 'Cashier'),
(9, 'angelo', '1', 639121267598, 'lunariacarl@gmail.com', '1', '2023-02-07 03:37:40', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblbanners`
--

CREATE TABLE `tblbanners` (
  `banner_id` int(10) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbanners`
--

INSERT INTO `tblbanners` (`banner_id`, `banner_name`, `banner_image`, `creation_date`) VALUES
(1, 'banner1', '47ac53be40441f72a3e4975556878bc81675062332.png', '2023-01-30 07:05:32'),
(2, 'banner2', 'ae63fd2e0a38bd93fce04fef035fbb131665730794.png', '2022-10-14 06:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `AptNumber` int(10) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `appt_to` time NOT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `appt_to`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, 7, 729411824, '2022-05-12', '19:03:00', '00:00:00', 'Test msg', '2022-05-12 18:30:00', 'Your appointment has been book.', 'Selected', '2022-05-13 06:11:41'),
(2, 7, 767068476, '2022-05-14', '09:00:00', '00:00:00', 'fghfshdgfahgrfgh', '2022-05-12 18:30:00', 'Sorry your appointment has been cancelled', 'Rejected', '2022-05-13 06:14:39'),
(4, 10, 931783426, '2022-05-18', '15:40:00', '00:00:00', 'NA', '2022-05-15 05:04:13', '12312312', 'Rejected', '2022-09-13 06:23:16'),
(5, 10, 284544154, '2022-05-18', '15:40:00', '00:00:00', 'NA', '2022-05-15 05:04:13', 'adasdasd', 'Selected', '2022-09-20 06:01:21'),
(6, 10, 494039785, '2022-05-31', '14:47:00', '00:00:00', 'NA', '2022-05-15 05:13:24', 'sdas', 'Rejected', '2022-09-20 06:01:28'),
(8, 10, 891247645, '2022-05-28', '20:14:00', '00:00:00', 'nA', '2022-05-28 08:43:55', 'Your booking is confirmed.', 'Selected', '2022-05-28 08:51:22'),
(9, 11, 985654240, '2022-05-29', '13:10:00', '00:00:00', 'NA', '2022-05-29 07:34:47', 'Your appointment is confirmed', 'Selected', '2022-05-29 07:35:36'),
(10, 18, 441152776, '2022-11-09', '15:04:00', '00:00:00', 'please appoint me', '2022-11-08 05:04:41', 'okay!', 'Selected', '2022-11-08 05:05:15'),
(11, 18, 987465068, '2022-11-22', '16:44:00', '00:00:00', 'as', '2022-11-08 05:44:54', 'asd', 'Rejected', '2022-11-08 05:45:34'),
(12, 18, 600453623, '2022-11-26', '14:46:00', '00:00:00', 'asd', '2022-11-15 06:46:16', 'sad', 'Selected', '2022-11-15 06:46:38'),
(13, 18, 601479277, '2022-11-15', '16:54:00', '00:00:00', 'sad', '2022-11-15 06:52:45', 'okay!', 'Selected', '2022-11-15 07:03:17'),
(14, 18, 230056160, '2022-11-28', '16:12:00', '00:00:00', 'sad', '2022-11-28 08:08:25', 'okay', 'Selected', '2022-11-28 08:12:48'),
(15, 18, 951895107, '2022-12-31', '20:00:00', '00:00:00', '!!!', '2022-12-28 07:52:20', 'okay!', 'Selected', '2022-12-28 07:52:56'),
(16, 18, 198620071, '2023-01-27', '13:08:00', '00:00:00', 'as', '2023-01-13 05:06:12', 'sadsad', 'Selected', '2023-01-13 05:06:25'),
(17, 18, 646209935, '2023-01-31', '17:00:00', '00:00:00', '3 dogs', '2023-01-27 02:11:10', 'dsf', 'Selected', '2023-01-27 02:12:40'),
(18, 18, 313311845, '2023-01-04', '12:00:00', '00:00:00', 'asd', '2023-01-27 02:18:12', NULL, NULL, NULL),
(19, 19, 366986505, '2023-01-31', '12:00:00', '00:00:00', '3 dogs', '2023-01-27 02:46:36', NULL, NULL, NULL),
(20, 20, 897865663, '2023-01-30', '12:00:00', '00:00:00', 'yjtd', '2023-01-30 06:35:30', 'bdf', 'Selected', '2023-01-30 06:35:57'),
(21, 20, 745141413, '2023-02-02', '12:00:00', '00:00:00', 'sad', '2023-02-02 06:36:44', NULL, NULL, NULL),
(22, 21, 964757977, '2023-02-13', '09:00:00', '10:00:00', 'sad', '2023-02-13 01:27:33', 'sda', 'Selected', '2023-02-13 02:24:12'),
(23, 21, 182867405, '2023-02-14', '01:00:00', '00:00:00', 'sad', '2023-02-13 23:50:50', 'sda', 'Rejected', '2023-02-14 22:45:43'),
(24, 21, 962323279, '2023-02-14', '09:00:00', '10:00:00', 'ddddddddddd', '2023-02-14 00:14:57', 'asd', 'Rejected', '2023-02-14 22:45:55'),
(25, 21, 919022706, '2023-02-14', '09:00:00', '10:00:00', 's', '2023-02-14 00:17:43', 'sad', 'Selected', '2023-02-14 22:46:06'),
(26, 21, 558745845, '2023-02-15', '26:56:55', '00:00:00', 'sad', '2023-02-14 22:18:18', '1123', 'Selected', '2023-02-14 22:51:55'),
(27, 21, 265279582, '2023-02-15', '00:00:00', '00:00:00', 'large', '2023-02-14 22:30:32', '21', 'Selected', '2023-02-14 22:56:30'),
(28, 21, 661788144, '2023-02-15', '00:00:00', '00:00:00', 'sssss', '2023-02-14 22:34:06', 'asdad', 'Selected', '2023-02-14 22:56:40'),
(29, 21, 670178813, '2023-02-15', '00:00:00', '00:00:00', 'sad', '2023-02-14 22:35:31', '123', 'Selected', '2023-02-14 22:56:47'),
(30, 21, 747564536, '2023-02-15', '10:00:00', '00:00:00', 'please ', '2023-02-14 22:39:39', '3', 'Rejected', '2023-02-14 22:56:58'),
(31, 21, 963357868, '2023-03-04', '06:00:00', '00:00:00', 'okayyyyyyyyyy!', '2023-02-14 22:42:22', '3213123', 'Selected', '2023-02-14 22:57:07'),
(32, 21, 825657823, '2023-02-15', '00:00:00', '00:00:00', 'asdddddddddddddddddddddddddddddddddddddddddd', '2023-02-14 22:45:22', '312', 'Rejected', '2023-02-14 22:57:15'),
(33, 21, 180608752, '2023-02-15', '11:00:00', '00:00:00', 'sad', '2023-02-14 22:51:20', '213231213321', 'Selected', '2023-02-14 22:57:20'),
(34, 21, 521657255, '2023-02-15', '06:00:00', '00:00:00', 'sdd', '2023-02-14 23:05:36', 'sad', 'Selected', '2023-02-14 23:48:30'),
(35, 21, 116172204, '2023-02-15', '04:00:00', '00:00:00', 'dsa', '2023-02-14 23:44:05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(10) NOT NULL,
  `brand_datetime_added` varchar(255) NOT NULL,
  `brand_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`brand_id`, `brand_name`, `brand_active`, `brand_datetime_added`, `brand_status`) VALUES
(34, 'set', 1, '2022-12-28 16:11:28', 1),
(35, 'sad', 1, '2023-01-18 17:02:57', 1),
(36, 'dsadasasd', 1, '2023-01-30 15:36:46', 1),
(37, 'sadd', 1, '2023-02-01 21:10:48', 1),
(38, '1', 1, '2023-02-01 21:10:57', 1),
(39, 'ddd', 2, '2023-02-03 14:12:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_active` int(10) NOT NULL,
  `category_datetime_added` varchar(255) NOT NULL,
  `category_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`category_id`, `category_name`, `category_active`, `category_datetime_added`, `category_status`) VALUES
(16, 'ser', 1, '2022-12-28 16:11:40', 1),
(17, 'sad', 1, '2023-01-18 17:16:19', 1),
(18, 'Vitamins', 1, '2023-01-30 15:35:31', 1),
(19, 'ser', 0, '2023-01-30 15:35:55', 1),
(20, 'sada', 0, '2023-01-30 15:36:28', 1),
(21, '1', 0, '2023-02-01 21:22:07', 1),
(22, '2', 1, '2023-02-01 21:23:26', 1),
(23, '3', 1, '2023-02-01 21:24:02', 1),
(24, '4', 2, '2023-02-01 21:24:07', 1),
(25, 'sss', 1, '2023-02-03 15:45:15', 1),
(26, 'molten', 1, '2023-02-15 07:28:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(7, 'carl', 'lunaria', 912126759, 'lunariacarl@gmail.com', 'paki galingan po', '2022-11-08 05:13:23', 1),
(8, 'carl', 'lunaria', 912126759, 'lunariacarl@gmail.com', 'sadsadsad', '2022-12-28 07:51:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgcash`
--

CREATE TABLE `tblgcash` (
  `qr_id` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `gcash_name` varchar(25) NOT NULL,
  `gcash_qr_image` varchar(255) NOT NULL,
  `qr_datetime_added` varchar(25) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgcash`
--

INSERT INTO `tblgcash` (`qr_id`, `ID`, `gcash_name`, `gcash_qr_image`, `qr_datetime_added`, `status`) VALUES
(6, 12, 'qr', '8e1bdc00b7de8c5f0a44c58706aee4291676257774.jpg', '2023-02-13 11:09:34', 1),
(7, 1, 'Carl Angelo Lunaria', '8e1bdc00b7de8c5f0a44c58706aee4291676416353.jpg', '2023-02-15 07:12:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(22, 18, 9, 163220569, '2022-11-08 05:06:15'),
(23, 18, 10, 163220569, '2022-11-08 05:06:15'),
(24, 18, 11, 163220569, '2022-11-08 05:06:15'),
(25, 18, 12, 163220569, '2022-11-08 05:06:15'),
(26, 18, 16, 163220569, '2022-11-08 05:06:15'),
(27, 18, 3, 702682670, '2022-11-15 06:47:43'),
(28, 18, 4, 702682670, '2022-11-15 06:47:43'),
(29, 18, 5, 702682670, '2022-11-15 06:47:43'),
(30, 18, 3, 278977765, '2022-11-15 07:03:40'),
(31, 18, 4, 278977765, '2022-11-15 07:03:40'),
(32, 18, 6, 482830103, '2023-01-06 05:29:53'),
(33, 18, 8, 482830103, '2023-01-06 05:29:53'),
(34, 18, 4, 686202312, '2023-01-06 05:30:26'),
(35, 18, 5, 515920289, '2023-01-06 05:31:17'),
(36, 18, 3, 508147181, '2023-01-27 02:16:03'),
(37, 18, 6, 778231713, '2023-01-27 02:16:46'),
(38, 18, 8, 483104375, '2023-01-27 02:16:52'),
(39, 18, 9, 107468632, '2023-01-27 02:17:15'),
(40, 19, 3, 537859607, '2023-01-27 02:47:01'),
(41, 19, 4, 537859607, '2023-01-27 02:47:01'),
(42, 19, 5, 537859607, '2023-01-27 02:47:01'),
(43, 20, 3, 323386323, '2023-01-30 06:35:39'),
(44, 20, 4, 323386323, '2023-01-30 06:35:39'),
(45, 20, 5, 323386323, '2023-01-30 06:35:39'),
(46, 21, 3, 822541746, '2023-02-13 02:24:24'),
(47, 21, 4, 822541746, '2023-02-13 02:24:24'),
(48, 21, 5, 822541746, '2023-02-13 02:24:24'),
(49, 21, 6, 822541746, '2023-02-13 02:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(25) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '                          \"A Pet Store with Everything you need.\r\nA Total Pet Experience All animals, All passion , \r\nAll pets. All you need is Love &amp; Treats.Lots of Treats.  All you need under one roof. All your Pet Requirements. Anything &amp; Everything for all your lovely pets.\".', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'info@gmail.com', 7896541236, NULL, '10:30 am t');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `active` int(10) NOT NULL,
  `product_datetime_added` varchar(10) NOT NULL,
  `expiry_date` varchar(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`product_id`, `product_name`, `product_image`, `brand_id`, `category_id`, `quantity`, `price`, `active`, `product_datetime_added`, `expiry_date`, `status`) VALUES
(111149, '1', '3c4f8a1f12441615c9220ec58d9429921675265216.jpg', 34, 16, '12', '12', 1, '2023-02-01', '2023-02-15', 1),
(111150, '2', '3c4f8a1f12441615c9220ec58d9429921675263393.jpg', 34, 17, '12', '100', 2, '2023-02-01', '2023-02-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(25) DEFAULT NULL,
  `ServiceDescription` mediumtext DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(25) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `ServiceDescription`, `Cost`, `Image`, `CreationDate`) VALUES
(3, 'Charcol Facial', 'Activated charcoal is created from bone char, coconut shells, peat, petroleum coke, coal, olive pits, bamboo, or sawdust. It is in the form of a fine black dust that is produced when regular charcoal is activated by exposing it to very high temperatures. This is done to alter its internal structure and increase its surface area to increase absorbability. The charcoal that you get after it has undergone this process is very porous.', 1000, 'b9fb9d37bdf15a699bc071ce4', '2022-05-24 22:37:10'),
(4, 'Deluxe Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 500, 'efc1a80c391be252d7d777a43', '2022-05-24 22:37:34'),
(5, 'Deluxe Pedicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 600, '1e6ae4ada992769567b71815f', '2022-05-24 22:37:47'),
(6, 'Normal Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 300, 'The-Dummys-Guide-To-Using', '2022-05-24 22:37:01'),
(7, 'Normal Pedicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 400, '1e6ae4ada992769567b71815f', '2022-05-24 22:37:19'),
(8, 'U-Shape Hair Cut', 'U-Shape Hair Cut', 250, 'cff8ad28cf40ebf4fbdd383fe', '2022-05-24 22:37:38'),
(9, 'Layer Haircut', 'Layer Haircut', 550, '74375080377499ab76dad3748', '2022-05-24 22:37:53'),
(10, 'Rebonding', 'Hair rebonding is a chemical process that changes your hair\'s natural texture and creates a smooth, straight style. It\'s also called chemical straightening. Hair rebonding is typically performed by a licensed cosmetologist at your local hair salon.', 3999, 'c362f21370120580f5779a2d0', '2022-05-24 22:37:08'),
(11, 'Loreal Hair Color(Full)', 'Loreal Hair Color(Full),Loreal Hair Color(Full),Loreal Hair Color(Full)', 1200, 'images.jpg', '2022-05-24 22:37:35'),
(12, 'Body Spa', 'It is typically a massage spa therapy that helps reduce pain. The technique involves using fingertips, palm, elbow, or even feet to apply firm pressure on certain body parts or acupoint to encourage blood flow and promote healing', 1500, 'efc1a80c391be252d7d777a43', '2022-05-19 01:38:27'),
(16, 'Aroma Oil Massage Therapy', 'Aroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage', 700, '032b2cc936860b03048302d99', '2022-05-09 20:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

CREATE TABLE `tblstock` (
  `stock_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `stock_quantity` int(10) NOT NULL,
  `stock_expirydate` date NOT NULL,
  `stock_months` date NOT NULL,
  `stock_datetime_added` varchar(10) NOT NULL,
  `stock_dates` date NOT NULL,
  `batch_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `status`, `RegDate`) VALUES
(21, 'carl', 'lunaria', 9121267598, 'lunariacarl@gmail.com', '81f02fef0747541d21012a0a138598d2', 1, '2023-02-09 05:19:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbanners`
--
ALTER TABLE `tblbanners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblgcash`
--
ALTER TABLE `tblgcash`
  ADD PRIMARY KEY (`qr_id`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstock`
--
ALTER TABLE `tblstock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbanners`
--
ALTER TABLE `tblbanners`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblgcash`
--
ALTER TABLE `tblgcash`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111151;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblstock`
--
ALTER TABLE `tblstock`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Database: `gmed`
--
CREATE DATABASE IF NOT EXISTS `gmed` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gmed`;

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `ABOUT_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `ABOUT_TITLE` varchar(50) NOT NULL,
  `ABOUT_CONTENT` varchar(1000) NOT NULL,
  `ABOUT_STATUS` varchar(15) NOT NULL,
  `ABOUT_DATETIME` varchar(20) NOT NULL,
  `ABOUT_ARCHIVE` int(2) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_token`
--

CREATE TABLE `admin_token` (
  `token_id` int(10) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `token` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_token`
--

INSERT INTO `admin_token` (`token_id`, `admin_id`, `token`) VALUES
(1, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `audit_activity`
--

CREATE TABLE `audit_activity` (
  `AUDIT_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `AUDIT_ACTIVITY` varchar(50) NOT NULL,
  `AUDIT_DESCRIPTION` varchar(500) NOT NULL,
  `AUDIT_DATETIME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_activity`
--

INSERT INTO `audit_activity` (`AUDIT_ID`, `USER_ID`, `AUDIT_ACTIVITY`, `AUDIT_DESCRIPTION`, `AUDIT_DATETIME`) VALUES
(1, 1, 'Print', 'Printed Inventory Report ', '2021-11-13 01:39 PM'),
(2, 1, 'Print', 'Printed Audit Report ', '2021-11-13 01:44 PM'),
(3, 1, 'Print', 'Printed Sales Report ', '2021-11-13 03:03 PM'),
(4, 1, 'Print', 'Printed Sales Report ', '2021-11-13 03:03 PM'),
(5, 1, 'Print', 'Printed Sales Report ', '2021-11-13 03:04 PM'),
(6, 1, 'Print', 'Printed Cancelled Order Report ', '2021-11-13 03:11 PM'),
(7, 1, 'Print', 'Printed Cancelled Order Report ', '2021-11-13 03:12 PM'),
(8, 1, 'Print', 'Printed Cancelled Order Report ', '2021-11-13 04:42 PM'),
(9, 1, 'Update', 'Updated Customer Requirment status to Verified', '2021-11-13 07:16 PM');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `BANNER_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `BANNER_NAME` varchar(45) NOT NULL,
  `BANNER_PICTURE` varchar(100) NOT NULL,
  `BANNER_DESCRIPTION` varchar(250) NOT NULL,
  `BANNER_DATETIME_ADDED` varchar(25) NOT NULL,
  `BANNER_STATUS` varchar(15) NOT NULL,
  `BANNER_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`BANNER_ID`, `USER_ID`, `BANNER_NAME`, `BANNER_PICTURE`, `BANNER_DESCRIPTION`, `BANNER_DATETIME_ADDED`, `BANNER_STATUS`, `BANNER_ARCHIVE`) VALUES
(1, 1, 'sadas', 'qrcode.jpg', 'xv', '2021-11-03 08:43 PM', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `CONTACT_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `CONTACT_NO` int(15) NOT NULL,
  `CONTACT_FACEBOOK` varchar(100) NOT NULL,
  `CONTACT_EMAIL` varchar(50) NOT NULL,
  `CONTACT_DATETIME_ADDED` varchar(25) NOT NULL,
  `CONTACT_STATUS` varchar(30) NOT NULL,
  `CONTACT_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `CUS_FIRSTNAME` varchar(50) NOT NULL,
  `CUS_LASTNAME` varchar(50) NOT NULL,
  `cus_dateofbirth` varchar(50) NOT NULL,
  `cus_gender` varchar(50) NOT NULL,
  `cus_request_deact` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `otp` int(10) NOT NULL,
  `email_status` varchar(20) NOT NULL,
  `ACCOUNT_STATUS` varchar(20) NOT NULL,
  `Datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `CUS_FIRSTNAME`, `CUS_LASTNAME`, `cus_dateofbirth`, `cus_gender`, `cus_request_deact`, `email`, `password`, `address`, `contact_num`, `otp`, `email_status`, `ACCOUNT_STATUS`, `Datetime`) VALUES
(1, 'ren', 'ren', '1999-06-13', 'Male', '', 'lawrenceluague@gmail.com', 'Lawrence1s', 'estwerwer wer wer wer', '9635960711', 164472, 'verified', '', '2021-11-03 15:52 PM'),
(2, 'Lemuel', 'Resogenia', '', '', '', 'lawrenceluaguepdm@gmail.com', 'Lawrence1@', '59 Camia st., Lhinet', '9283771625', 778692, 'verified', '', '2021-11-12 16:50 PM');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `address_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `address_type` varchar(100) NOT NULL,
  `address_notes` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `address_archive` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`address_id`, `customer_id`, `address_type`, `address_notes`, `customer_address`, `address_archive`) VALUES
(1, 1, '1', 'wer', 'estwerwer wer wer wer', ''),
(2, 1, '2', 'sefsefsef', 'fsefs efsef sefsef sefsef', '1'),
(3, 2, '1', 'near at bluecastle', 'Marilao Bulacan Meycauayan Bulacan Mckinley Town Center ', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_log`
--

CREATE TABLE `customer_log` (
  `LOG_ID` int(11) NOT NULL,
  `CUST_ID` int(11) NOT NULL,
  `LOG_IN_DATETIME` varchar(20) NOT NULL,
  `LOG_OUT_DATETIME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_log`
--

INSERT INTO `customer_log` (`LOG_ID`, `CUST_ID`, `LOG_IN_DATETIME`, `LOG_OUT_DATETIME`) VALUES
(1, 1, '2021-11-11 07:06 PM', '2021-11-12 04:48 PM'),
(2, 1, '2021-11-12 11:50 AM', '2021-11-12 04:48 PM'),
(3, 1, '2021-11-12 02:29 PM', '2021-11-12 04:48 PM'),
(4, 2, '2021-11-12 04:53 PM', ''),
(5, 1, '2021-11-12 07:15 PM', '2021-11-12 08:31 PM'),
(6, 1, '2021-11-12 10:47 PM', ''),
(7, 1, '2021-11-13 09:55 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_senior`
--

CREATE TABLE `customer_senior` (
  `req_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `senior_id` varchar(255) NOT NULL,
  `senior_status` varchar(20) NOT NULL,
  `date_submitted` varchar(20) NOT NULL,
  `ADMIN_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_senior`
--

INSERT INTO `customer_senior` (`req_id`, `cust_id`, `senior_id`, `senior_status`, `date_submitted`, `ADMIN_STATUS`) VALUES
(1, 1, 'great.png', 'Verified', '2021-11-13 07:15 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_fee`
--

CREATE TABLE `delivery_fee` (
  `DELIVERY_ID` int(11) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `DELIVERY_FEE` float NOT NULL,
  `DEL_STATUS` varchar(15) NOT NULL,
  `DateTime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_fee`
--

INSERT INTO `delivery_fee` (`DELIVERY_ID`, `USER_ID`, `DELIVERY_FEE`, `DEL_STATUS`, `DateTime`) VALUES
(1, 1, 10, 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `DISCOUNT_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `DISCOUNT_NAME` varchar(10) NOT NULL,
  `DISCOUNT_PERCENTAGE_VALUE` varchar(10) NOT NULL,
  `DISCOUNT_DIGIT_VALUE` float NOT NULL,
  `DISCOUNT_STATUS` varchar(15) NOT NULL,
  `DISCOUNT_DATETIME_ADDED` varchar(25) NOT NULL,
  `DISCOUNT_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`DISCOUNT_ID`, `USER_ID`, `DISCOUNT_NAME`, `DISCOUNT_PERCENTAGE_VALUE`, `DISCOUNT_DIGIT_VALUE`, `DISCOUNT_STATUS`, `DISCOUNT_DATETIME_ADDED`, `DISCOUNT_ARCHIVE`) VALUES
(6, 1, 'Senior Cit', '20%  ', 0.2, 'Active', '2021-11-03 03:20 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `epayment`
--

CREATE TABLE `epayment` (
  `payment_id` int(10) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `payment_receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `FAQ_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `FAQ_TITLE` varchar(50) NOT NULL,
  `FAQ_CONTENT` varchar(1000) NOT NULL,
  `FAQ_STATUS` varchar(15) NOT NULL,
  `FAQ_DATETIME_ADDED` varchar(20) NOT NULL,
  `FAQ_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FEEDBACK_ID` int(10) NOT NULL,
  `CUST_ID` int(10) NOT NULL,
  `FEEDBACK_CONTENT` varchar(300) NOT NULL,
  `FEEDBACK_STATUS` varchar(15) NOT NULL,
  `FEEDBACK_DATETIME` datetime NOT NULL,
  `FEEDBACK_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `FORM_ID` int(11) NOT NULL,
  `FORM_NAME` varchar(50) NOT NULL,
  `FORM_DATETIME` varchar(50) NOT NULL,
  `FORM_ARCHIVE` int(2) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`FORM_ID`, `FORM_NAME`, `FORM_DATETIME`, `FORM_ARCHIVE`, `USER_ID`) VALUES
(3, 'Caplet', '2021-11-05 20:05 PM', 0, 1),
(4, 'Capsule', '2021-11-05 20:58 PM', 0, 1),
(5, 'Syrup', '2021-11-05 20:58 PM', 0, 1),
(6, 'Tablet', '2021-11-05 20:58 PM', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gcash_payment`
--

CREATE TABLE `gcash_payment` (
  `qr_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `gcash_name` varchar(50) NOT NULL,
  `gcash_qr_image` varchar(1000) NOT NULL,
  `qr_datetime_added` varchar(25) NOT NULL,
  `gcash_qr_status` varchar(20) NOT NULL,
  `gcash_archive` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gcash_payment`
--

INSERT INTO `gcash_payment` (`qr_id`, `user_id`, `gcash_name`, `gcash_qr_image`, `qr_datetime_added`, `gcash_qr_status`, `gcash_archive`) VALUES
(3, 1, 'Qrcode', 'qrcode.jpg', '2021-11-03 08:45 PM', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `generic_product`
--

CREATE TABLE `generic_product` (
  `GEN_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `GENERIC_NAME` varchar(50) NOT NULL,
  `GEN_DESCRIPTION` varchar(1000) NOT NULL,
  `DATETIME_ADDED` varchar(30) NOT NULL,
  `GEN_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generic_product`
--

INSERT INTO `generic_product` (`GEN_ID`, `USER_ID`, `GENERIC_NAME`, `GEN_DESCRIPTION`, `DATETIME_ADDED`, `GEN_ARCHIVE`) VALUES
(1, 1, 'Multivitamins', ' multivitamin is to fill nutritional gaps and make sure people get their daily  a  ', '2021-10-12 19:42 PM', 0),
(2, 1, 'Ibrufopen   ', 'Ibuprofen is a medication in the nonsteroidal anti-inflammatory drug class that is used for treating pain, fever, and inflammation. ', '2021-10-15 12:00 PM', 0),
(3, 1, 'Loratadine', 'Loratadine, sold under the brand name Claritin among others, is a medication used to treat allergies', '2021-10-22 16:18 PM', 0),
(4, 1, 'Amoxicilin', 'drugs that has anti bacteria agent', '2021-10-22 16:30 PM', 0),
(5, 1, 'Ciproflaxin', 'Ciprofloxacin is a fluoroquinolone antibiotic used to treat a number of bacterial infections.', '2021-10-22 16:52 PM', 0),
(6, 1, 'Lagundi', ' relief of cough due to common cold, flu & mild to moderate bronchitis; cough of bacterial origin.', '2021-10-22 17:10 PM', 0),
(7, 1, 'Loperamide', 'Testing', '2021-10-31 13:31 PM', 0),
(8, 1, 'Paracetamol', 'Sample Description', '2021-11-02 11:54 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `MOBILE_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `MOBILE_NAME` varchar(45) NOT NULL,
  `MOBILE_PICTURE` varchar(100) NOT NULL,
  `APK_LINK` varchar(250) NOT NULL,
  `MOBILE_DATETIME_ADDED` varchar(25) NOT NULL,
  `MOBILE_STATUS` varchar(15) NOT NULL,
  `MOBILE_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`MOBILE_ID`, `USER_ID`, `MOBILE_NAME`, `MOBILE_PICTURE`, `APK_LINK`, `MOBILE_DATETIME_ADDED`, `MOBILE_STATUS`, `MOBILE_ARCHIVE`) VALUES
(4, 1, 'GMD APP', 'OMGApp.png', 'https://drive.google.com/file/d/1xlGwOnNZK2A9VMCE5jfQoFoEpHz91CAv/view?usp=sharing', '2021-11-03 10:45 PM', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `order_type` int(11) NOT NULL,
  `process_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_ship_address` text NOT NULL,
  `cpr_copy` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 1,
  `DRIDER_ID` int(11) NOT NULL,
  `DELIVERY_STATUS` varchar(50) NOT NULL,
  `receiver_status` int(2) NOT NULL DEFAULT 0,
  `cancel_status` int(2) NOT NULL DEFAULT 0,
  `discount_id` varchar(100) NOT NULL,
  `date_order` date DEFAULT NULL,
  `tid` int(3) NOT NULL,
  `comment_status` int(2) NOT NULL,
  `order_sucject` varchar(100) NOT NULL,
  `order_text` varchar(100) NOT NULL,
  `ADMIN_STATUS` int(2) NOT NULL,
  `ADMIN_CUSTOMER_CANCEL` int(2) NOT NULL,
  `ADMIN_DELIVERED` int(2) NOT NULL,
  `ADMIN_RIDER_CANCEL` int(2) NOT NULL,
  `ADMIN_RIDER_ROUT` int(2) NOT NULL,
  `CUST_VALIDATED` int(2) NOT NULL,
  `CUST_ROUTE` int(2) NOT NULL,
  `CUST_CANCEL` int(2) NOT NULL,
  `CUST_DELIVERED` int(2) NOT NULL,
  `PRES_NOTE` varchar(1000) NOT NULL,
  `PRES_DATE` varchar(30) NOT NULL,
  `USER_NOTE` int(11) NOT NULL,
  `CUST_VIEW_CANCEL` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `customer_id`, `sub_total`, `discount`, `grand_total`, `total_qty`, `payment_type`, `order_type`, `process_status`, `order_status`, `customer_contact`, `customer_ship_address`, `cpr_copy`, `prescription`, `payment_status`, `DRIDER_ID`, `DELIVERY_STATUS`, `receiver_status`, `cancel_status`, `discount_id`, `date_order`, `tid`, `comment_status`, `order_sucject`, `order_text`, `ADMIN_STATUS`, `ADMIN_CUSTOMER_CANCEL`, `ADMIN_DELIVERED`, `ADMIN_RIDER_CANCEL`, `ADMIN_RIDER_ROUT`, `CUST_VALIDATED`, `CUST_ROUTE`, `CUST_CANCEL`, `CUST_DELIVERED`, `PRES_NOTE`, `PRES_DATE`, `USER_NOTE`, `CUST_VIEW_CANCEL`) VALUES
(1, '2021-11-13 17:00:45', 1, '19', '0', '69', 2, 1, 1, 2, 1, '9635960711', 'estwerwer wer wer wer ', '', 'uploads/nopres.jpg', 1, 3, 'delivered', 0, 0, '', NULL, 0, 1, '', '', 1, 0, 0, 0, 0, 1, 1, 0, 1, '', '', 0, 0),
(2, '2021-11-13 18:24:37', 1, '19', '0', '69', 2, 1, 1, 1, 1, '9635960711', 'estwerwer wer wer wer ', '', 'uploads/nopres.jpg', 2, 0, '', 0, 0, '', NULL, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0),
(3, '2021-11-13 19:14:08', 1, '11', '0', '61', 1, 1, 1, 1, 1, '9635960711', 'estwerwer wer wer wer ', '', 'uploads/nopres.jpg', 2, 0, '', 0, 0, '', NULL, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0),
(4, '2021-11-13 19:25:11', 1, '3.25', '0', '53.25', 1, 1, 1, 1, 1, '9635960711', 'estwerwer wer wer wer ', '', 'uploads/46536.png', 2, 0, '', 0, 0, '', NULL, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-11-13 07:48 PM', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL,
  `discount_minus` varchar(26) NOT NULL DEFAULT '0.00',
  `customer_cancel` varchar(10) NOT NULL DEFAULT '0',
  `cancel_reason` varchar(2) NOT NULL,
  `admin_cancel` varchar(10) NOT NULL DEFAULT '0',
  `rider_cancel` varchar(10) NOT NULL DEFAULT '0',
  `return_status` varchar(2) NOT NULL,
  `return_reason` varchar(200) NOT NULL,
  `DISCOUNT_NAME` varchar(100) NOT NULL,
  `RETURN_ACTION` varchar(300) NOT NULL,
  `ADMIN_VIEW_CANCEL` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`, `discount_minus`, `customer_cancel`, `cancel_reason`, `admin_cancel`, `rider_cancel`, `return_status`, `return_reason`, `DISCOUNT_NAME`, `RETURN_ACTION`, `ADMIN_VIEW_CANCEL`) VALUES
(1, 1, 1, '1', '11', '11', 1, '0.00', '0', '', '0', '0', '', '', '', '', 1),
(2, 1, 3, '1', '8', '8', 1, '0.00', '0', '', '0', '0', '', '', '', '', 1),
(3, 2, 1, '1', '11', '11', 1, '0.00', '0', '', '0', '0', '', '', '', '', 1),
(4, 2, 3, '1', '8', '8', 1, '0.00', '0', '', '0', '0', '', '', '', '', 1),
(5, 3, 1, '1', '11', '11', 1, '0.00', '0', '', '0', '0', '', '', '', '', 1),
(6, 4, 2, '1', '3.25', '3.25', 1, '0.00', '0', '', '0', '0', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pass_reset`
--

CREATE TABLE `pass_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass_reset`
--

INSERT INTO `pass_reset` (`id`, `email`, `token`) VALUES
(0, 'dayandante.christine@gmail.com', '24a3254280c7ebc11d1cf9ce14dbc2b7444bfd6dfae952193cf63ac543bea22571a3472fe1aa89cf6ec5f683f96f809d375a'),
(0, '4g3nt08@gmail.com', 'c03aeed1f5684c2d4890e3916af5d85be6574d0e81e621c81f5ffd901f7590550fafac2b9de659ad9a798b91472f65c7b6ad'),
(0, 'lawrenceluague@gmail.com', '304de0f1f93b094392e57e2529893f65e3d8f93897a45f24885188b0f7e5170e99507732ad37e8c6112ed55ab71c4ab2f5e3'),
(0, 'delacruzjovan116@gmail.com', '4cf531f54ae52583b66564feac180f49985bd529ab4164dce537635cd3ea97e4e235dc180a5967521dfc930e77994c239ec8'),
(0, 'delacruzjovan116@gmail.com', 'cd51157bc15aa97518a6bbede3f3413e58094d2eef70000d8a06636bdc970f61cc7a7fb3de8ad4c76f2d9c69b3b0a11e6d9a'),
(0, 'delacruzjovan116@gmail.com', '75d0e1238407a69760ccd698c4cf2ce54325ab159315955ec789dad9daed256709b3f5dcf1c0e57600f1f17dd84f3f67e20d'),
(0, 'lawrenceluague@gmail.com', 'b46cda6f717413ae31a0c76aae6f8a8c0c6c56ccb5cdeb1acdf240f689761de67c306c1cd98aa19354fc188c156b46ff2c48');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `PRIVACY_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `PRIVACY_TITLE` varchar(300) NOT NULL,
  `PRIVACY_CONTENT` varchar(1000) NOT NULL,
  `PRIVACY_STATUS` varchar(20) NOT NULL,
  `PRIVACY_DATETIME_ADDED` varchar(25) NOT NULL,
  `PRIVACY_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `CATEGORY_ID` int(10) NOT NULL,
  `PRODUCT_BRANDNAME` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PRODUCT_MANUFACTURER` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PRODUCT_TYPE` varchar(25) CHARACTER SET latin1 NOT NULL,
  `PRODUCT_DOSAGE` varchar(50) NOT NULL,
  `PRODUCT_FORM` varchar(15) NOT NULL,
  `PRODUCT_COST_PRICE` varchar(10) NOT NULL,
  `PRODUCT_SELLING_PRICE` float NOT NULL,
  `PRODUCT_DATETIME_ADDED` varchar(25) NOT NULL,
  `PRODUCT_DESCRIPTION` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `DOSAGE_DESCRIPTION` varchar(1000) NOT NULL,
  `PRODUCT_PRECAUTIONS` varchar(1000) NOT NULL,
  `PRODUCT_EFFECTS` varchar(1000) NOT NULL,
  `PRODUCT_CONTRA` varchar(1000) NOT NULL,
  `PRODUCT_PICTURE` varchar(100) CHARACTER SET latin1 NOT NULL,
  `PRODUCT_TOTAL_QUANTITY` varchar(100) NOT NULL DEFAULT '1',
  `PRODUCT_QTY` int(10) UNSIGNED NOT NULL,
  `PER_BOX` varchar(100) NOT NULL,
  `GEN_ID` int(10) NOT NULL,
  `PRODUCT_ARCHIVE` int(10) NOT NULL,
  `PRODUCT_GENERIC_NAME` varchar(50) NOT NULL,
  `PRODUCT_CRITICAL` int(50) NOT NULL,
  `FORM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `USER_ID`, `CATEGORY_ID`, `PRODUCT_BRANDNAME`, `PRODUCT_MANUFACTURER`, `PRODUCT_TYPE`, `PRODUCT_DOSAGE`, `PRODUCT_FORM`, `PRODUCT_COST_PRICE`, `PRODUCT_SELLING_PRICE`, `PRODUCT_DATETIME_ADDED`, `PRODUCT_DESCRIPTION`, `DOSAGE_DESCRIPTION`, `PRODUCT_PRECAUTIONS`, `PRODUCT_EFFECTS`, `PRODUCT_CONTRA`, `PRODUCT_PICTURE`, `PRODUCT_TOTAL_QUANTITY`, `PRODUCT_QTY`, `PER_BOX`, `GEN_ID`, `PRODUCT_ARCHIVE`, `PRODUCT_GENERIC_NAME`, `PRODUCT_CRITICAL`, `FORM_ID`) VALUES
(1, 1, 4, 'Claritin', 'theraparma', 'Over the Counter', '500mg', 'Caplet', '10', 11, '2021-10-22 04:25 PM', 'For the relief of mild to moderate pain such as backache, headache, toothache, menstrual pain, and minor pain due to arthritis. Used to reduce swelling, fever, and aches or pains associated with colds and flu. ', ' Adults: Take 1 softgel every 4-6 hours. Maximum of 6 softgels per day, up to 10 days for pain or 3', 'Caution use in pregnancy, lactation, elderly patients', ' Severe allergic reactions such as hives, shock, facial swelling, skin reddening, asthma (wheezing)', ' This product should not be taken by patients with known hypersensitivity or allergy to ibuprofen', 'claritin.png', '', 89, '100', 3, 0, 'Loratadine', 10, 3),
(2, 1, 5, 'Trihydrate', 'United American Pharmaceuticals, Inc. ', 'Prescription', '500mg', 'Capsule', '2.50', 3.25, '2021-10-22 04:35 PM', 'Used in the treatment of several infections caused by susceptible strains of gram-positive and gram-negative microorganisms such as infections of respiratory and genitourinary tracts, skin and soft tissue, and dental infection.', '', '', '', '', 'Amoxici.jpg', '', 1, '100', 3, 0, 'Amoxicillin', 10, 4),
(3, 1, 3, 'Alaxan Fr', 'Therapharma, Inc.', 'Over the Counter', '325mg/250mg', 'Tablet', '7.50', 8, '2021-10-22 04:43 PM', 'Used for the relief of mild to moderately severe pain of muscuskeletal origin such as muscle pain (myalgia), arthritis, rheumatism, sprain, strain, bursitis (inflammation of the fluid-filled sac or bursa that lies between a tendon and skin), tendonitis, backache and stiff neck.\r\nUsed for the relief of tension headache, dysmenorrhea, toothache, pain after tooth extraction and minor surgical operations.\r\nEffective for fever reduction.\r\nPer capsule: Paracetamol 325 mg + Ibuprofen 200 mg', 'Adults and Children 12 years and older:\r\nTake 1 capsule every 6 hours as needed, or as directed by a doctor. Do not take for more than 10 days, unless directed by a doctor.', 'This medicine should be given with care to patients with kidney or liver disease, including patients taking other drugs that affect the liver. Do not use with any other product containing paracetamol, ibuprofen or other NSAIDs. If you are taking cough and cold preparations, other fever reducers or pain relievers, check if they contain paracetamol (or acetaminophen), ibuprofen or other NSAIDs. Do not take more than the recommended dose or duration of treatment. This medicine may cause stomach bleeding if you are 60 years old or older, have had stomach ulcers or bleeding problems, taking a blood thinning (anticoagulant) or steroid drug.\r\n\r\n', 'Minor allergic type reactions such as skin rashes, stomach and intestinal undesirable effects such as ulceration and/or bleeding. Other undesirable side effects are indigestion, heartburn, nausea, vomiting, eating disorder (anorexia), diarrhea, constipation, mouth ulcers (stomatitis), flatulence, bloating and abdominal pain. May also cause dizziness, drowsiness, general ill feeling (malaise), lightheadedness, nervousness, headache, fatigue, mood swigs (emotional liability), loss of sensation (paresthesia), hallucinations and dream abnormalities.', 'This product should not be taken:\r\n-if you are allergic to paracetamol, ibuprofen, aspirin and other NSAIDs, may cause severe allergic reactions\r\n-if you have or have ever had kidney disease\r\n-right before or after heart surgery\r\n-if you have a history of stroke, heart attack, uncontrolled high blood pressure, or congestive heart failure\r\n-if you have bronchospasm (constriction of air passage of the lungs), angioedema (rapid swelling that occurs in the tissue just below the surface of the skin), nasal polyps or allergic-type reactions after taking aspirin or other NSAIDs\r\n-if you are pregnant or breastfeeding unless advised by your doctor. It is especially important not to use an NSAID-containing product during the last three months of pregnancy unless definitely directed to do so by a doctor because it may cause problems in the unborn child or complications during pregnancy', 'alaxan325mg.jpg', '', 91, '100', 2, 0, 'Ibrufopen', 10, 6),
(4, 1, 5, 'Ciproxin', 'BAYER HEALTH CARE', 'Prescription', '500mg ', 'Tablet', '20.1', 2.75, '2021-10-22 04:56 PM', 'Treatment of bacterial infections of the lungs, nose, ear, bones and joints, skin and soft tissue, kidney, bladder, abdomen, and genitals caused by ciprofloxacin-susceptible organisms. Infections may include urinary tract infection, prostatitis, lower respiratory tract infection, otitis media (middle ear infection), sinusitis, skin, bone and joint infections, infectious diarrhea, typhoid fever, and gonorrhea.', '', '', '', 'pa', 'ciprofloxacin.jpg', '', 0, '100', 5, 0, 'Ciproflaxin', 10, 6),
(5, 1, 1, 'Enervon', 'United American Pharmaceuticals, Inc.', 'Over the Counter', '500mg ', 'Tablet', '190', 193, '2021-10-22 05:07 PM', 'Daily Adult Multivitamins With Vitamin C & B-Complex For More Immunity & Energy. Vit. C·Vitamins B1·B2·B5·B6·B12·Nicotinamide.', 'Adults: Take one tablet daily, or as directed by the doctor.\r\n\r\n', 'Do not take more than the recommended dose.', 'May cause diarrhea, stomach pain, and nausea in prolonged intake of large doses. Rarely, allergic reactions.', 'This product should not be given to patients with known hypersensitivity or allergy to any of its ingredients.', 'enervon.png', '', 0, '1', 1, 0, 'Multivitamins', 10, 6),
(6, 1, 2, 'Plemex Forte', 'Trevenodd Corp', 'Over the Counter', '600mg', 'Capsule', '7', 8, '2021-10-22 05:14 PM', 'Relief of cough due to common colds, flu, and bronchospasm associated with asthma, bronchitis, and other lung disorders.\r\n\r\nPer capsule: Vitex negundo L. (powdered lagundi leaves) 600 mg', 'ADULTS: Take 1 capsule 3-4 times a day.', 'Patients with hypersensitivity or allergy to plants and those who are pregnant or breastfeeding should consult the doctor first before taking any medication.', 'May cause mild side effects such as itchiness, nausea, vomiting and diarrhea without a predominating complaint.', '', 'plemexforte600mg.jpg', '', 98, '100', 6, 0, 'Lagundi', 10, 4),
(8, 1, 3, 'Medicol Advance', 'Myra Pharmaceuticals, Inc.', 'Over the Counter', '400mg', 'Capsule', '10', 11, '2021-10-22 05:36 PM', 'For the relief of mild to moderate pain such as backache, headache, toothache, menstrual pain, and minor pain due to arthritis. Used to reduce swelling, fever, and aches or pains associated with colds and flu.', '', '', '', '', 'medicol.jpg', '', 0, '100', 2, 0, 'Ibrufopen', 10, 4),
(9, 1, 1, 'Enervon C KIDS', 'United American Pharmaceuticals, Inc. ', 'Over the Counter', '500mg ', 'Syrup', '50', 60, '2021-10-29 11:21 AM', 'Vitamins for kids', '', '', '', '', 'Enervonkids.jpg', '', 0, '', 1, 0, 'Multivitamins', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `CATEGORY_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `CATEGORY_NAME` varchar(45) NOT NULL,
  `CATEGORY_LABEL_COLOR` varchar(50) NOT NULL,
  `CATEGORY_DESCRIPTION` varchar(300) NOT NULL,
  `CATEGORY_DATETIME_ADDED` varchar(25) NOT NULL,
  `CATEGORY_STATUS` varchar(30) NOT NULL,
  `CATEGORY_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`CATEGORY_ID`, `USER_ID`, `CATEGORY_NAME`, `CATEGORY_LABEL_COLOR`, `CATEGORY_DESCRIPTION`, `CATEGORY_DATETIME_ADDED`, `CATEGORY_STATUS`, `CATEGORY_ARCHIVE`) VALUES
(1, 1, 'Vitamins  ', '', 'vitamin is to fill nutritional gaps and make sure people get their daily  ', '2021-10-12 19:43 pm', 'Active', 0),
(2, 1, 'Cough & Colds ', '', 'Medicines that help to cure cough and colds', '2021-10-18 14:49 pm', 'Active', 0),
(3, 1, 'Fever and Pain Relief ', '', 'Reduce fever and pain ', '2021-10-18 14:50 pm', 'Active', 0),
(4, 1, 'Allergies', '', 'Medicine that helps to cure allergies', '2021-10-22 16:19 pm', 'Active', 0),
(5, 1, 'Antibacteria', '', 'The drugs that prevent bacteria to spread more', '2021-10-22 16:31 pm', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_return`
--

CREATE TABLE `product_return` (
  `PR_ID` int(10) NOT NULL,
  `RETURN_ID` int(10) NOT NULL,
  `ORDER_ID` int(10) NOT NULL,
  `ORDER_ITEM_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `PR_QTY` int(10) NOT NULL,
  `PR_RATE` varchar(11) NOT NULL,
  `PR_TOTAL` varchar(11) NOT NULL,
  `CUST_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_problem`
--

CREATE TABLE `report_problem` (
  `REPORT_ID` int(10) NOT NULL,
  `CUST_ID` int(10) NOT NULL,
  `REPORT_CONTENT` varchar(300) NOT NULL,
  `REPORT_STATUS` varchar(15) NOT NULL,
  `REPORT_DATETIME` datetime NOT NULL,
  `REPORT_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_product`
--

CREATE TABLE `return_product` (
  `RETURN_ID` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `order_item_id` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `RETURN_REASON` varchar(200) NOT NULL,
  `return_image` varchar(50) NOT NULL,
  `return_rate` varchar(10) NOT NULL,
  `RETURN_DATETIME_ADDED` varchar(20) NOT NULL,
  `RETURN_STATUS` varchar(50) NOT NULL,
  `RETURN_CUSTOMER` int(10) NOT NULL,
  `RETURN_ADMIN` int(10) NOT NULL,
  `RETURN_QTY` varchar(20) NOT NULL,
  `RETURN_TOTAL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `DRIDER_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `DRIDER_FNAME` varchar(30) NOT NULL,
  `DRIDER_LNAME` varchar(30) NOT NULL,
  `DRIDER_EMAIL` varchar(30) NOT NULL,
  `DRIDER_CONTACT_NO` varchar(12) NOT NULL,
  `DRIDER_MNAME` varchar(30) DEFAULT NULL,
  `DRIDER_STREETNO` varchar(30) NOT NULL,
  `DRIDER_BARANGAY` varchar(30) NOT NULL,
  `DRIDER_MUNICIPALITY` varchar(30) NOT NULL,
  `DRIDER_PROVINCE` varchar(30) NOT NULL,
  `DRIDER_USERNAME` varchar(30) NOT NULL,
  `DRIDER_PASSWORD` varchar(30) NOT NULL,
  `DRIDER_STATUS` varchar(25) NOT NULL,
  `DRIDER_PICTURE` blob DEFAULT NULL,
  `DRIDER_DATETIME_CREATED` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`DRIDER_ID`, `USER_ID`, `DRIDER_FNAME`, `DRIDER_LNAME`, `DRIDER_EMAIL`, `DRIDER_CONTACT_NO`, `DRIDER_MNAME`, `DRIDER_STREETNO`, `DRIDER_BARANGAY`, `DRIDER_MUNICIPALITY`, `DRIDER_PROVINCE`, `DRIDER_USERNAME`, `DRIDER_PASSWORD`, `DRIDER_STATUS`, `DRIDER_PICTURE`, `DRIDER_DATETIME_CREATED`) VALUES
(1, 1, 'Jhenell sample', 'Meneses ', 'jnllmnss@gmail.com', '9101562264', 'Rivero ', '005', 'Bancal ', 'Meycauayan Bulacan ', 'Bulacan ', 'rider', 'rider', 'Deactivate', NULL, '2021-10-12 10:43 PM'),
(3, 1, 'Jovan ', 'Dela Cruz s ', 'juliesfernando11@gma', '9029292111', 'Camacho ', 'Turin Street ', 'aaa ', 'Taguig ', 'Metro Manila ', 'rider3', 'rider3', 'Active', NULL, '2021-10-29 11:02 AM'),
(10, 1, 'Vincent', 'Luague', 'juliesfernando11@gmail.com', '9827261626', 'Parungao', '59 Camia st., Lhinet', 'saog', 'Marilao', 'Bulacan', 'admin', 'Lawren1', 'Active', NULL, '2021-11-03 05:09 PM');

-- --------------------------------------------------------

--
-- Table structure for table `rider_token`
--

CREATE TABLE `rider_token` (
  `token_id` int(10) NOT NULL,
  `driver_id` varchar(10) NOT NULL,
  `token` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rider_token`
--

INSERT INTO `rider_token` (`token_id`, `driver_id`, `token`) VALUES
(1, '3', ''),
(2, '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `STOCK_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `PRODUCT_ID` int(10) NOT NULL,
  `SUPPLIER_ID` int(10) NOT NULL,
  `STOCK_QUANTITY` int(10) NOT NULL,
  `STOCK_EXPIRYDATE` date NOT NULL,
  `STOCK_MONTHS` date NOT NULL,
  `STOCK_STATUS` varchar(20) NOT NULL,
  `STOCK_DATETIME_ADDED` varchar(20) NOT NULL,
  `STOCK_DATES` date NOT NULL,
  `BATCH_NO` varchar(25) NOT NULL,
  `STOCK_MANUFACTURE_DATE` date NOT NULL,
  `STOCK_PREV` int(10) NOT NULL,
  `STOCK_ARCHIVE` int(2) NOT NULL,
  `EXPIRE_STATUS` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`STOCK_ID`, `USER_ID`, `PRODUCT_ID`, `SUPPLIER_ID`, `STOCK_QUANTITY`, `STOCK_EXPIRYDATE`, `STOCK_MONTHS`, `STOCK_STATUS`, `STOCK_DATETIME_ADDED`, `STOCK_DATES`, `BATCH_NO`, `STOCK_MANUFACTURE_DATE`, `STOCK_PREV`, `STOCK_ARCHIVE`, `EXPIRE_STATUS`) VALUES
(1, 1, 1, 4, 100, '2023-06-30', '2023-04-01', '', '2021-11-13 09:59 AM', '2021-11-13', 'b12021', '0000-00-00', 0, 0, 0),
(2, 1, 3, 4, 100, '2022-09-30', '2022-07-02', '', '2021-11-13 10:03 AM', '2021-11-13', 'b12021', '0000-00-00', 0, 0, 0),
(3, 1, 6, 4, 100, '2022-08-31', '2022-06-02', '', '2021-11-13 10:04 AM', '2021-11-13', 'b12021', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `SUPPLIER_FNAME` varchar(30) NOT NULL,
  `SUPPLIER_LNAME` varchar(30) NOT NULL,
  `SUPPLIER_MNAME` varchar(30) DEFAULT NULL,
  `SUPPLIER_COMPANY_NAME` varchar(50) NOT NULL,
  `SUPPLIER_STREETNO` varchar(45) NOT NULL,
  `SUPPLIER_BARANGAY` varchar(45) NOT NULL,
  `SUPPLIER_MUNICIPALITY` varchar(45) NOT NULL,
  `SUPPLIER_PROVINCE` varchar(45) NOT NULL,
  `SUPPLIER_STATUS` varchar(15) NOT NULL,
  `SUPPLIER_DATETIME_CREATED` varchar(20) NOT NULL,
  `SUPPLIER_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `USER_ID`, `SUPPLIER_FNAME`, `SUPPLIER_LNAME`, `SUPPLIER_MNAME`, `SUPPLIER_COMPANY_NAME`, `SUPPLIER_STREETNO`, `SUPPLIER_BARANGAY`, `SUPPLIER_MUNICIPALITY`, `SUPPLIER_PROVINCE`, `SUPPLIER_STATUS`, `SUPPLIER_DATETIME_CREATED`, `SUPPLIER_ARCHIVE`) VALUES
(1, 1, 'lawrence', 'luague', 'q', 'sdfasdf', 'adasdas', 'dasda', 'sdasda', 'dasdsd', 'Active', 'SADA', 1),
(3, 1, 'Vincent', 'Luague', 'Parungao', 'aaaaaas', '59 Camia st.', 'saog', 'Marilao', 'Bulacan', 'Active', '2021-10-25 07:31 PM', 1),
(4, 1, 'Jovan', 'Dela Cruz s', 'Camacho', 'Abbott Laboratories', 'Turin Street', 'saog', 'Taguig', 'Metro Manila', 'Active', '2021-10-29 11:07 AM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_condition`
--

CREATE TABLE `terms_and_condition` (
  `TERMS_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `TERMS_TITLE` varchar(50) NOT NULL,
  `TERMS_CONTENT` varchar(1000) NOT NULL,
  `TERMS_STATUS` varchar(15) NOT NULL,
  `TERMS_DATETIME_ADDED` varchar(20) NOT NULL,
  `TERMS_ARCHIVE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token_id` int(10) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `token` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token_id`, `customer_id`, `token`) VALUES
(11, '1', ''),
(12, '2', ''),
(13, '11', ''),
(14, '20', 'fn_9EG21-2mHxzAcq4mDib:APA91bERoVERv6GLhwdWWKd34kMR5EJIO4tHyYBKJ22PhZnohUAZXklN-XJNpnuE1e6-RrXVnHAITkpXkW39_rwFMMfcrXQzJ_Cc6pvVtceCfnS_OOlrDPgUvF4JcfhWu9NMWWO-5HuF'),
(15, '13', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_datetime` varchar(20) NOT NULL,
  `user_archieve` int(2) NOT NULL,
  `user_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_email`, `user_password`, `user_fname`, `user_lname`, `user_contact`, `user_datetime`, `user_archieve`, `user_status`) VALUES
(1, 'admin      ', 'lawrenceluague@gmail.com', 'admin123', 'Lawrence', 'Luague  ', '9635950711', '2021-10-29 10:46 AM', 0, ''),
(4, 'admin', 'juliesfernando11@gmail.com', 'Lawrenc2', 'Luague', 'Vincent', '9281827237', '2021-10-29 12:02 AM', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `LOG_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `LOG_IN_DATETIME` varchar(25) NOT NULL,
  `LOG_OUT_DATETIME` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`LOG_ID`, `USER_ID`, `LOG_IN_DATETIME`, `LOG_OUT_DATETIME`) VALUES
(1, 1, '2021-11-11 11:31 AM', ''),
(2, 1, '2021-11-12 12:01 PM', ''),
(3, 1, '2021-11-12 02:42 PM', ''),
(4, 1, '2021-11-12 05:20 PM', ''),
(5, 1, '2021-11-13 09:52 AM', ''),
(6, 1, '2021-11-14 10:22 AM', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ABOUT_ID`);

--
-- Indexes for table `admin_token`
--
ALTER TABLE `admin_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `audit_activity`
--
ALTER TABLE `audit_activity`
  ADD PRIMARY KEY (`AUDIT_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`BANNER_ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`CONTACT_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `customer_log`
--
ALTER TABLE `customer_log`
  ADD PRIMARY KEY (`LOG_ID`);

--
-- Indexes for table `customer_senior`
--
ALTER TABLE `customer_senior`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  ADD PRIMARY KEY (`DELIVERY_ID`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`DISCOUNT_ID`);

--
-- Indexes for table `epayment`
--
ALTER TABLE `epayment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`FAQ_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FEEDBACK_ID`),
  ADD KEY `USER_ID` (`CUST_ID`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`FORM_ID`);

--
-- Indexes for table `gcash_payment`
--
ALTER TABLE `gcash_payment`
  ADD PRIMARY KEY (`qr_id`);

--
-- Indexes for table `generic_product`
--
ALTER TABLE `generic_product`
  ADD PRIMARY KEY (`GEN_ID`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`MOBILE_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`PRIVACY_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `product_return`
--
ALTER TABLE `product_return`
  ADD PRIMARY KEY (`PR_ID`);

--
-- Indexes for table `report_problem`
--
ALTER TABLE `report_problem`
  ADD PRIMARY KEY (`REPORT_ID`),
  ADD KEY `USER_ID` (`CUST_ID`);

--
-- Indexes for table `return_product`
--
ALTER TABLE `return_product`
  ADD PRIMARY KEY (`RETURN_ID`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`DRIDER_ID`);

--
-- Indexes for table `rider_token`
--
ALTER TABLE `rider_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`STOCK_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`);

--
-- Indexes for table `terms_and_condition`
--
ALTER TABLE `terms_and_condition`
  ADD PRIMARY KEY (`TERMS_ID`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`LOG_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `ABOUT_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `token_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_activity`
--
ALTER TABLE `audit_activity`
  MODIFY `AUDIT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `BANNER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `CONTACT_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_log`
--
ALTER TABLE `customer_log`
  MODIFY `LOG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_senior`
--
ALTER TABLE `customer_senior`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_fee`
--
ALTER TABLE `delivery_fee`
  MODIFY `DELIVERY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `DISCOUNT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `epayment`
--
ALTER TABLE `epayment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `FAQ_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FEEDBACK_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `FORM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gcash_payment`
--
ALTER TABLE `gcash_payment`
  MODIFY `qr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `generic_product`
--
ALTER TABLE `generic_product`
  MODIFY `GEN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mobile`
--
ALTER TABLE `mobile`
  MODIFY `MOBILE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `PRIVACY_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `CATEGORY_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_return`
--
ALTER TABLE `product_return`
  MODIFY `PR_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_problem`
--
ALTER TABLE `report_problem`
  MODIFY `REPORT_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_product`
--
ALTER TABLE `return_product`
  MODIFY `RETURN_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `DRIDER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rider_token`
--
ALTER TABLE `rider_token`
  MODIFY `token_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `STOCK_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms_and_condition`
--
ALTER TABLE `terms_and_condition`
  MODIFY `TERMS_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `token_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `LOG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"bpmsdb\",\"table\":\"tblbook\"},{\"db\":\"bpmsdb\",\"table\":\"tblcategory\"},{\"db\":\"bpmsdb\",\"table\":\"tblgcash\"},{\"db\":\"bpmsdb\",\"table\":\"brands\"},{\"db\":\"bpmsdb\",\"table\":\"tbladmin\"},{\"db\":\"bpmsdb\",\"table\":\"tblcontact\"},{\"db\":\"bpmsdb\",\"table\":\"tblproduct\"},{\"db\":\"bpmsdb\",\"table\":\"tbluser\"},{\"db\":\"bpmsdb\",\"table\":\"tblinvoice\"},{\"db\":\"bpmsdb\",\"table\":\"tblbrand\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'bpmsdb', 'brands', '{\"sorted_col\":\"`brands`.`brand_id` DESC\"}', '2022-10-03 05:15:49'),
('root', 'bpmsdb', 'product', '{\"sorted_col\":\"`product`.`status` ASC\"}', '2022-10-13 05:07:55'),
('root', 'bpmsdb', 'tblbook', '{\"sorted_col\":\"`tblbook`.`appt_to` DESC\"}', '2023-02-14 23:49:45'),
('root', 'bpmsdb', 'tblbrand', '{\"CREATE_TIME\":\"2022-10-28 14:37:29\",\"col_order\":[0,1,2,3,4],\"col_visib\":[1,1,1,1,1]}', '2022-10-28 06:38:47'),
('root', 'bpmsdb', 'tblproduct', '{\"sorted_col\":\"`tblproduct`.`product_datetime_added` ASC\"}', '2022-10-28 07:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-02-14 23:51:27', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":244,\"SendErrorReports\":\"always\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
