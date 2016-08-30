<?php
class Mweb_users_admin extends CI_Model{
    protected $_table = "web_users_admin";
    public function __construct(){
        parent::__construct();
    }
    public function listUser($all,$start){
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function checkUserName($user,$id=""){
        if($id != ""){
            $this->db->where("id !=",$id);
        }
        $this->db->where("username",$user);
        $query = $this->db->get($this->_table);
        if($query->num_rows() > 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function checkEmail($email,$id=""){
        if($id != ""){
            $this->db->where("id !=",$id);
        }
        $this->db->where("email",$email);
        $query = $this->db->get($this->_table);
        if($query->num_rows() > 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function insertData($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }
    public function delUser($id){
        $this->db->where("id",$id);
        $this->db->delete($this->_table);
    }
    public function getUserById($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateUser($data_update,$id){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data_update);
    }
    public function checkLogin($u,$p){
        $this->db->where("status",1);
        $this->db->where("email",$u);
        $this->db->where("password",$p);
        $query = $this->db->get($this->_table);
        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }
    public function updateStatus($id_user,$data_update){
        $this->db->where('id',$id_user);
        if ($this->db->update($this->_table,$data_update)) {
            return true;
        }else{
            return false;
        }
    }
    public function dellWhereInArray($names_id){
        $this->db->where_in('id', $names_id);
        $this->db->delete($this->_table);
    }
}