<div class="col-md-12">

  <form class="form-horizontal form-row-seperated" action="<?php echo base_url().'backend/students/' ?>" id="form_infolist_students" class="form-horizontal" enctype="multipart/form-data" method="POST">    
    <div class="portlet">

      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-users"></i> Quản lý sinh viên
        </div>
      </div>
      <div class="portlet-body">
          <?php 
          $this->load->view("globals/notify_action");
           ?>

        <div class="form-group row-search">
          <form class="form-horizontal form-row-seperated" action="<?php echo base_url().'backend/students/search'; ?>" id="form_search_student" class="form-horizontal" method="get">
            <div class="col-md-3 col-padding-10 margin-top7">
              <input type="text" class="form-control form-filter input-sm" name="sv_name" id="sv_name" placeholder="Tìm theo tên" value="">
            </div>
            <div class="col-md-2 col-padding-10 margin-top7">
              <select name="sv_status" id="sv_status" class="table-group-action-input form-control input-inline input-sm width-100 form-filter">
                <option value="all">Tất cả </option>
                <option value="1">Đang hiện</option>
                <option value="0">Đang ẩn</option>
              </select>
            </div>
            <div class="col-md-1 col-padding-10 margin-top7">
              <button type="button" id="btn_search_student" class="btn btn-sm green table-group-action-submit"><i class="fa fa-search"></i> Tìm kiếm</button>
            </div>
            <div class="col-md-3 col-padding-10">
            </div>
          </form><!--END SEARCH-->
          
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
                         <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa những trường này?</li>
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
              <a href="<?php echo base_url()."$module/students/add";?>" class="btn btn-success btn-sm green continue"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>

          </div>
        </div>

        <div class="form-group row-search">
          <div class="col-md-3 col-padding-10">
            <!-- <input type="text" class="form-control form-filter input-sm" name="info_title" placeholder="Tìm theo tên" value=""> -->
          </div>
          <div class="col-md-2 col-padding-10">
            <!-- <select name="status_info" class="table-group-action-input form-control input-inline input-sm width-100 form-filter">
              <option value="all">Tất cả </option>
              <option value="show">Đang hiện</option>
              <option value="hide">Đang ẩn </option>
            </select> -->
          </div>
          <div class="col-md-1 col-padding-10">
            <!-- <button id="btn_search" class="btn btn-sm green table-group-action-submit"><i class="fa fa-search"></i> Tìm kiếm</button> -->
          </div>
          <div class="col-md-3 col-padding-10">
          </div>
          <div class="col-md-3 col-padding-10">

          </div>
        </div>
        <div class="table-scrollable">
          <table id="infolist" data-lang="{$_GET['lang']}" class="table table-striped table-bordered table-advance table-hover ">
            <thead>
            <tr>
              <th width="20">
                <input type="checkbox" id="checkboxAll">
              </th>
              <th class="highlight">
                Tên sinh viên
              </th>
              <th class="hidden-xs" width="200">
                Thời gian tạo
              </th>
              <th width="200">
                Trạng thái
              </th>
              <th width="300">
                Hành động
              </th>
            </tr>
            </thead>
            <tbody>               
              <?php 
                if(!empty($list)){
                  foreach( $list as $item ) {?>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="myModal<?php echo $item['id'];?>" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Thông tin chi tiết sinh viên</h4>
                            </div>
                            <div class="modal-body">
                               <div class="col-md-6 table_td">Họ tên:</div>
                               <div class="col-md-6 table_td"><?php echo !empty($item['last_name']) ? $item['first_name'].' '.$item['last_name'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                               <div class="clearfix"></div> 
                               <div class="col-md-6 table_td">Email:</div>
                               <div class="col-md-6 table_td"><?php echo !empty($item['email']) ? $item['email'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                               <div class="clearfix"></div>
                               <div class="col-md-6 table_td">Số điện thoại:</div>
                               <div class="col-md-6 table_td"><?php echo !empty($item['phone']) ? $item['phone'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                               <div class="clearfix"></div>
                               <div class="col-md-6 table_td">Địa chỉ:</div>
                               <div class="col-md-6 table_td"><?php echo !empty($item['address']) ? $item['address'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                               <div class="clearfix"></div> 
                               <div class="col-md-6 table_td">Loại hình công việc:</div>
                               <div class="col-md-6 table_td"><?php if($item['work_time'] == 1) { echo 'Toàn thời gian';} elseif($item['work_time'] == 2){ echo 'Bán thời gian'; }elseif($item['work_time'] == 3){ echo 'Thực tập'; }else{ echo '<span style="color:red">Chưa cập nhật</span>'; }?></div>
                               <div class="clearfix"></div> 
                               <div class="col-md-6 table_td">Địa điểm làm việc:</div>
                               <div class="col-md-6 table_td">
                                <?php                                 
                                  foreach( $province as $prov ) {
                                    if( $item['work_location'] == $prov['provinceid'] ){
                                        echo $prov['name'];
                                    }
                                  }
                                ?>
                              </div>
                               <div class="clearfix"></div> 

                               <div class="col-md-6 table_td">Ngành nghề:</div>
                               <div class="col-md-6 table_td">
                                <?php 
                                  foreach( $industry as $ind ) {
                                    if( $item['jobcategory'] == $ind['id'] ){
                                        echo $ind['title'];
                                    }
                                  }
                                ?>
                              </div>
                               <div class="clearfix"></div> 
                               <div class="col-md-6 table_td">Trạng thái:</div>
                               <div class="col-md-6 table_td">
                                <?php 
                                  if ($item['status']==1) {
                                    echo '<span style="font-weight:bold;color:green">Đang hoạt động</span>';
                                  }else{
                                    echo '<span style="font-weight:bold;color:red">Ngừng hoạt động</span>';
                                  }
                                ?>
                              </div>
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
                        <div class="modal fade" id="confimModal<?php echo $item['id'];?>" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Xác nhận</h4>
                              </div>
                              <div class="modal-body">
                                 <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa hồ sơ này?</li>
                              </div>
                              <div class="modal-footer">
                                <a href="<?php echo base_url().'backend/students/del/'.$item['id']; ?>" class="btn green delete_news"  data-id="<?php echo $item['id']; ?>">Đồng ý</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      <tr id="tr_<?php echo $item['id'];?>" data-key="<?php echo $item['id'];?>">
                        <td class="highlight">
                          <input type="checkbox" name="name_id[]" class="checkboxes"  value="<?php echo $item['id'];?>">
                        </td>
                        <td >
                          <?php echo $item['first_name'].' '.$item['last_name']; ?>
                          
                        </td>
                        <td class="hidden-xs">    
                          <?php //echo date("h:i:s a d-m-Y",$item['create_time']);?>
                        </td>
                        <td>
                          <?php 
                          if($item['status']==1){?>
                              <a class="btn default btn-xs green-stripe active_fix active_status" data-id="<?php echo $item['id'];?>" data-status="<?php echo $item['status'];?>" style="width:110px;color: #333333;background-color: #e5e5e5;">Đang hiện</a>                              
                          <?php }else{?>
                              <a class="btn default btn-xs red-stripe active_fix active_status" data-id="<?php echo $item['id'];?>" data-status="<?php echo $item['status'];?>" style="width:110px;color: #333333;background-color: #e5e5e5;">Đang ẩn</a>
                          <?php }
                           ?>
                        </td>
                        <td class="icon_btn">
                          <a href="#" class="btn btn-xs green tooltips btn_lnc_fix" data-placement="top" data-original-title="Xem chi tiết" data-toggle="modal" data-target="#myModal<?php echo $item['id'];?>"><i class="fa fa-eye"></i> Xem chi tiết</a>
                          <a href="<?php echo base_url().'backend/students/add/'.$item['id']; ?>" class="btn btn-xs yellow tooltips btn_lnc_fix" data-placement="top" data-original-title="{lang edit}"><i class="fa fa-edit"></i> Sửa</a>
                          <a href="javascript:;" class="btn btn-xs red tooltips btn_lnc_fix" data-toggle="modal" data-target="#confimModal<?php echo $item['id'];?>" ><i class="fa fa-trash-o"></i> Xóa</a>
                        </td>
                      </tr>
                  <?php }
                }
               ?>
            </tbody>
          </table>
        </div>
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