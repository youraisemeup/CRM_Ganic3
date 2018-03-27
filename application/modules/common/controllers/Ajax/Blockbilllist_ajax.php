<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Blockbilllist_ajax extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="blockbill_master";
			$this->logged_id = $this->session->user_id;
			$this->load->model('blockbill/blockbill_model','blockbill');
		} 

		public function check_autobill_state(){
			is_ajax();
			$blockbill_month_info=$CI->custom->getRowsSorted("blockbill_master",array('user_id'=>$CI->session->user_id),array(),"bill_state","DESC",1);
			if (count($blockbill_month_info) && $blockbill_month_info[0]->bill_state == '') {
				$data['check_flag'] = 1;	
			}
			else
			{
				$data['check_flag'] = 0;	
			}
			
			echo json_encode($data);	
		}
		public function get_next_bill_month()
		{
			is_ajax();
			$blockbill_month_info=$this->custom->getRowsSorted("blockbill_master",array('user_id'=>$this->session->user_id,'bill_state!='=>'D'),array(),"bill_state","DESC",1);
			if ($blockbill_month_info[0]->bill_state != '') {
				$str_billing_date=$blockbill_month_info[0]->bill_state;
				$data['next_bill_month'] = $this->blockbill->convert_date($str_billing_date,'+1',0);	
			}
			else
			{
				$data['next_bill_month'] = '';	
			}
			
			echo json_encode($data);
		}
		public function get_customer_details()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->blockbill->get_customer_details($post);
			$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
			$data['customer_phone']=$result->customer_phone;
			$data['customer_email']=$result->customer_email;
			$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
			$data['customer_currency']=$currency_data->currency_name;
			$data['currency_amount']=$currency_data->currency_rate;

			$data['customer_name'] = $result->customer_name;
			$data['customer_code'] = $result->customer_code;
			//////////////
			echo json_encode($data);
		}

		public function get_contract_details()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result = $this->blockbill->get_contract_details($post);
			$data['contract_description'] = $result->contract_description;
			$data['contract_amount'] = $result->contract_amount;
			$data['contract_code'] = $result->contract_code;
			$data['contract_type'] = $result->contract_type;
			echo json_encode($data);
		}

		public function delete()
		{
            is_ajax();
			$id=$this->input->post('rowID');
			$where = array('blockbill_id' => $id);
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}

		public function postblockbill()
		{
			is_ajax();
			$search_billing_mon = $this->input->post('search_custom_date');
			$where=array('user_id' => $this->session->user_id,'bill_state!=' => 'D','next_bill_date like' => $search_billing_mon.'%');
			$blockbill_rows = $this->custom->getRows($this->table,$where);

			foreach ($blockbill_rows as $row)
			{
				$cont_type = $row->contract_type;
				switch ($cont_type) {
				    case "M":
				        $mon_plus = 1;
				        break;
				    case "Q":
				        $mon_plus = 3;
				        break;
				    case "H":
				        $mon_plus = 6;
				        break;
				    case "Y":
				        $mon_plus = 12;
				        break;
				    default:
				        echo "not available";
				}
				$new_start_date = $this->blockbill->convert_date($row->end_date,0,'+1');
				$new_end_date = $this->blockbill->convert_date($new_start_date,'+'.$mon_plus,'-1');
				$new_next_bill_date = $this->blockbill->convert_date($new_end_date,0,'+1');
				var_dump('new_start_date'.$new_start_date);
				var_dump('new_end_date'.$new_end_date);
				var_dump('new_next_bill_date'.$new_next_bill_date);
				$update_array = array('bill_date' => $search_billing_mon.'-01','next_bill_date' => $new_next_bill_date,'end_date' => $new_end_date,'start_date' => $new_start_date,'bill_state' => $search_billing_mon);
				$result = $this->custom->updateRow($this->table,$update_array,array('blockbill_id' => $row->blockbill_id));

				//AR table update with Block billing data
				$result2= $this->blockbill->get_customer_details(array('customer_id'=>$row->customer_id));

				$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result2->currency_id));
	            
	            $insert_data['doc_ref_no'] = $row->blockbill_ref_no;
	            $insert_data['customer_code'] = $result2->customer_code;
	            $insert_data['doc_date']= $row->bill_date;
	            $insert_data['currency_type'] = $currency_data->currency_name;
	            $insert_data['total_amt']= $row->total_inclusive_gst;
	            $insert_data['sign']='+';
	            $insert_data['tran_type']='BLOCKBILL';
	            $insert_data['invoice_id'] = $row->blockbill_id;
	                            
	            $this->custom->insertRow("accounts_receivable",$insert_data); 

	            //GL table update
                $gl_data['doc_ref_no'] = $row->blockbill_ref_no;
			    $gl_data['customer_code'] = $result2->customer_code;
                $gl_data['doc_date']= $row->bill_date;
                $gl_data['gst'] = $row->gst;
                $gl_data['currency_amount'] = $row->currency_amount;
                $gl_data['lump_sum_discount_price'] = $row->net_contract_amount;
                $gl_data['total_amt']= $row->total_inclusive_gst;
                $gl_data['tran_type']='BLOCKBILL';

                $this->custom->insertRow("gl_table",$gl_data);  

				//GST table update

                $contract_info = $this->custom->getSingleRow('contract_master',array('contract_id' => $row->contract_id));
                $i_g_code = $contract_info->contract_code;
                $i_g_description = $contract_info->contract_description;

				$insert_gst_data['i_g_date'] = $row->bill_date;
				$insert_gst_data['i_g_doc_ref'] = $row->blockbill_ref_no;
				$insert_gst_data['i_g_customer_id'] = $row->customer_id;
				$insert_gst_data['i_g_code'] = $i_g_code;
				$insert_gst_data['i_g_description'] = $i_g_description;
				$insert_gst_data['i_g_cat'] = "SR";
				$insert_gst_data['i_g_lump_sum_discount_price'] = $row->net_contract_amount;
				$insert_gst_data['i_g_gst_amount'] = $row->net_contract_amount * $row->gst / 100;
				$insert_gst_data['i_g_ex_rate'] = $row->currency_amount;
				$insert_gst_data['i_g_lump_sum_discount_price_local'] = $row->net_contract_amount / $row->currency_amount;
				$insert_gst_data['i_g_gst_amount_local'] = $row->net_contract_amount * $row->gst / 100 / $row->currency_amount;
				$insert_gst_data['i_g_invoice_id'] = $row->contract_id;
				$insert_gst_data['i_g_mark'] = 'BLOCKBILL';
				
				$invoice_product_id[]=$this->custom->insertRow("invoice_gst_table",$insert_gst_data);	

			}
 		    echo $result;
		}

		public function num_change($value)
	    {
	    	return number_format($value,2, '.','');
	    }

	    public function print_blockbill($mode="print")
		{
			$row_id=$this->input->post('rowID');
			$this->data['blockbill_edit_data']=$blockbill_edit_data=$this->custom->getSingleRow('blockbill_master',array("blockbill_id"=>$row_id));

			if($blockbill_edit_data):
				$company_where=array('profile_id'=>1);
				$this->data['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->data['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Customer",array('(',')',' '),array(),array($blockbill_edit_data->customer_id));
				/*==========================================*/
				$this->data['contract_options']=$this->custom->createDropdownSelect("contract_master",array('contract_id','contract_code','contract_description'),"Contract",array(" : "," "),array(),array($blockbill_edit_data->contract_id));

				$result= $this->blockbill->get_customer_details(array('customer_id'=>$blockbill_edit_data->customer_id));
				$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
				
				$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
				$data['customer_currency']=$currency_data->currency_name;
				$this->data['cust_data']=$data;


				// $this->data['product_array']=$product_array;
				// /*==========================================*/
				// $company_where=array('profile_id'=>1);
				// $this->data['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				// /*==========================================*/
				// $this->data['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code'),"Customer",array('(',')'),array(),array($blockbill_edit_data->customer_id));
				// /*==========================================*/
				// $this->data['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name'),"Sales Person",array(' '),array(),array($blockbill_edit_data->salesman_id));
				// /*==========================================*/
				// $this->data['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
				// /*==========================================*/
				// $this->data['total_invoice']=$this->custom->getTotalCount("invoice_master");
				// /*==========================================*/
				// $result= $this->invoice->get_customer_details(array('customer_id'=>$blockbill_edit_data->customer_id));
				// $data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
				// $data['customer_phone']=$result->customer_phone;
				// $data['customer_email']=$result->customer_email;
				// $currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
				// $data['customer_currency']=$currency_data->currency_name;
				// $data['currency_amount']=$currency_data->currency_rate;
				// $this->data['cust_data']=$data;
				/*==========================================*/

					$this->data['save_url']=base_url('blockbill/create_new_blockbill/edit');
					if($mode=="print"):
						$this->data['mode']="print";
						$this->load->view('blockbill/blockbill_view.php', $this->data, FALSE);
					endif;
					if($mode=="email"):
						$this->data['mode']="email";
						$html=$this->load->view('invoice/invoice_view.php', $this->data, TRUE);	
						$this->load->helper('email');
						// send_email("parthganatra17@gmail.com","trueline.chirag@gmail.com","Test",$html);
						send_email("mohit.ch@ibrinfotech.com","mohit.ch@ibrinfotech.com","Test",$html);
					endif;
					$message='<div class="alert alert-success fade in"><button type="button" class="close close-sm" data-dismiss="alert"><i class="fa fa-times"></i></button>'.$mode.' Task Complete!</div>';

				/*==========================================*/
				?>
				<script>
				message='<?php echo $message; ?>';
				$("#form_data").html(""); // remove content of form.
                $("#refresh").click();//refresh  the datatable.
                $("#list_table").show(); // show data table
                $("#message_area").html(message);
                </script><?php
			else:
    				redirect('blockbill','refresh');
			endif;
		}
		
		public function email()
		{
			echo '<script> $("#refresh").click(); </script>';
			echo '<script> $("#list_table").show();</script>';
		}

	}

?>