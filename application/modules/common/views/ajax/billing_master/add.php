<div class="form-horizontal">
  <div class="form-group">
    <label for="stock_code" class="col-sm-2 control-label">Stock Code</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="stock_code" id="stock_code"  placeholder="Stock Code" type="text" required="">
      <span class="stock_code_error" style="display: none;">This Stock Code is not avaliable</span>
    </div>
  </div>
  <div class="form-group">
    <label for="billing_description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="billing_description" id="billing_description"  placeholder="Description" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="billing_uom" class="col-sm-2 control-label">UOM</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="billing_uom" id="billing_uom"  placeholder="UOM" type="text">
    </div>
  </div>
  <div class="form-group">
    <label for="billing_price_per_uom" class="col-sm-2 control-label">Price Per UOM</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="billing_price_per_uom" id="billing_price_per_uom"  placeholder="Price Per UOM" type="number">
    </div>
  </div> 
  <div class="form-group">
    <label for="gst_id" class="col-sm-2 control-label">GST</label>
    <div class="col-sm-8 error_block">
      <select class="form-control select2" name="gst_id" id="gst_id">
      <?php echo $gst_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="billing_update_stock" class="col-sm-2 control-label">UPDATE STOCKS</label>
    <div class="col-sm-8 error_block">
      <select class="form-control select2" name="billing_update_stock" id="billing_update_stock">
      <?php echo $stock_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="billing_type" class="col-sm-2 control-label">Billing Type</label>
    <div class="col-sm-8 error_block">
      <select class="form-control select2" name="billing_type" id="billing_type">
      <?php echo $bill_type_options; ?>
      </select>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.select2').select2();

  $('#stock_code').on('input',function(e){ 
    //alert($(this).val());
      $.post('<?php echo base_url('common/ajax/double_check/double_stock_code') ?>', {  stock_code: $(this).val()}, function(data, textStatus, xhr) {
        console.log(data);
        //alert(data);
        if (data == 1) {
          $('.stock_code_error').css("display","block").css("color", "red");  
          $(this).focus();
        }
        else
        {
          $('.stock_code_error').css("display","none");  
        }
      });
  });
</script>