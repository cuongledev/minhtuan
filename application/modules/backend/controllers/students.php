<?php
class Students extends AdminController{
    public function __construct(){
        parent::__construct();
        $this->load->model('mweb_students');
    }

    public function index(){
    	//load library...

    	//process
        if( $this->input->post('name_id') ){
            $list_id = $this->input->post('name_id');
            $this->mweb_students->delete($list_id);
        }

    	//data to view
    	$this->_data['title'] = "Quản trị - Quản lý sinh viên";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý sinh viên',
                'href'  => ''
                ),
            );

        $this->_data['loadPage'] = "students/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;

        //địa chỉ
        $this->_data['province'] = $this->mweb_students->get_anything( 'address_province', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'provinceid ASC', $some = true, $result = false );
        //ngành nghề
        $this->_data['industry'] = $this->mweb_students->get_anything( 'company_industry', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );
        $this->_data['list'] = $this->mweb_students->get_anything( 'student', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );            

    	//load view
    	$this->load->view("$module/template",$this->_data);
    }

    public function add($id=0){
        //load library...
        $this->load->helper('functions');

        //process
        if( $id != 0 ){
            $student = $this->mweb_students->get_anything( 'student', "id = $id", $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = false, $result = false );
            $this->_data['student'] = $student;
        }

        if( $this->input->post() &&  $this->input->post('sv_firstname') != '' && $this->input->post('sv_lastname') != '' && $this->input->post('sv_email') != '' && $this->input->post('sv_pass') != '' && $this->input->post('sv_phone') != '' && $this->input->post('sv_address') != '' ){
            $sv_firstname    = $this->input->post('sv_firstname');
            $sv_lastname    = $this->input->post('sv_lastname');
            $sv_email       = $this->input->post('sv_email');
            $sv_pass        = $this->input->post('sv_pass');
            $sv_phone       = $this->input->post('sv_phone');
            $sv_address     = $this->input->post('sv_address');
            $sv_work_type   = $this->input->post('sv_work_type');
            $sv_work_location       = $this->input->post('sv_work_location');
            $sv_work_category       = $this->input->post('sv_work_category');
            $cv_about_me    = $this->input->post('cv_about_me');
            $sv_status      = $this->input->post('sv_status');


            $indata = array(
                    'first_name'    => $sv_firstname,
                    'last_name'     => $sv_lastname,
                    'email'         => $sv_email,
                    'password'      => md5('thienviet'.$sv_pass),
                    'phone'         => $sv_phone,
                    'address'       => $sv_address,
                    'work_time'     => $sv_work_type,
                    'work_location' => $sv_work_location,
                    'jobcategory'   => $sv_work_category,
                    'about_me'      => $cv_about_me,
                    'status'        => $sv_status,

                );

            /*if( !$this->input->post('sv_avatar') ){
                $indata_user['image'] = $this->input->post('avatarOld');
            }else{
                $indata_user['image'] = '';
            }*/

            if( $id != 0 ){
                $this->mweb_students->update($indata, "id = $id");
            }else{
                $id = $this->mweb_students->insert( $indata );
            }
            //$this->mweb_students->upload_image($id);

            redirect('backend/students');

        }        

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        if( $id == 0 ){
            $this->_data['title'] = "Quản trị - Thêm mới hồ sơ sinh viên";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý sinh viên',
                'href'  => base_url().$module.'/students/index'
                ),
            1 => array(
                'name' => 'Thêm mới hồ sơ sinh viên',
                'href'  => ''
                ),
            );
        }else{
            $this->_data['title'] = "Quản trị - Chỉnh sửa hồ sơ sinh viên";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý sinh viên',
                'href'  => base_url().$module.'/students/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa hồ sơ sinh viên',
                'href'  => ''
                ),
            );
            $this->_data['id'] = $id;
        }
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/students/index";

        $this->_data['list'] = $this->mweb_students->get_anything( 'student', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );

        //địa chỉ
        $this->_data['province'] = $this->mweb_students->get_anything( 'address_province', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'provinceid ASC', $some = true, $result = false );        
        //ngành nghề
        $this->_data['industry'] = $this->mweb_students->get_anything( 'company_industry', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id ASC', $some = true, $result = false );        

        $this->_data['loadPage'] = "students/addstudents_view";

        //load view
        $this->load->view("$module/template",$this->_data);
    }

    public function del($id){
        $list_id = array($id);
        $this->mweb_students->delete($list_id);

        redirect('backend/students');
    }

    public function updateStatus(){
        if( $this->input->post() && is_numeric($this->input->post('status')) ){
            $id = $this->input->post('id_user');
            $status = $this->input->post('status');

            $udata = array();
            if($status == 0){ $udata['status'] = 1; } else { $udata['status'] = 0; }
            $success = $this->mweb_students->update( $udata, "id = $id" );            

            if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái sinh viên!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái sinh viên!'
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

    public function search( $sv_status = 'all', $sv_name = '' ){
        if( $sv_status != 'all' ){
            $this->db->where( 'status' , $sv_status );
        }

        if( $sv_name != '' ){
            $this->db->like('first_name' , $sv_name);
            $this->db->or_like('last_name' , $sv_name);
        }

        $query = $this->db->get('student');
        $result_search = $query->result_array();        

        $this->_data['list'] = $result_search;

        $this->_data['loadPage'] = "students/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;

        $this->_data['title'] = "Quản trị - Tìm kiếm sinh viên";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý sinh viên',
                'href'  => base_url().'backend/students/index'
                ),
            1 => array(
                'name' => 'Tìm kiếm sinh viên',
                'href'  => ''
                ),
            );


        $this->load->view("$module/template",$this->_data);
    }

    public function checkEmail(){
        if( $this->input->post('email_check') ){
            $emailCheck = $this->input->post('email_check');

            $this->db->where( "email = '$emailCheck'" );        
            if(  $this->db->count_all_results('student') > 0 ){ 
                $data = array(
                        'exists' => true,
                        'msg'    => 'Email này đã tồn tại'
                    );
            }else{
                $data = array(
                        'exists' => false,
                        'msg'    => 'Bạn có thể sử dụng email này'
                    );
            }
            die(json_encode($data));
        }

    }

}