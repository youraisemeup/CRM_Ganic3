 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Custom_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
        
    }
    public function getRows($table, $where = array(), $or_where = array(),$group_by=NULL)
    {
        $this->db->select("*");
        $this->db->where($where);
        if (is_array($or_where)) {
            $this->db->or_where($or_where);
        }
        if(!is_null($group_by)){
             $this->db->group_by($group_by); 
        }
        $query = $this->db->get($table);
        return $query->result();
    }
    public function getRowsSorted($table, $where = array(), $or_where = array(), $sort_column = "id", $sort = "ASC",$limit="")
    {
        $this->db->select("*");
        $this->db->where($where);
        if (is_array($or_where)) {
            $this->db->or_where($or_where);
        }
        if ($limit!="") {
            $this->db->limit($limit);
        }
        $this->db->order_by($sort_column . ' ' . $sort);
        $query = $this->db->get($table);
        return $query->result();
    }
    public function getRowsWhereJoin($table, $where, $join, $join_condition)
    {
        $this->db->select(" * ")->from($table)->where($where);
        for ($i = 0; $i < count($join); $i++) {
            $this->db->join($join[$i], $join_condition[$i]);
        }
        $query = $this->db->get();
        return $query->result();
        //d($this->db->last_query());
    }
    public function getDistinctRows($table, $where = array(), $or_where = array(), $distinct_column)
    {
        $this->db->select("DISTINCT($distinct_column)");
        //$this->db->select("*");
        $this->db->where($where);
        if (is_array($or_where)) {
            $this->db->or_where($or_where);
        }
        
        $query = $this->db->get($table);
        
        return $query->result();
    }
    
    public function getSingleRow($table, $where = array()) /* get a single row from a table */ 
    {
        $query = $this->db->select("*")->from($table)->where($where)->get();
        // d($this->db->last_query());
        return $query->row();
    }
    public function getTotalCount($table)
    {
        /* get total no.of records count of given table */
        return $this->db->count_all_results($table);
    }
    public function getCount($table, $where = array())
    {
        $query = $this->db->from($table)->where($where)->get();
        return $query->num_rows();
    }
    public function insertRow($table, $data) /* insert new row into a table */ 
    {
        $result = $this->db->insert($table, $data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return "error";
        }
    }
    public function updateRow($table, $data, $where, $or_where = array()) /* update existing row in a table */ 
    {
        $this->db->where($where);
        $this->db->or_where($or_where);
        $result = $this->db->update($table, $data);
        // d($this->db->last_query());
        if ($result) {
            return "updated";
        } else {
            return "error";
        }
    }
    public function deleteRow($table, $where, $or_where = array()) /* delete a row from table */ 
    {
        $this->db->where($where);
        $this->db->or_where($or_where);
        $result = $this->db->delete($table);
        if ($result) {
            return "deleted";
        } else {
            return "error";
        }
    }
    public function getSingleValue($table, $column, $where) /* get single column value from table */ 
    {
        $query = $this->db->select($column)->from($table)->where($where)->get();
        $res   = !empty($query->result());
        if ($res) {
            return $query->row()->$column;
        } else {
            return NULL;
        }
    }
    public function customQuery($query,$return_result=false) /* runs custom query*/ 
    {
        $qry = $this->db->query($query);
        if($return_result)
        {
        
            return $this->getResult($qry);
        }
        else
        {
            return $qry;    
        }
        
    }
    public function getResult($query_result,$array=false)
    {
        if (!empty($query_result->result())) {
            if($array)
            {
                return $query_result->result_array();
            }
            else
            {
                return $query_result->result();    
            }
            
        } else {
            return NULL;
        }
    }
    public function createDropdownWithoutId($table,$columns = array(),$caption = "Value", $where = null, $selected = null)
    {
        $key = $columns[0];
        if ($where != null) {
            $query = $this->db->select($columns)->from($table)->where($where)->get();
        } else {
            $query = $this->db->select($columns)->from($table)->get();
        }
        // if (isset($columns[2])) {
        //     $value1 = $columns[1];
        //     $value2 = $columns[2];
        // } else {
        //     $value = $columns[1];
        // }
        $rows         = $this->getResult($query);
        $drop_options = "";
        if ($rows) {
            if ($selected != null) {
                // foreach ($rows as $row) {
                //     if ($selected == $row->$key) {
                //         if (isset($columns[2])) {
                //             $drop_options .= "<option value='" . $row->$key . "' selected='selected'>" . $row->$value1 . ' ' . $row->$value2 . "</option>";
                //         } else {
                //             $drop_options .= "<option value='" . $row->$key . "' selected='selected'>" . $row->$value . "</option>";
                //         }
                //     } else {
                //         if (isset($columns[2])) {
                //             $drop_options .= "<option value='" . $row->$key . "'>" . $row->$value1 . ' ' . $row->$value2 . "</option>";
                //         } else {
                //             $drop_options .= "<option value='" . $row->$key . "'>" . $row->$value . "</option>";
                //         }
                //     }
                    
                // }
            } else {
                foreach ($rows as $row) {
                    // d($row->$value2);
                    if (isset($columns[2])) {
                        $drop_options .= "<option value='" . $row->$key . "'>" . $row->$value1 . ' ' . $row->$value2 . "</option>";
                    } else {
                        $drop_options .= "<option value='" . $row->$key . "'>";
                    }
                }
            }
        }
        return $drop_options;
    }
    public function createDropdown($table, $columns = array(), $caption="Value", $where = null, $selected = null) // $columns = array with two columns name of table , from one column will be key and other value of options of dropdown. $selected = key value from $columns array.
    {
        $key = $columns[0];
        if ($where != null) {
            $query = $this->db->select($columns)->from($table)->where($where)->get();
        } else {
            $query = $this->db->select($columns)->from($table)->get();
        }
        if (isset($columns[2])) {
            $value1 = $columns[1];
            $value2 = $columns[2];
        } else {
            $value = $columns[1];
        }
        $rows         = $this->getResult($query);
        $drop_options = "<option value=''>-- Select ".$caption." --</option>";
        if ($rows) {
            if ($selected != null) {
                foreach ($rows as $row) {
                    if ($selected == $row->$key) {
                        if (isset($columns[2])) {
                            $drop_options .= "<option value='" . $row->$key . "' selected='selected'>" . $row->$value1 . ' ' . $row->$value2 . "</option>";
                        } else {
                            $drop_options .= "<option value='" . $row->$key . "' selected='selected'>" . $row->$value . "</option>";
                        }
                    } else {
                        if (isset($columns[2])) {
                            $drop_options .= "<option value='" . $row->$key . "'>" . $row->$value1 . ' ' . $row->$value2 . "</option>";
                        } else {
                            $drop_options .= "<option value='" . $row->$key . "'>" . $row->$value . "</option>";
                        }
                    }
                    
                }
            } else {
                foreach ($rows as $row) {
                    // d($row->$value2);
                    if (isset($columns[2])) {
                        $drop_options .= "<option value='" . $row->$key . "'>" . $row->$value1 . ' ' . $row->$value2 . "</option>";
                    } else {
                        $drop_options .= "<option value='" . $row->$key . "'>" . $row->$value . "</option>";
                    }
                }
            }
        }
        return $drop_options;
    }
    public function getMaxID_six_digit($table, $column) // get six digit number from specified table and column
    {
        
        $sql     = "SELECT MAX(CAST(SUBSTRING($column,4)AS SIGNED)) AS max_field FROM `$table`";
        $result  = $this->customQuery($sql);
        $row     = $this->getResult($result);
        $count   = $row[0]->max_field;
        $MaxIDVN = $count + 1;
        $MaxIDVN = str_pad($MaxIDVN, 6, '0', STR_PAD_LEFT);
        return $MaxIDVN;
        
    }
    public function get_column_sum($table, $column, $where)
    {
        $this->db->select_sum($column);
        $this->db->where($where);
        $sum_result = $this->db->from($table)->get();
        if (!empty($sum_result->result())) {
            return $sum_result->row($column);
        } else {
            return NULL;
        }
    }
    
    public function checkAvailability($table, $where)
    {
        $query = $this->db->select("*")->from($table)->where($where)->get();
        $count = $query->num_rows();
        if ($count >= 1) {
            return true;
        } else {
            return false;
        }
    }
    public function findInSet($table, $column, $value, $where = null)
    {
        $this->db->select("*");
        $this->db->from($table);
        $find_in_set = array(
            "FIND_IN_SET('$value',$column) !=" => "0"
        );
        if ($where) {
            
            $where = array_merge($where, $find_in_set);
        } else {
            $where = $find_in_set;
        }
        $this->db->where($where);
        $query = $this->db->get();
        //return $this->db->last_query();
        return $query->result();
        
    }
    public function login($username,$password){
        $query = $this->db->select('username, email, id, password')
              ->where(array('username' => $username,'password' => encrypt($password,ENCRYPTION_KEY) ))
              ->limit(1)
              ->order_by('id', 'desc')
              ->get("admin");   
        //echo $this->db->last_query();
        if ($query->num_rows() === 1){
            return true;
        }
        else{
            return false;
        }
        
    }
    public function createDropdownSelect2($table, $columns = array(), $caption="Value",$separator = array(' ') ,$where = null, $selected = array(),$sort_column="",$sort="ASC") 
    {
        // d($where != null);
        if($sort_column==""){
            $sort_column=$columns[1];
        }
        if ($where != null && !is_null($where)) {
             $query = $this->db->select($columns)->from($table)->where($where)->order_by($sort_column . ' ' . $sort)->group_by('currency_type')->get();
        } else {
            $query = $this->db->select($columns)->from($table)->order_by($sort_column . ' ' . $sort)->group_by('currency_type')->get();
        }
        // echo $this->db->last_query();die;
        $id=$columns[0];
        unset($columns[0]);
        $rows         = $this->getResult($query);
        $drop_options = "<option value=''>-- Select ".$caption." --</option>";
        if ($rows) {
            if (!empty($selected)) {
                foreach ($rows as $row) {
                        if (in_array($row->$id,$selected)) {
                                $drop_options .= "<option value='" . $row->$id . "' selected='selected'>";
                                for ($i=1; $i <=count($columns) ; $i++) { 
                                    $col_value=$columns[$i];
                                    $col_sep=$separator[$i-1];
                                    $drop_options .="".$row->$col_value . " $col_sep";
                                }
                                 $drop_options.="</option>";
                        } else {
                                $drop_options .= "<option value='" . $row->$id . "' >";
                                for ($i=1; $i <=count($columns) ; $i++) { 
                                    $col_value=$columns[$i];
                                    $col_sep=$separator[$i-1];
                                    $drop_options .="".$row->$col_value . " $col_sep";
                                }
                                 $drop_options.="</option>";
                        }
                    
                }
            } 
            else {
                foreach ($rows as $row) {
                        $drop_options .= "<option value='" . $row->$id . "'>";
                        for ($i=1; $i <=count($columns) ; $i++) { 
                            $col_value=$columns[$i];
                            $col_sep=$separator[$i-1];
                            $drop_options .="".$row->$col_value . " $col_sep";
                        }
                         $drop_options.="</option>";
                }
            }
        }
        return $drop_options;
    }
    ///////////////////////////////////
    public function createDropdownSelectJoin($table, $columns = array(), $caption="Value",$separator = array(' '),$join = null,$join_condition = null,$where = null, $selected = array(),$sort_column="",$sort="ASC") 
    {
        // d($where != null);
        if($sort_column==""){
            $sort_column=$columns[1];
        }
        if ($where != null && !is_null($where)) {
             $query = $this->db->select($columns)->from($table)->where($where)->order_by($sort_column . ' ' . $sort);
        } else if($join ){
            $query = $this->db->select($columns)->from($table)->order_by($sort_column . ' ' . $sort);
        }
        if ($join != null && !is_null($join)) {
            $this->db->join($join, $join_condition);
        }
        // echo $this->db->last_query();die;
        $query = $this->db->get();
        $id=$columns[0];
        unset($columns[0]);
        $rows         = $this->getResult($query);
        $drop_options = "<option value=''>-- Select ".$caption." --</option>";
        if ($rows) {
            if (!empty($selected)) {
                foreach ($rows as $row) {
                        if (in_array($row->$id,$selected)) {
                                $drop_options .= "<option value='" . $row->$id . "' selected='selected'>";
                                for ($i=1; $i <=count($columns) ; $i++) { 
                                    $col_value=$columns[$i];
                                    $col_sep=$separator[$i-1];
                                    $drop_options .="".$row->$col_value . " $col_sep";
                                }
                                 $drop_options.="</option>";
                        } else {
                                $drop_options .= "<option value='" . $row->$id . "' >";
                                for ($i=1; $i <=count($columns) ; $i++) { 
                                    $col_value=$columns[$i];
                                    $col_sep=$separator[$i-1];
                                    $drop_options .="".$row->$col_value . " $col_sep";
                                }
                                 $drop_options.="</option>";
                        }
                    
                }
            } 
            else {
                foreach ($rows as $row) {
                        $drop_options .= "<option value='" . $row->$id . "'>";
                        for ($i=1; $i <=count($columns) ; $i++) { 
                            $col_value=$columns[$i];
                            
                            $col_sep=$separator[$i-1];
                            $drop_options .="".$row->$col_value . " $col_sep";
                        }
                         $drop_options.="</option>";
                }
            }
        }
        return $drop_options;
    }
    ///////////////////////////////////
    public function createDropdownSelect1($table, $columns = array(), $caption="Value",$separator = array(' ') ,$where = null, $selected = array(),$sort_column="",$sort="ASC") 
    {
        // d($where != null);
        if($sort_column==""){
            $sort_column=$columns[1];
        }
        if ($where != null && !is_null($where)) {
             $query = $this->db->select($columns)->from($table)->where($where)->order_by($sort_column . ' ' . $sort)->get();
        } else {
            $query = $this->db->select($columns)->from($table)->order_by($sort_column . ' ' . $sort)->get();
        }
        // echo $this->db->last_query();die;
        $id=$columns[0];
        unset($columns[0]);
        $rows         = $this->getResult($query);
        $drop_options = "<option value=''>-- Select ".$caption." --</option>";
        if ($rows) {
            if (!empty($selected)) {
                foreach ($rows as $row) {
                        if (in_array($row->$id,$selected)) {
                                $drop_options .= "<option value='" . $row->$id . "' selected='selected'>";
                                for ($i=1; $i <=count($columns) ; $i++) { 
                                    $col_value=$columns[$i];
                                    $col_sep=$separator[$i-1];
                                    $drop_options .="".$row->$col_value . " $col_sep";
                                }
                                 $drop_options.="</option>";
                        } else {
                                $drop_options .= "<option value='" . $row->$id . "' >";
                                for ($i=1; $i <=count($columns) ; $i++) { 
                                    $col_value=$columns[$i];
                                    $col_sep=$separator[$i-1];
                                    $drop_options .="".$row->$col_value . " $col_sep";
                                }
                                 $drop_options.="</option>";
                        }
                    
                }
            } 
            else {
                foreach ($rows as $row) {
                        $drop_options .= "<option value='" . $row->$id . "'>";
                        for ($i=1; $i <=count($columns) ; $i++) { 
                            $col_value=$columns[$i];
                            $col_sep=$separator[$i-1];
                            $drop_options .="".$row->$col_value . " $col_sep";
                        }
                         $drop_options.="</option>";
                }
            }
        }
        return $drop_options;
    }
    public function createDropdownSimple($table,$columns = array(),$where = null, $sort_column="",$sort="ASC")
    {
        if ($sort_column=="") {
            $sort_column = $columns[0];
        }
        if ($where != null && !is_null($where)) {
            $query = $this->db->select($columns)->from($table)->where($where)->order_by($sort_column . ' ' . $sort)->get();
        } else {
            $query = $this->db->select($columns)->from($table)->order_by($sort_column . ' ' . $sort)->get();
        }
        $rows = $this->getResult($query);
        $drop_options = "";
        if ($rows) {
            foreach ($rows as $row) {
                $drop_options .= "<option>";
                $col_value = $columns[0];
                $drop_options .= $row->$col_value;
                $drop_options .= "</option>";
            }
        }
        return $drop_options;
    }
    // this function is to create age Group dropdown it is customize we can not use it in any other place
    public function createDropdownSelect($table, $columns = array(), $caption="Value",$separator = array(' ') ,$where = null, $selected = array(),$sort_column="",$sort="ASC") 
    {
        // d($where != null);
        if($sort_column==""){
            $sort_column=$columns[1];
        }
        if ($where != null && !is_null($where)) {
             $query = $this->db->select($columns)->from($table)->where($where)->order_by($sort_column . ' ' . $sort)->get();
        } else {
            $query = $this->db->select($columns)->from($table)->order_by($sort_column . ' ' . $sort)->get();
        }
        // echo $this->db->last_query();die;
        $id=$columns[0];
        unset($columns[0]);
        $rows         = $this->getResult($query);
        $drop_options = "<option value=''>-- Select ".$caption." --</option>";
        if ($rows) {
            if (!empty($selected)) {
                foreach ($rows as $row) {
                        if (in_array($row->$id,$selected)) {
                                $drop_options .= "<option value='" . $row->$id . "' selected='selected'>";
                                for ($i=1; $i <=count($columns) ; $i++) { 

                                    if ($i == 3) {
                                       
                                        $customer_result = $this->getRows('customer_master',array("customer_id" => $selected[0]));
                                        $currency_id=$customer_result[0]->currency_id;    
                                      
                                        $currency_result = $this->getRows('currency_master',array("currency_id" => $currency_id));
                                     
                                        $col_value=$currency_result[0]->currency_name;
                                        $col_sep=$separator[$i-1];
                                        
                                        $drop_options .="".$col_value . " $col_sep";
                                    }
                                    else
                                    {
                                        $col_value=$columns[$i];
                                        $col_sep=$separator[$i-1];
                                        $drop_options .="".$row->$col_value . " $col_sep";
                                    }

                                    
                                }
                                 $drop_options.="</option>";
                        } else {
                                $drop_options .= "<option value='" . $row->$id . "' >";
                                for ($i=1; $i <=count($columns) ; $i++) { 
                                    if ($i == 3) {
                                        $currency_id=$columns[$i];    
                                        $currency_result = $this->getRows('currency_master',array("currency_id" => $row->$currency_id));
         
                                        $col_value=$currency_result[0]->currency_name;
                                        $col_sep=$separator[$i-1];
                                        
                                        $drop_options .="".$col_value . " $col_sep";
                                    }
                                    else
                                    {
                                        $col_value=$columns[$i];
                                        $col_sep=$separator[$i-1];
                                        $drop_options .="".$row->$col_value . " $col_sep";
                                    }
                                }
                                 $drop_options.="</option>";
                        }
                    
                }
            } 
            else {
                foreach ($rows as $row) {
                        $drop_options .= "<option value='" . $row->$id . "'>";
                        for ($i=1; $i <=count($columns) ; $i++) { 
                            if ($i == 3) {
                                $currency_id=$columns[$i];    
                                $currency_result = $this->getRows('currency_master',array("currency_id" => $row->$currency_id));
                                //var_dump($currency_result[0]->currency_name); exit;
                                //$col_value = $currency_result[0]->currency_name;

                                $col_value=$currency_result[0]->currency_name;
                                $col_sep=$separator[$i-1];

                                $drop_options .="".$col_value . " $col_sep";
                            }
                            else
                            {
                                $col_value=$columns[$i];
                                $col_sep=$separator[$i-1];
                                $drop_options .="".$row->$col_value . " $col_sep";
                            }

                            
                        }
                         $drop_options.="</option>";
                }
            }
        }
        return $drop_options;
    }
    public function setAutoIncrement($table,$table_id,$increment_value=null)
    {
        $value = 1;
        if($increment_value==null)
        {
            $result = $this->db->select_max($table_id,'value')->get($table)->row();
            if($result)
            {
                $value = $result->value + 1;
            }
        }
        else
        {
            $value = $increment_value;
        }
        $alterQry = "ALTER TABLE $table AUTO_INCREMENT = $value";
        return $this->customQuery($alterQry);

    }

    public function convert_number_to_words($number) {

            $hyphen      = '-';
            $conjunction = ' and ';
            $separator   = ', ';
            $negative    = 'negative ';
            $decimal     = ' point ';
            $dictionary  = array(
                0                   => 'zero',
                1                   => 'one',
                2                   => 'two',
                3                   => 'three',
                4                   => 'four',
                5                   => 'five',
                6                   => 'six',
                7                   => 'seven',
                8                   => 'eight',
                9                   => 'nine',
                10                  => 'ten',
                11                  => 'eleven',
                12                  => 'twelve',
                13                  => 'thirteen',
                14                  => 'fourteen',
                15                  => 'fifteen',
                16                  => 'sixteen',
                17                  => 'seventeen',
                18                  => 'eighteen',
                19                  => 'nineteen',
                20                  => 'twenty',
                30                  => 'thirty',
                40                  => 'fourty',
                50                  => 'fifty',
                60                  => 'sixty',
                70                  => 'seventy',
                80                  => 'eighty',
                90                  => 'ninety',
                100                 => 'hundred',
                1000                => 'thousand',
                1000000             => 'million',
                1000000000          => 'billion',
                1000000000000       => 'trillion',
                1000000000000000    => 'quadrillion',
                1000000000000000000 => 'quintillion'
            );

            if (!is_numeric($number)) {
                return false;
            }

            if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
                // overflow
                trigger_error(
                    'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                    E_USER_WARNING
                );
                return false;
            }

            if ($number < 0) {
                return $negative . $this->convert_number_to_words(abs($number));
            }

            $string = $fraction = null;

            if (strpos($number, '.') !== false) {
                list($number, $fraction) = explode('.', $number);
            }

            switch (true) {
                case $number < 21:
                    $string = $dictionary[$number];
                    break;
                case $number < 100:
                    $tens   = ((int) ($number / 10)) * 10;
                    $units  = $number % 10;
                    $string = $dictionary[$tens];
                    if ($units) {
                        $string .= $hyphen . $dictionary[$units];
                    }
                    break;
                case $number < 1000:
                    $hundreds  = $number / 100;
                    $remainder = $number % 100;
                    $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                    if ($remainder) {
                        $string .= $conjunction . $this->convert_number_to_words($remainder);
                    }
                    break;
                default:
                    $baseUnit = pow(1000, floor(log($number, 1000)));
                    $numBaseUnits = (int) ($number / $baseUnit);
                    $remainder = $number % $baseUnit;
                    $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                    if ($remainder) {
                        $string .= $remainder < 100 ? $conjunction : $separator;
                        $string .= $this->convert_number_to_words($remainder);
                    }
                    break;
            }

            if (null !== $fraction && is_numeric($fraction)) {
                $string .= $decimal;
                $words = array();
                foreach (str_split((string) $fraction) as $number) {
                    $words[] = $dictionary[$number];
                }
                $string .= implode(' ', $words);
            }

            return $string;
        }
    
}
/* End of file Admin_model.php */
/* Location: ./application/modules/admin/models/Admin_model.php */ 