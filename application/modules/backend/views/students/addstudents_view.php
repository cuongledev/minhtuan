<div class="col-md-12">
    <form class="form-horizontal form-row-seperated" action="<?php echo base_url()."$module/";?>students/add/<?php if(isset($id)) echo $id; ?>" id="form_informationbasic" class="form-horizontal form_addsv" enctype="multipart/form-data" method="POST">
      <div class="portlet">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-cog"></i> Cài đặt hồ sơ sinh viên
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
            <div class="tab-content no-space sv-tab-content" id="information">
              <div class="page-header">
                <h4><i class="fa fa-info-circle"></i> THÔNG TIN CƠ BẢN <small></small></h4>
              </div>
              <div class="tab-pane active col-sm-6">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Họ sinh viên <span class="required">
                    *</span>
                    </label>
                    <div class="col-sm-6 row_input_title">
                      <input required type="text" class="form-control maxlength-handler" maxlength="100" name="sv_firstname" value="<?php if(isset($student['first_name'])) echo $student['first_name'];?>">                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Tên sinh viên <span class="required">
                    *</span>
                    </label>
                    <div class="col-sm-6 row_input_title">
                      <input required type="text" class="form-control maxlength-handler" maxlength="100" name="sv_lastname" value="<?php if(isset($student['last_name'])) echo $student['last_name'];?>">                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label" id="sv_email2">Email<span class="required">
                    *</span></label>
                    <div class="col-sm-6">
                      <input type="email" class="form-control" name="sv_email" id="sv_email" value="<?php if(isset($student)) echo $student['email']; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Mật khẩu<span class="required">
                    *</span></label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" name="sv_pass" value="<?php if(isset($student)) echo $student['password']; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Số điện thoại<span class="required">
                    *</span></label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="sv_phone" value="<?php if(isset($student)) echo $student['phone']; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Địa chỉ<span class="required">
                    *</span></label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="sv_address" value="<?php if(isset($student)) echo $student['address']; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label" >Loại hình công việc</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="sv_work_type">
                        <option value="1">Toàn thời gian</option>
                        <option value="2">Bán thời gian</option>
                        <option value="3">Thực tập</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label" >Địa điểm làm việc</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="sv_work_location">
                        <?php foreach($province as $item_province) { ?>
                          <option value="<?php echo $item_province['provinceid']; ?>"> <?php echo $item_province['name']; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label" >Ngành nghề</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="sv_work_category">
                        <?php foreach($industry as $item_industry) { ?>
                          <option value="<?php echo $item_industry['id']; ?>"> <?php echo $item_industry['title']; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label" >Giới thiệu bản thân</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="cv_about_me"><?php if(isset($student)) echo $student['about_me']; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Trạng thái</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="sv_status" id="sv_status">
                        <option value="1" <?php if(isset($student) && $student['status'] == 1) echo 'selected = selected'; ?> >Hiện</option>            
                        <option value="0" <?php if(isset($student) && $student['status'] == 0) echo 'selected = selected'; ?> >Ẩn</option>                        
                      </select>
                    </div>
                  </div>
                  
                </div>
              </div>
              <!-- <div id="sv-avatar" class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-md-2">Ảnh đại diện: </label>
                    <div class="col-md-8">
                      <div class="fileinput" data-provides="fileinput">
                        <div class="fileinput-new thumbnail thumbnail_news" style="width: 200px; height: 150px;">
                          <img src="<?php 
                          if( isset($news) && $news['image'] != '' ) {
                            echo base_url().'public/'.$module.'/images/quandv/'.$news['image'];
                          }else{
                            echo base_url().'public/'.$module.'/images/no_image.gif';
                          } ?>" alt="Avatar"/>
                          <input type="hidden" value="<?php
                          if( isset($news) && $news['image'] != '' ) {
                            echo $news['image'];
                          }
                          ?>" name="avatarOld" id="avatarOld"/>
                        </div>
                        <div>
                          <span class="btn default btn-file">
                          <span class="fileinput-exists btn btn-success">
                          Thay ảnh </span>
                          <input type="file" name="sv_avatar" class="avatar_news"/>
                          </span>
                          <button type="button" class="btn default fileinput-exists1">Xóa </button>
                        </div>
                      </div>  
                    </div>
                  </div>
              </div> -->
            </div>
            </div>
            <div class="clearfix"></div>

            <div class="tab-content no-space  sv-tab-content" id="edu_skills">
              <div class="page-header">
                <h4><i class="fa fa-info-circle"></i> HỌC VẤN VÀ KỸ NĂNG<small></small></h4>
              </div>
              <div class="tab-pane active">
                <div class="form-body">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Học vấn</label>
                      <div class="col-sm-6">
                        <ul class="list-group">
                          <?php if( isset($student['education']) &&  $student['education'] != '' ){ $edu = json_decode($student['education'], true); foreach( $edu as $edu_key => $edu_item ) { ?>
                          <li class="list-group-item"><?php echo $edu_item['schools']; ?><span class="icon-left" style="float:right;"> <i class="glyphicon glyphicon-edit item-cursor" data-toggle="modal" data-target=".modal-sv-<?php echo $edu_key; ?>"></i> <i class="glyphicon glyphicon-trash item-cursor"></i> </span>  </li> 

                          <div class="modal fade modal-sv-<?php echo $edu_key; ?>" >
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <h4 class="modal-title">Chỉnh sửa thông tin học vấn</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal form-row-seperated" action="" id="form_informationbasic" class="form-horizontal" method="POST">
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên trường</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" value="<?php echo $edu_item['schools']; ?>" >
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Loại bằng</label>
                                        <div class="col-sm-6">
                                          <select class="form-control" name="degree" id="degree">
                                            <option value="1" <?php if($edu_item['degree'] == 1) echo 'selected = selected'; ?> >Đại học</option>            
                                            <option value="2" <?php if($edu_item['degree'] == 2) echo 'selected = selected'; ?> >Cao đẳng</option>                        
                                            <option value="3" <?php if($edu_item['degree'] == 3) echo 'selected = selected'; ?> >Trung cấp</option>                        
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Chuyên ngành</label>
                                        <div class="col-sm-6">
                                          <select class="form-control" name="status" id="status">
                                            
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Điểm trung bình</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" value="<?php echo $edu_item['gpa']; ?>" >
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Thời gian tốt nghiệp</label>
                                        <div class="col-sm-3">
                                          <select class="form-control" name="status" id="status">
                                                                                        
                                          </select>
                                        </div>

                                        <div class="col-sm-3">
                                          <select class="form-control" name="status" id="status">
                                                                                        
                                          </select>
                                        </div>
                                      </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

                          <?php } } ?>
                        </ul>
                      </div>
                    </div>

                  <div class="tab-pane active">
                    <div class="form-body">
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Kỹ năng</label>
                      <div class="col-sm-6">
                        <ul class="list-group">
                          <?php if( isset($student['skill']) && $student['skill'] != '' ){ $skill = json_decode($student['skill'], true); foreach( $skill as $skill_key => $skill_item ) { ?>
                          <li class="list-group-item"><?php echo $skill_item; ?><span class="icon-left" style="float:right;"> <i class="glyphicon glyphicon-trash item-cursor"></i> </span>  </li> 
                          <?php } } ?>
                        </ul>
                      </div>
                    </div>
            
                    </div>
                  </div>

                  <div class="tab-pane active">
                    <div class="form-body">
                    <div class="form-group">
                    <label class="col-sm-2 control-label">Ngoại ngữ</label>
                      <div class="col-sm-6">
                        <ul class="list-group">
                          <?php if( isset($student['languages']) && $student['languages'] != ''  ){ $lang = json_decode($student['languages'], true); foreach( $lang as $lang_key => $lang_item ) { 
                              if( $lang_item['lang_level'] == 0 ) {
                          ?>
                            <li class="list-group-item"><?php echo $lang_item['lang'].' (Cơ bản)'; ?><span class="icon-left" style="float:right;"> <i class="glyphicon glyphicon-trash item-cursor"></i> </span>  </li> 
                          <?php }else if( $lang_item['lang_level'] == 1 ) { ?>
                            <li class="list-group-item"><?php echo $lang_item['lang'].' (Trung bình)'; ?><span class="icon-left" style="float:right;"> <i class="glyphicon glyphicon-trash item-cursor"></i> </span>  </li> 
                          <?php }else if( $lang_item['lang_level'] == 2 ) { ?>
                            <li class="list-group-item"><?php echo $lang_item['lang'].' (Thành thạo)'; ?><span class="icon-left" style="float:right;"> <i class="glyphicon glyphicon-trash item-cursor"></i> </span>  </li> 
                          <?php } } } ?>
                        </ul>
                      </div>
                    </div>
            
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="tab-content no-space  sv-tab-content" id="experience">
              <div class="page-header">
                <h4><i class="fa fa-info-circle"></i> KINH NGHIỆM LÀM VIỆC <small></small></h4>
              </div>
              <div class="tab-pane active">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Kinh nghiệm làm việc</label>
                      <div class="col-sm-6">
                        <ul class="list-group">
                          <?php if( isset($student['work_exprience']) ){ $exp = json_decode($student['work_exprience'], true); foreach( $exp as $exp_key => $exp_item ) { ?>
                          <li class="list-group-item"><?php echo $exp_item['company']; ?><span class="icon-left" style="float:right;"> <i class="glyphicon glyphicon-edit item-cursor" data-toggle="modal" data-target=".modal-exp-<?php echo $exp_key; ?>"></i> <i class="glyphicon glyphicon-trash item-cursor"></i> </span>  </li> 

                          <div class="modal fade modal-exp-<?php echo $exp_key; ?>" >
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <h4 class="modal-title">Chỉnh sửa thông tin</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="form-horizontal form-row-seperated" action="" id="form_informationbasic" class="form-horizontal" method="POST">
                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Tên công ty</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" value="<?php echo $exp_item['company']; ?>" >
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Chức vụ</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" value="<?php echo $exp_item['position']; ?>" >
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Thời gian bắt đầu</label>
                                        <div class="col-sm-3">
                                          <select class="form-control" name="exp_start_time" id="exp_start_time">
                                                                                        
                                          </select>
                                        </div>

                                        <div class="col-sm-3">
                                          <select class="form-control" name="exp_start_time" id="exp_start_time">
                                                                                        
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Thời gian kết thúc</label>
                                        <div class="col-sm-3">
                                          <select class="form-control" name="exp_end_time" id="exp_end_time">
                                                                                        
                                          </select>
                                        </div>

                                        <div class="col-sm-3">
                                          <select class="form-control" name="exp_end_time" id="exp_end_time">
                                                                                        
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Hiện tại vẫn đang làm việc</label>
                                        <div class="col-sm-3">
                                          <input type="checkbox" name="" value="1" >
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-4 control-label">Mô tả công việc</label>
                                        <div class="col-sm-6">
                                          <textarea class="form-control" name="exp_desc"><?php if(isset($exp_item['description'])) echo $exp_item['description']; ?></textarea>
                                        </div>
                                      </div>

                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

                          <?php } } ?>
                        </ul>
                      </div>
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
