<?php
class Index extends AdminController{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] ="Webcome to Admin Control Panel ";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] ="index/index_view";
        $this->load->view($this->_data['path'],$this->_data);
    }
}