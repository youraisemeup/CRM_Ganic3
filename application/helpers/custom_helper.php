<?php
if (!function_exists('breacrumb')) {
    
    function breadcrumb($list = array())
    {
        $CI =& get_instance();
        $level = $CI->session->userdata('level');
        $html = '';
        
        $html .= '<ol class="breadcrumb pull-right">';
        $html .= "<li><a href='".base_url('dashboard')."'><i class='fa fa-dashboard'></i> Dashboard</a></li>";
        foreach ($list as $key => $value) {
            if ($key == "active") {
                $html .= '<li class="active">' . $value . '</li>';
            } else {
                $html .= "<li><a href='" . base_url($level.'/'.$key) . "'>" . $value . "</a></li>";
            }
        }
        $html .= '</ol>';
        return $html;
    }
}
if (!function_exists('buttonsPanel')) {
    function buttonsPanel($back = 1, $new = 1, $edit = 1, $save = 1, $view = 1, $delete = 1, $refresh = 1, $forex_m_create = 0)
    // set 1 to display button , set 0 to hide buttons .. ex: buttonsPanel(1,0,0,1,0,0,0)
    {
        
        $buttonsPanel = "<div class='box box-primary' id='buttons_panel'>
        <div class='box-header'>";
        $btn_style    = 'btn-flat';
        if ($back == 1) {
            $buttonsPanel .= " <button class='btn btn-primary $btn_style' id='back'>
                <i class='fa fa-arrow-circle-left' aria-hidden='true'></i> Back
            </button> ";
        }
        if ($new == 1) {
            $buttonsPanel .= " <button class='btn btn-info $btn_style' id='new'>
            <i class='fa fa-plus-circle' aria-hidden='true'></i> New
        </button> ";
        }

        // if ($export != 1) {
        //     $buttonsPanel .= "<a href='". base_url('system_utilities/export_customer_master')."'>EXPORT TO DBF</a>";
        // }

        if ($edit == 1) {
            $buttonsPanel .= " <button class='btn bg-maroon $btn_style' id='edit'>
        <i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit
    </button> ";
        }
        if ($save == 1) {
            $buttonsPanel .= "<button class='btn btn-success $btn_style' id='save'>
    <i class='fa fa-hdd-o' aria-hidden='true'></i> Save</button>";
        }
        if ($view == 1) {
            $buttonsPanel .= " <button class='btn btn-warning $btn_style' id='view'>
    <i class='fa fa-eye' aria-hidden='true'></i> View</button> ";
        }
        if ($delete == 1) {
            $buttonsPanel .= " <button class='btn btn-danger $btn_style' id='delete'>
    <i class='fa fa-trash' aria-hidden='true'></i> Delete</button> ";
        }
        if ($refresh == 1) {
            $buttonsPanel .= " <button class='btn bg-purple $btn_style' id='refresh'>
    <i class='fa fa-refresh' aria-hidden='true'></i> Refresh</button> ";
        }
        if ($forex_m_create == 1) {
            $buttonsPanel .= " <button class='btn bg-green $btn_style' id='m_create'>
    <i class='fa fa-plus-circle' aria-hidden='true'></i> M-Create</button> ";   
        }
        
        
        $buttonsPanel .= "</div></div>";
        return $buttonsPanel;
    }
}
function set_flash_message($message_name, $message_type = null, $message_content)
{
    // Get current CodeIgniter instance
    $CI =& get_instance();
    $div = "";
    $div .= "<div class='alert alert-" . $message_type . "'>";
    $div .= $message_content;
    $div .= "<button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button></div>";
    if ($message_type == null) {
        $message_type = "info";
    }
    $CI->session->set_flashdata($message_name, $div);
    
}

function get_flash_message($message_name)
{
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    echo $CI->session->flashdata($message_name);
}



function is_ajax()
{
    $CI =& get_instance();
    if (!$CI->input->is_ajax_request()) {
        show_404();
    }
}

/**
 * it will Encrypt String data and return encrypted string(this is a two way encription/decryption)
 * @param string $stringdate The name of the string variable
 * returns string it will return encrypted string. 
 */
function encryptIt($stringdata)
{
    if (is_string($stringdata)) {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($stringdataEncoded);
    } else {
        exit("not a valid input.");
    }
}

/**
 * it will Decrypt String data and return Decrpted string
 * @param string $stringdate The name of the string variable
 * returns string it will return Decrpted string. 
 */
function decryptIt($stringdata)
{
    if (is_string($stringdata)) {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($stringdataDecoded);
    } else {
        exit("not a valid input.");
    }
}
//this function will change data from arrray to json format
function array2json($arr, $pretty = false)
{
    if (!is_array($arr)) {
        $this->setError("Give value is not an array");
    }
    //use JSON_PRETTY_PRINT constant with json_encode function as 2nd param.
    if (function_exists('json_encode'))
        if ($pretty)
            return json_encode($arr, JSON_PRETTY_PRINT);
        else
            return json_encode($arr); //Lastest versions of PHP already has this functionality.
    
    $parts   = array();
    $is_list = false;
    
    //Find out if the given array is a numerical array 
    $keys       = array_keys($arr);
    $max_length = count($arr) - 1;
    if (($keys[0] == 0) and ($keys[$max_length] == $max_length)) { //See if the first key is 0 and last key is length - 1
        $is_list = true;
        for ($i = 0; $i < count($keys); $i++) { //See if each key correspondes to its position 
            if ($i != $keys[$i]) { //A key fails at position check. 
                $is_list = false; //It is an associative array. 
                break;
            }
        }
    }
    foreach ($arr as $key => $value) {
        if (is_array($value)) { //Custom handling for arrays 
            if ($is_list)
                $parts[] = array2json($value);
            /* :RECURSION: */
            else
                $parts[] = '"' . $key . '":' . array2json($value);
            /* :RECURSION: */
        } else {
            $str = '';
            if (!$is_list)
                $str = '"' . $key . '":';
            //Custom handling for multiple data types 
            if (is_numeric($value))
                $str .= $value; //Numbers 
            elseif ($value === false)
                $str .= 'false'; //The booleans 
            elseif ($value === true)
                $str .= 'true';
            else
                $str .= '"' . addslashes($value) . '"'; //All other things 
            // :TODO: Is there any more datatype we should be in the lookout for? (Object?) 
            $parts[] = $str;
        }
    }
    $json = implode(',', $parts);
    if ($is_list)
        return '[' . $json . ']'; //Return numerical JSON 
    return '{' . $json . '}'; //Return associative JSON
}

//this function will change data from arrray to json format
function json2array($json, $assoc = false, $depth = 512, $options = 0)
{
    // search and remove comments like /* */ and //
    $json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#", '', $json);
    if (version_compare(phpversion(), '5.4.0', '>=')) {
        $json = json_decode($json, $assoc, $depth, $options);
    } elseif (version_compare(phpversion(), '5.3.0', '>=')) {
        $json = json_decode($json, $assoc, $depth);
    } else {
        $json = json_decode($json, $assoc);
    }
    if (json_last_error() == JSON_ERROR_NONE) {
        return $json;
    } else {
        echo json_last_error(); // 4 (JSON_ERROR_SYNTAX)
        echo json_last_error_msg(); // unexpected character 
    }
}

function create_json_file($filename, $jsondata, $pretty = FALSE)
{
    if (is_array($jsondata)) {
        $jsondata = $this->array2json($jsondata, $pretty);
    }
    $fp = fopen($filename, 'wb');
    if (!fwrite($fp, $jsondata)) {
        echo "Cannot write to file ($filename)";
        return FALSE;
    } else {
        return TRUE;
    }
    
    fclose($fp);
    //return $jsondata;
}

function read_json_file($fialname)
{
    if (!is_file($filename)) {
        $this->setError("Give file is not a json file.");
    } else {
        return $jsondata;
    }
}

if (!function_exists('createSimpleDropdown')) {
    
    function createSimpleDropdown($values=array(),$caption="Value",$selected=null,$keyValueSame=1){
      //$keyValueSame=0 , When it set to 0 then in option value user $key as value otherwise option value and its display value both same  by default it is 1
          $options = "";
          $options .= "<option value=''>-- Select $caption --</option>";
          if(!empty($values))
          {
              if($selected != null)
              {
                foreach($values as $key => $value)
                {
                  if($keyValueSame==1)
                  {
                    $key = $value;
                  }
                  if($key==$selected)
                  {
                    $options .= "<option value='$key' selected>$value</option>";  
                  }
                  else
                  {
                    $options .= "<option value='$key'>$value</option>";
                  }
                }
              }
              else
              {
                foreach($values as $key => $value)
                {
                  if($keyValueSame==1)
                  {
                    $key = $value;
                  }
                  $options .= "<option value='$key'>$value</option>";
                }
              }
          }
          return $options;
        }
}

/**
 * it will validate json string and return if string is valid josn format
 * @param string $jsonstring The name of the string variable
 * returns it will return json string if it is valid otherwise returns FALSE. 
 */
function json_validate($string)
{
    // decode the JSON data
    $result = $this->json_clean_decode($jsonstring);
    // switch and check possible JSON errors
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            $error = ''; // JSON is valid // No error has occurred
            break;
        case JSON_ERROR_DEPTH:
            $error = 'The maximum stack depth has been exceeded.';
            break;
        
        case JSON_ERROR_STATE_MISMATCH:
            $error = 'Invalid or malformed JSON.';
            break;
        
        case JSON_ERROR_CTRL_CHAR:
            $error = 'Control character error, possibly incorrectly encoded.';
            break;
        
        case JSON_ERROR_SYNTAX:
            $error = 'Syntax error, malformed JSON.';
            break;
        
        // PHP >= 5.3.3
        case JSON_ERROR_UTF8:
            $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
            break;
        
        // PHP >= 5.5.0
        case JSON_ERROR_RECURSION:
            $error = 'One or more recursive references in the value to be encoded.';
            break;
        
        // PHP >= 5.5.0
        case JSON_ERROR_INF_OR_NAN:
            $error = 'One or more NAN or INF values in the value to be encoded.';
            break;
        
        case JSON_ERROR_UNSUPPORTED_TYPE:
            $error = 'A value of a type that cannot be encoded was given.';
            break;
        
        default:
            $error = 'Unknown JSON error occured.';
            break;
    }
    if ($error !== '') {
        // throw the Exception or exit // or whatever :)
        exit($error);
    }
    // everything is OK
    return $result;
}

function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0)
{
    // search and remove comments like /* */ and //
    $json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#", '', $json);
    
    if (version_compare(phpversion(), '5.4.0', '>=')) {
        $json = json_decode($json, $assoc, $depth, $options);
    } elseif (version_compare(phpversion(), '5.3.0', '>=')) {
        $json = json_decode($json, $assoc, $depth);
    } else {
        $json = json_decode($json, $assoc);
    }
    
    return $json;
}


function is_logged_in($role="admin")
{
    $CI =& get_instance();
    if(empty($CI->ion_auth->user()->result())){
        redirect('common/signout');
    }
    else{
        if (!$CI->ion_auth->logged_in()) {
            redirect("");
        }   
    }
}



function has_permission(){
    $CI =& get_instance();
    $method=$CI->uri->segment(2);
    $permissions=(array)json_decode($CI->custom->getSingleValue('groups','permissions',array('id' => $CI->session->group_id))); 
    if (array_key_exists($method, $permissions)) {
        if($permissions[$method]==0){
            set_flash_message("message","danger","You have no permission to access this");
            redirect('dashboard','refresh');
        }
    }
    else{
        if((!$CI->ion_auth->is_admin() && $CI->session->group_id!=1) && $CI->session->level!="admin"){
            set_flash_message("message","danger","You have no permission to access this");
            redirect('dashboard','refresh');
        }
    }
}

function file_upload($file_name, $control_name, $upload_in)
{
    $CI =& get_instance();
    
    $config['upload_path'] = FCPATH . 'assets/uploads/' . $upload_in . '/';
     if ($upload_in == "database_restore_files") {
        $config['allowed_types'] = 'sql';
    } 
    
    else if($upload_in == "database_import_files") {
        $config['allowed_types'] = 'dbf';
        //$config['max_size']   = 4096000000;
    }
    
    else {
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG';
        $config['max_size']   = 2048;
        $config['max_width']  = 2000;
        $config['max_height'] = 2000;
    }
    // d($config['allowed_types']);
    $config['file_name']  = $file_name; // set the name here
    $config['overwrite']  = TRUE;
    // d($config);
    $CI->load->library('Upload', $config);
    if (!$CI->upload->do_upload($control_name)) {
        $error = array(
            'error' => $CI->upload->display_errors(),
            'status' => false
        );
        return $error;
    } else {
        $data = array(
            'upload_data' => $CI->upload->data(),
            'status' => true
        );
        return $data;
    }
}

if (!function_exists('prev_blockbill_backup')) {
    function prev_blockbill_backup()
    {
        $CI =& get_instance();
        $blockbill_month_info=$CI->custom->getRowsSorted("blockbill_master",array('user_id'=>$CI->session->user_id),array(),"bill_state","DESC",1);

        if (count($blockbill_month_info)) {
            if ($blockbill_month_info[0]->bill_state != '') {
                $file_name=($blockbill_month_info[0]->bill_state).".sql";    
            }
            else 
            {
                $blockbill_first_bill_date=$CI->custom->getRowsSorted("blockbill_master",array('user_id'=>$CI->session->user_id),array(),"next_bill_date","ASC",1); 
                if (count($blockbill_first_bill_date)) {
                    $block_first_backup_date = convert_custom_date($blockbill_first_bill_date[0]->next_bill_date,'-1',0);
                    $first_year_month = substr($block_first_backup_date,0,7);
                }
                $file_name=$first_year_month.".sql";
            }
        }

        // Load the DB utility class
        
        $CI->load->dbutil();
        $prefs = array(
            'tables'      => array('blockbill_master','accounts_receivable','gl_table','invoice_gst_table'),  // Array of tables to backup.
            'ignore'      => array(),           // List of tables to omit from the backup
            'format'      => 'txt',             // gzip, zip, txt
            'filename'    => $file_name,    // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
            'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
            'newline'     => "\n"               // Newline character used in backup file
          );

        $backup = $CI->dbutil->backup($prefs);
        // Backup your entire database and assign it to a variable

        // Load the file helper and write the file to your server
        $CI->load->helper('file');
        write_file(FCPATH.'/assets/database_backups/'.$file_name, $backup);

        // Load the download helper and send the file to your desktop
        $CI->load->helper('download');
        force_download($file_name, $backup);
        
    }
}

if (!function_exists('databaseBackup')) {
    function databaseBackup($tables = array())
    {
        $CI =& get_instance();
        // Load the DB utility class
        $file_name="crm_".date('Ymd_His').".zip";
        $CI->load->dbutil();
        $prefs = array(
            'format'        => 'zip',           // gzip, zip, txt
            'filename'      => $file_name,      // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop'      => TRUE,            // Whether to add DROP TABLE statements to backup file
            'add_insert'    => TRUE,            // Whether to add INSERT data to backup file
            'newline'       => "\n"             // Newline character used in backup file
        );

        $backup = $CI->dbutil->backup($prefs);
        // Backup your entire database and assign it to a variable

        // Load the file helper and write the file to your server
        $CI->load->helper('file');
        write_file(FCPATH.'/assets/database_backups/'.$file_name, $backup);

        // Load the download helper and send the file to your desktop
        $CI->load->helper('download');
        force_download($file_name, $backup);
        
    }
} 

if (!function_exists('databaseInitialize')) {
    function databaseInitialize($tables = array())
    {
        $CI =& get_instance();
        if($CI->db->table_exists('customer_master')){$res[]=$CI->db->truncate('customer_master');}
        if($CI->db->table_exists('billing_master')){$res[]=$CI->db->truncate('billing_master');}
        if($CI->db->table_exists('salesman_master')){$res[]=$CI->db->truncate('salesman_master');}
        if($CI->db->table_exists('payee')){$res[]=$CI->db->truncate('payee');}
        if($CI->db->table_exists('chart_of_account')){$res[]=$CI->db->truncate('chart_of_account');}
//        if($CI->db->table_exists('delivered_order')){$res[]=$CI->db->truncate('delivered_order');}
//        if($CI->db->table_exists('delivered_order_product')){$res[]=$CI->db->truncate('delivered_order_product');}
//        if($CI->db->table_exists('invoice_order')){$res[]=$CI->db->truncate('invoice_order');}
//        if($CI->db->table_exists('invoice_product')){$res[]=$CI->db->truncate('invoice_product');}
//        if($CI->db->table_exists('order_entry')){$res[]=$CI->db->truncate('order_entry');}
//        if($CI->db->table_exists('order_entry_product')){$res[]=$CI->db->truncate('order_entry_product');}
//        if($CI->db->table_exists('quotationlist')){$res[]=$CI->db->truncate('quotationlist');}
//        if($CI->db->table_exists('quotation_product')){$res[]=$CI->db->truncate('quotation_product');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"System Initialized Successfully");    
        }
    }
} 

if(!function_exists('zapCustomer_Master'))
{
    function zapCustomer_Master()
    {
        $CI =& get_instance();
        $CI->db->truncate('customer_master');
    }
}

if(!function_exists('zapSalesMan_Master'))
{
    function zapSalesMan_Master()
    {
        $CI =& get_instance();
        $CI->db->truncate('salesman_master');
    }
}

if(!function_exists('zapBilling_Master'))
{
    function zapBilling_Master()
    {
        $CI =& get_instance();
        $CI->db->truncate('billing_master');
    }
}

if (!function_exists('zapQuotation')) {
    function zapQuotation($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('quotation_master')){$res[]=$CI->db->truncate('quotation_master');}
        if($CI->db->table_exists('quotation_product_master')){$res[]=$CI->db->truncate('quotation_product_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"Quotation zapped successfully");    
        }
    }
} 

function convert_custom_date($date,$months = 0,$days = 0){
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

if (!function_exists('undo_last_blockbill')) {
    function undo_last_blockbill()
    {
        $CI =& get_instance();

        $CI->db->from('blockbill_master');
        $CI->db->where('user_id', $CI->session->user_id); 
        $CI->db->order_by("bill_state", "desc");
        $CI->db->limit(1);
        
        $query  = $CI->db->get();

        foreach ($query->result() as $row)
        {
            $last_bill_date = $row->bill_state;
            $last_bill_date_real = convert_custom_date($last_bill_date,'-1',0);
            $year_month = substr($last_bill_date_real,0,7);
            $backup_file_name = $year_month.'.sql';
        }
       // var_dump($backup_file_name);exit();
        $CI->load->helper("file");
        // d($data);
        //echo $year_month;exit();
        if($year_month != ''){

            $sql_file=FCPATH.'/assets/database_backups/'.$backup_file_name;
            if (file_exists($sql_file)){
                $query_list = explode(";", read_file($sql_file));
            
                $CI->db->query('SET foreign_key_checks = 0');
                
                d($query_list);
                foreach($query_list as $query):
                    $query=trim($query);
                    if($query!=""){
                        $CI->db->query($query);
                    }
                endforeach;
                $CI->db->query('SET foreign_key_checks = 1');
                set_flash_message('message','success',"BlockBilling Undo Successfully");    
            }
            else
            {
              set_flash_message('message','warning',"No BlockBilling Transaction!!!");    
            }
            //var_dump($sql_file);exit();
        }
        else{
            set_flash_message('message','warning',"No BlockBilling Transaction!!!");  
        }
        redirect('dashboard','refresh');
        // if(in_array(FALSE, $res)){
        //     set_flash_message('message','danger',"Something went Wrong");
        // }
        // else{
        //     set_flash_message('message','success',"Invoice zapped successfully");    
        // }
    }
}
if (!function_exists('zapBilling')) {
    function zapBilling($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('autobill_master')){$res[]=$CI->db->truncate('autobill_master');}
        if($CI->db->table_exists('blockbill_master')){$res[]=$CI->db->truncate('blockbill_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"AutoBill zapped successfully");    
        }
    }
}

if (!function_exists('zapInvoice')) {
    function zapInvoice($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('invoice_master')){$res[]=$CI->db->truncate('invoice_master');}
        if($CI->db->table_exists('invoice_product_master')){$res[]=$CI->db->truncate('invoice_product_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"Invoice zapped successfully");    
        }
    }
} 

if (!function_exists('zapAR')) {
    function zapAR($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('open_table')){$res[]=$CI->db->truncate('open_table');}
        if($CI->db->table_exists('accounts_receivable')){$res[]=$CI->db->truncate('accounts_receivable');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"Accounts Receivable zapped successfully");    
        }
    }
} 

if (!function_exists('zapReceipt')) {
    function zapReceipt($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('receipt_master')){$res[]=$CI->db->truncate('receipt_master');}
        if($CI->db->table_exists('receipt_invoice_master')){$res[]=$CI->db->truncate('receipt_invoice_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"Receipt zapped successfully");
        }
    }
}
if (!function_exists('zapStock')) {
    function zapStock($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('stock_invoice_master')){$res[]=$CI->db->truncate('stock_invoice_master');}
        if($CI->db->table_exists('open_stock_table')){$res[]=$CI->db->truncate('open_stock_table');}
        if($CI->db->table_exists('stock_adjustment_master')){$res[]=$CI->db->truncate('stock_adjustment_master');}
        if($CI->db->table_exists('stock_purchase_master')){$res[]=$CI->db->truncate('stock_purchase_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"stock zapped successfully");    
        }
    }
}

if (!function_exists('zapBank')) {
    function zapBank($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('bank')){$res[]=$CI->db->truncate('bank');}
        if($CI->db->table_exists('bank_adjustment')){$res[]=$CI->db->truncate('bank_adjustment');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"Bank zapped successfully");    
        }
    }
}

if (!function_exists('zapPayment')) {
    function zapPayment($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('payment_master')){$res[]=$CI->db->truncate('payment_master');}
        if($CI->db->table_exists('payment_purchase_master')){$res[]=$CI->db->truncate('payment_purchase_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"Payment zapped successfully");    
        }
    }
}
if (!function_exists('zapOPayment')) {
    function zapOPayment($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('other_payment')){$res[]=$CI->db->truncate('other_payment');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"OTHER Payment zapped successfully");    
        }
    }
}


if (!function_exists('zapPurchases')) {
    function zapPurchases($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('purchase_master')){$res[]=$CI->db->truncate('purchase_master');}
        if($CI->db->table_exists('purchase_product_master')){$res[]=$CI->db->truncate('purchase_product_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"purchases zapped successfully");    
        }
    }
}

if (!function_exists('zapAP')) {
    function zapAP($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('ap_open')){$res[]=$CI->db->truncate('ap_open');}
        if($CI->db->table_exists('accounts_payable')){$res[]=$CI->db->truncate('accounts_payable');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"AP Listing zapped successfully");    
        }
    }
}

if (!function_exists('zapHistCost')) {
    function zapHistCost($tables = array())
    {
        $CI =& get_instance();

        if($CI->db->table_exists('histcost_master')){$res[]=$CI->db->truncate('histcost_master');}
        if(in_array(FALSE, $res)){
            set_flash_message('message','danger',"Something went Wrong");
        }
        else{
            set_flash_message('message','success',"historical costing zapped successfully");    
        }
    }
}

if (!function_exists('array_diff_assoc_recursive')) {
function array_diff_assoc_recursive($array1, $array2)
{
    foreach($array1 as $key => $value){

        if(is_array($value)){
            if(!isset($array2[$key]))
            {
                $difference[$key] = $value;
            }
            elseif(!is_array($array2[$key]))
            {
                $difference[$key] = $value;
            }
            else
            {
                $new_diff = array_diff_assoc_recursive($value, $array2[$key]);
                if($new_diff != FALSE)
                {
                    $difference[$key] = $new_diff;
                }
            }
        }
        elseif((!isset($array2[$key]) || $array2[$key] != $value) && !($array2[$key]===null && $value===null))
        {
            $difference[$key] = $value;
        }
    }
    return !isset($difference) ? 0 : $difference;
}
}