<?php
class Pages extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        /*$module = $this->uri->segment(1);
        $this->_data['module'] = $module;*/
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."index/index";
        $this->_data['title'] = "Quản trị - Thông tin cơ bản";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý Pages',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "pages/index_view";
        $this->load->model('Mpages');

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/pages/delAll";

        // phan trang
        $url = base_url()."$module/pages/index";
        $lnc_total = $this->Mpages->countAll();
        $per_page = 12;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Mpages->listPages($config['per_page'],$start);
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
                $id_pages=$_POST['id_pages'];
                $this->load->model('Mpages');
                $success = $this->Mpages->updateStatus($id_pages,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái pages!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái pages!'
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
        $this->load->model("Mpages");
        $this->_data['title'] = "Chỉnh sửa pages";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý Pages',
                'href'  => base_url().$module.'/pages/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa Pages',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="pages/edit_view";
        $this->_data['info'] = $this->Mpages->getPagesById($id);
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/pages/updatePages';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/pages/index";

        $this->load->view($this->_data['path'],$this->_data);
        }
    }
    public function add(){
        $this->_data['title'] = "Thêm mới pages";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['loadPage']="pages/edit_view";
        $this->_data['action'] = base_url().'backend/pages/insertPages';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['link_button_back'] = base_url()."$module/pages/index";
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertPages(){
        $this->load->model('Mpages');
        if (isset($_POST['luu'])) {
            $title = trim(addslashes($this->input->post('title')));
            $alias = trim(addslashes($this->input->post('alias')));
            $description = trim(addslashes($this->input->post('description_short')));
            $content_editor_pages = $this->input->post('content_editor_pages');
            $data_update=array(
                'title' => $title,
                'alias' => $alias,
                'description_short' => $description,
                'content' => $content_editor_pages,
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
            $this->Mpages->insertData($data_update);
            $this->session->set_flashdata("flash_mess","Bạn đã thêm bài viết thành công.");
            redirect(base_url().'backend/pages');
            
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
    public function updatePages(){
        $this->load->model("Mpages");
        if (isset($_POST['luu'])) {
            $hidden_id = trim(addslashes($this->input->post('hidden_id')));
            $title = trim(addslashes($this->input->post('title')));
            $alias = trim(addslashes($this->input->post('alias')));
            $description = trim(addslashes($this->input->post('description_short')));
            $content_editor_pages = $this->input->post('content_editor_pages');
            $data_update=array(
                'title' => $title,
                'alias' => $alias,
                'description_short' => $description,
                'content' => $content_editor_pages,
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
            $this->Mpages->updateWhereId($data_update,$hidden_id);
            $this->session->set_flashdata("flash_mess","Bạn đã chỉnh sửa thành công.");
            redirect(base_url().'backend/pages');
        }
              
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mpages");
            $this->Mpages->delPages($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa bài viết thành công.");
            redirect(base_url()."backend/pages/index");
        }
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Mpages');
                $this->Mpages->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều bài viết thành công.");
                redirect(base_url()."backend/pages/index");
            }
        }
    }
}