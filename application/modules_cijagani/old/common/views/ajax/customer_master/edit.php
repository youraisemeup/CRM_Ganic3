<input class="form-control" name="id" id="id" value="<?php echo $customer->customer_id ?>" placeholder="Group Name" type="hidden" required="">
<div class="form-horizontal">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="customer_code" class="col-sm-4 control-label">Customer Code : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_code" id="customer_code" value="<?php echo $customer->customer_code; ?>"  placeholder="Customer Code" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_name" class="col-sm-4 control-label">Customer Name : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_name" id="customer_name" value="<?php echo $customer->customer_name; ?>"   placeholder="Customer Name" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_contact_person" class="col-sm-4 control-label">Contact Person : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_contact_person" id="customer_contact_person" value="<?php echo $customer->customer_contact_person; ?>"   placeholder="Contact Person" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_bldg_number" class="col-sm-4 control-label">BLDG NO : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_bldg_number" id="customer_bldg_number" value="<?php echo $customer->customer_bldg_number; ?>"   placeholder="BLDG NO" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_street_name" class="col-sm-4 control-label">Street Name : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_street_name" id="customer_street_name" value="<?php echo $customer->customer_street_name; ?>"   placeholder="Street Name" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_postal_code" class="col-sm-4 control-label">Postal code : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_postal_code" id="customer_postal_code" value="<?php echo $customer->customer_postal_code; ?>"   placeholder="Postal code" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_phone" class="col-sm-4 control-label">Phone : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_phone" id="customer_phone" value="<?php echo $customer->customer_phone; ?>"   placeholder="Phone" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_fax" class="col-sm-4 control-label">Fax : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_fax" id="customer_fax" value="<?php echo $customer->customer_fax; ?>"   placeholder="Fax" type="text" required="">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="customer_email" class="col-sm-4 control-label">Email : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_email" id="customer_email" value="<?php echo $customer->customer_email; ?>"   placeholder="Email" type="email" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_credit_limit" class="col-sm-4 control-label">Credit limit : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_credit_limit" id="customer_credit_limit" value="<?php echo $customer->customer_credit_limit; ?>"   placeholder="Credit limit" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_credit_term_days" class="col-sm-4 control-label">Credit Terms in Days : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_credit_term_days" id="customer_credit_term_days" value="<?php echo $customer->customer_credit_term_days; ?>"   placeholder="Credit Terms" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="currency_id" class="col-sm-4 control-label">Currency : </label>
        <div class="col-sm-8 error_block">
          <select class="form-control select2" name="currency_id" id="currency_id"  required="">
          <?php echo $currency_options; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="customer_uen_no" class="col-sm-4 control-label">UEN no : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_uen_no" id="customer_uen_no" value="<?php echo $customer->customer_uen_no; ?>"   placeholder="UEN no" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_gst_number" class="col-sm-4 control-label">GST Reg No : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_gst_number" id="customer_gst_number" value="<?php echo $customer->customer_gst_number; ?>"   placeholder="GST Reg" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="customer_rating" class="col-sm-4 control-label">Rating : </label>
        <div class="col-sm-8 error_block">
          <input class="form-control" name="customer_rating" id="customer_rating" value="<?php echo $customer->customer_rating; ?>"   placeholder="Rating" type="text" required="">
        </div>
      </div>
      <div class="form-group">
        <label for="country_id" class="col-sm-4 control-label">Country : </label>
        <div class="col-sm-8 error_block">
          <select class="form-control select2" name="country_id" id="country_id" required="">
          <?php echo $country_options; ?>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
if($mode=="view")
{
?>
<script type="text/javascript">
    $(function(){
        $("form :input").prop("disabled", true);
    });
</script>
<?php    
}
?>
<script type="text/javascript">
  $('.select2').select2();

</script>