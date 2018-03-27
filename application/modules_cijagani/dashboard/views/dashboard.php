<section class="content-header">
  <h1>
    Admin Dashboard
    <small>Control panel</small>
  </h1>
  <?php echo breadcrumb(); ?>
</section>
<section class="content">
  <?php echo get_flash_message('message'); ?>
  <div class="row">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua" id="system_utilities">
            <div class="inner">
              <h1>System Utilities</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="#" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow" id="master_files">
            <div class="inner">
              <h1>Master <br>Files</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="#" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple" id="combo_tables">
            <div class="inner">
              <h1>Combo <br> Tables</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="#" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon" id="staff_managment">
            <div class="inner">
              <h1>Staff Managment</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
  </div>
  <div class="row" id="system_utilities_menu">
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Backup Data Files</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>system_utilities/backup_database" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Restore Data Files</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>system_utilities/restore_database" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Initialize Master Files</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>system_utilities/initialize_database" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
  </div>
  <div class="row" id="master_files_menu">
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Customer Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>master_files/customer_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Billing Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>master_files/billing_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Sales Person Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>master_files/salesman_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
  </div>
  <div class="row" id="combo_tables_menu">
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Forex Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>combo_tables/forex_master"" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>GST Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>combo_tables/gst_master"" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Country</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>combo_tables/country_master"" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
  </div>
  <div class="row" id="staff_managment_menu">
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Add Employee Group</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>staff_management/manage_group" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Add Employee</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>staff_management/manage_employee" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
  </div>
</section>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $("#system_utilities_menu,#master_files_menu,#staff_managment_menu,#combo_tables_menu").hide();
  $("#system_utilities,#master_files,#staff_managment,#combo_tables").click(function() {
    $("#system_utilities_menu,#master_files_menu,#staff_managment_menu,#combo_tables_menu").slideUp();
    id=$(this).attr('id');
    $("#"+id+"_menu").slideDown();
    $("html, body").delay(1000).animate({
        scrollTop: $("#"+id+"_menu").offset().top 
    }, 500);
    // $("#"+id+"_menu").scrollIntoView(true);
  });
});
</script>    
<script type="text/javascript">
  $("#system_utilities_menu,#master_files_menu,#staff_managment_menu,#combo_tables_menu").find('a').each(function() {
   link=$(this).attr('href').split('/');
   // console.log(link);
   if(!link[4]){
    // $(this).hide();
    $(this).html("&nbsp;");
   }
});
</script>