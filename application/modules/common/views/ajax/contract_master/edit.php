<div class="form-horizontal">
  <input class="form-control" name="contract_id" id="contract_id" value="<?php echo $contract->contract_id ?>" placeholder="Group Name" type="hidden" required="">
  <div class="form-group">
    <label for="gst_code" class="col-sm-2 control-label">Contract Code</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="contract_code" id="contract_code" value="<?php echo $contract->contract_code; ?>"  value="" placeholder="Code" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="contract_description" class="col-sm-2 control-label">Contract Description</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="contract_description" id="contract_description" value="<?php echo $contract->contract_description; ?>"  value="" placeholder="Description" type="text" required=""> 
    </div>
  </div>
  <div class="form-group">
    <label for="contract_type" class="col-sm-2 control-label">Contract Type</label>
    <div class="col-sm-8 error_block">
      <select name="contract_type" id="contract_type" class="form-control" required="">
       <?php echo $contract_type_options; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="contract_amount" class="col-sm-2 control-label">Contract Amount</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="contract_amount" id="contract_amount" value="<?php echo $contract->contract_amount; ?>" placeholder="Amount" required="" type="number" min="0">
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