<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Invoice_new extends MY_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('invoice/invoice_model','invoice');
	    }
		public function invoice_new_setting($action="form")
		{
			is_logged_in('admin');
			has_permission();
			$where=array('user_id'=>$this->session->user_id); 
			$this->body_vars['invoice_new_details']=$invoice_new_details=$this->custom->getSingleRow('invoice_setting',$where);
			if($action=="form"){
				$this->body_vars['save_url']=base_url('Invoice_new/invoice_new_setting/save');
			}
			else if($action=="save"){
				//echo "save";exit; 
				$post=$this->input->post();
				if($post):
					if(is_null($invoice_new_details)){
						set_flash_message("message","success","Invoice Settings Inserted Successfully !");
						$post['user_id']=$this->session->user_id;
						$this->custom->insertRow('invoice_setting',$post);
					}
					else{
						set_flash_message("message","success","Invoice Settings Updated Successfully !");
						$this->custom->updateRow('invoice_setting',$post,$where);
					}
					redirect('Invoice_new/invoice_new_setting');
				else:
					show_404();
				endif;
			}
		}

		public function otherlist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function extract_from_quotatin(){
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$invoice_where=array('user_id'=>$this->session->user_id);
			$this->body_vars['invoice_details']=$invoice_details=$this->custom->getSingleRow('invoice_setting',$invoice_where);
			if(is_null($invoice_details)){
				set_flash_message("message","warning","Define a Invoice Settings First !");
				redirect('invoice/invoice_setting');
			}
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code', 'currency_id'),"Customer",array('(',')',' '));
			/*==========================================*/
			$this->body_vars['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name','s_code'),"Sales Person",array('(',')'));
			/*==========================================*/
			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
			/*==========================================*/
			$this->body_vars['quotation_reference']=$this->custom->createDropdownSelect("quotation_master",array('quotation_id','quotation_ref_no'),"Quotation Ref No",array(''),array('invoice'=> 0,'quotation_status'=>'SUCCESSFUL'));
			/*==========================================*/
			$this->body_vars['quotation_date']=$this->custom->createDropdownSelect("quotation_master",array('quotation_id','quotation_ref_no'),"Quotation Ref No");
			/*==========================================*/
			$this->body_vars['quotation_customer']=$this->custom->createDropdownSelect("quotation_master",array('quotation_id','quotation_ref_no'),"Quotation Ref No");
			/*==========================================*/
			

			$invoice_ref_no=$this->custom->getRowsSorted("invoice_master",array(),array(),'invoice_id','DESC',1);
			// d($invoice_ref_no);
			if(!empty($invoice_ref_no)){
				$invoice_ref_no=$invoice_ref_no[0]->invoice_ref_no;
				// $total_invoice=explode('\\', $invoice_ref_no)[2]+1;
				$total_invoice=$invoice_details->invoice_number_prefix+1;
			}
			else{
				$total_invoice=$invoice_details->invoice_number_prefix+1;
			}
			$this->body_vars['total_invoice']=$total_invoice;
			/*==========================================*/
			$this->body_vars['save_url']=base_url('invoice_new/create_new_invoice');
			/*==========================================*/
			$this->body_file="invoice_new/extract_invoice.php";
		}

		public function index()
		{
			is_logged_in('admin');
			has_permission();
			$company_where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
			/*==========================================*/
			$quotation_where=array('user_id'=>$this->session->user_id);	
			$this->body_vars['invoice_details']=$invoice_details=$this->custom->getSingleRow('invoice_setting',$quotation_where);
			if(is_null($invoice_details)){
				set_flash_message("message","warning","Define a Invoice Settings First !");
				redirect('Invoice_new/invoice_new_setting');
			}
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			/*==========================================*/
			$this->body_vars['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name','s_code'),"Sales Person",array('(',')'));
			/*==========================================*/
			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
			/*==========================================*/
			$invoice_ref_no=$this->custom->getRowsSorted("invoice_master",array(),array(),'invoice_id','DESC',1);
			// d($quotation_ref_no);
			if(!empty($invoice_ref_no)){
				$invoice_ref_no=$invoice_ref_no[0]->invoice_ref_no;
				// $total_quotation=explode('\\', $quotation_ref_no)[2]+1;
				$total_invoice=$invoice_details->invoice_number_prefix+1;
			}
			else{
				$total_invoice=$invoice_details->invoice_number_prefix+1;
			}
			$this->body_vars['total_invoice']=$total_invoice;
			/*==========================================*/
			$this->body_vars['save_url']=base_url('invoice_new/create_new_invoice');
			/*==========================================*/
			$this->body_file="invoice_new/invoice_new.php";
		}

		public function create_new_invoice($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			unset($post['logo_with']);
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
					unset($quotation_data['ex_ref_no']);
					
					$quotation_product_data=array_diff_assoc_recursive($post,$quotation_data);
					//var_dump($quotation_product_data);exit();
					$quotation_data['modified_on']=date('Y-m-d');
					$quotation_data['user_id']=$this->session->user_id;
					$quotation_product_data['modified_on']=date('Y-m-d');
					if($action=="new"){
						$quotation_data['created_on']=date('Y-m-d');
						$quotation_product_data['created_on']=date('Y-m-d');
						
						$quotation_details=$this->custom->getSingleRow('invoice_setting',array('user_id'=>$this->session->user_id));

						$this->custom->updateRow("invoice_setting",array('invoice_number_prefix'=>$quotation_details->invoice_number_prefix+1),array('user_id'=>$this->session->user_id));

						$quotation_data['invoice_ref_no'] = str_replace(explode('.', $quotation_data['invoice_ref_no'])[1], $quotation_details->invoice_number_prefix+1,  $quotation_data['invoice_ref_no']);
						$invoice_id=$this->custom->insertRow("invoice_master",$quotation_data);
						$quotation_product_data['invoice_id']=$invoice_id;
						unset($quotation_product_data['logo_with']);
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
							$insert_data['invoice_id']=$quotation_product_data['invoice_id'];
							$quotation_product_id[]=$this->custom->insertRow("invoice_product_master",$insert_data);
							$stock_invoice_id[]=$this->custom->insertRow("stock_invoice_master",$insert_data);	

							//GST table show
							$product_info = $this->custom->getSingleRow('billing_master',array('billing_id' => $product_id));
							if ($product_info->billing_type == "Product") {
								$i_g_code = $product_info->stock_code;
								$i_g_description = $product_info->billing_description;
								$i_g_cat = $this->custom->getSingleValue('gst_master','gst_code',array('gst_id' => $product_info->gst_id));
								$gst_rate = $this->custom->getSingleValue('gst_master','gst_rate',array('gst_id' => $product_info->gst_id));
								$i_g_lump_sum_discount_price = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100) * $quotation_data['currency_amount']) , 2, '.', '');
								$i_g_gst_amount = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate * $quotation_data['currency_amount'] / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_ex_rate = $quotation_data['currency_amount'];
								$i_g_lump_sum_discount_price_local = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100)) , 2, '.', '');
								$i_g_gst_amount_local = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_invoice_id = $quotation_product_data['invoice_id'];

								$insert_gst_data['i_g_date'] = date('Y-m-d');
								$insert_gst_data['i_g_doc_ref'] = $quotation_data['invoice_ref_no'];
								$insert_gst_data['i_g_customer_id'] = $quotation_data['customer_id'];
								$insert_gst_data['i_g_code'] = $i_g_code;
								$insert_gst_data['i_g_description'] = $i_g_description;
								$insert_gst_data['i_g_cat'] = $i_g_cat;
								$insert_gst_data['i_g_lump_sum_discount_price'] = $i_g_lump_sum_discount_price;
								$insert_gst_data['i_g_gst_amount'] = $i_g_gst_amount;
								$insert_gst_data['i_g_ex_rate'] = $i_g_ex_rate;
								$insert_gst_data['i_g_lump_sum_discount_price_local'] = $i_g_lump_sum_discount_price_local;
								$insert_gst_data['i_g_gst_amount_local'] = $i_g_gst_amount_local;
								$insert_gst_data['i_g_invoice_id'] = $i_g_invoice_id;
								
								$invoice_product_id[]=$this->custom->insertRow("invoice_gst_table",$insert_gst_data);	
							}
						}
					}
					if($action=="edit"){
						$where=array('invoice_id' => $quotation_data['invoice_id']);
						$temp_invoice_id = $quotation_data['invoice_id'];
						unset($quotation_data['invoice_id']);
						$this->db->trans_start();
						$res[]=$this->custom->updateRow("invoice_master",$quotation_data,$where);
						$res[]=$this->custom->deleteRow("invoice_product_master",$where);
						$res[] = $this->custom->deleteRow('invoice_gst_table',array('invoice_id' => $temp_invoice_id,'i_g_mark' => 'INV' ));
						$quotation_product_data=array_merge($quotation_product_data,$where);
						$quotation_product_data['created_on']=$this->custom->getSingleValue('invoice_master',"created_on",$where);
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
							$insert_data['invoice_id']=$quotation_product_data['invoice_id'];
							$res[]=$this->custom->insertRow("invoice_product_master",$insert_data);

							//GST table show
							$product_info = $this->custom->getSingleRow('billing_master',array('billing_id' => $product_id));
							if ($product_info->billing_type == "Product") {
								$i_g_code = $product_info->stock_code;
								$i_g_description = $product_info->billing_description;
								$i_g_cat = $this->custom->getSingleValue('gst_master','gst_code',array('gst_id' => $product_info->gst_id));
								$gst_rate = $this->custom->getSingleValue('gst_master','gst_rate',array('gst_id' => $product_info->gst_id));
								$i_g_lump_sum_discount_price = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100) * $quotation_data['currency_amount']) , 2, '.', '');
								$i_g_gst_amount = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate * $quotation_data['currency_amount'] / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_ex_rate = $quotation_data['currency_amount'];
								$i_g_lump_sum_discount_price_local = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100)) , 2, '.', '');
								$i_g_gst_amount_local = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_invoice_id = $quotation_product_data['invoice_id'];

								$insert_gst_data['i_g_date'] = date('Y-m-d');
								$insert_gst_data['i_g_doc_ref'] = $quotation_data['invoice_ref_no'];
								$insert_gst_data['i_g_customer_id'] = $quotation_data['customer_id'];
								$insert_gst_data['i_g_code'] = $i_g_code;
								$insert_gst_data['i_g_description'] = $i_g_description;
								$insert_gst_data['i_g_cat'] = $i_g_cat;
								$insert_gst_data['i_g_lump_sum_discount_price'] = $i_g_lump_sum_discount_price;
								$insert_gst_data['i_g_gst_amount'] = $i_g_gst_amount;
								$insert_gst_data['i_g_ex_rate'] = $i_g_ex_rate;
								$insert_gst_data['i_g_lump_sum_discount_price_local'] = $i_g_lump_sum_discount_price_local;
								$insert_gst_data['i_g_gst_amount_local'] = $i_g_gst_amount_local;
								$insert_gst_data['i_g_invoice_id'] = $i_g_invoice_id;
								
								$invoice_product_id[]=$this->custom->insertRow("invoice_gst_table",$insert_gst_data);	
							}
						}
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Invoice Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('invoice_new/invoicelist/confirmed');
				}
			}
		}

		public function invoicelist()
		{
			is_logged_in('admin');
			has_permission();
		}

		public function invoice_manage($mode,$row_id="")
		{ 
			is_logged_in('admin');
			has_permission();
			/*==========================================*/
			if($row_id!=""):
			$this->body_vars['invoice_edit_data']=$invoice_edit_data=$this->custom->getSingleRow('invoice_master',array("invoice_id"=>$row_id));
			if($invoice_edit_data):
				$this->body_vars['invoice_product_edit_data']=$invoice_product_edit_data=$this->custom->getRows('invoice_product_master',array("invoice_id"=>$row_id));
				foreach ($invoice_product_edit_data as $value) {
					$product_array[]=$value->product_id;
				}
				$this->body_vars['product_array']=$product_array;
				/*==========================================*/
				$company_where=array('profile_id'=>1);
				$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array(),array($invoice_edit_data->customer_id));
				/*==========================================*/
				$this->body_vars['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name'),"Sales Person",array(' '),array(),array($invoice_edit_data->salesman_id));
				/*==========================================*/
				$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
				/*==========================================*/
				$this->body_vars['total_invoice']=$this->custom->getTotalCount("invoice_master");
				/*==========================================*/
				if($mode=="edit"):
					$this->body_vars['save_url']=base_url('invoice_new/create_new_invoice/edit');
					$this->body_file="invoice_new/invoice_edit.php";
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
					$this->body_file="invoice_new/invoice_view.php";
				endif;
				/*==========================================*/
			else:
				redirect('invoice_new/invoicelist/pending','refresh');
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