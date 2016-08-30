<?php
class Mweb_settings extends CI_Model{
    protected $_table = "web_settings";
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
    public function getMenuTop(){
        $this->db->order_by('sort','ASC');
        return $this->db->get('vi_menu')->result_array();
    }
}