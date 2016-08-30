<?php
class Salary extends AdminController{
    public function __construct(){
        parent::__construct();
        $this->load->model('mweb_salary');
    }

    public function index(){
    	//load library...

    	//process
        if( $this->input->post('name_id') ){
            $list_id = $this->input->post('name_id');
            $this->mweb_salary->delete($list_id);
        }

    	//data to view
    	$this->_data['title'] = "Quản trị - Quản lý mức lương";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý mức lương',
                'href'  => ''
                ),
            );

        $this->_data['loadPage'] = "salary/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        
        $this->_data['list'] = $this->mweb_salary->get_anything( 'salary', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );
             

    	//load view
    	$this->load->view("$module/template",$this->_data);
    }

    public function add($id=0){
        //load library...

        //process
        if( $id != 0 ){
            $salary = $this->mweb_salary->get_anything( 'salary', "id = $id", $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = false, $result = false );
            $this->_data['salary'] = $salary;
        }

        if( $this->input->post() &&  $this->input->post('salary_title') != '' ){
            $salary_title    = $this->input->post('salary_title');
            $salary_from     = $this->input->post('salary_from'); 
            $salary_to       = $this->input->post('salary_to');
            $salary_status   = $this->input->post('salary_status');

            if( ($salary_from >= 0 && $salary_to >= 0 && $salary_from <= $salary_to ) || ($salary_from >= 0 && $salary_to == '' ) || ($salary_to >= 0 && $salary_from == '' )  ){                
                $indata = array(
                    'salary_title'  => $salary_title,
                    'salary_from'   => $salary_from,
                    'salary_to  '   => $salary_to,
                    'status'        => $salary_status

                );

                if( $id != 0 ){
                    $this->mweb_salary->update($indata, "id = $id");
                }else{
                    $id = $this->mweb_salary->insert( $indata );
                }

                redirect('backend/salary');
            }
            

        }        

        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;
        if( $id == 0 ){
            $this->_data['title'] = "Quản trị - Thêm mới mức lương";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý mức lương',
                'href'  => base_url().$module.'/salary/index'
                ),
            1 => array(
                'name' => 'Thêm mới mức lương',
                'href'  => ''
                ),
            );
        }else{
            $this->_data['title'] = "Quản trị - Chỉnh sửa mức lương";
            $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý mức lương',
                'href'  => base_url().$module.'/salary/index'
                ),
            1 => array(
                'name' => 'Chỉnh sửa mức lương',
                'href'  => ''
                ),
            );
            $this->_data['id'] = $id;
        }
        $this->_data['lang_button'] = 'Lưu';
        $this->_data['link_button_back'] = base_url()."$module/salary/index";

        $this->_data['list'] = $this->mweb_salary->get_anything( 'salary', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );        

        $this->_data['loadPage'] = "salary/edit_view";

        //load view
        $this->load->view("$module/template",$this->_data);
    }

    public function del($id){
        $list_id = array($id);
        $this->mweb_salary->delete($list_id);

        redirect('backend/salary');
    }

    public function updateStatus(){
        if( $this->input->post() && is_numeric($this->input->post('status')) ){
            $id = $this->input->post('id_user');
            $status = $this->input->post('status');

            $udata = array();
            if($status == 0){ $udata['status'] = 1; } else { $udata['status'] = 0; }
            $success = $this->mweb_salary->update( $udata, "id = $id" );            

            if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái mức lương!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái mức lương!'
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

        $query = $this->db->get('salary');
        $result_search = $query->result_array();        

        $this->_data['list'] = $result_search;

        $this->_data['loadPage'] = "salary/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;

        $this->load->view("$module/template",$this->_data);
    }


}