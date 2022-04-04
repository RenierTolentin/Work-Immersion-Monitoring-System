-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 04:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregister`
--

CREATE TABLE `adminregister` (
  `id` int(11) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `emailaccount` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `uploadedimage` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminregister`
--

INSERT INTO `adminregister` (`id`, `rfid`, `emailaccount`, `password1`, `uploadedimage`, `pin`) VALUES
(14, '0008741112', 'pentagonygh.1996@gmail.com', '33481adf86a73270c636a3a2704e5121', '1624498001_renier.jpg', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` int(11) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL,
  `ot_in` varchar(255) NOT NULL,
  `ot_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`id`, `rfid`, `fullname`, `department`, `edate`, `time_in`, `time_out`, `ot_in`, `ot_out`) VALUES
(62, '0002512498', 'Tolentin Renier Carias', 'WEB DEVELOPER', 'Tuesday, 15 June 2021', '07:04:07', '17:43:13', '14:23:29', '16:36:25'),
(63, '0002512498', 'Tolentin Renier Carias', 'WEB DEVELOPER', 'Wednesday 16 June 2021', '09:10:07', '14:26:49', '', ''),
(66, '0002512498', 'Tolentin Renier Carias', 'WEB DEVELOPER', 'Friday 18 June 2021', '10:50:10', '20:11:48', '', ''),
(69, '0002512498', 'Tolentin Renier Carias', 'WEB DEVELOPER', 'Monday 21 June 2021', '12:17:34', '13:29:13', '15:01:02', '16:11:08'),
(71, '0002497181', 'Ipion Jose Maria', 'SOFTWARE DEVELOPER', 'Tuesday, 22 June 2021', '09:23:49', '12:43:54', '', ''),
(72, '0002497181', 'Ipion Jose Maria', 'SOFTWARE DEVELOPER', 'Wednesday 23 June 2021', '09:32:34', '12:33:23', '01:32:50', '04:43:02'),
(73, '0002512498', 'Tolentin Renier Carias', 'WEB DEVELOPER', 'Wednesday 23 June 2021', '09:34:55', '12:37:49', '', ''),
(74, '0002512498', 'Tolentin Renier Carias', 'WEB DEVELOPER', 'Thursday 24 June 2021', '07:15:58', '12:32:20', '12:32:28', '19:28:23'),
(75, '0002512498', 'Tolentin Renier Carias', 'WEB DEVELOPER', 'Friday 25 June 2021', '08:28:57', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `passwordreset`
--

CREATE TABLE `passwordreset` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `emailaccount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passwordreset`
--

INSERT INTO `passwordreset` (`id`, `code`, `emailaccount`) VALUES
(191, '160d16cf0af5f7', 'pentagon@gmail.com'),
(192, '160d53185d842e', 'rentol199623@gmail.com'),
(193, '160d531b1059c3', 'rentol199623@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `studentregister`
--

CREATE TABLE `studentregister` (
  `id` int(11) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `emailaccount` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `uploadedimage` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `studentnumber` varchar(255) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentregister`
--

INSERT INTO `studentregister` (`id`, `rfid`, `emailaccount`, `password1`, `uploadedimage`, `fullname`, `studentnumber`, `schoolname`, `department`, `mobilenumber`) VALUES
(32, '0002512498', 'pentagonygh.1996@gmail.com', 'd57f21e6a273781dbf8b7657940f3b03', '1623558240_renier.jpg', 'Tolentin Renier Carias', 'SA180492', 'ICCT COLLEGES', 'WEB DEVELOPER', '09364659856'),
(33, '0002497181', 'joma@gmail.com', 'd57f21e6a273781dbf8b7657940f3b03', '1623636250_jose_maria.jpg', 'Ipion Jose Maria', 'SA180435', 'ICCT COLLEGES', 'SOFTWARE DEVELOPER', '09111111111');

-- --------------------------------------------------------

--
-- Table structure for table `time_log`
--

CREATE TABLE `time_log` (
  `id` int(11) NOT NULL,
  `rfid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_log`
--

INSERT INTO `time_log` (`id`, `rfid`, `fullname`, `date`, `department`, `status`, `time`) VALUES
(134, '0002512498', 'Tolentin Renier Carias', 'Monday 14 June 2021', 'WEB DEVELOPER', 'time-out', '09:58:12'),
(135, '0002497181', 'Ipion Jose Maria', 'Monday 14 June 2021', 'SOFTWARE DEVELOPER', 'time-in', '10:04:22'),
(136, '0002512498', 'Tolentin Renier Carias', 'Monday 14 June 2021', 'WEB DEVELOPER', 'OT: time-in', '10:41:58'),
(137, '0002512498', 'Tolentin Renier Carias', 'Tuesday, 15 June 2021', 'WEB DEVELOPER', 'time-in', '07:53:00'),
(138, '0002512498', 'Tolentin Renier Carias', 'Tuesday, 15 June 2021', 'WEB DEVELOPER', 'time-out', '14:23:13'),
(139, '0002512498', 'Tolentin Renier Carias', 'Tuesday, 15 June 2021', 'WEB DEVELOPER', 'OT: time-in', '14:23:29'),
(140, '0002512498', 'Tolentin Renier Carias', 'Tuesday, 15 June 2021', 'WEB DEVELOPER', 'OT: time-out', '14:36:29'),
(141, '0002512498', 'Tolentin Renier Carias', 'Wednesday 16 June 2021', 'WEB DEVELOPER', 'time-in', '07:44:50'),
(142, '0002506664', 'DelaCruz Rex Robert', 'Wednesday 16 June 2021', 'SOFTWARE ENGINEER', 'time-in', '14:21:38'),
(143, '0002512498', 'Tolentin Renier Carias', 'Wednesday 16 June 2021', 'WEB DEVELOPER', 'time-out', '14:26:49'),
(144, '0002512498', 'Tolentin Renier Carias', 'Thursday 17 June 2021', 'WEB DEVELOPER', 'time-in', '07:36:24'),
(145, '0002512498', 'Tolentin Renier Carias', 'Thursday 17 June 2021', 'WEB DEVELOPER', 'time-out', '14:26:56'),
(146, '0002512498', 'Tolentin Renier Carias', 'Thursday 17 June 2021', 'WEB DEVELOPER', 'OT: time-in', '14:47:51'),
(147, '0002512498', 'Tolentin Renier Carias', 'Friday 18 June 2021', 'WEB DEVELOPER', 'time-in', '10:00:20'),
(148, '0002512498', 'Tolentin Renier Carias', 'Friday 18 June 2021', 'WEB DEVELOPER', 'time-out', '20:11:48'),
(149, '0002512498', 'Tolentin Renier Carias', 'Sunday 20 June 2021', 'WEB DEVELOPER', 'time-in', '08:10:30'),
(150, '0002512498', 'Tolentin Renier Carias', 'Monday 21 June 2021', 'WEB DEVELOPER', 'time-in', '09:13:06'),
(151, '0002512498', 'Tolentin Renier Carias', 'Monday 21 June 2021', 'WEB DEVELOPER', 'time-in', '12:17:34'),
(152, '0002512498', 'Tolentin Renier Carias', 'Monday 21 June 2021', 'WEB DEVELOPER', 'time-out', '13:29:13'),
(153, '0002512498', 'Tolentin Renier Carias', 'Monday 21 June 2021', 'WEB DEVELOPER', 'OT: time-in', '15:01:02'),
(154, '0002512498', 'Tolentin Renier Carias', 'Monday 21 June 2021', 'WEB DEVELOPER', 'OT: time-out', '16:11:08'),
(155, '0002512498', 'Tolentin Renier Carias', 'Tuesday, 22 June 2021', 'WEB DEVELOPER', 'time-in', '07:48:55'),
(156, '0002497181', 'Ipion Jose Maria', 'Tuesday, 22 June 2021', 'SOFTWARE DEVELOPER', 'time-in', '09:23:49'),
(157, '0002512498', 'Tolentin Renier Carias', 'Tuesday, 22 June 2021', 'WEB DEVELOPER', 'OT: time-in', '21:33:33'),
(158, '0002497181', 'Ipion Jose Maria', 'Wednesday 23 June 2021', 'SOFTWARE DEVELOPER', 'time-in', '09:32:34'),
(159, '0002497181', 'Ipion Jose Maria', 'Wednesday 23 June 2021', 'SOFTWARE DEVELOPER', 'time-out', '09:33:23'),
(160, '0002512498', 'Tolentin Renier Carias', 'Wednesday 23 June 2021', 'WEB DEVELOPER', 'time-in', '09:34:55'),
(161, '0002512498', 'Tolentin Renier Carias', 'Wednesday 23 June 2021', 'WEB DEVELOPER', 'time-out', '09:37:49'),
(162, '0002512498', 'Tolentin Renier Carias', 'Wednesday 23 June 2021', 'WEB DEVELOPER', 'OT: time-in', '09:38:14'),
(163, '0002497181', 'Ipion Jose Maria', 'Wednesday 23 June 2021', 'SOFTWARE DEVELOPER', 'OT: time-in', '09:42:50'),
(164, '0002497181', 'Ipion Jose Maria', 'Wednesday 23 June 2021', 'SOFTWARE DEVELOPER', 'OT: time-out', '09:43:02'),
(165, '0002512498', 'Tolentin Renier Carias', 'Thursday 24 June 2021', 'WEB DEVELOPER', 'time-in', '07:15:58'),
(166, '0002512498', 'Tolentin Renier Carias', 'Thursday 24 June 2021', 'WEB DEVELOPER', 'time-out', '12:32:20'),
(167, '0002512498', 'Tolentin Renier Carias', 'Thursday 24 June 2021', 'WEB DEVELOPER', 'OT: time-in', '12:32:28'),
(168, '0002512498', 'Tolentin Renier Carias', 'Thursday 24 June 2021', 'WEB DEVELOPER', 'OT: time-out', '19:28:23'),
(169, '0002512498', 'Tolentin Renier Carias', 'Friday 25 June 2021', 'WEB DEVELOPER', 'time-in', '08:28:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregister`
--
ALTER TABLE `adminregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentregister`
--
ALTER TABLE `studentregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_log`
--
ALTER TABLE `time_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminregister`
--
ALTER TABLE `adminregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `studentregister`
--
ALTER TABLE `studentregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `time_log`
--
ALTER TABLE `time_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
