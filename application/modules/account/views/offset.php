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
  <form autocomplete="off" id="form_" class="form-horizontal" method="post" action="<?php echo $save_url; ?>">
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
                    <div class="col-sm-4">
                      <b>Select Customer</b>
                      <address>
                        <select name="customer_id" id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                         <span id="customer_bldg_street"></span><br>
                         <span id="customer_cntry_post"></span><br>
                      </address>
                    </div>
                  <div class="col-sm-4">
                        <b>Cut Off Date</b>
                        <input type="text" name="offset_Date" id="offset_Date" class="form-control" required="" />
                        <br>
                        <button type="submit" class="btn btn-success pull-right" id="submitbtn"><i class="fa fa-credit-card"></i> Submit
                        </button>
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
<!-- <script type="text/javascript" src="<?php echo JS_PATH ?>receipt.js"></script> -->
<script src="<?php echo JS_PATH."/dist/jquery.inputmask.bundle.js";?>"></script>

<script type="text/javascript">
  $cansend = false;
  $("#offset_Date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });

  $('form#form_').submit(function(){
     var form = $(this);
         if ($cansend == true)
          {
              $cansend = false;
              return true;
          }
          $.confirm({
              title:"<i class='fa fa-info'></i> Offset Confirmation",
              text: "Confirm?",
              cancelButton: "No",
              confirm: function(button) {
                  $cansend = true;
                  var offset_date = document.getElementById('offset_Date').value;
                  //alert(offset_date);
                  $.post('<?php echo base_url('common/Ajax/receiptlist_ajax/offset_records') ?>', {customer_id: customer_id,offset_date: offset_date}, function(data, textStatus, xhr) {
                    console.log(data);
                      form.submit();
                   
                  });
                  
                  
              },
              cancel: function(button) {
               
                  $cansend = true;
                  //form.submit();
              }
          });
          return false;
  })
  $(function()
  {
     $("#customer_id").change(function(event) {
      customer_id=$("#customer_id option:selected").val();
      if(customer_id!=""){
        $.post('<?php echo base_url('common/Ajax/account_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
          console.log(data);
          var obj = $.parseJSON(data);
          console.log(obj);
          $("#customer_bldg_street").html(obj.customer_bldg_street);
          $("#customer_cntry_post").html(obj.customer_cntry_post);
         
        });
      }
    }); 
  });
    
</script>