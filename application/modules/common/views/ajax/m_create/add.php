<div class="form-horizontal">
  <div class="form-group">
    <label for="currency_name" class="col-sm-2 control-label">Currency Name</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="currency_name" id="currency_name" id="currency_name"  placeholder="Currency Name" type="text" required="">
      <span class="currency_error" style="display: none;">This currency exists</span>
    </div>
  </div>
  <div class="form-group">
    <label for="currency_rate" class="col-sm-2 control-label">X Rate</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="currency_rate" id="currency_rate"  placeholder="Rate" type="number" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="currency_description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="currency_description" id="currency_description" placeholder=" Description" required="" type="text">
    </div>
  </div>
</div>
<script type="text/javascript">
  
function matchStart (term, text) {
  if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
    return true;
  }

  return false;
}

$.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
  $(".select2").select2({
    matcher: oldMatcher(matchStart)
  })
});
  $('#currency_name').on('input',function(e){ 
    //alert($(this).val());
      $.post('<?php echo base_url('common/ajax/double_check/double_currency_code') ?>', {  currency: $(this).val()}, function(data, textStatus, xhr) {
        console.log(data);
        if (data == 1) {
          $('.currency_error').css("display","block").css("color", "red");  
          $(this).focus();
        }
        else
        {
          $('.currency_error').css("display","none");  
        }
      });
  });
</script>