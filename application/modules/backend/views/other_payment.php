<section class="content-header">
  <?php 
    $list = array('active'=>'OTHER Payment');
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
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-3">
                        <b>Date : </b>     
                      </div>
                      <div class="row col-md-4 form-group error_block">
                        <input type="text" name="doc_date" class="doc_date form-control" required="" value="<?php echo date('Y-m-d'); ?>">   
                      </div>
                      <div class="col-md-5"></div>
                    </div>

                    <div class="col-md-6">
                      <div class="col-md-6">
                        <b>Reference : <?php echo $payment_details->payment_text_prefix.'.'.$total_payment; ?></b>    
                      </div>
                      <div class="col-md-3 form-group error_block">
                        <input type='hidden' name='payment_ref_no' id="payment_ref_no" value="<?php echo $payment_details->payment_text_prefix.'.'.$total_payment; ?>">
                      </div>
                      <div class="col-md-3"></div>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-3">
                        <b>Payee : </b>     
                      </div>
                      <div class="row col-md-4 form-group error_block">
                        <input type="text" name="payee_name" list="payee_name" class="form-control">
                            <datalist id="payee_name">
                              <select>
                              <?php echo $payee_options;?>
                            </select><br>
                            </datalist>
                      </div>
                      <div class="col-md-5"></div>
                    </div>
                    <div class="col-md-6">
                      <!-- <div class="col-md-6">
                        <b>Payee: </b>
                          <input type="text" name="payee_name" list="payee_name">
                          <datalist id="payee_name">
                            <select>
                            <?php echo $payee_options;?>
                          </select><br>
                          </datalist>
                      </div>
                      <div class="col-md-6"></div> -->
                    </div>
                  </div>
                  <br>
                  <br>
                  <hr>
                  <div class="row">
                    <div class="col-xs-12 col-md-5 product_id_div">
                      <select name="coa_id" id="coa_id" title="Select Account" class="form-control select2" >
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
                            <th>AMOUNT(<span class="customer_currency_unit">SGD </span>)</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    <div id="another_entry" class="hidden col-md-6 col-md-offset-6 col-xs-12">
                      <div class="pull-right">
                        Done With Accounts List?
                        <button type="button" class="btn btn-primary" id="input_another_entry">Yes</button>
                        <button type="button" class="btn btn-primary " onclick='$("#coa_id").select2("open");'>No</button> 
                      </div>
                    </div>
                      <br>
                  </div>
                  <div class="row no-print">
                    <div class="col-xs-12">
                      <br>
                      <button type="submit" class="btn btn-success pull-right hidden" id="submitbtn"><i class="fa fa-credit-card"></i> Submit
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
<!-- <script src="<?php echo JS_PATH."/datalist-polyfill.min.js";?>"></script> -->

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
                    
                    console.log($("#lump_sum_discount").val);
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
  // $("#payee_id").change(function(event) {
  //   var payee_id=$("#payee_id option:selected").val();
  //   if(payee_id!=""){
  //     var payee_name=$("#payee_id option:selected").text();
  //     $('#payee_name').val(payee_name);
  //   }
  // });

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

  //===============================================product row =================================== 
  $("#coa_id").change(function(event) {
      
    $("#another_entry").removeClass('hidden');
    console.log(currencyUnit);
    console.log(currencyRate);
    var flag = true;
    coa_id=$("#coa_id option:selected").val();
    if(coa_id!=""){

      if ($('#product_table tbody tr').length)
      {
        $('#product_table tbody tr td input').each(function(){
          if (!$(this).val()) {
            flag = false;
            $(this).focus();
          }
        });  
        if (flag == true) {
          $.post('<?php echo base_url('common/Ajax/backend_ajax/get_coa_code_description') ?>', {coa_id: coa_id}, function(data, textStatus, xhr) {

            console.log(data);
            var rowCount = $('#product_table tbody tr').length;
            $("#product_table tbody").append("<tr id='"+coa_id+"'><td class='hidden'></td><input type='hidden' name='coa_row_id[]' value='"+ coa_id +"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
            $("#coa_id option:selected").remove();
            $("#amount_"+coa_id).focus().val('');
          });     
        }
      }
      else if(flag == true)
      {
          $.post('<?php echo base_url('common/Ajax/backend_ajax/get_coa_code_description') ?>', {coa_id: coa_id}, function(data, textStatus, xhr) {

            console.log(data);
            var rowCount = $('#product_table tbody tr').length;
            $("#product_table tbody").append("<tr id='"+coa_id+"'><td class='hidden'></td><input type='hidden' name='coa_row_id[]' value='"+ coa_id +"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
            $("#coa_id option:selected").remove();
            $("#amount_"+coa_id).focus().val('');
          });  
      }
      
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