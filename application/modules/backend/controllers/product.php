<?php
class Product extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        /*$module = $this->uri->segment(1);
        $this->_data['module'] = $module;*/
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."index/index";
        $this->_data['title'] = "Quản lý sản phẩm";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý Sản phẩm',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "product/index_view";
        $this->load->model('Mproduct');

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/product/delAll";

        // phan trang
        $url = base_url()."$module/product/index";
        $lnc_total = $this->Mproduct->countAll();
        $per_page = 50;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        if (isset($_GET['stitle'])) {
            if ($_GET['stitle']!='') {
                $stitle = trim(addslashes($_GET['stitle']));
                $this->_data['stitle'] = $stitle;
                $this->_data['data'] = $this->Mproduct->searchProduct($stitle);
            }
        }else{
            $this->_data['data'] = $this->Mproduct->listProduct($config['per_page'],$start);
        }
        
        $this->_data['mess'] = $this->session->flashdata("flash_mess");

        $this->load->view($this->_data['path'],$this->_data);
    }
    public function updateStatus(){
        if (isset($_POST['status'])) {
            if (is_numeric($_POST['status'])) {
                if ($_POST['status']==1) {
                    $data_update=array(
                        'status'=>0
                    );
                }else{
                    $data_update=array(
                        'status'=>1
                    );
                }
                $id_product=$_POST['id_product'];
                $this->load->model('Mproduct');
                $success = $this->Mproduct->updateStatus($id_product,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái sản phẩm!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái sản phẩm!'
                    );
                }
                if ($_POST['status']==1) {
                    $data['idstatus'] = 0;
                }else{
                    $data['idstatus'] = 1;
                }
                echo json_encode($data);
            }
        }
    }
    public function updateRating(){
        if (isset($_POST['status'])) {
            if (is_numeric($_POST['status'])) {
                if ($_POST['status']==1) {
                    $data_update=array(
                        'rating'=>0
                    );
                }else{
                    $data_update=array(
                        'rating'=>1
                    );
                }
                $id_product=$_POST['id_product'];
                $this->load->model('Mproduct');
                $success = $this->Mproduct->updateStatus($id_product,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái sản phẩm tiêu biểu!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái sản phẩm tiêu biểu!'
                    );
                }
                if ($_POST['status']==1) {
                    $data['idstatus'] = 0;
                }else{
                    $data['idstatus'] = 1;
                }
                echo json_encode($data);
            }
        }
    }
    public function updateNew(){
        if (isset($_POST['status'])) {
            if (is_numeric($_POST['status'])) {
                if ($_POST['status']==1) {
                    $data_update=array(
                        'new'=>0
                    );
                }else{
                    $data_update=array(
                        'new'=>1
                    );
                }
                $id_product=$_POST['id_product'];
                $this->load->model('Mproduct');
                $success = $this->Mproduct->updateStatus($id_product,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái sản phẩm mới!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái sản phẩm mới!'
                    );
                }
                if ($_POST['status']==1) {
                    $data['idstatus'] = 0;
                }else{
                    $data['idstatus'] = 1;
                }
                echo json_encode($data);
            }
        }
    }
    public function edit($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
        $this->load->model("Mproduct");
        $this->load->model("Mcategory");
        $this->_data['title'] = "Chỉnh sửa sản phẩm";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý sản phẩm',
                'href'  => base_url().$module.'/product/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa sản phẩm',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="product/edit_view";
        $this->_data['info'] = $this->Mproduct->getProductById($id);
        $this->_data['catexxx'] = $this->Mproduct->getProductByIdWhereCateProduct($id);
        foreach ($this->_data['catexxx'] as $key => $value) {
            $arr_ch[] = (int)$value['id_category'];
        }
        $this->_data['cate'] = $arr_ch;

        $this->_data['relax'] = $this->Mproduct->listProductRelax();
        $this->_data['menu'] = $this->Mcategory->listAllCate();
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/product/updateProduct';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/product/index";

        $this->load->view($this->_data['path'],$this->_data);
        }
    }
    public function add(){
        $this->load->model("Mproduct");
        $this->load->model("Mcategory");
        $this->_data['title'] = "Thêm mới sản phẩm";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['menu'] = $this->Mcategory->listAllCate();
        $this->_data['relax'] = $this->Mproduct->listProductRelax();
        $this->_data['loadPage']="product/add_view";
        $this->_data['action'] = base_url().'backend/product/insertProduct';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['link_button_back'] = base_url()."$module/product/index";
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertProduct(){
        $this->load->model('Mproduct');
        if (isset($_POST['luu'])) {
            $countColor = count($_POST['colorImage']);
            $title = trim(addslashes($this->input->post('title')));
            $alias = trim(addslashes($this->input->post('alias')));
            $price = trim(addslashes($this->input->post('price')));
            $link_video = trim(addslashes($this->input->post('link_video')));
            //$price_market = trim(addslashes($this->input->post('price_market')));
            $saleoff = trim(addslashes($this->input->post('saleoff')));
            $category = $this->input->post('delmenuall');// data array
            $weight_class = trim(addslashes($this->input->post('dai')));
            $baohanh = trim(addslashes($this->input->post('baohanh')));
            //$rong = trim(addslashes($this->input->post('rong')));
            //$cao = trim(addslashes($this->input->post('cao')));
            $masanpham = trim(addslashes($this->input->post('masanpham')));
            $tinhtrang = trim(addslashes($this->input->post('tinhtrang')));
            $info_short = $this->input->post('info_short');
            /*$arr_weight = array(
                'long' => $dai,
                'wide' => $rong,
                'height' => $cao
            );*/
            //$weight_class = json_encode($arr_weight);
            $full_info = $this->input->post('content_editor_product');
            $mota = $this->input->post('mota_content_editor_product');
            $related_product = $this->input->post('relax');
            $data_update=array(
                'title' => $title,
                'alias' => $alias,
                'price' => $price,
                'link_video' => $link_video,
                'masanpham' => $masanpham,
                'tinhtrang' => $tinhtrang,
                'info_short' => $info_short,
                //'price_market' => $price_market,
                'saleoff' => $saleoff,
                'full_info' => $full_info,
                'mota' => $mota,
                'weigh_class' => $weight_class,
                'baohanh' => $baohanh,
                'related_product' => json_encode($related_product),
                'author' => $this->session->userdata('id'),
                'create_time' => time(),
                'status' => 1,
            );
            $file=dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/public/backend/images/'.$this->session->userdata('username');
            if (!is_dir($file)) {
                mkdir($file,0777);
            }
            for ($i=0; $i < $countColor; $i++) { 
                // upload images 
                if (isset($_POST['hidden_imgColor'][$i]) && $_POST['hidden_imgColor'][$i]!='') {
                        if (!empty($_FILES['file_logoColor'])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logoColor']['name'][$i])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logoColor']['tmp_name'][$i],$target_file); // Upload the file to the 
                                        if ($response) {
                                            $imagesColor[] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                                        }
                                    }
                        }
                        if($_FILES['file_logoColor']['name'][$i]=='' && isset($_POST['hidden_imgColor'][$i]) && $_POST['hidden_imgColor'][$i]!=''){
                            $imagesColor[] = trim(addslashes($_POST['hidden_imgColor'][$i]));
                        }
                }
            }
            $imgArray = $_POST['colorImage'];
            foreach ($imgArray as $key => $value) {
                $imgArray[$key] = array(
                                        'color' => $value,
                                        'image' => $imagesColor[$key]
                                        );
            }
            for ($i=1; $i < 5; $i++) { 
                // upload images 
                if (isset($_POST['hidden_img'.$i]) && $_POST['hidden_img'.$i]!='') {
                        if (!empty($_FILES['file_logo'.$i])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logo'.$i]['name'])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logo'.$i]['tmp_name'],$target_file); // Upload the file to the 
                                        if ($response) {
                                            $images[] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                                            
                                        }
                                    }
                        }
                        if($_FILES['file_logo'.$i]['name']=='' && isset($_POST['hidden_img'.$i]) && $_POST['hidden_img'.$i]!=''){
                            $images[] = trim(addslashes($_POST['hidden_img'.$i]));
                        }
                }
            }
             // upload images 
                if (isset($_POST['hidden_img9']) && $_POST['hidden_img9']!='') {
                        if (!empty($_FILES['file_logo9'])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logo9']['name'])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logo9']['tmp_name'],$target_file); // Upload the file to the 
                                        if ($response) {
                                                $data_update['thumbnail'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;            
                                            
                                        }
                                    }
                        }
                }
                // upload images 
                if (isset($_POST['hidden_img_after']) && $_POST['hidden_img_after']!='') {
                        if (!empty($_FILES['file_logo_after'])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logo_after']['name'])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logo_after']['tmp_name'],$target_file); // Upload the file to the 
                                        if ($response) {
                                                $data_update['thumbnail_after'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;            
                                            
                                        }
                                    }
                        }
                }

            if (isset($images) && !empty($images)) {
                $data_update['images'] = json_encode($images);
            }
            if (isset($imgArray) && !empty($imgArray)) {
                $data_update['color'] = json_encode($imgArray);
            }
            $id = $this->Mproduct->insertDataLastId($data_update);
            for ($i=0; $i < count($category) ; $i++) { 
                $data = array(
                    'id_product' => $id,
                    'id_category' => $category[$i]
                );
                $this->Mproduct->insertProductJoinCategory($data);
            }
            $this->session->set_flashdata("flash_mess","Bạn đã thêm sản phẩm thành công.");
            redirect(base_url().'backend/product');
            
        }
    }
    public function updateProduct(){
        $this->load->model('Mproduct');
        if (isset($_POST['luu'])) {
            $countColor = count($_POST['colorImage']);
            $hidden_id = trim(addslashes($this->input->post('hidden_id')));
            $title = trim(addslashes($this->input->post('title')));
            $alias = trim(addslashes($this->input->post('alias')));
            $price = trim(addslashes($this->input->post('price')));
            //$price_market = trim(addslashes($this->input->post('price_market')));
            $saleoff = trim(addslashes($this->input->post('saleoff')));
            $category = $this->input->post('delmenuall');// data array
            $weight_class = trim(addslashes($this->input->post('dai')));
            $baohanh = trim(addslashes($this->input->post('baohanh')));
            //$rong = trim(addslashes($this->input->post('rong')));
            //$cao = trim(addslashes($this->input->post('cao')));
            $link_video = trim(addslashes($this->input->post('link_video')));
            $tinhtrang = trim(addslashes($this->input->post('tinhtrang')));
            $masanpham = trim(addslashes($this->input->post('masanpham')));
            $info_short = $this->input->post('info_short');
            /*echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            echo '<pre>';
            print_r($_FILES);
            echo '</pre>';
            die;*/
            /*$arr_weight = array(
                'long' => $dai,
                'wide' => $rong,
                'height' => $cao
            );*/
            //$weight_class = json_encode($arr_weight);
            $full_info = $this->input->post('content_editor_product');
            $mota = $this->input->post('mota_content_editor_product');
            $related_product = $this->input->post('relax');
            $data_update=array(
                'title' => $title,
                'alias' => $alias,
                'price' => $price,
                'link_video' => $link_video,
                'masanpham' => $masanpham,
                'tinhtrang' => $tinhtrang,
                'info_short' => $info_short,
                //'price_market' => $price_market,
                'saleoff' => $saleoff,
                'full_info' => $full_info,
                'mota' => $mota,
                'weigh_class' => $weight_class,
                'baohanh' => $baohanh,
                'related_product' => json_encode($related_product),
            );
            
            $file=dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/public/backend/images/'.$this->session->userdata('username');
            if (!is_dir($file)) {
                mkdir($file,0777);
            }
            for ($i=0; $i < $countColor; $i++) { 
                // upload images 
                if (isset($_POST['hidden_imgColor'][$i]) && $_POST['hidden_imgColor'][$i]!='') {
                        if (!empty($_FILES['file_logoColor'])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logoColor']['name'][$i])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logoColor']['tmp_name'][$i],$target_file); // Upload the file to the 
                                        if ($response) {
                                            $imagesColor[] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                                        }
                                    }
                        }
                        if($_FILES['file_logoColor']['name'][$i]=='' && isset($_POST['hidden_imgColor'][$i]) && $_POST['hidden_imgColor'][$i]!=''){
                            $imagesColor[] = trim(addslashes($_POST['hidden_imgColor'][$i]));
                        }
                }
            }
            $imgArray = $_POST['colorImage'];
            foreach ($imgArray as $key => $value) {
                $imgArray[$key] = array(
                                        'color' => $value,
                                        'image' => $imagesColor[$key]
                                        );
            }
            for ($i=1; $i < 5; $i++) { 
                // upload images 
                if (isset($_POST['hidden_img'.$i]) && $_POST['hidden_img'.$i]!='') {
                        if (!empty($_FILES['file_logo'.$i])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logo'.$i]['name'])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logo'.$i]['tmp_name'],$target_file); // Upload the file to the 
                                        if ($response) {
                                            $images[] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                                            
                                        }
                                    }
                        }
                        if($_FILES['file_logo'.$i]['name']=='' && isset($_POST['hidden_img'.$i]) && $_POST['hidden_img'.$i]!=''){
                            $images[] = trim(addslashes($_POST['hidden_img'.$i]));
                        }
                }
            }
             // upload images 
                if (isset($_POST['hidden_img9']) && $_POST['hidden_img9']!='') {
                        if (!empty($_FILES['file_logo9'])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logo9']['name'])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logo9']['tmp_name'],$target_file); // Upload the file to the 
                                        if ($response) {
                                                $data_update['thumbnail'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;            
                                            
                                        }
                                    }
                        }
                }
                // upload images 
                if (isset($_POST['hidden_img_after']) && $_POST['hidden_img_after']!='') {
                        if (!empty($_FILES['file_logo_after'])) {
                                    $end = strtolower(end(explode('.', $_FILES['file_logo_after']['name'])));
                                    if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                                        $renamed = uniqid(rand(), true).'.'."$end";
                                        $target_file = $file.'/'. $renamed;
                                        $response = move_uploaded_file($_FILES['file_logo_after']['tmp_name'],$target_file); // Upload the file to the 
                                        if ($response) {
                                                $data_update['thumbnail_after'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;            
                                            
                                        }
                                    }
                        }
                }

            if (isset($images) && !empty($images)) {
                $data_update['images'] = json_encode($images);
            }
            if (isset($imgArray) && !empty($imgArray)) {
                $data_update['color'] = json_encode($imgArray);
            }
            if (!isset($_POST['colorImage'])) {
                $data_update['color'] = '';
            }
            $this->Mproduct->updateData($data_update,$hidden_id);


                $this->Mproduct->delProCate($hidden_id);

            for ($i=0; $i < count($category) ; $i++) { 
                $data = array(
                    'id_product' => $hidden_id,
                    'id_category' => $category[$i]
                );
                $this->Mproduct->insertProductJoinCategory($data);
            }
            $this->session->set_flashdata("flash_mess","Bạn đã sửa sản phẩm thành công.");
            redirect(base_url().'backend/product');
            
        }
    }
    public function loadAlias(){
        if ($this->input->post('title')) {
            $title = $this->input->post('title');
            if ($title!='') {
                $alias = loadUrl($title);
                $data = array(
                    'status' => true,
                    'alias' => $alias
                );
                echo json_encode($data);
            }
        }
    }
    public function createImages(){
        $this->load->model("Mproduct");

        if ($this->input->post('total')) {
            $t = trim(addslashes($this->input->post('total')));
            $total = $t+1;
            if ($this->input->post('id')) {
                $id = trim(addslashes($this->input->post('id')));
            }else{
                $id=1;
            }
            $info = $this->Mproduct->getProductById($id);
            $html = '
                <div class="col-md-3 create_total" id="create'.$total.'">
                    <div class="fileinput" data-provides="fileinput">
                        <div class="fileinput-new thumbnail logo_thumbnail" style="width: 200px; height: 150px;">
                            <img src="';

                            if (isset($info['thumbnail']) && $info['thumbnail']!='') {
                                 $html .= base_url().$info['thumbnail'];
                            }else{
                                 $html .= base_url().'public/backend/images/no_image.gif';
                            }
            $html .='" alt="'.$info['title'].'"/><input type="hidden" value="';

                            if (isset($info['thumbnail']) && $info['thumbnail']!='') {
                                 $html .= base_url().$info['thumbnail'];
                            }
            $html .='" name="hidden_img1" id="hidden_img1"/>
                        </div>
                        <div>
                            <span class="btn default btn-file">
                            <span class="fileinput-exists btn btn-success">
                            Thay ảnh </span>
                            <input type="file" name="file_logo" class="file_logo"/>
                            </span>
                            <button type="button" class="btn default fileinput-exists1">Xóa </button>
                        </div>
                    </div>
                </div>
            ';
            echo $html;
        }
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Mproduct');
                $this->Mproduct->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều sản phẩm thành công.");
                redirect(base_url()."backend/product/index");
            }else{
                redirect(base_url()."backend/product/index");
            }
        }
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mproduct");
            $this->Mproduct->delCate($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa sản phẩm thành công.");
            redirect(base_url()."backend/product/index");
        }
    }
    
}