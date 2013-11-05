-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: freelance
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.6

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
-- Current Database: `freelance`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `freelance` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `freelance`;

--
-- Table structure for table `guploads`
--

DROP TABLE IF EXISTS `guploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guploads` (
  `iUploadId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `dDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vFileSize` varchar(10) NOT NULL,
  `iUserId` int(11) NOT NULL,
  PRIMARY KEY (`iUploadId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guploads`
--

LOCK TABLES `guploads` WRITE;
/*!40000 ALTER TABLE `guploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `guploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guser_login`
--

DROP TABLE IF EXISTS `guser_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guser_login` (
  `iUserId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `vUserName` varchar(200) NOT NULL,
  `vPassword` varchar(250) NOT NULL,
  `vDisplayName` varchar(100) NOT NULL,
  `vEmailId` varchar(150) NOT NULL,
  `cUserType` char(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`iUserId`),
  KEY `guser_login_user_name` (`vUserName`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guser_login`
--

LOCK TABLES `guser_login` WRITE;
/*!40000 ALTER TABLE `guser_login` DISABLE KEYS */;
INSERT INTO `guser_login` VALUES (0000000001,'sundar','c1d4e10407dd7c54dbc69ff5fe49f99b','Sundar','meenakshi.sun20@gmail.com','n');
/*!40000 ALTER TABLE `guser_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-08-29 22:32:25
