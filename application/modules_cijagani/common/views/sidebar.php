

<?php $permissions=json_decode($this->custom->getSingleValue('groups','permissions',array('id' => $this->session->group_id))); 
   ?>
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?php echo IMG_PATH.'avatar5.png';?>" class="img-circle" alt="User Image" />
         </div>
         <div class="pull-left info">
            <p>Hi, <?php echo $this->session->username; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->level; ?></a>
         </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
         <!-- <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>-->
            <li class="active">
               <a href="<?php echo base_url(); ?>dashboard" class="auto">
               <i class="fa fa-dashboard">
               </i>
               <span class="font-bold">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>dashboard/change_password" class="auto">
                  <!-- <span class="pull-right text-muted">
                     <i class="i i-circle-sm-o text"></i>
                     <i class="i i-circle-sm text-active"></i>
                     </span> -->
                  <!-- <b class="badge bg-danger pull-right">4</b> -->
                  <i class="fa fa-user"></i>
                  <span class="font-bold">Change Password</span>
               </a>
            </li>
            <!-- System utilities code start -->
            <li class="treeview">
               <a href="#">
               <i class="fa fa-database"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">System Manager</span>
               </a>
                <ul class="treeview-menu"> 
            <?php if($this->ion_auth->is_admin() && $this->session->group_id==1): ?>
            <li>
               <a href="<?php echo base_url(); ?>company_profile" class="auto">
               <i class="fa fa-building"></i>
               <span class="font-bold">TOPFORM Utility</span>
               </a>
            </li>
            <?php endif; ?> 
            <?php if(!$this->ion_auth->is_admin() && $this->session->group_id!=1): ?>
               <li>
                  <a href="<?php echo base_url(); ?>company_profile" class="auto">
                  <i class="fa fa-building"></i>
                  <span class="font-bold">Company Profile</span>
                  </a>
               </li>
            <?php endif; ?>
            <?php if($this->ion_auth->is_admin() && $this->session->group_id==1): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-wrench"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">System Utilities</span>
               </a>
               <ul class="treeview-menu">
                  <li>
                     <a href="<?php echo base_url(); ?>system_utilities/backup_database" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Backup Data Files</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url(); ?>system_utilities/restore_database" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Restore Data Files</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url(); ?>system_utilities/initialize_database" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Initialize Master Files</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php endif; ?>
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->customer_master || $permissions->billing_master || $permissions->salesman_master): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-cog"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Master Files</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->customer_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>master_files/customer_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Customer Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->billing_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>master_files/billing_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Billing Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->salesman_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>master_files/salesman_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Sales Person Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
               </ul>
            </li>
            <?php endif; ?>
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->forex_master || $permissions->gst_master || $permissions->country_master): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-cogs"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Combo Tables</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->forex_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/forex_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Forex Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->gst_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/gst_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>GST Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $permissions->country_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/country_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Country</span>
                     </a>
                  </li>
                  <?php endif; ?>
               </ul>
            </li>
            <?php endif; ?>
             <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->ion_auth->is_admin() && $this->session->group_id==1): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-users"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Staff Management</span>
               </a>
               <ul class="treeview-menu">
                  <li>
                     <a href="<?php echo base_url(); ?>staff_management/manage_group" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Add Employee Group</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo base_url(); ?>staff_management/manage_employee" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Add Employee</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php endif; ?>
            </ul>
            </li>
           
            <!-- order entry start -->
            
            <!-- order entry End -->
            
            <!-- Invoice Start -->
            <li>
               <!--<php echo base_url();?>admin/logout-->
               <a href="<?php echo base_url(); ?>common/signout" class="auto">
               <i class="fa fa-sign-out"></i>
               <span class="font-bold">Logout</span>
               </a>
            </li>
         </ul>
         <!-- <div class="line dk hidden-nav-xs"></div> -->
   </section>
   <!-- /.sidebar -->
</aside>
<script type="text/javascript">
  $('.sidebar-menu').find('a').each(function() {
   link=$(this).attr('href').split('/');
   console.log(link);
   if(!link[3] && link[0]!="#"){
    $(this).hide();
   }
});
</script>