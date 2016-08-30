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
										<input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(isset($info['id'])) echo $info['id'];?>"/>
										<label class="col-md-2 control-label">Tên đăng nhập: <span class="required">
										*</span>
										</label>
										<div class="col-md-5 row_input_title">
											<input type="text" class="form-control maxlength-handler" maxlength="100" id="business" name="business" value="<?php if(isset($info['username'])) echo $info['username'];?>">
											<input type="hidden" maxlength="100" id="business_check" value="<?php if(isset($info['username'])) echo $info['username'];?>">
											<input type="hidden" id="hidden_business"/>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Email:<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="text" value="<?php if(isset($info['email'])) echo $info['email'];?>" class="form-control" name="email" id="email">
											<input type="hidden" value="<?php if(isset($info['email'])) echo $info['email'];?>" class="form-control" id="email_check">
											<input type="hidden" id="hidden_email"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mật khẩu:<span class="required">*
										</span>
										</label>
										<div class="col-md-5">
											<input type="password" value="" class="form-control " name="password" id="password">
											
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
