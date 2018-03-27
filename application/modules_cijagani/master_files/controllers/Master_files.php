<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class Master_files extends MY_Controller {
		
			public function customer_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('customer_master');
			}
			public function billing_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('billing_master');
			}
			public function salesman_master()
			{
				is_logged_in('admin');
				has_permission();
				$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('salesman_master');
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
		
		/*End of file Master_files.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Master_files.php */