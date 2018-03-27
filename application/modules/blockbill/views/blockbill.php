<section class="content-header">
  <div class="row">
    <div class="col-md-3">
      <h2>
        <?php 
          echo "BlockBill";
        ?>
        <!-- <small>Preview of UI elements</small> --> 
      </h2>
    </div>
  </div>
 
  <?php 
    $list = array('active'=>"BlockBill");
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
          <div class="col-md-6">
            <button class='btn btn-primary $btn_style' id='edit'>
              <i class='fa fa-pencil' aria-hidden='true'></i> Edit
            </button>
            
            <button  class='btn bg-maroon $btn_style' id='delete'>
              <i class='fa fa-trash' aria-hidden='true'></i> Delete
            </button> 
            <button class='btn bg-navy $btn_style' id='print'>
              <i class='fa fa-print' aria-hidden='true'></i> Print
            </button> 
            <button class='btn btn-info $btn_style' id='refresh'>
              <i class='fa fa-refresh' aria-hidden='true'></i> Refresh
            </button> 
          </div>
          <div class="col-md-3" id="billing_mon_year_hide">
            <div class="form-group">
              <label class="control-label col-sm-4" for="billing_mon_year">Billing Month/Year:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control billing_mon_year" name="billing_mon_year" value="<?php echo isset($blockbill_data['next_bill_month'])?$blockbill_data['next_bill_month']:'';?>" id="billing_mon_year"  onkeyup="searchForBlockbilling($(this).val())">
                <!-- onchange="searchForBlockbilling($(this).val())" -->
              </div>
              <!--  -->
            </div>
          </div>
          <div class="col-md-3 pull-right" id="confirm_hide">
            <button class='btn btn-success $btn_style' id='success'>
              <i class='fa fa-check' aria-hidden='true'></i> Confirm
            </button> 
          </div>
        </div>
      </div>
      <div class="box box-warning">
        <div class="box-body">
          <div id="list_table">
                <table class="table " id="datatable" width="100%">
                  <thead>
                    <tr>
                     <th>Id</th>
                      <th>Reference</th>
                      <th>Bill Date</th>
                      <th>Customer Name</th>
                      <th>Customer Code</th>
                      <th>Currency</th>
                      <th>Contract Type</th>
                      <th>Contract Start Date</th>
                      <th>Contract End Date</th>
                      <th>Next Bill Date</th>
                      <th>Contract Sum</th>
                      <th>Lump Discount(%)</th>
                      <th>Net Contract Amount</th>
                      <th>Total Inclusive GST</th>
                      <th>Bill Status</th>
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
<script src="<?php echo JS_PATH."/dist/jquery.inputmask.bundle.js";?>"></script>
<script type="text/javascript">
  var table;
  var filter_flag = false;
  function date_change_format(date_slash){
    return date_slash.split("/").join("-");
  }
  function date_from_dash_to_slash(date_dash){
    return date_dash.split("-").join("/");
  }
  function searchForBlockbilling(searchValue){
    filter_flag = true;
    table.ajax.reload();
  }
  $(".billing_mon_year").inputmask("9999/99",{ "placeholder": "yyyy/mm" });
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
      "url": "<?php echo base_url('common/datatable/ajax_list/blockbill_list/'); ?>",
      "type": "POST",
      "data": function(d) {
        //alert(date_change_format($(".billing_mon_year").val()));
        if ($(".billing_mon_year").val() == '') {
          d.search_custom_date = '';
        }
        else if (filter_flag == true)
        {
          d.search_custom_date = date_change_format($(".billing_mon_year").val());  
        }
        else
        {
          d.search_custom_date = '';
        }
        
      }
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
    console.log(table.ajax.url);
    // ==================== magic goes here ============================================
    
    /* delete button */  
     $("#delete").on('click',function(){
      var url = '<?php echo base_url()."common/Ajax/blockbilllist_ajax/delete" ?>';
        showData("delete",url);
     });
     /*... over here ...*/
     $(".billing_mon_year").focus(function(){
        var url = '<?php echo base_url()."common/Ajax/blockbilllist_ajax/get_next_bill_month" ?>';
        $.ajax({url: url, success: function(result){
           var obj = $.parseJSON(result);
            console.log(obj);

            $(".billing_mon_year").val(obj.next_bill_month);
            $(".billing_mon_year").change();
        }});
     });
     /* confirm button */
     $("#success").on('click',function(){// during the post button clicking

      if ($(".billing_mon_year").val() == '') {
        alert("Please Input the Billing Month/Year!");
        return;
      }
      filter_flag = true;
      table.ajax.reload();
      setTimeout(function(){ 

        if (table.data().count() == 0) {
          alert("No contract for BlockBilling in Billing Month/Year" + date_change_format($('.billing_mon_year').val()));
          return;
        }
        else
        {

          var url_check_autobill = '<?php echo base_url()."common/Ajax/blockbilllist_ajax/check_autobill_state" ?>';
          $.ajax({url: url_check_autobill, success: function(result){
              var obj = $.parseJSON(result);
              console.log(obj);
              if (obj.check_flag) {
                var url_backup = '<?php echo base_url()."blockbill/backup_prev_blockbilling/" ?>';
                window.location.href=url_backup;  
              }
          }});
          var url = '<?php echo base_url()."common/Ajax/blockbilllist_ajax/postblockbill/" ?>';
          table.rows().select();
          $.confirm({
               
                title:"<i class='fa fa-info'></i> Confirm BlockBilling for Billing Year/Month " + date_change_format($('.billing_mon_year').val()) +"?",
                text: "Confirm ?",
                confirmButton: 'Yes',
                confirmButtonClass: 'btn-success',
                confirm: function(button) {
                    if (confirm('Have you done Back up?')) {

                        var url_backup = '<?php echo base_url()."blockbill/backup_prev_blockbilling/" ?>';
                        window.location.href=url_backup;
                            
                        $.post(url,{ search_custom_date: date_change_format($('.billing_mon_year').val()) } , function(result){

                          var exp_search_cus_date = date_change_format($('.billing_mon_year').val());
                          


                          $('#billing_mon_year').val("");
                          $("#form_data").html(''); // remove content of form.
                          $("#refresh").click();//refresh  the datatable.
                          $("#list_table").show(); // show data table
                          $("#message_area").html("<div class='alert alert-success fade in'><button type='button' class='close close-sm' data-dismiss='alert'><i class='fa fa-times'></i></button>BlockBill for " + exp_search_cus_date + " Successfully!</div>");
                        });
                        showHideButtons("list");
                        $('#billing_mon_year_hide').hide();
                        $('#confirm_hide').hide();
                    } else {
                        // Do nothing!
                        $("#refresh").click();
                        var url_backup = '<?php echo base_url()."blockbill/backup_prev_blockbilling/" ?>';
                        window.location.href=url_backup;

                    }
                },
                cancelButton: 'No',
                cancelButtonClass: 'btn-danger',
                cancel: function(button) {
                  $("#refresh").click();//refresh  the datatable.
                }

          });
        }
      }, 1000);
     });
     
     /* edit button */ 
     $("#edit").on('click',function(){
        var url = '<?php echo base_url()."blockbill/blockbill_manage/edit/" ?>';
        showData("blockbill_edit",url);
     });
     /*... over here ...*/

     /* print button */
     $("#print").on('click',function(){
        var url = '<?php echo base_url()."common/Ajax/blockbilllist_ajax/print_blockbill" ?>';
        showData("print",url);
     });
     /*... over here ...*/
  });
</script>