<?php
class Category_news extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        /*$module = $this->uri->segment(1);
        $this->_data['module'] = $module;*/
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."index/index";
        $this->_data['title'] = "Quản lý danh mục tin tức";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý danh mục tin tức',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "category_news/index_view";
        $this->load->model('Mcategory_news');

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/category_news/delAll";

        // phan trang
        $url = base_url()."$module/category_news/index";
        $lnc_total = $this->Mcategory_news->countAll();
        $per_page = 50;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Mcategory_news->listCategory($config['per_page'],$start);
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
                $this->load->model('Mcategory_news');
                $success = $this->Mcategory_news->updateStatus($id_cate,$data_update);
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
    public function edit($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
        $this->load->model("Mcategory_news");
        $this->_data['title'] = "Chỉnh sửa danh mục";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý danh mục',
                'href'  => base_url().$module.'/category_news/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa danh mục',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="category_news/edit_view";
        $this->_data['info'] = $this->Mcategory_news->getCateById($id);
        $this->_data['menu'] = $this->Mcategory_news->listAllCate();

        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/category_news/updateCate';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/category_news/index";

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
        $this->load->model("Mcategory_news");
        if (isset($_POST['luu'])) {
            $hidden_id = trim(addslashes($this->input->post('hidden_id')));
            $title = trim(addslashes($this->input->post('title')));
            $alias = trim(addslashes($this->input->post('alias')));
            $parent_id = trim(addslashes($this->input->post('parent_id')));
            $data_update=array(
                'title' => $title,
                'alias' => $alias,
                'parent_id' => $parent_id,
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
            $this->Mcategory_news->updateWhereId($data_update,$hidden_id);
            $this->session->set_flashdata("flash_mess","Bạn đã chỉnh sửa thành công.");
            redirect(base_url().'backend/category_news');
        }
              
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mcategory_news");
            $this->Mcategory_news->delCate($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa danh mục thành công.");
            redirect(base_url()."backend/category_news");
        }
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Mcategory_news');
                $this->Mcategory_news->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều danh mục thành công.");
                redirect(base_url()."backend/category_news");
            }
        }
    }
    public function add(){
        $this->load->model("Mcategory_news");
        $this->_data['title'] = "Thêm mới danh mục";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['menu'] = $this->Mcategory_news->listAllCate();
        $this->_data['loadPage']="category_news/edit_view";
        $this->_data['action'] = base_url().'backend/category_news/insertCategory';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['link_button_back'] = base_url()."$module/category_news/index";
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertCategory(){
        $this->load->model('Mcategory_news');
        if (isset($_POST['luu'])) {
            $title = trim(addslashes($this->input->post('title')));
            $alias = trim(addslashes($this->input->post('alias')));
            $parent_id = trim(addslashes($this->input->post('parent_id')));
            $data_update=array(
                'title' => $title,
                'alias' => $alias,
                'parent_id' => $parent_id,
                'create_uid' => $this->session->userdata('id'),
                'status' => 1,
            );
            // upload images 
            $file=dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/public/backend/images/'.$this->session->userdata('username');
            if (!is_dir($file)) {
                mkdir($file,0777);
            }
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
            $this->Mcategory_news->insertData($data_update);
            $this->session->set_flashdata("flash_mess","Bạn đã thêm danh mục thành công.");
            redirect(base_url().'backend/category_news');
            
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
                $this->load->model('Mcategory_news');
                $success = $this->Mcategory_news->updateStatus($id_slider,$data_update);
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