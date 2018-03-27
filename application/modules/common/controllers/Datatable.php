<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends CI_Controller {

	public $logged_id;
	public function __construct()
	{
		parent::__construct();
		is_ajax();
		$this->logged_id = $this->session->user_id;
		$this->load->model('datatable_model','DT_model');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('person_view');
	}

	
	public function ajax_list($data_check) 
	{
		$true_icon = "<center><label class='label label-success'><i class='fa fa-fw fa-lg fa-check'></i></label></center>"; // true icon
		$false_icon = "<center><label class='label label-danger'><i class='fa fa-fw fa-lg fa-times'></i></label></center>"; // false icon
		$logged_id = $this->session->user_id;
		$user = $this->session->level;
		/*
			List of group 
		*/ 
		
		if ($data_check=="manage_group") {
			$table="groups";
			$columns=array("name","description");
			if($user=="admin"){
			    $where=array('(id != "1" OR `name` != "TOPFORM MANAGMENT") AND `name`!="admin"'=>null );
			}else{
			    $where=array('id != "1" OR `name` != ' =>"TOPFORM MANAGMENT" );
			}
			$table_id="id";
		}
		if ($data_check=="manage_employee") {
			$table="users";
			$columns=array("emp_name","email",'name');
			$join_table=array("groups");
			$join_condition=array('groups.id=users.group_id');
			if($user=="admin"){
			    $where=array('`name` != "TOPFORM MANAGMENT" AND `name`!="admin"'=>null );
			}else{
			    $where=array('`name` != ' =>"TOPFORM MANAGMENT" );
			}
			$table_id="id";
		}
		if ($data_check == "configuration") {
			$table="users";
			$columns=array("username","password",'conf_name');
			$join_table=array("configuration_master");
			$join_condition=array('configuration_master.id=users.conf_id');
			$where=array('`level` = "admin" AND `conf_id`!="6"'=>null );
			$table_id="id";	
		}
		
		if ($data_check=="m_create") {
			$table="m_create";
			$columns=array("currency_name","currency_rate",'currency_description');
			$table_id="currency_id";
		}

		if ($data_check=="forex_master") {
			$table="currency_master";
			$columns=array("currency_name","currency_rate",'currency_description');
			$table_id="currency_id";
		}
		if ($data_check=="country_master") {
			$table="country_master";
			$columns=array("country_name","country_code");
			$table_id="country_id";
		}
		if ($data_check=="payee_master") {
			$table="payee";
			$columns=array("payee_name");
			$table_id="payee_id";
		}

		if ($data_check=="gst_master") {
			$table="gst_master";
			$columns=array("gst_code","gst_rate","gst_type","gst_description");
			$table_id="gst_id";
		}
		if ($data_check=="contract_master") {
			$table="contract_master";
			$columns=array("contract_code","contract_description","contract_type","contract_amount");
			$table_id="contract_id";
		}

		if ($data_check=="chart_of_account") {
			$table="chart_of_account";
			$columns=array("coa_suffix","coa_pre_character","coa_description");
			$join_table=array("chart_of_account_prefix");
			$join_condition = array('chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id');
			$table_id="coa_id";
		}
		if ($data_check=="supplier_master") {
			$table="customer_master";
			$columns=array("customer_id","customer_name","customer_code","customer_email","customer_phone");
			$where=array('flag' =>'S');
			$join_table=array("currency_master");
			$join_condition=array('currency_master.currency_id=customer_master.currency_id');
			$table_id="customer_id";
		}
		if ($data_check=="customer_master") {
			$table="customer_master";
			$columns=array("customer_id","customer_name","customer_code","customer_email","customer_phone");
			$where=array('flag' =>'C');
			$join_table=array("currency_master");
			$join_condition=array('currency_master.currency_id=customer_master.currency_id');
			$table_id="customer_id";
		}
		if ($data_check=="billing_master") {
			$table="billing_master";
			$columns=array("billing_id","stock_code","billing_description","billing_uom","gst_code","billing_type");
			$join_table=array("gst_master");
			$join_condition=array('gst_master.gst_id=billing_master.gst_id');
			$table_id="billing_id";
		}
		if ($data_check=="salesman_master") {
			$table="salesman_master";
			$columns=array("s_id","s_name","s_category","s_note");
			$table_id="s_id";	
		}
		if ($data_check=="quotation_list") {
			$table="quotation_master";
			$columns=array("quotation_ref_no","customer_name","sub_total","lump_sum_discount","lump_sum_discount_price","final_total","created_on");
			$where=array('quotation_status' =>strtoupper($this->uri->segment(5)),'user_id' => $logged_id);
			$join_table=array("customer_master","currency_master");
			$join_condition=array('quotation_master.customer_id=customer_master.customer_id','customer_master.currency_id = currency_master.currency_id');
			$table_id="quotation_id";
		}
		if ($data_check == "stock_adjustment_list") {
			$table = "stock_adjustment_master";
			$columns = array("adjustment_ref_no","stock_code","billing_description","billing_uom","adjustment_quantity","adjustment_remarks","adjustment_sign","adjustment_tran_type");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}
			$where=array('adjustment_status' =>strtoupper($in_status));
			$join_table=array("billing_master");
			$join_condition=array('stock_adjustment_master.adjustment_billing_id=billing_master.billing_id');
			$table_id="adjustment_id";
		}
		if ($data_check == "stock_purchase_list") {
			$table = "stock_purchase_master";
			$columns = array("customer_name","customer_code","purchase_ref_no","stock_code","billing_description","billing_uom","purchase_quantity","purchase_sign","purchase_tran_type");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}
			$where=array('purchase_status' =>strtoupper($in_status));
			$join_table=array("billing_master","customer_master");
			$join_condition=array('stock_purchase_master.purchase_billing_id=billing_master.billing_id','stock_purchase_master.purchase_supplier_id=customer_master.customer_id');
			$table_id="purchase_id";
		}
		if ($data_check == "stock_list") {
			$table = "open_stock_table";
			$columns = array("stock_code","billing_description","billing_uom","open_stock_quantity","open_stock_sign","open_stock_tran_type");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}
			$where=array('open_stock_status' =>strtoupper($in_status));
			$join_table=array("billing_master");
			$join_condition=array('open_stock_table.open_billing_id=billing_master.billing_id');
			$table_id="open_stock_id";
		}
		if ($data_check == "ap_open_list") {
			$table = "ap_open";
			$columns = array("ap_open_tran_date","customer_name","ap_open_doc_ref","ap_open_remarks","ap_open_amount","ap_open_sign");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}
			$where=array('ap_open_status' =>strtoupper($in_status));
			$join_table=array("customer_master");
			$join_condition=array('ap_open.ap_customer_id=customer_master.customer_id');
			$table_id="ap_open_id";
		}
		if ($data_check == "bank_ad_list") {
			$table = "bank_adjustment";
			$columns = array("bank_ad_date","bank_ad_ref","bank_ad_remarks","bank_ad_amt","bank_ad_sign");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}
			$where=array('bank_ad_status' =>strtoupper($in_status));
			$table_id="bank_ad_id";
		}
		if ($data_check == "open_list") {
			$table = "open_table";
			$columns = array("open_tran_date","customer_name","open_doc_ref","open_remarks","open_amount","open_sign");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}
			$where=array('open_status' =>strtoupper($in_status));
			$join_table=array("customer_master");
			$join_condition=array('open_table.customer_id=customer_master.customer_id');
			$table_id="open_id";
		}
		if ($data_check=="invoice_list") {
			$table="invoice_master";
			$columns=array("invoice_ref_no","customer_name","sub_total","lump_sum_discount","lump_sum_discount_price","final_total","created_on", "invoice_status","customer_code","currency_name");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}

			$where=array('invoice_status' =>strtoupper($in_status),'user_id' => $logged_id);
			$join_table=array("customer_master","currency_master");
			$join_condition=array('invoice_master.customer_id=customer_master.customer_id','customer_master.currency_id = currency_master.currency_id');
			$table_id="invoice_id";
		}

		if ($data_check=="autobill_list") {
			$table="autobill_master";
			$columns=array("autobill_ref_no","customer_name","contract_type","contract_sum","bill_date","start_date","end_date","less_discount","net_contract_amount","total_inclusive_gst","created_on","gst", "autobill_status","customer_code","currency_name");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}

			$where=array('autobill_status' =>strtoupper($in_status),'user_id' => $logged_id);
			$join_table=array("customer_master","currency_master");
			$join_condition=array('autobill_master.customer_id=customer_master.customer_id','customer_master.currency_id = currency_master.currency_id');
			$table_id="autobill_id";
		}

		if ($data_check=="blockbill_list") {
			
			$search_billing_mon = $_REQUEST['search_custom_date'];
			
			$table="blockbill_master";
			$columns=array("blockbill_ref_no","customer_name","contract_type","contract_sum","bill_date","start_date","end_date","less_discount","net_contract_amount","total_inclusive_gst","created_on","gst","bill_state","customer_code","next_bill_date","currency_name");
			$where=array('user_id' => $logged_id,'bill_state!=' => 'D');
			if(!empty($search_billing_mon)) {   //name
				$where=array('user_id' => $logged_id,'bill_state!=' => 'D','next_bill_date like' => $search_billing_mon.'%');
			}
			$join_table=array("customer_master","currency_master");
			$join_condition=array('blockbill_master.customer_id=customer_master.customer_id','customer_master.currency_id = currency_master.currency_id');
			$table_id="blockbill_id";
		}
		
		
		if ($data_check == "opay_list") {
			$table="other_payment";
			$columns=array("opay_date","opay_ref_no","opay_payee","opay_amount","opay_created_on","coa_description","coa_pre_character","coa_suffix");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}

			$where=array('opay_status' =>strtoupper($in_status),'opay_user_id' => $logged_id);
			$join_table=array("chart_of_account","chart_of_account_prefix");
			$join_condition=array('other_payment.opay_coa_id = chart_of_account.coa_id','chart_of_account.coa_prefix = chart_of_account_prefix.coa_pre_id');
			$table_id="opay_id";
		}
		
		if ($data_check == "purchases_list") {
			$table="purchase_master";
			$columns=array("purchase_ref_no","customer_name","total_amount_foreign","currency_amount","total_amount_local","local_handling","created_on","gst_in_sgd","total_purchase_b4_gst" ,"purchase_status","tran_type","freight_insurance","import_permit_ref");
			$in_status = 'C';
			if ($this->uri->segment(5) == 'confirmed') {
				$in_status = 'C';
			}elseif ($this->uri->segment(5) == 'posted') {
				$in_status = 'P';
			}elseif ($this->uri->segment(5) == 'deleted') {
				$in_status = 'D';
			}

			$where=array('purchase_status' =>strtoupper($in_status));
			$join_table=array("customer_master");
			$join_condition=array('purchase_master.supplier_id=customer_master.customer_id');
			$table_id="purchase_id";
		}
		if ($data_check == "aplist") {
			
			$table="accounts_payable";
		    $join_table = array('customer_master');
		    $join_condition = array('accounts_payable.supplier_code = customer_master.customer_code');
			$columns=array("doc_date","doc_ref_no","customer_name","customer_code", "total_amt", "currency_type","sign","tran_type","remarks");
            $table_id="ap_id";
		}
		if ($data_check == "histcostlist") {
			$table="histcost_master";
		    $join_table = array('purchase_master','customer_master','billing_master');
		    $join_condition = array('histcost_master.purchase_id = purchase_master.purchase_id','purchase_master.supplier_id = customer_master.customer_id','histcost_master.product_id = billing_master.billing_id');
			$columns=array("doc_date","purchase_ref_no","customer_name","customer_code","currency_amount" ,"stock_code","billing_description", "unit_price_sgd","quantity","amt_sgd");
            $table_id="h_c_id";
		}
		if ($data_check == "bank_list") {
			$table="bank";
			$columns=array("bank_date","bank_reference","bank_remarks","bank_debit", "bank_credit", "bank_balance");
			$table_id="bank_id";
		}
		if ($data_check=="other_list") {
			$table="listings";
			if ($this->uri->segment(5) == 'AR') {
		    $table="accounts_receivable";
		    $join_table = array('customer_master');
		    $join_condition = array('accounts_receivable.customer_code = customer_master.customer_code');
			$columns=array("doc_date","doc_ref_no","customer_name","accounts_receivable.customer_code", "total_amt", "currency_type","tran_type","remarks","sign");
            //to ensure only invoices are shown up, use tran_type SALES as like query was difficult to implement in get_datatables method.
            //$where=array('tran_type' =>'Sales');
			$table_id="ar_id";
			}elseif ($this->uri->segment(5) == 'GL') {
				$table="gl_table";
				$join_table = array('customer_master','currency_master');
				$join_condition=array('gl_table.customer_code = customer_master.customer_code','customer_master.currency_id = currency_master.currency_id');
				$columns=array("doc_ref_no","customer_name","gl_table.customer_code","currency_name","doc_date","gst","currency_amount","lump_sum_discount_price","total_amt","tran_type");
			    $table_id="gl_id";
			}
		
			if ($this->uri->segment(5) == 'stock') {
				$in_status = 'Product';
				$table="invoice_product_master";
				$join_table=array("billing_master","invoice_master","customer_master","currency_master");
				$join_condition=array('invoice_product_master.product_id=billing_master.billing_id','invoice_product_master.invoice_id=invoice_master.invoice_id','invoice_master.customer_id=customer_master.customer_id','customer_master.currency_id = currency_master.currency_id');
				$columns=array("customer_name","currency_name","customer_code","invoice_ref_no","billing_description","quantity","stock_code","reject_msg");
				$where=array('billing_type' =>$in_status,'invoice_status' =>strtoupper('P'));
				//$where=array('billing_type' =>$in_status,'invoice_status' =>strtoupper('P'));
				$table_id="invoice_id";
			}elseif ($this->uri->segment(5) == 'GST') {
				$table="invoice_gst_table";
				$join_table = array('customer_master','currency_master');
				$join_condition=array('invoice_gst_table.i_g_customer_id = customer_master.customer_id','customer_master.currency_id = currency_master.currency_id');
				$columns=array("i_g_date","i_g_doc_ref","customer_name","customer_code","i_g_code","i_g_description","i_g_cat","currency_name","i_g_lump_sum_discount_price","i_g_gst_amount","i_g_ex_rate","i_g_lump_sum_discount_price_local","i_g_gst_amount_local");
				$table_id="i_g_id";
			}
		}
		if ($data_check=="audit_list") {
			$table="accounts_receivable";
			$columns=array("doc_date","doc_ref_no","customer_code","currency_type","total_amt","sign","tran_type","remarks");
			$table_id="ar_id";
		}
		if ($data_check=="other_debtor") {
			$currency_type = $this->input->post('currency_type');
			$table="accounts_receivable";
			$columns=array("doc_date","doc_ref_no","customer_name","customer_contact_person","customer_code","currency_type","total_amt","sign","tran_type","remarks","customer_phone");
			$where=array('offset'=>'n', 'settled'=>'n', 'currency_type' =>$currency_type);
			$join_table=array("customer_master");
			$join_condition=array('accounts_receivable.customer_code = customer_master.customer_code');
			$table_id="ar_id";
		}
		if ($data_check=="receipt_list") {
			$table="receipt_master";
			$columns=array("receipt_ref_no","customer_name","bank","cheque","other_reference","amount","invoice","created_on");
			$where=array('receipt_status' =>strtoupper(substr($this->uri->segment(5),0,1)),'user_id' => $logged_id);
			$join_table=array("customer_master");
			$join_condition=array('receipt_master.customer_id=customer_master.customer_id');
			$table_id="receipt_id";
		}
		if ($data_check == "payment_list") {
			$table="payment_master";
			$columns=array("payment_ref_no","customer_name","bank","cheque","other_reference","amount","purchase","created_on");
			$where=array('payment_status' =>strtoupper(substr($this->uri->segment(5),0,1)),'user_id' => $logged_id);
			$join_table=array("customer_master");
			$join_condition=array('payment_master.supplier_id=customer_master.customer_id');
			$table_id="payment_id";	
		}
		/*--------------------------------------------------------------------------------------------------------*/

		
		
		if (isset($join_table) && isset($join_condition) && isset($where)) {
			$list= $this->DT_model->get_datatables($table,$columns,$join_table,$join_condition,$where,$table_id);
		}
		elseif (isset($join_table) && isset($join_condition)) {
			$list = $this->DT_model->get_datatables($table,$columns,$join_table,$join_condition,null,$table_id);
		}
		elseif (isset($where)){
		 	$list = $this->DT_model->get_datatables($table,$columns,null,null,$where,$table_id);
		}
		else {
			$list = $this->DT_model->get_datatables($table,$columns,null,null,null,$table_id);		
		}	
		$data = array();

		$no = $this->input->post('start');
		
		foreach ($list as $person) {
			
			$no++;
			$row = array();
			/*
				get data of fired query as row as per requirement
			*/
			if($data_check=="manage_group")
			{
				$a=array();
				$permissions=(array)json_decode($person->permissions);
				$permissions_list="";
				foreach ($permissions as $key => $value) {
					if($value){
						$permissions_list.=ucwords(str_replace('_', ' ',$key)).",<br>";
					}
				}
					$row[] = $person->id;
					$row[] = $person->name;
					$row[] = $person->description;
					$row[] = $permissions_list;
					// $row[] = print_r($a);
			}

			if($data_check=="manage_employee")
			{
				$row[] = $person->table_id;
				$row[] = $person->name; 
				$row[] = $person->emp_name;
				$row[] = $person->email;
			}

			if($data_check=="configuration")
			{
				$row[] = $person->table_id;
				$row[] = $person->username; 
				$row[] = $person->password;
				$row[] = $person->conf_name;
			}
			
			if($data_check=="m_create")
			{
				$row[] = $person->table_id;
				$row[] = $person->currency_name;
				$row[] = $person->currency_description;
				$row[] = $person->currency_rate;
			}
			if($data_check=="forex_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->currency_name;
				$row[] = $person->currency_description;
				$row[] = $person->currency_rate;
			}
			
			if($data_check=="payee_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->payee_name;
			}

			if($data_check=="country_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->country_name;
				$row[] = $person->country_code;
			}

			if($data_check=="gst_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->gst_code;
				$row[] = $person->gst_rate;
				$row[] = $person->gst_type;
				$row[] = $person->gst_description;
			}

			if($data_check=="contract_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->contract_code;
				$row[] = $person->contract_description;
				$row[] = $person->contract_type;
				$row[] = $person->contract_amount;
			}
			if($data_check=="chart_of_account")
			{
				$row[] = $person->table_id;
				$row[] = $person->coa_pre_character.$person->coa_suffix;
				$row[] = $person->coa_description;
			}
			

			if($data_check=="supplier_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_name;
				$row[] = $person->customer_email;
				$row[] = $person->customer_phone;
			}			

			if($data_check=="customer_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_name;
				$row[] = $person->customer_email;
				$row[] = $person->customer_phone;
			}

			if($data_check=="billing_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->stock_code;
				$row[] = $person->billing_description;
				$row[] = $person->gst_code;
				$row[] = $person->billing_uom;
				$row[] = $person->billing_type;
			}

			if($data_check=="salesman_master"){
				$row[] = $person->table_id;
				$row[] = $person->s_name;
				$row[] = $person->s_category;
				$row[] = $person->s_note;
			}

			if($data_check=="quotation_list")
			{
				$row[] = $person->table_id;
				$row[] = $person->quotation_ref_no;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_name;
				$row[] = $person->sub_total;
				$row[] = $person->lump_sum_discount;
				$row[] = $person->lump_sum_discount_price;
				$row[] = $person->final_total;
				$row[] = $person->created_on;
			}
			if ($data_check == "stock_adjustment_list") {
				$row[] = $person->table_id;
				$row[] = $person->adjustment_ref_no;
				$row[] = $person->stock_code;
				$row[] = $person->billing_description;
				$row[] = $person->billing_uom;
				$row[] = $person->adjustment_quantity;
				$row[] = $person->adjustment_remarks;
				$row[] = $person->adjustment_sign;
				$row[] = $person->adjustment_tran_type;
			}
			if ($data_check == "stock_purchase_list") {
				$row[] = $person->table_id;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->purchase_ref_no;
				$row[] = $person->stock_code;
				$row[] = $person->billing_description;
				$row[] = $person->billing_uom;
				$row[] = $person->purchase_quantity;
				$row[] = $person->purchase_sign;
				$row[] = $person->purchase_tran_type;
			}
			if ($data_check == "stock_list") {
				$row[] = $person->table_id;
				$row[] = $person->stock_code;
				$row[] = $person->billing_description;
				$row[] = $person->billing_uom;
				$row[] = $person->open_stock_quantity;
				$row[] = $person->open_stock_sign;
				$row[] = $person->open_stock_tran_type;
			}

			if ($data_check == "ap_open_list") {
				$row[] = $person->table_id;
				$row[] = $person->ap_open_tran_date;
				$row[] = $person->customer_name;
				$row[] = $person->ap_open_doc_ref;
				$row[] = $person->ap_open_remarks;
				$row[] = $person->ap_open_amount;
				$row[] = $person->ap_open_sign;
			}

			if ($data_check == "bank_ad_list") {
				$row[] = $person->table_id;
				$row[] = $person->bank_ad_date;
				$row[] = $person->bank_ad_ref;
				$row[] = $person->bank_ad_remarks;
				$row[] = $person->bank_ad_amt;
				$row[] = $person->bank_ad_sign;
			}
			if ($data_check=="open_list") {
				$row[] = $person->table_id;
				$row[] = $person->open_tran_date;
				$row[] = $person->customer_name;
				$row[] = $person->open_doc_ref;
				$row[] = $person->open_remarks;
				$row[] = $person->open_amount;
				$row[] = $person->open_sign;

			}
			if($data_check=="invoice_list")
			{
				$row[] = $person->table_id;
				$row[] = $person->invoice_ref_no;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_name;
				$row[] = $person->sub_total;
				$row[] = $person->lump_sum_discount;
				$row[] = $person->lump_sum_discount_price;
				$row[] = $person->final_total;
				$row[] = $person->created_on;
				$row[] = $person->invoice_status;
			}
			if($data_check=="autobill_list")
			{
				$row[] = $person->table_id;
				$row[] = $person->autobill_ref_no;
				$row[] = $person->bill_date;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_name;
				$row[] = $person->contract_type;
				$row[] = $person->start_date;
				$row[] = $person->end_date;
				$row[] = $person->contract_sum;
				$row[] = $person->less_discount;
				$row[] = $person->net_contract_amount;
				$row[] = $person->total_inclusive_gst;
			}

			if($data_check=="blockbill_list")
			{
				$row[] = $person->table_id;
				$row[] = $person->blockbill_ref_no;
				$row[] = $person->bill_date;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_name;
				$row[] = $person->contract_type;
				$row[] = $person->start_date;
				$row[] = $person->end_date;
				$row[] = $person->next_bill_date;
				$row[] = $person->contract_sum;
				$row[] = $person->less_discount;
				$row[] = $person->net_contract_amount;
				$row[] = $person->total_inclusive_gst;
				$row[] = $person->bill_state;
			}
			
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if ($data_check == "opay_list") {
				$row[] = $person->table_id;
				$row[] = $person->opay_date;
				$row[] = $person->opay_ref_no;
				$row[] = $person->opay_payee;
				$row[] = $person->coa_pre_character.$person->coa_suffix;
				$row[] = $person->coa_description;
				$row[] = $person->opay_amount;
				$row[] = $person->opay_created_on;
			}

			if ($data_check == "purchases_list") {
				$row[] = $person->table_id;
				$row[] = $person->doc_date;
				$row[] = $person->purchase_ref_no;
				$row[] = $person->customer_name;
				$row[] = $person->total_amount_foreign;
				$row[] = $person->currency_amount;
				$row[] = $person->total_amount_local;
				$row[] = $person->local_handling;
				$row[] = $person->freight_insurance;
				$row[] = $person->gst_in_sgd;
				$row[] = $person->total_purchase_b4_gst;
				$row[] = $person->import_permit_ref;
				$row[] = $person->tran_type;
				$row[] = $person->created_on;
			}

			if ($data_check == "aplist") {
				$row[] = $person->table_id;
				$row[] = $person->doc_date;
				$row[] = $person->doc_ref_no;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_type;
				$row[] = $person->sign.$person->total_amt;
				$row[] = $person->tran_type;
				$row[] = $person->remarks;
			}

			if ($data_check == "histcostlist") {
				$row[] = $person->table_id;
				$row[] = $person->doc_date;
				$row[] = $person->purchase_ref_no;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
				$row[] = $person->currency_amount;
				$row[] = $person->stock_code;
				$row[] = $person->billing_description;
				$row[] = $person->unit_price_sgd;
				$row[] = $person->quantity;
				$row[] = $person->amt_sgd;
			}

			if ($data_check == "bank_list") {
				$row[] = $person->table_id;
				$row[] = $person->bank_date;
				$row[] = $person->bank_reference;
				$row[] = $person->bank_remarks;
				$row[] = $person->bank_debit;
				$row[] = $person->bank_credit;
				if ($person->bank_balance >= 0) {
					$row[] = $person->bank_balance.' (DR)';	
				}
				else
				{
					$row[] = (-1) * $person->bank_balance.' (CR)';	
				}
				
			}
            if($data_check=="other_list")
			{
				if ($this->uri->segment(5) == 'AR') {
					$row[] = $person->table_id;
					$row[] = $person->doc_date;
					$row[] = $person->doc_ref_no;
					$row[] = $person->customer_name;
					$row[] = $person->customer_code;
					$row[] = $person->currency_type;
					$row[] = $person->sign. number_format(($person->total_amt), 2, '.', '');
					$row[] = $person->tran_type;
					$row[] = $person->remarks;
					
				}elseif ($this->uri->segment(5) == 'GL') {
					$row[] = $person->table_id;
					$row[] = $person->doc_date;
					$row[] = $person->doc_ref_no;
					$row[] = $person->customer_name;
					$row[] = $person->customer_code;
					$row[] = $person->currency_name;
					if($person->currency_amount != 1){//foreign total
						//$row[] = number_format(($person->lump_sum_discount_price*$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->lump_sum_discount_price), 2, '.', '');
						//$row[] = number_format(($person->gst*$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->gst*$person->currency_amount), 2, '.', '');
						//$row[] = number_format(($person->total_amt*$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->total_amt), 2, '.', '');
						$row[] = $person->currency_amount;
						//$row[] = number_format(($person->lump_sum_discount_price*$person->currency_amount/$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->lump_sum_discount_price/$person->currency_rate), 2, '.', '');
						$row[] = number_format(($person->gst*$person->currency_amount/$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->total_amt/$person->currency_rate), 2, '.', '');
					}
					else{
						$row[] = number_format(($person->lump_sum_discount_price*$person->currency_amount*$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->gst*$person->currency_amount*$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->total_amt*$person->currency_amount*$person->currency_amount), 2, '.', '');
						$row[] = $person->currency_amount;
						$row[] = number_format(($person->lump_sum_discount_price*$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->gst*$person->currency_amount), 2, '.', '');
						$row[] = number_format(($person->total_amt*$person->currency_amount), 2, '.', '');
					}
					$row[] = $person->tran_type;
				}elseif ($this->uri->segment(5) == 'stock') {
					$row[] = $person->table_id;
					$row[] = $person->created_on;
					$row[] = $person->invoice_ref_no;
					$row[] = $person->customer_name;
					$row[] = $person->customer_code;
					$row[] = $person->currency_name;
					$row[] = $person->stock_code;
					$row[] = $person->billing_description;
					$row[] = $person->discount;
					$row[] = number_format($person->quantity * (-1), 0, '', '');
					$row[] = $person->reject_msg;
					
				}
				elseif ($this->uri->segment(5) == 'GST') {

					$columns=array("i_g_date","i_g_doc_ref","customer_name","customer_code","i_g_code","i_g_description","i_g_cat","currency_name","i_g_lump_sum_discount_price","i_g_gst_amount","i_g_ex_rate","i_g_lump_sum_discount_price_local","i_g_gst_amount_local");

					$row[] = $person->table_id;
					$row[] = $person->i_g_date;
					$row[] = $person->i_g_doc_ref;
					$row[] = $person->customer_name;
					$row[] = $person->customer_code;
					$row[] = $person->i_g_code;
					$row[] = $person->i_g_description;
					$row[] = $person->i_g_cat;
					$row[] = $person->currency_name;
					$row[] = $person->i_g_lump_sum_discount_price;
					$row[] = $person->i_g_gst_amount;
					$row[] = $person->i_g_ex_rate;
					$row[] = $person->i_g_lump_sum_discount_price_local;
					$row[] = $person->i_g_gst_amount_local;
				}
			}
	        if($data_check=="audit_list")
			{
				$row[] = $person->table_id;
				$row[] = $person->doc_date;
				$row[] = $person->doc_ref_no;
				$row[] = $person->customer_code;
				$row[] = $person->currency_type;
				$row[] = $person->total_amt;
				$row[] = $person->sign;
				$row[] = $person->tran_type;
				$row[] = $person->remarks;
			}
			if ($data_check == "other_debtor") {
				$row[] = $person->table_id;
				$row[] = $person->doc_date;
				$row[] = $person->doc_ref_no;
				$row[] = $person->remarks;
				
				$row[] = $person->currency_type;
				$row[] = $person->total_amt;
				$row[] = $person->sign;
				$row[] = $person->tran_type;

				$row[] = $person->customer_code;
				$row[] = $person->customer_name;
				$row[] = $person->customer_contact_person;
				$row[] = $person->customer_phone;
				
			}
			
			if($data_check=="receipt_list")
			{
				$row[] = $person->table_id;
				$row[] = $person->receipt_ref_no;
				$row[] = $person->customer_name;
				$row[] = $person->bank;
				$row[] = $person->cheque;
				$row[] = $person->other_reference;
				$row[] = $person->amount;
				$row[] = $person->invoice;
				$row[] = $person->created_on;
			}

			if ($data_check == "payment_list") {
				$row[] = $person->table_id;
				$row[] = $person->payment_ref_no;
				$row[] = $person->customer_name;
				$row[] = $person->bank;
				$row[] = $person->cheque;
				$row[] = $person->other_reference;
				$row[] = $person->amount;
				$row[] = $person->purchase;
				$row[] = $person->created_on;	
			}

			//add html for action
			
			$data[] = $row;
		}
		/*----------------------------------------------------------------------------------------------------*/

		if (isset($join_table) && isset($join_condition) && isset($where)) {
		$output = array(
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->DT_model->count_all($table),
						"recordsFiltered" => $this->DT_model->count_filtered($table,$columns,$join_table,$join_condition,$where,$table_id),
						"data" => $data,
				);
		}
		elseif (isset($join_table) && isset($join_condition)) {
			$output = array(
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->DT_model->count_all($table),
						"recordsFiltered" => $this->DT_model->count_filtered($table,$columns,$join_table,$join_condition,null,$table_id),
						"data" => $data,
				);	
		}
		elseif (isset($where)){
			$output = array(
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->DT_model->count_all($table),
						"recordsFiltered" => $this->DT_model->count_filtered($table,$columns,null,null,$where,$table_id),
						"data" => $data,
				);	
		}
		else
		{
			$output = array(
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->DT_model->count_all($table),
						"recordsFiltered" => $this->DT_model->count_filtered($table,$columns,null,null,null,$table_id),
						"data" => $data,
				);	
		}
		//output to json format
		echo json_encode($output);
	}
}
