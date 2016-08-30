<div class="col-md-12" id="info_index">
		<form class="form-horizontal form-row-seperated" action="<?php echo base_url().'backend/infohomepage/updateInfo'; ?>" id="form_informationbasic" class="form-horizontal" enctype="multipart/form-data" method="POST">
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cog"></i> Cài đặt nội dung trang chủ
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
										<label class="col-md-2 control-label">Tiêu đề: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="business" value="<?php if(isset($info['title'])) echo $info['title'];?>">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nội dung: <span class="required">
										*</span>
										</label>
										<div class="col-md-10">
											<textarea class="form-control" name="content_editor_home" id="content_editor_home" cols="30" rows="6"><?php if (isset($info['content']) && $info['content']!='') {
												echo $info['content'];
											} ?></textarea>
											<script>
											CKEDITOR.replace( 'content_editor_home', {
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
