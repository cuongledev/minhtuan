<?php
class News extends AdminController{
    public function __construct(){
        parent::__construct();
        $this->load->model('mweb_news');
    }

    public function index(){
    	//load library...

    	//process
            //delete multi-news
        if( $this->input->post('name_id') ){
            $list_id = $this->input->post('name_id');
            $this->mweb_news->delete($list_id);
        }

    	//data to view
    	$this->_data['title'] = "Quản trị - Quản lý tin tức";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tin tức',
                'href'  => ''
                ),
            );

        $this->_data['loadPage'] = "news/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;

        $this->_data['list'] = $this->mweb_news->get_anything( 'vi_news', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );

    	//load view
    	$this->load->view("$module/template",$this->_data);
    }

    public function addnews($id=0){
        //load library...
        $this->load->helper('functions');
        $this->load->model('mweb_category_news');

        //process
        if( $id != 0 ){
            $news = $this->mweb_news->get_anything( 'vi_news', "id = $id", $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = false, $result = false );
            $this->_data['news'] = $news;
        }

        if( $this->input->post() &&  $this->input->post('title') != '' ){
            $title      = $this->input->post('title');
            $alias      = alias($title);
            $desc       = $this->input->post('desc');
            $content    = $this->input->post('content');
            $tag        = $this->input->post('tag');
            $category   = $this->input->post('category');
            $order      = $this->input->post('order');
            $status     = $this->input->post('status');
            $meta_key   = $this->input->post('meta_key');
            $meta_desc  = $this->input->post('meta_desc');

            $indata = array(
                    'title'     => $title,
                    'alias'     => $alias,
                    'description' => $desc,
                    'content'   => $content,
                    'tags'      => $tag,
                    'cat_id'    => $category,
                    'sort'      => $order,
                    'status'    => $status,
                    'meta_keyword' => $meta_key,
                    'meta_description' => $meta_desc,
                    'create_time'=> time()

                );
            /*if( $status == 2 ){
                $public_time = $this->input->post('public_time');
                $indata['create_time'] = strtotime($public_time);
            }else{
                $indata['create_time'] = time();
            }*/

            if( !$this->input->post('avatar') ){
                $indata['image'] = $this->input->post('avatarOld');
            }else{
                $indata['image'] = '';
            }

            if( $id != 0 ){
                $this->mweb_news->update($indata, "id = $id");
            }else{
                $id = $this->mweb_news->insert( $indata );
            }
            $this->mweb_news->upload_image($id);

            redirect('backend/news');

        }        

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        if( $id == 0 ){
            $this->_data['title'] = "Quản trị - Thêm mới tin tức";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tin tức',
                'href'  => base_url().$module.'/news/index'
                ),
            1 => array(
                'name' => 'Thêm mới tin tức',
                'href'  => ''
                ),
            );
        }else{
            $this->_data['title'] = "Quản trị - Chỉnh sửa tin tức";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tin tức',
                'href'  => base_url().$module.'/news/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa tin tức',
                'href'  => ''
                ),
            );
            $this->_data['id'] = $id;
        }
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/news/index";
        $this->_data['list'] = $this->mweb_category_news->get_anything( 'vi_category_news', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );
        $this->_data['loadPage'] = "news/addnews_view";

        //load view
        $this->load->view("$module/template",$this->_data);
    }

    public function delnews($id){
        $list_id = array($id);
        $this->mweb_news->delete($list_id);

        redirect('backend/news');
    }

    public function updateStatus(){
        if( $this->input->post() && is_numeric($this->input->post('status')) ){
            $id = $this->input->post('id_user');
            $status = $this->input->post('status');

            $udata = array();
            if($status == 0){ $udata['status'] = 1; } else { $udata['status'] = 0; }
            $success = $this->mweb_news->update( $udata, "id = $id" );            

            if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái tin tức!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái tin tức!'
                    );
                }
                if ($_POST['status']==1) {
                    $data['idstatus'] = 0;
                }else{
                    $data['idstatus'] = 1;
                }
                echo json_encode($data);
        }
    }

    public function updateSort(){
        if( $this->input->post() && is_numeric($this->input->post('sort')) ){
            $id = $this->input->post('id');
            $sort = (int)$this->input->post('sort');

            if( $sort >= 0 ){
                $udata = array( 'sort' => $sort );
                $success = $this->mweb_news->update( $udata, "id = $id" );
                if ($success) {
                    $data = array(
                        'sort' => true,
                        'mess' => 'Bạn đã thay đổi thành công thứ tự tin tức!'
                    );
                }else{
                    $data = array(
                        'sort' => false,
                        'mess' => 'Bạn đã thay đổi thất bại thứ tự tin tức!'
                    );
                }
            }else{
                $data = array(
                    'sort' => false,
                    'mess' => 'Bạn đã thay đổi thất bại thứ tự tin tức!'
                );
            }
            
            $data['item'] = $this->mweb_news->get_anything( 'vi_news', "id = $id", $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = false, $result = false );
            echo json_encode($data);
        }
    }


}