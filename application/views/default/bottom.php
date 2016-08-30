<footer class="footer col-xs-12 noPadding" id="footer">
		<div class="container">
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
		</div>

		<div class="footer-wrapper col-xs-12 noPadding">
			<div class="container">
				<div class="row">
					<img src="<?php if(isset($info['logo'])) echo base_url().$info['logo']; ?>" alt="" class="img-responsive">
					<div class="footer-col col-xs-12 col-md-3">
						<ul class="nav contact-list">
							<li><i class="pe-7s-home"></i> <span><?php if(isset($info['address'])) echo $info['address']; if(isset($district_home['name'])) echo ' - '.$district_home['name'];if(isset($province_home['name'])) echo ' - '.$province_home['name'].'.';?></span></li>
							<li><i class="pe-7s-phone"></i> <span><?php if(isset($info['phone'])) echo $info['phone'];?></span></li>
							<li><i class="pe-7s-mail"></i> <span><?php if(isset($info['email'])) echo $info['email'];?></span></li>
						</ul>
					</div>

					<div class="footer-col col-xs-12 col-md-3 footer-list">
						<ul class="nav ">
							<li><a href="">Giới thiệu</a></li>
							<li><a href="">Chính sách</a></li>
							<li><a href="">Thông tin vận chuyển</a></li>
							<li><a href="">Đặt hàng & Gửi trả</a></li>
						</ul>
					</div>

					<div class="footer-col col-md-3 footer-list hidden-xs hidden-sm">
						<ul class="nav ">
							<li><a href="">Giới thiệu iPhone 7</a></li>
							<li><a href="">Bè khóa iCloud đơn giản với 1 cú Click</a></li>
							<li><a href="">Mẹo vặt sử dụng iPhone</a></li>
						</ul>
					</div>

					<div class="footer-col hidden-xs hidden-sm col-md-3 footer-list">
						<div class="fb-page" data-href="<?php if(isset($info['link_facebook'])) echo $info['link_facebook']; ?>" data-width="280" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php if(isset($info['link_facebook'])) echo $info['link_facebook']; ?>" class="fb-xfbml-parse-ignore"><a href="<?php if(isset($info['link_facebook'])) echo $info['link_facebook']; ?>"></a></blockquote></div>
					</div>

				</div>
			</div>	
		</div>
	</footer>

	<div class="copyright col-xs-12 noPadding text-center">Bản quyền thuộc về <a href="">DEMO</a> © 2016</div>


