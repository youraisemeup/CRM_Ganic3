<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Common extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();
	    }
	
	    public function index()
		{
			if ($this->ion_auth->logged_in()) {
				if ($this->ion_auth->is_admin()) {
					redirect('admin/dashboard');
				}
				else if ($this->session->level=="user")
				{
					redirect('user/dashboard');
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

	}
