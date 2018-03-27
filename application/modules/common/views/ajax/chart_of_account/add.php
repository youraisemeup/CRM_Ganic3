<div class="form-horizontal">
  <div class="form-group">
    <label for="gst_code" class="col-sm-2 control-label">Account Prefix</label>
    <div class="col-sm-8 error_block">
      <select name="coa_prefix" id="coa_prefix" class="form-control select2" required="">
        <?php echo $prefix_code_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="gst_rate" class="col-sm-2 control-label">Account Suffix Number</label>
    <div class="col-sm-8 error_block">
      <input class="form-control coa_suffix" name="coa_suffix" id="coa_suffix" type="text" required="">
      <span class="coa_duplicate" style="display: none;">This Account code already defined! Please try again.</span>
      <span class="coa_num_validate" style="display: none;">This Account code must be 3 numbers! Please try again.</span>
    </div>
  </div>
  <div class="form-group">
    <label for="gst_description" class="col-sm-2 control-label">Account Description</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="coa_description" id="coa_description" placeholder="Account Description" required="" type="text">
    </div>
  </div>
</div>
<script src="<?php echo JS_PATH."/dist/jquery.inputmask.bundle.js";?>"></script>
<script type="text/javascript">
  $(function(){
    $(".coa_suffix").inputmask("999",{ "placeholder": "XXX" });    
    $('#coa_suffix').on('input',function(e){ 
    //alert($(this).val());
        $.post('<?php echo base_url('common/ajax/backend_ajax/double_coa_check') ?>', {  coa_prefix: $("#coa_prefix option:selected").val(),coa_suffix: $(this).val()}, function(data, textStatus, xhr) {
          obj = $.parseJSON(data);
          console.log(obj);
          if (obj) {
            if (!obj.coa_id) {
              console.log("Not duplicate");
            }
            else
            {
              console.log("duplicate");
              $('.coa_duplicate').css("display","block").css("color", "red");  
              $('coa_duplicate').focus();
            }
          }
          else 
          {
            $('.coa_duplicate').css("display","none");  
          }
        });
        // var coa_suffix = $(this).val();
        // if (isNaN(coa_suffix)) {
        //   alert("not number");
        //   alert(coa_suffix.length);
        // }
    });
  });

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
</script>