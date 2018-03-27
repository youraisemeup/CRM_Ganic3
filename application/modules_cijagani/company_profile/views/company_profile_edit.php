<section class="content-header">
  <?php 
    $list = array("Company Profile",'active'=>'Modify Company Profile');
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
        <h3 class="box-title">Modify Company Profile</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
        <div class="box-body with-border">
            <form class="form-horizontal validate" method="post" enctype="multipart/form-data" action="<?php echo $save_url; ?>" >
              <div class="form-group">
                <label for="company_name" class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="company_name" id="company_name"  value="<?php echo $company_details->company_name; ?>" placeholder="Company Name" type="text" required=""  disabled="">
                </div>
              </div>
              <div class="form-group">
                <label for="gst_reg_no" class="col-sm-2 control-label">GST REG. No</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="gst_reg_no" id="gst_reg_no"  value="<?php echo $company_details->gst_reg_no; ?>" placeholder="GST REG. No" type="text" required="" disabled="" maxlength="20">
                </div>
              </div>
              <div class="form-group">
                <label for="uen_no" class="col-sm-2 control-label">UEN No.</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="uen_no" id="uen_no"  value="<?php echo $company_details->uen_no; ?>" placeholder="UEN No." type="text" required="" disabled="" maxlength="20">
                </div>
              </div>
              <div class="form-group">
                <label for="company_address" class="col-sm-2 control-label">Company Address</label>
                <div class="col-sm-8 error_block">
                  <textarea class="form-control" name="company_address" id="company_address" placeholder="Company Address" required="" rows="2" maxlength="50"><?php echo $company_details->company_address; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="phone" id="phone"  value="<?php echo $company_details->phone; ?>" placeholder="Phone" type="text" required="" maxlength="15">
                </div>
              </div>
              <div class="form-group">
                <label for="fax" class="col-sm-2 control-label">FAX</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="fax" id="fax"  value="<?php echo $company_details->fax; ?>" placeholder="FAX" type="text" required="" maxlength="15">
                </div>
              </div>
              <div class="form-group">
                <label for="company_logo" class="col-sm-2 control-label">Company logo</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="company_logo" id="company_logo" type="file" disabled=""> 
                </div>
              </div>
              <div class="form-group">
                <label for="default_currency" class="col-sm-2 control-label">Currency</label>
                <div class="col-sm-8 error_block">
                  <select class="form-control select2" name="default_currency" id="default_currency" required="">
                    <?php echo $currency_options; ?>
                  </select>
                </div>
              </div>
              <div class="box-footer">
              <a href="<?php echo base_url().'dashboard'; ?>" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
            </form>
            </div>
          </div><!-- /.box -->
    <!-- general form elements disabled -->
  </div>
</div>
</section>
<?php if(($this->session->group_id==1 && $this->session->level=="TOPFORM MANAGMENT") ): 
?>
<script type="text/javascript">
    $(function(){
        $("form :input").prop("disabled", false);
    });
</script>
<?php endif; ?>
