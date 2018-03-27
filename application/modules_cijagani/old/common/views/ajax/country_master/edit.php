<div class="form-horizontal">
    <input class="form-control" name="id" id="id" value="<?php echo $country->country_id ?>" placeholder="Group Name" type="hidden" required="">
    <div class="form-group">
      <label for="country_code" class="col-sm-2 control-label">Country Code</label>
      <div class="col-sm-8 error_block">
        <input class="form-control" name="country_code" value="<?php echo $country->country_code ?>"  id="country_code" placeholder=" Code" required="" type="text">
      </div>
    </div>
  <div class="form-group">
    <label for="country_name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="country_name" id="country_name" value="<?php echo $country->country_name ?>" placeholder="Name" type="text" required="">
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