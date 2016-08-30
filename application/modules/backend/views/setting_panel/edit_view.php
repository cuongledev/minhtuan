<div class="col-md-12" id="setting_panel">
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
												<canvas class="fileinput-new thumbnail logo_thumbnail" id="thumbnail_canvas" style="width: 675px;height: 350px;overflow: hidden;">
													<img src="<?php 
													if (isset($info['logo']) && $info['logo']!='') {
														echo base_url().$info['logo'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar" style="height: inherit"/>
													<input type="hidden" value="<?php 
													if (isset($info['logo']) && $info['logo']!='') {
														echo base_url().$info['logo'];
													}
													?>" name="hidden_img1" id="hidden_img1"/>
												</canvas>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-exists btn btn-success">
													Thay ảnh </span>
													<input type="file" name="file_logo" class="file_logo"/>
													</span>
													<button type="button" class="btn default fileinput-exists1">Xóa </button>
												</div>
												<script>
													/*var c = document.getElementById("thumbnail_canvas");
													var ctx = c.getContext("2d");
													ctx.beginPath();
													ctx.moveTo(0, 0);
													ctx.lineTo(50, 100);
													ctx.stroke();*/
												</script>
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
