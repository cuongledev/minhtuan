<?php
class Partner extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('Mpartner');
        $this->_data['title'] = "Quản lý bình luận đối tác";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý bình luận đối tác',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "partner/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/partner/delAll";

        // phan trang
        $url = base_url()."$module/partner/index";
        $lnc_total = $this->Mpartner->countAll();
        $per_page = 12;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Mpartner->listSlider($config['per_page'],$start);
        $this->_data['mess'] = $this->session->flashdata("flash_mess");

        
        $this->load->view("$module/template",$this->_data);
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
                $id_slider=$_POST['id_slider'];
                $this->load->model('Mpartner');
                $success = $this->Mpartner->updateStatus($id_slider,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái bình luận đối tác!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái bình luận đối tác!'
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
        $this->load->model("Mpartner");
        $this->_data['title'] = "Chỉnh sửa bình luận đối tác";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý bình luận đối tác',
                'href'  => base_url().$module.'/partner/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa bình luận đối tác',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="partner/edit_view";
        $this->_data['info'] = $this->Mpartner->getSliderById($id);
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/partner/updateSlider';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/partner/index";

        $this->load->view($this->_data['path'],$this->_data);
        }
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mpartner");
            $this->Mpartner->delSlider($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa bình luận đối tác thành công.");
            redirect(base_url()."backend/partner/index");
        }
    }
    public function updateSlider(){
        if (isset($_POST['luu'])) {
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $description = $this->input->post('description');

            $hidden_id = $this->input->post('hidden_id');

            $this->load->model("Mpartner");
            $data_update=array(
                'title' => $title,
                'description' => $description,
                'link' => $link,
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
                                $data_update['images'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['images'] ='';
            }



            $this->Mpartner->updateSlider($data_update,$hidden_id);

            $this->session->set_flashdata("flash_mess","Bạn đã chỉnh sửa bình luận đối tác thành công.");
            redirect(base_url()."backend/partner/index");
            
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
                $this->load->model('Mpartner');
                $success = $this->Mpartner->updateStatus($id_slider,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn vừa sắp xếp lại thứ tự bình luận đối tác!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn vừa sắp xếp thất bại thứ tự bình luận đối tác!'
                    );
                }
                echo json_encode($data);
            }
        }
    }
    public function add(){
        $this->_data['title'] = "Thêm mới bình luận đối tác";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý bình luận đối tác',
                'href'  => base_url().$module.'/partner/index'
                ),
            1 => array(
                'name' => 'Thêm mới bình luận đối tác',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="partner/edit_view";
        $this->_data['action'] = base_url().'backend/partner/insertSlider';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['link_button_back'] = base_url()."$module/partner/index";
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertSlider(){
        if (isset($_POST['luu'])) {



            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $description = $this->input->post('description');

            $this->load->model("Mpartner");
            $data_insert=array(
                'title' => $title,
                'description' => $description,
                'link' => $link,
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
                                $data_insert['images'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_insert['images'] ='';
            }

            $this->Mpartner->insertData($data_insert);

            $this->session->set_flashdata("flash_mess"," Bạn đã thêm mới bình luận đối tác thành công.");
            redirect(base_url()."backend/partner/index");
            
        }
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Mpartner');
                $this->Mpartner->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều bình luận đối tác thành công.");
                redirect(base_url()."backend/partner/index");
            }
        }
    }
}