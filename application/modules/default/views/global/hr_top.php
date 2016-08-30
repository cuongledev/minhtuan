<header id="header" class="header white navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".responsive-navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php if(isset($info['logo'])) echo $info['logo']; ?>" alt="" class="img-responsive"></a>
		</div>

		<div class="collapse navbar-collapse responsive-navbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url();?>users">Thông tin của bạn</a></li>
				<li><a href="<?php echo base_url();?>users/explore">Khám phá</a></li>
				<li><a href="<?php echo base_url();?>users/scholarships">Học bổng</a></li>
				<li><a href="<?php echo base_url();?>users/resume">Hồ sơ của bạn</a></li>
				<li><a href="<?php echo base_url();?>users/message"><i class="fa fa-envelope"></i> Tin nhắn</a></li>
				<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> &nbsp;Quản lý thông tin<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class=""href="#"><i class="fa fa-user"></i> &nbsp;&nbsp;View / Edit My Profile</a>
                            </li> <!-- ./View / Edit My Profile -->
                            <li>
                                <a class=""href="#"><i class="fa fa-eye"></i> &nbsp;&nbsp;View as Other</a>
                            </li> <!-- ./View as Other -->
                            <li>
                                <a class=""href="#"><i class="fa fa-lock"></i> &nbsp;&nbsp;Privacy Settings</a>
                            </li> <!-- ./Privacy Settings -->
                            <li>
                                <a class=""href="#"><i class="fa fa-envelope"></i> &nbsp;&nbsp;Communication Settings</a>
                            </li> <!-- ./Communication Settings -->
                            <li>
                                <a class=""href="#"><i class="fa fa-gear"></i> &nbsp;&nbsp;Account Settings</a>
                            </li> <!-- ./Account Settings -->
                            <li>
                                <a class="signout" href="<?php echo base_url();?>students/logout"><i class="fa fa-sign-out"></i> &nbsp;&nbsp;Đăng xuất</a>
                            </li> <!-- ./Sign Out -->
                        </ul> <!-- ./dropdown-menu -->
                    </li> <!-- ./dropdown -->
			</ul>
		</div>
	</div>
</header>