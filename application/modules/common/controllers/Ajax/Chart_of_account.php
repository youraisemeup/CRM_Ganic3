<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Chart_of_account extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{
			parent::__construct();
			
			$this->table="chart_of_account";
			$this->logged_id = $this->session->user_id;
			$this->view_path = 'common/Ajax/chart_of_account/';
		}
		public function add()
		{
			is_ajax();
			$this->data['prefix_code_options']=$this->custom->createDropdownSelect("chart_of_account_prefix",array('coa_pre_id','coa_pre_character','coa_pre_description'),"Code Prefix",array("-"," "));

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
					
					set_flash_message('message','success',"Account Inserted Successfully");
				}		
				else
				{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('combo_tables/chart_of_account');
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
				$id = $post['coa_id'];
				unset($post['coa_id']);
				$where = array('coa_id'=>$id);
				$result = $this->custom->updateRow($this->table,$post,$where);
				if($result){
					
					set_flash_message('message','success',"Account Updated Successfully");
				}
				else{
					set_flash_message('message','danger',"Something Went Wrong !!");
				}
				redirect('combo_tables/chart_of_account');
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
			$where = array('coa_id' => $id);
			$result = $this->custom->deleteRow($this->table,$where);
			echo $result;
		}
		function fetchData(){
			is_ajax();
			$id=$this->input->post('rowID');

			$row = $this->custom->getSingleRow($this->table,array('coa_id' => $id));
			if($row)
			{
				$this->data['account'] = $row;
				$this->data['prefix_code_options']=$this->custom->createDropdownSelect("chart_of_account_prefix",array('coa_pre_id','coa_pre_character','coa_pre_description'),"Code Prefix",array("-"," "),array(),array($row->coa_prefix));
			}	
		}

	}

?>