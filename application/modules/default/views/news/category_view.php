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
				<div class="category-wrapper col-xs-12 col-md-9">
					<div class="breadcrumb-wrapper col-xs-12 noPadding" style="background-image: url(<?php echo base_url().'public/default'; ?>/images/breadcrum-bg.jpg)">
						<h1 class="text-center">Tin tức</h1>
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
							<div class="single-blog col-xs-12">
								<div class="single-blog-wrapper col-xs-12 noPadding">
									<div class="section-list col-xs-12">
										<div class="section-wrapper col-xs-12 noPadding">
											<?php 

												if (isset($data) && !empty($data)) {
													foreach ($data as $key => $value) { ?>

														<div class="product-single catgory-single-post col-xs-12 noPadding">
															<div class="row">
																<a href="<?php if(isset($value['alias'])) echo base_url().'n'.$value['id'].'-'.$value['alias'].'.htm'; ?>">
																	<div class="product-images col-xs-4">
																		<div class="col-md-12 product-images-wrapper noPadding">
																			<img src="<?php echo (isset($value['image'])) ? base_url().$value['image'] : base_url().'public/default/images/post01.jpg'; ?>" alt="" class="img-responsive" width="280" height="175">
																		</div>
																	</div>
																</a>
																<div class="blog-desc col-xs-8">
																	<a href="<?php if(isset($value['alias'])) echo base_url().'n'.$value['id'].'-'.$value['alias'].'.htm'; ?>"><p class="blog-name"><?php if(isset($value['title'])) echo $value['title']; ?></p></a>
																	<p><?php if(isset($value['description'])) echo $value['description']; ?> […]</p>
																</div>
															</div>
														</div><!-- /.product-single -->

												<?php
													}
												}else{
													echo '<div class="alert alert-warning">
													          <center> Không có bản tin nào được tìm thấy ! </center>
													        </div>';
												}
												 ?>



											

											
										</div><!-- /.section-wrapper -->
									</div>
								</div>
							</div><!-- /.product-single -->
							
						</div>
						<div class="pagination-wrapper col-xs-12 noPadding">
							<?php if(isset($page_link)) echo $page_link; ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>




