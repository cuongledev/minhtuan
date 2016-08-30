<div class="col-md-12" id="user_index">
	<div class="text-center" id="loading_menu" style="position: fixed!important;margin-top: 200px;
    display:none;z-index:9999;padding-left: 510px;">
		<img src="<?php echo base_url().'public/backend/images/loading.gif';?>" style="width: 40px;" alt="">
		<div class="xxx modal-backdrop fade in"></div>
		</div>
		
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cog"></i> <?php if(isset($title)) echo $title; ?>
					</div>
					<div class="actions btn-set">
						<a href="<?php if(isset($link_button_back)) echo $link_button_back; ?>" class="btn btn-default"><i class="fa fa-angle-left"></i> Huỷ</a>
						<?php if(isset($lang_button)) echo '<button type="button" id="updateMenuConfig" class="btn btn-success continue"><i class="fa fa-check"></i> '.$lang_button.'</button>'; ?>						
					</div>
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
										<div class="col-md-5">
												<div class="panel panel-info panel_menu" id="panel_menu_posts_news">
											      <div class="panel-heading">Tin tức <button type="button" name="save_post_news_menu" id="save_post_news_menu" class="btn btn-info" style="margin-left:230px;">Sử Dụng</button></div>
											      <div class="panel-body">
											      <?php 
												if (isset($news) && $news!='') { 
													foreach ($news as $key => $value) { ?>
												   		<div class="checkbox">
														  	<label>
														  		<input type="radio" data-id="<?php echo $value['id']; ?>" value="<?php echo $value['title']; ?>" name="them_menu_post_news" class="them_menu_post_news" />
													      	<?php echo $value['title'];?></label>
												      	</div>
											      	<?php
														}
													}
													 ?>
													 
											  		</div>
											    </div>	

										
												<!-- <div class="panel panel-info panel_menu" id="panel_menu_newsPage">
																							      <div class="panel-heading">Pages <button type="button" name="save_post_menu" id="save_post_menu" class="btn btn-info" style="margin-left:230px;">Sử Dụng</button></div>
																							      <div class="panel-body">
																							      <?php 
												if (isset($newsPage) && $newsPage!='') { 
													foreach ($newsPage as $key => $value) { ?>
												   		<div class="checkbox">
														  	<label>
														  		<input type="radio" data-id="<?php echo $value['id']; ?>" value="<?php echo $value['title']; ?>" name="them_menu_page" class="them_menu_page" />
													      	<?php echo $value['title'];?></label>
												      	</div>
																							      	<?php
														}
													}
													 ?>
													 
																							  		</div>
												</div> -->
											    <!-- <div class="panel panel-info panel_menu" id="panel_menu_posts">
											      <div class="panel-heading">Danh mục sản phẩm <button type="button" name="save_post_menu" id="save_post_menu" class="btn btn-info" style="margin-left:230px;">Sử Dụng</button></div>
											      <div class="panel-body">
											      <?php 
											    												if (isset($categoryProduct) && $categoryProduct!='') { 
											    													foreach ($categoryProduct as $key => $value) { ?>
											    												   		<div class="checkbox">
											    														  	<label>
											    														  		<input type="radio" data-id="<?php echo $value['id']; ?>" value="<?php echo $value['title']; ?>" name="them_menu_post" class="them_menu_post" />
											    													      	<?php echo $value['title'];?></label>
											    												      	</div>
											      	<?php
											    														}
											    													}
											    													 ?>
											    													 
											    											  		</div>
											    </div>	 -->
											    <div class="panel panel-info panel_menu" id="panel_menu_category">
											      <div class="panel-heading">Danh mục bài viết <button type="button" name="save_category_menu" id="save_category_menu" class="btn btn-info" style="margin-left:160px;">Sử Dụng</button></div>
											      <div class="panel-body">
											      <?php 
												if (isset($categoryNewsPage) && $categoryNewsPage!='') { 
													foreach ($categoryNewsPage as $key => $value) { ?>
												   		<div class="checkbox">
														  	<label>
														  		<input type="radio" data-id="<?php echo $value['id']; ?>" value="<?php echo $value['title']; ?>" name="them_menu_cate" class="them_menu_cate" />
													      	<?php echo $value['title'];?></label>
												      	</div>
											      	<?php
														}
													}
													 ?>
											  		</div>
											    </div>	
											    <form action="<?php echo base_url(); ?>backend/menu/addMenu" method="post" accept-charset="utf-8">
											    <div class="panel panel-info" id="menu_index_insert">
											      <div class="panel-heading">Tùy chỉnh</div>
											      <div class="panel-body">
											      <label>Tiêu đề:</label>
													<input type="text" name="title_menu" id="title_menu" value="" class="form-control"/>
													<input type="hidden" name="alias_menu" id="alias_menu" value="" class="form-control"/>
													<input type="hidden" name="id_link_menu" id="id_link_menu" value="" class="form-control"/>
													<label>Đường link:</label>
													<input type="text" name="link_menu" id="link_menu" value="" class="form-control"/>
													<label>Sắp Xếp:</label>
													<select name="parent_menu" id="parent_menu" class="form-control">
														<option value="0">Root</option>
														<?php 
														callMenu($menu,$parent=0,$text="--",$select=0)
														 ?>
													</select>
													<br>
													<button type="submit" name="save_custom_menu" class="btn btn-info" >Thêm vào</button>
											  		</div>

											    </div>	
											    </form>
											
										</div><!-- PANEL MENU-->
										<form action="<?php echo base_url(); ?>backend/menu/deleteMenu" method="post" accept-charset="utf-8">
											
										<div class="col-md-7">
											<div class="panel panel-info">
											      <div class="panel-heading">Sơ đồ menu </div>
											      <div class="panel-body">
											      	<?php 
														dequy($menu,$parent=0,$text="------");
														?>
													<br>
													<button type="submit" name="del_menu" class="btn btn-info" >Xóa</button>
											  		</div>

											    </div>	
											
										</div>
										
										</form>
									</div>
									

									
									
								</div>
							</div>
						</div>						
					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="myModalMenuLoad" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Chỉnh sửa menu</h4>
				        </div>
				        <div class="modal-body">
				        	<form action="<?php echo base_url(); ?>backend/menu/editModalMenu" method="post" accept-charset="utf-8">
						        <label>Tiêu đề:</label>
								<input type="text" name="title_menu" id="title_menu" value="" class="form-control"/>
								<input type="hidden" name="alias_menu" id="alias_menu" value="" class="form-control"/>
								<input type="hidden" name="id_menu" id="id_menu" value="" class="form-control"/>
								<input type="hidden" name="id_link_menu" id="id_link_menu" value="" class="form-control"/>
								<label>Đường link:</label>
								<input type="text" name="link_menu" id="link_menu" value="" class="form-control"/>
								<label>Sắp Xếp:</label>
								<select name="parent_menu" id="parent_menu" class="form-control">
									<option value="0">Root</option>
									<?php 
									callMenu($menu,$parent=0,$text="--",$select=0)
									 ?>
								</select>
								<br>
								<button type="submit" name="save_custom_menu" class="btn btn-info" >Đồng ý</button>
							</form>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
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
</div>
