<?php
class News extends MainController{
    protected $_data;
    public function __construct(){
        parent::__construct();
        // load address province
        $this->load->model('Mproduct');
        $this->_data['getListCategory']=$this->Mproduct->getListCategoryLeft();
    }
    public function index(){
        $this->_data['loadPage'] = "news/index_view";
        $this->_data['title'] = 'Tin tức';
        $this->load->model('Mnews');


        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => base_url()
                ),
            1 => array(
                'name' => 'Tin tức',
                'href'  => ''
                ),
            );
        if (isset($_GET['input_search'])) {
            $search = trim(addslashes($this->input->get('input_search')));
            $this->_data['data'] = $this->Mnews->search($search);
            $this->_data['keywords'] = $search;
        }else{
            // phan trang
            $url = base_url()."news";
            $lnc_total = $this->Mnews->countAll();
            $per_page = 15;
            $uri_segment = 2;
            $config = config_pagi_right($url,$lnc_total,$per_page,$uri_segment);

            $this->load->library('pagination',$config);
            $this->_data['page_link'] = $this->pagination->create_links();
            $start = $this->uri->segment(2);
            $this->_data['data'] = $this->Mnews->listNews($config['per_page'],$start);
        }
        


        $this->load->view($this->_data['path'],$this->_data);
    }
    public function detail($id){
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => base_url()
                ),
            1 => array(
                'name' => 'Tin tức',
                'href'  => base_url().'news'
                ),
            );
        $this->_data['loadPage'] = "news/detail_view";
        $this->load->model('Mnews');
        if (isset($id)) {
            
            $this->_data['data']=$this->Mnews->detail($id);
            $cate = $this->Mnews->getCategoryNew($this->_data['data']['cat_id']);
            $page_breadcrumb2 = array(
                array(
                    'name' => $cate['title'],
                    'href'  => base_url().'c'.$cate['id'].'-'.$cate['alias'].'.htm'
                ),
                array(
                    'name' => $this->_data['data']['title'],
                    'href'  => ''
                )
            );
            $this->_data['page_breadcrumb']=array_merge($this->_data['page_breadcrumb'],$page_breadcrumb2);
            $this->_data['title'] = $this->_data['data']['title'];
            $this->_data['description'] = $this->_data['data']['description'];
            $this->_data['keywords'] = $this->_data['data']['description'];
            $cate_id = $this->_data['data']['cat_id'];
            $this->_data['related']=$this->Mnews->getListNotId($this->_data['data']['id'],$cate_id);
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function category($id){
        
        $this->_data['loadPage'] = "news/category_view";
        $this->load->model('Mnews');
        if (isset($id)) {
            $cate = $this->Mnews->getCategoryNew($id);
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => base_url()
                ),
            1 => array(
                'name' => 'Tin tức',
                'href'  => base_url().'news'
                ),
            2 => array(
                'name' => $cate['title'],
                'href'  => ''
                ),
            );
            $this->_data['title'] = $cate['title'];


            // phan trang
            $url = base_url()."news/category/".$id;
            $lnc_total = $this->Mnews->countNewsInCate($id);
            $per_page = 10;
            $uri_segment = 2;
            $config = config_pagi2($url,$lnc_total,$per_page,$uri_segment);

            $this->load->library('pagination',$config);
            //$this->_data['page_link'] = $this->pagination->create_links();
            $start = $this->uri->segment(4);
            $this->_data['data'] = $this->Mnews->listNewsInCate($config['per_page'],$start,$id);

        }
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function search(){
        $this->load->model('Mnews');

        $this->_data['loadPage'] = "news/index_view";
        $this->_data['title'] = 'Tìm kiếm từ khóa';

        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => base_url()
                ),
            1 => array(
                'name' => 'Tìm kiếm',
                'href'  => ''
                ),
            );
        if (isset($_GET['input_search'])) {
            $search = trim(addslashes($this->input->get('input_search')));
            $this->_data['data'] = $this->Mnews->search($search);
            $this->_data['keywords'] = $search;
        }
        $this->load->view($this->_data['path'],$this->_data);
    }

}