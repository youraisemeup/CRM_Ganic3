<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
		
	class System_utilities extends MY_Controller {
		
		public function backup_database()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			databaseBackup();
			redirect('dashboard','refresh');
		}
		public function initialize_database()
		{
			is_logged_in('admin');
			has_permission();
			$this->body_file="common/blank.php";
			databaseInitialize();
			redirect('dashboard','refresh');
		}
		public function restore_database($action="form")
		{
			is_logged_in('admin');
			// has_permission();
			if($action=="form"){
				$this->body_vars['save_url']= base_url('system_utilities/restore_database/save');
			}
			if ($action=="save") {
				$data=file_upload(date('YmdHis'),"db_file","database_restore_files");
				$this->load->helper("file");
				// d($data);
				if($data['status']){
					$sql_file=$data["upload_data"]['full_path'];
					$query_list = explode(";", read_file($sql_file));
					d($query_list);
					foreach($query_list as $query):
						$query=trim($query);
						if($query!=""){
	     					$this->db->query($query);
	     				}
	     			endforeach;
	     			set_flash_message('message','success',"System Restored Successfully");
     			}
     			else{
     				set_flash_message('message','warning',$data["error"]);	
     			}
     			redirect('system_utilities/restore_database','refresh');
			}
		}
		
	}
		
		/*End of file System_utilities.php */
		/* Location: ./application/modules/new_modules/company_profile/controllers/System_utilities.php */