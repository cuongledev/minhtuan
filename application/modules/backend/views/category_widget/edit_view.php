<div class="col-md-12" id="category_index">
    <form class="form-horizontal form-row-seperated" action="<?php if(isset($action)) echo $action; ?>" id="form_user" class="form-horizontal" enctype="multipart/form-data" method="POST">
      <div class="portlet">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-cog"></i> <?php if(isset($title)) echo $title; ?>
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
                    <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(isset($info['id'])) echo $info['id'];?>"/>
                    
                    <label class="col-md-2 control-label">Tiêu đề: <span class="required">
                    *</span>
                    </label>
                    <div class="col-md-5 row_input_title">
                      <input type="text" class="form-control maxlength-handler" id="title" name="title" value="<?php if(isset($info['title'])) echo $info['title'];?>">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Alias: <span class="required">
                    *</span>
                    </label>
                    <div class="col-md-5">
                      <input type="text" class="form-control maxlength-handler" id="alias" name="alias" value="<?php if(isset($info['alias'])) echo $info['alias'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Chọn danh mục:
                    </label>
                    <div class="col-md-5">
                      <select name="parent_id" id="" class="form-control">
                        <option value="0">--Danh mục gốc</option>
                                  <?php
                                  if($this->uri->segment(3)=='add'){
                                    callMenu($menu);
                                  }else{
                                    callMenu($menu,0,"--",$info['parent_id']);
                                  }
                                  
                                  ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Chọn tin bài:
                    </label>
                    <div class="col-md-5">
                      <div class="panel panel-info panel_menu" id="panel_category_widget">
                          <div class="panel-heading"><button type="button" name="save_category_widget" id="save_category_widget" class="btn btn-info" style="margin-left:160px;">Sử Dụng</button></div>
                          <div class="panel-body">
                          <?php 
                      if (isset($categoryProduct) && $categoryProduct!='') { 
                        foreach ($categoryProduct as $key => $value) { ?>
                            <div class="checkbox">
                              <label>
                                <input type="radio" data-id="<?php echo $value['id']; ?>" value="<?php echo $value['title']; ?>" name="them_menu_widget" class="them_menu_widget" />
                                <?php echo $value['title'];?></label>
                              </div>
                            <?php
                          }
                        }
                         ?>
                          </div>
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
