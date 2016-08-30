<div class="container" id="search_product">
			<div class="breadcrumb-wrapper col-xs-12 noPadding">
				<ol class="breadcrumb">
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
			</div><!-- /.breadcrumb-wrapper -->

			<div class="product-content-wrapper col-xs-12 noPadding">
				
				<div class="row">
					<div class="product-content col-xs-12 col-md-9 col-md-push-3">
						<div class="product-wrapper col-xs-12 noPadding" id="product-wrapper">
							<div class="category-post col-xs-12 noPadding">
								<h1 class="category-post-title text-center">
								<?php 
								echo (isset($keywords)) ? 'Kết quả tìm kiếm cho từ khóa : " '.$keywords.' "' : 'Mời bạn nhập từ khóa để tìm kiếm sản phẩm.';
								 ?>
								</h1>
							</div>
							<div class="text-center col-xs-12 hidden" id="loadView">
								<img src="<?php echo base_url().'public/default/images/blue-spinner.gif' ?>" alt="" class="img-responsive" style="width: 50px; height: 50px; display: block; margin: 0 auto;">
							</div>

							<!-- Grid View x-->
							<div class="row">
								<?php 

								if (isset($product) && !empty($product)) {

									foreach ($product as $key => $value) { ?>
										<div class="product-item col-xs-6 col-md-3">
											<div class="product-item-images col-xs-12 noPadding">
												<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.html'; ?>"><img src="<?php if($value['thumbnail']!=''){ echo base_url().'image_tools/timthumb.php?src='.$value['thumbnail'].'&h=250&w=250&zc=2';}else{ echo base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=250&w=250&zc=2';} ?>" alt="<?php if(isset($value['title'])) echo $value['title']; ?>" class="img-responsive"></a>

												
											</div>
											<div class="product-item-title text-center col-xs-12 noPadding">
												<a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.html'; ?>"><?php if(isset($value['title'])) echo $value['title']; ?></a>
											</div>
											<div class="product-item-info col-xs-12 noPadding text-center">
												<span class="product-item-cost"><money><?php if(isset($value['price'])) echo number_format($value['price'],0,'','.'); ?> <currency>&#8363</currency></money></span>
												<?php 
											if(isset($value['saleoff']) && $value['saleoff']>0){ ?>
												<span class="product-item-cost product-unsale"><?php echo "<money><del>". number_format($value['saleoff'],0,'','.')."</del> <currency>&#8363</currency></money>"; ?></span>
											<?php 
											}
											 ?>
												
												<p class="product-desc">
													<?php if(isset($value['info_short'])) echo $value['info_short']; ?>
												</p>
											</div>
										</div><!-- /.product-item -->
								<?php
									}
								}
								 ?>
								
							</div>

							


							<!-- Ajax Loader -->
							<div class="ajax-loadmore col-xs-12 noPadding text-center" id="loader" style="display:none;">
								<img src="<?php echo base_url().'public/default/images/blue-spinner.gif' ?>" alt="" class="img-responsive" style="width: 50px; height: 50px; display: block; margin: 0 auto;">
							</div>
							<!-- Ajax Loader -->
						</div>
					</div><!-- /.product-content -->
					<div class="sidebar col-xs-12 col-md-3 col-md-pull-9">
						<div class="col-xs-12 sidebar-item noPadding">
							
							<div class="sidebar-wrapper col-xs-12 noPadding">
							<style>
							.menu_left ul{
								    list-style: none;
							}
							.sidebar-header {
    								font-size: 18px;
    						}
							</style>
							<?php
							$newArrUl = array();
							foreach ($getListCategory as $value) {
								$pa = $value['parent_id'];
								$newArrUl[$pa][] = $value;
								}
							//
							 ?>
							<div style="width:100%;">
					            <div class="menu_left">
					                <?php 
					                dequyLeft($newArrUl);
					                 ?>
					            </div> 
					        </div>    

								

							</div>
						</div><!-- /.sidebar-item -->

						
						<div class="col-xs-12 sidebar-item noPadding">
							<h3 class="sidebar-header">Facebook</h3>
							<div class="sidebar-wrapper col-xs-12 noPadding">
								<div class="fb-page" data-href="<?php if(isset($info['link_facebook'])) echo $info['link_facebook']; ?>" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-width="262" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php if(isset($info['link_facebook'])) echo $info['link_facebook']; ?>"><a href="<?php if(isset($info['link_facebook'])) echo $info['link_facebook']; ?>"><?php if(isset($info['name'])) echo $info['name']; ?></a></blockquote></div></div>
							</div>
						</div><!-- /.sidebar-item -->
						<div class="col-xs-12 sidebar-item noPadding">
							<div class="sidebar-carousel col-xs-12" id="sidebarCarousel">
								<div class="item">
									<img src="<?php echo base_url(); ?>public/default/images/side-carousel01.gif" alt="" class="img-responsive">
								</div>
								<div class="item">
									<img src="<?php echo base_url(); ?>public/default/images/side-carousel02.gif" alt="" class="img-responsive">
								</div>
							</div>



							
						</div><!-- /.sidebar-item -->
					</div><!-- /.sidebar -->
				</div>
			</div><!-- /.product-content-wrapper -->
		</div>