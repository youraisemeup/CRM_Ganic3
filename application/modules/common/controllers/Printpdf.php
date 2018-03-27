<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Printpdf extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();
	        //load mPDF library
	        $this->load->library('m_pdf');
	        $this->load->model('datatable_model','DT_model');
	    }

	    public function num_change($value)
	    {
	    	return number_format($value,2, '.','');
	    }

	    public function print_new_quotation($mode="print")
		{
			//print_r($this->input->post());exit();
			$data=$this->input->post();
			//var_dump($data["amount"][10]);exit();


			$company_where=array('profile_id'=>1);
			$this->data['company_details'] = $this->custom->getSingleRow('company_profile',$company_where);

			$table="customer_master";
			$join_table=array("currency_master");
			$join_condition=array('customer_master.currency_id=currency_master.currency_id');
			$where = array('customer_id'=>$data['customer_id']);

			$customer_details = $this->custom->getRowsWhereJoin($table,$where,$join_table,$join_condition);

			$this->data['customer_options'] = $customer_details[0];
			$customer_currency_rate = $customer_details[0]->currency_rate;

			$quotation_where=array('user_id'=>$this->session->user_id);
			$this->data['quotation_details'] = $this->custom->getSingleRow('quotation_setting',$quotation_where);

			$salesman_where = array('s_id' => $data['salesman_id']);
			$this->data['salesman_options'] = $this->custom->getSingleRow('salesman_master',$salesman_where);

			
			$this->data['lump_sum_discount_percent'] = $data["lump_sum_discount"];
			
			$this->data['gst_percent'] = 7;
			$this->data['quotation_header_text'] = $data["quotation_header_text"];
			$this->data['terms_of_payments'] = $data["terms_of_payments"];
			$this->data['training_venue'] = $data["training_venue"];
			$this->data['modification'] = $data["modification"];
			$this->data['quotation_footer_text'] = $data["quotation_footer_text"];
			$this->data['logo_with'] = $data['logo_with'];

			$billing_id_array = $data['product_row_id'];
			//$billing_id = $data['product_row_id']['0'];
			$subtotal = 0;
			$gst_lump_sum_amount = 0;
			foreach ($billing_id_array as $key => $billing_id) {
				 //var_dump($key);exit();
				$row_num = count($billing_id_array);
				$this->data['row_num'] = $row_num;
				$table="billing_master";
				$join_table=array("gst_master");
				$join_condition=array('gst_master.gst_id=billing_master.gst_id');
				$where = array('billing_id' => $billing_id);

				$person_array = $this->custom->getRowsWhereJoin($table,$where,$join_table,$join_condition);
				$person = $person_array[0];

				$this->data['sno'][] = $key;

				//var_dump($person[0]->billing_id);exit();
				$this->data['description'][] = $person->billing_description;	
				$this->data['uom'][] = $person->billing_uom;
				$this->data['cat'][] = $person->gst_code;

				$billing_price_unit = $person->billing_price_per_uom * $customer_currency_rate;

				if ($person->billing_type == 'Product') {
					if (!$data["quantity"][$billing_id]) {
						$data["quantity"][$billing_id] = 1;
					}
					$this->data['quantity'][] = $data["quantity"][$billing_id];
					$this->data['unit_price'][] = $this->num_change($billing_price_unit);
					$this->data['discount'][] = $data["discount"][$billing_id];
					$this->data['amount'][] = $this->num_change($data["quantity"][$billing_id] * $billing_price_unit * ( 1 - $data["discount"][$billing_id] / 100));
					$subtotal += $data["quantity"][$billing_id] * $billing_price_unit * ( 1 - $data["discount"][$billing_id] / 100);
					$this->data['gst_amt'][] = $this->num_change($billing_price_unit * $data["quantity"][$billing_id] * $person->gst_rate * ( 1 - $data["discount"][$billing_id] / 100) * (1 - $data["lump_sum_discount"] / 100 ));
					$gst_lump_sum_amount += $billing_price_unit * $data["quantity"][$billing_id] * $person->gst_rate * ( 1 - $data["discount"][$billing_id] / 100) * (1 - $data["lump_sum_discount"] / 100 ) / 100;

				}
				else if($person->billing_type == 'Service')
				{
					$this->data['quantity'][] = '';
					$this->data['unit_price'][] = '';
					$this->data['discount'][] = '';
					$this->data['amount'][] = $this->num_change($data["amount"][$billing_id]);
					$subtotal += $data["amount"][$billing_id];
					$this->data['gst_amt'][] = $this->num_change($data["amount"][$billing_id] * $person->gst_rate * (1 - $data["lump_sum_discount"] / 100));
					$gst_lump_sum_amount += $data["amount"][$billing_id] * $person->gst_rate * (1 - $data["lump_sum_discount"] / 100) / 100;
				}
			
			}

			$this->data['lump_sum_discount'] = $data["lump_sum_discount"];

			$this->data['lump_sum_discount_amount'] = '-'.$this->num_change(($subtotal * $data["lump_sum_discount"] / 100));
			$this->data['net_of_lump_discount'] = $this->num_change($subtotal - $subtotal * $data["lump_sum_discount"] / 100);
			$this->data['subtotal'] = $this->num_change($subtotal);
			$this->data['gst_lump_sum_amount'] = '+'.$this->num_change($gst_lump_sum_amount);
			$this->data['total'] = $this->num_change($subtotal - ($subtotal * $data["lump_sum_discount"] / 100) + $gst_lump_sum_amount);

			$this->data['mode']="print";
			$this->load->view('quotation/quotation_view_basic.php', $this->data);
			
			$message='<div class="alert alert-success fade in"><button type="button" class="close close-sm" data-dismiss="alert"><i class="fa fa-times"></i></button>'.$mode.' Task Complete!</div>';
			?>
			<script>
				message='<?php echo $message; ?>';
				$("#form_data").html(""); // remove content of form.
                $("#refresh").click();//refresh  the datatable.
                $("#list_table").show(); // show data table
                $("#message_area").html(message);
                </script><?php
		}
	
	    public function save_download()
	  	{ 

			$data=$this->input->post();
			//var_dump($data["amount"][10]);exit();


			$company_where=array('profile_id'=>1);
			$this->data['company_details'] = $this->custom->getSingleRow('company_profile',$company_where);

			$table="customer_master";
			$join_table=array("currency_master");
			$join_condition=array('customer_master.currency_id=currency_master.currency_id');
			$where = array('customer_id'=>$data['customer_id']);

			$customer_details = $this->custom->getRowsWhereJoin($table,$where,$join_table,$join_condition);

			$this->data['customer_options'] = $customer_details[0];
			$customer_currency_rate = $customer_details[0]->currency_rate;

			$quotation_where=array('user_id'=>$this->session->user_id);
			$this->data['quotation_details'] = $this->custom->getSingleRow('quotation_setting',$quotation_where);

			$salesman_where = array('s_id' => $data['salesman_id']);
			$this->data['salesman_options'] = $this->custom->getSingleRow('salesman_master',$salesman_where);

			
			$this->data['lump_sum_discount_percent'] = $data["lump_sum_discount"];
			
			$this->data['gst_percent'] = 7;
			$this->data['quotation_header_text'] = $data["quotation_header_text"];
			$this->data['terms_of_payments'] = $data["terms_of_payments"];
			$this->data['training_venue'] = $data["training_venue"];
			$this->data['modification'] = $data["modification"];
			$this->data['quotation_footer_text'] = $data["quotation_footer_text"];
			$this->data['logo_with'] = $data['logo_with'];

			$billing_id_array = $data['product_row_id'];
			//$billing_id = $data['product_row_id']['0'];
			$subtotal = 0;
			$gst_lump_sum_amount = 0;
			foreach ($billing_id_array as $key => $billing_id) {
				 //var_dump($key);exit();
				$row_num = count($billing_id_array);
				$this->data['row_num'] = $row_num;
				$table="billing_master";
				$join_table=array("gst_master");
				$join_condition=array('gst_master.gst_id=billing_master.gst_id');
				$where = array('billing_id' => $billing_id);

				$person_array = $this->custom->getRowsWhereJoin($table,$where,$join_table,$join_condition);
				$person = $person_array[0];

				$this->data['sno'][] = $key;

				//var_dump($person[0]->billing_id);exit();
				$this->data['description'][] = $person->billing_description;	
				$this->data['uom'][] = $person->billing_uom;
				$this->data['cat'][] = $person->gst_code;

				$billing_price_unit = $person->billing_price_per_uom * $customer_currency_rate;

				if ($person->billing_type == 'Product') {
					if (!$data["quantity"][$billing_id]) {
						$data["quantity"][$billing_id] = 1;
					}
					$this->data['quantity'][] = $data["quantity"][$billing_id];
					$this->data['unit_price'][] = $this->num_change($billing_price_unit);
					$this->data['discount'][] = $data["discount"][$billing_id];
					$this->data['amount'][] = $this->num_change($data["quantity"][$billing_id] * $billing_price_unit * ( 1 - $data["discount"][$billing_id] / 100));
					$subtotal += $data["quantity"][$billing_id] * $billing_price_unit * ( 1 - $data["discount"][$billing_id] / 100);
					$this->data['gst_amt'][] = $this->num_change($billing_price_unit * $data["quantity"][$billing_id] * $person->gst_rate * ( 1 - $data["discount"][$billing_id] / 100) * (1 - $data["lump_sum_discount"] / 100 ));
					$gst_lump_sum_amount += $billing_price_unit * $data["quantity"][$billing_id] * $person->gst_rate * ( 1 - $data["discount"][$billing_id] / 100) * (1 - $data["lump_sum_discount"] / 100 ) / 100;

				}
				else if($person->billing_type == 'Service')
				{
					$this->data['quantity'][] = '';
					$this->data['unit_price'][] = '';
					$this->data['discount'][] = '';
					$this->data['amount'][] = $this->num_change($data["amount"][$billing_id]);
					$subtotal += $data["amount"][$billing_id];
					$this->data['gst_amt'][] = $this->num_change($data["amount"][$billing_id] * $person->gst_rate * (1 - $data["lump_sum_discount"] / 100));
					$gst_lump_sum_amount += $data["amount"][$billing_id] * $person->gst_rate * (1 - $data["lump_sum_discount"] / 100) / 100;
				}
			
			}

			$this->data['lump_sum_discount'] = $data["lump_sum_discount"];

			$this->data['lump_sum_discount_amount'] = '-'.$this->num_change(($subtotal * $data["lump_sum_discount"] / 100));
			$this->data['net_of_lump_discount'] = $this->num_change($subtotal - $subtotal * $data["lump_sum_discount"] / 100);
			$this->data['subtotal'] = $this->num_change($subtotal);
			$this->data['gst_lump_sum_amount'] = '+'.$this->num_change($gst_lump_sum_amount);
			$this->data['total'] = $this->num_change($subtotal - ($subtotal * $data["lump_sum_discount"] / 100) + $gst_lump_sum_amount);
			//var_dump($this->data);exit();

			$html=$this->load->view('quotation_print',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
	 	 	echo $html;
			//this the the PDF filename that user will get to download
			// $pdfFilePath ="quotations-".time()."-download.pdf";
	 
			// //actually, you can pass mPDF parameter on this load() function
			// $pdf = $this->m_pdf->load();

			// $pdf->SetTitle('QuotationsList');
			// //generate the PDF!
			// $pdf->WriteHTML($html,2);
			// //offer it to user via browser download! (The PDF won't be saved on your server HDD)
			// $pdf->Output($pdfFilePath, "D");
			

	  	}
	}
