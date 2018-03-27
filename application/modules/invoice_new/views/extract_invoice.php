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
    </div>t
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
                  <div class="row">
                    <div class="col-xs-12 col-sm-4 margin">
                    <b>Quotation Reference,</b>
                      <select name="ex_ref_no" id="ex_ref_no" title="Select Product" class="form-control select2" >
                          <?php echo $quotation_reference; ?>
                        </select>
                    </div>
                      <!-- <button class="btn btn-primary" id="new_product" onclick="$('.product_id_div').removeClass('hidden');">Add New Product</button> -->
                  </div>
                  <br>

                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      <b>To,</b>
                      <address>
                        <select name="customer_id" readonly id="customer_id" title="Select Customer" class="form-control select2" required="">
                          <?php echo $customer_options; ?>
                        </select><br>
                        <b>Address:</b><span id="customer_address"></span><br>
                        <b>Phone:</b> <span id="customer_phone"></span><br>
                        <b>Email:</b> <span id="customer_email"></span>
                      </address>
                    </div>
                    <div class="col-sm-4 invoice-col"></div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice : <?php echo $invoice_details->invoice_text_prefix.'.'.$total_invoice; ?></b><br>
                      <input type='hidden' name='invoice_ref_no' id="invoice_ref_no" value="<?php echo $invoice_details->invoice_text_prefix.'.'.$total_invoice; ?>">
                      <br>
                      <b>Date:</b> <?php echo date('d-m-Y'); ?><br>
                      <b>Salesman:</b>
                      <select name="salesman_id" id="salesman_id" title="Select Sales Person" class="form-control select2 col-xs-4 col-md-4" required="" readonly>
                          <?php echo $salesman_options; ?>
                      </select>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
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
                  <div class="row" id="inv_status">

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
                        <table class="table" id="summary">
                          <tbody>
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td class="hidden"><input type='hidden' name='sub_total' id="sub_total_text"></td>
                              <td></td>
                              <td id="sub_total" class="pull-right"></td>
                            </tr>
                            <tr>
                              <th>Lump Sum <br>Discount (%):</th>
                              <td ><input type="number" min='0' max='100' id="lump_sum_discount" disabled name="lump_sum_discount" class="form-control" onchange="get_sub_total()"></td>
                              <td id="lump_sum_discount_amount" class="pull-right"></td>
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
                              <td id="gst_payable_amount" class="pull-right"></td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td></td>
                              <td id="final_total" class="pull-right"></td>
                              <td class="hidden"><input type='hidden' name='final_total' id="final_total_text"></td>
                            </tr>
                            <tr id="total_curr" class="hidden">
                              <th>Total in(<span id="cust_curr"></span>):</th>
                              <td></td>
                              <td id="final_total_forex_text" class="pull-right"></td>
                              <td class="hidden"><input type='hidden' name='currency_amount' id="currency_amount"></td>
                              <td class="hidden"><input type='hidden' name='final_total_forex' id="final_total_forex"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
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
</section>
<script type="text/javascript" src="<?php echo JS_PATH ?>invoice.js"></script>
<script type="text/javascript">
$(function() {
$cansend = false;
  $('form#form_').submit(function(){
     var form = $(this);
         if ($cansend == true)
            {
                $cansend = false;
                return true;
            }
            $('#inv_status').html('');
            $.confirm({
                title:"<i class='fa fa-info'></i> Post Confirmation",
                text: "Are You Sure Post ?",
                confirm: function(button) {
                  $('#inv_status').html('');
                    $('#inv_status').html('<input type="hidden" name="invoice_status" value="C">');
                    $cansend = true;
                    form.submit();
                },
                cancel: function(button) {
                    $cansend = true;
                    form.submit();
                }
            });
            return false;
  })

  $('#ex_ref_no').change(function(event){
    quotation_id=$("#ex_ref_no option:selected").val();
    if(quotation_id!=""){
      $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_quotation_details') ?>', {  quotation_id: quotation_id}, function(data) {
        var obj = $.parseJSON(data);

        $('#customer_id').select2().val(obj['quotation_details']['customer_id']);
        $('#customer_id').select2().val(obj['quotation_details']['customer_id']).trigger("change");

        $('#salesman_id').select2().val(obj['quotation_details']['salesman_id']);
        $('#salesman_id').select2().val(obj['quotation_details']['salesman_id']).trigger("change");

      product_id_arr=obj['product_array'];
      for (var i = 0; i < product_id_arr.length; i++) {
        product_id=product_id_arr[i];
        $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_row_invoice') ?>', {  billing_id: product_id,quotation_id:quotation_id}, function(data, textStatus, xhr) {
          var rowCount = $('#product_table tbody tr').length;
          $("#product_table tbody").append("<tr id='"+product_id+"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
        });
        $("#done_btn").removeClass('hidden');
        get_amount(product_id_arr[i]);
        $("#product_id option[value='"+product_id_arr[i]+"']").remove();
      }
        
        
      });
    }


  })
  //=========================customer details ====================================================
  var currencyUnit="SGD";
var currencyRate=1;
  $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/invoicelist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        $("#customer_address").html(obj.customer_address);
         currencyUnit=obj.customer_currency;
         currencyRate=obj.currency_amount;
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
      get_sub_total();
  }
  });
    //===============================================product row ===================================
  $("#product_id").change(function(event) {
    // $(".product_id_div").addClass('hidden');
    $("#done_btn").removeClass('hidden');
    
    product_id=$("#product_id option:selected").val();
    if(product_id!=""){
      // $("#product_id option:selected").remove();
      // $('#product_id option[value=""]').attr('selected','');
      $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_row_invoice') ?>', {  billing_id: product_id}, function(data, textStatus, xhr) {

        var rowCount = $('#product_table tbody tr').length;
        $("#product_table tbody").append("<tr id='"+product_id+"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");

        $("#product_id option:selected").remove();
        get_amount(product_id);
        if($("#quantity_"+product_id).is(":visible")){
          $("#quantity_"+product_id).focus().val('');
        }
		    $("#discount_"+product_id).val('');
      });
    }
  });
});
// =================================== delete row ==============================================
function delete_row(data) {
  remove_product_id=$(data).parents("tr").attr("id");
  $(data).parents("tr").remove();
  $.post('<?php echo base_url('common/Ajax/invoicelist_ajax/get_product_option') ?>', {  billing_id: remove_product_id}, function(data, textStatus, xhr) {
    $("#product_id").append(data);
    get_sub_total();
  });
}
// ==================================service total==============
function service_amount(obj, id) {
  var amount = '';
  amount = $(obj).val();
 $('#price_'+id).val(amount);
  get_amount(id);
}
</script>