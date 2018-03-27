<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>CRM | <?php echo ucwords(str_replace('_', ' ',$this->uri->segment(2))); ?></title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <?php echo $css; ?>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  <script src="<?php echo JS_PATH; ?>jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="js/intro/introjs.css" type="text/css" /> -->
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="<?php echo base_url('admin/dashboard') ?>" class="navbar-brand">
          <img src="<?php echo IMG_PATH; ?>logo.png" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">CRM</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php echo IMG_PATH; ?>a0.png" alt="...">
            </span>
            <?php echo $this->session->email; ?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
            <li>
              <a href="#" >Dashboard</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php echo base_url('common/signout'); ?>" >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
       	<?php include("sidebar.php") ?>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">