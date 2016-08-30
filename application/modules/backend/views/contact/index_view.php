<div class="col-md-12">

  <form class="form-horizontal form-row-seperated" action="<?php echo base_url().'backend/contact/' ?>" id="form_list_contact" class="form-horizontal" enctype="multipart/form-data" method="POST">
    <input type="hidden" value="deleteMultiID" name="action">
    <div class="portlet">

      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-envelope-o"></i> Quản lý liên hệ
        </div>
      </div>
      <div class="portlet-body">
          <?php 
          $this->load->view("globals/notify_action");
           ?>
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
            <!-- Modal Del All -->
            <div class="modal fade" id="modal_del_all" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận</h4>
                  </div>
                  <div class="modal-body">
                     <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa những tin liên hệ này ?</li>
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
              <a  class="btn btn-default btn-sm red continue disabled" data-toggle="modal" data-target="#modal_del_all"><i class="fa fa-trash-o"></i> Xóa</a>
            </div>
          </div>
        </div>
        <div class="table-scrollable">
          <table id="infolist-contact" data-lang="{$_GET['lang']}" class="table table-striped table-bordered table-advance table-hover ">
            <thead>
            <tr>
              <th width="20">
                <input type="checkbox" id="checkboxAll">
              </th>
              <th class="highlight">
                Email
              </th>
              <th width="200">
                Thời gian liên hệ
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
  
                    <?php if( $item['contact_type'] == 1 ){ ?>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal-user-<?php echo $item['id'];?>" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thông tin chi tiết liên hệ: </h4>
                              </div>
                              <div class="modal-body">
                                 <div class="col-md-4 table_td">Người liên hệ:</div>
                                 <div class="col-md-8 table_td"><?php echo !empty($item['customers']) ? $item['customers'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                                 <div class="clearfix"></div> 
                                 <div class="col-md-4 table_td">Email:</div>
                                 <div class="col-md-8 table_td"><?php echo !empty($item['email']) ? $item['email'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                                 <div class="clearfix"></div>
                                 <div class="col-md-4 table_td">Thời gian:</div>
                                 <div class="col-md-8 table_td"><?php echo date("h:i:s a d-m-Y",$item['create_time']);?></div>
                                 <div class="clearfix"></div>
                                 <div class="col-md-4 table_td">Nội dung liên hệ:</div>
                                 <div class="col-md-8 table_td">
                                   <textarea id="content" style="width:90%;" rows="5"><?php echo !empty($item['content']) ? $item['content'] : ''; ?></textarea>
                                 </div>
                                 <div class="clearfix"></div> 
                                 <div class="col-md-4 table_td">Trả lời:</div>
                                 <div class="col-md-8 table_td">
                                   <textarea id="reply-<?php echo $item['id']; ?>" placeholder="Nhập nội dung trả lời" style="width:90%;" rows="5"><?php echo !empty($item['reply']) ? $item['reply'] : ''; ?></textarea>
                                 </div>
                                 <div class="clearfix"></div> 
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="rep-contact-user" data-id="<?php echo $item['id']; ?>">Trả lời</button>
                                <button type="button" class="btn btn-default" id="close-contact-user" data-dismiss="modal">Đóng</button>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                        <!--END MODAL-->
                    <?php  }else{ ?>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal-schools-<?php echo $item['id'];?>" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thông tin chi tiết liên hệ: </h4>
                              </div>
                              <div class="modal-body">
                                 <div class="col-md-4 table_td">Người liên hệ:</div>
                                 <div class="col-md-8 table_td"><?php echo !empty($item['customers']) ? $item['customers'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                                 <div class="clearfix"></div>
                                 <div class="col-md-4 table_td">Email:</div>
                                 <div class="col-md-8 table_td"><?php echo !empty($item['email']) ? $item['email'] : '<span style="color:red">Chưa cập nhật</span>';?></div>
                                 <div class="clearfix"></div>
                                 <div class="col-md-4 table_td">Thời gian:</div>
                                 <div class="col-md-8 table_td"><?php echo date("h:i:s a d-m-Y",$item['create_time']);?></div>
                                 <div class="clearfix"></div>
                                 <div class="col-md-4 table_td">Nội dung: </div>
                                 <div class="col-md-8 table_td">
                                   <?php echo !empty($item['content']) ? $item['content'] : '';?>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="close-contact-schools" data-dismiss="modal">Đóng</button>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                        <!--END MODAL-->
                    <?php } ?>

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
                           <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa tin tức này ?</li>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url().'backend/contact/delcontact/'.$item['id']; ?>" class="btn green delete_news"  data-id="<?php echo $item['id']; ?>">Đồng ý</a>
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
                          <?php if(isset($item['email'])) echo $item['email'];?>
                          
                        </td>
                        <td class="hidden-xs">    
                          <?php if(isset($item['create_time'])) echo date("d-m-Y",$item['create_time']);?>
                        </td>
                        <td>
                          <?php 
                          if(isset($item['status']) && $item['status']==1){?>
                              <a class="btn default btn-xs green-stripe active_status active_fix" id="cont_status_<?php echo $item['id'] ?>" data-status="<?php if(isset($item['status'])) echo $item['status'];?>" style="width:73px;color: #333333;background-color: #e5e5e5;">Đã xem</a>
                          <?php }else{?>
                              <a class="btn default btn-xs red-stripe active_status active_fix" id="cont_status_<?php echo $item['id'] ?>" data-status="<?php if(isset($item['status'])) echo $item['status'];?>" style="width:73px;color: #333333;background-color: #e5e5e5;">Chưa xem</a>
                          <?php }
                           ?>

                        </td>
                        <td class="icon_btn">
                          <a href="javascript:;" class="btn btn-xs green tooltips btn_lnc_fix btn-show-contact" id="btn-show-contact-<?php echo $item['id']; ?>" data-id="<?php echo $item['id']; ?>" data-status="<?php if(isset($item['status'])) echo $item['status']; ?>" data-toggle="modal" data-target="<?php if($item['contact_type'] == 1) echo '#myModal-user-'.$item['id']; else echo '#myModal-schools-'.$item['id']; ?>" ><i class="fa fa-eye"></i> Xem chi tiết</a>
                          <a href="javascript:;" class="btn btn-xs red tooltips btn_lnc_fix"  data-toggle="modal" data-target="#confimModal<?php echo $item['id'];?>"><i class="fa fa-trash-o"></i> Xóa</a>
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
