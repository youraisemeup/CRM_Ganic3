<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		
	class Dashboard extends MY_Controller {
		
		public function index()
		{
			is_logged_in("admin");
			$this->body_file="dashboard.php";
		}

		public function change_password($mode="form")
		{
			is_logged_in("admin");
			if ($mode=="form") {
				$this->body_vars['admin_options_identity']=$this->custom->createDropdownSelect("users",array('id','username'),"Admin Idendity",array(''),array('level' => 'admin'));
			}
			else if ($mode=="save") {
				$data=$this->input->post();
				$identity = $this->custom->getSingleValue("users","username",array("id" => $data['identity']));
				if($this->ion_auth->change_password($identity, $data['old_password'], $data['new_password'])){
					set_flash_message("data","success","Password Change Successfully");
					redirect("common/signout/admin");
				}
				else{
					set_flash_message("message","danger","Your Old Password is Not Correct");
					redirect("admin/change_password");
				}
			}
		}

		public function configuration()
	    {
	    	is_logged_in("admin");
	    	has_permission();
	    	$this->body_vars['buttonsPanel'] = buttonsPanel();
        	$this->buttonURLs('configuration');
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
		
		/*End of file Dashboard.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Dashboard.php */