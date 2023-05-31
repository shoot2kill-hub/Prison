-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 10:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prison`
--

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `PERMISSIONID` int(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `PRISONER_ID` int(255) NOT NULL,
  `Relation` text NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(12) NOT NULL,
  `MOBILE` varchar(255) NOT NULL,
  `ACCESS` varchar(255) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`PERMISSIONID`, `UserID`, `Fname`, `PRISONER_ID`, `Relation`, `date`, `time`, `MOBILE`, `ACCESS`, `comment`) VALUES
(36, 11, 'kaze yvette', 1, 'brother', '2022-07-25', '', '0786329768', 'IN PROGRESS', ''),
(37, 12, 'aaaa', 2, 'child', '2022-07-25', '', '0786329768', 'IN PROGRESS', ''),
(39, 13, 'koko', 1, 'father', '2022-07-21', '', '0786329768', 'REJECTED', 'AAA'),
(40, 10, 'mugisha', 1, 'aa', '2022-07-24', '', '0786879807', 'IN PROGRESS', ''),
(44, 9, 'MUCYO AIME', 1, 'brother', '2022-07-24', '21:00', '0786329768', 'IN PROGRESS', ''),
(45, 14, 'jackymahoro', 2, 'friend', '2022-07-28', '09:01', '0788721575', 'ACCEPTED', ''),
(46, 16, 'bebe', 1, 'cousine', '2022-07-28', '09:51', '0789582389', 'IN PROGRESS', '');

--
-- Triggers `permission`
--
DELIMITER $$
CREATE TRIGGER `grant` AFTER UPDATE ON `permission` FOR EACH ROW BEGIN
							IF EXISTS (SELECT * FROM permission WHERE `UserID`=2 AND `ACCESS`=1 LIMIT 1)
							THEN UPDATE `user1` SET `ACCESS`=1 WHERE `UserID`=2;
							END IF;
							END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prison1`
--

CREATE TABLE `prison1` (
  `PRISONER_ID` int(255) NOT NULL,
  `PNAME` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `RELEASE_DATE` varchar(255) NOT NULL,
  `ADMISSION_DATE` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `CASETYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prison1`
--

INSERT INTO `prison1` (`PRISONER_ID`, `PNAME`, `DOB`, `RELEASE_DATE`, `ADMISSION_DATE`, `gender`, `CASETYPE`) VALUES
(1, 'mugabo', '12/07/1997', '12/05/2021', '12/05/2022', 'male', 'kwiba'),
(2, 'mugabe parker', '2010-06-23', '2023-01-23', '2018-03-23', 'male', 'FAKE DOCUMENT');

-- --------------------------------------------------------

--
-- Table structure for table `super_user`
--

CREATE TABLE `super_user` (
  `SUPERID` int(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `MOBILE_NO` int(11) NOT NULL,
  `SUPER_NAME` varchar(255) NOT NULL,
  `WORK_ID` int(255) NOT NULL,
  `JAIL_ID` int(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_user`
--

INSERT INTO `super_user` (`SUPERID`, `EMAIL`, `MOBILE_NO`, `SUPER_NAME`, `WORK_ID`, `JAIL_ID`, `PASSWORD`) VALUES
(1, 'admin@gmail.com', 786329768, 'admin', 1, 1, 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `UserID` int(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `GENDER` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MOBILE` text NOT NULL,
  `ACCESS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`UserID`, `Fname`, `Email`, `Username`, `GENDER`, `Password`, `MOBILE`, `ACCESS`) VALUES
(9, 'MUCYO AIME', 'mucyo@gmail.com', 'MUCYO1', 'Male', '123', '0786329768', 'IN PROGRESS'),
(10, 'mugisha', 'mugisha@gmail.com', 'mugisha1', 'Male', '123', '0786879807', 'IN PROGRESS'),
(11, 'kaze yvette', 'pele@gmail.com', 'pele', 'Male', 'pele123', '0787534565', 'IN PROGRESS'),
(12, 'kamidina', 'kamidina@123', 'kamidina', 'Female', '123', '0787534565', 'IN PROGRESS'),
(13, 'koko', 'koko@gmail.com', 'koko', 'Male', '123', '0787534565', 'IN PROGRESS'),
(14, 'jackymahoro', 'jacky@gmail.com', 'jacky', 'Female', '123', '0788721575', 'IN PROGRESS'),
(15, 'kami', 'kami@gmail.com', 'kami', 'Female', '123', '0789582389', 'IN PROGRESS'),
(16, 'bebe', 'bebe@gmail.com', 'bebe', 'Female', '123', '0789582389', 'IN PROGRESS');

-- --------------------------------------------------------

--
-- Table structure for table `visiting_day`
--

CREATE TABLE `visiting_day` (
  `id` int(11) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visiting_day`
--

INSERT INTO `visiting_day` (`id`, `date`) VALUES
(7, '2022-07-28'),
(8, '2022-07-30'),
(9, '2022-07-21'),
(10, '2022-07-14'),
(11, '2022-08-04'),
(12, '2022-08-04'),
(13, '2022-07-31'),
(14, '2023-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`PERMISSIONID`),
  ADD KEY `PRISONER_ID` (`PRISONER_ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `prison1`
--
ALTER TABLE `prison1`
  ADD PRIMARY KEY (`PRISONER_ID`);

--
-- Indexes for table `super_user`
--
ALTER TABLE `super_user`
  ADD PRIMARY KEY (`SUPERID`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `visiting_day`
--
ALTER TABLE `visiting_day`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `PERMISSIONID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `prison1`
--
ALTER TABLE `prison1`
  MODIFY `PRISONER_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `visiting_day`
--
ALTER TABLE `visiting_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user1` (`UserID`),
  ADD CONSTRAINT `permission_ibfk_2` FOREIGN KEY (`PRISONER_ID`) REFERENCES `prison1` (`PRISONER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
