<div class="form-horizontal">
  <div class="form-group">
    <label for="emp_name" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="emp_name" id="emp_name"  value="" placeholder="John Doe" type="text" required="">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="email" id="email" placeholder="johndoe@gmail.com" required="" type="text">
      <div class="help-block" id="email_error"></div>
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="username" id="username" placeholder="john17" required="" type="text">
      <div class="help-block" id="username_error"></div>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="password" id="password" placeholder="Password" required="" type="password">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-8 error_block">
      <input class="form-control" name="confirm_password" id="confirm_password" data-rule-equalTo="#password" placeholder="Confirm Password" required="" type="password">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-8 error_block">
      <select id="group_id" name="group_id" class="form-control">
        <?php echo $group_options; ?>
      </select>
    </div>
  </div>
  
</div>
<script type="text/javascript">
$("#email,#username").bind("blur",function(event) {
  // alert();
  value=$(this).val();
  column=$(this).attr('id');
  table="users";
  $.post('<?php echo base_url('common/ajax_controller/check_availability') ?>', {value: value,column: column,table: table}, function(data) {
    data=$.trim(data);
    if(data=="TRUE"){
      var error_name=column.replace(/_/g, ' ');
      $("#save").attr('disabled', true);
      $("#"+column).closest('.form-group').removeClass('has-error has-success').addClass('has-error');
      $("#"+column+"_error").html((error_name.charAt(0).toUpperCase()+ error_name.slice(1).toLowerCase())+" Already Registerd").show();
    }
    else{
     var error_name=column.replace(/_/g, ' ');
      $("#save").attr('disabled', false);
      $("#"+column).addClass('valid').closest('.form-group').removeClass('has-error has-success').addClass('has-success');
      $("#"+column+"_error").html("");
    }
  });
});
</script>