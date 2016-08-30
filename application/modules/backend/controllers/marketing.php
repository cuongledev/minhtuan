<?php
class Marketing extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('Memail_marketing');
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
        $this->_data['loadPage'] = "marketing/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/marketing/delAll";

        // phan trang
        $url = base_url()."$module/marketing/index";
        $lnc_total = $this->Memail_marketing->countAll();
        $per_page = 12;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Memail_marketing->listEmail($config['per_page'],$start);
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
        $this->load->model("Memail_marketing");
        $this->_data['title'] = "Chỉnh sửa email marketing";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Email Marketing',
                'href'  => base_url().$module.'/user/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa email',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="marketing/edit_view";
        $this->_data['info'] = $this->Memail_marketing->getEmailById($id);
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/marketing/updateEmail';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/marketing/index";

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
    public function updateEmail(){
        if (isset($_POST['luu'])) {
            $email = trim(addslashes($this->input->post('email')));
            $job = trim(addslashes($this->input->post('job')));
            $working_location = trim(addslashes($this->input->post('working_location')));
            $hidden_id = trim(addslashes($this->input->post('hidden_id')));
            $this->load->model("Memail_marketing");
            $data_update=array(
                'email' => $email,
                'job' => $job,
                'working_location' => $working_location,
            );
            $this->Memail_marketing->updateEmail($data_update,$hidden_id);

            $this->session->set_flashdata("flash_mess","Bạn đã chỉnh sửa email thành công.");
            redirect(base_url()."backend/marketing/index");
            
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
    public function insertEmail(){
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