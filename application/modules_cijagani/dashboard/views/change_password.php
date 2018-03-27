<section class="content-header">
  <?php 
    $list = array('active'=>'Change Password');
    echo breadcrumb($list); 
  ?>
</section><br>
<section class="content">
<?php echo get_flash_message('message'); ?>
<div class="row">
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Change Password</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
            <form class="form-horizontal validate" method="post" action="<?php echo base_url('admin/change_password/save') ?>">
              <div class="form-group">
                <label for="identity" class="col-sm-2 control-label">Identity</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" value="<?php echo $this->session->identity; ?>" name="identity" id="identity" placeholder="Username" type="text" readonly="">
                </div>
              </div>
              <div class="form-group">
                <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="old_password" id="old_password" placeholder=" Your Old Password" required="" type="password">
                </div>
              </div>
              <div class="form-group">
                <label for="new_password" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="new_password" id="new_password" placeholder=" Your New Password" required="" type="password">
                </div>
              </div>
              <div class="form-group">
                <label for="confirm_new_password" class="col-sm-2 control-label">Confirm New Password</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="confirm_new_password" id="confirm_new_password" required="" data-rule-equalTo="#new_password" placeholder=" Re-Type New Password" type="password">
                </div>
              </div>
              <div class="box-footer">
              <a href="<?php echo base_url().'dashboard'; ?>" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
            </form>
          </div><!-- /.box -->
    <!-- general form elements disabled -->
  </div>
</div>
</section>