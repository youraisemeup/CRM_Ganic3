<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Gst_master extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="gst_master";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/ajax/gst_master/';
		}
		public function add()
		{
			is_ajax();
			$gst_type_arr = array("Purchase","Supply");
			$this->data['gst_type_options']=createSimpleDropdown($gst_type_arr,"GST Type");
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
					
					set_flash_message('message','success',"GST Inserted Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('combo_tables/gst_master');
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
				$where = array('gst_id'=>$id);
				$result = $this->custom->updateRow($this->table,$post,$where);
				if($result){
					
					set_flash_message('message','success',"GST Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('combo_tables/gst_master');
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
			$where = array('gst_id' => $id);
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}
		function fetchData(){
			is_ajax();
			$id=$this->input->post('rowID');

			$row = $this->custom->getSingleRow($this->table,array('gst_id' => $id));
			if($row)
			{
				$this->data['gst'] = $row;
				$gst_type_arr = array("Purchase","Supply");
				$this->data['gst_type_options']=createSimpleDropdown($gst_type_arr,"GST Type",$row->gst_type);
			}	
		}

	}

?>