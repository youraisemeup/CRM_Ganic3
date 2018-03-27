<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Account_ajax extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="receipt_master";
			$this->logged_id = $this->session->user_id;
			$this->load->model('account/account_model','account');
		}
		
		public function get_customer_details()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->account->get_customer_details($post);
			$country_data=$this->custom->getSingleRow("country_master",array('country_id'=>$result->country_id));
			$data['customer_bldg_street']=$result->customer_bldg_number.' , '.$result->customer_street_name;
			$data['customer_cntry_post']=$country_data->country_name.' , '.$result->customer_postal_code;
			// $data['invoice_reference']=$this->custom->createDropdownSelect("invoice_master",array('invoice_id','invoice_ref_no'),"Invoice Ref No",array(''),array('customer_id' => $post['customer_id'],'invoice_status'=>'P'));
			// /*==========================================*/
			// // echo "<pre>";print_r($data['invoice_reference']);die;
			// $currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
			// $data['customer_currency']=$currency_data->currency_name;
			// $data['currency_amount']=$currency_data->currency_rate;
			$this->db->select('*');
			$this->db->from('invoice_master');
			$this->db->where('customer_id', $post['customer_id']);
			$this->db->where('invoice_status', 'P');
			$query = $this->db->get();
			$inv_data = $query->result();

			$this->db->select('*');
			$this->db->from('receipt_master');
			$this->db->where('customer_id', $post['customer_id']);
			$query1 = $this->db->get();
			$rec_data = $query1->result();
			$html = '';
			$amount = 0; 

			$currency_temp = 1;

			foreach ($inv_data as $key => $value) {
				$currency_temp = $value->currency_amount;
				$amount+=number_format(($value->final_total*$value->currency_amount), 2, '.', '');
				$html.='<tr>';
				$html.='<td>'.$value->created_on.'</td>';
				$html.='<td>'.$value->invoice_ref_no.'</td>';
				$html.='<td>SALES</td>';
				$html.='<td>'.number_format($value->final_total*$value->currency_amount, 2, '.', '').'</td>';
				$html.='<td></td>';
				$html.='<td>'.$amount.'</td>';
				$html.='</tr>';
			}
			foreach ($rec_data as $key => $value) {
				//$tempNumber = floatval($value->amount) * $currency_temp;
				$tempNumber = number_format(($value->amount*$currency_temp), 2, '.', '');
				$amount-=$tempNumber;
				$html.='<tr>';
				$html.='<td>'.$value->created_on.'</td>';
				$html.='<td>'.$value->receipt_ref_no.'</td>';
				$html.='<td>COLLECTION</td>';
				$html.='<td></td>';
				$html.='<td>'.$tempNumber.'</td>';
				$html.='<td>'.$amount.'</td>';
				$html.='</tr>';
			}
			$data['table_html']=$html;
			echo json_encode($data);
		}

		public function get_customers_with_currency($currency_type = '')
		{
			$this->db->select('*');
			$this->db->from('accounts_receivable');
			$this->db->where(array('offset'=>'n', 'currency_type' =>$currency_type));
			$this->db->order_by("customer_code", "asc");
			$this->db->group_by("customer_code");

			$query = $this->db->get();
			$customer_code_ar = $query->result();
			//print_r($customer_code_ar);
			
			$amount_grandtotal = 0;
            $amount_debit_grandtotal = 0;
            $amount_credit_grandtotal = 0;

            $html_thead_currency = "<input type='hidden'>";
            $html_thead_currency .= "<thead><p style='color:red;'>Currency:&nbsp&nbsp";
			$html_thead_currency .= $currency_type;
			$html_thead_currency .= " DEBTORS LISTING</p></thead>";
			
			$html_table = '';
			// int cnt_customer = count($customer_code_ar);
			foreach ($customer_code_ar as $key => $value) {


				$this->db->select('*');
				$this->db->from('accounts_receivable');
				// $this->db->where(array('customer_code'=>$value->customer_code));
				$this->db->join('customer_master', 'accounts_receivable.customer_code = customer_master.customer_code');
				$this->db->where(array('offset'=>'n', 'currency_type' =>$currency_type,'accounts_receivable.customer_code'=>$value->customer_code));
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
				$html_thead .= $value->customer_code;
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

		

		public function get_customer_debtor_date($currency_type,$from = '0', $to = '120')
		{
			$this->db->select('SUM(total_amt) AS amount, customer_code');
			$this->db->from('accounts_receivable');
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
			$this->db->where(array('offset'=>'n','sign'=>'+', 'settled'=>'n', 'currency_type' =>$currency_type));
			$this->db->order_by("customer_code", "asc");
			$this->db->group_by("customer_code");

			$query = $this->db->get();
			$customer_code_ar = $query->result();
			return $customer_code_ar;
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

		public function get_customers_with_currency_age($currency_type = '')
		{
			
			$html_thead_currency = "<input type='hidden'>";
            $html_thead_currency .= "<thead><p style='color:red;'>Currency:&nbsp&nbsp";
			$html_thead_currency .= $currency_type;
			$html_thead_currency .= " DEBTORS LISTING</p></thead>";
			
			$html_table = '';
			
			$html_thead = '';
			$html_thead .= "<thead>";
			$html_thead .= "<tr>";
			$html_thead .= "<th>code & name</th>";
			$html_thead .= "<th>1 - 30</th><th>31 - 60</th><th>61 - 90</th><th>91 - 120</th><th>>120days</th></tr></thead>";

			$html_tbody = '';

			$debtor_date = array();
			
			
			array_push($debtor_date, $this->get_customer_debtor_date($currency_type, '0', '30'));
			array_push($debtor_date, $this->get_customer_debtor_date($currency_type, '31', '60'));
			array_push($debtor_date, $this->get_customer_debtor_date($currency_type, '61', '90'));
			array_push($debtor_date, $this->get_customer_debtor_date($currency_type, '91', '120'));
			array_push($debtor_date, $this->get_customer_debtor_date($currency_type, '121', '365'));
			$customers = array();
			$amounts = array();
			$i = 0;
			foreach ($debtor_date as $key => $row) {
				$i++;
				foreach ($row as $key => $value) {
					if(!in_array($value->customer_code, $customers)){
						array_push($customers, $value->customer_code);
					}
				}
			}
			$total_amt = array(0,0,0,0,0);
			foreach ($customers as $key => $customer) {
				$amounts_item = array(0,0,0,0,0);
				$i = 0;
				foreach ($debtor_date as $key => $row) {
					foreach ($row as $key => $value) {
						if($customer == $value->customer_code){
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
		public function get_age_debtor()
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
				$this->db->from('accounts_receivable');
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

		public function get_usd_debtor()
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
				$this->db->from('accounts_receivable');
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
		
		public function get_customer_details_ar()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->account->get_customer_details($post);
			$country_data=$this->custom->getSingleRow("country_master",array('country_id'=>$result->country_id));
			$data['customer_bldg_street']=$result->customer_bldg_number.' , '.$result->customer_street_name;
			$data['customer_cntry_post']=$country_data->country_name.' , '.$result->customer_postal_code;
						
			$cus_code=$this->custom->getSingleValue("customer_master","customer_code",array('customer_id'=>$post['customer_id']));

			$this->db->select('*');
			$this->db->from('accounts_receivable');
		
			$this->db->where(array('customer_code'=>$cus_code, 'offset !='=>'o'));
			$this->db->order_by("doc_date", "asc");
			$this->db->order_by("doc_ref_no", "asc");
			$this->db->order_by("tran_type", "asc");
			$query = $this->db->get();
			$ar_data = $query->result();

			$html = '';
			$amount = 0;

			foreach ($ar_data as $key => $value) {

				$html.='<tr>';
				$html.='<td style="min-width: 100px;">'.$value->doc_date.'</td>';
				$html.='<td style="min-width: 100px;">'.$value->doc_ref_no.'</td>';
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
				if (number_format(($amount),2,'.', '') >= 0) {
					$html.='<td>'.number_format(($amount), 2, '.', '').' (DR)'.'</td>';	
				}
				else
				{
					$html.='<td>'.number_format(($amount * (-1) ), 2, '.', '').' (CR)'.'</td>';	
				}
				
				$html.='</tr>';
			}
			
			$data['table_html']=$html;
            
            //echo "<script>console.log(" . $html . " );</script>";	

			echo json_encode($data);
		}
		
		public function get_receipt_data() {
			is_ajax();
			$post=$this->input->post();
			$total = 0;
			$invoic_name = [];	
			foreach ($post['invoice_id'] as $key => $value) {
				$invoice_data=$this->custom->getSingleRow("invoice_master",array('invoice_id'=>$value));
				$total+= number_format(($invoice_data->final_total*$invoice_data->currency_amount), 2, '.', '');
				$invoic_name[$key] = $invoice_data->invoice_ref_no;
			}
			$data['total'] = $total;
			$data['total_in_words'] = $this->convert_number_to_words($total);
			$data['invoic_name'] = $invoic_name;
			echo json_encode($data);
		}
	

		public function get_product_option()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$product_details=$this->invoice->get_product_details($post);
			echo "<option value=".$product_details->billing_id.">".$product_details->stock_code." : ".$product_details->billing_description."</option>";	
		}
		public function delete()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('receipt_id' => $id);
			// $result="hi";
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}

		public function confirm()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('receipt_id' => $id);
			$result = $this->custom->updateRow($this->table,array('receipt_status'=>"CONFIRM"),$where);
			echo $result;
		}

		public function reject()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('receipt_id' => $id);
			$result = $this->custom->updateRow($this->table,array('receipt_status'=>"REJECTED"),$where);
			echo $result;
		}

		public function print_receipt($mode="print")
		{
			$row_id=$this->input->post('rowID');
			$this->data['receipt_edit_data']=$receipt_edit_data=$this->custom->getSingleRow('receipt_master',array("receipt_id"=>$row_id));
			if($receipt_edit_data):
				$this->data['receipt_product_edit_data']=$receipt_product_edit_data=$this->custom->getRows('receipt_product_master',array("receipt_id"=>$row_id));
				foreach ($receipt_product_edit_data as $value) {
					$product_array[]=$value->product_id;
				}
				$this->data['product_array']=$product_array;
				/*==========================================*/
				$company_where=array('profile_id'=>1);
				$this->data['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$company_where);
				/*==========================================*/
				$this->data['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code'),"Customer",array('(',')'),array(),array($receipt_edit_data->customer_id));
				/*==========================================*/
				$this->data['salesman_options']=$this->custom->createDropdownSelect("salesman_master",array('s_id','s_name'),"Sales Person",array(' '),array(),array($receipt_edit_data->salesman_id));
				/*==========================================*/
				$this->data['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "));
				/*==========================================*/
				$this->data['total_receipt']=$this->custom->getTotalCount("receipt_master");
				/*==========================================*/
				$result= $this->receipt->get_customer_details(array('customer_id'=>$receipt_edit_data->customer_id));
				$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
				$data['customer_phone']=$result->customer_phone;
				$data['customer_email']=$result->customer_email;
				$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
				$data['customer_currency']=$currency_data->currency_name;
				$data['currency_amount']=$currency_data->currency_rate;
				$this->data['cust_data']=$data;
				/*==========================================*/

					$this->data['save_url']=base_url('receipt/create_new_receipt/edit');
					if($mode=="print"):
						$this->data['mode']="print";
						$this->load->view('receipt/receipt_view.php', $this->data, FALSE);
					endif;
					if($mode=="email"):
						$this->data['mode']="email";
						$html=$this->load->view('receipt/receipt_view.php', $this->data, TRUE);	
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
				redirect('receipt/receiptlist/pending','refresh');
			endif;
		}

		public function email()
		{
			echo '<script> $("#refresh").click(); </script>';
			echo '<script> $("#list_table").show();</script>';
		}

		public function convert_number_to_words($number) {

		    $hyphen      = '-';
		    $conjunction = ' and ';
		    $separator   = ', ';
		    $negative    = 'negative ';
		    $decimal     = ' point ';
		    $dictionary  = array(
		        0                   => 'Zero',
		        1                   => 'One',
		        2                   => 'Two',
		        3                   => 'Three',
		        4                   => 'Four',
		        5                   => 'Five',
		        6                   => 'Six',
		        7                   => 'Seven',
		        8                   => 'Eight',
		        9                   => 'Nine',
		        10                  => 'Ten',
		        11                  => 'Eleven',
		        12                  => 'Twelve',
		        13                  => 'Thirteen',
		        14                  => 'Fourteen',
		        15                  => 'Fifteen',
		        16                  => 'Sixteen',
		        17                  => 'Seventeen',
		        18                  => 'Eighteen',
		        19                  => 'Nineteen',
		        20                  => 'Twenty',
		        30                  => 'Thirty',
		        40                  => 'Fourty',
		        50                  => 'Fifty',
		        60                  => 'Sixty',
		        70                  => 'Seventy',
		        80                  => 'Eighty',
		        90                  => 'Ninety',
		        100                 => 'Hundred',
		        1000                => 'Thousand',
		        1000000             => 'Million',
		        1000000000          => 'Billion',
		        1000000000000       => 'Trillion',
		        1000000000000000    => 'Quadrillion',
		        1000000000000000000 => 'Quintillion'
		    );

		    if (!is_numeric($number)) {
		        return false;
		    }

		    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		        // overflow
		        trigger_error(
		            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
		            E_USER_WARNING
		        );
		        return false;
		    }

		    if ($number < 0) {
		        return $negative . $this->convert_number_to_words(abs($number));
		    }

		    $string = $fraction = null;

		    if (strpos($number, '.') !== false) {
		        list($number, $fraction) = explode('.', $number);
		    }

		    switch (true) {
		        case $number < 21:
		            $string = $dictionary[$number];
		            break;
		        case $number < 100:
		            $tens   = ((int) ($number / 10)) * 10;
		            $units  = $number % 10;
		            $string = $dictionary[$tens];
		            if ($units) {
		                $string .= $hyphen . $dictionary[$units];
		            }
		            break;
		        case $number < 1000:
		            $hundreds  = $number / 100;
		            $remainder = $number % 100;
		            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
		            if ($remainder) {
		                $string .= $conjunction . $this->convert_number_to_words($remainder);
		            }
		            break;
		        default:
		            $baseUnit = pow(1000, floor(log($number, 1000)));
		            $numBaseUnits = (int) ($number / $baseUnit);
		            $remainder = $number % $baseUnit;
		            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
		            if ($remainder) {
		                $string .= $remainder < 100 ? $conjunction : $separator;
		                $string .= $this->convert_number_to_words($remainder);
		            }
		            break;
		    }

		    if (null !== $fraction && is_numeric($fraction)) {
		        $string .= $decimal;
		        $words = array();
		        foreach (str_split((string) $fraction) as $number) {
		            $words[] = $dictionary[$number];
		        }
		        $string .= implode(' ', $words);
		    }

		    return $string;
		}

	}

?>