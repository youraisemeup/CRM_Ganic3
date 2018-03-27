<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Billing_master extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="billing_master";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/ajax/billing_master/';
		}
		public function add()
		{
			is_ajax();
			$this->data['gst_options']=$this->custom->createDropdownSelect("gst_master",array('gst_id','gst_code'),"GST");
			$this->data['stock_options']=createSimpleDropdown(array("YES","NO"),"");
			$this->data['bill_type_options']=createSimpleDropdown(array("Service","Product"),"Bill Type");
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
					
					set_flash_message('message','success',"Bill Inserted Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('master_files/billing_master');
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
				$where = array('billing_id'=>$id);
				$result = $this->custom->updateRow($this->table,$post,$where);
				if($result){
					
					set_flash_message('message','success',"Bill Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('master_files/billing_master');
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
			$where = array('billing_id' => $id);
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}
		function fetchData(){
			is_ajax();
			$id=$this->input->post('rowID');

			$row = $this->custom->getSingleRow($this->table,array('billing_id' => $id));
			if($row)
			{
				$this->data['billing_data'] = $row;
				$this->data['gst_options']=$this->custom->createDropdownSelect("gst_master",array('gst_id','gst_code'),"GST",array(" "),'',array($row->gst_id));
				$this->data['stock_options']=createSimpleDropdown(array("YES","NO"),"",$row->billing_update_stock);
				$this->data['bill_type_options']=createSimpleDropdown(array("Service","Product"),"Bill Type",$row->billing_type);
			}	
		}

	}

?>