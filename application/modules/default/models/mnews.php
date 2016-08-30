<?php 
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
*/
class Mnews extends CI_Model{
    protected $_table = "vi_news";
    public function __construct(){
        parent::__construct();
    }
    public function listAllNews(){
    	$this->db->select('id,cat_id,title,alias,create_time,sort,description,image');
    	$this->db->where('status',1);
    	$this->db->limit(4);
    	$this->db->order_by('sort','ASC');
    	return $this->db->get($this->_table)->result_array();
    }
    public function listAllCategoryNot3($array_not){
        $this->db->where('status',1);
        $this->db->where_not_in('id', $array_not);
        $this->db->order_by('sort','ASC');
        return $this->db->get('vi_category_news')->result_array();
    }
    public function getListNewsByCategoryLimit5($array_not){
        $this->db->where('status',1);
        $this->db->where_not_in('id', $array_not);
        $this->db->order_by('sort','ASC');
        return $this->db->get('vi_category_news')->result_array();
    }
    public function listNews($all,$start){
        $this->db->select('id,cat_id,title,alias,create_time,sort,description,image');
        $this->db->where('status',1);
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function detail($id){
        $this->db->where('id',$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function getListNotId($id,$cate_id){
        $this->db->where('cat_id',$cate_id);
        $this->db->where_not_in('id', array($id));
        $this->db->where('status',1);
        $this->db->limit(2);
        return $this->db->get($this->_table)->result_array();
    }
    public function insertContact($data_insert){
        $this->db->insert('web_contact',$data_insert);
    }
    public function search($keywords){
        $this->db->select('id,cat_id,title,alias,create_time,sort,description,image');
        $this->db->where('status',1);
        $this->db->like('title',$keywords);
        return $this->db->get($this->_table)->result_array();
    }
    public function getPage($id){
        $this->db->where('id',$id);
        $this->db->where('status',1);
        return $this->db->get('vi_pages')->row_array();
    }
    
    public function listNewsInCate($all,$start,$cat_id){
        $this->db->select('id,cat_id,title,alias,create_time,sort,description,image');
        $this->db->where('cat_id',$cat_id);
        $this->db->where('status',1);
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function countNewsInCate($cat_id){
        $this->db->select('id,cat_id');
        $this->db->where('cat_id',$cat_id);
        $this->db->where('status',1);
        return $this->db->get($this->_table)->result_array();
    }
    public function getCategoryNew($cat_id){
        $this->db->select('id,title,alias,thumbnail');
        $this->db->where('id',$cat_id);
        $this->db->where('status',1);
        return $this->db->get('vi_category_news')->row_array();
    }
    public function getListNewsByCategory($id){
        $this->db->select('id,title,alias,cat_id,description,image');
        $this->db->where('cat_id',$id);
        $this->db->where('status',1);
        $this->db->limit(5);
        $this->db->order_by('id','DESC');
        return $this->db->get('vi_news')->result_array();
    }
}