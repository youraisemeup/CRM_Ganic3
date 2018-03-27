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

INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('6', 'AUTOBILL.6', '1', '2', '4000.00', '0.00', '4000.00', '7.00', '4280.00', '2018-01-05', '2018-01-16', '2018-01-16', '2018-01-05', '2019-01-04', '2019-01-05', '4280.00', '1.00', '', 'Y', '5');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('7', 'AUTOBILL.5', '7', '2', '9330.00', '0.00', '9330.00', '7.00', '9983.10', '2018-01-04', '2018-01-16', '2018-01-16', '2018-01-04', '2018-07-03', '2018-07-04', '3210.00', '3.11', '', 'H', '4');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('8', 'AUTOBILL.2', '2', '2', '1000.00', '0.00', '1000.00', '7.00', '1070.00', '2018-06-01', '2018-01-16', '2018-01-16', '2018-06-01', '2018-06-30', '2018-07-01', '1070.00', '1.00', '2018-06', 'M', '1');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('9', 'AUTOBILL.4', '5', '2', '1470.00', '0.00', '1470.00', '7.00', '1572.90', '2018-04-01', '2018-01-16', '2018-01-16', '2018-04-03', '2018-07-02', '2018-07-03', '2140.00', '0.74', '2018-04', 'Q', '2');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('10', 'AUTOBILL.3', '5', '2', '735.00', '0.00', '735.00', '7.00', '786.45', '2018-06-01', '2018-01-16', '2018-01-16', '2018-06-02', '2018-07-01', '2018-07-02', '1070.00', '0.74', '2018-06', 'M', '1');
INSERT INTO `blockbill_master` (`blockbill_id`, `blockbill_ref_no`, `customer_id`, `user_id`, `contract_sum`, `less_discount`, `net_contract_amount`, `gst`, `total_inclusive_gst`, `bill_date`, `created_on`, `modified_on`, `start_date`, `end_date`, `next_bill_date`, `total_inclusive_gst_local`, `currency_amount`, `bill_state`, `contract_type`, `contract_id`) VALUES ('11', 'AUTOBILL.7', '6', '2', '6220.00', '20.00', '4976.00', '7.00', '5324.32', '2018-04-04', '2018-01-20', '2018-01-20', '2018-04-04', '2018-07-03', '2018-07-04', '1712.00', '3.11', '', 'Q', '2');


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
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8;

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


