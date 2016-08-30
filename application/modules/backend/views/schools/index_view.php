<div class="col-md-12" id="schools">

	
		<div class="portlet">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-users"></i> Quản lý trường học
				</div>
			</div>
			<div class="portlet-body">
					<?php 
					$this->load->view("globals/notify_action");
					 ?>
				<div class="form-group row-search">
	<form class="form-horizontal form-row-seperated" action="<?php if(isset($action_search)) echo $action_search; ?>" id="form_infolist" class="form-horizontal" method="GET">
					<div class="col-md-3 col-padding-10 margin-top7">
						<input type="text" class="form-control form-filter input-sm" name="info_title" placeholder="Tìm theo tên" value="">
					</div>
					<div class="col-md-2 col-padding-10 margin-top7">
						<select name="status_info" class="table-group-action-input form-control input-inline input-sm width-100 form-filter">
							<option value="all">Tất cả </option>
							<option value="1">Đang hiện</option>
							<option value="0">Đang ẩn </option>
						</select>
					</div>
					<div class="col-md-1 col-padding-10 margin-top7">
						<button type="submit" name="search" id="btn_search" class="btn btn-sm green table-group-action-submit"><i class="fa fa-search"></i> Tìm kiếm</button>
					</div>
					<div class="col-md-3 col-padding-10">
					</div>
	</form><!--END SEARCH-->
	<form class="form-horizontal form-row-seperated" action="<?php if(isset($action)) echo $action; ?>" id="form_infolist" class="form-horizontal" enctype="multipart/form-data" method="POST">
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
						<div class="actions btn-set btn-del">
							<a href="#" class="btn btn-default btn-sm red continue delete_info_select disabled" data-toggle="modal" data-target="#modal_del_all"><i class="fa fa-trash-o"></i> Xóa</a>
						</div>
						&nbsp;
						<div class="actions btn-set">
							<a href="<?php echo base_url()."$module/schools/add";?>" class="btn btn-success btn-sm green continue"><i class="fa fa-plus"></i> Thêm mới</a>
						</div>

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
								Tên trường
							</th>
							<th class="highlight">
								Email
							</th>
							<th class="hidden-xs">
								Thời gian tạo
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
								if(!empty($data)){
									foreach ($data as $k => $v) {?>
											<!-- Modal -->
											  <div class="modal fade" id="myModal<?php echo $v['id'];?>" role="dialog">
											    <div class="modal-dialog">
											    
											      <!-- Modal content-->
											      <div class="modal-content">
											        <div class="modal-header">
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          <h4 class="modal-title">Thông tin chi tiết : <?php if(isset($v['title'])) echo $v['title'];?></h4>
											        </div>
											        <div class="modal-body">
											        		<div class="col-md-6 table_td">Logo trường:</div>
													       <div class="col-md-6 table_td"><img style="    width: 60px;" src="<?php echo !empty($v['logo']) ? base_url().$v['logo'] : base_url().'public/'.$module.'/images/no_image.gif';?>"/></div>
													       <div class="clearfix"></div> 
													       <div class="col-md-6 table_td">Tên trường:</div>
													       <div class="col-md-6 table_td"><?php echo !empty($v['title']) ? $v['title'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
													       <div class="clearfix"></div>
													       <div class="col-md-6 table_td">Chuyên nghành:</div>
													       <div class="col-md-6 table_td"><?php echo !empty($v['specialized']) ? $v['specialized'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
													       <div class="clearfix"></div> 
													       <div class="col-md-6 table_td">Ngày thành lập:</div>
													       <div class="col-md-6 table_td"><?php echo !empty($v['founding']) ? $v['founding'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
													       <div class="clearfix"></div> 
													       <div class="col-md-6 table_td">Loại hình đào tạo:</div>
													       <div class="col-md-6 table_td"><?php echo !empty($v['type']) ? $v['type'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
													       <div class="clearfix"></div> 
													       <div class="col-md-6 table_td">Địa chỉ:</div>
													       <div class="col-md-6 table_td"><?php echo !empty($v['address']) ? $v['address'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
													       <div class="clearfix"></div> 
													       <div class="col-md-6 table_td">Thời gian khởi tạo:</div>
													       <div class="col-md-6 table_td"><?php echo date("h:i:s a d-m-Y",$v['create_time']);?></div>
													       <div class="clearfix"></div> 
													       <div class="col-md-6 table_td">Trạng thái:</div>
													       <div class="col-md-6 table_td"><?php 
													       	if ($v['status']==1) {
													       		echo '<span style="font-weight:bold;color:green">Đang hoạt động</span>';
													       	}else{
													       		echo '<span style="font-weight:bold;color:red">Ngừng hoạt động</span>';
													       	}
													        ?></div>
													       <div class="clearfix"></div> 
											        </div>
											        <div class="modal-footer">
											          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        </div>
											      </div>
											      
											    </div>
											  </div>
											  <!--END MODAL-->

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
											          <a href="<?php echo base_url()."$module/schools/del/".base64url_encode($v['id']);?>" class="btn green">Đồng ý</a>
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
													<?php echo ($v['title']) ? $v['title'] : '<span style="color:red">Chưa cập nhật</span>';?>
													
												</td>
												<td >
													<?php echo ($v['email']) ? $v['email'] : '<span style="color:red">Chưa cập nhật</span>';?>
													
												</td>
												<td class="hidden-xs">		
													<?php echo date("d-m-Y",$v['create_time']);?>
												</td>
												<td>
													<?php 
													if($v['status']==1){?>
															<a class="btn default btn-xs green-stripe active_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['status'];?>" style="width:110px;color: #333333;background-color: #e5e5e5;">Đang hiện</a>
													<?php }else{?>
															<a class="btn default btn-xs red-stripe active_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['status'];?>" style="width:110px;color: #333333;background-color: #e5e5e5;">Đang ẩn</a>
													<?php }
													 ?>
												</td>
												<td class="icon_btn">
													<a href="#" class="btn btn-xs green tooltips btn_lnc_fix" data-toggle="modal" data-target="#myModal<?php echo $v['id'];?>" data-placement="top" data-original-title="Xem chi tiết"><i class="fa fa-eye"></i> Xem chi tiết</a>
													<a href="<?php echo base_url()."$module/schools/edit/".base64url_encode($v['id']);?>" class="btn btn-xs yellow tooltips btn_lnc_fix" data-placement="top" data-original-title="{lang edit}"><i class="fa fa-edit"></i> Sửa</a>
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
					if(empty($data)){
						echo '<div class="alert alert-warning">
					<center> Không có bản ghi nào được tìm thấy ! </center>
				</div>';
					}
				 ?>
				

			</div>				
		</div>
	</form>
</div>