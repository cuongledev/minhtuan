<div class="col-md-12">
    <form class="form-horizontal form-row-seperated" action="<?php echo base_url()."$module/";?>postjob/add/<?php if(isset($id)) echo $id; ?>" id="form_informationbasic" class="form-horizontal" enctype="multipart/form-data" method="POST">
      <div class="portlet">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-cog"></i> Đăng tin tuyển dụng
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
              <div class="tab-pane active col-sm-12">
                <div class="form-body">
                  <?php if( isset($valid_msg) ) { ?>
                  <label class="col-md-2 control-label"></label>
                  <div class="col-sm-4" >
                    <p class="bg-danger" style="margin-left:-10px; padding:10px; border-radius:5px;" ><?php echo $valid_msg; ?></p>
                  </div>
                  <?php } ?>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Người đăng:
                    </label>
                    <div class="col-sm-4 row_input_title">
                      <select class="form-control" name="hr_people">
                        <?php foreach($hr as $item_hr) { ?>
                          <option value="<?php echo $item_hr['id']; ?>" <?php if( isset($item['cid']) && $item_hr['id'] == $item['cid'] ) echo "selected='selected'"; ?> > <?php echo $item_hr['fullname']; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Tiêu đề: <span class="required">
                    *</span>
                    </label>
                    <div class="col-sm-8 row_input_title">
                      <input required type="text" class="form-control maxlength-handler" maxlength="100" name="hr_title" value="<?php if(isset($item['title'])) {echo $item['title'];} else if($this->input->post('hr_title')){ echo $this->input->post('hr_title'); } ?>">                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Mô tả công việc: <span class="required">
                    *</span>
                    </label>
                    <div class="col-md-8 row_input_title">
                      <textarea required rows="8" class="form-control" name="hr_desc"><?php if(isset($item_desc)){ echo $item_desc; } else if($this->input->post('hr_desc')){ echo $this->input->post('hr_desc'); }  ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Quyền lợi được hưởng: <span class="required">
                    *</span>
                    </label>
                    <div class="col-md-8 row_input_title">
                      <textarea required rows="8" class="form-control" name="hr_benifit"><?php if(isset($item_benifit)) { echo $item_benifit; } else if($this->input->post('hr_benifit')){ echo $this->input->post('hr_benifit'); } ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Yêu cầu công việc: <span class="required">
                    *</span>
                    </label>
                    <div class="col-md-8 row_input_title">
                      <textarea required rows="8" class="form-control" name="hr_work_request"><?php if(isset($item_workReq)) { echo $item_workReq; } else if($this->input->post('hr_work_request')){ echo $this->input->post('hr_work_request'); } ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Yêu cầu hồ sơ: <span class="required">
                    *</span>
                    </label>
                    <div class="col-md-8 row_input_title">
                      <textarea required rows="8" class="form-control" name="hr_profile_request"><?php if(isset($item_profileReq)) {echo $item_profileReq;} else if($this->input->post('hr_profile_request')){ echo $this->input->post('hr_profile_request'); } ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-2 control-label">Trường ưu tiên:
                    </label>
                    <div class="col-sm-8 row_input_title">
                      <textarea rows="4" class="form-control" name="hr_schools_like"><?php if(isset($item['schools_like'])) echo $item['schools_like']; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Mức lương</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="hr_salary">
                        <?php if( isset($salary) ) { foreach( $salary as $sal ) { ?>
                          <option value="<?php echo $sal['id']; ?>" <?php if( isset($item['salary_id']) && $item['salary_id'] == $sal['id'] ) echo "selected='selected'";  ?> ><?php echo $sal['salary_title']; ?></option>                        
                        <?php } } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Số lượng tuyển dụng:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="hr_num_open" value="<?php if(isset($item['number_opening'])) echo $item['number_opening']; else echo '1'; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ngôn ngữ hồ sơ:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="hr_profile_lang" value="<?php if(isset($item_profileLang)) echo $item_profileLang; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Hạn nộp hồ sơ:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control datepicker" data-date-format="dd-mm-yyyy" name="hr_deadtime" value="<?php if(isset($item_deadtime)) echo date( 'd-m-Y', $item_deadtime ); ?>" placeholder="Ngày-Tháng-Năm" >                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Địa điểm làm việc</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="hr_work_location">
                        <?php foreach($province as $item_province) { ?>
                          <option value="<?php echo $item_province['provinceid']; ?>" <?php if( isset($item['location']) && $item['location'] == $item_province['provinceid'] ) echo "selected='selected'"; ?> > <?php echo $item_province['name']; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Ngành nghề</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="hr_work_category">
                        <?php foreach($industry as $item_industry) { ?>
                          <option value="<?php echo $item_industry['id']; ?>" <?php if( isset($item['job_category']) && $item['job_category'] == $item_industry['id'] ) echo "selected='selected'"; ?> > <?php echo $item_industry['title']; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Loại hình công việc</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="hr_work_type">
                        <?php if(isset($work_type)) { foreach( $work_type as $type ) { ?>
                          <option value="<?php echo $type['id']; ?>" <?php if( isset($item['employment_type']) && $item['employment_type'] == $type['id'] ) echo "selected='selected'";  ?> ><?php echo $type['title']; ?></option>                        
                        <?php } } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Kinh nghiệm</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="hr_exp">
                      <?php if(isset( $work_exp )) { foreach( $work_exp as $exp ) {  ?>                        
                          <option value="5" <?php if( isset($item['experience']) && $item['experience'] == $exp['id'] ) echo "selected='selected'";  ?> ><?php echo $exp['work_exp_title']; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tên công ty:<span class="required">
                    *</span></label>
                    <div class="col-sm-8">
                      <input required type="text" class="form-control" name="com_name" value="<?php if(isset($item['company'])) {echo $item['company'];} else if($this->input->post('com_name')){ echo $this->input->post('com_name'); } ?>" >
                    </div>
                  </div>                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Mô tả về công ty: <span class="required">
                    *</span></label>
                    <div class="col-sm-8">
                      <textarea rows="8" class="form-control" name="com_desc"><?php if(isset($item['company_description'])) { echo $item['company_description']; } else if($this->input->post('com_desc')){ echo $this->input->post('com_desc'); } ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Quy mô của công ty:</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="com_number">
                        <?php if(isset( $com_size )) { foreach( $com_size as $size ) { ?>
                          <option value="5" <?php if( isset($item['number_opening']) && $item['number_opening'] == $size['id'] ) echo "selected='selected'";  ?> ><?php echo $size['com_size_title']; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">Logo công ty: </label>
                    <div class="col-md-4">
                      <div class="fileinput" data-provides="fileinput">
                        <div class="fileinput-new thumbnail thumbnail_news" style="width: 200px; height: 150px;">
                          <img src="<?php 
                          if( isset($item['company_logo']) && $item['company_logo'] != '' ) {
                            echo base_url().$item['company_logo'];
                          }else{
                            echo base_url().'public/'.$module.'/images/no_image.gif';
                          } ?>" alt="Avatar"/>
                          <input type="hidden" value="<?php
                          if( isset($item) && $item['company_logo'] != '' ) {
                            echo $item['company_logo'];
                          }
                          ?>" name="avatarOld" id="avatarOld"/>
                        </div>
                        <div>
                          <span class="btn default btn-file">
                          <span class="fileinput-exists btn btn-success">
                          Thay ảnh </span>
                          <input type="file" name="company_logo" class="avatar_news"/>
                          </span>
                          <button type="button" class="btn default del_avatar_news">Xóa </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Thứ tự:</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="hr_sort" value="<?php if(isset($item['sort'])) echo $item['sort']; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Trạng thái</label>
                    <div class="col-sm-3">
                      <select class="form-control" name="hr_status" id="hr_status">
                        <option value="1" <?php if(isset($item) && $item['status'] == 1) echo 'selected = selected'; ?> >Hiện</option>            
                        <option value="0" <?php if(isset($item) && $item['status'] == 0) echo 'selected = selected'; ?> >Ẩn</option>                        
                      </select>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            </div>
            <div class="clearfix"></div>
            
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
