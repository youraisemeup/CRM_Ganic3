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
				
			}
			else if ($mode=="save") {
				$data=$this->input->post();
				if($this->ion_auth->change_password($data['identity'], $data['old_password'], $data['new_password'])){
					set_flash_message("data","success","Password Change Successfully");
					redirect("common/signout/admin");
				}
				else{
					set_flash_message("message","danger","Your Old Password is Not Correct");
					redirect("admin/change_password");
				}
			}
		}
		
		}
		
		/*End of file Dashboard.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/Dashboard.php */