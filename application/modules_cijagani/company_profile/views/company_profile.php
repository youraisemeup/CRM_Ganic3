<?php $permissions=json_decode($this->custom->getSingleValue('groups','permissions',array('id' => $this->session->group_id))); 
   ?>
<section class="content-header">
  <?php 
    $list = array('active'=>'Company Profile');
    echo breadcrumb($list); 
  ?>
</section><br>
<section class="content">
<?php echo get_flash_message('message'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Company Profile</h3>
        <?php
         if(($this->session->group_id==1 && $this->session->level=="TOPFORM MANAGMENT") || $permissions->company_profile): ?>
        <a class="btn btn-primary pull-right btn-xs" href="<?php echo base_url("company_profile/index/edit"); ?>"><i class="fa fa-pencil"></i> Edit</a>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-danger">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <center><strong>
          <div class="box-header with-border">
            <img src="<?php echo UPLOAD_PATH.'site/'.$company_details->company_logo ?>" class='img img-thumbnail' height="100px" width="100px"/>
            <h4><?php echo $company_details->company_name ?></h4>
          </div>
          <div class="box-body">
            <?php echo /*str_replace(',', "<br>",*/$company_details->company_address/*)*/; ?>
            <br><br>GST Register Number : <?php echo $company_details->gst_reg_no ?>
            <br>UEN No. : <?php echo $company_details->uen_no; ?>
            <br>Phone : <?php echo $company_details->phone ?>
            <br>Fax : <?php echo $company_details->fax ?>
            <br>Currency : <?php echo $company_details->default_currency ?>
          </div>
          </center></strong>
        </div>
      </div>
    </div>
  </div>
</div>
</section>