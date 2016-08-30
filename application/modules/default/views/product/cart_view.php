<?php 
$this->load->model('Mproduct');
foreach ($data as $key => $value) {
	
	$dataxxx = $this->Mproduct->detail($value['id']);
	$data[$key]['name'] = $dataxxx['title'];
	$data[$key]['thumbnail'] = $dataxxx['thumbnail'];
}
 ?>





	<main class="main col-xs-12 noPadding" id="main">
		<div class="step-wrapper col-xs-12 noPadding">
			<div class="container">
				<div class="title-cart current-title-cart col-xs-12 col-md-4">
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
			<div class="checkout-list col-xs-12 noPadding">
				<form action="<?php echo base_url()."product/update"; ?>" method="post" accept-charset="utf-8">
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th colspan="3" class="text-center">Sản phẩm</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Giá tiền</th>
								<th>Tổng cộng</th>
							</tr>
						</thead>
						<tbody>
							<?php
						    $i = 1;
						    foreach($data as $item){
						        echo "<tr>";
						        echo "<td>".$i."<input type='hidden' name='$i"."[rowid]' value='$item[rowid]' /></td>";
						        echo "<td><a class='close-checkout' href='".base_url()."product/del/$item[id]"."'><i class='fa fa-close'></i></a></a></td>";
						        echo "<td><img src='".base_url().$item['thumbnail']."' alt='' class='img-responsive center-block' width='50'></td>";
						        echo "<td>$item[name]</td>";
						        echo "<td width='25%''>
									<div class='quantity buttons_added'>
										<input type='button' value='+' class='plus btn-number' data-type='plus'>
									    
											<input type='number' name='$i"."[qty]' id='input' class='input-text qty text' value='".$item['qty']."' min='1' max='100' step='1' required='required' title=''>

										<input type='button' value='-'' class='minus btn-number' data-type='minus'>
									</div>
								</td>";
						        echo "<td><money>".number_format($item['price'],0,'','.')." <currency>&#8363</currency></money></td>";
						        echo "<td><money>".number_format($item['subtotal'],0,'','.')." <currency>&#8363</currency></money></td>";
						        
						        echo "</tr>";
						        $i++;
						    }
						    ?>	

						</tbody>
					</table>
					<button type="submit" name="oke2" class="btn btn-primary quit-cart pull-left">Cập nhập đơn hàng</button>
					<p class="text-right"><b>Tổng cộng: <money><?php echo number_format($this->cart->total(),0,'','.'); ?> <currency>&#8363</currency></money></b></p>
					<a href="<?php echo base_url().'product/checkout'; ?>" class="btn btn-default pull-right shoppingCart_submit">Tiếp theo</a>
				</form>
			</div>
		</div>
	</main>