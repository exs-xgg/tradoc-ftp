-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (i386)
--
-- Host: localhost    Database: tradoc
-- ------------------------------------------------------
-- Server version 5.1.73
CREATE DATABASE tradoc;
use tradoc;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;



--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `F_ID` int(11) NOT NULL AUTO_INCREMENT,
  `F_TRACK_NO` varchar(30) NOT NULL,
  `F_NAME_SERVER` varchar(100) NOT NULL,
  `F_NAME_ORIG` varchar(100) NOT NULL,
  `F_UPLOAD_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `F_DESC` varchar(200) DEFAULT NULL,
  `F_UPLOADER` int(11) NOT NULL,
  `F_OFFICE` varchar(10) NOT NULL,
  `F_TAGS` varchar(200) DEFAULT NULL,
  `FILE_X` int(11) DEFAULT '0',
  PRIMARY KEY (`F_ID`),
  KEY `F_UPLOADER` (`F_UPLOADER`),
  CONSTRAINT `file_ibfk_1` FOREIGN KEY (`F_UPLOADER`) REFERENCES `users` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `M_ID` int(11) NOT NULL AUTO_INCREMENT,
  `M_SENDER` int(11) NOT NULL,
  `M_MSG` varchar(200) NOT NULL,
  `M_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `M_RCVR` int(11) NOT NULL,
  PRIMARY KEY (`M_ID`),
  KEY `M_SENDER` (`M_SENDER`),
  KEY `M_RCVR` (`M_RCVR`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`M_SENDER`) REFERENCES `users` (`USER_ID`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`M_RCVR`) REFERENCES `users` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `msg_sent` AFTER INSERT ON `messages` FOR EACH ROW UPDATE SSTATUS SET S_STAT = 1 WHERE S_USER = New.M_RCVR */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `office`
--

DROP TABLE IF EXISTS `office`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `office` (
  `OF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `OF_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`OF_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE_NAME` varchar(20) NOT NULL,
  `ROLE_DESC` varchar(50) NOT NULL,
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sstatus`
--

DROP TABLE IF EXISTS `sstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sstatus` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT,
  `S_USER` int(11) NOT NULL,
  `S_STAT` int(11) DEFAULT '0',
  PRIMARY KEY (`S_ID`),
  KEY `S_USER` (`S_USER`),
  CONSTRAINT `sstatus_ibfk_1` FOREIGN KEY (`S_USER`) REFERENCES `users` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(20) NOT NULL,
  `USER_FNAME` varchar(30) NOT NULL,
  `USER_LNAME` varchar(30) NOT NULL,
  `USER_OFC` int(11) NOT NULL,
  `USER_PW` varchar(32) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `USER_LOCK` int(11) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `ROLE_ID` (`ROLE_ID`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ROLE_ID`) REFERENCES `role` (`ROLE_ID`),
  KEY `USER_OFC` (`USER_OFC`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`USER_OFC`) REFERENCES `office` (`OF_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `init_user` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO SSTATUS (S_USER)
  VALUES (New.USER_ID) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
--
-- Table structure for table `pinned`
--

DROP TABLE IF EXISTS `pinned`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinned` (
  `PIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PIN_USER` int(11) NOT NULL,
  `PIN_FILE` int(11) NOT NULL,
  `PIN_NICKNAME` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PIN_ID`),
  KEY `PIN_TO_FILE` (`PIN_FILE`),
  KEY `PIN_TO_USER` (`PIN_USER`),
  CONSTRAINT `PIN_TO_FILE` FOREIGN KEY (`PIN_FILE`) REFERENCES `file` (`F_ID`),
  CONSTRAINT `PIN_TO_USER` FOREIGN KEY (`PIN_USER`) REFERENCES `users` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `ACT` varchar(100) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `UID` (`UID`),
  CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
-- Dump completed on 2017-10-31  8:24:58