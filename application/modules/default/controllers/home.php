<?php
class Home extends MainController{
    protected $_data;
    public function __construct(){
        parent::__construct();
        // load address province
        $this->load->model('Maddress_province');
        $this->load->model('Maddress_district');
        $this->_data['province'] = $this->Maddress_province->getList();
    }
    public function index(){
        $this->_data['loadPage'] = "home/index_view";
        $this->load->model('Mslider');
        $this->load->model('Mproduct');
        $this->load->model('Mnews');

        $this->_data['getListCategory']=$this->Mproduct->getListCategoryLeft();
        $this->_data['getListCategoryMain']=$this->Mproduct->getListCategoryMain();
        
        $this->_data['slider']=$this->Mslider->listSlider();
        $this->_data['imageshomepage']=$this->Mslider->listImagesHome();
        $this->_data['comments']=$this->Mslider->listComments();
        $this->_data['partner']=$this->Mslider->listPartner();
        $this->_data['infohomepage']=$this->Mslider->getInfoHomePage();
        $this->_data['tintuc']=$this->Mnews->getListNewsByCategory(14);


        //$this->_data['catenewsAll'] = $this->Mnews->listAllCategoryNot3(array(7,8,9));

        $this->load->view($this->_data['path'],$this->_data);
    }
    public function contact(){
        if (isset($_POST['send_mess'])) {
            $name = trim(addslashes($this->input->post('name')));
            $email = trim(addslashes($this->input->post('email')));
            $mess = trim(addslashes($this->input->post('mess')));
            $phone = trim(addslashes($this->input->post('phone')));
            $data = array(
                'customers' => $name,
                'email' => $email,
                'content' => $mess,
                'phone' => $phone,
                'create_time' => time(),
            );
            $this->load->model('Mnews');
            $this->Mnews->insertContact($data);
            $this->_data['success'] = 'Cảm ơn bạn đã đóng góp ý kiến cho chúng tôi. Chúng tôi sẽ hồi âm bạn trong thời gian sớm nhất.';
        }
        $this->_data['loadPage'] = "home/contact_view";

        $this->load->view($this->_data['path'],$this->_data);
    }
    public function pages($id){
        $this->_data['loadPage'] = "home/pages_view";
        if (isset($id)) {
            $this->load->model('Mnews');
            $this->_data['data']=$this->Mnews->getPage($id);
            $this->_data['title']=$this->_data['data']['title'];
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => base_url()
                ),
            1 => array(
                'name' => $this->_data['data']['title'],
                'href'  => ''
                ),
            );
            $this->_data['description']=$this->_data['data']['description_short'];
        }


        $this->load->view($this->_data['path'],$this->_data);
    }
}