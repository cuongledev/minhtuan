
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1116392431759072";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php 
if(!empty($detail_product['images'])){
	$images = json_decode($detail_product['images']);
}
if(isset($detail_product['color']) && $detail_product['color']!=''){
	$color = json_decode($detail_product['color']);
}
?>

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
												<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.htm'; ?>"><img src="<?php if(isset($value['thumbnail'])) echo base_url().'image_tools/timthumb.php?src='.base_url().$value['thumbnail'].'&h=580&w=450&zc=2'; ?>" alt="" class="img-responsive" width="450" height="580"></a>
											</div>
										</div>
										<div class="product-detail col-xs-8 noPadding">
											<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.htm'; ?>"><b><p class="product-name"><?php if(isset($value['title'])) echo $value['title']; ?></p></b></a>
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
					<div class="breadcrumb-wrapper col-xs-12 noPadding" style="background-image: url(<?php echo base_url().'public/default';?>/images/breadcrum-bg.jpg)">
						<h1 class="text-center"><?php if(isset($detail_product['title'])) echo $detail_product['title']; ?></h1>
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
							<div class="single-product-images col-xs-12 col-md-6">
								<div class="images col-xs-12 noPadding">
									<div class="product-gallery" data-slider-id="1">
										<?php 
										if (isset($detail_product['thumbnail'])) { ?>
											<div class="item easyzoom easyzoom--overlay">
										    	<a href="<?php if(isset($detail_product['thumbnail'])) echo base_url().'image_tools/timthumb.php?src='.base_url().$detail_product['thumbnail'].'&h=1024&w=800&zc=2'; ?>">
										    		<img src="<?php if(isset($detail_product['thumbnail'])) echo base_url().'image_tools/timthumb.php?src='.base_url().$detail_product['thumbnail'].'&h=274&w=411&zc=2'; ?>" alt="" class="img-responsive" width="575" height="675">
										    	</a>
										    </div>
										<?php
										}
										 ?>

											
									<?php 
										if (!empty($color)) {
												foreach ($color as $value) { ?>


												<div class="item easyzoom easyzoom--overlay">
											    	<a href="<?php if(isset($value->image)) echo base_url().'image_tools/timthumb.php?src='.base_url().$value->image.'&h=1024&w=800&zc=2'; ?>">
											    		<img src="<?php if(isset($value->image)) echo base_url().'image_tools/timthumb.php?src='.base_url().$value->image.'&h=274&w=411&zc=2'; ?>" alt="" class="img-responsive" width="575" height="675">
											    	</a>
											    </div>

										
												<?php
												}
												}
												 ?>
									</div>
									<div class="product-navigation" data-slider-id="1">
										<div class="row">

												<?php 
													if (isset($detail_product['thumbnail'])) { ?>
														<item class="product-navigation-item col-xs-3"><img src="<?php if(isset($detail_product['thumbnail'])) echo base_url().'image_tools/timthumb.php?src='.base_url().$detail_product['thumbnail'].'&h=274&w=411&zc=2'; ?>" alt="" class="img-responsive"></item>
													<?php
													}
												 ?>
													
											 <?php 
												if (!empty($color)) {
												foreach ($color as $value) { ?>


													<item class="product-navigation-item col-xs-3"><img src="<?php if(isset($value)) echo base_url().'image_tools/timthumb.php?src='.base_url().$value->image.'&h=274&w=411&zc=2'; ?>" alt="" class="img-responsive"></item>

										
												<?php
												}
												}
												 ?>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product-detail col-xs-12 col-md-6">
								<h1 class="single-product-name"><?php if(isset($detail_product['title'])) echo $detail_product['title']; ?></h1>

								<div class="single-product-excerpt col-xs-12 noPadding">
									<?php if(isset($detail_product['masanpham']) && $detail_product['masanpham']!='') echo '<p class="product-code">Mã sản phẩm: '.$detail_product['masanpham'].'</p>'; 
								?>
									<?php if ($detail_product['saleoff'] != 0) { ?>
									<div class="single-product-cost single-product-cost-sale">Giá cũ: <del><money><?php if(isset($detail_product['saleoff'])) echo number_format($detail_product['saleoff'],0,'','.'); ?> <currency>&#8363</currency></money></del></div>
								<?php } ?>

								
								<div class="single-product-cost single-product-cost-sale">Giá bán: 
								<money><?php if(isset($detail_product['price'])) echo number_format($detail_product['price'],0,'','.'); ?> &#8363;</money>
								</div>
								
									<?php echo (isset($detail_product['tinhtrang']) && $detail_product['tinhtrang']!='') ? "<p class='product-code'>Tình trạng: ".$detail_product['tinhtrang']."</p>" : ''; ?>
									<?php if(isset($detail_product['weigh_class']) && $detail_product['weigh_class']!='') {
										echo '<p class="product-code">'.$detail_product['weigh_class'].'</p>';
									}
										?>
									
										<?php if($detail_product['baohanh']) echo '<p class="product-code">Bảo hành: '.$detail_product['baohanh'].'</p>'; ?>
									<?php 
									if (isset($detail_product['info_short']) && $detail_product['info_short']!='') {
										echo $detail_product['info_short'];
									}
									?>
								</div>
								<div class="single-product-order col-xs-12 noPadding">
									<form action="" method="POST" role="form">
										<input type="hidden" name="masp" id="masp" value="<?php if(isset($detail_product['id'])) echo $detail_product['id']; ?>">
										<div class="quantity buttons_added">
											<input type="button" value="+" class="plus btn-number" data-type="plus">
										    <input type="number" step="1" min="1" max="" name="quant[1]" id="quant" value="1" title="Qty" class="input-text qty text" size="4">
										    <input type="button" value="-" class="minus btn-number" data-type="minus">
										</div>
										<button type="button" name="oke" id="shopping-cart-button" class="btn btn-primary addtocart">Đặt mua</button>
									</form>
								</div>
								<!-- <div class="single-product-social col-xs-12 noPadding">
									<ul class="social">
										<li><a href=""><i class="fa fa-facebook"></i></a></li>
										<li><a href=""><i class="fa fa-twitter"></i></a></li>
										<li><a href=""><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div> -->
								<div class="product_meta col-xs-12 noPadding">
									<span class="posted-in">Chuyên mục: <a href="<?php echo base_url().'san-pham/danh-muc/'.$category['id'].'-'.alias($category['alias']).'.htm'; ?>"><?php echo (isset($category['title'])) ? $category['title'] : ''; ?></a></span>
								</div>
							</div>
						</div>
						<div class="single-product-desc col-xs-12 noPadding">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active">
										<a href="#mota-info" aria-controls="mota-info" role="tab" data-toggle="tab">Mô tả sản phẩm</a>
									</li>
									<li role="presentation">
										<a href="#technical-info" aria-controls="technical-info" role="tab" data-toggle="tab">Thông số sản phẩm</a>
									</li>
									<li role="presentation">
										<a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Bình luận</a>
									</li>
								</ul>
							
								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="mota-info">
										<div class="techical-info col-xs-12">
											<?php 
											if(isset($detail_product['mota']) && $detail_product['mota']!='') {
											echo $detail_product['mota'];
											}
											?>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="technical-info">
										<div class="techical-info col-xs-12">
											<?php if(isset($detail_product['full_info']) && $detail_product['full_info']!='') {
											echo $detail_product['full_info'];
										}
											?>
										</div>
									</div>
									
									<div role="tabpanel" class="tab-pane" id="comment">
										<div class="techinical-info col-xs-12">
											<div class="fb-comments" data-href="<?php echo base_url().'san-pham/'.$detail_product['id'].'-'.alias($detail_product['alias']).'.htm'; ?>" data-numposts="5"></div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- /.single-product-desc -->

						<div class="related-product col-xs-12 noPadding">
							<h3 class="related-procduct-header">Sản phẩm liên quan</h3>
							<div class="section-wrapper col-xs-12 noPadding">
								<div class="carousel-navigation hidden-xs hidden-sm" id="carousel-navigation">
									<a href="javascript:;" class="prev"><i class="pe-7s-angle-left"></i></a>
									<a href="javascript:;" class="next"><i class="pe-7s-angle-right"></i></a>
								</div>
								<div class="related-product-carousel">
								<?php 
								if (isset($product_related) && !empty($product_related)) {
									foreach ($product_related as $key => $value) {  ?>


										<div class="item">
											<div class="product-single col-xs-12 noPadding">
												<div class="product-images col-xs-12 noPadding">
													<div class="behind-images hidden-xs hidden-sm col-md-12 noPadding">
														<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.alias($value['title']).'.htm'; ?>"><img src="<?php if(isset($value['thumbnail_after'])) echo base_url().'image_tools/timthumb.php?src='.base_url().$value['thumbnail_after'].'&h=580&w=450&zc=2'; ?>" alt="" class="img-responsive" width="450" height="580"></a>
													</div>
													<div class="front-images col-xs-12 noPadding">
														<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.alias($value['title']).'.htm'; ?>"><img src="<?php if(isset($value['thumbnail'])) echo base_url().'image_tools/timthumb.php?src='.base_url().$value['thumbnail'].'&h=580&w=450&zc=2'; ?>" alt="" class="img-responsive" width="450" height="580"></a>
													</div>
												</div>
												<div class="product-detail col-xs-12 noPadding">
													<a href=""><p class="product-name"><?php if(isset($value['title'])) echo $value['title']; ?></p></a>
													<money><?php echo (isset($value['price'])) ? number_format($value['price'],0,'','.') : ''; ?> &#8363;</money>
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
					</div>
				</div>
			</div>

		</div>
	</main>