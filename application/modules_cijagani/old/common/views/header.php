
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CRM | <?php echo ucwords(str_replace('_', ' ',$this->uri->segment(2))); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $css; ?>

    <script type="text/javascript" src="<?php echo JS_PATH.'jQuery-2.1.4.min.js'; ?>"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap2-toggle.min.css" rel="stylesheet">
  </head>
  <body class="skin-green sidebar-mini">
    <!-- Site wrapper -->
    <div class="pace  pace-active"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('admin');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><?php echo "CRM"; ?></b></span>
          <!-- logo for regular state and mobile devices -->
          <!-- <span class="logo-lg"><b> --><?php echo "CRM"; ?><!-- </b></span> -->
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo IMG_PATH.'avatar5.png';?>" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php echo $this->session->username; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo IMG_PATH.'avatar5.png';?>" class="img-circle" alt="User Image" />
                    <!-- <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p> -->
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <!-- <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div> -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('common/signout/'.strtolower($this->session->level)); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>
      <?php require_once('sidebar.php'); ?>
      
      <div class="content-wrapper">