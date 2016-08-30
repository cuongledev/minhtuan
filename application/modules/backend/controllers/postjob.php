<?php
class Postjob extends AdminController{
    public function __construct(){
        parent::__construct();

        $this->load->model('mweb_postjob');
    }

    public function index(){
    	//load library...

    	//process
        if( $this->input->post('name_id') ){
            $list_id = $this->input->post('name_id');
            $this->mweb_postjob->delete($list_id);
        }

    	//data to view
    	$this->_data['title'] = "Quản trị - Quản lý tin tuyển dụng";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tin tuyển dụng',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "postjob/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;

        //địa chỉ
        $this->_data['province'] = $this->mweb_postjob->get_anything( 'address_province', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'provinceid ASC', $some = true, $result = false );        
        //ngành nghề
        $this->_data['industry'] = $this->mweb_postjob->get_anything( 'company_industry', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );
         // mức lương
        $this->_data['salary'] = $this->mweb_postjob->get_anything( 'salary', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );
        
        $this->_data['list'] = $this->mweb_postjob->get_anything( 'post_jobs', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );        

    	//load view
    	$this->load->view("$module/template",$this->_data);
    }

    public function add($id=0){
        //load library...
        $this->load->helper('functions');

        //process
        if( $id != 0 ){
            $job = $this->mweb_postjob->get_anything( 'post_jobs', "id = $id", $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = false, $result = false );
            $this->_data['item'] = $job;

            $hr_content = json_decode($job['content'], true);

            $this->_data['item_desc']       = $hr_content['desc'];
            $this->_data['item_benifit']    = $hr_content['benifit'];
            $this->_data['item_workReq']    = $hr_content['workReq'];
            $this->_data['item_profileReq'] = $hr_content['profileReq'];
            $this->_data['item_deadtime']   = $hr_content['deadtime'];
            $this->_data['item_profileLang']= $hr_content['profileLang'];

        }

        if( $this->input->post() ) {
            if( $this->input->post() &&  $this->input->post('hr_title') != '' &&  $this->input->post('hr_desc') != '' &&  $this->input->post('hr_benifit') != '' &&  $this->input->post('hr_work_request') != '' &&  $this->input->post('hr_profile_request') != ''  && $this->input->post('com_name') != '' && $this->input->post('com_desc') != '' ){
                $hr_people              = $this->input->post('hr_people');
                $hr_title               = $this->input->post('hr_title');

                $hr_desc                = $this->input->post('hr_desc');
                $hr_benifit             = $this->input->post('hr_benifit');
                $hr_work_request        = $this->input->post('hr_work_request');
                $hr_profile_request     = $this->input->post('hr_profile_request');

                $hr_profile_lang        = $this->input->post('hr_profile_lang');
                $hr_deadtime            = $this->input->post('hr_deadtime');

                $hr_schools_like        = $this->input->post('hr_schools_like');
                $hr_salary              = $this->input->post('hr_salary');
                $hr_num_open            = $this->input->post('hr_num_open');
                $hr_work_location       = $this->input->post('hr_work_location');
                $hr_work_category       = $this->input->post('hr_work_category');
                $hr_work_type           = $this->input->post('hr_work_type');
                $hr_exp                 = $this->input->post('hr_exp');

                $com_name               = $this->input->post('com_name');
                $com_number             = $this->input->post('com_number');
                $com_desc               = $this->input->post('com_desc');

                $hr_sort                = $this->input->post('hr_sort');
                $hr_status              = $this->input->post('hr_status');

                $hr_content = array(
                    'desc'      => $hr_desc,
                    'benifit'   => $hr_benifit,
                    'workReq'   => $hr_work_request,
                    'profileReq'=> $hr_profile_request,
                    'deadtime'  => strtotime( $hr_deadtime ),
                    'profileLang'=> $hr_profile_lang
                    );

                $indata = array(
                        'cid'                   => $hr_people,
                        'title'                 => $hr_title,
                        'alias'                 => alias($hr_title),
                        'content'               => json_encode( $hr_content ),
                        'experience'            => $hr_exp,
                        'number_opening'        => $hr_num_open,
                        'location'              => $hr_work_location,
                        'job_category'          => $hr_work_category,
                        'schools_like'          => $hr_schools_like,
                        'employment_type'       => $hr_work_type,
                        'company'               => $com_name,
                        'company_description'   => $com_desc,
                        'salary_id'             => $hr_salary,
                        'create_time'           => time(),
                        'sort'                  => $hr_sort,
                        'status'                => $hr_status,

                    );

                if( !$this->input->post('company_logo') ){
                    $indata['company_logo'] = $this->input->post('avatarOld');
                }else{
                    $indata['company_logo'] = '';
                }

                if( $id != 0 ){
                    $this->mweb_postjob->update($indata, "id = $id");
                }else{
                    $id = $this->mweb_postjob->insert( $indata );
                }
                $this->mweb_postjob->upload_image_com($id);

                redirect('backend/postjob');

            }else{
                $this->_data['valid_msg'] = 'Những trường được đánh dấu (*) là bắt buộc';
            }

        }

        

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        if( $id == 0 ){
            $this->_data['title'] = "Quản trị - Thêm mới tin tuyển dụng";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tin tuyển dụng',
                'href'  => base_url().$module.'/postjob/index'
                ),
            1 => array(
                'name' => 'Thêm mới tin tuyển dụng',
                'href'  => ''
                ),
            );
        }else{
            $this->_data['title'] = "Quản trị - Chỉnh sửa tin tuyển dụng";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tin tuyển dụng',
                'href'  => base_url().$module.'/postjob/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa tin tuyển dụng',
                'href'  => ''
                ),
            );
            $this->_data['id'] = $id;
        }
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/postjob/index";

        $this->_data['list'] = $this->mweb_postjob->get_anything( 'post_jobs', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );

            //địa chỉ
        $this->_data['province'] = $this->mweb_postjob->get_anything( 'address_province', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'provinceid ASC', $some = true, $result = false );        
            //ngành nghề
        $this->_data['industry'] = $this->mweb_postjob->get_anything( 'company_industry', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );
            //danh sách hr
        $this->_data['hr'] = $this->mweb_postjob->get_anything( 'hiring', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );
            // mức lương
        $this->_data['salary'] = $this->mweb_postjob->get_anything( 'salary', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );

            //company size
        $this->_data['com_size'] = $this->mweb_postjob->get_anything( 'company_size', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = true, $result = false );
            //work_type 
        $this->_data['work_type'] = $this->mweb_postjob->get_anything( 'employment_type', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = true, $result = false );
            //work_exp
        $this->_data['work_exp'] = $this->mweb_postjob->get_anything( 'work_exp', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = true, $result = false );

        $this->_data['loadPage'] = "postjob/addjob_view";

        //load view
        $this->load->view("$module/template",$this->_data);
                 
    }

    public function del($id){
        $list_id = array($id);
        $this->mweb_postjob->delete($list_id);

        redirect('backend/postjob');
    }

    public function updateStatus(){
        if( $this->input->post() && is_numeric($this->input->post('status')) ){
            $id = $this->input->post('id_user');
            $status = $this->input->post('status');

            $udata = array();
            if($status == 0){ $udata['status'] = 1; } else { $udata['status'] = 0; }
            $success = $this->mweb_postjob->update( $udata, "id = $id" );            

            if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái tin tuyển dụng!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái tin tuyển dụng!'
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

    public function search( $status = 'all', $stxt = '' ){
        if( $status != 'all' ){
            $this->db->where( 'status' , $status );
        }

        if( $stxt != '' ){
            $this->db->like('title' , $stxt);
            $this->db->or_like('company' , $stxt);
        }

        $query = $this->db->get('post_jobs');
        $result_search = $query->result_array();        

        $this->_data['list'] = $result_search;

        //địa chỉ
        $this->_data['province'] = $this->mweb_postjob->get_anything( 'address_province', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'provinceid ASC', $some = true, $result = false );
        //ngành nghề
        $this->_data['industry'] = $this->mweb_postjob->get_anything( 'company_industry', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );

        $this->_data['loadPage'] = "postjob/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;

        $this->_data['title'] = "Quản trị - Tìm kiếm tin tuyển dụng";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý tin tuyển dụng',
                'href'  => base_url().'backend/postjob/index'
                ),
            1 => array(
                'name' => 'Tìm kiếm tin tuyển dụng',
                'href'  => ''
                ),
            );

        $this->load->view("$module/template",$this->_data);
    }

}