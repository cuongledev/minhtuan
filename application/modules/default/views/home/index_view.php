<main class="main col-xs-12 noPadding" id="main">
		<div class="container">
			<div class="row">
				<div class="category-list col-xs-12 col-md-3">
					<h3 class="category-title"><i class="pe-7s-menu"></i> Các thương hiệu</h3>
					<?php
							$newArrUl = array();
							foreach ($getListCategory as $value) {
								$pa = $value['parent_id'];
								$newArrUl[$pa][] = $value;
								}

					                dequyLeft($newArrUl);
					                 ?>
				</div>

				<div class="main-slider col-xs-12 col-md-6">
					<div id="slider" class="col-xs-12 noPadding">
					<?php 
					if (!empty($slider)) {
						foreach ($slider as $k => $v) { ?>
							<div class="item">
								<div class="banner-image col-xs-12 noPadding" style="background-image: url(<?php echo (isset($v['images']) && $v['images']!='') ? base_url().$v['images'] : ''; ?>)"></div>
							</div>
						<?php
						}
					}
					

					 ?>
					</div>
				</div>

				<div class="side-slider hidden-xs hidden-sm col-md-3">
					<a href=""><div class="side-banner col-xs-12 noPadding" style="background-image: url(<?php echo base_url().'public/default';?>/images/side-banner.jpg)"></div></a>
					<a href=""><div class="side-banner col-xs-12 noPadding" style="background-image: url(<?php echo base_url().'public/default';?>/images/side-banner02.jpg)"></div></a>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="promotion-item col-xs-12">
						<i class="pe-7s-plane"></i>
						<div class="promotion-text">
							<b>MIỄN PHÍ VẬN CHUYỂN</b><br>
							Trong phạm vi 50km.
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="promotion-item col-xs-12">
						<i class="pe-7s-headphones"></i>
						<div class="promotion-text">
							<b>HỖ TRỢ TRỰC TUYẾN 24/7</b><br>
							Gọi Hotline: <?php if(isset($info['phone'])) echo $info['phone']; ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="promotion-item col-xs-12">
						<i class="pe-7s-piggy"></i>
						<div class="promotion-text">
							<b>TIẾT KIỆM CHI PHÍ</b><br>
							Bảo hành dài hạn.
						</div>
					</div>
				</div>
			</div>

			<div class="row">
			<?php 
				if (!empty($getListCategoryMain)) {
					foreach ($getListCategoryMain as $key => $value) { 
						$mang = $this->Mproduct->listProductWhereCategories($value['id']);
						?>
							<div class="section-list col-xs-12">
								<div class="section-title"><a href="<?php echo base_url().'san-pham/danh-muc/'.$value['id'].'-'.alias($value['alias']).'.htm'; ?>"><img src="<?php echo ($value['thumbnail']!='') ? base_url().'image_tools/timthumb.php?src='.base_url().$value['thumbnail'].'&h=40&w=40&zc=2' : base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=40&w=40&zc=2';?>" alt="" class="img-responsive" width="40" height="40"><?php echo (isset($value['thumbnail'])) ? $value['title'] : ''; ?></a></div>
								<div class="section-wrapper col-xs-12 noPadding">
									<div class="carousel-navigation hidden-xs hidden-sm" id="carousel-navigation">
										<a href="javascript:;" class="prev"><i class="pe-7s-angle-left"></i></a>
										<a href="javascript:;" class="next"><i class="pe-7s-angle-right"></i></a>
									</div>
									<div class="product-carousel">
										<?php 
											if (!empty($mang)) {
												foreach ($mang as $key2 => $items) { ?>
													<div class="item">
														<div class="product-single col-xs-12 noPadding">
															<div class="product-images col-xs-12 noPadding">
																<div class="behind-images hidden-xs hidden-sm col-md-12 noPadding">
																	<a href="<?php echo base_url().'san-pham/'.$items['id'].'-'.alias($items['title']).'.htm'; ?>"><img src="<?php echo ($items['thumbnail_after']!='') ? base_url().'image_tools/timthumb.php?src='.base_url().$items['thumbnail_after'].'&h=580&w=450&zc=2' : base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=580&w=450&zc=2';?>" alt="" class="img-responsive" width="450" height="580"></a>
																</div>
																<div class="front-images col-xs-12 noPadding">
																	<a href="<?php echo base_url().'san-pham/'.$items['id'].'-'.alias($items['title']).'.htm'; ?>"><img src="<?php echo ($items['thumbnail']!='') ? base_url().'image_tools/timthumb.php?src='.base_url().$items['thumbnail'].'&h=580&w=450&zc=2' : base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=580&w=450&zc=2';?>" alt="" class="img-responsive" width="450" height="580"></a>
																</div>
															</div>
															<div class="product-detail col-xs-12 noPadding">
																<a href="<?php echo base_url().'san-pham/'.$items['id'].'-'.alias($items['title']).'.htm'; ?>"><p class="product-name"><?php echo (isset($items['title'])) ? $items['title'] : ''; ?></p></a>
																<money><?php echo (isset($items['price'])) ? number_format($items['price'],0,'','.') : ''; ?> &#8363;</money>
															</div>
														</div><!-- /.product-single -->
													</div>												
												<?php
												}
											}
										 ?>
									</div>
								</div><!-- /.section-wrapper -->
								<div class="section-category-promotion col-xs-12 noPadding">
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<a href="<?php echo (isset($value['link_banner1'])) ? $value['link_banner1'] : base_url(); ?>" class="promotion-text"><?php echo (isset($value['title_banner1'])) ? $value['title_banner1'] : ''; ?></a>
											<div class="promotion-category col-xs-12" style="background-image: url(<?php echo (isset($value['banner1'])) ? base_url().$value['banner1'] : ''; ?>)"></div>
										</div>
										<div class="col-xs-12 col-md-6">
											<a href="<?php echo (isset($value['link_banner2'])) ? $value['link_banner2'] : base_url(); ?>" class="promotion-text"><?php echo (isset($value['title_banner2'])) ? $value['title_banner2'] : ''; ?></a>
											<div class="promotion-category col-xs-12" style="background-image: url(<?php echo (isset($value['banner2'])) ? base_url().$value['banner2'] : ''; ?>)"></div>
										</div>
									</div>
								</div>
							</div>
						<?php
					}
				}
			 ?>

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