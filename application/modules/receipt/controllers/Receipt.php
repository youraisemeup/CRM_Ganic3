<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class Receipt extends MY_Controller {

		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('receipt/receipt_model','receipt');
	    }	

	    public function index(){  
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$receipt_where=array('user_id'=>$this->session->user_id);
			$this->body_vars['receipt_details']=$receipt_details=$this->custom->getSingleRow('receipt_setting',$receipt_where);
			if(is_null($receipt_details)){
				set_flash_message("message","warning","Define a Receipt Settings First !");
				redirect('receipt/receipt_setting');
			}
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			/*==========================================*/
			$this->body_vars['invoice_reference']=$this->custom->createDropdownSelect("invoice_master",array('invoice_id','invoice_ref_no'),"Invoice Ref No",array(''),array('customer_id' => ''));
			
			$receipt_ref_no=$this->custom->getRowsSorted("receipt_master",array(),array(),'receipt_id','DESC',1);
			// d($invoice_ref_no);

			if(!empty($receipt_ref_no)){
				$receipt_ref_no=$receipt_ref_no[0]->receipt_ref_no;
				// $total_receipt=explode('\\', $receipt_ref_no)[2]+1;
				$total_receipt=$receipt_details->receipt_number_prefix+1;
			}
			else{
				$total_receipt=$receipt_details->receipt_number_prefix+1;
			}
			$this->body_vars['total_receipt']=$total_receipt;
			
			/*==========================================*/
			$this->body_vars['save_url']=base_url('receipt/create_new_receipt');
			/*==========================================*/
			$this->body_file="receipt/receipt.php";
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
			//$post['invoice_reference_id'] = json_encode($post['invoice_reference_id']);
			if (isset($post['ex_ref_no'])) {
				unset($post['ex_ref_no']);
			}
			if($post){
			//	var_dump($post);exit();
					$receipt_data=$post;
					$receipt_data['modified_on']=date('Y-m-d');
					$receipt_data['user_id']=$this->session->user_id;
					$rec_inv_data = $post;

					unset($receipt_data['partial_amount_hidden']);
					unset($receipt_data['partial_amount']);
					unset($receipt_data['full_amount']);
					unset($receipt_data['amount_sign']);

					if($action=="new"){
						
						$receipt_data['created_on']=date('Y-m-d');
						// $invoice_product_data['created_on']=date('Y-m-d');
						$this->custom->updateRow("receipt_setting",array('receipt_number_prefix'=>explode('.', $receipt_data['receipt_ref_no'])[1]),array('user_id'=>$this->session->user_id));
						$receipt_id=$this->custom->insertRow("receipt_master",$receipt_data);

						$count = 0;
						foreach($rec_inv_data['partial_amount'] as $key => $value) {
						    $insert_rec_inv_data['invoice_id'][] = $key;
						    $insert_rec_inv_data['rec_inv_amount'][] = $value;
						    $insert_rec_inv_data['receipt_id'][] = $receipt_id;
						    $insert_rec_inv_data['full_amount'][] = $rec_inv_data['full_amount'][$key];
						    
						    $count ++;
						}
						if(isset($data)){
							unset($data);
						}
						for ($i=0; $i < $count ; $i++) { 
							$data['invoice_id'] = $insert_rec_inv_data['invoice_id'][$i];
							$data['rec_inv_amount'] = $insert_rec_inv_data['rec_inv_amount'][$i];
							$data['receipt_id'] = $insert_rec_inv_data['receipt_id'][$i];
							$data['full_amount'] = $insert_rec_inv_data['full_amount'][$i];

							$rec_inv_id[]=$this->custom->insertRow("receipt_invoice_master",$data);		
						}
					}
					if($action=="edit"){
						$where=array('receipt_id' => $receipt_data['receipt_id']);
						unset($receipt_data['receipt_id']);
						$this->db->trans_start();
						$res[]=$this->custom->updateRow("receipt_master",$receipt_data,$where);

						$count = 0;
						foreach($rec_inv_data['partial_amount'] as $key => $value) {

						    $insert_rec_inv_data['invoice_id'][] = $key;
						    $insert_rec_inv_data['rec_inv_amount'][] = $value;
						    $insert_rec_inv_data['receipt_id'][] = $post['receipt_id'];
						    $insert_rec_inv_data['full_amount'][] = $rec_inv_data['full_amount'][$key];
						    
						    $count ++;
						}
						if(isset($data)){
							unset($data);
						}

						for ($i=0; $i < $count ; $i++) { 
							
							$data['invoice_id'] = $insert_rec_inv_data['invoice_id'][$i];
							$data['rec_inv_amount'] = $insert_rec_inv_data['rec_inv_amount'][$i];
							$data['receipt_id'] = $insert_rec_inv_data['receipt_id'][$i];
							$data['full_amount'] = $insert_rec_inv_data['full_amount'][$i];

							$where_receipt_invoice = array('receipt_id' => $post['receipt_id'],'invoice_id' => $insert_rec_inv_data['invoice_id'][$i]);
							$rec_inv_id[]=$this->custom->updateRow("receipt_invoice_master",$data,$where_receipt_invoice);		
						}
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Receipt Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('receipt/receiptlist/confirmed');
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

				$this->body_vars['receipt_invoice_edit_data']=$receipt_invoice_edit_data=$this->custom->getRows('receipt_invoice_master',array("receipt_id"=>$row_id));
				foreach ($receipt_invoice_edit_data as $value) {
					$invoice_array[]=$value->invoice_id;
				}
				$this->body_vars['invoice_array']=$invoice_array;
				/*==========================================*/
				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array(),array($receipt_edit_data->customer_id));
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
				redirect('receipt/receiptlist/confirmed','refresh');
			endif;
			endif;
		}

		public function zap_receipt_data()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapReceipt();
			redirect('dashboard','refresh');
		}
	
		}
		
		/*End of file Invoice.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Invoice.php */