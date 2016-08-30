<?php
class Infohomepage extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        /*$module = $this->uri->segment(1);
        $this->_data['module'] = $module;*/
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."index/index";
        $this->_data['title'] = "Quản trị nội dung trang chủ";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Nội dung cơ bản',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "infohomepage/index_view";
        $this->load->model('Minfohomepage');
        $this->_data['info'] = $this->Minfohomepage->getWhereId(1);
        
        
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function updateInfo(){
        $this->load->model('Minfohomepage');
        if (isset($_POST['luu'])) {
            $business= trim(addslashes($this->input->post('business')));
            $content= $this->input->post('content_editor_home');
            $data_update=array(
                'title'=> $business,
                'content'=> $content,
            );

            
        $this->Minfohomepage->updateWhereId($data_update,1);
        $this->session->set_flashdata("flash_mess","Bạn đã lưu nội dung trang thành công.");
        }
        redirect(base_url()."backend/infohomepage/index");
    }
}