<?php 
/*
* author: Le ngoc Cuong(cuongle.dev@gmail.com)
* company: thienvietjsc
*/
class Mcompany_industry extends CI_Model{
    protected $_table = "company_industry";
    public function __construct(){
        parent::__construct();
    }
    public function getList(){
        return $this->db->get($this->_table)->result_array();
    }
    public function listCompanyIndustry(){
        return $this->db->get($this->_table)->result_array();
    }
}