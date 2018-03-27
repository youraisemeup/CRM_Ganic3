<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Backend extends MY_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('backend/backend_model','backend');
	    }
		 
		public function index()
		{
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'));
			/*==========================================*/
			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "),array('billing_type' => 'product'));
			/*==========================================*/
			$this->body_vars['save_url']=base_url('backend/create_new_purchases');
			/*==========================================*/
			$this->body_file="backend/purchases.php";
		}

		// public function other_payment()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$company_where=array('profile_id'=>1);
		// 	$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
		// 	/*==========================================*/
		// 	$payment_where=array('user_id'=>$this->session->user_id);
		// 	$this->body_vars['payment_details']=$payment_details=$this->custom->getSingleRow('payment_setting',$payment_where);
		// 	if(is_null($payment_details)){
		// 		set_flash_message("message","warning","Define a Payment Settings First !");
		// 		redirect('backend/payment_setting');
		// 	}
		// 	/*==========================================*/
		// 	$payment_ref_no=$this->custom->getRowsSorted("payment_master",array(),array(),'payment_id','DESC',1);

		// 	if(!empty($payment_ref_no)){
		// 		$payment_ref_no=$payment_ref_no[0]->payment_ref_no;
		// 		$total_payment=$payment_details->payment_number_prefix+1;
		// 	}
		// 	else{
		// 		$total_payment=$payment_details->payment_number_prefix+1;
		// 	}
		// 	$this->body_vars['total_payment']=$total_payment;
		// 	/*==========================================*/
		// 	$this->body_vars['payee_options']=$this->custom->createDropdownWithoutId("payee",array('payee_name'),"Payee");
		// 	/*==========================================*/
		// 	$this->body_vars['coa_code_options']=$this->custom->createDropdownSelectJoin("chart_of_account",array('coa_id','coa_pre_character','coa_suffix','coa_description'),"Account",array('','',''),"chart_of_account_prefix","chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id",array(),array(),"coa_pre_character","ASC");
		// 	/*==========================================*/
		// 	$this->body_vars['save_url']=base_url('backend/create_other_payment');
		// 	/*==========================================*/
		// 	$this->body_file="backend/other_payment.php";
		// }

		public function other_payment()
		{
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$payment_where=array('user_id'=>$this->session->user_id);
			$this->body_vars['payment_details']=$payment_details=$this->custom->getSingleRow('payment_setting',$payment_where);
			if(is_null($payment_details)){
				set_flash_message("message","warning","Define a Payment Settings First !");
				redirect('backend/payment_setting');
			}
			/*==========================================*/
			$payment_ref_no=$this->custom->getRowsSorted("payment_master",array(),array(),'payment_id','DESC',1);

			if(!empty($payment_ref_no)){
				$payment_ref_no=$payment_ref_no[0]->payment_ref_no;
				$total_payment=$payment_details->payment_number_prefix+1;
			}
			else{
				$total_payment=$payment_details->payment_number_prefix+1;
			}
			$this->body_vars['total_payment']=$total_payment;
			/*==========================================*/
			$this->body_vars['payee_options']=$this->custom->createDropdownSimple("payee",array('payee_name'));
			//$this->body_vars['payee_options']=$this->custom->createDropdownSelect("payee",array('payee_id','payee_name'),"Payee");
			/*==========================================*/
			$this->body_vars['coa_code_options']=$this->custom->createDropdownSelectJoin("chart_of_account",array('coa_id','coa_pre_character','coa_suffix','coa_description'),"Account",array('','',''),"chart_of_account_prefix","chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id",array(),array(),"coa_pre_character","ASC");
			/*==========================================*/
			$this->body_vars['save_url']=base_url('backend/create_other_payment');
			/*==========================================*/
			$this->body_file="backend/other_payment.php";
		}

		public function create_other_payment($action = "new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			if($post){
				if(count($post['coa_id'])>=1){
					$coa_data=$post;
					
					$coa_data['user_id']=$this->session->user_id;
					
					if($action=="new"){

						$this->custom->updateRow("payment_setting",array('payment_number_prefix'=>explode('.', $coa_data['payment_ref_no'])[1]),array('user_id'=>$this->session->user_id));
						
						$insert_payee_data['payee_name'] = $coa_data['payee_name'];
						$payee_id_exist = $this->custom->getSingleValue('payee','payee_id',array('payee_name'=>$coa_data['payee_name']));
						if (!$payee_id_exist) {
							$payee_id[]=$this->custom->insertRow("payee",$insert_payee_data);	
						}
						foreach ($coa_data['coa_row_id'] as $coa_id) {
							$insert_data['opay_coa_id']=$coa_id;
							$insert_data['opay_date']=$coa_data['doc_date'];
							$insert_data['opay_ref_no']=$coa_data['payment_ref_no'];
							$insert_data['opay_amount']=$coa_data['amount'][$coa_id];
							$insert_data['opay_payee']=$coa_data['payee_name'];
							$insert_data['opay_created_on']=date('Y-m-d');
							$insert_data['opay_user_id'] = $coa_data['user_id'];
							
							$opay_id[]=$this->custom->insertRow("other_payment",$insert_data);
						}
					}
					if($action=="edit"){
						//var_dump($coa_data);exit();
						$insert_payee_data['payee_name'] = $coa_data['opay_payee'];
						$payee_id_exist = $this->custom->getSingleValue('payee','payee_id',array('payee_name'=>$coa_data['opay_payee']));
						if (!$payee_id_exist) {
							$payee_id[]=$this->custom->insertRow("payee",$insert_payee_data);	
						}
						$where=array('opay_id' => $coa_data['opay_id_edit']);

						unset($coa_data['opay_id_edit']);
						
						unset($coa_data['payee_id']);
						foreach ($coa_data['coa_row_id'] as $coa_id) {
							$coa_data['opay_amount'] = $coa_data['amount'][$coa_id];	
						}
						$coa_data['opay_user_id'] = $coa_data['user_id'];
						unset($coa_data['user_id']);
						unset($coa_data['coa_row_id']);
						unset($coa_data['amount']);
						unset($coa_data['coa_id']);
						$this->db->trans_start();
						//var_dump($coa_data);exit();
						$res[]=$this->custom->updateRow("other_payment",$coa_data,$where);
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","OTHER Payment Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('backend/opaymentlist/confirmed');
				}
			}
		}

		public function opaymentlist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function opaymentlist_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			//var_dump($row_id);exit();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['opayment_edit_data']=$opayment_edit_data=$this->custom->getSingleRow('other_payment',array("opay_id"=>$row_id));
			//
			if($opayment_edit_data):

				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);

				$payee_edit_id = $this->custom->getSingleValue("payee","payee_id",array("payee_name"=>$opayment_edit_data->opay_payee));

				$this->body_vars['payee_options']=$this->custom->createDropdownSelect("payee",array('payee_id','payee_name'),"Payee",array('','',''),array(),array($payee_edit_id));
				/*==========================================*/
				$this->body_vars['coa_code_options']=$this->custom->createDropdownSelectJoin("chart_of_account",array('coa_id','coa_pre_character','coa_suffix','coa_description'),"Account",array('','',''),"chart_of_account_prefix","chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id",array(),array($opayment_edit_data->opay_coa_id),"coa_pre_character","ASC");
				/*==========================================*/
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('backend/create_other_payment/edit');
					$this->body_file="backend/opayment_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->quotation->get_customer_details(array('customer_id'=>$purchases_edit_data->customer_id));
					$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
					$data['customer_phone']=$result->customer_phone;
					$data['customer_email']=$result->customer_email;
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$data['currency_amount']=$currency_data->currency_rate;
					$this->body_vars['cust_data']=$data;
					$this->body_vars['mode']="view";
					$this->body_file="quotation/quotation_view.php";
				endif;
				/*==========================================*/
			else:
				redirect('backend/opaymentlist/pending','refresh');
			endif;
			endif;
		}

		public function create_new_purchases($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			if($post){
				if(count($post['product_id'])>=1){
					$purchases_data=$post;
					//var_dump($post);exit();
					//var_dump($purchases_data);exit();
					unset($purchases_data['product_row_id']);
					unset($purchases_data['quantity']);
					unset($purchases_data['unit_price']);
					unset($purchases_data['amount']);
					//unset($purchases_data['product_id']);
					$purchases_product_data=array_diff_assoc_recursive($post,$purchases_data);

					//var_dump($purchases_product_data);exit();//
					unset($purchases_data['product_id']);
					
					//unset($purchases_data['freight_insurance']);
					//var_dump($purchases_product_data);exit();
					$purchases_data['modified_on']=date('Y-m-d');
					$purchases_data['user_id']=$this->session->user_id;
					$purchases_data['full_amount']=($purchases_data['total_purchase_b4_gst'] + $purchases_data['gst_in_sgd']) * $purchases_data['currency_amount'];
					$purchases_product_data['modified_on']=date('Y-m-d');
					if($action=="new"){
						
						$purchases_data['created_on']=date('Y-m-d');
						$purchases_product_data['created_on']=date('Y-m-d');

						$purchase_id=$this->custom->insertRow("purchase_master",$purchases_data);

						foreach ($purchases_product_data['product_row_id'] as $product_id) {

							$insert_data['purchase_id'] = $purchase_id;
							$insert_data['product_id']=$product_id;
							$insert_data['quantity']=$purchases_product_data['quantity'][$product_id];
							$insert_data['unit_price']=$purchases_product_data['unit_price'][$product_id];
							$insert_data['amount']=$purchases_product_data['amount'][$product_id];
							$insert_data['modified_on']=$purchases_product_data['modified_on'];
							$insert_data['created_on']=$purchases_product_data['created_on'];
							
							$hist_cost_id[]=$this->custom->insertRow("purchase_product_master",$insert_data);
						}
					}
					if($action=="edit"){
						//var_dump($purchases_data);exit();
						$where=array('purchase_id' => $purchases_data['purchase_id']);
						unset($purchases_data['purchase_id']);
						$this->db->trans_start();
						//var_dump($purchases_data);exit();
						$res[]=$this->custom->updateRow("purchase_master",$purchases_data,$where);
						$res[]=$this->custom->deleteRow("purchase_product_master",$where);
						$purchases_product_data=array_merge($purchases_product_data,$where);
						$purchases_product_data['created_on']=$this->custom->getSingleValue('purchase_master',"created_on",$where);
						foreach ($purchases_product_data['product_row_id'] as $product_id) {
							$insert_data['purchase_id']=$purchases_product_data['purchase_id'];
							$insert_data['product_id']=$product_id;
						
							$insert_data['quantity']=$purchases_product_data['quantity'][$product_id];
							$insert_data['unit_price']=$purchases_product_data['unit_price'][$product_id];
							$insert_data['amount']=$purchases_product_data['amount'][$product_id];
							$insert_data['modified_on']=$purchases_product_data['modified_on'];
							$insert_data['created_on']=$purchases_product_data['created_on'];
							
							$res[]=$this->custom->insertRow("purchase_product_master",$insert_data);
						}
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Purchases Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('backend/purchaseslist/confirmed');
				}
			}
		}

		public function histcostlisting()
		{
			is_logged_in('admin');
			has_permission();
		}	

		public function purchaseslist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function purchaseslist_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			//var_dump($row_id);exit();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['purchases_edit_data']=$purchases_edit_data=$this->custom->getSingleRow('purchase_master',array("purchase_id"=>$row_id));
			//
			if($purchases_edit_data):
				//var_dump($purchases_edit_data);exit();	
				$this->body_vars['purchase_product_edit_data']=$purchase_product_edit_data=$this->custom->getRows('purchase_product_master',array("purchase_id"=>$row_id));
				//var_dump($purchase_product_edit_data);exit();
				foreach ($purchase_product_edit_data as $value) {
					$product_array[]=$value->product_id;
				}
				//var_dump($product_array);exit();
				$this->body_vars['product_array']=$product_array;
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'),array($purchases_edit_data->supplier_id));
				/*==========================================*/
				$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "),array('billing_type' => 'product'));
				/*==========================================*/
				if($mode=="edit"):

					$result= $this->backend->get_customer_details(array('customer_id'=>$purchases_edit_data->supplier_id));
					$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
					$data['customer_phone']=$result->customer_phone;
					$data['customer_email']=$result->customer_email;
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$data['currency_amount']=$currency_data->currency_rate;

					$this->body_vars['cust_data']=$data;
					$this->body_vars['save_url']=base_url('backend/create_new_purchases/edit');
					$this->body_file="backend/purchase_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->quotation->get_customer_details(array('customer_id'=>$purchases_edit_data->customer_id));
					$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
					$data['customer_phone']=$result->customer_phone;
					$data['customer_email']=$result->customer_email;
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$data['currency_amount']=$currency_data->currency_rate;
					$this->body_vars['cust_data']=$data;
					$this->body_vars['mode']="view";
					$this->body_file="quotation/quotation_view.php";
				endif;
				/*==========================================*/
			else:
				redirect('quotation/quotationlist/pending','refresh');
			endif;
			endif;
		}
		//----------------------------------- Accounts Payable ----------------------------------------------
		public function aplisting()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function ap_openbal()
		{
			is_logged_in('admin');
 			has_permission();
 			
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'));
			$this->body_vars['save_url']=base_url('backend/create_ap_open');
 			$this->body_file="backend/ap_openbal.php";
		}

		public function create_ap_open($action="new")
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
						$data['ap_open_tran_date'] = $insert_data['open_tran_date'][$i];
						$data['ap_open_doc_ref'] = $insert_data['open_doc_ref'][$i];
						$data['ap_open_remarks'] = $insert_data['open_remarks'][$i];
						$data['ap_open_amount'] = $insert_data['open_amount'][$i];
						$data['ap_open_sign'] = $insert_data['open_sign'][$i];
						$data['ap_customer_id'] = $post['customer_id'];
						$open_id[]=$this->custom->insertRow("ap_open",$data);
					}
				}

				if($action=="edit"){
					
					$where=array('ap_open_id' => $open_data['data']['ap_open_id'][0]);

					$data['ap_open_tran_date'] = $open_data['data']['transaction_date'][0];
					$data['ap_open_doc_ref'] = $open_data['data']['doc_reference'][0];
					$data['ap_open_remarks'] = $open_data['data']['remarks'][0];
					$data['ap_open_amount'] = $open_data['data']['amount'][0];
					$data['ap_open_sign'] = $open_data['data']['sign'][0];
					$data['ap_customer_id'] = $post['customer_id'];

					unset($open_data['ap_open_id']);

					$this->db->trans_start();
					$res[]=$this->custom->updateRow("ap_open",$data,$where);
					
					if ($this->db->trans_status() === FALSE || in_array("error", $res))
					{
						set_flash_message("message","danger","Something Went Wrong");	
					    $this->db->trans_rollback();
					}
					else
					{
						set_flash_message("message","success","AP Opening Balance Updated Successfully");
					    $this->db->trans_commit();
					}
				}
				redirect('backend/ap_openlist/confirmed');
			}
 		}

 		public function ap_open_manage($mode,$row_id="") {
			is_logged_in('admin');
			has_permission();
						
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['ap_open_edit_data']=$ap_open_edit_data=$this->custom->getSingleRow('ap_open',array("ap_open_id"=>$row_id)); 
			if($ap_open_edit_data):
				
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'),array($ap_open_edit_data->ap_customer_id));
				
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('backend/create_ap_open/edit');
					$this->body_file="backend/ap_open_edit.php";
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

		//----------------------------------- Accounts Payable ----------------------------------------------

		public function offset()
		{
		    is_logged_in('admin');
		    has_permission();
		    $company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			// $receipt_where=array('user_id'=>$this->session->user_id);
			/*=========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'));
			
			$this->body_vars['save_url']=base_url('backend/offsetRecords');

		    $this->body_file="backend/offset.php";
		}

		public function offset_all()
		{
		    is_logged_in('admin');
		    has_permission();
		    $company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			// $receipt_where=array('user_id'=>$this->session->user_id);
			/*=========================================*/
			$this->body_vars['customer_id_array']=$customer_id_array=$this->custom->getRows("customer_master",array('flag' => 'S'));
			
			$this->body_vars['save_url']=base_url('backend/offsetRecords_all');

		    $this->body_file="backend/offset_all.php";
		}

		public function offsetRecords_all()
		{
		    is_logged_in('admin');
		    has_permission();
		    $post=$this->input->post();
		    
		    $date_to_offset = $post['offset_Date'];

		    $customer_id_array=$this->custom->getRows("customer_master",array('flag' => 'S'));
		    foreach ($customer_id_array as $key => $value) {
		    	$cust_id = $value->customer_id;
		    
	            $cus_code=$this->custom->getSingleValue("customer_master","customer_code",array('customer_id'=>$cust_id));

	            $this->db->trans_start();
				$ar[]=$this->custom->updateRow("accounts_payable",array('offset'=>"o"),array('supplier_code'=>$cus_code, 'offset !='=>'o', 'doc_date <='=>$date_to_offset, 'settled'=>'y'));
					
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
    		redirect('backend/credit_statement');
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
			$ar[]=$this->custom->updateRow("accounts_payable",array('offset'=>"o"),array('supplier_code'=>$cus_code, 'offset !='=>'o', 'doc_date <='=>$date_to_offset, 'settled'=>'y'));
				
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
    
    		redirect('backend/credit_statement');
		}

 		public function credit_statement()
		{
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'));
		
			$this->body_file="backend/credit_statement.php";
		}

		public function credit_listing()
		{
			is_logged_in('admin');
			has_permission();
			
			$this->body_vars['currency_options']=$this->custom->createDropdownSelect2("accounts_payable",array('ap_id','currency_type'),"Currency");
		
			$this->body_file="backend/credit_listing.php";
		}

		public function credit_ageing()
		{
			is_logged_in('admin');
			has_permission();
			
			$this->body_vars['currency_options']=$this->custom->createDropdownSelect2("accounts_payable",array('ap_id','currency_type'),"Currency");
		
			$this->body_file="backend/credit_ageing.php";
		}

		/*----------------------Bank Statement Start-------------------------*/
		public function enter_bank_adjustment()
 		{
 			is_logged_in('admin');
 			has_permission();

			$this->body_vars['save_url']=base_url('backend/create_bank_adjustment');
 			$this->body_file="backend/bank_adjustment.php";
 		}
 		public function create_bank_adjustment($action="new")
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
						$data['bank_ad_date'] = $insert_data['open_tran_date'][$i];
						$data['bank_ad_ref'] = $insert_data['open_doc_ref'][$i];
						$data['bank_ad_remarks'] = $insert_data['open_remarks'][$i];
						$data['bank_ad_amt'] = $insert_data['open_amount'][$i];
						$data['bank_ad_sign'] = $insert_data['open_sign'][$i];
						$open_id[]=$this->custom->insertRow("bank_adjustment",$data);
					}
				}

				if($action=="edit"){
					
					$where=array('bank_ad_id' => $open_data['data']['open_id'][0]);

					$data['bank_ad_date'] = $open_data['data']['transaction_date'][0];
					$data['bank_ad_ref'] = $open_data['data']['doc_reference'][0];
					$data['bank_ad_remarks'] = $open_data['data']['remarks'][0];
					$data['bank_ad_amt'] = $open_data['data']['amount'][0];
					$data['bank_ad_sign'] = $open_data['data']['sign'][0];

					unset($open_data['bank_ad_id']);

					$this->db->trans_start();
					$res[]=$this->custom->updateRow("bank_adjustment",$data,$where);
					
					if ($this->db->trans_status() === FALSE || in_array("error", $res))
					{
						set_flash_message("message","danger","Something Went Wrong");	
					    $this->db->trans_rollback();
					}
					else
					{
						set_flash_message("message","success","Bank Adjustment Updated Successfully");
					    $this->db->trans_commit();
					}
				}
				redirect('backend/bank_adjustmentlisting/confirmed');
			}
 		}

 		public function bank_adjustmentlisting()
 		{
 			is_logged_in('admin');
			has_permission();
 		}

 		public function bank_adjustment_manage($mode,$row_id="") 
		{
			is_logged_in('admin');
			has_permission();
						
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['open_edit_data']=$open_edit_data=$this->custom->getSingleRow('bank_adjustment',array("bank_ad_id"=>$row_id)); 
			if($open_edit_data):
				
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('backend/create_bank_adjustment/edit');
					$this->body_file="backend/bank_ad_edit.php";
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

		public function bank_statement()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function zap_bank()
 		{
 			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapBank();
			redirect('dashboard','refresh');
 		}
		/*----------------------Bank Statement End-------------------------*/
		/*---------------- Payment -------------------------*/
		public function payment_setting($action="form")
		{
			is_logged_in('admin');
			has_permission();
			$where=array('user_id'=>$this->session->user_id);
			//$where=array('user_id'=>$this->session->user_id);
			$this->body_vars['payment_details']=$payment_details=$this->custom->getSingleRow('payment_setting',$where);
			if($action=="form"){
				$types=array("receipt"=>"Receipt");
				if(!is_null($payment_details)){
					$this->body_vars['payment_type_options']=createSimpleDropdown($types,"receipt Type",$payment_details->payment_type,0);
				}
				else{
					$this->body_vars['payment_type_options']=createSimpleDropdown($types,"receipt Type",'',0);	
				}
				$this->body_vars['save_url']=base_url('backend/payment_setting/save');
			}
			else if($action=="save"){
				$post=$this->input->post();
				if($post):
					if(is_null($payment_details)){
						set_flash_message("message","success","Payment Settings Inserted Successfully !");
						$post['user_id']=$this->session->user_id;
						$this->custom->insertRow('payment_setting',$post);
					}
					else{
						set_flash_message("message","success","Payment Settings Updated Successfully !");
						$this->custom->updateRow('payment_setting',$post,$where);
					}
					redirect('backend/payment_setting');
				else:
					show_404();
				endif;
			}
		}

		public function new_payment()
		{
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$payment_where=array('user_id'=>$this->session->user_id);
			$this->body_vars['payment_details']=$payment_details=$this->custom->getSingleRow('payment_setting',$payment_where);
			if(is_null($payment_details)){
				set_flash_message("message","warning","Define a Payment Settings First !");
				redirect('backend/payment_setting');
			}
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'));
			/*==========================================*/
			$this->body_vars['invoice_reference']=$this->custom->createDropdownSelect("purchase_master",array('purchase_id','purchase_ref_no'),"Purchases Ref No",array(''),array('supplier_id' => ''));
			
			$payment_ref_no=$this->custom->getRowsSorted("payment_master",array(),array(),'payment_id','DESC',1);
			// d($invoice_ref_no);

			if(!empty($payment_ref_no)){
				$payment_ref_no=$payment_ref_no[0]->payment_ref_no;
				// $total_receipt=explode('\\', $receipt_ref_no)[2]+1;
				$total_payment=$payment_details->payment_number_prefix+1;
			}
			else{
				$total_payment=$payment_details->payment_number_prefix+1;
			}
			$this->body_vars['total_payment']=$total_payment;
			
			/*==========================================*/
			$this->body_vars['save_url']=base_url('backend/create_new_payment');
			/*==========================================*/
			$this->body_file="backend/new_payment.php";			
		}


		public function create_new_payment($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			//$post['invoice_reference_id'] = json_encode($post['invoice_reference_id']);
			if (isset($post['ex_ref_no'])) {
				unset($post['ex_ref_no']);
			}
			if($post){
					$payment_data=$post;
					$payment_data['modified_on']=date('Y-m-d');
					$payment_data['user_id']=$this->session->user_id;
					
					$pay_pur_data = $post;
					// var_dump($payment_data['partial_amount']);exit();//array(2) { [5]=> string(7) "1552.99" [4]=> string(7) "1255.48" }
					// var_dump($payment_data['partial_amount'][]);exit();
					
					//exit();
					unset($payment_data['amount_sign']);
					unset($payment_data['partial_amount_hidden']);
					unset($payment_data['partial_amount']);
					unset($payment_data['full_amount']);

					// $receipt_product_data['modified_on']=date('Y-m-d');
					if($action=="new"){
						//var_dump($post);exit();
						$payment_data['created_on']=date('Y-m-d');
						// $invoice_product_data['created_on']=date('Y-m-d');
						$this->custom->updateRow("payment_setting",array('payment_number_prefix'=>explode('.', $payment_data['payment_ref_no'])[1]),array('user_id'=>$this->session->user_id));
						//var_dump($post['invoice_reference_id']);exit();
						// foreach ($this->input->post('purchase_reference_id') as $key => $value) {
						// 	//var_dump($value);exit();
						// 	$this->custom->updateRow("purchase_master",array('payment'=>1),array('purchase_id'=>$value));
						// }
						$payment_id=$this->custom->insertRow("payment_master",$payment_data);

						$count = 0;
						foreach($pay_pur_data['partial_amount'] as $key => $value) {
						    $insert_pay_pur_data['purchase_id'][] = $key;
						    $insert_pay_pur_data['pay_pur_amount'][] = $value;
						    $insert_pay_pur_data['payment_id'][] = $payment_id;
						    $insert_pay_pur_data['full_amount'][] = $pay_pur_data['full_amount'][$key];
						    
						    $count ++;
						}
						if(isset($data)){
							unset($data);
						}
						for ($i=0; $i < $count ; $i++) { 
							$data['purchase_id'] = $insert_pay_pur_data['purchase_id'][$i];
							$data['pay_pur_amount'] = $insert_pay_pur_data['pay_pur_amount'][$i];
							$data['payment_id'] = $insert_pay_pur_data['payment_id'][$i];
							$data['full_amount'] = $insert_pay_pur_data['full_amount'][$i];

							$payment_purchase_id[]=$this->custom->insertRow("payment_purchase_master",$data);		
						}

						// $payment_purchase_id=$this->custom->insertRow("payment_purchase_master",$payment_data);						
					}
					if($action=="edit"){
						$where=array('payment_id' => $payment_data['payment_id']);
						unset($payment_data['payment_id']);
						$this->db->trans_start();
						$res[]=$this->custom->updateRow("payment_master",$payment_data,$where);

						$count = 0;
						foreach($pay_pur_data['partial_amount'] as $key => $value) {
						    $insert_pay_pur_data['purchase_id'][] = $key;
						    $insert_pay_pur_data['pay_pur_amount'][] = $value;
						    $insert_pay_pur_data['payment_id'][] = $post['payment_id'];
						    $insert_pay_pur_data['full_amount'][] = $pay_pur_data['full_amount'][$key];
						    
						    $count ++;
						}
						if(isset($data)){
							unset($data);
						}
						for ($i=0; $i < $count ; $i++) { 
							$data['purchase_id'] = $insert_pay_pur_data['purchase_id'][$i];
							$data['pay_pur_amount'] = $insert_pay_pur_data['pay_pur_amount'][$i];
							$data['payment_id'] = $insert_pay_pur_data['payment_id'][$i];
							$data['full_amount'] = $insert_pay_pur_data['full_amount'][$i];

							$where_payment_invoice = array('payment_id' => $post['payment_id'],'purchase_id' => $insert_pay_pur_data['purchase_id'][$i]);

							$payment_purchase_id[]=$this->custom->updateRow("payment_purchase_master",$data, $where_payment_invoice);		
						}
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Payment Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('backend/paymentlist/confirmed');
			}
		}

		public function paymentlist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function payment_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['payment_edit_data']=$payment_edit_data=$this->custom->getSingleRow('payment_master',array("payment_id"=>$row_id));
			if($payment_edit_data):

				$this->body_vars['payment_purchase_edit_data']=$payment_purchase_edit_data=$this->custom->getRows('payment_purchase_master',array("payment_id"=>$row_id));
				foreach ($payment_purchase_edit_data as $value) {
					$purchase_array[]=$value->purchase_id;
				}
				$this->body_vars['purchase_array']=$purchase_array;
				/*==========================================*/
				
				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'),array($payment_edit_data->supplier_id));
				/*==========================================*/
				$this->body_vars['invoice_reference']=$this->custom->createDropdownSelect("purchase_master",array('purchase_id','purchase_ref_no'),"Purchases Ref No",array(''),array('supplier_id' => ''));
				/*==========================================*/
				$this->body_vars['total_receipt']=$this->custom->getTotalCount("receipt_master");
				/*==========================================*/
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('backend/create_new_payment/edit');
					$this->body_file="backend/payment_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->backend->get_customer_details(array('customer_id'=>$payment_edit_data->supplier_id));
					$country_data=$this->custom->getSingleRow("country_master",array('country_id'=>$result->country_id));
					$data['customer_address1']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name;
					$data['customer_address2']=$country_data->country_name.' , '.$result->customer_postal_code;
					$data['payment_amount']=$this->custom->convert_number_to_words($payment_edit_data->amount);
					
					// $data['customer_2']=$result->customer_postal_code;
					// $data['customer_email']=$result->customer_email;
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$data['currency_amount']=$currency_data->currency_rate;
					$this->body_vars['cust_data']=$data;
					$this->body_vars['mode']="view";
					$this->body_file="backend/payment_view.php";
				endif;
				/*==========================================*/
			else:
				redirect('payment/paymentlist/confirmed','refresh');
			endif;
			endif;
		}

		/*---------------- Payment -------------------------*/
		
 		public function ap_openlist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function stock_report_base_wac()
		{
			is_logged_in('admin');
			has_permission();	
		}

		public function stock_report_base_fifo()
		{
			is_logged_in('admin');
			has_permission();		
		}

		public function zap_payment()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapPayment();
			redirect('dashboard','refresh');	
		}

		public function zap_opayment()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapOPayment();
			redirect('dashboard','refresh');	
		}
		
 
		public function zap_purchases()
 		{
 			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapPurchases();
			redirect('dashboard','refresh');
 		}

 		public function zap_AP()
 		{
 			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapAP();
			redirect('dashboard','refresh');
 		}

 		public function zap_HistCost()
 		{
 			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapHistCost();
			redirect('dashboard','refresh');
 		}


	}
	
	/*End of file Quotation.php */
	/* Location: ./application/modules/new_modules/company_profile/controllers/Quotation.php */