<div class="form-horizontal">
  
 <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Admin Group</label>
    <div class="col-sm-8 error_block">
      <select id="user_id" name="user_id" class="form-control" disabled="disabled">
        <?php echo $admin_username_options; ?>
      </select>
      <input type="hidden" name="user_id" id="user_id_hidden" />
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Configuration Group</label>
    <div class="col-sm-8 error_block">
      <select id="conf_id" name="conf_id" class="form-control" required="">
        <?php echo $config_options; ?>
      </select>
    </div>
  </div>
  
</div>
<script type="text/javascript">
  jQuery(document).ready(function() {
    $("#user_id_hidden").val($('#user_id').val());
  });
</script>
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