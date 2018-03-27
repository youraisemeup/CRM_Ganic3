<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class Combo_tables extends MY_Controller {

			public function m_create()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('m_create');
			}	
		
			public function forex_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel(1,1,1,1,1,1,1,1);
	        	$this->buttonURLs('forex_master');
			}
			public function gst_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('gst_master');
			}
			public function country_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('country_master');
			}
			/*----------------------Other Payment chart of account Start--------------*/
			public function chart_of_account()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('chart_of_account');
			}
			public function payee_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('payee_master');
			}
			public function contract_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('contract_master');
			}
			
			/*----------------------Other Payment chart of account End--------------*/
			function buttonURLs($class)
		    {
		        $this->body_vars['new_url']    = base_url('common/Ajax/' . $class . '/add');
		        $this->body_vars['save_url']   = base_url('common/Ajax/' . $class . '/save');
		        $this->body_vars['edit_url']   = base_url('common/Ajax/' . $class . '/edit');
		        $this->body_vars['update_url'] = base_url('common/Ajax/' . $class . '/update');
		        $this->body_vars['view_url']   = base_url('common/Ajax/' . $class . '/view');
		        $this->body_vars['delete_url'] = base_url('common/Ajax/' . $class . '/delete');
		        $this->body_vars['m_create_url'] = base_url('common/Ajax/' . $class . '/mcreate_add');

		    }
		
		}
		 
		/*End of file Combo_tables.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Combo_tables.php */