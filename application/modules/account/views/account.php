<section class="content-header">
  <?php 
    $list = array('active'=>'Account');
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
          <div class="tooltip">Hover over me
  <span class="tooltiptext">Tooltip text</span>
</div>
          <h3 class="box-title">Account</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- <form autocomplete="off" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>"> -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-header with-border">
                <center>
                  <strong>
                    <img src="<?php echo UPLOAD_PATH.'site/'.$company_details->company_logo ?>" class='img img-thumbnail' height="150px" width="150px"/>
                    <h4><?php echo $company_details->company_name ?></h4>
                    <?php echo $company_details->company_address; ?>
                    <br>GST Register Number : <?php echo $company_details->gst_reg_no ?> | UEN No. : <?php echo $company_details->uen_no; ?>
                    <br>Phone : <?php echo $company_details->phone ?> | Fax : <?php echo $company_details->fax ?>
                  </strong>
                </center>
              </div>
                <hr>
              <div class="box-body">
                <section class="receipt">
                  <!-- info row -->
                  <div class="row receipt-info">
                    <div class="col-sm-4 receipt-col">
                      <b>To,</b>
                      <address>
                        <select name="customer_id" id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                         <span id="customer_bldg_street"></span><br>
                         <span id="customer_cntry_post"></span><br>
                      </address>
                    </div>
                    <div class="col-sm-4 receipt-col"></div>
                    <!-- /.col -->
                    <div class="col-sm-4 receipt-col">
                      <b>Date:</b> <?php echo date('d-m-Y'); ?><br>
                      <!-- <br>
                      <b>Account : #REC\<?php echo $receipt_details->receipt_text_prefix.'\\'.$total_receipt; ?></b><br>
                      <input type='hidden' name='receipt_ref_no' id="receipt_ref_no" value="REC\<?php echo $receipt_details->receipt_text_prefix.'\\'.$total_receipt; ?>">
                       -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <br>
                  <hr>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Reference</th>
                          <th>Remarks</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                        </tr>
                      </thead>
                      <tbody id="account_table">
                        
                      </tbody>
                    </table>


                  </div>
                  <br>
                  <br>
                  <br>
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  
                  <!-- /.row -->
                  <!-- <hr> -->
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </form> -->
</section>
<!-- <script type="text/javascript" src="<?php echo JS_PATH ?>receipt.js"></script> -->
<script type="text/javascript">
$(function() {
  //=========================customer details ====================================================
  $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/account_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        console.log(obj);
        $("#customer_bldg_street").html(obj.customer_bldg_street);
        $("#customer_cntry_post").html(obj.customer_cntry_post);
        $("#account_table").html(obj.table_html);
        
        // $("#customer_cntry_post").html(obj.customer_cntry_post);
        // $("#currency").html(obj.customer_currency);
        // $("#rec_currency").val(obj.customer_currency);

        // $( "#invoice_reference_id" ).html( obj.invoice_reference );
        // $("#customer_email").html(obj.customer_email);
        

      });
      // get_sub_total();
  }
  });
    //===============================================invoice reference ===================================
  $("#invoice_reference_id").change(function(event) {
      var invoice_id = [];

      $.each($("#invoice_reference_id option:selected"), function(){            
          invoice_id.push($(this).val());
      });
      
      if(invoice_id!=""){
          $.post('<?php echo base_url('common/Ajax/receiptlist_ajax/get_receipt_data') ?>', {  invoice_id: invoice_id}, function(data, textStatus, xhr) {
            obj = $.parseJSON(data);
            console.log(typeof obj.invoic_name);
            console.log(obj);
            $("#invoice_reference").html(obj.invoic_name.join(", "));
            $("#amountinwords").html(' '+obj.total_in_words);
            $("#rec_amount").val(obj.total);

            $("#rec_invoice").val(obj.invoic_name);

          });
      }
  
  });
});

</script>