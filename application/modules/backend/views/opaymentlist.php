<section class="content-header">
  <h1>
    <?php 
    if($this->uri->segment(3)=="confirmed")
  {
  echo "Confirmed OTHER Payment";
  }
  else
  echo ucwords($this->uri->segment(3))." OTHER Payment";
  
  ?>
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
  if($this->uri->segment(3)=="confirm")
  {
    $list = array('active'=>ucwords('Confirmed OTHER Payment'));   
  }
  else
  {
      $list = array('active'=>ucwords($this->uri->segment(3)).' OTHER Payment');
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
                      <th>Reference</th>
                      <th>Payee</th>
                      <th>Account</th>
                      <th>Description</th>
                      <th>Amount(SGD)</th>
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
      "url": "<?php echo base_url('common/datatable/ajax_list/opay_list/').$this->uri->segment(3); ?>",
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
      var url = '<?php echo base_url()."common/Ajax/backend_ajax/delete_opayment" ?>';
        showData("delete",url);
     });
     /*... over here ...*/

     /* confirm button */
     $("#success_all").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/backend_ajax/success_opayment" ?>';
        table.rows().select();
        showData("All Confirm",url);
     });

     $("#success").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/backend_ajax/success_opayment" ?>';
        showData("confirm",url);
     });
     /* edit button */
     $("#edit").on('click',function(){
        var url = '<?php echo base_url()."backend/opaymentlist_manage/edit/" ?>';
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