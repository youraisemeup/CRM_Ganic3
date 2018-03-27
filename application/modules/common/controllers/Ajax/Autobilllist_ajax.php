<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Autobilllist_ajax extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="autobill_master";
			$this->logged_id = $this->session->user_id;
			$this->load->model('autobill/autobill_model','autobill');
		} 
		public function get_customer_details()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$result= $this->autobill->get_customer_details($post);
			$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
			$data['customer_phone']=$result->customer_phone;
			$data['customer_email']=$result->customer_email;
			$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
			$data['customer_currency']=$currency_data->currency_name;
			$data['currency_amount']=$currency_data->currency_rate;

			///////////////
			//opening balance 
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
			$result = $this->autobill->get_contract_details($post);
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
			$where = array('autobill_id' => $id);
			$result = $this->custom->updateRow($this->table,array('autobill_status'=>"D"),$where);
			echo $result;
		}

		public function postAutobill()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('autobill_id' => $id);
			$result = $this->custom->updateRow($this->table,array('autobill_status'=>"P"),$where);
			
				$autobill_data=$this->custom->getSingleRow('autobill_master',array("autobill_id"=>$id));
				    
 				$result2= $this->autobill->get_customer_details(array('customer_id'=>$autobill_data->customer_id));

 				$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result2->currency_id));
                
                //$insert_data['ar_id']="NULL";
                $insert_data['doc_ref_no'] = $autobill_data->autobill_ref_no;
                
                //AR table update
                $insert_data['customer_code'] = $result2->customer_code;
                $insert_data['doc_date']= $autobill_data->bill_date;
                $insert_data['currency_type'] = $currency_data->currency_name;
                $insert_data['total_amt']= $autobill_data->total_inclusive_gst;
                $insert_data['sign']='+';
                $insert_data['tran_type']='AUTOBILL';

                $insert_data['invoice_id'] = $id;
                                
                $this->custom->insertRow("accounts_receivable",$insert_data);
                
                //GL table update
                $gl_data['doc_ref_no'] = $autobill_data->autobill_ref_no;
			    $gl_data['customer_code'] = $result2->customer_code;
                $gl_data['doc_date']= $autobill_data->bill_date;
                $gl_data['gst'] = $autobill_data->gst;
                $gl_data['currency_amount'] = $autobill_data->currency_amount;
                $gl_data['lump_sum_discount_price'] = $autobill_data->net_contract_amount;
                $gl_data['total_amt']= $autobill_data->total_inclusive_gst;
                $gl_data['tran_type']='AUTOBILL';
                $this->custom->insertRow("gl_table",$gl_data);  

               	//GST table update

                $contract_info = $this->custom->getSingleRow('contract_master',array('contract_id' => $autobill_data->contract_id));
                $i_g_code = $contract_info->contract_code;
                $i_g_description = $contract_info->contract_description;

				$insert_gst_data['i_g_date'] = $autobill_data->bill_date;
				$insert_gst_data['i_g_doc_ref'] = $autobill_data->autobill_ref_no;
				$insert_gst_data['i_g_customer_id'] = $autobill_data->customer_id;
				$insert_gst_data['i_g_code'] = $i_g_code;
				$insert_gst_data['i_g_description'] = $i_g_description;
				$insert_gst_data['i_g_cat'] = "SR";
				$insert_gst_data['i_g_lump_sum_discount_price'] = $autobill_data->net_contract_amount;
				$insert_gst_data['i_g_gst_amount'] = $autobill_data->net_contract_amount * $autobill_data->gst / 100;
				$insert_gst_data['i_g_ex_rate'] = $autobill_data->currency_amount;
				$insert_gst_data['i_g_lump_sum_discount_price_local'] = $autobill_data->net_contract_amount / $autobill_data->currency_amount;
				$insert_gst_data['i_g_gst_amount_local'] = $autobill_data->net_contract_amount * $autobill_data->gst / 100 / $autobill_data->currency_amount;
				$insert_gst_data['i_g_invoice_id'] = $autobill_data->contract_id;
				$insert_gst_data['i_g_mark'] = 'AUTOBILL';
				
				$invoice_product_id[]=$this->custom->insertRow("invoice_gst_table",$insert_gst_data);	

				//blockbill_master insert.
				$insert_blockbill_data['blockbill_ref_no'] = $autobill_data->autobill_ref_no;
				$insert_blockbill_data['customer_id'] = $autobill_data->customer_id;
				$insert_blockbill_data['user_id'] = $autobill_data->user_id;
				$insert_blockbill_data['contract_sum'] = $autobill_data->contract_sum;
				$insert_blockbill_data['less_discount'] = $autobill_data->less_discount;
				$insert_blockbill_data['net_contract_amount'] = $autobill_data->net_contract_amount;
				$insert_blockbill_data['gst'] = $autobill_data->gst;
				$insert_blockbill_data['total_inclusive_gst'] = $autobill_data->total_inclusive_gst;
				$insert_blockbill_data['bill_date'] = $autobill_data->bill_date;
				$insert_blockbill_data['created_on'] = $autobill_data->created_on;
				$insert_blockbill_data['modified_on'] = $autobill_data->modified_on;
				$insert_blockbill_data['start_date'] = $autobill_data->start_date;
				$insert_blockbill_data['end_date'] = $autobill_data->end_date;
				$insert_blockbill_data['next_bill_date'] = date('Y-m-d', strtotime("+1 day", strtotime($autobill_data->end_date)));
				$insert_blockbill_data['total_inclusive_gst_local'] = $autobill_data->total_inclusive_gst_local;
				$insert_blockbill_data['currency_amount'] = $autobill_data->currency_amount;
				$insert_blockbill_data['contract_type'] = $autobill_data->contract_type;
				$insert_blockbill_data['contract_id'] = $autobill_data->contract_id;

				$blockbill_id[]=$this->custom->insertRow("blockbill_master",$insert_blockbill_data);				
 		    echo $result;
		}

		public function num_change($value)
	    {
	    	return number_format($value,2, '.','');
	    }
		
		public function email()
		{
			echo '<script> $("#refresh").click(); </script>';
			echo '<script> $("#list_table").show();</script>';
		}

	}

?>