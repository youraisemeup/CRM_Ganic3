<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Autobill_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    public function get_customer_details($where)
    { 
		return $result=$this->custom->getSingleRow("customer_master",$where);
		
    }

    public function get_contract_details($where)
    {
        return $result=$this->custom->getSingleRow("contract_master",$where);
    }

}

?>