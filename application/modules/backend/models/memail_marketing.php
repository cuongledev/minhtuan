<?php
class Memail_marketing extends CI_Model{
    protected $_table = "email_marketing";
    public function __construct(){
        parent::__construct();
    }
    public function listEmail($all,$start){
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
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
    public function delEmail($id){
        $this->db->where("id",$id);
        $this->db->delete($this->_table);
    }
    public function getEmailById($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateEmail($data_update,$id){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data_update);
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