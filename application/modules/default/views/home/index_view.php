

<main class="main col-xs-12 noPadding" id="main">
	<div class="main-slider">
		<div class="slider col-xs-12 noPadding" id="slider">
        	<?php 
				if (!empty($slider)) {
					foreach ($slider as $k => $v) { ?>
						<div class="item">
							<a href="#">
								<div class="banner-image col-xs-12 noPadding" style="background: url(<?php echo (isset($v['images']) && $v['images']!='') ? base_url().$v['images'] : ''; ?>);background-size: cover;background-repeat: no-repeat;"></div>
							</a>
						</div>
					<?php
					}
				}


				 ?>
			
		</div><!-- /.slider -->
	</div>
		

		<div class="container">

			<div class="row">
			<div class="clearfix"></div>
			<div class="product-tab-wapper">
				<div class="col-xs-12 col-md-12">	
					<ul class="nav nav-tabs product-tab-nav">
						<?php 
						if (!empty($getListCategoryMain)) {
							$i=0;
							$mang=array();
							foreach ($getListCategoryMain as $key => $value) { ?>
									<li class="<?php if($i==0) echo 'active'; ?>"><a data-toggle="tab" href="#home<?php echo $value['id']; ?>"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;<?php echo $value['title']; ?></a></li>
								<?php 
								$mang[] = $value['id'];
								$i++;
							}
						}
						 ?>
					 </ul>
				</div>
				

				  <div class="tab-content">
				  	<?php 
				  	if (!empty($mang)) {
				  		$i=0;
				  		foreach ($mang as $value) { ?>
				  				<div id="home<?php echo $value; ?>" class="tab-pane fade <?php if($i==0) echo 'in active'; ?>">
				  					<div id="demo-12-col" class="col-xs-12">
					  					<?php 
					  					$sp = $this->Mproduct->listProductWhereCategories($value);

					  						if (!empty($sp)) {
					  							foreach ($sp as $items) {
					  								?>
					  									<div class="col-xs-2 col-xs-15">
										            		<div class="product-carousels">
												            	<div class="item">
																	<div class="product-single col-xs-12 noPadding">
																		<div class="product-images col-xs-12 noPadding">
																			<div class="front-images col-xs-12 noPadding">
																				<a href="<?php echo base_url().'san-pham/'.$items['id'].'-'.alias($items['title']).'.htm'; ?>"><img src="<?php echo ($items['thumbnail_after']!='') ? base_url().'image_tools/timthumb.php?src='.base_url().$items['thumbnail_after'].'&h=580&w=450&zc=2' : base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=580&w=450&zc=2';?>" alt="" class="img-responsive" width="450" height="580"></a>
																			</div>
																		</div>
																		<div class="product-detail col-xs-12 noPadding">
																			<div class="product-top-title">
																				<a href="<?php echo base_url().'san-pham/'.$items['id'].'-'.alias($items['title']).'.htm'; ?>"><p class="product-name text-center">Máy lọc nước kang</p></a>
																			</div>
																			<p class="product-code text-center">Mã SP: 1103</p>
																			<p class="price text-center">Gía: <span>3.000.000 &#8363;</span><p>
																		</div>
																	</div><!-- /.product-single -->
																</div>
															</div>
															<!-- END PRODUCT CALROSELS -->
										            </div>
					  								<?php 
					  							}
					  						}
					  					?>
				  					</div>
				  				</div>
				  		<?php 
				  		$i++;
				  		}
				  	}

				  	 ?>
				    	

							<div class="col-xs-12 col-md-12">
								<div class="pagination-bottom">
										<div class="count-pages col-xs-12 col-md-3">
											Tổng 8 trang
										</div>
										<div class="box-pagi col-xs-12 col-md-8 text-right">
											<ul class="pagination">
											  <li><a href="#">«</a></li>
											  <li><a href="#">1</a></li>
											  <li><a class="active" href="#">2</a></li>
											  <li><a href="#">3</a></li>
											  <li><a href="#">4</a></li>
											  <li><a href="#">5</a></li>
											  <li><a href="#">6</a></li>
											  <li><a href="#">7</a></li>
											  <li><a href="#">»</a></li>
											</ul>
										</div>										
										<div class="view-all col-xs-12 col-md-1 text-right">
											Xem tất cả »
										</div>
								</div>
							    
							</div>



				  </div>
			</div>
			<div class="clearfix"></div>
















			

			 <!--END PRODUCT-->

				<div class="section-list col-xs-12">
					<div class="section-title"><a href="<?php echo base_url().'news'; ?>">Tin tức</a></div>
					<div class="section-wrapper col-xs-12 noPadding">
						<div class="carousel-navigation hidden-xs hidden-sm" id="carousel-navigation">
							<a href="javascript:;" class="prev"><i class="pe-7s-angle-left"></i></a>
							<a href="javascript:;" class="next"><i class="pe-7s-angle-right"></i></a>
						</div>
						<div id="blog-carousel">
						<?php 
						if (isset($tintuc) && !empty($tintuc)) {
							foreach ($tintuc as $key => $value) { ?>
								<div class="item">
									<div class="product-single col-xs-12 noPadding">
										<div class="row">
											<a href="<?php echo base_url().'n'.$value['id'].'-'.$value['alias'].'.htm'; ?>">
												<div class="product-images col-xs-6">
													<div class="col-md-12 product-images-wrapper noPadding">
														<img src="<?php echo ($value['image']!='') ? base_url().'image_tools/timthumb.php?src='.base_url().$value['image'].'&h=175&w=280&zc=2' : base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=175&w=280&zc=2';?>" alt="" class="img-responsive" width="280" height="175">
													</div>
												</div>
											</a>
											<div class="blog-desc col-xs-6">
												<a href="<?php echo base_url().'n'.$value['id'].'-'.alias($value['alias']).'.htm'; ?>"><p class="blog-name"><?php echo (isset($value['title'])) ? $value['title'] : '';?></p></a>
												<p><?php echo (isset($value['description'])) ? $value['description'] : '';?></p>
											</div>
										</div>
									</div><!-- /.product-single -->
								</div>

						<?php
							}
						}

						 ?>
							
						</div>
					</div><!-- /.section-wrapper -->
				</div>

				<div class="section-list col-xs-12">
					<div class="section-wrapper col-xs-12 noPadding">
						<div class="carousel-navigation hidden-xs hidden-sm" id="carousel-navigation">
							<a href="javascript:;" class="prev"><i class="pe-7s-angle-left"></i></a>
							<a href="javascript:;" class="next"><i class="pe-7s-angle-right"></i></a>
						</div>
						<div id="partner-carousel">
							<?php 
							if (isset($comments) && !empty($comments)) {
								foreach ($comments as $key => $value) { ?>
									<div class="item">
									<img src="<?php echo base_url().$value['images']; ?>" title="<?php echo $value['title']; ?>" alt="<?php echo $value['title']; ?>" class="img-responsive">
								</div>
								<?php
								}
							}
							 ?>
							
							
						</div>
					</div><!-- /.section-wrapper -->
				</div>
			</div>

		</div>
	</main>