<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Quotation extends MY_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('quotation/quotation_model','quotation');
	    }
		public function quotation_setting($action="form")
		{
			is_logged_in('admin');
			has_permission();
			$where=array('user_id'=>$this->session->user_id); 
			$this->body_vars['quotation_details']=$quotation_details=$this->custom->getSingleRow('quotation_setting',$where);
			if($action=="form"){
				$types=array("order_entry"=> "Order Entry","delivery_order"=> "Delivery Order","invoice"=>"Invoice");
				if(!is_null($quotation_details)){
					$this->body_vars['quotation_type_options']=createSimpleDropdown($types,"Integration Type",$quotation_details->quotation_type,0);
				}
				else{
					$this->body_vars['quotation_type_options']=createSimpleDropdown($types,"Integration Type",'',0);	
				}
				
				$this->body_vars['save_url']=base_url('quotation/quotation_setting/save');
				//echo $this->body_vars['save_url']; exit;
			}
			else if($action=="save"){
				//echo "save";exit;
				$post=$this->input->post();
				if($post):
					if(is_null($quotation_details)){
						set_flash_message("message","success","Quotation Settings Inserted Successfully !");
						$post['user_id']=$this->session->user_id;
						$this->custom->insertRow('quotation_setting',$post);
					}
					else{
						set_flash_message("message","success","Quotation Settings Updated Successfully !");
						$this->custom->updateRow('quotation_setting',$post,$where);
					}
					redirect('quotation/quotation_setting');
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
			$quotation_where=array('user_id'=>$this->session->user_id);	
			$this->body_vars['quotation_details']=$quotation_details=$this->custom->getSingleRow('quotation_setting',$quotation_where);
			if(is_null($quotation_details)){
				set_flash_message("message","warning","Define a Quotation Settings First !");
				redirect('quotation/quotation_setting');
			}
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			/*==========================================*/
			$this->body_vars['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name','s_code'),"Sales Person",array('(',')'));
			/*==========================================*/
			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
			/*==========================================*/
			$quotation_ref_no=$this->custom->getRowsSorted("quotation_master",array(),array(),'quotation_id','DESC',1);
			// d($quotation_ref_no);
			if(!empty($quotation_ref_no)){
				$quotation_ref_no=$quotation_ref_no[0]->quotation_ref_no;
				// $total_quotation=explode('\\', $quotation_ref_no)[2]+1;
				$total_quotation=$quotation_details->quotation_number_prefix+1;
			}
			else{
				$total_quotation=$quotation_details->quotation_number_prefix+1;
			}
			$this->body_vars['total_quotation']=$total_quotation;
			/*==========================================*/
			$this->body_vars['save_url']=base_url('quotation/create_new_quotation');
			/*==========================================*/
			$this->body_file="quotation/quotation.php";
		}

		public function create_new_quotation($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			if($post){
				if(count($post['product_id'])>=1){
					$quotation_data=$post;
					unset($quotation_data['product_row_id']);
					unset($quotation_data['amount']);
					unset($quotation_data['product_id']);
					unset($quotation_data['quantity']);
					unset($quotation_data['discount']);
					unset($quotation_data['gst_id']);
					unset($quotation_data['price']);
					unset($quotation_data['product_total']);
					unset($quotation_data['logo_with']);
					$quotation_product_data=array_diff_assoc_recursive($post,$quotation_data);
					$quotation_data['modified_on']=date('Y-m-d');
					$quotation_data['user_id']=$this->session->user_id;
					$quotation_product_data['modified_on']=date('Y-m-d');
					if($action=="new"){
						$quotation_data['created_on']=date('Y-m-d');
						$quotation_product_data['created_on']=date('Y-m-d');
						
						$quotation_details=$this->custom->getSingleRow('quotation_setting',array('user_id'=>$this->session->user_id));

						$this->custom->updateRow("quotation_setting",array('quotation_number_prefix'=>$quotation_details->quotation_number_prefix+1),array('user_id'=>$this->session->user_id));

						$quotation_data['quotation_ref_no'] = str_replace(explode('.', $quotation_data['quotation_ref_no'])[1], $quotation_details->quotation_number_prefix+1,  $quotation_data['quotation_ref_no']);
						$quotation_id=$this->custom->insertRow("quotation_master",$quotation_data);
						$quotation_product_data['quotation_id']=$quotation_id;
						foreach ($quotation_product_data['product_id'] as $product_id) {
							$insert_data['product_id']=$product_id;
							
							if($quotation_product_data['quantity'][$product_id]!=null)
							$insert_data['quantity']=$quotation_product_data['quantity'][$product_id];
							
							else
							$insert_data['quantity']=1;
							
							$insert_data['discount']=$quotation_product_data['discount'][$product_id];
							$insert_data['gst_id']=$quotation_product_data['gst_id'][$product_id];
							
							$insert_data['price']=$quotation_product_data['price'][$product_id];
							$insert_data['product_total']=$quotation_product_data['product_total'][$product_id];
							$insert_data['modified_on']=$quotation_product_data['modified_on'];
							$insert_data['created_on']=$quotation_product_data['created_on'];
							$insert_data['quotation_id']=$quotation_product_data['quotation_id'];
							$quotation_product_id[]=$this->custom->insertRow("quotation_product_master",$insert_data);
						}
					}
					if($action=="edit"){
						$where=array('quotation_id' => $quotation_data['quotation_id']);
						unset($quotation_data['quotation_id']);
						$this->db->trans_start();
						$res[]=$this->custom->updateRow("quotation_master",$quotation_data,$where);
						$res[]=$this->custom->deleteRow("quotation_product_master",$where);
						$quotation_product_data=array_merge($quotation_product_data,$where);
						$quotation_product_data['created_on']=$this->custom->getSingleValue('quotation_master',"created_on",$where);
						foreach ($quotation_product_data['product_id'] as $product_id) {
							$insert_data['product_id']=$product_id;
						
						    if($quotation_product_data['quantity'][$product_id]!=null)	
							    $insert_data['quantity']=$quotation_product_data['quantity'][$product_id];
							else
							    $insert_data['quantity']=1;
							
							$insert_data['discount']=$quotation_product_data['discount'][$product_id];
							$insert_data['gst_id']=$quotation_product_data['gst_id'][$product_id];
							$insert_data['price']=$quotation_product_data['price'][$product_id];
							$insert_data['product_total']=$quotation_product_data['product_total'][$product_id];
							$insert_data['modified_on']=$quotation_product_data['modified_on'];
							$insert_data['created_on']=$quotation_product_data['created_on'];
							$insert_data['quotation_id']=$quotation_product_data['quotation_id'];
							$res[]=$this->custom->insertRow("quotation_product_master",$insert_data);
						}
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Quotation Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('quotation/quotationlist/confirm');
				}
			}
		}

		public function quotationlist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function quotation_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['quotation_edit_data']=$quotation_edit_data=$this->custom->getSingleRow('quotation_master',array("quotation_id"=>$row_id));
			if($quotation_edit_data):
				$this->body_vars['quotation_product_edit_data']=$quotation_product_edit_data=$this->custom->getRowsSorted('quotation_product_master',array("quotation_id"=>$row_id),null,"q_p_id");
				foreach ($quotation_product_edit_data as $value) {
					$product_array[]=$value->product_id;
				}
				$this->body_vars['product_array']=$product_array;
				/*==========================================*/
				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array(),array($quotation_edit_data->customer_id));
				/*==========================================*/
				$this->body_vars['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name'),"Sales Person",array(' '),array(),array($quotation_edit_data->salesman_id));
				/*==========================================*/
				$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
				/*==========================================*/
				$this->body_vars['total_quotation']=$this->custom->getTotalCount("quotation_master");
				/*==========================================*/
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('quotation/create_new_quotation/edit');
					$this->body_file="quotation/quotation_edit.php";
				endif;
				if($mode=="view"):
					$result= $this->quotation->get_customer_details(array('customer_id'=>$quotation_edit_data->customer_id));
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
		
		public function zap_Quotation_data()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapQuotation();
			redirect('dashboard','refresh');
		}
	}
	
	/*End of file Quotation.php */
	/* Location: ./application/modules/new_modules/company_profile/controllers/Quotation.php */