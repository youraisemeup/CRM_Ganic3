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
		if ($data_check=="forex_master") {
			$table="currency_master";
			$columns=array("currency_name","currency_rate",'currency_description');
			$table_id="currency_id";
		}
		if ($data_check=="country_master") {
			$table="country_master";
			$columns=array("country_code","country_name");
			$table_id="country_id";
		}
		if ($data_check=="gst_master") {
			$table="gst_master";
			$columns=array("gst_code","gst_rate","gst_type","gst_description");
			$table_id="gst_id";
		}
		if ($data_check=="customer_master") {
			$table="customer_master";
			$columns=array("customer_name","customer_code","customer_email","customer_phone");
			$table_id="customer_id";
		}
		if ($data_check=="billing_master") {
			$table="billing_master";
			$columns=array("stock_code","billing_description","billing_uom","gst_code","billing_type");
			$join_table=array("gst_master");
			$join_condition=array('gst_master.gst_id=billing_master.gst_id');
			$table_id="billing_id";
		}
		if ($data_check=="salesman_master") {
			$table="salesman_master";
			$columns=array("s_name","s_category","s_note");
			$table_id="s_id";	
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

			if($data_check=="forex_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->currency_name;
				$row[] = $person->currency_description;
				$row[] = $person->currency_rate;
			}

			if($data_check=="country_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->country_code;
				$row[] = $person->country_name;
			}

			if($data_check=="gst_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->gst_code;
				$row[] = $person->gst_rate;
				$row[] = $person->gst_type;
				$row[] = $person->gst_description;
			}

			if($data_check=="customer_master")
			{
				$row[] = $person->table_id;
				$row[] = $person->customer_name;
				$row[] = $person->customer_code;
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
