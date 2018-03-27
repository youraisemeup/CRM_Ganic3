<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class Combo_tables extends MY_Controller {
		
			public function forex_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
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
			function buttonURLs($class)
		    {
		        $this->body_vars['new_url']    = base_url('common/Ajax/' . $class . '/add');
		        $this->body_vars['save_url']   = base_url('common/Ajax/' . $class . '/save');
		        $this->body_vars['edit_url']   = base_url('common/Ajax/' . $class . '/edit');
		        $this->body_vars['update_url'] = base_url('common/Ajax/' . $class . '/update');
		        $this->body_vars['view_url']   = base_url('common/Ajax/' . $class . '/view');
		        $this->body_vars['delete_url'] = base_url('common/Ajax/' . $class . '/delete');
		    }
		
		}
		
		/*End of file Combo_tables.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Combo_tables.php */