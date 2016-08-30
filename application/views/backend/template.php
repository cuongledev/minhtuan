<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php if(isset($title)) echo $title; ?></title>
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
    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/css/toastr.min.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/js/tagsinput/bootstrap-tagsinput.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="<?php echo base_url() ?>public/default/css/datepicker.css">

    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>public/<?php echo $module;?>/css/style2.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var baseUrl="<?php echo base_url();?>";
    </script>
    <!-- Ckeditor -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/ckfinder/ckfinder.js" type="text/javascript"></script>
    

</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper">
            	<?php
                $this->load->view("$module/top");
                ?>
            	<?php
                $this->load->view("$module/left");
                ?>

                <!-- Content Wrapper. Contains page content -->
                  <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header" style="margin-bottom: 20px;">
                      <ol class="breadcrumb" style="right: inherit;fload:left;padding-left:0px;">
                        <li><a href="<?php echo base_url()."$module/index/index" ?>"><i class="fa fa-dashboard"></i> Trang quản trị</a></li>
                        <?php if(!empty($page_breadcrumb)) {
                            foreach ($page_breadcrumb as $k => $v) {?>

                            <li <?php if($v['href']==''){echo 'class="active"';}?>><?php if($v['href']!='') echo '<a href="'.$v['href'].'">'; ?><?php echo $v['name'];?><?php if($v['href']!='') echo '</a>'; ?></li> 

                        <?php }}?>
                      </ol>
                    </section>
                    <div class="clearfix"></div>
                    <!-- Main content -->
                    <section class="content">
                      <!-- Info boxes -->
                      <div class="row">
                        <?php
                            $this->load->view("$loadPage");
                        ?>
                      </div>

                    </section><!-- /.content -->
                  </div><!-- /.content-wrapper -->
                
                <?php
                $this->load->view("$module/bottom");
                ?>

    </div>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/tagsinput/bootstrap-tagsinput.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/app.min.js" type="text/javascript"></script>
    <!-- Validation -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/validate/jquery.validate.js"></script>    
    
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/toastr.min.js" type="text/javascript"></script>
    <!-- Datetime picker -->
    <script type="text/javascript" src="<?php echo base_url() ?>public/default/js/bootstrap-datepicker.js"></script>
    <!-- Cuong App -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/custom_cuong.js" type="text/javascript"></script>

    <!-- Custom JS file of Doan Viet Quan -->
    <script src="<?php echo base_url() ?>public/<?php echo $module;?>/js/custom_quan.js" type="text/javascript"></script>

  </body>
</html>
