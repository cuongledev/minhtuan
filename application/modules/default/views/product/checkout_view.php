<main class="main col-xs-12 noPadding" id="main">
		<div class="step-wrapper col-xs-12 noPadding">
			<div class="container">
				<div class="title-cart  col-xs-12 col-md-4">
					<h2>01</h2>
					<a href="">
						<h4>Giỏ hàng</h4>
						<p>Quản lý trong giỏ</p>
					</a>
				</div>

				<div class="title-cart col-xs-12 col-md-4">
					<h2>02</h2>
					<a href="">
						<h4>Thông tin thanh toán</h4>
						<p>Kiểm tra đơn hàng</p>
					</a>
				</div>

				<div class="title-cart current-title-cart col-xs-12 col-md-4">
					<h2>03</h2>
					<a href="">
						<h4>Đặt hàng thành công</h4>
						<p>Kiểm tra và gửi đơn hàng</p>
					</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="checkout-complete col-xs-12">
				<h3 class="text-center">Chúc mừng bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra đơn hàng và liên hệ lại với bạn trong thời gian sớm nhất</h3><div class="checkout-success-info col-xs-12 noPadding">
				<div class="alert alert-success">
					<h4 class="checkout-success-info-header">Thông tin đơn hàng</h4>
					<p>Họ và tên: <?php if($info_user['name']!='') echo $info_user['name']; ?></p>
					<p>Email: <?php if($info_user['email']!='') echo $info_user['email']; ?></p>
					<p>Số điện thoại: <?php if($info_user['tel']!='') echo $info_user['tel']; ?></p>
					<p>Địa chỉ: <?php if($info_user['address']!='') echo $info_user['address']; ?></p>
					<p>Tổng tiền đơn hàng: <money><?php echo number_format($countMonney,0,'','.'); ?> &#8363;</money></p>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th>Số lượng</th>
									<th>Đơn giá</th>
									<th>Tổng cộng</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if (!empty($info_cart)) {
									$i=1;
									foreach ($info_cart as $key => $value) { ?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $value['name']; ?></td>
											<td><?php echo $value['qty']; ?></td>
											<td><money><?php echo number_format($value['price'],0,'','.'); ?> <currency>&#8363</currency></money></td>
											<td><money><?php echo number_format($value['subtotal'],0,'','.');?> <currency>&#8363</currency></money></td>
										</tr>

								<?php
									}
								}
								 ?>
								
							</tbody>
						</table>
					</div>
				</div>
				</div>
				<a href="<?php echo base_url(); ?>">Về trang chủ</a>
			</div>
		</div>
	</main>

