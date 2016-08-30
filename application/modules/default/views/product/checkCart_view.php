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

				<div class="title-cart current-title-cart col-xs-12 col-md-4">
					<h2>02</h2>
					<a href="">
						<h4>Thông tin thanh toán</h4>
						<p>Kiểm tra đơn hàng</p>
					</a>
				</div>

				<div class="title-cart col-xs-12 col-md-4">
					<h2>03</h2>
					<a href="">
						<h4>Đặt hàng thành công</h4>
						<p>Kiểm tra và gửi đơn hàng</p>
					</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="checkout-wrapper col-xs-12 noPadding">
				<div class="row">
					<div class="checkout-info col-xs-12 col-md-6">
						<form action="<?php echo base_url(); ?>product/success" method="POST" role="form">
							<label for="">Họ và tên</label>
							<div class="form-group">
								<input type="text" class="form-control" name="name" id="" required/>
							</div>
							
							<label for="">Số điện thoại</label>
							<div class="form-group">
								<input type="tel" class="form-control" id="" required name="tel" />
							</div>

							<label for="">Địa chỉ</label>
							<div class="form-group">
								<input type="tel" class="form-control" id="" required name="address"/>
							</div>

							<label for="">Email</label>
							<div class="form-group">
								<input type="email" class="form-control" id="" name="email" required/>
							</div>

							<label for="">Ghi chú</label>
							<div class="form-group">
								<textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
							</div>
						
							<button type="submit" name="checkoutok" class="btn btn-primary checkout-info-submit-button">Thanh toán</button>
						</form>
					</div>
					<div class="checkout-detail col-xs-12 col-md-6">
						<h4 class="checkout-detail-title">Đơn hàng</h4>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<th>Giá tiền</th>
								</tr>
							</thead>
							<tbody>
								
								<?php 
								if (!empty($info_cart)) {
									$i=1;
									foreach ($info_cart as $key => $value) { ?>
										<tr>
											<td><?php echo $value['name']; ?> x <b><?php echo $value['qty']; ?></b></td>
											<td><money><?php echo number_format($value['subtotal'],0,'','.');?> &#8363;</money></td>
										</tr>
								<?php
									}
								}
								 ?>



								<tr>
									<td><b>Tổng cộng</b></td>
									<td><b><money><?php echo number_format($this->cart->total(),0,'','.'); ?> &#8363;</money></b></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>