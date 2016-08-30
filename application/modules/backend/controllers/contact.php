<?php
class Contact extends AdminController{
    public function __construct(){
        parent::__construct();

        $this->load->model('mweb_contact');
    }

    public function index(){
    	//load library...

    	//process
        if( $this->input->post('name_id') ){
            $list_id = $this->input->post('name_id');
            $this->mweb_contact->delete($list_id);
        }

    	//data to view
    	$this->_data['title'] = "Quản trị - Quản lý liên hệ";
        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Quản lý liên hệ',
                'href'  => ''
                ),
            );
        $this->_data['loadPage'] = "contact/index_view";
        $module = $this->uri->segment(1);
        $this->_data['module'] = $module;

        $this->_data['list'] = $this->mweb_contact->get_anything( 'web_contact', $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = true, $result = false );

    	//load view
    	$this->load->view("$module/template",$this->_data);
    }

    public function updateStatus(){
        if( $this->input->post() && is_numeric($this->input->post('status')) ){
            $id = $this->input->post('id_user');
            $status = $this->input->post('status');

            $udata = array();
            if($status == 0){ $udata['status'] = 1; } else { $udata['status'] = 0; }
            $success = $this->mweb_contact->update( $udata, "id = $id" );            

            if ($success) {
                    $data = array(
                        'status' => true,
                        'mess' => 'Bạn đã thay đổi thành công trạng thái tin liên hệ!'
                    );
                }else{
                    $data = array(
                        'status' => false,
                        'mess' => 'Bạn đã thay đổi thất bại trạng thái tin liên hệ!'
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

    public function reply(){    	
    	if( $this->input->post() ){
    		$id = $this->input->post('id');
    		$reply = $this->input->post('reply');
    		$idata = array('reply' => $reply, 'status' => 1);
    		if($this->mweb_contact->update( $idata, "id = $id" )){
                //send email
                /*$to_email = 'doanvietquan.dev@gmail.com';
                $title = 'Test Contact - AfterSchools';
                $message = 'AfterSchools reply your contact';
                if( $this->send_email( $to_email, $title, $message ) ){
                    $returnData['success'] = 1;
                    $returnData['msg'] = 'Gửi email trả lời thành công';
                }else{
                    $returnData['success'] = 0;
                    $returnData['msg'] = 'Gửi email trả lời thất bại';
                }*/
            }
    		
    	}
        $returnData['list'] = $this->mweb_contact->get_anything( 'web_contact', "id = $id", $like = NULL, $limit = NULL, $offset = NULL, 'id DESC', $some = false, $result = false );
        die(json_encode($returnData));
    }

    public function delcontact($id){    	
		$list_id = array($id);
		$this->mweb_contact->delete( $list_id );
        redirect('backend/contact');
    }

    //send email
    function send_email( $to_email, $title, $message ){
		$this->load->library('email');

		$config = Array( 
		  'protocol' => 'smtp', 
		  'smtp_host' => 'ssl://smtp.googlemail.com', 
		  'smtp_port' => 465, 
		  'smtp_user' => 'quanhus1992@gmail.com', 
		  'smtp_pass' => '123456', );
		$this->email->initialize($config);

		$this->email->from('quanhus1992@gmail.com', 'Admin - AfterSchools');
		$this->email->to( $to_email );
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject($title);
		$this->email->message($message);

		$this->email->send();
	}

}