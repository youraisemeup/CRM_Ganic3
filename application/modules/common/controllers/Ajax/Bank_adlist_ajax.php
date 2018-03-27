<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Bank_adlist_ajax extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{ 
			parent::__construct();
			
			$this->table="bank_adjustment";
			$this->logged_id = $this->session->user_id;
			$this->load->model('backend/backend_model','backend');
		}

		public function delete()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('bank_ad_id' => $id);
			$result = $this->custom->updateRow($this->table,array('bank_ad_status'=>'D'),$where);
			echo $result;
		}	

		public function postOpen()//
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('bank_ad_id' => $id);
			$result = $this->custom->updateRow($this->table,array('bank_ad_status'=>"P"),$where);
			
			$open_data=$this->custom->getSingleRow($this->table,array("bank_ad_id"=>$id));
				    
         	$bank_data['bank_reference'] = $open_data->bank_ad_ref;
            $bank_data['bank_date'] = $open_data->bank_ad_date;
            $bank_data['bank_remarks'] = $open_data->bank_ad_remarks;
            
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

            if ($open_data->bank_ad_sign == '+') {
            	$bank_data['bank_debit'] = $open_data->bank_ad_amt;	
            	$bank_data['bank_balance'] = $last_balance + $open_data->bank_ad_amt;
            }
            else if ($open_data->bank_ad_sign == '-') {
            	$bank_data['bank_credit'] = $open_data->bank_ad_amt;		
            	$bank_data['bank_balance'] = $last_balance - $open_data->bank_ad_amt;
            }
            
            $this->custom->insertRow("bank",$bank_data);
                               			
 		    echo $result;
		}
	}
?>