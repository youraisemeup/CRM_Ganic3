<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class Account extends MY_Controller {

		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('account/account_model','account');
	    }	

	    public function index(){
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			// $receipt_where=array('user_id'=>$this->session->user_id);
			/*=========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			/*==========================================*/
			
			/*==========================================*/
			$this->body_file="account/account.php";
		}

		public function open_manage($mode,$row_id="") {
			is_logged_in('admin');
			has_permission();
						
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['open_edit_data']=$open_edit_data=$this->custom->getSingleRow('open_table',array("open_id"=>$row_id)); 
			if($open_edit_data):
				
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array(),array($open_edit_data->customer_id));
				
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('account/create_opentable/edit');
					$this->body_file="account/open_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->invoice->get_customer_details(array('customer_id'=>$invoice_edit_data->customer_id));
					$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
					$data['customer_phone']=$result->customer_phone;
					$data['customer_email']=$result->customer_email;
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$data['currency_amount']=$currency_data->currency_rate;
					$this->body_vars['cust_data']=$data;
					$this->body_vars['mode']="view";
					$this->body_file="invoice/invoice_view.php";
				endif;
				/*==========================================*/
			else:
				redirect('invoice/invoicelist/pending','refresh');
			endif;
			endif;
		}

	    public function receipt_setting($action="form")
		{
			is_logged_in('admin');
			has_permission();
			$where=array('user_id'=>$this->session->user_id);
			$this->body_vars['receipt_details']=$receipt_details=$this->custom->getSingleRow('receipt_setting',$where);
			if($action=="form"){
				$types=array("receipt"=>"Receipt");
				if(!is_null($receipt_details)){
					$this->body_vars['receipt_type_options']=createSimpleDropdown($types,"receipt Type",$receipt_details->receipt_type,0);
				}
				else{
					$this->body_vars['receipt_type_options']=createSimpleDropdown($types,"receipt Type",'',0);	
				}
				$this->body_vars['save_url']=base_url('receipt/receipt_setting/save');
			}
			else if($action=="save"){
				$post=$this->input->post();
				if($post):
					if(is_null($receipt_details)){
						set_flash_message("message","success","Receipt Settings Inserted Successfully !");
						$post['user_id']=$this->session->user_id;
						$this->custom->insertRow('receipt_setting',$post);
					}
					else{
						set_flash_message("message","success","Receipt Settings Updated Successfully !");
						$this->custom->updateRow('receipt_setting',$post,$where);
					}
					redirect('receipt/receipt_setting');
				else:
					show_404();
				endif;
			}
		}

		public function create_new_receipt($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			$post['invoice_reference_id'] = json_encode($post['invoice_reference_id']);
			if (isset($post['ex_ref_no'])) {
				unset($post['ex_ref_no']);
			}
			if($post){
					$receipt_data=$post;
					$receipt_data['modified_on']=date('Y-m-d');
					$receipt_data['user_id']=$this->session->user_id;
					// $receipt_product_data['modified_on']=date('Y-m-d');
					if($action=="new"){
						$receipt_data['created_on']=date('Y-m-d');
						// $invoice_product_data['created_on']=date('Y-m-d');
						$this->custom->updateRow("receipt_setting",array('receipt_number_prefix'=>explode('.', $receipt_data['receipt_ref_no'])[1]),array('user_id'=>$this->session->user_id));
						$receipt_id=$this->custom->insertRow("receipt_master",$receipt_data);
					}
					if($action=="edit"){
						$where=array('receipt_id' => $receipt_data['receipt_id']);
						unset($receipt_data['receipt_id']);
						$this->db->trans_start();
						$res[]=$this->custom->updateRow("receipt_master",$receipt_data,$where);
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Opening Banlance Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('receipt/receiptlist/pending');
			}
		}

		public function receiptlist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function receipt_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['receipt_edit_data']=$receipt_edit_data=$this->custom->getSingleRow('receipt_master',array("receipt_id"=>$row_id));
			if($receipt_edit_data):
				
				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code'),"Customer",array('(',')'),array(),array($receipt_edit_data->customer_id));
				/*==========================================*/
				$this->body_vars['invoice_reference']=$this->custom->createDropdownSelect("invoice_master",array('invoice_id','invoice_ref_no'),"Invoice Ref No",array(''),array('customer_id' => ''));
				/*==========================================*/
				$this->body_vars['total_receipt']=$this->custom->getTotalCount("receipt_master");
				/*==========================================*/
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('receipt/create_new_receipt/edit');
					$this->body_file="receipt/receipt_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->receipt->get_customer_details(array('customer_id'=>$receipt_edit_data->customer_id));
					$country_data=$this->custom->getSingleRow("country_master",array('country_id'=>$result->country_id));
					$data['customer_address1']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name;
					$data['customer_address2']=$country_data->country_name.' , '.$result->customer_postal_code;
					$data['receipt_amount']=$this->custom->convert_number_to_words($receipt_edit_data->amount);
					
					// $data['customer_2']=$result->customer_postal_code;
					// $data['customer_email']=$result->customer_email;
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$data['currency_amount']=$currency_data->currency_rate;
					$this->body_vars['cust_data']=$data;
					$this->body_vars['mode']="view";
					$this->body_file="receipt/receipt_view.php";
				endif;
				/*==========================================*/
			else:
				redirect('receipt/receiptlist/pending','refresh');
			endif;
			endif;
		}

		
		
		public function auditlist()
		{
			is_logged_in('admin');
			has_permission(); 
			$this->body_file="account/audit.php";
		}

		public function opening_balance()
 		{
 			is_logged_in('admin');
 			has_permission();
 			
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			$this->body_vars['save_url']=base_url('account/create_opentable');
 			$this->body_file="account/opening_balance.php";

 		}		

 		public function openlist()
		{
			is_logged_in('admin');
			has_permission();
		}

 		public function create_opentable($action="new")
 		{

 			is_logged_in('admin');
			has_permission(); 
			$post=$this->input->post();
			
			if (isset($post)) {

				$open_data = $post;
				// print_r($post);exit;
				if($action=="new"){
					$insert_data = array();
					if (isset($insert_data)) {
						unset($insert_data);
					}
					$count = count($post['data']['transaction_date']);
					foreach ($post['data']['transaction_date'] as $transaction_date){
					   print_r($transaction_date);
					   $insert_data['open_tran_date'][] = $transaction_date;
					}
					foreach ($post['data']['doc_reference'] as $doc_reference) {
						$insert_data['open_doc_ref'][] = $doc_reference;
					}
					foreach ($post['data']['remarks'] as $remarks) {
						$insert_data['open_remarks'][] = $remarks;
					}
					foreach ($post['data']['amount'] as $amount) {
						$insert_data['open_amount'][] = $amount;
					}
					foreach($post['data']['sign'] as $sign) {
						$insert_data['open_sign'][] = $sign;
					}
					
					for ($i=0; $i < $count ; $i++) { 
						$data['open_tran_date'] = $insert_data['open_tran_date'][$i];
						$data['open_doc_ref'] = $insert_data['open_doc_ref'][$i];
						$data['open_remarks'] = $insert_data['open_remarks'][$i];
						$data['open_amount'] = $insert_data['open_amount'][$i];
						$data['open_sign'] = $insert_data['open_sign'][$i];
						$data['customer_id'] = $post['customer_id'];
						$open_id[]=$this->custom->insertRow("open_table",$data);
					}
				}

				if($action=="edit"){
					
					$where=array('open_id' => $open_data['data']['open_id'][0]);

					$data['open_tran_date'] = $open_data['data']['transaction_date'][0];
					$data['open_doc_ref'] = $open_data['data']['doc_reference'][0];
					$data['open_remarks'] = $open_data['data']['remarks'][0];
					$data['open_amount'] = $open_data['data']['amount'][0];
					$data['open_sign'] = $open_data['data']['sign'][0];
					$data['customer_id'] = $post['customer_id'];

					unset($open_data['open_id']);

					$this->db->trans_start();
					$res[]=$this->custom->updateRow("open_table",$data,$where);
					
					if ($this->db->trans_status() === FALSE || in_array("error", $res))
					{
						set_flash_message("message","danger","Something Went Wrong");	
					    $this->db->trans_rollback();
					}
					else
					{
						set_flash_message("message","success","receipt Updated Successfully");
					    $this->db->trans_commit();
					}
				}
				redirect('account/openlist/confirmed');
			}
 		}
		public function new_debtor()
		{
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			// $receipt_where=array('user_id'=>$this->session->user_id);
			/*=========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			/*==========================================*/
			
			/*==========================================*/
		
			$this->body_file="account/new_debtor.php";
		}

		public function age_debtor()
		{
			is_logged_in('admin');
			has_permission();
			
			$this->body_vars['currency_options']=$this->custom->createDropdownSelect2("accounts_receivable",array('ar_id','currency_type'),"Currency");
		
			$this->body_file="account/age_debtor.php";
		}
		public function other_debtor()
		{
			is_logged_in('admin');
			has_permission();
			// $company_where=array('profile_id'=>1);
			// $this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			// $receipt_where=array('user_id'=>$this->session->user_id);
			/*=========================================*/
			$this->body_vars['currency_options']=$this->custom->createDropdownSelect2("accounts_receivable",array('ar_id','currency_type'),"Currency");
			// $this->data['gst_options']=$this->custom->createDropdownSelect1("gst_master",array('gst_id','gst_code','gst_type','gst_rate'),"GST",array(' ( ', ' ) =>' , '%'),array(),array($row->gst_id));
			/*==========================================*/
			
			/*==========================================*/
		
			$this->body_file="account/other_debtor.php";
		}

		
		public function offset()
		{
		    is_logged_in('admin');
		    has_permission();
		    $company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			// $receipt_where=array('user_id'=>$this->session->user_id);
			/*=========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code', 'currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			
			$this->body_vars['save_url']=base_url('account/offsetRecords');

		    $this->body_file="account/offset.php";
		}

		public function offset_all()
		{
		    is_logged_in('admin');
		    has_permission();
		    $company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$this->body_vars['customer_id_array']=$customer_id_array=$this->custom->getRows("customer_master",array('flag' => 'C'));
			
			$this->body_vars['save_url']=base_url('account/offsetRecords_all');

		    $this->body_file="account/offset_all.php";
		}

		public function offsetRecords()
		{
		    is_logged_in('admin');
		    has_permission();
		    $post=$this->input->post();
		    
		    $date_to_offset = $post['offset_Date'];
		    $cust_id = $post['customer_id'];
		    
            $cus_code=$this->custom->getSingleValue("customer_master","customer_code",array('customer_id'=>$cust_id));

            $this->db->trans_start();
			$ar[]=$this->custom->updateRow("accounts_receivable",array('offset'=>"o"),array('customer_code'=>$cus_code, 'offset !='=>'o', 'doc_date <='=>$date_to_offset, 'settled'=>'y'));
				
			if ($this->db->trans_status() === FALSE || in_array("error", $ar))
			{
				set_flash_message("message","danger","Something Went Wrong");	
			    $this->db->trans_rollback();
			}
			else
			{
				set_flash_message("message","success","Offseted Successfully");
			    $this->db->trans_commit();
			}
    
    		redirect('account/new_debtor');
		}
		
		public function offsetRecords_all()
		{
		    is_logged_in('admin');
		    has_permission();
		    $post=$this->input->post();
		    
		    $date_to_offset = $post['offset_Date'];

		    $customer_id_array=$this->custom->getRows("customer_master",array('flag' => 'C'));
		    foreach ($customer_id_array as $key => $value) {
		    	$cust_id = 	$value->customer_id;
		    	$cus_code=$this->custom->getSingleValue("customer_master","customer_code",array('customer_id'=>$cust_id));

	            $this->db->trans_start();
				$ar[]=$this->custom->updateRow("accounts_receivable",array('offset'=>"o"),array('customer_code'=>$cus_code, 'offset !='=>'o', 'doc_date <='=>$date_to_offset, 'settled'=>'y'));
					
				if ($this->db->trans_status() === FALSE || in_array("error", $ar))
				{
					set_flash_message("message","danger","Something Went Wrong");	
				    $this->db->trans_rollback();
				}
				else
				{
					set_flash_message("message","success","Offseted Successfully");
				    $this->db->trans_commit();
				}	
		    }
    		redirect('account/new_debtor');
		}
		
		public function zap_ar_data()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapAR();
			redirect('dashboard','refresh');
		}
	
	
		}
		/*End of file Invoice.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Invoice.php */