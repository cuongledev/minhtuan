<div class="col-md-12" id="company_edit">
		<form class="form-horizontal form-row-seperated" action="<?php echo (isset($action)) ? $action : ''; ?>" id="form_informationbasic" class="form-horizontal" enctype="multipart/form-data" method="POST">
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cog"></i> Chỉnh sửa hồ sơ công ty
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
										<label class="col-md-2 control-label">Tên doanh nghiệp: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="hidden" class="form-control maxlength-handler" maxlength="100" name="hidden_id" value="<?php if(isset($info['id'])) echo $info['id'];?>">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="company_name" value="<?php if(isset($info['company_name'])) echo $info['company_name'];?>" required>
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Logo: </label>
										<div class="col-md-8">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail logo_thumbnail" style="width: 200px; height: 150px;">
													<img src="<?php 
													if (isset($info['logo']) && $info['logo']!='') {
														echo $info['logo'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if (isset($info['logo']) && $info['logo']!='') {
														echo $info['logo'];
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
										<label class="col-md-2 control-label">Giấy phép kinh doanh:
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="gpkd" value="<?php if(isset($info['gpkd'])) echo $info['gpkd'];?>">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Giám đốc:
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="boss" value="<?php if(isset($info['boss'])) echo $info['boss'];?>">
											
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
										<label class="col-md-2 control-label">Email:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['email'])) echo $info['email'];?>" class="form-control" name="email">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Website:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['company_website'])) echo $info['company_website'];?>" class="form-control" name="company_website">
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
														if ($v['districtid']==$info['districtid']) {
															$selected = ' selected';
														}else{
															$selected = '';
														}
														echo '<option value="'.$v['districtid'].' " '.$selected.'>'.$v['name'].'</option>';
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
									<div class="form-group">
										<label class="col-md-2 control-label">Nghành nghề:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['location_of_hiring'])) echo $info['location_of_hiring'];?>" class="form-control" data-role="tagsinput" name="location_of_hiring" id="location_of_hiring">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Lĩnh vực hoạt động:
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['fields'])) echo $info['fields'];?>" class="form-control" name="fields">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mô tả:
										</label>
										<div class="col-md-5">
											<textarea name="description" rows="6" cols="54"><?php if(isset($info['description'])) echo $info['description'];?></textarea>
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
