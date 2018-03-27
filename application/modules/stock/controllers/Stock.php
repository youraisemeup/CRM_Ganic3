<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Stock extends MY_Controller {

			public function __construct()
		    {
		        parent::__construct(); 
		        $this->load->model('stock/stock_model','stock');
		    }	
		    /*stock opening balance start*/
		    public function opening_balance()
	 		{
	 			is_logged_in('admin');
	 			has_permission();
	 			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "),array('billing_type' => 'product'));
				$this->body_vars['save_url']=base_url('stock/create_stocktable');
	 			$this->body_file="stock/opening_balance.php";
	 		}	
	 		public function stock_openlist()
			{
				is_logged_in('admin');
				has_permission();
			}
			public function stock_open_manage($mode,$row_id="") 
			{
				is_logged_in('admin');
				has_permission();
							
				/*==========================================*/
				if($row_id!=""):
				$this->body_vars['open_stock_edit_data']=$open_stock_edit_data=$this->custom->getSingleRow('open_stock_table',array("open_stock_id"=>$row_id));
				if($open_stock_edit_data):
					
					// $this->body_vars['customer_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code'),"Customer",array('(',')'),array(),array($open_edit_data->customer_id));

					if($mode=="edit"):
						$stock = $this->stock->get_product_details(array('billing_id' => $open_stock_edit_data->open_billing_id));
						$data['stock_code'] = $stock->stock_code;
						$data['stock_description'] = $stock->billing_description;
						$data['uom'] = $stock->billing_uom;
						$data['quantity'] = $open_stock_edit_data->open_stock_quantity;
						$data['open_stock_id'] = $open_stock_edit_data->open_stock_id;
						$this->body_vars['cust_data'] = $data;
						$this->body_vars['save_url']=base_url('stock/create_stocktable/edit');
						$this->body_file="stock/open_stock_edit.php";
					endif;
					if($mode=="view"):
						$result= $this->invoice->get_customer_details(array('customer_id'=>$invoice_edit_data->customer_id));
						$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
						$data['customer_phone']=$result->customer_phone;
						$data['customer_email']=$result->customer_email;
						$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
						$data['customer_currency']=$currency_data->currency_name;
						$data['currency_amount']=$currency_data->currency_rate;
						$this->body_vars['cust_data']=$data;
						$this->body_vars['mode']="view";
						$this->body_file="invoice/invoice_view.php";
					endif;
					/*==========================================*/
				else:
					redirect('invoice/invoicelist/pending','refresh');
				endif;
				endif;
			}
	 		public function create_stocktable($action="new")
	 		{

	 			is_logged_in('admin');
				has_permission(); 
				$post=$this->input->post();
				
				$open_data = $post;
				if (isset($post)) {

					if($action=="new"){
						$insert_data = array();
						if (isset($insert_data)) {
							unset($insert_data);
						}
						$count = count($post['data']['product_id']);
						foreach ($post['data']['product_id'] as $product_id){
						   $insert_data['open_billing_id'][] = $product_id;
						}
						foreach ($post['data']['quantity'] as $quantity) {
							$insert_data['open_stock_quantity'][] = $quantity;
						}
						
						for ($i=0; $i < $count ; $i++) { 
							$data['open_billing_id'] = $insert_data['open_billing_id'][$i];
							$data['open_stock_quantity'] = $insert_data['open_stock_quantity'][$i];
							
							$open_id[]=$this->custom->insertRow("open_stock_table",$data);
						}
					}

					if($action=="edit"){
						
						$where=array('open_stock_id' => $open_data['data']['open_stock_id'][0]);

						$data['open_stock_quantity'] = $open_data['data']['quantity'][0];
						
						unset($open_data['open_stock_id']);

						$this->db->trans_start();
						$res[]=$this->custom->updateRow("open_stock_table",$data,$where);
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Stock Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('stock/stock_openlist/confirmed');
				}
	 		}
	 		/*stock opening balance end*/
	 		/*stock purchases start*/
	 		public function enter_stock_purchases()
	 		{
	 			is_logged_in('admin');
	 			has_permission();

	 			$this->body_vars['supplier_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code','currency_id'),"Supplier",array('(',')',' '),array('flag' => 'S'));
	 			
	 			// $this->body_vars['supplier_options']=$this->custom->createDropdownSelect("customer_master",array('supplier_id','supplier_name','supplier_code'),"Supplier",array(" : "," "));

	 			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "),array('billing_type' => 'product'));

				$this->body_vars['save_url']=base_url('stock/create_purchasetable');
	 			$this->body_file="stock/stock_purchases.php";
	 		}
	 		public function create_purchasetable($action="new")
	 		{
	 			is_logged_in('admin');
				has_permission(); 
				$post=$this->input->post();
				$purchases_data = $post;
				if (isset($post)) {

					if($action=="new"){
						$insert_data = array();
						if (isset($insert_data)) {
							unset($insert_data);
						}
						$count = count($post['data']['product_id']);
						foreach ($post['data']['product_id'] as $product_id){
						   $insert_data['purchase_billing_id'][] = $product_id;
						}
						foreach ($post['data']['quantity'] as $quantity) {
							$insert_data['purchase_quantity'][] = $quantity;
						}
						
						for ($i=0; $i < $count ; $i++) { 
							$data['purchase_billing_id'] = $insert_data['purchase_billing_id'][$i];
							$data['purchase_quantity'] = $insert_data['purchase_quantity'][$i];
							$data['purchase_ref_no'] = $post['purchase_ref_no'];
							$data['purchase_supplier_id'] = $post['supplier_id'];
							$data['created_on'] = date('Y-m-d');
							$data['modified_on'] = date('Y-m-d');
							$purchase_id[]=$this->custom->insertRow("stock_purchase_master",$data);
						}
					}

					if($action=="edit"){

						$where=array('purchase_id' => $purchases_data['data']['purchase_id'][0]);

						$data['purchase_quantity'] = $purchases_data['data']['quantity'][0];

						$data['purchase_ref_no'] = $purchases_data['purchase_ref_no'];
						$data['purchase_supplier_id'] = $purchases_data['supplier_id'];
						$data['purchase_billing_id'] = $purchases_data['product_id'];

						unset($purchases_data['purchase_id']);

						$this->db->trans_start();
						$res[]=$this->custom->updateRow("stock_purchase_master",$data,$where);
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Stock Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('stock/stock_purchaselisting/confirm');
				}
	 		}
	 		public function stock_purchaselisting()
	 		{
	 			is_logged_in('admin');
				has_permission();
	 		}
	 		public function stock_purchase_manage($mode,$row_id="") 
			{
				is_logged_in('admin');
				has_permission();
							
				/*==========================================*/
				if($row_id!=""):
				$this->body_vars['stock_purchase_edit_data']=$stock_purchase_edit_data=$this->custom->getSingleRow('stock_purchase_master',array("purchase_id"=>$row_id));
				if($stock_purchase_edit_data):
					$this->body_vars['supplier_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code'),"Supplier",array(" : "," "),array('flag' => 'S'),array($stock_purchase_edit_data->purchase_supplier_id));
					// $this->body_vars['supplier_options']=$this->custom->createDropdownSelect("supplier_master",array('supplier_id','supplier_name','supplier_code'),"Supplier",array(" : "," "),array(),array($stock_purchase_edit_data->purchase_supplier_id));
					$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "),array('billing_type' => 'product'),array($stock_purchase_edit_data->purchase_billing_id));
					// $this->body_vars['supplier_options']=$this->custom->createDropdownSelect("customer_master",array('customer_id','customer_name','customer_code'),"Customer",array('(',')'),array(),array($open_edit_data->customer_id));
					$supplier_details = $this->custom->getSingleRow("customer_master",array('customer_id'=>$stock_purchase_edit_data->purchase_supplier_id));
					//print_r($supplier_details);exit();
					if($mode=="edit"):
						$stock = $this->stock->get_product_details(array('billing_id' => $stock_purchase_edit_data->purchase_billing_id));
						$data['stock_code'] = $stock->stock_code;
						$data['stock_description'] = $stock->billing_description;
						$data['uom'] = $stock->billing_uom;
						$data['date'] = $stock_purchase_edit_data->created_on;
						$data['supplier_name'] = $supplier_details->customer_name;
						$data['supplier_code'] = $supplier_details->customer_code;
						$data['purchase_ref_no'] = $stock_purchase_edit_data->purchase_ref_no;
						$data['quantity'] = $stock_purchase_edit_data->purchase_quantity;
						$data['purchase_id'] = $stock_purchase_edit_data->purchase_id;
						$this->body_vars['cust_data'] = $data;
						$this->body_vars['save_url']=base_url('stock/create_purchasetable/edit');
						$this->body_file="stock/stock_purchase_edit.php";
					endif;
					if($mode=="view"):
						$result= $this->invoice->get_customer_details(array('customer_id'=>$invoice_edit_data->customer_id));
						$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
						$data['customer_phone']=$result->customer_phone;
						$data['customer_email']=$result->customer_email;
						$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
						$data['customer_currency']=$currency_data->currency_name;
						$data['currency_amount']=$currency_data->currency_rate;
						$this->body_vars['cust_data']=$data;
						$this->body_vars['mode']="view";
						$this->body_file="invoice/invoice_view.php";
					endif;
					/*==========================================*/
				else:
					redirect('invoice/invoicelist/pending','refresh');
				endif;
				endif;
			}
	 		/*stock purchases End*/
	 		public function enter_stock_adjustment()
	 		{
	 			is_logged_in('admin');
	 			has_permission();

	 			$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "),array('billing_type' => 'product'));

				$this->body_vars['save_url']=base_url('stock/create_adjustmenttable');
	 			$this->body_file="stock/stock_adjustment.php";
	 		}
	 		public function create_adjustmenttable($action="new")
	 		{
	 			is_logged_in('admin');
				has_permission(); 
				$post=$this->input->post();
				
				$adjustment_data = $post;
				if (isset($post)) {

					if($action=="new"){
						$insert_data = array();
						if (isset($insert_data)) {
							unset($insert_data);
						}
						$count = count($post['data']['product_id']);
						foreach ($post['data']['product_id'] as $product_id){
						   $insert_data['adjustment_billing_id'][] = $product_id;
						}
						foreach ($post['data']['quantity'] as $quantity) {
							$insert_data['adjustment_quantity'][] = $quantity;
						}
						foreach ($post['data']['sign'] as $sign) {
							$insert_data['adjustment_sign'][] = $sign;	
						}
						
						for ($i=0; $i < $count ; $i++) { 
							$data['adjustment_billing_id'] = $insert_data['adjustment_billing_id'][$i];
							$data['adjustment_quantity'] = $insert_data['adjustment_quantity'][$i];
							$data['adjustment_ref_no'] = $post['adjustment_ref_no'];
							$data['adjustment_remarks'] = $post['adjustment_remarks'];
							$data['adjustment_sign'] = $insert_data['adjustment_sign'][$i];
							$data['created_on'] = date('Y-m-d');
							$data['modified_on'] = date('Y-m-d');
							$adjustment_id[]=$this->custom->insertRow("stock_adjustment_master",$data);
						}
					}

					if($action=="edit"){
						
						$where=array('adjustment_id' => $adjustment_data['data']['adjustment_id'][0]);

						$data['adjustment_quantity'] = $adjustment_data['data']['quantity'][0];

						$data['adjustment_ref_no'] = $adjustment_data['adjustment_ref_no'];
						$data['adjustment_remarks'] = $adjustment_data['adjustment_remarks'];
						$data['adjustment_billing_id'] = $adjustment_data['product_id'];
						//var_dump($data['adjustment_billing_id']);exit();
						$data['adjustment_sign'] = $adjustment_data['data']['sign'][0];
						
						unset($adjustment_data['adjustment_id']);

						$this->db->trans_start();
						$res[]=$this->custom->updateRow("stock_adjustment_master",$data,$where);
						
						if ($this->db->trans_status() === FALSE || in_array("error", $res))
						{
							set_flash_message("message","danger","Something Went Wrong");	
						    $this->db->trans_rollback();
						}
						else
						{
							set_flash_message("message","success","Stock Updated Successfully");
						    $this->db->trans_commit();
						}
					}
					redirect('stock/stock_adjustmentlisting/confirmed');
				}
	 		}
	 		public function stock_adjustmentlisting()
	 		{
	 			is_logged_in('admin');
				has_permission();
	 		}
	 		public function stock_adjustment_manage($mode,$row_id="") 
			{
				is_logged_in('admin');
				has_permission();
							
				/*==========================================*/
				if($row_id!=""):
				$this->body_vars['stock_adjustment_edit_data']=$stock_adjustment_edit_data=$this->custom->getSingleRow('stock_adjustment_master',array("adjustment_id"=>$row_id));
				if($stock_adjustment_edit_data):
					
					$this->body_vars['product_options']=$this->custom->createDropdownSelect("billing_master",array('billing_id','stock_code','billing_description'),"Product",array(" : "," "),array('billing_type' => 'product'),array($stock_adjustment_edit_data->adjustment_billing_id));
					
					if($mode=="edit"):
						$stock = $this->stock->get_product_details(array('billing_id' => $stock_adjustment_edit_data->adjustment_billing_id));
						$data['stock_code'] = $stock->stock_code;
						$data['stock_description'] = $stock->billing_description;
						$data['uom'] = $stock->billing_uom;
						$data['date'] = $stock_adjustment_edit_data->created_on;
						//$data['product_id'] = $stock_adjustment_edit_data->adjustment_billing_id;
						
						$data['adjustment_ref_no'] = $stock_adjustment_edit_data->adjustment_ref_no;
						$data['adjustment_remarks'] = $stock_adjustment_edit_data->adjustment_remarks;
						$data['quantity'] = $stock_adjustment_edit_data->adjustment_quantity;
						$data['sign'] = $stock_adjustment_edit_data->adjustment_sign;
						$data['adjustment_id'] = $stock_adjustment_edit_data->adjustment_id;

						$this->body_vars['cust_data'] = $data;
						$this->body_vars['save_url']=base_url('stock/create_adjustmenttable/edit');
						$this->body_file="stock/stock_adjustment_edit.php";
					endif;
					if($mode=="view"):
						$result= $this->invoice->get_customer_details(array('customer_id'=>$invoice_edit_data->customer_id));
						$data['customer_address']=$result->customer_bldg_number.' , <br>'.$result->customer_street_name.' , <br>'.$result->customer_postal_code;
						$data['customer_phone']=$result->customer_phone;
						$data['customer_email']=$result->customer_email;
						$currency_data=$this->custom->getSingleRow("currency_master",array('currency_id'=>$result->currency_id));
						$data['customer_currency']=$currency_data->currency_name;
						$data['currency_amount']=$currency_data->currency_rate;
						$this->body_vars['cust_data']=$data;
						$this->body_vars['mode']="view";
						$this->body_file="invoice/invoice_view.php";
					endif;
					/*==========================================*/
				else:
					redirect('invoice/invoicelist/pending','refresh');
				endif;
				endif;
			}
	 		/*stock purchases end*/
	 		/*stock status start*/
	 		public function stock_status()
	 		{
	 			is_logged_in('admin');
				has_permission();
	 		}
	 		/*stock status end*/
	 		public function zap_stock()
	 		{
	 			is_logged_in('admin');
				has_permission();
				$this->body_file="common/blank.php";
				zapStock();
				redirect('dashboard','refresh');
	 		}
		}

?>