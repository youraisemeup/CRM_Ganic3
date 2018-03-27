 <?php // echo "<pre>";print_r($receipt_edit_data);
// echo "<pre>";print_r($cust_data);die;
if($mode!="email")
{
?>
<section class="content-header" id="no-email-1">
  <?php 
    $list = array('active'=>'View Receipt');
    echo breadcrumb($list); 
  ?>
</section>
<br>
<section class="content">
  <?php echo get_flash_message('message'); ?>
  <div class="row" id="no-email-2">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">View Receipt</h3>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
    <div class="row" id="print_data">
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
                        <?php echo $this->custom->getSingleValue("customer_master","customer_name",array("customer_id"=>$receipt_edit_data->customer_id)); ?>
                        <select name="customer_id" class="hidden" id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                        <?php echo $cust_data['customer_address1']; ?><br>
                        <?php echo $cust_data['customer_address2']; ?><br>
                      </address>
                    </div>
                    <div class="col-sm-4 receipt-col"></div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Date:</b> <?php echo date('d-m-Y'); ?><br>
                      <b>Receipt : <?php echo $receipt_edit_data->receipt_ref_no; ?></b><br>
                      <input type='hidden' name='receipt_ref_no' id="receipt_ref_no" value="<?php echo $receipt_edit_data->receipt_ref_no; ?>">
                      <br>
                      
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <br>
                  
                  <!-- <legend></legend> -->
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  
                  <!-- /.row -->
                  
                  <!-- /.row -->
                  
                  <br>
                  <br><br>
                  <div class="row col-md-7" align="left">
                    <div class="col-xs-12">
                      <p>Received with thanks the sum of <?php echo $receipt_edit_data->currency.' ';?><?php echo $cust_data['receipt_amount']; ?> being payment for: <span id="invoice_reference"></span></p>
                      

                    </div>
                    <br>
                    <div  class="col-xs-12">
                        <p> 
                        <span class="col-xs-6">Bank: <?php echo isset($receipt_edit_data->bank)?$receipt_edit_data->bank:'';?> </span> <span class="col-xs-6">Cheque: <?php echo isset($receipt_edit_data->cheque)?$receipt_edit_data->cheque:'';?></span> 
                        </p>
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-12">
                        <p>
                        <span class="col-xs-6">OTHER REFERENCE IF ANY:</span>
                        <span class="col-xs-6">  <?php echo isset($receipt_edit_data->other_reference)?$receipt_edit_data->other_reference:'';?> </span></p>
                    </div>
                    <!-- /.col -->
                  </div>
                   <!-- /.row -->
                  <!-- this row will not appear when printing -->
                  
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
    
  ?>
</section>
<!-- <script type="text/javascript">
$(function() {
  //=========================customer details ====================================================
   $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php // echo base_url('common/Ajax/invoicelist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        $("#customer_address").html(obj.customer_address);
        $("#customer_phone").html(obj.customer_phone);
        $("#customer_email").html(obj.customer_email);
        if(obj.customer_currency!="SGD"){
          $("#total_curr").removeClass('hidden');
          $("#cust_curr").text(obj.customer_currency);
        }
        else{
          $("#total_curr").addClass('hidden');
        }
        $("#currency_amount").val(obj.currency_amount);
      });
  }
  }).trigger('change');
});
</script> -->
<?php 
if($mode=="print")
{
?>
<script type="text/javascript">
        $("#print_data").print({
      mediaPrint: true,
        title: " "
        });
</script>
<?php    
}
?>
<?php 
if($mode=="email")
{
?>
<script type="text/javascript">
$("#no-email-2").html('');
$("#no-email-1").html('');
</script>
<?php    
}
?>