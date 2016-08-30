
<div class="col-md-12">
    <form id="addnews-form" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url()."$module/";?>news/addnews/<?php if(isset($id)) echo $id; ?>">
      <div class="portlet">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-cog"></i> Cài đặt tin tức
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
                    <label class="col-sm-2 control-label">Tiêu đề<span class="required">*</span></label>
                    <div class="col-sm-8">
                      <input required type="text" class="form-control" name="title" value="<?php if(isset($news)) echo $news['title']; ?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Mô tả</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="desc" rows="5"><?php if(isset($news)) echo $news['description']; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Nội dung<span class="required">*</span></label>
                    <div class="col-sm-8">
                      <textarea required="required" class="form-control ckeditor" id="content" name="content"><?php if(isset($news)) echo $news['content']; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Tag</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tag" value="<?php if(isset($news)) echo $news['tags']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Danh mục</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="category">
                        <?php if( isset( $news['cat_id']) ) $this->mweb_category_news->adm_create_menu($list, $parent=0, $text='&nbsp;', $news['cat_id']); else $this->mweb_category_news->adm_create_menu($list, $parent=0, $text='&nbsp;', 0); ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2">Ảnh đại diện: </label>
                    <div class="col-md-8">
                      <div class="fileinput" data-provides="fileinput">
                        <div class="fileinput-new thumbnail thumbnail_news" style="width: 200px; height: 150px;">
                          <img src="<?php 
                          if( isset($news) && $news['image'] != '' ) {
                            echo base_url().$news['image'];
                          }else{
                            echo base_url().'public/'.$module.'/images/no_image.gif';
                          } ?>" alt="Avatar"/>
                          <input type="hidden" value="<?php
                          if( isset($news) && $news['image'] != '' ) {
                            echo base_url().$news['image'];
                          }
                          ?>" name="avatarOld" id="avatarOld"/>
                        </div>
                        <div>
                          <span class="btn default btn-file">
                          <span class="fileinput-exists btn btn-success">
                          Thay ảnh </span>
                          <input type="file" name="avatar_news" class="avatar_news"/>
                          </span>
                          <button type="button" class="btn default del_avatar_news">Xóa </button>
                        </div>
                      </div>  
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Sắp xếp</label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" name="order" value="<?php if(isset($news)) echo $news['sort']; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Trạng thái</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="status" id="status">
                        <option value="1" <?php if(isset($news) && $news['status'] == 1) echo 'selected = selected'; ?>>Hiện</option>
                        <option value="0" <?php if(isset($news) && $news['status'] == 0) echo 'selected = selected'; ?> >Ẩn</option>                        
                        <!-- <option value="2" <?php if(isset($news) && $news['status'] == 2) echo 'selected = selected'; ?>>Hẹn ngày đăng</option> -->
                      </select>
                    </div>
                    </div>

                    <!-- <div class="col-sm-4 public-date" >
                      <div class="input-append date form_datetime">
                          <input size="22" type="text" value="<?php if(isset($news)) echo date( 'Y-m-d H:i:s', $news['create_time'] ); ?>" name="public_time">
                          <span class="add-on"><i class="icon-th"></i></span>
                      </div>
                    </div> -->

                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Từ khóa meta</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="meta_key" value="<?php if(isset($news)) echo $news['meta_keyword']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" >Mô tả meta</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="meta_desc"><?php if(isset($news)) echo $news['meta_description']; ?></textarea>
                    </div>
                  </div>
                  
                  
                </div>
              </div>
            </div>            
          </div>
        </div>
        <div class="portlet-title topline">
          <?php 
          $this->load->view("toolbar");
           ?>
        </div>
      </div>
    </form>
</div>
