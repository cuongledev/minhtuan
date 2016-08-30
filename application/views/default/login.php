<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php if(isset($title)) echo $title; ?></title>
    <meta name="description" content="<?php if(isset($description)) echo $description; ?>">
    <meta name="keywords" content="<?php if(isset($keywords)) echo $keywords; ?>">
    <meta name="author" content="Lê Ngọc Cường">
    <link rel="shortcut icon" type="image/ico" href="<?php if(isset($info['icon'])) echo $info['icon']; ?>" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url() ?>public/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>public/backend/font-awesome/css/font-awesome.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/owl.transitions.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/style.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var baseUrl="<?php echo base_url();?>";
        //var username = "<?php echo $this->session->userdata('username'); ?>";
    </script>
</head>

<body>
<header id="header" class="header signup-header col-xs-12">
        <div class="container">
            <img src="<?php echo base_url() ?>public/<?php echo $module;?>/images/logo-grey-1x.png" alt="" class="img-responsive">
        </div>
    </header>

<main id="main" class="main col-xs-12">
    <div class="main-form">
        <div class="main-form-intro">
            <p>Kết nối với nhà tuyển dụng mong muốn điền vào thực tập và việc làm cấp nhập với sinh viên đại học và sinh viên tốt nghiệp gần đây như bạn.</p>
        </div>
        <p class="main-form-intro-text">Chỉ có thành viên có thể xem các nội dung mà bạn đã yêu cầu</p>
        <?php $this->load->view("students/notify_view"); ?>
        <?php 
            if (isset($error) && !empty($error)) {
                    echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Cảnh báo!</strong>  ".$error."
              </div>";
                }
        ?>
        <form action="<?php if(isset($action)) echo $action;?>" method="POST" role="form" class="text-center">

            <div class="form-group" >
                <input type="email" class="form-control" name="email" id="" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" id="" placeholder="Mật khẩu" required>
            </div>

            <div style" text-align:center">
                <button id="signin_button" name="login" class="btn btn-lg btn-primary" type="submit">Đăng nhập</button>
            </div>

            <div class='form-group'>
                <p style="margin-top: 10px;" class="form-btn-text">Bằng cách nhấn vào Đăng ký, bạn đồng ý với  <a href="#">chính sách bảo mật</a> và 
                <a href="#">Điều khoản Dịch vụ của chúng tôi</a></p>
            </div>

        </form>
    </div>
</main>

<footer id="footer" class="footer col-xs-12">
    <div class="container">
        <div class="footer-content col-xs-12 text-center">
            <a href="<?php echo base_url();?>students/forgot">Quên mật khẩu?</a><br>
            Bạn không phải thành viên? <a href="<?php echo base_url();?>students/register">Đăng ký tài khoản miễn phí!</a>
        </div>
    </div>
</footer>
<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url() ?>public/backend/js/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url() ?>public/backend/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>public/backend/js/tagsinput/bootstrap-tagsinput.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>public/backend/js/app.min.js" type="text/javascript"></script>
<!-- Validation -->
<script src="<?php echo base_url() ?>public/backend/js/validate/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/script.js"></script>
</body>
</html>
