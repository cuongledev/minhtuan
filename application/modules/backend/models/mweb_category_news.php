<?php
class Mweb_category_news extends MY_Model{
    protected $_table = 'vi_category_news';
    protected $_pk = 'id';

    public function __construct(){
        parent::__construct();
    }

    public function create_menu($listcat, $parent=0, $text='&nbsp;'){
        $tmp = array();
        foreach($listcat as $k => $v){
            if( $v['parent_id'] == $parent ){
                $tmp[] = $v;
                unset( $listcat[$k] );
            }
        }

        if( $tmp ) {
            //echo '<ul class="list-cat">';
            foreach( $tmp as $tmpval ){
                echo '<li>';
                if( $tmpval['parent_id'] != 0 ){
                    echo '<a class="cat-item" href="' .base_url().alias($tmpval['title']).'/'. $tmpval['id'] . '.html">' . $text.$tmpval['catname'] . '</a>';
                }
                $this->create_menu($listcat, $tmpval['id'], $text.$text.$text);
                echo '</li>';
            }
            //echo '</ul>';
        }
    }

    public function adm_create_menu($listcat, $parent=0, $text='&nbsp;', $current_id=0){
        $tmp = array();
        foreach($listcat as $k => $v){
            if( $v['parent_id'] == $parent ){
                $tmp[] = $v;
                unset( $listcat[$k] );
            }
        }

        if( $tmp ) {
            foreach( $tmp as $tmpval ){
                if( $current_id == $tmpval['id'] ){
                    echo '<option selected="selected" value="'.$tmpval['id'].'">'.$text.$tmpval['title'].'</option>';    
                }else{
                    echo '<option value="'.$tmpval['id'].'">'.$text.$tmpval['title'].'</option>';
                }
                $this->adm_create_menu($listcat, $tmpval['id'], $text.$text.$text, $current_id);
            }
        }
    }
}