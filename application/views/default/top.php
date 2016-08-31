<div class="promotion">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-6 promotion-left">
					<img src="<?php echo base_url().'public/default/images/icon-laptop.png'; ?>" alt="">&nbsp;Hotline mua hàng <span><?php if(isset($info['title_sidebar'])) echo $info['title_sidebar']; ?></span>
				</div>
				<div class="col-xs-6 col-md-6 promotion-right text-right">
					<a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng nhập </a>&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-lock" aria-hidden="true"></i> Đăng ký</a>
				</div>
				
			</div>
		</div>
	</div>

	<header class="header col-xs-12 noPadding" id="header">

		<div class="container">
			<div class="main-bar col-xs-12 noPadding">
				<div class="col-xs-6 col-md-4 logo col-xs-push-3 col-md-push-0 noPadding">
					<a href="<?php echo base_url();?>"><img src="<?php if(isset($info['logo'])) echo base_url().$info['logo']; ?>" alt="" class="img-responsive center-block"></a>
				</div>

				<div class="hidden-xs hidden-sm col-md-6 search-form">
				  <form action="<?php echo base_url().'tim-kiem.htm'; ?>" method="GET" role="form">

						<div class="form-group">
			                <div class='input-group date'>
			                    <input type="text" name="input_search" class="form-control" id="input_search" placeholder="Tìm kiếm ...">
			                    <span class="input-group-addon option_search">
			                        <span class="">All</span>
			                        <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
			                    </span>
			                    <span class="input-group-addon icon_search">
			                        <span class="fa fa-search"></span>
			                    </span>
			                </div>
			                <div class="act_select_option">
			                	<p><a class="">All</a></p>
		                        <p><a class="">Product</a></p>
		                        <p><a class="">News</a></p>
			                </div>

			            </div>
			            <div class="form-group phone-hotline-top">
			            	<p><span><i class="fa fa-phone fa-3" aria-hidden="true"></i>
			            	<?php 
			            	echo (isset($info['phone'])) ? $info['phone'] : '';
			            	 ?>
							</span>
			            	Hỗ trợ khách hàng từ 7h đến 21h hàng ngày</p>
			            </div>

				  </form>
				</div>


				<div class="col-xs-3 col-md-2 text-right shopping-cart shopping_cart_lnc">
					<a href="<?php echo base_url().'product/showCart'; ?>">
					<img src="<?php echo base_url().'public/default/images/icon-cart.png' ?>" alt="">
					GIỎ HÀNG (<?php 
						echo $this->cart->total_items();
					?>)
					 <?php //echo number_format($this->cart->total(),0,'','.');?></a>
				</div>
			</div><!-- /.main-bar -->
			<div class="col-md-12 noPadding">
				<nav class="navbar" role="navigation">
					<div class="container-fluid noPadding">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".responsive-navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
				
						<div class="collapse navbar-collapse responsive-navbar noPadding">
							<?php
							$newArrUl = array();
							foreach ($menu as $value) {
								$pa = $value['parent_id'];
								$newArrUl[$pa][] = $value;
								}
							dequyUlxxx($newArrUl);
							 ?>
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
			</div>
		</div>
	</header>




