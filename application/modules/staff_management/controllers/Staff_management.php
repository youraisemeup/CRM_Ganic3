<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class Staff_management extends MY_Controller {
		
			 public function manage_group()
		    {
		    	is_logged_in("admin");
		    	has_permission();
		    	$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('manage_group');
		    }
		    public function manage_employee()
		    {
		    	is_logged_in("admin");
		    	has_permission();
		    	$this->body_vars['buttonsPanel'] = buttonsPanel();
	        	$this->buttonURLs('manage_employee');
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
		
		/*End of file Staff_management.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Staff_management.php */