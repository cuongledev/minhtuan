<div class="col-md-12" id="category_index">
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
										<label class="col-md-2 control-label">Chọn danh mục:
										</label>
										<div class="col-md-5">
											<select name="parent_id" id="" class="form-control">
												<option value="0">--Danh mục gốc</option>
							                    <?php
							                    if($this->uri->segment(3)=='add'){
							                    	callMenu($menu);
							                    }else{
							                    	callMenu($menu,0,"--",$info['parent_id']);
							                    }
							                    
							                    ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nội dung:
										</label>
										<div class="col-md-10">
											<textarea class="form-control" name="content_editor_category" id="content_editor_category" cols="30" rows="6"><?php if (isset($info['info']) && $info['info']!='') {
												echo $info['info'];
											} ?></textarea>
											<script>
											CKEDITOR.replace( 'content_editor_category', {
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
									<div class="form-group">
										<label class="col-md-2 control-label">Ảnh đại diện:
										</label>
										<div class="col-md-5">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail logo_thumbnail" style="width: 200px; height: 150px;">
													<img src="<?php 
													if (isset($info['thumbnail']) && $info['thumbnail']!='') {
														echo base_url().$info['thumbnail'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if (isset($info['thumbnail']) && $info['thumbnail']!='') {
														echo base_url().$info['thumbnail'];
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
										<label class="col-md-2 control-label">Tiêu đề banner 1: <span class="required">
										*</span>
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="title_banner1" name="title_banner1" value="<?php if(isset($info['title_banner1'])) echo $info['title_banner1'];?>">
											<label for="">Thêm cặp thẻ span để chữ có mầu đen</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Link banner 1: <span class="required">
										*</span>
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="link_banner1" name="link_banner1" value="<?php if(isset($info['link_banner1'])) echo $info['link_banner1'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Ảnh Banner 1:
										</label>
										<div class="col-md-5">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail logo_thumbnail1" style="width: 200px; height: 150px;">
													<img src="<?php 
													if (isset($info['banner1']) && $info['banner1']!='') {
														echo base_url().$info['banner1'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if (isset($info['banner1']) && $info['banner1']!='') {
														echo base_url().$info['banner1'];
													}
													?>" name="hidden_img2" id="hidden_img2"/>
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-exists2 btn btn-success">
													Thay ảnh </span>
													<input type="file" name="file_logo2" class="file_logo2"/>
													</span>
													<button type="button" class="btn default fileinput-exists2">Xóa </button>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Tiêu đề banner 2: <span class="required">
										*</span>
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="title_banner2" name="title_banner2" value="<?php if(isset($info['title_banner2'])) echo $info['title_banner2'];?>">
											<label for="">Thêm cặp thẻ span để chữ có mầu đen</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Link banner 2: <span class="required">
										*</span>
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control maxlength-handler" id="link_banner2" name="link_banner2" value="<?php if(isset($info['link_banner2'])) echo $info['link_banner2'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Ảnh Banner 2:
										</label>
										<div class="col-md-5">
											<div class="fileinput" data-provides="fileinput">
												<div class="fileinput-new thumbnail logo_thumbnail2" style="width: 200px; height: 150px;">
													<img src="<?php 
													if (isset($info['banner2']) && $info['banner2']!='') {
														echo base_url().$info['banner2'];
													}else{
														echo base_url().'public/'.$module.'/images/no_image.gif';
													} ?>" alt="Avatar"/>
													<input type="hidden" value="<?php 
													if (isset($info['banner2']) && $info['banner2']!='') {
														echo base_url().$info['banner2'];
													}
													?>" name="hidden_img3" id="hidden_img3"/>
												</div>
												<div>
													<span class="btn default btn-file">
													<span class="fileinput-exists btn btn-success">
													Thay ảnh </span>
													<input type="file" name="file_logo3" class="file_logo3"/>
													</span>
													<button type="button" class="btn default fileinput-exists3">Xóa </button>
												</div>
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
