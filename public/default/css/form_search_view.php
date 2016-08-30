<div class="form-wrapper">
	<h3>Tìm kiếm công việc</h3>
	<form action="<?php if(isset($action_search)) echo $action_search; ?>" method="GET" role="form" class="explore-form">
		<div class="form-group">
			<input type="text" class="form-control" name="schools" placeholder="Bạn học ở đâu">
		</div>
		<div class="form-group">
			<select name="industry" id="input" class="form-control" required="required">
				<option value="" selected>Chọn ngành</option>
				<?php
				if (!empty($industry)) {
				 	foreach ($industry as $k=> $v) {?>
						<option value="<?php echo $v['id']; ?>"><?php echo $v['title']; ?></option>
				<?php	
					}   
				} 
				?>
			</select>
		</div>
		<div class="form-group row">
			<div class="col-xs-6">
				<select name="location" id="input" class="form-control" required="required">
					<option value="" selected>Vị trí</option>
					<?php 
						foreach ($province as $k=> $v) { ?>
							<option value="<?php echo $v['provinceid'] ?>"><?php echo $v['name']; ?></option>
					<?php
				}
					?>
				</select>
			</div>
			<div class="col-xs-6">
				<select name="salary" id="input" class="form-control" required="required">
					<option value="" selected>Mức lương</option>
					<?php 
					foreach ($salary as $k=> $v) {
						echo '<option value="'.$v['id'].'">'.$v['salary_title'].'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" name="search" class="btn btn-primary">Xem các công việc cho bạn</button>
		</div>
		<div class="form-group text-right">
			<a href="<?php echo base_url();?>students/keywords" class="inline-block searchby-keyword"><i class="fa fa-search"></i> Tìm theo từ khóa</a>
		</div>
	</form>
</div>