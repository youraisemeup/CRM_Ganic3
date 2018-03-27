<section class="content-header">
  <h1>
    Stock Opening Balance
  </h1>
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
          <h3 class="box-title">Stock</h3>
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
              <div class="box-body">
                <section class="receipt">
                  <div class="row">
                    <div class="col-xs-12 col-md-5 product_id_div">
                      <select name="product_id" id="product_id" title="Select Product" class="form-control select2" >
                          <?php echo $product_options; ?>
                        </select>
                    </div>
                      <!-- <button class="btn btn-primary" id="new_product" onclick="$('.product_id_div').removeClass('hidden');">Add New Product</button> -->
                  </div>
                  <br>
                  <hr>
                  <div class="table-responsive">
                    <table class="table" id="open_table">
                      <thead>
                        <tr>
                          <!-- <th>Stock Select</th> -->
                          <th>Stock code</th>
                          <th>Stock Description</th>
                          <th>UOM</th>
                          <th>Quantity</th>
                          <!-- <th>Sign</th>
                          <th>Transaction Type</th> -->
                          <th>ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <!-- <td>
                            <select name="product_id" id="product_id" title="Select Product" class="form-control select2" >
                              <?php echo $product_options; ?>
                            </select>
                          </td> -->
                          <td class="hidden">
                            <input type="text" id="product_id_id[0]" name="data[product_id][0]">
                          </td>
                          <td>
                            <input type="text" id="stock_code_id[0]" class="stock_code form-control" name="data[stock_code][0]" readonly="">
                          </td>
                          <td>
                            <input type="text" id="stock_des_id[0]" class="stock_description form-control" name="data[stock_description][0]" readonly="">
                          </td>
                          <td>
                            <input type="text" id="uom_id[0]" class="UOM form-control" name="data[uom][0]" readonly="">
                          </td>
                          <td class="form-group error_block">
                            <input type="number" class="quantity form-control error_block" name="data[quantity][0]" required="">
                          </td>
                          <td class="hidden">
                            <input type="text" class="hidden sign form-control" name="data[sign][0]" value="+">
                          </td>
                          <td class="hidden">
                            <input type="text" class="hidden tran_type form-control" name="data[tran_type][0]">
                          </td>
                          <td>
                            <button class="form-control btn-warning" id="del_btn" onclick="delete_row(this)">Delete</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>


                  </div>
                  <div class="col-md-6 col-md-offset-6 col-xs-12">
                      <div id="another_entry" class="pull-right">
                        Input Another Entry?

                        <button type="button" class="btn btn-primary" id="input_another_entry">Yes</button>
                      
                        <button type="button" class="btn btn-primary " onclick="$('#another_entry').hide();$('#submitbtn').removeClass('hidden');">No</button> 
                      </div>
                      
                  </div>
                  
                  <br>
                
                  <!-- <legend></legend> -->
                  <!-- Table row -->
                  
                  <!-- /.row -->
                  <!-- <hr> -->
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
</section>
<!-- <script type="text/javascript" src="<?php echo JS_PATH ?>receipt.js"></script> -->
<script type="text/javascript">
$(function() {
  //=========================customer details ====================================================

  $cansend = false;
  
  
  
    $('form#form_').submit(function(){
     var form = $(this);
         if ($cansend == true)
            {
                $cansend = false;
                return true;
            }
            $('#quot_status').html('');
            $.confirm({
                title:"<i class='fa fa-info'></i> Opening Balance Confirmation",
                text: "Confirm?",
                cancelButton: "No",
                confirm: function(button) {
                  $('#quot_status').html('');
                    $('#quot_status').html('<input type="hidden" name="invoice_status" value="C">');
                    $cansend = true;
                    
                  //  console.log($("#lump_sum_discount").val);
                    form.submit();
                },
                cancel: function(button) {
                 
                    $cansend = true;
                    form.submit();
                }
            });
            return false;
  })


  
 
  $("#input_another_entry").click(function(evernt) {
    var numrows = $("form#form_").find("input[name^='data[stock_code]']").length;
    console.log(numrows);
    var append_str_entry ='<tr>'
                          // + '<td>'
                          // + '<select name="product_id" id="product_id" title="Select Product" class="form-control select2" >'
                          // + '<?php echo $product_options; ?>'
                          // + '</select>'
                          // + '</td>'
                          + '<td class="hidden">'
                          + '<input type="text" id="product_id['
                          + numrows
                          + ']" name="data[product_id]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td>'
                          + '<input readonly type="text" id="stock_code_id['
                          + numrows
                          + ']" class="form-control" name="data[stock_code]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td>'
                          + '<input readonly type="text" id="stock_des_id['
                          + numrows
                          + ']" class="form-control" name="data[stock_description]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td>'
                          +  '<input readonly type="text" id="uom_id['
                          + numrows
                          + ']" class="form-control" name="data[uom]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td>'
                          +  '<input type="number" class="form-control" name="data[quantity]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td class="hidden">'
                          + '<input type="text" class="hidden form-control" name="data[sign]['
                          + numrows
                          + ']" value="+">'
                          + '</td>'
                          + '<td class="hidden">'
                          + '<input type="text" class="hidden form-control" name="data[tran_type]['
                          + numrows
                          + ']">'
                          + '</td>'
                          + '<td>'
                          + '<button class="form-control btn-warning" onclick="delete_row(this)">Delete</button>'
                          + '</td>'
                          + '</tr>';

    $("#open_table tbody").append(append_str_entry);
    //console.log(index_add);
  });
  
    //===============================================product reference ===================================
  $("#product_id").change(function(event) {
    
    product_id=$("#product_id option:selected").val();
    if(product_id!=""){
      
      // $("#product_id option:selected").remove();
      // $('#product_id option[value=""]').attr('selected','');
      $.post('<?php echo base_url('common/Ajax/quotationlist_ajax/get_product_stock_info') ?>', {  billing_id: product_id}, function(data, textStatus, xhr) {
      
        var obj = $.parseJSON(data);  
        var add_row_id = $('#open_table tbody tr').length - 1;
        console.log(obj);
        $( "input[name*='data[product_id][" + add_row_id + "]']" ).val( obj.billing_id );
        $( "input[name*='data[stock_code][" + add_row_id + "]']" ).val( obj.stock_code );
        $( "input[name*='data[stock_description][" + add_row_id + "]']" ).val( obj.billing_description );
        $( "input[name*='data[uom][" + add_row_id +"]']" ).val( obj.billing_uom );
      
        $("#product_id option:selected").remove();
      });
    }
  });
});

function delete_row(data) {
    
    $(data).parents("tr").remove();
}

</script>