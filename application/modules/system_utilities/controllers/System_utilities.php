<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

   		
	class System_utilities extends MY_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('system_utilities/system_utilities_model','system_master');
        }   
	
		public function backup_database()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
            // prev_blockbill_backup();
			databaseBackup();
			redirect('dashboard','refresh');
		}
		public function initialize_database()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			databaseInitialize();
			redirect('dashboard','refresh');
		}
		
		public function restore_database($action="form")
		{
			is_logged_in('admin');
			// has_permission();
			if($action=="form"){ 
				$this->body_vars['save_url']= base_url('system_utilities/restore_database/save');
			}
			if ($action=="save") {
				$data=file_upload(date('YmdHis'),"db_file","database_restore_files");
				$this->load->helper("file");
				// d($data);
				if($data['status']){
					$sql_file=$data["upload_data"]['full_path'];
					$query_list = explode(";", read_file($sql_file));
					
					//This foreign key check was disabled for 1 table referred by 2 tables
					//Cannot delete or update a parent row: a foreign key constraint fails # # TABLE STRUCTURE FOR: groups # DROP TABLE IF EXISTS `groups`
					$this->db->query('SET foreign_key_checks = 0');
					
					d($query_list);
					foreach($query_list as $query):
						$query=trim($query);
						if($query!=""){
	     					$this->db->query($query);
	     				}
	     			endforeach;
	     			$this->db->query('SET foreign_key_checks = 1');
	     			set_flash_message('message','success',"System Restored Successfully");
     			}
     			else{
     				set_flash_message('message','warning',$data["error"]);	
     			}
     			redirect('system_utilities/restore_database','refresh');
			}
		}

        function DownloadFile($file) { // $file = include path
            if(file_exists($file)) {                
                header('Content-Description: File Transfer');
                //header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
            }
        }

        function getInsertCustomerDbf()
        {

            $table="customer_master";
            $join_table = array('currency_master','country_master');
            $join_condition=array('customer_master.currency_id = currency_master.currency_id','customer_master.country_id = country_master.country_id');
            $where = array('flag' => 'C');
            $columns=array("customer_code","customer_name", "customer_bldg_number", "customer_street_name", "customer_postal_code", "customer_contact_person", "customer_phone","customer_fax","customer_email","customer_credit_term_days","customer_credit_limit","currency_name","customer_uen_no","customer_gst_number","country_code");
            $table_id="customer_id";

                
            $list = $this->system_master->get_datatables($table,$columns,$join_table,$join_condition,$where,$table_id);
            
            return $list;
        }

        public function export_customer_master()
        {

            require_once "util_github/Column.class.php";
            require_once "util_github/Record.class.php";
            require_once "util_github/Table.class.php";
            require_once "util_github/WritableTable.class.php";
                        
            /* sample data */  
            $fields = array(
                array("IDEN" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("NAME" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("ADD1" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("ADD2" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("ADD3" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("ADD4" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("ADD5" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("CONT" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("TEL1" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("TEL2" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("FAXI" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("TELX" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("TERM" , DBFFIELD_TYPE_FLOATING, 10, 0),
                array("LIMI" , DBFFIELD_TYPE_FLOATING, 10, 2),
                array("CURR" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("UEN" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("GSTNO" , DBFFIELD_TYPE_CHAR, 100, 0),
                array("CTY" , DBFFIELD_TYPE_CHAR, 100, 0),
            );
             
            /* create a new table */
            $tableNew = XBaseWritableTable::create("CUSTOMER.dbf",$fields);
            
            $insert_dbf = $this->getInsertCustomerDbf();


            //var_dump(json_encode($insert_dbf));exit();
            $cnt = count($insert_dbf);
                       
            /* insert some data */
            for ($i=0; $i < $cnt ; $i++) { 
                $r = $tableNew->appendRecord();

                $r->setObjectByName("IDEN",$insert_dbf[$i]->customer_code);
                $r->setObjectByName("NAME",$insert_dbf[$i]->customer_name);
                $r->setObjectByName("ADD1",$insert_dbf[$i]->customer_bldg_number);
                $r->setObjectByName("ADD2",$insert_dbf[$i]->customer_street_name);
                $r->setObjectByName("ADD3",$insert_dbf[$i]->customer_postal_code);
                $r->setObjectByName("CONT",$insert_dbf[$i]->customer_contact_person);
                $r->setObjectByName("TEL1",$insert_dbf[$i]->customer_phone);
                $r->setObjectByName("FAXI",$insert_dbf[$i]->customer_fax);
                $r->setObjectByName("TELX",$insert_dbf[$i]->customer_email);
                $r->setObjectByName("TERM",$insert_dbf[$i]->customer_credit_term_days);
                $r->setObjectByName("LIMI",$insert_dbf[$i]->customer_credit_limit);
                $r->setObjectByName("CURR",$insert_dbf[$i]->currency_name);
                $r->setObjectByName("UEN",$insert_dbf[$i]->customer_uen_no);
                $r->setObjectByName("GSTNO",$insert_dbf[$i]->customer_gst_number);
                $r->setObjectByName("CTY",$insert_dbf[$i]->country_code);

                $tableNew->writeRecord();    
            }
             
            $file = 'CUSTOMER.dbf';
            $this->DownloadFile($file);

        }

        function getInsertReceiptDbf()
        {
            $table="receipt_master";
            $join_table = array('customer_master','currency_master',);
            $where = array('user_id' => $this->session->user_id);
            $join_condition=array('receipt_master.customer_id = customer_master.customer_id','customer_master.currency_id = currency_master.currency_id');
            $columns=array("receipt_master.receipt_ref_no","receipt_master.created_on", "customer_master.customer_code", "receipt_master.currency", "currency_master.currency_rate", "receipt_master.amount AS foreign_amount", "receipt_master.amount/currency_master.currency_rate AS local_amount","other_reference");
            $table_id="receipt_id";

                
            $list = $this->system_master->get_datatables($table,$columns,$join_table,$join_condition,$where,$table_id);
            
            return $list;
        }

        public function export_receipt_master()
        {
            require_once "util_github/Column.class.php";
            require_once "util_github/Record.class.php";
            require_once "util_github/Table.class.php";
            require_once "util_github/WritableTable.class.php";
                        
            /* sample data */  
            $fields = array(
                array("ENTR" , DBFFIELD_TYPE_CHAR, 5, 0),
                array("ACCN" , DBFFIELD_TYPE_CHAR, 5, 0),
                array("DREF" , DBFFIELD_TYPE_CHAR, 12, 0),
                array("DATE" , DBFFIELD_TYPE_DATE, 10, 0),
                array("IDEN" , DBFFIELD_TYPE_CHAR, 10, 0),
                array("CURR" , DBFFIELD_TYPE_CHAR, 3, 0),
                array("RATE" , DBFFIELD_TYPE_FLOATING, 9, 4),
                array("FAMT" , DBFFIELD_TYPE_FLOATING, 13, 2),
                array("AMOU" , DBFFIELD_TYPE_FLOATING, 13, 2),
                array("REMA" , DBFFIELD_TYPE_CHAR, 80, 0),
            );
             
            /* create a new table */
            $tableNew = XBaseWritableTable::create("FAST_R.dbf",$fields);
            
            $insert_dbf = $this->getInsertReceiptDbf();

            //var_dump($insert_dbf);exit;

            $cnt = count($insert_dbf);
                       
            /* insert some data */
            for ($i=0; $i < $cnt ; $i++) { 
                $r = $tableNew->appendRecord();
                
                if ($insert_dbf[$i]->bank == '') {
                    $r->setObjectByName("ENTR",'CA101');    
                }
                else 
                {
                    $r->setObjectByName("ENTR",$insert_dbf[$i]->bank);    
                }
                $r->setObjectByName("ACCN",'CA001');
                $r->setObjectByName("DREF",$insert_dbf[$i]->receipt_ref_no);
                $r->setObjectByName("DATE",$insert_dbf[$i]->created_on);
                $r->setObjectByName("IDEN",$insert_dbf[$i]->customer_code);
                $r->setObjectByName("CURR",$insert_dbf[$i]->currency);
                $r->setObjectByName("RATE",$insert_dbf[$i]->currency_rate);
                $r->setObjectByName("FAMT",$insert_dbf[$i]->amount);
                $r->setObjectByName("AMOU",$insert_dbf[$i]->amount/$insert_dbf[$i]->currency_rate);
                $r->setObjectByName("REMA",$insert_dbf[$i]->other_reference);

                $tableNew->writeRecord();    
            }
             
            $file = 'FAST_R.dbf';
            $this->DownloadFile($file);
        }

        function getCompanyGstReg()
        {
            return $this->system_master->get_company_profile();
        }

        function getInsertInvoiceDbf()
        {
            $table="invoice_product_master";
            $join_table = array('gst_master','invoice_master','salesman_master','customer_master','currency_master');
            $where = array('user_id' => $this->session->user_id);
            $join_condition=array('invoice_product_master.gst_id=gst_master.gst_id','invoice_product_master.invoice_id = invoice_master.invoice_id','invoice_master.salesman_id = salesman_master.s_id','invoice_master.customer_id=customer_master.customer_id','currency_master.currency_id=customer_master.currency_id');
            $columns=array("invoice_master.invoice_ref_no","invoice_master.created_on", "customer_master.customer_code", "currency_master.currency_name", "currency_master.currency_rate", "invoice_master.final_total", "invoice_master.final_total/currency_master.currency_rate", "invoice_master.lump_sum_discount_price","gst_master.gst_code","gst_master.gst_rate","invoice_master.final_total/currency_master.currency_rate/gst_master.gst_rate,salesman_master.s_code");
            $table_id="i_p_id";

                
            $list = $this->system_master->get_datatables($table,$columns,$join_table,$join_condition,$where,$table_id);
            
            return $list;
        }

        public function export_invoice_master()
        {
            require_once "util_github/Column.class.php";
            require_once "util_github/Record.class.php";
            require_once "util_github/Table.class.php";
            require_once "util_github/WritableTable.class.php";
                        
            /* sample data */  
            $fields = array(
                array("ENTR" , DBFFIELD_TYPE_CHAR, 5, 0),
                array("ACCN" , DBFFIELD_TYPE_CHAR, 5, 0),
                array("DREF" , DBFFIELD_TYPE_CHAR, 12, 0),
                array("DATE" , DBFFIELD_TYPE_DATE, 10, 0),
                array("IDEN" , DBFFIELD_TYPE_CHAR, 10, 0),
                array("CURR" , DBFFIELD_TYPE_CHAR, 3, 0),
                array("RATE" , DBFFIELD_TYPE_NUMERIC, 9, 4),
                array("FAMT" , DBFFIELD_TYPE_FLOATING, 13, 2),
                array("AMOU" , DBFFIELD_TYPE_FLOATING, 13, 2),
                array("DOCUAMOU" , DBFFIELD_TYPE_FLOATING, 13, 2),
                array("SMAN" , DBFFIELD_TYPE_CHAR, 5, 0),
               
                array("DONE" , DBFFIELD_TYPE_LOGICAL, 1, 0),
                array("GSTCATE" , DBFFIELD_TYPE_CHAR, 8, 0),
                array("GSTPERC" , DBFFIELD_TYPE_FLOATING, 7, 2),
                array("GSTAMOU" , DBFFIELD_TYPE_FLOATING, 13, 2),
                
            );
             
            /* create a new table */
            $tableNew = XBaseWritableTable::create("EZ_CS.dbf",$fields);
            
            $insert_dbf = $this->getInsertInvoiceDbf();

            $companygstreg = $this->getCompanyGstReg()[0]->gst_reg_no;
            //var_dump($companygstreg);exit;
            //var_dump($insert_dbf);exit;

            $cnt = count($insert_dbf);
                       
            /* insert some data */
            for ($i=0; $i < $cnt ; $i++) { 
                $r = $tableNew->appendRecord();
                
                $r->setObjectByName("ENTR",'S0001'); 
                $r->setObjectByName("ACCN",'CA001');
                $r->setObjectByName("DREF",$insert_dbf[$i]->invoice_ref_no);
                $r->setObjectByName("DATE",$insert_dbf[$i]->created_on);
                // echo $insert_dbf[$i]->created_on;
                // exit;
                $r->setObjectByName("IDEN",$insert_dbf[$i]->customer_code);
                $r->setObjectByName("CURR",$insert_dbf[$i]->currency_name);
                $r->setObjectByName("RATE",$insert_dbf[$i]->currency_rate);
                $r->setObjectByName("FAMT",$insert_dbf[$i]->product_total + $insert_dbf[$i]->product_total * $insert_dbf[$i]->gst_rate / 100);
                $r->setObjectByName("AMOU",$insert_dbf[$i]->product_total + $insert_dbf[$i]->product_total * $insert_dbf[$i]->gst_rate / 100/$insert_dbf[$i]->currency_rate);
                $r->setObjectByName("DOCUAMOU",$insert_dbf[$i]->product_total);
                $r->setObjectByName("SMAN",$insert_dbf[$i]->s_code);
                
                if (isset($companygstreg)) {

                    $r->setObjectByName("DONE",'T');    
                    $r->setObjectByName("GSTCATE",$insert_dbf[$i]->gst_code);
                    $r->setObjectByName("GSTPERC",$insert_dbf[$i]->gst_rate);
                    $r->setObjectByName("GSTAMOU",($insert_dbf[$i]->product_total + $insert_dbf[$i]->product_total * $insert_dbf[$i]->gst_rate / 100/$insert_dbf[$i]->currency_rate) * $insert_dbf[$i]->gst_rate / 100);
                }
                else
                {
                    $r->setObjectByName("DONE",'F');    
                }
                $tableNew->writeRecord();    
            }
             
            $file = 'EZ_CS.dbf';
            $this->DownloadFile($file);
        }
		
		public function import_customer_master($action="form")
		{
			is_logged_in('admin');
			// has_permission();
			
			if($action=="form"){
				$this->body_vars['save_url']= base_url('system_utilities/import_customer_master/save');
			}
			if ($action=="save") {
			    
			    require_once "util_github/Column.class.php";
                require_once "util_github/Record.class.php";
                require_once "util_github/Table.class.php";
                require_once "util_github/WritableTable.class.php";
            	
				$data=file_upload(date('YmdHis'),"db_file","database_import_files");
				$this->load->helper("file");
			
				if($data['status']){
					$dbf_file=$data["upload_data"]['full_path'];
			        
			    	
                	/* create a table object and open it */
                	$table = new XBaseTable($dbf_file);
                	$table->open();
                
                    $ctr = 0;

                    zapCustomer_Master();
                    
                    while($record =$table->nextRecord())
                    {
                        //var_dump($table);exit();
                        $insert_data['customer_code'] = $record->getStringByName("IDEN");
                        $insert_data['customer_name'] = $record->getStringByName("NAME");
                    
                        $address1 = $record->getStringByName("ADD1");
                        $address2 = $record->getStringByName("ADD2");
                        $address3 = $record->getStringByName("ADD3");
                        $address4 = $record->getStringByName("ADD4");
                        $address5 = $record->getStringByName("ADD5");
                        
                        if($address5 !="")
                        {
                        	$insert_data['customer_postal_code'] = $address5;
                        
                        	$insert_data['customer_street_name'] = $address2. ", ". $address3. ", ". $address4;
                        
                        	$insert_data['customer_bldg_number'] = $address1;
                        }
                        
                        else if($address4 !="")
                        {
                        	$insert_data['customer_postal_code'] = $address4;
                        
                        	$insert_data['customer_street_name'] = $address2. ", ". $address3;
                        
                        	$insert_data['customer_bldg_number'] = $address1;
                        }
                        
                        else if($address3!="")
                        {
                        	$insert_data['customer_postal_code'] = $address3;
                        
                        	$insert_data['customer_street_name'] = $address2;
                        
                        	$insert_data['customer_bldg_number'] = $address1;
                        }
                        
                        else if($address2!="")
                        {
                        	$insert_data['customer_street_name'] = $address2;
                        
                        	$insert_data['customer_bldg_number'] = $address1;
                        }
                        
                        else if($address1!="")
                        {
                        	$insert_data['customer_bldg_number'] = $address1;
                        }
                        else
                        {
                            $insert_data['customer_bldg_number'] = '';
                            $insert_data['customer_street_name'] = '';
                            $insert_data['customer_postal_code'] = '';
                        }
                        
                        $insert_data['customer_bldg_number'] = str_replace(";",",",$insert_data['customer_bldg_number']);
                        $insert_data['customer_street_name'] = str_replace(";",",",$insert_data['customer_street_name']);
                        $insert_data['customer_postal_code'] = str_replace(";",",",$insert_data['customer_postal_code']);
                        
                        $insert_data['customer_phone'] = $record->getStringByName("TEL1");
                        $insert_data['customer_fax'] = $record->getStringByName("FAXI");
                        $insert_data['customer_email'] = $record->getStringByName("TELX");
                        $insert_data['customer_contact_person'] = $record->getStringByName("CONT");
                        $insert_data['customer_credit_limit'] = $record->getObjectByName("LIMI");
                        
                        $insert_data['customer_credit_term_days'] = $record->getObjectByName("TERM");
                        
                        $insert_data['currency_id'] = $this->custom->getSingleValue("currency_master","currency_id",array("currency_name" => $record->getStringByName("CURR")));
                        //$insert_data['currency_id'] = currency update from rate.dbf
                        
                        $insert_data['customer_uen_no'] = $record->getStringByName("UEN");
                        $insert_data['customer_gst_number'] = $record->getStringByName("GSTNO");
                        $insert_data['flag'] = "C";
                        //$insert_data['customer_rating'] = $record->getStringByName("IDEN");
                        $insert_data['country_id'] = $this->custom->getSingleValue("country_master","country_id",array("country_code" => $record->getStringByName("CTY")));
                            
                        //$insert_data['status'] = not present in dbf
                        //var_dump($insert_data);exit;
                        
                        $this->custom->insertRow("customer_master",$insert_data);
                        
                        $ctr = $ctr + 1;
                    }
                
                	/* close the table */
                	$table->close();
                	
                	if($ctr > 0)
                	{
                	    set_flash_message('message', 'success', 'Imported '.$ctr.' records');    
                	}
                	
                	else
                	{
                	    set_flash_message('message', 'danger', 'Unable to import');
                	}
    			        
    	     	//		set_flash_message('message','success',"Imported Successfully");
         			}
         			else{
         				set_flash_message('message','warning',$data["error"]);	
         			}
                
                    $this->body_vars['save_url']= base_url('system_utilities/import_customer_master/save');

         		    //redirect('system_utilities/import_customer_master','refresh');
    			}
		}
		
		public function import_salesman_master($action="form")
		{
			is_logged_in('admin');
			// has_permission();
			
			if($action=="form"){
				$this->body_vars['save_url']= base_url('system_utilities/import_salesman_master/save');
			}
			if ($action=="save") {
			    
			    require_once "util_github/Column.class.php";
                require_once "util_github/Record.class.php";
                require_once "util_github/Table.class.php";
                require_once "util_github/WritableTable.class.php";
            	
				$data=file_upload(date('YmdHis'),"db_file","database_import_files");
				$this->load->helper("file");
			
				if($data['status']){
					$dbf_file=$data["upload_data"]['full_path'];
			        
            	    /* create a table object and open it */
                	$table = new XBaseTable($dbf_file);
                	$table->open();
                
                    $ctr = 0;
                    
                    zapSalesMan_Master();
            
                    while($record =$table->nextRecord())
                    {
                        $insert_data['s_code'] = $record->getStringByName("SMAN");
                        $insert_data['s_name'] = $record->getStringByName("NAME");
                        
                        //$insert_data['s_category'] = $record->getStringByName("CTYPE");
                        //ctype is not present in the sent dbf file although mentioned in the file
                        //$insert_data['s_note'] = not present in dbf
                        
                        $this->custom->insertRow("salesman_master",$insert_data);
                        
                        $ctr = $ctr + 1;
                    }
                    
                    	/* close the table */
                    	$table->close();
                    	
                    	if($ctr > 0)
                    	{
                    	    set_flash_message('message', 'success', 'Imported '.$ctr.' records');    
                    	}
                    	
                    	else
                    	{
                    	    set_flash_message('message', 'danger', 'Unable to import');
                    	}
        			        
        	     	//		set_flash_message('message','success',"Imported Successfully");
         		}
         			
     			else{
     				set_flash_message('message','warning',$data["error"]);	
     			}
            
                $this->body_vars['save_url']= base_url('system_utilities/import_salesman_master/save');

     		    redirect('system_utilities/import_salesman_master','refresh');
			}
		}
		
		public function import_billing_master($action="form")
		{
			is_logged_in('admin');
			// has_permission();
			
			if($action=="form"){
				$this->body_vars['save_url']= base_url('system_utilities/import_billing_master/save');
			}
			if ($action=="save") {
			    
			    require_once "util_github/Column.class.php";
                require_once "util_github/Record.class.php";
                require_once "util_github/Table.class.php";
                require_once "util_github/WritableTable.class.php";
            	
				$data=file_upload(date('YmdHis'),"db_file","database_import_files");
				$this->load->helper("file");
			
				if($data['status']){
					$dbf_file=$data["upload_data"]['full_path'];
			        
            	/* create a table object and open it */
            	$table = new XBaseTable($dbf_file);
            	$table->open();
            
            $ctr = 0;
            
            zapBilling_Master();
            
            while($record =$table->nextRecord())
            {
               
                $insert_data['stock_code'] = $record->getStringByName("CODE");

                $desc = $record->getStringByName("DESC");
                $desc.= $record->getStringByName("DESC1");
                $desc.= $record->getStringByName("DESC2");
                $desc.= $record->getStringByName("DESC3");
                $desc.= $record->getStringByName("DESC4");
                $desc.= $record->getStringByName("DESC5");
                $desc.= $record->getStringByName("DESC6");
                $desc.= $record->getStringByName("DESC7");
                $desc.= $record->getStringByName("DESC8");
                $desc.= $record->getStringByName("DESC9");
                
                //trim to remove left and right white space, preg to reduce more than one space to one inside the string
                $desc = trim(preg_replace('/\s+/',' ', $desc));
                
               // $desc = str_replace("(","[",$desc);
                $desc = str_replace(";",",",$desc);
                
                $insert_data['billing_description'] = $desc;
                $insert_data['billing_uom'] = $record->getStringByName("UOM");
                $insert_data['billing_price_per_uom'] = $record->getStringByName("PRIC");
                
                //gst id is required in order to display them in datatable as it is foreign key so keeping it 1
                $insert_data['gst_id'] = 1;

                //other fields are not present in the dbf

                $this->custom->insertRow("billing_master",$insert_data);
                
                $ctr = $ctr + 1;
            }
            
            	/* close the table */
            	$table->close();
            	
            	if($ctr > 0)
            	{
            	    set_flash_message('message', 'success', 'Imported '.$ctr.' records');    
            	}
            	
            	else
            	{
            	    set_flash_message('message', 'danger', 'Unable to import');
            	}
			        
	     	//		set_flash_message('message','success',"Imported Successfully");
     			}
     			else{
     				set_flash_message('message','warning',$data["error"]);	
     			}
            
                $this->body_vars['save_url']= base_url('system_utilities/import_billing_master/save');

     		    redirect('system_utilities/import_billing_master','refresh');
			}
		}
		
	}
		
		/*End of file System_utilities.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/System_utilities.php */