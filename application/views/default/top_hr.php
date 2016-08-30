<header id="header" class="header white navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".responsive-navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php if(isset($info['logo'])) echo base_url().$info['logo']; ?>" alt="" class="img-responsive"></a>
		</div>

		<div class="collapse navbar-collapse responsive-navbar">
			<ul class="nav navbar-nav navbar-right">				
				<li><a href="<?php echo base_url();?>hiring/profile"><i class="fa fa-info"></i> &nbsp;Thông tin công ty</a></li>
				<li><a href="<?php echo base_url();?>hiring/postlist"><i class="fa fa-list-ul"></i> &nbsp;Danh sách tin tuyển dụng</a></li>
				<li><a href="<?php echo base_url();?>hiring/postjob"><i class="fa fa-edit"></i> &nbsp;Đăng tin tuyển dụng</a></li>											
				<!-- <li><a href="<?php //echo base_url();?>users/message"><i class="fa fa-envelope"></i> Tin nhắn</a></li> -->
				<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> &nbsp;Quản lý thông tin<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class=""href="<?php echo base_url();?>hiring/profile"><i class="fa fa-user"></i> &nbsp;&nbsp;Xem / Chỉnh sửa thông tin</a>
                            </li> <!-- ./View / Edit My Profile -->
                            <li>
                                <a class=""href="<?php echo base_url();?>students/changepsw"><i class="fa fa-user"></i> &nbsp;&nbsp;Đổi mật khẩu</a>
                            </li> 
                            <li>
                                <a class="signout" href="<?php echo base_url();?>students/logout"><i class="fa fa-sign-out"></i> &nbsp;&nbsp;Đăng xuất</a>
                            </li> <!-- ./Sign Out -->
                        </ul> <!-- ./dropdown-menu -->
                    </li> <!-- ./dropdown -->
			</ul>
		</div>
	</div>
</header>