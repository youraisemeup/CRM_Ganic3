<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Configuration extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="users";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/ajax/configuration/';
		}
		public function add()
		{
			is_ajax();
			$where=array('`level` = "admin" AND `conf_id` IS NULL'=>null );
			$where_conf = array('`conf_name` != "configuration admin"' => null );
			//$where=array('LEVEL = 'admin' AND conf_id IS NULL');
			$user = $this->session->level;
			
			$this->data['admin_username_options']=$this->custom->createDropdown("users",array('id','username'),"Admin Username",$where);
			$this->data['config_options']=$this->custom->createDropdown("configuration_master",array('id','conf_name'),"Configuration Group",$where_conf);
			$this->load->view($this->view_path.'add',$this->data);
		}
		public function edit()
		{
			$this->fetchData();
			$this->data['mode'] = "edit";
			$this->load->view($this->view_path.'edit',$this->data);
		}
		public function view()
		{
			$this->fetchData();
			$this->data['mode'] = "view";
			$this->load->view($this->view_path.'edit',$this->data);
		}

		public function save()
		{
			$post=$post=$this->input->post();
			if($post)
			{

				$where = array('id' => $post['user_id']); 
				$configuration_name=$this->custom->getSingleValue('configuration_master','conf_name',array('id' =>$post['conf_id']));
				$result = $this->custom->updateRow("users",array('conf_id' => $post['conf_id']),$where);
				
				if(isset($result)){	
					
					set_flash_message('message','success',"Configuration Set Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('dashboard/configuration');
			}
			else
			{
				show_404();
			}
		}
		public function update()
		{
			$post=$this->input->post();
			// d($post);
			if($post)
			{
				//var_dump($post['user_id']);exit();
				$where = array('id' => $post['user_id']); 
				$configuration_name=$this->custom->getSingleValue('configuration_master','conf_name',array('id' =>$post['conf_id']));
				$result = $this->custom->updateRow("users",array('conf_id' => $post['conf_id']),$where);
				if($result){
					
					set_flash_message('message','success',"Configuration Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('dashboard/configuration');
			}
			else
			{
				show_404();
			}
		}
		public function delete()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('id' => $id);
			$result = $this->custom->deleteRow("users",$where);
			echo $result;
		}
		function fetchData(){
			is_ajax();
			$id=$this->input->post('rowID');

			$conf_id = $this->custom->getSingleValue("users","conf_id",array('id' => $id));
			if($conf_id)
			{
				$this->data['admin_username_options']=$this->custom->createDropdown("users",array('id','username'),"Admin Username",array('level'=>'admin'),$id);
				$this->data['config_options']=$this->custom->createDropdown("configuration_master",array('id','conf_name'),"Configuration Group",array(),$conf_id);
			}	
		}

	}

?>