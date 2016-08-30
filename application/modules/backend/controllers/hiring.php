<?php
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
* file: controller(Hiring.php)
*/
class Hiring extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('Mhiring');
        $this->_data['title'] = "Quản lý tài khoản hr";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tài khoản hr',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "hiring/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/hiring/delAll";
        $this->_data['action_search'] = base_url()."$module/hiring/index";

        if (isset($_GET['search'])) {
            $data_search = array(
                'title' => $this->input->get('info_title'),
                'status' => $this->input->get('status_info'),
                'email' => $this->input->get('email'),
            );
            $this->_data['data']=$this->Mhiring->querySearch($data_search);
        }else{
            // phan trang
            $url = base_url()."$module/hiring/index";
            $lnc_total = $this->Mhiring->countAll();
            $per_page = 12;
            $uri_segment = 4;
            $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

            $this->load->library('pagination',$config);
            $this->_data['page_link'] = $this->pagination->create_links();
            $start = $this->uri->segment(4);
            $this->_data['data'] = $this->Mhiring->joinCompany($config['per_page'],$start);
        }
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
                $id_com=$_POST['id_com'];
                $this->load->model('Mhiring');
                $success = $this->Mhiring->updateStatus($id_com,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái tài khoản!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái tài khoản!'
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
        $this->load->model("Mhiring");
        $this->_data['title'] = "Chỉnh sửa tài khoản nhân viên tuyển dụng";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tài khoản hr',
                'href'  => base_url().$module.'/hiring/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa tài khoản hr',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="hiring/edit_view";
        $this->_data['info'] = $this->Mhiring->getHiringById($id);
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/hiring/updateHiring';
        $this->_data['link_button_back'] = base_url().'backend/hiring/index';
        $this->_data['lang_button'] = 'Lưu';

        $this->load->view($this->_data['path'],$this->_data);
        }
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mhiring");
            $this->Mhiring->delHiring($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa tài khoản nhân viên tuyển dụng thành công.");
            redirect(base_url()."backend/hiring/index");
        }
    }
    public function updateHiring(){
        $this->load->model('Mhiring');
        if (isset($_POST['luu'])) {
            $fullname= $this->input->post('fullname');
            $password= $this->input->post('password');
            $phone= $this->input->post('phone');
            $email= $this->input->post('email');
            $id= $this->input->post('hidden_id');
            $data_update=array(
                'fullname'=> $fullname,
                'phone'=> $phone,
                'email'=>   $email,
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
                                $data_update['avatar'] =base_url().'public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['avatar'] ='';
            }
            if (isset($id) && is_numeric($id)) {
                if ($password!='') {
                    $data_update['password'] =  md5('lnc'.$password);
                }
                $this->Mhiring->updateHiring($data_update,$id);
            }
            
            $this->session->set_flashdata("flash_mess","Bạn đã sửa thông tin tài khoản nhân viên tuyển dụng thành công.");
            redirect(base_url()."backend/hiring/index");
        }
    }
    public function add(){
        $this->_data['title'] = "Thêm nhân viên tuyển dụng mới";
        
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Tài khoản hr',
                'href'  => base_url().$module.'/company/index'
                ),
            1 => array(
                'name' => 'Thêm nhân viên tuyển dụng mới',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="hiring/edit_view";
        $this->_data['action'] = base_url().'backend/hiring/insertHiring';
        $this->_data['link_button_back'] = base_url().'backend/hiring/index';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['required'] = '<span class="required">*</span>';
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertHiring(){
        $this->load->model('Mhiring');
        if (isset($_POST['luu'])) {
            $fullname= $this->input->post('fullname');
            $phone= $this->input->post('phone');
            $password= $this->input->post('password');
            $email= $this->input->post('email');
            //$id= $this->input->post('hidden_id');
            $data_update=array(
                'fullname'=> $fullname,
                'phone'=> $phone,
                'email'=>   $email,
                'status' => 1,
                'create_time' => time(),
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
                                $data_update['avatar'] =base_url().'public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['avatar'] ='';
            }
            if ($password!='') {
                    $data_update['password'] = md5('lnc'.$password);
                }
            $this->Mhiring->insertHiring($data_update);
            
            $this->session->set_flashdata("flash_mess"," Bạn đã thêm tài khoản nhân viên tuyển dụng mới thành công.");
            redirect(base_url()."backend/hiring/index");
            
        }
    }
    public function checkUser(){
        if (isset($_POST['name'])) {
            $name = $this->input->post('name');
            $this->load->model("Mweb_users_admin");
            $succ = $this->Mweb_users_admin->checkUserName($name,$id="");
            if ($succ== TRUE) {
                $data = array(
                    'status' => true,
                    'mess' => 'Bạn có thể sử dụng tên tài khoản này'
                );
            }else{
                $data = array(
                    'status' => false,
                    'mess' => 'Tên tài khoản này đã có, mời bạn chọn tên khác!'
                );
            }
            echo json_encode($data);
        }
        
    }
    public function checkEmail(){
        if (isset($_POST['email'])) {
            $email = $this->input->post('email');
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $this->load->model("Mhiring");
                    $succ = $this->Mhiring->checkEmail($email,$id="");
                    if ($succ== TRUE) {
                        $data = array(
                            'status' => true,
                            'mess' => 'Bạn có thể sử dụng Email này!'
                        );
                    }else{
                        $data = array(
                            'status' => false,
                            'mess' => 'Email này đã có, mời bạn chọn email khác!'
                        );
                    }
            } else {
                 $data = array(
                            'status' => false,
                            'mess' => 'Email này không hợp lê, mời bạn nhập lại!'
                        );
            }
            
            echo json_encode($data);
        }
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Mhiring');
                $this->Mhiring->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều tài khoản nhân viên tuyển dụng thành công.");
                redirect(base_url()."backend/hiring/index");
            }
        }
    }
}