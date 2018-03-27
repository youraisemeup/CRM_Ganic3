<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Receiptlist_ajax extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="receipt_master";
			$this->logged_id = $this->session->user_id;
			$this->load->model('receipt/receipt_model','receipt');
		}
		public function get_customer_details()
		{ 
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php"; 
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->receipt->get_customer_details(array('customer_id'=>$post['customer_id']));
			$country_data=$this->custom->getSingleRow("country_master",array('country_id'=>$result->country_id));
			$data['customer_bldg_street']=$result->customer_bldg_number.' , '.$result->customer_street_name;
			$data['customer_cntry_post']=$country_data->country_name.' , '.$result->customer_postal_code;
			if(isset($post['edit']) && $post['edit'] == 'edit'){
				$data['invoice_reference']=$this->custom->createDropdownSelect("accounts_receivable",array('ar_id','doc_ref_no'),"Invoice Ref No",array(''),array('customer_code' => $result->customer_code,'settled'=>'n','tran_type !='=>'Rec'));
			}else{
				$data['invoice_reference']=$this->custom->createDropdownSelect("accounts_receivable",array('ar_id','doc_ref_no'),"Invoice Ref No",array(''),array('customer_code' => $result->customer_code,'settled'=>'n','tran_type !='=>'Rec'));
			}
			/*==========================================*/
			// echo "<pre>";print_r($data['invoice_reference']);die;
			$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
			$data['customer_currency']=$currency_data->currency_name;
			$data['currency_amount']=$currency_data->currency_rate;
			echo json_encode($data);
		}
		public function get_partial_edit_with_invoice_id($invoice_id = null)
		{
			$sql = 'SELECT SUM(rec_inv_amount) AS sum_partial FROM receipt_invoice_master WHERE partial_status = "P" AND invoice_id = '.$invoice_id.' GROUP BY(invoice_id)';

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
		public function get_partial_with_invoice_id($invoice_id = null)
		{
			$sql = 'SELECT SUM(rec_inv_amount) AS sum_partial FROM receipt_invoice_master WHERE partial_status = "P" AND invoice_id = '.$invoice_id.' GROUP BY(invoice_id)';

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

		public function get_receipt_amt($invoice_id = null)
		{
			$sql = 'SELECT full_amount - rec_inv_amount AS amt FROM receipt_invoice_master WHERE invoice_id = "'.$invoice_id.'" AND partial_status = "p" ORDER BY full_amount ASC LIMIT 1;';
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

		public function get_full_amount_with_invoice_id($invoice_id = null)
		{
			$full_amount = $this->custom->getSingleValue('accounts_receivable','total_amt',array("ar_id"=>$invoice_id));
			return $full_amount;
		}

		public function get_offset_flag($invoice_id = null)
		{
			$flag_offset = $this->custom->getSingleValue('accounts_receivable','offset',array("ar_id"=>$invoice_id));
			return $flag_offset;
		}

		public function offset_records()
		{
			is_ajax();
			$customer_id = $this->input->post('customer_id');
			$date_to_offset = $this->input->post('offset_date');
			$customer_code = $this->custom->getSingleValue('customer_master','customer_code',array("customer_id" => $customer_id));
			
			$sql = 'SELECT invoice_id FROM receipt_invoice_master WHERE partial_status = "p" GROUP BY invoice_id';

			$query = $this->db->query($sql);
			foreach ($query->result_array() as $key => $value)
			{	

			    $offsetted_amt = $this->get_receipt_amt($value['invoice_id']);
				   
			    if ($offsetted_amt <= 0) {
			    	$this->custom->updateRow("accounts_receivable",array('total_amt'=>$offsetted_amt,'settled'=>'y'),array('ar_id'=>$value['invoice_id'],'tran_type !=' =>"Rec"));	
			    }
			    else if($offsetted_amt > 0)
			    {
			    	$this->custom->updateRow("accounts_receivable",array('total_amt'=>$offsetted_amt,'offset'=>'f'),array('ar_id'=>$value['invoice_id'],'tran_type !=' =>"Rec"));		
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

				$sql = 'SELECT invoice_id FROM receipt_invoice_master WHERE partial_status = "p" GROUP BY invoice_id';

				$query = $this->db->query($sql);
				foreach ($query->result_array() as $key => $value)
				{	

					$offsetted_amt = $this->get_receipt_amt($value['invoice_id']);
				   
				    if ($offsetted_amt <= 0) {
				    	$this->custom->updateRow("accounts_receivable",array('total_amt'=>$offsetted_amt,'settled'=>'y'),array('ar_id'=>$value['invoice_id'],'tran_type !=' =>"Rec"));	
				    }
				    else if($offsetted_amt > 0)
				    {
				    	$this->custom->updateRow("accounts_receivable",array('total_amt'=>$offsetted_amt,'offset'=>'f'),array('ar_id'=>$value['invoice_id'],'tran_type !=' =>"Rec"));		
				    }
				}	
			}
			echo json_encode($customer_id_array);
		}	
		
		public function get_receipt_edit_data() { 
			is_ajax();
			$post=$this->input->post();
			$total = 0;
			$invoic_name = [];	
			$invoice_amt = [];
			$invoice_no = [];

			foreach ($post['invoice_id'] as $key => $value) {
				$invoice_data=$this->custom->getSingleRow("accounts_receivable",array('ar_id'=>$value));
				$receipt_invoice_data=$this->custom->getSingleRow("receipt_invoice_master",array('invoice_id'=>$value,'receipt_id' => $post['receipt_id']));
				$received_amount = $this->get_partial_with_invoice_id($value);

				$total+= number_format(($invoice_data->total_amt), 2, '.', '');
				$invoic_name[$key] = $invoice_data->doc_ref_no;
				if ($invoice_data->sign == "+") {
					$amount_sign[$key] = 1;	
				}
				else if($invoice_data->sign == "-"){
					$amount_sign[$key] = -1;	
				}
				
				$invoice_no[$key] = $value;
				$invoice_received_amount[$key] = $received_amount;
				$invoice_full_amount[$key] = $receipt_invoice_data->full_amount;

				$invoice_amt[$key] = $receipt_invoice_data->rec_inv_amount;
			}
			
			$data['total'] = number_format($total,2);
			$data['invoic_name'] = $invoic_name;
			$data['invoice_id']  = $invoice_no;
			$data['received_amount'] = $invoice_received_amount;
			$data['full_amount'] = $invoice_full_amount;
			$data['invoice_amt'] = $invoice_amt;
			$data['amount_sign'] = $amount_sign;
			echo json_encode($data); 
		}

		public function get_receipt_data() { 
			is_ajax();
			$post=$this->input->post();
			$total = 0;
			$invoic_name = [];	
			$invoice_amt = [];
			$invoice_no = [];
			foreach ($post['invoice_id'] as $key => $value) {
				$invoice_data=$this->custom->getSingleRow("accounts_receivable",array('ar_id'=>$value));
				$received_amount = $this->get_partial_with_invoice_id($value);
				
				$full_amount_origin = $this->get_receipt_amt($value);
				if ($full_amount_origin == 0) {
					$full_amount = $this->get_full_amount_with_invoice_id($value);	
				}
				else
				{
					$full_amount = $full_amount_origin;
				}
				
				$total += number_format(($invoice_data->total_amt), 2, '.', '');
				$invoic_name[$key] = $invoice_data->doc_ref_no;
				if ($invoice_data->sign == "+") {
					$amount_sign[$key] = 1;	
				}
				else if($invoice_data->sign == "-"){
					$amount_sign[$key] = -1;	
				}
				
				$invoice_no[$key] = $value;
				$invoice_received_amount[$key] = $received_amount;
				$invoice_full_amount[$key] = $full_amount;

				$invoice_amt[$key] = number_format(($full_amount), 2);
			}
			
			$data['total'] = number_format($total,2);
			//$data['total'] = $total;
			//$data['total_in_words'] = $this->convert_number_to_words($total);
			$data['invoic_name'] = $invoic_name;
			$data['invoice_id']  = $invoice_no;

			$data['received_amount'] = $invoice_received_amount;
			$data['full_amount'] = $invoice_full_amount;
			$data['invoice_amt'] = $invoice_amt;
			$data['amount_sign'] = $amount_sign;
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

		public function post()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('receipt_id' => $id);
			$result = $this->custom->updateRow($this->table,array('receipt_status'=>"P"),$where);

			$sql = 'SELECT invoice_id FROM receipt_invoice_master WHERE receipt_id = "'.$id.'"';
		    $query = $this->db->query($sql);
			foreach ($query->result_array() as $key => $value)
			{
				$where_pur = array('invoice_id' => $value['invoice_id'],'receipt_id' => $id);
				$new_full_amt = $this->get_receipt_amt($value['invoice_id']);

				if ($new_full_amt != 0) {
					$result = $this->custom->updateRow("receipt_invoice_master",array('partial_status'=>"P",'full_amount'=> $new_full_amt),$where_pur);
				}
				else
				{
					$result = $this->custom->updateRow("receipt_invoice_master",array('partial_status'=>"P"),$where_pur);
				}
			}
			
			$receipt_data=$this->custom->getSingleRow('receipt_master',array("receipt_id"=>$id));
			$result2= $this->receipt->get_customer_details(array('customer_id'=>$receipt_data->customer_id));
		

			$sql = 'SELECT invoice_id FROM receipt_invoice_master WHERE receipt_id = "'.$id.'"';
		    $query = $this->db->query($sql);
		    //var_dump($query->result_array());exit();
			foreach ($query->result_array() as $key => $value)
			{
			    $offsetted_amt = $this->get_receipt_amt($value['invoice_id']);
			    if ($offsetted_amt <= 0) { 
			    	$this->custom->updateRow("accounts_receivable",array('settled'=>'y'),array('ar_id'=>$value['invoice_id']));	
			    }
			}

                //$insert_data['ar_id']="NULL";
                $insert_data['doc_ref_no'] = $receipt_data->receipt_ref_no;
                
                // echo "<script>Console.log( 'Debug Objects: " . $insert_data['doc_ref_no'] . "' );</script>";	
                $insert_data['customer_code'] = $result2->customer_code;
                $insert_data['doc_date']= $receipt_data->modified_on;
                $insert_data['currency_type'] = $receipt_data->currency;
                $insert_data['total_amt']= floatval(str_replace(",","",$receipt_data->amount));
                $insert_data['sign']='-';
                $insert_data['tran_type']='Rec';
                
                if($receipt_data->other_reference!="")
                {
                    $insert_data['remarks']=$receipt_data->other_reference;

                    $bank_data['bank_remarks'] = $receipt_data->other_reference;
                }
                else
                {
                    $insert_data['remarks']="";

                    $bank_data['bank_remarks'] = "";
                }
                
                $insert_data['settled']='y';
                
                $this->custom->insertRow("accounts_receivable",$insert_data);


                $bank_data['bank_reference'] = $receipt_data->receipt_ref_no;
                $bank_data['bank_date'] = $receipt_data->modified_on;
                
                $bank_data['bank_debit'] = floatval(str_replace(",","",$receipt_data->amount));

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

                $bank_data['bank_balance'] = $last_balance + floatval(str_replace(",","",$receipt_data->amount));
                $this->custom->insertRow("bank",$bank_data);

			
			
			echo $result;
			
		}

		public function deleted()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('receipt_id' => $id);
			$result = $this->custom->updateRow($this->table,array('receipt_status'=>"D"),$where);
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