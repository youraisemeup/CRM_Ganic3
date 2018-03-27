<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Backend_ajax extends CI_Controller {

		public $view_path;
		public $data; 
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="purchase_master";
			$this->logged_id = $this->session->user_id;
			$this->load->model('backend/backend_model','backend');
		}  
		public function get_customer_details()
		{ 
			is_ajax(); 
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->backend->get_customer_details($post);
			$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
			$data['customer_phone']=$result->customer_phone;
			$data['customer_email']=$result->customer_email;
			$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
			$data['customer_currency']=$currency_data->currency_name;
			$data['currency_amount']=$currency_data->currency_rate;
			$data['customer_name'] = $result->customer_name;
			$data['customer_code'] = $result->customer_code;
			echo json_encode($data);
		}

		public function get_bank_statement()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			//$post=$this->input->post();
			

			$this->db->select('*');
			$this->db->from('bank');
			$this->db->order_by("bank_date", "asc");
			$this->db->order_by("bank_reference", "asc");
			$this->db->order_by("bank_remarks", "asc");
			$query = $this->db->get();
			$ar_data = $query->result();

			$html = '';
			$amount = 0;

			foreach ($ar_data as $key => $value) {

				$html.='<tr>';
				$html.='<td>'.$value->bank_date.'</td>';
				$html.='<td>'.$value->bank_reference.'</td>';
				$html.='<td>'.$value->bank_remarks.'</td>';
				if(isset($value->bank_debit))
				{
				    $amount+=number_format(($value->bank_debit), 2, '.', '');
				    $html.='<td>'.number_format(($value->bank_debit), 2, '.', '').'</td>';
				    $html.='<td></td>';
				}
				
				else if(isset($value->bank_credit))
				{
				    $amount-=number_format(($value->bank_credit), 2, '.', '');
			    	$html.='<td></td>';
			    	$html.='<td>'.number_format(($value->bank_credit), 2, '.', '').'</td>';
				}
				if ($amount >= 0) {
					$html.='<td>'.number_format(($amount), 2, '.', '').'(DR)'.'</td>';	
				}
				else 
				{
					$html.='<td>'.number_format(($amount * (-1)), 2, '.', '').'(CR)'.'</td>';	
				}
				
				$html.='</tr>';
			}
			
			$data['table_html']=$html;
            
            //echo "<script>console.log(" . $html . " );</script>";	

			echo json_encode($data);
		}

		public function get_customer_payment_details()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->custom->getSingleRow("customer_master",array('customer_id'=>$post['customer_id']));
			$country_data=$this->custom->getSingleRow("country_master",array('country_id'=>$result->country_id));
			$data['customer_bldg_street']=$result->customer_bldg_number.' , '.$result->customer_street_name;
			$data['customer_cntry_post']=$country_data->country_name.' , '.$result->customer_postal_code;
			if(isset($post['edit']) && $post['edit'] == 'edit'){
				$data['invoice_reference']=$this->custom->createDropdownSelect("accounts_payable",array('ap_id','doc_ref_no'),"Invoice Ref No",array(''),array('supplier_code' => $result->customer_code,'settled'=>'n','tran_type !='=>'PAY'));
			}else{
				$data['invoice_reference']=$this->custom->createDropdownSelect("accounts_payable",array('ap_id','doc_ref_no'),"Invoice Ref No",array(''),array('supplier_code' => $result->customer_code,'settled'=>'n','tran_type !='=>'PAY'));
			}
			/*==========================================*/
			// echo "<pre>";print_r($data['invoice_reference']);die;
			$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
			$data['customer_currency']=$currency_data->currency_name;
			$data['currency_amount']=$currency_data->currency_rate;
			echo json_encode($data);
		}

		public function get_payment_edit_data() {
			is_ajax();
			$post=$this->input->post();
			$total = 0;
			$invoic_name = [];	
			$invoice_amt = [];
			$invoice_no = []; 
			//print_r($post);exit();
			foreach ($post['purchase_id'] as $key => $value) {
				$purchase_data=$this->custom->getSingleRow("accounts_payable",array('ap_id'=>$value));

				$payment_invoice_data=$this->custom->getSingleRow("payment_purchase_master",array('purchase_id'=>$value,'payment_id' => $post['payment_id']));

				$paid_amount = $this->get_partial_with_purchase_id($value);
				//$total+= number_format(($purchase_data->final_total*$purchase_data->currency_amount), 2, '.', '');
				$total += number_format(($purchase_data->total_amt), 2, '.', '');
				$invoic_name[$key] = $purchase_data->doc_ref_no;

				if ($purchase_data->sign == "+") {
					$amount_sign[$key] = 1;	
				}
				else if($purchase_data->sign == "-"){
					$amount_sign[$key] = -1;	
				}

				$invoice_no[$key] = $value;
				$invoice_paid_amount[$key] = $paid_amount;
				$invoice_full_amount[$key] = $payment_invoice_data->full_amount;

				$invoice_amt[$key] = $payment_invoice_data->pay_pur_amount;
			}
			
			$data['total'] = number_format($total,2);
			$data['invoic_name'] = $invoic_name;
			$data['purchase_id']  = $invoice_no;
			$data['paid_amount'] = $invoice_paid_amount;
			$data['full_amount'] = $invoice_full_amount;
			$data['invoice_amt'] = $invoice_amt;

			$data['amount_sign'] = $amount_sign;
			echo json_encode($data); 
		}


		public function get_payment_data() {
			is_ajax();
			$post=$this->input->post();
			$total = 0;
			$invoic_name = [];	
			$invoice_amt = [];
			$invoice_no = [];
			foreach ($post['purchase_id'] as $key => $value) {
				$purchase_data=$this->custom->getSingleRow("accounts_payable",array('ap_id'=>$value));

				$paid_amount = $this->get_partial_with_purchase_id($value);

				$full_amount_origin = $this->from_pay_inv_mas($value);

				if ($full_amount_origin == 0) {
					$full_amount = $this->get_full_amount_with_purchase_id($value);	
				}
				else
				{
					$full_amount = $full_amount_origin;
				}

				$total+= number_format(($purchase_data->total_amt), 2, '.', '');
				$invoic_name[$key] = $purchase_data->doc_ref_no;

				if ($purchase_data->sign == "+") {
					$amount_sign[$key] = 1;	
				}
				else if($purchase_data->sign == "-"){
					$amount_sign[$key] = -1;	
				}

				$invoice_no[$key] = $value;
				$invoice_paid_amount[$key] = $paid_amount;
				$invoice_full_amount[$key] = $full_amount;

				$invoice_amt[$key] = number_format(($full_amount), 2);
			}
			
			$data['total'] = number_format($total,2);
			//$data['total'] = $total;
			//$data['total_in_words'] = $this->convert_number_to_words($total);
			$data['invoic_name'] = $invoic_name;
			$data['purchase_id']  = $invoice_no;

			$data['paid_amount'] = $invoice_paid_amount;
			$data['full_amount'] = $invoice_full_amount;
			$data['invoice_amt'] = $invoice_amt;

			$data['amount_sign'] = $amount_sign;
			echo json_encode($data); 
		}

		public function delete_apopen()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('ap_open_id' => $id);
			$result = $this->custom->updateRow("ap_open",array('ap_open_status'=>'D'),$where);
			echo $result;
		}	

		public function delete_payment()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('payment_id' => $id);
			$result = $this->custom->updateRow("payment_master",array('payment_status'=>"D"),$where);
			echo $result;
		}


		public function get_partial_with_purchase_id($purchase_id = null)
		{
			$sql = 'SELECT SUM(pay_pur_amount) AS sum_partial FROM payment_purchase_master WHERE partial_status = "P" AND purchase_id = '.$purchase_id.' GROUP BY(purchase_id)';

			$query = $this->db->query($sql);
			
			$sum_partial_array = $query->result();
		
			foreach ($sum_partial_array as $key => $value) {
				$sum_partial = $value->sum_partial;
			}
			if (isset($sum_partial)) {
				return $sum_partial;	
			}
			else 
			{
				return 0;
			}
		}

		public function from_pay_inv_mas($purchase_id = null)
		{
			$sql = 'SELECT full_amount - pay_pur_amount AS amt FROM payment_purchase_master WHERE purchase_id = "'.$purchase_id.'" AND partial_status = "P" ORDER BY full_amount ASC LIMIT 1;';
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $key => $value)
			{
				if (isset($value['amt'])) {
					return $value['amt'];	
				}
				else
				{
					return 0;
				}
			}
		}

		public function get_full_amount_with_purchase_id($purchase_id = null)
		{
			$full_amount = $this->custom->getSingleValue('accounts_payable','total_amt',array("ap_id"=>$purchase_id));
			return $full_amount;
		}
		public function offset_records()
		{
			is_ajax();
			$customer_id = $this->input->post('customer_id');
			$date_to_offset = $this->input->post('offset_date');
			$customer_code = $this->custom->getSingleValue('customer_master','customer_code',array("customer_id" => $customer_id));

			$sql = 'SELECT purchase_id FROM payment_purchase_master WHERE partial_status = "p" GROUP BY purchase_id';
			$query = $this->db->query($sql);

			foreach ($query->result_array() as $key => $value)
			{	

			    $offsetted_amt = $this->from_pay_inv_mas($value['purchase_id']);
				   
			    if ($offsetted_amt <= 0) {
			    	$this->custom->updateRow("accounts_payable",array('total_amt'=>$offsetted_amt,'settled'=>'y'),array('ap_id'=>$value['purchase_id'],'tran_type !='=>'PAY'));	
			    }
			    else if($offsetted_amt > 0)
			    {
			    	$this->custom->updateRow("accounts_payable",array('total_amt'=>$offsetted_amt,'offset'=>'f'),array('ap_id'=>$value['purchase_id'],'tran_type !='=>'PAY'));		
			    }
			}	
			echo $customer_id;
		}

		public function offset_all_records()
		{
			is_ajax();
			$customer_id_array = $this->input->post('customer_id');
			foreach ($customer_id_array as $key1 => $value1) {

				$customer_id = $value1['customer_id'];
				$date_to_offset = $this->input->post('offset_date');
				$customer_code = $this->custom->getSingleValue('customer_master','customer_code',array("customer_id" => $customer_id));

				$sql = 'SELECT purchase_id FROM payment_purchase_master WHERE partial_status = "p" GROUP BY purchase_id';
				$query = $this->db->query($sql);
				foreach ($query->result_array() as $key => $value)
				{	

				    $offsetted_amt = $this->from_pay_inv_mas($value['purchase_id']);
				   
				    if ($offsetted_amt <= 0) {
				    	$this->custom->updateRow("accounts_payable",array('total_amt'=>$offsetted_amt,'settled'=>'y'),array('ap_id'=>$value['purchase_id'],'tran_type !='=>'PAY'));	
				    }
				    else if($offsetted_amt > 0)
				    {
				    	$this->custom->updateRow("accounts_payable",array('total_amt'=>$offsetted_amt,'offset'=>'f'),array('ap_id'=>$value['purchase_id'],'tran_type !='=>'PAY'));		
				    }
				}	
			}
			
			echo json_encode($customer_id_array);
		}
		public function post_payment()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('payment_id' => $id);
			$result = $this->custom->updateRow("payment_master",array('payment_status'=>"P"),$where);

			$sql = 'SELECT purchase_id FROM payment_purchase_master WHERE payment_id = "'.$id.'"';
		    $query = $this->db->query($sql);
			foreach ($query->result_array() as $key => $value)
			{

				$where_pur = array('purchase_id' => $value['purchase_id'],'payment_id'=>$id);
				$new_full_amt = $this->from_pay_inv_mas($value['purchase_id']);

				if ($new_full_amt != 0) {
					$result = $this->custom->updateRow("payment_purchase_master",array('partial_status'=>"P",'full_amount'=> $new_full_amt),$where_pur);
				}
				else
				{
					$result = $this->custom->updateRow("payment_purchase_master",array('partial_status'=>"P"),$where_pur);
				}
			}

			$payment_data=$this->custom->getSingleRow('payment_master',$where);
			$result2= $this->custom->getSingleRow('customer_master', array('customer_id'=>$payment_data->supplier_id));
		
		    $sql = 'SELECT purchase_id FROM payment_purchase_master WHERE payment_id = "'.$id.'"';
		    $query = $this->db->query($sql);
			foreach ($query->result_array() as $key => $value)
			{

				$new_full_amt = $this->from_pay_inv_mas($value['purchase_id']);

			    if ($new_full_amt <= 0) { 
			    	$this->custom->updateRow("accounts_payable",array('settled'=>'y'),array('ap_id'=>$value['purchase_id']));	
			    }

			    // $partial_sum = $this->get_partial_with_purchase_id($value['purchase_id']);
			    // $full_amount = $this->get_full_amount_with_purchase_id($value['purchase_id']);
			    // if ($partial_sum >= $full_amount) {
			    // 	$this->custom->updateRow("accounts_payable",array('settled'=>'y'),array('ap_id'=>$value['purchase_id']));	
			    // }
			}

                $insert_data['doc_ref_no'] = $payment_data->payment_ref_no;
                $insert_data['supplier_code'] = $result2->customer_code;
                $insert_data['doc_date']= $payment_data->modified_on;
                $insert_data['currency_type'] = $payment_data->currency;
                $insert_data['total_amt']= floatval(str_replace(",","",$payment_data->amount));
                $insert_data['sign']='+';
                $insert_data['tran_type']='PAY';
                
                if($payment_data->other_reference!="")
                {
                    $insert_data['remarks']=$payment_data->other_reference;

                    $bank_data['bank_remarks'] = $payment_data->other_reference;
                }
                else
                {
                    $insert_data['remarks']="";

                    $bank_data['bank_remarks'] = "";
                }
                
                $insert_data['settled']='y';
                $insert_data['purchase_id'] = $id;
                
                $this->custom->insertRow("accounts_payable",$insert_data);

                $bank_data['bank_reference'] = $payment_data->payment_ref_no;
                $bank_data['bank_date'] = $payment_data->modified_on;
                
                $bank_data['bank_credit'] = floatval(str_replace(",","",$payment_data->amount));

                $sql = "SELECT * FROM bank ORDER BY bank_id DESC LIMIT 1";

                $query = $this->db->query($sql);

                $row = $query->row();
                if (isset($row)) {
                	$last_balance = $row->bank_balance;
                }
                else
                {
                	$last_balance = 0;	
                }

                $bank_data['bank_balance'] = $last_balance - floatval(str_replace(",","",$payment_data->amount));

                $this->custom->insertRow("bank",$bank_data);
			//echo $result;
			
		}

		public function get_coa_option()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();

			$table = "chart_of_account";
			$join_table=array("chart_of_account_prefix");
			$join_condition=array('chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id');
			$where = array('coa_id'=>$post["coa_id"]);

			$coa_details = $this->custom->getRowsWhereJoin($table,$where,$join_table,$join_condition);
			echo "<option value=".$coa_details[0]->coa_id.">".$coa_details[0]->coa_pre_character.$coa_details[0]->coa_suffix.$coa_details[0]->coa_pre_description."</option>";	
		}

		public function delete_opayment()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('opay_id' => $id);
			$result = $this->custom->updateRow('other_payment',array('opay_status'=>"D"),$where);
			echo $result;
		}

		public function success_opayment()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('opay_id' => $id);
			$result = $this->custom->updateRow("other_payment",array('opay_status'=>"P"),$where);

			//TODO: iNSERT INTO AP TABLE 
				$payment_data=$this->custom->getSingleRow('other_payment',$where);
				    
 				$bank_data['bank_reference'] = $payment_data->opay_ref_no;
                $bank_data['bank_date'] = $payment_data->opay_date;
                
                $bank_data['bank_credit'] = floatval(str_replace(",","",$payment_data->opay_amount));

                $sql = "SELECT * FROM bank ORDER BY bank_id DESC LIMIT 1";

                $query = $this->db->query($sql);

                $row = $query->row();
                if (isset($row)) {
                	$last_balance = $row->bank_balance;
                }
                else
                {
                	$last_balance = 0;	
                }

                $bank_data['bank_balance'] = $last_balance - floatval(str_replace(",","",$payment_data->opay_amount));

                $this->custom->insertRow("bank",$bank_data);

			echo $result;	
		}

		public function get_edit_coa_code_description()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();

			$table = "chart_of_account";
			$join_table=array("chart_of_account_prefix");
			$join_condition=array('chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id');
			$where = array('coa_id'=>$post["coa_id"]);

			$coa_details = $this->custom->getRowsWhereJoin($table,$where,$join_table,$join_condition);

			$opay_amount = $this->custom->getSingleValue("other_payment","opay_amount",array('opay_id'=>$post['opay_id']));
			
			$html="";
			$html.="<td>".$coa_details[0]->coa_pre_character.$coa_details[0]->coa_suffix.$coa_details[0]->coa_pre_description."</td>";
			$html.="<td style='min-width:150px;' class='form-group error_block'><input type='number' required class='form-control' value='".$opay_amount."' name='amount[".$coa_details[0]->coa_id."]' id='amount_".$coa_details[0]->coa_id."' ></td>";
			$html.="<td><a class='btn btn-xs btn-danger delete-row' onclick='delete_row(this)'>Remove</a></td>";
			echo $html;
		}

		public function get_coa_code_description()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();

			$table = "chart_of_account";
			$join_table=array("chart_of_account_prefix");
			$join_condition=array('chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id');
			$where = array('coa_id'=>$post["coa_id"]);

			$coa_details = $this->custom->getRowsWhereJoin($table,$where,$join_table,$join_condition);
			
			$html="";
			$html.="<td>".$coa_details[0]->coa_pre_character.$coa_details[0]->coa_suffix.$coa_details[0]->coa_pre_description."</td>";
			$html.="<td style='min-width:150px;' class='form-group error_block'><input type='number' required class='form-control' value='' name='amount[".$coa_details[0]->coa_id."]' id='amount_".$coa_details[0]->coa_id."' ></td>";
			$html.="<td><a class='btn btn-xs btn-danger delete-row' onclick='delete_row(this)'>Remove</a></td>";
			echo $html;
		}

		public function get_product_code_description()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			
			$product_details=$this->backend->get_product_details_row($post["billing_id"]);

			$html="";
			$html.="<td>".$product_details->stock_code.$product_details->billing_description."</td>";
			$html.="<td class='form-group error_block'><input type='number' required min='1' class='form-control' value='$quantity' name='quantity[$product_details->billing_id]' id='quantity_".$product_details->billing_id."' onchange='get_amount(".$product_details->billing_id.")'></td>";
			$html.="<td class='form-group error_block'><input type='number' required min='1' class='form-control' value='$unit_price' name='unit_price[$product_details->billing_id]' id='unit_price_".$product_details->billing_id."' onchange='get_amount(".$product_details->billing_id.")'></td>";
			$html.="<td class='total' data-show='0' data-calculate='0' id='total_".$product_details->billing_id."'></td>";
			$html.="<td><a class='btn btn-xs btn-danger delete-row' onclick='delete_row(this)'>Remove</a></td>";
			$html.="<td><input class='form-control' name='amount[$product_details->billing_id]' type='hidden' id='service_total_".$product_details->billing_id."'></td>";
			echo $html;
		}
		public function get_product_code_description_edit()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$purchase_id=null;
			if (isset($post['purchase_id'])) {
				$purchase_id=$post['purchase_id']; 
				unset($post['purchase_id']);
			}
			$product_details=$this->backend->get_product_details_row($post["billing_id"]);
			$old_purchase_product_details=$this->custom->getSingleRow('purchase_product_master',array("purchase_id"=>$purchase_id,'product_id'=>$product_details->billing_id));
			$quantity=1;
			$unit_price=0;
			if(!is_null($old_purchase_product_details)){
				$quantity=$old_purchase_product_details->quantity;
				$unit_price=$old_purchase_product_details->unit_price;
			}
			
			$html="";
			$html.="<td>".$product_details->stock_code.$product_details->billing_description."</td>";
			$html.="<td><input type='number' required min='1' class='form-control' value='$quantity' name='quantity[$product_details->billing_id]' id='quantity_".$product_details->billing_id."' onchange='get_amount(".$product_details->billing_id.")'></td>";
			$html.="<td><input type='number' required min='1' class='form-control' value='$unit_price' name='unit_price[$product_details->billing_id]' id='unit_price_".$product_details->billing_id."' onchange='get_amount(".$product_details->billing_id.")'></td>";
			$html.="<td class='total' data-show='0' data-calculate='0' id='total_".$product_details->billing_id."'></td>";
			$html.="<td><a class='btn btn-xs btn-danger delete-row' onclick='delete_row(this)'>Remove</a></td>";
			$html.="<td><input class='form-control' name='amount[$product_details->billing_id]' type='hidden' id='service_total_".$product_details->billing_id."'></td>";
			echo $html;
		}
		public function get_product_option()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$product_details=$this->backend->get_product_details($post);
			echo "<option value=".$product_details->billing_id.">".$product_details->stock_code." : ".$product_details->billing_description."</option>";	
		}

		public function get_product_details($billing_id = NULL)
		{
			$product_details = $this->custom->getSingleRow('billing_master',array('billing_id'=>$billing_id));
			return $product_details;
		}

		public function get_dateprice_withproduct_id($product_id = 0)
		{
			$sql = 'SELECT quantity,unit_price_sgd,tranaction_date,purchase_id FROM histcost_master WHERE product_id = '.$product_id.' ORDER BY tranaction_date DESC';
			$query = $this->db->query($sql);
			$product_array = $query->result();
			return $product_array;
		}


		public function get_report_base_fifo()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			
			$post=$this->input->post();
			$sql = "SELECT product_id, SUM(quantity) AS quantity FROM ( SELECT product_id,SUM(quantity) * (-1) AS quantity FROM (SELECT * FROM (SELECT product_id, quantity FROM invoice_master JOIN stock_invoice_master ON invoice_master.invoice_id = stock_invoice_master.invoice_id WHERE invoice_status = 'P') AS total 
WHERE total.product_id IN (SELECT billing_id FROM billing_master WHERE billing_type = 'Product')) AS stock_invoice_master  GROUP BY(product_id)
UNION
SELECT open_billing_id AS product_id, SUM(open_stock_quantity) AS quantity FROM open_stock_table WHERE open_stock_status = 'P' GROUP BY(open_billing_id)
UNION
SELECT purchase_billing_id AS product_id, SUM(purchase_quantity) AS quantity FROM stock_purchase_master WHERE purchase_status = 'P' GROUP BY(purchase_billing_id)
UNION
SELECT adjustment_billing_id AS product_id, SUM(adjustment_quantity) AS quantity FROM stock_adjustment_master WHERE adjustment_sign = '+' AND adjustment_status = 'P' GROUP BY(adjustment_billing_id)
UNION
SELECT adjustment_billing_id AS product_id, SUM(adjustment_quantity) * (-1) AS quantity FROM stock_adjustment_master WHERE adjustment_sign = '-' AND adjustment_status = 'P' GROUP BY(adjustment_billing_id)) AS total GROUP BY(product_id);
";

			$query = $this->db->query($sql);
			
			$product_array = $query->result();
		
			$tbody_html = '';
			$i = 0;
			$total_amt = 0;
			foreach ($product_array as $key => $value) {

				$product_id = $value->product_id;
				$quantity = $value->quantity;				
				$history_array = $this->get_dateprice_withproduct_id($product_id);
				//var_dump($history_array);exit();
				if (count($history_array) && $quantity > 0) {
					$compare_quantity = $quantity;
					$amount_fifo = 0;
					$history_date = array();
					$history_up = array();
					$history_qty = array();
					$history_amt = array();
					$history_ref = array();
					foreach ($history_array as $key => $value) {

						$history_quantity = $value->quantity;
						$history_unitprice = $value->unit_price_sgd;
						if ($compare_quantity <= $history_quantity) {
							$amount_fifo += $compare_quantity * $history_unitprice; 
							
							$history_date[] = $value->tranaction_date;
							$history_up[] = $value->unit_price_sgd;
							$history_qty[] = $compare_quantity;
							$history_amt[] = $amount_fifo;

							$purchase_id = $value->purchase_id;
							$ref = $this->custom->getSingleRow("purchase_master",array("purchase_id"=>$purchase_id))->purchase_ref_no;
							$history_ref[] = $ref;

							break;
						}
						else
						{
							$amount_fifo += $history_quantity * $history_unitprice;
							$compare_quantity = $compare_quantity - $history_quantity;

							$history_date[] = $value->tranaction_date;
							$history_up[] = $value->unit_price_sgd;
							$history_qty[] = $value->quantity;
							$history_amt[] = $amount_fifo;

							$purchase_id = $value->purchase_id;
							$ref = $this->custom->getSingleRow("purchase_master",array("purchase_id"=>$purchase_id))->purchase_ref_no;
							$history_ref[] = $ref;
						}
					}

					$details = $this->get_product_details($product_id);

					$tbody_html .= '<tr><td style="color:blue;">';
					$tbody_html .= $details->stock_code.' '.$details->billing_description;
					$tbody_html .= '</td><td></td><td></td><td></td><td></td>';

					foreach ($history_date as $key => $value) {
						$tbody_html .= "<tr><td>";
						$tbody_html .= $history_date[$key];
						$tbody_html .= "</td><td>";
						$tbody_html .= $history_ref[$key];
						$tbody_html .= "</td><td>";
						$tbody_html .= $history_qty[$key];
						$tbody_html .= "</td><td>";
						$tbody_html .= $history_up[$key];
						$tbody_html .= "</td><td>";
		                $tbody_html .= number_format($history_qty[$key] * $history_up[$key],2,'.','');
		                $tbody_html .= "</td></tr>";	
					}
					if (count($history_date) > 1) {
						$tbody_html .= '<tr><td style="color:blue;">subtotal</td><td></td><td>';
						$tbody_html .= array_sum($history_qty);
						$tbody_html .= '</td><td></td><td>';
						$tbody_html .= number_format($amount_fifo,2,'.','');
						$tbody_html .= '</td></tr>';
					}
					
					
	                $total_amt += $amount_fifo;
				}
			}

			$tbody_html .= '<tr><td style="color:red;">Grand Total Stocks</td><td></td><td></td><td></td><td>';
			$tbody_html .= number_format($total_amt,2,'.','');
			$tbody_html .= '</td></tr>';
			
			$result['table_html'] = $tbody_html;
			
			echo json_encode($result);
		}

		public function get_report_base_wac()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$sql = "SELECT product_id, SUM(quantity) AS quantity , SUM(amt_sgd) AS amount, SUM(amt_sgd)/SUM(quantity) AS wac FROM histcost_master GROUP BY(product_id)";

			$query = $this->db->query($sql);
			$wac_array = $query->result();

			$post=$this->input->post();
			$sql = "SELECT product_id, SUM(quantity) AS quantity FROM ( SELECT product_id,SUM(quantity) * (-1) AS quantity FROM (SELECT * FROM (SELECT product_id, quantity FROM invoice_master JOIN stock_invoice_master ON invoice_master.invoice_id = stock_invoice_master.invoice_id WHERE invoice_status = 'P') AS total 
WHERE total.product_id IN (SELECT billing_id FROM billing_master WHERE billing_type = 'Product')) AS stock_invoice_master  GROUP BY(product_id)
UNION
SELECT open_billing_id AS product_id, SUM(open_stock_quantity) AS quantity FROM open_stock_table WHERE open_stock_status = 'P' GROUP BY(open_billing_id)
UNION
SELECT purchase_billing_id AS product_id, SUM(purchase_quantity) AS quantity FROM stock_purchase_master WHERE purchase_status = 'P' GROUP BY(purchase_billing_id)
UNION
SELECT adjustment_billing_id AS product_id, SUM(adjustment_quantity) AS quantity FROM stock_adjustment_master WHERE adjustment_sign = '+' AND adjustment_status = 'P' GROUP BY(adjustment_billing_id)
UNION
SELECT adjustment_billing_id AS product_id, SUM(adjustment_quantity) * (-1) AS quantity FROM stock_adjustment_master WHERE adjustment_sign = '-' AND adjustment_status = 'P' GROUP BY(adjustment_billing_id)) AS total GROUP BY(product_id);
";

			$query = $this->db->query($sql);
			
			$product_array = $query->result();
		
			$tbody_html = '';
			$i = 0;
			$total_amt = 0;
			foreach ($product_array as $key => $value) {

				foreach ($wac_array as $key1 => $value1) {
					if($value->product_id == $value1->product_id && $value->quantity > 0){

						$billing_id = $value->product_id;
						$details = $this->get_product_details($billing_id);
						$tbody_html .= "<tr><td>";
						$tbody_html .= $details->stock_code;
						$tbody_html .= "</td><td>";
						$tbody_html .= $details->billing_description;
						$tbody_html .= "</td><td>";
						$tbody_html .= $value->quantity;
						$tbody_html .= "</td><td>";
		                $tbody_html .= number_format($value1->wac,2,'.','');
		                $tbody_html .= "</td><td>";
		                $tbody_html .= number_format(($value->quantity) * ($value1->wac),2, '.','');
		                $tbody_html .= "</td></tr>";
		                $total_amt += ($value->quantity) * ($value1->wac);
					}
				}
			}

			$tbody_html .= '<tr><td style="color:red;">Total Stocks</td><td></td><td></td><td></td><td>';
			$tbody_html .= number_format($total_amt,2,'.','');
			$tbody_html .= '</td></tr>';
			
			$result['table_html'] = $tbody_html;
			
			echo json_encode($result);
			
		}
		
		
		public function delete_purchase()
		{
            is_ajax();
			$id=$this->input->post('rowID');
			$where = array('purchase_id' => $id);
			$result = $this->custom->updateRow($this->table,array('purchase_status'=>"D"),$where);
			echo $result;
		}

		public function success_purchase()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('purchase_id' => $id);
			$result = $this->custom->updateRow($this->table,array('purchase_status'=>"P"),$where);

			//TODO: iNSERT INTO AP TABLE 
				$purchase_data=$this->custom->getSingleRow('purchase_master',array("purchase_id"=>$id));
				    
 				$result2= $this->backend->get_customer_details(array('customer_id'=>$purchase_data->supplier_id));

 				$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result2->currency_id));
                
                //$insert_data['ar_id']="NULL";
                $insert_data['doc_ref_no'] = $purchase_data->purchase_ref_no;
                $insert_data['purchase_id'] = $id;
                // echo "<script>console.log( 'Debug Objects: " . $insert_data['doc_ref_no'] . "' );</script>";	
                $insert_data['supplier_code'] = $result2->customer_code;
                $insert_data['doc_date']= $purchase_data->doc_date;
                $insert_data['currency_type'] = $currency_data->currency_name;
                $insert_data['total_amt']= number_format((($purchase_data->total_purchase_b4_gst + $purchase_data->gst_in_sgd) * $purchase_data->currency_amount),2,'.','');
                // $insert_data['exchange_rate']= $currency_data->currency_rate;
                // $insert_data['total_amount_b4_gst']= $purchase_data->total_purchase_b4_gst;
                $insert_data['sign']='-';
                $insert_data['tran_type']='PUR';
               
                
                $this->custom->insertRow("accounts_payable",$insert_data);
                //TODO: insert into the histcost.table
                $group_purchase_id = $purchase_data->purchase_id;

                $where = array('purchase_id' => $group_purchase_id);
                $purchased_product_array = $this->custom->getRows('purchase_product_master',$where);

                $total_product_amount_local = $purchase_data->total_purchase_b4_gst;
                $total_product_amount_foreign = 0;
                foreach ($purchased_product_array as $key => $value) {
                	$total_product_amount_foreign += $value->amount;
                }
                $conversion_factor = number_format($total_product_amount_local / $total_product_amount_foreign,2,'.','');

                foreach ($purchased_product_array as $key => $value) {
                	$insert_data_histcost['tranaction_date'] = $purchase_data->doc_date;
                	$insert_data_histcost['purchase_id'] = $group_purchase_id;
                	$insert_data_histcost['product_id'] = $value->product_id;
                	$insert_data_histcost['amt_sgd'] = $conversion_factor * $value->amount;
                	$insert_data_histcost['quantity'] = $value->quantity;
                	$insert_data_histcost['unit_price_sgd'] = ($conversion_factor * $value->amount) / ($value->quantity);
                	$this->custom->insertRow("histcost_master",$insert_data_histcost);
                }

			echo $result;
		}

		//TODO: AP module
		public function get_customers_with_currency($currency_type = '')
		{
			$this->db->select('*');
			$this->db->from('accounts_payable');
			$this->db->where(array('offset'=>'n', 'currency_type' =>$currency_type));
			$this->db->order_by("supplier_code", "asc");
			$this->db->group_by("supplier_code");

			$query = $this->db->get();
			$customer_code_ar = $query->result();
			//print_r($customer_code_ar);
			
			$amount_grandtotal = 0;
            $amount_debit_grandtotal = 0;
            $amount_credit_grandtotal = 0;

            $html_thead_currency = "<input type='hidden'>";
            $html_thead_currency .= "<thead><p style='color:red;'>Currency:&nbsp&nbsp";
			$html_thead_currency .= $currency_type;
			$html_thead_currency .= " CREDITS LISTING</p></thead>";
			
			$html_table = '';
			// int cnt_customer = count($customer_code_ar);
			foreach ($customer_code_ar as $key => $value) {


				$this->db->select('*');
				$this->db->from('accounts_payable');
				// $this->db->where(array('customer_code'=>$value->customer_code));
				$this->db->join('customer_master', 'accounts_payable.supplier_code = customer_master.customer_code');
				$this->db->where(array('offset'=>'n', 'currency_type' =>$currency_type,'accounts_payable.supplier_code'=>$value->supplier_code));
				//$this->db->order_by("customer_code", "asc");
				$this->db->order_by("doc_date", "asc");
				$this->db->order_by("doc_ref_no", "asc");
				$this->db->order_by("tran_type", "asc");

				$query = $this->db->get();
				$each_customer_account = $query->result();
				$html_thead = '';
				//$html_thead .= <table id="ss" class="table" width="100%">
				$html_thead .= "<thead>";
				$html_thead .= "<tr>";
				$html_thead .= "<th>code:";
				$html_thead .= $value->supplier_code;
				$html_thead .= ",";
				$html_thead .= $each_customer_account[0]->customer_name;
				$html_thead .= "</th>";
				$html_thead .= "<th>Contact Person:";
				$html_thead .= $each_customer_account[0]->customer_contact_person;
				$html_thead .= "</th>";
				$html_thead .= "<th></th><th></th><th></th>";
				$html_thead .= "<th>tel:";
				$html_thead .= $each_customer_account[0]->customer_phone;
				$html_thead .= "</th>";
                $html_thead .= "</tr>";
                $html_thead .= "<tr><th>DATE</th><th>DOC REF</th><th>REMARKS</th><th>DEBIT</th><th>CREDIT</th><th>BALANCE</th></tr></thead>";
                            
                $html_tbody = '';
                $amount_subtotal = 0;
                $amount_debit_subtotal = 0;
                $amount_credit_subtotal = 0;


				foreach ($each_customer_account as $key => $value) {

					$html_tbody.='<tr>';
					$html_tbody.='<td>'.$value->doc_date.'</td>';
					$html_tbody.='<td>'.$value->doc_ref_no.'</td>';
					$html_tbody.='<td>'.$value->remarks.'</td>';
					if($value->sign=="+")
					{
						$amount_debit_subtotal += number_format(($value->total_amt), 2, '.', '');
					    $amount_subtotal+=number_format(($value->total_amt), 2, '.', '');
					    $html_tbody.='<td>'.number_format(($value->total_amt), 2, '.', '').'</td>';
					    $html_tbody.='<td></td>';
					}
					
					else if($value->sign=='-')
					{
						$amount_credit_subtotal += number_format(($value->total_amt), 2, '.', '');
					    $amount_subtotal-=number_format(($value->total_amt), 2, '.', '');
				    	$html_tbody.='<td></td>';
				    	$html_tbody.='<td>'.number_format(($value->total_amt), 2, '.', '').'</td>';
					}
					
					$html_tbody.='<td>'.number_format(($amount_subtotal), 2, '.', '').'</td>';
					$html_tbody.='</tr>';
				}

				
				$html_tbody .= "<tr><td style='color:red;'>Subtotal</td><td></td><td></td><td>";
				$html_tbody .= number_format($amount_debit_subtotal, 2, '.', '');
				$html_tbody .= "</td><td>";
				$html_tbody .= number_format($amount_credit_subtotal, 2, '.', '');
	            $html_tbody .= "</td><td>";
                $html_tbody .= number_format($amount_subtotal, 2, '.', '');
                $html_tbody .= "</td></tr>";
				
				

				$amount_debit_grandtotal += $amount_debit_subtotal;
				$amount_credit_grandtotal += $amount_credit_subtotal;
				$amount_grandtotal += $amount_subtotal;

				$html_table .= $html_thead."<tbody>".$html_tbody;
			}

			$html_table .= "<tr><td style='color:blue;'>Grand total</td><td></td><td></td><td>";
			$html_table .= number_format($amount_debit_grandtotal, 2, '.', '');
			$html_table .= "</td><td>";
			$html_table .= number_format($amount_credit_grandtotal, 2, '.', '');
            $html_table .= "</td><td>";
            $html_table .= number_format($amount_grandtotal, 2, '.', '');
            $html_table .= "</td></tr></tbody>";
			
			$data['table_html']=$html_thead_currency.$html_table;
			return $data;
		}

		public function get_customer_credit_date($currency_type,$from = '0', $to = '120')
		{
			$this->db->select('SUM(total_amt) AS amount, supplier_code');
			$this->db->from('accounts_payable');
			if ($from == '0') {
				$this->db->where("DATEDIFF(NOW(), doc_date) BETWEEN '0' AND '30' ");   	
			}
			else if($from == '121')
			{
				$this->db->where("DATEDIFF(NOW(), doc_date) >= '120'");   	
			}
			else 
			{
				$this->db->where("DATEDIFF(NOW(), doc_date) BETWEEN ".$from." AND ".$to);  
			}

			
			//$this->db->where("DATEDIFF(NOW(), doc_date) BETWEEN ".$from." AND ".$to);   
			$this->db->where(array('offset'=>'n','sign'=>'-', 'settled'=>'n', 'currency_type' =>$currency_type));
			$this->db->order_by("supplier_code", "asc");
			$this->db->group_by("supplier_code");

			$query = $this->db->get();
			$customer_code_ar = $query->result();
			return $customer_code_ar;
		}

		public function get_customers_with_currency_age($currency_type = '')
		{
			
			$html_thead_currency = "<input type='hidden'>";
            $html_thead_currency .= "<thead><p style='color:red;'>Currency:&nbsp&nbsp";
			$html_thead_currency .= $currency_type;
			$html_thead_currency .= " CREDITS LISTING</p></thead>";
			
			$html_table = '';
			
			$html_thead = '';
			$html_thead .= "<thead>";
			$html_thead .= "<tr>";
			$html_thead .= "<th>code & name</th>";
			$html_thead .= "<th>1 - 30</th><th>31 - 60</th><th>61 - 90</th><th>91 - 120</th><th>>120days</th></tr></thead>";

			$html_tbody = '';

			$debtor_date = array();
			
			
			array_push($debtor_date, $this->get_customer_credit_date($currency_type, '0', '30'));
			array_push($debtor_date, $this->get_customer_credit_date($currency_type, '31', '60'));
			array_push($debtor_date, $this->get_customer_credit_date($currency_type, '61', '90'));
			array_push($debtor_date, $this->get_customer_credit_date($currency_type, '91', '120'));
			array_push($debtor_date, $this->get_customer_credit_date($currency_type, '121', '365'));
			$customers = array();
			$amounts = array();
			$i = 0;
			foreach ($debtor_date as $key => $row) {
				$i++;
				foreach ($row as $key => $value) {
					if(!in_array($value->supplier_code, $customers)){
						array_push($customers, $value->supplier_code);
					}
				}
			}
			$total_amt = array(0,0,0,0,0);
			foreach ($customers as $key => $customer) {
				$amounts_item = array(0,0,0,0,0);
				$i = 0;
				foreach ($debtor_date as $key => $row) {
					foreach ($row as $key => $value) {
						if($customer == $value->supplier_code){
							$amounts_item[$i] = $value->amount;
						}
					}
					$i++;
					
				}
				array_push($amounts, $amounts_item);
				for ($i=0; $i < 5; $i++) { 
					$total_amt[$i] += $amounts_item[$i];
				}
				
			}


			// start html
			$html_tbody = "";
			$i = 0;
			foreach ($customers as $key => $customer) {
				$customer_name = $this->get_customer_name($customer)[0]->customer_name;
				$html_tbody.="<tr><td>".$customer."&nbsp".$customer_name."</td><td>".number_format(($amounts[$i][0]), 2, '.', '')."</td><td>".number_format(($amounts[$i][1]), 2, '.', '')."</td><td>".number_format(($amounts[$i][2]), 2, '.', '')."</td><td>".number_format(($amounts[$i][3]), 2, '.', '')."</td><td>".number_format(($amounts[$i][4]), 2, '.', '')."</td></tr>";
				$i++;
			}
			$html_tbody.="<tr><td style='color: blue;'>Total</td><td>".number_format(($total_amt[0]), 2, '.', '')."</td><td>".number_format(($total_amt[1]), 2, '.', '')."</td><td>".number_format(($total_amt[2]), 2, '.', '')."</td><td>".number_format(($total_amt[3]), 2, '.', '')."</td><td>".number_format(($total_amt[4]), 2, '.', '')."</td></tr>";
			
			$html_table .= $html_thead."<tbody>".$html_tbody."</tbody>";
			 
			return $html_thead_currency.$html_table;
		}

		public function get_customer_name($customer_code)
		{
			$this->db->select('customer_name');
			$this->db->from('customer_master');
			$this->db->where(array('customer_code'=>$customer_code));

			$query = $this->db->get();
			$customer_name= $query->result();
			return $customer_name;
		}
		public function get_credit_ageing()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$currency_type = $post['currency_type'];
			$result = '';
			if ($currency_type != '-- Select Currency --') {
				$result_str= $this->get_customers_with_currency_age($post['currency_type']);	
				$result['table_html'] = $result_str;
				echo json_encode($result);
			}
			else
			{
				//print_r("sdf");exit();
				$this->db->select('*');
				$this->db->from('accounts_payable');
				$this->db->order_by("currency_type");
				$this->db->group_by("currency_type");
				$query = $this->db->get();
				$currency_ar = $query->result();
				$result1 = array();

				foreach ($currency_ar as $key => $value) {
					$result1[] = $this->get_customers_with_currency_age($value->currency_type);
				}

				$result_str = '';
				foreach ($result1 as $key => $value) {
					$result_str .= $value;
				}
				//$result['table_html'] = $result1;
				//print_r($result_str);exit();
				$result['table_html'] = $result_str;
				echo json_encode($result);
			}
		}
		
		public function get_credit_list()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$currency_type = $post['currency_type'];
			$result = '';
			if ($currency_type != '-- Select Currency --') {
				$result = $this->get_customers_with_currency($post['currency_type']);	
				echo json_encode($result);
			}
			else
			{
				$this->db->select('*');
				$this->db->from('accounts_payable');
				$this->db->order_by("currency_type");
				$this->db->group_by("currency_type");
				$query = $this->db->get();
				$currency_ar = $query->result();
				$result1 = array();

				foreach ($currency_ar as $key => $value) {
					$result1[] = $this->get_customers_with_currency($value->currency_type);
				}

				$result_str = '';
				foreach ($result1 as $key => $value) {
					$result_str .= $value['table_html'];
				}
				//$result['table_html'] = $result1;
				//print_r($result_str);
				$result['table_html'] = $result_str;
				//echo json_encode($result1[0]['table_html']);
				echo json_encode($result);
			}
		}

		public function get_credit_with_customer()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->backend->get_customer_details($post);
			$country_data=$this->custom->getSingleRow("country_master",array('country_id'=>$result->country_id));
			$data['customer_bldg_street']=$result->customer_bldg_number.' , '.$result->customer_street_name;
			$data['customer_cntry_post']=$country_data->country_name.' , '.$result->customer_postal_code;
						
			$cus_code=$this->custom->getSingleValue("customer_master","customer_code",array('customer_id'=>$post['customer_id']));

			$this->db->select('*');
			$this->db->from('accounts_payable');
			
			$this->db->where(array('supplier_code'=>$cus_code, 'offset !='=>'o'));
			$this->db->order_by("doc_date", "asc");
			$this->db->order_by("doc_ref_no", "asc");
			$this->db->order_by("tran_type", "asc");
			$query = $this->db->get();
			$ap_data = $query->result();

			$html = '';
			$amount = 0;

			foreach ($ap_data as $key => $value) {

				$html.='<tr>';
				$html.='<td>'.$value->doc_date.'</td>';
				$html.='<td>'.$value->doc_ref_no.'</td>';
				$html.='<td>'.$value->tran_type.'</td>';
				if($value->sign=="+")
				{
					$amount+=number_format(($value->total_amt), 2, '.', '');
				    $html.='<td>'.number_format(($value->total_amt), 2, '.', '').'</td>';
				    $html.='<td></td>';
				}
				
				else if($value->sign=='-')
				{
					$amount-=number_format(($value->total_amt), 2, '.', '');
			    	$html.='<td></td>';
			    	$html.='<td>'.number_format(($value->total_amt), 2, '.', '').'</td>';
				}

				if ($amount < 0) {
					$amount_express = number_format(((-1) * $amount), 2, '.', '') . ' (CR)';

				}
				else
				{
					$amount_express = number_format(($amount), 2, '.', '').' (DR)';
				}
				
				$html.='<td>'.$amount_express.'</td>';
				$html.='</tr>';
			}
			
			$data['table_html']=$html;
            
            //echo "<script>console.log(" . $html . " );</script>";	

			echo json_encode($data);
		}
		public function postapOpen()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('ap_open_id' => $id);
			$result = $this->custom->updateRow("ap_open",array('ap_open_status'=>"P"),$where);
			
			$open_data=$this->custom->getSingleRow("ap_open",array("ap_open_id"=>$id));
				    
			$result2= $this->backend->get_customer_details(array('customer_id'=>$open_data->ap_customer_id));

			$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result2->currency_id));
        
            //$insert_data['ar_id']="NULL";
            $insert_data['doc_ref_no'] = $open_data->ap_open_doc_ref;
            
            // echo "<script>console.log( 'Debug Objects: " . $insert_data['doc_ref_no'] . "' );</script>";	
            $insert_data['supplier_code'] = $result2->customer_code;
            $insert_data['doc_date']= $open_data->ap_open_tran_date;
            $insert_data['currency_type'] = $currency_data->currency_name;
            $insert_data['total_amt']= $open_data->ap_open_amount;
            $insert_data['sign'] = $open_data->ap_open_sign;
            $insert_data['tran_type']='Open';
            $insert_data['remarks'] = $open_data->ap_open_remarks;
            
            $this->custom->insertRow("accounts_payable",$insert_data);
                               			
 		    echo $result;
		}

		public function reject()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('quotation_id' => $id);
			$result = $this->custom->updateRow($this->table,array('quotation_status'=>"REJECTED"),$where);
			echo $result;
		}

		public function check_coa_state()
		{
			is_ajax();
			$id=$this->input->post('coa_id');
			$where = array('coa_id' => $id);
			$result = $this->custom->getSingleValue("chart_of_account","coa_state",$where);
			echo $result;
		}

		public function double_coa_check()
		{
			is_ajax();
			$coa_prefix=$this->input->post('coa_prefix');
			$coa_suffix=$this->input->post('coa_suffix');
			$where = array('coa_prefix' => $coa_prefix,'coa_suffix' => $coa_suffix);
			$result = $this->custom->getSingleRow("chart_of_account",$where);
			echo json_encode($result);	
		}
		public function print_quotation($mode="print")
		{
			$row_id=$this->input->post('rowID');
			$this->data['quotation_edit_data']=$quotation_edit_data=$this->custom->getSingleRow('quotation_master',array("quotation_id"=>$row_id));
			if($quotation_edit_data):
				$this->data['quotation_product_edit_data']=$quotation_product_edit_data=$this->custom->getRows('quotation_product_master',array("quotation_id"=>$row_id));
				foreach ($quotation_product_edit_data as $value) {
					$product_array[]=$value->product_id;
				}
				$this->data['product_array']=$product_array;
				/*==========================================*/
				$company_where=array('profile_id'=>1);
				$this->data['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->data['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code'),"Customer",array('(',')'),array(),array($quotation_edit_data->customer_id));
				/*==========================================*/
				$this->data['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name'),"Sales Person",array(' '),array(),array($quotation_edit_data->salesman_id));
				/*==========================================*/
				$this->data['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
				/*==========================================*/
				$this->data['total_quotation']=$this->custom->getTotalCount("quotation_master");
				/*==========================================*/
				$result= $this->quotation->get_customer_details(array('customer_id'=>$quotation_edit_data->customer_id));
				$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
				$data['customer_phone']=$result->customer_phone;
				$data['customer_email']=$result->customer_email;
				$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
				$data['customer_currency']=$currency_data->currency_name;
				$data['currency_amount']=$currency_data->currency_rate;
				$this->data['cust_data']=$data;
				/*==========================================*/

					$this->data['save_url']=base_url('quotation/create_new_quotation/edit');
					if($mode=="print"):
						$this->data['mode']="print";
						$this->load->view('quotation/quotation_view.php', $this->data, FALSE);
					endif;
					if($mode=="email"):
						$this->data['mode']="email";
						$html=$this->load->view('quotation/quotation_view.php', $this->data, TRUE);	
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
				redirect('quotation/quotationlist/pending','refresh');
			endif;
		}

		public function email()
		{
			echo '<script> $("#refresh").click(); </script>';
			echo '<script> $("#list_table").show();</script>';
		}

	}

?>