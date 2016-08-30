<?php
/**
 * Lấy N ký tự đầu của chuỗi ký tự
 * @param  string
 * @param  int
 * @return string
 */
function str_cut($str, $length) {
    if (mb_strlen($str, 'utf-8')>$length) {
        $str = mb_substr($str, 0, $length, 'utf-8');
        $pos = strrpos($str, ' ');
        $str = mb_substr($str, 0, $pos, 'utf-8');
    }
    return $str;
}

/**
 * @return chuỗi tiếng việt không dấu
 */
function strU($str){
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/[^A-Za-z0-9 ]/", ' ', $str);
    $str = preg_replace("/\s+/", ' ', $str);
    $str = trim($str);
    return $str;
}
/**
 * @return link SEO
 */
function alias($str){
    $str = strU($str);
    $str = strtolower($str);    
    $str = str_replace(' ', '-', $str);
    $str = str_replace('(', '-', $str);
    $str = str_replace(')', '-', $str);
    $str = str_replace('*', '-', $str);
    $str = str_replace('&', '-', $str);
    $str = str_replace('^', '-', $str);
    $str = str_replace('%', '-', $str);
    $str = str_replace('$', '-', $str);
    $str = str_replace('#', '-', $str);
    $str = str_replace('@', '-', $str);
    $str = str_replace('!', '-', $str);
    $str = str_replace('`', '-', $str);
    $str = str_replace(' ', '-', $str);
    return $str;
}

function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
}

function config_pagi($url,$lnc_total,$per_page,$uri_segment){
    // phân trang 
        $config['base_url'] = $url;
        $config['total_rows'] = $lnc_total;
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = $uri_segment;
    // lam tam thoi
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo Lùi';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Tiến &raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;

}
function config_pagi2($url,$lnc_total,$per_page,$uri_segment){
    // phân trang 
        $config['base_url'] = $url;
        $config['total_rows'] = $lnc_total;
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = $uri_segment;
    // lam tam thoi
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;

} 

function config_pagi_right($url,$lnc_total,$per_page,$uri_segment){
    // phân trang 
        $config['base_url'] = $url;
        $config['total_rows'] = $lnc_total;
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = $uri_segment;
    // lam tam thoi
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo Sau';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Trước &raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;

}
/*
*   resize and crop images (le ngoc cuong)
*/
function loadImage($base_url,$img,$op='resize',$width=null,$height=null){        
        if ($op=='resize' || $op=='crop') {
            if ($width==null||$height==null||$height==0||$width==0) {
                return $img;
                //return '[Erro]:Bạn thiếu tham số widht|heith';
            }
            if ($img=='0'||empty($img)) {
                //timthumb.php?src=link_hinh_anh.jpg&h=250&w=300&zc=1

                //zc=1 : Cắt và thay đổi kích cỡ để phù hợp với kích thước tốt nhất (mặc định).
                //zc=0 : Thay đổi kích thước cho vừa kích thước quy định (không cắt xén).
                if ($op=='crop') {
                    $thumb = $base_url.'timthumb.php?src='.$base_url.'public/backend/images/no_image.gif'.'&h='.$height.'&w='.$width.'&zc=1';
                }else{
                    $thumb = $base_url.'timthumb.php?src='.$base_url.'public/backend/images/no_image.gif'.'&h='.$height.'&w='.$width.'&zc=0';
                }
                
            }else{
                if ($op=='crop') {
                    $thumb = $base_url.'timthumb.php?src='.$img.'&h='.$height.'&w='.$width.'&zc=1';
                }else{
                    $thumb = $base_url.'timthumb.php?src='.$img.'&h='.$height.'&w='.$width.'&zc=0';
                }
            }   
            return $thumb;
        }else if($op=='none'){
            $thumb = $img;
            return $thumb;
        }
}
function cutString50($content){ // cắt lấy 50 từ trong đoạn văn bản cuongle
    if(isset($content) && $content !=''){
            $a = explode(" ", $content);
            if (count($a)>50) {
                for ($i=0; $i < 50 ; $i++) { 
                   $x[] = $a[$i];
                }
            }else{
                for ($i=0; $i < count($a) ; $i++) { 
                   $x[] = $a[$i];
                }
            }
            return implode(" ", $x);
        }
}
function cutString10($content){ // cắt lấy 10 từ trong đoạn văn bản cuongle
    if(isset($content) && $content !=''){
            $a = explode(" ", $content);
            if (count($a)>10) {
                for ($i=0; $i < 10 ; $i++) { 
                   $x[] = $a[$i];
                }
            }else{
                for ($i=0; $i < count($a) ; $i++) { 
                   $x[] = $a[$i];
                }
            }
            return implode(" ", $x);
        }
}
function rip_tags($string) { 
    // ----- remove HTML TAGs ----- 
    $string = preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $string);
    // ----- remove control characters ----- 
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", '', $string);   // --- replace with space
    $string = str_replace("\t", '', $string);   // --- replace with space
    $string = str_replace("&nbsp;", '', $string);   // --- replace with space
    $string = str_replace('<br />', '', $string);
    $string = str_replace('-', '', $string);
    
    return trim($string); 

}
function loadUrl($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
        '-'=>array(' ','&quot;','.',"'",'"',',',';')
    );
    foreach($unicode as $nonUnicode=>$uni){
        foreach($uni as $value)
        $str = str_replace($value,$nonUnicode,$str);
    }
    $str=strtolower($str);
return $str;
}
function dequy($data,$parent=0,$text="------",$cate=array()){
    foreach($data as $k=>$value){
        if($value['parent_id'] == $parent){
            $id = $value['id'];
            if (isset($value['sort']) && $value['sort']!='') {
                   $sort = $value['sort'];
            }else{
                $sort=0;
            }
            if (!empty($cate)) {
               $x = (in_array($id, $cate)) ? 'checked' : '';

                echo '<input type="number" value="'.$sort.'" min="0" data-id="'.$id.'" data-value="'.$id.'|'.$sort.'" class="sort_menu_config"/><input type="checkbox"'.$x.' value="'.$id.'" name="delmenuall[]"/><span class="text_menu" data-idm="'.$id.'">'.$text.$value['title'].'</span><br/>';
            }else{
                echo '<input type="number" value="'.$sort.'" min="0" data-id="'.$id.'" data-value="'.$id.'|'.$sort.'" class="sort_menu_config"/><input type="checkbox" value="'.$id.'" name="delmenuall[]"/><span class="text_menu" data-idm="'.$id.'">'.$text.$value['title'].'</span><br/>';
            }
            
            unset($data[$k]);
            dequy($data,$id,$text."------",$cate);
        }
    }
}
function dequyInProduct($data,$parent=0,$text="------",$cate=array()){
    foreach($data as $k=>$value){
        if($value['parent_id'] == $parent){
            $id = $value['id'];
            if (isset($value['sort']) && $value['sort']!='') {
                   $sort = $value['sort'];
            }else{
                $sort=0;
            }
            if (!empty($cate)) {
               $x = (in_array($id, $cate)) ? 'checked' : '';

                echo '<input type="checkbox"'.$x.' value="'.$id.'" name="delmenuall[]"/>'.$text.$value['title'].'<br/>';
            }else{
                echo '<input type="checkbox" value="'.$id.'" name="delmenuall[]"/>'.$text.$value['title'].'<br/>';
            }
            
            unset($data[$k]);
            dequyInProduct($data,$id,$text."------",$cate);
        }
    }
}
function callMenu($data,$parent=0,$text="--",$select=0){
    foreach($data as $k=>$value){
        if($value['parent_id'] == $parent){
            $id=$value['id'];
            if($select != 0 && $id == $select){
                echo "<option value='$value[id]' selected='selected'>".$text.$value['title']."</option>";
            }else{
                echo "<option value='$value[id]'>".$text.$value['title']."</option>";
            }
            unset($data[$k]);
            callMenu($data,$id,$text."--",$select);
        }
    }
}


function dequyUl($data,$parent=0){
    if (isset($data[$parent])) {
        if ($parent==0) {
            echo "<ul class='nav navbar-nav navbar-left'>";
        }else{
            echo "<ul>";
        }
        foreach ($data[$parent] as $k=>$value) {
            echo "<li>";
                $id=$value['id'];
                if (isset($data[$id])) {
                    echo "<a href='javascript:void()' class='link_menu'>".$value['title']."</a>";
                }else{
                    echo "<a href='".$value['link']."'>".$value['title']."</a>";
                }
                unset($data[$k]);
                dequyUl($data,$id);
            echo "</li>";
        }
        echo "</ul>";
    }
    
}
function dequyUlxxx($data,$parent=0){
    if (isset($data[$parent])) {
        if ($parent==0) {
            echo "<ul class='main-navigation text-center'>";
        }else{
            echo "<ul class='dropdown-menu'>";
        }
        foreach ($data[$parent] as $k=>$value) {
                $id=$value['id'];
                if (isset($data[$id])) {
                    echo "<li class='dropdown'>";
                }else{
                    echo "<li>";
                }
                if (isset($data[$id])) {
                    echo "<a href='".$value['link']."' class='dropdown-toggle' data-toggle='dropdown'>".$value['title']."&nbsp;<span class='caret'></span></a>";
                }else{
                    echo "<a href='".$value['link']."'>".$value['title']."</a>";
                }
                unset($data[$k]);
                dequyUlxxx($data,$id);
            echo "</li>";
        }
        echo "</ul>";
    }
    
}

function dequyLeft($data,$parent=0){
    if (isset($data[$parent])) {
        if ($parent==0) {
            echo "<ul class='category-lists nav'>";
        }else{
            echo "<ul>";
        }
        foreach ($data[$parent] as $k=>$value) {
                $id=$value['id'];
                if (isset($data[$id])) {
                    echo "<li>";
                }else{
                    echo "<li>";
                }
                if (isset($data[$id])) {
                     echo "<a href='".$value['link']."'><img src='".base_url().$value['image']."' alt='' class='img-responsive' width='20' height='20'>".$value['title']."</a>";
                }else{
                    echo "<a href='".$value['link']."'><img src='".base_url().$value['image']."' alt='' class='img-responsive' width='20' height='20'>".$value['title']."</a>";
                }
                unset($data[$k]);
                dequyLeft($data,$id);
            echo "</li>";
        }
        echo "</ul>";
    }
    
}


