<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Blockbill extends MY_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('blockbill/blockbill_model','blockbill');
	    }

		public function index()
		{
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			
			$blockbill_month_info=$this->custom->getRowsSorted("blockbill_master",array('user_id'=>$this->session->user_id,'bill_state!='=>'D'),array(),"bill_state","DESC",1);

	        if (count($blockbill_month_info)) {
	            if ($blockbill_month_info[0]->bill_state != '') {
	                $data['next_bill_month']=$this->blockbill->convert_date(($blockbill_month_info[0]->bill_state),'+1',0);
	            }
	            else 
	            {
	                // $blockbill_first_bill_date=$this->custom->getRowsSorted("blockbill_master",array('user_id'=>$this->session->user_id),array(),"next_bill_date","ASC",1); 
	                // if (count($blockbill_first_bill_date)) {
	                //     $block_first_backup_date = $this->blockbill->convert_date($blockbill_first_bill_date[0]->next_bill_date,0,0);
	                //     $first_year_month = substr($block_first_backup_date,0,7);
	                // }
	                $data['next_bill_month'] = "";
	            }
	        }
	        else
	        {
	        	$data['next_bill_month'] = '';
	        }

			$this->body_vars['blockbill_data']=$data;
			
			$this->body_file="blockbill/blockbill.php";
		}

		public function backup_prev_blockbilling()
		{
			is_logged_in('admin');
			has_permission();
			//var_dump($search_custom_date);exit();
			$this->body_file="common/blank.php";
			prev_blockbill_backup();
			//redirect('dashboard','refresh');
		}

		public function create_new_blockbill($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			
			if($post){
				if(count($post['contract_id'])>=1){
					$blockbill_data=$post;
					unset($blockbill_data['contract_amount_sgd']);
					$blockbill_data['modified_on']=date('Y-m-d');
					$blockbill_data['user_id']=$this->session->user_id;
					
					if($action=="new"){
						$blockbill_data['created_on']=date('Y-m-d');
						
						$autobill_details=$this->custom->getSingleRow('autobill_setting',array('user_id'=>$this->session->user_id));

						$this->custom->updateRow("autobill_setting",array('autobill_number_prefix'=>$autobill_details->autobill_number_prefix+1),array('user_id'=>$this->session->user_id));

						$blockbill_data['autobill_ref_no'] = str_replace(explode('.', $blockbill_data['autobill_ref_no'])[1], $autobill_details->autobill_number_prefix+1,  $blockbill_data['autobill_ref_no']);

						$blockbill_id=$this->custom->insertRow("blockbill_master",$blockbill_data);
					}
					if($action=="edit"){
						$where=array('blockbill_id' => $blockbill_data['blockbill_id']);
						unset($blockbill_data['blockbill_id']);
						$this->db->trans_start();
						//var_dump($blockbill_data);exit();
						$res[]=$this->custom->updateRow("blockbill_master",$blockbill_data,$where);
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Blockbill Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('blockbill');
					
				}
			}
		}

		public function blockbill_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['blockbill_edit_data']=$blockbill_edit_data=$this->custom->getSingleRow('blockbill_master',array("blockbill_id"=>$row_id));
			if($blockbill_edit_data):

				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array(),array($blockbill_edit_data->customer_id));
				/*==========================================*/
				$this->body_vars['contract_options']=$this->custom->createDropdownSelect("contract_master",array('contract_id','contract_code','contract_description'),"Contract",array(" : "," "),array(),array($blockbill_edit_data->contract_id));
				/*==========================================*/

				if($mode=="edit"):
					$result= $this->blockbill->get_customer_details(array('customer_id'=>$blockbill_edit_data->customer_id));
					$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
					
					$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
					$data['customer_currency']=$currency_data->currency_name;
					$this->body_vars['cust_data']=$data;

					$this->body_vars['save_url']=base_url('blockbill/create_new_blockbill/edit');
					$this->body_file="blockbill/blockbill_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->invoice->get_customer_details(array('customer_id'=>$blockbill_edit_data->customer_id));
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
		
		public function undo_last_blockbill()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			undo_last_blockbill();
			redirect('dashboard','refresh');
		}
	}
	
	/*End of file Invoice.php */
	/* Location: ./application/modules/new_modules/company_profile/controllers/Invoice.php */