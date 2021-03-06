<?php 
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
* file: model(mschools.php)
*/
class Mschools extends CI_Model{
    protected $_table = "schools_education";
    public function __construct(){
        parent::__construct();
    }
    public function listSchools($all,$start){
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
    public function getSchoolsById($id){
        /*$this->db->select('hiring.*,company.company_name,company.gpkd');
        $this->db->from('hiring');
        $this->db->join('company', 'hiring.id = company.id_hr', 'left'); */
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function querySearch($data){
        foreach ($data as $k => $v) {
            if ($k=='status') {
                if ($v!='all') {
                    $this->db->where($k,$v);
                }
            }
            if ($k=='title') {
                $this->db->like('title',$v);
            }
            
        }        
        return $this->db->get($this->_table)->result_array();
    }



    public function updateSchools($data_update,$id){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data_update);
    }
    public function delSchool($id){
    	$this->db->where("id",$id);
    	$this->db->delete($this->_table);
    }
    public function insertSchools($data){
        $this->db->insert($this->_table,$data);
    }
    public function dellWhereInArray($names_id){
        $this->db->where_in('id', $names_id);
        $this->db->delete($this->_table);
    }
    public function joinCompany($all,$start){
        $this->db->select('hiring.*,company.company_name,company.gpkd');
        $this->db->from('hiring');
        $this->db->join('company', 'hiring.id = company.id_hr', 'left'); 
        $this->db->limit($all,$start); 
        $query = $this->db->get();
        //return $query->result(); trar ve 1 mang object
        return $query->result_array();
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
}