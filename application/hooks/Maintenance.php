<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Maintenance {
  var $CI;
  public function maintenance_start($allowed) {
    
     $this->CI = & get_instance();
     
     // Load custom config file
     $this->CI->config->load('maintenance_config'); 

     // if site_under_maintenance is TRUE then load maintenance view
     if ($this->CI->config->item("site_under_maintenance")) {
        //get client ip address
        $client_ip=$this->CI->input->ip_address();
        
        //if whilelist ip is not there then show maintenance mode.
        if(!in_array($client_ip,$allowed)){
        	echo $this->CI->load->view('maintenance_view', '', TRUE);
            die();
        }
        
     }
  }
}
?>