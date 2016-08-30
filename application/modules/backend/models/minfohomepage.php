<?php
class Minfohomepage extends CI_Model{
    protected $_table = "vi_infohomepage";
    public function __construct(){
        parent::__construct();
    }
    public function getWhereId($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateWhereId($data,$id){
    	$this->db->where("id",$id);
    	$this->db->update($this->_table, $data);
    }
}