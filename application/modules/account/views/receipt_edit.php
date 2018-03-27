<section class="content-header">
  <?php // echo "<pre>";print_r($receipt_edit_data);die;
    $list = array('active'=>'Edit Receipt');
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
          <h3 class="box-title">Edit Receipt</h3>
        </div>
      </div>
    </div>
  </div>
  <form autocomplete="off" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>">
    <input type="hidden" name="receipt_id" value="<?php echo $receipt_edit_data->receipt_id; ?>">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-header with-border">
                <center>
                  <strong>
                    <img src="<?php echo UPLOAD_PATH.'site/'.$company_details->company_logo ?>" class='img img-thumbnail' height="100px" width="100px"/>
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
                      <br>
                      <b>Date:</b> <?php echo date('d-m-Y'); ?><br>
                      <b>Receipt : <?php echo $receipt_edit_data->receipt_ref_no; ?></b><br>
                      <input type='hidden' name='receipt_ref_no' id="receipt_ref_no" value="<?php echo $receipt_edit_data->receipt_ref_no; ?>">
                     
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <br>

                  <br>
                  <!-- <legend></legend> -->
                  <div class="row">
                    <div class="col-xs-12 col-md-5">
                      <select name="invoice_reference_id[]" id="invoice_reference_id" title="Select Product" class="form-control select2" multiple="multiple">
                          <?php echo $invoice_reference; ?>
                        </select>
                    </div>
                  </div>
                  <br>
               
                  </div> 
                  <!-- /.row -->
                   
                  <!-- /.row -->
                  
                  <br>
                  <br>
                  <br>
                   <!-- /.row -->
                  <div class="row col-md-7" align="left">
                    <div class="col-xs-12">
                      <p>Received with thanks the sum of <span id="currency">...</span><span id="amountinwords">...</span> being payment for: <span id="invoice_reference"></span></p>
                      

                    </div>
                    <br>
                    <div  class="col-xs-12">
                        <p> 
                        <span class="col-xs-6">Bank: <input type="text" name="bank" value="<?php echo isset($receipt_edit_data->bank)?$receipt_edit_data->bank:'';?>"></span> <span class="col-xs-6">Cheque: <input type="text" name="cheque" value="<?php echo isset($receipt_edit_data->cheque)?$receipt_edit_data->cheque:'';?>"></span> 
                        </p>
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-12">
                        <p>
                        <span class="col-xs-6">OTHER REFERENCE IF ANY:</span>
                        <span class="col-xs-6">  <input type="text" name="other_reference" class="m-l-55" value="<?php echo isset($receipt_edit_data->other_reference)?$receipt_edit_data->other_reference:'';?>"> </span></p>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <!-- <hr> -->
                  
                  <br>
                  <input type="hidden" name="currency" id="rec_currency">
                  <input type="hidden" name="amount" id="rec_amount">
                  <input type="hidden" name="invoice" id="rec_invoice">
                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-credit-card"></i> Submit
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
  <?php
    
  ?>
</section>
<!-- <script type="text/javascript" src="<?php echo JS_PATH ?>receipt.js"></script> -->
<script type="text/javascript">

$(function() {
  receipt_id='<?php echo $receipt_edit_data->receipt_id; ?>';
  invoice_ref_id='<?php echo $receipt_edit_data->invoice_reference_id; ?>';
  //=========================customer details ====================================================
  $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();

    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/receiptlist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        $("#customer_bldg_street").html(obj.customer_bldg_street);
        $("#customer_cntry_post").html(obj.customer_cntry_post);
        $("#customer_cntry_post").html(obj.customer_cntry_post);
        $("#currency").html(obj.customer_currency);
        $("#rec_currency").val(obj.customer_currency);
        $( "#invoice_reference_id" ).html( obj.invoice_reference );
        $('#invoice_reference_id').select2().val($.parseJSON(invoice_ref_id)).trigger('change');

      });
      // get_sub_total();
  }
  }).trigger('change');

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
