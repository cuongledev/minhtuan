<?php
class Verify extends AdminController{
    public function __construct(){
        parent::__construct();
    }
    public function login(){
        $this->_data['title'] ="Đăng nhập quản trị";
        $this->_data['loadPage'] ="verify/login_view";
        $this->_data['error'] ="";
        if(isset($_POST["ok"])){
            $u = $this->input->post("txtemail");
            $p = md5('lnc'.$this->input->post("txtpass"));
            $this->load->model("Mweb_users_admin");
            $data = $this->Mweb_users_admin->checkLogin($u,$p);
            if($data == FALSE){
                $this->_data['error'] = "Email hoặc mật khẩu không chính xác!";
            }else{
                $sess = array(
                    "username" => $data['username'],
                    "id" => $data['id'],
                    "admin_level" => $data['level'],
                );
                $this->session->set_userdata($sess);
                $this->session->set_flashdata("flash_mess","Chào mừng bạn đã đăng nhập thành công vào trang quản trị.");
                redirect(base_url()."backend/index/index");
            }
        }
        $this->load->view($this->_data['loadPage'],$this->_data);
    }
    public function logout(){
        $this->session->sess_destroy();
        session_start();
        session_destroy();
        redirect(base_url()."backend/verify/login");
    }   
}
    
    