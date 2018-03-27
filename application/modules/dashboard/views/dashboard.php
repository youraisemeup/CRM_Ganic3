<style type="text/css">
  #system_managers_menu,#applications_menu,#backends_menu,#system_utilities_menu,#master_files_menu,#staff_managment_menu,#combo_tables_menu,#quotations_menu,#invoices_menu,#receipts_menu,#account_receivable_menu, #account_receivable_menu2, #stock_menu, #managements_menu,#autobills_menu{
    display: none;
  }
</style>
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
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-green" id="system_managers">
            <div class="inner">
              <h1>System Manager</h1>
              <p>&nbsp;</p>
              <br>
              <br>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="<?php echo current_url();?>?id=system_managers_sec" id="system_managers_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-light-blue" id="applications">
            <div class="inner">
              <h1>Applications</h1>
              <p>&nbsp;</p>
              <br>
              <br>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo current_url();?>?id=applications_sec" class="small-box-footer" id="applications_sec">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple" id="backends">
            <div class="inner">
              <h1>Backend</h1>
              <p>&nbsp;</p>
              <br>
              <br>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo current_url();?>?id=backends_sec" class="small-box-footer" id="backends_sec">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif; ?>
  </div>



  <div class="row" id="system_managers_menu">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua" id="system_utilities">
            <div class="inner">
              <h1>System Utilities</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a href="<?php echo current_url();?>?id=system_managers_sec&id1=system_utilities_sec" id="system_utilities_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow" id="master_files">
            <div class="inner">
              <h1>Master Files</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo current_url();?>?id=system_managers_sec&id1=master_files_sec" id="master_files_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple" id="combo_tables">
            <div class="inner">
              <h1>Combo Tables</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="<?php echo current_url();?>?id=system_managers_sec&id1=combo_tables_sec" id="combo_tables_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 ) || $this->session->conf_id == 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon" id="staff_managment">
            <div class="inner">
              <h1>Staff Managment</h1>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo current_url();?>?id=system_managers_sec&id1=staff_managment_sec" id="staff_managment_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif; ?>
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
    <div class="col-md-3 col-sm-12 col-xs-12">
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
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id== 4 || $this->session->conf_id== 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Supplier Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>master_files/supplier_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <?php endif; ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
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
    <div class="col-md-3 col-sm-12 col-xs-12">
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
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Account Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>combo_tables/chart_of_account" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Payee Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>combo_tables/payee_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="<?php echo base_url(); ?>combo_tables/forex_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <!-- <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>M-Create</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>combo_tables/m_create" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div> -->
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>GST Master</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
            </div>
            <a href="<?php echo base_url(); ?>combo_tables/gst_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="<?php echo base_url(); ?>combo_tables/country_master" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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

  <div class="row" id="applications_menu">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua" id="quotations">
            <div class="inner">
              <h1>Quotation </h1>
              <br/> <br/>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a  href="<?php echo current_url();?>?id=applications_sec&id1=quotations_sec" id="quotations_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow" id="invoices">
            <div class="inner">
              <h1>Invoice </h1>
              <br/> <br/>
             </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo current_url();?>?id=applications_sec&id1=invoices_sec" id="invoices_sec"
             class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 2 || $this->session->conf_id == 3 || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple" id="receipts">
            <div class="inner">
              <h1>Receipt</h1>
             <br/> <br/>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a  href="<?php echo current_url();?>?id=applications_sec&id1=receipts_sec" id="receipts_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif; ?>
    <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->conf_id == 2 || $this->session->conf_id == 3 || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon" id="account_receivable">
            <div class="inner">
              <h1>Accounts <br/>Receivable </h1>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo current_url();?>?id=applications_sec&id1=account_receivable_sec" id="account_receivable_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif; ?>
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 3 || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon" id="stock">
            <div class="inner">
              <h1>Stocks </h1>
              <p>&nbsp</p>
              <p style="height:2px;">&nbsp</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo current_url();?>?id=applications_sec&id1=stock_sec" id="stock_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
  <?php endif;?>
  </div>

  <div class="row" id="backends_menu">
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua" id="managements">
            <div class="inner">
              <h1>Management Module</h1>
              <br/> <br/>
            </div>
            <div class="icon">
              <i class="fa fa-wrench"></i>
            </div>
            <a  href="<?php echo current_url();?>?id=backends_sec&id1=managements_sec" id="managements_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif;?>
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 4 || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple" id="autobills">
            <div class="inner">
              <h1>Autobill Module</h1>
              <br/> <br/>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a  href="<?php echo current_url();?>?id=backends_sec&id1=autobills_sec" id="autobills_sec" class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif;?>
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1) || $this->session->conf_id == 5 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow" id="accountants">
            <div class="inner">
              <h1>Accountant Module </h1>
              <br/> <br/>
             </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo current_url();?>?id=backends_sec&id1=accountants_sec" id="accountants_sec"
             class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif;?>
    <?php if($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->conf_id== 6): ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon" id="specials">
            <div class="inner">
              <h1>Special Module </h1>
              <br/> <br/>
             </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo current_url();?>?id=backends_sec&id1=specials_sec" id="specials_sec"
             class="small-box-footer">
              Click Here <i class="fa fa-arrow-circle-down"></i>
            </a>
          </div>
    </div>
    <?php endif;?>
  </div>

  <div class="row" id="autobills_menu">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Auto Bill Setting</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url();?>autobill/autobill_setting" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>New Auto Bill</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url();?>autobill" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Auto Bill listing</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="autobill_listing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <div class="autobill_listing_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>autobill/autobilllist/confirmed" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Confirmed Auto Bill</span>
                 </a>
              </div>
              <div class="autobill_listing_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>autobill/autobilllist/posted" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Posted Auto Bill</span>
                 </a>
              </div>
              <div class="autobill_listing_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>autobill/autobilllist/deleted" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Deleted Auto Bill</span>
                 </a>
              </div>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Block Billing</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url();?>blockbill" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Undo Last Block Billing</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" class="small-box-footer undo_last_blockbill auto">Click Here <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Zap Billing</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" class="small-box-footer zap_billing auto">Click Here <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <div class="row" id="managements_menu">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Purchases</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="purchases_listing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <div class="purchases_listing_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>New Purchases</span>
                 </a>
              </div>
              <div class="purchases_listing_menu listing_menu" style="display: none">
                <a href="JavaScript:void(0);" id="Pur_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Purchases Listing</span>
                    <div class="Pur_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/purchaseslist/confirmed" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Confirmed Listing</span>
                       </a>
                    </div>
                    <div class="Pur_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/purchaseslist/posted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Posted Listing</span>
                       </a>
                    </div>
                    <div class="Pur_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/purchaseslist/deleted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Deleted Listing</span>
                       </a>
                    </div>
                    
                </a>
              </div>
              <div class="purchases_listing_menu listing_menu" style="display: none">
                <a href="javascript:void(0);" class="zap_purchases auto">
                  <!-- <a href="<?php echo base_url(); ?>backend/zap_purchases" class="auto"> -->
                 <i class="fa fa-arrow-right"></i>
                 <span>ZAP Purchases</span>
                </a>
              </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Accounts Payable</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="AP_listing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <div class="AP_listing_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend/aplisting" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Accounts Payable</span>
                 </a>
              </div>
              <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="<?php echo base_url(); ?>backend/ap_openbal" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>AP Opening Bal BF</span>
                </a>
              </div>
              <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="JavaScript:void(0);" id="APOpen_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>AP Opening Bal Listing</span>
                    <div class="APOpen_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/ap_openlist/confirmed" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Confirmed Listing</span>
                       </a>
                    </div>
                    <div class="APOpen_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/ap_openlist/posted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Posted Listing</span>
                       </a>
                    </div>
                    <div class="APOpen_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/ap_openlist/deleted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Deleted Listing</span>
                       </a>
                    </div>
                    
                </a>
              </div>
              <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="<?php echo base_url(); ?>backend/credit_statement" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Creditor Statements</span>
                </a>
              </div>
              <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="JavaScript:void(0);" id="APOffset" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Offset Records</span>
                    <div class="APOffset_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/offset" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Offset Record</span>
                       </a>
                    </div>
                    <div class="APOffset_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/offset_all" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>OFFSET ALL</span>
                       </a>
                    </div>
                </a>
              </div>
              <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="<?php echo base_url(); ?>backend/credit_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Creditors Listing</span>
                </a>
              </div>
              <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="<?php echo base_url(); ?>backend/credit_ageing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Creditors Ageing</span>
                </a>
              </div>
              <!-- <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="<?php echo base_url(); ?>backend/bank_statement" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Bank Tranactions</span>
                </a>
              </div> -->
              <div class="AP_listing_menu listing_menu" style="display: none">
                <a href="javascript:void(0);" class="zap_ap auto">
                  <!-- <a href="<?php echo base_url(); ?>backend/zap_AP" class="auto"> -->
                 <i class="fa fa-arrow-right"></i>
                 <span>ZAP AP</span>
                </a>
              </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Stock Reports</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="stock_report" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <div class="stock_report_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend/histcostlisting" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Historical Costing List</span>
                 </a>
              </div>
              <div class="stock_report_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend/stock_report_base_wac" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Stock Report Based on W.A.C</span>
                 </a>
              </div>
              <div class="stock_report_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend/stock_report_base_fifo" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Stock Report Based on FIFO</span>
                 </a>
              </div>
               <div class="stock_report_menu listing_menu" style="display: none">
                 <a href="javascript:void(0);" class="zap_hc auto">
                  <!-- <a href="<?php echo base_url(); ?>backend/zap_HistCost" class="auto"> -->
                 <i class="fa fa-arrow-right"></i>
                 <span>ZAP Historical Costing</span>
                 </a>
              </div>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Payment Module</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="payment_to_supplier" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend/payment_setting" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Payment Voucher Setting</span>
                 </a>
              </div>
              <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend/new_payment" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Payment to Supplier</span>
                 </a>
              </div>
              <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>backend/other_payment" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>OTHER Payment</span>
                 </a>
              </div>
              <!-- <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>combo_tables/chart_of_account" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Chart Of Account</span>
                 </a>
              </div> -->
              <!-- <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="javascript:void(0);" id="new_payement" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>New Payment</span>
                    <div class="new_payement_menu listing_menu" style="display: none">
                      <a href="<?php echo base_url(); ?>backend/new_payment" class="auto">
                        <i class="fa fa-arrow-circle-down"></i>
                        <span>Payment to Supplier</span>
                      </a>
                    </div>
                    <div class="new_payement_menu listing_menu" style="display: none">
                      <a href="<?php echo base_url(); ?>backend/other_payment" class="auto">
                        <i class="fa fa-arrow-circle-down"></i>
                        <span>OTHER Payment</span>
                      </a>
                    </div>
                 </a>
              </div> -->
              <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="JavaScript:void(0);" id="payment_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Payment to Supplier Listings</span>
                    <div class="payment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/paymentlist/confirmed" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Confirmed Listing</span>
                       </a>
                    </div>
                    <div class="payment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/paymentlist/posted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Posted Listing</span>
                       </a>
                    </div>
                    <div class="payment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/paymentlist/deleted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Deleted Listing</span>
                       </a>
                    </div>
                 </a>
              </div>

              <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="JavaScript:void(0);" id="opayment_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>OTHER Payment Listings</span>
                    <div class="opayment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/opaymentlist/confirmed" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Confirmed Listing</span>
                       </a>
                    </div>
                    <div class="opayment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/opaymentlist/posted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Posted Listing</span>
                       </a>
                    </div>
                    <div class="opayment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>backend/opaymentlist/deleted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Deleted Listing</span>
                       </a>
                    </div>
                 </a>
              </div>

              <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="javascript:void(0);" class="zap_payment auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>ZAP Payment to Supplier</span>
                 </a>
              </div>
              <div class="payment_to_supplier_menu listing_menu" style="display: none">
                 <a href="javascript:void(0);" class="zap_opayment auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>ZAP OTHER Payment</span>
                 </a>
              </div>
      </div>
    </div>
    <?php if(($this->ion_auth->is_admin() && $this->session->group_id==1 || $this->session->conf_id == 5 || $this->session->conf_id== 6)): ?>  
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Bank Module cw bal bf</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="bank_module" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                <div class="bank_module_menu listing_menu" style="display: none">
                   <a href="<?php echo base_url(); ?>backend/enter_bank_adjustment" class="auto">
                   <i class="fa fa-arrow-right"></i>
                   <span>Enter Adjustment</span>
                   </a>
                </div>
                <div class="bank_module_menu listing_menu" style="display: none">
                  <a href="JavaScript:void(0);" id="bank_ad_listing" class="auto">
                   <i class="fa fa-arrow-right"></i>
                   <span>Adjustment Listing</span>
                      <div class="bank_ad_listing_menu listing_menu" style="display: none">
                         <a href="<?php echo base_url(); ?>backend/bank_adjustmentlisting/confirmed" class="auto">
                         <i class="fa fa-arrow-circle-down"></i>
                         <span>Confirmed Listing</span>
                         </a>
                      </div>
                      <div class="bank_ad_listing_menu listing_menu" style="display: none">
                         <a href="<?php echo base_url(); ?>backend/bank_adjustmentlisting/posted" class="auto">
                         <i class="fa fa-arrow-circle-down"></i>
                         <span>Posted Listing</span>
                         </a>
                      </div>
                      <div class="bank_ad_listing_menu listing_menu" style="display: none">
                         <a href="<?php echo base_url(); ?>backend/bank_adjustmentlisting/deleted" class="auto">
                         <i class="fa fa-arrow-circle-down"></i>
                         <span>Deleted Listing</span>
                         </a>
                      </div>
                      
                  </a>
                </div>
                <div class="bank_module_menu listing_menu" style="display: none">
                   <a href="<?php echo base_url(); ?>backend/bank_statement" class="auto">
                   <i class="fa fa-arrow-right"></i>
                   <span>Bank Statement</span>
                   </a>
                </div>
                <div class="bank_module_menu listing_menu" style="display: none">
                  <a href="javascript:void(0);" class="zap_bank auto">
                   <i class="fa fa-arrow-right"></i>
                   <span>ZAP Bank</span>
                  </a>
                </div>
      </div>
    </div>
    <?php endif;?>
  </div>
  <div class="row" id="quotations_menu">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Quotation <br> setting</h3>
<!--              <p>&nbsp;</p> -->
              </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>quotation/quotation_setting" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>New quotation</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>quotation" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Quotation <br/> listing</h3>
              
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="quotation_listing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     <!-- <ul class="treeview-menu new_invoice_menu" style="display: none"> -->
                        <div class="quotation_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>quotation/quotationlist/confirm" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Confirmed Quotation</span>
                           </a>
                        </div>
                        <div class="quotation_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>quotation/quotationlist/rejected" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Rejected Quotation</span>
                           </a>
                        </div>
                        <div class="quotation_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>quotation/quotationlist/successful" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Successful Quotation</span>
                           </a>
                        </div>
                         <div class="quotation_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>quotation/quotationlist/deleted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Deleted Quotation</span>
                           </a>
                        </div>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h3>ZAP quotation</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="javascript:void(0);" class="zap_quotation small-box-footer">Click Here <i class="fa fa-arrow-circle-down"></i></a>
          </div>
    </div>
  </div>
  <div class="row" id="invoices_menu"> 
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Invoice <br> setting</h3>
<!--              <p>&nbsp;</p> -->
              </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>invoice_new/invoice_new_setting" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>New invoice</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <!-- <a href="<?php echo base_url(); ?>invoice" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            <a href="JavaScript:void(0);" id="new_invoice" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     <!-- <ul class="treeview-menu new_invoice_menu" style="display: none"> -->
                        <div class="new_invoice_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url();?>invoice_new" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Itemised Entries</span>
                           </a>
                        </div>
                        <div class="new_invoice_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>invoice_new/extract_from_quotatin" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Extract Quotation</span>
                           </a>
                        </div>
                     <!-- </ul> -->
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Invoice <br/> listing</h3>
              
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="quotation_listing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     <!-- <ul class="treeview-menu new_invoice_menu" style="display: none"> -->
                        <div class="quotation_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>invoice_new/invoicelist/confirmed" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Confirmed Invoice</span>
                           </a>
                        </div>
                        <div class="quotation_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>invoice_new/invoicelist/posted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Posted Invoice</span>
                           </a>
                        </div>
                         <div class="quotation_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>invoice_new/invoicelist/deleted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Deleted Invoice</span>
                           </a>
                        </div>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-yellow">
            <div class="inner">
              <h3>ZAP Invoice</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="javascript:void(0);" class="zap_invoice small-box-footer">Click Here <i class="fa fa-arrow-circle-down"></i></a>
          </div>
    </div>
  </div>
  <div class="row" id="receipts_menu">
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Receipt setting</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>receipt/receipt_setting" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>New receipt</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>receipt" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>Receipt listing</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="receipt_listing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     <!-- <ul class="treeview-menu new_invoice_menu" style="display: none"> -->
                        <div class="receipt_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>receipt/receiptlist/confirmed" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Confirmed Receipt</span>
                           </a>
                        </div>
                        <div class="receipt_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>receipt/receiptlist/posted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Posted Receipt</span>
                           </a>
                        </div>
                        <div class="receipt_listing_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>receipt/receiptlist/deleted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Deleted Receipt</span>
                           </a>
                        </div>
          </div>
    </div>
    
     <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="small-box bg-purple">
            <div class="inner">
              <h3>ZAP Receipt</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="javascript:void(0);" class="zap_receipt small-box-footer">Click Here <i class="fa fa-arrow-circle-down"></i></a>
          </div>
    </div>
    
  </div>
  <div class="row" id="account_receivable_menu">
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Opening Balance B/F</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>account/opening_balance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Opening Balance Listing</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
             <a href="JavaScript:void(0);" id="opening_balance_listing_id" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     <!-- <ul class="treeview-menu new_invoice_menu" style="display: none"> -->
                        <div class="opening_balance_listing_id_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>account/openlist/confirmed" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Confirmed Opening Balance </span>
                           </a>
                        </div>
                        <div class="opening_balance_listing_id_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>account/openlist/posted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Posted Opening Balance</span>
                           </a>
                        </div>
                        <div class="opening_balance_listing_id_menu listing_menu" style="display: none">
                           <a href="<?php echo base_url(); ?>account/openlist/deleted" class="auto">
                           <i class="fa fa-arrow-right"></i>
                           <span>Deleted Opening Balance</span>
                           </a>
                        </div>
       </div>
    </div>
    
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Debtor Statement</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url(); ?>account/new_debtor" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
      <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Offset Records</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="JavaScript:void(0);" id="AROffset" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                    <div class="AROffset_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>account/offset" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Offset Record</span>
                       </a>
                    </div>
                    <div class="AROffset_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>account/offset_all" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>OFFSET ALL RECORDS</span>
                       </a>
                    </div>
          </div>
    </div>
    
    </div>
    
    <div class="row" id="account_receivable_menu2">

      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="small-box bg-maroon">
              <div class="inner">
                <h3>Debtors' Listing</h3>
                <p>&nbsp;</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="<?php echo base_url(); ?>account/other_debtor" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
      </div>
      
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="small-box bg-maroon">
              <div class="inner">
                <h3>Debtors' Ageing</h3>
                <p>&nbsp;</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="<?php echo base_url(); ?>account/age_debtor" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
      </div>
      
       <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="small-box bg-maroon">
              <div class="inner">
                <h3>ZAP Accounts <br/> Receivable</h3>
                <!--<p>&nbsp;</p>-->
              </div>
              <div class="icon">
                
              </div>
              <a href="javascript:void(0);" class="zap_ar small-box-footer">Click Here <i class="fa fa-arrow-circle-down"></i></a>
            </div>
      </div>
    </div>
    <div class="row" id="stock_menu">
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>Opening Balance</h3>
            <p>&nbsp;</p>
          </div>
          <div class="icon"></div>
          <a href="javascript:void(0);" class="small-box-footer" id="stock_opening_balance">More info<i class="fa fa-arrow-circle-right"></i></a>
            <div class="stock_opening_balance_menu listing_menu" style="display: none">
               <a href="<?php echo base_url(); ?>stock/opening_balance" class="auto">
               <i class="fa fa-arrow-right"></i>
               <span>Enter Opening Balance</span>
               </a>
            </div>
            
            <div class="stock_opening_balance_menu listing_menu" style="display: none">
                <a href="JavaScript:void(0);" id="stock_opening_balance_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Stock Opening Balance</span>
                    <div class="stock_opening_balance_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_openlist/confirmed" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Confirmed Opening Balance</span>
                       </a>
                    </div>
                    <div class="stock_opening_balance_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_openlist/posted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Posted Opening Balance</span>
                       </a>
                    </div>
                    <div class="stock_opening_balance_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_openlist/deleted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Deleted Opening Balance</span>
                       </a>
                    </div>
                    
                </a>
              </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>Purchases</h3>
            <p>&nbsp;</p>
          </div>
          <div class="icon"></div>
          <a href="javascript:void(0);" class="small-box-footer" id="stock_purchase">More info<i class="fa fa-arrow-circle-right"></i></a>
            <div class="stock_purchase_menu listing_menu" style="display: none">
               <a href="<?php echo base_url(); ?>stock/enter_stock_purchases" class="auto">
               <i class="fa fa-arrow-right"></i>
               <span>Enter Stock Purchases</span>
               </a>
            </div>
            <div class="stock_purchase_menu listing_menu" style="display: none">
                <a href="JavaScript:void(0);" id="stock_purchases_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Stock Purchases Listing</span>
                    <div class="stock_purchases_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/confirm" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Confirmed Purchases</span>
                       </a>
                    </div>
                    <div class="stock_purchases_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/posted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Posted Purchases</span>
                       </a>
                    </div>
                    <div class="stock_purchases_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_purchaselisting/deleted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Deleted Purchases</span>
                       </a>
                    </div>
                    
                </a>
              </div>
        </div>
      </div>
    
      <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Adjustment(+/-)</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon"></div>
            <a href="javascript:void(0);" class="small-box-footer" id="stock_adjustment">More info<i class="fa fa-arrow-circle-right"></i></a>
              <div class="stock_adjustment_menu listing_menu" style="display: none">
                 <a href="<?php echo base_url(); ?>stock/enter_stock_adjustment" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Enter Stock Adjustment</span>
                 </a>
              </div>
              <div class="stock_adjustment_menu listing_menu" style="display: none">
                <a href="JavaScript:void(0);" id="stock_adjustment_listing" class="auto">
                 <i class="fa fa-arrow-right"></i>
                 <span>Stock Adjustment Listing</span>
                    <div class="stock_adjustment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/confirmed" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Confirmed Adjustment</span>
                       </a>
                    </div>
                    <div class="stock_adjustment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/posted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Posted Adjustment</span>
                       </a>
                    </div>
                    <div class="stock_adjustment_listing_menu listing_menu" style="display: none">
                       <a href="<?php echo base_url(); ?>stock/stock_adjustmentlisting/deleted" class="auto">
                       <i class="fa fa-arrow-circle-down"></i>
                       <span>Deleted Adjustment</span>
                       </a>
                    </div>
                </a>
              </div>
          </div>
        </div>
      
      <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>Stock Status</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon"></div>
            <a href="<?php echo base_url(); ?>stock/stock_status" class="small-box-footer">Click Here<i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>

      <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>ZAP Stock</h3>
              <p>&nbsp;</p>
            </div>
            <div class="icon"></div>
            <a href="javascript:void(0);" class="zap_stock small-box-footer">Click Here<i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>

    </div>
    
</section>

<script type="text/javascript">
jQuery(document).ready(function($) {
var i =0;
  <?php 
if(isset($_GET['id']) && ($_GET['id'] == 'backends_sec' || $_GET['id'] == 'applications_sec' || $_GET['id'] == 'system_managers_sec') ){?>
  // alert('');
  var i =1;
  setTimeout(function(){
    $("#<?php echo $_GET['id'] ?>").trigger("click");
    <?php if(isset($_GET['id1'])){?>
      i = 2;
     var id1 = '<?php echo $_GET['id1'];?>';
      setTimeout(function(){
        $('#'+id1).trigger("click");
      },400)
   <?php }?>
  },400)
<?php }  ?>   



  $("#system_managers_menu,#applications_menu,#backends_menu").hide();
  $("#system_utilities_menu,#master_files_menu,#staff_managment_menu,#combo_tables_menu,#quotations_menu,#invoices_menu,#receipts_menu,#account_receivable_menu, #account_receivable_menu2,#stock_menu,#managements_menu,#autobills_menu").hide();

    if(i == 1){
      $("#system_managers,#applications,#backends").click(function() {
        id=$(this).attr('id');
        $("#system_managers,#applications,#backends").hide();
        $("#"+id).show();
        $("#system_managers_menu,#applications_menu,#backends_menu").slideUp();
          $("#"+id+"_menu").slideDown();
        if(<?php echo !isset($_GET['id1'])?1:0?>){
          $("html, body").delay(1000).animate({
            scrollTop: $("#"+id+"_menu").offset().top 
          }, 1000);
        // $("#"+id+"_menu").scrollIntoView(true);  
        }
        
      });

    }
 

      $("#system_utilities,#master_files,#staff_managment,#combo_tables,#quotations,#invoices,#receipts,#account_receivable,#stock,#managements,#autobills").click(function() {
        if(i == 2){
          
          $("#system_utilities_menu,#master_files_menu,#staff_managment_menu,#combo_tables_menu,#quotations_menu,#invoices_menu,#receipts_menu,#account_receivable_menu,#account_receivable_menu2,#stock_menu,#managements_menu,#autobills_menu").slideUp();
          id=$(this).attr('id');
          $("#"+id+"_menu").slideDown();
          $("#"+id+"_menu2").slideDown();
          $("html, body").delay(1000).animate({
              scrollTop: $("#"+id+"_menu").offset().top 
          }, 1000);
          // $("#"+id+"_menu").scrollIntoView(true);

        }
      });
    
function topScroll(){
        $("html, body").delay(1000).animate({
              scrollTop: $("#"+id+"_menu").offset().top 
          }, 1000);
}

   $('#new_invoice,#quotation_listing,#purchases_listing,#payment_to_supplier,#payment_listing,#opayment_listing,#AP_listing,#Pur_listing,#APOpen_listing, #invoice_listing, #other_listing, #receipt_listing,#stock_opening_balance,#stock_opening_balance_listing,#stock_purchase,#stock_purchases_listing,#stock_adjustment,#stock_adjustment_listing,#opening_balance_listing_id,#AROffset,#APOffset,#stock_report,#autobill_listing,#bank_module,#bank_ad_listing').click(function(){
    id=$(this).attr('id');    
    //$('.'+ id +'_menu').show();
    $('.'+ id +'_menu').css('display', 'block');
 })
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


  // window.onbeforeunload = confirmExit;
  //    function confirmExit() {
  //        if (formmodified == 1) {
  //            return "New information not saved. Do you wish to leave the page?";
  //        }
  //    }
$(document).ready(function(){
        // alert(document.URL);
        if(document.URL == 'http://crm52.topjac.com/dashboard'){
      history.pushState(null, null, document.URL);
      window.addEventListener('popstate', function () {
          $.confirm({
                title:"<i class='fa fa-info'></i> Exit Confirmation",
                text: "Are You Sure Exit ?",
                confirm: function(button) {
                  
                    window.location.replace("<?php echo base_url(); ?>common/signout/topform managment");
                },
                cancel: function(button) {
                    history.pushState(null, null, document.URL);
                }
            });
        
    });  
        }
});

</script>

<script type="text/javascript">
 
   $('.zap_purchases').on("click",function(){
     ConfirmDialog('Zap Purchases Confirm','purchases');
   });

   $('.zap_ap').on("click",function(){
     ConfirmDialog('Zap Accounts Payable Confirm','ap');
   });

   $('.zap_hc').on("click", function(){
      ConfirmDialog('Zap Historical Costing Confirm','zap_hc');
   });
   
   $('.undo_last_blockbill').on("click", function(){
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

   $('.zap_payment').on("click", function(){
      ConfirmDialog('Zap Payment to Supplier Confrim','zap_payment');
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
/////////////////////////////////
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

            if (mode == 'purchases') {
               window.location = "<?php echo base_url(); ?>backend/zap_purchases";   
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
            else if (mode == 'billing') {
               window.location = "<?php echo base_url(); ?>autobill/zap_billing";   
            }
            else if(mode == 'zap_opayment'){
               window.location = "<?php echo base_url(); ?>backend/zap_opayment";    
            }
            else if(mode == 'zap_bank'){
               window.location = "<?php echo base_url(); ?>backend/zap_bank";    
            }
            else if(mode == 'stock'){
               window.location = "<?php echo base_url(); ?>stock/zap_stock";      
            }
            else if (mode == 'invoice') {
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
            
          },
          cancel: function(button) {

            

          }
      });
   };

</script>


