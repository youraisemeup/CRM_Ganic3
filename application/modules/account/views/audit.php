<section class="content-header">
  <h1>
    Audit List
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
    $list = array('Audit List');
    echo breadcrumb($list); 
    ?>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div id="message_area">
        <?php get_flash_message('message'); ?>
      </div>

    <div class="row">
    <div class="col-md-12">
      <div id="message_area">
        <?php get_flash_message('message'); ?>
      </div>

      <div class='box box-primary' id='buttons_panel'>
        <div class='box-header'>
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
                      <th>Document Date</th>
                      <th>Document Reference Number</th>
                      <th>Customer Code</th>
                      <th>Currnecy Type</th>
                      <th>Total Amount</th>
                      <th>Sign</th>
                      <th>Transaction Type</th>
                      <th>Remarks</th>
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
    "order": [[0,"asc"]], //Initial no order.
  
    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo base_url('common/datatable/ajax_list/audit_list/'); ?>",
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

  });
</script>