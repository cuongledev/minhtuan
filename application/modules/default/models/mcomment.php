<?php

class MComment extends MY_Model{
    protected $_table = "comments";
    protected $_pk = "id";
    
    public function __construct(){
        parent::__construct();
    }

}