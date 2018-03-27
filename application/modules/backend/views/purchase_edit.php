<section class="content-header">
  <?php 
    $list = array('active'=>'Purchases');
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
          <h3 class="box-title">Edit Purchases</h3>
        </div>
      </div>
    </div>
  </div>
  <form  id="form_" class="form-horizontal validate" autocomplete="off" method="post" action="<?php echo $save_url; ?>">
    <input type="hidden" name="purchase_id" value="<?php echo $purchases_edit_data->purchase_id; ?>">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="row">
            <div class="col-md-12">
              <div class="box-body">
                <section class="invoice">
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                      <div class="row col-md-12">
                        <div class="col-md-6">
                          <b>From,</b>
                          <address>
                            <select name="supplier_id" id="customer_id" title="Select Supplier" class="form-control select2" required="">
                              <?php echo $customer_options; ?>
                            </select><br>
                          </address>
                        </div>
                        <div class="col-md-6"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-3">
                        <b>Date : </b>    
                      </div>
                      <div class="col-md-4">
                        <input type="text" name="doc_date" class="doc_date form-control" required="" value="<?php echo $purchases_edit_data->doc_date;?>">   
                      </div>
                      <div class="col-md-5"></div>
                    </div>

                    <div class="col-md-6">
                      <div class="col-md-3">
                        <b>Reference : </b>    
                      </div>
                      <div class="col-md-4">
                        <input type="text" name="purchase_ref_no" class="form-control" required="" value="<?php echo $purchases_edit_data->purchase_ref_no;?>">
                      </div>
                      <div class="col-md-5"></div>  
                    </div>
                  </div>
                  <br>
                  <!-- <legend></legend> -->
                  
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
                            <th>STOCK CODE & DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th width="15%">UNIT PRICE(<span class="customer_currency_unit"> SGD </span>)</th>
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
                        Done With Products List?

                        <button type="button" class="btn btn-primary" id="input_another_entry" onclick="$('#product_id_div select').attr('disabled',true);$('#another_entry').hide();$('#freit_gst').removeClass('hidden');">Yes</button>
                      
                        <button type="button" class="btn btn-primary " onclick='$("#product_id").select2("open");'>No</button> 
                      </div>
                      
                    </div>
                    <!-- /.col -->
                  </div>
                  <div class="row">
                        <div class="col-md-6">
                          <div class="col-md-5">
                             <b>Freight & Insurance(<span class="customer_currency_unit">SGD</span>):</b>
                          </div>
                          <div class="col-md-4">
                            <input type="number" name="freight_insurance" class="form-control" id="freight_insurance" onchange="get_sub_total();" value="<?php echo $purchases_edit_data->freight_insurance;?>">
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="col-md-5">
                             <b>Total Amount(<span class="customer_currency_unit">SGD</span>):</b>
                             <span id="total_amount_foreign"></span>
                          </div>
                          <div class="col-md-4">
                            <input type='hidden' name='total_amount_foreign' id="total_amount_foreign_value" value='0'>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6" id="xchange_part">
                          <div class="col-md-5">
                            <b>X-change Rate:</b> 
                          </div>
                          <div class="col-md-4">
                            <!-- <span id="xchange_rate"></span> -->
                            <input type='number' class="form-control"  name='currency_amount' value='<?php echo $cust_data['currency_amount'];?>' onchange="get_sub_total();" id="xchange_rate" required="">
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="col-md-5">
                            <b>Amount in SGD(local):</b> 
                            <span id="total_amount_local"></span>  
                          </div>
                          <div class="col-md-4">
                            
                            <input type='hidden' name='total_amount_local' id="total_amount_local_value" value='0'>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="col-md-5">
                            <b>Local handling(SGD):</b> 
                          </div>
                          <div class="col-md-4">
                            <input type="number" name="local_handling" value="<?php echo $purchases_edit_data->local_handling;?>" class="form-control" onchange="get_sub_total();" id="local_handling" >  
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="col-md-5">
                            <b>Total Purchases(before GST)(SGD):</b>
                            <span id="total_purchases"></span>
                          </div>
                          <div class="col-md-4">
                            
                          <input type='hidden' name='total_purchase_b4_gst' id="total_purchases_value" value='0'>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="col-md-5">
                            <b>Total Product Amount(<span class="customer_currency_unit">SGD</span>):</b>
                            <span id="total_product_amt"></span>
                          </div>
                          <div class="col-md-4">
                            
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="col-md-3">
                            <b>Conversion Factor:</b> 
                            <span id="conversion_factor"></span>
                          </div>
                          <div class="col-md-4">
                            
                          </div>
                          <div class="col-md-5"></div>
                        </div>
                        
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6 hidden" id="import_part">
                          <div class="col-md-5">
                            <b>Import Permit Ref:</b> 
                          </div>
                          <div class="col-md-4">
                            <input type="text" value="" name="import_permit_ref" maxlength="15" class="form-control" id="import_permit_ref">  
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                      </div>
                  <div class="col-md-6 col-md-offset-6 col-xs-12 pull-right">
                      
                      <br>
                      <div class="pull-right hidden" id="GST_btn">
                        GST?
                        <!--<button type="button" class="btn btn-primary" onclick="$('#summary').removeClass('hidden');$('#done_btn').hide();$('#product_id_div select').attr('disabled',true);$('#edit_btn').removeClass('hidden');">Yes</button>-->
                        <button type="button" class="btn btn-primary" onclick="$('#GST_btn').hide();$('#input_GST').removeClass('hidden');$('#submitbtn').removeClass('hidden');">Yes</button>
                        <!-- <button type="button" class="btn btn-primary " onclick='$("#product_id").select2("open");'>No</button> -->
                        <button type="button" class="btn btn-primary " onclick="$('#GST_btn').hide();$('#submitbtn').removeClass('hidden');">No</button> 
                      </div>
                      <!--<button class="btn btn-primary pull-right hidden" id="edit_btn" onclick="$('#summary').addClass('hidden');$('#done_btn').show();$('#product_id_div select').attr('disabled',false);$('#edit_btn').addClass('hidden');">Edit Product List</button>-->
                  </div>

                  <div class="col-md-6 col-md-offset-6 col-xs-12 hidden pull-right" id="input_GST">
                    <div class="row">
                      <div class="col-md-6"></div>
                      <div class="col-md-2">
                        <span>GST in SGD</span>
                      </div>
                      <div class="col-md-4">
                        <input type="number" name="gst_in_sgd" class="form-control" value="<?php echo $purchases_edit_data->gst_in_sgd;?>">
                      </div>
                    </div>
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
  purchase_id='<?php echo $purchases_edit_data->purchase_id; ?>';
  var product_id_json='<?php echo json_encode($product_array); ?>';
      product_id_arr=$.parseJSON(product_id_json);
      for (var i = 0; i < product_id_arr.length; i++) {
        product_id=product_id_arr[i];
        $.post('<?php echo base_url('common/Ajax/backend_ajax/get_product_code_description_edit') ?>', {  billing_id: product_id,purchase_id:purchase_id}, function(data, textStatus, xhr) {
          var rowCount = $('#product_table tbody tr').length;
          $("#product_table tbody").append("<tr id='"+product_id+"'><td class='hidden'></td><input type='hidden' name='product_row_id[]' value='"+ product_id +"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
        });
        // $("#another_entry").removeClass('hidden');
        $('#freit_gst').removeClass('hidden');
        $('#input_GST').removeClass('hidden');
        $('#GST_btn').hide();
        $('#submitbtn').removeClass('hidden');
        get_amount(product_id_arr[i]);
        $("#product_id option[value='"+product_id_arr[i]+"']").remove();
      }
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
                title:"<i class='fa fa-info'></i> Purchase Confirmation",
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
    // $('#submitbtn').click(function(){
    //   if(confirm("Are you Sure?")){
    //       $('#form_temp').submit();
       //     var validator = $("#form_temp").validate();
       //       for (var i in validator.errorMap) {
       //          console.log(i, ":", validator.errorMap[i]);
       //        }
       // }
    // });

// $("#select2-product_id-container").on("click", function() {
//  alert("User Guide \n \u2022 Enter all products first \n \u2022 Select service items last");
// })

var currencyUnit="SGD";
var currencyRate=1;
  $("#customer_id").change(function(event) {
    customer_id=$("#customer_id option:selected").val();
    if(customer_id!=""){
      $.post('<?php echo base_url('common/Ajax/backend_ajax/get_customer_details') ?>', {customer_id: customer_id}, function(data, textStatus, xhr) {
        var obj = $.parseJSON(data);
        $("#customer_address").html(obj.customer_address);
        $(".customer_currency_unit").html(obj.customer_currency);
        currencyUnit=obj.customer_currency;
        currencyRate=obj.currency_amount;
        $("#xchange_rate").html(currencyRate);
        $("#xchange_rate_value").val(currencyRate);
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
      //get_sub_total();
  }
  });


  //===============================================product row =================================== 
  $("#product_id").change(function(event) {
      
    //$("#another_entry").removeClass('hidden');
    console.log(currencyUnit);
    console.log(currencyRate);
    product_id=$("#product_id option:selected").val();
    if(product_id!=""){
      // $("#product_id option:selected").remove();
      // $('#product_id option[value=""]').attr('selected','');
      $.post('<?php echo base_url('common/Ajax/backend_ajax/get_product_code_description') ?>', {billing_id: product_id}, function(data, textStatus, xhr) {
        var rowCount = $('#product_table tbody tr').length;
        $("#product_table tbody").append("<tr id='"+product_id+"'><td class='hidden'></td><input type='hidden' name='product_row_id[]' value='"+ product_id +"'><td class='sno'>"+(rowCount+1)+"</td>"+data+"</tr>");
        $("#product_id option:selected").remove();
        get_amount(product_id);
        $("#quantity_"+product_id).focus().val('');
      });
    }
  });
});
// =================================== delete row ==============================================
function delete_row(data) {
  remove_product_id=$(data).parents("tr").attr("id");
  $(data).parents("tr").remove();
  $.post('<?php echo base_url('common/Ajax/backend_ajax/get_product_option') ?>', {  billing_id: remove_product_id}, function(data, textStatus, xhr) {
    $("#product_id").append(data);
    get_sub_total();
  });
}
</script>