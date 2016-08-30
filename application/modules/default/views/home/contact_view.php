<main class="main col-xs-12 noPadding" id="main">
		<div class="container">
			
			<div class="map col-xs-12 noPadding" id="googleMap">
			<iframe src="<?php if(isset($info['link_google_map'])) echo $info['link_google_map'];?>" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="promotion-item col-xs-12">
						<i class="pe-7s-phone"></i>
						<div class="promotion-text contact-promotion">
							<b>HOTLINE</b><br>
							<?php if(isset($info['phone'])) echo $info['phone']; ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="promotion-item col-xs-12">
						<i class="pe-7s-map-marker"></i>
						<div class="promotion-text contact-promotion">
							<b>ĐỊA CHỈ</b><br>
							<?php if(isset($info['address'])) echo $info['address']; if(isset($district_home['name'])) echo ' - '.$district_home['name'];if(isset($province_home['name'])) echo ' - '.$province_home['name'].'.';?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="promotion-item col-xs-12">
						<i class="pe-7s-mail"></i>
						<div class="promotion-text contact-promotion">
							<b>EMAIL</b><br>
							<?php if(isset($info['email'])) echo $info['email'];?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="checkout-wrapper contact-form col-xs-12 noPadding">
				<div class="row">
					<div class="checkout-info col-xs-12">
						<?php 
							if (isset($success)) { ?>
								<!-- Success message -->
							<div class="alert alert-success" role="alert" id="success_message">Thông báo <i class="glyphicon glyphicon-thumbs-up"></i> <?php echo $success; ?></div>							
							<?php
							}
							 ?>
						<form action="<?php echo base_url().'lien-he'; ?>" method="POST" role="form">
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<label for="">Họ và tên</label>
									<div class="form-group">
										<input type="text" placeholder="Họ tên" class="form-control" id="" name="name" required>
									</div>
									
									<label for="">Số điện thoại</label>
									<div class="form-group">
										<input name="phone" placeholder="Số điện thoại" class="form-control" type="text" required/>
									</div>

									<label for="">Email</label>
									<div class="form-group">
										<input name="email" placeholder="E-Mail" class="form-control"  type="email" required />
									</div>
									<button type="submit" class="btn btn-primary checkout-info-submit-button" name="send_mess">GỬI TIN</button>
								</div>
								
								<div class="col-xs-12 col-md-6">
									<label for="">Ghi chú</label>
									<div class="form-group">
										<textarea class="form-control" name="mess" placeholder="Nội dung" required></textarea>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>




