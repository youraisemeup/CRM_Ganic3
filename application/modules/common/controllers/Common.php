<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Common extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();
	    }
	
	    public function index()
		{
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			
			if ($this->ion_auth->logged_in()) {
				if ($this->ion_auth->is_admin()) {
					redirect('dashboard');
				}
				else if ($this->session->level)
				{
					redirect('dashboard');
				}
				else{
					$this->load->view('index');	
				}
			}
			else{
				$this->load->view('index');
			}
		}

	    public function login_check()
		{
			$data=$this->input->post();
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->config->set_item('identity', 'email');
			if($this->ion_auth->login($data['username'],$data['password'])){
				$data=$this->ion_auth->user()->result()[0];
				$this->session->set_userdata('level',$data->level);
				$this->session->set_userdata('group_id',$data->group_id);
				$this->session->set_userdata('conf_id',$data->conf_id);
				if ($this->ion_auth->is_admin()) {
					echo "Admin";
				}
				else{
					echo $data->level;
				}
			}
			else{
				echo "Fail";
			}
		}

		public function signout()
		{
			$this->ion_auth->logout();
			redirect("");
		}

			public function forgot_password()
			{
				$email=$this->input->post('username');
				if ($email!="") {
					$identity=$email;
					$identity=$this->ion_auth->get_user_by_email($email)->result()[0]->username;
					if (!$this->ion_auth->email_check($email)){
						echo "Email Not Registered";
						set_flash_message("message","danger","Email Not Registered");
						//redirect('');
					}
					else{
						$forgotten = $this->ion_auth->forgotten_password($identity);
						if ($forgotten) { //if there were no errors
							echo $this->ion_auth->messages();
							$this->session->set_flashdata('message',"");
							//d($forgotten);
							//redirect("", 'refresh'); //we should display a confirmation page here instead of the login page
						}
						else {
							echo $this->ion_auth->messages().' '.$this->ion_auth->errors();
							set_flash_message("message","info",$this->ion_auth->messages());
							//redirect("", 'refresh');
						}
					}
				}
				else{
					echo "Email is required";
					set_flash_message("message","danger","Email is required");
						//redirect('');	
				}
			}

	}
