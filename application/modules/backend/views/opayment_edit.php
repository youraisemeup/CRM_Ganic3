<section class="content-header">
  <?php 
    $list = array('active'=>'OTHER Payment Edit');
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
          <h3 class="box-title">OTHER Payment</h3>
        </div>
      </div>
    </div>
  </div>
  <form  id="form_" class="form-horizontal validate" autocomplete="off" method="post" action="<?php echo $save_url; ?>">
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
                <section class="invoice">
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                      <div class="row col-md-12">
                        <div class="col-md-3">
                          <b>Payee</b>
                          <address>
                            <select name="payee_id" id="payee_id" title="Select Payee" class="form-control select2" required="">
                              <?php echo $payee_options; ?>
                            </select><br>
                            <input type="hidden" name="opay_payee" id="payee_name">
                          </address>  
                        </div>
                        <div class="col-md-9"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-3">
                        <b>Date : </b>     
                      </div>
                      <div class="row col-md-4 form-group error_block">
                        <input type="text" name="opay_date" class="doc_date form-control" required="" value="<?php echo $opayment_edit_data->opay_date; ?>">   
                      </div>
                      <div class="col-md-5"></div>
                    </div>

                    <div class="col-md-6">
                      <div class="col-md-6">
                        <b>Reference : <?php echo $opayment_edit_data->opay_ref_no; ?></b>    
                      </div>
                      <div class="col-md-3 form-group error_block">
                        <input type='hidden' name='opay_ref_no' id="payment_ref_no" value="<?php echo $opayment_edit_data->opay_ref_no; ?>">
                      </div>
                      <div class="col-md-3"></div>  
                    </div>
                  </div>
                  <br>
                  <br>
                  <hr>
                  <div class="row">
                    <div class="col-xs-12 col-md-5 product_id_div">
                      <select name="coa_id" id="coa_id" title="Select Account" class="form-control select2">
                          <?php echo $coa_code_options; ?>
                        </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-xs-12 table-responsive">
                      <table class="table table-striped" id="product_table">
                        <thead>
                          <tr>
                            <th>S.NO</th>
                            <th>ACCOUNT CODE & DESCRIPTION</th>
                            <th style="min-width: 120px;">AMOUNT(<span class="customer_currency_unit">SGD </span>)</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    <!-- <div id="another_entry" class="hidden col-md-6 col-md-offset-6 col-xs-12">
                      <div class="pull-right">
                        Done With Accounts List?
                        <button type="button" class="btn btn-primary" id="input_another_entry">Yes</button>
                        <button type="button" class="btn btn-primary " onclick='$("#coa_id").select2("open");'>No</button> 
                      </div>
                    </div> -->
                    <input type="hidden" name="opay_id_edit" value="<?php echo $opayment_edit_data->opay_id;?>">
                    <input type="hidden" name="opay_coa_id" id="opay_coa_id" value="<?php echo $opayment_edit_data->opay_coa_id;?>">
                    
                      <br>
                  </div>
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <br>
                      <button type="submit" class="btn btn-success pull-right" id="submitbtn"><i class="fa fa-credit-card"></i> Submit
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
<script src="<?php echo JS_PATH."/dist/jquery.inputmask.bundle.js";?>"></script>

<script type="text/javascript" src="<?php echo JS_PATH ?>backend.js"></script>
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

  var opay_id_edit = '<?php echo $opayment_edit_data->opay_id;?>'

  coa_id=$("#coa_id option:selected").val();
  $('#opay_coa_id').val(coa_id);
  //alert(coa_id);

  if(coa_id!=""){
    $.post('<?php echo base_url('common/Ajax/backend_ajax/get_edit_coa_code_description') ?>', {coa_id: coa_id,opay_id: opay_id_edit}, function(data, textStatus, xhr) {

      console.log(data);
      var rowCount = $('#product_table tbody tr').length;
      $("#product_table tbody").append("<tr id='"+coa_id+"'><td class='hidden'></td><input type='hidden' name='coa_row_id[]' value='"+ coa_id +"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
        console.log(data);
      $("#coa_id option:selected").remove();
      //$("#amount_"+coa_id).focus().val('');
    });
  }

  $("#payee_id").select2({
    tags: true
  });

  //=========================customer details ====================================================
  
 $cansend = false;
    $(".doc_date").inputmask("9999/99/99",{ "placeholder": "yyyy/mm/dd" });
    $('form#form_').submit(function(){
     var form = $(this);
         if ($cansend == true)
            {
                $cansend = false;
                return true;
            }
            $('#quot_status').html('');
            $.confirm({
                title:"<i class='fa fa-info'></i> OTHER Payment Confirm",
                text: "Confirm?",
                cancelButton: "No",
                confirm: function(button) {
                  $('#quot_status').html('');
                    $('#quot_status').html('<input type="hidden" name="invoice_status" value="C">');
                    $cansend = true;
                    form.submit();
                },
                cancel: function(button) {
                 
                    $cansend = true;
                }
            });
            return false;
    })
  

  var currencyUnit="SGD";
  var currencyRate=1;
  $("#payee_id").change(function(event) {
    var payee_id=$("#payee_id option:selected").val();
    if(payee_id!=""){
      var payee_name=$("#payee_id option:selected").text();
      $('#payee_name').val(payee_name);
    }
  });

   $('#input_another_entry').click(function(){
    if (currencyUnit == "SGD") {
      $('#product_id_div select').attr('disabled',true);
      $('#another_entry').hide();
      $('#submitbtn').removeClass('hidden');
    }
    else
    {
      $('#product_id_div select').attr('disabled',true);
      $('#another_entry').hide();
      $('#submitbtn').removeClass('hidden');
    }
      
  });

  var payee_id=$("#payee_id option:selected").val();
  if(payee_id!=""){
    var payee_name=$("#payee_id option:selected").text();
    $('#payee_name').val(payee_name);
  }

  //===============================================product row =================================== 
  $("#coa_id").change(function(event) {
      
    console.log(currencyUnit);
    console.log(currencyRate);
    coa_id=$("#coa_id option:selected").val();
    $('#opay_coa_id').val(coa_id);
    if(coa_id!=""){
      $.post('<?php echo base_url('common/Ajax/backend_ajax/get_coa_code_description') ?>', {coa_id: coa_id}, function(data, textStatus, xhr) {

        console.log(data);
        var rowCount = $('#product_table tbody tr').length;
        $("#product_table tbody").html("<tr id='"+coa_id+"'><td class='hidden'></td><input type='hidden' name='coa_row_id[]' value='"+ coa_id +"'><td class='sno'>"+(1)+"</td>"+data+"</tr>");
        $("#coa_id option:selected").remove();
        $("#amount_"+coa_id).focus().val('');
      });
    }
  });
});
// =================================== delete row ==============================================
function delete_row(data) {
  remove_coa_id=$(data).parents("tr").attr("id");
  $(data).parents("tr").remove();
  $.post('<?php echo base_url('common/Ajax/backend_ajax/get_coa_option') ?>', {  coa_id: remove_coa_id}, function(data, textStatus, xhr) {
    $("#coa_id").append(data);
  });
}
</script>