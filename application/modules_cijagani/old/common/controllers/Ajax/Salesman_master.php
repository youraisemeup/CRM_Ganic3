<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Salesman_master extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="salesman_master";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/ajax/salesman_master/';
		}
		public function add()
		{
			is_ajax();
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
					
					set_flash_message('message','success',"Sales Person Inserted Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('admin/salesman_master');
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
				$id = $post['id'];
				unset($post['id']);
				$where = array('s_id'=>$id);
				$result = $this->custom->updateRow($this->table,$post,$where);
				if($result){
					
					set_flash_message('message','success',"Sales Person Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('admin/salesman_master');
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
			$where = array('s_id' => $id);
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}
		function fetchData(){
			is_ajax();
			$id=$this->input->post('rowID');

			$row = $this->custom->getSingleRow($this->table,array('s_id' => $id));
			if($row)
			{
				$this->data['salseman_data'] = $row;
			}	
		}

	}

?>