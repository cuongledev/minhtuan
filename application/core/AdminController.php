<?php
class AdminController extends MY_Controller{
    protected $_data;
    public function __construct(){
        parent::__construct();
        $mod = $this->router->fetch_module();
        $this->_data['module'] = $mod;
        $this->_data['path'] ="$mod/template";
        if($this->session->userdata("admin_level") != 1 && $this->uri->segment(2) != "verify"){
            redirect(base_url()."$mod/verify/login");
        }
    }
}