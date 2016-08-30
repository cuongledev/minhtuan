<?php
class Mproduct extends CI_Model{
    protected $_table = "vi_product_basic";
    public function __construct(){
        parent::__construct();
    }
    public function listProductWhereRating(){
        $this->db->select('id,title,alias,price,saleoff,thumbnail,status,create_time');
        $this->db->where('status',1);
        $this->db->where('rating',1);
        //$this->db->limit(4);
        $this->db->order_by('id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function listProductWhereHot(){
        $this->db->select('id,title,alias,price,saleoff,thumbnail,status,create_time');
        $this->db->where('status',1);
        $this->db->where('new',1);
        //$this->db->limit(4);
        $this->db->order_by('id','asc');
        return $this->db->get($this->_table)->result_array();
    }
    public function listProduct(){
        $this->db->select('id,title,alias,price,saleoff,thumbnail,status,create_time');
        $this->db->where('status',1);
        $this->db->limit(20);
        $this->db->order_by('id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function listCategoriesParent(){
        //$this->db->select('id,title,alias,price,saleoff,thumbnail,status,create_time');
        $this->db->where('status',1);
        $this->db->where('parent_id',0);
        $this->db->limit(20);
        $this->db->order_by('id','desc');
        return $this->db->get('vi_category_product')->result_array();
    }
    public function listProductWhereCategories($id,$sort=null){
        $this->db->select('vi_product_basic.id,vi_product_basic.tinhtrang,vi_product_basic.title,vi_product_basic.alias,vi_product_basic.price,vi_product_basic.saleoff,vi_product_basic.thumbnail,vi_product_basic.thumbnail_after,vi_product_basic.info_short,vi_product_basic.full_info,vi_product_basic.status,vi_product_basic.create_time,vi_category_join_product.id as id_join,vi_category_join_product.id_category,vi_category_join_product.id_product');
        $this->db->join('vi_category_join_product','vi_category_join_product.id_product = vi_product_basic.id');
        $this->db->where('vi_category_join_product.id_category',$id);
        $this->db->where('vi_product_basic.status',1);
        //$this->db->limit(20);
        if ($sort!=null) {
            $sort = strtolower($sort);
            switch ($sort) {
                case 'old':
                    $this->db->order_by('create_time','asc');
                    break;
                case 'new':
                    $this->db->order_by('create_time','desc');
                    break;
                case 'desc':
                    $this->db->order_by('price',$sort);
                    break;
                default:
                    $this->db->order_by('price',$sort);
                    break;
            }
        }else{
            $this->db->order_by('id','desc');
        }
        return $this->db->get($this->_table)->result_array();
        //select * from vi_product_basic 
        //LEFT JOIN vi_category_join_product 
        //ON vi_category_join_product.id_product = vi_product_basic.id 
        //WHERE vi_category_join_product.id_category = 8
    }
    public function listProductLoad($all,$start){
        $this->db->select('id,title,alias,price,saleoff,thumbnail,status,create_time');
         $this->db->where('status',1);
        if (is_numeric($all) && is_numeric($start)) {
            $this->db->limit($all,$start);
        }
        $this->db->order_by('id','desc');
        return $this->db->get($this->_table)->result_array();
    }
    public function listProductLoadChangeCate($all,$start){
        //$this->db->select('id,title,alias,price,saleoff,thumbnail,status,create_time');
        $this->db->where('parent_id',0);
        $this->db->where('status',1);
        if (is_numeric($all) && is_numeric($start)) {
            $this->db->limit($all,$start);
        }
        $this->db->order_by('id','desc');
        return $this->db->get('vi_category_product')->result_array();
    }
    public function listProductWhereCateId($id,$sort=null,$all=null,$start=null){
    	$this->db->select('vi_product_basic.id,vi_product_basic.tinhtrang,vi_product_basic.title,vi_product_basic.alias,vi_product_basic.price,vi_product_basic.saleoff,vi_product_basic.thumbnail,vi_product_basic.thumbnail_after,vi_product_basic.info_short,vi_product_basic.full_info,vi_product_basic.status,vi_product_basic.create_time,vi_category_join_product.id as id_join,vi_category_join_product.id_category,vi_category_join_product.id_product');
    	$this->db->join('vi_category_join_product','vi_category_join_product.id_product = vi_product_basic.id');
    	$this->db->where('vi_category_join_product.id_category',$id);
    	$this->db->where('vi_product_basic.status',1);

        $this->db->limit($all,$start);

    	
    	if ($sort!=null) {
    		$sort = strtolower($sort);
    		switch ($sort) {
    			case 'old':
    				$this->db->order_by('create_time','asc');
    				break;
    			case 'new':
    				$this->db->order_by('create_time','desc');
    				break;
    			case 'desc':
    				$this->db->order_by('price',$sort);
    				break;
    			default:
    				$this->db->order_by('price',$sort);
    				break;
    		}
    	}else{
            $this->db->order_by('price','asc');
        }
    	return $this->db->get($this->_table)->result_array();
    	//select * from vi_product_basic 
    	//LEFT JOIN vi_category_join_product 
    	//ON vi_category_join_product.id_product = vi_product_basic.id 
    	//WHERE vi_category_join_product.id_category = 8
    }
    public function countAllWhereCategory($id){
        $this->db->select('vi_product_basic.id,vi_product_basic.tinhtrang,vi_product_basic.title,vi_product_basic.alias,vi_product_basic.price,vi_product_basic.saleoff,vi_product_basic.thumbnail,vi_product_basic.thumbnail_after,vi_product_basic.info_short,vi_product_basic.full_info,vi_product_basic.status,vi_product_basic.create_time,vi_category_join_product.id as id_join,vi_category_join_product.id_category,vi_category_join_product.id_product');
        $this->db->join('vi_category_join_product','vi_category_join_product.id_product = vi_product_basic.id');
        $this->db->where('vi_category_join_product.id_category',$id);
        $this->db->where('vi_product_basic.status',1);
        return $this->db->get($this->_table)->result_array();
    }
    public function getCategory($id){
    	$this->db->where('id',$id);
    	return $this->db->get('vi_category_product')->row_array();
    }
    public function getProductById($id){
        $this->db->where('id',$id);
        return $this->db->get('vi_product_basic')->row_array();
    }
    public function getListCategoryMain(){
        $this->db->where('status',1);
        $this->db->where('status_home',1);
        $this->db->order_by('sort','asc');
        return $this->db->get('vi_category_product')->result_array();
    }
    public function listProductWhereCateIdLoad($id,$sort=null,$all,$start){
    	$this->db->select('vi_product_basic.id,vi_product_basic.tinhtrang,vi_product_basic.title,vi_product_basic.alias,vi_product_basic.price,vi_product_basic.saleoff,vi_product_basic.thumbnail,vi_product_basic.status,vi_product_basic.status_home,vi_product_basic.create_time,vi_category_join_product.id as id_join,vi_category_join_product.id_category,vi_category_join_product.id_product');
    	$this->db->join('vi_category_join_product','vi_category_join_product.id_product = vi_product_basic.id');
    	$this->db->where('vi_category_join_product.id_category',$id);
        $this->db->where('vi_product_basic.status',1);
    	
    	if (is_numeric($all) && is_numeric($start)) {
            $this->db->limit($all,$start);
        }
    	if ($sort!=null) {
    		$sort = strtolower($sort);
    		switch ($sort) {
    			case 'old':
    				$this->db->order_by('create_time','asc');
    				break;
    			case 'new':
    				$this->db->order_by('create_time','desc');
    				break;
    			case 'desc':
    				$this->db->order_by('price',$sort);
    				break;
    			default:
    				$this->db->order_by('price',$sort);
    				break;
    		}
    	}
    	return $this->db->get($this->_table)->result_array();
    }
    public function listCategoriesWhereCateIdLoad($id,$sort=null,$all,$start){
        $this->db->select('vi_product_basic.id,vi_product_basic.tinhtrang,vi_product_basic.title,vi_product_basic.alias,vi_product_basic.price,vi_product_basic.saleoff,vi_product_basic.thumbnail,vi_product_basic.status,vi_product_basic.create_time,vi_category_join_product.id as id_join,vi_category_join_product.id_category,vi_category_join_product.id_product');
        $this->db->join('vi_category_join_product','vi_category_join_product.id_product = vi_product_basic.id');
        $this->db->where('vi_category_join_product.id_category',$id);
        $this->db->where('vi_product_basic.status',1);
        if (is_numeric($all) && is_numeric($start)) {
            $this->db->limit($all,$start);
        }
        if ($sort!=null) {
            $sort = strtolower($sort);
            switch ($sort) {
                case 'old':
                    $this->db->order_by('create_time','asc');
                    break;
                case 'new':
                    $this->db->order_by('create_time','desc');
                    break;
                case 'desc':
                    $this->db->order_by('price',$sort);
                    break;
                default:
                    $this->db->order_by('price',$sort);
                    break;
            }
        }
        return $this->db->get($this->_table)->result_array();
    }
    public function detail($id){
        $this->db->select('vi_product_basic.*,vi_category_join_product.id as id_join,vi_category_join_product.id_category');
        $this->db->join('vi_category_join_product','vi_category_join_product.id_product = vi_product_basic.id');
    	$this->db->where('vi_product_basic.id',$id);
    	return $this->db->get($this->_table)->row_array();
    }
    public function product_related($id_category,$id){
        $this->db->select('vi_product_basic.id,vi_product_basic.tinhtrang,vi_product_basic.related_product,vi_product_basic.thumbnail_after,vi_product_basic.title,vi_product_basic.alias,vi_product_basic.price,vi_product_basic.saleoff,vi_product_basic.thumbnail,vi_product_basic.status,vi_product_basic.create_time,vi_category_join_product.id as id_join,vi_category_join_product.id_category,vi_category_join_product.id_product');
        $this->db->join('vi_category_join_product','vi_category_join_product.id_product = vi_product_basic.id');
        $this->db->where('vi_category_join_product.id_category',$id_category);
        $this->db->where('vi_product_basic.id !=',$id);
        $this->db->limit(16);
        return $this->db->get($this->_table)->result_array();
    }
    public function getParentToBreacumd($id){
        $this->db->select('id,title,alias,parent_id');
        $this->db->where('parent_id',$id);
        return $this->db->get('vi_category_product')->result_array();
    }
    public function insertOrder($data_insert){
        $this->db->insert('order_payment',$data_insert);
    }

    public function getListCategoryFooter(){
        $this->db->select('id,title,alias');
        $this->db->where('status',1);
        $this->db->limit(4);
        return $this->db->get('vi_category_product')->result_array();
    }
    public function getListCategory(){
        $this->db->select('id,title,alias,parent_id');
        $this->db->where('status',1);
        $this->db->order_by('sort','asc');
        return $this->db->get('vi_category_product')->result_array();
    }
    public function getListCategoryLeft(){
        $this->db->select('id,image,title,alias,link,parent_id');
        $this->db->order_by('sort','asc');
        return $this->db->get('vi_menuleft')->result_array();
    }
    public function getListProductLeftInRating(){
         $this->db->where('rating',1);
        $this->db->order_by('id','asc');
        return $this->db->get($this->_table)->result_array();
    }
    public function checkCategoryInCategory($id){
        $this->db->where("parent_id",$id);
        $this->db->where("status",1);
        $query = $this->db->get('vi_category_product');
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function getCategoryInCategory($id){
        $this->db->where("parent_id",$id);
        $this->db->where("status",1);
        $this->db->limit(20);
        $this->db->order_by('sort','asc');
        $query = $this->db->get('vi_category_product');
        return $query->result_array();
    }
    public function getCategoryInCategoryPagi($all,$start,$id){
        $this->db->where("parent_id",$id);
        $this->db->where("status",1);
        if (is_numeric($all) && is_numeric($start)) {
            $this->db->limit($all,$start);
        }
        $this->db->order_by('sort','asc');
        $query = $this->db->get('vi_category_product');
        return $query->result_array();
    }
    public function getBreadcrumbsCategory($idCate, $data = array()) {
        $this->db->where("id",$idCate);
        $this->db->where("status",1);
        $category = $this->db->get('vi_category_product')->row_array();

        $category['link'] = base_url()."san-pham/danh-muc/".$category['id']."-".alias($category['title']).".htm";
        $data[]           = array(
            'name' => (isset($category['title']) ? $category['title'] : ''),
            'href'  => $category['link'],
        );
        if (isset($category['parent_id']) && $category['parent_id'] > 0) {
            $data = $this->getBreadcrumbsCategory($category['parent_id'], $data);
        }
        //$data = array_merge($data,$arr_parent1);
        //krsort($data);
        //asort($data);
        return $data;
    }
    public function search($keywords){
        $this->db->select('id,title,alias,price,price_market,saleoff,thumbnail,thumbnail_after,create_time,masanpham,info_short,status');
        $this->db->where('status',1);
        $this->db->like('title',$keywords);
        $this->db->limit(50);
        return $this->db->get($this->_table)->result_array();
    }
}