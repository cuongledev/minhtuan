<?php
class Product extends MainController{
    protected $_data;
    public function __construct(){
        parent::__construct();
        // load address province
        
    }
    public function index(){
        $this->_data['loadPage'] = "product/index_view";
        $this->_data['title'] = 'Sản phẩm';
        $this->load->model('Mproduct');
        $this->_data['getListRating']=$this->Mproduct->getListProductLeftInRating();

        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => base_url()
                ),
            1 => array(
                'name' => 'Sản phẩm',
                'href'  => ''
                ),
            );
        $this->_data['getListCategory']=$this->Mproduct->getListCategoryLeft();
        $this->_data['product']=$this->Mproduct->listCategoriesParent();

        $this->load->view($this->_data['path'],$this->_data);
    }
    public function category($id){
        $this->load->model('Mproduct');
        $this->_data['getListCategory']=$this->Mproduct->getListCategoryLeft();
        $this->_data['getListRating']=$this->Mproduct->getListProductLeftInRating();



        if (isset($id)) {
            $this->_data['cateinfo'] = $this->Mproduct->getCategory($id);
            $this->_data['title'] = $this->_data['cateinfo']['title'];
            // start breacum page
                
            
            $this->_data['page_breadcrumb'] = $this->Mproduct->getBreadcrumbsCategory($id);
            $arr_b = array(
                        0 => array(
                            'name' => 'Sản phẩm',
                            'href'  => base_url().'product'
                            ),
                        1 => array(
                            'name' => 'Trang chủ',
                            'href'  => base_url()
                            ),
                        
                        );
            $this->_data['page_breadcrumb'] = array_merge($this->_data['page_breadcrumb'],$arr_b);
            krsort($this->_data['page_breadcrumb']);
            // end breacum page

            $status_cate = $this->Mproduct->checkCategoryInCategory($id);
            if ($status_cate==FALSE) {
                $this->_data['loadPage'] = "product/category_view";
                //$this->_data['title'] = 'Danh mục sản phẩm';
                
                $sort=null;
                if ($this->input->get('sort')) {
                    $sort = trim(addslashes($this->input->get('sort')));
                    $this->_data['sort_ct'] = $sort;
                }

                $this->_data['id_cate']=$id;
                $this->_data['category']=$this->Mproduct->getCategory($id);

                


                // phan trang
                $url = base_url()."san-pham/danh-muc/$id";
                $count_pro = $this->Mproduct->countAllWhereCategory($id);
                $lnc_total = count($count_pro);
                $per_page = 21;
                $uri_segment = 4;
                $config = config_pagi_right($url,$lnc_total,$per_page,$uri_segment);

                $this->load->library('pagination',$config);
                $this->_data['page_link'] = $this->pagination->create_links();
                $start = $this->uri->segment(4);


                $this->_data['category_product']=$this->Mproduct->listProductWhereCateId($id,$sort,$config['per_page'],$start);
            }else{
                $this->_data['loadPage'] = "product/categoryList_view";
                

                $this->_data['product']=$this->Mproduct->getCategoryInCategory($id);
                
                


            }


            
        }else{
            redirect(base_url());
        }
        

        


        $this->load->view($this->_data['path'],$this->_data);
    }
    public function detail($id){
        
        $this->_data['loadPage'] = "product/detail_view";
        $this->load->model('Mproduct');
        $this->_data['getListCategory']=$this->Mproduct->getListCategoryLeft();
        $this->_data['getListRating']=$this->Mproduct->getListProductLeftInRating();
        if (isset($id)) {
            $this->_data['detail_product']=$this->Mproduct->detail($id);
            $this->_data['title']=$this->_data['detail_product']['title'];
            $this->_data['category']=$this->Mproduct->getCategory($this->_data['detail_product']['id_category']);
            // start breacum page
                
            
            $this->_data['page_breadcrumb'] = $this->Mproduct->getBreadcrumbsCategory($this->_data['category']['id']);
            $arr_b = array(
                        0 => array(
                            'name' => 'Sản phẩm',
                            'href'  => base_url().'product'
                            ),
                        1 => array(
                            'name' => 'Trang chủ',
                            'href'  => base_url()
                            ),
                        
                        );
            $this->_data['page_breadcrumb'] = array_merge($this->_data['page_breadcrumb'],$arr_b);
            krsort($this->_data['page_breadcrumb']);
            // end breacum page

            $this->_data['product_related']=$this->Mproduct->product_related($this->_data['detail_product']['id_category'],$this->_data['detail_product']['id']);
            
           // $this->_data['title'] = $this->_data['data']['title'];
            //$this->_data['description'] = $this->_data['data']['description'];
            //$this->_data['keywords'] = $this->_data['data']['description'];
            //$cate_id = $this->_data['data']['cat_id'];
            //$this->_data['related']=$this->Mnews->getListNotId($this->_data['data']['id'],$cate_id);
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function addCart(){
        $this->load->model('Mproduct');
        if (isset($_POST)) {
            $msp = $this->input->post('masp');
            $qty = $this->input->post('quant');
            $this->cart->contents();
            $data = $this->Mproduct->detail($msp);
            $name = alias($data['title']);
            $shop = array(
                "id" => $data['id'],
                "masanpham" => $data['masanpham'],
                "name" => $name,
                "qty" => $qty,
                "price" => $data['price'],
            );

            
           
            if ($this->cart->insert($shop)) {
                $count = count($this->cart->contents());
                $data = array(
                    'status'    => true,
                    'count'     => $this->cart->total_items(),
                    'total'     => number_format($this->cart->total(),0,'','.'),
                    'mess'      => 'Sản phẩm '.$data['title'].' vừa được bạn thêm vào giỏ hàng thành công.'
                );
            }else{
                $data = array(
                    'status'    => false,
                    'mess'  => 'Sản phẩm '.$data['title'].' không thể thêm vào giỏ hàng vì sự cố, bạn vui lòng thử lại sau.'
                );
            }
            echo json_encode($data);
            
        }
    }
    public function showCart(){
        if (empty($this->cart->contents())) {
            redirect(base_url());
        }
        $this->_data['loadPage'] = "product/cart_view";
        $this->_data['data'] = $this->cart->contents();
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function update(){
        if (isset($_POST['oke2'])) {
            for($i = 1; $i <= $this->cart->total_items();$i++){
                $item = $this->input->post($i);
                $this->cart->update($item);
            }
            redirect(base_url()."product/showCart");
        }
    }
    public function del($id){
        if (isset($id)) {
            $shop = $this->cart->contents();
            foreach($shop as $item){
                if($item['id'] == $id){
                    $data['rowid'] = $item['rowid'];
                    $data['qty'] =0;
                    $this->cart->update($data);
                    break;
                }
            }
        }
        redirect(base_url()."product/showCart");
    }
    public function checkout(){
        if (empty($this->cart->contents())) {
            redirect(base_url());
        }
        $this->load->model('Mproduct');
        $shop = $this->cart->contents();
        foreach($shop as $item){
            $data_item = $this->Mproduct->getProductById($item['id']);
            $arr_cart[] = array(
                                'id' => $item['id'],
                                'masanpham' => $item['masanpham'],
                                'name' => $data_item['title'],
                                'qty' => $item['qty'],
                                'price' => $item['price'],
                                'subtotal' => $item['subtotal'],
                            );
        }
        
        $this->_data['info_cart']  = $arr_cart;
        $this->_data['loadPage'] = "product/checkCart_view";
        $this->_data['data'] = $this->cart->contents();
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function success(){
        if (empty($this->cart->contents())) {
            redirect(base_url());
        }
        if (isset($_POST['checkoutok'])) {
            $name = trim(addslashes($this->input->post('name')));
            $email = trim(addslashes($this->input->post('email')));
            $tel = trim(addslashes($this->input->post('tel')));
            $address = trim(addslashes($this->input->post('address')));
            $payment = trim(addslashes($this->input->post('payment')));
            $user = array(
                'name'  => $name,
                'email'  => $email,
                'tel'  => $tel,
                'address'  => $address,
                'payment'  => $payment,
            );
            $this->_data['info_user'] = $user;
            $info_user = json_encode($user);
            $this->load->model('Mproduct');
            $shop = $this->cart->contents();
            foreach($shop as $item){
                $data_item = $this->Mproduct->getProductById($item['id']);
                $arr_cart[] = array(
                                    'id' => $item['id'],
                                    'masanpham' => $item['masanpham'],
                                    'name' => $data_item['title'],
                                    'qty' => $item['qty'],
                                    'price' => $item['price'],
                                    'subtotal' => $item['subtotal'],
                                );
            }
            
            $this->_data['info_cart']  = $arr_cart;
            $info_cart = json_encode($arr_cart);
            

            $arr_info = array(
                'mdh' => 'BILL'.time(),
                'info_user' => $info_user,
                'info_cart' => $info_cart,
                'create_time' => time(),
            );
            $this->Mproduct->insertOrder($arr_info);
            $this->_data['countMonney'] = $this->cart->total();
            $this->cart->destroy();
        }
        $this->_data['loadPage'] = "product/checkout_view";
        $this->_data['data'] = $this->cart->contents();
        
        
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function ajaxLoad(){
            if ($this->input->post('start') && $this->input->post('sort') && $this->input->post('id_cate') && $this->input->post('view')) {
                $start = $this->input->post('start');
                $sort = $this->input->post('sort');
                $id_cate = $this->input->post('id_cate');

                $this->load->model('Mproduct');
                $category_product= $this->Mproduct->listProductWhereCateIdLoad($id_cate,$sort,
                    20,$start);
                if (!empty($category_product)) {
                    foreach ($category_product as $key => $value) { 
                        if ($this->input->post('view') == 'gridView') { ?>
                            <div class="product-item col-xs-6 col-md-3">
                                <div class="product-item-images col-xs-12 noPadding">
                                    <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.html'; ?>"><img src="<?php if(isset($value['thumbnail'])){ echo base_url().'image_tools/timthumb.php?src='.$value['thumbnail'].'&h=250&w=250&zc=2';}else{ echo base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=250&w=250&zc=2';} ?>" alt="<?php if(isset($value['title'])) echo $value['title']; ?>" class="img-responsive"></a>
                                </div>
                                <div class="product-item-title text-center col-xs-12 noPadding">
                                    <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.html'; ?>"><?php if(isset($value['title'])) echo $value['title']; ?></a>
                                </div>
                                <div class="product-item-info col-xs-12 noPadding text-center">
                                    <span class="product-item-cost"><money><?php if(isset($value['price'])) echo number_format($value['price'],0,'','.'); ?> <currency>&#8363</currency></money></span>
                                    <?php 
                                        if(isset($value['saleoff']) && $value['saleoff']>0){ ?>
                                            <span class="product-item-cost product-unsale"><?php echo "<money><del>". number_format($value['saleoff'],0,'','.')."</del> <currency>&#8363</currency></money>"; ?></span>
                                    <?php 
                                        }
                                    ?>
                                    <span class="product-desc">
                                        <?php if(isset($value['info_short'])) echo $value['info_short']; ?>
                                    </span>
                                </div>
                            </div><!-- /.product-item -->
                        <?php
                        }else{ ?>
                            <div class="product-item col-xs-6 col-md-12 list-view-product-item">
                                <div class="product-item-images col-xs-12 col-sm-3 noPadding">
                                    <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.html'; ?>"><img src="<?php if(isset($value['thumbnail'])){ echo base_url().'image_tools/timthumb.php?src='.$value['thumbnail'].'&h=250&w=250&zc=2';}else{ echo base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=250&w=250&zc=2';} ?>" alt="<?php if(isset($value['title'])) echo $value['title']; ?>" class="img-responsive"></a>
                                </div>
                                <div class="product-item-title col-xs-12 col-sm-9">
                                    <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/'.$value['id'].'-'.$value['alias'].'.html'; ?>"><?php if(isset($value['title'])) echo $value['title']; ?></a>
                                </div>
                                <div class="product-item-info col-xs-12 col-sm-9">
                                    <span class="product-item-cost"><money><?php if(isset($value['price'])) echo number_format($value['price'],0,'','.'); ?> <currency>&#8363</currency></money></span>
                                    <?php 
                                        if(isset($value['saleoff']) && $value['saleoff']>0){ ?>
                                            <span class="product-item-cost product-unsale"><?php echo "<money><del>". number_format($value['saleoff'],0,'','.')."</del> <currency>&#8363</currency></money>"; ?></span>
                                    <?php 
                                        }
                                    ?>
                                    
                                    <span class="product-desc">
                                        <?php if(isset($value['info_short'])) echo $value['info_short']; ?>
                                    </span>
                                </div>
                            </div><!-- /.product-item -->
                        <?php
                        }
                    }
                }
            }
    }
    public function ajaxLoad2(){
            if ($this->input->post('start')) {
                $id = $this->input->post('parent_id');
                $start = $this->input->post('start');

                $this->load->model('Mproduct');
                $product= $this->Mproduct->getCategoryInCategoryPagi(20,$start,$id);
                if (!empty($product)) {
                    foreach ($product as $key => $value) { ?>
                        <div class="product-item col-xs-6 col-md-3">
                            <div class="product-item-images col-xs-12 noPadding">
                                <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/danh-muc/'.$value['id'].'-'.$value['alias']; ?>"><img src="<?php if($value['thumbnail']!=''){ echo base_url().'image_tools/timthumb.php?src='.$value['thumbnail'].'&h=250&w=250&zc=2';}else{ echo base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=250&w=250&zc=2';} ?>" alt="<?php if(isset($value['title'])) echo $value['title']; ?>" class="img-responsive"></a>
                            </div>
                            <div class="product-item-title text-center col-xs-12 noPadding">
                                <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/danh-muc/'.$value['id'].'-'.$value['alias']; ?>"><?php if(isset($value['title'])) echo $value['title']; ?></a>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
    }
    public function ajaxLoad0(){
            if ($this->input->post('start')) {
                $start = $this->input->post('start');

                $this->load->model('Mproduct');
                $product= $this->Mproduct->listProductLoadChangeCate(20,$start);
                if (!empty($product)) {
                    foreach ($product as $key => $value) { ?>
                        <div class="product-item col-xs-6 col-md-3">
                            <div class="product-item-images col-xs-12 noPadding">
                                <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/danh-muc/'.$value['id'].'-'.$value['alias']; ?>"><img src="<?php if($value['thumbnail']!=''){ echo base_url().'image_tools/timthumb.php?src='.$value['thumbnail'].'&h=250&w=250&zc=2';}else{ echo base_url().'image_tools/timthumb.php?src=public/backend/images/no_image.gif&h=250&w=250&zc=2';} ?>" alt="<?php if(isset($value['title'])) echo $value['title']; ?>" class="img-responsive"></a>
                            </div>
                            <div class="product-item-title text-center col-xs-12 noPadding">
                                <a href="<?php if(isset($value['id'])) echo base_url().'san-pham/danh-muc/'.$value['id'].'-'.$value['alias']; ?>"><?php if(isset($value['title'])) echo $value['title']; ?></a>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
    }
    public function search(){
        $this->load->model('Mproduct');
         $this->_data['getListCategory']=$this->Mproduct->getListCategoryLeft();
        $this->_data['getListRating']=$this->Mproduct->getListProductLeftInRating();


        $this->_data['loadPage'] = "product/search_view";
        $this->_data['title'] = 'Tìm kiếm sản phẩm';

        $this->_data['page_breadcrumb'] = array(
            0 => array(
                'name' => 'Trang chủ',
                'href'  => base_url()
                ),
            1 => array(
                'name' => 'Tìm kiếm sản phẩm',
                'href'  => ''
                ),
            );
        if (isset($_GET['input_search'])) {
            $search = trim(addslashes($this->input->get('input_search')));
            $this->_data['product'] = $this->Mproduct->search($search);
            $this->_data['keywords'] = $search;
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
}