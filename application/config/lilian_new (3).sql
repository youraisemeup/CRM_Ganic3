-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2018 at 03:03 PM
-- Server version: 10.0.34-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lilian_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_payable`
--

CREATE TABLE `accounts_payable` (
  `ap_id` int(11) NOT NULL,
  `doc_ref_no` varchar(50) NOT NULL,
  `supplier_code` varchar(50) NOT NULL,
  `doc_date` date NOT NULL,
  `currency_type` varchar(50) NOT NULL,
  `total_amt` decimal(8,2) NOT NULL,
  `sign` varchar(1) DEFAULT NULL,
  `tran_type` varchar(50) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `offset` varchar(1) DEFAULT 'n',
  `settled` varchar(1) DEFAULT 'n',
  `purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_payable`
--

INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES
(1, 'werewr', 'J0001', '2017-05-02', 'SGD', '720.00', '-', 'PUR', NULL, 'o', 'y', 2),
(2, 'tweterwt', 'K0004', '2017-04-01', 'MYR', '1282.53', '-', 'PUR', NULL, 'o', 'y', 4),
(3, 'erertr', 'J0001', '2017-02-01', 'SGD', '200.00', '-', 'PUR', NULL, 'n', 'n', 1),
(4, 'edrtert', 'K0004', '2017-08-06', 'MYR', '1220.00', '-', 'PUR', NULL, 'n', 'n', 3),
(5, 'Paymen.66827', 'K0004', '2017-12-06', 'MYR', '2282.53', '+', 'PAY', '', 'o', 'y', 2),
(6, 'Paymen.66826', 'J0001', '2017-12-06', 'SGD', '1220.00', '+', 'PAY', '', 'o', 'y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_receivable`
--

CREATE TABLE `accounts_receivable` (
  `ar_id` int(11) NOT NULL,
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
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_receivable`
--

INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES
(1, 'INV.999185', 'C0002', '2017-12-06', 'SGD', '3500.00', '+', 'Sales', '', 'n', 'n', 1),
(2, 'INV.999188', 'F0002', '2017-12-06', 'SGD', '3000.00', '+', 'Sales', '', 'o', 'y', 4),
(3, 'INV.999186', 'C0002', '2017-12-06', 'SGD', '988.00', '+', 'Sales', '', 'o', 'y', 2),
(4, 'INV.999187', 'F0002', '2017-12-06', 'SGD', '284.00', '+', 'Sales', '', 'n', 'n', 3),
(5, 'REC.66574', 'F0002', '2017-12-06', 'SGD', '4000.00', '-', 'Rec', '', 'o', 'y', 0),
(6, 'REC.66573', 'C0002', '2017-12-06', 'SGD', '1988.00', '-', 'Rec', '', 'o', 'y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ap_open`
--

CREATE TABLE `ap_open` (
  `ap_open_id` int(11) NOT NULL,
  `ap_open_tran_date` date DEFAULT NULL,
  `ap_open_doc_ref` varchar(255) DEFAULT NULL,
  `ap_open_remarks` varchar(255) DEFAULT NULL,
  `ap_open_amount` decimal(8,2) DEFAULT NULL,
  `ap_open_sign` varchar(1) DEFAULT NULL,
  `ap_open_status` varchar(1) DEFAULT 'C',
  `ap_customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ap_open`
--

INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES
(29, '2017-05-03', 'ertre', 'erw', '300.00', '+', 'C', 1),
(28, '2017-05-03', 'erert', 'tert', '300.00', '-', 'C', 3),
(26, '2017-08-06', 'etetr', '', '400.00', '+', 'P', 1),
(25, '2017-06-03', 'ert', '', '200.00', '-', 'P', 1),
(27, '2017-05-02', 'tertert', 'erter', '300.00', '-', 'C', 3),
(24, '2017-02-02', 'dfghdqere', 'tert1', '300.00', '-', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_date` date DEFAULT NULL,
  `bank_reference` varchar(255) DEFAULT NULL,
  `bank_remarks` varchar(255) DEFAULT NULL,
  `bank_debit` decimal(8,2) DEFAULT NULL,
  `bank_credit` decimal(8,2) DEFAULT NULL,
  `bank_balance` decimal(8,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES
(1, '2017-12-04', 'REC.66567', '', '200.00', NULL, '200.00'),
(2, '2017-12-04', 'Paymen.66823', '', NULL, '500.00', '-300.00'),
(3, '2017-12-05', 'Paymen.66824', '', NULL, '6660.00', '-6960.00'),
(4, '2017-12-05', 'REC.66569', '', '3600.00', NULL, '-3360.00'),
(5, '2017-12-05', 'REC.66570', '', '5815.00', NULL, '2455.00'),
(6, '2017-12-06', 'REC.66572', '', '1988.00', NULL, '4443.00'),
(7, '2017-12-06', 'REC.66571', '', '1784.00', NULL, '6227.00'),
(8, '2017-12-06', 'REC.66574', '', '4000.00', NULL, '10227.00'),
(9, '2017-12-06', 'REC.66573', '', '1988.00', NULL, '12215.00'),
(10, '2017-12-06', 'Paymen.66827', '', NULL, '2282.53', '9932.47'),
(11, '2017-12-06', 'Paymen.66826', '', NULL, '1220.00', '8712.47');

-- --------------------------------------------------------

--
-- Table structure for table `billing_master`
--

CREATE TABLE `billing_master` (
  `billing_id` int(11) NOT NULL,
  `stock_code` varchar(100) NOT NULL,
  `billing_description` varchar(509) NOT NULL,
  `billing_uom` varchar(25) DEFAULT NULL,
  `billing_price_per_uom` varchar(50) DEFAULT NULL,
  `gst_id` int(11) DEFAULT NULL,
  `billing_update_stock` varchar(5) DEFAULT NULL,
  `billing_type` varchar(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_master`
--

INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES
(1, 'FIN SVC', 'FINANCIAL MANAGEMENT SERVICE', 'JOB', '988', 20, 'YES', 'Service', 1),
(5, 'TP IAF', 'STANDARD TRADPAC FOR WINDOWS 10', 'PKG', '4650', 19, 'YES', 'Product', 1),
(6, 'PW PLUS', 'PAYWIN PLUS FOR WINDOWS 10', 'PKG', '4500', 19, 'YES', 'Product', 1),
(11, 'TP PLUS (EXPORT)', 'STANDARD TRADPAC', 'PKG', '3888', 20, 'YES', 'Product', 1),
(12, 'PW PLUS (EXPORT)', 'PAYWIN PLUS ', 'PKG', '4500', 20, 'YES', 'Product', 1),
(13, 'PC', 'PORT CHARGES', 'JOB', '3000', 24, 'YES', 'Service', 1),
(10, 'MC ', 'MAINTENANCE CONTRACT', 'SET', '1200', 19, 'YES', 'Service', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `profile_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `gst_reg_no` varchar(100) NOT NULL,
  `uen_no` varchar(100) NOT NULL,
  `company_address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `company_logo` varchar(50) NOT NULL,
  `default_currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`profile_id`, `company_name`, `gst_reg_no`, `uen_no`, `company_address`, `phone`, `fax`, `company_logo`, `default_currency`) VALUES
(1, 'TOPFORM BUSINESS SYSTEMS PTE LTD', '', '', 'BLK 71, UBI ROAD 1 , #08-35 , SINGAPORE 408732', '+65 7777888999', '(+65)67024812', 'logo.png', 'SGD');

-- --------------------------------------------------------

--
-- Table structure for table `configuration_master`
--

CREATE TABLE `configuration_master` (
  `id` int(11) NOT NULL,
  `conf_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuration_master`
--

INSERT INTO `configuration_master` (`id`, `conf_name`) VALUES
(1, 'configuration A'),
(2, 'configuration B'),
(3, 'configuration C'),
(4, 'configuration D'),
(5, 'configuration E'),
(6, 'configuration admin');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(15) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_code`, `country_name`) VALUES
(1, '101', 'BELGIUM'),
(2, '102', 'DENMARK'),
(3, '103', 'FRANCE'),
(4, '104', 'GERMANY'),
(5, '105', 'GREECE'),
(6, '106', 'IRELAND'),
(7, '301', 'SINGAPORE'),
(8, '107', 'ITALY'),
(9, '108', 'LUXEMBOURG'),
(10, '109', 'NETHERLAND'),
(11, '110', 'UNITED KIN'),
(12, '111', 'PORTUGAL'),
(13, '112', 'SPAIN'),
(14, '131', 'AUSTRIA'),
(15, '132', 'FINLAND'),
(16, '133', 'ICELAND'),
(17, '134', 'NORWAY'),
(18, '135', 'SVALBARD JAN MAYEN'),
(19, '136', 'SWEDEN'),
(20, '137', 'SWITZERLAND'),
(21, '138', 'LIECHSTENSTEIN'),
(22, '139', 'BOUVET ISLAND'),
(23, '141', 'FAEROE ISLANDS'),
(24, '142', 'GREENLAND'),
(25, '143', 'MONACO'),
(26, '144', 'SAN MARINO'),
(27, '145', 'VATICAN CITY STATE'),
(28, '152', 'TURKEY'),
(29, '153', 'ANDORRA'),
(30, '154', 'GIBRALTAR'),
(31, '155', 'MALTA'),
(32, '201', 'ALBANIA'),
(33, '202', 'BULGARIA'),
(34, '203', 'CZECHOSLOVAKIA'),
(35, '205', 'HUNGARY'),
(36, '206', 'POLAND'),
(37, '207', 'ROMANIA'),
(38, '209', 'YUGOSLAVIA'),
(39, '211', 'BELARUS'),
(40, '212', 'UKRAINE'),
(41, '213', 'ESTONIA'),
(42, '214', 'LATVIA'),
(43, '215', 'LITHUANIA'),
(44, '216', 'GEORGIA'),
(45, '217', 'ARMENIA'),
(46, '218', 'AZERBAIJAN'),
(47, '219', 'KYRGYZSTAN'),
(48, '221', 'KAZAKHSTAN'),
(49, '222', 'MOLDOVA'),
(50, '223', 'RUSSIA'),
(51, '224', 'TAJIKISTAN'),
(52, '225', 'TURKMENISTAN'),
(53, '226', 'UZBEKISTAN'),
(54, '232', 'CROATIA'),
(55, '233', 'SLOVENIA'),
(56, '234', 'CZECH REPUBLIC'),
(57, '235', 'SLOVAK REPUBLIC'),
(58, '302', 'BRUNEI'),
(59, '303', 'INDONESIA'),
(60, '304', 'MALAYSIA'),
(61, '305', 'PHILIPPINES'),
(62, '306', 'THAILAND'),
(63, '307', 'EAST TIMOR'),
(64, '311', 'MYANMAR'),
(65, '312', 'CAMBODIA'),
(66, '313', 'LAOS PEO DEM REP'),
(67, '314', 'VIETNAM SOC REP OF'),
(68, '319', 'O C IN S E ASIA'),
(69, '331', 'JAPAN'),
(70, '332', 'HONG KONG'),
(71, '333', 'REP OF KOREA'),
(72, '334', 'TAIWAN'),
(73, '335', 'MACAU'),
(74, '336', 'CHINA'),
(75, '337', 'KOREA NORTH DEM PEO'),
(76, '338', 'MONGOLIAN PEOPLE REP'),
(77, '351', 'AFGHANISTAN'),
(78, '352', 'BANGLADESH'),
(79, '353', 'BHUTAN'),
(80, '354', 'INDIA'),
(81, '355', 'MALDIVES'),
(82, '356', 'NEPAL'),
(83, '357', 'PAKISTAN'),
(84, '358', 'SRI LANKA'),
(85, '371', 'BAHRAIN'),
(86, '372', 'CYPRUS'),
(87, '373', 'ISLAMIC REP OF IRAN'),
(88, '374', 'IRAQ'),
(89, '375', 'ISRAEL'),
(90, '376', 'JORDAN'),
(91, '377', 'KUWAIT'),
(92, '378', 'LEBANON'),
(93, '379', 'OMAN'),
(94, '380', 'QATAR'),
(95, '381', 'SAUDI ARABIA'),
(96, '382', 'SYRIAN ARAB REP'),
(97, '383', 'UNITED ARAB EMIRATES'),
(98, '384', 'YEMEN'),
(99, '385', 'DEMOCRATIC YEMEN'),
(100, '386', 'PALESTINE'),
(101, '401', 'ALGERIA'),
(102, '402', 'EGYPT'),
(103, '403', 'LIBYA A JAMAHIRIYA'),
(104, '404', 'MOROCCO'),
(105, '405', 'SUDAN'),
(106, '406', 'TUNISIA'),
(107, '407', 'DJIBOUTI'),
(108, '408', 'ETHIOPIA'),
(109, '409', 'DEM REP OF SOMALI'),
(110, '410', 'ERITREA'),
(111, '421', 'GHANA'),
(112, '422', 'COTE DIVOIRE'),
(113, '423', 'KENYA'),
(114, '424', 'LIBERIA'),
(115, '425', 'MADAGASCAR'),
(116, '426', 'MAURITIUS'),
(117, '427', 'MOZAMBIQUE'),
(118, '428', 'NIGERIA'),
(119, '429', 'REUNION ISLAND'),
(120, '430', 'TANZANIA'),
(121, '431', 'UGANDA'),
(122, '432', 'ZAMBIA'),
(123, '451', 'ANGOLA'),
(124, '452', 'BENIN'),
(125, '453', 'BOTSWANA'),
(126, '454', 'BURKINA FASO'),
(127, '455', 'BURUNDI'),
(128, '456', 'CAMEROON UNITED REP'),
(129, '457', 'CAPE VERDE'),
(130, '458', 'CENTRAL AFRICAN REP'),
(131, '459', 'CHAD'),
(132, '460', 'COMOROS ISLAND'),
(133, '461', 'CONGO'),
(134, '462', 'EQUATORIAL GUINEA'),
(135, '463', 'GABON'),
(136, '464', 'GAMBIA'),
(137, '465', 'GUINEA'),
(138, '466', 'GUINES BISSAU'),
(139, '467', 'LESOTHO'),
(140, '468', 'MALAWI'),
(141, '469', 'MALI'),
(142, '470', 'MAURITANIA'),
(143, '471', 'NAMIBIA'),
(144, '472', 'NIGER'),
(145, '473', 'RWANDA'),
(146, '474', 'SAO TOME PRINCIPE'),
(147, '475', 'SENEGAL'),
(148, '476', 'SEYCHELLES'),
(149, '477', 'SIERRA LEONE'),
(150, '478', 'SOUTH AFRICA'),
(151, '479', 'WESTERN SAHARA'),
(152, '480', 'SWAZILAND'),
(153, '481', 'TOGO'),
(154, '482', 'REP OF ZAIRE'),
(155, '483', 'ZIMBABWE'),
(156, '484', 'ST HELENA'),
(157, '499', 'O C IN OTHER AFRICA'),
(158, '501', 'CANADA'),
(159, '502', 'PUERTO RICO'),
(160, '503', 'UNITED STATES'),
(161, '504', 'U S MINOR ISLANDS'),
(162, '505', 'ST PIERRE MIQUELON'),
(163, '509', 'OC NORTH AMERICA'),
(164, '601', 'ARGENTINA'),
(165, '602', 'BRAZIL'),
(166, '603', 'CHILE'),
(167, '605', 'ECUADOR'),
(168, '606', 'MEXICO'),
(169, '607', 'PARAGUAY'),
(170, '608', 'PERU'),
(171, '609', 'URUGUAY'),
(172, '610', 'VENEZUELA'),
(173, '621', 'CUBA'),
(174, '622', 'DOMINICAN REPUBLIC'),
(175, '623', 'NETHERLANDS ANTILLES'),
(176, '624', 'PANAMA'),
(177, '625', 'ARUBA'),
(178, '641', 'ANTIGUA AND BARBUDA'),
(179, '642', 'BAHAMAS ISLAND'),
(180, '643', 'BARBADOS'),
(181, '644', 'BELIZE'),
(182, '645', 'BERMUDA'),
(183, '646', 'BOLIVIA'),
(184, '647', 'CAYMAN ISLANDS'),
(185, '648', 'COSTA RICA'),
(186, '649', 'DOMINICA'),
(187, '650', 'EL SALVADOR'),
(188, '651', 'FALKLAND IS'),
(189, '652', 'FRENCH GUIANA'),
(190, '653', 'GRENADA'),
(191, '654', 'GUADELOUPE'),
(192, '655', 'GUATEMALA'),
(193, '656', 'GUYANA'),
(194, '657', 'HAITI'),
(195, '658', 'HONDURAS'),
(196, '659', 'JAMAICA'),
(197, '660', 'NICARAGUA'),
(198, '661', 'MARTINIQUE'),
(199, '662', 'MONTSERRAT'),
(200, '663', 'SAINT KITTS NEVIS'),
(201, '664', 'SAINT LUCIA'),
(202, '665', 'SAINT VINCENT'),
(203, '666', 'SURINAM'),
(204, '667', 'TRINIDAD AND TOBAGO'),
(205, '668', 'TURKS AND CAICOS IS'),
(206, '669', 'VIRGIN ISLANDS US'),
(207, '670', 'ANGUILLA'),
(208, '671', 'BRITISH VIRGIN ISLND'),
(209, '672', 'ISLE OF MAN'),
(210, '699', 'OC CTRL STH AMERICA'),
(211, '701', 'AUSTRALIA'),
(212, '702', 'FIJI'),
(213, '703', 'NAURU'),
(214, '704', 'NEW CALEDONIA'),
(215, '706', 'PAPUA NEW GUINEA'),
(216, '707', 'SAMOA'),
(217, '708', 'BRITISH INDIAN OCEAN'),
(218, '709', 'CHRISTMAS ISLANDS'),
(219, '710', 'COCOS KEELING ISLAND'),
(220, '711', 'FRENCH SOUTHERN TERR'),
(221, '712', 'HEARD MCDONALD ISLND'),
(222, '713', 'NORFOLK ISLAND'),
(223, '721', 'AMERICAN SAMOA'),
(224, '722', 'COOK ISLAND'),
(225, '723', 'FRENCH POLYNESIA'),
(226, '724', 'GUAM'),
(227, '725', 'KIRIBATI'),
(228, '726', 'NIUE'),
(229, '727', 'PITCAIRN'),
(230, '728', 'SOLOMON ISLANDS'),
(231, '729', 'TOKELAU'),
(232, '730', 'TONGA'),
(233, '731', 'TUVALU'),
(234, '732', 'NEW HERBRIDES'),
(235, '733', 'WALLIS AND FUTUNA'),
(236, '734', 'NORTHERN MARIANA ISLANDS'),
(237, '735', 'MARSHALL ISLANDS'),
(238, '736', 'MICRONESIA'),
(239, '737', 'PALAU'),
(240, '799', 'OC OCEANIA'),
(241, '999', 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`iso`, `name`) VALUES
('AFN', 'Afghanistan Afghani'),
('ALL', 'Albanian Lek'),
('DZD', 'Algerian Dinar'),
('ADP', 'Andorran Peseta'),
('AOK', 'Angolan Kwanza'),
('ARS', 'Argentine Peso'),
('AMD', 'Armenian Dram'),
('AWG', 'Aruban Florin'),
('AUD', 'Australian Dollar'),
('BSD', 'Bahamian Dollar'),
('BHD', 'Bahraini Dinar'),
('BDT', 'Bangladeshi Taka'),
('BBD', 'Barbados Dollar'),
('BZD', 'Belize Dollar'),
('BMD', 'Bermudian Dollar'),
('BTN', 'Bhutan Ngultrum'),
('BOB', 'Bolivian Boliviano'),
('BWP', 'Botswanian Pula'),
('BRL', 'Brazilian Real'),
('GBP', 'British Pound'),
('BND', 'Brunei Dollar'),
('BGN', 'Bulgarian Lev'),
('BUK', 'Burma Kyat'),
('BIF', 'Burundi Franc'),
('CAD', 'Canadian Dollar'),
('CVE', 'Cape Verde Escudo'),
('KYD', 'Cayman Islands Dollar'),
('CLP', 'Chilean Peso'),
('CLF', 'Chilean Unidades de Fomento'),
('COP', 'Colombian Peso'),
('XOF', 'Communauté Financière Africaine BCEAO - Francs'),
('XAF', 'Communauté Financière Africaine BEAC, Francs'),
('KMF', 'Comoros Franc'),
('XPF', 'Comptoirs Français du Pacifique Francs'),
('CRC', 'Costa Rican Colon'),
('CUP', 'Cuban Peso'),
('CYP', 'Cyprus Pound'),
('CZK', 'Czech Republic Koruna'),
('DKK', 'Danish Krone'),
('YDD', 'Democratic Yemeni Dinar'),
('DOP', 'Dominican Peso'),
('XCD', 'East Caribbean Dollar'),
('TPE', 'East Timor Escudo'),
('ECS', 'Ecuador Sucre'),
('EGP', 'Egyptian Pound'),
('SVC', 'El Salvador Colon'),
('EEK', 'Estonian Kroon (EEK)'),
('ETB', 'Ethiopian Birr'),
('EUR', 'Euro'),
('FKP', 'Falkland Islands Pound'),
('FJD', 'Fiji Dollar'),
('GMD', 'Gambian Dalasi'),
('GHC', 'Ghanaian Cedi'),
('GIP', 'Gibraltar Pound'),
('XAU', 'Gold, Ounces'),
('GTQ', 'Guatemalan Quetzal'),
('GNF', 'Guinea Franc'),
('GWP', 'Guinea-Bissau Peso'),
('GYD', 'Guyanan Dollar'),
('HTG', 'Haitian Gourde'),
('HNL', 'Honduran Lempira'),
('HKD', 'Hong Kong Dollar'),
('HUF', 'Hungarian Forint'),
('INR', 'Indian Rupee'),
('IDR', 'Indonesian Rupiah'),
('XDR', 'International Monetary Fund (IMF) Special Drawing Rights'),
('IRR', 'Iranian Rial'),
('IQD', 'Iraqi Dinar'),
('IEP', 'Irish Punt'),
('ILS', 'Israeli Shekel'),
('JMD', 'Jamaican Dollar'),
('JPY', 'Japanese Yen'),
('JOD', 'Jordanian Dinar'),
('KHR', 'Kampuchean (Cambodian) Riel'),
('KES', 'Kenyan Schilling'),
('KWD', 'Kuwaiti Dinar'),
('LAK', 'Lao Kip'),
('LBP', 'Lebanese Pound'),
('LSL', 'Lesotho Loti'),
('LRD', 'Liberian Dollar'),
('LYD', 'Libyan Dinar'),
('MOP', 'Macau Pataca'),
('MGF', 'Malagasy Franc'),
('MWK', 'Malawi Kwacha'),
('MYR', 'Malaysian Ringgit'),
('MVR', 'Maldive Rufiyaa'),
('MTL', 'Maltese Lira'),
('MRO', 'Mauritanian Ouguiya'),
('MUR', 'Mauritius Rupee'),
('MXP', 'Mexican Peso'),
('MNT', 'Mongolian Tugrik'),
('MAD', 'Moroccan Dirham'),
('MZM', 'Mozambique Metical'),
('NAD', 'Namibian Dollar'),
('NPR', 'Nepalese Rupee'),
('ANG', 'Netherlands Antillian Guilder'),
('YUD', 'New Yugoslavia Dinar'),
('NZD', 'New Zealand Dollar'),
('NIO', 'Nicaraguan Cordoba'),
('NGN', 'Nigerian Naira'),
('KPW', 'North Korean Won'),
('NOK', 'Norwegian Kroner'),
('OMR', 'Omani Rial'),
('PKR', 'Pakistan Rupee'),
('XPD', 'Palladium Ounces'),
('PAB', 'Panamanian Balboa'),
('PGK', 'Papua New Guinea Kina'),
('PYG', 'Paraguay Guarani'),
('PEN', 'Peruvian Nuevo Sol'),
('PHP', 'Philippine Peso'),
('XPT', 'Platinum, Ounces'),
('PLN', 'Polish Zloty'),
('QAR', 'Qatari Rial'),
('RON', 'Romanian Leu'),
('RUB', 'Russian Ruble'),
('RWF', 'Rwanda Franc'),
('WST', 'Samoan Tala'),
('STD', 'Sao Tome and Principe Dobra'),
('SAR', 'Saudi Arabian Riyal'),
('SCR', 'Seychelles Rupee'),
('SLL', 'Sierra Leone Leone'),
('XAG', 'Silver, Ounces'),
('SGD', 'Singapore Dollar'),
('SKK', 'Slovak Koruna'),
('SBD', 'Solomon Islands Dollar'),
('SOS', 'Somali Schilling'),
('ZAR', 'South African Rand'),
('KRW', 'South Korean Won'),
('LKR', 'Sri Lanka Rupee'),
('SHP', 'St. Helena Pound'),
('SDP', 'Sudanese Pound'),
('SRG', 'Suriname Guilder'),
('SZL', 'Swaziland Lilangeni'),
('SEK', 'Swedish Krona'),
('CHF', 'Swiss Franc'),
('SYP', 'Syrian Potmd'),
('TWD', 'Taiwan Dollar'),
('TZS', 'Tanzanian Schilling'),
('THB', 'Thai Baht'),
('TOP', 'Tongan Paanga'),
('TTD', 'Trinidad and Tobago Dollar'),
('TND', 'Tunisian Dinar'),
('TRY', 'Turkish Lira'),
('UGX', 'Uganda Shilling'),
('AED', 'United Arab Emirates Dirham'),
('UYU', 'Uruguayan Peso'),
('USD', 'US Dollar'),
('VUV', 'Vanuatu Vatu'),
('VEF', 'Venezualan Bolivar'),
('VND', 'Vietnamese Dong'),
('YER', 'Yemeni Rial'),
('CNY', 'Yuan (Chinese) Renminbi'),
('ZRZ', 'Zaire Zaire'),
('ZMK', 'Zambian Kwacha'),
('ZWD', 'Zimbabwe Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `currency_master`
--

CREATE TABLE `currency_master` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `currency_rate` double NOT NULL,
  `currency_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_master`
--

INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES
(1, 'SGD', 1, 'Singapore Dollar'),
(2, 'INR', 47.14, 'Indian Rupee'),
(3, 'AUD', 0.929, ' Australian Dollar'),
(4, 'HKD', 5.73, ' Hong Kong Dollar'),
(6, 'USD', 0.735, 'US Dollar '),
(7, 'MYR', 3.11, 'Malaysian Ringgit ');

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `customer_id` int(11) NOT NULL,
  `customer_code` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_bldg_number` varchar(255) DEFAULT NULL,
  `customer_street_name` varchar(255) DEFAULT NULL,
  `customer_postal_code` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_fax` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_contact_person` varchar(255) DEFAULT NULL,
  `customer_credit_limit` decimal(10,2) DEFAULT NULL,
  `customer_credit_term_days` int(11) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `customer_uen_no` varchar(255) DEFAULT NULL,
  `customer_gst_number` varchar(100) DEFAULT NULL,
  `customer_rating` decimal(2,1) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `flag` varchar(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`customer_id`, `customer_code`, `customer_name`, `customer_bldg_number`, `customer_street_name`, `customer_postal_code`, `customer_phone`, `customer_fax`, `customer_email`, `customer_contact_person`, `customer_credit_limit`, `customer_credit_term_days`, `currency_id`, `customer_uen_no`, `customer_gst_number`, `customer_rating`, `country_id`, `status`, `flag`) VALUES
(1, 'J0001', 'JUMMA LEARNING ACEDEMY PTE LTD', '808', 'FRENCH ROAD  #04-24 KITCHENER COMPLEX ', '200808', '6291 7152', '6291 7784', 'C22JLA@GMAIL.COM', 'JUM ABD HAMID', '3000.00', 30, 1, '199304049L', '199304049L', '0.0', 7, NULL, 'S'),
(2, 'C0002', 'CHEMICAL MANUFACTURING PTE LTD', '68 ', 'KAKI BUKIT AVE 6 #03-02 ARK@KB ', '417896', '9264 2275', '9800 4493', 'PAGGY@YAHOO.COM', 'KELVIN TAN', '3000.00', 30, 1, '53191214K', '53191214K', '0.0', 7, NULL, 'C'),
(3, 'K0004', 'KLEARKARBON SDN BHD', '25 ', 'JALAN KAKI  4, #03-66, SYNERGY@KL', '41780', '016 702 2847', '03 670 8844', 'ENQUIRY@KLEARKARBON.COM', 'KEN TAN', '5000.00', 30, 7, '199307897L', '199307897L', '9.9', 60, NULL, 'S'),
(4, 'j0001eeer', 'SAVCO INTERNATIONAL', 'BLK 3016', 'BEDOK NORTH AVE 4 #02-16 EACHTECH ', '489947', '6665 0688', '6665 0988', 'SAVCO1988@SAVCO.COM.SG', 'GLORIA LIM', '5000.00', 60, 6, '198833470K', '198833470K', '0.0', 160, NULL, 'S'),
(5, 'G0003', 'GSPL SDN BHD', '338', 'JALAN KUCHING', '84800', '03 900 3002', '', 'MARCUS@GSPL.COM.SG', 'MARCUS LIM', '5000.00', 30, 7, '13738990', '13738990', '0.0', 60, NULL, 'C'),
(6, 'F0002', 'FENG HUA INDUSTRIES ENGINEERING ', 'BLK 22', 'WOODLANDS LINK #03-45 WOODLANDS EAST IND ESTATE ', '738734', '6758 6078', '6753 0937', 'FENGHUA@GMAIL.COM', 'SUSAN LIM', '5000.00', 60, 1, '199078798K', '199078798K', '9.9', 7, NULL, 'C'),
(13, 'j0001dsf', 'sdfsdf', '', '', '', '', '', '', '', '0.00', 0, 1, '', '', '0.0', 7, NULL, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `gl_table`
--

CREATE TABLE `gl_table` (
  `gl_id` int(11) NOT NULL,
  `doc_date` date NOT NULL,
  `doc_ref_no` varchar(50) NOT NULL,
  `customer_code` varchar(50) NOT NULL,
  `gst` decimal(8,2) NOT NULL,
  `currency_amount` decimal(8,2) NOT NULL,
  `lump_sum_discount_price` decimal(8,2) NOT NULL,
  `total_amt` decimal(8,2) NOT NULL,
  `tran_type` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gl_table`
--

INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES
(1, '2017-10-22', 'INV.999057', 'BAS-SC289', '7.00', '1.00', '389.70', '416.98', 'INV'),
(2, '2017-10-21', 'INV.999056', 'BAS-MC003', '7.00', '1.00', '315.00', '337.05', 'INV'),
(3, '2017-10-22', 'INV.999058', 'BAS-SC168', '7.00', '1.00', '380.00', '406.60', 'INV'),
(4, '2017-10-22', 'INV.999059', 'BAS-SC168', '7.00', '1.00', '900.00', '963.00', 'INV'),
(5, '2017-10-22', 'INV.999060', 'BAS-SC289', '7.00', '1.00', '2304.00', '2465.28', 'INV'),
(6, '2017-10-23', 'INV.999064', 'BAS-SC168', '7.00', '1.00', '2400.00', '2568.00', 'INV'),
(7, '2017-10-26', 'INV.999068', 'testcuscode', '7.00', '0.74', '447.00', '478.29', 'INV'),
(8, '2017-10-26', 'INV.999069', 'testcuscode', '7.00', '0.74', '1249.50', '1336.96', 'INV'),
(9, '2017-10-26', 'INV.999070', 'testcuscode', '7.00', '0.74', '1647.87', '1762.65', 'INV'),
(10, '2017-10-26', 'INV.999071', 'testcuscode', '7.00', '0.74', '1647.87', '1762.65', 'INV'),
(11, '2017-10-26', 'INV.999072', 'testcuscode', '7.00', '0.74', '1764.00', '1887.48', 'INV'),
(12, '2017-10-27', 'INV.999074', 'testcuscode', '7.00', '0.74', '8362.68', '8948.07', 'INV'),
(13, '2017-10-27', 'INV.999074', 'testcuscode', '7.00', '0.74', '8362.68', '8948.07', 'INV'),
(14, '2017-10-26', 'INV.999072', 'testcuscode', '7.00', '0.74', '1764.00', '1887.48', 'INV'),
(15, '2017-10-28', 'INV.999077', 'SGDtestcusto', '7.00', '1.00', '500.00', '535.00', 'INV'),
(16, '2017-10-28', 'INV.999075', 'testcuscode', '7.00', '0.74', '367.50', '393.23', 'INV'),
(17, '2017-10-30', 'INV.999078', 'SGDtestcusto', '7.00', '1.00', '300.00', '321.00', 'INV'),
(18, '2017-11-01', 'INV.999087', 'BAS-SC168', '7.00', '1.00', '2400.00', '2568.00', 'INV'),
(19, '2017-11-01', 'INV.999089', 'SGDtestcusto', '7.00', '1.00', '123.00', '131.61', 'INV'),
(20, '2017-11-15', 'INV.999099', 'G0003', '7.00', '3.11', '18480.00', '19120.50', 'INV'),
(21, '2017-11-15', 'INV.999098', 'F0002', '7.00', '1.00', '10138.00', '10778.50', 'INV'),
(22, '2017-11-15', 'INV.999097', 'S0004', '7.00', '0.74', '12081.18', '12721.68', 'INV'),
(23, '2017-11-15', 'INV.999100', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(24, '2017-11-15', 'INV.999094', 'S0004', '7.00', '0.74', '12081.18', '12721.68', 'INV'),
(25, '2017-11-15', 'INV.999095', 'C0002', '7.00', '1.00', '12150.00', '12790.50', 'INV'),
(26, '2017-11-15', 'INV.999101', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(27, '2017-11-15', 'INV.999102', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(28, '2017-11-15', 'INV.999103', 'C0002', '7.00', '1.00', '4500.00', '4500.00', 'INV'),
(29, '2017-11-15', 'INV.999104', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(30, '2017-11-16', 'INV.999105', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(31, '2017-11-16', 'INV.999106', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(32, '2017-11-16', 'INV.999107', 'C0002', '7.00', '1.00', '4500.00', '4815.00', 'INV'),
(33, '2017-11-16', 'INV.999108', 'G0003', '7.00', '3.11', '3732.00', '3993.24', 'INV'),
(34, '2017-11-16', 'INV.999109', 'C0002', '7.00', '1.00', '0.00', '0.00', 'INV'),
(35, '2017-11-16', 'INV.999110', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(36, '2017-11-18', 'INV.999112', 'G0003', '7.00', '3.11', '999999.99', '999999.99', 'INV'),
(37, '2017-11-16', 'INV.999111', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(38, '2017-11-20', 'INV.999113', 'F0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(39, '2017-11-20', 'INV.999117', 'F0002', '7.00', '1.00', '38880.00', '38880.00', 'INV'),
(40, '2017-11-20', 'INV.999118', 'G0003', '7.00', '3.11', '462768.00', '495161.76', 'INV'),
(41, '2017-11-21', 'INV.999129', 'F0002', '7.00', '1.00', '47700.00', '51039.00', 'INV'),
(42, '2017-11-24', 'INV.999133', 'F0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(43, '2017-11-23', 'INV.999131', 'F0002', '7.00', '1.00', '17238.00', '17647.50', 'INV'),
(44, '2017-11-24', 'INV.999132', 'F0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(45, '2017-11-28', 'INV.999136', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(46, '2017-11-28', 'INV.999137', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(47, '2017-11-29', 'INV.999138', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(48, '2017-11-29', 'INV.999139', 'F0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(49, '2017-11-29', 'INV.999140', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(50, '2017-11-29', 'INV.999141', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(51, '2017-11-29', 'INV.999142', 'F0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(52, '2017-11-29', 'INV.999143', 'F0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(53, '2017-11-29', 'INV.999144', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(54, '2017-12-02', 'INV.999146', 'C0002', '7.00', '1.00', '4500.00', '4815.00', 'INV'),
(55, '2017-12-02', 'INV.999145', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(56, '2017-12-02', 'INV.999148', 'C0002', '7.00', '1.00', '4500.00', '4815.00', 'INV'),
(57, '2017-12-02', 'INV.999147', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(58, '2017-12-02', 'INV.999149', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(59, '2017-12-02', 'INV.999150', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(60, '2017-12-02', 'INV.999152', 'C0002', '7.00', '1.00', '40500.00', '43335.00', 'INV'),
(61, '2017-12-02', 'INV.999151', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(62, '2017-12-03', 'INV.999154', 'G0003', '7.00', '3.11', '13995.00', '13995.00', 'INV'),
(63, '2017-12-03', 'INV.999153', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(64, '2017-12-03', 'INV.999155', 'F0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(65, '2017-12-03', 'INV.999156', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(66, '2017-12-04', 'INV.999157', 'C0002', '7.00', '1.00', '5310.00', '5681.70', 'INV'),
(67, '2017-12-04', 'INV.999160', 'F0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(68, '2017-12-04', 'INV.999159', 'G0003', '7.00', '3.11', '13995.00', '13995.00', 'INV'),
(69, '2017-12-04', 'INV.999158', 'F0002', '7.00', '1.00', '4500.00', '4815.00', 'INV'),
(70, '2017-12-04', 'INV.999162', 'F0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(71, '2017-12-04', 'INV.999161', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(72, '2017-12-04', 'INV.999164', 'G0003', '7.00', '3.11', '13995.00', '14974.65', 'INV'),
(73, '2017-12-04', 'INV.999165', 'G0003', '7.00', '3.11', '13995.00', '14974.65', 'INV'),
(74, '2017-12-04', 'INV.999167', 'G0003', '7.00', '3.11', '13995.00', '14974.65', 'INV'),
(75, '2017-12-04', 'INV.999163', 'G0003', '7.00', '3.11', '9330.00', '9330.00', 'INV'),
(76, '2017-12-04', 'INV.999166', 'F0002', '7.00', '1.00', '4500.00', '4815.00', 'INV'),
(77, '2017-12-04', 'INV.999168', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(78, '2017-12-05', 'INV.999169', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(79, '2017-12-05', 'INV.999170', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(80, '2017-12-05', 'INV.999171', 'C0002', '7.00', '1.00', '0.00', '0.00', 'INV'),
(81, '2017-12-05', 'INV.999172', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(82, '2017-12-05', 'INV.999174', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(83, '2017-12-05', 'INV.999175', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(84, '2017-12-05', 'INV.999176', 'C0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(85, '2017-12-05', 'INV.999178', 'C0002', '7.00', '1.00', '4500.00', '4815.00', 'INV'),
(86, '2017-12-05', 'INV.999177', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(87, '2017-12-06', 'INV.999184', 'F0002', '7.00', '1.00', '4500.00', '4500.00', 'INV'),
(88, '2017-12-06', 'INV.999182', 'C0002', '7.00', '1.00', '1200.00', '1284.00', 'INV'),
(89, '2017-12-06', 'INV.999183', 'F0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(90, '2017-12-06', 'INV.999181', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(91, '2017-12-06', 'INV.999185', 'C0002', '7.00', '1.00', '4500.00', '4500.00', 'INV'),
(92, '2017-12-06', 'INV.999188', 'F0002', '7.00', '1.00', '3000.00', '3000.00', 'INV'),
(93, '2017-12-06', 'INV.999186', 'C0002', '7.00', '1.00', '988.00', '988.00', 'INV'),
(94, '2017-12-06', 'INV.999187', 'F0002', '7.00', '1.00', '1200.00', '1284.00', 'INV');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `permissions` text NOT NULL COMMENT '21 permissions to group'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN "ID" OTHERWISE SYSTEM WILL NOT WORK ';

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `permissions`) VALUES
(1, 'TOPFORM MANAGMENT', 'Admin of Administrator', ''),
(3, 'admin', 'Administrator Group', '{\"quotation_setting\":1,\"company_profile\":1,\"customer_master\":1,\"billing_master\":1,\"salesman_master\":1,\"forex_master\":1,\"gst_master\":1,\"country_master\":1,\"quotation\":1,\"test\\r\\n\":0}'),
(4, 'SalesGroup', 'SalesGroup', '{\"quotation_setting\":0,\"company_profile\":0,\"customer_master\":1,\"billing_master\":0,\"salesman_master\":1,\"forex_master\":1,\"gst_master\":1,\"country_master\":1,\"quotation\":1,\"pending_quotation\":1,\"confirm_quotation\":1,\"rejected_quotation\":1,\"test\\r\\n\":0}'),
(5, 'Accounts', 'Accounting staff', '{\"quotation_setting\":0,\"company_profile\":0,\"customer_master\":1,\"billing_master\":1,\"salesman_master\":0,\"forex_master\":0,\"gst_master\":0,\"country_master\":0,\"quotation\":0,\"pending_quotation\":0,\"confirm_quotation\":0,\"rejected_quotation\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `gst_master`
--

CREATE TABLE `gst_master` (
  `gst_id` int(11) NOT NULL,
  `gst_code` varchar(50) NOT NULL,
  `gst_rate` double NOT NULL,
  `gst_description` text NOT NULL,
  `gst_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gst_master`
--

INSERT INTO `gst_master` (`gst_id`, `gst_code`, `gst_rate`, `gst_description`, `gst_type`) VALUES
(1, 'tx', 7, 'Purchases with GST incurred at 7% and directly attributable\r\nto taxable supplies', 'purchase'),
(3, 'ZP', 0, 'Purchases from GST registered suppliers that are subject to GST at 0%', 'purchase'),
(8, 'IM', 7, '7% GST paid to Singapore Customs on the import of goods\r\ninto Singapore', 'purchase'),
(9, 'ME', 0, 'Imports under a special scheme (eg. Major Exporter Scheme,\r\n3rd Party Logistics Scheme) where the GST payable is\r\nsuspended', 'purchase'),
(10, 'IGDS', 7, 'Imports under the import GST deferment scheme where the GST\r\nis suspended until the filing date of the GST return', 'purchase'),
(11, 'BL', 7, 'Purchases where 7% GST is incurred but is specifically\r\nnot claimable (eg. medical expenses for staff)', 'purchase'),
(12, 'NR', 0, 'Purchases from non-GST registered suppliers', 'purchase'),
(13, 'EP', 0, 'Purchases specifically exempted from GST\r\neg. purchase and lease of residential properties, and\r\nthe provision of certain financial services', 'purchase'),
(14, 'OP', 0, 'Supplies outside of the scope of GST Act\r\neg. purchase of services from suppliers established\r\noverseas or purchase of goods that are delivered from a\r\nplace outside Singapore to another place outside Singapore', 'purchase'),
(15, 'TX-ESS', 7, 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nregulation 33 exempt', 'purchase'),
(16, 'TX-ESS', 7, 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nregulation 33 exempt', 'purchase'),
(17, 'TX-N33', 7, 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7%and directly attributable to the making of\r\nnon-regulation 33 exempt', 'purchase'),
(18, 'TX-RE', 7, 'Purchases from GST registered suppliers that are subject to\r\nto GST at 7% and directly attributable to the making of\r\nboth taxable and exempt supplies', 'purchase'),
(19, 'SR', 7, 'Standard-rated supplies with GST charged\r\nLocal supply of goods and services', 'supply'),
(20, 'ZR', 0, 'Zero-rated supplies\r\nSupplies involving goods for export/provision of international\r\nservices', 'supply'),
(21, 'ES33', 0, 'Specific categories of exempt supplies listed under regulation\r\n33 of the GST (General) Regulations', 'supply'),
(22, 'ESN33', 0, 'Exempt supplies other than those listed under regulation 33\r\nof the GST (General) Regulations', 'supply'),
(23, 'DS', 7, 'Deemed supplies (eg. transfer or disposal of business assets\r\nwithout consideration)\r\nSupplies required to be reported pursuant to the GST legislation', 'supply'),
(24, 'OS', 0, 'Out-of-scope supplies\r\nSupplies outside the scope of the GST Act', 'supply');

-- --------------------------------------------------------

--
-- Table structure for table `histcost_master`
--

CREATE TABLE `histcost_master` (
  `h_c_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price_sgd` decimal(8,2) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amt_sgd` decimal(8,2) DEFAULT NULL,
  `purchase_id` int(11) NOT NULL,
  `tranaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histcost_master`
--

INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES
(1, 5, '23.30', 30, '699.00', 2, '2017-05-02'),
(2, 12, '8.28', 50, '414.00', 4, '2017-04-01'),
(3, 5, '60.00', 10, '600.00', 1, '2017-02-01'),
(4, 5, '23.76', 30, '712.80', 3, '2017-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE `invoice_master` (
  `invoice_id` int(11) NOT NULL,
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
  `opening_balance` decimal(8,2) DEFAULT NULL,
  `full_amount` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_master`
--

INSERT INTO `invoice_master` (`invoice_id`, `invoice_ref_no`, `customer_id`, `salesman_id`, `invoice_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`, `invoice_status`, `created_on`, `modified_on`, `reject_msg`, `receipt`, `opening_balance`, `full_amount`) VALUES
(1, 'INV.999195', 2, 1, '', 8, '4500.00', '0.00', '4500.00', '7.00', '4815.00', '1.00', '4815.00', 'C.O.D.', 'Topform Trg Ctr', NULL, NULL, 'All overdue accounts is chargeable for interest @ 1% per mensum', 'C', '2017-12-12', '2017-12-12', NULL, 0, NULL, NULL),
(2, 'INV.999194', 6, 1, '', 7, '4500.00', '0.00', '4500.00', '7.00', '4815.00', '1.00', '4815.00', 'C.O.D.', 'Topform Trg Ctr', NULL, NULL, 'All overdue accounts is chargeable for interest @ 1% per mensum', 'C', '2017-12-12', '2017-12-12', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_product_master`
--

CREATE TABLE `invoice_product_master` (
  `i_p_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `gst_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_product_master`
--

INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES
(1, 1, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-12', '2017-12-12'),
(2, 2, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-12', '2017-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_setting`
--

CREATE TABLE `invoice_setting` (
  `invoice_setting_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `invoice_text_prefix` varchar(50) NOT NULL,
  `invoice_number_prefix` varchar(50) NOT NULL,
  `invoice_type` varchar(50) NOT NULL,
  `invoice_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `invoice_footer_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_setting`
--

INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES
(1, 1, 'TOPs', '19013', 'invoice', 'invoice header', 'cash on delivery', 'training invoice', 'modification invoice', '', 'invoice notes'),
(2, 2, 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum'),
(4, 3, '', '', '', '', '', '', '', '', ''),
(5, 7, 'INV', '999194', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum'),
(6, 8, 'INV', '999195', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum'),
(7, 10, 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum'),
(8, 11, 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum'),
(9, 12, 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum'),
(10, 5, 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');

-- --------------------------------------------------------

--
-- Table structure for table `open_stock_table`
--

CREATE TABLE `open_stock_table` (
  `open_stock_id` int(11) NOT NULL,
  `open_billing_id` int(11) NOT NULL,
  `open_stock_sign` varchar(1) DEFAULT '+',
  `open_stock_tran_type` varchar(255) DEFAULT 'Open',
  `open_stock_quantity` int(255) DEFAULT NULL,
  `open_stock_status` varchar(1) DEFAULT 'C'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `open_stock_table`
--

INSERT INTO `open_stock_table` (`open_stock_id`, `open_billing_id`, `open_stock_sign`, `open_stock_tran_type`, `open_stock_quantity`, `open_stock_status`) VALUES
(1, 6, '+', 'Open', 100, 'P'),
(2, 5, '+', 'Open', 500, 'P'),
(3, 5, '+', 'Open', 100, 'C'),
(4, 12, '+', 'Open', 400, 'C'),
(5, 12, '+', 'Open', 0, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `open_table`
--

CREATE TABLE `open_table` (
  `open_id` int(11) NOT NULL,
  `open_tran_date` date DEFAULT NULL,
  `open_doc_ref` varchar(255) DEFAULT NULL,
  `open_remarks` varchar(255) DEFAULT NULL,
  `open_amount` decimal(8,2) DEFAULT NULL,
  `open_sign` varchar(1) DEFAULT NULL,
  `open_status` varchar(1) DEFAULT 'C',
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `open_table`
--

INSERT INTO `open_table` (`open_id`, `open_tran_date`, `open_doc_ref`, `open_remarks`, `open_amount`, `open_sign`, `open_status`, `customer_id`) VALUES
(1, '2017-01-01', 'invoice', 'ssss', '100.00', '+', 'P', 2),
(2, '2017-10-10', 'creddit', 'kkk', '200.00', '-', 'P', 2),
(3, '2017-02-01', 'Inv', 'inv12345', '500.00', '+', 'P', 2),
(4, '2017-03-05', 'CN', 'CN12345', '400.00', '-', 'P', 2),
(5, '2017-06-05', 'Inv0605', 'Feng_huainv0605', '1000.00', '+', 'P', 6),
(6, '2017-05-03', 'CN0503', 'Feng_huCN0503', '2000.00', '-', 'P', 6),
(7, '2017-06-03', 'drgdg', 'eert', '300.00', '+', 'P', 2),
(8, '2017-08-04', 'sdfgd', 'ewerw', '220.00', '+', 'P', 2),
(9, '2017-03-05', 'rteert', 'twet', '300.00', '-', 'P', 2),
(10, '2017-05-02', 'sfs', 'werwer', '300.00', '+', 'P', 2),
(11, '2017-05-02', 'ertert', 'ert', '200.00', '+', 'C', 2),
(12, '2017-06-03', 'rtewrt', 'ert', '30.00', '+', 'C', 2),
(13, '0000-00-00', 'rgert', 'wer', '200.00', '+', 'C', 2),
(14, '2017-06-03', 'ertet', 'wtert', '300.00', '+', 'C', 2),
(15, '2017-05-02', 'retert', 'reter', '200.00', '+', 'C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_master`
--

CREATE TABLE `payment_master` (
  `payment_id` int(11) NOT NULL,
  `payment_ref_no` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_reference_id` varchar(255) NOT NULL,
  `bank` varchar(2555) NOT NULL,
  `cheque` varchar(255) NOT NULL,
  `other_reference` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `purchase` varchar(255) NOT NULL,
  `payment_status` varchar(15) NOT NULL DEFAULT 'C',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_master`
--

INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES
(1, 'Paymen.66826', 1, 2, '2', '', '', '', 'SGD', '1220', 'erertr,werewr', 'P', '2017-12-06', '2017-12-06'),
(2, 'Paymen.66827', 3, 2, '4', '', '', '', 'MYR', '2282.5299999999997', 'edrtert,tweterwt', 'P', '2017-12-06', '2017-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `payment_purchase_master`
--

CREATE TABLE `payment_purchase_master` (
  `pay_pur_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `pay_pur_amount` decimal(8,2) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `full_amount` decimal(8,2) DEFAULT NULL,
  `partial_status` varchar(1) NOT NULL DEFAULT 'C'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_purchase_master`
--

INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES
(1, 1, '500.00', NULL, NULL, 1, '700.00', 'P'),
(2, 2, '720.00', NULL, NULL, 1, '720.00', 'P'),
(3, 3, '1000.00', NULL, NULL, 2, '2220.00', 'P'),
(4, 4, '1282.53', NULL, NULL, 2, '1282.53', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `payment_setting`
--

CREATE TABLE `payment_setting` (
  `payment_setting_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `payment_text_prefix` varchar(50) NOT NULL,
  `payment_number_prefix` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `payment_footer_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_setting`
--

INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES
(4, 2, 'Paymen', '66827', '', '', '', '', '', '', ''),
(5, 7, 'Paymen', '66827', '', '', '', '', '', '', ''),
(6, 8, 'Paymen', '66827', '', '', '', '', '', '', ''),
(7, 10, 'Paymen', '66827', '', '', '', '', '', '', ''),
(8, 11, 'Paymen', '66827', '', '', '', '', '', '', ''),
(9, 12, 'Paymen', '66827', '', '', '', '', '', '', ''),
(10, 5, 'Paymen', '66827', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `purchase_id` int(11) NOT NULL,
  `purchase_ref_no` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount_foreign` decimal(8,2) NOT NULL,
  `currency_amount` decimal(8,2) NOT NULL,
  `total_amount_local` decimal(8,2) NOT NULL,
  `local_handling` decimal(8,2) NOT NULL,
  `total_purchase_b4_gst` decimal(8,2) NOT NULL,
  `gst_in_sgd` decimal(8,2) NOT NULL,
  `tran_type` varchar(50) NOT NULL DEFAULT 'PUR',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `purchase_status` varchar(1) DEFAULT 'C',
  `doc_date` date NOT NULL,
  `freight_insurance` decimal(8,2) DEFAULT NULL,
  `payment` int(1) NOT NULL DEFAULT '0',
  `import_permit_ref` varchar(100) DEFAULT NULL,
  `full_amount` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`purchase_id`, `purchase_ref_no`, `supplier_id`, `user_id`, `total_amount_foreign`, `currency_amount`, `total_amount_local`, `local_handling`, `total_purchase_b4_gst`, `gst_in_sgd`, `tran_type`, `created_on`, `modified_on`, `purchase_status`, `doc_date`, `freight_insurance`, `payment`, `import_permit_ref`, `full_amount`) VALUES
(1, 'erertr', 1, 2, '200.00', '1.00', '400.00', '200.00', '600.00', '100.00', 'PUR', '2017-12-06', '2017-12-06', 'P', '2017-02-01', '200.00', 0, '', '700.00'),
(2, 'werewr', 1, 2, '300.00', '1.00', '600.00', '100.00', '700.00', '20.00', 'PUR', '2017-12-06', '2017-12-06', 'P', '2017-05-02', '300.00', 1, '', '720.00'),
(3, 'edrtert', 3, 2, '360.00', '3.12', '211.54', '500.00', '711.54', '0.00', 'PUR', '2017-12-06', '2017-12-06', 'P', '2017-08-06', '300.00', 0, 'erwerwer', '2220.00'),
(4, 'tweterwt', 3, 2, '600.00', '3.11', '289.39', '123.00', '412.39', '0.00', 'PUR', '2017-12-06', '2017-12-06', 'P', '2017-04-01', '300.00', 1, 'rwetert', '1282.53');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product_master`
--

CREATE TABLE `purchase_product_master` (
  `p_p_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(8,2) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_product_master`
--

INSERT INTO `purchase_product_master` (`p_p_id`, `purchase_id`, `product_id`, `quantity`, `unit_price`, `amount`, `created_on`, `modified_on`) VALUES
(1, 1, 5, 10, '20.00', '200.00', '2017-12-06', '2017-12-06'),
(2, 2, 5, 30, '10.00', '300.00', '2017-12-06', '2017-12-06'),
(3, 3, 5, 30, '12.00', '360.00', '2017-12-06', '2017-12-06'),
(4, 4, 12, 50, '12.00', '600.00', '2017-12-06', '2017-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_master`
--

CREATE TABLE `quotation_master` (
  `quotation_id` int(11) NOT NULL,
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
  `invoice` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_master`
--

INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES
(1, 'TOP.20216', 2, 1, 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', 7, '3000.00', '0.00', '3000.00', '7.00', '3000.00', '1.00', '3000.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2017-12-12', '2017-12-12', 0),
(2, 'TOP.20217', 2, 1, 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', 7, '5700.00', '0.00', '5700.00', '7.00', '6099.00', '1.00', '6099.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2017-12-12', '2017-12-12', 0),
(3, 'TOP.20216', 2, 1, 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', 5, '1200.00', '0.00', '1200.00', '7.00', '1284.00', '1.00', '1284.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'SUCCESSFUL', '2017-12-12', '2017-12-12', 0),
(4, 'TOP.20217', 2, 1, 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', 5, '1200.00', '0.00', '1200.00', '7.00', '1284.00', '1.00', '1284.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2017-12-12', '2017-12-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_product_master`
--

CREATE TABLE `quotation_product_master` (
  `q_p_id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `gst_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_product_master`
--

INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES
(1, 1, 13, 1, '0.00', '3000.00', '3000.00', 24, '2017-12-12', '2017-12-12'),
(2, 2, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-12', '2017-12-12'),
(3, 2, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-12', '2017-12-12'),
(4, 3, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-12', '2017-12-12'),
(5, 4, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-12', '2017-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_setting`
--

CREATE TABLE `quotation_setting` (
  `quotation_setting_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `quotation_text_prefix` varchar(50) NOT NULL,
  `quotation_number_prefix` varchar(50) NOT NULL,
  `quotation_type` varchar(50) NOT NULL,
  `quotation_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `quotation_footer_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_setting`
--

INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES
(1, 2, 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),
(2, 1, 'TOP', '88889', 'invoice', 'test header', 'in 5 days', 'training center', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),
(6, 7, 'TOP', '20217', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),
(7, 8, 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),
(8, 10, 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),
(9, 11, 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),
(10, 12, 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.'),
(11, 5, 'TOP', '20217', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_invoice_master`
--

CREATE TABLE `receipt_invoice_master` (
  `r_i_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `rec_inv_amount` decimal(8,2) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  `receipt_id` int(11) NOT NULL,
  `full_amount` decimal(8,2) DEFAULT NULL,
  `partial_status` varchar(1) NOT NULL DEFAULT 'C'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt_invoice_master`
--

INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES
(1, 1, '1000.00', NULL, NULL, 1, '4500.00', 'P'),
(2, 2, '988.00', NULL, NULL, 1, '988.00', 'P'),
(3, 3, '1000.00', NULL, NULL, 2, '1284.00', 'P'),
(4, 4, '3000.00', NULL, NULL, 2, '3000.00', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_master`
--

CREATE TABLE `receipt_master` (
  `receipt_id` int(11) NOT NULL,
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
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_master`
--

INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES
(1, 'REC.66573', 2, 2, '2', '', '', '', 'SGD', '1988', 'INV.999185,INV.999186', 'P', '2017-12-06', '2017-12-06'),
(2, 'REC.66574', 6, 2, '4', '', '', '', 'SGD', '4000', 'INV.999187,INV.999188', 'P', '2017-12-06', '2017-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_setting`
--

CREATE TABLE `receipt_setting` (
  `receipt_setting_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `receipt_text_prefix` varchar(50) NOT NULL,
  `receipt_number_prefix` varchar(50) NOT NULL,
  `receipt_type` varchar(50) NOT NULL,
  `receipt_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `receipt_footer_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt_setting`
--

INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES
(2, 1, 'REC', '107', '', '', '', '', '', '', ''),
(3, 2, 'REC', '66574', '', '', '', '', '', '', ''),
(4, 7, 'REC', '66574', '', '', '', '', '', '', ''),
(5, 8, 'REC', '66574', '', '', '', '', '', '', ''),
(6, 10, 'REC', '66574', '', '', '', '', '', '', ''),
(7, 11, 'REC', '66574', '', '', '', '', '', '', ''),
(8, 12, 'REC', '66574', '', '', '', '', '', '', ''),
(9, 5, 'REC', '66574', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `salesman_master`
--

CREATE TABLE `salesman_master` (
  `s_id` int(11) NOT NULL,
  `s_code` varchar(50) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_category` varchar(15) DEFAULT NULL,
  `s_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesman_master`
--

INSERT INTO `salesman_master` (`s_id`, `s_code`, `s_name`, `s_category`, `s_note`) VALUES
(1, 'ms-examcode', 'salesman_test', 'no_category', 'no_note');

-- --------------------------------------------------------

--
-- Table structure for table `security_master`
--

CREATE TABLE `security_master` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_master`
--

INSERT INTO `security_master` (`id`, `name`) VALUES
(1, 'quotation_setting'),
(2, 'company_profile'),
(3, 'customer_master'),
(4, 'billing_master'),
(5, 'salesman_master'),
(6, 'forex_master'),
(7, 'gst_master'),
(8, 'country_master'),
(9, 'quotation'),
(10, 'pending_quotation'),
(11, 'confirm_quotation'),
(12, 'rejected_quotation');

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustment_master`
--

CREATE TABLE `stock_adjustment_master` (
  `adjustment_id` int(11) NOT NULL,
  `adjustment_ref_no` varchar(255) NOT NULL,
  `adjustment_remarks` varchar(255) NOT NULL,
  `adjustment_billing_id` int(11) NOT NULL,
  `adjustment_status` varchar(1) NOT NULL DEFAULT 'C',
  `adjustment_quantity` int(255) DEFAULT NULL,
  `adjustment_sign` varchar(1) NOT NULL,
  `adjustment_tran_type` varchar(255) DEFAULT 'Adjustment',
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_adjustment_master`
--

INSERT INTO `stock_adjustment_master` (`adjustment_id`, `adjustment_ref_no`, `adjustment_remarks`, `adjustment_billing_id`, `adjustment_status`, `adjustment_quantity`, `adjustment_sign`, `adjustment_tran_type`, `created_on`, `modified_on`) VALUES
(1, 'sdfsdf', 'rwerwer', 12, 'P', 100, '+', 'Adjustment', '2017-12-04', '2017-12-04'),
(2, 'ertert', 'ertert', 5, 'P', 20, '+', 'Adjustment', '2017-12-04', '2017-12-04'),
(3, 'dgdfg', 'dfgdfg', 5, 'C', 200, '+', 'Adjustment', '2017-12-05', '2017-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `stock_invoice_master`
--

CREATE TABLE `stock_invoice_master` (
  `s_i_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `gst_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_invoice_master`
--

INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES
(1, 1, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-03', '2017-12-03'),
(2, 2, 12, 1, '0.00', '4500.00', '13995.00', 20, '2017-12-03', '2017-12-03'),
(3, 3, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-03', '2017-12-03'),
(4, 1, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-03', '2017-12-03'),
(5, 2, 6, 2, '41.00', '4500.00', '5310.00', 19, '2017-12-04', '2017-12-04'),
(6, 1, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-04', '2017-12-04'),
(7, 2, 12, 1, '0.00', '4500.00', '13995.00', 20, '2017-12-04', '2017-12-04'),
(8, 3, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-04', '2017-12-04'),
(9, 4, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-04', '2017-12-04'),
(10, 5, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-04', '2017-12-04'),
(11, 6, 13, 1, '0.00', '3000.00', '9330.00', 24, '2017-12-04', '2017-12-04'),
(12, 7, 6, 1, '0.00', '4500.00', '13995.00', 19, '2017-12-04', '2017-12-04'),
(13, 8, 6, 1, '0.00', '4500.00', '13995.00', 19, '2017-12-04', '2017-12-04'),
(14, 9, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-04', '2017-12-04'),
(15, 10, 6, 1, '0.00', '4500.00', '13995.00', 19, '2017-12-04', '2017-12-04'),
(16, 1, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-04', '2017-12-04'),
(17, 2, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-05', '2017-12-05'),
(18, 3, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-05', '2017-12-05'),
(19, 4, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-05', '2017-12-05'),
(20, 5, 13, 1, '0.00', '3000.00', '3000.00', 24, '2017-12-05', '2017-12-05'),
(21, 6, 13, 1, '0.00', '3000.00', '3000.00', 24, '2017-12-05', '2017-12-05'),
(22, 7, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-05', '2017-12-05'),
(23, 1, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-05', '2017-12-05'),
(24, 2, 13, 1, '0.00', '3000.00', '3000.00', 24, '2017-12-05', '2017-12-05'),
(25, 1, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-05', '2017-12-05'),
(26, 2, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-05', '2017-12-05'),
(27, 1, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-06', '2017-12-06'),
(28, 2, 6, 1, '20.00', '4500.00', '4500.00', 19, '2017-12-06', '2017-12-06'),
(29, 1, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-06', '2017-12-06'),
(30, 2, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-06', '2017-12-06'),
(31, 3, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-06', '2017-12-06'),
(32, 4, 12, 1, '0.00', '4500.00', '4500.00', 20, '2017-12-06', '2017-12-06'),
(33, 1, 12, 1, '0.00', '4500.00', '4500.00', 20, '2017-12-06', '2017-12-06'),
(34, 2, 1, 1, '0.00', '988.00', '988.00', 20, '2017-12-06', '2017-12-06'),
(35, 3, 10, 1, '0.00', '1200.00', '1200.00', 19, '2017-12-06', '2017-12-06'),
(36, 4, 13, 1, '0.00', '3000.00', '3000.00', 24, '2017-12-06', '2017-12-06'),
(37, 5, 13, 1, '0.00', '3000.00', '3000.00', 24, '2017-12-11', '2017-12-11'),
(38, 6, 13, 1, '0.00', '3000.00', '3000.00', 24, '2017-12-11', '2017-12-11'),
(39, 1, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-12', '2017-12-12'),
(40, 2, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-12', '2017-12-12'),
(41, 1, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-12', '2017-12-12'),
(42, 2, 6, 1, '0.00', '4500.00', '4500.00', 19, '2017-12-12', '2017-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `stock_purchase_master`
--

CREATE TABLE `stock_purchase_master` (
  `purchase_id` int(11) NOT NULL,
  `purchase_ref_no` varchar(50) NOT NULL,
  `purchase_supplier_id` int(11) NOT NULL,
  `purchase_billing_id` int(11) NOT NULL,
  `purchase_quantity` int(255) DEFAULT NULL,
  `purchase_status` varchar(1) DEFAULT 'C',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `purchase_tran_type` varchar(20) NOT NULL DEFAULT 'Purchase',
  `purchase_sign` varchar(1) NOT NULL DEFAULT '+'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_purchase_master`
--

INSERT INTO `stock_purchase_master` (`purchase_id`, `purchase_ref_no`, `purchase_supplier_id`, `purchase_billing_id`, `purchase_quantity`, `purchase_status`, `created_on`, `modified_on`, `purchase_tran_type`, `purchase_sign`) VALUES
(1, 'egert', 1, 6, 100, 'P', '2017-12-04', '2017-12-04', 'Purchase', '+'),
(2, 'erwer', 3, 5, 300, 'P', '2017-12-04', '2017-12-04', 'Purchase', '+'),
(3, 'dertert', 1, 12, 100, 'C', '2017-12-05', '2017-12-05', 'Purchase', '+'),
(4, 'sdfsdf', 1, 12, 200, 'C', '2017-12-05', '2017-12-05', 'Purchase', '+'),
(5, 'fgsdf', 3, 11, 200, 'C', '2017-12-05', '2017-12-05', 'Purchase', '+'),
(6, 'dsfsdf', 1, 12, 100, 'C', '2017-12-06', '2017-12-06', 'Purchase', '+');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_master`
--

CREATE TABLE `supplier_master` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_master`
--

INSERT INTO `supplier_master` (`supplier_id`, `supplier_name`, `supplier_code`) VALUES
(1, 'first_supplier_name', 'second_supplier_code'),
(2, 'second_supplier_name', 'second_supplier_code');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `level` varchar(50) NOT NULL,
  `conf_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN ID OTHERWISE SYSTEM WILL NOT WORK';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES
(2, 3, '117.218.143.51', 'droopy', '$2y$08$uC54Y0lonVVXgKAM6qwMJOWqb5vSUM0ziRIFmZ4SUU8f9BClbY83C', NULL, 'trueline.chirag@gmail.com', NULL, NULL, NULL, NULL, 1500045874, 1513165639, 1, 'Chirag jagani', 'admin', 6),
(3, 4, '117.218.143.51', 'sale1', '$2y$08$uaJ.J0H.R0AAookWiUijbufCW.h5TX3BqdTQhm8JpdPC8YIJEg6Ou', NULL, 'salesperson1@gmail.com', NULL, NULL, NULL, NULL, 1500103217, 1500535940, 1, 'sales person', 'SalesGroup', NULL),
(4, 3, '45.126.201.241', 'velda', '$2y$08$9E7kjZukq8jIN49qNgLAt.NktgZGFAgTm1VczG.g95ZBYLyiIvtCK', NULL, 'admin2@admin.com', NULL, NULL, NULL, NULL, 1500387661, 1500529903, 1, 'velda', 'SalesGroup', NULL),
(5, 1, '127.0.0.1', 'superuser', '$2y$08$j2XSkDNnNLW8Ve0wSsHD8.MIqhlkIci4jgMUaeBMIrsVlQzWgmQL2', NULL, 'superuser@super.com', NULL, NULL, NULL, NULL, 1512706946, 1513141421, 1, 'Super User', 'TOPFORM MANAGMENT', NULL),
(6, 5, '127.0.0.1', 'new_test_user', '$2y$08$zKgsTesGs/v2ZgUvb.kRSuJ4KZPf5I8nP25gAVdS8XZV/KYjVER7W', NULL, 'new@new.com', NULL, NULL, NULL, NULL, 1512788205, NULL, 1, 'new_test_user', 'Accounts', NULL),
(7, 3, '127.0.0.1', 'admin1', '$2y$08$JE8/IxpSd//2nLcvB6qUWecOVuuhdwVexKRid8JlnlbYBG8ApZuB6', NULL, 'admin1@admin1.com', NULL, NULL, NULL, NULL, 1512812238, 1513088882, 1, 'Admin1 Full name', 'admin', 1),
(8, 3, '127.0.0.1', 'admin2', '$2y$08$8uR20DAV2td7YO1gI9yuTuQ40B.TNz.7e6iny38zM3sDL.uNuCdqy', NULL, 'admin2@admin2.com', NULL, NULL, NULL, NULL, 1512812292, 1513140861, 1, 'Admin2 full name', 'admin', 2),
(10, 3, '127.0.0.1', 'admin4', '$2y$08$EXTRP4HITp029BtWKZYNr.B8vKRgP8Q1dEgMsNqT8YX8ZHvJiAbfy', NULL, 'admin4@admin4.com', NULL, NULL, NULL, NULL, 1512812382, 1513089177, 1, 'admin 4 full name', 'admin', 4),
(11, 3, '127.0.0.1', 'admin5', '$2y$08$9wnM.bsEUI8KdNyKGoYen.ByaXjbuDTpDd8dK0mKiwJOfDZoEs3W2', NULL, 'admin5@admin5.com', NULL, NULL, NULL, NULL, 1512812547, 1513089285, 1, 'admin 5 Full name', 'admin', 5),
(12, 3, '127.0.0.1', 'admin3', '$2y$08$sbDzChfZHLCOy05a0Tl2kuOKHkHh7ENaNubXa0iQqmYse7Mxppm4a', NULL, 'admin3@admin3.com', NULL, NULL, NULL, NULL, 1512982220, 1513089085, 1, 'admin3 full name', 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN "ID" OTHERWISE SYSTEM WILL NOT WORK';

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(2, 2, 3),
(3, 3, 4),
(4, 4, 3),
(1, 5, 1),
(6, 6, 5),
(11, 7, 3),
(13, 8, 4),
(10, 10, 3),
(12, 11, 3),
(14, 12, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `ap_open`
--
ALTER TABLE `ap_open`
  ADD PRIMARY KEY (`ap_open_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `billing_master`
--
ALTER TABLE `billing_master`
  ADD PRIMARY KEY (`billing_id`),
  ADD KEY `gst_id` (`gst_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `configuration_master`
--
ALTER TABLE `configuration_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`iso`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `currency_master`
--
ALTER TABLE `currency_master`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `currency_id` (`currency_id`);

--
-- Indexes for table `gl_table`
--
ALTER TABLE `gl_table`
  ADD PRIMARY KEY (`gl_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst_master`
--
ALTER TABLE `gst_master`
  ADD PRIMARY KEY (`gst_id`);

--
-- Indexes for table `histcost_master`
--
ALTER TABLE `histcost_master`
  ADD PRIMARY KEY (`h_c_id`);

--
-- Indexes for table `invoice_master`
--
ALTER TABLE `invoice_master`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_product_master`
--
ALTER TABLE `invoice_product_master`
  ADD PRIMARY KEY (`i_p_id`);

--
-- Indexes for table `invoice_setting`
--
ALTER TABLE `invoice_setting`
  ADD PRIMARY KEY (`invoice_setting_id`);

--
-- Indexes for table `open_stock_table`
--
ALTER TABLE `open_stock_table`
  ADD PRIMARY KEY (`open_stock_id`);

--
-- Indexes for table `open_table`
--
ALTER TABLE `open_table`
  ADD PRIMARY KEY (`open_id`);

--
-- Indexes for table `payment_master`
--
ALTER TABLE `payment_master`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_purchase_master`
--
ALTER TABLE `payment_purchase_master`
  ADD PRIMARY KEY (`pay_pur_id`);

--
-- Indexes for table `payment_setting`
--
ALTER TABLE `payment_setting`
  ADD PRIMARY KEY (`payment_setting_id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_product_master`
--
ALTER TABLE `purchase_product_master`
  ADD PRIMARY KEY (`p_p_id`);

--
-- Indexes for table `quotation_master`
--
ALTER TABLE `quotation_master`
  ADD PRIMARY KEY (`quotation_id`);

--
-- Indexes for table `quotation_product_master`
--
ALTER TABLE `quotation_product_master`
  ADD PRIMARY KEY (`q_p_id`);

--
-- Indexes for table `quotation_setting`
--
ALTER TABLE `quotation_setting`
  ADD PRIMARY KEY (`quotation_setting_id`);

--
-- Indexes for table `receipt_invoice_master`
--
ALTER TABLE `receipt_invoice_master`
  ADD PRIMARY KEY (`r_i_id`);

--
-- Indexes for table `receipt_master`
--
ALTER TABLE `receipt_master`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `receipt_setting`
--
ALTER TABLE `receipt_setting`
  ADD PRIMARY KEY (`receipt_setting_id`);

--
-- Indexes for table `salesman_master`
--
ALTER TABLE `salesman_master`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `security_master`
--
ALTER TABLE `security_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_adjustment_master`
--
ALTER TABLE `stock_adjustment_master`
  ADD PRIMARY KEY (`adjustment_id`);

--
-- Indexes for table `stock_invoice_master`
--
ALTER TABLE `stock_invoice_master`
  ADD PRIMARY KEY (`s_i_id`);

--
-- Indexes for table `stock_purchase_master`
--
ALTER TABLE `stock_purchase_master`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `supplier_master`
--
ALTER TABLE `supplier_master`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ap_open`
--
ALTER TABLE `ap_open`
  MODIFY `ap_open_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `billing_master`
--
ALTER TABLE `billing_master`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configuration_master`
--
ALTER TABLE `configuration_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `currency_master`
--
ALTER TABLE `currency_master`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gl_table`
--
ALTER TABLE `gl_table`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gst_master`
--
ALTER TABLE `gst_master`
  MODIFY `gst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `histcost_master`
--
ALTER TABLE `histcost_master`
  MODIFY `h_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice_master`
--
ALTER TABLE `invoice_master`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_product_master`
--
ALTER TABLE `invoice_product_master`
  MODIFY `i_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_setting`
--
ALTER TABLE `invoice_setting`
  MODIFY `invoice_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `open_stock_table`
--
ALTER TABLE `open_stock_table`
  MODIFY `open_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `open_table`
--
ALTER TABLE `open_table`
  MODIFY `open_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_master`
--
ALTER TABLE `payment_master`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_purchase_master`
--
ALTER TABLE `payment_purchase_master`
  MODIFY `pay_pur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_setting`
--
ALTER TABLE `payment_setting`
  MODIFY `payment_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_product_master`
--
ALTER TABLE `purchase_product_master`
  MODIFY `p_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotation_master`
--
ALTER TABLE `quotation_master`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotation_product_master`
--
ALTER TABLE `quotation_product_master`
  MODIFY `q_p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quotation_setting`
--
ALTER TABLE `quotation_setting`
  MODIFY `quotation_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `receipt_invoice_master`
--
ALTER TABLE `receipt_invoice_master`
  MODIFY `r_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt_master`
--
ALTER TABLE `receipt_master`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_setting`
--
ALTER TABLE `receipt_setting`
  MODIFY `receipt_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `salesman_master`
--
ALTER TABLE `salesman_master`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `security_master`
--
ALTER TABLE `security_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_adjustment_master`
--
ALTER TABLE `stock_adjustment_master`
  MODIFY `adjustment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_invoice_master`
--
ALTER TABLE `stock_invoice_master`
  MODIFY `s_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `stock_purchase_master`
--
ALTER TABLE `stock_purchase_master`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_master`
--
ALTER TABLE `supplier_master`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
