

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
            <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 ): ?>
            <li>
               <a href="<?php echo base_url(); ?>dashboard/change_password" class="auto">
                  <i class="fa fa-user"></i>
                  <span class="font-bold">Change Admin Password</span>
               </a>
            </li>
            <?php endif; ?> 
            <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 ): ?>
            <li>
               <a href="<?php echo base_url(); ?>dashboard/configuration" class="auto">
                  <i class="fa fa-wrench"></i>
                  <span class="font-bold">Configuration</span>
               </a>
            </li>
            <?php endif; ?> 
            <!-- System utilities code start -->
            <li class="treeview">
               <a href="#">
               <i class="fa fa-database"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">System Manager</span>
               </a>
                <ul class="treeview-menu"> 
            <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 ): ?>
            <li>
               <a href="<?php echo base_url(); ?>company_profile" class="auto">
               <i class="fa fa-building"></i>
               <span class="font-bold">Company Profile</span>
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
            <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin"): ?>
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
            
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id== 6): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-cloud-upload"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Migrate Data Files</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->customer_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>system_utilities/import_customer_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Import Customer Data</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->billing_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>system_utilities/import_billing_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Import Billing Data</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->salesman_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>system_utilities/import_salesman_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Import Sales Person Data</span>
                     </a>
                  </li>
                  <?php endif; ?>
               </ul>
            </li>
            <?php endif; ?>
            
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->customer_master || $permissions->billing_master || $permissions->salesman_master): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-cog"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Master Files</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->customer_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>master_files/customer_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Customer Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id== 4 || $this->session->conf_id== 5 || $this->session->conf_id== 6): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>master_files/supplier_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Supplier Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->billing_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>master_files/billing_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Billing Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->salesman_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>master_files/salesman_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Sales Person Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->salesman_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/chart_of_account" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Account Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->salesman_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/payee_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Payee Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->salesman_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/contract_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Contract Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
               </ul>
            </li>
            <?php endif; ?>
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->forex_master || $permissions->gst_master || $permissions->country_master): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-cogs"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Combo Tables</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->forex_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/forex_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Forex Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->forex_master): ?>
                  <!-- <li>
                     <a href="<?php echo base_url(); ?>combo_tables/m_create" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>M-Create</span>
                     </a>
                  </li> -->
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->gst_master): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>combo_tables/gst_master" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>GST Master</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->country_master): ?>
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
             <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id== 6 ): ?>
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
           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting || $permissions->quotation || $permissions->pending_quotation || $permissions->confirm_quotation || $permissions->rejected_quotation): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-clone"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Application</span>
               </a>
                <ul class="treeview-menu"> 
               <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Quotation</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                     <li>
                        <a href="<?php echo base_url(); ?>quotation/quotation_setting" class="auto">
                        <i class="fa fa-paperclip"></i>
                        <span class="font-bold">Quotation Setting</span>
                        </a>
                     </li>
                     <?php endif; ?>
                     <!-- System utilities code close -->
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation): ?>
            <li>
               <a href="<?php echo base_url(); ?>quotation" class="auto">
               <i class="fa fa-file-o"></i>
               <span class="font-bold">New Quotation</span>
               </a>
            </li>
            <?php endif; ?>
            <!-- <li>
               <a href="<php echo base_url();?>admin/quotationlist" class="auto">
                   <span class="pull-right text-muted">
               <i class="i i-circle-sm-o text"></i>
               <i class="i i-circle-sm text-active"></i>
               </span>
                   <i class="i i-docs icon">
               </i>
                   <span class="font-bold">Quotationlist</span>
               </a>
               </li> -->
     <!--       <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation || $permissions->confirm_quotation || $permissions->rejected_quotation): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Quotation listing</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/pending" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Pending Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/confirm" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Confirm Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->rejected_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/rejected" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Rejected Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?> -->
                  
                        <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation  || $permissions->confirm_quotation || $permissions->rejected_quotation|| $permissions->successful_quotation|| $permissions->deleted_quotation): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Quotation listing</span>
               </a>
               <ul class="treeview-menu">
                <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/confirm" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Confirmed Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?>
                   <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->rejected_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/rejected" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Rejected Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  
                   <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->successful_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/successful" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Successful Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  
                   <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->deleted_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/deleted" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Deleted Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  
                <!--  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/pending" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Pending Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                  <li>
                     <a href="<?php echo base_url(); ?>quotation/quotationlist/confirm" class="auto">
                     <i class="fa fa-arrow-right"></i>
                     <span>Confirm Quotation</span>
                     </a>
                  </li>
                  <?php endif; ?> -->
                 
               </ul>
            </li>
            <?php endif; ?>      
            
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                     <li>
                        <a href="javascript:void(0);" class="auto">
                        <i class="fa fa-bolt"></i>
                        <span class="font-bold">ZAP Quotation</span>
                        </a>
                     </li>
                     <?php endif; ?>
               </ul>
            </li>
            <?php endif; ?>      
               </ul>
            </li>

            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Quotation</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                     <li>
                        <a href="<?php echo base_url(); ?>quotation/quotation_setting" class="auto">
                        <i class="fa fa-paperclip"></i>
                        <span class="font-bold">Quotation Setting</span>
                        </a>
                     </li>
                     <?php endif; ?>
                     <!-- System utilities code close -->
                     <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation): ?>
                     <li>
                        <a href="<?php echo base_url(); ?>quotation" class="auto">
                        <i class="fa fa-file-o"></i>
                        <span class="font-bold">New Quotation</span>
                        </a>
                     </li>
                     <?php endif; ?>
                     <!-- <li>
                        <a href="<php echo base_url();?>admin/quotationlist" class="auto">
                            <span class="pull-right text-muted">
                        <i class="i i-circle-sm-o text"></i>
                        <i class="i i-circle-sm text-active"></i>
                        </span>
                            <i class="i i-docs icon">
                        </i>
                            <span class="font-bold">Quotationlist</span>
                        </a>
                        </li> -->
              <!--       <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation || $permissions->confirm_quotation || $permissions->rejected_quotation): ?>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i>
                        <i class="fa fa-angle-left pull-right"></i>
                        <span class="font-bold">Quotation listing</span>
                        </a>
                        <ul class="treeview-menu">
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>quotation/quotationlist/pending" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Pending Quotation</span>
                              </a>
                           </li>
                           <?php endif; ?>
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>quotation/quotationlist/confirm" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Confirm Quotation</span>
                              </a>
                           </li>
                           <?php endif; ?>
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->rejected_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>quotation/quotationlist/rejected" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Rejected Quotation</span>
                              </a>
                           </li>
                           <?php endif; ?> -->
                  
                        <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation  || $permissions->confirm_quotation || $permissions->rejected_quotation|| $permissions->successful_quotation|| $permissions->deleted_quotation): ?>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-list"></i>
                           <i class="fa fa-angle-left pull-right"></i>
                           <span class="font-bold">Quotation listing</span>
                           </a>
                           <ul class="treeview-menu">
                            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>quotation/quotationlist/confirm" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Confirmed Quotation</span>
                                 </a>
                              </li>
                              <?php endif; ?>
                               <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->rejected_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>quotation/quotationlist/rejected" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Rejected Quotation</span>
                                 </a>
                              </li>
                              <?php endif; ?>
                              
                               <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->successful_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>quotation/quotationlist/successful" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Successful Quotation</span>
                                 </a>
                              </li>
                              <?php endif; ?>
                              
                               <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->deleted_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>quotation/quotationlist/deleted" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Deleted Quotation</span>
                                 </a>
                              </li>
                              <?php endif; ?>
                           </ul>
                        </li>
                        <?php endif; ?>      
            
                        <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                        <li>
                           <a href="javascript:void(0);" class="zap_quotation auto">
                              <!-- <?php echo base_url(); ?>quotation/zap_Quotation_data -->
                           <i class="fa fa-bolt"></i>
                           <span class="font-bold">ZAP Quotation</span>
                           </a>
                        </li>
                        <?php endif; ?>
                  </ul>
            </li>
            <?php endif; ?> 
            
            
            <!-- End of Old Invoice -->
            <!-- Start of New Invoice -->
            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Invoice</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                     <li>
                        <a href="<?php echo base_url(); ?>invoice_new/invoice_new_setting" class="auto">
                        <i class="fa fa-paperclip"></i>
                        <span class="font-bold">Invoice_new Setting</span>
                        </a>
                     </li>
                     <?php endif; ?>
                     <!-- System utilities code close -->
                     <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation): ?>
                     <li>
                        <a href="JavaScript:void(0);">
                        <i class="fa fa-list"></i>
                        <i class="fa fa-angle-left pull-right"></i>
                        <span class="font-bold">New invoice</span>
                        </a>
                        <ul class="treeview-menu">
                           <li>
                              <a href="<?php echo base_url();?>invoice_new" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Itemised Entries</span>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url(); ?>invoice_new/extract_from_quotatin" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Extract Quotation</span>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <?php endif; ?>
                     <!-- <li>
                        <a href="<php echo base_url();?>admin/quotationlist" class="auto">
                            <span class="pull-right text-muted">
                        <i class="i i-circle-sm-o text"></i>
                        <i class="i i-circle-sm text-active"></i>
                        </span>
                            <i class="i i-docs icon">
                        </i>
                            <span class="font-bold">Quotationlist</span>
                        </a>
                        </li> -->
              <!--       <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation || $permissions->confirm_quotation || $permissions->rejected_quotation): ?>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i>
                        <i class="fa fa-angle-left pull-right"></i>
                        <span class="font-bold">Quotation listing</span>
                        </a>
                        <ul class="treeview-menu">
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>quotation/quotationlist/pending" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Pending Quotation</span>
                              </a>
                           </li>
                           <?php endif; ?>
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>quotation/quotationlist/confirm" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Confirm Quotation</span>
                              </a>
                           </li>
                           <?php endif; ?>
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->rejected_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>quotation/quotationlist/rejected" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Rejected Quotation</span>
                              </a>
                           </li>
                           <?php endif; ?> -->
                  
                        <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation  || $permissions->confirm_quotation || $permissions->rejected_quotation|| $permissions->successful_quotation|| $permissions->deleted_quotation): ?>
                        <li class="treeview">
                           <a href="#">
                           <i class="fa fa-list"></i>
                           <i class="fa fa-angle-left pull-right"></i>
                           <span class="font-bold">Invoice listing</span>
                           </a>
                           <ul class="treeview-menu">
                            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>invoice_new/invoicelist/confirmed" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Confirmed Invoice</span>
                                 </a>
                              </li>
                              <?php endif; ?>
                               <!-- <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->rejected_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>quotation/quotationlist/rejected" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Rejected Quotation</span>
                                 </a>
                              </li>
                              <?php endif; ?> -->
                              
                               <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->successful_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>invoice_new/invoicelist/posted" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Posted Invoice</span>
                                 </a>
                              </li>
                              <?php endif; ?>
                              
                               <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->deleted_quotation): ?>
                              <li>
                                 <a href="<?php echo base_url(); ?>invoice_new/invoicelist/deleted" class="auto">
                                 <i class="fa fa-arrow-right"></i>
                                 <span>Deleted Invoice</span>
                                 </a>
                              </li>
                              <?php endif; ?>
                           </ul>
                        </li>
                        <?php endif; ?>

                         <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_quotation  || $permissions->confirm_quotation || $permissions->rejected_quotation|| $permissions->successful_quotation|| $permissions->deleted_quotation): ?>

                        <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i>
                        <i class="fa fa-angle-left pull-right"></i>
                        <span class="font-bold">Other listing</span>
                        </a>
                        <ul class="treeview-menu">
                         <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>invoice_new/otherlist/AR" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>AR listing</span>
                              </a>
                           </li>
                           <?php endif; ?>
                                              
                            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->successful_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>invoice_new/otherlist/GL" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>GL listing</span>
                              </a>
                           </li>
                           <?php endif; ?>
                           
                            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->deleted_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>invoice_new/otherlist/GST" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>GST listing</span>
                              </a>
                           </li>
                           <?php endif; ?>
                       
                       <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->deleted_quotation): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>invoice_new/otherlist/stock" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Stock listing</span>
                              </a>
                           </li>
                           <?php endif; ?>
                        </ul>
                           </li>
                           <?php endif; ?>      
            
                        <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                        <li>
                           <a href="javascript:void(0);" class="zap_invoice auto">
                           <!-- <a href="<?php echo base_url(); ?>invoice/zap_Invoice_data" class="auto"> -->
                           <i class="fa fa-bolt"></i>
                           <span class="font-bold">ZAP Invoice</span>
                           </a>
                        </li>
                        <?php endif; ?>
                  </ul>
            </li>
            <?php endif; ?>
            <!--- End of New Invoice -->

            

            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 2 || $this->session->conf_id == 3 || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
            <li class="treeview">
               <a href="javascript:void(0);">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Receipt</span>
               </a>
               <ul class="treeview-menu">
                  
               <li>
                  <a href="<?php echo base_url(); ?>receipt/receipt_setting" class="auto">
                  <i class="fa fa-paperclip"></i>
                  <span class="font-bold">Receipt Setting</span>
                  </a>
               </li>
                     
               <li>
                  <a href="<?php echo base_url(); ?>receipt" class="auto">
                  <i class="fa fa-file-o"></i>
                  <span class="font-bold">New Receipt</span>
                  </a>
               </li>

               <li>
                  <a href="#" class="auto">
                  <i class="fa fa-file-o"></i>
                  <i class="fa fa-angle-left pull-right"></i>
                  <span class="font-bold">Receipt Listing</span>
                  </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>receipt/receiptlist/confirmed" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Confirmed Receipt</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>receipt/receiptlist/posted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Posted Receipt</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>receipt/receiptlist/deleted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Deleted Receipt</span>
                           </a>
                        </li>
                     </ul>
               </li>
               
                 <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                     <li>
                        <a href="JavaScript:void(0);" class="zap_receipt auto">
                           <!-- <a href="<?php echo base_url(); ?>receipt/zap_receipt_data" class="auto"> -->
                        <i class="fa fa-bolt"></i>
                        <span class="font-bold">ZAP Receipt</span>
                        </a>
                     </li>
                     <?php endif; ?>
            
               </ul>
            </li>
            <?php endif; ?>
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 2 || $this->session->conf_id == 3 || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Accounts Receivable</span>
               </a>
               <ul class="treeview-menu">
               
               <li>
                  <a href="<?php echo base_url(); ?>account/auditlist" class="auto">
                  <i class="fa fa-list-alt"></i>
                  <span class="font-bold">Audit Listing</span>
                  </a>
               </li>
               
               <li>
                  <a href="<?php echo base_url(); ?>account/opening_balance" class="auto">
                  <i class="fa fa-list-alt"></i>
                  <span class="font-bold">Opening Balance b/f</span>
                  </a>
               </li>

               <li>
                  <a href="#" class="auto">
                  <i class="fa fa-file-o"></i>
                  <i class="fa fa-angle-left pull-right"></i>
                  <span class="font-bold">Opening Listing</span>
                  </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>account/openlist/confirmed" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Confirmed Opening Balance</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>account/openlist/posted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Posted Opening Balance</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>account/openlist/deleted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Deleted Opening Balance</span>
                           </a>
                        </li>
                     </ul>
               </li>

               <li>
                  <a href="<?php echo base_url(); ?>account/new_debtor" class="auto">
                  <i class="fa fa-file-o"></i>
                  <span class="font-bold">Debtor Statement</span>
                  </a>
               </li>
               
               <li>
                  <a href="#" class="auto">
                  <i class="fa fa-file-o"></i>
                  <i class="fa fa-angle-left pull-right"></i>
                  <span class="font-bold">Offset Records</span>
                  </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>account/offset" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Offset Record</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>account/offset_all" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>OFFSET ALL</span>
                           </a>
                        </li>
                        
                     </ul>
               </li>
               
               <!-- <li>
                  <a href="<?php echo base_url(); ?>account" class="auto">
                  <i class="fa fa-file-o"></i>
                  <span class="font-bold">Debtor Statement</span>
                  </a>
               </li> -->

               <li>
                  <a href="<?php echo base_url(); ?>account/other_debtor" class="auto">
                  <i class="fa fa-paperclip"></i>
                  <span class="font-bold">Debtors' Listing</span>
                  </a>
               </li>
               
               <li>
                  <a href="<?php echo base_url(); ?>account/age_debtor" class="auto">
                  <i class="fa fa-paperclip"></i>
                  <span class="font-bold">Debtors' Ageing</span>
                  </a>
               </li>

               <!-- <li>
                  <a href="#" class="auto">
                  <i class="fa fa-file-o"></i>
                  <span class="font-bold">Account Listing</span>
                  </a>
               </li> -->

               
                 <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                     <li>
                        <a href="javascript:void(0);" class="zap_ar auto">
                           <!-- <a href="<?php echo base_url(); ?>account/zap_ar_data" class="auto"> -->
                        <i class="fa fa-bolt"></i>
                        <span class="font-bold">ZAP Accounts Receivable</span>
                        </a>
                     </li>
                     <?php endif; ?>
            
               </ul>
            </li>
            <?php endif; ?>
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 3 || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Stocks</span>
               </a>
               <ul class="treeview-menu">
                  <li>
                     <a href="" class="auto">
                     <i class="fa fa-list-alt"></i>
                     <i class="fa fa-angle-left pull-right"></i>
                     <span class="font-bold">Opening Balance</span>
                     </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>stock/opening_balance" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Enter Opening Balance</span>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Opening Balance Listing</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_openlist/confirmed" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Confirmed Balance</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_openlist/posted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Posted Balance</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_openlist/deleted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Deleted Balance</span>
                                    </a>
                                 </li>
                              </ul>
                        </li>
                        
                     </ul>
                  </li>

                  <li>
                     <a href="#" class="auto">
                     <i class="fa fa-list-alt"></i>
                     <i class="fa fa-angle-left pull-right"></i>
                     <span class="font-bold">Purchases</span>
                     </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>stock/enter_stock_purchases" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Enter Stock Purchases</span> 
                           </a>
                        </li>
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Stock Purchases Listing</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/confirm" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Confirmed Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/posted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Posted Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/deleted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Deleted Listing</span>
                                    </a>
                                 </li>
                              </ul>
                        </li>
                        
                     </ul>
                  </li>

                  <li>
                     <a href="#" class="auto">
                     <i class="fa fa-list-alt"></i>
                     <i class="fa fa-angle-left pull-right"></i>
                     <span class="font-bold">Adjustment(+/-)</span>
                     </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>stock/enter_stock_adjustment" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Enter Stock Adjustment</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Stock Adjustment Listing</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/confirmed" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Confirmed Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/posted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Posted Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/deleted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Deleted Listing</span>
                                    </a>
                                 </li>
                              </ul>
                        </li>
                        
                     </ul>
                  </li>

                  <li>
                     <a href="<?php echo base_url(); ?>stock/stock_status" class="auto">
                     <i class="fa fa-list-alt"></i>
                     <span class="font-bold">Stock Status</span>
                     </a>
                  </li>             
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                     <li>
                        <a href="javascript:void(0);" class="zap_stock auto">
                           <!-- <a href="<?php echo base_url(); ?>stock/zap_stock" class="auto"> -->
                        <i class="fa fa-bolt"></i>
                        <span class="font-bold">ZAP Stock</span>
                        </a>
                     </li>
                     <?php endif; ?>     

               </ul>
            </li>
            <?php endif; ?>
            <!-- Backend module begin -->
            <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Backend</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                  <li>
                     <a href="" class="auto">
                     <i class="fa fa-list-alt"></i>
                     <i class="fa fa-angle-left pull-right"></i>
                     <span class="font-bold">Management Module</span>
                     </a>
                     <ul class="treeview-menu">
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Purchases</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>New Purchases</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Purchases Listing</span>
                                    </a>
                                       <ul class="treeview-menu">
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/purchaseslist/confirmed">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Confirmed Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/purchaseslist/posted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Posted Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/purchaseslist/deleted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Deleted Listing</span>
                                             </a>
                                          </li>
                                       </ul>
                                 </li>
                                 <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                                    <li>
                                       <a href="javascript:void(0);" class="zap_purchases auto">
                                       <i class="fa fa-bolt"></i>
                                       <span class="font-bold">ZAP Purchases</span>
                                       </a>
                                    </li>
                                 <?php endif; ?> 
                              </ul>
                        </li>
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Accounts Payable</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/aplisting" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Accounts Payable</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/ap_openbal" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>AP Opening Bal BF</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>AP Opening Bal Listing</span>
                                    </a>
                                       <ul class="treeview-menu">
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/ap_openlist/confirmed">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Confirmed Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/ap_openlist/posted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Posted Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/ap_openlist/deleted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Deleted Listing</span>
                                             </a>
                                          </li>
                                       </ul>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/credit_statement" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Creditor Statements</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Offset Records</span>
                                    </a>
                                       <ul class="treeview-menu">
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/offset" class="auto">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Offset Record</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/offset_all" class="auto">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>OFFSET ALL</span>
                                             </a>
                                          </li>
                                          
                                       </ul>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/credit_listing" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Creditors Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/credit_ageing" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Creditors Ageing</span>
                                    </a>
                                 </li>
                                 <!-- <li>
                                    <a href="<?php echo base_url(); ?>backend/bank_statement" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Bank Tranactions</span>
                                    </a>
                                 </li> -->
                                 <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                                    <li>
                                       <a href="javascript:void(0);" class="zap_ap auto">
                                       <i class="fa fa-bolt"></i>
                                       <span class="font-bold">ZAP AP</span>
                                       </a>
                                    </li>
                                 <?php endif; ?> 
                              </ul>
                        </li>
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Stock Reports</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/histcostlisting" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Historical Costing List</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/stock_report_base_wac" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Based on W.A.C</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/stock_report_base_fifo" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Based on FIFO</span>
                                    </a>
                                 </li>
                                 <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                                    <li>
                                       <a href="javascript:void(0);" class="zap_hc auto">
                                       <i class="fa fa-bolt"></i>
                                       <span class="font-bold">ZAP Historical Costing</span>
                                       </a>
                                    </li>
                                 <?php endif; ?> 
                              </ul>
                        </li>
                        
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Payment Module</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/payment_setting" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Payment Setting</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/new_payment" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Payment to Supplier</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/other_payment" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>OTHER Payment</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Payment to Supplier Listing</span>
                                    </a>
                                       <ul class="treeview-menu">
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/paymentlist/confirmed">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Confirmed Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/paymentlist/posted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Posted Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/paymentlist/deleted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Deleted Listing</span>
                                             </a>
                                          </li>
                                       </ul>
                                 </li>
                                 <li>
                                    <a href="#" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>OTHER Payment Listing</span>
                                    </a>
                                       <ul class="treeview-menu">
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/opaymentlist/confirmed">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Confirmed Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/opaymentlist/posted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Posted Listing</span>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="<?php echo base_url(); ?>backend/opaymentlist/deleted">
                                             <i class="fa fa-arrow-right"></i>
                                             <span>Deleted Listing</span>
                                             </a>
                                          </li>
                                       </ul>
                                 </li>
                                 <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                                    <li>
                                       <a href="javascript:void(0);" class="zap_payment auto">
                                       <i class="fa fa-bolt"></i>
                                       <span class="font-bold">ZAP Payment to Supplier</span>
                                       </a>
                                    </li>
                                 <?php endif; ?>
                                 <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->quotation_setting): ?>
                                    <li>
                                       <a href="javascript:void(0);" class="zap_opayment auto">
                                       <i class="fa fa-bolt"></i>
                                       <span class="font-bold">ZAP OTHER Payment</span>
                                       </a>
                                    </li>
                                 <?php endif; ?> 
                              </ul>
                        </li>
                        <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>  
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Bank Module cw bal bf</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="#" class="auto">
                                    <i class="fa fa-list-alt"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                    <span class="font-bold">Bank Adjustment</span>
                                    </a>
                                    <ul class="treeview-menu">
                                       <li>
                                          <a href="<?php echo base_url(); ?>backend/enter_bank_adjustment" class="auto">
                                          <i class="fa fa-arrow-right"></i>
                                          <span>Enter Adjustment</span>
                                          </a>
                                       </li>
                                       <li>
                                          <a href="javascript:void(0);" class="auto">
                                          <i class="fa fa-arrow-right"></i>
                                          <span>Adjustment Listing</span>
                                          </a>
                                             <ul class="treeview-menu">
                                                <li>
                                                   <a href="<?php echo base_url(); ?>backend/bank_adjustmentlisting/confirmed" class="auto">
                                                   <i class="fa fa-arrow-right"></i>
                                                   <span>Confirmed Listing</span>
                                                   </a>
                                                </li>
                                                <li>
                                                   <a href="<?php echo base_url(); ?>backend/bank_adjustmentlisting/posted" class="auto">
                                                   <i class="fa fa-arrow-right"></i>
                                                   <span>Posted Listing</span>
                                                   </a>
                                                </li>
                                                <li>
                                                   <a href="<?php echo base_url(); ?>backend/bank_adjustmentlisting/deleted" class="auto">
                                                   <i class="fa fa-arrow-right"></i>
                                                   <span>Deleted Listing</span>
                                                   </a>
                                                </li>
                                             </ul>
                                       </li>
                                       
                                    </ul>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>backend/bank_statement" class="auto">
                                    <i class="fa fa-list-alt"></i>
                                    <span>Bank Statement</span>
                                    </a>
                                 </li>
                                 
                                 <li>
                                    <a href="javascript:void(0);" class="zap_bank auto">
                                    <i class="fa fa-bolt"></i>
                                    <span class="font-bold">ZAP Bank</span>
                                    </a>
                                 </li>
                              </ul>
                        </li>
                        <?php endif;?>
                     </ul>
                  </li>
                  <?php endif;?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                  <li>
                     <a href="javascript:void(0);" class="auto">
                     <i class="fa fa-list-alt"></i>
                     <i class="fa fa-angle-left pull-right"></i>
                     <span class="font-bold">Accountant Module</span>
                     </a>
                     <!-- <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>stock/enter_stock_purchases" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Enter Stock Purchases</span> 
                           </a>
                        </li>
                        <li>
                           <a href="#" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Stock Purchases Listing</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/confirm" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Confirmed Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/posted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Posted Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/deleted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Deleted Listing</span>
                                    </a>
                                 </li>
                              </ul>
                        </li>
                        
                     </ul> -->
                  </li>
                  <?php endif;?>
                  <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->conf_id== 6): ?>
                  <li>
                     <a href="javascript:void(0);" class="auto">
                     <i class="fa fa-list-alt"></i>
                     <i class="fa fa-angle-left pull-right"></i>
                     <span class="font-bold">Special Module</span>
                     </a>
                     <!-- <ul class="treeview-menu">
                        <li>
                           <a href="<?php echo base_url(); ?>stock/enter_stock_adjustment" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Enter Stock Adjustment</span>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Stock Adjustment Listing</span>
                           </a>
                              <ul class="treeview-menu">
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/confirmed" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Confirmed Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/posted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Posted Listing</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/deleted" class="auto">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>Deleted Listing</span>
                                    </a>
                                 </li>
                              </ul>
                        </li>
                        
                     </ul> -->
                  </li>
                  <?php endif;?>
               </ul>
            </li>
            <!-- Auto Billing Module Start  -->
            <li class="treeview">
               <a href="#">
               <i class="fa fa-list"></i>
               <i class="fa fa-angle-left pull-right"></i>
               <span class="font-bold">Auto Billing</span>
               </a>
               <ul class="treeview-menu">
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                  <li>
                     <a href="<?php echo base_url();?>autobill/autobill_setting" class="auto">
                     <i class="fa fa-paperclip"></i>
                     <span class="font-bold">Auto Bill Setting</span>
                     </a>
                  </li>
                  <?php endif;?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                     <li>
                        <a href="<?php echo base_url();?>autobill" class="auto">
                        <i class="fa fa-list"></i>
                        <span class="font-bold">New Auto Bill</span>
                        </a>
                     </li>
                  <?php endif;?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                     <li class="treeview">
                        <a href="#">
                        <i class="fa fa-list"></i>
                        <i class="fa fa-angle-left pull-right"></i>
                        <span class="font-bold">Auto Bill listing</span>
                        </a>
                        <ul class="treeview-menu">
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->pending_invoice): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>autobill/autobilllist/confirmed" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Confirmed Auto Bill</span>
                              </a>
                           </li>
                           <?php endif; ?>
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->confirm_invoice): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>autobill/autobilllist/posted" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Posted Auto Bill</span>
                              </a>
                           </li>
                           <?php endif; ?>
                           <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->level=="admin") || $permissions->rejected_invoice): ?>
                           <li>
                              <a href="<?php echo base_url(); ?>autobill/autobilllist/deleted" class="auto">
                              <i class="fa fa-arrow-right"></i>
                              <span>Deleted Auto Bill</span>
                              </a>
                           </li>
                           <?php endif; ?>
                        </ul>
                     </li>
                  <?php endif; ?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                     <li>
                        <a href="<?php echo base_url();?>blockbill" class="auto">
                        <i class="fa fa-list"></i>
                        <span class="font-bold">Block Billing</span>
                        </a>
                     </li>
                   <?php endif;?>
                   <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                  <li>
                     <a href="javascript:void(0);" class="undo_last_blockbill auto">
                     <i class="fa fa-bolt"></i>
                     <span class="font-bold">Undo Last Block Billing</span>
                     </a>
                  </li>
                  <?php endif;?>
                  <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
                  <li>
                     <a href="javascript:void(0);" class="zap_billing auto">
                     <i class="fa fa-bolt"></i>
                     <span class="font-bold">Zap Billing</span>
                     </a>
                  </li>
                  <?php endif;?>
                  
                 
                  
               </ul>
            </li>
            <!-- Auto Billing Module End -->
            <?php endif; ?>
            <!-- Backend module end -->
            
            
               
            </ul>
            </li>
            <?php endif; ?>
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
   // console.log(link);
   if(!link[4] && link[0]!="#"){
    // $(this).hide();
   }

   
   $('.undo_last_blockbill').on("click",function(){
      $.confirm({
          title:"<i class='fa fa-info'></i>" + "Undo Last Blockbilling Confirm?",
          text: "Confirm Undo!",
          cancelButton: "No",
          confirm: function(button) {
               window.location = "<?php echo base_url(); ?>blockbill/undo_last_blockbill";   
          },
          cancel: function(button) {
          }
      });
   });

   $('.zap_billing').on("click",function(){
     ConfirmDialog('Zap Billing Confirm','billing');
   });

   $('.zap_purchases').on("click",function(){
     ConfirmDialog('Zap Purchases Confirm','purchases');
   });

   $('.zap_ap').on("click",function(){
     ConfirmDialog('Zap Accounts Payable Confirm','ap');
   });

   $('.zap_hc').on("click", function(){
      ConfirmDialog('Zap Historical Costing Confirm','zap_hc');
   });

   $('.zap_payment').on("click", function(){
      ConfirmDialog('Zap Payment Confrim','zap_payment');
   });

   $('.zap_opayment').on("click", function(){
      ConfirmDialog('Zap OTHER Payment Confrim','zap_opayment');
   });
   

   $('.zap_bank').on("click", function(){
      ConfirmDialog('Zap Bank Confrim','zap_bank');
   });

   $('.zap_stock').on("click", function(){
      ConfirmDialog('Zap Stock Confirm','stock');
   });
   ////////////////////////
   $('.zap_invoice').on("click",function(){
     ConfirmDialog('Zap Invoice Confirm','invoice');
   });

   $('.zap_quotation').on("click",function(){
     ConfirmDialog('Zap Quotation Confirm','quotation');
   });

   $('.zap_receipt').on("click", function(){
      ConfirmDialog('Zap Receipt Confirm','receipt');
   });

   $('.zap_ar').on("click", function(){
      ConfirmDialog('Zap AR Confrim','ar');
   });

   
   

   function ConfirmDialog(message,mode){
      $.confirm({
          title:"<i class='fa fa-info'></i>" + message,
          text: "PLEASE BACKUP BEFORE YOU ZAP. PROCEED!",
          cancelButton: "No",
          confirm: function(button) {

            if (mode == 'invoice') {
               window.location = "<?php echo base_url(); ?>invoice/zap_Invoice_data";   
            }
            else if(mode == 'quotation')
            {
               window.location = "<?php echo base_url(); ?>quotation/zap_Quotation_data";
            }
            else if(mode == 'receipt')
            {
               window.location = "<?php echo base_url(); ?>receipt/zap_receipt_data";  
            }
            else if(mode == 'ar'){
               window.location = "<?php echo base_url(); ?>account/zap_ar_data";    
            }
            else if(mode == 'stock'){
               window.location = "<?php echo base_url(); ?>stock/zap_stock";      
            }
            else if (mode == 'purchases') {
               window.location = "<?php echo base_url(); ?>backend/zap_purchases";   
            }
            else if (mode == 'billing') {
               window.location = "<?php echo base_url(); ?>autobill/zap_billing";   
            }
            else if(mode == 'ap')
            {
               window.location = "<?php echo base_url(); ?>backend/zap_AP";
            }
            else if(mode == 'zap_hc')
            {
               window.location = "<?php echo base_url(); ?>backend/zap_HistCost";  
            }
            else if(mode == 'zap_payment'){
               window.location = "<?php echo base_url(); ?>backend/zap_payment";    
            }
            else if(mode == 'zap_opayment'){
               window.location = "<?php echo base_url(); ?>backend/zap_opayment";    
            }
            else if(mode == 'zap_bank'){
               window.location = "<?php echo base_url(); ?>backend/zap_bank";    
            }
            
          },
          cancel: function(button) {
          }
      });
   };
});
</script>