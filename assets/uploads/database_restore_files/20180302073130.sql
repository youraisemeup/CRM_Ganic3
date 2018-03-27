#
# TABLE STRUCTURE FOR: accounts_payable
#

DROP TABLE IF EXISTS `accounts_payable`;

CREATE TABLE `accounts_payable` (
  `ap_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_ref_no` varchar(50) NOT NULL,
  `supplier_code` varchar(50) NOT NULL,
  `doc_date` date NOT NULL,
  `currency_type` varchar(50) NOT NULL,
  `total_amt` decimal(12,2) NOT NULL,
  `sign` varchar(1) DEFAULT NULL,
  `tran_type` varchar(50) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `offset` varchar(1) DEFAULT 'n',
  `settled` varchar(1) DEFAULT 'n',
  `purchase_id` int(11) NOT NULL,
  PRIMARY KEY (`ap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('1', 'CN100', 'supplier2', '2017-09-08', 'HKD', '0.00', '+', 'Open', '', 'o', 'y', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('2', 'CN9000', 'supplier2', '2017-08-09', 'HKD', '0.00', '+', 'Open', '', 'o', 'y', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('3', 'CN300', 'supplier2', '2017-05-06', 'HKD', '0.00', '+', 'Open', '', 'o', 'y', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('4', 'Inv555', 'supplier2', '2017-05-04', 'HKD', '0.00', '-', 'Open', '', 'o', 'y', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('5', 'Inv8888.89', 'supplier2', '2017-01-02', 'HKD', '8888.89', '-', 'Open', '', 'n', 'n', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('6', 'Inv6000.06', 'supplier2', '2017-04-02', 'HKD', '0.00', '-', 'Open', '', 'o', 'y', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('7', 'Paymen.66854', 'supplier2', '2017-12-18', 'HKD', '300.00', '+', 'PAY', '', 'o', 'y', '1');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('8', 'Paymen.66855', 'supplier2', '2017-12-18', 'HKD', '2844.94', '+', 'PAY', '', 'o', 'y', '2');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('9', '666', 'supplier2', '2017-03-06', 'HKD', '4455.00', '-', 'Open', '444', 'n', 'n', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('10', '2222', 'supplier2', '2017-01-02', 'HKD', '8000.00', '-', 'Open', '000', 'n', 'n', '0');
INSERT INTO `accounts_payable` (`ap_id`, `doc_ref_no`, `supplier_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `purchase_id`) VALUES ('11', '555', 'supplier2', '2017-08-05', 'HKD', '80000.00', '+', 'Open', '444', 'n', 'n', '0');


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
  `total_amt` decimal(12,2) NOT NULL,
  `sign` varchar(5) NOT NULL,
  `tran_type` varchar(15) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `offset` varchar(1) NOT NULL DEFAULT 'n',
  `settled` varchar(1) NOT NULL DEFAULT 'n',
  `invoice_id` int(11) NOT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('142', 'AUTOBILL.6', 'J0001', '2018-01-05', 'SGD', '4280.00', '+', 'AUTOBILL', '', 'n', 'n', '5');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('143', 'AUTOBILL.5', 'G0003', '2018-01-04', 'MYR', '9983.10', '+', 'AUTOBILL', '', 'n', 'n', '4');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('144', 'AUTOBILL.2', 'C0002', '2018-01-01', 'SGD', '1070.00', '+', 'AUTOBILL', '', 'n', 'n', '1');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('145', 'AUTOBILL.4', 'j0001eeer', '2018-01-03', 'USD', '1572.90', '+', 'AUTOBILL', '', 'n', 'n', '3');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('146', 'AUTOBILL.3', 'j0001eeer', '2018-01-02', 'USD', '786.45', '+', 'AUTOBILL', '', 'n', 'n', '2');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('147', 'AUTOBILL.2', 'C0002', '2018-01-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('148', 'AUTOBILL.3', 'j0001eeer', '2018-01-02', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('149', 'AUTOBILL.2', 'C0002', '2018-02-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('150', 'AUTOBILL.3', 'j0001eeer', '2018-02-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('151', 'AUTOBILL.7', 'K0004', '2018-04-04', 'MYR', '5324.32', '+', 'AUTOBILL', '', 'n', 'n', '6');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('152', 'AUTOBILL.2', 'C0002', '2018-03-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('153', 'AUTOBILL.4', 'j0001eeer', '2018-01-03', 'USD', '1572.90', '+', 'BLOCKBILL', '', 'n', 'n', '9');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('154', 'AUTOBILL.3', 'j0001eeer', '2018-03-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('155', 'AUTOBILL.2', 'C0002', '2018-04-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('156', 'AUTOBILL.3', 'j0001eeer', '2018-04-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('157', 'AUTOBILL.2', 'C0002', '2018-05-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('158', 'AUTOBILL.3', 'j0001eeer', '2018-05-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('159', 'AUTOBILL.5', 'G0003', '2018-01-04', 'MYR', '9983.10', '+', 'BLOCKBILL', '', 'n', 'n', '7');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('160', 'AUTOBILL.2', 'C0002', '2018-06-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('161', 'AUTOBILL.4', 'j0001eeer', '2018-04-01', 'USD', '1572.90', '+', 'BLOCKBILL', '', 'n', 'n', '9');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('162', 'AUTOBILL.3', 'j0001eeer', '2018-06-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('163', 'AUTOBILL.7', 'K0004', '2018-04-04', 'MYR', '5324.32', '+', 'BLOCKBILL', '', 'n', 'n', '11');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('164', 'AUTOBILL.2', 'C0002', '2018-07-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('165', 'AUTOBILL.3', 'j0001eeer', '2018-07-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('166', 'AUTOBILL.2', 'C0002', '2018-08-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('167', 'AUTOBILL.3', 'j0001eeer', '2018-08-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('168', 'AUTOBILL.2', 'C0002', '2018-09-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('169', 'AUTOBILL.4', 'j0001eeer', '2018-07-01', 'USD', '1572.90', '+', 'BLOCKBILL', '', 'n', 'n', '9');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('170', 'AUTOBILL.3', 'j0001eeer', '2018-09-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('171', 'AUTOBILL.7', 'K0004', '2018-07-01', 'MYR', '5324.32', '+', 'BLOCKBILL', '', 'n', 'n', '11');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('172', 'AUTOBILL.2', 'C0002', '2018-10-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('173', 'AUTOBILL.3', 'j0001eeer', '2018-10-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('174', 'AUTOBILL.2', 'C0002', '2018-11-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('175', 'AUTOBILL.3', 'j0001eeer', '2018-11-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('176', 'AUTOBILL.6', 'J0001', '2018-01-05', 'SGD', '4280.00', '+', 'BLOCKBILL', '', 'n', 'n', '6');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('177', 'AUTOBILL.5', 'G0003', '2018-07-01', 'MYR', '9983.10', '+', 'BLOCKBILL', '', 'n', 'n', '7');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('178', 'AUTOBILL.2', 'C0002', '2018-12-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('179', 'AUTOBILL.4', 'j0001eeer', '2018-10-01', 'USD', '1572.90', '+', 'BLOCKBILL', '', 'n', 'n', '9');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('180', 'AUTOBILL.3', 'j0001eeer', '2018-12-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('181', 'AUTOBILL.7', 'K0004', '2018-10-01', 'MYR', '5324.32', '+', 'BLOCKBILL', '', 'n', 'n', '11');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('182', 'AUTOBILL.2', 'C0002', '2019-01-01', 'SGD', '1070.00', '+', 'BLOCKBILL', '', 'n', 'n', '8');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('183', 'AUTOBILL.3', 'j0001eeer', '2019-01-01', 'USD', '786.45', '+', 'BLOCKBILL', '', 'n', 'n', '10');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('184', 'INV123.999250', '2018P10001', '2018-02-22', 'SGD', '856.00', '+', 'Sales', '', 'n', 'n', '4');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('185', 'inv1704', '2018P10001', '2017-11-18', 'SGD', '3000.00', '+', 'Open', 'opening', 'n', 'n', '0');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('186', 'inv1706', '2018P10001', '2017-12-06', 'SGD', '1000.00', '+', 'Open', 'opening', 'n', 'n', '0');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('187', 'cn0606', '2018P10001', '2017-11-06', 'SGD', '500.00', '-', 'Open', 'opening', 'n', 'n', '0');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('188', 'inv1705', '2018P10001', '2017-11-05', 'SGD', '2000.00', '+', 'Open', 'opening', 'n', 'n', '0');
INSERT INTO `accounts_receivable` (`ar_id`, `doc_ref_no`, `customer_code`, `doc_date`, `currency_type`, `total_amt`, `sign`, `tran_type`, `remarks`, `offset`, `settled`, `invoice_id`) VALUES ('189', '', '2018P10001', '0000-00-00', 'SGD', '0.00', '-', 'Open', '', 'n', 'n', '0');


#
# TABLE STRUCTURE FOR: ap_open
#

DROP TABLE IF EXISTS `ap_open`;

CREATE TABLE `ap_open` (
  `ap_open_id` int(11) NOT NULL AUTO_INCREMENT,
  `ap_open_tran_date` date DEFAULT NULL,
  `ap_open_doc_ref` varchar(255) DEFAULT NULL,
  `ap_open_remarks` varchar(255) DEFAULT NULL,
  `ap_open_amount` decimal(12,2) DEFAULT NULL,
  `ap_open_sign` varchar(1) DEFAULT NULL,
  `ap_open_status` varchar(1) DEFAULT 'C',
  `ap_customer_id` int(11) NOT NULL,
  PRIMARY KEY (`ap_open_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('1', '2017-01-02', 'Inv8888.89', '', '8888.89', '-', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('2', '2017-04-02', 'Inv6000.06', '', '6000.06', '-', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('3', '2017-05-04', 'Inv555', '', '555.00', '-', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('4', '2017-08-09', 'CN9000', '', '9000.00', '+', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('5', '2017-05-06', 'CN300', '', '300.00', '+', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('6', '2017-09-08', 'CN100', '', '100.00', '+', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('7', '2017-01-02', '2222', '000', '8000.00', '-', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('8', '2017-03-06', '666', '444', '4455.00', '-', 'P', '5');
INSERT INTO `ap_open` (`ap_open_id`, `ap_open_tran_date`, `ap_open_doc_ref`, `ap_open_remarks`, `ap_open_amount`, `ap_open_sign`, `ap_open_status`, `ap_customer_id`) VALUES ('9', '2017-08-05', '555', '444', '80000.00', '+', 'P', '5');


#
# TABLE STRUCTURE FOR: autobill_master
#

DROP TABLE IF EXISTS `autobill_master`;

CREATE TABLE `autobill_master` (
  `autobill_id` int(11) NOT NULL AUTO_INCREMENT,
  `autobill_ref_no` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contract_sum` decimal(8,2) NOT NULL,
  `less_discount` decimal(8,2) NOT NULL,
  `net_contract_amount` decimal(8,2) NOT NULL,
  `gst` decimal(8,2) NOT NULL,
  `total_inclusive_gst` decimal(8,2) NOT NULL,
  `bill_date` date NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_inclusive_gst_local` decimal(8,2) NOT NULL,
  `currency_amount` decimal(8,2) NOT NULL,
  `autobill_status` varchar(1) NOT NULL DEFAULT 'C',
  `contract_type` varchar(1) NOT NULL,
  `contract_id` int(11) NOT NULL,
  PRIMARY KEY (`autobill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `autobill_master` (`autobill_id`, `autobill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `total_inclusive_gst_local`, `currency_amount`, `autobill_status`, `contract_type`, `contract_id`) VALUES ('1', 'AUTOBILL.2', '2', '2', '1000.00', '0.00', '1000.00', '7.00', '1070.00', '2018-01-01', '2018-01-16', '2018-01-16', '2018-01-01', '2018-01-31', '1070.00', '1.00', 'P', 'M', '1');
INSERT INTO `autobill_master` (`autobill_id`, `autobill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `total_inclusive_gst_local`, `currency_amount`, `autobill_status`, `contract_type`, `contract_id`) VALUES ('2', 'AUTOBILL.3', '5', '2', '735.00', '0.00', '735.00', '7.00', '786.45', '2018-01-02', '2018-01-16', '2018-01-16', '2018-01-02', '2018-02-01', '1070.00', '0.74', 'P', 'M', '1');
INSERT INTO `autobill_master` (`autobill_id`, `autobill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `total_inclusive_gst_local`, `currency_amount`, `autobill_status`, `contract_type`, `contract_id`) VALUES ('3', 'AUTOBILL.4', '5', '2', '1470.00', '0.00', '1470.00', '7.00', '1572.90', '2018-01-03', '2018-01-16', '2018-01-16', '2018-01-03', '2018-04-02', '2140.00', '0.74', 'P', 'Q', '2');
INSERT INTO `autobill_master` (`autobill_id`, `autobill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `total_inclusive_gst_local`, `currency_amount`, `autobill_status`, `contract_type`, `contract_id`) VALUES ('4', 'AUTOBILL.5', '7', '2', '9330.00', '0.00', '9330.00', '7.00', '9983.10', '2018-01-04', '2018-01-16', '2018-01-16', '2018-01-04', '2018-07-03', '3210.00', '3.11', 'P', 'H', '4');
INSERT INTO `autobill_master` (`autobill_id`, `autobill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `total_inclusive_gst_local`, `currency_amount`, `autobill_status`, `contract_type`, `contract_id`) VALUES ('5', 'AUTOBILL.6', '1', '2', '4000.00', '0.00', '4000.00', '7.00', '4280.00', '2018-01-05', '2018-01-16', '2018-01-16', '2018-01-05', '2019-01-04', '4280.00', '1.00', 'P', 'Y', '5');
INSERT INTO `autobill_master` (`autobill_id`, `autobill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `total_inclusive_gst_local`, `currency_amount`, `autobill_status`, `contract_type`, `contract_id`) VALUES ('6', 'AUTOBILL.7', '6', '2', '6220.00', '20.00', '4976.00', '7.00', '5324.32', '2018-04-04', '2018-01-20', '2018-01-20', '2018-04-04', '2018-07-03', '1712.00', '3.11', 'P', 'Q', '2');


#
# TABLE STRUCTURE FOR: autobill_setting
#

DROP TABLE IF EXISTS `autobill_setting`;

CREATE TABLE `autobill_setting` (
  `autobill_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `autobill_text_prefix` varchar(50) NOT NULL,
  `autobill_number_prefix` varchar(50) NOT NULL,
  `autobill_type` varchar(50) NOT NULL,
  `autobill_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `autobill_footer_text` text NOT NULL,
  PRIMARY KEY (`autobill_setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('1', '1', 'TOPs', '100', 'autobill', 'autobill header', 'cash on delivery', 'training autobill', 'modification autobill', '', 'autobill notes');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('2', '2', 'AUTOBILL', '7', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('4', '3', '', '', '', '', '', '', '', '', '');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('5', '7', 'AUTOBILL', '100', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('6', '8', 'AUTOBILL', '100', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('7', '10', 'AUTOBILL', '100', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('8', '11', 'AUTOBILL', '100', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('9', '12', 'AUTOBILL', '100', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `autobill_setting` (`autobill_setting_id`, `user_id`, `autobill_text_prefix`, `autobill_number_prefix`, `autobill_type`, `autobill_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `autobill_footer_text`) VALUES ('10', '5', 'AUTOBILL', '100', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');


#
# TABLE STRUCTURE FOR: bank
#

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_date` date DEFAULT NULL,
  `bank_reference` varchar(255) DEFAULT NULL,
  `bank_remarks` varchar(255) DEFAULT NULL,
  `bank_debit` decimal(12,2) DEFAULT NULL,
  `bank_credit` decimal(12,2) DEFAULT NULL,
  `bank_balance` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('1', '2017-12-13', 'REC.66578', '', '14974.65', NULL, '14974.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('2', '2017-12-13', 'REC.66576', '', '4815.00', NULL, '19789.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('3', '2017-12-13', 'REC.66577', '', '988.00', NULL, '20777.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('4', '2017-12-13', 'Paymen.66828', '', NULL, '3699.50', '17078.15');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('5', '2017-12-13', 'Paymen.66829', '', NULL, '913.50', '16164.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('6', '2016-12-31', '1231', 'open1231', '3000.00', NULL, '19164.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('7', '2017-08-06', '0806', 'open0806', '6000.00', NULL, '25164.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('8', '2017-04-03', '0403', 'open0403', '3500.00', NULL, '28664.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('9', '2017-05-06', '0506', 'open0506', NULL, '5000.00', '23664.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('10', '2017-12-14', 'REC.66580', '', '111.00', NULL, '23775.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('11', '2017-12-14', 'REC.66581', '', '200.00', NULL, '23975.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('12', '2017-12-14', 'Paymen.66830', '', NULL, '90.00', '23885.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('13', '2017-05-03', 'tewert', 'e4e4ert', NULL, '300.00', '23585.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('14', '2017-05-02', 'rttrtyrt', 'erertert', '600.00', NULL, '24185.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('15', '2017-05-03', 'eeeee', 'tttttttttttttttt', '6000.00', NULL, '30185.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('16', '2017-04-05', 'eeewwwwwwwwww', 'hhfgh', NULL, '3000.00', '27185.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('17', '2017-12-14', 'REC.66582', '', '1000.00', NULL, '28185.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('18', '2017-12-14', 'REC.66583', '', '2000.00', NULL, '30185.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('19', '2017-12-14', 'REC.66584', '', '1200.00', NULL, '31385.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('20', '2017-12-14', 'REC.66585', '', '3000.00', NULL, '34385.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('21', '2017-12-14', 'REC.66586', '', '5988.00', NULL, '40373.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('22', '2017-12-14', 'REC.66587', '', '500.00', NULL, '40873.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('23', '2017-12-14', 'REC.66588', '', '500.00', NULL, '41373.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('24', '2017-12-14', 'REC.66594', '', '10000.00', NULL, '51373.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('25', '2017-12-14', 'REC.66593', '', '2000.00', NULL, '53373.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('26', '2017-12-14', 'REC.66595', '', '2000.00', NULL, '55373.65');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('27', '2017-12-15', 'Paymen.66831', '', NULL, '2098.04', '53275.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('28', '2017-12-15', 'Paymen.66832', '', NULL, '744.00', '52531.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('29', '2017-12-15', 'REC.66596', '', '3100.00', NULL, '55631.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('30', '2017-12-15', 'Paymen.66834', '', NULL, '662.00', '54969.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('31', '2017-12-15', 'Paymen.66833', '', NULL, '1100.00', '53869.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('32', '2017-12-15', 'Paymen.66835', '', NULL, '2000.00', '51869.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('33', '2017-12-15', 'REC.66598', '', '1000.00', NULL, '52869.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('34', '2017-12-15', 'REC.66602', '', '1000.00', NULL, '53869.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('35', '2017-12-15', 'REC.66603', '', '300.00', NULL, '54169.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('36', '2017-12-15', 'REC.66605', '', '6000.00', NULL, '60169.61');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('37', '2017-12-15', 'REC.66606', '', '889.89', NULL, '61059.50');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('38', '2017-12-15', 'REC.66607', '', '889.89', NULL, '61949.39');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('39', '2017-12-15', 'REC.66608', '', '6000.00', NULL, '67949.39');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('40', '2017-12-15', 'REC.66609', '', '889.89', NULL, '68839.28');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('41', '2017-12-15', 'REC.66610', '', '6000.00', NULL, '74839.28');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('42', '2017-12-15', 'REC.66611', '', '6000.00', NULL, '80839.28');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('43', '2017-12-15', 'REC.66612', '', '889.89', NULL, '81729.17');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('44', '2017-12-15', 'REC.66613', '', '6000.00', NULL, '87729.17');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('45', '2017-12-15', 'REC.66614', '', '1000.00', NULL, '88729.17');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('46', '2017-12-15', 'REC.66615', '', '889.89', NULL, '89619.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('47', '2017-12-15', 'REC.66616', '', '889.89', NULL, '90508.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('48', '2017-12-15', 'REC.66617', '', '6000.00', NULL, '96508.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('49', '2017-12-15', 'REC.66618', '', '2000.00', NULL, '98508.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('50', '2017-12-15', 'REC.66619', '', '889.89', NULL, '99398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('51', '2017-12-15', 'REC.66620', '', '6000.00', NULL, '105398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('52', '2017-12-15', 'REC.66621', '', '2000.00', NULL, '107398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('53', '2017-12-15', 'REC.66623', '', '1000.00', NULL, '108398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('54', '2017-12-15', 'REC.66622', '', '2000.00', NULL, '110398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('55', '2017-12-15', 'REC.66624', '', '1000.00', NULL, '111398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('56', '2017-12-15', 'REC.66626', '', '1000.00', NULL, '112398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('57', '2017-12-15', 'REC.66628', '', '1000.00', NULL, '113398.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('58', '2017-12-15', 'REC.66629', '', '200.00', NULL, '113598.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('59', '2017-12-15', 'Paymen.66838', '', NULL, '889.89', '112708.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('60', '2017-12-15', 'Paymen.66839', '', NULL, '6000.00', '106708.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('61', '2017-12-15', 'Paymen.66840', '', NULL, '2000.00', '104708.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('62', '2017-12-15', 'REC.66630', '', '1500.00', NULL, '106208.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('63', '2017-12-15', 'REC.66631', '', '1500.00', NULL, '107708.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('64', '2017-12-15', 'Paymen.66841', '', NULL, '1000.00', '106708.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('65', '2017-12-15', 'Paymen.66842', '', NULL, '500.00', '106208.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('66', '2017-12-15', 'Paymen.66843', '', NULL, '889.89', '105319.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('67', '2017-12-15', 'Paymen.66844', '', NULL, '6000.00', '99319.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('68', '2017-12-15', 'Paymen.66845', '', NULL, '2000.00', '97319.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('69', '2017-12-15', 'Paymen.66847', '', NULL, '350.00', '96969.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('70', '2017-12-15', 'Paymen.66846', '', NULL, '180.00', '96789.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('71', '2017-12-16', 'REC.66632', '', '888.09', NULL, '97677.15');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('72', '2017-12-16', 'REC.66633', '', '6000.00', NULL, '103677.15');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('73', '2017-12-16', 'REC.66634', '', '2000.00', NULL, '105677.15');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('74', '2017-12-16', 'REC.66635', '', '888.09', NULL, '106565.24');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('75', '2017-12-16', 'REC.66636', '', '6000.00', NULL, '112565.24');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('76', '2017-12-16', 'REC.66637', '', '2000.00', NULL, '114565.24');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('77', '2017-12-16', 'REC.66638', '', '888.09', NULL, '115453.33');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('78', '2017-12-16', 'REC.66639', '', '6000.00', NULL, '121453.33');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('79', '2017-12-16', 'REC.66640', '', '2000.00', NULL, '123453.33');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('80', '2017-12-16', 'REC.66641', '', '667.67', NULL, '124121.00');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('81', '2017-12-16', 'REC.66642', '', '4166.66', NULL, '128287.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('82', '2017-12-16', 'REC.66643', '', '2500.00', NULL, '130787.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('83', '2017-12-16', 'REC.66644', '', '2500.00', NULL, '133287.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('84', '2017-12-16', 'REC.66645', '', '1500.00', NULL, '134787.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('85', '2017-12-15', 'Paymen.66848', 'ertert', NULL, '120.00', '134667.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('86', '2017-12-16', 'Paymen.66849', '', NULL, '220.00', '134447.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('87', '2017-12-16', 'Paymen.66849', '', NULL, '220.00', '134227.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('88', '2017-12-16', 'REC.66647', '', '1020.00', NULL, '135247.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('89', '2017-12-16', 'REC.66646', '', '1000.00', NULL, '136247.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('90', '2017-12-16', 'Paymen.66851', '', NULL, '280.00', '135967.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('91', '2017-12-16', 'Paymen.66851', '', NULL, '280.00', '135687.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('92', '2017-12-16', 'Paymen.66851', '', NULL, '280.00', '135407.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('93', '2017-12-16', 'Paymen.66851', '', NULL, '280.00', '135127.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('94', '2017-12-16', 'Paymen.66851', '', NULL, '280.00', '134847.66');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('95', '2017-12-16', 'REC.66648', '', '888.09', NULL, '135735.75');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('96', '2017-12-16', 'REC.66649', '', '888.09', NULL, '136623.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('97', '2017-12-16', 'REC.66650', '', '6000.00', NULL, '142623.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('98', '2017-12-16', 'REC.66651', '', '2000.00', NULL, '144623.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('99', '2017-12-16', 'Paymen.66850', '', NULL, '7300.00', '137323.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('100', '2017-12-16', 'Paymen.66853', '', NULL, '50.00', '137273.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('101', '2017-12-16', 'Paymen.66852', '', NULL, '30.00', '137243.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('102', '2017-12-16', 'REC.66652', '', '1000.00', NULL, '138243.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('103', '2017-12-17', 'REC.66653', '', '2800.00', NULL, '141043.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('104', '2017-12-17', 'REC.66654', '', '7898.00', NULL, '148941.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('105', '2017-12-17', 'REC.66655', '', '-2000.00', NULL, '146941.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('106', '2017-12-17', 'REC.66656', '', '400.00', NULL, '147341.84');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('107', '2017-12-17', 'REC.66657', '', '88.55', NULL, '147430.39');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('108', '2017-12-17', 'REC.66658', '', '0.00', NULL, '147430.39');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('109', '2017-12-17', 'REC.66664', '', '1111.67', NULL, '148542.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('110', '2017-12-17', 'REC.66665', '', '0.00', NULL, '148542.06');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('111', '2017-12-17', 'REC.66666', '', '2554.89', NULL, '151096.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('112', '2017-12-17', 'REC.66668', '', '7012.00', NULL, '158108.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('113', '2017-12-17', 'REC.66669', '', '500.00', NULL, '158608.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('114', '2017-12-17', 'REC.66670', '', '3500.00', NULL, '162108.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('115', '2017-12-17', 'REC.66671', '', '0.00', NULL, '162108.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('116', '2017-12-17', 'REC.66672', '', '3100.00', NULL, '165208.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('117', '2017-12-18', 'Paymen.66854', '', NULL, '300.00', '164908.95');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('118', '2017-12-18', 'Paymen.66855', '', NULL, '2844.94', '162064.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('119', '2017-12-20', 'Paymen.66863', NULL, NULL, '5000.00', '157064.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('120', '2017-12-20', 'Paymen.66863', NULL, NULL, '100.00', '156964.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('121', '2017-12-20', 'Paymen.66863', NULL, NULL, '200.00', '156764.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('122', '2017-12-20', 'Paymen.66863', NULL, NULL, '200.00', '156564.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('123', '2017-12-20', 'Paymen.66863', NULL, NULL, '100.00', '156464.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('124', '2017-12-20', 'Paymen.66863', NULL, NULL, '100.00', '156364.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('125', '2017-12-20', 'Paymen.66863', NULL, NULL, '2323.00', '154041.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('126', '2017-12-20', 'Paymen.66863', NULL, NULL, '2323.00', '151718.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('127', '2017-12-20', 'Paymen.66863', NULL, NULL, '2323.00', '149395.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('128', '2017-12-20', 'Paymen.1', NULL, NULL, '300.00', '149095.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('129', '2017-12-20', 'Paymen.66828', NULL, NULL, '300.00', '148795.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('130', '2017-12-20', 'Paymen.66829', NULL, NULL, '100.00', '148695.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('131', '2017-12-20', 'Paymen.66830', NULL, NULL, '200.00', '148495.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('132', '2017-12-20', 'Paymen.66831', NULL, NULL, '500.00', '147995.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('133', '2017-12-20', 'Paymen.66836', NULL, NULL, '7777.00', '140218.01');
INSERT INTO `bank` (`bank_id`, `bank_date`, `bank_reference`, `bank_remarks`, `bank_debit`, `bank_credit`, `bank_balance`) VALUES ('134', '2017-12-20', 'Paymen.66834', NULL, NULL, '120.00', '140098.01');


#
# TABLE STRUCTURE FOR: bank_adjustment
#

DROP TABLE IF EXISTS `bank_adjustment`;

CREATE TABLE `bank_adjustment` (
  `bank_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_ad_date` date DEFAULT NULL,
  `bank_ad_ref` varchar(255) DEFAULT NULL,
  `bank_ad_remarks` varchar(255) DEFAULT NULL,
  `bank_ad_amt` decimal(12,2) DEFAULT NULL,
  `bank_ad_sign` varchar(1) NOT NULL,
  `bank_ad_status` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`bank_ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('1', '2016-12-31', '1231', 'open1231', '3000.00', '+', 'P');
INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('2', '2017-05-06', '0506', 'open0506', '5000.00', '-', 'P');
INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('3', '2017-08-06', '0806', 'open0806', '6000.00', '+', 'P');
INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('4', '2017-04-03', '0403', 'open0403', '3500.00', '+', 'P');
INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('5', '2017-05-02', 'rttrtyrt', 'erertert', '600.00', '+', 'P');
INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('6', '2017-05-03', 'tewert', 'e4e4ert', '300.00', '-', 'P');
INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('7', '2017-05-03', 'eeeee', 'tttttttttttttttt', '6000.00', '+', 'P');
INSERT INTO `bank_adjustment` (`bank_ad_id`, `bank_ad_date`, `bank_ad_ref`, `bank_ad_remarks`, `bank_ad_amt`, `bank_ad_sign`, `bank_ad_status`) VALUES ('8', '2017-04-05', 'eeewwwwwwwwww', 'hhfgh', '3000.00', '-', 'P');


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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('1', 'TP CONTRACT', 'TRADPAC MAINTENANCE CONTRACT', 'SET', '1200', '19', 'NO', 'Service', '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('2', 'PAY MC', 'PAY MAINTENANCE CONTRACT', 'SET', '800', '19', 'NO', 'Service', '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('3', 'PAYROLL ', 'STANDARD PAYWIN PLUS PACKAGE', 'SET', '4500.50', '19', 'YES', 'Product', '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('4', 'TRADPAC.IAF', 'STANDARD TRADPAC.IAF PKG', 'SET', '$4650', '19', 'YES', 'Product', '1');


#
# TABLE STRUCTURE FOR: block_backup_filename
#

DROP TABLE IF EXISTS `block_backup_filename`;

CREATE TABLE `block_backup_filename` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `backup_date` date NOT NULL,
  `blockbilling_month` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: blockbill_master
#

DROP TABLE IF EXISTS `blockbill_master`;

CREATE TABLE `blockbill_master` (
  `blockbill_id` int(11) NOT NULL AUTO_INCREMENT,
  `blockbill_ref_no` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contract_sum` decimal(8,2) NOT NULL,
  `less_discount` decimal(8,2) NOT NULL,
  `net_contract_amount` decimal(8,2) NOT NULL,
  `gst` decimal(8,2) NOT NULL,
  `total_inclusive_gst` decimal(8,2) NOT NULL,
  `bill_date` date NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `next_bill_date` date NOT NULL,
  `total_inclusive_gst_local` decimal(8,2) NOT NULL,
  `currency_amount` decimal(8,2) NOT NULL,
  `bill_state` varchar(50) NOT NULL,
  `contract_type` varchar(1) NOT NULL,
  `contract_id` int(11) NOT NULL,
  PRIMARY KEY (`blockbill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('6', 'AUTOBILL.6', '1', '2', '4000.00', '0.00', '4000.00', '7.00', '4280.00', '2019-01-01', '2018-01-16', '2018-01-16', '2019-01-05', '2020-01-04', '2020-01-05', '4280.00', '1.00', '2019-01', 'Y', '5');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('7', 'AUTOBILL.5', '7', '2', '9330.00', '0.00', '9330.00', '7.00', '9983.10', '2019-01-01', '2018-01-16', '2018-01-16', '2019-01-04', '2019-07-03', '2019-07-04', '3210.00', '3.11', '2019-01', 'H', '4');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('8', 'AUTOBILL.2', '2', '2', '1000.00', '0.00', '1000.00', '7.00', '1070.00', '2019-02-01', '2018-01-16', '2018-01-16', '2019-02-01', '2019-02-28', '2019-03-01', '1070.00', '1.00', '2019-02', 'M', '1');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('9', 'AUTOBILL.4', '5', '2', '1470.00', '0.00', '1470.00', '7.00', '1572.90', '2019-01-01', '2018-01-16', '2018-01-16', '2019-01-03', '2019-04-02', '2019-04-03', '2140.00', '0.74', '2019-01', 'Q', '2');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('10', 'AUTOBILL.3', '5', '2', '735.00', '0.00', '735.00', '7.00', '786.45', '2019-02-01', '2018-01-16', '2018-01-16', '2019-02-02', '2019-03-01', '2019-03-02', '1070.00', '0.74', '2019-02', 'M', '1');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('11', 'AUTOBILL.7', '6', '2', '6220.00', '20.00', '4976.00', '7.00', '5324.32', '2019-01-01', '2018-01-20', '2018-01-20', '2019-01-04', '2019-04-03', '2019-04-04', '1712.00', '3.11', '2019-01', 'Q', '2');


#
# TABLE STRUCTURE FOR: chart_of_account
#

DROP TABLE IF EXISTS `chart_of_account`;

CREATE TABLE `chart_of_account` (
  `coa_id` int(11) NOT NULL AUTO_INCREMENT,
  `coa_prefix` varchar(2) DEFAULT NULL,
  `coa_suffix` varchar(10) DEFAULT NULL,
  `coa_description` varchar(255) DEFAULT NULL,
  `coa_state` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: chart_of_account_prefix
#

DROP TABLE IF EXISTS `chart_of_account_prefix`;

CREATE TABLE `chart_of_account_prefix` (
  `coa_pre_id` int(11) NOT NULL AUTO_INCREMENT,
  `coa_pre_character` varchar(255) DEFAULT NULL,
  `coa_pre_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`coa_pre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('1', 'FA', 'Fixed Assets');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('2', 'IA', 'Intangible Assets');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('3', 'CA', 'Current Assets');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('4', 'CL', 'Current Liabilities');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('5', 'DO', 'Dividend');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('6', 'PC', 'Share Capital');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('7', 'PD', 'Provision For Depreciation');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('8', 'RP', 'Retained Profits');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('9', 'CR', 'Capital Reserves');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('10', 'MT', 'Medium-Term Liabilities');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('11', 'LT', 'Long-Term Liabilities');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('12', 'SO', 'Sales');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('13', 'CO', 'Cost of Sales');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('14', 'IO', 'Sundry & Misc Income');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('15', 'EO', 'All Expenses');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('16', 'TO', 'All Tax Items');
INSERT INTO `chart_of_account_prefix` (`coa_pre_id`, `coa_pre_character`, `coa_pre_description`) VALUES ('17', 'XO', 'Extraordinary Items');


#
# TABLE STRUCTURE FOR: company_profile
#

DROP TABLE IF EXISTS `company_profile`;

CREATE TABLE `company_profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `gst_reg_no` varchar(100) NOT NULL,
  `uen_no` varchar(100) NOT NULL,
  `company_address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `default_currency` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `company_profile` (`profile_id`, `company_name`, `gst_reg_no`, `uen_no`, `company_address`, `phone`, `fax`, `company_logo`, `default_currency`, `company_email`) VALUES ('1', 'TOPFORM BUSINESS SYSTEMS PTE LTD', 'yy', 'uuuuuu', 'BLK 71, UBI ROAD 1 , #08-35 , SINGAPORE 408732', '+65 7777888999', '(+65)67024812', 'logo.png', 'AFN', 'test@test.com');


#
# TABLE STRUCTURE FOR: configuration_master
#

DROP TABLE IF EXISTS `configuration_master`;

CREATE TABLE `configuration_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `configuration_master` (`id`, `conf_name`) VALUES ('1', 'configuration A');
INSERT INTO `configuration_master` (`id`, `conf_name`) VALUES ('2', 'configuration B');
INSERT INTO `configuration_master` (`id`, `conf_name`) VALUES ('3', 'configuration C');
INSERT INTO `configuration_master` (`id`, `conf_name`) VALUES ('4', 'configuration D');
INSERT INTO `configuration_master` (`id`, `conf_name`) VALUES ('5', 'configuration E');
INSERT INTO `configuration_master` (`id`, `conf_name`) VALUES ('6', 'configuration admin');


#
# TABLE STRUCTURE FOR: contract_master
#

DROP TABLE IF EXISTS `contract_master`;

CREATE TABLE `contract_master` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_code` varchar(100) NOT NULL,
  `contract_description` varchar(509) NOT NULL,
  `contract_type` varchar(25) DEFAULT NULL,
  `contract_amount` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`contract_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `contract_master` (`contract_id`, `contract_code`, `contract_description`, `contract_type`, `contract_amount`) VALUES ('1', 'MAS', 'Monthy Accounting Service', 'M', '1000');
INSERT INTO `contract_master` (`contract_id`, `contract_code`, `contract_description`, `contract_type`, `contract_amount`) VALUES ('2', 'QAS', 'Quarterly Accounting Service', 'Q', '2000');
INSERT INTO `contract_master` (`contract_id`, `contract_code`, `contract_description`, `contract_type`, `contract_amount`) VALUES ('4', 'HAS', 'Half yearly Accounting service', 'H', '3000');
INSERT INTO `contract_master` (`contract_id`, `contract_code`, `contract_description`, `contract_type`, `contract_amount`) VALUES ('5', 'YAS', 'Yearly Accounting Service', 'Y', '4000');


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

INSERT INTO `currency` (`iso`, `name`) VALUES ('KRW', '(South) Korean Won');
INSERT INTO `currency` (`iso`, `name`) VALUES ('AFA', 'Afghanistan Afghani');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('1', 'SGD', '1', 'Singapore Dollar');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('2', 'INR', '47.14', 'Indian Rupee');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('3', 'AUD', '0.929', ' Australian Dollar');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('4', 'HKD', '5.73', ' Hong Kong Dollar');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('6', 'USD', '0.735', 'US Dollar ');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('7', 'MYR', '3.11', 'Malaysian Ringgit ');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('8', 'BBD', '0.029', 'Barbados Dollar ');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('9', 'IDR', '194.572', 'Indonesian Rupiah ');
INSERT INTO `currency_master` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('10', 'won', '900', 'chinese won');


#
# TABLE STRUCTURE FOR: customer_master
#

DROP TABLE IF EXISTS `customer_master`;

CREATE TABLE `customer_master` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `flag` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`customer_id`),
  KEY `country_id` (`country_id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `customer_master` (`customer_id`, `customer_code`, `customer_name`, `customer_bldg_number`, `customer_street_name`, `customer_postal_code`, `customer_phone`, `customer_fax`, `customer_email`, `customer_contact_person`, `customer_credit_limit`, `customer_credit_term_days`, `currency_id`, `customer_uen_no`, `customer_gst_number`, `customer_rating`, `country_id`, `status`, `flag`) VALUES ('2', '2018P10001', 'PAPRIKA  CUMIN PTE LTD', '30 VICTORIA STREET', '#01-15, CHIJMES', '187996', '68960864', '', 'VE.TOPFORM@GMAIL.COM', 'MS KATHEREEN', '0.00', '0', '1', '', '', '0.0', '7', NULL, 'C');
INSERT INTO `customer_master` (`customer_id`, `customer_code`, `customer_name`, `customer_bldg_number`, `customer_street_name`, `customer_postal_code`, `customer_phone`, `customer_fax`, `customer_email`, `customer_contact_person`, `customer_credit_limit`, `customer_credit_term_days`, `currency_id`, `customer_uen_no`, `customer_gst_number`, `customer_rating`, `country_id`, `status`, `flag`) VALUES ('3', '2018C10002', 'CJG ASIA PTE LTD', '1', 'Genting Link #05-01', '349518', '97889108', '', '', 'Ms Josephine ', '0.00', '0', '1', '', '', '0.0', '7', NULL, 'C');


#
# TABLE STRUCTURE FOR: gl_table
#

DROP TABLE IF EXISTS `gl_table`;

CREATE TABLE `gl_table` (
  `gl_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_date` date NOT NULL,
  `doc_ref_no` varchar(50) NOT NULL,
  `customer_code` varchar(50) NOT NULL,
  `gst` decimal(8,2) NOT NULL,
  `currency_amount` decimal(8,2) NOT NULL,
  `lump_sum_discount_price` decimal(8,2) NOT NULL,
  `total_amt` decimal(8,2) NOT NULL,
  `tran_type` varchar(10) NOT NULL,
  PRIMARY KEY (`gl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('144', '2018-01-02', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'AUTOBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('143', '2018-01-03', 'AUTOBILL.4', 'j0001eeer', '7.00', '0.74', '1470.00', '1572.90', 'AUTOBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('142', '2018-01-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'AUTOBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('141', '2018-01-04', 'AUTOBILL.5', 'G0003', '7.00', '3.11', '9330.00', '9983.10', 'AUTOBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('140', '2018-01-05', 'AUTOBILL.6', 'J0001', '7.00', '1.00', '4000.00', '4280.00', 'AUTOBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('145', '2018-01-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('146', '2018-01-02', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('147', '2018-02-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('148', '2018-02-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('149', '2018-04-04', 'AUTOBILL.7', 'K0004', '7.00', '3.11', '4976.00', '5324.32', 'AUTOBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('150', '2018-03-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('151', '2018-01-03', 'AUTOBILL.4', 'j0001eeer', '7.00', '0.74', '1470.00', '1572.90', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('152', '2018-03-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('153', '2018-04-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('154', '2018-04-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('155', '2018-05-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('156', '2018-05-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('157', '2018-01-04', 'AUTOBILL.5', 'G0003', '7.00', '3.11', '9330.00', '9983.10', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('158', '2018-06-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('159', '2018-04-01', 'AUTOBILL.4', 'j0001eeer', '7.00', '0.74', '1470.00', '1572.90', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('160', '2018-06-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('161', '2018-04-04', 'AUTOBILL.7', 'K0004', '7.00', '3.11', '4976.00', '5324.32', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('162', '2018-07-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('163', '2018-07-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('164', '2018-08-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('165', '2018-08-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('166', '2018-09-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('167', '2018-07-01', 'AUTOBILL.4', 'j0001eeer', '7.00', '0.74', '1470.00', '1572.90', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('168', '2018-09-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('169', '2018-07-01', 'AUTOBILL.7', 'K0004', '7.00', '3.11', '4976.00', '5324.32', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('170', '2018-10-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('171', '2018-10-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('172', '2018-11-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('173', '2018-11-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('174', '2018-01-05', 'AUTOBILL.6', 'J0001', '7.00', '1.00', '4000.00', '4280.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('175', '2018-07-01', 'AUTOBILL.5', 'G0003', '7.00', '3.11', '9330.00', '9983.10', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('176', '2018-12-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('177', '2018-10-01', 'AUTOBILL.4', 'j0001eeer', '7.00', '0.74', '1470.00', '1572.90', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('178', '2018-12-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('179', '2018-10-01', 'AUTOBILL.7', 'K0004', '7.00', '3.11', '4976.00', '5324.32', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('180', '2019-01-01', 'AUTOBILL.2', 'C0002', '7.00', '1.00', '1000.00', '1070.00', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('181', '2019-01-01', 'AUTOBILL.3', 'j0001eeer', '7.00', '0.74', '735.00', '786.45', 'BLOCKBILL');
INSERT INTO `gl_table` (`gl_id`, `doc_date`, `doc_ref_no`, `customer_code`, `gst`, `currency_amount`, `lump_sum_discount_price`, `total_amt`, `tran_type`) VALUES ('182', '2018-02-22', 'INV123.999250', '2018P10001', '7.00', '1.00', '800.00', '856.00', 'INV');


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
# TABLE STRUCTURE FOR: histcost_master
#

DROP TABLE IF EXISTS `histcost_master`;

CREATE TABLE `histcost_master` (
  `h_c_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `unit_price_sgd` decimal(8,2) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amt_sgd` decimal(8,2) DEFAULT NULL,
  `purchase_id` int(11) NOT NULL,
  `tranaction_date` date NOT NULL,
  PRIMARY KEY (`h_c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('1', '5', '23.30', '30', '699.00', '2', '2017-05-02');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('2', '12', '8.28', '50', '414.00', '4', '2017-04-01');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('3', '5', '60.00', '10', '600.00', '1', '2017-02-01');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('4', '5', '23.76', '30', '712.80', '3', '2017-08-06');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('5', '12', '62.08', '20', '1241.60', '1', '2017-04-02');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('6', '5', '168.00', '30', '5040.00', '2', '2017-06-03');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('7', '12', '102.96', '10', '1029.60', '3', '2017-05-02');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('8', '12', '360.00', '10', '3600.00', '5', '2017-05-02');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('9', '6', '80.80', '10', '808.00', '1', '2017-05-02');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('10', '12', '60.80', '10', '608.00', '1', '2017-05-03');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('11', '12', '319.20', '10', '3192.00', '2', '2017-03-06');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('12', '12', '18.80', '10', '188.00', '1', '2017-05-02');
INSERT INTO `histcost_master` (`h_c_id`, `product_id`, `unit_price_sgd`, `quantity`, `amt_sgd`, `purchase_id`, `tranaction_date`) VALUES ('13', '12', '35.20', '10', '352.00', '1', '2017-08-05');


#
# TABLE STRUCTURE FOR: invoice_gst_table
#

DROP TABLE IF EXISTS `invoice_gst_table`;

CREATE TABLE `invoice_gst_table` (
  `i_g_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_g_date` date NOT NULL,
  `i_g_doc_ref` varchar(255) NOT NULL,
  `i_g_code` varchar(255) NOT NULL,
  `i_g_description` varchar(255) NOT NULL,
  `i_g_cat` varchar(255) NOT NULL,
  `i_g_lump_sum_discount_price` decimal(8,2) NOT NULL,
  `i_g_gst_amount` decimal(8,2) NOT NULL,
  `i_g_ex_rate` decimal(8,2) NOT NULL,
  `i_g_lump_sum_discount_price_local` decimal(8,2) NOT NULL,
  `i_g_gst_amount_local` decimal(8,2) NOT NULL,
  `i_g_invoice_id` int(11) NOT NULL,
  `i_g_mark` varchar(50) NOT NULL DEFAULT 'INV',
  `i_g_customer_id` int(11) NOT NULL,
  PRIMARY KEY (`i_g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;

INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('142', '2018-01-02', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'AUTOBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('141', '2018-01-03', 'AUTOBILL.4', 'QAS', 'Quarterly Accounting Service', 'SR', '1470.00', '102.90', '0.74', '1986.49', '139.05', '2', 'AUTOBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('140', '2018-01-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'AUTOBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('139', '2018-01-04', 'AUTOBILL.5', 'HAS', 'Half yearly Accounting service', 'SR', '9330.00', '653.10', '3.11', '3000.00', '210.00', '4', 'AUTOBILL', '7');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('138', '2018-01-05', 'AUTOBILL.6', 'YAS', 'Yearly Accounting Service', 'SR', '4000.00', '280.00', '1.00', '4000.00', '280.00', '5', 'AUTOBILL', '1');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('143', '2018-01-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('144', '2018-01-02', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('145', '2018-02-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('146', '2018-02-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('147', '2018-04-04', 'AUTOBILL.7', 'QAS', 'Quarterly Accounting Service', 'SR', '4976.00', '348.32', '3.11', '1600.00', '112.00', '2', 'AUTOBILL', '6');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('148', '2018-03-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('149', '2018-01-03', 'AUTOBILL.4', 'QAS', 'Quarterly Accounting Service', 'SR', '1470.00', '102.90', '0.74', '1986.49', '139.05', '2', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('150', '2018-03-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('151', '2018-04-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('152', '2018-04-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('153', '2018-05-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('154', '2018-05-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('155', '2018-01-04', 'AUTOBILL.5', 'HAS', 'Half yearly Accounting service', 'SR', '9330.00', '653.10', '3.11', '3000.00', '210.00', '4', 'BLOCKBILL', '7');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('156', '2018-06-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('157', '2018-04-01', 'AUTOBILL.4', 'QAS', 'Quarterly Accounting Service', 'SR', '1470.00', '102.90', '0.74', '1986.49', '139.05', '2', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('158', '2018-06-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('159', '2018-04-04', 'AUTOBILL.7', 'QAS', 'Quarterly Accounting Service', 'SR', '4976.00', '348.32', '3.11', '1600.00', '112.00', '2', 'BLOCKBILL', '6');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('160', '2018-07-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('161', '2018-07-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('162', '2018-08-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('163', '2018-08-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('164', '2018-09-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('165', '2018-07-01', 'AUTOBILL.4', 'QAS', 'Quarterly Accounting Service', 'SR', '1470.00', '102.90', '0.74', '1986.49', '139.05', '2', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('166', '2018-09-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('167', '2018-07-01', 'AUTOBILL.7', 'QAS', 'Quarterly Accounting Service', 'SR', '4976.00', '348.32', '3.11', '1600.00', '112.00', '2', 'BLOCKBILL', '6');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('168', '2018-10-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('169', '2018-10-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('170', '2018-11-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('171', '2018-11-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('172', '2018-01-05', 'AUTOBILL.6', 'YAS', 'Yearly Accounting Service', 'SR', '4000.00', '280.00', '1.00', '4000.00', '280.00', '5', 'BLOCKBILL', '1');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('173', '2018-07-01', 'AUTOBILL.5', 'HAS', 'Half yearly Accounting service', 'SR', '9330.00', '653.10', '3.11', '3000.00', '210.00', '4', 'BLOCKBILL', '7');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('174', '2018-12-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('175', '2018-10-01', 'AUTOBILL.4', 'QAS', 'Quarterly Accounting Service', 'SR', '1470.00', '102.90', '0.74', '1986.49', '139.05', '2', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('176', '2018-12-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('177', '2018-10-01', 'AUTOBILL.7', 'QAS', 'Quarterly Accounting Service', 'SR', '4976.00', '348.32', '3.11', '1600.00', '112.00', '2', 'BLOCKBILL', '6');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('178', '2019-01-01', 'AUTOBILL.2', 'MAS', 'Monthy Accounting Service', 'SR', '1000.00', '70.00', '1.00', '1000.00', '70.00', '1', 'BLOCKBILL', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('179', '2019-01-01', 'AUTOBILL.3', 'MAS', 'Monthy Accounting Service', 'SR', '735.00', '51.45', '0.74', '993.24', '69.53', '1', 'BLOCKBILL', '5');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('180', '2018-01-24', 'INV123.999246', 'HP001', 'HP PRINTER - MODEL X', 'tx', '350.00', '24.50', '1.00', '350.00', '24.50', '1', 'INV', '2');
INSERT INTO `invoice_gst_table` (`i_g_id`, `i_g_date`, `i_g_doc_ref`, `i_g_code`, `i_g_description`, `i_g_cat`, `i_g_lump_sum_discount_price`, `i_g_gst_amount`, `i_g_ex_rate`, `i_g_lump_sum_discount_price_local`, `i_g_gst_amount_local`, `i_g_invoice_id`, `i_g_mark`, `i_g_customer_id`) VALUES ('181', '2018-03-01', 'INV123.999251', 'PAYROLL ', 'STANDARD PAYWIN PLUS PACKAGE', 'SR', '0.00', '0.00', '0.00', '40504.50', '2835.32', '5', 'INV', '3');


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
  `opening_balance` decimal(8,2) DEFAULT NULL,
  `full_amount` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `invoice_master` (`invoice_id`, `invoice_ref_no`, `customer_id`, `salesman_id`, `invoice_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`, `invoice_status`, `created_on`, `modified_on`, `reject_msg`, `receipt`, `opening_balance`, `full_amount`) VALUES ('1', 'INV123.999247', '1', '1', '', '2', '800.00', '0.00', '800.00', '7.00', '940.00', '0.00', '940.00', 'C.O.D.', 'Topform Trg Ctr', NULL, NULL, 'All overdue accounts is chargeable for interest @ 1% per mensum', 'C', '2018-01-25', '2018-01-25', NULL, '0', NULL, NULL);
INSERT INTO `invoice_master` (`invoice_id`, `invoice_ref_no`, `customer_id`, `salesman_id`, `invoice_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`, `invoice_status`, `created_on`, `modified_on`, `reject_msg`, `receipt`, `opening_balance`, `full_amount`) VALUES ('2', 'INV123.999248', '1', '1', '', '2', '0.00', '0.00', '0.00', '7.00', '0.00', '0.00', '0.00', 'C.O.D.', 'Topform Trg Ctr', NULL, NULL, 'All overdue accounts is chargeable for interest @ 1% per mensum', 'C', '2018-01-25', '2018-01-25', NULL, '0', NULL, NULL);
INSERT INTO `invoice_master` (`invoice_id`, `invoice_ref_no`, `customer_id`, `salesman_id`, `invoice_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`, `invoice_status`, `created_on`, `modified_on`, `reject_msg`, `receipt`, `opening_balance`, `full_amount`) VALUES ('3', 'INV123.999249', '1', '1', '', '2', '2000.00', '0.00', '2000.00', '7.00', '2140.00', '0.00', '2140.00', 'C.O.D.', 'Topform Trg Ctr', NULL, NULL, 'All overdue accounts is chargeable for interest @ 1% per mensum', 'C', '2018-01-25', '2018-01-25', NULL, '0', NULL, NULL);
INSERT INTO `invoice_master` (`invoice_id`, `invoice_ref_no`, `customer_id`, `salesman_id`, `invoice_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`, `invoice_status`, `created_on`, `modified_on`, `reject_msg`, `receipt`, `opening_balance`, `full_amount`) VALUES ('4', 'INV123.999250', '2', '1', '', '2', '800.00', '0.00', '800.00', '7.00', '856.00', '1.00', '856.00', 'C.O.D.', 'Topform Trg Ctr', NULL, NULL, 'All overdue accounts is chargeable for interest @ 1% per mensum', 'P', '2018-02-22', '2018-02-22', NULL, '0', NULL, NULL);
INSERT INTO `invoice_master` (`invoice_id`, `invoice_ref_no`, `customer_id`, `salesman_id`, `invoice_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`, `invoice_status`, `created_on`, `modified_on`, `reject_msg`, `receipt`, `opening_balance`, `full_amount`) VALUES ('5', 'INV123.999251', '3', '1', '', '2', '40504.50', '0.00', '40504.50', '7.00', '43339.82', '0.00', '43339.82', 'C.O.D.', 'Topform Trg Ctr', NULL, NULL, 'All overdue accounts is chargeable for interest @ 1% per mensum', 'C', '2018-03-01', '2018-03-01', NULL, '0', NULL, NULL);


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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('1', '1', '2', '1', '0.00', '800.00', '800.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('2', '1', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('3', '2', '2', '1', '0.00', '800.00', '800.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('4', '2', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('5', '3', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('6', '3', '2', '1', '0.00', '800.00', '800.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('7', '4', '2', '1', '0.00', '800.00', '800.00', '19', '2018-02-22', '2018-02-22');
INSERT INTO `invoice_product_master` (`i_p_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('8', '5', '3', '10', '10.00', '4500.50', '40504.50', '19', '2018-03-01', '2018-03-01');


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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('1', '1', 'TOPs', '19013', 'invoice', 'invoice header', 'cash on delivery', 'training invoice', 'modification invoice', '', 'invoice notes');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('2', '2', 'INV123', '999251', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('4', '3', '', '', '', '', '', '', '', '', '');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('5', '7', 'INV', '999194', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('6', '8', 'INV', '999195', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('7', '10', 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('8', '11', 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('9', '12', 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');
INSERT INTO `invoice_setting` (`invoice_setting_id`, `user_id`, `invoice_text_prefix`, `invoice_number_prefix`, `invoice_type`, `invoice_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `invoice_footer_text`) VALUES ('10', '5', 'INV', '999193', '', '', 'C.O.D.', 'Topform Trg Ctr', '', '', 'All overdue accounts is chargeable for interest @ 1% per mensum');


#
# TABLE STRUCTURE FOR: m_create
#

DROP TABLE IF EXISTS `m_create`;

CREATE TABLE `m_create` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) NOT NULL,
  `currency_rate` double NOT NULL,
  `currency_description` text NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `m_create` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('1', 'IDR', '10002', 'Indian Rupee');
INSERT INTO `m_create` (`currency_id`, `currency_name`, `currency_rate`, `currency_description`) VALUES ('3', 'USD222', '0.7', 'US dollar');


#
# TABLE STRUCTURE FOR: open_stock_table
#

DROP TABLE IF EXISTS `open_stock_table`;

CREATE TABLE `open_stock_table` (
  `open_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `open_billing_id` int(11) NOT NULL,
  `open_stock_sign` varchar(1) DEFAULT '+',
  `open_stock_tran_type` varchar(255) DEFAULT 'Open',
  `open_stock_quantity` int(255) DEFAULT NULL,
  `open_stock_status` varchar(1) DEFAULT 'C',
  PRIMARY KEY (`open_stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `open_stock_table` (`open_stock_id`, `open_billing_id`, `open_stock_sign`, `open_stock_tran_type`, `open_stock_quantity`, `open_stock_status`) VALUES ('1', '0', '+', 'Open', '100', 'C');
INSERT INTO `open_stock_table` (`open_stock_id`, `open_billing_id`, `open_stock_sign`, `open_stock_tran_type`, `open_stock_quantity`, `open_stock_status`) VALUES ('2', '6', '+', 'Open', '100', 'D');
INSERT INTO `open_stock_table` (`open_stock_id`, `open_billing_id`, `open_stock_sign`, `open_stock_tran_type`, `open_stock_quantity`, `open_stock_status`) VALUES ('3', '0', '+', 'Open', '200', 'C');
INSERT INTO `open_stock_table` (`open_stock_id`, `open_billing_id`, `open_stock_sign`, `open_stock_tran_type`, `open_stock_quantity`, `open_stock_status`) VALUES ('4', '12', '+', 'Open', '100', 'D');
INSERT INTO `open_stock_table` (`open_stock_id`, `open_billing_id`, `open_stock_sign`, `open_stock_tran_type`, `open_stock_quantity`, `open_stock_status`) VALUES ('5', '5', '+', 'Open', '300', 'D');
INSERT INTO `open_stock_table` (`open_stock_id`, `open_billing_id`, `open_stock_sign`, `open_stock_tran_type`, `open_stock_quantity`, `open_stock_status`) VALUES ('6', '5', '+', 'Open', '100', 'C');


#
# TABLE STRUCTURE FOR: open_table
#

DROP TABLE IF EXISTS `open_table`;

CREATE TABLE `open_table` (
  `open_id` int(11) NOT NULL AUTO_INCREMENT,
  `open_tran_date` date DEFAULT NULL,
  `open_doc_ref` varchar(255) DEFAULT NULL,
  `open_remarks` varchar(255) DEFAULT NULL,
  `open_amount` decimal(12,2) DEFAULT NULL,
  `open_sign` varchar(1) DEFAULT NULL,
  `open_status` varchar(1) DEFAULT 'C',
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`open_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `open_table` (`open_id`, `open_tran_date`, `open_doc_ref`, `open_remarks`, `open_amount`, `open_sign`, `open_status`, `customer_id`) VALUES ('1', '2017-12-06', 'inv1706', 'opening', '1000.00', '+', 'P', '2');
INSERT INTO `open_table` (`open_id`, `open_tran_date`, `open_doc_ref`, `open_remarks`, `open_amount`, `open_sign`, `open_status`, `customer_id`) VALUES ('2', '2017-11-05', 'inv1705', 'opening', '2000.00', '+', 'P', '2');
INSERT INTO `open_table` (`open_id`, `open_tran_date`, `open_doc_ref`, `open_remarks`, `open_amount`, `open_sign`, `open_status`, `customer_id`) VALUES ('3', '2017-11-18', 'inv1704', 'opening', '3000.00', '+', 'P', '2');
INSERT INTO `open_table` (`open_id`, `open_tran_date`, `open_doc_ref`, `open_remarks`, `open_amount`, `open_sign`, `open_status`, `customer_id`) VALUES ('4', '2017-11-06', 'cn0606', 'opening', '500.00', '-', 'P', '2');
INSERT INTO `open_table` (`open_id`, `open_tran_date`, `open_doc_ref`, `open_remarks`, `open_amount`, `open_sign`, `open_status`, `customer_id`) VALUES ('5', '0000-00-00', '', '', '0.00', '-', 'P', '2');


#
# TABLE STRUCTURE FOR: other_payment
#

DROP TABLE IF EXISTS `other_payment`;

CREATE TABLE `other_payment` (
  `opay_id` int(11) NOT NULL AUTO_INCREMENT,
  `opay_date` date DEFAULT NULL,
  `opay_ref_no` varchar(255) DEFAULT NULL,
  `opay_payee` varchar(255) DEFAULT NULL,
  `opay_coa_id` int(11) NOT NULL,
  `opay_amount` decimal(10,2) DEFAULT NULL,
  `opay_created_on` date NOT NULL,
  `opay_user_id` int(11) NOT NULL,
  `opay_status` varchar(1) DEFAULT 'C',
  PRIMARY KEY (`opay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('1', '2017-12-20', 'Paymen.66832', '5555', '6', '11111111.00', '2017-12-20', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('8', '2017-12-20', 'Paymen.66835', 'test_payee_name  ', '5', '500.00', '2017-12-20', '2', 'D');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('3', '2017-12-20', 'Paymen.66833', 'test_payee_name  ', '6', '31044.00', '2017-12-20', '2', 'D');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('4', '2017-12-20', 'Paymen.66833', 'test_payee_name  ', '4', '4777.00', '2017-12-20', '2', 'D');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('5', '2017-12-20', 'Paymen.66833', 'ppppppp', '2', '500.00', '2017-12-20', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('6', '2017-12-20', 'Paymen.66833', 'test_payee_name  ', '10', '400.00', '2017-12-20', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('7', '2017-12-20', 'Paymen.66834', 'test_payee_name  ', '18', '120.00', '2017-12-20', '2', 'P');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('11', '2017-12-22', 'Paymen.66837', 'test_payee_name', '7', '100.00', '2017-12-22', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('9', '2017-12-20', 'Paymen.66836', 'pppp ', '6', '7777.00', '2017-12-20', '2', 'P');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('10', '2017-12-20', 'Paymen.66836', 'pppp  ', '4', '6666.00', '2017-12-20', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('12', '2017-12-22', 'Paymen.66838', 'oooooooooo', '6', '500.00', '2017-12-22', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('13', '2017-12-27', 'Paymen.66839', '', '8', '100.00', '2017-12-27', '2', 'D');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('14', '2017-12-27', 'Paymen.66839', '', '2', '200.00', '2017-12-27', '2', 'D');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('15', '2017-12-27', 'Paymen.66839', '', '7', '400.00', '2017-12-27', '2', 'D');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('16', '2017-12-27', 'Paymen.66840', 'rrrr', '7', '100.00', '2017-12-27', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('17', '2017-12-27', 'Paymen.66841', 'test_payee_new', '7', '1000.00', '2017-12-27', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('18', '2017-12-27', 'Paymen.66842', '66666666666666666666666', '6', '400.00', '2017-12-27', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('19', '2017-12-27', 'Paymen.66842', '66666666666666666666666', '29', '500.00', '2017-12-27', '2', 'C');
INSERT INTO `other_payment` (`opay_id`, `opay_date`, `opay_ref_no`, `opay_payee`, `opay_coa_id`, `opay_amount`, `opay_created_on`, `opay_user_id`, `opay_status`) VALUES ('20', '2017-12-27', 'Paymen.66842', '66666666666666666666666', '4', '77.00', '2017-12-27', '2', 'C');


#
# TABLE STRUCTURE FOR: payee
#

DROP TABLE IF EXISTS `payee`;

CREATE TABLE `payee` (
  `payee_id` int(11) NOT NULL AUTO_INCREMENT,
  `payee_name` varchar(255) NOT NULL,
  PRIMARY KEY (`payee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: payment_master
#

DROP TABLE IF EXISTS `payment_master`;

CREATE TABLE `payment_master` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_ref_no` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_reference_id` varchar(255) NOT NULL,
  `bank` varchar(2555) NOT NULL,
  `cheque` varchar(255) NOT NULL,
  `other_reference` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `purchase` varchar(255) NOT NULL,
  `payment_status` varchar(15) NOT NULL DEFAULT 'C',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('1', 'Paymen.66854', '5', '2', '4', '', '', '', 'HKD', '300.00', 'CN100,CN300,Inv555', 'P', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('2', 'Paymen.66855', '5', '2', '6', '', '', '', 'HKD', '2844.94', 'CN300,CN9000,Inv555,Inv6000.06', 'P', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('3', 'Paymen.66856', '5', '2', '5', '', '', '', 'HKD', '4000.00', '2222,555,Inv8888.89', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('4', 'Paymen.66857', '5', '2', '9', '', '', '', 'HKD', '0.00', '2222,666', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('5', 'Paymen.66858', '5', '2', '', '', '', '', 'HKD', '80000.00', '555', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('6', 'Paymen.66859', '5', '2', '', '', '', '', 'HKD', '0.00', '', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('7', 'Paymen.66860', '5', '2', '10', '', '', '', 'HKD', '0.00', '2222', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('8', 'Paymen.66861', '5', '2', '5', 'ads', 'weqewwq', 'ewqwe', 'HKD', '58656.11', '2222,555,666,Inv8888.89', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `payment_master` (`payment_id`, `payment_ref_no`, `supplier_id`, `user_id`, `purchase_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `purchase`, `payment_status`, `created_on`, `modified_on`) VALUES ('9', 'Paymen.66862', '5', '2', '9', '', '', '', 'HKD', '67545.00', '2222,555,666', 'C', '2017-12-19', '2017-12-19');


#
# TABLE STRUCTURE FOR: payment_purchase_master
#

DROP TABLE IF EXISTS `payment_purchase_master`;

CREATE TABLE `payment_purchase_master` (
  `pay_pur_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `pay_pur_amount` decimal(8,2) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `full_amount` decimal(10,2) DEFAULT NULL,
  `partial_status` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`pay_pur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('1', '1', '100.00', NULL, NULL, '1', '100.00', 'P');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('2', '3', '200.00', NULL, NULL, '1', '300.00', 'P');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('3', '4', '300.00', NULL, NULL, '1', '555.00', 'P');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('4', '3', '100.00', NULL, NULL, '2', '100.00', 'P');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('5', '2', '9000.00', NULL, NULL, '2', '9000.00', 'P');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('6', '4', '255.00', NULL, NULL, '2', '255.00', 'P');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('7', '6', '6000.06', NULL, NULL, '2', '6000.06', 'P');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('8', '10', '4000.00', NULL, NULL, '3', '8000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('9', '11', '4000.00', NULL, NULL, '3', '80000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('10', '5', '0.00', NULL, NULL, '3', '8888.89', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('11', '10', '0.00', NULL, NULL, '4', '8000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('12', '9', '0.00', NULL, NULL, '4', '4455.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('13', '10', '0.00', NULL, NULL, '7', '8000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('14', '10', '8000.00', NULL, NULL, '8', '8000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('15', '11', '80000.00', NULL, NULL, '8', '80000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('16', '9', '4455.00', NULL, NULL, '8', '4455.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('17', '5', '8888.89', NULL, NULL, '8', '8888.89', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('18', '10', '8000.00', NULL, NULL, '9', '8000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('19', '11', '80000.00', NULL, NULL, '9', '80000.00', 'C');
INSERT INTO `payment_purchase_master` (`pay_pur_id`, `purchase_id`, `pay_pur_amount`, `created_on`, `modified_on`, `payment_id`, `full_amount`, `partial_status`) VALUES ('20', '9', '4455.00', NULL, NULL, '9', '4455.00', 'C');


#
# TABLE STRUCTURE FOR: payment_setting
#

DROP TABLE IF EXISTS `payment_setting`;

CREATE TABLE `payment_setting` (
  `payment_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `payment_text_prefix` varchar(50) NOT NULL,
  `payment_number_prefix` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_header_text` text NOT NULL,
  `terms_of_payments` varchar(100) NOT NULL,
  `training_venue` varchar(100) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `cancellation` varchar(100) NOT NULL,
  `payment_footer_text` text NOT NULL,
  PRIMARY KEY (`payment_setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES ('4', '2', 'Paymen', '66842', '', '', '', '', '', '', '');
INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES ('5', '7', 'Paymen', '66827', '', '', '', '', '', '', '');
INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES ('6', '8', 'Paymen', '66827', '', '', '', '', '', '', '');
INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES ('7', '10', 'Paymen', '66827', '', '', '', '', '', '', '');
INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES ('8', '11', 'Paymen', '66827', '', '', '', '', '', '', '');
INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES ('9', '12', 'Paymen', '66827', '', '', '', '', '', '', '');
INSERT INTO `payment_setting` (`payment_setting_id`, `user_id`, `payment_text_prefix`, `payment_number_prefix`, `payment_type`, `payment_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `payment_footer_text`) VALUES ('10', '5', 'Paymen', '66827', '', '', '', '', '', '', '');


#
# TABLE STRUCTURE FOR: purchase_master
#

DROP TABLE IF EXISTS `purchase_master`;

CREATE TABLE `purchase_master` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `full_amount` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `purchase_master` (`purchase_id`, `purchase_ref_no`, `supplier_id`, `user_id`, `total_amount_foreign`, `currency_amount`, `total_amount_local`, `local_handling`, `total_purchase_b4_gst`, `gst_in_sgd`, `tran_type`, `created_on`, `modified_on`, `purchase_status`, `doc_date`, `freight_insurance`, `payment`, `import_permit_ref`, `full_amount`) VALUES ('1', 'ssssss', '4', '2', '1000.00', '0.74', '1496.60', '200.00', '1696.60', '0.00', 'PUR', '2017-12-20', '2017-12-20', 'C', '2017-12-01', '100.00', '0', '2dddddd', '1247.00');


#
# TABLE STRUCTURE FOR: purchase_product_master
#

DROP TABLE IF EXISTS `purchase_product_master`;

CREATE TABLE `purchase_product_master` (
  `p_p_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(8,2) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`p_p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `purchase_product_master` (`p_p_id`, `purchase_id`, `product_id`, `quantity`, `unit_price`, `amount`, `created_on`, `modified_on`) VALUES ('1', '1', '12', '100', '10.00', '1000.00', '2017-12-20', '2017-12-20');


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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('1', 'TOP.20216', '2', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '7', '3000.00', '0.00', '3000.00', '7.00', '3000.00', '1.00', '3000.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2017-12-12', '2017-12-12', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('2', 'TOP.20216', '1', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '4500.00', '0.00', '4500.00', '7.00', '4815.00', '1.00', '4815.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'DELETED', '2017-12-12', '2017-12-12', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('3', 'TOP.20217', '2', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '1200.00', '0.00', '1200.00', '7.00', '1284.00', '1.00', '1284.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'PENDING', '2017-12-12', '2017-12-12', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('4', 'TOP.20218', '1', '4', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '4500.00', '0.00', '4500.00', '7.00', '4815.00', '1.00', '4815.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'DELETED', '2017-12-12', '2017-12-12', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('5', 'TOP.20219', '2', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '1200.00', '0.00', '1200.00', '7.00', '1284.00', '1.00', '1284.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'DELETED', '2017-12-21', '2017-12-21', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('6', 'TOP.20220', '3', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '48892.50', '0.00', '48892.50', '7.00', '52314.97', '1.00', '52314.97', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2017-12-23', '2018-03-02', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('7', 'TOP.20221', '7', '4', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '2450.00', '0.00', '2450.00', '7.00', '2621.50', '3.11', '2621.50', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'SUCCESSFUL', '2017-12-23', '2017-12-23', '1');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('8', 'TOP.20241', '1', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '350.00', '0.00', '350.00', '7.00', '374.50', '1.00', '374.50', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'REJECTED', '2017-12-25', '2017-12-25', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('9', 'TOP.20242', '7', '4', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '1088.50', '0.00', '1088.50', '7.00', '1164.69', '3.11', '1164.69', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2017-12-25', '2017-12-25', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('10', 'TOP.20243', '7', '4', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '1088.50', '0.00', '1088.50', '7.00', '1164.69', '3.11', '1164.69', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'SUCCESSFUL', '2017-12-25', '2017-12-25', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('11', 'TOP.20244', '7', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '3732.00', '0.00', '3732.00', '7.00', '3993.24', '3.11', '3993.24', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2017-12-26', '2017-12-26', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('12', 'TOP.10001', '1', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '2000.00', '0.00', '2000.00', '7.00', '2140.00', '1.00', '2140.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'SUCCESSFUL', '2018-01-25', '2018-01-25', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('13', 'TOP.10002', '1', '2', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '2', '1200.00', '0.00', '1200.00', '7.00', '1284.00', '1.00', '1284.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  \r\nPayment Terms is 100% Upon Confirmation.\r\nPlease stamp and sign below to confirm this order.', 'CONFIRM', '2018-01-26', '2018-01-26', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('14', 'TOP.10003', '3', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : ', '2', '41304.50', '0.00', '41304.50', '7.00', '44195.82', '1.00', '44195.82', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'SUCCESSFUL', '2018-03-01', '2018-03-01', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('15', 'TOP.10004', '2', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : ', '2', '1200.00', '0.00', '1200.00', '7.00', '1284.00', '1.00', '1284.00', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2018-03-01', '2018-03-01', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('16', 'TOP.10005', '3', '2', 'Based on the broad guidelines given to us, we are pleased to quote as follows : ', '2', '5700.50', '0.00', '5700.50', '7.00', '6099.53', '1.00', '6099.53', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'CONFIRM', '2018-03-01', '2018-03-01', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('17', 'TOP.10006', '3', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : ', '2', '40504.50', '0.00', '40504.50', '7.00', '43423.82', '1.00', '43423.82', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'DELETED', '2018-03-01', '2018-03-01', '0');
INSERT INTO `quotation_master` (`quotation_id`, `quotation_ref_no`, `customer_id`, `salesman_id`, `quotation_header_text`, `user_id`, `sub_total`, `lump_sum_discount`, `lump_sum_discount_price`, `gst`, `final_total`, `currency_amount`, `final_total_forex`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`, `quotation_status`, `created_on`, `modified_on`, `invoice`) VALUES ('18', 'TOP.10007', '3', '1', 'Based on the broad guidelines given to us, we are pleased to quote as follows : ', '2', '6500.50', '0.00', '6500.50', '7.00', '6955.53', '1.00', '6955.53', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', NULL, 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.', 'DELETED', '2018-03-01', '2018-03-01', '0');


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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('1', '1', '13', '1', '0.00', '3000.00', '3000.00', '24', '2017-12-12', '2017-12-12');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('2', '2', '6', '1', '0.00', '4500.00', '4500.00', '19', '2017-12-12', '2017-12-12');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('3', '3', '10', '1', '0.00', '1200.00', '1200.00', '19', '2017-12-12', '2017-12-12');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('4', '4', '6', '1', '0.00', '4500.00', '4500.00', '19', '2017-12-12', '2017-12-12');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('5', '5', '10', '1', '0.00', '1200.00', '1200.00', '19', '2017-12-21', '2017-12-21');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('9', '7', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-23', '2017-12-23');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('10', '7', '3', '1', '0.00', '1200.00', '1200.00', '1', '2017-12-23', '2017-12-23');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('11', '7', '2', '1', '0.00', '900.00', '900.00', '1', '2017-12-23', '2017-12-23');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('12', '8', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-25', '2017-12-25');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('13', '9', '1', '1', '0.00', '350.00', '1088.50', '1', '2017-12-25', '2017-12-25');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('14', '10', '1', '1', '0.00', '350.00', '1088.50', '1', '2017-12-25', '2017-12-25');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('15', '11', '3', '1', '0.00', '1200.00', '3732.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('16', '12', '2', '1', '0.00', '800.00', '800.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('17', '12', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('20', '13', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-26', '2018-01-26');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('23', '14', '2', '1', '0.00', '800.00', '800.00', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('24', '14', '3', '10', '10.00', '4500.50', '40504.50', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('25', '15', '4', '1', '0.00', '0.00', '0.00', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('26', '15', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('27', '16', '3', '1', '0.00', '4500.50', '4500.50', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('28', '16', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('31', '17', '3', '10', '10.00', '4500.50', '40504.50', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('32', '17', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('33', '18', '2', '1', '0.00', '800.00', '800.00', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('34', '18', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('35', '18', '3', '1', '0.00', '4500.50', '4500.50', '19', '2018-03-01', '2018-03-01');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('36', '6', '3', '10', '0.00', '4500.50', '45005.00', '19', '2017-12-23', '2018-03-02');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('37', '6', '1', '1', '0.00', '1200.00', '1088.50', '19', '2017-12-23', '2018-03-02');
INSERT INTO `quotation_product_master` (`q_p_id`, `quotation_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('38', '6', '2', '1', '0.00', '800.00', '2799.00', '19', '2017-12-23', '2018-03-02');


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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('1', '2', 'TOP', '10007', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : ', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('2', '1', 'TOP', '88889', 'invoice', 'test header', 'in 5 days', 'training center', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('6', '7', 'TOP', '20216', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('7', '8', 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('8', '10', 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('9', '11', 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('10', '12', 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');
INSERT INTO `quotation_setting` (`quotation_setting_id`, `user_id`, `quotation_text_prefix`, `quotation_number_prefix`, `quotation_type`, `quotation_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `quotation_footer_text`) VALUES ('11', '5', 'TOP', '20215', 'order_entry', 'Based on the broad guidelines given to us, we are pleased to quote as follows : demo  text End', '5 days Overdue will be charged 3% of Total Payment', 'TRADPAC Training Centre', 'Modification subject to separate charges', '', 'All discounts extended shall be valid for 7 days from offer date*  Please stamp and sign below to confirm this order.');


#
# TABLE STRUCTURE FOR: receipt_invoice_master
#

DROP TABLE IF EXISTS `receipt_invoice_master`;

CREATE TABLE `receipt_invoice_master` (
  `r_i_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `rec_inv_amount` decimal(8,2) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  `receipt_id` int(11) NOT NULL,
  `full_amount` decimal(10,2) DEFAULT NULL,
  `partial_status` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`r_i_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('1', '1', '500.00', NULL, NULL, '1', '4000.00', 'P');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('2', '3', '0.00', NULL, NULL, '1', '500.00', 'P');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('3', '4', '500.00', NULL, NULL, '1', '1000.00', 'P');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('4', '1', '3100.00', NULL, NULL, '2', '3500.00', 'P');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('5', '3', '0.00', NULL, NULL, '2', '500.00', 'P');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('6', '4', '500.00', NULL, NULL, '2', '500.00', 'P');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('7', '2', '2600.00', NULL, NULL, '2', '2600.00', 'P');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('8', '1', '100.00', NULL, NULL, '3', '400.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('9', '8', '100.00', NULL, NULL, '3', '3500.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('10', '1', '0.00', NULL, NULL, '4', '400.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('11', '1', '0.00', NULL, NULL, '5', '400.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('12', '1', '0.00', NULL, NULL, '6', '400.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('13', '1', '400.00', NULL, NULL, '7', '400.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('14', '8', '3500.00', NULL, NULL, '7', '3500.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('15', '1', '400.00', NULL, NULL, '8', '400.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('16', '8', '3500.00', NULL, NULL, '8', '3500.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('17', '1', '400.00', NULL, NULL, '9', '400.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('18', '3', '500.00', NULL, NULL, '9', '500.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('19', '8', '3500.00', NULL, NULL, '9', '3500.00', 'C');
INSERT INTO `receipt_invoice_master` (`r_i_id`, `invoice_id`, `rec_inv_amount`, `created_on`, `modified_on`, `receipt_id`, `full_amount`, `partial_status`) VALUES ('20', '184', '10.00', NULL, NULL, '10', '856.00', 'C');


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
  `amount` decimal(10,2) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `receipt_status` varchar(15) NOT NULL DEFAULT 'C',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('1', 'REC.66671', '1', '2', '4', '', '', '', 'SGD', '0.00', 'CN4000,CN500,Inv1000', 'P', '2017-12-17', '2017-12-17');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('2', 'REC.66672', '1', '2', '2', '', '', '', 'SGD', '3100.00', 'CN4000,CN500,Inv1000,Inv2600', 'P', '2017-12-17', '2017-12-17');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('3', 'REC.66673', '1', '2', '8', '', '', '', 'SGD', '100.00', 'CN4000,eeeeeeeeeeee', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('4', 'REC.66674', '1', '2', '1', '', '', '', 'SGD', '0.00', 'CN4000', 'C', '2017-12-18', '2017-12-18');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('5', 'REC.66675', '1', '2', '1', '', '', '', 'SGD', '0.00', 'CN4000', 'C', '2017-12-19', '2017-12-19');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('6', 'REC.66676', '1', '2', '1', '', '', '', 'SGD', '0.00', 'CN4000', 'C', '2017-12-19', '2017-12-19');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('7', 'REC.66677', '1', '2', '8', '', '', '', 'SGD', '3100.00', 'CN4000,eeeeeeeeeeee', 'C', '2017-12-19', '2017-12-19');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('8', 'REC.66678', '1', '2', '8', '', '', '', 'SGD', '3100.00', 'CN4000,eeeeeeeeeeee', 'C', '2017-12-19', '2017-12-19');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('9', 'REC.66679', '1', '2', '8', '', '', '', 'SGD', '2600.00', 'CN4000,CN500,eeeeeeeeeeee', 'C', '2017-12-19', '2017-12-19');
INSERT INTO `receipt_master` (`receipt_id`, `receipt_ref_no`, `customer_id`, `user_id`, `invoice_reference_id`, `bank`, `cheque`, `other_reference`, `currency`, `amount`, `invoice`, `receipt_status`, `created_on`, `modified_on`) VALUES ('10', 'REC.66680', '2', '2', '184', '', '', '', 'SGD', '10.00', 'INV123.999250', 'C', '2018-02-22', '2018-02-23');


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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('2', '1', 'REC', '107', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('3', '2', 'REC', '66680', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('4', '7', 'REC', '66574', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('5', '8', 'REC', '66574', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('6', '10', 'REC', '66574', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('7', '11', 'REC', '66574', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('8', '12', 'REC', '66574', '', '', '', '', '', '', '');
INSERT INTO `receipt_setting` (`receipt_setting_id`, `user_id`, `receipt_text_prefix`, `receipt_number_prefix`, `receipt_type`, `receipt_header_text`, `terms_of_payments`, `training_venue`, `modification`, `cancellation`, `receipt_footer_text`) VALUES ('9', '5', 'REC', '66574', '', '', '', '', '', '', '');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `salesman_master` (`s_id`, `s_code`, `s_name`, `s_category`, `s_note`) VALUES ('1', 'J001', 'JENNIFER', 'NEW SALES', 'INCLUDED BACKLOG , TRADEPAC, PAYROLL & SAC');
INSERT INTO `salesman_master` (`s_id`, `s_code`, `s_name`, `s_category`, `s_note`) VALUES ('2', 'VEL1001', 'VELDA CHUA ', 'SAC ', 'ACCOUNTING SERVICES ');


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
# TABLE STRUCTURE FOR: stock_adjustment_master
#

DROP TABLE IF EXISTS `stock_adjustment_master`;

CREATE TABLE `stock_adjustment_master` (
  `adjustment_id` int(11) NOT NULL AUTO_INCREMENT,
  `adjustment_ref_no` varchar(255) NOT NULL,
  `adjustment_remarks` varchar(255) NOT NULL,
  `adjustment_billing_id` int(11) NOT NULL,
  `adjustment_status` varchar(1) NOT NULL DEFAULT 'C',
  `adjustment_quantity` int(255) DEFAULT NULL,
  `adjustment_sign` varchar(1) NOT NULL,
  `adjustment_tran_type` varchar(255) DEFAULT 'Adjustment',
  `created_on` date DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`adjustment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: stock_invoice_master
#

DROP TABLE IF EXISTS `stock_invoice_master`;

CREATE TABLE `stock_invoice_master` (
  `s_i_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `gst_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  PRIMARY KEY (`s_i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('1', '5', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-25', '2017-12-25');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('2', '18', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('3', '19', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('4', '19', '2', '1', '0.00', '900.00', '900.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('5', '19', '3', '1', '0.00', '1200.00', '1200.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('6', '20', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('7', '20', '3', '1', '0.00', '1200.00', '1200.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('8', '20', '2', '1', '0.00', '900.00', '900.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('9', '21', '3', '1', '0.00', '1200.00', '1200.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('10', '22', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-26', '2017-12-26');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('11', '1', '1', '1', '0.00', '350.00', '350.00', '1', '2017-12-30', '2017-12-30');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('12', '2', '3', '12', '11.00', '1200.00', '12816.00', '1', '2018-01-08', '2018-01-08');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('13', '3', '2', '1', '0.00', '900.00', '900.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('14', '4', '1', '10', '10.00', '350.00', '2315.25', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('15', '5', '3', '1', '0.00', '1200.00', '1200.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('16', '6', '3', '1', '0.00', '1200.00', '1200.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('17', '7', '1', '1', '0.00', '350.00', '350.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('18', '8', '1', '1', '0.00', '350.00', '350.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('19', '9', '1', '1', '0.00', '350.00', '350.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('20', '10', '1', '1', '0.00', '350.00', '350.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('21', '11', '1', '1', '0.00', '350.00', '350.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('22', '12', '1', '1', '0.00', '350.00', '350.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('23', '13', '1', '10', '10.00', '350.00', '3150.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('24', '14', '1', '10', '10.00', '350.00', '3150.00', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('25', '15', '1', '1', '0.00', '350.00', '257.25', '1', '2018-01-15', '2018-01-15');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('26', '1', '1', '1', '0.00', '350.00', '350.00', '1', '2018-01-24', '2018-01-24');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('27', '1', '2', '1', '0.00', '800.00', '800.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('28', '1', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('29', '2', '2', '1', '0.00', '800.00', '800.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('30', '2', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('31', '3', '1', '1', '0.00', '1200.00', '1200.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('32', '3', '2', '1', '0.00', '800.00', '800.00', '19', '2018-01-25', '2018-01-25');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('33', '4', '2', '1', '0.00', '800.00', '800.00', '19', '2018-02-22', '2018-02-22');
INSERT INTO `stock_invoice_master` (`s_i_id`, `invoice_id`, `product_id`, `quantity`, `discount`, `price`, `product_total`, `gst_id`, `created_on`, `modified_on`) VALUES ('34', '5', '3', '10', '10.00', '4500.50', '40504.50', '19', '2018-03-01', '2018-03-01');


#
# TABLE STRUCTURE FOR: stock_purchase_master
#

DROP TABLE IF EXISTS `stock_purchase_master`;

CREATE TABLE `stock_purchase_master` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_ref_no` varchar(50) NOT NULL,
  `purchase_supplier_id` int(11) NOT NULL,
  `purchase_billing_id` int(11) NOT NULL,
  `purchase_quantity` int(255) DEFAULT NULL,
  `purchase_status` varchar(1) DEFAULT 'C',
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `purchase_tran_type` varchar(20) NOT NULL DEFAULT 'Purchase',
  `purchase_sign` varchar(1) NOT NULL DEFAULT '+',
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `conf_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN ID OTHERWISE SYSTEM WILL NOT WORK';

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('2', '3', '117.218.143.51', 'droopy', '$2y$08$uC54Y0lonVVXgKAM6qwMJOWqb5vSUM0ziRIFmZ4SUU8f9BClbY83C', NULL, 'trueline.chirag@gmail.com', NULL, NULL, NULL, NULL, '1500045874', '1519962865', '1', 'Chirag jagani', 'admin', '6');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('3', '4', '117.218.143.51', 'sale1', '$2y$08$uaJ.J0H.R0AAookWiUijbufCW.h5TX3BqdTQhm8JpdPC8YIJEg6Ou', NULL, 'salesperson1@gmail.com', NULL, NULL, NULL, NULL, '1500103217', '1500535940', '1', 'sales person', 'SalesGroup', NULL);
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('4', '3', '45.126.201.241', 'velda', '$2y$08$9E7kjZukq8jIN49qNgLAt.NktgZGFAgTm1VczG.g95ZBYLyiIvtCK', NULL, 'admin2@admin.com', NULL, NULL, NULL, NULL, '1500387661', '1500529903', '1', 'velda', 'SalesGroup', NULL);
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('5', '1', '127.0.0.1', 'superuser', '$2y$08$j2XSkDNnNLW8Ve0wSsHD8.MIqhlkIci4jgMUaeBMIrsVlQzWgmQL2', NULL, 'superuser@super.com', NULL, NULL, NULL, NULL, '1512706946', '1514359981', '1', 'Super User', 'TOPFORM MANAGMENT', NULL);
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('6', '5', '127.0.0.1', 'new_test_user', '$2y$08$zKgsTesGs/v2ZgUvb.kRSuJ4KZPf5I8nP25gAVdS8XZV/KYjVER7W', NULL, 'new@new.com', NULL, NULL, NULL, NULL, '1512788205', NULL, '1', 'new_test_user', 'Accounts', NULL);
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('7', '3', '127.0.0.1', 'admin1', '$2y$08$JE8/IxpSd//2nLcvB6qUWecOVuuhdwVexKRid8JlnlbYBG8ApZuB6', NULL, 'admin1@admin1.com', NULL, NULL, NULL, NULL, '1512812238', '1513050815', '1', 'Admin1 Full name', 'admin', '1');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('8', '3', '127.0.0.1', 'admin2', '$2y$08$8uR20DAV2td7YO1gI9yuTuQ40B.TNz.7e6iny38zM3sDL.uNuCdqy', NULL, 'admin2@admin2.com', NULL, NULL, NULL, NULL, '1512812292', '1513050260', '1', 'Admin2 full name', 'admin', '2');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('10', '3', '127.0.0.1', 'admin4', '$2y$08$EXTRP4HITp029BtWKZYNr.B8vKRgP8Q1dEgMsNqT8YX8ZHvJiAbfy', NULL, 'admin4@admin4.com', NULL, NULL, NULL, NULL, '1512812382', '1513051408', '1', 'admin 4 full name', 'admin', '4');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('11', '3', '127.0.0.1', 'admin5', '$2y$08$9wnM.bsEUI8KdNyKGoYen.ByaXjbuDTpDd8dK0mKiwJOfDZoEs3W2', NULL, 'admin5@admin5.com', NULL, NULL, NULL, NULL, '1512812547', '1513048410', '1', 'admin 5 Full name', 'admin', '5');
INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `emp_name`, `level`, `conf_id`) VALUES ('12', '3', '127.0.0.1', 'admin3', '$2y$08$sbDzChfZHLCOy05a0Tl2kuOKHkHh7ENaNubXa0iQqmYse7Mxppm4a', NULL, 'admin3@admin3.com', NULL, NULL, NULL, NULL, '1512982220', '1513048125', '1', 'admin3 full name', 'admin', '3');


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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='DON''T CHANGE IN THIS TABLE EVEN "ID" OTHERWISE SYSTEM WILL NOT WORK';

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('2', '2', '3');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('3', '3', '4');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('4', '4', '3');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('1', '5', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('6', '6', '5');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('11', '7', '3');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('13', '8', '4');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('10', '10', '3');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('12', '11', '3');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('14', '12', '3');


