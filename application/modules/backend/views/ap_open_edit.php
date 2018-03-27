<section class="content-header">
  <h1>
    AP Opening Balance
    <!-- <small>Preview of UI elements</small> -->
  </h1>
  <?php 
    $list = array('active'=>'Backend');
    echo breadcrumb($list); 
  ?>
</section>
<br>
<section class="content">
  <?php echo get_flash_message('message'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Edit AP Opening Balance</h3>
        </div>
      </div>
    </div>
  </div>
  <form autocomplete="off" id="form_" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <section class="receipt">
                  <!-- info row -->
                  <div class="row receipt-info">
                    <div class="col-sm-4 receipt-col">
                      <b>To,</b>
                      <address>
                        <select name="customer_id" id="customer_id" title="Select Supplier" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                        <b>Name:</b><span id="customer_name"></span><br>
                        <b>Customer_Code:</b> <span id="customer_code"></span><br>
                        <b>Customer_Currency:</b> <span id="customer_currency"></span>
                      </address>
                    </div>
                                      
                  </div>
                  <!-- /.row -->
                  <br>
                  <hr>
                  <div class="table-responsive">
                    <table class="table" id="open_table">
                      <thead>
                        <tr>
                          <th class="hidden">id</th>
                          <th>Transaction Date</th>
                          <th>Doc Reference</th>
                          <th>Remarks</th>
                          <th>Amount</th>
                          <th>Sign</th>
                          <!-- <th>ACTION</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="hidden">
                            <input type="number" name="data[ap_open_id][0]" value="<?php echo $ap_open_edit_data->ap_open_id;?>">
                          </td>
                          <td>
                            <input type="date" class="transaction_date form-control" name="data[transaction_date][0]" value="<?php echo $ap_open_edit_data->ap_open_tran_date;?>">
                          </td>
                          <td>
                            <input type="text" class="doc_reference form-control" name="data[doc_reference][0]" value="<?php echo $ap_open_edit_data->ap_open_doc_ref;?>">
                          </td>
                          <td>
                            <input type="text" class="remarks form-control" name="data[remarks][0]" value="<?php echo $ap_open_edit_data->ap_open_remarks;?>">
                          </td>
                          <td>
                            <input type="text" class="amount form-control" name="data[amount][0]" value="<?php echo $ap_open_edit_data->ap_open_amount;?>">
                          </td>
                          <td>
                            <input type="text" class="sign form-control" name="data[sign][0]" value="+" value="<?php echo $ap_open_edit_data->ap_open_sign;?>">
                          </td>
                          <!-- <td>
                            <button class="form-control btn-warning" id="del_btn" onclick="delete_row(this)">Delete</button>
                            
                          </td> -->
                        </tr>
                      </tbody>
                    </table>


                  </div>
                  
                  <br>
                  
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  
                  <!-- /.row -->
                  <!-- <hr> -->
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-success pull-right" id="submitbtn"><i class="fa fa-credit-card"></i> Save
                      </button>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>

<script type="text/javascript">
$(document).ready(function(){
        // alert(document.URL);
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function () {
          $.confirm({
                title:"<i class='fa fa-info'></i> Exit Confirmation",
                text: "Are You Sure Exit ?",
                confirm: function(button) {
                  
                    window.history.go(-1);
                },
                cancel: function(button) {
                    history.pushState(null, null, document.URL);
                }
            });
        
    });
});
$(function() {
   $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
        $.post('<?php echo base_url('common/Ajax/backend_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
          console.log(data);
          var obj = $.parseJSON(data);
          console.log(obj);
          
          $("#customer_name").html(obj.customer_name);
          $("#customer_code").html(obj.customer_code);
          $("#customer_currency").html(obj.customer_currency);

        });
        // get_sub_total();
    }
  });
 
 });


</script>