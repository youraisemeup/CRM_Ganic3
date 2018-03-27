<div class="form-horizontal">
  <div class="form-group">
    <label for="gst_code" class="col-sm-2 control-label">GST Code</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="gst_code" id="gst_code"  value="" placeholder="Code" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="gst_rate" class="col-sm-2 control-label">GST Rate</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="gst_rate" id="gst_rate"  value="" placeholder="Rate" type="number" required="" step="any">
    </div>
  </div>
  <div class="form-group">
    <label for="gst_rate" class="col-sm-2 control-label">GST Type</label>
    <div class="col-sm-8 error_block">
      <select name="gst_type" id="gst_type" class="form-control" required="">
        <?php echo $gst_type_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="gst_description" class="col-sm-2 control-label">GST Description</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="gst_description" id="gst_description" placeholder=" Description" required="" type="text">
    </div>
  </div>
</div>