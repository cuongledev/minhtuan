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
									
									
									<div class="form-group">
										<label class="col-md-2 control-label">Email:<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['email'])) echo $info['email'];?>" class="form-control" name="email" id="email">
											<input type="hidden" value="<?php if(isset($info['id'])) echo $info['id'];?>" class="form-control" id="hidden_id" name="hidden_id">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nghề Nghiệp:<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['job'])) echo $info['job'];?>" class="form-control" name="job" id="job">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Nơi làm việc:<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['working_location'])) echo $info['working_location'];?>" class="form-control" name="working_location" id="working_location">
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
