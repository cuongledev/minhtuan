<?php
class Category extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        /*$module = $this->uri->segment(1);
        $this->_data['module'] = $module;*/
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."index/index";
        $this->_data['title'] = "Quản lý danh mục sản phẩm";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý danh mục sản phẩm',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "category/index_view";
        $this->load->model('Mcategory');

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/category/delAll";

        // phan trang
        $url = base_url()."$module/category/index";
        $lnc_total = $this->Mcategory->countAll();
        $per_page = 50;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Mcategory->listCategory($config['per_page'],$start);
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
                $id_cate=$_POST['id_cate'];
                $this->load->model('Mcategory');
                $success = $this->Mcategory->updateStatus($id_cate,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái danh mục!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái danh mục!'
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
    public function updateStatusHome(){
        if (isset($_POST['status'])) {
            if (is_numeric($_POST['status'])) {
                if ($_POST['status']==1) {
                    $data_update=array(
                        'status_home'=>0
                    );
                }else{
                    $data_update=array(
                        'status_home'=>1
                    );
                }
                $id_cate=$_POST['id_cate'];
                $this->load->model('Mcategory');
                $success = $this->Mcategory->updateStatus($id_cate,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái danh mục ngoài trang chủ!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái danh mục ngoài trang chủ!'
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
        $this->load->model("Mcategory");
        $this->_data['title'] = "Chỉnh sửa danh mục";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý danh mục',
                'href'  => base_url().$module.'/category/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa danh mục',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="category/edit_view";
        $this->_data['info'] = $this->Mcategory->getCateById($id);
        $this->_data['menu'] = $this->Mcategory->listAllCate();
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/category/updateCate';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/category/index";

        $this->load->view($this->_data['path'],$this->_data);
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
    public function updateCate(){
        $this->load->model("Mcategory");
        if (isset($_POST['luu'])) {
            $hidden_id = trim(addslashes($this->input->post('hidden_id')));
            $title = trim(addslashes($this->input->post('title')));
            $title_banner1 = trim(addslashes($this->input->post('title_banner1')));
            $title_banner2 = trim(addslashes($this->input->post('title_banner2')));
            $link_banner1 = trim(addslashes($this->input->post('link_banner1')));
            $link_banner2 = trim(addslashes($this->input->post('link_banner2')));
            $alias = trim(addslashes($this->input->post('alias')));
            $parent_id = trim(addslashes($this->input->post('parent_id')));
            $content_editor_category = $this->input->post('content_editor_category');
            $data_update=array(
                'title' => $title,
                'title_banner1' => $title_banner1,
                'title_banner2' => $title_banner2,
                'link_banner1' => $link_banner1,
                'link_banner2' => $link_banner2,
                'alias' => $alias,
                'parent_id' => $parent_id,
                'info' => $content_editor_category,
            );
            $file=dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/public/backend/images/'.$this->session->userdata('username');
            if (!is_dir($file)) {
                mkdir($file,0777);
            }
            // upload images 
            if (!empty($_FILES['file_logo'])) {
                        $end = strtolower(end(explode('.', $_FILES['file_logo']['name'])));
                        if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                            $renamed = uniqid(rand(), true).'.'."$end";
                            $target_file = $file.'/'. $renamed;
                            $response = move_uploaded_file($_FILES['file_logo']['tmp_name'],$target_file); // Upload the file to the 
                            if ($response) {
                                $data_update['thumbnail'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['thumbnail'] ='';
            }
            if (!empty($_FILES['file_logo2'])) {
                        $end = strtolower(end(explode('.', $_FILES['file_logo2']['name'])));
                        if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                            $renamed = uniqid(rand(), true).'.'."$end";
                            $target_file = $file.'/'. $renamed;
                            $response = move_uploaded_file($_FILES['file_logo2']['tmp_name'],$target_file); // Upload the file to the 
                            if ($response) {
                                $data_update['banner1'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img2']) && $_POST['hidden_img2']=='') {
                $data_update['banner1'] ='';
            }
            if (!empty($_FILES['file_logo3'])) {
                        $end = strtolower(end(explode('.', $_FILES['file_logo3']['name'])));
                        if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                            $renamed = uniqid(rand(), true).'.'."$end";
                            $target_file = $file.'/'. $renamed;
                            $response = move_uploaded_file($_FILES['file_logo3']['tmp_name'],$target_file); // Upload the file to the 
                            if ($response) {
                                $data_update['banner2'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img3']) && $_POST['hidden_img3']=='') {
                $data_update['banner2'] ='';
            }
            $this->Mcategory->updateWhereId($data_update,$hidden_id);
            $this->session->set_flashdata("flash_mess","Bạn đã chỉnh sửa thành công.");
            redirect(base_url().'backend/category');
        }
              
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mcategory");
            $this->Mcategory->delCate($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa danh mục thành công.");
            redirect(base_url()."backend/category");
        }
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Mcategory');
                $this->Mcategory->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều danh mục thành công.");
                redirect(base_url()."backend/category");
            }
        }
    }
    public function add(){
        $this->load->model("Mcategory");
        $this->_data['title'] = "Thêm mới danh mục";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['menu'] = $this->Mcategory->listAllCate();
        $this->_data['loadPage']="category/edit_view";
        $this->_data['action'] = base_url().'backend/category/insertCategory';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['link_button_back'] = base_url()."$module/category/index";
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertCategory(){
        $this->load->model('Mcategory');
        if (isset($_POST['luu'])) {
            $title = trim(addslashes($this->input->post('title')));
            $title_banner1 = trim(addslashes($this->input->post('title_banner1')));
            $title_banner2 = trim(addslashes($this->input->post('title_banner2')));
            $link_banner1 = trim(addslashes($this->input->post('link_banner1')));
            $link_banner2 = trim(addslashes($this->input->post('link_banner2')));
            $alias = trim(addslashes($this->input->post('alias')));
            $parent_id = trim(addslashes($this->input->post('parent_id')));
            $content_editor_category = $this->input->post('content_editor_category');
            $data_update=array(
                'title' => $title,
                'title_banner1' => $title_banner1,
                'title_banner2' => $title_banner2,
                'link_banner1' => $link_banner1,
                'link_banner2' => $link_banner2,
                'alias' => $alias,
                'parent_id' => $parent_id,
                'info' => $content_editor_category,
                'author' => $this->session->userdata('id'),
                'create_time' => time(),
                'status' => 1,
            );
            $file=dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/public/backend/images/'.$this->session->userdata('username');
            if (!is_dir($file)) {
                mkdir($file,0777);
            }
            // upload images 
            if (!empty($_FILES['file_logo'])) {
                        $end = strtolower(end(explode('.', $_FILES['file_logo']['name'])));
                        if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                            $renamed = uniqid(rand(), true).'.'."$end";
                            $target_file = $file.'/'. $renamed;
                            $response = move_uploaded_file($_FILES['file_logo']['tmp_name'],$target_file); // Upload the file to the 
                            if ($response) {
                                $data_update['thumbnail'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['thumbnail'] ='';
            }
            if (!empty($_FILES['file_logo2'])) {
                        $end = strtolower(end(explode('.', $_FILES['file_logo2']['name'])));
                        if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                            $renamed = uniqid(rand(), true).'.'."$end";
                            $target_file = $file.'/'. $renamed;
                            $response = move_uploaded_file($_FILES['file_logo2']['tmp_name'],$target_file); // Upload the file to the 
                            if ($response) {
                                $data_update['banner1'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img2']) && $_POST['hidden_img2']=='') {
                $data_update['banner1'] ='';
            }
            if (!empty($_FILES['file_logo3'])) {
                        $end = strtolower(end(explode('.', $_FILES['file_logo3']['name'])));
                        if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                            $renamed = uniqid(rand(), true).'.'."$end";
                            $target_file = $file.'/'. $renamed;
                            $response = move_uploaded_file($_FILES['file_logo3']['tmp_name'],$target_file); // Upload the file to the 
                            if ($response) {
                                $data_update['banner2'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img3']) && $_POST['hidden_img3']=='') {
                $data_update['banner2'] ='';
            }
            $this->Mcategory->insertData($data_update);
            $this->session->set_flashdata("flash_mess","Bạn đã thêm danh mục thành công.");
            redirect(base_url().'backend/category');
            
        }
    }
    public function updateSort(){
        if (isset($_POST['id_img'])) {
            if (is_numeric($_POST['id_img'])) {
                $id_slider=$_POST['id_img'];
                $sort=$_POST['sort'];
                $data_update=array(
                    'sort' =>$sort
                );
                $this->load->model('Mcategory');
                $success = $this->Mcategory->updateStatus($id_slider,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn vừa sắp xếp lại thứ tự danh mục!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn vừa sắp xếp thất bại thứ tự danh mục!'
                    );
                }
                echo json_encode($data);
            }
        }
    }
    
}