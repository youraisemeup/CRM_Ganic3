<section class="content-header">
  <?php 
    $list = array('active'=>'Edit Invoice');
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
          <h3 class="box-title">Edit Invoice</h3>
        </div>
      </div>
    </div>
  </div>
  <form autocomplete="off" class="form-horizontal validate" method="post" action="<?php echo $save_url; ?>">
    <input type="hidden" name="invoice_id" value="<?php echo $invoice_edit_data->invoice_id; ?>">
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
                    <div class="col-sm-4 invoice-col"></div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice : <?php echo $invoice_edit_data->invoice_ref_no; ?></b><br>
                      <input type='hidden' name='invoice_ref_no' id="invoice_ref_no" value="<?php echo $invoice_edit_data->invoice_ref_no; ?>">
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
                  <br>
                  <!-- <legend></legend> -->
                  <div class="row">
                    <div class="col-xs-12">
                      <textarea class="form-control" rows="1" name="invoice_header_text"><?php echo $invoice_edit_data->invoice_header_text; ?></textarea>
                    </div>
                  </div>
                  <br>
                  <!-- <legend></legend> -->
                  <div class="row">
                    <div class="col-xs-12 col-md-5">
                      <select name="product_id" id="product_id" title="Select Product" class="form-control select2" >
                          <?php echo $product_options; ?>
                        </select>
                    </div>
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
                            <th width="15%">UNIT PRICE( SGD )</th>
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
                   <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->
                    <div class="col-md-6 col-md-offset-6 col-xs-12">
                      <div class="table-responsive">
                        <table class="table hidden" id="summary">
                          <tbody>
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td class="hidden"><input type='hidden' name='sub_total' id="sub_total_text"></td>
                              <td></td>
                              <td id="sub_total" class="pull-right"></td>
                            </tr>
                            <tr>
                              <th style="width:50%">Lump Sum Discount (%):</th>
                               <td ><input type="number" min='0' max='100' value="<?php echo $invoice_edit_data->lump_sum_discount; ?>" id="lump_sum_discount" name="lump_sum_discount" class="form-control" onchange="get_sub_total()"></td>
                              <td id="lump_sum_discount_amount" class="pull-right"></td>
                            </tr>
                            <tr>
                              <th>Net of lump Discount:</th>
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
                      <div id="done_btn" class="hidden pull-right">
                        Done With Products list?
                        <button type="button" class="btn btn-primary" type="button" onclick="$('#summary').removeClass('hidden');$('#done_btn').hide();$('#product_id_div select').attr('disabled',true);$('#submitbtn').removeClass('hidden');">Yes</button>
                        <button type="button" class="btn btn-primary " onclick='$("#product_id").select2("open");'>No</button>
                      </div>
                      <!--<button type="button" type="button" class="btn btn-primary pull-right hidden" id="edit_btn" onclick="$('#summary').addClass('hidden');$('#done_btn').show();$('#product_id_div select').attr('disabled',false);$('#edit_btn').addClass('hidden');">Edit Product List</button>-->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <!-- /.col -->
                    <div class="col-md-12 col-xs-12">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                          <?php if(!empty($invoice_edit_data->terms_of_payments)): ?>
                            <tr>
                              <th style="width:30%">Terms Of Payments:</th>
                              <td><input type="" class="form-control" name="terms_of_payments" id="terms_of_payments" value="<?php echo $invoice_edit_data->terms_of_payments; ?>"></td>
                            </tr>
                          <?php endif; ?>
                            <?php if(!empty($invoice_edit_data->training_venue)): ?>
                            <tr>
                              <th style="width:30%">Training Venue:</th>
                              <td><input type="" class="form-control" name="training_venue" id="training_venue" value="<?php echo $invoice_edit_data->training_venue; ?>"></td>
                            </tr>
                          <?php endif; ?>
                            <?php if(!empty($invoice_edit_data->modification)): ?>
                            <tr>
                              <th style="width:30%">Modification:</th>
                              <td><input type="" class="form-control" name="modification" id="modification" value="<?php echo $invoice_edit_data->modification; ?>"></td>
                            </tr>
                          <?php endif; ?>
                            <?php if(!empty($invoice_edit_data->cancellation)): ?>
                            <tr>
                              <th style="width:30%">Cancellation:</th>
                              <td><input type="" class="form-control" name="cancellation" id="cancellation" value="<?php echo $invoice_edit_data->cancellation; ?>"></td>
                            </tr>
                          <?php endif; ?>
                            <tr>
                              <td colspan="2"><textarea class="form-control" rows="1" name="invoice_footer_text" id="invoice_footer_text" ><?php echo $invoice_edit_data->invoice_footer_text; ?></textarea></td>
                            </tr>
                          </tbody>
                        </table>
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
  <?php
    
  ?>
</section>
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
                  
                    window.history.go(-1);
                },
                cancel: function(button) {
                    history.pushState(null, null, document.URL);
                }
            });
        
    });
});


$(function() {
  quotation_id=null;
  var product_id_json='<?php echo json_encode($product_array); ?>';
      product_id_arr=$.parseJSON(product_id_json);
      for (var i = 0; i < product_id_arr.length; i++) {
        product_id=product_id_arr[i];
        $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_row_edit') ?>', {  billing_id: product_id,quotation_id:quotation_id}, function(data, textStatus, xhr) {
          var rowCount = $('#product_table tbody tr').length;
          $("#product_table tbody").append("<tr id='"+product_id+"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
        });
        $("#done_btn").removeClass('hidden');
        get_amount(product_id_arr[i]);
        $("#product_id option[value='"+product_id_arr[i]+"']").remove();
      }
  //=========================customer details ====================================================
  $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
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
      get_sub_total();
  }
  }).trigger('change');
  //===============================================product row ===================================
  $("#product_id").change(function(event) {
    $("#done_btn").removeClass('hidden');
    product_id=$("#product_id option:selected").val();
    if(product_id!=""){
      $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_row_edit') ?>', {  billing_id: product_id,quotation_id:quotation_id}, function(data, textStatus, xhr) {
        var rowCount = $('#product_table tbody tr').length;
        $("#product_table tbody").append("<tr id='"+product_id+"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
        $("#product_id option:selected").remove();
		$("#quantity_"+product_id).focus().val('');
		 $("#discount_"+product_id).val('');
        get_amount(product_id);
      });
    }
  });
});
// =================================== delete row ==============================================
function delete_row(data) {
  remove_product_id=$(data).parents("tr").attr("id");
  $(data).parents("tr").remove();
  $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_option') ?>', {  billing_id: remove_product_id}, function(data, textStatus, xhr) {
    console.log(data);
    $("#product_id").append(data);
    get_sub_total();
  });
}
</script>