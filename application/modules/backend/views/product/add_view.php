<div class="col-md-12" id="product_index">
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
									<div class="form-group">
										<label class="col-md-2 control-label">Mã Sản Phẩm: 
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="masanpham" name="masanpham" value="<?php if(isset($info['masanpham'])) echo $info['masanpham'];?>">
										</div>
									</div>	
									<div class="form-group">
										<input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(isset($info['id'])) echo $info['id'];?>"/>
										<label class="col-md-2 control-label">Tiêu đề: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" id="title" name="title" value="<?php if(isset($info['title'])) echo $info['title'];?>">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Alias: <span class="required">
										*</span>
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="alias" name="alias" value="<?php if(isset($info['alias'])) echo $info['alias'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Giá bán ra: 
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="price" name="price" value="<?php if(isset($info['price'])) echo $info['price'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Giá cũ: 
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="saleoff" name="saleoff" value="<?php if(isset($info['saleoff'])) echo $info['saleoff'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Chọn danh mục:
										</label>
										<div class="col-md-5">
											<div class="panel panel-info" style="border-radius: 0px;">
										      <div class="panel-heading"></div>
										      <div class="panel-body" style="height: 110px;overflow-y: scroll;">
										      	<?php 
													dequyInProduct($menu,$parent=0,$text="------",$cate=array());
													?>
										  	</div>

										    </div>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Kích thước: 
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="dai" name="dai" value="" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Bảo hành: 
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="baohanh" name="baohanh" value="" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Tình trạng trong kho: 
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="tinhtrang" name="tinhtrang" value="<?php if(isset($info['tinhtrang'])) echo $info['tinhtrang'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mô tả ngắn: 
										</label>
										<div class="col-md-10">
											<textarea name="info_short" id="info_short" cols="30" rows="6" class="form-control ckeditor maxlength-handler"><?php if(isset($info['info_short'])) echo $info['info_short'];?></textarea>
											
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2 control-label">Thông số sản phẩm:
										</label>
										<div class="col-md-10">
											<textarea class="form-control ckeditor" name="content_editor_product" id="content_editor_product" cols="30" rows="6"><?php if (isset($info['full_info']) && $info['full_info']!='') {
												echo $info['full_info'];
											} ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mô tả sản phẩm:
										</label>
										<div class="col-md-10">
											<textarea class="form-control ckeditor" name="mota_content_editor_product" id="mota_content_editor_product" cols="30" rows="6"><?php if (isset($info['mota']) && $info['mota']!='') {
												echo $info['mota'];
											} ?></textarea>
											
										</div>
									</div>
									<!-- <div class="form-group">
										<label class="col-md-2 control-label">Link video Youtube: 
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="link_video" name="link_video" value="<?php if(isset($info['link_video'])) echo $info['link_video'];?>">(Chú ý: Copy đúng đường dẫn của video)
										</div>
									</div> -->
									<div class="form-group">
										<label class="col-md-2 control-label">Ảnh đại diện:
										</label>
										<div id="form_append_images" class="col-md-10" data-id="<?php if(isset($info['id']) && $info['id']!='') echo $info['id']; ?>">
											<div class="col-md-3 create_total" id="create9">
												<div class="fileinput" data-provides="fileinput">
													<div class="fileinput-new thumbnail logo_thumbnail9" style="width: 200px; height: 150px;">
														<img src="<?php 
															echo (isset($info['thumbnail']) && $info['thumbnail']!='') ? base_url().$info['thumbnail'] : base_url().'public/'.$module.'/images/no_image.gif'; 
														
														 ?>
														" alt="Avatar"/>
														<input type="hidden" value="<?php 
															echo (isset($info['thumbnail']) && $info['thumbnail']!='') ? $info['thumbnail'] : ''; 
														

														?>" name="hidden_img9" id="hidden_img9"/>
													</div>
													<div>
														<span class="btn default btn-file">
														<span class="fileinput-exists btn btn-success">
														Thay ảnh </span>
														<input type="file" name="file_logo9" class="file_logo9"/>
														</span>
														<button type="button" class="btn default fileinput-exists9">Xóa </button>
													</div>
												</div>
											</div>
											<!-- <button type="button" name="createxxx" id="createxxx" style="margin-top: 62px;margin-left: 20px;" class="btn btn-info">Thêm mới</button> -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Ảnh mặt sau sp:
										</label>
										<div id="form_append_images" class="col-md-10" data-id="<?php if(isset($info['id']) && $info['id']!='') echo $info['id']; ?>">
											<div class="col-md-3 create_total" id="create_after">
												<div class="fileinput" data-provides="fileinput">
													<div class="fileinput-new thumbnail logo_thumbnail_after" style="width: 200px; height: 150px;">
														<img src="<?php 
															echo (isset($info['thumbnail_after']) && $info['thumbnail_after']!='') ? base_url().$info['thumbnail_after'] : base_url().'public/'.$module.'/images/no_image.gif'; 
														
														 ?>
														" alt="Avatar"/>
														<input type="hidden" value="<?php 
															echo (isset($info['thumbnail_after']) && $info['thumbnail_after']!='') ? $info['thumbnail_after'] : ''; 
														

														?>" name="hidden_img_after" id="hidden_img_after"/>
													</div>
													<div>
														<span class="btn default btn-file">
														<span class="fileinput-exists btn btn-success">
														Thay ảnh </span>
														<input type="file" name="file_logo_after" class="file_logo_after"/>
														</span>
														<button type="button" class="btn default fileinput-exists_after">Xóa </button>
													</div>
												</div>
											</div>
											<!-- <button type="button" name="createxxx" id="createxxx" style="margin-top: 62px;margin-left: 20px;" class="btn btn-info">Thêm mới</button> -->
										</div>
									</div>

									<!-- <div class="form-group">
										<label class="col-md-2 control-label">Ảnh trình diễn:
										</label>
										<?php 
										if (isset($info['images']) && $info['images']!='') {
											$images = json_decode($info['images'],true);
										}
										 ?>
										<div id="form_append_images" class="col-md-10" data-id="<?php if(isset($info['id']) && $info['id']!='') echo $info['id']; ?>">
										<?php 
										for ($i=0; $i < 4 ; $i++) { ?>
											<div class="col-md-3 create_total" id="create<?php echo $i+1; ?>">
												<div class="fileinput" data-provides="fileinput">
													<div class="fileinput-new thumbnail logo_thumbnail<?php echo $i+1; ?>" style="width: 200px; height: 150px;">
														<img src="<?php 
														
															echo (isset($images[$i]) && $images[$i]!='') ? base_url().$images[$i] : base_url().'public/'.$module.'/images/no_image.gif';
														
														 ?>
														" alt="Avatar"/>
														<input type="hidden" value="<?php 
														
															echo (isset($images[$i]) && $images[$i]!='') ? $images[$i] : '';
														
									
														?>" name="hidden_img<?php echo $i+1; ?>" id="hidden_img<?php echo $i+1; ?>"/>
													</div>
													<div>
														<span class="btn default btn-file">
														<span class="fileinput-exists btn btn-success">
														Thay ảnh </span>
														<input type="file" name="file_logo<?php echo $i+1; ?>" class="file_logo<?php echo $i+1; ?>"/>
														</span>
														<button type="button" class="btn default fileinput-exists<?php echo $i+1; ?>">Xóa </button>
													</div>
												</div>
											</div>
									
										<?php 
										}
										 ?>
											<button type="button" name="createxxx" id="createxxx" style="margin-top: 62px;margin-left: 20px;" class="btn btn-info">Thêm mới</button>
										</div>
									</div> -->
									<div class="form-group">
											<label class="col-md-2 control-label">Thêm ảnh sản phẩm
											</label>
											<div id="createColor" class="col-md-10">
												
												<!-- <div class="fileinput" data-provides="fileinput">
													<input type="color" name="colorImage" id="colorImage" />
													<div class="fileinput-new thumbnail logo_thumbnail9" style="width: 110px; height: 60px;">
														<img src="<?php 
															echo (isset($info['thumbnail']) && $info['thumbnail']!='') ? base_url().$info['thumbnail'] : base_url().'public/'.$module.'/images/no_image.gif'; 
														
														 ?>
														" alt="Avatar"/>
														<input type="hidden" value="<?php 
															echo (isset($info['thumbnail']) && $info['thumbnail']!='') ? $info['thumbnail'] : ''; 
														
												
														?>" name="hidden_img9" id="hidden_img9"/>
													</div>
													<div>
														<span class="btn default btn-file">
														<span class="fileinput-exists btn btn-success">
														Thay ảnh </span>
														<input type="file" name="file_logo9" class="file_logo9"/>
														</span>
														<button type="button" class="btn default fileinput-exists9">Xóa </button>
													</div>
												</div> -->

												<!-- <button type="button" name="createxxx" id="createxxx" style="margin-top: 62px;margin-left: 20px;" class="btn btn-info">Thêm mới</button> -->
											</div>
										<label for="" class="col-md-2"></label>
										<div class="col-md-10">
											<button type="button" id="addColor" class="btn btn-info">Thêm </button>
										</div>
									</div>
									
									<!-- <div class="form-group">
										<label class="col-md-2 control-label">Sản phẩm liên quan:
										</label>
										<div class="col-md-10">
											<div class="panel panel-info" style="border-radius: 0px;">
										      <div class="panel-heading"></div>
										      <div class="panel-body" style="height: 170px;overflow-y: scroll;" -->
										      	<?php 
										      	/*if (isset($relax) && $relax!='') {
										      		foreach ($relax as $key => $value) {
														echo '<p><input type="checkbox" name="relax[]" value="'.$value['id'].'" /> '.$value['title'].'</p>';
													}
										      	}*/
													
												?>
										  	<!-- </div>

										    </div>	
										</div>
									</div> -->
									

									
									
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
