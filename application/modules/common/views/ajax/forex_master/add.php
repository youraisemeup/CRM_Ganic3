<div class="form-horizontal">
  <div class="form-group">
    <label for="currency_name" class="col-sm-2 control-label">Currency Name</label>
    <div class="col-sm-8 error_block">
      <select class="form-control select2" name="currency_name" id="currency_name" required="">
      <?php echo $currency_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="currency_rate" class="col-sm-2 control-label">X Rate</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="currency_rate" id="currency_rate"  placeholder="Rate" type="text" required="">
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
  $("#currency_name").change(function(event) {
    cur=$.trim($("#currency_name option:selected").text()).split("-");
    $("#currency_description").val(cur[0]);
    $.post('<?php echo base_url('common/ajax_controller/convertCurrency') ?>', {to: cur[1]}, function(data, textStatus, xhr) {
      if($.isNumeric(data)){
        $("#currency_rate").val(data);
      }
      else{
        $("#currency_rate").val("");
        alert(data);
      }
    });
  });
</script>