<style>
		#product .thumbnail{
			margin-bottom: 0px
		}
</style>
<div class="col-md-12" id="product">

	
		<div class="portlet">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-users"></i> Quản lý sản phẩm
				</div>
			</div>
			<div class="portlet-body">
					<?php 
					$this->load->view("globals/notify_action");
					 ?>
				<div class="form-group row-search">
					<div class="col-md-3 col-padding-10">
						<input type="text" class="form-control form-filter input-sm" id="search_title" name="search_title" placeholder="Tìm theo tên sản phẩm.." value="<?php if(isset($stitle)) echo $stitle; ?>">
					</div>
					<!-- <div class='col-md-2 col-padding-10'>
								            <div class="form-group">
								                <div class="input-group">
								                    <input type="text" class="form-control input-sm" name="search_time" id="search_time" placeholder="Ngày đăng.." />
								                    <span class="input-group-addon">
								                        <span class="glyphicon glyphicon-calendar"></span>
								                    </span>
								                </div>
								            </div>
								        </div> -->
					<div class="col-md-1 col-padding-10">
						<a href="javascript:void(0)" id="button_search" class="btn btn-sm green"><i class="fa fa-search"></i> Tìm kiếm</a>
					</div>
					<div class="col-md-3 col-padding-10">
					</div>
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
									       <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa những sản phẩm này ?</li>
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
							<a href="<?php echo base_url()."$module/product/add";?>" class="btn btn-success btn-sm green continue"><i class="fa fa-plus"></i> Thêm mới</a>
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
								Ảnh đại diện
							</th>
							<th class="highlight">
								Mã sản phẩm
							</th>
							<th class="highlight">
								Tên sản phẩm
							</th>
							<th class="hidden-xs">
								Thời gian tạo
							</th>
							<th width="150">
								Trạng thái
							</th>
							<th width="150">
								Sản phẩm tiêu biểu
							</th>
							<th width="150">
								Sản phẩm mới
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
											  <div class="modal fade" id="confimModal<?php echo $v['id'];?>" role="dialog">
											    <div class="modal-dialog">
											    
											      <!-- Modal content-->
											      <div class="modal-content">
											        <div class="modal-header">
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          <h4 class="modal-title">Xác nhận</h4>
											        </div>
											        <div class="modal-body">
													       <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa sản phẩm này ?</li>
											        </div>
											        <div class="modal-footer">
											          <a href="<?php echo base_url()."$module/product/del/".base64url_encode($v['id']);?>" class="btn green">Đồng ý</a>
											          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
											        </div>
											      </div>
											      
											    </div>
											  </div>
											  <!--END MODAL-->

											  <!-- START TABLE -->
											<tr id="tr_<?php echo $v['id'];?>" data-key="<?php echo $v['id'];?>">
												<td style="vertical-align: middle;">
													<input type="checkbox" name="name_id[]" class="checkboxes"  value="<?php echo $v['id'];?>">
												</td>
												<td style="vertical-align: middle;">
													<img src="<?php 
													if (isset($v['thumbnail']) && $v['thumbnail']!='') {
														echo base_url().$v['thumbnail'];
													}else{
														echo base_url().'public/backend/images/no_image.gif';

													}
													 ?>" alt="<?php echo $v['title']; ?>" class="thumbnail" style="width: 100px;"/>
													
												</td>
												<td style="vertical-align: middle;">
													<?php echo $v['masanpham'];?>
													
												</td>
												<td style="vertical-align: middle;">
													<?php echo $v['title'];?>
													
												</td>
												<td class="hidden-xs" style="vertical-align: middle;">		
													<?php echo date("d-m-Y",$v['create_time']);?>
												</td>
												<td style="vertical-align: middle;">
													<?php 
													if($v['status']==1){?>
															<a class="btn default btn-xs green-stripe active_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['status'];?>" style="width:125px;color: #333333;background-color: #e5e5e5;">Đang hoạt động</a>
													<?php }else{?>
															<a class="btn default btn-xs red-stripe active_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['status'];?>" style="width:125px;color: #333333;background-color: #e5e5e5;">Ngừng hoạt động</a>
													<?php }
													 ?>
												</td>
												<td style="vertical-align: middle;">
													<?php 
													if($v['rating']==1){?>
															<a class="btn default btn-xs green-stripe rating_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['rating'];?>" style="width:125px;color: #333333;background-color: #e5e5e5;"><i class="fa fa-star-o" aria-hidden="true"></i> Đã chọn</a>
													<?php }else{?>
															<a class="btn default btn-xs red-stripe rating_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['rating'];?>" style="width:125px;color: #333333;background-color: #e5e5e5;"><i class="fa fa-star-o" aria-hidden="true"></i> Chưa chọn</a>
													<?php }
													 ?>
												</td>
												<td style="vertical-align: middle;">
													<?php 
													if($v['new']==1){?>
															<a class="btn default btn-xs green-stripe new_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['new'];?>" style="width:125px;color: #333333;background-color: #e5e5e5;"><i class="fa fa-star-o" aria-hidden="true"></i> Đã chọn</a>
													<?php }else{?>
															<a class="btn default btn-xs red-stripe new_status active_fix" data-id="<?php echo $v['id'];?>" data-status="<?php echo $v['new'];?>" style="width:125px;color: #333333;background-color: #e5e5e5;"><i class="fa fa-star-o" aria-hidden="true"></i> Chưa chọn</a>
													<?php }
													 ?>
												</td>
												<td class="icon_btn" style="vertical-align: middle;">
													
													<a href="<?php echo base_url()."$module/product/edit/".base64url_encode($v['id']);?>" class="btn btn-xs yellow tooltips btn_lnc_fix" data-placement="top" data-original-title="{lang edit}"><i class="fa fa-edit"></i> Sửa</a>
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