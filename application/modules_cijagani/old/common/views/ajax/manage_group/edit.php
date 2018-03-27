<div class="form-horizontal">
  <div class="form-group">
  	<input class="form-control" name="id" id="id" value="<?php echo $group->id ?>" placeholder="Group Name" type="hidden" required="">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="name" id="name" value="<?php echo $group->name ?>" placeholder="Group Name" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="description" value="<?php echo $group->description ?>"  id="description" placeholder=" Group Description" required="" type="text">
    </div>
  </div>
  <?php if($group->id!=1): ?>
  <table class=" table table-bordered">
      <tr>
        <th>Role</th>
        <th>Action</th>
      </tr>
      <?php
      $existing_per=(array)json_decode($group->permissions);
       foreach ($per as $id => $per) {
      	?>
        <tr>
          <td><?php echo ucwords(str_replace('_', ' ',$per->name)); ?></td>
          <?php
           if ($existing_per[$per->name]) { ?>
          <td><input id='toggle-one' checked="" type='checkbox' name='<?php echo $per->name ?>' class='toggle_button'></td>
          <?php }else{ ?>
          <td><input id='toggle-one' type='checkbox' name='<?php echo $per->name ?>' class='toggle_button'></td>
          <?php } ?>
          </tr>
      <?php }
      ?>
  </table>
<?php endif; ?>
</div>
<?php 
if($mode=="view" || $group->id==1)
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