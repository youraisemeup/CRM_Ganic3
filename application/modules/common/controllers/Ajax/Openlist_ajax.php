<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Openlist_ajax extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{ 
			parent::__construct();
			
			$this->table="open_table";
			$this->logged_id = $this->session->user_id;
			$this->load->model('account/account_model','account');
		}

		public function delete()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('open_id' => $id);
			$result = $this->custom->updateRow($this->table,array('open_status'=>'D'),$where);
			echo $result;
		}	

		public function postOpen()//
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('open_id' => $id);
			$result = $this->custom->updateRow($this->table,array('open_status'=>"P"),$where);
			
			$open_data=$this->custom->getSingleRow($this->table,array("open_id"=>$id));
				    
			$result2= $this->account->get_customer_details(array('customer_id'=>$open_data->customer_id));

			$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result2->currency_id));
        
            //$insert_data['ar_id']="NULL";
            $insert_data['doc_ref_no'] = $open_data->open_doc_ref;
            
            // echo "<script>console.log( 'Debug Objects: " . $insert_data['doc_ref_no'] . "' );</script>";	
            $insert_data['customer_code'] = $result2->customer_code;
            $insert_data['doc_date']= $open_data->open_tran_date;
            $insert_data['currency_type'] = $currency_data->currency_name;
            $insert_data['total_amt']= $open_data->open_amount;
            $insert_data['sign'] = $open_data->open_sign;
            $insert_data['tran_type']='Open';
            $insert_data['remarks'] = $open_data->open_remarks;
            
            $this->custom->insertRow("accounts_receivable",$insert_data);
                               			
 		    echo $result;
		}
	}
?>