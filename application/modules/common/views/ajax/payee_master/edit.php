<div class="form-horizontal">
    <input class="form-control" name="payee_id" id="payee_id" value="<?php echo $payee_name->payee_id ?>" placeholder="Payee Name" type="hidden" required="">
    
  <div class="form-group">
    <label for="payee_name" class="col-sm-2 control-label">Payee Name</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="payee_name" id="payee_name" value="<?php echo $payee_name->payee_name ?>" placeholder="Name" type="text" required="">
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