<div class="col-md-12" id="salary">
		<div class="portlet">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-users"></i> Quản lý mức lương
				</div>
			</div>
			<div class="portlet-body">
					<?php 
					$this->load->view("globals/notify_action");
					 ?>
				<div class="form-group row-search">
					<div class="actions btn-set btn-del">
						<a href="#" class="btn btn-default btn-sm red continue delete_info_select disabled" data-toggle="modal" data-target="#modal_del_all"><i class="fa fa-trash-o"></i> Xóa</a>
					</div>
					&nbsp;
					<div class="actions btn-set">
						<a href="<?php echo base_url()."$module/salary/add";?>" class="btn btn-success btn-sm green continue"><i class="fa fa-plus"></i> Thêm mới</a>
					</div>

					<form class="form-horizontal form-row-seperated" action="<?php echo base_url().'backend/salary'; ?>" id="form_infolist_salary" class="form-horizontal" enctype="multipart/form-data" method="POST">
					<div class="col-md-3 col-padding-10">
						<!-- Modal Del All -->
							  <div class="modal fade" id="modal_del_all" role="dialog">
							    <div class="modal-dialog">
							    
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Xác nhận</h4>
							        </div>
							        <div class="modal-body">
									       <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa những trường này ?</li>
							        </div>
							        <div class="modal-footer">
							          <button type="submit" class="btn green" name="confirm_all">Đồng ý</button>
							          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
							        </div>
							      </div>
							      
							    </div>
							  </div>
							  <!--END MODAL-->

					</div>
				</div>
				<div class="table-scrollable fixheight">
					<table id="infolist" class="table table-striped table-bordered table-advance table-hover ">
						<thead>
						<tr>
							<th width="20">
								<input type="checkbox" id="checkboxAll">
							</th>
							<th class="highlight">
								Tiêu đề
							</th>
							<th class="highlight">
								Mức lương
							</th>
							<th width="100">
								Trạng thái
							</th>
							<th width="250">
								Hành động
							</th>
						</tr>
						</thead>
						<tbody>								
							<?php 
								if(!empty($list)){
									foreach ($list as $k => $v) {?>
											  <!-- Modal -->
											  <div class="modal fade" id="confimModal<?php echo $v['id'];?>" role="dialog">
											    <div class="modal-dialog">
											    
											      <!-- Modal content-->
											      <div class="modal-content">
											        <div class="modal-header">
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          <h4 class="modal-title">Xác nhận</h4>
											        </div>
											        <div class="modal-body">
													       <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa trường này ?</li>
											        </div>
											        <div class="modal-footer">
											          <a href="<?php echo base_url()."$module/salary/del/".$v['id'];?>" class="btn green">Đồng ý</a>
											          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
											        </div>
											      </div>
											      
											    </div>
											  </div>
											  <!--END MODAL-->

											  <!-- START TABLE -->
											<tr id="tr_<?php echo $v['id'];?>" data-key="<?php echo $v['id'];?>">
												<td class="highlight">
													<input type="checkbox" name="name_id[]" class="checkboxes"  value="<?php echo $v['id'];?>">
												</td>
												<td >
													<?php echo ($v['salary_title']) ? $v['salary_title'] : '<span style="color:red">Chưa cập nhật</span>';?>
													
												</td>
												<td >
													<?php 
														if( $v['salary_to'] == '' && $v['salary_from'] != '') {
															echo 'Từ '.number_format($v['salary_from'], 0, ',', '.');
														}else if( $v['salary_from'] == '' && $v['salary_to'] != '') {
															echo 'Dưới '.number_format($v['salary_to'], 0, ',', '.');															
														}else if( $v['salary_from'] != '' && $v['salary_to'] != ''){
															echo number_format($v['salary_from'], 0, ',', '.').' - '.number_format($v['salary_to'], 0, ',', '.');
														}else{
															echo '<span style="color:red">Chưa cập nhật</span>';
														}
													?>
													
												</td>
												<td>
													<?php 
													if($v['status']==1){?>
															<a class="btn default btn-xs green-stripe active_status_salary active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['status'];?>" style="width:73px;color: #333333;background-color: #e5e5e5;">Đang hiện</a>
													<?php }else{?>
															<a class="btn default btn-xs red-stripe active_status_salary active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['status'];?>" style="width:73px;color: #333333;background-color: #e5e5e5;">Đang ẩn</a>
													<?php }
													 ?>
												</td>
												<td class="icon_btn">													
													<a href="<?php echo base_url()."$module/salary/add/".$v['id'];?>" class="btn btn-xs yellow tooltips btn_lnc_fix" data-placement="top" data-original-title="{lang edit}"><i class="fa fa-edit"></i> Sửa</a>
													<a  class="btn btn-xs red tooltips delete_info btn_lnc_fix"  data-toggle="modal" data-target="#confimModal<?php echo $v['id'];?>"><i class="fa fa-trash-o"></i> Xóa</a>
												</td>
											</tr>

									<?php }
								}
							 ?>
						</tbody>
					</table>
				</div>
				<center><?php if(isset($page_link)) echo $page_link; ?></center>
				<?php 
					if(empty($list)){
						echo '<div class="alert alert-warning">
					<center> Không có bản ghi nào được tìm thấy ! </center>
				</div>';
					}
				 ?>
				

			</div>				
		</div>
	</form>
</div>
<script>
	<?php if(isset($msg)){ ?>
		toastr["error"](<?php echo $msg['mess'] ?>, "Thông báo");
	<?php  } ?>

</script>