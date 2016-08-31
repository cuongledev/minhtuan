<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php if(isset($title)) echo $title; ?></title>
    <meta name="description" content="<?php if(isset($description)) echo $description; ?>">
    <meta name="keywords" content="<?php if(isset($keywords)) echo $keywords; ?>">
    <meta property="og:type"          content="<?php if(isset($info['name'])) echo $info['name']; ?>" />
    <meta property="og:title"         content="<?php if(isset($title)) echo $title; ?>" />
    <meta property="og:description"   content="<?php if(isset($description)) echo $description; ?>" />
    <meta property="og:image"         content="<?php echo (isset($detail_product['thumbnail'])) ? base_url().$detail_product['thumbnail'] : base_url().$info['logo']; ?>" />

    <meta name="author" content="<?php if(isset($info['name'])) echo $info['name']; ?>">
    <link rel="shortcut icon" type="image/ico" href="<?php if(isset($info['icon'])) echo base_url().$info['icon']; ?>" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/pe-icon-7-stroke.css">
    <link href="<?php echo base_url() ?>public/backend/css/toastr.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/easyzoom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/style.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/<?php echo $module;?>/css/custom.css">

    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>public/backend/css/cuong_style_frontend.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>public/backend/js/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var baseUrl="<?php echo base_url();?>";
    </script>
    
    
</head>

<body>
                <?php 
                    
                        $this->load->view("$module/top");    
                ?>

                <!-- Content Wrapper. Contains page content -->
                        <?php
                            $this->load->view("$loadPage");
                        ?>
                <!-- /.content-wrapper -->
                
                <?php
                $this->load->view("$module/bottom");
                ?>

    
    <!-- Bootstrap 3.3.2 JS -->




    <script src="<?php echo base_url() ?>public/backend/js/bootstrap.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/owl.carousel2.thumbs.min.js"></script>
    <script src="<?php echo base_url() ?>public/backend/js/toastr.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/easyzoom.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/<?php echo $module;?>/js/lnc_custom.js"></script>
    <script>
        var $easyzoom = $('.easyzoom').easyZoom();
        var api = $easyzoom.data('easyZoom');
    </script>





  </body>
</html>
