<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url() ?>public/<?php echo $module;?>/images/avatar5.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php if ($this->session->userdata('username')) {
                            echo $this->session->userdata('username');
                          } 
                        ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Danh Mục</li>
            <li class="active treeview">
              <a href="<?php echo base_url()."$module/";?>index/index">
                <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
              </a>
            </li>
            <!-- <li>
              <a href="">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li> -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Thông tin cơ bản</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url()."$module/";?>info/index"><i class="fa fa-cog"></i> Cài đặt</a></li>
                <li><a href="<?php echo base_url()."$module/";?>slider/index"><i class="fa fa-cog"></i> Quản lý Slider</a></li>
                <!-- <li><a href="<?php echo base_url()."$module/";?>comments/index"><i class="fa fa-cog"></i> Quản lý bình luận Học viên</a></li>
                <li><a href="<?php echo base_url()."$module/";?>partner/index"><i class="fa fa-cog"></i> Quản lý bình luận Đối tác</a></li> -->
                <!-- <li><a href="<?php echo base_url()."$module/";?>infohomepage/index"><i class="fa fa-cog"></i> Cài đặt nội dung trang chủ</a></li> -->
                <!--<li><a href="<?php echo base_url()."$module/";?>imageshomepage/index"><i class="fa fa-cog"></i> Cài đặt ảnh trang chủ</a></li>-->
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Quản lý Menu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url()."$module/";?>menu/index"><i class="fa fa-cog"></i> Cài đặt menu</a></li>
                <li><a href="<?php echo base_url()."$module/";?>menuleft/index"><i class="fa fa-cog"></i> Cài đặt menu sidebar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-word-o"></i> <span>Tin tức</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url()."$module/";?>news/addnews"><i class="fa fa-cog"></i> Đăng tin tức</a></li>
                <li><a href="<?php echo base_url()."$module/";?>news"><i class="fa fa-list"></i> Quản lý tin tức</a></li>
                <li><a href="<?php echo base_url()."$module/";?>category_news/add"><i class="fa fa-cog"></i> Đăng danh mục tin tức</a></li>
                <li><a href="<?php echo base_url()."$module/";?>category_news"><i class="fa fa-list"></i> Quản lý danh mục tin tức</a></li>
              </ul>
            </li>
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-file-word-o"></i> <span>Widget</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url()."$module/";?>category_widget/add"><i class="fa fa-cog"></i> Đăng Widget</a></li>
                <li><a href="<?php echo base_url()."$module/";?>category_widget"><i class="fa fa-list"></i> Quản lý Widget</a></li>
              </ul>
            </li> -->
            <li class="treeview">
              <a href="<?php echo base_url()."$module/";?>user/index">
                <i class="fa fa-users"></i> <span>Tài khoản quản trị</span>
              </a>
            </li>
            
            <!-- <li class="treeview">
              <a href="<?php echo base_url()."$module/";?>company/index" >
                <i class="fa fa-folder-open-o"></i> <span>Quản lý Hồ sơ công ty</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()."$module/";?>schools/index" >
                <i class="fa fa-university"></i> <span>Quản lý trường học</span>
              </a>
            </li> -->
            <li class="treeview">
              <a href="<?php echo base_url()."$module/";?>contact/index" >
                <i class="fa fa-envelope-o"></i> <span>Quản lý liên hệ</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()."$module/";?>category/index">
                <i class="fa fa-bars"></i> <span>Quản lý danh mục sản phẩm</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()."$module/";?>product/index">
                <i class="fa fa-bars"></i> <span>Quản lý Sản phẩm</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()."$module/";?>order/index">
                <i class="fa fa-shopping-cart"></i> <span>Quản lý đơn hàng</span>
              </a>
            </li>


            </li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>