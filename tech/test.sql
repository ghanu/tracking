-- MySQL dump 10.11
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.0.45

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
-- Current Database: `test`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

--
-- Table structure for table `g_column_customization`
--

DROP TABLE IF EXISTS `g_column_customization`;
CREATE TABLE `g_column_customization` (
  `iId` bigint(20) unsigned NOT NULL default '0',
  `iCustomizationId` int(11) NOT NULL,
  `vDisplayName` varchar(1000) NOT NULL,
  `vDataFormat` varchar(1000) NOT NULL,
  `vStyleDetails` varchar(1000) NOT NULL,
  `vMathFunction` varchar(50) NOT NULL,
  `iColumnId` int(11) NOT NULL,
  `bIsVisible` tinyint(1) NOT NULL,
  `bIsGroup` tinyint(1) NOT NULL,
  `bIsSort` tinyint(1) NOT NULL,
  `iDisplayOrder` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_column_customization`
--

LOCK TABLES `g_column_customization` WRITE;
/*!40000 ALTER TABLE `g_column_customization` DISABLE KEYS */;
INSERT INTO `g_column_customization` VALUES (1,1,'invid','','','',1,0,0,0,1),(2,1,'invdate','','','',2,0,0,0,1),(3,1,'client_id','','','',3,0,0,0,1),(4,1,'amount','','','',4,0,0,0,1),(5,1,'tax','','','',5,0,0,0,1),(6,1,'total','','','',6,0,0,0,1),(7,1,'note','','','',7,0,0,0,1);
/*!40000 ALTER TABLE `g_column_customization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g_customization_condition`
--

DROP TABLE IF EXISTS `g_customization_condition`;
CREATE TABLE `g_customization_condition` (
  `iId` bigint(20) unsigned NOT NULL auto_increment,
  `tCondition` text NOT NULL,
  `iCustomizationId` int(11) NOT NULL,
  `iColumnCustomizationId` int(11) NOT NULL,
  UNIQUE KEY `iId` (`iId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_customization_condition`
--

LOCK TABLES `g_customization_condition` WRITE;
/*!40000 ALTER TABLE `g_customization_condition` DISABLE KEYS */;
/*!40000 ALTER TABLE `g_customization_condition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g_master_columns`
--

DROP TABLE IF EXISTS `g_master_columns`;
CREATE TABLE `g_master_columns` (
  `iId` bigint(20) unsigned NOT NULL auto_increment,
  `vDbColumnName` text NOT NULL,
  `vScriptVariableName` varchar(2000) NOT NULL,
  `iReportId` int(11) NOT NULL,
  `vDataType` varchar(20) NOT NULL,
  UNIQUE KEY `iId` (`iId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_master_columns`
--

LOCK TABLES `g_master_columns` WRITE;
/*!40000 ALTER TABLE `g_master_columns` DISABLE KEYS */;
INSERT INTO `g_master_columns` VALUES (1,'invid','invid',1,'int'),(2,'invdate','invdate',1,'date'),(3,'client_id','client_id',1,'int'),(4,'amount','amount',1,'numeric'),(5,'tax','tax',1,'numeric'),(6,'total','total',1,'numeric'),(7,'note','note',1,'text');
/*!40000 ALTER TABLE `g_master_columns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g_master_customization`
--

DROP TABLE IF EXISTS `g_master_customization`;
CREATE TABLE `g_master_customization` (
  `iId` bigint(20) unsigned NOT NULL auto_increment,
  `vName` varchar(2000) NOT NULL,
  `tDescription` text NOT NULL,
  `dAddedDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `iReportId` int(11) NOT NULL,
  `iMemberId` int(11) NOT NULL,
  `vReportFormat` varchar(50) NOT NULL,
  `bIsDefault` tinyint(1) NOT NULL,
  `report_type` varchar(50) NOT NULL,
  UNIQUE KEY `iId` (`iId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_master_customization`
--

LOCK TABLES `g_master_customization` WRITE;
/*!40000 ALTER TABLE `g_master_customization` DISABLE KEYS */;
INSERT INTO `g_master_customization` VALUES (1,'First Customization','Welcome to my tist customization named hello world','2010-08-10 06:28:14',1,1,'',0,'normal');
/*!40000 ALTER TABLE `g_master_customization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g_master_report`
--

DROP TABLE IF EXISTS `g_master_report`;
CREATE TABLE `g_master_report` (
  `iId` bigint(20) unsigned NOT NULL auto_increment,
  `vName` varchar(2000) NOT NULL,
  `tDescription` text NOT NULL,
  `vtableName` varchar(2000) NOT NULL,
  `dAddedDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  UNIQUE KEY `iId` (`iId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_master_report`
--

LOCK TABLES `g_master_report` WRITE;
/*!40000 ALTER TABLE `g_master_report` DISABLE KEYS */;
INSERT INTO `g_master_report` VALUES (1,'Test Report','This is my first time This program see the world and saying \"Hello World\"','invheader','2010-08-10 06:17:30');
/*!40000 ALTER TABLE `g_master_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g_report_customizations`
--

DROP TABLE IF EXISTS `g_report_customizations`;
CREATE TABLE `g_report_customizations` (
  `iId` bigint(20) unsigned NOT NULL auto_increment,
  `iCustomizationId` int(11) NOT NULL,
  `vDisplayName` varchar(1000) NOT NULL,
  `vDataFormat` varchar(1000) NOT NULL,
  `vStyleDetails` varchar(1000) NOT NULL,
  `vMathFunction` varchar(50) NOT NULL,
  `iColumnId` int(11) NOT NULL,
  `bIsVisible` tinyint(1) NOT NULL,
  `bIsGroup` tinyint(1) NOT NULL,
  `bIsSort` tinyint(1) NOT NULL,
  UNIQUE KEY `iId` (`iId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_report_customizations`
--

LOCK TABLES `g_report_customizations` WRITE;
/*!40000 ALTER TABLE `g_report_customizations` DISABLE KEYS */;
/*!40000 ALTER TABLE `g_report_customizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invheader`
--

DROP TABLE IF EXISTS `invheader`;
CREATE TABLE `invheader` (
  `invid` int(11) NOT NULL auto_increment,
  `invdate` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL default '0.00',
  `tax` decimal(10,2) NOT NULL default '0.00',
  `total` decimal(10,2) NOT NULL default '0.00',
  `note` char(100) default NULL,
  PRIMARY KEY  (`invid`)
) ENGINE=MyISAM AUTO_INCREMENT=1938 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invheader`
--

LOCK TABLES `invheader` WRITE;
/*!40000 ALTER TABLE `invheader` DISABLE KEYS */;
INSERT INTO `invheader` VALUES (1293,'2001-01-10',2045,'103.98','45.34','149.32','This is record 1'),(1294,'2001-02-10',2046,'104.98','46.34','151.32','This is record 2'),(1295,'2001-03-10',2047,'105.98','47.34','153.32','This is record 3'),(1296,'2001-04-10',2048,'106.98','48.34','155.32','This is record 4'),(1297,'2001-05-10',2049,'107.98','49.34','157.32','This is record 5'),(1298,'2001-06-10',2050,'108.98','50.34','159.32','This is record 6'),(1299,'2001-07-10',2051,'109.98','51.34','161.32','This is record 7'),(1300,'2001-08-10',2052,'110.98','52.34','163.32','This is record 8'),(1301,'2001-09-10',2053,'111.98','53.34','165.32','This is record 9'),(1302,'2001-10-10',2054,'112.98','54.34','167.32','This is record 10'),(1303,'2001-11-10',2055,'113.98','55.34','169.32','This is record 11'),(1304,'2001-12-10',2056,'114.98','56.34','171.32','This is record 12'),(1324,'2002-01-10',2076,'134.98','76.34','211.32','This is record 32'),(1325,'2002-02-10',2077,'135.98','77.34','213.32','This is record 33'),(1326,'2002-03-10',2078,'136.98','78.34','215.32','This is record 34'),(1327,'2002-04-10',2079,'137.98','79.34','217.32','This is record 35'),(1328,'2002-05-10',2080,'138.98','80.34','219.32','This is record 36'),(1329,'2002-06-10',2081,'139.98','81.34','221.32','This is record 37'),(1330,'2002-07-10',2082,'140.98','82.34','223.32','This is record 38'),(1331,'2002-08-10',2083,'141.98','83.34','225.32','This is record 39'),(1332,'2002-09-10',2084,'142.98','84.34','227.32','This is record 40'),(1333,'2002-10-10',2085,'143.98','85.34','229.32','This is record 41'),(1334,'2002-11-10',2086,'144.98','86.34','231.32','This is record 42'),(1335,'2002-12-10',2087,'145.98','87.34','233.32','This is record 43'),(1352,'2003-01-10',2104,'162.98','104.34','267.32','This is record 60'),(1353,'2003-02-10',2105,'163.98','105.34','269.32','This is record 61'),(1354,'2003-03-10',2106,'164.98','106.34','271.32','This is record 62'),(1355,'2003-04-10',2107,'165.98','107.34','273.32','This is record 63'),(1356,'2003-05-10',2108,'166.98','108.34','275.32','This is record 64'),(1357,'2003-06-10',2109,'167.98','109.34','277.32','This is record 65'),(1358,'2003-07-10',2110,'168.98','110.34','279.32','This is record 66'),(1359,'2003-08-10',2111,'169.98','111.34','281.32','This is record 67'),(1360,'2003-09-10',2112,'170.98','112.34','283.32','This is record 68'),(1361,'2003-10-10',2113,'171.98','113.34','285.32','This is record 69'),(1362,'2003-11-10',2114,'172.98','114.34','287.32','This is record 70'),(1363,'2003-12-10',2115,'173.98','115.34','289.32','This is record 71'),(1383,'2004-01-10',2135,'106.98','135.34','329.32','This is record 91'),(1384,'2004-02-10',2136,'107.98','136.34','331.32','This is record 92'),(1385,'2004-03-10',2137,'108.98','137.34','333.32','This is record 93'),(1386,'2004-04-10',2138,'109.98','138.34','335.32','This is record 94'),(1387,'2004-05-10',2139,'110.98','139.34','337.32','This is record 95'),(1388,'2004-06-10',2140,'111.98','140.34','339.32','This is record 96'),(1389,'2004-07-10',2141,'112.98','141.34','341.32','This is record 97'),(1390,'2004-08-10',2142,'113.98','142.34','343.32','This is record 98'),(1391,'2004-09-10',2143,'114.98','143.34','345.32','This is record 99'),(1392,'2004-10-10',2144,'115.98','144.34','347.32','This is record 100'),(1393,'2004-11-10',2145,'116.98','145.34','349.32','This is record 101'),(1394,'2004-12-10',2146,'117.98','146.34','351.32','This is record 102'),(1413,'2005-01-10',2165,'136.98','165.34','389.32','This is record 121'),(1414,'2005-02-10',2166,'137.98','166.34','391.32','This is record 122'),(1415,'2005-03-10',2167,'138.98','167.34','393.32','This is record 123'),(1416,'2005-04-10',2168,'139.98','168.34','395.32','This is record 124'),(1417,'2005-05-10',2169,'140.98','169.34','397.32','This is record 125'),(1418,'2005-06-10',2170,'141.98','170.34','399.32','This is record 126'),(1419,'2005-07-10',2171,'142.98','171.34','401.32','This is record 127'),(1420,'2005-08-10',2172,'143.98','172.34','403.32','This is record 128'),(1421,'2005-09-10',2173,'144.98','173.34','405.32','This is record 129'),(1422,'2005-10-10',2174,'145.98','174.34','407.32','This is record 130'),(1423,'2005-11-10',2175,'146.98','175.34','409.32','This is record 131'),(1424,'2005-12-10',2176,'147.98','176.34','411.32','This is record 132'),(1444,'2006-01-10',2196,'167.98','196.34','451.32','This is record 152'),(1445,'2006-02-10',2197,'168.98','197.34','453.32','This is record 153'),(1446,'2006-03-10',2198,'169.98','198.34','455.32','This is record 154'),(1447,'2006-04-10',2199,'170.98','199.34','457.32','This is record 155'),(1448,'2006-05-10',2200,'171.98','200.34','459.32','This is record 156'),(1449,'2006-06-10',2201,'172.98','201.34','461.32','This is record 157'),(1450,'2006-07-10',2202,'173.98','202.34','463.32','This is record 158'),(1451,'2006-08-10',2203,'174.98','203.34','465.32','This is record 159'),(1452,'2006-09-10',2204,'175.98','204.34','467.32','This is record 160'),(1453,'2006-10-10',2205,'176.98','205.34','469.32','This is record 161'),(1454,'2006-11-10',2206,'177.98','206.34','471.32','This is record 162'),(1455,'2006-12-10',2207,'178.98','207.34','473.32','This is record 163'),(1474,'2007-01-10',2226,'110.98','226.34','511.32','This is record 182'),(1475,'2007-02-10',2227,'111.98','227.34','513.32','This is record 183'),(1476,'2007-03-10',2228,'112.98','228.34','515.32','This is record 184'),(1477,'2007-04-10',2229,'113.98','229.34','517.32','This is record 185'),(1478,'2007-05-10',2230,'114.98','230.34','519.32','This is record 186'),(1479,'2007-06-10',2231,'115.98','231.34','521.32','This is record 187'),(1480,'2007-07-10',2232,'116.98','232.34','523.32','This is record 188'),(1481,'2007-08-10',2233,'117.98','233.34','525.32','This is record 189'),(1482,'2007-09-10',2234,'118.98','234.34','527.32','This is record 190'),(1483,'2007-10-10',2235,'119.98','235.34','529.32','This is record 191'),(1484,'2007-11-10',2236,'120.98','236.34','531.32','This is record 192'),(1485,'2007-12-10',2237,'121.98','237.34','533.32','This is record 193'),(1505,'2008-01-10',2257,'141.98','257.34','573.32','This is record 213'),(1506,'2008-02-10',2258,'142.98','258.34','575.32','This is record 214'),(1507,'2008-03-10',2259,'143.98','259.34','577.32','This is record 215'),(1508,'2008-04-10',2260,'144.98','260.34','579.32','This is record 216'),(1509,'2008-05-10',2261,'145.98','261.34','581.32','This is record 217'),(1510,'2008-06-10',2262,'146.98','262.34','583.32','This is record 218'),(1511,'2008-07-10',2263,'147.98','263.34','585.32','This is record 219'),(1512,'2008-08-10',2264,'148.98','264.34','587.32','This is record 220'),(1513,'2008-09-10',2265,'149.98','265.34','589.32','This is record 221'),(1514,'2008-10-10',2266,'150.98','266.34','591.32','This is record 222'),(1515,'2008-11-10',2267,'151.98','267.34','593.32','This is record 223'),(1516,'2008-12-10',2268,'152.98','268.34','595.32','This is record 224'),(1536,'2009-01-10',2288,'172.98','288.34','635.32','This is record 244'),(1537,'2009-02-10',2289,'173.98','289.34','637.32','This is record 245'),(1538,'2009-03-10',2290,'174.98','290.34','639.32','This is record 246'),(1539,'2009-04-10',2291,'175.98','291.34','641.32','This is record 247'),(1540,'2009-05-10',2292,'176.98','292.34','643.32','This is record 248'),(1541,'2009-06-10',2293,'177.98','293.34','645.32','This is record 249'),(1542,'2009-07-10',2294,'178.98','294.34','647.32','This is record 250'),(1543,'2009-08-10',2295,'179.98','295.34','649.32','This is record 251'),(1544,'2009-09-10',2296,'180.98','296.34','651.32','This is record 252'),(1545,'2009-10-10',2297,'181.98','297.34','653.32','This is record 253'),(1546,'2009-11-10',2298,'106.98','298.34','655.32','This is record 254'),(1547,'2009-12-10',2299,'107.98','299.34','657.32','This is record 255'),(1566,'2010-01-10',2318,'115.98','318.34','695.32','This is record 274'),(1567,'2010-02-10',2319,'116.98','319.34','697.32','This is record 275'),(1568,'2010-03-10',2320,'117.98','320.34','699.32','This is record 276'),(1569,'2010-04-10',2321,'118.98','321.34','701.32','This is record 277'),(1570,'2010-05-10',2322,'119.98','322.34','703.32','This is record 278'),(1571,'2010-06-10',2323,'120.98','323.34','705.32','This is record 279'),(1572,'2010-07-10',2324,'121.98','324.34','707.32','This is record 280'),(1573,'2010-08-10',2325,'122.98','325.34','709.32','This is record 281'),(1574,'2010-09-10',2326,'123.98','326.34','711.32','This is record 282'),(1575,'2010-10-10',2327,'124.98','327.34','713.32','This is record 283'),(1576,'2010-11-10',2328,'125.98','328.34','715.32','This is record 284'),(1577,'2010-12-10',2329,'126.98','329.34','717.32','This is record 285'),(1597,'2011-01-10',2349,'146.98','349.34','757.32','This is record 305'),(1598,'2011-02-10',2350,'147.98','350.34','759.32','This is record 306'),(1599,'2011-03-10',2351,'148.98','351.34','761.32','This is record 307'),(1600,'2011-04-10',2352,'149.98','352.34','763.32','This is record 308'),(1601,'2011-05-10',2353,'150.98','353.34','765.32','This is record 309'),(1602,'2011-06-10',2354,'151.98','354.34','767.32','This is record 310'),(1603,'2011-07-10',2355,'152.98','355.34','769.32','This is record 311'),(1604,'2011-08-10',2356,'153.98','356.34','771.32','This is record 312'),(1605,'2011-09-10',2357,'154.98','357.34','773.32','This is record 313'),(1606,'2011-10-10',2358,'155.98','358.34','775.32','This is record 314'),(1607,'2011-11-10',2359,'156.98','359.34','777.32','This is record 315'),(1608,'2011-12-10',2360,'157.98','360.34','779.32','This is record 316'),(1627,'2012-01-10',2379,'176.98','379.34','817.32','This is record 335'),(1628,'2012-02-10',2380,'177.98','380.34','819.32','This is record 336'),(1629,'2012-03-10',2381,'178.98','381.34','821.32','This is record 337'),(1630,'2012-04-10',2382,'179.98','382.34','823.32','This is record 338'),(1631,'2012-05-10',2383,'180.98','383.34','825.32','This is record 339'),(1632,'2012-06-10',2384,'181.98','384.34','827.32','This is record 340'),(1633,'2012-07-10',2385,'182.98','385.34','829.32','This is record 341'),(1634,'2012-08-10',2386,'107.98','386.34','831.32','This is record 342'),(1635,'2012-09-10',2387,'108.98','387.34','833.32','This is record 343'),(1636,'2012-10-10',2388,'109.98','388.34','835.32','This is record 344'),(1637,'2012-11-10',2389,'110.98','389.34','837.32','This is record 345'),(1638,'2012-12-10',2390,'111.98','390.34','839.32','This is record 346'),(1658,'2001-01-11',2410,'120.98','410.34','879.32','This is record 366'),(1659,'2001-02-11',2411,'121.98','411.34','881.32','This is record 367'),(1660,'2001-03-11',2412,'122.98','412.34','883.32','This is record 368'),(1661,'2001-04-11',2413,'123.98','413.34','885.32','This is record 369'),(1662,'2001-05-11',2414,'124.98','414.34','887.32','This is record 370'),(1663,'2001-06-11',2415,'125.98','415.34','889.32','This is record 371'),(1664,'2001-07-11',2416,'126.98','416.34','891.32','This is record 372'),(1665,'2001-08-11',2417,'127.98','417.34','893.32','This is record 373'),(1666,'2001-09-11',2418,'128.98','418.34','895.32','This is record 374'),(1667,'2001-10-11',2419,'129.98','419.34','897.32','This is record 375'),(1668,'2001-11-11',2420,'130.98','420.34','899.32','This is record 376'),(1669,'2001-12-11',2421,'131.98','421.34','901.32','This is record 377'),(1689,'2002-01-11',2441,'151.98','441.34','941.32','This is record 397'),(1690,'2002-02-11',2442,'152.98','442.34','943.32','This is record 398'),(1691,'2002-03-11',2443,'153.98','443.34','945.32','This is record 399'),(1692,'2002-04-11',2444,'154.98','444.34','947.32','This is record 400'),(1693,'2002-05-11',2445,'155.98','445.34','949.32','This is record 401'),(1694,'2002-06-11',2446,'156.98','446.34','951.32','This is record 402'),(1695,'2002-07-11',2447,'157.98','447.34','953.32','This is record 403'),(1696,'2002-08-11',2448,'158.98','448.34','955.32','This is record 404'),(1697,'2002-09-11',2449,'159.98','449.34','957.32','This is record 405'),(1698,'2002-10-11',2450,'160.98','450.34','959.32','This is record 406'),(1699,'2002-11-11',2451,'161.98','451.34','961.32','This is record 407'),(1700,'2002-12-11',2452,'162.98','452.34','963.32','This is record 408'),(1717,'2003-01-11',2469,'179.98','469.34','997.32','This is record 425'),(1718,'2003-02-11',2470,'180.98','470.34','999.32','This is record 426'),(1719,'2003-03-11',2471,'181.98','471.34','1001.32','This is record 427'),(1720,'2003-04-11',2472,'182.98','472.34','1003.32','This is record 428'),(1721,'2003-05-11',2473,'183.98','473.34','1005.32','This is record 429'),(1722,'2003-06-11',2474,'108.98','474.34','1007.32','This is record 430'),(1723,'2003-07-11',2475,'109.98','475.34','1009.32','This is record 431'),(1724,'2003-08-11',2476,'110.98','476.34','1011.32','This is record 432'),(1725,'2003-09-11',2477,'111.98','477.34','1013.32','This is record 433'),(1726,'2003-10-11',2478,'112.98','478.34','1015.32','This is record 434'),(1727,'2003-11-11',2479,'113.98','479.34','1017.32','This is record 435'),(1728,'2003-12-11',2480,'114.98','480.34','1019.32','This is record 436'),(1748,'2004-01-11',2500,'123.98','500.34','1059.32','This is record 456'),(1749,'2004-02-11',2501,'124.98','501.34','1061.32','This is record 457'),(1750,'2004-03-11',2502,'125.98','502.34','1063.32','This is record 458'),(1751,'2004-04-11',2503,'126.98','503.34','1065.32','This is record 459'),(1752,'2004-05-11',2504,'127.98','504.34','1067.32','This is record 460'),(1753,'2004-06-11',2505,'128.98','505.34','1069.32','This is record 461'),(1754,'2004-07-11',2506,'129.98','506.34','1071.32','This is record 462'),(1755,'2004-08-11',2507,'130.98','507.34','1073.32','This is record 463'),(1756,'2004-09-11',2508,'131.98','508.34','1075.32','This is record 464'),(1757,'2004-10-11',2509,'132.98','509.34','1077.32','This is record 465'),(1758,'2004-11-11',2510,'133.98','510.34','1079.32','This is record 466'),(1759,'2004-12-11',2511,'134.98','511.34','1081.32','This is record 467'),(1778,'2005-01-11',2530,'153.98','530.34','1119.32','This is record 486'),(1779,'2005-02-11',2531,'154.98','531.34','1121.32','This is record 487'),(1780,'2005-03-11',2532,'155.98','532.34','1123.32','This is record 488'),(1781,'2005-04-11',2533,'156.98','533.34','1125.32','This is record 489'),(1782,'2005-05-11',2534,'157.98','534.34','1127.32','This is record 490'),(1783,'2005-06-11',2535,'158.98','535.34','1129.32','This is record 491'),(1784,'2005-07-11',2536,'159.98','536.34','1131.32','This is record 492'),(1785,'2005-08-11',2537,'160.98','537.34','1133.32','This is record 493'),(1786,'2005-09-11',2538,'161.98','538.34','1135.32','This is record 494'),(1787,'2005-10-11',2539,'162.98','539.34','1137.32','This is record 495'),(1788,'2005-11-11',2540,'163.98','540.34','1139.32','This is record 496'),(1789,'2005-12-11',2541,'164.98','541.34','1141.32','This is record 497'),(1809,'2006-01-11',2561,'184.98','561.34','1181.32','This is record 517'),(1810,'2006-02-11',2562,'109.98','562.34','1183.32','This is record 518'),(1811,'2006-03-11',2563,'110.98','563.34','1185.32','This is record 519'),(1812,'2006-04-11',2564,'111.98','564.34','1187.32','This is record 520'),(1813,'2006-05-11',2565,'112.98','565.34','1189.32','This is record 521'),(1814,'2006-06-11',2566,'113.98','566.34','1191.32','This is record 522'),(1815,'2006-07-11',2567,'114.98','567.34','1193.32','This is record 523'),(1816,'2006-08-11',2568,'115.98','568.34','1195.32','This is record 524'),(1817,'2006-09-11',2569,'116.98','569.34','1197.32','This is record 525'),(1818,'2006-10-11',2570,'117.98','570.34','1199.32','This is record 526'),(1819,'2006-11-11',2571,'118.98','571.34','1201.32','This is record 527'),(1820,'2006-12-11',2572,'119.98','572.34','1203.32','This is record 528'),(1839,'2007-01-11',2591,'127.98','591.34','1241.32','This is record 547'),(1840,'2007-02-11',2592,'128.98','592.34','1243.32','This is record 548'),(1841,'2007-03-11',2593,'129.98','593.34','1245.32','This is record 549'),(1842,'2007-04-11',2594,'130.98','594.34','1247.32','This is record 550'),(1843,'2007-05-11',2595,'131.98','595.34','1249.32','This is record 551'),(1844,'2007-06-11',2596,'132.98','596.34','1251.32','This is record 552'),(1845,'2007-07-11',2597,'133.98','597.34','1253.32','This is record 553'),(1846,'2007-08-11',2598,'134.98','598.34','1255.32','This is record 554'),(1847,'2007-09-11',2599,'135.98','599.34','1257.32','This is record 555'),(1848,'2007-10-11',2600,'136.98','600.34','1259.32','This is record 556'),(1849,'2007-11-11',2601,'137.98','601.34','1261.32','This is record 557'),(1850,'2007-12-11',2602,'138.98','602.34','1263.32','This is record 558'),(1870,'2008-01-11',2622,'158.98','622.34','1303.32','This is record 578'),(1871,'2008-02-11',2623,'159.98','623.34','1305.32','This is record 579'),(1872,'2008-03-11',2624,'160.98','624.34','1307.32','This is record 580'),(1873,'2008-04-11',2625,'161.98','625.34','1309.32','This is record 581'),(1874,'2008-05-11',2626,'162.98','626.34','1311.32','This is record 582'),(1875,'2008-06-11',2627,'163.98','627.34','1313.32','This is record 583'),(1876,'2008-07-11',2628,'164.98','628.34','1315.32','This is record 584'),(1877,'2008-08-11',2629,'165.98','629.34','1317.32','This is record 585'),(1878,'2008-09-11',2630,'166.98','630.34','1319.32','This is record 586'),(1879,'2008-10-11',2631,'167.98','631.34','1321.32','This is record 587'),(1880,'2008-11-11',2632,'168.98','632.34','1323.32','This is record 588'),(1881,'2008-12-11',2633,'169.98','633.34','1325.32','This is record 589'),(1901,'2009-01-11',2653,'113.98','653.34','1365.32','This is record 609'),(1902,'2009-02-11',2654,'114.98','654.34','1367.32','This is record 610'),(1903,'2009-03-11',2655,'115.98','655.34','1369.32','This is record 611'),(1904,'2009-04-11',2656,'116.98','656.34','1371.32','This is record 612'),(1905,'2009-05-11',2657,'117.98','657.34','1373.32','This is record 613'),(1906,'2009-06-11',2658,'118.98','658.34','1375.32','This is record 614'),(1907,'2009-07-11',2659,'119.98','659.34','1377.32','This is record 615'),(1908,'2009-08-11',2660,'120.98','660.34','1379.32','This is record 616'),(1909,'2009-09-11',2661,'110.98','661.34','1381.32','This is record 617'),(1910,'2009-10-11',2662,'111.98','662.34','1383.32','This is record 618'),(1911,'2009-11-11',2663,'112.98','663.34','1385.32','This is record 619'),(1912,'2009-12-11',2664,'113.98','664.34','1387.32','This is record 620'),(1931,'2010-01-11',2683,'132.98','683.34','1425.32','This is record 639'),(1932,'2010-02-11',2684,'133.98','684.34','1427.32','This is record 640'),(1933,'2010-03-11',2685,'134.98','685.34','1429.32','This is record 641'),(1934,'2010-04-11',2686,'135.98','686.34','1431.32','This is record 642'),(1935,'2010-05-11',2687,'136.98','687.34','1433.32','This is record 643'),(1936,'2010-06-11',2688,'137.98','688.34','1435.32','This is record 644');
/*!40000 ALTER TABLE `invheader` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-08-24  0:51:16
