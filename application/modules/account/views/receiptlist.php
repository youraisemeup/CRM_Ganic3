<section class="content-header">
  <h1>
    <?php echo ucwords($this->uri->segment(3)); ?> Receipt List
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
    $list = array('active'=>ucwords($this->uri->segment(3)).' Receipt List ');
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
          <button class='btn btn-warning $btn_style' id='view'>
            <i class='fa fa-eye' aria-hidden='true'></i> View
          </button>
          <button class='btn btn-primary $btn_style' id='edit'>
            <i class='fa fa-pencil' aria-hidden='true'></i> Edit
          </button>
          <?php if($this->uri->segment(3)!="confirm"): ?>
          <button class='btn btn-success $btn_style' id='confirm'>
            <i class='fa fa-check' aria-hidden='true'></i> Confirm
          </button> 
        <?php endif; ?>
        <?php if($this->uri->segment(3)!="rejected"): ?>
          <button class='btn btn-danger $btn_style' id='reject'>
            <i class='fa fa-ban' aria-hidden='true'></i> Reject
          </button> 
          <?php endif; ?>
          <button class='btn bg-maroon $btn_style' id='delete'>
            <i class='fa fa-trash' aria-hidden='true'></i> Delete
          </button> 
          <button class='btn bg-purple $btn_style' id='email'>
            <i class='fa fa-inbox' aria-hidden='true'></i> Send Email To Customer
          </button> 
          <button class='btn bg-navy $btn_style' id='print'>
            <i class='fa fa-print' aria-hidden='true'></i> Print
          </button> 
          <button class='btn btn-info $btn_style' id='refresh'>
            <i class='fa fa-refresh' aria-hidden='true'></i> Refresh
          </button> 
        </div>
      </div>
      <div class="box box-warning">
        <div class="box-body">
          <div id="list_table">
                <table class="table " id="datatable" width="100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Receipt Reference No</th>
                      <th>Customer</th>
                      <th>bank</th>
                      <th>cheque</th>
                      <th>other_reference</th>
                      <th>amount</th>
                      <th>invoices</th>
                      <th>Created On</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <form autocomplete="off"method="post" action="#" enctype="multipart/form-data" class="validate">
                <div id="form_data"></div>
              </form>
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
    table = $('#datatable').DataTable({ 
    "scrollX": true,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [[1,"asc"]], //Initial no order.
  
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo base_url('common/datatable/ajax_list/receipt_list/').$this->uri->segment(3); ?>",
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

    // ==================== magic goes here ============================================
    /* delete button */
     $("#delete").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/receiptlist_ajax/delete" ?>';
        showData("delete",url);
     });
     /*... over here ...*/

     /* confirm button */
     $("#confirm").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/receiptlist_ajax/confirm" ?>';
        showData("confirm",url);
     });
     /*... over here ...*/

     /* reject button */
     $("#reject").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/receiptlist_ajax/reject" ?>';
        showData("reject",url);
     });
     /*... over here ...*/

     /* view button */
     $("#view").on('click',function(){
        var url = '<?php echo base_url()."receipt/receipt_manage/view/" ?>';
        showData("receipt_view",url);
     });
     /*... over here ...*/

     /* edit button */
     $("#edit").on('click',function(){
        var url = '<?php echo base_url()."receipt/receipt_manage/edit/" ?>';
        showData("receipt_edit",url);
     });
     /*... over here ...*/

    /* email button */
     $("#email").on('click',function(){
        var url = '<?php echo base_url()."common/Ajax/receiptlist_ajax/print_receipt/email" ?>';
        showData("email",url);
     });
     /*... over here ...*/

     /* print button */
     $("#print").on('click',function(){
        var url = '<?php echo base_url()."common/Ajax/receiptlist_ajax/print_receipt" ?>';
        showData("print",url);
     });
     /*... over here ...*/
  });
</script>