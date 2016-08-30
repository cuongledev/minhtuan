<?php
class Mcategory_news extends CI_Model{
    protected $_table = "vi_category_news";
    public function __construct(){
        parent::__construct();
    }
    public function listCategory($all,$start){
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function insertData($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function updateStatus($id,$data_update){
        $this->db->where('id',$id);
        if ($this->db->update($this->_table,$data_update)) {
            return true;
        }else{
            return false;
        }
    }
    public function getCateById($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateWhereId($data_update,$id){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data_update);
    }
    public function delCate($id){
        $this->db->where("id",$id);
        $this->db->delete($this->_table);
    }
    public function dellWhereInArray($names_id){
        $this->db->where_in('id', $names_id);
        $this->db->delete($this->_table);
    }
    public function listAllCate(){
        return $this->db->get($this->_table)->result_array();
    }
}