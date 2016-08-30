<?php
class User extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('Mweb_users_admin');
        /*$this->load->model('Mweb_users_admin');
        $data_insert =array(
            'username' => 'quandv',
            'email' => 'quandv@gmail.com',
            'password' => md5('lnc'.'quandv'),
            'level' => 1,
        );
        $this->Mweb_users_admin->insertData($data_insert);die;*/

        $this->_data['title'] = "Tài khoản quản trị";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Tài khoản quản trị',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "user/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/user/delAll";

        // phan trang
        $url = base_url()."$module/user/index";
        $lnc_total = $this->Mweb_users_admin->countAll();
        $per_page = 12;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Mweb_users_admin->listUser($config['per_page'],$start);
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
                $id_user=$_POST['id_user'];
                $this->load->model('Mweb_users_admin');
                $success = $this->Mweb_users_admin->updateStatus($id_user,$data_update);
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
        $this->load->model("Mweb_users_admin");
        $this->_data['title'] = "Chỉnh sửa tài khoản";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Tài khoản quản trị',
                'href'  => base_url().$module.'/user/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa tài khoản',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="user/edit_view";
        $this->_data['info'] = $this->Mweb_users_admin->getUserById($id);
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/user/updateUser';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/user/index";

        $this->load->view($this->_data['path'],$this->_data);
        }
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mweb_users_admin");
            $this->Mweb_users_admin->delUser($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa tài khoản thành công.");
            redirect(base_url()."backend/user/index");
        }
    }
    public function updateUser(){
        if (isset($_POST['luu'])) {
            $username = $this->input->post('business');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hidden_id = $this->input->post('hidden_id');
            $this->load->model("Mweb_users_admin");
            $data_update=array(
                'username' => $username,
                'email' => $email,
                'password' => md5('lnc'.$password),
            );
            $this->Mweb_users_admin->updateUser($data_update,$hidden_id);

            $this->session->set_flashdata("flash_mess","Bạn đã chỉnh sửa tài khoản thành công.");
            redirect(base_url()."backend/user/index");
            
        }
    }
    public function add(){
        $this->_data['title'] = "Thêm mới tài khoản";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Tài khoản quản trị',
                'href'  => base_url().$module.'/user/index'
                ),
            1 => array(
                'name' => 'Thêm mới tài khoản',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="user/edit_view";
        $this->_data['action'] = base_url().'backend/user/insertUser';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->_data['link_button_back'] = base_url()."$module/user/index";
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertUser(){
        if (isset($_POST['luu'])) {
            $username = $this->input->post('business');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model("Mweb_users_admin");
            $data_insert=array(
                'username' => $username,
                'email' => $email,
                'password' => md5('lnc'.$password),
                'create_time' => time(),
                'level' => 1,
                'status' => 1,
            );
            $this->Mweb_users_admin->insertData($data_insert);

            $this->session->set_flashdata("flash_mess"," Bạn đã thêm mới tài khoản thành công.");
            redirect(base_url()."backend/user/index");
            
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
                    $this->load->model("Mweb_users_admin");
                    $succ = $this->Mweb_users_admin->checkEmail($email,$id="");
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
                $this->load->model('Mweb_users_admin');
                $this->Mweb_users_admin->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều tài khoản thành công.");
                redirect(base_url()."backend/user/index");
            }
        }
    }
}