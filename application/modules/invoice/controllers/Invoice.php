<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Invoice extends MY_Controller {
		public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('invoice/invoice_model','invoice');
	    }
		public function invoice_setting($action="form")
		{
			is_logged_in('admin');
			has_permission();
			$where=array('user_id'=>$this->session->user_id);
			$this->body_vars['invoice_details']=$invoice_details=$this->custom->getSingleRow('invoice_setting',$where);
			if($action=="form"){
				$types=array("order_entry"=> "Order Entry","delivery_order"=> "Delivery Order","invoice"=>"Invoice");
				if(!is_null($invoice_details)){
					$this->body_vars['invoice_type_options']=createSimpleDropdown($types,"Integration Type",$invoice_details->invoice_type,0);
				}
				else{
					$this->body_vars['invoice_type_options']=createSimpleDropdown($types,"Integration Type",'',0);	
				}
				$this->body_vars['save_url']=base_url('invoice/invoice_setting/save');
			}
			else if($action=="save"){
				$post=$this->input->post();
				if($post):
					if(is_null($invoice_details)){
						set_flash_message("message","success","Invoice Settings Inserted Successfully !");
						$post['user_id']=$this->session->user_id;
						$this->custom->insertRow('invoice_setting',$post);
					}
					else{
						set_flash_message("message","success","Invoice Settings Updated Successfully !");
						$this->custom->updateRow('invoice_setting',$post,$where);
					}
					redirect('invoice/invoice_setting');
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
			$invoice_where=array('user_id'=>$this->session->user_id);
			$this->body_vars['invoice_details']=$invoice_details=$this->custom->getSingleRow('invoice_setting',$invoice_where);
			if(is_null($invoice_details)){
				set_flash_message("message","warning","Define a Invoice Settings First !");
				redirect('invoice/invoice_setting');
			}
			/*==========================================*/
			$this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array('flag' => 'C'));
			//var_dump($this->body_vars['customer_options']);exit;
			/*==========================================*/
			$this->body_vars['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name','s_code'),"Sales Person",array('(',')'));
			/*==========================================*/
			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
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
			$this->body_vars['save_url']=base_url('invoice/create_new_invoice');
			/*==========================================*/
			$this->body_file="invoice/invoice.php";
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
			$this->body_vars['save_url']=base_url('invoice/create_new_invoice');
			/*==========================================*/
			$this->body_file="invoice/extract_invoice.php";
		}
		
		public function create_new_invoice($action="new")
		{
			is_logged_in('admin');
			has_permission();
			$post=$this->input->post();
			
			if (isset($post['ex_ref_no'])) {
				$this->custom->updateRow('quotation_master',array('invoice' => 1 ),array('quotation_id' => $post['ex_ref_no']));
				unset($post['ex_ref_no']);
			}
			if($post){
				if(count($post['product_id'])>=1){
					$invoice_data=$post;
					unset($invoice_data['product_row_id']); 
					unset($invoice_data['product_id']);
					unset($invoice_data['quantity']);
					unset($invoice_data['discount']);
					unset($invoice_data['gst_id']);
					unset($invoice_data['price']);
					unset($invoice_data['product_total']);
					unset($invoice_data['amount']);
					unset($invoice_data['logo_with']);
					$invoice_product_data=array_diff_assoc_recursive($post,$invoice_data);
					$invoice_data['modified_on']=date('Y-m-d');
					$invoice_data['user_id']=$this->session->user_id;
					
					$invoice_product_data['modified_on']=date('Y-m-d');
					if($action=="new"){
						$invoice_data['created_on']=date('Y-m-d');
						$invoice_product_data['created_on']=date('Y-m-d');
						
						$invoice_details=$this->custom->getSingleRow('invoice_setting',array('user_id'=>$this->session->user_id));

						$this->custom->updateRow("invoice_setting",array('invoice_number_prefix'=>$invoice_details->invoice_number_prefix+1),array('user_id'=>$this->session->user_id));

						$invoice_data['invoice_ref_no'] = str_replace(explode('.', $invoice_data['invoice_ref_no'])[1], $invoice_details->invoice_number_prefix+1,  $invoice_data['invoice_ref_no']);
						//unset($invoice_data['invoice_header_text']);
						$invoice_id=$this->custom->insertRow("invoice_master",$invoice_data);
						$invoice_product_data['invoice_id']=$invoice_id;
						foreach ($invoice_product_data['product_id'] as $product_id) {
							$insert_data['product_id']=$product_id;
							
							if($invoice_product_data['quantity'][$product_id]!=null)
							$insert_data['quantity']=$invoice_product_data['quantity'][$product_id];
							
							else
							$insert_data['quantity']=1;
							
							$insert_data['discount']=$invoice_product_data['discount'][$product_id];
							$insert_data['gst_id']=$invoice_product_data['gst_id'][$product_id];
							//$insert_data['invoice_header_text'] = ';
							$insert_data['price']=$invoice_product_data['price'][$product_id];
							$insert_data['product_total']=$invoice_product_data['product_total'][$product_id];
							$insert_data['modified_on']=$invoice_product_data['modified_on'];
							$insert_data['created_on']=$invoice_product_data['created_on'];
							$insert_data['invoice_id']=$invoice_product_data['invoice_id'];

							$invoice_product_id[]=$this->custom->insertRow("invoice_product_master",$insert_data);
							$stock_invoice_id[]=$this->custom->insertRow("stock_invoice_master",$insert_data);

							//GST table show
							$product_info = $this->custom->getSingleRow('billing_master',array('billing_id' => $product_id));
							if ($product_info->billing_type == "Product") {
								$i_g_code = $product_info->stock_code;
								$i_g_description = $product_info->billing_description;
								$i_g_cat = $this->custom->getSingleValue('gst_master','gst_code',array('gst_id' => $product_info->gst_id));
								$gst_rate = $this->custom->getSingleValue('gst_master','gst_rate',array('gst_id' => $product_info->gst_id));
								$i_g_lump_sum_discount_price = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100) * $invoice_data['currency_amount']) , 2, '.', '');
								$i_g_gst_amount = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate * $invoice_data['currency_amount'] / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_ex_rate = $invoice_data['currency_amount'];
								$i_g_lump_sum_discount_price_local = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100)) , 2, '.', '');
								$i_g_gst_amount_local = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_invoice_id = $invoice_product_data['invoice_id'];

								$insert_gst_data['i_g_date'] = date('Y-m-d');
								$insert_gst_data['i_g_doc_ref'] = $invoice_data['invoice_ref_no'];
								$insert_gst_data['i_g_code'] = $i_g_code;
								$insert_gst_data['i_g_description'] = $i_g_description;
								$insert_gst_data['i_g_cat'] = $i_g_cat;
								$insert_gst_data['i_g_lump_sum_discount_price'] = $i_g_lump_sum_discount_price;
								$insert_gst_data['i_g_gst_amount'] = $i_g_gst_amount;
								$insert_gst_data['i_g_ex_rate'] = $i_g_ex_rate;
								$insert_gst_data['i_g_lump_sum_discount_price_local'] = $i_g_lump_sum_discount_price_local;
								$insert_gst_data['i_g_gst_amount_local'] = $i_g_gst_amount_local;
								$insert_gst_data['i_g_invoice_id'] = $i_g_invoice_id;
								
								$invoice_product_id[]=$this->custom->insertRow("invoice_gst_table",$insert_data);	
							}
						}
					}
					if($action=="edit"){
						$where=array('invoice_id' => $invoice_data['invoice_id']);
						unset($invoice_data['invoice_id']);
						$this->db->trans_start();
						$res[]=$this->custom->updateRow("invoice_master",$invoice_data,$where);
						$res[]=$this->custom->deleteRow("invoice_product_master",$where);
						$res[] = $this->custom->deleteRow('invoice_gst_table',array('invoice_id' => $invoice_data['invoice_id'],'i_g_mark' => 'INV' ));
						$invoice_product_data=array_merge($invoice_product_data,$where);
						$invoice_product_data['created_on']=$this->custom->getSingleValue('invoice_master',"created_on",$where);
						foreach ($invoice_product_data['product_id'] as $product_id) {
							$insert_data['product_id']=$product_id;
						
						    if($invoice_product_data['quantity'][$product_id]!=null)	
							    $insert_data['quantity']=$invoice_product_data['quantity'][$product_id];
							else
							    $insert_data['quantity']=1;
							
							$insert_data['discount']=$invoice_product_data['discount'][$product_id];
							$insert_data['gst_id']=$invoice_product_data['gst_id'][$product_id];
							$insert_data['price']=$invoice_product_data['price'][$product_id];
							$insert_data['product_total']=$invoice_product_data['product_total'][$product_id];
							$insert_data['modified_on']=$invoice_product_data['modified_on'];
							$insert_data['created_on']=$invoice_product_data['created_on'];
							$insert_data['invoice_id']=$invoice_product_data['invoice_id'];
							$res[]=$this->custom->insertRow("invoice_product_master",$insert_data);

							$product_info = $this->custom->getSingleRow('billing_master',array('billing_id' => $product_id));
							if ($product_info->billing_type == "Product") {
								$i_g_code = $product_info->stock_code;
								$i_g_description = $product_info->billing_description;
								$i_g_cat = $this->custom->getSingleValue('gst_master','gst_code',array('gst_id' => $product_info->gst_id));
								$gst_rate = $this->custom->getSingleValue('gst_master','gst_rate',array('gst_id' => $product_info->gst_id));
								$i_g_lump_sum_discount_price = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100) * $invoice_data['currency_amount']) , 2, '.', '');
								$i_g_gst_amount = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate * $invoice_data['currency_amount'] / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_ex_rate = $invoice_data['currency_amount'];
								$i_g_lump_sum_discount_price_local = number_format((($insert_data['price'] * $insert_data['quantity'] - $insert_data['price'] * $insert_data['quantity'] * $insert_data['discount'] / 100)) , 2, '.', '');
								$i_g_gst_amount_local = number_format($insert_data['price'] * $insert_data['quantity'] * $gst_rate / 100 * (1 - $insert_data['discount'] / 100), 2, '.', '');
								$i_g_invoice_id = $invoice_product_data['invoice_id'];

								$insert_gst_data['i_g_date'] = date('Y-m-d');
								$insert_gst_data['i_g_doc_ref'] = $invoice_data['invoice_ref_no'];
								$insert_gst_data['i_g_code'] = $i_g_code;
								$insert_gst_data['i_g_description'] = $i_g_description;
								$insert_gst_data['i_g_cat'] = $i_g_cat;
								$insert_gst_data['i_g_lump_sum_discount_price'] = $i_g_lump_sum_discount_price;
								$insert_gst_data['i_g_gst_amount'] = $i_g_gst_amount;
								$insert_gst_data['i_g_ex_rate'] = $i_g_ex_rate;
								$insert_gst_data['i_g_lump_sum_discount_price_local'] = $i_g_lump_sum_discount_price_local;
								$insert_gst_data['i_g_gst_amount_local'] = $i_g_gst_amount_local;
								$insert_gst_data['i_g_invoice_id'] = $i_g_invoice_id;
								
								$invoice_product_id[]=$this->custom->insertRow("invoice_gst_table",$insert_data);	
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
					}redirect('invoice/invoicelist/confirmed');
					
				}
			}
		}

		public function invoicelist()
		{
			is_logged_in('admin');
			has_permission();
		}
		
		public function otherlist()
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
					$this->body_vars['save_url']=base_url('invoice/create_new_invoice/edit');
					$this->body_file="invoice/invoice_edit.php";
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
		
		public function zap_Invoice_data()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			zapInvoice();
			redirect('dashboard','refresh');
		}
	}
	
	/*End of file Invoice.php */
	/* Location: ./application/modules/new_modules/company_profile/controllers/Invoice.php */