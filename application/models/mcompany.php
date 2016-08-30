<?php 
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
* file: model(mcompany.php)
*/
class Mcompany extends CI_Model{
    protected $_table = "company";
    public function __construct(){
        parent::__construct();
    }
    public function listCompany($all,$start){
        $this->db->limit($all,$start);
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
    public function updateStatus($id_user,$data_update){
        $this->db->where('id',$id_user);
        if ($this->db->update($this->_table,$data_update)) {
            return true;
        }else{
            return false;
        }
    }
    public function getComById($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateCompany($data_update,$id){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data_update);
    }
    public function delCom($id){
    	$this->db->where("id",$id);
    	$this->db->delete($this->_table);
    }
    public function insertCompany($data){
        $this->db->insert($this->_table,$data);
    }
    public function dellWhereInArray($names_id){
        $this->db->where_in('id', $names_id);
        $this->db->delete($this->_table);
    }
    public function querySearch($data){
        foreach ($data as $k => $v) {
            if ($k=='status') {
                if ($v!='all') {
                    $this->db->where($k,$v);
                }
            }
            if ($k=='title') {
                $this->db->like('company_name',$v);
            }
            
        }        
        return $this->db->get($this->_table)->result_array();
    }
}