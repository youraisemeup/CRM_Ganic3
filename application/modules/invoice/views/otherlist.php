<section class="content-header">
  <h1>
    <?php
  echo ucwords($this->uri->segment(3))." Listing";
  
  ?>
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
    $list = array('active'=>ucwords($this->uri->segment(3)).' Listing');
    echo breadcrumb($list); 
    ?> 
</section>
<section class="content">
  <div class="row"> 
    <div class="col-md-12">
      <div id="message_area">
        <?php get_flash_message('message'); ?>
      </div>
      <div class='box box-primary' id='buttons_panel'>
        <div class='box-header'>
          <button class='btn bg-navy $btn_style' id='print'>
            <i class='fa fa-print'></i> Print
          </button> 
        </div>
      </div>
      <div class="box box-warning">
        <div class="box-body">
          <div id="list_table">
            <table class="table " id="datatable" width="100%">
				    <thead>
                    <?php if($this->uri->segment(3)=="AR"){?>
						<tr>
						 <th>Id</th>
						  <th>Transaction Date</th>
						  <th>Doc No</th>
              <th>Customer Name</th>
						  <th>Customer Code</th>
						  <th>Currency</th>
              <th>Amount</th>
						  <th>Transaction Type</th>
						  <th>Remarks</th>
              
						  
						</tr>
					<?php } elseif($this->uri->segment(3)=="GL") {?>
						<tr>
						 <th>Id</th>
						  <th>Transaction Date</th>
						  <th>Doc No</th>
              <th>Customer Name</th>
						  <th>Customer Code</th>
              <th>Currency</th>
						  <th>Total Foreign Amt</th>
						  <th>Foreign GST</th>
						  <th>Net Foreign</th>
						  <th>Exchange Rate</th>
						  <th>Total Local Amt</th>
						  <th>Local GST</th>
						  <th>Net Local</th>
						  <th>Transaction Type</th>
						</tr>
					<?php } elseif($this->uri->segment(3)=="GST") {?>
						<tr>
						 <th>Id</th>
						 <th>Date of Invoice</th><!-- invoice_ref_no -->
             <th>Invoice Reference</th><!-- invoice_ref_no -->
						 <th>Customer Name</th>
             <th>Customer Code</th><!-- customer_code -->
						 <th>Stock Code</th><!-- stock_code -->
						 <th>Description</th><!-- billing_description -->
						 <th>GST CAT</th><!-- gst_code-->
             <th>Currency</th><!--currency_name-->
						 <th>After Lump Sum Discount Price</th><!-- discount -->
						 <th>GST Amount</th><!-- quantity-->
						 <th>Exchange Rate</th><!-- gst_rate -->						 
						 <th>After Lump Sum Discount Price(local)</th><!-- product_total -->
						 <th>GST Amount(local)</th><!-- price -->
						</tr>
            <!-- <tr>
             <th>Id</th>
             <th>Date of Invoice</th>
             <th>invoice reference</th>
             <th>customer code</th>
             <th>stock code</th>
             <th>description</th>
             <th>GST CAT</th>
             <th>currency</th>
             <th>foreign amt after lumpsum dis</th>
             <th>foreign GST amt</th>
             <th>x-rate</th>
             <th>local amt after lumpsum dis</th>
             <th>local gst amt</th>
            </tr> -->
					<?php } elseif($this->uri->segment(3)=="stock") {?>
						<tr>
						 <th>Id</th>
						 <th>Date of Transaction</th>
						  <th>Reference</th>
              <th>Customer Name</th>
						  <th>Customer Code</th>
              <th>Currency</th>
						  <th>Item Code</th>
						  <th>Item Name</th>
						  <th>Discount</th>
						  <th>Quantity</th>
              <th>Remarks</th>
						</tr>
					<?php }?>
                </thead>
                </table>
              </div>
           </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  jQuery(document).ready(function() {
    hideButtons();
    clearMessages();
    var form = $("form"); 
    var form_action = '';
    var url = '';
    // var test_url = " <?php echo base_url('common/datatable/ajax_list/other_list/') ?> ";
    
    // console.log(test_url);

    table = $('#datatable').DataTable({ 
    "scrollX": true,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [[0,"desc"]], //Initial no order.
  
    // Load data for the table's content from an Ajax source 
    "ajax": {
      "url": "<?php echo base_url('common/datatable/ajax_list/other_list/').$this->uri->segment(3); ?>",
      "type": "POST"
    },
  
    //Set column definition initialisation properties.
    "columnDefs": [
    { 
        "targets": [], //index no. of column
        "orderable": false, //set not orderable
      },
      { 
        "targets": [0], //index no. of column
        "visible": false, //set not orderable
      },
      ],
  
    });
    console.log(table);
      $("#print").on('click',function(){
        var url = '<?php echo base_url()."common/Ajax/invoicelist_ajax/print_invoice" ?>';
        showData("print",url);
     });
  });
</script>