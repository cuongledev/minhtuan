<div class="container">
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
		<div class="category-post col-xs-12 noPadding">
			<h1 class="category-post-title text-center"><?php if(isset($data['title'])) echo $data['title']; ?></h1>
		</div>
		<div class="category-wrapper col-xs-12 noPadding">
			<div class="category-post-item single-post-content col-xs-12 noPadding">
				<?php if(isset($data['content'])) echo $data['content']; ?>
			</div><!-- /.category-post-item -->
		</div><!-- /.category-wrapper -->
	</div><!-- /.product-content-wrapper -->
</div>