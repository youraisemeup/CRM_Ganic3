<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Autobill extends MY_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('autobill/autobill_model','autobill');
	    }
		public function autobill_setting($action="form")
		{
			is_logged_in('admin');
			has_permission();
			$where=array('user_id'=>$this->session->user_id);
			$this->body_vars['autobill_details']=$autobill_details=$this->custom->getSingleRow('autobill_setting',$where);
			if($action=="form"){
				// $types=array("order_entry"=> "Order Entry","delivery_order"=> "Delivery Order","invoice"=>"Invoice");
				// if(!is_null($autobill_details)){
				// 	$this->body_vars['invoice_type_options']=createSimpleDropdown($types,"Integration Type",$autobill_details->invoice_type,0);
				// }
				// else{
				// 	$this->body_vars['invoice_type_options']=createSimpleDropdown($types,"Integration Type",'',0);	 
				// }
				$this->body_vars['save_url']=base_url('autobill/autobill_setting/save');
			}
			else if($action=="save"){
				$post=$this->input->post();
				if($post):
					if(is_null($autobill_details)){
						set_flash_message("message","success","Autobill Settings Inserted Successfully !");
						$post['user_id']=$this->session->user_id;
						$this->custom->insertRow('autobill_setting',$post);
					}
					else{
						set_flash_message("message","success","Autobill Settings Updated Successfully !");
						$this->custom->updateRow('autobill_setting',$post,$where);
					}
					redirect('autobill/autobill_setting');
				else:
					show_404();
				endif;
			}
		}

		public function index()
		{
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$autobill_where=array('user_id'=>$this->session->user_id);
			$this->body_vars['autobill_details']=$autobill_details=$this->custom->getSingleRow('autobill_setting',$autobill_where);
			if(is_null($autobill_details)){
				set_flash_message("message","warning","Define a Autobill Settings First !");
				redirect('autobill/autobill_setting');
			}
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			//var_dump($this->body_vars['customer_options']);exit;
			$this->body_vars['contract_options']=$this->custom->createDropdownSelect("contract_master",array('contract_id','contract_code','contract_description'),"Contract",array(" : "," "));
			/*==========================================*/
			$autobill_ref_no=$this->custom->getRowsSorted("autobill_master",array(),array(),'autobill_id','DESC',1);
			// d($autobill_ref_no);
			if(!empty($autobill_ref_no)){
				$autobill_ref_no=$autobill_ref_no[0]->autobill_ref_no;
				// $total_autobill=explode('\\', $autobill_ref_no)[2]+1;
				$total_autobill=$autobill_details->autobill_number_prefix+1;
			}
			else{
				$total_autobill=$autobill_details->autobill_number_prefix+1;
			}
			$this->body_vars['total_autobill']=$total_autobill;
			/*==========================================*/
			$this->body_vars['save_url']=base_url('autobill/create_new_autobill');
			/*==========================================*/
			$this->body_file="autobill/autobill.php";
		}

		public function create_new_autobill($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			
			if($post){
				if(count($post['contract_id'])>=1){
					$autobill_data=$post;
					unset($autobill_data['contract_amount_sgd']);
					$autobill_data['modified_on']=date('Y-m-d');
					$autobill_data['user_id']=$this->session->user_id;
					
					if($action=="new"){
						$autobill_data['created_on']=date('Y-m-d');
						
						$autobill_details=$this->custom->getSingleRow('autobill_setting',array('user_id'=>$this->session->user_id));

						$this->custom->updateRow("autobill_setting",array('autobill_number_prefix'=>$autobill_details->autobill_number_prefix+1),array('user_id'=>$this->session->user_id));

						$autobill_data['autobill_ref_no'] = str_replace(explode('.', $autobill_data['autobill_ref_no'])[1], $autobill_details->autobill_number_prefix+1,  $autobill_data['autobill_ref_no']);

						$autobill_id=$this->custom->insertRow("autobill_master",$autobill_data);
					}
					if($action=="edit"){
						$where=array('autobill_id' => $autobill_data['autobill_id']);
						unset($autobill_data['autobill_id']);
						$this->db->trans_start();
						//var_dump($autobill_data);exit();
						$res[]=$this->custom->updateRow("autobill_master",$autobill_data,$where);
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","AutoBill Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('autobill/autobilllist/confirmed');
					
				}
			}
		}

		public function autobilllist()
		{
			is_logged_in('admin');
			has_permission();
		}
		
		public function autobill_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['autobill_edit_data']=$autobill_edit_data=$this->custom->getSingleRow('autobill_master',array("autobill_id"=>$row_id));
			if($autobill_edit_data):

				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array(),array($autobill_edit_data->customer_id));
				/*==========================================*/
				$this->body_vars['contract_options']=$this->custom->createDropdownSelect("contract_master",array('contract_id','contract_code','contract_description'),"Contract",array(" : "," "),array(),array($autobill_edit_data->contract_id));
				/*==========================================*/

				if($mode=="edit"):
					$result= $this->autobill->get_customer_details(array('customer_id'=>$autobill_edit_data->customer_id));
					$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
					
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$this->body_vars['cust_data']=$data;

					$this->body_vars['save_url']=base_url('autobill/create_new_autobill/edit');
					$this->body_file="autobill/autobill_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->invoice->get_customer_details(array('customer_id'=>$autobill_edit_data->customer_id));
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

		public function zap_billing()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapBilling();
			redirect('dashboard','refresh');	
		}
	}
