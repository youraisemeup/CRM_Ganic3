<div class="form-horizontal">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="name" id="name"  value="" placeholder="Group Name" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="description" id="description" placeholder=" Group Description" required="" type="text">
    </div>
  </div>
  <table class=" table table-bordered">
      <tr>
        <th>Role</th>
        <th>Action</th>
      </tr>
      <?php
      foreach ($per as $id => $per) {
        echo "<tr>
          <td>".ucwords(str_replace('_', ' ',$per->name))."</td>
          <td><input id='toggle-one' type='checkbox' name='".$per->name."' class='toggle_button'></td>
          </tr>";
      }
      ?>
  </table>
</div>