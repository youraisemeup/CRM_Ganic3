<input class="form-control" name="id" id="id" value="<?php echo $salseman_data->s_id ?>" placeholder="Group Name" type="hidden" required="">
<div class="form-horizontal">
  <div class="form-group">
    <label for="s_code" class="col-sm-2 control-label">Sales Person Code</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="s_code" id="s_code" placeholder="Sales Person Code" value="<?php echo $salseman_data->s_code ?>"  type="text" required="" data-rule-maxLength="50" data-rule-alphanumeric="true">
    </div>
  </div>
  <div class="form-group">
    <label for="s_name" class="col-sm-2 control-label">Sales Person Name</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="s_name" id="s_name" value="<?php echo $salseman_data->s_name ?>" placeholder="Sales Person Name" type="text" required="" data-rule-maxLength="50" data-rule-alphanumeric="true">
    </div>
  </div>
  <div class="form-group">
    <label for="s_category" class="col-sm-2 control-label">Sales Person Category</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="s_category" id="s_category" value="<?php echo $salseman_data->s_category ?>" placeholder="Sales Person Category" type="text" data-rule-maxLength="10" data-rule-alphanumeric="true">
    </div>
  </div>
  <div class="form-group">
    <label for="s_note" class="col-sm-2 control-label">Notes</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="s_note" value="<?php echo $salseman_data->s_note ?>"  id="s_note" placeholder=" Notes" type="text" data-rule-maxLength="250">
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