<main class="search-job">
    <div class="container">
        <div class="row">
            <div class="browse-solid col-xs-12">
                <h2 class="h2-browse-solid">TÌM KIẾM CÔNG VIỆC</h2>
            </div>
            <form action="" method="GET" role="form">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="col-xs-12 col-sm-4">
                        <label for=""><strong>Từ khóa</strong></label>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <input type="text" class="form-control" name="keywords" placeholder="Nhập từ khóa cần tìm..." value="<?php if(isset($keywords_title)) echo $keywords_title; ?>">
                    </div>
                    <div class="row row-job-cate">
                        <div class="col-xs-12 col-sm-4">
                            <label for="">Nghành nghề</label>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <select name="industry" class="form-control">
                                <option value="" selected="">- Lựa chọn -</option>
                                <?php
                                if (!empty($industry)) {
                                    foreach ($industry as $k=> $v) {?>
                                        <option value="<?php echo $v['id']; ?>" <?php if(isset($keywords_job_category) && $keywords_job_category==$v['id']) echo " selected='selected'";?>><?php echo $v['title']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                         </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="row row-location">
                        <div class="col-xs-12 col-sm-3">
                            <strong>Thành phố</strong>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <select name="localtion" id="input" class="form-control">
                                <option value="" selected>Chọn vị trí làm việc</option>
                                <?php
                                    foreach ($province as $k=> $v) { ?>
                                        <option value="<?php echo $v['provinceid'] ?>" <?php if(isset($keywords_localtion) && $keywords_localtion==$v['provinceid']) echo " selected='selected'";?>><?php echo $v['name']; ?></option>
                                <?php
                            }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row checkbox-search col-xs-12">
                        <div class="col-xs-12 col-sm-4">
                            <input type="radio" name="twork" value="1" <?php if(isset($keywords_employment_type) && $keywords_employment_type==1) echo " checked='checked'";?>>
                            <label for="">Toàn thời gian</label>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <input type="radio" name="twork" value="2" <?php if(isset($keywords_employment_type) && $keywords_employment_type==2) echo " checked='checked'";?>>
                            <label for="">Bán thời gian</label>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <input type="radio" name="twork" value="3" <?php if(isset($keywords_employment_type) && $keywords_employment_type==3) echo " checked='checked'";?>>
                            <label for="">Thực tập sinh</label>
                        </div>
                    </div>
                </div>
                <div class="text-search col-xs-12">
                    <button type="submit" name="search" class="btn btn-primary">Bắt đầu tìm kiếm</button>
                    <p class="p-frmSearch">Tìm kiếm trên 400.000 việc làm từ 25.000 nhà tuyển dụng.</p>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
if (!empty($result)) {
    $this->load->view('students/result_search_keywords_view');
}

 ?>