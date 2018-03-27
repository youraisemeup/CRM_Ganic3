<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Manage_group extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="groups";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/ajax/manage_group/';
			$this->data["per"]=$per=$this->custom->getRows("security_master");
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
				$insert_array['name']=$post['name'];
				$insert_array['description']=$post['description'];
				for ($i=0; $i <count($per) ; $i++) { 
					if (!isset($post[$per[$i]])) {
						$per_data[$per[$i]]=0;
					}
					else{
						$per_data[$per[$i]]=1;	
					}
				}
				$insert_array['permissions']=json_encode($per_data);
				$id = $this->custom->insertRow($this->table,$insert_array);
				if($id != "error"){	
					
					set_flash_message('message','success',"Group Inserted Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('admin/manage_group');
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
				$where = array('id'=>$id);
				$update_array['name']=$post['name'];
				$update_array['description']=$post['description'];
				for ($i=0; $i <count($per) ; $i++) { 
					if (!isset($post[$per[$i]])) {
						$per_data[$per[$i]]=0;
					}
					else{
						$per_data[$per[$i]]=1;	
					}
				}
				$update_array['permissions']=json_encode($per_data);
				$result = $this->custom->updateRow($this->table,$update_array,$where);
				if($result){
					
					set_flash_message('message','success',"Group Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('admin/manage_group');
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
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}
		function fetchData(){
			is_ajax();
			$id=$this->input->post('rowID');

			$row = $this->custom->getSingleRow($this->table,array('id' => $id));
			if($row)
			{
				$this->data['group'] = $row;
			}	
		}

	}

?>