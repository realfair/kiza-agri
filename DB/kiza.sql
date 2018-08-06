-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 08:02 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `userId` int(10) NOT NULL,
  `userName` varchar(1024) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` int(5) NOT NULL,
  `status` varchar(200) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`userId`, `userName`, `email`, `password`, `type`, `status`, `regDate`) VALUES
(1, 'Samuel sugira', 'sam@kiza.com', 'samuels', 1, 'ACTIVE', '2018-06-21 16:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `cells`
--

CREATE TABLE `cells` (
  `cellId` int(100) NOT NULL,
  `provinceId` int(100) NOT NULL,
  `districtId` int(100) NOT NULL,
  `sectorId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cooperatives`
--

CREATE TABLE `cooperatives` (
  `cooperativeId` int(100) NOT NULL,
  `cooperativeCode` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `location` int(10) NOT NULL,
  `sector` int(10) NOT NULL,
  `cell` int(10) NOT NULL,
  `village` int(10) NOT NULL,
  `TIN` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `president` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `profile_image` varchar(1024) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cooperatives`
--

INSERT INTO `cooperatives` (`cooperativeId`, `cooperativeCode`, `name`, `username`, `phone`, `location`, `sector`, `cell`, `village`, `TIN`, `category`, `president`, `status`, `profile_image`, `regDate`) VALUES
(1, 18566, 'KOTUKA', 'K_18566', '+250788456323', 1, 12, 0, 0, 198765, 'AGRICULTURE', 'Sugira Samuel', 'ACTIVE', '', '2018-06-12 12:20:54'),
(2, 21526, 'KOTUKA', 'K_21526', '+250788456323', 1, 1, 0, 0, 198765, 'AGRICULTURE', 'Sugira Samuel', 'ACTIVE', '', '2018-06-12 12:31:17'),
(3, 39901, 'sdsdsd', 's_39901', '09876543221', 2, 0, 0, 0, 0, 'AGRICULTURE', 'dsds', 'ACTIVE', '', '2018-06-12 12:41:29'),
(4, 45881, 'COCOMANYA', 'C_45881', '09876543223', 2, 0, 0, 0, 123456, 'AGRICULTURE', 'samuel', 'ACTIVE', '', '2018-06-12 12:46:45'),
(5, 53895, 'COCOMANYA', 'C_53895', '09876545523', 2, 0, 0, 0, 123456, 'AGRICULTURE', 'samuel', 'ACTIVE', '', '2018-06-12 13:02:24'),
(6, 61248, 'KOTUKA', 'K_61248', '+250788456323', 5, 0, 0, 0, 198765, 'AGRICULTURE', 'Sugira Samuel', 'ACTIVE', '', '2018-06-12 13:39:54'),
(7, 72836, 'BERWA', 'coop_7', '0788998877', 2, 2, 0, 0, 12333, 'AGRICULTURE', 'SAMUEL SUGIRA', 'ACTIVE', '', '2018-06-25 09:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `coo_communication`
--

CREATE TABLE `coo_communication` (
  `messageId` int(100) NOT NULL,
  `adminId` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `body` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coo_communication`
--

INSERT INTO `coo_communication` (`messageId`, `adminId`, `cooperativeId`, `title`, `body`, `category`, `status`, `sentDate`) VALUES
(1, 1, 1, 'dsdsdsds', 'dsdsdsdsds', 'MESSAGE', 'UNREAD', '2018-07-07 11:07:19'),
(2, 1, 1, 'Hey its a title', 'Yeah nice one this is a message', 'MESSAGE', 'UNREAD', '2018-07-07 12:14:45'),
(3, 1, 7, 'Mwiriwe umusaruro wanyu ntabwo wujuje ubuziranenge', 'Mwiriwe umusaruro wanyu ntabwo wujuje ubuziranenge', 'MESSAGE', 'UNREAD', '2018-07-09 10:18:56'),
(4, 1, 7, 'umusaruro', 'dukeneye umusaruro wanyu', 'ALERT', 'UNREAD', '2018-07-11 18:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `coo_crops`
--

CREATE TABLE `coo_crops` (
  `cropid` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `crop` varchar(200) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coo_crops`
--

INSERT INTO `coo_crops` (`cropid`, `cooperativeId`, `crop`, `grade`, `status`, `regDate`) VALUES
(1, 2, '1', '1', 'ACTIVE', '2018-06-13 08:17:54'),
(2, 2, '2', '2', 'DELETED', '2018-06-13 09:24:58'),
(3, 2, '1', '3', 'DELETED', '2018-06-13 09:57:52'),
(4, 2, '2', '4', 'DELETED', '2018-06-13 10:00:00'),
(5, 2, '1', '3', 'DELETED', '2018-06-13 10:37:33'),
(6, 2, '2', '4', 'ACTIVE', '2018-06-13 10:40:32'),
(7, 2, '1', '3', 'ACTIVE', '2018-06-13 10:40:46'),
(8, 2, '3', '6', 'ACTIVE', '2018-06-13 17:29:50'),
(9, 2, '2', '2', 'ACTIVE', '2018-06-23 12:10:06'),
(10, 2, '3', '5', 'ACTIVE', '2018-06-23 12:59:14'),
(11, 7, '2', '2', 'DELETED', '2018-06-25 09:53:35'),
(12, 7, '2', '4', 'DELETED', '2018-06-25 09:53:44'),
(13, 7, '1', '1', 'DELETED', '2018-06-25 10:05:58'),
(14, 7, '1', '3', 'DELETED', '2018-06-25 11:09:28'),
(15, 7, '2', '2', 'DELETED', '2018-06-26 08:49:24'),
(16, 7, '3', '6', 'DELETED', '2018-07-07 12:38:00'),
(17, 7, '2', '2', 'DELETED', '2018-07-10 11:06:46'),
(18, 7, '2', '2', 'ACTIVE', '2018-07-11 18:17:48'),
(19, 7, '1', '3', 'ACTIVE', '2018-07-11 18:17:57'),
(20, 7, '1', '1', 'ACTIVE', '2018-07-11 18:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `coo_fertilizers`
--

CREATE TABLE `coo_fertilizers` (
  `fertilizerId` int(100) NOT NULL,
  `cooperative` int(100) NOT NULL,
  `fertilizer` int(100) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coo_fertilizers`
--

INSERT INTO `coo_fertilizers` (`fertilizerId`, `cooperative`, `fertilizer`, `quantity`, `status`, `regDate`) VALUES
(1, 2, 2, '100', 'ACTIVE', '2018-06-23 10:44:43'),
(2, 2, 1, '12', 'ACTIVE', '2018-06-23 10:45:06'),
(3, 2, 1, '12', 'ACTIVE', '2018-06-23 10:45:06'),
(4, 2, 4, '12', 'ACTIVE', '2018-06-23 10:49:06'),
(5, 2, 4, '12', 'ACTIVE', '2018-06-23 10:49:06'),
(6, 2, 1, '0', 'ACTIVE', '2018-06-23 10:53:50'),
(7, 2, 1, '0', 'ACTIVE', '2018-06-23 10:53:50'),
(8, 7, 1, '100', 'ACTIVE', '2018-06-26 07:52:22'),
(9, 7, 3, '123', 'ACTIVE', '2018-06-26 09:01:32'),
(10, 7, 2, '14', 'ACTIVE', '2018-07-07 12:44:25'),
(11, 7, 2, '100', 'ACTIVE', '2018-07-07 12:47:39'),
(12, 7, 0, '123', 'ACTIVE', '2018-07-15 10:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `coo_harvest`
--

CREATE TABLE `coo_harvest` (
  `harvestId` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `memberId` int(100) NOT NULL,
  `crop` int(100) NOT NULL,
  `grade` int(100) NOT NULL,
  `variety` int(100) NOT NULL,
  `memberHarvest` int(100) NOT NULL,
  `cooperativeHarvest` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coo_harvest`
--

INSERT INTO `coo_harvest` (`harvestId`, `cooperativeId`, `memberId`, `crop`, `grade`, `variety`, `memberHarvest`, `cooperativeHarvest`, `status`, `regDate`) VALUES
(5, 2, 5, 2, 2, 3, 43, 23, 'ACTIVE', '2018-06-14 09:07:23'),
(7, 2, 2, 1, 1, 1, 54, 33, 'ACTIVE', '2018-06-14 09:09:52'),
(8, 2, 2, 1, 1, 1, 54, 33, 'ACTIVE', '2018-06-14 09:09:52'),
(9, 2, 2, 1, 1, 1, 12, 23, 'ACTIVE', '2018-06-19 07:45:46'),
(10, 2, 2, 1, 1, 1, 12, 23, 'ACTIVE', '2018-06-19 07:45:46'),
(11, 2, 5, 3, 5, 4, 12, 32, 'ACTIVE', '2018-06-23 13:00:31'),
(12, 2, 5, 3, 5, 4, 12, 32, 'ACTIVE', '2018-06-23 13:00:31'),
(13, 7, 7, 2, 2, 2, 12, 100, 'ACTIVE', '2018-06-26 07:49:19'),
(14, 7, 8, 1, 1, 1, 12, 12, 'ACTIVE', '2018-06-26 08:07:16'),
(15, 7, 8, 1, 1, 1, 32, 12, 'ACTIVE', '2018-06-26 08:15:59'),
(16, 7, 9, 2, 2, 3, 120, 128, 'ACTIVE', '2018-06-26 08:53:23'),
(17, 7, 9, 1, 1, 1, 124, 23, 'ACTIVE', '2018-07-07 12:39:00'),
(18, 7, 11, 1, 1, 1, 65, 123, 'ACTIVE', '2018-07-07 12:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `coo_land`
--

CREATE TABLE `coo_land` (
  `land_id` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `memberId` int(100) NOT NULL,
  `coop_land` varchar(100) NOT NULL,
  `member_land` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coo_land`
--

INSERT INTO `coo_land` (`land_id`, `cooperativeId`, `memberId`, `coop_land`, `member_land`, `status`, `regDate`) VALUES
(1, 2, 4, '23', '43', 'ACTIVE', '2018-06-20 05:02:48'),
(2, 2, 2, '32', '12', 'ACTIVE', '2018-06-20 05:05:25'),
(4, 2, 4, '12', '56', 'ACTIVE', '2018-06-20 09:50:08'),
(5, 2, 4, '12', '56', 'ACTIVE', '2018-06-20 09:50:08'),
(0, 7, 7, '434', '123', 'ACTIVE', '2018-06-26 08:17:33'),
(0, 7, 9, '122', '1023', 'ACTIVE', '2018-06-26 09:07:32'),
(0, 7, 8, '322', '123', 'ACTIVE', '2018-07-09 20:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `coo_members`
--

CREATE TABLE `coo_members` (
  `memberId` int(100) NOT NULL,
  `cooperative` int(100) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` int(2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coo_members`
--

INSERT INTO `coo_members` (`memberId`, `cooperative`, `name`, `id_no`, `phone`, `dob`, `gender`, `status`, `regDate`) VALUES
(1, 1, 'Manikiza samuel', '123456789', '098765422', '12/12/12', 0, '', '2018-06-12 18:08:54'),
(2, 2, 'Manikiza samuel', '123456789', '098765422', '12/12/12', 0, 'ACTIVE', '2018-06-12 18:09:50'),
(3, 2, 'manikiza', '1222222', '2222222', '12/12/1990', 0, 'ACTIVE', '2018-06-12 18:29:51'),
(4, 2, 'ingabire donnes', '1234567890', '0788904567845', '12/12/1990', 1, 'ACTIVE', '2018-06-12 18:42:17'),
(5, 2, 'mushya', '111111111111107', '111111111111111111', '12/12/12', 0, 'ACTIVE', '2018-06-13 18:09:34'),
(6, 2, 'mushya', '111111111111107', '111111111111111111', '12/12/12', 0, 'ACTIVE', '2018-06-13 18:09:34'),
(7, 7, 'Manikiza samuel', '1234567890', '0788998877', '12/12/2000', 0, 'ACTIVE', '2018-06-25 09:48:55'),
(8, 7, 'Candide Sifa', '1256876543456', '0788998877', '12/12/1990', 1, 'DELETED', '2018-06-26 07:58:31'),
(9, 7, 'Lambert Rulindana', '111111221232342', '0781187555', '01/01/1990', 0, 'DELETED', '2018-06-26 08:44:15'),
(10, 7, 'placide hakuzwe yezu', '1478523698521', '0786601003', '1990-03-06', 0, 'DELETED', '2018-07-07 12:31:31'),
(11, 7, 'reine imanashimwe', '2116151651651', '784848236', '1990-03-06', 1, 'ACTIVE', '2018-07-07 12:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `coo_pesticides`
--

CREATE TABLE `coo_pesticides` (
  `pesticideId` int(100) NOT NULL,
  `cooperative` int(100) NOT NULL,
  `pesticide` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coo_pricing`
--

CREATE TABLE `coo_pricing` (
  `priceId` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `crop` int(100) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `variety` varchar(10) NOT NULL,
  `price` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coo_pricing`
--

INSERT INTO `coo_pricing` (`priceId`, `cooperativeId`, `crop`, `grade`, `variety`, `price`, `status`, `regDate`) VALUES
(3, 2, 1, '1', '1', 5000, 'ACTIVE', '2018-06-13 19:29:38'),
(4, 2, 1, '1', '1', 0, 'ACTIVE', '2018-06-14 08:43:26'),
(5, 2, 1, '1', '1', 0, 'ACTIVE', '2018-06-14 08:43:27'),
(6, 2, 2, '2', '3', 12, 'ACTIVE', '2018-06-23 12:27:08'),
(7, 2, 2, '2', '3', 12, 'ACTIVE', '2018-06-23 12:27:08'),
(8, 7, 2, '2', '2', 12, 'PENDING', '2018-06-25 10:56:27'),
(9, 7, 2, '2', '2', 1000, 'PENDING', '2018-06-26 07:21:13'),
(10, 7, 2, '2', '2', 100, 'PENDING', '2018-06-26 07:49:00'),
(11, 7, 2, '2', '3', 234, 'ACTIVE', '2018-06-26 08:58:55'),
(12, 7, 2, '2', '2', 444, 'PENDING', '2018-06-26 08:59:24'),
(13, 7, 2, '2', '2', 100, 'ACTIVE', '2018-06-26 12:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `cropsgrade`
--

CREATE TABLE `cropsgrade` (
  `gradeId` int(100) NOT NULL,
  `cropId` int(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cropsgrade`
--

INSERT INTO `cropsgrade` (`gradeId`, `cropId`, `grade`, `status`, `regDate`) VALUES
(1, 1, 'Imishingiriro', 'ACTIVE', '2018-06-13 06:59:30'),
(2, 2, 'Mayizona', 'ACTIVE', '2018-06-13 07:30:20'),
(3, 1, 'Umutuku', 'ACTIVE', '2018-06-13 07:44:40'),
(4, 2, 'Umutuku', 'ACTIVE', '2018-06-13 08:59:14'),
(5, 3, 'Tanzania', 'ACTIVE', '2018-06-13 17:29:08'),
(6, 3, 'Bugarama', 'ACTIVE', '2018-06-13 17:29:39'),
(7, 1, 'U2', '', '2018-07-15 13:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `cropsvariety`
--

CREATE TABLE `cropsvariety` (
  `varietyId` int(100) NOT NULL,
  `gradeId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cropsvariety`
--

INSERT INTO `cropsvariety` (`varietyId`, `gradeId`, `name`, `status`, `regDate`) VALUES
(1, 1, 'U7', 'ACTIVE', '2018-06-13 16:40:25'),
(2, 2, 'u7', 'ACTIVE', '2018-06-13 18:26:01'),
(3, 2, 'u5', 'ACTIVE', '2018-06-13 18:26:43'),
(4, 5, 'U1-RICE', 'ACTIVE', '2018-06-23 13:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `districtId` int(100) NOT NULL,
  `provinceId` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`districtId`, `provinceId`, `name`, `status`, `regDate`) VALUES
(1, 5, 'Rulindo', 'ACTIVE', '2018-06-12 10:03:18'),
(2, 5, 'Burera', 'ACTIVE', '2018-06-12 10:03:18'),
(3, 5, 'Musanze', 'ACTIVE', '2018-06-12 10:03:48'),
(4, 5, 'Gakenke', 'ACTIVE', '2018-06-12 10:03:48'),
(5, 5, 'Gicumbi', 'ACTIVE', '2018-06-12 10:04:12'),
(6, 1, 'Gasabo', 'ACTIVE', '2018-06-12 11:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `harvest_order`
--

CREATE TABLE `harvest_order` (
  `orderId` int(11) NOT NULL,
  `sellerId` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `varietyId` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harvest_order`
--

INSERT INTO `harvest_order` (`orderId`, `sellerId`, `cooperativeId`, `varietyId`, `quantity`, `status`, `orderDate`) VALUES
(3, 1, 7, 2, 10, 'PENDING', '2018-06-29 08:46:58'),
(4, 1, 7, 2, 45, 'PENDING', '2018-06-29 08:58:36'),
(5, 1, 7, 2, 43, 'PENDING', '2018-06-29 09:03:13'),
(6, 1, 7, 2, 100, 'PENDING', '2018-07-03 06:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `harvest_selling`
--

CREATE TABLE `harvest_selling` (
  `sellingId` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `varietyId` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `lastQuantity` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `isReceived` int(2) NOT NULL,
  `sellDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members_fertilizers`
--

CREATE TABLE `members_fertilizers` (
  `recordId` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `memberId` int(100) NOT NULL,
  `fertilizerId` int(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_fertilizers`
--

INSERT INTO `members_fertilizers` (`recordId`, `cooperativeId`, `memberId`, `fertilizerId`, `quantity`, `status`, `regDate`) VALUES
(1, 2, 4, 2, 12, 'ACTIVE', '2018-06-20 15:06:02'),
(2, 2, 4, 1, 12, 'ACTIVE', '2018-06-20 15:14:39'),
(3, 2, 2, 1, 12, 'ACTIVE', '2018-06-20 17:16:45'),
(4, 2, 2, 3, 12, 'ACTIVE', '2018-06-20 17:28:49'),
(5, 2, 2, 1, 12, 'ACTIVE', '2018-06-21 11:13:57'),
(6, 2, 6, 1, 45, 'ACTIVE', '2018-06-21 11:15:32'),
(0, 2, 3, 2, 43, 'ACTIVE', '2018-06-23 10:58:08'),
(0, 2, 3, 1, 12, 'ACTIVE', '2018-06-23 10:58:51'),
(0, 7, 7, 1, 12, 'ACTIVE', '2018-06-26 07:54:03'),
(0, 7, 9, 3, 12, 'ACTIVE', '2018-06-26 09:04:23'),
(0, 7, 8, 3, 50, 'ACTIVE', '2018-06-26 09:06:05'),
(0, 7, 7, 3, 61, 'ACTIVE', '2018-06-26 09:06:52'),
(0, 7, 9, 2, 12, 'ACTIVE', '2018-07-07 12:44:46'),
(0, 7, 7, 2, 2, 'ACTIVE', '2018-07-07 12:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `members_pesticide`
--

CREATE TABLE `members_pesticide` (
  `recordId` int(100) NOT NULL,
  `cooperative` int(100) NOT NULL,
  `memberId` int(100) NOT NULL,
  `fertilizerId` int(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_comments`
--

CREATE TABLE `message_comments` (
  `commentId` int(100) NOT NULL,
  `messageId` int(100) NOT NULL,
  `senderId` int(100) NOT NULL,
  `receiverId` int(100) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `sentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_comments`
--

INSERT INTO `message_comments` (`commentId`, `messageId`, `senderId`, `receiverId`, `comment`, `status`, `sentDate`) VALUES
(1, 0, 0, 0, '', 'UNREAD', '2018-07-07 12:32:55'),
(2, 2, 1, 1, 'dsdsdsdsdsdsds', 'DELETED', '2018-07-07 12:35:16'),
(3, 2, 1, 1, 'dsdsdsdsd', 'DELETED', '2018-07-07 12:37:29'),
(4, 2, 1, 1, 'nice once kbsa', 'UNREAD', '2018-07-07 12:44:35'),
(5, 3, 1, 7, 'mugomba gukosora ibyo bibazo niba ari inama mwatubwira.', 'UNREAD', '2018-07-09 10:19:37'),
(6, 3, 1, 7, 'nice once', 'UNREAD', '2018-07-10 17:54:47'),
(7, 4, 1, 7, 'nini', 'DELETED', '2018-07-11 18:22:11'),
(8, 4, 1, 7, 'hahha comment zirimo zikora kbsa', 'UNREAD', '2018-07-15 09:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_notifications`
--

CREATE TABLE `order_notifications` (
  `id` int(100) NOT NULL,
  `sellerId` int(100) NOT NULL,
  `cooperativeId` int(100) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `isRead` int(2) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_notifications`
--

INSERT INTO `order_notifications` (`id`, `sellerId`, `cooperativeId`, `title`, `body`, `status`, `isRead`, `regDate`) VALUES
(6, 1, 7, 'Mwohereje ubusabe bwo kugura.', 'Ubase Bwo kugura Ibiro 400 kg (by\' ibishyimbo-imishingirio)', 'READ', 0, '2018-06-29 09:40:04'),
(7, 1, 7, 'Mwohereje ubusabe bwo kugura.', 'Ubase Bwo kugura Ibiro 400 kg (by\' ibishyimbo-imishingirio)', 'READ', 0, '2018-06-29 09:40:04'),
(8, 1, 7, 'Mwohereje ubusabe bwo kugura kuri koperative : BERWA', 'Mwohereje ubusabe bwo kugura 2 ibiro 100', 'READ', 0, '2018-07-03 06:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provinceId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provinceId`, `name`, `status`, `regDate`) VALUES
(1, 'Umujyi wa kigali', 'ACTIVE', '2018-06-12 09:54:00'),
(2, 'Uburasirazuba', 'ACTIVE', '2018-06-12 09:54:00'),
(3, 'Uburengerazuba', 'ACTIVE', '2018-06-12 09:54:45'),
(4, 'Amajyepfo', 'ACTIVE', '2018-06-12 09:54:45'),
(5, 'Amajyaruguru', 'ACTIVE', '2018-06-12 09:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `sectorId` int(100) NOT NULL,
  `districtId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`sectorId`, `districtId`, `name`, `status`, `regDate`) VALUES
(1, 1, 'Rukozo', 'ACTIVE', '2018-06-12 13:25:29'),
(2, 2, 'Bungwe', 'ACTIVE', '2018-06-25 09:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `system_crops`
--

CREATE TABLE `system_crops` (
  `cropid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_crops`
--

INSERT INTO `system_crops` (`cropid`, `name`, `status`, `regDate`) VALUES
(1, 'Ibishyimbo', 'ACTIVE', '2018-06-13 06:58:55'),
(2, 'Ibigori', 'ACTIVE', '2018-06-13 07:30:02'),
(3, 'Umuceri', 'ACTIVE', '2018-06-13 17:28:42'),
(4, 'IBIRAYI', 'ACTIVE', '2018-07-09 09:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_fertilizers`
--

CREATE TABLE `system_fertilizers` (
  `fertilizerId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_fertilizers`
--

INSERT INTO `system_fertilizers` (`fertilizerId`, `name`, `status`, `regDate`) VALUES
(1, 'NPK+17', 'ACTIVE', '2018-06-20 11:29:40'),
(2, 'URA+32', 'ACTIVE', '2018-06-20 11:29:58'),
(3, 'Imborera', 'ACTIVE', '2018-06-20 12:11:34'),
(4, 'UREA+SAM', 'ACTIVE', '2018-06-23 05:12:39'),
(0, 'NPK 12-17', 'ACTIVE', '2018-07-15 10:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `system_pesticides`
--

CREATE TABLE `system_pesticides` (
  `pesticideId` int(100) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_pesticides`
--

INSERT INTO `system_pesticides` (`pesticideId`, `name`, `status`, `regDate`) VALUES
(1, 'dsdsd', 'ACTIVE', '2018-07-15 10:31:39'),
(2, 'Ammonium Sulphate', 'ACTIVE', '2018-07-17 21:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `user_id` int(100) NOT NULL,
  `cooperative` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `isOnline` int(2) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`user_id`, `cooperative`, `name`, `phone`, `username`, `password`, `email`, `type`, `status`, `isOnline`, `regDate`) VALUES
(1, 2, 'Sugira Samuel', '', 'K_21526', 'samuels', '', 'PRESIDENT', '', 0, '2018-06-12 12:31:18'),
(2, 3, 'dsds', '', 's_39901', '123456', '', 'PRESIDENT', '', 0, '2018-06-12 12:41:29'),
(3, 4, 'samuel', '', 'C_45881', '123456', '', 'PRESIDENT', '', 0, '2018-06-12 12:46:45'),
(4, 5, 'samuel', '', 'C_53895', 'samuels', '', 'PRESIDENT', '', 0, '2018-06-12 13:02:24'),
(5, 6, 'Sugira Samuel', '', 'K_61248', 'samuels', '', 'PRESIDENT', '', 0, '2018-06-12 13:39:55'),
(6, 7, 'Manikiza samuel', '', 'coop_7', 'samuels', '', 'PRESIDENT', '', 1, '2018-06-25 09:42:26'),
(7, 7, 'Manikiza samuel', '', 'coop_7', 'samuels', '', 'PRESIDENT', '', 0, '2018-06-25 09:45:46'),
(8, 7, 'SAMUEL SUGIRA', '', 'coop_7', 'samuels', '', 'PRESIDENT', '', 0, '2018-06-25 09:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `NID` int(20) DEFAULT NULL,
  `profile_picture` varchar(1024) DEFAULT NULL,
  `gender` enum('m','f','') NOT NULL,
  `password` varchar(256) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone_number` varchar(32) NOT NULL,
  `email` varchar(256) NOT NULL,
  `is_online` int(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `NID`, `profile_picture`, `gender`, `password`, `birth_date`, `phone_number`, `email`, `is_online`, `status`, `createdDate`) VALUES
(1, 'samuel sugira', 'samuel', 234567, NULL, 'm', 'samuels', '2018-06-20', '0788654312', 'sam@kiza.com', 1, 'ACTIVE', '2018-06-29 08:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `villageId` int(100) NOT NULL,
  `provinceId` int(100) NOT NULL,
  `districtId` int(100) NOT NULL,
  `sectorId` int(100) NOT NULL,
  `cellId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cells`
--
ALTER TABLE `cells`
  ADD PRIMARY KEY (`cellId`);

--
-- Indexes for table `cooperatives`
--
ALTER TABLE `cooperatives`
  ADD PRIMARY KEY (`cooperativeId`);

--
-- Indexes for table `coo_communication`
--
ALTER TABLE `coo_communication`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `coo_crops`
--
ALTER TABLE `coo_crops`
  ADD PRIMARY KEY (`cropid`);

--
-- Indexes for table `coo_fertilizers`
--
ALTER TABLE `coo_fertilizers`
  ADD PRIMARY KEY (`fertilizerId`);

--
-- Indexes for table `coo_harvest`
--
ALTER TABLE `coo_harvest`
  ADD PRIMARY KEY (`harvestId`);

--
-- Indexes for table `coo_members`
--
ALTER TABLE `coo_members`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `coo_pesticides`
--
ALTER TABLE `coo_pesticides`
  ADD PRIMARY KEY (`pesticideId`);

--
-- Indexes for table `coo_pricing`
--
ALTER TABLE `coo_pricing`
  ADD PRIMARY KEY (`priceId`);

--
-- Indexes for table `cropsgrade`
--
ALTER TABLE `cropsgrade`
  ADD PRIMARY KEY (`gradeId`);

--
-- Indexes for table `cropsvariety`
--
ALTER TABLE `cropsvariety`
  ADD PRIMARY KEY (`varietyId`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`districtId`);

--
-- Indexes for table `harvest_order`
--
ALTER TABLE `harvest_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `harvest_selling`
--
ALTER TABLE `harvest_selling`
  ADD PRIMARY KEY (`sellingId`);

--
-- Indexes for table `members_pesticide`
--
ALTER TABLE `members_pesticide`
  ADD PRIMARY KEY (`recordId`);

--
-- Indexes for table `message_comments`
--
ALTER TABLE `message_comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `order_notifications`
--
ALTER TABLE `order_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`provinceId`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`sectorId`);

--
-- Indexes for table `system_crops`
--
ALTER TABLE `system_crops`
  ADD PRIMARY KEY (`cropid`);

--
-- Indexes for table `system_pesticides`
--
ALTER TABLE `system_pesticides`
  ADD PRIMARY KEY (`pesticideId`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`villageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cells`
--
ALTER TABLE `cells`
  MODIFY `cellId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cooperatives`
--
ALTER TABLE `cooperatives`
  MODIFY `cooperativeId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coo_communication`
--
ALTER TABLE `coo_communication`
  MODIFY `messageId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coo_crops`
--
ALTER TABLE `coo_crops`
  MODIFY `cropid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coo_fertilizers`
--
ALTER TABLE `coo_fertilizers`
  MODIFY `fertilizerId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coo_harvest`
--
ALTER TABLE `coo_harvest`
  MODIFY `harvestId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `coo_members`
--
ALTER TABLE `coo_members`
  MODIFY `memberId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coo_pesticides`
--
ALTER TABLE `coo_pesticides`
  MODIFY `pesticideId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coo_pricing`
--
ALTER TABLE `coo_pricing`
  MODIFY `priceId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cropsgrade`
--
ALTER TABLE `cropsgrade`
  MODIFY `gradeId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cropsvariety`
--
ALTER TABLE `cropsvariety`
  MODIFY `varietyId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `districtId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harvest_order`
--
ALTER TABLE `harvest_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harvest_selling`
--
ALTER TABLE `harvest_selling`
  MODIFY `sellingId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members_pesticide`
--
ALTER TABLE `members_pesticide`
  MODIFY `recordId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_comments`
--
ALTER TABLE `message_comments`
  MODIFY `commentId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_notifications`
--
ALTER TABLE `order_notifications`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `provinceId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `sectorId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_crops`
--
ALTER TABLE `system_crops`
  MODIFY `cropid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_pesticides`
--
ALTER TABLE `system_pesticides`
  MODIFY `pesticideId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `villageId` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
