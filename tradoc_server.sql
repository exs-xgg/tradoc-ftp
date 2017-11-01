-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 04:13 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tradoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `ACT` varchar(100) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `F_ID` int(11) NOT NULL,
  `F_TRACK_NO` varchar(30) NOT NULL,
  `F_NAME_ORIG` varchar(36) NOT NULL,
  `F_NAME_SERVER` varchar(32) NOT NULL,
  `F_UPLOAD_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `F_DESC` varchar(200) DEFAULT NULL,
  `F_UPLOADER` int(11) NOT NULL,
  `F_TAGS` varchar(200) DEFAULT NULL,
  `FILE_X` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `file`
--
DELIMITER $$
CREATE TRIGGER `upload_action` AFTER INSERT ON `file` FOR EACH ROW INSERT INTO ACTIVITY (F_ID) VALUES (New.F_ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `M_ID` int(11) NOT NULL,
  `M_SENDER` int(11) NOT NULL,
  `M_MSG` varchar(200) NOT NULL,
  `M_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `M_RCVR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `messages`
--
DELIMITER $$
CREATE TRIGGER `msg_sent` AFTER INSERT ON `messages` FOR EACH ROW UPDATE SSTATUS SET S_STAT = 1 WHERE S_USER = New.M_RCVR
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `OF_ID` int(11) NOT NULL,
  `OF_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`OF_ID`, `OF_NAME`) VALUES
(1, 'G6'),
(2, 'G7'),
(3, 'PSC'),
(4, 'R221');

-- --------------------------------------------------------

--
-- Table structure for table `pinned`
--

CREATE TABLE `pinned` (
  `PIN_ID` int(11) NOT NULL,
  `PIN_USER` int(11) NOT NULL,
  `PIN_FILE` int(11) NOT NULL,
  `PIN_NICKNAME` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(20) NOT NULL,
  `ROLE_DESC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ROLE_ID`, `ROLE_NAME`, `ROLE_DESC`) VALUES
(1, 'ADMIN', 'The one assigned to CREATE the user accounts. The '),
(2, 'STAFF', 'Can only Upload, View and Download regular files f'),
(3, 'SUPERUSER', 'Can upload, view and download regular and confiden');

-- --------------------------------------------------------

--
-- Table structure for table `sstatus`
--

CREATE TABLE `sstatus` (
  `S_ID` int(11) NOT NULL,
  `S_USER` int(11) NOT NULL,
  `S_STAT` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(20) NOT NULL,
  `USER_FNAME` varchar(30) NOT NULL,
  `USER_LNAME` varchar(30) NOT NULL,
  `USER_OFC` int(11) NOT NULL,
  `USER_PW` varchar(32) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `USER_LOCK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAME`, `USER_FNAME`, `USER_LNAME`, `USER_OFC`, `USER_PW`, `ROLE_ID`, `USER_LOCK`) VALUES
(1, 'user01', 'Antonio', 'Luna', 2, '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0),
(2, 'adminAq', 'Xander', 'Ford', 3, '5f4dcc3b5aa765d61d8327deb882cf99', 2, 0),
(3, 'general', 'Rodrigo', 'Duterte', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 3, 0),
(4, 'turtle', 'asd', 'asd', 2, 'a3dcb4d229de6fde0db5686dee47145d', 1, 1);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `init_user` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO SSTATUS (S_USER)
  VALUES (New.USER_ID)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`F_ID`),
  ADD KEY `F_UPLOADER` (`F_UPLOADER`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`M_ID`),
  ADD KEY `M_SENDER` (`M_SENDER`),
  ADD KEY `M_RCVR` (`M_RCVR`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`OF_ID`);

--
-- Indexes for table `pinned`
--
ALTER TABLE `pinned`
  ADD PRIMARY KEY (`PIN_ID`),
  ADD KEY `PIN_TO_FILE` (`PIN_FILE`),
  ADD KEY `PIN_TO_USER` (`PIN_USER`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `sstatus`
--
ALTER TABLE `sstatus`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `S_USER` (`S_USER`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `ROLE_ID` (`ROLE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `OF_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pinned`
--
ALTER TABLE `pinned`
  MODIFY `PIN_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sstatus`
--
ALTER TABLE `sstatus`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`F_UPLOADER`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`M_SENDER`) REFERENCES `users` (`USER_ID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`M_RCVR`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `pinned`
--
ALTER TABLE `pinned`
  ADD CONSTRAINT `PIN_TO_FILE` FOREIGN KEY (`PIN_FILE`) REFERENCES `file` (`F_ID`),
  ADD CONSTRAINT `PIN_TO_USER` FOREIGN KEY (`PIN_USER`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `sstatus`
--
ALTER TABLE `sstatus`
  ADD CONSTRAINT `sstatus_ibfk_1` FOREIGN KEY (`S_USER`) REFERENCES `users` (`USER_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`ROLE_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
