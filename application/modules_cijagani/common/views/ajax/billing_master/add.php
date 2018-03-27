<div class="form-horizontal">
  <div class="form-group">
    <label for="stock_code" class="col-sm-2 control-label">Stock Code</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="stock_code" id="stock_code"  placeholder="Stock Code" type="text" required="">
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
      <input class="form-control" name="billing_uom" id="billing_uom"  placeholder="UOM" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="billing_price_per_uom" class="col-sm-2 control-label">Price Per UOM</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="billing_price_per_uom" id="billing_price_per_uom"  placeholder="Price Per UOM" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="gst_id" class="col-sm-2 control-label">GST</label>
    <div class="col-sm-8 error_block">
      <select class="form-control select2" name="gst_id" id="gst_id" required="">
      <?php echo $gst_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="billing_update_stock" class="col-sm-2 control-label">UPDATE STOCKS</label>
    <div class="col-sm-8 error_block">
      <select class="form-control select2" name="billing_update_stock" id="billing_update_stock" required="">
      <?php echo $stock_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="billing_type" class="col-sm-2 control-label">Billing Type</label>
    <div class="col-sm-8 error_block">
      <select class="form-control select2" name="billing_type" id="billing_type" required="">
      <?php echo $bill_type_options; ?>
      </select>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.select2').select2();
</script>