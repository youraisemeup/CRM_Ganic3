<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Manage_employee extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="users";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/ajax/manage_employee/';
		}
		public function add()
		{
			is_ajax();
			$where=array('name!=' =>"TOPFORM MANAGMENT");
			$this->data['group_options']=$this->custom->createDropdown("groups",array('id','name'),"Employee Group",$where);
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
				$post['level']=$this->custom->getSingleValue('groups','name',array('id' =>$post['group_id']));
				$id=$this->ion_auth->register($post['username'],$post['password'],$post['email'],array("emp_name"=>$post['emp_name'],'group_id'=>$post['group_id'],'level'=>$post['level']),array($post['group_id']));
				if(is_integer($id)){	
					
					set_flash_message('message','success',"Employee Inserted Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('staff_management/manage_employee');
			}
			else
			{
				show_404();
			}
		}
		public function update()
		{
			$post=$this->input->post();
			d($post);
			if($post)
			{
				$id = $post['id'];
				unset($post['id']);
				if($this->ion_auth->remove_from_group($post['old_group_id'],$id)){
					d($this->ion_auth->remove_from_group($post['old_group_id'],$id));
					d($this->db->last_query());
					if($this->ion_auth->add_to_group($post['group_id'],$id)){
						unset($post['old_group_id']);
						$post['level']=strtolower($this->custom->getSingleValue('groups','name',array('id' =>$post['group_id'])));
						$result = $this->ion_auth->update($id,$post);
					}
				}
				if($result){
					
					set_flash_message('message','success',"Employee Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('staff_management/manage_employee');
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
				$this->data['user'] = $row;
				$where=array('name!=' =>"TOPFORM MANAGMENT");
				$this->data['group_options']=$this->custom->createDropdown("groups",array('id','name'),"Employee Group",$where,$row->group_id);
			}	
		}

	}

?>