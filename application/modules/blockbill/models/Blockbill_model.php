<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blockbill_model extends CI_Model {
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

    public function convert_date($date,$months = 0,$days = 0){
        $strtotime_str = $date;
        if ($months != 0) {
            $strtotime_str .= ' '.$months.' Month';
        }
        if ($days != 0) {
            $strtotime_str .= ' '.$days.' Day';
        }
        return Date("Y-m-d", strtotime($strtotime_str));// 2013-01-31
        //echo Date("Y-m-d", strtotime("2013-01-01 +1 Month -1 Day"));// 2013-01-31
    }

}

?>