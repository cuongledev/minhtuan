<?php
class Info extends AdminController{
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
                'name' => 'Thông tin cơ bản',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "info/index_view";
        $this->load->model('Mweb_settings');
        $this->_data['info'] = $this->Mweb_settings->getWhereId(1);
        
        // load address province
        $this->load->model('Maddress_province');
        $this->_data['province'] = $this->Maddress_province->getList();
        // load address district
        $this->load->model('Maddress_district');
        $this->_data['district'] = $this->Maddress_district->getList();

        

        
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function updateInfo(){
        $this->load->model('Mweb_settings');
        if (isset($_POST['luu'])) {
            $business= trim(addslashes($this->input->post('business')));
            $provinces= $this->input->post('provinces');
            $districid= $this->input->post('districid');
            $phone= trim(addslashes($this->input->post('phone')));
            $email= trim(addslashes($this->input->post('email')));
            $slogan= trim(addslashes($this->input->post('slogan')));
            $address= trim(addslashes($this->input->post('address')));
            $link_facebook= trim(addslashes($this->input->post('link_facebook')));
            $link_google= trim(addslashes($this->input->post('link_google')));
            $link_youtube= trim(addslashes($this->input->post('link_youtube')));
            $bank_user= trim(addslashes($this->input->post('bank_user')));
            $bank_code= trim(addslashes($this->input->post('bank_code')));
            $bank_name= trim(addslashes($this->input->post('bank_name')));
            $bank_chinhanh= trim(addslashes($this->input->post('bank_chinhanh')));
            $bank_tp= trim(addslashes($this->input->post('bank_tp')));
            $content_sidebar= trim(addslashes($this->input->post('content_sidebar')));
            $title_sidebar= trim(addslashes($this->input->post('title_sidebar')));
            $link_google_map= trim(addslashes($this->input->post('link_google_map')));
            
            $data_update=array(
                'name'=> $business,
                'slogan'=> $slogan,
                'phone'=> $phone,
                'email'=>   $email,
                'address'=> $address,
                'districtid'=> $districid,
                'provinceid' => $provinces,
                'link_facebook' => $link_facebook,
                'link_google' => $link_google,
                'link_youtube' => $link_youtube,
                'bank_user'=> $bank_user,
                'bank_code'=> $bank_code,
                'bank_name'=> $bank_name,
                'bank_chinhanh'=> $bank_chinhanh,
                'bank_tp'=> $bank_tp,
                'link_google_map'=> $link_google_map,
                'title_sidebar'=> $title_sidebar,
                'content_sidebar'=> $content_sidebar,
            );


            $file=dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/public/backend/images/'.$this->session->userdata('username');
            if (!is_dir($file)) {
                mkdir($file,0777);
            }else{
                chmod($file, 0777);
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
            if (!empty($_FILES['favicon_news'])) {
                        $end2 = strtolower(end(explode('.', $_FILES['favicon_news']['name'])));
                        if ($end2 == 'jpg' || $end2=='jpge'|| $end2=='gif' || $end2=='png') {
                            $renamed2 = uniqid(rand(), true).'.'."$end";
                            $target_file2 = $file.'/'. $renamed2;
                            $response2 = move_uploaded_file($_FILES['favicon_news']['tmp_name'],$target_file2); // Upload the file to the 
                            if ($response2) {
                                $data_update['icon'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed2;
                            }
                            
                        }
            }
            if (isset($_POST['hidden_img2']) && $_POST['hidden_img2']=='') {
                $data_update['icon'] ='';
            }
            if (!empty($_FILES['file_contact'])) {
                        $end = strtolower(end(explode('.', $_FILES['file_contact']['name'])));
                        if ($end == 'jpg' || $end=='jpge'|| $end=='gif' || $end=='png') {
                            $renamed = uniqid(rand(), true).'.'."$end";
                            $target_file = $file.'/'. $renamed;
                            $response = move_uploaded_file($_FILES['file_contact']['tmp_name'],$target_file); // Upload the file to the 
                            if ($response) {
                                $data_update['contact_thumbnail'] ='public/backend/images/'.$this->session->userdata('username').'/'. $renamed;
                            }
                        }
            }
            if (isset($_POST['hidden_img_contact']) && $_POST['hidden_img_contact']=='') {
                $data_update['contact_thumbnail'] ='';
            }
            $success=$this->Mweb_settings->updateWhereId($data_update,1);
               $this->session->set_flashdata("flash_mess","Bạn đã lưu thông tin cài đặt thành công.");
        }
        redirect(base_url()."backend/info/index");
    }
    public function loadDitrict(){
        if (isset($_POST['provinces']) && is_numeric($_POST['provinces'])) {
            $provinces = $_POST['provinces'];
            $this->load->model('Maddress_district');
            $data = $this->Maddress_district->getListWhereProvinceId($provinces);
            echo json_encode($data);
        }
    }
}