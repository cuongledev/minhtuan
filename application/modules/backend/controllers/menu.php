<?php
class Menu extends AdminController{
    protected $_data;
    public $_page = array(
            'basic' => array()
        );
    public function __construct(){
        parent::__construct();
        $this->load->model('Mmenu');
        $this->_page['basic']= $this->Mmenu->getList();
    }
    public function index(){
        // cho nay set cookie cho da ngon ngu la dep :))
        $this->lang->load('cuong', 'vi');
        //echo $this->lang->line('date');
        
        $this->_data['newsPage']=$this->Mmenu->loadNewsPage();
        $this->_data['categoryProduct']=$this->Mmenu->loadCateProduct();
        $this->_data['news']=$this->Mmenu->loadNews();
        $this->_data['categoryNewsPage']=$this->Mmenu->loadCateNewsPage();

        /*echo '<pre>';
        print_r($this->pageBasic());die;*/
        
        /*$this->load->model('Mweb_users_admin');
        $data_insert =array(
            'username' => 'quandv',
            'email' => 'quandv@gmail.com',
            'password' => md5('lnc'.'quandv'),
            'level' => 1,
        );
        $this->Mweb_users_admin->insertData($data_insert);die;*/

        $this->_data['title'] = "Menu quản trị";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Menu quản trị',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "menu/index_view";
        $module = $this->uri->segment(1);
        $menu_backend=$this->_page;

        $this->_data['menu'] = $menu_backend['basic'];
        //$this->_data['action'] = base_url().'backend/menu/updateMenu';
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/menu/index";

        
        $this->load->view("$module/template",$this->_data);
    }
    public function loadLinkMenu(){
        if (isset($_POST['title'])) {
            $title = trim(addslashes($this->input->post('title')));
            $title =str_replace("?", "", $title);
            $title =str_replace("/", "-", $title);
            $title2=loadUrl($title);
            $data=array(
                'status' => true,
                'title'  => $title2
            );
            echo json_encode($data);
        }
    }
    public function addMenu(){
        if (isset($_POST['save_custom_menu'])) {
            $title_menu = trim(addslashes($this->input->post('title_menu')));
            $alias_menu = trim(addslashes($this->input->post('alias_menu')));
            $link_menu = trim(addslashes($this->input->post('link_menu')));
            $parent_menu = trim(addslashes($this->input->post('parent_menu')));
            $id_link_menu = trim(addslashes($this->input->post('id_link_menu')));
            $arr1 = $this->_page;
            $count = count($arr1['basic']);

            $arr2 = array(
                'title'     => $title_menu,
                'alias'      => $alias_menu,
                'status'    => 0,
                'link'   => $link_menu,
                'parent_id' => $parent_menu,
                'id_post_or_cate' => $id_link_menu,
            );
            $this->_page['basic'][] = $arr2;
            /*echo "<pre>";;
            print_r($arr2);die;*/
            $this->Mmenu->insertData($arr2);
            redirect(base_url().'backend/menu/index');
        }
    }
    public function deleteMenu(){
        if (isset($_POST['del_menu'])) {
            $arrmenu = $_POST['delmenuall'];
            $this->Mmenu->delAllMenu($arrmenu);
            redirect(base_url().'backend/menu/index');
        }
    }
    public function updateMenu(){
        if (isset($_POST['fruits'])) {
            $fruits = $_POST['fruits'];
            foreach ($fruits as $key => $value) {
                $explode = explode("|", $value);
                $data = array('sort'=>$explode[1]);
                $this->Mmenu->update($data,$explode[0]);
            }
            $data2 = array('status'=>true);
            echo json_encode($data2);
        }
    }
    public function loadMenuEdit(){
        if (isset($_POST['idMenu'])) {
            $id = $this->input->post('idMenu');
            $data = $this->Mmenu->getMenuById($id);
            echo json_encode($data);
        }
    }
    public function editModalMenu(){
        if (isset($_POST['save_custom_menu'])) {
            $title_menu = trim(addslashes($this->input->post('title_menu')));
            $alias_menu = loadUrl($title_menu);
            $link_menu = trim(addslashes($this->input->post('link_menu')));
            $parent_menu = trim(addslashes($this->input->post('parent_menu')));
            $id_menu = trim(addslashes($this->input->post('id_menu')));
            $arr2 = array(
                'title'     => $title_menu,
                'alias'      => $alias_menu,
                'link'   => $link_menu,
                'parent_id' => $parent_menu,
            );
            $this->Mmenu->update($arr2,$id_menu);
            redirect(base_url().'backend/menu/index');
        }
    }




}