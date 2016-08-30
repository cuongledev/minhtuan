<?php
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
* file: controller(schools.php)
*/
class Schools extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->model('Mschools');
        $this->_data['title'] = "Quản lý trường học";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý trường học',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "schools/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/schools/delAll";
        $this->_data['action_search'] = base_url()."$module/schools/index";
        if (isset($_GET['search'])) {
            $data_search = array(
                'title' => $this->input->get('info_title'),
                'status' => $this->input->get('status_info'),
            );
            $this->_data['data']=$this->Mschools->querySearch($data_search);
        }else{
            // phan trang
            $url = base_url()."$module/schools/index";
            $lnc_total = $this->Mschools->countAll();
            $per_page = 12;
            $uri_segment = 4;
            $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

            $this->load->library('pagination',$config);
            $this->_data['page_link'] = $this->pagination->create_links();
            $start = $this->uri->segment(4);
            $this->_data['data'] = $this->Mschools->listSchools($config['per_page'],$start);
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
                $this->load->model('Mschools');
                $success = $this->Mschools->updateStatus($id_com,$data_update);
                if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái trường học!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái trường học!'
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
        $this->load->model("Mschools");
        $this->_data['title'] = "Chỉnh sửa hồ sơ trường";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Hồ sơ công ty',
                'href'  => base_url().$module.'/schools/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa hồ sơ trường',
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
        $this->_data['loadPage']="schools/edit_view";
        $this->_data['info'] = $this->Mschools->getSchoolsById($id);
        $this->_data['info']['id'] = $id;
        $this->_data['action'] = base_url().'backend/schools/updateSchools';
        $this->_data['link_button_back'] = base_url().'backend/schools/index';
        $this->_data['lang_button'] = 'Lưu';

        $this->load->view($this->_data['path'],$this->_data);
        }
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Mschools");
            $this->Mschools->delSchool($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa hồ sơ trường thành công.");
            redirect(base_url()."backend/schools/index");
        }
    }
    public function updateSchools(){
        $this->load->model('Mschools');
        if (isset($_POST['luu'])) {
            $title= $this->input->post('title');
            $provinces= $this->input->post('provinces');
            $districid= $this->input->post('districid');
            $phone= $this->input->post('phone');
            $email= $this->input->post('email');
            $address= $this->input->post('address');
            $specialized= $this->input->post('specialized');
            $founding= $this->input->post('founding');
            $type= $this->input->post('type');
            $id= $this->input->post('hidden_id');
            $data_update=array(
                'title'=> $title,
                'specialized'=> $specialized,
                'founding'=> $founding,
                'type'=> $type,
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
                                $data_update['logo'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['logo'] ='';
            }
            if (isset($id) && is_numeric($id)) {
                $this->Mschools->updateSchools($data_update,$id);
            }
            
            $this->session->set_flashdata("flash_mess","Bạn đã lưu thông tin trường thành công.");
            redirect(base_url()."backend/schools/index");
        }
    }
    public function add(){
        $this->_data['title'] = "Thêm hồ sơ trường mới";
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
                'name' => 'Hồ sơ trường học',
                'href'  => base_url().$module.'/schools/index'
                ),
            1 => array(
                'name' => 'Thêm mới trường học',
                'href'  => ''
                ),
            );
        $this->_data['loadPage']="schools/edit_view";
        $this->_data['action'] = base_url().'backend/schools/insertSchools';
        $this->_data['link_button_back'] = base_url().'backend/schools/index';
        $this->_data['lang_button'] = 'Thêm mới';
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function insertSchools(){
        $this->load->model('Mschools');
        if (isset($_POST['luu'])) {
            $title= $this->input->post('title');
            $provinces= $this->input->post('provinces');
            $districid= $this->input->post('districid');
            $phone= $this->input->post('phone');
            $email= $this->input->post('email');
            $address= $this->input->post('address');
            $specialized= $this->input->post('specialized');
            $founding= $this->input->post('founding');
            $type= $this->input->post('type');
            //$id= $this->input->post('hidden_id');
            $data_update=array(
                'title'=> $title,
                'specialized'=> $specialized,
                'founding'=> $founding,
                'type'=> $type,
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
                                $data_update['logo'] = 'public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img1']) && $_POST['hidden_img1']=='') {
                $data_update['logo'] ='';
            }
            $this->Mschools->insertSchools($data_update);
            
            $this->session->set_flashdata("flash_mess"," Bạn đã thêm hồ sơ công ty mới thành công.");
            redirect(base_url()."backend/schools/index");
            
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
                $this->load->model('Mschools');
                $this->Mschools->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều hồ sơ công ty thành công.");
                redirect(base_url()."backend/schools/index");
            }
        }
    }
}