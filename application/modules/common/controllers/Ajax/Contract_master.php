<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Contract_master extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="contract_master";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/ajax/contract_master/';
		}
		public function add()
		{
			is_ajax();
			$contract_type_arr = array("M","Q","H","Y");
			$this->data['contract_type_options']=createSimpleDropdown($contract_type_arr,"Contract Type");
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
				$id = $this->custom->insertRow($this->table,$post);
				if($id != "error"){	
					
					set_flash_message('message','success',"Contract Inserted Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('combo_tables/contract_master');
			}
			else
			{
				show_404();
			}
		}
		public function update()
		{
			$post=$this->input->post();
			if($post)
			{
				$id = $post['contract_id'];
				unset($post['contract_id']);
				$where = array('contract_id'=>$id);
				$result = $this->custom->updateRow($this->table,$post,$where);
				if($result){
					
					set_flash_message('message','success',"Contract Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('combo_tables/contract_master');
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
			$where = array('contract_id' => $id);
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}
		function fetchData(){
			is_ajax();
			$id=$this->input->post('rowID');

			$row = $this->custom->getSingleRow($this->table,array('contract_id' => $id));
			if($row)
			{
				$this->data['contract'] = $row;
				$contract_type_arr = array("M","Q","H","Y");
				$this->data['contract_type_options']=createSimpleDropdown($contract_type_arr,"Contract Type",$row->contract_type);
			}	
		}

	}

?>