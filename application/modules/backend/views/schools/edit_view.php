<div class="col-md-12" id="schools_edit">
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
										<label class="col-md-2 control-label">Tên trường: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="hidden" class="form-control maxlength-handler" maxlength="100" name="hidden_id" value="<?php if(isset($info['id'])) echo $info['id'];?>">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="title" value="<?php if(isset($info['title'])) echo $info['title'];?>" required>
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-2">Logo: </label>
										<div class="col-md-8">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail logo_thumbnail" style="width: 200px; height: 150px;">
													<img src="<?php 
													if (isset($info['logo']) && $info['logo']!='') {
														echo base_url().$info['logo'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if (isset($info['logo']) && $info['logo']!='') {
														echo base_url().$info['logo'];
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
										<label class="col-md-2 control-label">Email:
										</label>
										<div class="col-md-5 row_input_title">
											<input type="email" class="form-control maxlength-handler" maxlength="100" id="email" name="email" value="<?php if(isset($info['email'])) echo $info['email'];?>" required>
											<input type="hidden" maxlength="100" id="email_check" value="<?php if(isset($info['email'])) echo $info['email'];?>">
											<input type="hidden" id="hidden_email"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Số điện thoại:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['phone'])) echo $info['phone'];?>" class="form-control " name="phone">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Chuyên nghành:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['specialized'])) echo $info['specialized'];?>" class="form-control " name="specialized">
											
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2 control-label">Ngày thành lập:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['founding'])) echo $info['founding'];?>" class="form-control " name="founding">
											
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2 control-label">Loại hình đào tạo:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['type'])) echo $info['type'];?>" class="form-control " name="type">
											
										</div>
									</div>	
									<div class="form-group get_id_province">
										<label class="control-label col-md-2">Tỉnh/TP:
										</label>
										<div class="col-md-5">
											<select class="form-control" name="provinces" id="provinces">
												<option value="" >Chọn tỉnh thành</option>
												<?php if(isset($province)){
													foreach ($province as $k => $v) {
														if ($v['provinceid']==$info['provinceid']) {
															$selected = ' selected';
														}else{
															$selected = '';
														}
														echo '<option value="'.$v['provinceid'].'"'.$selected.'>'.$v['name'].'</option>';
													}
												
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group get_id_district"  id="show_district">
										<label class="control-label col-md-2">Quan/Huyen:
										</label>
										<div class="col-md-5" id="district">
											<select class="form-control" name="districid" id="districtid" data-id="<?php if(isset($info['districtid'])) echo $info['districtid']; ?>" data-option="Chọn quận huyện">
												<option value="">Chọn quận huyện</option>
												<?php if(isset($district)){
													foreach ($district as $k => $v) {
														echo '<option value="'.$v['districtid'].' ">'.$v['name'].'</option>';
													}
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-2 control-label">Địa chỉ:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['address'])) echo $info['address'];?>" class="form-control" name="address">
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
