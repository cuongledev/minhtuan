<div class="col-md-12" id="schools_edit">
		<form class="form-horizontal form-row-seperated" action="<?php echo (isset($action)) ? $action : ''; ?>" id="form_salary" class="form-horizontal" enctype="multipart/form-data" method="POST">
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
										<label class="col-md-2 control-label">Tiêu đề: <span class="required">
										*</span>
										</label>
										<div class="col-md-6 row_input_title">											
											<input type="text" class="form-control maxlength-handler" maxlength="100" name="salary_title" value="<?php if(isset($salary['salary_title'])) echo $salary['salary_title'];?>" required>											
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mức lương: <span class="required">
										*</span>
										</label>
										<div class="col-md-3 row_input_title">
											Từ: <input type="text" class="form-control maxlength-handler" maxlength="100" id="salary_from" name="salary_from" value="<?php if(isset($salary['salary_from'])) echo $salary['salary_from'];?>">
										</div>										
										<div class="col-md-3 row_input_title">											
											Tới: <input type="text" class="form-control maxlength-handler" maxlength="100" id="salary_to" name="salary_to" value="<?php if(isset($salary['salary_to'])) echo $salary['salary_to'];?>">
										</div>

									</div>
									<div class="form-group">
					                    <label class="col-sm-2 control-label">Trạng thái: </label>
					                    <div class="col-sm-3">
					                      <select class="form-control" name="salary_status" id="salary_status">
					                        <option value="1" <?php if(isset($salary) && $salary['status'] == 1) echo 'selected = selected'; ?> >Hiện</option>            
					                        <option value="0" <?php if(isset($salary) && $salary['status'] == 0) echo 'selected = selected'; ?> >Ẩn</option>                        
					                      </select>
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
