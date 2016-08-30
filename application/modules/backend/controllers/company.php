<?php
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
* file: controller(company.php)
*/
class Company extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('Mcompany');
        $this->_data['title'] = "Quản lý hồ sơ công ty";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý hồ sơ công ty',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "company/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/company/delAll";
        $this->_data['action_search'] = base_url()."$module/company/index";

        if (isset($_GET['search'])) {
            $data_search = array(
                'title' => $this->input->get('info_title'),
                'status' => $this->input->get('status_info'),
            );
            $this->_data['data']=$this->Mcompany->querySearch($data_search);
        }else{
            // phan trang
            $url = base_url()."$module/company/index";
            $lnc_total = $this->Mcompany->countAll();
            $per_page = 12;
            $uri_segment = 4;
            $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

            $this->load->library('pagination',$config);
            $this->_data['page_link'] = $this->pagination->create_links();
            $start = $this->uri->segment(4);
            $this->_data['data'] = $this->Mcompany->listCompany($config['per_page'],$start);
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
                $this->load->model('Mcompany');
                $success = $this->Mcompany->updateStatus($id_com,$data_update);
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
        $this->load->model("Mcompany");
        $this->_data['title'] = "Chỉnh sửa hồ sơ công ty";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Hồ sơ công ty',
                'href'  => base_url().$module.'/company/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa hồ sơ công ty',
                'href'  => ''
                ),
            );
        // load address province
        $this->load->model('Maddress_province');
        $this->_data['province'] = $this->Maddress_province->getList();
        // load address district
        $this->load->model('Maddress_district');
        // load Company industry
        //$this->load->model('Mcompany_industry');
        /*$industry = $this->Mcompany_industry->listCompanyIndustry();
        foreach ($industry as $key => $value) {
                $skill_title[] =  $value['title'];
            }*/
        //$this->_data['arrList'] = '["' . implode('", "', $skill_title) . '"]';// chuyển thành arr trong js

        $this->_data['district'] = $this->Maddress_district->getList();
        $this->_data['loadPage']="company/edit_view";
        $this->_data['info'] = $this->Mcompany->getComById($id);
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/company/updateCompany';
        $this->_data['link_button_back'] = base_url().'backend/company/index';
        $this->_data['lang_button'] = 'Lưu';

        $this->load->view($this->_data['path'],$this->_data);
        }
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mcompany");
            $this->Mcompany->delCom($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa hồ sơ công ty thành công.");
            redirect(base_url()."backend/company/index");
        }
    }
    public function updateCompany(){
        $this->load->model('Mcompany');
        if (isset($_POST['luu'])) {
            $company_name= $this->input->post('company_name');
            $gpkd= $this->input->post('gpkd');
            $boss= $this->input->post('boss');
            $company_website= $this->input->post('company_website');
            $location_of_hiring= $this->input->post('location_of_hiring');
            $fields= $this->input->post('fields');
            $description= $this->input->post('description');
            $provinces= $this->input->post('provinces');
            $districid= $this->input->post('districid');
            $phone= $this->input->post('phone');
            $email= $this->input->post('email');
            $address= $this->input->post('address');
            $id= $this->input->post('hidden_id');
            $data_update=array(
                'company_name'=> $company_name,
                'gpkd'=> $gpkd,
                'boss'=> $boss,
                'company_website'=> $company_website,
                'location_of_hiring'=> $location_of_hiring,
                'fields'=> $fields,
                'description'=> $description,
                'phone'=> $phone,
                'email'=>   $email,
                'address'=> $address,
                'districtid'=> $districid,
                'provinceid' => $provinces,
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
                                $data_update['logo'] =base_url().'public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['logo'] ='';
            }
            if (isset($id) && is_numeric($id)) {
                $this->Mcompany->updateCompany($data_update,$id);
            }
            
            $this->session->set_flashdata("flash_mess","Bạn đã lưu thông tin công ty thành công.");
            redirect(base_url()."backend/company/index");
        }
    }
    public function add(){
        $this->_data['title'] = "Thêm hồ sơ công ty mới";
        // load address province
        $this->load->model('Maddress_province');
        $this->_data['province'] = $this->Maddress_province->getList();
        // load address district
        $this->load->model('Maddress_district');
        $this->_data['district'] = $this->Maddress_district->getList();
        
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Hồ sơ công ty',
                'href'  => base_url().$module.'/company/index'
                ),
            1 => array(
                'name' => 'Thêm mới hồ sơ công ty',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="company/edit_view";
        $this->_data['action'] = base_url().'backend/company/insertCompany';
        $this->_data['link_button_back'] = base_url().'backend/company/index';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertCompany(){
        $this->load->model('Mcompany');
        if (isset($_POST['luu'])) {
            $company_name= $this->input->post('company_name');
            $gpkd= $this->input->post('gpkd');
            $boss= $this->input->post('boss');
            $company_website= $this->input->post('company_website');
            $location_of_hiring= $this->input->post('location_of_hiring');
            $fields= $this->input->post('fields');
            $description= $this->input->post('description');
            $provinces= $this->input->post('provinces');
            $districid= $this->input->post('districid');
            $phone= $this->input->post('phone');
            $email= $this->input->post('email');
            $address= $this->input->post('address');
            //$id= $this->input->post('hidden_id');
            $data_update=array(
                'company_name'=> $company_name,
                'gpkd'=> $gpkd,
                'boss'=> $boss,
                'company_website'=> $company_website,
                'location_of_hiring'=> $location_of_hiring,
                'fields'=> $fields,
                'description'=> $description,
                'phone'=> $phone,
                'email'=>   $email,
                'address'=> $address,
                'districtid'=> $districid,
                'provinceid' => $provinces,
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
                                $data_update['logo'] =base_url().'public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['logo'] ='';
            }
            $this->Mcompany->insertCompany($data_update);
            
            $this->session->set_flashdata("flash_mess"," Bạn đã thêm hồ sơ công ty mới thành công.");
            redirect(base_url()."backend/company/index");
            
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
                $this->load->model('Mcompany');
                $this->Mcompany->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều hồ sơ công ty thành công.");
                redirect(base_url()."backend/company/index");
            }
        }
    }
}