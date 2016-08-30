<?php
class Category_widget extends AdminController{
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
                'name' => 'Quản lý Widget',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "category_widget/index_view";
        $this->load->model('Mcategory_widget');

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/category_widget/delAll";

        // phan trang
        $url = base_url()."$module/category_widget/index";
        $lnc_total = $this->Mcategory_widget->countAll();
        $per_page = 50;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Mcategory_widget->listCategory($config['per_page'],$start);
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
                $this->load->model('Mcategory_widget');
                $success = $this->Mcategory_widget->updateStatus($id_cate,$data_update);
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
        $this->load->model("Mcategory_widget");
        $this->_data['title'] = "Chỉnh sửa widget";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý danh mục',
                'href'  => base_url().$module.'/category_widget/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa danh mục',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="category_widget/edit_view";
        $this->_data['info'] = $this->Mcategory_widget->getCateById($id);
        $this->_data['categoryProduct']=$this->Mcategory_widget->loadWidgetNews();
        $this->_data['menu'] = $this->Mcategory_widget->listAllCate();

        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/category_widget/updateCate';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/category_widget/index";

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
        $this->load->model("Mcategory_widget");
        if (isset($_POST['luu'])) {
            $hidden_id = trim(addslashes($this->input->post('hidden_id')));
            $title = trim(addslashes($this->input->post('title')));
            $alias = trim(addslashes($this->input->post('alias')));
            $parent_id = trim(addslashes($this->input->post('parent_id')));
            $content_editor_category = $this->input->post('content_editor_category');
            $data_update=array(
                'title' => $title,
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
            $this->Mcategory_widget->updateWhereId($data_update,$hidden_id);
            $this->session->set_flashdata("flash_mess","Bạn đã chỉnh sửa thành công.");
            redirect(base_url().'backend/category_widget');
        }
              
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mcategory_widget");
            $this->Mcategory_widget->delCate($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa widget thành công.");
            redirect(base_url()."backend/category_widget");
        }
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Mcategory_widget');
                $this->Mcategory_widget->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều danh mục thành công.");
                redirect(base_url()."backend/category_widget");
            }
        }
    }
    public function add(){
        $this->load->model("Mcategory_widget");
        $this->_data['title'] = "Thêm mới danh mục";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['menu'] = $this->Mcategory_widget->listAllCate();
        $this->_data['loadPage']="category_widget/edit_view";
        $this->_data['categoryProduct']=$this->Mcategory_widget->loadWidgetNews();

        $this->_data['action'] = base_url().'backend/category_widget/insertCategory';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['link_button_back'] = base_url()."$module/category_widget/index";
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertCategory(){
        $this->load->model('Mcategory_widget');
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
            $this->Mcategory_widget->insertData($data_update);
            $this->session->set_flashdata("flash_mess","Bạn đã thêm danh mục thành công.");
            redirect(base_url().'backend/category_widget');
            
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
                $this->load->model('Mcategory_widget');
                $success = $this->Mcategory_widget->updateStatus($id_slider,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn vừa sắp xếp lại thứ tự widget!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn vừa sắp xếp thất bại thứ tự widget!'
                    );
                }
                echo json_encode($data);
            }
        }
    }
    
}