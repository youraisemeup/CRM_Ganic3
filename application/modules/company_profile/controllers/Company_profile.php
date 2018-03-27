<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Company_profile extends MY_Controller {
	
		public function index($action="view")
		{
			is_logged_in("admin");
			$this->body_file="company_profile.php";
			$where=array('profile_id'=>1);
			$this->body_vars['company_details']=$company_details=$this->custom->getSingleRow('company_profile',$where);
			if($action=="view"){
			}
			if($action=="edit"){
				has_permission();
				$this->body_vars['save_url']=base_url('company_profile/index/save');
				$this->body_vars['currency_options']=$this->custom->createDropdownSelect("currency",array('iso','iso','name'),"Currency",array("-"," "),'',array($company_details->default_currency));
				$this->body_file="company_profile_edit.php";
			}
			if($action=="save"){
				$post=$this->input->post();
				if($_FILES['company_logo']['name']!=""){
					$data=file_upload("logo","company_logo","site");
					if($data["status"]){
						$post['company_logo']=$data['upload_data']['file_name'];
					}
					else{
						$message=$data['error'];
					}
				}
				$res=$this->custom->updateRow("company_profile",$post,$where);
				
				if(!isset($message)){
					if($res!="error"){
						set_flash_message('message','success',"Company Profile Updated Successfully");
					}
					else{
						set_flash_message('message','danger',"Something Went Wrong");	
					}
				}
				else{
					set_flash_message('message','warning',$message);
				}
				redirect('company_profile','refresh');
			}
		}
	
	}
		
/*End of file Company_profile.php */
/* Location: ./application/modules/new_modules/company_profile/controllers/Company_profile.php */