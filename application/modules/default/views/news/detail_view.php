
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
					<div class="single-blog col-xs-12 noPadding">
						<div class="single-post-wrapper col-xs-12 noPadding">
							<div class="featured-single-post-images col-xs-12 noPadding">
								<img src="<?php echo (isset($data['image'])) ? base_url().$data['image'] : base_url().'public/default/images/post01.jpg'; ?>" alt="" class="img-responsive center-block" width="697" height="350">
							</div>
							<h1 class="single-post-title text-center"><?php if(isset($data['title'])) echo $data['title']; ?></h1>
							<div class="single-post-content col-xs-12 noPadding">
								<?php if(isset($data['content'])) echo $data['content']; ?>
							</div>
						</div>
					</div><!-- /.product-single -->
					<div class="single-post-comment col-xs-12 noPadding">
						<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="3"></div>
					</div>
				</div>

		</div>
	</main>