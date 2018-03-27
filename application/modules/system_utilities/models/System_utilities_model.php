<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class System_utilities_model extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_customer_master()
    { 
		return $result=$this->custom->getRows("customer_master");
    }

    public function get_company_profile()
    {
        return $result=$this->custom->getRows("company_profile");
    }

    private function _get_datatables_query($table,$column_order,$join_table,$join_condition,$where,$table_id)
    {
        //d($table_id);
        $column_search=$column_order;
        if(is_array($table) && array_key_exists("SQL", $table))
        {
            $sql = $table['SQL'];
            //$this->db->query($sql);
        }
        else
        {
            if (!is_null($join_table) && !is_null($join_condition) && !is_null($where)) {
                $this->db->select(" *  , $table.$table_id AS table_id")->from($table)->where($where);
                for ($i=0; $i <count($join_table) ; $i++) { 
                    $this->db->join($join_table[$i],$join_condition[$i]);
                }
            }
            elseif (!is_null($join_table) && !is_null($join_condition)) {
                //d(count($join_table));
                $this->db->select(" *  , $table.$table_id AS table_id")->from($table);
                for ($i=0; $i <count($join_table) ; $i++) { 
                    $this->db->join($join_table[$i],$join_condition[$i]);
                }
            }
            elseif (!is_null($where)){
                $this->db->select(" *  , $table.$table_id AS table_id")->from($table)->where($where);   
            }
            else{
                $this->db->select(" *  , $table.$table_id AS table_id")->from($table);
            }
        }
            $i = 0;
            foreach ($column_search as $item) // loop column 
            {
                if(isset($_POST['search']['value'])) // if datatable send POST for search
                {
                    
                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }
            
            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->order))
            {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        
        
    }

    function get_datatables($table,$columns,$join_table=NULL,$join_condition=NULL,$where=NULL,$table_id="id")
    {
        $this->_get_datatables_query($table,$columns,$join_table,$join_condition,$where,$table_id);
        if(isset($_POST['length']) && $_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
            $limit = " LIMIT ".$_POST['start'].",".$_POST['length'];    
        }
        
        if(is_array($table) && array_key_exists("SQL", $table))
        {
            $sql = $table['SQL'];
            $sql = $sql.$limit;
            $query = $this->db->query($sql);
            return $query->result();
            
        }
        else
        {   
            $query = $this->db->get();
            // echo $this->db->last_query();
            return $query->result();
        }
    }
}

?>