

<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <!-- Apple devices fullscreen -->
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <!-- Apple devices fullscreen -->
      <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
      <title>Login</title>
      <!-- Bootstrap -->
      <link href="<?php echo CSS_PATH.'bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo CSS_PATH.'font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css" />
      <!-- Bootstrap responsive -->
      <link rel="stylesheet" href="<?php echo CSS_PATH.'bootstrap-responsive.min.css';?>">
      <!-- Theme CSS -->
      <link rel="stylesheet" href="<?php echo CSS_PATH.'style.css';?>">
      <!-- Color CSS -->
      <link rel="stylesheet" href="<?php echo CSS_PATH.'themes.css';?>">
      <link rel="stylesheet" href="<?php echo CSS_PATH.'datepicker\css\datepicker.css';?>">
      <!-- jQuery -->
      <script type="text/javascript" src="<?php echo JS_PATH.'jQuery-2.1.4.min.js'; ?>"></script>
      <link rel="stylesheet" href="<?php echo CSS_PATH.'toastr.min.css';?>">

      <!--[if lte IE 9]>
      <script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
      <script>
         $(document).ready(function() {
           $('input, textarea').placeholder();
         });
      </script>
      <![endif]-->
      <!-- Favicon -->
      <link rel="shortcut icon" href="img/favicon.ico" />
      <!-- Apple devices Homescreen icon -->
      <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
     
   </head>
   <body class='login' style="background: #ddd;">
      <div class="wrapper">
         <!-- <h1 class=""><a href="">Login </a></h1> -->
         <div class="login-body">

            <div id="heading">
               <center>
                  <h2>Reset Password Here</h2>
               </center>
            </div>
            <hr>
            <?php echo $this->session->flashdata('message'); ?>
            <?php $attributes =array('class' =>"reset_password_form",'id'=>"" ); ?>
            <?php echo form_open('auth/reset_password/' . $code,$attributes);?>
               <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
                  <?php echo form_input($new_password); ?>
                </div>
              </div>
			       <div class="form-group" id="password_div">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <?php echo form_input($new_password_confirm); ?>
                </div>
              </div>
              <?php echo form_input($user_id); ?>
              <?php echo form_hidden($csrf); ?>
               <div class="submit">
                  <input type="submit" id="" class="btn btn-primary" value="Change" />
                  <!-- <input value="Sign me in" id="login_btn" class="btn btn-primary" type="submit"> -->
               </div>
            
            <?php echo form_close(); ?>
            <div class="forget">
               <div class="row-fluid">
                  <div class="span12">
                     <a href="<?php echo base_url(''); ?>" class="btn btn-grey"><span>Go to Login</span></a>
                  </div>
               </div>
            </div>
         </div>
         <br><br><br>
      <center>Proudly Managed By TRUELINE INFOTECH<br>
      &copy; <?php echo date("Y"); ?><center>
         <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->
      <!-- Bootstrap 3.3.2 JS -->
      </div>
      </div>
      <!-- Validation -->
      <script type="text/javascript" src="<?php echo JS_PATH.'bootstrap.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php echo JS_PATH.'jquery.form.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php echo JS_PATH.'jquery.validate.min.js'; ?>"></script>
      <script type="text/javascript" src="<?php echo JS_PATH.'bootstrap-datepicker.js'; ?>"></script>
      <script type="text/javascript" src="<?php echo JS_PATH.'toastr.min.js'; ?>"></script>

      <script type="text/javascript" src="<?php echo JS_PATH.'custom.js'; ?>"></script>
      <!-- <script src="<?php //echo base_url('assets/js/plugins/validation/additional-methods.min.js');?>"></script> -->
      <!-- Bootstrap -->
      <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.backstretch.js');?>"></script>
      <script type="text/javascript">
         $(document).ready(function() {
          var message="<?php echo $this->session->flashdata('message'); ?>";
          if (message!="") {
            toastr["info"](message,"Message");
          }
        });
      </script>
   </body>
</html>

