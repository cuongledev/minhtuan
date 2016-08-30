<?php
class Mpartner extends CI_Model{
    protected $_table = "vi_partner";
    public function __construct(){
        parent::__construct();
    }
    public function listSlider($all,$start){
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function insertData($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }
    public function delSlider($id){
        $this->db->where("id",$id);
        $this->db->delete($this->_table);
    }
    public function getSliderById($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateSlider($data_update,$id){
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