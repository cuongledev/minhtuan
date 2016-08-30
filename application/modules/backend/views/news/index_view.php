<div class="col-md-12">

  <form class="form-horizontal form-row-seperated" action="<?php echo base_url().'backend/news/' ?>" id="form_infolist_news" class="form-horizontal" enctype="multipart/form-data" method="POST">
    <input type="hidden" value="deleteMultiID" name="action">
    <div class="portlet">

      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-newspaper-o"></i> Quản lý tin tức
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
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận</h4>
                  </div>
                  <div class="modal-body">
                     <li class="list-group-item list-group-item-warning">Bạn chắc chắc muốn xóa những tin tức này ?</li>
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
              <a  class="btn btn-default btn-sm red continue delete_news_select disabled"  data-toggle="modal" data-target="#modal_del_all"><i class="fa fa-trash-o"></i> Xóa</a>
            </div>
            &nbsp;
            <div class="actions btn-set">
              <a href="<?php echo base_url().'backend/news/addnews'; ?>" class="btn btn-success btn-sm green continue"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>

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
                Tiêu đề
              </th>
              <th class="hidden-xs" width="200">
                Thời gian tạo
              </th>
              <th width="200">
                Trạng thái | Thứ tự
              </th>
              <th width="250">
                Hành động
              </th>
            </tr>
            </thead>
            <tbody>               
              <?php 
                if(!empty($list)){
                  foreach( $list as $item ) {?>
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
                                <a href="<?php echo base_url().'backend/news/delnews/'.$item['id']; ?>" class="btn green delete_news"  data-id="<?php echo $item['id']; ?>">Đồng ý</a>
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
                          <?php echo $item['title'];?>
                          
                        </td>
                        <td class="hidden-xs">    
                          <?php echo date("h:i:s a d-m-Y",$item['create_time']);?>
                        </td>
                        <td>
                          <?php 
                          if($item['status']==1){?>
                              <a class="btn default btn-xs green-stripe active_status active_fix" data-id="<?php echo $item['id'];?>" data-status="<?php echo $item['status'];?>" style="width:80px;color: #333333;background-color: #e5e5e5;">Đang hiện</a>
                              <input type="number"  class="btn default btn-xs active_fix edit_sort edit_sort_<?php echo $item['id']; ?>" data-id="<?php echo $item['id'];?>" style="width:60px;color: #333333;background-color: #e5e5e5;" value="<?php echo $item['sort']; ?>">
                          <?php }else{?>
                              <a class="btn default btn-xs red-stripe active_status active_fix" data-id="<?php echo $item['id'];?>" data-status="<?php echo $item['status'];?>" style="width:80px;color: #333333;background-color: #e5e5e5;">Đang ẩn</a>                              
                              <input type="number"  class="btn default btn-xs active_fix edit_sort edit_sort_<?php echo $item['id']; ?>" data-id="<?php echo $item['id'];?>" style="width:60px;color: #333333;background-color: #e5e5e5;" value="<?php echo $item['sort']; ?>">
                          <?php }
                           ?>
                        </td>
                        <td class="icon_btn">
                          <a href="<?php echo base_url().'n'.$item['id'].'-'.$item['alias'].'.htm'; ?>" class="btn btn-xs green tooltips btn_lnc_fix" target="_blank" ><i class="fa fa-eye"></i> Xem trang</a>
                          <a href="<?php echo base_url().'backend/news/addnews/'.$item['id']; ?>" class="btn btn-xs yellow tooltips btn_lnc_fix" data-placement="top" data-original-title="{lang edit}"><i class="fa fa-edit"></i> Sửa</a>
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