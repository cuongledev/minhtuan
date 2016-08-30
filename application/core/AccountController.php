<?php
class AccountController extends MY_Controller{
    protected $_data;
    public function __construct(){
        parent::__construct();
        $mod = $this->router->fetch_module();
        $this->_data['module'] = $mod;
        $this->_data['path'] ="$mod/template";
        $this->load->model('Mweb_settings');
        $this->_data['info'] = $this->Mweb_settings->getWhereId(1);
        $this->_data['title'] = $this->_data['info']['slogan'];
        if (!$this->session->userdata('students') || !$this->session->userdata('email')){
            redirect(base_url()."students/login");
        }
    }
}