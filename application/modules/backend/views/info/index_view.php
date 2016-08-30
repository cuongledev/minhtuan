<div class="col-md-12" id="info_index">
		<form class="form-horizontal form-row-seperated" action="<?php echo base_url().'backend/info/updateInfo'; ?>" id="form_informationbasic" class="form-horizontal" enctype="multipart/form-data" method="POST">
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cog"></i> Cài đặt
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
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="business" value="<?php if(isset($info['name'])) echo $info['name'];?>">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Slogan: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="slogan" value="<?php if(isset($info['slogan'])) echo $info['slogan'];?>">
											
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Logo: </label>
										<div class="col-md-8">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail logo_thumbnail" style="width: 200px; height: 150px;">
													<img src="<?php 
													if ($info['logo']!='') {
														echo base_url().$info['logo'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if ($info['logo']!='') {
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
										<label class="control-label col-md-2">Favicon </label>
										<div class="col-md-8">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail favicon_thumbnail" style="width: 200px; height: 150px;">
													<img src="
													<?php 
													if ($info['icon']!='') {
														echo base_url().$info['icon'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>
													" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if ($info['icon']!='') {
														echo base_url().$info['icon'];
													}
													?>" name="hidden_img2" id="hidden_img2"/>
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-new">
													Chọn ảnh </span>
													<span class="fileinput-exists btn btn-success">
													Thay ảnh </span>
													<input type="file" name="favicon_news" class="favicon_news">
													</span>
													<button type="button" class="btn default fileinput-exists2">Xóa </button>
												</div>
											</div>	
										</div>
									</div>

									<div class="form-group get_id_province">
										<label class="control-label col-md-2">Tỉnh/TP<span class="required">*
										</span>
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
									<div class="form-group get_id_district "  id="show_district">
										<label class="control-label col-md-2">Quan/Huyen<span class="required">*
										</span>
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
										<label class="col-md-2 control-label">Địa chỉ<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['address'])) echo $info['address'];?>" class="form-control" name="address">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Số điện thoại<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['phone'])) echo $info['phone'];?>" class="form-control " name="phone">
											
										</div>
									</div>
									

									<div class="form-group">
										<label class="col-md-2 control-label">Email<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['email'])) echo $info['email'];?>" class="form-control" name="email">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Facebook
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['link_facebook'])) echo $info['link_facebook'];?>" class="form-control" name="link_facebook">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Google
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['link_google'])) echo $info['link_google'];?>" class="form-control" name="link_google">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Youtube
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['link_youtube'])) echo $info['link_youtube'];?>" class="form-control" name="link_youtube">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nhúng Link Google Map vào Website
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['link_google_map'])) echo $info['link_google_map'];?>" class="form-control" name="link_google_map">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Chủ tài khoản
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['bank_user'])) echo $info['bank_user'];?>" class="form-control" name="bank_user">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Số tài khoản
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['bank_code'])) echo $info['bank_code'];?>" class="form-control" name="bank_code">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Ngân hàng
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['bank_name'])) echo $info['bank_name'];?>" class="form-control" name="bank_name">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Chi nhánh
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['bank_chinhanh'])) echo $info['bank_chinhanh'];?>" class="form-control" name="bank_chinhanh">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mở tại
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['bank_tp'])) echo $info['bank_tp'];?>" class="form-control" name="bank_tp">
										</div>
									</div>
									<div class="col-md-2">
									</div>
									<div class="col-md-5">
										<hr>
									<h5>Cài đặt nội dung phần sidebar trong mục chi tiết sản phẩm</h5>
									<br>
									</div>
									

									<div class="form-group">
										<label class="col-md-2 control-label">Tiêu đề
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['title_sidebar'])) echo $info['title_sidebar'];?>" class="form-control" name="title_sidebar">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nội dung
										</label>
										<div class="col-md-5">
											<textarea class="form-control" cols="30" rows="6" name="content_sidebar" id="content_sidebar">
												<?php if(isset($info['content_sidebar'])) echo $info['content_sidebar'];?>
											</textarea>
										</div>
									</div>
									<div class="col-md-2">
									</div>
									<div class="col-md-5">
										<hr>
									<h5>Cài đặt ảnh liên hệ</h5>
									<br>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Ảnh liên hệ: </label>
										<div class="col-md-8">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail contact_thumbnail" style="width: 200px; height: 150px;">
													<img src="<?php 
													if ($info['contact_thumbnail']!='') {
														echo base_url().$info['contact_thumbnail'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if ($info['contact_thumbnail']!='') {
														echo base_url().$info['contact_thumbnail'];
													}
													?>" name="hidden_img_contact" id="hidden_img_contact"/>
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-exists btn btn-success">
													Thay ảnh </span>
													<input type="file" name="file_contact" class="file_contact"/>
													</span>
													<button type="button" class="btn default fileinput-exists3">Xóa </button>
												</div>
											</div>	
										</div>
									</div>
									<script>
											CKEDITOR.replace( 'content_sidebar', {
						                        // Define the toolbar groups as it is a more accessible solution.
						                        toolbarGroups: [
						                            {"name":"basicstyles","groups":["basicstyles"]},
						                            {"name":"links","groups":["links"]},
						                            {"name":"paragraph","groups":["list","blocks"]},
						                            {"name":"document","groups":["mode"]},
						                            {"name":"insert","groups":["insert"]},
						                            {"name":"styles","groups":["styles"]},
						                            {"name":"about","groups":["about"]}
						                        ],
						                        // Remove the redundant buttons from toolbar groups defined above.
						                        
						                    } );
											</script>
									
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
