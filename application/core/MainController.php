<?php
class MainController extends MY_Controller{
    protected $_data;
    public function __construct(){
        parent::__construct();
        $mod = $this->router->fetch_module();
        $this->_data['module'] = $mod;
        $this->_data['path'] ="$mod/template";
        $this->load->model('Mweb_settings');
        $this->load->model('Mproduct');
        $this->load->model('Maddress_province');
        $this->load->model('Maddress_district');
        $this->load->library('cart');
        $this->_data['info'] = $this->Mweb_settings->getWhereId(1);
        $this->_data['menu'] = $this->Mweb_settings->getMenuTop();
        $this->_data['title'] = $this->_data['info']['slogan'];
        $this->_data['footer_cate'] = $this->Mproduct->getListCategoryFooter();
        $this->_data['province_home']=$this->Maddress_province->getRowWhereProvinceId($this->_data['info']['provinceid']);
        $this->_data['district_home']=$this->Maddress_district->getRowWhereDistrictId($this->_data['info']['districtid']);
        /*if($this->session->userdata("admin_level") != 1 && $this->uri->segment(2) != "verify"){
            redirect(base_url()."$mod/verify/login");
        }*/
        
    }
}