-- MySQL dump 10.15  Distrib 10.0.32-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: manish_new
-- ------------------------------------------------------
-- Server version	10.0.32-MariaDB

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
-- Table structure for table `billing_master`
--

DROP TABLE IF EXISTS `billing_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing_master` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_code` varchar(100) NOT NULL,
  `billing_description` varchar(150) NOT NULL,
  `billing_uom` varchar(25) DEFAULT NULL,
  `billing_price_per_uom` varchar(50) DEFAULT NULL,
  `gst_id` int(11) DEFAULT NULL,
  `billing_update_stock` varchar(5) DEFAULT NULL,
  `billing_type` varchar(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`billing_id`),
  KEY `gst_id` (`gst_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_master`
--

LOCK TABLES `billing_master` WRITE;
/*!40000 ALTER TABLE `billing_master` DISABLE KEYS */;
INSERT INTO `billing_master` VALUES (6,'Fd1','Fund management','',NULL,20,'NO','Service',1),(4,'Sus5','Samsung S8','Set','1000',19,'YES','Product',1),(5,'Sum8 ','Samsung Note 8 ','Set','1400',19,'YES','Product',1),(7,'LG FSTV','LG FLAT SCREEN TV 40\"','Set','1000',19,'YES','Product',1);
/*!40000 ALTER TABLE `billing_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_profile`
--

DROP TABLE IF EXISTS `company_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `gst_reg_no` varchar(50) NOT NULL,
  `uen_no` varchar(50) NOT NULL,
  `company_address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `company_logo` varchar(50) NOT NULL,
  `default_currency` varchar(10) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_profile`
--

LOCK TABLES `company_profile` WRITE;
/*!40000 ALTER TABLE `company_profile` DISABLE KEYS */;
INSERT INTO `company_profile` VALUES (1,'TOPFORM BUSINESS SYSTEMS PTE LTD','GST20171003','UEN78902345','BLK 71, UBI ROAD 1 , #08-35 , SINGAPORE 408732','+65 7777888999','(+65)67024812','logo.png','SGD');
/*!40000 ALTER TABLE `company_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_master`
--

DROP TABLE IF EXISTS `country_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_master` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(15) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_master`
--

LOCK TABLES `country_master` WRITE;
/*!40000 ALTER TABLE `country_master` DISABLE KEYS */;
INSERT INTO `country_master` VALUES (1,'101','BELGIUM'),(2,'102','DENMARK'),(3,'103','FRANCE'),(4,'104','GERMANY'),(5,'105','GREECE'),(6,'106','IRELAND'),(7,'301','SINGAPORE'),(8,'107','ITALY'),(9,'108','LUXEMBOURG'),(10,'109','NETHERLAND'),(11,'110','UNITED KIN'),(12,'111','PORTUGAL'),(13,'112','SPAIN'),(14,'131','AUSTRIA'),(15,'132','FINLAND'),(16,'133','ICELAND'),(17,'134','NORWAY'),(18,'135','SVALBARD JAN MAYEN'),(19,'136','SWEDEN'),(20,'137','SWITZERLAND'),(21,'138','LIECHSTENSTEIN'),(22,'139','BOUVET ISLAND'),(23,'141','FAEROE ISLANDS'),(24,'142','GREENLAND'),(25,'143','MONACO'),(26,'144','SAN MARINO'),(27,'145','VATICAN CITY STATE'),(28,'152','TURKEY'),(29,'153','ANDORRA'),(30,'154','GIBRALTAR'),(31,'155','MALTA'),(32,'201','ALBANIA'),(33,'202','BULGARIA'),(34,'203','CZECHOSLOVAKIA'),(35,'205','HUNGARY'),(36,'206','POLAND'),(37,'207','ROMANIA'),(38,'209','YUGOSLAVIA'),(39,'211','BELARUS'),(40,'212','UKRAINE'),(41,'213','ESTONIA'),(42,'214','LATVIA'),(43,'215','LITHUANIA'),(44,'216','GEORGIA'),(45,'217','ARMENIA'),(46,'218','AZERBAIJAN'),(47,'219','KYRGYZSTAN'),(48,'221','KAZAKHSTAN'),(49,'222','MOLDOVA'),(50,'223','RUSSIA'),(51,'224','TAJIKISTAN'),(52,'225','TURKMENISTAN'),(53,'226','UZBEKISTAN'),(54,'232','CROATIA'),(55,'233','SLOVENIA'),(56,'234','CZECH REPUBLIC'),(57,'235','SLOVAK REPUBLIC'),(58,'302','BRUNEI'),(59,'303','INDONESIA'),(60,'304','MALAYSIA'),(61,'305','PHILIPPINES'),(62,'306','THAILAND'),(63,'307','EAST TIMOR'),(64,'311','MYANMAR'),(65,'312','CAMBODIA'),(66,'313','LAOS PEO DEM REP'),(67,'314','VIETNAM SOC REP OF'),(68,'319','O C IN S E ASIA'),(69,'331','JAPAN'),(70,'332','HONG KONG'),(71,'333','REP OF KOREA'),(72,'334','TAIWAN'),(73,'335','MACAU'),(74,'336','CHINA'),(75,'337','KOREA NORTH DEM PEO'),(76,'338','MONGOLIAN PEOPLE REP'),(77,'351','AFGHANISTAN'),(78,'352','BANGLADESH'),(79,'353','BHUTAN'),(80,'354','INDIA'),(81,'355','MALDIVES'),(82,'356','NEPAL'),(83,'357','PAKISTAN'),(84,'358','SRI LANKA'),(85,'371','BAHRAIN'),(86,'372','CYPRUS'),(87,'373','ISLAMIC REP OF IRAN'),(88,'374','IRAQ'),(89,'375','ISRAEL'),(90,'376','JORDAN'),(91,'377','KUWAIT'),(92,'378','LEBANON'),(93,'379','OMAN'),(94,'380','QATAR'),(95,'381','SAUDI ARABIA'),(96,'382','SYRIAN ARAB REP'),(97,'383','UNITED ARAB EMIRATES'),(98,'384','YEMEN'),(99,'385','DEMOCRATIC YEMEN'),(100,'386','PALESTINE'),(101,'401','ALGERIA'),(102,'402','EGYPT'),(103,'403','LIBYA A JAMAHIRIYA'),(104,'404','MOROCCO'),(105,'405','SUDAN'),(106,'406','TUNISIA'),(107,'407','DJIBOUTI'),(108,'408','ETHIOPIA'),(109,'409','DEM REP OF SOMALI'),(110,'410','ERITREA'),(111,'421','GHANA'),(112,'422','COTE DIVOIRE'),(113,'423','KENYA'),(114,'424','LIBERIA'),(115,'425','MADAGASCAR'),(116,'426','MAURITIUS'),(117,'427','MOZAMBIQUE'),(118,'428','NIGERIA'),(119,'429','REUNION ISLAND'),(120,'430','TANZANIA'),(121,'431','UGANDA'),(122,'432','ZAMBIA'),(123,'451','ANGOLA'),(124,'452','BENIN'),(125,'453','BOTSWANA'),(126,'454','BURKINA FASO'),(127,'455','BURUNDI'),(128,'456','CAMEROON UNITED REP'),(129,'457','CAPE VERDE'),(130,'458','CENTRAL AFRICAN REP'),(131,'459','CHAD'),(132,'460','COMOROS ISLAND'),(133,'461','CONGO'),(134,'462','EQUATORIAL GUINEA'),(135,'463','GABON'),(136,'464','GAMBIA'),(137,'465','GUINEA'),(138,'466','GUINES BISSAU'),(139,'467','LESOTHO'),(140,'468','MALAWI'),(141,'469','MALI'),(142,'470','MAURITANIA'),(143,'471','NAMIBIA'),(144,'472','NIGER'),(145,'473','RWANDA'),(146,'474','SAO TOME PRINCIPE'),(147,'475','SENEGAL'),(148,'476','SEYCHELLES'),(149,'477','SIERRA LEONE'),(150,'478','SOUTH AFRICA'),(151,'479','WESTERN SAHARA'),(152,'480','SWAZILAND'),(153,'481','TOGO'),(154,'482','REP OF ZAIRE'),(155,'483','ZIMBABWE'),(156,'484','ST HELENA'),(157,'499','O C IN OTHER AFRICA'),(158,'501','CANADA'),(159,'502','PUERTO RICO'),(160,'503','UNITED STATES'),(161,'504','U S MINOR ISLANDS'),(162,'505','ST PIERRE MIQUELON'),(163,'509','OC NORTH AMERICA'),(164,'601','ARGENTINA'),(165,'602','BRAZIL'),(166,'603','CHILE'),(167,'605','ECUADOR'),(168,'606','MEXICO'),(169,'607','PARAGUAY'),(170,'608','PERU'),(171,'609','URUGUAY'),(172,'610','VENEZUELA'),(173,'621','CUBA'),(174,'622','DOMINICAN REPUBLIC'),(175,'623','NETHERLANDS ANTILLES'),(176,'624','PANAMA'),(177,'625','ARUBA'),(178,'641','ANTIGUA AND BARBUDA'),(179,'642','BAHAMAS ISLAND'),(180,'643','BARBADOS'),(181,'644','BELIZE'),(182,'645','BERMUDA'),(183,'646','BOLIVIA'),(184,'647','CAYMAN ISLANDS'),(185,'648','COSTA RICA'),(186,'649','DOMINICA'),(187,'650','EL SALVADOR'),(188,'651','FALKLAND IS'),(189,'652','FRENCH GUIANA'),(190,'653','GRENADA'),(191,'654','GUADELOUPE'),(192,'655','GUATEMALA'),(193,'656','GUYANA'),(194,'657','HAITI'),(195,'658','HONDURAS'),(196,'659','JAMAICA'),(197,'660','NICARAGUA'),(198,'661','MARTINIQUE'),(199,'662','MONTSERRAT'),(200,'663','SAINT KITTS NEVIS'),(201,'664','SAINT LUCIA'),(202,'665','SAINT VINCENT'),(203,'666','SURINAM'),(204,'667','TRINIDAD AND TOBAGO'),(205,'668','TURKS AND CAICOS IS'),(206,'669','VIRGIN ISLANDS US'),(207,'670','ANGUILLA'),(208,'671','BRITISH VIRGIN ISLND'),(209,'672','ISLE OF MAN'),(210,'699','OC CTRL STH AMERICA'),(211,'701','AUSTRALIA'),(212,'702','FIJI'),(213,'703','NAURU'),(214,'704','NEW CALEDONIA'),(215,'706','PAPUA NEW GUINEA'),(216,'707','SAMOA'),(217,'708','BRITISH INDIAN OCEAN'),(218,'709','CHRISTMAS ISLANDS'),(219,'710','COCOS KEELING ISLAND'),(220,'711','FRENCH SOUTHERN TERR'),(221,'712','HEARD MCDONALD ISLND'),(222,'713','NORFOLK ISLAND'),(223,'721','AMERICAN SAMOA'),(224,'722','COOK ISLAND'),(225,'723','FRENCH POLYNESIA'),(226,'724','GUAM'),(227,'725','KIRIBATI'),(228,'726','NIUE'),(229,'727','PITCAIRN'),(230,'728','SOLOMON ISLANDS'),(231,'729','TOKELAU'),(232,'730','TONGA'),(233,'731','TUVALU'),(234,'732','NEW HERBRIDES'),(235,'733','WALLIS AND FUTUNA'),(236,'734','NORTHERN MARIANA ISLANDS'),(237,'735','MARSHALL ISLANDS'),(238,'736','MICRONESIA'),(239,'737','PALAU'),(240,'799','OC OCEANIA'),(241,'999','OTHERS');
/*!40000 ALTER TABLE `country_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`iso`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES ('AFN','Afghanistan Afghani'),('ALL','Albanian Lek'),('DZD','Algerian Dinar'),('ADP','Andorran Peseta'),('AOK','Angolan Kwanza'),('ARS','Argentine Peso'),('AMD','Armenian Dram'),('AWG','Aruban Florin'),('AUD','Australian Dollar'),('BSD','Bahamian Dollar'),('BHD','Bahraini Dinar'),('BDT','Bangladeshi Taka'),('BBD','Barbados Dollar'),('BZD','Belize Dollar'),('BMD','Bermudian Dollar'),('BTN','Bhutan Ngultrum'),('BOB','Bolivian Boliviano'),('BWP','Botswanian Pula'),('BRL','Brazilian Real'),('GBP','British Pound'),('BND','Brunei Dollar'),('BGN','Bulgarian Lev'),('BUK','Burma Kyat'),('BIF','Burundi Franc'),('CAD','Canadian Dollar'),('CVE','Cape Verde Escudo'),('KYD','Cayman Islands Dollar'),('CLP','Chilean Peso'),('CLF','Chilean Unidades de Fomento'),('COP','Colombian Peso'),('XOF','Communauté Financière Africaine BCEAO - Francs'),('XAF','Communauté Financière Africaine BEAC, Francs'),('KMF','Comoros Franc'),('XPF','Comptoirs Français du Pacifique Francs'),('CRC','Costa Rican Colon'),('CUP','Cuban Peso'),('CYP','Cyprus Pound'),('CZK','Czech Republic Koruna'),('DKK','Danish Krone'),('YDD','Democratic Yemeni Dinar'),('DOP','Dominican Peso'),('XCD','East Caribbean Dollar'),('TPE','East Timor Escudo'),('ECS','Ecuador Sucre'),('EGP','Egyptian Pound'),('SVC','El Salvador Colon'),('EEK','Estonian Kroon (EEK)'),('ETB','Ethiopian Birr'),('EUR','Euro'),('FKP','Falkland Islands Pound'),('FJD','Fiji Dollar'),('GMD','Gambian Dalasi'),('GHC','Ghanaian Cedi'),('GIP','Gibraltar Pound'),('XAU','Gold, Ounces'),('GTQ','Guatemalan Quetzal'),('GNF','Guinea Franc'),('GWP','Guinea-Bissau Peso'),('GYD','Guyanan Dollar'),('HTG','Haitian Gourde'),('HNL','Honduran Lempira'),('HKD','Hong Kong Dollar'),('HUF','Hungarian Forint'),('INR','Indian Rupee'),('IDR','Indonesian Rupiah'),('XDR','International Monetary Fund (IMF) Special Drawing Rights'),('IRR','Iranian Rial'),('IQD','Iraqi Dinar'),('IEP','Irish Punt'),('ILS','Israeli Shekel'),('JMD','Jamaican Dollar'),('JPY','Japanese Yen'),('JOD','Jordanian Dinar'),('KHR','Kampuchean (Cambodian) Riel'),('KES','Kenyan Schilling'),('KWD','Kuwaiti Dinar'),('LAK','Lao Kip'),('LBP','Lebanese Pound'),('LSL','Lesotho Loti'),('LRD','Liberian Dollar'),('LYD','Libyan Dinar'),('MOP','Macau Pataca'),('MGF','Malagasy Franc'),('MWK','Malawi Kwacha'),('MYR','Malaysian Ringgit'),('MVR','Maldive Rufiyaa'),('MTL','Maltese Lira'),('MRO','Mauritanian Ouguiya'),('MUR','Mauritius Rupee'),('MXP','Mexican Peso'),('MNT','Mongolian Tugrik'),('MAD','Moroccan Dirham'),('MZM','Mozambique Metical'),('NAD','Namibian Dollar'),('NPR','Nepalese Rupee'),('ANG','Netherlands Antillian Guilder'),('YUD','New Yugoslavia Dinar'),('NZD','New Zealand Dollar'),('NIO','Nicaraguan Cordoba'),('NGN','Nigerian Naira'),('KPW','North Korean Won'),('NOK','Norwegian Kroner'),('OMR','Omani Rial'),('PKR','Pakistan Rupee'),('XPD','Palladium Ounces'),('PAB','Panamanian Balboa'),('PGK','Papua New Guinea Kina'),('PYG','Paraguay Guarani'),('PEN','Peruvian Nuevo Sol'),('PHP','Philippine Peso'),('XPT','Platinum, Ounces'),('PLN','Polish Zloty'),('QAR','Qatari Rial'),('RON','Romanian Leu'),('RUB','Russian Ruble'),('RWF','Rwanda Franc'),('WST','Samoan Tala'),('STD','Sao Tome and Principe Dobra'),('SAR','Saudi Arabian Riyal'),('SCR','Seychelles Rupee'),('SLL','Sierra Leone Leone'),('XAG','Silver, Ounces'),('SGD','Singapore Dollar'),('SKK','Slovak Koruna'),('SBD','Solomon Islands Dollar'),('SOS','Somali Schilling'),('ZAR','South African Rand'),('KRW','South Korean Won'),('LKR','Sri Lanka Rupee'),('SHP','St. Helena Pound'),('SDP','Sudanese Pound'),('SRG','Suriname Guilder'),('SZL','Swaziland Lilangeni'),('SEK','Swedish Krona'),('CHF','Swiss Franc'),('SYP','Syrian Potmd'),('TWD','Taiwan Dollar'),('TZS','Tanzanian Schilling'),('THB','Thai Baht'),('TOP','Tongan Paanga'),('TTD','Trinidad and Tobago Dollar'),('TND','Tunisian Dinar'),('TRY','Turkish Lira'),('UGX','Uganda Shilling'),('AED','United Arab Emirates Dirham'),('UYU','Uruguayan Peso'),('USD','US Dollar'),('VUV','Vanuatu Vatu'),('VEF','Venezualan Bolivar'),('VND','Vietnamese Dong'),('YER','Yemeni Rial'),('CNY','Yuan (Chinese) Renminbi'),('ZRZ','Zaire Zaire'),('ZMK','Zambian Kwacha'),('ZWD','Zimbabwe Dollar');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency_master`
--

DROP TABLE IF EXISTS `currency_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency_master` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) NOT NULL,
  `currency_rate` double NOT NULL,
  `currency_description` text NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency_master`
--

LOCK TABLES `currency_master` WRITE;
/*!40000 ALTER TABLE `currency_master` DISABLE KEYS */;
INSERT INTO `currency_master` VALUES (1,'INR',47.14,' Indian Rupee'),(2,'SGD',1,'Singapore Doller'),(3,'AUD',0.929,' Australian Dollar'),(4,'HKD',5.73,' Hong Kong Dollar'),(6,'USD',0.735,'US Dollar ');
/*!40000 ALTER TABLE `currency_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_master`
--

DROP TABLE IF EXISTS `customer_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_master` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(15) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_bldg_number` varchar(20) DEFAULT NULL,
  `customer_street_name` varchar(50) DEFAULT NULL,
  `customer_postal_code` int(11) DEFAULT NULL,
  `customer_phone` varchar(15) DEFAULT NULL,
  `customer_fax` varchar(15) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_contact_person` varchar(50) DEFAULT NULL,
  `customer_credit_limit` decimal(10,2) DEFAULT NULL,
  `customer_credit_term_days` int(11) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `customer_uen_no` varchar(15) DEFAULT NULL,
  `customer_gst_number` varchar(15) DEFAULT NULL,
  `customer_rating` decimal(2,1) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `country_id` (`country_id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_master`
--

LOCK TABLES `customer_master` WRITE;
/*!40000 ALTER TABLE `customer_master` DISABLE KEYS */;
INSERT INTO `customer_master` VALUES (2,'U123','Unicorn Trading','','',0,'','','','',0.00,0,2,'','',0.0,7,NULL),(3,'U123 USD','Unicorn Trading  US Account','','',0,'','','','',0.00,0,6,'','',0.0,160,NULL),(4,'Alfa RUPPEES','Alfa Trading','101','demo, 21',452001,'1234567890','12345','demo@demo.com','Morgan',50000.00,30,1,'123','GST20157777/4',0.0,80,NULL),(7,'Man005','MAnish','uio9090','uiiui',8989,'8989898989','898989889','test@test.com','manish',1000.00,2,1,'123ddd','122ddd',4.0,80,NULL),(8,'qwerty123','qwerty','1234','Abc',123456,'1234567898','12121212','abc@text.com','qwerty',12.00,12,1,'qwew','2',5.0,80,NULL),(9,'Manish007','Harsh Gupta','qwert9090','qwert9090',560029,'9686798170','279790','manishg440@gmail.com','Manish',100.00,2,1,'MAN0079','qwertGST9090',3.0,80,NULL);
/*!40000 ALTER TABLE `customer_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `permissions` text NOT NULL COMMENT '21 permissions to group',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN "ID" OTHERWISE SYSTEM WILL NOT WORK ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'TOPFORM MANAGMENT','Admin of Administrator',''),(3,'admin','Administrator Group','{\"quotation_setting\":1,\"company_profile\":1,\"customer_master\":1,\"billing_master\":1,\"salesman_master\":1,\"forex_master\":1,\"gst_master\":1,\"country_master\":1,\"quotation\":1,\"test\\r\\n\":0}'),(4,'SalesGroup','SalesGroup','{\"quotation_setting\":0,\"company_profile\":0,\"customer_master\":1,\"billing_master\":0,\"salesman_master\":1,\"forex_master\":1,\"gst_master\":1,\"country_master\":1,\"quotation\":1,\"test\\r\\n\":0}');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gst_master`
--

DROP TABLE IF EXISTS `gst_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gst_master` (
  `gst_id` int(11) NOT NULL AUTO_INCREMENT,
  `gst_code` varchar(50) NOT NULL,
  `gst_rate` double NOT NULL,
  `gst_description` text NOT NULL,
  `gst_type` varchar(15) NOT NULL,
  PRIMARY KEY (`gst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gst_master`
--

LOCK TABLES `gst_master` WRITE;
/*!40000 ALTER TABLE `gst_master` DISABLE KEYS */;
INSERT INTO `gst_master` VALUES (1,'tx',7,'Purchases with GST incurred at 7% and directly attributable\r\nto taxable supplies','purchase'),(3,'ZP',0,'Purchases from GST registered suppliers that are subject to GST at 0%','purchase'),(8,'IM',7,'7% GST paid to Singapore Customs on the import of goods\r\ninto Singapore','purchase'),(9,'ME',0,'Imports under a special scheme (eg. Major Exporter Scheme,\r\n3rd Party Logistics Scheme) where the GST payable is\r\nsuspended','purchase'),(10,'IGDS',7,'Imports under the import GST deferment scheme where the GST\r\nis suspended until the filing date of the GST return','purchase'),(11,'BL',7,'Purchases where 7% GST is incurred but is specifically\r\nnot claimable (eg. medical expenses for staff)','purchase'),(12,'NR',0,'Purchases from non-GST registered suppliers','purchase'),(13,'EP',0,'Purchases specifically exempted from GST\r\neg. purchase and lease of residential properties, and\r\nthe provision of certain financial services','purchase'),(14,'OP',0,'Supplies outside of the scope of GST Act\r\neg. purchase of services from suppliers established\r\noverseas or purchase of goods that are delivered from a\r\nplace outside Singapore to another place outside Singapore','purchase'),(15,'TX-ESS',7,'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nregulation 33 exempt','purchase'),(16,'TX-ESS',7,'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nregulation 33 exempt','purchase'),(17,'TX-N33',7,'Purchases from GST registered suppliers that are subject to\r\nto GST at 7%and directly attributable to the making of\r\nnon-regulation 33 exempt','purchase'),(18,'TX-RE',7,'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nboth taxable and exempt supplies','purchase'),(19,'SR',7,'Standard-rated supplies with GST charged\r\nLocal supply of goods and services','supply'),(20,'ZR',0,'Zero-rated supplies\r\nSupplies involving goods for export/provision of international\r\nservices','supply'),(21,'ES33',0,'Specific categories of exempt supplies listed under regulation\r\n33 of the GST (General) Regulations','supply'),(22,'ESN33',0,'Exempt supplies other than those listed under regulation 33\r\nof the GST (General) Regulations','supply'),(23,'DS',7,'Deemed supplies (eg. transfer or disposal of business assets\r\nwithout consideration)\r\nSupplies required to be reported pursuant to the GST legislation','supply'),(24,'OS',0,'Out-of-scope supplies\r\nSupplies outside the scope of the GST Act','supply');
/*!40000 ALTER TABLE `gst_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_master`
--

DROP TABLE IF EXISTS `invoice_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_master` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_ref_no` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `invoice_header_text` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `lump_sum_discount` decimal(8,2) NOT NULL,
  `lump_sum_discount_price` decimal(8,2) NOT NULL,
  `gst` decimal(8,2) NOT NULL,
  `final_total` decimal(8,2) NOT NULL,
  `currency_amount` decimal(8,2) NOT NULL,
  `final_total_forex` decimal(8,2) NOT NULL,
  `terms_of_payments` varchar(50) DEFAULT NULL,
  `training_venue` varchar(50) DEFAULT NULL,
  `modification` varchar(50) DEFAULT NULL,
  `cancellation` varchar(50) DEFAULT NULL,
  `invoice_footer_text` text NOT NULL,
  `invoice_status` varchar(15) NOT NULL DEFAULT 'C',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `reject_msg` varchar(255) DEFAULT NULL,
  `receipt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_master`
--

LOCK TABLES `invoice_master` WRITE;
/*!40000 ALTER TABLE `invoice_master` DISABLE KEYS */;
INSERT INTO `invoice_master` VALUES (1,'INV\\invoice\\7001',5,1,'invoice header',1,117180.00,10.00,105462.00,7.00,106282.26,47.14,999999.99,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','CONFIRM','2017-08-18','2017-08-18',NULL,0),(3,'INV\\invoice\\7003',5,1,'invoice header',1,8100.00,0.00,8100.00,7.00,8667.00,47.14,408562.38,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','REJECTED','2017-08-18','2017-08-18',NULL,0),(5,'INV\\invoice\\7005',5,2,'invoice header',1,900.00,10.00,810.00,7.00,860.40,0.93,799.31,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-18','2017-08-19',NULL,0),(6,'INV\\invoice\\7006',5,2,'invoice header',1,6300.00,10.00,5670.00,7.00,5714.10,47.14,269362.67,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-18','2017-08-18',NULL,0),(7,'INV\\invoice\\7007',5,2,'invoice header',1,900.00,10.00,810.00,7.00,816.30,47.14,38480.38,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-18','2017-08-18',NULL,0),(8,'INV\\invoice\\7008',5,1,'invoice header',1,12600.00,20.00,10080.00,7.00,10256.40,47.14,483486.70,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-18','2017-08-18',NULL,0),(9,'INV\\invoice1\\7009',5,2,'invoice header',1,1000.00,0.00,1000.00,7.00,1000.00,0.93,929.00,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-19','2017-08-19',NULL,0),(10,'INV\\invoice1\\7009',5,2,'invoice header',1,1000.00,0.00,1000.00,7.00,1000.00,0.93,929.00,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-19','2017-08-19',NULL,0),(11,'INV\\invoice1\\7010',5,2,'invoice header',1,9100.00,0.00,9100.00,7.00,9667.00,0.93,8980.64,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-19','2017-08-19',NULL,0),(12,'INV\\invoice1\\7011',1,1,'invoice header',1,9100.00,0.00,9100.00,7.00,9667.00,47.14,455702.38,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-19','2017-08-19',NULL,0),(13,'INV\\invoice1\\7012',5,1,'invoice header',1,1200.00,0.00,1200.00,7.00,1284.00,0.93,1192.84,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-21','2017-08-21',NULL,0),(15,'INV\\TOP\\19001',3,1,'Thank you',2,2620.00,0.00,2620.00,7.00,2733.40,1.00,2733.40,'Cash on delivery','Topform Trg Ctr',NULL,NULL,'All overdue accounts is chargeable for interest @ 1% per mensum','P','2017-08-23','2017-08-23',NULL,1),(16,'INV\\TOPs\\19002',3,1,'invoice header',1,20.00,0.00,20.00,7.00,20.00,1.00,20.00,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-25','2017-08-25',NULL,0),(17,'INV\\TOPs\\19003',3,2,'invoice header',1,20.00,0.00,20.00,7.00,20.00,1.00,20.00,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-25','2017-08-25',NULL,0),(18,'INV\\TOPs\\19004',3,1,'invoice header',1,20.00,0.00,20.00,7.00,20.00,1.00,20.00,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-25','2017-08-25',NULL,0),(19,'INV\\TOPs\\19005',1,1,'invoice header',1,20.00,0.00,20.00,7.00,20.00,47.14,942.80,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','PENDING','2017-08-25','2017-08-25',NULL,0),(20,'INV\\TOPs\\19006',5,1,'invoice header',1,20.00,0.00,20.00,7.00,20.00,0.93,18.58,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','P','2017-08-25','2017-08-25',NULL,0),(21,'INV\\TOPs\\19007',3,1,'invoice header',1,20.00,0.00,20.00,7.00,20.00,1.00,20.00,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','C','2017-08-25','2017-08-25',NULL,0),(22,'INV\\TOPs\\19008',3,1,'invoice header',1,810.00,0.00,810.00,7.00,866.70,1.00,866.70,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','P','2017-08-25','2017-08-25',NULL,0),(23,'INV\\TOPs\\19009',3,1,'invoice header',1,900.00,0.00,900.00,7.00,963.00,1.00,963.00,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','C','2017-08-25','2017-08-25',NULL,0),(24,'INV\\TOPs\\19010',1,2,'invoice header',1,20.00,0.00,20.00,7.00,20.00,47.14,942.80,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','C','2017-08-25','2017-08-25',NULL,0),(25,'INV\\TOPs\\19011',1,2,'invoice header',1,3240.00,0.00,3240.00,7.00,3466.80,47.14,163424.95,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','C','2017-08-25','2017-08-25',NULL,0),(26,'INV\\TOPs\\19012',6,2,'invoice header',1,1200.00,0.00,1200.00,7.00,1284.00,47.14,60527.76,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','P','2017-08-25','2017-08-25',NULL,1),(27,'INV\\TOPs\\19013',6,1,'invoice header',1,1200.00,0.00,1200.00,7.00,1284.00,47.14,60527.76,'cash on delivery','training invoice','modification invoice',NULL,'invoice notes','P','2017-08-25','2017-08-25',NULL,0);
/*!40000 ALTER TABLE `invoice_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_product_master`
--

DROP TABLE IF EXISTS `invoice_product_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_product_master` (
  `i_p_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `gst_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`i_p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_product_master`
--

LOCK TABLES `invoice_product_master` WRITE;
/*!40000 ALTER TABLE `invoice_product_master` DISABLE KEYS */;
INSERT INTO `invoice_product_master` VALUES (40,1,1,101,10.00,1200.00,109080.00,19,'2017-08-18','2017-08-18'),(41,1,2,10,10.00,900.00,8100.00,19,'2017-08-18','2017-08-18'),(42,2,2,10,10.00,900.00,8100.00,19,'2017-08-18','2017-08-18'),(43,3,2,10,10.00,900.00,8100.00,19,'2017-08-18','2017-08-18'),(48,6,2,10,10.00,700.00,6300.00,19,'2017-08-18','2017-08-18'),(51,7,2,10,10.00,100.00,900.00,19,'2017-08-18','2017-08-18'),(52,8,2,10,10.00,900.00,8100.00,19,'2017-08-18','2017-08-18'),(53,8,1,5,10.00,1000.00,4500.00,19,'2017-08-18','2017-08-18'),(54,10,3,1,0.00,100.00,100.00,24,'2017-08-19','2017-08-19'),(55,5,2,10,10.00,800.00,7200.00,19,'2017-08-18','2017-08-19'),(56,11,3,1,0.00,100.00,100.00,24,'2017-08-19','2017-08-19'),(57,11,2,10,10.00,900.00,8100.00,19,'2017-08-19','2017-08-19'),(60,12,3,1,0.00,1000.00,1000.00,24,'2017-08-19','2017-08-19'),(61,12,2,10,10.00,900.00,8100.00,19,'2017-08-19','2017-08-19'),(62,13,1,10,90.00,1200.00,1200.00,19,'2017-08-21','2017-08-21'),(63,14,2,10,10.00,900.00,8100.00,19,'2017-08-22','2017-08-22'),(64,15,3,1,0.00,1000.00,1000.00,24,'2017-08-23','2017-08-23'),(65,15,2,2,10.00,900.00,1620.00,19,'2017-08-23','2017-08-23'),(66,16,3,1,0.00,20.00,20.00,24,'2017-08-25','2017-08-25'),(67,17,3,1,0.00,20.00,20.00,24,'2017-08-25','2017-08-25'),(68,18,3,1,0.00,20.00,20.00,24,'2017-08-25','2017-08-25'),(69,19,3,1,0.00,20.00,20.00,24,'2017-08-25','2017-08-25'),(70,20,3,1,0.00,20.00,20.00,24,'2017-08-25','2017-08-25'),(71,21,3,1,0.00,20.00,20.00,24,'2017-08-25','2017-08-25'),(76,22,2,1,10.00,900.00,810.00,19,'2017-08-25','2017-08-25'),(78,23,2,1,0.00,900.00,900.00,19,'2017-08-25','2017-08-25'),(79,24,3,1,0.00,20.00,20.00,24,'2017-08-25','2017-08-25'),(81,25,2,4,10.00,900.00,3240.00,19,'2017-08-25','2017-08-25'),(83,26,1,1,0.00,1200.00,1200.00,19,'2017-08-25','2017-08-25'),(85,27,1,10,90.00,1200.00,1200.00,19,'2017-08-25','2017-08-25'),(86,27,3,0,0.00,200.00,0.00,24,'2017-08-25','2017-08-25');
/*!40000 ALTER TABLE `invoice_product_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_setting`
--

DROP TABLE IF EXISTS `invoice_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_setting` (
  `invoice_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `invoice_text_prefix` varchar(50) NOT NULL,
  `invoice_number_prefix` varchar(50) NOT NULL,
  `invoice_type` varchar(50) NOT NULL,
  `invoice_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `invoice_footer_text` text NOT NULL,
  PRIMARY KEY (`invoice_setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_setting`
--

LOCK TABLES `invoice_setting` WRITE;
/*!40000 ALTER TABLE `invoice_setting` DISABLE KEYS */;
INSERT INTO `invoice_setting` VALUES (1,1,'TOPs','19013','invoice','invoice header','cash on delivery','training invoice','modification invoice','','invoice notes'),(2,2,'INV','999000','','','C.O.D.','Topform Trg Ctr','','','All overdue accounts is chargeable for interest @ 1% per mensum');
/*!40000 ALTER TABLE `invoice_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_master`
--

DROP TABLE IF EXISTS `quotation_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation_master` (
  `quotation_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_ref_no` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `quotation_header_text` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `lump_sum_discount` decimal(8,2) NOT NULL,
  `lump_sum_discount_price` decimal(8,2) NOT NULL,
  `gst` decimal(8,2) NOT NULL,
  `final_total` decimal(8,2) NOT NULL,
  `currency_amount` decimal(8,2) NOT NULL,
  `final_total_forex` decimal(8,2) NOT NULL,
  `terms_of_payments` varchar(50) DEFAULT NULL,
  `training_venue` varchar(50) DEFAULT NULL,
  `modification` varchar(50) DEFAULT NULL,
  `cancellation` varchar(50) DEFAULT NULL,
  `quotation_footer_text` text NOT NULL,
  `quotation_status` varchar(15) NOT NULL DEFAULT 'PENDING',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `invoice` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`quotation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_master`
--

LOCK TABLES `quotation_master` WRITE;
/*!40000 ALTER TABLE `quotation_master` DISABLE KEYS */;
INSERT INTO `quotation_master` VALUES (53,'TOP.20039',7,1,'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End',2,1000.00,0.00,1000.00,7.00,1063.00,47.14,50439.80,'5 days Overdue will be charged 3% of Total Payment','TRADPAC Training Centre','Modification subject to separate charges',NULL,'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.','CONFIRM','2017-09-01','2017-09-01',0),(54,'TOP.20040',3,1,'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End',2,1000.00,0.00,1000.00,7.00,1063.00,0.74,786.45,'5 days Overdue will be charged 3% of Total Payment','TRADPAC Training Centre','Modification subject to separate charges',NULL,'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.','CONFIRM','2017-09-01','2017-09-01',0),(55,'TOP.20041',7,1,'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End',2,5000.00,5.00,4750.00,7.00,5082.50,47.14,239589.05,'5 days Overdue will be charged 3% of Total Payment','TRADPAC Training Centre','Modification subject to separate charges',NULL,'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.','CONFIRM','2017-09-01','2017-09-01',0),(56,'TOP.20042',8,1,'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End',2,1000.00,0.00,1000.00,7.00,1070.00,47.14,50439.80,'5 days Overdue will be charged 3% of Total Payment','TRADPAC Training Centre','Modification subject to separate charges',NULL,'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.','CONFIRM','2017-09-01','2017-09-01',0),(57,'TOP.20043',7,1,'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End',2,1000.00,5.00,950.00,7.00,1016.50,47.14,47917.81,'5 days Overdue will be charged 3% of Total Payment','TRADPAC Training Centre','Modification subject to separate charges',NULL,'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.','CONFIRM','2017-09-01','2017-09-01',0);
/*!40000 ALTER TABLE `quotation_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_product_master`
--

DROP TABLE IF EXISTS `quotation_product_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation_product_master` (
  `q_p_id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `gst_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`q_p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_product_master`
--

LOCK TABLES `quotation_product_master` WRITE;
/*!40000 ALTER TABLE `quotation_product_master` DISABLE KEYS */;
INSERT INTO `quotation_product_master` VALUES (4,1,1,13,0.68,12.00,154.94,2,'2017-07-21','2017-07-21'),(5,1,3,11,0.79,1.00,10.91,19,'2017-07-21','2017-07-21'),(6,1,5,12,9.00,0.00,0.00,24,'2017-07-21','2017-07-21'),(10,2,6,100,10.00,2.00,180.00,19,'2017-07-21','2017-07-21'),(11,2,7,1000,20.00,1.00,800.00,19,'2017-07-21','2017-07-21'),(12,2,5,1,0.00,20.00,20.00,24,'2017-07-21','2017-07-21'),(13,3,3,1000,20.00,1.00,800.00,19,'2017-07-22','2017-07-22'),(14,5,3,100,0.00,1.00,0.00,19,'2017-07-22','2017-07-22'),(17,8,3,100,10.00,1.00,90.00,19,'2017-07-23','2017-07-23'),(18,8,6,50,20.00,2.00,80.00,19,'2017-07-23','2017-07-23'),(29,7,3,60,10.00,1.00,54.00,19,'2017-07-22','2017-07-23'),(30,7,6,250,20.00,2.00,400.00,19,'2017-07-22','2017-07-23'),(31,7,4,60,0.00,500.00,30000.00,19,'2017-07-22','2017-07-23'),(33,9,1,10,90.00,1200.00,1200.00,19,'2017-08-17','2017-08-17'),(36,11,2,10,50.00,900.00,4500.00,19,'2017-08-25','2017-08-25'),(37,12,2,1,0.00,900.00,900.00,19,'2017-08-25','2017-08-25'),(38,6,2,1,10.00,900.00,810.00,19,'2017-07-22','2017-08-25'),(39,13,2,1,0.00,900.00,900.00,19,'2017-08-25','2017-08-25'),(40,14,5,5,10.00,1200.00,5400.00,19,'2017-08-28','2017-08-28'),(41,14,4,10,10.00,1000.00,9000.00,19,'2017-08-28','2017-08-28'),(42,15,5,10,5.00,1400.00,13300.00,19,'2017-08-30','2017-08-30'),(43,16,4,10,20.00,1000.00,8000.00,19,'2017-08-30','2017-08-30'),(44,10,5,10,0.00,1400.00,14000.00,19,'2017-08-25','2017-08-30'),(45,10,4,5,5.00,1000.00,4750.00,19,'2017-08-25','2017-08-30'),(46,17,5,10,5.00,1400.00,13300.00,19,'2017-08-30','2017-08-30'),(47,18,5,2,15.00,1400.00,2380.00,19,'2017-08-30','2017-08-30'),(48,19,6,2,1.00,0.00,0.00,20,'2017-08-30','2017-08-30'),(49,20,5,1,50.00,1400.00,700.00,19,'2017-08-30','2017-08-30'),(50,21,4,1,50.00,1000.00,500.00,19,'2017-08-30','2017-08-30'),(51,22,4,1,0.00,1000.00,1000.00,19,'2017-08-30','2017-08-30'),(52,23,6,1,8.00,0.00,0.00,20,'2017-08-30','2017-08-30'),(53,24,4,1,11.00,1000.00,890.00,19,'2017-08-30','2017-08-30'),(54,25,4,2,0.00,1000.00,2000.00,19,'2017-08-30','2017-08-30'),(55,26,4,5,0.00,1000.00,5000.00,19,'2017-08-30','2017-08-30'),(56,27,4,4,50.00,1000.00,2000.00,19,'2017-08-30','2017-08-30'),(57,28,5,2,12.00,1400.00,2464.00,19,'2017-08-30','2017-08-30'),(58,29,5,1,0.00,1400.00,1400.00,19,'2017-08-30','2017-08-30'),(59,30,5,10,0.00,1400.00,14000.00,19,'2017-08-30','2017-08-30'),(60,31,5,10,0.00,1400.00,14000.00,19,'2017-08-30','2017-08-30'),(61,31,4,2,0.00,1000.00,2000.00,19,'2017-08-30','2017-08-30'),(62,32,4,8,0.00,1000.00,8000.00,19,'2017-08-31','2017-08-31'),(63,33,4,5,0.00,1000.00,5000.00,19,'2017-08-31','2017-08-31'),(64,34,5,12,12.00,1400.00,14784.00,19,'2017-08-31','2017-08-31'),(65,38,5,1,0.00,1400.00,1400.00,19,'2017-08-31','2017-08-31'),(66,39,6,0,0.00,10.00,0.00,20,'2017-08-31','2017-08-31'),(67,40,6,0,0.00,0.00,0.00,20,'2017-08-31','2017-08-31'),(68,42,6,0,0.00,0.00,0.00,20,'2017-08-31','2017-08-31'),(69,43,4,2,0.00,1000.00,2000.00,19,'2017-08-31','2017-08-31'),(70,44,5,0,0.00,1400.00,0.00,19,'2017-08-31','2017-08-31'),(71,45,4,0,0.00,1000.00,0.00,19,'2017-08-31','2017-08-31'),(72,46,4,0,0.00,1000.00,0.00,19,'2017-08-31','2017-08-31'),(73,47,4,1,0.00,1000.00,1000.00,19,'2017-08-31','2017-08-31'),(74,49,5,0,0.00,1400.00,1400.00,19,'2017-08-31','2017-08-31'),(75,50,4,1,0.00,1000.00,1000.00,19,'2017-08-31','2017-08-31'),(76,50,6,0,0.00,0.00,0.00,20,'2017-08-31','2017-08-31'),(77,50,5,1,0.00,1400.00,1400.00,19,'2017-08-31','2017-08-31'),(78,51,4,3,0.00,1000.00,3000.00,19,'2017-08-31','2017-08-31'),(79,52,4,0,0.00,1000.00,1000.00,19,'2017-09-01','2017-09-01'),(80,53,4,1,10.00,1000.00,900.00,19,'2017-09-01','2017-09-01'),(81,54,4,1,10.00,1000.00,900.00,19,'2017-09-01','2017-09-01'),(82,55,4,5,0.00,1000.00,5000.00,19,'2017-09-01','2017-09-01'),(83,56,4,1,0.00,1000.00,1000.00,19,'2017-09-01','2017-09-01'),(84,57,4,0,0.00,1000.00,1000.00,19,'2017-09-01','2017-09-01');
/*!40000 ALTER TABLE `quotation_product_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_setting`
--

DROP TABLE IF EXISTS `quotation_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation_setting` (
  `quotation_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `quotation_text_prefix` varchar(50) NOT NULL,
  `quotation_number_prefix` varchar(50) NOT NULL,
  `quotation_type` varchar(50) NOT NULL,
  `quotation_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `quotation_footer_text` text NOT NULL,
  PRIMARY KEY (`quotation_setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_setting`
--

LOCK TABLES `quotation_setting` WRITE;
/*!40000 ALTER TABLE `quotation_setting` DISABLE KEYS */;
INSERT INTO `quotation_setting` VALUES (1,2,'TOP','20043','order_entry','Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End','5 days Overdue will be charged 3% of Total Payment','TRADPAC Training Centre','Modification subject to separate charges','','All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),(2,1,'TOP','88889','invoice','test header','in 5 days','training center','Modification subject to separate charges','','All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
/*!40000 ALTER TABLE `quotation_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipt_master`
--

DROP TABLE IF EXISTS `receipt_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipt_master` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_ref_no` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_reference_id` varchar(255) NOT NULL,
  `bank` varchar(2555) NOT NULL,
  `cheque` varchar(255) NOT NULL,
  `other_reference` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `receipt_status` varchar(15) NOT NULL DEFAULT 'PENDING',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt_master`
--

LOCK TABLES `receipt_master` WRITE;
/*!40000 ALTER TABLE `receipt_master` DISABLE KEYS */;
INSERT INTO `receipt_master` VALUES (5,'REC\\REC\\102',3,1,'[\"15\"]','aaa','a1111','','SGD','2733.4','INV\\TOP\\19001','PENDING','2017-08-25','2017-08-25'),(6,'REC\\REC\\103',3,1,'[\"22\"]','asd','asd','','SGD','866.7','INV\\TOPs\\19008','PENDING','2017-08-25','2017-08-25'),(7,'REC\\REC\\104',2,1,'null','','','','SGD','','','PENDING','2017-08-25','2017-08-25'),(8,'REC\\REC\\105',5,1,'[\"\"]','asd','asd','','AUD','','','PENDING','2017-08-25','2017-08-25'),(9,'REC\\REC\\106',6,1,'[\"26\"]','hhh','bbbb','','INR','60527.76','INV\\TOPs\\19012','CONFIRM','2017-08-25','2017-08-25'),(10,'REC\\REC\\107',6,1,'null','1','1','','INR','','','CONFIRM','2017-08-25','2017-08-25');
/*!40000 ALTER TABLE `receipt_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipt_setting`
--

DROP TABLE IF EXISTS `receipt_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipt_setting` (
  `receipt_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `receipt_text_prefix` varchar(50) NOT NULL,
  `receipt_number_prefix` varchar(50) NOT NULL,
  `receipt_type` varchar(50) NOT NULL,
  `receipt_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `receipt_footer_text` text NOT NULL,
  PRIMARY KEY (`receipt_setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt_setting`
--

LOCK TABLES `receipt_setting` WRITE;
/*!40000 ALTER TABLE `receipt_setting` DISABLE KEYS */;
INSERT INTO `receipt_setting` VALUES (2,1,'REC','107','','','','','','',''),(3,2,'REC','15000','','','','','','','');
/*!40000 ALTER TABLE `receipt_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesman_master`
--

DROP TABLE IF EXISTS `salesman_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salesman_master` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_code` varchar(50) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_category` varchar(15) DEFAULT NULL,
  `s_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesman_master`
--

LOCK TABLES `salesman_master` WRITE;
/*!40000 ALTER TABLE `salesman_master` DISABLE KEYS */;
INSERT INTO `salesman_master` VALUES (1,'lil','Lillan','Demo','demo');
/*!40000 ALTER TABLE `salesman_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `security_master`
--

DROP TABLE IF EXISTS `security_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `security_master`
--

LOCK TABLES `security_master` WRITE;
/*!40000 ALTER TABLE `security_master` DISABLE KEYS */;
INSERT INTO `security_master` VALUES (1,'quotation_setting'),(2,'company_profile'),(3,'customer_master'),(4,'billing_master'),(5,'salesman_master'),(6,'forex_master'),(7,'gst_master'),(8,'country_master'),(9,'quotation'),(10,'pending_quotation'),(11,'confirm_quotation'),(12,'rejected_quotation');
/*!40000 ALTER TABLE `security_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN ID OTHERWISE SYSTEM WILL NOT WORK';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'127.0.0.1','Droopy','$2y$08$mT1eF9y6.FTjzj6bUjY0weZeF19j3ymQ.P3Hi.EZ4j3Y/dn0bzR92','','admin@admin.com','',NULL,NULL,NULL,1268889823,1503998116,1,'Admin istrator','TOPFORM MANAGMENT'),(2,3,'117.218.143.51','droopy','$2y$08$wbungEur8VoAln1Asor3KOdq3CJIj.dwzcqBnn01rnfemZaYC6mgK',NULL,'trueline.chirag@gmail.com',NULL,NULL,NULL,NULL,1500045874,1504266003,1,'Chirag jagani','admin'),(3,4,'117.218.143.51','sale1','$2y$08$uaJ.J0H.R0AAookWiUijbufCW.h5TX3BqdTQhm8JpdPC8YIJEg6Ou',NULL,'salesperson1@gmail.com',NULL,NULL,NULL,NULL,1500103217,1500535940,1,'sales person','SalesGroup'),(4,3,'45.126.201.241','velda','$2y$08$9E7kjZukq8jIN49qNgLAt.NktgZGFAgTm1VczG.g95ZBYLyiIvtCK',NULL,'admin2@admin.com',NULL,NULL,NULL,NULL,1500387661,1500529903,1,'velda','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN "ID" OTHERWISE SYSTEM WILL NOT WORK';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,2,3),(3,3,4),(4,4,3);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 15:40:34
