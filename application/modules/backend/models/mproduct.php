<?php
class Mproduct extends CI_Model{
    protected $_table = "vi_product_basic";
    public function __construct(){
        parent::__construct();
    }
    public function searchProduct($stitle){
        $this->db->like("title",$stitle);
        $this->db->order_by("id","desc");
        return $this->db->get($this->_table)->result_array();
    }
    public function listProduct($all,$start){
        $this->db->limit($all,$start);
        $this->db->order_by("id","desc");
        return $this->db->get($this->_table)->result_array();
    }

    public function insertData($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }
    public function insertDataLastId($data_insert){
        $this->db->insert($this->_table,$data_insert);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
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
    public function getProductById($id){
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
    public function listProductRelax(){
        $this->db->select('id,title,alias');
        return $this->db->get($this->_table)->result_array();
    }
    public function insertProductJoinCategory($data){
        $this->db->insert('vi_category_join_product',$data);
    }
    public function getProductByIdWhereCateProduct($id){
        $this->db->select("id_category");
        $this->db->where("id_product",$id);
        $this->db->order_by("id","ASC");
        return $this->db->get('vi_category_join_product')->result_array();
    }
    public function updateData($data,$id){
        $this->db->where('id',$id);
        $this->db->update($this->_table,$data);
    }
    public function delProCate($id){
        $this->db->where("id_product",$id);
        $this->db->delete('vi_category_join_product');
    }
}