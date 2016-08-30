<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    protected $table = '';
    protected $pk = '';
    public $rules = array();

    /**
    * get where anything
    * @param: table : tên bảng
    * @param: where : mảng || chuỗi điều kiện WHERE
    * @param: like  : mảng || chuỗi điều kiện LIKE
    * @param: limit : số lượng bản ghi cần lọc
    * @param: offset: vị trí bắt đầu lọc bản ghi
    * @param: order_by: chuỗi điều kiện sắp xếp
    * @param: some: true: trả về nhiều bản ghi || false: trả về 1 bản ghi
    * @param: result: true: trả về dữ liệu kiểu object || false: trả về dữ liệu kiểu mảng
    * @return: object || array : dữ liệu trả về
    */
    public function get_anything( $table, $where = NULL, $like = NULL, $limit = NULL, $offset = NULL, $order_by = NULL, $some = true, $result = true ){
        if( is_array($where) ){
            foreach( $where as $k => $v  ){
                switch ($k) {
                    case 'where': $this->db->where( $v ); break;
                    case 'or_where': $this->db->or_where( $v ); break;
                    case 'where_in': $this->db->where_in( $v ); break;
                    case 'or_where_in': $this->db->or_where_in( $v ); break;
                    case 'where_not_in': $this->db->where_in( $v ); break;
                    case 'or_where_not_in': $this->db->or_where_in( $v ); break;
                }
            }
        }else if( $where != null ){
            $this->db->where( $where );
        }

        if( is_array($like) ){
            foreach( $like as $k => $v  ){
                switch ($k) {
                    case 'like': $this->db->like( $v ); break;
                    case 'or_like': $this->db->or_like( $v ); break;
                    case 'not_like': $this->db->not_like( $v ); break;
                    case 'or_not_like': $this->db->or_not_like( $v ); break;
                }
            }
        }else if( $like != null ){
            $this->db->like( $like );
        }

        if( $limit != null &&  $offset != null ){
            $this->db->limit( $limit, $offset );
        }

        if( $order_by != null ){
            $this->db->order_by( $order_by );
        }

        $query = $this->db->get($table);
        if( $some ){
            if( $result ){
                return $query->result();    
            }else{
                return $query->result_array();
            }
        }else{
            if( $result ){
                return $query->row();  
            }else{
                return $query->row_array();
            }
        }
        
    }   

    
    /**
     * Tổng số bản ghi theo method options
     * @return array
     */
    public function get_total( $table ) {
        $this->db->select('COUNT(*) AS total');        
        
        $query = $this->db->get( $table );        
        
        return $query->num_rows();
    }
    
    /**
     * Thêm bản ghi vào CSDL
     * @param array : dữ liệu
     * @return int  : khóa chính
     */
    public function insert( $data=array(), $some = false ) {
        if( !$some ){
            $this->db->insert( $this->_table, $data );    
        }else{
            $this->db->insert_batch( $this->_table, $data );
        }
        
        if ( $this->db->affected_rows() > 0 ) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    
    /**
     * Cập nhật bản ghi vào CSDL
     * @param array : dữ liệu
     */
    public function update( $data=array(), $where=NULL ) {
        if($this->db->update( $this->_table, $data, $where )){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Xóa các bản ghi
     * @param array : các khóa chính
     */
    public function delete( $list_id ) {
        $this->db->where_in($this->_pk, $list_id);
        $this->db->delete( $this->_table );
    }

}