<section class="content-header">
  <h1>
    <?php
  echo ucwords($this->uri->segment(3))."AP Listing";
  
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
     <!--  <div class='box box-primary' id='buttons_panel'>
        <div class='box-header'>
          <button class='btn bg-navy $btn_style' id='print'>
            <i class='fa fa-print'></i> Print
          </button> 
        </div>
      </div> -->
      <div class="box box-warning">
        <div class="box-body">
          <div id="list_table">
            <table class="table " id="datatable" width="100%">
				    <thead>
      						<tr>
      						 <th>Id</th>
      						  <th>Transaction Date</th>
      						  <th>Doc Reference</th>
                    <th>Supplier Name</th>
      						  <th>Supplier Code</th>
      						  <th>Currency</th>
                    <th>Total Amount</th>
      						  <th>Tranaction type</th>
      						  <th>Remarks</th>
      						</tr>
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
    // var test_url = 
    
    // console.log(test_url);

    table = $('#datatable').DataTable({ 
    "scrollX": true,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [[0,"desc"]], //Initial no order.
  
    // Load data for the table's content from an Ajax source 
    "ajax": {
      "url": "<?php echo base_url('common/datatable/ajax_list/aplist/').$this->uri->segment(3); ?>",
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
     //  $("#print").on('click',function(){
     //    var url = '<?php echo base_url()."common/Ajax/invoicelist_ajax/print_invoice" ?>';
     //    showData("print",url);
     // });
  });
</script>