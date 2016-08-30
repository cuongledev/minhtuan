<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Phân trang
 * @param string  : đường dẫn
 * @param int     : trang
 * @param int     : tổng số trang
 * @param string  : ký tự thêm vào url
 * @return string : phân trang
 */
function pagination($url, $page, $tpage){
    if ($tpage==0) return;
    $adjacents = 2;
    $out = '<ul class="pagination">';
    
    //first
    if ($page == 1) {
        $out.= '<li class="disabled"><span>First</span></li>';
    } else {
        $out.='<li><a href="'.$url.'">First</a></li>';
    }
    
    // previous
    if ($page == 1) {
        $out.= '<li class="disabled"><span>&lt;</span></li>';
    } elseif ($page == 2) {
        $out.='<li><a href="'.$url.'">&lt;</a></li>';
    } else {
        $out.='<li><a href="'.$url.'/'.($page - 1).'">&lt;</a></li>';
    }

    $pmin=($page>$adjacents)?($page - $adjacents):1;
    $pmax=($page<($tpage - $adjacents))?($page + $adjacents):$tpage;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= '<li class="active"><span>'.$i.'</span></li>';
        } elseif ($i == 1) {
            $out.= '<li><a href="'.$url.'">'.$i.'</a></li>';
        } else {
            $out.= '<li><a href="'.$url.'/'.$i.'">'.$i. '</a></li>';
        }
    }
    
    // next
    if ($page < $tpage) {
        $out.= '<li><a href="'.$url.'/'.($page + 1).'">&gt;</a></li>';
    } else {
        $out.= '<li class="disabled"><span>&gt;</span></li>';
    }
    
    //last
    if ($page < $tpage) {
        $out.= '<li><a href="'.$url.'/'.$tpage.'">Last</a></li>';
    } else {
        $out.= '<li class="disabled"><span>Last</span></li>';
    }
    
    $out.= '</ul>';
    return $out;
}

function pagination2($url, $page, $tpage){
    if ($tpage==0) return;
    $adjacents = 2;
    $out = '<ul class="pagination">';
    
    //first
    if ($page == 1) {
        $out.= '<li class="disabled"><span>First</span></li>';
    } else {
        $out.='<li><a href="'.$url.'.html">First</a></li>';
    }
    
    // previous
    if ($page == 1) {
        $out.= '<li class="disabled"><span>&lt;</span></li>';
    } elseif ($page == 2) {
        $out.='<li><a href="'.$url.'.html">&lt;</a></li>';
    } else {
        $out.='<li><a href="'.$url.'/'.($page - 1).'.html">&lt;</a></li>';
    }

    $pmin=($page>$adjacents)?($page - $adjacents):1;
    $pmax=($page<($tpage - $adjacents))?($page + $adjacents):$tpage;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= '<li class="active"><span>'.$i.'</span></li>';
        } elseif ($i == 1) {
            $out.= '<li><a href="'.$url.'.html">'.$i.'</a></li>';
        } else {
            $out.= '<li><a href="'.$url.'/'.$i.'.html">'.$i. '</a></li>';
        }
    }
    
    // next
    if ($page < $tpage) {
        $out.= '<li><a href="'.$url.'/'.($page + 1).'.html">&gt;</a></li>';
    } else {
        $out.= '<li class="disabled"><span>&gt;</span></li>';
    }
    
    //last
    if ($page < $tpage) {
        $out.= '<li><a href="'.$url.'/'.$tpage.'.html">Last</a></li>';
    } else {
        $out.= '<li class="disabled"><span>Last</span></li>';
    }
    
    $out.= '</ul>';
    return $out;
}