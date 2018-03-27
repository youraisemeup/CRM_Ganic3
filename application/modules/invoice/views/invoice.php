<section class="content-header">
  <?php 
    $list = array('active'=>'Invoice');
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
          <h3 class="box-title">Invoice</h3>
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
                    <div class="col-sm-4 invoice-col">
                      <b>To,</b>
                      <address>
                        <select name="customer_id" id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                        <b>Address:</b><span id="customer_address"></span><br>
                        <b>Phone:</b> <span id="customer_phone"></span><br>
                        <b>Email:</b> <span id="customer_email"></span>
                      </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice : <?php echo $invoice_details->invoice_text_prefix.'.'.$total_invoice; ?></b><br>
                      <input type='hidden' name='invoice_ref_no' id="invoice_ref_no" value="<?php echo $invoice_details->invoice_text_prefix.'.'.$total_invoice; ?>">
                      <br>
                      <b>Date:</b> <?php echo date('d-m-Y'); ?><br> 
                      <b>Salesman:</b>
                      <select name="salesman_id" id="salesman_id" title="Select Sales Person" class="form-control select2 col-xs-4 col-md-4" required="">
                          <?php echo $salesman_options; ?>
                      </select>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row" id="quot_status">
                  </div>
                  <br>
                  <!-- <legend></legend> -->
                  <div class="row">
                    <div class="col-xs-12">
                      <textarea class="form-control" rows="1" name="invoice_header_text"><?php echo $invoice_details->invoice_header_text; ?></textarea>
                    </div>
                  </div>
                  <br>
                  <!-- <legend></legend> -->
                  <hr>
                  <div class="row">
                    <div class="col-xs-12 col-md-5 product_id_div">
                      <select name="product_id" id="product_id" title="Select Product" class="form-control select2" >
                          <?php echo $product_options; ?>
                        </select>
                    </div>
                      <!-- <button class="btn btn-primary" id="new_product" onclick="$('.product_id_div').removeClass('hidden');">Add New Product</button> -->
                  </div>
                  <br>
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  <div class="row">
                    <div class="col-xs-12 table-responsive">
                      <table class="table table-striped" id="product_table">
                        <thead>
                          <tr>
                            <th>S.NO</th>
                            <th>DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th>UOM</th>
                            <th width="15%">UNIT PRICE(<span class="customer_currency_unit"> SGD </span>)</th>
                            <th>DISCOUNT (%)</th>
                            <th>AMOUNT(<span class="customer_currency_unit">SGD </span>)</th>
                            <th>CAT</th>
                            <th>GST AMT</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>

                        <tbody>
                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <!-- <hr> -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->
                    <div class="col-md-6 col-md-offset-6 col-xs-12">
                      <div class="table-responsive">
                        <table class="table hidden" id="summary">
                          <tbody>
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td class="hidden"><input type='hidden' name='sub_total' id="sub_total_text" value='0'></td>
                              <td></td>
                              <td id="sub_total" class="pull-right">0</td>
                            </tr>
                            <tr>
                              <th>Lump Sum <br>Discount (%):</th>
                              <td ><input type="number" min='0' max='100' id="lump_sum_discount" name="lump_sum_discount" class="form-control" onchange="get_sub_total()"></td>
                              <td id="lump_sum_discount_amount" class="hidden"></td>
                               <td id="lump_sum_discount_amount_display" class="pull-right"></td>
                            </tr>
                            
                            
                            <tr>
                              <th>Net of <br>lump Discount:</th>
                              <td></td>
                              <td id="lump_sum_discount_price" class="pull-right"></td>
                              <td class="hidden"><input type='hidden' name='lump_sum_discount_price' id="lump_sum_discount_price_text"></td>
                            </tr>
                            <tr>
                              <th>GST (%) :</th>
                              <td><input type="number" id="gst" name="gst" class="form-control" readonly="" value="7"></td>
                              <td id="gst_payable_amount" class="hidden"></td>
                               <td id="gst_payable_amount_show" class="pull-right"></td>
                            </tr>
                            <!--<tr class="hidden">-->
                            <tr>
                              <th  >Total:</th>
                              <td></td>
                              <td id="final_total" class="pull-right"></td>
                              <td class="hidden"><input type='hidden' name='final_total' id="final_total_text"></td>
                            </tr>
                            <tr id="total_curr" >
                              <th>Total in(<span id="cust_curr">SGD</span>):</th>
                              <td></td>
                              <td id="final_total_forex_text" class="pull-right"></td>
                              <td class="hidden"><input type='hidden' name='currency_amount' id="currency_amount"></td>
                              <td class="hidden"><input type='hidden' name='final_total_forex' id="final_total_forex"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div id="done_btn" class="hidden pull-right">
                        Done With Products list?
                        <!--<button type="button" class="btn btn-primary" onclick="$('#summary').removeClass('hidden');$('#done_btn').hide();$('#product_id_div select').attr('disabled',true);$('#edit_btn').removeClass('hidden');">Yes</button>-->
                        <button type="button" class="btn btn-primary" onclick="$('#summary').removeClass('hidden');$('#done_btn').hide();$('#product_id_div select').attr('disabled',true);$('#submitbtn').removeClass('hidden');$('#print_with_head').removeClass('hidden');$('#print_without_head').removeClass('hidden');">Yes</button>
                        <!-- <button type="button" class="btn btn-primary " onclick='$("#product_id").select2("open");'>No</button> -->
                        <button type="button" class="btn btn-primary " onclick='$("#select2-product_id-container").click();$("#product_id").select2("open");'>No</button> 
                      </div>
                      <!--<button class="btn btn-primary pull-right hidden" id="edit_btn" onclick="$('#summary').addClass('hidden');$('#done_btn').show();$('#product_id_div select').attr('disabled',false);$('#edit_btn').addClass('hidden');">Edit Product List</button>-->
                    </div>
                    <!-- /.col -->
                  </div>
                  <br>
                  <!-- <hr> -->
                  <!-- /.row -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->
                    <div class="col-md-12 col-xs-12">
                      <div class="form-horizontal">
                        
                          <?php if(!empty($invoice_details->terms_of_payments)): ?>
                          <div class="form-group">
                              <span class="col-md-3 col-xs-12">Terms Of Payments : </span>
                              <span  class="col-md-9 col-xs-12"><input type="" class="form-control" name="terms_of_payments" id="terms_of_payments" value="<?php echo $invoice_details->terms_of_payments; ?>"></span>
                            </div>
                          <?php endif; ?>
                            <?php if(!empty($invoice_details->training_venue)): ?>
                            <div class="form-group">
                            <span class="col-md-3 col-xs-12">Training Venue:</span>
                               <span  class="col-md-9 col-xs-12"><input type="" class="form-control" name="training_venue" id="training_venue" value="<?php echo $invoice_details->training_venue; ?>"></span>
                              </div>
                          <?php endif; ?>
                            <?php if(!empty($invoice_details->modification)): ?>
                            <div class="form-group">
                            <span class="col-md-3 col-xs-12">Modification:</span>
                               <span  class="col-md-9 col-xs-12"><input type="" class="form-control" name="modification" id="modification" value="<?php echo $invoice_details->modification; ?>"></span>
                              </div>
                          <?php endif; ?>
                            <?php if(!empty($invoice_details->cancellation)): ?>
                            <div class="form-group">
                            <span class="col-md-3 col-xs-12">Cancellation:</span>
                               <span  class="col-md-9 col-xs-12"><input type="" class="form-control" name="cancellation" id="cancellation" value="<?php echo $invoice_details->cancellation; ?>"></span>
                              </div>
                          <?php endif; ?>
                            <span class="col-md-12 col-mxs112"><textarea class="form-control" rows="1" name="invoice_footer_text" id="invoice_footer_text" ><?php echo $invoice_details->invoice_footer_text; ?></textarea></span>
                          
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <br>
                  <br><br>
                   <!-- /.row -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->
                    <div class="col-md-3 col-xs-12">
                      <div class="table-responsive">
                              <legend></legend>
                              Customer Signature and Co Stamp<br>
                              Name: <br>
                              Date: <br>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-xs-12">

                      <div class="col-xs-12 col-md-8">
                        <input type="button" class="btn btn-warning pull-right hidden" id='print_without_head' value="Print Without Letterhead">
                        <input type="hidden" name="logo_with" value="" id="logo_with">
                          <!-- <i class='fa fa-print' ></i> Print Without Letterhead -->
                        <!-- </button>    -->
                      </div>
                      <div class="col-xs-12 col-md-2">
                        <input type="button" class="btn btn-primary pull-right hidden" id='print_with_head' value="Print With Simple Letterhead">
                         <!--  <i class='fa fa-print' ></i> Print With Simple Letterhead -->
                       <!--  </button>    -->
                      </div>
                      <div class="col-xs-12 col-md-2">
                          <button type="submit" class="btn btn-success pull-right hidden" id="submitbtn"><i class="fa fa-credit-card"></i> Submit
                        </button>  
                      </div>
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
<div id="print__" style="display: block;"></div>
<script type="text/javascript" src="<?php echo JS_PATH ?>quotation.js"></script>
<script type="text/javascript">

$(document).ready(function(){
        // alert(document.URL);
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function () {
          $.confirm({
                title:"<i class='fa fa-info'></i> Exit Confirmation",
                text: "Are You Sure Exit ?",
                confirm: function(button) {
                  
                    //window.location.replace("<?php echo base_url(); ?>common/signout/topform managment");
                    window.history.go(-1);
                },
                cancel: function(button) {
                    history.pushState(null, null, document.URL);
                }
            });
        
    });
});


$(function() {
  var print_form_action = '<?php echo base_url('common/Ajax/invoicelist_ajax/print_new_invoice');?>';
  var save_form_action = '<?php echo base_url('invoice/create_new_invoice');?>';
  var product_option = "<?php echo $product_options;?>";
  //=========================customer details ====================================================
  $cansend = false;
  $print = false;

  $("#print_without_head").click(function(e){

     $("#logo_with").val("logo_without");
     $("#form_").attr("action", print_form_action);
     $("#print__").show();
    var print_salesman_id = $('#salesman_id').val();
    var print_customer_id = $('#customer_id').val();
    
    if (print_customer_id && print_salesman_id) {
      $print = true;
      // $('#form_').submit();
      $.ajax({
        type: "POST",
        url: print_form_action,
        data: $('#form_').serialize(),       
        success: function(data){
          //alert(data);
          $("#print__").html(data);
           $("#print__").print({
              mediaPrint: true,
                title: " "
            });
           $("#print__").hide();
          console.log(data);
        }
      });
    }
  });

  $("#print_with_head").click(function(e){

    $("#logo_with").val("logo_with");
    $("#form_").attr("action", print_form_action);
     $("#print__").show();
    var print_salesman_id = $('#salesman_id').val();
    var print_customer_id = $('#customer_id').val();
    
    if (print_customer_id && print_salesman_id) {
      $print = true;
      // $('#form_').submit();
      $.ajax({
        type: "POST",
        url: print_form_action,
        data: $('#form_').serialize(),       
        success: function(data){
          $("#print__").html(data);
           $("#print__").print({
              mediaPrint: true,
                title: " "
            });
           $("#print__").hide();
        }
      });
    }
  });

  $('#submitbtn').click(function(e){
    e.preventDefault();
    $print = false;
    $("#form_").attr("action", save_form_action);
    $('#form_').submit();
  });
  //=========================customer details ====================================================
    $('form#form_').submit(function(){
      if ($print == false) {
          var form = $(this);
         if ($cansend == true)
            {
                $cansend = false;
                return true;
            }
            $('#quot_status').html('');
            $.confirm({
                title:"<i class='fa fa-info'></i> Quotation Confirmation",
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
                    //form.submit();
                }
            });
            return false;
      }
      else if($print == true){
        form.submit();
      }
  })

$("#select2-product_id-container").on("click", function() {
 alert("User Guide \n \u2022 Enter all products first \n \u2022 Select service items last");
})

var currencyUnit="SGD";
var currencyRate=1;

  $("#customer_id").change(function(event) {

    if ($("#product_table tbody").html() != "") {

      $('#summary').addClass('hidden');
      $('#done_btn').show();
      $("#product_table tbody").html("");
      
      $('#product_id').val(product_option);
    }
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        $("#customer_address").html(obj.customer_address);
        $(".customer_currency_unit").html(obj.customer_currency);
        currencyUnit=obj.customer_currency;
        currencyRate=obj.currency_amount;
        $("#customer_phone").html(obj.customer_phone);
        $("#customer_email").html(obj.customer_email);
        if(obj.customer_currency!="SGD"){
          $("#total_curr").removeClass('hidden');
          $("#cust_curr").text(obj.customer_currency);
            $(".customer_currency_unit").html(obj.customer_currency);
        }
        else{
          $("#total_curr").addClass('hidden');
        }
        $("#currency_amount").val(obj.currency_amount);
      });
      get_sub_total();
  }
  });
  //===============================================product row =================================== 
  $("#product_id").change(function(event) {
    // $(".product_id_div").addClass('hidden');
    $("#done_btn").removeClass('hidden'); 
    console.log(currencyUnit);
    console.log(currencyRate);
    product_id=$("#product_id option:selected").val();
    if(product_id!=""){
      // $("#product_id option:selected").remove();
      // $('#product_id option[value=""]').attr('selected','');
      $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_row') ?>', {  billing_id: product_id,currencyRate:currencyRate}, function(data, textStatus, xhr) {
        var rowCount = $('#product_table tbody tr').length;
        $("#product_table tbody").append("<tr id='"+product_id+"'><td class='hidden'></td><input type='hidden' name='product_row_id[]' value='"+ product_id +"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
      
        $("#product_id option:selected").remove();
        get_amount(product_id);
    $("#quantity_"+product_id).focus().val('');
		$("#discount_"+product_id).val('');
      });
    }
  });
});
// =================================== delete row ==============================================
function delete_row(data) {
  remove_product_id=$(data).parents("tr").attr("id");
  $(data).parents("tr").remove();
  $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_option') ?>', {  billing_id: remove_product_id}, function(data, textStatus, xhr) {
    $("#product_id").append(data);
    get_sub_total();
  });
}
</script>