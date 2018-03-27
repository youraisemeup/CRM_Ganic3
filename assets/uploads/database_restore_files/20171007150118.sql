#
# TABLE STRUCTURE FOR: accounts_receivable
#

DROP TABLE IF EXISTS `accounts_receivable`;

CREATE TABLE `accounts_receivable` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_ref_no` varchar(50) NOT NULL,
  `customer_code` varchar(50) NOT NULL,
  `doc_date` date NOT NULL,
  `currency_type` varchar(11) NOT NULL,
  `total_amt` decimal(8,2) NOT NULL,
  `sign` varchar(5) NOT NULL,
  `tran_type` varchar(15) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `offset` varchar(1) NOT NULL DEFAULT 'n',
  `settled` varchar(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`ar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`) VALUES ('35', 'INV.999049', 'R001', '2017-09-29', 'SGD', '500.00', '+', 'Sales', '', 'n', 'y');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`) VALUES ('36', 'INV.999047', 'R001', '2017-09-28', 'SGD', '1070.00', '+', 'Sales', '', 'o', 'y');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`) VALUES ('37', 'INV.999048', 'R001', '2017-09-28', 'SGD', '1598.00', '+', 'Sales', '', 'o', 'y');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`) VALUES ('38', 'INV.999046', 'R001', '2017-09-28', 'SGD', '1000.00', '+', 'Sales', '', 'o', 'y');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`) VALUES ('39', 'REC.66510', 'R001', '2017-09-29', 'SGD', '1000.00', '-', 'Rec', '', 'o', 'y');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`) VALUES ('40', 'REC.66511', 'R001', '2017-09-29', 'SGD', '2668.00', '-', 'Rec', '', 'o', 'y');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`) VALUES ('41', 'REC.66512', 'R001', '2017-09-29', 'SGD', '500.00', '-', 'Rec', '', 'n', 'y');


#
# TABLE STRUCTURE FOR: billing_master
#

DROP TABLE IF EXISTS `billing_master`;

CREATE TABLE `billing_master` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_code` varchar(100) NOT NULL,
  `billing_description` varchar(509) NOT NULL,
  `billing_uom` varchar(25) DEFAULT NULL,
  `billing_price_per_uom` varchar(50) DEFAULT NULL,
  `gst_id` int(11) DEFAULT NULL,
  `billing_update_stock` varchar(5) DEFAULT NULL,
  `billing_type` varchar(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`billing_id`),
  KEY `gst_id` (`gst_id`)
) ENGINE=MyISAM AUTO_INCREMENT=342 DEFAULT CHARSET=latin1;

INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('1', 'SOMO', 'SAAS SERVICES / OMO SITE SVC', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('2', 'OTH', 'OTHER', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('3', 'MCR', 'MC - MC RENEWAL', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('4', 'LAB', 'SVC - LABTEST SERVICES', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('5', 'AD', 'SVC - AD HOC SITE SERVICES', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('6', 'MC', 'MC - TYPE A 12-MTH MC', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('7', 'MOD', 'SVC - MODIFICATIONSextension of deicmal pt to ...modify related file structuremodify affected documentationmodify sub-routines', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('8', 'MODUL', 'SVC - ADD ON MODULE', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('9', 'S-LIC', 'SVC - SUB-LICENCE @ 50% DISCOUNT', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('10', 'M2000', 'MC - M2000 CONTRACT (QUARTERLY)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('11', 'SCMP', 'MC - SOURCE CODES MAINTENANCE PLANWINDOWS APPLICATIONS ONLY', 'SET', '250', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('12', 'NET', 'SVC - NETWORK UPGRADE', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('13', 'BKLOG', 'ACCOUNTING SVC / CARRY INNote: our price is quoted based on the feedbackgiven to us pertaining to the volume of recordsfor input.To proceed, kindly arrange to let us have all theneccessary documents and information for input inrespect of the accounting period indicated above.', 'YEAR', '3588', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('14', '3C', 'MAGICALC-DOS', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('15', '3K', 'AUTO-RECOVERY CUM BILLING OPS SYSTEMFOR SHIPPING AND TRANSPORTATION ( WINDOWS )', 'SET', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('16', '3K1', 'TRADPAC BILLING/RECOVERY C/W MGMT ACCTSFOR SHIPPING AND TRANSPORTATION ( WINDOWS )', 'SET', '0', '1', NULL, NULL, '1');


#
# TABLE STRUCTURE FOR: company_profile
#

DROP TABLE IF EXISTS `company_profile`;

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

INSERT INTO `company_profile` (`profile_id`, `company_name`, `gst_reg_no`, `uen_no`, `company_address`, `phone`, `fax`, `company_logo`, `default_currency`) VALUES ('1', 'TOPFORM BUSINESS SYSTEMS PTE LTD', 'GST20171003', 'UEN78902345', 'BLK 71, UBI ROAD 1 , #08-35 , SINGAPORE 408732', '+65 7777888999', '(+65)67024812', 'logo.png', 'SGD');


#
# TABLE STRUCTURE FOR: country_master
#

DROP TABLE IF EXISTS `country_master`;

CREATE TABLE `country_master` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(15) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;

INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('1', '101', 'BELGIUM');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('2', '102', 'DENMARK');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('3', '103', 'FRANCE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('4', '104', 'GERMANY');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('5', '105', 'GREECE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('6', '106', 'IRELAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('7', '301', 'SINGAPORE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('8', '107', 'ITALY');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('9', '108', 'LUXEMBOURG');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('10', '109', 'NETHERLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('11', '110', 'UNITED KIN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('12', '111', 'PORTUGAL');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('13', '112', 'SPAIN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('14', '131', 'AUSTRIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('15', '132', 'FINLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('16', '133', 'ICELAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('17', '134', 'NORWAY');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('18', '135', 'SVALBARD JAN MAYEN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('19', '136', 'SWEDEN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('20', '137', 'SWITZERLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('21', '138', 'LIECHSTENSTEIN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('22', '139', 'BOUVET ISLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('23', '141', 'FAEROE ISLANDS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('24', '142', 'GREENLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('25', '143', 'MONACO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('26', '144', 'SAN MARINO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('27', '145', 'VATICAN CITY STATE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('28', '152', 'TURKEY');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('29', '153', 'ANDORRA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('30', '154', 'GIBRALTAR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('31', '155', 'MALTA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('32', '201', 'ALBANIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('33', '202', 'BULGARIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('34', '203', 'CZECHOSLOVAKIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('35', '205', 'HUNGARY');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('36', '206', 'POLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('37', '207', 'ROMANIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('38', '209', 'YUGOSLAVIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('39', '211', 'BELARUS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('40', '212', 'UKRAINE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('41', '213', 'ESTONIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('42', '214', 'LATVIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('43', '215', 'LITHUANIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('44', '216', 'GEORGIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('45', '217', 'ARMENIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('46', '218', 'AZERBAIJAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('47', '219', 'KYRGYZSTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('48', '221', 'KAZAKHSTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('49', '222', 'MOLDOVA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('50', '223', 'RUSSIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('51', '224', 'TAJIKISTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('52', '225', 'TURKMENISTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('53', '226', 'UZBEKISTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('54', '232', 'CROATIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('55', '233', 'SLOVENIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('56', '234', 'CZECH REPUBLIC');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('57', '235', 'SLOVAK REPUBLIC');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('58', '302', 'BRUNEI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('59', '303', 'INDONESIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('60', '304', 'MALAYSIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('61', '305', 'PHILIPPINES');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('62', '306', 'THAILAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('63', '307', 'EAST TIMOR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('64', '311', 'MYANMAR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('65', '312', 'CAMBODIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('66', '313', 'LAOS PEO DEM REP');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('67', '314', 'VIETNAM SOC REP OF');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('68', '319', 'O C IN S E ASIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('69', '331', 'JAPAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('70', '332', 'HONG KONG');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('71', '333', 'REP OF KOREA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('72', '334', 'TAIWAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('73', '335', 'MACAU');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('74', '336', 'CHINA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('75', '337', 'KOREA NORTH DEM PEO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('76', '338', 'MONGOLIAN PEOPLE REP');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('77', '351', 'AFGHANISTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('78', '352', 'BANGLADESH');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('79', '353', 'BHUTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('80', '354', 'INDIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('81', '355', 'MALDIVES');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('82', '356', 'NEPAL');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('83', '357', 'PAKISTAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('84', '358', 'SRI LANKA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('85', '371', 'BAHRAIN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('86', '372', 'CYPRUS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('87', '373', 'ISLAMIC REP OF IRAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('88', '374', 'IRAQ');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('89', '375', 'ISRAEL');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('90', '376', 'JORDAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('91', '377', 'KUWAIT');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('92', '378', 'LEBANON');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('93', '379', 'OMAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('94', '380', 'QATAR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('95', '381', 'SAUDI ARABIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('96', '382', 'SYRIAN ARAB REP');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('97', '383', 'UNITED ARAB EMIRATES');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('98', '384', 'YEMEN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('99', '385', 'DEMOCRATIC YEMEN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('100', '386', 'PALESTINE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('101', '401', 'ALGERIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('102', '402', 'EGYPT');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('103', '403', 'LIBYA A JAMAHIRIYA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('104', '404', 'MOROCCO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('105', '405', 'SUDAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('106', '406', 'TUNISIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('107', '407', 'DJIBOUTI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('108', '408', 'ETHIOPIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('109', '409', 'DEM REP OF SOMALI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('110', '410', 'ERITREA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('111', '421', 'GHANA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('112', '422', 'COTE DIVOIRE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('113', '423', 'KENYA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('114', '424', 'LIBERIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('115', '425', 'MADAGASCAR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('116', '426', 'MAURITIUS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('117', '427', 'MOZAMBIQUE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('118', '428', 'NIGERIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('119', '429', 'REUNION ISLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('120', '430', 'TANZANIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('121', '431', 'UGANDA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('122', '432', 'ZAMBIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('123', '451', 'ANGOLA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('124', '452', 'BENIN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('125', '453', 'BOTSWANA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('126', '454', 'BURKINA FASO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('127', '455', 'BURUNDI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('128', '456', 'CAMEROON UNITED REP');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('129', '457', 'CAPE VERDE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('130', '458', 'CENTRAL AFRICAN REP');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('131', '459', 'CHAD');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('132', '460', 'COMOROS ISLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('133', '461', 'CONGO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('134', '462', 'EQUATORIAL GUINEA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('135', '463', 'GABON');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('136', '464', 'GAMBIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('137', '465', 'GUINEA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('138', '466', 'GUINES BISSAU');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('139', '467', 'LESOTHO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('140', '468', 'MALAWI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('141', '469', 'MALI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('142', '470', 'MAURITANIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('143', '471', 'NAMIBIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('144', '472', 'NIGER');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('145', '473', 'RWANDA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('146', '474', 'SAO TOME PRINCIPE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('147', '475', 'SENEGAL');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('148', '476', 'SEYCHELLES');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('149', '477', 'SIERRA LEONE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('150', '478', 'SOUTH AFRICA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('151', '479', 'WESTERN SAHARA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('152', '480', 'SWAZILAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('153', '481', 'TOGO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('154', '482', 'REP OF ZAIRE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('155', '483', 'ZIMBABWE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('156', '484', 'ST HELENA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('157', '499', 'O C IN OTHER AFRICA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('158', '501', 'CANADA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('159', '502', 'PUERTO RICO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('160', '503', 'UNITED STATES');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('161', '504', 'U S MINOR ISLANDS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('162', '505', 'ST PIERRE MIQUELON');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('163', '509', 'OC NORTH AMERICA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('164', '601', 'ARGENTINA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('165', '602', 'BRAZIL');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('166', '603', 'CHILE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('167', '605', 'ECUADOR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('168', '606', 'MEXICO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('169', '607', 'PARAGUAY');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('170', '608', 'PERU');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('171', '609', 'URUGUAY');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('172', '610', 'VENEZUELA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('173', '621', 'CUBA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('174', '622', 'DOMINICAN REPUBLIC');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('175', '623', 'NETHERLANDS ANTILLES');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('176', '624', 'PANAMA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('177', '625', 'ARUBA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('178', '641', 'ANTIGUA AND BARBUDA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('179', '642', 'BAHAMAS ISLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('180', '643', 'BARBADOS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('181', '644', 'BELIZE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('182', '645', 'BERMUDA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('183', '646', 'BOLIVIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('184', '647', 'CAYMAN ISLANDS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('185', '648', 'COSTA RICA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('186', '649', 'DOMINICA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('187', '650', 'EL SALVADOR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('188', '651', 'FALKLAND IS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('189', '652', 'FRENCH GUIANA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('190', '653', 'GRENADA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('191', '654', 'GUADELOUPE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('192', '655', 'GUATEMALA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('193', '656', 'GUYANA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('194', '657', 'HAITI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('195', '658', 'HONDURAS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('196', '659', 'JAMAICA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('197', '660', 'NICARAGUA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('198', '661', 'MARTINIQUE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('199', '662', 'MONTSERRAT');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('200', '663', 'SAINT KITTS NEVIS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('201', '664', 'SAINT LUCIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('202', '665', 'SAINT VINCENT');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('203', '666', 'SURINAM');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('204', '667', 'TRINIDAD AND TOBAGO');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('205', '668', 'TURKS AND CAICOS IS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('206', '669', 'VIRGIN ISLANDS US');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('207', '670', 'ANGUILLA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('208', '671', 'BRITISH VIRGIN ISLND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('209', '672', 'ISLE OF MAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('210', '699', 'OC CTRL STH AMERICA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('211', '701', 'AUSTRALIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('212', '702', 'FIJI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('213', '703', 'NAURU');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('214', '704', 'NEW CALEDONIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('215', '706', 'PAPUA NEW GUINEA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('216', '707', 'SAMOA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('217', '708', 'BRITISH INDIAN OCEAN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('218', '709', 'CHRISTMAS ISLANDS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('219', '710', 'COCOS KEELING ISLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('220', '711', 'FRENCH SOUTHERN TERR');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('221', '712', 'HEARD MCDONALD ISLND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('222', '713', 'NORFOLK ISLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('223', '721', 'AMERICAN SAMOA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('224', '722', 'COOK ISLAND');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('225', '723', 'FRENCH POLYNESIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('226', '724', 'GUAM');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('227', '725', 'KIRIBATI');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('228', '726', 'NIUE');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('229', '727', 'PITCAIRN');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('230', '728', 'SOLOMON ISLANDS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('231', '729', 'TOKELAU');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('232', '730', 'TONGA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('233', '731', 'TUVALU');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('234', '732', 'NEW HERBRIDES');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('235', '733', 'WALLIS AND FUTUNA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('236', '734', 'NORTHERN MARIANA ISLANDS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('237', '735', 'MARSHALL ISLANDS');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('238', '736', 'MICRONESIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('239', '737', 'PALAU');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('240', '799', 'OC OCEANIA');
INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES ('241', '999', 'OTHERS');


#
# TABLE STRUCTURE FOR: currency
#

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`iso`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `currency` (`iso`, `name`) VALUES ('AFN', 'Afghanistan Afghani');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ALL', 'Albanian Lek');
INSERT INTO `currency` (`iso`, `name`) VALUES ('DZD', 'Algerian Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ADP', 'Andorran Peseta');
INSERT INTO `currency` (`iso`, `name`) VALUES ('AOK', 'Angolan Kwanza');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ARS', 'Argentine Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('AMD', 'Armenian Dram');
INSERT INTO `currency` (`iso`, `name`) VALUES ('AWG', 'Aruban Florin');
INSERT INTO `currency` (`iso`, `name`) VALUES ('AUD', 'Australian Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BSD', 'Bahamian Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BHD', 'Bahraini Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BDT', 'Bangladeshi Taka');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BBD', 'Barbados Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BZD', 'Belize Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BMD', 'Bermudian Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BTN', 'Bhutan Ngultrum');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BOB', 'Bolivian Boliviano');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BWP', 'Botswanian Pula');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BRL', 'Brazilian Real');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GBP', 'British Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BND', 'Brunei Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BGN', 'Bulgarian Lev');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BUK', 'Burma Kyat');
INSERT INTO `currency` (`iso`, `name`) VALUES ('BIF', 'Burundi Franc');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CAD', 'Canadian Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CVE', 'Cape Verde Escudo');
INSERT INTO `currency` (`iso`, `name`) VALUES ('KYD', 'Cayman Islands Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CLP', 'Chilean Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CLF', 'Chilean Unidades de Fomento');
INSERT INTO `currency` (`iso`, `name`) VALUES ('COP', 'Colombian Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XOF', 'Communauté Financière Africaine BCEAO - Francs');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XAF', 'Communauté Financière Africaine BEAC, Francs');
INSERT INTO `currency` (`iso`, `name`) VALUES ('KMF', 'Comoros Franc');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XPF', 'Comptoirs Français du Pacifique Francs');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CRC', 'Costa Rican Colon');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CUP', 'Cuban Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CYP', 'Cyprus Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CZK', 'Czech Republic Koruna');
INSERT INTO `currency` (`iso`, `name`) VALUES ('DKK', 'Danish Krone');
INSERT INTO `currency` (`iso`, `name`) VALUES ('YDD', 'Democratic Yemeni Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('DOP', 'Dominican Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XCD', 'East Caribbean Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('TPE', 'East Timor Escudo');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ECS', 'Ecuador Sucre');
INSERT INTO `currency` (`iso`, `name`) VALUES ('EGP', 'Egyptian Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SVC', 'El Salvador Colon');
INSERT INTO `currency` (`iso`, `name`) VALUES ('EEK', 'Estonian Kroon (EEK)');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ETB', 'Ethiopian Birr');
INSERT INTO `currency` (`iso`, `name`) VALUES ('EUR', 'Euro');
INSERT INTO `currency` (`iso`, `name`) VALUES ('FKP', 'Falkland Islands Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('FJD', 'Fiji Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GMD', 'Gambian Dalasi');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GHC', 'Ghanaian Cedi');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GIP', 'Gibraltar Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XAU', 'Gold, Ounces');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GTQ', 'Guatemalan Quetzal');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GNF', 'Guinea Franc');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GWP', 'Guinea-Bissau Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('GYD', 'Guyanan Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('HTG', 'Haitian Gourde');
INSERT INTO `currency` (`iso`, `name`) VALUES ('HNL', 'Honduran Lempira');
INSERT INTO `currency` (`iso`, `name`) VALUES ('HKD', 'Hong Kong Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('HUF', 'Hungarian Forint');
INSERT INTO `currency` (`iso`, `name`) VALUES ('INR', 'Indian Rupee');
INSERT INTO `currency` (`iso`, `name`) VALUES ('IDR', 'Indonesian Rupiah');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XDR', 'International Monetary Fund (IMF) Special Drawing Rights');
INSERT INTO `currency` (`iso`, `name`) VALUES ('IRR', 'Iranian Rial');
INSERT INTO `currency` (`iso`, `name`) VALUES ('IQD', 'Iraqi Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('IEP', 'Irish Punt');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ILS', 'Israeli Shekel');
INSERT INTO `currency` (`iso`, `name`) VALUES ('JMD', 'Jamaican Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('JPY', 'Japanese Yen');
INSERT INTO `currency` (`iso`, `name`) VALUES ('JOD', 'Jordanian Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('KHR', 'Kampuchean (Cambodian) Riel');
INSERT INTO `currency` (`iso`, `name`) VALUES ('KES', 'Kenyan Schilling');
INSERT INTO `currency` (`iso`, `name`) VALUES ('KWD', 'Kuwaiti Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('LAK', 'Lao Kip');
INSERT INTO `currency` (`iso`, `name`) VALUES ('LBP', 'Lebanese Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('LSL', 'Lesotho Loti');
INSERT INTO `currency` (`iso`, `name`) VALUES ('LRD', 'Liberian Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('LYD', 'Libyan Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MOP', 'Macau Pataca');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MGF', 'Malagasy Franc');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MWK', 'Malawi Kwacha');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MYR', 'Malaysian Ringgit');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MVR', 'Maldive Rufiyaa');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MTL', 'Maltese Lira');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MRO', 'Mauritanian Ouguiya');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MUR', 'Mauritius Rupee');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MXP', 'Mexican Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MNT', 'Mongolian Tugrik');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MAD', 'Moroccan Dirham');
INSERT INTO `currency` (`iso`, `name`) VALUES ('MZM', 'Mozambique Metical');
INSERT INTO `currency` (`iso`, `name`) VALUES ('NAD', 'Namibian Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('NPR', 'Nepalese Rupee');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ANG', 'Netherlands Antillian Guilder');
INSERT INTO `currency` (`iso`, `name`) VALUES ('YUD', 'New Yugoslavia Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('NZD', 'New Zealand Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('NIO', 'Nicaraguan Cordoba');
INSERT INTO `currency` (`iso`, `name`) VALUES ('NGN', 'Nigerian Naira');
INSERT INTO `currency` (`iso`, `name`) VALUES ('KPW', 'North Korean Won');
INSERT INTO `currency` (`iso`, `name`) VALUES ('NOK', 'Norwegian Kroner');
INSERT INTO `currency` (`iso`, `name`) VALUES ('OMR', 'Omani Rial');
INSERT INTO `currency` (`iso`, `name`) VALUES ('PKR', 'Pakistan Rupee');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XPD', 'Palladium Ounces');
INSERT INTO `currency` (`iso`, `name`) VALUES ('PAB', 'Panamanian Balboa');
INSERT INTO `currency` (`iso`, `name`) VALUES ('PGK', 'Papua New Guinea Kina');
INSERT INTO `currency` (`iso`, `name`) VALUES ('PYG', 'Paraguay Guarani');
INSERT INTO `currency` (`iso`, `name`) VALUES ('PEN', 'Peruvian Nuevo Sol');
INSERT INTO `currency` (`iso`, `name`) VALUES ('PHP', 'Philippine Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XPT', 'Platinum, Ounces');
INSERT INTO `currency` (`iso`, `name`) VALUES ('PLN', 'Polish Zloty');
INSERT INTO `currency` (`iso`, `name`) VALUES ('QAR', 'Qatari Rial');
INSERT INTO `currency` (`iso`, `name`) VALUES ('RON', 'Romanian Leu');
INSERT INTO `currency` (`iso`, `name`) VALUES ('RUB', 'Russian Ruble');
INSERT INTO `currency` (`iso`, `name`) VALUES ('RWF', 'Rwanda Franc');
INSERT INTO `currency` (`iso`, `name`) VALUES ('WST', 'Samoan Tala');
INSERT INTO `currency` (`iso`, `name`) VALUES ('STD', 'Sao Tome and Principe Dobra');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SAR', 'Saudi Arabian Riyal');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SCR', 'Seychelles Rupee');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SLL', 'Sierra Leone Leone');
INSERT INTO `currency` (`iso`, `name`) VALUES ('XAG', 'Silver, Ounces');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SGD', 'Singapore Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SKK', 'Slovak Koruna');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SBD', 'Solomon Islands Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SOS', 'Somali Schilling');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ZAR', 'South African Rand');
INSERT INTO `currency` (`iso`, `name`) VALUES ('KRW', 'South Korean Won');
INSERT INTO `currency` (`iso`, `name`) VALUES ('LKR', 'Sri Lanka Rupee');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SHP', 'St. Helena Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SDP', 'Sudanese Pound');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SRG', 'Suriname Guilder');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SZL', 'Swaziland Lilangeni');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SEK', 'Swedish Krona');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CHF', 'Swiss Franc');
INSERT INTO `currency` (`iso`, `name`) VALUES ('SYP', 'Syrian Potmd');
INSERT INTO `currency` (`iso`, `name`) VALUES ('TWD', 'Taiwan Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('TZS', 'Tanzanian Schilling');
INSERT INTO `currency` (`iso`, `name`) VALUES ('THB', 'Thai Baht');
INSERT INTO `currency` (`iso`, `name`) VALUES ('TOP', 'Tongan Paanga');
INSERT INTO `currency` (`iso`, `name`) VALUES ('TTD', 'Trinidad and Tobago Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('TND', 'Tunisian Dinar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('TRY', 'Turkish Lira');
INSERT INTO `currency` (`iso`, `name`) VALUES ('UGX', 'Uganda Shilling');
INSERT INTO `currency` (`iso`, `name`) VALUES ('AED', 'United Arab Emirates Dirham');
INSERT INTO `currency` (`iso`, `name`) VALUES ('UYU', 'Uruguayan Peso');
INSERT INTO `currency` (`iso`, `name`) VALUES ('USD', 'US Dollar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('VUV', 'Vanuatu Vatu');
INSERT INTO `currency` (`iso`, `name`) VALUES ('VEF', 'Venezualan Bolivar');
INSERT INTO `currency` (`iso`, `name`) VALUES ('VND', 'Vietnamese Dong');
INSERT INTO `currency` (`iso`, `name`) VALUES ('YER', 'Yemeni Rial');
INSERT INTO `currency` (`iso`, `name`) VALUES ('CNY', 'Yuan (Chinese) Renminbi');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ZRZ', 'Zaire Zaire');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ZMK', 'Zambian Kwacha');
INSERT INTO `currency` (`iso`, `name`) VALUES ('ZWD', 'Zimbabwe Dollar');


#
# TABLE STRUCTURE FOR: currency_master
#

DROP TABLE IF EXISTS `currency_master`;

CREATE TABLE `currency_master` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) NOT NULL,
  `currency_rate` double NOT NULL,
  `currency_description` text NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('1', 'SGD', '1', 'Singapore Dollar');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('2', 'INR', '47.14', 'Indian Rupee');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('3', 'AUD', '0.929', ' Australian Dollar');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('4', 'HKD', '5.73', ' Hong Kong Dollar');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('6', 'USD', '0.735', 'US Dollar ');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('7', 'MYR', '3.11', 'Malaysian Ringgit ');


#
# TABLE STRUCTURE FOR: customer_master
#

DROP TABLE IF EXISTS `customer_master`;

CREATE TABLE `customer_master` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(15) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_bldg_number` varchar(20) DEFAULT NULL,
  `customer_street_name` varchar(50) DEFAULT NULL,
  `customer_postal_code` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `permissions` text NOT NULL COMMENT '21 permissions to group',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN "ID" OTHERWISE SYSTEM WILL NOT WORK ';

INSERT INTO `groups` (`id`, `name`, `description`, `permissions`) VALUES ('1', 'TOPFORM MANAGMENT', 'Admin of Administrator', '');
INSERT INTO `groups` (`id`, `name`, `description`, `permissions`) VALUES ('3', 'admin', 'Administrator Group', '{\"quotation_setting\":1,\"company_profile\":1,\"customer_master\":1,\"billing_master\":1,\"salesman_master\":1,\"forex_master\":1,\"gst_master\":1,\"country_master\":1,\"quotation\":1,\"test\\r\\n\":0}');
INSERT INTO `groups` (`id`, `name`, `description`, `permissions`) VALUES ('4', 'SalesGroup', 'SalesGroup', '{\"quotation_setting\":0,\"company_profile\":0,\"customer_master\":1,\"billing_master\":0,\"salesman_master\":1,\"forex_master\":1,\"gst_master\":1,\"country_master\":1,\"quotation\":1,\"pending_quotation\":1,\"confirm_quotation\":1,\"rejected_quotation\":1,\"test\\r\\n\":0}');
INSERT INTO `groups` (`id`, `name`, `description`, `permissions`) VALUES ('5', 'Accounts', 'Accounting staff', '{\"quotation_setting\":0,\"company_profile\":0,\"customer_master\":1,\"billing_master\":1,\"salesman_master\":0,\"forex_master\":0,\"gst_master\":0,\"country_master\":0,\"quotation\":0,\"pending_quotation\":0,\"confirm_quotation\":0,\"rejected_quotation\":0}');


#
# TABLE STRUCTURE FOR: gst_master
#

DROP TABLE IF EXISTS `gst_master`;

CREATE TABLE `gst_master` (
  `gst_id` int(11) NOT NULL AUTO_INCREMENT,
  `gst_code` varchar(50) NOT NULL,
  `gst_rate` double NOT NULL,
  `gst_description` text NOT NULL,
  `gst_type` varchar(15) NOT NULL,
  PRIMARY KEY (`gst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('1', 'tx', '7', 'Purchases with GST incurred at 7% and directly attributable\r\nto taxable supplies', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('3', 'ZP', '0', 'Purchases from GST registered suppliers that are subject to GST at 0%', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('8', 'IM', '7', '7% GST paid to Singapore Customs on the import of goods\r\ninto Singapore', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('9', 'ME', '0', 'Imports under a special scheme (eg. Major Exporter Scheme,\r\n3rd Party Logistics Scheme) where the GST payable is\r\nsuspended', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('10', 'IGDS', '7', 'Imports under the import GST deferment scheme where the GST\r\nis suspended until the filing date of the GST return', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('11', 'BL', '7', 'Purchases where 7% GST is incurred but is specifically\r\nnot claimable (eg. medical expenses for staff)', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('12', 'NR', '0', 'Purchases from non-GST registered suppliers', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('13', 'EP', '0', 'Purchases specifically exempted from GST\r\neg. purchase and lease of residential properties, and\r\nthe provision of certain financial services', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('14', 'OP', '0', 'Supplies outside of the scope of GST Act\r\neg. purchase of services from suppliers established\r\noverseas or purchase of goods that are delivered from a\r\nplace outside Singapore to another place outside Singapore', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('15', 'TX-ESS', '7', 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nregulation 33 exempt', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('16', 'TX-ESS', '7', 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nregulation 33 exempt', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('17', 'TX-N33', '7', 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7%and directly attributable to the making of\r\nnon-regulation 33 exempt', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('18', 'TX-RE', '7', 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nboth taxable and exempt supplies', 'purchase');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('19', 'SR', '7', 'Standard-rated supplies with GST charged\r\nLocal supply of goods and services', 'supply');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('20', 'ZR', '0', 'Zero-rated supplies\r\nSupplies involving goods for export/provision of international\r\nservices', 'supply');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('21', 'ES33', '0', 'Specific categories of exempt supplies listed under regulation\r\n33 of the GST (General) Regulations', 'supply');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('22', 'ESN33', '0', 'Exempt supplies other than those listed under regulation 33\r\nof the GST (General) Regulations', 'supply');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('23', 'DS', '7', 'Deemed supplies (eg. transfer or disposal of business assets\r\nwithout consideration)\r\nSupplies required to be reported pursuant to the GST legislation', 'supply');
INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES ('24', 'OS', '0', 'Out-of-scope supplies\r\nSupplies outside the scope of the GST Act', 'supply');


#
# TABLE STRUCTURE FOR: invoice_master
#

DROP TABLE IF EXISTS `invoice_master`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: invoice_product_master
#

DROP TABLE IF EXISTS `invoice_product_master`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: invoice_setting
#

DROP TABLE IF EXISTS `invoice_setting`;

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

INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('1', '1', 'TOPs', '19013', 'invoice', 'invoice header', 'cash on delivery', 'training invoice', 'modification invoice', '', 'invoice notes');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('2', '2', 'INV', '999049', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');


#
# TABLE STRUCTURE FOR: quotation_master
#

DROP TABLE IF EXISTS `quotation_master`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: quotation_product_master
#

DROP TABLE IF EXISTS `quotation_product_master`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: quotation_setting
#

DROP TABLE IF EXISTS `quotation_setting`;

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

INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('1', '2', 'TOP', '20102', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('2', '1', 'TOP', '88889', 'invoice', 'test header', 'in 5 days', 'training center', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');


#
# TABLE STRUCTURE FOR: receipt_master
#

DROP TABLE IF EXISTS `receipt_master`;

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
  `receipt_status` varchar(15) NOT NULL DEFAULT 'C',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('23', 'REC.66510', '7', '2', '[\"1\"]', '', '', '', 'SGD', '1,000.00', 'INV.999046', 'P', '2017-09-29', '2017-09-29');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('24', 'REC.66511', '7', '2', '[\"2\",\"3\"]', '', '', '', 'SGD', '2,668.00', 'INV.999047,INV.999048', 'P', '2017-09-29', '2017-09-29');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('25', 'REC.66512', '7', '2', '[\"4\"]', '', '', '', 'SGD', '500.00', 'INV.999049', 'P', '2017-09-29', '2017-09-29');


#
# TABLE STRUCTURE FOR: receipt_setting
#

DROP TABLE IF EXISTS `receipt_setting`;

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

INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('2', '1', 'REC', '107', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('3', '2', 'REC', '66512', '', '', '', '', '', '', '');


#
# TABLE STRUCTURE FOR: salesman_master
#

DROP TABLE IF EXISTS `salesman_master`;

CREATE TABLE `salesman_master` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_code` varchar(50) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_category` varchar(15) DEFAULT NULL,
  `s_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: security_master
#

DROP TABLE IF EXISTS `security_master`;

CREATE TABLE `security_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `security_master` (`id`, `name`) VALUES ('1', 'quotation_setting');
INSERT INTO `security_master` (`id`, `name`) VALUES ('2', 'company_profile');
INSERT INTO `security_master` (`id`, `name`) VALUES ('3', 'customer_master');
INSERT INTO `security_master` (`id`, `name`) VALUES ('4', 'billing_master');
INSERT INTO `security_master` (`id`, `name`) VALUES ('5', 'salesman_master');
INSERT INTO `security_master` (`id`, `name`) VALUES ('6', 'forex_master');
INSERT INTO `security_master` (`id`, `name`) VALUES ('7', 'gst_master');
INSERT INTO `security_master` (`id`, `name`) VALUES ('8', 'country_master');
INSERT INTO `security_master` (`id`, `name`) VALUES ('9', 'quotation');
INSERT INTO `security_master` (`id`, `name`) VALUES ('10', 'pending_quotation');
INSERT INTO `security_master` (`id`, `name`) VALUES ('11', 'confirm_quotation');
INSERT INTO `security_master` (`id`, `name`) VALUES ('12', 'rejected_quotation');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

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

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`) VALUES ('1', '1', '127.0.0.1', 'Droopy', '$2y$08$mT1eF9y6.FTjzj6bUjY0weZeF19j3ymQ.P3Hi.EZ4j3Y/dn0bzR92', '', 'admin@admin.com', '', NULL, NULL, NULL, '1268889823', '1503998116', '1', 'Admin istrator', 'TOPFORM MANAGMENT');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`) VALUES ('2', '3', '117.218.143.51', 'droopy', '$2y$08$wbungEur8VoAln1Asor3KOdq3CJIj.dwzcqBnn01rnfemZaYC6mgK', NULL, 'trueline.chirag@gmail.com', NULL, NULL, NULL, NULL, '1500045874', '1507377374', '1', 'Chirag jagani', 'admin');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`) VALUES ('3', '4', '117.218.143.51', 'sale1', '$2y$08$uaJ.J0H.R0AAookWiUijbufCW.h5TX3BqdTQhm8JpdPC8YIJEg6Ou', NULL, 'salesperson1@gmail.com', NULL, NULL, NULL, NULL, '1500103217', '1500535940', '1', 'sales person', 'SalesGroup');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`) VALUES ('4', '3', '45.126.201.241', 'velda', '$2y$08$9E7kjZukq8jIN49qNgLAt.NktgZGFAgTm1VczG.g95ZBYLyiIvtCK', NULL, 'admin2@admin.com', NULL, NULL, NULL, NULL, '1500387661', '1500529903', '1', 'velda', 'admin');


#
# TABLE STRUCTURE FOR: users_groups
#

DROP TABLE IF EXISTS `users_groups`;

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

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('1', '1', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('2', '2', '3');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('3', '3', '4');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('4', '4', '3');


