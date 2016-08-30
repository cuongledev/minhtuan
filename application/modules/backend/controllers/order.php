<?php
class Order extends AdminController{
    protected $_data;
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        /*$module = $this->uri->segment(1);
        $this->_data['module'] = $module;*/
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."index/index";
        $this->_data['title'] = "Quản lý sản phẩm";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý Sản phẩm',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "order/index_view";
        $this->load->model('Morder');

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        $this->_data['action'] = base_url()."$module/order/delAll";

        // phan trang
        $url = base_url()."$module/order/index";
        $lnc_total = $this->Morder->countAll();
        $per_page = 12;
        $uri_segment = 4;
        $config = config_pagi($url,$lnc_total,$per_page,$uri_segment);

        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['data'] = $this->Morder->listProduct($config['per_page'],$start);

        $this->_data['mess'] = $this->session->flashdata("flash_mess");

        $this->load->view($this->_data['path'],$this->_data);
    }
    public function detail($id){
        $this->_data['link_button_back'] = base_url()."backend/order/index";
        $this->_data['loadPage']="order/detail_view";

        if (isset($id)) {
            $this->load->model('Morder');
            $this->_data['info'] = $this->Morder->getOrderById($id);
        }

        $this->load->view($this->_data['path'],$this->_data);
    }
    public function delAll(){
        if (isset($_POST['confirm_all'])) {
            if (!empty($_POST['name_id']) &&  is_array($_POST['name_id'])) {
                $names_id = $_POST['name_id'];
                $this->load->model('Morder');
                $this->Morder->dellWhereInArray($names_id);
                $this->session->set_flashdata("flash_mess"," Bạn vừa xóa nhiều đơn hàng thành công.");
                redirect(base_url()."backend/order/index");
            }
        }
    }
    public function del($id){
        $id= base64url_decode($id);
        if (isset($id) && is_numeric($id)) {
            $this->load->model("Morder");
            $this->Morder->delCate($id);
            $this->session->set_flashdata("flash_mess","Bạn vừa xóa đơn hàng thành công.");
            redirect(base_url()."backend/order/index");
        }
    }
}