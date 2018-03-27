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
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('17', '3IA', 'TRADPAC PLUS (WINDOWS )-GENERAL LEDGER REPORTS (TB, P&L, AT, B/SHEET)-DEBTORS AND CREDITORS\'REPORTS-GST REPORTS/AUTO BANK RECON/EXPORT TO SPREADSHEET-JOURNAL ENTRY MODULE-PETTY CASH, PAYMENT VOUCHER AND OFFICIAL RECEIPT-DEBIT AND CREDIT NOTE-SALES INVOICE AND SALES REPORTS-ORDER ENTRY OR QUOTATION , DELIVERY ORDER-AUTO PO AND STOCKS , SYSTEMS MANAGER', 'SET', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('18', 'MCPP', 'MC - MINIMUM COST PROTECTION PLAN', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('19', '3ID', 'STD TRADPAC LITE-JOURNAL ENTRY WITH GL REPORTS(TB, P&L, BAL SHT)-AR & AP REPORT STATEMENT-GST REPORTS C/W DETAILED AND SUMMARY LISTING-PETTY CASH AND PAYMENT VOUCHER GENERATOR-RECEIPT GENERATOR, DEBIT AND CREDIT NOTE-SALES INVOICE GENERATOR-BANK RECONCILIATION MODULE-EZ-ENTRY MODULE-SYSTEM MANAGER', 'SET', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('20', '3IE', 'TRADEPAC BOOK-KEEPERS\' (WINDOWS)C/W EASY ENTRY MODULE AND KEY ACCOUNTING REPORTSCOMPRISING: GL , AR, AP AND GST REPORTSBANK RECON MODULE , EXPORT TO SPREADSHEET FUNCTIONFOR KEY REPORTS ( TRIAL BALANCE, DEBTORS ANDCREDITORS\' LISTING, GST REPORT, SALES REPORTS)PLUS SYSTEMS MANAGER', 'SET', '2288', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('21', '3IF', 'TRADPAC BATCHCOMES WITH KEY ACCOUNTING REPORTS:GENERAL LEDGER, TRIAL BALANCE, PROFIT AND LOSSBALANCE SHEET, AUDIT TRIAL, GST REPORTSDEBTORS AND CREDITORS\' REPORTSMONTHLY DEBTORS\' STATEMENTSSYSTEMS MANAGER', 'SET', '1388', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('22', 'FA', 'FIXED ASSET REGISTER', 'SET', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('23', 'SMC06', 'SUPER 2006 MAINTENANCE CONTRACTSTD SINGLE USER', 'SET', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('24', 'LAN', 'additional LAN License for 1 more workstation', 'STN', '250', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('25', 'REISSUE', 'RE-ISSUE NEW PROGRAM CDNOTE: PRICE IS INCLUSIVE OF TELEPHONE INSTRUCTIONTO ASSIST USER IN RE-INSTALLATION OF NEW SYSTEM.', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('26', 'TPCK', 'TRADPAC CHEQUE-WRITER C/W :PAYMENT VOUCHER GENERATORCHEQUE PRINTING FUNCTIONPRINTING MARGIN ADJUSTMENTCHART OF ACCOUNTSYSTEMS MANAGER', 'MDLE', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('27', 'SUB-LICENSE', 'SIMILIAR FEATURES AND FUNTION AS', 'SET', '3376', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('28', 'TEST N DEBUG', 'TO TEST AND DEBUG MODIFIED SOFTWARE', 'JOB', '100', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('29', 'A0016', 'TRADPAC (TRANSPORTATION ) c/w :* Billing module* Cost Recovery Report by Job* Petty Cash Voucher* Cheque Payment Voucher* Receipt Generator* GL Reports* AR Reports* AP Reports', 'SET', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('30', 'PAYSLIP', '500 PCS OF PAYSLIP', 'PCS', '111', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('31', 'LAB-TEST', 'LAB TEST', '', '75', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('32', 'TPT', 'SITE INSTALLATION & TRANSPORTATION', 'TRIP', '180', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('33', 'TAC', 'TRADPAC ACCOUNTING CLUB', 'QTR', '897', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('34', 'COUPON', 'TRAINING COUPONG', '', '120', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('35', 'FBL', 'FOREIGN BANK LEDGER', 'MDL', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('36', 'MODI 1', 'CUSTOMISE INVOICE PER SAMPLE FORMAT', 'JOB', '1100', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('37', 'MODI 2', '', 'JOB', '850', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('38', 'MODI 5', 'INCLUDE CREDIT LIMIT BY INDIVIDUAL CUSTOMERMODIFY NAME MASTER TO ENABLE USER TO SET LIMITCHANGE DATA-ENTRY SCREEN FOR SAME PURPOSEMODIFY INVOICING ROUTINE TO CHECK FOR LIMITPROMPT USER IF LIMIT IS EXCEEDED AT TIME OFINVOICEGENERATIONUSER IS ALLOWED THE OPTION TO PROCEED OR ABORT', 'JOB', '400', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('39', 'GST', 'GST UPGRADING', 'JOB', '160', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('40', 'MOD1', 'INVOICE MODULE', 'JOB', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('41', 'UP1000', 'UPGRADE TO PAYWIN 2007C/W : TRADPAC HR SYSTEM & LEAVE MGT SYSTEM', 'PKG', '1500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('42', 'MODI', 'SUMMARY OF SALES BY \"CASH\" OR \"CREDIT\" TERMS', 'JOB', '450', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('43', 'PD', 'PROMOTIONAL DISCOUNT', 'SET', '-652', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('44', 'QTYCHG', 'CHANGE IN QTY FORMAT TO HAVE 4 DECIMAL PLACES- MODIFY DATA ENTRY SCREEN- MODIFY FILES STRUCTURE- MODIFY DOCUMENT ALIGNMENT- MODIFY AFFECTED REPORT(S)ABOVE TASKS FOR :', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('45', 'CUSTOM', 'CUSTOMISED APPLICATION', 'JOB', '900', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('46', 'STD OPS', 'STANDARD SINGLE-USER OPS SYSTEM COMPRISING:1. QUOTATION MODULE2. DELIVERY ORDER3. PACKING LIST4. PROFORMA INVOICE5. SALES INVOICE6. AUTO -PURCHASE ORDER7. STOCKS MANAGEMENT8. SYSTEMS MAINTENANCE', 'SET', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('47', 'RECOMP', 'RECOMPILE AND RE-ISSUE NEW SET OF PROGRAMS IN CDPRICE INCLUDE:SEARCHING VERSION PROGRAM CODES FOR EACH MODULECOMPILATION OF PROGRAMS BY SELECTED MODULESCONFIGURATION OF MAIN MENU FOR SELECTED MODULES', 'JOB', '330', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('48', 'STD WIP', 'STD TRADPAC WIP SYSTEM C/W :1. JOB MASTER SHOWING JOB CODE, JOB DESCRIPTIONCONTRACT DATE, CONTRACT SUM, COMMENCEMENT DATE,COMPLETION DATE, SUPERVISOR IN CHARGE,', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('49', 'PER', 'AS PER EARLIER QUOTATION DT 4/4/2007QUOTATION REF M&J/96468/2007', 'JOB', '1750', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('50', 'ADDN', 'ADDITIONAL MODIFICATIONS:A. ADD A FUNCTION FOR USER TO RECALL CONFIRMEDINVOICES AND ADD FOLLOWING CHARGES:i) FREIGHTii) INSURANCEB. THE CHARGES ARE FOR EXPORT INVOICES ONLY ANDWILL BE USED FOR PURPOSE OF CUSTOMISED REPORTS.', 'J0B', '750', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('51', 'W.I.P.', 'STD WORKS IN PROGRESS APPLICATIONC/W WITH WIP STATUS REPORTSCOMPLETED JOB LISTINGNEW CONTRACT LISTINGDIRECT MATERIAL BY JOBDIRECT EXPENSES BY JOBDIRECT LABOUR BY JOBSUB-CON EXPENSES BY JOBAND OTHER STANDARD WINDOWS FEATURES & FUNCTIONS', 'MDLE', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('52', 'MOD-DEC', 'MODIFICATION TO DECIMAL POINT', 'MOD', '200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('53', 'BOM', 'BILL OF MATERIAL APPLICATION- ADD A \"PARENT-CODE\" MASTER FILE WITH 5 CHARACTER- ADD A PARENT CODE FIELD TO EXISTING STOCK MASTERRECORD SO THAT USER CAN ASSIGN A PARENT-CODE TO AGIVEN STOCK ITEM (IF APPLICABLE)- THE PURPOSE OF THE PARENT CODE FIELD IS TOIDENTIFY A NUMBER OF STOCK ITEMS WHICH SHARE THEPARENT-CODE FOR THE PURPOSE OF B.O.M. APPLICATION', 'JOB', '5380', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('54', 'DTFR', 'DATA TRANSFER FROM EXISTING SYSTEM TO THE NEWMODIFIED SYSTEM TO MINIMISE THE NEED FORRE-ENTRY OF OLD DATA', 'JOB', '180', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('55', 'UP1000B', 'PAY2007B', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('56', 'BKD-HOST', 'BOOK-KEEPER\'S HOST SYSTEM', 'SET', '2888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('57', 'LAN LICENSE', 'INCREASE IN LAN- USERS', 'STN', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('58', 'AUTO-RECOVERY', 'upgrade to auto recovery version of TRADPAC PLUSaccounting application.', 'SET', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('59', 'CUST', 'CUSTOMISED REPORT', 'JOB', '250', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('60', 'DTF', 'DATA TRANSFER FROM OLD TO NEW SYSTEM', 'JOB', '150', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('61', 'SITE', 'SITE INSTALLATION (FREE UNDER MC PLAN )', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('62', 'YE', 'YEAR END CLOSING SERVICE:1. CHECK FOR TRANSACTION DATED OUTSIDE FINANCIALPERIOD AND REPORT DISCREPANCIES TO USER2. CHECK SUB-LEDGERS VS CONTROL ACCOUNTS ANDREPORT DISCREPANCY TO CLIENT3. PERFORM DATA-PATCHING AS INSTRUCTED BY USERAFTER DISCREPANCIES ARE REPORTED.4. PERFORM YEAR END CLOSING BASED ON BACKLUP OFDATAFILES PROVIDED BY USER.', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('63', 'YE2', 'PRINT FOLLOWING REPORTS:ALL GL REPORTSALL AR REPORTSALL AP REPORTSSTOCKS\' STATUS REPORTS AS AT YEAR END (IF ANY)GST REPORTS (IF ANY)', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('64', 'PAY2008.10', 'UPGRADE TO PAYWIN 2008-10C/W SDL REVISION', 'JOB', '188', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('65', 'RE-TRG', 'RE-TRAINING FOR USERS', 'JOB', '330', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('66', 'UPWIN.01', 'CUSTOMISATION SERVICE TO CONVERT DOS APPLICATIONOUR PRICE INCLUSIVE OF FOLLOWING WORKA. FEASIBILITY STUDY FOR EVERY DOS MODULEB. PROGRAMMING TIME TO RE-WRITE EACH AND EVERYEXISTING DOS APPLICATION IN WINDOWSNOTE: EVERY EFFORT WILL BE MADE TO RETAIN ALL THEESSENTIAL FEATURES AND FUNCTIONS OF YOUR DOSPROGRAMS. ALL DOS FUNCTIONS WILL BE REPLACED BYA SIMILAR FUNCTION IN WINDOWS MODE.', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('67', 'UPWIN.2', 'FILES STRUCTURES:WHERE POSSIBLE, FILES STRUCTURES SHALL BE RETAINEDIN ORDER TO ENUSRE THAT DATA-MIGRATION FROM YOUREXISTING DOS SYSTEM TO THE WINDOWS SYSTEM WILL BESUCCESSFUL.NOTE: THIS WILL SAVE YOU MANY WEEKS (EVEN MONTHS)OTHERWISE NEEDED TO RE-KEY MASTER FILES AND DATAFOR TRANSACTION FILES.', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('68', 'UPWIN.3', 'USER-TRAINING:A. USER TRAINING WILL BE GIVEN ON THE NEW SYSTEMB. ALL TRAINING WILL BE CONDUCTED AT TRADPACTRAINING CENTREC. THERE WILL NOT BE ANY EXTRA CHARGE FOR USERTRAINING', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('69', 'POS', 'TRADPAC P.O.S. SYSTEMC/W STANDARD FEATURES AND FUNCTIONS FOR POINT-OF-SALES BILLINGA. AUTO UPDATING OF STOCKSB. AUTO CAPTURE OF SALES TRANSACTIONC. EXPORT DATA FOR DAILY SALES TO BACKROOM SYSTEMD. DAILY COLLECTION SUMMARYE. OTHER USEFUL FEATURES AND FUNCTIONS', 'MDLE', '3800', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('70', 'WORKSHOP', 'ACCOUNTING WORKSHOP', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('71', 'VAR', 'VARIATION ORDER PER C,D,E,F & G', 'SET', '6530', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('72', 'CSN UPGARDE', 'PAYWIN UPGRADING FOR CSN (NEW CPF REQUIREMENT)', '', '230', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('73', 'DSC-M', 'DISCOUNT ON MC & RENEWAL', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('74', 'DSC-NEW', 'DISCOUNT ON PACKAGES', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('75', 'DSC-TPC', 'DISCOUNT ON TRADPAC CLUB SUBSCRIPTIONS', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('76', 'DSC-OTHERS', 'DISCOUNT ON MISC ITEMS', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('77', 'DSC-S', 'DISCOUNT ON MODI', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('78', 'ECI', 'COMPILATION OF ECI (YA 2009)', 'JOB', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('79', 'TAX 1', 'TAX COMPILATION FOR FORM C (YA/ )------------------------------------NOTE: Computation shall be based on accountsand supporting schedules to be provided by theclient for tax compilation purpose.', 'JOB', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('80', 'ANNUAL RETURNS', 'FILING ANNUAL RETURNS WITH ACRA', 'JOB', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('81', 'FS', 'FEASIBILITY STUDYPRICE IS OUR FEES FOR FEASIBILITY STUDY & EXCLUDEACTUAL PROGRAMMING COST WHICH CAN BE ASCERTAINEDONLY IF THE FEASIBILITY STUDY SHOWN A POSITIVEOUTCOME.', 'JOB', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('82', 'NO Q', 'NO QUOTE', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('83', 'P.NOTE', 'PRICE IS INCLUSIVE OF :-(a) FEASIBILITY STUDY(b) RE-CODING OF PROGRMS(c) RE-COMPILATION OF PROGRAMS(d) TESTING AND DEBUGGING(e) RE-ISSUE OF PROGRAM CD', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('84', 'B-STK', 'BATCH INVENTORY SYSTEMFEATURES INCLUDE:A. BATCH CONTROL NOB. MFG & EXPIRY DATENOTE: DUE TO CHANGE IN FILE STRUCTURE AND INFORMATION CONTENT, THE USER WILL NEED TO RE-ENTER STOCKDATA AND INCLUDE THE NEW KEY ELEMENTS CONTAINED IN(A) & (B) ABOVE. PRICE IS FOR STD SYSTEM WITHOUT ANY MODIFICATIO WHATSOEVER', '', '3488', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('85', 'EX-MODI', 'MODIFICATION DONE BY USER TO THEIR EXISTINGSYSTEM WILL BE INCORPORATED AT THE AGREEDFEES', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('86', 'OTHERS', 'Other changes (no charge)', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('87', '3IJ', 'STANDARD TRADPAC IAF VERSION', 'SET', '3888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('88', 'FILING', 'FILING ANNUAL RETURNS WITH ACRA FOR SMALL EXEMPT\'', 'JOB\'', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('89', 'SUPER B', 'SUPER BUNDLE MC PLAN', 'YEAR', '1388', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('90', 'IAF DISC', 'DISCOUNT IS FOR LIMITED PERIOD ONLY AND SERVES ASTAN INCENTIVE FOR OUR USERS TO UPGRADE EARLY INORDER FOR US TO AVOID EXCESSIVE WORKLOAD AT THELAST MINUTE. NORMAL PRICING SHALL APPLY AFTER THISPROMOTIONAL PERIOD.NOTE: OUR PRICING IS FOR STANDARD SYSTEM ONLY.', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('91', 'DES', 'DATA ENTRY SERVICE FOR BACKLOG PERIOD STATEDBELOW:', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('92', 'DESN', 'NOTE: OUR DATA ENTRY SERVICE SHALL BE COMPLETEDAND READY FOR DELIVERY ON/BEFORE THE PROMISEDDATELINE SUBJECT TO RECEIPT OF ALL NECESSARYINFORMATION AND DOCUMENTS FOR DATA ENTRY SERVICES.IT IS THE DUTY OF THE CUSTOMER TO MAKE AVAILABLESUCH INFORMATION IN A TIMELY MANNER.', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('93', 'DES1', 'COMPILATION OF ECI', 'JOB', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('94', 'DES2', 'COMPILATION OF FORM C', 'JOB', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('95', 'PC', 'ACER E-MACHINE (USED) W/OUT WARRANTY', 'PC', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('96', 'PAYSET<30', 'PAYROLL SET-UP FEES (ONE-TIME CHARGE)FOR 30 STAFF AND BELOW', 'JOB', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('97', 'PAYDATA<30', 'MONTHLY PAYROLL FEES - STAFF BELOW 30 NOS.PRICE IS INCLUSIVE:A. PAYSLIP GENERATIONB. CPF RETURNSC. MONTHLY PAYROLL SUMMARYD. MONTHLY CHECKLIST FOR NET TAKE-HOME PAY', 'MTH', '400', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('98', 'PAYLEAVE<30', 'MONTHLY LEAVE FEES', 'MTH', '150', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('99', '3-STAR PLAN', '3-STAR SUPPORT PLAN C/W:EXPRESS Remote Support via TEAMVIEWER(Software & Training will be provided)Other benefits include: 6 X Express Data-patchingvia InterNet, 6 x labtests , 12 x site visits todo bank reconciliation & 6 Nos. x FREE workshopssessions to train the user on useful features andfunctions.NOTE: All plans are payable quarterly in advance*', 'YR', '2400', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('100', 'AUDIT ADJ', 'SESSION ON INPUT OF AUDITED BALANCES B/F- This session covers the following:a) to replace the Opening GL b/f figures with thefinal audited balance sheetb) to replace/amend AR balances b/f (if any)c) to replace/amend AP balances b/f (if any)', 'JOB', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('101', 'US$ BACKLOG', 'BACKLOG ACCOUNTING IN US $START DATE: 1/1/2010END DATE: 30/6/2010NOTE: FOR THE PURPOSE OF P & L ITEMS, WE SHALL USETHE AVERAGE MONTHLY EXCHANGE RATES FOR TRANSLATIONAS AGREED WITH CLIENT. THE CLIENT SHALL PROVIDEUS WITH THE EXCHANGE RATES TABLE.', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('102', 'ADDFIELD', 'PRICE INCLUSIVE OF:A) CHANGES IN DATA CAPTURE PROGRAMB) MODIFY RELATED FILES\' STRUCTUREC) MODIFY INDEXING & RELATED SUB-ROUTINESD) MODIFY PRINTING PROGRAM', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('103', 'UNABLE', 'ITEM...................USER\'S SPECIFICATION IS UNCLEAR. UNABLE TO QUOTE', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('104', 'FORMATCHANGE', 'CHANGE IN DOCUMENT FORMAT AS REQUESTED BY USER ISNOT POSSIBLE FOR FOLLOWING DOCUMENTS :', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('105', 'W7-TP STD', 'WINDOWS 7-COMPATIBLE TRADPAC STANDARD PACKAGE(SINGLE USER VERSION)', 'SET', '2888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('106', 'TI', 'TRADE-IN VALUE', '', '-1000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('107', 'W7-TP IAF', 'WINDOWS 7-COMPATIBLE TRADPAC IAF SYSTEM(SINGLE USER)', 'SET', '3888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('108', 'SAC', 'SMART ACCOUNTING CLUB-STANDARD PLAN', '', '299', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('109', 'ACRA02', 'INCORPORATE COMPANY PLUS FOLLOWING ITEMS:A. COMPANY SEALB. MEMORANDOM OFASSOCIATION', '', '1500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('110', 'ACRA03', 'REGISTER OF LIMITED LIABILITY PARTNERSHIP (LLP)', '', '720', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('111', 'ACRA04', 'CONVERSION TO \"PTE LTD\"PRICE IS INCLUSIVE OF:A. COMPANY SEALB. PREPARING M & A', '', '1800', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('112', 'ACRA05A', 'TRANSFER OF LONG TERM PASS', '', '700', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('113', 'ACRA05B', 'START CPF ACCOUNT', '', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('114', 'ACRA05C', 'ENTERPREUNER PASS TFR', '', '3888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('115', 'PAY2010/09', 'PAYWIN 2010/09 COMPLETE WITH LATEST MOM MULTI-TIERREQUIREMENT FOR S-PASS AND WORK PERMIT.', 'SET', '1500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('116', 'Q-GST', 'QUARTERLY GST REPORT FOR JAN-MAR 2010', 'JOB', '450', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('117', 'CASH', 'CASH REFUND FROM DAVID CHUA', '', '-50', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('118', 'MCNOTE', 'NOTE: Please note that all support work is carriedin Singapore. For customers with overseas office,we do not laise with the oversea office directly.Our staff will only deal with the SingaporeRepresentatives.', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('119', 'W7-PAT STD', 'WINDOWS 7-COMPATIBLE PAYWIN PACKAGE(SINGLE USER)', 'SET', '1500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('120', 'TAX 2', 'PREPARATION OF CASH FLOW STATEMENT & ASSIST WITHTHE DRAFTING OF DIRECTORS\' REPORT FOR EXEMPTPRIVATE COMPANIES ONLY', '', '800', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('121', 'WIN7-AUTO GST REPORT', 'STD AUTO-GST REPORTING SYSTEMS FOR SMES C/W:* Auto-invoice Generator* Super Fast Input Tax* Useful Sales Reports* Debtors and Credit Control* Auotmatic GST Report', 'SET', '1500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('122', 'W7-PAYP', 'WINDOWS 7-COMPATIBLE PAYWIN PLUS(SINGLE USER)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('123', 'WIN7-BOOK-KEERPER\'S', 'STANDARD BOOK-KEEPERS\' VERSION(WINDOWS 7 COMPATIBLE)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('124', 'M HEADER', 'MODIFY HEADER TO INCLUDE NEW FIELD(S) AS REQUESTEDPER APPENDIX AOUR PRICE IS INCLUSIVE OF FOLLOWING WORKS:A. CHANGE IN DATA-CAPTURE PROGRAMSB. MODIFICATION OF DATABASE FILE STRUCTUREC. MODIFICATION OF INDEXING AND OTHER SUB-ROUTINESD. REALIGNMENT TO DOCUMENT LAYOUTF. RE-CODING OF PRINTING PROGRAMSNOTE: EXCEPT FOR THE SCOPE OF WORK EXPLICITLYSTATED, NO OTHER WORK IS IMPLIED.', 'JOB', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('125', 'TXCOM', 'COMPILATION OF TAX ACCOUNTS', 'JOB', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('126', 'CREPORT', 'PER APPENDIX AOUTSTANDING RECORDS BY JOB', 'JOB', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('127', 'MISC', 'MISCELLANEOUS SERVICES', '', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('128', 'SMARTSYS', 'STANDARD SMART BUSINESS SYSTEMS (SINGLE USER) C/W. QUOTATION/DO/INVOICE. CREDIT NOTE GENERATOR. OFFICIAL RECEIPT GENERATOR. PAYMENT VOUCHER GENERATOR. PETTY CASH VOUCHER. SYSTEM MAINTENANCE', 'SET', '5000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('129', 'IDA-PAY', 'STANDARD PAYWIN 2011-09 WINDOWS 7 COMPATIBLESINGLE USER LICENSEC/W: SYSTEM MAINTENANCE, PAYROLL ENTRY,IR8A & E-SUBMISSION, CPF-PAL INTERNET, GIRO SYSTEMFIRST-TIME INSTALLATION & TRAINING FEE WAIVED ASPER QUOTATION.', 'SET', '1500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('130', 'W7-MAG BATCH', 'WINDOWS 7 COMPATIBLE STD MAGICALC BATCH SYSTEM(SINGLE USER)', 'SET', '2888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('131', 'BUNDLED PACKAGE', 'WINDOWS 8 COMPATIBLE PAYWIN PACKAGEWINDOWS 8 COMPATIBLE TRADPAC.IAFSAMSUNG LAPTOP', 'PKG', '6588', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('132', 'SAMSUNG', 'SAMSUNG LAPTOPWINDOWS 7 OPERATING SYSTEM', '', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('133', 'ENH.TP', 'AUTOMATION PACKAGE-------------------A. TRADPAC.IAF SYSTEMB. POWER INVENTORY SYSTEMC. PAYROLL SYSTEMD. HUMAN RESOURCE SYSTEME. LEAVE MANAGEMENT SYSTEMF. 2 X SAMSUNG LAPTOP', 'PKG', '15000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('134', 'PIC-C1', 'PIC AUTOMATION PACKAGE CA) 3X SAMSUNG ATIV BOOK 9 LAPTOPB) PAYWIN SYSTEMC) LEAVE MANAGEMENT SYSTEMD) HUMAN RESOURCE SYSTEME) TRADPAC.IAF SYSTEM', '', '15000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('135', 'W8-TP.IAF', 'WINDOWS 8-COMPATIBLE TRADPAC.IAF SYSTEM(SINGLE USER)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('136', 'W8-PAYWIN', 'WINDOWS 8-COMPATIBLE PAYWIN(SINGLE USER)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('137', 'W8-PAYPLUS', 'WINDOWS 8-COMPATIBLE PAYWIN PLUS(SINGLE USER)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('138', 'PIC-C2', 'PIC AUTOMATION PACKAGEA) 1X HP DESKTOPB) TRADPAC.IAF VERSION', '', '5000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('139', 'PIC-A2', 'PIC AUTOMATION PACKAGE AA) TRADPAC.IAF VERSIONB) 1X DESKTOP', '', '5000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('140', 'PIC-B', 'PIC AUTOMATION PACKAGE BA) 2 X SAMSUNG LAPTOPB) 1 X STANDARD PAYWIN PACKAGEC) 1 X STANDARD TRADPAC.IAF PACKAGE', 'PKG', '10000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('141', 'UPG-EXT', 'UPGRADE EXISTING SYSTEM TO WINDOWS8 COMPATIBLE', 'SET', '3000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('142', 'HP-001', 'HP TOUCH SMART n033txIntel core i5-4200u4gb ram500gb HDD + 24gb ssdGt740 2gb graphic14\"Built in dvdrw', 'PC', '980', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('143', 'L-001', 'LENOVO g40INTEL CORE i7 4500u8gb ram500gb HDDDvdrw2gb v-ramWin 814\"', 'PC', '980', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('144', 'HP-002', 'hp 400-235di5-4570/4/1tb/win 8', 'PC', '930', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('145', 'HPM-001', 'hp 20\" monitor', 'PC', '160', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('146', 'CP-001', 'CANON IMAGE GLASS LBP8780xA3 mono laser printerPrint speed up to 40ppmDuplex print up to 20ppmMax paper input capacity up to 2000 sheets', 'PC', '2600', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('147', 'MO-001', 'MICROSOFT OFFICE HOME & STUDENT 2014', 'PC', '189', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('148', 'L-002', 'LENOVO DESKTOP H530S(57324737)I5-4570 3.2/8GB/1TBWIN 8', 'PC94', '940', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('149', 'LM-001', 'LENOVO MONITOR 23\"', 'PC', '239', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('150', 'L-003', 'LENOVO LAPTOP G410(59402691)-I5-4200M/8GB/500GBWIN 8', 'PC', '889', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('151', 'M-002', 'NEW MICROSOFT OFFICE 365 PERSONAL 20131 YEAR SUBSCRIPTIONCONSISTS OF WORDS, EXCEL, POWERPOINTOUTLOOK', 'PC', '89', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('152', 'HP-003', 'HP OFFICEJET PRO 8600 eAiO PRINTERPRINT/SCAN/COPY/FAX/WEB/EPRINT. PRINT:BLACK32PPM, COLOUR 32PPM. PRINT DUTY CYCLE25,000 PAGES MONTHLY.RESOLUTION UP TO 4800X1200DPISCAN:FLATBED WITH ADF.SCAN UP TO 4800 DPI. COPY:BLACK 32PPM, COLOUR32PPM. FAX:4 SECONDS PER PAGE.OTHERS:DISPLAY LCD 2.65\"CGD(COLOUR GRAPHICS),TOUCHSCREEN. 128MB MEMORY. 250-SHEETS INPUT TRAY, 150-SSHEETS OUTPUT TRAY, 35 SHEETS ADF.DUPLEX PRINT.NETWORKING:1 ETHERNET, 2 USB 2.0.', 'PC', '335', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('153', 'HP-004', 'HP ENVY 15-J126TXi7-4700MQ2.4/8/750/W8', 'PC', '1300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('154', 'HP-005', 'HP TABLET 13.3IN INTEL CORE I5-3339Y4GB/64GB + 500GB WIN8 TOUCH SPLIT 13-M010TU', 'PC', '1040', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('155', 'L-004', 'LENOVO B550 - i5 -4570/8GB RAM/ 1TB HDD/ATI8570 2GB/WIN 8/23\"/2 YEARS WARRANTY', 'PC', '1400', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('156', 'HPP-001', 'HP PRINTER OJ 6700 PREMIUM EAIO(CN583A)', 'PC', '260', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('157', 'HP-006', 'HP PAVILION 400-265DINTEL CORE I7 - 47704 GB CCR3 RAMNVIDIA GT 630 (2GB)2 TB SATA HDDWIRELESS BUILT-IN (10/100/100WINDOWS 8.1HP WIRELESS KEYBOARD & MOUSE', 'PC', '1120', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('158', 'HPM-002', 'HP MONITOR 23\"', 'PC', '213', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('159', 'HP-007', 'HP ELITEDESK 800 G1(TWR)i7-4790 3.6GHz/8gb ram/500gb HDD/W7 , 8PRO', 'PC', '1599', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('160', 'HPM-003', 'HP MONITOR 23\"', 'PC', '219', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('161', 'AI-001', 'IPAD MINI RETINA DISPLAY WIFI + CELLULAR 16GB', 'PC', '706', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('162', 'AI-002', 'IPAD MINI WI-FI 16GB', 'PC', '396', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('163', 'W8-TP', 'WINDOWS 8 COMPATIBLE TRADPAC STANDARD SYSTEM', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('164', 'L-005', 'LENOVO C560INTEL CORE i5/4GB RAM/1TB HDD/nvidia 2gb/WIN 8/23\" WARRANTY 1 YEAR', 'PC', '1280', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('165', 'HP-008', 'HP PAV 14-n001txintel core i5 4gb ram/500gb HDD win 8 14\"', 'PC', '899', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('166', 'MO-002', 'MICROSOFT OFFICE HOME AND BUSINESS', 'PC', '249', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('167', 'HP-009', 'HP PAV 400-235DINTEL CORE i5 4570 3.2GHZ, 4GB RAM, 1TB HDD,WIN 8, NVIDIA GT625 1GB, 1 YEAR WARRANTY', 'PC', '930', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('168', 'HPM-004', 'HP 20\" MONITOR', 'PC', '150', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('169', 'PIC-A1', 'PIC AUTOMATION PACKAGE AA)1X LAPTOPB)PAYWIN PACKAGEC)LEAVE MANAGEMENTD)HUMAN RESOURCES', '', '5000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('170', 'L-006', 'LENOVO G408GB RAM/500GB HDD/PROCESSOR i7, win8', 'PC', '1099', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('171', 'EPSON-001', 'EPSON LQ-590 DOT MATRIX PRINTER24 PINS, 80 COLUMN (A4 SIZE), 440CPS HIGH SPEED DRAFT FICTION / TRACTOR, OPTIONAL CSF & PULL TRACTORUNIT HANDLES UP TO 5 MULTI-PARTS FORM, 1-YEAR CARRY-IN WARRANTY PARALLEL & USB INETRFACE AS STANDARD, OPTIONAL TYPE-B I/F', 'PC', '680', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('172', 'L-007', 'LENOVO YOGA 11SINTEL i5-4210Y / 8GB RAM / 128GB SSD / INTEL GRAPHICS / WIN 8.1 / 11.6\" / 2 YEAR WARRANTY', 'PC', '1319', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('173', 'L-008', 'LENOVO H530S 57328880 (TOWER)4TH GEN INTEL CORE i7-4770WIN 8.1, 8GB RAM, 2TB HDD,1 YR ON-SITE WARRANTY', 'PC 1', '1150', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('174', 'LM-002', 'LENOVO MONITOR23\" FULL HD, LED MONITOR', 'PC', '220', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('175', 'MO-003', 'MICROSOFT OFFICE HOME AND BUSINESS 2013EXCEL,WORD,POWERPOINT AND OUTLOOK', 'PC', '289', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('176', 'HPP-002', 'HP LASERJET PRO 400 MFP', 'PC', '823', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('177', 'HP-010', 'HP PROBOOK 430G2INTEL CORE i5 4210U/4GB RAM/500GB HDD/13.3\"WIN 7 PRO/3 YEARS WARRANTY', 'PC', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('178', 'ASUS-001', 'ASUS UX302INTEL i7 -4500u/4gb ram/750gb + 16gb ssd cache2 years/touchscreenUPGRADE TO WIN 8.1 PRO', 'PC', '2036', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('179', 'AI-003', 'IPAD AIR 64GB WIFI AND CELLULAR', 'PC', '1093', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('180', 'APPLE-001', 'MACBOOK PRO RETINA DISPLAY 13\"INTEL CORE i5 2.4ghz4gb ram500gb HDD', 'PC', '168', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('181', 'HP-011', 'HP PAV 400-335D WITH 23\"INTEL CORE i5 4590/4GB/1TB/NVIDIA GT750GB V-RAMWIN 8.1', 'PC', '1149', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('182', 'L-009', 'LENOVO C360/4GB RAM UPGRADE TO 8GB RAM/INTEL COREi3/500GB HDD/WIN 8/20\"', 'PC', '800', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('183', 'ASUS-002', 'ASUS K551LN-XX201H 17\"INTEL CORE i7-4510U 4GB RAM 1000GB HDD+24GB SDD/GT840-4GB/DUAL BAND WIFI+GIGABIT LAN', 'PC', '1230', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('184', 'ASUS-003', 'TP500LN-DN119HINTEL CORE i7-4510U 4GB RAM 750GB HDD+24GB SSD/GT840-2GB/FHD 15.6\"/WIN 8', 'PC', '1340', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('185', 'ASUS-004', 'ASUS S301 TOUCHINTEL CORE i5/4GB RAM/500GB HDD/GRAPHIC 2GB V-RAM/WIN 8/1.85KG/2YEARS WARRANTY', 'PC', '1198', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('186', 'APPLE-002', 'IPAD MINI 16GB (WIFI+CELLULAR)7.9 INCHWIFI (802.11A/B/G/N)BLUETOOTH 4.0/4G LTE/NANO-SIM', 'PCS', '706', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('187', 'DELL-001', 'DELL VOSTROINTEL CORE i5 4200U4GB RAM/500GB HDD/WIN8.1 PRO2 YEARS WARRANTY', 'PC', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('188', 'DELL-002', 'DELL 3467 WITH 21.5\' MONITORCORE i5 DUO CORE 3.2GHZ4GB RAM/1TB HDD/WIN 8.11 YEAR WARRANTY', 'PCS', '1190', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('189', 'HP-012', 'HP PAV 23INTEL i7-4790T 2.7GHZ QUAD CORE/8GB RAM/1TB HDD/NVIDIA 2GB V-RAM 23\"/3 YEARS WARRANTY', 'PC', '1550', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('190', 'ASUS-005', 'ASUS P500i5 4210/8GB RAM/500GB HDD/2GB NVIDIA GRAPHIC/15.6\" TOUCH', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('191', 'ASUS-006', 'ASUS P30AD WITH 20\"INTEL CORE i7/4GB RAM/1TB HDD/NVIDIA 1GB VRAM/WIN 8', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('192', 'W8-TP.BK', 'WINDOWS 8 COMPATIBLE TRADPAC BOOKKEEPER\'S VERSION', 'SET', '2888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('193', 'W8-TP.BK.IAF', 'WINDOWS 8 COMPATIBLE TRADPAC BOOKKEEPER\'S VERSIONWITH IRAS AUDIT FILE MODULE', 'SET', '3888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('194', 'APPLE-003', 'APPLE MACBOOK PRO 13\"13\" WITH RETINA DISPLAY256GB/8GB RAM', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('195', 'MO-004', 'MICROSOFT 365', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('196', 'ASUS-007', 'ASUS ET2321INTH-B026Q 23\" TOUCHINTEL CORE i5 4200u/8GB RAM/1TB HDD740 2GB V-RAM/WIN8', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('197', 'FUJI-001', 'FUJI XEROX CM215FWCOLOR MULTIFUNCTION PRINTER12PPM COLOUR,15PPM MONO295MHZ PROCESSOR1200X2400 DPI', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('198', 'WD-001', 'WESTERN DIGITAL PORTABLE HDD', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('199', 'ICV-P', 'ICV AUTOMATION PACKAGEA)PAYWIN PLUS (WINDOWS 8 VERSION)B)LEAVE MANAGEMENT SYSTEMC)HUMAN RESOURCES', '', '4500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('200', 'HP-013', 'HP PAV-14-V045TXi7-4510U/8GB RAM/1TB HDD/WIN 8', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('201', 'ASUS-008', 'ASUS VIVOBOOK S451INTEL CORE i7 4500U/4GB RAM/750HDDNVIDIA GRAPHIC/WIN 8/1 YEAR WARRANTY/14\" TOUCH', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('202', 'L-010', 'LENOVO Z40INTEL CORE i7 4500U/4GB RAM/1TB HDDNVIDIA GRAPHIC/WIN 8', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('203', 'ASUS-010', 'ASUS R409INTEL CORE i7 4500U/8GB RAM/500 HDD/NVIDIA GRAPHIC/WIN 8', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('204', 'L-011', 'LENOVO FLEX 2 14 REDINTEL CORE i7-4510u 2.0GHZ-3.1GHZWINDOWS 8.18GB DDR3 RAM, 1TB HDD + 8GB SSDNVIDIA GEFORCE GT840M 4GB DDR314\" TOUCH FHD LED IPS SCREENUP TO 6 HOURS BATTERY LIFEEXTENDED TO 2 YEARS WARRANTY', 'PC', '1270', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('205', 'P-001', 'BROTHER L2740DWPRINT,COPY,SCAN,FAX,PC FAX,WIRELESS NETWORKING,AUTOMATIC DUPLEX (2-SIDED) PRINT', 'PC', '348', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('206', 'M-001', 'MSI CX61 2PF-1460 LAPTOP(15.6\", i7-4712MQ, GT840M 2G, 4GB DDRIII, 500G SATA, SUPERMULTI, WLAN, BT, 6 CELLS BATTERY & WIN 8.1MULTI LANGUAGE) W/CARRYING BAG', 'PC', '1239', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('207', 'DIY-001', 'INTEL i5 4460 CPU WITH MSI B85 G41 PC MATEKINGSTON 1600MHZ 8GB RAMTOSHIBA 1TB 7200RPM HDDSAMSUNG 24X DVD-RW, DELL P2314 23\" MONITORMS WIN 7 PRO 64BITMSI GT 610 2GB DDR3SEASONIC S12II 520W PSUCOOLER MASTER 311 SILVER CASINGHARDWARE INSTALLATIONLOGITECH MK120 KEYBOARD & MOUSE', 'SET', '1239', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('208', 'IPHONE', 'IPHONE 6+64GB', 'PC', '1288', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('209', 'HP-014', 'HP PAV 14 TOUCHINTEL CORE i5 42104GB RAM/500 HDD/14\"/WINDOW 8/3 YRS WARRANTY', 'PC', '999', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('210', 'HP-015', 'HP PAV 400-336D WITH 23\" MONITORINTEL CORE i7-4790/8GB RAM/2TB HDDNVIDIA GT750 1GB VRAM/WIN 8.1', 'PC', '1519', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('211', 'HP-016', 'HP PAV 14 TOUCHINTEL CORE i7 4500U/4GB RAM/750 HDD/NVIDIA GRAPHICWIN8/14\" TOUCH', 'PC', '1099', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('212', 'DELL-003', 'DELL OPTIPLEX 7020 DT 17-4790/8/1TB/WIN 7,8 PRO(CPU ONLY)', 'PC', '1499', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('213', 'AI-004', 'IPAD AIR 2 WIFI + 4G64GB/SILVER', 'PC', '1008', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('214', 'APPLE-004', 'IPAD MINI 3 WIFI+4GB64GB SILVER', 'PC', '868', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('215', 'HP-017', 'HP PAVILION 14\" NON TOUCHINTEL CORE i7 4510U/8GB RAM/1TB HDD/14\"WIN 8.1', 'PC', '1099', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('216', 'L-012', 'LENOVO FLEX 2-15(59423305) BLK I7-4510U/8/1/WIN 8', 'PC', '1224', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('217', 'IPHONE-001', 'IPHONE 6128GB', 'PC', '1288', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('218', 'ASUS-011', 'ASUS PU301LAINTEL CORE i7-4500U PROCESSOR (4M CACHE, UP TO 3.0GHZ/8GB RAM/500GB HDD(7200RPM)WIN 7 PRO W/ WIN 8 DISC', 'PC', '1798', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('219', 'APPLE-005', 'MACBOOK AIR13-INCH 128GB1.4GHZ DUAL-CORE INTEL CORE i5 PROCESSORTURBO BOOST UP TO 2.7GHZINTEL HD GRAPHICS 50004GB MEMORY128GB PCIe-BASED FLASH STORAGE', 'PC', '1328', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('220', 'MS-001', 'MICROSOFT WIN-PRO PACK PK 8.1 32/64BIT PUP ML TO PRO MC', 'PC', '139', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('221', 'HP-018', 'HP PAVILION SLIMLINE 400-435D4TH GEN INTEL CORE i5-4460 3.2ghz/4gb ram/1tb HDD/NVIDIA GeForce GT705 1GB DDR3/WINDOWS 8.1/1 YEAR ON-SITE WARRANTY', 'PCS', '880', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('222', 'FORM B', 'COMPILATION OF FORM BNOTE : PLEASE SEND US COPY OF FORM B FOR THE LASTYEAR ASSESSMENT TOGETHER WITH THE WRITTEN INSTRUCTIONS REGARDINGS ANY CHAGES TO PERSONEL RELIEFTSSTATUS (eg. Dependent children,dependentparents,course Fees,etc)', 'JOB', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('223', 'FORM P', 'COMPILATION OF FORM PNOTE: IT IS THE CIENT\'S DUTY TO LET US HAVE FULLDETAIL OF PARTNERSHIP INCOMES (eg . Salary, rent,etc)FOR THE PURPOSE OF FORM P COMPILATION.', '', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('224', 'MAGDOS', 'MAGI-CALC*2000 - STD PACKAGEDOS VERSIONSINGLE-USER', 'SET', '2888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('225', 'MAGWIN', 'STANDARD MAGI-CALC ACCOUNTING PACKAGE(SINGLE USER VERSION)', 'SET', '388', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('226', 'TOPWIN', 'TOPFORM STANDARD PACKAGEWINDOWS 95/98SINGLE USER', 'SET', '4888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('227', 'TRADDOS', 'TRADPAC STANDARD PACKAGEDOS VERSIONSINGLE USER', 'SET', '4888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('228', 'TRADWIN', 'STANDARD TRADPAC PLUS ACCOUNTING PACKAGEWINDOWS XP- COMPLIANT/ GST COMPLIANTC/W EZ ACCOUNTING, GL, AR, AP AND GST APPLICATIONS', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('229', 'MDL-DO', 'STANDARD DELIVERY ORDER GENERATOR', 'MDLE', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('230', 'MDL-INV', 'STANDARD INVOICE GENERATOR', 'MDLE', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('231', 'MDL-STK', 'STANDARD STOCKS AND INVENTORY MODULE(USUAL PRICE $600)', 'SET', '300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('232', 'UP-Y2K(A)', 'UPGRADE TO Y2K SYSTEM AS AGREEDNO CHANGES TO PRESENT FEATURES AND FUNCTIONSCONVERSION TO Y2K ONLY IN TERMS OF:DATA ENTRY SCREENSDATA FILES STRUCTURESREPORTSFILES CONVERSION TO NEW SYSTEMSITE INSTALLATION AND TESTING.', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('233', 'UP-Y2K(B)', 'UPGRADE TO Y2K UNDER (B) OPTIONALL EXISTING FEATURES AND FUNCTIONS WILL BERETAINED.WINDOWS 95/98 INTERFACE MENU TO BE ADDEDFILES STRUCTURES CHANGE TO Y2K COMPLIANTALL ENTRY SCREENS TO Y2K COMPLIANTALL REPORTS TO Y2K COMPLIANTTESTING AND DEBUGGINGSITE INSTALLATION.', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('234', 'UP-Y2K(C)', 'CONVERT TO NEW STANDARD SYSTEMSC/W NEW FEATURES AND FUNCTIONS.ALL MASTER FILES WILL BE CONVERTIBLE.TRANSACTIONS FILES may not be fully convertibleand re-entry may be neccessary in some aspects..Price is inclusive of:Training on new systems at our Training CentreInstallation on site.', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('235', 'UP-PEN', 'UPGRADE to Pentium Version of Softwares', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('236', 'DPATCH', 'Data Patching on Siteas per labtest/ as agreed.($330 per visit of max. 3 hours duration).', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('237', 'SUB-L', 'SubLicense for related users stated below:', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('238', 'TRG', 'Training for :[ ] Hour(s)Venue : Our Training Centre', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('239', 'ADD-ON', 'ADD ON MODULE:', 'unit', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('240', 'OLD', 'OLD ITEM BEFORE 1/6/1999', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('241', 'SW', 'ASSORTED SOFTWARES PER FEB STATEMENT', '', '11646', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('242', 'TMPL', 'ASSORTED SOFTWARE @ TFR COST AS PER STATEMENT', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('243', 'BANK', 'BANK CHARGES FOR MONTH', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('244', 'INS', 'INSTALLATION FEES', '', '180', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('245', 'RENT', 'RENTAL PER STATEMENT', '', '900', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('246', 'TP PLUS', 'TRADPAC PLUS (GST COMPLIANT)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('247', 'SWL', 'SOFTWARE COSTS', 'MTH', '33355', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('248', 'PAY2007B', 'STANDARD PAYWIN SYSTEM', 'PKG', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('249', 'SAS', 'SMART ACCOUNTING SERVICES PER ATTACHED', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('250', 'SAS SERVICES', 'SMART ACCOUNTING SERVICES', 'QTR', '1197', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('251', 'SOFT', 'SOFTWARE COST TO TOPFORM FOR OCT\'2007', '', '17176', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('252', 'VGST1', 'PER OUR QUOTATION DATED:', 'SET', '4988', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('253', 'DEBUG', 'TEST AND DE-BUG AFTER MODIFICATION', 'JOB', '100', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('254', 'BACKLOG', 'BACKLOG ACCOUNTS DATA-ENTRY SERVICE. OUR PRICE ISINCLUSIVE OF FOLLOWING:SETTING UP THE CHART OF ACCOUNTSDATA-INPUT FOR SALES, PURCHASES, PAYMENTS ANDCOLLECTION BASED STRICTLY ON SOURCE DOCUMENTS ANDOTHER RECORDS SUBMITTED BY THE CLIENT. THE CLIENTSHALL ENSURE THAT ALL INFORMATION SUBMITTED FORDATA ENTRY IS COMPLETE AND ACCURATE. REPORTS TOBE GENERATED SHALL INCLUDE: GENERAL LEDGER, TRIALBALANCE, PROFIT AND LOSS STATEMENT AND B/SHEET', 'JOB', '1300', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('255', 'TAX', 'FILING OF FORM C', 'YEAR', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('256', 'TPC', 'TRADPAC ACCOUNTING SERVICES', 'QTR', '598', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('257', '001', 'TRADPAC ACCOUNTING SERVICES FOR THE MONTH NOV \'09', 'MTH', '350', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('258', 'WKS', 'EZ ACCOUNTING WORKSHOP', '', '388', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('259', 'FORM C', 'ANNUAL TAX COMPILATION SERVICESFOR FORM C', '', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('260', 'ACRA', 'Filing Annual Returns with ACRA for small exempt', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('261', 'DE', 'DATA EXTRACTIONS SERVICES', 'JOB', '550', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('262', 'DM', 'DATA-MERGING', 'JOB', '330', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('263', 'DIS', 'GOODWILL DISCOUNT AS AGREED BY DAVID', 'SET', '-1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('264', 'REDO', 'RE-WORK AS FOLLOWS', 'JOB', '800', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('265', 'EXT', 'EXTENSION OF TPC SERVICE', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('266', 'M-FLYER', 'M-FLYER ORDER CONFIRMATION', 'SVC', '2000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('267', 'TAX 4', 'ANNUAL TAX RETURNS FOR SOLE PROPRIETOR--------------------------------------NOTE: The client shall provide the Trading Profitand Loss Statement together with other supportingschedules and information (if any) for the purposeof annual tax returns', 'JOB', '800', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('268', 'TAX 5', 'ANNUAL TAX RETURNS FOR SOLE PROPRIETOR--------------------------------------THE CLIENT SHALL PROVIDE DETAILS OF TRANSACTIONSFOR THE BASIS PERIOD ENDING 2010.SUCH INFORMATION PROVIDED MUST BE COMPLETE &ACCURATE AS IT WILL AFFECT THE ACCURACY OF THE TAXRETURNS.WE SHALL COMPILE TAX RETURNS FOR YEAR OFASSESSMENT 2011 BASED ON THE INFORMATION SUBMITTEDBY THE CLIENT.', 'JOB', '1500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('269', 'TAX 5B', 'NOTE: ALL RELEVANT INFORMATION MUST BE SUBMITTEDWITHIN 7 WORKING DAYS FOR THE PURPOSE OF DATAENTRY.', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('270', 'KAS', 'KANGAROO ACCOUNTING SYSTEM', 'SET', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('271', 'Q1', 'QUARTERLY SERVICE CONTRACT', 'JOB', '350', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('272', 'H1', 'TRADPAC CLUB SERVICES CONTRACT', 'MTH', '299', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('273', 'SAMSUNG01', 'SAMSUNG SERIES 3300E4V-A01', 'PC', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('274', 'R-KANG', 'STANDARD KANGAROO SYSTEM', '', '2500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('275', 'TP.IAF', 'STD TRADPAC.IAF VERSION(SINGLE USER)', '1', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('276', 'PAYSLIPS', 'PAYSLIPS', 'BOX', '185', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('277', 'TP.BOOK-KEEPER\'S', 'STANDARD TRADPAC BOOK-KEEPER\'S(SINGLE USER VERSION)', 'PKG', '3888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('278', 'WIN 7 TP BACTH', 'STANDARD TRADPAC BATCHWINDOWS 7 COMPATIBLE(SINGLE USER VERSION)', 'PKG', '1888', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('279', 'YR END', 'YEAR END CLOSING', 'JOB', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('280', 'WKS14A', 'KANGAROO ACCOUNTING WORKSHOP COVERING:- BASICS OF BUSINESS ACCOUNTING- IRAS COMPLIANT ACCOUNTING- NEW GST TAX CODES- MAKING USE OF KEY ACCOUNTING RATIOS- HANDS ON FEEL OF ACTUAL IRAS COMPLIANTACCOUNTING SYSTEM', 'PAX', '500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('281', 'A-001', 'ACER S7-392-54208G 12TWSCORE i5-4200U 1.6GHZ/8GB/128GB SSD/13.3\" 2560X1920WQHD LED TFT LCD/WINDOW 8', 'PC', '1900', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('282', 'A-002', 'ACER R7-572G-54208G1TACORE i5-4200U 1.6/4gb+4gb/1tb/dvdrw/multi-touch 15.6\" FULL HD 1920x1024 LED LCD/NIVDIA GEFORCE GT7502GB DDR5 GRAPHIC/WINDOW 8', 'PC', '1600', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('283', 'IN-001', 'DELL LATITUDE 14 5000 SERIESCOMPONENTS (AS PER YOUR QUOTE ATTACHED)', 'PC', '2407', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('284', 'I-001', 'IPAD AIR 128GB-WIFI WHITE/SPACE GRAYA7 CHIP WITH 64-BIT ARCHITECTUREM7 MOTION COMPRESSOR9.7\" RETINA DISPLAY', 'PC', '1050', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('285', 'A-0001', 'ASUS K450 NOTEBOOKINTEL CORE i7 QUAD CORE/8GB RAM/750GB HDD/nvidia2gb v-ram/14\" win 8/2 years warranty', 'PC', '1400', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('286', 'MIC-001', 'MICROSOFT OFFICE HOME AND STUDENT', 'PC', '189', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('287', 'PH-001', 'PHOTOSHOP CS61 USER', 'PC', '963', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('288', 'BP-001', 'BROTHER 3040CN MONO LASER WITH FAX(ALL IN ONE)', 'PC', '348', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('289', 'P-002', 'HP LASER JET PRO 200 COLOURMFP M276 NW PRINTER', 'PC', '749', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('290', 'G-001', 'GARMIN NUVI 52LM 5.0\"GPSSG/MY BUILT-IN4GB/2YRS', 'PC', '180', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('291', 'SP-001', 'SAMSUNG GALAXY S4 16GBLTE-WHITE', 'PC', '848', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('292', 'POS-0001', 'POS TERMINAL : RAVEN D-SERIES X 1 UNIT1D HANDHELD BARCODE SCANNER X 1 UNITTHERMAL RECEIPT PRINTER 80MM X 1 UNIT', 'SET', '1900', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('293', 'PIC-C', 'PIC AUTOMATION PACKAGE', '', '15000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('294', 'MIC-002', 'MICROSOFT OFFICE HOME AND BUSINESS 2013', 'PC', '289', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('295', 'MP-001', 'APPLE MACBOOK PRO 13\" ME865ZP/A C152.4GHZ/8GB/256GB', 'PC', '1200', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('296', 'EP-001', 'EPSON LQ-310 DOT MATRIX', 'PC', '369', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('297', 'A-003', 'ACER V5-552GA10/8GB RAM/500HDD/87502GB/W8/15.6\"', 'PC', '1198', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('298', 'MP-002', 'MACBOOK PRO WITH RETINA DISPLAY15-INCH MODEL-RETINA DISPLAY WITH 2880-BY-1800 RESOLUTION-2.0GHZ OR 2.3GHZ QUADCORE INTEL CORE i7 PROCESSOR-8GB MEMORY, 256GB-INTEL IRIS PRO GRAPHICS-TWO THUNDERBOLT 2 PORTS-TWO USB 3 PORTS-HDMI PORT-SDXC CARD SLOT', 'PC', '2688', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('299', 'I-002', 'IPAD AIR WIFI9.7-INCH RETINA DISPLAYA7 CHIP WITH M7 MOTION COPROCESSIRBUILT-IN WI-FI(802.11A/B/G/N) WITH MIMO SUPPORTUP TO 10 HOURS OF BATTERY LIFE5MP ISIGHT CAMERA WITH 1080P HD VIDEO RECORDINGFACETIME HD CAMERA, IPHOTO, IMOVIE,GARAGEBAND, PAGES, NUMBERS AND KEYNOTE APPS INCLUDED, IOS 7 AND ICLOUD', 'PC', '928', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('300', 'I-003', 'IPAD MINI WI-FI 16GB', 'PC', '396', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('301', 'MP-003', 'MACBOOK PRO RETINA DISPLAYi5 2.8ghz/8gb ram/512GB ssd', 'PC', '2316', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('302', 'I-004', '21.5-inch iMACINTEL i5 2.9GHZ/8GB RAM/1 TB HDD/NVIDIA GT750 1GBV-RAM', 'PC', '2025', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('303', 'P-003', 'HP LASERJET M1132(PRINT, SCAN AND COPY)', 'PC', '205', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('304', 'A-004', 'ACER M4630 WITH 19.5\" MONITORINTEL CORE i3 / 4GB/ 50OGB HDD/ WIN 7 PROWITH WIN 8 RECOVERY', 'PC', '930', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('305', 'A-005', 'ACER V3-111PENTIUM QUAD CORE PROCESSOR/4GB RAM/500GB HDD/11.6\"/WIN8 WITH FREE OFFICE 365', 'PC', '650', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('306', 'ACER-001', 'ACER AXC605(I446MR1T) WITH 23\" MONITORi5-4460/3.2GHZ/4GB RAM/1TB HDD/WIN 8.1', 'PC', '1030', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('307', 'ACER-002', 'ACER V5-573PG-54218G50AIIi5-4200/4GB RAM/500GB HDD/WIN8.1', 'PC', '980', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('308', 'SAMSUNG-001', 'SAMSUNG M2070FW EXPRESS 20PPMMONO MULTIFUNCTION LASER PRINTER(COPY/PRINT/SCAN/FAX/WIRELESS)', 'PC', '245', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('309', 'MICROSOFT-001', 'MICROSOFT SURFACE PRO 3 WITH KEYBOARDi5/4GB RAM/128GB HDD/WIN 8.0', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('310', 'I-005', 'IPAD MINI 128GB WIFI', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('311', 'BP-002', 'MFC-7470DMONOCHROME LASER MULTI-FUNCTION CENTRE5 IN 1PRINT/COPY/SCAN/FAX/PC FAX', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('312', 'I-006', 'IPAD AIR 64GBWIFI+CELLULAR', 'PCS', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('313', 'I-007', 'IPAD AIR 128GBWIFI+CELLULAR', 'PCS', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('314', 'I-008', 'APPLE IPHONE 5s 16GB', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('315', 'MIC-003', 'MICROSOFT OFFICE 365', 'PC', '89', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('316', 'POW-001', 'POWER BANK10400MAH', 'PC', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('317', 'I-009', 'IPAD AIR 216GB WIFI ONLY', 'PC', '688', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('318', 'I-010', 'IPAD AIR 2 WIFI+4GB64GB/GOLD', 'PC', '1008', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('319', 'I-011', 'IPAD MINI 3 WIFI+4G64GB/GOLD', 'PC', '868', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('320', 'HD-011', '1TB INTERNAL HARDDISK FOR RAID 0', 'PC', '90', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('321', 'IPHONE-002', 'IPHONE 6 64GB SPACE GREY', 'PC', '1148', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('322', 'IPHONE-003', 'IPHONE 64GB GOLD', 'PC', '1148', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('323', 'I-012', 'IPAD AIR 2 WIFI64GB GOLD', '', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('324', 'ACC-001', 'IP6 LEATHER FLIP CASE', 'PC', '40', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('325', 'I-013', 'IPAD AIR WIFI/CELLULAR 128GB (GOLD)', 'PCS', '1148', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('326', 'ACER-003', 'ACER E5 LAPTOPINTEL CORE i5 4210/4GB/500GB/WIN 8/14\"/1 YEAR WARRANTY', 'PCS', '780', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('327', 'ICV-PAY', 'PAYWIN PLUS PACKAGE AS PER ATTACHED ORDER', 'PKG', '4500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('328', 'HP-019', 'HP PAVILION 400-436D WITH 23\"INTEL CORE i7 4790/8GB RAM/2TB HDD/NVIDIA GT750 1GB VRAM/WIN 8.1', 'PCS', '1519', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('329', 'IPHONE-004', 'IPHONE 6 PLUS (SILVER) 128GB', 'PCS', '1448', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('330', 'ICV-TPIAF', 'TRADPAC.IAF PACKAGE AS PER ATTACHED ORDER', 'SET', '4650', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('331', '3I', 'TRADPAC (DOS)', 'SET', '0', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('332', 'BP-003', 'BROTHER PRINTERMFC-J470DW INKJET PRINTERWIRELESS/DUPLEX/FAX', 'PCS', '218', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('333', 'ICV-SMART BIZ', 'SMART BUSINESS SYSTEMS AS PER ATTACHED ORDER', 'PKG', '5000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('334', 'P-004', 'BROTHER MFC-J470DW INKJET PRINTERWIRELESS/DUPLEX/FAX', 'PCS', '218', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('335', 'PD-001', 'PARALLEL DESKTOP AND WIN OS 8.1', 'PCS', '278', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('336', 'HP-020', 'HP PAV 14-238 (WHITE)INTEL CORE i7-5500u/4GB RAM/500GB HDD/NVIDIA 2GB/14\" WIN 8.1', 'PCS', '980', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('337', 'EB-3', 'EMAIL BLASTING SERVICE TO 300K DATABASE', 'PKG', '2800', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('338', 'EB-1', 'EMAIL BLASTING SERVICE TO 100K DATABASE', 'PKG', '1000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('339', 'DIYA', 'STANDARD DIYA SYSTEM WIN8 COMPATIBLE', 'SET', '3000', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('340', 'PIC-PAY.PLUS', 'PAYWIN PLUS PACKAGE AS PER ATTACHED ORDER', 'PKG', '4500', '1', NULL, NULL, '1');
INSERT INTO `billing_master` (`billing_id`, `stock_code`, `billing_description`, `billing_uom`, `billing_price_per_uom`, `gst_id`, `billing_update_stock`, `billing_type`, `status`) VALUES ('341', 'PIC TRADPAC.IAF', 'STANDARD TRADPAC.IAF ACCOUNTING PACKAGE', 'SET', '4650', '1', NULL, NULL, '1');


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


