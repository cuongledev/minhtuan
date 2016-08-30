<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/font-awesome/css/font-awesome.min.css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/css/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/css/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="@">ĐĂNG NHẬP QUẢN TRỊ</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
        	<?php
				if( $error != ""){
				    echo "<div class='alert alert-danger' style='background-color:#EF6251 !important'>
						    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						    <strong>Cảnh báo!</strong> $error
						  </div>";
				}
				?>
        </p>
        <form action="<?php echo base_url()."backend/verify/login"; ?>" id="form-login" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="txtemail" placeholder="Email" />
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="txtpass" placeholder="Mật khẩu" />
            
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="ok" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/validate/jquery.validate.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/app.min.js" type="text/javascript"></script>
    <script>
      $(document).ready(function(){
            // FORM VALIDATE LOGIN
	        var validator = $("#form-login").validate({
	          rules: {
	            txtemail: {
	              required: true,
	              email: true,
	            },
	            txtpass: {
	              required: true,
	            },
	          },
	          messages: {
	            txtemail:{
	              required: "Vui lòng nhập email!",
	              email: "Vui lòng nhập đúng định dạng email!",
	            },
	            txtpass: {
	              required: "Vui lòng nhập mật khẩu!",
	            },
	          }
	        });
      });
    </script>
  </body>
</html>