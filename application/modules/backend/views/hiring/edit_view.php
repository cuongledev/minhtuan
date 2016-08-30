<div class="col-md-12" id="hiring_edit">
		<form class="form-horizontal form-row-seperated" action="<?php echo (isset($action)) ? $action : ''; ?>" id="form_hiring" class="form-horizontal" enctype="multipart/form-data" method="POST">
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
									
									<div class="form-group">
										<label class="col-md-2 control-label">Họ tên: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="hidden" class="form-control maxlength-handler" maxlength="100" name="hidden_id" value="<?php if(isset($info['id'])) echo $info['id'];?>">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="fullname" value="<?php if(isset($info['fullname'])) echo $info['fullname'];?>" required>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Email: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="email" class="form-control maxlength-handler" maxlength="100" id="email" name="email" value="<?php if(isset($info['email'])) echo $info['email'];?>" required>
											<input type="hidden" maxlength="100" id="email_check" value="<?php if(isset($info['email'])) echo $info['email'];?>">
											<input type="hidden" id="hidden_email"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mật khẩu: <?php if(isset($required)) echo $required;?>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="password" class="form-control maxlength-handler" maxlength="100" name="password" value="" <?php if(isset($required)) echo 'required';?>>
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Ảnh đại diện: </label>
										<div class="col-md-8">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail logo_thumbnail" style="width: 200px; height: 150px;">
													<img src="<?php 
													if (isset($info['avatar']) && $info['avatar']!='') {
														echo $info['avatar'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if (isset($info['avatar']) && $info['avatar']!='') {
														echo $info['avatar'];
													}
													?>" name="hidden_img1" id="hidden_img1"/>
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-exists btn btn-success">
													Thay ảnh </span>
													<input type="file" name="file_logo" class="file_logo"/>
													</span>
													<button type="button" class="btn default fileinput-exists1">Xóa </button>
												</div>
											</div>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Tên công ty:
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="company_name" value="<?php if(isset($info['company_name'])) echo $info['company_name'];?>" disabled/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Giấy phép kinh doanh:
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="gpkd" value="<?php if(isset($info['gpkd'])) echo $info['gpkd'];?>" disabled/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Số điện thoại:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['phone'])) echo $info['phone'];?>" class="form-control " name="phone">
											
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
