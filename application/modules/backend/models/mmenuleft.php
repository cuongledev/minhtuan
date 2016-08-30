<?php
class Mmenuleft extends CI_Model{
    protected $_table = "vi_menuleft";
    public function __construct(){
        parent::__construct();
    }
    public function listEmail($all,$start){
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function loadNewsPage(){
        $this->db->select('id,title,alias,status');
        $this->db->where('status',1);
        return $this->db->get('vi_pages')->result_array();
    }
    public function loadCateProduct(){
        $this->db->where('status',1);
        return $this->db->get('vi_category_product')->result_array();
    }
    public function loadCateNewsPage(){
        $this->db->select('id,title,alias,parent_id,status');
        $this->db->where('status',1);
        return $this->db->get('vi_category_news')->result_array();
    }
    public function insertData($data_insert){
        /*echo "<pre>";
        print_r($data_insert);die;*/
        $this->db->insert($this->_table,$data_insert);
    }
    public function getList(){
        $this->db->order_by('sort','ASC');
        return $this->db->get($this->_table)->result_array();
    }
    public function delAllMenu($data){
        $this->db->where_in('id', $data);
        return $this->db->delete($this->_table);
    }
    public function update($data,$id){
       $this->db->where('id', $id);
        $this->db->update($this->_table, $data); 
    }
    public function getMenuById($id){
       $this->db->where('id', $id);
        return $this->db->get($this->_table)->row_array(); 
    }
}