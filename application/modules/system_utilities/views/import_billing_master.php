<section class="content-header">
  <?php 
    $list = array('active'=>'Import Billing Master');
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
        <h3 class="box-title">Import Billing Master</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
            <form autocomplete="off"class="form-horizontal validate" enctype="multipart/form-data" method="post" action="<?php echo $save_url; ?>" >
              <div class="form-group">
                <label for="db_file" class="col-sm-2 control-label">Database File (.dbf)</label>
                <div class="col-sm-8 error_block">
                  <input class="form-control" name="db_file" id="db_file" placeholder="DBF File" type="file">
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