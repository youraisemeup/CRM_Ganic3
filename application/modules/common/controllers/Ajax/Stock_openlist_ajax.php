<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Stock_openlist_ajax extends CI_Controller {

		public $view_path;
		public $data;
		public $table;
		public $logged_id;
		public function __construct()
		{ 
			parent::__construct();
			
			$this->table="open_stock_table";
			$this->logged_id = $this->session->user_id;
			$this->load->model('stock/stock_model','stock');
		}

		public function get_supplier_details()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$supplier_id=$this->input->post('supplier_id');
			$supplier_details=$this->custom->getSingleRow("customer_master",array('customer_id'=>$supplier_id));
			$data['supplier_name'] = $supplier_details->customer_name;
			$data['supplier_code'] = $supplier_details->customer_code;
			echo json_encode($data);
		}
		/*Start Stock Open Balance*/
		public function delete_open()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('open_stock_id' => $id);
			$result = $this->custom->updateRow($this->table,array('open_stock_status'=>'D'),$where);
			echo $result;
		}	

		public function post_open()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('open_stock_id' => $id);
			$result = $this->custom->updateRow($this->table,array('open_stock_status'=>"P"),$where);
			
 		    echo $result;
		}
		/*End Stock Open Balance*/
		/*Start Stock Purchase*/
		public function delete_purchase()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('purchase_id' => $id);
			$result = $this->custom->updateRow("stock_purchase_master",array('purchase_status'=>'D'),$where);
			echo $result;
		}	

		public function post_purchase()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('purchase_id' => $id);
			$result = $this->custom->updateRow("stock_purchase_master",array('purchase_status'=>"P"),$where);
 		    echo $result;
		}
		/*End Stock Purchase*/
		/*Start Stock Adjustment*/
		public function delete_adjustment()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('adjustment_id' => $id);
			$result = $this->custom->updateRow("stock_adjustment_master",array('adjustment_status'=>'D'),$where);
			echo $result;
		}	
		public function post_adjustment()
		{
			is_ajax();
			$id=$this->input->post('rowID');
			$where = array('adjustment_id' => $id);
			$result = $this->custom->updateRow("stock_adjustment_master",array('adjustment_status'=>"P"),$where);
 		    echo $result;
		}
		/*End Stock Adjustment*/
		/*stock status start*/
		public function get_product_details($billing_id = NULL)
		{
			$product_details = $this->custom->getSingleRow('billing_master',array('billing_id'=>$billing_id));
			return $product_details;
		}
		public function get_stock_status()
		{
			is_ajax();
			$this->body_file="common/blank.php";
			$this->header_file="common/blank.php";
			$this->footer_file="common/blank.php";
			$post=$this->input->post();
			$sql = "SELECT product_id, SUM(quantity) AS quantity FROM ( SELECT product_id,SUM(quantity) * (-1) AS quantity FROM (SELECT * FROM (SELECT product_id, quantity FROM invoice_master JOIN stock_invoice_master ON invoice_master.invoice_id = stock_invoice_master.invoice_id WHERE invoice_status = 'P') AS total 
WHERE total.product_id IN (SELECT billing_id FROM billing_master WHERE billing_type = 'Product')) AS stock_invoice_master  GROUP BY(product_id)
UNION
SELECT open_billing_id AS product_id, SUM(open_stock_quantity) AS quantity FROM open_stock_table WHERE open_stock_status = 'P' GROUP BY(open_billing_id)
UNION
SELECT purchase_billing_id AS product_id, SUM(purchase_quantity) AS quantity FROM stock_purchase_master WHERE purchase_status = 'P' GROUP BY(purchase_billing_id)
UNION
SELECT adjustment_billing_id AS product_id, SUM(adjustment_quantity) AS quantity FROM stock_adjustment_master WHERE adjustment_sign = '+' AND adjustment_status = 'P' GROUP BY(adjustment_billing_id)
UNION
SELECT adjustment_billing_id AS product_id, SUM(adjustment_quantity) * (-1) AS quantity FROM stock_adjustment_master WHERE adjustment_sign = '-' AND adjustment_status = 'P' GROUP BY(adjustment_billing_id)) AS total GROUP BY(product_id);
";

			$query = $this->db->query($sql);
			
			$product_array = $query->result();
		
			$tbody_html = '';
			$i = 0;
			foreach ($product_array as $key => $value) {
				$billing_id = $value->product_id;
				
				$quantity = $value->quantity;
				$details = $this->get_product_details($billing_id);

				$tbody_html .= "<tr><td>";
				$tbody_html .= $details->stock_code;
				$tbody_html .= "</td><td>";
				$tbody_html .= $details->billing_description;
				$tbody_html .= "</td><td>";
				$tbody_html .= $quantity;
				$tbody_html .= "</td><td>";
                $tbody_html .= $details->billing_uom;
                $tbody_html .= "</td></tr>";              
			}

			$result['table_html'] = $tbody_html;
			
			echo json_encode($result);
			
		}
		/*stock status end*/
	}
?>