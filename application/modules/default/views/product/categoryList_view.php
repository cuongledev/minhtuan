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

					<h4 class="featured-title hidden-xs hidden-sm">Sản phẩm nổi bật</h4>
					<div class="featured-product-wrapper col-md-12 noPadding hidden-xs hidden-sm">


					 	<?php 
					 	if (!empty($getListRating)) {
					 		foreach ($getListRating as $key => $value) { ?>
					 			<div class="product-single featured-product-single col-xs-12 noPadding">
									<div class="row">
										<div class="product-images col-xs-4">
											<div class="col-xs-12 noPadding">
												<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.alias($value['title']).'.htm'; ?>"><img src="<?php if(isset($value['thumbnail'])) echo base_url().'image_tools/timthumb.php?src='.base_url().$value['thumbnail'].'&h=580&w=450&zc=2'; ?>" alt="" class="img-responsive" width="450" height="580"></a>
											</div>
										</div>
										<div class="product-detail col-xs-8 noPadding">
											<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.alias($value['title']).'.htm'; ?>"><b><p class="product-name"><?php if(isset($value['title'])) echo $value['title']; ?></p></b></a>
											<money><?php if(isset($value['price'])) echo number_format($value['price'],0,'','.'); ?> &#8363;</money>
										</div>
									</div>
								</div><!-- /.product-single -->
					 		<?php 
					 		}
					 	}
					 	 ?>
						
					</div>
				</div>
				<div class="category-wrapper col-xs-12 col-md-9">
					<div class="breadcrumb-wrapper col-xs-12 noPadding" style="background-image: url(<?php echo base_url().'public/default'; ?>/images/breadcrum-bg.jpg)">
						<h1 class="text-center"><?php if (isset($cateinfo['info']) && $cateinfo['info']!='') {
							echo $cateinfo['info'];
						} ?></h1>
						<ol class="breadcrumb text-center">
						<?php 
						if (isset($page_breadcrumb) && !empty($page_breadcrumb)) { 
							foreach ($page_breadcrumb as $key => $value) { ?>
								<li <?php if(isset($value['href'])&& $value['href']=='') echo 'class="active"'; ?>>
									<?php if(isset($value['href'])&& $value['href']!=''){ ?>
										<a href="<?php if(isset($value['href'])&& $value['href']!='') echo $value['href']; ?>"><?php if(isset($value['name'])&& $value['name']!='') echo $value['name']; ?></a>
									<?php
									}else{ ?>
									<?php if(isset($value['name'])&& $value['name']!='') echo $value['name']; ?>
									<?php
									} ?>
									
								</li>
							<?php
							}
						}
						 ?>
					</ol>
					</div>
					<div class="category-wrapper-list col-xs-12 noPadding">
						<div class="row">
						<?php 
								if (isset($product) && !empty($product)) {
									foreach ($product as $key => $value) { ?>
										
										<div class="product-single col-xs-6 col-sm-6 col-md-4">
											<div class="product-images col-xs-12 noPadding">
												
												<div class="col-xs-12 noPadding">
													<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/danh-muc/'.$value['id'].'-'.alias($value['title']).'.htm'; ?>"><img src="<?php echo ($value['thumbnail']!='') ? base_url().'image_tools/timthumb.php?src='.base_url().$value['thumbnail'].'&h=580&w=450&zc=2' : base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=580&w=450&zc=2';?>" alt="" class="img-responsive" width="450" height="580"></a>
												</div>
											</div>
											<div class="product-detail col-xs-12 noPadding">
												<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/danh-muc/'.$value['id'].'-'.alias($value['title']).'.htm'; ?>"><p class="product-name"><?php echo (isset($value['title'])) ? $value['title'] : ''; ?></p></a>
											</div>
										</div><!-- /.product-single -->

								<?php
								}
								}
								?>
							
						</div>
						<div class="pagination-wrapper col-xs-12 noPadding">
						<?php if(isset($page_link)) echo $page_link; ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>


















