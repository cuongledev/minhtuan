<?php 
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
*/
class Maddress_district extends CI_Model{
    protected $_table = "address_district";
    public function __construct(){
        parent::__construct();
    }
    public function getList(){
        return $this->db->get($this->_table)->result_array();
    }
    public function getRowWhereDistrictId($provinces){
    	$this->db->where('districtid',$provinces);
    	return $this->db->get($this->_table)->row_array();
    }
    public function getListWhereProvinceId($provinces){
        $this->db->where('provinceid',$provinces);
        return $this->db->get($this->_table)->result_array();
    }
}