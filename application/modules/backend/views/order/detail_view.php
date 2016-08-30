<?php 
$info_user = json_decode($info['info_user']);
$info_cart = json_decode($info['info_cart'],true);
 ?>
<div class="col-md-12" id="user_index">
		<form class="form-horizontal form-row-seperated" action="<?php if(isset($action)) echo $action; ?>" id="form_user" class="form-horizontal" enctype="multipart/form-data" method="POST">
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cog"></i> <?php if(isset($title)) echo $title; ?>
					</div>
					<?php 
					$this->load->view("globals/toolbar");
					 ?>
				</div>
				<div class="portlet-body">
					<?php 
					$this->load->view("globals/notify_action");
					 ?>
					<div class="tabbable">						
						<div class="tab-content no-space" id="information">
							<div class="tab-pane active">
								<div class="form-body">							
									
									<div class="panel panel-primary">
								      <div class="panel-heading">Thông tin khách hàng</div>
								      <div class="panel-body">
								      	<label for="">Họ tên:</label> <?php echo $info_user->name; ?> <br />
								      	<label for="">Email:</label> <?php echo $info_user->email; ?> <br />
								      	<label for="">Số điện thoại:</label> <?php echo $info_user->tel; ?> <br />
								      	<label for="">Địa chỉ:</label> <?php echo $info_user->address; ?> <br />
								      	<label for="">Hình thức thanh toán:</label> <?php 
								      	if ($info_user->payment=='cod') {
								      		echo 'Chuyển khoản';
								      	}elseif($info_user->payment=='atn'){
								      		echo 'Thanh toán khi nhận hàng';
								      	}
								      	 ?> <br />
								      	 <label for="">Mã đơn hàng:</label> <?php echo $info['mdh']; ?> <br />
								      	 <label for="">Thời gian đặt hàng:</label> <?php echo date('H:i:s d-m-Y',$info['create_time']); ?> <br />
								      </div>
								    </div>

								<div class="panel panel-primary">
							      <div class="panel-heading">Chi tiết đơn hàng</div>
							      <div class="panel-body">
								    <div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>STT</th>
												<th>Mã sản phẩm</th>
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
												$order_total=0;
												foreach ($info_cart as $key => $value) { ?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $value['masanpham']; ?></td>
														<td><?php echo $value['name']; ?></td>
														<td><?php echo $value['qty']; ?></td>
														<td><money><?php echo number_format($value['price'],0,'','.'); ?> <currency>&#8363</currency></money></td>
														<td><money><?php echo number_format($value['subtotal'],0,'','.'); $order_total += $value['subtotal'];?> <currency>&#8363</currency></money></td>
													</tr>

											<?php
											$i++;
												}
											}
											 ?>
											
										</tbody>
									</table>
									<p class="text-right"><b>Tổng đơn hàng: <money><?php echo number_format($order_total,0,'','.'); ?> <currency>&#8363</currency></money></b></p>
								</div>
								</div>
								</div>
									

									
									
								</div>
							</div>
						</div>						
					</div>
				</div>
				<div class="portlet-title topline">
					<?php 
					$this->load->view("globals/toolbar");
					 ?>
				</div>
			</div>
		</form>
</div>
