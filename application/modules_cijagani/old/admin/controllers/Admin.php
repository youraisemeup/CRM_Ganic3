<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Admin extends MY_Controller {
	
	    function __construct() {
	        parent::__construct();
	    }
	
	 //    public function index()
		// {
		// 	if ($this->ion_auth->logged_in()) {
		// 		if ($this->ion_auth->is_admin()) {
		// 			redirect('admin/dashboard');
		// 		}
		// 		else if ($this->session->level=="user")
		// 		{
		// 			redirect('user/dashboard');
		// 		}
		// 		else{
		// 			$this->load->view('index');	
		// 		}
		// 	}
		// 	else{
		// 		$this->load->view('index');
		// 	}
		// }
	    // public function dashboard()
	    // {
	    // 	is_logged_in("admin");
	    // }
	    public function manage_group()
	    {
	    	is_logged_in("admin");
	    	has_permission();
	    	$this->body_vars['buttonsPanel'] = buttonsPanel();
        	$this->buttonURLs('manage_group');
	    }
	    public function manage_employee()
	    {
	    	is_logged_in("admin");
	    	has_permission();
	    	$this->body_vars['buttonsPanel'] = buttonsPanel();
        	$this->buttonURLs('manage_employee');
	    }
	    public function quotation_setting()
		{
			is_logged_in('admin');
			has_permission();
		}
		// public function company_profile($action="view")
		// {
		// 	is_logged_in('admin');
		// 	$where=array('profile_id'=>1);
		// 	$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$where);
		// 	if($action=="view"){
		// 	}
		// 	if($action=="edit"){
		// 		has_permission();
		// 		$this->body_vars['save_url']=base_url('admin/company_profile/save');
		// 		$this->body_vars['currency_options']=$this->custom->createDropdownSelect("currency",array('iso','iso','name'),"Currency",array("-"," "),'',array($company_details->default_currency));
		// 		$this->body_file="admin/company_profile_edit.php";
		// 	}
		// 	if($action=="save"){
		// 		$post=$this->input->post();
		// 		if($_FILES['company_logo']['name']!=""){
		// 			$data=file_upload("logo","company_logo","site");
		// 			if($data["status"]){
		// 				$post['company_logo']=$data['upload_data']['file_name'];
		// 			}
		// 			else{
		// 				$message=$data['error'];
		// 			}
		// 		}
		// 		$res=$this->custom->updateRow("company_profile",$post,$where);
		// 		if(!isset($message)){
		// 			if($res!="error"){
		// 				set_flash_message('message','success',"Company Profile Updated Successfully");
		// 			}
		// 			else{
		// 				set_flash_message('message','danger',"Something Went Wrong");	
		// 			}
		// 		}
		// 		else{
		// 			set_flash_message('message','warning',$message);
		// 		}
		// 		redirect('admin/company_profile','refresh');
		// 	}
		// }
		// public function customer_master()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_vars['buttonsPanel'] = buttonsPanel();
  //       	$this->buttonURLs('customer_master');
		// }
		// public function billing_master()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_vars['buttonsPanel'] = buttonsPanel();
  //       	$this->buttonURLs('billing_master');
		// }
		// public function salesman_master()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_vars['buttonsPanel'] = buttonsPanel();
  //       	$this->buttonURLs('salesman_master');
		// }
		// public function forex_master()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_vars['buttonsPanel'] = buttonsPanel();
  //       	$this->buttonURLs('forex_master');
		// }
		// public function gst_master()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_vars['buttonsPanel'] = buttonsPanel();
  //       	$this->buttonURLs('gst_master');
		// }
		// public function country_master()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_vars['buttonsPanel'] = buttonsPanel();
  //       	$this->buttonURLs('country_master');
		// }
		public function quotation()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function pending_quotation()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function confirm_quotation()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function rejected_quotation()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function pending_order()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function confirm_order()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function rejected_order()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function delivery_pending_order()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function delivery_confirm_order()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function delivery_rejected_order()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function pending_invoice()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function confirm_invoice()
		{
			is_logged_in('admin');
			has_permission();
		}
		public function rejected_invoice()
		{
			is_logged_in('admin');
			has_permission();
		}
		// public function change_password($mode="form")
		// {
		// 	is_logged_in("admin");
		// 	if ($mode=="form") {
				
		// 	}
		// 	else if ($mode=="save") {
		// 		$data=$this->input->post();
		// 		if($this->ion_auth->change_password($data['identity'], $data['old_password'], $data['new_password'])){
		// 			set_flash_message("data","success","Password Change Successfully");
		// 			redirect("common/signout/admin");
		// 		}
		// 		else{
		// 			set_flash_message("message","danger","Your Old Password is Not Correct");
		// 			redirect("admin/change_password");
		// 		}
		// 	}
		// }
		// public function backup_database()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_file="common/blank.php";
		// 	databaseBackup();
		// 	redirect('admin/dashboard','refresh');
		// }
		// public function initialize_database()
		// {
		// 	is_logged_in('admin');
		// 	has_permission();
		// 	$this->body_file="common/blank.php";
		// 	databaseInitialize();
		// 	redirect('admin/dashboard','refresh');
		// }
		// public function restore_database($action="form")
		// {
		// 	is_logged_in('admin');
		// 	// has_permission();
		// 	if($action=="form"){
		// 		$this->body_vars['save_url']= base_url('admin/restore_database/save');
		// 	}
		// 	if ($action=="save") {
		// 		$data=file_upload(date('YmdHis'),"db_file","database_restore_files");
		// 		$this->load->helper("file");
		// 		$sql_file=$data["upload_data"]['full_path'];
		// 		$query_list = explode(";", read_file($sql_file));
		// 		// d($query_list);
		// 		foreach($query_list as $query):
		// 			$query=trim($query);
		// 			if($query!=""){
  //    					$this->db->query($query);
  //    				}
  //    			endforeach;
  //    			set_flash_message('message','success',"System Restored Successfully");    
  //    			redirect('admin/restore_database','refresh');
		// 	}
		// }
		// function buttonURLs($class)
	 //    {
	 //        $this->body_vars['new_url']    = base_url('common/Ajax/' . $class . '/add');
	 //        $this->body_vars['save_url']   = base_url('common/Ajax/' . $class . '/save');
	 //        $this->body_vars['edit_url']   = base_url('common/Ajax/' . $class . '/edit');
	 //        $this->body_vars['update_url'] = base_url('common/Ajax/' . $class . '/update');
	 //        $this->body_vars['view_url']   = base_url('common/Ajax/' . $class . '/view');
	 //        $this->body_vars['delete_url'] = base_url('common/Ajax/' . $class . '/delete');
	 //    }
	}
