<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable_model extends CI_Model {

	// var $table = 'subject';
	// var $column_order =  array('Sub_name','dept_id'); //set column field database for datatable orderable
	// var $column_search = array('Sub_name','dept_id'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	//var $order = array('id' => 'desc'); // default order 
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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
				if($_POST['search']['value']) // if datatable send POST for search
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
		if($_POST['length'] != -1)
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

	function count_filtered($table,$columns,$join_table=NULL,$join_condition=NULL,$where=null,$table_id="id")
	{
		$this->_get_datatables_query($table,$columns,$join_table,$join_condition,$where,$table_id);
		if(is_array($table) && array_key_exists("SQL", $table))
		{
			$sql = $table['SQL'];
			$query = $this->db->query($sql);
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->get();
			return $query->num_rows();
		}
		
	}

	public function count_all($table)
	{
		if(is_array($table) && array_key_exists("SQL", $table))
		{
			$this->db->from($table['TABLE']);
		}
		else
		{
			$this->db->from($table);
		}
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}


}
