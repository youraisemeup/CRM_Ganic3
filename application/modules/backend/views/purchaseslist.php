<section class="content-header">
  <h1>
    <?php 
    if($this->uri->segment(3)=="confirmed")
  {
  echo "Confirmed Purchases";
  }
  else
  echo ucwords($this->uri->segment(3))." Purchases";
  
  ?>
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
  if($this->uri->segment(3)=="confirm")
  {
    $list = array('active'=>ucwords('Confirmed Purchases'));   
  }
  else
  {
      $list = array('active'=>ucwords($this->uri->segment(3)).' Purchases');
  }
    
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
          <!-- <button class='btn btn-warning $btn_style' id='view'>
            <i class='fa fa-eye' aria-hidden='true'></i> View
          </button> -->
        <?php if($this->uri->segment(3)=="confirmed"): ?>
          <button class='btn btn-primary $btn_style' id='edit'>
            <i class='fa fa-pencil' aria-hidden='true'></i> Edit
          </button>
          <button class='btn btn-success $btn_style' id='success'>
            <i class='fa fa-check' aria-hidden='true'></i> Post
          </button> 
          <button class='btn btn-success $btn_style' id='success_all'>
            <i class='fa fa-check' aria-hidden='true'></i> POST ALL
          </button> 
          <!-- <button class='btn btn-danger $btn_style' id='reject'>
            <i class='fa fa-ban' aria-hidden='true'></i> Reject
          </button>  -->
          <button  class='btn bg-maroon $btn_style' id='delete'>
            <i class='fa fa-trash' aria-hidden='true'></i> Delete
          </button> 
          <button class='btn bg-navy $btn_style' id='print'>
            <i class='fa fa-print' aria-hidden='true'></i> Print
          </button> 
          <button class='btn btn-info $btn_style' id='refresh'>
            <i class='fa fa-refresh' aria-hidden='true'></i> Refresh
          </button> 
        <?php endif; ?>
          <?php if($this->uri->segment(3)=="posted"): ?>
            <button class='btn bg-navy $btn_style' id='print'>
            <i class='fa fa-print' aria-hidden='true'></i> Print
            </button> 
            <button class='btn btn-info $btn_style' id='refresh'>
              <i class='fa fa-refresh' aria-hidden='true'></i> Refresh
            </button> 
          <?php endif; ?>
          <?php if($this->uri->segment(3)=="deleted"): ?>
            <button class='btn bg-navy $btn_style' id='print'>
            <i class='fa fa-print' aria-hidden='true'></i> Print
            </button> 
            <button class='btn btn-info $btn_style' id='refresh'>
              <i class='fa fa-refresh' aria-hidden='true'></i> Refresh
            </button> 
          <?php endif; ?>
        </div>
      </div>
      <div class="box box-warning">
        <div class="box-body">
          <div id="list_table">
                <table class="table " id="datatable" width="100%">
                  <thead>
                    <tr>
                     <th>Id</th>
                     <th>Transaction Date</th>
                      <th>Purchases Reference</th>
                      <th>Supplier Name</th>
                      <th>Total Amount(Foreign)</th>
                      <th>Exchange Rate</th>
                      <th>Total Amount(Local)</th>
                      <th>Local Handling(SGD)</th>
                      <th>freight_insurance</th>
                      <th>GST(SGD)</th>
                      <th>Total(before GST)</th>
                      <th>Import Permit Reference</th>
                      <th>Tranaction type</th>
                      <th>Created On</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <form autocomplete="off" method="post" action="#" enctype="multipart/form-data" class="validate">
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
    "order": [[0,"desc"]], //Initial no order.
  
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo base_url('common/datatable/ajax_list/purchases_list/').$this->uri->segment(3); ?>",
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
      var url = '<?php echo base_url()."common/Ajax/backend_ajax/delete_purchase" ?>';
        showData("delete",url);
     });
     /*... over here ...*/

     /* confirm button */
     $("#success_all").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/backend_ajax/success_purchase" ?>';
        table.rows().select();
        showData("All Confirm",url);
     });

     $("#success").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/backend_ajax/success_purchase" ?>';
        showData("confirm",url);
     });
     /*... over here ...*/

     /* reject button */
     // $("#reject").on('click',function(){
     //  var url = '<?php echo base_url()."common/Ajax/quotationlist_ajax/reject" ?>';
     //    showData("reject",url);
     // });
     // /*... over here ...*/

     // /* view button */
     // $("#view").on('click',function(){
     //    var url = '<?php echo base_url()."quotation/quotation_manage/view/" ?>';
     //    showData("quotation_view",url);
     // });
     /*... over here ...*/

     /* edit button */
     $("#edit").on('click',function(){
        var url = '<?php echo base_url()."backend/purchaseslist_manage/edit/" ?>';
        showData("purchaseslist_edit",url);
     });
     /*... over here ...*/

    /* email button */
     $("#email").on('click',function(){
        var url = '<?php echo base_url()."common/Ajax/quotationlist_ajax/print_quotation/email" ?>';
        showData("email",url);
     });
     /*... over here ...*/

     /* print button */
     $("#print").on('click',function(){
        var url = '<?php echo base_url()."common/Ajax/quotationlist_ajax/print_quotation" ?>';
        showData("print",url);
     });
     /*... over here ...*/
  });
</script>